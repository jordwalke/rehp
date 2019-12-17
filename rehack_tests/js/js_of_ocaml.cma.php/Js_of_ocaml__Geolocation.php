<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class Js_of_ocaml__Geolocation {
  <<__Override, __Memoize>>
  public static function get() : Vector<dynamic> {
    $joo_global_object = \Rehack\GlobalObject::get() as dynamic;
    
    $runtime = $joo_global_object->jsoo_runtime;
    $call1 = $runtime["caml_call1"];
    $caml_get_public_method = $runtime["caml_get_public_method"];
    $Js_of_ocaml_Js =  Js_of_ocaml__Js::get ();
    $empty_position_options = function(dynamic $param) {return darray[];};
    $a_ = function(dynamic $x) use ($call1,$caml_get_public_method) {
      return $call1($caml_get_public_method($x, 82957527, 298), $x);
    };
    $b_ = $Js_of_ocaml_Js[50][1];
    $x = (function(dynamic $t1, dynamic $param) {return $t1->navigator;})($b_, $a_);
    
    if ($call1($Js_of_ocaml_Js[6][5], $x)) {
      $c_ = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, 315713478, 299), $x);
      };
      $geolocation = (function(dynamic $t0, dynamic $param) {return $t0->geolocation;
       })($x, $c_);
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
    
     return ($Js_of_ocaml_Geolocation);

  }
  public static function is_supported(dynamic $param) {
    return static::get()[3]($param);
  }
  public static function geolocation() {
    return static::get()[2]();
  }
  public static function empty_position_options(dynamic $param) {
    return static::get()[1]($param);
  }

}
/* Hashing disabled */
