/**
 * @flow strict
 * Js_of_ocaml__Lib_version
 */

// @ts-check


"use strict";

var runtime = require("../runtime/runtime.js");
var string = runtime["caml_new_string"];
var s = string("3.3.0");
var git_version = string("7027b79ab");
var Js_of_ocaml_Lib_version = [0,s,git_version];

module.exports = Js_of_ocaml_Lib_version;

/*::type Exports = {
  s: any,
  git_version: any,
}*/
/** @type {{
  s: any,
  git_version: any,
}} */
module.exports = ((module.exports /*:: : any*/) /*:: :Exports */);
module.exports.s = module.exports[1];
module.exports.git_version = module.exports[2];

/* Hashing disabled */
