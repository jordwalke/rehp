/**
 * @flow strict
 * Stdlib__queue
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

var caml_wrap_thrown_exception = runtime["caml_wrap_thrown_exception"];
var cst_Stdlib_Queue_Empty = runtime["caml_new_string"]("Stdlib.Queue.Empty");
var Stdlib_seq = require("./Stdlib__seq.js");
var Empty = [248,cst_Stdlib_Queue_Empty,runtime["caml_fresh_oo_id"](0)];

function create(param) {return [0,0,0,0];}

function clear(q) {q[1] = 0;q[2] = 0;q[3] = 0;return 0;}

function add(x, q) {
  var cell = [0,x,0];
  var o_ = q[3];
  if (o_) {q[1] = q[1] + 1 | 0;o_[2] = cell;q[3] = cell;return 0;}
  q[1] = 1;
  q[2] = cell;
  q[3] = cell;
  return 0;
}

function peek(q) {
  var content;
  var n_ = q[2];
  if (n_) {content = n_[1];return content;}
  throw caml_wrap_thrown_exception(Empty);
}

function peek_opt(q) {
  var content;
  var m_ = q[2];
  if (m_) {content = m_[1];return [0,content];}
  return 0;
}

function take(q) {
  var k_;
  var l_;
  var j_ = q[2];
  if (j_) {
    k_ = j_[1];
    l_ = j_[2];
    if (l_) {q[1] = q[1] + -1 | 0;q[2] = l_;return k_;}
    clear(q);
    return k_;
  }
  throw caml_wrap_thrown_exception(Empty);
}

function take_opt(q) {
  var h_;
  var i_;
  var g_ = q[2];
  if (g_) {
    h_ = g_[1];
    i_ = g_[2];
    if (i_) {q[1] = q[1] + -1 | 0;q[2] = i_;return [0,h_];}
    clear(q);
    return [0,h_];
  }
  return 0;
}

function copy(q_res, prev, cell) {
  var content;
  var next;
  var res;
  var prev__0 = prev;
  var cell__0 = cell;
  for (; ; ) {
    if (cell__0) {
      content = cell__0[1];
      next = cell__0[2];
      res = [0,content,0];
      if (prev__0) prev__0[2] = res;
      else q_res[2] = res;
      prev__0 = res;
      cell__0 = next;
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
  var content;
  var cell__1;
  var cell__0 = cell;
  for (; ; ) {
    if (cell__0) {
      content = cell__0[1];
      cell__1 = cell__0[2];
      call1(f, content);
      cell__0 = cell__1;
      continue;
    }
    return 0;
  }
}

function iter__0(f, q) {return iter(f, q[2]);}

function fold(f, accu, cell) {
  var content;
  var cell__1;
  var accu__1;
  var accu__0 = accu;
  var cell__0 = cell;
  for (; ; ) {
    if (cell__0) {
      content = cell__0[1];
      cell__1 = cell__0[2];
      accu__1 = call2(f, accu__0, content);
      accu__0 = accu__1;
      cell__0 = cell__1;
      continue;
    }
    return accu__0;
  }
}

function fold__0(f, accu, q) {return fold(f, accu, q[2]);}

function transfer(q1, q2) {
  var f_;
  var e_ = 0 < q1[1] ? 1 : 0;
  if (e_) {
    f_ = q2[3];
    if (f_) {
      q2[1] = q2[1] + q1[1] | 0;
      f_[2] = q1[2];
      q2[3] = q1[3];
      return clear(q1);
    }
    q2[1] = q1[1];
    q2[2] = q1[2];
    q2[3] = q1[3];
    return clear(q1);
  }
  return e_;
}

function to_seq(q) {
  function aux(c, param) {
    var next;
    var x;
    if (c) {
      x = c[1];
      next = c[2];
      return [0,x,function(d_) {return aux(next, d_);}];
    }
    return 0;
  }
  var b_ = q[2];
  return function(c_) {return aux(b_, c_);};
}

function add_seq(q, i) {
  function a_(x) {return add(x, q);}
  return call2(Stdlib_seq[8], a_, i);
}

function of_seq(g) {var q = create(0);add_seq(q, g);return q;}

var Stdlib_queue = [
  0,
  Empty,
  create,
  add,
  add,
  take,
  take_opt,
  take,
  peek,
  peek_opt,
  peek,
  clear,
  copy__0,
  is_empty,
  length,
  iter__0,
  fold__0,
  transfer,
  to_seq,
  add_seq,
  of_seq
];

module.exports = Stdlib_queue;

/*::type Exports = {
  Empty: any,
  create: (param: any) => any,
  add: (x: any, q: any) => any,
  take: (q: any) => any,
  take_opt: (q: any) => any,
  peek: (q: any) => any,
  peek_opt: (q: any) => any,
  clear: (q: any) => any,
  copy: (q: any) => any,
  is_empty: (q: any) => any,
  _length_: (q: any) => any,
  iter: (f: any, q: any) => any,
  fold: (f: any, accu: any, q: any) => any,
  transfer: (q1: any, q2: any) => any,
  to_seq: (q: any) => any,
  add_seq: (q: any, i: any) => any,
  of_seq: (g: any) => any,
}*/
/** @type {{
  Empty: any,
  create: (param: any) => any,
  add: (x: any, q: any) => any,
  take: (q: any) => any,
  take_opt: (q: any) => any,
  peek: (q: any) => any,
  peek_opt: (q: any) => any,
  clear: (q: any) => any,
  copy: (q: any) => any,
  is_empty: (q: any) => any,
  _length_: (q: any) => any,
  iter: (f: any, q: any) => any,
  fold: (f: any, accu: any, q: any) => any,
  transfer: (q1: any, q2: any) => any,
  to_seq: (q: any) => any,
  add_seq: (q: any, i: any) => any,
  of_seq: (g: any) => any,
}} */
module.exports = ((module.exports /*:: : any*/) /*:: :Exports */);
module.exports.Empty = module.exports[1];
module.exports.create = module.exports[2];
module.exports.add = module.exports[3];
module.exports.take = module.exports[5];
module.exports.take_opt = module.exports[6];
module.exports.peek = module.exports[8];
module.exports.peek_opt = module.exports[9];
module.exports.clear = module.exports[11];
module.exports.copy = module.exports[12];
module.exports.is_empty = module.exports[13];
module.exports._length_ = module.exports[14];
module.exports.iter = module.exports[15];
module.exports.fold = module.exports[16];
module.exports.transfer = module.exports[17];
module.exports.to_seq = module.exports[18];
module.exports.add_seq = module.exports[19];
module.exports.of_seq = module.exports[20];

/* Hashing disabled */
