/**
 * @flow strict
 * Stdlib__string
 */

// @ts-check


"use strict";

var runtime = require("../runtime/runtime.js");
var caml_blit_string = runtime["caml_blit_string"];
var caml_ml_string_length = runtime["caml_ml_string_length"];
var string = runtime["caml_new_string"];
var caml_string_equal = runtime["caml_string_equal"];
var caml_string_unsafe_get = runtime["caml_string_unsafe_get"];
var caml_wrap_thrown_exception = runtime["caml_wrap_thrown_exception"];
var caml_wrap_thrown_exception_reraise = runtime
 ["caml_wrap_thrown_exception_reraise"];

function call1(f, a0) {
  return f.length === 1 ? f(a0) : runtime["caml_call_gen"](f, [a0]);
}

function call2(f, a0, a1) {
  return f.length === 2 ? f(a0, a1) : runtime["caml_call_gen"](f, [a0,a1]);
}

function call3(f, a0, a1, a2) {
  return f.length === 3 ?
    f(a0, a1, a2) :
    runtime["caml_call_gen"](f, [a0,a1,a2]);
}

var cst_String_rcontains_from_Bytes_rcontains_from = string(
  "String.rcontains_from / Bytes.rcontains_from"
);
var cst_String_contains_from_Bytes_contains_from = string(
  "String.contains_from / Bytes.contains_from"
);
var cst_String_rindex_from_opt_Bytes_rindex_from_opt = string(
  "String.rindex_from_opt / Bytes.rindex_from_opt"
);
var cst_String_rindex_from_Bytes_rindex_from = string(
  "String.rindex_from / Bytes.rindex_from"
);
var cst_String_index_from_opt_Bytes_index_from_opt = string(
  "String.index_from_opt / Bytes.index_from_opt"
);
var cst_String_index_from_Bytes_index_from = string(
  "String.index_from / Bytes.index_from"
);
var cst__0 = string("");
var cst = string("");
var cst_String_concat = string("String.concat");
var Stdlib = require("./Stdlib.js");
var Stdlib_bytes = require("./Stdlib__bytes.js");
var bts = Stdlib_bytes[42];
var bos = Stdlib_bytes[43];

function make(n, c) {return call1(bts, call2(Stdlib_bytes[1], n, c));}

function init(n, f) {return call1(bts, call2(Stdlib_bytes[2], n, f));}

function copy(s) {
  var L_ = call1(bos, s);
  return call1(bts, call1(Stdlib_bytes[4], L_));
}

function sub(s, ofs, len) {
  var K_ = call1(bos, s);
  return call1(bts, call3(Stdlib_bytes[7], K_, ofs, len));
}

var fill = Stdlib_bytes[10];
var blit = Stdlib_bytes[12];

function ensure_ge(x, y) {
  return y <= x ? x : call1(Stdlib[1], cst_String_concat);
}

function sum_lengths(acc, seplen, param) {
  var acc__0 = acc;
  var param__0 = param;
  for (; ; ) {
    if (param__0) {
      var I_ = param__0[2];
      var J_ = param__0[1];
      if (I_) {
        var acc__1 = ensure_ge(
          (caml_ml_string_length(J_) + seplen | 0) + acc__0 | 0,
          acc__0
        );
        var acc__0 = acc__1;
        var param__0 = I_;
        continue;
      }
      return caml_ml_string_length(J_) + acc__0 | 0;
    }
    return acc__0;
  }
}

function unsafe_blits(dst, pos, sep, seplen, param) {
  var pos__0 = pos;
  var param__0 = param;
  for (; ; ) {
    if (param__0) {
      var G_ = param__0[2];
      var H_ = param__0[1];
      if (G_) {
        caml_blit_string(H_, 0, dst, pos__0, caml_ml_string_length(H_));
        caml_blit_string(
          sep,
          0,
          dst,
          pos__0 + caml_ml_string_length(H_) | 0,
          seplen
        );
        var pos__1 = (pos__0 + caml_ml_string_length(H_) | 0) + seplen | 0;
        var pos__0 = pos__1;
        var param__0 = G_;
        continue;
      }
      caml_blit_string(H_, 0, dst, pos__0, caml_ml_string_length(H_));
      return dst;
    }
    return dst;
  }
}

