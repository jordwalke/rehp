/**
 * @flow strict
 * Stdlib__unit
 */

// @ts-check


"use strict";

var runtime = require("../runtime/runtime.js");

;

var cst = runtime["caml_new_string"]("()");

function equal(param, b_) {return 1;}

function compare(param, a_) {return 0;}

function to_string(param) {return cst;}

var Stdlib_unit = [0,equal,compare,to_string];

module.exports = Stdlib_unit;

/*::type Exports = {
  equal: (param: any, arg1: any) => any,
  compare: (param: any, arg1: any) => any,
  to_string: (param: any) => any,
}*/
/** @type {{
  equal: (param: any, arg1: any) => any,
  compare: (param: any, arg1: any) => any,
  to_string: (param: any) => any,
}} */
module.exports = ((module.exports /*:: : any*/) /*:: :Exports */);
module.exports.equal = module.exports[1];
module.exports.compare = module.exports[2];
module.exports.to_string = module.exports[3];

/* Hashing disabled */
