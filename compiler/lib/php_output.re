/* Js_of_ocaml compiler
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
 */
[@ocaml.warning "-9"];
[@ocaml.warning "-27"];

/*
 XXX Beware automatic semi-colon insertion...
          a=b
          ++c
       is not the same as
          a=b ++c
 ===> see so-called "restricted productions":
      the space cannot be replaced by a newline in the following expressions:
        e ++, e --, continue e, break e, return e, throw e
 */

/*
 TODO:
 - Create test case for the following:

    let rec f = (x, y) => 1
    and z = Some((f, "Second Part Of Tuple:"));

    switch (z) {
    | None => ()
    | Some((f, str)) => ReactPrint.printSection(str ++ string_of_int(f(0, 0)))
    };

  Which generates the following: A closure function which also has an
  identifier and uses that identifier. Both the `f` and the `_eJ_` are in
  scope inside of the closure, but only f is in scope outside the closure.

     let f = function _eJ_(_eH_,_eI_) {
       return  _eJ_.fun(_eH_,_eI_)
     };
     let k=[];
     let  _c$_=1;
     caml_update_dummy(f, function(x,y) {return 1});
     caml_update_dummy(z,[0,[0,f,_da_]]);

 - Grabbing methods and then calling them likely doesn't work
 $f=$String->fromCharCode; (Only matters for stdlib).
 - Single quotes don't escape dollar signs, but don't escape anything including
 \0. For single quoted strings, we need to escape all backslashes with \\. This
 is implemented but add test cases.
 - Fix floats and ints. Try to kep them in their proper form as much as
 possible.
 - Consider restoring context in try catch/finally.
 - Return EFun doesn't annotate global info or lexical info.
 - Mark Used Variables.
 - Instanceof
 - Escape dollar signs in strings (single quoted strings are closer).
   - Update: it's easier to use double quotes, then escape dollar signs than it
   is to use single quotes and escape..
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
 - TODO: Relax arg count requirement when "newing" and calling F() functions.

   JS: x && y
   Php: x ? y : x;

   JS: x || y;
   Php: x ? x : y;

 */

/* Understanding Php/Hack References:
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
   */

/**
 * Redundantly coppied from the JS implementation, but it has deviated because
 * in PHP, we can't compile integer `1000` to `1e3` because `1e3` !== `1000`.
 */
let string_of_number_php = v =>
  if (v == infinity) {
    "Infinity";
  } else if (v == neg_infinity) {
    "-Infinity";
  } else if (v != v) {
    "NaN";
  } else if
    /* [1/-0] = -inf seems to be the only way to detect -0 in JavaScript */
    (v == 0. && 1. /. v == neg_infinity) {
    "-0";
  } else {
    let vint = int_of_float(v);
    /* compiler 1000 into 1e3 */
    if (float_of_int(vint) == v) {
      Printf.sprintf("%d", vint);
    } else {
      let s1 = Printf.sprintf("%.12g", v);
      if (v == float_of_string(s1)) {
        s1;
      } else {
        let s2 = Printf.sprintf("%.15g", v);
        if (v == float_of_string(s2)) {
          s2;
        } else {
          Printf.sprintf("%.18g", v);
        };
      };
    };
  };

let stats = Debug.find("output");

/* In order to support lambdas for Php, we need to be able to refer to the
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
   */

open Php;

module PP = Pretty_print;

module Make = (D: {let source_map: option(Source_map.t);}) => {
  let temp_mappings = ref([]);

  let (push_mapping, get_file_index, get_name_index, source_map_enabled) = {
    let idx_files = ref(0);
    let idx_names = ref(0);
    let files = Hashtbl.create(17);
    let names = Hashtbl.create(17);
    switch (D.source_map) {
    | None => (((_, _) => ()), (_ => (-1)), (_ => (-1)), false)
    | Some(sm) =>
      List.iter(
        f => {
          Hashtbl.add(files, f, idx_files^);
          incr(idx_files);
        },
        List.rev(sm.Source_map.sources),
      );
      (
        ((pos, m) => temp_mappings := [(pos, m), ...temp_mappings^]),
        (
          file =>
            try(Hashtbl.find(files, file)) {
            | Not_found =>
              let pos = idx_files^;
              Hashtbl.add(files, file, pos);
              incr(idx_files);
              sm.Source_map.sources = [file, ...sm.Source_map.sources];
              pos;
            }
        ),
        (
          name =>
            try(Hashtbl.find(names, name)) {
            | Not_found =>
              let pos = idx_names^;
              Hashtbl.add(names, name, pos);
              incr(idx_names);
              sm.Source_map.names = [name, ...sm.Source_map.names];
              pos;
            }
        ),
        true,
      );
    };
  };

  let debug_enabled = Config.Flag.debuginfo();
  let output_debug_info = (f, loc) => {
    if (debug_enabled) {
      switch (loc) {
      | Loc.Pi({Parse_info.name: Some(file), line, col, _})
      | Pi({Parse_info.src: Some(file), line, col, _}) =>
        PP.non_breaking_space(f);
        PP.string(
          f,
          Format.sprintf("/*<<%s:%d %d>>*/", file, line + 1, col),
        );
        PP.non_breaking_space(f);
      | N => ()
      | U
      | Pi(_) =>
        PP.non_breaking_space(f);
        PP.string(f, "/*<<?>>*/");
        PP.non_breaking_space(f);
      };
    };
    if (source_map_enabled) {
      switch (loc) {
      | N => ()
      | U
      | Pi({Parse_info.src: None, _}) =>
        push_mapping(
          PP.pos(f),
          {
            Source_map.gen_line: (-1),
            gen_col: (-1),
            ori_source: (-1),
            ori_line: (-1),
            ori_col: (-1),
            ori_name: None,
          },
        )
      | Pi({Parse_info.src: Some(file), line, col, _}) =>
        push_mapping(
          PP.pos(f),
          {
            Source_map.gen_line: (-1),
            gen_col: (-1),
            ori_source: get_file_index(file),
            ori_line: line,
            ori_col: col,
            ori_name: None,
          },
        )
      };
    };
  };

