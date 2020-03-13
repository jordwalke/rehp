<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class Calls {
  <<__Override, __Memoize>>
  public static function get() : Vector<dynamic> {
    
    $runtime = (\Rehack\GlobalObject::get() as dynamic)->jsoo_runtime;
    $call1 = $runtime["caml_call1"];
    $string = $runtime["caml_new_string"];
    $cst_me = $string("me");
    $cst_fix = $string("fix");
    $cst_bye = $string("bye");
    $cst_hi__0 = $string("hi");
    $cst_myPartiallyAppliedMethod = $string("myPartiallyAppliedMethod");
    $cst_myPartiallyAppliedMethod__0 = $string("myPartiallyAppliedMethod");
    $cst_myPartiallyAppliedMethod__1 = $string("myPartiallyAppliedMethod");
    $cst_one = $string("one");
    $cst_one_double = $string("one-double");
    $cst_two = $string("two");
    $cst_two__0 = $string("two");
    $cst_hi = $string("hi");
    $c_ = Vector{0, 100, 0} as dynamic;
    $a_ = Vector{0, 100, 0} as dynamic;
    $foo = "foo";
    $bar = "bar";
    $baz = "baz";
    $testFunctionCalls = (dynamic $o) : dynamic ==> {
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
    $testMethodCalls = (dynamic $o) : dynamic ==> {
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
    $testPartialFunctionCalls = (dynamic $s) : dynamic ==> {
      $J_ = (dynamic $ah_, dynamic $ag_) : dynamic ==> {return $ah_($ag_);};
      $callResult1 = (dynamic $af_) : dynamic ==> {return $J_($s, $af_);};
      $K_ = "passThis";
      $L_ = (dynamic $ae_, dynamic $ad_, dynamic $ac_) : dynamic ==> {return $ae_($ad_, $ac_);
      };
      $callResult2 = (dynamic $ab_) : dynamic ==> {return $L_($s, $K_, $ab_);};
      $M_ = "passThis";
      $N_ = (dynamic $aa_, dynamic $Z_, dynamic $Y_, dynamic $X_) : dynamic ==> {return $aa_($Z_, $Y_, $X_);
      };
      $callResult3 = (dynamic $W_) : dynamic ==> {
        return $N_($s, $M_, $bar, $W_);
      };
      $O_ = "passThis";
      $P_ = (dynamic $V_, dynamic $U_, dynamic $T_, dynamic $S_, dynamic $R_) : dynamic ==> {return $V_($U_, $T_, $S_, $R_);
      };
      $callResult4 = (dynamic $Q_) : dynamic ==> {
        return $P_($s, $O_, $baz, $baz, $Q_);
      };
      return Vector{0, $callResult1, $callResult2, $callResult3, $callResult4};
    };
    $testPartialMethodCalls = (dynamic $o) : dynamic ==> {
      $r_ = (dynamic $I_, dynamic $H_, dynamic $G_) : dynamic ==> {
        return $runtime["caml_js_meth_call1"]($I_, $H_, $G_);
      };
      $sendResult1 = (dynamic $F_) : dynamic ==> {
        return $r_($o, $cst_myPartiallyAppliedMethod, $F_);
      };
      $s_ = (dynamic $E_, dynamic $D_, dynamic $C_, dynamic $B_) : dynamic ==> {
        return $runtime["caml_js_meth_call2"]($E_, $D_, $C_, $B_);
      };
      $sendResult2 = (dynamic $A_) : dynamic ==> {
        return $s_($o, $cst_myPartiallyAppliedMethod__0, $foo, $A_);
      };
      $t_ = (dynamic $z_, dynamic $y_, dynamic $x_, dynamic $w_, dynamic $v_) : dynamic ==> {
        return $runtime["caml_js_meth_call3"]($z_, $y_, $x_, $w_, $v_);
      };
      $sendResult3 = (dynamic $u_) : dynamic ==> {
        return $t_($o, $cst_myPartiallyAppliedMethod__1, $bar, $foo, $u_);
      };
      return Vector{0, $sendResult1, $sendResult2, $sendResult3};
    };
    $resultMake1Array = varray[$cst_one];
    $resultMake1ArraySideEffect = varray[$runtime["side_effect"](0)];
    $wrapMake1Array = (dynamic $x) : dynamic ==> {return (varray[$x]);};
    $reexportCallMake1Array = (dynamic $q_) : dynamic ==> {
      return (varray[$q_]);
    };
    $partiallyCallMake1Array = (dynamic $p_) : dynamic ==> {
      return (varray[$p_]);
    };
    $overCallMake1Array = $call1(varray[0], 0);
    $closeOverMake1Array = (dynamic $param) : dynamic ==> {
      $tmp = varray[999];
      return Vector{0, $tmp, $a_};
    };
    $r = Vector{0, 0} as dynamic;
    $resultMake1ArrayDouble = varray[$cst_one_double, $cst_one_double];
    $b_ = $runtime["side_effect"](0);
    $resultMake1ArrayDoubleSideEffect = varray[$b_, $b_];
    $wrapMake1ArrayDouble = (dynamic $x) : dynamic ==> {
      return (varray[$x, $x]);
    };
    $reexportCallMake1ArrayDouble = (dynamic $o_) : dynamic ==> {
      return (varray[$o_, $o_]);
    };
    $partiallyCallMake1ArrayDouble = (dynamic $n_) : dynamic ==> {
      return (varray[$n_, $n_]);
    };
    $overCallMake1ArrayDouble = $call1(varray[0, 0], 0);
    $closeOverMake1ArrayDouble = (dynamic $param) : dynamic ==> {
      $tmp = varray[999, 999];
      return Vector{0, $tmp, $c_};
    };
    $d_ = $runtime["side_effect"](0);
    $resultMake2ArraySideEffect = varray[$runtime["side_effect"](0), $d_];
    $resultMake2Array = varray[$cst_two__0, $cst_two];
    $wrapMake2Array = (dynamic $x, dynamic $y) : dynamic ==> {
      return (varray[$x, $y]);
    };
    $reexportCallMake2Array = (dynamic $m_, dynamic $l_) : dynamic ==> {
      return (varray[$m_, $l_]);
    };
    $e_ = (dynamic $k_, dynamic $j_) : dynamic ==> {
      return (varray[$k_, $j_]);
    };
    $partiallyCallMake2Array = (dynamic $i_) : dynamic ==> {
      return $e_($cst_hi, $i_);
    };
    $overCallMake2Array = $call1(varray[0, 0], 0);
    $closeOverMake2Array = (dynamic $param) : dynamic ==> {
      return (varray[$cst_hi__0, $cst_bye]);
    };
    $make1Array = (dynamic $h_) : dynamic ==> {return (varray[$h_]);};
    $make2Array = (dynamic $g_, dynamic $f_) : dynamic ==> {
      return (varray[$g_, $f_]);
    };
    $ReexportedMacros = Vector{0, $make1Array, $make2Array} as dynamic;
    $callsAFunctionWithSuppression = (dynamic $param) : dynamic ==> {
      return (// HH_IGNORE blah blah
SomeUtilityClass::foo($cst_fix, $cst_me)
      );
    };
    $Calls = Vector{
      0,
      $foo,
      $bar,
      $baz,
      $testFunctionCalls,
      $testMethodCalls,
      $testPartialFunctionCalls,
      $testPartialMethodCalls,
      $resultMake1Array,
      $resultMake1ArraySideEffect,
      $wrapMake1Array,
      $reexportCallMake1Array,
      $partiallyCallMake1Array,
      $overCallMake1Array,
      $closeOverMake1Array,
      $r,
      $resultMake1ArrayDouble,
      $resultMake1ArrayDoubleSideEffect,
      $wrapMake1ArrayDouble,
      $reexportCallMake1ArrayDouble,
      $partiallyCallMake1ArrayDouble,
      $overCallMake1ArrayDouble,
      $closeOverMake1ArrayDouble,
      $resultMake2ArraySideEffect,
      $resultMake2Array,
      $wrapMake2Array,
      $reexportCallMake2Array,
      $partiallyCallMake2Array,
      $overCallMake2Array,
      $closeOverMake2Array,
      $ReexportedMacros,
      $callsAFunctionWithSuppression
    } as dynamic;
    
    return($Calls);

  }
  public static function testFunctionCalls(dynamic $o): dynamic {
    return static::syncCall(__FUNCTION__, 4, $o);
  }
  public static function testMethodCalls(dynamic $o): dynamic {
    return static::syncCall(__FUNCTION__, 5, $o);
  }
  public static function testPartialFunctionCalls(dynamic $s): dynamic {
    return static::syncCall(__FUNCTION__, 6, $s);
  }
  public static function testPartialMethodCalls(dynamic $o): dynamic {
    return static::syncCall(__FUNCTION__, 7, $o);
  }
  public static function wrapMake1Array(dynamic $x): dynamic {
    return static::syncCall(__FUNCTION__, 10, $x);
  }
  public static function reexportCallMake1Array(dynamic $unnamed1): dynamic {
    return static::syncCall(__FUNCTION__, 11, $unnamed1);
  }
  public static function partiallyCallMake1Array(dynamic $unnamed1): dynamic {
    return static::syncCall(__FUNCTION__, 12, $unnamed1);
  }
  public static function closeOverMake1Array(dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 14, $param);
  }
  public static function wrapMake1ArrayDouble(dynamic $x): dynamic {
    return static::syncCall(__FUNCTION__, 18, $x);
  }
  public static function reexportCallMake1ArrayDouble(dynamic $unnamed1): dynamic {
    return static::syncCall(__FUNCTION__, 19, $unnamed1);
  }
  public static function partiallyCallMake1ArrayDouble(dynamic $unnamed1): dynamic {
    return static::syncCall(__FUNCTION__, 20, $unnamed1);
  }
  public static function closeOverMake1ArrayDouble(dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 22, $param);
  }
  public static function wrapMake2Array(dynamic $x, dynamic $y): dynamic {
    return static::syncCall(__FUNCTION__, 25, $x, $y);
  }
  public static function reexportCallMake2Array(dynamic $unnamed1, dynamic $unnamed2): dynamic {
    return static::syncCall(__FUNCTION__, 26, $unnamed1, $unnamed2);
  }
  public static function partiallyCallMake2Array(dynamic $unnamed1): dynamic {
    return static::syncCall(__FUNCTION__, 27, $unnamed1);
  }
  public static function closeOverMake2Array(dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 29, $param);
  }
  public static function callsAFunctionWithSuppression(dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 31, $param);
  }

}
/* Hashing disabled */
