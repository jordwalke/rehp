/**
 * Array_
 * @providesModule Array_
 */
"use strict";
var Pervasives = require('Pervasives.js');
var Assert_failure = require('Assert_failure.js');
var runtime = require('runtime.js');

let joo_global_object = global;


var runtime = joo_global_object.jsoo_runtime;
var caml_array_sub = runtime["caml_array_sub"];
var caml_check_bound = runtime["caml_check_bound"];
var caml_make_vect = runtime["caml_make_vect"];
var caml_new_string = runtime["caml_new_string"];
var caml_wrap_exception = runtime["caml_wrap_exception"];

function caml_call1(f, a0) {
  return f.length == 1 ? f(a0) : runtime["caml_call_gen"](f, [a0]);
}

function caml_call2(f, a0, a1) {
  return f.length == 2 ? f(a0, a1) : runtime["caml_call_gen"](f, [a0,a1]);
}

var global_data = runtime["caml_get_global_data"]();
var cst_Array_map2_arrays_must_have_the_same_length = caml_new_string(
  "Array.map2: arrays must have the same length"
);
var cst_Array_iter2_arrays_must_have_the_same_length = caml_new_string(
  "Array.iter2: arrays must have the same length"
);
var cst_Array_blit = caml_new_string("Array.blit");
var cst_Array_fill = caml_new_string("Array.fill");
var cst_Array_sub = caml_new_string("Array.sub");
var cst_Array_init = caml_new_string("Array.init");
var cst_Array_Bottom = caml_new_string("Array.Bottom");
var Assert_failure = global_data["Assert_failure"];
var Pervasives = global_data["Pervasives"];
var dx = [0,caml_new_string("array.ml"),233,4];

function make_float(ev) {return runtime["caml_make_float_vect"](ev);}

var Floatarray = [0];

function init(l, f) {
  if (0 === l) {return [0];}
  if (0 <= l) {
    var res = caml_make_vect(l, caml_call1(f, 0));
    var et = l + -1 | 0;
    var es = 1;
    if (! (et < 1)) {
      var i = es;
      for (; ; ) {
        res[i + 1] = caml_call1(f, i);
        var eu = i + 1 | 0;
        if (et !== i) {var i = eu;continue;}
        break;
      }
    }
    return res;
  }
  return caml_call1(Pervasives[1], cst_Array_init);
}

