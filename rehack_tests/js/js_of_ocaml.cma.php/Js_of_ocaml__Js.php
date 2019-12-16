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
    $return__0 = function(dynamic $S_) {return $S_;};
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
      $R_ = 1 - ($x == $null__0 ? 1 : (0));
      return $R_ ? $call1($f, $x) : ($R_);
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
      $Q_ = function(dynamic $x) {return Vector{0, $x};};
      return $case__0($x, function(dynamic $param) {return 0;}, $Q_);
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
    $return__1 = function(dynamic $P_) {return $P_;};
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
      $O_ = $x !== $undefined__0 ? 1 : (0);
      return $O_ ? $call1($f, $x) : ($O_);
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
      $N_ = function(dynamic $x) {return Vector{0, $x};};
      return $case__1($x, function(dynamic $param) {return 0;}, $N_);
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
    $coerce = function(dynamic $x, dynamic $f, dynamic $g) use ($call1,$get) {
      $M_ = function(dynamic $param) use ($call1,$g,$x) {
        return $call1($g, $x);
      };
      return $get($call1($f, $x), $M_);
    };
    $coerce_opt = function(dynamic $x, dynamic $f, dynamic $g) use ($bind,$call1,$get) {
      $L_ = function(dynamic $param) use ($call1,$g,$x) {
        return $call1($g, $x);
      };
      return $get($bind($x, $f), $L_);
    };
    $true__0 =  true ;
    $false__0 =  false ;
    $a_ = function(dynamic $x) use ($call1,$caml_get_public_method) {
      return $call1($caml_get_public_method($x, 876326544, 1), $x);
    };
    $string_constr = (function(dynamic $t0, dynamic $param) {return $t0->String;
     })($global, $a_);
    $b_ = function(dynamic $x) use ($call1,$caml_get_public_method) {
      return $call1($caml_get_public_method($x, 595393896, 2), $x);
    };
    $regExp = (function(dynamic $t1, dynamic $param) {return $t1->RegExp;})($global, $b_);
    $c_ = function(dynamic $x) use ($call1,$caml_get_public_method) {
      return $call1($caml_get_public_method($x, 944440446, 3), $x);
    };
    $object_constructor = (function(dynamic $t2, dynamic $param) {return $t2->Object;
     })($global, $c_);
    $object_keys = function(dynamic $o) use ($call1,$caml_get_public_method,$object_constructor) {
      $K_ = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, -955850252, 4), $x);
      };
      return (function(dynamic $t4, dynamic $t3, dynamic $param) {return $t4->keys($t3);
       })($object_constructor, $o, $K_);
    };
    $d_ = function(dynamic $x) use ($call1,$caml_get_public_method) {
      return $call1($caml_get_public_method($x, 883172538, 5), $x);
    };
    $array_constructor = (function(dynamic $t5, dynamic $param) {return $t5->Array;
     })($global, $d_);
    $array_get = function(dynamic $J_, dynamic $I_) {return $J_[$I_];};
    $array_set = function(dynamic $H_, dynamic $G_, dynamic $F_) {$H_[$G_] = $F_;return 0;
    };
    $array_map_poly = function(dynamic $a, dynamic $cb) use ($call1,$caml_get_public_method) {
      $E_ = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, 5442204, 6), $x);
      };
      return (function(dynamic $t7, dynamic $t6, dynamic $param) {return $t7->map($t6);
       })($a, $cb, $E_);
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
    $str_array = function(dynamic $D_) {return $D_;};
    $match_result = function(dynamic $C_) {return $C_;};
    $e_ = function(dynamic $x) use ($call1,$caml_get_public_method) {
      return $call1($caml_get_public_method($x, -531784147, 7), $x);
    };
    $date_constr = (function(dynamic $t8, dynamic $param) {return $t8->Date;})($global, $e_);
    $f_ = function(dynamic $x) use ($call1,$caml_get_public_method) {
      return $call1($caml_get_public_method($x, -431978041, 8), $x);
    };
    $math = (function(dynamic $t9, dynamic $param) {return $t9->Math;})($global, $f_);
    $Error = Vector{
      248,
      $cst_Js_of_ocaml_Js_Error,
      $runtime["caml_fresh_oo_id"](0)
    };
    $g_ = function(dynamic $x) use ($call1,$caml_get_public_method) {
      return $call1($caml_get_public_method($x, 37651177, 9), $x);
    };
    $error_constr = (function(dynamic $t10, dynamic $param) {return $t10->Error;
     })($global, $g_);
    
    $call2($Callback[2], $cst_jsError, Vector{0, $Error, darray[]});
    
    $raise_js_error =  (function($exn) {throw $exn;}) ;
    $h_ = function(dynamic $x) use ($call1,$caml_get_public_method) {
      return $call1($caml_get_public_method($x, -465951225, 10), $x);
    };
    $JSON = (function(dynamic $t11, dynamic $param) {return $t11->JSON;})($global, $h_);
    $decodeURI = function(dynamic $s) use ($call1,$caml_get_public_method,$global) {
      $B_ = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, -994878754, 11), $x);
      };
      return (function(dynamic $t12, dynamic $param) {return $t12->decodeURI;})($global, $B_)($s);
    };
    $decodeURIComponent = function(dynamic $s) use ($call1,$caml_get_public_method,$global) {
      $A_ = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, 751577599, 12), $x);
      };
      return (function(dynamic $t13, dynamic $param) {return $t13->decodeURIComponent;
       })($global, $A_)($s);
    };
    $encodeURI = function(dynamic $s) use ($call1,$caml_get_public_method,$global) {
      $z_ = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, 443205366, 13), $x);
      };
      return (function(dynamic $t14, dynamic $param) {return $t14->encodeURI;})($global, $z_)($s);
    };
    $encodeURIComponent = function(dynamic $s) use ($call1,$caml_get_public_method,$global) {
      $y_ = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, -641565977, 14), $x);
      };
      return (function(dynamic $t15, dynamic $param) {return $t15->encodeURIComponent;
       })($global, $y_)($s);
    };
    $escape = function(dynamic $s) use ($call1,$caml_get_public_method,$global) {
      $x_ = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, -623230079, 15), $x);
      };
      return (function(dynamic $t16, dynamic $param) {return $t16->escape;})($global, $x_)($s);
    };
    $unescape = function(dynamic $s) use ($call1,$caml_get_public_method,$global) {
      $w_ = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, -585010534, 16), $x);
      };
      return (function(dynamic $t17, dynamic $param) {return $t17->unescape;})($global, $w_)($s);
    };
    $isNaN = function(dynamic $i) use ($call1,$caml_get_public_method,$global) {
      $v_ = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, -1051592975, 17), $x);
      };
      return (int)
      (function(dynamic $t18, dynamic $param) {return $t18->isNaN;})($global, $v_)($i);
    };
    $parseInt = function(dynamic $s) use ($Pervasives,$call1,$caml_get_public_method,$cst_parseInt,$global,$isNaN) {
      $u_ = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, -697166212, 18), $x);
      };
      $s__0 = (function(dynamic $t19, dynamic $param) {return $t19->parseInt;})($global, $u_)($s);
      return $isNaN($s__0) ? $call1($Pervasives[2], $cst_parseInt) : ($s__0);
    };
    $parseFloat = function(dynamic $s) use ($Pervasives,$call1,$caml_get_public_method,$cst_parseFloat,$global,$isNaN) {
      $t_ = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, 746065001, 19), $x);
      };
      $s__0 = (function(dynamic $t20, dynamic $param) {return $t20->parseFloat;
       })($global, $t_)($s);
      return $isNaN($s__0) ? $call1($Pervasives[2], $cst_parseFloat) : ($s__0);
    };
    $i_ = function(dynamic $param) use ($Error,$call1,$caml_get_public_method,$caml_js_to_string) {
      if ($param[1] === $Error) {
        $e = $param[2];
        $s_ = function(dynamic $x) use ($call1,$caml_get_public_method) {
          return $call1($caml_get_public_method($x, 946786476, 20), $x);
        };
        return Vector{
          0,
          $caml_js_to_string(
            (function(dynamic $t21, dynamic $param) {return $t21->toString();})($e, $s_)
          )
        };
      }
      return 0;
    };
    
    $call1($Printexc[8], $i_);
    
    $j_ = function(dynamic $e) use ($array_constructor,$call1,$caml_get_public_method,$caml_js_to_string) {
      if (instance_of($e, $array_constructor)) {return 0;}
      $r_ = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, 946786476, 21), $x);
      };
      return Vector{
        0,
        $caml_js_to_string(
          (function(dynamic $t22, dynamic $param) {return $t22->toString();})($e, $r_)
        )
      };
    };
    
    $call1($Printexc[8], $j_);
    
    $string_of_error = function(dynamic $e) use ($call1,$caml_get_public_method,$caml_js_to_string) {
      $q_ = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, 946786476, 22), $x);
      };
      return $caml_js_to_string(
        (function(dynamic $t23, dynamic $param) {return $t23->toString();})($e, $q_)
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
      $n_ = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, -994170454, 23), $x);
      };
      $o_ = $caml_js_wrap_callback(
        function(dynamic $key, dynamic $param, dynamic $p_) use ($export_js,$obj) {
          return $export_js($key, $obj[$key]);
        }
      );
      return (function(dynamic $t25, dynamic $t24, dynamic $param) {return $t25->forEach($t24);
       })($keys, $o_, $n_);
    };
    $k_ = function(dynamic $m_) {return $m_;};
    $Js_of_ocaml_Js = Vector{
      0,
      $null__0,
      function(dynamic $l_) {return $l_;},
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
    };
    
    $runtime["caml_register_global"](36, $Js_of_ocaml_Js, "Js_of_ocaml__Js");

  }
}

/* Hashing disabled */
