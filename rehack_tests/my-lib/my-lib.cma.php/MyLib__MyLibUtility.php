<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class MyLib__MyLibUtility {
  <<__Override, __Memoize>>
  public static function get() : Vector<dynamic> {
    $joo_global_object = \Rehack\GlobalObject::get() as dynamic;
    
    $runtime = $joo_global_object->jsoo_runtime;
    $call1 = $runtime["caml_call1"];
    $Random =  Random::get ();
    $thisIsAUtilityFunction = (dynamic $param) ==> {
      return $call1($Random[5], 100);
    };
    $MyLib_MyLibUtility = Vector{0, $thisIsAUtilityFunction};
    
     return ($MyLib_MyLibUtility);

  }
/*____CompilationSummary*/
}
/*____hashes flags: 1802415451 bytecode: 9609593791 debug-data: 2989761887 primitives: 1058613066*/
