<?hh
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * Js_of_ocaml__Regexp.php
 */

namespace Rehack;

final class Js_of_ocaml__Regexp {
  <<__Memoize>>
  public static function get() {
    $global_object = \Rehack\GlobalObject::get();
    $runtime = \Rehack\Runtime::get();
    /*
     * Soon, these will replace the `global_data->ModuleName`
     * pattern in the load() function.
     */
    $Js_of_ocaml__Js = Js_of_ocaml__Js::get();
    $Pervasives = Pervasives::get();
    $Assert_failure = Assert_failure::get();
    Js_of_ocaml__Regexp::load($global_object);
    $memoized = $runtime->caml_get_global_data()->Js_of_ocaml__Regexp;
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
    $caml_js_to_byte_string = $runtime["caml_js_to_byte_string"];
    $caml_jsbytes_of_string = $runtime["caml_jsbytes_of_string"];
    $string = $runtime["caml_new_string"];
    $global_data = $runtime["caml_get_global_data"]();
    $cst_g = $string("g");
    $cst = $string("[\\][()\\\\|+*.?{}^\\$]");
    $Js_of_ocaml_Js = $global_data["Js_of_ocaml__Js"];
    $Assert_failure = $global_data["Assert_failure"];
    $Pervasives = $global_data["Pervasives"];
    $a = Vector{0, $string("lib/js_of_ocaml/regexp.ml"), 33, 64};
    $regexp = function(dynamic $s) use ($Js_of_ocaml_Js,$caml_jsbytes_of_string) {
      $al = 0;
      $am = "g";
      $an = $caml_jsbytes_of_string($s);
      $ao = $Js_of_ocaml_Js[11];
      return (function(dynamic $t2, dynamic $t0, dynamic $t1, dynamic $param) {return new $t2($t0, $t1);
       })($ao, $an, $am, $al);
    };
    $regexp_case_fold = function(dynamic $s) use ($Js_of_ocaml_Js,$caml_jsbytes_of_string) {
      $ah = 0;
      $ai = "gi";
      $aj = $caml_jsbytes_of_string($s);
      $ak = $Js_of_ocaml_Js[11];
      return (function(dynamic $t5, dynamic $t3, dynamic $t4, dynamic $param) {return new $t5($t3, $t4);
       })($ak, $aj, $ai, $ah);
    };
    $regexp_with_flag = function(dynamic $s, dynamic $f) use ($Js_of_ocaml_Js,$Pervasives,$call2,$caml_jsbytes_of_string,$cst_g) {
      $ae = $call2($Pervasives[16], $cst_g, $f)->toString();
      $ad = 0;
      $af = $caml_jsbytes_of_string($s);
      $ag = $Js_of_ocaml_Js[11];
      return (function(dynamic $t8, dynamic $t6, dynamic $t7, dynamic $param) {return new $t8($t6, $t7);
       })($ag, $af, $ae, $ad);
    };
    $blunt_str_array_get = function(dynamic $a__0, dynamic $i) use ($Assert_failure,$Js_of_ocaml_Js,$a,$call2,$caml_js_to_byte_string,$runtime) {
      $ab = function(dynamic $param) use ($Assert_failure,$a,$runtime) {
        throw $runtime["caml_wrap_thrown_exception"](Vector{0, $Assert_failure, $a}) as \Throwable;
      };
      $ac = $call2($Js_of_ocaml_Js[16], $a__0, $i);
      return $caml_js_to_byte_string($call2($Js_of_ocaml_Js[6][8], $ac, $ab));
    };
    $string_match = function(dynamic $r, dynamic $s, dynamic $i) use ($Js_of_ocaml_Js,$call1,$call2,$caml_get_public_method,$caml_jsbytes_of_string) {
      $V = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, 180472028, 216), $x);
      };
      ((function(dynamic $t12, dynamic $t11, dynamic $param) {$t12->lastIndex = $t11;return 0;
        })($r, $i, $V));
      $W = $Js_of_ocaml_Js[21];
      $X = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, -1021447279, 217), $x);
      };
      $Y = $caml_jsbytes_of_string($s);
      $Z = (function(dynamic $t10, dynamic $t9, dynamic $param) {return $t10->exec($t9);
       })($r, $Y, $X);
      $aa = $call2($Js_of_ocaml_Js[5][3], $Z, $W);
      return $call1($Js_of_ocaml_Js[5][10], $aa);
    };
    $search = function(dynamic $r, dynamic $s, dynamic $i) use ($Js_of_ocaml_Js,$call1,$call2,$caml_get_public_method,$caml_jsbytes_of_string) {
      $O = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, 180472028, 218), $x);
      };
      ((function(dynamic $t17, dynamic $t16, dynamic $param) {$t17->lastIndex = $t16;return 0;
        })($r, $i, $O));
      $P = function(dynamic $res_pre) use ($Js_of_ocaml_Js,$call1,$caml_get_public_method) {
        $res = $call1($Js_of_ocaml_Js[21], $res_pre);
        $U = function(dynamic $x) use ($call1,$caml_get_public_method) {
          return $call1($caml_get_public_method($x, 1041537810, 219), $x);
        };
        return Vector{
          0,
          (function(dynamic $t15, dynamic $param) {return $t15->index;})($res, $U),
          $res
        };
      };
      $Q = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, -1021447279, 220), $x);
      };
      $R = $caml_jsbytes_of_string($s);
      $S = (function(dynamic $t14, dynamic $t13, dynamic $param) {return $t14->exec($t13);
       })($r, $R, $Q);
      $T = $call2($Js_of_ocaml_Js[5][3], $S, $P);
      return $call1($Js_of_ocaml_Js[5][10], $T);
    };
    $matched_string = function(dynamic $r) use ($blunt_str_array_get) {
      return $blunt_str_array_get($r, 0);
    };
    $matched_group = function(dynamic $r, dynamic $i) use ($Js_of_ocaml_Js,$call1,$call2,$caml_js_to_byte_string) {
      $K = function(dynamic $N) use ($caml_js_to_byte_string) {
        return $caml_js_to_byte_string($N);
      };
      $L = $call2($Js_of_ocaml_Js[16], $r, $i);
      $M = $call2($Js_of_ocaml_Js[6][3], $L, $K);
      return $call1($Js_of_ocaml_Js[6][10], $M);
    };
    $b = 0;
    $c = "g";
    $d = "[\\$]";
    $e = $Js_of_ocaml_Js[11];
    $quote_repl_re = (function
     (dynamic $t20, dynamic $t18, dynamic $t19, dynamic $param) {return new $t20($t18, $t19);
     })($e, $d, $c, $b);
    $quote_repl = function(dynamic $s) use ($call1,$caml_get_public_method,$caml_jsbytes_of_string,$quote_repl_re) {
      $H = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, 724060212, 221), $x);
      };
      $I = "\\$\\$\\$\\$";
      $J = $caml_jsbytes_of_string($s);
      return (function
       (dynamic $t23, dynamic $t21, dynamic $t22, dynamic $param) {return $t23->replace($t21, $t22);
       })($J, $quote_repl_re, $I, $H);
    };
    $global_replace = function(dynamic $r, dynamic $s, dynamic $s_by) use ($call1,$caml_get_public_method,$caml_js_to_byte_string,$caml_jsbytes_of_string,$quote_repl) {
      $C = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, 180472028, 222), $x);
      };
      $D = 0;
      ((function(dynamic $t28, dynamic $t27, dynamic $param) {$t28->lastIndex = $t27;return 0;
        })($r, $D, $C));
      $E = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, 724060212, 223), $x);
      };
      $F = $quote_repl($s_by);
      $G = $caml_jsbytes_of_string($s);
      return $caml_js_to_byte_string(
        (function(dynamic $t26, dynamic $t24, dynamic $t25, dynamic $param) {return $t26->replace($t24, $t25);
         })($G, $r, $F, $E)
      );
    };
    $replace_first = function(dynamic $r, dynamic $s, dynamic $s_by) use ($Js_of_ocaml_Js,$call1,$caml_get_public_method,$caml_js_to_byte_string,$caml_jsbytes_of_string,$quote_repl) {
      $t = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, -1042090782, 224), $x);
      };
      $match = (int)
      (function(dynamic $t36, dynamic $param) {return $t36->ignoreCase;})($r, $t);
      $u = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, 504484589, 225), $x);
      };
      $match__0 = (int)
      (function(dynamic $t37, dynamic $param) {return $t37->multiline;})($r, $u);
      $flags = 0 === $match
        ? 0 === $match__0 ? "" : ("m")
        : (0 === $match__0 ? "i" : ("mi"));
      $v = 0;
      $w = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, 842117339, 226), $x);
      };
      $x = (function(dynamic $t32, dynamic $param) {return $t32->source;})($r, $w);
      $y = $Js_of_ocaml_Js[11];
      $r__0 = (function
       (dynamic $t35, dynamic $t33, dynamic $t34, dynamic $param) {return new $t35($t33, $t34);
       })($y, $x, $flags, $v);
      $z = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, 724060212, 227), $x);
      };
      $A = $quote_repl($s_by);
      $B = $caml_jsbytes_of_string($s);
      return $caml_js_to_byte_string(
        (function(dynamic $t31, dynamic $t29, dynamic $t30, dynamic $param) {return $t31->replace($t29, $t30);
         })($B, $r__0, $A, $z)
      );
    };
    $list_of_js_array = function(dynamic $a) use ($blunt_str_array_get,$call1,$caml_get_public_method) {
      $aux = function(dynamic $accu, dynamic $idx) use ($a,$blunt_str_array_get) {
        $accu__0 = $accu;
        $idx__0 = $idx;
        for (;;) {
          if (0 <= $idx__0) {
            $idx__1 = (int) ($idx__0 + -1);
            $accu__1 = Vector{0, $blunt_str_array_get($a, $idx__0), $accu__0};
            $accu__0 = $accu__1;
            $idx__0 = $idx__1;
            continue;
          }
          return $accu__0;
        }
      };
      $s = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, 520590566, 228), $x);
      };
      return $aux(
        0,
        (int)
        ((function(dynamic $t38, dynamic $param) {return $t38->length;})($a, $s) + -1)
      );
    };
    $split = function(dynamic $r, dynamic $s) use ($Js_of_ocaml_Js,$call1,$caml_get_public_method,$caml_jsbytes_of_string,$list_of_js_array) {
      $n = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, 180472028, 229), $x);
      };
      $o = 0;
      ((function(dynamic $t42, dynamic $t41, dynamic $param) {$t42->lastIndex = $t41;return 0;
        })($r, $o, $n));
      $p = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, -394261074, 230), $x);
      };
      $q = $caml_jsbytes_of_string($s);
      $r = (function(dynamic $t40, dynamic $t39, dynamic $param) {return $t40->split($t39);
       })($q, $r, $p);
      return $list_of_js_array($call1($Js_of_ocaml_Js[20], $r));
    };
    $bounded_split = function(dynamic $r, dynamic $s, dynamic $i) use ($Js_of_ocaml_Js,$call1,$caml_get_public_method,$caml_jsbytes_of_string,$list_of_js_array) {
      $i = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, 180472028, 231), $x);
      };
      $j = 0;
      ((function(dynamic $t47, dynamic $t46, dynamic $param) {$t47->lastIndex = $t46;return 0;
        })($r, $j, $i));
      $k = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, -203798452, 232), $x);
      };
      $l = $caml_jsbytes_of_string($s);
      $m = (function(dynamic $t45, dynamic $t43, dynamic $t44, dynamic $param) {return $t45->split($t43, $t44);
       })($l, $r, $i, $k);
      return $list_of_js_array($call1($Js_of_ocaml_Js[20], $m));
    };
    $quote_re = $regexp($cst);
    $quote = function(dynamic $s) use ($call1,$caml_get_public_method,$caml_js_to_byte_string,$caml_jsbytes_of_string,$quote_re) {
      $f = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, 724060212, 233), $x);
      };
      $g = "\\\\$&";
      $h = $caml_jsbytes_of_string($s);
      return $caml_js_to_byte_string(
        (function(dynamic $t50, dynamic $t48, dynamic $t49, dynamic $param) {return $t50->replace($t48, $t49);
         })($h, $quote_re, $g, $f)
      );
    };
    $regexp_string = function(dynamic $s) use ($quote,$regexp) {
      return $regexp($quote($s));
    };
    $regexp_string_case_fold = function(dynamic $s) use ($quote,$regexp_case_fold) {
      return $regexp_case_fold($quote($s));
    };
    $Js_of_ocaml_Regexp = Vector{
      0,
      $regexp,
      $regexp_case_fold,
      $regexp_with_flag,
      $quote,
      $regexp_string,
      $regexp_string_case_fold,
      $string_match,
      $search,
      $search,
      $matched_string,
      $matched_group,
      $global_replace,
      $replace_first,
      $split,
      $bounded_split
    };
    
    $runtime["caml_register_global"](
      34,
      $Js_of_ocaml_Regexp,
      "Js_of_ocaml__Regexp"
    );

  }
}

