<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class Js_of_ocaml__Firebug {
  <<__Override, __Memoize>>
  public static function get() : Vector<dynamic> {
    $joo_global_object = \Rehack\GlobalObject::get() as dynamic;
    
    $runtime = $joo_global_object->jsoo_runtime;
    $console = $runtime["caml_js_get_console"](0);
    $Js_of_ocaml_Firebug = Vector{0, $console};
    
     return ($Js_of_ocaml_Firebug);

  }
  public static function console() {
    return static::get()[1]();
  }

}
/* Hashing disabled */
