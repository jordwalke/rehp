/**
 * Js_of_ocaml__Dom_events
 * @providesModule Js_of_ocaml__Dom_events
 */
"use strict";
var Js_of_ocaml__Dom_html = require('Js_of_ocaml__Dom_html.js');
var Js_of_ocaml__Js = require('Js_of_ocaml__Js.js');
var runtime = require('runtime.js');

let joo_global_object = global;


var runtime = joo_global_object.jsoo_runtime;

function call1(f, a0) {
  return f.length === 1 ? f(a0) : runtime["caml_call_gen"](f, [a0]);
}

function call2(f, a0, a1) {
  return f.length === 2 ? f(a0, a1) : runtime["caml_call_gen"](f, [a0,a1]);
}

function call4(f, a0, a1, a2, a3) {
  return f.length === 4 ?
    f(a0, a1, a2, a3) :
    runtime["caml_call_gen"](f, [a0,a1,a2,a3]);
}

var global_data = runtime["caml_get_global_data"]();
var Js_of_ocaml_Dom_html = global_data["Js_of_ocaml__Dom_html"];

function listen(opt, target, typ, cb) {
  if (opt) {
    var sth = opt[1];
    var capture = sth;
  }
  else var capture = 0;
  var a = ! ! capture;
  function b(n, e) {return ! ! call2(cb, n, e);}
  var c = call1(Js_of_ocaml_Dom_html[11], b);
  return call4(Js_of_ocaml_Dom_html[16], target, typ, c, a);
}

var stop_listen = Js_of_ocaml_Dom_html[17];
var Js_of_ocaml_Dom_events = [0,Js_of_ocaml_Dom_html[15],listen,stop_listen];

runtime["caml_register_global"](
  1,
  Js_of_ocaml_Dom_events,
  "Js_of_ocaml__Dom_events"
);


module.exports = global.jsoo_runtime.caml_get_global_data().Js_of_ocaml__Dom_events;
/*____hashes compiler:hashing-disabled inputs:hashing-disabled bytecode:hashing-disabled*/
