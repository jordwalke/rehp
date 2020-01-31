/**
 * @flow strict
 * Strings
 */

// @ts-check


"use strict";

var runtime = require("../runtime/runtime.js");
var caml_int_of_string = runtime["caml_int_of_string"];
var string = runtime["caml_new_string"];
var caml_wrap_thrown_exception_reraise = runtime
 ["caml_wrap_thrown_exception_reraise"];

function call1(f, a0) {
  return f.length === 1 ? f(a0) : runtime["caml_call_gen"](f, [a0]);
}

function call2(f, a0, a1) {
  return f.length === 2 ? f(a0, a1) : runtime["caml_call_gen"](f, [a0,a1]);
}

var cst_The_variable_v_should_not_conflict_with_any_other_variables_in_scope = string(
  "The variable v_ should not conflict with any other variables in scope"
);
var greeting = string("hello world");
var greeting__0 = string("hello world with unicode: \xc9\x8a");
var cst_String_length_should_be_two = string(
  'String.length("\xc9\x8a") should be two:'
);
var cst_1 = string("-1");
var cst_6 = string("-6");
var cst_1__0 = string("1");
var cst_6__0 = string("6");
var cst_as_df = string("as_df");
var cst_index_from_string_with_char = string("index from string with char: ");
var cst_asdf = string("asdf");
var cst_index_from_string_without_char = string(
  "index from string without char: "
);
var cst_Prints_seven = string("Prints seven:");
var cst_Prints_six = string("Prints six:");
var cst_Prints_six__0 = string("Prints six:");
var cst_6__1 = string("6");
var cst_Reason_is_on = string("Reason is on \xf0\x9f\x94\xa5");
var cst_trimmed_string = string(" trimmed string ");
var cst_tmp = string("tmp");
var cst_WHEREAMI = string("WHEREAMI");
var cst_Properly_caught_invalid_string_to_int_conversion = string(
  "Properly caught invalid string to int conversion."
);
var cst_Did_not_properly_catch_Failure_exception = string(
  "Did not properly catch Failure exception"
);
var cst_20 = string("20");
var cst_Properly_caught_conversion_from_string_20_to_int = string(
  "Properly caught conversion from string '20' to int "
);
var cst_Did_not_properly_catch_conversion_from_string_to_int = string(
  "Did not properly catch conversion from string to int"
);
var cst_ARE_T = string("ARE == T: ");
var cst_ARE_F = string("ARE === F: ");
var cst_Nans_are_should_output_true = string(
  "Nans are === (should output true):"
);
var cst_Nans_are_should_output_false = string(
  "Nans are == (should output false):"
);
var Pervasives = require("Pervasives.js");
var String = require("String_.js");
var Not_found = require("Not_found.js");
var StringHelper = require("StringHelper.js");
var Failure = require("Failure.js");
var r_ = [0,1,[0,2,[0,3,[0,4,0]]]];
var s_ = [0,1,[0,2,[0,3,[0,4,0]]]];

call1(Pervasives[34], greeting);

call1(Pervasives[34], greeting__0);

var a_ = call1(Pervasives[21], 2);
var b_ = call2(Pervasives[16], cst_String_length_should_be_two, a_);

call1(Pervasives[34], b_);

var c_ = call2(String[1], 1, 138);
var d_ = call2(String[1], 1, 201);
var e_ = call2(Pervasives[16], d_, c_);

call1(Pervasives[34], e_);

caml_int_of_string(cst_1);

var negativeOne = caml_int_of_string(cst_6);
var one = caml_int_of_string(cst_1__0);
var six = caml_int_of_string(cst_6__0);
var index = call2(String[14], cst_as_df, 95);
var f_ = call1(Pervasives[21], index);
var g_ = call2(Pervasives[16], cst_index_from_string_with_char, f_);

call1(Pervasives[34], g_);

var unicodeLength = 2;

try {var D_ = call2(String[14], cst_asdf, 95);var index__0 = D_;}
catch(G_) {
  G_ = runtime["caml_wrap_exception"](G_);
  if (G_ !== Not_found) {throw caml_wrap_thrown_exception_reraise(G_);}
  var h_ = -1;
  var index__0 = h_;
}

var i_ = call1(Pervasives[21], index__0);
var j_ = call2(Pervasives[16], cst_index_from_string_without_char, i_);

call1(Pervasives[34], j_);

call1(Pervasives[32], index__0);

call1(Pervasives[34], cst_Prints_seven);

call1(Pervasives[32], one + six | 0);

call1(Pervasives[35], 0);

call1(Pervasives[34], cst_Prints_six);

call1(Pervasives[32], six);

call1(Pervasives[35], 0);

call1(Pervasives[34], cst_Prints_six__0);

call1(Pervasives[30], cst_6__1);

call1(Pervasives[35], 0);

call1(Pervasives[34], StringHelper[1]);

