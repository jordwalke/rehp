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
    $caml_arity_test = $runtime["caml_arity_test"];
    $caml_get_public_method = $runtime["caml_get_public_method"];
    $caml_call1 = function(dynamic $f, dynamic $a0) use ($caml_arity_test,$runtime) {
      return $caml_arity_test($f) === 1
        ? $f($a0)
        : ($runtime["caml_call_gen"]($f, varray[$a0]));
    };
    $global_data = $runtime["caml_get_global_data"]();
    $Js_of_ocaml_Js = $global_data["Js_of_ocaml__Js"];
    $empty_position_options = function(dynamic $param) {
      return (object)darray[];
    };
    $mz = function(dynamic $x) use ($caml_call1,$caml_get_public_method) {
      return $caml_call1($caml_get_public_method($x, 82957527, 235), $x);
    };
    $mA = $Js_of_ocaml_Js[50][1];
    $x = (function(dynamic $t1, dynamic $param) {return $t1->navigator;})($mA, $mz);
    
    if ($caml_call1($Js_of_ocaml_Js[6][5], $x)) {
      $mB = function(dynamic $x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, 315713478, 236), $x);
      };
      $geolocation = (function(dynamic $t0, dynamic $param) {return $t0->geolocation;
       })($x, $mB);
    }
    else {$geolocation = $x;}
    
    $is_supported = function(dynamic $param) use ($Js_of_ocaml_Js,$caml_call1,$geolocation) {
      return $caml_call1($Js_of_ocaml_Js[6][5], $geolocation);
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