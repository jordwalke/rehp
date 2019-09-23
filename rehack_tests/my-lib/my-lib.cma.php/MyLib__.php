<?hh
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * MyLib__.php
 */

namespace Rehack;

final class MyLib__ {
  <<__Memoize>>
  public static function get() {
    $global_object = \Rehack\GlobalObject::get();
    $runtime = \Rehack\Runtime::get();
    /*
     * Soon, these will replace the `global_data->ModuleName`
     * pattern in the load() function.
     */

    MyLib__::load($global_object);
    $memoized = $runtime->caml_get_global_data()->MyLib__;
    return $memoized;
  }

  /**
   * Performs module load operation. May have side effects.
   */
  private static function load($joo_global_object) {
    

    $runtime = $joo_global_object->jsoo_runtime;
    $MyLib = Vector{0, 0};
    
    $runtime["caml_register_global"](0, $MyLib, "MyLib__");

  }
}

