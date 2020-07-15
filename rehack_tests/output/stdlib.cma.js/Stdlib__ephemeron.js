/**
 * @flow strict
 * Stdlib__ephemeron
 */

// @ts-check


"use strict";

var runtime = require("../runtime/runtime.js");
var caml_check_bound = runtime["caml_check_bound"];
var caml_make_vect = runtime["caml_make_vect"];
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

function call5(f, a0, a1, a2, a3, a4) {
  return f.length === 5 ?
    f(a0, a1, a2, a3, a4) :
    runtime["caml_call_gen"](f, [a0,a1,a2,a3,a4]);
}

var Stdlib_obj = require("./Stdlib__obj.js");
var Stdlib_sys = require("./Stdlib__sys.js");
var Stdlib = require("./Stdlib.js");
var Stdlib_seq = require("./Stdlib__seq.js");
var Stdlib_array = require("./Stdlib__array.js");
var Stdlib_hashtbl = require("./Stdlib__hashtbl.js");
var CamlinternalLazy = require("./CamlinternalLazy.js");
var Stdlib_random = require("./Stdlib__random.js");
var c_ = [0,0];
var b_ = [0,0];
var a_ = [0,0];

function MakeSeeded(H) {
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
  var prng = [246,function(aJ_) {return call1(Stdlib_random[11][2], 0);}];
  function create(opt, initial_size) {
    if (opt) {
      var sth = opt[1];
      var random = sth;
    }
    else var random = call1(Stdlib_hashtbl[17], 0);
    var s = power_2_above(16, initial_size);
    if (random) {
      var aH_ = runtime["caml_obj_tag"](prng);
      var aI_ = 250 === aH_ ?
        prng[1] :
        246 === aH_ ? call1(CamlinternalLazy[2], prng) : prng;
      var seed = call1(Stdlib_random[11][4], aI_);
    }
    else var seed = 0;
    return [0,0,caml_make_vect(s, 0),seed,s];
  }
  function clear(h) {
    h[1] = 0;
    var len = h[2].length - 1;
    var aF_ = len + -1 | 0;
    var aE_ = 0;
    if (! (aF_ < 0)) {
      var i = aE_;
      for (; ; ) {
        caml_check_bound(h[2], i)[i + 1] = 0;
        var aG_ = i + 1 | 0;
        if (aF_ !== i) {var i = aG_;continue;}
        break;
      }
    }
    return 0;
  }
  function reset(h) {
    var len = h[2].length - 1;
    if (len === h[4]) {return clear(h);}
    h[1] = 0;
    h[2] = caml_make_vect(h[4], 0);
    return 0;
  }
  function copy(h) {
    var aB_ = h[4];
    var aC_ = h[3];
    var aD_ = call1(Stdlib_array[8], h[2]);
    return [0,h[1],aD_,aC_,aB_];
  }
  function key_index(h, hkey) {return hkey & (h[2].length - 1 + -1 | 0);}
  function clean(h) {
    function do_bucket(param) {
      var param__0 = param;
      for (; ; ) {
        if (param__0) {
          var rest = param__0[3];
          var c = param__0[2];
          var hkey = param__0[1];
          if (call1(H[7], c)) {return [0,hkey,c,do_bucket(rest)];}
          h[1] = h[1] + -1 | 0;
          var param__0 = rest;
          continue;
        }
        return 0;
      }
    }
    var d = h[2];
    var az_ = d.length - 1 + -1 | 0;
    var ay_ = 0;
    if (! (az_ < 0)) {
      var i = ay_;
      for (; ; ) {
        d[i + 1] = do_bucket(caml_check_bound(d, i)[i + 1]);
        var aA_ = i + 1 | 0;
        if (az_ !== i) {var i = aA_;continue;}
        break;
      }
    }
    return 0;
  }
  function resize(h) {
    var odata = h[2];
    var osize = odata.length - 1;
    var nsize = osize * 2 | 0;
    clean(h);
    var as_ = nsize < Stdlib_sys[14] ? 1 : 0;
    var at_ = as_ ? (osize >>> 1 | 0) <= h[1] ? 1 : 0 : as_;
    if (at_) {
      var ndata = caml_make_vect(nsize, 0);
      h[2] = ndata;
      var insert_bucket = function(param) {
        if (param) {
          var rest = param[3];
          var data = param[2];
          var hkey = param[1];
          insert_bucket(rest);
          var nidx = key_index(h, hkey);
          ndata[nidx + 1] =
            [0,hkey,data,caml_check_bound(ndata, nidx)[nidx + 1]];
          return 0;
        }
        return 0;
      };
      var av_ = osize + -1 | 0;
      var au_ = 0;
      if (! (av_ < 0)) {
        var i = au_;
        for (; ; ) {
          insert_bucket(caml_check_bound(odata, i)[i + 1]);
          var ax_ = i + 1 | 0;
          if (av_ !== i) {var i = ax_;continue;}
          break;
        }
      }
      var aw_ = 0;
    }
    else var aw_ = at_;
    return aw_;
  }
  function add(h, key, info) {
    var hkey = call2(H[2], h[3], key);
    var i = key_index(h, hkey);
    var container = call2(H[1], key, info);
    var bucket = [0,hkey,container,caml_check_bound(h[2], i)[i + 1]];
    caml_check_bound(h[2], i)[i + 1] = bucket;
    h[1] = h[1] + 1 | 0;
    var ar_ = h[2].length - 1 << 1 < h[1] ? 1 : 0;
    return ar_ ? resize(h) : ar_;
  }
  function remove(h, key) {
    var hkey = call2(H[2], h[3], key);
    function remove_bucket(param) {
      var param__0 = param;
      for (; ; ) {
        if (param__0) {
          var next = param__0[3];
          var c = param__0[2];
          var hk = param__0[1];
          if (hkey === hk) {
            var match = call2(H[3], c, key);
            switch (match) {
              case 0:
                h[1] = h[1] + -1 | 0;
                return next;
              case 1:
                return [0,hk,c,remove_bucket(next)];
              default:
                h[1] = h[1] + -1 | 0;
                var param__0 = next;
                continue
              }
          }
          return [0,hk,c,remove_bucket(next)];
        }
        return 0;
      }
    }
    var i = key_index(h, hkey);
    var aq_ = remove_bucket(caml_check_bound(h[2], i)[i + 1]);
    caml_check_bound(h[2], i)[i + 1] = aq_;
    return 0;
  }
  function find_rec(key, hkey, param) {
    var param__0 = param;
    for (; ; ) {
      if (param__0) {
        var rest = param__0[3];
        var c = param__0[2];
        var hk = param__0[1];
        if (hkey === hk) {
          var match = call2(H[3], c, key);
          switch (match) {
            case 0:
              var match__0 = call1(H[4], c);
              if (match__0) {var d = match__0[1];return d;}
              var param__0 = rest;
              continue;
            case 1:
              var param__0 = rest;
              continue;
            default:
              var param__0 = rest;
              continue
            }
        }
        var param__0 = rest;
        continue;
      }
      throw caml_wrap_thrown_exception(Stdlib[8]);
    }
  }
  function find(h, key) {
    var hkey = call2(H[2], h[3], key);
    var ap_ = key_index(h, hkey);
    return find_rec(key, hkey, caml_check_bound(h[2], ap_)[ap_ + 1]);
  }
  function find_rec_opt(key, hkey, param) {
    var param__0 = param;
    for (; ; ) {
      if (param__0) {
        var rest = param__0[3];
        var c = param__0[2];
        var hk = param__0[1];
        if (hkey === hk) {
          var match = call2(H[3], c, key);
          switch (match) {
            case 0:
              var d = call1(H[4], c);
              if (d) {return d;}
              var param__0 = rest;
              continue;
            case 1:
              var param__0 = rest;
              continue;
            default:
              var param__0 = rest;
              continue
            }
        }
        var param__0 = rest;
        continue;
      }
      return 0;
    }
  }
  function find_opt(h, key) {
    var hkey = call2(H[2], h[3], key);
    var ao_ = key_index(h, hkey);
    return find_rec_opt(key, hkey, caml_check_bound(h[2], ao_)[ao_ + 1]);
  }
  function find_all(h, key) {
    var hkey = call2(H[2], h[3], key);
    function find_in_bucket(param) {
      var param__0 = param;
      for (; ; ) {
        if (param__0) {
          var rest = param__0[3];
          var c = param__0[2];
          var hk = param__0[1];
          if (hkey === hk) {
            var match = call2(H[3], c, key);
            switch (match) {
              case 0:
                var match__0 = call1(H[4], c);
                if (match__0) {
                  var d = match__0[1];
                  return [0,d,find_in_bucket(rest)];
                }
                var param__0 = rest;
                continue;
              case 1:
                var param__0 = rest;
                continue;
              default:
                var param__0 = rest;
                continue
              }
          }
          var param__0 = rest;
          continue;
        }
        return 0;
      }
    }
    var an_ = key_index(h, hkey);
    return find_in_bucket(caml_check_bound(h[2], an_)[an_ + 1]);
  }
  function replace(h, key, info) {
    var hkey = call2(H[2], h[3], key);
    function replace_bucket(param) {
      var param__0 = param;
      for (; ; ) {
        if (param__0) {
          var next = param__0[3];
          var c = param__0[2];
          var hk = param__0[1];
          if (hkey === hk) {
            var match = call2(H[3], c, key);
            if (0 === match) {return call3(H[6], c, key, info);}
            var param__0 = next;
            continue;
          }
          var param__0 = next;
          continue;
        }
        throw caml_wrap_thrown_exception(Stdlib[8]);
      }
    }
    var i = key_index(h, hkey);
    var l = caml_check_bound(h[2], i)[i + 1];
    try {var al_ = replace_bucket(l);return al_;}
    catch(am_) {
      am_ = runtime["caml_wrap_exception"](am_);
      if (am_ === Stdlib[8]) {
        var container = call2(H[1], key, info);
        caml_check_bound(h[2], i)[i + 1] = [0,hkey,container,l];
        h[1] = h[1] + 1 | 0;
        var ak_ = h[2].length - 1 << 1 < h[1] ? 1 : 0;
        return ak_ ? resize(h) : ak_;
      }
      throw caml_wrap_thrown_exception_reraise(am_);
    }
  }
  function mem(h, key) {
    var hkey = call2(H[2], h[3], key);
    function mem_in_bucket(param) {
      var param__0 = param;
      for (; ; ) {
        if (param__0) {
          var rest = param__0[3];
          var c = param__0[2];
          var hk = param__0[1];
          if (hk === hkey) {
            var match = call2(H[3], c, key);
            if (0 === match) {return 1;}
            var param__0 = rest;
            continue;
          }
          var param__0 = rest;
          continue;
        }
        return 0;
      }
    }
    var aj_ = key_index(h, hkey);
    return mem_in_bucket(caml_check_bound(h[2], aj_)[aj_ + 1]);
  }
  function iter(f, h) {
    function do_bucket(param) {
      var param__0 = param;
      for (; ; ) {
        if (param__0) {
          var rest = param__0[3];
          var c = param__0[2];
          var match = call1(H[5], c);
          var match__0 = call1(H[4], c);
          if (match) if (
            match__0
          ) {
            var d = match__0[1];
            var k = match[1];
            call2(f, k, d);
            var switch__0 = 1;
          }
          else var switch__0 = 0;
          else var switch__0 = 0;
          ;
          var param__0 = rest;
          continue;
        }
        return 0;
      }
    }
    var d = h[2];
    var ah_ = d.length - 1 + -1 | 0;
    var ag_ = 0;
    if (! (ah_ < 0)) {
      var i = ag_;
      for (; ; ) {
        do_bucket(caml_check_bound(d, i)[i + 1]);
        var ai_ = i + 1 | 0;
        if (ah_ !== i) {var i = ai_;continue;}
        break;
      }
    }
    return 0;
  }
  function fold(f, h, init) {
    function do_bucket(b, accu) {
      var b__0 = b;
      var accu__0 = accu;
      for (; ; ) {
        if (b__0) {
          var rest = b__0[3];
          var c = b__0[2];
          var match = call1(H[5], c);
          var match__0 = call1(H[4], c);
          if (match) if (
            match__0
          ) {
            var d = match__0[1];
            var k = match[1];
            var accu__1 = call3(f, k, d, accu__0);
            var switch__0 = 1;
          }
          else var switch__0 = 0;
          else var switch__0 = 0;
          if (! switch__0) {var accu__1 = accu__0;}
          var b__0 = rest;
          var accu__0 = accu__1;
          continue;
        }
        return accu__0;
      }
    }
    var d = h[2];
    var accu = [0,init];
    var ad_ = d.length - 1 + -1 | 0;
    var ac_ = 0;
    if (! (ad_ < 0)) {
      var i = ac_;
      for (; ; ) {
        var ae_ = accu[1];
        accu[1] = do_bucket(caml_check_bound(d, i)[i + 1], ae_);
        var af_ = i + 1 | 0;
        if (ad_ !== i) {var i = af_;continue;}
        break;
      }
    }
    return accu[1];
  }
  function filter_map_inplace(f, h) {
    function do_bucket(param) {
      var param__0 = param;
      for (; ; ) {
        if (param__0) {
          var rest = param__0[3];
          var c = param__0[2];
          var hk = param__0[1];
          var match = call1(H[5], c);
          var match__0 = call1(H[4], c);
          if (match) {
            if (match__0) {
              var d = match__0[1];
              var k = match[1];
              var match__1 = call2(f, k, d);
              if (match__1) {
                var new_d = match__1[1];
                call3(H[6], c, k, new_d);
                return [0,hk,c,do_bucket(rest)];
              }
              var param__0 = rest;
              continue;
            }
          }
          var param__0 = rest;
          continue;
        }
        return 0;
      }
    }
    var d = h[2];
    var aa_ = d.length - 1 + -1 | 0;
    var Z_ = 0;
    if (! (aa_ < 0)) {
      var i = Z_;
      for (; ; ) {
        d[i + 1] = do_bucket(caml_check_bound(d, i)[i + 1]);
        var ab_ = i + 1 | 0;
        if (aa_ !== i) {var i = ab_;continue;}
        break;
      }
    }
    return 0;
  }
  function length(h) {return h[1];}
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
    var T_ = h[2];
    var U_ = 0;
    function V_(m, b) {
      var Y_ = bucket_length(0, b);
      return call2(Stdlib[17], m, Y_);
    }
    var mbl = call3(Stdlib_array[17], V_, U_, T_);
    var histo = caml_make_vect(mbl + 1 | 0, 0);
    var W_ = h[2];
    function X_(b) {
      var l = bucket_length(0, b);
      histo[l + 1] = caml_check_bound(histo, l)[l + 1] + 1 | 0;
      return 0;
    }
    call2(Stdlib_array[13], X_, W_);
    return [0,h[1],h[2].length - 1,mbl,histo];
  }
  function bucket_length_alive(accu, param) {
    var accu__0 = accu;
    var param__0 = param;
    for (; ; ) {
      if (param__0) {
        var rest = param__0[3];
        var c = param__0[2];
        if (call1(H[7], c)) {
          var accu__1 = accu__0 + 1 | 0;
          var accu__0 = accu__1;
          var param__0 = rest;
          continue;
        }
        var param__0 = rest;
        continue;
      }
      return accu__0;
    }
  }
  function stats_alive(h) {
    var size = [0,0];
    var N_ = h[2];
    var O_ = 0;
    function P_(m, b) {
      var S_ = bucket_length_alive(0, b);
      return call2(Stdlib[17], m, S_);
    }
    var mbl = call3(Stdlib_array[17], P_, O_, N_);
    var histo = caml_make_vect(mbl + 1 | 0, 0);
    var Q_ = h[2];
    function R_(b) {
      var l = bucket_length_alive(0, b);
      size[1] = size[1] + l | 0;
      histo[l + 1] = caml_check_bound(histo, l)[l + 1] + 1 | 0;
      return 0;
    }
    call2(Stdlib_array[13], R_, Q_);
    return [0,size[1],h[2].length - 1,mbl,histo];
  }
  function to_seq(tbl) {
    var tbl_data = tbl[2];
    function aux(i, buck, param) {
      var i__0 = i;
      var buck__0 = buck;
      for (; ; ) {
        if (buck__0) {
          var next = buck__0[3];
          var c = buck__0[2];
          var match = call1(H[5], c);
          var match__0 = call1(H[4], c);
          if (match) {
            if (match__0) {
              var data = match__0[1];
              var key = match[1];
              return [
                0,
                [0,key,data],
                function(M_) {return aux(i__0, next, M_);}
              ];
            }
          }
          var buck__0 = next;
          continue;
        }
        if (i__0 === tbl_data.length - 1) {return 0;}
        var buck__1 = caml_check_bound(tbl_data, i__0)[i__0 + 1];
        var i__1 = i__0 + 1 | 0;
        var i__0 = i__1;
        var buck__0 = buck__1;
        continue;
      }
    }
    var J_ = 0;
    var K_ = 0;
    return function(L_) {return aux(K_, J_, L_);};
  }
  function to_seq_keys(m) {
    var G_ = to_seq(m);
    function H_(I_) {return I_[1];}
    return call2(Stdlib_seq[3], H_, G_);
  }
  function to_seq_values(m) {
    var D_ = to_seq(m);
    function E_(F_) {return F_[2];}
    return call2(Stdlib_seq[3], E_, D_);
  }
  function add_seq(tbl, i) {
    function C_(param) {
      var v = param[2];
      var k = param[1];
      return add(tbl, k, v);
    }
    return call2(Stdlib_seq[8], C_, i);
  }
  function replace_seq(tbl, i) {
    function B_(param) {
      var v = param[2];
      var k = param[1];
      return replace(tbl, k, v);
    }
    return call2(Stdlib_seq[8], B_, i);
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
    of_seq,
    clean,
    stats_alive
  ];
}

