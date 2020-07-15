/**
 * @flow strict
 * Stdlib__digest
 */

// @ts-check


"use strict";

var runtime = require("../runtime/runtime.js");
var caml_bytes_unsafe_set = runtime["caml_bytes_unsafe_set"];
var caml_create_bytes = runtime["caml_create_bytes"];
var caml_md5_string = runtime["caml_md5_string"];
var caml_ml_string_length = runtime["caml_ml_string_length"];
var string__0 = runtime["caml_new_string"];
var caml_string_get = runtime["caml_string_get"];
var caml_wrap_thrown_exception = runtime["caml_wrap_thrown_exception"];
var caml_wrap_thrown_exception_reraise = runtime
 ["caml_wrap_thrown_exception_reraise"];

function call1(f, a0) {
  return f.length === 1 ? f(a0) : runtime["caml_call_gen"](f, [a0]);
}

function call2(f, a0, a1) {
  return f.length === 2 ? f(a0, a1) : runtime["caml_call_gen"](f, [a0,a1]);
}

var cst_Digest_from_hex__0 = string__0("Digest.from_hex");
var cst_Digest_from_hex = string__0("Digest.from_hex");
var cst_Digest_to_hex = string__0("Digest.to_hex");
var cst_Digest_substring = string__0("Digest.substring");
var Stdlib = require("./Stdlib.js");
var Stdlib_char = require("./Stdlib__char.js");
var Stdlib_bytes = require("./Stdlib__bytes.js");
var Stdlib_string = require("./Stdlib__string.js");
var compare = Stdlib_string[33];
var equal = Stdlib_string[34];

function string(str) {
  return caml_md5_string(str, 0, caml_ml_string_length(str));
}

function bytes(b) {return string(call1(Stdlib_bytes[42], b));}

function substring(str, ofs, len) {
  if (0 <= ofs) {
    if (0 <= len) {
      if (! ((caml_ml_string_length(str) - len | 0) < ofs)) {return caml_md5_string(str, ofs, len);}
    }
  }
  return call1(Stdlib[1], cst_Digest_substring);
}

function subbytes(b, ofs, len) {
  return substring(call1(Stdlib_bytes[42], b), ofs, len);
}

function file(filename) {
  var ic = call1(Stdlib[80], filename);
  try {var d = runtime["caml_md5_chan"](ic, -1);}
  catch(e) {
    e = runtime["caml_wrap_exception"](e);
    call1(Stdlib[93], ic);
    throw caml_wrap_thrown_exception_reraise(e);
  }
  call1(Stdlib[93], ic);
  return d;
}

function output(chan, digest) {return call2(Stdlib[66], chan, digest);}

function input(chan) {return call2(Stdlib[86], chan, 16);}

function char_hex(n) {var e_ = 10 <= n ? 87 : 48;return n + e_ | 0;}

function to_hex(d) {
  if (16 !== caml_ml_string_length(d)) {call1(Stdlib[1], cst_Digest_to_hex);}
  var result = caml_create_bytes(32);
  var i = 0;
  for (; ; ) {
    var x = caml_string_get(d, i);
    caml_bytes_unsafe_set(result, i * 2 | 0, char_hex(x >>> 4 | 0));
    caml_bytes_unsafe_set(result, (i * 2 | 0) + 1 | 0, char_hex(x & 15));
    var d_ = i + 1 | 0;
    if (15 !== i) {var i = d_;continue;}
    return call1(Stdlib_bytes[42], result);
  }
}

function from_hex(s) {
  if (32 !== caml_ml_string_length(s)) {
    call1(Stdlib[1], cst_Digest_from_hex);
  }
  function digit(c) {
    if (65 <= c) {
      if (97 <= c) {
        if (! (103 <= c)) {return (c - 97 | 0) + 10 | 0;}
      }
      else if (! (71 <= c)) {return (c - 65 | 0) + 10 | 0;}
    }
    else {
      var switcher = c + -48 | 0;
      if (! (9 < switcher >>> 0)) {return c - 48 | 0;}
    }
    throw caml_wrap_thrown_exception([0,Stdlib[6],cst_Digest_from_hex__0]);
  }
  function byte__0(i) {
    var c_ = digit(caml_string_get(s, i + 1 | 0));
    return (digit(caml_string_get(s, i)) << 4) + c_ | 0;
  }
  var result = caml_create_bytes(16);
  var i = 0;
  for (; ; ) {
    var a_ = byte__0(2 * i | 0);
    runtime["caml_bytes_set"](result, i, call1(Stdlib_char[1], a_));
    var b_ = i + 1 | 0;
    if (15 !== i) {var i = b_;continue;}
    return call1(Stdlib_bytes[42], result);
  }
}

var Stdlib_digest = [
  0,
  compare,
  equal,
  string,
  bytes,
  substring,
  subbytes,
  file,
  output,
  input,
  to_hex,
  from_hex
];

module.exports = Stdlib_digest;

/*::type Exports = {
  compare: any,
  equal: any,
  string: (str: any) => any,
  bytes: (b: any) => any,
  substring: (str: any, ofs: any, len: any) => any,
  subbytes: (b: any, ofs: any, len: any) => any,
  file: (filename: any) => any,
  output: (chan: any, digest: any) => any,
  input: (chan: any) => any,
  to_hex: (d: any) => any,
  from_hex: (s: any) => any,
}*/
/** @type {{
  compare: any,
  equal: any,
  string: (str: any) => any,
  bytes: (b: any) => any,
  substring: (str: any, ofs: any, len: any) => any,
  subbytes: (b: any, ofs: any, len: any) => any,
  file: (filename: any) => any,
  output: (chan: any, digest: any) => any,
  input: (chan: any) => any,
  to_hex: (d: any) => any,
  from_hex: (s: any) => any,
}} */
module.exports = ((module.exports /*:: : any*/) /*:: :Exports */);
module.exports.compare = module.exports[1];
module.exports.equal = module.exports[2];
module.exports.string = module.exports[3];
module.exports.bytes = module.exports[4];
module.exports.substring = module.exports[5];
module.exports.subbytes = module.exports[6];
module.exports.file = module.exports[7];
module.exports.output = module.exports[8];
module.exports.input = module.exports[9];
module.exports.to_hex = module.exports[10];
module.exports.from_hex = module.exports[11];

/* Hashing disabled */
