<?hh
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * MyLib__MyLibUtility.php
 */

namespace Rehack;

final class MyLib__MyLibUtility {
  <<__Memoize>>
  public static function get() {
    $global_object = \Rehack\GlobalObject::get();
    $runtime = \Rehack\Runtime::get();
    /*
     * Soon, these will replace the `global_data->ModuleName`
     * pattern in the load() function.
     */
    $Random = Random::get();
    MyLib__MyLibUtility::load($global_object);
    $memoized = $runtime->caml_get_global_data()->MyLib__MyLibUtility;
    return $memoized;
  }

  /**
   * Performs module load operation. May have side effects.
   */
  private static function load($joo_global_object) {
    

    $runtime = $joo_global_object->jsoo_runtime;
    $call1 = $runtime["caml_call1"];
    $global_data = $runtime["caml_get_global_data"]();
    $Random = $global_data["Random"];
    $thisIsAUtilityFunction = function(dynamic $param) use ($Random,$call1) {
      return $call1($Random[5], 100);
    };
    $MyLib_MyLibUtility = Vector{0, $thisIsAUtilityFunction};
    
    $runtime["caml_register_global"](
      1,
      $MyLib_MyLibUtility,
      "MyLib__MyLibUtility"
    );

  }
}

