/**
 * @flow strict
 * Stdlib__array
 */

// @ts-check


"use strict";

var runtime = require("../runtime/runtime.js");
var caml_array_sub = runtime["caml_array_sub"];
var caml_check_bound = runtime["caml_check_bound"];
var caml_make_vect = runtime["caml_make_vect"];
var string = runtime["caml_new_string"];
var caml_wrap_thrown_exception = runtime["caml_wrap_thrown_exception"];
var caml_wrap_thrown_exception_reraise = runtime
 ["caml_wrap_thrown_exception_reraise"];

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

var cst_Array_map2_arrays_must_have_the_same_length = string(
  "Array.map2: arrays must have the same length"
);
var cst_Array_iter2_arrays_must_have_the_same_length = string(
  "Array.iter2: arrays must have the same length"
);
var cst_Array_blit = string("Array.blit");
var cst_Array_fill = string("Array.fill");
var cst_Array_sub = string("Array.sub");
var cst_Array_init = string("Array.init");
var cst_Stdlib_Array_Bottom = string("Stdlib.Array.Bottom");
var Stdlib_seq = require("./Stdlib__seq.js");
var Assert_failure = require("../runtime/Assert_failure.js");
var Stdlib = require("./Stdlib.js");
var a_ = [0,string("array.ml"),236,4];

function make_float(at_) {return runtime["caml_make_float_vect"](at_);}

var Floatarray = [0];

function init(l, f) {
  if (0 === l) {return [0];}
  if (0 <= l) {
    var res = caml_make_vect(l, call1(f, 0));
    var ar_ = l + -1 | 0;
    var aq_ = 1;
    if (! (ar_ < 1)) {
      var i = aq_;
      for (; ; ) {
        res[i + 1] = call1(f, i);
        var as_ = i + 1 | 0;
        if (ar_ !== i) {var i = as_;continue;}
        break;
      }
    }
    return res;
  }
  return call1(Stdlib[1], cst_Array_init);
}

function make_matrix(sx, sy, init) {
  var res = caml_make_vect(sx, [0]);
  var ao_ = sx + -1 | 0;
  var an_ = 0;
  if (! (ao_ < 0)) {
    var x = an_;
    for (; ; ) {
      res[x + 1] = caml_make_vect(sy, init);
      var ap_ = x + 1 | 0;
      if (ao_ !== x) {var x = ap_;continue;}
      break;
    }
  }
  return res;
}

function copy(a) {
  var l = a.length - 1;
  return 0 === l ? [0] : caml_array_sub(a, 0, l);
}

function append(a1, a2) {
  var l1 = a1.length - 1;
  return 0 === l1 ?
    copy(a2) :
    0 === a2.length - 1 ?
     caml_array_sub(a1, 0, l1) :
     runtime["caml_array_append"](a1, a2);
}

function sub(a, ofs, len) {
  if (0 <= ofs) {
    if (0 <= len) {
      if (! ((a.length - 1 - len | 0) < ofs)) {return caml_array_sub(a, ofs, len);}
    }
  }
  return call1(Stdlib[1], cst_Array_sub);
}

function fill(a, ofs, len, v) {
  if (0 <= ofs) {
    if (0 <= len) {
      if (! ((a.length - 1 - len | 0) < ofs)) {
        var al_ = (ofs + len | 0) + -1 | 0;
        if (! (al_ < ofs)) {
          var i = ofs;
          for (; ; ) {
            a[i + 1] = v;
            var am_ = i + 1 | 0;
            if (al_ !== i) {var i = am_;continue;}
            break;
          }
        }
        return 0;
      }
    }
  }
  return call1(Stdlib[1], cst_Array_fill);
}

function blit(a1, ofs1, a2, ofs2, len) {
  if (0 <= len) {
    if (0 <= ofs1) {
      if (! ((a1.length - 1 - len | 0) < ofs1)) {
        if (0 <= ofs2) {
          if (! ((a2.length - 1 - len | 0) < ofs2)) {
            return runtime["caml_array_blit"](a1, ofs1, a2, ofs2, len);
          }
        }
      }
    }
  }
  return call1(Stdlib[1], cst_Array_blit);
}

