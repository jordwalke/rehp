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
    
    $runtime = (\Rehack\GlobalObject::get() as dynamic)->jsoo_runtime;
    $call1 = $runtime["caml_call1"];
    $string = $runtime["caml_new_string"];
    $cst_this_should_be_exported_with_three_php_leading = $string(
      "this should be exported with three (php)leading '_'"
    );
    $cst_this_should_be_exported_with_two_php_leading = $string(
      "this should be exported with two (php)leading '_'"
    );
    $cst_this_should_be_exported_with_php_leading__8 = $string(
      "this should be exported with (php)leading '_'"
    );
    $cst_this_should_be_exported_with_php_leading__7 = $string(
      "this should be exported with (php)leading '_'"
    );
    $cst_this_should_be_exported_with_php_leading__6 = $string(
      "this should be exported with (php)leading '_'"
    );
    $cst_this_should_be_exported_with_php_leading__5 = $string(
      "this should be exported with (php)leading '_'"
    );
    $cst_this_should_be_exported_with_php_leading__4 = $string(
      "this should be exported with (php)leading '_'"
    );
    $cst_this_should_be_exported_with_php_leading__3 = $string(
      "this should be exported with (php)leading '_'"
    );
    $cst_this_should_be_exported_with_php_leading__2 = $string(
      "this should be exported with (php)leading '_'"
    );
    $cst_this_should_be_exported_with_php_leading__1 = $string(
      "this should be exported with (php)leading '_'"
    );
    $cst_this_should_be_exported_with_php_leading__0 = $string(
      "this should be exported with (php)leading '_'"
    );
    $cst_this_should_be_exported_with_php_leading = $string(
      "this should be exported with (php)leading '_'"
    );
    $cst_myPartiallyAppliedMethod = $string("myPartiallyAppliedMethod");
    $cst_myPartiallyAppliedMethod__0 = $string("myPartiallyAppliedMethod");
    $cst_myPartiallyAppliedMethod__1 = $string("myPartiallyAppliedMethod");
    $MyLib_MyLibUtility = MyLib__MyLibUtility::get();
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
    $testPartialFunctionCalls = (dynamic $o) : dynamic ==> {
      $s_ = (dynamic $Q_, dynamic $P_) : dynamic ==> {return $Q_($P_);};
      $callResult1 = (dynamic $O_) : dynamic ==> {return $s_($o, $O_);};
      $t_ = "passThis";
      $u_ = (dynamic $N_, dynamic $M_, dynamic $L_) : dynamic ==> {return $N_($M_, $L_);
      };
      $callResult2 = (dynamic $K_) : dynamic ==> {return $u_($o, $t_, $K_);};
      $v_ = "passThis";
      $w_ = (dynamic $J_, dynamic $I_, dynamic $H_, dynamic $G_) : dynamic ==> {return $J_($I_, $H_, $G_);
      };
      $callResult3 = (dynamic $F_) : dynamic ==> {
        return $w_($o, $v_, $bar, $F_);
      };
      $x_ = "passThis";
      $y_ = (dynamic $E_, dynamic $D_, dynamic $C_, dynamic $B_, dynamic $A_) : dynamic ==> {return $E_($D_, $C_, $B_, $A_);
      };
      $callResult4 = (dynamic $z_) : dynamic ==> {
        return $y_($o, $x_, $baz, $baz, $z_);
      };
      return Vector{0, $callResult1, $callResult2, $callResult3, $callResult4};
    };
    $testPartialMethodCalls = (dynamic $o) : dynamic ==> {
      $a_ = (dynamic $r_, dynamic $q_, dynamic $p_) : dynamic ==> {
        return $runtime["caml_js_meth_call1"]($r_, $q_, $p_);
      };
      $sendResult1 = (dynamic $o_) : dynamic ==> {
        return $a_($o, $cst_myPartiallyAppliedMethod, $o_);
      };
      $b_ = (dynamic $n_, dynamic $m_, dynamic $l_, dynamic $k_) : dynamic ==> {
        return $runtime["caml_js_meth_call2"]($n_, $m_, $l_, $k_);
      };
      $sendResult2 = (dynamic $j_) : dynamic ==> {
        return $b_($o, $cst_myPartiallyAppliedMethod__0, $foo, $j_);
      };
      $c_ = (dynamic $i_, dynamic $h_, dynamic $g_, dynamic $f_, dynamic $e_) : dynamic ==> {
        return $runtime["caml_js_meth_call3"]($i_, $h_, $g_, $f_, $e_);
      };
      $sendResult3 = (dynamic $d_) : dynamic ==> {
        return $c_($o, $cst_myPartiallyAppliedMethod__1, $bar, $foo, $d_);
      };
      return Vector{0, $sendResult1, $sendResult2, $sendResult3};
    };
    $x = $call1($MyLib_MyLibUtility[1], 0);
    $genThisShouldBeAsyncTransformed2 = (dynamic $input, dynamic $cb) : dynamic ==> {
      return $call1($cb, (int) ($input + 1));
    };
    $call = (dynamic $param) : dynamic ==> {
      return $cst_this_should_be_exported_with_php_leading;
    };
    $genCall = (dynamic $cb) : dynamic ==> {
      return $cst_this_should_be_exported_with_php_leading__0;
    };
    $syncCall = (dynamic $param) : dynamic ==> {
      return $cst_this_should_be_exported_with_php_leading__1;
    };
    $getExports = (dynamic $param) : dynamic ==> {
      return $cst_this_should_be_exported_with_php_leading__2;
    };
    $callRehackFunction = (dynamic $param) : dynamic ==> {
      return $cst_this_should_be_exported_with_php_leading__3;
    };
    $genCallFunctionWithArgs = (dynamic $param) : dynamic ==> {
      return $cst_this_should_be_exported_with_php_leading__4;
    };
    $genCallName = (dynamic $param) : dynamic ==> {
      return $cst_this_should_be_exported_with_php_leading__5;
    };
    $syncCallName = (dynamic $param) : dynamic ==> {
      return $cst_this_should_be_exported_with_php_leading__6;
    };
    $syncCallFunctionWithArgs = (dynamic $param) : dynamic ==> {
      return $cst_this_should_be_exported_with_php_leading__7;
    };
    $get = (dynamic $param) : dynamic ==> {
      return $cst_this_should_be_exported_with_php_leading__8;
    };
    $get__0 = (dynamic $param) : dynamic ==> {
      return $cst_this_should_be_exported_with_two_php_leading;
    };
    $construct = (dynamic $param) : dynamic ==> {
      return $cst_this_should_be_exported_with_three_php_leading;
    };
    $genThisShouldBeAsyncTransformed1 = (dynamic $cb) : dynamic ==> {
      return $call1($cb, 100);
    };
    $MyLib = Vector{
      0,
      $foo,
      $bar,
      $baz,
      $testFunctionCalls,
      $testMethodCalls,
      $testPartialFunctionCalls,
      $testPartialMethodCalls,
      $x,
      $genThisShouldBeAsyncTransformed2,
      $genThisShouldBeAsyncTransformed2,
      $call,
      $genCall,
      $syncCall,
      $getExports,
      $callRehackFunction,
      $genCallFunctionWithArgs,
      $genCallName,
      $syncCallName,
      $syncCallFunctionWithArgs,
      $get,
      $get__0,
      $construct,
      $genThisShouldBeAsyncTransformed1
    } as dynamic;
    
    return($MyLib);

  }
  public static function testFunctionCalls(dynamic $o): dynamic {
    return static::syncCall(__FUNCTION__, 4, $o);
  }
  public static function testMethodCalls(dynamic $o): dynamic {
    return static::syncCall(__FUNCTION__, 5, $o);
  }
  public static function testPartialFunctionCalls(dynamic $o): dynamic {
    return static::syncCall(__FUNCTION__, 6, $o);
  }
  public static function testPartialMethodCalls(dynamic $o): dynamic {
    return static::syncCall(__FUNCTION__, 7, $o);
  }
  public static function genThisShouldBeAsyncTransformed2(dynamic $input): Awaitable<dynamic> {
    return static::genCall(__FUNCTION__, 9, $input);
  }
  public static function _call(dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 11, $param);
  }
  public static function _genCall(dynamic $cb): dynamic {
    return static::syncCall(__FUNCTION__, 12, $cb);
  }
  public static function _syncCall(dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 13, $param);
  }
  public static function _getExports(dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 14, $param);
  }
  public static function _callRehackFunction(dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 15, $param);
  }
  public static function _genCallFunctionWithArgs(dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 16, $param);
  }
  public static function _genCallName(dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 17, $param);
  }
  public static function _syncCallName(dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 18, $param);
  }
  public static function _syncCallFunctionWithArgs(dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 19, $param);
  }
  public static function _get(dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 20, $param);
  }
  public static function ___construct(dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 22, $param);
  }
  public static function genThisShouldBeAsyncTransformed1(): Awaitable<dynamic> {
    return static::genCall(__FUNCTION__, 23);
  }

}
/*____hashes flags: 1314811087 bytecode: 90287558315 debug-data: 22114087654 primitives: 314532832*/
