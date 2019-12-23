<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class List_ {
  <<__Override, __Memoize>>
  public static function requireModule() : Vector<dynamic> {
    $joo_global_object = \Rehack\GlobalObject::get() as dynamic;
    
    $a_ = new Ref();
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
    $call1 = $runtime["caml_call1"];
    $call2 = $runtime["caml_call2"];
    $call3 = $runtime["caml_call3"];
    $caml_compare = $runtime["caml_compare"];
    $string = $runtime["caml_new_string"];
    $caml_wrap_thrown_exception = $runtime["caml_wrap_thrown_exception"];
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
    $Pervasives =  Pervasives::requireModule ();
    $Not_found =  Not_found::requireModule ();
    $Assert_failure =  Assert_failure::requireModule ();
    $b_ = Vector{0, 0, 0} as dynamic;
    $c_ = Vector{0, $string("list.ml"), 262, 11} as dynamic;
    $length = (dynamic $l) ==> {
      $param__0 = null;
      $len__0 = null;
      $len = 0;
      $param = $l;
      for (;;) {
        if ($param) {
          $param__0 = $param[2];
          $len__0 = (int) ($len + 1);
          $len = $len__0;
          $param = $param__0;
          continue;
        }
        return $len;
      }
    };
    $cons = (dynamic $a, dynamic $l) ==> {return Vector{0, $a, $l};};
    $hd = (dynamic $param) ==> {
      $a = null;
      if ($param) {$a = $param[1];return $a;}
      return $call1($Pervasives[2], $cst_hd);
    };
    $tl = (dynamic $param) ==> {
      $l = null;
      if ($param) {$l = $param[2];return $l;}
      return $call1($Pervasives[2], $cst_tl);
    };
    $nth = (dynamic $l, dynamic $n) ==> {
      $n__1 = null;
      $a = null;
      $l__1 = null;
      $l__0 = null;
      $n__0 = null;
      if (0 <= $n) {
        $l__0 = $l;
        $n__0 = $n;
        for (;;) {
          if ($l__0) {
            $l__1 = $l__0[2];
            $a = $l__0[1];
            if (0 === $n__0) {return $a;}
            $n__1 = (int) ($n__0 + -1);
            $l__0 = $l__1;
            $n__0 = $n__1;
            continue;
          }
          return $call1($Pervasives[2], $cst_nth);
        }
      }
      return $call1($Pervasives[1], $cst_List_nth);
    };
    $nth_opt = (dynamic $l, dynamic $n) ==> {
      $n__1 = null;
      $a = null;
      $l__1 = null;
      $l__0 = null;
      $n__0 = null;
      if (0 <= $n) {
        $l__0 = $l;
        $n__0 = $n;
        for (;;) {
          if ($l__0) {
            $l__1 = $l__0[2];
            $a = $l__0[1];
            if (0 === $n__0) {return Vector{0, $a};}
            $n__1 = (int) ($n__0 + -1);
            $l__0 = $l__1;
            $n__0 = $n__1;
            continue;
          }
          return 0;
        }
      }
      return $call1($Pervasives[1], $cst_List_nth__0);
    };
    $append = $Pervasives[25];
    $rev_append = (dynamic $l1, dynamic $l2) ==> {
      $l1__1 = null;
      $a = null;
      $l2__1 = null;
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
    $rev = (dynamic $l) ==> {return $rev_append($l, 0);};
    $init_aux->contents = (dynamic $i, dynamic $n, dynamic $f) ==> {
      if ($n <= $i) {return 0;}
      $r = $call1($f, $i);
      return Vector{0, $r, $init_aux->contents((int) ($i + 1), $n, $f)};
    };
    $init = (dynamic $len, dynamic $f) ==> {
      $acc__0 = null;
      $i__0 = null;
      $acc = null;
      $i = null;
      if (0 <= $len) {
        if (10000 < $len) {
          $acc = 0;
          $i = 0;
          for (;;) {
            if ($len <= $i) {return $rev($acc);}
            $i__0 = (int) ($i + 1);
            $acc__0 = Vector{0, $call1($f, $i), $acc};
            $acc = $acc__0;
            $i = $i__0;
            continue;
          }
        }
        return $init_aux->contents(0, $len, $f);
      }
      return $call1($Pervasives[1], $cst_List_init);
    };
    $flatten->contents = (dynamic $param) ==> {
      $y_ = null;
      $l = null;
      $r = null;
      if ($param) {
        $r = $param[2];
        $l = $param[1];
        $y_ = $flatten->contents($r);
        return $call2($Pervasives[25], $l, $y_);
      }
      return 0;
    };
    $map->contents = (dynamic $f, dynamic $param) ==> {
      $r = null;
      $a = null;
      $l = null;
      if ($param) {
        $l = $param[2];
        $a = $param[1];
        $r = $call1($f, $a);
        return Vector{0, $r, $map->contents($f, $l)};
      }
      return 0;
    };
    $a_->contents = (dynamic $i, dynamic $f, dynamic $param) ==> {
      $r = null;
      $a = null;
      $l = null;
      if ($param) {
        $l = $param[2];
        $a = $param[1];
        $r = $call2($f, $i, $a);
        return Vector{0, $r, $a_->contents((int) ($i + 1), $f, $l)};
      }
      return 0;
    };
    $mapi = (dynamic $f, dynamic $l) ==> {return $a_->contents(0, $f, $l);};
    $rev_map = (dynamic $f, dynamic $param) ==> {
      $param__1 = null;
      $a = null;
      $accu__0 = null;
      $accu = 0;
      $param__0 = $param;
      for (;;) {
        if ($param__0) {
          $param__1 = $param__0[2];
          $a = $param__0[1];
          $accu__0 = Vector{0, $call1($f, $a), $accu};
          $accu = $accu__0;
          $param__0 = $param__1;
          continue;
        }
        return $accu;
      }
    };
    $iter = (dynamic $f, dynamic $param) ==> {
      $param__1 = null;
      $a = null;
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
    $iteri = (dynamic $f, dynamic $l) ==> {
      $param__0 = null;
      $a = null;
      $i__0 = null;
      $i = 0;
      $param = $l;
      for (;;) {
        if ($param) {
          $param__0 = $param[2];
          $a = $param[1];
          $call2($f, $i, $a);
          $i__0 = (int) ($i + 1);
          $i = $i__0;
          $param = $param__0;
          continue;
        }
        return 0;
      }
    };
    $fold_left = (dynamic $f, dynamic $accu, dynamic $l) ==> {
      $l__1 = null;
      $a = null;
      $accu__1 = null;
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
    $fold_right->contents = (dynamic $f, dynamic $l, dynamic $accu) ==> {
      $a = null;
      $l__0 = null;
      if ($l) {
        $l__0 = $l[2];
        $a = $l[1];
        return $call2($f, $a, $fold_right->contents($f, $l__0, $accu));
      }
      return $accu;
    };
    $map2->contents = (dynamic $f, dynamic $l1, dynamic $l2) ==> {
      $r = null;
      $a1 = null;
      $l1__0 = null;
      $a2 = null;
      $l2__0 = null;
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
      return $call1($Pervasives[1], $cst_List_map2);
    };
    $rev_map2 = (dynamic $f, dynamic $l1, dynamic $l2) ==> {
      $l2__1 = null;
      $a2 = null;
      $l1__1 = null;
      $a1 = null;
      $accu__0 = null;
      $accu = 0;
      $l1__0 = $l1;
      $l2__0 = $l2;
      for (;;) {
        if ($l1__0) {
          if ($l2__0) {
            $l2__1 = $l2__0[2];
            $a2 = $l2__0[1];
            $l1__1 = $l1__0[2];
            $a1 = $l1__0[1];
            $accu__0 = Vector{0, $call2($f, $a1, $a2), $accu};
            $accu = $accu__0;
            $l1__0 = $l1__1;
            $l2__0 = $l2__1;
            continue;
          }
        }
        else {if (! $l2__0) {return $accu;}}
        return $call1($Pervasives[1], $cst_List_rev_map2);
      }
    };
    $iter2 = (dynamic $f, dynamic $l1, dynamic $l2) ==> {
      $l2__1 = null;
      $a2 = null;
      $l1__1 = null;
      $a1 = null;
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
        return $call1($Pervasives[1], $cst_List_iter2);
      }
    };
    $fold_left2 = (dynamic $f, dynamic $accu, dynamic $l1, dynamic $l2) ==> {
      $l2__1 = null;
      $a2 = null;
      $l1__1 = null;
      $a1 = null;
      $accu__1 = null;
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
        return $call1($Pervasives[1], $cst_List_fold_left2);
      }
    };
    $fold_right2->contents = 
    (dynamic $f, dynamic $l1, dynamic $l2, dynamic $accu) ==> {
      $a1 = null;
      $l1__0 = null;
      $a2 = null;
      $l2__0 = null;
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
      return $call1($Pervasives[1], $cst_List_fold_right2);
    };
    $for_all = (dynamic $p, dynamic $param) ==> {
      $l = null;
      $a = null;
      $x_ = null;
      $param__0 = $param;
      for (;;) {
        if ($param__0) {
          $l = $param__0[2];
          $a = $param__0[1];
          $x_ = $call1($p, $a);
          if ($x_) {$param__0 = $l;continue;}
          return $x_;
        }
        return 1;
      }
    };
    $exists = (dynamic $p, dynamic $param) ==> {
      $l = null;
      $a = null;
      $w_ = null;
      $param__0 = $param;
      for (;;) {
        if ($param__0) {
          $l = $param__0[2];
          $a = $param__0[1];
          $w_ = $call1($p, $a);
          if ($w_) {return $w_;}
          $param__0 = $l;
          continue;
        }
        return 0;
      }
    };
    $for_all2 = (dynamic $p, dynamic $l1, dynamic $l2) ==> {
      $l2__1 = null;
      $a2 = null;
      $l1__1 = null;
      $a1 = null;
      $v_ = null;
      $l1__0 = $l1;
      $l2__0 = $l2;
      for (;;) {
        if ($l1__0) {
          if ($l2__0) {
            $l2__1 = $l2__0[2];
            $a2 = $l2__0[1];
            $l1__1 = $l1__0[2];
            $a1 = $l1__0[1];
            $v_ = $call2($p, $a1, $a2);
            if ($v_) {$l1__0 = $l1__1;$l2__0 = $l2__1;continue;}
            return $v_;
          }
        }
        else {if (! $l2__0) {return 1;}}
        return $call1($Pervasives[1], $cst_List_for_all2);
      }
    };
    $exists2 = (dynamic $p, dynamic $l1, dynamic $l2) ==> {
      $l2__1 = null;
      $a2 = null;
      $l1__1 = null;
      $a1 = null;
      $u_ = null;
      $l1__0 = $l1;
      $l2__0 = $l2;
      for (;;) {
        if ($l1__0) {
          if ($l2__0) {
            $l2__1 = $l2__0[2];
            $a2 = $l2__0[1];
            $l1__1 = $l1__0[2];
            $a1 = $l1__0[1];
            $u_ = $call2($p, $a1, $a2);
            if ($u_) {return $u_;}
            $l1__0 = $l1__1;
            $l2__0 = $l2__1;
            continue;
          }
        }
        else {if (! $l2__0) {return 0;}}
        return $call1($Pervasives[1], $cst_List_exists2);
      }
    };
    $mem = (dynamic $x, dynamic $param) ==> {
      $l = null;
      $a = null;
      $t_ = null;
      $param__0 = $param;
      for (;;) {
        if ($param__0) {
          $l = $param__0[2];
          $a = $param__0[1];
          $t_ = 0 === $caml_compare($a, $x) ? 1 : (0);
          if ($t_) {return $t_;}
          $param__0 = $l;
          continue;
        }
        return 0;
      }
    };
    $memq = (dynamic $x, dynamic $param) ==> {
      $l = null;
      $a = null;
      $s_ = null;
      $param__0 = $param;
      for (;;) {
        if ($param__0) {
          $l = $param__0[2];
          $a = $param__0[1];
          $s_ = $a === $x ? 1 : (0);
          if ($s_) {return $s_;}
          $param__0 = $l;
          continue;
        }
        return 0;
      }
    };
    $assoc = (dynamic $x, dynamic $param) ==> {
      $l = null;
      $match = null;
      $b = null;
      $a = null;
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
        throw $caml_wrap_thrown_exception($Not_found) as \Throwable;
      }
    };
    $assoc_opt = (dynamic $x, dynamic $param) ==> {
      $l = null;
      $match = null;
      $b = null;
      $a = null;
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
    $assq = (dynamic $x, dynamic $param) ==> {
      $l = null;
      $match = null;
      $b = null;
      $a = null;
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
        throw $caml_wrap_thrown_exception($Not_found) as \Throwable;
      }
    };
    $assq_opt = (dynamic $x, dynamic $param) ==> {
      $l = null;
      $match = null;
      $b = null;
      $a = null;
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
    $mem_assoc = (dynamic $x, dynamic $param) ==> {
      $l = null;
      $match = null;
      $a = null;
      $r_ = null;
      $param__0 = $param;
      for (;;) {
        if ($param__0) {
          $l = $param__0[2];
          $match = $param__0[1];
          $a = $match[1];
          $r_ = 0 === $caml_compare($a, $x) ? 1 : (0);
          if ($r_) {return $r_;}
          $param__0 = $l;
          continue;
        }
        return 0;
      }
    };
    $mem_assq = (dynamic $x, dynamic $param) ==> {
      $l = null;
      $match = null;
      $a = null;
      $q_ = null;
      $param__0 = $param;
      for (;;) {
        if ($param__0) {
          $l = $param__0[2];
          $match = $param__0[1];
          $a = $match[1];
          $q_ = $a === $x ? 1 : (0);
          if ($q_) {return $q_;}
          $param__0 = $l;
          continue;
        }
        return 0;
      }
    };
    $remove_assoc->contents = (dynamic $x, dynamic $param) ==> {
      $a = null;
      $pair = null;
      $l = null;
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
    $remove_assq->contents = (dynamic $x, dynamic $param) ==> {
      $a = null;
      $pair = null;
      $l = null;
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
    $find = (dynamic $p, dynamic $param) ==> {
      $l = null;
      $x = null;
      $param__0 = $param;
      for (;;) {
        if ($param__0) {
          $l = $param__0[2];
          $x = $param__0[1];
          if ($call1($p, $x)) {return $x;}
          $param__0 = $l;
          continue;
        }
        throw $caml_wrap_thrown_exception($Not_found) as \Throwable;
      }
    };
    $find_opt = (dynamic $p, dynamic $param) ==> {
      $l = null;
      $x = null;
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
    $find_all = (dynamic $p) ==> {
      $accu = 0;
      return (dynamic $param__0) ==> {
        $l = null;
        $x = null;
        $accu__1 = null;
        $accu__0 = $accu;
        $param = $param__0;
        for (;;) {
          if ($param) {
            $l = $param[2];
            $x = $param[1];
            if ($call1($p, $x)) {
              $accu__1 = Vector{0, $x, $accu__0};
              $accu__0 = $accu__1;
              $param = $l;
              continue;
            }
            $param = $l;
            continue;
          }
          return $rev($accu__0);
        }
      };
    };
    $partition = (dynamic $p, dynamic $param) ==> {
      $l = null;
      $x = null;
      $yes__0 = null;
      $no__0 = null;
      $p_ = null;
      $yes = 0;
      $no = 0;
      $param__0 = $param;
      for (;;) {
        if ($param__0) {
          $l = $param__0[2];
          $x = $param__0[1];
          if ($call1($p, $x)) {
            $yes__0 = Vector{0, $x, $yes};
            $yes = $yes__0;
            $param__0 = $l;
            continue;
          }
          $no__0 = Vector{0, $x, $no};
          $no = $no__0;
          $param__0 = $l;
          continue;
        }
        $p_ = $rev($no);
        return Vector{0, $rev($yes), $p_};
      }
    };
    $split->contents = (dynamic $param) ==> {
      $rx = null;
      $ry = null;
      $match__0 = null;
      $x = null;
      $y = null;
      $match = null;
      $l = null;
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
      return $b_;
    };
    $combine->contents = (dynamic $l1, dynamic $l2) ==> {
      $a1 = null;
      $l1__0 = null;
      $a2 = null;
      $l2__0 = null;
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
      return $call1($Pervasives[1], $cst_List_combine);
    };
    $merge->contents = (dynamic $cmp, dynamic $l1, dynamic $match) ==> {
      $h1 = null;
      $t1 = null;
      $h2 = null;
      $t2 = null;
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
    $chop = (dynamic $k, dynamic $l) ==> {
      $l__1 = null;
      $k__1 = null;
      $k__0 = $k;
      $l__0 = $l;
      for (;;) {
        if (0 === $k__0) {return $l__0;}
        if ($l__0) {
          $l__1 = $l__0[2];
          $k__1 = (int) ($k__0 + -1);
          $k__0 = $k__1;
          $l__0 = $l__1;
          continue;
        }
        throw $caml_wrap_thrown_exception(Vector{0, $Assert_failure, $c_}) as \Throwable;
      }
    };
    $stable_sort = (dynamic $cmp, dynamic $l) ==> {
      $rev_sort = new Ref();
      $sort = (dynamic $n, dynamic $l) ==> {
        $x1__0 = null;
        $x2__0 = null;
        $x3 = null;
        $o_ = null;
        $n_ = null;
        $x1 = null;
        $x2 = null;
        $m_ = null;
        $accu__1 = null;
        $accu__0 = null;
        $h1 = null;
        $t1 = null;
        $h2 = null;
        $t2 = null;
        if (2 === $n) {
          if ($l) {
            $m_ = $l[2];
            if ($m_) {
              $x2 = $m_[1];
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
              $n_ = $l[2];
              if ($n_) {
                $o_ = $n_[2];
                if ($o_) {
                  $x3 = $o_[1];
                  $x2__0 = $n_[1];
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
        $n2 = (int) ($n - $n1);
        $l2__0 = $chop($n1, $l);
        $l1__0 = $rev_sort->contents($n1, $l);
        $l2__1 = $rev_sort->contents($n2, $l2__0);
        $l1 = $l1__0;
        $l2 = $l2__1;
        $accu = 0;
        for (;;) {
          if ($l1) {
            if ($l2) {
              $t2 = $l2[2];
              $h2 = $l2[1];
              $t1 = $l1[2];
              $h1 = $l1[1];
              if (0 < $call2($cmp, $h1, $h2)) {
                $accu__0 = Vector{0, $h1, $accu};
                $l1 = $t1;
                $accu = $accu__0;
                continue;
              }
              $accu__1 = Vector{0, $h2, $accu};
              $l2 = $t2;
              $accu = $accu__1;
              continue;
            }
            return $rev_append($l1, $accu);
          }
          return $rev_append($l2, $accu);
        }
      };
      $rev_sort->contents = (dynamic $n, dynamic $l) ==> {
        $x1__0 = null;
        $x2__0 = null;
        $x3 = null;
        $l_ = null;
        $k_ = null;
        $x1 = null;
        $x2 = null;
        $j_ = null;
        $accu__1 = null;
        $accu__0 = null;
        $h1 = null;
        $t1 = null;
        $h2 = null;
        $t2 = null;
        if (2 === $n) {
          if ($l) {
            $j_ = $l[2];
            if ($j_) {
              $x2 = $j_[1];
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
              $k_ = $l[2];
              if ($k_) {
                $l_ = $k_[2];
                if ($l_) {
                  $x3 = $l_[1];
                  $x2__0 = $k_[1];
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
        $n2 = (int) ($n - $n1);
        $l2__0 = $chop($n1, $l);
        $l1__0 = $sort($n1, $l);
        $l2__1 = $sort($n2, $l2__0);
        $l1 = $l1__0;
        $l2 = $l2__1;
        $accu = 0;
        for (;;) {
          if ($l1) {
            if ($l2) {
              $t2 = $l2[2];
              $h2 = $l2[1];
              $t1 = $l1[2];
              $h1 = $l1[1];
              if (0 < $call2($cmp, $h1, $h2)) {
                $accu__0 = Vector{0, $h2, $accu};
                $l2 = $t2;
                $accu = $accu__0;
                continue;
              }
              $accu__1 = Vector{0, $h1, $accu};
              $l1 = $t1;
              $accu = $accu__1;
              continue;
            }
            return $rev_append($l1, $accu);
          }
          return $rev_append($l2, $accu);
        }
      };
      $len = $length($l);
      return 2 <= $len ? $sort($len, $l) : ($l);
    };
    $sort_uniq = (dynamic $cmp, dynamic $l) ==> {
      $rev_sort = new Ref();
      $sort = (dynamic $n, dynamic $l) ==> {
        $c__6 = null;
        $c__5 = null;
        $c__4 = null;
        $c__3 = null;
        $c__2 = null;
        $c__1 = null;
        $x1__0 = null;
        $x2__0 = null;
        $x3 = null;
        $i_ = null;
        $h_ = null;
        $c__0 = null;
        $x1 = null;
        $x2 = null;
        $g_ = null;
        $accu__2 = null;
        $accu__1 = null;
        $accu__0 = null;
        $c = null;
        $h1 = null;
        $t1 = null;
        $h2 = null;
        $t2 = null;
        if (2 === $n) {
          if ($l) {
            $g_ = $l[2];
            if ($g_) {
              $x2 = $g_[1];
              $x1 = $l[1];
              $c__0 = $call2($cmp, $x1, $x2);
              return 0 === $c__0
                ? Vector{0, $x1, 0}
                : (0 <= $c__0
                 ? Vector{0, $x2, Vector{0, $x1, 0}}
                 : (Vector{0, $x1, Vector{0, $x2, 0}}));
            }
          }
        }
        else {
          if (3 === $n) {
            if ($l) {
              $h_ = $l[2];
              if ($h_) {
                $i_ = $h_[2];
                if ($i_) {
                  $x3 = $i_[1];
                  $x2__0 = $h_[1];
                  $x1__0 = $l[1];
                  $c__1 = $call2($cmp, $x1__0, $x2__0);
                  if (0 === $c__1) {
                    $c__2 = $call2($cmp, $x2__0, $x3);
                    return 0 === $c__2
                      ? Vector{0, $x2__0, 0}
                      : (0 <= $c__2
                       ? Vector{0, $x3, Vector{0, $x2__0, 0}}
                       : (Vector{0, $x2__0, Vector{0, $x3, 0}}));
                  }
                  if (0 <= $c__1) {
                    $c__3 = $call2($cmp, $x1__0, $x3);
                    if (0 === $c__3) {
                      return Vector{0, $x2__0, Vector{0, $x1__0, 0}};
                    }
                    if (0 <= $c__3) {
                      $c__4 = $call2($cmp, $x2__0, $x3);
                      return 0 === $c__4
                        ? Vector{0, $x2__0, Vector{0, $x1__0, 0}}
                        : (0 <= $c__4
                         ? Vector{0, $x3, Vector{0, $x2__0, Vector{0, $x1__0, 0}}}
                         : (Vector{0, $x2__0, Vector{0, $x3, Vector{0, $x1__0, 0}}}));
                    }
                    return Vector{
                      0,
                      $x2__0,
                      Vector{0, $x1__0, Vector{0, $x3, 0}}
                    };
                  }
                  $c__5 = $call2($cmp, $x2__0, $x3);
                  if (0 === $c__5) {
                    return Vector{0, $x1__0, Vector{0, $x2__0, 0}};
                  }
                  if (0 <= $c__5) {
                    $c__6 = $call2($cmp, $x1__0, $x3);
                    return 0 === $c__6
                      ? Vector{0, $x1__0, Vector{0, $x2__0, 0}}
                      : (0 <= $c__6
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
        $n2 = (int) ($n - $n1);
        $l2__0 = $chop($n1, $l);
        $l1__0 = $rev_sort->contents($n1, $l);
        $l2__1 = $rev_sort->contents($n2, $l2__0);
        $l1 = $l1__0;
        $l2 = $l2__1;
        $accu = 0;
        for (;;) {
          if ($l1) {
            if ($l2) {
              $t2 = $l2[2];
              $h2 = $l2[1];
              $t1 = $l1[2];
              $h1 = $l1[1];
              $c = $call2($cmp, $h1, $h2);
              if (0 === $c) {
                $accu__0 = Vector{0, $h1, $accu};
                $l1 = $t1;
                $l2 = $t2;
                $accu = $accu__0;
                continue;
              }
              if (0 < $c) {
                $accu__1 = Vector{0, $h1, $accu};
                $l1 = $t1;
                $accu = $accu__1;
                continue;
              }
              $accu__2 = Vector{0, $h2, $accu};
              $l2 = $t2;
              $accu = $accu__2;
              continue;
            }
            return $rev_append($l1, $accu);
          }
          return $rev_append($l2, $accu);
        }
      };
      $rev_sort->contents = (dynamic $n, dynamic $l) ==> {
        $c__6 = null;
        $c__5 = null;
        $c__4 = null;
        $c__3 = null;
        $c__2 = null;
        $c__1 = null;
        $x1__0 = null;
        $x2__0 = null;
        $x3 = null;
        $f_ = null;
        $e_ = null;
        $c__0 = null;
        $x1 = null;
        $x2 = null;
        $d_ = null;
        $accu__2 = null;
        $accu__1 = null;
        $accu__0 = null;
        $c = null;
        $h1 = null;
        $t1 = null;
        $h2 = null;
        $t2 = null;
        if (2 === $n) {
          if ($l) {
            $d_ = $l[2];
            if ($d_) {
              $x2 = $d_[1];
              $x1 = $l[1];
              $c__0 = $call2($cmp, $x1, $x2);
              return 0 === $c__0
                ? Vector{0, $x1, 0}
                : (0 < $c__0
                 ? Vector{0, $x1, Vector{0, $x2, 0}}
                 : (Vector{0, $x2, Vector{0, $x1, 0}}));
            }
          }
        }
        else {
          if (3 === $n) {
            if ($l) {
              $e_ = $l[2];
              if ($e_) {
                $f_ = $e_[2];
                if ($f_) {
                  $x3 = $f_[1];
                  $x2__0 = $e_[1];
                  $x1__0 = $l[1];
                  $c__1 = $call2($cmp, $x1__0, $x2__0);
                  if (0 === $c__1) {
                    $c__2 = $call2($cmp, $x2__0, $x3);
                    return 0 === $c__2
                      ? Vector{0, $x2__0, 0}
                      : (0 < $c__2
                       ? Vector{0, $x2__0, Vector{0, $x3, 0}}
                       : (Vector{0, $x3, Vector{0, $x2__0, 0}}));
                  }
                  if (0 < $c__1) {
                    $c__3 = $call2($cmp, $x2__0, $x3);
                    if (0 === $c__3) {
                      return Vector{0, $x1__0, Vector{0, $x2__0, 0}};
                    }
                    if (0 < $c__3) {
                      return Vector{
                        0,
                        $x1__0,
                        Vector{0, $x2__0, Vector{0, $x3, 0}}
                      };
                    }
                    $c__4 = $call2($cmp, $x1__0, $x3);
                    return 0 === $c__4
                      ? Vector{0, $x1__0, Vector{0, $x2__0, 0}}
                      : (0 < $c__4
                       ? Vector{0, $x1__0, Vector{0, $x3, Vector{0, $x2__0, 0}}}
                       : (Vector{0, $x3, Vector{0, $x1__0, Vector{0, $x2__0, 0}}}));
                  }
                  $c__5 = $call2($cmp, $x1__0, $x3);
                  if (0 === $c__5) {
                    return Vector{0, $x2__0, Vector{0, $x1__0, 0}};
                  }
                  if (0 < $c__5) {
                    return Vector{
                      0,
                      $x2__0,
                      Vector{0, $x1__0, Vector{0, $x3, 0}}
                    };
                  }
                  $c__6 = $call2($cmp, $x2__0, $x3);
                  return 0 === $c__6
                    ? Vector{0, $x2__0, Vector{0, $x1__0, 0}}
                    : (0 < $c__6
                     ? Vector{0, $x2__0, Vector{0, $x3, Vector{0, $x1__0, 0}}}
                     : (Vector{0, $x3, Vector{0, $x2__0, Vector{0, $x1__0, 0}}}));
                }
              }
            }
          }
        }
        $n1 = $right_shift_32($n, 1);
        $n2 = (int) ($n - $n1);
        $l2__0 = $chop($n1, $l);
        $l1__0 = $sort($n1, $l);
        $l2__1 = $sort($n2, $l2__0);
        $l1 = $l1__0;
        $l2 = $l2__1;
        $accu = 0;
        for (;;) {
          if ($l1) {
            if ($l2) {
              $t2 = $l2[2];
              $h2 = $l2[1];
              $t1 = $l1[2];
              $h1 = $l1[1];
              $c = $call2($cmp, $h1, $h2);
              if (0 === $c) {
                $accu__0 = Vector{0, $h1, $accu};
                $l1 = $t1;
                $l2 = $t2;
                $accu = $accu__0;
                continue;
              }
              if (0 <= $c) {
                $accu__1 = Vector{0, $h2, $accu};
                $l2 = $t2;
                $accu = $accu__1;
                continue;
              }
              $accu__2 = Vector{0, $h1, $accu};
              $l1 = $t1;
              $accu = $accu__2;
              continue;
            }
            return $rev_append($l1, $accu);
          }
          return $rev_append($l2, $accu);
        }
      };
      $len = $length($l);
      return 2 <= $len ? $sort($len, $l) : ($l);
    };
    $compare_lengths = (dynamic $l1, dynamic $l2) ==> {
      $l2__1 = null;
      $l1__1 = null;
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
    $compare_length_with = (dynamic $l, dynamic $n) ==> {
      $l__1 = null;
      $n__1 = null;
      $l__0 = $l;
      $n__0 = $n;
      for (;;) {
        if ($l__0) {
          $l__1 = $l__0[2];
          if (0 < $n__0) {
            $n__1 = (int) ($n__0 + -1);
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
    } as dynamic;
    
     return ($List);

  }
  public static function length(dynamic $l): dynamic {
    return static::callRehackFunction(static::requireModule()[1], varray[$l]);
  }
  public static function compare_lengths(dynamic $l1, dynamic $l2): dynamic {
    return static::callRehackFunction(static::requireModule()[2], varray[$l1, $l2]);
  }
  public static function compare_length_with(dynamic $l, dynamic $n): dynamic {
    return static::callRehackFunction(static::requireModule()[3], varray[$l, $n]);
  }
  public static function cons(dynamic $a, dynamic $l): dynamic {
    return static::callRehackFunction(static::requireModule()[4], varray[$a, $l]);
  }
  public static function hd(dynamic $param): dynamic {
    return static::callRehackFunction(static::requireModule()[5], varray[$param]);
  }
  public static function tl(dynamic $param): dynamic {
    return static::callRehackFunction(static::requireModule()[6], varray[$param]);
  }
  public static function nth(dynamic $l, dynamic $n): dynamic {
    return static::callRehackFunction(static::requireModule()[7], varray[$l, $n]);
  }
  public static function nth_opt(dynamic $l, dynamic $n): dynamic {
    return static::callRehackFunction(static::requireModule()[8], varray[$l, $n]);
  }
  public static function rev(dynamic $l): dynamic {
    return static::callRehackFunction(static::requireModule()[9], varray[$l]);
  }
  public static function init(dynamic $len, dynamic $f): dynamic {
    return static::callRehackFunction(static::requireModule()[10], varray[$len, $f]);
  }
  public static function rev_append(dynamic $l1, dynamic $l2): dynamic {
    return static::callRehackFunction(static::requireModule()[12], varray[$l1, $l2]);
  }
  public static function flatten(dynamic $param): dynamic {
    return static::callRehackFunction(static::requireModule()[13], varray[$param]);
  }
  public static function iter(dynamic $f, dynamic $param): dynamic {
    return static::callRehackFunction(static::requireModule()[15], varray[$f, $param]);
  }
  public static function iteri(dynamic $f, dynamic $l): dynamic {
    return static::callRehackFunction(static::requireModule()[16], varray[$f, $l]);
  }
  public static function map(dynamic $f, dynamic $param): dynamic {
    return static::callRehackFunction(static::requireModule()[17], varray[$f, $param]);
  }
  public static function mapi(dynamic $f, dynamic $l): dynamic {
    return static::callRehackFunction(static::requireModule()[18], varray[$f, $l]);
  }
  public static function rev_map(dynamic $f, dynamic $l): dynamic {
    return static::callRehackFunction(static::requireModule()[19], varray[$f, $l]);
  }
  public static function fold_left(dynamic $f, dynamic $accu, dynamic $l): dynamic {
    return static::callRehackFunction(static::requireModule()[20], varray[$f, $accu, $l]);
  }
  public static function fold_right(dynamic $f, dynamic $l, dynamic $accu): dynamic {
    return static::callRehackFunction(static::requireModule()[21], varray[$f, $l, $accu]);
  }
  public static function iter2(dynamic $f, dynamic $l1, dynamic $l2): dynamic {
    return static::callRehackFunction(static::requireModule()[22], varray[$f, $l1, $l2]);
  }
  public static function map2(dynamic $f, dynamic $l1, dynamic $l2): dynamic {
    return static::callRehackFunction(static::requireModule()[23], varray[$f, $l1, $l2]);
  }
  public static function rev_map2(dynamic $f, dynamic $l1, dynamic $l2): dynamic {
    return static::callRehackFunction(static::requireModule()[24], varray[$f, $l1, $l2]);
  }
  public static function fold_left2(dynamic $f, dynamic $accu, dynamic $l1, dynamic $l2): dynamic {
    return static::callRehackFunction(static::requireModule()[25], varray[$f, $accu, $l1, $l2]);
  }
  public static function fold_right2(dynamic $f, dynamic $l1, dynamic $l2, dynamic $accu): dynamic {
    return static::callRehackFunction(static::requireModule()[26], varray[$f, $l1, $l2, $accu]);
  }
  public static function for_all(dynamic $p, dynamic $param): dynamic {
    return static::callRehackFunction(static::requireModule()[27], varray[$p, $param]);
  }
  public static function exists(dynamic $p, dynamic $param): dynamic {
    return static::callRehackFunction(static::requireModule()[28], varray[$p, $param]);
  }
  public static function for_all2(dynamic $p, dynamic $l1, dynamic $l2): dynamic {
    return static::callRehackFunction(static::requireModule()[29], varray[$p, $l1, $l2]);
  }
  public static function exists2(dynamic $p, dynamic $l1, dynamic $l2): dynamic {
    return static::callRehackFunction(static::requireModule()[30], varray[$p, $l1, $l2]);
  }
  public static function mem(dynamic $x, dynamic $param): dynamic {
    return static::callRehackFunction(static::requireModule()[31], varray[$x, $param]);
  }
  public static function memq(dynamic $x, dynamic $param): dynamic {
    return static::callRehackFunction(static::requireModule()[32], varray[$x, $param]);
  }
  public static function find(dynamic $p, dynamic $param): dynamic {
    return static::callRehackFunction(static::requireModule()[33], varray[$p, $param]);
  }
  public static function find_opt(dynamic $p, dynamic $param): dynamic {
    return static::callRehackFunction(static::requireModule()[34], varray[$p, $param]);
  }
  public static function find_all(dynamic $p): dynamic {
    return static::callRehackFunction(static::requireModule()[35], varray[$p]);
  }
  public static function partition(dynamic $p, dynamic $l): dynamic {
    return static::callRehackFunction(static::requireModule()[37], varray[$p, $l]);
  }
  public static function assoc(dynamic $x, dynamic $param): dynamic {
    return static::callRehackFunction(static::requireModule()[38], varray[$x, $param]);
  }
  public static function assoc_opt(dynamic $x, dynamic $param): dynamic {
    return static::callRehackFunction(static::requireModule()[39], varray[$x, $param]);
  }
  public static function assq(dynamic $x, dynamic $param): dynamic {
    return static::callRehackFunction(static::requireModule()[40], varray[$x, $param]);
  }
  public static function assq_opt(dynamic $x, dynamic $param): dynamic {
    return static::callRehackFunction(static::requireModule()[41], varray[$x, $param]);
  }
  public static function mem_assoc(dynamic $x, dynamic $param): dynamic {
    return static::callRehackFunction(static::requireModule()[42], varray[$x, $param]);
  }
  public static function mem_assq(dynamic $x, dynamic $param): dynamic {
    return static::callRehackFunction(static::requireModule()[43], varray[$x, $param]);
  }
  public static function remove_assoc(dynamic $x, dynamic $param): dynamic {
    return static::callRehackFunction(static::requireModule()[44], varray[$x, $param]);
  }
  public static function remove_assq(dynamic $x, dynamic $param): dynamic {
    return static::callRehackFunction(static::requireModule()[45], varray[$x, $param]);
  }
  public static function split(dynamic $param): dynamic {
    return static::callRehackFunction(static::requireModule()[46], varray[$param]);
  }
  public static function combine(dynamic $l1, dynamic $l2): dynamic {
    return static::callRehackFunction(static::requireModule()[47], varray[$l1, $l2]);
  }
  public static function stable_sort(dynamic $cmp, dynamic $l): dynamic {
    return static::callRehackFunction(static::requireModule()[48], varray[$cmp, $l]);
  }
  public static function sort_uniq(dynamic $cmp, dynamic $l): dynamic {
    return static::callRehackFunction(static::requireModule()[51], varray[$cmp, $l]);
  }
  public static function merge(dynamic $cmp, dynamic $l1, dynamic $l2): dynamic {
    return static::callRehackFunction(static::requireModule()[52], varray[$cmp, $l1, $l2]);
  }

}
/* Hashing disabled */
