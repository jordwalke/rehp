<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class SeparateCompilation__ {
  <<__Override, __Memoize>>
  public static function get() : Vector<dynamic> {
    $joo_global_object = \Rehack\GlobalObject::get() as dynamic;
    
    $runtime = $joo_global_object->jsoo_runtime;
    $SeparateCompilation = Vector{0, 0};
    
     return ($SeparateCompilation);

  }
  public static function SeparateCompilationHelper() {
    return static::get()[1]();
  }

}
/*____hashes flags: 1802415451 bytecode: 3984913853 debug-data: 2457943818 primitives: 1058613066*/
