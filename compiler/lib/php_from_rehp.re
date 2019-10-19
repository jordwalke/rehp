open Stdlib;

/**
 * All the code that "expands" high level Rehp into concrete Php.
 */
module Expand = {
  let seq = (e1, e2) => Php.ECond(Php.EBin(Or, e1, EBool(true)), e2, e2);
  /*
   * There is one instance of a hardcoded JS expression value in the jsoo
   * library, which needs to be special cased when converting to PHP.
   */
  let raw = s =>
    Php.ERaw(
      String.compare(s, "(function (exn) { throw exn })") === 0
        ? "(function($exn) {throw $exn;})" : s,
    );
};

let indent = {contents: 0};

type vars = {
  names: StringMap.t(int),
  vars: Code.Var.Map.t(int),
};
type continue_kind =
  | NoContinue
  | ContinueWithLabel(list(string))
  | UnlabelledContinueInCase
  | ContinueWithLabelAndInCase(list(string));
type enclosed_by =
  | NoLoopOrSwitch
  | UnlabelledLoop
  | LabelledForLoop(string)
  | Switch;
type input = {
  vars,
  /*
    "enclosed_by" represents whether the current AST is immediately enclosed
    within a labelled loop, a regular loop, or a switch. For example:

      function f() {
        x = 3; // "enclosed_by" is NoLoopOrSwitch when processing this statement
        a: for () {
          x = 3; // "enclosed_by" is LabelledForLoop("a")
          for () {
            x = 3; // "enclosed_by" is UnlabelledLoop
          }
          switch () {
            case 0:
              x = 3; // "enclosed_by" is Switch
            case 1:
              for () {
                x = 3; // "enclosed_by" is UnlabelledLoop
              }
          }
        }
      }
   */
  enclosed_by,
};
type output = {
  dec: vars,
  use: vars,
  /*
   "free_labels" tracks the labels used in continue statements that haven't
   been enclosed with the corresponding loop yet.

   For example, "free_labels" is ["a"] for this AST:

     for () {
       continue a;
     }

   But it is [] (empty) here:

     a: for () {
       continue a;
     }

   Continues without labels add "" (empty string) to the list. For example,
   this AST has [""] for "free_labels":

     if () {
       continue;
     }

   And so does this one:

     switch () {
       case 0:
         continue;
     }

   Functions and loops "shield" unlabelled continues. So this AST has [] for
   "free_labels":

     switch () {
       case 0:
         break;
       case 1:
         return 3;
       case 2:
         for () {
           continue;
         }
       case 3:
         $f = function () {
           continue;
         };
     }
   */
  free_labels: list(string),
};

let escapeIdent = s => Stdlib.escape(s, '$', "____");
let identStr = (~ref=false, name: string): string =>
  ref ? "&$" ++ (name: string) : "$" ++ (escapeIdent(name): string);
let ident = (~ref=false, _input, i): Id.t =>
  switch (i) {
  | Id.S({name: id, _}) =>
    Id.S({name: identStr(~ref, id), var: None, loc: N})
  | Id.V(_) => assert(false)
  };

exception Unsupported_statement;

let binop_from_rehp = binop =>
  switch (binop) {
  | Rehp.Eq => Php.Eq
  | StarEq => StarEq
  | SlashEq => SlashEq
  | ModEq => ModEq
  | PlusEq => PlusEq
  | MinusEq => MinusEq
  | BandEq => BandEq
  | BxorEq => BandEq
  | BorEq => BorEq
  | Or => Or
  | And => And
  | Bor => Bor
  | Bxor => Bxor
  | Band => Band
  | EqEq => EqEq
  | NotEq => NotEq
  | EqEqEq => EqEqEq
  | NotEqEq => NotEqEq
  | Lt => Lt
  | Le => Le
  | Gt => Gt
  | Ge => Ge
  | InstanceOf => InstanceOf
  | In => In
  | Lsl =>
    raise(
      Invalid_argument(
        "Should not be producing << (Lsl) when targeting PHP."
        ++ " The runtime file you supplied likely omitted left_shift_32",
      ),
    )
  /* Php doesn't have an equivalent - this should have been turned into calls
   * to unsigned_right_shift_32 by this point. */
  | Lsr =>
    raise(
      Invalid_argument(
        "Should not be producing >>> (Lsr) when targeting PHP."
        ++ " The runtime file you supplied likely omitted unsigned_right_shift_32",
      ),
    )
  | Asr =>
    raise(
      Invalid_argument(
        "Should not be producing >>> (Asr) when targeting PHP."
        ++ " The runtime file you supplied likely omitted right_shift_32",
      ),
    )
  | Plus => Plus
  | FloatPlus => FloatPlus
  | IntPlus => IntPlus
  /*  | StrPlus => StrPlus  */
  | Minus => Minus
  | Mul => Mul
  | Div => Div
  | Mod => Mod
  };

let empty = {names: StringMap.empty, vars: Code.Var.Map.empty};
let emptyOutput: output = {dec: empty, use: empty, free_labels: []};

let exists = (cur, id) =>
  switch (id) {
  | Id.S({name: s, _}) => StringMap.mem(s, cur.names)
  | V(v) => Code.Var.Map.mem(v, cur.vars)
  };

/*
 * It's become clear we're really using these as a set, not a map
 */
let addOne = (varsAndNames, v) =>
  if (exists(varsAndNames, v)) {
    varsAndNames;
  } else {
    switch (v) {
    | Id.S({name, _}) => {
        vars: varsAndNames.vars,
        names: StringMap.add(name, 1, varsAndNames.names),
      }
    | V(v) => {
        names: varsAndNames.names,
        vars: Code.Var.Map.add(v, 1, varsAndNames.vars),
      }
    };
  };
