/**
 * @flow strict
 * Queue
 */

// @ts-check


"use strict";
let joo_global_object = typeof global !== 'undefined' ? global : window;
require('runtime.js');

var runtime = joo_global_object.jsoo_runtime;
var caml_wrap_thrown_exception = runtime["caml_wrap_thrown_exception"];

function call1(f, a0) {
  return f.length === 1 ? f(a0) : runtime["caml_call_gen"](f, [a0]);
}

function call2(f, a0, a1) {
  return f.length === 2 ? f(a0, a1) : runtime["caml_call_gen"](f, [a0,a1]);
}

var cst_Queue_Empty = runtime["caml_new_string"]("Queue.Empty");
var Empty = [248,cst_Queue_Empty,runtime["caml_fresh_oo_id"](0)];

function create(param) {return [0,0,0,0];}

function clear(q) {q[1] = 0;q[2] = 0;q[3] = 0;return 0;}

function add(x, q) {
  var cell = [0,x,0];
  var g_ = q[3];
  if (g_) {q[1] = q[1] + 1 | 0;g_[2] = cell;q[3] = cell;return 0;}
  q[1] = 1;
  q[2] = cell;
  q[3] = cell;
  return 0;
}

function peek(q) {
  var f_ = q[2];
  if (f_) {var content = f_[1];return content;}
  throw caml_wrap_thrown_exception(Empty);
}

function take(q) {
  var c_ = q[2];
  if (c_) {
    var d_ = c_[1];
    var e_ = c_[2];
    if (e_) {q[1] = q[1] + -1 | 0;q[2] = e_;return d_;}
    clear(q);
    return d_;
  }
  throw caml_wrap_thrown_exception(Empty);
}

function copy(q_res, prev, cell) {
  var prev__0 = prev;
  var cell__0 = cell;
  for (; ; ) {
    if (cell__0) {
      var content = cell__0[1];
      var next = cell__0[2];
      var res = [0,content,0];
      if (prev__0) prev__0[2] = res;
      else q_res[2] = res;
      var prev__0 = res;
      var cell__0 = next;
      continue;
    }
    q_res[3] = prev__0;
    return q_res;
  }
}

function copy__0(q) {return copy([0,q[1],0,0], 0, q[2]);}

function is_empty(q) {return 0 === q[1] ? 1 : 0;}

function length(q) {return q[1];}

function iter(f, cell) {
  var cell__0 = cell;
  for (; ; ) {
    if (cell__0) {
      var content = cell__0[1];
      var cell__1 = cell__0[2];
      call1(f, content);
      var cell__0 = cell__1;
      continue;
    }
    return 0;
  }
}

function iter__0(f, q) {return iter(f, q[2]);}

function fold(f, accu, cell) {
  var accu__0 = accu;
  var cell__0 = cell;
  for (; ; ) {
    if (cell__0) {
      var content = cell__0[1];
      var cell__1 = cell__0[2];
      var accu__1 = call2(f, accu__0, content);
      var accu__0 = accu__1;
      var cell__0 = cell__1;
      continue;
    }
    return accu__0;
  }
}

function fold__0(f, accu, q) {return fold(f, accu, q[2]);}

function transfer(q1, q2) {
  var a_ = 0 < q1[1] ? 1 : 0;
  if (a_) {
    var b_ = q2[3];
    if (b_) {
      q2[1] = q2[1] + q1[1] | 0;
      b_[2] = q1[2];
      q2[3] = q1[3];
      return clear(q1);
    }
    q2[1] = q1[1];
    q2[2] = q1[2];
    q2[3] = q1[3];
    return clear(q1);
  }
  return a_;
}

var Queue = [
  0,
  Empty,
  create,
  add,
  add,
  take,
  take,
  peek,
  peek,
  clear,
  copy__0,
  is_empty,
  length,
  iter__0,
  fold__0,
  transfer
];

exports = Queue;

/*::type Exports = {
  Empty: any
  create: (param: any) => any,
  add: (x: any, q: any) => any,
  add: (x: any, q: any) => any,
  take: (q: any) => any,
  take: (q: any) => any,
  peek: (q: any) => any,
  peek: (q: any) => any,
  clear: (q: any) => any,
  copy: (q: any) => any,
  is_empty: (q: any) => any,
  length: (q: any) => any,
  iter: (f: any, q: any) => any,
  fold: (f: any, accu: any, q: any) => any,
  transfer: (q1: any, q2: any) => any,
}*/
/** @type {{
  Empty: any,
  create: (any) => any,
  add: (any, any) => any,
  add: (any, any) => any,
  take: (any) => any,
  take: (any) => any,
  peek: (any) => any,
  peek: (any) => any,
  clear: (any) => any,
  copy: (any) => any,
  is_empty: (any) => any,
  length: (any) => any,
  iter: (any, any) => any,
  fold: (any, any, any) => any,
  transfer: (any, any) => any,
}} */
module.exports = ((exports /*:: : any*/) /*:: :Exports */);
module.exports.Empty = module.exports[1];
module.exports.create = module.exports[2];
module.exports.add = module.exports[3];
module.exports.add = module.exports[4];
module.exports.take = module.exports[5];
module.exports.take = module.exports[6];
module.exports.peek = module.exports[7];
module.exports.peek = module.exports[8];
module.exports.clear = module.exports[9];
module.exports.copy = module.exports[10];
module.exports.is_empty = module.exports[11];
module.exports.length = module.exports[12];
module.exports.iter = module.exports[13];
module.exports.fold = module.exports[14];
module.exports.transfer = module.exports[15];

/* Hashing disabled */
