<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class MyLib__ {
  <<__Override, __Memoize>>
  public static function get() : Vector<dynamic> {
    $joo_global_object = \Rehack\GlobalObject::get() as dynamic;
    
    $runtime = $joo_global_object->jsoo_runtime;
    $MyLib = Vector{0, 0};
    
     return ($MyLib);

  }
  public static function MyLibUtility() {
    return static::get()[1]();
  }

}
/* Hashing disabled */
