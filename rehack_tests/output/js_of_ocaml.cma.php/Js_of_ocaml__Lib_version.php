<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class Js_of_ocaml__Lib_version {
  <<__Override, __Memoize>>
  public static function get() : Vector<dynamic> {
    
    $runtime = (\Rehack\GlobalObject::get() as dynamic)->jsoo_runtime;
    $string = $runtime["caml_new_string"];
    $s = $string("3.3.0");
    $git_version = $string("11c413504");
    $Js_of_ocaml_Lib_version = Vector{0, $s, $git_version} as dynamic;
    
    return($Js_of_ocaml_Lib_version);

  }

}
/* Hashing disabled */
