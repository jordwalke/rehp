/**
 * @flow strict
 * StringLabels
 */

// @ts-check


"use strict";

var runtime = require("../runtime/runtime.js");

;

var String = require("./String.js");
var make = String[1];
var init = String[2];
var copy = String[3];
var sub = String[4];
var fill = String[5];
var blit = String[6];
var concat = String[7];
var iter = String[8];
var iteri = String[9];
var map = String[10];
var mapi = String[11];
var trim = String[12];
var escaped = String[13];
var index = String[14];
var index_opt = String[15];
var rindex = String[16];
var rindex_opt = String[17];
var index_from = String[18];
var index_from_opt = String[19];
var rindex_from = String[20];
var rindex_from_opt = String[21];
var contains = String[22];
var contains_from = String[23];
var rcontains_from = String[24];
var uppercase = String[25];
var lowercase = String[26];
var capitalize = String[27];
var uncapitalize = String[28];
var uppercase_ascii = String[29];
var lowercase_ascii = String[30];
var capitalize_ascii = String[31];
var uncapitalize_ascii = String[32];
var compare = String[33];
var equal = String[34];
var split_on_char = String[35];
var StringLabels = [
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
  split_on_char
];

module.exports = StringLabels;

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

/* Hashing disabled */
