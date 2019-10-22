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

type assign_op =
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
  | BorEq;
type bin_op =
  | Or
  | And
  | Bor
  | Bxor
  | Band
  | EqEq
  | NotEq
  | Is
  | IsNot
  | Lt
  | Le
  | Gt
  | Ge
  | Lsl
  | Asr
  | Plus
  | Minus
  | Mul
  | Div
  | Mod
and un_op =
  | ToInt
  | Not
  | Neg
  | Pl
  | Bnot
and expression =
  | ERaw(string)
  /* e2 if e1 else e3 */
  | ECond(expression, expression, expression)
  | EBin(bin_op, expression, expression)
  | EUn(un_op, expression)
  | ECall(expression, element_list, Loc.t)
  | EAccess(expression, expression)
  | ENew(expression, element_list)
  | EVar(Id.t)
  | EStr(string, [ | `Bytes | `Utf8])
  | EArr(element_list)
  | EBool(bool)
  | ENum(float)
  | EInt(int)
  | EDict(property_name_and_value_list)
  | ERegexp(string, option(string))
  | ENULL
  | EArrLen(expression)
and statement =
  | Raw_statement(string)
  | Empty_statement
  | Function_declaration(Id.t, parameter_list, statement_list)
  | Statement_list(statement_list)
  | Assignment_statement(assign_op, expression, expression)
  | Expression_statement(expression)
  | If_statement(expression, statement_list, option(statement_list))
  | WhileTrue_statement(statement_list)
  /* for (i = 0; i < 10; i += 2) -> for i in range(0, 10, 2): */
  | For_statement(Id.t, int, int, int, statement_list)
  | Continue_statement
  | Break_statement
  | Return_statement(option(expression))
  | Throw_statement(expression)
  | Try_statement(
      statement_list,
      option((Id.t, statement_list)),
      option(statement_list),
    )
and element_list = list(expression)
and property_name_and_value_list = list((Id.property_name, expression))
and parameter_list = list(Id.t)
and statement_list = list((statement, Loc.t))
and program = statement_list;
