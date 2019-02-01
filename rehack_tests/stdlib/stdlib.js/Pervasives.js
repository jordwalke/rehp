/**
 * Pervasives
 * @providesModule Pervasives
 */
"use strict";
var CamlinternalFormatBasics = require('CamlinternalFormatBasics.js');
var Invalid_argument = require('Invalid_argument.js');
var Failure = require('Failure.js');
var Sys_error = require('Sys_error.js');
var End_of_file = require('End_of_file.js');
var runtime = require('runtime.js');

let joo_global_object = global;


var runtime = joo_global_object.jsoo_runtime;
var caml_blit_string = runtime.caml_blit_string;
var caml_create_bytes = runtime.caml_create_bytes;
var caml_float_of_string = runtime.caml_float_of_string;
var caml_int64_float_of_bits = runtime.caml_int64_float_of_bits;
var caml_int_of_string = runtime.caml_int_of_string;
var caml_ml_bytes_length = runtime.caml_ml_bytes_length;
var caml_ml_channel_size = runtime.caml_ml_channel_size;
var caml_ml_channel_size_64 = runtime.caml_ml_channel_size_64;
var caml_ml_close_channel = runtime.caml_ml_close_channel;
var caml_ml_flush = runtime.caml_ml_flush;
var caml_ml_input = runtime.caml_ml_input;
var caml_ml_input_char = runtime.caml_ml_input_char;
var caml_ml_open_descriptor_in = runtime.caml_ml_open_descriptor_in;
var caml_ml_open_descriptor_out = runtime.caml_ml_open_descriptor_out;
var caml_ml_output = runtime.caml_ml_output;
var caml_ml_output_bytes = runtime.caml_ml_output_bytes;
var caml_ml_output_char = runtime.caml_ml_output_char;
var caml_ml_set_binary_mode = runtime.caml_ml_set_binary_mode;
var caml_ml_set_channel_name = runtime.caml_ml_set_channel_name;
var caml_ml_string_length = runtime.caml_ml_string_length;
var caml_new_string = runtime.caml_new_string;
var caml_string_notequal = runtime.caml_string_notequal;
var caml_sys_open = runtime.caml_sys_open;
var caml_wrap_exception = runtime.caml_wrap_exception;

function caml_call1(f, a0) {
  return f.length == 1 ? f(a0) : runtime.caml_call_gen(f, [a0]);
}

function caml_call2(f, a0, a1) {
  return f.length == 2 ? f(a0, a1) : runtime.caml_call_gen(f, [a0,a1]);
}

var global_data = runtime.caml_get_global_data();
var cst__0 = caml_new_string("%,");
var cst_really_input = caml_new_string("really_input");
var cst_input = caml_new_string("input");
var cst_output_substring = caml_new_string("output_substring");
var cst_output = caml_new_string("output");
var cst_12g = caml_new_string("%.12g");
var cst = caml_new_string(".");
var cst_false__1 = caml_new_string("false");
var cst_true__1 = caml_new_string("true");
var cst_false__0 = caml_new_string("false");
var cst_true__0 = caml_new_string("true");
var cst_bool_of_string = caml_new_string("bool_of_string");
var cst_true = caml_new_string("true");
var cst_false = caml_new_string("false");
var cst_char_of_int = caml_new_string("char_of_int");
var cst_Pervasives_Exit = caml_new_string("Pervasives.Exit");
var End_of_file = global_data.End_of_file;
var CamlinternalFormatBasics = global_data.CamlinternalFormatBasics;
var Sys_error = global_data.Sys_error;
var Failure = global_data.Failure;
var Invalid_argument = global_data.Invalid_argument;
var n = [0,0,[0,6,0]];
var m = [0,0,[0,7,0]];
var l = [0,1,[0,3,[0,4,[0,6,0]]]];
var k = [0,1,[0,3,[0,4,[0,7,0]]]];
var h = [0,1];
var i = [0,0];
var a = [255,0,0,32752];
var b = [255,0,0,65520];
var c = [255,1,0,32752];
var d = [255,16777215,16777215,32751];
var e = [255,0,0,16];
var f = [255,0,0,15536];

function failwith(s) {
  throw runtime.caml_wrap_thrown_exception([0,Failure,s]);
}

function invalid_arg(s) {
  throw runtime.caml_wrap_thrown_exception([0,Invalid_argument,s]);
}

var Exit = [248,cst_Pervasives_Exit,runtime.caml_fresh_oo_id(0)];

function min(x, y) {return runtime.caml_lessequal(x, y) ? x : y;}

function max(x, y) {return runtime.caml_greaterequal(x, y) ? x : y;}

function abs(x) {return 0 <= x ? x : - x | 0;}

function lnot(x) {return x ^ -1;}

