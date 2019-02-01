/**
 * Stream
 * @providesModule Stream
 */
"use strict";
var Bytes = require('Bytes.js');
var CamlinternalLazy = require('CamlinternalLazy.js');
var List_ = require('List_.js');
var Pervasives = require('Pervasives.js');
var Assert_failure = require('Assert_failure.js');
var runtime = require('runtime.js');

let joo_global_object = global;


var runtime = joo_global_object.jsoo_runtime;
var caml_bytes_unsafe_get = runtime.caml_bytes_unsafe_get;
var caml_fresh_oo_id = runtime.caml_fresh_oo_id;
var caml_ml_bytes_length = runtime.caml_ml_bytes_length;
var caml_new_string = runtime.caml_new_string;
var caml_obj_tag = runtime.caml_obj_tag;

function caml_call1(f, a0) {
  return f.length == 1 ? f(a0) : runtime.caml_call_gen(f, [a0]);
}

function caml_call3(f, a0, a1, a2) {
  return f.length == 3 ? f(a0, a1, a2) : runtime.caml_call_gen(f, [a0,a1,a2]);
}

function caml_call4(f, a0, a1, a2, a3) {
  return f.length == 4 ?
    f(a0, a1, a2, a3) :
    runtime.caml_call_gen(f, [a0,a1,a2,a3]);
}

var global_data = runtime.caml_get_global_data();
var cst_count = caml_new_string("{count = ");
var cst_data = caml_new_string("; data = ");
var cst = caml_new_string("}");
var cst_Sempty = caml_new_string("Sempty");
var cst_Scons = caml_new_string("Scons (");
var cst__0 = caml_new_string(", ");
var cst__1 = caml_new_string(")");
var cst_Sapp = caml_new_string("Sapp (");
var cst__2 = caml_new_string(", ");
var cst__3 = caml_new_string(")");
var cst_Slazy = caml_new_string("Slazy");
var cst_Sgen = caml_new_string("Sgen");
var cst_Sbuffio = caml_new_string("Sbuffio");
var cst_Stream_Failure = caml_new_string("Stream.Failure");
var cst_Stream_Error = caml_new_string("Stream.Error");
var Assert_failure = global_data.Assert_failure;
var CamlinternalLazy = global_data.CamlinternalLazy;
var Pervasives = global_data.Pervasives;
var List = global_data.List;
var g1 = [0,caml_new_string("stream.ml"),53,12];
var g2 = [0,0];
var g3 = [0,caml_new_string("stream.ml"),82,12];
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
  b[3] =
    caml_call4(Pervasives[72], b[1], b[2], 0, caml_ml_bytes_length(b[2]));
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
            throw runtime.caml_wrap_thrown_exception([0,Assert_failure,g1]);
          }
        case 2:
          var f = d__0[1];
          var hg = caml_obj_tag(f);
          var d__1 = 250 === hg ?
            f[1] :
            246 === hg ? caml_call1(CamlinternalLazy[2], f) : f;
          var d__0 = d__1;
          continue;
        case 3:
          var hh = d__0[1];
          var hi = hh[1];
          if (hi) {
            var hj = hi[1];
            if (hj) {var a__0 = hj[1];hh[1] = 0;return [0,a__0,d__0];}
            return 0;
          }
          var match__0 = caml_call1(hh[2], count);
          if (match__0) {var a__1 = match__0[1];return [0,a__1,d__0];}
          hh[1] = g2;
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
    var hb = s[2];
    if (typeof hb === "number") return 0;
    else switch (hb[0]) {
      case 0:
        var a = hb[1];
        return [0,a];
      case 1:
        var d = get_data(s[1], s[2]);
        if (typeof d === "number") return 0;
        else {
          if (0 === d[0]) {var a__0 = d[1];s[2] = d;return [0,a__0];}
          throw runtime.caml_wrap_thrown_exception([0,Assert_failure,g3]);
        }
      case 2:
        var f = hb[1];
        var hc = caml_obj_tag(f);
        var hd = 250 === hc ?
          f[1] :
          246 === hc ? caml_call1(CamlinternalLazy[2], f) : f;
        s[2] = hd;
        continue;
      case 3:
        var he = hb[1];
        var hf = he[1];
        if (hf) {var a__1 = hf[1];return a__1;}
        var x = caml_call1(he[2], s[1]);
        he[1] = [0,x];
        return x;
      default:
        var b = hb[1];
        if (b[3] <= b[4]) {fill_buff(b);}
        return 0 === b[3] ?
          (s[2] = 0,0) :
          [0,caml_bytes_unsafe_get(b[2], b[4])]
      }
  }
}

