<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class MyLib__ {
  <<__Override, __Memoize>>
  public static function requireModule() : Vector<dynamic> {
    $joo_global_object = \Rehack\GlobalObject::get() as dynamic;
    
    $runtime = $joo_global_object->jsoo_runtime;
    $MyLib = Vector{0, 0};
    
     return ($MyLib);

  }
  public static function MyLibUtility(): dynamic {
    return static::callRehackFunction(static::requireModule()[1], varray[]);
  }

}
/*____hashes flags: 421562097 bytecode: 4096869352 debug-data: 1818446335 primitives: 1058613066*/