function obj_opt(x) {return x;}

function create(param) {return call1(Stdlib_obj[27][1], 1);}

function get_key(t) {return obj_opt(call2(Stdlib_obj[27][3], t, 0));}

function get_key_copy(t) {return obj_opt(call2(Stdlib_obj[27][4], t, 0));}

function set_key(t, k) {return call3(Stdlib_obj[27][5], t, 0, k);}

function unset_key(t) {return call2(Stdlib_obj[27][6], t, 0);}

function check_key(t) {return call2(Stdlib_obj[27][7], t, 0);}

function blit_key(t1, t2) {return call5(Stdlib_obj[27][8], t1, 0, t2, 0, 1);}

function get_data(t) {return obj_opt(call1(Stdlib_obj[27][9], t));}

function get_data_copy(t) {return obj_opt(call1(Stdlib_obj[27][10], t));}

function set_data(t, d) {return call2(Stdlib_obj[27][11], t, d);}

function unset_data(t) {return call1(Stdlib_obj[27][12], t);}

function check_data(t) {return call1(Stdlib_obj[27][13], t);}

function blit_data(t1, t2) {return call2(Stdlib_obj[27][14], t1, t2);}

function MakeSeeded__0(H) {
  function create__0(k, d) {
    var c = create(0);
    set_data(c, d);
    set_key(c, k);
    return c;
  }
  var hash = H[2];
  function equal(c, k) {
    var match = get_key(c);
    if (match) {var k__0 = match[1];return call2(H[1], k, k__0) ? 0 : 1;}
    return 2;
  }
  function set_key_data(c, k, d) {
    unset_data(c);
    set_key(c, k);
    return set_data(c, d);
  }
  return MakeSeeded(
    [0,create__0,hash,equal,get_data,get_key,set_key_data,check_key]
  );
}

