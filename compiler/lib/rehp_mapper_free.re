/*
 * A Rehp_mapper_free is an instance of a Rehp_mapper that accepts a lexical
 * environment as input and produces a mapping of the Ast along with an output
 * describing the set of free variables of the term, along with the set of
 * declared variables in the term that are visible outside of the term.
 */
open Util;
open Rehp_shared;

/* Variables counts defined in scope. Maintain invariant that only holds
 * non-zero counts. */
type vars = {
  names: StringMap.t(int),
  vars: Code.VarMap.t(int),
};
/*
 * Input to tree walking is the variables in scope. This isn't currently used
 * but extensions of this module may use it.
 */
type input = vars;

type output = {
  dec: vars,
  /*
   * Variables used inside the term that are not bound in this term (they may
   * be bound by a higher containing term).
   */
  use: vars,
};

let empty = {names: StringMap.empty, vars: Code.VarMap.empty};
let empty_output = {dec: empty, use: empty};

let print_str_map_keys = (title, sm) => {
  let (keys, _) = List.split(Util.StringMap.bindings(sm));
  print_string(title ++ String.concat(",", keys));
  print_newline();
};

let bump_string_map = (k, amount, sm) => {
  let exists = StringMap.mem(k, sm);
  let cur = exists ? StringMap.find(k, sm) : 0;
  let sm = exists ? StringMap.remove(k, sm) : sm;

  if (cur + amount < 0) {
    raise(Invalid_argument("Bumped count below zero."));
  };
  cur + amount === 0 ? sm : StringMap.add(k, cur + amount, sm);
};

let bump_var_map = (k, amount, sm) => {
  let exists = Code.VarMap.mem(k, sm);
  let cur = exists ? Code.VarMap.find(k, sm) : 0;
  let sm = exists ? Code.VarMap.remove(k, sm) : sm;

  if (cur + amount < 0) {
    raise(Invalid_argument("Bumped count below zero."));
  };
  cur + amount === 0 ? Code.VarMap.add(k, cur + amount, sm) : sm;
};

let bump_var = (vars, x) =>
  switch (x) {
  | S({name, _}) => {...vars, names: bump_string_map(name, 1, vars.names)}
  | V(v) => {...vars, vars: bump_var_map(v, 1, vars.vars)}
  };

let use_one_var = v => bump_var(empty, v);

let merge_sum = (_k, count1, count2) =>
  switch (count1, count2) {
  | (None, None) => None /* Okay, what situation is this? */
  | (Some(n), None) => Some(n)
  | (None, Some(n)) => Some(n)
  | (Some(m), Some(n)) => n + m === 0 ? None : Some(n + m)
  };

/*
 * Subtracts lexical scope from another lexical scope.
 */
let merge_sub = (_k, count1, count2) =>
  switch (count1, count2) {
  | (None, None) => None /* Okay, what situation is this? */
  | (Some(n), None) => Some(n)
  | (None, Some(_n)) => None /* Subtract all lexical scope */
  | (Some(m), Some(n)) =>
    let next_count = n - m;
    assert(next_count >= 0);
    next_count === 0 ? None : Some(next_count);
  };

let append = (cur, next) => {
  vars: Code.VarMap.merge(merge_sum, cur.vars, next.vars),
  names: StringMap.merge(merge_sum, cur.names, next.names),
};

let unappend = (cur, next) => {
  vars: Code.VarMap.merge(merge_sub, cur.vars, next.vars),
  names: StringMap.merge(merge_sub, cur.names, next.names),
};

let remove = (cur, remove) => {
  vars:
    Code.VarMap.filter(
      (k, _) => ! Code.VarMap.mem(k, remove.vars),
      cur.vars,
    ),
  names:
    StringMap.filter((k, _) => ! StringMap.mem(k, remove.names), cur.names),
};

let intersect = (cur, intersect_with) => {
  vars:
    Code.VarMap.filter(
      (k, _) => Code.VarMap.mem(k, intersect_with.vars),
      cur.vars,
    ),
  names:
    StringMap.filter(
      (k, _) => StringMap.mem(k, intersect_with.names),
      cur.names,
    ),
};

let output_append = (cur, next) => {
  dec: append(cur.dec, next.dec),
  use: append(cur.use, next.use),
};

let top_level_identifiers_st = (new_vars_so_far, st) =>
  switch (st) {
  /*
   * This doesn't handle the case where a variable is used *before* it is
   * defined somewhere. That's okay, we'll consider that to be invalid
   * Rehp IR.
   */
  | Rehp.Variable_statement(l) =>
    let augment_env = (env, (id, _eopt)) => bump_var(env, id);
    List.fold_left(augment_env, new_vars_so_far, l);
  | For_statement(Right(l), _e2, _e3, (_s, _loc)) =>
    let augment_env = (env, (id, _eopt)) => bump_var(env, id);
    let added_vars = List.fold_left(augment_env, empty, l);
    append(new_vars_so_far, added_vars);
  | ForIn_statement(Right((id, _eopt)), _e2, (_s, _loc)) =>
    let added_vars = use_one_var(id);
    append(new_vars_so_far, added_vars);
  /*
   * TODO: Probably need to go one level deeper on the try body.
   */
  | Try_statement(_, _, _) => new_vars_so_far
  | _ => new_vars_so_far
  };

