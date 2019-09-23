/**
 * StringLabels
 * @providesModule StringLabels
 */
"use strict";
var String_ = require('String_.js');
var runtime = require('runtime.js');

let joo_global_object = global;


var runtime = joo_global_object.jsoo_runtime;
var global_data = runtime["caml_get_global_data"]();
var String = global_data["String_"];
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

runtime["caml_register_global"](1, StringLabels, "StringLabels");


module.exports = global.jsoo_runtime.caml_get_global_data().StringLabels;
/*____hashes compiler:hashing-disabled inputs:hashing-disabled bytecode:hashing-disabled*/
