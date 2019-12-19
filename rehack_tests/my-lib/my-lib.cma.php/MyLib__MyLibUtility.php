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
    $thisIsAUtilityFunction = function(dynamic $param) use ($Random,$call1) {
      return $call1($Random[5], 100);
    };
    $MyLib_MyLibUtility = Vector{0, $thisIsAUtilityFunction};
    
     return ($MyLib_MyLibUtility);

  }
  public static function thisIsAUtilityFunction(dynamic $param) {
    return static::get()[1]($param);
  }

}
/*____hashes compiler: 6d834f124 flags: 1183596006 bytecode: 9609593791 debug-data: 2989761887 primitives: 1058613066*/
