<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class Js_of_ocaml__Intl {
  <<__Override, __Memoize>>
  public static function requireModule() : Vector<dynamic> {
    $joo_global_object = \Rehack\GlobalObject::get() as dynamic;
    
    $runtime = $joo_global_object->jsoo_runtime;
    $call1 = $runtime["caml_call1"];
    $call2 = $runtime["caml_call2"];
    $call3 = $runtime["caml_call3"];
    $caml_get_public_method = $runtime["caml_get_public_method"];
    $string = $runtime["caml_new_string"];
    $cst__3 = $string("");
    $cst__2 = $string("");
    $cst__1 = $string("");
    $cst__0 = $string("");
    $cst = $string("");
    $cst_localeMatcher = $string("localeMatcher");
    $shared = Vector{
      0,
      $string("sensitivity"),
      $string("caseFirst"),
      $string("ignorePunctuation"),
      $string("localeMatcher"),
      $string("usage"),
      $string("numeric")
    } as dynamic;
    $Js_of_ocaml_Js =  Js_of_ocaml__Js::requireModule ();
    $CamlinternalOO =  CamlinternalOO::requireModule ();
    $a_ = Vector{0, $string("_type"), $string("localeMatcher")} as dynamic;
    $b_ = Vector{
      0,
      $string("year"),
      $string("weekday"),
      $string("timeZoneName"),
      $string("timeZone"),
      $string("second"),
      $string("month"),
      $string("minute"),
      $string("localeMatcher"),
      $string("hourCycle"),
      $string("hour12"),
      $string("hour"),
      $string("formatMatcher"),
      $string("era"),
      $string("day")
    } as dynamic;
    $c_ = Vector{
      0,
      $string("useGrouping"),
      $string("style"),
      $string("minimumSignificantDigits"),
      $string("minimumIntegerDigits"),
      $string("minimumFractionDigits"),
      $string("maximumSignificantDigits"),
      $string("maximumFractionDigits"),
      $string("localeMatcher"),
      $string("currencyDisplay"),
      $string("currency")
    } as dynamic;
    $d_ = Vector{0, $string("localeMatcher"), $string("_type")} as dynamic;
    $e_ = Vector{
      0,
      $string("usage"),
      $string("sensitivity"),
      $string("numeric"),
      $string("localeMatcher"),
      $string("ignorePunctuation"),
      $string("caseFirst")
    } as dynamic;
    $f_ = Vector{
      0,
      $string("hour"),
      $string("hour12"),
      $string("year"),
      $string("minute"),
      $string("second"),
      $string("timeZone"),
      $string("hourCycle"),
      $string("day"),
      $string("era"),
      $string("localeMatcher"),
      $string("month"),
      $string("weekday"),
      $string("timeZoneName"),
      $string("formatMatcher")
    } as dynamic;
    $g_ = Vector{0, $string("localeMatcher")} as dynamic;
    $h_ = Vector{
      0,
      $string("minimumIntegerDigits"),
      $string("maximumFractionDigits"),
      $string("minimumFractionDigits"),
      $string("minimumSignificantDigits"),
      $string("useGrouping"),
      $string("style"),
      $string("localeMatcher"),
      $string("currencyDisplay"),
      $string("maximumSignificantDigits"),
      $string("currency")
    } as dynamic;
    $i_ = Vector{0, 0, 0, 0} as dynamic;
    $object_options = (dynamic $param) ==> {
      $bO_ = (dynamic $self, dynamic $localeMatcher) ==> {
        if (! $i_[1]) {
          $bQ_ = $call1($CamlinternalOO[16], $g_);
          $bR_ = $call2($CamlinternalOO[3], $bQ_, $cst);
          $bS_ = $call2($CamlinternalOO[7], $bQ_, $cst_localeMatcher);
          $bT_ = (dynamic $self_1) ==> {
            $env = $self_1[$bR_ + 1];
            return $env[1];
          };
          $call3($CamlinternalOO[10], $bQ_, $bS_, $bT_);
          $bU_ = (dynamic $bV_) ==> {
            $bW_ = $call2($CamlinternalOO[24], 0, $bQ_);
            $bW_[$bR_ + 1] = $bV_;
            return $bW_;
          };
          $call1($CamlinternalOO[17], $bQ_);
          $i_[1] = $bU_;
        }
        return $call1($i_[1], Vector{0, $localeMatcher});
      };
      $bP_ = "best fit";
      return ((dynamic $t0, dynamic $param) ==> {
         return darray["localeMatcher"=>$t0];
       })($bP_, $bO_);
    };
    $j_ = Vector{0, 0, 0, 0} as dynamic;
    $options = (dynamic $param) ==> {
      $bp_ = 
      (dynamic $self, dynamic $localeMatcher, dynamic $usage, dynamic $sensitivity, dynamic $ignorePunctuation, dynamic $numeric, dynamic $caseFirst) ==> {
        if (! $j_[1]) {
          $bw_ = $call1($CamlinternalOO[16], $shared);
          $bx_ = $call2($CamlinternalOO[3], $bw_, $cst__0);
          $by_ = $call2($CamlinternalOO[8], $bw_, $e_);
          $bz_ = $by_[1];
          $bA_ = $by_[2];
          $bB_ = $by_[3];
          $bC_ = $by_[4];
          $bD_ = $by_[5];
          $bE_ = $by_[6];
          $bF_ = (dynamic $self_2) ==> {
            $env = $self_2[$bx_ + 1];
            return $env[1];
          };
          $bG_ = (dynamic $self_2) ==> {
            $env = $self_2[$bx_ + 1];
            return $env[2];
          };
          $bH_ = (dynamic $self_2) ==> {
            $env = $self_2[$bx_ + 1];
            return $env[3];
          };
          $bI_ = (dynamic $self_2) ==> {
            $env = $self_2[$bx_ + 1];
            return $env[4];
          };
          $bJ_ = (dynamic $self_2) ==> {
            $env = $self_2[$bx_ + 1];
            return $env[5];
          };
          $bK_ = Vector{
            0,
            $bC_,
            (dynamic $self_2) ==> {$env = $self_2[$bx_ + 1];return $env[6];},
            $bz_,
            $bJ_,
            $bA_,
            $bI_,
            $bD_,
            $bH_,
            $bB_,
            $bG_,
            $bE_,
            $bF_
          } as dynamic;
          $call2($CamlinternalOO[11], $bw_, $bK_);
          $bL_ = (dynamic $bM_) ==> {
            $bN_ = $call2($CamlinternalOO[24], 0, $bw_);
            $bN_[$bx_ + 1] = $bM_;
            return $bN_;
          };
          $call1($CamlinternalOO[17], $bw_);
          $j_[1] = $bL_;
        }
        return $call1(
          $j_[1],
          Vector{
            0,
            $caseFirst,
            $numeric,
            $ignorePunctuation,
            $sensitivity,
            $usage,
            $localeMatcher
          }
        );
      };
      $bq_ = "false";
      $br_ = $Js_of_ocaml_Js[8];
      $bs_ = $Js_of_ocaml_Js[8];
      $bt_ = "variant";
      $bu_ = "sort";
      $bv_ = "best fit";
      return (
       (dynamic $t1, dynamic $t2, dynamic $t3, dynamic $t4, dynamic $t5, dynamic $t6, dynamic $param) ==> {
         return darray[
          "localeMatcher"=>$t1,
          "usage"=>$t2,
          "sensitivity"=>$t3,
          "ignorePunctuation"=>$t4,
          "numeric"=>$t5,
          "caseFirst"=>$t6];
       })($bv_, $bu_, $bt_, $bs_, $br_, $bq_, $bp_);
    };
    $Collator = Vector{0, $object_options, $options} as dynamic;
    $k_ = Vector{0, 0, 0, 0} as dynamic;
    $options__0 = (dynamic $param) ==> {
      $aD_ = 
      (dynamic $self, dynamic $localeMatcher, dynamic $timeZone, dynamic $hour12, dynamic $hourCycle, dynamic $formatMatcher, dynamic $weekday, dynamic $era, dynamic $year, dynamic $month, dynamic $day, dynamic $hour, dynamic $minute, dynamic $second, dynamic $timeZoneName) ==> {
        if (! $k_[1]) {
          $aS_ = $call1($CamlinternalOO[16], $f_);
          $aT_ = $call2($CamlinternalOO[3], $aS_, $cst__1);
          $aU_ = $call2($CamlinternalOO[8], $aS_, $b_);
          $aV_ = $aU_[1];
          $aW_ = $aU_[2];
          $aX_ = $aU_[3];
          $aY_ = $aU_[4];
          $aZ_ = $aU_[5];
          $a0_ = $aU_[6];
          $a1_ = $aU_[7];
          $a2_ = $aU_[8];
          $a3_ = $aU_[9];
          $a4_ = $aU_[10];
          $a5_ = $aU_[11];
          $a6_ = $aU_[12];
          $a7_ = $aU_[13];
          $a8_ = $aU_[14];
          $a9_ = (dynamic $self_3) ==> {
            $env = $self_3[$aT_ + 1];
            return $env[1];
          };
          $a__ = (dynamic $self_3) ==> {
            $env = $self_3[$aT_ + 1];
            return $env[2];
          };
          $ba_ = (dynamic $self_3) ==> {
            $env = $self_3[$aT_ + 1];
            return $env[3];
          };
          $bb_ = (dynamic $self_3) ==> {
            $env = $self_3[$aT_ + 1];
            return $env[4];
          };
          $bc_ = (dynamic $self_3) ==> {
            $env = $self_3[$aT_ + 1];
            return $env[5];
          };
          $bd_ = (dynamic $self_3) ==> {
            $env = $self_3[$aT_ + 1];
            return $env[6];
          };
          $be_ = (dynamic $self_3) ==> {
            $env = $self_3[$aT_ + 1];
            return $env[7];
          };
          $bf_ = (dynamic $self_3) ==> {
            $env = $self_3[$aT_ + 1];
            return $env[8];
          };
          $bg_ = (dynamic $self_3) ==> {
            $env = $self_3[$aT_ + 1];
            return $env[9];
          };
          $bh_ = (dynamic $self_3) ==> {
            $env = $self_3[$aT_ + 1];
            return $env[10];
          };
          $bi_ = (dynamic $self_3) ==> {
            $env = $self_3[$aT_ + 1];
            return $env[11];
          };
          $bj_ = (dynamic $self_3) ==> {
            $env = $self_3[$aT_ + 1];
            return $env[12];
          };
          $bk_ = (dynamic $self_3) ==> {
            $env = $self_3[$aT_ + 1];
            return $env[13];
          };
          $bl_ = Vector{
            0,
            $a2_,
            (dynamic $self_3) ==> {$env = $self_3[$aT_ + 1];return $env[14];},
            $aY_,
            $bk_,
            $a4_,
            $bj_,
            $a3_,
            $bi_,
            $a6_,
            $bh_,
            $aW_,
            $bg_,
            $a7_,
            $bf_,
            $aV_,
            $be_,
            $a0_,
            $bd_,
            $a8_,
            $bc_,
            $a5_,
            $bb_,
            $a1_,
            $ba_,
            $aZ_,
            $a__,
            $aX_,
            $a9_
          } as dynamic;
          $call2($CamlinternalOO[11], $aS_, $bl_);
          $bm_ = (dynamic $bn_) ==> {
            $bo_ = $call2($CamlinternalOO[24], 0, $aS_);
            $bo_[$aT_ + 1] = $bn_;
            return $bo_;
          };
          $call1($CamlinternalOO[17], $aS_);
          $k_[1] = $bm_;
        }
        return $call1(
          $k_[1],
          Vector{
            0,
            $timeZoneName,
            $second,
            $minute,
            $hour,
            $day,
            $month,
            $year,
            $era,
            $weekday,
            $formatMatcher,
            $hourCycle,
            $hour12,
            $timeZone,
            $localeMatcher
          }
        );
      };
      $aE_ = $Js_of_ocaml_Js[3];
      $aF_ = $Js_of_ocaml_Js[3];
      $aG_ = $Js_of_ocaml_Js[3];
      $aH_ = $Js_of_ocaml_Js[3];
      $aI_ = $Js_of_ocaml_Js[3];
      $aJ_ = $Js_of_ocaml_Js[3];
      $aK_ = $Js_of_ocaml_Js[3];
      $aL_ = $Js_of_ocaml_Js[3];
      $aM_ = $Js_of_ocaml_Js[3];
      $aN_ = "best fit";
      $aO_ = $Js_of_ocaml_Js[3];
      $aP_ = $Js_of_ocaml_Js[3];
      $aQ_ = $Js_of_ocaml_Js[3];
      $aR_ = "best fit";
      return (
       (dynamic $t7, dynamic $t8, dynamic $t9, dynamic $t10, dynamic $t11, dynamic $t12, dynamic $t13, dynamic $t14, dynamic $t15, dynamic $t16, dynamic $t17, dynamic $t18, dynamic $t19, dynamic $t20, dynamic $param) ==> {
         return darray[
          "localeMatcher"=>$t7,
          "timeZone"=>$t8,
          "hour12"=>$t9,
          "hourCycle"=>$t10,
          "formatMatcher"=>$t11,
          "weekday"=>$t12,
          "era"=>$t13,
          "year"=>$t14,
          "month"=>$t15,
          "day"=>$t16,
          "hour"=>$t17,
          "minute"=>$t18,
          "second"=>$t19,
          "timeZoneName"=>$t20];
       })(
        $aR_,
        $aQ_,
        $aP_,
        $aO_,
        $aN_,
        $aM_,
        $aL_,
        $aK_,
        $aJ_,
        $aI_,
        $aH_,
        $aG_,
        $aF_,
        $aE_,
        $aD_
      );
    };
    $DateTimeFormat = Vector{0, $object_options, $options__0} as dynamic;
    $l_ = Vector{0, 0, 0, 0} as dynamic;
    $options__1 = (dynamic $param) ==> {
      $S_ = 
      (dynamic $self, dynamic $localeMatcher, dynamic $style, dynamic $currency, dynamic $currencyDisplay, dynamic $useGrouping, dynamic $minimumIntegerDigits, dynamic $minimumFractionDigits, dynamic $maximumFractionDigits, dynamic $minimumSignificantDigits, dynamic $maximumSignificantDigits) ==> {
        if (! $l_[1]) {
          $ad_ = $call1($CamlinternalOO[16], $h_);
          $ae_ = $call2($CamlinternalOO[3], $ad_, $cst__2);
          $af_ = $call2($CamlinternalOO[8], $ad_, $c_);
          $ag_ = $af_[1];
          $ah_ = $af_[2];
          $ai_ = $af_[3];
          $aj_ = $af_[4];
          $ak_ = $af_[5];
          $al_ = $af_[6];
          $am_ = $af_[7];
          $an_ = $af_[8];
          $ao_ = $af_[9];
          $ap_ = $af_[10];
          $aq_ = (dynamic $self_4) ==> {
            $env = $self_4[$ae_ + 1];
            return $env[1];
          };
          $ar_ = (dynamic $self_4) ==> {
            $env = $self_4[$ae_ + 1];
            return $env[2];
          };
          $as_ = (dynamic $self_4) ==> {
            $env = $self_4[$ae_ + 1];
            return $env[3];
          };
          $at_ = (dynamic $self_4) ==> {
            $env = $self_4[$ae_ + 1];
            return $env[4];
          };
          $au_ = (dynamic $self_4) ==> {
            $env = $self_4[$ae_ + 1];
            return $env[5];
          };
          $av_ = (dynamic $self_4) ==> {
            $env = $self_4[$ae_ + 1];
            return $env[6];
          };
          $aw_ = (dynamic $self_4) ==> {
            $env = $self_4[$ae_ + 1];
            return $env[7];
          };
          $ax_ = (dynamic $self_4) ==> {
            $env = $self_4[$ae_ + 1];
            return $env[8];
          };
          $ay_ = (dynamic $self_4) ==> {
            $env = $self_4[$ae_ + 1];
            return $env[9];
          };
          $az_ = Vector{
            0,
            $an_,
            (dynamic $self_4) ==> {$env = $self_4[$ae_ + 1];return $env[10];},
            $ah_,
            $ay_,
            $ap_,
            $ax_,
            $ao_,
            $aw_,
            $ag_,
            $av_,
            $aj_,
            $au_,
            $ak_,
            $at_,
            $am_,
            $as_,
            $ai_,
            $ar_,
            $al_,
            $aq_
          } as dynamic;
          $call2($CamlinternalOO[11], $ad_, $az_);
          $aA_ = (dynamic $aB_) ==> {
            $aC_ = $call2($CamlinternalOO[24], 0, $ad_);
            $aC_[$ae_ + 1] = $aB_;
            return $aC_;
          };
          $call1($CamlinternalOO[17], $ad_);
          $l_[1] = $aA_;
        }
        return $call1(
          $l_[1],
          Vector{
            0,
            $maximumSignificantDigits,
            $minimumSignificantDigits,
            $maximumFractionDigits,
            $minimumFractionDigits,
            $minimumIntegerDigits,
            $useGrouping,
            $currencyDisplay,
            $currency,
            $style,
            $localeMatcher
          }
        );
      };
      $T_ = $Js_of_ocaml_Js[3];
      $U_ = $Js_of_ocaml_Js[3];
      $V_ = $Js_of_ocaml_Js[3];
      $W_ = $Js_of_ocaml_Js[3];
      $X_ = $Js_of_ocaml_Js[3];
      $Y_ = $Js_of_ocaml_Js[7];
      $Z_ = $Js_of_ocaml_Js[3];
      $aa_ = $Js_of_ocaml_Js[3];
      $ab_ = "decimal";
      $ac_ = "best fit";
      return (
       (dynamic $t21, dynamic $t22, dynamic $t23, dynamic $t24, dynamic $t25, dynamic $t26, dynamic $t27, dynamic $t28, dynamic $t29, dynamic $t30, dynamic $param) ==> {
         return darray[
          "localeMatcher"=>$t21,
          "style"=>$t22,
          "currency"=>$t23,
          "currencyDisplay"=>$t24,
          "useGrouping"=>$t25,
          "minimumIntegerDigits"=>$t26,
          "minimumFractionDigits"=>$t27,
          "maximumFractionDigits"=>$t28,
          "minimumSignificantDigits"=>$t29,
          "maximumSignificantDigits"=>$t30];
       })($ac_, $ab_, $aa_, $Z_, $Y_, $X_, $W_, $V_, $U_, $T_, $S_);
    };
    $NumberFormat = Vector{0, $object_options, $options__1} as dynamic;
    $m_ = Vector{0, 0, 0, 0} as dynamic;
    $options__2 = (dynamic $param) ==> {
      $F_ = (dynamic $self, dynamic $localeMatcher, dynamic $type) ==> {
        if (! $m_[1]) {
          $I_ = $call1($CamlinternalOO[16], $a_);
          $J_ = $call2($CamlinternalOO[3], $I_, $cst__3);
          $K_ = $call2($CamlinternalOO[8], $I_, $d_);
          $L_ = $K_[1];
          $M_ = $K_[2];
          $N_ = (dynamic $self_5) ==> {
            $env = $self_5[$J_ + 1];
            return $env[1];
          };
          $O_ = Vector{
            0,
            $L_,
            (dynamic $self_5) ==> {$env = $self_5[$J_ + 1];return $env[2];},
            $M_,
            $N_
          } as dynamic;
          $call2($CamlinternalOO[11], $I_, $O_);
          $P_ = (dynamic $Q_) ==> {
            $R_ = $call2($CamlinternalOO[24], 0, $I_);
            $R_[$J_ + 1] = $Q_;
            return $R_;
          };
          $call1($CamlinternalOO[17], $I_);
          $m_[1] = $P_;
        }
        return $call1($m_[1], Vector{0, $type, $localeMatcher});
      };
      $G_ = "cardinal";
      $H_ = "best fit";
      return ((dynamic $t31, dynamic $t32, dynamic $param) ==> {
         return darray["localeMatcher"=>$t31,"type"=>$t32];
       })($H_, $G_, $F_);
    };
    $PluralRules = Vector{0, $object_options, $options__2} as dynamic;
    $n_ = (dynamic $x) ==> {
      return $call1($caml_get_public_method($x, -475689828, 300), $x);
    };
    $o_ = $Js_of_ocaml_Js[50][1];
    $intl = ((dynamic $t33, dynamic $param) ==> {return $t33->Intl;})($o_, $n_);
    $p_ = (dynamic $x) ==> {
      return $call1($caml_get_public_method($x, -438302079, 301), $x);
    };
    $q_ = (dynamic $x) ==> {
      return $call1($caml_get_public_method($x, -475689828, 302), $x);
    };
    $r_ = $Js_of_ocaml_Js[50][1];
    $s_ = ((dynamic $t34, dynamic $param) ==> {return $t34->Intl;})($r_, $q_);
    $collator_constr = ((dynamic $t35, dynamic $param) ==> {return $t35->Collator;
     })($s_, $p_);
    $t_ = (dynamic $x) ==> {
      return $call1($caml_get_public_method($x, 568382385, 303), $x);
    };
    $u_ = (dynamic $x) ==> {
      return $call1($caml_get_public_method($x, -475689828, 304), $x);
    };
    $v_ = $Js_of_ocaml_Js[50][1];
    $w_ = ((dynamic $t36, dynamic $param) ==> {return $t36->Intl;})($v_, $u_);
    $dateTimeFormat_constr = ((dynamic $t37, dynamic $param) ==> {
       return $t37->DateTimeFormat;
     })($w_, $t_);
    $x_ = (dynamic $x) ==> {
      return $call1($caml_get_public_method($x, 941696479, 305), $x);
    };
    $y_ = (dynamic $x) ==> {
      return $call1($caml_get_public_method($x, -475689828, 306), $x);
    };
    $z_ = $Js_of_ocaml_Js[50][1];
    $A_ = ((dynamic $t38, dynamic $param) ==> {return $t38->Intl;})($z_, $y_);
    $numberFormat_constr = ((dynamic $t39, dynamic $param) ==> {
       return $t39->NumberFormat;
     })($A_, $x_);
    $B_ = (dynamic $x) ==> {
      return $call1($caml_get_public_method($x, 544366260, 307), $x);
    };
    $C_ = (dynamic $x) ==> {
      return $call1($caml_get_public_method($x, -475689828, 308), $x);
    };
    $D_ = $Js_of_ocaml_Js[50][1];
    $E_ = ((dynamic $t40, dynamic $param) ==> {return $t40->Intl;})($D_, $C_);
    $pluralRules_constr = ((dynamic $t41, dynamic $param) ==> {
       return $t41->PluralRules;
     })($E_, $B_);
    $is_supported = (dynamic $param) ==> {
      return $call1($Js_of_ocaml_Js[6][5], $intl);
    };
    $Js_of_ocaml_Intl = Vector{
      0,
      $Collator,
      $DateTimeFormat,
      $NumberFormat,
      $PluralRules,
      $intl,
      $collator_constr,
      $dateTimeFormat_constr,
      $numberFormat_constr,
      $pluralRules_constr,
      $is_supported
    } as dynamic;
    
     return ($Js_of_ocaml_Intl);

  }
  public static function is_supported(dynamic $param): dynamic {
    return static::callRehackFunction(static::requireModule()[10], varray[$param]);
  }

}
/* Hashing disabled */
