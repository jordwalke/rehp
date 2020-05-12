/**
 * @flow strict
 * Calls
 */

// @ts-check


"use strict";

var runtime = require("../runtime/runtime.js");
var string = runtime["caml_new_string"];
var caml_update_dummy = runtime["caml_update_dummy"];

function call1(f, a0) {
  return f.length === 1 ? f(a0) : runtime["caml_call_gen"](f, [a0]);
}

function call2(f, a0, a1) {
  return f.length === 2 ? f(a0, a1) : runtime["caml_call_gen"](f, [a0,a1]);
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
var cst_Second_Part_Of_Tuple = string("Second Part Of Tuple:");
var Stdlib = require("../stdlib.cma.js/Stdlib.js");
var Calls_Macros = require("Calls__Macros.js");
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
  function M_(ak_, aj_) {return ak_(aj_);}
  function callResult1(ai_) {return M_(s, ai_);}
  var N_ = "passThis";
  function O_(ah_, ag_, af_) {return ah_(ag_, af_);}
  function callResult2(ae_) {return O_(s, N_, ae_);}
  var P_ = "passThis";
  function Q_(ad_, ac_, ab_, aa_) {return ad_(ac_, ab_, aa_);}
  function callResult3(Z_) {return Q_(s, P_, bar, Z_);}
  var R_ = "passThis";
  function S_(Y_, X_, W_, V_, U_) {return Y_(X_, W_, V_, U_);}
  function callResult4(T_) {return S_(s, R_, baz, baz, T_);}
  return [0,callResult1,callResult2,callResult3,callResult4];
}

function testPartialMethodCalls(o) {
  function u_(L_, K_, J_) {return runtime["caml_js_meth_call1"](L_, K_, J_);}
  function sendResult1(I_) {return u_(o, cst_myPartiallyAppliedMethod, I_);}
  function v_(H_, G_, F_, E_) {
    return runtime["caml_js_meth_call2"](H_, G_, F_, E_);
  }
  function sendResult2(D_) {
    return v_(o, cst_myPartiallyAppliedMethod__0, foo, D_);
  }
  function w_(C_, B_, A_, z_, y_) {
    return runtime["caml_js_meth_call3"](C_, B_, A_, z_, y_);
  }
  function sendResult3(x_) {
    return w_(o, cst_myPartiallyAppliedMethod__1, bar, foo, x_);
  }
  return [0,sendResult1,sendResult2,sendResult3];
}

var resultMake1Array = new Array(cst_one);
var resultMake1ArraySideEffect = new Array(runtime["side_effect"](0));

function wrapMake1Array(x) {return (new Array(x));}

function reexportCallMake1Array(t_) {return (new Array(t_));}

function partiallyCallMake1Array(s_) {return (new Array(s_));}

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

function reexportCallMake1ArrayDouble(r_) {return (new Array(r_, r_));}

function partiallyCallMake1ArrayDouble(q_) {return (new Array(q_, q_));}

var overCallMake1ArrayDouble = call1(new Array(0, 0), 0);

function closeOverMake1ArrayDouble(param) {
  var tmp = new Array(999, 999);
  return [0,tmp,c_];
}

var d_ = runtime["side_effect"](0);
var resultMake2ArraySideEffect = new Array(runtime["side_effect"](0), d_);
var resultMake2Array = new Array(cst_two__0, cst_two);

function wrapMake2Array(x, y) {return (new Array(x, y));}

function reexportCallMake2Array(p_, o_) {return (new Array(p_, o_));}

function e_(n_, m_) {return (new Array(n_, m_));}

function partiallyCallMake2Array(l_) {return e_(cst_hi, l_);}

var overCallMake2Array = call1(new Array(0, 0), 0);

function closeOverMake2Array(param) {return (new Array(cst_hi__0, cst_bye));}

function make1Array(k_) {return (new Array(k_));}

function make2Array(j_, i_) {return (new Array(j_, i_));}

var ReexportedMacros = [0,make1Array,make2Array];

function callsAFunctionWithSuppression(param) {
  return (// FLOW_FIXME blah blah
console.log(cst_fix, cst_me));
}

var f = runtime["caml_alloc_dummy_function"](1, 2);
var z = [0];

caml_update_dummy(f, function(x, y) {return 1;});

caml_update_dummy(z, [0,[0,f,cst_Second_Part_Of_Tuple]]);

if (z) {
  var match = z[1];
  var str = match[2];
  var f__0 = match[1];
  var f_ = call2(f__0, 0, 0);
  var g_ = call1(Stdlib[33], f_);
  var h_ = call2(Stdlib[28], str, g_);
  call1(Stdlib[42], h_);
}

call1(Calls_Macros[8], 0);

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
  callsAFunctionWithSuppression,
  f,
  z
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
  partiallyCallMake2Array: (arg0: any) => any,
  overCallMake2Array: any,
  closeOverMake2Array: (param: any) => any,
  ReexportedMacros: any,
  callsAFunctionWithSuppression: (param: any) => any,
  f: any,
  z: any,
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
  partiallyCallMake2Array: (arg0: any) => any,
  overCallMake2Array: any,
  closeOverMake2Array: (param: any) => any,
  ReexportedMacros: any,
  callsAFunctionWithSuppression: (param: any) => any,
  f: any,
  z: any,
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
module.exports.f = module.exports[32];
module.exports.z = module.exports[33];

/* Hashing disabled */
