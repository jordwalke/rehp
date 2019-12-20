<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class StdLabels {
  <<__Override, __Memoize>>
  public static function get() : Vector<dynamic> {
    $joo_global_object = \Rehack\GlobalObject::get() as dynamic;
    
    $runtime = $joo_global_object->jsoo_runtime;
    $StdLabels = Vector{0, 0, 0, 0, 0};
    
     return ($StdLabels);

  }
  public static function Array(): dynamic {
    return static::get()[1]();
  }
  public static function Bytes(): dynamic {
    return static::get()[2]();
  }
  public static function List(): dynamic {
    return static::get()[3]();
  }
  public static function String(): dynamic {
    return static::get()[4]();
  }

}
/* Hashing disabled */
