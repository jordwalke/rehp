exception Unsupported_statement;
exception Unsupported_expression;
exception No_cases_in_switch;

let x = f =>
  fun
  | None => None
  | Some(v) => Some(f(v));

let case_var_count = ref(0);
let make_case_var = () => {
  let res = "switch_case_" ++ string_of_int(case_var_count^);
  case_var_count := case_var_count^ + 1;
  Python.EVar(Id.ident(res));
};

type variable_declaration_init =
  | InitFun(Rehp.function_expression)
  | InitExp(Python.expression);

type mapped_bin_op =
  | AssignOp(Python.assign_op)
  | BinOp(Python.bin_op);

let map_bin_op =
  fun
  | Rehp.Eq => AssignOp(Eq)
  | StarEq => AssignOp(StarEq)
  | SlashEq => AssignOp(SlashEq)
  | ModEq => AssignOp(ModEq)
  | PlusEq => AssignOp(PlusEq)
  | MinusEq => AssignOp(MinusEq)
  | BandEq => AssignOp(BandEq)
  | BxorEq => AssignOp(BxorEq)
  | BorEq => AssignOp(BorEq)

  | Or => BinOp(Or)
  | And => BinOp(And)
  | Bor => BinOp(Bor)
  | Bxor => BinOp(Bxor)
  | Band => BinOp(Band)
  | EqEq => BinOp(EqEq)
  | NotEq => BinOp(NotEq)
  | EqEqEq => BinOp(Is)
  | NotEqEq => BinOp(IsNot)
  | Lt => BinOp(Lt)
  | Le => BinOp(Le)
  | Gt => BinOp(Gt)
  | Ge => BinOp(Ge)
  | Lsl => BinOp(Lsl)
  | FloatPlus
  | IntPlus
  | Plus => BinOp(Plus)
  | Minus => BinOp(Minus)
  | Mul => BinOp(Mul)
  | Div => BinOp(Div)
  | Mod => BinOp(Mod)

  | InstanceOf
  | In
  | Lsr
  | Asr => raise(Unsupported_expression);

let rec map_unop = (unop, expression) =>
  switch (unop) {
  | Rehp.ToInt =>
    Python.ECall(EVar(Id.ident("int")), [map_expression(expression)])

  | Not => EUn(Not, map_expression(expression))
  | Neg => EUn(Neg, map_expression(expression))
  | Pl => EUn(Pl, map_expression(expression))
  | Bnot => EUn(Bnot, map_expression(expression))

  | Typeof
  | IsInt
  | Void
  | Delete
  | IncrA
  | DecrA
  | IncrB
  | DecrB => raise(Unsupported_expression)
  }