function Make(H) {
  var equal = H[1];
  function hash(seed, x) {return call1(H[2], x);}
  var include = MakeSeeded__0([0,equal,hash]);
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
  var clean = include[23];
  var stats_alive = include[24];
  var A_ = include[1];
  function create(sz) {return call2(A_, a_, sz);}
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
    of_seq,
    clean,
    stats_alive
  ];
}

function create__0(param) {return call1(Stdlib_obj[27][1], 2);}

function get_key1(t) {return obj_opt(call2(Stdlib_obj[27][3], t, 0));}

function get_key1_copy(t) {return obj_opt(call2(Stdlib_obj[27][4], t, 0));}

function set_key1(t, k) {return call3(Stdlib_obj[27][5], t, 0, k);}

function unset_key1(t) {return call2(Stdlib_obj[27][6], t, 0);}

function check_key1(t) {return call2(Stdlib_obj[27][7], t, 0);}

function get_key2(t) {return obj_opt(call2(Stdlib_obj[27][3], t, 1));}

function get_key2_copy(t) {return obj_opt(call2(Stdlib_obj[27][4], t, 1));}

function set_key2(t, k) {return call3(Stdlib_obj[27][5], t, 1, k);}

function unset_key2(t) {return call2(Stdlib_obj[27][6], t, 1);}

