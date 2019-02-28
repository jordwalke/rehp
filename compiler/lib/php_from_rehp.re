open Stdlib;

/**
 * All the code that "expands" high level Rehp into concrete Php.
 */
module Expand = {
  let seq = (e1, e2) => Php.ECond(Php.EBin(Or, e1, EBool(true)), e2, e2);
};

let indent = {contents: 0};

type vars = {
  names: StringMap.t(int),
  vars: Code.Var.Map.t(int),
};

type input = vars;
type output = {
  dec: vars,
  use: vars,
};

let escapeIdent = s => Stdlib.escape(s, '$', "____");
let identStr = (~ref=false, name: string): string =>
  ref ? "&$" ++ (name: string) : "$" ++ (escapeIdent(name): string);
let ident = (~ref=false, _input, i): Id.t =>
  switch (i) {
  | Id.S({name: id}) => Id.S({name: identStr(~ref, id), var: None})
  | Id.V(_) => assert(false)
  };

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
  | Lsl => Lsl
  /* Php doesn't have an equivalent - this should have been turned into calls
   * to unsigned_right_shift_32 by this point. */
  | Lsr => assert(false)
  | Asr => Asr
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
let emptyOutput = {dec: empty, use: empty};

let exists = (cur, id) =>
  switch (id) {
  | Id.S({name: s}) => StringMap.mem(s, cur.names)
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
let addOneString = (addTo, s) => addOne(addTo, Id.S({name: s, var: None}));

let useOneVar = addOne(empty);

let mergeSum = (_k, count1, count2) =>
  switch (count1, count2) {
  | (None, None) => None /* Okay, what situation is this? */
  | (Some(n), None) => Some(1)
  | (None, Some(n)) => Some(1)
  | (Some(m), Some(n)) => Some(1)
  };

let isEmpty = cur =>
  Code.Var.Map.is_empty(cur.vars) && StringMap.is_empty(cur.names);

let append = (cur, next) => {
  vars: Code.Var.Map.merge(mergeSum, cur.vars, next.vars),
  names: StringMap.merge(mergeSum, cur.names, next.names),
};

/*
 * TODO: Always remove zerod out values.
 */
let remove = (cur, remove) => {
  vars:
    Code.Var.Map.filter(
      (k, _) => !Code.Var.Map.mem(k, remove.vars),
      cur.vars,
    ),
  names:
    StringMap.filter((k, _) => !StringMap.mem(k, remove.names), cur.names),
};

let intersect = (cur, intersect_with) => {
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

let exists = (cur, id) =>
  switch (id) {
  | Id.S({name: s}) => StringMap.mem(s, cur.names)
  | V(v) => Code.Var.Map.mem(v, cur.vars)
  };

let outAppend = (cur, next) => {
  dec: append(cur.dec, next.dec),
  use: append(cur.use, next.use),
};

let createRef = ((name, _)) => {
  let newRef = Php.ENew(EVar(Id.S({name: "Ref", var: None})), None);
  (Id.S({name: identStr(name), var: None}), Some((newRef, Loc.N)));
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
  | For_statement(Right(l), _e2, _e3, (_s, _loc)) =>
    let augmentEnv = (env, (id, _eopt)) => addOne(env, id);
    let addedVars = List.fold_left(~f=augmentEnv, ~init=empty, l);
    append(newVarsSoFar, addedVars);
  | ForIn_statement(Right((id, _eopt)), _e2, (_s, _loc)) =>
    let addedVars = useOneVar(id);
    append(newVarsSoFar, addedVars);
  /*
   * TODO: Probably need to go one level deeper on the try body.
   */
  | Try_statement(_, _, _) => newVarsSoFar
  | _ => newVarsSoFar
  };

let topLevelIdentifiersStLoc = (newVarsSoFar, (st, _loc)) =>
  topLevelIdentifiersSt(newVarsSoFar, st);

let topLevelIdentifiers = (newVarsSoFar, (src, _)) =>
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
    let nextInput = append(curIn, nextOut.dec);
    foldSources(
      sourceFolder,
      nextOut,
      nextInput,
      [(thisMapped, loc), ...curRevMappeds],
      tl,
    );
  };

let rec foldStatements =
        (statementFolder, curOut, curIn, curRevMappeds, remain) =>
  switch (remain) {
  | [] => (curOut, List.rev(curRevMappeds))
  | [(s, loc), ...tl] =>
    let (thisOut, thisMapped) = statementFolder(curOut, curIn, s);
    let nextOut = outAppend(curOut, thisOut);
    let nextIn = append(curIn, nextOut.dec);

    foldStatements(
      statementFolder,
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
let str = id =>
  switch (id) {
  | Id.S({name}) => name
  | V(_) => ""
  };
let rec foldVars = (mapper, curOut, curInput, curRevMappeds, remain) =>
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
          (identMapped, Some((Php.EVar(identMapped), Loc.N))),
        );
        foldVars(mapper, out, curInput, [next, ...curRevMappeds], tl);
      } else {
        let (out, initMapped) =
          optAppendOutput(curOut, mapper(curInput), eo);
        let out = {...out, dec: addOne(out.dec, id)};
        let input = addOne(curInput, id);
        let next = [(identMapped, initMapped), ...curRevMappeds];
        foldVars(mapper, out, input, next, tl);
      }
    | Some(e) =>
      let (rhsOut, (mapped, loc)) = mapper(curInput, e);
      /* TODO: Add a !exists(curOut.dec) to fix the valid_float_lexem case */
      if (!exists(curOut.dec, id)
          && (exists(curOut.use, id) || exists(rhsOut.use, id))) {
        let dummyId = Id.S({name: "$_", var: None});
        let updateExpr =
          Php.EBin(Php.Eq, EDot(EVar(identMapped), "contents"), mapped);
        let (out, dummy) = (
          outAppend(curOut, rhsOut),
          (dummyId, Some((updateExpr, loc))),
        );
        let next = [dummy, ...curRevMappeds];
        foldVars(mapper, out, curInput, next, tl);
      } else {
        let (out, initMapped) =
          optAppendOutput(curOut, mapper(curInput), eo);
        let out = {...out, dec: addOne(out.dec, id)};
        let input = addOne(curInput, id);
        let next = [(identMapped, initMapped), ...curRevMappeds];
        foldVars(mapper, out, input, next, tl);
      };
    };
  };
