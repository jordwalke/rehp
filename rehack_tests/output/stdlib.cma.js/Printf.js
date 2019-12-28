/**
 * @flow strict
 * Printf
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

function call4(f, a0, a1, a2, a3) {
  return f.length === 4 ?
    f(a0, a1, a2, a3) :
    runtime["caml_call_gen"](f, [a0,a1,a2,a3]);
}

var Buffer = require("./Buffer.js");
var CamlinternalFormat = require("./CamlinternalFormat.js");
var Pervasives = require("./Pervasives.js");

function kfprintf(k, o, param) {
  var fmt = param[1];
  var f_ = 0;
  function g_(o, acc) {
    call2(CamlinternalFormat[9], o, acc);
    return call1(k, o);
  }
  return call4(CamlinternalFormat[7], g_, o, f_, fmt);
}

function kbprintf(k, b, param) {
  var fmt = param[1];
  var d_ = 0;
  function e_(b, acc) {
    call2(CamlinternalFormat[10], b, acc);
    return call1(k, b);
  }
  return call4(CamlinternalFormat[7], e_, b, d_, fmt);
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

function printf(fmt) {return fprintf(Pervasives[27], fmt);}

function eprintf(fmt) {return fprintf(Pervasives[28], fmt);}

function ksprintf(k, param) {
  var fmt = param[1];
  function k__0(param, acc) {
    var buf = call1(Buffer[1], 64);
    call2(CamlinternalFormat[11], buf, acc);
    return call1(k, call1(Buffer[2], buf));
  }
  return call4(CamlinternalFormat[7], k__0, 0, 0, fmt);
}

function sprintf(fmt) {return ksprintf(function(s) {return s;}, fmt);}

var Printf = [
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

exports = Printf;

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
module.exports = ((exports /*:: : any*/) /*:: :Exports */);
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