function iter(f, a) {
  var aj_ = a.length - 1 + -1 | 0;
  var ai_ = 0;
  if (! (aj_ < 0)) {
    var i = ai_;
    for (; ; ) {
      call1(f, a[i + 1]);
      var ak_ = i + 1 | 0;
      if (aj_ !== i) {var i = ak_;continue;}
      break;
    }
  }
  return 0;
}

function iter2(f, a, b) {
  if (a.length - 1 !== b.length - 1) {
    return call1(Stdlib[1], cst_Array_iter2_arrays_must_have_the_same_length);
  }
  var ag_ = a.length - 1 + -1 | 0;
  var af_ = 0;
  if (! (ag_ < 0)) {
    var i = af_;
    for (; ; ) {
      call2(f, a[i + 1], b[i + 1]);
      var ah_ = i + 1 | 0;
      if (ag_ !== i) {var i = ah_;continue;}
      break;
    }
  }
  return 0;
}

function map(f, a) {
  var l = a.length - 1;
  if (0 === l) {return [0];}
  var r = caml_make_vect(l, call1(f, a[1]));
  var ad_ = l + -1 | 0;
  var ac_ = 1;
  if (! (ad_ < 1)) {
    var i = ac_;
    for (; ; ) {
      r[i + 1] = call1(f, a[i + 1]);
      var ae_ = i + 1 | 0;
      if (ad_ !== i) {var i = ae_;continue;}
      break;
    }
  }
  return r;
}

function map2(f, a, b) {
  var la = a.length - 1;
  var lb = b.length - 1;
  if (la !== lb) {
    return call1(Stdlib[1], cst_Array_map2_arrays_must_have_the_same_length);
  }
  if (0 === la) {return [0];}
  var r = caml_make_vect(la, call2(f, a[1], b[1]));
  var aa_ = la + -1 | 0;
  var Z_ = 1;
  if (! (aa_ < 1)) {
    var i = Z_;
    for (; ; ) {
      r[i + 1] = call2(f, a[i + 1], b[i + 1]);
      var ab_ = i + 1 | 0;
      if (aa_ !== i) {var i = ab_;continue;}
      break;
    }
  }
  return r;
}

function iteri(f, a) {
  var X_ = a.length - 1 + -1 | 0;
  var W_ = 0;
  if (! (X_ < 0)) {
    var i = W_;
    for (; ; ) {
      call2(f, i, a[i + 1]);
      var Y_ = i + 1 | 0;
      if (X_ !== i) {var i = Y_;continue;}
      break;
    }
  }
  return 0;
}

function mapi(f, a) {
  var l = a.length - 1;
  if (0 === l) {return [0];}
  var r = caml_make_vect(l, call2(f, 0, a[1]));
  var U_ = l + -1 | 0;
  var T_ = 1;
  if (! (U_ < 1)) {
    var i = T_;
    for (; ; ) {
      r[i + 1] = call2(f, i, a[i + 1]);
      var V_ = i + 1 | 0;
      if (U_ !== i) {var i = V_;continue;}
      break;
    }
  }
  return r;
}

function to_list(a) {
  function tolist(i, res) {
    var i__0 = i;
    var res__0 = res;
    for (; ; ) {
      if (0 <= i__0) {
        var res__1 = [0,a[i__0 + 1],res__0];
        var i__1 = i__0 + -1 | 0;
        var i__0 = i__1;
        var res__0 = res__1;
        continue;
      }
      return res__0;
    }
  }
  return tolist(a.length - 1 + -1 | 0, 0);
}

function list_length(accu, param) {
  var accu__0 = accu;
  var param__0 = param;
  for (; ; ) {
    if (param__0) {
      var param__1 = param__0[2];
      var accu__1 = accu__0 + 1 | 0;
      var accu__0 = accu__1;
      var param__0 = param__1;
      continue;
    }
    return accu__0;
  }
}

function of_list(l) {
  if (l) {
    var tl = l[2];
    var hd = l[1];
    var a = caml_make_vect(list_length(0, l), hd);
    var fill = function(i, param) {
      var i__0 = i;
      var param__0 = param;
      for (; ; ) {
        if (param__0) {
          var param__1 = param__0[2];
          var hd = param__0[1];
          a[i__0 + 1] = hd;
          var i__1 = i__0 + 1 | 0;
          var i__0 = i__1;
          var param__0 = param__1;
          continue;
        }
        return a;
      }
    };
    return fill(1, tl);
  }
  return [0];
}