  let output_debug_info_ident = (f, nm, v) =>
    if (source_map_enabled) {
      switch (Code.Var.get_loc(v)) {
      | None => ()
      | Some({Parse_info.src: Some(file), line, col, _}) =>
        push_mapping(
          PP.pos(f),
          {
            Source_map.gen_line: (-1),
            gen_col: (-1),
            ori_source: get_file_index(file),
            ori_line: line,
            ori_col: col,
            ori_name: Some(get_name_index(nm)),
          },
        )
      | Some(_) => ()
      };
    };

  /* Since functions are exclusively closures for now we don't need to deal
       with the case insensitivity of non-closures. Note that functions and
       identifiers have different naming environments.
       $ becomes ____
       _ remains _
       This leads to some conflicts if you happened to have named two variables:

         let myVariable____ = true;
         let myVariable$ = true;

       That's pretty unlikely and good enough for now. We can do a more thorough
       renaming later.
     */

  let escape_dollar_str = s => Stdlib.escape(s, '$', "\\$");

  let ident = f =>
    fun
    | Id.S({name, var: None}) => PP.string(f, name)
    | S({name, var: Some(v)}) => {
        output_debug_info_ident(f, name, v);
        PP.string(f, name);
      }
    | V(_v) => assert(false);

  let classIdent = f =>
    fun
    | Id.S({name, var: None}) => PP.string(f, name)
    | S({name, var: Some(v)}) => {
        output_debug_info_ident(f, name, v);
        PP.string(f, name);
      }
    | V(_v) => assert(false);

  /* TODO: Escape function identifiers. */
  /* let func_ident = f => */
  /*   fun */
  /*   | S({name, var: None}) => PP.string(f, name) */
  /*   | S({name, var: Some(v)}) => { */
  /*       output_debug_info_ident(f, name, v); */
  /*       PP.string(f, name); */
  /*     } */
  /*   | V(_v) => assert(false); */

  /* let opt_identifier = (f, i) => */
  /*   switch (i) { */
  /*   | None => () */
  /*   | Some(i) => */
  /*     PP.space(f); */
  /*     ident(f, i); */
  /*   }; */

  let rec formal_parameter_list = (f, l) =>
    switch (l) {
    | [] => ()
    | [i] =>
      PP.string(f, "dynamic");
      PP.non_breaking_space(f);
      ident(f, i)
    | [i, ...r] =>
      PP.string(f, "dynamic");
      PP.non_breaking_space(f);
      ident(f, i);
      PP.string(f, ",");
      PP.non_breaking_space(f);
      formal_parameter_list(f, r);
    };

  let rec formal_use_list = (f, l) =>
    switch (l) {
    | [] => ()
    | [i] => ident(f, i)
    | [i, ...r] =>
      ident(f, i);
      PP.string(f, ",");
      formal_use_list(f, r);
    };
  /*
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
   */

  let op_prec = op =>
    switch (op) {
    | Eq
    | StarEq
    | SlashEq
    | ModEq
    | PlusEq
    | MinusEq
    | LslEq
    | AsrEq
    | BandEq
    | BxorEq
    | BorEq => (1, 13, 1)
    /*
       | Or -> 3, 3, 4
       | And -> 4, 4, 5
       | Bor -> 5, 5, 6
       | Bxor -> 6, 6, 7
       | Band -> 7, 7, 8
     */
    | Or => (3, 3, 3)
    | And => (4, 4, 4)
    | Bor => (5, 5, 5)
    | Bxor => (6, 6, 6)
    | Band => (7, 7, 7)
    | EqEq
    | NotEq
    | EqEqEq
    | NotEqEq => (8, 8, 9)
    | Gt
    | Ge
    | Lt
    | Le
    /* Won't even be rendered infix. */
    | InstanceOf
    | In => (9, 9, 10)
    | Lsl
    | Asr => (10, 10, 11)
    /* http://php.net/manual/en/language.operators.precedence.php */
    | FloatPlus
    | IntPlus
    | Plus
    | StrPlus
    | Minus => (11, 11, 12)
    | Mul
    | Div
    | Mod => (12, 12, 13)
    };

  let op_str = op =>
    switch (op) {
    | Eq => "="
    | StarEq => "*="
    | SlashEq => "/="
    | ModEq => "%="
    | PlusEq => "+="
    | MinusEq => "-="
    | Or => "||"
    | And => "&&"
    | Bor => "|"
    | Bxor => "^"
    | Band => "&"
    | EqEq => "=="
    | NotEq => "!="
    | EqEqEq => "==="
    | NotEqEq => "!=="
    | LslEq => "<<="
    | AsrEq => ">>="
    | BandEq => "&="
    | BxorEq => "^="
    | BorEq => "|="
    | Lt => "<"
    | Le => "<="
    | Gt => ">"
    | Ge => ">="
    | Lsl => "<<"
    | Asr => ">>"
    | FloatPlus => "+"
    | IntPlus => "+"
    | StrPlus => "."
    /*
     * TODO: Php should only have numeric plus and string plus. Rehp can keep
     * the distinction between all of them.
     */
    | Plus => "."
    | Minus => "-"
    | Mul => "*"
    | Div => "/"
    | Mod => "%"
    | InstanceOf
    | In => assert(false)
    };

  let unop_str = op =>
    switch (op) {
    | ToInt => "(int)"
    | Not => "!"
    | Neg => "-"
    | Pl => "+"
    | Bnot => "~"
    | IncrA
    | IncrB
    | DecrA
    | DecrB
    | Typeof
    | Void
    | Delete => assert(false)
    };

  /*XXX May need to be updated... */
  /* let rec ends_with_if_without_else st = */
  /*   match fst st with */
  /*   | If_statement (_, _, Some st) */
  /*   | While_statement (_, st) */
  /*   | For_statement (_, _, _, st) */
  /*   | ForIn_statement (_, _, st) -> */
  /*     ends_with_if_without_else st */
  /*   | If_statement (_, _, None) -> */
  /*     true */
  /*   | _ -> */
  /*     false */

