/**
 * @flow strict
 * Js_of_ocaml__Lib_version
 */

// @ts-check


"use strict";
let joo_global_object = typeof global !== 'undefined' ? global : window;
require('runtime.js');

var runtime = joo_global_object.jsoo_runtime;
var string = runtime["caml_new_string"];
var s = string("3.3.0");
var git_version = string("696649d19");
var Js_of_ocaml_Lib_version = [0,s,git_version];

exports = Js_of_ocaml_Lib_version;

/*::type Exports = {
  git_version: any
  s: any
}*/
/** @type {{
  git_version: any,
  s: any,
}} */
module.exports = ((exports /*:: : any*/) /*:: :Exports */);
module.exports.git_version = module.exports[2];
module.exports.s = module.exports[1];

/* Hashing disabled */
