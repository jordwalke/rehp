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
var caml_new_string = runtime["caml_new_string"];
var caml_wrap_exception = runtime["caml_wrap_exception"];

function caml_call1(f, a0) {
  return f.length == 1 ? f(a0) : runtime["caml_call_gen"](f, [a0]);
}

function caml_call2(f, a0, a1) {
  return f.length == 2 ? f(a0, a1) : runtime["caml_call_gen"](f, [a0,a1]);
}

var global_data = runtime["caml_get_global_data"]();
var cst_The_variable_v_should_not_conflict_with_any_other_variables_in_scope = caml_new_string(
  "The variable v_ should not conflict with any other variables in scope"
);
var greeting = caml_new_string("hello world");
var greeting__0 = caml_new_string("hello world with unicode: \xc9\x8a");
var cst_String_length_should_be_two = caml_new_string(
  'String.length("\xc9\x8a") should be two:'
);
var cst_1 = caml_new_string("-1");
var cst_6 = caml_new_string("-6");
var cst_1__0 = caml_new_string("1");
var cst_6__0 = caml_new_string("6");
var cst_as_df = caml_new_string("as_df");
var cst_index_from_string_with_char = caml_new_string(
  "index from string with char: "
);
var cst_asdf = caml_new_string("asdf");
var cst_index_from_string_without_char = caml_new_string(
  "index from string without char: "
);
var cst_Prints_seven = caml_new_string("Prints seven:");
var cst_Prints_six = caml_new_string("Prints six:");
var cst_Prints_six__0 = caml_new_string("Prints six:");
var cst_6__1 = caml_new_string("6");
var cst_Reason_is_on = caml_new_string("Reason is on \xf0\x9f\x94\xa5");
var cst_trimmed_string = caml_new_string(" trimmed string ");
var cst_tmp = caml_new_string("tmp");
var cst_WHEREAMI = caml_new_string("WHEREAMI");
var cst_Properly_caught_invalid_string_to_int_conversion = caml_new_string(
  "Properly caught invalid string to int conversion."
);
var cst_Did_not_properly_catch_Failure_exception = caml_new_string(
  "Did not properly catch Failure exception"
);
var cst_20 = caml_new_string("20");
var cst_Properly_caught_conversion_from_string_20_to_int = caml_new_string(
  "Properly caught conversion from string '20' to int "
);
var cst_Did_not_properly_catch_conversion_from_string_to_int = caml_new_string(
  "Did not properly catch conversion from string to int"
);
var cst_ARE_T = caml_new_string("ARE == T: ");
var cst_ARE_F = caml_new_string("ARE === F: ");
var cst_Nans_are_should_output_true = caml_new_string(
  "Nans are === (should output true):"
);
var cst_Nans_are_should_output_false = caml_new_string(
  "Nans are == (should output false):"
);
var Pervasives = global_data["Pervasives"];
var String = global_data["String_"];
var Not_found = global_data["Not_found"];
var StringHelper = global_data["StringHelper"];
var Failure = global_data["Failure"];
var r = [0,1,[0,2,[0,3,[0,4,0]]]];
var s = [0,1,[0,2,[0,3,[0,4,0]]]];

caml_call1(Pervasives[34], greeting);

caml_call1(Pervasives[34], greeting__0);

var a = caml_call1(Pervasives[21], 2);
var b = caml_call2(Pervasives[16], cst_String_length_should_be_two, a);

caml_call1(Pervasives[34], b);

var c = caml_call2(String[1], 1, 138);
var d = caml_call2(String[1], 1, 201);
var e = caml_call2(Pervasives[16], d, c);

caml_call1(Pervasives[34], e);

caml_int_of_string(cst_1);

var negativeOne = caml_int_of_string(cst_6);
var one = caml_int_of_string(cst_1__0);
var six = caml_int_of_string(cst_6__0);
var index = caml_call2(String[14], cst_as_df, 95);
var f = caml_call1(Pervasives[21], index);
var g = caml_call2(Pervasives[16], cst_index_from_string_with_char, f);

caml_call1(Pervasives[34], g);

var unicodeLength = 2;

try {var D = caml_call2(String[14], cst_asdf, 95);var index__0 = D;}
catch(G) {
  G = caml_wrap_exception(G);
  if (G !== Not_found) {
    throw runtime["caml_wrap_thrown_exception_reraise"](G);
  }
  var h = -1;
  var index__0 = h;
}

var i = caml_call1(Pervasives[21], index__0);
var j = caml_call2(Pervasives[16], cst_index_from_string_without_char, i);

caml_call1(Pervasives[34], j);

caml_call1(Pervasives[32], index__0);

caml_call1(Pervasives[34], cst_Prints_seven);

caml_call1(Pervasives[32], one + six | 0);

caml_call1(Pervasives[35], 0);

caml_call1(Pervasives[34], cst_Prints_six);

caml_call1(Pervasives[32], six);

caml_call1(Pervasives[35], 0);

caml_call1(Pervasives[34], cst_Prints_six__0);

caml_call1(Pervasives[30], cst_6__1);

caml_call1(Pervasives[35], 0);

caml_call1(Pervasives[34], StringHelper[1]);

caml_call1(Pervasives[34], cst_Reason_is_on);

var k = caml_call1(String[12], cst_trimmed_string);

caml_call1(Pervasives[34], k);

function createIntFromString(ss) {return caml_int_of_string(ss);}

function myFunction(cst_The_variable_v_should_not_conflict_with_any_other_variables_in_scope__0) {
  caml_call1(
    Pervasives[30],
    cst_The_variable_v_should_not_conflict_with_any_other_variables_in_scope
  );
  return caml_call1(Pervasives[35], 0);
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
  caml_call1(
    Pervasives[30],
    cst_Properly_caught_invalid_string_to_int_conversion
  );
  caml_call1(Pervasives[35], 0);
}
else caml_call1(Pervasives[2], cst_Did_not_properly_catch_Failure_exception);

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
  var p = caml_call1(Pervasives[21], o);
  var q = caml_call2(
    Pervasives[16],
    cst_Properly_caught_conversion_from_string_20_to_int,
    p
  );
  caml_call1(Pervasives[30], q);
  caml_call1(Pervasives[35], 0);
}
else caml_call1(
  Pervasives[2],
  cst_Did_not_properly_catch_conversion_from_string_to_int
);

var one__0 = [0,r];
var two = [0,s];
var t = caml_call1(Pervasives[18], runtime["caml_equal"](one__0, two));
var u = caml_call2(Pervasives[16], cst_ARE_T, t);

caml_call1(Pervasives[30], u);

caml_call1(Pervasives[35], 0);

var v = caml_call1(Pervasives[18], one__0 === two ? 1 : 0);
var w = caml_call2(Pervasives[16], cst_ARE_F, v);

caml_call1(Pervasives[30], w);

caml_call1(Pervasives[35], 0);

var n__0 = Pervasives[12];
var anotherName = Pervasives[12];
var x = caml_call1(Pervasives[18], n__0 === anotherName ? 1 : 0);
var y = caml_call2(Pervasives[16], cst_Nans_are_should_output_true, x);

caml_call1(Pervasives[30], y);

caml_call1(Pervasives[35], 0);

var z = caml_call1(Pervasives[18], n__0 === anotherName ? 1 : 0);
var A = caml_call2(Pervasives[16], cst_Nans_are_should_output_false, z);

caml_call1(Pervasives[30], A);

caml_call1(Pervasives[35], 0);

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