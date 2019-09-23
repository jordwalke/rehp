/**
 * StringHelper
 * @providesModule StringHelper
 */
"use strict";

var runtime = require('runtime.js');

let joo_global_object = global;


var runtime = joo_global_object.jsoo_runtime;
var helperVal = runtime["caml_new_string"]("hello");
var StringHelper = [0,helperVal];

runtime["caml_register_global"](1, StringHelper, "StringHelper");


module.exports = global.jsoo_runtime.caml_get_global_data().StringHelper;
/*____hashes compiler:hashing-disabled inputs:hashing-disabled bytecode:hashing-disabled*/
