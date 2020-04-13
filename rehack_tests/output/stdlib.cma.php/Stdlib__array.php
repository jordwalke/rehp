<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class Stdlib__array {
  <<__Override, __Memoize>>
  public static function get() : Vector<dynamic> {
    
    $runtime = (\Rehack\GlobalObject::get() as dynamic)->jsoo_runtime;
    $caml_array_sub = $runtime["caml_array_sub"];
    $call1 = $runtime["caml_call1"];
    $call2 = $runtime["caml_call2"];
    $call3 = $runtime["caml_call3"];
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
    $cst_Stdlib_Array_Bottom = $string("Stdlib.Array.Bottom");
    $Stdlib_seq = Stdlib__seq::get();
    $Assert_failure = Assert_failure::get();
    $Stdlib = Stdlib::get();
    $a_ = Vector{0, $string("array.ml"), 236, 4} as dynamic;
    $make_float = (dynamic $at_) : dynamic ==> {
      return $runtime["caml_make_float_vect"]($at_);
    };
    $Floatarray = Vector{0} as dynamic;
    $init = (dynamic $l, dynamic $f) : dynamic ==> {
      $as_ = null as dynamic;
      $i = null as dynamic;
      $ar_ = null as dynamic;
      $aq_ = null as dynamic;
      $res = null as dynamic;
      if (0 === $l) {return Vector{0};}
      if (0 <= $l) {
        $res = $caml_make_vect($l, $call1($f, 0));
        $ar_ = (int) ($l + -1) as dynamic;
        $aq_ = 1 as dynamic;
        if (! ($ar_ < 1)) {
          $i = $aq_;
          for (;;) {
            $res[$i + 1] = $call1($f, $i);
            $as_ = (int) ($i + 1) as dynamic;
            if ($ar_ !== $i) {$i = $as_;continue;}
            break;
          }
        }
        return $res;
      }
      return $call1($Stdlib[1], $cst_Array_init);
    };
    $make_matrix = (dynamic $sx, dynamic $sy, dynamic $init) : dynamic ==> {
      $x = null as dynamic;
      $ap_ = null as dynamic;
      $res = $caml_make_vect($sx, Vector{0});
      $ao_ = (int) ($sx + -1) as dynamic;
      $an_ = 0 as dynamic;
      if (! ($ao_ < 0)) {
        $x = $an_;
        for (;;) {
          $res[$x + 1] = $caml_make_vect($sy, $init);
          $ap_ = (int) ($x + 1) as dynamic;
          if ($ao_ !== $x) {$x = $ap_;continue;}
          break;
        }
      }
      return $res;
    };
    $copy = (dynamic $a) : dynamic ==> {
      $l = $a->count() - 1;
      return 0 === $l ? Vector{0} : ($caml_array_sub($a, 0, $l));
    };
    $append = (dynamic $a1, dynamic $a2) : dynamic ==> {
      $l1 = $a1->count() - 1;
      return 0 === $l1
        ? $copy($a2)
        : (0 === $a2->count() - 1
         ? $caml_array_sub($a1, 0, $l1)
         : ($runtime["caml_array_append"]($a1, $a2)));
    };
    $sub = (dynamic $a, dynamic $ofs, dynamic $len) : dynamic ==> {
      if (0 <= $ofs) {
        if (0 <= $len) {
          if (! ((int) ($a->count() - 1 - $len) < $ofs)) {return $caml_array_sub($a, $ofs, $len);}
        }
      }
      return $call1($Stdlib[1], $cst_Array_sub);
    };
    $fill = (dynamic $a, dynamic $ofs, dynamic $len, dynamic $v) : dynamic ==> {
      $am_ = null as dynamic;
      $i = null as dynamic;
      $al_ = null as dynamic;
      if (0 <= $ofs) {
        if (0 <= $len) {
          if (! ((int) ($a->count() - 1 - $len) < $ofs)) {
            $al_ = (int) ((int) ($ofs + $len) + -1) as dynamic;
            if (! ($al_ < $ofs)) {
              $i = $ofs;
              for (;;) {
                $a[$i + 1] = $v;
                $am_ = (int) ($i + 1) as dynamic;
                if ($al_ !== $i) {$i = $am_;continue;}
                break;
              }
            }
            return 0;
          }
        }
      }
      return $call1($Stdlib[1], $cst_Array_fill);
    };
    $blit = 
    (dynamic $a1, dynamic $ofs1, dynamic $a2, dynamic $ofs2, dynamic $len) : dynamic ==> {
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
      return $call1($Stdlib[1], $cst_Array_blit);
    };
    $iter = (dynamic $f, dynamic $a) : dynamic ==> {
      $i = null as dynamic;
      $ak_ = null as dynamic;
      $aj_ = (int) ($a->count() - 1 + -1) as dynamic;
      $ai_ = 0 as dynamic;
      if (! ($aj_ < 0)) {
        $i = $ai_;
        for (;;) {
          $call1($f, $a[$i + 1]);
          $ak_ = (int) ($i + 1) as dynamic;
          if ($aj_ !== $i) {$i = $ak_;continue;}
          break;
        }
      }
      return 0;
    };
    $iter2 = (dynamic $f, dynamic $a, dynamic $b) : dynamic ==> {
      $ah_ = null as dynamic;
      $i = null as dynamic;
      if ($a->count() - 1 !== $b->count() - 1) {
        return $call1(
          $Stdlib[1],
          $cst_Array_iter2_arrays_must_have_the_same_length
        );
      }
      $ag_ = (int) ($a->count() - 1 + -1) as dynamic;
      $af_ = 0 as dynamic;
      if (! ($ag_ < 0)) {
        $i = $af_;
        for (;;) {
          $call2($f, $a[$i + 1], $b[$i + 1]);
          $ah_ = (int) ($i + 1) as dynamic;
          if ($ag_ !== $i) {$i = $ah_;continue;}
          break;
        }
      }
      return 0;
    };
    $map = (dynamic $f, dynamic $a) : dynamic ==> {
      $i = null as dynamic;
      $ae_ = null as dynamic;
      $l = $a->count() - 1;
      if (0 === $l) {return Vector{0};}
      $r = $caml_make_vect($l, $call1($f, $a[1]));
      $ad_ = (int) ($l + -1) as dynamic;
      $ac_ = 1 as dynamic;
      if (! ($ad_ < 1)) {
        $i = $ac_;
        for (;;) {
          $r[$i + 1] = $call1($f, $a[$i + 1]);
          $ae_ = (int) ($i + 1) as dynamic;
          if ($ad_ !== $i) {$i = $ae_;continue;}
          break;
        }
      }
      return $r;
    };
    $map2 = (dynamic $f, dynamic $a, dynamic $b) : dynamic ==> {
      $i = null as dynamic;
      $ab_ = null as dynamic;
      $la = $a->count() - 1;
      $lb = $b->count() - 1;
      if ($la !== $lb) {
        return $call1(
          $Stdlib[1],
          $cst_Array_map2_arrays_must_have_the_same_length
        );
      }
      if (0 === $la) {return Vector{0};}
      $r = $caml_make_vect($la, $call2($f, $a[1], $b[1]));
      $aa_ = (int) ($la + -1) as dynamic;
      $Z_ = 1 as dynamic;
      if (! ($aa_ < 1)) {
        $i = $Z_;
        for (;;) {
          $r[$i + 1] = $call2($f, $a[$i + 1], $b[$i + 1]);
          $ab_ = (int) ($i + 1) as dynamic;
          if ($aa_ !== $i) {$i = $ab_;continue;}
          break;
        }
      }
      return $r;
    };
    $iteri = (dynamic $f, dynamic $a) : dynamic ==> {
      $i = null as dynamic;
      $Y_ = null as dynamic;
      $X_ = (int) ($a->count() - 1 + -1) as dynamic;
      $W_ = 0 as dynamic;
      if (! ($X_ < 0)) {
        $i = $W_;
        for (;;) {
          $call2($f, $i, $a[$i + 1]);
          $Y_ = (int) ($i + 1) as dynamic;
          if ($X_ !== $i) {$i = $Y_;continue;}
          break;
        }
      }
      return 0;
    };
    $mapi = (dynamic $f, dynamic $a) : dynamic ==> {
      $i = null as dynamic;
      $V_ = null as dynamic;
      $l = $a->count() - 1;
      if (0 === $l) {return Vector{0};}
      $r = $caml_make_vect($l, $call2($f, 0, $a[1]));
      $U_ = (int) ($l + -1) as dynamic;
      $T_ = 1 as dynamic;
      if (! ($U_ < 1)) {
        $i = $T_;
        for (;;) {
          $r[$i + 1] = $call2($f, $i, $a[$i + 1]);
          $V_ = (int) ($i + 1) as dynamic;
          if ($U_ !== $i) {$i = $V_;continue;}
          break;
        }
      }
      return $r;
    };
    $to_list = (dynamic $a) : dynamic ==> {
      $tolist = (dynamic $i, dynamic $res) : dynamic ==> {
        $res__1 = null as dynamic;
        $i__1 = null as dynamic;
        $i__0 = $i;
        $res__0 = $res;
        for (;;) {
          if (0 <= $i__0) {
            $res__1 = Vector{0, $a[$i__0 + 1], $res__0} as dynamic;
            $i__1 = (int) ($i__0 + -1) as dynamic;
            $i__0 = $i__1;
            $res__0 = $res__1;
            continue;
          }
          return $res__0;
        }
      };
      return $tolist((int) ($a->count() - 1 + -1), 0);
    };
    $list_length = (dynamic $accu, dynamic $param) : dynamic ==> {
      $param__1 = null as dynamic;
      $accu__1 = null as dynamic;
      $accu__0 = $accu;
      $param__0 = $param;
      for (;;) {
        if ($param__0) {
          $param__1 = $param__0[2];
          $accu__1 = (int) ($accu__0 + 1) as dynamic;
          $accu__0 = $accu__1;
          $param__0 = $param__1;
          continue;
        }
        return $accu__0;
      }
    };
    $of_list = (dynamic $l) : dynamic ==> {
      $fill = null as dynamic;
      $a = null as dynamic;
      $hd = null as dynamic;
      $tl = null as dynamic;
      if ($l) {
        $tl = $l[2];
        $hd = $l[1];
        $a = $caml_make_vect($list_length(0, $l), $hd);
        $fill =
          (dynamic $i, dynamic $param) : dynamic ==> {
            $param__1 = null as dynamic;
            $hd = null as dynamic;
            $i__1 = null as dynamic;
            $i__0 = $i;
            $param__0 = $param;
            for (;;) {
              if ($param__0) {
                $param__1 = $param__0[2];
                $hd = $param__0[1];
                $a[$i__0 + 1] = $hd;
                $i__1 = (int) ($i__0 + 1) as dynamic;
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
    $fold_left = (dynamic $f, dynamic $x, dynamic $a) : dynamic ==> {
      $i = null as dynamic;
      $S_ = null as dynamic;
      $r = Vector{0, $x} as dynamic;
      $R_ = (int) ($a->count() - 1 + -1) as dynamic;
      $Q_ = 0 as dynamic;
      if (! ($R_ < 0)) {
        $i = $Q_;
        for (;;) {
          $r[1] = $call2($f, $r[1], $a[$i + 1]);
          $S_ = (int) ($i + 1) as dynamic;
          if ($R_ !== $i) {$i = $S_;continue;}
          break;
        }
      }
      return $r[1];
    };
    $fold_right = (dynamic $f, dynamic $a, dynamic $x) : dynamic ==> {
      $i = null as dynamic;
      $P_ = null as dynamic;
      $r = Vector{0, $x} as dynamic;
      $O_ = (int) ($a->count() - 1 + -1) as dynamic;
      if (! ($O_ < 0)) {
        $i = $O_;
        for (;;) {
          $r[1] = $call2($f, $a[$i + 1], $r[1]);
          $P_ = (int) ($i + -1) as dynamic;
          if (0 !== $i) {$i = $P_;continue;}
          break;
        }
      }
      return $r[1];
    };
    $exists = (dynamic $p, dynamic $a) : dynamic ==> {
      $n = $a->count() - 1;
      $loop = (dynamic $i) : dynamic ==> {
        $i__1 = null as dynamic;
        $i__0 = $i;
        for (;;) {
          if ($i__0 === $n) {return 0;}
          if ($call1($p, $a[$i__0 + 1])) {return 1;}
          $i__1 = (int) ($i__0 + 1) as dynamic;
          $i__0 = $i__1;
          continue;
        }
      };
      return $loop(0);
    };
    $for_all = (dynamic $p, dynamic $a) : dynamic ==> {
      $n = $a->count() - 1;
      $loop = (dynamic $i) : dynamic ==> {
        $i__1 = null as dynamic;
        $i__0 = $i;
        for (;;) {
          if ($i__0 === $n) {return 1;}
          if ($call1($p, $a[$i__0 + 1])) {
            $i__1 = (int) ($i__0 + 1) as dynamic;
            $i__0 = $i__1;
            continue;
          }
          return 0;
        }
      };
      return $loop(0);
    };
    $mem = (dynamic $x, dynamic $a) : dynamic ==> {
      $n = $a->count() - 1;
      $loop = (dynamic $i) : dynamic ==> {
        $i__1 = null as dynamic;
        $i__0 = $i;
        for (;;) {
          if ($i__0 === $n) {return 0;}
          if (0 === $runtime["caml_compare"]($a[$i__0 + 1], $x)) {return 1;}
          $i__1 = (int) ($i__0 + 1) as dynamic;
          $i__0 = $i__1;
          continue;
        }
      };
      return $loop(0);
    };
    $memq = (dynamic $x, dynamic $a) : dynamic ==> {
      $n = $a->count() - 1;
      $loop = (dynamic $i) : dynamic ==> {
        $i__1 = null as dynamic;
        $i__0 = $i;
        for (;;) {
          if ($i__0 === $n) {return 0;}
          if ($x === $a[$i__0 + 1]) {return 1;}
          $i__1 = (int) ($i__0 + 1) as dynamic;
          $i__0 = $i__1;
          continue;
        }
      };
      return $loop(0);
    };
    $Bottom = Vector{
      248,
      $cst_Stdlib_Array_Bottom,
      $runtime["caml_fresh_oo_id"](0)
    } as dynamic;
    $sort = (dynamic $cmp, dynamic $a) : dynamic ==> {
      $e = null as dynamic;
      $z_ = null as dynamic;
      $i = null as dynamic;
      $e__0 = null as dynamic;
      $A_ = null as dynamic;
      $i__0 = null as dynamic;
      $B_ = null as dynamic;
      $maxson = (dynamic $l, dynamic $i) : dynamic ==> {
        $H_ = null as dynamic;
        $I_ = null as dynamic;
        $J_ = null as dynamic;
        $K_ = null as dynamic;
        $L_ = null as dynamic;
        $M_ = null as dynamic;
        $N_ = null as dynamic;
        $i31 = (int) ((int) ((int) ($i + $i) + $i) + 1) as dynamic;
        $x = Vector{0, $i31} as dynamic;
        if ((int) ($i31 + 2) < $l) {
          $H_ = (int) ($i31 + 1) as dynamic;
          $I_ = $caml_check_bound($a, $H_)[$H_ + 1];
          if ($call2($cmp, $caml_check_bound($a, $i31)[$i31 + 1], $I_) < 0) {$x[1] = (int) ($i31 + 1);}
          $J_ = (int) ($i31 + 2) as dynamic;
          $K_ = $caml_check_bound($a, $J_)[$J_ + 1];
          $L_ = $x[1];
          if ($call2($cmp, $caml_check_bound($a, $L_)[$L_ + 1], $K_) < 0) {$x[1] = (int) ($i31 + 2);}
          return $x[1];
        }
        if ((int) ($i31 + 1) < $l) {
          $M_ = (int) ($i31 + 1) as dynamic;
          $N_ = $caml_check_bound($a, $M_)[$M_ + 1];
          if (
            !
            (0 <= $call2($cmp, $caml_check_bound($a, $i31)[$i31 + 1], $N_))
          ) {return (int) ($i31 + 1);}
        }
        if ($i31 < $l) {return $i31;}
        throw $caml_wrap_thrown_exception(Vector{0, $Bottom, $i}) as \Throwable;
      };
      $trickledown = (dynamic $l, dynamic $i, dynamic $e) : dynamic ==> {
        $j = null as dynamic;
        $G_ = null as dynamic;
        $i__0 = $i;
        for (;;) {
          $j = $maxson($l, $i__0);
          if (0 < $call2($cmp, $caml_check_bound($a, $j)[$j + 1], $e)) {
            $G_ = $caml_check_bound($a, $j)[$j + 1];
            $caml_check_bound($a, $i__0)[$i__0 + 1] = $G_;
            $i__0 = $j;
            continue;
          }
          $caml_check_bound($a, $i__0)[$i__0 + 1] = $e;
          return 0;
        }
      };
      $trickle = (dynamic $l, dynamic $i, dynamic $e) : dynamic ==> {
        $F_ = null as dynamic;
        $i__0 = null as dynamic;
        try {$F_ = $trickledown($l, $i, $e);return $F_;}
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
      $bubbledown = (dynamic $l, dynamic $i) : dynamic ==> {
        $i__1 = null as dynamic;
        $E_ = null as dynamic;
        $i__0 = $i;
        for (;;) {
          $i__1 = $maxson($l, $i__0);
          $E_ = $caml_check_bound($a, $i__1)[$i__1 + 1];
          $caml_check_bound($a, $i__0)[$i__0 + 1] = $E_;
          $i__0 = $i__1;
          continue;
        }
      };
      $bubble = (dynamic $l, dynamic $i) : dynamic ==> {
        $D_ = null as dynamic;
        $i__0 = null as dynamic;
        try {$D_ = $bubbledown($l, $i);return $D_;}
        catch(\Throwable $exn) {
          $exn = $runtime["caml_wrap_exception"]($exn);
          if ($exn[1] === $Bottom) {$i__0 = $exn[2];return $i__0;}
          throw $caml_wrap_thrown_exception_reraise($exn) as \Throwable;
        }
      };
      $trickleup = (dynamic $i, dynamic $e) : dynamic ==> {
        $father = null as dynamic;
        $C_ = null as dynamic;
        $i__0 = $i;
        for (;;) {
          $father = (int) ((int) ($i__0 + -1) / 3) as dynamic;
          if ($i__0 !== $father) {
            if (
              0 <=
                $call2($cmp, $caml_check_bound($a, $father)[$father + 1], $e)
            ) {$caml_check_bound($a, $i__0)[$i__0 + 1] = $e;return 0;}
            $C_ = $caml_check_bound($a, $father)[$father + 1];
            $caml_check_bound($a, $i__0)[$i__0 + 1] = $C_;
            if (0 < $father) {$i__0 = $father;continue;}
            $caml_check_bound($a, 0)[1] = $e;
            return 0;
          }
          throw $caml_wrap_thrown_exception(Vector{0, $Assert_failure, $a_}) as \Throwable;
        }
      };
      $l = $a->count() - 1;
      $w_ = (int) ((int) ((int) ($l + 1) / 3) + -1) as dynamic;
      if (! ($w_ < 0)) {
        $i__0 = $w_;
        for (;;) {
          $trickle($l, $i__0, $caml_check_bound($a, $i__0)[$i__0 + 1]);
          $B_ = (int) ($i__0 + -1) as dynamic;
          if (0 !== $i__0) {$i__0 = $B_;continue;}
          break;
        }
      }
      $x_ = (int) ($l + -1) as dynamic;
      if (! ($x_ < 2)) {
        $i = $x_;
        for (;;) {
          $e__0 = $caml_check_bound($a, $i)[$i + 1];
          $a[$i + 1] = $caml_check_bound($a, 0)[1];
          $trickleup($bubble($i, 0), $e__0);
          $A_ = (int) ($i + -1) as dynamic;
          if (2 !== $i) {$i = $A_;continue;}
          break;
        }
      }
      $y_ = 1 < $l ? 1 : (0);
      if ($y_) {
        $e = $caml_check_bound($a, 1)[2];
        $a[2] = $caml_check_bound($a, 0)[1];
        $a[1] = $e;
        $z_ = 0 as dynamic;
      }
      else {$z_ = $y_;}
      return $z_;
    };
    $stable_sort = (dynamic $cmp, dynamic $a) : dynamic ==> {
      $sortto = new Ref();
      $merge = 
      (dynamic $src1ofs, dynamic $src1len, dynamic $src2, dynamic $src2ofs, dynamic $src2len, dynamic $dst, dynamic $dstofs) : dynamic ==> {
        $src1r = (int) ($src1ofs + $src1len) as dynamic;
        $src2r = (int) ($src2ofs + $src2len) as dynamic;
        $loop = 
        (dynamic $i1, dynamic $s1, dynamic $i2, dynamic $s2, dynamic $d) : dynamic ==> {
          $i2__1 = null as dynamic;
          $d__1 = null as dynamic;
          $s2__1 = null as dynamic;
          $i1__1 = null as dynamic;
          $d__2 = null as dynamic;
          $s1__1 = null as dynamic;
          $i1__0 = $i1;
          $s1__0 = $s1;
          $i2__0 = $i2;
          $s2__0 = $s2;
          $d__0 = $d;
          for (;;) {
            if (0 < $call2($cmp, $s1__0, $s2__0)) {
              $caml_check_bound($dst, $d__0)[$d__0 + 1] = $s2__0;
              $i2__1 = (int) ($i2__0 + 1) as dynamic;
              if ($i2__1 < $src2r) {
                $d__1 = (int) ($d__0 + 1) as dynamic;
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
            $i1__1 = (int) ($i1__0 + 1) as dynamic;
            if ($i1__1 < $src1r) {
              $d__2 = (int) ($d__0 + 1) as dynamic;
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
        $v_ = $caml_check_bound($src2, $src2ofs)[$src2ofs + 1];
        return $loop(
          $src1ofs,
          $caml_check_bound($a, $src1ofs)[$src1ofs + 1],
          $src2ofs,
          $v_,
          $dstofs
        );
      };
      $isortto = 
      (dynamic $srcofs, dynamic $dst, dynamic $dstofs, dynamic $len) : dynamic ==> {
        $i = null as dynamic;
        $o_ = null as dynamic;
        $e = null as dynamic;
        $j = null as dynamic;
        $p_ = null as dynamic;
        $q_ = null as dynamic;
        $r_ = null as dynamic;
        $s_ = null as dynamic;
        $t_ = null as dynamic;
        $u_ = null as dynamic;
        $n_ = (int) ($len + -1) as dynamic;
        $m_ = 0 as dynamic;
        if (! ($n_ < 0)) {
          $i = $m_;
          for (;;) {
            $continue_label = null;
            $o_ = (int) ($srcofs + $i) as dynamic;
            $e = $caml_check_bound($a, $o_)[$o_ + 1];
            $j = Vector{0, (int) ((int) ($dstofs + $i) + -1)} as dynamic;
            for (;;) {
              if ($dstofs <= $j[1]) {
                $p_ = $j[1];
                if (
                  0 < $call2($cmp, $caml_check_bound($dst, $p_)[$p_ + 1], $e)
                ) {
                  $q_ = $j[1];
                  $r_ = $caml_check_bound($dst, $q_)[$q_ + 1];
                  $s_ = (int) ($j[1] + 1) as dynamic;
                  $caml_check_bound($dst, $s_)[$s_ + 1] = $r_;
                  $j[1] += -1;
                  continue;
                }
              }
              $t_ = (int) ($j[1] + 1) as dynamic;
              $caml_check_bound($dst, $t_)[$t_ + 1] = $e;
              $u_ = (int) ($i + 1) as dynamic;
              if ($n_ !== $i) {$i = $u_;$continue_label = "a";break;}
              break;
            }
            if ($continue_label === "a") {continue;}
            break;
          }
        }
        return 0;
      };
      $sortto->contents = 
      (dynamic $srcofs, dynamic $dst, dynamic $dstofs, dynamic $len) : dynamic ==> {
        if ($len <= 5) {return $isortto($srcofs, $dst, $dstofs, $len);}
        $l1 = (int) ($len / 2) as dynamic;
        $l2 = (int) ($len - $l1) as dynamic;
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
      $l1 = (int) ($l / 2) as dynamic;
      $l2 = (int) ($l - $l1) as dynamic;
      $t = $caml_make_vect($l2, $caml_check_bound($a, 0)[1]);
      $sortto->contents($l1, $t, 0, $l2);
      $sortto->contents(0, $a, $l2, $l1);
      return $merge($l2, $l1, $t, 0, $l2, $a, 0);
    };
    $to_seq = (dynamic $a) : dynamic ==> {
      $aux = new Ref();
      $aux->contents = (dynamic $i, dynamic $param) : dynamic ==> {
        $k_ = null as dynamic;
        $x = null as dynamic;
        if ($i < $a->count() - 1) {
          $x = $a[$i + 1];
          $k_ = (int) ($i + 1) as dynamic;
          return Vector{
            0,
            $x,
            (dynamic $l_) : dynamic ==> {return $aux->contents($k_, $l_);}
          };
        }
        return 0;
      };
      $i_ = 0 as dynamic;
      return (dynamic $j_) : dynamic ==> {return $aux->contents($i_, $j_);};
    };
    $to_seqi = (dynamic $a) : dynamic ==> {
      $aux = new Ref();
      $aux->contents = (dynamic $i, dynamic $param) : dynamic ==> {
        $g_ = null as dynamic;
        $x = null as dynamic;
        if ($i < $a->count() - 1) {
          $x = $a[$i + 1];
          $g_ = (int) ($i + 1) as dynamic;
          return Vector{
            0,
            Vector{0, $i, $x},
            (dynamic $h_) : dynamic ==> {return $aux->contents($g_, $h_);}
          };
        }
        return 0;
      };
      $e_ = 0 as dynamic;
      return (dynamic $f_) : dynamic ==> {return $aux->contents($e_, $f_);};
    };
    $of_rev_list = (dynamic $l) : dynamic ==> {
      $fill = null as dynamic;
      $a = null as dynamic;
      $len = null as dynamic;
      $hd = null as dynamic;
      $tl = null as dynamic;
      if ($l) {
        $tl = $l[2];
        $hd = $l[1];
        $len = $list_length(0, $l);
        $a = $caml_make_vect($len, $hd);
        $fill =
          (dynamic $i, dynamic $param) : dynamic ==> {
            $param__1 = null as dynamic;
            $hd = null as dynamic;
            $i__1 = null as dynamic;
            $i__0 = $i;
            $param__0 = $param;
            for (;;) {
              if ($param__0) {
                $param__1 = $param__0[2];
                $hd = $param__0[1];
                $a[$i__0 + 1] = $hd;
                $i__1 = (int) ($i__0 + -1) as dynamic;
                $i__0 = $i__1;
                $param__0 = $param__1;
                continue;
              }
              return $a;
            }
          };
        return $fill((int) ($len + -2), $tl);
      }
      return Vector{0};
    };
    $of_seq = (dynamic $i) : dynamic ==> {
      $c_ = 0 as dynamic;
      $d_ = (dynamic $acc, dynamic $x) : dynamic ==> {
        return Vector{0, $x, $acc};
      };
      $l = $call3($Stdlib_seq[7], $d_, $c_, $i);
      return $of_rev_list($l);
    };
    $Stdlib_array = Vector{
      0,
      $make_float,
      $init,
      $make_matrix,
      $make_matrix,
      $append,
      (dynamic $b_) : dynamic ==> {return $runtime["caml_array_concat"]($b_);},
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
      $to_seq,
      $to_seqi,
      $of_seq,
      $Floatarray
    } as dynamic;
    
    return($Stdlib_array);

  }
  public static function make_float(dynamic $unnamed1): dynamic {
    return static::syncCall(__FUNCTION__, 1, $unnamed1);
  }
  public static function init(dynamic $l, dynamic $f): dynamic {
    return static::syncCall(__FUNCTION__, 2, $l, $f);
  }
  public static function make_matrix(dynamic $sx, dynamic $sy, dynamic $init): dynamic {
    return static::syncCall(__FUNCTION__, 3, $sx, $sy, $init);
  }
  public static function append(dynamic $a1, dynamic $a2): dynamic {
    return static::syncCall(__FUNCTION__, 5, $a1, $a2);
  }
  public static function sub(dynamic $a, dynamic $ofs, dynamic $len): dynamic {
    return static::syncCall(__FUNCTION__, 7, $a, $ofs, $len);
  }
  public static function copy(dynamic $a): dynamic {
    return static::syncCall(__FUNCTION__, 8, $a);
  }
  public static function fill(dynamic $a, dynamic $ofs, dynamic $len, dynamic $v): dynamic {
    return static::syncCall(__FUNCTION__, 9, $a, $ofs, $len, $v);
  }
  public static function blit(dynamic $a1, dynamic $ofs1, dynamic $a2, dynamic $ofs2, dynamic $len): dynamic {
    return static::syncCall(__FUNCTION__, 10, $a1, $ofs1, $a2, $ofs2, $len);
  }
  public static function to_list(dynamic $a): dynamic {
    return static::syncCall(__FUNCTION__, 11, $a);
  }
  public static function of_list(dynamic $l): dynamic {
    return static::syncCall(__FUNCTION__, 12, $l);
  }
  public static function iter(dynamic $f, dynamic $a): dynamic {
    return static::syncCall(__FUNCTION__, 13, $f, $a);
  }
  public static function iteri(dynamic $f, dynamic $a): dynamic {
    return static::syncCall(__FUNCTION__, 14, $f, $a);
  }
  public static function map(dynamic $f, dynamic $a): dynamic {
    return static::syncCall(__FUNCTION__, 15, $f, $a);
  }
  public static function mapi(dynamic $f, dynamic $a): dynamic {
    return static::syncCall(__FUNCTION__, 16, $f, $a);
  }
  public static function fold_left(dynamic $f, dynamic $x, dynamic $a): dynamic {
    return static::syncCall(__FUNCTION__, 17, $f, $x, $a);
  }
  public static function fold_right(dynamic $f, dynamic $a, dynamic $x): dynamic {
    return static::syncCall(__FUNCTION__, 18, $f, $a, $x);
  }
  public static function iter2(dynamic $f, dynamic $a, dynamic $b): dynamic {
    return static::syncCall(__FUNCTION__, 19, $f, $a, $b);
  }
  public static function map2(dynamic $f, dynamic $a, dynamic $b): dynamic {
    return static::syncCall(__FUNCTION__, 20, $f, $a, $b);
  }
  public static function for_all(dynamic $p, dynamic $a): dynamic {
    return static::syncCall(__FUNCTION__, 21, $p, $a);
  }
  public static function exists(dynamic $p, dynamic $a): dynamic {
    return static::syncCall(__FUNCTION__, 22, $p, $a);
  }
  public static function mem(dynamic $x, dynamic $a): dynamic {
    return static::syncCall(__FUNCTION__, 23, $x, $a);
  }
  public static function memq(dynamic $x, dynamic $a): dynamic {
    return static::syncCall(__FUNCTION__, 24, $x, $a);
  }
  public static function sort(dynamic $cmp, dynamic $a): dynamic {
    return static::syncCall(__FUNCTION__, 25, $cmp, $a);
  }
  public static function stable_sort(dynamic $cmp, dynamic $a): dynamic {
    return static::syncCall(__FUNCTION__, 26, $cmp, $a);
  }
  public static function to_seq(dynamic $a): dynamic {
    return static::syncCall(__FUNCTION__, 28, $a);
  }
  public static function to_seqi(dynamic $a): dynamic {
    return static::syncCall(__FUNCTION__, 29, $a);
  }
  public static function of_seq(dynamic $i): dynamic {
    return static::syncCall(__FUNCTION__, 30, $i);
  }

}
/* Hashing disabled */