var infinity = caml_int64_float_of_bits(a);
var neg_infinity = caml_int64_float_of_bits(b);
var nan = caml_int64_float_of_bits(c);
var max_float = caml_int64_float_of_bits(d);
var min_float = caml_int64_float_of_bits(e);
var epsilon_float = caml_int64_float_of_bits(f);
var max_int = 2147483647;
var min_int = -2147483648;

function g(s1, s2) {
  var l1 = caml_ml_string_length(s1);
  var l2 = caml_ml_string_length(s2);
  var s = caml_create_bytes(l1 + l2 | 0);
  caml_blit_string(s1, 0, s, 0, l1);
  caml_blit_string(s2, 0, s, l1, l2);
  return s;
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
    caml_string_notequal(param, cst_true__1) ? 0 : h :
    i;
}

function string_of_int(n) {return caml_new_string("" + n);}

function int_of_string_opt(s) {
  try {var aA = [0,caml_int_of_string(s)];return aA;}
  catch(aB) {
    aB = caml_wrap_exception(aB);
    if (aB[1] === Failure) {return 0;}
    throw runtime.caml_wrap_thrown_exception_reraise(aB);
  }
}

function valid_float_lexem(s) {
  var l = caml_ml_string_length(s);
  function loop(i) {
    var i__0 = i;
    for (; ; ) {
      if (l <= i__0) {return g(s, cst);}
      var match = runtime.caml_string_get(s, i__0);
      var switch__0 = 48 <= match ? 58 <= match ? 0 : 1 : 45 === match ? 1 : 0;
      if (switch__0) {var i__1 = i__0 + 1 | 0;var i__0 = i__1;continue;}
      return s;
    }
  }
  return loop(0);
}

function string_of_float(f) {
  return valid_float_lexem(runtime.caml_format_float(cst_12g, f));
}

function float_of_string_opt(s) {
  try {var ay = [0,caml_float_of_string(s)];return ay;}
  catch(az) {
    az = caml_wrap_exception(az);
    if (az[1] === Failure) {return 0;}
    throw runtime.caml_wrap_thrown_exception_reraise(az);
  }
}

