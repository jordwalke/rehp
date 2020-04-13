/**
 * @flow strict
 * Stdlib__int64
 */

// @ts-check


"use strict";

var runtime = require("../runtime/runtime.js");
var caml_int64_compare = runtime["caml_int64_compare"];
var caml_int64_mul = runtime["caml_int64_mul"];
var caml_int64_sub = runtime["caml_int64_sub"];
var caml_wrap_thrown_exception_reraise = runtime
 ["caml_wrap_thrown_exception_reraise"];
var cst_d = runtime["caml_new_string"]("%d");
var zero = [255,0,0,0];
var one = [255,1,0,0];
var minus_one = [255,16777215,16777215,65535];
var min_int = [255,0,0,32768];
var max_int = [255,16777215,16777215,32767];
var Stdlib = require("./Stdlib.js");
var d_ = [255,16777215,16777215,65535];
var c_ = [255,0,0,0];
var b_ = [255,1,0,0];
var a_ = [255,1,0,0];

function succ(n) {return runtime["caml_int64_add"](n, a_);}

function pred(n) {return caml_int64_sub(n, b_);}

function abs(n) {
  return runtime["caml_greaterequal"](n, c_) ?
    n :
    runtime["caml_int64_neg"](n);
}

function lognot(n) {return runtime["caml_int64_xor"](n, d_);}

var max_int__0 = runtime["caml_int64_of_int32"](Stdlib[19]);

function unsigned_to_int(n) {
  if (! (0 < caml_int64_compare(zero, n))) {
    if (! (0 < caml_int64_compare(n, max_int__0))) {
      return [0,runtime["caml_int64_to_int32"](n)];
    }
  }
  return 0;
}

function to_string(n) {return runtime["caml_int64_format"](cst_d, n);}

function of_string_opt(s) {
  var e_;
  try {e_ = [0,runtime["caml_int64_of_string"](s)];return e_;}
  catch(f_) {
    f_ = runtime["caml_wrap_exception"](f_);
    if (f_[1] === Stdlib[7]) {return 0;}
    throw caml_wrap_thrown_exception_reraise(f_);
  }
}

function compare(x, y) {return caml_int64_compare(x, y);}

function equal(x, y) {return 0 === compare(x, y) ? 1 : 0;}

function unsigned_compare(n, m) {
  return compare(caml_int64_sub(n, min_int), caml_int64_sub(m, min_int));
}

function unsigned_div(n, d) {
  if (runtime["caml_lessthan"](d, zero)) {
    return 0 <= unsigned_compare(n, d) ? one : zero;
  }
  var q = runtime["caml_int64_shift_left"](
    runtime["caml_int64_div"](
      runtime["caml_int64_shift_right_unsigned"](n, 1),
      d
    ),
    1
  );
  var r = caml_int64_sub(n, caml_int64_mul(q, d));
  return 0 <= unsigned_compare(r, d) ? succ(q) : q;
}

function unsigned_rem(n, d) {
  return caml_int64_sub(n, caml_int64_mul(unsigned_div(n, d), d));
}

var Stdlib_int64 = [
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

module.exports = Stdlib_int64;

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
