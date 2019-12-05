open Python;

exception InvalidTabbing;

module Make =
       (
         Config: {
           let print_string: string => unit;
           let newline: unit => unit;
         },
       ) => {
  open Config;

  let print_int = i => print_string(string_of_int(i));
  let print_float = f => print_string(string_of_float(f));
  let space = () => print_string(" ");
  let comma_space = () => print_string(", ");

  let array_conv =
    Array.init(16, i => String.make(1, "0123456789abcdef".[i]));
  let array_str1 = Array.init(256, i => String.make(1, Char.chr(i)));

  /* TODO: combine with version in php_output */
  let pp_string = (~quote='\'', ~utf=false, s) => {
    let quote_s = String.make(1, quote);
    print_string(quote_s);
    let l = String.length(s);
    for (i in 0 to l - 1) {
      let c = s.[i];
      switch (c) {
      | '\000' when i == l - 1 || s.[i + 1] < '0' || s.[i + 1] > '9' =>
        print_string("\\0")
      | '\b' => print_string("\\b")
      | '\t' => print_string("\\t")
      | '\n' => print_string("\\n")
      /* This escape sequence is not supported by IE < 9
            | '\011' -> "\\v"
         */
      | '\012' => print_string("\\f")
      | '\\' when !utf => print_string("\\\\")
      | '\r' => print_string("\\r")
      | '\000'..'\031'
      | '\127' =>
        let c = Char.code(c);
        print_string("\\x");
        print_string(Array.unsafe_get(array_conv, c lsr 4));
        print_string(Array.unsafe_get(array_conv, c land 15));
      | '\128'..'\255' when !utf =>
        let c = Char.code(c);
        print_string("\\x");
        print_string(Array.unsafe_get(array_conv, c lsr 4));
        print_string(Array.unsafe_get(array_conv, c land 15));
      | _ =>
        if (c == quote) {
          print_string("\\");
          print_string(Array.unsafe_get(array_str1, Char.code(c)));
        } else {
          print_string(Array.unsafe_get(array_str1, Char.code(c)));
        }
      };
    };
    print_string(quote_s);
  };

  let tabcount = ref(0);
  let print_tab = () => {
    let spaces = ref("");
    for (i in 0 to tabcount^ - 1) {
      spaces := spaces^ ++ "  ";
    };
    print_string(spaces^);
  };
  let newline_tab = () => {
    newline();
    tabcount := tabcount^ + 1;
    tabcount^;
  };
  let untab = tabcount' => {
    if (tabcount' !== tabcount^) {
      /* multiple or missing untabs */
      raise(InvalidTabbing);
    };
    tabcount := tabcount^ - 1;
  };

  let assign_op_string =
    fun
    | Eq => "="
    | StarEq => "*="
    | SlashEq => "/="
    | ModEq => "%="
    | PlusEq => "+="
    | MinusEq => "-="
    | LslEq => "<<="
    | AsrEq => ">>="
    | BandEq => "&="
    | BxorEq => "^="
    | BorEq => "|=";

  let bin_op_string =
    fun
    | Or => "or"
    | And => "and"
    | Bor => "|"
    | Bxor => "^"
    | Band => "&"
    | EqEq => "=="
    | NotEq => "!="
    | Is => "is"
    | IsNot => "is not"
    | Lt => "<"
    | Le => "<="
    | Gt => ">"
    | Ge => ">="
    | Lsl => "<<"
    | Plus => "+"
    | Minus => "-"
    | Mul => "*"
    | Div => "/"
    | Mod => "%";

  let un_op_string =
    fun
    | Not => "not"
    | Neg => "-"
    | Pl => "+"
    | Bnot => "~";

  let print_assign_op = op => print_string(assign_op_string(op));
  let print_bin_op = op => print_string(bin_op_string(op));
  let print_un_op = op => print_string(un_op_string(op));

  let print_id =
    fun
    | Id.S({name}) => print_string(name)
    | Id.V(_) => /* TODO: what is this */ assert(false);

  let print_property_name =
    fun
    | Id.PNI(id_name) => print_string(id_name)
    | Id.PNS(s) => pp_string(s)
    | Id.PNN(f) => print_float(f);

  let rec print_list = (print, separator, li) =>
    switch (li) {
    | [] => ()
    | [e] => print(e)
    | [e, ...rest] =>
      print(e);
      separator();
      print_list(print, separator, rest);
    };

  let rec print_parameter_list = li => print_list(print_id, comma_space, li)

  and print_statement_list = li => {
    switch (li) {
    | [] =>
      print_tab();
      print_string("pass");
    | li => print_list(print_statement, newline, li)
    };
  }

  and print_element_list = li => print_list(print_expression, comma_space, li)

  and print_property_name_and_value_list = li =>
    print_list(
      ((property_name, expression)) => {
        print_property_name(property_name);
        print_string(": ");
        print_expression(expression);
      },
      comma_space,
      li,
    )

  and print_expression = expression => {
    switch (expression) {
    | ENone => print_string("None")

    | ERaw(str) => print_string(str)

    | ECond(condition, consequent, alternate) =>
      print_string("(");
      print_expression(consequent);
      print_string(" if ");
      print_expression(condition);
      print_string(" else ");
      print_expression(alternate);
      print_string(")");

    | EBin(bin_op, left_expression, right_expression) =>
      print_expression(left_expression);
      space();
      print_bin_op(bin_op);
      space();
      print_expression(right_expression);

    | EUn(un_op, expression) =>
      print_un_op(un_op);
      print_string("(");
      print_expression(expression);
      print_string(")");

    | ECall(expression, element_list) =>
      print_expression(expression);
      print_string("(");
      print_element_list(element_list);
      print_string(")");

    | EAccess(left_expression, right_expression) =>
      print_expression(left_expression);
      print_string("[");
      print_expression(right_expression);
      print_string("]");

    | EDot(expression, id) =>
      print_expression(expression);
      print_string(".");
      print_id(id);

    | ENew(expression, element_list) =>
      print_string("new ");
      print_expression(expression);
      print_string("(");
      print_element_list(element_list);
      print_string(")");

    | EVar(id) => print_id(id)

    | EStr(v, kind) => pp_string(~utf=kind === `Utf8, v)

    | EArr(element_list) =>
      print_string("[");
      print_element_list(element_list);
      print_string("]");

    | EBool(b) => print_string(b ? "true" : "false")

    | EFloat(f) => print_float(f)

    | EInt(i) => print_int(i)

    | EDict(property_name_and_value_list) =>
      print_string("{");
      print_property_name_and_value_list(property_name_and_value_list);
      print_string("}");

    | ERegexp(regex, options) => /* TODO: how to handle this */ assert(false)
    };
  }

  and print_statement = statement => {
    switch (statement) {
    | Raw_statement(s) =>
      print_tab();
      print_string(s);

    | Empty_statement => ()

    | Statement_list(statement_list) => print_statement_list(statement_list)

    | Function_declaration(id, parameter_list, statement_list) =>
      print_tab();
      print_string("def ");
      print_id(id);
      print_string("(");
      print_parameter_list(parameter_list);
      print_string("):");

      let tc = newline_tab();
      print_statement_list(statement_list);
      untab(tc);

    | Assignment_statement(assign_op, left_expression, right_expression) =>
      print_tab();
      print_expression(left_expression);
      space();
      print_assign_op(assign_op);
      space();
      print_expression(right_expression);

    | Expression_statement(expression) =>
      print_tab();
      print_expression(expression);

    | If_statement(test, consequent, alternate) =>
      print_tab();
      print_string("if ");
      print_expression(test);
      print_string(":");

      let tc = newline_tab();
      print_statement(consequent);
      untab(tc);

      switch (alternate) {
      | None => ()
      | Some(alternate) =>
        newline();
        print_tab();
        print_string("else:");

        let tc = newline_tab();
        print_statement(alternate);
        untab(tc);
      };

    | WhileTrue_statement(statement) =>
      print_tab();
      print_string("while True:");

      let tc = newline_tab();
      print_statement(statement);
      untab(tc);

    | Continue_statement =>
      print_tab();
      print_string("continue");

    | Break_statement =>
      print_tab();
      print_string("break");

    | Return_statement(expression) =>
      print_tab();
      print_string("return");
      switch (expression) {
      | None => ()
      | Some(expression) =>
        space();
        print_expression(expression);
      };

    | Throw_statement(expression) =>
      print_tab();
      print_string("raise(");
      print_expression(expression);
      print_string(")");

    | Try_statement(statement_list, except, finally) =>
      print_tab();
      print_string("try:");

      let tc = newline_tab();
      print_statement_list(statement_list);
      untab(tc);

      newline();
      print_tab();
      switch (except) {
      | None =>
        print_string("except:");

        let tc = newline_tab();
        print_string("pass");
        untab(tc);

      | Some((id, except)) =>
        print_string("except Exception as ");
        print_id(id);
        print_string(":");

        let tc = newline_tab();
        print_statement_list(except);
        untab(tc);
      };

      switch (finally) {
      | None => ()
      | Some(finally) =>
        newline();
        print_tab();
        print_string("finally:");

        let tc = newline_tab();
        print_statement_list(finally);
        untab(tc);
      };
    };
  };
};

let program = (f, statement_list) => {
  module M =
    Make({
      let print_string = s => Pretty_print.string(f, s);
      let newline = () => Pretty_print.newline(f);
    });
  M.print_statement_list(statement_list);

  if (M.tabcount^ !== 0) {
    /* missing untab */
    raise(InvalidTabbing);
  };
};
