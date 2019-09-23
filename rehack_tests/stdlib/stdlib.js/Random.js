/**
 * Random
 * @providesModule Random
 */
"use strict";
var Array_ = require('Array_.js');
var Digest = require('Digest.js');
var Int32 = require('Int32.js');
var Int64 = require('Int64.js');
var Nativeint = require('Nativeint.js');
var Pervasives = require('Pervasives.js');
var runtime = require('runtime.js');

let joo_global_object = global;


var runtime = joo_global_object.jsoo_runtime;
var caml_check_bound = runtime["caml_check_bound"];
var caml_greaterthan = runtime["caml_greaterthan"];
var caml_int64_of_int32 = runtime["caml_int64_of_int32"];
var caml_int64_or = runtime["caml_int64_or"];
var caml_int64_shift_left = runtime["caml_int64_shift_left"];
var caml_int64_sub = runtime["caml_int64_sub"];
var caml_lessequal = runtime["caml_lessequal"];
var caml_mod = runtime["caml_mod"];
var string = runtime["caml_new_string"];
var caml_string_get = runtime["caml_string_get"];
var caml_sys_random_seed = runtime["caml_sys_random_seed"];

function call1(f, a0) {
  return f.length === 1 ? f(a0) : runtime["caml_call_gen"](f, [a0]);
}

function call2(f, a0, a1) {
  return f.length === 2 ? f(a0, a1) : runtime["caml_call_gen"](f, [a0,a1]);
}

function call5(f, a0, a1, a2, a3, a4) {
  return f.length === 5 ?
    f(a0, a1, a2, a3, a4) :
    runtime["caml_call_gen"](f, [a0,a1,a2,a3,a4]);
}

var global_data = runtime["caml_get_global_data"]();
var cst_Random_int64 = string("Random.int64");
var cst_Random_int32 = string("Random.int32");
var cst_Random_int = string("Random.int");
var cst_x = string("x");
var Int32 = global_data["Int32"];
var Int64 = global_data["Int64"];
var Pervasives = global_data["Pervasives"];
var Digest = global_data["Digest"];
var Array = global_data["Array_"];
var Nativeint = global_data["Nativeint"];
var a = [255,1,0,0];
var b = [255,0,0,0];
var c = [
  0,
  987910699,
  495797812,
  364182224,
  414272206,
  318284740,
  990407751,
  383018966,
  270373319,
  840823159,
  24560019,
  536292337,
  512266505,
  189156120,
  730249596,
  143776328,
  51606627,
  140166561,
  366354223,
  1003410265,
  700563762,
  981890670,
  913149062,
  526082594,
  1021425055,
  784300257,
  667753350,
  630144451,
  949649812,
  48546892,
  415514493,
  258888527,
  511570777,
  89983870,
  283659902,
  308386020,
  242688715,
  482270760,
  865188196,
  1027664170,
  207196989,
  193777847,
  619708188,
  671350186,
  149669678,
  257044018,
  87658204,
  558145612,
  183450813,
  28133145,
  901332182,
  710253903,
  510646120,
  652377910,
  409934019,
  801085050
];

function new_state(param) {return [0,runtime["caml_make_vect"](55, 0),0];}

function assign(st1, st2) {
  call5(Array[10], st2[1], 0, st1[1], 0, 55);
  st1[2] = st2[2];
  return 0;
}

function full_init(s, seed) {
  function combine(accu, x) {
    var q = call1(Pervasives[21], x);
    var r = call2(Pervasives[16], accu, q);
    return call1(Digest[3], r);
  }
  function extract(d) {
    var n = caml_string_get(d, 3) << 24;
    var o = caml_string_get(d, 2) << 16;
    var p = caml_string_get(d, 1) << 8;
    return ((caml_string_get(d, 0) + p | 0) + o | 0) + n | 0;
  }
  var seed__0 = 0 === seed.length - 1 ? [0,0] : seed;
  var l = seed__0.length - 1;
  var i__0 = 0;
  for (; ; ) {
    caml_check_bound(s[1], i__0)[i__0 + 1] = i__0;
    var m = i__0 + 1 | 0;
    if (54 !== i__0) {var i__0 = m;continue;}
    var accu = [0,cst_x];
    var h = 54 + call2(Pervasives[5], 55, l) | 0;
    var g = 0;
    if (! (h < 0)) {
      var i = g;
      for (; ; ) {
        var j = i % 55 | 0;
        var k = caml_mod(i, l);
        var i = caml_check_bound(seed__0, k)[k + 1];
        accu[1] = combine(accu[1], i);
        var j = extract(accu[1]);
        var k = (caml_check_bound(s[1], j)[j + 1] ^ j) & 1073741823;
        caml_check_bound(s[1], j)[j + 1] = k;
        var l = i + 1 | 0;
        if (h !== i) {var i = l;continue;}
        break;
      }
    }
    s[2] = 0;
    return 0;
  }
}

