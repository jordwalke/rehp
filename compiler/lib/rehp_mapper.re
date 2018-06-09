type t('i, 'o) = {
  expression: ('self, 'i, Rehp.expression) => ('o, Rehp.expression),
  switch_case: ('self, 'i, Rehp.expression) => ('o, Rehp.expression),
  initialiser:
    ('self, 'i, (Rehp.expression, Rehp.location)) =>
    ('o, (Rehp.expression, Rehp.location)),
  statement: ('self, 'i, Rehp.statement) => ('o, Rehp.statement),
  statements: ('self, 'i, Rehp.statement_list) => ('o, Rehp.statement_list),
  source: ('self, 'i, Rehp.source_element) => ('o, Rehp.source_element),
  sources: ('self, 'i, Rehp.source_elements) => ('o, Rehp.source_elements),
  ident: ('self, 'i, Rehp.ident) => ('o, Rehp.ident),
  program: ('self, 'i, Rehp.program) => ('o, Rehp.program),
}
constraint 'self = t('i, 'o);

/* No inputs to each stage, and no other output but the computed AST */
type simple = t(unit, unit);

let opt_output = (empty, f, x) =>
  switch (x) {
  | None => (empty, None)
  | Some(data) =>
    let (out, mapped) = f(data);
    (out, Some(mapped));
  };

/*
 * TODO: use physical equality to minimize allocations when mappings produce
 * no changes.
 */
let create = (empty, joiner) => {
  ident: (_self, _input, i) => (empty, i),
  statements: (self, input, l) => {
    let forEach = ((s, pc)) => {
      let (s_out, s_mapped) = self.statement(self, input, s);
      (s_out, (s_mapped, pc));
    };
    let mapped = List.map(forEach, l);
    let (outputs, mapped_results) = List.split(mapped);
    (joiner(outputs), mapped_results);
  },
  statement: (self, input, x) =>
    switch (x) {
    | Block(b) =>
      let (out, mapped_statements) = self.statements(self, input, b);
      (out, Block(mapped_statements));
    | Variable_statement(l) =>
      let forEach = ((id, eo)) => {
        let (ident_out, ident_mapped) = self.ident(self, input, id);
        let (init_out, init_mapped) =
          opt_output(empty, self.initialiser(self, input), eo);
        (joiner([ident_out, init_out]), (ident_mapped, init_mapped));
      };
      let (outputs, mapped_results) = List.split(List.map(forEach, l));
      (joiner(outputs), Variable_statement(mapped_results));
    | Empty_statement => (empty, Empty_statement)
    | Debugger_statement => (empty, Debugger_statement)
    | Expression_statement(e) =>
      let (output, mapped) = self.expression(self, input, e);
      /*
       * Example of allocation optimization:
       */
      if (mapped === e) {
        (output, x);
      } else {
        (output, Expression_statement(mapped));
      };
    | If_statement(e, s, sopt) =>
      let statement_location = ((statement, loc)) => {
        let (out, mapped) = self.statement(self, input, statement);
        (out, (mapped, loc));
      };
      let (expr_output, expr_mapped) = self.expression(self, input, e);
      let (if_output, if_mapped) = statement_location(s);
      let (sopt_output, sopt_mapped) =
        opt_output(empty, statement_location, sopt);
      let output = joiner([expr_output, if_output, sopt_output]);
      (output, If_statement(expr_mapped, if_mapped, sopt_mapped));
    | Do_while_statement((s, loc), e) =>
      let (s_out, s_mapped) = self.statement(self, input, s);
      let (e_out, e_mapped) = self.expression(self, input, e);
      (
        joiner([s_out, e_out]),
        Do_while_statement((s_mapped, loc), e_mapped),
      );
    | While_statement(e, (s, loc)) =>
      let (s_out, s_mapped) = self.statement(self, input, s);
      let (e_out, e_mapped) = self.expression(self, input, e);
      (joiner([s_out, e_out]), While_statement(e_mapped, (s_mapped, loc)));
    | For_statement(e1, e2, e3, (s, loc)) =>
      let (e1_out, e1_mapped) =
        switch (e1) {
        | Rehp.Left(x) =>
          let (x_out, x_mapped) =
            opt_output(empty, self.expression(self, input), x);
          (x_out, Rehp.Left(x_mapped));
        | Right(l) =>
          let forEach = ((id, eo)) => {
            let (ident_out, ident_mapped) = self.ident(self, input, id);
            let (init_out, init_mapped) =
              opt_output(empty, self.initialiser(self, input), eo);
            (joiner([ident_out, init_out]), (ident_mapped, init_mapped));
          };
          let l = List.map(forEach, l);
          let (outs, mappeds) = List.split(l);
          (joiner(outs), Right(mappeds));
        };
      let (e2_out, e2_mapped) =
        opt_output(empty, self.expression(self, input), e2);
      let (e3_out, e3_mapped) =
        opt_output(empty, self.expression(self, input), e3);
      let (s_out, s_mapped) = self.statement(self, input, s);
      let outs = joiner([e1_out, e2_out, e3_out, s_out]);
      (
        outs,
        For_statement(e1_mapped, e2_mapped, e3_mapped, (s_mapped, loc)),
      );
    | ForIn_statement(e1, e2, (s, loc)) =>
      let (e1_out, e1_mapped) =
        switch (e1) {
        | Left(e) =>
          let (e_out, e_mapped) = self.expression(self, input, e);
          (e_out, Rehp.Left(e_mapped));
        | Right((id, e)) =>
          let (ident_out, ident_mapped) = self.ident(self, input, id);
          let (init_out, init_mapped) =
            opt_output(empty, self.initialiser(self, input), e);
          (
            joiner([ident_out, init_out]),
            Right((ident_mapped, init_mapped)),
          );
        };
      let (e2_out, e2_mapped) = self.expression(self, input, e2);
      let (s_out, s_mapped) = self.statement(self, input, s);
      let outs = joiner([e1_out, e2_out, s_out]);
      (outs, ForIn_statement(e1_mapped, e2_mapped, (s_mapped, loc)));
    | Continue_statement(s) => (empty, Continue_statement(s))
    | Break_statement(s) => (empty, Break_statement(s))
    | Return_statement(e) =>
      let (e_out, e_mapped) =
        opt_output(empty, self.expression(self, input), e);
      (e_out, Return_statement(e_mapped));
    | Labelled_statement(l, (s, loc)) =>
      let (st_out, st_mapped) = self.statement(self, input, s);
      (st_out, Labelled_statement(l, (st_mapped, loc)));
    | Throw_statement(e) =>
      let (e_out, e_mapped) = self.expression(self, input, e);
      (e_out, Throw_statement(e_mapped));
    | Switch_statement(e, l, def, l') =>
      let (e_out, e_mapped) = self.expression(self, input, e);
      let (d_out, d_mapped) =
        opt_output(empty, self.statements(self, input), def);
      let forEach = ((e, s)) => {
        let (e_out, e_mapped) = self.switch_case(self, input, e);
        let (stm_out, stm_mapped) = self.statements(self, input, s);
        let outs = joiner([e_out, stm_out]);
        (outs, (e_mapped, stm_mapped));
      };
      let (l_out, l_mapped) = List.split(List.map(forEach, l));
      let forEach = ((e, s)) => {
        let (e_out, e_mapped) = self.switch_case(self, input, e);
        let (stm_out, stm_mapped) = self.statements(self, input, s);
        let outs = joiner([e_out, stm_out]);
        (outs, (e_mapped, stm_mapped));
      };
      let (l'_out, l'_mapped) = List.split(List.map(forEach, l'));
      let outs = joiner([e_out, d_out, ...l_out @ l'_out]);
      (outs, Switch_statement(e_mapped, l_mapped, d_mapped, l'_mapped));
    | Try_statement(b, catch, final) =>
      let ident_and_statements = ((ident, st)) => {
        let (ident_out, ident_mapped) = self.ident(self, input, ident);
        let (st_out, st_mapped) = self.statements(self, input, st);
        (joiner([ident_out, st_out]), (ident_mapped, st_mapped));
      };
      let (b_out, b_mapped) = self.statements(self, input, b);
      let (catch_out, catch_mapped) =
        opt_output(empty, ident_and_statements, catch);
      let (final_out, final_mapped) =
        opt_output(empty, self.statements(self, input), final);
      (
        joiner([b_out, catch_out, final_out]),
        Try_statement(b_mapped, catch_mapped, final_mapped),
      );
    },
  switch_case: (self, input, e) => self.expression(self, input, e),
  expression: (self, input, x) =>
    Rehp.(
      switch (x) {
      | ESeq(e1, e2) =>
        let (e1_out, e1_mapped) = self.expression(self, input, e1);
        let (e2_out, e2_mapped) = self.expression(self, input, e2);
        (joiner([e1_out, e2_out]), Rehp.ESeq(e1_mapped, e2_mapped));
      | ECond(e1, e2, e3) =>
        let (e1_out, e1_mapped) = self.expression(self, input, e1);
        let (e2_out, e2_mapped) = self.expression(self, input, e2);
        let (e3_out, e3_mapped) = self.expression(self, input, e3);
        (
          joiner([e1_out, e2_out, e3_out]),
          ECond(e1_mapped, e2_mapped, e3_mapped),
        );
      | EBin(b, e1, e2) =>
        let (e1_out, e1_mapped) = self.expression(self, input, e1);
        let (e2_out, e2_mapped) = self.expression(self, input, e2);
        (joiner([e1_out, e2_out]), Rehp.EBin(b, e1_mapped, e2_mapped));
      | EUn(b, e1) =>
        let (e1_out, e1_mapped) = self.expression(self, input, e1);
        (e1_out, EUn(b, e1_mapped));
      | ECall(e1, e2, loc) =>
        let (e1_out, e1_mapped) = self.expression(self, input, e1);
        let (e2_outs, e2_mappeds) =
          List.split(List.map(self.expression(self, input), e2));
        (joiner([e1_out, ...e2_outs]), ECall(e1_mapped, e2_mappeds, loc));
      | EAccess(e1, e2) =>
        let (e1_out, e1_mapped) = self.expression(self, input, e1);
        let (e2_out, e2_mapped) = self.expression(self, input, e2);
        (joiner([e1_out, e2_out]), EAccess(e1_mapped, e2_mapped));
      | EStructAccess(e1, e2) =>
        let (e1_out, e1_mapped) = self.expression(self, input, e1);
        let (e2_out, e2_mapped) = self.expression(self, input, e2);
        (joiner([e1_out, e2_out]), EStructAccess(e1_mapped, e2_mapped));
      | EArrAccess(e1, e2) =>
        let (e1_out, e1_mapped) = self.expression(self, input, e1);
        let (e2_out, e2_mapped) = self.expression(self, input, e2);
        (joiner([e1_out, e2_out]), EArrAccess(e1_mapped, e2_mapped));
      | EDot(e1, id) =>
        let (e1_out, e1_mapped) = self.expression(self, input, e1);
        (e1_out, EDot(e1_mapped, id));
      | ENew(e1, Some(args)) =>
        let (e1_out, e1_mapped) = self.expression(self, input, e1);
        let (args_outs, args_mappeds) =
          List.split(List.map(self.expression(self, input), args));
        (
          joiner([e1_out, ...args_outs]),
          ENew(e1_mapped, Some(args_mappeds)),
        );
      | ENew(e1, None) =>
        let (e1_out, e1_mapped) = self.expression(self, input, e1);
        (e1_out, ENew(e1_mapped, None));
      | EVar(v) =>
        let (e_out, e_mapped) = self.ident(self, input, v);
        (e_out, EVar(e_mapped));
      | EFun((idopt, params, body, fv, nid)) =>
        let (ident_out, ident_mapped) =
          opt_output(empty, self.ident(self, input), idopt);
        let (params_outs, params_mappeds) =
          List.split(List.map(self.ident(self, input), params));
        let (sources_out, sources_mapped) = self.sources(self, input, body);
        (
          joiner([ident_out, ...params_outs @ [sources_out]]),
          EFun((ident_mapped, params_mappeds, sources_mapped, fv, nid)),
        );
      | EArityTest(e1) =>
        let (e1_out, e1_mapped) = self.expression(self, input, e1);
        (e1_out, EArityTest(e1_mapped));
      | EArrLen(e) =>
        let (e_out, e_mapped) = self.expression(self, input, e);
        (e_out, EArrLen(e_mapped));
      | EStruct(l) =>
        let (outs, mappeds) =
          List.split(List.map(self.expression(self, input), l));
        (joiner(outs), EStruct(mappeds));
      | ETag(i, l) =>
        let (i_out, i_mapped) = self.expression(self, input, i);
        let (outs, mappeds) =
          List.split(List.map(self.expression(self, input), l));
        (joiner([i_out, ...outs]), ETag(i_mapped, mappeds));
      | EArr(l) =>
        let (outs, mappeds) =
          List.split(
            List.map(opt_output(empty, self.expression(self, input)), l),
          );
        (joiner(outs), EArr(mappeds));
      | EObj(l) =>
        let (outs, mappeds) =
          List.split(
            List.map(
              ((i, e)) => {
                let (out, mapped) = self.expression(self, input, e);
                (out, (i, mapped));
              },
              l,
            ),
          );
        (joiner(outs), EObj(mappeds));
      | EStr(_) as x
      | EBool(_) as x
      | ENum(_) as x
      | EQuote(_) as x
      | ERegexp(_) as x => (empty, x)
      }
    ),
  initialiser: (self, input, (e, pc)) => {
    let (o, m) = self.expression(self, input, e);
    (o, (m, pc));
  },
  /* TODO: The free vars should also be mapped over. But if you wait to add
     them until the end, that isn't required. */
  source: (self, input) =>
    fun
    | Statement(s) => {
        let (out, mapped) = self.statement(self, input, s);
        (out, Rehp.Statement(mapped));
      }
    | Function_declaration((id, params, body, fv, nid)) => {
        let (params_outs, params_mappeds) =
          List.split(List.map(self.ident(self, input), params));
        let (ident_out, ident_mapped) = self.ident(self, input, id);
        let (sources_out, sources_mapped) = self.sources(self, input, body);
        let outs = joiner([ident_out, ...params_outs @ [sources_out]]);
        (
          outs,
          Function_declaration((
            ident_mapped,
            params_mappeds,
            sources_mapped,
            fv,
            nid,
          )),
        );
      },
  sources: (self, input, x) => {
    let forEach = ((s, loc)) => {
      let (source_out, source_mapped) = self.source(self, input, s);
      (source_out, (source_mapped, loc));
    };
    let (outs, mappeds) = List.split(List.map(forEach, x));

    (joiner(outs), mappeds);
  },
  program: (self, input, x) => self.sources(self, input, x),
};

let simple_base_mapper: simple = {
  let unit_joiner = _lst => ();
  create((), unit_joiner);
};

/* var substitution example */
let substitution_mapper = identity_sub => {
  ...simple_base_mapper,
  ident: (_self, _input, ident) => identity_sub(ident),
};

/* Node counter example */
let count_joiner = lst => {
  print_string(String.concat(",", List.map(string_of_int, lst)));
  print_newline();
  List.fold_left((+), 0, lst);
};

let simple_counter_mapper: t(unit, int) = {
  ...create(0, count_joiner),
  ident: (_self, _input, ident) => (1, ident),
};
