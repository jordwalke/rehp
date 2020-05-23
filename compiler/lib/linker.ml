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

type fragment =
  { provides :
      (Parse_info.t option * string * Primitive.kind * Primitive.kind_arg list option)
      option
  ; requires : string list
  ; version_constraint : ((int -> int -> bool) * string) list list
  ; weakdef : bool
  ; backends : string list
  ; code : Javascript.program
  }

let loc pi =
  match pi with
  | Some { Parse_info.src = Some src; line; _ }
  | Some { Parse_info.name = Some src; line; _ } ->
      Printf.sprintf "%s:%d" src line
  | None | Some _ -> "unknown location"

let parse_annot loc s =
  let buf = Lexing.from_string s in
  try
    match Annot_parser.annot Annot_lexer.initial buf with
    | `Requires (_, l) -> Some (`Requires (Some loc, l))
    | `ForBackend (_, l) -> Some (`ForBackend (Some loc, l))
    | `Provides (_, n, k, ka) -> Some (`Provides (Some loc, n, k, ka))
    | `Version (_, l) -> Some (`Version (Some loc, l))
    | `Weakdef _ -> Some (`Weakdef (Some loc))
  with
  | Not_found -> None
  | _exc ->
      (* Format.eprintf "Not found for %s : %s @." (Printexc.to_string exc) s; *)
      None

let error s = Format.ksprintf (fun s -> failwith s) s

let is_file_directive cmt =
  let lexbuf = Lexing.from_string cmt in
  try
    let _file, _line = Js_lexer.pos lexbuf in
    true
  with _ -> false

let parse_file f =
  let file =
    try
      match Findlib.path_require_findlib f with
      | Some f ->
          let pkg, f' =
            match String.split ~sep:Filename.dir_sep f with
            | [] -> assert false
            | [ f ] -> "js_of_ocaml-compiler", f
            | pkg :: l -> pkg, List.fold_left l ~init:"" ~f:Filename.concat
          in
          Fs.absolute_path (Filename.concat (Findlib.find_pkg_dir pkg) f')
      | None -> Fs.absolute_path f
    with
    | Not_found -> error "cannot find file '%s'. @." f
    | Sys_error s -> error "%s@." s
  in

  let lex = Parse_js.lexer_from_file ~rm_comment:false file in
  let status, lexs =
    Parse_js.lexer_fold
      (fun (status, lexs) t ->
        match t with
        | Js_token.TComment (_info, str) when is_file_directive str -> (
            match status with
            | `Annot _ -> `Annot [], lexs
            | `Code (an, co) -> `Annot [], (List.rev an, List.rev co) :: lexs)
        | Js_token.TComment (info, str) -> (
            match parse_annot info str with
            | None -> status, lexs
            | Some a -> (
                match status with
                | `Annot annot -> `Annot (a :: annot), lexs
                | `Code (an, co) -> `Annot [ a ], (List.rev an, List.rev co) :: lexs))
        | _ when Js_token.is_comment t -> status, lexs
        | Js_token.TUnknown (info, _) ->
            Format.eprintf
              "Unknown token while parsing JavaScript at %s@."
              (loc (Some info));
            if not (Filename.check_suffix file ".js")
            then Format.eprintf "%S doesn't look like a JavaScript file@." file;
            failwith "Error while parsing JavaScript"
        | c -> (
            match status with
            | `Code (annot, code) -> `Code (annot, c :: code), lexs
            | `Annot annot -> `Code (annot, [ c ]), lexs))
      (`Annot [], [])
      lex
  in
  let lexs =
    match status with
    | `Annot _ -> lexs
    | `Code (annot, code) -> (List.rev annot, List.rev code) :: lexs
  in

  let res =
    List.rev_map lexs ~f:(fun (annot, code) ->
        let lex = Parse_js.lexer_from_list code in
        try
          let code = Parse_js.parse lex in
          let fragment =
            { provides = None
            ; requires = []
            ; version_constraint = []
            ; weakdef = false
            ; backends = []
            ; code
            }
          in
          List.fold_left annot ~init:fragment ~f:(fun fragment a ->
              match a with
              | `Provides (pi, name, kind, ka) ->
                  { fragment with provides = Some (pi, name, kind, ka) }
              | `Requires (_, mn) -> { fragment with requires = mn @ fragment.requires }
              | `Version (_, l) ->
                  { fragment with version_constraint = l :: fragment.version_constraint }
              | `ForBackend (_, be) -> { fragment with backends = be @ fragment.backends }
              | `Weakdef _ -> { fragment with weakdef = true })
        with Parse_js.Parsing_error pi ->
          let name =
            match pi with
            | { Parse_info.src = Some x; _ } | { Parse_info.name = Some x; _ } -> x
            | _ -> "??"
          in
          error
            "cannot parse file %S (orig:%S from l:%d, c:%d)@."
            f
            name
            pi.Parse_info.line
            pi.Parse_info.col)
  in
  res

