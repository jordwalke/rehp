<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class MyLib {
  <<__Override, __Memoize>>
  public static function get() : Vector<dynamic> {
    $joo_global_object = \Rehack\GlobalObject::get() as dynamic;
    
    $runtime = $joo_global_object->jsoo_runtime;
    $call1 = $runtime["caml_call1"];
    $string = $runtime["caml_new_string"];
    $cst_myPartiallyAppliedMethod = $string("myPartiallyAppliedMethod");
    $cst_myPartiallyAppliedMethod__0 = $string("myPartiallyAppliedMethod");
    $cst_myPartiallyAppliedMethod__1 = $string("myPartiallyAppliedMethod");
    $MyLib_MyLibUtility =  MyLib__MyLibUtility::get ();
    $foo = "foo";
    $bar = "bar";
    $baz = "baz";
    $testFunctionCalls = function(dynamic $o) use ($bar,$baz,$foo) {
      $withArgsResult = $o($foo);
      $callResult = $o();
      $callResult1 = $o("passThis");
      $callResult2 = $o("passThis", $foo);
      $callResult3 = $o("passThis", $bar, $bar);
      $callResult4 = $o("passThis", $baz, $baz, $baz);
      return Vector{
        0,
        $withArgsResult,
        $callResult,
        $callResult1,
        $callResult2,
        $callResult3,
        $callResult4
      };
    };
    $testMethodCalls = function(dynamic $o) use ($bar,$foo) {
      $withArgsResult = $o->yourMethod($foo);
      $sendResult = $o->myMethod();
      $sendResult1 = $o->myMethod($foo);
      $sendResult2 = $o->myMethod($foo, $foo);
      $sendResult3 = $o->myMethod($bar, $foo, $foo);
      return Vector{
        0,
        $withArgsResult,
        $sendResult,
        $sendResult1,
        $sendResult2,
        $sendResult3
      };
    };
    $testPartialFunctionCalls = function(dynamic $o) use ($bar,$baz) {
      $s_ = function(dynamic $Q_, dynamic $P_) {return $Q_($P_);};
      $callResult1 = function(dynamic $O_) use ($o,$s_) {return $s_($o, $O_);};
      $t_ = "passThis";
      $u_ = function(dynamic $N_, dynamic $M_, dynamic $L_) {return $N_($M_, $L_);
      };
      $callResult2 = function(dynamic $K_) use ($o,$t_,$u_) {
        return $u_($o, $t_, $K_);
      };
      $v_ = "passThis";
      $w_ = function(dynamic $J_, dynamic $I_, dynamic $H_, dynamic $G_) {return $J_($I_, $H_, $G_);
      };
      $callResult3 = function(dynamic $F_) use ($bar,$o,$v_,$w_) {
        return $w_($o, $v_, $bar, $F_);
      };
      $x_ = "passThis";
      $y_ = function
      (dynamic $E_, dynamic $D_, dynamic $C_, dynamic $B_, dynamic $A_) {return $E_($D_, $C_, $B_, $A_);
      };
      $callResult4 = function(dynamic $z_) use ($baz,$o,$x_,$y_) {
        return $y_($o, $x_, $baz, $baz, $z_);
      };
      return Vector{0, $callResult1, $callResult2, $callResult3, $callResult4};
    };
    $testPartialMethodCalls = function(dynamic $o) use ($bar,$cst_myPartiallyAppliedMethod,$cst_myPartiallyAppliedMethod__0,$cst_myPartiallyAppliedMethod__1,$foo,$runtime) {
      $a_ = function(dynamic $r_, dynamic $q_, dynamic $p_) use ($runtime) {
        return $runtime["caml_js_meth_call1"]($r_, $q_, $p_);
      };
      $sendResult1 = function(dynamic $o_) use ($a_,$cst_myPartiallyAppliedMethod,$o) {
        return $a_($o, $cst_myPartiallyAppliedMethod, $o_);
      };
      $b_ = function(dynamic $n_, dynamic $m_, dynamic $l_, dynamic $k_) use ($runtime) {
        return $runtime["caml_js_meth_call2"]($n_, $m_, $l_, $k_);
      };
      $sendResult2 = function(dynamic $j_) use ($b_,$cst_myPartiallyAppliedMethod__0,$foo,$o) {
        return $b_($o, $cst_myPartiallyAppliedMethod__0, $foo, $j_);
      };
      $c_ = function
      (dynamic $i_, dynamic $h_, dynamic $g_, dynamic $f_, dynamic $e_) use ($runtime) {
        return $runtime["caml_js_meth_call3"]($i_, $h_, $g_, $f_, $e_);
      };
      $sendResult3 = function(dynamic $d_) use ($bar,$c_,$cst_myPartiallyAppliedMethod__1,$foo,$o) {
        return $c_($o, $cst_myPartiallyAppliedMethod__1, $bar, $foo, $d_);
      };
      return Vector{0, $sendResult1, $sendResult2, $sendResult3};
    };
    $x = $call1($MyLib_MyLibUtility[1], 0);
    $MyLib = Vector{
      0,
      $foo,
      $bar,
      $baz,
      $testFunctionCalls,
      $testMethodCalls,
      $testPartialFunctionCalls,
      $testPartialMethodCalls,
      $x
    };
    
     return ($MyLib);

  }
  public static function x() {
    return static::get()[8]();
  }
  public static function testPartialMethodCalls(dynamic $o) {
    return static::get()[7]($o);
  }
  public static function testPartialFunctionCalls(dynamic $o) {
    return static::get()[6]($o);
  }
  public static function testMethodCalls(dynamic $o) {
    return static::get()[5]($o);
  }
  public static function testFunctionCalls(dynamic $o) {
    return static::get()[4]($o);
  }
  public static function baz() {
    return static::get()[3]();
  }
  public static function bar() {
    return static::get()[2]();
  }
  public static function foo() {
    return static::get()[1]();
  }

}
/* Hashing disabled */
