/**
 * @flow strict
 * Stdlib__buffer
 */

// @ts-check


"use strict";

var runtime = require("../runtime/runtime.js");
var caml_bswap16 = runtime["caml_bswap16"];
var caml_bytes_get = runtime["caml_bytes_get"];
var caml_bytes_unsafe_set = runtime["caml_bytes_unsafe_set"];
var caml_create_bytes = runtime["caml_create_bytes"];
var caml_int32_bswap = runtime["caml_int32_bswap"];
var caml_int64_bswap = runtime["caml_int64_bswap"];
var caml_ml_bytes_length = runtime["caml_ml_bytes_length"];
var caml_ml_string_length = runtime["caml_ml_string_length"];
var string = runtime["caml_new_string"];
var caml_string_get = runtime["caml_string_get"];
var caml_wrap_thrown_exception = runtime["caml_wrap_thrown_exception"];

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

function call4(f, a0, a1, a2, a3) {
  return f.length === 4 ?
    f(a0, a1, a2, a3) :
    runtime["caml_call_gen"](f, [a0,a1,a2,a3]);
}

function call5(f, a0, a1, a2, a3, a4) {
  return f.length === 5 ?
    f(a0, a1, a2, a3, a4) :
    runtime["caml_call_gen"](f, [a0,a1,a2,a3,a4]);
}

var cst_Buffer_truncate = string("Buffer.truncate");
var cst_Buffer_add_channel = string("Buffer.add_channel");
var cst_Buffer_add_substring_add_subbytes = string(
  "Buffer.add_substring/add_subbytes"
);
var cst_Buffer_add_cannot_grow_buffer = string(
  "Buffer.add: cannot grow buffer"
);
var cst_Buffer_nth = string("Buffer.nth");
var cst_Buffer_blit = string("Buffer.blit");
var cst_Buffer_sub = string("Buffer.sub");
var Stdlib = require("./Stdlib.js");
var Stdlib_sys = require("./Stdlib__sys.js");
var Stdlib_seq = require("./Stdlib__seq.js");
var Stdlib_string = require("./Stdlib__string.js");
var Assert_failure = require("../runtime/Assert_failure.js");
var Stdlib_bytes = require("./Stdlib__bytes.js");
var Stdlib_uchar = require("./Stdlib__uchar.js");
var g_ = [0,string("buffer.ml"),205,9];
var f_ = [0,string("buffer.ml"),141,19];
var e_ = [0,string("buffer.ml"),159,8];
var d_ = [0,string("buffer.ml"),120,19];
var c_ = [0,string("buffer.ml"),138,8];
var b_ = [0,string("buffer.ml"),84,19];
var a_ = [0,string("buffer.ml"),117,8];

function create(n) {
  var n__0 = 1 <= n ? n : 1;
  var n__1 = Stdlib_sys[13] < n__0 ? Stdlib_sys[13] : n__0;
  var s = caml_create_bytes(n__1);
  return [0,s,0,n__1,s];
}

function contents(b) {return call3(Stdlib_bytes[8], b[1], 0, b[2]);}

function to_bytes(b) {return call3(Stdlib_bytes[7], b[1], 0, b[2]);}

function sub(b, ofs, len) {
  if (0 <= ofs) {
    if (0 <= len) {
      if (! ((b[2] - len | 0) < ofs)) {
        return call3(Stdlib_bytes[8], b[1], ofs, len);
      }
    }
  }
  return call1(Stdlib[1], cst_Buffer_sub);
}

function blit(src, srcoff, dst, dstoff, len) {
  if (0 <= len) {
    if (0 <= srcoff) {
      if (! ((src[2] - len | 0) < srcoff)) {
        if (0 <= dstoff) {
          if (! ((caml_ml_bytes_length(dst) - len | 0) < dstoff)) {
            return runtime["caml_blit_bytes"](
              src[1],
              srcoff,
              dst,
              dstoff,
              len
            );
          }
        }
      }
    }
  }
  return call1(Stdlib[1], cst_Buffer_blit);
}

function nth(b, ofs) {
  if (0 <= ofs) {
    if (! (b[2] <= ofs)) {return runtime["caml_bytes_unsafe_get"](b[1], ofs);}
  }
  return call1(Stdlib[1], cst_Buffer_nth);
}

function length(b) {return b[2];}

function clear(b) {b[2] = 0;return 0;}

