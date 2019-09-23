/**
 * Gc
 * @providesModule Gc
 */
"use strict";
var Printf = require('Printf.js');
var Sys = require('Sys.js');
var runtime = require('runtime.js');

let joo_global_object = global;


var runtime = joo_global_object.jsoo_runtime;
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

var global_data = runtime["caml_get_global_data"]();
var Sys = global_data["Sys"];
var Printf = global_data["Printf"];
var a = [
  0,
  [11,string("minor_collections: "),[4,0,0,0,[12,10,0]]],
  string("minor_collections: %d\n")
];
var b = [
  0,
  [11,string("major_collections: "),[4,0,0,0,[12,10,0]]],
  string("major_collections: %d\n")
];
var c = [
  0,
  [11,string("compactions:       "),[4,0,0,0,[12,10,0]]],
  string("compactions:       %d\n")
];
var d = [0,[12,10,0],string("\n")];
var e = [0,[8,0,0,[0,0],0],string("%.0f")];
var f = [
  0,
  [11,string("minor_words:    "),[8,0,[1,1],[0,0],[12,10,0]]],
  string("minor_words:    %*.0f\n")
];
var g = [
  0,
  [11,string("promoted_words: "),[8,0,[1,1],[0,0],[12,10,0]]],
  string("promoted_words: %*.0f\n")
];
var h = [
  0,
  [11,string("major_words:    "),[8,0,[1,1],[0,0],[12,10,0]]],
  string("major_words:    %*.0f\n")
];
var i = [0,[12,10,0],string("\n")];
var j = [0,[4,0,0,0,0],string("%d")];
var k = [
  0,
  [11,string("top_heap_words: "),[4,0,[1,1],0,[12,10,0]]],
  string("top_heap_words: %*d\n")
];
var l = [
  0,
  [11,string("heap_words:     "),[4,0,[1,1],0,[12,10,0]]],
  string("heap_words:     %*d\n")
];
var m = [
  0,
  [11,string("live_words:     "),[4,0,[1,1],0,[12,10,0]]],
  string("live_words:     %*d\n")
];
var n = [
  0,
  [11,string("free_words:     "),[4,0,[1,1],0,[12,10,0]]],
  string("free_words:     %*d\n")
];
var o = [
  0,
  [11,string("largest_free:   "),[4,0,[1,1],0,[12,10,0]]],
  string("largest_free:   %*d\n")
];
var p = [
  0,
  [11,string("fragments:      "),[4,0,[1,1],0,[12,10,0]]],
  string("fragments:      %*d\n")
];
var q = [0,[12,10,0],string("\n")];
var r = [
  0,
  [11,string("live_blocks: "),[4,0,0,0,[12,10,0]]],
  string("live_blocks: %d\n")
];
var s = [
  0,
  [11,string("free_blocks: "),[4,0,0,0,[12,10,0]]],
  string("free_blocks: %d\n")
];
var t = [
  0,
  [11,string("heap_chunks: "),[4,0,0,0,[12,10,0]]],
  string("heap_chunks: %d\n")
];

function print_stat(c__0) {
  var st = runtime["caml_gc_stat"](0);
  call3(Printf[1], c__0, a, st[4]);
  call3(Printf[1], c__0, b, st[5]);
  call3(Printf[1], c__0, c, st[14]);
  call2(Printf[1], c__0, d);
  var l1 = caml_ml_string_length(call2(Printf[4], e, st[1]));
  call4(Printf[1], c__0, f, l1, st[1]);
  call4(Printf[1], c__0, g, l1, st[2]);
  call4(Printf[1], c__0, h, l1, st[3]);
  call2(Printf[1], c__0, i);
  var l2 = caml_ml_string_length(call2(Printf[4], j, st[15]));
  call4(Printf[1], c__0, k, l2, st[15]);
  call4(Printf[1], c__0, l, l2, st[6]);
  call4(Printf[1], c__0, m, l2, st[8]);
  call4(Printf[1], c__0, n, l2, st[10]);
  call4(Printf[1], c__0, o, l2, st[12]);
  call4(Printf[1], c__0, p, l2, st[13]);
  call2(Printf[1], c__0, q);
  call3(Printf[1], c__0, r, st[9]);
  call3(Printf[1], c__0, s, st[11]);
  return call3(Printf[1], c__0, t, st[7]);
}

function allocated_bytes(param) {
  var match = runtime["caml_gc_counters"](0);
  var ma = match[3];
  var pro = match[2];
  var mi = match[1];
  return (mi + ma - pro) * (Sys[10] / 8 | 0);
}

function create_alarm(f) {return [0,1];}

function delete_alarm(a) {a[1] = 0;return 0;}

function u(A) {return runtime["caml_final_release"](A);}

function v(z, y) {
  return runtime["caml_final_register_called_without_value"](z, y);
}

var Gc = [
  0,
  print_stat,
  allocated_bytes,
  function(x, w) {return runtime["caml_final_register"](x, w);},
  v,
  u,
  create_alarm,
  delete_alarm
];

runtime["caml_register_global"](22, Gc, "Gc");


module.exports = global.jsoo_runtime.caml_get_global_data().Gc;