/**
 * @flow strict
 * SeparateCompilation__SeparateCompilationHelper
 */

// @ts-check


"use strict";

var runtime = require("../runtime/runtime.js");
var helperVal = runtime["caml_new_string"]("hello!goodbye");
var SeparateCompilation_SeparateCompilationHelper = [0,helperVal];

module.exports = SeparateCompilation_SeparateCompilationHelper;

/*::type Exports = {
  helperVal: any,
}*/
/** @type {{
  helperVal: any,
}} */
module.exports = ((module.exports /*:: : any*/) /*:: :Exports */);
module.exports.helperVal = module.exports[1];

/*____hashes flags: 589793685 bytecode: 3815232550 debug-data: 1014914789 primitives: 1058613066*/