function reset(b) {
  b[2] = 0;
  b[1] = b[4];
  b[3] = caml_ml_bytes_length(b[1]);
  return 0;
}

function resize(b, more) {
  var len = b[3];
  var new_len = [0,len];
  for (; ; ) {
    if (new_len[1] < (b[2] + more | 0)) {
      new_len[1] = 2 * new_len[1] | 0;
      continue;
    }
    if (Stdlib_sys[13] < new_len[1]) {
      if ((b[2] + more | 0) <= Stdlib_sys[13]) new_len[1] = Stdlib_sys[13];
      else call1(Stdlib[2], cst_Buffer_add_cannot_grow_buffer);
    }
    var new_buffer = caml_create_bytes(new_len[1]);
    call5(Stdlib_bytes[11], b[1], 0, new_buffer, 0, b[2]);
    b[1] = new_buffer;
    b[3] = new_len[1];
    return 0;
  }
}

function add_char(b, c) {
  var pos = b[2];
  if (b[3] <= pos) {resize(b, 1);}
  caml_bytes_unsafe_set(b[1], pos, c);
  b[2] = pos + 1 | 0;
  return 0;
}

function add_utf_8_uchar(b, u) {
  var u__0 = call1(Stdlib_uchar[10], u);
  if (0 <= u__0) {
    if (127 < u__0) {
      if (2047 < u__0) {
        if (65535 < u__0) {
          if (1114111 < u__0) {
            throw caml_wrap_thrown_exception([0,Assert_failure,a_]);
          }
          var pos = b[2];
          if (b[3] < (pos + 4 | 0)) {resize(b, 4);}
          caml_bytes_unsafe_set(b[1], pos, 240 | u__0 >>> 18 | 0);
          caml_bytes_unsafe_set(
            b[1],
            pos + 1 | 0,
            128 | (u__0 >>> 12 | 0) & 63
          );
          caml_bytes_unsafe_set(b[1], pos + 2 | 0, 128 | (u__0 >>> 6 | 0) & 63
          );
          caml_bytes_unsafe_set(b[1], pos + 3 | 0, 128 | u__0 & 63);
          b[2] = pos + 4 | 0;
          return 0;
        }
        var pos__0 = b[2];
        if (b[3] < (pos__0 + 3 | 0)) {resize(b, 3);}
        caml_bytes_unsafe_set(b[1], pos__0, 224 | u__0 >>> 12 | 0);
        caml_bytes_unsafe_set(
          b[1],
          pos__0 + 1 | 0,
          128 | (u__0 >>> 6 | 0) & 63
        );
        caml_bytes_unsafe_set(b[1], pos__0 + 2 | 0, 128 | u__0 & 63);
        b[2] = pos__0 + 3 | 0;
        return 0;
      }
      var pos__1 = b[2];
      if (b[3] < (pos__1 + 2 | 0)) {resize(b, 2);}
      caml_bytes_unsafe_set(b[1], pos__1, 192 | u__0 >>> 6 | 0);
      caml_bytes_unsafe_set(b[1], pos__1 + 1 | 0, 128 | u__0 & 63);
      b[2] = pos__1 + 2 | 0;
      return 0;
    }
    return add_char(b, u__0);
  }
  throw caml_wrap_thrown_exception([0,Assert_failure,b_]);
}

function add_utf_16be_uchar(b, u) {
  var u__0 = call1(Stdlib_uchar[10], u);
  if (0 <= u__0) {
    if (65535 < u__0) {
      if (1114111 < u__0) {
        throw caml_wrap_thrown_exception([0,Assert_failure,c_]);
      }
      var u__1 = u__0 + -65536 | 0;
      var hi = 55296 | u__1 >>> 10 | 0;
      var lo = 56320 | u__1 & 1023;
      var pos = b[2];
      if (b[3] < (pos + 4 | 0)) {resize(b, 4);}
      caml_bytes_unsafe_set(b[1], pos, hi >>> 8 | 0);
      caml_bytes_unsafe_set(b[1], pos + 1 | 0, hi & 255);
      caml_bytes_unsafe_set(b[1], pos + 2 | 0, lo >>> 8 | 0);
      caml_bytes_unsafe_set(b[1], pos + 3 | 0, lo & 255);
      b[2] = pos + 4 | 0;
      return 0;
    }
    var pos__0 = b[2];
    if (b[3] < (pos__0 + 2 | 0)) {resize(b, 2);}
    caml_bytes_unsafe_set(b[1], pos__0, u__0 >>> 8 | 0);
    caml_bytes_unsafe_set(b[1], pos__0 + 1 | 0, u__0 & 255);
    b[2] = pos__0 + 2 | 0;
    return 0;
  }
  throw caml_wrap_thrown_exception([0,Assert_failure,d_]);
}

