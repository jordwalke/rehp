<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class Nativeint {
  <<__Override, __Memoize>>
  public static function get() : Vector<dynamic> {
    
    $runtime = (\Rehack\GlobalObject::get() as dynamic)->jsoo_runtime;
    $caml_wrap_thrown_exception_reraise = $runtime[
       "caml_wrap_thrown_exception_reraise"
     ];
    $left_shift_32 = $runtime["left_shift_32"];
    $cst_d = $runtime["caml_new_string"]("%d");
    $Failure = Failure::get();
    $Sys = Sys::get();
    $zero = 0 as dynamic;
    $one = 1 as dynamic;
    $minus_one = -1 as dynamic;
    $succ = (dynamic $n) : dynamic ==> {return (int) ($n + 1);};
    $pred = (dynamic $n) : dynamic ==> {return (int) ($n - 1);};
    $abs = (dynamic $n) : dynamic ==> {
      return $runtime["caml_greaterequal"]($n, 0) ? $n : ((int) - $n);
    };
    $size = $Sys[10];
    $min_int = $left_shift_32(1, (int) ($size + -1));
    $max_int = (int) ($min_int - 1) as dynamic;
    $lognot = (dynamic $n) : dynamic ==> {return $n ^ -1;};
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
        if ($b_[1] === $Failure) {return 0;}
        throw $caml_wrap_thrown_exception_reraise($b_) as \Throwable;
      }
    };
    $compare = (dynamic $x, dynamic $y) : dynamic ==> {
      return $runtime["caml_int_compare"]($x, $y);
    };
    $equal = (dynamic $x, dynamic $y) : dynamic ==> {
      return 0 === $compare($x, $y) ? 1 : (0);
    };
    $Nativeint = Vector{
      0,
      $zero,
      $one,
      $minus_one,
      $succ,
      $pred,
      $abs,
      $size,
      $max_int,
      $min_int,
      $lognot,
      $of_string_opt,
      $to_string,
      $compare,
      $equal
    } as dynamic;
    
    return($Nativeint);

  }
  public static function succ(dynamic $n): dynamic {
    return static::syncCall(__FUNCTION__, 4, $n);
  }
  public static function pred(dynamic $n): dynamic {
    return static::syncCall(__FUNCTION__, 5, $n);
  }
  public static function abs(dynamic $n): dynamic {
    return static::syncCall(__FUNCTION__, 6, $n);
  }
  public static function lognot(dynamic $n): dynamic {
    return static::syncCall(__FUNCTION__, 10, $n);
  }
  public static function of_string_opt(dynamic $s): dynamic {
    return static::syncCall(__FUNCTION__, 11, $s);
  }
  public static function to_string(dynamic $n): dynamic {
    return static::syncCall(__FUNCTION__, 12, $n);
  }
  public static function compare(dynamic $x, dynamic $y): dynamic {
    return static::syncCall(__FUNCTION__, 13, $x, $y);
  }
  public static function equal(dynamic $x, dynamic $y): dynamic {
    return static::syncCall(__FUNCTION__, 14, $x, $y);
  }

}
/* Hashing disabled */
