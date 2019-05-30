/**
 * This is a temporary necessity required to be able to parse JavaScript stubs
 * and yet use the new Rehp IR. Eventually this will not be necessary and we
 * can delete this module.
 */
open Rehp;

let escape_js_regex = s => Stdlib.escape(s, '\\', "\\\\");

let js_string = (s, en) =>
  ECall(
    EDot(EVar(S({name: "String", var: None})), "new"),
    [EStr(s, en)],
    N,
  );
let rec from_js_statement_list = lst =>
  List.map(((stmt, loc)) => (from_js_statement(stmt), loc), lst)
and from_js_variable_declaration =
  fun
  | (ident, None) => (ident, None)
  | (ident, Some((init_expr, init_loc))) => (
      ident,
      Some((from_js_expression(init_expr), init_loc)),
    )
and from_js_arguments = args => List.map(from_js_expression, args)
/* Should create a separate form for operators that only make sense when coming
   from parsed JS. Most of the unary operators for example. */
and from_js_unop =
  fun
  | Javascript.Not => Not
  | Javascript.Neg => Neg
  | Javascript.Pl => Pl
  | Javascript.Typeof => Typeof
  | Javascript.Void => Void
  | Javascript.Delete => Delete
  | Javascript.Bnot => Bnot
  /*
   * TODO: This does not work. Only a few places require this.
   */
  | Javascript.IncrA => IncrA
  | Javascript.DecrA => DecrA
  | Javascript.IncrB => IncrB
  | Javascript.DecrB => DecrB
and from_js_binop =
  fun
  | Javascript.Eq => Eq
  | Javascript.StarEq => StarEq
  | Javascript.SlashEq => SlashEq
  | Javascript.ModEq => ModEq
  | Javascript.PlusEq => PlusEq
  | Javascript.MinusEq => MinusEq
  | Javascript.LslEq => assert(false)
  | Javascript.AsrEq => assert(false)
  | Javascript.LsrEq => assert(false)
  | Javascript.BandEq => BandEq
  | Javascript.BxorEq => BxorEq
  | Javascript.BorEq => BorEq
  | Javascript.Or => Or
  | Javascript.And => And
  | Javascript.Bor => Bor
  | Javascript.Bxor => Bxor
  | Javascript.Band => Band
  | Javascript.EqEq => EqEq
  | Javascript.NotEq => NotEq
  | Javascript.EqEqEq => EqEqEq
  | Javascript.NotEqEq => NotEqEq
  | Javascript.Lt => Lt
  | Javascript.Le => Le
  | Javascript.Gt => Gt
  | Javascript.Ge => Ge
  | Javascript.InstanceOf => InstanceOf
  | Javascript.In => In
  | Javascript.Lsl => Lsl
  | Javascript.Lsr => Lsr
  | Javascript.Asr => Asr
  | Javascript.Plus => FloatPlus
  | Javascript.Minus => Minus
  | Javascript.Mul => Mul
  | Javascript.Div => Div
  | Javascript.Mod => Mod
