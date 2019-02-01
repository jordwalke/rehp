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
    $caml_arity_test = $runtime->caml_arity_test;
    $ArrayLiteral = $runtime->ArrayLiteral;
    $caml_format_int = $runtime->caml_format_int;
    $caml_new_string = $runtime->caml_new_string;
    $caml_call1 = function($f, $a0) use ($ArrayLiteral,$caml_arity_test,$runtime) {
      return $caml_arity_test($f) == 1
        ? $f($a0)
        : ($runtime->caml_call_gen($f, $ArrayLiteral($a0)));
    };
    $caml_call2 = function($f, $a0, $a1) use ($ArrayLiteral,$caml_arity_test,$runtime) {
      return $caml_arity_test($f) == 2
        ? $f($a0, $a1)
        : ($runtime->caml_call_gen($f, $ArrayLiteral($a0, $a1)));
    };
    $global_data = $runtime->caml_get_global_data();
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
    $Pervasives = $global_data->Pervasives;
    $err_not_sv = function($i) use ($Pervasives,$caml_call2,$caml_format_int,$cst_X,$cst_is_not_an_Unicode_scalar_value) {
      return $caml_call2(
        $Pervasives[16],
        $caml_format_int($cst_X, $i),
        $cst_is_not_an_Unicode_scalar_value
      );
    };
    $err_not_latin1 = function($u) use ($Pervasives,$caml_call2,$caml_format_int,$cst_04X,$cst_U,$cst_is_not_a_latin1_character) {
      $bi = $caml_call2(
        $Pervasives[16],
        $caml_format_int($cst_04X, $u),
        $cst_is_not_a_latin1_character
      );
      return $caml_call2($Pervasives[16], $cst_U, $bi);
    };
    $min = 0;
    $max = 1114111;
    $lo_bound = 55295;
    $hi_bound = 57344;
    $bom = 65279;
    $rep = 65533;
    $succ = function($u) use ($Pervasives,$caml_call1,$err_no_succ,$hi_bound) {
      return $u === 55295
        ? $hi_bound
        : ($u === 1114111
         ? $caml_call1($Pervasives[1], $err_no_succ)
         : ($u + 1 | 0));
    };
    $pred = function($u) use ($Pervasives,$caml_call1,$err_no_pred,$lo_bound) {
      return $u === 57344
        ? $lo_bound
        : ($u === 0
         ? $caml_call1($Pervasives[1], $err_no_pred)
         : ($u + -1 | 0));
    };
    $is_valid = function($i) {
      $be = 0 <= $i ? 1 : (0);
      $bf = $be ? $i <= 55295 ? 1 : (0) : ($be);
      if ($bf) {
        $bg = $bf;
      }
      else {
        $bh = 57344 <= $i ? 1 : (0);
        $bg = $bh ? $i <= 1114111 ? 1 : (0) : ($bh);
      }
      return $bg;
    };
    $of_int = function($i) use ($Pervasives,$caml_call1,$err_not_sv,$is_valid) {
      if ($is_valid($i)) {return $i;}
      $bd = $err_not_sv($i);
      return $caml_call1($Pervasives[1], $bd);
    };
    $is_char = function($u) {return $u < 256 ? 1 : (0);};
    $of_char = function($c) {return $c;};
    $to_char = function($u) use ($Pervasives,$caml_call1,$err_not_latin1) {
      if (255 < $u) {
        $bc = $err_not_latin1($u);
        return $caml_call1($Pervasives[1], $bc);
      }
      return $u;
    };
    $unsafe_to_char = function($bb) {return $bb;};
    $equal = function($ba, $a_) {return $ba === $a_ ? 1 : (0);};
    $compare = function($a9, $a8) use ($runtime) {
      return $runtime->caml_int_compare($a9, $a8);
    };
    $hash = function($a7) {return $a7;};
    $a4 = function($a6) {return $a6;};
    $Uchar = V(
      0,
      $min,
      $max,
      $bom,
      $rep,
      $succ,
      $pred,
      $is_valid,
      $of_int,
      function($a5) {return $a5;},
      $a4,
      $is_char,
      $of_char,
      $to_char,
      $unsafe_to_char,
      $equal,
      $compare,
      $hash
    );
    
    $runtime->caml_register_global(8, $Uchar, "Uchar");

  }
}