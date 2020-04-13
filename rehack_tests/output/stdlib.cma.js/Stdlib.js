/**
 * @flow strict
 * Stdlib
 */

// @ts-check


"use strict";

var runtime = require("../runtime/runtime.js");

function call1(f, a0) {
  return f.length === 1 ? f(a0) : runtime["caml_call_gen"](f, [a0]);
}

function call2(f, a0, a1) {
  return f.length === 2 ? f(a0, a1) : runtime["caml_call_gen"](f, [a0,a1]);
}

var caml_blit_string = runtime["caml_blit_string"];
var caml_create_bytes = runtime["caml_create_bytes"];
var caml_float_of_string = runtime["caml_float_of_string"];
var caml_int64_float_of_bits = runtime["caml_int64_float_of_bits"];
var caml_int_of_string = runtime["caml_int_of_string"];
var caml_ml_bytes_length = runtime["caml_ml_bytes_length"];
var caml_ml_channel_size = runtime["caml_ml_channel_size"];
var caml_ml_channel_size_64 = runtime["caml_ml_channel_size_64"];
var caml_ml_close_channel = runtime["caml_ml_close_channel"];
var caml_ml_flush = runtime["caml_ml_flush"];
var caml_ml_input = runtime["caml_ml_input"];
var caml_ml_input_char = runtime["caml_ml_input_char"];
var caml_ml_open_descriptor_in = runtime["caml_ml_open_descriptor_in"];
var caml_ml_open_descriptor_out = runtime["caml_ml_open_descriptor_out"];
var caml_ml_output = runtime["caml_ml_output"];
var caml_ml_output_bytes = runtime["caml_ml_output_bytes"];
var caml_ml_output_char = runtime["caml_ml_output_char"];
var caml_ml_set_binary_mode = runtime["caml_ml_set_binary_mode"];
var caml_ml_set_channel_name = runtime["caml_ml_set_channel_name"];
var caml_ml_string_length = runtime["caml_ml_string_length"];
var string = runtime["caml_new_string"];
var caml_string_notequal = runtime["caml_string_notequal"];
var caml_string_of_bytes = runtime["caml_string_of_bytes"];
var caml_sys_open = runtime["caml_sys_open"];
var caml_wrap_thrown_exception = runtime["caml_wrap_thrown_exception"];
var caml_wrap_thrown_exception_reraise = runtime
 ["caml_wrap_thrown_exception_reraise"];
var cst__0 = string("%,");
var cst_really_input = string("really_input");
var cst_input = string("input");
var cst_output_substring = string("output_substring");
var cst_output = string("output");
var cst_12g = string("%.12g");
var cst = string(".");
var cst_false__1 = string("false");
var cst_true__1 = string("true");
var cst_false__0 = string("false");
var cst_true__0 = string("true");
var cst_bool_of_string = string("bool_of_string");
var cst_true = string("true");
var cst_false = string("false");
var cst_char_of_int = string("char_of_int");
var cst_Stdlib_Exit = string("Stdlib.Exit");
var CamlinternalFormatBasics = require("./CamlinternalFormatBasics.js");
var Invalid_argument = require("../runtime/Invalid_argument.js");
var Failure = require("../runtime/Failure.js");
var Match_failure = require("../runtime/Match_failure.js");
var Assert_failure = require("../runtime/Assert_failure.js");
var Not_found = require("../runtime/Not_found.js");
var Out_of_memory = require("../runtime/Out_of_memory.js");
var Stack_overflow = require("../runtime/Stack_overflow.js");
var Sys_error = require("../runtime/Sys_error.js");
var End_of_file = require("../runtime/End_of_file.js");
var Division_by_zero = require("../runtime/Division_by_zero.js");
var Sys_blocked_io = require("../runtime/Sys_blocked_io.js");
var Undefined_recursive_module = require(
  "../runtime/Undefined_recursive_module.js"
);
var l_ = [0,0,[0,6,0]];
var k_ = [0,0,[0,7,0]];
var j_ = [0,1,[0,3,[0,4,[0,6,0]]]];
var i_ = [0,1,[0,3,[0,4,[0,7,0]]]];
var g_ = [0,1];
var h_ = [0,0];
var a_ = [255,0,0,32752];
var b_ = [255,0,0,65520];
var c_ = [255,1,0,32752];
var d_ = [255,16777215,16777215,32751];
var e_ = [255,0,0,16];
var f_ = [255,0,0,15536];

