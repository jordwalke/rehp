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

(* TODO: I think that the expanded bindings themselves need to get passed to
 * specialize *)
open Stdlib
open Code
open Flow

let loc_from_debug_data_for_errors debug_data_for_errors addr x =
  match
    ( Parse_bytecode.Debug.find_loc debug_data_for_errors addr
    , Code.Var.get_loc x )
  with
  | Some pi, None | None, Some pi | Some _, Some pi -> Some pi
  | _ -> None

let the_option_of info x =
  match x with
  | Pv x ->
      get_approx
        info
        (fun x ->
          match info.info_defs.(Var.idx x) with
          | Expr (Constant (Int i)) -> `CConst (Int32.to_int i)
          | Expr (Block (0, _, _)) ->
              if info.info_possibly_mutable.(Var.idx x) then `Unknown else `Block
          | Expr (Constant (Tuple (0, [| a |], _))) -> `CBlock a
          | _ -> `Unknown)
        `Unknown
        (fun u v ->
          match u, v with
          | `Block, `Block -> u
          | `CBlock a, `CBlock b -> if Poly.equal a b then u else `Unknown
          | `CConst i, `CConst j when i = j -> u
          | `Unknown, _
          | `Block, (`Unknown | `CBlock _ | `CConst _)
          | `CBlock _, (`Unknown | `Block | `CConst _)
          | `CConst _, (`Unknown | `Block | `CBlock _ | `CConst _) ->
              `Unknown)
        x
  | Pc (Int i) -> `CConst (Int32.to_int i)
  | Pc (Tuple (0, [| a |], _)) -> `CBlock a
  | _ -> `Unknown

(* Could add Pc (IString (Var.to_string v)); to get the string name of
 * the identifier, but the names aren't registered correctly at this
 * point in the compiler. TODO: Implement that without using new
 * orig_string_name_debug function.
 *)
(* A Pc of -1 indicate the name is not readable *)
let readable_name v =
  match Var.orig_string_name_debug v with
  | None -> Pc (Int (Int32.of_int (-1)))
  | Some s -> Pc (IString s)

let readable_name_str v =
  match Var.orig_string_name_debug v with
  | None -> ""
  | Some s -> s

let warn fmt = Format.ksprintf (fun s -> if not !quiet then Format.eprintf "%s%!" s) fmt

(* This should be kept in sync with Specialize.function_cardinality. It is a
 * mirror of that logic for determining arity, but computes a debug-worthy set
 * of suitable argument names.  The exact names should not be relied upon
 * except for improving readability. *)
let rec function_arg_names info x acc =
  get_approx
    info
    (fun x ->
      match info.info_defs.(Var.idx x) with
      | Expr (Closure (l, _)) ->
          Some (List.map ~f:(fun v -> Var.orig_string_name_debug v) l)
      (* If this is an already inlined extern closure wrapping primitive,
       * return that primitive's arity *)
      | Expr (Prim (Extern "%closure", [Pc (IString prim)])) -> (
        try Some (List.init (Primitive.registered_arity prim) (fun i -> None))
        with Not_found -> None)
      | Expr (Apply (f, l, _)) -> (
          if List.mem f ~set:acc
          then None
          else
            match function_arg_names info f (f :: acc) with
            | Some names ->
                let llen = List.length l in
                let diff = List.length names - llen in
                if diff > 0
                then (
                  let _taken, rest = List.take llen names in
                  if diff <> List.length rest
                  then print_string "diff length not same as rest length";
                  Some rest)
                else None
            | None -> None)
      | _ -> None)
    None
    (fun u v ->
      match u, v with
      | Some n, Some m when List.length n == List.length m -> v
      | _ -> None)
    x

let the_block_of info x =
  match the_def_of info x with
  | Some (Block (_, itms, _)) -> Some itms
  | Some _ | None -> None

(* TODO: There's a better implementation of this in specialize.ml *)
let the_arity_of info x =
  match Specialize.function_cardinality info x [] with
  | None -> 0
  | Some a -> a

let arity_arg i = Pc (Int (Int32.of_int i))

let argument_names_of info x =
  match function_arg_names info x [] with
  | None -> []
  | Some l ->
      List.map l ~f:(function
          | None -> Pc (Int (Int32.of_int (-1)))
          | Some s -> Pc (IString s))

let specialize_instr addr info i rem =
  match i with
  | Let (x, Prim (Extern "caml_register_global_module", [ind; modul; name])) ->
      (let the_metadata_of info x =
         match the_block_of info x with
         | Some blk -> Some blk
         | _ -> None
       in
       match the_metadata_of info modul with
       | None -> i
       | Some block_items ->
           let f v =
             let arity = the_arity_of info v in
             let arg_names = argument_names_of info v in
             (* Original name of identifier in scope *)
             (* Identifier in scope *)
             (* Not a great idea to include the identifier reference
              * itself as it will cause there to not be inlinine of
              * those constant functions. Inlining them is good, and we
              * can still recover their string original name as we do in
              * argument_names_of *)
             (* Pv v; *)
             (* Arity if function *)
             readable_name v
             :: arity_arg arity
             ::
             (if arity <> List.length arg_names
             then (
               (* Should warn in this case - but at least have a fallback *)
               warn
                 "Please report this issue to rehp(warn): Function arity != match \
                  length of argument names for %s"
                 (readable_name_str v);
               List.init arity (fun i -> Pc (Int (Int32.of_int (-1)))))
             else arg_names)
           in
           let prim_block_items =
             List.map (Array.to_list block_items) ~f |> List.concat
           in
           let md_call =
             Prim
               ( Extern "%caml_register_global_module_metadata"
               , ind :: modul :: name :: prim_block_items )
           in
           (* Shouldn't we need to update the defs for all of these? *)
           (* Flow.update_def info x md_call; *)
           Let (x, md_call))
      :: rem
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
  (* Finds local string references for raw expressions *)
  | Let
      ( x
      , Prim
          ( Extern
              (("caml_js_raw_expr" | "caml_js_var" | "caml_js_expr" | "caml_pure_js_expr")
              as prim)
          , [y] ) ) ->
      (match the_string_of info y with
      | Some s -> Let (x, Prim (Extern prim, [Pc (String s)]))
      | _ -> i)
      :: rem
  | Let (x, Prim (Extern "caml_js_raw_expr", y :: rest)) ->
      (match the_string_of info y with
      | Some s -> Let (x, Prim (Extern "%caml_js_opt_raw_expr", Pc (String s) :: rest))
      | _ -> i)
      :: rem
  (* Avoid registering named values if none of the stubs ever try to consume
     it. Named values are ways to expose named data to C code, and linked
     stubs play the role of the C code. This optimization was disabled in
     linker.ml anyways, but keeping it here *)
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
      | Some (Block (_, a, _)) ->
          let a = Array.map a ~f:(fun x -> Pv x) in
          Let (x, Prim (Extern "%caml_js_opt_call", f :: o :: Array.to_list a))
      | _ -> i)
      :: rem
  | Let (x, Prim (Extern "caml_js_nullable", [ a ])) ->
      (match the_option_of info a, a with
      | `Block, Pv a -> Let (x, Field (a, 0))
      | `CBlock a, _ -> Let (x, Constant a)
      | `CConst 0, _ -> Let (x, Constant Null)
      | `Block, Pc _ | `CConst _, _ | `Unknown, _ -> i)
      :: rem
  | Let (x, Prim (Extern "caml_js_is_none", [ a ])) ->
      (match the_option_of info a, a with
      | `Block, Pv a -> Let (x, Constant (Int 0l))
      | `CBlock a, _ -> Let (x, Constant (Int 0l))
      | `CConst 0, _ -> Let (x, Constant (Int 0l))
      | `Block, Pc _ | `CConst _, _ | `Unknown, _ -> i)
      :: rem
  | Let (x, Prim (Extern "caml_js_is_some", [ a ])) ->
      (match the_option_of info a, a with
      | `Block, Pv a -> Let (x, Constant (Int 1l))
      | `CBlock a, _ -> Let (x, Constant (Int 1l))
      | `CConst 0, _ -> Let (x, Constant (Int 0l))
      | `Block, Pc _ | `CConst _, _ | `Unknown, _ -> i)
      :: rem
  | Let (x, Prim (Extern "caml_js_fun_call", [f; a])) ->
      (match the_def_of info a with
      | Some (Block (_, a, _)) ->
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
        | Some (Block (_, a, _)) ->
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
      | Some (Block (_, a, _)) ->
          let a = Array.map a ~f:(fun x -> Pv x) in
          Let (x, Prim (Extern "%caml_js_opt_new", c :: Array.to_list a))
      | _ -> i)
      :: rem
  | Let (x, Prim (Extern "caml_js_object_args", args)) ->
      let rec expand_pairs ?(cur=[]) ~f lst = match lst with
      | [] -> List.rev cur
      | [hd] -> raise Exit
      | hd :: tl :: rest ->
          let k, v = f hd tl in
          expand_pairs ~cur:(v :: k :: cur) ~f rest
      in
      (try
         let a =
           expand_pairs args ~f:(fun k v ->
               let k =
                 match the_string_of info k with
                 | Some s -> Pc (String s)
                 | _ -> raise Exit
               in
               (k, v))
         in
         Let (x, Prim (Extern "%caml_js_opt_object", a))
       with Exit -> i)
      :: rem
  | Let (x, Prim (Extern "caml_js_object", [a])) ->
      (try
         let a =
           match the_def_of info a with
           | Some (Block (_, a, _)) -> a
           | _ -> raise Exit
         in
         let a =
           Array.map a ~f:(fun x ->
               match the_def_of info (Pv x) with
               | Some (Block (_, [|k; v|], _)) ->
                   let k =
                     match the_string_of info (Pv k) with
                     | Some s -> Pc (String s)
                     | _ -> raise Exit
                   in
                   [k; Pv v]
               | _ ->
                raise Exit)
         in
         Let (x, Prim (Extern "%caml_js_opt_object", List.flatten (Array.to_list a)))
       with Exit -> i)
      :: rem
  | Let (x, Prim (Extern "caml_js_make_block", [t; a])) ->
      (match the_block_of info a, the_int info t with
      | Some a, Some t ->
          Let (x, Block (Int32.to_int t, a, NotArray))
      | _ -> i)
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

let rec specialize_instrs addr info checks l =
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
          :: specialize_instrs addr info checks r
        else
          let y' = Code.Var.fresh () in
          Let (y', Prim (Extern "caml_check_bound", [y; z]))
          :: Let (x, Prim (Extern "caml_array_unsafe_get", [Pv y'; z]))
          :: specialize_instrs addr info ((y, idx) :: checks) r
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
          :: specialize_instrs addr info checks r
        else
          let y' = Code.Var.fresh () in
          Let (y', Prim (Extern "caml_check_bound", [y; z]))
          :: Let (x, Prim (Extern "caml_array_unsafe_set", [Pv y'; z; t]))
          :: specialize_instrs addr info ((y, idx) :: checks) r
    | _ -> specialize_instr addr info i (specialize_instrs addr info checks r))

let specialize_all_instrs info p =
  let blocks =
    Addr.Map.mapi
      (fun addr block ->
        {block with Code.body = specialize_instrs addr info [] block.body})
      p.blocks
  in
  { p with blocks }

(****)

(* Used purely to extract useful locations for error messages *)
(* let source_location_for_error debug ?after pc = *)
(*   match Parse_bytecode.Debug.find_loc debug ?after pc with *)

let f info p = specialize_all_instrs info p

(* This is called from the driver before any Flow information is computed. *)
let f_once ?file ?project_root debug_data_for_errors p =
  let rec loop addr l =
    match l with
    | [] -> []
    | i :: r -> (
      match i with
      (* Perform one round of expansion because doing so in f_once doesn't
       * conflict with identifier tables etc. So we sneak in one more
       * opportunity to inline/evaluate correctly, while also being able to
       * detect problems with the macro text early while we have the debug
       * data. Also, we have the file output name at this stage, so it is used
       * to expand macros that require relative path normalization in normalize. *)
      | Let (x, Prim (Extern nm, args)) when Raw_macro.isUnexpanded nm ->
          let loc = loc_from_debug_data_for_errors debug_data_for_errors addr x in
          let be = Backend.Current.compiler_backend_flag () in
          let macro_data = Raw_macro.extractOriginalExtern ~forBackend:be ?loc nm in
          (* Does not generate new intermediate bindings, so Flow does not need to rerun before
           * rerunning expandPrimBindingsAndArgs *)
          let node_list = Raw_macro.parseNodeList macro_data in
          let node_list =
            Raw_macro.normalize ?file ?projectRoot:project_root macro_data node_list ~forBackend:be in
          let (new_bindings, next_macro_text, next_macro_args) =
            Raw_macro.Eval.expandMacros x macro_data node_list args in
          new_bindings @
          (Let
            (x,
             Prim
              ( Extern "%caml_js_expanded_raw_macro",
                Code.Pc (Code.String next_macro_text) :: next_macro_args))
          ::
          loop addr r)
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
          Let (x, Constant (Int 0l)) :: Let (x', p) :: loop addr r
      | _ -> i :: loop addr r)
  in
  let blocks =
    Addr.Map.mapi
      (fun addr block -> {block with Code.body = loop addr block.body})
      p.blocks
  in
  { p with blocks }
  
