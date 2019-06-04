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

(* Temporary switcher between two different JS printing implementations.
 * This is just so that upstream js tests will pass even though rehp has
 * an (improved) different js printer *)

module type Js_output_sig = sig
  val program :
    Pretty_print.t ->
      ?custom_header: (string * int * string) ->
      ?source_map:(string option * Source_map.t) ->
      Javascript.program ->
    unit
end
let jsPrinter =
  if Config.Flag.prettiestJs() then
    (module Js_output_format_like_upstream : Js_output_sig)
  else
    (module Js_output : Js_output_sig)

include (val jsPrinter)