function failwith(s) {throw caml_wrap_thrown_exception([0,Failure,s]);}

function invalid_arg(s) {
  throw caml_wrap_thrown_exception([0,Invalid_argument,s]);
}

var Exit = [248,cst_Stdlib_Exit,runtime["caml_fresh_oo_id"](0)];

function min(x, y) {return runtime["caml_lessequal"](x, y) ? x : y;}

function max(x, y) {return runtime["caml_greaterequal"](x, y) ? x : y;}

function abs(x) {return 0 <= x ? x : - x | 0;}

function lnot(x) {return x ^ -1;}

var infinity = caml_int64_float_of_bits(a_);
var neg_infinity = caml_int64_float_of_bits(b_);
var nan = caml_int64_float_of_bits(c_);
var max_float = caml_int64_float_of_bits(d_);
var min_float = caml_int64_float_of_bits(e_);
var epsilon_float = caml_int64_float_of_bits(f_);
var max_int = 2147483647;
var min_int = -2147483648;

function symbol(s1, s2) {
  var l1 = caml_ml_string_length(s1);
  var l2 = caml_ml_string_length(s2);
  var s = caml_create_bytes(l1 + l2 | 0);
  caml_blit_string(s1, 0, s, 0, l1);
  caml_blit_string(s2, 0, s, l1, l2);
  return caml_string_of_bytes(s);
}

function char_of_int(n) {
  if (0 <= n) {if (! (255 < n)) {return n;}}
  return invalid_arg(cst_char_of_int);
}

function string_of_bool(b) {return b ? cst_true : cst_false;}

function bool_of_string(param) {
  return caml_string_notequal(param, cst_false__0) ?
    caml_string_notequal(param, cst_true__0) ?
     invalid_arg(cst_bool_of_string) :
     1 :
    0;
}

function bool_of_string_opt(param) {
  return caml_string_notequal(param, cst_false__1) ?
    caml_string_notequal(param, cst_true__1) ? 0 : g_ :
    h_;
}

function string_of_int(n) {return string("" + n);}

function int_of_string_opt(s) {
  var ay_;
  try {ay_ = [0,caml_int_of_string(s)];return ay_;}
  catch(az_) {
    az_ = runtime["caml_wrap_exception"](az_);
    if (az_[1] === Failure) {return 0;}
    throw caml_wrap_thrown_exception_reraise(az_);
  }
}

function valid_float_lexem(s) {
  var l = caml_ml_string_length(s);
  function loop(i) {
    var match;
    var i__1;
    var switch__0;
    var i__0 = i;
    for (; ; ) {
      if (l <= i__0) {return symbol(s, cst);}
      match = runtime["caml_string_get"](s, i__0);
      switch__0 = 48 <= match ? 58 <= match ? 0 : 1 : 45 === match ? 1 : 0;
      if (switch__0) {i__1 = i__0 + 1 | 0;i__0 = i__1;continue;}
      return s;
    }
  }
  return loop(0);
}

function string_of_float(f) {
  return valid_float_lexem(runtime["caml_format_float"](cst_12g, f));
}

function float_of_string_opt(s) {
  var aw_;
  try {aw_ = [0,caml_float_of_string(s)];return aw_;}
  catch(ax_) {
    ax_ = runtime["caml_wrap_exception"](ax_);
    if (ax_[1] === Failure) {return 0;}
    throw caml_wrap_thrown_exception_reraise(ax_);
  }
}

function symbol__0(l1, l2) {
  var hd;
  var tl;
  if (l1) {tl = l1[2];hd = l1[1];return [0,hd,symbol__0(tl, l2)];}
  return l2;
}

var stdin = caml_ml_open_descriptor_in(0);
var stdout = caml_ml_open_descriptor_out(1);
var stderr = caml_ml_open_descriptor_out(2);

function open_out_gen(mode, perm, name) {
  var c = caml_ml_open_descriptor_out(caml_sys_open(name, mode, perm));
  caml_ml_set_channel_name(c, name);
  return c;
}

function open_out(name) {return open_out_gen(i_, 438, name);}

function open_out_bin(name) {return open_out_gen(j_, 438, name);}

