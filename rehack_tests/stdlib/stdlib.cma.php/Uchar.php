<?hh
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * Uchar.php
 */

namespace Rehack;

final class Uchar {
  <<__Memoize>>
  public static function get() {
    $global_object = \Rehack\GlobalObject::get();
    $runtime = \Rehack\Runtime::get();
    /*
     * Soon, these will replace the `global_data->ModuleName`
     * pattern in the load() function.
     */
    $Pervasives = Pervasives::get();
    Uchar::load($global_object);
    $memoized = $runtime->caml_get_global_data()->Uchar;
    return $memoized;
  }

  /**
   * Performs module load operation. May have side effects.
   */
  private static function load($joo_global_object) {
    

    $runtime = $joo_global_object->jsoo_runtime;
    $call1 = $runtime["caml_call1"];
    $call2 = $runtime["caml_call2"];
    $caml_format_int = $runtime["caml_format_int"];
    $caml_new_string = $runtime["caml_new_string"];
    $global_data = $runtime["caml_get_global_data"]();
    $cst_is_not_a_latin1_character = $caml_new_string(
      " is not a latin1 character"
    );
    $cst_04X = $caml_new_string("%04X");
    $cst_U = $caml_new_string("U+");
    $cst_is_not_an_Unicode_scalar_value = $caml_new_string(
      " is not an Unicode scalar value"
    );
    $cst_X = $caml_new_string("%X");
    $err_no_pred = $caml_new_string("U+0000 has no predecessor");
    $err_no_succ = $caml_new_string("U+10FFFF has no successor");
    $Pervasives = $global_data["Pervasives"];
    $err_not_sv = function(dynamic $i) use ($Pervasives,$call2,$caml_format_int,$cst_X,$cst_is_not_an_Unicode_scalar_value) {
      return $call2(
        $Pervasives[16],
        $caml_format_int($cst_X, $i),
        $cst_is_not_an_Unicode_scalar_value
      );
    };
    $err_not_latin1 = function(dynamic $u) use ($Pervasives,$call2,$caml_format_int,$cst_04X,$cst_U,$cst_is_not_a_latin1_character) {
      $bj = $call2(
        $Pervasives[16],
        $caml_format_int($cst_04X, $u),
        $cst_is_not_a_latin1_character
      );
      return $call2($Pervasives[16], $cst_U, $bj);
    };
    $min = 0;
    $max = 1114111;
    $lo_bound = 55295;
    $hi_bound = 57344;
    $bom = 65279;
    $rep = 65533;
    $succ = function(dynamic $u) use ($Pervasives,$call1,$err_no_succ,$hi_bound) {
      return $u === 55295
        ? $hi_bound
        : ($u === 1114111
         ? $call1($Pervasives[1], $err_no_succ)
         : ((int) ($u + 1)));
    };
    $pred = function(dynamic $u) use ($Pervasives,$call1,$err_no_pred,$lo_bound) {
      return $u === 57344
        ? $lo_bound
        : ($u === 0 ? $call1($Pervasives[1], $err_no_pred) : ((int) ($u + -1)));
    };
    $is_valid = function(dynamic $i) {
      $bf = 0 <= $i ? 1 : (0);
      $bg = $bf ? $i <= 55295 ? 1 : (0) : ($bf);
      if ($bg) {
        $bh = $bg;
      }
      else {
        $bi = 57344 <= $i ? 1 : (0);
        $bh = $bi ? $i <= 1114111 ? 1 : (0) : ($bi);
      }
      return $bh;
    };
    $of_int = function(dynamic $i) use ($Pervasives,$call1,$err_not_sv,$is_valid) {
      if ($is_valid($i)) {return $i;}
      $be = $err_not_sv($i);
      return $call1($Pervasives[1], $be);
    };
    $is_char = function(dynamic $u) {return $u < 256 ? 1 : (0);};
    $of_char = function(dynamic $c) {return $c;};
    $to_char = function(dynamic $u) use ($Pervasives,$call1,$err_not_latin1) {
      if (255 < $u) {
        $bd = $err_not_latin1($u);
        return $call1($Pervasives[1], $bd);
      }
      return $u;
    };
    $unsafe_to_char = function(dynamic $bc) {return $bc;};
    $equal = function(dynamic $bb, dynamic $ba) {return $bb === $ba ? 1 : (0);
    };
    $compare = function(dynamic $a_, dynamic $a9) use ($runtime) {
      return $runtime["caml_int_compare"]($a_, $a9);
    };
    $hash = function(dynamic $a8) {return $a8;};
    $a5 = function(dynamic $a7) {return $a7;};
    $Uchar = Vector{
      0,
      $min,
      $max,
      $bom,
      $rep,
      $succ,
      $pred,
      $is_valid,
      $of_int,
      function(dynamic $a6) {return $a6;},
      $a5,
      $is_char,
      $of_char,
      $to_char,
      $unsafe_to_char,
      $equal,
      $compare,
      $hash
    };
    
    $runtime["caml_register_global"](8, $Uchar, "Uchar");

  }
}