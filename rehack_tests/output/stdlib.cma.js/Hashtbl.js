/**
 * @flow strict
 * Hashtbl
 */

// @ts-check


"use strict";

var runtime = require("../runtime/runtime.js");
var e_;
var d_;
var params;
var a_;

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

var caml_check_bound = runtime["caml_check_bound"];
var caml_compare = runtime["caml_compare"];
var caml_hash = runtime["caml_hash"];
var caml_make_vect = runtime["caml_make_vect"];
var string = runtime["caml_new_string"];
var caml_sys_getenv = runtime["caml_sys_getenv"];
var caml_wrap_thrown_exception = runtime["caml_wrap_thrown_exception"];
var caml_wrap_thrown_exception_reraise = runtime
 ["caml_wrap_thrown_exception_reraise"];
var cst_OCAMLRUNPARAM = string("OCAMLRUNPARAM");
var cst_CAMLRUNPARAM = string("CAMLRUNPARAM");
var cst = string("");
var Sys = require("./Sys.js");
var Not_found = require("../runtime/Not_found.js");
var Pervasives = require("./Pervasives.js");
var Array = require("./Array.js");
var Assert_failure = require("../runtime/Assert_failure.js");
var CamlinternalLazy = require("./CamlinternalLazy.js");
var Random = require("./Random.js");
var String = require("./String.js");
var c_ = [0,0];
var b_ = [0,string("hashtbl.ml"),108,23];

function hash(x) {return caml_hash(10, 100, 0, x);}

function hash_param(n1, n2, x) {return caml_hash(n1, n2, 0, x);}

function seeded_hash(seed, x) {return caml_hash(10, 100, seed, x);}

function ongoing_traversal(h) {
  var ar_ = h.length - 1 < 4 ? 1 : 0;
  var as_ = ar_ ? ar_ : h[4] < 0 ? 1 : 0;
  return as_;
}

function flip_ongoing_traversal(h) {h[4] = - h[4] | 0;return 0;}

try {e_ = caml_sys_getenv(cst_OCAMLRUNPARAM);params = e_;}
catch(ap_) {
  ap_ = runtime["caml_wrap_exception"](ap_);
  if (ap_ !== Not_found) {throw caml_wrap_thrown_exception_reraise(ap_);}
  try {d_ = caml_sys_getenv(cst_CAMLRUNPARAM);a_ = d_;}
  catch(aq_) {
    aq_ = runtime["caml_wrap_exception"](aq_);
    if (aq_ !== Not_found) {throw caml_wrap_thrown_exception_reraise(aq_);}
    a_ = cst;
  }
  params = a_;
}

var randomized_default = call2(String[22], params, 82);
var randomized = [0,randomized_default];

function randomize(param) {randomized[1] = 1;return 0;}

function is_randomized(param) {return randomized[1];}

var prng = [246,function(ao_) {return call1(Random[11][2], 0);}];

function power_2_above(x, n) {
  var x__1;
  var x__0 = x;
  for (; ; ) {
    if (n <= x__0) {return x__0;}
    if (Sys[14] < (x__0 * 2 | 0)) {return x__0;}
    x__1 = x__0 * 2 | 0;
    x__0 = x__1;
    continue;
  }
}

function create(opt, initial_size) {
  var seed;
  var an_;
  var am_;
  var random;
  var sth;
  if (opt) {
    sth = opt[1];
    random = sth;
  }
  else random = randomized[1];
  var s = power_2_above(16, initial_size);
  if (random) {
    am_ = runtime["caml_obj_tag"](prng);
    an_ =
      250 === am_ ?
        prng[1] :
        246 === am_ ? call1(CamlinternalLazy[2], prng) : prng;
    seed = call1(Random[11][4], an_);
  }
  else seed = 0;
  return [0,0,caml_make_vect(s, 0),seed,s];
}

function clear(h) {
  var al_;
  var i;
  h[1] = 0;
  var len = h[2].length - 1;
  var ak_ = len + -1 | 0;
  var aj_ = 0;
  if (! (ak_ < 0)) {
    i = aj_;
    for (; ; ) {
      caml_check_bound(h[2], i)[i + 1] = 0;
      al_ = i + 1 | 0;
      if (ak_ !== i) {i = al_;continue;}
      break;
    }
  }
  return 0;
}