function flush_all(param) {
  function iter(param) {
    var l;
    var a;
    var param__0 = param;
    for (; ; ) {
      if (param__0) {
        l = param__0[2];
        a = param__0[1];
        try {caml_ml_flush(a);}
        catch(av_) {
          av_ = runtime["caml_wrap_exception"](av_);
          if (av_[1] !== Sys_error) {
            throw caml_wrap_thrown_exception_reraise(av_);
          }
        }
        param__0 = l;
        continue;
      }
      return 0;
    }
  }
  return iter(runtime["caml_ml_out_channels_list"](0));
}

function output_bytes(oc, s) {
  return caml_ml_output_bytes(oc, s, 0, caml_ml_bytes_length(s));
}

function output_string(oc, s) {
  return caml_ml_output(oc, s, 0, caml_ml_string_length(s));
}

function output(oc, s, ofs, len) {
  if (0 <= ofs) {
    if (0 <= len) {
      if (! ((caml_ml_bytes_length(s) - len | 0) < ofs)) {return caml_ml_output_bytes(oc, s, ofs, len);}
    }
  }
  return invalid_arg(cst_output);
}

function output_substring(oc, s, ofs, len) {
  if (0 <= ofs) {
    if (0 <= len) {
      if (! ((caml_ml_string_length(s) - len | 0) < ofs)) {return caml_ml_output(oc, s, ofs, len);}
    }
  }
  return invalid_arg(cst_output_substring);
}

function output_value(chan, v) {
  return runtime["caml_output_value"](chan, v, 0);
}

function close_out(oc) {caml_ml_flush(oc);return caml_ml_close_channel(oc);}

function close_out_noerr(oc) {
  var as_;
  try {caml_ml_flush(oc);}catch(au_) {}
  try {as_ = caml_ml_close_channel(oc);return as_;}catch(at_) {return 0;}
}

function open_in_gen(mode, perm, name) {
  var c = caml_ml_open_descriptor_in(caml_sys_open(name, mode, perm));
  caml_ml_set_channel_name(c, name);
  return c;
}

function open_in(name) {return open_in_gen(k_, 0, name);}

function open_in_bin(name) {return open_in_gen(l_, 0, name);}

function input(ic, s, ofs, len) {
  if (0 <= ofs) {
    if (0 <= len) {
      if (! ((caml_ml_bytes_length(s) - len | 0) < ofs)) {return caml_ml_input(ic, s, ofs, len);}
    }
  }
  return invalid_arg(cst_input);
}

function unsafe_really_input(ic, s, ofs, len) {
  var r;
  var len__1;
  var ofs__1;
  var ofs__0 = ofs;
  var len__0 = len;
  for (; ; ) {
    if (0 < len__0) {
      r = caml_ml_input(ic, s, ofs__0, len__0);
      if (0 === r) {throw caml_wrap_thrown_exception(End_of_file);}
      len__1 = len__0 - r | 0;
      ofs__1 = ofs__0 + r | 0;
      ofs__0 = ofs__1;
      len__0 = len__1;
      continue;
    }
    return 0;
  }
}

function really_input(ic, s, ofs, len) {
  if (0 <= ofs) {
    if (0 <= len) {
      if (! ((caml_ml_bytes_length(s) - len | 0) < ofs)) {return unsafe_really_input(ic, s, ofs, len);}
    }
  }
  return invalid_arg(cst_really_input);
}

function really_input_string(ic, len) {
  var s = caml_create_bytes(len);
  really_input(ic, s, 0, len);
  return caml_string_of_bytes(s);
}

function input_line(chan) {
  function build_result(buf, pos, param) {
    var param__1;
    var hd;
    var len;
    var pos__1;
    var pos__0 = pos;
    var param__0 = param;
    for (; ; ) {
      if (param__0) {
        param__1 = param__0[2];
        hd = param__0[1];
        len = caml_ml_bytes_length(hd);
        runtime["caml_blit_bytes"](hd, 0, buf, pos__0 - len | 0, len);
        pos__1 = pos__0 - len | 0;
        pos__0 = pos__1;
        param__0 = param__1;
        continue;
      }
      return buf;
    }
  }
  function scan(accu, len) {
    var n;
    var res;
    var len__1;
    var beg;
    var len__2;
    var accu__1;
    var accu__0 = accu;
    var len__0 = len;
    for (; ; ) {
      n = runtime["caml_ml_input_scan_line"](chan);
      if (0 === n) {
        if (accu__0) {
          return build_result(caml_create_bytes(len__0), len__0, accu__0);
        }
        throw caml_wrap_thrown_exception(End_of_file);
      }
      if (0 < n) {
        res = caml_create_bytes(n + -1 | 0);
        caml_ml_input(chan, res, 0, n + -1 | 0);
        caml_ml_input_char(chan);
        if (accu__0) {
          len__1 = (len__0 + n | 0) + -1 | 0;
          return build_result(
            caml_create_bytes(len__1),
            len__1,
            [0,res,accu__0]
          );
        }
        return res;
      }
      beg = caml_create_bytes(- n | 0);
      caml_ml_input(chan, beg, 0, - n | 0);
      len__2 = len__0 - n | 0;
      accu__1 = [0,beg,accu__0];
      accu__0 = accu__1;
      len__0 = len__2;
      continue;
    }
  }
  return caml_string_of_bytes(scan(0, 0));
}

