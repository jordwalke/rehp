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
    
    $runtime = (\Rehack\GlobalObject::get() as dynamic)->jsoo_runtime;
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
    $Bytes = Bytes::get();
    $Pervasives = Pervasives::get();
    $to_buffer = 
    (dynamic $buff, dynamic $ofs, dynamic $len, dynamic $v, dynamic $flags) ==> {
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
    $header_size = 20 as dynamic;
    $data_size = (dynamic $buff, dynamic $ofs) ==> {
      if (0 <= $ofs) {
        if (! ((int) ($caml_ml_bytes_length($buff) - 20) < $ofs)) {return $caml_marshal_data_size($buff, $ofs);}
      }
      return $call1($Pervasives[1], $cst_Marshal_data_size);
    };
    $total_size = (dynamic $buff, dynamic $ofs) ==> {
      return (int) (20 + $data_size($buff, $ofs));
    };
    $from_bytes = (dynamic $buff, dynamic $ofs) ==> {
      $len = null;
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
    $from_string = (dynamic $buff, dynamic $ofs) ==> {
      return $from_bytes($call1($Bytes[43], $buff), $ofs);
    };
    $a_ = (dynamic $e_) ==> {return $runtime["caml_input_value"]($e_);};
    $Marshal = Vector{
      0,
      (dynamic $d_, dynamic $c_, dynamic $b_) ==> {
        return $runtime["caml_output_value"]($d_, $c_, $b_);
      },
      $to_buffer,
      $a_,
      $from_bytes,
      $from_string,
      $header_size,
      $data_size,
      $total_size
    } as dynamic;
    
    return($Marshal);

  }
  public static function to_buffer(dynamic $buff, dynamic $ofs, dynamic $len, dynamic $v, dynamic $flags): dynamic {
    return static::syncCall(__FUNCTION__, 2, $buff, $ofs, $len, $v, $flags);
  }
  public static function from_bytes(dynamic $buff, dynamic $ofs): dynamic {
    return static::syncCall(__FUNCTION__, 4, $buff, $ofs);
  }
  public static function from_string(dynamic $buff, dynamic $ofs): dynamic {
    return static::syncCall(__FUNCTION__, 5, $buff, $ofs);
  }
  public static function data_size(dynamic $buff, dynamic $ofs): dynamic {
    return static::syncCall(__FUNCTION__, 7, $buff, $ofs);
  }
  public static function total_size(dynamic $buff, dynamic $ofs): dynamic {
    return static::syncCall(__FUNCTION__, 8, $buff, $ofs);
  }

}
/* Hashing disabled */
