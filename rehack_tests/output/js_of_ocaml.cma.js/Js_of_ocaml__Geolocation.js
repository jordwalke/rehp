/**
 * @flow strict
 * Js_of_ocaml__Geolocation
 */

// @ts-check


"use strict";

var runtime = require("../runtime/runtime.js");
var caml_get_public_method = runtime["caml_get_public_method"];

function call1(f, a0) {
  return f.length === 1 ? f(a0) : runtime["caml_call_gen"](f, [a0]);
}

var Js_of_ocaml_Js = require("./Js_of_ocaml__Js.js");

function empty_position_options(param) {return {};}

function a_(x) {return call1(caml_get_public_method(x, 82957527, 305), x);}

var b_ = Js_of_ocaml_Js[50][1];
var x = function(t1, param) {return t1.navigator;}(b_, a_);

if (call1(Js_of_ocaml_Js[6][5], x)) {
  var c_ = function(x) {
    return call1(caml_get_public_method(x, 315713478, 306), x);
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

module.exports = Js_of_ocaml_Geolocation;

/*::type Exports = {
  empty_position_options: (param: any) => any,
  geolocation: any,
  is_supported: (param: any) => any,
}*/
/** @type {{
  empty_position_options: (param: any) => any,
  geolocation: any,
  is_supported: (param: any) => any,
}} */
module.exports = ((module.exports /*:: : any*/) /*:: :Exports */);
module.exports.empty_position_options = module.exports[1];
module.exports.geolocation = module.exports[2];
module.exports.is_supported = module.exports[3];

/* Hashing disabled */
