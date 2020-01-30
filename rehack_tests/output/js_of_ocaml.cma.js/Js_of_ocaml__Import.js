/**
 * @flow strict
 * Js_of_ocaml__Import
 */

// @ts-check


"use strict";

var runtime = require("../runtime/runtime.js");
var String = require("../stdlib.cma.js/String.js");
var Char = require("../stdlib.cma.js/Char.js");
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
var compare__0 = String[33];
var split_on_char = String[35];

function equal__0(x, y) {return runtime["caml_string_equal"](x, y);}

var String__0 = [
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
  equal__0
];
var chr = Char[1];
var escaped__0 = Char[2];
var lowercase__0 = Char[3];
var uppercase__0 = Char[4];
var lowercase_ascii__0 = Char[5];
var uppercase_ascii__0 = Char[6];
var compare__1 = Char[7];

function equal__1(x, y) {return x === y ? 1 : 0;}

var Char__0 = [
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
var Js_of_ocaml_Import = [
  0,
  Poly,
  Int_replace_polymorphic_compare,
  String__0,
  Char__0,
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

module.exports = Js_of_ocaml_Import;

/*::type Exports = {
  Poly: any,
  Int_replace_polymorphic_compare: any,
  String: any,
  Char: any,
  symbol: (x: any, y: any) => any,
  compare: (x: any, y: any) => any,
  equal: (x: any, y: any) => any,
  max: (x: any, y: any) => any,
  min: (x: any, y: any) => any,
}*/
/** @type {{
  Poly: any,
  Int_replace_polymorphic_compare: any,
  String: any,
  Char: any,
  symbol: (x: any, y: any) => any,
  compare: (x: any, y: any) => any,
  equal: (x: any, y: any) => any,
  max: (x: any, y: any) => any,
  min: (x: any, y: any) => any,
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
