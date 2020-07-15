/**
 * @flow strict
 * Stdlib__gc
 */

// @ts-check


"use strict";

var runtime = require("../runtime/runtime.js");
var caml_ml_string_length = runtime["caml_ml_string_length"];
var string = runtime["caml_new_string"];

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

var Stdlib_sys = require("./Stdlib__sys.js");
var Stdlib_printf = require("./Stdlib__printf.js");
var a_ = [
  0,
  [11,string("minor_collections: "),[4,0,0,0,[12,10,0]]],
  string("minor_collections: %d\n")
];
var b_ = [
  0,
  [11,string("major_collections: "),[4,0,0,0,[12,10,0]]],
  string("major_collections: %d\n")
];
var c_ = [
  0,
  [11,string("compactions:       "),[4,0,0,0,[12,10,0]]],
  string("compactions:       %d\n")
];
var d_ = [0,[12,10,0],string("\n")];
var e_ = [0,[8,0,0,[0,0],0],string("%.0f")];
var f_ = [
  0,
  [11,string("minor_words:    "),[8,0,[1,1],[0,0],[12,10,0]]],
  string("minor_words:    %*.0f\n")
];
var g_ = [
  0,
  [11,string("promoted_words: "),[8,0,[1,1],[0,0],[12,10,0]]],
  string("promoted_words: %*.0f\n")
];
var h_ = [
  0,
  [11,string("major_words:    "),[8,0,[1,1],[0,0],[12,10,0]]],
  string("major_words:    %*.0f\n")
];
var i_ = [0,[12,10,0],string("\n")];
var j_ = [0,[4,0,0,0,0],string("%d")];
var k_ = [
  0,
  [11,string("top_heap_words: "),[4,0,[1,1],0,[12,10,0]]],
  string("top_heap_words: %*d\n")
];
var l_ = [
  0,
  [11,string("heap_words:     "),[4,0,[1,1],0,[12,10,0]]],
  string("heap_words:     %*d\n")
];
var m_ = [
  0,
  [11,string("live_words:     "),[4,0,[1,1],0,[12,10,0]]],
  string("live_words:     %*d\n")
];
var n_ = [
  0,
  [11,string("free_words:     "),[4,0,[1,1],0,[12,10,0]]],
  string("free_words:     %*d\n")
];
var o_ = [
  0,
  [11,string("largest_free:   "),[4,0,[1,1],0,[12,10,0]]],
  string("largest_free:   %*d\n")
];
var p_ = [
  0,
  [11,string("fragments:      "),[4,0,[1,1],0,[12,10,0]]],
  string("fragments:      %*d\n")
];
var q_ = [0,[12,10,0],string("\n")];
var r_ = [
  0,
  [11,string("live_blocks: "),[4,0,0,0,[12,10,0]]],
  string("live_blocks: %d\n")
];
var s_ = [
  0,
  [11,string("free_blocks: "),[4,0,0,0,[12,10,0]]],
  string("free_blocks: %d\n")
];
var t_ = [
  0,
  [11,string("heap_chunks: "),[4,0,0,0,[12,10,0]]],
  string("heap_chunks: %d\n")
];

function print_stat(c) {
  var st = runtime["caml_gc_stat"](0);
  call3(Stdlib_printf[1], c, a_, st[4]);
  call3(Stdlib_printf[1], c, b_, st[5]);
  call3(Stdlib_printf[1], c, c_, st[14]);
  call2(Stdlib_printf[1], c, d_);
  var l1 = caml_ml_string_length(call2(Stdlib_printf[4], e_, st[1]));
  call4(Stdlib_printf[1], c, f_, l1, st[1]);
  call4(Stdlib_printf[1], c, g_, l1, st[2]);
  call4(Stdlib_printf[1], c, h_, l1, st[3]);
  call2(Stdlib_printf[1], c, i_);
  var l2 = caml_ml_string_length(call2(Stdlib_printf[4], j_, st[15]));
  call4(Stdlib_printf[1], c, k_, l2, st[15]);
  call4(Stdlib_printf[1], c, l_, l2, st[6]);
  call4(Stdlib_printf[1], c, m_, l2, st[8]);
  call4(Stdlib_printf[1], c, n_, l2, st[10]);
  call4(Stdlib_printf[1], c, o_, l2, st[12]);
  call4(Stdlib_printf[1], c, p_, l2, st[13]);
  call2(Stdlib_printf[1], c, q_);
  call3(Stdlib_printf[1], c, r_, st[9]);
  call3(Stdlib_printf[1], c, s_, st[11]);
  return call3(Stdlib_printf[1], c, t_, st[7]);
}

function allocated_bytes(param) {
  var match = runtime["caml_gc_counters"](0);
  var ma = match[3];
  var pro = match[2];
  var mi = match[1];
  return (mi + ma - pro) * (Stdlib_sys[10] / 8 | 0);
}

function create_alarm(f) {return [0,1];}

function delete_alarm(a) {a[1] = 0;return 0;}

function u_(A_) {return runtime["caml_final_release"](A_);}

function v_(z_, y_) {
  return runtime["caml_final_register_called_without_value"](z_, y_);
}

var Stdlib_gc = [
  0,
  print_stat,
  allocated_bytes,
  function(x_, w_) {return runtime["caml_final_register"](x_, w_);},
  v_,
  u_,
  create_alarm,
  delete_alarm
];

module.exports = Stdlib_gc;

/*::type Exports = {
  print_stat: (c: any) => any,
  allocated_bytes: (param: any) => any,
  create_alarm: (f: any) => any,
  delete_alarm: (a: any) => any,
}*/
/** @type {{
  print_stat: (c: any) => any,
  allocated_bytes: (param: any) => any,
  create_alarm: (f: any) => any,
  delete_alarm: (a: any) => any,
}} */
module.exports = ((module.exports /*:: : any*/) /*:: :Exports */);
module.exports.print_stat = module.exports[1];
module.exports.allocated_bytes = module.exports[2];
module.exports.create_alarm = module.exports[6];
module.exports.delete_alarm = module.exports[7];

/* Hashing disabled */
