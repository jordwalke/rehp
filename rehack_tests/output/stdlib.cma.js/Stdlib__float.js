/**
 * @flow strict
 * Stdlib__float
 */

// @ts-check


"use strict";

var runtime = require("../runtime/runtime.js");
var caml_array_get = runtime["caml_array_get"];
var caml_array_set = runtime["caml_array_set"];
var caml_float_compare = runtime["caml_float_compare"];
var caml_floatarray_create = runtime["caml_floatarray_create"];
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

var cst_Float_Array_map2_arrays_must_have_the_same_length = string(
  "Float.Array.map2: arrays must have the same length"
);
var cst_Float_Array_iter2_arrays_must_have_the_same_length = string(
  "Float.Array.iter2: arrays must have the same length"
);
var cst_Float_array_blit = string("Float.array.blit");
var cst_Float_array_blit__0 = string("Float.array.blit");
var cst_Float_Array_fill = string("Float.Array.fill");
var cst_Float_Array_sub = string("Float.Array.sub");
var cst_Float_Array_concat = string("Float.Array.concat");
var cst_Float_Array_init = string("Float.Array.init");
var cst_Stdlib_Float_Array_Bottom = string("Stdlib.Float.Array.Bottom");
var Stdlib_seq = require("./Stdlib__seq.js");
var Stdlib_list = require("./Stdlib__list.js");
var Assert_failure = require("../runtime/Assert_failure.js");
var Stdlib = require("./Stdlib.js");
var b_ = [0,string("float.ml"),381,6];
var a_ = [0,string("float.ml"),208,14];
var infinity = Stdlib[22];
var neg_infinity = Stdlib[23];
var nan = Stdlib[24];
var zero = 0;
var one = 1;
var minus_one = -1;

function is_finite(x) {return x - x == 0 ? 1 : 0;}

function is_infinite(x) {return 1 / x == 0 ? 1 : 0;}

function is_nan(x) {return x != x ? 1 : 0;}

var max_float = Stdlib[25];
var min_float = Stdlib[26];
var epsilon = Stdlib[27];
var of_string_opt = Stdlib[36];
var to_string = Stdlib[35];
var pi = 3.14159265358979312;

function is_integer(x) {
  var aP_ = x == runtime["caml_trunc_float"](x) ? 1 : 0;
  return aP_ ? is_finite(x) : aP_;
}

function succ(x) {return runtime["caml_nextafter_float"](x, infinity);}

function pred(x) {return runtime["caml_nextafter_float"](x, neg_infinity);}

function equal(x, y) {return 0 === caml_float_compare(x, y) ? 1 : 0;}

function min(x, y) {
  if (! (x < y)) {
    var switch__0 = runtime["caml_signbit_float"](y) ?
      1 :
      runtime["caml_signbit_float"](x) ? 0 : 1;
    if (switch__0) {return is_nan(x) ? x : y;}
  }
  return is_nan(y) ? y : x;
}

function max(x, y) {
  if (! (x < y)) {
    var switch__0 = runtime["caml_signbit_float"](y) ?
      1 :
      runtime["caml_signbit_float"](x) ? 0 : 1;
    if (switch__0) {return is_nan(y) ? y : x;}
  }
  return is_nan(x) ? x : y;
}

function min_max(x, y) {
  if (! is_nan(x)) {
    if (! is_nan(y)) {
      if (! (x < y)) {
        var switch__0 = runtime["caml_signbit_float"](y) ?
          1 :
          runtime["caml_signbit_float"](x) ? 0 : 1;
        if (switch__0) {return [0,y,x];}
      }
      return [0,x,y];
    }
  }
  return [0,nan,nan];
}

function min_num(x, y) {
  if (! (x < y)) {
    var switch__0 = runtime["caml_signbit_float"](y) ?
      1 :
      runtime["caml_signbit_float"](x) ? 0 : 1;
    if (switch__0) {return is_nan(y) ? x : y;}
  }
  return is_nan(x) ? y : x;
}

function max_num(x, y) {
  if (! (x < y)) {
    var switch__0 = runtime["caml_signbit_float"](y) ?
      1 :
      runtime["caml_signbit_float"](x) ? 0 : 1;
    if (switch__0) {return is_nan(x) ? y : x;}
  }
  return is_nan(y) ? x : y;
}

