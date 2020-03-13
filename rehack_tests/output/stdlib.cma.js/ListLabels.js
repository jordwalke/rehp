/**
 * @flow strict
 * ListLabels
 */

// @ts-check


"use strict";

var runtime = require("../runtime/runtime.js");

;

var List = require("./List.js");
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

module.exports = ListLabels;

/*::type Exports = {
  length: any,
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
}*/
/** @type {{
  length: any,
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
}} */
module.exports = ((module.exports /*:: : any*/) /*:: :Exports */);
module.exports.length = module.exports[1];
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
module.exports.fold_left = module.exports[20];
module.exports.fold_right = module.exports[21];
module.exports.iter2 = module.exports[22];
module.exports.map2 = module.exports[23];
module.exports.rev_map2 = module.exports[24];
module.exports.fold_left2 = module.exports[25];
module.exports.fold_right2 = module.exports[26];
module.exports.for_all = module.exports[27];
module.exports.exists = module.exports[28];
module.exports.for_all2 = module.exports[29];
module.exports.exists2 = module.exports[30];
module.exports.mem = module.exports[31];
module.exports.memq = module.exports[32];
module.exports.find = module.exports[33];
module.exports.find_opt = module.exports[34];
module.exports.filter = module.exports[35];
module.exports.find_all = module.exports[36];
module.exports.partition = module.exports[37];
module.exports.assoc = module.exports[38];
module.exports.assoc_opt = module.exports[39];
module.exports.assq = module.exports[40];
module.exports.assq_opt = module.exports[41];
module.exports.mem_assoc = module.exports[42];
module.exports.mem_assq = module.exports[43];
module.exports.remove_assoc = module.exports[44];
module.exports.remove_assq = module.exports[45];
module.exports.split = module.exports[46];
module.exports.combine = module.exports[47];
module.exports.sort = module.exports[48];
module.exports.stable_sort = module.exports[49];
module.exports.fast_sort = module.exports[50];
module.exports.sort_uniq = module.exports[51];
module.exports.merge = module.exports[52];

/* Hashing disabled */