function add_utf_16le_uchar(b, u) {
  var u__0 = call1(Stdlib_uchar[10], u);
  if (0 <= u__0) {
    if (65535 < u__0) {
      if (1114111 < u__0) {
        throw caml_wrap_thrown_exception([0,Assert_failure,e_]);
      }
      var u__1 = u__0 + -65536 | 0;
      var hi = 55296 | u__1 >>> 10 | 0;
      var lo = 56320 | u__1 & 1023;
      var pos = b[2];
      if (b[3] < (pos + 4 | 0)) {resize(b, 4);}
      caml_bytes_unsafe_set(b[1], pos, hi & 255);
      caml_bytes_unsafe_set(b[1], pos + 1 | 0, hi >>> 8 | 0);
      caml_bytes_unsafe_set(b[1], pos + 2 | 0, lo & 255);
      caml_bytes_unsafe_set(b[1], pos + 3 | 0, lo >>> 8 | 0);
      b[2] = pos + 4 | 0;
      return 0;
    }
    var pos__0 = b[2];
    if (b[3] < (pos__0 + 2 | 0)) {resize(b, 2);}
    caml_bytes_unsafe_set(b[1], pos__0, u__0 & 255);
    caml_bytes_unsafe_set(b[1], pos__0 + 1 | 0, u__0 >>> 8 | 0);
    b[2] = pos__0 + 2 | 0;
    return 0;
  }
  throw caml_wrap_thrown_exception([0,Assert_failure,f_]);
}

function add_substring(b, s, offset, len) {
  var y_ = offset < 0 ? 1 : 0;
  if (y_) var z_ = y_;
  else {
    var A_ = len < 0 ? 1 : 0;
    var z_ = A_ ? A_ : (caml_ml_string_length(s) - len | 0) < offset ? 1 : 0;
  }
  if (z_) {call1(Stdlib[1], cst_Buffer_add_substring_add_subbytes);}
  var new_position = b[2] + len | 0;
  if (b[3] < new_position) {resize(b, len);}
  call5(Stdlib_bytes[12], s, offset, b[1], b[2], len);
  b[2] = new_position;
  return 0;
}

function add_subbytes(b, s, offset, len) {
  return add_substring(b, call1(Stdlib_bytes[42], s), offset, len);
}

function add_string(b, s) {
  var len = caml_ml_string_length(s);
  var new_position = b[2] + len | 0;
  if (b[3] < new_position) {resize(b, len);}
  call5(Stdlib_bytes[12], s, 0, b[1], b[2], len);
  b[2] = new_position;
  return 0;
}

function add_bytes(b, s) {return add_string(b, call1(Stdlib_bytes[42], s));}

function add_buffer(b, bs) {return add_subbytes(b, bs[1], 0, bs[2]);}

function add_channel_rec(b, ic, len) {
  var len__0 = len;
  for (; ; ) {
    var x_ = 0 < len__0 ? 1 : 0;
    if (x_) {
      var n = call4(Stdlib[84], ic, b[1], b[2], len__0);
      b[2] = b[2] + n | 0;
      if (0 === n) {throw caml_wrap_thrown_exception(Stdlib[12]);}
      var len__1 = len__0 - n | 0;
      var len__0 = len__1;
      continue;
    }
    return x_;
  }
}

function add_channel(b, ic, len) {
  var v_ = len < 0 ? 1 : 0;
  var w_ = v_ ? v_ : Stdlib_sys[13] < len ? 1 : 0;
  if (w_) {call1(Stdlib[1], cst_Buffer_add_channel);}
  if (b[3] < (b[2] + len | 0)) {resize(b, len);}
  return add_channel_rec(b, ic, len);
}

function output_buffer(oc, b) {return call4(Stdlib[68], oc, b[1], 0, b[2]);}

function closing(param) {
  if (40 === param) {return 41;}
  if (123 === param) {return 125;}
  throw caml_wrap_thrown_exception([0,Assert_failure,g_]);
}

