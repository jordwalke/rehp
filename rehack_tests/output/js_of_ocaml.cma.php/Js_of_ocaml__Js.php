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
    $Pervasives = Pervasives::get();
    $Callback = Callback::get();
    $Printexc = Printexc::get();
    $global = joo_global_object;
    $Unsafe = Vector{0, $global} as dynamic;
    $null__0 = null;
    $undefined__0 = undefined;
    $return__0 = (dynamic $S_) ==> {return $S_;};
    $map = (dynamic $x, dynamic $f) ==> {
      return $x == $null__0 ? $null__0 : ($return__0($call1($f, $x)));
    };
    $bind = (dynamic $x, dynamic $f) ==> {
      return $x == $null__0 ? $null__0 : ($call1($f, $x));
    };
    $test = (dynamic $x) ==> {return 1 - ($x == $null__0 ? 1 : (0));};
    $iter = (dynamic $x, dynamic $f) ==> {
      $R_ = 1 - ($x == $null__0 ? 1 : (0));
      return $R_ ? $call1($f, $x) : ($R_);
    };
    $case__0 = (dynamic $x, dynamic $f, dynamic $g) ==> {
      return $x == $null__0 ? $call1($f, 0) : ($call1($g, $x));
    };
    $get = (dynamic $x, dynamic $f) ==> {
      return $x == $null__0 ? $call1($f, 0) : ($x);
    };
    $option = (dynamic $x) ==> {
      if ($x) {$x__0 = $x[1];return $return__0($x__0);}
      return $null__0;
    };
    $to_option = (dynamic $x) ==> {
      $Q_ = (dynamic $x) ==> {return Vector{0, $x};};
      return $case__0($x, (dynamic $param) ==> {return 0;}, $Q_);
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
    $return__1 = (dynamic $P_) ==> {return $P_;};
    $map__0 = (dynamic $x, dynamic $f) ==> {
      return $x === $undefined__0
        ? $undefined__0
        : ($return__1($call1($f, $x)));
    };
    $bind__0 = (dynamic $x, dynamic $f) ==> {
      return $x === $undefined__0 ? $undefined__0 : ($call1($f, $x));
    };
    $test__0 = (dynamic $x) ==> {return $x !== $undefined__0 ? 1 : (0);};
    $iter__0 = (dynamic $x, dynamic $f) ==> {
      $O_ = $x !== $undefined__0 ? 1 : (0);
      return $O_ ? $call1($f, $x) : ($O_);
    };
    $case__1 = (dynamic $x, dynamic $f, dynamic $g) ==> {
      return $x === $undefined__0 ? $call1($f, 0) : ($call1($g, $x));
    };
    $get__0 = (dynamic $x, dynamic $f) ==> {
      return $x === $undefined__0 ? $call1($f, 0) : ($x);
    };
    $option__0 = (dynamic $x) ==> {
      if ($x) {$x__0 = $x[1];return $return__1($x__0);}
      return $undefined__0;
    };
    $to_option__0 = (dynamic $x) ==> {
      $N_ = (dynamic $x) ==> {return Vector{0, $x};};
      return $case__1($x, (dynamic $param) ==> {return 0;}, $N_);
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
    $coerce = (dynamic $x, dynamic $f, dynamic $g) ==> {
      $M_ = (dynamic $param) ==> {return $call1($g, $x);};
      return $get($call1($f, $x), $M_);
    };
    $coerce_opt = (dynamic $x, dynamic $f, dynamic $g) ==> {
      $L_ = (dynamic $param) ==> {return $call1($g, $x);};
      return $get($bind($x, $f), $L_);
    };
    $true__0 = true;
    $false__0 = false;
    $a_ = (dynamic $x) ==> {
      return $call1($caml_get_public_method($x, 876326544, 1), $x);
    };
    $string_constr = ((dynamic $t0, dynamic $param) ==> {return $t0->String;})($global, $a_);
    $b_ = (dynamic $x) ==> {
      return $call1($caml_get_public_method($x, 595393896, 2), $x);
    };
    $regExp = ((dynamic $t1, dynamic $param) ==> {return $t1->RegExp;})($global, $b_);
    $c_ = (dynamic $x) ==> {
      return $call1($caml_get_public_method($x, 944440446, 3), $x);
    };
    $object_constructor = ((dynamic $t2, dynamic $param) ==> {return $t2->Object;
     })($global, $c_);
    $object_keys = (dynamic $o) ==> {
      $K_ = (dynamic $x) ==> {
        return $call1($caml_get_public_method($x, -955850252, 4), $x);
      };
      return ((dynamic $t4, dynamic $t3, dynamic $param) ==> {return $t4->keys($t3);
       })($object_constructor, $o, $K_);
    };
    $d_ = (dynamic $x) ==> {
      return $call1($caml_get_public_method($x, 883172538, 5), $x);
    };
    $array_constructor = ((dynamic $t5, dynamic $param) ==> {return $t5->Array;
     })($global, $d_);
    $array_get = (dynamic $J_, dynamic $I_) ==> {return $J_[$I_];};
    $array_set = (dynamic $H_, dynamic $G_, dynamic $F_) ==> {$H_[$G_] = $F_;return 0;
    };
    $array_map_poly = (dynamic $a, dynamic $cb) ==> {
      $E_ = (dynamic $x) ==> {
        return $call1($caml_get_public_method($x, 5442204, 6), $x);
      };
      return ((dynamic $t7, dynamic $t6, dynamic $param) ==> {return $t7->map($t6);
       })($a, $cb, $E_);
    };
    $array_map = (dynamic $f, dynamic $a) ==> {
      return $array_map_poly(
        $a,
        $caml_js_wrap_callback(
          (dynamic $x, dynamic $idx, dynamic $param) ==> {return $call1($f, $x);
          }
        )
      );
    };
    $array_mapi = (dynamic $f, dynamic $a) ==> {
      return $array_map_poly(
        $a,
        $caml_js_wrap_callback(
          (dynamic $x, dynamic $idx, dynamic $param) ==> {return $call2($f, $idx, $x);
          }
        )
      );
    };
    $str_array = (dynamic $D_) ==> {return $D_;};
    $match_result = (dynamic $C_) ==> {return $C_;};
    $e_ = (dynamic $x) ==> {
      return $call1($caml_get_public_method($x, -531784147, 7), $x);
    };
    $date_constr = ((dynamic $t8, dynamic $param) ==> {return $t8->Date;})($global, $e_);
    $f_ = (dynamic $x) ==> {
      return $call1($caml_get_public_method($x, -431978041, 8), $x);
    };
    $math = ((dynamic $t9, dynamic $param) ==> {return $t9->Math;})($global, $f_);
    $Error = Vector{
      248,
      $cst_Js_of_ocaml_Js_Error,
      $runtime["caml_fresh_oo_id"](0)
    } as dynamic;
    $g_ = (dynamic $x) ==> {
      return $call1($caml_get_public_method($x, 37651177, 9), $x);
    };
    $error_constr = ((dynamic $t10, dynamic $param) ==> {return $t10->Error;})($global, $g_);
    
    $call2($Callback[2], $cst_jsError, Vector{0, $Error, darray[]});
    
    $raise_js_error = (function($exn) {throw $exn;});
    $h_ = (dynamic $x) ==> {
      return $call1($caml_get_public_method($x, -465951225, 10), $x);
    };
    $JSON = ((dynamic $t11, dynamic $param) ==> {return $t11->JSON;})($global, $h_);
    $decodeURI = (dynamic $s) ==> {
      $B_ = (dynamic $x) ==> {
        return $call1($caml_get_public_method($x, -994878754, 11), $x);
      };
      return ((dynamic $t12, dynamic $param) ==> {return $t12->decodeURI;})($global, $B_)($s);
    };
    $decodeURIComponent = (dynamic $s) ==> {
      $A_ = (dynamic $x) ==> {
        return $call1($caml_get_public_method($x, 751577599, 12), $x);
      };
      return ((dynamic $t13, dynamic $param) ==> {
         return $t13->decodeURIComponent;
       })($global, $A_)($s);
    };
    $encodeURI = (dynamic $s) ==> {
      $z_ = (dynamic $x) ==> {
        return $call1($caml_get_public_method($x, 443205366, 13), $x);
      };
      return ((dynamic $t14, dynamic $param) ==> {return $t14->encodeURI;})($global, $z_)($s);
    };
    $encodeURIComponent = (dynamic $s) ==> {
      $y_ = (dynamic $x) ==> {
        return $call1($caml_get_public_method($x, -641565977, 14), $x);
      };
      return ((dynamic $t15, dynamic $param) ==> {
         return $t15->encodeURIComponent;
       })($global, $y_)($s);
    };
    $escape = (dynamic $s) ==> {
      $x_ = (dynamic $x) ==> {
        return $call1($caml_get_public_method($x, -623230079, 15), $x);
      };
      return ((dynamic $t16, dynamic $param) ==> {return $t16->escape;})($global, $x_)($s);
    };
    $unescape = (dynamic $s) ==> {
      $w_ = (dynamic $x) ==> {
        return $call1($caml_get_public_method($x, -585010534, 16), $x);
      };
      return ((dynamic $t17, dynamic $param) ==> {return $t17->unescape;})($global, $w_)($s);
    };
    $isNaN = (dynamic $i) ==> {
      $v_ = (dynamic $x) ==> {
        return $call1($caml_get_public_method($x, -1051592975, 17), $x);
      };
      return (int)
      ((dynamic $t18, dynamic $param) ==> {return $t18->isNaN;})($global, $v_)($i);
    };
    $parseInt = (dynamic $s) ==> {
      $u_ = (dynamic $x) ==> {
        return $call1($caml_get_public_method($x, -697166212, 18), $x);
      };
      $s__0 = ((dynamic $t19, dynamic $param) ==> {return $t19->parseInt;})($global, $u_)($s);
      return $isNaN($s__0) ? $call1($Pervasives[2], $cst_parseInt) : ($s__0);
    };
    $parseFloat = (dynamic $s) ==> {
      $t_ = (dynamic $x) ==> {
        return $call1($caml_get_public_method($x, 746065001, 19), $x);
      };
      $s__0 = ((dynamic $t20, dynamic $param) ==> {return $t20->parseFloat;})($global, $t_)($s);
      return $isNaN($s__0) ? $call1($Pervasives[2], $cst_parseFloat) : ($s__0);
    };
    $i_ = (dynamic $param) ==> {
      if ($param[1] === $Error) {
        $e = $param[2];
        $s_ = (dynamic $x) ==> {
          return $call1($caml_get_public_method($x, 946786476, 20), $x);
        };
        return Vector{
          0,
          $caml_js_to_string(
            ((dynamic $t21, dynamic $param) ==> {return $t21->toString();})($e, $s_)
          )
        };
      }
      return 0;
    };
    
    $call1($Printexc[8], $i_);
    
    $j_ = (dynamic $e) ==> {
      if (instance_of($e, $array_constructor)) {return 0;}
      $r_ = (dynamic $x) ==> {
        return $call1($caml_get_public_method($x, 946786476, 21), $x);
      };
      return Vector{
        0,
        $caml_js_to_string(
          ((dynamic $t22, dynamic $param) ==> {return $t22->toString();})($e, $r_)
        )
      };
    };
    
    $call1($Printexc[8], $j_);
    
    $string_of_error = (dynamic $e) ==> {
      $q_ = (dynamic $x) ==> {
        return $call1($caml_get_public_method($x, 946786476, 22), $x);
      };
      return $caml_js_to_string(
        ((dynamic $t23, dynamic $param) ==> {return $t23->toString();})($e, $q_)
      );
    };
    $export_js = (dynamic $field, dynamic $x) ==> {
      $runtime["caml_js_export_var"](0)[$field] = $x;
      return 0;
    };
    $export__0 = (dynamic $field, dynamic $x) ==> {
      return $export_js($field->toString(), $x);
    };
    $export_all = (dynamic $obj) ==> {
      $keys = $object_keys($obj);
      $n_ = (dynamic $x) ==> {
        return $call1($caml_get_public_method($x, -994170454, 23), $x);
      };
      $o_ = $caml_js_wrap_callback(
        (dynamic $key, dynamic $param, dynamic $p_) ==> {return $export_js($key, $obj[$key]);
        }
      );
      return ((dynamic $t25, dynamic $t24, dynamic $param) ==> {return $t25->forEach($t24);
       })($keys, $o_, $n_);
    };
    $k_ = (dynamic $m_) ==> {return $m_;};
    $Js_of_ocaml_Js = Vector{
      0,
      $null__0,
      (dynamic $l_) ==> {return $l_;},
      $undefined__0,
      $k_,
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
