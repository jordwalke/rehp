<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class Array_ {
  <<__Override, __Memoize>>
  public static function requireModule() : Vector<dynamic> {
    $joo_global_object = \Rehack\GlobalObject::get() as dynamic;
    
    $runtime = $joo_global_object->jsoo_runtime;
    $caml_array_sub = $runtime["caml_array_sub"];
    $call1 = $runtime["caml_call1"];
    $call2 = $runtime["caml_call2"];
    $caml_check_bound = $runtime["caml_check_bound"];
    $caml_make_vect = $runtime["caml_make_vect"];
    $string = $runtime["caml_new_string"];
    $caml_wrap_thrown_exception = $runtime["caml_wrap_thrown_exception"];
    $caml_wrap_thrown_exception_reraise = $runtime[
       "caml_wrap_thrown_exception_reraise"
     ];
    $cst_Array_map2_arrays_must_have_the_same_length = $string(
      "Array.map2: arrays must have the same length"
    );
    $cst_Array_iter2_arrays_must_have_the_same_length = $string(
      "Array.iter2: arrays must have the same length"
    );
    $cst_Array_blit = $string("Array.blit");
    $cst_Array_fill = $string("Array.fill");
    $cst_Array_sub = $string("Array.sub");
    $cst_Array_init = $string("Array.init");
    $cst_Array_Bottom = $string("Array.Bottom");
    $Assert_failure =  Assert_failure::requireModule ();
    $Pervasives =  Pervasives::requireModule ();
    $a_ = Vector{0, $string("array.ml"), 233, 4};
    $make_float = (dynamic $aj_) ==> {
      return $runtime["caml_make_float_vect"]($aj_);
    };
    $Floatarray = Vector{0};
    $init = (dynamic $l, dynamic $f) ==> {
      if (0 === $l) {return Vector{0};}
      if (0 <= $l) {
        $res = $caml_make_vect($l, $call1($f, 0));
        $ah_ = (int) ($l + -1);
        $ag_ = 1;
        if (! ($ah_ < 1)) {
          $i = $ag_;
          for (;;) {
            $res[$i + 1] = $call1($f, $i);
            $ai_ = (int) ($i + 1);
            if ($ah_ !== $i) {$i = $ai_;continue;}
            break;
          }
        }
        return $res;
      }
      return $call1($Pervasives[1], $cst_Array_init);
    };
    $make_matrix = (dynamic $sx, dynamic $sy, dynamic $init) ==> {
      $res = $caml_make_vect($sx, Vector{0});
      $ae_ = (int) ($sx + -1);
      $ad_ = 0;
      if (! ($ae_ < 0)) {
        $x = $ad_;
        for (;;) {
          $res[$x + 1] = $caml_make_vect($sy, $init);
          $af_ = (int) ($x + 1);
          if ($ae_ !== $x) {$x = $af_;continue;}
          break;
        }
      }
      return $res;
    };
    $copy = (dynamic $a) ==> {
      $l = $a->count() - 1;
      return 0 === $l ? Vector{0} : ($caml_array_sub($a, 0, $l));
    };
    $append = (dynamic $a1, dynamic $a2) ==> {
      $l1 = $a1->count() - 1;
      return 0 === $l1
        ? $copy($a2)
        : (0 === $a2->count() - 1
         ? $caml_array_sub($a1, 0, $l1)
         : ($runtime["caml_array_append"]($a1, $a2)));
    };
    $sub = (dynamic $a, dynamic $ofs, dynamic $len) ==> {
      if (0 <= $ofs) {
        if (0 <= $len) {
          if (! ((int) ($a->count() - 1 - $len) < $ofs)) {return $caml_array_sub($a, $ofs, $len);}
        }
      }
      return $call1($Pervasives[1], $cst_Array_sub);
    };
    $fill = (dynamic $a, dynamic $ofs, dynamic $len, dynamic $v) ==> {
      if (0 <= $ofs) {
        if (0 <= $len) {
          if (! ((int) ($a->count() - 1 - $len) < $ofs)) {
            $ab_ = (int) ((int) ($ofs + $len) + -1);
            if (! ($ab_ < $ofs)) {
              $i = $ofs;
              for (;;) {
                $a[$i + 1] = $v;
                $ac_ = (int) ($i + 1);
                if ($ab_ !== $i) {$i = $ac_;continue;}
                break;
              }
            }
            return 0;
          }
        }
      }
      return $call1($Pervasives[1], $cst_Array_fill);
    };
    $blit = 
    (dynamic $a1, dynamic $ofs1, dynamic $a2, dynamic $ofs2, dynamic $len) ==> {
      if (0 <= $len) {
        if (0 <= $ofs1) {
          if (! ((int) ($a1->count() - 1 - $len) < $ofs1)) {
            if (0 <= $ofs2) {
              if (! ((int) ($a2->count() - 1 - $len) < $ofs2)) {
                return $runtime["caml_array_blit"](
                  $a1,
                  $ofs1,
                  $a2,
                  $ofs2,
                  $len
                );
              }
            }
          }
        }
      }
      return $call1($Pervasives[1], $cst_Array_blit);
    };
    $iter = (dynamic $f, dynamic $a) ==> {
      $Z_ = (int) ($a->count() - 1 + -1);
      $Y_ = 0;
      if (! ($Z_ < 0)) {
        $i = $Y_;
        for (;;) {
          $call1($f, $a[$i + 1]);
          $aa_ = (int) ($i + 1);
          if ($Z_ !== $i) {$i = $aa_;continue;}
          break;
        }
      }
      return 0;
    };
    $iter2 = (dynamic $f, dynamic $a, dynamic $b) ==> {
      if ($a->count() - 1 !== $b->count() - 1) {
        return $call1(
          $Pervasives[1],
          $cst_Array_iter2_arrays_must_have_the_same_length
        );
      }
      $W_ = (int) ($a->count() - 1 + -1);
      $V_ = 0;
      if (! ($W_ < 0)) {
        $i = $V_;
        for (;;) {
          $call2($f, $a[$i + 1], $b[$i + 1]);
          $X_ = (int) ($i + 1);
          if ($W_ !== $i) {$i = $X_;continue;}
          break;
        }
      }
      return 0;
    };
    $map = (dynamic $f, dynamic $a) ==> {
      $l = $a->count() - 1;
      if (0 === $l) {return Vector{0};}
      $r = $caml_make_vect($l, $call1($f, $a[1]));
      $T_ = (int) ($l + -1);
      $S_ = 1;
      if (! ($T_ < 1)) {
        $i = $S_;
        for (;;) {
          $r[$i + 1] = $call1($f, $a[$i + 1]);
          $U_ = (int) ($i + 1);
          if ($T_ !== $i) {$i = $U_;continue;}
          break;
        }
      }
      return $r;
    };
    $map2 = (dynamic $f, dynamic $a, dynamic $b) ==> {
      $la = $a->count() - 1;
      $lb = $b->count() - 1;
      if ($la !== $lb) {
        return $call1(
          $Pervasives[1],
          $cst_Array_map2_arrays_must_have_the_same_length
        );
      }
      if (0 === $la) {return Vector{0};}
      $r = $caml_make_vect($la, $call2($f, $a[1], $b[1]));
      $Q_ = (int) ($la + -1);
      $P_ = 1;
      if (! ($Q_ < 1)) {
        $i = $P_;
        for (;;) {
          $r[$i + 1] = $call2($f, $a[$i + 1], $b[$i + 1]);
          $R_ = (int) ($i + 1);
          if ($Q_ !== $i) {$i = $R_;continue;}
          break;
        }
      }
      return $r;
    };
    $iteri = (dynamic $f, dynamic $a) ==> {
      $N_ = (int) ($a->count() - 1 + -1);
      $M_ = 0;
      if (! ($N_ < 0)) {
        $i = $M_;
        for (;;) {
          $call2($f, $i, $a[$i + 1]);
          $O_ = (int) ($i + 1);
          if ($N_ !== $i) {$i = $O_;continue;}
          break;
        }
      }
      return 0;
    };
    $mapi = (dynamic $f, dynamic $a) ==> {
      $l = $a->count() - 1;
      if (0 === $l) {return Vector{0};}
      $r = $caml_make_vect($l, $call2($f, 0, $a[1]));
      $K_ = (int) ($l + -1);
      $J_ = 1;
      if (! ($K_ < 1)) {
        $i = $J_;
        for (;;) {
          $r[$i + 1] = $call2($f, $i, $a[$i + 1]);
          $L_ = (int) ($i + 1);
          if ($K_ !== $i) {$i = $L_;continue;}
          break;
        }
      }
      return $r;
    };
    $to_list = (dynamic $a) ==> {
      $tolist = (dynamic $i, dynamic $res) ==> {
        $i__0 = $i;
        $res__0 = $res;
        for (;;) {
          if (0 <= $i__0) {
            $res__1 = Vector{0, $a[$i__0 + 1], $res__0};
            $i__1 = (int) ($i__0 + -1);
            $i__0 = $i__1;
            $res__0 = $res__1;
            continue;
          }
          return $res__0;
        }
      };
      return $tolist((int) ($a->count() - 1 + -1), 0);
    };
    $list_length = (dynamic $accu, dynamic $param) ==> {
      $accu__0 = $accu;
      $param__0 = $param;
      for (;;) {
        if ($param__0) {
          $param__1 = $param__0[2];
          $accu__1 = (int) ($accu__0 + 1);
          $accu__0 = $accu__1;
          $param__0 = $param__1;
          continue;
        }
        return $accu__0;
      }
    };
    $of_list = (dynamic $l) ==> {
      if ($l) {
        $tl = $l[2];
        $hd = $l[1];
        $a = $caml_make_vect($list_length(0, $l), $hd);
        $fill = (dynamic $i, dynamic $param) ==> {
          $i__0 = $i;
          $param__0 = $param;
          for (;;) {
            if ($param__0) {
              $param__1 = $param__0[2];
              $hd = $param__0[1];
              $a[$i__0 + 1] = $hd;
              $i__1 = (int) ($i__0 + 1);
              $i__0 = $i__1;
              $param__0 = $param__1;
              continue;
            }
            return $a;
          }
        };
        return $fill(1, $tl);
      }
      return Vector{0};
    };
    $fold_left = (dynamic $f, dynamic $x, dynamic $a) ==> {
      $r = Vector{0, $x};
      $H_ = (int) ($a->count() - 1 + -1);
      $G_ = 0;
      if (! ($H_ < 0)) {
        $i = $G_;
        for (;;) {
          $r[1] = $call2($f, $r[1], $a[$i + 1]);
          $I_ = (int) ($i + 1);
          if ($H_ !== $i) {$i = $I_;continue;}
          break;
        }
      }
      return $r[1];
    };
    $fold_right = (dynamic $f, dynamic $a, dynamic $x) ==> {
      $r = Vector{0, $x};
      $E_ = (int) ($a->count() - 1 + -1);
      if (! ($E_ < 0)) {
        $i = $E_;
        for (;;) {
          $r[1] = $call2($f, $a[$i + 1], $r[1]);
          $F_ = (int) ($i + -1);
          if (0 !== $i) {$i = $F_;continue;}
          break;
        }
      }
      return $r[1];
    };
    $exists = (dynamic $p, dynamic $a) ==> {
      $n = $a->count() - 1;
      $loop = (dynamic $i) ==> {
        $i__0 = $i;
        for (;;) {
          if ($i__0 === $n) {return 0;}
          if ($call1($p, $a[$i__0 + 1])) {return 1;}
          $i__1 = (int) ($i__0 + 1);
          $i__0 = $i__1;
          continue;
        }
      };
      return $loop(0);
    };
    $for_all = (dynamic $p, dynamic $a) ==> {
      $n = $a->count() - 1;
      $loop = (dynamic $i) ==> {
        $i__0 = $i;
        for (;;) {
          if ($i__0 === $n) {return 1;}
          if ($call1($p, $a[$i__0 + 1])) {
            $i__1 = (int) ($i__0 + 1);
            $i__0 = $i__1;
            continue;
          }
          return 0;
        }
      };
      return $loop(0);
    };
    $mem = (dynamic $x, dynamic $a) ==> {
      $n = $a->count() - 1;
      $loop = (dynamic $i) ==> {
        $i__0 = $i;
        for (;;) {
          if ($i__0 === $n) {return 0;}
          if (0 === $runtime["caml_compare"]($a[$i__0 + 1], $x)) {return 1;}
          $i__1 = (int) ($i__0 + 1);
          $i__0 = $i__1;
          continue;
        }
      };
      return $loop(0);
    };
    $memq = (dynamic $x, dynamic $a) ==> {
      $n = $a->count() - 1;
      $loop = (dynamic $i) ==> {
        $i__0 = $i;
        for (;;) {
          if ($i__0 === $n) {return 0;}
          if ($x === $a[$i__0 + 1]) {return 1;}
          $i__1 = (int) ($i__0 + 1);
          $i__0 = $i__1;
          continue;
        }
      };
      return $loop(0);
    };
    $Bottom = Vector{248, $cst_Array_Bottom, $runtime["caml_fresh_oo_id"](0)};
    $sort = (dynamic $cmp, dynamic $a) ==> {
      $maxson = (dynamic $l, dynamic $i) ==> {
        $i31 = (int) ((int) ((int) ($i + $i) + $i) + 1);
        $x = Vector{0, $i31};
        if ((int) ($i31 + 2) < $l) {
          $x_ = (int) ($i31 + 1);
          $y_ = $caml_check_bound($a, $x_)[$x_ + 1];
          if ($call2($cmp, $caml_check_bound($a, $i31)[$i31 + 1], $y_) < 0) {$x[1] = (int) ($i31 + 1);}
          $z_ = (int) ($i31 + 2);
          $A_ = $caml_check_bound($a, $z_)[$z_ + 1];
          $B_ = $x[1];
          if ($call2($cmp, $caml_check_bound($a, $B_)[$B_ + 1], $A_) < 0) {$x[1] = (int) ($i31 + 2);}
          return $x[1];
        }
        if ((int) ($i31 + 1) < $l) {
          $C_ = (int) ($i31 + 1);
          $D_ = $caml_check_bound($a, $C_)[$C_ + 1];
          if (
            !
            (0 <= $call2($cmp, $caml_check_bound($a, $i31)[$i31 + 1], $D_))
          ) {return (int) ($i31 + 1);}
        }
        if ($i31 < $l) {return $i31;}
        throw $caml_wrap_thrown_exception(Vector{0, $Bottom, $i}) as \Throwable;
      };
      $trickledown = (dynamic $l, dynamic $i, dynamic $e) ==> {
        $i__0 = $i;
        for (;;) {
          $j = $maxson($l, $i__0);
          if (0 < $call2($cmp, $caml_check_bound($a, $j)[$j + 1], $e)) {
            $w_ = $caml_check_bound($a, $j)[$j + 1];
            $caml_check_bound($a, $i__0)[$i__0 + 1] = $w_;
            $i__0 = $j;
            continue;
          }
          $caml_check_bound($a, $i__0)[$i__0 + 1] = $e;
          return 0;
        }
      };
      $trickle = (dynamic $l, dynamic $i, dynamic $e) ==> {
        try {$v_ = $trickledown($l, $i, $e);return $v_;}
        catch(\Throwable $exn) {
          $exn = $runtime["caml_wrap_exception"]($exn);
          if ($exn[1] === $Bottom) {
            $i__0 = $exn[2];
            $caml_check_bound($a, $i__0)[$i__0 + 1] = $e;
            return 0;
          }
          throw $caml_wrap_thrown_exception_reraise($exn) as \Throwable;
        }
      };
      $bubbledown = (dynamic $l, dynamic $i) ==> {
        $i__0 = $i;
        for (;;) {
          $i__1 = $maxson($l, $i__0);
          $u_ = $caml_check_bound($a, $i__1)[$i__1 + 1];
          $caml_check_bound($a, $i__0)[$i__0 + 1] = $u_;
          $i__0 = $i__1;
          continue;
        }
      };
      $bubble = (dynamic $l, dynamic $i) ==> {
        try {$t_ = $bubbledown($l, $i);return $t_;}
        catch(\Throwable $exn) {
          $exn = $runtime["caml_wrap_exception"]($exn);
          if ($exn[1] === $Bottom) {$i__0 = $exn[2];return $i__0;}
          throw $caml_wrap_thrown_exception_reraise($exn) as \Throwable;
        }
      };
      $trickleup = (dynamic $i, dynamic $e) ==> {
        $i__0 = $i;
        for (;;) {
          $father = (int) ((int) ($i__0 + -1) / 3);
          if ($i__0 !== $father) {
            if (
              0 <=
                $call2($cmp, $caml_check_bound($a, $father)[$father + 1], $e)
            ) {$caml_check_bound($a, $i__0)[$i__0 + 1] = $e;return 0;}
            $s_ = $caml_check_bound($a, $father)[$father + 1];
            $caml_check_bound($a, $i__0)[$i__0 + 1] = $s_;
            if (0 < $father) {$i__0 = $father;continue;}
            $caml_check_bound($a, 0)[1] = $e;
            return 0;
          }
          throw $caml_wrap_thrown_exception(Vector{0, $Assert_failure, $a_}) as \Throwable;
        }
      };
      $l = $a->count() - 1;
      $m_ = (int) ((int) ((int) ($l + 1) / 3) + -1);
      if (! ($m_ < 0)) {
        $i__0 = $m_;
        for (;;) {
          $trickle($l, $i__0, $caml_check_bound($a, $i__0)[$i__0 + 1]);
          $r_ = (int) ($i__0 + -1);
          if (0 !== $i__0) {$i__0 = $r_;continue;}
          break;
        }
      }
      $n_ = (int) ($l + -1);
      if (! ($n_ < 2)) {
        $i = $n_;
        for (;;) {
          $e__0 = $caml_check_bound($a, $i)[$i + 1];
          $a[$i + 1] = $caml_check_bound($a, 0)[1];
          $trickleup($bubble($i, 0), $e__0);
          $q_ = (int) ($i + -1);
          if (2 !== $i) {$i = $q_;continue;}
          break;
        }
      }
      $o_ = 1 < $l ? 1 : (0);
      if ($o_) {
        $e = $caml_check_bound($a, 1)[2];
        $a[2] = $caml_check_bound($a, 0)[1];
        $a[1] = $e;
        $p_ = 0;
      }
      else {$p_ = $o_;}
      return $p_;
    };
    $stable_sort = (dynamic $cmp, dynamic $a) ==> {
      $sortto = new Ref();
      $merge = 
      (dynamic $src1ofs, dynamic $src1len, dynamic $src2, dynamic $src2ofs, dynamic $src2len, dynamic $dst, dynamic $dstofs) ==> {
        $src1r = (int) ($src1ofs + $src1len);
        $src2r = (int) ($src2ofs + $src2len);
        $loop = 
        (dynamic $i1, dynamic $s1, dynamic $i2, dynamic $s2, dynamic $d) ==> {
          $i1__0 = $i1;
          $s1__0 = $s1;
          $i2__0 = $i2;
          $s2__0 = $s2;
          $d__0 = $d;
          for (;;) {
            if (0 < $call2($cmp, $s1__0, $s2__0)) {
              $caml_check_bound($dst, $d__0)[$d__0 + 1] = $s2__0;
              $i2__1 = (int) ($i2__0 + 1);
              if ($i2__1 < $src2r) {
                $d__1 = (int) ($d__0 + 1);
                $s2__1 = $caml_check_bound($src2, $i2__1)[$i2__1 + 1];
                $i2__0 = $i2__1;
                $s2__0 = $s2__1;
                $d__0 = $d__1;
                continue;
              }
              return $blit(
                $a,
                $i1__0,
                $dst,
                (int)
                ($d__0 + 1),
                (int)
                ($src1r - $i1__0)
              );
            }
            $caml_check_bound($dst, $d__0)[$d__0 + 1] = $s1__0;
            $i1__1 = (int) ($i1__0 + 1);
            if ($i1__1 < $src1r) {
              $d__2 = (int) ($d__0 + 1);
              $s1__1 = $caml_check_bound($a, $i1__1)[$i1__1 + 1];
              $i1__0 = $i1__1;
              $s1__0 = $s1__1;
              $d__0 = $d__2;
              continue;
            }
            return $blit(
              $src2,
              $i2__0,
              $dst,
              (int)
              ($d__0 + 1),
              (int)
              ($src2r - $i2__0)
            );
          }
        };
        $l_ = $caml_check_bound($src2, $src2ofs)[$src2ofs + 1];
        return $loop(
          $src1ofs,
          $caml_check_bound($a, $src1ofs)[$src1ofs + 1],
          $src2ofs,
          $l_,
          $dstofs
        );
      };
      $isortto = 
      (dynamic $srcofs, dynamic $dst, dynamic $dstofs, dynamic $len) ==> {
        $d_ = (int) ($len + -1);
        $c_ = 0;
        if (! ($d_ < 0)) {
          $i = $c_;
          for (;;) {
            $continue_label = null;
            $e_ = (int) ($srcofs + $i);
            $e = $caml_check_bound($a, $e_)[$e_ + 1];
            $j = Vector{0, (int) ((int) ($dstofs + $i) + -1)};
            for (;;) {
              if ($dstofs <= $j[1]) {
                $f_ = $j[1];
                if (
                  0 < $call2($cmp, $caml_check_bound($dst, $f_)[$f_ + 1], $e)
                ) {
                  $g_ = $j[1];
                  $h_ = $caml_check_bound($dst, $g_)[$g_ + 1];
                  $i_ = (int) ($j[1] + 1);
                  $caml_check_bound($dst, $i_)[$i_ + 1] = $h_;
                  $j[1] += -1;
                  continue;
                }
              }
              $j_ = (int) ($j[1] + 1);
              $caml_check_bound($dst, $j_)[$j_ + 1] = $e;
              $k_ = (int) ($i + 1);
              if ($d_ !== $i) {$i = $k_;$continue_label = "a";break;}
              break;
            }
            if ($continue_label === "a") {continue;}
            break;
          }
        }
        return 0;
      };
      $sortto->contents = 
      (dynamic $srcofs, dynamic $dst, dynamic $dstofs, dynamic $len) ==> {
        if ($len <= 5) {return $isortto($srcofs, $dst, $dstofs, $len);}
        $l1 = (int) ($len / 2);
        $l2 = (int) ($len - $l1);
        $sortto->contents(
          (int)
          ($srcofs + $l1),
          $dst,
          (int)
          ($dstofs + $l1),
          $l2
        );
        $sortto->contents($srcofs, $a, (int) ($srcofs + $l2), $l1);
        return $merge(
          (int)
          ($srcofs + $l2),
          $l1,
          $dst,
          (int)
          ($dstofs + $l1),
          $l2,
          $dst,
          $dstofs
        );
      };
      $l = $a->count() - 1;
      if ($l <= 5) {return $isortto(0, $a, 0, $l);}
      $l1 = (int) ($l / 2);
      $l2 = (int) ($l - $l1);
      $t = $caml_make_vect($l2, $caml_check_bound($a, 0)[1]);
      $sortto->contents($l1, $t, 0, $l2);
      $sortto->contents(0, $a, $l2, $l1);
      return $merge($l2, $l1, $t, 0, $l2, $a, 0);
    };
    $Array = Vector{
      0,
      $make_float,
      $init,
      $make_matrix,
      $make_matrix,
      $append,
      (dynamic $b_) ==> {return $runtime["caml_array_concat"]($b_);},
      $sub,
      $copy,
      $fill,
      $blit,
      $to_list,
      $of_list,
      $iter,
      $iteri,
      $map,
      $mapi,
      $fold_left,
      $fold_right,
      $iter2,
      $map2,
      $for_all,
      $exists,
      $mem,
      $memq,
      $sort,
      $stable_sort,
      $stable_sort,
      $Floatarray
    };
    
     return ($Array);

  }
  public static function _make_float_(dynamic $unnamed1): dynamic {
    return static::callRehackFunction(static::requireModule()[1], varray[$unnamed1]);
  }
  public static function init(dynamic $l, dynamic $f): dynamic {
    return static::callRehackFunction(static::requireModule()[2], varray[$l, $f]);
  }
  public static function make_matrix(dynamic $sx, dynamic $sy, dynamic $init): dynamic {
    return static::callRehackFunction(static::requireModule()[3], varray[$sx, $sy, $init]);
  }
  public static function append(dynamic $a1, dynamic $a2): dynamic {
    return static::callRehackFunction(static::requireModule()[5], varray[$a1, $a2]);
  }
  public static function sub(dynamic $a, dynamic $ofs, dynamic $len): dynamic {
    return static::callRehackFunction(static::requireModule()[7], varray[$a, $ofs, $len]);
  }
  public static function copy(dynamic $a): dynamic {
    return static::callRehackFunction(static::requireModule()[8], varray[$a]);
  }
  public static function fill(dynamic $a, dynamic $ofs, dynamic $len, dynamic $v): dynamic {
    return static::callRehackFunction(static::requireModule()[9], varray[$a, $ofs, $len, $v]);
  }
  public static function blit(dynamic $a1, dynamic $ofs1, dynamic $a2, dynamic $ofs2, dynamic $len): dynamic {
    return static::callRehackFunction(static::requireModule()[10], varray[$a1, $ofs1, $a2, $ofs2, $len]);
  }
  public static function to_list(dynamic $a): dynamic {
    return static::callRehackFunction(static::requireModule()[11], varray[$a]);
  }
  public static function of_list(dynamic $l): dynamic {
    return static::callRehackFunction(static::requireModule()[12], varray[$l]);
  }
  public static function iter(dynamic $f, dynamic $a): dynamic {
    return static::callRehackFunction(static::requireModule()[13], varray[$f, $a]);
  }
  public static function iteri(dynamic $f, dynamic $a): dynamic {
    return static::callRehackFunction(static::requireModule()[14], varray[$f, $a]);
  }
  public static function map(dynamic $f, dynamic $a): dynamic {
    return static::callRehackFunction(static::requireModule()[15], varray[$f, $a]);
  }
  public static function mapi(dynamic $f, dynamic $a): dynamic {
    return static::callRehackFunction(static::requireModule()[16], varray[$f, $a]);
  }
  public static function fold_left(dynamic $f, dynamic $x, dynamic $a): dynamic {
    return static::callRehackFunction(static::requireModule()[17], varray[$f, $x, $a]);
  }
  public static function fold_right(dynamic $f, dynamic $a, dynamic $x): dynamic {
    return static::callRehackFunction(static::requireModule()[18], varray[$f, $a, $x]);
  }
  public static function iter2(dynamic $f, dynamic $a, dynamic $b): dynamic {
    return static::callRehackFunction(static::requireModule()[19], varray[$f, $a, $b]);
  }
  public static function map2(dynamic $f, dynamic $a, dynamic $b): dynamic {
    return static::callRehackFunction(static::requireModule()[20], varray[$f, $a, $b]);
  }
  public static function for_all(dynamic $p, dynamic $a): dynamic {
    return static::callRehackFunction(static::requireModule()[21], varray[$p, $a]);
  }
  public static function exists(dynamic $p, dynamic $a): dynamic {
    return static::callRehackFunction(static::requireModule()[22], varray[$p, $a]);
  }
  public static function mem(dynamic $x, dynamic $a): dynamic {
    return static::callRehackFunction(static::requireModule()[23], varray[$x, $a]);
  }
  public static function memq(dynamic $x, dynamic $a): dynamic {
    return static::callRehackFunction(static::requireModule()[24], varray[$x, $a]);
  }
  public static function sort(dynamic $cmp, dynamic $a): dynamic {
    return static::callRehackFunction(static::requireModule()[25], varray[$cmp, $a]);
  }
  public static function stable_sort(dynamic $cmp, dynamic $a): dynamic {
    return static::callRehackFunction(static::requireModule()[26], varray[$cmp, $a]);
  }
  public static function Floatarray(): dynamic {
    return static::callRehackFunction(static::requireModule()[28], varray[]);
  }

}
/* Hashing disabled */
