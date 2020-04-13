<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class Stdlib__set {
  <<__Override, __Memoize>>
  public static function get() : Vector<dynamic> {
    
    $runtime = (\Rehack\GlobalObject::get() as dynamic)->jsoo_runtime;
    $call1 = $runtime["caml_call1"];
    $call2 = $runtime["caml_call2"];
    $call3 = $runtime["caml_call3"];
    $string = $runtime["caml_new_string"];
    $caml_wrap_thrown_exception = $runtime["caml_wrap_thrown_exception"];
    $unsigned_right_shift_32 = $runtime["unsigned_right_shift_32"];
    $cst_Set_remove_min_elt = $string("Set.remove_min_elt");
    $cst_Set_bal = $string("Set.bal");
    $cst_Set_bal__0 = $string("Set.bal");
    $cst_Set_bal__1 = $string("Set.bal");
    $cst_Set_bal__2 = $string("Set.bal");
    $Stdlib = Stdlib::get();
    $Stdlib_seq = Stdlib__seq::get();
    $Stdlib_list = Stdlib__list::get();
    $Assert_failure = Assert_failure::get();
    $a_ = Vector{0, 0, 0, 0} as dynamic;
    $b_ = Vector{0, 0, 0} as dynamic;
    $c_ = Vector{0, $string("set.ml"), 547, 18} as dynamic;
    $Make = (dynamic $Ord) : dynamic ==> {
      $add = new Ref();
      $add_max_element = new Ref();
      $add_min_element = new Ref();
      $cardinal = new Ref();
      $diff = new Ref();
      $disjoint = new Ref();
      $elements_aux = new Ref();
      $exists = new Ref();
      $filter = new Ref();
      $fold = new Ref();
      $for_all = new Ref();
      $inter = new Ref();
      $iter = new Ref();
      $join = new Ref();
      $map = new Ref();
      $partition = new Ref();
      $remove = new Ref();
      $remove_min_elt = new Ref();
      $seq_of_enum = new Ref();
      $split = new Ref();
      $split_bis = new Ref();
      $subset = new Ref();
      $union = new Ref();
      $height = (dynamic $param) : dynamic ==> {
        $h = null as dynamic;
        if ($param) {$h = $param[4];return $h;}
        return 0;
      };
      $create = (dynamic $l, dynamic $v, dynamic $r) : dynamic ==> {
        $hr = null as dynamic;
        $h__0 = null as dynamic;
        $hl = null as dynamic;
        $h = null as dynamic;
        if ($l) {
          $h = $l[4];
          $hl = $h;
        }
        else {$hl = 0 as dynamic;}
        if ($r) {
          $h__0 = $r[4];
          $hr = $h__0;
        }
        else {$hr = 0 as dynamic;}
        $am_ = $hr <= $hl ? (int) ($hl + 1) : ((int) ($hr + 1));
        return Vector{0, $l, $v, $r, $am_};
      };
      $bal = (dynamic $l, dynamic $v, dynamic $r) : dynamic ==> {
        $ak_ = null as dynamic;
        $rll = null as dynamic;
        $rlv = null as dynamic;
        $rlr = null as dynamic;
        $aj_ = null as dynamic;
        $rl = null as dynamic;
        $rv = null as dynamic;
        $rr = null as dynamic;
        $ai_ = null as dynamic;
        $lrl = null as dynamic;
        $lrv = null as dynamic;
        $lrr = null as dynamic;
        $ah_ = null as dynamic;
        $ll = null as dynamic;
        $lv = null as dynamic;
        $lr = null as dynamic;
        $hr = null as dynamic;
        $h__0 = null as dynamic;
        $hl = null as dynamic;
        $h = null as dynamic;
        if ($l) {
          $h = $l[4];
          $hl = $h;
        }
        else {$hl = 0 as dynamic;}
        if ($r) {
          $h__0 = $r[4];
          $hr = $h__0;
        }
        else {$hr = 0 as dynamic;}
        if ((int) ($hr + 2) < $hl) {
          if ($l) {
            $lr = $l[3];
            $lv = $l[2];
            $ll = $l[1];
            $ah_ = $height($lr);
            if ($ah_ <= $height($ll)) {
              return $create($ll, $lv, $create($lr, $v, $r));
            }
            if ($lr) {
              $lrr = $lr[3];
              $lrv = $lr[2];
              $lrl = $lr[1];
              $ai_ = $create($lrr, $v, $r);
              return $create($create($ll, $lv, $lrl), $lrv, $ai_);
            }
            return $call1($Stdlib[1], $cst_Set_bal);
          }
          return $call1($Stdlib[1], $cst_Set_bal__0);
        }
        if ((int) ($hl + 2) < $hr) {
          if ($r) {
            $rr = $r[3];
            $rv = $r[2];
            $rl = $r[1];
            $aj_ = $height($rl);
            if ($aj_ <= $height($rr)) {
              return $create($create($l, $v, $rl), $rv, $rr);
            }
            if ($rl) {
              $rlr = $rl[3];
              $rlv = $rl[2];
              $rll = $rl[1];
              $ak_ = $create($rlr, $rv, $rr);
              return $create($create($l, $v, $rll), $rlv, $ak_);
            }
            return $call1($Stdlib[1], $cst_Set_bal__1);
          }
          return $call1($Stdlib[1], $cst_Set_bal__2);
        }
        $al_ = $hr <= $hl ? (int) ($hl + 1) : ((int) ($hr + 1));
        return Vector{0, $l, $v, $r, $al_};
      };
      $add->contents = (dynamic $x, dynamic $t) : dynamic ==> {
        $ll = null as dynamic;
        $rr = null as dynamic;
        $c = null as dynamic;
        $l = null as dynamic;
        $v = null as dynamic;
        $r = null as dynamic;
        if ($t) {
          $r = $t[3];
          $v = $t[2];
          $l = $t[1];
          $c = $call2($Ord[1], $x, $v);
          if (0 === $c) {return $t;}
          if (0 <= $c) {
            $rr = $add->contents($x, $r);
            return $r === $rr ? $t : ($bal($l, $v, $rr));
          }
          $ll = $add->contents($x, $l);
          return $l === $ll ? $t : ($bal($ll, $v, $r));
        }
        return Vector{0, 0, $x, 0, 1};
      };
      $singleton = (dynamic $x) : dynamic ==> {return Vector{0, 0, $x, 0, 1};};
      $add_min_element->contents = (dynamic $x, dynamic $param) : dynamic ==> {
        $l = null as dynamic;
        $v = null as dynamic;
        $r = null as dynamic;
        if ($param) {
          $r = $param[3];
          $v = $param[2];
          $l = $param[1];
          return $bal($add_min_element->contents($x, $l), $v, $r);
        }
        return $singleton($x);
      };
      $add_max_element->contents = (dynamic $x, dynamic $param) : dynamic ==> {
        $l = null as dynamic;
        $v = null as dynamic;
        $r = null as dynamic;
        if ($param) {
          $r = $param[3];
          $v = $param[2];
          $l = $param[1];
          return $bal($l, $v, $add_max_element->contents($x, $r));
        }
        return $singleton($x);
      };
      $join->contents = (dynamic $l, dynamic $v, dynamic $r) : dynamic ==> {
        $ll = null as dynamic;
        $lv = null as dynamic;
        $lr = null as dynamic;
        $lh = null as dynamic;
        $rl = null as dynamic;
        $rv = null as dynamic;
        $rr = null as dynamic;
        $rh = null as dynamic;
        if ($l) {
          if ($r) {
            $rh = $r[4];
            $rr = $r[3];
            $rv = $r[2];
            $rl = $r[1];
            $lh = $l[4];
            $lr = $l[3];
            $lv = $l[2];
            $ll = $l[1];
            return (int) ($rh + 2) < $lh
              ? $bal($ll, $lv, $join->contents($lr, $v, $r))
              : ((int) ($lh + 2) < $rh
               ? $bal($join->contents($l, $v, $rl), $rv, $rr)
               : ($create($l, $v, $r)));
          }
          return $add_max_element->contents($v, $l);
        }
        return $add_min_element->contents($v, $r);
      };
      $min_elt = (dynamic $param) : dynamic ==> {
        $ag_ = null as dynamic;
        $v = null as dynamic;
        $param__0 = $param;
        for (;;) {
          if ($param__0) {
            $ag_ = $param__0[1];
            if ($ag_) {$param__0 = $ag_;continue;}
            $v = $param__0[2];
            return $v;
          }
          throw $caml_wrap_thrown_exception($Stdlib[8]) as \Throwable;
        }
      };
      $min_elt_opt = (dynamic $param) : dynamic ==> {
        $af_ = null as dynamic;
        $v = null as dynamic;
        $param__0 = $param;
        for (;;) {
          if ($param__0) {
            $af_ = $param__0[1];
            if ($af_) {$param__0 = $af_;continue;}
            $v = $param__0[2];
            return Vector{0, $v};
          }
          return 0;
        }
      };
      $max_elt = (dynamic $param) : dynamic ==> {
        $ad_ = null as dynamic;
        $ae_ = null as dynamic;
        $param__0 = $param;
        for (;;) {
          if ($param__0) {
            $ad_ = $param__0[3];
            $ae_ = $param__0[2];
            if ($ad_) {$param__0 = $ad_;continue;}
            return $ae_;
          }
          throw $caml_wrap_thrown_exception($Stdlib[8]) as \Throwable;
        }
      };
      $max_elt_opt = (dynamic $param) : dynamic ==> {
        $ab_ = null as dynamic;
        $ac_ = null as dynamic;
        $param__0 = $param;
        for (;;) {
          if ($param__0) {
            $ab_ = $param__0[3];
            $ac_ = $param__0[2];
            if ($ab_) {$param__0 = $ab_;continue;}
            return Vector{0, $ac_};
          }
          return 0;
        }
      };
      $remove_min_elt->contents = (dynamic $param) : dynamic ==> {
        $r__0 = null as dynamic;
        $v = null as dynamic;
        $r = null as dynamic;
        $aa_ = null as dynamic;
        if ($param) {
          $aa_ = $param[1];
          if ($aa_) {
            $r = $param[3];
            $v = $param[2];
            return $bal($remove_min_elt->contents($aa_), $v, $r);
          }
          $r__0 = $param[3];
          return $r__0;
        }
        return $call1($Stdlib[1], $cst_Set_remove_min_elt);
      };
      $merge = (dynamic $t, dynamic $match) : dynamic ==> {
        $Z_ = null as dynamic;
        if ($t) {
          if ($match) {
            $Z_ = $remove_min_elt->contents($match);
            return $bal($t, $min_elt($match), $Z_);
          }
          return $t;
        }
        return $match;
      };
      $concat = (dynamic $t, dynamic $match) : dynamic ==> {
        $Y_ = null as dynamic;
        if ($t) {
          if ($match) {
            $Y_ = $remove_min_elt->contents($match);
            return $join->contents($t, $min_elt($match), $Y_);
          }
          return $t;
        }
        return $match;
      };
      $split->contents = (dynamic $x, dynamic $param) : dynamic ==> {
        $ll = null as dynamic;
        $pres__0 = null as dynamic;
        $rl = null as dynamic;
        $match__0 = null as dynamic;
        $lr = null as dynamic;
        $pres = null as dynamic;
        $rr = null as dynamic;
        $match = null as dynamic;
        $c = null as dynamic;
        $l = null as dynamic;
        $v = null as dynamic;
        $r = null as dynamic;
        if ($param) {
          $r = $param[3];
          $v = $param[2];
          $l = $param[1];
          $c = $call2($Ord[1], $x, $v);
          if (0 === $c) {return Vector{0, $l, 1, $r};}
          if (0 <= $c) {
            $match = $split->contents($x, $r);
            $rr = $match[3];
            $pres = $match[2];
            $lr = $match[1];
            return Vector{0, $join->contents($l, $v, $lr), $pres, $rr};
          }
          $match__0 = $split->contents($x, $l);
          $rl = $match__0[3];
          $pres__0 = $match__0[2];
          $ll = $match__0[1];
          return Vector{0, $ll, $pres__0, $join->contents($rl, $v, $r)};
        }
        return $a_;
      };
      $empty = 0 as dynamic;
      $is_empty = (dynamic $param) : dynamic ==> {return $param ? 0 : (1);};
      $mem = (dynamic $x, dynamic $param) : dynamic ==> {
        $r = null as dynamic;
        $v = null as dynamic;
        $l = null as dynamic;
        $c = null as dynamic;
        $X_ = null as dynamic;
        $param__1 = null as dynamic;
        $param__0 = $param;
        for (;;) {
          if ($param__0) {
            $r = $param__0[3];
            $v = $param__0[2];
            $l = $param__0[1];
            $c = $call2($Ord[1], $x, $v);
            $X_ = 0 === $c ? 1 : (0);
            if ($X_) {return $X_;}
            $param__1 = 0 <= $c ? $r : ($l);
            $param__0 = $param__1;
            continue;
          }
          return 0;
        }
      };
      $remove->contents = (dynamic $x, dynamic $t) : dynamic ==> {
        $ll = null as dynamic;
        $rr = null as dynamic;
        $c = null as dynamic;
        $l = null as dynamic;
        $v = null as dynamic;
        $r = null as dynamic;
        if ($t) {
          $r = $t[3];
          $v = $t[2];
          $l = $t[1];
          $c = $call2($Ord[1], $x, $v);
          if (0 === $c) {return $merge($l, $r);}
          if (0 <= $c) {
            $rr = $remove->contents($x, $r);
            return $r === $rr ? $t : ($bal($l, $v, $rr));
          }
          $ll = $remove->contents($x, $l);
          return $l === $ll ? $t : ($bal($ll, $v, $r));
        }
        return 0;
      };
      $union->contents = (dynamic $t1, dynamic $match) : dynamic ==> {
        $W_ = null as dynamic;
        $l1__0 = null as dynamic;
        $r1__0 = null as dynamic;
        $match__1 = null as dynamic;
        $V_ = null as dynamic;
        $l2__0 = null as dynamic;
        $r2__0 = null as dynamic;
        $match__0 = null as dynamic;
        $l1 = null as dynamic;
        $v1 = null as dynamic;
        $r1 = null as dynamic;
        $h1 = null as dynamic;
        $l2 = null as dynamic;
        $v2 = null as dynamic;
        $r2 = null as dynamic;
        $h2 = null as dynamic;
        if ($t1) {
          if ($match) {
            $h2 = $match[4];
            $r2 = $match[3];
            $v2 = $match[2];
            $l2 = $match[1];
            $h1 = $t1[4];
            $r1 = $t1[3];
            $v1 = $t1[2];
            $l1 = $t1[1];
            if ($h2 <= $h1) {
              if (1 === $h2) {return $add->contents($v2, $t1);}
              $match__0 = $split->contents($v1, $match);
              $r2__0 = $match__0[3];
              $l2__0 = $match__0[1];
              $V_ = $union->contents($r1, $r2__0);
              return $join->contents($union->contents($l1, $l2__0), $v1, $V_);
            }
            if (1 === $h1) {return $add->contents($v1, $match);}
            $match__1 = $split->contents($v2, $t1);
            $r1__0 = $match__1[3];
            $l1__0 = $match__1[1];
            $W_ = $union->contents($r1__0, $r2);
            return $join->contents($union->contents($l1__0, $l2), $v2, $W_);
          }
          return $t1;
        }
        return $match;
      };
      $inter->contents = (dynamic $s1, dynamic $match) : dynamic ==> {
        $U_ = null as dynamic;
        $r2__0 = null as dynamic;
        $T_ = null as dynamic;
        $r2 = null as dynamic;
        $S_ = null as dynamic;
        $R_ = null as dynamic;
        $l1 = null as dynamic;
        $v1 = null as dynamic;
        $r1 = null as dynamic;
        if ($s1) {
          if ($match) {
            $r1 = $s1[3];
            $v1 = $s1[2];
            $l1 = $s1[1];
            $R_ = $split->contents($v1, $match);
            $S_ = $R_[1];
            if (0 === $R_[2]) {
              $r2 = $R_[3];
              $T_ = $inter->contents($r1, $r2);
              return $concat($inter->contents($l1, $S_), $T_);
            }
            $r2__0 = $R_[3];
            $U_ = $inter->contents($r1, $r2__0);
            return $join->contents($inter->contents($l1, $S_), $v1, $U_);
          }
          return 0;
        }
        return 0;
      };
      $split_bis->contents = (dynamic $x, dynamic $param) : dynamic ==> {
        $ll = null as dynamic;
        $rl = null as dynamic;
        $match__0 = null as dynamic;
        $lr = null as dynamic;
        $rr = null as dynamic;
        $match = null as dynamic;
        $c = null as dynamic;
        $l = null as dynamic;
        $v = null as dynamic;
        $r = null as dynamic;
        if ($param) {
          $r = $param[3];
          $v = $param[2];
          $l = $param[1];
          $c = $call2($Ord[1], $x, $v);
          if (0 === $c) {return 0;}
          if (0 <= $c) {
            $match = $split_bis->contents($x, $r);
            if ($match) {
              $rr = $match[2];
              $lr = $match[1];
              return Vector{0, $join->contents($l, $v, $lr), $rr};
            }
            return 0;
          }
          $match__0 = $split_bis->contents($x, $l);
          if ($match__0) {
            $rl = $match__0[2];
            $ll = $match__0[1];
            return Vector{
              0,
              $ll,
              (dynamic $param) : dynamic ==> {
                return $join->contents($call1($rl, 0), $v, $r);
              }
            };
          }
          return 0;
        }
        return Vector{0, 0, (dynamic $param) : dynamic ==> {return 0;}};
      };
      $disjoint->contents = (dynamic $s1, dynamic $s2) : dynamic ==> {
        $r1 = null as dynamic;
        $v1 = null as dynamic;
        $l1 = null as dynamic;
        $match = null as dynamic;
        $r2 = null as dynamic;
        $l2 = null as dynamic;
        $Q_ = null as dynamic;
        $s2__1 = null as dynamic;
        $s1__0 = $s1;
        $s2__0 = $s2;
        for (;;) {
          if ($s1__0) {
            if ($s2__0) {
              $r1 = $s1__0[3];
              $v1 = $s1__0[2];
              $l1 = $s1__0[1];
              if ($s1__0 === $s2__0) {return 0;}
              $match = $split_bis->contents($v1, $s2__0);
              if ($match) {
                $r2 = $match[2];
                $l2 = $match[1];
                $Q_ = $disjoint->contents($l1, $l2);
                if ($Q_) {
                  $s2__1 = $call1($r2, 0);
                  $s1__0 = $r1;
                  $s2__0 = $s2__1;
                  continue;
                }
                return $Q_;
              }
              return 0;
            }
          }
          return 1;
        }
      };
      $diff->contents = (dynamic $t1, dynamic $match) : dynamic ==> {
        $P_ = null as dynamic;
        $r2__0 = null as dynamic;
        $O_ = null as dynamic;
        $r2 = null as dynamic;
        $N_ = null as dynamic;
        $M_ = null as dynamic;
        $l1 = null as dynamic;
        $v1 = null as dynamic;
        $r1 = null as dynamic;
        if ($t1) {
          if ($match) {
            $r1 = $t1[3];
            $v1 = $t1[2];
            $l1 = $t1[1];
            $M_ = $split->contents($v1, $match);
            $N_ = $M_[1];
            if (0 === $M_[2]) {
              $r2 = $M_[3];
              $O_ = $diff->contents($r1, $r2);
              return $join->contents($diff->contents($l1, $N_), $v1, $O_);
            }
            $r2__0 = $M_[3];
            $P_ = $diff->contents($r1, $r2__0);
            return $concat($diff->contents($l1, $N_), $P_);
          }
          return $t1;
        }
        return 0;
      };
      $cons_enum = (dynamic $s, dynamic $e) : dynamic ==> {
        $r = null as dynamic;
        $v = null as dynamic;
        $s__1 = null as dynamic;
        $e__1 = null as dynamic;
        $s__0 = $s;
        $e__0 = $e;
        for (;;) {
          if ($s__0) {
            $r = $s__0[3];
            $v = $s__0[2];
            $s__1 = $s__0[1];
            $e__1 = Vector{0, $v, $r, $e__0} as dynamic;
            $s__0 = $s__1;
            $e__0 = $e__1;
            continue;
          }
          return $e__0;
        }
      };
      $compare_aux = (dynamic $e1, dynamic $e2) : dynamic ==> {
        $e2__1 = null as dynamic;
        $r2 = null as dynamic;
        $v2 = null as dynamic;
        $e1__1 = null as dynamic;
        $r1 = null as dynamic;
        $v1 = null as dynamic;
        $c = null as dynamic;
        $e2__2 = null as dynamic;
        $e1__2 = null as dynamic;
        $e1__0 = $e1;
        $e2__0 = $e2;
        for (;;) {
          if ($e1__0) {
            if ($e2__0) {
              $e2__1 = $e2__0[3];
              $r2 = $e2__0[2];
              $v2 = $e2__0[1];
              $e1__1 = $e1__0[3];
              $r1 = $e1__0[2];
              $v1 = $e1__0[1];
              $c = $call2($Ord[1], $v1, $v2);
              if (0 === $c) {
                $e2__2 = $cons_enum($r2, $e2__1);
                $e1__2 = $cons_enum($r1, $e1__1);
                $e1__0 = $e1__2;
                $e2__0 = $e2__2;
                continue;
              }
              return $c;
            }
            return 1;
          }
          return $e2__0 ? -1 : (0);
        }
      };
      $compare = (dynamic $s1, dynamic $s2) : dynamic ==> {
        $L_ = $cons_enum($s2, 0);
        return $compare_aux($cons_enum($s1, 0), $L_);
      };
      $equal = (dynamic $s1, dynamic $s2) : dynamic ==> {
        return 0 === $compare($s1, $s2) ? 1 : (0);
      };
      $subset->contents = (dynamic $s1, dynamic $s2) : dynamic ==> {
        $r2 = null as dynamic;
        $v2 = null as dynamic;
        $l2 = null as dynamic;
        $r1 = null as dynamic;
        $v1 = null as dynamic;
        $l1 = null as dynamic;
        $c = null as dynamic;
        $I_ = null as dynamic;
        $J_ = null as dynamic;
        $K_ = null as dynamic;
        $s1__0 = $s1;
        $s2__0 = $s2;
        for (;;) {
          if ($s1__0) {
            if ($s2__0) {
              $r2 = $s2__0[3];
              $v2 = $s2__0[2];
              $l2 = $s2__0[1];
              $r1 = $s1__0[3];
              $v1 = $s1__0[2];
              $l1 = $s1__0[1];
              $c = $call2($Ord[1], $v1, $v2);
              if (0 === $c) {
                $I_ = $subset->contents($l1, $l2);
                if ($I_) {$s1__0 = $r1;$s2__0 = $r2;continue;}
                return $I_;
              }
              if (0 <= $c) {
                $J_ = $subset->contents(Vector{0, 0, $v1, $r1, 0}, $r2);
                if ($J_) {$s1__0 = $l1;continue;}
                return $J_;
              }
              $K_ = $subset->contents(Vector{0, $l1, $v1, 0, 0}, $l2);
              if ($K_) {$s1__0 = $r1;continue;}
              return $K_;
            }
            return 0;
          }
          return 1;
        }
      };
      $iter->contents = (dynamic $f, dynamic $param) : dynamic ==> {
        $param__1 = null as dynamic;
        $v = null as dynamic;
        $l = null as dynamic;
        $param__0 = $param;
        for (;;) {
          if ($param__0) {
            $param__1 = $param__0[3];
            $v = $param__0[2];
            $l = $param__0[1];
            $iter->contents($f, $l);
            $call1($f, $v);
            $param__0 = $param__1;
            continue;
          }
          return 0;
        }
      };
      $fold->contents = (dynamic $f, dynamic $s, dynamic $accu) : dynamic ==> {
        $s__1 = null as dynamic;
        $v = null as dynamic;
        $l = null as dynamic;
        $accu__1 = null as dynamic;
        $s__0 = $s;
        $accu__0 = $accu;
        for (;;) {
          if ($s__0) {
            $s__1 = $s__0[3];
            $v = $s__0[2];
            $l = $s__0[1];
            $accu__1 = $call2($f, $v, $fold->contents($f, $l, $accu__0));
            $s__0 = $s__1;
            $accu__0 = $accu__1;
            continue;
          }
          return $accu__0;
        }
      };
      $for_all->contents = (dynamic $p, dynamic $param) : dynamic ==> {
        $r = null as dynamic;
        $v = null as dynamic;
        $l = null as dynamic;
        $F_ = null as dynamic;
        $G_ = null as dynamic;
        $H_ = null as dynamic;
        $param__0 = $param;
        for (;;) {
          if ($param__0) {
            $r = $param__0[3];
            $v = $param__0[2];
            $l = $param__0[1];
            $F_ = $call1($p, $v);
            if ($F_) {
              $G_ = $for_all->contents($p, $l);
              if ($G_) {$param__0 = $r;continue;}
              $H_ = $G_;
            }
            else {$H_ = $F_;}
            return $H_;
          }
          return 1;
        }
      };
      $exists->contents = (dynamic $p, dynamic $param) : dynamic ==> {
        $r = null as dynamic;
        $v = null as dynamic;
        $l = null as dynamic;
        $C_ = null as dynamic;
        $D_ = null as dynamic;
        $E_ = null as dynamic;
        $param__0 = $param;
        for (;;) {
          if ($param__0) {
            $r = $param__0[3];
            $v = $param__0[2];
            $l = $param__0[1];
            $C_ = $call1($p, $v);
            if ($C_) {
              $D_ = $C_;
            }
            else {
              $E_ = $exists->contents($p, $l);
              if (! $E_) {$param__0 = $r;continue;}
              $D_ = $E_;
            }
            return $D_;
          }
          return 0;
        }
      };
      $filter->contents = (dynamic $p, dynamic $t) : dynamic ==> {
        $r__0 = null as dynamic;
        $pv = null as dynamic;
        $l__0 = null as dynamic;
        $l = null as dynamic;
        $v = null as dynamic;
        $r = null as dynamic;
        if ($t) {
          $r = $t[3];
          $v = $t[2];
          $l = $t[1];
          $l__0 = $filter->contents($p, $l);
          $pv = $call1($p, $v);
          $r__0 = $filter->contents($p, $r);
          if ($pv) {
            if ($l === $l__0) {if ($r === $r__0) {return $t;}}
            return $join->contents($l__0, $v, $r__0);
          }
          return $concat($l__0, $r__0);
        }
        return 0;
      };
      $partition->contents = (dynamic $p, dynamic $param) : dynamic ==> {
        $B_ = null as dynamic;
        $A_ = null as dynamic;
        $rt = null as dynamic;
        $rf = null as dynamic;
        $match__0 = null as dynamic;
        $pv = null as dynamic;
        $lt = null as dynamic;
        $lf = null as dynamic;
        $match = null as dynamic;
        $l = null as dynamic;
        $v = null as dynamic;
        $r = null as dynamic;
        if ($param) {
          $r = $param[3];
          $v = $param[2];
          $l = $param[1];
          $match = $partition->contents($p, $l);
          $lf = $match[2];
          $lt = $match[1];
          $pv = $call1($p, $v);
          $match__0 = $partition->contents($p, $r);
          $rf = $match__0[2];
          $rt = $match__0[1];
          if ($pv) {
            $A_ = $concat($lf, $rf);
            return Vector{0, $join->contents($lt, $v, $rt), $A_};
          }
          $B_ = $join->contents($lf, $v, $rf);
          return Vector{0, $concat($lt, $rt), $B_};
        }
        return $b_;
      };
      $cardinal->contents = (dynamic $param) : dynamic ==> {
        $z_ = null as dynamic;
        $l = null as dynamic;
        $r = null as dynamic;
        if ($param) {
          $r = $param[3];
          $l = $param[1];
          $z_ = $cardinal->contents($r);
          return (int) ((int) ($cardinal->contents($l) + 1) + $z_);
        }
        return 0;
      };
      $elements_aux->contents = (dynamic $accu, dynamic $param) : dynamic ==> {
        $r = null as dynamic;
        $v = null as dynamic;
        $param__1 = null as dynamic;
        $accu__1 = null as dynamic;
        $accu__0 = $accu;
        $param__0 = $param;
        for (;;) {
          if ($param__0) {
            $r = $param__0[3];
            $v = $param__0[2];
            $param__1 = $param__0[1];
            $accu__1 = Vector{0, $v, $elements_aux->contents($accu__0, $r)} as dynamic;
            $accu__0 = $accu__1;
            $param__0 = $param__1;
            continue;
          }
          return $accu__0;
        }
      };
      $elements = (dynamic $s) : dynamic ==> {
        return $elements_aux->contents(0, $s);
      };
      $find = (dynamic $x, dynamic $param) : dynamic ==> {
        $r = null as dynamic;
        $v = null as dynamic;
        $l = null as dynamic;
        $c = null as dynamic;
        $param__1 = null as dynamic;
        $param__0 = $param;
        for (;;) {
          if ($param__0) {
            $r = $param__0[3];
            $v = $param__0[2];
            $l = $param__0[1];
            $c = $call2($Ord[1], $x, $v);
            if (0 === $c) {return $v;}
            $param__1 = 0 <= $c ? $r : ($l);
            $param__0 = $param__1;
            continue;
          }
          throw $caml_wrap_thrown_exception($Stdlib[8]) as \Throwable;
        }
      };
      $find_first_aux = (dynamic $v0, dynamic $f, dynamic $param) : dynamic ==> {
        $r = null as dynamic;
        $v = null as dynamic;
        $l = null as dynamic;
        $v0__0 = $v0;
        $param__0 = $param;
        for (;;) {
          if ($param__0) {
            $r = $param__0[3];
            $v = $param__0[2];
            $l = $param__0[1];
            if ($call1($f, $v)) {$v0__0 = $v;$param__0 = $l;continue;}
            $param__0 = $r;
            continue;
          }
          return $v0__0;
        }
      };
      $find_first = (dynamic $f, dynamic $param) : dynamic ==> {
        $r = null as dynamic;
        $v = null as dynamic;
        $l = null as dynamic;
        $param__0 = $param;
        for (;;) {
          if ($param__0) {
            $r = $param__0[3];
            $v = $param__0[2];
            $l = $param__0[1];
            if ($call1($f, $v)) {return $find_first_aux($v, $f, $l);}
            $param__0 = $r;
            continue;
          }
          throw $caml_wrap_thrown_exception($Stdlib[8]) as \Throwable;
        }
      };
      $find_first_opt_aux = (dynamic $v0, dynamic $f, dynamic $param) : dynamic ==> {
        $r = null as dynamic;
        $v = null as dynamic;
        $l = null as dynamic;
        $v0__0 = $v0;
        $param__0 = $param;
        for (;;) {
          if ($param__0) {
            $r = $param__0[3];
            $v = $param__0[2];
            $l = $param__0[1];
            if ($call1($f, $v)) {$v0__0 = $v;$param__0 = $l;continue;}
            $param__0 = $r;
            continue;
          }
          return Vector{0, $v0__0};
        }
      };
      $find_first_opt = (dynamic $f, dynamic $param) : dynamic ==> {
        $r = null as dynamic;
        $v = null as dynamic;
        $l = null as dynamic;
        $param__0 = $param;
        for (;;) {
          if ($param__0) {
            $r = $param__0[3];
            $v = $param__0[2];
            $l = $param__0[1];
            if ($call1($f, $v)) {return $find_first_opt_aux($v, $f, $l);}
            $param__0 = $r;
            continue;
          }
          return 0;
        }
      };
      $find_last_aux = (dynamic $v0, dynamic $f, dynamic $param) : dynamic ==> {
        $r = null as dynamic;
        $v = null as dynamic;
        $l = null as dynamic;
        $v0__0 = $v0;
        $param__0 = $param;
        for (;;) {
          if ($param__0) {
            $r = $param__0[3];
            $v = $param__0[2];
            $l = $param__0[1];
            if ($call1($f, $v)) {$v0__0 = $v;$param__0 = $r;continue;}
            $param__0 = $l;
            continue;
          }
          return $v0__0;
        }
      };
      $find_last = (dynamic $f, dynamic $param) : dynamic ==> {
        $r = null as dynamic;
        $v = null as dynamic;
        $l = null as dynamic;
        $param__0 = $param;
        for (;;) {
          if ($param__0) {
            $r = $param__0[3];
            $v = $param__0[2];
            $l = $param__0[1];
            if ($call1($f, $v)) {return $find_last_aux($v, $f, $r);}
            $param__0 = $l;
            continue;
          }
          throw $caml_wrap_thrown_exception($Stdlib[8]) as \Throwable;
        }
      };
      $find_last_opt_aux = (dynamic $v0, dynamic $f, dynamic $param) : dynamic ==> {
        $r = null as dynamic;
        $v = null as dynamic;
        $l = null as dynamic;
        $v0__0 = $v0;
        $param__0 = $param;
        for (;;) {
          if ($param__0) {
            $r = $param__0[3];
            $v = $param__0[2];
            $l = $param__0[1];
            if ($call1($f, $v)) {$v0__0 = $v;$param__0 = $r;continue;}
            $param__0 = $l;
            continue;
          }
          return Vector{0, $v0__0};
        }
      };
      $find_last_opt = (dynamic $f, dynamic $param) : dynamic ==> {
        $r = null as dynamic;
        $v = null as dynamic;
        $l = null as dynamic;
        $param__0 = $param;
        for (;;) {
          if ($param__0) {
            $r = $param__0[3];
            $v = $param__0[2];
            $l = $param__0[1];
            if ($call1($f, $v)) {return $find_last_opt_aux($v, $f, $r);}
            $param__0 = $l;
            continue;
          }
          return 0;
        }
      };
      $find_opt = (dynamic $x, dynamic $param) : dynamic ==> {
        $r = null as dynamic;
        $v = null as dynamic;
        $l = null as dynamic;
        $c = null as dynamic;
        $param__1 = null as dynamic;
        $param__0 = $param;
        for (;;) {
          if ($param__0) {
            $r = $param__0[3];
            $v = $param__0[2];
            $l = $param__0[1];
            $c = $call2($Ord[1], $x, $v);
            if (0 === $c) {return Vector{0, $v};}
            $param__1 = 0 <= $c ? $r : ($l);
            $param__0 = $param__1;
            continue;
          }
          return 0;
        }
      };
      $try_join = (dynamic $l, dynamic $v, dynamic $r) : dynamic ==> {
        $switch__1 = null as dynamic;
        $switch__0 = null as dynamic;
        $y_ = null as dynamic;
        $x_ = null as dynamic;
        if (0 === $l) {
          $switch__0 = 0 as dynamic;
        }
        else {
          $y_ = $max_elt($l);
          $switch__0 = 0 <= $call2($Ord[1], $y_, $v) ? 1 : (0);
        }
        if (! $switch__0) {
          if (0 === $r) {
            $switch__1 = 0 as dynamic;
          }
          else {
            $x_ = $min_elt($r);
            $switch__1 = 0 <= $call2($Ord[1], $v, $x_) ? 1 : (0);
          }
          if (! $switch__1) {return $join->contents($l, $v, $r);}
        }
        return $union->contents($l, $add->contents($v, $r));
      };
      $map->contents = (dynamic $f, dynamic $t) : dynamic ==> {
        $r__0 = null as dynamic;
        $v__0 = null as dynamic;
        $l__0 = null as dynamic;
        $l = null as dynamic;
        $v = null as dynamic;
        $r = null as dynamic;
        if ($t) {
          $r = $t[3];
          $v = $t[2];
          $l = $t[1];
          $l__0 = $map->contents($f, $l);
          $v__0 = $call1($f, $v);
          $r__0 = $map->contents($f, $r);
          if ($l === $l__0) {
            if ($v === $v__0) {if ($r === $r__0) {return $t;}}
          }
          return $try_join($l__0, $v__0, $r__0);
        }
        return 0;
      };
      $of_sorted_list = (dynamic $l) : dynamic ==> {
        $sub = new Ref();
        $sub->contents = (dynamic $n, dynamic $l) : dynamic ==> {
          $x0__1 = null as dynamic;
          $x1__0 = null as dynamic;
          $x2 = null as dynamic;
          $l__5 = null as dynamic;
          $w_ = null as dynamic;
          $v_ = null as dynamic;
          $x0__0 = null as dynamic;
          $x1 = null as dynamic;
          $l__4 = null as dynamic;
          $u_ = null as dynamic;
          $x0 = null as dynamic;
          $l__3 = null as dynamic;
          $right = null as dynamic;
          $l__2 = null as dynamic;
          $match__0 = null as dynamic;
          $mid = null as dynamic;
          $l__1 = null as dynamic;
          if (! (3 < $unsigned_right_shift_32($n, 0))) {
            switch($n) {
              // FALLTHROUGH
              case 0:
                return Vector{0, 0, $l};
              // FALLTHROUGH
              case 1:
                if ($l) {
                  $l__3 = $l[2];
                  $x0 = $l[1];
                  return Vector{0, Vector{0, 0, $x0, 0, 1}, $l__3};
                }
                break;
              // FALLTHROUGH
              case 2:
                if ($l) {
                  $u_ = $l[2];
                  if ($u_) {
                    $l__4 = $u_[2];
                    $x1 = $u_[1];
                    $x0__0 = $l[1];
                    return Vector{
                      0,
                      Vector{0, Vector{0, 0, $x0__0, 0, 1}, $x1, 0, 2},
                      $l__4
                    };
                  }
                }
                break;
              // FALLTHROUGH
              default:
                if ($l) {
                  $v_ = $l[2];
                  if ($v_) {
                    $w_ = $v_[2];
                    if ($w_) {
                      $l__5 = $w_[2];
                      $x2 = $w_[1];
                      $x1__0 = $v_[1];
                      $x0__1 = $l[1];
                      return Vector{
                        0,
                        Vector{
                          0,
                          Vector{0, 0, $x0__1, 0, 1},
                          $x1__0,
                          Vector{0, 0, $x2, 0, 1},
                          2
                        },
                        $l__5
                      };
                    }
                  }
                }
              }
          }
          $nl = (int) ($n / 2) as dynamic;
          $match = $sub->contents($nl, $l);
          $l__0 = $match[2];
          $left = $match[1];
          if ($l__0) {
            $l__1 = $l__0[2];
            $mid = $l__0[1];
            $match__0 = $sub->contents((int) ((int) ($n - $nl) + -1), $l__1);
            $l__2 = $match__0[2];
            $right = $match__0[1];
            return Vector{0, $create($left, $mid, $right), $l__2};
          }
          throw $caml_wrap_thrown_exception(Vector{0, $Assert_failure, $c_}) as \Throwable;
        };
        return $sub->contents($call1($Stdlib_list[1], $l), $l)[1];
      };
      $of_list = (dynamic $l) : dynamic ==> {
        $x4 = null as dynamic;
        $t_ = null as dynamic;
        $s_ = null as dynamic;
        $r_ = null as dynamic;
        $q_ = null as dynamic;
        $p_ = null as dynamic;
        $o_ = null as dynamic;
        $n_ = null as dynamic;
        $m_ = null as dynamic;
        if ($l) {
          $m_ = $l[2];
          $n_ = $l[1];
          if ($m_) {
            $o_ = $m_[2];
            $p_ = $m_[1];
            if ($o_) {
              $q_ = $o_[2];
              $r_ = $o_[1];
              if ($q_) {
                $s_ = $q_[2];
                $t_ = $q_[1];
                if ($s_) {
                  if ($s_[2]) {
                    return $of_sorted_list($call2($Stdlib_list[52], $Ord[1], $l)
                    );
                  }
                  $x4 = $s_[1];
                  return $add->contents(
                    $x4,
                    $add->contents(
                      $t_,
                      $add->contents($r_, $add->contents($p_, $singleton($n_)))
                    )
                  );
                }
                return $add->contents(
                  $t_,
                  $add->contents($r_, $add->contents($p_, $singleton($n_)))
                );
              }
              return $add->contents($r_, $add->contents($p_, $singleton($n_)));
            }
            return $add->contents($p_, $singleton($n_));
          }
          return $singleton($n_);
        }
        return $empty;
      };
      $add_seq = (dynamic $i, dynamic $m) : dynamic ==> {
        $l_ = (dynamic $s, dynamic $x) : dynamic ==> {
          return $add->contents($x, $s);
        };
        return $call3($Stdlib_seq[7], $l_, $m, $i);
      };
      $of_seq = (dynamic $i) : dynamic ==> {return $add_seq($i, $empty);};
      $seq_of_enum->contents = (dynamic $c, dynamic $param) : dynamic ==> {
        $j_ = null as dynamic;
        $x = null as dynamic;
        $t = null as dynamic;
        $rest = null as dynamic;
        if ($c) {
          $rest = $c[3];
          $t = $c[2];
          $x = $c[1];
          $j_ = $cons_enum($t, $rest);
          return Vector{
            0,
            $x,
            (dynamic $k_) : dynamic ==> {
              return $seq_of_enum->contents($j_, $k_);
            }
          };
        }
        return 0;
      };
      $to_seq = (dynamic $c) : dynamic ==> {
        $h_ = $cons_enum($c, 0);
        return (dynamic $i_) : dynamic ==> {
          return $seq_of_enum->contents($h_, $i_);
        };
      };
      $to_seq_from = (dynamic $low, dynamic $s) : dynamic ==> {
        $aux = (dynamic $low, dynamic $s, dynamic $c) : dynamic ==> {
          $r = null as dynamic;
          $v = null as dynamic;
          $l = null as dynamic;
          $n = null as dynamic;
          $c__1 = null as dynamic;
          $s__0 = $s;
          $c__0 = $c;
          for (;;) {
            if ($s__0) {
              $r = $s__0[3];
              $v = $s__0[2];
              $l = $s__0[1];
              $n = $call2($Ord[1], $v, $low);
              if (0 === $n) {return Vector{0, $v, $r, $c__0};}
              if (0 <= $n) {
                $c__1 = Vector{0, $v, $r, $c__0} as dynamic;
                $s__0 = $l;
                $c__0 = $c__1;
                continue;
              }
              $s__0 = $r;
              continue;
            }
            return $c__0;
          }
        };
        $f_ = $aux($low, $s, 0);
        return (dynamic $g_) : dynamic ==> {
          return $seq_of_enum->contents($f_, $g_);
        };
      };
      return Vector{
        0,
        $height,
        $create,
        $bal,
        $add->contents,
        $singleton,
        $add_min_element->contents,
        $add_max_element->contents,
        $join->contents,
        $min_elt,
        $min_elt_opt,
        $max_elt,
        $max_elt_opt,
        $remove_min_elt->contents,
        $merge,
        $concat,
        $split->contents,
        $empty,
        $is_empty,
        $mem,
        $remove->contents,
        $union->contents,
        $inter->contents,
        $split_bis->contents,
        $disjoint->contents,
        $diff->contents,
        $cons_enum,
        $compare_aux,
        $compare,
        $equal,
        $subset->contents,
        $iter->contents,
        $fold->contents,
        $for_all->contents,
        $exists->contents,
        $filter->contents,
        $partition->contents,
        $cardinal->contents,
        $elements_aux->contents,
        $elements,
        $min_elt,
        $min_elt_opt,
        $find,
        $find_first_aux,
        $find_first,
        $find_first_opt_aux,
        $find_first_opt,
        $find_last_aux,
        $find_last,
        $find_last_opt_aux,
        $find_last_opt,
        $find_opt,
        $try_join,
        $map->contents,
        $of_sorted_list,
        $of_list,
        $add_seq,
        $of_seq,
        $seq_of_enum->contents,
        $to_seq,
        $to_seq_from
      };
    };
    $Stdlib_set = Vector{
      0,
      (dynamic $d_) : dynamic ==> {
        $e_ = $Make($d_);
        return Vector{
          0,
          $e_[17],
          $e_[18],
          $e_[19],
          $e_[4],
          $e_[5],
          $e_[20],
          $e_[21],
          $e_[22],
          $e_[24],
          $e_[25],
          $e_[28],
          $e_[29],
          $e_[30],
          $e_[31],
          $e_[53],
          $e_[32],
          $e_[33],
          $e_[34],
          $e_[35],
          $e_[36],
          $e_[37],
          $e_[39],
          $e_[9],
          $e_[10],
          $e_[11],
          $e_[12],
          $e_[40],
          $e_[41],
          $e_[16],
          $e_[42],
          $e_[51],
          $e_[44],
          $e_[46],
          $e_[48],
          $e_[50],
          $e_[55],
          $e_[60],
          $e_[59],
          $e_[56],
          $e_[57]
        };
      }
    } as dynamic;
    
    return($Stdlib_set);

  }

}
/* Hashing disabled */
