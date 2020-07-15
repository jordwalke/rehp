<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class Stdlib__list {
  <<__Override, __Memoize>>
  public static function get() : Vector<dynamic> {
    
    $b_ = new Ref();
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
    $runtime = (\Rehack\GlobalObject::get() as dynamic)->jsoo_runtime;
    $call1 = $runtime["caml_call1"];
    $call2 = $runtime["caml_call2"];
    $call3 = $runtime["caml_call3"];
    $caml_compare = $runtime["caml_compare"];
    $string = $runtime["caml_new_string"];
    $caml_wrap_thrown_exception = $runtime["caml_wrap_thrown_exception"];
    $is_int = $runtime["is_int"];
    $right_shift_32 = $runtime["right_shift_32"];
    $cst_List_map2 = $string("List.map2");
    $cst_List_iter2 = $string("List.iter2");
    $cst_List_fold_left2 = $string("List.fold_left2");
    $cst_List_fold_right2 = $string("List.fold_right2");
    $cst_List_for_all2 = $string("List.for_all2");
    $cst_List_exists2 = $string("List.exists2");
    $cst_List_combine = $string("List.combine");
    $cst_List_rev_map2 = $string("List.rev_map2");
    $cst_List_init = $string("List.init");
    $cst_List_nth__0 = $string("List.nth");
    $cst_nth = $string("nth");
    $cst_List_nth = $string("List.nth");
    $cst_tl = $string("tl");
    $cst_hd = $string("hd");
    $Stdlib = Stdlib::get();
    $Assert_failure = Assert_failure::get();
    $Stdlib_seq = Stdlib__seq::get();
    $Stdlib_sys = Stdlib__sys::get();
    $d_ = Vector{0, 0, 0} as dynamic;
    $e_ = Vector{0, $string("list.ml"), 282, 11} as dynamic;
    $length_aux = (dynamic $len, dynamic $param) : dynamic ==> {
      $len__1 = null as dynamic;
      $param__1 = null as dynamic;
      $len__0 = $len;
      $param__0 = $param;
      for (;;) {
        if ($param__0) {
          $param__1 = $param__0[2];
          $len__1 = (int) ($len__0 + 1) as dynamic;
          $len__0 = $len__1;
          $param__0 = $param__1;
          continue;
        }
        return $len__0;
      }
    };
    $length = (dynamic $l) : dynamic ==> {return $length_aux(0, $l);};
    $cons = (dynamic $a, dynamic $l) : dynamic ==> {return Vector{0, $a, $l};};
    $hd = (dynamic $param) : dynamic ==> {
      $a = null as dynamic;
      if ($param) {$a = $param[1];return $a;}
      return $call1($Stdlib[2], $cst_hd);
    };
    $tl = (dynamic $param) : dynamic ==> {
      $l = null as dynamic;
      if ($param) {$l = $param[2];return $l;}
      return $call1($Stdlib[2], $cst_tl);
    };
    $nth = (dynamic $l, dynamic $n) : dynamic ==> {
      $nth_aux = null as dynamic;
      if (0 <= $n) {
        $nth_aux = (dynamic $l, dynamic $n) : dynamic ==> {
          $a = null as dynamic;
          $l__1 = null as dynamic;
          $n__1 = null as dynamic;
          $l__0 = $l;
          $n__0 = $n;
          for (;;) {
            if ($l__0) {
              $l__1 = $l__0[2];
              $a = $l__0[1];
              if (0 === $n__0) {return $a;}
              $n__1 = (int) ($n__0 + -1) as dynamic;
              $l__0 = $l__1;
              $n__0 = $n__1;
              continue;
            }
            return $call1($Stdlib[2], $cst_nth);
          }
        };
        return $nth_aux($l, $n);
      }
      return $call1($Stdlib[1], $cst_List_nth);
    };
    $nth_opt = (dynamic $l, dynamic $n) : dynamic ==> {
      $nth_aux = null as dynamic;
      if (0 <= $n) {
        $nth_aux = (dynamic $l, dynamic $n) : dynamic ==> {
          $a = null as dynamic;
          $l__1 = null as dynamic;
          $n__1 = null as dynamic;
          $l__0 = $l;
          $n__0 = $n;
          for (;;) {
            if ($l__0) {
              $l__1 = $l__0[2];
              $a = $l__0[1];
              if (0 === $n__0) {return Vector{0, $a};}
              $n__1 = (int) ($n__0 + -1) as dynamic;
              $l__0 = $l__1;
              $n__0 = $n__1;
              continue;
            }
            return 0;
          }
        };
        return $nth_aux($l, $n);
      }
      return $call1($Stdlib[1], $cst_List_nth__0);
    };
    $a_ = $Stdlib[37];
    $rev_append = (dynamic $l1, dynamic $l2) : dynamic ==> {
      $a = null as dynamic;
      $l1__1 = null as dynamic;
      $l2__1 = null as dynamic;
      $l1__0 = $l1;
      $l2__0 = $l2;
      for (;;) {
        if ($l1__0) {
          $l1__1 = $l1__0[2];
          $a = $l1__0[1];
          $l2__1 = Vector{0, $a, $l2__0} as dynamic;
          $l1__0 = $l1__1;
          $l2__0 = $l2__1;
          continue;
        }
        return $l2__0;
      }
    };
    $rev = (dynamic $l) : dynamic ==> {return $rev_append($l, 0);};
    $init_tailrec_aux = (dynamic $acc, dynamic $i, dynamic $n, dynamic $f) : dynamic ==> {
      $acc__1 = null as dynamic;
      $i__1 = null as dynamic;
      $acc__0 = $acc;
      $i__0 = $i;
      for (;;) {
        if ($n <= $i__0) {return $acc__0;}
        $i__1 = (int) ($i__0 + 1) as dynamic;
        $acc__1 = Vector{0, $call1($f, $i__0), $acc__0} as dynamic;
        $acc__0 = $acc__1;
        $i__0 = $i__1;
        continue;
      }
    };
    $init_aux->contents = (dynamic $i, dynamic $n, dynamic $f) : dynamic ==> {
      if ($n <= $i) {return 0;}
      $r = $call1($f, $i);
      return Vector{0, $r, $init_aux->contents((int) ($i + 1), $n, $f)};
    };
    $rev_init_threshold = $is_int($Stdlib_sys[6]) ? 10000 : (50);
    $init = (dynamic $len, dynamic $f) : dynamic ==> {
      return 0 <= $len
        ? $rev_init_threshold < $len
         ? $rev($init_tailrec_aux(0, 0, $len, $f))
         : ($init_aux->contents(0, $len, $f))
        : ($call1($Stdlib[1], $cst_List_init));
    };
    $flatten->contents = (dynamic $param) : dynamic ==> {
      $I_ = null as dynamic;
      $l = null as dynamic;
      $r = null as dynamic;
      if ($param) {
        $r = $param[2];
        $l = $param[1];
        $I_ = $flatten->contents($r);
        return $call2($Stdlib[37], $l, $I_);
      }
      return 0;
    };
    $map->contents = (dynamic $f, dynamic $param) : dynamic ==> {
      $a = null as dynamic;
      $l = null as dynamic;
      $r = null as dynamic;
      if ($param) {
        $l = $param[2];
        $a = $param[1];
        $r = $call1($f, $a);
        return Vector{0, $r, $map->contents($f, $l)};
      }
      return 0;
    };
    $b_->contents = (dynamic $i, dynamic $f, dynamic $param) : dynamic ==> {
      $a = null as dynamic;
      $l = null as dynamic;
      $r = null as dynamic;
      if ($param) {
        $l = $param[2];
        $a = $param[1];
        $r = $call2($f, $i, $a);
        return Vector{0, $r, $b_->contents((int) ($i + 1), $f, $l)};
      }
      return 0;
    };
    $mapi = (dynamic $f, dynamic $l) : dynamic ==> {
      return $b_->contents(0, $f, $l);
    };
    $rev_map = (dynamic $f, dynamic $l) : dynamic ==> {
      $rmap_f = (dynamic $accu, dynamic $param) : dynamic ==> {
        $a = null as dynamic;
        $accu__1 = null as dynamic;
        $param__1 = null as dynamic;
        $accu__0 = $accu;
        $param__0 = $param;
        for (;;) {
          if ($param__0) {
            $param__1 = $param__0[2];
            $a = $param__0[1];
            $accu__1 = Vector{0, $call1($f, $a), $accu__0} as dynamic;
            $accu__0 = $accu__1;
            $param__0 = $param__1;
            continue;
          }
          return $accu__0;
        }
      };
      return $rmap_f(0, $l);
    };
    $iter = (dynamic $f, dynamic $param) : dynamic ==> {
      $a = null as dynamic;
      $param__1 = null as dynamic;
      $param__0 = $param;
      for (;;) {
        if ($param__0) {
          $param__1 = $param__0[2];
          $a = $param__0[1];
          $call1($f, $a);
          $param__0 = $param__1;
          continue;
        }
        return 0;
      }
    };
    $c_ = (dynamic $i, dynamic $f, dynamic $param) : dynamic ==> {
      $a = null as dynamic;
      $i__1 = null as dynamic;
      $param__1 = null as dynamic;
      $i__0 = $i;
      $param__0 = $param;
      for (;;) {
        if ($param__0) {
          $param__1 = $param__0[2];
          $a = $param__0[1];
          $call2($f, $i__0, $a);
          $i__1 = (int) ($i__0 + 1) as dynamic;
          $i__0 = $i__1;
          $param__0 = $param__1;
          continue;
        }
        return 0;
      }
    };
    $iteri = (dynamic $f, dynamic $l) : dynamic ==> {return $c_(0, $f, $l);};
    $fold_left = (dynamic $f, dynamic $accu, dynamic $l) : dynamic ==> {
      $a = null as dynamic;
      $accu__1 = null as dynamic;
      $l__1 = null as dynamic;
      $accu__0 = $accu;
      $l__0 = $l;
      for (;;) {
        if ($l__0) {
          $l__1 = $l__0[2];
          $a = $l__0[1];
          $accu__1 = $call2($f, $accu__0, $a);
          $accu__0 = $accu__1;
          $l__0 = $l__1;
          continue;
        }
        return $accu__0;
      }
    };
    $fold_right->contents = (dynamic $f, dynamic $l, dynamic $accu) : dynamic ==> {
      $a = null as dynamic;
      $l__0 = null as dynamic;
      if ($l) {
        $l__0 = $l[2];
        $a = $l[1];
        return $call2($f, $a, $fold_right->contents($f, $l__0, $accu));
      }
      return $accu;
    };
    $map2->contents = (dynamic $f, dynamic $l1, dynamic $l2) : dynamic ==> {
      $a1 = null as dynamic;
      $a2 = null as dynamic;
      $l1__0 = null as dynamic;
      $l2__0 = null as dynamic;
      $r = null as dynamic;
      if ($l1) {
        if ($l2) {
          $l2__0 = $l2[2];
          $a2 = $l2[1];
          $l1__0 = $l1[2];
          $a1 = $l1[1];
          $r = $call2($f, $a1, $a2);
          return Vector{0, $r, $map2->contents($f, $l1__0, $l2__0)};
        }
      }
      else {if (! $l2) {return 0;}}
      return $call1($Stdlib[1], $cst_List_map2);
    };
    $rev_map2 = (dynamic $f, dynamic $l1, dynamic $l2) : dynamic ==> {
      $rmap2_f = (dynamic $accu, dynamic $l1, dynamic $l2) : dynamic ==> {
        $a1 = null as dynamic;
        $a2 = null as dynamic;
        $accu__1 = null as dynamic;
        $l1__1 = null as dynamic;
        $l2__1 = null as dynamic;
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
              $accu__1 = Vector{0, $call2($f, $a1, $a2), $accu__0} as dynamic;
              $accu__0 = $accu__1;
              $l1__0 = $l1__1;
              $l2__0 = $l2__1;
              continue;
            }
          }
          else {if (! $l2__0) {return $accu__0;}}
          return $call1($Stdlib[1], $cst_List_rev_map2);
        }
      };
      return $rmap2_f(0, $l1, $l2);
    };
    $iter2 = (dynamic $f, dynamic $l1, dynamic $l2) : dynamic ==> {
      $a1 = null as dynamic;
      $a2 = null as dynamic;
      $l1__1 = null as dynamic;
      $l2__1 = null as dynamic;
      $l1__0 = $l1;
      $l2__0 = $l2;
      for (;;) {
        if ($l1__0) {
          if ($l2__0) {
            $l2__1 = $l2__0[2];
            $a2 = $l2__0[1];
            $l1__1 = $l1__0[2];
            $a1 = $l1__0[1];
            $call2($f, $a1, $a2);
            $l1__0 = $l1__1;
            $l2__0 = $l2__1;
            continue;
          }
        }
        else {if (! $l2__0) {return 0;}}
        return $call1($Stdlib[1], $cst_List_iter2);
      }
    };
    $fold_left2 = (dynamic $f, dynamic $accu, dynamic $l1, dynamic $l2) : dynamic ==> {
      $a1 = null as dynamic;
      $a2 = null as dynamic;
      $accu__1 = null as dynamic;
      $l1__1 = null as dynamic;
      $l2__1 = null as dynamic;
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
            $accu__1 = $call3($f, $accu__0, $a1, $a2);
            $accu__0 = $accu__1;
            $l1__0 = $l1__1;
            $l2__0 = $l2__1;
            continue;
          }
        }
        else {if (! $l2__0) {return $accu__0;}}
        return $call1($Stdlib[1], $cst_List_fold_left2);
      }
    };
    $fold_right2->contents = 
    (dynamic $f, dynamic $l1, dynamic $l2, dynamic $accu) : dynamic ==> {
      $a1 = null as dynamic;
      $a2 = null as dynamic;
      $l1__0 = null as dynamic;
      $l2__0 = null as dynamic;
      if ($l1) {
        if ($l2) {
          $l2__0 = $l2[2];
          $a2 = $l2[1];
          $l1__0 = $l1[2];
          $a1 = $l1[1];
          return $call3(
            $f,
            $a1,
            $a2,
            $fold_right2->contents($f, $l1__0, $l2__0, $accu)
          );
        }
      }
      else {if (! $l2) {return $accu;}}
      return $call1($Stdlib[1], $cst_List_fold_right2);
    };
    $for_all = (dynamic $p, dynamic $param) : dynamic ==> {
      $H_ = null as dynamic;
      $a = null as dynamic;
      $l = null as dynamic;
      $param__0 = $param;
      for (;;) {
        if ($param__0) {
          $l = $param__0[2];
          $a = $param__0[1];
          $H_ = $call1($p, $a);
          if ($H_) {$param__0 = $l;continue;}
          return $H_;
        }
        return 1;
      }
    };
    $exists = (dynamic $p, dynamic $param) : dynamic ==> {
      $G_ = null as dynamic;
      $a = null as dynamic;
      $l = null as dynamic;
      $param__0 = $param;
      for (;;) {
        if ($param__0) {
          $l = $param__0[2];
          $a = $param__0[1];
          $G_ = $call1($p, $a);
          if ($G_) {return $G_;}
          $param__0 = $l;
          continue;
        }
        return 0;
      }
    };
    $for_all2 = (dynamic $p, dynamic $l1, dynamic $l2) : dynamic ==> {
      $F_ = null as dynamic;
      $a1 = null as dynamic;
      $a2 = null as dynamic;
      $l1__1 = null as dynamic;
      $l2__1 = null as dynamic;
      $l1__0 = $l1;
      $l2__0 = $l2;
      for (;;) {
        if ($l1__0) {
          if ($l2__0) {
            $l2__1 = $l2__0[2];
            $a2 = $l2__0[1];
            $l1__1 = $l1__0[2];
            $a1 = $l1__0[1];
            $F_ = $call2($p, $a1, $a2);
            if ($F_) {$l1__0 = $l1__1;$l2__0 = $l2__1;continue;}
            return $F_;
          }
        }
        else {if (! $l2__0) {return 1;}}
        return $call1($Stdlib[1], $cst_List_for_all2);
      }
    };
    $exists2 = (dynamic $p, dynamic $l1, dynamic $l2) : dynamic ==> {
      $E_ = null as dynamic;
      $a1 = null as dynamic;
      $a2 = null as dynamic;
      $l1__1 = null as dynamic;
      $l2__1 = null as dynamic;
      $l1__0 = $l1;
      $l2__0 = $l2;
      for (;;) {
        if ($l1__0) {
          if ($l2__0) {
            $l2__1 = $l2__0[2];
            $a2 = $l2__0[1];
            $l1__1 = $l1__0[2];
            $a1 = $l1__0[1];
            $E_ = $call2($p, $a1, $a2);
            if ($E_) {return $E_;}
            $l1__0 = $l1__1;
            $l2__0 = $l2__1;
            continue;
          }
        }
        else {if (! $l2__0) {return 0;}}
        return $call1($Stdlib[1], $cst_List_exists2);
      }
    };
    $mem = (dynamic $x, dynamic $param) : dynamic ==> {
      $D_ = null as dynamic;
      $a = null as dynamic;
      $l = null as dynamic;
      $param__0 = $param;
      for (;;) {
        if ($param__0) {
          $l = $param__0[2];
          $a = $param__0[1];
          $D_ = 0 === $caml_compare($a, $x) ? 1 : (0);
          if ($D_) {return $D_;}
          $param__0 = $l;
          continue;
        }
        return 0;
      }
    };
    $memq = (dynamic $x, dynamic $param) : dynamic ==> {
      $C_ = null as dynamic;
      $a = null as dynamic;
      $l = null as dynamic;
      $param__0 = $param;
      for (;;) {
        if ($param__0) {
          $l = $param__0[2];
          $a = $param__0[1];
          $C_ = $a === $x ? 1 : (0);
          if ($C_) {return $C_;}
          $param__0 = $l;
          continue;
        }
        return 0;
      }
    };
    $assoc = (dynamic $x, dynamic $param) : dynamic ==> {
      $a = null as dynamic;
      $b = null as dynamic;
      $l = null as dynamic;
      $match = null as dynamic;
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
        throw $caml_wrap_thrown_exception($Stdlib[8]) as \Throwable;
      }
    };
    $assoc_opt = (dynamic $x, dynamic $param) : dynamic ==> {
      $a = null as dynamic;
      $b = null as dynamic;
      $l = null as dynamic;
      $match = null as dynamic;
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
    $assq = (dynamic $x, dynamic $param) : dynamic ==> {
      $a = null as dynamic;
      $b = null as dynamic;
      $l = null as dynamic;
      $match = null as dynamic;
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
        throw $caml_wrap_thrown_exception($Stdlib[8]) as \Throwable;
      }
    };
    $assq_opt = (dynamic $x, dynamic $param) : dynamic ==> {
      $a = null as dynamic;
      $b = null as dynamic;
      $l = null as dynamic;
      $match = null as dynamic;
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
    $mem_assoc = (dynamic $x, dynamic $param) : dynamic ==> {
      $B_ = null as dynamic;
      $a = null as dynamic;
      $l = null as dynamic;
      $match = null as dynamic;
      $param__0 = $param;
      for (;;) {
        if ($param__0) {
          $l = $param__0[2];
          $match = $param__0[1];
          $a = $match[1];
          $B_ = 0 === $caml_compare($a, $x) ? 1 : (0);
          if ($B_) {return $B_;}
          $param__0 = $l;
          continue;
        }
        return 0;
      }
    };
    $mem_assq = (dynamic $x, dynamic $param) : dynamic ==> {
      $A_ = null as dynamic;
      $a = null as dynamic;
      $l = null as dynamic;
      $match = null as dynamic;
      $param__0 = $param;
      for (;;) {
        if ($param__0) {
          $l = $param__0[2];
          $match = $param__0[1];
          $a = $match[1];
          $A_ = $a === $x ? 1 : (0);
          if ($A_) {return $A_;}
          $param__0 = $l;
          continue;
        }
        return 0;
      }
    };
    $remove_assoc->contents = (dynamic $x, dynamic $param) : dynamic ==> {
      $a = null as dynamic;
      $l = null as dynamic;
      $pair = null as dynamic;
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
    $remove_assq->contents = (dynamic $x, dynamic $param) : dynamic ==> {
      $a = null as dynamic;
      $l = null as dynamic;
      $pair = null as dynamic;
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
    $find = (dynamic $p, dynamic $param) : dynamic ==> {
      $l = null as dynamic;
      $x = null as dynamic;
      $param__0 = $param;
      for (;;) {
        if ($param__0) {
          $l = $param__0[2];
          $x = $param__0[1];
          if ($call1($p, $x)) {return $x;}
          $param__0 = $l;
          continue;
        }
        throw $caml_wrap_thrown_exception($Stdlib[8]) as \Throwable;
      }
    };
    $find_opt = (dynamic $p, dynamic $param) : dynamic ==> {
      $l = null as dynamic;
      $x = null as dynamic;
      $param__0 = $param;
      for (;;) {
        if ($param__0) {
          $l = $param__0[2];
          $x = $param__0[1];
          if ($call1($p, $x)) {return Vector{0, $x};}
          $param__0 = $l;
          continue;
        }
        return 0;
      }
    };
    $find_all = (dynamic $p) : dynamic ==> {
      $find = (dynamic $accu, dynamic $param) : dynamic ==> {
        $accu__1 = null as dynamic;
        $l = null as dynamic;
        $x = null as dynamic;
        $accu__0 = $accu;
        $param__0 = $param;
        for (;;) {
          if ($param__0) {
            $l = $param__0[2];
            $x = $param__0[1];
            if ($call1($p, $x)) {
              $accu__1 = Vector{0, $x, $accu__0} as dynamic;
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
      $y_ = 0 as dynamic;
      return (dynamic $z_) : dynamic ==> {return $find($y_, $z_);};
    };
    $filter_map = (dynamic $f) : dynamic ==> {
      $aux = (dynamic $accu, dynamic $param) : dynamic ==> {
        $accu__1 = null as dynamic;
        $l = null as dynamic;
        $match = null as dynamic;
        $v = null as dynamic;
        $x = null as dynamic;
        $accu__0 = $accu;
        $param__0 = $param;
        for (;;) {
          if ($param__0) {
            $l = $param__0[2];
            $x = $param__0[1];
            $match = $call1($f, $x);
            if ($match) {
              $v = $match[1];
              $accu__1 = Vector{0, $v, $accu__0} as dynamic;
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
      $w_ = 0 as dynamic;
      return (dynamic $x_) : dynamic ==> {return $aux($w_, $x_);};
    };
    $partition = (dynamic $p, dynamic $l) : dynamic ==> {
      $part = (dynamic $yes, dynamic $no, dynamic $param) : dynamic ==> {
        $no__1 = null as dynamic;
        $v_ = null as dynamic;
        $x = null as dynamic;
        $yes__1 = null as dynamic;
        $yes__0 = $yes;
        $no__0 = $no;
        $param__0 = $param;
        for (;;) {
          if ($param__0) {
            $l = $param__0[2];
            $x = $param__0[1];
            if ($call1($p, $x)) {
              $yes__1 = Vector{0, $x, $yes__0} as dynamic;
              $yes__0 = $yes__1;
              $param__0 = $l;
              continue;
            }
            $no__1 = Vector{0, $x, $no__0} as dynamic;
            $no__0 = $no__1;
            $param__0 = $l;
            continue;
          }
          $v_ = $rev($no__0);
          return Vector{0, $rev($yes__0), $v_};
        }
      };
      return $part(0, 0, $l);
    };
    $split->contents = (dynamic $param) : dynamic ==> {
      $l = null as dynamic;
      $match = null as dynamic;
      $match__0 = null as dynamic;
      $rx = null as dynamic;
      $ry = null as dynamic;
      $x = null as dynamic;
      $y = null as dynamic;
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
      return $d_;
    };
    $combine->contents = (dynamic $l1, dynamic $l2) : dynamic ==> {
      $a1 = null as dynamic;
      $a2 = null as dynamic;
      $l1__0 = null as dynamic;
      $l2__0 = null as dynamic;
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
      return $call1($Stdlib[1], $cst_List_combine);
    };
    $merge->contents = (dynamic $cmp, dynamic $l1, dynamic $match) : dynamic ==> {
      $h1 = null as dynamic;
      $h2 = null as dynamic;
      $t1 = null as dynamic;
      $t2 = null as dynamic;
      if ($l1) {
        if ($match) {
          $t2 = $match[2];
          $h2 = $match[1];
          $t1 = $l1[2];
          $h1 = $l1[1];
          return 0 < $call2($cmp, $h1, $h2)
            ? Vector{0, $h2, $merge->contents($cmp, $l1, $t2)}
            : (Vector{0, $h1, $merge->contents($cmp, $t1, $match)});
        }
        return $l1;
      }
      return $match;
    };
    $chop = (dynamic $k, dynamic $l) : dynamic ==> {
      $k__1 = null as dynamic;
      $l__1 = null as dynamic;
      $k__0 = $k;
      $l__0 = $l;
      for (;;) {
        if (0 === $k__0) {return $l__0;}
        if ($l__0) {
          $l__1 = $l__0[2];
          $k__1 = (int) ($k__0 + -1) as dynamic;
          $k__0 = $k__1;
          $l__0 = $l__1;
          continue;
        }
        throw $caml_wrap_thrown_exception(Vector{0, $Assert_failure, $e_}) as \Throwable;
      }
    };
    $stable_sort = (dynamic $cmp, dynamic $l) : dynamic ==> {
      $rev_sort = new Ref();
      $rev_merge = (dynamic $l1, dynamic $l2, dynamic $accu) : dynamic ==> {
        $accu__1 = null as dynamic;
        $accu__2 = null as dynamic;
        $h1 = null as dynamic;
        $h2 = null as dynamic;
        $t1 = null as dynamic;
        $t2 = null as dynamic;
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
              if (0 < $call2($cmp, $h1, $h2)) {
                $accu__1 = Vector{0, $h2, $accu__0} as dynamic;
                $l2__0 = $t2;
                $accu__0 = $accu__1;
                continue;
              }
              $accu__2 = Vector{0, $h1, $accu__0} as dynamic;
              $l1__0 = $t1;
              $accu__0 = $accu__2;
              continue;
            }
            return $rev_append($l1__0, $accu__0);
          }
          return $rev_append($l2__0, $accu__0);
        }
      };
      $rev_merge_rev = (dynamic $l1, dynamic $l2, dynamic $accu) : dynamic ==> {
        $accu__1 = null as dynamic;
        $accu__2 = null as dynamic;
        $h1 = null as dynamic;
        $h2 = null as dynamic;
        $t1 = null as dynamic;
        $t2 = null as dynamic;
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
              if (0 < $call2($cmp, $h1, $h2)) {
                $accu__1 = Vector{0, $h1, $accu__0} as dynamic;
                $l1__0 = $t1;
                $accu__0 = $accu__1;
                continue;
              }
              $accu__2 = Vector{0, $h2, $accu__0} as dynamic;
              $l2__0 = $t2;
              $accu__0 = $accu__2;
              continue;
            }
            return $rev_append($l1__0, $accu__0);
          }
          return $rev_append($l2__0, $accu__0);
        }
      };
      $sort = (dynamic $n, dynamic $l) : dynamic ==> {
        $s_ = null as dynamic;
        $t_ = null as dynamic;
        $u_ = null as dynamic;
        $x1 = null as dynamic;
        $x1__0 = null as dynamic;
        $x2 = null as dynamic;
        $x2__0 = null as dynamic;
        $x3 = null as dynamic;
        if (2 === $n) {
          if ($l) {
            $s_ = $l[2];
            if ($s_) {
              $x2 = $s_[1];
              $x1 = $l[1];
              return 0 < $call2($cmp, $x1, $x2)
                ? Vector{0, $x2, Vector{0, $x1, 0}}
                : (Vector{0, $x1, Vector{0, $x2, 0}});
            }
          }
        }
        else {
          if (3 === $n) {
            if ($l) {
              $t_ = $l[2];
              if ($t_) {
                $u_ = $t_[2];
                if ($u_) {
                  $x3 = $u_[1];
                  $x2__0 = $t_[1];
                  $x1__0 = $l[1];
                  return 0 < $call2($cmp, $x1__0, $x2__0)
                    ? 0 < $call2($cmp, $x1__0, $x3)
                     ? 0 < $call2($cmp, $x2__0, $x3)
                      ? Vector{0, $x3, Vector{0, $x2__0, Vector{0, $x1__0, 0}}}
                      : (Vector{0, $x2__0, Vector{0, $x3, Vector{0, $x1__0, 0}}})
                     : (Vector{0, $x2__0, Vector{0, $x1__0, Vector{0, $x3, 0}}})
                    : (0 < $call2($cmp, $x2__0, $x3)
                     ? 0 < $call2($cmp, $x1__0, $x3)
                      ? Vector{0, $x3, Vector{0, $x1__0, Vector{0, $x2__0, 0}}}
                      : (Vector{0, $x1__0, Vector{0, $x3, Vector{0, $x2__0, 0}}})
                     : (Vector{0, $x1__0, Vector{0, $x2__0, Vector{0, $x3, 0}}}));
                }
              }
            }
          }
        }
        $n1 = $right_shift_32($n, 1);
        $n2 = (int) ($n - $n1) as dynamic;
        $l2 = $chop($n1, $l);
        $s1 = $rev_sort->contents($n1, $l);
        $s2 = $rev_sort->contents($n2, $l2);
        return $rev_merge_rev($s1, $s2, 0);
      };
      $rev_sort->contents = (dynamic $n, dynamic $l) : dynamic ==> {
        $p_ = null as dynamic;
        $q_ = null as dynamic;
        $r_ = null as dynamic;
        $x1 = null as dynamic;
        $x1__0 = null as dynamic;
        $x2 = null as dynamic;
        $x2__0 = null as dynamic;
        $x3 = null as dynamic;
        if (2 === $n) {
          if ($l) {
            $p_ = $l[2];
            if ($p_) {
              $x2 = $p_[1];
              $x1 = $l[1];
              return 0 < $call2($cmp, $x1, $x2)
                ? Vector{0, $x1, Vector{0, $x2, 0}}
                : (Vector{0, $x2, Vector{0, $x1, 0}});
            }
          }
        }
        else {
          if (3 === $n) {
            if ($l) {
              $q_ = $l[2];
              if ($q_) {
                $r_ = $q_[2];
                if ($r_) {
                  $x3 = $r_[1];
                  $x2__0 = $q_[1];
                  $x1__0 = $l[1];
                  return 0 < $call2($cmp, $x1__0, $x2__0)
                    ? 0 < $call2($cmp, $x2__0, $x3)
                     ? Vector{0, $x1__0, Vector{0, $x2__0, Vector{0, $x3, 0}}}
                     : (0 < $call2($cmp, $x1__0, $x3)
                      ? Vector{0, $x1__0, Vector{0, $x3, Vector{0, $x2__0, 0}}}
                      : (Vector{0, $x3, Vector{0, $x1__0, Vector{0, $x2__0, 0}}}))
                    : (0 < $call2($cmp, $x1__0, $x3)
                     ? Vector{0, $x2__0, Vector{0, $x1__0, Vector{0, $x3, 0}}}
                     : (0 < $call2($cmp, $x2__0, $x3)
                      ? Vector{0, $x2__0, Vector{0, $x3, Vector{0, $x1__0, 0}}}
                      : (Vector{0, $x3, Vector{0, $x2__0, Vector{0, $x1__0, 0}}})));
                }
              }
            }
          }
        }
        $n1 = $right_shift_32($n, 1);
        $n2 = (int) ($n - $n1) as dynamic;
        $l2 = $chop($n1, $l);
        $s1 = $sort($n1, $l);
        $s2 = $sort($n2, $l2);
        return $rev_merge($s1, $s2, 0);
      };
      $len = $length($l);
      return 2 <= $len ? $sort($len, $l) : ($l);
    };
    $sort_uniq = (dynamic $cmp, dynamic $l) : dynamic ==> {
      $rev_sort = new Ref();
      $rev_merge = (dynamic $l1, dynamic $l2, dynamic $accu) : dynamic ==> {
        $accu__1 = null as dynamic;
        $accu__2 = null as dynamic;
        $accu__3 = null as dynamic;
        $c = null as dynamic;
        $h1 = null as dynamic;
        $h2 = null as dynamic;
        $t1 = null as dynamic;
        $t2 = null as dynamic;
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
              $c = $call2($cmp, $h1, $h2);
              if (0 === $c) {
                $accu__1 = Vector{0, $h1, $accu__0} as dynamic;
                $l1__0 = $t1;
                $l2__0 = $t2;
                $accu__0 = $accu__1;
                continue;
              }
              if (0 <= $c) {
                $accu__2 = Vector{0, $h2, $accu__0} as dynamic;
                $l2__0 = $t2;
                $accu__0 = $accu__2;
                continue;
              }
              $accu__3 = Vector{0, $h1, $accu__0} as dynamic;
              $l1__0 = $t1;
              $accu__0 = $accu__3;
              continue;
            }
            return $rev_append($l1__0, $accu__0);
          }
          return $rev_append($l2__0, $accu__0);
        }
      };
      $rev_merge_rev = (dynamic $l1, dynamic $l2, dynamic $accu) : dynamic ==> {
        $accu__1 = null as dynamic;
        $accu__2 = null as dynamic;
        $accu__3 = null as dynamic;
        $c = null as dynamic;
        $h1 = null as dynamic;
        $h2 = null as dynamic;
        $t1 = null as dynamic;
        $t2 = null as dynamic;
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
              $c = $call2($cmp, $h1, $h2);
              if (0 === $c) {
                $accu__1 = Vector{0, $h1, $accu__0} as dynamic;
                $l1__0 = $t1;
                $l2__0 = $t2;
                $accu__0 = $accu__1;
                continue;
              }
              if (0 < $c) {
                $accu__2 = Vector{0, $h1, $accu__0} as dynamic;
                $l1__0 = $t1;
                $accu__0 = $accu__2;
                continue;
              }
              $accu__3 = Vector{0, $h2, $accu__0} as dynamic;
              $l2__0 = $t2;
              $accu__0 = $accu__3;
              continue;
            }
            return $rev_append($l1__0, $accu__0);
          }
          return $rev_append($l2__0, $accu__0);
        }
      };
      $sort = (dynamic $n, dynamic $l) : dynamic ==> {
        $c = null as dynamic;
        $c__0 = null as dynamic;
        $c__1 = null as dynamic;
        $c__2 = null as dynamic;
        $c__3 = null as dynamic;
        $c__4 = null as dynamic;
        $c__5 = null as dynamic;
        $m_ = null as dynamic;
        $n_ = null as dynamic;
        $o_ = null as dynamic;
        $x1 = null as dynamic;
        $x1__0 = null as dynamic;
        $x2 = null as dynamic;
        $x2__0 = null as dynamic;
        $x3 = null as dynamic;
        if (2 === $n) {
          if ($l) {
            $m_ = $l[2];
            if ($m_) {
              $x2 = $m_[1];
              $x1 = $l[1];
              $c = $call2($cmp, $x1, $x2);
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
              $n_ = $l[2];
              if ($n_) {
                $o_ = $n_[2];
                if ($o_) {
                  $x3 = $o_[1];
                  $x2__0 = $n_[1];
                  $x1__0 = $l[1];
                  $c__0 = $call2($cmp, $x1__0, $x2__0);
                  if (0 === $c__0) {
                    $c__1 = $call2($cmp, $x2__0, $x3);
                    return 0 === $c__1
                      ? Vector{0, $x2__0, 0}
                      : (0 <= $c__1
                       ? Vector{0, $x3, Vector{0, $x2__0, 0}}
                       : (Vector{0, $x2__0, Vector{0, $x3, 0}}));
                  }
                  if (0 <= $c__0) {
                    $c__2 = $call2($cmp, $x1__0, $x3);
                    if (0 === $c__2) {
                      return Vector{0, $x2__0, Vector{0, $x1__0, 0}};
                    }
                    if (0 <= $c__2) {
                      $c__3 = $call2($cmp, $x2__0, $x3);
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
                  $c__4 = $call2($cmp, $x2__0, $x3);
                  if (0 === $c__4) {
                    return Vector{0, $x1__0, Vector{0, $x2__0, 0}};
                  }
                  if (0 <= $c__4) {
                    $c__5 = $call2($cmp, $x1__0, $x3);
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
        $n2 = (int) ($n - $n1) as dynamic;
        $l2 = $chop($n1, $l);
        $s1 = $rev_sort->contents($n1, $l);
        $s2 = $rev_sort->contents($n2, $l2);
        return $rev_merge_rev($s1, $s2, 0);
      };
      $rev_sort->contents = (dynamic $n, dynamic $l) : dynamic ==> {
        $c = null as dynamic;
        $c__0 = null as dynamic;
        $c__1 = null as dynamic;
        $c__2 = null as dynamic;
        $c__3 = null as dynamic;
        $c__4 = null as dynamic;
        $c__5 = null as dynamic;
        $j_ = null as dynamic;
        $k_ = null as dynamic;
        $l_ = null as dynamic;
        $x1 = null as dynamic;
        $x1__0 = null as dynamic;
        $x2 = null as dynamic;
        $x2__0 = null as dynamic;
        $x3 = null as dynamic;
        if (2 === $n) {
          if ($l) {
            $j_ = $l[2];
            if ($j_) {
              $x2 = $j_[1];
              $x1 = $l[1];
              $c = $call2($cmp, $x1, $x2);
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
              $k_ = $l[2];
              if ($k_) {
                $l_ = $k_[2];
                if ($l_) {
                  $x3 = $l_[1];
                  $x2__0 = $k_[1];
                  $x1__0 = $l[1];
                  $c__0 = $call2($cmp, $x1__0, $x2__0);
                  if (0 === $c__0) {
                    $c__1 = $call2($cmp, $x2__0, $x3);
                    return 0 === $c__1
                      ? Vector{0, $x2__0, 0}
                      : (0 < $c__1
                       ? Vector{0, $x2__0, Vector{0, $x3, 0}}
                       : (Vector{0, $x3, Vector{0, $x2__0, 0}}));
                  }
                  if (0 < $c__0) {
                    $c__2 = $call2($cmp, $x2__0, $x3);
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
                    $c__3 = $call2($cmp, $x1__0, $x3);
                    return 0 === $c__3
                      ? Vector{0, $x1__0, Vector{0, $x2__0, 0}}
                      : (0 < $c__3
                       ? Vector{0, $x1__0, Vector{0, $x3, Vector{0, $x2__0, 0}}}
                       : (Vector{0, $x3, Vector{0, $x1__0, Vector{0, $x2__0, 0}}}));
                  }
                  $c__4 = $call2($cmp, $x1__0, $x3);
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
                  $c__5 = $call2($cmp, $x2__0, $x3);
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
        $n2 = (int) ($n - $n1) as dynamic;
        $l2 = $chop($n1, $l);
        $s1 = $sort($n1, $l);
        $s2 = $sort($n2, $l2);
        return $rev_merge($s1, $s2, 0);
      };
      $len = $length($l);
      return 2 <= $len ? $sort($len, $l) : ($l);
    };
    $compare_lengths = (dynamic $l1, dynamic $l2) : dynamic ==> {
      $l1__1 = null as dynamic;
      $l2__1 = null as dynamic;
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
    $compare_length_with = (dynamic $l, dynamic $n) : dynamic ==> {
      $l__1 = null as dynamic;
      $n__1 = null as dynamic;
      $l__0 = $l;
      $n__0 = $n;
      for (;;) {
        if ($l__0) {
          $l__1 = $l__0[2];
          if (0 < $n__0) {
            $n__1 = (int) ($n__0 + -1) as dynamic;
            $l__0 = $l__1;
            $n__0 = $n__1;
            continue;
          }
          return 1;
        }
        return 0 === $n__0 ? 0 : (0 < $n__0 ? -1 : (1));
      }
    };
    $to_seq = (dynamic $l) : dynamic ==> {
      $aux = new Ref();
      $aux->contents = (dynamic $l, dynamic $param) : dynamic ==> {
        $tail = null as dynamic;
        $x = null as dynamic;
        if ($l) {
          $tail = $l[2];
          $x = $l[1];
          return Vector{
            0,
            $x,
            (dynamic $i_) : dynamic ==> {return $aux->contents($tail, $i_);}
          };
        }
        return 0;
      };
      return (dynamic $h_) : dynamic ==> {return $aux->contents($l, $h_);};
    };
    $of_seq = (dynamic $seq) : dynamic ==> {
      $direct = new Ref();
      $direct->contents = (dynamic $depth, dynamic $seq) : dynamic ==> {
        $f_ = null as dynamic;
        $g_ = null as dynamic;
        $next = null as dynamic;
        $x = null as dynamic;
        if (0 === $depth) {
          $f_ = 0 as dynamic;
          $g_ = (dynamic $acc, dynamic $x) : dynamic ==> {
            return Vector{0, $x, $acc};
          };
          return $rev($call3($Stdlib_seq[7], $g_, $f_, $seq));
        }
        $match = $call1($seq, 0);
        if ($match) {
          $next = $match[2];
          $x = $match[1];
          return Vector{0, $x, $direct->contents((int) ($depth + -1), $next)};
        }
        return 0;
      };
      return $direct->contents(500, $seq);
    };
    $Stdlib_list = Vector{
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
      $a_,
      $rev_append,
      $flatten->contents,
      $flatten->contents,
      $iter,
      $iteri,
      $map->contents,
      $mapi,
      $rev_map,
      $filter_map,
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
      $merge->contents,
      $to_seq,
      $of_seq
    } as dynamic;
    
    return($Stdlib_list);

  }
  public static function length(dynamic $l): dynamic {
    return static::syncCall(__FUNCTION__, 1, $l);
  }
  public static function compare_lengths(dynamic $l1, dynamic $l2): dynamic {
    return static::syncCall(__FUNCTION__, 2, $l1, $l2);
  }
  public static function compare_length_with(dynamic $l, dynamic $n): dynamic {
    return static::syncCall(__FUNCTION__, 3, $l, $n);
  }
  public static function cons(dynamic $a, dynamic $l): dynamic {
    return static::syncCall(__FUNCTION__, 4, $a, $l);
  }
  public static function hd(dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 5, $param);
  }
  public static function tl(dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 6, $param);
  }
  public static function nth(dynamic $l, dynamic $n): dynamic {
    return static::syncCall(__FUNCTION__, 7, $l, $n);
  }
  public static function nth_opt(dynamic $l, dynamic $n): dynamic {
    return static::syncCall(__FUNCTION__, 8, $l, $n);
  }
  public static function rev(dynamic $l): dynamic {
    return static::syncCall(__FUNCTION__, 9, $l);
  }
  public static function init(dynamic $len, dynamic $f): dynamic {
    return static::syncCall(__FUNCTION__, 10, $len, $f);
  }
  public static function rev_append(dynamic $l1, dynamic $l2): dynamic {
    return static::syncCall(__FUNCTION__, 12, $l1, $l2);
  }
  public static function flatten(dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 13, $param);
  }
  public static function iter(dynamic $f, dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 15, $f, $param);
  }
  public static function iteri(dynamic $f, dynamic $l): dynamic {
    return static::syncCall(__FUNCTION__, 16, $f, $l);
  }
  public static function map(dynamic $f, dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 17, $f, $param);
  }
  public static function mapi(dynamic $f, dynamic $l): dynamic {
    return static::syncCall(__FUNCTION__, 18, $f, $l);
  }
  public static function rev_map(dynamic $f, dynamic $l): dynamic {
    return static::syncCall(__FUNCTION__, 19, $f, $l);
  }
  public static function filter_map(dynamic $f): dynamic {
    return static::syncCall(__FUNCTION__, 20, $f);
  }
  public static function fold_left(dynamic $f, dynamic $accu, dynamic $l): dynamic {
    return static::syncCall(__FUNCTION__, 21, $f, $accu, $l);
  }
  public static function fold_right(dynamic $f, dynamic $l, dynamic $accu): dynamic {
    return static::syncCall(__FUNCTION__, 22, $f, $l, $accu);
  }
  public static function iter2(dynamic $f, dynamic $l1, dynamic $l2): dynamic {
    return static::syncCall(__FUNCTION__, 23, $f, $l1, $l2);
  }
  public static function map2(dynamic $f, dynamic $l1, dynamic $l2): dynamic {
    return static::syncCall(__FUNCTION__, 24, $f, $l1, $l2);
  }
  public static function rev_map2(dynamic $f, dynamic $l1, dynamic $l2): dynamic {
    return static::syncCall(__FUNCTION__, 25, $f, $l1, $l2);
  }
  public static function fold_left2(dynamic $f, dynamic $accu, dynamic $l1, dynamic $l2): dynamic {
    return static::syncCall(__FUNCTION__, 26, $f, $accu, $l1, $l2);
  }
  public static function fold_right2(dynamic $f, dynamic $l1, dynamic $l2, dynamic $accu): dynamic {
    return static::syncCall(__FUNCTION__, 27, $f, $l1, $l2, $accu);
  }
  public static function for_all(dynamic $p, dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 28, $p, $param);
  }
  public static function exists(dynamic $p, dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 29, $p, $param);
  }
  public static function for_all2(dynamic $p, dynamic $l1, dynamic $l2): dynamic {
    return static::syncCall(__FUNCTION__, 30, $p, $l1, $l2);
  }
  public static function exists2(dynamic $p, dynamic $l1, dynamic $l2): dynamic {
    return static::syncCall(__FUNCTION__, 31, $p, $l1, $l2);
  }
  public static function mem(dynamic $x, dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 32, $x, $param);
  }
  public static function memq(dynamic $x, dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 33, $x, $param);
  }
  public static function find(dynamic $p, dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 34, $p, $param);
  }
  public static function find_opt(dynamic $p, dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 35, $p, $param);
  }
  public static function find_all(dynamic $p): dynamic {
    return static::syncCall(__FUNCTION__, 36, $p);
  }
  public static function partition(dynamic $p, dynamic $l): dynamic {
    return static::syncCall(__FUNCTION__, 38, $p, $l);
  }
  public static function assoc(dynamic $x, dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 39, $x, $param);
  }
  public static function assoc_opt(dynamic $x, dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 40, $x, $param);
  }
  public static function assq(dynamic $x, dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 41, $x, $param);
  }
  public static function assq_opt(dynamic $x, dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 42, $x, $param);
  }
  public static function mem_assoc(dynamic $x, dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 43, $x, $param);
  }
  public static function mem_assq(dynamic $x, dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 44, $x, $param);
  }
  public static function remove_assoc(dynamic $x, dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 45, $x, $param);
  }
  public static function remove_assq(dynamic $x, dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 46, $x, $param);
  }
  public static function split(dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 47, $param);
  }
  public static function combine(dynamic $l1, dynamic $l2): dynamic {
    return static::syncCall(__FUNCTION__, 48, $l1, $l2);
  }
  public static function stable_sort(dynamic $cmp, dynamic $l): dynamic {
    return static::syncCall(__FUNCTION__, 49, $cmp, $l);
  }
  public static function sort_uniq(dynamic $cmp, dynamic $l): dynamic {
    return static::syncCall(__FUNCTION__, 52, $cmp, $l);
  }
  public static function merge(dynamic $cmp, dynamic $l1, dynamic $l2): dynamic {
    return static::syncCall(__FUNCTION__, 53, $cmp, $l1, $l2);
  }
  public static function to_seq(dynamic $l): dynamic {
    return static::syncCall(__FUNCTION__, 54, $l);
  }
  public static function of_seq(dynamic $seq): dynamic {
    return static::syncCall(__FUNCTION__, 55, $seq);
  }

}
/* Hashing disabled */
