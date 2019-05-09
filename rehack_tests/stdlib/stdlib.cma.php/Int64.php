<?hh
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * Int64.php
 */

namespace Rehack;

final class Int64 {
  <<__Memoize>>
  public static function get() {
    $global_object = \Rehack\GlobalObject::get();
    $runtime = \Rehack\Runtime::get();
    /*
     * Soon, these will replace the `global_data->ModuleName`
     * pattern in the load() function.
     */
    $Failure = Failure::get();
    Int64::load($global_object);
    $memoized = $runtime->caml_get_global_data()->Int64;
    return $memoized;
  }

  /**
   * Performs module load operation. May have side effects.
   */
  private static function load($joo_global_object) {
    

    $runtime = $joo_global_object->jsoo_runtime;
    $caml_wrap_exception = $runtime["caml_wrap_exception"];
    $global_data = $runtime["caml_get_global_data"]();
    $cst_d = $runtime["caml_new_string"]("%d");
    $zero = Vector{255, 0, 0, 0};
    $one = Vector{255, 1, 0, 0};
    $minus_one = Vector{255, 16777215, 16777215, 65535};
    $min_int = Vector{255, 0, 0, 32768};
    $max_int = Vector{255, 16777215, 16777215, 32767};
    $Failure = $global_data["Failure"];
    $eB = Vector{255, 16777215, 16777215, 65535};
    $eA = Vector{255, 0, 0, 0};
    $ez = Vector{255, 1, 0, 0};
    $ey = Vector{255, 1, 0, 0};
    $succ = function($n) use ($ey,$runtime) {
      return $runtime["caml_int64_add"]($n, $ey);
    };
    $pred = function($n) use ($ez,$runtime) {
      return $runtime["caml_int64_sub"]($n, $ez);
    };
    $abs = function($n) use ($eA,$runtime) {
      if ($runtime["caml_greaterequal"]($n, $eA)) {return $n;}
      return $runtime["caml_int64_neg"]($n);
    };
    $lognot = function($n) use ($eB,$runtime) {
      return $runtime["caml_int64_xor"]($n, $eB);
    };
    $to_string = function($n) use ($cst_d,$runtime) {
      return $runtime["caml_int64_format"]($cst_d, $n);
    };
    $of_string_opt = function($s) use ($Failure,$caml_wrap_exception,$runtime) {
      try {$eC = Vector{0, $runtime["caml_int64_of_string"]($s)};return $eC;}
      catch(\Throwable $eD) {
        $eD = $caml_wrap_exception($eD);
        if ($eD[1] === $Failure) {return 0;}
        throw $runtime["caml_wrap_thrown_exception_reraise"]($eD) as \Throwable;
      }
    };
    $compare = function($x, $y) use ($runtime) {
      return $runtime["caml_int64_compare"]($x, $y);
    };
    $equal = function($x, $y) use ($compare) {
      return 0 === $compare($x, $y) ? 1 : (0);
    };
    $Int64 = Vector{
      0,
      $zero,
      $one,
      $minus_one,
      $succ,
      $pred,
      $abs,
      $max_int,
      $min_int,
      $lognot,
      $of_string_opt,
      $to_string,
      $compare,
      $equal
    };
    
    $runtime["caml_register_global"](11, $Int64, "Int64");

  }
}