function concat(sep, l) {
  if (l) {
    var seplen = caml_ml_string_length(sep);
    return call1(
      bts,
      unsafe_blits(
        runtime["caml_create_bytes"](sum_lengths(0, seplen, l)),
        0,
        sep,
        seplen,
        l
      )
    );
  }
  return cst;
}

function iter(f, s) {
  var E_ = caml_ml_string_length(s) + -1 | 0;
  var D_ = 0;
  if (! (E_ < 0)) {
    var i = D_;
    for (; ; ) {
      call1(f, caml_string_unsafe_get(s, i));
      var F_ = i + 1 | 0;
      if (E_ !== i) {var i = F_;continue;}
      break;
    }
  }
  return 0;
}

function iteri(f, s) {
  var B_ = caml_ml_string_length(s) + -1 | 0;
  var A_ = 0;
  if (! (B_ < 0)) {
    var i = A_;
    for (; ; ) {
      call2(f, i, caml_string_unsafe_get(s, i));
      var C_ = i + 1 | 0;
      if (B_ !== i) {var i = C_;continue;}
      break;
    }
  }
  return 0;
}

function map(f, s) {
  var z_ = call1(bos, s);
  return call1(bts, call2(Stdlib_bytes[17], f, z_));
}

function mapi(f, s) {
  var y_ = call1(bos, s);
  return call1(bts, call2(Stdlib_bytes[18], f, y_));
}

function is_space(param) {
  var x_ = param + -9 | 0;
  var switch__0 = 4 < x_ >>> 0 ? 23 === x_ ? 1 : 0 : 2 === x_ ? 0 : 1;
  return switch__0 ? 1 : 0;
}

function trim(s) {
  if (caml_string_equal(s, cst__0)) {return s;}
  if (! is_space(caml_string_unsafe_get(s, 0))) {
    if (
    !
    is_space(caml_string_unsafe_get(s, caml_ml_string_length(s) + -1 | 0))
    ) {return s;}
  }
  var w_ = call1(bos, s);
  return call1(bts, call1(Stdlib_bytes[19], w_));
}

function escaped(s) {
  function escape_if_needed(s, n, i) {
    var i__0 = i;
    for (; ; ) {
      if (n <= i__0) {return s;}
      var match = caml_string_unsafe_get(s, i__0);
      var u_ = match + -32 | 0;
      var switch__0 = 59 < u_ >>> 0 ?
        33 < (u_ + -61 | 0) >>> 0 ? 1 : 0 :
        2 === u_ ? 1 : 0;
      if (switch__0) {
        var v_ = call1(bos, s);
        return call1(bts, call1(Stdlib_bytes[20], v_));
      }
      var i__1 = i__0 + 1 | 0;
      var i__0 = i__1;
      continue;
    }
  }
  return escape_if_needed(s, caml_ml_string_length(s), 0);
}

function index_rec(s, lim, i, c) {
  var i__0 = i;
  for (; ; ) {
    if (lim <= i__0) {throw caml_wrap_thrown_exception(Stdlib[8]);}
    if (caml_string_unsafe_get(s, i__0) === c) {return i__0;}
    var i__1 = i__0 + 1 | 0;
    var i__0 = i__1;
    continue;
  }
}

function index(s, c) {return index_rec(s, caml_ml_string_length(s), 0, c);}

function index_rec_opt(s, lim, i, c) {
  var i__0 = i;
  for (; ; ) {
    if (lim <= i__0) {return 0;}
    if (caml_string_unsafe_get(s, i__0) === c) {return [0,i__0];}
    var i__1 = i__0 + 1 | 0;
    var i__0 = i__1;
    continue;
  }
}

