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
    $caml_arity_test = $runtime["caml_arity_test"];
    $caml_get_public_method = $runtime["caml_get_public_method"];
    $caml_js_to_byte_string = $runtime["caml_js_to_byte_string"];
    $caml_jsbytes_of_string = $runtime["caml_jsbytes_of_string"];
    $caml_new_string = $runtime["caml_new_string"];
    $caml_call1 = function($f, $a0) use ($caml_arity_test,$runtime) {
      return $caml_arity_test($f) === 1
        ? $f($a0)
        : ($runtime["caml_call_gen"]($f, varray[$a0]));
    };
    $caml_call2 = function($f, $a0, $a1) use ($caml_arity_test,$runtime) {
      return $caml_arity_test($f) === 2
        ? $f($a0, $a1)
        : ($runtime["caml_call_gen"]($f, varray[$a0,$a1]));
    };
    $global_data = $runtime["caml_get_global_data"]();
    $cst_g = $caml_new_string("g");
    $cst = $caml_new_string("[\\][()\\\\|+*.?{}^\\$]");
    $Js_of_ocaml_Js = $global_data["Js_of_ocaml__Js"];
    $Assert_failure = $global_data["Assert_failure"];
    $Pervasives = $global_data["Pervasives"];
    $am = Vector{0, $caml_new_string("lib/js_of_ocaml/regexp.ml"), 33, 64};
    $regexp = function($s) use ($Js_of_ocaml_Js,$caml_jsbytes_of_string) {
      $bm = 0;
      $bn = "g";
      $bo = $caml_jsbytes_of_string($s);
      $bp = $Js_of_ocaml_Js[11];
      return (function($t2, $t0, $t1, $param) {return new $t2($t0, $t1);})($bp, $bo, $bn, $bm);
    };
    $regexp_case_fold = function($s) use ($Js_of_ocaml_Js,$caml_jsbytes_of_string) {
      $bi = 0;
      $bj = "gi";
      $bk = $caml_jsbytes_of_string($s);
      $bl = $Js_of_ocaml_Js[11];
      return (function($t5, $t3, $t4, $param) {return new $t5($t3, $t4);})($bl, $bk, $bj, $bi);
    };
    $regexp_with_flag = function($s, $f) use ($Js_of_ocaml_Js,$Pervasives,$caml_call2,$caml_jsbytes_of_string,$cst_g) {
      $bf = $caml_call2($Pervasives[16], $cst_g, $f)->toString();
      $be = 0;
      $bg = $caml_jsbytes_of_string($s);
      $bh = $Js_of_ocaml_Js[11];
      return (function($t8, $t6, $t7, $param) {return new $t8($t6, $t7);})($bh, $bg, $bf, $be);
    };
    $blunt_str_array_get = function($a, $i) use ($Assert_failure,$Js_of_ocaml_Js,$am,$caml_call2,$caml_js_to_byte_string,$runtime) {
      $bc = function($param) use ($Assert_failure,$am,$runtime) {
        throw $runtime["caml_wrap_thrown_exception"](Vector{0, $Assert_failure, $am}) as \Throwable;
      };
      $bd = $caml_call2($Js_of_ocaml_Js[16], $a, $i);
      return $caml_js_to_byte_string(
        $caml_call2($Js_of_ocaml_Js[6][8], $bd, $bc)
      );
    };
    $string_match = function($r, $s, $i) use ($Js_of_ocaml_Js,$caml_call1,$caml_call2,$caml_get_public_method,$caml_jsbytes_of_string) {
      $a7 = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, 180472028, 24), $x);
      };
      ((function($t12, $t11, $param) {return $t12->lastIndex = $t11;})($r, $i, $a7));
      $a8 = $Js_of_ocaml_Js[21];
      $a9 = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, -1021447279, 25), $x);
      };
      $a_ = $caml_jsbytes_of_string($s);
      $ba = (function($t10, $t9, $param) {return $t10->exec($t9);})($r, $a_, $a9);
      $bb = $caml_call2($Js_of_ocaml_Js[5][3], $ba, $a8);
      return $caml_call1($Js_of_ocaml_Js[5][10], $bb);
    };
    $search = function($r, $s, $i) use ($Js_of_ocaml_Js,$caml_call1,$caml_call2,$caml_get_public_method,$caml_jsbytes_of_string) {
      $a0 = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, 180472028, 26), $x);
      };
      ((function($t17, $t16, $param) {return $t17->lastIndex = $t16;})($r, $i, $a0));
      $a1 = function($res_pre) use ($Js_of_ocaml_Js,$caml_call1,$caml_get_public_method) {
        $res = $caml_call1($Js_of_ocaml_Js[21], $res_pre);
        $a6 = function($x) use ($caml_call1,$caml_get_public_method) {
          return $caml_call1($caml_get_public_method($x, 1041537810, 27), $x);
        };
        return Vector{
          0,
          (function($t15, $param) {return $t15->index;})($res, $a6),
          $res
        };
      };
      $a2 = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, -1021447279, 28), $x);
      };
      $a3 = $caml_jsbytes_of_string($s);
      $a4 = (function($t14, $t13, $param) {return $t14->exec($t13);})($r, $a3, $a2);
      $a5 = $caml_call2($Js_of_ocaml_Js[5][3], $a4, $a1);
      return $caml_call1($Js_of_ocaml_Js[5][10], $a5);
    };
    $matched_string = function($r) use ($blunt_str_array_get) {
      return $blunt_str_array_get($r, 0);
    };
    $matched_group = function($r, $i) use ($Js_of_ocaml_Js,$caml_call1,$caml_call2,$caml_js_to_byte_string) {
      $aW = function($aZ) use ($caml_js_to_byte_string) {
        return $caml_js_to_byte_string($aZ);
      };
      $aX = $caml_call2($Js_of_ocaml_Js[16], $r, $i);
      $aY = $caml_call2($Js_of_ocaml_Js[6][3], $aX, $aW);
      return $caml_call1($Js_of_ocaml_Js[6][10], $aY);
    };
    $an = 0;
    $ao = "g";
    $ap = "[\\$]";
    $aq = $Js_of_ocaml_Js[11];
    $quote_repl_re = (function($t20, $t18, $t19, $param) {return new $t20($t18, $t19);
     })($aq, $ap, $ao, $an);
    $quote_repl = function($s) use ($caml_call1,$caml_get_public_method,$caml_jsbytes_of_string,$quote_repl_re) {
      $aT = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, 724060212, 29), $x);
      };
      $aU = "\\$\\$\\$\\$";
      $aV = $caml_jsbytes_of_string($s);
      return (function($t23, $t21, $t22, $param) {
         return $t23->replace($t21, $t22);
       })($aV, $quote_repl_re, $aU, $aT);
    };
    $global_replace = function($r, $s, $s_by) use ($caml_call1,$caml_get_public_method,$caml_js_to_byte_string,$caml_jsbytes_of_string,$quote_repl) {
      $aO = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, 180472028, 30), $x);
      };
      $aP = 0;
      ((function($t28, $t27, $param) {return $t28->lastIndex = $t27;})($r, $aP, $aO));
      $aQ = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, 724060212, 31), $x);
      };
      $aR = $quote_repl($s_by);
      $aS = $caml_jsbytes_of_string($s);
      return $caml_js_to_byte_string(
        (function($t26, $t24, $t25, $param) {
           return $t26->replace($t24, $t25);
         })($aS, $r, $aR, $aQ)
      );
    };
    $replace_first = function($r, $s, $s_by) use ($Js_of_ocaml_Js,$caml_call1,$caml_get_public_method,$caml_js_to_byte_string,$caml_jsbytes_of_string,$quote_repl) {
      $aF = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, -1042090782, 32), $x);
      };
      $match = (int)
      (function($t36, $param) {return $t36->ignoreCase;})($r, $aF);
      $aG = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, 504484589, 33), $x);
      };
      $match__0 = (int)
      (function($t37, $param) {return $t37->multiline;})($r, $aG);
      $flags = 0 === $match
        ? 0 === $match__0 ? "" : ("m")
        : (0 === $match__0 ? "i" : ("mi"));
      $aH = 0;
      $aI = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, 842117339, 34), $x);
      };
      $aJ = (function($t32, $param) {return $t32->source;})($r, $aI);
      $aK = $Js_of_ocaml_Js[11];
      $r__0 = (function($t35, $t33, $t34, $param) {return new $t35($t33, $t34);
       })($aK, $aJ, $flags, $aH);
      $aL = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, 724060212, 35), $x);
      };
      $aM = $quote_repl($s_by);
      $aN = $caml_jsbytes_of_string($s);
      return $caml_js_to_byte_string(
        (function($t31, $t29, $t30, $param) {
           return $t31->replace($t29, $t30);
         })($aN, $r__0, $aM, $aL)
      );
    };
    $list_of_js_array = function($a) use ($blunt_str_array_get,$caml_call1,$caml_get_public_method) {
      $aux = function($accu, $idx) use ($a,$blunt_str_array_get) {
        $accu__0 = $accu;
        $idx__0 = $idx;
        $continue_counter = null;
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
      $aE = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, 520590566, 36), $x);
      };
      return $aux(
        0,
        (int)
        ((function($t38, $param) {return $t38->length;})($a, $aE) + -1)
      );
    };
    $split = function($r, $s) use ($Js_of_ocaml_Js,$caml_call1,$caml_get_public_method,$caml_jsbytes_of_string,$list_of_js_array) {
      $az = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, 180472028, 37), $x);
      };
      $aA = 0;
      ((function($t42, $t41, $param) {return $t42->lastIndex = $t41;})($r, $aA, $az));
      $aB = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, -394261074, 38), $x);
      };
      $aC = $caml_jsbytes_of_string($s);
      $aD = (function($t40, $t39, $param) {return $t40->split($t39);})($aC, $r, $aB);
      return $list_of_js_array($caml_call1($Js_of_ocaml_Js[20], $aD));
    };
    $bounded_split = function($r, $s, $i) use ($Js_of_ocaml_Js,$caml_call1,$caml_get_public_method,$caml_jsbytes_of_string,$list_of_js_array) {
      $au = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, 180472028, 39), $x);
      };
      $av = 0;
      ((function($t47, $t46, $param) {return $t47->lastIndex = $t46;})($r, $av, $au));
      $aw = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, -203798452, 40), $x);
      };
      $ax = $caml_jsbytes_of_string($s);
      $ay = (function($t45, $t43, $t44, $param) {return $t45->split($t43, $t44);
       })($ax, $r, $i, $aw);
      return $list_of_js_array($caml_call1($Js_of_ocaml_Js[20], $ay));
    };
    $quote_re = $regexp($cst);
    $quote = function($s) use ($caml_call1,$caml_get_public_method,$caml_js_to_byte_string,$caml_jsbytes_of_string,$quote_re) {
      $ar = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, 724060212, 41), $x);
      };
      $as = "\\\\$&";
      $at = $caml_jsbytes_of_string($s);
      return $caml_js_to_byte_string(
        (function($t50, $t48, $t49, $param) {
           return $t50->replace($t48, $t49);
         })($at, $quote_re, $as, $ar)
      );
    };
    $regexp_string = function($s) use ($quote,$regexp) {
      return $regexp($quote($s));
    };
    $regexp_string_case_fold = function($s) use ($quote,$regexp_case_fold) {
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