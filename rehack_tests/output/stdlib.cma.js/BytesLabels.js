/**
 * @flow strict
 * BytesLabels
 */

// @ts-check


"use strict";

var runtime = require("../runtime/runtime.js");

;

var Bytes = require("./Bytes.js");
var make = Bytes[1];
var init = Bytes[2];
var empty = Bytes[3];
var copy = Bytes[4];
var of_string = Bytes[5];
var to_string = Bytes[6];
var sub = Bytes[7];
var sub_string = Bytes[8];
var extend = Bytes[9];
var fill = Bytes[10];
var blit = Bytes[11];
var blit_string = Bytes[12];
var concat = Bytes[13];
var cat = Bytes[14];
var iter = Bytes[15];
var iteri = Bytes[16];
var map = Bytes[17];
var mapi = Bytes[18];
var trim = Bytes[19];
var escaped = Bytes[20];
var index = Bytes[21];
var index_opt = Bytes[22];
var rindex = Bytes[23];
var rindex_opt = Bytes[24];
var index_from = Bytes[25];
var index_from_opt = Bytes[26];
var rindex_from = Bytes[27];
var rindex_from_opt = Bytes[28];
var contains = Bytes[29];
var contains_from = Bytes[30];
var rcontains_from = Bytes[31];
var uppercase = Bytes[32];
var lowercase = Bytes[33];
var capitalize = Bytes[34];
var uncapitalize = Bytes[35];
var uppercase_ascii = Bytes[36];
var lowercase_ascii = Bytes[37];
var capitalize_ascii = Bytes[38];
var uncapitalize_ascii = Bytes[39];
var compare = Bytes[40];
var equal = Bytes[41];
var unsafe_to_string = Bytes[42];
var unsafe_of_string = Bytes[43];
var BytesLabels = [
  0,
  make,
  init,
  empty,
  copy,
  of_string,
  to_string,
  sub,
  sub_string,
  extend,
  fill,
  blit,
  blit_string,
  concat,
  cat,
  iter,
  iteri,
  map,
  mapi,
  trim,
  escaped,
  index,
  index_opt,
  rindex,
  rindex_opt,
  index_from,
  index_from_opt,
  rindex_from,
  rindex_from_opt,
  contains,
  contains_from,
  rcontains_from,
  uppercase,
  lowercase,
  capitalize,
  uncapitalize,
  uppercase_ascii,
  lowercase_ascii,
  capitalize_ascii,
  uncapitalize_ascii,
  compare,
  equal,
  unsafe_to_string,
  unsafe_of_string
];

module.exports = BytesLabels;

/*::type Exports = {
  make: any,
  init: any,
  empty: any,
  copy: any,
  of_string: any,
  to_string: any,
  sub: any,
  sub_string: any,
  extend: any,
  fill: any,
  blit: any,
  blit_string: any,
  concat: any,
  cat: any,
  iter: any,
  iteri: any,
  map: any,
  mapi: any,
  trim: any,
  escaped: any,
  index: any,
  index_opt: any,
  rindex: any,
  rindex_opt: any,
  index_from: any,
  index_from_opt: any,
  rindex_from: any,
  rindex_from_opt: any,
  contains: any,
  contains_from: any,
  rcontains_from: any,
  uppercase: any,
  lowercase: any,
  capitalize: any,
  uncapitalize: any,
  uppercase_ascii: any,
  lowercase_ascii: any,
  capitalize_ascii: any,
  uncapitalize_ascii: any,
  compare: any,
  equal: any,
  unsafe_to_string: any,
  unsafe_of_string: any,
}*/
/** @type {{
  make: any,
  init: any,
  empty: any,
  copy: any,
  of_string: any,
  to_string: any,
  sub: any,
  sub_string: any,
  extend: any,
  fill: any,
  blit: any,
  blit_string: any,
  concat: any,
  cat: any,
  iter: any,
  iteri: any,
  map: any,
  mapi: any,
  trim: any,
  escaped: any,
  index: any,
  index_opt: any,
  rindex: any,
  rindex_opt: any,
  index_from: any,
  index_from_opt: any,
  rindex_from: any,
  rindex_from_opt: any,
  contains: any,
  contains_from: any,
  rcontains_from: any,
  uppercase: any,
  lowercase: any,
  capitalize: any,
  uncapitalize: any,
  uppercase_ascii: any,
  lowercase_ascii: any,
  capitalize_ascii: any,
  uncapitalize_ascii: any,
  compare: any,
  equal: any,
  unsafe_to_string: any,
  unsafe_of_string: any,
}} */
module.exports = ((module.exports /*:: : any*/) /*:: :Exports */);
module.exports.make = module.exports[1];
module.exports.init = module.exports[2];
module.exports.empty = module.exports[3];
module.exports.copy = module.exports[4];
module.exports.of_string = module.exports[5];
module.exports.to_string = module.exports[6];
module.exports.sub = module.exports[7];
module.exports.sub_string = module.exports[8];
module.exports.extend = module.exports[9];
module.exports.fill = module.exports[10];
module.exports.blit = module.exports[11];
module.exports.blit_string = module.exports[12];
module.exports.concat = module.exports[13];
module.exports.cat = module.exports[14];
module.exports.iter = module.exports[15];
module.exports.iteri = module.exports[16];
module.exports.map = module.exports[17];
module.exports.mapi = module.exports[18];
module.exports.trim = module.exports[19];
module.exports.escaped = module.exports[20];
module.exports.index = module.exports[21];
module.exports.index_opt = module.exports[22];
module.exports.rindex = module.exports[23];
module.exports.rindex_opt = module.exports[24];
module.exports.index_from = module.exports[25];
module.exports.index_from_opt = module.exports[26];
module.exports.rindex_from = module.exports[27];
module.exports.rindex_from_opt = module.exports[28];
module.exports.contains = module.exports[29];
module.exports.contains_from = module.exports[30];
module.exports.rcontains_from = module.exports[31];
module.exports.uppercase = module.exports[32];
module.exports.lowercase = module.exports[33];
module.exports.capitalize = module.exports[34];
module.exports.uncapitalize = module.exports[35];
module.exports.uppercase_ascii = module.exports[36];
module.exports.lowercase_ascii = module.exports[37];
module.exports.capitalize_ascii = module.exports[38];
module.exports.uncapitalize_ascii = module.exports[39];
module.exports.compare = module.exports[40];
module.exports.equal = module.exports[41];
module.exports.unsafe_to_string = module.exports[42];
module.exports.unsafe_of_string = module.exports[43];

/* Hashing disabled */