function check_key2(t) {return call2(Stdlib_obj[27][7], t, 1);}

function blit_key1(t1, t2) {return call5(Stdlib_obj[27][8], t1, 0, t2, 0, 1);}

function blit_key2(t1, t2) {return call5(Stdlib_obj[27][8], t1, 1, t2, 1, 1);}

function blit_key12(t1, t2) {
  return call5(Stdlib_obj[27][8], t1, 0, t2, 0, 2);
}

function get_data__0(t) {return obj_opt(call1(Stdlib_obj[27][9], t));}

function get_data_copy__0(t) {return obj_opt(call1(Stdlib_obj[27][10], t));}

function set_data__0(t, d) {return call2(Stdlib_obj[27][11], t, d);}

function unset_data__0(t) {return call1(Stdlib_obj[27][12], t);}

function check_data__0(t) {return call1(Stdlib_obj[27][13], t);}

function blit_data__0(t1, t2) {return call2(Stdlib_obj[27][14], t1, t2);}

function MakeSeeded__1(H1, H2) {
  function create(param, d) {
    var k2 = param[2];
    var k1 = param[1];
    var c = create__0(0);
    set_data__0(c, d);
    set_key1(c, k1);
    set_key2(c, k2);
    return c;
  }
  function hash(seed, param) {
    var k2 = param[2];
    var k1 = param[1];
    var z_ = call2(H2[2], seed, k2) * 65599 | 0;
    return call2(H1[2], seed, k1) + z_ | 0;
  }
  function equal(c, param) {
    var k2 = param[2];
    var k1 = param[1];
    var match = get_key1(c);
    var match__0 = get_key2(c);
    if (match) {
      if (match__0) {
        var k2__0 = match__0[1];
        var k1__0 = match[1];
        if (call2(H1[1], k1, k1__0)) {
          if (call2(H2[1], k2, k2__0)) {return 0;}
        }
        return 1;
      }
    }
    return 2;
  }
  function get_key(c) {
    var match = get_key1(c);
    var match__0 = get_key2(c);
    if (match) {
      if (match__0) {
        var k2 = match__0[1];
        var k1 = match[1];
        return [0,[0,k1,k2]];
      }
    }
    return 0;
  }
  function set_key_data(c, param, d) {
    var k2 = param[2];
    var k1 = param[1];
    unset_data__0(c);
    set_key1(c, k1);
    set_key2(c, k2);
    return set_data__0(c, d);
  }
  function check_key(c) {
    var y_ = check_key1(c);
    return y_ ? check_key2(c) : y_;
  }
  return MakeSeeded(
    [0,create,hash,equal,get_data__0,get_key,set_key_data,check_key]
  );
}

