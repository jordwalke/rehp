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

function tc(x) {
  return caml_call1(caml_get_public_method(x, -324422083, 299), x);
}

var td = Js_of_ocaml_Js[50][1];
var worker = function(t0, param) {return t0.Worker;}(td, tc);

function create(script) {
  var ty = 0;
  var tz = script.toString();
  return function(t2, t1, param) {return new t2(t1);}(worker, tz, ty);
}

function import_scripts(scripts) {
  var tq = Js_of_ocaml_Js[3];
  function tr(x) {
    return caml_call1(caml_get_public_method(x, 815769891, 300), x);
  }
  var ts = Js_of_ocaml_Js[50][1];
  if (function(t4, param) {return t4.importScripts;}(ts, tr) === tq) {
    caml_call1(Pervasives[1], cst_Worker_import_scripts_is_undefined);
  }
  var tt = caml_call1(Array[12], scripts);
  function tu(s) {return s.toString();}
  var tv = caml_call2(Array[15], tu, tt);
  function tw(x) {
    return caml_call1(caml_get_public_method(x, 815769891, 301), x);
  }
  var tx = Js_of_ocaml_Js[50][1];
  return runtime["caml_js_fun_call"](
    function(t3, param) {return t3.importScripts;}(tx, tw),
    tv
  );
}

function set_onmessage(handler) {
  var tj = Js_of_ocaml_Js[3];
  function tk(x) {
    return caml_call1(caml_get_public_method(x, 610977416, 302), x);
  }
  var tl = Js_of_ocaml_Js[50][1];
  if (function(t8, param) {return t8.onmessage;}(tl, tk) === tj) {
    caml_call1(Pervasives[1], cst_Worker_onmessage_is_undefined);
  }
  function js_handler(ev) {
    function tp(x) {
      return caml_call1(caml_get_public_method(x, -1033677270, 303), x);
    }
    return caml_call1(handler, function(t7, param) {return t7.data;}(ev, tp));
  }
  function tm(x) {
    return caml_call1(caml_get_public_method(x, 610977416, 304), x);
  }
  var tn = runtime["caml_js_wrap_callback"](js_handler);
  var to = Js_of_ocaml_Js[50][1];
  return function(t6, t5, param) {return t6.onmessage = t5;}(to, tn, tm);
}

function post_message(msg) {
  var te = Js_of_ocaml_Js[3];
  function tf(x) {
    return caml_call1(caml_get_public_method(x, -699849401, 305), x);
  }
  var tg = Js_of_ocaml_Js[50][1];
  if (function(t11, param) {return t11.postMessage;}(tg, tf) === te) {caml_call1(Pervasives[1], cst_Worker_onmessage_is_undefined__0);
  }
  function th(x) {
    return caml_call1(caml_get_public_method(x, -699849401, 306), x);
  }
  var ti = Js_of_ocaml_Js[50][1];
  return function(t10, t9, param) {return t10.postMessage(t9);}(ti, msg, th);
}

var Js_of_ocaml_Worker = [0,create,import_scripts,set_onmessage,post_message];

runtime["caml_register_global"](14, Js_of_ocaml_Worker, "Js_of_ocaml__Worker");


module.exports = global.jsoo_runtime.caml_get_global_data().Js_of_ocaml__Worker;