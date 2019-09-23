<?hh
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * Js_of_ocaml__Intl.php
 */

namespace Rehack;

final class Js_of_ocaml__Intl {
  <<__Memoize>>
  public static function get() {
    $global_object = \Rehack\GlobalObject::get();
    $runtime = \Rehack\Runtime::get();
    /*
     * Soon, these will replace the `global_data->ModuleName`
     * pattern in the load() function.
     */
    $CamlinternalOO = CamlinternalOO::get();
    $Js_of_ocaml__Js = Js_of_ocaml__Js::get();
    Js_of_ocaml__Intl::load($global_object);
    $memoized = $runtime->caml_get_global_data()->Js_of_ocaml__Intl;
    return $memoized;
  }

  /**
   * Performs module load operation. May have side effects.
   */
  private static function load($joo_global_object) {
    

    $runtime = $joo_global_object->jsoo_runtime;
    $call1 = $runtime["caml_call1"];
    $call2 = $runtime["caml_call2"];
    $call3 = $runtime["caml_call3"];
    $caml_get_public_method = $runtime["caml_get_public_method"];
    $string = $runtime["caml_new_string"];
    $global_data = $runtime["caml_get_global_data"]();
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
    };
    $Js_of_ocaml_Js = $global_data["Js_of_ocaml__Js"];
    $CamlinternalOO = $global_data["CamlinternalOO"];
    $a = Vector{0, $string("_type"), $string("localeMatcher")};
    $b = Vector{
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
    };
    $c = Vector{
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
    };
    $d = Vector{0, $string("localeMatcher"), $string("_type")};
    $e = Vector{
      0,
      $string("usage"),
      $string("sensitivity"),
      $string("numeric"),
      $string("localeMatcher"),
      $string("ignorePunctuation"),
      $string("caseFirst")
    };
    $f = Vector{
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
    };
    $g = Vector{0, $string("localeMatcher")};
    $h = Vector{
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
    };
    $i = Vector{0, 0, 0, 0};
    $object_options = function(dynamic $param) use ($CamlinternalOO,$call1,$call2,$call3,$cst,$cst_localeMatcher,$g,$i) {
      $bO = function(dynamic $self, dynamic $localeMatcher) use ($CamlinternalOO,$call1,$call2,$call3,$cst,$cst_localeMatcher,$g,$i) {
        if (! $i[1]) {
          $bQ = $call1($CamlinternalOO[16], $g);
          $bR = $call2($CamlinternalOO[3], $bQ, $cst);
          $bS = $call2($CamlinternalOO[7], $bQ, $cst_localeMatcher);
          $bT = function(dynamic $self_1) use ($bR) {
            $env = $self_1[$bR + 1];
            return $env[1];
          };
          $call3($CamlinternalOO[10], $bQ, $bS, $bT);
          $bU = function(dynamic $bV) use ($CamlinternalOO,$bQ,$bR,$call2) {
            $bW = $call2($CamlinternalOO[24], 0, $bQ);
            $bW[$bR + 1] = $bV;
            return $bW;
          };
          $call1($CamlinternalOO[17], $bQ);
          $i[1] = $bU;
        }
        return $call1($i[1], Vector{0, $localeMatcher});
      };
      $bP = "best fit";
      return (function(dynamic $t0, dynamic $param) {
         return darray["localeMatcher"=>$t0];
       })($bP, $bO);
    };
    $j = Vector{0, 0, 0, 0};
    $options = function(dynamic $param) use ($CamlinternalOO,$Js_of_ocaml_Js,$call1,$call2,$cst__0,$e,$j,$shared) {
      $bp = function
      (dynamic $self, dynamic $localeMatcher, dynamic $usage, dynamic $sensitivity, dynamic $ignorePunctuation, dynamic $numeric, dynamic $caseFirst) use ($CamlinternalOO,$call1,$call2,$cst__0,$e,$j,$shared) {
        if (! $j[1]) {
          $bw = $call1($CamlinternalOO[16], $shared);
          $bx = $call2($CamlinternalOO[3], $bw, $cst__0);
          $by = $call2($CamlinternalOO[8], $bw, $e);
          $bz = $by[1];
          $bA = $by[2];
          $bB = $by[3];
          $bC = $by[4];
          $bD = $by[5];
          $bE = $by[6];
          $bF = function(dynamic $self_2) use ($bx) {
            $env = $self_2[$bx + 1];
            return $env[1];
          };
          $bG = function(dynamic $self_2) use ($bx) {
            $env = $self_2[$bx + 1];
            return $env[2];
          };
          $bH = function(dynamic $self_2) use ($bx) {
            $env = $self_2[$bx + 1];
            return $env[3];
          };
          $bI = function(dynamic $self_2) use ($bx) {
            $env = $self_2[$bx + 1];
            return $env[4];
          };
          $bJ = function(dynamic $self_2) use ($bx) {
            $env = $self_2[$bx + 1];
            return $env[5];
          };
          $bK = Vector{
            0,
            $bC,
            function(dynamic $self_2) use ($bx) {
              $env = $self_2[$bx + 1];
              return $env[6];
            },
            $bz,
            $bJ,
            $bA,
            $bI,
            $bD,
            $bH,
            $bB,
            $bG,
            $bE,
            $bF
          };
          $call2($CamlinternalOO[11], $bw, $bK);
          $bL = function(dynamic $bM) use ($CamlinternalOO,$bw,$bx,$call2) {
            $bN = $call2($CamlinternalOO[24], 0, $bw);
            $bN[$bx + 1] = $bM;
            return $bN;
          };
          $call1($CamlinternalOO[17], $bw);
          $j[1] = $bL;
        }
        return $call1(
          $j[1],
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
      $bq = "false";
      $br = $Js_of_ocaml_Js[8];
      $bs = $Js_of_ocaml_Js[8];
      $bt = "variant";
      $bu = "sort";
      $bv = "best fit";
      return (function
       (dynamic $t1, dynamic $t2, dynamic $t3, dynamic $t4, dynamic $t5, dynamic $t6, dynamic $param) {
         return darray[
          "localeMatcher"=>$t1,
          "usage"=>$t2,
          "sensitivity"=>$t3,
          "ignorePunctuation"=>$t4,
          "numeric"=>$t5,
          "caseFirst"=>$t6];
       })($bv, $bu, $bt, $bs, $br, $bq, $bp);
    };
    $Collator = Vector{0, $object_options, $options};
    $k = Vector{0, 0, 0, 0};
    $options__0 = function(dynamic $param) use ($CamlinternalOO,$Js_of_ocaml_Js,$b,$call1,$call2,$cst__1,$f,$k) {
      $aD = function
      (dynamic $self, dynamic $localeMatcher, dynamic $timeZone, dynamic $hour12, dynamic $hourCycle, dynamic $formatMatcher, dynamic $weekday, dynamic $era, dynamic $year, dynamic $month, dynamic $day, dynamic $hour, dynamic $minute, dynamic $second, dynamic $timeZoneName) use ($CamlinternalOO,$b,$call1,$call2,$cst__1,$f,$k) {
        if (! $k[1]) {
          $aS = $call1($CamlinternalOO[16], $f);
          $aT = $call2($CamlinternalOO[3], $aS, $cst__1);
          $aU = $call2($CamlinternalOO[8], $aS, $b);
          $aV = $aU[1];
          $aW = $aU[2];
          $aX = $aU[3];
          $aY = $aU[4];
          $aZ = $aU[5];
          $a0 = $aU[6];
          $a1 = $aU[7];
          $a2 = $aU[8];
          $a3 = $aU[9];
          $a4 = $aU[10];
          $a5 = $aU[11];
          $a6 = $aU[12];
          $a7 = $aU[13];
          $a8 = $aU[14];
          $a9 = function(dynamic $self_3) use ($aT) {
            $env = $self_3[$aT + 1];
            return $env[1];
          };
          $a_ = function(dynamic $self_3) use ($aT) {
            $env = $self_3[$aT + 1];
            return $env[2];
          };
          $ba = function(dynamic $self_3) use ($aT) {
            $env = $self_3[$aT + 1];
            return $env[3];
          };
          $bb = function(dynamic $self_3) use ($aT) {
            $env = $self_3[$aT + 1];
            return $env[4];
          };
          $bc = function(dynamic $self_3) use ($aT) {
            $env = $self_3[$aT + 1];
            return $env[5];
          };
          $bd = function(dynamic $self_3) use ($aT) {
            $env = $self_3[$aT + 1];
            return $env[6];
          };
          $be = function(dynamic $self_3) use ($aT) {
            $env = $self_3[$aT + 1];
            return $env[7];
          };
          $bf = function(dynamic $self_3) use ($aT) {
            $env = $self_3[$aT + 1];
            return $env[8];
          };
          $bg = function(dynamic $self_3) use ($aT) {
            $env = $self_3[$aT + 1];
            return $env[9];
          };
          $bh = function(dynamic $self_3) use ($aT) {
            $env = $self_3[$aT + 1];
            return $env[10];
          };
          $bi = function(dynamic $self_3) use ($aT) {
            $env = $self_3[$aT + 1];
            return $env[11];
          };
          $bj = function(dynamic $self_3) use ($aT) {
            $env = $self_3[$aT + 1];
            return $env[12];
          };
          $bk = function(dynamic $self_3) use ($aT) {
            $env = $self_3[$aT + 1];
            return $env[13];
          };
          $bl = Vector{
            0,
            $a2,
            function(dynamic $self_3) use ($aT) {
              $env = $self_3[$aT + 1];
              return $env[14];
            },
            $aY,
            $bk,
            $a4,
            $bj,
            $a3,
            $bi,
            $a6,
            $bh,
            $aW,
            $bg,
            $a7,
            $bf,
            $aV,
            $be,
            $a0,
            $bd,
            $a8,
            $bc,
            $a5,
            $bb,
            $a1,
            $ba,
            $aZ,
            $a_,
            $aX,
            $a9
          };
          $call2($CamlinternalOO[11], $aS, $bl);
          $bm = function(dynamic $bn) use ($CamlinternalOO,$aS,$aT,$call2) {
            $bo = $call2($CamlinternalOO[24], 0, $aS);
            $bo[$aT + 1] = $bn;
            return $bo;
          };
          $call1($CamlinternalOO[17], $aS);
          $k[1] = $bm;
        }
        return $call1(
          $k[1],
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
      $aE = $Js_of_ocaml_Js[3];
      $aF = $Js_of_ocaml_Js[3];
      $aG = $Js_of_ocaml_Js[3];
      $aH = $Js_of_ocaml_Js[3];
      $aI = $Js_of_ocaml_Js[3];
      $aJ = $Js_of_ocaml_Js[3];
      $aK = $Js_of_ocaml_Js[3];
      $aL = $Js_of_ocaml_Js[3];
      $aM = $Js_of_ocaml_Js[3];
      $aN = "best fit";
      $aO = $Js_of_ocaml_Js[3];
      $aP = $Js_of_ocaml_Js[3];
      $aQ = $Js_of_ocaml_Js[3];
      $aR = "best fit";
      return (function
       (dynamic $t7, dynamic $t8, dynamic $t9, dynamic $t10, dynamic $t11, dynamic $t12, dynamic $t13, dynamic $t14, dynamic $t15, dynamic $t16, dynamic $t17, dynamic $t18, dynamic $t19, dynamic $t20, dynamic $param) {
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
        $aR,
        $aQ,
        $aP,
        $aO,
        $aN,
        $aM,
        $aL,
        $aK,
        $aJ,
        $aI,
        $aH,
        $aG,
        $aF,
        $aE,
        $aD
      );
    };
    $DateTimeFormat = Vector{0, $object_options, $options__0};
    $l = Vector{0, 0, 0, 0};
    $options__1 = function(dynamic $param) use ($CamlinternalOO,$Js_of_ocaml_Js,$c,$call1,$call2,$cst__2,$h,$l) {
      $S = function
      (dynamic $self, dynamic $localeMatcher, dynamic $style, dynamic $currency, dynamic $currencyDisplay, dynamic $useGrouping, dynamic $minimumIntegerDigits, dynamic $minimumFractionDigits, dynamic $maximumFractionDigits, dynamic $minimumSignificantDigits, dynamic $maximumSignificantDigits) use ($CamlinternalOO,$c,$call1,$call2,$cst__2,$h,$l) {
        if (! $l[1]) {
          $ad = $call1($CamlinternalOO[16], $h);
          $ae = $call2($CamlinternalOO[3], $ad, $cst__2);
          $af = $call2($CamlinternalOO[8], $ad, $c);
          $ag = $af[1];
          $ah = $af[2];
          $ai = $af[3];
          $aj = $af[4];
          $ak = $af[5];
          $al = $af[6];
          $am = $af[7];
          $an = $af[8];
          $ao = $af[9];
          $ap = $af[10];
          $aq = function(dynamic $self_4) use ($ae) {
            $env = $self_4[$ae + 1];
            return $env[1];
          };
          $ar = function(dynamic $self_4) use ($ae) {
            $env = $self_4[$ae + 1];
            return $env[2];
          };
          $as = function(dynamic $self_4) use ($ae) {
            $env = $self_4[$ae + 1];
            return $env[3];
          };
          $at = function(dynamic $self_4) use ($ae) {
            $env = $self_4[$ae + 1];
            return $env[4];
          };
          $au = function(dynamic $self_4) use ($ae) {
            $env = $self_4[$ae + 1];
            return $env[5];
          };
          $av = function(dynamic $self_4) use ($ae) {
            $env = $self_4[$ae + 1];
            return $env[6];
          };
          $aw = function(dynamic $self_4) use ($ae) {
            $env = $self_4[$ae + 1];
            return $env[7];
          };
          $ax = function(dynamic $self_4) use ($ae) {
            $env = $self_4[$ae + 1];
            return $env[8];
          };
          $ay = function(dynamic $self_4) use ($ae) {
            $env = $self_4[$ae + 1];
            return $env[9];
          };
          $az = Vector{
            0,
            $an,
            function(dynamic $self_4) use ($ae) {
              $env = $self_4[$ae + 1];
              return $env[10];
            },
            $ah,
            $ay,
            $ap,
            $ax,
            $ao,
            $aw,
            $ag,
            $av,
            $aj,
            $au,
            $ak,
            $at,
            $am,
            $as,
            $ai,
            $ar,
            $al,
            $aq
          };
          $call2($CamlinternalOO[11], $ad, $az);
          $aA = function(dynamic $aB) use ($CamlinternalOO,$ad,$ae,$call2) {
            $aC = $call2($CamlinternalOO[24], 0, $ad);
            $aC[$ae + 1] = $aB;
            return $aC;
          };
          $call1($CamlinternalOO[17], $ad);
          $l[1] = $aA;
        }
        return $call1(
          $l[1],
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
      $T = $Js_of_ocaml_Js[3];
      $U = $Js_of_ocaml_Js[3];
      $V = $Js_of_ocaml_Js[3];
      $W = $Js_of_ocaml_Js[3];
      $X = $Js_of_ocaml_Js[3];
      $Y = $Js_of_ocaml_Js[7];
      $Z = $Js_of_ocaml_Js[3];
      $aa = $Js_of_ocaml_Js[3];
      $ab = "decimal";
      $ac = "best fit";
      return (function
       (dynamic $t21, dynamic $t22, dynamic $t23, dynamic $t24, dynamic $t25, dynamic $t26, dynamic $t27, dynamic $t28, dynamic $t29, dynamic $t30, dynamic $param) {
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
       })($ac, $ab, $aa, $Z, $Y, $X, $W, $V, $U, $T, $S);
    };
    $NumberFormat = Vector{0, $object_options, $options__1};
    $m = Vector{0, 0, 0, 0};
    $options__2 = function(dynamic $param) use ($CamlinternalOO,$a,$call1,$call2,$cst__3,$d,$m) {
      $F = function(dynamic $self, dynamic $localeMatcher, dynamic $type) use ($CamlinternalOO,$a,$call1,$call2,$cst__3,$d,$m) {
        if (! $m[1]) {
          $I = $call1($CamlinternalOO[16], $a);
          $J = $call2($CamlinternalOO[3], $I, $cst__3);
          $K = $call2($CamlinternalOO[8], $I, $d);
          $L = $K[1];
          $M = $K[2];
          $N = function(dynamic $self_5) use ($J) {
            $env = $self_5[$J + 1];
            return $env[1];
          };
          $O = Vector{
            0,
            $L,
            function(dynamic $self_5) use ($J) {
              $env = $self_5[$J + 1];
              return $env[2];
            },
            $M,
            $N
          };
          $call2($CamlinternalOO[11], $I, $O);
          $P = function(dynamic $Q) use ($CamlinternalOO,$I,$J,$call2) {
            $R = $call2($CamlinternalOO[24], 0, $I);
            $R[$J + 1] = $Q;
            return $R;
          };
          $call1($CamlinternalOO[17], $I);
          $m[1] = $P;
        }
        return $call1($m[1], Vector{0, $type, $localeMatcher});
      };
      $G = "cardinal";
      $H = "best fit";
      return (function(dynamic $t31, dynamic $t32, dynamic $param) {return darray["localeMatcher"=>$t31,"type"=>$t32];
       })($H, $G, $F);
    };
    $PluralRules = Vector{0, $object_options, $options__2};
    $n = function(dynamic $x) use ($call1,$caml_get_public_method) {
      return $call1($caml_get_public_method($x, -475689828, 300), $x);
    };
    $o = $Js_of_ocaml_Js[50][1];
    $intl = (function(dynamic $t33, dynamic $param) {return $t33->Intl;})($o, $n);
    $p = function(dynamic $x) use ($call1,$caml_get_public_method) {
      return $call1($caml_get_public_method($x, -438302079, 301), $x);
    };
    $q = function(dynamic $x) use ($call1,$caml_get_public_method) {
      return $call1($caml_get_public_method($x, -475689828, 302), $x);
    };
    $r = $Js_of_ocaml_Js[50][1];
    $s = (function(dynamic $t34, dynamic $param) {return $t34->Intl;})($r, $q);
    $collator_constr = (function(dynamic $t35, dynamic $param) {return $t35->Collator;
     })($s, $p);
    $t = function(dynamic $x) use ($call1,$caml_get_public_method) {
      return $call1($caml_get_public_method($x, 568382385, 303), $x);
    };
    $u = function(dynamic $x) use ($call1,$caml_get_public_method) {
      return $call1($caml_get_public_method($x, -475689828, 304), $x);
    };
    $v = $Js_of_ocaml_Js[50][1];
    $w = (function(dynamic $t36, dynamic $param) {return $t36->Intl;})($v, $u);
    $dateTimeFormat_constr = (function(dynamic $t37, dynamic $param) {return $t37->DateTimeFormat;
     })($w, $t);
    $x = function(dynamic $x) use ($call1,$caml_get_public_method) {
      return $call1($caml_get_public_method($x, 941696479, 305), $x);
    };
    $y = function(dynamic $x) use ($call1,$caml_get_public_method) {
      return $call1($caml_get_public_method($x, -475689828, 306), $x);
    };
    $z = $Js_of_ocaml_Js[50][1];
    $A = (function(dynamic $t38, dynamic $param) {return $t38->Intl;})($z, $y);
    $numberFormat_constr = (function(dynamic $t39, dynamic $param) {return $t39->NumberFormat;
     })($A, $x);
    $B = function(dynamic $x) use ($call1,$caml_get_public_method) {
      return $call1($caml_get_public_method($x, 544366260, 307), $x);
    };
    $C = function(dynamic $x) use ($call1,$caml_get_public_method) {
      return $call1($caml_get_public_method($x, -475689828, 308), $x);
    };
    $D = $Js_of_ocaml_Js[50][1];
    $E = (function(dynamic $t40, dynamic $param) {return $t40->Intl;})($D, $C);
    $pluralRules_constr = (function(dynamic $t41, dynamic $param) {return $t41->PluralRules;
     })($E, $B);
    $is_supported = function(dynamic $param) use ($Js_of_ocaml_Js,$call1,$intl) {
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
    };
    
    $runtime["caml_register_global"](
      70,
      $Js_of_ocaml_Intl,
      "Js_of_ocaml__Intl"
    );

  }
}

/*____hashes compiler:hashing-disabled inputs:hashing-disabled bytecode:hashing-disabled*/
