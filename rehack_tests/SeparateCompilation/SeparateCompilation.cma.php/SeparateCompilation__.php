<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class SeparateCompilation__ {
  <<__Override, __Memoize>>
  public static function requireModule() : Vector<dynamic> {
    $joo_global_object = \Rehack\GlobalObject::get() as dynamic;
    
    $runtime = $joo_global_object->jsoo_runtime;
    $SeparateCompilation = Vector{0, 0};
    
     return ($SeparateCompilation);

  }
  public static function SeparateCompilationHelper(): dynamic {
    return static::callRehackFunction(static::requireModule()[1], varray[]);
  }

}
/*____hashes flags: 421562097 bytecode: 4208011095 debug-data: 2457943818 primitives: 1058613066*/
