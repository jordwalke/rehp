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

(*
XXX Beware automatic semi-colon insertion...
         a=b
         ++c
      is not the same as
         a=b ++c
===> see so-called "restricted productions":
     the space cannot be replaced by a newline in the following expressions:
       e ++, e --, continue e, break e, return e, throw e
*)

(*
TODO:
- Mark Used Variables.
- Instanceof
- Escape dollar signs in strings (single quoted strings are closer).
- Needs braces in if/else.
- Need to handle named first class functions "J.EFun (Some f, args,)" which
  have no php equivalent. This only happens for caml_alloc_dummy_function so we
  can just rearrange that case. It doesn't currently escape even in that case.
- Generated Function names must be resilient to case insensitivity.
- Translate mathematical + with | 0  to +, and all other + to `.` and `.=`.
  (except for in the cross compiled standard library).
- Create a namespace for each input file.
- The environment for function identifiers is different from that of variables.
  If we have top level exports that aren't lambdas, within their php namespace,
  then we need to print the identifiers differently depending on whether that
  identifier is a lambda identifier or namespace exported function identifier.
- Audit the == and === differences/usages.
- Rename ValidationCompiler.
- Objects represented as Struct3/4/5 since those have object semantics, for
scope capture, as well as array semantics for indexing.
- null should become NULL.
- Need to invent an undefined that == null but doesn't === null. There actually
doesn't seem to be a lot of good usage of == in the stdlib. They should be
converted to use === and then == should not be supported in the conversion.
- Nan and Float utilities for dividing etc.
- delete.
- in.
- Regexes from standard library: Convert to properly escaped strings, or
completely swap out with custon FBString implementation.
- Boolean operators work differently. Standard library likely doesn't rely on
this but should be addressed for completeness.
- Classes and prototypes. Anything function with a capital identifier can be a
class, by convention. Then maybe we can make the class callable without new
just in case it wasn't actually a class.
- Implement caml_call (need to know number of arguments).
- Investigate Closure::bindTo();
- Make sure all arguments created inside of runtime are converted to a
JavaScript reference array.
- All the transforms and normalization should have a preprocessing pass instead
of being embedded in the printing.
- Fix min_int/max_int for 64 bits. Infinity/Nan as well. Maybe keep everything
31 bits. See parse_bytecode's fix_min_max_int.

  JS: x && y
  Php: x ? y : x;

  JS: x || y;
  Php: x ? x : y;

*)

(* Transforming OO style prototype objects:
   We only need to perform minimal support for this, for externs and the
   standard library:

- $xyz->apply(NULL, arg, arg)
- $X = function() {$this->x = 0;};
  $X->prototype = (object) {
    'methName' => function() {$this->doIt()}
  }
  new X($arg)

*)

(* Understanding Php/Hack References:
- With ==> everything is scoped by "value" (local copy on write semantics). No mutating of what a var points to.
- With function() use($var) everything is scoped by "value" (local copy on write semantics).
- With function() use(&$var) everything is scoped just like JS.

"Scoped By Var" works differently for different structures.
- For arrays scoping by var causes mutations to have local copy on write effects.
- For other structures (like objects), mutation is perceived outside of
function (still, not the reference).

For OCaml's semantic pan-language DSL here, we don't ever even need to update
references, except perhaps if someone explicitly requests to (using the
extern). We can just not support that for the Php platform.

So using Hack's lambdas, will actually be sufficient for most use cases and not
require specifying which variables are captured. This assumes that there are no
duplicated/identifiers in any one scope. It also requires that all
"blocks/allocations" are represented via something that has "object semantics"
which will allow mutation. As a later exercize we can selectively change some
variables to be arrays for added performance when we can prove they don't
escape and can't be mutated.

Reference: https://stackoverflow.com/questions/10333016/how-to-access-object-properties-with-names-like-integers/10333200#10333200
Integer string keys of arrays are coerced ints before being stored.
When they are turned into objects you can't get at those fields except by obj->{'1'} syntax.

https://stackoverflow.com/questions/13761335/how-to-set-attributes-for-stdclass-object-at-the-time-object-creation

Make sure you test representations of (object) [array] in 7.2 as well as 7.1 as
the key coercing behavior changed:
http://sandbox.onlinephpfunctions.com/

There is just no way to convert an array with integer keys to an object such
that the fields are accessible in 7.1 and 7.2.

So we really need something with object semantics, and not the crazy Php
semantics. We don't want to pay for both arrays and objects.
So we'll make a few reusable Object classes. (Special casing Struct2/3/4/..10
to avoid argument lists (right?))

Article on JS style objects in Php:
https://stackoverflow.com/questions/6384431/creating-anonymous-objects-in-php

We can use length tracked structs for most allocations, while still using array
access. Fortunately, our Js based DSL that we cross compile distinguishes
between struct access and JS property access.

class Struct3 implements ArrayAccess {
  private one = NULL;
  private two = NULL;
  private three = NULL;
  function __construct(a, b, c) {
    $this->one = a;
    $this->two = b;
    $this->three = c;
  }
}

$o = new Struct3(0, 'anotherProperty', 'hi');

We will still need something to handle the rare prototypal objects that we
compiled from the standard library.
*)

let stats = Option.Debug.find "output"

