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

open Stdlib
module Debug : sig
  type data
  val create : unit -> data
  val find_loc : data -> ?after:bool -> int -> Parse_info.t option
  val is_empty : data -> bool
  val paths    : data -> units:StringSet.t -> StringSet.t
end

type parsed_code = (Code.program * StringSet.t * Debug.data)

type parsed_compilation_unit =
  (* Name of the compilation unit. *)
  string *
  (* Ordered list of dependency compilation units *)
  Ident.t list *
  parsed_code

type parse_result =
  | Parsed_library of parsed_compilation_unit list
  | Parsed_module of parsed_compilation_unit
  | Parsed_standalone of
    (* Executable name (or equivalent) *)
    string *
    parsed_code

val from_channel :
  ?includes: string list ->
  ?toplevel:bool -> ?expunge:(string -> [`Keep | `Skip]) ->
  ?dynlink:bool -> ?debug:[`Full | `Names | `No] -> in_channel ->
  parse_result

val from_string : string array -> string -> Code.program * Debug.data

val predefined_exceptions : unit -> Code.program
