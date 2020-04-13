<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class Stdlib__fun {
  <<__Override, __Memoize>>
  public static function get() : Vector<dynamic> {
    
    $runtime = (\Rehack\GlobalObject::get() as dynamic)->jsoo_runtime;
    $call1 = $runtime["caml_call1"];
    $call2 = $runtime["caml_call2"];
    $caml_restore_raw_backtrace = $runtime["caml_restore_raw_backtrace"];
    $caml_wrap_thrown_exception_reraise = $runtime[
       "caml_wrap_thrown_exception_reraise"
     ];
    $cst_Stdlib_Fun_Finally_raised = $runtime["caml_new_string"](
      "Stdlib.Fun.Finally_raised"
    );
    $Stdlib_printexc = Stdlib__printexc::get();
    $const__0 = (dynamic $c, dynamic $param) : dynamic ==> {return $c;};
    $flip = (dynamic $f, dynamic $x, dynamic $y) : dynamic ==> {
      return $call2($f, $y, $x);
    };
    $negate = (dynamic $p, dynamic $v) : dynamic ==> {
      return 1 - $call1($p, $v);
    };
    $Finally_raised = Vector{
      248,
      $cst_Stdlib_Fun_Finally_raised,
      $runtime["caml_fresh_oo_id"](0)
    } as dynamic;
    $protect = (dynamic $finally__0, dynamic $work) : dynamic ==> {
      $work_bt = null as dynamic;
      $result = null as dynamic;
      $finally_no_exn = (dynamic $param) : dynamic ==> {
        $a_ = null as dynamic;
        $exn = null as dynamic;
        $bt = null as dynamic;
        try {$a_ = $call1($finally__0, 0);return $a_;}
        catch(\Throwable $e) {
          $e = $runtime["caml_wrap_exception"]($e);
          $bt = $call1($Stdlib_printexc[9], 0);
          $exn = Vector{0, $Finally_raised, $e} as dynamic;
          $caml_restore_raw_backtrace($exn, $bt);
          throw $caml_wrap_thrown_exception_reraise($exn) as \Throwable;
        }
      };
      try {$result = $call1($work, 0);}
      catch(\Throwable $work_exn) {
        $work_exn = $runtime["caml_wrap_exception"]($work_exn);
        $work_bt = $call1($Stdlib_printexc[9], 0);
        $finally_no_exn(0);
        $caml_restore_raw_backtrace($work_exn, $work_bt);
        throw $caml_wrap_thrown_exception_reraise($work_exn) as \Throwable;
      }
      $finally_no_exn(0);
      return $result;
    };
    $Stdlib_fun = Vector{
      0,
      $const__0,
      $flip,
      $negate,
      $protect,
      $Finally_raised
    } as dynamic;
    
    return($Stdlib_fun);

  }
  public static function _const(dynamic $c, dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 1, $c, $param);
  }
  public static function flip(dynamic $f, dynamic $x, dynamic $y): dynamic {
    return static::syncCall(__FUNCTION__, 2, $f, $x, $y);
  }
  public static function negate(dynamic $p, dynamic $v): dynamic {
    return static::syncCall(__FUNCTION__, 3, $p, $v);
  }
  public static function protect(dynamic $finally, dynamic $work): dynamic {
    return static::syncCall(__FUNCTION__, 4, $finally, $work);
  }

}
/* Hashing disabled */
