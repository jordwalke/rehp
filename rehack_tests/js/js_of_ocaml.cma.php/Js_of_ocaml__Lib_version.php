<?hh
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * Js_of_ocaml__Lib_version.php
 */

namespace Rehack;

final class Js_of_ocaml__Lib_version {
  <<__Memoize>>
  public static function get() {
    $global_object = \Rehack\GlobalObject::get();
    $runtime = \Rehack\Runtime::get();
    /*
     * Soon, these will replace the `global_data->ModuleName`
     * pattern in the load() function.
     */

    Js_of_ocaml__Lib_version::load($global_object);
    $memoized = $runtime->caml_get_global_data()->Js_of_ocaml__Lib_version;
    return $memoized;
  }

  /**
   * Performs module load operation. May have side effects.
   */
  private static function load($joo_global_object) {
    

    $runtime = $joo_global_object->jsoo_runtime;
    $string = $runtime["caml_new_string"];
    $s = $string("3.3.0");
    $git_version = $string("314b769c9");
    $Js_of_ocaml_Lib_version = Vector{0, $s, $git_version};
    
    $runtime["caml_register_global"](
      2,
      $Js_of_ocaml_Lib_version,
      "Js_of_ocaml__Lib_version"
    );

  }
}

/*____hashes compiler:hashing-disabled inputs:hashing-disabled bytecode:hashing-disabled*/
