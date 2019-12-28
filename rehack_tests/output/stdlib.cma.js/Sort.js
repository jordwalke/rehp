/**
 * @flow strict
 * Sort
 */

// @ts-check


"use strict";

var runtime = require("../runtime/runtime.js");

function call2(f, a0, a1) {
  return f.length === 2 ? f(a0, a1) : runtime["caml_call_gen"](f, [a0,a1]);
}

var caml_wrap_thrown_exception = runtime["caml_wrap_thrown_exception"];
var cst_Sort_array = runtime["caml_new_string"]("Sort.array");
var Invalid_argument = require("../runtime/Invalid_argument.js");

function merge(order, l1, l2) {
  var h2;
  var t2;
  var h1;
  var t1;
  if (l1) {
    t1 = l1[2];
    h1 = l1[1];
    if (l2) {
      t2 = l2[2];
      h2 = l2[1];
      return call2(order, h1, h2) ?
        [0,h1,merge(order, t1, l2)] :
        [0,h2,merge(order, l1, t2)];
    }
    return l1;
  }
  return l2;
}

function list(order, l) {
  function initlist(param) {
    var l_;
    var k_;
    var e2;
    var rest;
    var j_;
    var i_;
    if (param) {
      i_ = param[2];
      j_ = param[1];
      if (i_) {
        rest = i_[2];
        e2 = i_[1];
        k_ = initlist(rest);
        l_ = call2(order, j_, e2) ? [0,j_,[0,e2,0]] : [0,e2,[0,j_,0]];
        return [0,l_,k_];
      }
      return [0,[0,j_,0],0];
    }
    return 0;
  }
  function merge2(x) {
    var h_;
    var l1;
    var l2;
    var rest;
    var g_;
    if (x) {
      g_ = x[2];
      if (g_) {
        rest = g_[2];
        l2 = g_[1];
        l1 = x[1];
        h_ = merge2(rest);
        return [0,merge(order, l1, l2),h_];
      }
    }
    return x;
  }
  function mergeall(llist) {
    var llist__1;
    var l;
    var llist__0 = llist;
    for (; ; ) {
      if (llist__0) {
        if (llist__0[2]) {
          llist__1 = merge2(llist__0);
          llist__0 = llist__1;
          continue;
        }
        l = llist__0[1];
        return l;
      }
      return 0;
    }
  }
  return mergeall(initlist(l));
}

function swap(arr, i, j) {
  var tmp = arr[i + 1];
  arr[i + 1] = arr[j + 1];
  arr[j + 1] = tmp;
  return 0;
}

function array(cmp, arr) {
  var i;
  var val_i;
  var j;
  var c_;
  function qsort(lo, hi) {
    var d_;
    var mid;
    var pivot;
    var i;
    var j;
    var e_;
    var f_;
    var lo__1;
    var hi__1;
    var lo__0 = lo;
    var hi__0 = hi;
    a:
    for (; ; ) {
      d_ = 6 <= (hi__0 - lo__0 | 0) ? 1 : 0;
      if (d_) {
        mid = (lo__0 + hi__0 | 0) >>> 1 | 0;
        if (call2(cmp, arr[mid + 1], arr[lo__0 + 1])) {swap(arr, mid, lo__0);}
        if (call2(cmp, arr[hi__0 + 1], arr[mid + 1])) {
          swap(arr, mid, hi__0);
          if (call2(cmp, arr[mid + 1], arr[lo__0 + 1])) {swap(arr, mid, lo__0);}
        }
        pivot = arr[mid + 1];
        i = [0,lo__0 + 1 | 0];
        j = [0,hi__0 + -1 | 0];
        e_ = 1 - call2(cmp, pivot, arr[hi__0 + 1]);
        f_ = e_ ? e_ : 1 - call2(cmp, arr[lo__0 + 1], pivot);
        if (f_) {
          throw caml_wrap_thrown_exception([0,Invalid_argument,cst_Sort_array]
                );
        }
        b:
        for (; ; ) {
          if (i[1] < j[1]) {
            for (; ; ) {
              if (call2(cmp, pivot, arr[i[1] + 1])) {
                for (; ; ) {
                  if (call2(cmp, arr[j[1] + 1], pivot)) {
                    if (i[1] < j[1]) {swap(arr, i[1], j[1]);}
                    i[1] += 1;
                    j[1] += -1;
                    continue b;
                  }
                  j[1] += -1;
                  continue;
                }
              }
              i[1] += 1;
              continue;
            }
          }
          if ((j[1] - lo__0 | 0) <= (hi__0 - i[1] | 0)) {
            qsort(lo__0, j[1]);
            lo__1 = i[1];
            lo__0 = lo__1;
            continue a;
          }
          qsort(i[1], hi__0);
          hi__1 = j[1];
          hi__0 = hi__1;
          continue a;
        }
      }
      return d_;
    }
  }
  qsort(0, arr.length - 1 + -1 | 0);
  var b_ = arr.length - 1 + -1 | 0;
  var a_ = 1;
  if (! (b_ < 1)) {
    i = a_;
    for (; ; ) {
      val_i = arr[i + 1];
      if (1 - call2(cmp, arr[(i + -1 | 0) + 1], val_i)) {
        arr[i + 1] = arr[(i + -1 | 0) + 1];
        j = [0,i + -1 | 0];
        for (; ; ) {
          if (1 <= j[1]) {
            if (! call2(cmp, arr[(j[1] + -1 | 0) + 1], val_i)) {
              arr[j[1] + 1] = arr[(j[1] + -1 | 0) + 1];
              j[1] += -1;
              continue;
            }
          }
          arr[j[1] + 1] = val_i;
          break;
        }
      }
      c_ = i + 1 | 0;
      if (b_ !== i) {i = c_;continue;}
      break;
    }
  }
  return 0;
}

var Sort = [0,list,array,merge];

exports = Sort;

/*::type Exports = {
  list: (order: any, l: any) => any,
  array: (cmp: any, arr: any) => any,
  merge: (order: any, l1: any, l2: any) => any,
}*/
/** @type {{
  list: (order: any, l: any) => any,
  array: (cmp: any, arr: any) => any,
  merge: (order: any, l1: any, l2: any) => any,
}} */
module.exports = ((exports /*:: : any*/) /*:: :Exports */);
module.exports.list = module.exports[1];
module.exports.array = module.exports[2];
module.exports.merge = module.exports[3];

/* Hashing disabled */
