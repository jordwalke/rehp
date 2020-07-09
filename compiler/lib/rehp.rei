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


type array_literal = element_list
and element_list = list(option(expression))
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
  | InstanceOf
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
  | Not
  | Neg
  | Typeof
  | IsInt
  | ToInt
  | IntToString
  | Void
  | Delete
  | Bnot
  | IncrA
  | DecrA
  | IncrB
  | DecrB
and arguments = list(expression)
and property_name_and_value_list = list((Id.property_name, expression))
and raw_segment =
  | RawText(string)
  | RawSubstitution(expression)
and expression =
  | ERaw(list(raw_segment))
  | ESeq(expression, expression)
  | ECond(expression, expression, expression)
  | EBin(binop, expression, expression)
  | EUn(unop, expression)
  | ECall(expression, arguments, Loc.t)
  | ECopy(expression, Loc.t)
  | EVar(Id.t)
  | EFun(function_expression)
  | EArityTest(expression)
  | EStr(string, [ | `Bytes | `Utf8])
  /* Max index of an allocated structure (Vector/Record) */
  | EVectlength(expression)
  /* A string can either be composed of a sequence of bytes, or be
     UTF-8 encoded. In the second case, the string may contain
     escape sequences. */
  | EArrAccess(expression, expression)
  | EArrLen(expression)
  | EArr(array_literal)
  | EStructAccess(expression, int)
  | EStruct(arguments)
  | ETag(int, arguments)
  | EDot(expression, Id.identifier)
  | EAccess(expression, expression)
  | ENew(expression, option(arguments))
  | EObj(property_name_and_value_list)
  | EBool(bool)
  | EFloat(float)
  | EInt(int)
  | EQuote(string)
  | ERegexp(string, option(string))
  | ECustomRequire(string)
  | ECustomRegister(expression)
  | ERequire(string)
  | ERuntime
/****/
/* A.4 Statements */
and statement =
  | Block(block)
  /* Provides, requires, content */
  | Variable_statement(list(variable_declaration))
  | Empty_statement
  | Expression_statement(expression)
  | If_statement(
      expression,
      (statement, Loc.t),
      option((statement, Loc.t)),
    )
  | Loop_statement(statement, Loc.t)
  | Continue_statement(option(Javascript.Label.t), option(int))
  | Break_statement(option(Javascript.Label.t))
  | Return_statement(option(expression))
  /*
     | With_statement
   */
  | Labelled_statement(Javascript.Label.t, (statement, Loc.t))
  | Switch_statement(
      expression,
      list(case_clause),
      statement_list,
    )
  | Throw_statement(expression)
  | Try_statement(block, (Id.t, block))
  | Debugger_statement
and block = statement_list
and statement_list = list((statement, Loc.t))
and variable_declaration = (Id.t, option(initialiser))
and case_clause = (expression, statement_list)
and initialiser = (expression, Loc.t)
/****/
/* A.5 Functions and programs */
and var_info = option((Stdlib.StringMap.t(int), Code.Var.Map.t(int)))
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
