<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class MyLib__MyLibUtility {
  <<__Override, __Memoize>>
  public static function requireModule() : Vector<dynamic> {
    
    $runtime =  (\Rehack\GlobalObject::get() as dynamic)->jsoo_runtime ;
    $call1 = $runtime["caml_call1"];
    $Random =  Random::requireModule ();
    $thisIsAUtilityFunction = (dynamic $param) ==> {
      return $call1($Random[5], 100);
    };
    $MyLib_MyLibUtility = Vector{0, $thisIsAUtilityFunction} as dynamic;
    
     return ($MyLib_MyLibUtility);

  }
  public static function thisIsAUtilityFunction(dynamic $param): dynamic {
    return static::callRehackFunction(static::requireModule()[1], varray[$param]);
  }

}
/*____hashes flags: 1406088649 bytecode: 10023863734 debug-data: 2989761887 primitives: 1058613066*/