function advance_to_closing(opening, closing, k, s, start) {
  function advance(k, i, lim) {
    var k__0 = k;
    var i__0 = i;
    for (; ; ) {
      if (lim <= i__0) {throw caml_wrap_thrown_exception(Stdlib[8]);}
      if (caml_string_get(s, i__0) === opening) {
        var i__1 = i__0 + 1 | 0;
        var k__1 = k__0 + 1 | 0;
        var k__0 = k__1;
        var i__0 = i__1;
        continue;
      }
      if (caml_string_get(s, i__0) === closing) {
        if (0 === k__0) {return i__0;}
        var i__2 = i__0 + 1 | 0;
        var k__2 = k__0 + -1 | 0;
        var k__0 = k__2;
        var i__0 = i__2;
        continue;
      }
      var i__3 = i__0 + 1 | 0;
      var i__0 = i__3;
      continue;
    }
  }
  return advance(k, start, caml_ml_string_length(s));
}

function advance_to_non_alpha(s, start) {
  function advance(i, lim) {
    var i__0 = i;
    for (; ; ) {
      if (lim <= i__0) {return lim;}
      var match = caml_string_get(s, i__0);
      var switch__0 = 91 <= match ?
        97 <= match ? 123 <= match ? 0 : 1 : 95 === match ? 1 : 0 :
        58 <= match ? 65 <= match ? 1 : 0 : 48 <= match ? 1 : 0;
      if (switch__0) {var i__1 = i__0 + 1 | 0;var i__0 = i__1;continue;}
      return i__0;
    }
  }
  return advance(start, caml_ml_string_length(s));
}

function find_ident(s, start, lim) {
  if (lim <= start) {throw caml_wrap_thrown_exception(Stdlib[8]);}
  var c = caml_string_get(s, start);
  if (40 !== c) {
    if (123 !== c) {
      var stop__0 = advance_to_non_alpha(s, start + 1 | 0);
      return [0,call3(Stdlib_string[4], s, start, stop__0 - start | 0),stop__0
      ];
    }
  }
  var new_start = start + 1 | 0;
  var stop = advance_to_closing(c, closing(c), 0, s, new_start);
  return [
    0,
    call3(Stdlib_string[4], s, new_start, (stop - start | 0) + -1 | 0),
    stop + 1 | 0
  ];
}

function add_substitute(b, f, s) {
  var lim = caml_ml_string_length(s);
  function subst(previous, i) {
    var previous__0 = previous;
    var i__0 = i;
    for (; ; ) {
      if (i__0 < lim) {
        var current = caml_string_get(s, i__0);
        if (36 === current) {
          if (92 === previous__0) {
            add_char(b, current);
            var i__1 = i__0 + 1 | 0;
            var previous__0 = 32;
            var i__0 = i__1;
            continue;
          }
          var j = i__0 + 1 | 0;
          var match = find_ident(s, j, lim);
          var i__2 = match[2];
          var ident = match[1];
          add_string(b, call1(f, ident));
          var previous__0 = 32;
          var i__0 = i__2;
          continue;
        }
        if (92 === previous__0) {
          add_char(b, 92);
          add_char(b, current);
          var i__3 = i__0 + 1 | 0;
          var previous__0 = 32;
          var i__0 = i__3;
          continue;
        }
        if (92 === current) {
          var i__4 = i__0 + 1 | 0;
          var previous__0 = current;
          var i__0 = i__4;
          continue;
        }
        add_char(b, current);
        var i__5 = i__0 + 1 | 0;
        var previous__0 = current;
        var i__0 = i__5;
        continue;
      }
      var u_ = 92 === previous__0 ? 1 : 0;
      return u_ ? add_char(b, previous__0) : u_;
    }
  }
  return subst(32, 0);
}

function truncate(b, len) {
  if (0 <= len) {if (! (length(b) < len)) {b[2] = len;return 0;}}
  return call1(Stdlib[1], cst_Buffer_truncate);
}

function to_seq(b) {
  function aux(i, param) {
    if (b[2] <= i) {return 0;}
    var x = caml_bytes_get(b[1], i);
    var s_ = i + 1 | 0;
    return [0,x,function(t_) {return aux(s_, t_);}];
  }
  var q_ = 0;
  return function(r_) {return aux(q_, r_);};
}

function to_seqi(b) {
  function aux(i, param) {
    if (b[2] <= i) {return 0;}
    var x = caml_bytes_get(b[1], i);
    var o_ = i + 1 | 0;
    return [0,[0,i,x],function(p_) {return aux(o_, p_);}];
  }
  var m_ = 0;
  return function(n_) {return aux(m_, n_);};
}