and map_expression =
  fun
  | Rehp.ERaw(str) => Python.ERaw(str)
  /* TODO: does this happen */
  | ESeq(e1, e2) => ERaw("eseq??")
  | ECond(condition, consequent, alternate) =>
    ECond(
      map_expression(condition),
      map_expression(consequent),
      map_expression(alternate),
    )
  | EBin(binop, left_expression, right_expression) =>
    switch (map_bin_op(binop)) {
    | BinOp(binop) =>
      EBin(
        binop,
        map_expression(left_expression),
        map_expression(right_expression),
      )
    | AssignOp(_) => raise(Unsupported_expression)
    }
  | EUn(unop, expression) => map_unop(unop, expression)
  | ECall(expression, arguments, _) =>
    ECall(map_expression(expression), map_expressions(arguments))
  | ECopy(expression, _) =>
    ECall(EVar(Id.ident("list")), [map_expression(expression)])
  | EVar(id) => EVar(id)
  /* TODO: return in output */
  | EFun(function_expression) => ERaw("function_expression")
  /* TODO: https://stackoverflow.com/questions/847936/how-can-i-find-the-number-of-arguments-of-a-python-function */
  | EArityTest(expression) => ERaw("arity_test")
  | EVectlength(expression)
  | EArrLen(expression) =>
    ECall(EVar(Id.ident("len")), [map_expression(expression)])
  | EStructAccess(left_expression, right_expression)
  | EArrAccess(left_expression, right_expression)
  | EAccess(left_expression, right_expression) =>
    EAccess(
      map_expression(left_expression),
      map_expression(right_expression),
    )
  | EDot(expression, id) => EDot(map_expression(expression), Id.ident(id))
  | EArr(arguments) =>
    EArr(
      map_expressions(
        List.map(
          fun
          | None => Rehp.ERaw("None")
          | Some(e) => e,
          arguments,
        ),
      ),
    )
  | EStruct(arguments) => EArr(map_expressions(arguments))
  | EObj(property_name_and_value_list) =>
    EDict(
      List.map(
        ((id, expression)) => (id, map_expression(expression)),
        property_name_and_value_list,
      ),
    )
  | ETag(expression, arguments) =>
    EArr([map_expression(expression), ...map_expressions(arguments)])
  | ENew(expression, arguments) =>
    ENew(
      map_expression(expression),
      switch (arguments) {
      | None => []
      | Some(arguments) => map_expressions(arguments)
      },
    )
  | EStr(s, kind) => EStr(s, kind)
  | EBool(b) => EBool(b)
  | EFloat(f) => ENum(f)
  | EInt(i) => EInt(i)
  | EQuote(s) => EStr(s, `Utf8)
  | ERegexp(s, options) => ERegexp(s, options)

and map_expressions = expressions =>
  List.map(expression => map_expression(expression), expressions)

and map_cases = (id, else_statements) =>
  fun
  | [] => else_statements
  | [(expression, statement_list), ...rest_clauses] =>
    Some(
      Python.If_statement(
        EBin(Is, id, expression),
        Statement_list(statement_list),
        map_cases(id, else_statements, rest_clauses),
      ),
    )

and map_switch = (condition, case_clauses, default_case, more_case_clauses) => {
  let condition = map_expression(condition);
  let clauses =
    List.map(
      ((expression, statement_list)) =>
        (map_expression(expression), map_statements(statement_list)),
      List.concat([case_clauses, more_case_clauses]),
    );
  let default_statements = x(map_statements, default_case);

  let (id, init) =
    switch (condition) {
    | Python.EVar(id) => (condition, None)
    | _ =>
      let id = make_case_var();
      let init = Python.Assignment_statement(Eq, id, condition);
      (id, Some(init));
    };

  let else_statements =
    x(
      statement_list => Python.Statement_list(statement_list),
      default_statements,
    );

  let if_statement =
    switch (map_cases(id, else_statements, clauses)) {
    | None => raise(No_cases_in_switch)
    | Some(e) => e
    };

  switch (init) {
  | None => if_statement
  | Some(init) => Statement_list([init, if_statement])
  };
}

and map_statement =
  fun
  | Rehp.Empty_statement => Python.Empty_statement

  | Block(statements) => Statement_list(map_statements(statements))

  | Raw_statement(provides, requires, str) => Raw_statement(str)

  | Variable_statement(variable_declaration_list) =>
    Statement_list(
      List.map(
        ((id, initialiser)) => {
          let initialiser =
            switch (initialiser) {
            | None => InitExp(Python.ENULL)
            | Some((Rehp.EFun(function_expression), _)) =>
              InitFun(function_expression)
            | Some((expression, _)) => InitExp(map_expression(expression))
            };

          switch (initialiser) {
          | InitExp(initialiser) =>
            Python.Assignment_statement(Eq, EVar(id), initialiser)
          | InitFun((_, parameter_list, source_element_list, loc)) =>
            map_function((id, parameter_list, source_element_list, loc))
          };
        },
        variable_declaration_list,
      ),
    )

  | Expression_statement(
      EFun((Some(id), parameter_list, source_element_list, loc)),
    ) =>
    map_function((id, parameter_list, source_element_list, loc))

  | Expression_statement(expression) =>
    switch (expression) {
    | EBin(binop, left_expression, right_expression) =>
      switch (map_bin_op(binop)) {
      | AssignOp(assign_op) =>
        Assignment_statement(
          assign_op,
          map_expression(left_expression),
          map_expression(right_expression),
        )
      | BinOp(_) => Expression_statement(map_expression(expression))
      }
    | _ => Expression_statement(map_expression(expression))
    }

  | If_statement(condition, (consequent, _), alternate) =>
    If_statement(
      map_expression(condition),
      map_statement(consequent),
      x(((alternate, _)) => map_statement(alternate), alternate),
    )

  | Do_while_statement((statement, _), condition) =>
    raise(Unsupported_statement)

  | While_statement(condition, (statement, _)) =>
    raise(Unsupported_statement)

  | ForIn_statement(e1, e2, (s, _)) => raise(Unsupported_statement)

  /* TODO: convert to for statements */
  | For_statement(e1, e2, e3, (s, _), _) =>
    WhileTrue_statement(map_statement(s))

  /* TODO: become break when labeled, if inside switch use switch label */
  | Continue_statement(None, _) => Continue_statement
  | Continue_statement(label, _) => Continue_statement

  | Break_statement(None) => Break_statement
  | Break_statement(label) => raise(Unsupported_statement)

  | Return_statement(expression) =>
    Return_statement(x(map_expression, expression))

  | Labelled_statement(label, (statement, _)) =>
    switch (statement) {
    | For_statement(_) => map_statement(statement)
    | _ => raise(Unsupported_statement)
    }

  | Switch_statement(
      expression,
      case_clauses,
      default_case,
      more_case_clauses,
    ) =>
    map_switch(expression, case_clauses, default_case, more_case_clauses)

  | Throw_statement(expression) =>
    Throw_statement(map_expression(expression))

  | Try_statement(statements, catch_statements, finally_statements) =>
    Try_statement(
      map_statements(statements),
      x(((id, block)) => (id, map_statements(block)), catch_statements),
      x(map_statements, finally_statements),
    )

  | Debugger_statement => raise(Unsupported_statement)

and map_statements = statements =>
  List.map(((statement, _)) => map_statement(statement), statements)

and map_function = ((id, parameter_list, source_element_list, _)) =>
  Python.Function_declaration(
    id,
    parameter_list,
    map_source_elements(source_element_list),
  )

and map_source_element =
  fun
  | Rehp.Statement(statement) => map_statement(statement)
  | Function_declaration(function_declaration) =>
    map_function(function_declaration)

and map_source_elements = elements =>
  List.map(((element, _)) => map_source_element(element), elements);