function make_matrix(sx, sy, init) {
  var res = caml_make_vect(sx, [0]);
  var eq = sx + -1 | 0;
  var ep = 0;
  if (! (eq < 0)) {
    var x = ep;
    for (; ; ) {
      res[x + 1] = caml_make_vect(sy, init);
      var er = x + 1 | 0;
      if (eq !== x) {var x = er;continue;}
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
  return caml_call1(Pervasives[1], cst_Array_sub);
}

function fill(a, ofs, len, v) {
  if (0 <= ofs) {
    if (0 <= len) {
      if (! ((a.length - 1 - len | 0) < ofs)) {
        var en = (ofs + len | 0) + -1 | 0;
        if (! (en < ofs)) {
          var i = ofs;
          for (; ; ) {
            a[i + 1] = v;
            var eo = i + 1 | 0;
            if (en !== i) {var i = eo;continue;}
            break;
          }
        }
        return 0;
      }
    }
  }
  return caml_call1(Pervasives[1], cst_Array_fill);
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
  return caml_call1(Pervasives[1], cst_Array_blit);
}

function iter(f, a) {
  var el = a.length - 1 + -1 | 0;
  var ek = 0;
  if (! (el < 0)) {
    var i = ek;
    for (; ; ) {
      caml_call1(f, a[i + 1]);
      var em = i + 1 | 0;
      if (el !== i) {var i = em;continue;}
      break;
    }
  }
  return 0;
}

function iter2(f, a, b) {
  if (a.length - 1 !== b.length - 1) {
    return caml_call1(
      Pervasives[1],
      cst_Array_iter2_arrays_must_have_the_same_length
    );
  }
  var ei = a.length - 1 + -1 | 0;
  var eh = 0;
  if (! (ei < 0)) {
    var i = eh;
    for (; ; ) {
      caml_call2(f, a[i + 1], b[i + 1]);
      var ej = i + 1 | 0;
      if (ei !== i) {var i = ej;continue;}
      break;
    }
  }
  return 0;
}

function map(f, a) {
  var l = a.length - 1;
  if (0 === l) {return [0];}
  var r = caml_make_vect(l, caml_call1(f, a[1]));
  var ef = l + -1 | 0;
  var ee = 1;
  if (! (ef < 1)) {
    var i = ee;
    for (; ; ) {
      r[i + 1] = caml_call1(f, a[i + 1]);
      var eg = i + 1 | 0;
      if (ef !== i) {var i = eg;continue;}
      break;
    }
  }
  return r;
}

function map2(f, a, b) {
  var la = a.length - 1;
  var lb = b.length - 1;
  if (la !== lb) {
    return caml_call1(
      Pervasives[1],
      cst_Array_map2_arrays_must_have_the_same_length
    );
  }
  if (0 === la) {return [0];}
  var r = caml_make_vect(la, caml_call2(f, a[1], b[1]));
  var ec = la + -1 | 0;
  var eb = 1;
  if (! (ec < 1)) {
    var i = eb;
    for (; ; ) {
      r[i + 1] = caml_call2(f, a[i + 1], b[i + 1]);
      var ed = i + 1 | 0;
      if (ec !== i) {var i = ed;continue;}
      break;
    }
  }
  return r;
}

function iteri(f, a) {
  var d_ = a.length - 1 + -1 | 0;
  var d9 = 0;
  if (! (d_ < 0)) {
    var i = d9;
    for (; ; ) {
      caml_call2(f, i, a[i + 1]);
      var ea = i + 1 | 0;
      if (d_ !== i) {var i = ea;continue;}
      break;
    }
  }
  return 0;
}

function mapi(f, a) {
  var l = a.length - 1;
  if (0 === l) {return [0];}
  var r = caml_make_vect(l, caml_call2(f, 0, a[1]));
  var d7 = l + -1 | 0;
  var d6 = 1;
  if (! (d7 < 1)) {
    var i = d6;
    for (; ; ) {
      r[i + 1] = caml_call2(f, i, a[i + 1]);
      var d8 = i + 1 | 0;
      if (d7 !== i) {var i = d8;continue;}
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
  var d4 = a.length - 1 + -1 | 0;
  var d3 = 0;
  if (! (d4 < 0)) {
    var i = d3;
    for (; ; ) {
      r[1] = caml_call2(f, r[1], a[i + 1]);
      var d5 = i + 1 | 0;
      if (d4 !== i) {var i = d5;continue;}
      break;
    }
  }
  return r[1];
}

function fold_right(f, a, x) {
  var r = [0,x];
  var d1 = a.length - 1 + -1 | 0;
  if (! (d1 < 0)) {
    var i = d1;
    for (; ; ) {
      r[1] = caml_call2(f, a[i + 1], r[1]);
      var d2 = i + -1 | 0;
      if (0 !== i) {var i = d2;continue;}
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
      if (caml_call1(p, a[i__0 + 1])) {return 1;}
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
      if (caml_call1(p, a[i__0 + 1])) {
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

var Bottom = [248,cst_Array_Bottom,runtime["caml_fresh_oo_id"](0)];

function sort(cmp, a) {
  function maxson(l, i) {
    var i31 = ((i + i | 0) + i | 0) + 1 | 0;
    var x = [0,i31];
    if ((i31 + 2 | 0) < l) {
      var dU = i31 + 1 | 0;
      var dV = caml_check_bound(a, dU)[dU + 1];
      if (caml_call2(cmp, caml_check_bound(a, i31)[i31 + 1], dV) < 0) {x[1] = i31 + 1 | 0;}
      var dW = i31 + 2 | 0;
      var dX = caml_check_bound(a, dW)[dW + 1];
      var dY = x[1];
      if (caml_call2(cmp, caml_check_bound(a, dY)[dY + 1], dX) < 0) {x[1] = i31 + 2 | 0;}
      return x[1];
    }
    if ((i31 + 1 | 0) < l) {
      var dZ = i31 + 1 | 0;
      var d0 = caml_check_bound(a, dZ)[dZ + 1];
      if (! (0 <= caml_call2(cmp, caml_check_bound(a, i31)[i31 + 1], d0))) {return i31 + 1 | 0;}
    }
    if (i31 < l) {return i31;}
    throw runtime["caml_wrap_thrown_exception"]([0,Bottom,i]);
  }
  function trickledown(l, i, e) {
    var i__0 = i;
    for (; ; ) {
      var j = maxson(l, i__0);
      if (0 < caml_call2(cmp, caml_check_bound(a, j)[j + 1], e)) {
        var dT = caml_check_bound(a, j)[j + 1];
        caml_check_bound(a, i__0)[i__0 + 1] = dT;
        var i__0 = j;
        continue;
      }
      return caml_check_bound(a, i__0)[i__0 + 1] = e;
    }
  }
  function trickle(l, i, e) {
    try {var dS = trickledown(l, i, e);return dS;}
    catch(exn) {
      exn = caml_wrap_exception(exn);
      if (exn[1] === Bottom) {
        var i__0 = exn[2];
        return caml_check_bound(a, i__0)[i__0 + 1] = e;
      }
      throw runtime["caml_wrap_thrown_exception_reraise"](exn);
    }
  }
  function bubbledown(l, i) {
    var i__0 = i;
    for (; ; ) {
      var i__1 = maxson(l, i__0);
      var dR = caml_check_bound(a, i__1)[i__1 + 1];
      caml_check_bound(a, i__0)[i__0 + 1] = dR;
      var i__0 = i__1;
      continue;
    }
  }
  function bubble(l, i) {
    try {var dQ = bubbledown(l, i);return dQ;}
    catch(exn) {
      exn = caml_wrap_exception(exn);
      if (exn[1] === Bottom) {var i__0 = exn[2];return i__0;}
      throw runtime["caml_wrap_thrown_exception_reraise"](exn);
    }
  }
  function trickleup(i, e) {
    var i__0 = i;
    for (; ; ) {
      var father = (i__0 + -1 | 0) / 3 | 0;
      if (i__0 !== father) {
        if (0 <= caml_call2(cmp, caml_check_bound(a, father)[father + 1], e)) {return caml_check_bound(a, i__0)[i__0 + 1] = e;}
        var dP = caml_check_bound(a, father)[father + 1];
        caml_check_bound(a, i__0)[i__0 + 1] = dP;
        if (0 < father) {var i__0 = father;continue;}
        return caml_check_bound(a, 0)[1] = e;
      }
      throw runtime["caml_wrap_thrown_exception"]([0,Assert_failure,dx]);
    }
  }
  var l = a.length - 1;
  var dJ = ((l + 1 | 0) / 3 | 0) + -1 | 0;
  if (! (dJ < 0)) {
    var i__0 = dJ;
    for (; ; ) {
      trickle(l, i__0, caml_check_bound(a, i__0)[i__0 + 1]);
      var dO = i__0 + -1 | 0;
      if (0 !== i__0) {var i__0 = dO;continue;}
      break;
    }
  }
  var dK = l + -1 | 0;
  if (! (dK < 2)) {
    var i = dK;
    for (; ; ) {
      var e__0 = caml_check_bound(a, i)[i + 1];
      a[i + 1] = caml_check_bound(a, 0)[1];
      trickleup(bubble(i, 0), e__0);
      var dN = i + -1 | 0;
      if (2 !== i) {var i = dN;continue;}
      break;
    }
  }
  var dL = 1 < l ? 1 : 0;
  if (dL) {
    var e = caml_check_bound(a, 1)[2];
    a[2] = caml_check_bound(a, 0)[1];
    var dM = a[1] = e;
  }
  else var dM = dL;
  return dM;
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
        if (0 < caml_call2(cmp, s1__0, s2__0)) {
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
    var dI = caml_check_bound(src2, src2ofs)[src2ofs + 1];
    return loop(
      src1ofs,
      caml_check_bound(a, src1ofs)[src1ofs + 1],
      src2ofs,
      dI,
      dstofs
    );
  }
  function isortto(srcofs, dst, dstofs, len) {
    var dA = len + -1 | 0;
    var dz = 0;
    if (! (dA < 0)) {
      var i = dz;
      a:
      for (; ; ) {
        var dB = srcofs + i | 0;
        var e = caml_check_bound(a, dB)[dB + 1];
        var j = [0,(dstofs + i | 0) + -1 | 0];
        for (; ; ) {
          if (dstofs <= j[1]) {
            var dC = j[1];
            if (0 < caml_call2(cmp, caml_check_bound(dst, dC)[dC + 1], e)) {
              var dD = j[1];
              var dE = caml_check_bound(dst, dD)[dD + 1];
              var dF = j[1] + 1 | 0;
              caml_check_bound(dst, dF)[dF + 1] = dE;
              j[1] += -1;
              continue;
            }
          }
          var dG = j[1] + 1 | 0;
          caml_check_bound(dst, dG)[dG + 1] = e;
          var dH = i + 1 | 0;
          if (dA !== i) {var i = dH;continue a;}
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

var Array = [
  0,
  make_float,
  init,
  make_matrix,
  make_matrix,
  append,
  function(dy) {return runtime["caml_array_concat"](dy);},
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
  Floatarray
];

runtime["caml_register_global"](10, Array, "Array_");


module.exports = global.jsoo_runtime.caml_get_global_data().Array_;