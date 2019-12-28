/**
 * @flow strict
 * Lexing
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

var caml_bytes_get = runtime["caml_bytes_get"];
var caml_check_bound = runtime["caml_check_bound"];
var caml_create_bytes = runtime["caml_create_bytes"];
var caml_ml_bytes_length = runtime["caml_ml_bytes_length"];
var string = runtime["caml_new_string"];
var cst_Lexing_lex_refill_cannot_grow_buffer = string(
  "Lexing.lex_refill: cannot grow buffer"
);
var dummy_pos = [0,string(""),0,0,-1];
var zero_pos = [0,string(""),1,0,0];
var Bytes = require("./Bytes.js");
var Pervasives = require("./Pervasives.js");
var Sys = require("./Sys.js");

function engine(tbl, state, buf) {
  var z_;
  var result = runtime["caml_lex_engine"](tbl, state, buf);
  if (0 <= result) {
    buf[11] = buf[12];
    z_ = buf[12];
    buf[12] = [0,z_[1],z_[2],z_[3],buf[4] + buf[6] | 0];
  }
  return result;
}

function new_engine(tbl, state, buf) {
  var y_;
  var result = runtime["caml_new_lex_engine"](tbl, state, buf);
  if (0 <= result) {
    buf[11] = buf[12];
    y_ = buf[12];
    buf[12] = [0,y_[1],y_[2],y_[3],buf[4] + buf[6] | 0];
  }
  return result;
}

function lex_refill(read_fun, aux_buffer, lexbuf) {
  var n;
  var s;
  var t;
  var v_;
  var w_;
  var i;
  var v;
  var x_;
  var newlen;
  var newbuf;
  var read = call2(read_fun, aux_buffer, caml_ml_bytes_length(aux_buffer));
  if (0 < read) n = read;
  else {lexbuf[9] = 1;n = 0;}
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
      newlen =
        call2(Pervasives[4], 2 * caml_ml_bytes_length(lexbuf[2]) | 0, Sys[13]);
      if (newlen < ((lexbuf[3] - lexbuf[5] | 0) + n | 0)) {
        call1(Pervasives[2], cst_Lexing_lex_refill_cannot_grow_buffer);
      }
      newbuf = caml_create_bytes(newlen);
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
    s = lexbuf[5];
    lexbuf[4] = lexbuf[4] + s | 0;
    lexbuf[6] = lexbuf[6] - s | 0;
    lexbuf[5] = 0;
    lexbuf[7] = lexbuf[7] - s | 0;
    lexbuf[3] = lexbuf[3] - s | 0;
    t = lexbuf[10];
    w_ = t.length - 1 + -1 | 0;
    v_ = 0;
    if (! (w_ < 0)) {
      i = v_;
      for (; ; ) {
        v = caml_check_bound(t, i)[i + 1];
        if (0 <= v) {caml_check_bound(t, i)[i + 1] = v - s | 0;}
        x_ = i + 1 | 0;
        if (w_ !== i) {i = x_;continue;}
        break;
      }
    }
  }
  call5(Bytes[11], aux_buffer, 0, lexbuf[2], lexbuf[3], n);
  lexbuf[3] = lexbuf[3] + n | 0;
  return 0;
}

function from_function(f) {
  var k_ = [0];
  var l_ = 0;
  var m_ = 0;
  var n_ = 0;
  var o_ = 0;
  var p_ = 0;
  var q_ = 0;
  var r_ = 0;
  var s_ = caml_create_bytes(1024);
  var t_ = caml_create_bytes(512);
  return [
    0,
    function(u_) {return lex_refill(f, t_, u_);},
    s_,
    r_,
    q_,
    p_,
    o_,
    n_,
    m_,
    l_,
    k_,
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
  var b_ = [0];
  var c_ = 1;
  var d_ = 0;
  var e_ = 0;
  var f_ = 0;
  var g_ = 0;
  var h_ = 0;
  var i_ = runtime["caml_ml_string_length"](s);
  var j_ = call1(Bytes[5], s);
  return [
    0,
    function(lexbuf) {lexbuf[9] = 1;return 0;},
    j_,
    i_,
    h_,
    g_,
    f_,
    e_,
    d_,
    c_,
    b_,
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
  var len;
  if (0 <= i1) {
    len = i2 - i1 | 0;
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
  var a_ = lb[12];
  lb[12] = [0,a_[1],a_[2],a_[3],0];
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

exports = Lexing;

/*::type Exports = {
  dummy_pos: any,
  from_channel: (ic: any) => any,
  from_string: (s: any) => any,
  from_function: (f: any) => any,
  lexeme: (lexbuf: any) => any,
  lexeme_char: (lexbuf: any, i: any) => any,
  lexeme_start: (lexbuf: any) => any,
  lexeme_end: (lexbuf: any) => any,
  lexeme_start_p: (lexbuf: any) => any,
  lexeme_end_p: (lexbuf: any) => any,
  new_line: (lexbuf: any) => any,
  flush_input: (lb: any) => any,
  sub_lexeme: (lexbuf: any, i1: any, i2: any) => any,
  sub_lexeme_opt: (lexbuf: any, i1: any, i2: any) => any,
  sub_lexeme_char: (lexbuf: any, i: any) => any,
  sub_lexeme_char_opt: (lexbuf: any, i: any) => any,
  engine: (tbl: any, state: any, buf: any) => any,
  new_engine: (tbl: any, state: any, buf: any) => any,
}*/
/** @type {{
  dummy_pos: any,
  from_channel: (ic: any) => any,
  from_string: (s: any) => any,
  from_function: (f: any) => any,
  lexeme: (lexbuf: any) => any,
  lexeme_char: (lexbuf: any, i: any) => any,
  lexeme_start: (lexbuf: any) => any,
  lexeme_end: (lexbuf: any) => any,
  lexeme_start_p: (lexbuf: any) => any,
  lexeme_end_p: (lexbuf: any) => any,
  new_line: (lexbuf: any) => any,
  flush_input: (lb: any) => any,
  sub_lexeme: (lexbuf: any, i1: any, i2: any) => any,
  sub_lexeme_opt: (lexbuf: any, i1: any, i2: any) => any,
  sub_lexeme_char: (lexbuf: any, i: any) => any,
  sub_lexeme_char_opt: (lexbuf: any, i: any) => any,
  engine: (tbl: any, state: any, buf: any) => any,
  new_engine: (tbl: any, state: any, buf: any) => any,
}} */
module.exports = ((exports /*:: : any*/) /*:: :Exports */);
module.exports.dummy_pos = module.exports[1];
module.exports.from_channel = module.exports[2];
module.exports.from_string = module.exports[3];
module.exports.from_function = module.exports[4];
module.exports.lexeme = module.exports[5];
module.exports.lexeme_char = module.exports[6];
module.exports.lexeme_start = module.exports[7];
module.exports.lexeme_end = module.exports[8];
module.exports.lexeme_start_p = module.exports[9];
module.exports.lexeme_end_p = module.exports[10];
module.exports.new_line = module.exports[11];
module.exports.flush_input = module.exports[12];
module.exports.sub_lexeme = module.exports[13];
module.exports.sub_lexeme_opt = module.exports[14];
module.exports.sub_lexeme_char = module.exports[15];
module.exports.sub_lexeme_char_opt = module.exports[16];
module.exports.engine = module.exports[17];
module.exports.new_engine = module.exports[18];

/* Hashing disabled */
