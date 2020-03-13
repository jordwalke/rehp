/**
 * @flow strict
 * Stream
 */

// @ts-check


"use strict";

var runtime = require("../runtime/runtime.js");

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

var caml_bytes_unsafe_get = runtime["caml_bytes_unsafe_get"];
var caml_fresh_oo_id = runtime["caml_fresh_oo_id"];
var caml_ml_bytes_length = runtime["caml_ml_bytes_length"];
var string = runtime["caml_new_string"];
var caml_obj_tag = runtime["caml_obj_tag"];
var caml_wrap_thrown_exception = runtime["caml_wrap_thrown_exception"];
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
var Assert_failure = require("../runtime/Assert_failure.js");
var CamlinternalLazy = require("./CamlinternalLazy.js");
var Pervasives = require("./Pervasives.js");
var List = require("./List.js");
var a_ = [0,string("stream.ml"),53,12];
var b_ = [0,0];
var c_ = [0,string("stream.ml"),82,12];
var Failure = [248,cst_Stream_Failure,caml_fresh_oo_id(0)];
var Error = [248,cst_Stream_Error,caml_fresh_oo_id(0)];

function count(param) {
  var count;
  var match;
  if (param) {match = param[1];count = match[1];return count;}
  return 0;
}

function data(param) {
  var data;
  var match;
  if (param) {match = param[1];data = match[2];return data;}
  return 0;
}

function fill_buff(b) {
  b[3] = call4(Pervasives[72], b[1], b[2], 0, caml_ml_bytes_length(b[2]));
  b[4] = 0;
  return 0;
}

function get_data(count, d) {
  var d2;
  var d1;
  var match;
  var d11;
  var a;
  var f;
  var q_;
  var d__1;
  var r_;
  var s_;
  var t_;
  var a__0;
  var match__0;
  var a__1;
  var b;
  var r;
  var d__0 = d;
  for (; ; ) {
    if (! (typeof d__0 === "number")) {
      switch (d__0[0]) {
        case 1:
          d2 = d__0[2];
          d1 = d__0[1];
          match = get_data(count, d1);
          if (typeof match === "number") {d__0 = d2;continue;}
          else {
            if (0 === match[0]) {
              d11 = match[2];
              a = match[1];
              return [0,a,[1,d11,d2]];
            }
            throw caml_wrap_thrown_exception([0,Assert_failure,a_]);
          }
        case 2:
          f = d__0[1];
          q_ = caml_obj_tag(f);
          d__1 =
            250 === q_ ? f[1] : 246 === q_ ? call1(CamlinternalLazy[2], f) : f;
          d__0 = d__1;
          continue;
        case 3:
          r_ = d__0[1];
          s_ = r_[1];
          if (s_) {
            t_ = s_[1];
            if (t_) {a__0 = t_[1];r_[1] = 0;return [0,a__0,d__0];}
            return 0;
          }
          match__0 = call1(r_[2], count);
          if (match__0) {a__1 = match__0[1];return [0,a__1,d__0];}
          r_[1] = b_;
          return 0;
        case 4:
          b = d__0[1];
          if (b[3] <= b[4]) {fill_buff(b);}
          if (0 === b[3]) {return 0;}
          r = caml_bytes_unsafe_get(b[2], b[4]);
          b[4] = b[4] + 1 | 0;
          return [0,r,d__0]
        }
    }
    return d__0;
  }
}

function peek_data(s) {
  var b;
  var x;
  var a__1;
  var p_;
  var o_;
  var n_;
  var m_;
  var f;
  var a__0;
  var d;
  var a;
  var l_;
  for (; ; ) {
    l_ = s[2];
    if (typeof l_ === "number") return 0;
    else switch (l_[0]) {
      case 0:
        a = l_[1];
        return [0,a];
      case 1:
        d = get_data(s[1], s[2]);
        if (typeof d === "number") return 0;
        else {
          if (0 === d[0]) {a__0 = d[1];s[2] = d;return [0,a__0];}
          throw caml_wrap_thrown_exception([0,Assert_failure,c_]);
        }
      case 2:
        f = l_[1];
        m_ = caml_obj_tag(f);
        n_ =
          250 === m_ ? f[1] : 246 === m_ ? call1(CamlinternalLazy[2], f) : f;
        s[2] = n_;
        continue;
      case 3:
        o_ = l_[1];
        p_ = o_[1];
        if (p_) {a__1 = p_[1];return a__1;}
        x = call1(o_[2], s[1]);
        o_[1] = [0,x];
        return x;
      default:
        b = l_[1];
        if (b[3] <= b[4]) {fill_buff(b);}
        if (0 === b[3]) {s[2] = 0;return 0;}
        return [0,caml_bytes_unsafe_get(b[2], b[4])]
      }
  }
}

function peek(param) {
  var s;
  if (param) {s = param[1];return peek_data(s);}
  return 0;
}

