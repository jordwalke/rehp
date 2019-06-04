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
var caml_new_string = runtime["caml_new_string"];

function caml_call1(f, a0) {
  return f.length === 1 ? f(a0) : runtime["caml_call_gen"](f, [a0]);
}

function caml_call2(f, a0, a1) {
  return f.length === 2 ? f(a0, a1) : runtime["caml_call_gen"](f, [a0,a1]);
}

var global_data = runtime["caml_get_global_data"]();
var cst_Worker_onmessage_is_undefined__0 = caml_new_string(
  "Worker.onmessage is undefined"
);
var cst_Worker_onmessage_is_undefined = caml_new_string(
  "Worker.onmessage is undefined"
);
var cst_Worker_import_scripts_is_undefined = caml_new_string(
  "Worker.import_scripts is undefined"
);
var Js_of_ocaml_Js = global_data["Js_of_ocaml__Js"];
var Pervasives = global_data["Pervasives"];
var Array = global_data["Array_"];

function td(x) {
  return caml_call1(caml_get_public_method(x, -324422083, 299), x);
}

var te = Js_of_ocaml_Js[50][1];
var worker = function(t0, param) {return t0.Worker;}(te, td);

function create(script) {
  var tz = 0;
  var tA = script.toString();
  return function(t2, t1, param) {return new t2(t1);}(worker, tA, tz);
}

function import_scripts(scripts) {
  var tr = Js_of_ocaml_Js[3];
  function ts(x) {
    return caml_call1(caml_get_public_method(x, 815769891, 300), x);
  }
  var tt = Js_of_ocaml_Js[50][1];
  if (function(t4, param) {return t4.importScripts;}(tt, ts) === tr) {
    caml_call1(Pervasives[1], cst_Worker_import_scripts_is_undefined);
  }
  var tu = caml_call1(Array[12], scripts);
  function tv(s) {return s.toString();}
  var tw = caml_call2(Array[15], tv, tu);
  function tx(x) {
    return caml_call1(caml_get_public_method(x, 815769891, 301), x);
  }
  var ty = Js_of_ocaml_Js[50][1];
  return runtime["caml_js_fun_call"](
    function(t3, param) {return t3.importScripts;}(ty, tx),
    tw
  );
}

function set_onmessage(handler) {
  var tk = Js_of_ocaml_Js[3];
  function tl(x) {
    return caml_call1(caml_get_public_method(x, 610977416, 302), x);
  }
  var tm = Js_of_ocaml_Js[50][1];
  if (function(t8, param) {return t8.onmessage;}(tm, tl) === tk) {
    caml_call1(Pervasives[1], cst_Worker_onmessage_is_undefined);
  }
  function js_handler(ev) {
    function tq(x) {
      return caml_call1(caml_get_public_method(x, -1033677270, 303), x);
    }
    return caml_call1(handler, function(t7, param) {return t7.data;}(ev, tq));
  }
  function tn(x) {
    return caml_call1(caml_get_public_method(x, 610977416, 304), x);
  }
  var to = runtime["caml_js_wrap_callback"](js_handler);
  var tp = Js_of_ocaml_Js[50][1];
  return function(t6, t5, param) {t6.onmessage = t5;return 0;}(tp, to, tn);
}

function post_message(msg) {
  var tf = Js_of_ocaml_Js[3];
  function tg(x) {
    return caml_call1(caml_get_public_method(x, -699849401, 305), x);
  }
  var th = Js_of_ocaml_Js[50][1];
  if (function(t11, param) {return t11.postMessage;}(th, tg) === tf) {caml_call1(Pervasives[1], cst_Worker_onmessage_is_undefined__0);
  }
  function ti(x) {
    return caml_call1(caml_get_public_method(x, -699849401, 306), x);
  }
  var tj = Js_of_ocaml_Js[50][1];
  return function(t10, t9, param) {return t10.postMessage(t9);}(tj, msg, ti);
}

var Js_of_ocaml_Worker = [0,create,import_scripts,set_onmessage,post_message];

runtime["caml_register_global"](14, Js_of_ocaml_Worker, "Js_of_ocaml__Worker");


module.exports = global.jsoo_runtime.caml_get_global_data().Js_of_ocaml__Worker;