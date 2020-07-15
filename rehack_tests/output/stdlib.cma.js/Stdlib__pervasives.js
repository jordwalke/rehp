/**
 * @flow strict
 * Stdlib__pervasives
 */

// @ts-check


"use strict";

var runtime = require("../runtime/runtime.js");
var cst_Stdlib_Pervasives_Exit = runtime["caml_new_string"]("Stdlib.Pervasives.Exit"
);
var Stdlib = require("./Stdlib.js");
var invalid_arg = Stdlib[1];
var failwith = Stdlib[2];
var Exit = [248,cst_Stdlib_Pervasives_Exit,runtime["caml_fresh_oo_id"](0)];
var min = Stdlib[16];
var max = Stdlib[17];
var abs = Stdlib[18];
var max_int = Stdlib[19];
var min_int = Stdlib[20];
var lnot = Stdlib[21];
var infinity = Stdlib[22];
var neg_infinity = Stdlib[23];
var nan = Stdlib[24];
var max_float = Stdlib[25];
var min_float = Stdlib[26];
var epsilon_float = Stdlib[27];
var symbol = Stdlib[28];
var char_of_int = Stdlib[29];
var string_of_bool = Stdlib[30];
var bool_of_string = Stdlib[32];
var bool_of_string_opt = Stdlib[31];
var string_of_int = Stdlib[33];
var int_of_string_opt = Stdlib[34];
var string_of_float = Stdlib[35];
var float_of_string_opt = Stdlib[36];
var symbol__0 = Stdlib[37];
var stdin = Stdlib[38];
var stdout = Stdlib[39];
var stderr = Stdlib[40];
var print_char = Stdlib[41];
var print_string = Stdlib[42];
var print_bytes = Stdlib[43];
var print_int = Stdlib[44];
var print_float = Stdlib[45];
var print_endline = Stdlib[46];
var print_newline = Stdlib[47];
var prerr_char = Stdlib[48];
var prerr_string = Stdlib[49];
var prerr_bytes = Stdlib[50];
var prerr_int = Stdlib[51];
var prerr_float = Stdlib[52];
var prerr_endline = Stdlib[53];
var prerr_newline = Stdlib[54];
var read_line = Stdlib[55];
var read_int = Stdlib[57];
var read_int_opt = Stdlib[56];
var read_float = Stdlib[59];
var read_float_opt = Stdlib[58];
var open_out = Stdlib[60];
var open_out_bin = Stdlib[61];
var open_out_gen = Stdlib[62];
var flush = Stdlib[63];
var flush_all = Stdlib[64];
var output_char = Stdlib[65];
var output_string = Stdlib[66];
var output_bytes = Stdlib[67];
var output = Stdlib[68];
var output_substring = Stdlib[69];
var output_byte = Stdlib[70];
var output_binary_int = Stdlib[71];
var output_value = Stdlib[72];
var seek_out = Stdlib[73];
var pos_out = Stdlib[74];
var out_channel_length = Stdlib[75];
var close_out = Stdlib[76];
var close_out_noerr = Stdlib[77];
var set_binary_mode_out = Stdlib[78];
var open_in = Stdlib[79];
var open_in_bin = Stdlib[80];
var open_in_gen = Stdlib[81];
var input_char = Stdlib[82];
var input_line = Stdlib[83];
var input = Stdlib[84];
var really_input = Stdlib[85];
var really_input_string = Stdlib[86];
var input_byte = Stdlib[87];
var input_binary_int = Stdlib[88];
var input_value = Stdlib[89];
var seek_in = Stdlib[90];
var pos_in = Stdlib[91];
var in_channel_length = Stdlib[92];
var close_in = Stdlib[93];
var close_in_noerr = Stdlib[94];
var set_binary_mode_in = Stdlib[95];
var string_of_format = Stdlib[97];
var symbol__1 = Stdlib[98];
var exit = Stdlib[99];
var at_exit = Stdlib[100];
var valid_float_lexem = Stdlib[101];
var do_at_exit = Stdlib[103];
var Stdlib_pervasives = [
  0,
  invalid_arg,
  failwith,
  Exit,
  min,
  max,
  abs,
  max_int,
  min_int,
  lnot,
  infinity,
  neg_infinity,
  nan,
  max_float,
  min_float,
  epsilon_float,
  symbol,
  char_of_int,
  string_of_bool,
  bool_of_string,
  bool_of_string_opt,
  string_of_int,
  int_of_string_opt,
  string_of_float,
  float_of_string_opt,
  symbol__0,
  stdin,
  stdout,
  stderr,
  print_char,
  print_string,
  print_bytes,
  print_int,
  print_float,
  print_endline,
  print_newline,
  prerr_char,
  prerr_string,
  prerr_bytes,
  prerr_int,
  prerr_float,
  prerr_endline,
  prerr_newline,
  read_line,
  read_int,
  read_int_opt,
  read_float,
  read_float_opt,
  open_out,
  open_out_bin,
  open_out_gen,
  flush,
  flush_all,
  output_char,
  output_string,
  output_bytes,
  output,
  output_substring,
  output_byte,
  output_binary_int,
  output_value,
  seek_out,
  pos_out,
  out_channel_length,
  close_out,
  close_out_noerr,
  set_binary_mode_out,
  open_in,
  open_in_bin,
  open_in_gen,
  input_char,
  input_line,
  input,
  really_input,
  really_input_string,
  input_byte,
  input_binary_int,
  input_value,
  seek_in,
  pos_in,
  in_channel_length,
  close_in,
  close_in_noerr,
  set_binary_mode_in,
  string_of_format,
  symbol__1,
  exit,
  at_exit,
  valid_float_lexem,
  do_at_exit
];