function min_max_num(x, y) {
  if (is_nan(x)) {return [0,y,y];}
  if (is_nan(y)) {return [0,x,x];}
  if (! (x < y)) {
    var switch__0 = runtime["caml_signbit_float"](y) ?
      1 :
      runtime["caml_signbit_float"](x) ? 0 : 1;
    if (switch__0) {return [0,y,x];}
  }
  return [0,x,y];
}

function hash(x) {return runtime["caml_hash"](10, 100, 0, x);}

function unsafe_fill(a, ofs, len, v) {
  var aN_ = (ofs + len | 0) + -1 | 0;
  if (! (aN_ < ofs)) {
    var i = ofs;
    for (; ; ) {
      a[i + 1] = v;
      var aO_ = i + 1 | 0;
      if (aN_ !== i) {var i = aO_;continue;}
      break;
    }
  }
  return 0;
}

function unsafe_blit(src, sofs, dst, dofs, len) {
  var aL_ = len + -1 | 0;
  var aK_ = 0;
  if (! (aL_ < 0)) {
    var i = aK_;
    for (; ; ) {
      dst[(dofs + i | 0) + 1] = src[(sofs + i | 0) + 1];
      var aM_ = i + 1 | 0;
      if (aL_ !== i) {var i = aM_;continue;}
      break;
    }
  }
  return 0;
}

function check(a, ofs, len, msg) {
  var aG_ = ofs < 0 ? 1 : 0;
  if (aG_) var aH_ = aG_;
  else {
    var aI_ = len < 0 ? 1 : 0;
    if (aI_) var aH_ = aI_;
    else {
      var aJ_ = (ofs + len | 0) < 0 ? 1 : 0;
      var aH_ = aJ_ ? aJ_ : a.length - 1 < (ofs + len | 0) ? 1 : 0;
    }
  }
  return aH_ ? call1(Stdlib[1], msg) : aH_;
}

function make(n, v) {
  var result = caml_floatarray_create(n);
  unsafe_fill(result, 0, n, v);
  return result;
}

function init(l, f) {
  if (0 <= l) {
    var res = caml_floatarray_create(l);
    var aE_ = l + -1 | 0;
    var aD_ = 0;
    if (! (aE_ < 0)) {
      var i = aD_;
      for (; ; ) {
        res[i + 1] = call1(f, i);
        var aF_ = i + 1 | 0;
        if (aE_ !== i) {var i = aF_;continue;}
        break;
      }
    }
    return res;
  }
  return call1(Stdlib[1], cst_Float_Array_init);
}

function append(a1, a2) {
  var l1 = a1.length - 1;
  var l2 = a2.length - 1;
  var result = caml_floatarray_create(l1 + l2 | 0);
  unsafe_blit(a1, 0, result, 0, l1);
  unsafe_blit(a2, 0, result, l1, l2);
  return result;
}

function ensure_ge(x, y) {
  return y <= x ? x : call1(Stdlib[1], cst_Float_Array_concat);
}

function sum_lengths(acc, param) {
  var acc__0 = acc;
  var param__0 = param;
  for (; ; ) {
    if (param__0) {
      var param__1 = param__0[2];
      var hd = param__0[1];
      var acc__1 = ensure_ge(hd.length - 1 + acc__0 | 0, acc__0);
      var acc__0 = acc__1;
      var param__0 = param__1;
      continue;
    }
    return acc__0;
  }
}

function concat(l) {
  var len = sum_lengths(0, l);
  var result = caml_floatarray_create(len);
  function loop(l, i) {
    var l__0 = l;
    var i__0 = i;
    for (; ; ) {
      if (l__0) {
        var l__1 = l__0[2];
        var hd = l__0[1];
        var hlen = hd.length - 1;
        unsafe_blit(hd, 0, result, i__0, hlen);
        var i__1 = i__0 + hlen | 0;
        var l__0 = l__1;
        var i__0 = i__1;
        continue;
      }
      if (i__0 === len) {return 0;}
      throw caml_wrap_thrown_exception([0,Assert_failure,a_]);
    }
  }
  loop(l, 0);
  return result;
}

function sub(a, ofs, len) {
  check(a, ofs, len, cst_Float_Array_sub);
  var result = caml_floatarray_create(len);
  unsafe_blit(a, ofs, result, 0, len);
  return result;
}

function copy(a) {
  var l = a.length - 1;
  var result = caml_floatarray_create(l);
  unsafe_blit(a, 0, result, 0, l);
  return result;
}

function fill(a, ofs, len, v) {
  check(a, ofs, len, cst_Float_Array_fill);
  return unsafe_fill(a, ofs, len, v);
}

