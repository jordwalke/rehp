<?hh
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * CamlinternalMod.php
 */

namespace Rehack;

final class CamlinternalMod {
  <<__Memoize>>
  public static function get() {
    $global_object = \Rehack\GlobalObject::get();
    $runtime = \Rehack\Runtime::get();
    /*
     * Soon, these will replace the `global_data->ModuleName`
     * pattern in the load() function.
     */
    $Array_ = Array_::get();
    $CamlinternalOO = CamlinternalOO::get();
    $Obj = Obj::get();
    $Assert_failure = Assert_failure::get();
    $Undefined_recursive_module = Undefined_recursive_module::get();
    CamlinternalMod::load($global_object);
    $memoized = $runtime->caml_get_global_data()->CamlinternalMod;
    return $memoized;
  }

  /**
   * Performs module load operation. May have side effects.
   */
  private static function load($joo_global_object) {
    

    $runtime = $joo_global_object->jsoo_runtime;
    $update_mod = $runtime["caml_CamlinternalMod_update_mod"];
    $init_mod = $runtime["caml_CamlinternalMod_init_mod"];
    $CamlinternalMod = Vector{0, $init_mod, $update_mod};
    
    $runtime["caml_register_global"](8, $CamlinternalMod, "CamlinternalMod");

  }
}

