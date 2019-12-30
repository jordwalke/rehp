/**
 * @flow strict
 * SeparateCompilation
 */

// @ts-check


"use strict";

var runtime = require("../runtime/runtime.js");

function call1(f, a0) {
  return f.length === 1 ? f(a0) : runtime["caml_call_gen"](f, [a0]);
}

var SeparateCompilation_SeparateCompilationHelper = require(
  "./SeparateCompilation__SeparateCompilationHelper.js"
);
var Pervasives = require("../stdlib.cma.js/Pervasives.js");
var MyLib = require("../my-lib.cma.js/MyLib.js");

call1(Pervasives[34], SeparateCompilation_SeparateCompilationHelper[1]);

call1(Pervasives[30], runtime["caml_js_to_string"](MyLib[2]));

var SeparateCompilation = [0];

module.exports = SeparateCompilation;

/*::type Exports = {
}*/
/** @type {{
}} */
module.exports = ((module.exports /*:: : any*/) /*:: :Exports */);

/*____hashes flags: 589793685 bytecode: 10647412249 debug-data: 1986690936 primitives: 1058613066*/
