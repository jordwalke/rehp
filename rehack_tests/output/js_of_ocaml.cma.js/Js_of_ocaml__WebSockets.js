/**
 * @flow strict
 * Js_of_ocaml__WebSockets
 */

// @ts-check


"use strict";

var runtime = require("../runtime/runtime.js");

function call1(f, a0) {
  return f.length === 1 ? f(a0) : runtime["caml_call_gen"](f, [a0]);
}

var Js_of_ocaml_Js = require("./Js_of_ocaml__Js.js");

function a_(x) {
  return call1(runtime["caml_get_public_method"](x, -492394744, 211), x);
}

var b_ = Js_of_ocaml_Js[50][1];
var webSocket = function(t0, param) {return t0.WebSocket;}(b_, a_);

function is_supported(param) {return call1(Js_of_ocaml_Js[6][5], webSocket);}

var Js_of_ocaml_WebSockets = [0,webSocket,webSocket,webSocket,is_supported];

exports = Js_of_ocaml_WebSockets;

/*::type Exports = {
  webSocket: any,
  is_supported: (param: any) => any,
}*/
/** @type {{
  webSocket: any,
  is_supported: (param: any) => any,
}} */
module.exports = ((exports /*:: : any*/) /*:: :Exports */);
module.exports.webSocket = module.exports[1];
module.exports.is_supported = module.exports[4];

/* Hashing disabled */
