/**
 * @flow strict
 * StringHelper
 */

// @ts-check


"use strict";
let joo_global_object = typeof global !== 'undefined' ? global : window;
require('runtime.js');

var runtime = joo_global_object.jsoo_runtime;
var helperVal = runtime["caml_new_string"]("hello");
var StringHelper = [0,helperVal];

exports = StringHelper;

/*::type Exports = {
  helperVal: any
}*/
/** @type {{
  helperVal: any,
}} */
module.exports = ((exports /*:: : any*/) /*:: :Exports */);
module.exports.helperVal = module.exports[1];

/* Hashing disabled */