function index_opt(s, c) {
  return index_rec_opt(s, caml_ml_string_length(s), 0, c);
}

function index_from(s, i, c) {
  var l = caml_ml_string_length(s);
  if (0 <= i) {if (! (l < i)) {return index_rec(s, l, i, c);}}
  return call1(Stdlib[1], cst_String_index_from_Bytes_index_from);
}

function index_from_opt(s, i, c) {
  var l = caml_ml_string_length(s);
  if (0 <= i) {if (! (l < i)) {return index_rec_opt(s, l, i, c);}}
  return call1(Stdlib[1], cst_String_index_from_opt_Bytes_index_from_opt);
}

function rindex_rec(s, i, c) {
  var i__0 = i;
  for (; ; ) {
    if (0 <= i__0) {
      if (caml_string_unsafe_get(s, i__0) === c) {return i__0;}
      var i__1 = i__0 + -1 | 0;
      var i__0 = i__1;
      continue;
    }
    throw caml_wrap_thrown_exception(Stdlib[8]);
  }
}

function rindex(s, c) {
  return rindex_rec(s, caml_ml_string_length(s) + -1 | 0, c);
}

function rindex_from(s, i, c) {
  if (-1 <= i) {
    if (! (caml_ml_string_length(s) <= i)) {return rindex_rec(s, i, c);}
  }
  return call1(Stdlib[1], cst_String_rindex_from_Bytes_rindex_from);
}

function rindex_rec_opt(s, i, c) {
  var i__0 = i;
  for (; ; ) {
    if (0 <= i__0) {
      if (caml_string_unsafe_get(s, i__0) === c) {return [0,i__0];}
      var i__1 = i__0 + -1 | 0;
      var i__0 = i__1;
      continue;
    }
    return 0;
  }
}

function rindex_opt(s, c) {
  return rindex_rec_opt(s, caml_ml_string_length(s) + -1 | 0, c);
}

function rindex_from_opt(s, i, c) {
  if (-1 <= i) {
    if (! (caml_ml_string_length(s) <= i)) {return rindex_rec_opt(s, i, c);}
  }
  return call1(Stdlib[1], cst_String_rindex_from_opt_Bytes_rindex_from_opt);
}

function contains_from(s, i, c) {
  var l = caml_ml_string_length(s);
  if (0 <= i) {
    if (! (l < i)) {
      try {index_rec(s, l, i, c);var s_ = 1;return s_;}
      catch(t_) {
        t_ = runtime["caml_wrap_exception"](t_);
        if (t_ === Stdlib[8]) {return 0;}
        throw caml_wrap_thrown_exception_reraise(t_);
      }
    }
  }
  return call1(Stdlib[1], cst_String_contains_from_Bytes_contains_from);
}

function contains(s, c) {return contains_from(s, 0, c);}

function rcontains_from(s, i, c) {
  if (0 <= i) {
    if (! (caml_ml_string_length(s) <= i)) {
      try {rindex_rec(s, i, c);var q_ = 1;return q_;}
      catch(r_) {
        r_ = runtime["caml_wrap_exception"](r_);
        if (r_ === Stdlib[8]) {return 0;}
        throw caml_wrap_thrown_exception_reraise(r_);
      }
    }
  }
  return call1(Stdlib[1], cst_String_rcontains_from_Bytes_rcontains_from);
}

function uppercase_ascii(s) {
  var p_ = call1(bos, s);
  return call1(bts, call1(Stdlib_bytes[36], p_));
}

function lowercase_ascii(s) {
  var o_ = call1(bos, s);
  return call1(bts, call1(Stdlib_bytes[37], o_));
}

function capitalize_ascii(s) {
  var n_ = call1(bos, s);
  return call1(bts, call1(Stdlib_bytes[38], n_));
}

