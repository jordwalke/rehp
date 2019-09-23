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
    $string = $runtime["caml_new_string"];
    $global_data = $runtime["caml_get_global_data"]();
    $cst_is_not_a_latin1_character = $string(" is not a latin1 character");
    $cst_04X = $string("%04X");
    $cst_U = $string("U+");
    $cst_is_not_an_Unicode_scalar_value = $string(
      " is not an Unicode scalar value"
    );
    $cst_X = $string("%X");
    $err_no_pred = $string("U+0000 has no predecessor");
    $err_no_succ = $string("U+10FFFF has no successor");
    $Pervasives = $global_data["Pervasives"];
    $err_not_sv = function(dynamic $i) use ($Pervasives,$call2,$caml_format_int,$cst_X,$cst_is_not_an_Unicode_scalar_value) {
      return $call2(
        $Pervasives[16],
        $caml_format_int($cst_X, $i),
        $cst_is_not_an_Unicode_scalar_value
      );
    };
    $err_not_latin1 = function(dynamic $u) use ($Pervasives,$call2,$caml_format_int,$cst_04X,$cst_U,$cst_is_not_a_latin1_character) {
      $p = $call2(
        $Pervasives[16],
        $caml_format_int($cst_04X, $u),
        $cst_is_not_a_latin1_character
      );
      return $call2($Pervasives[16], $cst_U, $p);
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
      $l = 0 <= $i ? 1 : (0);
      $m = $l ? $i <= 55295 ? 1 : (0) : ($l);
      if ($m) {
        $n = $m;
      }
      else {
        $o = 57344 <= $i ? 1 : (0);
        $n = $o ? $i <= 1114111 ? 1 : (0) : ($o);
      }
      return $n;
    };
    $of_int = function(dynamic $i) use ($Pervasives,$call1,$err_not_sv,$is_valid) {
      if ($is_valid($i)) {return $i;}
      $k = $err_not_sv($i);
      return $call1($Pervasives[1], $k);
    };
    $is_char = function(dynamic $u) {return $u < 256 ? 1 : (0);};
    $of_char = function(dynamic $c) {return $c;};
    $to_char = function(dynamic $u) use ($Pervasives,$call1,$err_not_latin1) {
      if (255 < $u) {
        $j = $err_not_latin1($u);
        return $call1($Pervasives[1], $j);
      }
      return $u;
    };
    $unsafe_to_char = function(dynamic $i) {return $i;};
    $equal = function(dynamic $h, dynamic $g) {return $h === $g ? 1 : (0);};
    $compare = function(dynamic $f, dynamic $e) use ($runtime) {
      return $runtime["caml_int_compare"]($f, $e);
    };
    $hash = function(dynamic $d) {return $d;};
    $a = function(dynamic $c) {return $c;};
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
      function(dynamic $b) {return $b;},
      $a,
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

