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

function caml_call1(f, a0) {
  return f.length === 1 ? f(a0) : runtime["caml_call_gen"](f, [a0]);
}

function caml_call3(f, a0, a1, a2) {
  return f.length === 3 ?
    f(a0, a1, a2) :
    runtime["caml_call_gen"](f, [a0,a1,a2]);
}

var global_data = runtime["caml_get_global_data"]();
var Js_of_ocaml_Js = global_data["Js_of_ocaml__Js"];

function fZ(x) {
  return caml_call1(caml_get_public_method(x, 135830874, 76), x);
}

var f0 = Js_of_ocaml_Js[50][1];
var arrayBuffer = function(t0, param) {return t0.ArrayBuffer;}(f0, fZ);

function f1(x) {
  return caml_call1(caml_get_public_method(x, 177821713, 77), x);
}

var f2 = Js_of_ocaml_Js[50][1];
var int8Array = function(t1, param) {return t1.Int8Array;}(f2, f1);

function f3(x) {
  return caml_call1(caml_get_public_method(x, 946312858, 78), x);
}

var f4 = Js_of_ocaml_Js[50][1];
var uint8Array = function(t2, param) {return t2.Uint8Array;}(f4, f3);

function f5(x) {
  return caml_call1(caml_get_public_method(x, -67443548, 79), x);
}

var f6 = Js_of_ocaml_Js[50][1];
var int16Array = function(t3, param) {return t3.Int16Array;}(f6, f5);

function f7(x) {
  return caml_call1(caml_get_public_method(x, -492610053, 80), x);
}

var f8 = Js_of_ocaml_Js[50][1];
var uint16Array = function(t4, param) {return t4.Uint16Array;}(f8, f7);

function f9(x) {
  return caml_call1(caml_get_public_method(x, 901275818, 81), x);
}

var f_ = Js_of_ocaml_Js[50][1];
var int32Array = function(t5, param) {return t5.Int32Array;}(f_, f9);

function ga(x) {
  return caml_call1(caml_get_public_method(x, 476109313, 82), x);
}

var gb = Js_of_ocaml_Js[50][1];
var uint32Array = function(t6, param) {return t6.Uint32Array;}(gb, ga);

function gc(x) {
  return caml_call1(caml_get_public_method(x, -225061539, 83), x);
}

var gd = Js_of_ocaml_Js[50][1];
var float32Array = function(t7, param) {return t7.Float32Array;}(gd, gc);

function ge(x) {
  return caml_call1(caml_get_public_method(x, 1007481438, 84), x);
}

var gf = Js_of_ocaml_Js[50][1];
var float64Array = function(t8, param) {return t8.Float64Array;}(gf, ge);

function set(a, i, v) {return caml_call3(Js_of_ocaml_Js[17], a, i, v);}

function get(a, i) {return a[i];}

function unsafe_get(a, i) {return a[i];}

function gg(x) {
  return caml_call1(caml_get_public_method(x, 789234990, 85), x);
}

var gh = Js_of_ocaml_Js[50][1];
var dataView = function(t9, param) {return t9.DataView;}(gh, gg);

function of_arrayBuffer(ab) {
  var gl = 0;
  var uint8 = function(t11, t10, param) {return new t11(t10);}(uint8Array, ab, gl
  );
  return runtime["caml_string_of_array"](uint8);
}

var String = [0,of_arrayBuffer];

function gi(gk) {return runtime["bigstring_of_array_buffer"](gk);}

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
  [0,function(gj) {return runtime["bigstring_to_array_buffer"](gj);},gi],
  String
];

runtime["caml_register_global"](
  11,
  Js_of_ocaml_Typed_array,
  "Js_of_ocaml__Typed_array"
);


module.exports = global.jsoo_runtime.caml_get_global_data().Js_of_ocaml__Typed_array;