let addOneString = (addTo, s) =>
  addOne(addTo, Id.S({name: s, var: None, loc: N}));

let useOneVar = addOne(empty);

let mergeSum = (_k, count1, count2) =>
  switch (count1, count2) {
  | (None, None) => None /* Okay, what situation is this? */
  | (Some(_), None) => Some(1)
  | (None, Some(_)) => Some(1)
  | (Some(_), Some(_)) => Some(1)
  };

let isEmpty = (cur: vars) =>
  Code.Var.Map.is_empty(cur.vars) && StringMap.is_empty(cur.names);

let append = (cur: vars, next: vars): vars => {
  vars: Code.Var.Map.merge(mergeSum, cur.vars, next.vars),
  names: StringMap.merge(mergeSum, cur.names, next.names),
};

/*
 * TODO: Always remove zerod out values.
 */
let remove = (cur: vars, remove: vars): vars => {
  vars:
    Code.Var.Map.filter(
      (k, _) => !Code.Var.Map.mem(k, remove.vars),
      cur.vars,
    ),
  names:
    StringMap.filter((k, _) => !StringMap.mem(k, remove.names), cur.names),
};

let intersect = (cur: vars, intersect_with: vars): vars => {
  vars:
    Code.Var.Map.filter(
      (k, _) => Code.Var.Map.mem(k, intersect_with.vars),
      cur.vars,
    ),
  names:
    StringMap.filter(
      (k, _) => StringMap.mem(k, intersect_with.names),
      cur.names,
    ),
};

let exists = (cur: vars, id) =>
  switch (id) {
  | Id.S({name: s, _}) => StringMap.mem(s, cur.names)
  | V(v) => Code.Var.Map.mem(v, cur.vars)
  };

let outAppend = (cur: output, next: output): output => {
  dec: append(cur.dec, next.dec),
  use: append(cur.use, next.use),
  free_labels: List.concat([cur.free_labels, next.free_labels]),
};

let createRef = ((name, _)) => {
  let newRef = Php.ENew(EVar(Id.S({name: "Ref", var: None, loc: N})), None);
  (
    Php.EVar(Id.S({name: identStr(name), var: None, loc: N})),
    Some((newRef, Loc.N)),
  );
};

let topLevelIdentifiersSt = (newVarsSoFar, st) =>
  switch (st) {
  /*
   * This doesn't handle the case where a variable is used *before* it is
   * defined somewhere. That's okay, we'll consider that to be invalid Rehp IR.
   */
  | Rehp.Variable_statement(l) =>
    let augmentEnv = (env, (id, _eopt)) => addOne(env, id);
    List.fold_left(~f=augmentEnv, ~init=newVarsSoFar, l);
  | For_statement(Right(l), _e2, _e3, (_s, _loc), _depth) =>
    let augmentEnv = (env, (id, _eopt)) => addOne(env, id);
    let addedVars = List.fold_left(~f=augmentEnv, ~init=empty, l);
    append(newVarsSoFar, addedVars);
  /*
   * TODO: Probably need to go one level deeper on the try body.
   */
  | Try_statement(_, _, _) => newVarsSoFar
  | _ => newVarsSoFar
  };

let topLevelIdentifiers = (newVarsSoFar: vars, (src, _)) =>
  switch (src) {
  | Rehp.Function_declaration((id, _, _, _)) => addOne(newVarsSoFar, id)
  | Statement(stmt) => topLevelIdentifiersSt(newVarsSoFar, stmt)
  };

let rec foldSources = (sourceFolder, curOut, curIn, curRevMappeds, remain) =>
  switch (remain) {
  | [] => (curOut, List.rev(curRevMappeds))
  | [(s, loc), ...tl] =>
    let (thisOut, thisMapped) = sourceFolder(curOut, curIn, s);
    let nextOut = outAppend(curOut, thisOut);
    let nextInput = {
      vars: append(curIn.vars, nextOut.dec),
      enclosed_by: NoLoopOrSwitch,
    };
    foldSources(
      sourceFolder,
      nextOut,
      nextInput,
      [(thisMapped, loc), ...curRevMappeds],
      tl,
    );
  };

let rec foldStatements =
        (
          statementFolder,
          origOut: output,
          curOut: output,
          curIn: input,
          curRevMappeds,
          remain,
        ) =>
  switch (remain) {
  | [] => (curOut, List.rev(curRevMappeds))
  | [(s, loc), ...tl] =>
    let (thisOut, thisMapped) =
      statementFolder(
        {...curOut, free_labels: origOut.free_labels},
        curIn,
        s,
      );
    let nextOut = outAppend(curOut, thisOut);
    let nextIn = {
      vars: append(curIn.vars, nextOut.dec),
      enclosed_by: curIn.enclosed_by,
    };

    foldStatements(
      statementFolder,
      origOut,
      nextOut,
      nextIn,
      [(thisMapped, loc), ...curRevMappeds],
      tl,
    );
  };
/* No inputs to each stage, and no other output but the computed AST */
let optOutput = (f, x) =>
  switch (x) {
  | None => (emptyOutput, None)
  | Some(data) =>
    let (out, mapped) = f(data);
    (out, Some(mapped));
  };

/* No inputs to each stage, and no other output but the computed AST */
let optAppendOutput = (appendTo, f, x) =>
  switch (x) {
  | None => (appendTo, None)
  | Some(data) =>
    let (out, mapped) = f(data);
    (outAppend(appendTo, out), Some(mapped));
  };

