<?hh
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * Js.php
 */

namespace Rehack;

final class Js {
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
    Js::load($global_object);
    $memoized = $runtime->caml_get_global_data()->Js;
    return $memoized;
  }

  /**
   * Performs module load operation. May have side effects.
   */
  private static function load($joo_global_object) {
    

    $runtime = $joo_global_object->jsoo_runtime;
    $undefined = $runtime->undefined;
    $null = $runtime->null;
    $_ = $joo_global_object->contents = $runtime->joo_global_object;
    $caml_arity_test = $runtime->caml_arity_test;
    $Func = $runtime->Func;
    $ArrayLiteral = $runtime->ArrayLiteral;
    $caml_get_public_method = $runtime->caml_get_public_method;
    $caml_js_to_string = $runtime->caml_js_to_string;
    $caml_js_wrap_callback = $runtime->caml_js_wrap_callback;
    $caml_new_string = $runtime->caml_new_string;
    $caml_call1 = function($f, $a0) use ($ArrayLiteral,$caml_arity_test,$runtime) {
      return $caml_arity_test($f) == 1
        ? $f($a0)
        : ($runtime->caml_call_gen($f, $ArrayLiteral($a0)));
    };
    $caml_call2 = function($f, $a0, $a1) use ($ArrayLiteral,$caml_arity_test,$runtime) {
      return $caml_arity_test($f) == 2
        ? $f($a0, $a1)
        : ($runtime->caml_call_gen($f, $ArrayLiteral($a0, $a1)));
    };
    $global_data = $runtime->caml_get_global_data();
    $cst_parseFloat = $caml_new_string("parseFloat");
    $cst_parseInt = $caml_new_string("parseInt");
    $cst_Js_Error = $caml_new_string("Js.Error");
    $cst_jsError = $caml_new_string("jsError");
    $Pervasives = $global_data->Pervasives;
    $Callback = $global_data->Callback;
    $Printexc = $global_data->Printexc;
    $global = $joo_global_object;
    $Unsafe = V(0, $global);
    $null__0 = varray[];
    $undefined__0 = NULL;
    $return__0 = function($ak) {return $ak;};
    $map = function($x, $f) use ($caml_call1,$null__0,$return__0) {
      return $x == $null__0 ? $null__0 : ($return__0($caml_call1($f, $x)));
    };
    $bind = function($x, $f) use ($caml_call1,$null__0) {
      return $x == $null__0 ? $null__0 : ($caml_call1($f, $x));
    };
    $test = function($x) use ($null__0) {
      return 1 - ($x == $null__0 ? 1 : (0));
    };
    $iter = function($x, $f) use ($caml_call1,$null__0) {
      $aj = 1 - ($x == $null__0 ? 1 : (0));
      return $aj ? $caml_call1($f, $x) : ($aj);
    };
    $case__0 = function($x, $f, $g) use ($caml_call1,$null__0) {
      return $x == $null__0 ? $caml_call1($f, 0) : ($caml_call1($g, $x));
    };
    $get = function($x, $f) use ($caml_call1,$null__0) {
      return $x == $null__0 ? $caml_call1($f, 0) : ($x);
    };
    $option = function($x) use ($null__0,$return__0) {
      if ($x) {$x__0 = $x[1];return $return__0($x__0);}
      return $null__0;
    };
    $to_option = function($x) use ($case__0) {
      $ai = function($x) {return V(0, $x);};
      return $case__0($x, function($param) {return 0;}, $ai);
    };
    $Opt = V(
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
    );
    $return__1 = function($ah) {return $ah;};
    $map__0 = function($x, $f) use ($caml_call1,$return__1,$undefined__0) {
      return $x === $undefined__0
        ? $undefined__0
        : ($return__1($caml_call1($f, $x)));
    };
    $bind__0 = function($x, $f) use ($caml_call1,$undefined__0) {
      return $x === $undefined__0 ? $undefined__0 : ($caml_call1($f, $x));
    };
    $test__0 = function($x) use ($undefined__0) {
      return $x !== $undefined__0 ? 1 : (0);
    };
    $iter__0 = function($x, $f) use ($caml_call1,$undefined__0) {
      $ag = $x !== $undefined__0 ? 1 : (0);
      return $ag ? $caml_call1($f, $x) : ($ag);
    };
    $case__1 = function($x, $f, $g) use ($caml_call1,$undefined__0) {
      return $x === $undefined__0 ? $caml_call1($f, 0) : ($caml_call1($g, $x));
    };
    $get__0 = function($x, $f) use ($caml_call1,$undefined__0) {
      return $x === $undefined__0 ? $caml_call1($f, 0) : ($x);
    };
    $option__0 = function($x) use ($return__1,$undefined__0) {
      if ($x) {$x__0 = $x[1];return $return__1($x__0);}
      return $undefined__0;
    };
    $to_option__0 = function($x) use ($case__1) {
      $af = function($x) {return V(0, $x);};
      return $case__1($x, function($param) {return 0;}, $af);
    };
    $Optdef = V(
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
    );
    $coerce = function($x, $f, $g) use ($Opt,$caml_call1,$caml_call2) {
      $ad = function($param) use ($caml_call1,$g,$x) {
        return $caml_call1($g, $x);
      };
      $ae = $caml_call1($f, $x);
      return $caml_call2($Opt[8], $ae, $ad);
    };
    $coerce_opt = function($x, $f, $g) use ($Opt,$caml_call1,$caml_call2) {
      $ab = function($param) use ($caml_call1,$g,$x) {
        return $caml_call1($g, $x);
      };
      $ac = $caml_call2($Opt[4], $x, $f);
      return $caml_call2($Opt[8], $ac, $ab);
    };
    $true__0 = true;
    $false__0 = false;
    $a = function($x) use ($caml_call1,$caml_get_public_method) {
      return $caml_call1($caml_get_public_method($x, 876326544, 1), $x);
    };
    $b = $Unsafe[1];
    $string_constr = (function($t0, $param) {return $t0->String;})($b, $a);
    $c = function($x) use ($caml_call1,$caml_get_public_method) {
      return $caml_call1($caml_get_public_method($x, 595393896, 2), $x);
    };
    $d = $Unsafe[1];
    $regExp = (function($t1, $param) {return $t1->RegExp;})($d, $c);
    $e = function($x) use ($caml_call1,$caml_get_public_method) {
      return $caml_call1($caml_get_public_method($x, 944440446, 3), $x);
    };
    $f = $Unsafe[1];
    $object_constructor = (function($t2, $param) {return $t2->Object;})($f, $e);
    $object_keys = function($o) use ($caml_call1,$caml_get_public_method,$object_constructor) {
      $aa = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, -955850252, 4), $x);
      };
      return (function($t4, $t3, $param) {return $t4->keys($t3);})($object_constructor, $o, $aa);
    };
    $g = function($x) use ($caml_call1,$caml_get_public_method) {
      return $caml_call1($caml_get_public_method($x, 883172538, 5), $x);
    };
    $h = $Unsafe[1];
    $array_constructor = (function($t5, $param) {return $t5->Array;})($h, $g);
    $array_get = function($_, $Z) {return $_[$Z];};
    $array_set = function($Y, $X, $W) {return $Y[$X] = $W;};
    $array_map_poly = function($a, $cb) use ($caml_call1,$caml_get_public_method) {
      $V = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, 5442204, 6), $x);
      };
      return (function($t7, $t6, $param) {return $t7->map($t6);})($a, $cb, $V);
    };
    $array_map = function($f, $a) use ($array_map_poly,$caml_call1,$caml_js_wrap_callback) {
      return $array_map_poly(
        $a,
        $caml_js_wrap_callback(
          function($x, $idx, $param) use ($caml_call1,$f) {
            return $caml_call1($f, $x);
          }
        )
      );
    };
    $array_mapi = function($f, $a) use ($array_map_poly,$caml_call2,$caml_js_wrap_callback) {
      return $array_map_poly(
        $a,
        $caml_js_wrap_callback(
          function($x, $idx, $param) use ($caml_call2,$f) {
            return $caml_call2($f, $idx, $x);
          }
        )
      );
    };
    $str_array = function($U) {return $U;};
    $match_result = function($T) {return $T;};
    $i = function($x) use ($caml_call1,$caml_get_public_method) {
      return $caml_call1($caml_get_public_method($x, -531784147, 7), $x);
    };
    $j = $Unsafe[1];
    $date_constr = (function($t8, $param) {return $t8->Date;})($j, $i);
    $k = function($x) use ($caml_call1,$caml_get_public_method) {
      return $caml_call1($caml_get_public_method($x, -431978041, 8), $x);
    };
    $l = $Unsafe[1];
    $math = (function($t9, $param) {return $t9->Math;})($l, $k);
    $Error = V(248, $cst_Js_Error, $runtime->caml_fresh_oo_id(0));
    $m = function($x) use ($caml_call1,$caml_get_public_method) {
      return $caml_call1($caml_get_public_method($x, 37651177, 9), $x);
    };
    $n = $Unsafe[1];
    $error_constr = (function($t10, $param) {return $t10->Error;})($n, $m);
    
    $caml_call2($Callback[2], $cst_jsError, V(0, $Error, (object)darray[]));
    
    $raise_js_error = $Func(function($exn) {throw $exn;});
    $o = function($x) use ($caml_call1,$caml_get_public_method) {
      return $caml_call1($caml_get_public_method($x, -465951225, 10), $x);
    };
    $p = $Unsafe[1];
    $JSON = (function($t11, $param) {return $t11->JSON;})($p, $o);
    $decodeURI = function($s) use ($Unsafe,$caml_call1,$caml_get_public_method) {
      $R = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, -994878754, 11), $x);
      };
      $S = $Unsafe[1];
      return (function($t12, $param) {return $t12->decodeURI;})($S, $R)($s);
    };
    $decodeURIComponent = function($s) use ($Unsafe,$caml_call1,$caml_get_public_method) {
      $P = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, 751577599, 12), $x);
      };
      $Q = $Unsafe[1];
      return (function($t13, $param) {return $t13->decodeURIComponent;})($Q, $P)($s);
    };
    $encodeURI = function($s) use ($Unsafe,$caml_call1,$caml_get_public_method) {
      $N = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, 443205366, 13), $x);
      };
      $O = $Unsafe[1];
      return (function($t14, $param) {return $t14->encodeURI;})($O, $N)($s);
    };
    $encodeURIComponent = function($s) use ($Unsafe,$caml_call1,$caml_get_public_method) {
      $L = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, -641565977, 14), $x);
      };
      $M = $Unsafe[1];
      return (function($t15, $param) {return $t15->encodeURIComponent;})($M, $L)($s);
    };
    $escape = function($s) use ($Unsafe,$caml_call1,$caml_get_public_method) {
      $J = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, -623230079, 15), $x);
      };
      $K = $Unsafe[1];
      return (function($t16, $param) {return $t16->escape;})($K, $J)($s);
    };
    $unescape = function($s) use ($Unsafe,$caml_call1,$caml_get_public_method) {
      $H = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, -585010534, 16), $x);
      };
      $I = $Unsafe[1];
      return (function($t17, $param) {return $t17->unescape;})($I, $H)($s);
    };
    $isNaN = function($i) use ($Unsafe,$caml_call1,$caml_get_public_method) {
      $F = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, -1051592975, 17), $x);
      };
      $G = $Unsafe[1];
      return (function($t18, $param) {return $t18->isNaN;})($G, $F)($i) | 0;
    };
    $parseInt = function($s) use ($Pervasives,$Unsafe,$caml_call1,$caml_get_public_method,$cst_parseInt,$isNaN) {
      $D = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, -697166212, 18), $x);
      };
      $E = $Unsafe[1];
      $s__0 = (function($t19, $param) {return $t19->parseInt;})($E, $D)($s);
      return $isNaN($s__0)
        ? $caml_call1($Pervasives[2], $cst_parseInt)
        : ($s__0);
    };
    $parseFloat = function($s) use ($Pervasives,$Unsafe,$caml_call1,$caml_get_public_method,$cst_parseFloat,$isNaN) {
      $B = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, 746065001, 19), $x);
      };
      $C = $Unsafe[1];
      $s__0 = (function($t20, $param) {return $t20->parseFloat;})($C, $B)($s);
      return $isNaN($s__0)
        ? $caml_call1($Pervasives[2], $cst_parseFloat)
        : ($s__0);
    };
    $q = function($param) use ($Error,$caml_call1,$caml_get_public_method,$caml_js_to_string) {
      if ($param[1] === $Error) {
        $e = $param[2];
        $A = function($x) use ($caml_call1,$caml_get_public_method) {
          return $caml_call1($caml_get_public_method($x, 946786476, 20), $x);
        };
        return V(
          0,
          $caml_js_to_string(
            (function($t21, $param) {return $t21->toString();})($e, $A)
          )
        );
      }
      return 0;
    };
    
    $caml_call1($Printexc[8], $q);
    
    $r = function($e) use ($array_constructor,$caml_call1,$caml_get_public_method,$caml_js_to_string) {
      if (instance_of($e, $array_constructor)) {return 0;}
      $z = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, 946786476, 21), $x);
      };
      return V(
        0,
        $caml_js_to_string(
          (function($t22, $param) {return $t22->toString();})($e, $z)
        )
      );
    };
    
    $caml_call1($Printexc[8], $r);
    
    $string_of_error = function($e) use ($caml_call1,$caml_get_public_method,$caml_js_to_string) {
      $y = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, 946786476, 22), $x);
      };
      return $caml_js_to_string(
        (function($t23, $param) {return $t23->toString();})($e, $y)
      );
    };
    $export_js = function($field, $x) use ($runtime) {
      return $runtime->caml_js_export_var(0)[$field] = $x;
    };
    $export__0 = function($field, $x) use ($export_js) {
      return $export_js($field->toString(), $x);
    };
    $export_all = function($obj) use ($caml_call1,$caml_get_public_method,$caml_js_wrap_callback,$export_js,$object_keys) {
      $keys = $object_keys($obj);
      $v = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, -994170454, 23), $x);
      };
      $w = $caml_js_wrap_callback(
        function($key, $param, $x) use ($export_js,$obj) {
          return $export_js($key, $obj[$key]);
        }
      );
      return (function($t25, $t24, $param) {return $t25->forEach($t24);})($keys, $w, $v);
    };
    $s = function($u) {return $u;};
    $Js = V(
      0,
      $null__0,
      function($t) {return $t;},
      $undefined__0,
      $s,
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
    );
    
    $runtime->caml_register_global(36, $Js, "Js");

  }
}