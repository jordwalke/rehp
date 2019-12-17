/**
 * @flow strict
 * Js_of_ocaml__Geolocation
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

function empty_position_options(param) {return {};}

function a_(x) {return call1(caml_get_public_method(x, 82957527, 298), x);}

var b_ = Js_of_ocaml_Js[50][1];
var x = function(t1, param) {return t1.navigator;}(b_, a_);

if (call1(Js_of_ocaml_Js[6][5], x)) {
  var c_ = function(x) {
    return call1(caml_get_public_method(x, 315713478, 299), x);
  };
  var geolocation = function(t0, param) {return t0.geolocation;}(x, c_);
}
else var geolocation = x;

function is_supported(param) {
  return call1(Js_of_ocaml_Js[6][5], geolocation);
}

var Js_of_ocaml_Geolocation = [
  0,
  empty_position_options,
  geolocation,
  is_supported
];

exports = Js_of_ocaml_Geolocation;

/*::type Exports = {
  is_supported: (param: any) => any,
  geolocation: any
  empty_position_options: (param: any) => any,
}*/
/** @type {{
  is_supported: (any) => any,
  geolocation: any,
  empty_position_options: (any) => any,
}} */
module.exports = ((exports /*:: : any*/) /*:: :Exports */);
module.exports.is_supported = module.exports[3];
module.exports.geolocation = module.exports[2];
module.exports.empty_position_options = module.exports[1];

/* Hashing disabled */