(*
exception May_not_return

let all_return p =
  let open Javascript in
  let rec loop_st = function
    | [] -> raise  May_not_return
    | [Return_statement (Some _), _] -> ()
    | [Return_statement None, _] -> raise May_not_return
    | [If_statement(_,th,el), _] ->
      loop_st [th];
      (match el with
       | None -> raise May_not_return
       | Some x -> loop_st [x])
    | [Do_while_statement(st,_), _] -> loop_st [st]
    | [While_statement(_,st), _] -> loop_st [st]
    | [For_statement (_,_,_,st), _] -> loop_st [st]
    | [Switch_statement (_,l,def), _] ->
      List.iter (fun (_,sts) -> loop_st sts) l
    | [Try_statement(b,_,_),_] -> loop_st b
    | [Throw_statement _, _] -> ()
    | x::xs -> loop_st xs
  in
  let rec loop_sources = function
    | [] -> raise May_not_return
    | [(Statement x, loc)] -> loop_st [(x, loc)]
    | [_] -> raise May_not_return
    | x::xs -> loop_sources xs
  in
  let rec loop_all_sources = function
    | [] -> ()
    | Statement x :: xs -> loop_all_sources xs
    | Function_declaration(_,_,b,_) :: xs ->
      loop_sources b;
      loop_all_sources xs in
  try loop_all_sources p; true with May_not_return -> false
*)

let version_match =
  List.for_all ~f:(fun (op, str) -> op Ocaml_version.(compare current (split str)) 0)

(* TODO: All of these Javascript ASTs should be raw Rehp asts *)

type always_required =
  { filename : string
  ; program : Javascript.program
  }

type state =
  { ids : IntSet.t
  ; always_required_codes : always_required list
  ; codes : Javascript.program list
  }

type output =
  { runtime_code : Javascript.program
  ; always_required_codes : always_required list
  }

let last_code_id = ref 0

let provided = Hashtbl.create 31

let provided_rev = Hashtbl.create 31

let code_pieces = Hashtbl.create 31

let always_included = ref []

(* Handles calls to raw backend specific runtime functions like:

      //Provides: caml_wrap_exception (mutable)
      var caml_wrap_exception = raw_backend("php", [
        "$caml_wrap_exception_php = function($e)  {",
          "}",
        "};"
      ]);
*)
let rec strings_in_arr so_far l =
  match l with
  | [] -> Some so_far
  | Some (Javascript.EStr (s, _)) :: tl -> strings_in_arr (so_far ^ "\n" ^ s) tl
  | None :: tl -> strings_in_arr (so_far ^ "\n") tl
  | _ -> None

let rec process_raw prov req lst =
  let open Javascript in
  match lst with
  | [] -> []
  | ( Statement
        (Variable_statement
          [ (_, Some (ECall (EVar (S { name = "raw_backend"; _ }), [ EArr itms ], _), _))
          ])
    , js_loc )
    :: rest -> (
      match strings_in_arr "" itms with
      | Some impl ->
          (Statement (Raw_statement (prov, req, impl)), js_loc)
          :: process_raw prov req rest
      | None -> (
          match js_loc with
          | Pi pi ->
              Format.eprintf
                "Arguments for raw_backend are incorrect at %s. Must supply an array of \
                 strings to raw_backend."
                (loc (Some pi));
              failwith "Error while parsing JavaScript"
          | _ ->
              Format.eprintf "Arguments for raw_backend are incorrect at unknown location";
              failwith "Error while parsing JavaScript"))
  | hd :: tl -> hd :: process_raw prov req tl

