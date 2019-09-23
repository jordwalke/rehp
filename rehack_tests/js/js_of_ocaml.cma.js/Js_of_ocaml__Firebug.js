/**
 * Js_of_ocaml__Firebug
 * @providesModule Js_of_ocaml__Firebug
 */
"use strict";

var runtime = require('runtime.js');

let joo_global_object = global;


var runtime = joo_global_object.jsoo_runtime;
var console = runtime["caml_js_get_console"](0);
var Js_of_ocaml_Firebug = [0,console];

runtime["caml_register_global"](
  0,
  Js_of_ocaml_Firebug,
  "Js_of_ocaml__Firebug"
);


module.exports = global.jsoo_runtime.caml_get_global_data().Js_of_ocaml__Firebug;
/*____hashes compiler:hashing-disabled inputs:hashing-disabled bytecode:hashing-disabled*/
