/**
 * @flow strict
 * MyLib__MyLibUtility
 */

// @ts-check


"use strict";
let joo_global_object = typeof global !== 'undefined' ? global : window;
require('runtime.js');

var runtime = joo_global_object.jsoo_runtime;

function call1(f, a0) {
  return f.length === 1 ? f(a0) : runtime["caml_call_gen"](f, [a0]);
}

var Random = require("Random.js");

function thisIsAUtilityFunction(param) {return call1(Random[5], 100);}

var MyLib_MyLibUtility = [0,thisIsAUtilityFunction];

exports = MyLib_MyLibUtility;

/*::type Exports = {
  thisIsAUtilityFunction: (param: any) => any,
}*/
/** @type {{
  thisIsAUtilityFunction: (any) => any,
}} */
module.exports = ((exports /*:: : any*/) /*:: :Exports */);
module.exports.thisIsAUtilityFunction = module.exports[1];

/* Hashing disabled */
