/**
 * @flow strict
 * Stdlib__result
 */

// @ts-check


"use strict";

var runtime = require("../runtime/runtime.js");
var string = runtime["caml_new_string"];

function call1(f, a0) {
  return f.length === 1 ? f(a0) : runtime["caml_call_gen"](f, [a0]);
}

function call2(f, a0, a1) {
  return f.length === 2 ? f(a0, a1) : runtime["caml_call_gen"](f, [a0,a1]);
}

var cst_result_is_Ok = string("result is Ok _");
var cst_result_is_Error = string("result is Error _");
var Stdlib_seq = require("./Stdlib__seq.js");
var Stdlib = require("./Stdlib.js");

function ok(v) {return [0,v];}

function error(e) {return [1,e];}

function value(r, default__0) {
  if (0 === r[0]) {var v = r[1];return v;}
  return default__0;
}

function get_ok(param) {
  if (0 === param[0]) {var v = param[1];return v;}
  return call1(Stdlib[1], cst_result_is_Error);
}

function get_error(param) {
  if (0 === param[0]) {return call1(Stdlib[1], cst_result_is_Ok);}
  var e = param[1];
  return e;
}

function bind(r, f) {
  if (0 === r[0]) {var v = r[1];return call1(f, v);}
  return r;
}

function join(e) {if (0 === e[0]) {var r = e[1];return r;}return e;}

function map(f, e) {
  if (0 === e[0]) {var v = e[1];return [0,call1(f, v)];}
  return e;
}

function map_error(f, v) {
  if (0 === v[0]) {return v;}
  var e = v[1];
  return [1,call1(f, e)];
}

function fold(ok, error, param) {
  if (0 === param[0]) {var v = param[1];return call1(ok, v);}
  var e = param[1];
  return call1(error, e);
}

function iter(f, param) {
  if (0 === param[0]) {var v = param[1];return call1(f, v);}
  return 0;
}

function iter_error(f, param) {
  if (0 === param[0]) {return 0;}
  var e = param[1];
  return call1(f, e);
}

function is_ok(param) {return 0 === param[0] ? 1 : 0;}

function is_error(param) {return 0 === param[0] ? 0 : 1;}

function equal(ok, error, r0, match) {
  if (0 === r0[0]) {
    var c_ = r0[1];
    if (0 === match[0]) {var v1 = match[1];return call2(ok, c_, v1);}
  }
  else {
    var d_ = r0[1];
    if (0 !== match[0]) {var e1 = match[1];return call2(error, d_, e1);}
  }
  return 0;
}

function compare(ok, error, r0, match) {
  if (0 === r0[0]) {
    var a_ = r0[1];
    if (0 === match[0]) {var v1 = match[1];return call2(ok, a_, v1);}
    return -1;
  }
  var b_ = r0[1];
  if (0 === match[0]) {return 1;}
  var e1 = match[1];
  return call2(error, b_, e1);
}

function to_option(param) {
  if (0 === param[0]) {var v = param[1];return [0,v];}
  return 0;
}

function to_list(param) {
  if (0 === param[0]) {var v = param[1];return [0,v,0];}
  return 0;
}

function to_seq(param) {
  if (0 === param[0]) {var v = param[1];return call1(Stdlib_seq[2], v);}
  return Stdlib_seq[1];
}

var Stdlib_result = [
  0,
  ok,
  error,
  value,
  get_ok,
  get_error,
  bind,
  join,
  map,
  map_error,
  fold,
  iter,
  iter_error,
  is_ok,
  is_error,
  equal,
  compare,
  to_option,
  to_list,
  to_seq
];

module.exports = Stdlib_result;

/*::type Exports = {
  ok: (v: any) => any,
  error: (e: any) => any,
  value: (r: any, _default_: any) => any,
  get_ok: (param: any) => any,
  get_error: (param: any) => any,
  bind: (r: any, f: any) => any,
  join: (e: any) => any,
  map: (f: any, e: any) => any,
  map_error: (f: any, v: any) => any,
  fold: (ok: any, error: any, param: any) => any,
  iter: (f: any, param: any) => any,
  iter_error: (f: any, param: any) => any,
  is_ok: (param: any) => any,
  is_error: (param: any) => any,
  equal: (ok: any, error: any, r0: any, r1: any) => any,
  compare: (ok: any, error: any, r0: any, r1: any) => any,
  to_option: (param: any) => any,
  to_list: (param: any) => any,
  to_seq: (param: any) => any,
}*/
/** @type {{
  ok: (v: any) => any,
  error: (e: any) => any,
  value: (r: any, _default_: any) => any,
  get_ok: (param: any) => any,
  get_error: (param: any) => any,
  bind: (r: any, f: any) => any,
  join: (e: any) => any,
  map: (f: any, e: any) => any,
  map_error: (f: any, v: any) => any,
  fold: (ok: any, error: any, param: any) => any,
  iter: (f: any, param: any) => any,
  iter_error: (f: any, param: any) => any,
  is_ok: (param: any) => any,
  is_error: (param: any) => any,
  equal: (ok: any, error: any, r0: any, r1: any) => any,
  compare: (ok: any, error: any, r0: any, r1: any) => any,
  to_option: (param: any) => any,
  to_list: (param: any) => any,
  to_seq: (param: any) => any,
}} */
module.exports = ((module.exports /*:: : any*/) /*:: :Exports */);
module.exports.ok = module.exports[1];
module.exports.error = module.exports[2];
module.exports.value = module.exports[3];
module.exports.get_ok = module.exports[4];
module.exports.get_error = module.exports[5];
module.exports.bind = module.exports[6];
module.exports.join = module.exports[7];
module.exports.map = module.exports[8];
module.exports.map_error = module.exports[9];
module.exports.fold = module.exports[10];
module.exports.iter = module.exports[11];
module.exports.iter_error = module.exports[12];
module.exports.is_ok = module.exports[13];
module.exports.is_error = module.exports[14];
module.exports.equal = module.exports[15];
module.exports.compare = module.exports[16];
module.exports.to_option = module.exports[17];
module.exports.to_list = module.exports[18];
module.exports.to_seq = module.exports[19];

/* Hashing disabled */
