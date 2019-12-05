exception Unsupported_statement;
exception Unsupported_expression;
exception Unsupported_op(string);
exception No_cases_in_switch;
exception Unhandled_functions;
exception Unhandled_labels;

let x = f =>
  fun
  | None => None
  | Some(v) => Some(f(v));

let split2 = li => (
  List.map(((e1, _)) => e1, li),
  List.map(((_, e2)) => e2, li),
);

let id_count = ref(0);
let make_id = prefix => {
  let res = prefix ++ "_" ++ string_of_int(id_count^);
  id_count := id_count^ + 1;
  Id.ident(res);
};

type enclosed_by =
  | Not_enclosed
  | Switch
  | Loop
  | LabelledLoop(string);
type input = {enclosed_by};
let empty_input = {enclosed_by: Not_enclosed};

type output = {
  funcs: list((Id.t, Rehp.formal_parameter_list, Rehp.function_body)),
  labels: list(string),
};
let empty_output = {funcs: [], labels: []};
let concat_outputs = outputs => {
  funcs: List.concat(List.map(output => output.funcs, outputs)),
  labels: List.concat(List.map(output => output.labels, outputs)),
};

/* TODO: write with ASTs */
let set_label_to = label =>
  Python.Raw_statement("continue_label = \"" ++ label ++ "\"");
let set_label_to_switch = Python.Raw_statement("continue_label = \"switch\"");
let set_label_to_null = Python.Raw_statement("continue_label = None");
let check_label_for = label =>
  Python.Raw_statement("if label == \"" ++ label ++ "\": continue");
let check_label_for_switch =
  Python.Raw_statement("if label == \"switch\": continue");
let check_label_for_nonnull = Python.Raw_statement("if label != None: break");

type variable_declaration_init =
  | InitFun(Rehp.function_expression)
  | InitExp((output, Python.expression));

type mapped_bin_op =
  | AssignOp(Python.assign_op)
  | BinOp(Python.bin_op)
  | FunctionOp(Id.t);

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

  | InstanceOf => raise(Unsupported_op("InstanceOf"))
  | In => raise(Unsupported_op("In"))
  | Lsr => FunctionOp(Id.ident("lsr"))
  | Asr => FunctionOp(Id.ident("asr"));

let rec map_unop = (input, unop, expression) => {
  let get_unop_result = op => {
    let (output, expression) = map_expression(input, expression);
    (output, Python.EUn(op, expression));
  };

  switch (unop) {
  | Rehp.ToInt =>
    let (output, expression) = map_expression(input, expression);
    (output, Python.ECall(EVar(Id.ident("int")), [expression]));

  | Not => get_unop_result(Not)
  | Neg => get_unop_result(Neg)
  | Pl => get_unop_result(Pl)
  | Bnot => get_unop_result(Bnot)

  | Typeof => raise(Unsupported_op("Typeof"))
  | IsInt =>
    let (output, expression) = map_expression(input, expression);
    (output, Python.ECall(EVar(Id.ident("is_int")), [expression]));
  | Void => raise(Unsupported_op("Void"))
  | Delete => raise(Unsupported_op("Delete"))
  | IncrA => raise(Unsupported_op("IncrA"))
  | DecrA => raise(Unsupported_op("DecrA"))
  | IncrB => raise(Unsupported_op("IncrB"))
  | DecrB => raise(Unsupported_op("DecrB"))
  };
}

