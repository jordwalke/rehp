/**
 * @flow strict
 * Lazy
 */

// @ts-check


"use strict";

var runtime = require("../runtime/runtime.js");
var caml_obj_tag = runtime["caml_obj_tag"];
var Obj = require("./Obj.js");
var CamlinternalLazy = require("./CamlinternalLazy.js");
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

module.exports = Lazy;

/*::type Exports = {
  Undefined: any,
  force_val: any,
  from_fun: (f: any) => any,
  from_val: (v: any) => any,
  is_val: (l: any) => any,
}*/
/** @type {{
  Undefined: any,
  force_val: any,
  from_fun: (f: any) => any,
  from_val: (v: any) => any,
  is_val: (l: any) => any,
}} */
module.exports = ((module.exports /*:: : any*/) /*:: :Exports */);
module.exports.Undefined = module.exports[1];
module.exports.force_val = module.exports[2];
module.exports.from_fun = module.exports[3];
module.exports.from_val = module.exports[4];
module.exports.is_val = module.exports[5];

/* Hashing disabled */
