/**
 * @flow strict
 * Calls
 */

// @ts-check


"use strict";

var runtime = require("../runtime/runtime.js");
var string = runtime["caml_new_string"];

function call1(f, a0) {
  return f.length === 1 ? f(a0) : runtime["caml_call_gen"](f, [a0]);
}

var cst_me = string("me");
var cst_fix = string("fix");
var cst_bye = string("bye");
var cst_hi__0 = string("hi");
var cst_myPartiallyAppliedMethod = string("myPartiallyAppliedMethod");
var cst_myPartiallyAppliedMethod__0 = string("myPartiallyAppliedMethod");
var cst_myPartiallyAppliedMethod__1 = string("myPartiallyAppliedMethod");
var cst_one = string("one");
var cst_one_double = string("one-double");
var cst_two = string("two");
var cst_two__0 = string("two");
var cst_hi = string("hi");
var c_ = [0,100,0];
var a_ = [0,100,0];
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
  function J_(ah_, ag_) {return ah_(ag_);}
  function callResult1(af_) {return J_(s, af_);}
  var K_ = "passThis";
  function L_(ae_, ad_, ac_) {return ae_(ad_, ac_);}
  function callResult2(ab_) {return L_(s, K_, ab_);}
  var M_ = "passThis";
  function N_(aa_, Z_, Y_, X_) {return aa_(Z_, Y_, X_);}
  function callResult3(W_) {return N_(s, M_, bar, W_);}
  var O_ = "passThis";
  function P_(V_, U_, T_, S_, R_) {return V_(U_, T_, S_, R_);}
  function callResult4(Q_) {return P_(s, O_, baz, baz, Q_);}
  return [0,callResult1,callResult2,callResult3,callResult4];
}

function testPartialMethodCalls(o) {
  function r_(I_, H_, G_) {return runtime["caml_js_meth_call1"](I_, H_, G_);}
  function sendResult1(F_) {return r_(o, cst_myPartiallyAppliedMethod, F_);}
  function s_(E_, D_, C_, B_) {
    return runtime["caml_js_meth_call2"](E_, D_, C_, B_);
  }
  function sendResult2(A_) {
    return s_(o, cst_myPartiallyAppliedMethod__0, foo, A_);
  }
  function t_(z_, y_, x_, w_, v_) {
    return runtime["caml_js_meth_call3"](z_, y_, x_, w_, v_);
  }
  function sendResult3(u_) {
    return t_(o, cst_myPartiallyAppliedMethod__1, bar, foo, u_);
  }
  return [0,sendResult1,sendResult2,sendResult3];
}

var resultMake1Array = new Array(cst_one);
var resultMake1ArraySideEffect = new Array(runtime["side_effect"](0));

function wrapMake1Array(x) {return (new Array(x));}

function reexportCallMake1Array(q_) {return (new Array(q_));}

function partiallyCallMake1Array(p_) {return (new Array(p_));}

var overCallMake1Array = call1(new Array(0), 0);

function closeOverMake1Array(param) {
  var tmp = new Array(999);
  return [0,tmp,a_];
}

var r = [0,0];
var resultMake1ArrayDouble = new Array(cst_one_double, cst_one_double);
var b_ = runtime["side_effect"](0);
var resultMake1ArrayDoubleSideEffect = new Array(b_, b_);

function wrapMake1ArrayDouble(x) {return (new Array(x, x));}

function reexportCallMake1ArrayDouble(o_) {return (new Array(o_, o_));}

function partiallyCallMake1ArrayDouble(n_) {return (new Array(n_, n_));}

var overCallMake1ArrayDouble = call1(new Array(0, 0), 0);

function closeOverMake1ArrayDouble(param) {
  var tmp = new Array(999, 999);
  return [0,tmp,c_];
}

var d_ = runtime["side_effect"](0);
var resultMake2ArraySideEffect = new Array(d_, runtime["side_effect"](0));
var resultMake2Array = new Array(cst_two, cst_two__0);

function wrapMake2Array(x, y) {return (new Array(y, x));}

function reexportCallMake2Array(m_, l_) {return (new Array(l_, m_));}

function e_(k_, j_) {return (new Array(j_, k_));}

function partiallyCallMake2Array(i_) {return e_(cst_hi, i_);}

var overCallMake2Array = call1(new Array(0, 0), 0);

function closeOverMake2Array(param) {return (new Array(cst_bye, cst_hi__0));}

function make1Array(h_) {return (new Array(h_));}

function make2Array(g_, f_) {return (new Array(f_, g_));}

var ReexportedMacros = [0,make1Array,make2Array];

function callsAFunctionWithSuppression(param) {
  return (// FLOW_FIXME blah blah
console.log(cst_me, cst_fix));
}

var Calls = [
  0,
  foo,
  bar,
  baz,
  testFunctionCalls,
  testMethodCalls,
  testPartialFunctionCalls,
  testPartialMethodCalls,
  resultMake1Array,
  resultMake1ArraySideEffect,
  wrapMake1Array,
  reexportCallMake1Array,
  partiallyCallMake1Array,
  overCallMake1Array,
  closeOverMake1Array,
  r,
  resultMake1ArrayDouble,
  resultMake1ArrayDoubleSideEffect,
  wrapMake1ArrayDouble,
  reexportCallMake1ArrayDouble,
  partiallyCallMake1ArrayDouble,
  overCallMake1ArrayDouble,
  closeOverMake1ArrayDouble,
  resultMake2ArraySideEffect,
  resultMake2Array,
  wrapMake2Array,
  reexportCallMake2Array,
  partiallyCallMake2Array,
  overCallMake2Array,
  closeOverMake2Array,
  ReexportedMacros,
  callsAFunctionWithSuppression
];

