/**
 * Js_of_ocaml__Lib_version
 * @providesModule Js_of_ocaml__Lib_version
 */
"use strict";

var runtime = require('runtime.js');

let joo_global_object = global;


var runtime = joo_global_object.jsoo_runtime;
var caml_new_string = runtime["caml_new_string"];
var s = caml_new_string("3.3.0");
var git_version = caml_new_string("b0e3ce100");
var Js_of_ocaml_Lib_version = [0,s,git_version];

runtime["caml_register_global"](
  2,
  Js_of_ocaml_Lib_version,
  "Js_of_ocaml__Lib_version"
);


module.exports = global.jsoo_runtime.caml_get_global_data().Js_of_ocaml__Lib_version;