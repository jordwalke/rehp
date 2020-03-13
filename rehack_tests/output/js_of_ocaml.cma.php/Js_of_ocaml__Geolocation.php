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
    
    $runtime = (\Rehack\GlobalObject::get() as dynamic)->jsoo_runtime;
    $call1 = $runtime["caml_call1"];
    $caml_get_public_method = $runtime["caml_get_public_method"];
    $Js_of_ocaml_Js = Js_of_ocaml__Js::get();
    $empty_position_options = (dynamic $param) : dynamic ==> {
      return darray[];
    };
    $a_ = (dynamic $x) : dynamic ==> {
      return $call1($caml_get_public_method($x, 82957527, 305), $x);
    };
    $b_ = $Js_of_ocaml_Js[50][1];
    $x = ((dynamic $t1, dynamic $param) : dynamic ==> {return $t1->navigator;})($b_, $a_);
    
    if ($call1($Js_of_ocaml_Js[6][5], $x)) {
      $c_ = (dynamic $x) : dynamic ==> {
        return $call1($caml_get_public_method($x, 315713478, 306), $x);
      };
      $geolocation = ((dynamic $t0, dynamic $param) : dynamic ==> {
         return $t0->geolocation;
       })($x, $c_);
    }
    else {$geolocation = $x;}
    
    $is_supported = (dynamic $param) : dynamic ==> {
      return $call1($Js_of_ocaml_Js[6][5], $geolocation);
    };
    $Js_of_ocaml_Geolocation = Vector{
      0,
      $empty_position_options,
      $geolocation,
      $is_supported
    } as dynamic;
    
    return($Js_of_ocaml_Geolocation);

  }
  public static function empty_position_options(dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 1, $param);
  }
  public static function is_supported(dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 3, $param);
  }

}
/* Hashing disabled */
