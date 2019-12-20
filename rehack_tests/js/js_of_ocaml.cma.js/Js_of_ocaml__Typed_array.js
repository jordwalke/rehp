/**
 * @flow strict
 * Js_of_ocaml__Typed_array
 */

// @ts-check


"use strict";
let joo_global_object = typeof global !== 'undefined' ? global : window;
require('runtime.js');

var runtime = joo_global_object.jsoo_runtime;
var caml_get_public_method = runtime["caml_get_public_method"];

function call1(f, a0) {
  return f.length === 1 ? f(a0) : runtime["caml_call_gen"](f, [a0]);
}

function call3(f, a0, a1, a2) {
  return f.length === 3 ?
    f(a0, a1, a2) :
    runtime["caml_call_gen"](f, [a0,a1,a2]);
}

var Js_of_ocaml_Js = require("Js_of_ocaml__Js.js");

function a_(x) {return call1(caml_get_public_method(x, 135830874, 52), x);}

var b_ = Js_of_ocaml_Js[50][1];
var arrayBuffer = function(t0, param) {return t0.ArrayBuffer;}(b_, a_);

function c_(x) {return call1(caml_get_public_method(x, 177821713, 53), x);}

var d_ = Js_of_ocaml_Js[50][1];
var int8Array = function(t1, param) {return t1.Int8Array;}(d_, c_);

function e_(x) {return call1(caml_get_public_method(x, 946312858, 54), x);}

var f_ = Js_of_ocaml_Js[50][1];
var uint8Array = function(t2, param) {return t2.Uint8Array;}(f_, e_);

function g_(x) {return call1(caml_get_public_method(x, -67443548, 55), x);}

var h_ = Js_of_ocaml_Js[50][1];
var int16Array = function(t3, param) {return t3.Int16Array;}(h_, g_);

function i_(x) {return call1(caml_get_public_method(x, -492610053, 56), x);}

var j_ = Js_of_ocaml_Js[50][1];
var uint16Array = function(t4, param) {return t4.Uint16Array;}(j_, i_);

function k_(x) {return call1(caml_get_public_method(x, 901275818, 57), x);}

var l_ = Js_of_ocaml_Js[50][1];
var int32Array = function(t5, param) {return t5.Int32Array;}(l_, k_);

function m_(x) {return call1(caml_get_public_method(x, 476109313, 58), x);}

var n_ = Js_of_ocaml_Js[50][1];
var uint32Array = function(t6, param) {return t6.Uint32Array;}(n_, m_);

function o_(x) {return call1(caml_get_public_method(x, -225061539, 59), x);}

var p_ = Js_of_ocaml_Js[50][1];
var float32Array = function(t7, param) {return t7.Float32Array;}(p_, o_);

function q_(x) {return call1(caml_get_public_method(x, 1007481438, 60), x);}

var r_ = Js_of_ocaml_Js[50][1];
var float64Array = function(t8, param) {return t8.Float64Array;}(r_, q_);

function set(a, i, v) {return call3(Js_of_ocaml_Js[17], a, i, v);}

function get(a, i) {return a[i];}

function unsafe_get(a, i) {return a[i];}

function s_(x) {return call1(caml_get_public_method(x, 789234990, 61), x);}

var t_ = Js_of_ocaml_Js[50][1];
var dataView = function(t9, param) {return t9.DataView;}(t_, s_);

function of_arrayBuffer(ab) {
  var x_ = 0;
  var uint8 = function(t11, t10, param) {return new t11(t10);}(uint8Array, ab, x_
  );
  return runtime["caml_string_of_array"](uint8);
}

var String = [0,of_arrayBuffer];

function u_(w_) {return runtime["bigstring_of_array_buffer"](w_);}

var Js_of_ocaml_Typed_array = [
  0,
  arrayBuffer,
  int8Array,
  int8Array,
  int8Array,
  int8Array,
  int8Array,
  uint8Array,
  uint8Array,
  uint8Array,
  uint8Array,
  uint8Array,
  int16Array,
  int16Array,
  int16Array,
  int16Array,
  int16Array,
  uint16Array,
  uint16Array,
  uint16Array,
  uint16Array,
  uint16Array,
  int32Array,
  int32Array,
  int32Array,
  int32Array,
  int32Array,
  uint32Array,
  uint32Array,
  uint32Array,
  uint32Array,
  uint32Array,
  float32Array,
  float32Array,
  float32Array,
  float32Array,
  float32Array,
  float64Array,
  float64Array,
  float64Array,
  float64Array,
  float64Array,
  set,
  get,
  unsafe_get,
  dataView,
  dataView,
  [0,function(v_) {return runtime["bigstring_to_array_buffer"](v_);},u_],
  String
];

