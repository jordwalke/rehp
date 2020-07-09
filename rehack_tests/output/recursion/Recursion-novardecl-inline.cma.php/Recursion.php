<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class Recursion {
  <<__Override, __Memoize>>
  public static function get() : Vector<dynamic> {
    
    $nobug1 = new Ref();
    $runtime = (\Rehack\GlobalObject::get() as dynamic)->jsoo_runtime;
    $nobug1->contents = (dynamic $x) : dynamic ==> {
      return (int) (1 + $nobug1->contents($x));
    };
    
    $nobug1->contents(42);
    
    $nobug2 = (dynamic $x) : dynamic ==> {
      $sub = new Ref();
      $sub->contents = (dynamic $x) : dynamic ==> {
        return (int) (1 + $sub->contents($x));
      };
      return $sub->contents($x);
    };
    $bug = (dynamic $x) : dynamic ==> {
      if (0 === $x) {
        $sub->contents = (dynamic $x) : dynamic ==> {
          return (int) (1 + $sub->contents($x));
        };
        return $sub->contents($x);
      }
      return 0;
    };
    $bug__0 = (dynamic $x) : dynamic ==> {
      if (0 === $x) {
        $sub->contents = (dynamic $x) : dynamic ==> {
          return (int) (1 + $sub->contents($x));
        };
        return $sub->contents($x);
      }
      return 0;
    };
    $M = Vector{0, $bug__0} as dynamic;
    $bug2 = (dynamic $param) : dynamic ==> {
      $k = Vector{0, 0} as dynamic;
      $x = 0 as dynamic;
      for (;;) {
        $sub->contents = (dynamic $x) : dynamic ==> {
          return (int) (1 + $sub->contents($x));
        };
        $c_ = $sub->contents($x);
        $k[1] = (int) ($k[1] + $c_);
        $d_ = (int) ($x + 1) as dynamic;
        if (10 !== $x) {$x = $d_;continue;}
        return $k;
      }
    };
    $bug3 = (dynamic $param) : dynamic ==> {
      $k = Vector{0, 0} as dynamic;
      $x = 0 as dynamic;
      for (;;) {
        if (0 === $x) {
          $sub->contents = (dynamic $x) : dynamic ==> {
            return (int) (1 + $sub->contents($x));
          };
          $a_ = $sub->contents($x);
        }
        else {$a_ = 0 as dynamic;}
        $k[1] = (int) ($k[1] + $a_);
        $b_ = (int) ($x + 1) as dynamic;
        if (10 !== $x) {$x = $b_;continue;}
        return $k;
      }
    };
    $Recursion = Vector{0, $nobug1->contents, $nobug2, $bug, $M, $bug2, $bug3} as dynamic;
    
    return($Recursion);

  }
  public static function nobug1(dynamic $x): dynamic {
    return static::syncCall(__FUNCTION__, 1, $x);
  }
  public static function nobug2(dynamic $x): dynamic {
    return static::syncCall(__FUNCTION__, 2, $x);
  }
  public static function bug(dynamic $x): dynamic {
    return static::syncCall(__FUNCTION__, 3, $x);
  }
  public static function bug2(dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 5, $param);
  }
  public static function bug3(dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 6, $param);
  }

}
/* Hashing disabled */
