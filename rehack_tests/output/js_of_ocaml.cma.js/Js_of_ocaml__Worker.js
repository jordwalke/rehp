/**
 * @flow strict
 * Js_of_ocaml__Worker
 */

// @ts-check


"use strict";

var runtime = require("../runtime/runtime.js");
var caml_get_public_method = runtime["caml_get_public_method"];
var string = runtime["caml_new_string"];

function call1(f, a0) {
  return f.length === 1 ? f(a0) : runtime["caml_call_gen"](f, [a0]);
}

function call2(f, a0, a1) {
  return f.length === 2 ? f(a0, a1) : runtime["caml_call_gen"](f, [a0,a1]);
}

var cst_Worker_onmessage_is_undefined__0 = string(
  "Worker.onmessage is undefined"
);
var cst_Worker_onmessage_is_undefined = string("Worker.onmessage is undefined"
);
var cst_Worker_import_scripts_is_undefined = string(
  "Worker.import_scripts is undefined"
);
var Js_of_ocaml_Js = require("./Js_of_ocaml__Js.js");
var Stdlib = require("../stdlib.cma.js/Stdlib.js");
var Stdlib_array = require("../stdlib.cma.js/Stdlib__array.js");

function a_(x) {return call1(caml_get_public_method(x, -324422083, 210), x);}

var b_ = Js_of_ocaml_Js[50][1];
var worker = function(t0, param) {return t0.Worker;}(b_, a_);

function create(script) {
  var w_ = 0;
  var x_ = script.toString();
  return function(t2, t1, param) {return new t2(t1);}(worker, x_, w_);
}

function import_scripts(scripts) {
  var o_ = Js_of_ocaml_Js[3];
  function p_(x) {return call1(caml_get_public_method(x, 815769891, 211), x);}
  var q_ = Js_of_ocaml_Js[50][1];
  if (function(t4, param) {return t4.importScripts;}(q_, p_) === o_) {call1(Stdlib[1], cst_Worker_import_scripts_is_undefined);}
  var r_ = call1(Stdlib_array[12], scripts);
  function s_(s) {return s.toString();}
  var t_ = call2(Stdlib_array[15], s_, r_);
  function u_(x) {return call1(caml_get_public_method(x, 815769891, 212), x);}
  var v_ = Js_of_ocaml_Js[50][1];
  return runtime["caml_js_fun_call"](
    function(t3, param) {return t3.importScripts;}(v_, u_),
    t_
  );
}

function set_onmessage(handler) {
  var h_ = Js_of_ocaml_Js[3];
  function i_(x) {return call1(caml_get_public_method(x, 610977416, 213), x);}
  var j_ = Js_of_ocaml_Js[50][1];
  if (function(t8, param) {return t8.onmessage;}(j_, i_) === h_) {call1(Stdlib[1], cst_Worker_onmessage_is_undefined);}
  function js_handler(ev) {
    function n_(x) {
      return call1(caml_get_public_method(x, -1033677270, 214), x);
    }
    return call1(handler, function(t7, param) {return t7.data;}(ev, n_));
  }
  function k_(x) {return call1(caml_get_public_method(x, 610977416, 215), x);}
  var l_ = runtime["caml_js_wrap_callback"](js_handler);
  var m_ = Js_of_ocaml_Js[50][1];
  return function(t6, t5, param) {t6.onmessage = t5;return 0;}(m_, l_, k_);
}

function post_message(msg) {
  var c_ = Js_of_ocaml_Js[3];
  function d_(x) {
    return call1(caml_get_public_method(x, -699849401, 216), x);
  }
  var e_ = Js_of_ocaml_Js[50][1];
  if (function(t11, param) {return t11.postMessage;}(e_, d_) === c_) {call1(Stdlib[1], cst_Worker_onmessage_is_undefined__0);}
  function f_(x) {
    return call1(caml_get_public_method(x, -699849401, 217), x);
  }
  var g_ = Js_of_ocaml_Js[50][1];
  return function(t10, t9, param) {return t10.postMessage(t9);}(g_, msg, f_);
}

var Js_of_ocaml_Worker = [0,create,import_scripts,set_onmessage,post_message];

module.exports = Js_of_ocaml_Worker;

/*::type Exports = {
  create: (script: any) => any,
  import_scripts: (scripts: any) => any,
  set_onmessage: (handler: any) => any,
  post_message: (msg: any) => any,
}*/
/** @type {{
  create: (script: any) => any,
  import_scripts: (scripts: any) => any,
  set_onmessage: (handler: any) => any,
  post_message: (msg: any) => any,
}} */
module.exports = ((module.exports /*:: : any*/) /*:: :Exports */);
module.exports.create = module.exports[1];
module.exports.import_scripts = module.exports[2];
module.exports.set_onmessage = module.exports[3];
module.exports.post_message = module.exports[4];

/* Hashing disabled */
