/**
 * @flow strict
 * Stream
 */

// @ts-check


"use strict";
let joo_global_object = typeof global !== 'undefined' ? global : window;
require('runtime.js');

var runtime = joo_global_object.jsoo_runtime;
var caml_bytes_unsafe_get = runtime["caml_bytes_unsafe_get"];
var caml_fresh_oo_id = runtime["caml_fresh_oo_id"];
var caml_ml_bytes_length = runtime["caml_ml_bytes_length"];
var string = runtime["caml_new_string"];
var caml_obj_tag = runtime["caml_obj_tag"];
var caml_wrap_thrown_exception = runtime["caml_wrap_thrown_exception"];

function call1(f, a0) {
  return f.length === 1 ? f(a0) : runtime["caml_call_gen"](f, [a0]);
}

function call3(f, a0, a1, a2) {
  return f.length === 3 ?
    f(a0, a1, a2) :
    runtime["caml_call_gen"](f, [a0,a1,a2]);
}

function call4(f, a0, a1, a2, a3) {
  return f.length === 4 ?
    f(a0, a1, a2, a3) :
    runtime["caml_call_gen"](f, [a0,a1,a2,a3]);
}

var cst_count = string("{count = ");
var cst_data = string("; data = ");
var cst = string("}");
var cst_Sempty = string("Sempty");
var cst_Scons = string("Scons (");
var cst__0 = string(", ");
var cst__1 = string(")");
var cst_Sapp = string("Sapp (");
var cst__2 = string(", ");
var cst__3 = string(")");
var cst_Slazy = string("Slazy");
var cst_Sgen = string("Sgen");
var cst_Sbuffio = string("Sbuffio");
var cst_Stream_Failure = string("Stream.Failure");
var cst_Stream_Error = string("Stream.Error");
var Assert_failure = require("Assert_failure.js");
var CamlinternalLazy = require("CamlinternalLazy.js");
var Pervasives = require("Pervasives.js");
var List = require("List_.js");
var a_ = [0,string("stream.ml"),53,12];
var b_ = [0,0];
var c_ = [0,string("stream.ml"),82,12];
var Failure = [248,cst_Stream_Failure,caml_fresh_oo_id(0)];
var Error = [248,cst_Stream_Error,caml_fresh_oo_id(0)];

function count(param) {
  if (param) {var match = param[1];var count = match[1];return count;}
  return 0;
}

function data(param) {
  if (param) {var match = param[1];var data = match[2];return data;}
  return 0;
}

function fill_buff(b) {
  b[3] = call4(Pervasives[72], b[1], b[2], 0, caml_ml_bytes_length(b[2]));
  b[4] = 0;
  return 0;
}

function get_data(count, d) {
  var d__0 = d;
  for (; ; ) {
    if (! (typeof d__0 === "number")) {
      switch (d__0[0]) {
        case 1:
          var d2 = d__0[2];
          var d1 = d__0[1];
          var match = get_data(count, d1);
          if (typeof match === "number") {var d__0 = d2;continue;}
          else {
            if (0 === match[0]) {
              var d11 = match[2];
              var a = match[1];
              return [0,a,[1,d11,d2]];
            }
            throw caml_wrap_thrown_exception([0,Assert_failure,a_]);
          }
        case 2:
          var f = d__0[1];
          var q_ = caml_obj_tag(f);
          var d__1 = 250 === q_ ?
            f[1] :
            246 === q_ ? call1(CamlinternalLazy[2], f) : f;
          var d__0 = d__1;
          continue;
        case 3:
          var r_ = d__0[1];
          var s_ = r_[1];
          if (s_) {
            var t_ = s_[1];
            if (t_) {var a__0 = t_[1];r_[1] = 0;return [0,a__0,d__0];}
            return 0;
          }
          var match__0 = call1(r_[2], count);
          if (match__0) {var a__1 = match__0[1];return [0,a__1,d__0];}
          r_[1] = b_;
          return 0;
        case 4:
          var b = d__0[1];
          if (b[3] <= b[4]) {fill_buff(b);}
          if (0 === b[3]) {return 0;}
          var r = caml_bytes_unsafe_get(b[2], b[4]);
          b[4] = b[4] + 1 | 0;
          return [0,r,d__0]
        }
    }
    return d__0;
  }
}

