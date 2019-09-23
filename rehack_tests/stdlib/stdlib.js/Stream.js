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
var caml_bytes_unsafe_get = runtime["caml_bytes_unsafe_get"];
var caml_fresh_oo_id = runtime["caml_fresh_oo_id"];
var caml_ml_bytes_length = runtime["caml_ml_bytes_length"];
var string = runtime["caml_new_string"];
var caml_obj_tag = runtime["caml_obj_tag"];

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

var global_data = runtime["caml_get_global_data"]();
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
var Assert_failure = global_data["Assert_failure"];
var CamlinternalLazy = global_data["CamlinternalLazy"];
var Pervasives = global_data["Pervasives"];
var List = global_data["List_"];
var a = [0,string("stream.ml"),53,12];
var b = [0,0];
var c = [0,string("stream.ml"),82,12];
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
              var a__0 = match[1];
              return [0,a__0,[1,d11,d2]];
            }
            throw runtime["caml_wrap_thrown_exception"]([0,Assert_failure,a]);
          }
        case 2:
          var f = d__0[1];
          var q = caml_obj_tag(f);
          var d__1 = 250 === q ?
            f[1] :
            246 === q ? call1(CamlinternalLazy[2], f) : f;
          var d__0 = d__1;
          continue;
        case 3:
          var r = d__0[1];
          var s = r[1];
          if (s) {
            var t = s[1];
            if (t) {var a__1 = t[1];r[1] = 0;return [0,a__1,d__0];}
            return 0;
          }
          var match__0 = call1(r[2], count);
          if (match__0) {var a__2 = match__0[1];return [0,a__2,d__0];}
          r[1] = b;
          return 0;
        case 4:
          var b__0 = d__0[1];
          if (b__0[3] <= b__0[4]) {fill_buff(b__0);}
          if (0 === b__0[3]) {return 0;}
          var r__0 = caml_bytes_unsafe_get(b__0[2], b__0[4]);
          b__0[4] = b__0[4] + 1 | 0;
          return [0,r__0,d__0]
        }
    }
    return d__0;
  }
}

function peek_data(s) {
  for (; ; ) {
    var l = s[2];
    if (typeof l === "number") return 0;
    else switch (l[0]) {
      case 0:
        var a = l[1];
        return [0,a];
      case 1:
        var d = get_data(s[1], s[2]);
        if (typeof d === "number") return 0;
        else {
          if (0 === d[0]) {var a__0 = d[1];s[2] = d;return [0,a__0];}
          throw runtime["caml_wrap_thrown_exception"]([0,Assert_failure,c]);
        }
      case 2:
        var f = l[1];
        var m = caml_obj_tag(f);
        var n = 250 === m ?
          f[1] :
          246 === m ? call1(CamlinternalLazy[2], f) : f;
        s[2] = n;
        continue;
      case 3:
        var o = l[1];
        var p = o[1];
        if (p) {var a__1 = p[1];return a__1;}
        var x = call1(o[2], s[1]);
        o[1] = [0,x];
        return x;
      default:
        var b = l[1];
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
    var j = s[2];
    if (! (typeof j === "number")) {
      switch (j[0]) {
        case 0:
          var d = j[2];
          s[1] = s[1] + 1 | 0;
          s[2] = d;
          return 0;
        case 3:
          var k = j[1];
          if (k[1]) {s[1] = s[1] + 1 | 0;k[1] = 0;return 0;}
          break;
        case 4:
          var b = j[1];
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
  throw runtime["caml_wrap_thrown_exception"](Failure);
}

function empty(s) {
  var match = peek(s);
  if (match) {throw runtime["caml_wrap_thrown_exception"](Failure);}
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
  var h = 0;
  function i(x, l) {return [0,x,l];}
  return [0,[0,0,call3(List[21], i, l, h)]];
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

function iapp(i, s) {var g = data(s);return [0,[0,0,[1,data(i),g]]];}

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
        [246,function(param) {var f = data(s);return [1,data(call1(f, 0)),f];}
        ]
      ]
    ]
  ];
}

function lcons(f, s) {
  return [
    0,
    [0,0,[2,[246,function(param) {var e = data(s);return [0,call1(f, 0),e];}]]
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
  var d = count(s);
  call1(Pervasives[32], d);
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

runtime["caml_register_global"](22, Stream, "Stream");


module.exports = global.jsoo_runtime.caml_get_global_data().Stream;
/*____hashes compiler:hashing-disabled inputs:hashing-disabled bytecode:hashing-disabled*/
