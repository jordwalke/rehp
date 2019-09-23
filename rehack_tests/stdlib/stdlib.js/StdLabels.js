/**
 * StdLabels
 * @providesModule StdLabels
 */
"use strict";

var runtime = require('runtime.js');

let joo_global_object = global;


var runtime = joo_global_object.jsoo_runtime;
var StdLabels = [0,0,0,0,0];

runtime["caml_register_global"](0, StdLabels, "StdLabels");


module.exports = global.jsoo_runtime.caml_get_global_data().StdLabels;
/*____hashes compiler:hashing-disabled inputs:hashing-disabled bytecode:hashing-disabled*/