function close_in_noerr(ic) {
  var aq_;
  try {aq_ = caml_ml_close_channel(ic);return aq_;}catch(ar_) {return 0;}
}

function print_char(c) {return caml_ml_output_char(stdout, c);}

function print_string(s) {return output_string(stdout, s);}

function print_bytes(s) {return output_bytes(stdout, s);}

function print_int(i) {return output_string(stdout, string_of_int(i));}

function print_float(f) {return output_string(stdout, string_of_float(f));}

function print_endline(s) {
  output_string(stdout, s);
  caml_ml_output_char(stdout, 10);
  return caml_ml_flush(stdout);
}

function print_newline(param) {
  caml_ml_output_char(stdout, 10);
  return caml_ml_flush(stdout);
}

function prerr_char(c) {return caml_ml_output_char(stderr, c);}

function prerr_string(s) {return output_string(stderr, s);}

function prerr_bytes(s) {return output_bytes(stderr, s);}

function prerr_int(i) {return output_string(stderr, string_of_int(i));}

function prerr_float(f) {return output_string(stderr, string_of_float(f));}

function prerr_endline(s) {
  output_string(stderr, s);
  caml_ml_output_char(stderr, 10);
  return caml_ml_flush(stderr);
}

function prerr_newline(param) {
  caml_ml_output_char(stderr, 10);
  return caml_ml_flush(stderr);
}

function read_line(param) {caml_ml_flush(stdout);return input_line(stdin);}

function read_int(param) {return caml_int_of_string(read_line(0));}

function read_int_opt(param) {return int_of_string_opt(read_line(0));}

function read_float(param) {return caml_float_of_string(read_line(0));}

function read_float_opt(param) {return float_of_string_opt(read_line(0));}

function string_of_format(param) {var str = param[2];return str;}

function symbol__1(param, ao_) {
  var str2 = ao_[2];
  var fmt2 = ao_[1];
  var str1 = param[2];
  var fmt1 = param[1];
  var ap_ = symbol(str1, symbol(cst__0, str2));
  return [0,call2(CamlinternalFormatBasics[3], fmt1, fmt2),ap_];
}

var exit_function = [0,flush_all];

function at_exit(f) {
  var g = exit_function[1];
  var f_already_ran = [0,0];
  exit_function[1] =
    function(param) {
      if (1 - f_already_ran[1]) {f_already_ran[1] = 1;call1(f, 0);}
      return call1(g, 0);
    };
  return 0;
}

function do_at_exit(param) {return call1(exit_function[1], 0);}

function exit(retcode) {
  do_at_exit(0);
  return runtime["caml_sys_exit"](retcode);
}

function m_(an_) {return caml_ml_channel_size_64(an_);}

function n_(am_) {return runtime["caml_ml_pos_in_64"](am_);}

function o_(al_, ak_) {return runtime["caml_ml_seek_in_64"](al_, ak_);}

function p_(aj_) {return caml_ml_channel_size_64(aj_);}

function q_(ai_) {return runtime["caml_ml_pos_out_64"](ai_);}

var r_ = [
  0,
  function(ah_, ag_) {return runtime["caml_ml_seek_out_64"](ah_, ag_);},
  q_,
  p_,
  o_,
  n_,
  m_
];

function s_(af_, ae_) {return caml_ml_set_binary_mode(af_, ae_);}

function t_(ad_) {return caml_ml_close_channel(ad_);}

function u_(ac_) {return caml_ml_channel_size(ac_);}

function v_(ab_) {return runtime["caml_ml_pos_in"](ab_);}

function w_(aa_, Z_) {return runtime["caml_ml_seek_in"](aa_, Z_);}

function x_(Y_) {return runtime["caml_input_value"](Y_);}

