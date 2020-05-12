/**
 * @flow strict
 * Stdlib__stack
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

function call3(f, a0, a1, a2) {
  return f.length === 3 ?
    f(a0, a1, a2) :
    runtime["caml_call_gen"](f, [a0,a1,a2]);
}

var caml_wrap_thrown_exception = runtime["caml_wrap_thrown_exception"];
var cst_Stdlib_Stack_Empty = runtime["caml_new_string"]("Stdlib.Stack.Empty");
var Stdlib_seq = require("./Stdlib__seq.js");
var Stdlib_list = require("./Stdlib__list.js");
var Empty = [248,cst_Stdlib_Stack_Empty,runtime["caml_fresh_oo_id"](0)];

function create(param) {return [0,0,0];}

function clear(s) {s[1] = 0;s[2] = 0;return 0;}

function copy(s) {return [0,s[1],s[2]];}

function push(x, s) {s[1] = [0,x,s[1]];s[2] = s[2] + 1 | 0;return 0;}

function pop(s) {
  var tl;
  var hd;
  var e_ = s[1];
  if (e_) {tl = e_[2];hd = e_[1];s[1] = tl;s[2] = s[2] + -1 | 0;return hd;}
  throw caml_wrap_thrown_exception(Empty);
}

function pop_opt(s) {
  var tl;
  var hd;
  var d_ = s[1];
  if (d_) {
    tl = d_[2];
    hd = d_[1];
    s[1] = tl;
    s[2] = s[2] + -1 | 0;
    return [0,hd];
  }
  return 0;
}

function top(s) {
  var hd;
  var c_ = s[1];
  if (c_) {hd = c_[1];return hd;}
  throw caml_wrap_thrown_exception(Empty);
}

function top_opt(s) {
  var hd;
  var b_ = s[1];
  if (b_) {hd = b_[1];return [0,hd];}
  return 0;
}

function is_empty(s) {return 0 === s[1] ? 1 : 0;}

function length(s) {return s[2];}

function iter(f, s) {return call2(Stdlib_list[15], f, s[1]);}

function fold(f, acc, s) {return call3(Stdlib_list[21], f, acc, s[1]);}

function to_seq(s) {return call1(Stdlib_list[54], s[1]);}

function add_seq(q, i) {
  function a_(x) {return push(x, q);}
  return call2(Stdlib_seq[8], a_, i);
}

function of_seq(g) {var s = create(0);add_seq(s, g);return s;}

var Stdlib_stack = [
  0,
  Empty,
  create,
  push,
  pop,
  pop_opt,
  top,
  top_opt,
  clear,
  copy,
  is_empty,
  length,
  iter,
  fold,
  to_seq,
  add_seq,
  of_seq
];

module.exports = Stdlib_stack;

/*::type Exports = {
  Empty: any,
  create: (param: any) => any,
  push: (x: any, s: any) => any,
  pop: (s: any) => any,
  pop_opt: (s: any) => any,
  top: (s: any) => any,
  top_opt: (s: any) => any,
  clear: (s: any) => any,
  copy: (s: any) => any,
  is_empty: (s: any) => any,
  _length_: (s: any) => any,
  iter: (f: any, s: any) => any,
  fold: (f: any, acc: any, s: any) => any,
  to_seq: (s: any) => any,
  add_seq: (q: any, i: any) => any,
  of_seq: (g: any) => any,
}*/
/** @type {{
  Empty: any,
  create: (param: any) => any,
  push: (x: any, s: any) => any,
  pop: (s: any) => any,
  pop_opt: (s: any) => any,
  top: (s: any) => any,
  top_opt: (s: any) => any,
  clear: (s: any) => any,
  copy: (s: any) => any,
  is_empty: (s: any) => any,
  _length_: (s: any) => any,
  iter: (f: any, s: any) => any,
  fold: (f: any, acc: any, s: any) => any,
  to_seq: (s: any) => any,
  add_seq: (q: any, i: any) => any,
  of_seq: (g: any) => any,
}} */
module.exports = ((module.exports /*:: : any*/) /*:: :Exports */);
module.exports.Empty = module.exports[1];
module.exports.create = module.exports[2];
module.exports.push = module.exports[3];
module.exports.pop = module.exports[4];
module.exports.pop_opt = module.exports[5];
module.exports.top = module.exports[6];
module.exports.top_opt = module.exports[7];
module.exports.clear = module.exports[8];
module.exports.copy = module.exports[9];
module.exports.is_empty = module.exports[10];
module.exports._length_ = module.exports[11];
module.exports.iter = module.exports[12];
module.exports.fold = module.exports[13];
module.exports.to_seq = module.exports[14];
module.exports.add_seq = module.exports[15];
module.exports.of_seq = module.exports[16];

/* Hashing disabled */
