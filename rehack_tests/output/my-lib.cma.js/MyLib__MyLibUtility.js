/**
 * @flow strict
 * MyLib__MyLibUtility
 */

// @ts-check


"use strict";

var runtime = require("../runtime/runtime.js");

function call1(f, a0) {
  return f.length === 1 ? f(a0) : runtime["caml_call_gen"](f, [a0]);
}

var Stdlib_random = require("../stdlib.cma.js/Stdlib__random.js");

function thisIsAUtilityFunction(param) {return call1(Stdlib_random[5], 100);}

var MyLib_MyLibUtility = [0,thisIsAUtilityFunction];

module.exports = MyLib_MyLibUtility;

/*::type Exports = {
  thisIsAUtilityFunction: (param: any) => any,
}*/
/** @type {{
  thisIsAUtilityFunction: (param: any) => any,
}} */
module.exports = ((module.exports /*:: : any*/) /*:: :Exports */);
module.exports.thisIsAUtilityFunction = module.exports[1];

/*____hashes flags: 589793685 bytecode: 8526643038 debug-data: 1020972089 primitives: 1058613066 rehp-hash-bust:v4*/