function y_(X_) {return runtime["caml_ml_input_int"](X_);}

function z_(W_) {return caml_ml_input_char(W_);}

function A_(V_) {return caml_ml_input_char(V_);}

function B_(U_, T_) {return caml_ml_set_binary_mode(U_, T_);}

function C_(S_) {return caml_ml_channel_size(S_);}

function D_(R_) {return runtime["caml_ml_pos_out"](R_);}

function E_(Q_, P_) {return runtime["caml_ml_seek_out"](Q_, P_);}

function F_(O_, N_) {return runtime["caml_ml_output_int"](O_, N_);}

function G_(M_, L_) {return caml_ml_output_char(M_, L_);}

function H_(K_, J_) {return caml_ml_output_char(K_, J_);}

var Stdlib = [
  0,
  invalid_arg,
  failwith,
  Exit,
  Match_failure,
  Assert_failure,
  Invalid_argument,
  Failure,
  Not_found,
  Out_of_memory,
  Stack_overflow,
  Sys_error,
  End_of_file,
  Division_by_zero,
  Sys_blocked_io,
  Undefined_recursive_module,
  min,
  max,
  abs,
  max_int,
  min_int,
  lnot,
  infinity,
  neg_infinity,
  nan,
  max_float,
  min_float,
  epsilon_float,
  symbol,
  char_of_int,
  string_of_bool,
  bool_of_string_opt,
  bool_of_string,
  string_of_int,
  int_of_string_opt,
  string_of_float,
  float_of_string_opt,
  symbol__0,
  stdin,
  stdout,
  stderr,
  print_char,
  print_string,
  print_bytes,
  print_int,
  print_float,
  print_endline,
  print_newline,
  prerr_char,
  prerr_string,
  prerr_bytes,
  prerr_int,
  prerr_float,
  prerr_endline,
  prerr_newline,
  read_line,
  read_int_opt,
  read_int,
  read_float_opt,
  read_float,
  open_out,
  open_out_bin,
  open_out_gen,
  function(I_) {return caml_ml_flush(I_);},
  flush_all,
  H_,
  output_string,
  output_bytes,
  output,
  output_substring,
  G_,
  F_,
  output_value,
  E_,
  D_,
  C_,
  close_out,
  close_out_noerr,
  B_,
  open_in,
  open_in_bin,
  open_in_gen,
  A_,
  input_line,
  input,
  really_input,
  really_input_string,
  z_,
  y_,
  x_,
  w_,
  v_,
  u_,
  t_,
  close_in_noerr,
  s_,
  r_,
  string_of_format,
  symbol__1,
  exit,
  at_exit,
  valid_float_lexem,
  unsafe_really_input,
  do_at_exit
];

module.exports = Stdlib;

