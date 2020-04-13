<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class Stdlib__pervasives {
  <<__Override, __Memoize>>
  public static function get() : Vector<dynamic> {
    
    $runtime = (\Rehack\GlobalObject::get() as dynamic)->jsoo_runtime;
    
    ;
    
    $cst_Stdlib_Pervasives_Exit = $runtime["caml_new_string"]("Stdlib.Pervasives.Exit");
    $Stdlib = Stdlib::get();
    $invalid_arg = $Stdlib[1];
    $failwith = $Stdlib[2];
    $Exit = Vector{
      248,
      $cst_Stdlib_Pervasives_Exit,
      $runtime["caml_fresh_oo_id"](0)
    } as dynamic;
    $min = $Stdlib[16];
    $max = $Stdlib[17];
    $abs = $Stdlib[18];
    $max_int = $Stdlib[19];
    $min_int = $Stdlib[20];
    $lnot = $Stdlib[21];
    $infinity = $Stdlib[22];
    $neg_infinity = $Stdlib[23];
    $nan = $Stdlib[24];
    $max_float = $Stdlib[25];
    $min_float = $Stdlib[26];
    $epsilon_float = $Stdlib[27];
    $symbol = $Stdlib[28];
    $char_of_int = $Stdlib[29];
    $string_of_bool = $Stdlib[30];
    $bool_of_string = $Stdlib[32];
    $bool_of_string_opt = $Stdlib[31];
    $string_of_int = $Stdlib[33];
    $int_of_string_opt = $Stdlib[34];
    $string_of_float = $Stdlib[35];
    $float_of_string_opt = $Stdlib[36];
    $symbol__0 = $Stdlib[37];
    $stdin = $Stdlib[38];
    $stdout = $Stdlib[39];
    $stderr = $Stdlib[40];
    $print_char = $Stdlib[41];
    $print_string = $Stdlib[42];
    $print_bytes = $Stdlib[43];
    $print_int = $Stdlib[44];
    $print_float = $Stdlib[45];
    $print_endline = $Stdlib[46];
    $print_newline = $Stdlib[47];
    $prerr_char = $Stdlib[48];
    $prerr_string = $Stdlib[49];
    $prerr_bytes = $Stdlib[50];
    $prerr_int = $Stdlib[51];
    $prerr_float = $Stdlib[52];
    $prerr_endline = $Stdlib[53];
    $prerr_newline = $Stdlib[54];
    $read_line = $Stdlib[55];
    $read_int = $Stdlib[57];
    $read_int_opt = $Stdlib[56];
    $read_float = $Stdlib[59];
    $read_float_opt = $Stdlib[58];
    $open_out = $Stdlib[60];
    $open_out_bin = $Stdlib[61];
    $open_out_gen = $Stdlib[62];
    $flush = $Stdlib[63];
    $flush_all = $Stdlib[64];
    $output_char = $Stdlib[65];
    $output_string = $Stdlib[66];
    $output_bytes = $Stdlib[67];
    $output = $Stdlib[68];
    $output_substring = $Stdlib[69];
    $output_byte = $Stdlib[70];
    $output_binary_int = $Stdlib[71];
    $output_value = $Stdlib[72];
    $seek_out = $Stdlib[73];
    $pos_out = $Stdlib[74];
    $out_channel_length = $Stdlib[75];
    $close_out = $Stdlib[76];
    $close_out_noerr = $Stdlib[77];
    $set_binary_mode_out = $Stdlib[78];
    $open_in = $Stdlib[79];
    $open_in_bin = $Stdlib[80];
    $open_in_gen = $Stdlib[81];
    $input_char = $Stdlib[82];
    $input_line = $Stdlib[83];
    $input = $Stdlib[84];
    $really_input = $Stdlib[85];
    $really_input_string = $Stdlib[86];
    $input_byte = $Stdlib[87];
    $input_binary_int = $Stdlib[88];
    $input_value = $Stdlib[89];
    $seek_in = $Stdlib[90];
    $pos_in = $Stdlib[91];
    $in_channel_length = $Stdlib[92];
    $close_in = $Stdlib[93];
    $close_in_noerr = $Stdlib[94];
    $set_binary_mode_in = $Stdlib[95];
    $string_of_format = $Stdlib[97];
    $symbol__1 = $Stdlib[98];
    $exit = $Stdlib[99];
    $at_exit = $Stdlib[100];
    $valid_float_lexem = $Stdlib[101];
    $do_at_exit = $Stdlib[103];
    $Stdlib_pervasives = Vector{
      0,
      $invalid_arg,
      $failwith,
      $Exit,
      $min,
      $max,
      $abs,
      $max_int,
      $min_int,
      $lnot,
      $infinity,
      $neg_infinity,
      $nan,
      $max_float,
      $min_float,
      $epsilon_float,
      $symbol,
      $char_of_int,
      $string_of_bool,
      $bool_of_string,
      $bool_of_string_opt,
      $string_of_int,
      $int_of_string_opt,
      $string_of_float,
      $float_of_string_opt,
      $symbol__0,
      $stdin,
      $stdout,
      $stderr,
      $print_char,
      $print_string,
      $print_bytes,
      $print_int,
      $print_float,
      $print_endline,
      $print_newline,
      $prerr_char,
      $prerr_string,
      $prerr_bytes,
      $prerr_int,
      $prerr_float,
      $prerr_endline,
      $prerr_newline,
      $read_line,
      $read_int,
      $read_int_opt,
      $read_float,
      $read_float_opt,
      $open_out,
      $open_out_bin,
      $open_out_gen,
      $flush,
      $flush_all,
      $output_char,
      $output_string,
      $output_bytes,
      $output,
      $output_substring,
      $output_byte,
      $output_binary_int,
      $output_value,
      $seek_out,
      $pos_out,
      $out_channel_length,
      $close_out,
      $close_out_noerr,
      $set_binary_mode_out,
      $open_in,
      $open_in_bin,
      $open_in_gen,
      $input_char,
      $input_line,
      $input,
      $really_input,
      $really_input_string,
      $input_byte,
      $input_binary_int,
      $input_value,
      $seek_in,
      $pos_in,
      $in_channel_length,
      $close_in,
      $close_in_noerr,
      $set_binary_mode_in,
      $string_of_format,
      $symbol__1,
      $exit,
      $at_exit,
      $valid_float_lexem,
      $do_at_exit
    } as dynamic;
    
    return($Stdlib_pervasives);

  }

}
/* Hashing disabled */
