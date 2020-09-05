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
var Stdlib = require("../stdlib.cma.js/Stdlib.js");
var MyLib = require("../my-lib.cma.js/MyLib.js");

call1(Stdlib[46], SeparateCompilation_SeparateCompilationHelper[1]);

call1(Stdlib[42], runtime["caml_js_to_string"](MyLib[2]));

var SeparateCompilation = [0];

module.exports = SeparateCompilation;

/*::type Exports = {
}*/
/** @type {{
}} */
module.exports = ((module.exports /*:: : any*/) /*:: :Exports */);

/*____hashes flags: 343193019 bytecode: 8090041333 debug-data: 389742017 primitives: 1058613066*/
