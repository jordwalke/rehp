<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class StringHelper {
  <<__Override, __Memoize>>
  public static function get() : Vector<dynamic> {
    $joo_global_object = \Rehack\GlobalObject::get() as dynamic;
    
    $runtime = $joo_global_object->jsoo_runtime;
    $helperVal = $runtime["caml_new_string"]("hello");
    $StringHelper = Vector{0, $helperVal};
    
     return ($StringHelper);

  }
  public static function helperVal(): dynamic {
    return static::get()[1]();
  }

}
/* Hashing disabled */
