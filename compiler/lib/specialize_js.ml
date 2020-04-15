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
  (* TODO: Enable this for caml_js_raw_expr *)
  (* | Let (x, Prim (Extern "caml_js_raw_expr", y :: rest)) -> *)
  (*     (match the_string_of info y with *)
  (*     | Some s -> Let (x, Prim (Extern "caml_js_raw_expr", Pc (String s) :: rest)) *)
  (*     | _ -> i) *)
  (*     :: rem *)
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
      in
      (match the_option_of info a, a with
      | `Block, Pv a -> Let (x, Field (a, 0))
      | `CBlock a, _ -> Let (x, Constant a)
      | `CConst 0, _ -> Let (x, Constant Null)
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
let f_once debug_data_for_errors p =
  let rec loop addr l =
    match l with
    | [] -> []
    | i :: r -> (
      match i with
      (* Arguably this should only be done in f_once (the round that only
       * happens once) since the purpose of this is to expand arguments, and
       * there will never be a case where some other compiler stage might
       * create a new raw macro that should be expanded or re-expanded (unless
       * maybe if macros can expand other macros, when one gets inlined).
       *)
      | Let (x, Prim (Extern nm, args)) when Raw_macro.is nm ->
          let loc =
            match
              ( Parse_bytecode.Debug.find_loc debug_data_for_errors addr
              , Code.Var.get_loc x )
            with
            | Some pi, None | None, Some pi | Some _, Some pi -> Some pi
            | _ -> None
          in
          let be = Backend.Current.compiler_backend_flag () in
          let macro_data = Raw_macro.extract ~forBackend:be ?loc nm in
          let node_list =
            Raw_macro.evalContainers
              (Raw_macro.parseNodeList macro_data)
              (String.equal be)
          in
          let expanded_bindings, expandeds =
            Raw_macro.expandIntoMultipleArguments macro_data args node_list
          in
          let expand_binding_args expandeds ~rev_binding_calls ~extern_data =
            let rev_binding_calls_len = List.length rev_binding_calls in
            List.map expandeds ~f:(fun expanded_item ->
                match expanded_item with
                | Raw_macro.ExpandedRaw string ->
                    Raw_macro.raiseMalformedExtern
                      ("Contained raw text:" ^ string)
                      extern_data
                      macro_data
                | ExpandedOrigArg i -> Raw_macro.nth_error args i nm
                | ExpandedBinding i ->
                    let referenced_binding =
                      Raw_macro.nth_error
                        rev_binding_calls
                        (rev_binding_calls_len - i - 1)
                        nm
                    in
                    Pv (fst referenced_binding))
          in
          let expanded_extern_bindings =
            List.fold_left
              expanded_bindings
              ~init:[]
              ~f:(fun cur_rev (extern_data, binding_expandeds) ->
                let extern_tag, extern_name = extern_data in
                let args_to_extern =
                  expand_binding_args
                    binding_expandeds
                    ~rev_binding_calls:cur_rev
                    ~extern_data
                in
                let binding_var = Code.Var.fresh () in
                ( binding_var
                , Let (binding_var, Prim (Extern extern_name, args_to_extern)) )
                :: cur_rev)
          in
          let expanded_extern_bindings = List.rev expanded_extern_bindings in
          let _, expanded_txt, expanded_args =
            List.fold_left
              expandeds
              ~init:(0, "", [])
              ~f:(fun (cur_pos, cur_txt, cur_args) expanded ->
                match expanded with
                | Raw_macro.ExpandedRaw string -> cur_pos, cur_txt ^ string, cur_args
                | ExpandedOrigArg i ->
                    let prim_arg = Raw_macro.nth_error args i nm in
                    ( cur_pos + 1
                    , cur_txt ^ Raw_macro.renderPosition (cur_pos + 1)
                    , prim_arg :: cur_args )
                | ExpandedBinding i ->
                    let binding_var, _binding =
                      Raw_macro.nth_error expanded_extern_bindings i nm
                    in
                    ( cur_pos + 1
                    , cur_txt ^ Raw_macro.renderPosition (cur_pos + 1)
                    , Pv binding_var :: cur_args ))
          in
          (* Turn into special % primitive so that none of the inlining optimizations apply *)
          List.map ~f:snd expanded_extern_bindings
          @ Let
              ( x
              , Prim
                  ( Extern "%caml_js_expanded_raw_macro"
                  , Pc (String expanded_txt) :: List.rev expanded_args ) )
            :: loop addr r
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