function fold_left(f, x, a) {
  var r = [0,x];
  var R_ = a.length - 1 + -1 | 0;
  var Q_ = 0;
  if (! (R_ < 0)) {
    var i = Q_;
    for (; ; ) {
      r[1] = call2(f, r[1], a[i + 1]);
      var S_ = i + 1 | 0;
      if (R_ !== i) {var i = S_;continue;}
      break;
    }
  }
  return r[1];
}

function fold_right(f, a, x) {
  var r = [0,x];
  var O_ = a.length - 1 + -1 | 0;
  if (! (O_ < 0)) {
    var i = O_;
    for (; ; ) {
      r[1] = call2(f, a[i + 1], r[1]);
      var P_ = i + -1 | 0;
      if (0 !== i) {var i = P_;continue;}
      break;
    }
  }
  return r[1];
}

function exists(p, a) {
  var n = a.length - 1;
  function loop(i) {
    var i__0 = i;
    for (; ; ) {
      if (i__0 === n) {return 0;}
      if (call1(p, a[i__0 + 1])) {return 1;}
      var i__1 = i__0 + 1 | 0;
      var i__0 = i__1;
      continue;
    }
  }
  return loop(0);
}

function for_all(p, a) {
  var n = a.length - 1;
  function loop(i) {
    var i__0 = i;
    for (; ; ) {
      if (i__0 === n) {return 1;}
      if (call1(p, a[i__0 + 1])) {
        var i__1 = i__0 + 1 | 0;
        var i__0 = i__1;
        continue;
      }
      return 0;
    }
  }
  return loop(0);
}

function mem(x, a) {
  var n = a.length - 1;
  function loop(i) {
    var i__0 = i;
    for (; ; ) {
      if (i__0 === n) {return 0;}
      if (0 === runtime["caml_compare"](a[i__0 + 1], x)) {return 1;}
      var i__1 = i__0 + 1 | 0;
      var i__0 = i__1;
      continue;
    }
  }
  return loop(0);
}

function memq(x, a) {
  var n = a.length - 1;
  function loop(i) {
    var i__0 = i;
    for (; ; ) {
      if (i__0 === n) {return 0;}
      if (x === a[i__0 + 1]) {return 1;}
      var i__1 = i__0 + 1 | 0;
      var i__0 = i__1;
      continue;
    }
  }
  return loop(0);
}

var Bottom = [248,cst_Stdlib_Array_Bottom,runtime["caml_fresh_oo_id"](0)];

