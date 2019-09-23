/**
 * Printf
 * @providesModule Printf
 */
"use strict";
var Buffer = require('Buffer.js');
var CamlinternalFormat = require('CamlinternalFormat.js');
var Pervasives = require('Pervasives.js');
var runtime = require('runtime.js');

let joo_global_object = global;


var runtime = joo_global_object.jsoo_runtime;

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

var global_data = runtime["caml_get_global_data"]();
var Buffer = global_data["Buffer"];
var CamlinternalFormat = global_data["CamlinternalFormat"];
var Pervasives = global_data["Pervasives"];

function kfprintf(k, o, param) {
  var fmt = param[1];
  var f = 0;
  function g(o, acc) {
    call2(CamlinternalFormat[9], o, acc);
    return call1(k, o);
  }
  return call4(CamlinternalFormat[7], g, o, f, fmt);
}

function kbprintf(k, b, param) {
  var fmt = param[1];
  var d = 0;
  function e(b, acc) {
    call2(CamlinternalFormat[10], b, acc);
    return call1(k, b);
  }
  return call4(CamlinternalFormat[7], e, b, d, fmt);
}

function ikfprintf(k, oc, param) {
  var fmt = param[1];
  return call3(CamlinternalFormat[8], k, oc, fmt);
}

function fprintf(oc, fmt) {return kfprintf(function(c) {return 0;}, oc, fmt);}

function bprintf(b, fmt) {return kbprintf(function(b) {return 0;}, b, fmt);}

function ifprintf(oc, fmt) {
  return ikfprintf(function(a) {return 0;}, oc, fmt);
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

runtime["caml_register_global"](3, Printf, "Printf");


module.exports = global.jsoo_runtime.caml_get_global_data().Printf;
/*____hashes compiler:hashing-disabled inputs:hashing-disabled bytecode:hashing-disabled*/
