/**
 * Lazy
 * @providesModule Lazy
 */
"use strict";
var CamlinternalLazy = require('CamlinternalLazy.js');
var Obj = require('Obj.js');
var runtime = require('runtime.js');

let joo_global_object = global;


var runtime = joo_global_object.jsoo_runtime;
var caml_obj_tag = runtime["caml_obj_tag"];
var global_data = runtime["caml_get_global_data"]();
var Obj = global_data["Obj"];
var CamlinternalLazy = global_data["CamlinternalLazy"];
var Undefined = CamlinternalLazy[1];
var force_val = CamlinternalLazy[5];

function from_fun(f) {
  var x = runtime["caml_obj_block"](Obj[6], 1);
  x[1] = f;
  return x;
}

function from_val(v) {
  var t = caml_obj_tag(v);
  if (t !== Obj[10]) {if (t !== Obj[6]) {if (t !== Obj[14]) {return v;}}}
  return runtime["caml_lazy_make_forward"](v);
}

function is_val(l) {return caml_obj_tag(l) !== Obj[6] ? 1 : 0;}

var Lazy = [
  0,
  Undefined,
  force_val,
  from_fun,
  from_val,
  is_val,
  from_fun,
  from_val,
  is_val
];

runtime["caml_register_global"](2, Lazy, "Lazy");


module.exports = global.jsoo_runtime.caml_get_global_data().Lazy;
/*____hashes compiler:hashing-disabled inputs:hashing-disabled bytecode:hashing-disabled*/
