<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class Js_of_ocaml__Firebug {
  <<__Override, __Memoize>>
  public static function requireModule() : Vector<dynamic> {
    
    $runtime =  (\Rehack\GlobalObject::get() as dynamic)->jsoo_runtime ;
    $console = $runtime["caml_js_get_console"](0);
    $Js_of_ocaml_Firebug = Vector{0, $console} as dynamic;
    
     return ($Js_of_ocaml_Firebug);

  }

}
/* Hashing disabled */