/*
  This is a special label that indicates a continue occurred inside a switch.
  We need this label because "continue" in switches in Hack/PHP mean the
  same as break. To have the same behavior as JS, we use the continue_label
  and check it after the switch.

  For example, this JS:

    for () {
      switch() {
        case 0:
          continue
      }
    }

  Becomes this Hack/PHP:

    for () {
      switch() {
        case 0:
          continue_label = "#";
          break;
      }
      if (continue_label === "#") {
        continue;
      }
    }
 */
let switch_label = "#";
let continue_label = Php.EVar(Id.ident("$continue_label"));

let breakIfNonnullContinueLabel = {
  let compare_continue_label_to_null =
    Php.EBin(NotEqEq, continue_label, ENULL);
  (
    Php.If_statement(
      compare_continue_label_to_null,
      (Php.Block([(Break_statement, Loc.N)]), Loc.N),
      None,
      false,
    ),
    Loc.N,
  );
};

let continueIfContinueLabelEquals = (~alternate=?, label) => {
  let compare_continue_to_parent_loop =
    Php.EBin(EqEqEq, continue_label, EStr(label, `Utf8));
  (
    Php.If_statement(
      compare_continue_to_parent_loop,
      (Php.Block([(Continue_statement, Loc.N)]), Loc.N),
      alternate,
      true,
    ),
    Loc.N,
  );
};

let setContinueLabel = label => (
  Php.Variable_statement([
    (
      continue_label,
      Some((
        switch (label) {
        | None => ENULL
        | Some(label) => Php.EStr(label, `Utf8)
        },
        Loc.N,
      )),
    ),
  ]),
  Loc.N,
);

let rec foldExprs = (curMappedRev, mapper, input, curOut, wrapper, remain) =>
  switch (remain) {
  | [] => (curOut, wrapper(List.rev(curMappedRev)))
  | [hd, ...tl] =>
    let (out, mapped) = mapper(input, hd);
    foldExprs(
      [mapped, ...curMappedRev],
      mapper,
      input,
      outAppend(curOut, out),
      wrapper,
      tl,
    );
  };
let rec foldVars =
        (
          mapper,
          curOut: output,
          curInput: input,
          curRevMappeds:
            list((Php.expression, option((Php.expression, Loc.t)))),
          remain,
        )
        : (
            output,
            list((Php.expression, option((Php.expression, Loc.t)))),
          ) =>
  switch (remain) {
  | [] => (curOut, List.rev(curRevMappeds))
  | [(id, eo), ...tl] =>
    let identMapped = ident(input, id);
    /* print_string( */
    /*   String.make(indent.contents, ' ') ++ "var declare " ++ str(id), */
    /* ); */
    /* print_newline(); */
    switch (eo) {
    | None =>
      if (exists(curOut.use, id)) {
        let (out, next) = (
          curOut,
          (Php.EVar(identMapped), Some((Php.EVar(identMapped), Loc.N))),
        );
        foldVars(mapper, out, curInput, [next, ...curRevMappeds], tl);
      } else {
        let (out, initMapped) =
          optAppendOutput(curOut, mapper(curInput), eo);
        let out = {...out, dec: addOne(out.dec, id)};
        let input = {
          ...curInput,
          vars: addOne(curInput.vars, id),
        };
        let next = [(Php.EVar(identMapped), initMapped), ...curRevMappeds];
        foldVars(mapper, out, input, next, tl);
      }
    | Some(e) =>
      let (rhsOut, (mapped, loc)) = mapper(curInput, e);
      /* TODO: Add a !exists(curOut.dec) to fix the valid_float_lexem case */
      if (!exists(curOut.dec, id)
          && (exists(curOut.use, id) || exists(rhsOut.use, id))) {
        let (out, dummy) = (
          outAppend(curOut, rhsOut),
          (Php.EDot(EVar(identMapped), "contents"), Some((mapped, loc))),
        );
        let next = [dummy, ...curRevMappeds];
        foldVars(mapper, out, curInput, next, tl);
      } else {
        let (out, initMapped) =
          optAppendOutput(curOut, mapper(curInput), eo);
        let out = {...out, dec: addOne(out.dec, id)};
        let input = {
          vars: addOne(curInput.vars, id),
          enclosed_by: curInput.enclosed_by,
        };
        let next = [(Php.EVar(identMapped), initMapped), ...curRevMappeds];
        foldVars(mapper, out, input, next, tl);
      };
    };
  };
