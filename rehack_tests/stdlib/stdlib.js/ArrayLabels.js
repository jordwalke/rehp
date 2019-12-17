/**
 * @flow strict
 * ArrayLabels
 */

// @ts-check


"use strict";
let joo_global_object = typeof global !== 'undefined' ? global : window;
require('runtime.js');

var runtime = joo_global_object.jsoo_runtime;
var Array = require("Array_.js");
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

exports = ArrayLabels;

/*::type Exports = {
  Floatarray: any
  fast_sort: any
  stable_sort: any
  sort: any
  make_float: any
  memq: any
  mem: any
  for_all: any
  exists: any
  map2: any
  iter2: any
  fold_right: any
  fold_left: any
  mapi: any
  iteri: any
  map: any
  iter: any
  of_list: any
  to_list: any
  blit: any
  fill: any
  copy: any
  sub: any
  concat: any
  append: any
  create_matrix: any
  make_matrix: any
  init: any
}*/
/** @type {{
  Floatarray: any,
  fast_sort: any,
  stable_sort: any,
  sort: any,
  make_float: any,
  memq: any,
  mem: any,
  for_all: any,
  exists: any,
  map2: any,
  iter2: any,
  fold_right: any,
  fold_left: any,
  mapi: any,
  iteri: any,
  map: any,
  iter: any,
  of_list: any,
  to_list: any,
  blit: any,
  fill: any,
  copy: any,
  sub: any,
  concat: any,
  append: any,
  create_matrix: any,
  make_matrix: any,
  init: any,
}} */
module.exports = ((exports /*:: : any*/) /*:: :Exports */);
module.exports.Floatarray = module.exports[28];
module.exports.fast_sort = module.exports[27];
module.exports.stable_sort = module.exports[26];
module.exports.sort = module.exports[25];
module.exports.make_float = module.exports[24];
module.exports.memq = module.exports[23];
module.exports.mem = module.exports[22];
module.exports.for_all = module.exports[21];
module.exports.exists = module.exports[20];
module.exports.map2 = module.exports[19];
module.exports.iter2 = module.exports[18];
module.exports.fold_right = module.exports[17];
module.exports.fold_left = module.exports[16];
module.exports.mapi = module.exports[15];
module.exports.iteri = module.exports[14];
module.exports.map = module.exports[13];
module.exports.iter = module.exports[12];
module.exports.of_list = module.exports[11];
module.exports.to_list = module.exports[10];
module.exports.blit = module.exports[9];
module.exports.fill = module.exports[8];
module.exports.copy = module.exports[7];
module.exports.sub = module.exports[6];
module.exports.concat = module.exports[5];
module.exports.append = module.exports[4];
module.exports.create_matrix = module.exports[3];
module.exports.make_matrix = module.exports[2];
module.exports.init = module.exports[1];

/* Hashing disabled */