function add_seq(b, seq) {
  function k_(l_) {return add_char(b, l_);}
  return call2(Stdlib_seq[8], k_, seq);
}

function of_seq(i) {var b = create(32);add_seq(b, i);return b;}

function add_int8(b, x) {
  var new_position = b[2] + 1 | 0;
  if (b[3] < new_position) {resize(b, 1);}
  caml_bytes_unsafe_set(b[1], b[2], x);
  b[2] = new_position;
  return 0;
}

function add_int16_ne(b, x) {
  var new_position = b[2] + 2 | 0;
  if (b[3] < new_position) {resize(b, 2);}
  runtime["caml_bytes_set16"](b[1], b[2], x);
  b[2] = new_position;
  return 0;
}

function add_int32_ne(b, x) {
  var new_position = b[2] + 4 | 0;
  if (b[3] < new_position) {resize(b, 4);}
  runtime["caml_bytes_set32"](b[1], b[2], x);
  b[2] = new_position;
  return 0;
}

function add_int64_ne(b, x) {
  var new_position = b[2] + 8 | 0;
  if (b[3] < new_position) {resize(b, 8);}
  runtime["caml_bytes_set64"](b[1], b[2], x);
  b[2] = new_position;
  return 0;
}

function add_int16_le(b, x) {
  var j_ = Stdlib_sys[12] ? caml_bswap16(x) : x;
  return add_int16_ne(b, j_);
}

function add_int16_be(b, x) {
  var x__0 = Stdlib_sys[12] ? x : caml_bswap16(x);
  return add_int16_ne(b, x__0);
}

function add_int32_le(b, x) {
  var i_ = Stdlib_sys[12] ? caml_int32_bswap(x) : x;
  return add_int32_ne(b, i_);
}

function add_int32_be(b, x) {
  var x__0 = Stdlib_sys[12] ? x : caml_int32_bswap(x);
  return add_int32_ne(b, x__0);
}

function add_int64_le(b, x) {
  var h_ = Stdlib_sys[12] ? caml_int64_bswap(x) : x;
  return add_int64_ne(b, h_);
}

function add_int64_be(b, x) {
  var x__0 = Stdlib_sys[12] ? x : caml_int64_bswap(x);
  return add_int64_ne(b, x__0);
}

var Stdlib_buffer = [
  0,
  create,
  contents,
  to_bytes,
  sub,
  blit,
  nth,
  length,
  clear,
  reset,
  add_char,
  add_utf_8_uchar,
  add_utf_16le_uchar,
  add_utf_16be_uchar,
  add_string,
  add_bytes,
  add_substring,
  add_subbytes,
  add_substitute,
  add_buffer,
  add_channel,
  output_buffer,
  truncate,
  to_seq,
  to_seqi,
  add_seq,
  of_seq,
  add_int8,
  add_int8,
  add_int16_ne,
  add_int16_be,
  add_int16_le,
  add_int16_ne,
  add_int16_be,
  add_int16_le,
  add_int32_ne,
  add_int32_be,
  add_int32_le,
  add_int64_ne,
  add_int64_be,
  add_int64_le
];

module.exports = Stdlib_buffer;