function uncapitalize_ascii(s) {
  var m_ = call1(bos, s);
  return call1(bts, call1(Stdlib_bytes[39], m_));
}

function compare(x, y) {return runtime["caml_string_compare"](x, y);}

function split_on_char(sep, s) {
  var r = [0,0];
  var j = [0,caml_ml_string_length(s)];
  var i_ = caml_ml_string_length(s) + -1 | 0;
  if (! (i_ < 0)) {
    var i = i_;
    for (; ; ) {
      if (caml_string_unsafe_get(s, i) === sep) {
        var k_ = r[1];
        r[1] = [0,sub(s, i + 1 | 0, (j[1] - i | 0) + -1 | 0),k_];
        j[1] = i;
      }
      var l_ = i + -1 | 0;
      if (0 !== i) {var i = l_;continue;}
      break;
    }
  }
  var j_ = r[1];
  return [0,sub(s, 0, j[1]),j_];
}

function uppercase(s) {
  var h_ = call1(bos, s);
  return call1(bts, call1(Stdlib_bytes[32], h_));
}

function lowercase(s) {
  var g_ = call1(bos, s);
  return call1(bts, call1(Stdlib_bytes[33], g_));
}

function capitalize(s) {
  var f_ = call1(bos, s);
  return call1(bts, call1(Stdlib_bytes[34], f_));
}

function uncapitalize(s) {
  var e_ = call1(bos, s);
  return call1(bts, call1(Stdlib_bytes[35], e_));
}

function to_seq(s) {
  var d_ = call1(bos, s);
  return call1(Stdlib_bytes[44], d_);
}

function to_seqi(s) {
  var c_ = call1(bos, s);
  return call1(Stdlib_bytes[45], c_);
}

function of_seq(g) {return call1(bts, call1(Stdlib_bytes[46], g));}

var Stdlib_string = [
  0,
  make,
  init,
  copy,
  sub,
  fill,
  blit,
  concat,
  iter,
  iteri,
  map,
  mapi,
  trim,
  escaped,
  index,
  index_opt,
  rindex,
  rindex_opt,
  index_from,
  index_from_opt,
  rindex_from,
  rindex_from_opt,
  contains,
  contains_from,
  rcontains_from,
  uppercase,
  lowercase,
  capitalize,
  uncapitalize,
  uppercase_ascii,
  lowercase_ascii,
  capitalize_ascii,
  uncapitalize_ascii,
  compare,
  function(b_, a_) {return caml_string_equal(b_, a_);},
  split_on_char,
  to_seq,
  to_seqi,
  of_seq
];

module.exports = Stdlib_string;

