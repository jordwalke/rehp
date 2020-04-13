<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class Stdlib__nativeint {
  <<__Override, __Memoize>>
  public static function get() : Vector<dynamic> {
    
    $runtime = (\Rehack\GlobalObject::get() as dynamic)->jsoo_runtime;
    $caml_int_compare = $runtime["caml_int_compare"];
    $caml_mul = $runtime["caml_mul"];
    $caml_wrap_thrown_exception_reraise = $runtime[
       "caml_wrap_thrown_exception_reraise"
     ];
    $left_shift_32 = $runtime["left_shift_32"];
    $unsigned_right_shift_32 = $runtime["unsigned_right_shift_32"];
    $cst_d = $runtime["caml_new_string"]("%d");
    $Stdlib = Stdlib::get();
    $Stdlib_sys = Stdlib__sys::get();
    $zero = 0 as dynamic;
    $one = 1 as dynamic;
    $minus_one = -1 as dynamic;
    $succ = (dynamic $n) : dynamic ==> {return (int) ($n + 1);};
    $pred = (dynamic $n) : dynamic ==> {return (int) ($n - 1);};
    $abs = (dynamic $n) : dynamic ==> {
      return $runtime["caml_greaterequal"]($n, 0) ? $n : ((int) - $n);
    };
    $size = $Stdlib_sys[10];
    $min_int = $left_shift_32(1, (int) ($size + -1));
    $max_int = (int) ($min_int - 1) as dynamic;
    $lognot = (dynamic $n) : dynamic ==> {return $n ^ -1;};
    $max_int__0 = $Stdlib[19];
    $unsigned_to_int = (dynamic $n) : dynamic ==> {
      if (! (0 < $caml_int_compare(0, $n))) {
        if (! (0 < $caml_int_compare($n, $max_int__0))) {return Vector{0, $n};}
      }
      return 0;
    };
    $to_string = (dynamic $n) : dynamic ==> {
      return $runtime["caml_format_int"]($cst_d, $n);
    };
    $of_string_opt = (dynamic $s) : dynamic ==> {
      $a_ = null as dynamic;
      try {
        $a_ = Vector{0, $runtime["caml_int_of_string"]($s)} as dynamic;
        return $a_;
      }
      catch(\Throwable $b_) {
        $b_ = $runtime["caml_wrap_exception"]($b_);
        if ($b_[1] === $Stdlib[7]) {return 0;}
        throw $caml_wrap_thrown_exception_reraise($b_) as \Throwable;
      }
    };
    $compare = (dynamic $x, dynamic $y) : dynamic ==> {
      return $caml_int_compare($x, $y);
    };
    $equal = (dynamic $x, dynamic $y) : dynamic ==> {
      return 0 === $compare($x, $y) ? 1 : (0);
    };
    $unsigned_compare = (dynamic $n, dynamic $m) : dynamic ==> {
      return $compare((int) ($n - $min_int), (int) ($m - $min_int));
    };
    $unsigned_div = (dynamic $n, dynamic $d) : dynamic ==> {
      if ($runtime["caml_lessthan"]($d, 0)) {
        return 0 <= $unsigned_compare($n, $d) ? $one : ($zero);
      }
      $q = $left_shift_32(
        $runtime["caml_div"]((int) $unsigned_right_shift_32($n, 1), $d),
        1
      );
      $r = (int) ($n - $caml_mul($q, $d)) as dynamic;
      return 0 <= $unsigned_compare($r, $d) ? $succ($q) : ($q);
    };
    $unsigned_rem = (dynamic $n, dynamic $d) : dynamic ==> {
      return (int) ($n - $caml_mul($unsigned_div($n, $d), $d));
    };
    $Stdlib_nativeint = Vector{
      0,
      $zero,
      $one,
      $minus_one,
      $unsigned_div,
      $unsigned_rem,
      $succ,
      $pred,
      $abs,
      $size,
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
    
    return($Stdlib_nativeint);

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
    return static::syncCall(__FUNCTION__, 12, $n);
  }
  public static function unsigned_to_int(dynamic $n): dynamic {
    return static::syncCall(__FUNCTION__, 13, $n);
  }
  public static function of_string_opt(dynamic $s): dynamic {
    return static::syncCall(__FUNCTION__, 14, $s);
  }
  public static function to_string(dynamic $n): dynamic {
    return static::syncCall(__FUNCTION__, 15, $n);
  }
  public static function compare(dynamic $x, dynamic $y): dynamic {
    return static::syncCall(__FUNCTION__, 16, $x, $y);
  }
  public static function unsigned_compare(dynamic $n, dynamic $m): dynamic {
    return static::syncCall(__FUNCTION__, 17, $n, $m);
  }
  public static function equal(dynamic $x, dynamic $y): dynamic {
    return static::syncCall(__FUNCTION__, 18, $x, $y);
  }

}
/* Hashing disabled */
