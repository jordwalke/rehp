<?hh
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * Lazy.php
 */

namespace Rehack;

final class Lazy {
  <<__Memoize>>
  public static function get() {
    $global_object = \Rehack\GlobalObject::get();
    $runtime = \Rehack\Runtime::get();
    /*
     * Soon, these will replace the `global_data->ModuleName`
     * pattern in the load() function.
     */
    $CamlinternalLazy = CamlinternalLazy::get();
    $Obj = Obj::get();
    Lazy::load($global_object);
    $memoized = $runtime->caml_get_global_data()->Lazy;
    return $memoized;
  }

  /**
   * Performs module load operation. May have side effects.
   */
  private static function load($joo_global_object) {
    

    $runtime = $joo_global_object->jsoo_runtime;
    $caml_obj_tag = $runtime["caml_obj_tag"];
    $global_data = $runtime["caml_get_global_data"]();
    $Obj = $global_data["Obj"];
    $CamlinternalLazy = $global_data["CamlinternalLazy"];
    $Undefined = $CamlinternalLazy[1];
    $force_val = $CamlinternalLazy[5];
    $from_fun = function(dynamic $f) use ($Obj,$runtime) {
      $x = $runtime["caml_obj_block"]($Obj[6], 1);
      $x[1] = $f;
      return $x;
    };
    $from_val = function(dynamic $v) use ($Obj,$caml_obj_tag,$runtime) {
      $t = $caml_obj_tag($v);
      if ($t !== $Obj[10]) {
        if ($t !== $Obj[6]) {if ($t !== $Obj[14]) {return $v;}}
      }
      return $runtime["caml_lazy_make_forward"]($v);
    };
    $is_val = function(dynamic $l) use ($Obj,$caml_obj_tag) {
      return $caml_obj_tag($l) !== $Obj[6] ? 1 : (0);
    };
    $Lazy = Vector{
      0,
      $Undefined,
      $force_val,
      $from_fun,
      $from_val,
      $is_val,
      $from_fun,
      $from_val,
      $is_val
    };
    
    $runtime["caml_register_global"](2, $Lazy, "Lazy");

  }
}

/*____hashes compiler:hashing-disabled inputs:hashing-disabled bytecode:hashing-disabled*/
