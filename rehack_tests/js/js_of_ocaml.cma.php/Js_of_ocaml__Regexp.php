<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class Js_of_ocaml__Regexp {
  <<__Override, __Memoize>>
  public static function get() : Vector<dynamic> {
    $joo_global_object = \Rehack\GlobalObject::get() as dynamic;
    
    $runtime = $joo_global_object->jsoo_runtime;
    $call1 = $runtime["caml_call1"];
    $call2 = $runtime["caml_call2"];
    $caml_get_public_method = $runtime["caml_get_public_method"];
    $caml_js_to_byte_string = $runtime["caml_js_to_byte_string"];
    $caml_jsbytes_of_string = $runtime["caml_jsbytes_of_string"];
    $string = $runtime["caml_new_string"];
    $caml_wrap_thrown_exception = $runtime["caml_wrap_thrown_exception"];
    $cst_g = $string("g");
    $cst = $string("[\\][()\\\\|+*.?{}^\\$]");
    $Js_of_ocaml_Js =  Js_of_ocaml__Js::get ();
    $Assert_failure =  Assert_failure::get ();
    $Pervasives =  Pervasives::get ();
    $a_ = Vector{0, $string("lib/js_of_ocaml/regexp.ml"), 33, 64};
    $regexp = (dynamic $s) ==> {
      $al_ = 0;
      $am_ = "g";
      $an_ = $caml_jsbytes_of_string($s);
      $ao_ = $Js_of_ocaml_Js[11];
      return ((dynamic $t2, dynamic $t0, dynamic $t1, dynamic $param) ==> {return new $t2($t0, $t1);
       })($ao_, $an_, $am_, $al_);
    };
    $regexp_case_fold = (dynamic $s) ==> {
      $ah_ = 0;
      $ai_ = "gi";
      $aj_ = $caml_jsbytes_of_string($s);
      $ak_ = $Js_of_ocaml_Js[11];
      return ((dynamic $t5, dynamic $t3, dynamic $t4, dynamic $param) ==> {return new $t5($t3, $t4);
       })($ak_, $aj_, $ai_, $ah_);
    };
    $regexp_with_flag = (dynamic $s, dynamic $f) ==> {
      $ae_ = $call2($Pervasives[16], $cst_g, $f)->toString();
      $ad_ = 0;
      $af_ = $caml_jsbytes_of_string($s);
      $ag_ = $Js_of_ocaml_Js[11];
      return ((dynamic $t8, dynamic $t6, dynamic $t7, dynamic $param) ==> {return new $t8($t6, $t7);
       })($ag_, $af_, $ae_, $ad_);
    };
    $blunt_str_array_get = (dynamic $a, dynamic $i) ==> {
      $ab_ = (dynamic $param) ==> {
        throw $caml_wrap_thrown_exception(Vector{0, $Assert_failure, $a_}) as \Throwable;
      };
      $ac_ = $call2($Js_of_ocaml_Js[16], $a, $i);
      return $caml_js_to_byte_string($call2($Js_of_ocaml_Js[6][8], $ac_, $ab_)
      );
    };
    $string_match = (dynamic $r, dynamic $s, dynamic $i) ==> {
      $V_ = (dynamic $x) ==> {
        return $call1($caml_get_public_method($x, 180472028, 216), $x);
      };
      (((dynamic $t12, dynamic $t11, dynamic $param) ==> {$t12->lastIndex = $t11;return 0;
        })($r, $i, $V_));
      $W_ = $Js_of_ocaml_Js[21];
      $X_ = (dynamic $x) ==> {
        return $call1($caml_get_public_method($x, -1021447279, 217), $x);
      };
      $Y_ = $caml_jsbytes_of_string($s);
      $Z_ = ((dynamic $t10, dynamic $t9, dynamic $param) ==> {return $t10->exec($t9);
       })($r, $Y_, $X_);
      $aa_ = $call2($Js_of_ocaml_Js[5][3], $Z_, $W_);
      return $call1($Js_of_ocaml_Js[5][10], $aa_);
    };
    $search = (dynamic $r, dynamic $s, dynamic $i) ==> {
      $O_ = (dynamic $x) ==> {
        return $call1($caml_get_public_method($x, 180472028, 218), $x);
      };
      (((dynamic $t17, dynamic $t16, dynamic $param) ==> {$t17->lastIndex = $t16;return 0;
        })($r, $i, $O_));
      $P_ = (dynamic $res_pre) ==> {
        $res = $call1($Js_of_ocaml_Js[21], $res_pre);
        $U_ = (dynamic $x) ==> {
          return $call1($caml_get_public_method($x, 1041537810, 219), $x);
        };
        return Vector{
          0,
          ((dynamic $t15, dynamic $param) ==> {return $t15->index;})($res, $U_),
          $res
        };
      };
      $Q_ = (dynamic $x) ==> {
        return $call1($caml_get_public_method($x, -1021447279, 220), $x);
      };
      $R_ = $caml_jsbytes_of_string($s);
      $S_ = ((dynamic $t14, dynamic $t13, dynamic $param) ==> {return $t14->exec($t13);
       })($r, $R_, $Q_);
      $T_ = $call2($Js_of_ocaml_Js[5][3], $S_, $P_);
      return $call1($Js_of_ocaml_Js[5][10], $T_);
    };
    $matched_string = (dynamic $r) ==> {return $blunt_str_array_get($r, 0);};
    $matched_group = (dynamic $r, dynamic $i) ==> {
      $K_ = (dynamic $N_) ==> {return $caml_js_to_byte_string($N_);};
      $L_ = $call2($Js_of_ocaml_Js[16], $r, $i);
      $M_ = $call2($Js_of_ocaml_Js[6][3], $L_, $K_);
      return $call1($Js_of_ocaml_Js[6][10], $M_);
    };
    $b_ = 0;
    $c_ = "g";
    $d_ = "[\\$]";
    $e_ = $Js_of_ocaml_Js[11];
    $quote_repl_re = (
     (dynamic $t20, dynamic $t18, dynamic $t19, dynamic $param) ==> {return new $t20($t18, $t19);
     })($e_, $d_, $c_, $b_);
    $quote_repl = (dynamic $s) ==> {
      $H_ = (dynamic $x) ==> {
        return $call1($caml_get_public_method($x, 724060212, 221), $x);
      };
      $I_ = "\\$\\$\\$\\$";
      $J_ = $caml_jsbytes_of_string($s);
      return ((dynamic $t23, dynamic $t21, dynamic $t22, dynamic $param) ==> {return $t23->replace($t21, $t22);
       })($J_, $quote_repl_re, $I_, $H_);
    };
    $global_replace = (dynamic $r, dynamic $s, dynamic $s_by) ==> {
      $C_ = (dynamic $x) ==> {
        return $call1($caml_get_public_method($x, 180472028, 222), $x);
      };
      $D_ = 0;
      (((dynamic $t28, dynamic $t27, dynamic $param) ==> {$t28->lastIndex = $t27;return 0;
        })($r, $D_, $C_));
      $E_ = (dynamic $x) ==> {
        return $call1($caml_get_public_method($x, 724060212, 223), $x);
      };
      $F_ = $quote_repl($s_by);
      $G_ = $caml_jsbytes_of_string($s);
      return $caml_js_to_byte_string(
        ((dynamic $t26, dynamic $t24, dynamic $t25, dynamic $param) ==> {return $t26->replace($t24, $t25);
         })($G_, $r, $F_, $E_)
      );
    };
    $replace_first = (dynamic $r, dynamic $s, dynamic $s_by) ==> {
      $t_ = (dynamic $x) ==> {
        return $call1($caml_get_public_method($x, -1042090782, 224), $x);
      };
      $match = (int)
      ((dynamic $t36, dynamic $param) ==> {return $t36->ignoreCase;})($r, $t_);
      $u_ = (dynamic $x) ==> {
        return $call1($caml_get_public_method($x, 504484589, 225), $x);
      };
      $match__0 = (int)
      ((dynamic $t37, dynamic $param) ==> {return $t37->multiline;})($r, $u_);
      $flags = 0 === $match
        ? 0 === $match__0 ? "" : ("m")
        : (0 === $match__0 ? "i" : ("mi"));
      $v_ = 0;
      $w_ = (dynamic $x) ==> {
        return $call1($caml_get_public_method($x, 842117339, 226), $x);
      };
      $x_ = ((dynamic $t32, dynamic $param) ==> {return $t32->source;})($r, $w_);
      $y_ = $Js_of_ocaml_Js[11];
      $r__0 = ((dynamic $t35, dynamic $t33, dynamic $t34, dynamic $param) ==> {return new $t35($t33, $t34);
       })($y_, $x_, $flags, $v_);
      $z_ = (dynamic $x) ==> {
        return $call1($caml_get_public_method($x, 724060212, 227), $x);
      };
      $A_ = $quote_repl($s_by);
      $B_ = $caml_jsbytes_of_string($s);
      return $caml_js_to_byte_string(
        ((dynamic $t31, dynamic $t29, dynamic $t30, dynamic $param) ==> {return $t31->replace($t29, $t30);
         })($B_, $r__0, $A_, $z_)
      );
    };
    $list_of_js_array = (dynamic $a) ==> {
      $aux = (dynamic $accu, dynamic $idx) ==> {
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
      $s_ = (dynamic $x) ==> {
        return $call1($caml_get_public_method($x, 520590566, 228), $x);
      };
      return $aux(
        0,
        (int)
        (((dynamic $t38, dynamic $param) ==> {return $t38->length;})($a, $s_) + -1)
      );
    };
    $split = (dynamic $r, dynamic $s) ==> {
      $n_ = (dynamic $x) ==> {
        return $call1($caml_get_public_method($x, 180472028, 229), $x);
      };
      $o_ = 0;
      (((dynamic $t42, dynamic $t41, dynamic $param) ==> {$t42->lastIndex = $t41;return 0;
        })($r, $o_, $n_));
      $p_ = (dynamic $x) ==> {
        return $call1($caml_get_public_method($x, -394261074, 230), $x);
      };
      $q_ = $caml_jsbytes_of_string($s);
      $r_ = ((dynamic $t40, dynamic $t39, dynamic $param) ==> {return $t40->split($t39);
       })($q_, $r, $p_);
      return $list_of_js_array($call1($Js_of_ocaml_Js[20], $r_));
    };
    $bounded_split = (dynamic $r, dynamic $s, dynamic $i) ==> {
      $i_ = (dynamic $x) ==> {
        return $call1($caml_get_public_method($x, 180472028, 231), $x);
      };
      $j_ = 0;
      (((dynamic $t47, dynamic $t46, dynamic $param) ==> {$t47->lastIndex = $t46;return 0;
        })($r, $j_, $i_));
      $k_ = (dynamic $x) ==> {
        return $call1($caml_get_public_method($x, -203798452, 232), $x);
      };
      $l_ = $caml_jsbytes_of_string($s);
      $m_ = ((dynamic $t45, dynamic $t43, dynamic $t44, dynamic $param) ==> {return $t45->split($t43, $t44);
       })($l_, $r, $i, $k_);
      return $list_of_js_array($call1($Js_of_ocaml_Js[20], $m_));
    };
    $quote_re = $regexp($cst);
    $quote = (dynamic $s) ==> {
      $f_ = (dynamic $x) ==> {
        return $call1($caml_get_public_method($x, 724060212, 233), $x);
      };
      $g_ = "\\\\$&";
      $h_ = $caml_jsbytes_of_string($s);
      return $caml_js_to_byte_string(
        ((dynamic $t50, dynamic $t48, dynamic $t49, dynamic $param) ==> {return $t50->replace($t48, $t49);
         })($h_, $quote_re, $g_, $f_)
      );
    };
    $regexp_string = (dynamic $s) ==> {return $regexp($quote($s));};
    $regexp_string_case_fold = (dynamic $s) ==> {
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
    
     return ($Js_of_ocaml_Regexp);

  }
  public static function regexp(dynamic $s): dynamic {
    return static::get()[1]($s);
  }
  public static function regexp_case_fold(dynamic $s): dynamic {
    return static::get()[2]($s);
  }
  public static function regexp_with_flag(dynamic $s, dynamic $f): dynamic {
    return static::get()[3]($s, $f);
  }
  public static function quote(dynamic $s): dynamic {
    return static::get()[4]($s);
  }
  public static function regexp_string(dynamic $s): dynamic {
    return static::get()[5]($s);
  }
  public static function regexp_string_case_fold(dynamic $s): dynamic {
    return static::get()[6]($s);
  }
  public static function string_match(dynamic $r, dynamic $s, dynamic $i): dynamic {
    return static::get()[7]($r, $s, $i);
  }
  public static function search(dynamic $r, dynamic $s, dynamic $i): dynamic {
    return static::get()[8]($r, $s, $i);
  }
  public static function search(dynamic $r, dynamic $s, dynamic $i): dynamic {
    return static::get()[9]($r, $s, $i);
  }
  public static function matched_string(dynamic $r): dynamic {
    return static::get()[10]($r);
  }
  public static function matched_group(dynamic $r, dynamic $i): dynamic {
    return static::get()[11]($r, $i);
  }
  public static function global_replace(dynamic $r, dynamic $s, dynamic $s_by): dynamic {
    return static::get()[12]($r, $s, $s_by);
  }
  public static function replace_first(dynamic $r, dynamic $s, dynamic $s_by): dynamic {
    return static::get()[13]($r, $s, $s_by);
  }
  public static function split(dynamic $r, dynamic $s): dynamic {
    return static::get()[14]($r, $s);
  }
  public static function bounded_split(dynamic $r, dynamic $s, dynamic $i): dynamic {
    return static::get()[15]($r, $s, $i);
  }

}
/* Hashing disabled */
