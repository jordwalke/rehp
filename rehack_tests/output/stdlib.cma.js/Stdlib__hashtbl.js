/**
 * @flow strict
 * Stdlib__hashtbl
 */

// @ts-check


"use strict";

var runtime = require("../runtime/runtime.js");
var caml_check_bound = runtime["caml_check_bound"];
var caml_compare = runtime["caml_compare"];
var caml_hash = runtime["caml_hash"];
var caml_make_vect = runtime["caml_make_vect"];
var string = runtime["caml_new_string"];
var caml_sys_getenv = runtime["caml_sys_getenv"];
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

var cst_OCAMLRUNPARAM = string("OCAMLRUNPARAM");
var cst_CAMLRUNPARAM = string("CAMLRUNPARAM");
var cst = string("");
var Stdlib_sys = require("./Stdlib__sys.js");
var Stdlib = require("./Stdlib.js");
var Stdlib_seq = require("./Stdlib__seq.js");
var Stdlib_array = require("./Stdlib__array.js");
var Assert_failure = require("../runtime/Assert_failure.js");
var CamlinternalLazy = require("./CamlinternalLazy.js");
var Stdlib_random = require("./Stdlib__random.js");
var Stdlib_string = require("./Stdlib__string.js");
var c_ = [0,0];
var b_ = [0,string("hashtbl.ml"),108,23];

function hash(x) {return caml_hash(10, 100, 0, x);}

function hash_param(n1, n2, x) {return caml_hash(n1, n2, 0, x);}

function seeded_hash(seed, x) {return caml_hash(10, 100, seed, x);}

function ongoing_traversal(h) {
  var aF_ = h.length - 1 < 4 ? 1 : 0;
  var aG_ = aF_ ? aF_ : h[4] < 0 ? 1 : 0;
  return aG_;
}

function flip_ongoing_traversal(h) {h[4] = - h[4] | 0;return 0;}

try {var e_ = caml_sys_getenv(cst_OCAMLRUNPARAM);var params = e_;}
catch(aD_) {
  aD_ = runtime["caml_wrap_exception"](aD_);
  if (aD_ !== Stdlib[8]) {throw caml_wrap_thrown_exception_reraise(aD_);}
  try {var d_ = caml_sys_getenv(cst_CAMLRUNPARAM);var a_ = d_;}
  catch(aE_) {
    aE_ = runtime["caml_wrap_exception"](aE_);
    if (aE_ !== Stdlib[8]) {throw caml_wrap_thrown_exception_reraise(aE_);}
    var a_ = cst;
  }
  var params = a_;
}

var randomized_default = call2(Stdlib_string[22], params, 82);
var randomized = [0,randomized_default];

function randomize(param) {randomized[1] = 1;return 0;}

function is_randomized(param) {return randomized[1];}

var prng = [246,function(aC_) {return call1(Stdlib_random[11][2], 0);}];

function power_2_above(x, n) {
  var x__0 = x;
  for (; ; ) {
    if (n <= x__0) {return x__0;}
    if (Stdlib_sys[14] < (x__0 * 2 | 0)) {return x__0;}
    var x__1 = x__0 * 2 | 0;
    var x__0 = x__1;
    continue;
  }
}

function create(opt, initial_size) {
  if (opt) {
    var sth = opt[1];
    var random = sth;
  }
  else var random = randomized[1];
  var s = power_2_above(16, initial_size);
  if (random) {
    var aA_ = runtime["caml_obj_tag"](prng);
    var aB_ = 250 === aA_ ?
      prng[1] :
      246 === aA_ ? call1(CamlinternalLazy[2], prng) : prng;
    var seed = call1(Stdlib_random[11][4], aB_);
  }
  else var seed = 0;
  return [0,0,caml_make_vect(s, 0),seed,s];
}

