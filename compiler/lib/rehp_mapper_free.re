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

let print_str_map_keys = sm => {
  let (keys, _) = List.split(Util.StringMap.bindings(sm));
  print_string("KEYS:" ++ String.concat(",", keys));
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

let count_merger = (_k, count1, count2) =>
  switch (count1, count2) {
  | (None, None) => None /* Okay, what situation is this? */
  | (Some(n), None) => Some(n)
  | (None, Some(n)) => Some(n)
  | (Some(m), Some(n)) => n + m === 0 ? None : Some(n + m)
  };

let append = (cur, next) => {
  vars: Code.VarMap.merge(count_merger, cur.vars, next.vars),
  names: StringMap.merge(count_merger, cur.names, next.names),
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

let output_append = (cur, next) => {
  dec: append(cur.dec, next.dec),
  use: append(cur.use, next.use),
};

let mapper = {
  let super = Rehp_mapper.create(empty_output, output_append);
  {
    ...super,
    expression: (self, input, x) =>
      switch (x) {
      | EVar(v) =>
        let out = {use: use_one_var(v), dec: empty};
        (out, x);
      | EFun((ident, params, body, _, nid)) =>
        let new_scope = List.fold_left(bump_var, empty, params);
        let (new_scope, dec) =
          switch (ident) {
          | Some(i) => (bump_var(new_scope, i), use_one_var(i))
          | None => (new_scope, empty)
          };
        let augmented_input = append(input, new_scope);
        let (body_out, body_mapped) =
          self.sources(self, augmented_input, body);
        /* Rehp models an IR with "function scope" for variables. */
        /* Declarations reset at function boundaries. */
        let body_uses = remove(body_out.use, new_scope);
        let body_uses = remove(body_uses, body_out.dec);
        let out = {use: body_uses, dec};
        let vars = (out.use.names, out.use.vars);
        (out, EFun((ident, params, body_mapped, Some(vars), nid)));
      | _ => super.expression(self, input, x)
      },
    source: (self, input, x) =>
      switch (x) {
      | Rehp.Function_declaration((id, params, body, _, nid)) =>
        let new_scope = List.fold_left(bump_var, empty, params);
        let new_scope = bump_var(new_scope, id);
        let augmented_input = append(input, new_scope);
        let (body_out, body_mapped) =
          self.sources(self, augmented_input, body);
        let body_uses = remove(body_out.use, new_scope);
        let body_uses = remove(body_uses, body_out.dec);
        let out = {use: body_uses, dec: use_one_var(id)};
        let vars = (out.use.names, out.use.vars);
        (
          out,
          Function_declaration((id, params, body_mapped, Some(vars), nid)),
        );
      | Statement(_) => super.source(self, input, x)
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
        let added_env_vars = List.fold_left(augment_env, empty, l);
        let augmented_input = append(input, added_env_vars);
        let (super_out, res) = super.statement(self, augmented_input, x);
        let out = {
          use: super_out.use,
          dec: append(super_out.dec, added_env_vars),
        };
        (out, res);
      | For_statement(Right(l), _e2, _e3, (_s, _loc)) =>
        let augment_env = (env, (id, _eopt)) => bump_var(env, id);
        let added_env_vars = List.fold_left(augment_env, empty, l);
        let augmented_input = append(input, added_env_vars);
        let (super_out, res) = super.statement(self, augmented_input, x);
        let out = {
          use: super_out.use,
          dec: append(super_out.dec, added_env_vars),
        };
        (out, res);
      | ForIn_statement(Right((id, _eopt)), _e2, (_s, _loc)) =>
        let added_env_vars = use_one_var(id);
        let augmented_input = append(input, added_env_vars);
        let (super_out, res) = super.statement(self, augmented_input, x);
        let out = {
          use: super_out.use,
          dec: append(super_out.dec, added_env_vars),
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
          let added_env_vars = use_one_var(ident);
          let augmented_input = append(input, added_env_vars);
          let (st_out, st_mapped) =
            self.statements(self, augmented_input, st);

          let st_uses = remove(st_out.use, added_env_vars);
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
