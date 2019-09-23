/**
 * Ephemeron
 * @providesModule Ephemeron
 */
"use strict";
var Array_ = require('Array_.js');
var CamlinternalLazy = require('CamlinternalLazy.js');
var Hashtbl = require('Hashtbl.js');
var Obj = require('Obj.js');
var Pervasives = require('Pervasives.js');
var Random = require('Random.js');
var Sys = require('Sys.js');
var Not_found = require('Not_found.js');
var runtime = require('runtime.js');

let joo_global_object = global;


var runtime = joo_global_object.jsoo_runtime;
var caml_check_bound = runtime["caml_check_bound"];
var caml_make_vect = runtime["caml_make_vect"];
var caml_wrap_exception = runtime["caml_wrap_exception"];

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
var Obj = global_data["Obj"];
var Sys = global_data["Sys"];
var Not_found = global_data["Not_found"];
var Pervasives = global_data["Pervasives"];
var Array = global_data["Array_"];
var Hashtbl = global_data["Hashtbl"];
var CamlinternalLazy = global_data["CamlinternalLazy"];
var Random = global_data["Random"];
var c = [0,0];
var b = [0,0];
var a = [0,0];

function MakeSeeded(H) {
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
  var prng = [246,function(ax) {return call1(Random[11][2], 0);}];
  function create(opt, initial_size) {
    if (opt) {
      var sth = opt[1];
      var random = sth;
    }
    else var random = call1(Hashtbl[17], 0);
    var s = power_2_above(16, initial_size);
    if (random) {
      var av = runtime["caml_obj_tag"](prng);
      var aw = 250 === av ?
        prng[1] :
        246 === av ? call1(CamlinternalLazy[2], prng) : prng;
      var seed = call1(Random[11][4], aw);
    }
    else var seed = 0;
    return [0,0,caml_make_vect(s, 0),seed,s];
  }
  function clear(h) {
    h[1] = 0;
    var len = h[2].length - 1;
    var at = len + -1 | 0;
    var as = 0;
    if (! (at < 0)) {
      var i = as;
      for (; ; ) {
        caml_check_bound(h[2], i)[i + 1] = 0;
        var au = i + 1 | 0;
        if (at !== i) {var i = au;continue;}
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
    var ap = h[4];
    var aq = h[3];
    var ar = call1(Array[8], h[2]);
    return [0,h[1],ar,aq,ap];
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
    var an = d.length - 1 + -1 | 0;
    var am = 0;
    if (! (an < 0)) {
      var i = am;
      for (; ; ) {
        d[i + 1] = do_bucket(caml_check_bound(d, i)[i + 1]);
        var ao = i + 1 | 0;
        if (an !== i) {var i = ao;continue;}
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
    var ag = nsize < Sys[14] ? 1 : 0;
    var ah = ag ? (osize >>> 1 | 0) <= h[1] ? 1 : 0 : ag;
    if (ah) {
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
      var aj = osize + -1 | 0;
      var ai = 0;
      if (! (aj < 0)) {
        var i = ai;
        for (; ; ) {
          insert_bucket(caml_check_bound(odata, i)[i + 1]);
          var al = i + 1 | 0;
          if (aj !== i) {var i = al;continue;}
          break;
        }
      }
      var ak = 0;
    }
    else var ak = ah;
    return ak;
  }
  function add(h, key, info) {
    var hkey = call2(H[2], h[3], key);
    var i = key_index(h, hkey);
    var container = call2(H[1], key, info);
    var bucket = [0,hkey,container,caml_check_bound(h[2], i)[i + 1]];
    caml_check_bound(h[2], i)[i + 1] = bucket;
    h[1] = h[1] + 1 | 0;
    var af = h[2].length - 1 << 1 < h[1] ? 1 : 0;
    return af ? resize(h) : af;
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
    var ae = remove_bucket(caml_check_bound(h[2], i)[i + 1]);
    caml_check_bound(h[2], i)[i + 1] = ae;
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
      throw runtime["caml_wrap_thrown_exception"](Not_found);
    }
  }
  function find(h, key) {
    var hkey = call2(H[2], h[3], key);
    var ad = key_index(h, hkey);
    return find_rec(key, hkey, caml_check_bound(h[2], ad)[ad + 1]);
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
    var ac = key_index(h, hkey);
    return find_rec_opt(key, hkey, caml_check_bound(h[2], ac)[ac + 1]);
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
    var ab = key_index(h, hkey);
    return find_in_bucket(caml_check_bound(h[2], ab)[ab + 1]);
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
        throw runtime["caml_wrap_thrown_exception"](Not_found);
      }
    }
    var i = key_index(h, hkey);
    var l = caml_check_bound(h[2], i)[i + 1];
    try {var Z = replace_bucket(l);return Z;}
    catch(aa) {
      aa = caml_wrap_exception(aa);
      if (aa === Not_found) {
        var container = call2(H[1], key, info);
        caml_check_bound(h[2], i)[i + 1] = [0,hkey,container,l];
        h[1] = h[1] + 1 | 0;
        var Y = h[2].length - 1 << 1 < h[1] ? 1 : 0;
        return Y ? resize(h) : Y;
      }
      throw runtime["caml_wrap_thrown_exception_reraise"](aa);
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
    var X = key_index(h, hkey);
    return mem_in_bucket(caml_check_bound(h[2], X)[X + 1]);
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
    var V = d.length - 1 + -1 | 0;
    var U = 0;
    if (! (V < 0)) {
      var i = U;
      for (; ; ) {
        do_bucket(caml_check_bound(d, i)[i + 1]);
        var W = i + 1 | 0;
        if (V !== i) {var i = W;continue;}
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
    var R = d.length - 1 + -1 | 0;
    var Q = 0;
    if (! (R < 0)) {
      var i = Q;
      for (; ; ) {
        var S = accu[1];
        accu[1] = do_bucket(caml_check_bound(d, i)[i + 1], S);
        var T = i + 1 | 0;
        if (R !== i) {var i = T;continue;}
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
    var O = d.length - 1 + -1 | 0;
    var N = 0;
    if (! (O < 0)) {
      var i = N;
      for (; ; ) {
        d[i + 1] = do_bucket(caml_check_bound(d, i)[i + 1]);
        var P = i + 1 | 0;
        if (O !== i) {var i = P;continue;}
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
    var H = h[2];
    var I = 0;
    function J(m, b) {
      var M = bucket_length(0, b);
      return call2(Pervasives[5], m, M);
    }
    var mbl = call3(Array[17], J, I, H);
    var histo = caml_make_vect(mbl + 1 | 0, 0);
    var K = h[2];
    function L(b) {
      var l = bucket_length(0, b);
      histo[l + 1] = caml_check_bound(histo, l)[l + 1] + 1 | 0;
      return 0;
    }
    call2(Array[13], L, K);
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
    var B = h[2];
    var C = 0;
    function D(m, b) {
      var G = bucket_length_alive(0, b);
      return call2(Pervasives[5], m, G);
    }
    var mbl = call3(Array[17], D, C, B);
    var histo = caml_make_vect(mbl + 1 | 0, 0);
    var E = h[2];
    function F(b) {
      var l = bucket_length_alive(0, b);
      size[1] = size[1] + l | 0;
      histo[l + 1] = caml_check_bound(histo, l)[l + 1] + 1 | 0;
      return 0;
    }
    call2(Array[13], F, E);
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
  var clean = include[17];
  var stats_alive = include[18];
  var A = include[1];
  function create(sz) {return call2(A, a, sz);}
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
    var z = call2(H2[2], seed, k2) * 65599 | 0;
    return call2(H1[2], seed, k1) + z | 0;
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
  function check_key(c) {var y = check_key1(c);return y ? check_key2(c) : y;}
  return MakeSeeded(
    [0,create,hash,equal,get_data__0,get_key,set_key_data,check_key]
  );
}

function Make__0(H1, H2) {
  var equal = H2[1];
  function hash(seed, x) {return call1(H2[2], x);}
  var equal__0 = H1[1];
  var u = [0,equal,hash];
  function hash__0(seed, x) {return call1(H1[2], x);}
  var v = [0,equal__0,hash__0];
  var include = function(x) {return MakeSeeded__1(v, x);}(u);
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
  var w = include[1];
  function create(sz) {return call2(w, b, sz);}
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
    var c = create__1(k.length - 1);
    set_data__1(c, d);
    var s = k.length - 1 + -1 | 0;
    var r = 0;
    if (! (s < 0)) {
      var i = r;
      for (; ; ) {
        set_key__0(c, i, caml_check_bound(k, i)[i + 1]);
        var t = i + 1 | 0;
        if (s !== i) {var i = t;continue;}
        break;
      }
    }
    return c;
  }
  function hash(seed, k) {
    var h = [0,0];
    var n = k.length - 1 + -1 | 0;
    var m = 0;
    if (! (n < 0)) {
      var i = m;
      for (; ; ) {
        var o = h[1];
        var p = caml_check_bound(k, i)[i + 1];
        h[1] = (call2(H[2], seed, p) * 65599 | 0) + o | 0;
        var q = i + 1 | 0;
        if (n !== i) {var i = q;continue;}
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
            var l = caml_check_bound(k, i__0)[i__0 + 1];
            if (call2(H[1], l, ki)) {
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
    var j = k.length - 1 + -1 | 0;
    var i = 0;
    if (! (j < 0)) {
      var i__0 = i;
      for (; ; ) {
        set_key__0(c, i__0, caml_check_bound(k, i__0)[i__0 + 1]);
        var k = i__0 + 1 | 0;
        if (j !== i__0) {var i__0 = k;continue;}
        break;
      }
    }
    return set_data__1(c, d);
  }
  function check_key(c) {
    function check(c, i) {
      var i__0 = i;
      for (; ; ) {
        var f = i__0 < 0 ? 1 : 0;
        if (f) var g = f;
        else {
          var h = check_key__0(c, i__0);
          if (h) {var i__1 = i__0 + -1 | 0;var i__0 = i__1;continue;}
          var g = h;
        }
        return g;
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
  var e = include[1];
  function create(sz) {return call2(e, c, sz);}
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
  [0,function(d) {return MakeSeeded([0,d[3],d[1],d[2],d[5],d[4],d[6],d[7]]);}]
];

runtime["caml_register_global"](11, Ephemeron, "Ephemeron");


module.exports = global.jsoo_runtime.caml_get_global_data().Ephemeron;
/*____hashes compiler:hashing-disabled inputs:hashing-disabled bytecode:hashing-disabled*/
