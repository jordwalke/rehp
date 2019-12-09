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
var string = runtime["caml_new_string"];
var caml_wrap_exception = runtime["caml_wrap_exception"];

function call1(f, a0) {
  return f.length === 1 ? f(a0) : runtime["caml_call_gen"](f, [a0]);
}

function call2(f, a0, a1) {
  return f.length === 2 ? f(a0, a1) : runtime["caml_call_gen"](f, [a0,a1]);
}

var global_data = runtime["caml_get_global_data"]();
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
var cst_Array_Bottom = string("Array.Bottom");
var Assert_failure = global_data["Assert_failure"];
var Pervasives = global_data["Pervasives"];
var a_ = [0,string("array.ml"),233,4];

function make_float(aj_) {return runtime["caml_make_float_vect"](aj_);}

var Floatarray = [0];

function init(l, f) {
  if (0 === l) {return [0];}
  if (0 <= l) {
    var res = caml_make_vect(l, call1(f, 0));
    var ah_ = l + -1 | 0;
    var ag_ = 1;
    if (! (ah_ < 1)) {
      var i = ag_;
      for (; ; ) {
        res[i + 1] = call1(f, i);
        var ai_ = i + 1 | 0;
        if (ah_ !== i) {var i = ai_;continue;}
        break;
      }
    }
    return res;
  }
  return call1(Pervasives[1], cst_Array_init);
}

