/**
 * CamlinternalMod
 * @providesModule CamlinternalMod
 */
"use strict";
var Array_ = require('Array_.js');
var CamlinternalOO = require('CamlinternalOO.js');
var Obj = require('Obj.js');
var Assert_failure = require('Assert_failure.js');
var Undefined_recursive_module = require('Undefined_recursive_module.js');
var runtime = require('runtime.js');

let joo_global_object = global;


var runtime = joo_global_object.jsoo_runtime;
var update_mod = runtime["caml_CamlinternalMod_update_mod"];
var init_mod = runtime["caml_CamlinternalMod_init_mod"];
var CamlinternalMod = [0,init_mod,update_mod];

runtime["caml_register_global"](8, CamlinternalMod, "CamlinternalMod");


module.exports = global.jsoo_runtime.caml_get_global_data().CamlinternalMod;
/*____hashes compiler:hashing-disabled inputs:hashing-disabled bytecode:hashing-disabled*/
