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
    
    $runtime =  (\Rehack\GlobalObject::get() as dynamic)->jsoo_runtime ;
    $helperVal = $runtime["caml_new_string"]("hello!goodbye");
    $SeparateCompilation_SeparateCompilationHelper = Vector{0, $helperVal} as dynamic;
    
     return ($SeparateCompilation_SeparateCompilationHelper);

  }

}
/*____hashes flags: 1406088649 bytecode: 3815232550 debug-data: 732482023 primitives: 1058613066*/
