/**
 * Strings
 * @providesModule Strings
 */
"use strict";
var Pervasives = require('Pervasives.js');
var String_ = require('String_.js');
var StringHelper = require('StringHelper.js');
var Failure = require('Failure.js');
var Not_found = require('Not_found.js');
var runtime = require('runtime.js');

let joo_global_object = global;


var runtime = joo_global_object.jsoo_runtime;
var caml_int_of_string = runtime["caml_int_of_string"];
var string = runtime["caml_new_string"];
var caml_wrap_exception = runtime["caml_wrap_exception"];

function call1(f, a0) {
  return f.length === 1 ? f(a0) : runtime["caml_call_gen"](f, [a0]);
}

function call2(f, a0, a1) {
  return f.length === 2 ? f(a0, a1) : runtime["caml_call_gen"](f, [a0,a1]);
}

var global_data = runtime["caml_get_global_data"]();
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
var Pervasives = global_data["Pervasives"];
var String = global_data["String_"];
var Not_found = global_data["Not_found"];
var StringHelper = global_data["StringHelper"];
var Failure = global_data["Failure"];
var r = [0,1,[0,2,[0,3,[0,4,0]]]];
var s = [0,1,[0,2,[0,3,[0,4,0]]]];

call1(Pervasives[34], greeting);

call1(Pervasives[34], greeting__0);

var a = call1(Pervasives[21], 2);
var b = call2(Pervasives[16], cst_String_length_should_be_two, a);

call1(Pervasives[34], b);

var c = call2(String[1], 1, 138);
var d = call2(String[1], 1, 201);
var e = call2(Pervasives[16], d, c);

call1(Pervasives[34], e);

caml_int_of_string(cst_1);

var negativeOne = caml_int_of_string(cst_6);
var one = caml_int_of_string(cst_1__0);
var six = caml_int_of_string(cst_6__0);
var index = call2(String[14], cst_as_df, 95);
var f = call1(Pervasives[21], index);
var g = call2(Pervasives[16], cst_index_from_string_with_char, f);

call1(Pervasives[34], g);

var unicodeLength = 2;

try {var D = call2(String[14], cst_asdf, 95);var index__0 = D;}
catch(G) {
  G = caml_wrap_exception(G);
  if (G !== Not_found) {
    throw runtime["caml_wrap_thrown_exception_reraise"](G);
  }
  var h = -1;
  var index__0 = h;
}

var i = call1(Pervasives[21], index__0);
var j = call2(Pervasives[16], cst_index_from_string_without_char, i);

call1(Pervasives[34], j);

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

var k = call1(String[12], cst_trimmed_string);

call1(Pervasives[34], k);

function createIntFromString(ss) {return caml_int_of_string(ss);}

function myFunction(cst_The_variable_v_should_not_conflict_with_any_other_variables_in_scope__0) {
  call1(
    Pervasives[30],
    cst_The_variable_v_should_not_conflict_with_any_other_variables_in_scope
  );
  return call1(Pervasives[35], 0);
}

myFunction(cst_tmp);

try {var C = createIntFromString(cst_WHEREAMI);var m = C;}
catch(F) {
  F = caml_wrap_exception(F);
  if (F[1] !== Failure) {
    throw runtime["caml_wrap_thrown_exception_reraise"](F);
  }
  var l = 102;
  var m = l;
}

if (102 === m) {
  call1(Pervasives[30], cst_Properly_caught_invalid_string_to_int_conversion);
  call1(Pervasives[35], 0);
}
else call1(Pervasives[2], cst_Did_not_properly_catch_Failure_exception);

try {var B = createIntFromString(cst_20);var o = B;}
catch(E) {
  E = caml_wrap_exception(E);
  if (E[1] !== Failure) {
    throw runtime["caml_wrap_thrown_exception_reraise"](E);
  }
  var n = 102;
  var o = n;
}

if (20 === o) {
  var p = call1(Pervasives[21], o);
  var q = call2(
    Pervasives[16],
    cst_Properly_caught_conversion_from_string_20_to_int,
    p
  );
  call1(Pervasives[30], q);
  call1(Pervasives[35], 0);
}
else call1(
  Pervasives[2],
  cst_Did_not_properly_catch_conversion_from_string_to_int
);

var one__0 = [0,r];
var two = [0,s];
var t = call1(Pervasives[18], runtime["caml_equal"](one__0, two));
var u = call2(Pervasives[16], cst_ARE_T, t);

call1(Pervasives[30], u);

call1(Pervasives[35], 0);

var v = call1(Pervasives[18], one__0 === two ? 1 : 0);
var w = call2(Pervasives[16], cst_ARE_F, v);

call1(Pervasives[30], w);

call1(Pervasives[35], 0);

var n__0 = Pervasives[12];
var anotherName = Pervasives[12];
var x = call1(Pervasives[18], n__0 === anotherName ? 1 : 0);
var y = call2(Pervasives[16], cst_Nans_are_should_output_true, x);

call1(Pervasives[30], y);

call1(Pervasives[35], 0);

var z = call1(Pervasives[18], n__0 === anotherName ? 1 : 0);
var A = call2(Pervasives[16], cst_Nans_are_should_output_false, z);

call1(Pervasives[30], A);

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
  o,
  one__0,
  two,
  n__0,
  anotherName
];

runtime["caml_register_global"](39, Strings, "Strings");


module.exports = global.jsoo_runtime.caml_get_global_data().Strings;
