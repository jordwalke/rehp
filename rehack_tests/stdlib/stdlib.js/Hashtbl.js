/**
 * Hashtbl
 * @providesModule Hashtbl
 */
"use strict";
var Array_ = require('Array_.js');
var CamlinternalLazy = require('CamlinternalLazy.js');
var Pervasives = require('Pervasives.js');
var Random = require('Random.js');
var String_ = require('String_.js');
var Sys = require('Sys.js');
var Not_found = require('Not_found.js');
var Assert_failure = require('Assert_failure.js');
var runtime = require('runtime.js');

let joo_global_object = global;


var runtime = joo_global_object.jsoo_runtime;
var caml_check_bound = runtime.caml_check_bound;
var caml_compare = runtime.caml_compare;
var caml_hash = runtime.caml_hash;
var caml_make_vect = runtime.caml_make_vect;
var caml_new_string = runtime.caml_new_string;
var caml_sys_getenv = runtime.caml_sys_getenv;
var caml_wrap_exception = runtime.caml_wrap_exception;

function caml_call1(f, a0) {
  return f.length == 1 ? f(a0) : runtime.caml_call_gen(f, [a0]);
}

function caml_call2(f, a0, a1) {
  return f.length == 2 ? f(a0, a1) : runtime.caml_call_gen(f, [a0,a1]);
}

function caml_call3(f, a0, a1, a2) {
  return f.length == 3 ? f(a0, a1, a2) : runtime.caml_call_gen(f, [a0,a1,a2]);
}

var global_data = runtime.caml_get_global_data();
var cst_OCAMLRUNPARAM = caml_new_string("OCAMLRUNPARAM");
var cst_CAMLRUNPARAM = caml_new_string("CAMLRUNPARAM");
var cst = caml_new_string("");
var Sys = global_data.Sys;
var Not_found = global_data.Not_found;
var Pervasives = global_data.Pervasives;
var Array = global_data.Array;
var Assert_failure = global_data.Assert_failure;
var CamlinternalLazy = global_data.CamlinternalLazy;
var Random = global_data.Random;
var String = global_data.String;
var qg = [0,0];
var qf = [0,caml_new_string("hashtbl.ml"),108,23];

function hash(x) {return caml_hash(10, 100, 0, x);}

function hash_param(n1, n2, x) {return caml_hash(n1, n2, 0, x);}

function seeded_hash(seed, x) {return caml_hash(10, 100, seed, x);}

function ongoing_traversal(h) {
  var rk = h.length - 1 < 4 ? 1 : 0;
  var rl = rk || (h[4] < 0 ? 1 : 0);
  return rl;
}

function flip_ongoing_traversal(h) {h[4] = - h[4] | 0;return 0;}

try {var qi = caml_sys_getenv(cst_OCAMLRUNPARAM);var params = qi;}
catch(ri) {
  ri = caml_wrap_exception(ri);
  if (ri !== Not_found) {
    throw runtime.caml_wrap_thrown_exception_reraise(ri);
  }
  try {var qh = caml_sys_getenv(cst_CAMLRUNPARAM);var qe = qh;}
  catch(rj) {
    rj = caml_wrap_exception(rj);
    if (rj !== Not_found) {
      throw runtime.caml_wrap_thrown_exception_reraise(rj);
    }
    var qe = cst;
  }
  var params = qe;
}

var randomized_default = caml_call2(String[22], params, 82);
var randomized = [0,randomized_default];

function randomize(param) {randomized[1] = 1;return 0;}

function is_randomized(param) {return randomized[1];}

var prng = [246,function(rh) {return caml_call1(Random[11][2], 0);}];

function power_2_above(x, n) {
  var x__0 = x;
  for (; ; ) {
    if (n <= x__0) {return x__0;}
    if (Sys[14] < (x__0 * 2 | 0)) {return x__0;}
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
    var rf = runtime.caml_obj_tag(prng);
    var rg = 250 === rf ?
      prng[1] :
      246 === rf ? caml_call1(CamlinternalLazy[2], prng) : prng;
    var seed = caml_call1(Random[11][4], rg);
  }
  else var seed = 0;
  return [0,0,caml_make_vect(s, 0),seed,s];
}

