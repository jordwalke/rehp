<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class Complex {
  <<__Override, __Memoize>>
  public static function get() : Vector<dynamic> {
    $joo_global_object = \Rehack\GlobalObject::get() as dynamic;
    
    $runtime = $joo_global_object->jsoo_runtime;
    $zero = Vector{254, 0, 0};
    $one = Vector{254, 1, 0};
    $i = Vector{254, 0, 1};
    $a_ = Vector{254, 0, 0};
    $add = function(dynamic $x, dynamic $y) {
      return Vector{254, $x[1] + $y[1], $x[2] + $y[2]};
    };
    $sub = function(dynamic $x, dynamic $y) {
      return Vector{254, $x[1] - $y[1], $x[2] - $y[2]};
    };
    $neg = function(dynamic $x) {return Vector{254, - $x[1], - $x[2]};};
    $conj = function(dynamic $x) {return Vector{254, $x[1], - $x[2]};};
    $mul = function(dynamic $x, dynamic $y) {
      return Vector{
        254,
        $x[1] *
          $y[1] -
          $x[2] *
            $y[2],
        $x[1] *
          $y[2] +
          $x[2] *
            $y[1]
      };
    };
    $div = function(dynamic $x, dynamic $y) use ($Math) {
      if ($Math->abs($y[2]) <= $Math->abs($y[1])) {
        $r = $y[2] / $y[1];
        $d = $y[1] + $r * $y[2];
        return Vector{
          254,
          ($x[1] + $r * $x[2]) / $d,
          ($x[2] - $r * $x[1]) / $d
        };
      }
      $r__0 = $y[1] / $y[2];
      $d__0 = $y[2] + $r__0 * $y[1];
      return Vector{
        254,
        ($r__0 * $x[1] + $x[2]) / $d__0,
        ($r__0 * $x[2] - $x[1]) / $d__0
      };
    };
    $inv = function(dynamic $x) use ($div,$one) {return $div($one, $x);};
    $norm2 = function(dynamic $x) {return $x[1] * $x[1] + $x[2] * $x[2];};
    $norm = function(dynamic $x) use ($Math) {
      $r = $Math->abs($x[1]);
      $i = $Math->abs($x[2]);
      if ($r == 0) {return $i;}
      if ($i == 0) {return $r;}
      if ($i <= $r) {$q = $i / $r;return $r * $Math->sqrt(1 + $q * $q);}
      $q__0 = $r / $i;
      return $i * $Math->sqrt(1 + $q__0 * $q__0);
    };
    $arg = function(dynamic $x) use ($Math) {
      return $Math->atan2($x[2], $x[1]);
    };
    $polar = function(dynamic $n, dynamic $a) use ($Math) {
      return Vector{254, $Math->cos($a) * $n, $Math->sin($a) * $n};
    };
    $sqrt = function(dynamic $x) use ($Math,$a_) {
      if ($x[1] == 0) {if ($x[2] == 0) {return $a_;}}
      $r = $Math->abs($x[1]);
      $i = $Math->abs($x[2]);
      if ($i <= $r) {
        $q = $i / $r;
        $w = $Math->sqrt($r) *
          $Math->sqrt(0.5 * (1 + $Math->sqrt(1 + $q * $q)));
      }
      else {
        $q__0 = $r / $i;
        $w = $Math->sqrt($i) *
          $Math->sqrt(0.5 * ($q__0 + $Math->sqrt(1 + $q__0 * $q__0)));
      }
      if (0 <= $x[1]) {return Vector{254, $w, 0.5 * $x[2] / $w};}
      $w__0 = 0 <= $x[2] ? $w : (- $w);
      return Vector{254, 0.5 * $i / $w, $w__0};
    };
    $exp = function(dynamic $x) use ($Math) {
      $e = $Math->exp($x[1]);
      return Vector{254, $e * $Math->cos($x[2]), $e * $Math->sin($x[2])};
    };
    $log = function(dynamic $x) use ($Math,$norm) {
      $b_ = $Math->atan2($x[2], $x[1]);
      return Vector{254, $Math->log($norm($x)), $b_};
    };
    $pow = function(dynamic $x, dynamic $y) use ($exp,$log,$mul) {
      return $exp($mul($y, $log($x)));
    };
    $Complex = Vector{
      0,
      $zero,
      $one,
      $i,
      $neg,
      $conj,
      $add,
      $sub,
      $mul,
      $inv,
      $div,
      $sqrt,
      $norm2,
      $norm,
      $arg,
      $polar,
      $exp,
      $log,
      $pow
    };
    
     return ($Complex);

  }
  public static function pow(dynamic $x, dynamic $y) {
    return static::get()[18]($x, $y);
  }
  public static function log(dynamic $x) {
    return static::get()[17]($x);
  }
  public static function exp(dynamic $x) {
    return static::get()[16]($x);
  }
  public static function polar(dynamic $n, dynamic $a) {
    return static::get()[15]($n, $a);
  }
  public static function arg(dynamic $x) {
    return static::get()[14]($x);
  }
  public static function norm(dynamic $x) {
    return static::get()[13]($x);
  }
  public static function norm2(dynamic $x) {
    return static::get()[12]($x);
  }
  public static function sqrt(dynamic $x) {
    return static::get()[11]($x);
  }
  public static function div(dynamic $x, dynamic $y) {
    return static::get()[10]($x, $y);
  }
  public static function inv(dynamic $x) {
    return static::get()[9]($x);
  }
  public static function mul(dynamic $x, dynamic $y) {
    return static::get()[8]($x, $y);
  }
  public static function sub(dynamic $x, dynamic $y) {
    return static::get()[7]($x, $y);
  }
  public static function add(dynamic $x, dynamic $y) {
    return static::get()[6]($x, $y);
  }
  public static function conj(dynamic $x) {
    return static::get()[5]($x);
  }
  public static function neg(dynamic $x) {
    return static::get()[4]($x);
  }
  public static function i() {
    return static::get()[3]();
  }
  public static function one() {
    return static::get()[2]();
  }
  public static function zero() {
    return static::get()[1]();
  }

}
/* Hashing disabled */