function clear(h) {
  h[1] = 0;
  var len = h[2].length - 1;
  var ay_ = len + -1 | 0;
  var ax_ = 0;
  if (! (ay_ < 0)) {
    var i = ax_;
    for (; ; ) {
      caml_check_bound(h[2], i)[i + 1] = 0;
      var az_ = i + 1 | 0;
      if (ay_ !== i) {var i = az_;continue;}
      break;
    }
  }
  return 0;
}

function reset(h) {
  var len = h[2].length - 1;
  if (4 <= h.length - 1) {
    if (len !== call1(Stdlib[18], h[4])) {
      h[1] = 0;
      h[2] = caml_make_vect(call1(Stdlib[18], h[4]), 0);
      return 0;
    }
  }
  return clear(h);
}

function copy_bucketlist(param) {
  if (param) {
    var key = param[1];
    var data = param[2];
    var next = param[3];
    var loop = function(prec, param) {
      var prec__0 = prec;
      var param__0 = param;
      for (; ; ) {
        if (param__0) {
          var key = param__0[1];
          var data = param__0[2];
          var next = param__0[3];
          var r = [0,key,data,next];
          if (prec__0) {
            prec__0[3] = r;
            var prec__0 = r;
            var param__0 = next;
            continue;
          }
          throw caml_wrap_thrown_exception([0,Assert_failure,b_]);
        }
        return 0;
      }
    };
    var r = [0,key,data,next];
    loop(r, next);
    return r;
  }
  return 0;
}

function copy(h) {
  var au_ = h[4];
  var av_ = h[3];
  var aw_ = call2(Stdlib_array[15], copy_bucketlist, h[2]);
  return [0,h[1],aw_,av_,au_];
}

function length(h) {return h[1];}

function resize(indexfun, h) {
  var odata = h[2];
  var osize = odata.length - 1;
  var nsize = osize * 2 | 0;
  var al_ = nsize < Stdlib_sys[14] ? 1 : 0;
  if (al_) {
    var ndata = caml_make_vect(nsize, 0);
    var ndata_tail = caml_make_vect(nsize, 0);
    var inplace = 1 - ongoing_traversal(h);
    h[2] = ndata;
    var insert_bucket = function(cell) {
      var cell__0 = cell;
      for (; ; ) {
        if (cell__0) {
          var key = cell__0[1];
          var data = cell__0[2];
          var next = cell__0[3];
          var cell__1 = inplace ? cell__0 : [0,key,data,0];
          var nidx = call2(indexfun, h, key);
          var match = caml_check_bound(ndata_tail, nidx)[nidx + 1];
          if (match) match[3] =
            cell__1;
          else caml_check_bound(ndata, nidx)[nidx + 1] = cell__1;
          caml_check_bound(ndata_tail, nidx)[nidx + 1] = cell__1;
          var cell__0 = next;
          continue;
        }
        return 0;
      }
    };
    var an_ = osize + -1 | 0;
    var am_ = 0;
    if (! (an_ < 0)) {
      var i__0 = am_;
      for (; ; ) {
        insert_bucket(caml_check_bound(odata, i__0)[i__0 + 1]);
        var at_ = i__0 + 1 | 0;
        if (an_ !== i__0) {var i__0 = at_;continue;}
        break;
      }
    }
    if (inplace) {
      var ap_ = nsize + -1 | 0;
      var ao_ = 0;
      if (! (ap_ < 0)) {
        var i = ao_;
        for (; ; ) {
          var match = caml_check_bound(ndata_tail, i)[i + 1];
          if (match) {match[3] = 0;}
          var as_ = i + 1 | 0;
          if (ap_ !== i) {var i = as_;continue;}
          break;
        }
      }
      var aq_ = 0;
    }
    else var aq_ = inplace;
    var ar_ = aq_;
  }
  else var ar_ = al_;
  return ar_;
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
  var ak_ = h[2].length - 1 << 1 < h[1] ? 1 : 0;
  return ak_ ? resize(key_index, h) : ak_;
}

