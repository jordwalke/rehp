/**
 * String_
 * @providesModule String_
 */
"use strict";
var Bytes = require('Bytes.js');
var Pervasives = require('Pervasives.js');
var Not_found = require('Not_found.js');
var runtime = require('runtime.js');

let joo_global_object = global;



var runtime = joo_global_object.jsoo_runtime;
var caml_blit_string = runtime["caml_blit_string"];
var caml_bytes_unsafe_get = runtime["caml_bytes_unsafe_get"];
var caml_ml_string_length = runtime["caml_ml_string_length"];
var string = runtime["caml_new_string"];
var caml_string_equal = runtime["caml_string_equal"];
var caml_wrap_exception = runtime["caml_wrap_exception"];

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

var global_data = runtime["caml_get_global_data"]();
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
var Not_found = global_data["Not_found"];
var Bytes = global_data["Bytes"];
var Pervasives = global_data["Pervasives"];
var bts = Bytes[42];
var bos = Bytes[43];

function make(n, c) {return call1(bts, call2(Bytes[1], n, c));}

function init(n, f) {return call1(bts, call2(Bytes[2], n, f));}

function copy(s) {
  var J_ = call1(bos, s);
  return call1(bts, call1(Bytes[4], J_));
}

function sub(s, ofs, len) {
  var I_ = call1(bos, s);
  return call1(bts, call3(Bytes[7], I_, ofs, len));
}

var fill = Bytes[10];
var blit = Bytes[12];

function ensure_ge(x, y) {
  return y <= x ? x : call1(Pervasives[1], cst_String_concat);
}

function sum_lengths(acc, seplen, param) {
  var acc__0 = acc;
  var param__0 = param;
  for (; ; ) {
    if (param__0) {
      var G_ = param__0[2];
      var H_ = param__0[1];
      if (G_) {
        var acc__1 = ensure_ge(
          (caml_ml_string_length(H_) + seplen | 0) + acc__0 | 0,
          acc__0
        );
        var acc__0 = acc__1;
        var param__0 = G_;
        continue;
      }
      return caml_ml_string_length(H_) + acc__0 | 0;
    }
    return acc__0;
  }
}

