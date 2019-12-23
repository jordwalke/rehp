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
    $a_ = Vector{0, $string("array.ml"), 233, 4} as dynamic;
    $make_float = (dynamic $ai_) ==> {
      return $runtime["caml_make_float_vect"]($ai_);
    };
    $Floatarray = Vector{0} as dynamic;
    $init = (dynamic $l, dynamic $f) ==> {
      $ah_ = null;
      $i = null;
      $ag_ = null;
      $af_ = null;
      $res = null;
      if (0 === $l) {return Vector{0};}
      if (0 <= $l) {
        $res = $caml_make_vect($l, $call1($f, 0));
        $ag_ = (int) ($l + -1);
        $af_ = 1;
        if (! ($ag_ < 1)) {
          $i = $af_;
          for (;;) {
            $res[$i + 1] = $call1($f, $i);
            $ah_ = (int) ($i + 1);
            if ($ag_ !== $i) {$i = $ah_;continue;}
            break;
          }
        }
        return $res;
      }
      return $call1($Pervasives[1], $cst_Array_init);
    };
    $make_matrix = (dynamic $sx, dynamic $sy, dynamic $init) ==> {
      $x = null;
      $ae_ = null;
      $res = $caml_make_vect($sx, Vector{0});
      $ad_ = (int) ($sx + -1);
      $ac_ = 0;
      if (! ($ad_ < 0)) {
        $x = $ac_;
        for (;;) {
          $res[$x + 1] = $caml_make_vect($sy, $init);
          $ae_ = (int) ($x + 1);
          if ($ad_ !== $x) {$x = $ae_;continue;}
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
      $ab_ = null;
      $i = null;
      $aa_ = null;
      if (0 <= $ofs) {
        if (0 <= $len) {
          if (! ((int) ($a->count() - 1 - $len) < $ofs)) {
            $aa_ = (int) ((int) ($ofs + $len) + -1);
            if (! ($aa_ < $ofs)) {
              $i = $ofs;
              for (;;) {
                $a[$i + 1] = $v;
                $ab_ = (int) ($i + 1);
                if ($aa_ !== $i) {$i = $ab_;continue;}
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
      $i = null;
      $Z_ = null;
      $Y_ = (int) ($a->count() - 1 + -1);
      $X_ = 0;
      if (! ($Y_ < 0)) {
        $i = $X_;
        for (;;) {
          $call1($f, $a[$i + 1]);
          $Z_ = (int) ($i + 1);
          if ($Y_ !== $i) {$i = $Z_;continue;}
          break;
        }
      }
      return 0;
    };
    $iter2 = (dynamic $f, dynamic $a, dynamic $b) ==> {
      $W_ = null;
      $i = null;
      if ($a->count() - 1 !== $b->count() - 1) {
        return $call1(
          $Pervasives[1],
          $cst_Array_iter2_arrays_must_have_the_same_length
        );
      }
      $V_ = (int) ($a->count() - 1 + -1);
      $U_ = 0;
      if (! ($V_ < 0)) {
        $i = $U_;
        for (;;) {
          $call2($f, $a[$i + 1], $b[$i + 1]);
          $W_ = (int) ($i + 1);
          if ($V_ !== $i) {$i = $W_;continue;}
          break;
        }
      }
      return 0;
    };
    $map = (dynamic $f, dynamic $a) ==> {
      $i = null;
      $T_ = null;
      $l = $a->count() - 1;
      if (0 === $l) {return Vector{0};}
      $r = $caml_make_vect($l, $call1($f, $a[1]));
      $S_ = (int) ($l + -1);
      $R_ = 1;
      if (! ($S_ < 1)) {
        $i = $R_;
        for (;;) {
          $r[$i + 1] = $call1($f, $a[$i + 1]);
          $T_ = (int) ($i + 1);
          if ($S_ !== $i) {$i = $T_;continue;}
          break;
        }
      }
      return $r;
    };
    $map2 = (dynamic $f, dynamic $a, dynamic $b) ==> {
      $i = null;
      $Q_ = null;
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
      $P_ = (int) ($la + -1);
      $O_ = 1;
      if (! ($P_ < 1)) {
        $i = $O_;
        for (;;) {
          $r[$i + 1] = $call2($f, $a[$i + 1], $b[$i + 1]);
          $Q_ = (int) ($i + 1);
          if ($P_ !== $i) {$i = $Q_;continue;}
          break;
        }
      }
      return $r;
    };
    $iteri = (dynamic $f, dynamic $a) ==> {
      $i = null;
      $N_ = null;
      $M_ = (int) ($a->count() - 1 + -1);
      $L_ = 0;
      if (! ($M_ < 0)) {
        $i = $L_;
        for (;;) {
          $call2($f, $i, $a[$i + 1]);
          $N_ = (int) ($i + 1);
          if ($M_ !== $i) {$i = $N_;continue;}
          break;
        }
      }
      return 0;
    };
    $mapi = (dynamic $f, dynamic $a) ==> {
      $i = null;
      $K_ = null;
      $l = $a->count() - 1;
      if (0 === $l) {return Vector{0};}
      $r = $caml_make_vect($l, $call2($f, 0, $a[1]));
      $J_ = (int) ($l + -1);
      $I_ = 1;
      if (! ($J_ < 1)) {
        $i = $I_;
        for (;;) {
          $r[$i + 1] = $call2($f, $i, $a[$i + 1]);
          $K_ = (int) ($i + 1);
          if ($J_ !== $i) {$i = $K_;continue;}
          break;
        }
      }
      return $r;
    };
    $to_list = (dynamic $a) ==> {
      $res__0 = null;
      $i__0 = null;
      $i__1 = (int) ($a->count() - 1 + -1);
      $i = $i__1;
      $res = 0;
      for (;;) {
        if (0 <= $i) {
          $res__0 = Vector{0, $a[$i + 1], $res};
          $i__0 = (int) ($i + -1);
          $i = $i__0;
          $res = $res__0;
          continue;
        }
        return $res;
      }
    };
    $of_list = (dynamic $l) ==> {
      $i__0 = null;
      $hd__0 = null;
      $param__2 = null;
      $i = null;
      $param__1 = null;
      $a = null;
      $hd = null;
      $tl = null;
      $accu__0 = null;
      $param__0 = null;
      $accu = null;
      $param = null;
      if ($l) {
        $tl = $l[2];
        $hd = $l[1];
        $accu = 0;
        $param = $l;
        for (;;) {
          if ($param) {
            $param__0 = $param[2];
            $accu__0 = (int) ($accu + 1);
            $accu = $accu__0;
            $param = $param__0;
            continue;
          }
          $a = $caml_make_vect($accu, $hd);
          $i = 1;
          $param__1 = $tl;
          for (;;) {
            if ($param__1) {
              $param__2 = $param__1[2];
              $hd__0 = $param__1[1];
              $a[$i + 1] = $hd__0;
              $i__0 = (int) ($i + 1);
              $i = $i__0;
              $param__1 = $param__2;
              continue;
            }
            return $a;
          }
        }
      }
      return Vector{0};
    };
    $fold_left = (dynamic $f, dynamic $x, dynamic $a) ==> {
      $i = null;
      $H_ = null;
      $r = Vector{0, $x} as dynamic;
      $G_ = (int) ($a->count() - 1 + -1);
      $F_ = 0;
      if (! ($G_ < 0)) {
        $i = $F_;
        for (;;) {
          $r[1] = $call2($f, $r[1], $a[$i + 1]);
          $H_ = (int) ($i + 1);
          if ($G_ !== $i) {$i = $H_;continue;}
          break;
        }
      }
      return $r[1];
    };
    $fold_right = (dynamic $f, dynamic $a, dynamic $x) ==> {
      $i = null;
      $E_ = null;
      $r = Vector{0, $x} as dynamic;
      $D_ = (int) ($a->count() - 1 + -1);
      if (! ($D_ < 0)) {
        $i = $D_;
        for (;;) {
          $r[1] = $call2($f, $a[$i + 1], $r[1]);
          $E_ = (int) ($i + -1);
          if (0 !== $i) {$i = $E_;continue;}
          break;
        }
      }
      return $r[1];
    };
    $exists = (dynamic $p, dynamic $a) ==> {
      $i__0 = null;
      $n = $a->count() - 1;
      $i = 0;
      for (;;) {
        if ($i === $n) {return 0;}
        if ($call1($p, $a[$i + 1])) {return 1;}
        $i__0 = (int) ($i + 1);
        $i = $i__0;
        continue;
      }
    };
    $for_all = (dynamic $p, dynamic $a) ==> {
      $i__0 = null;
      $n = $a->count() - 1;
      $i = 0;
      for (;;) {
        if ($i === $n) {return 1;}
        if ($call1($p, $a[$i + 1])) {
          $i__0 = (int) ($i + 1);
          $i = $i__0;
          continue;
        }
        return 0;
      }
    };
    $mem = (dynamic $x, dynamic $a) ==> {
      $i__0 = null;
      $n = $a->count() - 1;
      $i = 0;
      for (;;) {
        if ($i === $n) {return 0;}
        if (0 === $runtime["caml_compare"]($a[$i + 1], $x)) {return 1;}
        $i__0 = (int) ($i + 1);
        $i = $i__0;
        continue;
      }
    };
    $memq = (dynamic $x, dynamic $a) ==> {
      $i__0 = null;
      $n = $a->count() - 1;
      $i = 0;
      for (;;) {
        if ($i === $n) {return 0;}
        if ($x === $a[$i + 1]) {return 1;}
        $i__0 = (int) ($i + 1);
        $i = $i__0;
        continue;
      }
    };
    $Bottom = Vector{248, $cst_Array_Bottom, $runtime["caml_fresh_oo_id"](0)} as dynamic;
    $sort = (dynamic $cmp, dynamic $a) ==> {
      $i = null;
      $father = null;
      $l_ = null;
      $e = null;
      $p_ = null;
      $i__0 = null;
      $e__0 = null;
      $i__1 = null;
      $q_ = null;
      $i__2 = null;
      $r_ = null;
      $maxson = (dynamic $l, dynamic $i) ==> {
        $w_ = null;
        $x_ = null;
        $y_ = null;
        $z_ = null;
        $A_ = null;
        $B_ = null;
        $C_ = null;
        $i31 = (int) ((int) ((int) ($i + $i) + $i) + 1);
        $x = Vector{0, $i31} as dynamic;
        if ((int) ($i31 + 2) < $l) {
          $w_ = (int) ($i31 + 1);
          $x_ = $caml_check_bound($a, $w_)[$w_ + 1];
          if ($call2($cmp, $caml_check_bound($a, $i31)[$i31 + 1], $x_) < 0) {$x[1] = (int) ($i31 + 1);}
          $y_ = (int) ($i31 + 2);
          $z_ = $caml_check_bound($a, $y_)[$y_ + 1];
          $A_ = $x[1];
          if ($call2($cmp, $caml_check_bound($a, $A_)[$A_ + 1], $z_) < 0) {$x[1] = (int) ($i31 + 2);}
          return $x[1];
        }
        if ((int) ($i31 + 1) < $l) {
          $B_ = (int) ($i31 + 1);
          $C_ = $caml_check_bound($a, $B_)[$B_ + 1];
          if (
            !
            (0 <= $call2($cmp, $caml_check_bound($a, $i31)[$i31 + 1], $C_))
          ) {return (int) ($i31 + 1);}
        }
        if ($i31 < $l) {return $i31;}
        throw $caml_wrap_thrown_exception(Vector{0, $Bottom, $i}) as \Throwable;
      };
      $trickledown = (dynamic $l, dynamic $i, dynamic $e) ==> {
        $j = null;
        $v_ = null;
        $i__0 = $i;
        for (;;) {
          $j = $maxson($l, $i__0);
          if (0 < $call2($cmp, $caml_check_bound($a, $j)[$j + 1], $e)) {
            $v_ = $caml_check_bound($a, $j)[$j + 1];
            $caml_check_bound($a, $i__0)[$i__0 + 1] = $v_;
            $i__0 = $j;
            continue;
          }
          $caml_check_bound($a, $i__0)[$i__0 + 1] = $e;
          return 0;
        }
      };
      $trickle = (dynamic $l, dynamic $i, dynamic $e) ==> {
        $u_ = null;
        $i__0 = null;
        try {$u_ = $trickledown($l, $i, $e);return $u_;}
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
        $i__1 = null;
        $t_ = null;
        $i__0 = $i;
        for (;;) {
          $i__1 = $maxson($l, $i__0);
          $t_ = $caml_check_bound($a, $i__1)[$i__1 + 1];
          $caml_check_bound($a, $i__0)[$i__0 + 1] = $t_;
          $i__0 = $i__1;
          continue;
        }
      };
      $bubble = (dynamic $l, dynamic $i) ==> {
        $s_ = null;
        $i__0 = null;
        try {$s_ = $bubbledown($l, $i);return $s_;}
        catch(\Throwable $exn) {
          $exn = $runtime["caml_wrap_exception"]($exn);
          if ($exn[1] === $Bottom) {$i__0 = $exn[2];return $i__0;}
          throw $caml_wrap_thrown_exception_reraise($exn) as \Throwable;
        }
      };
      $l = $a->count() - 1;
      $m_ = (int) ((int) ((int) ($l + 1) / 3) + -1);
      if (! ($m_ < 0)) {
        $i__2 = $m_;
        for (;;) {
          $trickle($l, $i__2, $caml_check_bound($a, $i__2)[$i__2 + 1]);
          $r_ = (int) ($i__2 + -1);
          if (0 !== $i__2) {$i__2 = $r_;continue;}
          break;
        }
      }
      $n_ = (int) ($l + -1);
      if (! ($n_ < 2)) {
        $i__0 = $n_;
        for (;;) {
          $continue_label = null;
          $e__0 = $caml_check_bound($a, $i__0)[$i__0 + 1];
          $a[$i__0 + 1] = $caml_check_bound($a, 0)[1];
          $i__1 = $bubble($i__0, 0);
          $i = $i__1;
          for (;;) {
            $father = (int) ((int) ($i + -1) / 3);
            if ($i === $father) {
              throw $caml_wrap_thrown_exception(
                      Vector{0, $Assert_failure, $a_}
                    ) as \Throwable;
            }
            if (
              0 <=
                $call2(
                  $cmp,
                  $caml_check_bound($a, $father)[$father + 1],
                  $e__0
                )
            ) {$caml_check_bound($a, $i)[$i + 1] = $e__0;}
            else {
              $l_ = $caml_check_bound($a, $father)[$father + 1];
              $caml_check_bound($a, $i)[$i + 1] = $l_;
              if (0 < $father) {$i = $father;continue;}
              $caml_check_bound($a, 0)[1] = $e__0;
            }
            $q_ = (int) ($i__0 + -1);
            if (2 !== $i__0) {$i__0 = $q_;$continue_label = "a";break;}
            break;
          }
          if ($continue_label === "a") {continue;}
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
      (dynamic $i1, dynamic $src1len, dynamic $src2, dynamic $i2, dynamic $src2len, dynamic $dst, dynamic $d) ==> {
        $i2__1 = null;
        $d__1 = null;
        $s2__0 = null;
        $i1__1 = null;
        $d__2 = null;
        $s1__0 = null;
        $src1r = (int) ($i1 + $src1len);
        $src2r = (int) ($i2 + $src2len);
        $s2__1 = $caml_check_bound($src2, $i2)[$i2 + 1];
        $s1__1 = $caml_check_bound($a, $i1)[$i1 + 1];
        $i1__0 = $i1;
        $s1 = $s1__1;
        $i2__0 = $i2;
        $s2 = $s2__1;
        $d__0 = $d;
        for (;;) {
          if (0 < $call2($cmp, $s1, $s2)) {
            $caml_check_bound($dst, $d__0)[$d__0 + 1] = $s2;
            $i2__1 = (int) ($i2__0 + 1);
            if ($i2__1 < $src2r) {
              $d__1 = (int) ($d__0 + 1);
              $s2__0 = $caml_check_bound($src2, $i2__1)[$i2__1 + 1];
              $i2__0 = $i2__1;
              $s2 = $s2__0;
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
          $caml_check_bound($dst, $d__0)[$d__0 + 1] = $s1;
          $i1__1 = (int) ($i1__0 + 1);
          if ($i1__1 < $src1r) {
            $d__2 = (int) ($d__0 + 1);
            $s1__0 = $caml_check_bound($a, $i1__1)[$i1__1 + 1];
            $i1__0 = $i1__1;
            $s1 = $s1__0;
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
      $isortto = 
      (dynamic $srcofs, dynamic $dst, dynamic $dstofs, dynamic $len) ==> {
        $i = null;
        $e_ = null;
        $e = null;
        $j = null;
        $f_ = null;
        $g_ = null;
        $h_ = null;
        $i_ = null;
        $j_ = null;
        $k_ = null;
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
    } as dynamic;
    
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

}
/* Hashing disabled */
