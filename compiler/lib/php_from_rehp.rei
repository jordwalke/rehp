/**
 * Maps an `(input, Rehp.expression)` to an `(output, Php.expression)`
 */;

/* Variables counts defined in scope. Maintain invariant that only holds
 * non-zero counts. */
type vars = {
  names: Stdlib.StringMap.t(int),
  vars: Code.Var.Map.t(int),
};

type output = {
  dec: vars,
  /*
   * Variables used inside the term that are not bound in this term (they may
   * be bound by a higher containing term).
   */
  use: vars,
  use_label: bool,
};

type input = vars;
let addOne: (vars, Id.t) => vars;
let empty: vars;
let expression: (input, Rehp.expression) => (output, Php.expression);
let switchCase: (input, Rehp.expression) => (output, Php.expression);
let initialiser:
  (input, (Rehp.expression, Loc.t)) => (output, (Php.expression, Loc.t));
let statement: (output, input, Rehp.statement) => (output, Php.statement);
let statements: (output, input, Rehp.statement_list) => (output, Php.statement_list);
let source: (output, input, Rehp.source_element) => (output, Php.source_element);
let sources: (output, input, Rehp.source_elements) => (output, Php.source_elements);
let ident: (~ref: bool=?, input, Id.t) => Id.t;
let program: (input, Rehp.program) => (output, Php.program);
let binop_from_rehp: Rehp.binop => Php.binop;
