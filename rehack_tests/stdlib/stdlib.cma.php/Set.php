<?hh
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * Set.php
 */

namespace Rehack;

final class Set {
  <<__Memoize>>
  public static function get() {
    $global_object = \Rehack\GlobalObject::get();
    $runtime = \Rehack\Runtime::get();
    /*
     * Soon, these will replace the `global_data->ModuleName`
     * pattern in the load() function.
     */
    $List_ = List_::get();
    $Pervasives = Pervasives::get();
    $Not_found = Not_found::get();
    $Assert_failure = Assert_failure::get();
    Set::load($global_object);
    $memoized = $runtime->caml_get_global_data()->Set;
    return $memoized;
  }

  /**
   * Performs module load operation. May have side effects.
   */
  private static function load($joo_global_object) {
    

    $runtime = $joo_global_object->jsoo_runtime;
    $call1 = $runtime["caml_call1"];
    $call2 = $runtime["caml_call2"];
    $string = $runtime["caml_new_string"];
    $unsigned_right_shift_32 = $runtime["unsigned_right_shift_32"];
    $global_data = $runtime["caml_get_global_data"]();
    $cst_Set_remove_min_elt = $string("Set.remove_min_elt");
    $cst_Set_bal = $string("Set.bal");
    $cst_Set_bal__0 = $string("Set.bal");
    $cst_Set_bal__1 = $string("Set.bal");
    $cst_Set_bal__2 = $string("Set.bal");
    $Not_found = $global_data["Not_found"];
    $Pervasives = $global_data["Pervasives"];
    $List = $global_data["List_"];
    $Assert_failure = $global_data["Assert_failure"];
    $a = Vector{0, 0, 0, 0};
    $b = Vector{0, 0, 0};
    $c = Vector{0, $string("set.ml"), 510, 18};
    $Make = function(dynamic $Ord) use ($Assert_failure,$List,$Not_found,$Pervasives,$a,$b,$c,$call1,$call2,$cst_Set_bal,$cst_Set_bal__0,$cst_Set_bal__1,$cst_Set_bal__2,$cst_Set_remove_min_elt,$runtime,$unsigned_right_shift_32) {
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
      $height = function(dynamic $param) {
        if ($param) {$h = $param[4];return $h;}
        return 0;
      };
      $create = function(dynamic $l, dynamic $v, dynamic $r) {
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
        $ae = $hr <= $hl ? (int) ($hl + 1) : ((int) ($hr + 1));
        return Vector{0, $l, $v, $r, $ae};
      };
      $bal = function(dynamic $l, dynamic $v, dynamic $r) use ($Pervasives,$call1,$create,$cst_Set_bal,$cst_Set_bal__0,$cst_Set_bal__1,$cst_Set_bal__2,$height) {
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
            $Z = $height($lr);
            if ($Z <= $height($ll)) {
              return $create($ll, $lv, $create($lr, $v, $r));
            }
            if ($lr) {
              $lrr = $lr[3];
              $lrv = $lr[2];
              $lrl = $lr[1];
              $aa = $create($lrr, $v, $r);
              return $create($create($ll, $lv, $lrl), $lrv, $aa);
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
            $ab = $height($rl);
            if ($ab <= $height($rr)) {
              return $create($create($l, $v, $rl), $rv, $rr);
            }
            if ($rl) {
              $rlr = $rl[3];
              $rlv = $rl[2];
              $rll = $rl[1];
              $ac = $create($rlr, $rv, $rr);
              return $create($create($l, $v, $rll), $rlv, $ac);
            }
            return $call1($Pervasives[1], $cst_Set_bal__1);
          }
          return $call1($Pervasives[1], $cst_Set_bal__2);
        }
        $ad = $hr <= $hl ? (int) ($hl + 1) : ((int) ($hr + 1));
        return Vector{0, $l, $v, $r, $ad};
      };
      $add->contents = function(dynamic $x, dynamic $t) use ($Ord,$add,$bal,$call2) {
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
      $singleton = function(dynamic $x) {return Vector{0, 0, $x, 0, 1};};
      $add_min_element->contents = function(dynamic $x, dynamic $param) use ($add_min_element,$bal,$singleton) {
        if ($param) {
          $r = $param[3];
          $v = $param[2];
          $l = $param[1];
          return $bal($add_min_element->contents($x, $l), $v, $r);
        }
        return $singleton($x);
      };
      $add_max_element->contents = function(dynamic $x, dynamic $param) use ($add_max_element,$bal,$singleton) {
        if ($param) {
          $r = $param[3];
          $v = $param[2];
          $l = $param[1];
          return $bal($l, $v, $add_max_element->contents($x, $r));
        }
        return $singleton($x);
      };
      $join->contents = function(dynamic $l, dynamic $v, dynamic $r) use ($add_max_element,$add_min_element,$bal,$create,$join) {
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
      $min_elt = function(dynamic $param) use ($Not_found,$runtime) {
        $param__0 = $param;
        for (;;) {
          if ($param__0) {
            $Y = $param__0[1];
            if ($Y) {$param__0 = $Y;continue;}
            $v = $param__0[2];
            return $v;
          }
          throw $runtime["caml_wrap_thrown_exception"]($Not_found) as \Throwable;
        }
      };
      $min_elt_opt = function(dynamic $param) {
        $param__0 = $param;
        for (;;) {
          if ($param__0) {
            $X = $param__0[1];
            if ($X) {$param__0 = $X;continue;}
            $v = $param__0[2];
            return Vector{0, $v};
          }
          return 0;
        }
      };
      $max_elt = function(dynamic $param) use ($Not_found,$runtime) {
        $param__0 = $param;
        for (;;) {
          if ($param__0) {
            $V = $param__0[3];
            $W = $param__0[2];
            if ($V) {$param__0 = $V;continue;}
            return $W;
          }
          throw $runtime["caml_wrap_thrown_exception"]($Not_found) as \Throwable;
        }
      };
      $max_elt_opt = function(dynamic $param) {
        $param__0 = $param;
        for (;;) {
          if ($param__0) {
            $T = $param__0[3];
            $U = $param__0[2];
            if ($T) {$param__0 = $T;continue;}
            return Vector{0, $U};
          }
          return 0;
        }
      };
      $remove_min_elt->contents = function(dynamic $param) use ($Pervasives,$bal,$call1,$cst_Set_remove_min_elt,$remove_min_elt) {
        if ($param) {
          $S = $param[1];
          if ($S) {
            $r = $param[3];
            $v = $param[2];
            return $bal($remove_min_elt->contents($S), $v, $r);
          }
          $r__0 = $param[3];
          return $r__0;
        }
        return $call1($Pervasives[1], $cst_Set_remove_min_elt);
      };
      $merge = function(dynamic $t, dynamic $match) use ($bal,$min_elt,$remove_min_elt) {
        if ($t) {
          if ($match) {
            $R = $remove_min_elt->contents($match);
            return $bal($t, $min_elt($match), $R);
          }
          return $t;
        }
        return $match;
      };
      $concat = function(dynamic $t, dynamic $match) use ($join,$min_elt,$remove_min_elt) {
        if ($t) {
          if ($match) {
            $Q = $remove_min_elt->contents($match);
            return $join->contents($t, $min_elt($match), $Q);
          }
          return $t;
        }
        return $match;
      };
      $split->contents = function(dynamic $x, dynamic $param) use ($Ord,$a,$call2,$join,$split) {
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
        return $a;
      };
      $empty = 0;
      $is_empty = function(dynamic $param) {return $param ? 0 : (1);};
      $mem = function(dynamic $x, dynamic $param) use ($Ord,$call2) {
        $param__0 = $param;
        for (;;) {
          if ($param__0) {
            $r = $param__0[3];
            $v = $param__0[2];
            $l = $param__0[1];
            $c = $call2($Ord[1], $x, $v);
            $P = 0 === $c ? 1 : (0);
            if ($P) {return $P;}
            $param__1 = 0 <= $c ? $r : ($l);
            $param__0 = $param__1;
            continue;
          }
          return 0;
        }
      };
      $remove->contents = function(dynamic $x, dynamic $t) use ($Ord,$bal,$call2,$merge,$remove) {
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
      $union->contents = function(dynamic $t1, dynamic $match) use ($add,$join,$split,$union) {
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
              $N = $union->contents($r1, $r2__0);
              return $join->contents($union->contents($l1, $l2__0), $v1, $N);
            }
            if (1 === $h1) {return $add->contents($v1, $match);}
            $match__1 = $split->contents($v2, $t1);
            $r1__0 = $match__1[3];
            $l1__0 = $match__1[1];
            $O = $union->contents($r1__0, $r2);
            return $join->contents($union->contents($l1__0, $l2), $v2, $O);
          }
          return $t1;
        }
        return $match;
      };
      $inter->contents = function(dynamic $s1, dynamic $match) use ($concat,$inter,$join,$split) {
        if ($s1) {
          if ($match) {
            $r1 = $s1[3];
            $v1 = $s1[2];
            $l1 = $s1[1];
            $J = $split->contents($v1, $match);
            $K = $J[1];
            if (0 === $J[2]) {
              $r2 = $J[3];
              $L = $inter->contents($r1, $r2);
              return $concat($inter->contents($l1, $K), $L);
            }
            $r2__0 = $J[3];
            $M = $inter->contents($r1, $r2__0);
            return $join->contents($inter->contents($l1, $K), $v1, $M);
          }
          return 0;
        }
        return 0;
      };
      $diff->contents = function(dynamic $t1, dynamic $match) use ($concat,$diff,$join,$split) {
        if ($t1) {
          if ($match) {
            $r1 = $t1[3];
            $v1 = $t1[2];
            $l1 = $t1[1];
            $F = $split->contents($v1, $match);
            $G = $F[1];
            if (0 === $F[2]) {
              $r2 = $F[3];
              $H = $diff->contents($r1, $r2);
              return $join->contents($diff->contents($l1, $G), $v1, $H);
            }
            $r2__0 = $F[3];
            $I = $diff->contents($r1, $r2__0);
            return $concat($diff->contents($l1, $G), $I);
          }
          return $t1;
        }
        return 0;
      };
      $cons_enum = function(dynamic $s, dynamic $e) {
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
      $compare_aux = function(dynamic $e1, dynamic $e2) use ($Ord,$call2,$cons_enum) {
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
      $compare = function(dynamic $s1, dynamic $s2) use ($compare_aux,$cons_enum) {
        $E = $cons_enum($s2, 0);
        return $compare_aux($cons_enum($s1, 0), $E);
      };
      $equal = function(dynamic $s1, dynamic $s2) use ($compare) {
        return 0 === $compare($s1, $s2) ? 1 : (0);
      };
      $subset->contents = function(dynamic $s1, dynamic $s2) use ($Ord,$call2,$subset) {
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
                $B = $subset->contents($l1, $l2);
                if ($B) {$s1__0 = $r1;$s2__0 = $r2;continue;}
                return $B;
              }
              if (0 <= $c) {
                $C = $subset->contents(Vector{0, 0, $v1, $r1, 0}, $r2);
                if ($C) {$s1__0 = $l1;continue;}
                return $C;
              }
              $D = $subset->contents(Vector{0, $l1, $v1, 0, 0}, $l2);
              if ($D) {$s1__0 = $r1;continue;}
              return $D;
            }
            return 0;
          }
          return 1;
        }
      };
      $iter->contents = function(dynamic $f, dynamic $param) use ($call1,$iter) {
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
      $fold->contents = function(dynamic $f, dynamic $s, dynamic $accu) use ($call2,$fold) {
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
      $for_all->contents = function(dynamic $p, dynamic $param) use ($call1,$for_all) {
        $param__0 = $param;
        for (;;) {
          if ($param__0) {
            $r = $param__0[3];
            $v = $param__0[2];
            $l = $param__0[1];
            $y = $call1($p, $v);
            if ($y) {
              $z = $for_all->contents($p, $l);
              if ($z) {$param__0 = $r;continue;}
              $A = $z;
            }
            else {$A = $y;}
            return $A;
          }
          return 1;
        }
      };
      $exists->contents = function(dynamic $p, dynamic $param) use ($call1,$exists) {
        $param__0 = $param;
        for (;;) {
          if ($param__0) {
            $r = $param__0[3];
            $v = $param__0[2];
            $l = $param__0[1];
            $v = $call1($p, $v);
            if ($v) {
              $w = $v;
            }
            else {
              $x = $exists->contents($p, $l);
              if (! $x) {$param__0 = $r;continue;}
              $w = $x;
            }
            return $w;
          }
          return 0;
        }
      };
      $filter->contents = function(dynamic $p, dynamic $t) use ($call1,$concat,$filter,$join) {
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
      $partition->contents = function(dynamic $p, dynamic $param) use ($b,$call1,$concat,$join,$partition) {
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
            $t = $concat($lf, $rf);
            return Vector{0, $join->contents($lt, $v, $rt), $t};
          }
          $u = $join->contents($lf, $v, $rf);
          return Vector{0, $concat($lt, $rt), $u};
        }
        return $b;
      };
      $cardinal->contents = function(dynamic $param) use ($cardinal) {
        if ($param) {
          $r = $param[3];
          $l = $param[1];
          $s = $cardinal->contents($r);
          return (int) ((int) ($cardinal->contents($l) + 1) + $s);
        }
        return 0;
      };
      $elements_aux->contents = function(dynamic $accu, dynamic $param) use ($elements_aux) {
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
      $elements = function(dynamic $s) use ($elements_aux) {
        return $elements_aux->contents(0, $s);
      };
      $find = function(dynamic $x, dynamic $param) use ($Not_found,$Ord,$call2,$runtime) {
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
          throw $runtime["caml_wrap_thrown_exception"]($Not_found) as \Throwable;
        }
      };
      $find_first_aux = function(dynamic $v0, dynamic $f, dynamic $param) use ($call1) {
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
      $find_first = function(dynamic $f, dynamic $param) use ($Not_found,$call1,$find_first_aux,$runtime) {
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
          throw $runtime["caml_wrap_thrown_exception"]($Not_found) as \Throwable;
        }
      };
      $find_first_opt_aux = function(dynamic $v0, dynamic $f, dynamic $param) use ($call1) {
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
      $find_first_opt = function(dynamic $f, dynamic $param) use ($call1,$find_first_opt_aux) {
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
      $find_last_aux = function(dynamic $v0, dynamic $f, dynamic $param) use ($call1) {
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
      $find_last = function(dynamic $f, dynamic $param) use ($Not_found,$call1,$find_last_aux,$runtime) {
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
          throw $runtime["caml_wrap_thrown_exception"]($Not_found) as \Throwable;
        }
      };
      $find_last_opt_aux = function(dynamic $v0, dynamic $f, dynamic $param) use ($call1) {
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
      $find_last_opt = function(dynamic $f, dynamic $param) use ($call1,$find_last_opt_aux) {
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
      $find_opt = function(dynamic $x, dynamic $param) use ($Ord,$call2) {
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
      $try_join = function(dynamic $l, dynamic $v, dynamic $r) use ($Ord,$add,$call2,$join,$max_elt,$min_elt,$union) {
        if (0 === $l) {
          $switch__0 = 0;
        }
        else {
          $r = $max_elt($l);
          $switch__0 = 0 <= $call2($Ord[1], $r, $v) ? 1 : (0);
        }
        if (! $switch__0) {
          if (0 === $r) {
            $switch__1 = 0;
          }
          else {
            $q = $min_elt($r);
            $switch__1 = 0 <= $call2($Ord[1], $v, $q) ? 1 : (0);
          }
          if (! $switch__1) {return $join->contents($l, $v, $r);}
        }
        return $union->contents($l, $add->contents($v, $r));
      };
      $map->contents = function(dynamic $f, dynamic $t) use ($call1,$map,$try_join) {
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
      $of_sorted_list = function(dynamic $l) use ($Assert_failure,$List,$c,$call1,$create,$runtime,$unsigned_right_shift_32) {
        $sub = new Ref();
        $sub->contents = function(dynamic $n, dynamic $l) use ($Assert_failure,$c,$create,$runtime,$sub,$unsigned_right_shift_32) {
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
                  $n = $l[2];
                  if ($n) {
                    $l__4 = $n[2];
                    $x1 = $n[1];
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
                  $o = $l[2];
                  if ($o) {
                    $p = $o[2];
                    if ($p) {
                      $l__5 = $p[2];
                      $x2 = $p[1];
                      $x1__0 = $o[1];
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
          throw $runtime["caml_wrap_thrown_exception"](Vector{0, $Assert_failure, $c}) as \Throwable;
        };
        return $sub->contents($call1($List[1], $l), $l)[1];
      };
      $of_list = function(dynamic $l) use ($List,$Ord,$add,$call2,$empty,$of_sorted_list,$singleton) {
        if ($l) {
          $f = $l[2];
          $g = $l[1];
          if ($f) {
            $h = $f[2];
            $i = $f[1];
            if ($h) {
              $j = $h[2];
              $k = $h[1];
              if ($j) {
                $l = $j[2];
                $m = $j[1];
                if ($l) {
                  if ($l[2]) {
                    return $of_sorted_list($call2($List[51], $Ord[1], $l));
                  }
                  $x4 = $l[1];
                  return $add->contents(
                    $x4,
                    $add->contents(
                      $m,
                      $add->contents($k, $add->contents($i, $singleton($g)))
                    )
                  );
                }
                return $add->contents(
                  $m,
                  $add->contents($k, $add->contents($i, $singleton($g)))
                );
              }
              return $add->contents($k, $add->contents($i, $singleton($g)));
            }
            return $add->contents($i, $singleton($g));
          }
          return $singleton($g);
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
      function(dynamic $d) use ($Make) {
        $e = $Make($d);
        return Vector{
          0,
          $e[17],
          $e[18],
          $e[19],
          $e[4],
          $e[5],
          $e[20],
          $e[21],
          $e[22],
          $e[23],
          $e[26],
          $e[27],
          $e[28],
          $e[29],
          $e[51],
          $e[30],
          $e[31],
          $e[32],
          $e[33],
          $e[34],
          $e[35],
          $e[37],
          $e[9],
          $e[10],
          $e[11],
          $e[12],
          $e[38],
          $e[39],
          $e[16],
          $e[40],
          $e[49],
          $e[42],
          $e[44],
          $e[46],
          $e[48],
          $e[53]
        };
      }
    };
    
    $runtime["caml_register_global"](12, $Set, "Set");

  }
}

