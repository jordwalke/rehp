<?hh
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * Js_of_ocaml__Js.php
 */

namespace Rehack;

final class Js_of_ocaml__Js {
  <<__Memoize>>
  public static function get() {
    $global_object = \Rehack\GlobalObject::get();
    $runtime = \Rehack\Runtime::get();
    /*
     * Soon, these will replace the `global_data->ModuleName`
     * pattern in the load() function.
     */
    $Callback = Callback::get();
    $Pervasives = Pervasives::get();
    $Printexc = Printexc::get();
    Js_of_ocaml__Js::load($global_object);
    $memoized = $runtime->caml_get_global_data()->Js_of_ocaml__Js;
    return $memoized;
  }

  /**
   * Performs module load operation. May have side effects.
   */
  private static function load($joo_global_object) {
    

    $runtime = $joo_global_object->jsoo_runtime;
    $call1 = $runtime["caml_call1"];
    $call2 = $runtime["caml_call2"];
    $caml_get_public_method = $runtime["caml_get_public_method"];
    $caml_js_to_string = $runtime["caml_js_to_string"];
    $caml_js_wrap_callback = $runtime["caml_js_wrap_callback"];
    $string = $runtime["caml_new_string"];
    $global_data = $runtime["caml_get_global_data"]();
    $cst_parseFloat = $string("parseFloat");
    $cst_parseInt = $string("parseInt");
    $cst_Js_of_ocaml_Js_Error = $string("Js_of_ocaml__Js.Error");
    $cst_jsError = $string("jsError");
    $Pervasives = $global_data["Pervasives"];
    $Callback = $global_data["Callback"];
    $Printexc = $global_data["Printexc"];
    $global =  joo_global_object ;
    $Unsafe = Vector{0, $global};
    $null__0 =  null ;
    $undefined__0 =  undefined ;
    $return__0 = function(dynamic $al_) {return $al_;};
    $map = function(dynamic $x, dynamic $f) use ($call1,$null__0,$return__0) {
      return $x == $null__0 ? $null__0 : ($return__0($call1($f, $x)));
    };
    $bind = function(dynamic $x, dynamic $f) use ($call1,$null__0) {
      return $x == $null__0 ? $null__0 : ($call1($f, $x));
    };
    $test = function(dynamic $x) use ($null__0) {
      return 1 - ($x == $null__0 ? 1 : (0));
    };
    $iter = function(dynamic $x, dynamic $f) use ($call1,$null__0) {
      $ak_ = 1 - ($x == $null__0 ? 1 : (0));
      return $ak_ ? $call1($f, $x) : ($ak_);
    };
    $case__0 = function(dynamic $x, dynamic $f, dynamic $g) use ($call1,$null__0) {
      return $x == $null__0 ? $call1($f, 0) : ($call1($g, $x));
    };
    $get = function(dynamic $x, dynamic $f) use ($call1,$null__0) {
      return $x == $null__0 ? $call1($f, 0) : ($x);
    };
    $option = function(dynamic $x) use ($null__0,$return__0) {
      if ($x) {$x__0 = $x[1];return $return__0($x__0);}
      return $null__0;
    };
    $to_option = function(dynamic $x) use ($case__0) {
      $aj_ = function(dynamic $x) {return Vector{0, $x};};
      return $case__0($x, function(dynamic $param) {return 0;}, $aj_);
    };
    $Opt = Vector{
      0,
      $null__0,
      $return__0,
      $map,
      $bind,
      $test,
      $iter,
      $case__0,
      $get,
      $option,
      $to_option
    };
    $return__1 = function(dynamic $ai_) {return $ai_;};
    $map__0 = function(dynamic $x, dynamic $f) use ($call1,$return__1,$undefined__0) {
      return $x === $undefined__0
        ? $undefined__0
        : ($return__1($call1($f, $x)));
    };
    $bind__0 = function(dynamic $x, dynamic $f) use ($call1,$undefined__0) {
      return $x === $undefined__0 ? $undefined__0 : ($call1($f, $x));
    };
    $test__0 = function(dynamic $x) use ($undefined__0) {
      return $x !== $undefined__0 ? 1 : (0);
    };
    $iter__0 = function(dynamic $x, dynamic $f) use ($call1,$undefined__0) {
      $ah_ = $x !== $undefined__0 ? 1 : (0);
      return $ah_ ? $call1($f, $x) : ($ah_);
    };
    $case__1 = function(dynamic $x, dynamic $f, dynamic $g) use ($call1,$undefined__0) {
      return $x === $undefined__0 ? $call1($f, 0) : ($call1($g, $x));
    };
    $get__0 = function(dynamic $x, dynamic $f) use ($call1,$undefined__0) {
      return $x === $undefined__0 ? $call1($f, 0) : ($x);
    };
    $option__0 = function(dynamic $x) use ($return__1,$undefined__0) {
      if ($x) {$x__0 = $x[1];return $return__1($x__0);}
      return $undefined__0;
    };
    $to_option__0 = function(dynamic $x) use ($case__1) {
      $ag_ = function(dynamic $x) {return Vector{0, $x};};
      return $case__1($x, function(dynamic $param) {return 0;}, $ag_);
    };
    $Optdef = Vector{
      0,
      $undefined__0,
      $return__1,
      $map__0,
      $bind__0,
      $test__0,
      $iter__0,
      $case__1,
      $get__0,
      $option__0,
      $to_option__0
    };
    $coerce = function(dynamic $x, dynamic $f, dynamic $g) use ($Opt,$call1,$call2) {
      $ae_ = function(dynamic $param) use ($call1,$g,$x) {
        return $call1($g, $x);
      };
      $af_ = $call1($f, $x);
      return $call2($Opt[8], $af_, $ae_);
    };
    $coerce_opt = function(dynamic $x, dynamic $f, dynamic $g) use ($Opt,$call1,$call2) {
      $ac_ = function(dynamic $param) use ($call1,$g,$x) {
        return $call1($g, $x);
      };
      $ad_ = $call2($Opt[4], $x, $f);
      return $call2($Opt[8], $ad_, $ac_);
    };
    $true__0 =  true ;
    $false__0 =  false ;
    $a_ = function(dynamic $x) use ($call1,$caml_get_public_method) {
      return $call1($caml_get_public_method($x, 876326544, 1), $x);
    };
    $b_ = $Unsafe[1];
    $string_constr = (function(dynamic $t0, dynamic $param) {return $t0->String;
     })($b_, $a_);
    $c_ = function(dynamic $x) use ($call1,$caml_get_public_method) {
      return $call1($caml_get_public_method($x, 595393896, 2), $x);
    };
    $d_ = $Unsafe[1];
    $regExp = (function(dynamic $t1, dynamic $param) {return $t1->RegExp;})($d_, $c_);
    $e_ = function(dynamic $x) use ($call1,$caml_get_public_method) {
      return $call1($caml_get_public_method($x, 944440446, 3), $x);
    };
    $f_ = $Unsafe[1];
    $object_constructor = (function(dynamic $t2, dynamic $param) {return $t2->Object;
     })($f_, $e_);
    $object_keys = function(dynamic $o) use ($call1,$caml_get_public_method,$object_constructor) {
      $ab_ = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, -955850252, 4), $x);
      };
      return (function(dynamic $t4, dynamic $t3, dynamic $param) {return $t4->keys($t3);
       })($object_constructor, $o, $ab_);
    };
    $g_ = function(dynamic $x) use ($call1,$caml_get_public_method) {
      return $call1($caml_get_public_method($x, 883172538, 5), $x);
    };
    $h_ = $Unsafe[1];
    $array_constructor = (function(dynamic $t5, dynamic $param) {return $t5->Array;
     })($h_, $g_);
    $array_get = function(dynamic $aa_, dynamic $Z_) {return $aa_[$Z_];};
    $array_set = function(dynamic $Y_, dynamic $X_, dynamic $W_) {$Y_[$X_] = $W_;return 0;
    };
    $array_map_poly = function(dynamic $a, dynamic $cb) use ($call1,$caml_get_public_method) {
      $V_ = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, 5442204, 6), $x);
      };
      return (function(dynamic $t7, dynamic $t6, dynamic $param) {return $t7->map($t6);
       })($a, $cb, $V_);
    };
    $array_map = function(dynamic $f, dynamic $a) use ($array_map_poly,$call1,$caml_js_wrap_callback) {
      return $array_map_poly(
        $a,
        $caml_js_wrap_callback(
          function(dynamic $x, dynamic $idx, dynamic $param) use ($call1,$f) {return $call1($f, $x);
          }
        )
      );
    };
    $array_mapi = function(dynamic $f, dynamic $a) use ($array_map_poly,$call2,$caml_js_wrap_callback) {
      return $array_map_poly(
        $a,
        $caml_js_wrap_callback(
          function(dynamic $x, dynamic $idx, dynamic $param) use ($call2,$f) {return $call2($f, $idx, $x);
          }
        )
      );
    };
    $str_array = function(dynamic $U_) {return $U_;};
    $match_result = function(dynamic $T_) {return $T_;};
    $i_ = function(dynamic $x) use ($call1,$caml_get_public_method) {
      return $call1($caml_get_public_method($x, -531784147, 7), $x);
    };
    $j_ = $Unsafe[1];
    $date_constr = (function(dynamic $t8, dynamic $param) {return $t8->Date;})($j_, $i_);
    $k_ = function(dynamic $x) use ($call1,$caml_get_public_method) {
      return $call1($caml_get_public_method($x, -431978041, 8), $x);
    };
    $l_ = $Unsafe[1];
    $math = (function(dynamic $t9, dynamic $param) {return $t9->Math;})($l_, $k_);
    $Error = Vector{
      248,
      $cst_Js_of_ocaml_Js_Error,
      $runtime["caml_fresh_oo_id"](0)
    };
    $m_ = function(dynamic $x) use ($call1,$caml_get_public_method) {
      return $call1($caml_get_public_method($x, 37651177, 9), $x);
    };
    $n_ = $Unsafe[1];
    $error_constr = (function(dynamic $t10, dynamic $param) {return $t10->Error;
     })($n_, $m_);
    
    $call2($Callback[2], $cst_jsError, Vector{0, $Error, darray[]});
    
    $raise_js_error =  (function($exn) {throw $exn;}) ;
    $o_ = function(dynamic $x) use ($call1,$caml_get_public_method) {
      return $call1($caml_get_public_method($x, -465951225, 10), $x);
    };
    $p_ = $Unsafe[1];
    $JSON = (function(dynamic $t11, dynamic $param) {return $t11->JSON;})($p_, $o_);
    $decodeURI = function(dynamic $s) use ($Unsafe,$call1,$caml_get_public_method) {
      $R_ = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, -994878754, 11), $x);
      };
      $S_ = $Unsafe[1];
      return (function(dynamic $t12, dynamic $param) {return $t12->decodeURI;})($S_, $R_)($s);
    };
    $decodeURIComponent = function(dynamic $s) use ($Unsafe,$call1,$caml_get_public_method) {
      $P_ = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, 751577599, 12), $x);
      };
      $Q_ = $Unsafe[1];
      return (function(dynamic $t13, dynamic $param) {return $t13->decodeURIComponent;
       })($Q_, $P_)($s);
    };
    $encodeURI = function(dynamic $s) use ($Unsafe,$call1,$caml_get_public_method) {
      $N_ = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, 443205366, 13), $x);
      };
      $O_ = $Unsafe[1];
      return (function(dynamic $t14, dynamic $param) {return $t14->encodeURI;})($O_, $N_)($s);
    };
    $encodeURIComponent = function(dynamic $s) use ($Unsafe,$call1,$caml_get_public_method) {
      $L_ = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, -641565977, 14), $x);
      };
      $M_ = $Unsafe[1];
      return (function(dynamic $t15, dynamic $param) {return $t15->encodeURIComponent;
       })($M_, $L_)($s);
    };
    $escape = function(dynamic $s) use ($Unsafe,$call1,$caml_get_public_method) {
      $J_ = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, -623230079, 15), $x);
      };
      $K_ = $Unsafe[1];
      return (function(dynamic $t16, dynamic $param) {return $t16->escape;})($K_, $J_)($s);
    };
    $unescape = function(dynamic $s) use ($Unsafe,$call1,$caml_get_public_method) {
      $H_ = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, -585010534, 16), $x);
      };
      $I_ = $Unsafe[1];
      return (function(dynamic $t17, dynamic $param) {return $t17->unescape;})($I_, $H_)($s);
    };
    $isNaN = function(dynamic $i) use ($Unsafe,$call1,$caml_get_public_method) {
      $F_ = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, -1051592975, 17), $x);
      };
      $G_ = $Unsafe[1];
      return (int)
      (function(dynamic $t18, dynamic $param) {return $t18->isNaN;})($G_, $F_)($i);
    };
    $parseInt = function(dynamic $s) use ($Pervasives,$Unsafe,$call1,$caml_get_public_method,$cst_parseInt,$isNaN) {
      $D_ = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, -697166212, 18), $x);
      };
      $E_ = $Unsafe[1];
      $s__0 = (function(dynamic $t19, dynamic $param) {return $t19->parseInt;})($E_, $D_)($s);
      return $isNaN($s__0) ? $call1($Pervasives[2], $cst_parseInt) : ($s__0);
    };
    $parseFloat = function(dynamic $s) use ($Pervasives,$Unsafe,$call1,$caml_get_public_method,$cst_parseFloat,$isNaN) {
      $B_ = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, 746065001, 19), $x);
      };
      $C_ = $Unsafe[1];
      $s__0 = (function(dynamic $t20, dynamic $param) {return $t20->parseFloat;
       })($C_, $B_)($s);
      return $isNaN($s__0) ? $call1($Pervasives[2], $cst_parseFloat) : ($s__0);
    };
    $q_ = function(dynamic $param) use ($Error,$call1,$caml_get_public_method,$caml_js_to_string) {
      if ($param[1] === $Error) {
        $e = $param[2];
        $A_ = function(dynamic $x) use ($call1,$caml_get_public_method) {
          return $call1($caml_get_public_method($x, 946786476, 20), $x);
        };
        return Vector{
          0,
          $caml_js_to_string(
            (function(dynamic $t21, dynamic $param) {return $t21->toString();})($e, $A_)
          )
        };
      }
      return 0;
    };
    
    $call1($Printexc[8], $q_);
    
    $r_ = function(dynamic $e) use ($array_constructor,$call1,$caml_get_public_method,$caml_js_to_string) {
      if (instance_of($e, $array_constructor)) {return 0;}
      $z_ = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, 946786476, 21), $x);
      };
      return Vector{
        0,
        $caml_js_to_string(
          (function(dynamic $t22, dynamic $param) {return $t22->toString();})($e, $z_)
        )
      };
    };
    
    $call1($Printexc[8], $r_);
    
    $string_of_error = function(dynamic $e) use ($call1,$caml_get_public_method,$caml_js_to_string) {
      $y_ = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, 946786476, 22), $x);
      };
      return $caml_js_to_string(
        (function(dynamic $t23, dynamic $param) {return $t23->toString();})($e, $y_)
      );
    };
    $export_js = function(dynamic $field, dynamic $x) use ($runtime) {
      $runtime["caml_js_export_var"](0)[$field] = $x;
      return 0;
    };
    $export__0 = function(dynamic $field, dynamic $x) use ($export_js) {
      return $export_js($field->toString(), $x);
    };
    $export_all = function(dynamic $obj) use ($call1,$caml_get_public_method,$caml_js_wrap_callback,$export_js,$object_keys) {
      $keys = $object_keys($obj);
      $v_ = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, -994170454, 23), $x);
      };
      $w_ = $caml_js_wrap_callback(
        function(dynamic $key, dynamic $param, dynamic $x_) use ($export_js,$obj) {
          return $export_js($key, $obj[$key]);
        }
      );
      return (function(dynamic $t25, dynamic $t24, dynamic $param) {return $t25->forEach($t24);
       })($keys, $w_, $v_);
    };
    $s_ = function(dynamic $u_) {return $u_;};
    $Js_of_ocaml_Js = Vector{
      0,
      $null__0,
      function(dynamic $t_) {return $t_;},
      $undefined__0,
      $s_,
      $Opt,
      $Optdef,
      $true__0,
      $false__0,
      $string_constr,
      $regExp,
      $regExp,
      $regExp,
      $object_keys,
      $array_constructor,
      $array_constructor,
      $array_get,
      $array_set,
      $array_map,
      $array_mapi,
      $str_array,
      $match_result,
      $date_constr,
      $date_constr,
      $date_constr,
      $date_constr,
      $date_constr,
      $date_constr,
      $date_constr,
      $date_constr,
      $date_constr,
      $math,
      $error_constr,
      $string_of_error,
      $raise_js_error,
      $Error,
      $JSON,
      $decodeURI,
      $decodeURIComponent,
      $encodeURI,
      $encodeURIComponent,
      $escape,
      $unescape,
      $isNaN,
      $parseInt,
      $parseFloat,
      $coerce,
      $coerce_opt,
      $export__0,
      $export_all,
      $Unsafe
    };
    
    $runtime["caml_register_global"](36, $Js_of_ocaml_Js, "Js_of_ocaml__Js");

  }
}

/*____hashes compiler:hashing-disabled inputs:hashing-disabled bytecode:hashing-disabled*/