let wrapInStruct = lst => Php.EStruct(lst);
let joinAll = lst => List.fold_left(~f=outAppend, ~init=emptyOutput, lst);
let rec expression = (input: input, x) =>
  switch (x) {
  | Rehp.ESeq(e1, e2) =>
    let (e1Out, e1Mapped) = expression(input, e1);
    let (e2Out, e2Mapped) = expression(input, e2);
    let joined = outAppend(e1Out, e2Out);
    (joined, Expand.seq(e1Mapped, e2Mapped));
  | Rehp.ERaw(s) => (emptyOutput, Expand.raw(s))
  | Rehp.ECond(e1, e2, e3) =>
    let (e1Out, e1Mapped) = expression(input, e1);
    let (e2Out, e2Mapped) = expression(input, e2);
    let (e3Out, e3Mapped) = expression(input, e3);
    let joined = outAppend(outAppend(e1Out, e2Out), e3Out);
    (joined, Php.ECond(e1Mapped, e2Mapped, e3Mapped));
  | Rehp.EBin(b, e1, e2) =>
    let (e1Out, e1Mapped) = expression(input, e1);
    let (e2Out, e2Mapped) = expression(input, e2);
    let joined = outAppend(e1Out, e2Out);
    (joined, Php.EBin(binop_from_rehp(b), e1Mapped, e2Mapped));
  | Rehp.EUn(b, e1) => unop_from_rehp(input, b, e1)
  | Rehp.ECall(e1, e2, loc) =>
    let (e1Out, e1Mapped) = expression(input, e1);
    let (e2Outs, e2_mappeds) =
      List.split(List.map(~f=expression(input), e2));
    (joinAll([e1Out, ...e2Outs]), Php.ECall(e1Mapped, e2_mappeds, loc));
  | Rehp.ECopy(e1, loc) =>
    let (e1Out, e1Mapped) = expression(input, e1);
    (e1Out, Php.ECall(Php.EDot(e1Mapped, "toVector"), [], loc));
  | Rehp.EAccess(e1, e2) =>
    let (e1Out, e1Mapped) = expression(input, e1);
    let (e2Out, e2Mapped) = expression(input, e2);
    (outAppend(e1Out, e2Out), Php.EAccess(e1Mapped, e2Mapped));
  | Rehp.EStructAccess(e1, e2) =>
    let (e1Out, e1Mapped) = expression(input, e1);
    let (e2Out, e2Mapped) = expression(input, e2);
    let joined = outAppend(e1Out, e2Out);
    (joined, Php.EStructAccess(e1Mapped, e2Mapped));
  | Rehp.EArrAccess(e1, e2) =>
    let (e1Out, e1Mapped) = expression(input, e1);
    let (e2Out, e2Mapped) = expression(input, e2);
    let joined = outAppend(e1Out, e2Out);
    (joined, Php.EArrAccess(e1Mapped, e2Mapped));
  | Rehp.EDot(e1, id) =>
    let (e1Out, e1Mapped) = expression(input, e1);
    (e1Out, EDot(e1Mapped, id));
  | Rehp.ENew(e1, Some(args)) =>
    let (e1Out, e1Mapped) = expression(input, e1);
    let (argsOuts, args_mappeds) =
      List.split(List.map(~f=expression(input), args));
    (joinAll([e1Out, ...argsOuts]), ENew(e1Mapped, Some(args_mappeds)));
  | Rehp.ENew(e1, None) =>
    let (e1Out, e1Mapped) = expression(input, e1);
    (e1Out, Php.ENew(e1Mapped, None));
  | Rehp.EVar(Id.S({name: "null", _})) => (emptyOutput, Php.EArr([]))
  /* Undefined is NULL */
  | Rehp.EVar(Id.S({name: "undefined", _})) => (emptyOutput, Php.ENULL)
  | Rehp.EVar(v) =>
    let out = {...emptyOutput, use: useOneVar(v)};
    (
      out,
      if (exists(input.vars, v)) {
        EVar(ident(input, v));
      } else {
        EDot(EVar(ident(input, v)), "contents");
      },
    );
  | Rehp.EFun((idopt, params, body, nid)) =>
    /* New vars scoped to the body of function */
    let newBodyVars = List.fold_left(~f=addOne, ~init=empty, params);
    /*
     * Rehp intermediate representation assumes that EFun's identifier (which
     * is almost always omitted in practice) may only be available to the
     * function body's scope - not containing scope. There isn't a
     * straightforward way to represent that in Php. It should be delegated to
     * stubs, and we can remove the ability for Efun to have identifiiers.
     */
    /* let newBodyVars = */
    /*   switch (ident) { */
    /*   | Some(i) => addOne(newBodyVars, i) */
    /*   | None => newBodyVars */
    /*   }; */
    let augmentedEnv = append(input.vars, newBodyVars);
    let curOut = {...emptyOutput, dec: newBodyVars};
    let (bodyOut, bodyMap) =
      sources(
        curOut,
        {vars: augmentedEnv, enclosed_by: NoLoopOrSwitch},
        body,
      );
    /* Rehp models an IR with "function scope" for variables. */
    /* Declarations reset at function boundaries. */
    let bodyUsesFromOutside = remove(bodyOut.use, newBodyVars);
    let bodyUsesFromOutside = remove(bodyUsesFromOutside, bodyOut.dec);
    /* let bodyUsesScope = intersect(bodyUsesFromOutside, input); */
    /* let bodyUsesGlobal = remove(bodyUsesFromOutside, input); */
    /* let fromScope = (bodyUsesScope.names, bodyUsesScope.vars); */
    /* let fromGlob = (bodyUsesGlobal.names, bodyUsesGlobal.vars); */
    let out = {...emptyOutput, use: bodyUsesFromOutside};
    let paramIdentList = List.map(~f=ident(input), params);

    let bodyUsesFromOutsideIdents =
      List.map(
        ~f=((k, _)) => Id.ident(identStr(~ref=false, k)),
        StringMap.bindings(bodyUsesFromOutside.names),
      );

    (
      out,
      EFun((
        idopt,
        paramIdentList,
        bodyMap,
        /* We no longer need to designate globals as they will become runtime
         * vars, we we have the PHP indicate that they are "in scope", but in
         * the output, we indicate that they were not - (so that they can be
         * _put_ in scope). */
        /* fromGlob, */
        /* fromScope, */
        [],
        bodyUsesFromOutsideIdents,
        nid,
      )),
    );

  | Rehp.EVectlength(e) =>
    let (eOut, eMapped) = expression(input, e);
    let eMapped = Php.(EBin(Minus, EDot(eMapped, "count()"), EInt(1)));
    (eOut, eMapped);
  | Rehp.EArrLen(e) =>
    let (eOut, eMapped) = expression(input, e);
    (eOut, EArrLen(eMapped));
  | Rehp.EStruct(l) =>
    foldExprs([], expression, input, emptyOutput, wrapInStruct, l)
  | Rehp.ETag(i, l) =>
    let (iOut, iMapped) = expression(input, i);
    let (outs, mappeds) = List.split(List.map(~f=expression(input), l));
    (joinAll([iOut, ...outs]), Php.ETag(iMapped, mappeds));
  /* Should have already converted EArr to functions. */
  | Rehp.EArr(l) => (
      emptyOutput,
      Php.EArr(
        List.map(
          ~f=
            elem =>
              switch (elem) {
              | Some(elem) => Some(snd(expression(input, elem)))
              | None => None
              },
          l,
        ),
      ),
    )
  | Rehp.EArityTest(_) => assert(false)
  | Rehp.EObj(l) =>
    let (outs, mappeds) =
      List.split(
        List.map(
          ~f=
            ((i, e)) => {
              let (out, mapped) = expression(input, e);
              (out, (i, mapped));
            },
          l,
        ),
      );
    (joinAll(outs), Php.EObj(mappeds));
  | Rehp.EStr(x, y) => (emptyOutput, Php.EStr(x, y))
  | Rehp.EBool(b) => (emptyOutput, Php.EBool(b))
  | Rehp.EFloat(n) => (emptyOutput, Php.ENum(n))
  | Rehp.EInt(n) => (emptyOutput, Php.EInt(n))
  | Rehp.EQuote(s) => (emptyOutput, Php.EQuote(s))
  | Rehp.ERegexp(x, y) => (emptyOutput, Php.ERegexp(x, y))
  }