let add_file backend_str f =
  List.iter
    (parse_file f)
    ~f:(fun { provides; requires; version_constraint; backends; weakdef; code } ->
      let vmatch =
        match version_constraint with
        | [] -> true
        | l -> List.exists l ~f:version_match
      in
      let bmatch =
        match backends with
        | [] -> true
        | l -> List.exists l ~f:(fun backend_str' -> backend_str' = backend_str)
      in
      if vmatch && bmatch
      then (
        incr last_code_id;
        let id = !last_code_id in
        match provides with
        | None ->
            let code = process_raw [] requires code in
            always_included := { filename = f; program = code } :: !always_included;
            Hashtbl.add code_pieces id (code, requires)
        | Some (pi, name, kind, ka) ->
            let code = Macro.f code in
            let module J = Javascript in
            let rec find = function
              | [] -> None
              | (J.Function_declaration (Id.S { Id.name = n; _ }, l, _, _), _) :: _
                when name = n ->
                  Some (List.length l)
              | _ :: rem -> find rem
            in
            (* Arity is tracked for each runtime js stub because inline.ml will
             * optimize bytecode by eliminating simple closure around externs
             * that do nothing but forward arguments to them. This is useful
             * when creating differently typed wrappers around poorly typed
             * externs. *)
            let arity = find code in
            let arity =
              match arity, ka with
              | None, Some (_ :: _ as ka') -> Some (List.length ka')
              | Some ar, Some ka when ar != List.length ka ->
                  warn
                    "warning: primitive function %S has arity %d but its Provides \
                     describes %d arguments.\n"
                    name
                    ar
                    (List.length ka);
                  Some ar
              | _ -> None
            in
            Primitive.register name kind ka arity;
            (* The only reason named values are extracted in the js stubs are so
             * that specialize_js.ml can avoid registering ones that are never
             * used. We can sacrifice this optimization in order to not need to
             * traverse the js code at link time. Eventually some module system
             * will prevent the bundling of unused code. *)
            (* let named_values = find_named_value code in *)
            (* StringSet.iter Primitive.register_named_value named_values; *)
            (if Hashtbl.mem provided name
            then
              let _, ploc, weakdef = Hashtbl.find provided name in
              if not weakdef
              then
                (* Perhaps make this warning disabled - overriding can be very
                 * useful. Or maybe just make those weakdefs? *)
                warn
                  "warning: overriding primitive %S\n  old: %s\n  new: %s@."
                  name
                  (loc ploc)
                  (loc pi));

            Hashtbl.add provided name (id, pi, weakdef);
            Hashtbl.add provided_rev id (name, pi);
            (* check_primitive name pi code req *)
            let code = process_raw [ name ] requires code in
            Hashtbl.add code_pieces id (code, requires)))

let get_provided () =
  Hashtbl.fold (fun k _ acc -> StringSet.add k acc) provided StringSet.empty

let load_files backend_str l = List.iter l ~f:(add_file backend_str)

(*;  check_deps () *)

(* resolve *)
let rec resolve_dep_name_rev visited path nm =
  let id =
    try
      let x, _, _ = Hashtbl.find provided nm in
      (* This is where free global variables are detected. *)
      x
    with Not_found -> error "missing dependency '%s'@." nm
  in
  resolve_dep_id_rev visited path id

and resolve_dep_id_rev visited path id =
  if IntSet.mem id visited.ids
  then (
    if List.memq id ~set:path
    then
      error
        "circular dependency: %s"
        (String.concat
           ~sep:", "
           (List.map path ~f:(fun id -> fst (Hashtbl.find provided_rev id))));
    visited)
  else
    let path = id :: path in
    let code, req = Hashtbl.find code_pieces id in
    let visited = { visited with ids = IntSet.add id visited.ids } in
    let visited =
      List.fold_left req ~init:visited ~f:(fun visited nm ->
          resolve_dep_name_rev visited path nm)
    in
    let visited = { visited with codes = code :: visited.codes } in
    visited

let init () =
  { ids = IntSet.empty; always_required_codes = List.rev !always_included; codes = [] }

(* linkall means "link all primitives even if they're not used" *)
let resolve_deps ?(linkall = false) visited_rev used =
  (* link the special files *)
  let missing, visited_rev =
    if linkall
    then
      (* link all primitives *)
      let prog, set =
        Hashtbl.fold
          (fun nm (_id, _, _) (visited, set) ->
            resolve_dep_name_rev visited [] nm, StringSet.add nm set)
          provided
          (visited_rev, StringSet.empty)
      in
      let missing = StringSet.diff used set in
      missing, prog
    else
      (* link used primitives *)
      StringSet.fold
        (fun nm (missing, visited) ->
          if Hashtbl.mem provided nm
          then missing, resolve_dep_name_rev visited [] nm
          else StringSet.add nm missing, visited)
        used
        (StringSet.empty, visited_rev)
  in
  visited_rev, missing

let all state =
  IntSet.fold
    (fun id acc ->
      try
        let name, _ = Hashtbl.find provided_rev id in
        name :: acc
      with Not_found -> acc)
    state.ids
    []

let link state =
  let runtime = List.flatten (List.rev state.codes) in
  let always_required = state.always_required_codes in
  { runtime_code = runtime; always_required_codes = always_required }