  let rec need_paren = (l, e) =>
    switch (e) {
    | ERaw(_) => true
    | ENULL => false
    | ECond(e, _, _) => l <= 2 && need_paren(3, e)
    /*
     * Instanceof is just a function call now.
     * TODO: Eliminate this in a prepass stage.
     */
    | EBin(Asr, e, _)
    | EBin(Lsl, e, _)
    | EBin(InstanceOf, e, _) => l <= 15 && need_paren(15, e)
    | EBin(op, e, _) =>
      let (out, lft, _rght) = op_prec(op);
      l <= out && need_paren(lft, e);
    | EArrLen(e) /* Since EArrLen is just expanded to a EDot */
    | ECall(e, _, _)
    | EAccess(e, _)
    | EStructAccess(e, _)
    | EArrAccess(e, _)
    | EDot(e, _) => l <= 15 && need_paren(15, e)
    | EStruct(_) /* Since structs are now calls to functions */
    | ETag(_) /* Since ETag is expanded to function call. */
    | EArr(_) => false /* printed as [] */
    | EVar(_)
    | EStr(_)
    | EBool(_)
    | ENum(_)
    | EInt(_)
    | EQuote(_)
    | ERegexp(_)
    | EUn(_)
    | ENew(_) => false
    | EFun(_)
    | ELam(_)
    | EObj(_) => true
    };

  let best_string_quote = _ => '"';

  let array_str1 = Array.init(256, i => String.make(1, Char.chr(i)));
  let array_conv =
    Array.init(16, i => String.make(1, "0123456789abcdef".[i]));

  let pp_string = (f, ~quote='"', ~utf=false, s) => {
    let quote_s = String.make(1, quote);
    PP.string(f, quote_s);
    let l = String.length(s);
    for (i in 0 to l - 1) {
      let c = s.[i];
      switch (c) {
      | '\000' when i == l - 1 || s.[i + 1] < '0' || s.[i + 1] > '9' =>
        PP.string(f, "\\0")
      | '\b' => PP.string(f, "\\b")
      | '\t' => PP.string(f, "\\t")
      | '\n' => PP.string(f, "\\n")
      /* This escape sequence is not supported by IE < 9
            | '\011' -> "\\v"
         */
      | '\012' => PP.string(f, "\\f")
      | '\\' when !utf => PP.string(f, "\\\\")
      | '\r' => PP.string(f, "\\r")
      | '\000'..'\031'
      | '\127' =>
        let c = Char.code(c);
        PP.string(f, "\\x");
        PP.string(f, Array.unsafe_get(array_conv, c lsr 4));
        PP.string(f, Array.unsafe_get(array_conv, c land 15));
      | '\128'..'\255' when !utf =>
        let c = Char.code(c);
        PP.string(f, "\\x");
        PP.string(f, Array.unsafe_get(array_conv, c lsr 4));
        PP.string(f, Array.unsafe_get(array_conv, c land 15));
      | _ =>
        if (c == quote) {
          PP.string(f, "\\");
          PP.string(f, Array.unsafe_get(array_str1, Char.code(c)));
        } else {
          PP.string(f, Array.unsafe_get(array_str1, Char.code(c)));
        }
      };
    };
    PP.string(f, quote_s);
  };

