<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class MyLib {
  <<__Override, __Memoize>>
  public static function requireModule() : Vector<dynamic> {

    $joo_global_object = \Rehack\GlobalObject::get() as dynamic;
    
    $runtime = $joo_global_object->jsoo_runtime;
    $call1 = $runtime["caml_call1"];
    $string = $runtime["caml_new_string"];
    $cst_this_should_be_exported_with_three_leading = $string(
      "this should be exported with three leading '_'"
    );
    $cst_this_should_be_exported_with_two_leading = $string(
      "this should be exported with two leading '_'"
    );
    $cst_this_should_be_exported_with_leading = $string(
      "this should be exported with leading '_'"
    );
    $cst_myPartiallyAppliedMethod = $string("myPartiallyAppliedMethod");
    $cst_myPartiallyAppliedMethod__0 = $string("myPartiallyAppliedMethod");
    $cst_myPartiallyAppliedMethod__1 = $string("myPartiallyAppliedMethod");
    $MyLib_MyLibUtility =  MyLib__MyLibUtility::get ();
    $foo = "foo";
    $bar = "bar";
    $baz = "baz";
    $testFunctionCalls = (dynamic $o) ==> {
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
    $testMethodCalls = (dynamic $o) ==> {
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
    $testPartialFunctionCalls = (dynamic $o) ==> {
      $s_ = (dynamic $Q_, dynamic $P_) ==> {return $Q_($P_);};
      $callResult1 = (dynamic $O_) ==> {return $s_($o, $O_);};
      $t_ = "passThis";
      $u_ = (dynamic $N_, dynamic $M_, dynamic $L_) ==> {return $N_($M_, $L_);
      };
      $callResult2 = (dynamic $K_) ==> {return $u_($o, $t_, $K_);};
      $v_ = "passThis";
      $w_ = (dynamic $J_, dynamic $I_, dynamic $H_, dynamic $G_) ==> {return $J_($I_, $H_, $G_);
      };
      $callResult3 = (dynamic $F_) ==> {return $w_($o, $v_, $bar, $F_);};
      $x_ = "passThis";
      $y_ = (dynamic $E_, dynamic $D_, dynamic $C_, dynamic $B_, dynamic $A_) ==> {return $E_($D_, $C_, $B_, $A_);
      };
      $callResult4 = (dynamic $z_) ==> {return $y_($o, $x_, $baz, $baz, $z_);};
      return Vector{0, $callResult1, $callResult2, $callResult3, $callResult4};
    };
    $testPartialMethodCalls = (dynamic $o) ==> {
      $a_ = (dynamic $r_, dynamic $q_, dynamic $p_) ==> {
        return $runtime["caml_js_meth_call1"]($r_, $q_, $p_);
      };
      $sendResult1 = (dynamic $o_) ==> {
        return $a_($o, $cst_myPartiallyAppliedMethod, $o_);
      };
      $b_ = (dynamic $n_, dynamic $m_, dynamic $l_, dynamic $k_) ==> {
        return $runtime["caml_js_meth_call2"]($n_, $m_, $l_, $k_);
      };
      $sendResult2 = (dynamic $j_) ==> {
        return $b_($o, $cst_myPartiallyAppliedMethod__0, $foo, $j_);
      };
      $c_ = (dynamic $i_, dynamic $h_, dynamic $g_, dynamic $f_, dynamic $e_) ==> {
        return $runtime["caml_js_meth_call3"]($i_, $h_, $g_, $f_, $e_);
      };
      $sendResult3 = (dynamic $d_) ==> {
        return $c_($o, $cst_myPartiallyAppliedMethod__1, $bar, $foo, $d_);
      };
      return Vector{0, $sendResult1, $sendResult2, $sendResult3};
    };
    $x = $call1($MyLib_MyLibUtility[1], 0);
    $genThisShouldBeAsyncTransformed = (dynamic $input, dynamic $cb) ==> {
      return $call1($cb, (int) ($input + 1));
    };
    $requireModule = (dynamic $param) ==> {
      return $cst_this_should_be_exported_with_leading;
    };
    $requireModule__0 = (dynamic $param) ==> {
      return $cst_this_should_be_exported_with_two_leading;
    };
    $construct = (dynamic $param) ==> {
      return $cst_this_should_be_exported_with_three_leading;
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
      $genThisShouldBeAsyncTransformed,
      $genThisShouldBeAsyncTransformed,
      $requireModule,
      $requireModule__0,
      $construct
    };
    
     return ($MyLib);

  }
  public static function foo(): dynamic {
    return static::callRehackFunction(static::requireModule()[1], varray[]);
  }
  public static function bar(): dynamic {
    return static::callRehackFunction(static::requireModule()[2], varray[]);
  }
  public static function baz(): dynamic {
    return static::callRehackFunction(static::requireModule()[3], varray[]);
  }
  public static function testFunctionCalls(dynamic $o): dynamic {
    return static::callRehackFunction(static::requireModule()[4], varray[$o]);
  }
  public static function testMethodCalls(dynamic $o): dynamic {
    return static::callRehackFunction(static::requireModule()[5], varray[$o]);
  }
  public static function testPartialFunctionCalls(dynamic $o): dynamic {
    return static::callRehackFunction(static::requireModule()[6], varray[$o]);
  }
  public static function testPartialMethodCalls(dynamic $o): dynamic {
    return static::callRehackFunction(static::requireModule()[7], varray[$o]);
  }
  public static function x(): dynamic {
    return static::callRehackFunction(static::requireModule()[8], varray[]);
  }
  public static function genThisShouldBeAsyncTransformed(dynamic $input, dynamic $cb): Awaitable<dynamic> {
    return static::genCallFunctionWithArgs("genThisShouldBeAsyncTransformed", static::requireModule()[9], varray[$input, $cb]);
  }
  public static function _requireModule_(dynamic $param): dynamic {
    return static::callRehackFunction(static::requireModule()[11], varray[$param]);
  }
  public static function construct(dynamic $param): dynamic {
    return static::callRehackFunction(static::requireModule()[13], varray[$param]);
  }

}
/*____hashes flags: 675529036 bytecode: 67843182350 debug-data: 26172921359 primitives: 314532832*/
