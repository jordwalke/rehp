/**
 * Bytes
 * @providesModule Bytes
 */
"use strict";
var Char = require('Char.js');
var Pervasives = require('Pervasives.js');
var Not_found = require('Not_found.js');
var runtime = require('runtime.js');

let joo_global_object = global;


var runtime = joo_global_object.jsoo_runtime;
var caml_blit_bytes = runtime["caml_blit_bytes"];
var caml_bytes_unsafe_get = runtime["caml_bytes_unsafe_get"];
var caml_bytes_unsafe_set = runtime["caml_bytes_unsafe_set"];
var caml_create_bytes = runtime["caml_create_bytes"];
var caml_fill_bytes = runtime["caml_fill_bytes"];
var caml_ml_bytes_length = runtime["caml_ml_bytes_length"];
var caml_new_string = runtime["caml_new_string"];
var caml_wrap_exception = runtime["caml_wrap_exception"];

function caml_call1(f, a0) {
  return f.length === 1 ? f(a0) : runtime["caml_call_gen"](f, [a0]);
}

function caml_call2(f, a0, a1) {
  return f.length === 2 ? f(a0, a1) : runtime["caml_call_gen"](f, [a0,a1]);
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
var cst_Bytes_concat = caml_new_string("Bytes.concat");
var cst_String_blit_Bytes_blit_string = caml_new_string(
  "String.blit / Bytes.blit_string"
);
var cst_Bytes_blit = caml_new_string("Bytes.blit");
var cst_String_fill_Bytes_fill = caml_new_string("String.fill / Bytes.fill");
var cst_Bytes_extend = caml_new_string("Bytes.extend");
var cst_String_sub_Bytes_sub = caml_new_string("String.sub / Bytes.sub");
var Not_found = global_data["Not_found"];
var Char = global_data["Char"];
var Pervasives = global_data["Pervasives"];

function make(n, c) {
  var s = caml_create_bytes(n);
  caml_fill_bytes(s, 0, n, c);
  return s;
}

function init(n, f) {
  var s = caml_create_bytes(n);
  var bY = n + -1 | 0;
  var bX = 0;
  if (! (bY < 0)) {
    var i = bX;
    for (; ; ) {
      caml_bytes_unsafe_set(s, i, caml_call1(f, i));
      var bZ = i + 1 | 0;
      if (bY !== i) {var i = bZ;continue;}
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
  return caml_call1(Pervasives[1], cst_String_sub_Bytes_sub);
}

function sub_string(b, ofs, len) {return sub(b, ofs, len);}

function bk(a, b) {
  var c = a + b | 0;
  var bW = b < 0 ? 1 : 0;
  var match = c < 0 ? 1 : 0;
  if (0 === (a < 0 ? 1 : 0)) if (0 === bW) if (
    0 === match
  ) var switch__0 = 0;
  else var switch__0 = 1;
  else var switch__0 = 0;
  else if (0 === bW) var switch__0 = 0;
  else if (0 === match) var switch__0 = 1;else var switch__0 = 0;
  return switch__0 ? caml_call1(Pervasives[1], cst_Bytes_extend) : c;
}

function extend(s, left, right) {
  var len = bk(bk(caml_ml_bytes_length(s), left), right);
  var r = caml_create_bytes(len);
  if (0 <= left) {
    var srcoff = 0;
    var srcoff__0 = srcoff;
    var dstoff = left;
  }
  else {var bU = 0;var bV = - left | 0;var srcoff__0 = bV;var dstoff = bU;}
  var cpylen = caml_call2(
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
  return caml_call1(Pervasives[1], cst_String_fill_Bytes_fill);
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
  return caml_call1(Pervasives[1], cst_Bytes_blit);
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
  return caml_call1(Pervasives[1], cst_String_blit_Bytes_blit_string);
}

function iter(f, a) {
  var bS = caml_ml_bytes_length(a) + -1 | 0;
  var bR = 0;
  if (! (bS < 0)) {
    var i = bR;
    for (; ; ) {
      caml_call1(f, caml_bytes_unsafe_get(a, i));
      var bT = i + 1 | 0;
      if (bS !== i) {var i = bT;continue;}
      break;
    }
  }
  return 0;
}

function iteri(f, a) {
  var bP = caml_ml_bytes_length(a) + -1 | 0;
  var bO = 0;
  if (! (bP < 0)) {
    var i = bO;
    for (; ; ) {
      caml_call2(f, i, caml_bytes_unsafe_get(a, i));
      var bQ = i + 1 | 0;
      if (bP !== i) {var i = bQ;continue;}
      break;
    }
  }
  return 0;
}

function ensure_ge(x, y) {
  return y <= x ? x : caml_call1(Pervasives[1], cst_Bytes_concat);
}

function sum_lengths(acc, seplen, param) {
  var acc__0 = acc;
  var param__0 = param;
  for (; ; ) {
    if (param__0) {
      var bM = param__0[2];
      var bN = param__0[1];
      if (bM) {
        var acc__1 = ensure_ge(
          (caml_ml_bytes_length(bN) + seplen | 0) + acc__0 | 0,
          acc__0
        );
        var acc__0 = acc__1;
        var param__0 = bM;
        continue;
      }
      return caml_ml_bytes_length(bN) + acc__0 | 0;
    }
    return acc__0;
  }
}

function unsafe_blits(dst, pos, sep, seplen, param) {
  var pos__0 = pos;
  var param__0 = param;
  for (; ; ) {
    if (param__0) {
      var bK = param__0[2];
      var bL = param__0[1];
      if (bK) {
        caml_blit_bytes(bL, 0, dst, pos__0, caml_ml_bytes_length(bL));
        caml_blit_bytes(
          sep,
          0,
          dst,
          pos__0 + caml_ml_bytes_length(bL) | 0,
          seplen
        );
        var pos__1 = (pos__0 + caml_ml_bytes_length(bL) | 0) + seplen | 0;
        var pos__0 = pos__1;
        var param__0 = bK;
        continue;
      }
      caml_blit_bytes(bL, 0, dst, pos__0, caml_ml_bytes_length(bL));
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
  var bJ = param + -9 | 0;
  if (4 < bJ >>> 0) if (23 === bJ) var switch__0 = 1;
  else var switch__0 = 0;
  else if (2 === bJ) var switch__0 = 0;else var switch__0 = 1;
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
  var bC = caml_ml_bytes_length(s) + -1 | 0;
  var bB = 0;
  if (! (bC < 0)) {
    var i__0 = bB;
    for (; ; ) {
      var match = caml_bytes_unsafe_get(s, i__0);
      if (32 <= match) {
        var bG = match + -34 | 0;
        if (58 < bG >>> 0) if (93 <= bG) {
          var switch__0 = 0;
          var switch__1 = 0;
        }
        else var switch__1 = 1;
        else if (56 < (bG + -1 | 0) >>> 0) {
          var switch__0 = 1;
          var switch__1 = 0;
        }
        else var switch__1 = 1;
        if (switch__1) {var bH = 1;var switch__0 = 2;}
      }
      else if (11 <= match) if (13 === match
      ) var switch__0 = 1;
      else var switch__0 = 0;
      else if (8 <= match) var switch__0 = 1;else var switch__0 = 0;
      switch (switch__0) {case 0:var bH = 4;break;case 1:var bH = 2;break}
      n[1] = n[1] + bH | 0;
      var bI = i__0 + 1 | 0;
      if (bC !== i__0) {var i__0 = bI;continue;}
      break;
    }
  }
  if (n[1] === caml_ml_bytes_length(s)) {return copy(s);}
  var s__0 = caml_create_bytes(n[1]);
  n[1] = 0;
  var bE = caml_ml_bytes_length(s) + -1 | 0;
  var bD = 0;
  if (! (bE < 0)) {
    var i = bD;
    for (; ; ) {
      var c = caml_bytes_unsafe_get(s, i);
      if (35 <= c) if (92 === c
      ) var switch__2 = 1;
      else if (127 <= c) var switch__2 = 0;else var switch__2 = 2;
      else if (32 <= c) if (34 <= c) var switch__2 = 1;
      else var switch__2 = 2;
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
      var bF = i + 1 | 0;
      if (bE !== i) {var i = bF;continue;}
      break;
    }
  }
  return s__0;
}

function map(f, s) {
  var l = caml_ml_bytes_length(s);
  if (0 === l) {return s;}
  var r = caml_create_bytes(l);
  var bz = l + -1 | 0;
  var by = 0;
  if (! (bz < 0)) {
    var i = by;
    for (; ; ) {
      caml_bytes_unsafe_set(r, i, caml_call1(f, caml_bytes_unsafe_get(s, i)));
      var bA = i + 1 | 0;
      if (bz !== i) {var i = bA;continue;}
      break;
    }
  }
  return r;
}

function mapi(f, s) {
  var l = caml_ml_bytes_length(s);
  if (0 === l) {return s;}
  var r = caml_create_bytes(l);
  var bw = l + -1 | 0;
  var bv = 0;
  if (! (bw < 0)) {
    var i = bv;
    for (; ; ) {
      caml_bytes_unsafe_set(
        r,
        i,
        caml_call2(f, i, caml_bytes_unsafe_get(s, i))
      );
      var bx = i + 1 | 0;
      if (bw !== i) {var i = bx;continue;}
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
  caml_bytes_unsafe_set(r, 0, caml_call1(f, caml_bytes_unsafe_get(s, 0)));
  return r;
}

function capitalize_ascii(s) {return apply1(Char[6], s);}

function uncapitalize_ascii(s) {return apply1(Char[5], s);}

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
  return caml_call1(Pervasives[1], cst_String_index_from_Bytes_index_from);
}

function index_from_opt(s, i, c) {
  var l = caml_ml_bytes_length(s);
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
  return rindex_rec(s, caml_ml_bytes_length(s) + -1 | 0, c);
}

function rindex_from(s, i, c) {
  if (-1 <= i) {
    if (! (caml_ml_bytes_length(s) <= i)) {return rindex_rec(s, i, c);}
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
  return rindex_rec_opt(s, caml_ml_bytes_length(s) + -1 | 0, c);
}

function rindex_from_opt(s, i, c) {
  if (-1 <= i) {
    if (! (caml_ml_bytes_length(s) <= i)) {return rindex_rec_opt(s, i, c);}
  }
  return caml_call1(
    Pervasives[1],
    cst_String_rindex_from_opt_Bytes_rindex_from_opt
  );
}

function contains_from(s, i, c) {
  var l = caml_ml_bytes_length(s);
  if (0 <= i) {
    if (! (l < i)) {
      try {index_rec(s, l, i, c);var bt = 1;return bt;}
      catch(bu) {
        bu = caml_wrap_exception(bu);
        if (bu === Not_found) {return 0;}
        throw runtime["caml_wrap_thrown_exception_reraise"](bu);
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
    if (! (caml_ml_bytes_length(s) <= i)) {
      try {rindex_rec(s, i, c);var br = 1;return br;}
      catch(bs) {
        bs = caml_wrap_exception(bs);
        if (bs === Not_found) {return 0;}
        throw runtime["caml_wrap_thrown_exception_reraise"](bs);
      }
    }
  }
  return caml_call1(
    Pervasives[1],
    cst_String_rcontains_from_Bytes_rcontains_from
  );
}

function compare(x, y) {return runtime["caml_bytes_compare"](x, y);}

function uppercase(s) {return map(Char[4], s);}

function lowercase(s) {return map(Char[3], s);}

function capitalize(s) {return apply1(Char[4], s);}

function uncapitalize(s) {return apply1(Char[3], s);}

function bl(bq) {return bq;}

function bm(bp) {return bp;}

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
  function(bo, bn) {return runtime["caml_bytes_equal"](bo, bn);},
  bm,
  bl
];

runtime["caml_register_global"](15, Bytes, "Bytes");


module.exports = global.jsoo_runtime.caml_get_global_data().Bytes;