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

open! Js_of_ocaml_compiler.Stdlib
open Js_of_ocaml_compiler
module Fp = RehpFp

let times = Debug.find "times"

let debug_mem = Debug.find "mem"

let _ = Sys.catch_break true

type ('a, 'b, 'c, 'd, 'e) extra_hash_data =
  { args : 'a
  ; imports : 'b
  ; globals : 'c
  ; primitives : 'd
  ; reloc : 'e }

let empty_extra_hash_data =
  {args = []; imports = []; globals = []; primitives = []; reloc = []}
  
(**
 * Gets the project root for npm projects using commonly set environment
 * variables.  These ones are esy specific but we should add any other
 * variables/file system searches that would reliably discover an npm project
 * root.  *)
(* TODO: Add this to Fs or Fp *)
let rel_to_cwd_absolute fcp =
  match fcp with
  | Fp.Relative p ->
      let cwd = Fp.absoluteExn (PathUtils.normalizeSeps (Sys.getcwd ())) in
      Fp.join cwd p
  | Fp.Absolute p -> p

let get_project_root () =
  (* cur__original_root is set during esy build *)
  match Sys.getenv "cur__original_root" with
  | exception Not_found ->
    (* ESY__ROOT_PACKAGE_CONFIG_PATH is set during esy x (useful for testing jsoo/rehp itself) *)
    (match Sys.getenv("ESY__ROOT_PACKAGE_CONFIG_PATH") with
    | exception Not_found -> None
    | p ->
      let trimmed = String.trim p in
      let fcp = RehpFp.testForPathExn (PathUtils.normalizeSeps trimmed) in
      let abs = rel_to_cwd_absolute fcp in
      if String.is_empty trimmed then None else Some (Fp.dirName abs))
  | p ->
    let trimmed = String.trim(p) in
    let fcp = RehpFp.testForPathExn (PathUtils.normalizeSeps trimmed) in
    let abs = rel_to_cwd_absolute fcp in
    if String.is_empty trimmed then None else Some abs

  
let compute_hashes
    custom_header_text
    {args; imports; globals; primitives; reloc}
    (bc : Parse_bytecode.one) =
  let args_hash = Hashtbl.hash args in
  let custom_header_hash = Hashtbl.hash custom_header_text in
  (* The only fields that must be tracked for changes are the bytecode and the
   * debug data. We don't really need to track primitives, because if they are
   * changed in a file without changing export ordering, and without being
   * used, then it has no change in the compilation output that wouldn't show
   * up in debug data. Consumers will have their bytecode changed as a result
   * of the changed primitive string.*)
  (* Lists are deep and overlooked by hashing. Convert to Array and also set
   * depth to 256. Including some commented examples of things that don't work. *)
  (* As a future feature, the "imports" crcs can be tracked to detect when recompilation
   * needs to occur to optimize arity calls *)
  let lines =
    [ "/*____hashes"
      (* Disabling compiler in hash because it makes it hard to update lots of
       * checked in files if you apply a small compiler fix. *)
      (* ; "compiler: " ^ Compiler_version.git_version *)
    ; (* :: ("bytecode(bad): " ^ string_of_int (Hashtbl.hash_param 256 256 bc.code)) *)
      "flags: " ^ string_of_int (custom_header_hash + args_hash)
    ; (* :: ("bytecode.cmis: " ^ string_of_int (Hashtbl.hash_param 256 256 bc.cmis)) *)
      (* :: ("bytecode.debug(bad): " ^ string_of_int (Hashtbl.hash_param 256 256 bc.debug)) *)
      "bytecode: " ^ string_of_int (Code.hash_program bc.code)
    ; (* Reloc changes are redundant with bytecode + debug data changes *)
      (* :: ("reloc-granular: " ^
       String.concat ~sep:"-" (List.map reloc ~f:(fun (reloc_info, int) ->
          "\n" ^ string_of_int (
            (Hashtbl.hash_param 256 256 reloc_info) + int
            ))
          )
       ) *)
      "debug-data: "
      ^ string_of_int (Parse_bytecode.Debug.hash_data_for_change_detection bc.debug)
    ; "primitives: "
      ^ string_of_int (Hashtbl.hash_param 256 256 (Array.of_list primitives)) ]
    (* This will be needed to know when to recompile arity optimizations
     * across modules:
      :: List.map imports ~f:(
        fun (name, digest) ->
          ("require " ^ name ^ ": ") ^
          (match digest with
          | None -> "None"
          | Some(d) -> Digest.to_hex d)
      )
     *)
  in
  String.concat ~sep:" " lines ^ "*/"

let file_contains_hashes hashes_comment file =
  let file_contents = Fs.read_file (Fp.toString file) in
  match Stdlib.String.find_substring hashes_comment file_contents 0 with
  | exception Not_found -> false
  | i -> true

let file_needs_update use_hashing hashes_comment file =
  if not (Sys.file_exists (Fp.toString file))
  then true
  else if not use_hashing
  then (* If file exists and... *)
    true
  else
    (* File exists, and we are to use hashing *)
    not (file_contains_hashes hashes_comment file)

let temp_file_name =
  (* Inlined unavailable Filename.temp_file_name. Filename.temp_file gives
     us incorrect permissions. https://github.com/ocsigen/js_of_ocaml/issues/182 *)
  let prng = lazy (Random.State.make_self_init ()) in
  fun ~temp_dir prefix suffix ->
    let prefix = match prefix with None -> "" | Some s -> s in
    let rnd = Random.State.bits (Lazy.force prng) land 0xFFFFFF in
    Fp.append temp_dir (Printf.sprintf "%s%06x%s" prefix rnd suffix)

let gen_file file f =
  let f_tmp =
    temp_file_name ~temp_dir:(Fp.dirName file) (Fp.baseName file) ".tmp"
  in
  try
    let ch = open_out_bin (Fp.toString f_tmp) in
    (try f ch
     with e ->
       close_out ch;
       raise e);
    close_out ch;
    (try Sys.remove (Fp.toString file) with Sys_error _ -> ());
    Sys.rename (Fp.toString f_tmp) (Fp.toString file)
  (* THIS MASKS DEEPER ERROR LOCATIONS (and I've tried reraise to no avail) *)
  with exc ->
    Format.eprintf "Error: cannot generate %s@." (Fp.toString file);
    Sys.remove (Fp.toString f_tmp);
    raise exc

let gen_unit_filename ?ext u =
  let ext =
    match ext with
    | None -> Backend.Current.extension ()
    | Some e -> e
  in
  Printf.sprintf "%s.%s" u.Cmo_format.cu_name ext

let gen_unit_filepath ?ext dir u = Fp.append dir (gen_unit_filename ?ext u)

let ensure_file fp =
  let exists = Sys.file_exists (Fp.toString fp) in
  if exists
  then ()
  else
    gen_file fp (fun chan ->
        let fmt = Pretty_print.to_out_channel chan in
        Pretty_print.string fmt "true";
        Pretty_print.newline fmt)

let get_likely_dependency_outputs output_dir cmos implicit_ext =
    (* b is "not inferred from input" *)
    (* Should not take dirname just because inferred in
     * keep_unit_names mode where we create a directory. *)
    (* let dir = if b then x else Filename.dirname x in *)
    (* Mark the directory as a rehp output dir *)
    ensure_file (Fp.append output_dir "rehp-output-dir.txt");
    let existing_outputs =
      Dependency_outputs.getPotentialDependencyOutputs output_dir in
    let inner_dependencies =
      List.map cmos ~f:(fun cmo ->
          let filename = gen_unit_filename ?ext:implicit_ext cmo in
          { Dependency_outputs.dirRelativeToOutput = Fp.dot
          ; normalizedCompilationUnit =
              Parse_bytecode.normalize_module_name cmo.cu_name
          ; filename })
    in
    List.concat [inner_dependencies; existing_outputs]

let f
    ({ CompileArg.common
     ; profile
     ; source_map
     ; runtime_files
     ; input_file
     ; output_file
     ; backend
     ; params
     ; static_env
     ; dynlink
     ; linkall
     ; toplevel
     ; nocmis
     ; runtime_only
     ; include_dir
     ; fs_files
     ; fs_output
     ; fs_external
     ; export_file
     ; keep_unit_names } as args) =
  
  (* Need to allow a force flag because Dune won't let you set flags for
   * compiled dependencies. *)
  let keep_unit_names = match Sys.getenv_opt "REHP_OVERRIDE_KEEP_UNIT_NAMES" with
  | None -> keep_unit_names
  | Some "true" -> true
  | Some _ -> false in
  let dynlink = dynlink || toplevel || runtime_only in
  let backend =
    match backend with
    | None -> (module Backend_js : Backend.Backend_implementation)
    | Some be -> be
  in
  Backend.set_backend backend;
  let use_hashing = common.CommonArg.use_hashing in
  let custom_header = common.CommonArg.custom_header in
  let hide_compilation_summary = common.CommonArg.hide_compilation_summary in
  let async_compilation_summary = common.CommonArg.async_compilation_summary in
  let implicit_ext = common.CommonArg.implicit_ext in
  let custom_header =
    match custom_header with
    | Some ch ->
        if String.length ch > 6 && String.equal (String.sub ~pos:0 ~len:5 ch) "file:"
        then
          let header_file = String.sub ch ~pos:5 ~len:(String.length ch - 5) in
          if not (Sys.file_exists header_file)
          then
            failwith (Printf.sprintf "custom header file %S does not exists" header_file)
          else Fs.read_file header_file
        else ch
    | None -> "/*____CompilationOutput*/"
  in
  CommonArg.eval common;
  (match output_file with
  | `Stdout, _ -> ()
  | `Name name, _ when debug_mem () -> Debug.start_profiling (Fp.toString name)
  | `Name _, _ -> ());
  List.iter params ~f:(fun (s, v) -> Config.Param.set s v);
  List.iter static_env ~f:(fun (s, v) -> Eval.set_static_env s v);
  let t = Timer.make () in
  let include_dir =
    List.map include_dir ~f:(fun d ->
        match Findlib.path_require_findlib d with
        | Some d ->
            let pkg, d' =
              match String.split ~sep:Filename.dir_sep d with
              | [] -> assert false
              (* Is this where that weird logging is coming from? *)
              | [d] -> "js_of_ocaml", d
              | pkg :: l -> pkg, List.fold_left l ~init:"" ~f:Filename.concat
            in
            Filename.concat (Findlib.find_pkg_dir pkg) d'
        | None -> d)
  in
  let exported_unit =
    match export_file with
    | None -> None
    | Some file ->
        if not (Sys.file_exists file)
        then failwith (Printf.sprintf "export file %S does not exists" file);
        let ic = open_in file in
        let t = Hashtbl.create 17 in
        (try
           while true do
             Hashtbl.add t (input_line ic) ()
           done;
           assert false
         with End_of_file -> ());
        close_in ic;
        Some (Hashtbl.fold (fun cmi () acc -> cmi :: acc) t [])
  in
  (* Benchmarking shows this takes on the order of 100ms *)
  Linker.load_files runtime_files;
  let paths =
    try List.append include_dir [Findlib.find_pkg_dir "stdlib"]
    with Not_found -> include_dir
  in
  if times () then Format.eprintf "Start parsing...@.";
  let need_debug =
    if Option.is_some source_map || Config.Flag.debuginfo () || toplevel
    then `Full
    else if Config.Flag.pretty ()
    then `Names
    else `No
  in
  let check_debug debug =
    if (not runtime_only)
       && Option.is_some source_map
       && Parse_bytecode.Debug.is_empty debug
    then
      warn
        "Warning: '--source-map' is enabled but the bytecode program was compiled with \
         no debugging information.\n\
         Warning: Consider passing '-g' option to ocamlc.\n\
         %!"
  in
  let pseudo_fs_instr prim debug cmis =
    let cmis = if nocmis then StringSet.empty else cmis in
    let paths =
      paths @ StringSet.elements (Parse_bytecode.Debug.paths debug ~units:cmis)
    in
    PseudoFs.f ~prim ~cmis ~files:fs_files ~paths
  in
  let env_instr () =
    List.map static_env ~f:(fun (k, v) ->
        Primitive.add_external "caml_set_static_env";
        let args = [Code.Pc (IString k); Code.Pc (IString v)] in
        Code.(Let (Var.fresh (), Prim (Extern "caml_set_static_env", args))))
  in
  let pseudo_fs_init_instr () = if fs_external then [PseudoFs.init ()] else [] in
  let output
      unit_name
      ordered_compunit_deps
      extra_hash_data
      (one : Parse_bytecode.one)
      standalone
      output_file =
    check_debug one.debug;
    let hashes_comment =
      if not use_hashing
      then "/* Hashing disabled */"
      else compute_hashes custom_header extra_hash_data one
    in
    let custom_header =
      Module_prep.substitute_and_split
        ~hide_compilation_summary
        ~async_compilation_summary
        custom_header
        hashes_comment
        unit_name
        (List.map ~f:Ident.name ordered_compunit_deps)
    in
    (match output_file with
    | `Stdout ->
        let instr =
          List.concat
            [ pseudo_fs_instr `caml_create_file one.debug one.cmis
            ; pseudo_fs_init_instr ()
            ; env_instr () ]
        in
        let code = Code.prepend one.code instr in
        let fmt = Pretty_print.to_out_channel stdout in
        RehpDriver.f
          ~standalone
          ?projectRoot:(get_project_root())
          ?profile
          ~linkall
          ~dynlink
          ~custom_header
          ?source_map
          fmt
          one.debug
          code
    | `Name file ->
        if file_needs_update use_hashing hashes_comment file
        then (
          let fs_instr1, fs_instr2 =
            match fs_output with
            | None -> pseudo_fs_instr `caml_create_file one.debug one.cmis, []
            | Some _ -> [], pseudo_fs_instr `caml_create_file_extern one.debug one.cmis
          in
          gen_file file (fun chan ->
              let instr =
                List.concat [fs_instr1; pseudo_fs_init_instr (); env_instr ()]
              in
              let code = Code.prepend one.code instr in
              let fmt = Pretty_print.to_out_channel chan in
              RehpDriver.f
                ~file
                ?projectRoot:(get_project_root())
                ~standalone
                ?profile
                ~linkall
                ~dynlink
                ~custom_header
                ?source_map
                fmt
                one.debug
                code);
          Option.iter fs_output ~f:(fun file ->
              let fcp = RehpFp.testForPathExn (PathUtils.normalizeSeps file) in
              let file = rel_to_cwd_absolute fcp in
              gen_file file (fun chan ->
                  let instr = fs_instr2 in
                  let code = Code.prepend Code.empty instr in
                  let pfs_fmt = Pretty_print.to_out_channel chan in
                  RehpDriver.f
                    ~file
                    ?projectRoot:(get_project_root())
                    ~standalone
                    ?profile
                    ~custom_header
                    pfs_fmt
                    one.debug code))));
    if times () then Format.eprintf "compilation: %a@." Timer.print t
  in
  (if runtime_only
  then
    let code : Parse_bytecode.one =
      { code = Parse_bytecode.predefined_exceptions ()
      ; cmis = StringSet.empty
      ; debug = Parse_bytecode.Debug.create () }
    in
    output "Runtime" [] empty_extra_hash_data code true (fst output_file)
  else
    let kind, ic, close_ic =
      match input_file with
      | None -> Parse_bytecode.from_channel stdin, stdin, fun () -> ()
      | Some fn ->
          let ch = open_in_bin (Fp.toString fn) in
          let res = Parse_bytecode.from_channel ch in
          res, ch, fun () -> close_in ch
    in
    (match kind with
    | `Exe ->
        let t1 = Timer.make () in
        let code =
          Parse_bytecode.from_exe
            ~includes:paths
            ~toplevel
            ?exported_unit
            ~dynlink
            ~debug:need_debug
            ic
        in
        if times () then Format.eprintf "  parsing: %a@." Timer.print t1;
        (* Fast hashing disabled for exe mode *)
        output "Exe" [] empty_extra_hash_data code true (fst output_file)
    | `Cmo cmo ->
        let (output_file, likely_dependency_outputs) =
          match output_file, keep_unit_names with
          | (`Stdout, false), true ->
              let dotAbs = rel_to_cwd_absolute (Fp.testForPathExn(".")) in
              (`Name (gen_unit_filepath ?ext:implicit_ext dotAbs cmo), [])
          | (`Stdout, _), false -> (`Stdout, [])
          (* In keep unit names mode, the even if output name is inferred from input, we still
           * create the output directory right where the input file is.
           * TODO: Should deprecate the b = true case (file out inferred from input) *)
          | (`Name fp, _), _ ->
            if keep_unit_names then (
              (* Mark the directory as a rehp output dir *)
              (* when String.length x > 0 && Char.equal x.[String.length x - 1] '/' -> *)
              Dependency_outputs.ensureDir fp;
              ensure_file (Fp.append fp "rehp-output-dir.txt");
              let likely_dependency_outputs =
                get_likely_dependency_outputs fp [cmo] implicit_ext in
              (`Name (gen_unit_filepath ?ext:implicit_ext fp cmo), likely_dependency_outputs)
            )
            else (`Name fp, [])
          | (`Stdout, true), true ->
              failwith "use [-o dirname/] or remove [--keep-unit-names]"
        in
        Dependency_outputs.set likely_dependency_outputs;
        let t1 = Timer.make () in
        let code =
          Parse_bytecode.from_cmo ~includes:paths ~toplevel ~debug:need_debug cmo ic
        in
        if times () then Format.eprintf "  parsing: %a@." Timer.print t1;
        let extra_hash_data = empty_extra_hash_data in
        (* Fast hashing not supported for cmo mode *)
        output cmo.cu_name cmo.cu_required_globals extra_hash_data code false output_file
    | `Cma cma when keep_unit_names -> (
        (* These can be useful to backend module loading - compute them once so each
         * output doesn't need to search for them for each file. *)
        let likely_dependency_outputs =
          match output_file with
          | `Name dir, _b ->
              Dependency_outputs.ensureDir dir;
              (* Mark the directory as a rehp output dir *)
              ensure_file (Fp.append dir "rehp-output-dir.txt");
              get_likely_dependency_outputs dir cma.lib_units implicit_ext
          | _ -> []
        in
        Dependency_outputs.set likely_dependency_outputs;
        (* TODO: Should deprecate the b = true case (file out inferred from input) *)
        List.iter cma.lib_units ~f:(fun cmo ->
            let output_file =
              match output_file with
              | `Stdout, false ->
                  let dotAbs = rel_to_cwd_absolute (Fp.testForPathExn(".")) in
                  `Name (gen_unit_filepath ?ext:implicit_ext dotAbs cmo)
              | `Name x, false ->
                  `Name (gen_unit_filepath ?ext:implicit_ext (Fp.dirName x) cmo)
              | `Name x, true ->
                (* when String.length x > 0 && Char.equal x.[String.length x - 1] '/' -> *)
                (* when String.length x > 0 && Char.equal x.[String.length x - 1] '/' -> *)
                  `Name (gen_unit_filepath ?ext:implicit_ext x cmo)
              (* | `Stdout, true | `Name _, true -> *)
              | `Stdout, true ->
                  failwith "use [-o dirname/] or remove [--keep-unit-names]"
            in
            let t1 = Timer.make () in
            let code =
              Parse_bytecode.from_cmo ~includes:paths ~toplevel ~debug:need_debug cmo ic
            in
            if times ()
            then Format.eprintf "  parsing: %a (%s)@." Timer.print t1 cmo.cu_name;
            let extra_hash_data =
              { args
              ; imports = cmo.cu_imports
              ; globals = cmo.cu_required_globals
              ; primitives = cmo.cu_primitives
              ; reloc = cmo.cu_reloc }
            in
            output
              cmo.cu_name
              cmo.cu_required_globals
              extra_hash_data
              code
              false
              output_file);
        match output_file with
        | `Name x, true ->
            let expected =
              List.map cma.lib_units ~f:(fun cmo ->
                  gen_unit_filepath ?ext:implicit_ext x cmo)
            in
            let observed =
              List.map
                ~f:(fun d -> Fp.append x d)
                (Dependency_outputs.dirContents x) in
            Dependency_outputs.removeUnexpectedFiles
              (Fp.append x "rehp-output-dir.txt" :: expected)
              observed
        | _ -> ())
    | `Cma cma ->
        let t1 = Timer.make () in
        let code =
          Parse_bytecode.from_cma ~includes:paths ~toplevel ~debug:need_debug cma ic
        in
        if times () then Format.eprintf "  parsing: %a@." Timer.print t1;
        (* Module loading not supported in library compilation mode *)
        (* Hashing also is not supported in non-separate library mode *)
        output "Library" [] empty_extra_hash_data code false (fst output_file));
    close_ic ());
  Debug.stop_profiling ()

let main = Cmdliner.Term.(pure f $ CompileArg.options), CompileArg.info

let print_file_error msg name line col =
  Format.eprintf
    "\nFile \"%s\", line %d, characters %d-%d:\n"
    name
    (line + 1)
    col
    (col + 2);
  Format.eprintf "Error: %s\n\n" msg

let _ =
  Timer.init Sys.time;
  try
    Cmdliner.Term.eval ~catch:false ~argv:(Util.normalize_argv ~warn_:true Sys.argv) main
  with
  (* TODO: Print this in a way that is parseable by refmterr *)
  | Errors.UserError (msg, opt_loc) ->
      (match opt_loc with
      | Some {Parse_info.name = Some name; line; col} ->
          print_file_error msg name line col
      | _ -> Format.eprintf "Error: %s\n" msg);
      exit 1
  | (Match_failure _ | Assert_failure _ | Not_found) as exc ->
      let backtrace = Printexc.get_backtrace () in
      Format.eprintf
        "%s: You found a bug. Please report it at \
         https://github.com/ocsigen/js_of_ocaml/issues :@."
        Sys.argv.(0);
      Format.eprintf "Error: %s@." (Printexc.to_string exc);
      prerr_string backtrace;
      exit 1
  | Magic_number.Bad_magic_number s ->
      Format.eprintf "%s: Error: Not an ocaml bytecode file@." Sys.argv.(0);
      Format.eprintf "%s: Error: Invalid magic number %S@." Sys.argv.(0) s;
      exit 1
  | Magic_number.Bad_magic_version h ->
      Format.eprintf "%s: Error: Bytecode version mismatch.@." Sys.argv.(0);
      let k =
        match Magic_number.kind h with
        | (`Cmo | `Cma | `Exe) as x -> x
        | `Other _ -> assert false
      in
      let comp =
        if Magic_number.compare h (Magic_number.current k) < 0
        then "an older"
        else "a newer"
      in
      Format.eprintf
        "%s: Error: Your ocaml bytecode and the js_of_ocaml compiler have to be \
         compiled with the same version of ocaml.@."
        Sys.argv.(0);
      Format.eprintf
        "%s: Error: The Js_of_ocaml compiler has been compiled with ocaml version %s.@."
        Sys.argv.(0)
        Sys.ocaml_version;
      Format.eprintf
        "%s: Error: Its seems that your ocaml bytecode has been compiled with %s \
         version of ocaml.@."
        Sys.argv.(0)
        comp;
      exit 1
  | Failure s ->
      Format.eprintf "%s: Error: %s@." Sys.argv.(0) s;
      exit 1
  | exc ->
      let backtrace = Printexc.get_backtrace () in
      Format.eprintf "%s: Error: %s@." Sys.argv.(0) (Printexc.to_string exc);
      prerr_string backtrace;
      exit 1
