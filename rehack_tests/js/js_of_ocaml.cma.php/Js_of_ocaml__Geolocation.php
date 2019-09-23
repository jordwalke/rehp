<?hh
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * Js_of_ocaml__Geolocation.php
 */

namespace Rehack;

final class Js_of_ocaml__Geolocation {
  <<__Memoize>>
  public static function get() {
    $global_object = \Rehack\GlobalObject::get();
    $runtime = \Rehack\Runtime::get();
    /*
     * Soon, these will replace the `global_data->ModuleName`
     * pattern in the load() function.
     */
    $Js_of_ocaml__Js = Js_of_ocaml__Js::get();
    Js_of_ocaml__Geolocation::load($global_object);
    $memoized = $runtime->caml_get_global_data()->Js_of_ocaml__Geolocation;
    return $memoized;
  }

  /**
   * Performs module load operation. May have side effects.
   */
  private static function load($joo_global_object) {
    

    $runtime = $joo_global_object->jsoo_runtime;
    $call1 = $runtime["caml_call1"];
    $caml_get_public_method = $runtime["caml_get_public_method"];
    $global_data = $runtime["caml_get_global_data"]();
    $Js_of_ocaml_Js = $global_data["Js_of_ocaml__Js"];
    $empty_position_options = function(dynamic $param) {return darray[];};
    $a = function(dynamic $x) use ($call1,$caml_get_public_method) {
      return $call1($caml_get_public_method($x, 82957527, 298), $x);
    };
    $b = $Js_of_ocaml_Js[50][1];
    $x = (function(dynamic $t1, dynamic $param) {return $t1->navigator;})($b, $a);
    
    if ($call1($Js_of_ocaml_Js[6][5], $x)) {
      $c = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, 315713478, 299), $x);
      };
      $geolocation = (function(dynamic $t0, dynamic $param) {return $t0->geolocation;
       })($x, $c);
    }
    else {$geolocation = $x;}
    
    $is_supported = function(dynamic $param) use ($Js_of_ocaml_Js,$call1,$geolocation) {
      return $call1($Js_of_ocaml_Js[6][5], $geolocation);
    };
    $Js_of_ocaml_Geolocation = Vector{
      0,
      $empty_position_options,
      $geolocation,
      $is_supported
    };
    
    $runtime["caml_register_global"](
      3,
      $Js_of_ocaml_Geolocation,
      "Js_of_ocaml__Geolocation"
    );

  }
}

/*____hashes compiler:hashing-disabled inputs:hashing-disabled bytecode:hashing-disabled*/