/*
 * For a given Rehp unary operator, and an expression that has already been
 * converted into Php, turn the unary Rehp operation into Php.
 */
and unop_from_rehp = (input, unop, rehpExpr) =>
  switch (unop) {
  | Rehp.Not =>
    let (outMapped, exprMapped) = expression(input, rehpExpr);
    (outMapped, Php.EUn(Php.Not, exprMapped));
  | ToInt =>
    let (outMapped, exprMapped) = expression(input, rehpExpr);
    (outMapped, EUn(ToInt, exprMapped));
  | Neg =>
    let (outMapped, exprMapped) = expression(input, rehpExpr);
    (outMapped, EUn(Neg, exprMapped));
  | Pl =>
    let (outMapped, exprMapped) = expression(input, rehpExpr);
    (outMapped, EUn(Pl, exprMapped));
  | Typeof =>
    let (outMapped, exprMapped) = expression(input, rehpExpr);
    (outMapped, EUn(Typeof, exprMapped));
  /* Should have already been converted in Identifier_renaming_php. */
  | IsInt =>
    raise(
      Invalid_argument(
        "Should not be producing IsInt when targeting PHP."
        ++ " The runtime file you supplied likely omitted is_int",
      ),
    )
  /* Only for stubs */
  | Void =>
    let (outMapped, exprMapped) = expression(input, rehpExpr);
    (outMapped, EUn(Void, exprMapped));
  | Delete =>
    let (outMapped, exprMapped) = expression(input, rehpExpr);
    (outMapped, EUn(Delete, exprMapped));
  | Bnot =>
    let (outMapped, exprMapped) = expression(input, rehpExpr);
    (outMapped, EUn(Bnot, exprMapped));
  | IncrA =>
    let (outMapped, exprMapped) = expression(input, rehpExpr);
    (outMapped, EUn(IncrA, exprMapped));
  | DecrA =>
    let (outMapped, exprMapped) = expression(input, rehpExpr);
    (outMapped, EUn(DecrA, exprMapped));
  | IncrB =>
    let (outMapped, exprMapped) = expression(input, rehpExpr);
    (outMapped, EUn(IncrB, exprMapped));
  | DecrB =>
    let (outMapped, exprMapped) = expression(input, rehpExpr);
    (outMapped, EUn(DecrB, exprMapped));
  }
and switchCase = (input, e) => expression(input, e)
and initialiser = (input: input, (e, pc)) => {
  let (o, m) = expression(input, e);
  (o, (m, pc));
}
/* TODO: The free vars should also be mapped over. But if you wait to add
   them until the end, that isn't required. */
and source = (curOutput, input: input, x) =>
  switch (x) {
  /*
   * TODO: For now, this should be converted to a Rehp.EFun, since that is what
   * a Rehp.Function_declaration actually models. A Php.Function_declaration is
   * a top level global namespaced function with very different semantics, and
   * no ability to "use".  For now Php.Function_declaration retains the ability
   * to use as it was a fork of Rehp.
   */
  | Rehp.Function_declaration((id, params, body, nid)) =>
    let lam = Rehp.EFun((None, params, body, nid));
    let asVar = Rehp.Variable_statement([(id, Some((lam, nid)))]);
    /* print_string("Function_declaration " ++ str(id)); */
    /* print_newline(); */
    source(curOutput, input, Rehp.Statement(asVar));

  /*
       /* New vars scoped to the body of function */
       let newBodyVars = List.fold_left(addOne, empty, params);
       /* Still true even if this will be rewritten as Variable binding to EFun. */
       /* Vars that augment the surrounding environment */
       let newOutsideVars = useOneVar(id);
       let augmentedEnv = append(append(env, newBodyVars), newOutsideVars);
       let (bodyOut, bodyMap) = sources((augmentedEnv), body);
       /*
        * TODO: Don't just remove but decrement instead. Actually this might not
        * matter thanks to immutability!
        */
       let bodyUsesFromOutside = remove(bodyOut.use, newBodyVars);
       let bodyUsesFromOutside = remove(bodyUsesFromOutside, bodyOut.dec);
       /* let bodyUsesScope = intersect(bodyUsesFromOutside, env); */
       /* let bodyUsesGlobal = remove(bodyUsesFromOutside, env); */
       let out = {use: bodyUsesFromOutside, dec: newOutsideVars};
       /* let fromScope = (bodyUsesScope.names, bodyUsesScope.vars); */
       /* let fromGlob = (bodyUsesGlobal.names, bodyUsesGlobal.vars); */
       assert(Code.VarMap.is_empty(bodyUsesFromOutside.vars));
       let paramIdentList = List.map(ident(input), params);

       let bodyUsesFromOutsideIdents =
         List.map(
           ((k, v)) => Id.S({name: identStr(~ref=true, k), var: None}),
           Util.StringMap.bindings(bodyUsesFromOutside.names),
         );
       (
         out,
         Php.Function_declaration((
           ident(input, id),
           paramIdentList,
           bodyMap,
           /* We no longer need to designate globals as they will become runtime
            * vars, we we have the PHP indicate that they are "in scope", but in
            * the output, we indicate that they were not - (so that they can be
            * _put_ in scope). */
           /* fromGlob, */
           /* fromScope, */
           [],
           bodyUsesFromOutsideIdents,
           nid,
         )),
       );
   */
  | Statement(s) =>
    let (out, mapped) = statement(curOutput, input, s);
    (out, Php.Statement(mapped));
  }
