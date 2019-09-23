<?hh
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * Callback.php
 */

namespace Rehack;

final class Callback {
  <<__Memoize>>
  public static function get() {
    $global_object = \Rehack\GlobalObject::get();
    $runtime = \Rehack\Runtime::get();
    /*
     * Soon, these will replace the `global_data->ModuleName`
     * pattern in the load() function.
     */
    $Obj = Obj::get();
    Callback::load($global_object);
    $memoized = $runtime->caml_get_global_data()->Callback;
    return $memoized;
  }

  /**
   * Performs module load operation. May have side effects.
   */
  private static function load($joo_global_object) {
    

    $runtime = $joo_global_object->jsoo_runtime;
    $caml_register_named_value = $runtime["caml_register_named_value"];
    $global_data = $runtime["caml_get_global_data"]();
    $Obj = $global_data["Obj"];
    $register = function(dynamic $name, dynamic $v) use ($caml_register_named_value) {
      return $caml_register_named_value($name, $v);
    };
    $register_exception = function(dynamic $name, dynamic $exn) use ($Obj,$caml_register_named_value,$runtime) {
      $slot = $runtime["caml_obj_tag"]($exn) === $Obj[8] ? $exn : ($exn[1]);
      return $caml_register_named_value($name, $slot);
    };
    $Callback = Vector{0, $register, $register_exception};
    
    $runtime["caml_register_global"](1, $Callback, "Callback");

  }
}

