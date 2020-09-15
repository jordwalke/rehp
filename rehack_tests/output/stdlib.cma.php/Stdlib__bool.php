<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class Stdlib__bool {
  <<__Override, __Memoize>>
  public static function get() : Vector<dynamic> {
    
    $runtime = (\Rehack\GlobalObject::get() as dynamic)->jsoo_runtime;
    $string = $runtime["caml_new_string"];
    $cst_true = $string("true");
    $cst_false = $string("false");
    $equal = (dynamic $e_, dynamic $d_) : dynamic ==> {
      return $e_ === $d_ ? 1 : (0);
    };
    $compare = (dynamic $c_, dynamic $b_) : dynamic ==> {
      return $runtime["caml_int_compare"]($c_, $b_);
    };
    $to_int = (dynamic $param) : dynamic ==> {return 0 === $param ? 0 : (1);};
    $to_float = (dynamic $param) : dynamic ==> {
      return 0 === $param ? 0 : (1);
    };
    $to_string = (dynamic $param) : dynamic ==> {
      return 0 === $param ? $cst_false : ($cst_true);
    };
    $Stdlib_bool = Vector{
      0,
      (dynamic $a_) : dynamic ==> {return ! $a_;},
      $equal,
      $compare,
      $to_int,
      $to_float,
      $to_string
    } as dynamic;
    
    return($Stdlib_bool);

  }
  public static function equal(dynamic $unnamed1, dynamic $unnamed2): dynamic {
    return static::syncCall(__FUNCTION__, 2, $unnamed1, $unnamed2);
  }
  public static function compare(dynamic $unnamed1, dynamic $unnamed2): dynamic {
    return static::syncCall(__FUNCTION__, 3, $unnamed1, $unnamed2);
  }
  public static function to_int(dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 4, $param);
  }
  public static function to_float(dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 5, $param);
  }
  public static function to_string(dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 6, $param);
  }

}
/* Hashing disabled */
