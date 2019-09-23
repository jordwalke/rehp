<?hh
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * MoreLabels.php
 */

namespace Rehack;

final class MoreLabels {
  <<__Memoize>>
  public static function get() {
    $global_object = \Rehack\GlobalObject::get();
    $runtime = \Rehack\Runtime::get();
    /*
     * Soon, these will replace the `global_data->ModuleName`
     * pattern in the load() function.
     */
    $Hashtbl = Hashtbl::get();
    $Map = Map::get();
    $Set = Set::get();
    MoreLabels::load($global_object);
    $memoized = $runtime->caml_get_global_data()->MoreLabels;
    return $memoized;
  }

  /**
   * Performs module load operation. May have side effects.
   */
  private static function load($joo_global_object) {
    

    $runtime = $joo_global_object->jsoo_runtime;
    $global_data = $runtime["caml_get_global_data"]();
    $Set = $global_data["Set"];
    $Map = $global_data["Map"];
    $Hashtbl = $global_data["Hashtbl"];
    $MoreLabels = Vector{0, $Hashtbl, $Map, $Set};
    
    $runtime["caml_register_global"](3, $MoreLabels, "MoreLabels");

  }
}

