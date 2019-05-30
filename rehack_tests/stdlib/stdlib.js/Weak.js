/**
 * Weak
 * @providesModule Weak
 */
"use strict";
var Array_ = require('Array_.js');
var Obj = require('Obj.js');
var Pervasives = require('Pervasives.js');
var Sys = require('Sys.js');
var Invalid_argument = require('Invalid_argument.js');
var Not_found = require('Not_found.js');
var runtime = require('runtime.js');

let joo_global_object = global;


var runtime = joo_global_object.jsoo_runtime;
var caml_check_bound = runtime["caml_check_bound"];
var caml_make_vect = runtime["caml_make_vect"];
var caml_mod = runtime["caml_mod"];
var caml_new_string = runtime["caml_new_string"];
var caml_obj_truncate = runtime["caml_obj_truncate"];
var caml_weak_blit = runtime["caml_weak_blit"];
var caml_weak_check = runtime["caml_weak_check"];
var caml_weak_create = runtime["caml_weak_create"];
var caml_weak_get = runtime["caml_weak_get"];
var caml_weak_get_copy = runtime["caml_weak_get_copy"];
var caml_weak_set = runtime["caml_weak_set"];

function caml_call1(f, a0) {
  return f.length === 1 ? f(a0) : runtime["caml_call_gen"](f, [a0]);
}

function caml_call2(f, a0, a1) {
  return f.length === 2 ? f(a0, a1) : runtime["caml_call_gen"](f, [a0,a1]);
}

function caml_call3(f, a0, a1, a2) {
  return f.length === 3 ?
    f(a0, a1, a2) :
    runtime["caml_call_gen"](f, [a0,a1,a2]);
}

function caml_call5(f, a0, a1, a2, a3, a4) {
  return f.length === 5 ?
    f(a0, a1, a2, a3, a4) :
    runtime["caml_call_gen"](f, [a0,a1,a2,a3,a4]);
}

var global_data = runtime["caml_get_global_data"]();
var cst_Weak_Make_hash_bucket_cannot_grow_more = caml_new_string(
  "Weak.Make: hash bucket cannot grow more"
);
var cst_Weak_fill = caml_new_string("Weak.fill");
var Pervasives = global_data["Pervasives"];
var Sys = global_data["Sys"];
var Array = global_data["Array_"];
var Not_found = global_data["Not_found"];
var Invalid_argument = global_data["Invalid_argument"];

function length(x) {return x.length - 1 - 2 | 0;}

function fill(ar, ofs, len, x) {
  if (0 <= ofs) {
    if (0 <= len) {
      if (! (length(ar) < (ofs + len | 0))) {
        var sE = (ofs + len | 0) + -1 | 0;
        if (! (sE < ofs)) {
          var i = ofs;
          for (; ; ) {
            caml_weak_set(ar, i, x);
            var sF = i + 1 | 0;
            if (sE !== i) {var i = sF;continue;}
            break;
          }
        }
        return 0;
      }
    }
  }
  throw runtime["caml_wrap_thrown_exception"]([0,Invalid_argument,cst_Weak_fill]
        );
}

