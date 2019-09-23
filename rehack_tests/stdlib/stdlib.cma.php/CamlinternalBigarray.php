<?hh
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * CamlinternalBigarray.php
 */

namespace Rehack;

final class CamlinternalBigarray {
  <<__Memoize>>
  public static function get() {
    $global_object = \Rehack\GlobalObject::get();
    $runtime = \Rehack\Runtime::get();
    /*
     * Soon, these will replace the `global_data->ModuleName`
     * pattern in the load() function.
     */

    CamlinternalBigarray::load($global_object);
    $memoized = $runtime->caml_get_global_data()->CamlinternalBigarray;
    return $memoized;
  }

  /**
   * Performs module load operation. May have side effects.
   */
  private static function load($joo_global_object) {
    

    $runtime = $joo_global_object->jsoo_runtime;
    $CamlinternalBigarray = Vector{0};
    
    $runtime["caml_register_global"](
      0,
      $CamlinternalBigarray,
      "CamlinternalBigarray"
    );

  }
}

