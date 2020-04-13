/**
 * @flow strict
 * Stdlib__weak
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

var caml_check_bound = runtime["caml_check_bound"];
var caml_make_vect = runtime["caml_make_vect"];
var caml_mod = runtime["caml_mod"];
var string = runtime["caml_new_string"];
var caml_obj_truncate = runtime["caml_obj_truncate"];
var caml_wrap_thrown_exception = runtime["caml_wrap_thrown_exception"];
var cst_Weak_Make_hash_bucket_cannot_grow_more = string(
  "Weak.Make: hash bucket cannot grow more"
);
var cst_Weak_fill = string("Weak.fill");
var cst_Weak_blit = string("Weak.blit");
var cst_Weak_check = string("Weak.check");
var cst_Weak_get_copy = string("Weak.get_copy");
var cst_Weak_get = string("Weak.get");
var cst_Weak_set = string("Weak.set");
var cst_Weak_create = string("Weak.create");
var Stdlib = require("./Stdlib.js");
var Stdlib_sys = require("./Stdlib__sys.js");
var Stdlib_array = require("./Stdlib__array.js");
var Stdlib_obj = require("./Stdlib__obj.js");

function create(l) {
  var af_ = 0 <= l ? 1 : 0;
  var ag_ = af_ ? l <= Stdlib_obj[27][15] ? 1 : 0 : af_;
  if (1 - ag_) {call1(Stdlib[1], cst_Weak_create);}
  return runtime["caml_weak_create"](l);
}

function length(x) {return x.length - 1 - 2 | 0;}

function raise_if_invalid_offset(e, o, msg) {
  var ac_ = 0 <= o ? 1 : 0;
  var ad_ = ac_ ? o < length(e) ? 1 : 0 : ac_;
  var ae_ = 1 - ad_;
  return ae_ ? call1(Stdlib[1], msg) : ae_;
}

function set(e, o, x) {
  var x__0;
  raise_if_invalid_offset(e, o, cst_Weak_set);
  if (x) {x__0 = x[1];return runtime["caml_ephe_set_key"](e, o, x__0);}
  return runtime["caml_ephe_unset_key"](e, o);
}

function get(e, o) {
  raise_if_invalid_offset(e, o, cst_Weak_get);
  return runtime["caml_weak_get"](e, o);
}

function get_copy(e, o) {
  raise_if_invalid_offset(e, o, cst_Weak_get_copy);
  return runtime["caml_weak_get_copy"](e, o);
}

function check(e, o) {
  raise_if_invalid_offset(e, o, cst_Weak_check);
  return runtime["caml_weak_check"](e, o);
}

function blit(e1, o1, e2, o2, l) {
  var ab_;
  var aa_;
  if (0 <= l) {
    if (0 <= o1) {
      if (! ((length(e1) - l | 0) < o1)) {
        if (0 <= o2) {
          if (! ((length(e2) - l | 0) < o2)) {
            aa_ = 0 !== l ? 1 : 0;
            ab_ = aa_ ? runtime["caml_weak_blit"](e1, o1, e2, o2, l) : aa_;
            return ab_;
          }
        }
      }
    }
  }
  return call1(Stdlib[1], cst_Weak_blit);
}

function fill(ar, ofs, len, x) {
  var Z_;
  var i;
  var Y_;
  if (0 <= ofs) {
    if (0 <= len) {
      if (! ((length(ar) - len | 0) < ofs)) {
        Y_ = (ofs + len | 0) + -1 | 0;
        if (! (Y_ < ofs)) {
          i = ofs;
          for (; ; ) {
            set(ar, i, x);
            Z_ = i + 1 | 0;
            if (Y_ !== i) {i = Z_;continue;}
            break;
          }
        }
        return 0;
      }
    }
  }
  throw caml_wrap_thrown_exception([0,Stdlib[6],cst_Weak_fill]);
}

function Make(H) {
  var emptybucket = create(0);
  function get_index(t, h) {return caml_mod(h & Stdlib[19], t[1].length - 1);}
  var limit = 7;
  function create__0(sz) {
    var sz__0 = 7 <= sz ? sz : 7;
    var sz__1 = Stdlib_sys[14] < sz__0 ? Stdlib_sys[14] : sz__0;
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
    var i;
    var X_;
    var W_ = t[1].length - 1 + -1 | 0;
    var V_ = 0;
    if (! (W_ < 0)) {
      i = V_;
      for (; ; ) {
        caml_check_bound(t[1], i)[i + 1] = emptybucket;
        caml_check_bound(t[2], i)[i + 1] = [0];
        X_ = i + 1 | 0;
        if (W_ !== i) {i = X_;continue;}
        break;
      }
    }
    t[3] = limit;
    t[4] = 0;
    return 0;
  }
  function fold(f, t, init) {
    function fold_bucket(i, b, accu) {
      var match;
      var v;
      var accu__1;
      var i__1;
      var i__2;
      var i__0 = i;
      var accu__0 = accu;
      for (; ; ) {
        if (length(b) <= i__0) {return accu__0;}
        match = get(b, i__0);
        if (match) {
          v = match[1];
          accu__1 = call2(f, v, accu__0);
          i__1 = i__0 + 1 | 0;
          i__0 = i__1;
          accu__0 = accu__1;
          continue;
        }
        i__2 = i__0 + 1 | 0;
        i__0 = i__2;
        continue;
      }
    }
    var Q_ = t[1];
    var R_ = 0;
    function S_(T_, U_) {return fold_bucket(R_, T_, U_);}
    return call3(Stdlib_array[18], S_, Q_, init);
  }
  function iter(f, t) {
    function iter_bucket(i, b) {
      var match;
      var v;
      var i__1;
      var i__2;
      var i__0 = i;
      for (; ; ) {
        if (length(b) <= i__0) {return 0;}
        match = get(b, i__0);
        if (match) {
          v = match[1];
          call1(f, v);
          i__1 = i__0 + 1 | 0;
          i__0 = i__1;
          continue;
        }
        i__2 = i__0 + 1 | 0;
        i__0 = i__2;
        continue;
      }
    }
    var M_ = t[1];
    var N_ = 0;
    function O_(P_) {return iter_bucket(N_, P_);}
    return call2(Stdlib_array[13], O_, M_);
  }
  function iter_weak(f, t) {
    function iter_bucket(i, j, b) {
      var match;
      var i__1;
      var i__2;
      var i__0 = i;
      for (; ; ) {
        if (length(b) <= i__0) {return 0;}
        match = check(b, i__0);
        if (0 === match) {i__1 = i__0 + 1 | 0;i__0 = i__1;continue;}
        call3(f, b, caml_check_bound(t[2], j)[j + 1], i__0);
        i__2 = i__0 + 1 | 0;
        i__0 = i__2;
        continue;
      }
    }
    var H_ = t[1];
    var I_ = 0;
    function J_(K_, L_) {return iter_bucket(I_, K_, L_);}
    return call2(Stdlib_array[14], J_, H_);
  }
  function count_bucket(i, b, accu) {
    var G_;
    var accu__1;
    var i__1;
    var i__0 = i;
    var accu__0 = accu;
    for (; ; ) {
      if (length(b) <= i__0) {return accu__0;}
      G_ = check(b, i__0) ? 1 : 0;
      accu__1 = accu__0 + G_ | 0;
      i__1 = i__0 + 1 | 0;
      i__0 = i__1;
      accu__0 = accu__1;
      continue;
    }
  }
  function count(t) {
    var A_ = 0;
    var B_ = t[1];
    var C_ = 0;
    function D_(E_, F_) {return count_bucket(C_, E_, F_);}
    return call3(Stdlib_array[18], D_, B_, A_);
  }
  function next_sz(n) {
    return call2(Stdlib[16], ((3 * n | 0) / 2 | 0) + 3 | 0, Stdlib_sys[14]);
  }
  function prev_sz(n) {return (((n + -3 | 0) * 2 | 0) + 2 | 0) / 3 | 0;}
  function test_shrink_bucket(t) {
    var loop;
    var u_;
    var v_;
    var w_;
    var x_;
    var s_ = t[5];
    var bucket = caml_check_bound(t[1], s_)[s_ + 1];
    var t_ = t[5];
    var hbucket = caml_check_bound(t[2], t_)[t_ + 1];
    var len = length(bucket);
    var prev_len = prev_sz(len);
    var live = count_bucket(0, bucket, 0);
    if (live <= prev_len) {
      loop =
        function(i, j) {
          var y_;
          var i__1;
          var z_;
          var j__1;
          var i__2;
          var j__2;
          var i__0 = i;
          var j__0 = j;
          for (; ; ) {
            y_ = prev_len <= j__0 ? 1 : 0;
            if (y_) {
              if (check(bucket, i__0)) {
                i__1 = i__0 + 1 | 0;
                i__0 = i__1;
                continue;
              }
              if (check(bucket, j__0)) {
                blit(bucket, j__0, bucket, i__0, 1);
                z_ = caml_check_bound(hbucket, j__0)[j__0 + 1];
                caml_check_bound(hbucket, i__0)[i__0 + 1] = z_;
                j__1 = j__0 + -1 | 0;
                i__2 = i__0 + 1 | 0;
                i__0 = i__2;
                j__0 = j__1;
                continue;
              }
              j__2 = j__0 + -1 | 0;
              j__0 = j__2;
              continue;
            }
            return y_;
          }
        };
      loop(0, length(bucket) + -1 | 0);
      if (0 === prev_len) {
        u_ = t[5];
        caml_check_bound(t[1], u_)[u_ + 1] = emptybucket;
        v_ = t[5];
        caml_check_bound(t[2], v_)[v_ + 1] = [0];
      }
      else {
        caml_obj_truncate(bucket, prev_len + 2 | 0);
        caml_obj_truncate(hbucket, prev_len);
      }
      w_ = t[3] < len ? 1 : 0;
      x_ = w_ ? prev_len <= t[3] ? 1 : 0 : w_;
      if (x_) {t[4] = t[4] + -1 | 0;}
    }
    t[5] = caml_mod(t[5] + 1 | 0, t[1].length - 1);
    return 0;
  }
  function resize(t) {
    var newt;
    var add_weak;
    var oldlen = t[1].length - 1;
    var newlen = next_sz(oldlen);
    if (oldlen < newlen) {
      newt = create__0(newlen);
      add_weak =
        function(ob, oh, oi) {
          function setter(nb, ni, param) {return blit(ob, oi, nb, ni, 1);}
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
    t[3] = Stdlib[19];
    t[4] = 0;
    return 0;
  }
  function add_aux(t, setter, d, h, index) {
    var bucket = caml_check_bound(t[1], index)[index + 1];
    var hashes = caml_check_bound(t[2], index)[index + 1];
    var sz = length(bucket);
    function loop(i) {
      var newsz;
      var newbucket;
      var newhashes;
      var o_;
      var p_;
      var q_;
      var i__1;
      var r_;
      var i__2;
      var i__0 = i;
      for (; ; ) {
        if (sz <= i__0) {
          newsz =
            call2(
              Stdlib[16],
              ((3 * sz | 0) / 2 | 0) + 3 | 0,
              Stdlib_sys[14] - 2 | 0
            );
          if (newsz <= sz) {
            call1(Stdlib[2], cst_Weak_Make_hash_bucket_cannot_grow_more);
          }
          newbucket = create(newsz);
          newhashes = caml_make_vect(newsz, 0);
          blit(bucket, 0, newbucket, 0, sz);
          call5(Stdlib_array[10], hashes, 0, newhashes, 0, sz);
          call3(setter, newbucket, sz, d);
          caml_check_bound(newhashes, sz)[sz + 1] = h;
          caml_check_bound(t[1], index)[index + 1] = newbucket;
          caml_check_bound(t[2], index)[index + 1] = newhashes;
          o_ = sz <= t[3] ? 1 : 0;
          p_ = o_ ? t[3] < newsz ? 1 : 0 : o_;
          if (p_) {
            t[4] = t[4] + 1 | 0;
            i__1 = 0;
            for (; ; ) {
              test_shrink_bucket(t);
              r_ = i__1 + 1 | 0;
              if (2 !== i__1) {i__1 = r_;continue;}
              break;
            }
          }
          q_ = ((t[1].length - 1) / 2 | 0) < t[4] ? 1 : 0;
          return q_ ? resize(t) : q_;
        }
        if (check(bucket, i__0)) {i__2 = i__0 + 1 | 0;i__0 = i__2;continue;}
        call3(setter, bucket, i__0, d);
        caml_check_bound(hashes, i__0)[i__0 + 1] = h;
        return 0;
      }
    }
    return loop(0);
  }
  function add(t, d) {
    var h = call1(H[2], d);
    return add_aux(t, set, [0,d], h, get_index(t, h));
  }
  function find_or(t, d, ifnotfound) {
    var h = call1(H[2], d);
    var index = get_index(t, h);
    var bucket = caml_check_bound(t[1], index)[index + 1];
    var hashes = caml_check_bound(t[2], index)[index + 1];
    var sz = length(bucket);
    function loop(i) {
      var match;
      var v;
      var match__0;
      var v__0;
      var i__1;
      var i__2;
      var i__3;
      var i__0 = i;
      for (; ; ) {
        if (sz <= i__0) {return call2(ifnotfound, h, index);}
        if (h === caml_check_bound(hashes, i__0)[i__0 + 1]) {
          match = get_copy(bucket, i__0);
          if (match) {
            v = match[1];
            if (call2(H[1], v, d)) {
              match__0 = get(bucket, i__0);
              if (match__0) {v__0 = match__0[1];return v__0;}
              i__1 = i__0 + 1 | 0;
              i__0 = i__1;
              continue;
            }
          }
          i__2 = i__0 + 1 | 0;
          i__0 = i__2;
          continue;
        }
        i__3 = i__0 + 1 | 0;
        i__0 = i__3;
        continue;
      }
    }
    return loop(0);
  }
  function merge(t, d) {
    return find_or(
      t,
      d,
      function(h, index) {add_aux(t, set, [0,d], h, index);return d;}
    );
  }
  function find(t, d) {
    return find_or(
      t,
      d,
      function(h, index) {throw caml_wrap_thrown_exception(Stdlib[8]);}
    );
  }
  function find_opt(t, d) {
    var h = call1(H[2], d);
    var index = get_index(t, h);
    var bucket = caml_check_bound(t[1], index)[index + 1];
    var hashes = caml_check_bound(t[2], index)[index + 1];
    var sz = length(bucket);
    function loop(i) {
      var match;
      var v;
      var v__0;
      var i__1;
      var i__2;
      var i__3;
      var i__0 = i;
      for (; ; ) {
        if (sz <= i__0) {return 0;}
        if (h === caml_check_bound(hashes, i__0)[i__0 + 1]) {
          match = get_copy(bucket, i__0);
          if (match) {
            v = match[1];
            if (call2(H[1], v, d)) {
              v__0 = get(bucket, i__0);
              if (v__0) {return v__0;}
              i__1 = i__0 + 1 | 0;
              i__0 = i__1;
              continue;
            }
          }
          i__2 = i__0 + 1 | 0;
          i__0 = i__2;
          continue;
        }
        i__3 = i__0 + 1 | 0;
        i__0 = i__3;
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
      var match;
      var v;
      var i__1;
      var i__2;
      var i__0 = i;
      for (; ; ) {
        if (sz <= i__0) {return ifnotfound;}
        if (h === caml_check_bound(hashes, i__0)[i__0 + 1]) {
          match = get_copy(bucket, i__0);
          if (match) {
            v = match[1];
            if (call2(H[1], v, d)) {return call2(iffound, bucket, i__0);}
          }
          i__1 = i__0 + 1 | 0;
          i__0 = i__1;
          continue;
        }
        i__2 = i__0 + 1 | 0;
        i__0 = i__2;
        continue;
      }
    }
    return loop(0);
  }
  function remove(t, d) {
    var n_ = 0;
    return find_shadow(t, d, function(w, i) {return set(w, i, 0);}, n_);
  }
  function mem(t, d) {
    var m_ = 0;
    return find_shadow(t, d, function(w, i) {return 1;}, m_);
  }
  function find_all(t, d) {
    var h = call1(H[2], d);
    var index = get_index(t, h);
    var bucket = caml_check_bound(t[1], index)[index + 1];
    var hashes = caml_check_bound(t[2], index)[index + 1];
    var sz = length(bucket);
    function loop(i, accu) {
      var match;
      var v;
      var match__0;
      var v__0;
      var accu__1;
      var i__1;
      var i__2;
      var i__3;
      var i__4;
      var i__0 = i;
      var accu__0 = accu;
      for (; ; ) {
        if (sz <= i__0) {return accu__0;}
        if (h === caml_check_bound(hashes, i__0)[i__0 + 1]) {
          match = get_copy(bucket, i__0);
          if (match) {
            v = match[1];
            if (call2(H[1], v, d)) {
              match__0 = get(bucket, i__0);
              if (match__0) {
                v__0 = match__0[1];
                accu__1 = [0,v__0,accu__0];
                i__1 = i__0 + 1 | 0;
                i__0 = i__1;
                accu__0 = accu__1;
                continue;
              }
              i__2 = i__0 + 1 | 0;
              i__0 = i__2;
              continue;
            }
          }
          i__3 = i__0 + 1 | 0;
          i__0 = i__3;
          continue;
        }
        i__4 = i__0 + 1 | 0;
        i__0 = i__4;
        continue;
      }
    }
    return loop(0, 0);
  }
  function stats(t) {
    var len = t[1].length - 1;
    var lens = call2(Stdlib_array[15], length, t[1]);
    function a_(l_, k_) {return runtime["caml_int_compare"](l_, k_);}
    call2(Stdlib_array[25], a_, lens);
    var b_ = 0;
    function c_(j_, i_) {return j_ + i_ | 0;}
    var totlen = call3(Stdlib_array[17], c_, b_, lens);
    var d_ = len + -1 | 0;
    var f_ = len / 2 | 0;
    var e_ = caml_check_bound(lens, d_)[d_ + 1];
    var g_ = caml_check_bound(lens, f_)[f_ + 1];
    var h_ = caml_check_bound(lens, 0)[1];
    return [0,len,count(t),totlen,h_,g_,e_];
  }
  return [
    0,
    create__0,
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

var Stdlib_weak = [0,create,length,set,get,get_copy,check,fill,blit,Make];

module.exports = Stdlib_weak;

/*::type Exports = {
  create: (l: any) => any,
  length: (x: any) => any,
  set: (e: any, o: any, x: any) => any,
  get: (e: any, o: any) => any,
  get_copy: (e: any, o: any) => any,
  check: (e: any, o: any) => any,
  fill: (ar: any, ofs: any, len: any, x: any) => any,
  blit: (e1: any, o1: any, e2: any, o2: any, l: any) => any,
  Make: (H: any) => any,
}*/
/** @type {{
  create: (l: any) => any,
  length: (x: any) => any,
  set: (e: any, o: any, x: any) => any,
  get: (e: any, o: any) => any,
  get_copy: (e: any, o: any) => any,
  check: (e: any, o: any) => any,
  fill: (ar: any, ofs: any, len: any, x: any) => any,
  blit: (e1: any, o1: any, e2: any, o2: any, l: any) => any,
  Make: (H: any) => any,
}} */
module.exports = ((module.exports /*:: : any*/) /*:: :Exports */);
module.exports.create = module.exports[1];
module.exports.length = module.exports[2];
module.exports.set = module.exports[3];
module.exports.get = module.exports[4];
module.exports.get_copy = module.exports[5];
module.exports.check = module.exports[6];
module.exports.fill = module.exports[7];
module.exports.blit = module.exports[8];
module.exports.Make = module.exports[9];

/* Hashing disabled */
