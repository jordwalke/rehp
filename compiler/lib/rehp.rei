/* Js_of_ocaml compiler
 * http://www.ocsigen.org/js_of_ocaml/
 * Copyright (C) 2010 Jérôme Vouillon
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

type location = Rehp_shared.location = | Pi(Parse_info.t) | N | U;

type identifier = string;
type ident_string =
  Rehp_shared.ident_string = {
    name: identifier,
    var: option(Code.Var.t),
  };
type ident =
  Rehp_shared.ident = | S(Rehp_shared.ident_string) | V(Code.Var.t)
and array_litteral = element_list
and element_list = list(option(expression))
and binop =
  | Eq
  | StarEq
  | SlashEq
  | ModEq
  | PlusEq
  | MinusEq
  | LslEq
  | AsrEq
  | LsrEq
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
  | InstanceOf
  | In
  | Lsl
  | Lsr
  | Asr
  | FloatPlus
  | IntPlus
  | Plus
  | Minus
  | Mul
  | Div
  | Mod
and unop =
  | IsIntNumber
  | Not
  | Neg
  | Pl
  | Typeof
  | Void
  | Delete
  | Bnot
  | IncrA
  | DecrA
  | IncrB
  | DecrB
and arguments = list(expression)
and property_name_and_value_list =
  list((Rehp_shared.property_name, expression))
and expression =
  | ESeq(expression, expression)
  | ECond(expression, expression, expression)
  | EBin(binop, expression, expression)
  | EUn(unop, expression)
  | ECall(expression, arguments, location)
  | EVar(ident)
  | EFun(function_expression)
  | EArityTest(expression)
  | EStr(string, [ | `Bytes | `Utf8])
  /* A string can either be composed of a sequence of bytes, or be
     UTF-8 encoded. In the second case, the string may contain
     escape sequences. */
  | EArrAccess(expression, expression)
  | EArrLen(expression)
  | EArr(array_litteral)
  | EStructAccess(expression, expression)
  | EStruct(arguments)
  | ETag(expression, arguments)
  | EDot(expression, identifier)
  | EAccess(expression, expression)
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
  | Variable_statement(list(variable_declaration))
  | Empty_statement
  | Expression_statement(expression)
  | If_statement(
      expression,
      (statement, location),
      option((statement, location)),
    )
  | Do_while_statement((statement, location), expression)
  | While_statement(expression, (statement, location))
  | For_statement(
      either(option(expression), list(variable_declaration)),
      option(expression),
      option(expression),
      (statement, location),
    )
  | ForIn_statement(
      either(expression, variable_declaration),
      expression,
      (statement, location),
    )
  | Continue_statement(option(Javascript.Label.t))
  | Break_statement(option(Javascript.Label.t))
  | Return_statement(option(expression))
  /*
     | With_statement
   */
  | Labelled_statement(Javascript.Label.t, (statement, location))
  | Switch_statement(
      expression,
      list(case_clause),
      option(statement_list),
      list(case_clause),
    )
  | Throw_statement(expression)
  | Try_statement(block, option((ident, block)), option(block))
  | Debugger_statement
and either('left, 'right) =
  | Left('left)
  | Right('right)
and block = statement_list
and statement_list = list((statement, location))
and variable_declaration = (ident, option(initialiser))
and case_clause = (expression, statement_list)
and initialiser = (expression, location)
/****/
/* A.5 Functions and programs */
and var_info = option((Util.StringMap.t(int), Code.VarMap.t(int)))
and function_declaration = (
  ident,
  formal_parameter_list,
  function_body,
  var_info,
  var_info,
  location,
)
and function_expression = (
  option(ident),
  formal_parameter_list,
  function_body,
  var_info,
  var_info,
  location,
)
and formal_parameter_list = list(ident)
and function_body = source_elements
and program = source_elements
and source_elements = list((source_element, location))
and source_element =
  | Statement(statement)
  | Function_declaration(function_declaration);

let compare_ident: (ident, ident) => int;
let string_of_number: float => string;
let is_ident: string => bool;
module IdentSet: Set.S with type elt = ident;
module IdentMap: Map.S with type key = ident;

let from_javascript: Javascript.source_elements => source_elements;

let from_javascript_expression: Javascript.expression => expression;
