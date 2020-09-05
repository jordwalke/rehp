<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class HashBugReproduce__Consumer {
  <<__Override, __Memoize>>
  public static function get() : Vector<dynamic> {
    
    $runtime = (\Rehack\GlobalObject::get() as dynamic)->jsoo_runtime;
    $getField = (dynamic $o) : dynamic ==> {return $o[9];};
    $HashBugReproduce_Consumer = Vector{0, $getField} as dynamic;
    
    return($HashBugReproduce_Consumer);

  }
  public static function getField(dynamic $o): dynamic {
    return static::syncCall(__FUNCTION__, 1, $o);
  }

}
/*____hashes flags: 1068210421 bytecode: 7303456054 debug-data: 1066682977 primitives: 1058613066*/