function reset(h) {
  var len = h[2].length - 1;
  if (4 <= h.length - 1) {
    if (len !== call1(Pervasives[6], h[4])) {
      h[1] = 0;
      h[2] = caml_make_vect(call1(Pervasives[6], h[4]), 0);
      return 0;
    }
  }
  return clear(h);
}

function copy_bucketlist(param) {
  var r;
  var loop;
  var next;
  var data;
  var key;
  if (param) {
    key = param[1];
    data = param[2];
    next = param[3];
    loop =
      function(prec, param) {
        var key;
        var data;
        var next;
        var r;
        var prec__0 = prec;
        var param__0 = param;
        for (; ; ) {
          if (param__0) {
            key = param__0[1];
            data = param__0[2];
            next = param__0[3];
            r = [0,key,data,next];
            if (prec__0) {
              prec__0[3] = r;
              prec__0 = r;
              param__0 = next;
              continue;
            }
            throw caml_wrap_thrown_exception([0,Assert_failure,b_]);
          }
          return 0;
        }
      };
    r = [0,key,data,next];
    loop(r, next);
    return r;
  }
  return 0;
}

function copy(h) {
  var ag_ = h[4];
  var ah_ = h[3];
  var ai_ = call2(Array[15], copy_bucketlist, h[2]);
  return [0,h[1],ai_,ah_,ag_];
}

function length(h) {return h[1];}

function resize(indexfun, h) {
  var ndata;
  var ndata_tail;
  var inplace;
  var insert_bucket;
  var Y_;
  var Z_;
  var aa_;
  var ab_;
  var ac_;
  var ad_;
  var i;
  var match;
  var ae_;
  var i__0;
  var af_;
  var odata = h[2];
  var osize = odata.length - 1;
  var nsize = osize * 2 | 0;
  var X_ = nsize < Sys[14] ? 1 : 0;
  if (X_) {
    ndata = caml_make_vect(nsize, 0);
    ndata_tail = caml_make_vect(nsize, 0);
    inplace = 1 - ongoing_traversal(h);
    h[2] = ndata;
    insert_bucket =
      function(cell) {
        var key;
        var data;
        var next;
        var cell__1;
        var nidx;
        var match;
        var cell__0 = cell;
        for (; ; ) {
          if (cell__0) {
            key = cell__0[1];
            data = cell__0[2];
            next = cell__0[3];
            cell__1 = inplace ? cell__0 : [0,key,data,0];
            nidx = call2(indexfun, h, key);
            match = caml_check_bound(ndata_tail, nidx)[nidx + 1];
            if (match) match[3] =
              cell__1;
            else caml_check_bound(ndata, nidx)[nidx + 1] = cell__1;
            caml_check_bound(ndata_tail, nidx)[nidx + 1] = cell__1;
            cell__0 = next;
            continue;
          }
          return 0;
        }
      };
    Z_ = osize + -1 | 0;
    Y_ = 0;
    if (! (Z_ < 0)) {
      i__0 = Y_;
      for (; ; ) {
        insert_bucket(caml_check_bound(odata, i__0)[i__0 + 1]);
        af_ = i__0 + 1 | 0;
        if (Z_ !== i__0) {i__0 = af_;continue;}
        break;
      }
    }
    if (inplace) {
      ab_ = nsize + -1 | 0;
      aa_ = 0;
      if (! (ab_ < 0)) {
        i = aa_;
        for (; ; ) {
          match = caml_check_bound(ndata_tail, i)[i + 1];
          if (match) {match[3] = 0;}
          ae_ = i + 1 | 0;
          if (ab_ !== i) {i = ae_;continue;}
          break;
        }
      }
      ac_ = 0;
    }
    else ac_ = inplace;
    ad_ = ac_;
  }
  else ad_ = X_;
  return ad_;
}

function key_index(h, key) {
  return 3 <= h.length - 1 ?
    caml_hash(10, 100, h[3], key) & (h[2].length - 1 + -1 | 0) :
    runtime["caml_mod"](
     runtime["caml_hash_univ_param"](10, 100, key),
     h[2].length - 1
   );
}

function add(h, key, data) {
  var i = key_index(h, key);
  var bucket = [0,key,data,caml_check_bound(h[2], i)[i + 1]];
  caml_check_bound(h[2], i)[i + 1] = bucket;
  h[1] = h[1] + 1 | 0;
  var W_ = h[2].length - 1 << 1 < h[1] ? 1 : 0;
  return W_ ? resize(key_index, h) : W_;
}

