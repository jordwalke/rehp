/**
 * Lexing
 * @providesModule Lexing
 */
"use strict";
var Bytes = require('Bytes.js');
var Pervasives = require('Pervasives.js');
var Sys = require('Sys.js');
var runtime = require('runtime.js');

let joo_global_object = global;


var runtime = joo_global_object.jsoo_runtime;
var caml_bytes_get = runtime["caml_bytes_get"];
var caml_check_bound = runtime["caml_check_bound"];
var caml_create_bytes = runtime["caml_create_bytes"];
var caml_ml_bytes_length = runtime["caml_ml_bytes_length"];
var string = runtime["caml_new_string"];

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

function call4(f, a0, a1, a2, a3) {
  return f.length === 4 ?
    f(a0, a1, a2, a3) :
    runtime["caml_call_gen"](f, [a0,a1,a2,a3]);
}

function call5(f, a0, a1, a2, a3, a4) {
  return f.length === 5 ?
    f(a0, a1, a2, a3, a4) :
    runtime["caml_call_gen"](f, [a0,a1,a2,a3,a4]);
}

var global_data = runtime["caml_get_global_data"]();
var cst_Lexing_lex_refill_cannot_grow_buffer = string(
  "Lexing.lex_refill: cannot grow buffer"
);
var dummy_pos = [0,string(""),0,0,-1];
var zero_pos = [0,string(""),1,0,0];
var Bytes = global_data["Bytes"];
var Pervasives = global_data["Pervasives"];
var Sys = global_data["Sys"];

function engine(tbl, state, buf) {
  var result = runtime["caml_lex_engine"](tbl, state, buf);
  if (0 <= result) {
    buf[11] = buf[12];
    var z = buf[12];
    buf[12] = [0,z[1],z[2],z[3],buf[4] + buf[6] | 0];
  }
  return result;
}

function new_engine(tbl, state, buf) {
  var result = runtime["caml_new_lex_engine"](tbl, state, buf);
  if (0 <= result) {
    buf[11] = buf[12];
    var y = buf[12];
    buf[12] = [0,y[1],y[2],y[3],buf[4] + buf[6] | 0];
  }
  return result;
}

function lex_refill(read_fun, aux_buffer, lexbuf) {
  var read = call2(read_fun, aux_buffer, caml_ml_bytes_length(aux_buffer));
  if (0 < read) var n = read;
  else {lexbuf[9] = 1;var n = 0;}
  if (caml_ml_bytes_length(lexbuf[2]) < (lexbuf[3] + n | 0)) {
    if (
      ((lexbuf[3] - lexbuf[5] | 0) + n | 0) <= caml_ml_bytes_length(lexbuf[2])
    ) call5(
      Bytes[11],
      lexbuf[2],
      lexbuf[5],
      lexbuf[2],
      0,
      lexbuf[3] - lexbuf[5] | 0
    );
    else {
      var newlen = call2(
        Pervasives[4],
        2 * caml_ml_bytes_length(lexbuf[2]) | 0,
        Sys[13]
      );
      if (newlen < ((lexbuf[3] - lexbuf[5] | 0) + n | 0)) {
        call1(Pervasives[2], cst_Lexing_lex_refill_cannot_grow_buffer);
      }
      var newbuf = caml_create_bytes(newlen);
      call5(
        Bytes[11],
        lexbuf[2],
        lexbuf[5],
        newbuf,
        0,
        lexbuf[3] - lexbuf[5] | 0
      );
      lexbuf[2] = newbuf;
    }
    var s = lexbuf[5];
    lexbuf[4] = lexbuf[4] + s | 0;
    lexbuf[6] = lexbuf[6] - s | 0;
    lexbuf[5] = 0;
    lexbuf[7] = lexbuf[7] - s | 0;
    lexbuf[3] = lexbuf[3] - s | 0;
    var t = lexbuf[10];
    var w = t.length - 1 + -1 | 0;
    var v = 0;
    if (! (w < 0)) {
      var i = v;
      for (; ; ) {
        var v__0 = caml_check_bound(t, i)[i + 1];
        if (0 <= v__0) {caml_check_bound(t, i)[i + 1] = v__0 - s | 0;}
        var x = i + 1 | 0;
        if (w !== i) {var i = x;continue;}
        break;
      }
    }
  }
  call5(Bytes[11], aux_buffer, 0, lexbuf[2], lexbuf[3], n);
  lexbuf[3] = lexbuf[3] + n | 0;
  return 0;
}

