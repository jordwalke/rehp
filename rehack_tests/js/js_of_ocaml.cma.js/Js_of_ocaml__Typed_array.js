/**
 * Js_of_ocaml__Typed_array
 * @providesModule Js_of_ocaml__Typed_array
 */
"use strict";
var Js_of_ocaml__Js = require('Js_of_ocaml__Js.js');
var runtime = require('runtime.js');

let joo_global_object = global;


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

var global_data = runtime["caml_get_global_data"]();
var Js_of_ocaml_Js = global_data["Js_of_ocaml__Js"];

function a(x) {return call1(caml_get_public_method(x, 135830874, 52), x);}

var b = Js_of_ocaml_Js[50][1];
var arrayBuffer = function(t0, param) {return t0.ArrayBuffer;}(b, a);

function c(x) {return call1(caml_get_public_method(x, 177821713, 53), x);}

var d = Js_of_ocaml_Js[50][1];
var int8Array = function(t1, param) {return t1.Int8Array;}(d, c);

function e(x) {return call1(caml_get_public_method(x, 946312858, 54), x);}

var f = Js_of_ocaml_Js[50][1];
var uint8Array = function(t2, param) {return t2.Uint8Array;}(f, e);

function g(x) {return call1(caml_get_public_method(x, -67443548, 55), x);}

var h = Js_of_ocaml_Js[50][1];
var int16Array = function(t3, param) {return t3.Int16Array;}(h, g);

function i(x) {return call1(caml_get_public_method(x, -492610053, 56), x);}

var j = Js_of_ocaml_Js[50][1];
var uint16Array = function(t4, param) {return t4.Uint16Array;}(j, i);

function k(x) {return call1(caml_get_public_method(x, 901275818, 57), x);}

var l = Js_of_ocaml_Js[50][1];
var int32Array = function(t5, param) {return t5.Int32Array;}(l, k);

function m(x) {return call1(caml_get_public_method(x, 476109313, 58), x);}

var n = Js_of_ocaml_Js[50][1];
var uint32Array = function(t6, param) {return t6.Uint32Array;}(n, m);

function o(x) {return call1(caml_get_public_method(x, -225061539, 59), x);}

var p = Js_of_ocaml_Js[50][1];
var float32Array = function(t7, param) {return t7.Float32Array;}(p, o);

function q(x) {return call1(caml_get_public_method(x, 1007481438, 60), x);}

var r = Js_of_ocaml_Js[50][1];
var float64Array = function(t8, param) {return t8.Float64Array;}(r, q);

function set(a, i, v) {return call3(Js_of_ocaml_Js[17], a, i, v);}

function get(a, i) {return a[i];}

function unsafe_get(a, i) {return a[i];}

function s(x) {return call1(caml_get_public_method(x, 789234990, 61), x);}

var t = Js_of_ocaml_Js[50][1];
var dataView = function(t9, param) {return t9.DataView;}(t, s);

function of_arrayBuffer(ab) {
  var x = 0;
  var uint8 = function(t11, t10, param) {return new t11(t10);}(uint8Array, ab, x
  );
  return runtime["caml_string_of_array"](uint8);
}

var String = [0,of_arrayBuffer];

function u(w) {return runtime["bigstring_of_array_buffer"](w);}

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
  [0,function(v) {return runtime["bigstring_to_array_buffer"](v);},u],
  String
];

runtime["caml_register_global"](
  11,
  Js_of_ocaml_Typed_array,
  "Js_of_ocaml__Typed_array"
);


module.exports = global.jsoo_runtime.caml_get_global_data().Js_of_ocaml__Typed_array;