(* In order to support lambdas for Php, we need to be able to refer to the
  exported (non-lambda) functions differently when consumed. They should not
  be prefixed with a dollar sign. We need to do a bit of lexical analysis to
  accomplish this.  Until then, we'll disable the exported non-lambdas. When
  doing that lexical processing, we can also turn all the Hack lambdas ==> into
  regular lambdas that capture references using use(&$var) to make this Php
  compliant. We also need to implement escaping for function identifiers to
  encode casing in lowercase strings to avoid conflicts. After those two things
  are implemented we can flip this to true.  Also, typeof(someFunction) returns
  'string' - we need to know if it's a function so that all the "typeof x" checks
  would work the same for lambdas and functions. Perhaps it's best to just keep
  everything as lambdas. (but see function_exists and is_callable).
*)
let supports_nonlambdas = false;

open Javascript

module PP = Pretty_print

module Make(D : sig
    val source_map : Source_map.t option
  end) = struct

  let temp_mappings = ref []

  let push_mapping,get_file_index,get_name_index,source_map_enabled =
    let idx_files = ref 0 in
    let idx_names = ref 0 in
    let files = Hashtbl.create 17 in
    let names = Hashtbl.create 17 in
    match D.source_map with
    | None -> (fun _ _ -> ()),(fun _ -> -1),(fun _ -> -1),false
    | Some sm ->
      List.iter (fun f -> Hashtbl.add files f !idx_files; incr idx_files) (List.rev sm.Source_map.sources);
      (fun pos m -> temp_mappings := (pos,m)::!temp_mappings),
      (fun file ->
         try Hashtbl.find files file with
         | Not_found ->
           let pos = !idx_files in
           Hashtbl.add files file pos;
           incr idx_files;
           sm.Source_map.sources <- file :: sm.Source_map.sources;
           pos),
      (fun name ->
         try Hashtbl.find names name with
         | Not_found ->
           let pos = !idx_names in
           Hashtbl.add names name pos;
           incr idx_names;
           sm.Source_map.names <- name :: sm.Source_map.names;
           pos),
      true

  let debug_enabled = Option.Optim.debuginfo ()
  let output_debug_info f loc =
    if debug_enabled then begin
      match loc with
      | Pi {Parse_info.name = Some file; line; col; _}
      | Pi {Parse_info.src  = Some file; line; col; _} ->
        PP.non_breaking_space f;
        PP.string f (Format.sprintf "/*<<%s %d %d>>*/" file (line + 1) col);
        PP.non_breaking_space f
      | N ->
        ()
      | U | Pi _ ->
        PP.non_breaking_space f; PP.string f "/*<<?>>*/"; PP.non_breaking_space f
    end;
    if source_map_enabled then
      match loc with
        N ->
        ()
      | U | Pi { Parse_info.src = None; _ } ->
        push_mapping (PP.pos f)
          { Source_map.gen_line = -1;
            gen_col = -1;
            ori_source = -1;
            ori_line = -1;
            ori_col = -1;
            ori_name = None }
      | Pi { Parse_info.src = Some file; line; col; _ } ->
        push_mapping (PP.pos f)
          { Source_map.gen_line = -1;
            gen_col = -1;
            ori_source = get_file_index file;
            ori_line = line;
            ori_col = col;
            ori_name = None }

  (* Identifiers might contain dollar signs which aren't valid members of an
     identifier in Php. *)
  let rec escape ?(prepend="") s search replace =
    let has = String.contains s search in
    if not has then prepend ^ s
    else
      let len = String.length s in
      let index_of = String.index s search in
      let next_prepend =
        prepend ^
        if index_of == 0 then "" else String.sub s 0 (index_of + 1 - 1) in
      let next_prepend = next_prepend ^ replace in
      let remaining =
        if index_of == len - 1 then "" else String.sub s (index_of + 1) (len - index_of  - 1) in
      escape ~prepend:next_prepend remaining search replace

  let output_debug_info_ident f nm v =
    if source_map_enabled then
      match Code.Var.get_loc v with
      | None -> ()
      | Some { Parse_info.src = Some file; line; col; _ } ->
         push_mapping (PP.pos f)
                      { Source_map.gen_line = -1;
                        gen_col = -1;
                        ori_source = get_file_index file;
                        ori_line = line;
                        ori_col = col;
                        ori_name = Some (get_name_index nm) }
      | Some _ -> ()

  (* Since functions are exclusively closures for now we don't need to deal
    with the case insensitivity of non-closures. Note that functions and
    identifiers have different naming environments.
    $ becomes ____
    _ remains _
    This leads to some conflicts if you happened to have named two variables:

      let myVariable____ = true;
      let myVariable$ = true;

    That's pretty unlikely and good enough for now. We can do a more thorough
    renaming later.
  *)
  let escape_ident s = escape s '$' "____"

  let ident f = function
    | S {name="null";var=None} -> PP.string f ("$jsNull")
    | S {name;var=None} -> PP.string f ("$" ^ escape_ident name)
    | S {name;var=Some v} ->
       output_debug_info_ident f name v;
       PP.string f ("$" ^ escape_ident name)
    | V _v -> assert false

  (* TODO: Escape function identifiers. *)
  let func_ident f = function
    | S {name;var=None} -> PP.string f name
    | S {name;var=Some v} ->
       output_debug_info_ident f name v;
       PP.string f name
    | V _v -> assert false

  let opt_identifier f i =
    match i with
      None   -> ()
    | Some i -> PP.space f; ident f i

  let rec formal_parameter_list f l =
    match l with
      []     -> ()
    | [i]    -> ident f i
    | i :: r -> ident f i; PP.string f ","; PP.break f;
      formal_parameter_list f r

