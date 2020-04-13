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
    
    $runtime = (\Rehack\GlobalObject::get() as dynamic)->jsoo_runtime;
    $call1 = $runtime["caml_call1"];
    $Stdlib_random = Stdlib__random::get();
    $thisIsAUtilityFunction = (dynamic $param) : dynamic ==> {
      return $call1($Stdlib_random[5], 100);
    };
    $MyLib_MyLibUtility = Vector{0, $thisIsAUtilityFunction} as dynamic;
    
    return($MyLib_MyLibUtility);

  }
  public static function thisIsAUtilityFunction(dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 1, $param);
  }

}
/*____hashes flags: 1314811087 bytecode: 9507293897 debug-data: 1020972089 primitives: 1058613066*/