/*::type Exports = {
  invalid_arg: (s: any) => any,
  failwith: (s: any) => any,
  Exit: any,
  Match_failure: any,
  Assert_failure: any,
  Invalid_argument: any,
  Failure: any,
  Not_found: any,
  Out_of_memory: any,
  Stack_overflow: any,
  Sys_error: any,
  End_of_file: any,
  Division_by_zero: any,
  Sys_blocked_io: any,
  Undefined_recursive_module: any,
  min: (x: any, y: any) => any,
  max: (x: any, y: any) => any,
  abs: (x: any) => any,
  max_int: any,
  min_int: any,
  lnot: (x: any) => any,
  infinity: any,
  neg_infinity: any,
  nan: any,
  max_float: any,
  min_float: any,
  epsilon_float: any,
  symbol: (s1: any, s2: any) => any,
  char_of_int: (n: any) => any,
  string_of_bool: (b: any) => any,
  bool_of_string_opt: (param: any) => any,
  bool_of_string: (param: any) => any,
  string_of_int: (n: any) => any,
  int_of_string_opt: (s: any) => any,
  string_of_float: (f: any) => any,
  float_of_string_opt: (s: any) => any,
  stdin: any,
  stdout: any,
  stderr: any,
  print_char: (c: any) => any,
  print_string: (s: any) => any,
  print_bytes: (s: any) => any,
  print_int: (i: any) => any,
  print_float: (f: any) => any,
  print_endline: (s: any) => any,
  print_newline: (param: any) => any,
  prerr_char: (c: any) => any,
  prerr_string: (s: any) => any,
  prerr_bytes: (s: any) => any,
  prerr_int: (i: any) => any,
  prerr_float: (f: any) => any,
  prerr_endline: (s: any) => any,
  prerr_newline: (param: any) => any,
  read_line: (param: any) => any,
  read_int_opt: (param: any) => any,
  read_int: (param: any) => any,
  read_float_opt: (param: any) => any,
  read_float: (param: any) => any,
  open_out: (name: any) => any,
  open_out_bin: (name: any) => any,
  open_out_gen: (mode: any, perm: any, name: any) => any,
  flush_all: (param: any) => any,
  output_string: (oc: any, s: any) => any,
  output_bytes: (oc: any, s: any) => any,
  output: (oc: any, s: any, ofs: any, len: any) => any,
  output_substring: (oc: any, s: any, ofs: any, len: any) => any,
  output_value: (chan: any, v: any) => any,
  close_out: (oc: any) => any,
  close_out_noerr: (oc: any) => any,
  open_in: (name: any) => any,
  open_in_bin: (name: any) => any,
  open_in_gen: (mode: any, perm: any, name: any) => any,
  input_line: (chan: any) => any,
  input: (ic: any, s: any, ofs: any, len: any) => any,
  really_input: (ic: any, s: any, ofs: any, len: any) => any,
  really_input_string: (ic: any, len: any) => any,
  close_in_noerr: (ic: any) => any,
  string_of_format: (param: any) => any,
  exit: (retcode: any) => any,
  at_exit: (f: any) => any,
  valid_float_lexem: (s: any) => any,
  unsafe_really_input: (ic: any, s: any, ofs: any, len: any) => any,
  do_at_exit: (param: any) => any,
}*/
/** @type {{
  invalid_arg: (s: any) => any,
  failwith: (s: any) => any,
  Exit: any,
  Match_failure: any,
  Assert_failure: any,
  Invalid_argument: any,
  Failure: any,
  Not_found: any,
  Out_of_memory: any,
  Stack_overflow: any,
  Sys_error: any,
  End_of_file: any,
  Division_by_zero: any,
  Sys_blocked_io: any,
  Undefined_recursive_module: any,
  min: (x: any, y: any) => any,
  max: (x: any, y: any) => any,
  abs: (x: any) => any,
  max_int: any,
  min_int: any,
  lnot: (x: any) => any,
  infinity: any,
  neg_infinity: any,
  nan: any,
  max_float: any,
  min_float: any,
  epsilon_float: any,
  symbol: (s1: any, s2: any) => any,
  char_of_int: (n: any) => any,
  string_of_bool: (b: any) => any,
  bool_of_string_opt: (param: any) => any,
  bool_of_string: (param: any) => any,
  string_of_int: (n: any) => any,
  int_of_string_opt: (s: any) => any,
  string_of_float: (f: any) => any,
  float_of_string_opt: (s: any) => any,
  stdin: any,
  stdout: any,
  stderr: any,
  print_char: (c: any) => any,
  print_string: (s: any) => any,
  print_bytes: (s: any) => any,
  print_int: (i: any) => any,
  print_float: (f: any) => any,
  print_endline: (s: any) => any,
  print_newline: (param: any) => any,
  prerr_char: (c: any) => any,
  prerr_string: (s: any) => any,
  prerr_bytes: (s: any) => any,
  prerr_int: (i: any) => any,
  prerr_float: (f: any) => any,
  prerr_endline: (s: any) => any,
  prerr_newline: (param: any) => any,
  read_line: (param: any) => any,
  read_int_opt: (param: any) => any,
  read_int: (param: any) => any,
  read_float_opt: (param: any) => any,
  read_float: (param: any) => any,
  open_out: (name: any) => any,
  open_out_bin: (name: any) => any,
  open_out_gen: (mode: any, perm: any, name: any) => any,
  flush_all: (param: any) => any,
  output_string: (oc: any, s: any) => any,
  output_bytes: (oc: any, s: any) => any,
  output: (oc: any, s: any, ofs: any, len: any) => any,
  output_substring: (oc: any, s: any, ofs: any, len: any) => any,
  output_value: (chan: any, v: any) => any,
  close_out: (oc: any) => any,
  close_out_noerr: (oc: any) => any,
  open_in: (name: any) => any,
  open_in_bin: (name: any) => any,
  open_in_gen: (mode: any, perm: any, name: any) => any,
  input_line: (chan: any) => any,
  input: (ic: any, s: any, ofs: any, len: any) => any,
  really_input: (ic: any, s: any, ofs: any, len: any) => any,
  really_input_string: (ic: any, len: any) => any,
  close_in_noerr: (ic: any) => any,
  string_of_format: (param: any) => any,
  exit: (retcode: any) => any,
  at_exit: (f: any) => any,
  valid_float_lexem: (s: any) => any,
  unsafe_really_input: (ic: any, s: any, ofs: any, len: any) => any,
  do_at_exit: (param: any) => any,
}} */
module.exports = ((module.exports /*:: : any*/) /*:: :Exports */);
module.exports.invalid_arg = module.exports[1];
module.exports.failwith = module.exports[2];
module.exports.Exit = module.exports[3];
module.exports.Match_failure = module.exports[4];
module.exports.Assert_failure = module.exports[5];
module.exports.Invalid_argument = module.exports[6];
module.exports.Failure = module.exports[7];
module.exports.Not_found = module.exports[8];
module.exports.Out_of_memory = module.exports[9];
module.exports.Stack_overflow = module.exports[10];
module.exports.Sys_error = module.exports[11];
module.exports.End_of_file = module.exports[12];
module.exports.Division_by_zero = module.exports[13];
module.exports.Sys_blocked_io = module.exports[14];
module.exports.Undefined_recursive_module = module.exports[15];
module.exports.min = module.exports[16];
module.exports.max = module.exports[17];
module.exports.abs = module.exports[18];
module.exports.max_int = module.exports[19];
module.exports.min_int = module.exports[20];
module.exports.lnot = module.exports[21];
module.exports.infinity = module.exports[22];
module.exports.neg_infinity = module.exports[23];
module.exports.nan = module.exports[24];
module.exports.max_float = module.exports[25];
module.exports.min_float = module.exports[26];
module.exports.epsilon_float = module.exports[27];
module.exports.symbol = module.exports[28];
module.exports.char_of_int = module.exports[29];
module.exports.string_of_bool = module.exports[30];
module.exports.bool_of_string_opt = module.exports[31];
module.exports.bool_of_string = module.exports[32];
module.exports.string_of_int = module.exports[33];
module.exports.int_of_string_opt = module.exports[34];
module.exports.string_of_float = module.exports[35];
module.exports.float_of_string_opt = module.exports[36];
module.exports.stdin = module.exports[38];
module.exports.stdout = module.exports[39];
module.exports.stderr = module.exports[40];
module.exports.print_char = module.exports[41];
module.exports.print_string = module.exports[42];
module.exports.print_bytes = module.exports[43];
module.exports.print_int = module.exports[44];
module.exports.print_float = module.exports[45];
module.exports.print_endline = module.exports[46];
module.exports.print_newline = module.exports[47];
module.exports.prerr_char = module.exports[48];
module.exports.prerr_string = module.exports[49];
module.exports.prerr_bytes = module.exports[50];
module.exports.prerr_int = module.exports[51];
module.exports.prerr_float = module.exports[52];
module.exports.prerr_endline = module.exports[53];
module.exports.prerr_newline = module.exports[54];
module.exports.read_line = module.exports[55];
module.exports.read_int_opt = module.exports[56];
module.exports.read_int = module.exports[57];
module.exports.read_float_opt = module.exports[58];
module.exports.read_float = module.exports[59];
module.exports.open_out = module.exports[60];
module.exports.open_out_bin = module.exports[61];
module.exports.open_out_gen = module.exports[62];
module.exports.flush_all = module.exports[64];
module.exports.output_string = module.exports[66];
module.exports.output_bytes = module.exports[67];
module.exports.output = module.exports[68];
module.exports.output_substring = module.exports[69];
module.exports.output_value = module.exports[72];
module.exports.close_out = module.exports[76];
module.exports.close_out_noerr = module.exports[77];
module.exports.open_in = module.exports[79];
module.exports.open_in_bin = module.exports[80];
module.exports.open_in_gen = module.exports[81];
module.exports.input_line = module.exports[83];
module.exports.input = module.exports[84];
module.exports.really_input = module.exports[85];
module.exports.really_input_string = module.exports[86];
module.exports.close_in_noerr = module.exports[94];
module.exports.string_of_format = module.exports[97];
module.exports.exit = module.exports[99];
module.exports.at_exit = module.exports[100];
module.exports.valid_float_lexem = module.exports[101];
module.exports.unsafe_really_input = module.exports[102];
module.exports.do_at_exit = module.exports[103];

/* Hashing disabled */
