/**
 * @providesModule Sys_error
 */
var runtime = require('./runtime.js');
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
var i = 1;
var s = "Sys_error";
var global_exn = [248, string(s), -1 * i];
caml_register_global(10, global_exn, s);

module.exports = global_exn;

