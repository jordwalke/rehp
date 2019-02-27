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
var caml_new_string = runtime["caml_new_string"];
var caml_string_equal = runtime["caml_string_equal"];
var caml_wrap_exception = runtime["caml_wrap_exception"];

function caml_call1(f, a0) {
  return f.length == 1 ? f(a0) : runtime["caml_call_gen"](f, [a0]);
}

function caml_call2(f, a0, a1) {
  return f.length == 2 ? f(a0, a1) : runtime["caml_call_gen"](f, [a0,a1]);
}

function caml_call3(f, a0, a1, a2) {
  return f.length == 3 ?
    f(a0, a1, a2) :
    runtime["caml_call_gen"](f, [a0,a1,a2]);
}

var global_data = runtime["caml_get_global_data"]();
var cst_String_rcontains_from_Bytes_rcontains_from = caml_new_string(
  "String.rcontains_from / Bytes.rcontains_from"
);
var cst_String_contains_from_Bytes_contains_from = caml_new_string(
  "String.contains_from / Bytes.contains_from"
);
var cst_String_rindex_from_opt_Bytes_rindex_from_opt = caml_new_string(
  "String.rindex_from_opt / Bytes.rindex_from_opt"
);
var cst_String_rindex_from_Bytes_rindex_from = caml_new_string(
  "String.rindex_from / Bytes.rindex_from"
);
var cst_String_index_from_opt_Bytes_index_from_opt = caml_new_string(
  "String.index_from_opt / Bytes.index_from_opt"
);
var cst_String_index_from_Bytes_index_from = caml_new_string(
  "String.index_from / Bytes.index_from"
);
var cst__0 = caml_new_string("");
var cst = caml_new_string("");
var cst_String_concat = caml_new_string("String.concat");
var Not_found = global_data["Not_found"];
var Bytes = global_data["Bytes"];
var Pervasives = global_data["Pervasives"];
var bts = Bytes[42];
var bos = Bytes[43];

function make(n, c) {return caml_call1(bts, caml_call2(Bytes[1], n, c));}

function init(n, f) {return caml_call1(bts, caml_call2(Bytes[2], n, f));}

function copy(s) {
  var cx = caml_call1(bos, s);
  return caml_call1(bts, caml_call1(Bytes[4], cx));
}

function sub(s, ofs, len) {
  var cw = caml_call1(bos, s);
  return caml_call1(bts, caml_call3(Bytes[7], cw, ofs, len));
}

var fill = Bytes[10];
var blit = Bytes[12];

function ensure_ge(x, y) {
  return y <= x ? x : caml_call1(Pervasives[1], cst_String_concat);
}

function sum_lengths(acc, seplen, param) {
  var acc__0 = acc;
  var param__0 = param;
  for (; ; ) {
    if (param__0) {
      var cu = param__0[2];
      var cv = param__0[1];
      if (cu) {
        var acc__1 = ensure_ge(
          (caml_ml_string_length(cv) + seplen | 0) + acc__0 | 0,
          acc__0
        );
        var acc__0 = acc__1;
        var param__0 = cu;
        continue;
      }
      return caml_ml_string_length(cv) + acc__0 | 0;
    }
    return acc__0;
  }
}

function unsafe_blits(dst, pos, sep, seplen, param) {
  var pos__0 = pos;
  var param__0 = param;
  for (; ; ) {
    if (param__0) {
      var cs = param__0[2];
      var ct = param__0[1];
      if (cs) {
        caml_blit_string(ct, 0, dst, pos__0, caml_ml_string_length(ct));
        caml_blit_string(
          sep,
          0,
          dst,
          pos__0 + caml_ml_string_length(ct) | 0,
          seplen
        );
        var pos__1 = (pos__0 + caml_ml_string_length(ct) | 0) + seplen | 0;
        var pos__0 = pos__1;
        var param__0 = cs;
        continue;
      }
      caml_blit_string(ct, 0, dst, pos__0, caml_ml_string_length(ct));
      return dst;
    }
    return dst;
  }
}

