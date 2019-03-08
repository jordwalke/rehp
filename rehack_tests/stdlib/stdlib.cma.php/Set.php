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
    $unsigned_right_shift_32 = $runtime["unsigned_right_shift_32"];
    $caml_arity_test = $runtime["caml_arity_test"];
    $caml_new_string = $runtime["caml_new_string"];
    $caml_call1 = function($f, $a0) use ($caml_arity_test,$runtime) {
      return $caml_arity_test($f) == 1
        ? $f($a0)
        : ($runtime["caml_call_gen"]($f, varray[$a0]));
    };
    $caml_call2 = function($f, $a0, $a1) use ($caml_arity_test,$runtime) {
      return $caml_arity_test($f) == 2
        ? $f($a0, $a1)
        : ($runtime["caml_call_gen"]($f, varray[$a0,$a1]));
    };
    $global_data = $runtime["caml_get_global_data"]();
    $cst_Set_remove_min_elt = $caml_new_string("Set.remove_min_elt");
    $cst_Set_bal = $caml_new_string("Set.bal");
    $cst_Set_bal__0 = $caml_new_string("Set.bal");
    $cst_Set_bal__1 = $caml_new_string("Set.bal");
    $cst_Set_bal__2 = $caml_new_string("Set.bal");
    $Not_found = $global_data["Not_found"];
    $Pervasives = $global_data["Pervasives"];
    $List = $global_data["List_"];
    $Assert_failure = $global_data["Assert_failure"];
    $fk = Vector{0, 0, 0, 0};
    $fl = Vector{0, 0, 0};
    $fm = Vector{0, $caml_new_string("set.ml"), 510, 18};
    $Make = function($Ord) use ($Assert_failure,$List,$Not_found,$Pervasives,$caml_call1,$caml_call2,$cst_Set_bal,$cst_Set_bal__0,$cst_Set_bal__1,$cst_Set_bal__2,$cst_Set_remove_min_elt,$fk,$fl,$fm,$runtime,$unsigned_right_shift_32) {
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
      $height = function($param) {
        if ($param) {$h = $param[4];return $h;}
        return 0;
      };
      $create = function($l, $v, $r) {
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
        $gd = $hr <= $hl ? $hl + 1 | 0 : ($hr + 1 | 0);
        return Vector{0, $l, $v, $r, $gd};
      };
      $bal = function($l, $v, $r) use ($Pervasives,$caml_call1,$create,$cst_Set_bal,$cst_Set_bal__0,$cst_Set_bal__1,$cst_Set_bal__2,$height) {
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
        if (($hr + 2 | 0) < $hl) {
          if ($l) {
            $lr = $l[3];
            $lv = $l[2];
            $ll = $l[1];
            $f9 = $height($lr);
            if ($f9 <= $height($ll)) {
              return $create($ll, $lv, $create($lr, $v, $r));
            }
            if ($lr) {
              $lrr = $lr[3];
              $lrv = $lr[2];
              $lrl = $lr[1];
              $f_ = $create($lrr, $v, $r);
              return $create($create($ll, $lv, $lrl), $lrv, $f_);
            }
            return $caml_call1($Pervasives[1], $cst_Set_bal);
          }
          return $caml_call1($Pervasives[1], $cst_Set_bal__0);
        }
        if (($hl + 2 | 0) < $hr) {
          if ($r) {
            $rr = $r[3];
            $rv = $r[2];
            $rl = $r[1];
            $ga = $height($rl);
            if ($ga <= $height($rr)) {
              return $create($create($l, $v, $rl), $rv, $rr);
            }
            if ($rl) {
              $rlr = $rl[3];
              $rlv = $rl[2];
              $rll = $rl[1];
              $gb = $create($rlr, $rv, $rr);
              return $create($create($l, $v, $rll), $rlv, $gb);
            }
            return $caml_call1($Pervasives[1], $cst_Set_bal__1);
          }
          return $caml_call1($Pervasives[1], $cst_Set_bal__2);
        }
        $gc = $hr <= $hl ? $hl + 1 | 0 : ($hr + 1 | 0);
        return Vector{0, $l, $v, $r, $gc};
      };
      $_ = $add->contents =
        function($x, $t) use ($Ord,$add,$bal,$caml_call2) {
          if ($t) {
            $r = $t[3];
            $v = $t[2];
            $l = $t[1];
            $c = $caml_call2($Ord[1], $x, $v);
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
      $singleton = function($x) {return Vector{0, 0, $x, 0, 1};};
      $_ = $add_min_element->contents =
        function($x, $param) use ($add_min_element,$bal,$singleton) {
          if ($param) {
            $r = $param[3];
            $v = $param[2];
            $l = $param[1];
            return $bal($add_min_element->contents($x, $l), $v, $r);
          }
          return $singleton($x);
        };
      $_ = $add_max_element->contents =
        function($x, $param) use ($add_max_element,$bal,$singleton) {
          if ($param) {
            $r = $param[3];
            $v = $param[2];
            $l = $param[1];
            return $bal($l, $v, $add_max_element->contents($x, $r));
          }
          return $singleton($x);
        };
      $_ = $join->contents =
        function($l, $v, $r) use ($add_max_element,$add_min_element,$bal,$create,$join) {
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
              return ($rh + 2 | 0) < $lh
                ? $bal($ll, $lv, $join->contents($lr, $v, $r))
                : (($lh + 2 | 0) < $rh
                 ? $bal($join->contents($l, $v, $rl), $rv, $rr)
                 : ($create($l, $v, $r)));
            }
            return $add_max_element->contents($v, $l);
          }
          return $add_min_element->contents($v, $r);
        };
      $min_elt = function($param) use ($Not_found,$runtime) {
        $param__0 = $param;
        for (;;) {
          if ($param__0) {
            $f8 = $param__0[1];
            if ($f8) {$param__0 = $f8;continue;}
            $v = $param__0[2];
            return $v;
          }
          throw $runtime["caml_wrap_thrown_exception"]($Not_found);
        }
      };
      $min_elt_opt = function($param) {
        $param__0 = $param;
        for (;;) {
          if ($param__0) {
            $f7 = $param__0[1];
            if ($f7) {$param__0 = $f7;continue;}
            $v = $param__0[2];
            return Vector{0, $v};
          }
          return 0;
        }
      };
      $max_elt = function($param) use ($Not_found,$runtime) {
        $param__0 = $param;
        for (;;) {
          if ($param__0) {
            $f5 = $param__0[3];
            $f6 = $param__0[2];
            if ($f5) {$param__0 = $f5;continue;}
            return $f6;
          }
          throw $runtime["caml_wrap_thrown_exception"]($Not_found);
        }
      };
      $max_elt_opt = function($param) {
        $param__0 = $param;
        for (;;) {
          if ($param__0) {
            $f3 = $param__0[3];
            $f4 = $param__0[2];
            if ($f3) {$param__0 = $f3;continue;}
            return Vector{0, $f4};
          }
          return 0;
        }
      };
      $_ = $remove_min_elt->contents =
        function($param) use ($Pervasives,$bal,$caml_call1,$cst_Set_remove_min_elt,$remove_min_elt) {
          if ($param) {
            $f2 = $param[1];
            if ($f2) {
              $r = $param[3];
              $v = $param[2];
              return $bal($remove_min_elt->contents($f2), $v, $r);
            }
            $r__0 = $param[3];
            return $r__0;
          }
          return $caml_call1($Pervasives[1], $cst_Set_remove_min_elt);
        };
      $merge = function($t, $match) use ($bal,$min_elt,$remove_min_elt) {
        if ($t) {
          if ($match) {
            $f1 = $remove_min_elt->contents($match);
            return $bal($t, $min_elt($match), $f1);
          }
          return $t;
        }
        return $match;
      };
      $concat = function($t, $match) use ($join,$min_elt,$remove_min_elt) {
        if ($t) {
          if ($match) {
            $f0 = $remove_min_elt->contents($match);
            return $join->contents($t, $min_elt($match), $f0);
          }
          return $t;
        }
        return $match;
      };
      $_ = $split->contents =
        function($x, $param) use ($Ord,$caml_call2,$fk,$join,$split) {
          if ($param) {
            $r = $param[3];
            $v = $param[2];
            $l = $param[1];
            $c = $caml_call2($Ord[1], $x, $v);
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
          return $fk;
        };
      $empty = 0;
      $is_empty = function($param) {return $param ? 0 : (1);};
      $mem = function($x, $param) use ($Ord,$caml_call2) {
        $param__0 = $param;
        for (;;) {
          if ($param__0) {
            $r = $param__0[3];
            $v = $param__0[2];
            $l = $param__0[1];
            $c = $caml_call2($Ord[1], $x, $v);
            $fZ = 0 === $c ? 1 : (0);
            if ($fZ) {return $fZ;}
            $param__1 = 0 <= $c ? $r : ($l);
            $param__0 = $param__1;
            continue;
          }
          return 0;
        }
      };
      $_ = $remove->contents =
        function($x, $t) use ($Ord,$bal,$caml_call2,$merge,$remove) {
          if ($t) {
            $r = $t[3];
            $v = $t[2];
            $l = $t[1];
            $c = $caml_call2($Ord[1], $x, $v);
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
      $_ = $union->contents =
        function($t1, $match) use ($add,$join,$split,$union) {
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
                $fX = $union->contents($r1, $r2__0);
                return $join->contents($union->contents($l1, $l2__0), $v1, $fX
                );
              }
              if (1 === $h1) {return $add->contents($v1, $match);}
              $match__1 = $split->contents($v2, $t1);
              $r1__0 = $match__1[3];
              $l1__0 = $match__1[1];
              $fY = $union->contents($r1__0, $r2);
              return $join->contents($union->contents($l1__0, $l2), $v2, $fY);
            }
            return $t1;
          }
          return $match;
        };
      $_ = $inter->contents =
        function($s1, $match) use ($concat,$inter,$join,$split) {
          if ($s1) {
            if ($match) {
              $r1 = $s1[3];
              $v1 = $s1[2];
              $l1 = $s1[1];
              $fT = $split->contents($v1, $match);
              $fU = $fT[1];
              if (0 === $fT[2]) {
                $r2 = $fT[3];
                $fV = $inter->contents($r1, $r2);
                return $concat($inter->contents($l1, $fU), $fV);
              }
              $r2__0 = $fT[3];
              $fW = $inter->contents($r1, $r2__0);
              return $join->contents($inter->contents($l1, $fU), $v1, $fW);
            }
            return 0;
          }
          return 0;
        };
      $_ = $diff->contents =
        function($t1, $match) use ($concat,$diff,$join,$split) {
          if ($t1) {
            if ($match) {
              $r1 = $t1[3];
              $v1 = $t1[2];
              $l1 = $t1[1];
              $fP = $split->contents($v1, $match);
              $fQ = $fP[1];
              if (0 === $fP[2]) {
                $r2 = $fP[3];
                $fR = $diff->contents($r1, $r2);
                return $join->contents($diff->contents($l1, $fQ), $v1, $fR);
              }
              $r2__0 = $fP[3];
              $fS = $diff->contents($r1, $r2__0);
              return $concat($diff->contents($l1, $fQ), $fS);
            }
            return $t1;
          }
          return 0;
        };
      $cons_enum = function($s, $e) {
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
      $compare_aux = function($e1, $e2) use ($Ord,$caml_call2,$cons_enum) {
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
              $c = $caml_call2($Ord[1], $v1, $v2);
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
      $compare = function($s1, $s2) use ($compare_aux,$cons_enum) {
        $fO = $cons_enum($s2, 0);
        return $compare_aux($cons_enum($s1, 0), $fO);
      };
      $equal = function($s1, $s2) use ($compare) {
        return 0 === $compare($s1, $s2) ? 1 : (0);
      };
      $_ = $subset->contents =
        function($s1, $s2) use ($Ord,$caml_call2,$subset) {
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
                $c = $caml_call2($Ord[1], $v1, $v2);
                if (0 === $c) {
                  $fL = $subset->contents($l1, $l2);
                  if ($fL) {$s1__0 = $r1;$s2__0 = $r2;continue;}
                  return $fL;
                }
                if (0 <= $c) {
                  $fM = $subset->contents(Vector{0, 0, $v1, $r1, 0}, $r2);
                  if ($fM) {$s1__0 = $l1;continue;}
                  return $fM;
                }
                $fN = $subset->contents(Vector{0, $l1, $v1, 0, 0}, $l2);
                if ($fN) {$s1__0 = $r1;continue;}
                return $fN;
              }
              return 0;
            }
            return 1;
          }
        };
      $_ = $iter->contents =
        function($f, $param) use ($caml_call1,$iter) {
          $param__0 = $param;
          for (;;) {
            if ($param__0) {
              $param__1 = $param__0[3];
              $v = $param__0[2];
              $l = $param__0[1];
              $iter->contents($f, $l);
              $caml_call1($f, $v);
              $param__0 = $param__1;
              continue;
            }
            return 0;
          }
        };
      $_ = $fold->contents =
        function($f, $s, $accu) use ($caml_call2,$fold) {
          $s__0 = $s;
          $accu__0 = $accu;
          for (;;) {
            if ($s__0) {
              $s__1 = $s__0[3];
              $v = $s__0[2];
              $l = $s__0[1];
              $accu__1 = $caml_call2($f, $v, $fold->contents($f, $l, $accu__0)
              );
              $s__0 = $s__1;
              $accu__0 = $accu__1;
              continue;
            }
            return $accu__0;
          }
        };
      $_ = $for_all->contents =
        function($p, $param) use ($caml_call1,$for_all) {
          $param__0 = $param;
          for (;;) {
            if ($param__0) {
              $r = $param__0[3];
              $v = $param__0[2];
              $l = $param__0[1];
              $fI = $caml_call1($p, $v);
              if ($fI) {
                $fJ = $for_all->contents($p, $l);
                if ($fJ) {$param__0 = $r;continue;}
                $fK = $fJ;
              }
              else {$fK = $fI;}
              return $fK;
            }
            return 1;
          }
        };
      $_ = $exists->contents =
        function($p, $param) use ($caml_call1,$exists) {
          $param__0 = $param;
          for (;;) {
            if ($param__0) {
              $r = $param__0[3];
              $v = $param__0[2];
              $l = $param__0[1];
              $fF = $caml_call1($p, $v);
              if ($fF) {
                $fG = $fF;
              }
              else {
                $fH = $exists->contents($p, $l);
                if (! $fH) {$param__0 = $r;continue;}
                $fG = $fH;
              }
              return $fG;
            }
            return 0;
          }
        };
      $_ = $filter->contents =
        function($p, $t) use ($caml_call1,$concat,$filter,$join) {
          if ($t) {
            $r = $t[3];
            $v = $t[2];
            $l = $t[1];
            $l__0 = $filter->contents($p, $l);
            $pv = $caml_call1($p, $v);
            $r__0 = $filter->contents($p, $r);
            if ($pv) {
              if ($l === $l__0) {if ($r === $r__0) {return $t;}}
              return $join->contents($l__0, $v, $r__0);
            }
            return $concat($l__0, $r__0);
          }
          return 0;
        };
      $_ = $partition->contents =
        function($p, $param) use ($caml_call1,$concat,$fl,$join,$partition) {
          if ($param) {
            $r = $param[3];
            $v = $param[2];
            $l = $param[1];
            $match = $partition->contents($p, $l);
            $lf = $match[2];
            $lt = $match[1];
            $pv = $caml_call1($p, $v);
            $match__0 = $partition->contents($p, $r);
            $rf = $match__0[2];
            $rt = $match__0[1];
            if ($pv) {
              $fD = $concat($lf, $rf);
              return Vector{0, $join->contents($lt, $v, $rt), $fD};
            }
            $fE = $join->contents($lf, $v, $rf);
            return Vector{0, $concat($lt, $rt), $fE};
          }
          return $fl;
        };
      $_ = $cardinal->contents =
        function($param) use ($cardinal) {
          if ($param) {
            $r = $param[3];
            $l = $param[1];
            $fC = $cardinal->contents($r);
            return ($cardinal->contents($l) + 1 | 0) + $fC | 0;
          }
          return 0;
        };
      $_ = $elements_aux->contents =
        function($accu, $param) use ($elements_aux) {
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
      $elements = function($s) use ($elements_aux) {
        return $elements_aux->contents(0, $s);
      };
      $find = function($x, $param) use ($Not_found,$Ord,$caml_call2,$runtime) {
        $param__0 = $param;
        for (;;) {
          if ($param__0) {
            $r = $param__0[3];
            $v = $param__0[2];
            $l = $param__0[1];
            $c = $caml_call2($Ord[1], $x, $v);
            if (0 === $c) {return $v;}
            $param__1 = 0 <= $c ? $r : ($l);
            $param__0 = $param__1;
            continue;
          }
          throw $runtime["caml_wrap_thrown_exception"]($Not_found);
        }
      };
      $find_first_aux = function($v0, $f, $param) use ($caml_call1) {
        $v0__0 = $v0;
        $param__0 = $param;
        for (;;) {
          if ($param__0) {
            $r = $param__0[3];
            $v = $param__0[2];
            $l = $param__0[1];
            if ($caml_call1($f, $v)) {$v0__0 = $v;$param__0 = $l;continue;}
            $param__0 = $r;
            continue;
          }
          return $v0__0;
        }
      };
      $find_first = function($f, $param) use ($Not_found,$caml_call1,$find_first_aux,$runtime) {
        $param__0 = $param;
        for (;;) {
          if ($param__0) {
            $r = $param__0[3];
            $v = $param__0[2];
            $l = $param__0[1];
            if ($caml_call1($f, $v)) {return $find_first_aux($v, $f, $l);}
            $param__0 = $r;
            continue;
          }
          throw $runtime["caml_wrap_thrown_exception"]($Not_found);
        }
      };
      $find_first_opt_aux = function($v0, $f, $param) use ($caml_call1) {
        $v0__0 = $v0;
        $param__0 = $param;
        for (;;) {
          if ($param__0) {
            $r = $param__0[3];
            $v = $param__0[2];
            $l = $param__0[1];
            if ($caml_call1($f, $v)) {$v0__0 = $v;$param__0 = $l;continue;}
            $param__0 = $r;
            continue;
          }
          return Vector{0, $v0__0};
        }
      };
      $find_first_opt = function($f, $param) use ($caml_call1,$find_first_opt_aux) {
        $param__0 = $param;
        for (;;) {
          if ($param__0) {
            $r = $param__0[3];
            $v = $param__0[2];
            $l = $param__0[1];
            if ($caml_call1($f, $v)) {return $find_first_opt_aux($v, $f, $l);}
            $param__0 = $r;
            continue;
          }
          return 0;
        }
      };
      $find_last_aux = function($v0, $f, $param) use ($caml_call1) {
        $v0__0 = $v0;
        $param__0 = $param;
        for (;;) {
          if ($param__0) {
            $r = $param__0[3];
            $v = $param__0[2];
            $l = $param__0[1];
            if ($caml_call1($f, $v)) {$v0__0 = $v;$param__0 = $r;continue;}
            $param__0 = $l;
            continue;
          }
          return $v0__0;
        }
      };
      $find_last = function($f, $param) use ($Not_found,$caml_call1,$find_last_aux,$runtime) {
        $param__0 = $param;
        for (;;) {
          if ($param__0) {
            $r = $param__0[3];
            $v = $param__0[2];
            $l = $param__0[1];
            if ($caml_call1($f, $v)) {return $find_last_aux($v, $f, $r);}
            $param__0 = $l;
            continue;
          }
          throw $runtime["caml_wrap_thrown_exception"]($Not_found);
        }
      };
      $find_last_opt_aux = function($v0, $f, $param) use ($caml_call1) {
        $v0__0 = $v0;
        $param__0 = $param;
        for (;;) {
          if ($param__0) {
            $r = $param__0[3];
            $v = $param__0[2];
            $l = $param__0[1];
            if ($caml_call1($f, $v)) {$v0__0 = $v;$param__0 = $r;continue;}
            $param__0 = $l;
            continue;
          }
          return Vector{0, $v0__0};
        }
      };
      $find_last_opt = function($f, $param) use ($caml_call1,$find_last_opt_aux) {
        $param__0 = $param;
        for (;;) {
          if ($param__0) {
            $r = $param__0[3];
            $v = $param__0[2];
            $l = $param__0[1];
            if ($caml_call1($f, $v)) {return $find_last_opt_aux($v, $f, $r);}
            $param__0 = $l;
            continue;
          }
          return 0;
        }
      };
      $find_opt = function($x, $param) use ($Ord,$caml_call2) {
        $param__0 = $param;
        for (;;) {
          if ($param__0) {
            $r = $param__0[3];
            $v = $param__0[2];
            $l = $param__0[1];
            $c = $caml_call2($Ord[1], $x, $v);
            if (0 === $c) {return Vector{0, $v};}
            $param__1 = 0 <= $c ? $r : ($l);
            $param__0 = $param__1;
            continue;
          }
          return 0;
        }
      };
      $try_join = function($l, $v, $r) use ($Ord,$add,$caml_call2,$join,$max_elt,$min_elt,$union) {
        if (0 === $l) {
          $switch__0 = 0;
        }
        else {
          $fB = $max_elt($l);
          $switch__0 = 0 <= $caml_call2($Ord[1], $fB, $v) ? 1 : (0);
        }
        if (! $switch__0) {
          if (0 === $r) {
            $switch__1 = 0;
          }
          else {
            $fA = $min_elt($r);
            $switch__1 = 0 <= $caml_call2($Ord[1], $v, $fA) ? 1 : (0);
          }
          if (! $switch__1) {return $join->contents($l, $v, $r);}
        }
        return $union->contents($l, $add->contents($v, $r));
      };
      $_ = $map->contents =
        function($f, $t) use ($caml_call1,$map,$try_join) {
          if ($t) {
            $r = $t[3];
            $v = $t[2];
            $l = $t[1];
            $l__0 = $map->contents($f, $l);
            $v__0 = $caml_call1($f, $v);
            $r__0 = $map->contents($f, $r);
            if ($l === $l__0) {
              if ($v === $v__0) {if ($r === $r__0) {return $t;}}
            }
            return $try_join($l__0, $v__0, $r__0);
          }
          return 0;
        };
      $of_sorted_list = function($l) use ($Assert_failure,$List,$caml_call1,$create,$fm,$runtime,$unsigned_right_shift_32) {
        $sub = new Ref();
        $_ = $sub->contents =
          function($n, $l) use ($Assert_failure,$create,$fm,$runtime,$sub,$unsigned_right_shift_32) {
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
                    $fx = $l[2];
                    if ($fx) {
                      $l__4 = $fx[2];
                      $x1 = $fx[1];
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
                    $fy = $l[2];
                    if ($fy) {
                      $fz = $fy[2];
                      if ($fz) {
                        $l__5 = $fz[2];
                        $x2 = $fz[1];
                        $x1__0 = $fy[1];
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
            $nl = $n / 2 | 0;
            $match = $sub->contents($nl, $l);
            $l__0 = $match[2];
            $left = $match[1];
            if ($l__0) {
              $l__1 = $l__0[2];
              $mid = $l__0[1];
              $match__0 = $sub->contents(($n - $nl | 0) + -1 | 0, $l__1);
              $l__2 = $match__0[2];
              $right = $match__0[1];
              return Vector{0, $create($left, $mid, $right), $l__2};
            }
            throw $runtime["caml_wrap_thrown_exception"](Vector{0, $Assert_failure, $fm});
          };
        return $sub->contents($caml_call1($List[1], $l), $l)[1];
      };
      $of_list = function($l) use ($List,$Ord,$add,$caml_call2,$empty,$of_sorted_list,$singleton) {
        if ($l) {
          $fp = $l[2];
          $fq = $l[1];
          if ($fp) {
            $fr = $fp[2];
            $fs = $fp[1];
            if ($fr) {
              $ft = $fr[2];
              $fu = $fr[1];
              if ($ft) {
                $fv = $ft[2];
                $fw = $ft[1];
                if ($fv) {
                  if ($fv[2]) {
                    return $of_sorted_list($caml_call2($List[51], $Ord[1], $l));
                  }
                  $x4 = $fv[1];
                  return $add->contents(
                    $x4,
                    $add->contents(
                      $fw,
                      $add->contents($fu, $add->contents($fs, $singleton($fq)))
                    )
                  );
                }
                return $add->contents(
                  $fw,
                  $add->contents($fu, $add->contents($fs, $singleton($fq)))
                );
              }
              return $add->contents($fu, $add->contents($fs, $singleton($fq)));
            }
            return $add->contents($fs, $singleton($fq));
          }
          return $singleton($fq);
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
      function($fn) use ($Make) {
        $fo = $Make($fn);
        return Vector{
          0,
          $fo[17],
          $fo[18],
          $fo[19],
          $fo[4],
          $fo[5],
          $fo[20],
          $fo[21],
          $fo[22],
          $fo[23],
          $fo[26],
          $fo[27],
          $fo[28],
          $fo[29],
          $fo[51],
          $fo[30],
          $fo[31],
          $fo[32],
          $fo[33],
          $fo[34],
          $fo[35],
          $fo[37],
          $fo[9],
          $fo[10],
          $fo[11],
          $fo[12],
          $fo[38],
          $fo[39],
          $fo[16],
          $fo[40],
          $fo[49],
          $fo[42],
          $fo[44],
          $fo[46],
          $fo[48],
          $fo[53]
        };
      }
    };
    
    $runtime["caml_register_global"](12, $Set, "Set");

  }
}