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
    $return__0 = function(dynamic $al) {return $al;};
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
      $ak = 1 - ($x == $null__0 ? 1 : (0));
      return $ak ? $call1($f, $x) : ($ak);
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
      $aj = function(dynamic $x) {return Vector{0, $x};};
      return $case__0($x, function(dynamic $param) {return 0;}, $aj);
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
    $return__1 = function(dynamic $ai) {return $ai;};
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
      $ah = $x !== $undefined__0 ? 1 : (0);
      return $ah ? $call1($f, $x) : ($ah);
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
      $ag = function(dynamic $x) {return Vector{0, $x};};
      return $case__1($x, function(dynamic $param) {return 0;}, $ag);
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
      $ae = function(dynamic $param) use ($call1,$g,$x) {
        return $call1($g, $x);
      };
      $af = $call1($f, $x);
      return $call2($Opt[8], $af, $ae);
    };
    $coerce_opt = function(dynamic $x, dynamic $f, dynamic $g) use ($Opt,$call1,$call2) {
      $ac = function(dynamic $param) use ($call1,$g,$x) {
        return $call1($g, $x);
      };
      $ad = $call2($Opt[4], $x, $f);
      return $call2($Opt[8], $ad, $ac);
    };
    $true__0 =  true ;
    $false__0 =  false ;
    $a = function(dynamic $x) use ($call1,$caml_get_public_method) {
      return $call1($caml_get_public_method($x, 876326544, 1), $x);
    };
    $b = $Unsafe[1];
    $string_constr = (function(dynamic $t0, dynamic $param) {return $t0->String;
     })($b, $a);
    $c = function(dynamic $x) use ($call1,$caml_get_public_method) {
      return $call1($caml_get_public_method($x, 595393896, 2), $x);
    };
    $d = $Unsafe[1];
    $regExp = (function(dynamic $t1, dynamic $param) {return $t1->RegExp;})($d, $c);
    $e = function(dynamic $x) use ($call1,$caml_get_public_method) {
      return $call1($caml_get_public_method($x, 944440446, 3), $x);
    };
    $f = $Unsafe[1];
    $object_constructor = (function(dynamic $t2, dynamic $param) {return $t2->Object;
     })($f, $e);
    $object_keys = function(dynamic $o) use ($call1,$caml_get_public_method,$object_constructor) {
      $ab = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, -955850252, 4), $x);
      };
      return (function(dynamic $t4, dynamic $t3, dynamic $param) {return $t4->keys($t3);
       })($object_constructor, $o, $ab);
    };
    $g = function(dynamic $x) use ($call1,$caml_get_public_method) {
      return $call1($caml_get_public_method($x, 883172538, 5), $x);
    };
    $h = $Unsafe[1];
    $array_constructor = (function(dynamic $t5, dynamic $param) {return $t5->Array;
     })($h, $g);
    $array_get = function(dynamic $aa, dynamic $Z) {return $aa[$Z];};
    $array_set = function(dynamic $Y, dynamic $X, dynamic $W) {$Y[$X] = $W;return 0;
    };
    $array_map_poly = function(dynamic $a, dynamic $cb) use ($call1,$caml_get_public_method) {
      $V = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, 5442204, 6), $x);
      };
      return (function(dynamic $t7, dynamic $t6, dynamic $param) {return $t7->map($t6);
       })($a, $cb, $V);
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
    $str_array = function(dynamic $U) {return $U;};
    $match_result = function(dynamic $T) {return $T;};
    $i = function(dynamic $x) use ($call1,$caml_get_public_method) {
      return $call1($caml_get_public_method($x, -531784147, 7), $x);
    };
    $j = $Unsafe[1];
    $date_constr = (function(dynamic $t8, dynamic $param) {return $t8->Date;})($j, $i);
    $k = function(dynamic $x) use ($call1,$caml_get_public_method) {
      return $call1($caml_get_public_method($x, -431978041, 8), $x);
    };
    $l = $Unsafe[1];
    $math = (function(dynamic $t9, dynamic $param) {return $t9->Math;})($l, $k);
    $Error = Vector{
      248,
      $cst_Js_of_ocaml_Js_Error,
      $runtime["caml_fresh_oo_id"](0)
    };
    $m = function(dynamic $x) use ($call1,$caml_get_public_method) {
      return $call1($caml_get_public_method($x, 37651177, 9), $x);
    };
    $n = $Unsafe[1];
    $error_constr = (function(dynamic $t10, dynamic $param) {return $t10->Error;
     })($n, $m);
    
    $call2($Callback[2], $cst_jsError, Vector{0, $Error, darray[]});
    
    $raise_js_error =  (function($exn) {throw $exn;}) ;
    $o = function(dynamic $x) use ($call1,$caml_get_public_method) {
      return $call1($caml_get_public_method($x, -465951225, 10), $x);
    };
    $p = $Unsafe[1];
    $JSON = (function(dynamic $t11, dynamic $param) {return $t11->JSON;})($p, $o);
    $decodeURI = function(dynamic $s) use ($Unsafe,$call1,$caml_get_public_method) {
      $R = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, -994878754, 11), $x);
      };
      $S = $Unsafe[1];
      return (function(dynamic $t12, dynamic $param) {return $t12->decodeURI;})($S, $R)($s);
    };
    $decodeURIComponent = function(dynamic $s) use ($Unsafe,$call1,$caml_get_public_method) {
      $P = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, 751577599, 12), $x);
      };
      $Q = $Unsafe[1];
      return (function(dynamic $t13, dynamic $param) {return $t13->decodeURIComponent;
       })($Q, $P)($s);
    };
    $encodeURI = function(dynamic $s) use ($Unsafe,$call1,$caml_get_public_method) {
      $N = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, 443205366, 13), $x);
      };
      $O = $Unsafe[1];
      return (function(dynamic $t14, dynamic $param) {return $t14->encodeURI;})($O, $N)($s);
    };
    $encodeURIComponent = function(dynamic $s) use ($Unsafe,$call1,$caml_get_public_method) {
      $L = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, -641565977, 14), $x);
      };
      $M = $Unsafe[1];
      return (function(dynamic $t15, dynamic $param) {return $t15->encodeURIComponent;
       })($M, $L)($s);
    };
    $escape = function(dynamic $s) use ($Unsafe,$call1,$caml_get_public_method) {
      $J = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, -623230079, 15), $x);
      };
      $K = $Unsafe[1];
      return (function(dynamic $t16, dynamic $param) {return $t16->escape;})($K, $J)($s);
    };
    $unescape = function(dynamic $s) use ($Unsafe,$call1,$caml_get_public_method) {
      $H = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, -585010534, 16), $x);
      };
      $I = $Unsafe[1];
      return (function(dynamic $t17, dynamic $param) {return $t17->unescape;})($I, $H)($s);
    };
    $isNaN = function(dynamic $i) use ($Unsafe,$call1,$caml_get_public_method) {
      $F = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, -1051592975, 17), $x);
      };
      $G = $Unsafe[1];
      return (int)
      (function(dynamic $t18, dynamic $param) {return $t18->isNaN;})($G, $F)($i);
    };
    $parseInt = function(dynamic $s) use ($Pervasives,$Unsafe,$call1,$caml_get_public_method,$cst_parseInt,$isNaN) {
      $D = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, -697166212, 18), $x);
      };
      $E = $Unsafe[1];
      $s__0 = (function(dynamic $t19, dynamic $param) {return $t19->parseInt;})($E, $D)($s);
      return $isNaN($s__0) ? $call1($Pervasives[2], $cst_parseInt) : ($s__0);
    };
    $parseFloat = function(dynamic $s) use ($Pervasives,$Unsafe,$call1,$caml_get_public_method,$cst_parseFloat,$isNaN) {
      $B = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, 746065001, 19), $x);
      };
      $C = $Unsafe[1];
      $s__0 = (function(dynamic $t20, dynamic $param) {return $t20->parseFloat;
       })($C, $B)($s);
      return $isNaN($s__0) ? $call1($Pervasives[2], $cst_parseFloat) : ($s__0);
    };
    $q = function(dynamic $param) use ($Error,$call1,$caml_get_public_method,$caml_js_to_string) {
      if ($param[1] === $Error) {
        $e = $param[2];
        $A = function(dynamic $x) use ($call1,$caml_get_public_method) {
          return $call1($caml_get_public_method($x, 946786476, 20), $x);
        };
        return Vector{
          0,
          $caml_js_to_string(
            (function(dynamic $t21, dynamic $param) {return $t21->toString();})($e, $A)
          )
        };
      }
      return 0;
    };
    
    $call1($Printexc[8], $q);
    
    $r = function(dynamic $e) use ($array_constructor,$call1,$caml_get_public_method,$caml_js_to_string) {
      if (instance_of($e, $array_constructor)) {return 0;}
      $z = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, 946786476, 21), $x);
      };
      return Vector{
        0,
        $caml_js_to_string(
          (function(dynamic $t22, dynamic $param) {return $t22->toString();})($e, $z)
        )
      };
    };
    
    $call1($Printexc[8], $r);
    
    $string_of_error = function(dynamic $e) use ($call1,$caml_get_public_method,$caml_js_to_string) {
      $y = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, 946786476, 22), $x);
      };
      return $caml_js_to_string(
        (function(dynamic $t23, dynamic $param) {return $t23->toString();})($e, $y)
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
      $v = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, -994170454, 23), $x);
      };
      $w = $caml_js_wrap_callback(
        function(dynamic $key, dynamic $param, dynamic $x) use ($export_js,$obj) {
          return $export_js($key, $obj[$key]);
        }
      );
      return (function(dynamic $t25, dynamic $t24, dynamic $param) {return $t25->forEach($t24);
       })($keys, $w, $v);
    };
    $s = function(dynamic $u) {return $u;};
    $Js_of_ocaml_Js = Vector{
      0,
      $null__0,
      function(dynamic $t) {return $t;},
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
    };
    
    $runtime["caml_register_global"](36, $Js_of_ocaml_Js, "Js_of_ocaml__Js");

  }
}

/*____hashes compiler:hashing-disabled inputs:hashing-disabled bytecode:hashing-disabled*/