function sort(cmp, a) {
  function maxson(l, i) {
    var i31 = ((i + i | 0) + i | 0) + 1 | 0;
    var x = [0,i31];
    if ((i31 + 2 | 0) < l) {
      var H_ = i31 + 1 | 0;
      var I_ = caml_check_bound(a, H_)[H_ + 1];
      if (call2(cmp, caml_check_bound(a, i31)[i31 + 1], I_) < 0) {x[1] = i31 + 1 | 0;}
      var J_ = i31 + 2 | 0;
      var K_ = caml_check_bound(a, J_)[J_ + 1];
      var L_ = x[1];
      if (call2(cmp, caml_check_bound(a, L_)[L_ + 1], K_) < 0) {x[1] = i31 + 2 | 0;}
      return x[1];
    }
    if ((i31 + 1 | 0) < l) {
      var M_ = i31 + 1 | 0;
      var N_ = caml_check_bound(a, M_)[M_ + 1];
      if (! (0 <= call2(cmp, caml_check_bound(a, i31)[i31 + 1], N_))) {return i31 + 1 | 0;}
    }
    if (i31 < l) {return i31;}
    throw caml_wrap_thrown_exception([0,Bottom,i]);
  }
  function trickledown(l, i, e) {
    var i__0 = i;
    for (; ; ) {
      var j = maxson(l, i__0);
      if (0 < call2(cmp, caml_check_bound(a, j)[j + 1], e)) {
        var G_ = caml_check_bound(a, j)[j + 1];
        caml_check_bound(a, i__0)[i__0 + 1] = G_;
        var i__0 = j;
        continue;
      }
      caml_check_bound(a, i__0)[i__0 + 1] = e;
      return 0;
    }
  }
  function trickle(l, i, e) {
    try {var F_ = trickledown(l, i, e);return F_;}
    catch(exn) {
      exn = runtime["caml_wrap_exception"](exn);
      if (exn[1] === Bottom) {
        var i__0 = exn[2];
        caml_check_bound(a, i__0)[i__0 + 1] = e;
        return 0;
      }
      throw caml_wrap_thrown_exception_reraise(exn);
    }
  }
  function bubbledown(l, i) {
    var i__0 = i;
    for (; ; ) {
      var i__1 = maxson(l, i__0);
      var E_ = caml_check_bound(a, i__1)[i__1 + 1];
      caml_check_bound(a, i__0)[i__0 + 1] = E_;
      var i__0 = i__1;
      continue;
    }
  }
  function bubble(l, i) {
    try {var D_ = bubbledown(l, i);return D_;}
    catch(exn) {
      exn = runtime["caml_wrap_exception"](exn);
      if (exn[1] === Bottom) {var i__0 = exn[2];return i__0;}
      throw caml_wrap_thrown_exception_reraise(exn);
    }
  }
  function trickleup(i, e) {
    var i__0 = i;
    for (; ; ) {
      var father = (i__0 + -1 | 0) / 3 | 0;
      if (i__0 !== father) {
        if (0 <= call2(cmp, caml_check_bound(a, father)[father + 1], e)) {caml_check_bound(a, i__0)[i__0 + 1] = e;return 0;}
        var C_ = caml_check_bound(a, father)[father + 1];
        caml_check_bound(a, i__0)[i__0 + 1] = C_;
        if (0 < father) {var i__0 = father;continue;}
        caml_check_bound(a, 0)[1] = e;
        return 0;
      }
      throw caml_wrap_thrown_exception([0,Assert_failure,a_]);
    }
  }
  var l = a.length - 1;
  var w_ = ((l + 1 | 0) / 3 | 0) + -1 | 0;
  if (! (w_ < 0)) {
    var i__0 = w_;
    for (; ; ) {
      trickle(l, i__0, caml_check_bound(a, i__0)[i__0 + 1]);
      var B_ = i__0 + -1 | 0;
      if (0 !== i__0) {var i__0 = B_;continue;}
      break;
    }
  }
  var x_ = l + -1 | 0;
  if (! (x_ < 2)) {
    var i = x_;
    for (; ; ) {
      var e__0 = caml_check_bound(a, i)[i + 1];
      a[i + 1] = caml_check_bound(a, 0)[1];
      trickleup(bubble(i, 0), e__0);
      var A_ = i + -1 | 0;
      if (2 !== i) {var i = A_;continue;}
      break;
    }
  }
  var y_ = 1 < l ? 1 : 0;
  if (y_) {
    var e = caml_check_bound(a, 1)[2];
    a[2] = caml_check_bound(a, 0)[1];
    a[1] = e;
    var z_ = 0;
  }
  else var z_ = y_;
  return z_;
}