function junk_data(s) {
  var b;
  var k_;
  var d;
  var match;
  var j_;
  for (; ; ) {
    j_ = s[2];
    if (! (typeof j_ === "number")) {
      switch (j_[0]) {
        case 0:
          d = j_[2];
          s[1] = s[1] + 1 | 0;
          s[2] = d;
          return 0;
        case 3:
          k_ = j_[1];
          if (k_[1]) {s[1] = s[1] + 1 | 0;k_[1] = 0;return 0;}
          break;
        case 4:
          b = j_[1];
          s[1] = s[1] + 1 | 0;
          b[4] = b[4] + 1 | 0;
          return 0
        }
    }
    match = peek_data(s);
    if (match) {continue;}
    return 0;
  }
}

function junk(param) {
  var data;
  if (param) {data = param[1];return junk_data(data);}
  return 0;
}

function nget_data(n, s) {
  var al;
  var d;
  var k;
  var match__0;
  var a;
  var match;
  if (0 < n) {
    match = peek_data(s);
    if (match) {
      a = match[1];
      junk_data(s);
      match__0 = nget_data(n + -1 | 0, s);
      k = match__0[3];
      d = match__0[2];
      al = match__0[1];
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
  var d;
  if (param) {d = param[1];return npeek_data(n, d);}
  return 0;
}

function next(s) {
  var a;
  var match = peek(s);
  if (match) {a = match[1];junk(s);return a;}
  throw caml_wrap_thrown_exception(Failure);
}

function empty(s) {
  var match = peek(s);
  if (match) {throw caml_wrap_thrown_exception(Failure);}
  return 0;
}

function iter(f, strm) {
  function do_rec(param) {
    var a;
    var match;
    for (; ; ) {
      match = peek(strm);
      if (match) {a = match[1];junk(strm);call1(f, a);continue;}
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
  var d1;
  var d2;
  var a;
  var d;
  if (typeof param === "number") return call1(
    Pervasives[30],
    cst_Sempty
  );
  else switch (param[0]) {
    case 0:
      d = param[2];
      a = param[1];
      call1(Pervasives[30], cst_Scons);
      call1(f, a);
      call1(Pervasives[30], cst__0);
      dump_data(f, d);
      return call1(Pervasives[30], cst__1);
    case 1:
      d2 = param[2];
      d1 = param[1];
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

module.exports = Stream;

/*::type Exports = {
  Failure: any,
  Error: any,
  from: (f: any) => any,
  of_list: (l: any) => any,
  of_string: (s: any) => any,
  of_bytes: (s: any) => any,
  of_channel: (ic: any) => any,
  iter: (f: any, strm: any) => any,
  next: (s: any) => any,
  empty: (s: any) => any,
  peek: (param: any) => any,
  junk: (param: any) => any,
  count: (param: any) => any,
  npeek: (n: any, param: any) => any,
  iapp: (i: any, s: any) => any,
  icons: (i: any, s: any) => any,
  ising: (i: any) => any,
  lapp: (f: any, s: any) => any,
  lcons: (f: any, s: any) => any,
  lsing: (f: any) => any,
  sempty: any,
  slazy: (f: any) => any,
  dump: (f: any, s: any) => any,
}*/
/** @type {{
  Failure: any,
  Error: any,
  from: (f: any) => any,
  of_list: (l: any) => any,
  of_string: (s: any) => any,
  of_bytes: (s: any) => any,
  of_channel: (ic: any) => any,
  iter: (f: any, strm: any) => any,
  next: (s: any) => any,
  empty: (s: any) => any,
  peek: (param: any) => any,
  junk: (param: any) => any,
  count: (param: any) => any,
  npeek: (n: any, param: any) => any,
  iapp: (i: any, s: any) => any,
  icons: (i: any, s: any) => any,
  ising: (i: any) => any,
  lapp: (f: any, s: any) => any,
  lcons: (f: any, s: any) => any,
  lsing: (f: any) => any,
  sempty: any,
  slazy: (f: any) => any,
  dump: (f: any, s: any) => any,
}} */
module.exports = ((module.exports /*:: : any*/) /*:: :Exports */);
module.exports.Failure = module.exports[1];
module.exports.Error = module.exports[2];
module.exports.from = module.exports[3];
module.exports.of_list = module.exports[4];
module.exports.of_string = module.exports[5];
module.exports.of_bytes = module.exports[6];
module.exports.of_channel = module.exports[7];
module.exports.iter = module.exports[8];
module.exports.next = module.exports[9];
module.exports.empty = module.exports[10];
module.exports.peek = module.exports[11];
module.exports.junk = module.exports[12];
module.exports.count = module.exports[13];
module.exports.npeek = module.exports[14];
module.exports.iapp = module.exports[15];
module.exports.icons = module.exports[16];
module.exports.ising = module.exports[17];
module.exports.lapp = module.exports[18];
module.exports.lcons = module.exports[19];
module.exports.lsing = module.exports[20];
module.exports.sempty = module.exports[21];
module.exports.slazy = module.exports[22];
module.exports.dump = module.exports[23];

/* Hashing disabled */
