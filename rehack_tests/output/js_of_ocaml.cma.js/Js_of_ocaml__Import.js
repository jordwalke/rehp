/**
 * @flow strict
 * Js_of_ocaml__Import
 */

// @ts-check


"use strict";

var runtime = require("../runtime/runtime.js");
var Stdlib_string = require("../stdlib.cma.js/Stdlib__string.js");
var Stdlib_char = require("../stdlib.cma.js/Stdlib__char.js");
var Poly = [0];

function symbol(x, y) {return x < y ? 1 : 0;}

function symbol__0(x, y) {return x <= y ? 1 : 0;}

function symbol__1(x, y) {return x !== y ? 1 : 0;}

function symbol__2(x, y) {return x === y ? 1 : 0;}

function symbol__3(x, y) {return y < x ? 1 : 0;}

function symbol__4(x, y) {return y <= x ? 1 : 0;}

function compare(x, y) {return runtime["caml_int_compare"](x, y);}

function equal(x, y) {return symbol__2(x, y);}

function max(x, y) {return symbol__4(x, y) ? x : y;}

function min(x, y) {return symbol__0(x, y) ? x : y;}

var Int_replace_polymorphic_compare = [
  0,
  symbol,
  symbol__0,
  symbol__1,
  symbol__2,
  symbol__3,
  symbol__4,
  compare,
  equal,
  max,
  min
];
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
var compare__0 = Stdlib_string[33];
var split_on_char = Stdlib_string[35];
var to_seq = Stdlib_string[36];
var to_seqi = Stdlib_string[37];
var of_seq = Stdlib_string[38];

function equal__0(x, y) {return runtime["caml_string_equal"](x, y);}

var String = [
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
  compare__0,
  split_on_char,
  to_seq,
  to_seqi,
  of_seq,
  equal__0
];
var chr = Stdlib_char[1];
var escaped__0 = Stdlib_char[2];
var lowercase__0 = Stdlib_char[3];
var uppercase__0 = Stdlib_char[4];
var lowercase_ascii__0 = Stdlib_char[5];
var uppercase_ascii__0 = Stdlib_char[6];
var compare__1 = Stdlib_char[7];

function equal__1(x, y) {return x === y ? 1 : 0;}

var Char = [
  0,
  chr,
  escaped__0,
  lowercase__0,
  uppercase__0,
  lowercase_ascii__0,
  uppercase_ascii__0,
  compare__1,
  equal__1
];
var symbol__5 = Int_replace_polymorphic_compare[1];
var symbol__6 = Int_replace_polymorphic_compare[2];
var symbol__7 = Int_replace_polymorphic_compare[3];
var symbol__8 = Int_replace_polymorphic_compare[4];
var symbol__9 = Int_replace_polymorphic_compare[5];
var symbol__10 = Int_replace_polymorphic_compare[6];
var compare__2 = Int_replace_polymorphic_compare[7];
var equal__2 = Int_replace_polymorphic_compare[8];
var max__0 = Int_replace_polymorphic_compare[9];
var min__0 = Int_replace_polymorphic_compare[10];
var Js_of_ocaml_Import = [
  0,
  Poly,
  Int_replace_polymorphic_compare,
  String,
  Char,
  symbol__5,
  symbol__6,
  symbol__7,
  symbol__8,
  symbol__9,
  symbol__10,
  compare__2,
  equal__2,
  max__0,
  min__0
];

module.exports = Js_of_ocaml_Import;

/*::type Exports = {
  Poly: any,
  Int_replace_polymorphic_compare: any,
  String: any,
  Char: any,
  symbol: any,
  compare: any,
  equal: any,
  max: any,
  min: any,
}*/
/** @type {{
  Poly: any,
  Int_replace_polymorphic_compare: any,
  String: any,
  Char: any,
  symbol: any,
  compare: any,
  equal: any,
  max: any,
  min: any,
}} */
module.exports = ((module.exports /*:: : any*/) /*:: :Exports */);
module.exports.Poly = module.exports[1];
module.exports.Int_replace_polymorphic_compare = module.exports[2];
module.exports.String = module.exports[3];
module.exports.Char = module.exports[4];
module.exports.symbol = module.exports[5];
module.exports.compare = module.exports[11];
module.exports.equal = module.exports[12];
module.exports.max = module.exports[13];
module.exports.min = module.exports[14];

/* Hashing disabled */
