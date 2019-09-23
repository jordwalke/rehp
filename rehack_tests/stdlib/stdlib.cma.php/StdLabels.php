<?hh
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * StdLabels.php
 */

namespace Rehack;

final class StdLabels {
  <<__Memoize>>
  public static function get() {
    $global_object = \Rehack\GlobalObject::get();
    $runtime = \Rehack\Runtime::get();
    /*
     * Soon, these will replace the `global_data->ModuleName`
     * pattern in the load() function.
     */

    StdLabels::load($global_object);
    $memoized = $runtime->caml_get_global_data()->StdLabels;
    return $memoized;
  }

  /**
   * Performs module load operation. May have side effects.
   */
  private static function load($joo_global_object) {
    

    $runtime = $joo_global_object->jsoo_runtime;
    $StdLabels = Vector{0, 0, 0, 0, 0};
    
    $runtime["caml_register_global"](0, $StdLabels, "StdLabels");

  }
}