/*::type Exports = {
  create: (n: any) => any,
  contents: (b: any) => any,
  to_bytes: (b: any) => any,
  sub: (b: any, ofs: any, len: any) => any,
  blit: (src: any, srcoff: any, dst: any, dstoff: any, len: any) => any,
  nth: (b: any, ofs: any) => any,
  _length_: (b: any) => any,
  clear: (b: any) => any,
  reset: (b: any) => any,
  add_char: (b: any, c: any) => any,
  add_utf_8_uchar: (b: any, u: any) => any,
  add_utf_16le_uchar: (b: any, u: any) => any,
  add_utf_16be_uchar: (b: any, u: any) => any,
  add_string: (b: any, s: any) => any,
  add_bytes: (b: any, s: any) => any,
  add_substring: (b: any, s: any, offset: any, len: any) => any,
  add_subbytes: (b: any, s: any, offset: any, len: any) => any,
  add_substitute: (b: any, f: any, s: any) => any,
  add_buffer: (b: any, bs: any) => any,
  add_channel: (b: any, ic: any, len: any) => any,
  output_buffer: (oc: any, b: any) => any,
  truncate: (b: any, len: any) => any,
  to_seq: (b: any) => any,
  to_seqi: (b: any) => any,
  add_seq: (b: any, seq: any) => any,
  of_seq: (i: any) => any,
  add_int8: (b: any, x: any) => any,
  add_int16_ne: (b: any, x: any) => any,
  add_int16_be: (b: any, x: any) => any,
  add_int16_le: (b: any, x: any) => any,
  add_int32_ne: (b: any, x: any) => any,
  add_int32_be: (b: any, x: any) => any,
  add_int32_le: (b: any, x: any) => any,
  add_int64_ne: (b: any, x: any) => any,
  add_int64_be: (b: any, x: any) => any,
  add_int64_le: (b: any, x: any) => any,
}*/
/** @type {{
  create: (n: any) => any,
  contents: (b: any) => any,
  to_bytes: (b: any) => any,
  sub: (b: any, ofs: any, len: any) => any,
  blit: (src: any, srcoff: any, dst: any, dstoff: any, len: any) => any,
  nth: (b: any, ofs: any) => any,
  _length_: (b: any) => any,
  clear: (b: any) => any,
  reset: (b: any) => any,
  add_char: (b: any, c: any) => any,
  add_utf_8_uchar: (b: any, u: any) => any,
  add_utf_16le_uchar: (b: any, u: any) => any,
  add_utf_16be_uchar: (b: any, u: any) => any,
  add_string: (b: any, s: any) => any,
  add_bytes: (b: any, s: any) => any,
  add_substring: (b: any, s: any, offset: any, len: any) => any,
  add_subbytes: (b: any, s: any, offset: any, len: any) => any,
  add_substitute: (b: any, f: any, s: any) => any,
  add_buffer: (b: any, bs: any) => any,
  add_channel: (b: any, ic: any, len: any) => any,
  output_buffer: (oc: any, b: any) => any,
  truncate: (b: any, len: any) => any,
  to_seq: (b: any) => any,
  to_seqi: (b: any) => any,
  add_seq: (b: any, seq: any) => any,
  of_seq: (i: any) => any,
  add_int8: (b: any, x: any) => any,
  add_int16_ne: (b: any, x: any) => any,
  add_int16_be: (b: any, x: any) => any,
  add_int16_le: (b: any, x: any) => any,
  add_int32_ne: (b: any, x: any) => any,
  add_int32_be: (b: any, x: any) => any,
  add_int32_le: (b: any, x: any) => any,
  add_int64_ne: (b: any, x: any) => any,
  add_int64_be: (b: any, x: any) => any,
  add_int64_le: (b: any, x: any) => any,
}} */
module.exports = ((module.exports /*:: : any*/) /*:: :Exports */);
module.exports.create = module.exports[1];
module.exports.contents = module.exports[2];
module.exports.to_bytes = module.exports[3];
module.exports.sub = module.exports[4];
module.exports.blit = module.exports[5];
module.exports.nth = module.exports[6];
module.exports._length_ = module.exports[7];
module.exports.clear = module.exports[8];
module.exports.reset = module.exports[9];
module.exports.add_char = module.exports[10];
module.exports.add_utf_8_uchar = module.exports[11];
module.exports.add_utf_16le_uchar = module.exports[12];
module.exports.add_utf_16be_uchar = module.exports[13];
module.exports.add_string = module.exports[14];
module.exports.add_bytes = module.exports[15];
module.exports.add_substring = module.exports[16];
module.exports.add_subbytes = module.exports[17];
module.exports.add_substitute = module.exports[18];
module.exports.add_buffer = module.exports[19];
module.exports.add_channel = module.exports[20];
module.exports.output_buffer = module.exports[21];
module.exports.truncate = module.exports[22];
module.exports.to_seq = module.exports[23];
module.exports.to_seqi = module.exports[24];
module.exports.add_seq = module.exports[25];
module.exports.of_seq = module.exports[26];
module.exports.add_int8 = module.exports[27];
module.exports.add_int16_ne = module.exports[29];
module.exports.add_int16_be = module.exports[30];
module.exports.add_int16_le = module.exports[31];
module.exports.add_int32_ne = module.exports[35];
module.exports.add_int32_be = module.exports[36];
module.exports.add_int32_le = module.exports[37];
module.exports.add_int64_ne = module.exports[38];
module.exports.add_int64_be = module.exports[39];
module.exports.add_int64_le = module.exports[40];

/* Hashing disabled */
