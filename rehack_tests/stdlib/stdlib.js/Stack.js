/**
 * @flow strict
 * Stack
 */

// @ts-check


"use strict";
let joo_global_object = typeof global !== 'undefined' ? global : window;
require('runtime.js');

var runtime = joo_global_object.jsoo_runtime;
var caml_wrap_thrown_exception = runtime["caml_wrap_thrown_exception"];

function call2(f, a0, a1) {
  return f.length === 2 ? f(a0, a1) : runtime["caml_call_gen"](f, [a0,a1]);
}

function call3(f, a0, a1, a2) {
  return f.length === 3 ?
    f(a0, a1, a2) :
    runtime["caml_call_gen"](f, [a0,a1,a2]);
}

var cst_Stack_Empty = runtime["caml_new_string"]("Stack.Empty");
var List = require("List_.js");
var Empty = [248,cst_Stack_Empty,runtime["caml_fresh_oo_id"](0)];

function create(param) {return [0,0,0];}

function clear(s) {s[1] = 0;s[2] = 0;return 0;}

function copy(s) {return [0,s[1],s[2]];}

function push(x, s) {s[1] = [0,x,s[1]];s[2] = s[2] + 1 | 0;return 0;}

function pop(s) {
  var b_ = s[1];
  if (b_) {
    var tl = b_[2];
    var hd = b_[1];
    s[1] = tl;
    s[2] = s[2] + -1 | 0;
    return hd;
  }
  throw caml_wrap_thrown_exception(Empty);
}

function top(s) {
  var a_ = s[1];
  if (a_) {var hd = a_[1];return hd;}
  throw caml_wrap_thrown_exception(Empty);
}

function is_empty(s) {return 0 === s[1] ? 1 : 0;}

function length(s) {return s[2];}

function iter(f, s) {return call2(List[15], f, s[1]);}

function fold(f, acc, s) {return call3(List[20], f, acc, s[1]);}

var Stack = [0,Empty,create,push,pop,top,clear,copy,is_empty,length,iter,fold];

exports = Stack;

/*::type Exports = {
  fold: (f: any, acc: any, s: any) => any,
  iter: (f: any, s: any) => any,
  length: (s: any) => any,
  is_empty: (s: any) => any,
  copy: (s: any) => any,
  clear: (s: any) => any,
  top: (s: any) => any,
  pop: (s: any) => any,
  push: (x: any, s: any) => any,
  create: (param: any) => any,
  Empty: any
}*/
/** @type {{
  fold: (any, any, any) => any,
  iter: (any, any) => any,
  length: (any) => any,
  is_empty: (any) => any,
  copy: (any) => any,
  clear: (any) => any,
  top: (any) => any,
  pop: (any) => any,
  push: (any, any) => any,
  create: (any) => any,
  Empty: any,
}} */
module.exports = ((exports /*:: : any*/) /*:: :Exports */);
module.exports.fold = module.exports[11];
module.exports.iter = module.exports[10];
module.exports.length = module.exports[9];
module.exports.is_empty = module.exports[8];
module.exports.copy = module.exports[7];
module.exports.clear = module.exports[6];
module.exports.top = module.exports[5];
module.exports.pop = module.exports[4];
module.exports.push = module.exports[3];
module.exports.create = module.exports[2];
module.exports.Empty = module.exports[1];

/* Hashing disabled */
