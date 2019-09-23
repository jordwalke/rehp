<?hh
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * Js_of_ocaml__Firebug.php
 */

namespace Rehack;

final class Js_of_ocaml__Firebug {
  <<__Memoize>>
  public static function get() {
    $global_object = \Rehack\GlobalObject::get();
    $runtime = \Rehack\Runtime::get();
    /*
     * Soon, these will replace the `global_data->ModuleName`
     * pattern in the load() function.
     */

    Js_of_ocaml__Firebug::load($global_object);
    $memoized = $runtime->caml_get_global_data()->Js_of_ocaml__Firebug;
    return $memoized;
  }

  /**
   * Performs module load operation. May have side effects.
   */
  private static function load($joo_global_object) {
    

    $runtime = $joo_global_object->jsoo_runtime;
    $console = $runtime["caml_js_get_console"](0);
    $Js_of_ocaml_Firebug = Vector{0, $console};
    
    $runtime["caml_register_global"](
      0,
      $Js_of_ocaml_Firebug,
      "Js_of_ocaml__Firebug"
    );

  }
}

