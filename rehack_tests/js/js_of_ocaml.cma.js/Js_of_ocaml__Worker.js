/**
 * Js_of_ocaml__Worker
 * @providesModule Js_of_ocaml__Worker
 */
"use strict";
var Array_ = require('Array_.js');
var Js_of_ocaml__Js = require('Js_of_ocaml__Js.js');
var Pervasives = require('Pervasives.js');
var runtime = require('runtime.js');

let joo_global_object = global;



var runtime = joo_global_object.jsoo_runtime;
var caml_get_public_method = runtime["caml_get_public_method"];
var string = runtime["caml_new_string"];

function call1(f, a0) {
  return f.length === 1 ? f(a0) : runtime["caml_call_gen"](f, [a0]);
}

function call2(f, a0, a1) {
  return f.length === 2 ? f(a0, a1) : runtime["caml_call_gen"](f, [a0,a1]);
}

var global_data = runtime["caml_get_global_data"]();
var cst_Worker_onmessage_is_undefined__0 = string(
  "Worker.onmessage is undefined"
);
var cst_Worker_onmessage_is_undefined = string("Worker.onmessage is undefined"
);
var cst_Worker_import_scripts_is_undefined = string(
  "Worker.import_scripts is undefined"
);
var Js_of_ocaml_Js = global_data["Js_of_ocaml__Js"];
var Pervasives = global_data["Pervasives"];
var Array = global_data["Array_"];

function a_(x) {return call1(caml_get_public_method(x, -324422083, 203), x);}

var b_ = Js_of_ocaml_Js[50][1];
var worker = function(t0, param) {return t0.Worker;}(b_, a_);

function create(script) {
  var w_ = 0;
  var x_ = script.toString();
  return function(t2, t1, param) {return new t2(t1);}(worker, x_, w_);
}

function import_scripts(scripts) {
  var o_ = Js_of_ocaml_Js[3];
  function p_(x) {return call1(caml_get_public_method(x, 815769891, 204), x);}
  var q_ = Js_of_ocaml_Js[50][1];
  if (function(t4, param) {return t4.importScripts;}(q_, p_) === o_) {call1(Pervasives[1], cst_Worker_import_scripts_is_undefined);}
  var r_ = call1(Array[12], scripts);
  function s_(s) {return s.toString();}
  var t_ = call2(Array[15], s_, r_);
  function u_(x) {return call1(caml_get_public_method(x, 815769891, 205), x);}
  var v_ = Js_of_ocaml_Js[50][1];
  return runtime["caml_js_fun_call"](
    function(t3, param) {return t3.importScripts;}(v_, u_),
    t_
  );
}

function set_onmessage(handler) {
  var h_ = Js_of_ocaml_Js[3];
  function i_(x) {return call1(caml_get_public_method(x, 610977416, 206), x);}
  var j_ = Js_of_ocaml_Js[50][1];
  if (function(t8, param) {return t8.onmessage;}(j_, i_) === h_) {call1(Pervasives[1], cst_Worker_onmessage_is_undefined);}
  function js_handler(ev) {
    function n_(x) {
      return call1(caml_get_public_method(x, -1033677270, 207), x);
    }
    return call1(handler, function(t7, param) {return t7.data;}(ev, n_));
  }
  function k_(x) {return call1(caml_get_public_method(x, 610977416, 208), x);}
  var l_ = runtime["caml_js_wrap_callback"](js_handler);
  var m_ = Js_of_ocaml_Js[50][1];
  return function(t6, t5, param) {t6.onmessage = t5;return 0;}(m_, l_, k_);
}

function post_message(msg) {
  var c_ = Js_of_ocaml_Js[3];
  function d_(x) {
    return call1(caml_get_public_method(x, -699849401, 209), x);
  }
  var e_ = Js_of_ocaml_Js[50][1];
  if (function(t11, param) {return t11.postMessage;}(e_, d_) === c_) {call1(Pervasives[1], cst_Worker_onmessage_is_undefined__0);}
  function f_(x) {
    return call1(caml_get_public_method(x, -699849401, 210), x);
  }
  var g_ = Js_of_ocaml_Js[50][1];
  return function(t10, t9, param) {return t10.postMessage(t9);}(g_, msg, f_);
}

var Js_of_ocaml_Worker = [0,create,import_scripts,set_onmessage,post_message];

runtime["caml_register_global"](14, Js_of_ocaml_Worker, "Js_of_ocaml__Worker");


module.exports = global.jsoo_runtime.caml_get_global_data().Js_of_ocaml__Worker;
/* Hashing disabled */