function make(seed) {
  var result = new_state(0);
  full_init(result, seed);
  return result;
}

function make_self_init(param) {return make(caml_sys_random_seed(0));}

function copy(s) {var result = new_state(0);assign(result, s);return result;}

function bits(s) {
  s[2] = (s[2] + 1 | 0) % 55 | 0;
  var d = s[2];
  var curval = caml_check_bound(s[1], d)[d + 1];
  var e = (s[2] + 24 | 0) % 55 | 0;
  var newval = caml_check_bound(s[1], e)[e + 1] +
    (curval ^ (curval >>> 25 | 0) & 31) | 0;
  var newval30 = newval & 1073741823;
  var f = s[2];
  caml_check_bound(s[1], f)[f + 1] = newval30;
  return newval30;
}

function intaux(s, n) {
  for (; ; ) {
    var r = bits(s);
    var v = caml_mod(r, n);
    if (((1073741823 - n | 0) + 1 | 0) < (r - v | 0)) {continue;}
    return v;
  }
}

function int__0(s, bound) {
  if (! (1073741823 < bound)) {if (0 < bound) {return intaux(s, bound);}}
  return call1(Pervasives[1], cst_Random_int);
}

function int32aux(s, n) {
  for (; ; ) {
    var b1 = bits(s);
    var b2 = (bits(s) & 1) << 30;
    var r = b1 | b2;
    var v = caml_mod(r, n);
    if (caml_greaterthan(r - v | 0, (Int32[7] - n | 0) + 1 | 0)) {continue;}
    return v;
  }
}

function int32(s, bound) {
  return caml_lessequal(bound, 0) ?
    call1(Pervasives[1], cst_Random_int32) :
    int32aux(s, bound);
}

function int64aux(s, n) {
  for (; ; ) {
    var b1 = caml_int64_of_int32(bits(s));
    var b2 = caml_int64_shift_left(caml_int64_of_int32(bits(s)), 30);
    var b3 = caml_int64_shift_left(caml_int64_of_int32(bits(s) & 7), 60);
    var r = caml_int64_or(b1, caml_int64_or(b2, b3));
    var v = runtime["caml_int64_mod"](r, n);
    if (
    caml_greaterthan(
      caml_int64_sub(r, v),
      runtime["caml_int64_add"](caml_int64_sub(Int64[7], n), a)
    )
    ) {continue;}
    return v;
  }
}

function int64(s, bound) {
  return caml_lessequal(bound, b) ?
    call1(Pervasives[1], cst_Random_int64) :
    int64aux(s, bound);
}

var nativeint = 32 === Nativeint[7] ?
  function(s, bound) {return int32(s, bound);} :
  function(s, bound) {
   return runtime["caml_int64_to_int32"](int64(s, caml_int64_of_int32(bound)));
 };

function rawfloat(s) {
  var r1 = bits(s);
  var r2 = bits(s);
  return (r1 / 1073741824 + r2) / 1073741824;
}

function float__0(s, bound) {return rawfloat(s) * bound;}

function bool(s) {return 0 === (bits(s) & 1) ? 1 : 0;}

var default__0 = [0,c.slice(),0];

function bits__0(param) {return bits(default__0);}

function int__1(bound) {return int__0(default__0, bound);}

function int32__0(bound) {return int32(default__0, bound);}

function nativeint__0(bound) {return nativeint(default__0, bound);}

function int64__0(bound) {return int64(default__0, bound);}

function float__1(scale) {return float__0(default__0, scale);}

function bool__0(param) {return bool(default__0);}

function full_init__0(seed) {return full_init(default__0, seed);}

function init(seed) {return full_init(default__0, [0,seed]);}

function self_init(param) {return full_init__0(caml_sys_random_seed(0));}

function get_state(param) {return copy(default__0);}

function set_state(s) {return assign(default__0, s);}

var Random = [
  0,
  init,
  full_init__0,
  self_init,
  bits__0,
  int__1,
  int32__0,
  nativeint__0,
  int64__0,
  float__1,
  bool__0,
  [0,make,make_self_init,copy,bits,int__0,int32,nativeint,int64,float__0,bool],
  get_state,
  set_state
];

runtime["caml_register_global"](16, Random, "Random");


module.exports = global.jsoo_runtime.caml_get_global_data().Random;