function Make__0(H1, H2) {
  var equal = H2[1];
  function hash(seed, x) {return call1(H2[2], x);}
  var equal__0 = H1[1];
  var u_ = [0,equal,hash];
  function hash__0(seed, x) {return call1(H1[2], x);}
  var v_ = [0,equal__0,hash__0];
  var include = function(x_) {return MakeSeeded__1(v_, x_);}(u_);
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
  var clean = include[23];
  var stats_alive = include[24];
  var w_ = include[1];
  function create(sz) {return call2(w_, b_, sz);}
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
    of_seq,
    clean,
    stats_alive
  ];
}

function create__1(n) {return call1(Stdlib_obj[27][1], n);}

function length(k) {return call1(Stdlib_obj[27][2], k);}

function get_key__0(t, n) {return obj_opt(call2(Stdlib_obj[27][3], t, n));}

function get_key_copy__0(t, n) {
  return obj_opt(call2(Stdlib_obj[27][4], t, n));
}

function set_key__0(t, n, k) {return call3(Stdlib_obj[27][5], t, n, k);}

function unset_key__0(t, n) {return call2(Stdlib_obj[27][6], t, n);}

function check_key__0(t, n) {return call2(Stdlib_obj[27][7], t, n);}

function blit_key__0(t1, o1, t2, o2, l) {
  return call5(Stdlib_obj[27][8], t1, o1, t2, o2, l);
}

