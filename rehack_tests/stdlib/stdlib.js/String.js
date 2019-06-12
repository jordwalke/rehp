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
  var cy = call1(bos, s);
  return call1(bts, call1(Bytes[4], cy));
}

function sub(s, ofs, len) {
  var cx = call1(bos, s);
  return call1(bts, call3(Bytes[7], cx, ofs, len));
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
      var cv = param__0[2];
      var cw = param__0[1];
      if (cv) {
        var acc__1 = ensure_ge(
          (caml_ml_string_length(cw) + seplen | 0) + acc__0 | 0,
          acc__0
        );
        var acc__0 = acc__1;
        var param__0 = cv;
        continue;
      }
      return caml_ml_string_length(cw) + acc__0 | 0;
    }
    return acc__0;
  }
}

function unsafe_blits(dst, pos, sep, seplen, param) {
  var pos__0 = pos;
  var param__0 = param;
  for (; ; ) {
    if (param__0) {
      var ct = param__0[2];
      var cu = param__0[1];
      if (ct) {
        caml_blit_string(cu, 0, dst, pos__0, caml_ml_string_length(cu));
        caml_blit_string(
          sep,
          0,
          dst,
          pos__0 + caml_ml_string_length(cu) | 0,
          seplen
        );
        var pos__1 = (pos__0 + caml_ml_string_length(cu) | 0) + seplen | 0;
        var pos__0 = pos__1;
        var param__0 = ct;
        continue;
      }
      caml_blit_string(cu, 0, dst, pos__0, caml_ml_string_length(cu));
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
  var cr = caml_ml_string_length(s) + -1 | 0;
  var cq = 0;
  if (! (cr < 0)) {
    var i = cq;
    for (; ; ) {
      call1(f, caml_bytes_unsafe_get(s, i));
      var cs = i + 1 | 0;
      if (cr !== i) {var i = cs;continue;}
      break;
    }
  }
  return 0;
}

function iteri(f, s) {
  var co = caml_ml_string_length(s) + -1 | 0;
  var cn = 0;
  if (! (co < 0)) {
    var i = cn;
    for (; ; ) {
      call2(f, i, caml_bytes_unsafe_get(s, i));
      var cp = i + 1 | 0;
      if (co !== i) {var i = cp;continue;}
      break;
    }
  }
  return 0;
}

function map(f, s) {
  var cm = call1(bos, s);
  return call1(bts, call2(Bytes[17], f, cm));
}

function mapi(f, s) {
  var cl = call1(bos, s);
  return call1(bts, call2(Bytes[18], f, cl));
}

function is_space(param) {
  var ck = param + -9 | 0;
  var switch__0 = 4 < ck >>> 0 ? 23 === ck ? 1 : 0 : 2 === ck ? 0 : 1;
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
  var cj = call1(bos, s);
  return call1(bts, call1(Bytes[19], cj));
}

function escaped(s) {
  function needs_escape(i) {
    var i__0 = i;
    for (; ; ) {
      if (caml_ml_string_length(s) <= i__0) {return 0;}
      var match = caml_bytes_unsafe_get(s, i__0);
      if (32 <= match) {
        var ci = match + -34 | 0;
        if (58 < ci >>> 0) if (93 <= ci) {
          var switch__0 = 0;
          var switch__1 = 0;
        }
        else var switch__1 = 1;
        else if (56 < (ci + -1 | 0) >>> 0) {
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
    var ch = call1(bos, s);
    return call1(bts, call1(Bytes[20], ch));
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
      try {index_rec(s, l, i, c);var cf = 1;return cf;}
      catch(cg) {
        cg = caml_wrap_exception(cg);
        if (cg === Not_found) {return 0;}
        throw runtime["caml_wrap_thrown_exception_reraise"](cg);
      }
    }
  }
  return call1(Pervasives[1], cst_String_contains_from_Bytes_contains_from);
}

function contains(s, c) {return contains_from(s, 0, c);}

function rcontains_from(s, i, c) {
  if (0 <= i) {
    if (! (caml_ml_string_length(s) <= i)) {
      try {rindex_rec(s, i, c);var cd = 1;return cd;}
      catch(ce) {
        ce = caml_wrap_exception(ce);
        if (ce === Not_found) {return 0;}
        throw runtime["caml_wrap_thrown_exception_reraise"](ce);
      }
    }
  }
  return call1(Pervasives[1], cst_String_rcontains_from_Bytes_rcontains_from);
}

function uppercase_ascii(s) {
  var cc = call1(bos, s);
  return call1(bts, call1(Bytes[36], cc));
}

function lowercase_ascii(s) {
  var cb = call1(bos, s);
  return call1(bts, call1(Bytes[37], cb));
}

function capitalize_ascii(s) {
  var ca = call1(bos, s);
  return call1(bts, call1(Bytes[38], ca));
}

function uncapitalize_ascii(s) {
  var b_ = call1(bos, s);
  return call1(bts, call1(Bytes[39], b_));
}

function compare(x, y) {return runtime["caml_string_compare"](x, y);}

function split_on_char(sep, s) {
  var r = [0,0];
  var j = [0,caml_ml_string_length(s)];
  var b6 = caml_ml_string_length(s) + -1 | 0;
  if (! (b6 < 0)) {
    var i = b6;
    for (; ; ) {
      if (caml_bytes_unsafe_get(s, i) === sep) {
        var b8 = r[1];
        r[1] = [0,sub(s, i + 1 | 0, (j[1] - i | 0) + -1 | 0),b8];
        j[1] = i;
      }
      var b9 = i + -1 | 0;
      if (0 !== i) {var i = b9;continue;}
      break;
    }
  }
  var b7 = r[1];
  return [0,sub(s, 0, j[1]),b7];
}

function uppercase(s) {
  var b5 = call1(bos, s);
  return call1(bts, call1(Bytes[32], b5));
}

function lowercase(s) {
  var b4 = call1(bos, s);
  return call1(bts, call1(Bytes[33], b4));
}

function capitalize(s) {
  var b3 = call1(bos, s);
  return call1(bts, call1(Bytes[34], b3));
}

function uncapitalize(s) {
  var b2 = call1(bos, s);
  return call1(bts, call1(Bytes[35], b2));
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
  function(b1, b0) {return caml_string_equal(b1, b0);},
  split_on_char
];

runtime["caml_register_global"](12, String, "String_");


module.exports = global.jsoo_runtime.caml_get_global_data().String_;