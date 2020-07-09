/**
 * @flow strict
 * Stdlib__bytes
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

var caml_blit_bytes = runtime["caml_blit_bytes"];
var caml_bswap16 = runtime["caml_bswap16"];
var caml_bytes_get = runtime["caml_bytes_get"];
var caml_bytes_get16 = runtime["caml_bytes_get16"];
var caml_bytes_get32 = runtime["caml_bytes_get32"];
var caml_bytes_get64 = runtime["caml_bytes_get64"];
var caml_bytes_of_string = runtime["caml_bytes_of_string"];
var caml_bytes_set = runtime["caml_bytes_set"];
var caml_bytes_set16 = runtime["caml_bytes_set16"];
var caml_bytes_set32 = runtime["caml_bytes_set32"];
var caml_bytes_set64 = runtime["caml_bytes_set64"];
var caml_bytes_unsafe_get = runtime["caml_bytes_unsafe_get"];
var caml_bytes_unsafe_set = runtime["caml_bytes_unsafe_set"];
var caml_create_bytes = runtime["caml_create_bytes"];
var caml_fill_bytes = runtime["caml_fill_bytes"];
var caml_int32_bswap = runtime["caml_int32_bswap"];
var caml_int64_bswap = runtime["caml_int64_bswap"];
var caml_ml_bytes_length = runtime["caml_ml_bytes_length"];
var string = runtime["caml_new_string"];
var caml_string_of_bytes = runtime["caml_string_of_bytes"];
var caml_wrap_thrown_exception = runtime["caml_wrap_thrown_exception"];
var caml_wrap_thrown_exception_reraise = runtime
 ["caml_wrap_thrown_exception_reraise"];
var cst_Bytes_of_seq_cannot_grow_bytes = string(
  "Bytes.of_seq: cannot grow bytes"
);
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
var Stdlib = require("./Stdlib.js");
var Stdlib_sys = require("./Stdlib__sys.js");
var Stdlib_seq = require("./Stdlib__seq.js");
var Stdlib_char = require("./Stdlib__char.js");

function make(n, c) {
  var s = caml_create_bytes(n);
  caml_fill_bytes(s, 0, n, c);
  return s;
}

function init(n, f) {
  var i;
  var aN_;
  var s = caml_create_bytes(n);
  var aM_ = n + -1 | 0;
  var aL_ = 0;
  if (! (aM_ < 0)) {
    i = aL_;
    for (; ; ) {
      caml_bytes_unsafe_set(s, i, call1(f, i));
      aN_ = i + 1 | 0;
      if (aM_ !== i) {i = aN_;continue;}
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

function to_string(b) {return caml_string_of_bytes(copy(b));}

function of_string(s) {return copy(caml_bytes_of_string(s));}

function sub(s, ofs, len) {
  var r;
  if (0 <= ofs) {
    if (0 <= len) {
      if (! ((caml_ml_bytes_length(s) - len | 0) < ofs)) {
        r = caml_create_bytes(len);
        caml_blit_bytes(s, ofs, r, 0, len);
        return r;
      }
    }
  }
  return call1(Stdlib[1], cst_String_sub_Bytes_sub);
}

function sub_string(b, ofs, len) {
  return caml_string_of_bytes(sub(b, ofs, len));
}

function symbol(a, b) {
  var c = a + b | 0;
  var aK_ = b < 0 ? 1 : 0;
  var match = c < 0 ? 1 : 0;
  var switch__0 = 0 === (a < 0 ? 1 : 0) ?
    0 === aK_ ? 0 === match ? 0 : 1 : 0 :
    0 === aK_ ? 0 : 0 === match ? 1 : 0;
  return switch__0 ? call1(Stdlib[1], cst_Bytes_extend) : c;
}

function extend(s, left, right) {
  var srcoff;
  var dstoff;
  var srcoff__0;
  var aI_;
  var aJ_;
  var len = symbol(symbol(caml_ml_bytes_length(s), left), right);
  var r = caml_create_bytes(len);
  if (0 <= left) {
    srcoff = 0;
    srcoff__0 = srcoff;
    dstoff = left;
  }
  else {aI_ = 0;aJ_ = - left | 0;srcoff__0 = aJ_;dstoff = aI_;}
  var cpylen = call2(
    Stdlib[16],
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
  return call1(Stdlib[1], cst_String_fill_Bytes_fill);
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
  return call1(Stdlib[1], cst_Bytes_blit);
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
  return call1(Stdlib[1], cst_String_blit_Bytes_blit_string);
}

function iter(f, a) {
  var i;
  var aH_;
  var aG_ = caml_ml_bytes_length(a) + -1 | 0;
  var aF_ = 0;
  if (! (aG_ < 0)) {
    i = aF_;
    for (; ; ) {
      call1(f, caml_bytes_unsafe_get(a, i));
      aH_ = i + 1 | 0;
      if (aG_ !== i) {i = aH_;continue;}
      break;
    }
  }
  return 0;
}

function iteri(f, a) {
  var i;
  var aE_;
  var aD_ = caml_ml_bytes_length(a) + -1 | 0;
  var aC_ = 0;
  if (! (aD_ < 0)) {
    i = aC_;
    for (; ; ) {
      call2(f, i, caml_bytes_unsafe_get(a, i));
      aE_ = i + 1 | 0;
      if (aD_ !== i) {i = aE_;continue;}
      break;
    }
  }
  return 0;
}

function ensure_ge(x, y) {
  return y <= x ? x : call1(Stdlib[1], cst_Bytes_concat);
}

function sum_lengths(acc, seplen, param) {
  var aA_;
  var aB_;
  var acc__1;
  var acc__0 = acc;
  var param__0 = param;
  for (; ; ) {
    if (param__0) {
      aA_ = param__0[2];
      aB_ = param__0[1];
      if (aA_) {
        acc__1 =
          ensure_ge(
            (caml_ml_bytes_length(aB_) + seplen | 0) + acc__0 | 0,
            acc__0
          );
        acc__0 = acc__1;
        param__0 = aA_;
        continue;
      }
      return caml_ml_bytes_length(aB_) + acc__0 | 0;
    }
    return acc__0;
  }
}

function unsafe_blits(dst, pos, sep, seplen, param) {
  var ay_;
  var az_;
  var pos__1;
  var pos__0 = pos;
  var param__0 = param;
  for (; ; ) {
    if (param__0) {
      ay_ = param__0[2];
      az_ = param__0[1];
      if (ay_) {
        caml_blit_bytes(az_, 0, dst, pos__0, caml_ml_bytes_length(az_));
        caml_blit_bytes(
          sep,
          0,
          dst,
          pos__0 + caml_ml_bytes_length(az_) | 0,
          seplen
        );
        pos__1 = (pos__0 + caml_ml_bytes_length(az_) | 0) + seplen | 0;
        pos__0 = pos__1;
        param__0 = ay_;
        continue;
      }
      caml_blit_bytes(az_, 0, dst, pos__0, caml_ml_bytes_length(az_));
      return dst;
    }
    return dst;
  }
}

function concat(sep, l) {
  var seplen;
  if (l) {
    seplen = caml_ml_bytes_length(sep);
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
  var ax_ = param + -9 | 0;
  var switch__0 = 4 < ax_ >>> 0 ? 23 === ax_ ? 1 : 0 : 2 === ax_ ? 0 : 1;
  return switch__0 ? 1 : 0;
}

function trim(s) {
  var j;
  var len = caml_ml_bytes_length(s);
  var i = [0,0];
  for (; ; ) {
    if (i[1] < len) {
      if (is_space(caml_bytes_unsafe_get(s, i[1]))) {i[1] = i[1] + 1;continue;}
    }
    j = [0,len + -1 | 0];
    for (; ; ) {
      if (i[1] <= j[1]) {
        if (is_space(caml_bytes_unsafe_get(s, j[1]))) {j[1] = j[1] + -1;continue;}
      }
      return i[1] <= j[1] ? sub(s, i[1], (j[1] - i[1] | 0) + 1 | 0) : empty;
    }
  }
}

function escaped(s) {
  var i;
  var c;
  var at_;
  var i__0;
  var match;
  var au_;
  var av_;
  var aw_;
  var switch__0;
  var switch__1;
  var switch__2;
  var n = [0,0];
  var aq_ = caml_ml_bytes_length(s) + -1 | 0;
  var ap_ = 0;
  if (! (aq_ < 0)) {
    i__0 = ap_;
    for (; ; ) {
      match = caml_bytes_unsafe_get(s, i__0);
      if (32 <= match) {
        au_ = match + -34 | 0;
        if (58 < au_ >>> 0) if (93 <= au_) {
          switch__0 = 0;
          switch__1 = 0;
        }
        else switch__1 = 1;
        else if (56 < (au_ + -1 | 0) >>> 0) {switch__0 = 1;switch__1 = 0;}
        else switch__1 = 1;
        if (switch__1) {av_ = 1;switch__0 = 2;}
      }
      else switch__0 = 11 <= match ? 13 === match ? 1 : 0 : 8 <= match ? 1 : 0;
      switch (switch__0) {case 0:av_ = 4;break;case 1:av_ = 2;break}
      n[1] = n[1] + av_ | 0;
      aw_ = i__0 + 1 | 0;
      if (aq_ !== i__0) {i__0 = aw_;continue;}
      break;
    }
  }
  if (n[1] === caml_ml_bytes_length(s)) {return copy(s);}
  var s__0 = caml_create_bytes(n[1]);
  n[1] = 0;
  var as_ = caml_ml_bytes_length(s) + -1 | 0;
  var ar_ = 0;
  if (! (as_ < 0)) {
    i = ar_;
    for (; ; ) {
      c = caml_bytes_unsafe_get(s, i);
      if (35 <= c) switch__2 =
        92 === c ? 1 : 127 <= c ? 0 : 2;
      else if (32 <= c) switch__2 =
        34 <= c ? 1 : 2;
      else if (14 <= c) switch__2 = 0;
      else switch (c) {
        case 8:
          caml_bytes_unsafe_set(s__0, n[1], 92);
          n[1] = n[1] + 1;
          caml_bytes_unsafe_set(s__0, n[1], 98);
          switch__2 = 3;
          break;
        case 9:
          caml_bytes_unsafe_set(s__0, n[1], 92);
          n[1] = n[1] + 1;
          caml_bytes_unsafe_set(s__0, n[1], 116);
          switch__2 = 3;
          break;
        case 10:
          caml_bytes_unsafe_set(s__0, n[1], 92);
          n[1] = n[1] + 1;
          caml_bytes_unsafe_set(s__0, n[1], 110);
          switch__2 = 3;
          break;
        case 13:
          caml_bytes_unsafe_set(s__0, n[1], 92);
          n[1] = n[1] + 1;
          caml_bytes_unsafe_set(s__0, n[1], 114);
          switch__2 = 3;
          break;
        default:
          switch__2 = 0
        }
      switch (switch__2) {
        case 0:
          caml_bytes_unsafe_set(s__0, n[1], 92);
          n[1] = n[1] + 1;
          caml_bytes_unsafe_set(s__0, n[1], 48 + (c / 100 | 0) | 0);
          n[1] = n[1] + 1;
          caml_bytes_unsafe_set(s__0, n[1], 48 + ((c / 10 | 0) % 10 | 0) | 0);
          n[1] = n[1] + 1;
          caml_bytes_unsafe_set(s__0, n[1], 48 + (c % 10 | 0) | 0);
          break;
        case 1:
          caml_bytes_unsafe_set(s__0, n[1], 92);
          n[1] = n[1] + 1;
          caml_bytes_unsafe_set(s__0, n[1], c);
          break;
        case 2:
          caml_bytes_unsafe_set(s__0, n[1], c);
          break
        }
      n[1] = n[1] + 1;
      at_ = i + 1 | 0;
      if (as_ !== i) {i = at_;continue;}
      break;
    }
  }
  return s__0;
}

function map(f, s) {
  var i;
  var ao_;
  var l = caml_ml_bytes_length(s);
  if (0 === l) {return s;}
  var r = caml_create_bytes(l);
  var an_ = l + -1 | 0;
  var am_ = 0;
  if (! (an_ < 0)) {
    i = am_;
    for (; ; ) {
      caml_bytes_unsafe_set(r, i, call1(f, caml_bytes_unsafe_get(s, i)));
      ao_ = i + 1 | 0;
      if (an_ !== i) {i = ao_;continue;}
      break;
    }
  }
  return r;
}

function mapi(f, s) {
  var i;
  var al_;
  var l = caml_ml_bytes_length(s);
  if (0 === l) {return s;}
  var r = caml_create_bytes(l);
  var ak_ = l + -1 | 0;
  var aj_ = 0;
  if (! (ak_ < 0)) {
    i = aj_;
    for (; ; ) {
      caml_bytes_unsafe_set(r, i, call2(f, i, caml_bytes_unsafe_get(s, i)));
      al_ = i + 1 | 0;
      if (ak_ !== i) {i = al_;continue;}
      break;
    }
  }
  return r;
}

function uppercase_ascii(s) {return map(Stdlib_char[6], s);}

function lowercase_ascii(s) {return map(Stdlib_char[5], s);}

function apply1(f, s) {
  if (0 === caml_ml_bytes_length(s)) {return s;}
  var r = copy(s);
  caml_bytes_unsafe_set(r, 0, call1(f, caml_bytes_unsafe_get(s, 0)));
  return r;
}

function capitalize_ascii(s) {return apply1(Stdlib_char[6], s);}

function uncapitalize_ascii(s) {return apply1(Stdlib_char[5], s);}

function index_rec(s, lim, i, c) {
  var i__1;
  var i__0 = i;
  for (; ; ) {
    if (lim <= i__0) {throw caml_wrap_thrown_exception(Stdlib[8]);}
    if (caml_bytes_unsafe_get(s, i__0) === c) {return i__0;}
    i__1 = i__0 + 1 | 0;
    i__0 = i__1;
    continue;
  }
}

function index(s, c) {return index_rec(s, caml_ml_bytes_length(s), 0, c);}

function index_rec_opt(s, lim, i, c) {
  var i__1;
  var i__0 = i;
  for (; ; ) {
    if (lim <= i__0) {return 0;}
    if (caml_bytes_unsafe_get(s, i__0) === c) {return [0,i__0];}
    i__1 = i__0 + 1 | 0;
    i__0 = i__1;
    continue;
  }
}

function index_opt(s, c) {
  return index_rec_opt(s, caml_ml_bytes_length(s), 0, c);
}

function index_from(s, i, c) {
  var l = caml_ml_bytes_length(s);
  if (0 <= i) {if (! (l < i)) {return index_rec(s, l, i, c);}}
  return call1(Stdlib[1], cst_String_index_from_Bytes_index_from);
}

function index_from_opt(s, i, c) {
  var l = caml_ml_bytes_length(s);
  if (0 <= i) {if (! (l < i)) {return index_rec_opt(s, l, i, c);}}
  return call1(Stdlib[1], cst_String_index_from_opt_Bytes_index_from_opt);
}

function rindex_rec(s, i, c) {
  var i__1;
  var i__0 = i;
  for (; ; ) {
    if (0 <= i__0) {
      if (caml_bytes_unsafe_get(s, i__0) === c) {return i__0;}
      i__1 = i__0 + -1 | 0;
      i__0 = i__1;
      continue;
    }
    throw caml_wrap_thrown_exception(Stdlib[8]);
  }
}

function rindex(s, c) {
  return rindex_rec(s, caml_ml_bytes_length(s) + -1 | 0, c);
}

function rindex_from(s, i, c) {
  if (-1 <= i) {
    if (! (caml_ml_bytes_length(s) <= i)) {return rindex_rec(s, i, c);}
  }
  return call1(Stdlib[1], cst_String_rindex_from_Bytes_rindex_from);
}

function rindex_rec_opt(s, i, c) {
  var i__1;
  var i__0 = i;
  for (; ; ) {
    if (0 <= i__0) {
      if (caml_bytes_unsafe_get(s, i__0) === c) {return [0,i__0];}
      i__1 = i__0 + -1 | 0;
      i__0 = i__1;
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
  return call1(Stdlib[1], cst_String_rindex_from_opt_Bytes_rindex_from_opt);
}

function contains_from(s, i, c) {
  var ah_;
  var l = caml_ml_bytes_length(s);
  if (0 <= i) {
    if (! (l < i)) {
      try {index_rec(s, l, i, c);ah_ = 1;return ah_;}
      catch(ai_) {
        ai_ = runtime["caml_wrap_exception"](ai_);
        if (ai_ === Stdlib[8]) {return 0;}
        throw caml_wrap_thrown_exception_reraise(ai_);
      }
    }
  }
  return call1(Stdlib[1], cst_String_contains_from_Bytes_contains_from);
}

function contains(s, c) {return contains_from(s, 0, c);}

function rcontains_from(s, i, c) {
  var af_;
  if (0 <= i) {
    if (! (caml_ml_bytes_length(s) <= i)) {
      try {rindex_rec(s, i, c);af_ = 1;return af_;}
      catch(ag_) {
        ag_ = runtime["caml_wrap_exception"](ag_);
        if (ag_ === Stdlib[8]) {return 0;}
        throw caml_wrap_thrown_exception_reraise(ag_);
      }
    }
  }
  return call1(Stdlib[1], cst_String_rcontains_from_Bytes_rcontains_from);
}

function compare(x, y) {return runtime["caml_bytes_compare"](x, y);}

function uppercase(s) {return map(Stdlib_char[4], s);}

function lowercase(s) {return map(Stdlib_char[3], s);}

function capitalize(s) {return apply1(Stdlib_char[4], s);}

function uncapitalize(s) {return apply1(Stdlib_char[3], s);}

function to_seq(s) {
  function aux(i, param) {
    if (i === caml_ml_bytes_length(s)) {return 0;}
    var x = caml_bytes_get(s, i);
    var ad_ = i + 1 | 0;
    return [0,x,function(ae_) {return aux(ad_, ae_);}];
  }
  var ab_ = 0;
  return function(ac_) {return aux(ab_, ac_);};
}

function to_seqi(s) {
  function aux(i, param) {
    if (i === caml_ml_bytes_length(s)) {return 0;}
    var x = caml_bytes_get(s, i);
    var Z_ = i + 1 | 0;
    return [0,[0,i,x],function(aa_) {return aux(Z_, aa_);}];
  }
  var X_ = 0;
  return function(Y_) {return aux(X_, Y_);};
}

function of_seq(i) {
  var n = [0,0];
  var buf = [0,make(256, 0)];
  function resize(param) {
    var new_len = call2(
      Stdlib[16],
      2 * caml_ml_bytes_length(buf[1]) | 0,
      Stdlib_sys[13]
    );
    if (caml_ml_bytes_length(buf[1]) === new_len) {
      call1(Stdlib[2], cst_Bytes_of_seq_cannot_grow_bytes);
    }
    var new_buf = make(new_len, 0);
    blit(buf[1], 0, new_buf, 0, n[1]);
    buf[1] = new_buf;
    return 0;
  }
  function W_(c) {
    if (n[1] === caml_ml_bytes_length(buf[1])) {resize(0);}
    caml_bytes_set(buf[1], n[1], c);
    n[1] = n[1] + 1;
    return 0;
  }
  call2(Stdlib_seq[8], W_, i);
  return sub(buf[1], 0, n[1]);
}

function get_int8(b, i) {
  var U_ = Stdlib_sys[11] + -8 | 0;
  var V_ = Stdlib_sys[11] + -8 | 0;
  return caml_bytes_get(b, i) << V_ >> U_;
}

function get_uint16_le(b, i) {
  return Stdlib_sys[12] ?
    caml_bswap16(caml_bytes_get16(b, i)) :
    caml_bytes_get16(b, i);
}

function get_uint16_be(b, i) {
  return Stdlib_sys[12] ?
    caml_bytes_get16(b, i) :
    caml_bswap16(caml_bytes_get16(b, i));
}

function get_int16_ne(b, i) {
  var S_ = Stdlib_sys[11] + -16 | 0;
  var T_ = Stdlib_sys[11] + -16 | 0;
  return caml_bytes_get16(b, i) << T_ >> S_;
}

function get_int16_le(b, i) {
  var Q_ = Stdlib_sys[11] + -16 | 0;
  var R_ = Stdlib_sys[11] + -16 | 0;
  return get_uint16_le(b, i) << R_ >> Q_;
}

function get_int16_be(b, i) {
  var O_ = Stdlib_sys[11] + -16 | 0;
  var P_ = Stdlib_sys[11] + -16 | 0;
  return get_uint16_be(b, i) << P_ >> O_;
}

function get_int32_le(b, i) {
  return Stdlib_sys[12] ?
    caml_int32_bswap(caml_bytes_get32(b, i)) :
    caml_bytes_get32(b, i);
}

function get_int32_be(b, i) {
  return Stdlib_sys[12] ?
    caml_bytes_get32(b, i) :
    caml_int32_bswap(caml_bytes_get32(b, i));
}

function get_int64_le(b, i) {
  return Stdlib_sys[12] ?
    caml_int64_bswap(caml_bytes_get64(b, i)) :
    caml_bytes_get64(b, i);
}

function get_int64_be(b, i) {
  return Stdlib_sys[12] ?
    caml_bytes_get64(b, i) :
    caml_int64_bswap(caml_bytes_get64(b, i));
}

function set_int16_le(b, i, x) {
  return Stdlib_sys[12] ?
    caml_bytes_set16(b, i, caml_bswap16(x)) :
    caml_bytes_set16(b, i, x);
}

function set_int16_be(b, i, x) {
  return Stdlib_sys[12] ?
    caml_bytes_set16(b, i, x) :
    caml_bytes_set16(b, i, caml_bswap16(x));
}

function set_int32_le(b, i, x) {
  return Stdlib_sys[12] ?
    caml_bytes_set32(b, i, caml_int32_bswap(x)) :
    caml_bytes_set32(b, i, x);
}

function set_int32_be(b, i, x) {
  return Stdlib_sys[12] ?
    caml_bytes_set32(b, i, x) :
    caml_bytes_set32(b, i, caml_int32_bswap(x));
}

function set_int64_le(b, i, x) {
  return Stdlib_sys[12] ?
    caml_bytes_set64(b, i, caml_int64_bswap(x)) :
    caml_bytes_set64(b, i, x);
}

function set_int64_be(b, i, x) {
  return Stdlib_sys[12] ?
    caml_bytes_set64(b, i, x) :
    caml_bytes_set64(b, i, caml_int64_bswap(x));
}

function set_uint8(N_, M_, L_) {return caml_bytes_set(N_, M_, L_);}

function set_uint16_ne(K_, J_, I_) {return caml_bytes_set16(K_, J_, I_);}

function a_(H_, G_, F_) {return caml_bytes_set64(H_, G_, F_);}

function b_(E_, D_, C_) {return caml_bytes_set32(E_, D_, C_);}

function c_(B_, A_, z_) {return caml_bytes_set16(B_, A_, z_);}

function d_(y_, x_, w_) {return caml_bytes_set(y_, x_, w_);}

function e_(v_, u_) {return caml_bytes_get64(v_, u_);}

function f_(t_, s_) {return caml_bytes_get32(t_, s_);}

function g_(r_, q_) {return caml_bytes_get16(r_, q_);}

function h_(p_, o_) {return caml_bytes_get(p_, o_);}

function i_(n_) {return caml_bytes_of_string(n_);}

function j_(m_) {return caml_string_of_bytes(m_);}

var Stdlib_bytes = [
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
  function(l_, k_) {return runtime["caml_bytes_equal"](l_, k_);},
  j_,
  i_,
  to_seq,
  to_seqi,
  of_seq,
  h_,
  get_int8,
  g_,
  get_uint16_be,
  get_uint16_le,
  get_int16_ne,
  get_int16_be,
  get_int16_le,
  f_,
  get_int32_be,
  get_int32_le,
  e_,
  get_int64_be,
  get_int64_le,
  set_uint8,
  d_,
  set_uint16_ne,
  set_int16_be,
  set_int16_le,
  c_,
  set_int16_be,
  set_int16_le,
  b_,
  set_int32_be,
  set_int32_le,
  a_,
  set_int64_be,
  set_int64_le
];

module.exports = Stdlib_bytes;

/*::type Exports = {
  make: (n: any, c: any) => any,
  init: (n: any, f: any) => any,
  empty: any,
  copy: (s: any) => any,
  of_string: (s: any) => any,
  to_string: (b: any) => any,
  sub: (s: any, ofs: any, len: any) => any,
  sub_string: (b: any, ofs: any, len: any) => any,
  extend: (s: any, left: any, right: any) => any,
  fill: (s: any, ofs: any, len: any, c: any) => any,
  blit: (s1: any, ofs1: any, s2: any, ofs2: any, len: any) => any,
  blit_string: (s1: any, ofs1: any, s2: any, ofs2: any, len: any) => any,
  concat: (sep: any, l: any) => any,
  cat: (s1: any, s2: any) => any,
  iter: (f: any, a: any) => any,
  iteri: (f: any, a: any) => any,
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
  to_seq: (s: any) => any,
  to_seqi: (s: any) => any,
  of_seq: (i: any) => any,
  get_int8: (b: any, i: any) => any,
  get_uint16_be: (b: any, i: any) => any,
  get_uint16_le: (b: any, i: any) => any,
  get_int16_ne: (b: any, i: any) => any,
  get_int16_be: (b: any, i: any) => any,
  get_int16_le: (b: any, i: any) => any,
  get_int32_be: (b: any, i: any) => any,
  get_int32_le: (b: any, i: any) => any,
  get_int64_be: (b: any, i: any) => any,
  get_int64_le: (b: any, i: any) => any,
  set_uint8: (arg0: any, arg1: any, arg2: any) => any,
  set_uint16_ne: (arg0: any, arg1: any, arg2: any) => any,
  set_int16_be: (b: any, i: any, x: any) => any,
  set_int16_le: (b: any, i: any, x: any) => any,
  set_int32_be: (b: any, i: any, x: any) => any,
  set_int32_le: (b: any, i: any, x: any) => any,
  set_int64_be: (b: any, i: any, x: any) => any,
  set_int64_le: (b: any, i: any, x: any) => any,
}*/
/** @type {{
  make: (n: any, c: any) => any,
  init: (n: any, f: any) => any,
  empty: any,
  copy: (s: any) => any,
  of_string: (s: any) => any,
  to_string: (b: any) => any,
  sub: (s: any, ofs: any, len: any) => any,
  sub_string: (b: any, ofs: any, len: any) => any,
  extend: (s: any, left: any, right: any) => any,
  fill: (s: any, ofs: any, len: any, c: any) => any,
  blit: (s1: any, ofs1: any, s2: any, ofs2: any, len: any) => any,
  blit_string: (s1: any, ofs1: any, s2: any, ofs2: any, len: any) => any,
  concat: (sep: any, l: any) => any,
  cat: (s1: any, s2: any) => any,
  iter: (f: any, a: any) => any,
  iteri: (f: any, a: any) => any,
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
  to_seq: (s: any) => any,
  to_seqi: (s: any) => any,
  of_seq: (i: any) => any,
  get_int8: (b: any, i: any) => any,
  get_uint16_be: (b: any, i: any) => any,
  get_uint16_le: (b: any, i: any) => any,
  get_int16_ne: (b: any, i: any) => any,
  get_int16_be: (b: any, i: any) => any,
  get_int16_le: (b: any, i: any) => any,
  get_int32_be: (b: any, i: any) => any,
  get_int32_le: (b: any, i: any) => any,
  get_int64_be: (b: any, i: any) => any,
  get_int64_le: (b: any, i: any) => any,
  set_uint8: (arg0: any, arg1: any, arg2: any) => any,
  set_uint16_ne: (arg0: any, arg1: any, arg2: any) => any,
  set_int16_be: (b: any, i: any, x: any) => any,
  set_int16_le: (b: any, i: any, x: any) => any,
  set_int32_be: (b: any, i: any, x: any) => any,
  set_int32_le: (b: any, i: any, x: any) => any,
  set_int64_be: (b: any, i: any, x: any) => any,
  set_int64_le: (b: any, i: any, x: any) => any,
}} */
module.exports = ((module.exports /*:: : any*/) /*:: :Exports */);
module.exports.make = module.exports[1];
module.exports.init = module.exports[2];
module.exports.empty = module.exports[3];
module.exports.copy = module.exports[4];
module.exports.of_string = module.exports[5];
module.exports.to_string = module.exports[6];
module.exports.sub = module.exports[7];
module.exports.sub_string = module.exports[8];
module.exports.extend = module.exports[9];
module.exports.fill = module.exports[10];
module.exports.blit = module.exports[11];
module.exports.blit_string = module.exports[12];
module.exports.concat = module.exports[13];
module.exports.cat = module.exports[14];
module.exports.iter = module.exports[15];
module.exports.iteri = module.exports[16];
module.exports.map = module.exports[17];
module.exports.mapi = module.exports[18];
module.exports.trim = module.exports[19];
module.exports.escaped = module.exports[20];
module.exports.index = module.exports[21];
module.exports.index_opt = module.exports[22];
module.exports.rindex = module.exports[23];
module.exports.rindex_opt = module.exports[24];
module.exports.index_from = module.exports[25];
module.exports.index_from_opt = module.exports[26];
module.exports.rindex_from = module.exports[27];
module.exports.rindex_from_opt = module.exports[28];
module.exports.contains = module.exports[29];
module.exports.contains_from = module.exports[30];
module.exports.rcontains_from = module.exports[31];
module.exports.uppercase = module.exports[32];
module.exports.lowercase = module.exports[33];
module.exports.capitalize = module.exports[34];
module.exports.uncapitalize = module.exports[35];
module.exports.uppercase_ascii = module.exports[36];
module.exports.lowercase_ascii = module.exports[37];
module.exports.capitalize_ascii = module.exports[38];
module.exports.uncapitalize_ascii = module.exports[39];
module.exports.compare = module.exports[40];
module.exports.to_seq = module.exports[44];
module.exports.to_seqi = module.exports[45];
module.exports.of_seq = module.exports[46];
module.exports.get_int8 = module.exports[48];
module.exports.get_uint16_be = module.exports[50];
module.exports.get_uint16_le = module.exports[51];
module.exports.get_int16_ne = module.exports[52];
module.exports.get_int16_be = module.exports[53];
module.exports.get_int16_le = module.exports[54];
module.exports.get_int32_be = module.exports[56];
module.exports.get_int32_le = module.exports[57];
module.exports.get_int64_be = module.exports[59];
module.exports.get_int64_le = module.exports[60];
module.exports.set_uint8 = module.exports[61];
module.exports.set_uint16_ne = module.exports[63];
module.exports.set_int16_be = module.exports[64];
module.exports.set_int16_le = module.exports[65];
module.exports.set_int32_be = module.exports[70];
module.exports.set_int32_le = module.exports[71];
module.exports.set_int64_be = module.exports[73];
module.exports.set_int64_le = module.exports[74];

/* Hashing disabled */
