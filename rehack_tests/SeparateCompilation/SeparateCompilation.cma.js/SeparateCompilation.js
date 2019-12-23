/**
 * @flow strict
 * SeparateCompilation
 */

// @ts-check


"use strict";
let joo_global_object = typeof global !== 'undefined' ? global : window;
require('runtime.js');

var runtime = joo_global_object.jsoo_runtime;

function call1(f, a0) {
  return f.length === 1 ? f(a0) : runtime["caml_call_gen"](f, [a0]);
}

var SeparateCompilation_SeparateCompilationHelper = require(
  "SeparateCompilation__SeparateCompilationHelper.js"
);
var Pervasives = require("Pervasives.js");
var MyLib = require("MyLib.js");

call1(Pervasives[34], SeparateCompilation_SeparateCompilationHelper[1]);

call1(Pervasives[30], runtime["caml_js_to_string"](MyLib[2]));

var SeparateCompilation = [0];

exports = SeparateCompilation;

/*::type Exports = {
}*/
/** @type {{
}} */
module.exports = ((exports /*:: : any*/) /*:: :Exports */);

/*____hashes flags: 585918536 bytecode: 10647412249 debug-data: 2536091606 primitives: 1058613066*/
