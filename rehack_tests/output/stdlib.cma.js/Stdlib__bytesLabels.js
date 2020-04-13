/**
 * @flow strict
 * Stdlib__bytesLabels
 */

// @ts-check


"use strict";

var runtime = require("../runtime/runtime.js");

;

var Stdlib_bytes = require("./Stdlib__bytes.js");
var make = Stdlib_bytes[1];
var init = Stdlib_bytes[2];
var empty = Stdlib_bytes[3];
var copy = Stdlib_bytes[4];
var of_string = Stdlib_bytes[5];
var to_string = Stdlib_bytes[6];
var sub = Stdlib_bytes[7];
var sub_string = Stdlib_bytes[8];
var extend = Stdlib_bytes[9];
var fill = Stdlib_bytes[10];
var blit = Stdlib_bytes[11];
var blit_string = Stdlib_bytes[12];
var concat = Stdlib_bytes[13];
var cat = Stdlib_bytes[14];
var iter = Stdlib_bytes[15];
var iteri = Stdlib_bytes[16];
var map = Stdlib_bytes[17];
var mapi = Stdlib_bytes[18];
var trim = Stdlib_bytes[19];
var escaped = Stdlib_bytes[20];
var index = Stdlib_bytes[21];
var index_opt = Stdlib_bytes[22];
var rindex = Stdlib_bytes[23];
var rindex_opt = Stdlib_bytes[24];
var index_from = Stdlib_bytes[25];
var index_from_opt = Stdlib_bytes[26];
var rindex_from = Stdlib_bytes[27];
var rindex_from_opt = Stdlib_bytes[28];
var contains = Stdlib_bytes[29];
var contains_from = Stdlib_bytes[30];
var rcontains_from = Stdlib_bytes[31];
var uppercase = Stdlib_bytes[32];
var lowercase = Stdlib_bytes[33];
var capitalize = Stdlib_bytes[34];
var uncapitalize = Stdlib_bytes[35];
var uppercase_ascii = Stdlib_bytes[36];
var lowercase_ascii = Stdlib_bytes[37];
var capitalize_ascii = Stdlib_bytes[38];
var uncapitalize_ascii = Stdlib_bytes[39];
var compare = Stdlib_bytes[40];
var equal = Stdlib_bytes[41];
var unsafe_to_string = Stdlib_bytes[42];
var unsafe_of_string = Stdlib_bytes[43];
var to_seq = Stdlib_bytes[44];
var to_seqi = Stdlib_bytes[45];
var of_seq = Stdlib_bytes[46];
var get_uint8 = Stdlib_bytes[47];
var get_int8 = Stdlib_bytes[48];
var get_uint16_ne = Stdlib_bytes[49];
var get_uint16_be = Stdlib_bytes[50];
var get_uint16_le = Stdlib_bytes[51];
var get_int16_ne = Stdlib_bytes[52];
var get_int16_be = Stdlib_bytes[53];
var get_int16_le = Stdlib_bytes[54];
var get_int32_ne = Stdlib_bytes[55];
var get_int32_be = Stdlib_bytes[56];
var get_int32_le = Stdlib_bytes[57];
var get_int64_ne = Stdlib_bytes[58];
var get_int64_be = Stdlib_bytes[59];
var get_int64_le = Stdlib_bytes[60];
var set_uint8 = Stdlib_bytes[61];
var set_int8 = Stdlib_bytes[62];
var set_uint16_ne = Stdlib_bytes[63];
var set_uint16_be = Stdlib_bytes[64];
var set_uint16_le = Stdlib_bytes[65];
var set_int16_ne = Stdlib_bytes[66];
var set_int16_be = Stdlib_bytes[67];
var set_int16_le = Stdlib_bytes[68];
var set_int32_ne = Stdlib_bytes[69];
var set_int32_be = Stdlib_bytes[70];
var set_int32_le = Stdlib_bytes[71];
var set_int64_ne = Stdlib_bytes[72];
var set_int64_be = Stdlib_bytes[73];
var set_int64_le = Stdlib_bytes[74];
var Stdlib_bytesLabels = [
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
  to_seq,
  to_seqi,
  of_seq,
  get_uint8,
  get_int8,
  get_uint16_ne,
  get_uint16_be,
  get_uint16_le,
  get_int16_ne,
  get_int16_be,
  get_int16_le,
  get_int32_ne,
  get_int32_be,
  get_int32_le,
  get_int64_ne,
  get_int64_be,
  get_int64_le,
  set_uint8,
  set_int8,
  set_uint16_ne,
  set_uint16_be,
  set_uint16_le,
  set_int16_ne,
  set_int16_be,
  set_int16_le,
  set_int32_ne,
  set_int32_be,
  set_int32_le,
  set_int64_ne,
  set_int64_be,
  set_int64_le,
  unsafe_to_string,
  unsafe_of_string
];

