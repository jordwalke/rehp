/**
 * @flow strict
 * Js_of_ocaml__Json
 */

// @ts-check


"use strict";

var runtime = require("../runtime/runtime.js");
var caml_get_public_method = runtime["caml_get_public_method"];
var string = runtime["caml_new_string"];

function call1(f, a0) {
  return f.length === 1 ? f(a0) : runtime["caml_call_gen"](f, [a0]);
}

var dummy_string = string("");
var json = runtime["caml_json"](0);

function reviver(this__0, key, value) {
  return typeof value == typeof "foo" ?
    runtime["caml_js_to_byte_string"](value) :
    value;
}

var input_reviver = runtime["caml_js_wrap_meth_callback"](reviver);

function unsafe_input(s) {
  function c_(x) {
    return call1(caml_get_public_method(x, -309814068, 279), x);
  }
  return function(t2, t0, t1, param) {return t2.parse(t0, t1);}(json, s, input_reviver, c_
  );
}

function a_(x) {return call1(caml_get_public_method(x, 398798074, 280), x);}

var mlString_constr = function(t3, param) {return t3.constructor;}(dummy_string, a_
);

function output_reviver(key, value) {
  return value instanceof mlString_constr ?
    runtime["caml_jsbytes_of_string"](value) :
    value;
}

function output(obj) {
  function b_(x) {return call1(caml_get_public_method(x, 215522356, 281), x);}
  return function(t6, t4, t5, param) {return t6.stringify(t4, t5);}(json, obj, output_reviver, b_
  );
}

var Js_of_ocaml_Json = [0,output,unsafe_input];

module.exports = Js_of_ocaml_Json;

/*::type Exports = {
  output: (obj: any) => any,
  unsafe_input: (s: any) => any,
}*/
/** @type {{
  output: (obj: any) => any,
  unsafe_input: (s: any) => any,
}} */
module.exports = ((module.exports /*:: : any*/) /*:: :Exports */);
module.exports.output = module.exports[1];
module.exports.unsafe_input = module.exports[2];

/* Hashing disabled */
