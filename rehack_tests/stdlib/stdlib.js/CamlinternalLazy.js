/**
 * CamlinternalLazy
 * @providesModule CamlinternalLazy
 */
"use strict";
var Obj = require('Obj.js');
var runtime = require('runtime.js');

let joo_global_object = global;


var runtime = joo_global_object.jsoo_runtime;
var caml_obj_set_tag = runtime["caml_obj_set_tag"];
var caml_obj_tag = runtime["caml_obj_tag"];
var caml_wrap_exception = runtime["caml_wrap_exception"];

function call1(f, a0) {
  return f.length === 1 ? f(a0) : runtime["caml_call_gen"](f, [a0]);
}

var global_data = runtime["caml_get_global_data"]();
var cst_CamlinternalLazy_Undefined = runtime["caml_new_string"](
  "CamlinternalLazy.Undefined"
);
var Obj = global_data["Obj"];
var Undefined = [
  248,
  cst_CamlinternalLazy_Undefined,
  runtime["caml_fresh_oo_id"](0)
];

function raise_undefined(param) {
  throw runtime["caml_wrap_thrown_exception"](Undefined);
}

function force_lazy_block(blk) {
  var closure = blk[1];
  blk[1] = raise_undefined;
  try {
    var result = call1(closure, 0);
    blk[1] = result;
    caml_obj_set_tag(blk, Obj[10]);
    return result;
  }
  catch(e) {
    e = caml_wrap_exception(e);
    blk[1] =
      function(param) {
        throw runtime["caml_wrap_thrown_exception_reraise"](e);
      };
    throw runtime["caml_wrap_thrown_exception_reraise"](e);
  }
}

function force_val_lazy_block(blk) {
  var closure = blk[1];
  blk[1] = raise_undefined;
  var result = call1(closure, 0);
  blk[1] = result;
  caml_obj_set_tag(blk, Obj[10]);
  return result;
}

function force(lzv) {
  var t = caml_obj_tag(lzv);
  return t === Obj[10] ? lzv[1] : t !== Obj[6] ? lzv : force_lazy_block(lzv);
}

function force_val(lzv) {
  var t = caml_obj_tag(lzv);
  return t === Obj[10] ?
    lzv[1] :
    t !== Obj[6] ? lzv : force_val_lazy_block(lzv);
}

var CamlinternalLazy = [
  0,
  Undefined,
  force_lazy_block,
  force_val_lazy_block,
  force,
  force_val
];

runtime["caml_register_global"](2, CamlinternalLazy, "CamlinternalLazy");


module.exports = global.jsoo_runtime.caml_get_global_data().CamlinternalLazy;
/*____hashes compiler:hashing-disabled inputs:hashing-disabled bytecode:hashing-disabled*/
