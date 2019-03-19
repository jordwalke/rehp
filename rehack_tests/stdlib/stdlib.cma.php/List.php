<?hh
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * List_.php
 */

namespace Rehack;

final class List_ {
  <<__Memoize>>
  public static function get() {
    $global_object = \Rehack\GlobalObject::get();
    $runtime = \Rehack\Runtime::get();
    /*
     * Soon, these will replace the `global_data->ModuleName`
     * pattern in the load() function.
     */
    $Pervasives = Pervasives::get();
    $Not_found = Not_found::get();
    $Assert_failure = Assert_failure::get();
    List_::load($global_object);
    $memoized = $runtime->caml_get_global_data()->List_;
    return $memoized;
  }

  /**
   * Performs module load operation. May have side effects.
   */
  private static function load($joo_global_object) {
    

    $aD = new Ref();
    $combine = new Ref();
    $flatten = new Ref();
    $fold_right = new Ref();
    $fold_right2 = new Ref();
    $init_aux = new Ref();
    $map = new Ref();
    $map2 = new Ref();
    $merge = new Ref();
    $remove_assoc = new Ref();
    $remove_assq = new Ref();
    $split = new Ref();
    $runtime = $joo_global_object->jsoo_runtime;
    $right_shift_32 = $runtime["right_shift_32"];
    $caml_arity_test = $runtime["caml_arity_test"];
    $caml_compare = $runtime["caml_compare"];
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
    $caml_call3 = function($f, $a0, $a1, $a2) use ($caml_arity_test,$runtime) {
      return $caml_arity_test($f) === 3
        ? $f($a0, $a1, $a2)
        : ($runtime["caml_call_gen"]($f, varray[$a0,$a1,$a2]));
    };
    $global_data = $runtime["caml_get_global_data"]();
    $cst_List_map2 = $caml_new_string("List.map2");
    $cst_List_iter2 = $caml_new_string("List.iter2");
    $cst_List_fold_left2 = $caml_new_string("List.fold_left2");
    $cst_List_fold_right2 = $caml_new_string("List.fold_right2");
    $cst_List_for_all2 = $caml_new_string("List.for_all2");
    $cst_List_exists2 = $caml_new_string("List.exists2");
    $cst_List_combine = $caml_new_string("List.combine");
    $cst_List_rev_map2 = $caml_new_string("List.rev_map2");
    $cst_List_init = $caml_new_string("List.init");
    $cst_List_nth__0 = $caml_new_string("List.nth");
    $cst_nth = $caml_new_string("nth");
    $cst_List_nth = $caml_new_string("List.nth");
    $cst_tl = $caml_new_string("tl");
    $cst_hd = $caml_new_string("hd");
    $Pervasives = $global_data["Pervasives"];
    $Not_found = $global_data["Not_found"];
    $Assert_failure = $global_data["Assert_failure"];
    $aF = Vector{0, 0, 0};
    $aG = Vector{0, $caml_new_string("list.ml"), 262, 11};
    $length_aux = function($len, $param) {
      $len__0 = $len;
      $param__0 = $param;
      for (;;) {
        if ($param__0) {
          $param__1 = $param__0[2];
          $len__1 = $len__0 + 1 | 0;
          $len__0 = $len__1;
          $param__0 = $param__1;
          continue;
        }
        return $len__0;
      }
    };
    $length = function($l) use ($length_aux) {return $length_aux(0, $l);};
    $cons = function($a, $l) {return Vector{0, $a, $l};};
    $hd = function($param) use ($Pervasives,$caml_call1,$cst_hd) {
      if ($param) {$a = $param[1];return $a;}
      return $caml_call1($Pervasives[2], $cst_hd);
    };
    $tl = function($param) use ($Pervasives,$caml_call1,$cst_tl) {
      if ($param) {$l = $param[2];return $l;}
      return $caml_call1($Pervasives[2], $cst_tl);
    };
    $nth = function($l, $n) use ($Pervasives,$caml_call1,$cst_List_nth,$cst_nth) {
      if (0 <= $n) {
        $nth_aux = function($l, $n) use ($Pervasives,$caml_call1,$cst_nth) {
          $l__0 = $l;
          $n__0 = $n;
          for (;;) {
            if ($l__0) {
              $l__1 = $l__0[2];
              $a = $l__0[1];
              if (0 === $n__0) {return $a;}
              $n__1 = $n__0 + -1 | 0;
              $l__0 = $l__1;
              $n__0 = $n__1;
              continue;
            }
            return $caml_call1($Pervasives[2], $cst_nth);
          }
        };
        return $nth_aux($l, $n);
      }
      return $caml_call1($Pervasives[1], $cst_List_nth);
    };
    $nth_opt = function($l, $n) use ($Pervasives,$caml_call1,$cst_List_nth__0) {
      if (0 <= $n) {
        $nth_aux = function($l, $n) {
          $l__0 = $l;
          $n__0 = $n;
          for (;;) {
            if ($l__0) {
              $l__1 = $l__0[2];
              $a = $l__0[1];
              if (0 === $n__0) {return Vector{0, $a};}
              $n__1 = $n__0 + -1 | 0;
              $l__0 = $l__1;
              $n__0 = $n__1;
              continue;
            }
            return 0;
          }
        };
        return $nth_aux($l, $n);
      }
      return $caml_call1($Pervasives[1], $cst_List_nth__0);
    };
    $append = $Pervasives[25];
    $rev_append = function($l1, $l2) {
      $l1__0 = $l1;
      $l2__0 = $l2;
      for (;;) {
        if ($l1__0) {
          $l1__1 = $l1__0[2];
          $a = $l1__0[1];
          $l2__1 = Vector{0, $a, $l2__0};
          $l1__0 = $l1__1;
          $l2__0 = $l2__1;
          continue;
        }
        return $l2__0;
      }
    };
    $rev = function($l) use ($rev_append) {return $rev_append($l, 0);};
    $init_tailrec_aux = function($acc, $i, $n, $f) use ($caml_call1) {
      $acc__0 = $acc;
      $i__0 = $i;
      for (;;) {
        if ($n <= $i__0) {return $acc__0;}
        $i__1 = $i__0 + 1 | 0;
        $acc__1 = Vector{0, $caml_call1($f, $i__0), $acc__0};
        $acc__0 = $acc__1;
        $i__0 = $i__1;
        continue;
      }
    };
    $_ = $init_aux->contents =
      function($i, $n, $f) use ($caml_call1,$init_aux) {
        if ($n <= $i) {return 0;}
        $r = $caml_call1($f, $i);
        return Vector{0, $r, $init_aux->contents($i + 1 | 0, $n, $f)};
      };
    $init = function($len, $f) use ($Pervasives,$caml_call1,$cst_List_init,$init_aux,$init_tailrec_aux,$rev) {
      return 0 <= $len
        ? 10000 < $len
         ? $rev($init_tailrec_aux(0, 0, $len, $f))
         : ($init_aux->contents(0, $len, $f))
        : ($caml_call1($Pervasives[1], $cst_List_init));
    };
    $_ = $flatten->contents =
      function($param) use ($Pervasives,$caml_call2,$flatten) {
        if ($param) {
          $r = $param[2];
          $l = $param[1];
          $a4 = $flatten->contents($r);
          return $caml_call2($Pervasives[25], $l, $a4);
        }
        return 0;
      };
    $_ = $map->contents =
      function($f, $param) use ($caml_call1,$map) {
        if ($param) {
          $l = $param[2];
          $a = $param[1];
          $r = $caml_call1($f, $a);
          return Vector{0, $r, $map->contents($f, $l)};
        }
        return 0;
      };
    $_ = $aD->contents =
      function($i, $f, $param) use ($aD,$caml_call2) {
        if ($param) {
          $l = $param[2];
          $a = $param[1];
          $r = $caml_call2($f, $i, $a);
          return Vector{0, $r, $aD->contents($i + 1 | 0, $f, $l)};
        }
        return 0;
      };
    $mapi = function($f, $l) use ($aD) {return $aD->contents(0, $f, $l);};
    $rev_map = function($f, $l) use ($caml_call1) {
      $rmap_f = function($accu, $param) use ($caml_call1,$f) {
        $accu__0 = $accu;
        $param__0 = $param;
        for (;;) {
          if ($param__0) {
            $param__1 = $param__0[2];
            $a = $param__0[1];
            $accu__1 = Vector{0, $caml_call1($f, $a), $accu__0};
            $accu__0 = $accu__1;
            $param__0 = $param__1;
            continue;
          }
          return $accu__0;
        }
      };
      return $rmap_f(0, $l);
    };
    $iter = function($f, $param) use ($caml_call1) {
      $param__0 = $param;
      for (;;) {
        if ($param__0) {
          $param__1 = $param__0[2];
          $a = $param__0[1];
          $caml_call1($f, $a);
          $param__0 = $param__1;
          continue;
        }
        return 0;
      }
    };
    $aE = function($i, $f, $param) use ($caml_call2) {
      $i__0 = $i;
      $param__0 = $param;
      for (;;) {
        if ($param__0) {
          $param__1 = $param__0[2];
          $a = $param__0[1];
          $caml_call2($f, $i__0, $a);
          $i__1 = $i__0 + 1 | 0;
          $i__0 = $i__1;
          $param__0 = $param__1;
          continue;
        }
        return 0;
      }
    };
    $iteri = function($f, $l) use ($aE) {return $aE(0, $f, $l);};
    $fold_left = function($f, $accu, $l) use ($caml_call2) {
      $accu__0 = $accu;
      $l__0 = $l;
      for (;;) {
        if ($l__0) {
          $l__1 = $l__0[2];
          $a = $l__0[1];
          $accu__1 = $caml_call2($f, $accu__0, $a);
          $accu__0 = $accu__1;
          $l__0 = $l__1;
          continue;
        }
        return $accu__0;
      }
    };
    $_ = $fold_right->contents =
      function($f, $l, $accu) use ($caml_call2,$fold_right) {
        if ($l) {
          $l__0 = $l[2];
          $a = $l[1];
          return $caml_call2($f, $a, $fold_right->contents($f, $l__0, $accu));
        }
        return $accu;
      };
    $_ = $map2->contents =
      function($f, $l1, $l2) use ($Pervasives,$caml_call1,$caml_call2,$cst_List_map2,$map2) {
        if ($l1) {
          if ($l2) {
            $l2__0 = $l2[2];
            $a2 = $l2[1];
            $l1__0 = $l1[2];
            $a1 = $l1[1];
            $r = $caml_call2($f, $a1, $a2);
            return Vector{0, $r, $map2->contents($f, $l1__0, $l2__0)};
          }
        }
        else {if (! $l2) {return 0;}}
        return $caml_call1($Pervasives[1], $cst_List_map2);
      };
    $rev_map2 = function($f, $l1, $l2) use ($Pervasives,$caml_call1,$caml_call2,$cst_List_rev_map2) {
      $rmap2_f = function($accu, $l1, $l2) use ($Pervasives,$caml_call1,$caml_call2,$cst_List_rev_map2,$f) {
        $accu__0 = $accu;
        $l1__0 = $l1;
        $l2__0 = $l2;
        for (;;) {
          if ($l1__0) {
            if ($l2__0) {
              $l2__1 = $l2__0[2];
              $a2 = $l2__0[1];
              $l1__1 = $l1__0[2];
              $a1 = $l1__0[1];
              $accu__1 = Vector{0, $caml_call2($f, $a1, $a2), $accu__0};
              $accu__0 = $accu__1;
              $l1__0 = $l1__1;
              $l2__0 = $l2__1;
              continue;
            }
          }
          else {if (! $l2__0) {return $accu__0;}}
          return $caml_call1($Pervasives[1], $cst_List_rev_map2);
        }
      };
      return $rmap2_f(0, $l1, $l2);
    };
    $iter2 = function($f, $l1, $l2) use ($Pervasives,$caml_call1,$caml_call2,$cst_List_iter2) {
      $l1__0 = $l1;
      $l2__0 = $l2;
      for (;;) {
        if ($l1__0) {
          if ($l2__0) {
            $l2__1 = $l2__0[2];
            $a2 = $l2__0[1];
            $l1__1 = $l1__0[2];
            $a1 = $l1__0[1];
            $caml_call2($f, $a1, $a2);
            $l1__0 = $l1__1;
            $l2__0 = $l2__1;
            continue;
          }
        }
        else {if (! $l2__0) {return 0;}}
        return $caml_call1($Pervasives[1], $cst_List_iter2);
      }
    };
    $fold_left2 = function($f, $accu, $l1, $l2) use ($Pervasives,$caml_call1,$caml_call3,$cst_List_fold_left2) {
      $accu__0 = $accu;
      $l1__0 = $l1;
      $l2__0 = $l2;
      for (;;) {
        if ($l1__0) {
          if ($l2__0) {
            $l2__1 = $l2__0[2];
            $a2 = $l2__0[1];
            $l1__1 = $l1__0[2];
            $a1 = $l1__0[1];
            $accu__1 = $caml_call3($f, $accu__0, $a1, $a2);
            $accu__0 = $accu__1;
            $l1__0 = $l1__1;
            $l2__0 = $l2__1;
            continue;
          }
        }
        else {if (! $l2__0) {return $accu__0;}}
        return $caml_call1($Pervasives[1], $cst_List_fold_left2);
      }
    };
    $_ = $fold_right2->contents =
      function($f, $l1, $l2, $accu) use ($Pervasives,$caml_call1,$caml_call3,$cst_List_fold_right2,$fold_right2) {
        if ($l1) {
          if ($l2) {
            $l2__0 = $l2[2];
            $a2 = $l2[1];
            $l1__0 = $l1[2];
            $a1 = $l1[1];
            return $caml_call3(
              $f,
              $a1,
              $a2,
              $fold_right2->contents($f, $l1__0, $l2__0, $accu)
            );
          }
        }
        else {if (! $l2) {return $accu;}}
        return $caml_call1($Pervasives[1], $cst_List_fold_right2);
      };
    $for_all = function($p, $param) use ($caml_call1) {
      $param__0 = $param;
      for (;;) {
        if ($param__0) {
          $l = $param__0[2];
          $a = $param__0[1];
          $a3 = $caml_call1($p, $a);
          if ($a3) {$param__0 = $l;continue;}
          return $a3;
        }
        return 1;
      }
    };
    $exists = function($p, $param) use ($caml_call1) {
      $param__0 = $param;
      for (;;) {
        if ($param__0) {
          $l = $param__0[2];
          $a = $param__0[1];
          $a2 = $caml_call1($p, $a);
          if ($a2) {return $a2;}
          $param__0 = $l;
          continue;
        }
        return 0;
      }
    };
    $for_all2 = function($p, $l1, $l2) use ($Pervasives,$caml_call1,$caml_call2,$cst_List_for_all2) {
      $l1__0 = $l1;
      $l2__0 = $l2;
      for (;;) {
        if ($l1__0) {
          if ($l2__0) {
            $l2__1 = $l2__0[2];
            $a2 = $l2__0[1];
            $l1__1 = $l1__0[2];
            $a1 = $l1__0[1];
            $a1 = $caml_call2($p, $a1, $a2);
            if ($a1) {$l1__0 = $l1__1;$l2__0 = $l2__1;continue;}
            return $a1;
          }
        }
        else {if (! $l2__0) {return 1;}}
        return $caml_call1($Pervasives[1], $cst_List_for_all2);
      }
    };
    $exists2 = function($p, $l1, $l2) use ($Pervasives,$caml_call1,$caml_call2,$cst_List_exists2) {
      $l1__0 = $l1;
      $l2__0 = $l2;
      for (;;) {
        if ($l1__0) {
          if ($l2__0) {
            $l2__1 = $l2__0[2];
            $a2 = $l2__0[1];
            $l1__1 = $l1__0[2];
            $a1 = $l1__0[1];
            $a0 = $caml_call2($p, $a1, $a2);
            if ($a0) {return $a0;}
            $l1__0 = $l1__1;
            $l2__0 = $l2__1;
            continue;
          }
        }
        else {if (! $l2__0) {return 0;}}
        return $caml_call1($Pervasives[1], $cst_List_exists2);
      }
    };
    $mem = function($x, $param) use ($caml_compare) {
      $param__0 = $param;
      for (;;) {
        if ($param__0) {
          $l = $param__0[2];
          $a = $param__0[1];
          $aZ = 0 === $caml_compare($a, $x) ? 1 : (0);
          if ($aZ) {return $aZ;}
          $param__0 = $l;
          continue;
        }
        return 0;
      }
    };
    $memq = function($x, $param) {
      $param__0 = $param;
      for (;;) {
        if ($param__0) {
          $l = $param__0[2];
          $a = $param__0[1];
          $aY = $a === $x ? 1 : (0);
          if ($aY) {return $aY;}
          $param__0 = $l;
          continue;
        }
        return 0;
      }
    };
    $assoc = function($x, $param) use ($Not_found,$caml_compare,$runtime) {
      $param__0 = $param;
      for (;;) {
        if ($param__0) {
          $l = $param__0[2];
          $match = $param__0[1];
          $b = $match[2];
          $a = $match[1];
          if (0 === $caml_compare($a, $x)) {return $b;}
          $param__0 = $l;
          continue;
        }
        throw $runtime["caml_wrap_thrown_exception"]($Not_found);
      }
    };
    $assoc_opt = function($x, $param) use ($caml_compare) {
      $param__0 = $param;
      for (;;) {
        if ($param__0) {
          $l = $param__0[2];
          $match = $param__0[1];
          $b = $match[2];
          $a = $match[1];
          if (0 === $caml_compare($a, $x)) {return Vector{0, $b};}
          $param__0 = $l;
          continue;
        }
        return 0;
      }
    };
    $assq = function($x, $param) use ($Not_found,$runtime) {
      $param__0 = $param;
      for (;;) {
        if ($param__0) {
          $l = $param__0[2];
          $match = $param__0[1];
          $b = $match[2];
          $a = $match[1];
          if ($a === $x) {return $b;}
          $param__0 = $l;
          continue;
        }
        throw $runtime["caml_wrap_thrown_exception"]($Not_found);
      }
    };
    $assq_opt = function($x, $param) {
      $param__0 = $param;
      for (;;) {
        if ($param__0) {
          $l = $param__0[2];
          $match = $param__0[1];
          $b = $match[2];
          $a = $match[1];
          if ($a === $x) {return Vector{0, $b};}
          $param__0 = $l;
          continue;
        }
        return 0;
      }
    };
    $mem_assoc = function($x, $param) use ($caml_compare) {
      $param__0 = $param;
      for (;;) {
        if ($param__0) {
          $l = $param__0[2];
          $match = $param__0[1];
          $a = $match[1];
          $aX = 0 === $caml_compare($a, $x) ? 1 : (0);
          if ($aX) {return $aX;}
          $param__0 = $l;
          continue;
        }
        return 0;
      }
    };
    $mem_assq = function($x, $param) {
      $param__0 = $param;
      for (;;) {
        if ($param__0) {
          $l = $param__0[2];
          $match = $param__0[1];
          $a = $match[1];
          $aW = $a === $x ? 1 : (0);
          if ($aW) {return $aW;}
          $param__0 = $l;
          continue;
        }
        return 0;
      }
    };
    $_ = $remove_assoc->contents =
      function($x, $param) use ($caml_compare,$remove_assoc) {
        if ($param) {
          $l = $param[2];
          $pair = $param[1];
          $a = $pair[1];
          return 0 === $caml_compare($a, $x)
            ? $l
            : (Vector{0, $pair, $remove_assoc->contents($x, $l)});
        }
        return 0;
      };
    $_ = $remove_assq->contents =
      function($x, $param) use ($remove_assq) {
        if ($param) {
          $l = $param[2];
          $pair = $param[1];
          $a = $pair[1];
          return $a === $x
            ? $l
            : (Vector{0, $pair, $remove_assq->contents($x, $l)});
        }
        return 0;
      };
    $find = function($p, $param) use ($Not_found,$caml_call1,$runtime) {
      $param__0 = $param;
      for (;;) {
        if ($param__0) {
          $l = $param__0[2];
          $x = $param__0[1];
          if ($caml_call1($p, $x)) {return $x;}
          $param__0 = $l;
          continue;
        }
        throw $runtime["caml_wrap_thrown_exception"]($Not_found);
      }
    };
    $find_opt = function($p, $param) use ($caml_call1) {
      $param__0 = $param;
      for (;;) {
        if ($param__0) {
          $l = $param__0[2];
          $x = $param__0[1];
          if ($caml_call1($p, $x)) {return Vector{0, $x};}
          $param__0 = $l;
          continue;
        }
        return 0;
      }
    };
    $find_all = function($p) use ($caml_call1,$rev) {
      $find = function($accu, $param) use ($caml_call1,$p,$rev) {
        $accu__0 = $accu;
        $param__0 = $param;
        for (;;) {
          if ($param__0) {
            $l = $param__0[2];
            $x = $param__0[1];
            if ($caml_call1($p, $x)) {
              $accu__1 = Vector{0, $x, $accu__0};
              $accu__0 = $accu__1;
              $param__0 = $l;
              continue;
            }
            $param__0 = $l;
            continue;
          }
          return $rev($accu__0);
        }
      };
      $aU = 0;
      return function($aV) use ($aU,$find) {return $find($aU, $aV);};
    };
    $partition = function($p, $l) use ($caml_call1,$rev) {
      $part = function($yes, $no, $param) use ($caml_call1,$p,$rev) {
        $yes__0 = $yes;
        $no__0 = $no;
        $param__0 = $param;
        for (;;) {
          if ($param__0) {
            $l = $param__0[2];
            $x = $param__0[1];
            if ($caml_call1($p, $x)) {
              $yes__1 = Vector{0, $x, $yes__0};
              $yes__0 = $yes__1;
              $param__0 = $l;
              continue;
            }
            $no__1 = Vector{0, $x, $no__0};
            $no__0 = $no__1;
            $param__0 = $l;
            continue;
          }
          $aT = $rev($no__0);
          return Vector{0, $rev($yes__0), $aT};
        }
      };
      return $part(0, 0, $l);
    };
    $_ = $split->contents =
      function($param) use ($aF,$split) {
        if ($param) {
          $l = $param[2];
          $match = $param[1];
          $y = $match[2];
          $x = $match[1];
          $match__0 = $split->contents($l);
          $ry = $match__0[2];
          $rx = $match__0[1];
          return Vector{0, Vector{0, $x, $rx}, Vector{0, $y, $ry}};
        }
        return $aF;
      };
    $_ = $combine->contents =
      function($l1, $l2) use ($Pervasives,$caml_call1,$combine,$cst_List_combine) {
        if ($l1) {
          if ($l2) {
            $l2__0 = $l2[2];
            $a2 = $l2[1];
            $l1__0 = $l1[2];
            $a1 = $l1[1];
            return Vector{
              0,
              Vector{0, $a1, $a2},
              $combine->contents($l1__0, $l2__0)
            };
          }
        }
        else {if (! $l2) {return 0;}}
        return $caml_call1($Pervasives[1], $cst_List_combine);
      };
    $_ = $merge->contents =
      function($cmp, $l1, $match) use ($caml_call2,$merge) {
        if ($l1) {
          if ($match) {
            $t2 = $match[2];
            $h2 = $match[1];
            $t1 = $l1[2];
            $h1 = $l1[1];
            return 0 < $caml_call2($cmp, $h1, $h2)
              ? Vector{0, $h2, $merge->contents($cmp, $l1, $t2)}
              : (Vector{0, $h1, $merge->contents($cmp, $t1, $match)});
          }
          return $l1;
        }
        return $match;
      };
    $chop = function($k, $l) use ($Assert_failure,$aG,$runtime) {
      $k__0 = $k;
      $l__0 = $l;
      for (;;) {
        if (0 === $k__0) {return $l__0;}
        if ($l__0) {
          $l__1 = $l__0[2];
          $k__1 = $k__0 + -1 | 0;
          $k__0 = $k__1;
          $l__0 = $l__1;
          continue;
        }
        throw $runtime["caml_wrap_thrown_exception"](Vector{0, $Assert_failure, $aG});
      }
    };
    $stable_sort = function($cmp, $l) use ($caml_call2,$chop,$length,$rev_append,$right_shift_32) {
      $rev_sort = new Ref();
      $rev_merge = function($l1, $l2, $accu) use ($caml_call2,$cmp,$rev_append) {
        $l1__0 = $l1;
        $l2__0 = $l2;
        $accu__0 = $accu;
        for (;;) {
          if ($l1__0) {
            if ($l2__0) {
              $t2 = $l2__0[2];
              $h2 = $l2__0[1];
              $t1 = $l1__0[2];
              $h1 = $l1__0[1];
              if (0 < $caml_call2($cmp, $h1, $h2)) {
                $accu__1 = Vector{0, $h2, $accu__0};
                $l2__0 = $t2;
                $accu__0 = $accu__1;
                continue;
              }
              $accu__2 = Vector{0, $h1, $accu__0};
              $l1__0 = $t1;
              $accu__0 = $accu__2;
              continue;
            }
            return $rev_append($l1__0, $accu__0);
          }
          return $rev_append($l2__0, $accu__0);
        }
      };
      $rev_merge_rev = function($l1, $l2, $accu) use ($caml_call2,$cmp,$rev_append) {
        $l1__0 = $l1;
        $l2__0 = $l2;
        $accu__0 = $accu;
        for (;;) {
          if ($l1__0) {
            if ($l2__0) {
              $t2 = $l2__0[2];
              $h2 = $l2__0[1];
              $t1 = $l1__0[2];
              $h1 = $l1__0[1];
              if (0 < $caml_call2($cmp, $h1, $h2)) {
                $accu__1 = Vector{0, $h1, $accu__0};
                $l1__0 = $t1;
                $accu__0 = $accu__1;
                continue;
              }
              $accu__2 = Vector{0, $h2, $accu__0};
              $l2__0 = $t2;
              $accu__0 = $accu__2;
              continue;
            }
            return $rev_append($l1__0, $accu__0);
          }
          return $rev_append($l2__0, $accu__0);
        }
      };
      $sort = function($n, $l) use ($caml_call2,$chop,$cmp,$rev_merge_rev,$rev_sort,$right_shift_32) {
        if (2 === $n) {
          if ($l) {
            $aQ = $l[2];
            if ($aQ) {
              $x2 = $aQ[1];
              $x1 = $l[1];
              return 0 < $caml_call2($cmp, $x1, $x2)
                ? Vector{0, $x2, Vector{0, $x1, 0}}
                : (Vector{0, $x1, Vector{0, $x2, 0}});
            }
          }
        }
        else {
          if (3 === $n) {
            if ($l) {
              $aR = $l[2];
              if ($aR) {
                $aS = $aR[2];
                if ($aS) {
                  $x3 = $aS[1];
                  $x2__0 = $aR[1];
                  $x1__0 = $l[1];
                  return 0 < $caml_call2($cmp, $x1__0, $x2__0)
                    ? 0 < $caml_call2($cmp, $x1__0, $x3)
                     ? 0 < $caml_call2($cmp, $x2__0, $x3)
                      ? Vector{0, $x3, Vector{0, $x2__0, Vector{0, $x1__0, 0}}}
                      : (Vector{0, $x2__0, Vector{0, $x3, Vector{0, $x1__0, 0}}})
                     : (Vector{0, $x2__0, Vector{0, $x1__0, Vector{0, $x3, 0}}})
                    : (0 < $caml_call2($cmp, $x2__0, $x3)
                     ? 0 < $caml_call2($cmp, $x1__0, $x3)
                      ? Vector{0, $x3, Vector{0, $x1__0, Vector{0, $x2__0, 0}}}
                      : (Vector{0, $x1__0, Vector{0, $x3, Vector{0, $x2__0, 0}}})
                     : (Vector{0, $x1__0, Vector{0, $x2__0, Vector{0, $x3, 0}}}));
                }
              }
            }
          }
        }
        $n1 = $right_shift_32($n, 1);
        $n2 = $n - $n1 | 0;
        $l2 = $chop($n1, $l);
        $s1 = $rev_sort->contents($n1, $l);
        $s2 = $rev_sort->contents($n2, $l2);
        return $rev_merge_rev($s1, $s2, 0);
      };
      $_ = $rev_sort->contents =
        function($n, $l) use ($caml_call2,$chop,$cmp,$rev_merge,$right_shift_32,$sort) {
          if (2 === $n) {
            if ($l) {
              $aN = $l[2];
              if ($aN) {
                $x2 = $aN[1];
                $x1 = $l[1];
                return 0 < $caml_call2($cmp, $x1, $x2)
                  ? Vector{0, $x1, Vector{0, $x2, 0}}
                  : (Vector{0, $x2, Vector{0, $x1, 0}});
              }
            }
          }
          else {
            if (3 === $n) {
              if ($l) {
                $aO = $l[2];
                if ($aO) {
                  $aP = $aO[2];
                  if ($aP) {
                    $x3 = $aP[1];
                    $x2__0 = $aO[1];
                    $x1__0 = $l[1];
                    return 0 < $caml_call2($cmp, $x1__0, $x2__0)
                      ? 0 < $caml_call2($cmp, $x2__0, $x3)
                       ? Vector{0, $x1__0, Vector{0, $x2__0, Vector{0, $x3, 0}}}
                       : (0 < $caml_call2($cmp, $x1__0, $x3)
                        ? Vector{0, $x1__0, Vector{0, $x3, Vector{0, $x2__0, 0}}}
                        : (Vector{0, $x3, Vector{0, $x1__0, Vector{0, $x2__0, 0}}}))
                      : (0 < $caml_call2($cmp, $x1__0, $x3)
                       ? Vector{0, $x2__0, Vector{0, $x1__0, Vector{0, $x3, 0}}}
                       : (0 < $caml_call2($cmp, $x2__0, $x3)
                        ? Vector{0, $x2__0, Vector{0, $x3, Vector{0, $x1__0, 0}}}
                        : (Vector{0, $x3, Vector{0, $x2__0, Vector{0, $x1__0, 0}}})));
                  }
                }
              }
            }
          }
          $n1 = $right_shift_32($n, 1);
          $n2 = $n - $n1 | 0;
          $l2 = $chop($n1, $l);
          $s1 = $sort($n1, $l);
          $s2 = $sort($n2, $l2);
          return $rev_merge($s1, $s2, 0);
        };
      $len = $length($l);
      return 2 <= $len ? $sort($len, $l) : ($l);
    };
    $sort_uniq = function($cmp, $l) use ($caml_call2,$chop,$length,$rev_append,$right_shift_32) {
      $rev_sort = new Ref();
      $rev_merge = function($l1, $l2, $accu) use ($caml_call2,$cmp,$rev_append) {
        $l1__0 = $l1;
        $l2__0 = $l2;
        $accu__0 = $accu;
        for (;;) {
          if ($l1__0) {
            if ($l2__0) {
              $t2 = $l2__0[2];
              $h2 = $l2__0[1];
              $t1 = $l1__0[2];
              $h1 = $l1__0[1];
              $c = $caml_call2($cmp, $h1, $h2);
              if (0 === $c) {
                $accu__1 = Vector{0, $h1, $accu__0};
                $l1__0 = $t1;
                $l2__0 = $t2;
                $accu__0 = $accu__1;
                continue;
              }
              if (0 <= $c) {
                $accu__2 = Vector{0, $h2, $accu__0};
                $l2__0 = $t2;
                $accu__0 = $accu__2;
                continue;
              }
              $accu__3 = Vector{0, $h1, $accu__0};
              $l1__0 = $t1;
              $accu__0 = $accu__3;
              continue;
            }
            return $rev_append($l1__0, $accu__0);
          }
          return $rev_append($l2__0, $accu__0);
        }
      };
      $rev_merge_rev = function($l1, $l2, $accu) use ($caml_call2,$cmp,$rev_append) {
        $l1__0 = $l1;
        $l2__0 = $l2;
        $accu__0 = $accu;
        for (;;) {
          if ($l1__0) {
            if ($l2__0) {
              $t2 = $l2__0[2];
              $h2 = $l2__0[1];
              $t1 = $l1__0[2];
              $h1 = $l1__0[1];
              $c = $caml_call2($cmp, $h1, $h2);
              if (0 === $c) {
                $accu__1 = Vector{0, $h1, $accu__0};
                $l1__0 = $t1;
                $l2__0 = $t2;
                $accu__0 = $accu__1;
                continue;
              }
              if (0 < $c) {
                $accu__2 = Vector{0, $h1, $accu__0};
                $l1__0 = $t1;
                $accu__0 = $accu__2;
                continue;
              }
              $accu__3 = Vector{0, $h2, $accu__0};
              $l2__0 = $t2;
              $accu__0 = $accu__3;
              continue;
            }
            return $rev_append($l1__0, $accu__0);
          }
          return $rev_append($l2__0, $accu__0);
        }
      };
      $sort = function($n, $l) use ($caml_call2,$chop,$cmp,$rev_merge_rev,$rev_sort,$right_shift_32) {
        if (2 === $n) {
          if ($l) {
            $aK = $l[2];
            if ($aK) {
              $x2 = $aK[1];
              $x1 = $l[1];
              $c = $caml_call2($cmp, $x1, $x2);
              return 0 === $c
                ? Vector{0, $x1, 0}
                : (0 <= $c
                 ? Vector{0, $x2, Vector{0, $x1, 0}}
                 : (Vector{0, $x1, Vector{0, $x2, 0}}));
            }
          }
        }
        else {
          if (3 === $n) {
            if ($l) {
              $aL = $l[2];
              if ($aL) {
                $aM = $aL[2];
                if ($aM) {
                  $x3 = $aM[1];
                  $x2__0 = $aL[1];
                  $x1__0 = $l[1];
                  $c__0 = $caml_call2($cmp, $x1__0, $x2__0);
                  if (0 === $c__0) {
                    $c__1 = $caml_call2($cmp, $x2__0, $x3);
                    return 0 === $c__1
                      ? Vector{0, $x2__0, 0}
                      : (0 <= $c__1
                       ? Vector{0, $x3, Vector{0, $x2__0, 0}}
                       : (Vector{0, $x2__0, Vector{0, $x3, 0}}));
                  }
                  if (0 <= $c__0) {
                    $c__2 = $caml_call2($cmp, $x1__0, $x3);
                    if (0 === $c__2) {
                      return Vector{0, $x2__0, Vector{0, $x1__0, 0}};
                    }
                    if (0 <= $c__2) {
                      $c__3 = $caml_call2($cmp, $x2__0, $x3);
                      return 0 === $c__3
                        ? Vector{0, $x2__0, Vector{0, $x1__0, 0}}
                        : (0 <= $c__3
                         ? Vector{0, $x3, Vector{0, $x2__0, Vector{0, $x1__0, 0}}}
                         : (Vector{0, $x2__0, Vector{0, $x3, Vector{0, $x1__0, 0}}}));
                    }
                    return Vector{
                      0,
                      $x2__0,
                      Vector{0, $x1__0, Vector{0, $x3, 0}}
                    };
                  }
                  $c__4 = $caml_call2($cmp, $x2__0, $x3);
                  if (0 === $c__4) {
                    return Vector{0, $x1__0, Vector{0, $x2__0, 0}};
                  }
                  if (0 <= $c__4) {
                    $c__5 = $caml_call2($cmp, $x1__0, $x3);
                    return 0 === $c__5
                      ? Vector{0, $x1__0, Vector{0, $x2__0, 0}}
                      : (0 <= $c__5
                       ? Vector{0, $x3, Vector{0, $x1__0, Vector{0, $x2__0, 0}}}
                       : (Vector{0, $x1__0, Vector{0, $x3, Vector{0, $x2__0, 0}}}));
                  }
                  return Vector{
                    0,
                    $x1__0,
                    Vector{0, $x2__0, Vector{0, $x3, 0}}
                  };
                }
              }
            }
          }
        }
        $n1 = $right_shift_32($n, 1);
        $n2 = $n - $n1 | 0;
        $l2 = $chop($n1, $l);
        $s1 = $rev_sort->contents($n1, $l);
        $s2 = $rev_sort->contents($n2, $l2);
        return $rev_merge_rev($s1, $s2, 0);
      };
      $_ = $rev_sort->contents =
        function($n, $l) use ($caml_call2,$chop,$cmp,$rev_merge,$right_shift_32,$sort) {
          if (2 === $n) {
            if ($l) {
              $aH = $l[2];
              if ($aH) {
                $x2 = $aH[1];
                $x1 = $l[1];
                $c = $caml_call2($cmp, $x1, $x2);
                return 0 === $c
                  ? Vector{0, $x1, 0}
                  : (0 < $c
                   ? Vector{0, $x1, Vector{0, $x2, 0}}
                   : (Vector{0, $x2, Vector{0, $x1, 0}}));
              }
            }
          }
          else {
            if (3 === $n) {
              if ($l) {
                $aI = $l[2];
                if ($aI) {
                  $aJ = $aI[2];
                  if ($aJ) {
                    $x3 = $aJ[1];
                    $x2__0 = $aI[1];
                    $x1__0 = $l[1];
                    $c__0 = $caml_call2($cmp, $x1__0, $x2__0);
                    if (0 === $c__0) {
                      $c__1 = $caml_call2($cmp, $x2__0, $x3);
                      return 0 === $c__1
                        ? Vector{0, $x2__0, 0}
                        : (0 < $c__1
                         ? Vector{0, $x2__0, Vector{0, $x3, 0}}
                         : (Vector{0, $x3, Vector{0, $x2__0, 0}}));
                    }
                    if (0 < $c__0) {
                      $c__2 = $caml_call2($cmp, $x2__0, $x3);
                      if (0 === $c__2) {
                        return Vector{0, $x1__0, Vector{0, $x2__0, 0}};
                      }
                      if (0 < $c__2) {
                        return Vector{
                          0,
                          $x1__0,
                          Vector{0, $x2__0, Vector{0, $x3, 0}}
                        };
                      }
                      $c__3 = $caml_call2($cmp, $x1__0, $x3);
                      return 0 === $c__3
                        ? Vector{0, $x1__0, Vector{0, $x2__0, 0}}
                        : (0 < $c__3
                         ? Vector{0, $x1__0, Vector{0, $x3, Vector{0, $x2__0, 0}}}
                         : (Vector{0, $x3, Vector{0, $x1__0, Vector{0, $x2__0, 0}}}));
                    }
                    $c__4 = $caml_call2($cmp, $x1__0, $x3);
                    if (0 === $c__4) {
                      return Vector{0, $x2__0, Vector{0, $x1__0, 0}};
                    }
                    if (0 < $c__4) {
                      return Vector{
                        0,
                        $x2__0,
                        Vector{0, $x1__0, Vector{0, $x3, 0}}
                      };
                    }
                    $c__5 = $caml_call2($cmp, $x2__0, $x3);
                    return 0 === $c__5
                      ? Vector{0, $x2__0, Vector{0, $x1__0, 0}}
                      : (0 < $c__5
                       ? Vector{0, $x2__0, Vector{0, $x3, Vector{0, $x1__0, 0}}}
                       : (Vector{0, $x3, Vector{0, $x2__0, Vector{0, $x1__0, 0}}}));
                  }
                }
              }
            }
          }
          $n1 = $right_shift_32($n, 1);
          $n2 = $n - $n1 | 0;
          $l2 = $chop($n1, $l);
          $s1 = $sort($n1, $l);
          $s2 = $sort($n2, $l2);
          return $rev_merge($s1, $s2, 0);
        };
      $len = $length($l);
      return 2 <= $len ? $sort($len, $l) : ($l);
    };
    $compare_lengths = function($l1, $l2) {
      $l1__0 = $l1;
      $l2__0 = $l2;
      for (;;) {
        if ($l1__0) {
          if ($l2__0) {
            $l2__1 = $l2__0[2];
            $l1__1 = $l1__0[2];
            $l1__0 = $l1__1;
            $l2__0 = $l2__1;
            continue;
          }
          return 1;
        }
        return $l2__0 ? -1 : (0);
      }
    };
    $compare_length_with = function($l, $n) {
      $l__0 = $l;
      $n__0 = $n;
      for (;;) {
        if ($l__0) {
          $l__1 = $l__0[2];
          if (0 < $n__0) {
            $n__1 = $n__0 + -1 | 0;
            $l__0 = $l__1;
            $n__0 = $n__1;
            continue;
          }
          return 1;
        }
        return 0 === $n__0 ? 0 : (0 < $n__0 ? -1 : (1));
      }
    };
    $List = Vector{
      0,
      $length,
      $compare_lengths,
      $compare_length_with,
      $cons,
      $hd,
      $tl,
      $nth,
      $nth_opt,
      $rev,
      $init,
      $append,
      $rev_append,
      $flatten->contents,
      $flatten->contents,
      $iter,
      $iteri,
      $map->contents,
      $mapi,
      $rev_map,
      $fold_left,
      $fold_right->contents,
      $iter2,
      $map2->contents,
      $rev_map2,
      $fold_left2,
      $fold_right2->contents,
      $for_all,
      $exists,
      $for_all2,
      $exists2,
      $mem,
      $memq,
      $find,
      $find_opt,
      $find_all,
      $find_all,
      $partition,
      $assoc,
      $assoc_opt,
      $assq,
      $assq_opt,
      $mem_assoc,
      $mem_assq,
      $remove_assoc->contents,
      $remove_assq->contents,
      $split->contents,
      $combine->contents,
      $stable_sort,
      $stable_sort,
      $stable_sort,
      $sort_uniq,
      $merge->contents
    };
    
    $runtime["caml_register_global"](19, $List, "List_");

  }
}