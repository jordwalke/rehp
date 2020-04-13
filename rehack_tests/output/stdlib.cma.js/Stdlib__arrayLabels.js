/**
 * @flow strict
 * Stdlib__arrayLabels
 */

// @ts-check


"use strict";

var runtime = require("../runtime/runtime.js");

;

var Stdlib_array = require("./Stdlib__array.js");
var make_float = Stdlib_array[1];
var init = Stdlib_array[2];
var make_matrix = Stdlib_array[3];
var create_matrix = Stdlib_array[4];
var append = Stdlib_array[5];
var concat = Stdlib_array[6];
var sub = Stdlib_array[7];
var copy = Stdlib_array[8];
var fill = Stdlib_array[9];
var blit = Stdlib_array[10];
var to_list = Stdlib_array[11];
var of_list = Stdlib_array[12];
var iter = Stdlib_array[13];
var iteri = Stdlib_array[14];
var map = Stdlib_array[15];
var mapi = Stdlib_array[16];
var fold_left = Stdlib_array[17];
var fold_right = Stdlib_array[18];
var iter2 = Stdlib_array[19];
var map2 = Stdlib_array[20];
var for_all = Stdlib_array[21];
var exists = Stdlib_array[22];
var mem = Stdlib_array[23];
var memq = Stdlib_array[24];
var sort = Stdlib_array[25];
var stable_sort = Stdlib_array[26];
var fast_sort = Stdlib_array[27];
var to_seq = Stdlib_array[28];
var to_seqi = Stdlib_array[29];
var of_seq = Stdlib_array[30];
var Floatarray = Stdlib_array[31];
var Stdlib_arrayLabels = [
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
  to_seq,
  to_seqi,
  of_seq,
  Floatarray
];

module.exports = Stdlib_arrayLabels;

/*::type Exports = {
  init: any,
  make_matrix: any,
  create_matrix: any,
  append: any,
  concat: any,
  sub: any,
  copy: any,
  fill: any,
  blit: any,
  to_list: any,
  of_list: any,
  iter: any,
  map: any,
  iteri: any,
  mapi: any,
  fold_left: any,
  fold_right: any,
  iter2: any,
  map2: any,
  exists: any,
  for_all: any,
  mem: any,
  memq: any,
  make_float: any,
  sort: any,
  stable_sort: any,
  fast_sort: any,
  to_seq: any,
  to_seqi: any,
  of_seq: any,
  Floatarray: any,
}*/
/** @type {{
  init: any,
  make_matrix: any,
  create_matrix: any,
  append: any,
  concat: any,
  sub: any,
  copy: any,
  fill: any,
  blit: any,
  to_list: any,
  of_list: any,
  iter: any,
  map: any,
  iteri: any,
  mapi: any,
  fold_left: any,
  fold_right: any,
  iter2: any,
  map2: any,
  exists: any,
  for_all: any,
  mem: any,
  memq: any,
  make_float: any,
  sort: any,
  stable_sort: any,
  fast_sort: any,
  to_seq: any,
  to_seqi: any,
  of_seq: any,
  Floatarray: any,
}} */
module.exports = ((module.exports /*:: : any*/) /*:: :Exports */);
module.exports.init = module.exports[1];
module.exports.make_matrix = module.exports[2];
module.exports.create_matrix = module.exports[3];
module.exports.append = module.exports[4];
module.exports.concat = module.exports[5];
module.exports.sub = module.exports[6];
module.exports.copy = module.exports[7];
module.exports.fill = module.exports[8];
module.exports.blit = module.exports[9];
module.exports.to_list = module.exports[10];
module.exports.of_list = module.exports[11];
module.exports.iter = module.exports[12];
module.exports.map = module.exports[13];
module.exports.iteri = module.exports[14];
module.exports.mapi = module.exports[15];
module.exports.fold_left = module.exports[16];
module.exports.fold_right = module.exports[17];
module.exports.iter2 = module.exports[18];
module.exports.map2 = module.exports[19];
module.exports.exists = module.exports[20];
module.exports.for_all = module.exports[21];
module.exports.mem = module.exports[22];
module.exports.memq = module.exports[23];
module.exports.make_float = module.exports[24];
module.exports.sort = module.exports[25];
module.exports.stable_sort = module.exports[26];
module.exports.fast_sort = module.exports[27];
module.exports.to_seq = module.exports[28];
module.exports.to_seqi = module.exports[29];
module.exports.of_seq = module.exports[30];
module.exports.Floatarray = module.exports[31];

/* Hashing disabled */
