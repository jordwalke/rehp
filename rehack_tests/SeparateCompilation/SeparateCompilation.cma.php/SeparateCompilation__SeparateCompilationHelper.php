<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class SeparateCompilation__SeparateCompilationHelper {
  <<__Override, __Memoize>>
  public static function requireModule() : Vector<dynamic> {
    $joo_global_object = \Rehack\GlobalObject::get() as dynamic;
    
    $runtime = $joo_global_object->jsoo_runtime;
    $helperVal = $runtime["caml_new_string"]("hello!goodbye");
    $SeparateCompilation_SeparateCompilationHelper = Vector{0, $helperVal};
    
     return ($SeparateCompilation_SeparateCompilationHelper);

  }
  public static function helperVal(): dynamic {
    return static::callRehackFunction(static::requireModule()[1], varray[]);
  }

}
/*____hashes flags: 421562097 bytecode: 3815232550 debug-data: 1624526790 primitives: 1058613066*/
