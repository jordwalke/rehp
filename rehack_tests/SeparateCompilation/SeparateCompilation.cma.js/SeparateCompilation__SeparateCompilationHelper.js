/**
 * @flow strict
 * SeparateCompilation__SeparateCompilationHelper
 */

// @ts-check


"use strict";
let joo_global_object = typeof global !== 'undefined' ? global : window;
require('runtime.js');

var runtime = joo_global_object.jsoo_runtime;
var helperVal = runtime["caml_new_string"]("hello!goodbye");
var SeparateCompilation_SeparateCompilationHelper = [0,helperVal];

exports = SeparateCompilation_SeparateCompilationHelper;

/*::type Exports = {
  helperVal: any
}*/
/** @type {{
  helperVal: any,
}} */
module.exports = ((exports /*:: : any*/) /*:: :Exports */);
module.exports.helperVal = module.exports[1];

/*____hashes flags: 585918536 bytecode: 3815232550 debug-data: 1624526790 primitives: 1058613066*/