function make_matrix(sx, sy, init) {
  var res = caml_make_vect(sx, [0]);
  var ae_ = sx + -1 | 0;
  var ad_ = 0;
  if (! (ae_ < 0)) {
    var x = ad_;
    for (; ; ) {
      res[x + 1] = caml_make_vect(sy, init);
      var af_ = x + 1 | 0;
      if (ae_ !== x) {var x = af_;continue;}
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
  return call1(Pervasives[1], cst_Array_sub);
}

function fill(a, ofs, len, v) {
  if (0 <= ofs) {
    if (0 <= len) {
      if (! ((a.length - 1 - len | 0) < ofs)) {
        var ab_ = (ofs + len | 0) + -1 | 0;
        if (! (ab_ < ofs)) {
          var i = ofs;
          for (; ; ) {
            a[i + 1] = v;
            var ac_ = i + 1 | 0;
            if (ab_ !== i) {var i = ac_;continue;}
            break;
          }
        }
        return 0;
      }
    }
  }
  return call1(Pervasives[1], cst_Array_fill);
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
  return call1(Pervasives[1], cst_Array_blit);
}

function iter(f, a) {
  var Z_ = a.length - 1 + -1 | 0;
  var Y_ = 0;
  if (! (Z_ < 0)) {
    var i = Y_;
    for (; ; ) {
      call1(f, a[i + 1]);
      var aa_ = i + 1 | 0;
      if (Z_ !== i) {var i = aa_;continue;}
      break;
    }
  }
  return 0;
}

function iter2(f, a, b) {
  if (a.length - 1 !== b.length - 1) {
    return call1(
      Pervasives[1],
      cst_Array_iter2_arrays_must_have_the_same_length
    );
  }
  var W_ = a.length - 1 + -1 | 0;
  var V_ = 0;
  if (! (W_ < 0)) {
    var i = V_;
    for (; ; ) {
      call2(f, a[i + 1], b[i + 1]);
      var X_ = i + 1 | 0;
      if (W_ !== i) {var i = X_;continue;}
      break;
    }
  }
  return 0;
}

function map(f, a) {
  var l = a.length - 1;
  if (0 === l) {return [0];}
  var r = caml_make_vect(l, call1(f, a[1]));
  var T_ = l + -1 | 0;
  var S_ = 1;
  if (! (T_ < 1)) {
    var i = S_;
    for (; ; ) {
      r[i + 1] = call1(f, a[i + 1]);
      var U_ = i + 1 | 0;
      if (T_ !== i) {var i = U_;continue;}
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
      Pervasives[1],
      cst_Array_map2_arrays_must_have_the_same_length
    );
  }
  if (0 === la) {return [0];}
  var r = caml_make_vect(la, call2(f, a[1], b[1]));
  var Q_ = la + -1 | 0;
  var P_ = 1;
  if (! (Q_ < 1)) {
    var i = P_;
    for (; ; ) {
      r[i + 1] = call2(f, a[i + 1], b[i + 1]);
      var R_ = i + 1 | 0;
      if (Q_ !== i) {var i = R_;continue;}
      break;
    }
  }
  return r;
}

function iteri(f, a) {
  var N_ = a.length - 1 + -1 | 0;
  var M_ = 0;
  if (! (N_ < 0)) {
    var i = M_;
    for (; ; ) {
      call2(f, i, a[i + 1]);
      var O_ = i + 1 | 0;
      if (N_ !== i) {var i = O_;continue;}
      break;
    }
  }
  return 0;
}

function mapi(f, a) {
  var l = a.length - 1;
  if (0 === l) {return [0];}
  var r = caml_make_vect(l, call2(f, 0, a[1]));
  var K_ = l + -1 | 0;
  var J_ = 1;
  if (! (K_ < 1)) {
    var i = J_;
    for (; ; ) {
      r[i + 1] = call2(f, i, a[i + 1]);
      var L_ = i + 1 | 0;
      if (K_ !== i) {var i = L_;continue;}
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
  var H_ = a.length - 1 + -1 | 0;
  var G_ = 0;
  if (! (H_ < 0)) {
    var i = G_;
    for (; ; ) {
      r[1] = call2(f, r[1], a[i + 1]);
      var I_ = i + 1 | 0;
      if (H_ !== i) {var i = I_;continue;}
      break;
    }
  }
  return r[1];
}

function fold_right(f, a, x) {
  var r = [0,x];
  var E_ = a.length - 1 + -1 | 0;
  if (! (E_ < 0)) {
    var i = E_;
    for (; ; ) {
      r[1] = call2(f, a[i + 1], r[1]);
      var F_ = i + -1 | 0;
      if (0 !== i) {var i = F_;continue;}
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

var Bottom = [248,cst_Array_Bottom,runtime["caml_fresh_oo_id"](0)];

function sort(cmp, a) {
  function maxson(l, i) {
    var i31 = ((i + i | 0) + i | 0) + 1 | 0;
    var x = [0,i31];
    if ((i31 + 2 | 0) < l) {
      var x_ = i31 + 1 | 0;
      var y_ = caml_check_bound(a, x_)[x_ + 1];
      if (call2(cmp, caml_check_bound(a, i31)[i31 + 1], y_) < 0) {x[1] = i31 + 1 | 0;}
      var z_ = i31 + 2 | 0;
      var A_ = caml_check_bound(a, z_)[z_ + 1];
      var B_ = x[1];
      if (call2(cmp, caml_check_bound(a, B_)[B_ + 1], A_) < 0) {x[1] = i31 + 2 | 0;}
      return x[1];
    }
    if ((i31 + 1 | 0) < l) {
      var C_ = i31 + 1 | 0;
      var D_ = caml_check_bound(a, C_)[C_ + 1];
      if (! (0 <= call2(cmp, caml_check_bound(a, i31)[i31 + 1], D_))) {return i31 + 1 | 0;}
    }
    if (i31 < l) {return i31;}
    throw runtime["caml_wrap_thrown_exception"]([0,Bottom,i]);
  }
  function trickledown(l, i, e) {
    var i__0 = i;
    for (; ; ) {
      var j = maxson(l, i__0);
      if (0 < call2(cmp, caml_check_bound(a, j)[j + 1], e)) {
        var w_ = caml_check_bound(a, j)[j + 1];
        caml_check_bound(a, i__0)[i__0 + 1] = w_;
        var i__0 = j;
        continue;
      }
      caml_check_bound(a, i__0)[i__0 + 1] = e;
      return 0;
    }
  }
  function trickle(l, i, e) {
    try {var v_ = trickledown(l, i, e);return v_;}
    catch(exn) {
      exn = caml_wrap_exception(exn);
      if (exn[1] === Bottom) {
        var i__0 = exn[2];
        caml_check_bound(a, i__0)[i__0 + 1] = e;
        return 0;
      }
      throw runtime["caml_wrap_thrown_exception_reraise"](exn);
    }
  }
  function bubbledown(l, i) {
    var i__0 = i;
    for (; ; ) {
      var i__1 = maxson(l, i__0);
      var u_ = caml_check_bound(a, i__1)[i__1 + 1];
      caml_check_bound(a, i__0)[i__0 + 1] = u_;
      var i__0 = i__1;
      continue;
    }
  }
  function bubble(l, i) {
    try {var t_ = bubbledown(l, i);return t_;}
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
        if (0 <= call2(cmp, caml_check_bound(a, father)[father + 1], e)) {caml_check_bound(a, i__0)[i__0 + 1] = e;return 0;}
        var s_ = caml_check_bound(a, father)[father + 1];
        caml_check_bound(a, i__0)[i__0 + 1] = s_;
        if (0 < father) {var i__0 = father;continue;}
        caml_check_bound(a, 0)[1] = e;
        return 0;
      }
      throw runtime["caml_wrap_thrown_exception"]([0,Assert_failure,a_]);
    }
  }
  var l = a.length - 1;
  var m_ = ((l + 1 | 0) / 3 | 0) + -1 | 0;
  if (! (m_ < 0)) {
    var i__0 = m_;
    for (; ; ) {
      trickle(l, i__0, caml_check_bound(a, i__0)[i__0 + 1]);
      var r_ = i__0 + -1 | 0;
      if (0 !== i__0) {var i__0 = r_;continue;}
      break;
    }
  }
  var n_ = l + -1 | 0;
  if (! (n_ < 2)) {
    var i = n_;
    for (; ; ) {
      var e__0 = caml_check_bound(a, i)[i + 1];
      a[i + 1] = caml_check_bound(a, 0)[1];
      trickleup(bubble(i, 0), e__0);
      var q_ = i + -1 | 0;
      if (2 !== i) {var i = q_;continue;}
      break;
    }
  }
  var o_ = 1 < l ? 1 : 0;
  if (o_) {
    var e = caml_check_bound(a, 1)[2];
    a[2] = caml_check_bound(a, 0)[1];
    a[1] = e;
    var p_ = 0;
  }
  else var p_ = o_;
  return p_;
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
    var l_ = caml_check_bound(src2, src2ofs)[src2ofs + 1];
    return loop(
      src1ofs,
      caml_check_bound(a, src1ofs)[src1ofs + 1],
      src2ofs,
      l_,
      dstofs
    );
  }
  function isortto(srcofs, dst, dstofs, len) {
    var d_ = len + -1 | 0;
    var c_ = 0;
    if (! (d_ < 0)) {
      var i = c_;
      a:
      for (; ; ) {
        var e_ = srcofs + i | 0;
        var e = caml_check_bound(a, e_)[e_ + 1];
        var j = [0,(dstofs + i | 0) + -1 | 0];
        for (; ; ) {
          if (dstofs <= j[1]) {
            var f_ = j[1];
            if (0 < call2(cmp, caml_check_bound(dst, f_)[f_ + 1], e)) {
              var g_ = j[1];
              var h_ = caml_check_bound(dst, g_)[g_ + 1];
              var i_ = j[1] + 1 | 0;
              caml_check_bound(dst, i_)[i_ + 1] = h_;
              j[1] += -1;
              continue;
            }
          }
          var j_ = j[1] + 1 | 0;
          caml_check_bound(dst, j_)[j_ + 1] = e;
          var k_ = i + 1 | 0;
          if (d_ !== i) {var i = k_;continue a;}
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
  Floatarray
];

runtime["caml_register_global"](10, Array, "Array_");


module.exports = global.jsoo_runtime.caml_get_global_data().Array_;
/*____hashes compiler:hashing-disabled inputs:hashing-disabled bytecode:hashing-disabled*/