module.exports = Stdlib_bytesLabels;

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
  to_seq: any,
  to_seqi: any,
  of_seq: any,
  get_uint8: any,
  get_int8: any,
  get_uint16_ne: any,
  get_uint16_be: any,
  get_uint16_le: any,
  get_int16_ne: any,
  get_int16_be: any,
  get_int16_le: any,
  get_int32_ne: any,
  get_int32_be: any,
  get_int32_le: any,
  get_int64_ne: any,
  get_int64_be: any,
  get_int64_le: any,
  set_uint8: any,
  set_int8: any,
  set_uint16_ne: any,
  set_uint16_be: any,
  set_uint16_le: any,
  set_int16_ne: any,
  set_int16_be: any,
  set_int16_le: any,
  set_int32_ne: any,
  set_int32_be: any,
  set_int32_le: any,
  set_int64_ne: any,
  set_int64_be: any,
  set_int64_le: any,
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
  to_seq: any,
  to_seqi: any,
  of_seq: any,
  get_uint8: any,
  get_int8: any,
  get_uint16_ne: any,
  get_uint16_be: any,
  get_uint16_le: any,
  get_int16_ne: any,
  get_int16_be: any,
  get_int16_le: any,
  get_int32_ne: any,
  get_int32_be: any,
  get_int32_le: any,
  get_int64_ne: any,
  get_int64_be: any,
  get_int64_le: any,
  set_uint8: any,
  set_int8: any,
  set_uint16_ne: any,
  set_uint16_be: any,
  set_uint16_le: any,
  set_int16_ne: any,
  set_int16_be: any,
  set_int16_le: any,
  set_int32_ne: any,
  set_int32_be: any,
  set_int32_le: any,
  set_int64_ne: any,
  set_int64_be: any,
  set_int64_le: any,
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
module.exports.to_seq = module.exports[42];
module.exports.to_seqi = module.exports[43];
module.exports.of_seq = module.exports[44];
module.exports.get_uint8 = module.exports[45];
module.exports.get_int8 = module.exports[46];
module.exports.get_uint16_ne = module.exports[47];
module.exports.get_uint16_be = module.exports[48];
module.exports.get_uint16_le = module.exports[49];
module.exports.get_int16_ne = module.exports[50];
module.exports.get_int16_be = module.exports[51];
module.exports.get_int16_le = module.exports[52];
module.exports.get_int32_ne = module.exports[53];
module.exports.get_int32_be = module.exports[54];
module.exports.get_int32_le = module.exports[55];
module.exports.get_int64_ne = module.exports[56];
module.exports.get_int64_be = module.exports[57];
module.exports.get_int64_le = module.exports[58];
module.exports.set_uint8 = module.exports[59];
module.exports.set_int8 = module.exports[60];
module.exports.set_uint16_ne = module.exports[61];
module.exports.set_uint16_be = module.exports[62];
module.exports.set_uint16_le = module.exports[63];
module.exports.set_int16_ne = module.exports[64];
module.exports.set_int16_be = module.exports[65];
module.exports.set_int16_le = module.exports[66];
module.exports.set_int32_ne = module.exports[67];
module.exports.set_int32_be = module.exports[68];
module.exports.set_int32_le = module.exports[69];
module.exports.set_int64_ne = module.exports[70];
module.exports.set_int64_be = module.exports[71];
module.exports.set_int64_le = module.exports[72];
module.exports.unsafe_to_string = module.exports[73];
module.exports.unsafe_of_string = module.exports[74];

/* Hashing disabled */