function remove_bucket(h, i, key, prec, c) {
  var k;
  var next;
  var prec__0 = prec;
  var c__0 = c;
  for (; ; ) {
    if (c__0) {
      k = c__0[1];
      next = c__0[3];
      if (0 === caml_compare(k, key)) {
        h[1] = h[1] + -1 | 0;
        if (prec__0) {prec__0[3] = next;return 0;}
        caml_check_bound(h[2], i)[i + 1] = next;
        return 0;
      }
      prec__0 = c__0;
      c__0 = next;
      continue;
    }
    return 0;
  }
}

function remove(h, key) {
  var i = key_index(h, key);
  return remove_bucket(h, i, key, 0, caml_check_bound(h[2], i)[i + 1]);
}

function find_rec(key, param) {
  var k;
  var data;
  var next;
  var param__0 = param;
  for (; ; ) {
    if (param__0) {
      k = param__0[1];
      data = param__0[2];
      next = param__0[3];
      if (0 === caml_compare(key, k)) {return data;}
      param__0 = next;
      continue;
    }
    throw caml_wrap_thrown_exception(Not_found);
  }
}

function find(h, key) {
  var k1;
  var d1;
  var next1;
  var k2;
  var d2;
  var next2;
  var k3;
  var d3;
  var next3;
  var V_ = key_index(h, key);
  var match = caml_check_bound(h[2], V_)[V_ + 1];
  if (match) {
    k1 = match[1];
    d1 = match[2];
    next1 = match[3];
    if (0 === caml_compare(key, k1)) {return d1;}
    if (next1) {
      k2 = next1[1];
      d2 = next1[2];
      next2 = next1[3];
      if (0 === caml_compare(key, k2)) {return d2;}
      if (next2) {
        k3 = next2[1];
        d3 = next2[2];
        next3 = next2[3];
        return 0 === caml_compare(key, k3) ? d3 : find_rec(key, next3);
      }
      throw caml_wrap_thrown_exception(Not_found);
    }
    throw caml_wrap_thrown_exception(Not_found);
  }
  throw caml_wrap_thrown_exception(Not_found);
}

function find_rec_opt(key, param) {
  var k;
  var data;
  var next;
  var param__0 = param;
  for (; ; ) {
    if (param__0) {
      k = param__0[1];
      data = param__0[2];
      next = param__0[3];
      if (0 === caml_compare(key, k)) {return [0,data];}
      param__0 = next;
      continue;
    }
    return 0;
  }
}

function find_opt(h, key) {
  var k1;
  var d1;
  var next1;
  var k2;
  var d2;
  var next2;
  var k3;
  var d3;
  var next3;
  var U_ = key_index(h, key);
  var match = caml_check_bound(h[2], U_)[U_ + 1];
  if (match) {
    k1 = match[1];
    d1 = match[2];
    next1 = match[3];
    if (0 === caml_compare(key, k1)) {return [0,d1];}
    if (next1) {
      k2 = next1[1];
      d2 = next1[2];
      next2 = next1[3];
      if (0 === caml_compare(key, k2)) {return [0,d2];}
      if (next2) {
        k3 = next2[1];
        d3 = next2[2];
        next3 = next2[3];
        return 0 === caml_compare(key, k3) ? [0,d3] : find_rec_opt(key, next3);
      }
      return 0;
    }
    return 0;
  }
  return 0;
}

function find_all(h, key) {
  function find_in_bucket(param) {
    var k;
    var data;
    var next;
    var param__0 = param;
    for (; ; ) {
      if (param__0) {
        k = param__0[1];
        data = param__0[2];
        next = param__0[3];
        if (0 === caml_compare(k, key)) {
          return [0,data,find_in_bucket(next)];
        }
        param__0 = next;
        continue;
      }
      return 0;
    }
  }
  var T_ = key_index(h, key);
  return find_in_bucket(caml_check_bound(h[2], T_)[T_ + 1]);
}

function replace_bucket(key, data, param) {
  var k;
  var next;
  var param__0 = param;
  for (; ; ) {
    if (param__0) {
      k = param__0[1];
      next = param__0[3];
      if (0 === caml_compare(k, key)) {
        param__0[1] = key;
        param__0[2] = data;
        return 0;
      }
      param__0 = next;
      continue;
    }
    return 1;
  }
}

