/**
 * Main executable compiled output. Runtime included in compilation output.
 */

"use strict";

let joo_global_object = typeof global !== 'undefined' ? global : window;


var runtime = require("runtime.js");

var caml_blit_string = runtime["caml_blit_string"];
var caml_bytes_unsafe_get = runtime["caml_bytes_unsafe_get"];
var caml_create_bytes = runtime["caml_create_bytes"];
var caml_fresh_oo_id = runtime["caml_fresh_oo_id"];
var caml_int_of_string = runtime["caml_int_of_string"];
var caml_ml_bytes_length = runtime["caml_ml_bytes_length"];
var caml_ml_flush = runtime["caml_ml_flush"];
var caml_ml_open_descriptor_out = runtime["caml_ml_open_descriptor_out"];
var caml_ml_output_char = runtime["caml_ml_output_char"];
var caml_ml_string_length = runtime["caml_ml_string_length"];
var string = runtime["caml_new_string"];
var caml_register_global = runtime["caml_register_global"];
var caml_string_of_bytes = runtime["caml_string_of_bytes"];
var caml_string_unsafe_get = runtime["caml_string_unsafe_get"];
var caml_wrap_thrown_exception = runtime["caml_wrap_thrown_exception"];
var caml_wrap_thrown_exception_reraise = runtime
 ["caml_wrap_thrown_exception_reraise"];
var Out_of_memory = [248,string("Out_of_memory"),-1];
var Sys_error = [248,string("Sys_error"),-2];
var Failure = [248,string("Failure"),-3];
var Invalid_argument = [248,string("Invalid_argument"),-4];
var End_of_file = [248,string("End_of_file"),-5];
var Division_by_zero = [248,string("Division_by_zero"),-6];
var Not_found = [248,string("Not_found"),-7];
var Match_failure = [248,string("Match_failure"),-8];
var Stack_overflow = [248,string("Stack_overflow"),-9];
var Sys_blocked_io = [248,string("Sys_blocked_io"),-10];
var Assert_failure = [248,string("Assert_failure"),-11];
var Undefined_recursive_module = [248,string("Undefined_recursive_module"),-12
];
var helperVal = string("hello");
var greeting = string("hello world");
var greeting__0 = string("hello world with unicode: \xc9\x8a");

caml_register_global(
  11,
  Undefined_recursive_module,
  "Undefined_recursive_module"
);

caml_register_global(10, Assert_failure, "Assert_failure");

caml_register_global(9, Sys_blocked_io, "Sys_blocked_io");

caml_register_global(8, Stack_overflow, "Stack_overflow");

caml_register_global(7, Match_failure, "Match_failure");

caml_register_global(6, Not_found, "Not_found");

caml_register_global(5, Division_by_zero, "Division_by_zero");

caml_register_global(4, End_of_file, "End_of_file");

caml_register_global(3, Invalid_argument, "Invalid_argument");

caml_register_global(2, Failure, "Failure");

caml_register_global(1, Sys_error, "Sys_error");

caml_register_global(0, Out_of_memory, "Out_of_memory");

var b_ = string("true");
var c_ = string("false");
var a_ = [255,1,0,32752];
var d_ = string("String.sub / Bytes.sub");
var e_ = string("");
var v_ = string(
  "The variable v_ should not conflict with any other variables in scope"
);
var f_ = string('String.length("\xc9\x8a") should be two:');
var h_ = string("-1");
var i_ = string("-6");
var j_ = string("1");
var k_ = string("6");
var l_ = string("as_df");
var m_ = string("index from string with char: ");
var P_ = string("asdf");
var o_ = string("index from string without char: ");
var p_ = string("Prints seven:");
var q_ = string("Prints six:");
var r_ = string("Prints six:");
var s_ = string("6");
var t_ = string("Reason is on \xf0\x9f\x94\xa5");
var u_ = string(" trimmed string ");
var w_ = string("tmp");
var N_ = string("WHEREAMI");
var z_ = string("Properly caught invalid string to int conversion.");
var M_ = string("Did not properly catch Failure exception");
var K_ = string("20");
var C_ = string("Properly caught conversion from string '20' to int ");
var J_ = string("Did not properly catch conversion from string to int");
var D_ = [0,1,[0,2,[0,3,[0,4,0]]]];
var E_ = [0,1,[0,2,[0,3,[0,4,0]]]];
var F_ = string("ARE == T: ");
var G_ = string("ARE === F: ");
var H_ = string("Nans are === (should output true):");
var I_ = string("Nans are == (should output false):");

