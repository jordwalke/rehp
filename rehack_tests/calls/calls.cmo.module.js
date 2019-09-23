/**
 * Calls
 * @providesModule Calls
 */
"use strict";

var runtime = require('runtime.js');

let joo_global_object = global;


var runtime = joo_global_object.jsoo_runtime;
var string = runtime["caml_new_string"];
var cst_myPartiallyAppliedMethod = string("myPartiallyAppliedMethod");
var cst_myPartiallyAppliedMethod__0 = string("myPartiallyAppliedMethod");
var cst_myPartiallyAppliedMethod__1 = string("myPartiallyAppliedMethod");
var foo = "foo";
var bar = "bar";
var baz = "baz";

function testFunctionCalls(o) {
  var withArgsResult = o(foo);
  var callResult = o();
  var callResult1 = o("passThis");
  var callResult2 = o("passThis", foo);
  var callResult3 = o("passThis", bar, bar);
  var callResult4 = o("passThis", baz, baz, baz);
  return [
    0,
    withArgsResult,
    callResult,
    callResult1,
    callResult2,
    callResult3,
    callResult4
  ];
}

function testMethodCalls(o) {
  var withArgsResult = o.yourMethod(foo);
  var sendResult = o.myMethod();
  var sendResult1 = o.myMethod(foo);
  var sendResult2 = o.myMethod(foo, foo);
  var sendResult3 = o.myMethod(bar, foo, foo);
  return [0,withArgsResult,sendResult,sendResult1,sendResult2,sendResult3];
}

function testPartialFunctionCalls(o) {
  function s(Q, P) {return Q(P);}
  function callResult1(O) {return s(o, O);}
  var t = "passThis";
  function u(N, M, L) {return N(M, L);}
  function callResult2(K) {return u(o, t, K);}
  var v = "passThis";
  function w(J, I, H, G) {return J(I, H, G);}
  function callResult3(F) {return w(o, v, bar, F);}
  var x = "passThis";
  function y(E, D, C, B, A) {return E(D, C, B, A);}
  function callResult4(z) {return y(o, x, baz, baz, z);}
  return [0,callResult1,callResult2,callResult3,callResult4];
}

function testPartialMethodCalls(o) {
  function a(r, q, p) {return runtime["caml_js_meth_call1"](r, q, p);}
  function sendResult1(o) {return a(o, cst_myPartiallyAppliedMethod, o);}
  function b(n, m, l, k) {return runtime["caml_js_meth_call2"](n, m, l, k);}
  function sendResult2(j) {
    return b(o, cst_myPartiallyAppliedMethod__0, foo, j);
  }
  function c(i, h, g, f, e) {
    return runtime["caml_js_meth_call3"](i, h, g, f, e);
  }
  function sendResult3(d) {
    return c(o, cst_myPartiallyAppliedMethod__1, bar, foo, d);
  }
  return [0,sendResult1,sendResult2,sendResult3];
}

var Calls = [
  0,
  foo,
  bar,
  baz,
  testFunctionCalls,
  testMethodCalls,
  testPartialFunctionCalls,
  testPartialMethodCalls
];

runtime["caml_register_global"](18, Calls, "Calls");


module.exports = global.jsoo_runtime.caml_get_global_data().Calls;
/*____hashes compiler:hashing-disabled inputs:hashing-disabled bytecode:hashing-disabled*/