function replace(h, key, data) {
  var R_;
  var S_;
  var i = key_index(h, key);
  var l = caml_check_bound(h[2], i)[i + 1];
  var Q_ = replace_bucket(key, data, l);
  if (Q_) {
    caml_check_bound(h[2], i)[i + 1] = [0,key,data,l];
    h[1] = h[1] + 1 | 0;
    R_ = h[2].length - 1 << 1 < h[1] ? 1 : 0;
    if (R_) {return resize(key_index, h);}
    S_ = R_;
  }
  else S_ = Q_;
  return S_;
}

function mem(h, key) {
  function mem_in_bucket(param) {
    var k;
    var next;
    var P_;
    var param__0 = param;
    for (; ; ) {
      if (param__0) {
        k = param__0[1];
        next = param__0[3];
        P_ = 0 === caml_compare(k, key) ? 1 : 0;
        if (P_) {return P_;}
        param__0 = next;
        continue;
      }
      return 0;
    }
  }
  var O_ = key_index(h, key);
  return mem_in_bucket(caml_check_bound(h[2], O_)[O_ + 1]);
}

function iter(f, h) {
  var d;
  var J_;
  var K_;
  var L_;
  var M_;
  var i;
  var N_;
  function do_bucket(param) {
    var key;
    var data;
    var param__1;
    var param__0 = param;
    for (; ; ) {
      if (param__0) {
        key = param__0[1];
        data = param__0[2];
        param__1 = param__0[3];
        call2(f, key, data);
        param__0 = param__1;
        continue;
      }
      return 0;
    }
  }
  var old_trav = ongoing_traversal(h);
  if (1 - old_trav) {flip_ongoing_traversal(h);}
  try {
    d = h[2];
    K_ = d.length - 1 + -1 | 0;
    J_ = 0;
    if (! (K_ < 0)) {
      i = J_;
      for (; ; ) {
        do_bucket(caml_check_bound(d, i)[i + 1]);
        N_ = i + 1 | 0;
        if (K_ !== i) {i = N_;continue;}
        break;
      }
    }
    L_ = 1 - old_trav;
    M_ = L_ ? flip_ongoing_traversal(h) : L_;
    return M_;
  }
  catch(exn) {
    exn = runtime["caml_wrap_exception"](exn);
    if (old_trav) {throw caml_wrap_thrown_exception_reraise(exn);}
    flip_ongoing_traversal(h);
    throw caml_wrap_thrown_exception_reraise(exn);
  }
}

function filter_map_inplace_bucket(f, h, i, prec, slot) {
  var key;
  var data;
  var next;
  var match;
  var data__0;
  var prec__0 = prec;
  var slot__0 = slot;
  for (; ; ) {
    if (slot__0) {
      key = slot__0[1];
      data = slot__0[2];
      next = slot__0[3];
      match = call2(f, key, data);
      if (match) {
        data__0 = match[1];
        if (prec__0) prec__0[3] = slot__0;
        else caml_check_bound(h[2], i)[i + 1] = slot__0;
        slot__0[2] = data__0;
        prec__0 = slot__0;
        slot__0 = next;
        continue;
      }
      h[1] = h[1] + -1 | 0;
      slot__0 = next;
      continue;
    }
    if (prec__0) {prec__0[3] = 0;return 0;}
    caml_check_bound(h[2], i)[i + 1] = 0;
    return 0;
  }
}

function filter_map_inplace(f, h) {
  var F_;
  var G_;
  var H_;
  var i;
  var I_;
  var d = h[2];
  var old_trav = ongoing_traversal(h);
  if (1 - old_trav) {flip_ongoing_traversal(h);}
  try {
    G_ = d.length - 1 + -1 | 0;
    F_ = 0;
    if (! (G_ < 0)) {
      i = F_;
      for (; ; ) {
        filter_map_inplace_bucket(f, h, i, 0, caml_check_bound(h[2], i)[i + 1]
        );
        I_ = i + 1 | 0;
        if (G_ !== i) {i = I_;continue;}
        break;
      }
    }
    H_ = 0;
    return H_;
  }
  catch(exn) {
    exn = runtime["caml_wrap_exception"](exn);
    if (old_trav) {throw caml_wrap_thrown_exception_reraise(exn);}
    flip_ongoing_traversal(h);
    throw caml_wrap_thrown_exception_reraise(exn);
  }
}

