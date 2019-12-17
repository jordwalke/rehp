/**
 * @flow strict
 * Weak
 */

// @ts-check


"use strict";
let joo_global_object = typeof global !== 'undefined' ? global : window;
require('runtime.js');

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
var caml_wrap_thrown_exception = runtime["caml_wrap_thrown_exception"];

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

var cst_Weak_Make_hash_bucket_cannot_grow_more = string(
  "Weak.Make: hash bucket cannot grow more"
);
var cst_Weak_fill = string("Weak.fill");
var Pervasives = require("Pervasives.js");
var Sys = require("Sys.js");
var Array = require("Array_.js");
var Not_found = require("Not_found.js");
var Invalid_argument = require("Invalid_argument.js");

function length(x) {return x.length - 1 - 2 | 0;}

function fill(ar, ofs, len, x) {
  if (0 <= ofs) {
    if (0 <= len) {
      if (! (length(ar) < (ofs + len | 0))) {
        var aC_ = (ofs + len | 0) + -1 | 0;
        if (! (aC_ < ofs)) {
          var i = ofs;
          for (; ; ) {
            caml_weak_set(ar, i, x);
            var aD_ = i + 1 | 0;
            if (aC_ !== i) {var i = aD_;continue;}
            break;
          }
        }
        return 0;
      }
    }
  }
  throw caml_wrap_thrown_exception([0,Invalid_argument,cst_Weak_fill]);
}

