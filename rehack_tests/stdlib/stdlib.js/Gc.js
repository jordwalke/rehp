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
var caml_new_string = runtime["caml_new_string"];

function caml_call2(f, a0, a1) {
  return f.length == 2 ? f(a0, a1) : runtime["caml_call_gen"](f, [a0,a1]);
}

function caml_call3(f, a0, a1, a2) {
  return f.length == 3 ?
    f(a0, a1, a2) :
    runtime["caml_call_gen"](f, [a0,a1,a2]);
}

function caml_call4(f, a0, a1, a2, a3) {
  return f.length == 4 ?
    f(a0, a1, a2, a3) :
    runtime["caml_call_gen"](f, [a0,a1,a2,a3]);
}

var global_data = runtime["caml_get_global_data"]();
var Sys = global_data["Sys"];
var Printf = global_data["Printf"];
var pr = [
  0,
  [11,caml_new_string("minor_collections: "),[4,0,0,0,[12,10,0]]],
  caml_new_string("minor_collections: %d\n")
];
var ps = [
  0,
  [11,caml_new_string("major_collections: "),[4,0,0,0,[12,10,0]]],
  caml_new_string("major_collections: %d\n")
];
var pt = [
  0,
  [11,caml_new_string("compactions:       "),[4,0,0,0,[12,10,0]]],
  caml_new_string("compactions:       %d\n")
];
var pu = [0,[12,10,0],caml_new_string("\n")];
var pv = [0,[8,0,0,[0,0],0],caml_new_string("%.0f")];
var pw = [
  0,
  [11,caml_new_string("minor_words:    "),[8,0,[1,1],[0,0],[12,10,0]]],
  caml_new_string("minor_words:    %*.0f\n")
];
var px = [
  0,
  [11,caml_new_string("promoted_words: "),[8,0,[1,1],[0,0],[12,10,0]]],
  caml_new_string("promoted_words: %*.0f\n")
];
var py = [
  0,
  [11,caml_new_string("major_words:    "),[8,0,[1,1],[0,0],[12,10,0]]],
  caml_new_string("major_words:    %*.0f\n")
];
var pz = [0,[12,10,0],caml_new_string("\n")];
var pA = [0,[4,0,0,0,0],caml_new_string("%d")];
var pB = [
  0,
  [11,caml_new_string("top_heap_words: "),[4,0,[1,1],0,[12,10,0]]],
  caml_new_string("top_heap_words: %*d\n")
];
var pC = [
  0,
  [11,caml_new_string("heap_words:     "),[4,0,[1,1],0,[12,10,0]]],
  caml_new_string("heap_words:     %*d\n")
];
var pD = [
  0,
  [11,caml_new_string("live_words:     "),[4,0,[1,1],0,[12,10,0]]],
  caml_new_string("live_words:     %*d\n")
];
var pE = [
  0,
  [11,caml_new_string("free_words:     "),[4,0,[1,1],0,[12,10,0]]],
  caml_new_string("free_words:     %*d\n")
];
var pF = [
  0,
  [11,caml_new_string("largest_free:   "),[4,0,[1,1],0,[12,10,0]]],
  caml_new_string("largest_free:   %*d\n")
];
var pG = [
  0,
  [11,caml_new_string("fragments:      "),[4,0,[1,1],0,[12,10,0]]],
  caml_new_string("fragments:      %*d\n")
];
var pH = [0,[12,10,0],caml_new_string("\n")];
var pI = [
  0,
  [11,caml_new_string("live_blocks: "),[4,0,0,0,[12,10,0]]],
  caml_new_string("live_blocks: %d\n")
];
var pJ = [
  0,
  [11,caml_new_string("free_blocks: "),[4,0,0,0,[12,10,0]]],
  caml_new_string("free_blocks: %d\n")
];
var pK = [
  0,
  [11,caml_new_string("heap_chunks: "),[4,0,0,0,[12,10,0]]],
  caml_new_string("heap_chunks: %d\n")
];

function print_stat(c) {
  var st = runtime["caml_gc_stat"](0);
  caml_call3(Printf[1], c, pr, st[4]);
  caml_call3(Printf[1], c, ps, st[5]);
  caml_call3(Printf[1], c, pt, st[14]);
  caml_call2(Printf[1], c, pu);
  var l1 = caml_ml_string_length(caml_call2(Printf[4], pv, st[1]));
  caml_call4(Printf[1], c, pw, l1, st[1]);
  caml_call4(Printf[1], c, px, l1, st[2]);
  caml_call4(Printf[1], c, py, l1, st[3]);
  caml_call2(Printf[1], c, pz);
  var l2 = caml_ml_string_length(caml_call2(Printf[4], pA, st[15]));
  caml_call4(Printf[1], c, pB, l2, st[15]);
  caml_call4(Printf[1], c, pC, l2, st[6]);
  caml_call4(Printf[1], c, pD, l2, st[8]);
  caml_call4(Printf[1], c, pE, l2, st[10]);
  caml_call4(Printf[1], c, pF, l2, st[12]);
  caml_call4(Printf[1], c, pG, l2, st[13]);
  caml_call2(Printf[1], c, pH);
  caml_call3(Printf[1], c, pI, st[9]);
  caml_call3(Printf[1], c, pJ, st[11]);
  return caml_call3(Printf[1], c, pK, st[7]);
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

function pL(pR) {return runtime["caml_final_release"](pR);}

function pM(pQ, pP) {
  return runtime["caml_final_register_called_without_value"](pQ, pP);
}

var Gc = [
  0,
  print_stat,
  allocated_bytes,
  function(pO, pN) {return runtime["caml_final_register"](pO, pN);},
  pM,
  pL,
  create_alarm,
  delete_alarm
];

runtime["caml_register_global"](22, Gc, "Gc");


module.exports = global.jsoo_runtime.caml_get_global_data().Gc;