function fold(f, h, init) {
  var d;
  var accu;
  var A_;
  var B_;
  var C_;
  var i;
  var D_;
  var E_;
  function do_bucket(b, accu) {
    var key;
    var data;
    var b__1;
    var accu__1;
    var b__0 = b;
    var accu__0 = accu;
    for (; ; ) {
      if (b__0) {
        key = b__0[1];
        data = b__0[2];
        b__1 = b__0[3];
        accu__1 = call3(f, key, data, accu__0);
        b__0 = b__1;
        accu__0 = accu__1;
        continue;
      }
      return accu__0;
    }
  }
  var old_trav = ongoing_traversal(h);
  if (1 - old_trav) {flip_ongoing_traversal(h);}
  try {
    d = h[2];
    accu = [0,init];
    B_ = d.length - 1 + -1 | 0;
    A_ = 0;
    if (! (B_ < 0)) {
      i = A_;
      for (; ; ) {
        D_ = accu[1];
        accu[1] = do_bucket(caml_check_bound(d, i)[i + 1], D_);
        E_ = i + 1 | 0;
        if (B_ !== i) {i = E_;continue;}
        break;
      }
    }
    if (1 - old_trav) {flip_ongoing_traversal(h);}
    C_ = accu[1];
    return C_;
  }
  catch(exn) {
    exn = runtime["caml_wrap_exception"](exn);
    if (old_trav) {throw caml_wrap_thrown_exception_reraise(exn);}
    flip_ongoing_traversal(h);
    throw caml_wrap_thrown_exception_reraise(exn);
  }
}

function bucket_length(accu, param) {
  var param__1;
  var accu__1;
  var accu__0 = accu;
  var param__0 = param;
  for (; ; ) {
    if (param__0) {
      param__1 = param__0[3];
      accu__1 = accu__0 + 1 | 0;
      accu__0 = accu__1;
      param__0 = param__1;
      continue;
    }
    return accu__0;
  }
}

function stats(h) {
  var u_ = h[2];
  var v_ = 0;
  function w_(m, b) {
    var z_ = bucket_length(0, b);
    return call2(Pervasives[5], m, z_);
  }
  var mbl = call3(Array[17], w_, v_, u_);
  var histo = caml_make_vect(mbl + 1 | 0, 0);
  var x_ = h[2];
  function y_(b) {
    var l = bucket_length(0, b);
    histo[l + 1] = caml_check_bound(histo, l)[l + 1] + 1 | 0;
    return 0;
  }
  call2(Array[13], y_, x_);
  return [0,h[1],h[2].length - 1,mbl,histo];
}

