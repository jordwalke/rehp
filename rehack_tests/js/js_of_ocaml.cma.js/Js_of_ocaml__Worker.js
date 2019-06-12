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

function te(x) {return call1(caml_get_public_method(x, -324422083, 299), x);}

var tf = Js_of_ocaml_Js[50][1];
var worker = function(t0, param) {return t0.Worker;}(tf, te);

function create(script) {
  var tA = 0;
  var tB = script.toString();
  return function(t2, t1, param) {return new t2(t1);}(worker, tB, tA);
}

function import_scripts(scripts) {
  var ts = Js_of_ocaml_Js[3];
  function tt(x) {return call1(caml_get_public_method(x, 815769891, 300), x);}
  var tu = Js_of_ocaml_Js[50][1];
  if (function(t4, param) {return t4.importScripts;}(tu, tt) === ts) {call1(Pervasives[1], cst_Worker_import_scripts_is_undefined);}
  var tv = call1(Array[12], scripts);
  function tw(s) {return s.toString();}
  var tx = call2(Array[15], tw, tv);
  function ty(x) {return call1(caml_get_public_method(x, 815769891, 301), x);}
  var tz = Js_of_ocaml_Js[50][1];
  return runtime["caml_js_fun_call"](
    function(t3, param) {return t3.importScripts;}(tz, ty),
    tx
  );
}

function set_onmessage(handler) {
  var tl = Js_of_ocaml_Js[3];
  function tm(x) {return call1(caml_get_public_method(x, 610977416, 302), x);}
  var tn = Js_of_ocaml_Js[50][1];
  if (function(t8, param) {return t8.onmessage;}(tn, tm) === tl) {call1(Pervasives[1], cst_Worker_onmessage_is_undefined);}
  function js_handler(ev) {
    function tr(x) {
      return call1(caml_get_public_method(x, -1033677270, 303), x);
    }
    return call1(handler, function(t7, param) {return t7.data;}(ev, tr));
  }
  function to(x) {return call1(caml_get_public_method(x, 610977416, 304), x);}
  var tp = runtime["caml_js_wrap_callback"](js_handler);
  var tq = Js_of_ocaml_Js[50][1];
  return function(t6, t5, param) {t6.onmessage = t5;return 0;}(tq, tp, to);
}

function post_message(msg) {
  var tg = Js_of_ocaml_Js[3];
  function th(x) {
    return call1(caml_get_public_method(x, -699849401, 305), x);
  }
  var ti = Js_of_ocaml_Js[50][1];
  if (function(t11, param) {return t11.postMessage;}(ti, th) === tg) {call1(Pervasives[1], cst_Worker_onmessage_is_undefined__0);}
  function tj(x) {
    return call1(caml_get_public_method(x, -699849401, 306), x);
  }
  var tk = Js_of_ocaml_Js[50][1];
  return function(t10, t9, param) {return t10.postMessage(t9);}(tk, msg, tj);
}

var Js_of_ocaml_Worker = [0,create,import_scripts,set_onmessage,post_message];

runtime["caml_register_global"](14, Js_of_ocaml_Worker, "Js_of_ocaml__Worker");


module.exports = global.jsoo_runtime.caml_get_global_data().Js_of_ocaml__Worker;