and map_expression = (input, expression): (output, Python.expression) =>
  switch (expression) {
  | Rehp.ERaw(str) => (empty_output, Python.ERaw(str))

  | ESeq(e1, e2) =>
    let (output1, e1) = map_expression(input, e1);
    let (output2, e2) = map_expression(input, e2);
    (
      concat_outputs([output1, output2]),
      ECond(EBin(Or, e1, EBool(true)), e2, e2),
    );

  | ECond(condition, consequent, alternate) =>
    let (output1, condition) = map_expression(input, condition);
    let (output2, consequent) = map_expression(input, consequent);
    let (output3, alternate) = map_expression(input, alternate);
    (
      concat_outputs([output1, output2, output3]),
      ECond(condition, consequent, alternate),
    );

  | EBin(binop, left_expression, right_expression) =>
    switch (map_bin_op(binop)) {
    | BinOp(binop) =>
      let (output1, left_expression) =
        map_expression(input, left_expression);
      let (output2, right_expression) =
        map_expression(input, right_expression);
      (
        concat_outputs([output1, output2]),
        EBin(binop, left_expression, right_expression),
      );
    | AssignOp(_) =>
      /* TODO this can happen in an ESeq. Promote with output instead, or remove ESeqs*/
      /* raise(Unsupported_expression) */
      (empty_output, ERaw("UnsupportedAssignOp"))
    | FunctionOp(id) =>
      let (output1, left_expression) =
        map_expression(input, left_expression);
      let (output2, right_expression) =
        map_expression(input, right_expression);
      (
        concat_outputs([output1, output2]),
        Python.ECall(EVar(id), [left_expression, right_expression]),
      );
    }

  | EUn(unop, expression) => map_unop(input, unop, expression)

  | ECall(expression, arguments, _) =>
    let (output1, expression) = map_expression(input, expression);
    let (output2, arguments) = map_expressions(input, arguments);
    (concat_outputs([output1, output2]), ECall(expression, arguments));

  | ECopy(expression, _) =>
    let (output, expression) = map_expression(input, expression);
    (output, ECall(EVar(Id.ident("list")), [expression]));

  | EVar(id) => (empty_output, EVar(id))

  | EFun((id, formal_parameter_list, function_body, _)) =>
    let id =
      switch (id) {
      | None => make_id("function_expression")
      | Some(id) => id
      };
    let output = {
      funcs: [(id, formal_parameter_list, function_body)],
      labels: [],
    };
    (output, Python.EVar(id));

  /* TODO: https://stackoverflow.com/questions/847936/how-can-i-find-the-number-of-arguments-of-a-python-function */
  | EArityTest(expression) => (empty_output, ERaw("arity_test"))

  | EVectlength(expression)
  | EArrLen(expression) =>
    let (output, expression) = map_expression(input, expression);
    (output, ECall(EVar(Id.ident("len")), [expression]));

  | EStructAccess(left_expression, right_expression)
  | EArrAccess(left_expression, right_expression)
  | EAccess(left_expression, right_expression) =>
    let (output1, left_expression) = map_expression(input, left_expression);
    let (output2, right_expression) =
      map_expression(input, right_expression);
    (
      concat_outputs([output1, output2]),
      EAccess(left_expression, right_expression),
    );

  | EDot(expression, id) =>
    let (output, expression) = map_expression(input, expression);
    (output, EDot(expression, Id.ident(id)));

  | EArr(arguments) =>
    let (outputs, arguments) =
      split2(
        List.map(
          fun
          | None => (empty_output, Python.ENone)
          | Some(expression) => map_expression(input, expression),
          arguments,
        ),
      );
    (concat_outputs(outputs), EArr(arguments));

  | EStruct(arguments) =>
    let (output, expression) = map_expressions(input, arguments);
    (output, EArr(expression));

  | EObj(property_name_and_value_list) =>
    let (outputs, property_name_and_value_list) =
      split2(
        List.map(
          ((id, expression)) => {
            let (output, expression) = map_expression(input, expression);
            (output, (id, expression));
          },
          property_name_and_value_list,
        ),
      );
    (concat_outputs(outputs), EDict(property_name_and_value_list));

  | ETag(expression, arguments) =>
    let (output1, expression) = map_expression(input, expression);
    let (output2, expressions) = map_expressions(input, arguments);
    (
      concat_outputs([output1, output2]),
      EArr([expression, ...expressions]),
    );

  | ENew(expression, arguments) =>
    let (output1, expression) = map_expression(input, expression);
    let (output2, arguments) =
      switch (arguments) {
      | None => (empty_output, [])
      | Some(arguments) => map_expressions(input, arguments)
      };
    (concat_outputs([output1, output2]), ENew(expression, arguments));

  | EStr(s, kind) => (empty_output, EStr(s, kind))

  | EBool(b) => (empty_output, EBool(b))

  | EFloat(f) => (empty_output, EFloat(f))

  | EInt(i) => (empty_output, EInt(i))

  | EQuote(s) => (empty_output, EStr(s, `Utf8))

  | ERegexp(s, options) => (empty_output, ERegexp(s, options))
  }

and map_expressions = (input, expressions) => {
  let (outputs, expressions) =
    split2(
      List.map(expression => map_expression(input, expression), expressions),
    );
  (concat_outputs(outputs), expressions);
};

let rec map_cases = (id, else_statements) =>
  fun
  | [] => else_statements
  | [(expression, statement_list), ...rest_clauses] =>
    Some(
      Python.If_statement(
        EBin(Is, id, expression),
        Statement_list(statement_list),
        map_cases(id, else_statements, rest_clauses),
      ),
    );

let rec map_switch =
        (input, condition, case_clauses, default_case, more_case_clauses) => {
  let (output1, condition) = map_expression(input, condition);
  let (output2, clauses) =
    split2(
      List.map(
        ((expression, statement_list)) => {
          let (output1, expression) = map_expression(input, expression);
          let (output2, statement_list) =
            map_statements({enclosed_by: Switch}, statement_list);
          (
            concat_outputs([output1, output2]),
            (expression, statement_list),
          );
        },
        List.concat([case_clauses, more_case_clauses]),
      ),
    );
  let (output3, default_statements) =
    switch (default_case) {
    | None => (empty_output, None)
    | Some(default_case) =>
      let (output, default_statements) =
        map_statements({enclosed_by: Switch}, default_case);
      (output, Some(default_statements));
    };
  let output = concat_outputs([output1, output3, ...output2]);

  let (id, init) =
    switch (condition) {
    | Python.EVar(id) => (condition, None)
    | _ =>
      let id = Python.EVar(make_id("switch_case"));
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

  /* Wrap with a while true because there could be break statements inside */
  /* Slap on a break statement just in case a default case doesn't break */
  let statement =
    Python.WhileTrue_statement(
      Statement_list(
        switch (init) {
        | None => [if_statement, Break_statement]
        | Some(init) => [init, if_statement, Break_statement]
        },
      ),
    );

  let labels = List.filter(label => label != "switch", output.labels);
  let has_switch_label = List.length(labels) < List.length(output.labels);
  let has_other_labels = List.length(labels) > 0;

  let stmts = ref([]);
  let remove_switch =
    switch (input.enclosed_by) {
    | Not_enclosed => false
    | Switch =>
      if (has_switch_label || has_other_labels) {
        stmts := [check_label_for_nonnull];
      };
      false;
    | Loop =>
      if (has_other_labels) {
        stmts := [check_label_for_nonnull];
      };
      if (has_switch_label) {
        stmts := [check_label_for_switch, ...stmts^];
        true;
      } else {
        false;
      };
    | LabelledLoop(label) =>
      let enclosed_labels_count =
        List.length(List.filter(label' => label' == label, labels));
      let has_enclosed_label = enclosed_labels_count > 0;
      let only_has_enclosed_label =
        enclosed_labels_count === List.length(labels);

      if (!only_has_enclosed_label && has_other_labels) {
        stmts := [check_label_for_nonnull];
      };
      if (has_enclosed_label) {
        stmts := [check_label_for(label), ...stmts^];
      };
      if (has_switch_label) {
        stmts := [check_label_for_switch, ...stmts^];
        true;
      } else {
        false;
      };
    };

  let statement =
    List.length(stmts^) > 0
      ? Python.Statement_list([set_label_to_null, statement, ...stmts^])
      : statement;

  let output = remove_switch ? {...output, labels} : output;

  (output, statement);
}

and map_loop = (input, label, statement) => {
  let (output, statement) =
    map_statement(
      {
        enclosed_by:
          switch (label) {
          | None => Loop
          | Some(label) => LabelledLoop(label)
          },
      },
      statement,
    );

  let labels =
    switch (label) {
    | None => output.labels
    | Some(label) => List.filter(label' => label' != label, output.labels)
    };

  let statement =
    switch (label) {
    | None => statement
    | Some(_) => Python.Statement_list([set_label_to_null, statement])
    };

  let statement =
    switch (input.enclosed_by) {
    | Not_enclosed => Python.WhileTrue_statement(statement)
    | Loop
    | Switch =>
      if (List.length(labels) === 0) {
        Python.WhileTrue_statement(statement);
      } else {
        Python.Statement_list([
          WhileTrue_statement(statement),
          check_label_for_nonnull,
        ]);
      }
    | LabelledLoop(label) =>
      if (List.length(List.filter(label' => label' != label, labels)) === 0) {
        Python.Statement_list([
          WhileTrue_statement(statement),
          check_label_for(label),
        ]);
      } else {
        Python.Statement_list([
          WhileTrue_statement(statement),
          check_label_for(label),
          check_label_for_nonnull,
        ]);
      }
    };

  ({...output, labels}, statement);
}

and map_statement_aux = input =>
  fun
  | Rehp.Empty_statement => (empty_output, Python.Empty_statement)

  | Block(statements) => {
      let (output, statements) = map_statements(input, statements);
      (output, Statement_list(statements));
    }

  | Raw_statement(provides, requires, str) => (
      empty_output,
      Raw_statement(str),
    )

  | Variable_statement(variable_declaration_list) => {
      let (outputs, statements) =
        split2(
          List.map(
            ((id, initialiser)) => {
              let initialiser =
                switch (initialiser) {
                | None => InitExp((empty_output, Python.ENone))
                | Some((Rehp.EFun(function_expression), _)) =>
                  InitFun(function_expression)
                | Some((expression, _)) =>
                  InitExp(map_expression(input, expression))
                };

              switch (initialiser) {
              | InitExp((output, initialiser)) => (
                  output,
                  Python.Assignment_statement(Eq, EVar(id), initialiser),
                )
              | InitFun((_, parameter_list, source_element_list, loc)) =>
                map_function(input, id, parameter_list, source_element_list)
              };
            },
            variable_declaration_list,
          ),
        );
      (concat_outputs(outputs), Statement_list(statements));
    }

  | Expression_statement(
      EFun((Some(id), parameter_list, source_element_list, loc)),
    ) =>
    map_function(input, id, parameter_list, source_element_list)

  | Expression_statement(expression) =>
    switch (expression) {
    | EBin(binop, left_expression, right_expression) =>
      switch (map_bin_op(binop)) {
      | AssignOp(assign_op) =>
        let (output1, left_expression) =
          map_expression(input, left_expression);
        let (output2, right_expression) =
          map_expression(input, right_expression);
        (
          concat_outputs([output1, output2]),
          Assignment_statement(assign_op, left_expression, right_expression),
        );
      | BinOp(_) =>
        let (output, expression) = map_expression(input, expression);
        (output, Expression_statement(expression));
      | FunctionOp(id) =>
        let (output1, left_expression) =
          map_expression(input, left_expression);
        let (output2, right_expression) =
          map_expression(input, right_expression);
        (
          concat_outputs([output1, output2]),
          Expression_statement(
            ECall(EVar(id), [left_expression, right_expression]),
          ),
        );
      }
    | _ =>
      let (output, expression) = map_expression(input, expression);
      (output, Expression_statement(expression));
    }

  | If_statement(condition, (consequent, _), alternate) => {
      let (output1, condition) = map_expression(input, condition);
      let (output2, consequent) = map_statement(input, consequent);
      let (output3, alternate) =
        switch (alternate) {
        | None => (empty_output, None)
        | Some((alternate, _)) =>
          let (output, alternate) = map_statement(input, alternate);
          (output, Some(alternate));
        };
      (
        concat_outputs([output1, output2, output3]),
        If_statement(condition, consequent, alternate),
      );
    }

  | Do_while_statement((statement, _), condition) =>
    raise(Unsupported_statement)

  | While_statement(condition, (statement, _)) =>
    raise(Unsupported_statement)

  | ForIn_statement(e1, e2, (s, _)) => raise(Unsupported_statement)

  | For_statement(Left(None), None, None, (statement, _), _) =>
    map_loop(input, None, statement)

  | For_statement(_) => raise(Unsupported_statement)

  | Continue_statement(None, _) =>
    switch (input.enclosed_by) {
    | Not_enclosed => raise(Unsupported_statement)
    | Switch => (
        {...empty_output, labels: ["switch"]},
        Statement_list([set_label_to_switch, Break_statement]),
      )
    | Loop
    | LabelledLoop(_) => (empty_output, Continue_statement)
    }

  | Continue_statement(Some(label), _) => {
      let label = Javascript.Label.to_string(label);
      switch (input.enclosed_by) {
      | Not_enclosed => raise(Unsupported_statement)
      | LabelledLoop(label') when label' == label => (
          empty_output,
          Continue_statement,
        )
      | Switch
      | Loop
      | LabelledLoop(_) => (
          {...empty_output, labels: [label]},
          Statement_list([set_label_to(label), Break_statement]),
        )
      };
    }

  | Break_statement(None) => (empty_output, Break_statement)
  | Break_statement(label) => raise(Unsupported_statement)

  | Return_statement(None) => (empty_output, Return_statement(None))
  | Return_statement(Some(expression)) => {
      let (output, expression) = map_expression(input, expression);
      (output, Return_statement(Some(expression)));
    }

  | Labelled_statement(label, (statement, _)) =>
    switch (statement) {
    | For_statement(Left(None), None, None, (statement, _), _) =>
      map_loop(input, Some(Javascript.Label.to_string(label)), statement)
    | _ => raise(Unsupported_statement)
    }

  | Switch_statement(
      expression,
      case_clauses,
      default_case,
      more_case_clauses,
    ) =>
    map_switch(
      input,
      expression,
      case_clauses,
      default_case,
      more_case_clauses,
    )

  | Throw_statement(expression) => {
      let (output, expression) = map_expression(input, expression);
      (output, Throw_statement(expression));
    }

  | Try_statement(statements, catch_statements, finally_statements) => {
      let (output1, statements) = map_statements(input, statements);
      let (output2, catch_statements) =
        switch (
          x(
            ((id, block)) => (id, map_statements(input, block)),
            catch_statements,
          )
        ) {
        | None => (empty_output, None)
        | Some((id, (output, catch_statements))) => (
            output,
            Some((id, catch_statements)),
          )
        };
      let (output3, finally_statements) =
        switch (x(map_statements(input), finally_statements)) {
        | None => (empty_output, None)
        | Some((output, catch_statements)) => (
            output,
            Some(catch_statements),
          )
        };
      (
        concat_outputs([output1, output2, output3]),
        Try_statement(statements, catch_statements, finally_statements),
      );
    }

  | Debugger_statement => raise(Unsupported_statement)

and map_statement = (input, statement) => {
  let (output, statement) = map_statement_aux(input, statement);
  if (List.length(output.funcs) == 0) {
    (output, statement);
  } else {
    let (outputs, funcs) =
      split2(
        List.map(
          ((id, params, body)) => map_function(input, id, params, body),
          output.funcs,
        ),
      );
    let output = concat_outputs(outputs);
    if (List.length(output.funcs) > 0) {
      raise(Unhandled_functions);
    };
    (output, Statement_list(List.concat([funcs, [statement]])));
  };
}

and map_statements = (input, statements) => {
  let (outputs, statements) =
    split2(
      List.map(
        ((statement, _)) => map_statement(input, statement),
        statements,
      ),
    );
  (concat_outputs(outputs), statements);
}

and map_function = (input, id, parameter_list, source_element_list) => {
  let (output, elements) =
    map_source_elements({enclosed_by: Not_enclosed}, source_element_list);
  if (List.length(output.labels) > 0) {
    raise(Unhandled_labels);
  };
  (output, Python.Function_declaration(id, parameter_list, elements));
}

and map_source_element = input =>
  fun
  | Rehp.Statement(statement) => map_statement(input, statement)
  | Function_declaration((id, parameter_list, source_element_list, _)) =>
    map_function(input, id, parameter_list, source_element_list)

and map_source_elements = (input, elements) => {
  let (outputs, elements) =
    split2(
      List.map(
        ((element, _)) => map_source_element(input, element),
        elements,
      ),
    );
  (concat_outputs(outputs), elements);
};

let program = elements => {
  let (_output, python) = map_source_elements(empty_input, elements);
  python;
};
