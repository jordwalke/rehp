/**
 * @flow strict
 * Int64
 */

// @ts-check


"use strict";

var runtime = require("../runtime/runtime.js");
var caml_wrap_thrown_exception_reraise = runtime
 ["caml_wrap_thrown_exception_reraise"];
var cst_d = runtime["caml_new_string"]("%d");
var zero = [255,0,0,0];
var one = [255,1,0,0];
var minus_one = [255,16777215,16777215,65535];
var min_int = [255,0,0,32768];
var max_int = [255,16777215,16777215,32767];
var Failure = require("../runtime/Failure.js");
var d_ = [255,16777215,16777215,65535];
var c_ = [255,0,0,0];
var b_ = [255,1,0,0];
var a_ = [255,1,0,0];

function succ(n) {return runtime["caml_int64_add"](n, a_);}

function pred(n) {return runtime["caml_int64_sub"](n, b_);}

function abs(n) {
  return runtime["caml_greaterequal"](n, c_) ?
    n :
    runtime["caml_int64_neg"](n);
}

function lognot(n) {return runtime["caml_int64_xor"](n, d_);}

function to_string(n) {return runtime["caml_int64_format"](cst_d, n);}

function of_string_opt(s) {
  var e_;
  try {e_ = [0,runtime["caml_int64_of_string"](s)];return e_;}
  catch(f_) {
    f_ = runtime["caml_wrap_exception"](f_);
    if (f_[1] === Failure) {return 0;}
    throw caml_wrap_thrown_exception_reraise(f_);
  }
}

function compare(x, y) {return runtime["caml_int64_compare"](x, y);}

function equal(x, y) {return 0 === compare(x, y) ? 1 : 0;}

var Int64 = [
  0,
  zero,
  one,
  minus_one,
  succ,
  pred,
  abs,
  max_int,
  min_int,
  lognot,
  of_string_opt,
  to_string,
  compare,
  equal
];

exports = Int64;

/*::type Exports = {
  zero: any,
  one: any,
  minus_one: any,
  succ: (n: any) => any,
  pred: (n: any) => any,
  abs: (n: any) => any,
  max_int: any,
  min_int: any,
  lognot: (n: any) => any,
  of_string_opt: (s: any) => any,
  to_string: (n: any) => any,
  compare: (x: any, y: any) => any,
  equal: (x: any, y: any) => any,
}*/
/** @type {{
  zero: any,
  one: any,
  minus_one: any,
  succ: (n: any) => any,
  pred: (n: any) => any,
  abs: (n: any) => any,
  max_int: any,
  min_int: any,
  lognot: (n: any) => any,
  of_string_opt: (s: any) => any,
  to_string: (n: any) => any,
  compare: (x: any, y: any) => any,
  equal: (x: any, y: any) => any,
}} */
module.exports = ((exports /*:: : any*/) /*:: :Exports */);
module.exports.zero = module.exports[1];
module.exports.one = module.exports[2];
module.exports.minus_one = module.exports[3];
module.exports.succ = module.exports[4];
module.exports.pred = module.exports[5];
module.exports.abs = module.exports[6];
module.exports.max_int = module.exports[7];
module.exports.min_int = module.exports[8];
module.exports.lognot = module.exports[9];
module.exports.of_string_opt = module.exports[10];
module.exports.to_string = module.exports[11];
module.exports.compare = module.exports[12];
module.exports.equal = module.exports[13];

/* Hashing disabled */
