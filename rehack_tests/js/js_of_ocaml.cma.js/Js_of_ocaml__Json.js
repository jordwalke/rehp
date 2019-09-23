/**
 * Js_of_ocaml__Json
 * @providesModule Js_of_ocaml__Json
 */
"use strict";
var Js_of_ocaml__Js = require('Js_of_ocaml__Js.js');
var runtime = require('runtime.js');

let joo_global_object = global;


var runtime = joo_global_object.jsoo_runtime;
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
  function c(x) {return call1(caml_get_public_method(x, -309814068, 279), x);}
  return function(t2, t0, t1, param) {return t2.parse(t0, t1);}(json, s, input_reviver, c
  );
}

function a(x) {return call1(caml_get_public_method(x, 398798074, 280), x);}

var mlString_constr = function(t3, param) {return t3.constructor;}(dummy_string, a
);

function output_reviver(key, value) {
  return value instanceof mlString_constr ?
    runtime["caml_jsbytes_of_string"](value) :
    value;
}

function output(obj) {
  function b(x) {return call1(caml_get_public_method(x, 215522356, 281), x);}
  return function(t6, t4, t5, param) {return t6.stringify(t4, t5);}(json, obj, output_reviver, b
  );
}

var Js_of_ocaml_Json = [0,output,unsafe_input];

runtime["caml_register_global"](5, Js_of_ocaml_Json, "Js_of_ocaml__Json");


module.exports = global.jsoo_runtime.caml_get_global_data().Js_of_ocaml__Json;
/*____hashes compiler:hashing-disabled inputs:hashing-disabled bytecode:hashing-disabled*/
