/**
 * @flow strict
 * Stdlib__option
 */

// @ts-check


"use strict";

var runtime = require("../runtime/runtime.js");

function call1(f, a0) {
  return f.length === 1 ? f(a0) : runtime["caml_call_gen"](f, [a0]);
}

function call2(f, a0, a1) {
  return f.length === 2 ? f(a0, a1) : runtime["caml_call_gen"](f, [a0,a1]);
}

var cst_option_is_None = runtime["caml_new_string"]("option is None");
var Stdlib_seq = require("./Stdlib__seq.js");
var Stdlib = require("./Stdlib.js");
var none = 0;

function some(v) {return [0,v];}

function value(o, default__0) {
  if (o) {var v = o[1];return v;}
  return default__0;
}

function get(param) {
  if (param) {var v = param[1];return v;}
  return call1(Stdlib[1], cst_option_is_None);
}

function bind(o, f) {if (o) {var v = o[1];return call1(f, v);}return 0;}

function join(param) {
  if (param) {var b_ = param[1];if (b_) {return b_;}}
  return 0;
}

function map(f, o) {if (o) {var v = o[1];return [0,call1(f, v)];}return 0;}

function fold(none, some, param) {
  if (param) {var v = param[1];return call1(some, v);}
  return none;
}

function iter(f, param) {
  if (param) {var v = param[1];return call1(f, v);}
  return 0;
}

function is_none(param) {return param ? 0 : 1;}

function is_some(param) {return param ? 1 : 0;}

function equal(eq, o0, o1) {
  if (o0) {
    if (o1) {var v1 = o1[1];var v0 = o0[1];return call2(eq, v0, v1);}
  }
  else if (! o1) {return 1;}
  return 0;
}

function compare(cmp, o0, o1) {
  if (o0) {
    var a_ = o0[1];
    if (o1) {var v1 = o1[1];return call2(cmp, a_, v1);}
    return 1;
  }
  return o1 ? -1 : 0;
}

function to_result(none, param) {
  if (param) {var v = param[1];return [0,v];}
  return [1,none];
}

function to_list(param) {
  if (param) {var v = param[1];return [0,v,0];}
  return 0;
}

function to_seq(param) {
  if (param) {var v = param[1];return call1(Stdlib_seq[2], v);}
  return Stdlib_seq[1];
}

var Stdlib_option = [
  0,
  none,
  some,
  value,
  get,
  bind,
  join,
  map,
  fold,
  iter,
  is_none,
  is_some,
  equal,
  compare,
  to_result,
  to_list,
  to_seq
];

module.exports = Stdlib_option;

/*::type Exports = {
  none: any,
  some: (v: any) => any,
  value: (o: any, _default_: any) => any,
  get: (param: any) => any,
  bind: (o: any, f: any) => any,
  join: (param: any) => any,
  map: (f: any, o: any) => any,
  fold: (none: any, some: any, param: any) => any,
  iter: (f: any, param: any) => any,
  is_none: (param: any) => any,
  is_some: (param: any) => any,
  equal: (eq: any, o0: any, o1: any) => any,
  compare: (cmp: any, o0: any, o1: any) => any,
  to_result: (none: any, param: any) => any,
  to_list: (param: any) => any,
  to_seq: (param: any) => any,
}*/
/** @type {{
  none: any,
  some: (v: any) => any,
  value: (o: any, _default_: any) => any,
  get: (param: any) => any,
  bind: (o: any, f: any) => any,
  join: (param: any) => any,
  map: (f: any, o: any) => any,
  fold: (none: any, some: any, param: any) => any,
  iter: (f: any, param: any) => any,
  is_none: (param: any) => any,
  is_some: (param: any) => any,
  equal: (eq: any, o0: any, o1: any) => any,
  compare: (cmp: any, o0: any, o1: any) => any,
  to_result: (none: any, param: any) => any,
  to_list: (param: any) => any,
  to_seq: (param: any) => any,
}} */
module.exports = ((module.exports /*:: : any*/) /*:: :Exports */);
module.exports.none = module.exports[1];
module.exports.some = module.exports[2];
module.exports.value = module.exports[3];
module.exports.get = module.exports[4];
module.exports.bind = module.exports[5];
module.exports.join = module.exports[6];
module.exports.map = module.exports[7];
module.exports.fold = module.exports[8];
module.exports.iter = module.exports[9];
module.exports.is_none = module.exports[10];
module.exports.is_some = module.exports[11];
module.exports.equal = module.exports[12];
module.exports.compare = module.exports[13];
module.exports.to_result = module.exports[14];
module.exports.to_list = module.exports[15];
module.exports.to_seq = module.exports[16];

/* Hashing disabled */
