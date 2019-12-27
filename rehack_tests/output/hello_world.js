var runtime = joo_global_object.jsoo_runtime;

var caml_ml_flush = runtime["caml_ml_flush"];
var caml_ml_open_descriptor_out = runtime["caml_ml_open_descriptor_out"];
var string = runtime["caml_new_string"];
var caml_register_global = runtime["caml_register_global"];
var caml_wrap_thrown_exception_reraise =
  runtime["caml_wrap_thrown_exception_reraise"];
var Out_of_memory = [248, string("Out_of_memory"), -1];
var Sys_error = [248, string("Sys_error"), -2];
var Failure = [248, string("Failure"), -3];
var Invalid_argument = [248, string("Invalid_argument"), -4];
var End_of_file = [248, string("End_of_file"), -5];
var Division_by_zero = [248, string("Division_by_zero"), -6];
var Not_found = [248, string("Not_found"), -7];
var Match_failure = [248, string("Match_failure"), -8];
var Stack_overflow = [248, string("Stack_overflow"), -9];
var Sys_blocked_io = [248, string("Sys_blocked_io"), -10];
var Assert_failure = [248, string("Assert_failure"), -11];
var Undefined_recursive_module = [
  248,
  string("Undefined_recursive_module"),
  -12
];

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

var a_ = string("hello world");

runtime["caml_fresh_oo_id"](0);

runtime["caml_ml_open_descriptor_in"](0);

var stdout = caml_ml_open_descriptor_out(1);

caml_ml_open_descriptor_out(2);

function flush_all(param) {
  function iter(param) {
    var param__0 = param;
    for (;;) {
      if (param__0) {
        var l = param__0[2];
        var a = param__0[1];
        try {
          caml_ml_flush(a);
        } catch (b_) {
          b_ = runtime["caml_wrap_exception"](b_);
          if (b_[1] !== Sys_error) {
            throw caml_wrap_thrown_exception_reraise(b_);
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
  return runtime["caml_ml_output"](
    oc,
    s,
    0,
    runtime["caml_ml_string_length"](s)
  );
}

function print_endline(s) {
  output_string(stdout, s);
  runtime["caml_ml_output_char"](stdout, 10);
  return caml_ml_flush(stdout);
}

function do_at_exit(param) {
  return flush_all(0);
}

print_endline(a_);

do_at_exit(0);