function clear(h) {
  h[1] = 0;
  var len = h[2].length - 1;
  var rd = len + -1 | 0;
  var rc = 0;
  if (! (rd < 0)) {
    var i = rc;
    for (; ; ) {
      caml_check_bound(h[2], i)[i + 1] = 0;
      var re = i + 1 | 0;
      if (rd !== i) {var i = re;continue;}
      break;
    }
  }
  return 0;
}

function reset(h) {
  var len = h[2].length - 1;
  if (4 <= h.length - 1) {
    if (len !== caml_call1(Pervasives[6], h[4])) {
      h[1] = 0;
      h[2] = caml_make_vect(caml_call1(Pervasives[6], h[4]), 0);
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
          throw runtime.caml_wrap_thrown_exception([0,Assert_failure,qf]);
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
  var q_ = h[4];
  var ra = h[3];
  var rb = caml_call2(Array[15], copy_bucketlist, h[2]);
  return [0,h[1],rb,ra,q_];
}

function length(h) {return h[1];}

function resize(indexfun, h) {
  var odata = h[2];
  var osize = odata.length - 1;
  var nsize = osize * 2 | 0;
  var q1 = nsize < Sys[14] ? 1 : 0;
  if (q1) {
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
          var nidx = caml_call2(indexfun, h, key);
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
    var q3 = osize + -1 | 0;
    var q2 = 0;
    if (! (q3 < 0)) {
      var i__0 = q2;
      for (; ; ) {
        insert_bucket(caml_check_bound(odata, i__0)[i__0 + 1]);
        var q9 = i__0 + 1 | 0;
        if (q3 !== i__0) {var i__0 = q9;continue;}
        break;
      }
    }
    if (inplace) {
      var q5 = nsize + -1 | 0;
      var q4 = 0;
      if (! (q5 < 0)) {
        var i = q4;
        for (; ; ) {
          var match = caml_check_bound(ndata_tail, i)[i + 1];
          if (match) {match[3] = 0;}
          var q8 = i + 1 | 0;
          if (q5 !== i) {var i = q8;continue;}
          break;
        }
      }
      var q6 = 0;
    }
    else var q6 = inplace;
    var q7 = q6;
  }
  else var q7 = q1;
  return q7;
}

function key_index(h, key) {
  return 3 <= h.length - 1 ?
    caml_hash(10, 100, h[3], key) & (h[2].length - 1 + -1 | 0) :
    runtime.caml_mod(
     runtime.caml_hash_univ_param(10, 100, key),
     h[2].length - 1
   );
}

function add(h, key, data) {
  var i = key_index(h, key);
  var bucket = [0,key,data,caml_check_bound(h[2], i)[i + 1]];
  caml_check_bound(h[2], i)[i + 1] = bucket;
  h[1] = h[1] + 1 | 0;
  var q0 = h[2].length - 1 << 1 < h[1] ? 1 : 0;
  return q0 ? resize(key_index, h) : q0;
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
        return prec__0 ?
          (prec__0[3] = next,0) :
          caml_check_bound(h[2], i)[i + 1] = next;
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
    throw runtime.caml_wrap_thrown_exception(Not_found);
  }
}

function find(h, key) {
  var qZ = key_index(h, key);
  var match = caml_check_bound(h[2], qZ)[qZ + 1];
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
      throw runtime.caml_wrap_thrown_exception(Not_found);
    }
    throw runtime.caml_wrap_thrown_exception(Not_found);
  }
  throw runtime.caml_wrap_thrown_exception(Not_found);
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
  var qY = key_index(h, key);
  var match = caml_check_bound(h[2], qY)[qY + 1];
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
  var qX = key_index(h, key);
  return find_in_bucket(caml_check_bound(h[2], qX)[qX + 1]);
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
  var qU = replace_bucket(key, data, l);
  if (qU) {
    caml_check_bound(h[2], i)[i + 1] = [0,key,data,l];
    h[1] = h[1] + 1 | 0;
    var qV = h[2].length - 1 << 1 < h[1] ? 1 : 0;
    if (qV) {return resize(key_index, h);}
    var qW = qV;
  }
  else var qW = qU;
  return qW;
}

function mem(h, key) {
  function mem_in_bucket(param) {
    var param__0 = param;
    for (; ; ) {
      if (param__0) {
        var k = param__0[1];
        var next = param__0[3];
        var qT = 0 === caml_compare(k, key) ? 1 : 0;
        if (qT) {return qT;}
        var param__0 = next;
        continue;
      }
      return 0;
    }
  }
  var qS = key_index(h, key);
  return mem_in_bucket(caml_check_bound(h[2], qS)[qS + 1]);
}

