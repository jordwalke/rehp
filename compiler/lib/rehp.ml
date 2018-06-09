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


include Rehp_shared
open Rehp_shared

(* A.3 Expressions *)

type array_litteral = element_list

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

(* Probably need to distinguish between platform array (parsed from JS) and
   stdlib arrays. Currently they're one and the same. *)
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
  (* Instructions for accessing standard library arrays.  *)
  | EArrAccess of expression * expression
  | EArrLen of expression
  | EArr of array_litteral
  (* An ML fixed-size struct (record/variant) - when the compiler knows the
     layout of memory. *)
  | EStructAccess of expression * expression
  | EStruct of arguments
  (* Like Struct but for cases where you have a tag *)
  | ETag of expression * arguments
  (* Target specific object structure - no ML equivalent. Typically for
     interop, or when parsing platform stubs written in Php etc.*)
  | EDot of expression * identifier        (* An x->y operation *)
  | EAccess of expression * expression     (* An x[y] operation - type of x/y not specified *)
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
  | For_statement of  (expression option,variable_declaration list) either * expression option * expression option * (statement * location)
  | ForIn_statement of  (expression,variable_declaration) either * expression * (statement * location)
  | Continue_statement of Javascript.Label.t option
  | Break_statement of Javascript.Label.t option
  | Return_statement of expression option
  (* | With_statement of expression * statement *)
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

let compare_ident t1 t2 =
  match t1, t2 with
    | V v1, V v2 -> Code.Var.compare v1 v2
    | S {name=s1;var=v1}, S{name=s2;var=v2} -> begin
      match String.compare s1 s2 with
        | 0 -> begin match v1,v2 with
            | None,None -> 0
            | None, _ -> -1
            | _, None -> 1
            | Some v1, Some v2 -> Code.Var.compare v1 v2
        end
        | n -> n
    end
    | S _, V _ -> -1
    | V _, S _ -> 1


let string_of_number v =
  if v = infinity
  then "Infinity"
  else if v = neg_infinity
  then "-Infinity"
  else if v <> v
  then "NaN"
  (* [1/-0] = -inf seems to be the only way to detect -0 in JavaScript *)
  else if v = 0. && (1. /. v) = neg_infinity
  then "-0"
  else
    let vint = int_of_float v in
    (* compiler 1000 into 1e3 *)
    if float_of_int vint = v
    then
      let rec div n i =
        if n <> 0 && n mod 10 = 0
        then div (n/10) (succ i)
        else
        if i > 2
        then Printf.sprintf "%de%d" n i
        else string_of_int vint in
      div vint 0
    else
      let s1 = Printf.sprintf "%.12g" v in
      if v = float_of_string s1
      then s1
      else
        let s2 = Printf.sprintf "%.15g" v in
        if v = float_of_string s2
        then s2
        else  Printf.sprintf "%.18g" v

exception Not_an_ident
let is_ident =
  let l = Array.init 256 (fun i ->
    let c = Char.chr i in
    (* This needs to be customized to Php's conventions *)
    if (c >= 'a' && c <= 'z') || (c >= 'A' && c <= 'Z') || c = '_' || c = '$'
    then 1
    else if (c >= '0' && c <='9')
    then 2
    else 0
  ) in
  fun s ->
    not (Util.StringSet.mem s Reserved.keyword) &&
    try
      for i = 0 to String.length s - 1 do
        let code = l.(Char.code(s.[i])) in
        if i = 0
        then (if code <> 1 then raise Not_an_ident)
        else (if code <  1 then raise Not_an_ident)
      done;
      true
    with Not_an_ident -> false

module IdentSet = Set.Make(struct type t = ident let compare = compare_ident end)
module IdentMap = Map.Make(struct type t = ident let compare = compare_ident end)




let rec from_js_statement_list lst =
  List.map
    (fun (stmt, loc) -> (from_js_statement stmt, loc))
    lst

and from_js_variable_declaration = function
  | (ident, None) -> (ident, None)
  | (ident, Some (init_expr, init_loc)) ->
    (ident, Some (from_js_expression init_expr, init_loc))

and from_js_arguments args = List.map from_js_expression args

(* Should create a separate form for operators that only make sense when coming
   from parsed JS. Most of the unary operators for example. *)
and from_js_unop = function
  | Javascript.Not -> Not
  | Javascript.Neg -> Neg
  | Javascript.Pl -> Pl
  | Javascript.Typeof -> Typeof
  | Javascript.Void -> Void
  | Javascript.Delete -> Delete
  | Javascript.Bnot -> Bnot
  | Javascript.IncrA -> IncrA
  | Javascript.DecrA -> DecrA
  | Javascript.IncrB -> IncrB
  | Javascript.DecrB -> DecrB

and from_js_binop = function
  | Javascript.Eq -> Eq
  | Javascript.StarEq -> StarEq
  | Javascript.SlashEq -> SlashEq
  | Javascript.ModEq -> ModEq
  | Javascript.PlusEq -> PlusEq
  | Javascript.MinusEq -> MinusEq
  | Javascript.LslEq -> LslEq
  | Javascript.AsrEq -> AsrEq
  | Javascript.LsrEq -> LsrEq
  | Javascript.BandEq -> BandEq
  | Javascript.BxorEq -> BxorEq
  | Javascript.BorEq -> BorEq
  | Javascript.Or -> Or
  | Javascript.And -> And
  | Javascript.Bor -> Bor
  | Javascript.Bxor -> Bxor
  | Javascript.Band -> Band
  | Javascript.EqEq -> EqEq
  | Javascript.NotEq -> NotEq
  | Javascript.EqEqEq -> EqEqEq
  | Javascript.NotEqEq -> NotEqEq
  | Javascript.Lt -> Lt
  | Javascript.Le -> Le
  | Javascript.Gt -> Gt
  | Javascript.Ge -> Ge
  | Javascript.InstanceOf -> InstanceOf
  | Javascript.In -> In
  | Javascript.Lsl -> Lsl
  | Javascript.Lsr -> Lsr
  | Javascript.Asr -> Asr
  | Javascript.Plus -> Plus
  | Javascript.Minus -> Minus 
  | Javascript.Mul -> Mul
  | Javascript.Div -> Div
  | Javascript.Mod -> Mod

and from_js_expression_loc (e, loc) = (from_js_expression e, loc)

and from_js_expression = function
  | Javascript.ESeq (e1, e2) -> ESeq (from_js_expression e1, from_js_expression e2)
  | Javascript.ECond (e1, e2, e3) -> ECond (from_js_expression e1, from_js_expression e2, from_js_expression e3)
  | Javascript.EBin (binop, e1, e2) -> EBin (from_js_binop binop, from_js_expression e1, from_js_expression e2)
  | Javascript.EUn (unop, e) -> EUn (from_js_unop unop, from_js_expression e)
  | Javascript.ECall (e, args, loc) -> ECall (from_js_expression e, from_js_arguments args, loc)
  | Javascript.EVar ident -> EVar (ident)
  | Javascript.EFun (ident_opt, ident_lst, body, loc) ->
    EFun (ident_opt, ident_lst, from_js_source_elements_and_locs body, None, loc)
  | Javascript.EStr (x, y) -> EStr (x, y)
  | Javascript.EArr arr_literal -> EArr (List.map (Util.opt_map from_js_expression) arr_literal)
  | Javascript.EDot (e, ident) -> EDot (from_js_expression e, ident)
  | Javascript.EAccess (e1, e2) -> EAccess (from_js_expression e1, from_js_expression e2)
  | Javascript.ENew (e, optargs) -> ENew (from_js_expression e, Util.opt_map from_js_arguments optargs)
  | Javascript.EObj lst -> EObj (List.map (fun (nm, e) -> (nm, from_js_expression e)) lst)
  | Javascript.EBool b -> EBool b
  | Javascript.ENum flt -> ENum flt
  | Javascript.EQuote s -> EQuote s
  | Javascript.ERegexp (s, sopt) -> ERegexp (s, sopt)

and from_js_statement = function
  | Javascript.Block stms -> Block (from_js_statement_list stms)
  | Javascript.Variable_statement lst ->
    Variable_statement
    (List.map
      (fun (ident, initopt) -> (ident, Util.opt_map from_js_expression_loc initopt))
      lst)
  | Javascript.Empty_statement -> Empty_statement
  | Javascript.Expression_statement expr -> Expression_statement (from_js_expression expr)
  | Javascript.If_statement (expr, (ifstmt, ifloc), elsopt) ->
    If_statement (
      from_js_expression expr,
      (from_js_statement ifstmt, ifloc),
      match elsopt with
      | None -> None
      | Some (elstmt, elloc) ->  Some (from_js_statement elstmt, elloc)
    )
  | Javascript.Do_while_statement ((stmt, loc), e) ->
    Do_while_statement((from_js_statement stmt, loc), from_js_expression e)
  | Javascript.While_statement (e, (stmt, loc)) ->
    While_statement(from_js_expression e, (from_js_statement stmt, loc))
  | Javascript.For_statement (init, test, incr, (stmt, loc)) ->
    let init = match init with
    | Left(None) -> Left(None)
    | Left(Some e) -> Left(Some (from_js_expression e))
    | Right(vars) -> Right(List.map from_js_variable_declaration vars) in
    let test = match test with None -> None | Some(e) -> Some(from_js_expression e) in
    let incr = match incr with None -> None | Some(e) -> Some(from_js_expression e) in
    For_statement(init, test, incr, (from_js_statement stmt, loc))
  | Javascript.ForIn_statement (init, e, (stmt, loc)) ->
    let init = match init with
    | Left(e) -> Left(from_js_expression e)
    | Right(vd) -> Right(from_js_variable_declaration vd) in
    let e = from_js_expression e in
    let stmt = from_js_statement stmt in
    ForIn_statement (init, e, (stmt, loc))
  | Javascript.Continue_statement lbl -> Continue_statement lbl
  | Javascript.Break_statement lbl -> Break_statement lbl
  | Javascript.Return_statement eo -> Return_statement (Util.opt_map from_js_expression eo)
  (* | With_statement of expression * statement *)
  | Javascript.Labelled_statement (lbl, (stmt, loc)) ->
    Labelled_statement (lbl, (from_js_statement stmt, loc))
  | Javascript.Switch_statement(e, case_clause_list1, stmt_lst_opt, case_clause_list2) ->
    let e = from_js_expression e in
    let case_clause_lst1 = from_js_case_clause_list case_clause_list1 in
    let case_clause_lst2 = from_js_case_clause_list case_clause_list2 in
    let stmt_lst_opt = Util.opt_map from_js_statement_list stmt_lst_opt in
    Switch_statement(e, case_clause_lst1, stmt_lst_opt, case_clause_lst2)
  | Javascript.Throw_statement e -> Throw_statement (from_js_expression e)
  | Javascript.Try_statement (block, ident_block_opt, block_opt) ->
      let block = from_js_statement_list block in
      let ident_block_opt = match ident_block_opt with
      | None -> None
      | Some (ident, block) -> Some (ident, from_js_statement_list block)
      in
      let block_opt = Util.opt_map from_js_statement_list block_opt in
    Try_statement (block, ident_block_opt, block_opt)
  | Javascript.Debugger_statement -> Debugger_statement


and from_js_case_clause_list lst =
  List.map
    (fun (e, stmts) -> (from_js_expression e, from_js_statement_list stmts))
    lst
and from_js_source_element = function
  | Javascript.Statement stmt -> Statement (from_js_statement stmt)
  | Javascript.Function_declaration
      (ident, formal_parameter_list, function_body, location) ->
    Function_declaration(
      ident,
      formal_parameter_list,
      from_js_source_elements_and_locs function_body,
      None,
      location
    )

and from_js_source_elements_and_locs lst =
  List.map
    (fun (src, loc) -> ((from_js_source_element src), loc))
    lst

let from_javascript = from_js_source_elements_and_locs
let from_javascript_expression = from_js_expression
