/**
 * Callback
 * @providesModule Callback
 */
"use strict";
var Obj = require('Obj.js');
var runtime = require('runtime.js');

let joo_global_object = global;


var runtime = joo_global_object.jsoo_runtime;
var caml_register_named_value = runtime["caml_register_named_value"];
var global_data = runtime["caml_get_global_data"]();
var Obj = global_data["Obj"];

function register(name, v) {return caml_register_named_value(name, v);}

function register_exception(name, exn) {
  var slot = runtime["caml_obj_tag"](exn) === Obj[8] ? exn : exn[1];
  return caml_register_named_value(name, slot);
}

var Callback = [0,register,register_exception];

runtime["caml_register_global"](1, Callback, "Callback");


module.exports = global.jsoo_runtime.caml_get_global_data().Callback;
/*____hashes compiler:hashing-disabled inputs:hashing-disabled bytecode:hashing-disabled*/