function get_data__1(t) {return obj_opt(call1(Stdlib_obj[27][9], t));}

function get_data_copy__1(t) {return obj_opt(call1(Stdlib_obj[27][10], t));}

function set_data__1(t, d) {return call2(Stdlib_obj[27][11], t, d);}

function unset_data__1(t) {return call1(Stdlib_obj[27][12], t);}

function check_data__1(t) {return call1(Stdlib_obj[27][13], t);}

function blit_data__1(t1, t2) {return call2(Stdlib_obj[27][14], t1, t2);}

function MakeSeeded__2(H) {
  function create(k, d) {
    var c = create__1(k.length - 1);
    set_data__1(c, d);
    var s_ = k.length - 1 + -1 | 0;
    var r_ = 0;
    if (! (s_ < 0)) {
      var i = r_;
      for (; ; ) {
        set_key__0(c, i, caml_check_bound(k, i)[i + 1]);
        var t_ = i + 1 | 0;
        if (s_ !== i) {var i = t_;continue;}
        break;
      }
    }
    return c;
  }
  function hash(seed, k) {
    var h = [0,0];
    var n_ = k.length - 1 + -1 | 0;
    var m_ = 0;
    if (! (n_ < 0)) {
      var i = m_;
      for (; ; ) {
        var o_ = h[1];
        var p_ = caml_check_bound(k, i)[i + 1];
        h[1] = (call2(H[2], seed, p_) * 65599 | 0) + o_ | 0;
        var q_ = i + 1 | 0;
        if (n_ !== i) {var i = q_;continue;}
        break;
      }
    }
    return h[1];
  }
  function equal(c, k) {
    var len = k.length - 1;
    var len__0 = length(c);
    if (len !== len__0) {return 1;}
    function equal_array(k, c, i) {
      var i__0 = i;
      for (; ; ) {
        if (0 <= i__0) {
          var match = get_key__0(c, i__0);
          if (match) {
            var ki = match[1];
            var l_ = caml_check_bound(k, i__0)[i__0 + 1];
            if (call2(H[1], l_, ki)) {
              var i__1 = i__0 + -1 | 0;
              var i__0 = i__1;
              continue;
            }
            return 1;
          }
          return 2;
        }
        return 0;
      }
    }
    return equal_array(k, c, len + -1 | 0);
  }
  function get_key(c) {
    var len = length(c);
    if (0 === len) {return [0,[0]];}
    var match = get_key__0(c, 0);
    if (match) {
      var k0 = match[1];
      var fill = function(a, i) {
        var i__0 = i;
        for (; ; ) {
          if (1 <= i__0) {
            var match = get_key__0(c, i__0);
            if (match) {
              var ki = match[1];
              caml_check_bound(a, i__0)[i__0 + 1] = ki;
              var i__1 = i__0 + -1 | 0;
              var i__0 = i__1;
              continue;
            }
            return 0;
          }
          return [0,a];
        }
      };
      var a = caml_make_vect(len, k0);
      return fill(a, len + -1 | 0);
    }
    return 0;
  }
  function set_key_data(c, k, d) {
    unset_data__1(c);
    var j_ = k.length - 1 + -1 | 0;
    var i_ = 0;
    if (! (j_ < 0)) {
      var i = i_;
      for (; ; ) {
        set_key__0(c, i, caml_check_bound(k, i)[i + 1]);
        var k_ = i + 1 | 0;
        if (j_ !== i) {var i = k_;continue;}
        break;
      }
    }
    return set_data__1(c, d);
  }
  function check_key(c) {
    function check(c, i) {
      var i__0 = i;
      for (; ; ) {
        var f_ = i__0 < 0 ? 1 : 0;
        if (f_) var g_ = f_;
        else {
          var h_ = check_key__0(c, i__0);
          if (h_) {var i__1 = i__0 + -1 | 0;var i__0 = i__1;continue;}
          var g_ = h_;
        }
        return g_;
      }
    }
    return check(c, length(c) + -1 | 0);
  }
  return MakeSeeded(
    [0,create,hash,equal,get_data__1,get_key,set_key_data,check_key]
  );
}

