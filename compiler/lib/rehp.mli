(* Js_of_ocaml compiler
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
 *)

type location = Rehp_shared.location  =
  | Pi of Parse_info.t
  | N
  | U

type identifier = string
type ident_string = Rehp_shared.ident_string = {
  name : identifier;
  var : Code.Var.t option }
type ident = Rehp_shared.ident =
  | S of Rehp_shared.ident_string
  | V of Code.Var.t

and array_litteral = element_list

and element_list = expression option list

and binop =
    Eq | StarEq | SlashEq | ModEq | PlusEq | MinusEq
  | LslEq | AsrEq | LsrEq | BandEq | BxorEq | BorEq
  | Or | And | Bor | Bxor | Band
  | EqEq | NotEq | EqEqEq | NotEqEq
  | Lt | Le | Gt | Ge | InstanceOf | In
  | Lsl | Lsr | Asr
  | FloatPlus | IntPlus | Plus | Minus 
  | Mul | Div | Mod

and unop = Not | Neg | Pl | Typeof | Void | Delete | Bnot | IncrA | DecrA | IncrB | DecrB

and arguments = expression list

and property_name_and_value_list = (Rehp_shared.property_name * expression) list

and expression =
    ESeq of expression * expression
  | ECond of expression * expression * expression
  | EBin of binop * expression * expression
  | EUn of unop * expression
  | ECall of expression * arguments * location
  | EVar of ident
  | EFun of function_expression
  | EArityTest of expression
  | EStr of string * [`Bytes | `Utf8]
    (* A string can either be composed of a sequence of bytes, or be
       UTF-8 encoded. In the second case, the string may contain
       escape sequences. *)
  | EArrAccess of expression * expression
  | EArrLen of expression
  | EArr of array_litteral
  | EStructAccess of expression * expression
  | EStruct of arguments
  | ETag of expression * arguments
  | EDot of expression * identifier
  | EAccess of expression * expression
  | ENew of expression * arguments option
  | EObj of property_name_and_value_list
  | EBool of bool
  | ENum of float
  | EQuote of string
  | ERegexp of string * string option

(****)

(* A.4 Statements *)

and statement =
    Block of block
  | Variable_statement of variable_declaration list
  | Empty_statement
  | Expression_statement of expression
  | If_statement of expression * (statement * location) * (statement * location) option
  | Do_while_statement of (statement * location) * expression
  | While_statement of expression * (statement * location)
  | For_statement of (expression option,variable_declaration list) either * expression option * expression option * (statement * location)
  | ForIn_statement of  (expression,variable_declaration) either * expression * (statement * location)
  | Continue_statement of Javascript.Label.t option
  | Break_statement of Javascript.Label.t option
  | Return_statement of expression option
(*
  | With_statement
*)
  | Labelled_statement of Javascript.Label.t * (statement * location)
  | Switch_statement of
      expression * case_clause list * statement_list option * case_clause list
  | Throw_statement of expression
  | Try_statement of block * (ident * block) option * block option

  | Debugger_statement

and ('left,'right) either =
  | Left of 'left
  | Right of 'right


and block = statement_list

and statement_list = (statement * location) list

and variable_declaration = ident * initialiser option

and case_clause = expression * statement_list

and initialiser = expression * location

(****)

(* A.5 Functions and programs *)

and free_var_info = (int Util.StringMap.t * int Code.VarMap.t) option

and function_declaration =
  ident * formal_parameter_list * function_body * free_var_info * location

and function_expression =
  ident option * formal_parameter_list * function_body * free_var_info * location

and formal_parameter_list = ident list

and function_body = source_elements

and program = source_elements

and source_elements = (source_element * location) list

and source_element =
    Statement of statement
  | Function_declaration of function_declaration

val compare_ident : ident -> ident -> int
val string_of_number : float -> string
val is_ident : string -> bool
module IdentSet : Set.S with type elt = ident
module IdentMap : Map.S with type key = ident

val from_javascript : Javascript.source_elements -> source_elements

val from_javascript_expression : Javascript.expression -> expression