function concat(sep, l) {
  if (l) {
    var seplen = caml_ml_string_length(sep);
    return caml_call1(
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
  var cq = caml_ml_string_length(s) + -1 | 0;
  var cp = 0;
  if (! (cq < 0)) {
    var i = cp;
    for (; ; ) {
      caml_call1(f, caml_bytes_unsafe_get(s, i));
      var cr = i + 1 | 0;
      if (cq !== i) {var i = cr;continue;}
      break;
    }
  }
  return 0;
}

function iteri(f, s) {
  var cn = caml_ml_string_length(s) + -1 | 0;
  var cm = 0;
  if (! (cn < 0)) {
    var i = cm;
    for (; ; ) {
      caml_call2(f, i, caml_bytes_unsafe_get(s, i));
      var co = i + 1 | 0;
      if (cn !== i) {var i = co;continue;}
      break;
    }
  }
  return 0;
}

function map(f, s) {
  var cl = caml_call1(bos, s);
  return caml_call1(bts, caml_call2(Bytes[17], f, cl));
}

function mapi(f, s) {
  var ck = caml_call1(bos, s);
  return caml_call1(bts, caml_call2(Bytes[18], f, ck));
}

function is_space(param) {
  var cj = param + -9 | 0;
  var switch__0 = 4 < cj >>> 0 ? 23 === cj ? 1 : 0 : 2 === cj ? 0 : 1;
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
  var ci = caml_call1(bos, s);
  return caml_call1(bts, caml_call1(Bytes[19], ci));
}

function escaped(s) {
  function needs_escape(i) {
    var i__0 = i;
    for (; ; ) {
      if (caml_ml_string_length(s) <= i__0) {return 0;}
      var match = caml_bytes_unsafe_get(s, i__0);
      if (32 <= match) {
        var ch = match + -34 | 0;
        if (58 < ch >>> 0) if (93 <= ch) {
          var switch__0 = 0;
          var switch__1 = 0;
        }
        else var switch__1 = 1;
        else if (56 < (ch + -1 | 0) >>> 0) {
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
    var cg = caml_call1(bos, s);
    return caml_call1(bts, caml_call1(Bytes[20], cg));
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
  return caml_call1(Pervasives[1], cst_String_index_from_Bytes_index_from);
}

function index_from_opt(s, i, c) {
  var l = caml_ml_string_length(s);
  if (0 <= i) {if (! (l < i)) {return index_rec_opt(s, l, i, c);}}
  return caml_call1(
    Pervasives[1],
    cst_String_index_from_opt_Bytes_index_from_opt
  );
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
  return caml_call1(Pervasives[1], cst_String_rindex_from_Bytes_rindex_from);
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
  return caml_call1(
    Pervasives[1],
    cst_String_rindex_from_opt_Bytes_rindex_from_opt
  );
}

function contains_from(s, i, c) {
  var l = caml_ml_string_length(s);
  if (0 <= i) {
    if (! (l < i)) {
      try {index_rec(s, l, i, c);var ce = 1;return ce;}
      catch(cf) {
        cf = caml_wrap_exception(cf);
        if (cf === Not_found) {return 0;}
        throw runtime["caml_wrap_thrown_exception_reraise"](cf);
      }
    }
  }
  return caml_call1(
    Pervasives[1],
    cst_String_contains_from_Bytes_contains_from
  );
}

function contains(s, c) {return contains_from(s, 0, c);}

function rcontains_from(s, i, c) {
  if (0 <= i) {
    if (! (caml_ml_string_length(s) <= i)) {
      try {rindex_rec(s, i, c);var cc = 1;return cc;}
      catch(cd) {
        cd = caml_wrap_exception(cd);
        if (cd === Not_found) {return 0;}
        throw runtime["caml_wrap_thrown_exception_reraise"](cd);
      }
    }
  }
  return caml_call1(
    Pervasives[1],
    cst_String_rcontains_from_Bytes_rcontains_from
  );
}

function uppercase_ascii(s) {
  var cb = caml_call1(bos, s);
  return caml_call1(bts, caml_call1(Bytes[36], cb));
}

function lowercase_ascii(s) {
  var ca = caml_call1(bos, s);
  return caml_call1(bts, caml_call1(Bytes[37], ca));
}

function capitalize_ascii(s) {
  var b_ = caml_call1(bos, s);
  return caml_call1(bts, caml_call1(Bytes[38], b_));
}

function uncapitalize_ascii(s) {
  var b9 = caml_call1(bos, s);
  return caml_call1(bts, caml_call1(Bytes[39], b9));
}

function compare(x, y) {return runtime["caml_string_compare"](x, y);}

function split_on_char(sep, s) {
  var r = [0,0];
  var j = [0,caml_ml_string_length(s)];
  var b5 = caml_ml_string_length(s) + -1 | 0;
  if (! (b5 < 0)) {
    var i = b5;
    for (; ; ) {
      if (caml_bytes_unsafe_get(s, i) === sep) {
        var b7 = r[1];
        r[1] = [0,sub(s, i + 1 | 0, (j[1] - i | 0) + -1 | 0),b7];
        j[1] = i;
      }
      var b8 = i + -1 | 0;
      if (0 !== i) {var i = b8;continue;}
      break;
    }
  }
  var b6 = r[1];
  return [0,sub(s, 0, j[1]),b6];
}

function uppercase(s) {
  var b4 = caml_call1(bos, s);
  return caml_call1(bts, caml_call1(Bytes[32], b4));
}

function lowercase(s) {
  var b3 = caml_call1(bos, s);
  return caml_call1(bts, caml_call1(Bytes[33], b3));
}

function capitalize(s) {
  var b2 = caml_call1(bos, s);
  return caml_call1(bts, caml_call1(Bytes[34], b2));
}

function uncapitalize(s) {
  var b1 = caml_call1(bos, s);
  return caml_call1(bts, caml_call1(Bytes[35], b1));
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
  function(b0, bZ) {return caml_string_equal(b0, bZ);},
  split_on_char
];

runtime["caml_register_global"](12, String, "String_");


module.exports = global.jsoo_runtime.caml_get_global_data().String_;