function peek_data(s) {
  for (; ; ) {
    var l_ = s[2];
    if (typeof l_ === "number") return 0;
    else switch (l_[0]) {
      case 0:
        var a = l_[1];
        return [0,a];
      case 1:
        var d = get_data(s[1], s[2]);
        if (typeof d === "number") return 0;
        else {
          if (0 === d[0]) {var a__0 = d[1];s[2] = d;return [0,a__0];}
          throw caml_wrap_thrown_exception([0,Assert_failure,c_]);
        }
      case 2:
        var f = l_[1];
        var m_ = caml_obj_tag(f);
        var n_ = 250 === m_ ?
          f[1] :
          246 === m_ ? call1(CamlinternalLazy[2], f) : f;
        s[2] = n_;
        continue;
      case 3:
        var o_ = l_[1];
        var p_ = o_[1];
        if (p_) {var a__1 = p_[1];return a__1;}
        var x = call1(o_[2], s[1]);
        o_[1] = [0,x];
        return x;
      default:
        var b = l_[1];
        if (b[3] <= b[4]) {fill_buff(b);}
        if (0 === b[3]) {s[2] = 0;return 0;}
        return [0,caml_bytes_unsafe_get(b[2], b[4])]
      }
  }
}

function peek(param) {
  if (param) {var s = param[1];return peek_data(s);}
  return 0;
}

function junk_data(s) {
  for (; ; ) {
    var j_ = s[2];
    if (! (typeof j_ === "number")) {
      switch (j_[0]) {
        case 0:
          var d = j_[2];
          s[1] = s[1] + 1 | 0;
          s[2] = d;
          return 0;
        case 3:
          var k_ = j_[1];
          if (k_[1]) {s[1] = s[1] + 1 | 0;k_[1] = 0;return 0;}
          break;
        case 4:
          var b = j_[1];
          s[1] = s[1] + 1 | 0;
          b[4] = b[4] + 1 | 0;
          return 0
        }
    }
    var match = peek_data(s);
    if (match) {continue;}
    return 0;
  }
}

function junk(param) {
  if (param) {var data = param[1];return junk_data(data);}
  return 0;
}

function nget_data(n, s) {
  if (0 < n) {
    var match = peek_data(s);
    if (match) {
      var a = match[1];
      junk_data(s);
      var match__0 = nget_data(n + -1 | 0, s);
      var k = match__0[3];
      var d = match__0[2];
      var al = match__0[1];
      return [0,[0,a,al],[0,a,d],k + 1 | 0];
    }
    return [0,0,s[2],0];
  }
  return [0,0,s[2],0];
}

function npeek_data(n, s) {
  var match = nget_data(n, s);
  var len = match[3];
  var d = match[2];
  var al = match[1];
  s[1] = s[1] - len | 0;
  s[2] = d;
  return al;
}

function npeek(n, param) {
  if (param) {var d = param[1];return npeek_data(n, d);}
  return 0;
}

function next(s) {
  var match = peek(s);
  if (match) {var a = match[1];junk(s);return a;}
  throw caml_wrap_thrown_exception(Failure);
}

function empty(s) {
  var match = peek(s);
  if (match) {throw caml_wrap_thrown_exception(Failure);}
  return 0;
}

function iter(f, strm) {
  function do_rec(param) {
    for (; ; ) {
      var match = peek(strm);
      if (match) {var a = match[1];junk(strm);call1(f, a);continue;}
      return 0;
    }
  }
  return do_rec(0);
}

function from(f) {return [0,[0,0,[3,[0,0,f]]]];}

function of_list(l) {
  var h_ = 0;
  function i_(x, l) {return [0,x,l];}
  return [0,[0,0,call3(List[21], i_, l, h_)]];
}

function of_string(s) {
  var count = [0,0];
  return from(
    function(param) {
      var c = count[1];
      if (c < runtime["caml_ml_string_length"](s)) {
        count[1] += 1;
        return [0,runtime["caml_string_get"](s, c)];
      }
      return 0;
    }
  );
}

function of_bytes(s) {
  var count = [0,0];
  return from(
    function(param) {
      var c = count[1];
      if (c < caml_ml_bytes_length(s)) {
        count[1] += 1;
        return [0,runtime["caml_bytes_get"](s, c)];
      }
      return 0;
    }
  );
}

function of_channel(ic) {
  return [0,[0,0,[4,[0,ic,runtime["caml_create_bytes"](4096),0,0]]]];
}

function iapp(i, s) {var g_ = data(s);return [0,[0,0,[1,data(i),g_]]];}

function icons(i, s) {return [0,[0,0,[0,i,data(s)]]];}

function ising(i) {return [0,[0,0,[0,i,0]]];}

function lapp(f, s) {
  return [
    0,
    [
      0,
      0,
      [
        2,
        [
          246,
          function(param) {var f_ = data(s);return [1,data(call1(f, 0)),f_];}
        ]
      ]
    ]
  ];
}

