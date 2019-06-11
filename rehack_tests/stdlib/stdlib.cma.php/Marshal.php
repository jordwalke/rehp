<?hh
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * Marshal.php
 */

namespace Rehack;

final class Marshal {
  <<__Memoize>>
  public static function get() {
    $global_object = \Rehack\GlobalObject::get();
    $runtime = \Rehack\Runtime::get();
    /*
     * Soon, these will replace the `global_data->ModuleName`
     * pattern in the load() function.
     */
    $Bytes = Bytes::get();
    $Pervasives = Pervasives::get();
    Marshal::load($global_object);
    $memoized = $runtime->caml_get_global_data()->Marshal;
    return $memoized;
  }

  /**
   * Performs module load operation. May have side effects.
   */
  private static function load($joo_global_object) {
    

    $runtime = $joo_global_object->jsoo_runtime;
    $caml_arity_test = $runtime["caml_arity_test"];
    $caml_marshal_data_size = $runtime["caml_marshal_data_size"];
    $caml_ml_bytes_length = $runtime["caml_ml_bytes_length"];
    $caml_new_string = $runtime["caml_new_string"];
    $caml_call1 = function(dynamic $f, dynamic $a0) use ($caml_arity_test,$runtime) {
      return $caml_arity_test($f) === 1
        ? $f($a0)
        : ($runtime["caml_call_gen"]($f, varray[$a0]));
    };
    $global_data = $runtime["caml_get_global_data"]();
    $cst_Marshal_from_bytes = $caml_new_string("Marshal.from_bytes");
    $cst_Marshal_from_bytes__0 = $caml_new_string("Marshal.from_bytes");
    $cst_Marshal_data_size = $caml_new_string("Marshal.data_size");
    $cst_Marshal_to_buffer_substring_out_of_bounds = $caml_new_string(
      "Marshal.to_buffer: substring out of bounds"
    );
    $Bytes = $global_data["Bytes"];
    $Pervasives = $global_data["Pervasives"];
    $to_buffer = function
    (dynamic $buff, dynamic $ofs, dynamic $len, dynamic $v, dynamic $flags) use ($Pervasives,$caml_call1,$caml_ml_bytes_length,$cst_Marshal_to_buffer_substring_out_of_bounds,$runtime) {
      if (0 <= $ofs) {
        if (0 <= $len) {
          if (! ((int) ($caml_ml_bytes_length($buff) - $len) < $ofs)) {
            return $runtime["caml_output_value_to_buffer"]($buff, $ofs, $len, $v, $flags);
          }
        }
      }
      return $caml_call1(
        $Pervasives[1],
        $cst_Marshal_to_buffer_substring_out_of_bounds
      );
    };
    $header_size = 20;
    $data_size = function(dynamic $buff, dynamic $ofs) use ($Pervasives,$caml_call1,$caml_marshal_data_size,$caml_ml_bytes_length,$cst_Marshal_data_size) {
      if (0 <= $ofs) {
        if (! ((int) ($caml_ml_bytes_length($buff) - 20) < $ofs)) {return $caml_marshal_data_size($buff, $ofs);}
      }
      return $caml_call1($Pervasives[1], $cst_Marshal_data_size);
    };
    $total_size = function(dynamic $buff, dynamic $ofs) use ($data_size) {
      return (int) (20 + $data_size($buff, $ofs));
    };
    $from_bytes = function(dynamic $buff, dynamic $ofs) use ($Pervasives,$caml_call1,$caml_marshal_data_size,$caml_ml_bytes_length,$cst_Marshal_from_bytes,$cst_Marshal_from_bytes__0,$runtime) {
      if (0 <= $ofs) {
        if (! ((int) ($caml_ml_bytes_length($buff) - 20) < $ofs)) {
          $len = $caml_marshal_data_size($buff, $ofs);
          return (int)
           ($caml_ml_bytes_length($buff) - (int) (20 + $len)) < $ofs
            ? $caml_call1($Pervasives[1], $cst_Marshal_from_bytes__0)
            : ($runtime["caml_input_value_from_string"]($buff, $ofs));
        }
      }
      return $caml_call1($Pervasives[1], $cst_Marshal_from_bytes);
    };
    $from_string = function(dynamic $buff, dynamic $ofs) use ($Bytes,$caml_call1,$from_bytes) {
      return $from_bytes($caml_call1($Bytes[43], $buff), $ofs);
    };
    $cQ = function(dynamic $cU) use ($runtime) {
      return $runtime["caml_input_value"]($cU);
    };
    $Marshal = Vector{
      0,
      function(dynamic $cT, dynamic $cS, dynamic $cR) use ($runtime) {
        return $runtime["caml_output_value"]($cT, $cS, $cR);
      },
      $to_buffer,
      $cQ,
      $from_bytes,
      $from_string,
      $header_size,
      $data_size,
      $total_size
    };
    
    $runtime["caml_register_global"](6, $Marshal, "Marshal");

  }
}