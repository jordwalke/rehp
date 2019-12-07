/**
 * Uchar
 * @providesModule Uchar
 */
"use strict";
var Pervasives = require('Pervasives.js');
var runtime = require('runtime.js');

let joo_global_object = global;


var runtime = joo_global_object.jsoo_runtime;
var caml_format_int = runtime["caml_format_int"];
var string = runtime["caml_new_string"];

function call1(f, a0) {
  return f.length === 1 ? f(a0) : runtime["caml_call_gen"](f, [a0]);
}

function call2(f, a0, a1) {
  return f.length === 2 ? f(a0, a1) : runtime["caml_call_gen"](f, [a0,a1]);
}

var global_data = runtime["caml_get_global_data"]();
var cst_is_not_a_latin1_character = string(" is not a latin1 character");
var cst_04X = string("%04X");
var cst_U = string("U+");
var cst_is_not_an_Unicode_scalar_value = string(
  " is not an Unicode scalar value"
);
var cst_X = string("%X");
var err_no_pred = string("U+0000 has no predecessor");
var err_no_succ = string("U+10FFFF has no successor");
var Pervasives = global_data["Pervasives"];

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

runtime["caml_register_global"](8, Uchar, "Uchar");


module.exports = global.jsoo_runtime.caml_get_global_data().Uchar;
/*____hashes compiler:hashing-disabled inputs:hashing-disabled bytecode:hashing-disabled*/