function MakeSeeded(H) {
  function key_index(h, key) {
    var t_ = h[2].length - 1 + -1 | 0;
    return call2(H[2], h[3], key) & t_;
  }
  function add(h, key, data) {
    var i = key_index(h, key);
    var bucket = [0,key,data,caml_check_bound(h[2], i)[i + 1]];
    caml_check_bound(h[2], i)[i + 1] = bucket;
    h[1] = h[1] + 1 | 0;
    var s_ = h[2].length - 1 << 1 < h[1] ? 1 : 0;
    return s_ ? resize(key_index, h) : s_;
  }
  function remove_bucket(h, i, key, prec, c) {
    var k;
    var next;
    var prec__0 = prec;
    var c__0 = c;
    for (; ; ) {
      if (c__0) {
        k = c__0[1];
        next = c__0[3];
        if (call2(H[1], k, key)) {
          h[1] = h[1] + -1 | 0;
          if (prec__0) {prec__0[3] = next;return 0;}
          caml_check_bound(h[2], i)[i + 1] = next;
          return 0;
        }
        prec__0 = c__0;
        c__0 = next;
        continue;
      }
      return 0;
    }
  }
  function remove(h, key) {
    var i = key_index(h, key);
    return remove_bucket(h, i, key, 0, caml_check_bound(h[2], i)[i + 1]);
  }
  function find_rec(key, param) {
    var k;
    var data;
    var next;
    var param__0 = param;
    for (; ; ) {
      if (param__0) {
        k = param__0[1];
        data = param__0[2];
        next = param__0[3];
        if (call2(H[1], key, k)) {return data;}
        param__0 = next;
        continue;
      }
      throw caml_wrap_thrown_exception(Not_found);
    }
  }
  function find(h, key) {
    var k1;
    var d1;
    var next1;
    var k2;
    var d2;
    var next2;
    var k3;
    var d3;
    var next3;
    var r_ = key_index(h, key);
    var match = caml_check_bound(h[2], r_)[r_ + 1];
    if (match) {
      k1 = match[1];
      d1 = match[2];
      next1 = match[3];
      if (call2(H[1], key, k1)) {return d1;}
      if (next1) {
        k2 = next1[1];
        d2 = next1[2];
        next2 = next1[3];
        if (call2(H[1], key, k2)) {return d2;}
        if (next2) {
          k3 = next2[1];
          d3 = next2[2];
          next3 = next2[3];
          return call2(H[1], key, k3) ? d3 : find_rec(key, next3);
        }
        throw caml_wrap_thrown_exception(Not_found);
      }
      throw caml_wrap_thrown_exception(Not_found);
    }
    throw caml_wrap_thrown_exception(Not_found);
  }
  function find_rec_opt(key, param) {
    var k;
    var data;
    var next;
    var param__0 = param;
    for (; ; ) {
      if (param__0) {
        k = param__0[1];
        data = param__0[2];
        next = param__0[3];
        if (call2(H[1], key, k)) {return [0,data];}
        param__0 = next;
        continue;
      }
      return 0;
    }
  }
  function find_opt(h, key) {
    var k1;
    var d1;
    var next1;
    var k2;
    var d2;
    var next2;
    var k3;
    var d3;
    var next3;
    var q_ = key_index(h, key);
    var match = caml_check_bound(h[2], q_)[q_ + 1];
    if (match) {
      k1 = match[1];
      d1 = match[2];
      next1 = match[3];
      if (call2(H[1], key, k1)) {return [0,d1];}
      if (next1) {
        k2 = next1[1];
        d2 = next1[2];
        next2 = next1[3];
        if (call2(H[1], key, k2)) {return [0,d2];}
        if (next2) {
          k3 = next2[1];
          d3 = next2[2];
          next3 = next2[3];
          return call2(H[1], key, k3) ? [0,d3] : find_rec_opt(key, next3);
        }
        return 0;
      }
      return 0;
    }
    return 0;
  }
  function find_all(h, key) {
    function find_in_bucket(param) {
      var k;
      var d;
      var next;
      var param__0 = param;
      for (; ; ) {
        if (param__0) {
          k = param__0[1];
          d = param__0[2];
          next = param__0[3];
          if (call2(H[1], k, key)) {return [0,d,find_in_bucket(next)];}
          param__0 = next;
          continue;
        }
        return 0;
      }
    }
    var p_ = key_index(h, key);
    return find_in_bucket(caml_check_bound(h[2], p_)[p_ + 1]);
  }
  function replace_bucket(key, data, param) {
    var k;
    var next;
    var param__0 = param;
    for (; ; ) {
      if (param__0) {
        k = param__0[1];
        next = param__0[3];
        if (call2(H[1], k, key)) {
          param__0[1] = key;
          param__0[2] = data;
          return 0;
        }
        param__0 = next;
        continue;
      }
      return 1;
    }
  }
  function replace(h, key, data) {
    var n_;
    var o_;
    var i = key_index(h, key);
    var l = caml_check_bound(h[2], i)[i + 1];
    var m_ = replace_bucket(key, data, l);
    if (m_) {
      caml_check_bound(h[2], i)[i + 1] = [0,key,data,l];
      h[1] = h[1] + 1 | 0;
      n_ = h[2].length - 1 << 1 < h[1] ? 1 : 0;
      if (n_) {return resize(key_index, h);}
      o_ = n_;
    }
    else o_ = m_;
    return o_;
  }
  function mem(h, key) {
    function mem_in_bucket(param) {
      var k;
      var next;
      var l_;
      var param__0 = param;
      for (; ; ) {
        if (param__0) {
          k = param__0[1];
          next = param__0[3];
          l_ = call2(H[1], k, key);
          if (l_) {return l_;}
          param__0 = next;
          continue;
        }
        return 0;
      }
    }
    var k_ = key_index(h, key);
    return mem_in_bucket(caml_check_bound(h[2], k_)[k_ + 1]);
  }
  return [
    0,
    create,
    clear,
    reset,
    copy,
    add,
    remove,
    find,
    find_opt,
    find_all,
    replace,
    mem,
    iter,
    filter_map_inplace,
    fold,
    length,
    stats
  ];
}

