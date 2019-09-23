<?hh
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * StringHelper.php
 */

namespace Rehack;

final class StringHelper {
  <<__Memoize>>
  public static function get() {
    $global_object = \Rehack\GlobalObject::get();
    $runtime = \Rehack\Runtime::get();
    /*
     * Soon, these will replace the `global_data->ModuleName`
     * pattern in the load() function.
     */

    StringHelper::load($global_object);
    $memoized = $runtime->caml_get_global_data()->StringHelper;
    return $memoized;
  }

  /**
   * Performs module load operation. May have side effects.
   */
  private static function load($joo_global_object) {
    

    $runtime = $joo_global_object->jsoo_runtime;
    $helperVal = $runtime["caml_new_string"]("hello");
    $StringHelper = Vector{0, $helperVal};
    
    $runtime["caml_register_global"](1, $StringHelper, "StringHelper");

  }
}

