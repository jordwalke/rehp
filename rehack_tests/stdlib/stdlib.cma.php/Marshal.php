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
    $call1 = $runtime["caml_call1"];
    $caml_marshal_data_size = $runtime["caml_marshal_data_size"];
    $caml_ml_bytes_length = $runtime["caml_ml_bytes_length"];
    $string = $runtime["caml_new_string"];
    $global_data = $runtime["caml_get_global_data"]();
    $cst_Marshal_from_bytes = $string("Marshal.from_bytes");
    $cst_Marshal_from_bytes__0 = $string("Marshal.from_bytes");
    $cst_Marshal_data_size = $string("Marshal.data_size");
    $cst_Marshal_to_buffer_substring_out_of_bounds = $string(
      "Marshal.to_buffer: substring out of bounds"
    );
    $Bytes = $global_data["Bytes"];
    $Pervasives = $global_data["Pervasives"];
    $to_buffer = function
    (dynamic $buff, dynamic $ofs, dynamic $len, dynamic $v, dynamic $flags) use ($Pervasives,$call1,$caml_ml_bytes_length,$cst_Marshal_to_buffer_substring_out_of_bounds,$runtime) {
      if (0 <= $ofs) {
        if (0 <= $len) {
          if (! ((int) ($caml_ml_bytes_length($buff) - $len) < $ofs)) {
            return $runtime["caml_output_value_to_buffer"]($buff, $ofs, $len, $v, $flags);
          }
        }
      }
      return $call1(
        $Pervasives[1],
        $cst_Marshal_to_buffer_substring_out_of_bounds
      );
    };
    $header_size = 20;
    $data_size = function(dynamic $buff, dynamic $ofs) use ($Pervasives,$call1,$caml_marshal_data_size,$caml_ml_bytes_length,$cst_Marshal_data_size) {
      if (0 <= $ofs) {
        if (! ((int) ($caml_ml_bytes_length($buff) - 20) < $ofs)) {return $caml_marshal_data_size($buff, $ofs);}
      }
      return $call1($Pervasives[1], $cst_Marshal_data_size);
    };
    $total_size = function(dynamic $buff, dynamic $ofs) use ($data_size) {
      return (int) (20 + $data_size($buff, $ofs));
    };
    $from_bytes = function(dynamic $buff, dynamic $ofs) use ($Pervasives,$call1,$caml_marshal_data_size,$caml_ml_bytes_length,$cst_Marshal_from_bytes,$cst_Marshal_from_bytes__0,$runtime) {
      if (0 <= $ofs) {
        if (! ((int) ($caml_ml_bytes_length($buff) - 20) < $ofs)) {
          $len = $caml_marshal_data_size($buff, $ofs);
          return (int)
           ($caml_ml_bytes_length($buff) - (int) (20 + $len)) < $ofs
            ? $call1($Pervasives[1], $cst_Marshal_from_bytes__0)
            : ($runtime["caml_input_value_from_string"]($buff, $ofs));
        }
      }
      return $call1($Pervasives[1], $cst_Marshal_from_bytes);
    };
    $from_string = function(dynamic $buff, dynamic $ofs) use ($Bytes,$call1,$from_bytes) {
      return $from_bytes($call1($Bytes[43], $buff), $ofs);
    };
    $a = function(dynamic $e) use ($runtime) {
      return $runtime["caml_input_value"]($e);
    };
    $Marshal = Vector{
      0,
      function(dynamic $d, dynamic $c, dynamic $b) use ($runtime) {
        return $runtime["caml_output_value"]($d, $c, $b);
      },
      $to_buffer,
      $a,
      $from_bytes,
      $from_string,
      $header_size,
      $data_size,
      $total_size
    };
    
    $runtime["caml_register_global"](6, $Marshal, "Marshal");

  }
}

/*____hashes compiler:hashing-disabled inputs:hashing-disabled bytecode:hashing-disabled*/