function stable_sort(cmp, a) {
  function merge(src1ofs, src1len, src2, src2ofs, src2len, dst, dstofs) {
    var src1r = src1ofs + src1len | 0;
    var src2r = src2ofs + src2len | 0;
    function loop(i1, s1, i2, s2, d) {
      var i1__0 = i1;
      var s1__0 = s1;
      var i2__0 = i2;
      var s2__0 = s2;
      var d__0 = d;
      for (; ; ) {
        if (0 < call2(cmp, s1__0, s2__0)) {
          caml_check_bound(dst, d__0)[d__0 + 1] = s2__0;
          var i2__1 = i2__0 + 1 | 0;
          if (i2__1 < src2r) {
            var d__1 = d__0 + 1 | 0;
            var s2__1 = caml_check_bound(src2, i2__1)[i2__1 + 1];
            var i2__0 = i2__1;
            var s2__0 = s2__1;
            var d__0 = d__1;
            continue;
          }
          return blit(a, i1__0, dst, d__0 + 1 | 0, src1r - i1__0 | 0);
        }
        caml_check_bound(dst, d__0)[d__0 + 1] = s1__0;
        var i1__1 = i1__0 + 1 | 0;
        if (i1__1 < src1r) {
          var d__2 = d__0 + 1 | 0;
          var s1__1 = caml_check_bound(a, i1__1)[i1__1 + 1];
          var i1__0 = i1__1;
          var s1__0 = s1__1;
          var d__0 = d__2;
          continue;
        }
        return blit(src2, i2__0, dst, d__0 + 1 | 0, src2r - i2__0 | 0);
      }
    }
    var v_ = caml_check_bound(src2, src2ofs)[src2ofs + 1];
    return loop(
      src1ofs,
      caml_check_bound(a, src1ofs)[src1ofs + 1],
      src2ofs,
      v_,
      dstofs
    );
  }
  function isortto(srcofs, dst, dstofs, len) {
    var n_ = len + -1 | 0;
    var m_ = 0;
    if (! (n_ < 0)) {
      var i = m_;
      a:
      for (; ; ) {
        var o_ = srcofs + i | 0;
        var e = caml_check_bound(a, o_)[o_ + 1];
        var j = [0,(dstofs + i | 0) + -1 | 0];
        for (; ; ) {
          if (dstofs <= j[1]) {
            var p_ = j[1];
            if (0 < call2(cmp, caml_check_bound(dst, p_)[p_ + 1], e)) {
              var q_ = j[1];
              var r_ = caml_check_bound(dst, q_)[q_ + 1];
              var s_ = j[1] + 1 | 0;
              caml_check_bound(dst, s_)[s_ + 1] = r_;
              j[1] += -1;
              continue;
            }
          }
          var t_ = j[1] + 1 | 0;
          caml_check_bound(dst, t_)[t_ + 1] = e;
          var u_ = i + 1 | 0;
          if (n_ !== i) {var i = u_;continue a;}
          break;
        }
        break;
      }
    }
    return 0;
  }
  function sortto(srcofs, dst, dstofs, len) {
    if (len <= 5) {return isortto(srcofs, dst, dstofs, len);}
    var l1 = len / 2 | 0;
    var l2 = len - l1 | 0;
    sortto(srcofs + l1 | 0, dst, dstofs + l1 | 0, l2);
    sortto(srcofs, a, srcofs + l2 | 0, l1);
    return merge(srcofs + l2 | 0, l1, dst, dstofs + l1 | 0, l2, dst, dstofs);
  }
  var l = a.length - 1;
  if (l <= 5) {return isortto(0, a, 0, l);}
  var l1 = l / 2 | 0;
  var l2 = l - l1 | 0;
  var t = caml_make_vect(l2, caml_check_bound(a, 0)[1]);
  sortto(l1, t, 0, l2);
  sortto(0, a, l2, l1);
  return merge(l2, l1, t, 0, l2, a, 0);
}

function to_seq(a) {
  function aux(i, param) {
    if (i < a.length - 1) {
      var x = a[i + 1];
      var k_ = i + 1 | 0;
      return [0,x,function(l_) {return aux(k_, l_);}];
    }
    return 0;
  }
  var i_ = 0;
  return function(j_) {return aux(i_, j_);};
}

function to_seqi(a) {
  function aux(i, param) {
    if (i < a.length - 1) {
      var x = a[i + 1];
      var g_ = i + 1 | 0;
      return [0,[0,i,x],function(h_) {return aux(g_, h_);}];
    }
    return 0;
  }
  var e_ = 0;
  return function(f_) {return aux(e_, f_);};
}

function of_rev_list(l) {
  if (l) {
    var tl = l[2];
    var hd = l[1];
    var len = list_length(0, l);
    var a = caml_make_vect(len, hd);
    var fill = function(i, param) {
      var i__0 = i;
      var param__0 = param;
      for (; ; ) {
        if (param__0) {
          var param__1 = param__0[2];
          var hd = param__0[1];
          a[i__0 + 1] = hd;
          var i__1 = i__0 + -1 | 0;
          var i__0 = i__1;
          var param__0 = param__1;
          continue;
        }
        return a;
      }
    };
    return fill(len + -2 | 0, tl);
  }
  return [0];
}

function of_seq(i) {
  var c_ = 0;
  function d_(acc, x) {return [0,x,acc];}
  var l = call3(Stdlib_seq[7], d_, c_, i);
  return of_rev_list(l);
}

var Stdlib_array = [
  0,
  make_float,
  init,
  make_matrix,
  make_matrix,
  append,
  function(b_) {return runtime["caml_array_concat"](b_);},
  sub,
  copy,
  fill,
  blit,
  to_list,
  of_list,
  iter,
  iteri,
  map,
  mapi,
  fold_left,
  fold_right,
  iter2,
  map2,
  for_all,
  exists,
  mem,
  memq,
  sort,
  stable_sort,
  stable_sort,
  to_seq,
  to_seqi,
  of_seq,
  Floatarray
];