/*::type Exports = {
  make: (n: any, c: any) => any,
  init: (n: any, f: any) => any,
  copy: (s: any) => any,
  sub: (s: any, ofs: any, len: any) => any,
  fill: any,
  blit: any,
  concat: (sep: any, l: any) => any,
  iter: (f: any, s: any) => any,
  iteri: (f: any, s: any) => any,
  map: (f: any, s: any) => any,
  mapi: (f: any, s: any) => any,
  trim: (s: any) => any,
  escaped: (s: any) => any,
  index: (s: any, c: any) => any,
  index_opt: (s: any, c: any) => any,
  rindex: (s: any, c: any) => any,
  rindex_opt: (s: any, c: any) => any,
  index_from: (s: any, i: any, c: any) => any,
  index_from_opt: (s: any, i: any, c: any) => any,
  rindex_from: (s: any, i: any, c: any) => any,
  rindex_from_opt: (s: any, i: any, c: any) => any,
  contains: (s: any, c: any) => any,
  contains_from: (s: any, i: any, c: any) => any,
  rcontains_from: (s: any, i: any, c: any) => any,
  uppercase: (s: any) => any,
  lowercase: (s: any) => any,
  capitalize: (s: any) => any,
  uncapitalize: (s: any) => any,
  uppercase_ascii: (s: any) => any,
  lowercase_ascii: (s: any) => any,
  capitalize_ascii: (s: any) => any,
  uncapitalize_ascii: (s: any) => any,
  compare: (x: any, y: any) => any,
  split_on_char: (sep: any, s: any) => any,
  to_seq: (s: any) => any,
  to_seqi: (s: any) => any,
  of_seq: (g: any) => any,
}*/
/** @type {{
  make: (n: any, c: any) => any,
  init: (n: any, f: any) => any,
  copy: (s: any) => any,
  sub: (s: any, ofs: any, len: any) => any,
  fill: any,
  blit: any,
  concat: (sep: any, l: any) => any,
  iter: (f: any, s: any) => any,
  iteri: (f: any, s: any) => any,
  map: (f: any, s: any) => any,
  mapi: (f: any, s: any) => any,
  trim: (s: any) => any,
  escaped: (s: any) => any,
  index: (s: any, c: any) => any,
  index_opt: (s: any, c: any) => any,
  rindex: (s: any, c: any) => any,
  rindex_opt: (s: any, c: any) => any,
  index_from: (s: any, i: any, c: any) => any,
  index_from_opt: (s: any, i: any, c: any) => any,
  rindex_from: (s: any, i: any, c: any) => any,
  rindex_from_opt: (s: any, i: any, c: any) => any,
  contains: (s: any, c: any) => any,
  contains_from: (s: any, i: any, c: any) => any,
  rcontains_from: (s: any, i: any, c: any) => any,
  uppercase: (s: any) => any,
  lowercase: (s: any) => any,
  capitalize: (s: any) => any,
  uncapitalize: (s: any) => any,
  uppercase_ascii: (s: any) => any,
  lowercase_ascii: (s: any) => any,
  capitalize_ascii: (s: any) => any,
  uncapitalize_ascii: (s: any) => any,
  compare: (x: any, y: any) => any,
  split_on_char: (sep: any, s: any) => any,
  to_seq: (s: any) => any,
  to_seqi: (s: any) => any,
  of_seq: (g: any) => any,
}} */
module.exports = ((module.exports /*:: : any*/) /*:: :Exports */);
module.exports.make = module.exports[1];
module.exports.init = module.exports[2];
module.exports.copy = module.exports[3];
module.exports.sub = module.exports[4];
module.exports.fill = module.exports[5];
module.exports.blit = module.exports[6];
module.exports.concat = module.exports[7];
module.exports.iter = module.exports[8];
module.exports.iteri = module.exports[9];
module.exports.map = module.exports[10];
module.exports.mapi = module.exports[11];
module.exports.trim = module.exports[12];
module.exports.escaped = module.exports[13];
module.exports.index = module.exports[14];
module.exports.index_opt = module.exports[15];
module.exports.rindex = module.exports[16];
module.exports.rindex_opt = module.exports[17];
module.exports.index_from = module.exports[18];
module.exports.index_from_opt = module.exports[19];
module.exports.rindex_from = module.exports[20];
module.exports.rindex_from_opt = module.exports[21];
module.exports.contains = module.exports[22];
module.exports.contains_from = module.exports[23];
module.exports.rcontains_from = module.exports[24];
module.exports.uppercase = module.exports[25];
module.exports.lowercase = module.exports[26];
module.exports.capitalize = module.exports[27];
module.exports.uncapitalize = module.exports[28];
module.exports.uppercase_ascii = module.exports[29];
module.exports.lowercase_ascii = module.exports[30];
module.exports.capitalize_ascii = module.exports[31];
module.exports.uncapitalize_ascii = module.exports[32];
module.exports.compare = module.exports[33];
module.exports.split_on_char = module.exports[35];
module.exports.to_seq = module.exports[36];
module.exports.to_seqi = module.exports[37];
module.exports.of_seq = module.exports[38];

/* Hashing disabled */
