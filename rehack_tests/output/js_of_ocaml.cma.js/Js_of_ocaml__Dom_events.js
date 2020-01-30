/**
 * @flow strict
 * Js_of_ocaml__Dom_events
 */

// @ts-check


"use strict";

var runtime = require("../runtime/runtime.js");

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

var Js_of_ocaml_Dom_html = require("./Js_of_ocaml__Dom_html.js");

function listen(opt, target, typ, cb) {
  if (opt) {
    var sth = opt[1];
    var capture = sth;
  }
  else var capture = 0;
  var a_ = ! ! capture;
  function b_(n, e) {return ! ! call2(cb, n, e);}
  var c_ = call1(Js_of_ocaml_Dom_html[11], b_);
  return call4(Js_of_ocaml_Dom_html[17], target, typ, c_, a_);
}

var stop_listen = Js_of_ocaml_Dom_html[18];
var Js_of_ocaml_Dom_events = [0,Js_of_ocaml_Dom_html[15],listen,stop_listen];

module.exports = Js_of_ocaml_Dom_events;

/*::type Exports = {
  listen: (opt: any, target: any, typ: any, cb: any) => any,
  stop_listen: any,
}*/
/** @type {{
  listen: (opt: any, target: any, typ: any, cb: any) => any,
  stop_listen: any,
}} */
module.exports = ((module.exports /*:: : any*/) /*:: :Exports */);
module.exports.listen = module.exports[2];
module.exports.stop_listen = module.exports[3];

/* Hashing disabled */
