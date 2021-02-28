<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class Js_of_ocaml__Js {
  <<__Override, __Memoize>>
  public static function get() : Vector<dynamic> {
    
    $runtime = (\Rehack\GlobalObject::get() as dynamic)->jsoo_runtime;
    $call1 = $runtime["caml_call1"];
    $call2 = $runtime["caml_call2"];
    $caml_get_public_method = $runtime["caml_get_public_method"];
    $caml_js_to_string = $runtime["caml_js_to_string"];
    $caml_js_wrap_callback = $runtime["caml_js_wrap_callback"];
    $string = $runtime["caml_new_string"];
    $cst_parseFloat = $string("parseFloat");
    $cst_parseInt = $string("parseInt");
    $cst_Js_of_ocaml_Js_Error = $string("Js_of_ocaml__Js.Error");
    $cst_jsError = $string("jsError");
    $Stdlib = Stdlib::get();
    $Stdlib_callback = Stdlib__callback::get();
    $Stdlib_printexc = Stdlib__printexc::get();
    $global = joo_global_object;
    $Unsafe = Vector{0, $global} as dynamic;
    $null__0 = null;
    $undefined__0 = undefined;
    $return__0 = (dynamic $al_) : dynamic ==> {return $al_;};
    $map = (dynamic $x, dynamic $f) : dynamic ==> {
      return $x == $null__0 ? $null__0 : ($return__0($call1($f, $x)));
    };
    $bind = (dynamic $x, dynamic $f) : dynamic ==> {
      return $x == $null__0 ? $null__0 : ($call1($f, $x));
    };
    $test = (dynamic $x) : dynamic ==> {
      return 1 - ($x == $null__0 ? 1 : (0));
    };
    $iter = (dynamic $x, dynamic $f) : dynamic ==> {
      $ak_ = 1 - ($x == $null__0 ? 1 : (0));
      return $ak_ ? $call1($f, $x) : ($ak_);
    };
    $case__0 = (dynamic $x, dynamic $f, dynamic $g) : dynamic ==> {
      return $x == $null__0 ? $call1($f, 0) : ($call1($g, $x));
    };
    $get = (dynamic $x, dynamic $f) : dynamic ==> {
      return $x == $null__0 ? $call1($f, 0) : ($x);
    };
    $option = (dynamic $x) : dynamic ==> {
      return $runtime["caml_js_nullable"]($x);
    };
    $to_option = (dynamic $x) : dynamic ==> {
      $aj_ = (dynamic $x) : dynamic ==> {return Vector{0, $x};};
      return $case__0($x, (dynamic $param) : dynamic ==> {return 0;}, $aj_);
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
    } as dynamic;
    $return__1 = (dynamic $ai_) : dynamic ==> {return $ai_;};
    $map__0 = (dynamic $x, dynamic $f) : dynamic ==> {
      return $x === $undefined__0
        ? $undefined__0
        : ($return__1($call1($f, $x)));
    };
    $bind__0 = (dynamic $x, dynamic $f) : dynamic ==> {
      return $x === $undefined__0 ? $undefined__0 : ($call1($f, $x));
    };
    $test__0 = (dynamic $x) : dynamic ==> {
      return $x !== $undefined__0 ? 1 : (0);
    };
    $iter__0 = (dynamic $x, dynamic $f) : dynamic ==> {
      $ah_ = $x !== $undefined__0 ? 1 : (0);
      return $ah_ ? $call1($f, $x) : ($ah_);
    };
    $case__1 = (dynamic $x, dynamic $f, dynamic $g) : dynamic ==> {
      return $x === $undefined__0 ? $call1($f, 0) : ($call1($g, $x));
    };
    $get__0 = (dynamic $x, dynamic $f) : dynamic ==> {
      return $x === $undefined__0 ? $call1($f, 0) : ($x);
    };
    $option__0 = (dynamic $x) : dynamic ==> {
      if ($x) {$x__0 = $x[1];return $return__1($x__0);}
      return $undefined__0;
    };
    $to_option__0 = (dynamic $x) : dynamic ==> {
      $ag_ = (dynamic $x) : dynamic ==> {return Vector{0, $x};};
      return $case__1($x, (dynamic $param) : dynamic ==> {return 0;}, $ag_);
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
    } as dynamic;
    $coerce = (dynamic $x, dynamic $f, dynamic $g) : dynamic ==> {
      $ae_ = (dynamic $param) : dynamic ==> {return $call1($g, $x);};
      $af_ = $call1($f, $x);
      return $call2($Opt[8], $af_, $ae_);
    };
    $coerce_opt = (dynamic $x, dynamic $f, dynamic $g) : dynamic ==> {
      $ac_ = (dynamic $param) : dynamic ==> {return $call1($g, $x);};
      $ad_ = $call2($Opt[4], $x, $f);
      return $call2($Opt[8], $ad_, $ac_);
    };
    $true__0 = true;
    $false__0 = false;
    $a_ = (dynamic $x) : dynamic ==> {
      return $call1($caml_get_public_method($x, 876326544, 1), $x);
    };
    $b_ = $Unsafe[1];
    $string_constr = ((dynamic $t0, dynamic $param) : dynamic ==> {
       return $t0->String;
     })($b_, $a_);
    $c_ = (dynamic $x) : dynamic ==> {
      return $call1($caml_get_public_method($x, 595393896, 2), $x);
    };
    $d_ = $Unsafe[1];
    $regExp = ((dynamic $t1, dynamic $param) : dynamic ==> {
       return $t1->RegExp;
     })($d_, $c_);
    $e_ = (dynamic $x) : dynamic ==> {
      return $call1($caml_get_public_method($x, 944440446, 3), $x);
    };
    $f_ = $Unsafe[1];
    $object_constructor = ((dynamic $t2, dynamic $param) : dynamic ==> {
       return $t2->Object;
     })($f_, $e_);
    $object_keys = (dynamic $o) : dynamic ==> {
      $ab_ = (dynamic $x) : dynamic ==> {
        return $call1($caml_get_public_method($x, -955850252, 4), $x);
      };
      return ((dynamic $t4, dynamic $t3, dynamic $param) : dynamic ==> {return $t4->keys($t3);
       })($object_constructor, $o, $ab_);
    };
    $g_ = (dynamic $x) : dynamic ==> {
      return $call1($caml_get_public_method($x, 883172538, 5), $x);
    };
    $h_ = $Unsafe[1];
    $array_constructor = ((dynamic $t5, dynamic $param) : dynamic ==> {
       return $t5->Array;
     })($h_, $g_);
    $array_get = (dynamic $aa_, dynamic $Z_) : dynamic ==> {return $aa_[$Z_];};
    $array_set = (dynamic $Y_, dynamic $X_, dynamic $W_) : dynamic ==> {
      $Y_[$X_] = $W_;
      return 0;
    };
    $array_map_poly = (dynamic $a, dynamic $cb) : dynamic ==> {
      $V_ = (dynamic $x) : dynamic ==> {
        return $call1($caml_get_public_method($x, 5442204, 6), $x);
      };
      return ((dynamic $t7, dynamic $t6, dynamic $param) : dynamic ==> {return $t7->map($t6);
       })($a, $cb, $V_);
    };
    $array_map = (dynamic $f, dynamic $a) : dynamic ==> {
      return $array_map_poly(
        $a,
        $caml_js_wrap_callback(
          (dynamic $x, dynamic $idx, dynamic $param) : dynamic ==> {return $call1($f, $x);
          }
        )
      );
    };
    $array_mapi = (dynamic $f, dynamic $a) : dynamic ==> {
      return $array_map_poly(
        $a,
        $caml_js_wrap_callback(
          (dynamic $x, dynamic $idx, dynamic $param) : dynamic ==> {
            return $call2($f, $idx, $x);
          }
        )
      );
    };
    $str_array = (dynamic $U_) : dynamic ==> {return $U_;};
    $match_result = (dynamic $T_) : dynamic ==> {return $T_;};
    $i_ = (dynamic $x) : dynamic ==> {
      return $call1($caml_get_public_method($x, -531784147, 7), $x);
    };
    $j_ = $Unsafe[1];
    $date_constr = ((dynamic $t8, dynamic $param) : dynamic ==> {
       return $t8->Date;
     })($j_, $i_);
    $k_ = (dynamic $x) : dynamic ==> {
      return $call1($caml_get_public_method($x, -431978041, 8), $x);
    };
    $l_ = $Unsafe[1];
    $math = ((dynamic $t9, dynamic $param) : dynamic ==> {return $t9->Math;})($l_, $k_);
    $Error = Vector{
      248,
      $cst_Js_of_ocaml_Js_Error,
      $runtime["caml_fresh_oo_id"](0)
    } as dynamic;
    $m_ = (dynamic $x) : dynamic ==> {
      return $call1($caml_get_public_method($x, 37651177, 9), $x);
    };
    $n_ = $Unsafe[1];
    $error_constr = ((dynamic $t10, dynamic $param) : dynamic ==> {
       return $t10->Error;
     })($n_, $m_);
    
    $call2($Stdlib_callback[2], $cst_jsError, Vector{0, $Error, darray[]});
    
    $raise_js_error = (function($exn) {throw $exn;});
    $o_ = (dynamic $x) : dynamic ==> {
      return $call1($caml_get_public_method($x, -465951225, 10), $x);
    };
    $p_ = $Unsafe[1];
    $JSON = ((dynamic $t11, dynamic $param) : dynamic ==> {return $t11->JSON;})($p_, $o_);
    $decodeURI = (dynamic $s) : dynamic ==> {
      $R_ = (dynamic $x) : dynamic ==> {
        return $call1($caml_get_public_method($x, -994878754, 11), $x);
      };
      $S_ = $Unsafe[1];
      return ((dynamic $t12, dynamic $param) : dynamic ==> {
         return $t12->decodeURI;
       })($S_, $R_)($s);
    };
    $decodeURIComponent = (dynamic $s) : dynamic ==> {
      $P_ = (dynamic $x) : dynamic ==> {
        return $call1($caml_get_public_method($x, 751577599, 12), $x);
      };
      $Q_ = $Unsafe[1];
      return ((dynamic $t13, dynamic $param) : dynamic ==> {
         return $t13->decodeURIComponent;
       })($Q_, $P_)($s);
    };
    $encodeURI = (dynamic $s) : dynamic ==> {
      $N_ = (dynamic $x) : dynamic ==> {
        return $call1($caml_get_public_method($x, 443205366, 13), $x);
      };
      $O_ = $Unsafe[1];
      return ((dynamic $t14, dynamic $param) : dynamic ==> {
         return $t14->encodeURI;
       })($O_, $N_)($s);
    };
    $encodeURIComponent = (dynamic $s) : dynamic ==> {
      $L_ = (dynamic $x) : dynamic ==> {
        return $call1($caml_get_public_method($x, -641565977, 14), $x);
      };
      $M_ = $Unsafe[1];
      return ((dynamic $t15, dynamic $param) : dynamic ==> {
         return $t15->encodeURIComponent;
       })($M_, $L_)($s);
    };
    $escape = (dynamic $s) : dynamic ==> {
      $J_ = (dynamic $x) : dynamic ==> {
        return $call1($caml_get_public_method($x, -623230079, 15), $x);
      };
      $K_ = $Unsafe[1];
      return ((dynamic $t16, dynamic $param) : dynamic ==> {
         return $t16->escape;
       })($K_, $J_)($s);
    };
    $unescape = (dynamic $s) : dynamic ==> {
      $H_ = (dynamic $x) : dynamic ==> {
        return $call1($caml_get_public_method($x, -585010534, 16), $x);
      };
      $I_ = $Unsafe[1];
      return ((dynamic $t17, dynamic $param) : dynamic ==> {
         return $t17->unescape;
       })($I_, $H_)($s);
    };
    $isNaN = (dynamic $i) : dynamic ==> {
      $F_ = (dynamic $x) : dynamic ==> {
        return $call1($caml_get_public_method($x, -1051592975, 17), $x);
      };
      $G_ = $Unsafe[1];
      return (int)
      ((dynamic $t18, dynamic $param) : dynamic ==> {return $t18->isNaN;})($G_, $F_)($i);
    };
    $parseInt = (dynamic $s) : dynamic ==> {
      $D_ = (dynamic $x) : dynamic ==> {
        return $call1($caml_get_public_method($x, -697166212, 18), $x);
      };
      $E_ = $Unsafe[1];
      $s__0 = ((dynamic $t19, dynamic $param) : dynamic ==> {
         return $t19->parseInt;
       })($E_, $D_)($s);
      return $isNaN($s__0) ? $call1($Stdlib[2], $cst_parseInt) : ($s__0);
    };
    $parseFloat = (dynamic $s) : dynamic ==> {
      $B_ = (dynamic $x) : dynamic ==> {
        return $call1($caml_get_public_method($x, 746065001, 19), $x);
      };
      $C_ = $Unsafe[1];
      $s__0 = ((dynamic $t20, dynamic $param) : dynamic ==> {
         return $t20->parseFloat;
       })($C_, $B_)($s);
      return $isNaN($s__0) ? $call1($Stdlib[2], $cst_parseFloat) : ($s__0);
    };
    $q_ = (dynamic $param) : dynamic ==> {
      if ($param[1] === $Error) {
        $e = $param[2];
        $A_ = (dynamic $x) : dynamic ==> {
          return $call1($caml_get_public_method($x, 946786476, 20), $x);
        };
        return Vector{
          0,
          $caml_js_to_string(
            ((dynamic $t21, dynamic $param) : dynamic ==> {
               return $t21->toString();
             })($e, $A_)
          )
        };
      }
      return 0;
    };
    
    $call1($Stdlib_printexc[9], $q_);
    
    $r_ = (dynamic $e) : dynamic ==> {
      if (instance_of($e, $array_constructor)) {return 0;}
      $z_ = (dynamic $x) : dynamic ==> {
        return $call1($caml_get_public_method($x, 946786476, 21), $x);
      };
      return Vector{
        0,
        $caml_js_to_string(
          ((dynamic $t22, dynamic $param) : dynamic ==> {
             return $t22->toString();
           })($e, $z_)
        )
      };
    };
    
    $call1($Stdlib_printexc[9], $r_);
    
    $string_of_error = (dynamic $e) : dynamic ==> {
      $y_ = (dynamic $x) : dynamic ==> {
        return $call1($caml_get_public_method($x, 946786476, 22), $x);
      };
      return $caml_js_to_string(
        ((dynamic $t23, dynamic $param) : dynamic ==> {
           return $t23->toString();
         })($e, $y_)
      );
    };
    $export_js = (dynamic $field, dynamic $x) : dynamic ==> {
      $runtime["caml_js_export_var"](0)[$field] = $x;
      return 0;
    };
    $export__0 = (dynamic $field, dynamic $x) : dynamic ==> {
      return $export_js($field->toString(), $x);
    };
    $export_all = (dynamic $obj) : dynamic ==> {
      $keys = $object_keys($obj);
      $v_ = (dynamic $x) : dynamic ==> {
        return $call1($caml_get_public_method($x, -994170454, 23), $x);
      };
      $w_ = $caml_js_wrap_callback(
        (dynamic $key, dynamic $param, dynamic $x_) : dynamic ==> {
          return $export_js($key, $obj[$key]);
        }
      );
      return ((dynamic $t25, dynamic $t24, dynamic $param) : dynamic ==> {return $t25->forEach($t24);
       })($keys, $w_, $v_);
    };
    $s_ = (dynamic $u_) : dynamic ==> {return $u_;};
    $Js_of_ocaml_Js = Vector{
      0,
      $null__0,
      (dynamic $t_) : dynamic ==> {return $t_;},
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
    } as dynamic;
    
    return($Js_of_ocaml_Js);

  }
  public static function object_keys(dynamic $o): dynamic {
    return static::syncCall(__FUNCTION__, 13, $o);
  }
  public static function array_get(dynamic $unnamed1, dynamic $unnamed2): dynamic {
    return static::syncCall(__FUNCTION__, 16, $unnamed1, $unnamed2);
  }
  public static function array_set(dynamic $unnamed1, dynamic $unnamed2, dynamic $unnamed3): dynamic {
    return static::syncCall(__FUNCTION__, 17, $unnamed1, $unnamed2, $unnamed3);
  }
  public static function array_map(dynamic $f, dynamic $a): dynamic {
    return static::syncCall(__FUNCTION__, 18, $f, $a);
  }
  public static function array_mapi(dynamic $f, dynamic $a): dynamic {
    return static::syncCall(__FUNCTION__, 19, $f, $a);
  }
  public static function str_array(dynamic $unnamed1): dynamic {
    return static::syncCall(__FUNCTION__, 20, $unnamed1);
  }
  public static function match_result(dynamic $unnamed1): dynamic {
    return static::syncCall(__FUNCTION__, 21, $unnamed1);
  }
  public static function string_of_error(dynamic $e): dynamic {
    return static::syncCall(__FUNCTION__, 33, $e);
  }
  public static function decodeURI(dynamic $s): dynamic {
    return static::syncCall(__FUNCTION__, 37, $s);
  }
  public static function decodeURIComponent(dynamic $s): dynamic {
    return static::syncCall(__FUNCTION__, 38, $s);
  }
  public static function encodeURI(dynamic $s): dynamic {
    return static::syncCall(__FUNCTION__, 39, $s);
  }
  public static function encodeURIComponent(dynamic $s): dynamic {
    return static::syncCall(__FUNCTION__, 40, $s);
  }
  public static function escape(dynamic $s): dynamic {
    return static::syncCall(__FUNCTION__, 41, $s);
  }
  public static function unescape(dynamic $s): dynamic {
    return static::syncCall(__FUNCTION__, 42, $s);
  }
  public static function isNaN(dynamic $i): dynamic {
    return static::syncCall(__FUNCTION__, 43, $i);
  }
  public static function parseInt(dynamic $s): dynamic {
    return static::syncCall(__FUNCTION__, 44, $s);
  }
  public static function parseFloat(dynamic $s): dynamic {
    return static::syncCall(__FUNCTION__, 45, $s);
  }
  public static function coerce(dynamic $x, dynamic $f, dynamic $g): dynamic {
    return static::syncCall(__FUNCTION__, 46, $x, $f, $g);
  }
  public static function coerce_opt(dynamic $x, dynamic $f, dynamic $g): dynamic {
    return static::syncCall(__FUNCTION__, 47, $x, $f, $g);
  }
  public static function _export(dynamic $field, dynamic $x): dynamic {
    return static::syncCall(__FUNCTION__, 48, $field, $x);
  }
  public static function export_all(dynamic $obj): dynamic {
    return static::syncCall(__FUNCTION__, 49, $obj);
  }

}
/* Hashing disabled */