function blit(src, sofs, dst, dofs, len) {
  check(src, sofs, len, cst_Float_array_blit);
  check(dst, dofs, len, cst_Float_array_blit__0);
  return unsafe_blit(src, sofs, dst, dofs, len);
}

function to_list(a) {
  function ay_(aC_, aB_) {return aC_[aB_ + 1];}
  function az_(aA_) {return ay_(a, aA_);}
  return call2(Stdlib_list[10], a.length - 1, az_);
}

function of_list(l) {
  var result = caml_floatarray_create(call1(Stdlib_list[1], l));
  function fill(i, l) {
    var i__0 = i;
    var l__0 = l;
    for (; ; ) {
      if (l__0) {
        var l__1 = l__0[2];
        var h = l__0[1];
        result[i__0 + 1] = h;
        var i__1 = i__0 + 1 | 0;
        var i__0 = i__1;
        var l__0 = l__1;
        continue;
      }
      return result;
    }
  }
  return fill(0, l);
}

function iter(f, a) {
  var aw_ = a.length - 1 + -1 | 0;
  var av_ = 0;
  if (! (aw_ < 0)) {
    var i = av_;
    for (; ; ) {
      call1(f, a[i + 1]);
      var ax_ = i + 1 | 0;
      if (aw_ !== i) {var i = ax_;continue;}
      break;
    }
  }
  return 0;
}

function iter2(f, a, b) {
  if (a.length - 1 !== b.length - 1) {
    return call1(
      Stdlib[1],
      cst_Float_Array_iter2_arrays_must_have_the_same_length
    );
  }
  var at_ = a.length - 1 + -1 | 0;
  var as_ = 0;
  if (! (at_ < 0)) {
    var i = as_;
    for (; ; ) {
      call2(f, a[i + 1], b[i + 1]);
      var au_ = i + 1 | 0;
      if (at_ !== i) {var i = au_;continue;}
      break;
    }
  }
  return 0;
}

function map(f, a) {
  var l = a.length - 1;
  var r = caml_floatarray_create(l);
  var aq_ = l + -1 | 0;
  var ap_ = 0;
  if (! (aq_ < 0)) {
    var i = ap_;
    for (; ; ) {
      r[i + 1] = call1(f, a[i + 1]);
      var ar_ = i + 1 | 0;
      if (aq_ !== i) {var i = ar_;continue;}
      break;
    }
  }
  return r;
}

function map2(f, a, b) {
  var la = a.length - 1;
  var lb = b.length - 1;
  if (la !== lb) {
    return call1(
      Stdlib[1],
      cst_Float_Array_map2_arrays_must_have_the_same_length
    );
  }
  var r = caml_floatarray_create(la);
  var an_ = la + -1 | 0;
  var am_ = 0;
  if (! (an_ < 0)) {
    var i = am_;
    for (; ; ) {
      r[i + 1] = call2(f, a[i + 1], b[i + 1]);
      var ao_ = i + 1 | 0;
      if (an_ !== i) {var i = ao_;continue;}
      break;
    }
  }
  return r;
}

function iteri(f, a) {
  var ak_ = a.length - 1 + -1 | 0;
  var aj_ = 0;
  if (! (ak_ < 0)) {
    var i = aj_;
    for (; ; ) {
      call2(f, i, a[i + 1]);
      var al_ = i + 1 | 0;
      if (ak_ !== i) {var i = al_;continue;}
      break;
    }
  }
  return 0;
}

function mapi(f, a) {
  var l = a.length - 1;
  var r = caml_floatarray_create(l);
  var ah_ = l + -1 | 0;
  var ag_ = 0;
  if (! (ah_ < 0)) {
    var i = ag_;
    for (; ; ) {
      r[i + 1] = call2(f, i, a[i + 1]);
      var ai_ = i + 1 | 0;
      if (ah_ !== i) {var i = ai_;continue;}
      break;
    }
  }
  return r;
}

function fold_left(f, x, a) {
  var r = [0,x];
  var ae_ = a.length - 1 + -1 | 0;
  var ad_ = 0;
  if (! (ae_ < 0)) {
    var i = ad_;
    for (; ; ) {
      r[1] = call2(f, r[1], a[i + 1]);
      var af_ = i + 1 | 0;
      if (ae_ !== i) {var i = af_;continue;}
      break;
    }
  }
  return r[1];
}