function Make__1(H) {
  var equal = H[1];
  function hash(seed, x) {return call1(H[2], x);}
  var include = MakeSeeded__2([0,equal,hash]);
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
  var clean = include[23];
  var stats_alive = include[24];
  var e_ = include[1];
  function create(sz) {return call2(e_, c_, sz);}
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
    of_seq,
    clean,
    stats_alive
  ];
}

var Stdlib_ephemeron = [
  0,
  [
    0,
    create,
    get_key,
    get_key_copy,
    set_key,
    unset_key,
    check_key,
    blit_key,
    get_data,
    get_data_copy,
    set_data,
    unset_data,
    check_data,
    blit_data,
    Make,
    MakeSeeded__0
  ],
  [
    0,
    create__0,
    get_key1,
    get_key1_copy,
    set_key1,
    unset_key1,
    check_key1,
    get_key2,
    get_key2_copy,
    set_key2,
    unset_key2,
    check_key2,
    blit_key1,
    blit_key2,
    blit_key12,
    get_data__0,
    get_data_copy__0,
    set_data__0,
    unset_data__0,
    check_data__0,
    blit_data__0,
    Make__0,
    MakeSeeded__1
  ],
  [
    0,
    create__1,
    get_key__0,
    get_key_copy__0,
    set_key__0,
    unset_key__0,
    check_key__0,
    blit_key__0,
    get_data__1,
    get_data_copy__1,
    set_data__1,
    unset_data__1,
    check_data__1,
    blit_data__1,
    Make__1,
    MakeSeeded__2
  ],
  [
    0,
    function(d_) {
      return MakeSeeded([0,d_[3],d_[1],d_[2],d_[5],d_[4],d_[6],d_[7]]);
    }
  ]
];

module.exports = Stdlib_ephemeron;

/*::type Exports = {
}*/
/** @type {{
}} */
module.exports = ((module.exports /*:: : any*/) /*:: :Exports */);

/* Hashing disabled */
