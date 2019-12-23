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
var git_version = string("5fdbca036");
var Js_of_ocaml_Lib_version = [0,s,git_version];

exports = Js_of_ocaml_Lib_version;

/*::type Exports = {
  s: any
  git_version: any
}*/
/** @type {{
  s: any,
  git_version: any,
}} */
module.exports = ((exports /*:: : any*/) /*:: :Exports */);
module.exports.s = module.exports[1];
module.exports.git_version = module.exports[2];

/* Hashing disabled */
