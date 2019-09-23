/**
 * Js_of_ocaml__Lib_version
 * @providesModule Js_of_ocaml__Lib_version
 */
"use strict";

var runtime = require('runtime.js');

let joo_global_object = global;


var runtime = joo_global_object.jsoo_runtime;
var string = runtime["caml_new_string"];
var s = string("3.3.0");
var git_version = string("314b769c9");
var Js_of_ocaml_Lib_version = [0,s,git_version];

runtime["caml_register_global"](
  2,
  Js_of_ocaml_Lib_version,
  "Js_of_ocaml__Lib_version"
);


module.exports = global.jsoo_runtime.caml_get_global_data().Js_of_ocaml__Lib_version;
/*____hashes compiler:hashing-disabled inputs:hashing-disabled bytecode:hashing-disabled*/
