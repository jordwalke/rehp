/**
 * Oo
 * @providesModule Oo
 */
"use strict";
var CamlinternalOO = require('CamlinternalOO.js');
var runtime = require('runtime.js');

let joo_global_object = global;


var runtime = joo_global_object.jsoo_runtime;
var global_data = runtime["caml_get_global_data"]();
var CamlinternalOO = global_data["CamlinternalOO"];
var copy = CamlinternalOO[22];
var new_method = CamlinternalOO[1];
var public_method_label = CamlinternalOO[1];
var Oo = [0,copy,new_method,public_method_label];

runtime["caml_register_global"](1, Oo, "Oo");


module.exports = global.jsoo_runtime.caml_get_global_data().Oo;
/*____hashes compiler:hashing-disabled inputs:hashing-disabled bytecode:hashing-disabled*/