module.exports = Stdlib_array;

/*::type Exports = {
  make_float: (arg0: any) => any,
  init: (l: any, f: any) => any,
  make_matrix: (sx: any, sy: any, init: any) => any,
  append: (a1: any, a2: any) => any,
  sub: (a: any, ofs: any, len: any) => any,
  copy: (a: any) => any,
  fill: (a: any, ofs: any, len: any, v: any) => any,
  blit: (a1: any, ofs1: any, a2: any, ofs2: any, len: any) => any,
  to_list: (a: any) => any,
  of_list: (l: any) => any,
  iter: (f: any, a: any) => any,
  iteri: (f: any, a: any) => any,
  map: (f: any, a: any) => any,
  mapi: (f: any, a: any) => any,
  fold_left: (f: any, x: any, a: any) => any,
  fold_right: (f: any, a: any, x: any) => any,
  iter2: (f: any, a: any, b: any) => any,
  map2: (f: any, a: any, b: any) => any,
  for_all: (p: any, a: any) => any,
  exists: (p: any, a: any) => any,
  mem: (x: any, a: any) => any,
  memq: (x: any, a: any) => any,
  sort: (cmp: any, a: any) => any,
  stable_sort: (cmp: any, a: any) => any,
  to_seq: (a: any) => any,
  to_seqi: (a: any) => any,
  of_seq: (i: any) => any,
  Floatarray: any,
}*/
/** @type {{
  make_float: (arg0: any) => any,
  init: (l: any, f: any) => any,
  make_matrix: (sx: any, sy: any, init: any) => any,
  append: (a1: any, a2: any) => any,
  sub: (a: any, ofs: any, len: any) => any,
  copy: (a: any) => any,
  fill: (a: any, ofs: any, len: any, v: any) => any,
  blit: (a1: any, ofs1: any, a2: any, ofs2: any, len: any) => any,
  to_list: (a: any) => any,
  of_list: (l: any) => any,
  iter: (f: any, a: any) => any,
  iteri: (f: any, a: any) => any,
  map: (f: any, a: any) => any,
  mapi: (f: any, a: any) => any,
  fold_left: (f: any, x: any, a: any) => any,
  fold_right: (f: any, a: any, x: any) => any,
  iter2: (f: any, a: any, b: any) => any,
  map2: (f: any, a: any, b: any) => any,
  for_all: (p: any, a: any) => any,
  exists: (p: any, a: any) => any,
  mem: (x: any, a: any) => any,
  memq: (x: any, a: any) => any,
  sort: (cmp: any, a: any) => any,
  stable_sort: (cmp: any, a: any) => any,
  to_seq: (a: any) => any,
  to_seqi: (a: any) => any,
  of_seq: (i: any) => any,
  Floatarray: any,
}} */
module.exports = ((module.exports /*:: : any*/) /*:: :Exports */);
module.exports.make_float = module.exports[1];
module.exports.init = module.exports[2];
module.exports.make_matrix = module.exports[3];
module.exports.append = module.exports[5];
module.exports.sub = module.exports[7];
module.exports.copy = module.exports[8];
module.exports.fill = module.exports[9];
module.exports.blit = module.exports[10];
module.exports.to_list = module.exports[11];
module.exports.of_list = module.exports[12];
module.exports.iter = module.exports[13];
module.exports.iteri = module.exports[14];
module.exports.map = module.exports[15];
module.exports.mapi = module.exports[16];
module.exports.fold_left = module.exports[17];
module.exports.fold_right = module.exports[18];
module.exports.iter2 = module.exports[19];
module.exports.map2 = module.exports[20];
module.exports.for_all = module.exports[21];
module.exports.exists = module.exports[22];
module.exports.mem = module.exports[23];
module.exports.memq = module.exports[24];
module.exports.sort = module.exports[25];
module.exports.stable_sort = module.exports[26];
module.exports.to_seq = module.exports[28];
module.exports.to_seqi = module.exports[29];
module.exports.of_seq = module.exports[30];
module.exports.Floatarray = module.exports[31];

/* Hashing disabled */