let wrapInStruct = lst => Php.EStruct(lst);
let joinAll = lst => List.fold_left(~f=outAppend, ~init=emptyOutput, lst);
let rec expression = (input, x) =>
  switch (x) {
  | Rehp.ESeq(e1, e2) =>
    let (e1Out, e1Mapped) = expression(input, e1);
    let (e2Out, e2Mapped) = expression(input, e2);
    let joined = outAppend(e1Out, e2Out);
    (joined, Expand.seq(e1Mapped, e2Mapped));
  | Rehp.ERaw(s) => (emptyOutput, Php.ERaw(s))
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
    let (e2Outs, e2_mappeds) = List.split(List.map(expression(input), e2));
    (joinAll([e1Out, ...e2Outs]), Php.ECall(e1Mapped, e2_mappeds, loc));
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
      List.split(List.map(expression(input), args));
    (joinAll([e1Out, ...argsOuts]), ENew(e1Mapped, Some(args_mappeds)));
  | Rehp.ENew(e1, None) =>
    let (e1Out, e1Mapped) = expression(input, e1);
    (e1Out, Php.ENew(e1Mapped, None));
  | Rehp.EVar(Id.S({name: "null"})) => (emptyOutput, Php.EArr([]))
  /* Undefined is NULL */
  | Rehp.EVar(Id.S({name: "undefined"})) => (emptyOutput, Php.ENULL)
  | Rehp.EVar(v) =>
    let out = {use: useOneVar(v), dec: empty};
    (
      out,
      if (exists(input, v)) {
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
    let augmentedEnv = append(input, newBodyVars);
    let curOut = {use: empty, dec: newBodyVars};
    let (bodyOut, bodyMap) = sources(curOut, augmentedEnv, body);
    /* Rehp models an IR with "function scope" for variables. */
    /* Declarations reset at function boundaries. */
    let bodyUsesFromOutside = remove(bodyOut.use, newBodyVars);
    let bodyUsesFromOutside = remove(bodyUsesFromOutside, bodyOut.dec);
    /* let bodyUsesScope = intersect(bodyUsesFromOutside, input); */
    /* let bodyUsesGlobal = remove(bodyUsesFromOutside, input); */
    /* let fromScope = (bodyUsesScope.names, bodyUsesScope.vars); */
    /* let fromGlob = (bodyUsesGlobal.names, bodyUsesGlobal.vars); */
    let out = {use: bodyUsesFromOutside, dec: empty};
    let paramIdentList = List.map(ident(input), params);

    let bodyUsesFromOutsideIdents =
      List.map(
        ((k, v)) => Id.S({name: identStr(~ref=false, k), var: None}),
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

  | Rehp.EArrLen(e) =>
    let (eOut, eMapped) = expression(input, e);
    (eOut, EArrLen(eMapped));
  | Rehp.EStruct(l) =>
    foldExprs([], expression, input, emptyOutput, wrapInStruct, l)
  | Rehp.ETag(i, l) =>
    let (iOut, iMapped) = expression(input, i);
    let (outs, mappeds) = List.split(List.map(expression(input), l));
    (joinAll([iOut, ...outs]), Php.ETag(iMapped, mappeds));
  /* Should have already converted EArr to functions. */
  | Rehp.EArr(l) => (
      emptyOutput,
      Php.EArr(
        List.map(
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
  | Rehp.ENum(n) => (emptyOutput, Php.ENum(n))
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
  | IsInt => assert(false)
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
and initialiser = (input, (e, pc)) => {
  let (o, m) = expression(input, e);
  (o, (m, pc));
}
/* TODO: The free vars should also be mapped over. But if you wait to add
   them until the end, that isn't required. */
and source = (curOutput, input, x) =>
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
and sources = (curOut, input, x) => {
  /* print_string ("SOURCES"); */
  /* print_newline (); */
  let topLevelIdents = List.fold_left(~f=topLevelIdentifiers, ~init=input, x);
  let (out, mappeds) = foldSources(source, curOut, input, [], x);
  let toHoist =
    remove(remove(intersect(out.use, topLevelIdents), out.dec), input);
  if (isEmpty(toHoist)) {
    (
      /* print_string ("/SOURCES"); */
      /* print_newline (); */
      out,
      mappeds,
    );
  } else {
    let identsAndInits = StringMap.bindings(toHoist.names);
    let refs = List.map(createRef, identsAndInits);
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
and statements = (curOut, input, l) => {
  /* print_string(String.make(indent.contents, ' ') ++ "<statements>"); */
  /* print_newline(); */
  indent.contents = indent.contents + 2;
  let ret = foldStatements(statement, curOut, input, [], l);
  indent.contents = indent.contents - 2;
  /* print_string(String.make(indent.contents, ' ') ++ "</statements>"); */
  /* print_newline(); */
  ret;
}
/* and statement = (input, x) => statementFolder(emptyOutput, input, x) */
and statement = (curOut, input, x) => {
  let (out, mapped) =
    switch (x) {
    | Rehp.Block(b) =>
      let (out, mappedStatements) = statements(curOut, input, b);
      (out, Php.Block(mappedStatements));
    | Rehp.Raw_statement(provides, requires, s) =>
      let out = {
        dec: List.fold_left(~f=addOneString, ~init=curOut.dec, provides),
        use: List.fold_left(~f=addOneString, ~init=curOut.use, requires),
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
      (output, If_statement(exprMapped, ifMapped, soptMapped));
    | Rehp.Do_while_statement((s, loc), e) =>
      let (sOut, sMapped) = statement(curOut, input, s);
      let (eOut, eMapped) = expression(input, e);
      (outAppend(sOut, eOut), Do_while_statement((sMapped, loc), eMapped));
    | Rehp.While_statement(e, (s, loc)) =>
      let (sOut, sMapped) = statement(curOut, input, s);
      let (eOut, eMapped) = expression(input, e);
      (outAppend(sOut, eOut), While_statement(eMapped, (sMapped, loc)));
    | Rehp.For_statement(e1, e2, e3, (s, loc)) =>
      let (e1Out, e1Mapped) =
        switch (e1) {
        | Left(x) =>
          let (xOut, x_mapped) = optOutput(expression(input), x);
          (xOut, Left(x_mapped));
        | Right(l) =>
          let (output, res) = foldVars(initialiser, curOut, input, [], l);
          (output, Right(res));
        };
      let nextInput = append(input, e1Out.dec);
      let (e2Out, e2Mapped) = optOutput(expression(nextInput), e2);
      let (e3Out, e3Mapped) = optOutput(expression(nextInput), e3);
      let (sOut, sMapped) = statement(curOut, nextInput, s);
      let outs = outAppend(outAppend(outAppend(e1Out, e2Out), e3Out), sOut);
      (outs, For_statement(e1Mapped, e2Mapped, e3Mapped, (sMapped, loc)));
    | Rehp.ForIn_statement(e1, e2, (s, loc)) =>
      let continueWithAugmentedScope = (input, ss) => {
        let (e1Out, e1Mapped) =
          switch (e1) {
          | Left(e) =>
            let (eOut, eMapped) = expression(input, e);
            (eOut, Left(eMapped));
          | Right((id, e)) =>
            let identMapped = ident(input, id);
            let (initOut, initMapped) = optOutput(initialiser(input), e);
            (initOut, Right((identMapped, initMapped)));
          };
        let (e2Out, e2Mapped) = expression(input, e2);
        let (sOut, sMapped) = statement(curOut, input, s);
        let outs = outAppend(outAppend(e1Out, e2Out), sOut);
        (outs, Php.ForIn_statement(e1Mapped, e2Mapped, (sMapped, loc)));
      };
      switch (e1) {
      | Left(_) => continueWithAugmentedScope(input, x)
      | Right((id, _eopt)) =>
        let addedVars = useOneVar(id);
        let augmentedInput = append(input, addedVars);
        let (out, res) = continueWithAugmentedScope(augmentedInput, x);
        let out = {use: out.use, dec: append(out.dec, addedVars)};
        (out, res);
      };

    /*
     * TODO: For Php, the exception is not actually block scoped and so we don't
     * need to do any special handling here.
     */
    | Rehp.Continue_statement(s) => (curOut, Continue_statement(s))
    | Rehp.Break_statement(s) => (curOut, Break_statement(s))
    | Rehp.Return_statement(e) =>
      let (eOut, eMapped) = optOutput(expression(input), e);
      (outAppend(curOut, eOut), Return_statement(eMapped));
    | Rehp.Labelled_statement(l, (s, loc)) =>
      let (stOut, stMapped) = statement(curOut, input, s);
      (stOut, Labelled_statement(l, (stMapped, loc)));
    | Rehp.Throw_statement(e) =>
      let (eOut, eMapped) = expression(input, e);
      (outAppend(curOut, eOut), Throw_statement(eMapped));
    | Rehp.Switch_statement(e, l, def, l') =>
      let (eOut, eMapped) = expression(input, e);
      let (dOut, dMapped) = optOutput(statements(curOut, input), def);
      let forEach = ((e, s)) => {
        let (eOut, eMapped) = switchCase(input, e);
        let (stmOut, stmMapped) = statements(curOut, input, s);
        let outs = outAppend(eOut, stmOut);
        (outs, (eMapped, stmMapped));
      };
      let (lOut, lMapped) = List.split(List.map(forEach, l));
      let forEach = ((e, s)) => {
        let (eOut, eMapped) = switchCase(input, e);
        let (stmOut, stmMapped) = statements(curOut, input, s);
        let outs = outAppend(eOut, stmOut);
        (outs, (eMapped, stmMapped));
      };
      let (lOut', lMapped') = List.split(List.map(forEach, l'));
      let outs = joinAll([eOut, dOut, ...lOut @ lOut']);
      (outs, Switch_statement(eMapped, lMapped, dMapped, lMapped'));
    | Rehp.Try_statement(b, catch, final) =>
      /*
       * Customization that augments the scope with catch identifier.
       */
      let identAndStatements = ((idnt, st)) => {
        let identMapped = ident(input, idnt);
        let addedVars = useOneVar(idnt);
        let augmentedInput = append(input, addedVars);
        let (stOut, stMapped) = statements(curOut, augmentedInput, st);
        let stUses = remove(stOut.use, addedVars);
        let out = {use: stUses, dec: stOut.dec};
        (out, (identMapped, stMapped));
      };
      let (bOut, bMapped) = statements(curOut, input, b);
      let (catchOut, catchMapped) = optOutput(identAndStatements, catch);
      let (finalOut, finalMapped) =
        optOutput(statements(curOut, input), final);
      let out = {
        use: append(bOut.use, append(catchOut.use, finalOut.use)),
        dec: append(bOut.dec, append(catchOut.dec, finalOut.dec)),
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