let top_level_identifiers_st_loc = (new_vars_so_far, (st, _loc)) =>
  top_level_identifiers_st(new_vars_so_far, st);

let top_level_identifiers = (new_vars_so_far, (src, _)) =>
  switch (src) {
  | Rehp.Function_declaration((id, _, _, _, _, _)) =>
    bump_var(new_vars_so_far, id)
  | Statement(stmt) => top_level_identifiers_st(new_vars_so_far, stmt)
  };

let rec fold_sources =
        (self, cur_input, cur_output, cur_rev_mappeds, remaining) =>
  switch (remaining) {
  | [] => (cur_output, List.rev(cur_rev_mappeds))
  | [(s, loc), ...tl] =>
    let (this_out, this_mapped) =
      self.Rehp_mapper.source(self, cur_input, s);
    let next_out = output_append(cur_output, this_out);
    let next_input = append(cur_input, next_out.dec);
    fold_sources(
      self,
      next_input,
      next_out,
      [(this_mapped, loc), ...cur_rev_mappeds],
      tl,
    );
  };
let rec fold_statements =
        (self, cur_input, cur_output, cur_rev_mappeds, remaining) =>
  switch (remaining) {
  | [] => (cur_output, List.rev(cur_rev_mappeds))
  | [(s, loc), ...tl] =>
    let (this_out, this_mapped) =
      self.Rehp_mapper.statement(self, cur_input, s);
    let next_out = output_append(cur_output, this_out);
    let next_input = append(cur_input, next_out.dec);
    fold_statements(
      self,
      next_input,
      next_out,
      [(this_mapped, loc), ...cur_rev_mappeds],
      tl,
    );
  };