/*
 * Ensures that all the declared variables in a function body contributes to
 * the `input` lexical scope of the next binding. This satisfies very linearly
 * declared environments, but is not sufficient for mutually recursive
 * bindings.
 *
 * To support mutually recursive bindings, we will first do a single shallow
 * analysis of all the variable bindings and functions declared.  For each one,
 * we bump their declaration-scope counts. We need to be careful not to bump
 * them twice though (actually that might not matter for input).
 */
and sources = (curOut, input: input, x) => {
  /* print_string ("SOURCES"); */
  /* print_newline (); */
  let topLevelIdents =
    List.fold_left(~f=topLevelIdentifiers, ~init=input.vars, x);
  let (out, mappeds) = foldSources(source, curOut, input, [], x);
  let toHoist =
    remove(remove(intersect(out.use, topLevelIdents), out.dec), input.vars);
  if (isEmpty(toHoist)) {
    (
      /* print_string ("/SOURCES"); */
      /* print_newline (); */
      out,
      mappeds,
    );
  } else {
    let identsAndInits = StringMap.bindings(toHoist.names);
    let refs = List.map(~f=createRef, identsAndInits);
    let refDecls = Php.Statement(Variable_statement(refs));
    /*
     * EFun will remove the used variables that are in dec.
     */
    let out = {...out, dec: append(out.dec, toHoist)};
    /* print_string ("/SOURCES"); */
    /* print_newline (); */
    (out, [(refDecls, Loc.N), ...mappeds]);
  };
}
and statements = (curOut, input: input, l) => {
  /* print_string(String.make(indent.contents, ' ') ++ "<statements>"); */
  /* print_newline(); */
  indent.contents = indent.contents + 2;
  let ret = foldStatements(statement, curOut, curOut, input, [], l);
  indent.contents = indent.contents - 2;
  /* print_string(String.make(indent.contents, ' ') ++ "</statements>"); */
  /* print_newline(); */
  ret;
}
and for_statement = (curOut, input: input, e1, e2, e3, (s, loc), label) => {
  let (e1Out, e1Mapped) =
    switch (e1) {
    | Left(x) =>
      let (xOut, x_mapped) = optOutput(expression(input), x);
      (xOut, Left(x_mapped));
    | Right(l) =>
      let (output, res) = foldVars(initialiser, curOut, input, [], l);
      (output, Right(res));
    };
  let nextInput = {
    vars: append(input.vars, e1Out.dec),
    enclosed_by:
      switch (label) {
      | None => UnlabelledLoop
      | Some(label) => LabelledForLoop(label)
      },
  };
  let (e2Out, e2Mapped) = optOutput(expression(nextInput), e2);
  let (e3Out, e3Mapped) = optOutput(expression(nextInput), e3);
  let (sOut, sMapped) = statement(curOut, nextInput, s);
  let outs = outAppend(outAppend(outAppend(e1Out, e2Out), e3Out), sOut);

  /* Always wrapped for loop contents in a block */
  /* Reset the continue_label whenever entering a labelled loop */
  let (sMapped, myLabel) =
    switch (sMapped, label) {
    | (Php.Block(s), None) => (sMapped, "")
    | (Php.Block(s), Some(myLabel)) => (
        Php.Block([setContinueLabel(None), ...s]),
        myLabel,
      )
    | (_, None) => (Php.Block([(sMapped, loc)]), "")
    | (_, Some(myLabel)) => (
        Php.Block([setContinueLabel(None), (sMapped, loc)]),
        myLabel,
      )
    };
  let for_statement_node = (
    Php.For_statement(e1Mapped, e2Mapped, e3Mapped, (sMapped, loc)),
    loc,
  );

  /* shield any continues that have this loop's label */
  let free_labels = List.filter(label => label != myLabel, outs.free_labels);

  let li =
    switch (input.enclosed_by, List.length(free_labels) > 0) {
    /* if the loop does not contain a labelled continue,
       or isn't inside any labelled loop,
       then just output the loop */
    | (_, false)
    | (NoLoopOrSwitch, true) => [for_statement_node]

    /* if the loop contains a labelled continue,
       and is inside an unlabelled loop,
       then check the continue_label to break to the outter loop */
    | (UnlabelledLoop, true) => [
        for_statement_node,
        breakIfNonnullContinueLabel,
      ]

    /* if the loop contains a labelled continue,
       and is inside an switch statement
       then check the continue_label to break out of the switch */
    | (Switch, true) => [for_statement_node, breakIfNonnullContinueLabel]

    /* if the loop contains a labelled continue,
       and is inside a labelled loop,
       then check if the labels match to continue,
       and also check the continue_label to break to the outter loop */
    | (LabelledForLoop(parent_label), true) =>
      let only_continue_to_parent_label =
        List.for_all(label => label == parent_label, free_labels);

      /* if the unshielded continues inside the loop only continue
         to the enclosing loop, then we don't need to break */
      let check_statement =
        only_continue_to_parent_label
          ? continueIfContinueLabelEquals(parent_label)
          : continueIfContinueLabelEquals(
              ~alternate=breakIfNonnullContinueLabel,
              parent_label,
            );
      [for_statement_node, check_statement];
    };

  ({...outs, free_labels}, Php.Statement_list(li));
}

