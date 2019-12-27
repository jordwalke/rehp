/**
 * @flow strict
 * Lazy
 */

// @ts-check


"use strict";
let joo_global_object = typeof global !== 'undefined' ? global : window;
require('runtime.js');

var runtime = joo_global_object.jsoo_runtime;
var caml_obj_tag = runtime["caml_obj_tag"];
var Obj = require("Obj.js");
var CamlinternalLazy = require("CamlinternalLazy.js");
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

exports = Lazy;

/*::type Exports = {
  Undefined: any
  force_val: any
  from_fun: (f: any) => any,
  from_val: (v: any) => any,
  is_val: (l: any) => any,
  from_fun: (f: any) => any,
  from_val: (v: any) => any,
  is_val: (l: any) => any,
}*/
/** @type {{
  Undefined: any,
  force_val: any,
  from_fun: (any) => any,
  from_val: (any) => any,
  is_val: (any) => any,
  from_fun: (any) => any,
  from_val: (any) => any,
  is_val: (any) => any,
}} */
module.exports = ((exports /*:: : any*/) /*:: :Exports */);
module.exports.Undefined = module.exports[1];
module.exports.force_val = module.exports[2];
module.exports.from_fun = module.exports[3];
module.exports.from_val = module.exports[4];
module.exports.is_val = module.exports[5];
module.exports.from_fun = module.exports[6];
module.exports.from_val = module.exports[7];
module.exports.is_val = module.exports[8];

/* Hashing disabled */
