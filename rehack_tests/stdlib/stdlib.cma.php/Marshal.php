<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class Marshal {
  <<__Override, __Memoize>>
  public static function get() : Vector<dynamic> {
    $joo_global_object = \Rehack\GlobalObject::get() as dynamic;
    
    $runtime = $joo_global_object->jsoo_runtime;
    $call1 = $runtime["caml_call1"];
    $caml_marshal_data_size = $runtime["caml_marshal_data_size"];
    $caml_ml_bytes_length = $runtime["caml_ml_bytes_length"];
    $string = $runtime["caml_new_string"];
    $cst_Marshal_from_bytes = $string("Marshal.from_bytes");
    $cst_Marshal_from_bytes__0 = $string("Marshal.from_bytes");
    $cst_Marshal_data_size = $string("Marshal.data_size");
    $cst_Marshal_to_buffer_substring_out_of_bounds = $string(
      "Marshal.to_buffer: substring out of bounds"
    );
    $Bytes =  Bytes::get ();
    $Pervasives =  Pervasives::get ();
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
    $a_ = function(dynamic $e_) use ($runtime) {
      return $runtime["caml_input_value"]($e_);
    };
    $Marshal = Vector{
      0,
      function(dynamic $d_, dynamic $c_, dynamic $b_) use ($runtime) {
        return $runtime["caml_output_value"]($d_, $c_, $b_);
      },
      $to_buffer,
      $a_,
      $from_bytes,
      $from_string,
      $header_size,
      $data_size,
      $total_size
    };
    
     return ($Marshal);

  }
  public static function total_size(dynamic $buff, dynamic $ofs) {
    return static::get()[8]($buff, $ofs);
  }
  public static function data_size(dynamic $buff, dynamic $ofs) {
    return static::get()[7]($buff, $ofs);
  }
  public static function header_size() {
    return static::get()[6]();
  }
  public static function from_string(dynamic $buff, dynamic $ofs) {
    return static::get()[5]($buff, $ofs);
  }
  public static function from_bytes(dynamic $buff, dynamic $ofs) {
    return static::get()[4]($buff, $ofs);
  }
  public static function to_buffer(dynamic $buff, dynamic $ofs, dynamic $len, dynamic $v, dynamic $flags) {
    return static::get()[2]($buff, $ofs, $len, $v, $flags);
  }

}
/* Hashing disabled */