/* and statement = (input, x) => statementFolder(emptyOutput, input, x) */
and statement = (curOut, input: input, x) => {
  let (out, mapped) =
    switch (x) {
    | Rehp.Block(b) =>
      let (out, mappedStatements) = statements(curOut, input, b);
      (out, Php.Block(mappedStatements));
    | Rehp.Raw_statement(provides, requires, s) =>
      let out = {
        dec: List.fold_left(~f=addOneString, ~init=curOut.dec, provides),
        use: List.fold_left(~f=addOneString, ~init=curOut.use, requires),
        free_labels: [],
      };
      (out, Raw_statement(s));
    | Rehp.Variable_statement(l) =>
      /* print_string(String.make(indent.contents, ' ') ++ "<vars>"); */
      indent.contents = indent.contents + 2;
      /* print_newline(); */
      let (out, mappedResults) = foldVars(initialiser, curOut, input, [], l);
      let ret = (out, Php.Variable_statement(mappedResults));
      indent.contents = indent.contents - 2;
      /* print_string(String.make(indent.contents, ' ') ++ "</vars>"); */
      /* let returningUsed = */
      /*   List.map(((k, v)) => k, Util.StringMap.bindings(out.use.names)); */
      /* print_newline(); */
      /* print_string( */
      /*   String.make(indent.contents, ' ') */
      /*   ++ " -- " */
      /*   ++ " returning used:!" */
      /*   ++ String.concat(",", returningUsed), */
      /* ); */
      /* print_newline(); */
      ret;
    | Rehp.Empty_statement => (curOut, Php.Empty_statement)
    | Rehp.Debugger_statement => (curOut, Php.Debugger_statement)
    | Rehp.Expression_statement(e) =>
      let (output, mapped) = expression(input, e);
      (outAppend(curOut, output), Php.Expression_statement(mapped));
    | Rehp.If_statement(e, s, sopt) =>
      let statementLocation = ((stmt: Rehp.statement, loc: Loc.t)) => {
        let (out, mapped) = statement(curOut, input, stmt);
        (out, (mapped, loc));
      };
      let (exprOutput, exprMapped) = expression(input, e);
      let (ifOutput, ifMapped) = statementLocation(s);
      let (soptOut, soptMapped) = optOutput(statementLocation, sopt);
      let output = outAppend(outAppend(exprOutput, ifOutput), soptOut);
      (output, If_statement(exprMapped, ifMapped, soptMapped, false));
    | Rehp.For_statement(e1, e2, e3, (s, loc), _) =>
      for_statement(curOut, input, e1, e2, e3, (s, loc), None)
    /*
     * TODO: For Php, the exception is not actually block scoped and so we don't
     * need to do any special handling here.
     */
    | Rehp.Continue_statement(s, _) =>
      let (label, li) =
        switch (s, input.enclosed_by) {
        /* if the continue isn't labeled, and occurs inside a switch,
           switch/cases can't have continues, so convert it to a break
           and set continue_label to a special "switch" label */
        | (None, Switch) => (
            "",
            [
              setContinueLabel(Some(switch_label)),
              (Php.Break_statement, Loc.N),
            ],
          )
        /* if the continue isn't labeled, and isn't in a switch,
           keep it as a continue*/
        | (None, _) => ("", [(Php.Continue_statement, Loc.N)])
        /* if the continue has a label, then convert it to a break and set
           continue_label to its label */
        | (Some(lbl), _) =>
          let label = Javascript.Label.to_string(lbl);
          (
            label,
            [setContinueLabel(Some(label)), (Php.Break_statement, Loc.N)],
          );
        };
      (
        {
          dec: curOut.dec,
          use: curOut.use,
          free_labels: [label, ...curOut.free_labels],
        },
        Php.Statement_list(li),
      );
    /* TODO: remove labels from Rehp break statements */
    | Rehp.Break_statement(_s) => (curOut, Break_statement)
    | Rehp.Return_statement(e) =>
      let (eOut, eMapped) = optOutput(expression(input), e);
      (outAppend(curOut, eOut), Return_statement(eMapped));
    | Rehp.Labelled_statement(
        lbl,
        (Rehp.For_statement(e1, e2, e3, (s, loc), _), _loc2),
      ) =>
      for_statement(
        curOut,
        input,
        e1,
        e2,
        e3,
        (s, loc),
        Some(Javascript.Label.to_string(lbl)),
      )
    | Rehp.Labelled_statement(_) =>
      /* Only For_statements can be labelled */
      /* TODO: remove labelled statements from Rehp, replace with a flag in For_statements */
      raise(Unsupported_statement)
    | Rehp.Throw_statement(e) =>
      let (eOut, eMapped) = expression(input, e);
      (outAppend(curOut, eOut), Throw_statement(eMapped));
    | Rehp.Switch_statement(e, l, def, l') =>
      let nextInput = {vars: input.vars, enclosed_by: Switch};
      let (eOut, eMapped) = expression(nextInput, e);
      let (dOut, dMapped) = optOutput(statements(curOut, nextInput), def);
      let forEach = ((e, s)) => {
        let (eOut, eMapped) = switchCase(nextInput, e);
        let (stmOut, stmMapped) = statements(curOut, nextInput, s);
        let outs = outAppend(eOut, stmOut);
        (outs, (eMapped, stmMapped));
      };
      let (lOut, lMapped) = List.split(List.map(~f=forEach, l));
      let forEach = ((e, s)) => {
        let (eOut, eMapped) = switchCase(nextInput, e);
        let (stmOut, stmMapped) = statements(curOut, nextInput, s);
        let outs = outAppend(eOut, stmOut);
        (outs, (eMapped, stmMapped));
      };
      let (lOut', lMapped') = List.split(List.map(~f=forEach, l'));
      let outs = joinAll([eOut, dOut, ...lOut @ lOut']);
      let switch_node = (
        Php.Switch_statement(eMapped, lMapped, dMapped, lMapped'),
        Loc.N,
      );

      let labels = List.filter(label => label != "", outs.free_labels);
      let continue_kind =
        if (List.length(outs.free_labels) === 0) {
          NoContinue;
        } else if (List.length(outs.free_labels) === List.length(labels)) {
          ContinueWithLabel(labels);
        } else if (List.length(labels) === 0) {
          UnlabelledContinueInCase;
        } else {
          ContinueWithLabelAndInCase(labels);
        };

      let li =
        switch (input.enclosed_by, continue_kind) {
        /* if the switch does not contain a continue,
           or isn't inside any labelled structure,
           then just output the switch */
        | (_, NoContinue)
        | (NoLoopOrSwitch, _) => [switch_node]

        /* check for a non-null label, to break further out */
        | (UnlabelledLoop, ContinueWithLabel(_))
        | (Switch, UnlabelledContinueInCase)
        | (Switch, ContinueWithLabel(_))
        | (Switch, ContinueWithLabelAndInCase(_)) => [
            switch_node,
            breakIfNonnullContinueLabel,
          ]

        /* 1. reset the continue label before entering the switch, and
           2. check for the special "switch" label, to continue inside the loop */
        | (UnlabelledLoop, UnlabelledContinueInCase)
        | (LabelledForLoop(_), UnlabelledContinueInCase) => [
            setContinueLabel(None),
            switch_node,
            continueIfContinueLabelEquals(switch_label),
          ]

        /* 1. reset the continue label before entering the switch, and
           2. check for the special "switch" label, to continue inside the loop, and
           3. check for a non-null label, to break further out */
        | (UnlabelledLoop, ContinueWithLabelAndInCase(_)) => [
            setContinueLabel(None),
            switch_node,
            continueIfContinueLabelEquals(
              ~alternate=breakIfNonnullContinueLabel,
              switch_label,
            ),
          ]

        /* 1. reset the continue label before entering the switch, and
           2. check the special "switch" label, to continue inside the loop, and
           3. check the current loop's label, to continue inside the loop, and
           4. check for a non-null label, to break further out */
        | (
            LabelledForLoop(parent_label),
            ContinueWithLabel(labels) | ContinueWithLabelAndInCase(labels),
          ) =>
          let only_continue_to_parent_label =
            List.for_all(label => label == parent_label, labels);

          /* if the unshielded continues inside the switch only continue
             to the enclosing loop, then we don't need to break */
          let check_statement =
            only_continue_to_parent_label
              ? continueIfContinueLabelEquals(parent_label)
              : continueIfContinueLabelEquals(
                  ~alternate=breakIfNonnullContinueLabel,
                  parent_label,
                );
          [
            setContinueLabel(None),
            switch_node,
            continueIfContinueLabelEquals(
              ~alternate=check_statement,
              switch_label,
            ),
          ];
        };
      (outs, Statement_list(li));
    | Rehp.Try_statement(b, catch, final) =>
      /*
       * Customization that augments the scope with catch identifier.
       */
      let identAndStatements = ((idnt, st)) => {
        let identMapped = ident(input, idnt);
        let addedVars = useOneVar(idnt);
        let augmentedInput = {
          vars: append(input.vars, addedVars),
          enclosed_by: input.enclosed_by,
        };
        let (stOut, stMapped) = statements(curOut, augmentedInput, st);
        let stUses = remove(stOut.use, addedVars);
        let out = {...stOut, use: stUses};
        (out, (identMapped, stMapped));
      };
      let (bOut, bMapped) = statements(curOut, input, b);
      let (catchOut, catchMapped) = optOutput(identAndStatements, catch);
      let (finalOut, finalMapped) =
        optOutput(statements(curOut, input), final);
      let out = {
        use: append(bOut.use, append(catchOut.use, finalOut.use)),
        dec: append(bOut.dec, append(catchOut.dec, finalOut.dec)),
        free_labels:
          List.concat([
            bOut.free_labels,
            catchOut.free_labels,
            finalOut.free_labels,
          ]),
      };
      (out, Try_statement(bMapped, catchMapped, finalMapped));
    };
  (outAppend(curOut, out), mapped);
}
and program = (input, x) => {
  /* print_string("PROGRAM"); */
  /* print_newline(); */
  let ret = sources(emptyOutput, input, x);
  /* print_string("/PROGRAM"); */
  /* print_newline(); */
  ret;
};
