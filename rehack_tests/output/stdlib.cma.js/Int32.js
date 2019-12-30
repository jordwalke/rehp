/**
 * @flow strict
 * Int32
 */

// @ts-check


"use strict";

var runtime = require("../runtime/runtime.js");
var caml_wrap_thrown_exception_reraise = runtime
 ["caml_wrap_thrown_exception_reraise"];
var cst_d = runtime["caml_new_string"]("%d");
var Failure = require("../runtime/Failure.js");
var zero = 0;
var one = 1;
var minus_one = -1;

function succ(n) {return n + 1 | 0;}

function pred(n) {return n - 1 | 0;}

function abs(n) {return runtime["caml_greaterequal"](n, 0) ? n : - n | 0;}

var min_int = -2147483648;
var max_int = 2147483647;

function lognot(n) {return n ^ -1;}

function to_string(n) {return runtime["caml_format_int"](cst_d, n);}

function of_string_opt(s) {
  var a_;
  try {a_ = [0,runtime["caml_int_of_string"](s)];return a_;}
  catch(b_) {
    b_ = runtime["caml_wrap_exception"](b_);
    if (b_[1] === Failure) {return 0;}
    throw caml_wrap_thrown_exception_reraise(b_);
  }
}

function compare(x, y) {return runtime["caml_int_compare"](x, y);}

function equal(x, y) {return 0 === compare(x, y) ? 1 : 0;}

var Int32 = [
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

module.exports = Int32;

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
module.exports = ((module.exports /*:: : any*/) /*:: :Exports */);
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
