/**
 * BytesLabels
 * @providesModule BytesLabels
 */
"use strict";
var Bytes = require('Bytes.js');
var runtime = require('runtime.js');

let joo_global_object = global;


var runtime = joo_global_object.jsoo_runtime;
var global_data = runtime["caml_get_global_data"]();
var Bytes = global_data["Bytes"];
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

runtime["caml_register_global"](1, BytesLabels, "BytesLabels");


module.exports = global.jsoo_runtime.caml_get_global_data().BytesLabels;
/*____hashes compiler:hashing-disabled inputs:hashing-disabled bytecode:hashing-disabled*/
