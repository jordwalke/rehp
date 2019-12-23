<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class Js_of_ocaml__Lib_version {
  <<__Override, __Memoize>>
  public static function requireModule() : Vector<dynamic> {
    $joo_global_object = \Rehack\GlobalObject::get() as dynamic;
    
    $runtime = $joo_global_object->jsoo_runtime;
    $string = $runtime["caml_new_string"];
    $s = $string("3.3.0");
    $git_version = $string("5fdbca036");
    $Js_of_ocaml_Lib_version = Vector{0, $s, $git_version};
    
     return ($Js_of_ocaml_Lib_version);

  }
  public static function s(): dynamic {
    return static::callRehackFunction(static::requireModule()[1], varray[]);
  }
  public static function git_version(): dynamic {
    return static::callRehackFunction(static::requireModule()[2], varray[]);
  }

}
/* Hashing disabled */