function lcons(f, s) {
  return [
    0,
    [
      0,
      0,
      [2,[246,function(param) {var e_ = data(s);return [0,call1(f, 0),e_];}]]
    ]
  ];
}

function lsing(f) {
  return [0,[0,0,[2,[246,function(param) {return [0,call1(f, 0),0];}]]]];
}

var sempty = 0;

function slazy(f) {
  return [0,[0,0,[2,[246,function(param) {return data(call1(f, 0));}]]]];
}

function dump(f, s) {
  call1(Pervasives[30], cst_count);
  var d_ = count(s);
  call1(Pervasives[32], d_);
  call1(Pervasives[30], cst_data);
  dump_data(f, data(s));
  call1(Pervasives[30], cst);
  return call1(Pervasives[35], 0);
}

function dump_data(f, param) {
  if (typeof param === "number") return call1(
    Pervasives[30],
    cst_Sempty
  );
  else switch (param[0]) {
    case 0:
      var d = param[2];
      var a = param[1];
      call1(Pervasives[30], cst_Scons);
      call1(f, a);
      call1(Pervasives[30], cst__0);
      dump_data(f, d);
      return call1(Pervasives[30], cst__1);
    case 1:
      var d2 = param[2];
      var d1 = param[1];
      call1(Pervasives[30], cst_Sapp);
      dump_data(f, d1);
      call1(Pervasives[30], cst__2);
      dump_data(f, d2);
      return call1(Pervasives[30], cst__3);
    case 2:
      return call1(Pervasives[30], cst_Slazy);
    case 3:
      return call1(Pervasives[30], cst_Sgen);
    default:
      return call1(Pervasives[30], cst_Sbuffio)
    }
}

var Stream = [
  0,
  Failure,
  Error,
  from,
  of_list,
  of_string,
  of_bytes,
  of_channel,
  iter,
  next,
  empty,
  peek,
  junk,
  count,
  npeek,
  iapp,
  icons,
  ising,
  lapp,
  lcons,
  lsing,
  sempty,
  slazy,
  dump
];

exports = Stream;

/*::type Exports = {
  dump: (f: any, s: any) => any,
  slazy: (f: any) => any,
  sempty: any
  lsing: (f: any) => any,
  lcons: (f: any, s: any) => any,
  lapp: (f: any, s: any) => any,
  ising: (i: any) => any,
  icons: (i: any, s: any) => any,
  iapp: (i: any, s: any) => any,
  npeek: (n: any, param: any) => any,
  count: (param: any) => any,
  junk: (param: any) => any,
  peek: (param: any) => any,
  empty: (s: any) => any,
  next: (s: any) => any,
  iter: (f: any, strm: any) => any,
  of_channel: (ic: any) => any,
  of_bytes: (s: any) => any,
  of_string: (s: any) => any,
  of_list: (l: any) => any,
  from: (f: any) => any,
  Error: any
  Failure: any
}*/
/** @type {{
  dump: (any, any) => any,
  slazy: (any) => any,
  sempty: any,
  lsing: (any) => any,
  lcons: (any, any) => any,
  lapp: (any, any) => any,
  ising: (any) => any,
  icons: (any, any) => any,
  iapp: (any, any) => any,
  npeek: (any, any) => any,
  count: (any) => any,
  junk: (any) => any,
  peek: (any) => any,
  empty: (any) => any,
  next: (any) => any,
  iter: (any, any) => any,
  of_channel: (any) => any,
  of_bytes: (any) => any,
  of_string: (any) => any,
  of_list: (any) => any,
  from: (any) => any,
  Error: any,
  Failure: any,
}} */
module.exports = ((exports /*:: : any*/) /*:: :Exports */);
module.exports.dump = module.exports[23];
module.exports.slazy = module.exports[22];
module.exports.sempty = module.exports[21];
module.exports.lsing = module.exports[20];
module.exports.lcons = module.exports[19];
module.exports.lapp = module.exports[18];
module.exports.ising = module.exports[17];
module.exports.icons = module.exports[16];
module.exports.iapp = module.exports[15];
module.exports.npeek = module.exports[14];
module.exports.count = module.exports[13];
module.exports.junk = module.exports[12];
module.exports.peek = module.exports[11];
module.exports.empty = module.exports[10];
module.exports.next = module.exports[9];
module.exports.iter = module.exports[8];
module.exports.of_channel = module.exports[7];
module.exports.of_bytes = module.exports[6];
module.exports.of_string = module.exports[5];
module.exports.of_list = module.exports[4];
module.exports.from = module.exports[3];
module.exports.Error = module.exports[2];
module.exports.Failure = module.exports[1];

/* Hashing disabled */