function remove_bucket(h, i, key, prec, c) {
  var prec__0 = prec;
  var c__0 = c;
  for (; ; ) {
    if (c__0) {
      var k = c__0[1];
      var next = c__0[3];
      if (0 === caml_compare(k, key)) {
        h[1] = h[1] + -1 | 0;
        if (prec__0) {prec__0[3] = next;return 0;}
        caml_check_bound(h[2], i)[i + 1] = next;
        return 0;
      }
      var prec__0 = c__0;
      var c__0 = next;
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
  var param__0 = param;
  for (; ; ) {
    if (param__0) {
      var k = param__0[1];
      var data = param__0[2];
      var next = param__0[3];
      if (0 === caml_compare(key, k)) {return data;}
      var param__0 = next;
      continue;
    }
    throw caml_wrap_thrown_exception(Stdlib[8]);
  }
}

function find(h, key) {
  var aj_ = key_index(h, key);
  var match = caml_check_bound(h[2], aj_)[aj_ + 1];
  if (match) {
    var k1 = match[1];
    var d1 = match[2];
    var next1 = match[3];
    if (0 === caml_compare(key, k1)) {return d1;}
    if (next1) {
      var k2 = next1[1];
      var d2 = next1[2];
      var next2 = next1[3];
      if (0 === caml_compare(key, k2)) {return d2;}
      if (next2) {
        var k3 = next2[1];
        var d3 = next2[2];
        var next3 = next2[3];
        return 0 === caml_compare(key, k3) ? d3 : find_rec(key, next3);
      }
      throw caml_wrap_thrown_exception(Stdlib[8]);
    }
    throw caml_wrap_thrown_exception(Stdlib[8]);
  }
  throw caml_wrap_thrown_exception(Stdlib[8]);
}

function find_rec_opt(key, param) {
  var param__0 = param;
  for (; ; ) {
    if (param__0) {
      var k = param__0[1];
      var data = param__0[2];
      var next = param__0[3];
      if (0 === caml_compare(key, k)) {return [0,data];}
      var param__0 = next;
      continue;
    }
    return 0;
  }
}

function find_opt(h, key) {
  var ai_ = key_index(h, key);
  var match = caml_check_bound(h[2], ai_)[ai_ + 1];
  if (match) {
    var k1 = match[1];
    var d1 = match[2];
    var next1 = match[3];
    if (0 === caml_compare(key, k1)) {return [0,d1];}
    if (next1) {
      var k2 = next1[1];
      var d2 = next1[2];
      var next2 = next1[3];
      if (0 === caml_compare(key, k2)) {return [0,d2];}
      if (next2) {
        var k3 = next2[1];
        var d3 = next2[2];
        var next3 = next2[3];
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
    var param__0 = param;
    for (; ; ) {
      if (param__0) {
        var k = param__0[1];
        var data = param__0[2];
        var next = param__0[3];
        if (0 === caml_compare(k, key)) {
          return [0,data,find_in_bucket(next)];
        }
        var param__0 = next;
        continue;
      }
      return 0;
    }
  }
  var ah_ = key_index(h, key);
  return find_in_bucket(caml_check_bound(h[2], ah_)[ah_ + 1]);
}

function replace_bucket(key, data, param) {
  var param__0 = param;
  for (; ; ) {
    if (param__0) {
      var k = param__0[1];
      var next = param__0[3];
      if (0 === caml_compare(k, key)) {
        param__0[1] = key;
        param__0[2] = data;
        return 0;
      }
      var param__0 = next;
      continue;
    }
    return 1;
  }
}

function replace(h, key, data) {
  var i = key_index(h, key);
  var l = caml_check_bound(h[2], i)[i + 1];
  var ae_ = replace_bucket(key, data, l);
  if (ae_) {
    caml_check_bound(h[2], i)[i + 1] = [0,key,data,l];
    h[1] = h[1] + 1 | 0;
    var af_ = h[2].length - 1 << 1 < h[1] ? 1 : 0;
    if (af_) {return resize(key_index, h);}
    var ag_ = af_;
  }
  else var ag_ = ae_;
  return ag_;
}

function mem(h, key) {
  function mem_in_bucket(param) {
    var param__0 = param;
    for (; ; ) {
      if (param__0) {
        var k = param__0[1];
        var next = param__0[3];
        var ad_ = 0 === caml_compare(k, key) ? 1 : 0;
        if (ad_) {return ad_;}
        var param__0 = next;
        continue;
      }
      return 0;
    }
  }
  var ac_ = key_index(h, key);
  return mem_in_bucket(caml_check_bound(h[2], ac_)[ac_ + 1]);
}

function iter(f, h) {
  function do_bucket(param) {
    var param__0 = param;
    for (; ; ) {
      if (param__0) {
        var key = param__0[1];
        var data = param__0[2];
        var param__1 = param__0[3];
        call2(f, key, data);
        var param__0 = param__1;
        continue;
      }
      return 0;
    }
  }
  var old_trav = ongoing_traversal(h);
  if (1 - old_trav) {flip_ongoing_traversal(h);}
  try {
    var d = h[2];
    var Y_ = d.length - 1 + -1 | 0;
    var X_ = 0;
    if (! (Y_ < 0)) {
      var i = X_;
      for (; ; ) {
        do_bucket(caml_check_bound(d, i)[i + 1]);
        var ab_ = i + 1 | 0;
        if (Y_ !== i) {var i = ab_;continue;}
        break;
      }
    }
    var Z_ = 1 - old_trav;
    var aa_ = Z_ ? flip_ongoing_traversal(h) : Z_;
    return aa_;
  }
  catch(exn) {
    exn = runtime["caml_wrap_exception"](exn);
    if (old_trav) {throw caml_wrap_thrown_exception_reraise(exn);}
    flip_ongoing_traversal(h);
    throw caml_wrap_thrown_exception_reraise(exn);
  }
}

function filter_map_inplace_bucket(f, h, i, prec, slot) {
  var prec__0 = prec;
  var slot__0 = slot;
  for (; ; ) {
    if (slot__0) {
      var key = slot__0[1];
      var data = slot__0[2];
      var next = slot__0[3];
      var match = call2(f, key, data);
      if (match) {
        var data__0 = match[1];
        if (prec__0) prec__0[3] = slot__0;
        else caml_check_bound(h[2], i)[i + 1] = slot__0;
        slot__0[2] = data__0;
        var prec__0 = slot__0;
        var slot__0 = next;
        continue;
      }
      h[1] = h[1] + -1 | 0;
      var slot__0 = next;
      continue;
    }
    if (prec__0) {prec__0[3] = 0;return 0;}
    caml_check_bound(h[2], i)[i + 1] = 0;
    return 0;
  }
}

function filter_map_inplace(f, h) {
  var d = h[2];
  var old_trav = ongoing_traversal(h);
  if (1 - old_trav) {flip_ongoing_traversal(h);}
  try {
    var U_ = d.length - 1 + -1 | 0;
    var T_ = 0;
    if (! (U_ < 0)) {
      var i = T_;
      for (; ; ) {
        filter_map_inplace_bucket(f, h, i, 0, caml_check_bound(h[2], i)[i + 1]
        );
        var W_ = i + 1 | 0;
        if (U_ !== i) {var i = W_;continue;}
        break;
      }
    }
    var V_ = 0;
    return V_;
  }
  catch(exn) {
    exn = runtime["caml_wrap_exception"](exn);
    if (old_trav) {throw caml_wrap_thrown_exception_reraise(exn);}
    flip_ongoing_traversal(h);
    throw caml_wrap_thrown_exception_reraise(exn);
  }
}

function fold(f, h, init) {
  function do_bucket(b, accu) {
    var b__0 = b;
    var accu__0 = accu;
    for (; ; ) {
      if (b__0) {
        var key = b__0[1];
        var data = b__0[2];
        var b__1 = b__0[3];
        var accu__1 = call3(f, key, data, accu__0);
        var b__0 = b__1;
        var accu__0 = accu__1;
        continue;
      }
      return accu__0;
    }
  }
  var old_trav = ongoing_traversal(h);
  if (1 - old_trav) {flip_ongoing_traversal(h);}
  try {
    var d = h[2];
    var accu = [0,init];
    var P_ = d.length - 1 + -1 | 0;
    var O_ = 0;
    if (! (P_ < 0)) {
      var i = O_;
      for (; ; ) {
        var R_ = accu[1];
        accu[1] = do_bucket(caml_check_bound(d, i)[i + 1], R_);
        var S_ = i + 1 | 0;
        if (P_ !== i) {var i = S_;continue;}
        break;
      }
    }
    if (1 - old_trav) {flip_ongoing_traversal(h);}
    var Q_ = accu[1];
    return Q_;
  }
  catch(exn) {
    exn = runtime["caml_wrap_exception"](exn);
    if (old_trav) {throw caml_wrap_thrown_exception_reraise(exn);}
    flip_ongoing_traversal(h);
    throw caml_wrap_thrown_exception_reraise(exn);
  }
}

function bucket_length(accu, param) {
  var accu__0 = accu;
  var param__0 = param;
  for (; ; ) {
    if (param__0) {
      var param__1 = param__0[3];
      var accu__1 = accu__0 + 1 | 0;
      var accu__0 = accu__1;
      var param__0 = param__1;
      continue;
    }
    return accu__0;
  }
}

function stats(h) {
  var I_ = h[2];
  var J_ = 0;
  function K_(m, b) {
    var N_ = bucket_length(0, b);
    return call2(Stdlib[17], m, N_);
  }
  var mbl = call3(Stdlib_array[17], K_, J_, I_);
  var histo = caml_make_vect(mbl + 1 | 0, 0);
  var L_ = h[2];
  function M_(b) {
    var l = bucket_length(0, b);
    histo[l + 1] = caml_check_bound(histo, l)[l + 1] + 1 | 0;
    return 0;
  }
  call2(Stdlib_array[13], M_, L_);
  return [0,h[1],h[2].length - 1,mbl,histo];
}

function to_seq(tbl) {
  var tbl_data = tbl[2];
  function aux(i, buck, param) {
    var i__0 = i;
    var buck__0 = buck;
    for (; ; ) {
      if (buck__0) {
        var key = buck__0[1];
        var data = buck__0[2];
        var next = buck__0[3];
        return [0,[0,key,data],function(H_) {return aux(i__0, next, H_);}];
      }
      if (i__0 === tbl_data.length - 1) {return 0;}
      var buck__1 = caml_check_bound(tbl_data, i__0)[i__0 + 1];
      var i__1 = i__0 + 1 | 0;
      var i__0 = i__1;
      var buck__0 = buck__1;
      continue;
    }
  }
  var E_ = 0;
  var F_ = 0;
  return function(G_) {return aux(F_, E_, G_);};
}

function to_seq_keys(m) {
  var B_ = to_seq(m);
  function C_(D_) {return D_[1];}
  return call2(Stdlib_seq[3], C_, B_);
}

function to_seq_values(m) {
  var y_ = to_seq(m);
  function z_(A_) {return A_[2];}
  return call2(Stdlib_seq[3], z_, y_);
}

function add_seq(tbl, i) {
  function x_(param) {
    var v = param[2];
    var k = param[1];
    return add(tbl, k, v);
  }
  return call2(Stdlib_seq[8], x_, i);
}

function replace_seq(tbl, i) {
  function w_(param) {
    var v = param[2];
    var k = param[1];
    return replace(tbl, k, v);
  }
  return call2(Stdlib_seq[8], w_, i);
}

function of_seq(i) {var tbl = create(0, 16);replace_seq(tbl, i);return tbl;}

function MakeSeeded(H) {
  function key_index(h, key) {
    var v_ = h[2].length - 1 + -1 | 0;
    return call2(H[2], h[3], key) & v_;
  }
  function add(h, key, data) {
    var i = key_index(h, key);
    var bucket = [0,key,data,caml_check_bound(h[2], i)[i + 1]];
    caml_check_bound(h[2], i)[i + 1] = bucket;
    h[1] = h[1] + 1 | 0;
    var u_ = h[2].length - 1 << 1 < h[1] ? 1 : 0;
    return u_ ? resize(key_index, h) : u_;
  }
  function remove_bucket(h, i, key, prec, c) {
    var prec__0 = prec;
    var c__0 = c;
    for (; ; ) {
      if (c__0) {
        var k = c__0[1];
        var next = c__0[3];
        if (call2(H[1], k, key)) {
          h[1] = h[1] + -1 | 0;
          if (prec__0) {prec__0[3] = next;return 0;}
          caml_check_bound(h[2], i)[i + 1] = next;
          return 0;
        }
        var prec__0 = c__0;
        var c__0 = next;
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
    var param__0 = param;
    for (; ; ) {
      if (param__0) {
        var k = param__0[1];
        var data = param__0[2];
        var next = param__0[3];
        if (call2(H[1], key, k)) {return data;}
        var param__0 = next;
        continue;
      }
      throw caml_wrap_thrown_exception(Stdlib[8]);
    }
  }
  function find(h, key) {
    var t_ = key_index(h, key);
    var match = caml_check_bound(h[2], t_)[t_ + 1];
    if (match) {
      var k1 = match[1];
      var d1 = match[2];
      var next1 = match[3];
      if (call2(H[1], key, k1)) {return d1;}
      if (next1) {
        var k2 = next1[1];
        var d2 = next1[2];
        var next2 = next1[3];
        if (call2(H[1], key, k2)) {return d2;}
        if (next2) {
          var k3 = next2[1];
          var d3 = next2[2];
          var next3 = next2[3];
          return call2(H[1], key, k3) ? d3 : find_rec(key, next3);
        }
        throw caml_wrap_thrown_exception(Stdlib[8]);
      }
      throw caml_wrap_thrown_exception(Stdlib[8]);
    }
    throw caml_wrap_thrown_exception(Stdlib[8]);
  }
  function find_rec_opt(key, param) {
    var param__0 = param;
    for (; ; ) {
      if (param__0) {
        var k = param__0[1];
        var data = param__0[2];
        var next = param__0[3];
        if (call2(H[1], key, k)) {return [0,data];}
        var param__0 = next;
        continue;
      }
      return 0;
    }
  }
  function find_opt(h, key) {
    var s_ = key_index(h, key);
    var match = caml_check_bound(h[2], s_)[s_ + 1];
    if (match) {
      var k1 = match[1];
      var d1 = match[2];
      var next1 = match[3];
      if (call2(H[1], key, k1)) {return [0,d1];}
      if (next1) {
        var k2 = next1[1];
        var d2 = next1[2];
        var next2 = next1[3];
        if (call2(H[1], key, k2)) {return [0,d2];}
        if (next2) {
          var k3 = next2[1];
          var d3 = next2[2];
          var next3 = next2[3];
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
      var param__0 = param;
      for (; ; ) {
        if (param__0) {
          var k = param__0[1];
          var d = param__0[2];
          var next = param__0[3];
          if (call2(H[1], k, key)) {return [0,d,find_in_bucket(next)];}
          var param__0 = next;
          continue;
        }
        return 0;
      }
    }
    var r_ = key_index(h, key);
    return find_in_bucket(caml_check_bound(h[2], r_)[r_ + 1]);
  }
  function replace_bucket(key, data, param) {
    var param__0 = param;
    for (; ; ) {
      if (param__0) {
        var k = param__0[1];
        var next = param__0[3];
        if (call2(H[1], k, key)) {
          param__0[1] = key;
          param__0[2] = data;
          return 0;
        }
        var param__0 = next;
        continue;
      }
      return 1;
    }
  }
  function replace(h, key, data) {
    var i = key_index(h, key);
    var l = caml_check_bound(h[2], i)[i + 1];
    var o_ = replace_bucket(key, data, l);
    if (o_) {
      caml_check_bound(h[2], i)[i + 1] = [0,key,data,l];
      h[1] = h[1] + 1 | 0;
      var p_ = h[2].length - 1 << 1 < h[1] ? 1 : 0;
      if (p_) {return resize(key_index, h);}
      var q_ = p_;
    }
    else var q_ = o_;
    return q_;
  }
  function mem(h, key) {
    function mem_in_bucket(param) {
      var param__0 = param;
      for (; ; ) {
        if (param__0) {
          var k = param__0[1];
          var next = param__0[3];
          var n_ = call2(H[1], k, key);
          if (n_) {return n_;}
          var param__0 = next;
          continue;
        }
        return 0;
      }
    }
    var m_ = key_index(h, key);
    return mem_in_bucket(caml_check_bound(h[2], m_)[m_ + 1]);
  }
  function add_seq(tbl, i) {
    function l_(param) {
      var v = param[2];
      var k = param[1];
      return add(tbl, k, v);
    }
    return call2(Stdlib_seq[8], l_, i);
  }
  function replace_seq(tbl, i) {
    function k_(param) {
      var v = param[2];
      var k = param[1];
      return replace(tbl, k, v);
    }
    return call2(Stdlib_seq[8], k_, i);
  }
  function of_seq(i) {var tbl = create(0, 16);replace_seq(tbl, i);return tbl;}
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
    stats,
    to_seq,
    to_seq_keys,
    to_seq_values,
    add_seq,
    replace_seq,
    of_seq
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
  var to_seq = include[17];
  var to_seq_keys = include[18];
  var to_seq_values = include[19];
  var add_seq = include[20];
  var replace_seq = include[21];
  var j_ = include[1];
  function create(sz) {return call2(j_, c_, sz);}
  function of_seq(i) {
    var tbl = create(16);
    call2(replace_seq, tbl, i);
    return tbl;
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
    stats,
    to_seq,
    to_seq_keys,
    to_seq_values,
    add_seq,
    replace_seq,
    of_seq
  ];
}

var Stdlib_hashtbl = [
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
  to_seq,
  to_seq_keys,
  to_seq_values,
  add_seq,
  replace_seq,
  of_seq,
  Make,
  MakeSeeded,
  hash,
  seeded_hash,
  hash_param,
  function(i_, h_, g_, f_) {return caml_hash(i_, h_, g_, f_);}
];

module.exports = Stdlib_hashtbl;

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
  _length_: (h: any) => any,
  randomize: (param: any) => any,
  is_randomized: (param: any) => any,
  stats: (h: any) => any,
  to_seq: (tbl: any) => any,
  to_seq_keys: (m: any) => any,
  to_seq_values: (m: any) => any,
  add_seq: (tbl: any, i: any) => any,
  replace_seq: (tbl: any, i: any) => any,
  of_seq: (i: any) => any,
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
  _length_: (h: any) => any,
  randomize: (param: any) => any,
  is_randomized: (param: any) => any,
  stats: (h: any) => any,
  to_seq: (tbl: any) => any,
  to_seq_keys: (m: any) => any,
  to_seq_values: (m: any) => any,
  add_seq: (tbl: any, i: any) => any,
  replace_seq: (tbl: any, i: any) => any,
  of_seq: (i: any) => any,
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
module.exports._length_ = module.exports[15];
module.exports.randomize = module.exports[16];
module.exports.is_randomized = module.exports[17];
module.exports.stats = module.exports[18];
module.exports.to_seq = module.exports[19];
module.exports.to_seq_keys = module.exports[20];
module.exports.to_seq_values = module.exports[21];
module.exports.add_seq = module.exports[22];
module.exports.replace_seq = module.exports[23];
module.exports.of_seq = module.exports[24];
module.exports.Make = module.exports[25];
module.exports.MakeSeeded = module.exports[26];
module.exports.hash = module.exports[27];
module.exports.seeded_hash = module.exports[28];
module.exports.hash_param = module.exports[29];

/* Hashing disabled */
