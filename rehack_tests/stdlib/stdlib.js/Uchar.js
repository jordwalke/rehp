/**
 * Uchar
 * @providesModule Uchar
 */
"use strict";
var Pervasives = require('Pervasives.js');
var runtime = require('runtime.js');

let joo_global_object = global;


var runtime = joo_global_object.jsoo_runtime;
var caml_format_int = runtime.caml_format_int;
var caml_new_string = runtime.caml_new_string;

function caml_call1(f, a0) {
  return f.length == 1 ? f(a0) : runtime.caml_call_gen(f, [a0]);
}

function caml_call2(f, a0, a1) {
  return f.length == 2 ? f(a0, a1) : runtime.caml_call_gen(f, [a0,a1]);
}

var global_data = runtime.caml_get_global_data();
var cst_is_not_a_latin1_character = caml_new_string(
  " is not a latin1 character"
);
var cst_04X = caml_new_string("%04X");
var cst_U = caml_new_string("U+");
var cst_is_not_an_Unicode_scalar_value = caml_new_string(
  " is not an Unicode scalar value"
);
var cst_X = caml_new_string("%X");
var err_no_pred = caml_new_string("U+0000 has no predecessor");
var err_no_succ = caml_new_string("U+10FFFF has no successor");
var Pervasives = global_data.Pervasives;

function err_not_sv(i) {
  return caml_call2(
    Pervasives[16],
    caml_format_int(cst_X, i),
    cst_is_not_an_Unicode_scalar_value
  );
}

function err_not_latin1(u) {
  var bi = caml_call2(
    Pervasives[16],
    caml_format_int(cst_04X, u),
    cst_is_not_a_latin1_character
  );
  return caml_call2(Pervasives[16], cst_U, bi);
}

var min = 0;
var max = 1114111;
var lo_bound = 55295;
var hi_bound = 57344;
var bom = 65279;
var rep = 65533;

function succ(u) {
  return u === 55295 ?
    hi_bound :
    u === 1114111 ? caml_call1(Pervasives[1], err_no_succ) : u + 1 | 0;
}

function pred(u) {
  return u === 57344 ?
    lo_bound :
    u === 0 ? caml_call1(Pervasives[1], err_no_pred) : u + -1 | 0;
}

function is_valid(i) {
  var be = 0 <= i ? 1 : 0;
  var bf = be ? i <= 55295 ? 1 : 0 : be;
  if (bf) var bg = bf;
  else {var bh = 57344 <= i ? 1 : 0;var bg = bh ? i <= 1114111 ? 1 : 0 : bh;}
  return bg;
}

function of_int(i) {
  if (is_valid(i)) {return i;}
  var bd = err_not_sv(i);
  return caml_call1(Pervasives[1], bd);
}

function is_char(u) {return u < 256 ? 1 : 0;}

function of_char(c) {return c;}

function to_char(u) {
  if (255 < u) {
    var bc = err_not_latin1(u);
    return caml_call1(Pervasives[1], bc);
  }
  return u;
}

function unsafe_to_char(bb) {return bb;}

function equal(ba, a_) {return ba === a_ ? 1 : 0;}

function compare(a9, a8) {return runtime.caml_int_compare(a9, a8);}

function hash(a7) {return a7;}

function a4(a6) {return a6;}

var Uchar = [
  0,
  min,
  max,
  bom,
  rep,
  succ,
  pred,
  is_valid,
  of_int,
  function(a5) {return a5;},
  a4,
  is_char,
  of_char,
  to_char,
  unsafe_to_char,
  equal,
  compare,
  hash
];

runtime.caml_register_global(8, Uchar, "Uchar");


module.exports = global.jsoo_runtime.caml_get_global_data().Uchar;