function failwith(s) {throw caml_wrap_thrown_exception([0,Failure,s]);}

function invalid_arg(s) {
  throw caml_wrap_thrown_exception([0,Invalid_argument,s]);
}

caml_fresh_oo_id(0);

var anotherName = runtime["caml_int64_float_of_bits"](a_);

function symbol(s1, s2) {
  var l1 = caml_ml_string_length(s1);
  var l2 = caml_ml_string_length(s2);
  var s = caml_create_bytes(l1 + l2 | 0);
  caml_blit_string(s1, 0, s, 0, l1);
  caml_blit_string(s2, 0, s, l1, l2);
  return caml_string_of_bytes(s);
}

function string_of_bool(b) {return b ? b_ : c_;}

function string_of_int(n) {return string("" + n);}

runtime["caml_ml_open_descriptor_in"](0);

var stdout = caml_ml_open_descriptor_out(1);

caml_ml_open_descriptor_out(2);

function flush_all(param) {
  function iter(param) {
    var param__0 = param;
    for (; ; ) {
      if (param__0) {
        var l = param__0[2];
        var a = param__0[1];
        try {caml_ml_flush(a);}
        catch(Y_) {
          Y_ = runtime["caml_wrap_exception"](Y_);
          if (Y_[1] !== Sys_error) {
            throw caml_wrap_thrown_exception_reraise(Y_);
          }
        }
        var param__0 = l;
        continue;
      }
      return 0;
    }
  }
  return iter(runtime["caml_ml_out_channels_list"](0));
}

function output_string(oc, s) {
  return runtime["caml_ml_output"](oc, s, 0, caml_ml_string_length(s));
}

function print_string(s) {return output_string(stdout, s);}

function print_int(i) {return output_string(stdout, string_of_int(i));}

function print_endline(s) {
  output_string(stdout, s);
  caml_ml_output_char(stdout, 10);
  return caml_ml_flush(stdout);
}

function print_newline(param) {
  caml_ml_output_char(stdout, 10);
  return caml_ml_flush(stdout);
}

function do_at_exit(param) {return flush_all(0);}

runtime["caml_sys_executable_name"](0);

caml_fresh_oo_id(0);

function make(n, c) {
  var s = caml_create_bytes(n);
  runtime["caml_fill_bytes"](s, 0, n, c);
  return s;
}

var empty = caml_create_bytes(0);

function sub(s, ofs, len) {
  if (0 <= ofs) {
    if (0 <= len) {
      if (! ((caml_ml_bytes_length(s) - len | 0) < ofs)) {
        var r = caml_create_bytes(len);
        runtime["caml_blit_bytes"](s, ofs, r, 0, len);
        return r;
      }
    }
  }
  return invalid_arg(d_);
}

function is_space(param) {
  var X_ = param + -9 | 0;
  var switch__0 = 4 < X_ >>> 0 ? 23 === X_ ? 1 : 0 : 2 === X_ ? 0 : 1;
  return switch__0 ? 1 : 0;
}

function trim(s) {
  var len = caml_ml_bytes_length(s);
  var i = [0,0];
  for (; ; ) {
    if (i[1] < len) {
      if (is_space(caml_bytes_unsafe_get(s, i[1]))) {i[1] += 1;continue;}
    }
    var j = [0,len + -1 | 0];
    for (; ; ) {
      if (i[1] <= j[1]) {
        if (is_space(caml_bytes_unsafe_get(s, j[1]))) {j[1] += -1;continue;}
      }
      return i[1] <= j[1] ? sub(s, i[1], (j[1] - i[1] | 0) + 1 | 0) : empty;
    }
  }
}