function fold_right(f, a, x) {
  var r = [0,x];
  var ab_ = a.length - 1 + -1 | 0;
  if (! (ab_ < 0)) {
    var i = ab_;
    for (; ; ) {
      r[1] = call2(f, a[i + 1], r[1]);
      var ac_ = i + -1 | 0;
      if (0 !== i) {var i = ac_;continue;}
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
      if (0 === caml_float_compare(a[i__0 + 1], x)) {return 1;}
      var i__1 = i__0 + 1 | 0;
      var i__0 = i__1;
      continue;
    }
  }
  return loop(0);
}

function mem_ieee(x, a) {
  var n = a.length - 1;
  function loop(i) {
    var i__0 = i;
    for (; ; ) {
      if (i__0 === n) {return 0;}
      if (x == a[i__0 + 1]) {return 1;}
      var i__1 = i__0 + 1 | 0;
      var i__0 = i__1;
      continue;
    }
  }
  return loop(0);
}

var Bottom = [248,cst_Stdlib_Float_Array_Bottom,runtime["caml_fresh_oo_id"](0)
];

function sort(cmp, a) {
  function maxson(l, i) {
    var i31 = ((i + i | 0) + i | 0) + 1 | 0;
    var x = [0,i31];
    if ((i31 + 2 | 0) < l) {
      if (
      call2(cmp, caml_array_get(a, i31), caml_array_get(a, i31 + 1 | 0)) < 0
      ) {x[1] = i31 + 1 | 0;}
      if (
      call2(cmp, caml_array_get(a, x[1]), caml_array_get(a, i31 + 2 | 0)) < 0
      ) {x[1] = i31 + 2 | 0;}
      return x[1];
    }
    if ((i31 + 1 | 0) < l) {
      if (
      !
      (0 <= call2(cmp, caml_array_get(a, i31), caml_array_get(a, i31 + 1 | 0)))
      ) {return i31 + 1 | 0;}
    }
    if (i31 < l) {return i31;}
    throw caml_wrap_thrown_exception([0,Bottom,i]);
  }
  function trickledown(l, i, e) {
    var i__0 = i;
    for (; ; ) {
      var j = maxson(l, i__0);
      if (0 < call2(cmp, caml_array_get(a, j), e)) {
        caml_array_set(a, i__0, caml_array_get(a, j));
        var i__0 = j;
        continue;
      }
      return caml_array_set(a, i__0, e);
    }
  }
  function trickle(l, i, e) {
    try {var aa_ = trickledown(l, i, e);return aa_;}
    catch(exn) {
      exn = runtime["caml_wrap_exception"](exn);
      if (exn[1] === Bottom) {
        var i__0 = exn[2];
        return caml_array_set(a, i__0, e);
      }
      throw caml_wrap_thrown_exception_reraise(exn);
    }
  }
  function bubbledown(l, i) {
    var i__0 = i;
    for (; ; ) {
      var i__1 = maxson(l, i__0);
      caml_array_set(a, i__0, caml_array_get(a, i__1));
      var i__0 = i__1;
      continue;
    }
  }
  function bubble(l, i) {
    try {var Z_ = bubbledown(l, i);return Z_;}
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
        if (0 <= call2(cmp, caml_array_get(a, father), e)) {return caml_array_set(a, i__0, e);}
        caml_array_set(a, i__0, caml_array_get(a, father));
        if (0 < father) {var i__0 = father;continue;}
        return caml_array_set(a, 0, e);
      }
      throw caml_wrap_thrown_exception([0,Assert_failure,b_]);
    }
  }
  var l = a.length - 1;
  var T_ = ((l + 1 | 0) / 3 | 0) + -1 | 0;
  if (! (T_ < 0)) {
    var i__0 = T_;
    for (; ; ) {
      trickle(l, i__0, caml_array_get(a, i__0));
      var Y_ = i__0 + -1 | 0;
      if (0 !== i__0) {var i__0 = Y_;continue;}
      break;
    }
  }
  var U_ = l + -1 | 0;
  if (! (U_ < 2)) {
    var i = U_;
    for (; ; ) {
      var e__0 = caml_array_get(a, i);
      caml_array_set(a, i, caml_array_get(a, 0));
      trickleup(bubble(i, 0), e__0);
      var X_ = i + -1 | 0;
      if (2 !== i) {var i = X_;continue;}
      break;
    }
  }
  var V_ = 1 < l ? 1 : 0;
  if (V_) {
    var e = caml_array_get(a, 1);
    caml_array_set(a, 1, caml_array_get(a, 0));
    var W_ = caml_array_set(a, 0, e);
  }
  else var W_ = V_;
  return W_;
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
          caml_array_set(dst, d__0, s2__0);
          var i2__1 = i2__0 + 1 | 0;
          if (i2__1 < src2r) {
            var d__1 = d__0 + 1 | 0;
            var s2__1 = caml_array_get(src2, i2__1);
            var i2__0 = i2__1;
            var s2__0 = s2__1;
            var d__0 = d__1;
            continue;
          }
          return blit(a, i1__0, dst, d__0 + 1 | 0, src1r - i1__0 | 0);
        }
        caml_array_set(dst, d__0, s1__0);
        var i1__1 = i1__0 + 1 | 0;
        if (i1__1 < src1r) {
          var d__2 = d__0 + 1 | 0;
          var s1__1 = caml_array_get(a, i1__1);
          var i1__0 = i1__1;
          var s1__0 = s1__1;
          var d__0 = d__2;
          continue;
        }
        return blit(src2, i2__0, dst, d__0 + 1 | 0, src2r - i2__0 | 0);
      }
    }
    return loop(
      src1ofs,
      caml_array_get(a, src1ofs),
      src2ofs,
      caml_array_get(src2, src2ofs),
      dstofs
    );
  }
  function isortto(srcofs, dst, dstofs, len) {
    var R_ = len + -1 | 0;
    var Q_ = 0;
    if (! (R_ < 0)) {
      var i = Q_;
      a:
      for (; ; ) {
        var e = caml_array_get(a, srcofs + i | 0);
        var j = [0,(dstofs + i | 0) + -1 | 0];
        for (; ; ) {
          if (dstofs <= j[1]) {
            if (0 < call2(cmp, caml_array_get(dst, j[1]), e)) {
              caml_array_set(dst, j[1] + 1 | 0, caml_array_get(dst, j[1]));
              j[1] += -1;
              continue;
            }
          }
          caml_array_set(dst, j[1] + 1 | 0, e);
          var S_ = i + 1 | 0;
          if (R_ !== i) {var i = S_;continue a;}
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
  var t = caml_floatarray_create(l2);
  sortto(l1, t, 0, l2);
  sortto(0, a, l2, l1);
  return merge(l2, l1, t, 0, l2, a, 0);
}

function to_seq(a) {
  function aux(i, param) {
    if (i < a.length - 1) {
      var x = a[i + 1];
      var O_ = i + 1 | 0;
      return [0,x,function(P_) {return aux(O_, P_);}];
    }
    return 0;
  }
  var M_ = 0;
  return function(N_) {return aux(M_, N_);};
}

function to_seqi(a) {
  function aux(i, param) {
    if (i < a.length - 1) {
      var x = a[i + 1];
      var K_ = i + 1 | 0;
      return [0,[0,i,x],function(L_) {return aux(K_, L_);}];
    }
    return 0;
  }
  var I_ = 0;
  return function(J_) {return aux(I_, J_);};
}

function of_rev_list(l) {
  var len = call1(Stdlib_list[1], l);
  var a = caml_floatarray_create(len);
  function fill(i, param) {
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
  }
  return fill(len + -1 | 0, l);
}

function of_seq(i) {
  var G_ = 0;
  function H_(acc, x) {return [0,x,acc];}
  var l = call3(Stdlib_seq[7], H_, G_, i);
  return of_rev_list(l);
}

function map_to_array(f, a) {
  var l = a.length - 1;
  if (0 === l) {return [0];}
  var r = runtime["caml_make_vect"](l, call1(f, a[1]));
  var E_ = l + -1 | 0;
  var D_ = 1;
  if (! (E_ < 1)) {
    var i = D_;
    for (; ; ) {
      r[i + 1] = call1(f, a[i + 1]);
      var F_ = i + 1 | 0;
      if (E_ !== i) {var i = F_;continue;}
      break;
    }
  }
  return r;
}

function map_from_array(f, a) {
  var l = a.length - 1;
  var r = caml_floatarray_create(l);
  var B_ = l + -1 | 0;
  var A_ = 0;
  if (! (B_ < 0)) {
    var i = A_;
    for (; ; ) {
      r[i + 1] = call1(f, a[i + 1]);
      var C_ = i + 1 | 0;
      if (B_ !== i) {var i = C_;continue;}
      break;
    }
  }
  return r;
}

function c_(z_) {return caml_floatarray_create(z_);}

function d_(y_, x_, w_) {return caml_array_set(y_, x_, w_);}

function e_(v_, u_) {return caml_array_get(v_, u_);}

var f_ = [
  0,
  function(t_) {return t_.length - 1;},
  e_,
  d_,
  make,
  c_,
  init,
  append,
  concat,
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
  mem_ieee,
  sort,
  stable_sort,
  stable_sort,
  to_seq,
  to_seqi,
  of_seq,
  map_to_array,
  map_from_array
];

function g_(s_) {return caml_floatarray_create(s_);}

function h_(r_, q_, p_) {return caml_array_set(r_, q_, p_);}

function i_(o_, n_) {return caml_array_get(o_, n_);}

var j_ = [
  0,
  function(m_) {return m_.length - 1;},
  i_,
  h_,
  make,
  g_,
  init,
  append,
  concat,
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
  mem_ieee,
  sort,
  stable_sort,
  stable_sort,
  to_seq,
  to_seqi,
  of_seq,
  map_to_array,
  map_from_array
];
var Stdlib_float = [
  0,
  zero,
  one,
  minus_one,
  succ,
  pred,
  infinity,
  neg_infinity,
  nan,
  pi,
  max_float,
  min_float,
  epsilon,
  is_finite,
  is_infinite,
  is_nan,
  is_integer,
  of_string_opt,
  to_string,
  function(l_, k_) {return caml_float_compare(l_, k_);},
  equal,
  min,
  max,
  min_max,
  min_num,
  max_num,
  min_max_num,
  hash,
  j_,
  f_
];

module.exports = Stdlib_float;

/*::type Exports = {
  zero: any,
  one: any,
  minus_one: any,
  succ: (x: any) => any,
  pred: (x: any) => any,
  infinity: any,
  neg_infinity: any,
  nan: any,
  pi: any,
  max_float: any,
  min_float: any,
  epsilon: any,
  is_finite: (x: any) => any,
  is_infinite: (x: any) => any,
  is_nan: (x: any) => any,
  is_integer: (x: any) => any,
  of_string_opt: any,
  to_string: any,
  equal: (x: any, y: any) => any,
  min: (x: any, y: any) => any,
  max: (x: any, y: any) => any,
  min_max: (x: any, y: any) => any,
  min_num: (x: any, y: any) => any,
  max_num: (x: any, y: any) => any,
  min_max_num: (x: any, y: any) => any,
  hash: (x: any) => any,
}*/
/** @type {{
  zero: any,
  one: any,
  minus_one: any,
  succ: (x: any) => any,
  pred: (x: any) => any,
  infinity: any,
  neg_infinity: any,
  nan: any,
  pi: any,
  max_float: any,
  min_float: any,
  epsilon: any,
  is_finite: (x: any) => any,
  is_infinite: (x: any) => any,
  is_nan: (x: any) => any,
  is_integer: (x: any) => any,
  of_string_opt: any,
  to_string: any,
  equal: (x: any, y: any) => any,
  min: (x: any, y: any) => any,
  max: (x: any, y: any) => any,
  min_max: (x: any, y: any) => any,
  min_num: (x: any, y: any) => any,
  max_num: (x: any, y: any) => any,
  min_max_num: (x: any, y: any) => any,
  hash: (x: any) => any,
}} */
module.exports = ((module.exports /*:: : any*/) /*:: :Exports */);
module.exports.zero = module.exports[1];
module.exports.one = module.exports[2];
module.exports.minus_one = module.exports[3];
module.exports.succ = module.exports[4];
module.exports.pred = module.exports[5];
module.exports.infinity = module.exports[6];
module.exports.neg_infinity = module.exports[7];
module.exports.nan = module.exports[8];
module.exports.pi = module.exports[9];
module.exports.max_float = module.exports[10];
module.exports.min_float = module.exports[11];
module.exports.epsilon = module.exports[12];
module.exports.is_finite = module.exports[13];
module.exports.is_infinite = module.exports[14];
module.exports.is_nan = module.exports[15];
module.exports.is_integer = module.exports[16];
module.exports.of_string_opt = module.exports[17];
module.exports.to_string = module.exports[18];
module.exports.equal = module.exports[20];
module.exports.min = module.exports[21];
module.exports.max = module.exports[22];
module.exports.min_max = module.exports[23];
module.exports.min_num = module.exports[24];
module.exports.max_num = module.exports[25];
module.exports.min_max_num = module.exports[26];
module.exports.hash = module.exports[27];

/* Hashing disabled */
