/**
 * Js_of_ocaml__WebSockets
 * @providesModule Js_of_ocaml__WebSockets
 */
"use strict";
var Js_of_ocaml__Js = require('Js_of_ocaml__Js.js');
var runtime = require('runtime.js');

let joo_global_object = global;


var runtime = joo_global_object.jsoo_runtime;

function call1(f, a0) {
  return f.length === 1 ? f(a0) : runtime["caml_call_gen"](f, [a0]);
}

var global_data = runtime["caml_get_global_data"]();
var Js_of_ocaml_Js = global_data["Js_of_ocaml__Js"];

function a(x) {
  return call1(runtime["caml_get_public_method"](x, -492394744, 211), x);
}

var b = Js_of_ocaml_Js[50][1];
var webSocket = function(t0, param) {return t0.WebSocket;}(b, a);

function is_supported(param) {return call1(Js_of_ocaml_Js[6][5], webSocket);}

var Js_of_ocaml_WebSockets = [0,webSocket,webSocket,webSocket,is_supported];

runtime["caml_register_global"](
  2,
  Js_of_ocaml_WebSockets,
  "Js_of_ocaml__WebSockets"
);


module.exports = global.jsoo_runtime.caml_get_global_data().Js_of_ocaml__WebSockets;
