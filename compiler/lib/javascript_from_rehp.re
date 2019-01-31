open Javascript;

/*
 * This module should exclusively for JS that was compiler generated.
 */
/*
 * Translations that are not so direct and involve "expansions" etc.
 */
module Expand = {
  let isIntCheck = jsExpr =>
    EBin(EqEqEq, EUn(Typeof, jsExpr), EStr("number", `Bytes));
};

let rec from_statement_list = lst =>
  List.map(((stmt, loc)) => (from_statement(stmt), loc), lst)
and from_variable_declaration =
  fun
  | (ident, None) => (ident, None)
  | (ident, Some((init_expr, init_loc))) => (
      ident,
      Some((from_expression(init_expr), init_loc)),
    )
and from_arguments = args => List.map(from_expression, args)
/* Should create a separate form for operators that only make sense when coming
   from parsed JS. Most of the unary operators for example. */
and from_unop = (unop, jsExpr) =>
  switch (unop) {
  | Rehp.Not => EUn(Javascript.Not, jsExpr)
  | IsInt => Expand.isIntCheck(jsExpr)
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
  | Rehp.ERaw(s) => Javascript.ERaw(s)
  | Rehp.ESeq(e1, e2) =>
    Javascript.ESeq(from_expression(e1), from_expression(e2))
  | ETag(index, itms) =>
    Javascript.EArr([
      Some(from_expression(index)),
      ...List.map(itm => Some(from_expression(itm)), itms),
    ])
  | EStruct(itms) =>
    Javascript.EArr(List.map(itm => Some(from_expression(itm)), itms))
  | EAccess(e1, e2)
  | EStructAccess(e1, e2)
  | EArrAccess(e1, e2) =>
    Javascript.EAccess(from_expression(e1), from_expression(e2))
  | EArrLen(e) => EDot(from_expression(e), "length")
  | EArityTest(e) => EDot(from_expression(e), "length")
  | ECond(e1, e2, e3) =>
    ECond(from_expression(e1), from_expression(e2), from_expression(e3))
  | EBin(binop, e1, e2) =>
    EBin(from_binop(binop), from_expression(e1), from_expression(e2))
  | EUn(unop, e) => from_unop(unop, from_expression(e))
  | ECall(e, args, loc) =>
    ECall(from_expression(e), from_arguments(args), loc)
  | EVar(ident) => EVar(ident)
  | EFun((ident_opt, ident_lst, body, loc)) =>
    EFun((ident_opt, ident_lst, from_source_elements_and_locs(body), loc))
  | EStr(x, y) => EStr(x, y)
  | EArr(arr_literal) =>
    EArr(List.map(Stdlib.Option.map(~f=from_expression), arr_literal))
  | EDot(e, ident) => EDot(from_expression(e), ident)
  | ENew(e, optargs) =>
    ENew(from_expression(e), Stdlib.Option.map(~f=from_arguments, optargs))
  | EObj(lst) =>
    EObj(List.map(((nm, e)) => (nm, from_expression(e)), lst))
  | EBool(b) => EBool(b)
  | ENum(flt) => ENum(flt)
  | EQuote(s) => EQuote(s)
  | ERegexp(s, sopt) => ERegexp(s, sopt)
  }
and from_statement = e =>
  switch (e) {
  | Rehp.Raw_statement(p, r, s) => Raw_statement(p, r, s)
  | Rehp.Block(stms) => Block(from_statement_list(stms))
  | Rehp.Variable_statement(lst) =>
    Javascript.Variable_statement(
      List.map(
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
  | Rehp.Do_while_statement((stmt, loc), e) =>
    Do_while_statement((from_statement(stmt), loc), from_expression(e))
  | Rehp.While_statement(e, (stmt, loc)) =>
    While_statement(from_expression(e), (from_statement(stmt), loc))
  | Rehp.For_statement(init, test, incr, (stmt, loc)) =>
    let init =
      switch (init) {
      | Stdlib.Left(None) => Javascript.Left(None)
      | Left(Some(e)) => Left(Some(from_expression(e)))
      | Right(vars) => Right(List.map(from_variable_declaration, vars))
      };
    let test =
      switch (test) {
      | None => None
      | Some(e) => Some(from_expression(e))
      };
    let incr =
      switch (incr) {
      | None => None
      | Some(e) => Some(from_expression(e))
      };
    For_statement(init, test, incr, (from_statement(stmt), loc));
  | Rehp.ForIn_statement(init, e, (stmt, loc)) =>
    let init =
      switch (init) {
      | Stdlib.Left(e) => Stdlib.Left(from_expression(e))
      | Right(vd) => Right(from_variable_declaration(vd))
      };
    let e = from_expression(e);
    let stmt = from_statement(stmt);
    ForIn_statement(init, e, (stmt, loc));
  | Rehp.Continue_statement(lbl) => Continue_statement(lbl)
  | Rehp.Break_statement(lbl) => Break_statement(lbl)
  | Rehp.Return_statement(eo) =>
    Return_statement(Stdlib.Option.map(~f=from_expression, eo))
  /* | With_statement of expression * statement */
  | Rehp.Labelled_statement(lbl, (stmt, loc)) =>
    Labelled_statement(lbl, (from_statement(stmt), loc))
  | Rehp.Switch_statement(
      e,
      case_clause_list1,
      stmt_lst_opt,
      case_clause_list2,
    ) =>
    let e = from_expression(e);
    let case_clause_lst1 = from_case_clause_list(case_clause_list1);
    let case_clause_lst2 = from_case_clause_list(case_clause_list2);
    let stmt_lst_opt =
      Stdlib.Option.map(~f=from_statement_list, stmt_lst_opt);
    Switch_statement(e, case_clause_lst1, stmt_lst_opt, case_clause_lst2);
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
    ((e, stmts)) => (from_expression(e), from_statement_list(stmts)),
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
  List.map(((src, loc)) => (from_source_element(src), loc), lst);

let from_rehp = from_source_elements_and_locs;
let from_rehp_expression = from_expression;
