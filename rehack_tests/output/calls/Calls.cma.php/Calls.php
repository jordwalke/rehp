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
    $call2 = $runtime["caml_call2"];
    $string = $runtime["caml_new_string"];
    $caml_update_dummy = $runtime["caml_update_dummy"];
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
    $cst_Second_Part_Of_Tuple = $string("Second Part Of Tuple:");
    $Stdlib = Stdlib::get();
    $Calls_Macros = Calls__Macros::get();
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
      $M_ = (dynamic $ak_, dynamic $aj_) : dynamic ==> {return $ak_($aj_);};
      $callResult1 = (dynamic $ai_) : dynamic ==> {return $M_($s, $ai_);};
      $N_ = "passThis";
      $O_ = (dynamic $ah_, dynamic $ag_, dynamic $af_) : dynamic ==> {return $ah_($ag_, $af_);
      };
      $callResult2 = (dynamic $ae_) : dynamic ==> {return $O_($s, $N_, $ae_);};
      $P_ = "passThis";
      $Q_ = (dynamic $ad_, dynamic $ac_, dynamic $ab_, dynamic $aa_) : dynamic ==> {return $ad_($ac_, $ab_, $aa_);
      };
      $callResult3 = (dynamic $Z_) : dynamic ==> {
        return $Q_($s, $P_, $bar, $Z_);
      };
      $R_ = "passThis";
      $S_ = (dynamic $Y_, dynamic $X_, dynamic $W_, dynamic $V_, dynamic $U_) : dynamic ==> {return $Y_($X_, $W_, $V_, $U_);
      };
      $callResult4 = (dynamic $T_) : dynamic ==> {
        return $S_($s, $R_, $baz, $baz, $T_);
      };
      return Vector{0, $callResult1, $callResult2, $callResult3, $callResult4};
    };
    $testPartialMethodCalls = (dynamic $o) : dynamic ==> {
      $u_ = (dynamic $L_, dynamic $K_, dynamic $J_) : dynamic ==> {
        return $runtime["caml_js_meth_call1"]($L_, $K_, $J_);
      };
      $sendResult1 = (dynamic $I_) : dynamic ==> {
        return $u_($o, $cst_myPartiallyAppliedMethod, $I_);
      };
      $v_ = (dynamic $H_, dynamic $G_, dynamic $F_, dynamic $E_) : dynamic ==> {
        return $runtime["caml_js_meth_call2"]($H_, $G_, $F_, $E_);
      };
      $sendResult2 = (dynamic $D_) : dynamic ==> {
        return $v_($o, $cst_myPartiallyAppliedMethod__0, $foo, $D_);
      };
      $w_ = (dynamic $C_, dynamic $B_, dynamic $A_, dynamic $z_, dynamic $y_) : dynamic ==> {
        return $runtime["caml_js_meth_call3"]($C_, $B_, $A_, $z_, $y_);
      };
      $sendResult3 = (dynamic $x_) : dynamic ==> {
        return $w_($o, $cst_myPartiallyAppliedMethod__1, $bar, $foo, $x_);
      };
      return Vector{0, $sendResult1, $sendResult2, $sendResult3};
    };
    $resultMake1Array = varray[$cst_one];
    $resultMake1ArraySideEffect = varray[$runtime["side_effect"](0)];
    $wrapMake1Array = (dynamic $x) : dynamic ==> {return (varray[$x]);};
    $reexportCallMake1Array = (dynamic $t_) : dynamic ==> {
      return (varray[$t_]);
    };
    $partiallyCallMake1Array = (dynamic $s_) : dynamic ==> {
      return (varray[$s_]);
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
    $reexportCallMake1ArrayDouble = (dynamic $r_) : dynamic ==> {
      return (varray[$r_, $r_]);
    };
    $partiallyCallMake1ArrayDouble = (dynamic $q_) : dynamic ==> {
      return (varray[$q_, $q_]);
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
    $reexportCallMake2Array = (dynamic $p_, dynamic $o_) : dynamic ==> {
      return (varray[$p_, $o_]);
    };
    $e_ = (dynamic $n_, dynamic $m_) : dynamic ==> {
      return (varray[$n_, $m_]);
    };
    $partiallyCallMake2Array = (dynamic $l_) : dynamic ==> {
      return $e_($cst_hi, $l_);
    };
    $overCallMake2Array = $call1(varray[0, 0], 0);
    $closeOverMake2Array = (dynamic $param) : dynamic ==> {
      return (varray[$cst_hi__0, $cst_bye]);
    };
    $make1Array = (dynamic $k_) : dynamic ==> {return (varray[$k_]);};
    $make2Array = (dynamic $j_, dynamic $i_) : dynamic ==> {
      return (varray[$j_, $i_]);
    };
    $ReexportedMacros = Vector{0, $make1Array, $make2Array} as dynamic;
    $callsAFunctionWithSuppression = (dynamic $param) : dynamic ==> {
      return (// HH_IGNORE blah blah
SomeUtilityClass::foo($cst_fix, $cst_me)
      );
    };
    $f = $runtime["caml_alloc_dummy_function"](1, 2);
    $z = Vector{0} as dynamic;
    
    $caml_update_dummy($f, (dynamic $x, dynamic $y) : dynamic ==> {return 1;});
    
    $caml_update_dummy($z, Vector{0, Vector{0, $f, $cst_Second_Part_Of_Tuple}}
    );
    
    if ($z) {
      $match = $z[1];
      $str = $match[2];
      $f__0 = $match[1];
      $f_ = $call2($f__0, 0, 0);
      $g_ = $call1($Stdlib[33], $f_);
      $h_ = $call2($Stdlib[28], $str, $g_);
      $call1($Stdlib[42], $h_);
    }
    
    $call1($Calls_Macros[7], 0);
    
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
      $callsAFunctionWithSuppression,
      $f,
      $z
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
