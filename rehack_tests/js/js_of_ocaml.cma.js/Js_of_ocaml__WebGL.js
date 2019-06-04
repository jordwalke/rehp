/**
 * Js_of_ocaml__WebGL
 * @providesModule Js_of_ocaml__WebGL
 */
"use strict";
var Js_of_ocaml__Dom_html = require('Js_of_ocaml__Dom_html.js');
var Js_of_ocaml__Js = require('Js_of_ocaml__Js.js');
var runtime = require('runtime.js');

let joo_global_object = global;


var runtime = joo_global_object.jsoo_runtime;
var caml_get_public_method = runtime["caml_get_public_method"];
var caml_new_string = runtime["caml_new_string"];

function caml_call1(f, a0) {
  return f.length === 1 ? f(a0) : runtime["caml_call_gen"](f, [a0]);
}

var global_data = runtime["caml_get_global_data"]();
var cst_webglcontextlost = caml_new_string("webglcontextlost");
var cst_webglcontextrestored = caml_new_string("webglcontextrestored");
var cst_webglcontextcreationerror = caml_new_string(
  "webglcontextcreationerror"
);
var Js_of_ocaml_Js = global_data["Js_of_ocaml__Js"];
var Js_of_ocaml_Dom_html = global_data["Js_of_ocaml__Dom_html"];
var defaultContextAttributes = {
  "alpha": Js_of_ocaml_Js[7],
  "depth": Js_of_ocaml_Js[7],
  "stencil": Js_of_ocaml_Js[8],
  "antialias": Js_of_ocaml_Js[7],
  "premultipliedAlpha": Js_of_ocaml_Js[8],
  "preserveDrawingBuffer": Js_of_ocaml_Js[8],
  "preferLowPowerToHighPerformance": Js_of_ocaml_Js[8],
  "failIfMajorPerformanceCaveat": Js_of_ocaml_Js[8]
};
var webglcontextlost = caml_call1(
  Js_of_ocaml_Dom_html[15][73],
  cst_webglcontextlost
);
var webglcontextrestored = caml_call1(
  Js_of_ocaml_Dom_html[15][73],
  cst_webglcontextrestored
);
var webglcontextcreationerror = caml_call1(
  Js_of_ocaml_Dom_html[15][73],
  cst_webglcontextcreationerror
);
var Event = [0,webglcontextlost,webglcontextrestored,webglcontextcreationerror
];

function getContext(c) {
  function s8(x) {
    return caml_call1(caml_get_public_method(x, -388424711, 294), x);
  }
  var s9 = "webgl";
  var ctx = function(t3, t2, param) {return t3.getContext(t2);}(c, s9, s8);
  if (caml_call1(Js_of_ocaml_Js[5][5], ctx)) {return ctx;}
  function s_(x) {
    return caml_call1(caml_get_public_method(x, -388424711, 295), x);
  }
  var ta = "experimental-webgl";
  return function(t1, t0, param) {return t1.getContext(t0);}(c, ta, s_);
}

function getContextWithAttributes(c, attribs) {
  function s4(x) {
    return caml_call1(caml_get_public_method(x, -719364538, 296), x);
  }
  var s5 = "webgl";
  var ctx = function(t9, t7, t8, param) {return t9.getContext(t7, t8);}(c, s5, attribs, s4
  );
  if (caml_call1(Js_of_ocaml_Js[5][5], ctx)) {return ctx;}
  function s6(x) {
    return caml_call1(caml_get_public_method(x, -719364538, 297), x);
  }
  var s7 = "experimental-webgl";
  return function(t6, t4, t5, param) {return t6.getContext(t4, t5);}(c, s7, attribs, s6
  );
}

var Js_of_ocaml_WebGL = [
  0,
  defaultContextAttributes,
  Event,
  getContext,
  getContextWithAttributes
];

runtime["caml_register_global"](21, Js_of_ocaml_WebGL, "Js_of_ocaml__WebGL");


module.exports = global.jsoo_runtime.caml_get_global_data().Js_of_ocaml__WebGL;