function peek(param) {
  if (param) {var s = param[1];return peek_data(s);}
  return 0;
}

function junk_data(s) {
  for (; ; ) {
    var g_ = s[2];
    if (! (typeof g_ === "number")) {
      switch (g_[0]) {
        case 0:
          var d = g_[2];
          s[1] = s[1] + 1 | 0;
          s[2] = d;
          return 0;
        case 3:
          var ha = g_[1];
          if (ha[1]) {s[1] = s[1] + 1 | 0;ha[1] = 0;return 0;}
          break;
        case 4:
          var b = g_[1];
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
  throw runtime.caml_wrap_thrown_exception(Failure);
}

function empty(s) {
  var match = peek(s);
  if (match) {throw runtime.caml_wrap_thrown_exception(Failure);}
  return 0;
}

function iter(f, strm) {
  function do_rec(param) {
    for (; ; ) {
      var match = peek(strm);
      if (match) {var a = match[1];junk(strm);caml_call1(f, a);continue;}
      return 0;
    }
  }
  return do_rec(0);
}

function from(f) {return [0,[0,0,[3,[0,0,f]]]];}

function of_list(l) {
  var g8 = 0;
  function g9(x, l) {return [0,x,l];}
  return [0,[0,0,caml_call3(List[21], g9, l, g8)]];
}

function of_string(s) {
  var count = [0,0];
  return from(
    function(param) {
      var c = count[1];
      return c < runtime.caml_ml_string_length(s) ?
        (count[1] += 1,[0,runtime.caml_string_get(s, c)]) :
        0;
    }
  );
}

function of_bytes(s) {
  var count = [0,0];
  return from(
    function(param) {
      var c = count[1];
      return c < caml_ml_bytes_length(s) ?
        (count[1] += 1,[0,runtime.caml_bytes_get(s, c)]) :
        0;
    }
  );
}

function of_channel(ic) {
  return [0,[0,0,[4,[0,ic,runtime.caml_create_bytes(4096),0,0]]]];
}

function iapp(i, s) {var g7 = data(s);return [0,[0,0,[1,data(i),g7]]];}

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
          function(param) {
            var g6 = data(s);
            return [1,data(caml_call1(f, 0)),g6];
          }
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
      [
        2,
        [
          246,
          function(param) {var g5 = data(s);return [0,caml_call1(f, 0),g5];}
        ]
      ]
    ]
  ];
}

function lsing(f) {
  return [0,[0,0,[2,[246,function(param) {return [0,caml_call1(f, 0),0];}]]]];
}

var sempty = 0;

function slazy(f) {
  return [0,[0,0,[2,[246,function(param) {return data(caml_call1(f, 0));}]]]];
}

function dump(f, s) {
  caml_call1(Pervasives[30], cst_count);
  var g4 = count(s);
  caml_call1(Pervasives[32], g4);
  caml_call1(Pervasives[30], cst_data);
  dump_data(f, data(s));
  caml_call1(Pervasives[30], cst);
  return caml_call1(Pervasives[35], 0);
}

function dump_data(f, param) {
  if (typeof param === "number") return caml_call1(
    Pervasives[30],
    cst_Sempty
  );
  else switch (param[0]) {
    case 0:
      var d = param[2];
      var a = param[1];
      caml_call1(Pervasives[30], cst_Scons);
      caml_call1(f, a);
      caml_call1(Pervasives[30], cst__0);
      dump_data(f, d);
      return caml_call1(Pervasives[30], cst__1);
    case 1:
      var d2 = param[2];
      var d1 = param[1];
      caml_call1(Pervasives[30], cst_Sapp);
      dump_data(f, d1);
      caml_call1(Pervasives[30], cst__2);
      dump_data(f, d2);
      return caml_call1(Pervasives[30], cst__3);
    case 2:
      return caml_call1(Pervasives[30], cst_Slazy);
    case 3:
      return caml_call1(Pervasives[30], cst_Sgen);
    default:
      return caml_call1(Pervasives[30], cst_Sbuffio)
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

runtime.caml_register_global(22, Stream, "Stream");


module.exports = global.jsoo_runtime.caml_get_global_data().Stream;