function bos(W_) {return runtime["caml_bytes_of_string"](W_);}

function bts(V_) {return caml_string_of_bytes(V_);}

function make__0(n, c) {return bts(make(n, c));}

function is_space__0(param) {
  var U_ = param + -9 | 0;
  var switch__0 = 4 < U_ >>> 0 ? 23 === U_ ? 1 : 0 : 2 === U_ ? 0 : 1;
  return switch__0 ? 1 : 0;
}

function trim__0(s) {
  if (runtime["caml_string_equal"](s, e_)) {return s;}
  if (! is_space__0(caml_string_unsafe_get(s, 0))) {
    if (
    !
    is_space__0(caml_string_unsafe_get(s, caml_ml_string_length(s) + -1 | 0))
    ) {return s;}
  }
  return bts(trim(bos(s)));
}

function index_rec(s, lim, i, c) {
  var i__0 = i;
  for (; ; ) {
    if (lim <= i__0) {throw caml_wrap_thrown_exception(Not_found);}
    if (caml_string_unsafe_get(s, i__0) === c) {return i__0;}
    var i__1 = i__0 + 1 | 0;
    var i__0 = i__1;
    continue;
  }
}

function index(s, c) {return index_rec(s, caml_ml_string_length(s), 0, c);}

print_endline(greeting);

print_endline(greeting__0);

print_endline(symbol(f_, string_of_int(2)));

var g_ = make__0(1, 138);

print_endline(symbol(make__0(1, 201), g_));

caml_int_of_string(h_);

caml_int_of_string(i_);

var one = caml_int_of_string(j_);
var six = caml_int_of_string(k_);
var index__0 = index(l_, 95);

print_endline(symbol(m_, string_of_int(index__0)));

try {var Q_ = index(P_, 95);var index__1 = Q_;}
catch(T_) {
  T_ = runtime["caml_wrap_exception"](T_);
  if (T_ !== Not_found) {throw caml_wrap_thrown_exception_reraise(T_);}
  var n_ = -1;
  var index__1 = n_;
}

print_endline(symbol(o_, string_of_int(index__1)));

print_int(index__1);

print_endline(p_);

print_int(one + six | 0);

print_newline(0);

print_endline(q_);

print_int(six);

print_newline(0);

print_endline(r_);

print_string(s_);

print_newline(0);

print_endline(helperVal);

print_endline(t_);

print_endline(trim__0(u_));

function createIntFromString(ss) {return caml_int_of_string(ss);}

function myFunction(cst_The_variable_v_should_not_conflict_with_any_other_variables_in_scope) {
  print_string(v_);
  return print_newline(0);
}

myFunction(w_);

try {var O_ = createIntFromString(N_);var y_ = O_;}
catch(S_) {
  S_ = runtime["caml_wrap_exception"](S_);
  if (S_[1] !== Failure) {throw caml_wrap_thrown_exception_reraise(S_);}
  var x_ = 102;
  var y_ = x_;
}

if (102 === y_) {
  print_string(z_);
  print_newline(0);
}
else failwith(M_);

try {var L_ = createIntFromString(K_);var B_ = L_;}
catch(R_) {
  R_ = runtime["caml_wrap_exception"](R_);
  if (R_[1] !== Failure) {throw caml_wrap_thrown_exception_reraise(R_);}
  var A_ = 102;
  var B_ = A_;
}

if (20 === B_) {
  print_string(symbol(C_, string_of_int(B_)));
  print_newline(0);
}
else failwith(J_);

var one__0 = [0,D_];
var two = [0,E_];

print_string(symbol(F_, string_of_bool(runtime["caml_equal"](one__0, two))));

print_newline(0);

print_string(symbol(G_, string_of_bool(one__0 === two ? 1 : 0)));

print_newline(0);

print_string(symbol(H_, string_of_bool(anotherName === anotherName ? 1 : 0)));

print_newline(0);

print_string(symbol(I_, string_of_bool(anotherName === anotherName ? 1 : 0)));

print_newline(0);

do_at_exit(0);

