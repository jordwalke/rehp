open Javascript;
open! Stdlib;

/*
 * This module should exclusively for JS that was compiler generated.
 */
/*
 * Translations that are not so direct and involve "expansions" etc.
 */
module Expand = {
  let isIntCheck = jsExpr =>
    EBin(EqEqEq, EUn(Typeof, jsExpr), EStr("number", `Bytes));
  let toInt = jsExpr => EBin(Bor, jsExpr, ENum(0.0));
};

let rec from_statement_list = lst =>
  List.map(~f=((stmt, loc)) => (from_statement(stmt), loc), lst)
and from_variable_declaration =
  fun
  | (ident, None) => (ident, None)
  | (ident, Some((init_expr, init_loc))) => (
      ident,
      Some((from_expression(init_expr), init_loc)),
    )
and from_arguments = args => List.map(~f=from_expression, args)
/* Should create a separate form for operators that only make sense when coming
   from parsed JS. Most of the unary operators for example. */
and from_unop = (unop, jsExpr) =>
  switch (unop) {
  | Rehp.Not => EUn(Javascript.Not, jsExpr)
  | IsInt => Expand.isIntCheck(jsExpr)
  | ToInt => Expand.toInt(jsExpr)
  | Neg => EUn(Javascript.Neg, jsExpr)
  | Pl => EUn(Javascript.Pl, jsExpr)
  | Typeof => EUn(Javascript.Typeof, jsExpr)
  | Void => EUn(Javascript.Void, jsExpr)
  | Delete => EUn(Javascript.Delete, jsExpr)
  | Bnot => EUn(Javascript.Bnot, jsExpr)
  | IncrA => EUn(Javascript.IncrA, jsExpr)
  | DecrA => EUn(Javascript.DecrA, jsExpr)
  | IncrB => EUn(Javascript.IncrB, jsExpr)
  | DecrB => EUn(Javascript.DecrB, jsExpr)
  }
and from_binop =
  fun
  | Rehp.Eq => Javascript.Eq
  | StarEq => StarEq
  | SlashEq => SlashEq
  | ModEq => ModEq
  | PlusEq => PlusEq
  | MinusEq => MinusEq
  | BandEq => BandEq
  | BxorEq => BxorEq
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
  | Lsr => Lsr
  | Asr => Asr
  | Plus => Plus
  | FloatPlus => Plus
  | IntPlus => Plus
  | Minus => Minus
  | Mul => Mul
  | Div => Div
  | Mod => Mod
and from_expression_loc = ((e, loc)) => (from_expression(e), loc)
and from_expression = e =>
  switch (e) {
  | Rehp.ERaw(segments) =>
    let revMapped =
      List.rev_map(segments, ~f=segment =>
        switch (segment) {
        | Rehp.RawText(s) => Javascript.RawText(s)
        | Rehp.RawSubstitution(e) =>
          Javascript.RawSubstitution(from_expression(e))
        }
      );
    Javascript.ERaw(List.rev(revMapped));
  | Rehp.ESeq(e1, e2) =>
    Javascript.ESeq(from_expression(e1), from_expression(e2))
  | ETag(index, itms) =>
    Javascript.EArr([
      Some(Javascript.ENum(float_of_int(index))),
      ...List.map(~f=itm => Some(from_expression(itm)), itms),
    ])
  | EStruct(itms) =>
    Javascript.EArr(List.map(~f=itm => Some(from_expression(itm)), itms))
  | EAccess(e1, e2) =>
    Javascript.EAccess(from_expression(e1), from_expression(e2))
  | EStructAccess(e, i) =>
    Javascript.EAccess(from_expression(e), Javascript.ENum(float_of_int(i)))
  | EArrAccess(e1, e2) =>
    Javascript.EAccess(from_expression(e1), from_expression(e2))
  | EVectlength(e) =>
    EBin(Minus, EDot(from_expression(e), "length"), ENum(1.0))
  | EArrLen(e) => EDot(from_expression(e), "length")
  | EArityTest(e) => EDot(from_expression(e), "length")
  | ECond(e1, e2, e3) =>
    ECond(from_expression(e1), from_expression(e2), from_expression(e3))
  | EBin(binop, e1, e2) =>
    EBin(from_binop(binop), from_expression(e1), from_expression(e2))
  | EUn(unop, e) => from_unop(unop, from_expression(e))
  | ECall(e, args, loc) =>
    ECall(from_expression(e), from_arguments(args), loc)
  | ECopy(e, loc) => ECall(EDot(from_expression(e), "slice"), [], loc)
  | EVar(ident) => EVar(ident)
  | EFun((ident_opt, ident_lst, body, loc)) =>
    EFun((ident_opt, ident_lst, from_source_elements_and_locs(body), loc))
  | EStr(x, y) => EStr(x, y)
  | EArr(arr_literal) =>
    EArr(List.map(~f=Stdlib.Option.map(~f=from_expression), arr_literal))
  | EDot(e, ident) => EDot(from_expression(e), ident)
  | ENew(e, optargs) =>
    ENew(from_expression(e), Stdlib.Option.map(~f=from_arguments, optargs))
  | EObj(lst) =>
    EObj(List.map(~f=((nm, e)) => (nm, from_expression(e)), lst))
  | EBool(b) => EBool(b)
  | EFloat(flt) => ENum(flt)
  | EInt(i) => ENum(float_of_int(i))
  | EQuote(s) => EQuote(s)
  | ERegexp(s, sopt) => ERegexp(s, sopt)
  }
and from_statement = e =>
  switch (e) {
  | Rehp.Block(stms) => Block(from_statement_list(stms))
  | Rehp.Variable_statement(lst) =>
    Javascript.Variable_statement(
      List.map(
        ~f=
          ((ident, initopt)) =>
            (ident, Stdlib.Option.map(~f=from_expression_loc, initopt)),
        lst,
      ),
    )
  | Rehp.Empty_statement => Empty_statement
  | Rehp.Expression_statement(expr) =>
    Expression_statement(from_expression(expr))
  | Rehp.If_statement(expr, (ifstmt, ifloc), elsopt) =>
    If_statement(
      from_expression(expr),
      (from_statement(ifstmt), ifloc),
      switch (elsopt) {
      | None => None
      | Some((elstmt, elloc)) => Some((from_statement(elstmt), elloc))
      },
    )
  | Rehp.Loop_statement(stmt, loc) =>
    For_statement(Left(None), None, None, (from_statement(stmt), loc));
  | Rehp.Continue_statement(lbl, _depth) => Continue_statement(lbl)
  | Rehp.Break_statement(lbl) => Break_statement(lbl)
  | Rehp.Return_statement(eo) =>
    Return_statement(Stdlib.Option.map(~f=from_expression, eo))
  /* | With_statement of expression * statement */
  | Rehp.Labelled_statement(lbl, (stmt, loc)) =>
    Labelled_statement(lbl, (from_statement(stmt), loc))
  | Rehp.Switch_statement(
      e,
      case_clause_list,
      stmt_lst,
    ) =>
    let e = from_expression(e);
    let case_clause_lst = from_case_clause_list(case_clause_list);
    /* Backward-compatible behavior, TODO: cleanup JS Ast and printing */
    let stmt_lst =
      switch (stmt_lst) {
      | [] => None
      | _ => Some(from_statement_list(stmt_lst))
      };
    Switch_statement(e, case_clause_lst, stmt_lst, []);
  | Rehp.Throw_statement(e) => Throw_statement(from_expression(e))
  | Rehp.Try_statement(block, ident_block_opt, block_opt) =>
    let block = from_statement_list(block);
    let ident_block_opt =
      switch (ident_block_opt) {
      | None => None
      | Some((ident, block)) => Some((ident, from_statement_list(block)))
      };

    let block_opt = Stdlib.Option.map(~f=from_statement_list, block_opt);
    Try_statement(block, ident_block_opt, block_opt);
  | Rehp.Debugger_statement => Debugger_statement
  }
and from_case_clause_list = lst =>
  List.map(
    ~f=((e, stmts)) => (from_expression(e), from_statement_list(stmts)),
    lst,
  )
and from_source_element =
  fun
  | Rehp.Statement(stmt) => Statement(from_statement(stmt))
  | Rehp.Function_declaration((
      ident,
      formal_parameter_list,
      function_body,
      location,
    )) =>
    Javascript.Function_declaration((
      ident,
      formal_parameter_list,
      from_source_elements_and_locs(function_body),
      location,
    ))
and from_source_elements_and_locs = lst =>
  List.map(~f=((src, loc)) => (from_source_element(src), loc), lst);

let from_rehp = from_source_elements_and_locs;
let from_rehp_expression = from_expression;
