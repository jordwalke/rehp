/**
 * @providesModule Division_by_zero
 */
let joo_global_object = typeof global !== 'undefined' ? global : window;

var runtime = joo_global_object.jsoo_runtime;
var caml_register_global = runtime["caml_register_global"];
var string = runtime["caml_new_string"];

// In this order:
// "Out_of_memory",
// "Sys_error",
// "Failure",
// "Invalid_argument",
// "End_of_file",
// "Division_by_zero",
// "Not_found",
// "Match_failure",
// "Stack_overflow",
// "Sys_blocked_io",
// "Assert_failure",
// "Undefined_recursive_module",
var i = 5;
var s = "Division_by_zero";
var global_exn = [248, string(s), -1 * i];
caml_register_global(10, global_exn, s);

module.exports = global_exn;
