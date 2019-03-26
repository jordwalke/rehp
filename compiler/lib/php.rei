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

/* A.3 Expressions */

open Stdlib;

type var_info = (StringMap.t(int), Code.Var.Map.t(int));
type array_litteral = element_list
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
  | Asr
  | Plus
  | FloatPlus
  | IntPlus
  | StrPlus
  | Minus
  | Mul
  | Div
  | Mod
and unop =
  | ToInt
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
and property_name_and_value_list = list((Id.property_name, expression))
and expression =
  | ERaw(string)
  | ECond(expression, expression, expression)
  | EBin(binop, expression, expression)
  | EUn(unop, expression)
  | ECall(expression, arguments, Loc.t)
  | EAccess(expression, expression)
  | EDot(expression, Id.identifier)
  | ENew(expression, option(arguments))
  | EVar(Id.t)
  /*
   * Hack lambdas. Do not require printing their "used" variables, but may
   * optionally print them in comments for easy debugging of lexical scopes.
   */
  | ELam(function_expression)
  | EFun(function_expression)
  | EStr(string, [ | `Bytes | `Utf8])
  /* A string can either be composed of a sequence of bytes, or be
     UTF-8 encoded. In the second case, the string may contain
     escape sequences. */
  | EArr(array_litteral)
  | EBool(bool)
  | ENum(float)
  | EObj(property_name_and_value_list)
  | EQuote(string)
  | ERegexp(string, option(string))
  | ENULL
  /*
   * TODO: Probably delete these:
   */
  | EStructAccess(expression, expression)
  | EStruct(arguments)
  /* Instructions for accessing standard library arrays.  */
  | EArrAccess(expression, expression)
  | EArrLen(expression)
  /* Like Struct but for cases where you have a tag */
  | ETag(expression, arguments)
/****/
/* A.4 Statements */
and statement =
  | Raw_statement(string)
  | Block(block)
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
      Stdlib.either(option(expression), list(variable_declaration)),
      option(expression),
      option(expression),
      (statement, Loc.t),
    )
  | ForIn_statement(
      Stdlib.either(expression, variable_declaration),
      expression,
      (statement, Loc.t),
    )
  | Continue_statement(option(Javascript.Label.t))
  | Break_statement(option(Javascript.Label.t))
  | Return_statement(option(expression))
  /*
     | With_statement
   */
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
  | Global_statement(Id.t)
and block = statement_list
and statement_list = list((statement, Loc.t))
and variable_declaration = (Id.t, option(initialiser))
and case_clause = (expression, statement_list)
and initialiser = (expression, Loc.t)
/****/
/* A.5 Functions and programs */
and function_declaration = (
  Id.t,
  formal_parameter_list,
  function_body,
  /* Global use */
  formal_parameter_list,
  /* Lexical use */
  formal_parameter_list,
  Loc.t,
)
and function_expression = (
  option(Id.t),
  formal_parameter_list,
  function_body,
  /* Global use */
  formal_parameter_list,
  /* Lexical use */
  formal_parameter_list,
  Loc.t,
)
and formal_parameter_list = list(Id.t)
and function_body = source_elements
and program = source_elements
and source_elements = list((source_element, Loc.t))
and source_element =
  | Statement(statement)
  | Function_declaration(function_declaration);