function unsafe_blits(dst, pos, sep, seplen, param) {
  var pos__0 = pos;
  var param__0 = param;
  for (; ; ) {
    if (param__0) {
      var E_ = param__0[2];
      var F_ = param__0[1];
      if (E_) {
        caml_blit_string(F_, 0, dst, pos__0, caml_ml_string_length(F_));
        caml_blit_string(
          sep,
          0,
          dst,
          pos__0 + caml_ml_string_length(F_) | 0,
          seplen
        );
        var pos__1 = (pos__0 + caml_ml_string_length(F_) | 0) + seplen | 0;
        var pos__0 = pos__1;
        var param__0 = E_;
        continue;
      }
      caml_blit_string(F_, 0, dst, pos__0, caml_ml_string_length(F_));
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
  var C_ = caml_ml_string_length(s) + -1 | 0;
  var B_ = 0;
  if (! (C_ < 0)) {
    var i = B_;
    for (; ; ) {
      call1(f, caml_bytes_unsafe_get(s, i));
      var D_ = i + 1 | 0;
      if (C_ !== i) {var i = D_;continue;}
      break;
    }
  }
  return 0;
}

function iteri(f, s) {
  var z_ = caml_ml_string_length(s) + -1 | 0;
  var y_ = 0;
  if (! (z_ < 0)) {
    var i = y_;
    for (; ; ) {
      call2(f, i, caml_bytes_unsafe_get(s, i));
      var A_ = i + 1 | 0;
      if (z_ !== i) {var i = A_;continue;}
      break;
    }
  }
  return 0;
}

function map(f, s) {
  var x_ = call1(bos, s);
  return call1(bts, call2(Bytes[17], f, x_));
}

function mapi(f, s) {
  var w_ = call1(bos, s);
  return call1(bts, call2(Bytes[18], f, w_));
}

function is_space(param) {
  var v_ = param + -9 | 0;
  var switch__0 = 4 < v_ >>> 0 ? 23 === v_ ? 1 : 0 : 2 === v_ ? 0 : 1;
  return switch__0 ? 1 : 0;
}

function trim(s) {
  if (caml_string_equal(s, cst__0)) {return s;}
  if (! is_space(caml_bytes_unsafe_get(s, 0))) {
    if (
    !
    is_space(caml_bytes_unsafe_get(s, caml_ml_string_length(s) + -1 | 0))
    ) {return s;}
  }
  var u_ = call1(bos, s);
  return call1(bts, call1(Bytes[19], u_));
}

function escaped(s) {
  function needs_escape(i) {
    var i__0 = i;
    for (; ; ) {
      if (caml_ml_string_length(s) <= i__0) {return 0;}
      var match = caml_bytes_unsafe_get(s, i__0);
      if (32 <= match) {
        var t_ = match + -34 | 0;
        if (58 < t_ >>> 0) if (93 <= t_) {
          var switch__0 = 0;
          var switch__1 = 0;
        }
        else var switch__1 = 1;
        else if (56 < (t_ + -1 | 0) >>> 0) {
          var switch__0 = 1;
          var switch__1 = 0;
        }
        else var switch__1 = 1;
        if (switch__1) {var i__1 = i__0 + 1 | 0;var i__0 = i__1;continue;}
      }
      else var switch__0 = 11 <= match ?
        13 === match ? 1 : 0 :
        8 <= match ? 1 : 0;
      return switch__0 ? 1 : 1;
    }
  }
  if (needs_escape(0)) {
    var s_ = call1(bos, s);
    return call1(bts, call1(Bytes[20], s_));
  }
  return s;
}

function index_rec(s, lim, i, c) {
  var i__0 = i;
  for (; ; ) {
    if (lim <= i__0) {throw runtime["caml_wrap_thrown_exception"](Not_found);}
    if (caml_bytes_unsafe_get(s, i__0) === c) {return i__0;}
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
    if (caml_bytes_unsafe_get(s, i__0) === c) {return [0,i__0];}
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
  return call1(Pervasives[1], cst_String_index_from_Bytes_index_from);
}

function index_from_opt(s, i, c) {
  var l = caml_ml_string_length(s);
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
    throw runtime["caml_wrap_thrown_exception"](Not_found);
  }
}

function rindex(s, c) {
  return rindex_rec(s, caml_ml_string_length(s) + -1 | 0, c);
}

function rindex_from(s, i, c) {
  if (-1 <= i) {
    if (! (caml_ml_string_length(s) <= i)) {return rindex_rec(s, i, c);}
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
  return rindex_rec_opt(s, caml_ml_string_length(s) + -1 | 0, c);
}

function rindex_from_opt(s, i, c) {
  if (-1 <= i) {
    if (! (caml_ml_string_length(s) <= i)) {return rindex_rec_opt(s, i, c);}
  }
  return call1(Pervasives[1], cst_String_rindex_from_opt_Bytes_rindex_from_opt
  );
}

function contains_from(s, i, c) {
  var l = caml_ml_string_length(s);
  if (0 <= i) {
    if (! (l < i)) {
      try {index_rec(s, l, i, c);var q_ = 1;return q_;}
      catch(r_) {
        r_ = caml_wrap_exception(r_);
        if (r_ === Not_found) {return 0;}
        throw runtime["caml_wrap_thrown_exception_reraise"](r_);
      }
    }
  }
  return call1(Pervasives[1], cst_String_contains_from_Bytes_contains_from);
}

function contains(s, c) {return contains_from(s, 0, c);}

function rcontains_from(s, i, c) {
  if (0 <= i) {
    if (! (caml_ml_string_length(s) <= i)) {
      try {rindex_rec(s, i, c);var o_ = 1;return o_;}
      catch(p_) {
        p_ = caml_wrap_exception(p_);
        if (p_ === Not_found) {return 0;}
        throw runtime["caml_wrap_thrown_exception_reraise"](p_);
      }
    }
  }
  return call1(Pervasives[1], cst_String_rcontains_from_Bytes_rcontains_from);
}

function uppercase_ascii(s) {
  var n_ = call1(bos, s);
  return call1(bts, call1(Bytes[36], n_));
}

function lowercase_ascii(s) {
  var m_ = call1(bos, s);
  return call1(bts, call1(Bytes[37], m_));
}

function capitalize_ascii(s) {
  var l_ = call1(bos, s);
  return call1(bts, call1(Bytes[38], l_));
}

function uncapitalize_ascii(s) {
  var k_ = call1(bos, s);
  return call1(bts, call1(Bytes[39], k_));
}

function compare(x, y) {return runtime["caml_string_compare"](x, y);}

function split_on_char(sep, s) {
  var r = [0,0];
  var j = [0,caml_ml_string_length(s)];
  var g_ = caml_ml_string_length(s) + -1 | 0;
  if (! (g_ < 0)) {
    var i = g_;
    for (; ; ) {
      if (caml_bytes_unsafe_get(s, i) === sep) {
        var i_ = r[1];
        r[1] = [0,sub(s, i + 1 | 0, (j[1] - i | 0) + -1 | 0),i_];
        j[1] = i;
      }
      var j_ = i + -1 | 0;
      if (0 !== i) {var i = j_;continue;}
      break;
    }
  }
  var h_ = r[1];
  return [0,sub(s, 0, j[1]),h_];
}

function uppercase(s) {
  var f_ = call1(bos, s);
  return call1(bts, call1(Bytes[32], f_));
}

function lowercase(s) {
  var e_ = call1(bos, s);
  return call1(bts, call1(Bytes[33], e_));
}

function capitalize(s) {
  var d_ = call1(bos, s);
  return call1(bts, call1(Bytes[34], d_));
}

function uncapitalize(s) {
  var c_ = call1(bos, s);
  return call1(bts, call1(Bytes[35], c_));
}

var String = [
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
  split_on_char
];

runtime["caml_register_global"](12, String, "String_");


module.exports = global.jsoo_runtime.caml_get_global_data().String_;
/*____hashes compiler:hashing-disabled inputs:hashing-disabled bytecode:hashing-disabled*/