exports = Js_of_ocaml_Typed_array;

/*::type Exports = {
  arrayBuffer: any
  int8Array: any
  int8Array: any
  int8Array: any
  int8Array: any
  int8Array: any
  uint8Array: any
  uint8Array: any
  uint8Array: any
  uint8Array: any
  uint8Array: any
  int16Array: any
  int16Array: any
  int16Array: any
  int16Array: any
  int16Array: any
  uint16Array: any
  uint16Array: any
  uint16Array: any
  uint16Array: any
  uint16Array: any
  int32Array: any
  int32Array: any
  int32Array: any
  int32Array: any
  int32Array: any
  uint32Array: any
  uint32Array: any
  uint32Array: any
  uint32Array: any
  uint32Array: any
  float32Array: any
  float32Array: any
  float32Array: any
  float32Array: any
  float32Array: any
  float64Array: any
  float64Array: any
  float64Array: any
  float64Array: any
  float64Array: any
  set: (a: any, i: any, v: any) => any,
  get: (a: any, i: any) => any,
  unsafe_get: (a: any, i: any) => any,
  dataView: any
  dataView: any
  String: any
}*/
/** @type {{
  arrayBuffer: any,
  int8Array: any,
  int8Array: any,
  int8Array: any,
  int8Array: any,
  int8Array: any,
  uint8Array: any,
  uint8Array: any,
  uint8Array: any,
  uint8Array: any,
  uint8Array: any,
  int16Array: any,
  int16Array: any,
  int16Array: any,
  int16Array: any,
  int16Array: any,
  uint16Array: any,
  uint16Array: any,
  uint16Array: any,
  uint16Array: any,
  uint16Array: any,
  int32Array: any,
  int32Array: any,
  int32Array: any,
  int32Array: any,
  int32Array: any,
  uint32Array: any,
  uint32Array: any,
  uint32Array: any,
  uint32Array: any,
  uint32Array: any,
  float32Array: any,
  float32Array: any,
  float32Array: any,
  float32Array: any,
  float32Array: any,
  float64Array: any,
  float64Array: any,
  float64Array: any,
  float64Array: any,
  float64Array: any,
  set: (any, any, any) => any,
  get: (any, any) => any,
  unsafe_get: (any, any) => any,
  dataView: any,
  dataView: any,
  String: any,
}} */
module.exports = ((exports /*:: : any*/) /*:: :Exports */);
module.exports.arrayBuffer = module.exports[1];
module.exports.int8Array = module.exports[2];
module.exports.int8Array = module.exports[3];
module.exports.int8Array = module.exports[4];
module.exports.int8Array = module.exports[5];
module.exports.int8Array = module.exports[6];
module.exports.uint8Array = module.exports[7];
module.exports.uint8Array = module.exports[8];
module.exports.uint8Array = module.exports[9];
module.exports.uint8Array = module.exports[10];
module.exports.uint8Array = module.exports[11];
module.exports.int16Array = module.exports[12];
module.exports.int16Array = module.exports[13];
module.exports.int16Array = module.exports[14];
module.exports.int16Array = module.exports[15];
module.exports.int16Array = module.exports[16];
module.exports.uint16Array = module.exports[17];
module.exports.uint16Array = module.exports[18];
module.exports.uint16Array = module.exports[19];
module.exports.uint16Array = module.exports[20];
module.exports.uint16Array = module.exports[21];
module.exports.int32Array = module.exports[22];
module.exports.int32Array = module.exports[23];
module.exports.int32Array = module.exports[24];
module.exports.int32Array = module.exports[25];
module.exports.int32Array = module.exports[26];
module.exports.uint32Array = module.exports[27];
module.exports.uint32Array = module.exports[28];
module.exports.uint32Array = module.exports[29];
module.exports.uint32Array = module.exports[30];
module.exports.uint32Array = module.exports[31];
module.exports.float32Array = module.exports[32];
module.exports.float32Array = module.exports[33];
module.exports.float32Array = module.exports[34];
module.exports.float32Array = module.exports[35];
module.exports.float32Array = module.exports[36];
module.exports.float64Array = module.exports[37];
module.exports.float64Array = module.exports[38];
module.exports.float64Array = module.exports[39];
module.exports.float64Array = module.exports[40];
module.exports.float64Array = module.exports[41];
module.exports.set = module.exports[42];
module.exports.get = module.exports[43];
module.exports.unsafe_get = module.exports[44];
module.exports.dataView = module.exports[45];
module.exports.dataView = module.exports[46];
module.exports.String = module.exports[48];

/* Hashing disabled */