function Make(H) {
  function weak_create(aB_) {return caml_weak_create(aB_);}
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
    var az_ = t[1].length - 1 + -1 | 0;
    var ay_ = 0;
    if (! (az_ < 0)) {
      var i = ay_;
      for (; ; ) {
        caml_check_bound(t[1], i)[i + 1] = emptybucket;
        caml_check_bound(t[2], i)[i + 1] = [0];
        var aA_ = i + 1 | 0;
        if (az_ !== i) {var i = aA_;continue;}
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
    var at_ = t[1];
    var au_ = 0;
    function av_(aw_, ax_) {return fold_bucket(au_, aw_, ax_);}
    return call3(Array[18], av_, at_, init);
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
    var ap_ = t[1];
    var aq_ = 0;
    function ar_(as_) {return iter_bucket(aq_, as_);}
    return call2(Array[13], ar_, ap_);
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
    var ak_ = t[1];
    var al_ = 0;
    function am_(an_, ao_) {return iter_bucket(al_, an_, ao_);}
    return call2(Array[14], am_, ak_);
  }
  function count_bucket(i, b, accu) {
    var i__0 = i;
    var accu__0 = accu;
    for (; ; ) {
      if (length(b) <= i__0) {return accu__0;}
      var aj_ = caml_weak_check(b, i__0) ? 1 : 0;
      var accu__1 = accu__0 + aj_ | 0;
      var i__1 = i__0 + 1 | 0;
      var i__0 = i__1;
      var accu__0 = accu__1;
      continue;
    }
  }
  function count(t) {
    var ad_ = 0;
    var ae_ = t[1];
    var af_ = 0;
    function ag_(ah_, ai_) {return count_bucket(af_, ah_, ai_);}
    return call3(Array[18], ag_, ae_, ad_);
  }
  function next_sz(n) {
    return call2(Pervasives[4], ((3 * n | 0) / 2 | 0) + 3 | 0, Sys[14]);
  }
  function prev_sz(n) {return (((n + -3 | 0) * 2 | 0) + 2 | 0) / 3 | 0;}
  function test_shrink_bucket(t) {
    var V_ = t[5];
    var bucket = caml_check_bound(t[1], V_)[V_ + 1];
    var W_ = t[5];
    var hbucket = caml_check_bound(t[2], W_)[W_ + 1];
    var len = length(bucket);
    var prev_len = prev_sz(len);
    var live = count_bucket(0, bucket, 0);
    if (live <= prev_len) {
      var loop = function(i, j) {
        var i__0 = i;
        var j__0 = j;
        for (; ; ) {
          var ab_ = prev_len <= j__0 ? 1 : 0;
          if (ab_) {
            if (caml_weak_check(bucket, i__0)) {
              var i__1 = i__0 + 1 | 0;
              var i__0 = i__1;
              continue;
            }
            if (caml_weak_check(bucket, j__0)) {
              caml_weak_blit(bucket, j__0, bucket, i__0, 1);
              var ac_ = caml_check_bound(hbucket, j__0)[j__0 + 1];
              caml_check_bound(hbucket, i__0)[i__0 + 1] = ac_;
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
          return ab_;
        }
      };
      loop(0, length(bucket) + -1 | 0);
      if (0 === prev_len) {
        var X_ = t[5];
        caml_check_bound(t[1], X_)[X_ + 1] = emptybucket;
        var Y_ = t[5];
        caml_check_bound(t[2], Y_)[Y_ + 1] = [0];
      }
      else {
        caml_obj_truncate(bucket, prev_len + 2 | 0);
        caml_obj_truncate(hbucket, prev_len);
      }
      var Z_ = t[3] < len ? 1 : 0;
      var aa_ = Z_ ? prev_len <= t[3] ? 1 : 0 : Z_;
      if (aa_) {t[4] = t[4] + -1 | 0;}
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
          var R_ = sz <= t[3] ? 1 : 0;
          var S_ = R_ ? t[3] < newsz ? 1 : 0 : R_;
          if (S_) {
            t[4] = t[4] + 1 | 0;
            var i__1 = 0;
            for (; ; ) {
              test_shrink_bucket(t);
              var U_ = i__1 + 1 | 0;
              if (2 !== i__1) {var i__1 = U_;continue;}
              break;
            }
          }
          var T_ = ((t[1].length - 1) / 2 | 0) < t[4] ? 1 : 0;
          return T_ ? resize(t) : T_;
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
    var M_ = get_index(t, h);
    var N_ = [0,d];
    return add_aux(
      t,
      function(Q_, P_, O_) {return caml_weak_set(Q_, P_, O_);},
      N_,
      h,
      M_
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
        var I_ = [0,d];
        add_aux(
          t,
          function(L_, K_, J_) {return caml_weak_set(L_, K_, J_);},
          I_,
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
      function(h, index) {throw caml_wrap_thrown_exception(Not_found);}
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
    var H_ = 0;
    return find_shadow(
      t,
      d,
      function(w, i) {return caml_weak_set(w, i, 0);},
      H_
    );
  }
  function mem(t, d) {
    var G_ = 0;
    return find_shadow(t, d, function(w, i) {return 1;}, G_);
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
    function u_(F_, E_) {return runtime["caml_int_compare"](F_, E_);}
    call2(Array[25], u_, lens);
    var v_ = 0;
    function w_(D_, C_) {return D_ + C_ | 0;}
    var totlen = call3(Array[17], w_, v_, lens);
    var x_ = len + -1 | 0;
    var z_ = len / 2 | 0;
    var y_ = caml_check_bound(lens, x_)[x_ + 1];
    var A_ = caml_check_bound(lens, z_)[z_ + 1];
    var B_ = caml_check_bound(lens, 0)[1];
    return [0,len,count(t),totlen,B_,A_,y_];
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

function a_(t_, s_, r_, q_, p_) {return caml_weak_blit(t_, s_, r_, q_, p_);}

function b_(o_, n_) {return caml_weak_check(o_, n_);}

function c_(m_, l_) {return caml_weak_get_copy(m_, l_);}

function d_(k_, j_) {return caml_weak_get(k_, j_);}

function e_(i_, h_, g_) {return caml_weak_set(i_, h_, g_);}

var Weak = [
  0,
  function(f_) {return caml_weak_create(f_);},
  length,
  e_,
  d_,
  c_,
  b_,
  fill,
  a_,
  Make
];

exports = Weak;

/*::type Exports = {
  Make: (H: any) => any,
  fill: (ar: any, ofs: any, len: any, x: any) => any,
  length: (x: any) => any,
}*/
/** @type {{
  Make: (any) => any,
  fill: (any, any, any, any) => any,
  length: (any) => any,
}} */
module.exports = ((exports /*:: : any*/) /*:: :Exports */);
module.exports.Make = module.exports[9];
module.exports.fill = module.exports[7];
module.exports.length = module.exports[2];

/* Hashing disabled */
