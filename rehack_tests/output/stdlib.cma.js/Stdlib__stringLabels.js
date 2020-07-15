/**
 * @flow strict
 * Stdlib__stringLabels
 */

// @ts-check


"use strict";

var runtime = require("../runtime/runtime.js");
var Stdlib_string = require("./Stdlib__string.js");
var make = Stdlib_string[1];
var init = Stdlib_string[2];
var copy = Stdlib_string[3];
var sub = Stdlib_string[4];
var fill = Stdlib_string[5];
var blit = Stdlib_string[6];
var concat = Stdlib_string[7];
var iter = Stdlib_string[8];
var iteri = Stdlib_string[9];
var map = Stdlib_string[10];
var mapi = Stdlib_string[11];
var trim = Stdlib_string[12];
var escaped = Stdlib_string[13];
var index = Stdlib_string[14];
var index_opt = Stdlib_string[15];
var rindex = Stdlib_string[16];
var rindex_opt = Stdlib_string[17];
var index_from = Stdlib_string[18];
var index_from_opt = Stdlib_string[19];
var rindex_from = Stdlib_string[20];
var rindex_from_opt = Stdlib_string[21];
var contains = Stdlib_string[22];
var contains_from = Stdlib_string[23];
var rcontains_from = Stdlib_string[24];
var uppercase = Stdlib_string[25];
var lowercase = Stdlib_string[26];
var capitalize = Stdlib_string[27];
var uncapitalize = Stdlib_string[28];
var uppercase_ascii = Stdlib_string[29];
var lowercase_ascii = Stdlib_string[30];
var capitalize_ascii = Stdlib_string[31];
var uncapitalize_ascii = Stdlib_string[32];
var compare = Stdlib_string[33];
var equal = Stdlib_string[34];
var split_on_char = Stdlib_string[35];
var to_seq = Stdlib_string[36];
var to_seqi = Stdlib_string[37];
var of_seq = Stdlib_string[38];
var Stdlib_stringLabels = [
  0,
  make,
  init,
  copy,
  sub,
  fill,
  blit,
  concat,
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
  split_on_char,
  to_seq,
  to_seqi,
  of_seq
];

module.exports = Stdlib_stringLabels;

/*::type Exports = {
  make: any,
  init: any,
  copy: any,
  sub: any,
  fill: any,
  blit: any,
  concat: any,
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
  split_on_char: any,
  to_seq: any,
  to_seqi: any,
  of_seq: any,
}*/
/** @type {{
  make: any,
  init: any,
  copy: any,
  sub: any,
  fill: any,
  blit: any,
  concat: any,
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
  split_on_char: any,
  to_seq: any,
  to_seqi: any,
  of_seq: any,
}} */
module.exports = ((module.exports /*:: : any*/) /*:: :Exports */);
module.exports.make = module.exports[1];
module.exports.init = module.exports[2];
module.exports.copy = module.exports[3];
module.exports.sub = module.exports[4];
module.exports.fill = module.exports[5];
module.exports.blit = module.exports[6];
module.exports.concat = module.exports[7];
module.exports.iter = module.exports[8];
module.exports.iteri = module.exports[9];
module.exports.map = module.exports[10];
module.exports.mapi = module.exports[11];
module.exports.trim = module.exports[12];
module.exports.escaped = module.exports[13];
module.exports.index = module.exports[14];
module.exports.index_opt = module.exports[15];
module.exports.rindex = module.exports[16];
module.exports.rindex_opt = module.exports[17];
module.exports.index_from = module.exports[18];
module.exports.index_from_opt = module.exports[19];
module.exports.rindex_from = module.exports[20];
module.exports.rindex_from_opt = module.exports[21];
module.exports.contains = module.exports[22];
module.exports.contains_from = module.exports[23];
module.exports.rcontains_from = module.exports[24];
module.exports.uppercase = module.exports[25];
module.exports.lowercase = module.exports[26];
module.exports.capitalize = module.exports[27];
module.exports.uncapitalize = module.exports[28];
module.exports.uppercase_ascii = module.exports[29];
module.exports.lowercase_ascii = module.exports[30];
module.exports.capitalize_ascii = module.exports[31];
module.exports.uncapitalize_ascii = module.exports[32];
module.exports.compare = module.exports[33];
module.exports.equal = module.exports[34];
module.exports.split_on_char = module.exports[35];
module.exports.to_seq = module.exports[36];
module.exports.to_seqi = module.exports[37];
module.exports.of_seq = module.exports[38];

/* Hashing disabled */
