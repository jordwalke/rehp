/**
 * @flow strict
 * Stdlib__listLabels
 */

// @ts-check


"use strict";

var runtime = require("../runtime/runtime.js");

;

var Stdlib_list = require("./Stdlib__list.js");
var length = Stdlib_list[1];
var compare_lengths = Stdlib_list[2];
var compare_length_with = Stdlib_list[3];
var cons = Stdlib_list[4];
var hd = Stdlib_list[5];
var tl = Stdlib_list[6];
var nth = Stdlib_list[7];
var nth_opt = Stdlib_list[8];
var rev = Stdlib_list[9];
var init = Stdlib_list[10];
var append = Stdlib_list[11];
var rev_append = Stdlib_list[12];
var concat = Stdlib_list[13];
var flatten = Stdlib_list[14];
var iter = Stdlib_list[15];
var iteri = Stdlib_list[16];
var map = Stdlib_list[17];
var mapi = Stdlib_list[18];
var rev_map = Stdlib_list[19];
var filter_map = Stdlib_list[20];
var fold_left = Stdlib_list[21];
var fold_right = Stdlib_list[22];
var iter2 = Stdlib_list[23];
var map2 = Stdlib_list[24];
var rev_map2 = Stdlib_list[25];
var fold_left2 = Stdlib_list[26];
var fold_right2 = Stdlib_list[27];
var for_all = Stdlib_list[28];
var exists = Stdlib_list[29];
var for_all2 = Stdlib_list[30];
var exists2 = Stdlib_list[31];
var mem = Stdlib_list[32];
var memq = Stdlib_list[33];
var find = Stdlib_list[34];
var find_opt = Stdlib_list[35];
var filter = Stdlib_list[36];
var find_all = Stdlib_list[37];
var partition = Stdlib_list[38];
var assoc = Stdlib_list[39];
var assoc_opt = Stdlib_list[40];
var assq = Stdlib_list[41];
var assq_opt = Stdlib_list[42];
var mem_assoc = Stdlib_list[43];
var mem_assq = Stdlib_list[44];
var remove_assoc = Stdlib_list[45];
var remove_assq = Stdlib_list[46];
var split = Stdlib_list[47];
var combine = Stdlib_list[48];
var sort = Stdlib_list[49];
var stable_sort = Stdlib_list[50];
var fast_sort = Stdlib_list[51];
var sort_uniq = Stdlib_list[52];
var merge = Stdlib_list[53];
var to_seq = Stdlib_list[54];
var of_seq = Stdlib_list[55];
var Stdlib_listLabels = [
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
  filter_map,
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
  merge,
  to_seq,
  of_seq
];

module.exports = Stdlib_listLabels;

/*::type Exports = {
  _length_: any,
  hd: any,
  compare_lengths: any,
  compare_length_with: any,
  cons: any,
  tl: any,
  nth: any,
  nth_opt: any,
  rev: any,
  init: any,
  append: any,
  rev_append: any,
  concat: any,
  flatten: any,
  iter: any,
  iteri: any,
  map: any,
  mapi: any,
  rev_map: any,
  filter_map: any,
  fold_left: any,
  fold_right: any,
  iter2: any,
  map2: any,
  rev_map2: any,
  fold_left2: any,
  fold_right2: any,
  for_all: any,
  exists: any,
  for_all2: any,
  exists2: any,
  mem: any,
  memq: any,
  find: any,
  find_opt: any,
  filter: any,
  find_all: any,
  partition: any,
  assoc: any,
  assoc_opt: any,
  assq: any,
  assq_opt: any,
  mem_assoc: any,
  mem_assq: any,
  remove_assoc: any,
  remove_assq: any,
  split: any,
  combine: any,
  sort: any,
  stable_sort: any,
  fast_sort: any,
  sort_uniq: any,
  merge: any,
  to_seq: any,
  of_seq: any,
}*/
/** @type {{
  _length_: any,
  hd: any,
  compare_lengths: any,
  compare_length_with: any,
  cons: any,
  tl: any,
  nth: any,
  nth_opt: any,
  rev: any,
  init: any,
  append: any,
  rev_append: any,
  concat: any,
  flatten: any,
  iter: any,
  iteri: any,
  map: any,
  mapi: any,
  rev_map: any,
  filter_map: any,
  fold_left: any,
  fold_right: any,
  iter2: any,
  map2: any,
  rev_map2: any,
  fold_left2: any,
  fold_right2: any,
  for_all: any,
  exists: any,
  for_all2: any,
  exists2: any,
  mem: any,
  memq: any,
  find: any,
  find_opt: any,
  filter: any,
  find_all: any,
  partition: any,
  assoc: any,
  assoc_opt: any,
  assq: any,
  assq_opt: any,
  mem_assoc: any,
  mem_assq: any,
  remove_assoc: any,
  remove_assq: any,
  split: any,
  combine: any,
  sort: any,
  stable_sort: any,
  fast_sort: any,
  sort_uniq: any,
  merge: any,
  to_seq: any,
  of_seq: any,
}} */
module.exports = ((module.exports /*:: : any*/) /*:: :Exports */);
module.exports._length_ = module.exports[1];
module.exports.hd = module.exports[2];
module.exports.compare_lengths = module.exports[3];
module.exports.compare_length_with = module.exports[4];
module.exports.cons = module.exports[5];
module.exports.tl = module.exports[6];
module.exports.nth = module.exports[7];
module.exports.nth_opt = module.exports[8];
module.exports.rev = module.exports[9];
module.exports.init = module.exports[10];
module.exports.append = module.exports[11];
module.exports.rev_append = module.exports[12];
module.exports.concat = module.exports[13];
module.exports.flatten = module.exports[14];
module.exports.iter = module.exports[15];
module.exports.iteri = module.exports[16];
module.exports.map = module.exports[17];
module.exports.mapi = module.exports[18];
module.exports.rev_map = module.exports[19];
module.exports.filter_map = module.exports[20];
module.exports.fold_left = module.exports[21];
module.exports.fold_right = module.exports[22];
module.exports.iter2 = module.exports[23];
module.exports.map2 = module.exports[24];
module.exports.rev_map2 = module.exports[25];
module.exports.fold_left2 = module.exports[26];
module.exports.fold_right2 = module.exports[27];
module.exports.for_all = module.exports[28];
module.exports.exists = module.exports[29];
module.exports.for_all2 = module.exports[30];
module.exports.exists2 = module.exports[31];
module.exports.mem = module.exports[32];
module.exports.memq = module.exports[33];
module.exports.find = module.exports[34];
module.exports.find_opt = module.exports[35];
module.exports.filter = module.exports[36];
module.exports.find_all = module.exports[37];
module.exports.partition = module.exports[38];
module.exports.assoc = module.exports[39];
module.exports.assoc_opt = module.exports[40];
module.exports.assq = module.exports[41];
module.exports.assq_opt = module.exports[42];
module.exports.mem_assoc = module.exports[43];
module.exports.mem_assq = module.exports[44];
module.exports.remove_assoc = module.exports[45];
module.exports.remove_assq = module.exports[46];
module.exports.split = module.exports[47];
module.exports.combine = module.exports[48];
module.exports.sort = module.exports[49];
module.exports.stable_sort = module.exports[50];
module.exports.fast_sort = module.exports[51];
module.exports.sort_uniq = module.exports[52];
module.exports.merge = module.exports[53];
module.exports.to_seq = module.exports[54];
module.exports.of_seq = module.exports[55];

/* Hashing disabled */
