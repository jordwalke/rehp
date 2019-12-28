/**
 * @flow strict
 * Ephemeron
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
var caml_wrap_thrown_exception = runtime["caml_wrap_thrown_exception"];
var caml_wrap_thrown_exception_reraise = runtime
 ["caml_wrap_thrown_exception_reraise"];
var Obj = require("./Obj.js");
var Sys = require("./Sys.js");
var Not_found = require("../runtime/Not_found.js");
var Pervasives = require("./Pervasives.js");
var Array = require("./Array.js");
var Hashtbl = require("./Hashtbl.js");
var CamlinternalLazy = require("./CamlinternalLazy.js");
var Random = require("./Random.js");
var c_ = [0,0];
var b_ = [0,0];
var a_ = [0,0];

function MakeSeeded(H) {
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
  function B_(ay_) {return call1(Random[11][2], 0);}
  var prng = [246,B_];
  function create(opt, initial_size) {
    var seed;
    var ax_;
    var aw_;
    var random;
    var sth;
    if (opt) {
      sth = opt[1];
      random = sth;
    }
    else random = call1(Hashtbl[17], 0);
    var s = power_2_above(16, initial_size);
    if (random) {
      aw_ = runtime["caml_obj_tag"](prng);
      ax_ =
        250 === aw_ ?
          B_ :
          246 === aw_ ? call1(CamlinternalLazy[2], prng) : prng;
      seed = call1(Random[11][4], ax_);
    }
    else seed = 0;
    return [0,0,caml_make_vect(s, 0),seed,s];
  }
  function clear(h) {
    var av_;
    var i;
    h[1] = 0;
    var len = h[2].length - 1;
    var au_ = len + -1 | 0;
    var at_ = 0;
    if (! (au_ < 0)) {
      i = at_;
      for (; ; ) {
        caml_check_bound(h[2], i)[i + 1] = 0;
        av_ = i + 1 | 0;
        if (au_ !== i) {i = av_;continue;}
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
    var aq_ = h[4];
    var ar_ = h[3];
    var as_ = call1(Array[8], h[2]);
    return [0,h[1],as_,ar_,aq_];
  }
  function key_index(h, hkey) {return hkey & (h[2].length - 1 + -1 | 0);}
  function clean(h) {
    var i;
    var ap_;
    function do_bucket(param) {
      var rest;
      var c;
      var hkey;
      var param__0 = param;
      for (; ; ) {
        if (param__0) {
          rest = param__0[3];
          c = param__0[2];
          hkey = param__0[1];
          if (call1(H[7], c)) {return [0,hkey,c,do_bucket(rest)];}
          h[1] = h[1] + -1 | 0;
          param__0 = rest;
          continue;
        }
        return 0;
      }
    }
    var d = h[2];
    var ao_ = d.length - 1 + -1 | 0;
    var an_ = 0;
    if (! (ao_ < 0)) {
      i = an_;
      for (; ; ) {
        d[i + 1] = do_bucket(caml_check_bound(d, i)[i + 1]);
        ap_ = i + 1 | 0;
        if (ao_ !== i) {i = ap_;continue;}
        break;
      }
    }
    return 0;
  }
  function resize(h) {
    var ndata;
    var insert_bucket;
    var aj_;
    var ak_;
    var al_;
    var i;
    var am_;
    var odata = h[2];
    var osize = odata.length - 1;
    var nsize = osize * 2 | 0;
    clean(h);
    var ah_ = nsize < Sys[14] ? 1 : 0;
    var ai_ = ah_ ? (osize >>> 1 | 0) <= h[1] ? 1 : 0 : ah_;
    if (ai_) {
      ndata = caml_make_vect(nsize, 0);
      h[2] = ndata;
      insert_bucket =
        function(param) {
          var nidx;
          var hkey;
          var data;
          var rest;
          if (param) {
            rest = param[3];
            data = param[2];
            hkey = param[1];
            insert_bucket(rest);
            nidx = key_index(h, hkey);
            ndata[nidx + 1] =
              [0,hkey,data,caml_check_bound(ndata, nidx)[nidx + 1]];
            return 0;
          }
          return 0;
        };
      ak_ = osize + -1 | 0;
      aj_ = 0;
      if (! (ak_ < 0)) {
        i = aj_;
        for (; ; ) {
          insert_bucket(caml_check_bound(odata, i)[i + 1]);
          am_ = i + 1 | 0;
          if (ak_ !== i) {i = am_;continue;}
          break;
        }
      }
      al_ = 0;
    }
    else al_ = ai_;
    return al_;
  }
  function add(h, key, info) {
    var hkey = call2(H[2], h[3], key);
    var i = key_index(h, hkey);
    var container = call2(H[1], key, info);
    var bucket = [0,hkey,container,caml_check_bound(h[2], i)[i + 1]];
    caml_check_bound(h[2], i)[i + 1] = bucket;
    h[1] = h[1] + 1 | 0;
    var ag_ = h[2].length - 1 << 1 < h[1] ? 1 : 0;
    return ag_ ? resize(h) : ag_;
  }
  function remove(h, key) {
    var hkey = call2(H[2], h[3], key);
    function remove_bucket(param) {
      var next;
      var c;
      var hk;
      var match;
      var param__0 = param;
      for (; ; ) {
        if (param__0) {
          next = param__0[3];
          c = param__0[2];
          hk = param__0[1];
          if (hkey === hk) {
            match = call2(H[3], c, key);
            switch (match) {
              case 0:
                h[1] = h[1] + -1 | 0;
                return next;
              case 1:
                return [0,hk,c,remove_bucket(next)];
              default:
                h[1] = h[1] + -1 | 0;
                param__0 = next;
                continue
              }
          }
          return [0,hk,c,remove_bucket(next)];
        }
        return 0;
      }
    }
    var i = key_index(h, hkey);
    var af_ = remove_bucket(caml_check_bound(h[2], i)[i + 1]);
    caml_check_bound(h[2], i)[i + 1] = af_;
    return 0;
  }
  function find_rec(key, hkey, param) {
    var rest;
    var c;
    var hk;
    var match;
    var match__0;
    var d;
    var param__0 = param;
    for (; ; ) {
      if (param__0) {
        rest = param__0[3];
        c = param__0[2];
        hk = param__0[1];
        if (hkey === hk) {
          match = call2(H[3], c, key);
          switch (match) {
            case 0:
              match__0 = call1(H[4], c);
              if (match__0) {d = match__0[1];return d;}
              param__0 = rest;
              continue;
            case 1:
              param__0 = rest;
              continue;
            default:
              param__0 = rest;
              continue
            }
        }
        param__0 = rest;
        continue;
      }
      throw caml_wrap_thrown_exception(Not_found);
    }
  }
  function find(h, key) {
    var hkey = call2(H[2], h[3], key);
    var ae_ = key_index(h, hkey);
    return find_rec(key, hkey, caml_check_bound(h[2], ae_)[ae_ + 1]);
  }
  function find_rec_opt(key, hkey, param) {
    var rest;
    var c;
    var hk;
    var match;
    var d;
    var param__0 = param;
    for (; ; ) {
      if (param__0) {
        rest = param__0[3];
        c = param__0[2];
        hk = param__0[1];
        if (hkey === hk) {
          match = call2(H[3], c, key);
          switch (match) {
            case 0:
              d = call1(H[4], c);
              if (d) {return d;}
              param__0 = rest;
              continue;
            case 1:
              param__0 = rest;
              continue;
            default:
              param__0 = rest;
              continue
            }
        }
        param__0 = rest;
        continue;
      }
      return 0;
    }
  }
  function find_opt(h, key) {
    var hkey = call2(H[2], h[3], key);
    var ad_ = key_index(h, hkey);
    return find_rec_opt(key, hkey, caml_check_bound(h[2], ad_)[ad_ + 1]);
  }
  function find_all(h, key) {
    var hkey = call2(H[2], h[3], key);
    function find_in_bucket(param) {
      var rest;
      var c;
      var hk;
      var match;
      var match__0;
      var d;
      var param__0 = param;
      for (; ; ) {
        if (param__0) {
          rest = param__0[3];
          c = param__0[2];
          hk = param__0[1];
          if (hkey === hk) {
            match = call2(H[3], c, key);
            switch (match) {
              case 0:
                match__0 = call1(H[4], c);
                if (match__0) {
                  d = match__0[1];
                  return [0,d,find_in_bucket(rest)];
                }
                param__0 = rest;
                continue;
              case 1:
                param__0 = rest;
                continue;
              default:
                param__0 = rest;
                continue
              }
          }
          param__0 = rest;
          continue;
        }
        return 0;
      }
    }
    var ac_ = key_index(h, hkey);
    return find_in_bucket(caml_check_bound(h[2], ac_)[ac_ + 1]);
  }
  function replace(h, key, info) {
    var container;
    var Z_;
    var aa_;
    var hkey = call2(H[2], h[3], key);
    function replace_bucket(param) {
      var next;
      var c;
      var hk;
      var match;
      var param__0 = param;
      for (; ; ) {
        if (param__0) {
          next = param__0[3];
          c = param__0[2];
          hk = param__0[1];
          if (hkey === hk) {
            match = call2(H[3], c, key);
            if (0 === match) {return call3(H[6], c, key, info);}
            param__0 = next;
            continue;
          }
          param__0 = next;
          continue;
        }
        throw caml_wrap_thrown_exception(Not_found);
      }
    }
    var i = key_index(h, hkey);
    var l = caml_check_bound(h[2], i)[i + 1];
    try {aa_ = replace_bucket(l);return aa_;}
    catch(ab_) {
      ab_ = runtime["caml_wrap_exception"](ab_);
      if (ab_ === Not_found) {
        container = call2(H[1], key, info);
        caml_check_bound(h[2], i)[i + 1] = [0,hkey,container,l];
        h[1] = h[1] + 1 | 0;
        Z_ = h[2].length - 1 << 1 < h[1] ? 1 : 0;
        return Z_ ? resize(h) : Z_;
      }
      throw caml_wrap_thrown_exception_reraise(ab_);
    }
  }
  function mem(h, key) {
    var hkey = call2(H[2], h[3], key);
    function mem_in_bucket(param) {
      var rest;
      var c;
      var hk;
      var match;
      var param__0 = param;
      for (; ; ) {
        if (param__0) {
          rest = param__0[3];
          c = param__0[2];
          hk = param__0[1];
          if (hk === hkey) {
            match = call2(H[3], c, key);
            if (0 === match) {return 1;}
            param__0 = rest;
            continue;
          }
          param__0 = rest;
          continue;
        }
        return 0;
      }
    }
    var Y_ = key_index(h, hkey);
    return mem_in_bucket(caml_check_bound(h[2], Y_)[Y_ + 1]);
  }
  function iter(f, h) {
    var i;
    var X_;
    function do_bucket(param) {
      var rest;
      var c;
      var match;
      var match__0;
      var d;
      var k;
      var switch__0;
      var param__0 = param;
      for (; ; ) {
        if (param__0) {
          rest = param__0[3];
          c = param__0[2];
          match = call1(H[5], c);
          match__0 = call1(H[4], c);
          if (match) if (
            match__0
          ) {d = match__0[1];k = match[1];call2(f, k, d);switch__0 = 1;}
          else switch__0 = 0;
          else switch__0 = 0;
          ;
          param__0 = rest;
          continue;
        }
        return 0;
      }
    }
    var d = h[2];
    var W_ = d.length - 1 + -1 | 0;
    var V_ = 0;
    if (! (W_ < 0)) {
      i = V_;
      for (; ; ) {
        do_bucket(caml_check_bound(d, i)[i + 1]);
        X_ = i + 1 | 0;
        if (W_ !== i) {i = X_;continue;}
        break;
      }
    }
    return 0;
  }
  function fold(f, h, init) {
    var i;
    var T_;
    var U_;
    function do_bucket(b, accu) {
      var rest;
      var c;
      var match;
      var match__0;
      var d;
      var k;
      var accu__1;
      var switch__0;
      var b__0 = b;
      var accu__0 = accu;
      for (; ; ) {
        if (b__0) {
          rest = b__0[3];
          c = b__0[2];
          match = call1(H[5], c);
          match__0 = call1(H[4], c);
          if (match) if (
            match__0
          ) {
            d = match__0[1];
            k = match[1];
            accu__1 = call3(f, k, d, accu__0);
            switch__0 = 1;
          }
          else switch__0 = 0;
          else switch__0 = 0;
          if (! switch__0) {accu__1 = accu__0;}
          b__0 = rest;
          accu__0 = accu__1;
          continue;
        }
        return accu__0;
      }
    }
    var d = h[2];
    var accu = [0,init];
    var S_ = d.length - 1 + -1 | 0;
    var R_ = 0;
    if (! (S_ < 0)) {
      i = R_;
      for (; ; ) {
        T_ = accu[1];
        accu[1] = do_bucket(caml_check_bound(d, i)[i + 1], T_);
        U_ = i + 1 | 0;
        if (S_ !== i) {i = U_;continue;}
        break;
      }
    }
    return accu[1];
  }
  function filter_map_inplace(f, h) {
    var i;
    var Q_;
    function do_bucket(param) {
      var rest;
      var c;
      var hk;
      var match;
      var match__0;
      var d;
      var k;
      var match__1;
      var new_d;
      var param__0 = param;
      for (; ; ) {
        if (param__0) {
          rest = param__0[3];
          c = param__0[2];
          hk = param__0[1];
          match = call1(H[5], c);
          match__0 = call1(H[4], c);
          if (match) {
            if (match__0) {
              d = match__0[1];
              k = match[1];
              match__1 = call2(f, k, d);
              if (match__1) {
                new_d = match__1[1];
                call3(H[6], c, k, new_d);
                return [0,hk,c,do_bucket(rest)];
              }
              param__0 = rest;
              continue;
            }
          }
          param__0 = rest;
          continue;
        }
        return 0;
      }
    }
    var d = h[2];
    var P_ = d.length - 1 + -1 | 0;
    var O_ = 0;
    if (! (P_ < 0)) {
      i = O_;
      for (; ; ) {
        d[i + 1] = do_bucket(caml_check_bound(d, i)[i + 1]);
        Q_ = i + 1 | 0;
        if (P_ !== i) {i = Q_;continue;}
        break;
      }
    }
    return 0;
  }
  function length(h) {return h[1];}
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
    var I_ = h[2];
    var J_ = 0;
    function K_(m, b) {
      var N_ = bucket_length(0, b);
      return call2(Pervasives[5], m, N_);
    }
    var mbl = call3(Array[17], K_, J_, I_);
    var histo = caml_make_vect(mbl + 1 | 0, 0);
    var L_ = h[2];
    function M_(b) {
      var l = bucket_length(0, b);
      histo[l + 1] = caml_check_bound(histo, l)[l + 1] + 1 | 0;
      return 0;
    }
    call2(Array[13], M_, L_);
    return [0,h[1],h[2].length - 1,mbl,histo];
  }
  function bucket_length_alive(accu, param) {
    var rest;
    var c;
    var accu__1;
    var accu__0 = accu;
    var param__0 = param;
    for (; ; ) {
      if (param__0) {
        rest = param__0[3];
        c = param__0[2];
        if (call1(H[7], c)) {
          accu__1 = accu__0 + 1 | 0;
          accu__0 = accu__1;
          param__0 = rest;
          continue;
        }
        param__0 = rest;
        continue;
      }
      return accu__0;
    }
  }
  function stats_alive(h) {
    var size = [0,0];
    var C_ = h[2];
    var D_ = 0;
    function E_(m, b) {
      var H_ = bucket_length_alive(0, b);
      return call2(Pervasives[5], m, H_);
    }
    var mbl = call3(Array[17], E_, D_, C_);
    var histo = caml_make_vect(mbl + 1 | 0, 0);
    var F_ = h[2];
    function G_(b) {
      var l = bucket_length_alive(0, b);
      size[1] = size[1] + l | 0;
      histo[l + 1] = caml_check_bound(histo, l)[l + 1] + 1 | 0;
      return 0;
    }
    call2(Array[13], G_, F_);
    return [0,size[1],h[2].length - 1,mbl,histo];
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
    clean,
    stats_alive
  ];
}

function obj_opt(x) {return x;}

function create(param) {return call1(Obj[26][1], 1);}

function get_key(t) {return obj_opt(call2(Obj[26][3], t, 0));}

function get_key_copy(t) {return obj_opt(call2(Obj[26][4], t, 0));}

function set_key(t, k) {return call3(Obj[26][5], t, 0, k);}

function unset_key(t) {return call2(Obj[26][6], t, 0);}

function check_key(t) {return call2(Obj[26][7], t, 0);}

function blit_key(t1, t2) {return call5(Obj[26][8], t1, 0, t2, 0, 1);}

function get_data(t) {return obj_opt(call1(Obj[26][9], t));}

function get_data_copy(t) {return obj_opt(call1(Obj[26][10], t));}

function set_data(t, d) {return call2(Obj[26][11], t, d);}

function unset_data(t) {return call1(Obj[26][12], t);}

function check_data(t) {return call1(Obj[26][13], t);}

function blit_data(t1, t2) {return call2(Obj[26][14], t1, t2);}

function MakeSeeded__0(H) {
  function create__0(k, d) {
    var c = create(0);
    set_data(c, d);
    set_key(c, k);
    return c;
  }
  var hash = H[2];
  function equal(c, k) {
    var k__0;
    var match = get_key(c);
    if (match) {k__0 = match[1];return call2(H[1], k, k__0) ? 0 : 1;}
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
  var clean = include[17];
  var stats_alive = include[18];
  var A_ = include[1];
  function create(sz) {return call2(A_, a_, sz);}
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
    clean,
    stats_alive
  ];
}

function create__0(param) {return call1(Obj[26][1], 2);}

function get_key1(t) {return obj_opt(call2(Obj[26][3], t, 0));}

function get_key1_copy(t) {return obj_opt(call2(Obj[26][4], t, 0));}

function set_key1(t, k) {return call3(Obj[26][5], t, 0, k);}

function unset_key1(t) {return call2(Obj[26][6], t, 0);}

function check_key1(t) {return call2(Obj[26][7], t, 0);}

function get_key2(t) {return obj_opt(call2(Obj[26][3], t, 1));}

function get_key2_copy(t) {return obj_opt(call2(Obj[26][4], t, 1));}

function set_key2(t, k) {return call3(Obj[26][5], t, 1, k);}

function unset_key2(t) {return call2(Obj[26][6], t, 1);}

function check_key2(t) {return call2(Obj[26][7], t, 1);}

function blit_key1(t1, t2) {return call5(Obj[26][8], t1, 0, t2, 0, 1);}

function blit_key2(t1, t2) {return call5(Obj[26][8], t1, 1, t2, 1, 1);}

function blit_key12(t1, t2) {return call5(Obj[26][8], t1, 0, t2, 0, 2);}

function get_data__0(t) {return obj_opt(call1(Obj[26][9], t));}

function get_data_copy__0(t) {return obj_opt(call1(Obj[26][10], t));}

function set_data__0(t, d) {return call2(Obj[26][11], t, d);}

function unset_data__0(t) {return call1(Obj[26][12], t);}

function check_data__0(t) {return call1(Obj[26][13], t);}

function blit_data__0(t1, t2) {return call2(Obj[26][14], t1, t2);}

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
    var k2__0;
    var k1__0;
    var k2 = param[2];
    var k1 = param[1];
    var match = get_key1(c);
    var match__0 = get_key2(c);
    if (match) {
      if (match__0) {
        k2__0 = match__0[1];
        k1__0 = match[1];
        if (call2(H1[1], k1, k1__0)) {
          if (call2(H2[1], k2, k2__0)) {return 0;}
        }
        return 1;
      }
    }
    return 2;
  }
  function get_key(c) {
    var k2;
    var k1;
    var match = get_key1(c);
    var match__0 = get_key2(c);
    if (match) {
      if (match__0) {k2 = match__0[1];k1 = match[1];return [0,[0,k1,k2]];}
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
  var clean = include[17];
  var stats_alive = include[18];
  var w_ = include[1];
  function create(sz) {return call2(w_, b_, sz);}
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
    clean,
    stats_alive
  ];
}

function create__1(n) {return call1(Obj[26][1], n);}

function length(k) {return call1(Obj[26][2], k);}

function get_key__0(t, n) {return obj_opt(call2(Obj[26][3], t, n));}

function get_key_copy__0(t, n) {return obj_opt(call2(Obj[26][4], t, n));}

function set_key__0(t, n, k) {return call3(Obj[26][5], t, n, k);}

function unset_key__0(t, n) {return call2(Obj[26][6], t, n);}

function check_key__0(t, n) {return call2(Obj[26][7], t, n);}

function blit_key__0(t1, o1, t2, o2, l) {
  return call5(Obj[26][8], t1, o1, t2, o2, l);
}

function get_data__1(t) {return obj_opt(call1(Obj[26][9], t));}

function get_data_copy__1(t) {return obj_opt(call1(Obj[26][10], t));}

function set_data__1(t, d) {return call2(Obj[26][11], t, d);}

function unset_data__1(t) {return call1(Obj[26][12], t);}

function check_data__1(t) {return call1(Obj[26][13], t);}

function blit_data__1(t1, t2) {return call2(Obj[26][14], t1, t2);}

function MakeSeeded__2(H) {
  function create(k, d) {
    var i;
    var t_;
    var c = create__1(k.length - 1);
    set_data__1(c, d);
    var s_ = k.length - 1 + -1 | 0;
    var r_ = 0;
    if (! (s_ < 0)) {
      i = r_;
      for (; ; ) {
        set_key__0(c, i, caml_check_bound(k, i)[i + 1]);
        t_ = i + 1 | 0;
        if (s_ !== i) {i = t_;continue;}
        break;
      }
    }
    return c;
  }
  function hash(seed, k) {
    var i;
    var o_;
    var p_;
    var q_;
    var h = [0,0];
    var n_ = k.length - 1 + -1 | 0;
    var m_ = 0;
    if (! (n_ < 0)) {
      i = m_;
      for (; ; ) {
        o_ = h[1];
        p_ = caml_check_bound(k, i)[i + 1];
        h[1] = (call2(H[2], seed, p_) * 65599 | 0) + o_ | 0;
        q_ = i + 1 | 0;
        if (n_ !== i) {i = q_;continue;}
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
      var match;
      var ki;
      var l_;
      var i__1;
      var i__0 = i;
      for (; ; ) {
        if (0 <= i__0) {
          match = get_key__0(c, i__0);
          if (match) {
            ki = match[1];
            l_ = caml_check_bound(k, i__0)[i__0 + 1];
            if (call2(H[1], l_, ki)) {
              i__1 = i__0 + -1 | 0;
              i__0 = i__1;
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
    var k0;
    var fill;
    var a;
    var len = length(c);
    if (0 === len) {return [0,[0]];}
    var match = get_key__0(c, 0);
    if (match) {
      k0 = match[1];
      fill =
        function(a, i) {
          var match;
          var ki;
          var i__1;
          var i__0 = i;
          for (; ; ) {
            if (1 <= i__0) {
              match = get_key__0(c, i__0);
              if (match) {
                ki = match[1];
                caml_check_bound(a, i__0)[i__0 + 1] = ki;
                i__1 = i__0 + -1 | 0;
                i__0 = i__1;
                continue;
              }
              return 0;
            }
            return [0,a];
          }
        };
      a = caml_make_vect(len, k0);
      return fill(a, len + -1 | 0);
    }
    return 0;
  }
  function set_key_data(c, k, d) {
    var k_;
    var i;
    unset_data__1(c);
    var j_ = k.length - 1 + -1 | 0;
    var i_ = 0;
    if (! (j_ < 0)) {
      i = i_;
      for (; ; ) {
        set_key__0(c, i, caml_check_bound(k, i)[i + 1]);
        k_ = i + 1 | 0;
        if (j_ !== i) {i = k_;continue;}
        break;
      }
    }
    return set_data__1(c, d);
  }
  function check_key(c) {
    function check(c, i) {
      var f_;
      var g_;
      var h_;
      var i__1;
      var i__0 = i;
      for (; ; ) {
        f_ = i__0 < 0 ? 1 : 0;
        if (f_) g_ = f_;
        else {
          h_ = check_key__0(c, i__0);
          if (h_) {i__1 = i__0 + -1 | 0;i__0 = i__1;continue;}
          g_ = h_;
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
  var clean = include[17];
  var stats_alive = include[18];
  var e_ = include[1];
  function create(sz) {return call2(e_, c_, sz);}
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
    clean,
    stats_alive
  ];
}

var Ephemeron = [
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

exports = Ephemeron;

/*::type Exports = {
}*/
/** @type {{
}} */
module.exports = ((exports /*:: : any*/) /*:: :Exports */);

/* Hashing disabled */