module.exports = Calls;

/*::type Exports = {
  foo: any,
  bar: any,
  baz: any,
  testFunctionCalls: (o: any) => any,
  testMethodCalls: (o: any) => any,
  testPartialFunctionCalls: (s: any) => any,
  testPartialMethodCalls: (o: any) => any,
  resultMake1Array: any,
  resultMake1ArraySideEffect: any,
  wrapMake1Array: (x: any) => any,
  reexportCallMake1Array: (arg0: any) => any,
  partiallyCallMake1Array: (arg0: any) => any,
  overCallMake1Array: any,
  closeOverMake1Array: (param: any) => any,
  r: any,
  resultMake1ArrayDouble: any,
  resultMake1ArrayDoubleSideEffect: any,
  wrapMake1ArrayDouble: (x: any) => any,
  reexportCallMake1ArrayDouble: (arg0: any) => any,
  partiallyCallMake1ArrayDouble: (arg0: any) => any,
  overCallMake1ArrayDouble: any,
  closeOverMake1ArrayDouble: (param: any) => any,
  resultMake2ArraySideEffect: any,
  resultMake2Array: any,
  wrapMake2Array: (x: any, y: any) => any,
  reexportCallMake2Array: (arg0: any, arg1: any) => any,
  partiallyCallMake2Array: any,
  overCallMake2Array: any,
  closeOverMake2Array: (param: any) => any,
  ReexportedMacros: any,
  callsAFunctionWithSuppression: (param: any) => any,
}*/
/** @type {{
  foo: any,
  bar: any,
  baz: any,
  testFunctionCalls: (o: any) => any,
  testMethodCalls: (o: any) => any,
  testPartialFunctionCalls: (s: any) => any,
  testPartialMethodCalls: (o: any) => any,
  resultMake1Array: any,
  resultMake1ArraySideEffect: any,
  wrapMake1Array: (x: any) => any,
  reexportCallMake1Array: (arg0: any) => any,
  partiallyCallMake1Array: (arg0: any) => any,
  overCallMake1Array: any,
  closeOverMake1Array: (param: any) => any,
  r: any,
  resultMake1ArrayDouble: any,
  resultMake1ArrayDoubleSideEffect: any,
  wrapMake1ArrayDouble: (x: any) => any,
  reexportCallMake1ArrayDouble: (arg0: any) => any,
  partiallyCallMake1ArrayDouble: (arg0: any) => any,
  overCallMake1ArrayDouble: any,
  closeOverMake1ArrayDouble: (param: any) => any,
  resultMake2ArraySideEffect: any,
  resultMake2Array: any,
  wrapMake2Array: (x: any, y: any) => any,
  reexportCallMake2Array: (arg0: any, arg1: any) => any,
  partiallyCallMake2Array: any,
  overCallMake2Array: any,
  closeOverMake2Array: (param: any) => any,
  ReexportedMacros: any,
  callsAFunctionWithSuppression: (param: any) => any,
}} */
module.exports = ((module.exports /*:: : any*/) /*:: :Exports */);
module.exports.foo = module.exports[1];
module.exports.bar = module.exports[2];
module.exports.baz = module.exports[3];
module.exports.testFunctionCalls = module.exports[4];
module.exports.testMethodCalls = module.exports[5];
module.exports.testPartialFunctionCalls = module.exports[6];
module.exports.testPartialMethodCalls = module.exports[7];
module.exports.resultMake1Array = module.exports[8];
module.exports.resultMake1ArraySideEffect = module.exports[9];
module.exports.wrapMake1Array = module.exports[10];
module.exports.reexportCallMake1Array = module.exports[11];
module.exports.partiallyCallMake1Array = module.exports[12];
module.exports.overCallMake1Array = module.exports[13];
module.exports.closeOverMake1Array = module.exports[14];
module.exports.r = module.exports[15];
module.exports.resultMake1ArrayDouble = module.exports[16];
module.exports.resultMake1ArrayDoubleSideEffect = module.exports[17];
module.exports.wrapMake1ArrayDouble = module.exports[18];
module.exports.reexportCallMake1ArrayDouble = module.exports[19];
module.exports.partiallyCallMake1ArrayDouble = module.exports[20];
module.exports.overCallMake1ArrayDouble = module.exports[21];
module.exports.closeOverMake1ArrayDouble = module.exports[22];
module.exports.resultMake2ArraySideEffect = module.exports[23];
module.exports.resultMake2Array = module.exports[24];
module.exports.wrapMake2Array = module.exports[25];
module.exports.reexportCallMake2Array = module.exports[26];
module.exports.partiallyCallMake2Array = module.exports[27];
module.exports.overCallMake2Array = module.exports[28];
module.exports.closeOverMake2Array = module.exports[29];
module.exports.ReexportedMacros = module.exports[30];
module.exports.callsAFunctionWithSuppression = module.exports[31];

/* Hashing disabled */
