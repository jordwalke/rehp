/**
 * @flow strict
 * Stdlib__bool
 */

// @ts-check


"use strict";

var runtime = require("../runtime/runtime.js");
var string = runtime["caml_new_string"];
var cst_true = string("true");
var cst_false = string("false");

function equal(e_, d_) {return e_ === d_ ? 1 : 0;}

function compare(c_, b_) {return runtime["caml_int_compare"](c_, b_);}

function to_int(param) {return 0 === param ? 0 : 1;}

function to_float(param) {return 0 === param ? 0 : 1;}

function to_string(param) {return 0 === param ? cst_false : cst_true;}

var Stdlib_bool = [
  0,
  function(a_) {return ! a_;},
  equal,
  compare,
  to_int,
  to_float,
  to_string
];

module.exports = Stdlib_bool;

/*::type Exports = {
  equal: (arg0: any, arg1: any) => any,
  compare: (arg0: any, arg1: any) => any,
  to_int: (param: any) => any,
  to_float: (param: any) => any,
  to_string: (param: any) => any,
}*/
/** @type {{
  equal: (arg0: any, arg1: any) => any,
  compare: (arg0: any, arg1: any) => any,
  to_int: (param: any) => any,
  to_float: (param: any) => any,
  to_string: (param: any) => any,
}} */
module.exports = ((module.exports /*:: : any*/) /*:: :Exports */);
module.exports.equal = module.exports[2];
module.exports.compare = module.exports[3];
module.exports.to_int = module.exports[4];
module.exports.to_float = module.exports[5];
module.exports.to_string = module.exports[6];

/* Hashing disabled */
