/**
 * @flow strict
 * Uchar
 */

// @ts-check


"use strict";
let joo_global_object = typeof global !== 'undefined' ? global : window;
require('runtime.js');

var runtime = joo_global_object.jsoo_runtime;
var caml_format_int = runtime["caml_format_int"];
var string = runtime["caml_new_string"];

function call1(f, a0) {
  return f.length === 1 ? f(a0) : runtime["caml_call_gen"](f, [a0]);
}

function call2(f, a0, a1) {
  return f.length === 2 ? f(a0, a1) : runtime["caml_call_gen"](f, [a0,a1]);
}

var cst_is_not_a_latin1_character = string(" is not a latin1 character");
var cst_04X = string("%04X");
var cst_U = string("U+");
var cst_is_not_an_Unicode_scalar_value = string(
  " is not an Unicode scalar value"
);
var cst_X = string("%X");
var err_no_pred = string("U+0000 has no predecessor");
var err_no_succ = string("U+10FFFF has no successor");
var Pervasives = require("Pervasives.js");

function err_not_sv(i) {
  return call2(
    Pervasives[16],
    caml_format_int(cst_X, i),
    cst_is_not_an_Unicode_scalar_value
  );
}

function err_not_latin1(u) {
  var p_ = call2(
    Pervasives[16],
    caml_format_int(cst_04X, u),
    cst_is_not_a_latin1_character
  );
  return call2(Pervasives[16], cst_U, p_);
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
    u === 1114111 ? call1(Pervasives[1], err_no_succ) : u + 1 | 0;
}

function pred(u) {
  return u === 57344 ?
    lo_bound :
    u === 0 ? call1(Pervasives[1], err_no_pred) : u + -1 | 0;
}

function is_valid(i) {
  var l_ = 0 <= i ? 1 : 0;
  var m_ = l_ ? i <= 55295 ? 1 : 0 : l_;
  if (m_) var n_ = m_;
  else {var o_ = 57344 <= i ? 1 : 0;var n_ = o_ ? i <= 1114111 ? 1 : 0 : o_;}
  return n_;
}

function of_int(i) {
  if (is_valid(i)) {return i;}
  var k_ = err_not_sv(i);
  return call1(Pervasives[1], k_);
}

function is_char(u) {return u < 256 ? 1 : 0;}

function of_char(c) {return c;}

function to_char(u) {
  if (255 < u) {var j_ = err_not_latin1(u);return call1(Pervasives[1], j_);}
  return u;
}

function unsafe_to_char(i_) {return i_;}

function equal(h_, g_) {return h_ === g_ ? 1 : 0;}

function compare(f_, e_) {return runtime["caml_int_compare"](f_, e_);}

function hash(d_) {return d_;}

function a_(c_) {return c_;}

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
  function(b_) {return b_;},
  a_,
  is_char,
  of_char,
  to_char,
  unsafe_to_char,
  equal,
  compare,
  hash
];

exports = Uchar;

/*::type Exports = {
  hash: (unnamed1: any) => any,
  compare: (unnamed1: any, unnamed2: any) => any,
  equal: (unnamed1: any, unnamed2: any) => any,
  unsafe_to_char: (unnamed1: any) => any,
  to_char: (u: any) => any,
  of_char: (c: any) => any,
  is_char: (u: any) => any,
  of_int: (i: any) => any,
  is_valid: (i: any) => any,
  pred: (u: any) => any,
  succ: (u: any) => any,
  rep: any
  bom: any
  max: any
  min: any
}*/
/** @type {{
  hash: (any) => any,
  compare: (any, any) => any,
  equal: (any, any) => any,
  unsafe_to_char: (any) => any,
  to_char: (any) => any,
  of_char: (any) => any,
  is_char: (any) => any,
  of_int: (any) => any,
  is_valid: (any) => any,
  pred: (any) => any,
  succ: (any) => any,
  rep: any,
  bom: any,
  max: any,
  min: any,
}} */
module.exports = ((exports /*:: : any*/) /*:: :Exports */);
module.exports.hash = module.exports[17];
module.exports.compare = module.exports[16];
module.exports.equal = module.exports[15];
module.exports.unsafe_to_char = module.exports[14];
module.exports.to_char = module.exports[13];
module.exports.of_char = module.exports[12];
module.exports.is_char = module.exports[11];
module.exports.of_int = module.exports[8];
module.exports.is_valid = module.exports[7];
module.exports.pred = module.exports[6];
module.exports.succ = module.exports[5];
module.exports.rep = module.exports[4];
module.exports.bom = module.exports[3];
module.exports.max = module.exports[2];
module.exports.min = module.exports[1];

/* Hashing disabled */
