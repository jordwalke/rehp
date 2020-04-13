/**
 * @flow strict
 * Stdlib__printf
 */

// @ts-check


"use strict";

var runtime = require("../runtime/runtime.js");

;

function call1(f, a0) {
  return f.length === 1 ? f(a0) : runtime["caml_call_gen"](f, [a0]);
}

function call2(f, a0, a1) {
  return f.length === 2 ? f(a0, a1) : runtime["caml_call_gen"](f, [a0,a1]);
}

function call3(f, a0, a1, a2) {
  return f.length === 3 ?
    f(a0, a1, a2) :
    runtime["caml_call_gen"](f, [a0,a1,a2]);
}

var Stdlib_buffer = require("./Stdlib__buffer.js");
var CamlinternalFormat = require("./CamlinternalFormat.js");
var Stdlib = require("./Stdlib.js");

function kfprintf(k, o, param) {
  var fmt = param[1];
  var f_ = 0;
  function g_(acc) {call2(CamlinternalFormat[9], o, acc);return call1(k, o);}
  return call3(CamlinternalFormat[7], g_, f_, fmt);
}

function kbprintf(k, b, param) {
  var fmt = param[1];
  var d_ = 0;
  function e_(acc) {call2(CamlinternalFormat[10], b, acc);return call1(k, b);}
  return call3(CamlinternalFormat[7], e_, d_, fmt);
}

function ikfprintf(k, oc, param) {
  var fmt = param[1];
  return call3(CamlinternalFormat[8], k, oc, fmt);
}

function fprintf(oc, fmt) {
  return kfprintf(function(c_) {return 0;}, oc, fmt);
}

function bprintf(b, fmt) {return kbprintf(function(b_) {return 0;}, b, fmt);}

function ifprintf(oc, fmt) {
  return ikfprintf(function(a_) {return 0;}, oc, fmt);
}

function printf(fmt) {return fprintf(Stdlib[39], fmt);}

function eprintf(fmt) {return fprintf(Stdlib[40], fmt);}

function ksprintf(k, param) {
  var fmt = param[1];
  function k__0(acc) {
    var buf = call1(Stdlib_buffer[1], 64);
    call2(CamlinternalFormat[11], buf, acc);
    return call1(k, call1(Stdlib_buffer[2], buf));
  }
  return call3(CamlinternalFormat[7], k__0, 0, fmt);
}

function sprintf(fmt) {return ksprintf(function(s) {return s;}, fmt);}

var Stdlib_printf = [
  0,
  fprintf,
  printf,
  eprintf,
  sprintf,
  bprintf,
  ifprintf,
  kfprintf,
  ikfprintf,
  ksprintf,
  kbprintf,
  ksprintf
];

module.exports = Stdlib_printf;

/*::type Exports = {
  fprintf: (oc: any, fmt: any) => any,
  printf: (fmt: any) => any,
  eprintf: (fmt: any) => any,
  sprintf: (fmt: any) => any,
  bprintf: (b: any, fmt: any) => any,
  ifprintf: (oc: any, fmt: any) => any,
  kfprintf: (k: any, o: any, param: any) => any,
  ikfprintf: (k: any, oc: any, param: any) => any,
  ksprintf: (k: any, param: any) => any,
  kbprintf: (k: any, b: any, param: any) => any,
}*/
/** @type {{
  fprintf: (oc: any, fmt: any) => any,
  printf: (fmt: any) => any,
  eprintf: (fmt: any) => any,
  sprintf: (fmt: any) => any,
  bprintf: (b: any, fmt: any) => any,
  ifprintf: (oc: any, fmt: any) => any,
  kfprintf: (k: any, o: any, param: any) => any,
  ikfprintf: (k: any, oc: any, param: any) => any,
  ksprintf: (k: any, param: any) => any,
  kbprintf: (k: any, b: any, param: any) => any,
}} */
module.exports = ((module.exports /*:: : any*/) /*:: :Exports */);
module.exports.fprintf = module.exports[1];
module.exports.printf = module.exports[2];
module.exports.eprintf = module.exports[3];
module.exports.sprintf = module.exports[4];
module.exports.bprintf = module.exports[5];
module.exports.ifprintf = module.exports[6];
module.exports.kfprintf = module.exports[7];
module.exports.ikfprintf = module.exports[8];
module.exports.ksprintf = module.exports[9];
module.exports.kbprintf = module.exports[10];

/* Hashing disabled */