module.exports = Stdlib_pervasives;

/*::type Exports = {
  invalid_arg: any,
  failwith: any,
  Exit: any,
  min: any,
  max: any,
  abs: any,
  max_int: any,
  min_int: any,
  lnot: any,
  infinity: any,
  neg_infinity: any,
  nan: any,
  max_float: any,
  min_float: any,
  epsilon_float: any,
  symbol: any,
  char_of_int: any,
  string_of_bool: any,
  bool_of_string: any,
  bool_of_string_opt: any,
  string_of_int: any,
  int_of_string_opt: any,
  string_of_float: any,
  float_of_string_opt: any,
  stdin: any,
  stdout: any,
  stderr: any,
  print_char: any,
  print_string: any,
  print_bytes: any,
  print_int: any,
  print_float: any,
  print_endline: any,
  print_newline: any,
  prerr_char: any,
  prerr_string: any,
  prerr_bytes: any,
  prerr_int: any,
  prerr_float: any,
  prerr_endline: any,
  prerr_newline: any,
  read_line: any,
  read_int: any,
  read_int_opt: any,
  read_float: any,
  read_float_opt: any,
  open_out: any,
  open_out_bin: any,
  open_out_gen: any,
  flush: any,
  flush_all: any,
  output_char: any,
  output_string: any,
  output_bytes: any,
  output: any,
  output_substring: any,
  output_byte: any,
  output_binary_int: any,
  output_value: any,
  seek_out: any,
  pos_out: any,
  out_channel_length: any,
  close_out: any,
  close_out_noerr: any,
  set_binary_mode_out: any,
  open_in: any,
  open_in_bin: any,
  open_in_gen: any,
  input_char: any,
  input_line: any,
  input: any,
  really_input: any,
  really_input_string: any,
  input_byte: any,
  input_binary_int: any,
  input_value: any,
  seek_in: any,
  pos_in: any,
  in_channel_length: any,
  close_in: any,
  close_in_noerr: any,
  set_binary_mode_in: any,
  string_of_format: any,
  exit: any,
  at_exit: any,
  valid_float_lexem: any,
  do_at_exit: any,
}*/
/** @type {{
  invalid_arg: any,
  failwith: any,
  Exit: any,
  min: any,
  max: any,
  abs: any,
  max_int: any,
  min_int: any,
  lnot: any,
  infinity: any,
  neg_infinity: any,
  nan: any,
  max_float: any,
  min_float: any,
  epsilon_float: any,
  symbol: any,
  char_of_int: any,
  string_of_bool: any,
  bool_of_string: any,
  bool_of_string_opt: any,
  string_of_int: any,
  int_of_string_opt: any,
  string_of_float: any,
  float_of_string_opt: any,
  stdin: any,
  stdout: any,
  stderr: any,
  print_char: any,
  print_string: any,
  print_bytes: any,
  print_int: any,
  print_float: any,
  print_endline: any,
  print_newline: any,
  prerr_char: any,
  prerr_string: any,
  prerr_bytes: any,
  prerr_int: any,
  prerr_float: any,
  prerr_endline: any,
  prerr_newline: any,
  read_line: any,
  read_int: any,
  read_int_opt: any,
  read_float: any,
  read_float_opt: any,
  open_out: any,
  open_out_bin: any,
  open_out_gen: any,
  flush: any,
  flush_all: any,
  output_char: any,
  output_string: any,
  output_bytes: any,
  output: any,
  output_substring: any,
  output_byte: any,
  output_binary_int: any,
  output_value: any,
  seek_out: any,
  pos_out: any,
  out_channel_length: any,
  close_out: any,
  close_out_noerr: any,
  set_binary_mode_out: any,
  open_in: any,
  open_in_bin: any,
  open_in_gen: any,
  input_char: any,
  input_line: any,
  input: any,
  really_input: any,
  really_input_string: any,
  input_byte: any,
  input_binary_int: any,
  input_value: any,
  seek_in: any,
  pos_in: any,
  in_channel_length: any,
  close_in: any,
  close_in_noerr: any,
  set_binary_mode_in: any,
  string_of_format: any,
  exit: any,
  at_exit: any,
  valid_float_lexem: any,
  do_at_exit: any,
}} */
module.exports = ((module.exports /*:: : any*/) /*:: :Exports */);
module.exports.invalid_arg = module.exports[1];
module.exports.failwith = module.exports[2];
module.exports.Exit = module.exports[3];
module.exports.min = module.exports[4];
module.exports.max = module.exports[5];
module.exports.abs = module.exports[6];
module.exports.max_int = module.exports[7];
module.exports.min_int = module.exports[8];
module.exports.lnot = module.exports[9];
module.exports.infinity = module.exports[10];
module.exports.neg_infinity = module.exports[11];
module.exports.nan = module.exports[12];
module.exports.max_float = module.exports[13];
module.exports.min_float = module.exports[14];
module.exports.epsilon_float = module.exports[15];
module.exports.symbol = module.exports[16];
module.exports.char_of_int = module.exports[17];
module.exports.string_of_bool = module.exports[18];
module.exports.bool_of_string = module.exports[19];
module.exports.bool_of_string_opt = module.exports[20];
module.exports.string_of_int = module.exports[21];
module.exports.int_of_string_opt = module.exports[22];
module.exports.string_of_float = module.exports[23];
module.exports.float_of_string_opt = module.exports[24];
module.exports.stdin = module.exports[26];
module.exports.stdout = module.exports[27];
module.exports.stderr = module.exports[28];
module.exports.print_char = module.exports[29];
module.exports.print_string = module.exports[30];
module.exports.print_bytes = module.exports[31];
module.exports.print_int = module.exports[32];
module.exports.print_float = module.exports[33];
module.exports.print_endline = module.exports[34];
module.exports.print_newline = module.exports[35];
module.exports.prerr_char = module.exports[36];
module.exports.prerr_string = module.exports[37];
module.exports.prerr_bytes = module.exports[38];
module.exports.prerr_int = module.exports[39];
module.exports.prerr_float = module.exports[40];
module.exports.prerr_endline = module.exports[41];
module.exports.prerr_newline = module.exports[42];
module.exports.read_line = module.exports[43];
module.exports.read_int = module.exports[44];
module.exports.read_int_opt = module.exports[45];
module.exports.read_float = module.exports[46];
module.exports.read_float_opt = module.exports[47];
module.exports.open_out = module.exports[48];
module.exports.open_out_bin = module.exports[49];
module.exports.open_out_gen = module.exports[50];
module.exports.flush = module.exports[51];
module.exports.flush_all = module.exports[52];
module.exports.output_char = module.exports[53];
module.exports.output_string = module.exports[54];
module.exports.output_bytes = module.exports[55];
module.exports.output = module.exports[56];
module.exports.output_substring = module.exports[57];
module.exports.output_byte = module.exports[58];
module.exports.output_binary_int = module.exports[59];
module.exports.output_value = module.exports[60];
module.exports.seek_out = module.exports[61];
module.exports.pos_out = module.exports[62];
module.exports.out_channel_length = module.exports[63];
module.exports.close_out = module.exports[64];
module.exports.close_out_noerr = module.exports[65];
module.exports.set_binary_mode_out = module.exports[66];
module.exports.open_in = module.exports[67];
module.exports.open_in_bin = module.exports[68];
module.exports.open_in_gen = module.exports[69];
module.exports.input_char = module.exports[70];
module.exports.input_line = module.exports[71];
module.exports.input = module.exports[72];
module.exports.really_input = module.exports[73];
module.exports.really_input_string = module.exports[74];
module.exports.input_byte = module.exports[75];
module.exports.input_binary_int = module.exports[76];
module.exports.input_value = module.exports[77];
module.exports.seek_in = module.exports[78];
module.exports.pos_in = module.exports[79];
module.exports.in_channel_length = module.exports[80];
module.exports.close_in = module.exports[81];
module.exports.close_in_noerr = module.exports[82];
module.exports.set_binary_mode_in = module.exports[83];
module.exports.string_of_format = module.exports[84];
module.exports.exit = module.exports[86];
module.exports.at_exit = module.exports[87];
module.exports.valid_float_lexem = module.exports[88];
module.exports.do_at_exit = module.exports[89];

/* Hashing disabled */