function iter(f, h) {
  function do_bucket(param) {
    var param__0 = param;
    for (; ; ) {
      if (param__0) {
        var key = param__0[1];
        var data = param__0[2];
        var param__1 = param__0[3];
        caml_call2(f, key, data);
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
    var qO = d.length - 1 + -1 | 0;
    var qN = 0;
    if (! (qO < 0)) {
      var i = qN;
      for (; ; ) {
        do_bucket(caml_check_bound(d, i)[i + 1]);
        var qR = i + 1 | 0;
        if (qO !== i) {var i = qR;continue;}
        break;
      }
    }
    var qP = 1 - old_trav;
    var qQ = qP ? flip_ongoing_traversal(h) : qP;
    return qQ;
  }
  catch(exn) {
    exn = caml_wrap_exception(exn);
    if (old_trav) {throw runtime.caml_wrap_thrown_exception_reraise(exn);}
    flip_ongoing_traversal(h);
    throw runtime.caml_wrap_thrown_exception_reraise(exn);
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
      var match = caml_call2(f, key, data);
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
    return prec__0 ? (prec__0[3] = 0,0) : caml_check_bound(h[2], i)[i + 1] = 0;
  }
}

function filter_map_inplace(f, h) {
  var d = h[2];
  var old_trav = ongoing_traversal(h);
  if (1 - old_trav) {flip_ongoing_traversal(h);}
  try {
    var qK = d.length - 1 + -1 | 0;
    var qJ = 0;
    if (! (qK < 0)) {
      var i = qJ;
      for (; ; ) {
        filter_map_inplace_bucket(f, h, i, 0, caml_check_bound(h[2], i)[i + 1]
        );
        var qM = i + 1 | 0;
        if (qK !== i) {var i = qM;continue;}
        break;
      }
    }
    var qL = 0;
    return qL;
  }
  catch(exn) {
    exn = caml_wrap_exception(exn);
    if (old_trav) {throw runtime.caml_wrap_thrown_exception_reraise(exn);}
    flip_ongoing_traversal(h);
    throw runtime.caml_wrap_thrown_exception_reraise(exn);
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
        var accu__1 = caml_call3(f, key, data, accu__0);
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
    var qF = d.length - 1 + -1 | 0;
    var qE = 0;
    if (! (qF < 0)) {
      var i = qE;
      for (; ; ) {
        var qH = accu[1];
        accu[1] = do_bucket(caml_check_bound(d, i)[i + 1], qH);
        var qI = i + 1 | 0;
        if (qF !== i) {var i = qI;continue;}
        break;
      }
    }
    if (1 - old_trav) {flip_ongoing_traversal(h);}
    var qG = accu[1];
    return qG;
  }
  catch(exn) {
    exn = caml_wrap_exception(exn);
    if (old_trav) {throw runtime.caml_wrap_thrown_exception_reraise(exn);}
    flip_ongoing_traversal(h);
    throw runtime.caml_wrap_thrown_exception_reraise(exn);
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
  var qy = h[2];
  var qz = 0;
  function qA(m, b) {
    var qD = bucket_length(0, b);
    return caml_call2(Pervasives[5], m, qD);
  }
  var mbl = caml_call3(Array[17], qA, qz, qy);
  var histo = caml_make_vect(mbl + 1 | 0, 0);
  var qB = h[2];
  function qC(b) {
    var l = bucket_length(0, b);
    return histo[l + 1] = caml_check_bound(histo, l)[l + 1] + 1 | 0;
  }
  caml_call2(Array[13], qC, qB);
  return [0,h[1],h[2].length - 1,mbl,histo];
}

function MakeSeeded(H) {
  function key_index(h, key) {
    var qx = h[2].length - 1 + -1 | 0;
    return caml_call2(H[2], h[3], key) & qx;
  }
  function add(h, key, data) {
    var i = key_index(h, key);
    var bucket = [0,key,data,caml_check_bound(h[2], i)[i + 1]];
    caml_check_bound(h[2], i)[i + 1] = bucket;
    h[1] = h[1] + 1 | 0;
    var qw = h[2].length - 1 << 1 < h[1] ? 1 : 0;
    return qw ? resize(key_index, h) : qw;
  }
  function remove_bucket(h, i, key, prec, c) {
    var prec__0 = prec;
    var c__0 = c;
    for (; ; ) {
      if (c__0) {
        var k = c__0[1];
        var next = c__0[3];
        if (caml_call2(H[1], k, key)) {
          h[1] = h[1] + -1 | 0;
          return prec__0 ?
            (prec__0[3] = next,0) :
            caml_check_bound(h[2], i)[i + 1] = next;
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
        if (caml_call2(H[1], key, k)) {return data;}
        var param__0 = next;
        continue;
      }
      throw runtime.caml_wrap_thrown_exception(Not_found);
    }
  }
  function find(h, key) {
    var qv = key_index(h, key);
    var match = caml_check_bound(h[2], qv)[qv + 1];
    if (match) {
      var k1 = match[1];
      var d1 = match[2];
      var next1 = match[3];
      if (caml_call2(H[1], key, k1)) {return d1;}
      if (next1) {
        var k2 = next1[1];
        var d2 = next1[2];
        var next2 = next1[3];
        if (caml_call2(H[1], key, k2)) {return d2;}
        if (next2) {
          var k3 = next2[1];
          var d3 = next2[2];
          var next3 = next2[3];
          return caml_call2(H[1], key, k3) ? d3 : find_rec(key, next3);
        }
        throw runtime.caml_wrap_thrown_exception(Not_found);
      }
      throw runtime.caml_wrap_thrown_exception(Not_found);
    }
    throw runtime.caml_wrap_thrown_exception(Not_found);
  }
  function find_rec_opt(key, param) {
    var param__0 = param;
    for (; ; ) {
      if (param__0) {
        var k = param__0[1];
        var data = param__0[2];
        var next = param__0[3];
        if (caml_call2(H[1], key, k)) {return [0,data];}
        var param__0 = next;
        continue;
      }
      return 0;
    }
  }
  function find_opt(h, key) {
    var qu = key_index(h, key);
    var match = caml_check_bound(h[2], qu)[qu + 1];
    if (match) {
      var k1 = match[1];
      var d1 = match[2];
      var next1 = match[3];
      if (caml_call2(H[1], key, k1)) {return [0,d1];}
      if (next1) {
        var k2 = next1[1];
        var d2 = next1[2];
        var next2 = next1[3];
        if (caml_call2(H[1], key, k2)) {return [0,d2];}
        if (next2) {
          var k3 = next2[1];
          var d3 = next2[2];
          var next3 = next2[3];
          return caml_call2(H[1], key, k3) ? [0,d3] : find_rec_opt(key, next3);
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
          if (caml_call2(H[1], k, key)) {return [0,d,find_in_bucket(next)];}
          var param__0 = next;
          continue;
        }
        return 0;
      }
    }
    var qt = key_index(h, key);
    return find_in_bucket(caml_check_bound(h[2], qt)[qt + 1]);
  }
  function replace_bucket(key, data, param) {
    var param__0 = param;
    for (; ; ) {
      if (param__0) {
        var k = param__0[1];
        var next = param__0[3];
        if (caml_call2(H[1], k, key)) {
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
    var qq = replace_bucket(key, data, l);
    if (qq) {
      caml_check_bound(h[2], i)[i + 1] = [0,key,data,l];
      h[1] = h[1] + 1 | 0;
      var qr = h[2].length - 1 << 1 < h[1] ? 1 : 0;
      if (qr) {return resize(key_index, h);}
      var qs = qr;
    }
    else var qs = qq;
    return qs;
  }
  function mem(h, key) {
    function mem_in_bucket(param) {
      var param__0 = param;
      for (; ; ) {
        if (param__0) {
          var k = param__0[1];
          var next = param__0[3];
          var qp = caml_call2(H[1], k, key);
          if (qp) {return qp;}
          var param__0 = next;
          continue;
        }
        return 0;
      }
    }
    var qo = key_index(h, key);
    return mem_in_bucket(caml_check_bound(h[2], qo)[qo + 1]);
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
  function hash(seed, x) {return caml_call1(H[2], x);}
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
  var qn = include[1];
  function create(sz) {return caml_call2(qn, qg, sz);}
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
  function(qm, ql, qk, qj) {return caml_hash(qm, ql, qk, qj);}
];

runtime.caml_register_global(13, Hashtbl, "Hashtbl");


module.exports = global.jsoo_runtime.caml_get_global_data().Hashtbl;