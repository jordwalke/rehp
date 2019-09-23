/**
 * Js_of_ocaml
 * @providesModule Js_of_ocaml
 */
"use strict";

var runtime = require('runtime.js');

let joo_global_object = global;


var runtime = joo_global_object.jsoo_runtime;
var Js_of_ocaml = [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];

runtime["caml_register_global"](0, Js_of_ocaml, "Js_of_ocaml");


module.exports = global.jsoo_runtime.caml_get_global_data().Js_of_ocaml;