function j(l1, l2) {
  if (l1) {var tl = l1[2];var hd = l1[1];return [0,hd,j(tl, l2)];}
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

function open_out(name) {return open_out_gen(k, 438, name);}

function open_out_bin(name) {return open_out_gen(l, 438, name);}

function flush_all(param) {
  function iter(param) {
    var param__0 = param;
    for (; ; ) {
      if (param__0) {
        var l = param__0[2];
        var a = param__0[1];
        try {caml_ml_flush(a);}
        catch(ax) {
          ax = caml_wrap_exception(ax);
          if (ax[1] !== Sys_error) {
            throw runtime.caml_wrap_thrown_exception_reraise(ax);
          }
        }
        var param__0 = l;
        continue;
      }
      return 0;
    }
  }
  return iter(runtime.caml_ml_out_channels_list(0));
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

function output_value(chan, v) {return runtime.caml_output_value(chan, v, 0);}

function close_out(oc) {caml_ml_flush(oc);return caml_ml_close_channel(oc);}

function close_out_noerr(oc) {
  try {caml_ml_flush(oc);}catch(aw) {}
  try {var au = caml_ml_close_channel(oc);return au;}catch(av) {return 0;}
}

function open_in_gen(mode, perm, name) {
  var c = caml_ml_open_descriptor_in(caml_sys_open(name, mode, perm));
  caml_ml_set_channel_name(c, name);
  return c;
}

function open_in(name) {return open_in_gen(m, 0, name);}

function open_in_bin(name) {return open_in_gen(n, 0, name);}

function input(ic, s, ofs, len) {
  if (0 <= ofs) {
    if (0 <= len) {
      if (! ((caml_ml_bytes_length(s) - len | 0) < ofs)) {return caml_ml_input(ic, s, ofs, len);}
    }
  }
  return invalid_arg(cst_input);
}

function unsafe_really_input(ic, s, ofs, len) {
  var ofs__0 = ofs;
  var len__0 = len;
  for (; ; ) {
    if (0 < len__0) {
      var r = caml_ml_input(ic, s, ofs__0, len__0);
      if (0 === r) {throw runtime.caml_wrap_thrown_exception(End_of_file);}
      var len__1 = len__0 - r | 0;
      var ofs__1 = ofs__0 + r | 0;
      var ofs__0 = ofs__1;
      var len__0 = len__1;
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
  return s;
}

function input_line(chan) {
  function build_result(buf, pos, param) {
    var pos__0 = pos;
    var param__0 = param;
    for (; ; ) {
      if (param__0) {
        var param__1 = param__0[2];
        var hd = param__0[1];
        var len = caml_ml_bytes_length(hd);
        runtime.caml_blit_bytes(hd, 0, buf, pos__0 - len | 0, len);
        var pos__1 = pos__0 - len | 0;
        var pos__0 = pos__1;
        var param__0 = param__1;
        continue;
      }
      return buf;
    }
  }
  function scan(accu, len) {
    var accu__0 = accu;
    var len__0 = len;
    for (; ; ) {
      var n = runtime.caml_ml_input_scan_line(chan);
      if (0 === n) {
        if (accu__0) {
          return build_result(caml_create_bytes(len__0), len__0, accu__0);
        }
        throw runtime.caml_wrap_thrown_exception(End_of_file);
      }
      if (0 < n) {
        var res = caml_create_bytes(n + -1 | 0);
        caml_ml_input(chan, res, 0, n + -1 | 0);
        caml_ml_input_char(chan);
        if (accu__0) {
          var len__1 = (len__0 + n | 0) + -1 | 0;
          return build_result(
            caml_create_bytes(len__1),
            len__1,
            [0,res,accu__0]
          );
        }
        return res;
      }
      var beg = caml_create_bytes(- n | 0);
      caml_ml_input(chan, beg, 0, - n | 0);
      var len__2 = len__0 - n | 0;
      var accu__1 = [0,beg,accu__0];
      var accu__0 = accu__1;
      var len__0 = len__2;
      continue;
    }
  }
  return scan(0, 0);
}

function close_in_noerr(ic) {
  try {var as = caml_ml_close_channel(ic);return as;}catch(at) {return 0;}
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

var exit_function = [0,flush_all];

function o(param, aq) {
  var str2 = aq[2];
  var fmt2 = aq[1];
  var str1 = param[2];
  var fmt1 = param[1];
  var ar = g(str1, g(cst__0, str2));
  return [0,caml_call2(CamlinternalFormatBasics[3], fmt1, fmt2),ar];
}

function at_exit(f) {
  var g = exit_function[1];
  exit_function[1] =
    function(param) {caml_call1(f, 0);return caml_call1(g, 0);};
  return 0;
}

function do_at_exit(param) {return caml_call1(exit_function[1], 0);}

function exit(retcode) {do_at_exit(0);return runtime.caml_sys_exit(retcode);}

function p(ap) {return caml_ml_channel_size_64(ap);}

function q(ao) {return runtime.caml_ml_pos_in_64(ao);}

function r(an, am) {return runtime.caml_ml_seek_in_64(an, am);}

function s(al) {return caml_ml_channel_size_64(al);}

function t(ak) {return runtime.caml_ml_pos_out_64(ak);}

var u = [
  0,
  function(aj, ai) {return runtime.caml_ml_seek_out_64(aj, ai);},
  t,
  s,
  r,
  q,
  p
];

function v(ah, ag) {return caml_ml_set_binary_mode(ah, ag);}

function w(af) {return caml_ml_close_channel(af);}

function x(ae) {return caml_ml_channel_size(ae);}

function y(ad) {return runtime.caml_ml_pos_in(ad);}

function z(ac, ab) {return runtime.caml_ml_seek_in(ac, ab);}

function A(aa) {return runtime.caml_input_value(aa);}

function B(_) {return runtime.caml_ml_input_int(_);}

function C(Z) {return caml_ml_input_char(Z);}

function D(Y) {return caml_ml_input_char(Y);}

function E(X, W) {return caml_ml_set_binary_mode(X, W);}

function F(V) {return caml_ml_channel_size(V);}

function G(U) {return runtime.caml_ml_pos_out(U);}

function H(T, S) {return runtime.caml_ml_seek_out(T, S);}

function I(R, Q) {return runtime.caml_ml_output_int(R, Q);}

function J(P, O) {return caml_ml_output_char(P, O);}

function K(N, M) {return caml_ml_output_char(N, M);}

var Pervasives = [
  0,
  invalid_arg,
  failwith,
  Exit,
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
  g,
  char_of_int,
  string_of_bool,
  bool_of_string,
  bool_of_string_opt,
  string_of_int,
  int_of_string_opt,
  string_of_float,
  float_of_string_opt,
  j,
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
  read_int,
  read_int_opt,
  read_float,
  read_float_opt,
  open_out,
  open_out_bin,
  open_out_gen,
  function(L) {return caml_ml_flush(L);},
  flush_all,
  K,
  output_string,
  output_bytes,
  output,
  output_substring,
  J,
  I,
  output_value,
  H,
  G,
  F,
  close_out,
  close_out_noerr,
  E,
  open_in,
  open_in_bin,
  open_in_gen,
  D,
  input_line,
  input,
  really_input,
  really_input_string,
  C,
  B,
  A,
  z,
  y,
  x,
  w,
  close_in_noerr,
  v,
  u,
  string_of_format,
  o,
  exit,
  at_exit,
  valid_float_lexem,
  unsafe_really_input,
  do_at_exit
];

runtime.caml_register_global(37, Pervasives, "Pervasives");


module.exports = global.jsoo_runtime.caml_get_global_data().Pervasives;