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
var string = runtime["caml_new_string"];
var caml_obj_truncate = runtime["caml_obj_truncate"];
var caml_weak_blit = runtime["caml_weak_blit"];
var caml_weak_check = runtime["caml_weak_check"];
var caml_weak_create = runtime["caml_weak_create"];
var caml_weak_get = runtime["caml_weak_get"];
var caml_weak_get_copy = runtime["caml_weak_get_copy"];
var caml_weak_set = runtime["caml_weak_set"];

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

function call5(f, a0, a1, a2, a3, a4) {
  return f.length === 5 ?
    f(a0, a1, a2, a3, a4) :
    runtime["caml_call_gen"](f, [a0,a1,a2,a3,a4]);
}

var global_data = runtime["caml_get_global_data"]();
var cst_Weak_Make_hash_bucket_cannot_grow_more = string(
  "Weak.Make: hash bucket cannot grow more"
);
var cst_Weak_fill = string("Weak.fill");
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
        var aC = (ofs + len | 0) + -1 | 0;
        if (! (aC < ofs)) {
          var i = ofs;
          for (; ; ) {
            caml_weak_set(ar, i, x);
            var aD = i + 1 | 0;
            if (aC !== i) {var i = aD;continue;}
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
  function weak_create(aB) {return caml_weak_create(aB);}
  var emptybucket = weak_create(0);
  function get_index(t, h) {
    return caml_mod(h & Pervasives[7], t[1].length - 1);
  }
  var limit = 7;
  function create(sz) {
    var sz__0 = 7 <= sz ? sz : 7;
    var sz__1 = Sys[14] < sz__0 ? Sys[14] : sz__0;
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
    var az = t[1].length - 1 + -1 | 0;
    var ay = 0;
    if (! (az < 0)) {
      var i = ay;
      for (; ; ) {
        caml_check_bound(t[1], i)[i + 1] = emptybucket;
        caml_check_bound(t[2], i)[i + 1] = [0];
        var aA = i + 1 | 0;
        if (az !== i) {var i = aA;continue;}
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
          var accu__1 = call2(f, v, accu__0);
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
    var at = t[1];
    var au = 0;
    function av(aw, ax) {return fold_bucket(au, aw, ax);}
    return call3(Array[18], av, at, init);
  }
  function iter(f, t) {
    function iter_bucket(i, b) {
      var i__0 = i;
      for (; ; ) {
        if (length(b) <= i__0) {return 0;}
        var match = caml_weak_get(b, i__0);
        if (match) {
          var v = match[1];
          call1(f, v);
          var i__1 = i__0 + 1 | 0;
          var i__0 = i__1;
          continue;
        }
        var i__2 = i__0 + 1 | 0;
        var i__0 = i__2;
        continue;
      }
    }
    var ap = t[1];
    var aq = 0;
    function ar(as) {return iter_bucket(aq, as);}
    return call2(Array[13], ar, ap);
  }
  function iter_weak(f, t) {
    function iter_bucket(i, j, b) {
      var i__0 = i;
      for (; ; ) {
        if (length(b) <= i__0) {return 0;}
        var match = caml_weak_check(b, i__0);
        if (0 === match) {var i__1 = i__0 + 1 | 0;var i__0 = i__1;continue;}
        call3(f, b, caml_check_bound(t[2], j)[j + 1], i__0);
        var i__2 = i__0 + 1 | 0;
        var i__0 = i__2;
        continue;
      }
    }
    var ak = t[1];
    var al = 0;
    function am(an, ao) {return iter_bucket(al, an, ao);}
    return call2(Array[14], am, ak);
  }
  function count_bucket(i, b, accu) {
    var i__0 = i;
    var accu__0 = accu;
    for (; ; ) {
      if (length(b) <= i__0) {return accu__0;}
      var aj = caml_weak_check(b, i__0) ? 1 : 0;
      var accu__1 = accu__0 + aj | 0;
      var i__1 = i__0 + 1 | 0;
      var i__0 = i__1;
      var accu__0 = accu__1;
      continue;
    }
  }
  function count(t) {
    var ad = 0;
    var ae = t[1];
    var af = 0;
    function ag(ah, ai) {return count_bucket(af, ah, ai);}
    return call3(Array[18], ag, ae, ad);
  }
  function next_sz(n) {
    return call2(Pervasives[4], ((3 * n | 0) / 2 | 0) + 3 | 0, Sys[14]);
  }
  function prev_sz(n) {return (((n + -3 | 0) * 2 | 0) + 2 | 0) / 3 | 0;}
  function test_shrink_bucket(t) {
    var V = t[5];
    var bucket = caml_check_bound(t[1], V)[V + 1];
    var W = t[5];
    var hbucket = caml_check_bound(t[2], W)[W + 1];
    var len = length(bucket);
    var prev_len = prev_sz(len);
    var live = count_bucket(0, bucket, 0);
    if (live <= prev_len) {
      var loop = function(i, j) {
        var i__0 = i;
        var j__0 = j;
        for (; ; ) {
          var ab = prev_len <= j__0 ? 1 : 0;
          if (ab) {
            if (caml_weak_check(bucket, i__0)) {
              var i__1 = i__0 + 1 | 0;
              var i__0 = i__1;
              continue;
            }
            if (caml_weak_check(bucket, j__0)) {
              caml_weak_blit(bucket, j__0, bucket, i__0, 1);
              var ac = caml_check_bound(hbucket, j__0)[j__0 + 1];
              caml_check_bound(hbucket, i__0)[i__0 + 1] = ac;
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
          return ab;
        }
      };
      loop(0, length(bucket) + -1 | 0);
      if (0 === prev_len) {
        var X = t[5];
        caml_check_bound(t[1], X)[X + 1] = emptybucket;
        var Y = t[5];
        caml_check_bound(t[2], Y)[Y + 1] = [0];
      }
      else {
        caml_obj_truncate(bucket, prev_len + 2 | 0);
        caml_obj_truncate(hbucket, prev_len);
      }
      var Z = t[3] < len ? 1 : 0;
      var aa = Z ? prev_len <= t[3] ? 1 : 0 : Z;
      if (aa) {t[4] = t[4] + -1 | 0;}
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
          var newsz = call2(
            Pervasives[4],
            ((3 * sz | 0) / 2 | 0) + 3 | 0,
            Sys[14] - 2 | 0
          );
          if (newsz <= sz) {
            call1(Pervasives[2], cst_Weak_Make_hash_bucket_cannot_grow_more);
          }
          var newbucket = weak_create(newsz);
          var newhashes = caml_make_vect(newsz, 0);
          caml_weak_blit(bucket, 0, newbucket, 0, sz);
          call5(Array[10], hashes, 0, newhashes, 0, sz);
          call3(setter, newbucket, sz, d);
          caml_check_bound(newhashes, sz)[sz + 1] = h;
          caml_check_bound(t[1], index)[index + 1] = newbucket;
          caml_check_bound(t[2], index)[index + 1] = newhashes;
          var R = sz <= t[3] ? 1 : 0;
          var S = R ? t[3] < newsz ? 1 : 0 : R;
          if (S) {
            t[4] = t[4] + 1 | 0;
            var i__1 = 0;
            for (; ; ) {
              test_shrink_bucket(t);
              var U = i__1 + 1 | 0;
              if (2 !== i__1) {var i__1 = U;continue;}
              break;
            }
          }
          var T = ((t[1].length - 1) / 2 | 0) < t[4] ? 1 : 0;
          return T ? resize(t) : T;
        }
        if (caml_weak_check(bucket, i__0)) {
          var i__2 = i__0 + 1 | 0;
          var i__0 = i__2;
          continue;
        }
        call3(setter, bucket, i__0, d);
        caml_check_bound(hashes, i__0)[i__0 + 1] = h;
        return 0;
      }
    }
    return loop(0);
  }
  function add(t, d) {
    var h = call1(H[2], d);
    var M = get_index(t, h);
    var N = [0,d];
    return add_aux(
      t,
      function(Q, P, O) {return caml_weak_set(Q, P, O);},
      N,
      h,
      M
    );
  }
  function find_or(t, d, ifnotfound) {
    var h = call1(H[2], d);
    var index = get_index(t, h);
    var bucket = caml_check_bound(t[1], index)[index + 1];
    var hashes = caml_check_bound(t[2], index)[index + 1];
    var sz = length(bucket);
    function loop(i) {
      var i__0 = i;
      for (; ; ) {
        if (sz <= i__0) {return call2(ifnotfound, h, index);}
        if (h === caml_check_bound(hashes, i__0)[i__0 + 1]) {
          var match = caml_weak_get_copy(bucket, i__0);
          if (match) {
            var v = match[1];
            if (call2(H[1], v, d)) {
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
        var I = [0,d];
        add_aux(
          t,
          function(L, K, J) {return caml_weak_set(L, K, J);},
          I,
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
    var h = call1(H[2], d);
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
            if (call2(H[1], v, d)) {
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
    var h = call1(H[2], d);
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
            if (call2(H[1], v, d)) {return call2(iffound, bucket, i__0);}
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
    var H = 0;
    return find_shadow(
      t,
      d,
      function(w, i) {return caml_weak_set(w, i, 0);},
      H
    );
  }
  function mem(t, d) {
    var G = 0;
    return find_shadow(t, d, function(w, i) {return 1;}, G);
  }
  function find_all(t, d) {
    var h = call1(H[2], d);
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
            if (call2(H[1], v, d)) {
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
    var lens = call2(Array[15], length, t[1]);
    function u(F, E) {return runtime["caml_int_compare"](F, E);}
    call2(Array[25], u, lens);
    var v = 0;
    function w(D, C) {return D + C | 0;}
    var totlen = call3(Array[17], w, v, lens);
    var x = len + -1 | 0;
    var z = len / 2 | 0;
    var y = caml_check_bound(lens, x)[x + 1];
    var A = caml_check_bound(lens, z)[z + 1];
    var B = caml_check_bound(lens, 0)[1];
    return [0,len,count(t),totlen,B,A,y];
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

function a(t, s, r, q, p) {return caml_weak_blit(t, s, r, q, p);}

function b(o, n) {return caml_weak_check(o, n);}

function c(m, l) {return caml_weak_get_copy(m, l);}

function d(k, j) {return caml_weak_get(k, j);}

function e(i, h, g) {return caml_weak_set(i, h, g);}

var Weak = [
  0,
  function(f) {return caml_weak_create(f);},
  length,
  e,
  d,
  c,
  b,
  fill,
  a,
  Make
];

runtime["caml_register_global"](7, Weak, "Weak");


module.exports = global.jsoo_runtime.caml_get_global_data().Weak;