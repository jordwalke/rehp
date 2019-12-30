<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class Calls {
  <<__Override, __Memoize>>
  public static function requireModule() : Vector<dynamic> {
    
    $runtime =  (\Rehack\GlobalObject::get() as dynamic)->jsoo_runtime ;
    $string = $runtime["caml_new_string"];
    $cst_myPartiallyAppliedMethod = $string("myPartiallyAppliedMethod");
    $cst_myPartiallyAppliedMethod__0 = $string("myPartiallyAppliedMethod");
    $cst_myPartiallyAppliedMethod__1 = $string("myPartiallyAppliedMethod");
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
    $testPartialFunctionCalls = (dynamic $s) ==> {
      $s_ = (dynamic $Q_, dynamic $P_) ==> {return $Q_($P_);};
      $callResult1 = (dynamic $O_) ==> {return $s_($s, $O_);};
      $t_ = "passThis";
      $u_ = (dynamic $N_, dynamic $M_, dynamic $L_) ==> {return $N_($M_, $L_);
      };
      $callResult2 = (dynamic $K_) ==> {return $u_($s, $t_, $K_);};
      $v_ = "passThis";
      $w_ = (dynamic $J_, dynamic $I_, dynamic $H_, dynamic $G_) ==> {return $J_($I_, $H_, $G_);
      };
      $callResult3 = (dynamic $F_) ==> {return $w_($s, $v_, $bar, $F_);};
      $x_ = "passThis";
      $y_ = (dynamic $E_, dynamic $D_, dynamic $C_, dynamic $B_, dynamic $A_) ==> {return $E_($D_, $C_, $B_, $A_);
      };
      $callResult4 = (dynamic $z_) ==> {return $y_($s, $x_, $baz, $baz, $z_);};
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
    $Calls = Vector{
      0,
      $foo,
      $bar,
      $baz,
      $testFunctionCalls,
      $testMethodCalls,
      $testPartialFunctionCalls,
      $testPartialMethodCalls
    } as dynamic;
    
     return ($Calls);

  }
  public static function testFunctionCalls(dynamic $o): dynamic {
    return static::callRehackFunction(static::requireModule()[4], varray[$o]);
  }
  public static function testMethodCalls(dynamic $o): dynamic {
    return static::callRehackFunction(static::requireModule()[5], varray[$o]);
  }
  public static function testPartialFunctionCalls(dynamic $s): dynamic {
    return static::callRehackFunction(static::requireModule()[6], varray[$s]);
  }
  public static function testPartialMethodCalls(dynamic $o): dynamic {
    return static::callRehackFunction(static::requireModule()[7], varray[$o]);
  }

}
/* Hashing disabled */
