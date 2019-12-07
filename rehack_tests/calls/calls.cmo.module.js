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

function testPartialFunctionCalls(s) {
  function s_(Q_, P_) {return Q_(P_);}
  function callResult1(O_) {return s_(s, O_);}
  var t_ = "passThis";
  function u_(N_, M_, L_) {return N_(M_, L_);}
  function callResult2(K_) {return u_(s, t_, K_);}
  var v_ = "passThis";
  function w_(J_, I_, H_, G_) {return J_(I_, H_, G_);}
  function callResult3(F_) {return w_(s, v_, bar, F_);}
  var x_ = "passThis";
  function y_(E_, D_, C_, B_, A_) {return E_(D_, C_, B_, A_);}
  function callResult4(z_) {return y_(s, x_, baz, baz, z_);}
  return [0,callResult1,callResult2,callResult3,callResult4];
}

function testPartialMethodCalls(o) {
  function a_(r_, q_, p_) {return runtime["caml_js_meth_call1"](r_, q_, p_);}
  function sendResult1(o_) {return a_(o, cst_myPartiallyAppliedMethod, o_);}
  function b_(n_, m_, l_, k_) {
    return runtime["caml_js_meth_call2"](n_, m_, l_, k_);
  }
  function sendResult2(j_) {
    return b_(o, cst_myPartiallyAppliedMethod__0, foo, j_);
  }
  function c_(i_, h_, g_, f_, e_) {
    return runtime["caml_js_meth_call3"](i_, h_, g_, f_, e_);
  }
  function sendResult3(d_) {
    return c_(o, cst_myPartiallyAppliedMethod__1, bar, foo, d_);
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
