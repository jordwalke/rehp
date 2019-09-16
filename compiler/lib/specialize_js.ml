(* Js_of_ocaml compiler
 * http://www.ocsigen.org/js_of_ocaml/
 * Copyright (C) 2010 Jérôme Vouillon
 * Laboratoire PPS - CNRS Université Paris Diderot
 * Copyright (C) 2013 Hugo Heuzard
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
open Code
open Flow

let specialize_instr info i rem =
  match i with
  | Let (x, Prim (Extern "caml_format_int", [y; z])) ->
      (match the_string_of info y with
      (* Specializes calls to format_int when format string is "%d". Allows
       * dropping the dependency on formatting standard library for simple
       * cases. For certain optimizable cases, turns calls to extern
       * caml_format_int into calls to a fake "extern" created on the fly.*)
      | Some "%d" -> (
        match the_int info z with
        (* Specialization when the int is also known statically *)
        | Some i -> Let (x, Constant (String (Int32.to_string i)))
        (* If the int isn't known statically we can at least create a new
         * pseudo extern on the fly that represents "int formatting with the
         * simplest case of format string being %d" *)
        | None -> Let (x, Prim (Extern "%caml_format_int_special", [z])))
      | _ -> i)
      :: rem
  | Let (x, Prim (Extern "%caml_format_int_special", [z])) ->
      (match the_int info z with
      | Some i -> Let (x, Constant (String (Int32.to_string i)))
      | None -> i)
      :: rem
  | Let
      ( x
      , Prim
          ( Extern
              (("caml_js_var" | "caml_js_raw_expr" | "caml_js_expr" | "caml_pure_js_expr")
              as prim)
          , [y] ) ) ->
      (match the_string_of info y with
      | Some s -> Let (x, Prim (Extern prim, [Pc (String s)]))
      | _ -> i)
      :: rem
  | Let (x, Prim (Extern ("caml_register_named_value" as prim), [y; z])) ->
      (match the_string_of info y with
      | Some s when Primitive.need_named_value s ->
          Let (x, Prim (Extern prim, [Pc (String s); z]))
      | Some _ ->
          (* Format.eprintf "Do not register named value %S@." s; *)
          Let (x, Constant (Int 0l))
      | None -> i)
      :: rem
  | Let (x, Prim (Extern "caml_js_call", [f; o; a])) ->
      (match the_def_of info a with
      | Some (Block (_, a)) ->
          let a = Array.map a ~f:(fun x -> Pv x) in
          Let (x, Prim (Extern "%caml_js_opt_call", f :: o :: Array.to_list a))
      | _ -> i)
      :: rem
  | Let (x, Prim (Extern "caml_js_fun_call", [f; a])) ->
      (match the_def_of info a with
      | Some (Block (_, a)) ->
          let a = Array.map a ~f:(fun x -> Pv x) in
          Let (x, Prim (Extern "%caml_js_opt_fun_call", f :: Array.to_list a))
      | _ -> i)
      :: rem
  | Let (x, Prim (Extern "caml_js_fun_call0", [fn])) ->
      Let (x, Prim (Extern "%caml_js_opt_fun_call", [fn])) :: rem
  | Let (x, Prim (Extern "caml_js_fun_call1", [fn; a])) ->
      Let (x, Prim (Extern "%caml_js_opt_fun_call", [fn; a])) :: rem
  | Let (x, Prim (Extern "caml_js_fun_call2", [fn; a; b])) ->
      Let (x, Prim (Extern "%caml_js_opt_fun_call", [fn; a; b])) :: rem
  | Let (x, Prim (Extern "caml_js_fun_call3", [fn; a; b; c])) ->
      Let (x, Prim (Extern "%caml_js_opt_fun_call", [fn; a; b; c])) :: rem
  | Let (x, Prim (Extern "caml_js_fun_call4", [fn; a; b; c; d])) ->
      Let (x, Prim (Extern "%caml_js_opt_fun_call", [fn; a; b; c; d])) :: rem
  | Let (x, Prim (Extern "caml_js_meth_call", [o; m; a])) ->
      (match the_string_of info m with
      | Some m -> (
        match the_def_of info a with
        | Some (Block (_, a)) ->
            let a = Array.map a ~f:(fun x -> Pv x) in
            Let
              ( x
              , Prim
                  (Extern "%caml_js_opt_meth_call", o :: Pc (String m) :: Array.to_list a)
              )
        | _ -> i)
      | _ -> i)
      :: rem
  | Let (x, Prim (Extern "caml_js_meth_call0", [o; m])) ->
      (match the_string_of info m with
      | Some m -> Let (x, Prim (Extern "%caml_js_opt_meth_call", [o; Pc (String m)]))
      | _ -> i)
      :: rem
  | Let (x, Prim (Extern "caml_js_meth_call1", [o; m; a])) ->
      (match the_string_of info m with
      | Some m -> Let (x, Prim (Extern "%caml_js_opt_meth_call", [o; Pc (String m); a]))
      | _ -> i)
      :: rem
  | Let (x, Prim (Extern "caml_js_meth_call2", [o; m; a; b])) ->
      (match the_string_of info m with
      | Some m ->
          Let (x, Prim (Extern "%caml_js_opt_meth_call", [o; Pc (String m); a; b]))
      | _ -> i)
      :: rem
  | Let (x, Prim (Extern "caml_js_meth_call3", [o; m; a; b; c])) ->
      (match the_string_of info m with
      | Some m ->
          Let (x, Prim (Extern "%caml_js_opt_meth_call", [o; Pc (String m); a; b; c]))
      | _ -> i)
      :: rem
  | Let (x, Prim (Extern "caml_js_new", [c; a])) ->
      (match the_def_of info a with
      | Some (Block (_, a)) ->
          let a = Array.map a ~f:(fun x -> Pv x) in
          Let (x, Prim (Extern "%caml_js_opt_new", c :: Array.to_list a))
      | _ -> i)
      :: rem
  | Let (x, Prim (Extern "caml_js_object", [a])) ->
      (try
         let a =
           match the_def_of info a with
           | Some (Block (_, a)) -> a
           | _ -> raise Exit
         in
         let a =
           Array.map a ~f:(fun x ->
               match the_def_of info (Pv x) with
               | Some (Block (_, [|k; v|])) ->
                   let k =
                     match the_string_of info (Pv k) with
                     | Some s -> Pc (String s)
                     | _ -> raise Exit
                   in
                   [k; Pv v]
               | _ -> raise Exit)
         in
         Let (x, Prim (Extern "%caml_js_opt_object", List.flatten (Array.to_list a)))
       with Exit -> i)
      :: rem
  | Let (x, Prim (Extern (("caml_js_get" | "caml_js_property_get") as fn_name), [o; f]))
    ->
      (match the_string_of info f with
      | Some s -> Let (x, Prim (Extern fn_name, [o; Pc (String s)]))
      | _ -> i)
      :: rem
  | Let
      (x, Prim (Extern (("caml_js_set" | "caml_js_property_set") as fn_name), [o; f; v]))
    ->
      (match the_string_of info f with
      | Some s -> Let (x, Prim (Extern fn_name, [o; Pc (String s); v]))
      | _ -> i)
      :: rem
  | Let (x, Prim (Extern "caml_js_delete", [o; f])) ->
      (match the_string_of info f with
      | Some s -> Let (x, Prim (Extern "caml_js_delete", [o; Pc (String s)]))
      | _ -> i)
      :: rem
  | Let (x, Prim (Extern "caml_js_from_string", [y])) ->
      (match the_string_of info y with
      | Some s when String.is_ascii s -> Let (x, Constant (IString s))
      | _ -> i)
      :: rem
  | Let (x, Prim (Extern "%int_mul", [y; z])) ->
      (match the_int info y, the_int info z with
      | Some j, _ when Int32.abs j < 0x200000l ->
          Let (x, Prim (Extern "%direct_int_mul", [y; z]))
      | _, Some j when Int32.abs j < 0x200000l ->
          Let (x, Prim (Extern "%direct_int_mul", [y; z]))
      | _ -> i)
      :: rem
  | Let (x, Prim (Extern "%int_div", [y; z])) ->
      (match the_int info z with
      | Some j when j <> 0l -> Let (x, Prim (Extern "%direct_int_div", [y; z]))
      | _ -> i)
      :: rem
  | Let (x, Prim (Extern "%int_mod", [y; z])) ->
      (match the_int info z with
      | Some j when j <> 0l -> Let (x, Prim (Extern "%direct_int_mod", [y; z]))
      | _ -> i)
      :: rem
  | _ -> i :: rem

let rec specialize_instrs info checks l =
  match l with
  | [] -> []
  | i :: r -> (
    (* We make bound checking explicit. Then, we can remove duplicated
         bound checks. Also, it appears to be more efficient to inline
         the array access. The bound checking function returns the array,
         which allows to produce more compact code. *)
    match i with
    | Let (x, Prim (Extern "caml_array_get", [y; z]))
     |Let (x, Prim (Extern "caml_array_get_float", [y; z]))
     |Let (x, Prim (Extern "caml_array_get_addr", [y; z])) ->
        let idx =
          match the_int info z with
          | Some idx -> `Cst idx
          | None -> `Var z
        in
        if List.mem (y, idx) ~set:checks
        then
          Let (x, Prim (Extern "caml_array_unsafe_get", [y; z]))
          :: specialize_instrs info checks r
        else
          let y' = Code.Var.fresh () in
          Let (y', Prim (Extern "caml_check_bound", [y; z]))
          :: Let (x, Prim (Extern "caml_array_unsafe_get", [Pv y'; z]))
          :: specialize_instrs info ((y, idx) :: checks) r
    | Let (x, Prim (Extern "caml_array_set", [y; z; t]))
     |Let (x, Prim (Extern "caml_array_set_float", [y; z; t]))
     |Let (x, Prim (Extern "caml_array_set_addr", [y; z; t])) ->
        let idx =
          match the_int info z with
          | Some idx -> `Cst idx
          | None -> `Var z
        in
        if List.mem (y, idx) ~set:checks
        then
          Let (x, Prim (Extern "caml_array_unsafe_set", [y; z; t]))
          :: specialize_instrs info checks r
        else
          let y' = Code.Var.fresh () in
          Let (y', Prim (Extern "caml_check_bound", [y; z]))
          :: Let (x, Prim (Extern "caml_array_unsafe_set", [Pv y'; z; t]))
          :: specialize_instrs info ((y, idx) :: checks) r
    | _ -> specialize_instr info i (specialize_instrs info checks r))

let specialize_all_instrs info (pc, blocks, free_pc) =
  let blocks =
    Addr.Map.map
      (fun block -> {block with Code.body = specialize_instrs info [] block.body})
      blocks
  in
  pc, blocks, free_pc

(****)

let f info p = specialize_all_instrs info p

let f_once (pc, blocks, free_pc) =
  let rec loop l =
    match l with
    | [] -> []
    | i :: r -> (
      match i with
      | Let
          ( x
          , ( (Prim (Extern "caml_js_delete", [_; _]) as p)
            | (Prim
                 ( Extern
                     ( "caml_array_set" | "caml_array_unsafe_set"
                     | "caml_array_set_float" | "caml_array_set_addr"
                     | "caml_array_unsafe_set_float" | "caml_floatarray_unsafe_set"
                     | "caml_js_set" )
                 , [_; _; _] ) as p) ) ) ->
          let x' = Code.Var.fork x in
          Let (x, Constant (Int 0l)) :: Let (x', p) :: loop r
      | _ -> i :: loop r)
  in
  let blocks =
    Addr.Map.map (fun block -> {block with Code.body = loop block.body}) blocks
  in
  pc, blocks, free_pc
