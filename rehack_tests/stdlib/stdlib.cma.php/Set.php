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
    $joo_global_object = \Rehack\GlobalObject::get() as dynamic;
    
    $runtime = $joo_global_object->jsoo_runtime;
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
    $Set = Vector{
      0,
      (dynamic $Ord) ==> {
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
          $h = null;
          if ($param) {$h = $param[4];return $h;}
          return 0;
        };
        $create = (dynamic $l, dynamic $v, dynamic $r) ==> {
          $hr = null;
          $h__0 = null;
          $hl = null;
          $h = null;
          if ($l) {
            $h = $l[4];
            $hl = $h;
          }
          else {$hl = 0;}
          if ($r) {
            $h__0 = $r[4];
            $hr = $h__0;
          }
          else {$hr = 0;}
          $ab_ = $hr <= $hl ? (int) ($hl + 1) : ((int) ($hr + 1));
          return Vector{0, $l, $v, $r, $ab_};
        };
        $bal = (dynamic $l, dynamic $v, dynamic $r) ==> {
          $Z_ = null;
          $rll = null;
          $rlv = null;
          $rlr = null;
          $Y_ = null;
          $rl = null;
          $rv = null;
          $rr = null;
          $X_ = null;
          $lrl = null;
          $lrv = null;
          $lrr = null;
          $W_ = null;
          $ll = null;
          $lv = null;
          $lr = null;
          $hr = null;
          $h__0 = null;
          $hl = null;
          $h = null;
          if ($l) {
            $h = $l[4];
            $hl = $h;
          }
          else {$hl = 0;}
          if ($r) {
            $h__0 = $r[4];
            $hr = $h__0;
          }
          else {$hr = 0;}
          if ((int) ($hr + 2) < $hl) {
            if ($l) {
              $lr = $l[3];
              $lv = $l[2];
              $ll = $l[1];
              $W_ = $height($lr);
              if ($W_ <= $height($ll)) {
                return $create($ll, $lv, $create($lr, $v, $r));
              }
              if ($lr) {
                $lrr = $lr[3];
                $lrv = $lr[2];
                $lrl = $lr[1];
                $X_ = $create($lrr, $v, $r);
                return $create($create($ll, $lv, $lrl), $lrv, $X_);
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
              $Y_ = $height($rl);
              if ($Y_ <= $height($rr)) {
                return $create($create($l, $v, $rl), $rv, $rr);
              }
              if ($rl) {
                $rlr = $rl[3];
                $rlv = $rl[2];
                $rll = $rl[1];
                $Z_ = $create($rlr, $rv, $rr);
                return $create($create($l, $v, $rll), $rlv, $Z_);
              }
              return $call1($Pervasives[1], $cst_Set_bal__1);
            }
            return $call1($Pervasives[1], $cst_Set_bal__2);
          }
          $aa_ = $hr <= $hl ? (int) ($hl + 1) : ((int) ($hr + 1));
          return Vector{0, $l, $v, $r, $aa_};
        };
        $add->contents = (dynamic $x, dynamic $t) ==> {
          $ll = null;
          $rr = null;
          $c = null;
          $l = null;
          $v = null;
          $r = null;
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
          $l = null;
          $v = null;
          $r = null;
          if ($param) {
            $r = $param[3];
            $v = $param[2];
            $l = $param[1];
            return $bal($add_min_element->contents($x, $l), $v, $r);
          }
          return $singleton($x);
        };
        $add_max_element->contents = (dynamic $x, dynamic $param) ==> {
          $l = null;
          $v = null;
          $r = null;
          if ($param) {
            $r = $param[3];
            $v = $param[2];
            $l = $param[1];
            return $bal($l, $v, $add_max_element->contents($x, $r));
          }
          return $singleton($x);
        };
        $join->contents = (dynamic $l, dynamic $v, dynamic $r) ==> {
          $ll = null;
          $lv = null;
          $lr = null;
          $lh = null;
          $rl = null;
          $rv = null;
          $rr = null;
          $rh = null;
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
          $V_ = null;
          $v = null;
          $param__0 = $param;
          for (;;) {
            if ($param__0) {
              $V_ = $param__0[1];
              if ($V_) {$param__0 = $V_;continue;}
              $v = $param__0[2];
              return $v;
            }
            throw $caml_wrap_thrown_exception($Not_found) as \Throwable;
          }
        };
        $min_elt_opt = (dynamic $param) ==> {
          $U_ = null;
          $v = null;
          $param__0 = $param;
          for (;;) {
            if ($param__0) {
              $U_ = $param__0[1];
              if ($U_) {$param__0 = $U_;continue;}
              $v = $param__0[2];
              return Vector{0, $v};
            }
            return 0;
          }
        };
        $max_elt = (dynamic $param) ==> {
          $S_ = null;
          $T_ = null;
          $param__0 = $param;
          for (;;) {
            if ($param__0) {
              $S_ = $param__0[3];
              $T_ = $param__0[2];
              if ($S_) {$param__0 = $S_;continue;}
              return $T_;
            }
            throw $caml_wrap_thrown_exception($Not_found) as \Throwable;
          }
        };
        $max_elt_opt = (dynamic $param) ==> {
          $Q_ = null;
          $R_ = null;
          $param__0 = $param;
          for (;;) {
            if ($param__0) {
              $Q_ = $param__0[3];
              $R_ = $param__0[2];
              if ($Q_) {$param__0 = $Q_;continue;}
              return Vector{0, $R_};
            }
            return 0;
          }
        };
        $remove_min_elt->contents = (dynamic $param) ==> {
          $r__0 = null;
          $v = null;
          $r = null;
          $P_ = null;
          if ($param) {
            $P_ = $param[1];
            if ($P_) {
              $r = $param[3];
              $v = $param[2];
              return $bal($remove_min_elt->contents($P_), $v, $r);
            }
            $r__0 = $param[3];
            return $r__0;
          }
          return $call1($Pervasives[1], $cst_Set_remove_min_elt);
        };
        $concat = (dynamic $t, dynamic $match) ==> {
          $O_ = null;
          if ($t) {
            if ($match) {
              $O_ = $remove_min_elt->contents($match);
              return $join->contents($t, $min_elt($match), $O_);
            }
            return $t;
          }
          return $match;
        };
        $split->contents = (dynamic $x, dynamic $param) ==> {
          $ll = null;
          $pres__0 = null;
          $rl = null;
          $match__0 = null;
          $lr = null;
          $pres = null;
          $rr = null;
          $match = null;
          $c = null;
          $l = null;
          $v = null;
          $r = null;
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
        $empty = 0;
        $is_empty = (dynamic $param) ==> {return $param ? 0 : (1);};
        $mem = (dynamic $x, dynamic $param) ==> {
          $r = null;
          $v = null;
          $l = null;
          $c = null;
          $N_ = null;
          $param__1 = null;
          $param__0 = $param;
          for (;;) {
            if ($param__0) {
              $r = $param__0[3];
              $v = $param__0[2];
              $l = $param__0[1];
              $c = $call2($Ord[1], $x, $v);
              $N_ = 0 === $c ? 1 : (0);
              if ($N_) {return $N_;}
              $param__1 = 0 <= $c ? $r : ($l);
              $param__0 = $param__1;
              continue;
            }
            return 0;
          }
        };
        $remove->contents = (dynamic $x, dynamic $t) ==> {
          $ll = null;
          $rr = null;
          $c = null;
          $l = null;
          $v = null;
          $r = null;
          $M_ = null;
          if ($t) {
            $r = $t[3];
            $v = $t[2];
            $l = $t[1];
            $c = $call2($Ord[1], $x, $v);
            if (0 === $c) {
              if ($l) {
                if ($r) {
                  $M_ = $remove_min_elt->contents($r);
                  return $bal($l, $min_elt($r), $M_);
                }
                return $l;
              }
              return $r;
            }
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
          $L_ = null;
          $l1__0 = null;
          $r1__0 = null;
          $match__1 = null;
          $K_ = null;
          $l2__0 = null;
          $r2__0 = null;
          $match__0 = null;
          $l1 = null;
          $v1 = null;
          $r1 = null;
          $h1 = null;
          $l2 = null;
          $v2 = null;
          $r2 = null;
          $h2 = null;
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
                $K_ = $union->contents($r1, $r2__0);
                return $join->contents($union->contents($l1, $l2__0), $v1, $K_
                );
              }
              if (1 === $h1) {return $add->contents($v1, $match);}
              $match__1 = $split->contents($v2, $t1);
              $r1__0 = $match__1[3];
              $l1__0 = $match__1[1];
              $L_ = $union->contents($r1__0, $r2);
              return $join->contents($union->contents($l1__0, $l2), $v2, $L_);
            }
            return $t1;
          }
          return $match;
        };
        $inter->contents = (dynamic $s1, dynamic $match) ==> {
          $J_ = null;
          $r2__0 = null;
          $I_ = null;
          $r2 = null;
          $H_ = null;
          $G_ = null;
          $l1 = null;
          $v1 = null;
          $r1 = null;
          if ($s1) {
            if ($match) {
              $r1 = $s1[3];
              $v1 = $s1[2];
              $l1 = $s1[1];
              $G_ = $split->contents($v1, $match);
              $H_ = $G_[1];
              if (0 === $G_[2]) {
                $r2 = $G_[3];
                $I_ = $inter->contents($r1, $r2);
                return $concat($inter->contents($l1, $H_), $I_);
              }
              $r2__0 = $G_[3];
              $J_ = $inter->contents($r1, $r2__0);
              return $join->contents($inter->contents($l1, $H_), $v1, $J_);
            }
            return 0;
          }
          return 0;
        };
        $diff->contents = (dynamic $t1, dynamic $match) ==> {
          $F_ = null;
          $r2__0 = null;
          $E_ = null;
          $r2 = null;
          $D_ = null;
          $C_ = null;
          $l1 = null;
          $v1 = null;
          $r1 = null;
          if ($t1) {
            if ($match) {
              $r1 = $t1[3];
              $v1 = $t1[2];
              $l1 = $t1[1];
              $C_ = $split->contents($v1, $match);
              $D_ = $C_[1];
              if (0 === $C_[2]) {
                $r2 = $C_[3];
                $E_ = $diff->contents($r1, $r2);
                return $join->contents($diff->contents($l1, $D_), $v1, $E_);
              }
              $r2__0 = $C_[3];
              $F_ = $diff->contents($r1, $r2__0);
              return $concat($diff->contents($l1, $D_), $F_);
            }
            return $t1;
          }
          return 0;
        };
        $cons_enum = (dynamic $s, dynamic $e) ==> {
          $r = null;
          $v = null;
          $s__1 = null;
          $e__1 = null;
          $s__0 = $s;
          $e__0 = $e;
          for (;;) {
            if ($s__0) {
              $r = $s__0[3];
              $v = $s__0[2];
              $s__1 = $s__0[1];
              $e__1 = Vector{0, $v, $r, $e__0};
              $s__0 = $s__1;
              $e__0 = $e__1;
              continue;
            }
            return $e__0;
          }
        };
        $compare = (dynamic $s1, dynamic $s2) ==> {
          $e2__0 = null;
          $r2 = null;
          $v2 = null;
          $e1__0 = null;
          $r1 = null;
          $v1 = null;
          $c = null;
          $e2__1 = null;
          $e1__1 = null;
          $e2__2 = $cons_enum($s2, 0);
          $e1__2 = $cons_enum($s1, 0);
          $e1 = $e1__2;
          $e2 = $e2__2;
          for (;;) {
            if ($e1) {
              if ($e2) {
                $e2__0 = $e2[3];
                $r2 = $e2[2];
                $v2 = $e2[1];
                $e1__0 = $e1[3];
                $r1 = $e1[2];
                $v1 = $e1[1];
                $c = $call2($Ord[1], $v1, $v2);
                if (0 === $c) {
                  $e2__1 = $cons_enum($r2, $e2__0);
                  $e1__1 = $cons_enum($r1, $e1__0);
                  $e1 = $e1__1;
                  $e2 = $e2__1;
                  continue;
                }
                return $c;
              }
              return 1;
            }
            return $e2 ? -1 : (0);
          }
        };
        $equal = (dynamic $s1, dynamic $s2) ==> {
          return 0 === $compare($s1, $s2) ? 1 : (0);
        };
        $subset->contents = (dynamic $s1, dynamic $s2) ==> {
          $r2 = null;
          $v2 = null;
          $l2 = null;
          $r1 = null;
          $v1 = null;
          $l1 = null;
          $c = null;
          $z_ = null;
          $A_ = null;
          $B_ = null;
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
                  $z_ = $subset->contents($l1, $l2);
                  if ($z_) {$s1__0 = $r1;$s2__0 = $r2;continue;}
                  return $z_;
                }
                if (0 <= $c) {
                  $A_ = $subset->contents(Vector{0, 0, $v1, $r1, 0}, $r2);
                  if ($A_) {$s1__0 = $l1;continue;}
                  return $A_;
                }
                $B_ = $subset->contents(Vector{0, $l1, $v1, 0, 0}, $l2);
                if ($B_) {$s1__0 = $r1;continue;}
                return $B_;
              }
              return 0;
            }
            return 1;
          }
        };
        $iter->contents = (dynamic $f, dynamic $param) ==> {
          $param__1 = null;
          $v = null;
          $l = null;
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
          $s__1 = null;
          $v = null;
          $l = null;
          $accu__1 = null;
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
          $r = null;
          $v = null;
          $l = null;
          $w_ = null;
          $x_ = null;
          $y_ = null;
          $param__0 = $param;
          for (;;) {
            if ($param__0) {
              $r = $param__0[3];
              $v = $param__0[2];
              $l = $param__0[1];
              $w_ = $call1($p, $v);
              if ($w_) {
                $x_ = $for_all->contents($p, $l);
                if ($x_) {$param__0 = $r;continue;}
                $y_ = $x_;
              }
              else {$y_ = $w_;}
              return $y_;
            }
            return 1;
          }
        };
        $exists->contents = (dynamic $p, dynamic $param) ==> {
          $r = null;
          $v = null;
          $l = null;
          $t_ = null;
          $u_ = null;
          $v_ = null;
          $param__0 = $param;
          for (;;) {
            if ($param__0) {
              $r = $param__0[3];
              $v = $param__0[2];
              $l = $param__0[1];
              $t_ = $call1($p, $v);
              if ($t_) {
                $u_ = $t_;
              }
              else {
                $v_ = $exists->contents($p, $l);
                if (! $v_) {$param__0 = $r;continue;}
                $u_ = $v_;
              }
              return $u_;
            }
            return 0;
          }
        };
        $filter->contents = (dynamic $p, dynamic $t) ==> {
          $r__0 = null;
          $pv = null;
          $l__0 = null;
          $l = null;
          $v = null;
          $r = null;
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
          $s_ = null;
          $r_ = null;
          $rt = null;
          $rf = null;
          $match__0 = null;
          $pv = null;
          $lt = null;
          $lf = null;
          $match = null;
          $l = null;
          $v = null;
          $r = null;
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
              $r_ = $concat($lf, $rf);
              return Vector{0, $join->contents($lt, $v, $rt), $r_};
            }
            $s_ = $join->contents($lf, $v, $rf);
            return Vector{0, $concat($lt, $rt), $s_};
          }
          return $b_;
        };
        $cardinal->contents = (dynamic $param) ==> {
          $q_ = null;
          $l = null;
          $r = null;
          if ($param) {
            $r = $param[3];
            $l = $param[1];
            $q_ = $cardinal->contents($r);
            return (int) ((int) ($cardinal->contents($l) + 1) + $q_);
          }
          return 0;
        };
        $elements_aux->contents = (dynamic $accu, dynamic $param) ==> {
          $r = null;
          $v = null;
          $param__1 = null;
          $accu__1 = null;
          $accu__0 = $accu;
          $param__0 = $param;
          for (;;) {
            if ($param__0) {
              $r = $param__0[3];
              $v = $param__0[2];
              $param__1 = $param__0[1];
              $accu__1 = Vector{0, $v, $elements_aux->contents($accu__0, $r)};
              $accu__0 = $accu__1;
              $param__0 = $param__1;
              continue;
            }
            return $accu__0;
          }
        };
        $elements = (dynamic $s) ==> {return $elements_aux->contents(0, $s);};
        $find = (dynamic $x, dynamic $param) ==> {
          $r = null;
          $v = null;
          $l = null;
          $c = null;
          $param__1 = null;
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
        $find_first = (dynamic $f, dynamic $param__0) ==> {
          $param = null;
          $v0 = null;
          $r = null;
          $v = null;
          $l = null;
          $r__0 = null;
          $v__0 = null;
          $l__0 = null;
          $param__1 = $param__0;
          for (;;) {
            if ($param__1) {
              $r__0 = $param__1[3];
              $v__0 = $param__1[2];
              $l__0 = $param__1[1];
              if ($call1($f, $v__0)) {
                $v0 = $v__0;
                $param = $l__0;
                for (;;) {
                  if ($param) {
                    $r = $param[3];
                    $v = $param[2];
                    $l = $param[1];
                    if ($call1($f, $v)) {$v0 = $v;$param = $l;continue;}
                    $param = $r;
                    continue;
                  }
                  return $v0;
                }
              }
              $param__1 = $r__0;
              continue;
            }
            throw $caml_wrap_thrown_exception($Not_found) as \Throwable;
          }
        };
        $find_first_opt = (dynamic $f, dynamic $param__0) ==> {
          $param = null;
          $v0 = null;
          $r = null;
          $v = null;
          $l = null;
          $r__0 = null;
          $v__0 = null;
          $l__0 = null;
          $param__1 = $param__0;
          for (;;) {
            if ($param__1) {
              $r__0 = $param__1[3];
              $v__0 = $param__1[2];
              $l__0 = $param__1[1];
              if ($call1($f, $v__0)) {
                $v0 = $v__0;
                $param = $l__0;
                for (;;) {
                  if ($param) {
                    $r = $param[3];
                    $v = $param[2];
                    $l = $param[1];
                    if ($call1($f, $v)) {$v0 = $v;$param = $l;continue;}
                    $param = $r;
                    continue;
                  }
                  return Vector{0, $v0};
                }
              }
              $param__1 = $r__0;
              continue;
            }
            return 0;
          }
        };
        $find_last = (dynamic $f, dynamic $param__0) ==> {
          $param = null;
          $v0 = null;
          $r = null;
          $v = null;
          $l = null;
          $r__0 = null;
          $v__0 = null;
          $l__0 = null;
          $param__1 = $param__0;
          for (;;) {
            if ($param__1) {
              $r__0 = $param__1[3];
              $v__0 = $param__1[2];
              $l__0 = $param__1[1];
              if ($call1($f, $v__0)) {
                $v0 = $v__0;
                $param = $r__0;
                for (;;) {
                  if ($param) {
                    $r = $param[3];
                    $v = $param[2];
                    $l = $param[1];
                    if ($call1($f, $v)) {$v0 = $v;$param = $r;continue;}
                    $param = $l;
                    continue;
                  }
                  return $v0;
                }
              }
              $param__1 = $l__0;
              continue;
            }
            throw $caml_wrap_thrown_exception($Not_found) as \Throwable;
          }
        };
        $find_last_opt = (dynamic $f, dynamic $param__0) ==> {
          $param = null;
          $v0 = null;
          $r = null;
          $v = null;
          $l = null;
          $r__0 = null;
          $v__0 = null;
          $l__0 = null;
          $param__1 = $param__0;
          for (;;) {
            if ($param__1) {
              $r__0 = $param__1[3];
              $v__0 = $param__1[2];
              $l__0 = $param__1[1];
              if ($call1($f, $v__0)) {
                $v0 = $v__0;
                $param = $r__0;
                for (;;) {
                  if ($param) {
                    $r = $param[3];
                    $v = $param[2];
                    $l = $param[1];
                    if ($call1($f, $v)) {$v0 = $v;$param = $r;continue;}
                    $param = $l;
                    continue;
                  }
                  return Vector{0, $v0};
                }
              }
              $param__1 = $l__0;
              continue;
            }
            return 0;
          }
        };
        $find_opt = (dynamic $x, dynamic $param) ==> {
          $r = null;
          $v = null;
          $l = null;
          $c = null;
          $param__1 = null;
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
        $map->contents = (dynamic $f, dynamic $t) ==> {
          $switch__1 = null;
          $switch__0 = null;
          $r__0 = null;
          $v__0 = null;
          $l__0 = null;
          $l = null;
          $v = null;
          $r = null;
          $p_ = null;
          $o_ = null;
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
            if (0 === $l__0) {$switch__0 = 0;}
            else {
              $p_ = $max_elt($l__0);
              $switch__0 = 0 <= $call2($Ord[1], $p_, $v__0) ? 1 : (0);
            }
            if (! $switch__0) {
              if (0 === $r__0) {$switch__1 = 0;}
              else {
                $o_ = $min_elt($r__0);
                $switch__1 = 0 <= $call2($Ord[1], $v__0, $o_) ? 1 : (0);
              }
              if (! $switch__1) {return $join->contents($l__0, $v__0, $r__0);}
            }
            return $union->contents($l__0, $add->contents($v__0, $r__0));
          }
          return 0;
        };
        $of_list = (dynamic $l) ==> {
          $x4 = null;
          $l__0 = null;
          $k_ = null;
          $j_ = null;
          $i_ = null;
          $h_ = null;
          $g_ = null;
          $f_ = null;
          $e_ = null;
          $d_ = null;
          $sub = null;
          if ($l) {
            $d_ = $l[2];
            $e_ = $l[1];
            if ($d_) {
              $f_ = $d_[2];
              $g_ = $d_[1];
              if ($f_) {
                $h_ = $f_[2];
                $i_ = $f_[1];
                if ($h_) {
                  $j_ = $h_[2];
                  $k_ = $h_[1];
                  if ($j_) {
                    if ($j_[2]) {
                      $l__0 = $call2($List[51], $Ord[1], $l);
                      $sub =
                        (dynamic $n, dynamic $l) ==> {
                          $x0__1 = null;
                          $x1__0 = null;
                          $x2 = null;
                          $l__5 = null;
                          $n_ = null;
                          $m_ = null;
                          $x0__0 = null;
                          $x1 = null;
                          $l__4 = null;
                          $l_ = null;
                          $x0 = null;
                          $l__3 = null;
                          $right = null;
                          $l__2 = null;
                          $match__0 = null;
                          $mid = null;
                          $l__1 = null;
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
                                  $l_ = $l[2];
                                  if ($l_) {
                                    $l__4 = $l_[2];
                                    $x1 = $l_[1];
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
                                  $m_ = $l[2];
                                  if ($m_) {
                                    $n_ = $m_[2];
                                    if ($n_) {
                                      $l__5 = $n_[2];
                                      $x2 = $n_[1];
                                      $x1__0 = $m_[1];
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
                          $nl = (int) ($n / 2);
                          $match = $sub($nl, $l);
                          $l__0 = $match[2];
                          $left = $match[1];
                          if ($l__0) {
                            $l__1 = $l__0[2];
                            $mid = $l__0[1];
                            $match__0 = $sub((int) ((int) ($n - $nl) + -1), $l__1);
                            $l__2 = $match__0[2];
                            $right = $match__0[1];
                            return Vector{0, $create($left, $mid, $right), $l__2};
                          }
                          throw $caml_wrap_thrown_exception(
                                  Vector{0, $Assert_failure, $c_}
                                ) as \Throwable;
                        };
                      return $sub($call1($List[1], $l__0), $l__0)[1];
                    }
                    $x4 = $j_[1];
                    return $add->contents(
                      $x4,
                      $add->contents(
                        $k_,
                        $add->contents($i_, $add->contents($g_, $singleton($e_)))
                      )
                    );
                  }
                  return $add->contents(
                    $k_,
                    $add->contents($i_, $add->contents($g_, $singleton($e_)))
                  );
                }
                return $add->contents(
                  $i_,
                  $add->contents($g_, $singleton($e_))
                );
              }
              return $add->contents($g_, $singleton($e_));
            }
            return $singleton($e_);
          }
          return $empty;
        };
        return Vector{
          0,
          $empty,
          $is_empty,
          $mem,
          $add->contents,
          $singleton,
          $remove->contents,
          $union->contents,
          $inter->contents,
          $diff->contents,
          $compare,
          $equal,
          $subset->contents,
          $iter->contents,
          $map->contents,
          $fold->contents,
          $for_all->contents,
          $exists->contents,
          $filter->contents,
          $partition->contents,
          $cardinal->contents,
          $elements,
          $min_elt,
          $min_elt_opt,
          $max_elt,
          $max_elt_opt,
          $min_elt,
          $min_elt_opt,
          $split->contents,
          $find,
          $find_opt,
          $find_first,
          $find_first_opt,
          $find_last,
          $find_last_opt,
          $of_list
        };
      }
    } as dynamic;
    
     return ($Set);

  }

}
/* Hashing disabled */