call1(Pervasives[34], cst_Reason_is_on);

var k_ = call1(String[12], cst_trimmed_string);

call1(Pervasives[34], k_);

function createIntFromString(ss) {return caml_int_of_string(ss);}

function myFunction(cst_The_variable_v_should_not_conflict_with_any_other_variables_in_scope__0) {
  call1(
    Pervasives[30],
    cst_The_variable_v_should_not_conflict_with_any_other_variables_in_scope
  );
  return call1(Pervasives[35], 0);
}

myFunction(cst_tmp);

try {var C_ = createIntFromString(cst_WHEREAMI);var m_ = C_;}
catch(F_) {
  F_ = runtime["caml_wrap_exception"](F_);
  if (F_[1] !== Failure) {throw caml_wrap_thrown_exception_reraise(F_);}
  var l_ = 102;
  var m_ = l_;
}

if (102 === m_) {
  call1(Pervasives[30], cst_Properly_caught_invalid_string_to_int_conversion);
  call1(Pervasives[35], 0);
}
else call1(Pervasives[2], cst_Did_not_properly_catch_Failure_exception);

try {var B_ = createIntFromString(cst_20);var o_ = B_;}
catch(E_) {
  E_ = runtime["caml_wrap_exception"](E_);
  if (E_[1] !== Failure) {throw caml_wrap_thrown_exception_reraise(E_);}
  var n_ = 102;
  var o_ = n_;
}

if (20 === o_) {
  var p_ = call1(Pervasives[21], o_);
  var q_ = call2(
    Pervasives[16],
    cst_Properly_caught_conversion_from_string_20_to_int,
    p_
  );
  call1(Pervasives[30], q_);
  call1(Pervasives[35], 0);
}
else call1(
  Pervasives[2],
  cst_Did_not_properly_catch_conversion_from_string_to_int
);

var myRefCell = [0,0];
var myRefCellContents = myRefCell[1];
var one__0 = [0,r_];
var two = [0,s_];
var t_ = call1(Pervasives[18], runtime["caml_equal"](one__0, two));
var u_ = call2(Pervasives[16], cst_ARE_T, t_);

call1(Pervasives[30], u_);

call1(Pervasives[35], 0);

var v_ = call1(Pervasives[18], one__0 === two ? 1 : 0);
var w_ = call2(Pervasives[16], cst_ARE_F, v_);

call1(Pervasives[30], w_);

call1(Pervasives[35], 0);

var n = Pervasives[12];
var anotherName = Pervasives[12];
var x_ = call1(Pervasives[18], n === anotherName ? 1 : 0);
var y_ = call2(Pervasives[16], cst_Nans_are_should_output_true, x_);

call1(Pervasives[30], y_);

call1(Pervasives[35], 0);

var z_ = call1(Pervasives[18], n === anotherName ? 1 : 0);
var A_ = call2(Pervasives[16], cst_Nans_are_should_output_false, z_);

call1(Pervasives[30], A_);

call1(Pervasives[35], 0);

var Strings = [
  0,
  greeting__0,
  unicodeLength,
  negativeOne,
  six,
  index__0,
  createIntFromString,
  myFunction,
  o_,
  myRefCell,
  myRefCellContents,
  one__0,
  two,
  n,
  anotherName
];

module.exports = Strings;

/*::type Exports = {
  greeting: any,
  unicodeLength: any,
  negativeOne: any,
  six: any,
  index: any,
  createIntFromString: (ss: any) => any,
  myFunction: (cst_The_variable_v_should_not_conflict_with_any_other_variables_in_scope: any) => any,
  i: any,
  myRefCell: any,
  myRefCellContents: any,
  one: any,
  two: any,
  n: any,
  anotherName: any,
}*/
/** @type {{
  greeting: any,
  unicodeLength: any,
  negativeOne: any,
  six: any,
  index: any,
  createIntFromString: (ss: any) => any,
  myFunction: (cst_The_variable_v_should_not_conflict_with_any_other_variables_in_scope: any) => any,
  i: any,
  myRefCell: any,
  myRefCellContents: any,
  one: any,
  two: any,
  n: any,
  anotherName: any,
}} */
module.exports = ((module.exports /*:: : any*/) /*:: :Exports */);
module.exports.greeting = module.exports[1];
module.exports.unicodeLength = module.exports[2];
module.exports.negativeOne = module.exports[3];
module.exports.six = module.exports[4];
module.exports.index = module.exports[5];
module.exports.createIntFromString = module.exports[6];
module.exports.myFunction = module.exports[7];
module.exports.i = module.exports[8];
module.exports.myRefCell = module.exports[9];
module.exports.myRefCellContents = module.exports[10];
module.exports.one = module.exports[11];
module.exports.two = module.exports[12];
module.exports.n = module.exports[13];
module.exports.anotherName = module.exports[14];

/* Hashing disabled */
