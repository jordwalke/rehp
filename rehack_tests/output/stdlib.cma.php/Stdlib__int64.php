<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class Stdlib__int64 {
  <<__Override, __Memoize>>
  public static function get() : Vector<dynamic> {
    
    $runtime = (\Rehack\GlobalObject::get() as dynamic)->jsoo_runtime;
    $caml_int64_compare = $runtime["caml_int64_compare"];
    $caml_int64_mul = $runtime["caml_int64_mul"];
    $caml_int64_sub = $runtime["caml_int64_sub"];
    $caml_wrap_thrown_exception_reraise = $runtime[
       "caml_wrap_thrown_exception_reraise"
     ];
    $cst_d = $runtime["caml_new_string"]("%d");
    $zero = Vector{255, 0, 0, 0} as dynamic;
    $one = Vector{255, 1, 0, 0} as dynamic;
    $minus_one = Vector{255, 16777215, 16777215, 65535} as dynamic;
    $min_int = Vector{255, 0, 0, 32768} as dynamic;
    $max_int = Vector{255, 16777215, 16777215, 32767} as dynamic;
    $Stdlib = Stdlib::get();
    $d_ = Vector{255, 16777215, 16777215, 65535} as dynamic;
    $c_ = Vector{255, 0, 0, 0} as dynamic;
    $b_ = Vector{255, 1, 0, 0} as dynamic;
    $a_ = Vector{255, 1, 0, 0} as dynamic;
    $succ = (dynamic $n) : dynamic ==> {
      return $runtime["caml_int64_add"]($n, $a_);
    };
    $pred = (dynamic $n) : dynamic ==> {return $caml_int64_sub($n, $b_);};
    $abs = (dynamic $n) : dynamic ==> {
      return $runtime["caml_greaterequal"]($n, $c_)
        ? $n
        : ($runtime["caml_int64_neg"]($n));
    };
    $lognot = (dynamic $n) : dynamic ==> {
      return $runtime["caml_int64_xor"]($n, $d_);
    };
    $max_int__0 = $runtime["caml_int64_of_int32"]($Stdlib[19]);
    $unsigned_to_int = (dynamic $n) : dynamic ==> {
      if (! (0 < $caml_int64_compare($zero, $n))) {
        if (! (0 < $caml_int64_compare($n, $max_int__0))) {
          return Vector{0, $runtime["caml_int64_to_int32"]($n)};
        }
      }
      return 0;
    };
    $to_string = (dynamic $n) : dynamic ==> {
      return $runtime["caml_int64_format"]($cst_d, $n);
    };
    $of_string_opt = (dynamic $s) : dynamic ==> {
      $e_ = null as dynamic;
      try {
        $e_ = Vector{0, $runtime["caml_int64_of_string"]($s)} as dynamic;
        return $e_;
      }
      catch(\Throwable $f_) {
        $f_ = $runtime["caml_wrap_exception"]($f_);
        if ($f_[1] === $Stdlib[7]) {return 0;}
        throw $caml_wrap_thrown_exception_reraise($f_) as \Throwable;
      }
    };
    $compare = (dynamic $x, dynamic $y) : dynamic ==> {
      return $caml_int64_compare($x, $y);
    };
    $equal = (dynamic $x, dynamic $y) : dynamic ==> {
      return 0 === $compare($x, $y) ? 1 : (0);
    };
    $unsigned_compare = (dynamic $n, dynamic $m) : dynamic ==> {
      return $compare(
        $caml_int64_sub($n, $min_int),
        $caml_int64_sub($m, $min_int)
      );
    };
    $unsigned_div = (dynamic $n, dynamic $d) : dynamic ==> {
      if ($runtime["caml_lessthan"]($d, $zero)) {
        return 0 <= $unsigned_compare($n, $d) ? $one : ($zero);
      }
      $q = $runtime["caml_int64_shift_left"](
        $runtime["caml_int64_div"](
          $runtime["caml_int64_shift_right_unsigned"]($n, 1),
          $d
        ),
        1
      );
      $r = $caml_int64_sub($n, $caml_int64_mul($q, $d));
      return 0 <= $unsigned_compare($r, $d) ? $succ($q) : ($q);
    };
    $unsigned_rem = (dynamic $n, dynamic $d) : dynamic ==> {
      return $caml_int64_sub($n, $caml_int64_mul($unsigned_div($n, $d), $d));
    };
    $Stdlib_int64 = Vector{
      0,
      $zero,
      $one,
      $minus_one,
      $unsigned_div,
      $unsigned_rem,
      $succ,
      $pred,
      $abs,
      $max_int,
      $min_int,
      $lognot,
      $unsigned_to_int,
      $of_string_opt,
      $to_string,
      $compare,
      $unsigned_compare,
      $equal
    } as dynamic;
    
    return($Stdlib_int64);

  }
  public static function unsigned_div(dynamic $n, dynamic $d): dynamic {
    return static::syncCall(__FUNCTION__, 4, $n, $d);
  }
  public static function unsigned_rem(dynamic $n, dynamic $d): dynamic {
    return static::syncCall(__FUNCTION__, 5, $n, $d);
  }
  public static function succ(dynamic $n): dynamic {
    return static::syncCall(__FUNCTION__, 6, $n);
  }
  public static function pred(dynamic $n): dynamic {
    return static::syncCall(__FUNCTION__, 7, $n);
  }
  public static function abs(dynamic $n): dynamic {
    return static::syncCall(__FUNCTION__, 8, $n);
  }
  public static function lognot(dynamic $n): dynamic {
    return static::syncCall(__FUNCTION__, 11, $n);
  }
  public static function unsigned_to_int(dynamic $n): dynamic {
    return static::syncCall(__FUNCTION__, 12, $n);
  }
  public static function of_string_opt(dynamic $s): dynamic {
    return static::syncCall(__FUNCTION__, 13, $s);
  }
  public static function to_string(dynamic $n): dynamic {
    return static::syncCall(__FUNCTION__, 14, $n);
  }
  public static function compare(dynamic $x, dynamic $y): dynamic {
    return static::syncCall(__FUNCTION__, 15, $x, $y);
  }
  public static function unsigned_compare(dynamic $n, dynamic $m): dynamic {
    return static::syncCall(__FUNCTION__, 16, $n, $m);
  }
  public static function equal(dynamic $x, dynamic $y): dynamic {
    return static::syncCall(__FUNCTION__, 17, $x, $y);
  }

}
/* Hashing disabled */
