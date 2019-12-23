<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class Complex {
  <<__Override, __Memoize>>
  public static function requireModule() : Vector<dynamic> {
    $joo_global_object = \Rehack\GlobalObject::get() as dynamic;
    
    $runtime = $joo_global_object->jsoo_runtime;
    $zero = Vector{254, 0, 0};
    $one = Vector{254, 1, 0};
    $i = Vector{254, 0, 1};
    $a_ = Vector{254, 0, 0};
    $add = (dynamic $x, dynamic $y) ==> {
      return Vector{254, $x[1] + $y[1], $x[2] + $y[2]};
    };
    $sub = (dynamic $x, dynamic $y) ==> {
      return Vector{254, $x[1] - $y[1], $x[2] - $y[2]};
    };
    $neg = (dynamic $x) ==> {return Vector{254, - $x[1], - $x[2]};};
    $conj = (dynamic $x) ==> {return Vector{254, $x[1], - $x[2]};};
    $mul = (dynamic $x, dynamic $y) ==> {
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
    $div = (dynamic $x, dynamic $y) ==> {
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
    $inv = (dynamic $x) ==> {return $div($one, $x);};
    $norm2 = (dynamic $x) ==> {return $x[1] * $x[1] + $x[2] * $x[2];};
    $norm = (dynamic $x) ==> {
      $r = $Math->abs($x[1]);
      $i = $Math->abs($x[2]);
      if ($r == 0) {return $i;}
      if ($i == 0) {return $r;}
      if ($i <= $r) {$q = $i / $r;return $r * $Math->sqrt(1 + $q * $q);}
      $q__0 = $r / $i;
      return $i * $Math->sqrt(1 + $q__0 * $q__0);
    };
    $arg = (dynamic $x) ==> {return $Math->atan2($x[2], $x[1]);};
    $polar = (dynamic $n, dynamic $a) ==> {
      return Vector{254, $Math->cos($a) * $n, $Math->sin($a) * $n};
    };
    $sqrt = (dynamic $x) ==> {
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
    $exp = (dynamic $x) ==> {
      $e = $Math->exp($x[1]);
      return Vector{254, $e * $Math->cos($x[2]), $e * $Math->sin($x[2])};
    };
    $log = (dynamic $x) ==> {
      $b_ = $Math->atan2($x[2], $x[1]);
      return Vector{254, $Math->log($norm($x)), $b_};
    };
    $pow = (dynamic $x, dynamic $y) ==> {return $exp($mul($y, $log($x)));};
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
  public static function zero(): dynamic {
    return static::callRehackFunction(static::requireModule()[1], varray[]);
  }
  public static function one(): dynamic {
    return static::callRehackFunction(static::requireModule()[2], varray[]);
  }
  public static function i(): dynamic {
    return static::callRehackFunction(static::requireModule()[3], varray[]);
  }
  public static function neg(dynamic $x): dynamic {
    return static::callRehackFunction(static::requireModule()[4], varray[$x]);
  }
  public static function conj(dynamic $x): dynamic {
    return static::callRehackFunction(static::requireModule()[5], varray[$x]);
  }
  public static function add(dynamic $x, dynamic $y): dynamic {
    return static::callRehackFunction(static::requireModule()[6], varray[$x, $y]);
  }
  public static function sub(dynamic $x, dynamic $y): dynamic {
    return static::callRehackFunction(static::requireModule()[7], varray[$x, $y]);
  }
  public static function mul(dynamic $x, dynamic $y): dynamic {
    return static::callRehackFunction(static::requireModule()[8], varray[$x, $y]);
  }
  public static function inv(dynamic $x): dynamic {
    return static::callRehackFunction(static::requireModule()[9], varray[$x]);
  }
  public static function div(dynamic $x, dynamic $y): dynamic {
    return static::callRehackFunction(static::requireModule()[10], varray[$x, $y]);
  }
  public static function sqrt(dynamic $x): dynamic {
    return static::callRehackFunction(static::requireModule()[11], varray[$x]);
  }
  public static function norm2(dynamic $x): dynamic {
    return static::callRehackFunction(static::requireModule()[12], varray[$x]);
  }
  public static function norm(dynamic $x): dynamic {
    return static::callRehackFunction(static::requireModule()[13], varray[$x]);
  }
  public static function arg(dynamic $x): dynamic {
    return static::callRehackFunction(static::requireModule()[14], varray[$x]);
  }
  public static function polar(dynamic $n, dynamic $a): dynamic {
    return static::callRehackFunction(static::requireModule()[15], varray[$n, $a]);
  }
  public static function exp(dynamic $x): dynamic {
    return static::callRehackFunction(static::requireModule()[16], varray[$x]);
  }
  public static function log(dynamic $x): dynamic {
    return static::callRehackFunction(static::requireModule()[17], varray[$x]);
  }
  public static function pow(dynamic $x, dynamic $y): dynamic {
    return static::callRehackFunction(static::requireModule()[18], varray[$x, $y]);
  }

}
/* Hashing disabled */
