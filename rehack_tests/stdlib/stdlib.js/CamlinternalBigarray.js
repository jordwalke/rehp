/**
 * CamlinternalBigarray
 * @providesModule CamlinternalBigarray
 */
"use strict";

var runtime = require('runtime.js');

let joo_global_object = global;


var runtime = joo_global_object.jsoo_runtime;
var CamlinternalBigarray = [0];

runtime["caml_register_global"](
  0,
  CamlinternalBigarray,
  "CamlinternalBigarray"
);


module.exports = global.jsoo_runtime.caml_get_global_data().CamlinternalBigarray;
/*____hashes compiler:hashing-disabled inputs:hashing-disabled bytecode:hashing-disabled*/
