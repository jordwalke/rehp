/**
 * @flow strict
 * Js_of_ocaml__EventSource
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

var Js_of_ocaml_Js = require("Js_of_ocaml__Js.js");
var Js_of_ocaml_Dom = require("Js_of_ocaml__Dom.js");

function withCredentials(b) {
  var init = {};
  function e_(x) {
    return call1(caml_get_public_method(x, -893090218, 295), x);
  }
  var f_ = ! ! b;
  (function(t1, t0, param) {t1.withCredentials = t0;return 0;}(init, f_, e_));
  return init;
}

function a_(x) {return call1(caml_get_public_method(x, -809811338, 296), x);}

var b_ = Js_of_ocaml_Js[50][1];
var eventSource = function(t2, param) {return t2.EventSource;}(b_, a_);

function c_(x) {return call1(caml_get_public_method(x, -809811338, 297), x);}

var d_ = Js_of_ocaml_Js[50][1];
var eventSource_options = function(t3, param) {return t3.EventSource;}(d_, c_);
var addEventListener = Js_of_ocaml_Dom[15];
var Js_of_ocaml_EventSource = [
  0,
  withCredentials,
  eventSource,
  eventSource_options,
  addEventListener
];

exports = Js_of_ocaml_EventSource;

/*::type Exports = {
  addEventListener: any
  eventSource_options: any
  eventSource: any
  withCredentials: (b: any) => any,
}*/
/** @type {{
  addEventListener: any,
  eventSource_options: any,
  eventSource: any,
  withCredentials: (any) => any,
}} */
module.exports = ((exports /*:: : any*/) /*:: :Exports */);
module.exports.addEventListener = module.exports[4];
module.exports.eventSource_options = module.exports[3];
module.exports.eventSource = module.exports[2];
module.exports.withCredentials = module.exports[1];

/* Hashing disabled */
