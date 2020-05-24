<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class Stdlib__int {
  <<__Override, __Memoize>>
  public static function get() : Vector<dynamic> {
    
    $runtime = (\Rehack\GlobalObject::get() as dynamic)->jsoo_runtime;
    
    ;
    
    $zero = 0 as dynamic;
    $one = 1 as dynamic;
    $minus_one = -1 as dynamic;
    $abs = (dynamic $x) : dynamic ==> {return 0 <= $x ? $x : ((int) - $x);};
    $max_int = 2147483647 as dynamic;
    $min_int = -2147483648 as dynamic;
    $lognot = (dynamic $x) : dynamic ==> {return $x ^ -1;};
    $equal = (dynamic $d_, dynamic $c_) : dynamic ==> {
      return $d_ === $c_ ? 1 : (0);
    };
    $compare = (dynamic $b_, dynamic $a_) : dynamic ==> {
      return $runtime["caml_int_compare"]($b_, $a_);
    };
    $to_string = (dynamic $x) : dynamic ==> {
      return $runtime["caml_new_string"]((string) $x);
    };
    $Stdlib_int = Vector{
      0,
      $zero,
      $one,
      $minus_one,
      $abs,
      $max_int,
      $min_int,
      $lognot,
      $equal,
      $compare,
      $to_string
    } as dynamic;
    
    return($Stdlib_int);

  }
  public static function abs(dynamic $x): dynamic {
    return static::syncCall(__FUNCTION__, 4, $x);
  }
  public static function lognot(dynamic $x): dynamic {
    return static::syncCall(__FUNCTION__, 7, $x);
  }
  public static function equal(dynamic $unnamed1, dynamic $unnamed2): dynamic {
    return static::syncCall(__FUNCTION__, 8, $unnamed1, $unnamed2);
  }
  public static function compare(dynamic $unnamed1, dynamic $unnamed2): dynamic {
    return static::syncCall(__FUNCTION__, 9, $unnamed1, $unnamed2);
  }
  public static function to_string(dynamic $x): dynamic {
    return static::syncCall(__FUNCTION__, 10, $x);
  }

}
/* Hashing disabled */
