/**
 * @flow strict
 * CamlinternalLazy
 */

// @ts-check


"use strict";

var runtime = require("../runtime/runtime.js");
var caml_obj_set_tag = runtime["caml_obj_set_tag"];
var caml_obj_tag = runtime["caml_obj_tag"];
var caml_wrap_thrown_exception = runtime["caml_wrap_thrown_exception"];
var caml_wrap_thrown_exception_reraise = runtime
 ["caml_wrap_thrown_exception_reraise"];

function call1(f, a0) {
  return f.length === 1 ? f(a0) : runtime["caml_call_gen"](f, [a0]);
}

var cst_CamlinternalLazy_Undefined = runtime["caml_new_string"](
  "CamlinternalLazy.Undefined"
);
var Stdlib_obj = require("./Stdlib__obj.js");
var Undefined = [
  248,
  cst_CamlinternalLazy_Undefined,
  runtime["caml_fresh_oo_id"](0)
];

function raise_undefined(param) {throw caml_wrap_thrown_exception(Undefined);}

function force_lazy_block(blk) {
  var closure = blk[1];
  blk[1] = raise_undefined;
  try {
    var result = call1(closure, 0);
    blk[1] = result;
    caml_obj_set_tag(blk, Stdlib_obj[10]);
    return result;
  }
  catch(e) {
    e = runtime["caml_wrap_exception"](e);
    blk[1] = function(param) {throw caml_wrap_thrown_exception_reraise(e);};
    throw caml_wrap_thrown_exception_reraise(e);
  }
}

function force_val_lazy_block(blk) {
  var closure = blk[1];
  blk[1] = raise_undefined;
  var result = call1(closure, 0);
  blk[1] = result;
  caml_obj_set_tag(blk, Stdlib_obj[10]);
  return result;
}

function force(lzv) {
  var t = caml_obj_tag(lzv);
  return t === Stdlib_obj[10] ?
    lzv[1] :
    t !== Stdlib_obj[6] ? lzv : force_lazy_block(lzv);
}

function force_val(lzv) {
  var t = caml_obj_tag(lzv);
  return t === Stdlib_obj[10] ?
    lzv[1] :
    t !== Stdlib_obj[6] ? lzv : force_val_lazy_block(lzv);
}

var CamlinternalLazy = [
  0,
  Undefined,
  force_lazy_block,
  force_val_lazy_block,
  force,
  force_val
];

module.exports = CamlinternalLazy;

/*::type Exports = {
  Undefined: any,
  force_lazy_block: (blk: any) => any,
  force_val_lazy_block: (blk: any) => any,
  force: (lzv: any) => any,
  force_val: (lzv: any) => any,
}*/
/** @type {{
  Undefined: any,
  force_lazy_block: (blk: any) => any,
  force_val_lazy_block: (blk: any) => any,
  force: (lzv: any) => any,
  force_val: (lzv: any) => any,
}} */
module.exports = ((module.exports /*:: : any*/) /*:: :Exports */);
module.exports.Undefined = module.exports[1];
module.exports.force_lazy_block = module.exports[2];
module.exports.force_val_lazy_block = module.exports[3];
module.exports.force = module.exports[4];
module.exports.force_val = module.exports[5];

/* Hashing disabled */
