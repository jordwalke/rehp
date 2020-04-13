/**
 * @flow strict
 * Stdlib__int32
 */

// @ts-check


"use strict";

var runtime = require("../runtime/runtime.js");
var max_int__0;
var unsigned_to_int;
var move;
var caml_int_compare = runtime["caml_int_compare"];
var caml_int_of_string = runtime["caml_int_of_string"];
var caml_mul = runtime["caml_mul"];
var string = runtime["caml_new_string"];
var caml_wrap_thrown_exception = runtime["caml_wrap_thrown_exception"];
var caml_wrap_thrown_exception_reraise = runtime
 ["caml_wrap_thrown_exception_reraise"];
var cst_d = string("%d");
var cst_0x1_0000_0000 = string("0x1_0000_0000");
var Stdlib = require("./Stdlib.js");
var Stdlib_sys = require("./Stdlib__sys.js");
var Assert_failure = require("../runtime/Assert_failure.js");
var b_ = [0,string("int32.ml"),69,6];
var zero = 0;
var one = 1;
var minus_one = -1;

function succ(n) {return n + 1 | 0;}

function pred(n) {return n - 1 | 0;}

function abs(n) {return runtime["caml_greaterequal"](n, 0) ? n : - n | 0;}

var min_int = -2147483648;
var max_int = 2147483647;

function lognot(n) {return n ^ -1;}

var a_ = Stdlib_sys[10];

if (32 === a_) {
  max_int__0 = Stdlib[19];
  unsigned_to_int =
    function(n) {
      if (! (0 < caml_int_compare(0, n))) {
        if (! (0 < caml_int_compare(n, max_int__0))) {return [0,n];}
      }
      return 0;
    };
}
else {
  if (64 !== a_) {throw caml_wrap_thrown_exception([0,Assert_failure,b_]);}
  move = caml_int_of_string(cst_0x1_0000_0000);
  unsigned_to_int =
    function(i) {var i__0 = 0 <= i ? i : i + move | 0;return [0,i__0];};
}

function to_string(n) {return runtime["caml_format_int"](cst_d, n);}

function of_string_opt(s) {
  var c_;
  try {c_ = [0,caml_int_of_string(s)];return c_;}
  catch(d_) {
    d_ = runtime["caml_wrap_exception"](d_);
    if (d_[1] === Stdlib[7]) {return 0;}
    throw caml_wrap_thrown_exception_reraise(d_);
  }
}

function compare(x, y) {return caml_int_compare(x, y);}

function equal(x, y) {return 0 === compare(x, y) ? 1 : 0;}

function unsigned_compare(n, m) {
  return compare(n + 2147483648 | 0, m + 2147483648 | 0);
}

function unsigned_div(n, d) {
  if (runtime["caml_lessthan"](d, 0)) {
    return 0 <= unsigned_compare(n, d) ? one : zero;
  }
  var q = runtime["caml_div"](n >>> 1 | 0, d) << 1;
  var r = n - caml_mul(q, d) | 0;
  return 0 <= unsigned_compare(r, d) ? succ(q) : q;
}

function unsigned_rem(n, d) {return n - caml_mul(unsigned_div(n, d), d) | 0;}

var Stdlib_int32 = [
  0,
  zero,
  one,
  minus_one,
  unsigned_div,
  unsigned_rem,
  succ,
  pred,
  abs,
  max_int,
  min_int,
  lognot,
  unsigned_to_int,
  of_string_opt,
  to_string,
  compare,
  unsigned_compare,
  equal
];

module.exports = Stdlib_int32;

/*::type Exports = {
  zero: any,
  one: any,
  minus_one: any,
  unsigned_div: (n: any, d: any) => any,
  unsigned_rem: (n: any, d: any) => any,
  succ: (n: any) => any,
  pred: (n: any) => any,
  abs: (n: any) => any,
  max_int: any,
  min_int: any,
  lognot: (n: any) => any,
  unsigned_to_int: (n: any) => any,
  of_string_opt: (s: any) => any,
  to_string: (n: any) => any,
  compare: (x: any, y: any) => any,
  unsigned_compare: (n: any, m: any) => any,
  equal: (x: any, y: any) => any,
}*/
/** @type {{
  zero: any,
  one: any,
  minus_one: any,
  unsigned_div: (n: any, d: any) => any,
  unsigned_rem: (n: any, d: any) => any,
  succ: (n: any) => any,
  pred: (n: any) => any,
  abs: (n: any) => any,
  max_int: any,
  min_int: any,
  lognot: (n: any) => any,
  unsigned_to_int: (n: any) => any,
  of_string_opt: (s: any) => any,
  to_string: (n: any) => any,
  compare: (x: any, y: any) => any,
  unsigned_compare: (n: any, m: any) => any,
  equal: (x: any, y: any) => any,
}} */
module.exports = ((module.exports /*:: : any*/) /*:: :Exports */);
module.exports.zero = module.exports[1];
module.exports.one = module.exports[2];
module.exports.minus_one = module.exports[3];
module.exports.unsigned_div = module.exports[4];
module.exports.unsigned_rem = module.exports[5];
module.exports.succ = module.exports[6];
module.exports.pred = module.exports[7];
module.exports.abs = module.exports[8];
module.exports.max_int = module.exports[9];
module.exports.min_int = module.exports[10];
module.exports.lognot = module.exports[11];
module.exports.unsigned_to_int = module.exports[12];
module.exports.of_string_opt = module.exports[13];
module.exports.to_string = module.exports[14];
module.exports.compare = module.exports[15];
module.exports.unsigned_compare = module.exports[16];
module.exports.equal = module.exports[17];

/* Hashing disabled */