function from_function(f) {
  var k = [0];
  var l = 0;
  var m = 0;
  var n = 0;
  var o = 0;
  var p = 0;
  var q = 0;
  var r = 0;
  var s = caml_create_bytes(1024);
  var t = caml_create_bytes(512);
  return [
    0,
    function(u) {return lex_refill(f, t, u);},
    s,
    r,
    q,
    p,
    o,
    n,
    m,
    l,
    k,
    zero_pos,
    zero_pos
  ];
}

function from_channel(ic) {
  return from_function(
    function(buf, n) {return call4(Pervasives[72], ic, buf, 0, n);}
  );
}

function from_string(s) {
  var b = [0];
  var c = 1;
  var d = 0;
  var e = 0;
  var f = 0;
  var g = 0;
  var h = 0;
  var i = runtime["caml_ml_string_length"](s);
  var j = call1(Bytes[5], s);
  return [
    0,
    function(lexbuf) {lexbuf[9] = 1;return 0;},
    j,
    i,
    h,
    g,
    f,
    e,
    d,
    c,
    b,
    zero_pos,
    zero_pos
  ];
}

function lexeme(lexbuf) {
  var len = lexbuf[6] - lexbuf[5] | 0;
  return call3(Bytes[8], lexbuf[2], lexbuf[5], len);
}

function sub_lexeme(lexbuf, i1, i2) {
  var len = i2 - i1 | 0;
  return call3(Bytes[8], lexbuf[2], i1, len);
}

function sub_lexeme_opt(lexbuf, i1, i2) {
  if (0 <= i1) {
    var len = i2 - i1 | 0;
    return [0,call3(Bytes[8], lexbuf[2], i1, len)];
  }
  return 0;
}

function sub_lexeme_char(lexbuf, i) {return caml_bytes_get(lexbuf[2], i);}

function sub_lexeme_char_opt(lexbuf, i) {
  return 0 <= i ? [0,caml_bytes_get(lexbuf[2], i)] : 0;
}

function lexeme_char(lexbuf, i) {
  return caml_bytes_get(lexbuf[2], lexbuf[5] + i | 0);
}

function lexeme_start(lexbuf) {return lexbuf[11][4];}

function lexeme_end(lexbuf) {return lexbuf[12][4];}

function lexeme_start_p(lexbuf) {return lexbuf[11];}

function lexeme_end_p(lexbuf) {return lexbuf[12];}

function new_line(lexbuf) {
  var lcp = lexbuf[12];
  lexbuf[12] = [0,lcp[1],lcp[2] + 1 | 0,lcp[4],lcp[4]];
  return 0;
}

function flush_input(lb) {
  lb[6] = 0;
  lb[4] = 0;
  var a = lb[12];
  lb[12] = [0,a[1],a[2],a[3],0];
  lb[3] = 0;
  return 0;
}

var Lexing = [
  0,
  dummy_pos,
  from_channel,
  from_string,
  from_function,
  lexeme,
  lexeme_char,
  lexeme_start,
  lexeme_end,
  lexeme_start_p,
  lexeme_end_p,
  new_line,
  flush_input,
  sub_lexeme,
  sub_lexeme_opt,
  sub_lexeme_char,
  sub_lexeme_char_opt,
  engine,
  new_engine
];

runtime["caml_register_global"](6, Lexing, "Lexing");


module.exports = global.jsoo_runtime.caml_get_global_data().Lexing;
/*____hashes compiler:hashing-disabled inputs:hashing-disabled bytecode:hashing-disabled*/
