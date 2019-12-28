<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class Set {
  <<__Override, __Memoize>>
  public static function requireModule() : Vector<dynamic> {
    
    $runtime =  (\Rehack\GlobalObject::get() as dynamic)->jsoo_runtime ;
    $call1 = $runtime["caml_call1"];
    $call2 = $runtime["caml_call2"];
    $string = $runtime["caml_new_string"];
    $caml_wrap_thrown_exception = $runtime["caml_wrap_thrown_exception"];
    $unsigned_right_shift_32 = $runtime["unsigned_right_shift_32"];
    $cst_Set_remove_min_elt = $string("Set.remove_min_elt");
    $cst_Set_bal = $string("Set.bal");
    $cst_Set_bal__0 = $string("Set.bal");
    $cst_Set_bal__1 = $string("Set.bal");
    $cst_Set_bal__2 = $string("Set.bal");
    $Not_found =  Not_found::requireModule ();
    $Pervasives =  Pervasives::requireModule ();
    $List =  List_::requireModule ();
    $Assert_failure =  Assert_failure::requireModule ();
    $a_ = Vector{0, 0, 0, 0} as dynamic;
    $b_ = Vector{0, 0, 0} as dynamic;
    $c_ = Vector{0, $string("set.ml"), 510, 18} as dynamic;
    $Make = (dynamic $Ord) ==> {
      $add = new Ref();
      $add_max_element = new Ref();
      $add_min_element = new Ref();
      $cardinal = new Ref();
      $diff = new Ref();
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
      $split = new Ref();
      $subset = new Ref();
      $union = new Ref();
      $height = (dynamic $param) ==> {
        if ($param) {$h = $param[4];return $h;}
        return 0;
      };
      $create = (dynamic $l, dynamic $v, dynamic $r) ==> {
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
        $ae_ = $hr <= $hl ? (int) ($hl + 1) : ((int) ($hr + 1));
        return Vector{0, $l, $v, $r, $ae_};
      };
      $bal = (dynamic $l, dynamic $v, dynamic $r) ==> {
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
            $Z_ = $height($lr);
            if ($Z_ <= $height($ll)) {
              return $create($ll, $lv, $create($lr, $v, $r));
            }
            if ($lr) {
              $lrr = $lr[3];
              $lrv = $lr[2];
              $lrl = $lr[1];
              $aa_ = $create($lrr, $v, $r);
              return $create($create($ll, $lv, $lrl), $lrv, $aa_);
            }
            return $call1($Pervasives[1], $cst_Set_bal);
          }
          return $call1($Pervasives[1], $cst_Set_bal__0);
        }
        if ((int) ($hl + 2) < $hr) {
          if ($r) {
            $rr = $r[3];
            $rv = $r[2];
            $rl = $r[1];
            $ab_ = $height($rl);
            if ($ab_ <= $height($rr)) {
              return $create($create($l, $v, $rl), $rv, $rr);
            }
            if ($rl) {
              $rlr = $rl[3];
              $rlv = $rl[2];
              $rll = $rl[1];
              $ac_ = $create($rlr, $rv, $rr);
              return $create($create($l, $v, $rll), $rlv, $ac_);
            }
            return $call1($Pervasives[1], $cst_Set_bal__1);
          }
          return $call1($Pervasives[1], $cst_Set_bal__2);
        }
        $ad_ = $hr <= $hl ? (int) ($hl + 1) : ((int) ($hr + 1));
        return Vector{0, $l, $v, $r, $ad_};
      };
      $add->contents = (dynamic $x, dynamic $t) ==> {
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
      $singleton = (dynamic $x) ==> {return Vector{0, 0, $x, 0, 1};};
      $add_min_element->contents = (dynamic $x, dynamic $param) ==> {
        if ($param) {
          $r = $param[3];
          $v = $param[2];
          $l = $param[1];
          return $bal($add_min_element->contents($x, $l), $v, $r);
        }
        return $singleton($x);
      };
      $add_max_element->contents = (dynamic $x, dynamic $param) ==> {
        if ($param) {
          $r = $param[3];
          $v = $param[2];
          $l = $param[1];
          return $bal($l, $v, $add_max_element->contents($x, $r));
        }
        return $singleton($x);
      };
      $join->contents = (dynamic $l, dynamic $v, dynamic $r) ==> {
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
      $min_elt = (dynamic $param) ==> {
        $param__0 = $param;
        for (;;) {
          if ($param__0) {
            $Y_ = $param__0[1];
            if ($Y_) {$param__0 = $Y_;continue;}
            $v = $param__0[2];
            return $v;
          }
          throw $caml_wrap_thrown_exception($Not_found) as \Throwable;
        }
      };
      $min_elt_opt = (dynamic $param) ==> {
        $param__0 = $param;
        for (;;) {
          if ($param__0) {
            $X_ = $param__0[1];
            if ($X_) {$param__0 = $X_;continue;}
            $v = $param__0[2];
            return Vector{0, $v};
          }
          return 0;
        }
      };
      $max_elt = (dynamic $param) ==> {
        $param__0 = $param;
        for (;;) {
          if ($param__0) {
            $V_ = $param__0[3];
            $W_ = $param__0[2];
            if ($V_) {$param__0 = $V_;continue;}
            return $W_;
          }
          throw $caml_wrap_thrown_exception($Not_found) as \Throwable;
        }
      };
      $max_elt_opt = (dynamic $param) ==> {
        $param__0 = $param;
        for (;;) {
          if ($param__0) {
            $T_ = $param__0[3];
            $U_ = $param__0[2];
            if ($T_) {$param__0 = $T_;continue;}
            return Vector{0, $U_};
          }
          return 0;
        }
      };
      $remove_min_elt->contents = (dynamic $param) ==> {
        if ($param) {
          $S_ = $param[1];
          if ($S_) {
            $r = $param[3];
            $v = $param[2];
            return $bal($remove_min_elt->contents($S_), $v, $r);
          }
          $r__0 = $param[3];
          return $r__0;
        }
        return $call1($Pervasives[1], $cst_Set_remove_min_elt);
      };
      $merge = (dynamic $t, dynamic $match) ==> {
        if ($t) {
          if ($match) {
            $R_ = $remove_min_elt->contents($match);
            return $bal($t, $min_elt($match), $R_);
          }
          return $t;
        }
        return $match;
      };
      $concat = (dynamic $t, dynamic $match) ==> {
        if ($t) {
          if ($match) {
            $Q_ = $remove_min_elt->contents($match);
            return $join->contents($t, $min_elt($match), $Q_);
          }
          return $t;
        }
        return $match;
      };
      $split->contents = (dynamic $x, dynamic $param) ==> {
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
      $is_empty = (dynamic $param) ==> {return $param ? 0 : (1);};
      $mem = (dynamic $x, dynamic $param) ==> {
        $param__0 = $param;
        for (;;) {
          if ($param__0) {
            $r = $param__0[3];
            $v = $param__0[2];
            $l = $param__0[1];
            $c = $call2($Ord[1], $x, $v);
            $P_ = 0 === $c ? 1 : (0);
            if ($P_) {return $P_;}
            $param__1 = 0 <= $c ? $r : ($l);
            $param__0 = $param__1;
            continue;
          }
          return 0;
        }
      };
      $remove->contents = (dynamic $x, dynamic $t) ==> {
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
      $union->contents = (dynamic $t1, dynamic $match) ==> {
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
              $N_ = $union->contents($r1, $r2__0);
              return $join->contents($union->contents($l1, $l2__0), $v1, $N_);
            }
            if (1 === $h1) {return $add->contents($v1, $match);}
            $match__1 = $split->contents($v2, $t1);
            $r1__0 = $match__1[3];
            $l1__0 = $match__1[1];
            $O_ = $union->contents($r1__0, $r2);
            return $join->contents($union->contents($l1__0, $l2), $v2, $O_);
          }
          return $t1;
        }
        return $match;
      };
      $inter->contents = (dynamic $s1, dynamic $match) ==> {
        if ($s1) {
          if ($match) {
            $r1 = $s1[3];
            $v1 = $s1[2];
            $l1 = $s1[1];
            $J_ = $split->contents($v1, $match);
            $K_ = $J_[1];
            if (0 === $J_[2]) {
              $r2 = $J_[3];
              $L_ = $inter->contents($r1, $r2);
              return $concat($inter->contents($l1, $K_), $L_);
            }
            $r2__0 = $J_[3];
            $M_ = $inter->contents($r1, $r2__0);
            return $join->contents($inter->contents($l1, $K_), $v1, $M_);
          }
          return 0;
        }
        return 0;
      };
      $diff->contents = (dynamic $t1, dynamic $match) ==> {
        if ($t1) {
          if ($match) {
            $r1 = $t1[3];
            $v1 = $t1[2];
            $l1 = $t1[1];
            $F_ = $split->contents($v1, $match);
            $G_ = $F_[1];
            if (0 === $F_[2]) {
              $r2 = $F_[3];
              $H_ = $diff->contents($r1, $r2);
              return $join->contents($diff->contents($l1, $G_), $v1, $H_);
            }
            $r2__0 = $F_[3];
            $I_ = $diff->contents($r1, $r2__0);
            return $concat($diff->contents($l1, $G_), $I_);
          }
          return $t1;
        }
        return 0;
      };
      $cons_enum = (dynamic $s, dynamic $e) ==> {
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
      $compare_aux = (dynamic $e1, dynamic $e2) ==> {
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
      $compare = (dynamic $s1, dynamic $s2) ==> {
        $E_ = $cons_enum($s2, 0);
        return $compare_aux($cons_enum($s1, 0), $E_);
      };
      $equal = (dynamic $s1, dynamic $s2) ==> {
        return 0 === $compare($s1, $s2) ? 1 : (0);
      };
      $subset->contents = (dynamic $s1, dynamic $s2) ==> {
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
                $B_ = $subset->contents($l1, $l2);
                if ($B_) {$s1__0 = $r1;$s2__0 = $r2;continue;}
                return $B_;
              }
              if (0 <= $c) {
                $C_ = $subset->contents(Vector{0, 0, $v1, $r1, 0}, $r2);
                if ($C_) {$s1__0 = $l1;continue;}
                return $C_;
              }
              $D_ = $subset->contents(Vector{0, $l1, $v1, 0, 0}, $l2);
              if ($D_) {$s1__0 = $r1;continue;}
              return $D_;
            }
            return 0;
          }
          return 1;
        }
      };
      $iter->contents = (dynamic $f, dynamic $param) ==> {
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
      $fold->contents = (dynamic $f, dynamic $s, dynamic $accu) ==> {
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
      $for_all->contents = (dynamic $p, dynamic $param) ==> {
        $param__0 = $param;
        for (;;) {
          if ($param__0) {
            $r = $param__0[3];
            $v = $param__0[2];
            $l = $param__0[1];
            $y_ = $call1($p, $v);
            if ($y_) {
              $z_ = $for_all->contents($p, $l);
              if ($z_) {$param__0 = $r;continue;}
              $A_ = $z_;
            }
            else {$A_ = $y_;}
            return $A_;
          }
          return 1;
        }
      };
      $exists->contents = (dynamic $p, dynamic $param) ==> {
        $param__0 = $param;
        for (;;) {
          if ($param__0) {
            $r = $param__0[3];
            $v = $param__0[2];
            $l = $param__0[1];
            $v_ = $call1($p, $v);
            if ($v_) {
              $w_ = $v_;
            }
            else {
              $x_ = $exists->contents($p, $l);
              if (! $x_) {$param__0 = $r;continue;}
              $w_ = $x_;
            }
            return $w_;
          }
          return 0;
        }
      };
      $filter->contents = (dynamic $p, dynamic $t) ==> {
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
      $partition->contents = (dynamic $p, dynamic $param) ==> {
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
            $t_ = $concat($lf, $rf);
            return Vector{0, $join->contents($lt, $v, $rt), $t_};
          }
          $u_ = $join->contents($lf, $v, $rf);
          return Vector{0, $concat($lt, $rt), $u_};
        }
        return $b_;
      };
      $cardinal->contents = (dynamic $param) ==> {
        if ($param) {
          $r = $param[3];
          $l = $param[1];
          $s_ = $cardinal->contents($r);
          return (int) ((int) ($cardinal->contents($l) + 1) + $s_);
        }
        return 0;
      };
      $elements_aux->contents = (dynamic $accu, dynamic $param) ==> {
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
      $elements = (dynamic $s) ==> {return $elements_aux->contents(0, $s);};
      $find = (dynamic $x, dynamic $param) ==> {
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
          throw $caml_wrap_thrown_exception($Not_found) as \Throwable;
        }
      };
      $find_first_aux = (dynamic $v0, dynamic $f, dynamic $param) ==> {
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
      $find_first = (dynamic $f, dynamic $param) ==> {
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
          throw $caml_wrap_thrown_exception($Not_found) as \Throwable;
        }
      };
      $find_first_opt_aux = (dynamic $v0, dynamic $f, dynamic $param) ==> {
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
      $find_first_opt = (dynamic $f, dynamic $param) ==> {
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
      $find_last_aux = (dynamic $v0, dynamic $f, dynamic $param) ==> {
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
      $find_last = (dynamic $f, dynamic $param) ==> {
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
          throw $caml_wrap_thrown_exception($Not_found) as \Throwable;
        }
      };
      $find_last_opt_aux = (dynamic $v0, dynamic $f, dynamic $param) ==> {
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
      $find_last_opt = (dynamic $f, dynamic $param) ==> {
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
      $find_opt = (dynamic $x, dynamic $param) ==> {
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
      $try_join = (dynamic $l, dynamic $v, dynamic $r) ==> {
        if (0 === $l) {
          $switch__0 = 0 as dynamic;
        }
        else {
          $r_ = $max_elt($l);
          $switch__0 = 0 <= $call2($Ord[1], $r_, $v) ? 1 : (0);
        }
        if (! $switch__0) {
          if (0 === $r) {
            $switch__1 = 0 as dynamic;
          }
          else {
            $q_ = $min_elt($r);
            $switch__1 = 0 <= $call2($Ord[1], $v, $q_) ? 1 : (0);
          }
          if (! $switch__1) {return $join->contents($l, $v, $r);}
        }
        return $union->contents($l, $add->contents($v, $r));
      };
      $map->contents = (dynamic $f, dynamic $t) ==> {
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
      $of_sorted_list = (dynamic $l) ==> {
        $sub = new Ref();
        $sub->contents = (dynamic $n, dynamic $l) ==> {
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
                  $n_ = $l[2];
                  if ($n_) {
                    $l__4 = $n_[2];
                    $x1 = $n_[1];
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
                  $o_ = $l[2];
                  if ($o_) {
                    $p_ = $o_[2];
                    if ($p_) {
                      $l__5 = $p_[2];
                      $x2 = $p_[1];
                      $x1__0 = $o_[1];
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
        return $sub->contents($call1($List[1], $l), $l)[1];
      };
      $of_list = (dynamic $l) ==> {
        if ($l) {
          $f_ = $l[2];
          $g_ = $l[1];
          if ($f_) {
            $h_ = $f_[2];
            $i_ = $f_[1];
            if ($h_) {
              $j_ = $h_[2];
              $k_ = $h_[1];
              if ($j_) {
                $l_ = $j_[2];
                $m_ = $j_[1];
                if ($l_) {
                  if ($l_[2]) {
                    return $of_sorted_list($call2($List[51], $Ord[1], $l));
                  }
                  $x4 = $l_[1];
                  return $add->contents(
                    $x4,
                    $add->contents(
                      $m_,
                      $add->contents($k_, $add->contents($i_, $singleton($g_)))
                    )
                  );
                }
                return $add->contents(
                  $m_,
                  $add->contents($k_, $add->contents($i_, $singleton($g_)))
                );
              }
              return $add->contents($k_, $add->contents($i_, $singleton($g_)));
            }
            return $add->contents($i_, $singleton($g_));
          }
          return $singleton($g_);
        }
        return $empty;
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
        $of_list
      };
    };
    $Set = Vector{
      0,
      (dynamic $d_) ==> {
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
          $e_[23],
          $e_[26],
          $e_[27],
          $e_[28],
          $e_[29],
          $e_[51],
          $e_[30],
          $e_[31],
          $e_[32],
          $e_[33],
          $e_[34],
          $e_[35],
          $e_[37],
          $e_[9],
          $e_[10],
          $e_[11],
          $e_[12],
          $e_[38],
          $e_[39],
          $e_[16],
          $e_[40],
          $e_[49],
          $e_[42],
          $e_[44],
          $e_[46],
          $e_[48],
          $e_[53]
        };
      }
    } as dynamic;
    
     return ($Set);

  }

}
/* Hashing disabled */