function Make(H) {
  function weak_create(sD) {return caml_weak_create(sD);}
  var emptybucket = weak_create(0);
  function get_index(t, h) {
    return caml_mod(h & Pervasives[7], t[1].length - 1);
  }
  var limit = 7;
  function create(sz) {
    if (7 <= sz) var sz__0 = sz;
    else var sz__0 = 7;
    if (Sys[14] < sz__0) var sz__1 = Sys[14];
    else var sz__1 = sz__0;
    return [
      0,
      caml_make_vect(sz__1, emptybucket),
      caml_make_vect(sz__1, [0]),
      limit,
      0,
      0
    ];
  }
  function clear(t) {
    var sB = t[1].length - 1 + -1 | 0;
    var sA = 0;
    if (! (sB < 0)) {
      var i = sA;
      for (; ; ) {
        caml_check_bound(t[1], i)[i + 1] = emptybucket;
        caml_check_bound(t[2], i)[i + 1] = [0];
        var sC = i + 1 | 0;
        if (sB !== i) {var i = sC;continue;}
        break;
      }
    }
    t[3] = limit;
    t[4] = 0;
    return 0;
  }
  function fold(f, t, init) {
    function fold_bucket(i, b, accu) {
      var i__0 = i;
      var accu__0 = accu;
      for (; ; ) {
        if (length(b) <= i__0) {return accu__0;}
        var match = caml_weak_get(b, i__0);
        if (match) {
          var v = match[1];
          var accu__1 = caml_call2(f, v, accu__0);
          var i__1 = i__0 + 1 | 0;
          var i__0 = i__1;
          var accu__0 = accu__1;
          continue;
        }
        var i__2 = i__0 + 1 | 0;
        var i__0 = i__2;
        continue;
      }
    }
    var sv = t[1];
    var sw = 0;
    function sx(sy, sz) {return fold_bucket(sw, sy, sz);}
    return caml_call3(Array[18], sx, sv, init);
  }
  function iter(f, t) {
    function iter_bucket(i, b) {
      var i__0 = i;
      for (; ; ) {
        if (length(b) <= i__0) {return 0;}
        var match = caml_weak_get(b, i__0);
        if (match) {
          var v = match[1];
          caml_call1(f, v);
          var i__1 = i__0 + 1 | 0;
          var i__0 = i__1;
          continue;
        }
        var i__2 = i__0 + 1 | 0;
        var i__0 = i__2;
        continue;
      }
    }
    var sr = t[1];
    var ss = 0;
    function st(su) {return iter_bucket(ss, su);}
    return caml_call2(Array[13], st, sr);
  }
  function iter_weak(f, t) {
    function iter_bucket(i, j, b) {
      var i__0 = i;
      for (; ; ) {
        if (length(b) <= i__0) {return 0;}
        var match = caml_weak_check(b, i__0);
        if (0 === match) {var i__1 = i__0 + 1 | 0;var i__0 = i__1;continue;}
        caml_call3(f, b, caml_check_bound(t[2], j)[j + 1], i__0);
        var i__2 = i__0 + 1 | 0;
        var i__0 = i__2;
        continue;
      }
    }
    var sm = t[1];
    var sn = 0;
    function so(sp, sq) {return iter_bucket(sn, sp, sq);}
    return caml_call2(Array[14], so, sm);
  }
  function count_bucket(i, b, accu) {
    var i__0 = i;
    var accu__0 = accu;
    for (; ; ) {
      if (length(b) <= i__0) {return accu__0;}
      if (caml_weak_check(b, i__0)) var sl = 1;
      else var sl = 0;
      var accu__1 = accu__0 + sl | 0;
      var i__1 = i__0 + 1 | 0;
      var i__0 = i__1;
      var accu__0 = accu__1;
      continue;
    }
  }
  function count(t) {
    var sf = 0;
    var sg = t[1];
    var sh = 0;
    function si(sj, sk) {return count_bucket(sh, sj, sk);}
    return caml_call3(Array[18], si, sg, sf);
  }
  function next_sz(n) {
    return caml_call2(Pervasives[4], ((3 * n | 0) / 2 | 0) + 3 | 0, Sys[14]);
  }
  function prev_sz(n) {return (((n + -3 | 0) * 2 | 0) + 2 | 0) / 3 | 0;}
  function test_shrink_bucket(t) {
    var r8 = t[5];
    var bucket = caml_check_bound(t[1], r8)[r8 + 1];
    var r9 = t[5];
    var hbucket = caml_check_bound(t[2], r9)[r9 + 1];
    var len = length(bucket);
    var prev_len = prev_sz(len);
    var live = count_bucket(0, bucket, 0);
    if (live <= prev_len) {
      var loop = function(i, j) {
        var i__0 = i;
        var j__0 = j;
        for (; ; ) {
          var sd = prev_len <= j__0 ? 1 : 0;
          if (sd) {
            if (caml_weak_check(bucket, i__0)) {
              var i__1 = i__0 + 1 | 0;
              var i__0 = i__1;
              continue;
            }
            if (caml_weak_check(bucket, j__0)) {
              caml_weak_blit(bucket, j__0, bucket, i__0, 1);
              var se = caml_check_bound(hbucket, j__0)[j__0 + 1];
              caml_check_bound(hbucket, i__0)[i__0 + 1] = se;
              var j__1 = j__0 + -1 | 0;
              var i__2 = i__0 + 1 | 0;
              var i__0 = i__2;
              var j__0 = j__1;
              continue;
            }
            var j__2 = j__0 + -1 | 0;
            var j__0 = j__2;
            continue;
          }
          return sd;
        }
      };
      loop(0, length(bucket) + -1 | 0);
      if (0 === prev_len) {
        var r_ = t[5];
        caml_check_bound(t[1], r_)[r_ + 1] = emptybucket;
        var sa = t[5];
        caml_check_bound(t[2], sa)[sa + 1] = [0];
      }
      else {
        caml_obj_truncate(bucket, prev_len + 2 | 0);
        caml_obj_truncate(hbucket, prev_len);
      }
      var sb = t[3] < len ? 1 : 0;
      if (sb) var sc = prev_len <=
         t[3] ?
        1 :
        0;
      else var sc = sb;
      if (sc) {t[4] = t[4] + -1 | 0;}
    }
    t[5] = caml_mod(t[5] + 1 | 0, t[1].length - 1);
    return 0;
  }
  function resize(t) {
    var oldlen = t[1].length - 1;
    var newlen = next_sz(oldlen);
    if (oldlen < newlen) {
      var newt = create(newlen);
      var add_weak = function(ob, oh, oi) {
        function setter(nb, ni, param) {
          return caml_weak_blit(ob, oi, nb, ni, 1);
        }
        var h = caml_check_bound(oh, oi)[oi + 1];
        return add_aux(newt, setter, 0, h, get_index(newt, h));
      };
      iter_weak(add_weak, t);
      t[1] = newt[1];
      t[2] = newt[2];
      t[3] = newt[3];
      t[4] = newt[4];
      t[5] = caml_mod(t[5], newt[1].length - 1);
      return 0;
    }
    t[3] = Pervasives[7];
    t[4] = 0;
    return 0;
  }
  function add_aux(t, setter, d, h, index) {
    var bucket = caml_check_bound(t[1], index)[index + 1];
    var hashes = caml_check_bound(t[2], index)[index + 1];
    var sz = length(bucket);
    function loop(i) {
      var i__0 = i;
      for (; ; ) {
        if (sz <= i__0) {
          var newsz = caml_call2(
            Pervasives[4],
            ((3 * sz | 0) / 2 | 0) + 3 | 0,
            Sys[14] - 2 | 0
          );
          if (newsz <= sz) {
            caml_call1(
              Pervasives[2],
              cst_Weak_Make_hash_bucket_cannot_grow_more
            );
          }
          var newbucket = weak_create(newsz);
          var newhashes = caml_make_vect(newsz, 0);
          caml_weak_blit(bucket, 0, newbucket, 0, sz);
          caml_call5(Array[10], hashes, 0, newhashes, 0, sz);
          caml_call3(setter, newbucket, sz, d);
          caml_check_bound(newhashes, sz)[sz + 1] = h;
          caml_check_bound(t[1], index)[index + 1] = newbucket;
          caml_check_bound(t[2], index)[index + 1] = newhashes;
          var r4 = sz <= t[3] ? 1 : 0;
          if (r4) var r5 = t
            [3] <
             newsz ?
            1 :
            0;
          else var r5 = r4;
          if (r5) {
            t[4] = t[4] + 1 | 0;
            var i__1 = 0;
            for (; ; ) {
              test_shrink_bucket(t);
              var r7 = i__1 + 1 | 0;
              if (2 !== i__1) {var i__1 = r7;continue;}
              break;
            }
          }
          var r6 = ((t[1].length - 1) / 2 | 0) < t[4] ? 1 : 0;
          return r6 ? resize(t) : r6;
        }
        if (caml_weak_check(bucket, i__0)) {
          var i__2 = i__0 + 1 | 0;
          var i__0 = i__2;
          continue;
        }
        caml_call3(setter, bucket, i__0, d);
        caml_check_bound(hashes, i__0)[i__0 + 1] = h;
        return 0;
      }
    }
    return loop(0);
  }
  function add(t, d) {
    var h = caml_call1(H[2], d);
    var rZ = get_index(t, h);
    var r0 = [0,d];
    return add_aux(
      t,
      function(r3, r2, r1) {return caml_weak_set(r3, r2, r1);},
      r0,
      h,
      rZ
    );
  }
  function find_or(t, d, ifnotfound) {
    var h = caml_call1(H[2], d);
    var index = get_index(t, h);
    var bucket = caml_check_bound(t[1], index)[index + 1];
    var hashes = caml_check_bound(t[2], index)[index + 1];
    var sz = length(bucket);
    function loop(i) {
      var i__0 = i;
      for (; ; ) {
        if (sz <= i__0) {return caml_call2(ifnotfound, h, index);}
        if (h === caml_check_bound(hashes, i__0)[i__0 + 1]) {
          var match = caml_weak_get_copy(bucket, i__0);
          if (match) {
            var v = match[1];
            if (caml_call2(H[1], v, d)) {
              var match__0 = caml_weak_get(bucket, i__0);
              if (match__0) {var v__0 = match__0[1];return v__0;}
              var i__1 = i__0 + 1 | 0;
              var i__0 = i__1;
              continue;
            }
          }
          var i__2 = i__0 + 1 | 0;
          var i__0 = i__2;
          continue;
        }
        var i__3 = i__0 + 1 | 0;
        var i__0 = i__3;
        continue;
      }
    }
    return loop(0);
  }
  function merge(t, d) {
    return find_or(
      t,
      d,
      function(h, index) {
        var rV = [0,d];
        add_aux(
          t,
          function(rY, rX, rW) {return caml_weak_set(rY, rX, rW);},
          rV,
          h,
          index
        );
        return d;
      }
    );
  }
  function find(t, d) {
    return find_or(
      t,
      d,
      function(h, index) {
        throw runtime["caml_wrap_thrown_exception"](Not_found);
      }
    );
  }
  function find_opt(t, d) {
    var h = caml_call1(H[2], d);
    var index = get_index(t, h);
    var bucket = caml_check_bound(t[1], index)[index + 1];
    var hashes = caml_check_bound(t[2], index)[index + 1];
    var sz = length(bucket);
    function loop(i) {
      var i__0 = i;
      for (; ; ) {
        if (sz <= i__0) {return 0;}
        if (h === caml_check_bound(hashes, i__0)[i__0 + 1]) {
          var match = caml_weak_get_copy(bucket, i__0);
          if (match) {
            var v = match[1];
            if (caml_call2(H[1], v, d)) {
              var v__0 = caml_weak_get(bucket, i__0);
              if (v__0) {return v__0;}
              var i__1 = i__0 + 1 | 0;
              var i__0 = i__1;
              continue;
            }
          }
          var i__2 = i__0 + 1 | 0;
          var i__0 = i__2;
          continue;
        }
        var i__3 = i__0 + 1 | 0;
        var i__0 = i__3;
        continue;
      }
    }
    return loop(0);
  }
  function find_shadow(t, d, iffound, ifnotfound) {
    var h = caml_call1(H[2], d);
    var index = get_index(t, h);
    var bucket = caml_check_bound(t[1], index)[index + 1];
    var hashes = caml_check_bound(t[2], index)[index + 1];
    var sz = length(bucket);
    function loop(i) {
      var i__0 = i;
      for (; ; ) {
        if (sz <= i__0) {return ifnotfound;}
        if (h === caml_check_bound(hashes, i__0)[i__0 + 1]) {
          var match = caml_weak_get_copy(bucket, i__0);
          if (match) {
            var v = match[1];
            if (caml_call2(H[1], v, d)) {
              return caml_call2(iffound, bucket, i__0);
            }
          }
          var i__1 = i__0 + 1 | 0;
          var i__0 = i__1;
          continue;
        }
        var i__2 = i__0 + 1 | 0;
        var i__0 = i__2;
        continue;
      }
    }
    return loop(0);
  }
  function remove(t, d) {
    var rU = 0;
    return find_shadow(
      t,
      d,
      function(w, i) {return caml_weak_set(w, i, 0);},
      rU
    );
  }
  function mem(t, d) {
    var rT = 0;
    return find_shadow(t, d, function(w, i) {return 1;}, rT);
  }
  function find_all(t, d) {
    var h = caml_call1(H[2], d);
    var index = get_index(t, h);
    var bucket = caml_check_bound(t[1], index)[index + 1];
    var hashes = caml_check_bound(t[2], index)[index + 1];
    var sz = length(bucket);
    function loop(i, accu) {
      var i__0 = i;
      var accu__0 = accu;
      for (; ; ) {
        if (sz <= i__0) {return accu__0;}
        if (h === caml_check_bound(hashes, i__0)[i__0 + 1]) {
          var match = caml_weak_get_copy(bucket, i__0);
          if (match) {
            var v = match[1];
            if (caml_call2(H[1], v, d)) {
              var match__0 = caml_weak_get(bucket, i__0);
              if (match__0) {
                var v__0 = match__0[1];
                var accu__1 = [0,v__0,accu__0];
                var i__1 = i__0 + 1 | 0;
                var i__0 = i__1;
                var accu__0 = accu__1;
                continue;
              }
              var i__2 = i__0 + 1 | 0;
              var i__0 = i__2;
              continue;
            }
          }
          var i__3 = i__0 + 1 | 0;
          var i__0 = i__3;
          continue;
        }
        var i__4 = i__0 + 1 | 0;
        var i__0 = i__4;
        continue;
      }
    }
    return loop(0, 0);
  }
  function stats(t) {
    var len = t[1].length - 1;
    var lens = caml_call2(Array[15], length, t[1]);
    function rH(rS, rR) {return runtime["caml_int_compare"](rS, rR);}
    caml_call2(Array[25], rH, lens);
    var rI = 0;
    function rJ(rQ, rP) {return rQ + rP | 0;}
    var totlen = caml_call3(Array[17], rJ, rI, lens);
    var rK = len + -1 | 0;
    var rM = len / 2 | 0;
    var rL = caml_check_bound(lens, rK)[rK + 1];
    var rN = caml_check_bound(lens, rM)[rM + 1];
    var rO = caml_check_bound(lens, 0)[1];
    return [0,len,count(t),totlen,rO,rN,rL];
  }
  return [
    0,
    create,
    clear,
    merge,
    add,
    remove,
    find,
    find_opt,
    find_all,
    mem,
    iter,
    fold,
    count,
    stats
  ];
}

function rn(rG, rF, rE, rD, rC) {return caml_weak_blit(rG, rF, rE, rD, rC);}

function ro(rB, rA) {return caml_weak_check(rB, rA);}

function rp(rz, ry) {return caml_weak_get_copy(rz, ry);}

function rq(rx, rw) {return caml_weak_get(rx, rw);}

function rr(rv, ru, rt) {return caml_weak_set(rv, ru, rt);}

var Weak = [
  0,
  function(rs) {return caml_weak_create(rs);},
  length,
  rr,
  rq,
  rp,
  ro,
  fill,
  rn,
  Make
];

runtime["caml_register_global"](7, Weak, "Weak");


module.exports = global.jsoo_runtime.caml_get_global_data().Weak;