function Make(H) {
  var equal = H[1];
  function hash(seed, x) {return call1(H[2], x);}
  var include = MakeSeeded([0,equal,hash]);
  var clear = include[2];
  var reset = include[3];
  var copy = include[4];
  var add = include[5];
  var remove = include[6];
  var find = include[7];
  var find_opt = include[8];
  var find_all = include[9];
  var replace = include[10];
  var mem = include[11];
  var iter = include[12];
  var filter_map_inplace = include[13];
  var fold = include[14];
  var length = include[15];
  var stats = include[16];
  var j_ = include[1];
  function create(sz) {return call2(j_, c_, sz);}
  return [
    0,
    create,
    clear,
    reset,
    copy,
    add,
    remove,
    find,
    find_opt,
    find_all,
    replace,
    mem,
    iter,
    filter_map_inplace,
    fold,
    length,
    stats
  ];
}

var Hashtbl = [
  0,
  create,
  clear,
  reset,
  copy,
  add,
  find,
  find_opt,
  find_all,
  mem,
  remove,
  replace,
  iter,
  filter_map_inplace,
  fold,
  length,
  randomize,
  is_randomized,
  stats,
  Make,
  MakeSeeded,
  hash,
  seeded_hash,
  hash_param,
  function(i_, h_, g_, f_) {return caml_hash(i_, h_, g_, f_);}
];

module.exports = Hashtbl;

/*::type Exports = {
  create: (opt: any, initial_size: any) => any,
  clear: (h: any) => any,
  reset: (h: any) => any,
  copy: (h: any) => any,
  add: (h: any, key: any, data: any) => any,
  find: (h: any, key: any) => any,
  find_opt: (h: any, key: any) => any,
  find_all: (h: any, key: any) => any,
  mem: (h: any, key: any) => any,
  remove: (h: any, key: any) => any,
  replace: (h: any, key: any, data: any) => any,
  iter: (f: any, h: any) => any,
  filter_map_inplace: (f: any, h: any) => any,
  fold: (f: any, h: any, init: any) => any,
  length: (h: any) => any,
  randomize: (param: any) => any,
  is_randomized: (param: any) => any,
  stats: (h: any) => any,
  Make: (H: any) => any,
  MakeSeeded: (H: any) => any,
  hash: (x: any) => any,
  seeded_hash: (seed: any, x: any) => any,
  hash_param: (n1: any, n2: any, x: any) => any,
}*/
/** @type {{
  create: (opt: any, initial_size: any) => any,
  clear: (h: any) => any,
  reset: (h: any) => any,
  copy: (h: any) => any,
  add: (h: any, key: any, data: any) => any,
  find: (h: any, key: any) => any,
  find_opt: (h: any, key: any) => any,
  find_all: (h: any, key: any) => any,
  mem: (h: any, key: any) => any,
  remove: (h: any, key: any) => any,
  replace: (h: any, key: any, data: any) => any,
  iter: (f: any, h: any) => any,
  filter_map_inplace: (f: any, h: any) => any,
  fold: (f: any, h: any, init: any) => any,
  length: (h: any) => any,
  randomize: (param: any) => any,
  is_randomized: (param: any) => any,
  stats: (h: any) => any,
  Make: (H: any) => any,
  MakeSeeded: (H: any) => any,
  hash: (x: any) => any,
  seeded_hash: (seed: any, x: any) => any,
  hash_param: (n1: any, n2: any, x: any) => any,
}} */
module.exports = ((module.exports /*:: : any*/) /*:: :Exports */);
module.exports.create = module.exports[1];
module.exports.clear = module.exports[2];
module.exports.reset = module.exports[3];
module.exports.copy = module.exports[4];
module.exports.add = module.exports[5];
module.exports.find = module.exports[6];
module.exports.find_opt = module.exports[7];
module.exports.find_all = module.exports[8];
module.exports.mem = module.exports[9];
module.exports.remove = module.exports[10];
module.exports.replace = module.exports[11];
module.exports.iter = module.exports[12];
module.exports.filter_map_inplace = module.exports[13];
module.exports.fold = module.exports[14];
module.exports.length = module.exports[15];
module.exports.randomize = module.exports[16];
module.exports.is_randomized = module.exports[17];
module.exports.stats = module.exports[18];
module.exports.Make = module.exports[19];
module.exports.MakeSeeded = module.exports[20];
module.exports.hash = module.exports[21];
module.exports.seeded_hash = module.exports[22];
module.exports.hash_param = module.exports[23];

/* Hashing disabled */
