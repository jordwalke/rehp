/**
 * @flow strict
 * Stdlib__int
 */

// @ts-check


"use strict";

var runtime = require("../runtime/runtime.js");

;

var zero = 0;
var one = 1;
var minus_one = -1;

function abs(x) {return 0 <= x ? x : - x | 0;}

var max_int = 2147483647;
var min_int = -2147483648;

function lognot(x) {return x ^ -1;}

function equal(d_, c_) {return d_ === c_ ? 1 : 0;}

function compare(b_, a_) {return runtime["caml_int_compare"](b_, a_);}

function to_string(x) {return runtime["caml_new_string"]("" + x);}

var Stdlib_int = [
  0,
  zero,
  one,
  minus_one,
  abs,
  max_int,
  min_int,
  lognot,
  equal,
  compare,
  to_string
];

module.exports = Stdlib_int;

/*::type Exports = {
  zero: any,
  one: any,
  minus_one: any,
  abs: (x: any) => any,
  max_int: any,
  min_int: any,
  lognot: (x: any) => any,
  equal: (arg0: any, arg1: any) => any,
  compare: (arg0: any, arg1: any) => any,
  to_string: (x: any) => any,
}*/
/** @type {{
  zero: any,
  one: any,
  minus_one: any,
  abs: (x: any) => any,
  max_int: any,
  min_int: any,
  lognot: (x: any) => any,
  equal: (arg0: any, arg1: any) => any,
  compare: (arg0: any, arg1: any) => any,
  to_string: (x: any) => any,
}} */
module.exports = ((module.exports /*:: : any*/) /*:: :Exports */);
module.exports.zero = module.exports[1];
module.exports.one = module.exports[2];
module.exports.minus_one = module.exports[3];
module.exports.abs = module.exports[4];
module.exports.max_int = module.exports[5];
module.exports.min_int = module.exports[6];
module.exports.lognot = module.exports[7];
module.exports.equal = module.exports[8];
module.exports.compare = module.exports[9];
module.exports.to_string = module.exports[10];

/* Hashing disabled */
