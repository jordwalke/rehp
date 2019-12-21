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
    return static::callRehackFunction(static::get()[1], varray[]);
  }
  public static function Bytes(): dynamic {
    return static::callRehackFunction(static::get()[2], varray[]);
  }
  public static function List(): dynamic {
    return static::callRehackFunction(static::get()[3], varray[]);
  }
  public static function String(): dynamic {
    return static::callRehackFunction(static::get()[4], varray[]);
  }

}
/* Hashing disabled */
