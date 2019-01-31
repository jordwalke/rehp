/* Js_of_ocaml compiler
 * http://www.ocsigen.org/js_of_ocaml/
 * Laboratoire PPS - CNRS Université Paris Diderot
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, with linking exception;
 * either version 2.1 of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA 02111-1307, USA.
 */

/*
 * Rehp: A constrained intermediate language to model various language
 * backends.
 *
 * Rehp has semantics similar to a very narrow subset of JavaScript, with the
 * addition of special nodes that track types, externs, and different shapes of
 * structures emitted by the ocaml compiler.
 *
 * Currently, Rehp contains too many possible forms, because there is a
 * conversion step from JavaScript to Rehp that occurs so that the js_of_ocaml
 * compiler can analyze hand written JavaScript.
 *
 * This project aims to remove that architecture of js_of_ocaml, so that
 * js_of_ocaml treats hand written JavaScript as raw strings, without ever
 * doing any analysis on it. The benefit is that we can then remove many parts
 * of Rehp, simplify it, and it will therefore be even easier to support
 * multiple language backends.
 *
 * We should also formalize the semantics of Rehp, as well as specify the
 * constraints:
 * - How should variable scoping work.
 * - Function arity.
 * - And more.
 *
 */

/* A.3 Expressions */

open Stdlib

type array_litteral = element_list
and element_list = list(option(expression))
/*
 * Many of these still need to be split up into their stubs forms and their
 * Rehp forms.
 */
and binop =
  | Eq
  | StarEq
  | SlashEq
  | ModEq
  | PlusEq
  | MinusEq
  | BandEq
  | BxorEq
  | BorEq
  | Or
  | And
  | Bor
  | Bxor
  | Band
  | EqEq
  | NotEq
  | EqEqEq
  | NotEqEq
  | Lt
  | Le
  | Gt
  | Ge
  | InstanceOf /* Only for stubs */
  | In /* Only for stubs */
  | Lsl
  /* Unsigned shift right (32 bits integer truncation.) */
  | Lsr
  | Asr
  | FloatPlus
  | IntPlus
  | Plus
  | Minus
  | Mul
  | Div
  | Mod
/* TODO: Add IsInt */
and unop =
  | Not
  | Neg
  | Pl
  /* Used as a special "FFI" to represent the underlying language's "typeof"
   * operator. In general, the compiler (generate.ml) should use `IsInt`. Only
   * FFI application code should ever want to use the `typeof` of the
   * underlying platform.*/
  | Typeof
  /* High level instruction to test if a valid has integer runtime
   * representation. */
  | IsInt
  | Void /* Only for stubs */
  | Delete /* Only for stubs */
  | Bnot
  | IncrA
  | DecrA
  | IncrB
  | DecrB
and arguments = list(expression)
and property_name_and_value_list = list((Id.property_name, expression))
/* Probably need to distinguish between platform array (parsed from JS) and
   stdlib arrays. Currently they're one and the same. */
and expression =
  | ERaw(string)
  | ESeq(expression, expression)
  | ECond(expression, expression, expression)
  | EBin(binop, expression, expression)
  | EUn(unop, expression)
  | ECall(expression, arguments, Loc.t)
  | EVar(Id.t)
  | EFun(function_expression)
  | EArityTest(expression)
  | EStr(string, [ | `Bytes | `Utf8])
  /* Instructions for accessing standard library arrays.  */
  | EArrAccess(expression, expression)
  | EArrLen(expression)
  | EArr(array_litteral)
  /* An ML fixed-size struct (record/variant) - when the compiler knows the
     layout of memory. */
  | EStructAccess(expression, expression)
  | EStruct(arguments)
  /* Like Struct but for cases where you have a tag */
  | ETag(expression, arguments)
  /* Target specific object structure - no ML equivalent. Typically for
     interop, or when parsing platform stubs written in Php etc.*/
  | EDot(expression, Id.identifier) /* An x->y operation */
  | EAccess(expression, expression) /* An x[y] operation - type of x/y not specified */
  | ENew(expression, option(arguments))
  | EObj(property_name_and_value_list)
  | EBool(bool)
  | ENum(float)
  | EQuote(string)
  | ERegexp(string, option(string))
/****/
/* A.4 Statements */
and statement =
  | Block(block)
  | Raw_statement(list(string), list(string), string)
  | Variable_statement(list(variable_declaration))
  | Empty_statement
  | Expression_statement(expression)
  | If_statement(
      expression,
      (statement, Loc.t),
      option((statement, Loc.t)),
    )
  | Do_while_statement((statement, Loc.t), expression)
  | While_statement(expression, (statement, Loc.t))
  | For_statement(
      either(option(expression), list(variable_declaration)),
      option(expression),
      option(expression),
      (statement, Loc.t),
    )
  | ForIn_statement(
      either(expression, variable_declaration),
      expression,
      (statement, Loc.t),
    )
  | Continue_statement(option(Javascript.Label.t))
  | Break_statement(option(Javascript.Label.t))
  | Return_statement(option(expression))
  /* | With_statement of expression * statement */
  | Labelled_statement(Javascript.Label.t, (statement, Loc.t))
  | Switch_statement(
      expression,
      list(case_clause),
      option(statement_list),
      list(case_clause),
    )
  | Throw_statement(expression)
  | Try_statement(block, option((Id.t, block)), option(block))
  | Debugger_statement
and block = statement_list
and statement_list = list((statement, Loc.t))
and variable_declaration = (Id.t, option(initialiser))
and case_clause = (expression, statement_list)
and initialiser = (expression, Loc.t)
/****/
/* A.5 Functions and programs */
and var_info = option((StringMap.t(int), Code.Var.Map.t(int)))
and function_declaration = (Id.t, formal_parameter_list, function_body, Loc.t)
and function_expression = (
  option(Id.t),
  formal_parameter_list,
  function_body,
  Loc.t,
)
and formal_parameter_list = list(Id.t)
and function_body = source_elements
and program = source_elements
and source_elements = list((source_element, Loc.t))
and source_element =
  | Statement(statement)
  | Function_declaration(function_declaration);

/**
 * Redundantly coppied from the JS implementation. It might deviate
 * though.
 * TODO: This should exist in the Php backend and Js backend not
 * Rehp.
 */
let string_of_number = v =>
  if (v == infinity) {
    "Infinity";
  } else if (v == neg_infinity) {
    "-Infinity";
  } else if (v != v) {
    "NaN";
  } else if
    /* [1/-0] = -inf seems to be the only way to detect -0 in JavaScript */
    (v == 0. && 1. /. v == neg_infinity) {
    "-0";
  } else {
    let vint = int_of_float(v);
    /* compiler 1000 into 1e3 */
    if (float_of_int(vint) == v) {
      let rec div = (n, i) =>
        if (n != 0 && n mod 10 == 0) {
          div(n / 10, succ(i));
        } else if (i > 2) {
          Printf.sprintf("%de%d", n, i);
        } else {
          string_of_int(vint);
        };
      div(vint, 0);
    } else {
      let s1 = Printf.sprintf("%.12g", v);
      if (v == float_of_string(s1)) {
        s1;
      } else {
        let s2 = Printf.sprintf("%.15g", v);
        if (v == float_of_string(s2)) {
          s2;
        } else {
          Printf.sprintf("%.18g", v);
        };
      };
    };
  };
