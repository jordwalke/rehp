<?hh
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * Oo.php
 */

namespace Rehack;

final class Oo {
  <<__Memoize>>
  public static function get() {
    $global_object = \Rehack\GlobalObject::get();
    $runtime = \Rehack\Runtime::get();
    /*
     * Soon, these will replace the `global_data->ModuleName`
     * pattern in the load() function.
     */
    $CamlinternalOO = CamlinternalOO::get();
    Oo::load($global_object);
    $memoized = $runtime->caml_get_global_data()->Oo;
    return $memoized;
  }

  /**
   * Performs module load operation. May have side effects.
   */
  private static function load($joo_global_object) {
    

    $runtime = $joo_global_object->jsoo_runtime;
    $global_data = $runtime["caml_get_global_data"]();
    $CamlinternalOO = $global_data["CamlinternalOO"];
    $copy = $CamlinternalOO[22];
    $new_method = $CamlinternalOO[1];
    $public_method_label = $CamlinternalOO[1];
    $Oo = Vector{0, $copy, $new_method, $public_method_label};
    
    $runtime["caml_register_global"](1, $Oo, "Oo");

  }
}

/*____hashes compiler:hashing-disabled inputs:hashing-disabled bytecode:hashing-disabled*/
