<?hh
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * Calls.php
 */

namespace Rehack;

final class Calls {
  <<__Memoize>>
  public static function get() {
    $global_object = \Rehack\GlobalObject::get();
    $runtime = \Rehack\Runtime::get();
    /*
     * Soon, these will replace the `global_data->ModuleName`
     * pattern in the load() function.
     */

    Calls::load($global_object);
    $memoized = $runtime->caml_get_global_data()->Calls;
    return $memoized;
  }

  /**
   * Performs module load operation. May have side effects.
   */
  private static function load($joo_global_object) {
    

    $runtime = $joo_global_object->jsoo_runtime;
    $string = $runtime["caml_new_string"];
    $cst_myPartiallyAppliedMethod = $string("myPartiallyAppliedMethod");
    $cst_myPartiallyAppliedMethod__0 = $string("myPartiallyAppliedMethod");
    $cst_myPartiallyAppliedMethod__1 = $string("myPartiallyAppliedMethod");
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
      $s = function(dynamic $Q, dynamic $P) {return $Q($P);};
      $callResult1 = function(dynamic $O) use ($o,$s) {return $s($o, $O);};
      $t = "passThis";
      $u = function(dynamic $N, dynamic $M, dynamic $L) {return $N($M, $L);};
      $callResult2 = function(dynamic $K) use ($o,$t,$u) {
        return $u($o, $t, $K);
      };
      $v = "passThis";
      $w = function(dynamic $J, dynamic $I, dynamic $H, dynamic $G) {return $J($I, $H, $G);
      };
      $callResult3 = function(dynamic $F) use ($bar,$o,$v,$w) {
        return $w($o, $v, $bar, $F);
      };
      $x = "passThis";
      $y = function
      (dynamic $E, dynamic $D, dynamic $C, dynamic $B, dynamic $A) {return $E($D, $C, $B, $A);
      };
      $callResult4 = function(dynamic $z) use ($baz,$o,$x,$y) {
        return $y($o, $x, $baz, $baz, $z);
      };
      return Vector{0, $callResult1, $callResult2, $callResult3, $callResult4};
    };
    $testPartialMethodCalls = function(dynamic $o) use ($bar,$cst_myPartiallyAppliedMethod,$cst_myPartiallyAppliedMethod__0,$cst_myPartiallyAppliedMethod__1,$foo,$runtime) {
      $a = function(dynamic $r, dynamic $q, dynamic $p) use ($runtime) {
        return $runtime["caml_js_meth_call1"]($r, $q, $p);
      };
      $sendResult1 = function(dynamic $o) use ($a,$cst_myPartiallyAppliedMethod) {
        return $a($o, $cst_myPartiallyAppliedMethod, $o);
      };
      $b = function(dynamic $n, dynamic $m, dynamic $l, dynamic $k) use ($runtime) {
        return $runtime["caml_js_meth_call2"]($n, $m, $l, $k);
      };
      $sendResult2 = function(dynamic $j) use ($b,$cst_myPartiallyAppliedMethod__0,$foo,$o) {
        return $b($o, $cst_myPartiallyAppliedMethod__0, $foo, $j);
      };
      $c = function
      (dynamic $i, dynamic $h, dynamic $g, dynamic $f, dynamic $e) use ($runtime) {
        return $runtime["caml_js_meth_call3"]($i, $h, $g, $f, $e);
      };
      $sendResult3 = function(dynamic $d) use ($bar,$c,$cst_myPartiallyAppliedMethod__1,$foo,$o) {
        return $c($o, $cst_myPartiallyAppliedMethod__1, $bar, $foo, $d);
      };
      return Vector{0, $sendResult1, $sendResult2, $sendResult3};
    };
    $Calls = Vector{
      0,
      $foo,
      $bar,
      $baz,
      $testFunctionCalls,
      $testMethodCalls,
      $testPartialFunctionCalls,
      $testPartialMethodCalls
    };
    
    $runtime["caml_register_global"](18, $Calls, "Calls");

  }
}