  let rec expression = (l, f, e) =>
    switch (e) {
    | ERaw(s) =>
      /* Non breaking space because what if this is on the rhs of a return? */
      PP.non_breaking_space(f);
      PP.string(f, s);
      PP.non_breaking_space(f);
    | ENULL => PP.string(f, "null")
    | EVar(v) => ident(f, v)
    /* JS:  (e1, e2)
     * Php: ((e1 || true) ? e2 : e2)
     */
    /* I'm not sure if this is necessary any more. */
    | EArrLen(e) =>
      let len_check = EDot(e, "length");
      expression(l, f, len_check);
    | ELam((_i, ll, b, gv, fv, pc)) =>
      printFunction(~isLambda=true, f, l, ll, b, gv, fv, pc)
    | EFun((_i, ll, b, gv, fv, pc)) =>
      printFunction(~isLambda=false, f, l, ll, b, gv, fv, pc)
    | ECall(e, el, loc) =>
      if (l > 15) {
        PP.start_group(f, 1);
        PP.string(f, "(");
      };
      PP.start_group(f, 0);
      output_debug_info(f, loc);
      expression(15, f, e);
      PP.start_group(f, 0);
      PP.string(f, "(");
      PP.start_group(f, 2);
      PP.break(f);
      arguments(f, el);
      PP.end_group(f);
      PP.break(f);
      PP.string(f, ")");
      PP.end_group(f);
      if (l > 15) {
        PP.string(f, ")");
        PP.end_group(f);
      };
      PP.end_group(f);
    | EStr(s, kind) =>
      let quote = best_string_quote(s);
      pp_string(f, ~utf=kind == `Utf8, ~quote, escape_dollar_str(s));
    | EBool(b) => PP.string(f, if (b) {"true"} else {"false"})
    | ENum(v) =>
      let s = string_of_number_php(v);
      let need_parent =
        if (s.[0] == '-') {
          l > 13;
        } else {
          /* Negative numbers may need to be parenthesized. */
          l == 15  /* Parenthesize as well when followed by a dot. */
          && s.[0] != 'I'  /* Infinity */
          && s.[0] != 'N';
        }; /* NaN */

      if (need_parent) {
        PP.string(f, "(");
      };
      PP.string(f, s);
      if (need_parent) {
        PP.string(f, ")");
      };
    | EInt(v) => PP.string(f, string_of_int(v))
    | EUn(Typeof, e) =>
      if (l > 13) {
        PP.start_group(f, 1);
        PP.string(f, "(");
      };
      PP.start_group(f, 0);
      PP.string(f, "typeof(");
      expression(13, f, e);
      PP.end_group(f);
      PP.string(f, ")");
      if (l > 13) {
        PP.string(f, ")");
        PP.end_group(f);
      };
    | EUn(Void, e) =>
      if (l > 13) {
        PP.start_group(f, 1);
        PP.string(f, "(");
      };
      PP.start_group(f, 0);
      PP.string(f, "void");
      PP.space(f);
      expression(13, f, e);
      PP.end_group(f);
      if (l > 13) {
        PP.string(f, ")");
        PP.end_group(f);
      };
    | EUn(Delete, e) =>
      let ident = Id.ident("unset");
      let call = ECall(EVar(ident), [e], Loc.N);
      expression(l, f, call);
    | EUn((IncrA | DecrA | IncrB | DecrB) as op, e) =>
      if (l > 13) {
        PP.start_group(f, 1);
        PP.string(f, "(");
      };
      if (op == IncrA || op == DecrA) {
        expression(13, f, e);
      };
      if (op == IncrA || op == IncrB) {
        PP.string(f, "++");
      } else {
        PP.string(f, "--");
      };
      if (op == IncrB || op == DecrB) {
        expression(13, f, e);
      };
      if (l > 13) {
        PP.string(f, ")");
        PP.end_group(f);
      };
    | EUn(op, e) =>
      if (l > 13) {
        PP.start_group(f, 1);
        PP.string(f, "(");
      };
      PP.string(f, unop_str(op));
      PP.space(f);
      expression(13, f, e);
      if (l > 13) {
        PP.string(f, ")");
        PP.end_group(f);
      };
    | EBin(InstanceOf, e1, e2) =>
      /*
       * TODO: Perform this transform in a prepass on all code.
       * THIS IS COPY/PASTED FROM ECall for now. Remove InstanceOf as Php
       * output.
       */
      render_global_call(f, l, "instance_of", [e1, e2])
    | EBin(In, e1, e2) =>
      let (out, lft, rght) = op_prec(InstanceOf);
      if (l > out) {
        PP.start_group(f, 1);
        PP.string(f, "(");
      };
      PP.start_group(f, 0);
      expression(lft, f, e1);
      PP.space(f);
      PP.string(f, "in");
      PP.space(f);
      expression(rght, f, e2);
      PP.end_group(f);
      if (l > out) {
        PP.string(f, ")");
        PP.end_group(f);
      };
    | EBin(op, e1, e2) =>
      let (out, lft, rght) = op_prec(op);
      if (l > out) {
        PP.start_group(f, 1);
        PP.string(f, "(");
      };
      expression(lft, f, e1);
      PP.non_breaking_space(f);
      PP.string(f, op_str(op));
      PP.start_group(f, 2);
      PP.space(f);
      expression(rght, f, e2);
      PP.end_group(f);
      if (l > out) {
        PP.string(f, ")");
        PP.end_group(f);
      };
    | EStruct(el) =>
      PP.start_group(f, 0);
      PP.string(f, "Vector{");
      PP.start_group(f, 2);
      PP.break(f);
      arguments(f, el);
      PP.end_group(f);
      PP.break(f);
      PP.string(f, "}");
      PP.end_group(f);
    | ETag(tag, el) =>
      PP.start_group(f, 0);
      PP.string(f, "Vector{");
      PP.start_group(f, 2);
      PP.break(f);
      arguments(f, [tag, ...el]);
      PP.end_group(f);
      PP.break(f);
      PP.string(f, "}");
      PP.end_group(f);
    /* Arrays can be generated by generate.ml or occur from parsing stubs */
    /* TODO: This can assert(false) becahse Identifier_renaming_php would have
     * already converted this to plain function calls. */
    | EArr(el) =>
      PP.start_group(f, 0);
      output_debug_info(f, Loc.N);
      PP.string(f, "varray[");
      PP.start_group(f, 2);
      PP.break(f);
      elements_as_args(f, el);
      PP.end_group(f);
      PP.break(f);
      PP.string(f, "]");
      PP.end_group(f);
    | EAccess(e, e')
    | EStructAccess(e, e')
    | EArrAccess(e, e') =>
      if (l > 15) {
        PP.start_group(f, 1);
        PP.string(f, "(");
      };
      PP.start_group(f, 1);
      expression(15, f, e);
      PP.string(f, "[");
      PP.start_group(f, 2);
      PP.break(f);
      expression(0, f, e');
      PP.end_group(f);
      PP.break(f);
      PP.string(f, "]");
      PP.end_group(f);
      if (l > 15) {
        PP.string(f, ")");
        PP.end_group(f);
      };
    | EDot(e, nm) =>
      /* No need for paren grouping, -> binds the most tightly. */
      /* if l > 15 then begin PP.start_group f 1; PP.string f "(" end; */
      expression(15, f, e);
      PP.string(f, "->");
      PP.string(f, nm);
    /* if l > 15 then begin PP.string f ")"; PP.end_group f end */
    | ENew(e, args) =>
      /*FIX: should omit parentheses when possible*/
      if (l > 13) {
        PP.start_group(f, 1);
        PP.string(f, "(");
      };
      PP.start_group(f, 1);
      PP.string(f, "new");
      PP.space(f);
      switch (e) {
      | EVar(identifier) => classIdent(f, identifier)
      | _ => expression(16, f, e)
      };
      switch (args) {
      | Some(args) =>
        PP.string(f, "(");
        PP.start_group(f, 2);
        PP.break(f);
        arguments(f, args);
        PP.end_group(f);
        PP.break(f);
        PP.string(f, ")");
      | None => PP.string(f, "()")
      };
      PP.end_group(f);
      if (l > 13) {
        PP.string(f, ")");
        PP.end_group(f);
      };
    | ECond(e, e1, e2) =>
      if (l > 2) {
        PP.start_group(f, 1);
        PP.string(f, "(");
      };
      PP.start_group(f, 1);
      PP.start_group(f, 0);
      expression(3, f, e);
      PP.end_group(f);
      PP.break(f);
      PP.start_group(f, 0);
      PP.non_breaking_space(f);
      PP.string(f, "?");
      PP.non_breaking_space(f);
      expression(1, f, e1);
      PP.end_group(f);
      PP.break(f);
      PP.start_group(f, 0);
      PP.non_breaking_space(f);
      PP.string(f, ":");
      PP.non_breaking_space(f);
      PP.string(f, "(");
      expression(1, f, e2);
      PP.string(f, ")");
      PP.end_group(f);
      PP.end_group(f);
      if (l > 2) {
        PP.string(f, ")");
        PP.end_group(f);
      };
    /*
     * This isn't actually a PHP construct.
     */
    | EObj(lst) =>
      PP.start_group(f, 1);
      PP.string(f, "darray[");
      PP.break(f);
      property_name_and_value_list(f, lst);
      PP.string(f, "]");
      PP.end_group(f);
    | ERegexp(s, opt) =>
      /* PP.string f "/";PP.string f s;PP.string f "/"; */
      PP.string(f, "(new Regex('" ++ s ++ "'");
      switch (opt) {
      | None => PP.string(f, "))")
      | Some(o) =>
        PP.string(f, ", '" ++ o ++ "'");
        PP.string(f, "))");
      };
    | EQuote(s) =>
      PP.string(f, "(");
      PP.string(f, s);
      PP.string(f, ")");
    }
  and printFunction = (~isLambda, f, l, ll, b, gv, fv, pc) => {
    if (l > 14) {
      PP.start_group(f, 1);
      PP.string(f, "(");
    };
    PP.start_group(f, 0);
    PP.start_group(f, 0);
    PP.start_group(f, 0);

    /*
     * We can make first class functions trivial to convert into Hack lambdas
     * via sed/regex. We'll interleave comments to be used as replacement
     * markers.
     * Replace /**/function with empty string
     * Replace /**/ .* /*==>*/ with ==>
     *
     *    /**/function(arg, list) /**/use(use, list) /*==>*/ {  }
     *                (arg, list)                      ==>  {  }
     */
    if (!isLambda) {
      PP.string(f, "function");
    };
    /* Function expressions don't have names in Php */
    /* opt_identifier f i; */
    PP.end_group(f);
    PP.break(f);
    PP.start_group(f, 1);
    PP.string(f, "(");
    formal_parameter_list(f, ll);
    PP.string(f, ")");
    PP.end_group(f);
    PP.end_group(f);
    if (!isLambda) {
      function_use(f, fv);
    };
    PP.non_breaking_space(f);
    if (!isLambda) {
      PP.string(f, "{");
    } else {
      PP.string(f, " ==> {");
    };
    PP.start_group(f, 2);
    PP.break(f);
    function_globals(f, gv);
    function_body(f, b);
    output_debug_info(f, pc);
    PP.end_group(f);
    PP.break(f);
    PP.string(f, "}");
    PP.end_group(f);
    if (l > 14) {
      PP.string(f, ")");
      PP.end_group(f);
    };
  }
  and render_global_call = (f, l, name, args) => {
    if (l > 15) {
      PP.start_group(f, 1);
      PP.string(f, "(");
    };
    PP.start_group(f, 1);
    PP.string(f, name);
    PP.break(f);
    PP.start_group(f, 1);
    PP.string(f, "(");
    arguments(f, args);
    PP.string(f, ")");
    PP.end_group(f);
    PP.end_group(f);
    if (l > 15) {
      PP.string(f, ")");
      PP.end_group(f);
    };
  }
  and jsUndefinedName = "null"
  and expression_or_undefined = (l, f, e) =>
    switch (e) {
    | None => PP.string(f, "/*undefined*/ " ++ jsUndefinedName)
    | Some(ee) => expression(l, f, ee)
    }
  and property_name = (f, n) =>
    switch (n) {
    | Id.PNI(s) =>
      let quote = best_string_quote(s);
      pp_string(f, ~utf=true, ~quote, s);
    | PNS(s) =>
      let quote = best_string_quote(s);
      pp_string(f, ~utf=true, ~quote, s);
    | PNN(v) => expression(0, f, ENum(v))
    }
  and property_name_and_value_list = (f, l) =>
    switch (l) {
    | [] => ()
    | [(pn, e)] =>
      PP.start_group(f, 0);
      property_name(f, pn);
      PP.string(f, "=>");
      PP.break(f);
      expression(1, f, e);
      PP.end_group(f);
    | [(pn, e), ...r] =>
      PP.start_group(f, 0);
      property_name(f, pn);
      PP.string(f, "=>");
      PP.break(f);
      expression(1, f, e);
      PP.end_group(f);
      PP.string(f, ",");
      PP.break(f);
      property_name_and_value_list(f, r);
    }
  /* and element_list f el = */
  /*   match el with */
  /*     []     -> */
  /*     () */
  /*   | [e]    -> */
  /*     begin match e with */
  /*         None   -> PP.string f "," */
  /*       | Some e -> PP.start_group f 0; expression 1 f e; PP.end_group f */
  /*     end */
  /*   | e :: r -> */
  /*     begin match e with */
  /*         None   -> () */
  /*       | Some e -> PP.start_group f 0; expression 1 f e; PP.end_group f */
  /*     end; */
  /*     PP.string f ","; PP.break f; element_list f r */
  /* In Php, you cannot omit the final semi */
  and function_use = (f, fv) =>
    switch (fv) {
    | [_, ..._] =>
      PP.string(f, " use (");
      formal_use_list(f, fv);
      PP.string(f, ")");
    | _ => ()
    }
  and global_statement = (f, id) => {
    PP.string(f, "global ");
    ident(f, id);
    PP.string(f, ";");
    PP.break(f);
  }
  and function_globals = (f, global_vars) =>
    switch (global_vars) {
    | [_, ..._] => List.iter(global_statement(f), global_vars)
    | _ => ()
    }
  and function_body = (f, b) =>
    source_elements(f, ~skip_last_semi=false, ~spaced=false, b)
  and arguments = (f, l) =>
    switch (l) {
    | [] => ()
    | [e] => expression(1, f, e)
    | [e, ...r] =>
      expression(1, f, e);
      PP.string(f, ",");
      PP.space(f);
      arguments(f, r);
    }
  /*
   * TODO: Remove ability to omit args (consistent with PHP).
   */
  and elements_as_args = (f, l) =>
    switch (l) {
    | [] => ()
    | [e] =>
      PP.start_group(f, 0);
      expression_or_undefined(1, f, e);
      PP.end_group(f);
    | [e, ...r] =>
      PP.start_group(f, 0);
      expression_or_undefined(1, f, e);
      PP.end_group(f);
      PP.string(f, ",");
      PP.break(f);
      elements_as_args(f, r);
    }
  and variable_declaration = (f, v) =>
    switch (v) {
    | (EVar(i), None) => ident(f, i)
    | (e, None) => expression(1, f, e)
    | (EVar(i), Some((e, pc))) =>
      PP.start_group(f, 0);
      output_debug_info(f, pc);
      ident(f, i);
      PP.non_breaking_space(f);
      PP.string(f, "=");
      PP.non_breaking_space(f);
      expression(1, f, e);
      PP.end_group(f);
    | (e1, Some((e2, pc))) =>
      PP.start_group(f, 0);
      expression(1, f, e1);
      PP.non_breaking_space(f);
      PP.string(f, "=");
      PP.non_breaking_space(f);
      expression(1, f, e2);
      PP.end_group(f);
    }
  and variable_declaration_list_aux = (~separator, f, l) =>
    switch (l) {
    | [] => assert(false)
    | [d] => variable_declaration(f, d)
    | [d, ...r] =>
      variable_declaration(f, d);
      PP.string(f, separator);
      PP.break(f);
      variable_declaration_list_aux(~separator, f, r);
    }
  and variable_declaration_list = (~separator, close, f) =>
    fun
    | [] => ()
    | [(EVar(i), None)] => {
        PP.start_group(f, 0);
        ident(f, i);
        if (close) {
          PP.string(f, ";");
        };
        PP.end_group(f);
      }
    | [(e, None)] => {
        PP.start_group(f, 0);
        expression(1, f, e);
        if (close) {
          PP.string(f, ";");
        };
        PP.end_group(f);
      }
    | [(EVar(i), Some((e, pc)))] => {
        PP.start_group(f, 0);
        output_debug_info(f, pc);
        ident(f, i);
        PP.non_breaking_space(f);
        PP.string(f, "=");
        PP.non_breaking_space(f);
        PP.start_group(f, 0);
        expression(1, f, e);
        if (close) {
          PP.string(f, ";");
        };
        PP.end_group(f);
        PP.end_group(f);
      }
    | [(e1, Some((e2, pc)))] => {
        PP.start_group(f, 0);
        output_debug_info(f, pc);
        expression(1, f, e1);
        PP.non_breaking_space(f);
        PP.string(f, "=");
        PP.non_breaking_space(f);
        PP.start_group(f, 0);
        expression(1, f, e2);
        if (close) {
          PP.string(f, ";");
        };
        PP.end_group(f);
        PP.end_group(f);
      }
    | l => {
        PP.start_group(f, 0);
        variable_declaration_list_aux(~separator, f, l);
        if (close) {
          PP.string(f, ";");
        };
        PP.end_group(f);
      }
  and opt_expression = (l, f, e) =>
    switch (e) {
    | None => ()
    | Some(e) => expression(l, f, e)
    }
  and statement = (~last=false, f, (s, loc)) => {
    let last_semi = () =>
      if (last) {
        ();
      } else {
        PP.string(f, ";");
      };
    output_debug_info(f, loc);
    switch (s) {
    | Raw_statement(s) =>
      PP.break(f);
      PP.string(f, s);
      PP.break(f);
    | Block(b) => block(f, b)
    | Statement_list(b) =>
      PP.start_group(f, 0);
      statement_list(~skip_last_semi=false, f, b);
      PP.end_group(f);
    | Variable_statement(l) =>
      variable_declaration_list(~separator=";", !last, f, l)
    | Empty_statement => PP.string(f, ";")
    | Debugger_statement =>
      PP.string(f, "debugger");
      last_semi();
    | Global_statement(id) => global_statement(f, id)
    | Expression_statement(EVar(_)) => last_semi()
    | Expression_statement(e) =>
      /* Parentheses are required when the expression
         starts syntactically with "{" or "function" */
      if (need_paren(0, e)) {
        PP.start_group(f, 1);
        PP.string(f, "(");
        expression(0, f, e);
        PP.string(f, ")");
        last_semi();
        PP.end_group(f);
      } else {
        PP.start_group(f, 0);
        expression(0, f, e);
        last_semi();
        PP.end_group(f);
      }
    /* We need to always use block printing for ifs because semicolons are used
        to separate multiple variable declarations in Php, and so the following would
        not parse how you would expect:

           if (something) $x=0; $y=0;

       */
    /* | If_statement (e, s1, (Some _ as s2)) when ends_with_if_without_else s1 -> */
    /*   (* Dangling else issue... *) */
    /*   statement ~last f (If_statement (e, (Block ([s1]), N), s2), N) */
    | If_statement(e, s1, Some(s2), elseif) =>
      /* Force there to be a block to avoid a bunch of edge cases with semicolons and newlines. */
      let block_one =
        switch (s1) {
        | (Block(_), _loc) => s1
        | _ => (Block([s1]), N)
        };
      let block_two =
        switch (s2, elseif) {
        | ((Block(_), _loc), _)
        | ((If_statement(_), _loc), true) => s2
        | _ => (Block([s2]), N)
        };
      PP.start_group(f, 0);
      PP.string(f, "if");
      PP.non_breaking_space(f);
      PP.string(f, "(");
      PP.start_group(f, 2);
      PP.break(f);
      expression(0, f, e);
      PP.end_group(f);
      PP.break(f);
      PP.string(f, ")");
      PP.non_breaking_space(f);
      PP.end_group(f);
      PP.start_group(f, 0);
      statement(f, block_one);
      PP.end_group(f);
      PP.break(f);
      PP.string(f, "else");
      PP.non_breaking_space(f);
      PP.start_group(f, 0);
      statement(~last, f, block_two);
      PP.end_group(f);
    | If_statement(e, s1, None, _) =>
      let block_one =
        switch (s1) {
        | (Block(_), _loc) => s1
        | _ => (Block([s1]), N)
        };
      PP.start_group(f, 0);
      PP.start_group(f, 0);
      PP.string(f, "if");
      PP.non_breaking_space(f);
      PP.string(f, "(");
      PP.start_group(f, 2);
      PP.break(f);
      expression(0, f, e);
      PP.end_group(f);
      PP.break(f);
      PP.string(f, ")");
      PP.non_breaking_space(f);
      PP.end_group(f);
      PP.start_group(f, 0);
      statement(~last, f, block_one);
      PP.end_group(f);
      PP.end_group(f);
    | While_statement(e, s) =>
      PP.start_group(f, 1);
      PP.start_group(f, 0);
      PP.string(f, "while");
      PP.break(f);
      PP.start_group(f, 1);
      PP.string(f, "(");
      expression(0, f, e);
      PP.string(f, ")");
      PP.non_breaking_space(f);
      PP.end_group(f);
      PP.end_group(f);
      PP.start_group(f, 0);
      statement(~last, f, s);
      PP.end_group(f);
      PP.end_group(f);
    | Do_while_statement((Block(_), _) as s, e) =>
      PP.start_group(f, 0);
      PP.string(f, "do");
      PP.non_breaking_space(f);
      PP.start_group(f, 0);
      statement(f, s);
      PP.end_group(f);
      PP.break(f);
      PP.string(f, "while");
      PP.break1(f);
      PP.start_group(f, 1);
      PP.string(f, "(");
      expression(0, f, e);
      PP.string(f, ")");
      last_semi();
      PP.end_group(f);
      PP.end_group(f);
    | Do_while_statement(s, e) =>
      PP.start_group(f, 0);
      PP.string(f, "do");
      PP.space(~indent=1, f);
      PP.start_group(f, 0);
      statement(f, s);
      PP.end_group(f);
      PP.break(f);
      PP.string(f, "while");
      PP.break(f);
      PP.start_group(f, 1);
      PP.string(f, "(");
      expression(0, f, e);
      PP.string(f, ")");
      last_semi();
      PP.end_group(f);
      PP.end_group(f);
    | For_statement(e1, e2, e3, s) =>
      PP.start_group(f, 0);
      PP.start_group(f, 0);
      PP.string(f, "for");
      PP.non_breaking_space(f);
      PP.string(f, "(");
      PP.start_group(f, 2);
      PP.break(f);
      switch (e1) {
      | Left(e) => opt_expression(0, f, e)
      | Right(l) => variable_declaration_list(~separator=",", false, f, l)
      };
      PP.string(f, ";");
      PP.break(f);
      opt_expression(0, f, e2);
      PP.string(f, ";");
      PP.break(f);
      opt_expression(0, f, e3);
      PP.end_group(f);
      PP.break(f);
      PP.string(f, ")");
      PP.end_group(f);
      PP.start_group(f, 0);
      PP.non_breaking_space(f);
      statement(~last, f, s);
      PP.end_group(f);
      PP.end_group(f);
    | ForIn_statement(e1, e2, s) =>
      PP.start_group(f, 0);
      PP.start_group(f, 0);
      PP.string(f, "foreach");
      PP.string(f, "(");
      PP.start_group(f, 2);
      PP.break(f);
      expression(0, f, ECall(EDot(e2, "__all_enumerable_keys"), [], Loc.N));
      PP.space(f);
      PP.string(f, "as");
      PP.break(f);
      PP.space(f);
      switch (e1) {
      | Left(e) => expression(0, f, e)
      | Right(v) => variable_declaration_list(~separator=",", false, f, [v])
      };
      PP.string(f, "=> $____");
      PP.end_group(f);
      PP.break(f);
      PP.string(f, ")");
      PP.non_breaking_space(f);
      PP.end_group(f);
      PP.start_group(f, 0);
      statement(~last, f, s);
      PP.end_group(f);
      PP.end_group(f);
    | Continue_statement =>
      PP.string(f, "continue");
      last_semi();
    | Break_statement =>
      PP.string(f, "break");
      last_semi();
    | Return_statement(e) =>
      switch (e) {
      | None =>
        PP.string(f, "return");
        last_semi();
      | Some(e) =>
        PP.start_group(f, 0);
        PP.string(f, "return");
        PP.non_breaking_space(f);
        PP.start_group(f, 0);
        expression(0, f, e);
        last_semi();
        PP.end_group(f);
        PP.end_group(f);
      /* There MUST be a space between the return and its
         argument. A line return will not work */
      }
    | Switch_statement(e, cc, def, cc') =>
      PP.start_group(f, 0);
      PP.start_group(f, 0);
      PP.string(f, "switch");
      PP.string(f, "(");
      PP.start_group(f, 2);
      PP.break(f);
      expression(0, f, e);
      PP.end_group(f);
      PP.break(f);
      PP.string(f, ")");
      PP.end_group(f);
      PP.non_breaking_space(f);
      PP.string(f, "{");
      PP.start_group(f, 2);
      PP.break(f);
      let output_one = (_last, (e, sl)) => {
        PP.string(f, "// FALLTHROUGH");
        PP.break(f);
        PP.start_group(f, 0);
        PP.string(f, "case");
        PP.space(f);
        expression(0, f, e);
        PP.string(f, ":");
        PP.end_group(f);
        PP.start_group(f, 2);
        PP.break(f);
        statement_list(~skip_last_semi=false, f, sl);
        PP.end_group(f);
        PP.break(f);
      };
      let rec loop = last => (
        fun
        | [] => ()
        | [x] => output_one(last, x)
        | [x, ...xs] => {
            output_one(false, x);
            loop(last, xs);
          }
      );
      loop(def == None && cc' == [], cc);
      switch (def) {
      | None => ()
      | Some(def) =>
        PP.string(f, "// FALLTHROUGH");
        PP.break(f);
        PP.start_group(f, 0);
        PP.string(f, "default:");
        PP.end_group(f);
        PP.start_group(f, 2);
        PP.break(f);
        statement_list(~skip_last_semi=false, f, def);
        PP.end_group(f);
        PP.break(f);
      };
      loop(true, cc');
      PP.end_group(f);
      /* Final case handles break */
      /* PP.break(f); */
      PP.string(f, "}");
      PP.end_group(f);
    | Throw_statement(e) =>
      PP.start_group(f, 6);
      PP.string(f, "throw");
      PP.non_breaking_space(f);
      PP.start_group(f, 0);
      expression(0, f, e);
      PP.string(f, " as \\Throwable");
      last_semi();
      PP.end_group(f);
      PP.end_group(f);
    /* There must be a space between the return and its
       argument. A line return would not work */
    | Try_statement(b, ctch, fin) =>
      PP.start_group(f, 0);
      PP.string(f, "try");
      PP.non_breaking_space(f);
      PP.start_group(f, 0);
      block(f, b);
      PP.end_group(f);
      switch (ctch) {
      | None => ()
      | Some((i, b)) =>
        PP.break(f);
        PP.start_group(f, 0);
        PP.string(f, "catch(\\Throwable ");
        ident(f, i);
        PP.string(f, ")");
        PP.non_breaking_space(f);
        PP.start_group(f, 0);
        block(f, b);
        PP.end_group(f);
        PP.end_group(f);
      };
      switch (fin) {
      | None => ()
      | Some(b) =>
        PP.break(f);
        PP.start_group(f, 1);
        PP.string(f, "finally");
        PP.space(f);
        block(f, b);
        PP.end_group(f);
      };
      PP.end_group(f);
    };
  }
  and statement_list = (f, ~skip_last_semi=?, b) =>
    switch (b) {
    | [] => ()
    | [s] => statement(f, ~last=?skip_last_semi, s)
    | [s, ...r] =>
      statement(f, s);
      PP.break(f);
      statement_list(f, ~skip_last_semi?, r);
    }
  and block = (f, b) => {
    PP.string(f, "{");
    PP.start_group(f, 2);
    PP.break(f);
    statement_list(~skip_last_semi=false, f, b);
    PP.end_group(f);
    PP.break(f);
    PP.string(f, "}");
  }
  /* Function declarations cannot nest in Php, so we need to turn nested
     function declarations into lambdas. is_export is true iff it is a top level
     declaration in the file's namespace. */
  /* TODO: All of this should be converted in a separate pass. */
  and source_element = (f, ~skip_last_semi=?, se) =>
    switch (se) {
    | (Statement(s), loc) => statement(f, ~last=?skip_last_semi, (s, loc))
    /*
     * TODO: These should be typical global functions in php. All lambdas would
     * be in EFun form and converted in Php_from_rehp.
     */
    | (Function_declaration((i, l, b, gv, fv, loc')), loc) => assert(false)
    /* let lam = EFun((None, l, b, gv, fv, loc')); */
    /* /* Maybe this final J.N needs to be changed. */ */
    /* let as_var = Variable_statement([(i, Some((lam, Loc.N)))]); */
    /* statement(f, ~last=?skip_last_semi, (as_var, loc)); */
    }
  and source_elements = (f, ~skip_last_semi=?, ~spaced, se) =>
    switch (se) {
    | [] => ()
    | [s] => source_element(f, ~skip_last_semi?, s)
    | [s, ...r] =>
      source_element(f, s);
      switch (spaced, s, r) {
      | (false, _, _)
      | (
          _,
          (Statement(Variable_statement(_)), _),
          [(Statement(Variable_statement(_)), _), ..._],
        ) =>
        PP.break(f)
      | _ =>
        PP.break(f);
        PP.break(f);
      };
      source_elements(f, ~skip_last_semi?, ~spaced, r);
    }
  and program = (f, s) => source_elements(f, ~spaced=true, s);
};

let part_of_ident = {
  let a =
    Array.init(
      256,
      i => {
        let c = Char.chr(i);
        c >= 'a'
        && c <= 'z'
        || c >= 'A'
        && c <= 'z'
        || c >= '0'
        && c <= '9'
        || c == '_'
        || c == '$';
      },
    );
  c => Array.unsafe_get(a, Char.code(c));
};

let need_space = (a, b) =>
  /* do not concat 2 differant identifier */
  part_of_ident(a)
  && part_of_ident(b)
  /* do not generate end_of_line_comment.
     handle the case of "num / /* comment */ b " */
  || a == '/'
  && b == '/'
  /* https://github.com/ocsigen/js_of_ocaml/issues/507 */
  || a == '-'
  && b == '-';

let program = (f, ~custom_header=?, ~source_map=?, p) => {
  let smo =
    switch (source_map) {
    | None => None
    | Some((_, sm)) => Some(sm)
    };
  module O =
    Make({
      let source_map = smo;
    });
  PP.set_needed_space_function(f, need_space);
  PP.start_group(f, 0);
  O.program(f, p);
  PP.end_group(f);
  PP.newline(f);
  switch (custom_header) {
  | None => ()
  | Some((_hd, _indent, ft)) => PP.string(f, Printf.sprintf("%s", ft))
  };
  switch (source_map) {
  | None => ()
  | Some((out_file, sm)) =>
    let sm = {
      ...sm,
      Source_map.sources: List.rev(sm.Source_map.sources),
      Source_map.names: List.rev(sm.Source_map.names),
    };

    let sources = sm.Source_map.sources;
    let sources_content =
      switch (sm.Source_map.sources_content) {
      | None => None
      | Some([]) =>
        Some(
          List.map(
            file =>
              if (Sys.file_exists(file)) {
                let content = Fs.read_file(file);
                Some(content);
              } else {
                None;
              },
            sources,
          ),
        )
      | Some(_) => assert(false)
      };
    let mappings =
      List.map(
        ((pos, m)) =>
          {
            ...m,
            Source_map.gen_line: pos.PP.p_line,
            Source_map.gen_col: pos.PP.p_col,
          },
        O.temp_mappings^,
      );

    let sources =
      switch (sm.Source_map.sourceroot) {
      | None => sources
      | Some(root) =>
        let script_file =
          Filename.chop_extension(sm.Source_map.file)
          ++ ".make-sourcemap-links.sh";
        let oc = open_out(script_file);
        let printf = fmt => Printf.fprintf(oc, fmt);
        let targets = List.map(src => Filename.basename(src), sources);
        printf("#! /bin/bash\n");
        printf("mkdir -p %s\n", root);
        List.iter2(
          (src, tg) =>
            printf("ln -s %s %s\n", src, Filename.concat(root, tg)),
          sources,
          targets,
        );
        close_out(oc);
        Stdlib.warn(
          "Source-map info: run 'sh %s' to create links to sources in %s.\n%!",
          script_file,
          root,
        );
        targets;
      };

    let sm = {...sm, Source_map.sources, sources_content, mappings};
    let urlData =
      switch (out_file) {
      | None =>
        let data = Source_map_io.to_string(sm);
        "data:application/json;base64," ++ B64.encode(data);
      | Some(out_file) =>
        Source_map_io.to_file(sm, out_file);
        Filename.basename(out_file);
      };

    PP.newline(f);
    PP.string(f, Printf.sprintf("//# sourceMappingURL=%s\n", urlData));
  };
  if (stats()) {
    let size = i => Printf.sprintf("%.2fKo", float_of_int(i) /. 1024.);
    let _percent = (n, d) =>
      Printf.sprintf("%.1f%%", float_of_int(n) *. 100. /. float_of_int(d));
    let total_s = PP.total(f);
    Format.eprintf("total size : %s@.", size(total_s));
  };
};
