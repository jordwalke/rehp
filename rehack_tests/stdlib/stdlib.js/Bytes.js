/**
 * @flow strict
 * Bytes
 */

// @ts-check


"use strict";
let joo_global_object = typeof global !== 'undefined' ? global : window;
require('runtime.js');

var runtime = joo_global_object.jsoo_runtime;
var caml_blit_bytes = runtime["caml_blit_bytes"];
var caml_bytes_unsafe_get = runtime["caml_bytes_unsafe_get"];
var caml_bytes_unsafe_set = runtime["caml_bytes_unsafe_set"];
var caml_create_bytes = runtime["caml_create_bytes"];
var caml_fill_bytes = runtime["caml_fill_bytes"];
var caml_ml_bytes_length = runtime["caml_ml_bytes_length"];
var string = runtime["caml_new_string"];
var caml_wrap_thrown_exception = runtime["caml_wrap_thrown_exception"];
var caml_wrap_thrown_exception_reraise = runtime
 ["caml_wrap_thrown_exception_reraise"];

function call1(f, a0) {
  return f.length === 1 ? f(a0) : runtime["caml_call_gen"](f, [a0]);
}

function call2(f, a0, a1) {
  return f.length === 2 ? f(a0, a1) : runtime["caml_call_gen"](f, [a0,a1]);
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
var cst_Bytes_concat = string("Bytes.concat");
var cst_String_blit_Bytes_blit_string = string(
  "String.blit / Bytes.blit_string"
);
var cst_Bytes_blit = string("Bytes.blit");
var cst_String_fill_Bytes_fill = string("String.fill / Bytes.fill");
var cst_Bytes_extend = string("Bytes.extend");
var cst_String_sub_Bytes_sub = string("String.sub / Bytes.sub");
var Not_found = require("Not_found.js");
var Char = require("Char.js");
var Pervasives = require("Pervasives.js");

function make(n, c) {
  var s = caml_create_bytes(n);
  caml_fill_bytes(s, 0, n, c);
  return s;
}

function init(n, f) {
  var s = caml_create_bytes(n);
  var N_ = n + -1 | 0;
  var M_ = 0;
  if (! (N_ < 0)) {
    var i = M_;
    for (; ; ) {
      caml_bytes_unsafe_set(s, i, call1(f, i));
      var O_ = i + 1 | 0;
      if (N_ !== i) {var i = O_;continue;}
      break;
    }
  }
  return s;
}

var empty = caml_create_bytes(0);

function copy(s) {
  var len = caml_ml_bytes_length(s);
  var r = caml_create_bytes(len);
  caml_blit_bytes(s, 0, r, 0, len);
  return r;
}

function to_string(b) {return copy(b);}

function of_string(s) {return copy(s);}

function sub(s, ofs, len) {
  if (0 <= ofs) {
    if (0 <= len) {
      if (! ((caml_ml_bytes_length(s) - len | 0) < ofs)) {
        var r = caml_create_bytes(len);
        caml_blit_bytes(s, ofs, r, 0, len);
        return r;
      }
    }
  }
  return call1(Pervasives[1], cst_String_sub_Bytes_sub);
}

function sub_string(b, ofs, len) {return sub(b, ofs, len);}

function symbol(a, b) {
  var c = a + b | 0;
  var L_ = b < 0 ? 1 : 0;
  var match = c < 0 ? 1 : 0;
  var switch__0 = 0 === (a < 0 ? 1 : 0) ?
    0 === L_ ? 0 === match ? 0 : 1 : 0 :
    0 === L_ ? 0 : 0 === match ? 1 : 0;
  return switch__0 ? call1(Pervasives[1], cst_Bytes_extend) : c;
}

function extend(s, left, right) {
  var len = symbol(symbol(caml_ml_bytes_length(s), left), right);
  var r = caml_create_bytes(len);
  if (0 <= left) {
    var srcoff = 0;
    var srcoff__0 = srcoff;
    var dstoff = left;
  }
  else {var J_ = 0;var K_ = - left | 0;var srcoff__0 = K_;var dstoff = J_;}
  var cpylen = call2(
    Pervasives[4],
    caml_ml_bytes_length(s) - srcoff__0 | 0,
    len - dstoff | 0
  );
  if (0 < cpylen) {caml_blit_bytes(s, srcoff__0, r, dstoff, cpylen);}
  return r;
}

function fill(s, ofs, len, c) {
  if (0 <= ofs) {
    if (0 <= len) {
      if (! ((caml_ml_bytes_length(s) - len | 0) < ofs)) {return caml_fill_bytes(s, ofs, len, c);}
    }
  }
  return call1(Pervasives[1], cst_String_fill_Bytes_fill);
}

function blit(s1, ofs1, s2, ofs2, len) {
  if (0 <= len) {
    if (0 <= ofs1) {
      if (! ((caml_ml_bytes_length(s1) - len | 0) < ofs1)) {
        if (0 <= ofs2) {
          if (! ((caml_ml_bytes_length(s2) - len | 0) < ofs2)) {return caml_blit_bytes(s1, ofs1, s2, ofs2, len);}
        }
      }
    }
  }
  return call1(Pervasives[1], cst_Bytes_blit);
}

function blit_string(s1, ofs1, s2, ofs2, len) {
  if (0 <= len) {
    if (0 <= ofs1) {
      if (! ((runtime["caml_ml_string_length"](s1) - len | 0) < ofs1)) {
        if (0 <= ofs2) {
          if (! ((caml_ml_bytes_length(s2) - len | 0) < ofs2)) {
            return runtime["caml_blit_string"](s1, ofs1, s2, ofs2, len);
          }
        }
      }
    }
  }
  return call1(Pervasives[1], cst_String_blit_Bytes_blit_string);
}

function iter(f, a) {
  var H_ = caml_ml_bytes_length(a) + -1 | 0;
  var G_ = 0;
  if (! (H_ < 0)) {
    var i = G_;
    for (; ; ) {
      call1(f, caml_bytes_unsafe_get(a, i));
      var I_ = i + 1 | 0;
      if (H_ !== i) {var i = I_;continue;}
      break;
    }
  }
  return 0;
}

function iteri(f, a) {
  var E_ = caml_ml_bytes_length(a) + -1 | 0;
  var D_ = 0;
  if (! (E_ < 0)) {
    var i = D_;
    for (; ; ) {
      call2(f, i, caml_bytes_unsafe_get(a, i));
      var F_ = i + 1 | 0;
      if (E_ !== i) {var i = F_;continue;}
      break;
    }
  }
  return 0;
}

function ensure_ge(x, y) {
  return y <= x ? x : call1(Pervasives[1], cst_Bytes_concat);
}

function sum_lengths(acc, seplen, param) {
  var acc__0 = acc;
  var param__0 = param;
  for (; ; ) {
    if (param__0) {
      var B_ = param__0[2];
      var C_ = param__0[1];
      if (B_) {
        var acc__1 = ensure_ge(
          (caml_ml_bytes_length(C_) + seplen | 0) + acc__0 | 0,
          acc__0
        );
        var acc__0 = acc__1;
        var param__0 = B_;
        continue;
      }
      return caml_ml_bytes_length(C_) + acc__0 | 0;
    }
    return acc__0;
  }
}

function unsafe_blits(dst, pos, sep, seplen, param) {
  var pos__0 = pos;
  var param__0 = param;
  for (; ; ) {
    if (param__0) {
      var z_ = param__0[2];
      var A_ = param__0[1];
      if (z_) {
        caml_blit_bytes(A_, 0, dst, pos__0, caml_ml_bytes_length(A_));
        caml_blit_bytes(
          sep,
          0,
          dst,
          pos__0 + caml_ml_bytes_length(A_) | 0,
          seplen
        );
        var pos__1 = (pos__0 + caml_ml_bytes_length(A_) | 0) + seplen | 0;
        var pos__0 = pos__1;
        var param__0 = z_;
        continue;
      }
      caml_blit_bytes(A_, 0, dst, pos__0, caml_ml_bytes_length(A_));
      return dst;
    }
    return dst;
  }
}

function concat(sep, l) {
  if (l) {
    var seplen = caml_ml_bytes_length(sep);
    return unsafe_blits(
      caml_create_bytes(sum_lengths(0, seplen, l)),
      0,
      sep,
      seplen,
      l
    );
  }
  return empty;
}

function cat(s1, s2) {
  var l1 = caml_ml_bytes_length(s1);
  var l2 = caml_ml_bytes_length(s2);
  var r = caml_create_bytes(l1 + l2 | 0);
  caml_blit_bytes(s1, 0, r, 0, l1);
  caml_blit_bytes(s2, 0, r, l1, l2);
  return r;
}

function is_space(param) {
  var y_ = param + -9 | 0;
  var switch__0 = 4 < y_ >>> 0 ? 23 === y_ ? 1 : 0 : 2 === y_ ? 0 : 1;
  return switch__0 ? 1 : 0;
}

function trim(s) {
  var len = caml_ml_bytes_length(s);
  var i = [0,0];
  for (; ; ) {
    if (i[1] < len) {
      if (is_space(caml_bytes_unsafe_get(s, i[1]))) {i[1] += 1;continue;}
    }
    var j = [0,len + -1 | 0];
    for (; ; ) {
      if (i[1] <= j[1]) {
        if (is_space(caml_bytes_unsafe_get(s, j[1]))) {j[1] += -1;continue;}
      }
      return i[1] <= j[1] ? sub(s, i[1], (j[1] - i[1] | 0) + 1 | 0) : empty;
    }
  }
}

function escaped(s) {
  var n = [0,0];
  var r_ = caml_ml_bytes_length(s) + -1 | 0;
  var q_ = 0;
  if (! (r_ < 0)) {
    var i__0 = q_;
    for (; ; ) {
      var match = caml_bytes_unsafe_get(s, i__0);
      if (32 <= match) {
        var v_ = match + -34 | 0;
        if (58 < v_ >>> 0) if (93 <= v_) {
          var switch__0 = 0;
          var switch__1 = 0;
        }
        else var switch__1 = 1;
        else if (56 < (v_ + -1 | 0) >>> 0) {
          var switch__0 = 1;
          var switch__1 = 0;
        }
        else var switch__1 = 1;
        if (switch__1) {var w_ = 1;var switch__0 = 2;}
      }
      else var switch__0 = 11 <= match ?
        13 === match ? 1 : 0 :
        8 <= match ? 1 : 0;
      switch (switch__0) {case 0:var w_ = 4;break;case 1:var w_ = 2;break}
      n[1] = n[1] + w_ | 0;
      var x_ = i__0 + 1 | 0;
      if (r_ !== i__0) {var i__0 = x_;continue;}
      break;
    }
  }
  if (n[1] === caml_ml_bytes_length(s)) {return copy(s);}
  var s__0 = caml_create_bytes(n[1]);
  n[1] = 0;
  var t_ = caml_ml_bytes_length(s) + -1 | 0;
  var s_ = 0;
  if (! (t_ < 0)) {
    var i = s_;
    for (; ; ) {
      var c = caml_bytes_unsafe_get(s, i);
      if (35 <= c) var switch__2 = 92 ===
         c ?
        1 :
        127 <= c ? 0 : 2;
      else if (32 <= c) var switch__2 = 34 <=
         c ?
        1 :
        2;
      else if (14 <= c) var switch__2 = 0;
      else switch (c) {
        case 8:
          caml_bytes_unsafe_set(s__0, n[1], 92);
          n[1] += 1;
          caml_bytes_unsafe_set(s__0, n[1], 98);
          var switch__2 = 3;
          break;
        case 9:
          caml_bytes_unsafe_set(s__0, n[1], 92);
          n[1] += 1;
          caml_bytes_unsafe_set(s__0, n[1], 116);
          var switch__2 = 3;
          break;
        case 10:
          caml_bytes_unsafe_set(s__0, n[1], 92);
          n[1] += 1;
          caml_bytes_unsafe_set(s__0, n[1], 110);
          var switch__2 = 3;
          break;
        case 13:
          caml_bytes_unsafe_set(s__0, n[1], 92);
          n[1] += 1;
          caml_bytes_unsafe_set(s__0, n[1], 114);
          var switch__2 = 3;
          break;
        default:
          var switch__2 = 0
        }
      switch (switch__2) {
        case 0:
          caml_bytes_unsafe_set(s__0, n[1], 92);
          n[1] += 1;
          caml_bytes_unsafe_set(s__0, n[1], 48 + (c / 100 | 0) | 0);
          n[1] += 1;
          caml_bytes_unsafe_set(s__0, n[1], 48 + ((c / 10 | 0) % 10 | 0) | 0);
          n[1] += 1;
          caml_bytes_unsafe_set(s__0, n[1], 48 + (c % 10 | 0) | 0);
          break;
        case 1:
          caml_bytes_unsafe_set(s__0, n[1], 92);
          n[1] += 1;
          caml_bytes_unsafe_set(s__0, n[1], c);
          break;
        case 2:
          caml_bytes_unsafe_set(s__0, n[1], c);
          break
        }
      n[1] += 1;
      var u_ = i + 1 | 0;
      if (t_ !== i) {var i = u_;continue;}
      break;
    }
  }
  return s__0;
}

function map(f, s) {
  var l = caml_ml_bytes_length(s);
  if (0 === l) {return s;}
  var r = caml_create_bytes(l);
  var o_ = l + -1 | 0;
  var n_ = 0;
  if (! (o_ < 0)) {
    var i = n_;
    for (; ; ) {
      caml_bytes_unsafe_set(r, i, call1(f, caml_bytes_unsafe_get(s, i)));
      var p_ = i + 1 | 0;
      if (o_ !== i) {var i = p_;continue;}
      break;
    }
  }
  return r;
}

function mapi(f, s) {
  var l = caml_ml_bytes_length(s);
  if (0 === l) {return s;}
  var r = caml_create_bytes(l);
  var l_ = l + -1 | 0;
  var k_ = 0;
  if (! (l_ < 0)) {
    var i = k_;
    for (; ; ) {
      caml_bytes_unsafe_set(r, i, call2(f, i, caml_bytes_unsafe_get(s, i)));
      var m_ = i + 1 | 0;
      if (l_ !== i) {var i = m_;continue;}
      break;
    }
  }
  return r;
}

function uppercase_ascii(s) {return map(Char[6], s);}

function lowercase_ascii(s) {return map(Char[5], s);}

function apply1(f, s) {
  if (0 === caml_ml_bytes_length(s)) {return s;}
  var r = copy(s);
  caml_bytes_unsafe_set(r, 0, call1(f, caml_bytes_unsafe_get(s, 0)));
  return r;
}

function capitalize_ascii(s) {return apply1(Char[6], s);}

function uncapitalize_ascii(s) {return apply1(Char[5], s);}

function index_rec(s, lim, i, c) {
  var i__0 = i;
  for (; ; ) {
    if (lim <= i__0) {throw caml_wrap_thrown_exception(Not_found);}
    if (caml_bytes_unsafe_get(s, i__0) === c) {return i__0;}
    var i__1 = i__0 + 1 | 0;
    var i__0 = i__1;
    continue;
  }
}

function index(s, c) {return index_rec(s, caml_ml_bytes_length(s), 0, c);}

function index_rec_opt(s, lim, i, c) {
  var i__0 = i;
  for (; ; ) {
    if (lim <= i__0) {return 0;}
    if (caml_bytes_unsafe_get(s, i__0) === c) {return [0,i__0];}
    var i__1 = i__0 + 1 | 0;
    var i__0 = i__1;
    continue;
  }
}

function index_opt(s, c) {
  return index_rec_opt(s, caml_ml_bytes_length(s), 0, c);
}

function index_from(s, i, c) {
  var l = caml_ml_bytes_length(s);
  if (0 <= i) {if (! (l < i)) {return index_rec(s, l, i, c);}}
  return call1(Pervasives[1], cst_String_index_from_Bytes_index_from);
}

function index_from_opt(s, i, c) {
  var l = caml_ml_bytes_length(s);
  if (0 <= i) {if (! (l < i)) {return index_rec_opt(s, l, i, c);}}
  return call1(Pervasives[1], cst_String_index_from_opt_Bytes_index_from_opt);
}

function rindex_rec(s, i, c) {
  var i__0 = i;
  for (; ; ) {
    if (0 <= i__0) {
      if (caml_bytes_unsafe_get(s, i__0) === c) {return i__0;}
      var i__1 = i__0 + -1 | 0;
      var i__0 = i__1;
      continue;
    }
    throw caml_wrap_thrown_exception(Not_found);
  }
}

function rindex(s, c) {
  return rindex_rec(s, caml_ml_bytes_length(s) + -1 | 0, c);
}

function rindex_from(s, i, c) {
  if (-1 <= i) {
    if (! (caml_ml_bytes_length(s) <= i)) {return rindex_rec(s, i, c);}
  }
  return call1(Pervasives[1], cst_String_rindex_from_Bytes_rindex_from);
}

function rindex_rec_opt(s, i, c) {
  var i__0 = i;
  for (; ; ) {
    if (0 <= i__0) {
      if (caml_bytes_unsafe_get(s, i__0) === c) {return [0,i__0];}
      var i__1 = i__0 + -1 | 0;
      var i__0 = i__1;
      continue;
    }
    return 0;
  }
}

function rindex_opt(s, c) {
  return rindex_rec_opt(s, caml_ml_bytes_length(s) + -1 | 0, c);
}

function rindex_from_opt(s, i, c) {
  if (-1 <= i) {
    if (! (caml_ml_bytes_length(s) <= i)) {return rindex_rec_opt(s, i, c);}
  }
  return call1(Pervasives[1], cst_String_rindex_from_opt_Bytes_rindex_from_opt
  );
}

function contains_from(s, i, c) {
  var l = caml_ml_bytes_length(s);
  if (0 <= i) {
    if (! (l < i)) {
      try {index_rec(s, l, i, c);var i_ = 1;return i_;}
      catch(j_) {
        j_ = runtime["caml_wrap_exception"](j_);
        if (j_ === Not_found) {return 0;}
        throw caml_wrap_thrown_exception_reraise(j_);
      }
    }
  }
  return call1(Pervasives[1], cst_String_contains_from_Bytes_contains_from);
}

function contains(s, c) {return contains_from(s, 0, c);}

function rcontains_from(s, i, c) {
  if (0 <= i) {
    if (! (caml_ml_bytes_length(s) <= i)) {
      try {rindex_rec(s, i, c);var g_ = 1;return g_;}
      catch(h_) {
        h_ = runtime["caml_wrap_exception"](h_);
        if (h_ === Not_found) {return 0;}
        throw caml_wrap_thrown_exception_reraise(h_);
      }
    }
  }
  return call1(Pervasives[1], cst_String_rcontains_from_Bytes_rcontains_from);
}

function compare(x, y) {return runtime["caml_bytes_compare"](x, y);}

function uppercase(s) {return map(Char[4], s);}

function lowercase(s) {return map(Char[3], s);}

function capitalize(s) {return apply1(Char[4], s);}

function uncapitalize(s) {return apply1(Char[3], s);}

function a_(f_) {return f_;}

function b_(e_) {return e_;}

var Bytes = [
  0,
  make,
  init,
  empty,
  copy,
  of_string,
  to_string,
  sub,
  sub_string,
  extend,
  fill,
  blit,
  blit_string,
  concat,
  cat,
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
  function(d_, c_) {return runtime["caml_bytes_equal"](d_, c_);},
  b_,
  a_
];

exports = Bytes;

/*::type Exports = {
  compare: (x: any, y: any) => any,
  uncapitalize_ascii: (s: any) => any,
  capitalize_ascii: (s: any) => any,
  lowercase_ascii: (s: any) => any,
  uppercase_ascii: (s: any) => any,
  uncapitalize: (s: any) => any,
  capitalize: (s: any) => any,
  lowercase: (s: any) => any,
  uppercase: (s: any) => any,
  rcontains_from: (s: any, i: any, c: any) => any,
  contains_from: (s: any, i: any, c: any) => any,
  contains: (s: any, c: any) => any,
  rindex_from_opt: (s: any, i: any, c: any) => any,
  rindex_from: (s: any, i: any, c: any) => any,
  index_from_opt: (s: any, i: any, c: any) => any,
  index_from: (s: any, i: any, c: any) => any,
  rindex_opt: (s: any, c: any) => any,
  rindex: (s: any, c: any) => any,
  index_opt: (s: any, c: any) => any,
  index: (s: any, c: any) => any,
  escaped: (s: any) => any,
  trim: (s: any) => any,
  mapi: (f: any, s: any) => any,
  map: (f: any, s: any) => any,
  iteri: (f: any, a: any) => any,
  iter: (f: any, a: any) => any,
  cat: (s1: any, s2: any) => any,
  concat: (sep: any, l: any) => any,
  blit_string: (s1: any, ofs1: any, s2: any, ofs2: any, len: any) => any,
  blit: (s1: any, ofs1: any, s2: any, ofs2: any, len: any) => any,
  fill: (s: any, ofs: any, len: any, c: any) => any,
  extend: (s: any, left: any, right: any) => any,
  sub_string: (b: any, ofs: any, len: any) => any,
  sub: (s: any, ofs: any, len: any) => any,
  to_string: (b: any) => any,
  of_string: (s: any) => any,
  copy: (s: any) => any,
  empty: any
  init: (n: any, f: any) => any,
  make: (n: any, c: any) => any,
}*/
/** @type {{
  compare: (any, any) => any,
  uncapitalize_ascii: (any) => any,
  capitalize_ascii: (any) => any,
  lowercase_ascii: (any) => any,
  uppercase_ascii: (any) => any,
  uncapitalize: (any) => any,
  capitalize: (any) => any,
  lowercase: (any) => any,
  uppercase: (any) => any,
  rcontains_from: (any, any, any) => any,
  contains_from: (any, any, any) => any,
  contains: (any, any) => any,
  rindex_from_opt: (any, any, any) => any,
  rindex_from: (any, any, any) => any,
  index_from_opt: (any, any, any) => any,
  index_from: (any, any, any) => any,
  rindex_opt: (any, any) => any,
  rindex: (any, any) => any,
  index_opt: (any, any) => any,
  index: (any, any) => any,
  escaped: (any) => any,
  trim: (any) => any,
  mapi: (any, any) => any,
  map: (any, any) => any,
  iteri: (any, any) => any,
  iter: (any, any) => any,
  cat: (any, any) => any,
  concat: (any, any) => any,
  blit_string: (any, any, any, any, any) => any,
  blit: (any, any, any, any, any) => any,
  fill: (any, any, any, any) => any,
  extend: (any, any, any) => any,
  sub_string: (any, any, any) => any,
  sub: (any, any, any) => any,
  to_string: (any) => any,
  of_string: (any) => any,
  copy: (any) => any,
  empty: any,
  init: (any, any) => any,
  make: (any, any) => any,
}} */
module.exports = ((exports /*:: : any*/) /*:: :Exports */);
module.exports.compare = module.exports[40];
module.exports.uncapitalize_ascii = module.exports[39];
module.exports.capitalize_ascii = module.exports[38];
module.exports.lowercase_ascii = module.exports[37];
module.exports.uppercase_ascii = module.exports[36];
module.exports.uncapitalize = module.exports[35];
module.exports.capitalize = module.exports[34];
module.exports.lowercase = module.exports[33];
module.exports.uppercase = module.exports[32];
module.exports.rcontains_from = module.exports[31];
module.exports.contains_from = module.exports[30];
module.exports.contains = module.exports[29];
module.exports.rindex_from_opt = module.exports[28];
module.exports.rindex_from = module.exports[27];
module.exports.index_from_opt = module.exports[26];
module.exports.index_from = module.exports[25];
module.exports.rindex_opt = module.exports[24];
module.exports.rindex = module.exports[23];
module.exports.index_opt = module.exports[22];
module.exports.index = module.exports[21];
module.exports.escaped = module.exports[20];
module.exports.trim = module.exports[19];
module.exports.mapi = module.exports[18];
module.exports.map = module.exports[17];
module.exports.iteri = module.exports[16];
module.exports.iter = module.exports[15];
module.exports.cat = module.exports[14];
module.exports.concat = module.exports[13];
module.exports.blit_string = module.exports[12];
module.exports.blit = module.exports[11];
module.exports.fill = module.exports[10];
module.exports.extend = module.exports[9];
module.exports.sub_string = module.exports[8];
module.exports.sub = module.exports[7];
module.exports.to_string = module.exports[6];
module.exports.of_string = module.exports[5];
module.exports.copy = module.exports[4];
module.exports.empty = module.exports[3];
module.exports.init = module.exports[2];
module.exports.make = module.exports[1];

/* Hashing disabled */
