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
let aliases = Hashtbl.create 17

let rec resolve nm = try resolve (Hashtbl.find aliases nm) with Not_found -> nm

(****)

type kind = [ `Pure | `Mutable | `Mutator ]
type kind_arg = [`Shallow_const | `Object_literal | `Const | `Mutable]
type t = [
  | `Requires of Parse_info.t option * string list
  | `ForBackend of Parse_info.t option * string list
  | `Provides of Parse_info.t option * string * kind * kind_arg list option
  | `Version of Parse_info.t option * ((int -> int -> bool) * string) list
  | `Weakdef of Parse_info.t option
]

let kinds = Hashtbl.create 37
let kind_args_tbl = Hashtbl.create 37
let arities = Hashtbl.create 37


let kind nm = try Hashtbl.find kinds (resolve nm) with Not_found -> `Mutator

let kind_args nm = try Some (Hashtbl.find kind_args_tbl (resolve nm)) with Not_found -> None

let registered_arity nm = Hashtbl.find arities (resolve nm)

(* The arity registered explicitly - externs still have discoverable arity
   even if not registered, as indicated by their type *)
let has_registered_arity nm a =
  try Hashtbl.find arities (resolve nm) = a
  with Not_found -> false

let is_pure nm = kind nm <> `Mutator

(* Returns whether or not the primitive has been registered:
   Registering happens when loading files in js_of_ocaml.ml as well
   as when registering custom primitives that are special cased in
   generate.ml *)
let exists p = Hashtbl.mem kinds p

let externals = ref StringSet.empty

(* This merely adds the external name, but doesn't "register" it - if only
   add_external is called, the external won't show up as Primitive.exists. *)
let add_external name = externals := StringSet.add name !externals

let is_external name = StringSet.mem name !externals

let get_external () = !externals

let register p k kargs arity =
  add_external p;
  (match arity with Some a -> Hashtbl.add arities p a | _ -> ());
  (match kargs with Some k -> Hashtbl.add kind_args_tbl p k | _ -> ());
  Hashtbl.add kinds p k

let alias nm nm' =
  add_external nm';
  add_external nm;
  Hashtbl.add aliases nm nm'


let named_values = ref StringSet.empty

let need_named_value s = StringSet.mem s !named_values

let register_named_value s = named_values := StringSet.add s !named_values
