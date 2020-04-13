<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class Stdlib__unit {
  <<__Override, __Memoize>>
  public static function get() : Vector<dynamic> {
    
    $runtime = (\Rehack\GlobalObject::get() as dynamic)->jsoo_runtime;
    
    ;
    
    $cst = $runtime["caml_new_string"]("()");
    $equal = (dynamic $param, dynamic $b_) : dynamic ==> {return 1;};
    $compare = (dynamic $param, dynamic $a_) : dynamic ==> {return 0;};
    $to_string = (dynamic $param) : dynamic ==> {return $cst;};
    $Stdlib_unit = Vector{0, $equal, $compare, $to_string} as dynamic;
    
    return($Stdlib_unit);

  }
  public static function equal(dynamic $param, dynamic $unnamed1): dynamic {
    return static::syncCall(__FUNCTION__, 1, $param, $unnamed1);
  }
  public static function compare(dynamic $param, dynamic $unnamed1): dynamic {
    return static::syncCall(__FUNCTION__, 2, $param, $unnamed1);
  }
  public static function to_string(dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 3, $param);
  }

}
/* Hashing disabled */
