/**
 * @flow strict
 * Js_of_ocaml__WebSockets
 */

// @ts-check


"use strict";
let joo_global_object = typeof global !== 'undefined' ? global : window;
require('runtime.js');

var runtime = joo_global_object.jsoo_runtime;

function call1(f, a0) {
  return f.length === 1 ? f(a0) : runtime["caml_call_gen"](f, [a0]);
}

var Js_of_ocaml_Js = require("Js_of_ocaml__Js.js");

function a_(x) {
  return call1(runtime["caml_get_public_method"](x, -492394744, 211), x);
}

var b_ = Js_of_ocaml_Js[50][1];
var webSocket = function(t0, param) {return t0.WebSocket;}(b_, a_);

function is_supported(param) {return call1(Js_of_ocaml_Js[6][5], webSocket);}

var Js_of_ocaml_WebSockets = [0,webSocket,webSocket,webSocket,is_supported];

exports = Js_of_ocaml_WebSockets;

/*::type Exports = {
  is_supported: (param: any) => any,
  webSocket: any
  webSocket: any
  webSocket: any
}*/
/** @type {{
  is_supported: (any) => any,
  webSocket: any,
  webSocket: any,
  webSocket: any,
}} */
module.exports = ((exports /*:: : any*/) /*:: :Exports */);
module.exports.is_supported = module.exports[4];
module.exports.webSocket = module.exports[3];
module.exports.webSocket = module.exports[2];
module.exports.webSocket = module.exports[1];

/* Hashing disabled */
