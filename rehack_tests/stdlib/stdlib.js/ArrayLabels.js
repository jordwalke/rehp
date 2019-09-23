/**
 * ArrayLabels
 * @providesModule ArrayLabels
 */
"use strict";
var Array_ = require('Array_.js');
var runtime = require('runtime.js');

let joo_global_object = global;


var runtime = joo_global_object.jsoo_runtime;
var global_data = runtime["caml_get_global_data"]();
var Array = global_data["Array_"];
var make_float = Array[1];
var init = Array[2];
var make_matrix = Array[3];
var create_matrix = Array[4];
var append = Array[5];
var concat = Array[6];
var sub = Array[7];
var copy = Array[8];
var fill = Array[9];
var blit = Array[10];
var to_list = Array[11];
var of_list = Array[12];
var iter = Array[13];
var iteri = Array[14];
var map = Array[15];
var mapi = Array[16];
var fold_left = Array[17];
var fold_right = Array[18];
var iter2 = Array[19];
var map2 = Array[20];
var for_all = Array[21];
var exists = Array[22];
var mem = Array[23];
var memq = Array[24];
var sort = Array[25];
var stable_sort = Array[26];
var fast_sort = Array[27];
var Floatarray = Array[28];
var ArrayLabels = [
  0,
  init,
  make_matrix,
  create_matrix,
  append,
  concat,
  sub,
  copy,
  fill,
  blit,
  to_list,
  of_list,
  iter,
  map,
  iteri,
  mapi,
  fold_left,
  fold_right,
  iter2,
  map2,
  exists,
  for_all,
  mem,
  memq,
  make_float,
  sort,
  stable_sort,
  fast_sort,
  Floatarray
];

runtime["caml_register_global"](1, ArrayLabels, "ArrayLabels");


module.exports = global.jsoo_runtime.caml_get_global_data().ArrayLabels;
/*____hashes compiler:hashing-disabled inputs:hashing-disabled bytecode:hashing-disabled*/
