/**
 * Nativeint
 * @providesModule Nativeint
 */
"use strict";
var Sys = require('Sys.js');
var Failure = require('Failure.js');
var runtime = require('runtime.js');

let joo_global_object = global;


var runtime = joo_global_object.jsoo_runtime;
var caml_wrap_exception = runtime["caml_wrap_exception"];
var global_data = runtime["caml_get_global_data"]();
var cst_d = runtime["caml_new_string"]("%d");
var Failure = global_data["Failure"];
var Sys = global_data["Sys"];
var zero = 0;
var one = 1;
var minus_one = -1;

function succ(n) {return n + 1 | 0;}

function pred(n) {return n - 1 | 0;}

function abs(n) {return runtime["caml_greaterequal"](n, 0) ? n : - n | 0;}

var size = Sys[10];
var min_int = 1 << (size + -1 | 0);
var max_int = min_int - 1 | 0;

function lognot(n) {return n ^ -1;}

function to_string(n) {return runtime["caml_format_int"](cst_d, n);}

function of_string_opt(s) {
  try {var a = [0,runtime["caml_int_of_string"](s)];return a;}
  catch(b) {
    b = caml_wrap_exception(b);
    if (b[1] === Failure) {return 0;}
    throw runtime["caml_wrap_thrown_exception_reraise"](b);
  }
}

function compare(x, y) {return runtime["caml_int_compare"](x, y);}

function equal(x, y) {return 0 === compare(x, y) ? 1 : 0;}

var Nativeint = [
  0,
  zero,
  one,
  minus_one,
  succ,
  pred,
  abs,
  size,
  max_int,
  min_int,
  lognot,
  of_string_opt,
  to_string,
  compare,
  equal
];

runtime["caml_register_global"](12, Nativeint, "Nativeint");


module.exports = global.jsoo_runtime.caml_get_global_data().Nativeint;
/*____hashes compiler:hashing-disabled inputs:hashing-disabled bytecode:hashing-disabled*/
