/**
 * Queue
 * @providesModule Queue
 */
"use strict";

var runtime = require('runtime.js');

let joo_global_object = global;


var runtime = joo_global_object.jsoo_runtime;

function caml_call1(f, a0) {
  return f.length == 1 ? f(a0) : runtime["caml_call_gen"](f, [a0]);
}

function caml_call2(f, a0, a1) {
  return f.length == 2 ? f(a0, a1) : runtime["caml_call_gen"](f, [a0,a1]);
}

var cst_Queue_Empty = runtime["caml_new_string"]("Queue.Empty");
var Empty = [248,cst_Queue_Empty,runtime["caml_fresh_oo_id"](0)];

function create(param) {return [0,0,0,0];}

function clear(q) {q[1] = 0;q[2] = 0;q[3] = 0;return 0;}

function add(x, q) {
  var cell = [0,x,0];
  var g0 = q[3];
  return g0 ?
    (q[1] = q[1] + 1 | 0,g0[2] = cell,q[3] = cell,0) :
    (q[1] = 1,q[2] = cell,q[3] = cell,0);
}

function peek(q) {
  var gZ = q[2];
  if (gZ) {var content = gZ[1];return content;}
  throw runtime["caml_wrap_thrown_exception"](Empty);
}

function take(q) {
  var gW = q[2];
  if (gW) {
    var gX = gW[1];
    var gY = gW[2];
    return gY ? (q[1] = q[1] + -1 | 0,q[2] = gY,gX) : (clear(q),gX);
  }
  throw runtime["caml_wrap_thrown_exception"](Empty);
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
      caml_call1(f, content);
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
      var accu__1 = caml_call2(f, accu__0, content);
      var accu__0 = accu__1;
      var cell__0 = cell__1;
      continue;
    }
    return accu__0;
  }
}

function fold__0(f, accu, q) {return fold(f, accu, q[2]);}

function transfer(q1, q2) {
  var gU = 0 < q1[1] ? 1 : 0;
  if (gU) {
    var gV = q2[3];
    return gV ?
      (q2[1] = q2[1] + q1[1] | 0,gV[2] = q1[2],q2[3] = q1[3],clear(q1)) :
      (q2[1] = q1[1],q2[2] = q1[2],q2[3] = q1[3],clear(q1));
  }
  return gU;
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

runtime["caml_register_global"](1, Queue, "Queue");


module.exports = global.jsoo_runtime.caml_get_global_data().Queue;