(*
  0 Expression
  1 AssignementExpression
  2 ConditionalExpression
  3 LogicalORExpression
  4 LogicalANDExpression
  5 BitwiseORExpression
  6 BitwiseXORExpression
  7 BitwiseANDExpression
  8 EqualityExpression
  9 RelationalExpression
  10 ShiftExpression
  11 AdditiveExpression
  12 MultiplicativeExpression
  13 UnaryExpression
  NewExpression
  14 PostfixExpression
  # For Php, functions can't be left hand side of call without parens
  FunctionExpression
  15 LeftHandsideExpression
  CallExpression
  16 MemberExpression
  PrimaryExpression
*)

  let op_prec op =
    match op with
      Eq | StarEq | SlashEq | ModEq | PlusEq | MinusEq
    | LslEq | AsrEq | LsrEq | BandEq | BxorEq | BorEq -> 1, 13, 1
    (*
      | Or -> 3, 3, 4
      | And -> 4, 4, 5
      | Bor -> 5, 5, 6
      | Bxor -> 6, 6, 7
      | Band -> 7, 7, 8
    *)
    | Or -> 3, 3, 3
    | And -> 4, 4, 4
    | Bor -> 5, 5, 5
    | Bxor -> 6, 6, 6
    | Band -> 7, 7, 7
    | EqEq | NotEq | EqEqEq | NotEqEq -> 8, 8, 9
    | Gt | Ge | Lt | Le | InstanceOf | In -> 9, 9, 10
    | Lsl | Lsr | Asr -> 10, 10, 11
    | FloatPlus | IntPlus | Plus | Minus -> 11, 11, 12
    | Mul | Div | Mod -> 12, 12, 13

  let op_str op =
    match op with
      Eq      -> "="
    | StarEq  -> "*="
    | SlashEq -> "/="
    | ModEq   -> "%="
    | PlusEq  -> "+="
    | MinusEq -> "-="
    | Or      -> "||"
    | And     -> "&&"
    | Bor     -> "|"
    | Bxor    -> "^"
    | Band    -> "&"
    | EqEq    -> "=="
    | NotEq   -> "!="
    | EqEqEq  -> "==="
    | NotEqEq -> "!=="
    | LslEq   -> "<<="
    | AsrEq   -> ">>="
    | LsrEq   -> ">>>="
    | BandEq  -> "&="
    | BxorEq  -> "^="
    | BorEq   -> "|="
    | Lt      -> "<"
    | Le      -> "<="
    | Gt      -> ">"
    | Ge      -> ">="
    | Lsl     -> "<<"
    | Lsr     -> ">>>"
    | Asr     -> ">>"
    | FloatPlus -> "+"
    | IntPlus -> "+"
    | Plus    -> "."
    | Minus   -> "-"
    | Mul     -> "*"
    | Div     -> "/"
    | Mod     -> "%"
    | InstanceOf
    | In -> assert false

  let unop_str op =
    match op with
      Not -> "!"
    | Neg -> "-"
    | Pl  -> "+"
    | Bnot -> "~"
    | IncrA | IncrB | DecrA | DecrB
    | Typeof | Void | Delete -> assert false

  (*XXX May need to be updated... *)
  (* let rec ends_with_if_without_else st = *)
  (*   match fst st with *)
  (*   | If_statement (_, _, Some st) *)
  (*   | While_statement (_, st) *)
  (*   | For_statement (_, _, _, st) *)
  (*   | ForIn_statement (_, _, st) -> *)
  (*     ends_with_if_without_else st *)
  (*   | If_statement (_, _, None) -> *)
  (*     true *)
  (*   | _ -> *)
  (*     false *)

  let rec need_paren l e =
    match e with
      ESeq (e, _) ->
      l <= 0 && need_paren 0 e
    | ECond (e, _, _) ->
      l <= 2 && need_paren 3 e
    | EBin (op, e, _) ->
      let (out, lft, _rght) = op_prec op in
      l <= out && need_paren lft e
    | EArityTest e  (* Since EArityTest is just expanded to a call *)
    | EArrLen e     (* Since EArrLen is just expanded to a EDot *)
    | ECall (e, _, _) | EAccess (e, _) | EStructAccess (e, _) | EArrAccess (e, _) | EDot (e, _) ->
      l <= 15 && need_paren 15 e
    | EVar _ | EStr _ | EStruct _ | EArr _ | EBool _ | ENum _ | EQuote _ | ERegexp _| EUn _ | ENew _ ->
      false
    | EFun _ | EObj _ ->
      true

  let best_string_quote _ = '\''

  let array_str1 =
    Array.init 256 (fun i -> String.make 1 (Char.chr i))
  let array_conv =
    Array.init 16 (fun i -> String.make 1 (("0123456789abcdef").[i]))

  let pp_string f ?(quote='"') ?(utf=false) s =
    let quote_s = String.make 1 quote in
    PP.string f quote_s;
    let l = String.length s in
    for i = 0 to l - 1 do
      let c = s.[i] in
      match c with
      | '\000' when i = l - 1 || s.[i + 1] < '0' || s.[i + 1] > '9' -> PP.string f "\\0"
      | '\b' -> PP.string f "\\b"
      | '\t' -> PP.string f "\\t"
      | '\n' -> PP.string f "\\n"
      (* This escape sequence is not supported by IE < 9
         | '\011' -> "\\v"
      *)
      | '\012' -> PP.string f "\\f"
      | '\\' when not utf -> PP.string f "\\\\"
      | '\r' -> PP.string f "\\r"
      | '\000' .. '\031'  | '\127'->
        let c = Char.code c in
        PP.string f "\\x";
        PP.string f (Array.unsafe_get array_conv (c lsr 4));
        PP.string f (Array.unsafe_get array_conv (c land 0xf))
      | '\128' .. '\255' when not utf ->
        let c = Char.code c in
        PP.string f "\\x";
        PP.string f (Array.unsafe_get array_conv (c lsr 4));
        PP.string f (Array.unsafe_get array_conv (c land 0xf))
      | _ ->
        if c = quote
        then
          (PP.string f "\\"; PP.string f (Array.unsafe_get array_str1 (Char.code c)))
        else
          PP.string f (Array.unsafe_get array_str1 (Char.code c))
    done;
    PP.string f quote_s


  let rec expression l f e =
    match e with
      EVar v ->
      ident f v
    (* JS:  (e1, e2)
     * Php: ((e1 || true) ? e2 : e2)
     *)
    | ESeq (e1, e2) ->
      expression l f (ECond( EBin (Or, e1, EBool true), e2, e2))
    | EArityTest e ->
      let ident = S {name="rehp_arg_count";var=None} in
      let call = ECall (EVar ident, [e], Javascript.N) in
      expression l f call
    | EArrLen e ->
      let len_check = EDot (e, "length") in
      expression l f len_check
    | EFun (i, ll, b, pc) ->
      (if l > 14 then begin PP.start_group f 1; PP.string f "(" end);
      PP.start_group f 1;
      PP.start_group f 0;
      PP.start_group f 0;
      PP.string f "function";
      opt_identifier f i;
      PP.end_group f;
      PP.break f;
      PP.start_group f 1;
      PP.string f "(";
      formal_parameter_list f ll;
      PP.string f ")";
      PP.end_group f;
      PP.end_group f;
      PP.break f;
      PP.start_group f 1;
      PP.string f "{";
      function_body f b;
      output_debug_info f pc;
      PP.string f "}";
      PP.end_group f;
      PP.end_group f;
      if l > 14 then begin PP.string f ")"; PP.end_group f end
    | ECall (e, el,loc) ->
      if l > 15 then begin PP.start_group f 1; PP.string f "(" end;
      output_debug_info f loc;
      PP.start_group f 1;
      expression 15 f e;
      PP.break f;
      PP.start_group f 1;
      PP.string f "(";
      arguments f el;
      PP.string f ")";
      PP.end_group f;
      PP.end_group f;
      if l > 15 then begin PP.string f ")"; PP.end_group f end
    | EStr (s, kind) ->
      let quote = best_string_quote s in
      pp_string f ~utf:(kind = `Utf8) ~quote s
    | EBool b ->
      PP.string f (if b then "true" else "false")
    | ENum v ->
      let s = Javascript.string_of_number v in
      let need_parent =
        if s.[0] = '-'
        then l > 13  (* Negative numbers may need to be parenthesized. *)
        else l = 15  (* Parenthesize as well when followed by a dot. *)
             && s.[0] <> 'I' (* Infinity *)
             && s.[0] <> 'N' (* NaN *)
      in
      if need_parent then PP.string f "(";
      PP.string f s;
      if need_parent then PP.string f ")";
    | EUn (Typeof, e) ->
      if l > 13 then begin PP.start_group f 1; PP.string f "(" end;
      PP.start_group f 0;
      PP.string f "typeof(";
      expression 13 f e;
      PP.end_group f;
      PP.string f ")";
      if l > 13 then begin PP.string f ")"; PP.end_group f end
    | EUn (Void, e) ->
      if l > 13 then begin PP.start_group f 1; PP.string f "(" end;
      PP.start_group f 0;
      PP.string f "void";
      PP.space f;
      expression 13 f e;
      PP.end_group f;
      if l > 13 then begin PP.string f ")"; PP.end_group f end
    | EUn (Delete, e) ->
      let ident = S {name="unset";var=None} in
      let call = ECall (EVar ident, [e], Javascript.N) in
      expression l f call
    | EUn ((IncrA | DecrA | IncrB | DecrB) as op,e) ->
      if l > 13 then begin PP.start_group f 1; PP.string f "(" end;
      if op = IncrA || op = DecrA
      then expression 13 f e;
      if op = IncrA || op = IncrB
      then PP.string f "++"
      else PP.string f "--";
      if op = IncrB || op = DecrB
      then expression 13 f e;
      if l > 13 then begin PP.string f ")"; PP.end_group f end
    | EUn (op, e) ->
      if l > 13 then begin PP.start_group f 1; PP.string f "(" end;
      PP.string f (unop_str op);
      PP.space f;
      expression 13 f e;
      if l > 13 then begin PP.string f ")"; PP.end_group f end
    | EBin (InstanceOf, e1, e2) ->
      let ident = S {name="instance_of";var=None} in
      let call = ECall (EVar ident, [e1; e2], Javascript.N) in
      expression l f call
    | EBin (In, e1, e2) ->
      let (out, lft, rght) = op_prec InstanceOf in
      if l > out then begin PP.start_group f 1; PP.string f "(" end;
      PP.start_group f 0;
      expression lft f e1;
      PP.space f;
      PP.string f "in";
      PP.space f;
      expression rght f e2;
      PP.end_group f;
      if l > out then begin PP.string f ")"; PP.end_group f end
    | EBin (Lsr, e1, e2) ->
      let ident = S {name="unsigned_right_shift";var=None} in
      let call = ECall (EVar ident, [e1; e2], Javascript.N) in
      expression l f call
    | EBin (op, e1, e2) ->
      let (out, lft, rght) = op_prec op in
      if l > out then begin PP.start_group f 1; PP.string f "(" end;
      expression lft f e1;
      PP.space f;
      PP.string f (op_str op);
      PP.space f;
      expression rght f e2;
      if l > out then begin PP.string f ")"; PP.end_group f end
    | EStruct el
    | EArr el ->
      PP.start_group f 1;
      PP.string f "[";
      element_list f el;
      PP.string f "]";
      PP.end_group f
    | EAccess (e, e')
    | EStructAccess (e, e')
    | EArrAccess (e, e') ->
      if l > 15 then begin PP.start_group f 1; PP.string f "(" end;
      PP.start_group f 1;
      expression 15 f e;
      PP.break f;
      PP.start_group f 1;
      PP.string f "[";
      expression 0 f e';
      PP.string f "]";
      PP.end_group f;
      PP.end_group f;
      if l > 15 then begin PP.string f ")"; PP.end_group f end
    | EDot (e, nm) ->
      (* No need for paren grouping, -> binds the most tightly. *)
      (* if l > 15 then begin PP.start_group f 1; PP.string f "(" end; *)
      expression 15 f e;
      PP.string f "->";
      PP.string f nm;
      (* if l > 15 then begin PP.string f ")"; PP.end_group f end *)
    | ENew (e, args) ->
      let args = match args with
      | None -> []
      | Some args -> args in
      let call = ECall (EDot (e, "jsNew"), args, N) in
      expression l f call
    (* | ENew (e, None) -> (*FIX: should omit parentheses when possible*) *)
    (*   if l > 13 then begin PP.start_group f 1; PP.string f "(" end; *)
    (*   PP.start_group f 1; *)
    (*   PP.string f "new"; *)
    (*   PP.space f; *)
    (*   expression 16 f e; *)
    (*   PP.break f; *)
    (*   PP.string f "()"; *)
    (*   PP.end_group f; *)
    (*   if l > 13 then begin PP.string f ")"; PP.end_group f end *)
    (* | ENew (e, Some el) -> *)
    (*   if l > 13 then begin PP.start_group f 1; PP.string f "(" end; *)
    (*   PP.start_group f 1; *)
    (*   PP.string f "new"; *)
    (*   PP.space f; *)
    (*   expression 16 f e; *)
    (*   PP.break f; *)
    (*   PP.start_group f 1; *)
    (*   PP.string f "("; *)
    (*   arguments f el; *)
    (*   PP.string f ")"; *)
    (*   PP.end_group f; *)
    (*   PP.end_group f; *)
    (*   if l > 13 then begin PP.string f ")"; PP.end_group f end *)
    | ECond (e, e1, e2) ->
      if l > 2 then begin PP.start_group f 1; PP.string f "(" end;
      PP.start_group f 1;
      PP.start_group f 0;
      expression 3 f e;
      PP.end_group f;
      PP.break f;
      PP.start_group f 1;
      PP.string f "?";
      expression 1 f e1;
      PP.end_group f;
      PP.break f;
      PP.start_group f 1;
      PP.string f ":";
      expression 1 f e2;
      PP.end_group f;
      PP.end_group f;
      if l > 2 then begin PP.string f ")"; PP.end_group f end
    | EObj lst ->
      PP.start_group f 1;
      PP.string f "(object)array(";
      PP.break f;
      property_name_and_value_list f lst;
      PP.string f ")";
      PP.end_group f
    | ERegexp (s,opt) -> begin
        (* PP.string f "/";PP.string f s;PP.string f "/"; *)
        PP.string f ("(new Regex('" ^ s ^ "'");
        match opt with
        | None ->
          PP.string f ("))")
        | Some o ->
          PP.string f (", '" ^ o ^ "'");
          PP.string f ("))")
      end
    | EQuote s ->
      PP.string f "(";
      PP.string f s;
      PP.string f ")"

  and property_name f n =
    match n with
      PNI s ->
      let quote = best_string_quote s in
      pp_string f ~utf:true ~quote s;
    | PNS s ->
      let quote = best_string_quote s in
      pp_string f ~utf:true ~quote s;
    | PNN v -> expression 0 f (ENum v)

  and property_name_and_value_list f l =
    match l with
      [] ->
      ()
    | [(pn, e)] ->
      PP.start_group f 0;
      property_name f pn;
      PP.string f "=>";
      PP.break f;
      expression 1 f e;
      PP.end_group f
    | (pn, e) :: r ->
      PP.start_group f 0;
      property_name f pn;
      PP.string f "=>";
      PP.break f;
      expression 1 f e;
      PP.end_group f;
      PP.string f ",";
      PP.break f;
      property_name_and_value_list f r

  and element_list f el =
    match el with
      []     ->
      ()
    | [e]    ->
      begin match e with
          None   -> PP.string f ","
        | Some e -> PP.start_group f 0; expression 1 f e; PP.end_group f
      end
    | e :: r ->
      begin match e with
          None   -> ()
        | Some e -> PP.start_group f 0; expression 1 f e; PP.end_group f
      end;
      PP.string f ","; PP.break f; element_list f r

  (* In Php, you cannot omit the final semi *)
  and function_body f b = source_elements f ~is_export:false ~skip_last_semi:false b

  and arguments f l =
    match l with
      []     -> ()
    | [e]    -> PP.start_group f 0; expression 1 f e; PP.end_group f
    | e :: r -> PP.start_group f 0; expression 1 f e; PP.end_group f;
      PP.string f ","; PP.break f; arguments f r

  and variable_declaration f (i, init) =
    match init with
      None   ->
      ident f i
    | Some (e,pc) ->
      PP.start_group f 1;
      output_debug_info f pc;
      ident f i;
      PP.string f "=";
      PP.break f;
      expression 1 f e;
      PP.end_group f

  and variable_declaration_list_aux ~separator f l =
    match l with
      []     -> assert false
    | [d]    -> variable_declaration f d
    | d :: r -> variable_declaration f d; PP.string f separator; PP.break f;
      variable_declaration_list_aux ~separator f r

  and variable_declaration_list ~separator close f = function
    | []  -> ()
    | [(i, None)] ->
      PP.start_group f 1;
      ident f i;
      if close then PP.string f ";";
      PP.end_group f
    | [(i, Some (e,pc))] ->
      PP.start_group f 1;
      output_debug_info f pc;
      ident f i;
      PP.string f "=";
      PP.break1 f;
      PP.start_group f 0;
      expression 1 f e;
      if close then PP.string f ";";
      PP.end_group f;
      PP.end_group f
    | l ->
      PP.start_group f 1;
      variable_declaration_list_aux ~separator f l;
      if close then PP.string f ";";
      PP.end_group f


  and opt_expression l f e =
    match e with
      None   -> ()
    | Some e -> expression l f e

  and statement ?(last=false) f (s, loc) =
    let last_semi () = if last then () else PP.string f ";" in
    output_debug_info f loc;
    match s with
    | Block b ->
      block f b
    | Variable_statement l ->
      variable_declaration_list ~separator:";" (not last) f l
    | Empty_statement ->
      PP.string f ";"
    | Debugger_statement ->
      PP.string f "debugger"; last_semi ()
    | Expression_statement (EVar _)->
      last_semi ()
    | Expression_statement (EBin (LsrEq, e1, e2)) ->
      (* TODO: This is buggy if e1 has side effects (unlikely, but fix) *)
      let unsigned_right_shift = S {name="unsigned_right_shift";var=None} in
      let call = ECall (EVar unsigned_right_shift, [e1; e2], Javascript.N) in
      let rearranged = Expression_statement (EBin (Eq, e1, call)) in
      statement ~last f (rearranged, loc)
    | Expression_statement e ->
      (* Parentheses are required when the expression
         starts syntactically with "{" or "function" *)
      if need_paren 0 e then begin
        PP.start_group f 1;
        PP.string f "(";
        expression 0 f e;
        PP.string f ")";
        last_semi();
        PP.end_group f
      end else begin
        PP.start_group f 0;
        expression 0 f e;
        last_semi();
        PP.end_group f
      end
    (* We need to always use block printing for ifs because semicolons are used
      to separate multiple variable declarations in Php, and so the following would
      not parse how you would expect:

         if (something) $x=0; $y=0;

     *)
    (* | If_statement (e, s1, (Some _ as s2)) when ends_with_if_without_else s1 -> *)
    (*   (* Dangling else issue... *) *)
    (*   statement ~last f (If_statement (e, (Block ([s1]), N), s2), N) *)
    | If_statement (e, s1, Some s2) ->
      (* Force there to be a block to avoid a bunch of edge cases with semicolons and newlines. *)
      let block_one = match s1 with
      | (Block _, _loc) -> s1
      | _ -> (Block [s1], N) in
      let block_two = match s2 with
      | (Block _, _loc) -> s2
      | _ -> (Block [s2], N) in
      PP.start_group f 0;
      PP.start_group f 1;
      PP.string f "if";
      PP.break f;
      PP.start_group f 1;
      PP.string f "(";
      expression 0 f e;
      PP.string f ")";
      PP.end_group f;
      PP.end_group f;
      PP.break1 f;
      PP.start_group f 0;
      statement f block_one;
      PP.end_group f;
      PP.break f;
      PP.string f "else";
      PP.break1 f;
      PP.start_group f 0;
      statement ~last f block_two;
      PP.end_group f;
      PP.end_group f
    | If_statement (e, s1, None) ->
      let block_one = match s1 with
      | (Block _, _loc) -> s1
      | _ -> (Block [s1], N) in
      PP.start_group f 1;
      PP.start_group f 0;
      PP.string f "if";
      PP.break f;
      PP.start_group f 1;
      PP.string f "(";
      expression 0 f e;
      PP.string f ")";
      PP.end_group f;
      PP.end_group f;
      PP.break f;
      PP.start_group f 0;
      statement ~last f block_one;
      PP.end_group f;
      PP.end_group f
    | While_statement (e, s) ->
      PP.start_group f 1;
      PP.start_group f 0;
      PP.string f "while";
      PP.break f;
      PP.start_group f 1;
      PP.string f "(";
      expression 0 f e;
      PP.string f ")";
      PP.end_group f;
      PP.end_group f;
      PP.break f;
      PP.start_group f 0;
      statement ~last f s;
      PP.end_group f;
      PP.end_group f
    | Do_while_statement ((Block _, _) as s, e) ->
      PP.start_group f 0;
      PP.string f "do";
      PP.break1 f;
      PP.start_group f 0;
      statement f s;
      PP.end_group f;
      PP.break f;
      PP.string f "while";
      PP.break1 f;
      PP.start_group f 1;
      PP.string f "(";
      expression 0 f e;
      PP.string f ")";
      last_semi();
      PP.end_group f;
      PP.end_group f
    | Do_while_statement (s, e) ->
      PP.start_group f 0;
      PP.string f "do";
      PP.space ~indent:1 f;
      PP.start_group f 0;
      statement f s;
      PP.end_group f;
      PP.break f;
      PP.string f "while";
      PP.break f;
      PP.start_group f 1;
      PP.string f "(";
      expression 0 f e;
      PP.string f ")";
      last_semi();
      PP.end_group f;
      PP.end_group f
    | For_statement (e1, e2, e3, s) ->
      PP.start_group f 1;
      PP.start_group f 0;
      PP.string f "for";
      PP.break f;
      PP.start_group f 1;
      PP.string f "(";
      (match e1 with
       | Left e -> opt_expression 0 f e
       | Right l -> variable_declaration_list ~separator:"," false f l);
      PP.string f ";"; PP.break f;
      opt_expression 0 f e2;
      PP.string f ";"; PP.break f;
      opt_expression 0 f e3;
      PP.string f ")";
      PP.end_group f;
      PP.end_group f;
      PP.break f;
      PP.start_group f 0;
      statement ~last f s;
      PP.end_group f;
      PP.end_group f
    | ForIn_statement (e1, e2, s) ->
      PP.start_group f 1;
      PP.start_group f 0;
      PP.string f "foreach";
      PP.break f;
      PP.start_group f 1;
      PP.string f "(";
      expression 0 f (EDot (e2, "__members__"));
      PP.space f;
      PP.string f "as"; PP.break f;
      PP.space f;
      (match e1 with
       | Left e -> expression 0 f e; PP.string f "=> $____";
       | Right v ->
         variable_declaration_list ~separator:"," false f [v]);
         PP.string f "=> $____";
      PP.string f ")";
      PP.end_group f;
      PP.end_group f;
      PP.break f;
      PP.start_group f 0;
      statement ~last f s;
      PP.end_group f;
      PP.end_group f
    | Continue_statement None ->
      PP.string f "continue";
      last_semi()
    | Continue_statement (Some s) ->
      PP.string f "goto ";
      PP.string f (Javascript.Label.to_string s);
      last_semi()
    | Break_statement None ->
      PP.string f "break";
      last_semi()
    | Break_statement (Some s) ->
      PP.string f "break ";
      PP.string f (Javascript.Label.to_string s);
      last_semi()
    | Return_statement e ->
      begin match e with
          None   ->
          PP.string f "return";
          last_semi()
        | Some (EFun (i, l, b, pc)) ->
          PP.start_group f 1;
          PP.start_group f 0;
          PP.start_group f 0;
          PP.string f "return function";
          opt_identifier f i;
          PP.end_group f;
          PP.break f;
          PP.start_group f 1;
          PP.string f "(";
          formal_parameter_list f l;
          PP.string f ")";
          PP.end_group f;
          PP.end_group f;
          PP.break f;
          PP.start_group f 1;
          PP.string f "{";
          function_body f b;
          output_debug_info f pc;
          PP.string f "}";
          last_semi();
          PP.end_group f;
          PP.end_group f
        | Some e ->
          PP.start_group f 7;
          PP.string f "return";
          PP.non_breaking_space f;
          PP.start_group f 0;
          expression 0 f e;
          last_semi();
          PP.end_group f;
          PP.end_group f
          (* There MUST be a space between the return and its
             argument. A line return will not work *)
      end
    | Labelled_statement (i, s) ->
      PP.string f (Javascript.Label.to_string i);
      PP.string f ":";
      PP.break f;
      statement ~last f s
    | Switch_statement (e, cc, def, cc') ->
      PP.start_group f 1;
      PP.start_group f 0;
      PP.string f "switch";
      PP.break f;
      PP.start_group f 1;
      PP.string f "(";
      expression 0 f e;
      PP.string f ")";
      PP.end_group f;
      PP.end_group f;
      PP.break f;
      PP.start_group f 1;
      PP.string f "{";
      let output_one _last (e,sl) =
        PP.start_group f 1;
        PP.start_group f 1;
        PP.string f "case";
        PP.space f;
        expression 0 f e;
        PP.string f ":";
        PP.end_group f;
        PP.break f;
        PP.start_group f 0;
        statement_list ~skip_last_semi:false f sl;
        PP.end_group f;
        PP.end_group f;
        PP.break f in
      let rec loop last = function
        | [] -> ()
        | [x] -> output_one last x
        | x::xs -> output_one false x; loop last xs in
      loop (def = None && cc' = []) cc;
      begin match def with
          None ->
          ()
        | Some def ->
          PP.start_group f 1;
          PP.string f "default:";
          PP.break f;
          PP.start_group f 0;
          statement_list ~skip_last_semi:false f def;
          PP.end_group f;
          PP.end_group f
      end;
      loop true cc';
      PP.string f "}";
      PP.end_group f;
      PP.end_group f
    | Throw_statement e ->
      PP.start_group f 6;
      PP.string f "throw";
      PP.non_breaking_space f;
      PP.start_group f 0;
      expression 0 f e;
      last_semi();
      PP.end_group f;
      PP.end_group f
    (* There must be a space between the return and its
       argument. A line return would not work *)
    | Try_statement (b, ctch, fin) ->
      PP.start_group f 0;
      PP.string f "try";
      PP.space ~indent:1 f;
      block f b;
      begin match ctch with
          None ->
          ()
        | Some (i, b) ->
          PP.break f;
          PP.start_group f 1;
          PP.string f "catch(Exception ";
          ident f i;
          PP.string f ")";
          PP.break f;
          block f b;
          PP.end_group f
      end;
      begin match fin with
          None ->
          ()
        | Some b ->
          PP.break f;
          PP.start_group f 1;
          PP.string f "finally";
          PP.space f;
          block f b;
          PP.end_group f
      end;
      PP.end_group f

  and statement_list f ?skip_last_semi b = match b with
      []     -> ()
    | [s]    -> statement f ?last:skip_last_semi s
    | s :: r -> statement f s; PP.break f; statement_list f ?skip_last_semi r

  and block f b =
    PP.start_group f 1;
    PP.string f "{";
    PP.break f;
    statement_list ~skip_last_semi:false f b;
    PP.break f;
    PP.string f "}";
    PP.end_group f

  (* Function declarations cannot nest in Php, so we need to turn nested
     function declarations into lambdas. is_export is true iff it is a top level
     declaration in the file's namespace. *)
  and source_element f ~is_export ?skip_last_semi se =
    match se with
    | (Statement s, loc) -> statement f ?last:skip_last_semi (s, loc)
    | (Function_declaration (i, l, b, loc'), loc) ->
      if not is_export || supports_nonlambdas then
        let lam = EFun (None, l , b , loc') in
        (* Maybe this final J.N needs to be changed. *)
        let as_var = Variable_statement [i, Some (lam, Javascript.N)] in
        statement f ?last:skip_last_semi (as_var, loc)
      else (
        output_debug_info f loc;
        PP.start_group f 1;
        PP.start_group f 0;
        PP.start_group f 0;
        PP.string f "function";
        PP.space f;
        func_ident f i;
        PP.end_group f;
        PP.break f;
        PP.start_group f 1;
        PP.string f "(";
        formal_parameter_list f l;
        PP.string f ")";
        PP.end_group f;
        PP.end_group f;
        PP.break f;
        PP.start_group f 1;
        PP.string f "{";
        function_body f b;
        output_debug_info f loc';
        PP.string f "}";
        PP.end_group f;
        PP.end_group f
      )


  and source_elements f ~is_export ?skip_last_semi se =
    match se with
      []     -> ()
    | [s]    -> source_element f ~is_export ?skip_last_semi s
    | s :: r ->
      source_element f ~is_export s;
      PP.break f;
      source_elements ~is_export f ?skip_last_semi r


  and program f s =
    source_elements ~is_export:true f s

end

let part_of_ident =
  let a = Array.init 256 (fun i ->
    let c = Char.chr i in
    (c >= 'a' && c <= 'z') || (c >= 'A' && c <= 'Z') || (c >= '0' && c <= '9') || c = '_' || c = '$'
  ) in
  (fun c -> Array.unsafe_get a (Char.code c))

let need_space a b =
  (* do not concat 2 differant identifier *)
  (part_of_ident a && part_of_ident b) ||
  (* do not generate end_of_line_comment.
     handle the case of "num / /* comment */ b " *)
  (a = '/' && b = '/') ||
  (* https://github.com/ocsigen/js_of_ocaml/issues/507 *)
  (a = '-' && b = '-')

let program f ?source_map p =
  let smo = match source_map with
    | None -> None
    | Some (_,sm) -> Some sm in
  let module O = Make(struct
      let source_map = smo
    end) in
  PP.set_needed_space_function f need_space;
  PP.start_group f 0; O.program f p; PP.end_group f; PP.newline f;
  (match source_map with
   | None -> ()
   | Some (out_file,sm) ->
     let sm = { sm with Source_map.sources = List.rev sm.Source_map.sources;
                        Source_map.names   = List.rev sm.Source_map.names;
              }
     in
     let sources = sm.Source_map.sources in
     let sources_content =
       match sm.Source_map.sources_content with
       | None -> None
       | Some [] ->
         Some (List.map
                 (fun file ->
                    if Sys.file_exists file
                    then
                      let content = Util.read_file file in
                      Some content
                    else None) sources)
       | Some _ -> assert false in
     let mappings =
       List.map
         (fun (pos,m) ->
            {m with
             Source_map.gen_line = pos.PP.p_line;
             Source_map.gen_col  = pos.PP.p_col}) !O.temp_mappings
     in
     let sources = match sm.Source_map.sourceroot with
       | None -> sources
       | Some root ->
         let script_file = (Filename.chop_extension sm.Source_map.file) ^ ".make-sourcemap-links.sh" in
         let oc = open_out script_file in
         let printf fmt = Printf.fprintf oc fmt  in
         let targets = List.map (fun src -> Filename.basename src) sources in
         printf "#! /bin/bash\n";
         printf "mkdir -p %s\n" root;
         List.iter2 (fun src tg ->
           printf "ln -s %s %s\n" src (Filename.concat root tg)) sources targets;
         close_out oc;
         Util.warn "Source-map info: run 'sh %s' to create links to sources in %s.\n%!" script_file root;
         targets
     in
     let sm = { sm with Source_map.sources; sources_content; mappings} in
     let urlData =
       match out_file with
       | None ->
         let data = Source_map_io.to_string sm in
         "data:application/json;base64," ^ (B64.encode data)
       | Some out_file ->
         Source_map_io.to_file sm out_file;
         Filename.basename out_file
     in
     PP.newline f;
     PP.string f (Printf.sprintf "//# sourceMappingURL=%s\n" urlData));
  if stats ()
  then begin
    let size i =
      Printf.sprintf "%.2fKo" (float_of_int i /. 1024.) in
    let _percent n d =
      Printf.sprintf "%.1f%%" (float_of_int n *. 100. /. (float_of_int d)) in
    let total_s = PP.total f in
    Format.eprintf "total size : %s@." (size total_s);
  end