and from_js_expression_loc = ((e, loc)) => (from_js_expression(e), loc)
and from_js_expression =
  fun
  /* This won't actually ever happen. */
  | Javascript.ERaw(s) => ERaw(s)
  | Javascript.ESeq(e1, e2) =>
    ESeq(from_js_expression(e1), from_js_expression(e2))
  | Javascript.ECond(e1, e2, e3) =>
    ECond(
      from_js_expression(e1),
      from_js_expression(e2),
      from_js_expression(e3),
    )
  /*
   * If one side of these binary operators is known to not be a string, we know
   * we can use the native PHP binary operator.
   * TODO: The small optimization of allowing x + 0 to remain x + 0 instead of
   * plus(x, 0) assumes no one would concatenate a zero to a string, and
   * intead would do + "0".
   */
  | Javascript.EBin(
      (NotEqEq | NotEq | EqEq | EqEqEq | Plus) as binop,
      e1,
      (
        EVar(S({name: "null" | "undefined"})) | ENum(_) | EUn(Neg, _) |
        EBin(Mul | Minus | Div | Lsr | Lsl | Asr | Mod, _, _)
      ) as e2,
    )
  | Javascript.EBin(
      (NotEqEq | NotEq | EqEq | EqEqEq | Plus) as binop,
      (
        EVar(S({name: "null" | "undefined"})) | ENum(_) | EUn(Neg, _) |
        EBin(Mul | Minus | Div | Lsr | Lsl | Asr | Mod, _, _)
      ) as e1,
      e2,
    ) =>
    EBin(
      from_js_binop(binop),
      from_js_expression(e1),
      from_js_expression(e2),
    )
  | Javascript.EBin(Plus, e1, e2) =>
    ECall(
      EVar(S({name: "plus", var: None})),
      [from_js_expression(e1), from_js_expression(e2)],
      N,
    )
  | Javascript.EBin(EqEqEq, e1, e2) =>
    ECall(
      EVar(S({name: "eqEqEq", var: None})),
      [from_js_expression(e1), from_js_expression(e2)],
      N,
    )
  | Javascript.EBin(EqEq, e1, e2) =>
    ECall(
      EVar(S({name: "eqEq", var: None})),
      [from_js_expression(e1), from_js_expression(e2)],
      N,
    )
  | Javascript.EBin(NotEqEq, e1, e2) =>
    EUn(
      Not,
      ECall(
        EVar(S({name: "eqEqEq", var: None})),
        [from_js_expression(e1), from_js_expression(e2)],
        N,
      ),
    )
  | Javascript.EBin(NotEq, e1, e2) =>
    EUn(
      Not,
      ECall(
        EVar(S({name: "eqEq", var: None})),
        [from_js_expression(e1), from_js_expression(e2)],
        N,
      ),
    )
  | Javascript.EBin(In, EStr(s, en), e2) =>
    ECall(
      EVar(S({name: "is_in", var: None})),
      [EStr(s, en), from_js_expression(e2)],
      N,
    )
  | Javascript.EBin(binop, e1, e2) =>
    EBin(
      from_js_binop(binop),
      from_js_expression(e1),
      from_js_expression(e2),
    )
  | Javascript.EUn(Javascript.Typeof, e) =>
    ECall(
      EVar(S({name: "typeof", var: None})),
      [from_js_expression(e)],
      N,
    )
  | Javascript.EUn(unop, e) =>
    EUn(from_js_unop(unop), from_js_expression(e))
  | Javascript.ECall(
      Javascript.EVar(
        Javascript.S({
          name: "caml_utf16_of_utf8" | "caml_utf8_of_utf16",
          var: None,
        }),
      ),
      [e],
      _,
    ) =>
    from_js_expression(e)
  | Javascript.ECall(e, args, loc) =>
    ECall(from_js_expression(e), from_js_arguments(args), loc)
  | Javascript.EVar(S({name: "this", var: None})) =>
    EDot(EVar(S({name: "joo_global_object", var: None})), "context")
  /* | Javascript.EVar(S({name: "NaN", var: None})) => */
  /*   EDot(EVar(S({name: "joo_global_object", var: None})), "NaN") */
  /* | Javascript.EVar(S({name: "isFinite", var: None})) => */
  /*   EDot(EVar(S({name: "joo_global_object", var: None})), "isFinite") */
  /* | Javascript.EVar(S({name: "isNaN", var: None})) => */
  /*   EDot(EVar(S({name: "joo_global_object", var: None})), "isNaN") */
  | Javascript.EVar(ident) => EVar(ident)
  | Javascript.EFun((ident_opt, ident_lst, body, loc)) =>
    ECall(
      EVar(S({name: "Func", var: None})),
      [EFun((ident_opt, ident_lst, from_javascript(body), loc))],
      N,
    )
  | Javascript.EStr(s, en) => js_string(s, en)
  | Javascript.EArr(arr_literal) =>
    EArr(List.map(Stdlib.Option.map(~f=from_js_expression), arr_literal))
  | Javascript.EDot(e, ident) => EDot(from_js_expression(e), ident)
  | Javascript.EAccess(e1, e2) =>
    EAccess(from_js_expression(e1), from_js_expression(e2))
  | Javascript.ENew(e, args) => {
      let args =
        switch (args) {
        | None => []
        | Some(args) => List.map(from_js_expression, args)
        };
      ECall(EDot(from_js_expression(e), "new"), args, N);
    }
  | Javascript.EObj(lst) =>
    ECall(
      EVar(S({name: "ObjectLiteral", var: None})),
      [EObj(List.map(((nm, e)) => (nm, from_js_expression(e)), lst))],
      N,
    )
  | Javascript.EBool(b) => EBool(b)
  | Javascript.ENum(flt) => ENum(flt)
  | Javascript.EQuote(s) => EQuote(s)
  | Javascript.ERegexp(s, Some(opt)) =>
    ECall(
      EDot(EVar(S({name: "RegExp", var: None})), "new"),
      [js_string(escape_js_regex(s), `Utf8), js_string(opt, `Utf8)],
      N,
    )
  | Javascript.ERegexp(s, None) =>
    ECall(
      EDot(EVar(S({name: "RegExp", var: None})), "new"),
      [js_string(escape_js_regex(s), `Utf8)],
      N,
    )
and from_js_statement =
  fun
  | Javascript.Raw_statement(p, r, str) => Raw_statement(p, r, str)
  | Javascript.Block(stms) => Block(from_js_statement_list(stms))
  | Javascript.Variable_statement(lst) => {
      let mapped_lst =
        List.map(
          ((id, eopt)) =>
            switch (eopt) {
            | None => (
                id,
                Some((EVar(S({name: "undefined", var: None})), Loc.N)),
              )
            | Some((e, loc)) => (id, Some((from_js_expression(e), loc)))
            },
          lst,
        );
      Variable_statement(mapped_lst);
    }
  | Javascript.Empty_statement => Empty_statement
  /* We limit this to a few known expressions that don't include side
     effects since we repeat the expression e1. */
  /* Ensure everything is wrapped in a throwable before throwing. */
  | Javascript.Expression_statement(
      Javascript.EBin(Javascript.PlusEq, Javascript.EVar(_) as e1, e2),
    )
  | Javascript.Expression_statement(
      Javascript.EBin(
        Javascript.PlusEq,
        Javascript.EDot(Javascript.EVar(_), _) as e1,
        e2,
      ),
    ) => {
      let e1' = from_js_expression(e1);
      let e2' = from_js_expression(e2);
      let call = ECall(EVar(S({name: "plus", var: None})), [e1', e2'], N);
      Expression_statement(EBin(Eq, e1', call));
    }
  | Javascript.Expression_statement(EBin(LsrEq, e1, e2)) => {
      /* TODO: This is buggy if e1 has side effects (unlikely, but fix) */
      let unsigned_right_shift =
        Id.S({name: "unsigned_right_shift_32", var: None});
      let call =
        ECall(
          EVar(unsigned_right_shift),
          [from_js_expression(e1), from_js_expression(e2)],
          Loc.N,
        );
      Expression_statement(EBin(Eq, from_js_expression(e1), call));
    }
  | Javascript.Expression_statement(EBin(AsrEq, e1, e2)) => {
      /* TODO: This is buggy if e1 has side effects (unlikely, but fix) */
      let right_shift = Id.S({name: "right_shift_32", var: None});
      let call =
        ECall(
          EVar(right_shift),
          [from_js_expression(e1), from_js_expression(e2)],
          Loc.N,
        );
      Expression_statement(EBin(Eq, from_js_expression(e1), call));
    }
  | Javascript.Expression_statement(EBin(LslEq, e1, e2)) => {
      /* TODO: This is buggy if e1 has side effects (unlikely, but fix) */
      let left_shift = Id.S({name: "left_shift_32", var: None});
      let call =
        ECall(
          EVar(left_shift),
          [from_js_expression(e1), from_js_expression(e2)],
          Loc.N,
        );
      Expression_statement(EBin(Eq, from_js_expression(e1), call));
    }
  | Javascript.Expression_statement(expr) =>
    Expression_statement(from_js_expression(expr))
  | Javascript.If_statement(expr, (ifstmt, ifloc), elsopt) =>
    If_statement(
      from_js_expression(expr),
      (from_js_statement(ifstmt), ifloc),
      switch (elsopt) {
      | None => None
      | Some((elstmt, elloc)) => Some((from_js_statement(elstmt), elloc))
      },
    )
  | Javascript.Do_while_statement((stmt, loc), e) =>
    Do_while_statement(
      (from_js_statement(stmt), loc),
      from_js_expression(e),
    )
  | Javascript.While_statement(e, (stmt, loc)) =>
    While_statement(from_js_expression(e), (from_js_statement(stmt), loc))
  | Javascript.For_statement(init, test, incr, (stmt, loc)) => {
      let init =
        switch (init) {
        | Left(None) => Stdlib.Left(None)
        | Left(Some(e)) => Left(Some(from_js_expression(e)))
        | Right(vars) => Right(List.map(from_js_variable_declaration, vars))
        };
      let test =
        switch (test) {
        | None => None
        | Some(e) => Some(from_js_expression(e))
        };
      let incr =
        switch (incr) {
        | None => None
        | Some(e) => Some(from_js_expression(e))
        };
      For_statement(init, test, incr, (from_js_statement(stmt), loc));
    }
  | Javascript.ForIn_statement(init, e, (stmt, loc)) => {
      let init =
        switch (init) {
        | Left(e) => Stdlib.Left(from_js_expression(e))
        | Right(vd) => Right(from_js_variable_declaration(vd))
        };
      let e = from_js_expression(e);
      let stmt = from_js_statement(stmt);
      ForIn_statement(init, e, (stmt, loc));
    }
  | Javascript.Continue_statement(lbl) => Continue_statement(lbl)
  | Javascript.Break_statement(lbl) => Break_statement(lbl)
  | Javascript.Return_statement(eo) =>
    Return_statement(Stdlib.Option.map(~f=from_js_expression, eo))
  /* | With_statement of expression * statement */
  | Javascript.Labelled_statement(lbl, (stmt, loc)) =>
    Labelled_statement(lbl, (from_js_statement(stmt), loc))
  | Javascript.Switch_statement(
      e,
      case_clause_list1,
      stmt_lst_opt,
      case_clause_list2,
    ) => {
      let e = from_js_expression(e);
      let case_clause_lst1 = from_js_case_clause_list(case_clause_list1);
      let case_clause_lst2 = from_js_case_clause_list(case_clause_list2);
      let stmt_lst_opt =
        Stdlib.Option.map(~f=from_js_statement_list, stmt_lst_opt);
      Switch_statement(e, case_clause_lst1, stmt_lst_opt, case_clause_lst2);
    }
  | Javascript.Throw_statement(e) => Throw_statement(from_js_expression(e))
  | Javascript.Try_statement(block, ident_block_opt, block_opt) => {
      let block = from_js_statement_list(block);
      let ident_block_opt =
        switch (ident_block_opt) {
        | None => None
        | Some((ident, block)) =>
          Some((ident, from_js_statement_list(block)))
        };

      let block_opt = Stdlib.Option.map(~f=from_js_statement_list, block_opt);
      Try_statement(block, ident_block_opt, block_opt);
    }
  | Javascript.Debugger_statement => Debugger_statement
and from_js_case_clause_list = lst =>
  List.map(
    ((e, stmts)) =>
      (from_js_expression(e), from_js_statement_list(stmts)),
    lst,
  )
and func_decl_to_var = (id, params, body, nid) =>
  Statement(
    {
      /* Fragile assumption: That we wrap function declarations, but not
         first class functions */
      let fn =
        ECall(
          EVar(S({name: "Func", var: None})),
          [EFun((Some(id), params, body, nid))],
          N,
        );
      let eopt = Some((fn, nid));
      Variable_statement([(id, eopt)]);
    },
  )
/*
 * lksjdflaksdjf
 */
and from_js_source_element =
  fun
  | Javascript.Statement(stmt) => Statement(from_js_statement(stmt))
  /* Patch the caml_new_string function on the way in. So we can redefine
     it to wrap the php strings. */
  | Javascript.Function_declaration((id, params, body, nid)) =>
    func_decl_to_var(id, params, from_javascript(body), nid)
and from_javascript = lst =>
  List.map(((src, loc)) => (from_js_source_element(src), loc), lst);

let from_javascript_expression = from_js_expression

and raws_from_javascript = lst =>
  lst
  |> List.filter(x =>
       switch (x) {
       | (Javascript.Statement(Javascript.Raw_statement(_)), _) => true
       | _ => false
       }
     )
  |> List.map(((src, loc)) => (from_js_source_element(src), loc));