let mapper = {
  let super = Rehp_mapper.create(empty_output, output_append);
  {
    ...super,
    expression: (self, input, x) =>
      switch (x) {
      | EArr(_) =>
        let (super_out, res) = super.expression(self, input, x);
        let out =
          output_append(
            super_out,
            {
              use: use_one_var(S({name: "ArrayLiteral", var: None})),
              dec: empty,
            },
          );
        (out, res);
      | EVar(v) =>
        let out = {use: use_one_var(v), dec: empty};
        (out, x);
      | EFun((ident, params, body, _, _, nid)) =>
        /* New vars scoped to the body of function */
        let new_body_vars = List.fold_left(bump_var, empty, params);
        /*
         * Rehp intermediate representation assumes that EFun's identifier
         * (which is almost always omitted in practice) may only be available
         * to the function body's scope - not containing scope. There isn't a
         * straightforward way to represent that in Php. It should be delegated
         * to stubs, and we can remove the ability for Efun to have
         * identifiiers.
         */
        /* let new_body_vars = */
        /*   switch (ident) { */
        /*   | Some(i) => bump_var(new_body_vars, i) */
        /*   | None => new_body_vars */
        /*   }; */
        let augmented_input = append(input, new_body_vars);
        let (body_out, body_mapped) =
          self.sources(self, augmented_input, body);
        /* Rehp models an IR with "function scope" for variables. */
        /* Declarations reset at function boundaries. */
        /*
         * TODO: Don't just remove but decrement instead.
         */
        let body_uses_from_outside = remove(body_out.use, new_body_vars);
        let body_uses_from_outside =
          remove(body_uses_from_outside, body_out.dec);
        let body_uses_scope = intersect(body_uses_from_outside, input);
        let body_uses_global = remove(body_uses_from_outside, input);
        let out = {use: body_uses_from_outside, dec: empty};
        let from_scope = (body_uses_scope.names, body_uses_scope.vars);
        let from_glob = (body_uses_global.names, body_uses_global.vars);
        /* uses:_aZ_,_bp_,render$1 */
        /* new_body_vars:_bq_,_br_ */
        /* globals: */
        print_str_map_keys("\nuses:", out.use.names);
        print_str_map_keys("new_body_vars:", new_body_vars.names);
        print_str_map_keys("uses from scope:", body_uses_scope.names);
        print_str_map_keys("globals:", body_uses_global.names);
        (
          out,
          EFun((
            ident,
            params,
            body_mapped,
            Some(from_glob),
            Some(from_scope),
            nid,
          )),
        );
      | _ => super.expression(self, input, x)
      },
    source: (self, input, x) =>
      switch (x) {
      | Rehp.Function_declaration((id, params, body, _, _, nid)) =>
        /* New vars scoped to the body of function */
        let new_body_vars = List.fold_left(bump_var, empty, params);
        /* Still true even if this will be rewritten as Variable binding to EFun. */
        /* Vars that augment the surrounding environment */
        let new_outside_vars = use_one_var(id);
        let augmented_input =
          append(append(input, new_body_vars), new_outside_vars);
        let (body_out, body_mapped) =
          self.sources(self, augmented_input, body);
        /*
         * TODO: Don't just remove but decrement instead.
         */
        let body_uses_from_outside = remove(body_out.use, new_body_vars);
        let body_uses_from_outside =
          remove(body_uses_from_outside, body_out.dec);
        let body_uses_scope = intersect(body_uses_from_outside, input);
        let body_uses_global = remove(body_uses_from_outside, input);
        let out = {use: body_uses_from_outside, dec: new_outside_vars};
        let from_scope = (body_uses_scope.names, body_uses_scope.vars);
        let from_glob = (body_uses_global.names, body_uses_global.vars);
        print_str_map_keys("\nfunction decl uses:", out.use.names);
        print_str_map_keys("input:", augmented_input.names);
        print_str_map_keys("globals:", body_uses_global.names);
        (
          out,
          Function_declaration((
            id,
            params,
            body_mapped,
            Some(from_glob),
            Some(from_scope),
            nid,
          )),
        );
      | Statement(_) => super.source(self, input, x)
      },
    /*
     * Ensures that all the declared variables in a function body contributes
     * to the `input` lexical scope of the next binding. This satisfies very
     * linearly declared environments, but is not sufficient for mutually
     * recursive bindings.
     *
     * To support mutually recursive bindings, we will first do a single
     * shallow analysis of all the variable bindings and functions declared.
     * For each one, we bump their declaration-scope counts. We need to be
     * careful not to bump them twice though (actually that might not matter
     * for input).
     */
    sources: (self, input, x) => {
      /*
       * This will end up appending to the scope twice once we recurse, but
       * since everything is immutable we don't need to worry about maintaining
       * an exact count of nested scopes per ident.
       */
      let top_level_idents = List.fold_left(top_level_identifiers, input, x);
      let input_with_mutual_bindings = append(input, top_level_idents);
      fold_sources(self, input_with_mutual_bindings, empty_output, [], x);
    },
    statements: (self, input, l) => {
      let top_level_idents =
        List.fold_left(top_level_identifiers_st_loc, input, l);
      let input_with_mutual_bindings = append(input, top_level_idents);
      fold_statements(self, input_with_mutual_bindings, empty_output, [], l);
    },
    statement: (self, input, x) =>
      switch (x) {
      /*
       * This doesn't handle the case where a variable is used *before* it is
       * defined somewhere. That's okay, we'll consider that to be invalid
       * Rehp IR.
       */
      | Variable_statement(l) =>
        let augment_env = (env, (id, _eopt)) => bump_var(env, id);
        let added_vars = List.fold_left(augment_env, empty, l);
        /* print_str_map_keys("added variables:", added_vars.names); */
        let augmented_input = append(input, added_vars);
        let (super_out, res) = super.statement(self, augmented_input, x);
        let out = {
          use: super_out.use,
          dec: append(super_out.dec, added_vars),
        };
        (out, res);
      | For_statement(Right(l), _e2, _e3, (_s, _loc)) =>
        let augment_env = (env, (id, _eopt)) => bump_var(env, id);
        let added_vars = List.fold_left(augment_env, empty, l);
        let augmented_input = append(input, added_vars);
        let (super_out, res) = super.statement(self, augmented_input, x);
        let out = {
          use: super_out.use,
          dec: append(super_out.dec, added_vars),
        };
        (out, res);
      | ForIn_statement(Right((id, _eopt)), _e2, (_s, _loc)) =>
        let added_vars = use_one_var(id);
        let augmented_input = append(input, added_vars);
        let (super_out, res) = super.statement(self, augmented_input, x);
        let out = {
          use: super_out.use,
          dec: append(super_out.dec, added_vars),
        };
        (out, res);
      /*
       * TODO: For Php, the exception is not actually block scoped and so we
       * don't need to do any special handling here.
       */
      | Try_statement(b, catch, final) =>
        /*
         * Customization that augments the scope with catch identifier.
         */
        let ident_and_statements = ((ident, st)) => {
          let (_ident_out, ident_mapped) = self.ident(self, input, ident);
          let added_vars = use_one_var(ident);
          let augmented_input = append(input, added_vars);
          let (st_out, st_mapped) =
            self.statements(self, augmented_input, st);

          let st_uses = remove(st_out.use, added_vars);
          let out = {use: st_uses, dec: st_out.dec};
          (out, (ident_mapped, st_mapped));
        };
        let (b_out, b_mapped) = self.statements(self, input, b);
        let (catch_out, catch_mapped) =
          Rehp_mapper.opt_output(empty_output, ident_and_statements, catch);
        let (final_out, final_mapped) =
          Rehp_mapper.opt_output(
            empty_output,
            self.statements(self, input),
            final,
          );
        let out = {
          use: append(b_out.use, append(catch_out.use, final_out.use)),
          dec: append(b_out.dec, append(catch_out.dec, final_out.dec)),
        };
        (out, Try_statement(b_mapped, catch_mapped, final_mapped));
      | _ => super.statement(self, input, x)
      },
  };
};
