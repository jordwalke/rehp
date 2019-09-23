/**
 * ListLabels
 * @providesModule ListLabels
 */
"use strict";
var List_ = require('List_.js');
var runtime = require('runtime.js');

let joo_global_object = global;


var runtime = joo_global_object.jsoo_runtime;
var global_data = runtime["caml_get_global_data"]();
var List = global_data["List_"];
var length = List[1];
var compare_lengths = List[2];
var compare_length_with = List[3];
var cons = List[4];
var hd = List[5];
var tl = List[6];
var nth = List[7];
var nth_opt = List[8];
var rev = List[9];
var init = List[10];
var append = List[11];
var rev_append = List[12];
var concat = List[13];
var flatten = List[14];
var iter = List[15];
var iteri = List[16];
var map = List[17];
var mapi = List[18];
var rev_map = List[19];
var fold_left = List[20];
var fold_right = List[21];
var iter2 = List[22];
var map2 = List[23];
var rev_map2 = List[24];
var fold_left2 = List[25];
var fold_right2 = List[26];
var for_all = List[27];
var exists = List[28];
var for_all2 = List[29];
var exists2 = List[30];
var mem = List[31];
var memq = List[32];
var find = List[33];
var find_opt = List[34];
var filter = List[35];
var find_all = List[36];
var partition = List[37];
var assoc = List[38];
var assoc_opt = List[39];
var assq = List[40];
var assq_opt = List[41];
var mem_assoc = List[42];
var mem_assq = List[43];
var remove_assoc = List[44];
var remove_assq = List[45];
var split = List[46];
var combine = List[47];
var sort = List[48];
var stable_sort = List[49];
var fast_sort = List[50];
var sort_uniq = List[51];
var merge = List[52];
var ListLabels = [
  0,
  length,
  hd,
  compare_lengths,
  compare_length_with,
  cons,
  tl,
  nth,
  nth_opt,
  rev,
  init,
  append,
  rev_append,
  concat,
  flatten,
  iter,
  iteri,
  map,
  mapi,
  rev_map,
  fold_left,
  fold_right,
  iter2,
  map2,
  rev_map2,
  fold_left2,
  fold_right2,
  for_all,
  exists,
  for_all2,
  exists2,
  mem,
  memq,
  find,
  find_opt,
  filter,
  find_all,
  partition,
  assoc,
  assoc_opt,
  assq,
  assq_opt,
  mem_assoc,
  mem_assq,
  remove_assoc,
  remove_assq,
  split,
  combine,
  sort,
  stable_sort,
  fast_sort,
  sort_uniq,
  merge
];

runtime["caml_register_global"](1, ListLabels, "ListLabels");


module.exports = global.jsoo_runtime.caml_get_global_data().ListLabels;
/*____hashes compiler:hashing-disabled inputs:hashing-disabled bytecode:hashing-disabled*/
