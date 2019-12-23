<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class Nativeint {
  <<__Override, __Memoize>>
  public static function requireModule() : Vector<dynamic> {
    $joo_global_object = \Rehack\GlobalObject::get() as dynamic;
    
    $runtime = $joo_global_object->jsoo_runtime;
    $caml_int_compare = $runtime["caml_int_compare"];
    $caml_wrap_thrown_exception_reraise = $runtime[
       "caml_wrap_thrown_exception_reraise"
     ];
    $left_shift_32 = $runtime["left_shift_32"];
    $cst_d = $runtime["caml_new_string"]("%d");
    $Failure =  Failure::requireModule ();
    $Sys =  Sys::requireModule ();
    $zero = 0;
    $one = 1;
    $minus_one = -1;
    $succ = (dynamic $n) ==> {return (int) ($n + 1);};
    $pred = (dynamic $n) ==> {return (int) ($n - 1);};
    $abs = (dynamic $n) ==> {
      return $runtime["caml_greaterequal"]($n, 0) ? $n : ((int) - $n);
    };
    $size = $Sys[10];
    $min_int = $left_shift_32(1, (int) ($size + -1));
    $max_int = (int) ($min_int - 1);
    $lognot = (dynamic $n) ==> {return $n ^ -1;};
    $to_string = (dynamic $n) ==> {
      return $runtime["caml_format_int"]($cst_d, $n);
    };
    $of_string_opt = (dynamic $s) ==> {
      $a_ = null;
      try {$a_ = Vector{0, $runtime["caml_int_of_string"]($s)};return $a_;}
      catch(\Throwable $b_) {
        $b_ = $runtime["caml_wrap_exception"]($b_);
        if ($b_[1] === $Failure) {return 0;}
        throw $caml_wrap_thrown_exception_reraise($b_) as \Throwable;
      }
    };
    $compare = (dynamic $x, dynamic $y) ==> {
      return $caml_int_compare($x, $y);
    };
    $equal = (dynamic $x, dynamic $y) ==> {
      return 0 === $caml_int_compare($x, $y) ? 1 : (0);
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
    
     return ($Nativeint);

  }
  public static function succ(dynamic $n): dynamic {
    return static::callRehackFunction(static::requireModule()[4], varray[$n]);
  }
  public static function pred(dynamic $n): dynamic {
    return static::callRehackFunction(static::requireModule()[5], varray[$n]);
  }
  public static function abs(dynamic $n): dynamic {
    return static::callRehackFunction(static::requireModule()[6], varray[$n]);
  }
  public static function lognot(dynamic $n): dynamic {
    return static::callRehackFunction(static::requireModule()[10], varray[$n]);
  }
  public static function of_string_opt(dynamic $s): dynamic {
    return static::callRehackFunction(static::requireModule()[11], varray[$s]);
  }
  public static function to_string(dynamic $n): dynamic {
    return static::callRehackFunction(static::requireModule()[12], varray[$n]);
  }
  public static function compare(dynamic $x, dynamic $y): dynamic {
    return static::callRehackFunction(static::requireModule()[13], varray[$x, $y]);
  }
  public static function equal(dynamic $x, dynamic $y): dynamic {
    return static::callRehackFunction(static::requireModule()[14], varray[$x, $y]);
  }

}
/* Hashing disabled */
