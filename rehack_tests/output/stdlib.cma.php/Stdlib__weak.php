<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class Stdlib__weak {
  <<__Override, __Memoize>>
  public static function get() : Vector<dynamic> {
    
    $runtime = (\Rehack\GlobalObject::get() as dynamic)->jsoo_runtime;
    $call1 = $runtime["caml_call1"];
    $call2 = $runtime["caml_call2"];
    $call3 = $runtime["caml_call3"];
    $call5 = $runtime["caml_call5"];
    $caml_check_bound = $runtime["caml_check_bound"];
    $caml_make_vect = $runtime["caml_make_vect"];
    $caml_mod = $runtime["caml_mod"];
    $string = $runtime["caml_new_string"];
    $caml_obj_truncate = $runtime["caml_obj_truncate"];
    $caml_wrap_thrown_exception = $runtime["caml_wrap_thrown_exception"];
    $cst_Weak_Make_hash_bucket_cannot_grow_more = $string(
      "Weak.Make: hash bucket cannot grow more"
    );
    $cst_Weak_fill = $string("Weak.fill");
    $cst_Weak_blit = $string("Weak.blit");
    $cst_Weak_check = $string("Weak.check");
    $cst_Weak_get_copy = $string("Weak.get_copy");
    $cst_Weak_get = $string("Weak.get");
    $cst_Weak_set = $string("Weak.set");
    $cst_Weak_create = $string("Weak.create");
    $Stdlib = Stdlib::get();
    $Stdlib_sys = Stdlib__sys::get();
    $Stdlib_array = Stdlib__array::get();
    $Stdlib_obj = Stdlib__obj::get();
    $create = (dynamic $l) : dynamic ==> {
      $af_ = 0 <= $l ? 1 : (0);
      $ag_ = $af_ ? $l <= $Stdlib_obj[27][15] ? 1 : (0) : ($af_);
      if (1 - $ag_) {$call1($Stdlib[1], $cst_Weak_create);}
      return $runtime["caml_weak_create"]($l);
    };
    $length = (dynamic $x) : dynamic ==> {return (int) ($x->count() - 1 - 2);};
    $raise_if_invalid_offset = (dynamic $e, dynamic $o, dynamic $msg) : dynamic ==> {
      $ac_ = 0 <= $o ? 1 : (0);
      $ad_ = $ac_ ? $o < $length($e) ? 1 : (0) : ($ac_);
      $ae_ = 1 - $ad_;
      return $ae_ ? $call1($Stdlib[1], $msg) : ($ae_);
    };
    $set = (dynamic $e, dynamic $o, dynamic $x) : dynamic ==> {
      $x__0 = null as dynamic;
      $raise_if_invalid_offset($e, $o, $cst_Weak_set);
      if ($x) {
        $x__0 = $x[1];
        return $runtime["caml_ephe_set_key"]($e, $o, $x__0);
      }
      return $runtime["caml_ephe_unset_key"]($e, $o);
    };
    $get = (dynamic $e, dynamic $o) : dynamic ==> {
      $raise_if_invalid_offset($e, $o, $cst_Weak_get);
      return $runtime["caml_weak_get"]($e, $o);
    };
    $get_copy = (dynamic $e, dynamic $o) : dynamic ==> {
      $raise_if_invalid_offset($e, $o, $cst_Weak_get_copy);
      return $runtime["caml_weak_get_copy"]($e, $o);
    };
    $check = (dynamic $e, dynamic $o) : dynamic ==> {
      $raise_if_invalid_offset($e, $o, $cst_Weak_check);
      return $runtime["caml_weak_check"]($e, $o);
    };
    $blit = (dynamic $e1, dynamic $o1, dynamic $e2, dynamic $o2, dynamic $l) : dynamic ==> {
      $aa_ = null as dynamic;
      $ab_ = null as dynamic;
      if (0 <= $l) {
        if (0 <= $o1) {
          if (! ((int) ($length($e1) - $l) < $o1)) {
            if (0 <= $o2) {
              if (! ((int) ($length($e2) - $l) < $o2)) {
                $aa_ = 0 !== $l ? 1 : (0);
                $ab_ = $aa_
                  ? $runtime["caml_weak_blit"]($e1, $o1, $e2, $o2, $l)
                  : ($aa_);
                return $ab_;
              }
            }
          }
        }
      }
      return $call1($Stdlib[1], $cst_Weak_blit);
    };
    $fill = (dynamic $ar, dynamic $ofs, dynamic $len, dynamic $x) : dynamic ==> {
      $Y_ = null as dynamic;
      $Z_ = null as dynamic;
      $i = null as dynamic;
      if (0 <= $ofs) {
        if (0 <= $len) {
          if (! ((int) ($length($ar) - $len) < $ofs)) {
            $Y_ = (int) ((int) ($ofs + $len) + -1) as dynamic;
            if (! ($Y_ < $ofs)) {
              $i = $ofs;
              for (;;) {
                $set($ar, $i, $x);
                $Z_ = (int) ($i + 1) as dynamic;
                if ($Y_ !== $i) {$i = $Z_;continue;}
                break;
              }
            }
            return 0;
          }
        }
      }
      throw $caml_wrap_thrown_exception(Vector{0, $Stdlib[6], $cst_Weak_fill}) as \Throwable;
    };
    $Make = (dynamic $H) : dynamic ==> {
      $add_aux = new Ref();
      $emptybucket = $create(0);
      $get_index = (dynamic $t, dynamic $h) : dynamic ==> {
        return $caml_mod($h & $Stdlib[19], $t[1]->count() - 1);
      };
      $limit = 7 as dynamic;
      $create__0 = (dynamic $sz) : dynamic ==> {
        $sz__0 = 7 <= $sz ? $sz : (7);
        $sz__1 = $Stdlib_sys[14] < $sz__0 ? $Stdlib_sys[14] : ($sz__0);
        return Vector{
          0,
          $caml_make_vect($sz__1, $emptybucket),
          $caml_make_vect($sz__1, Vector{0}),
          $limit,
          0,
          0
        };
      };
      $clear = (dynamic $t) : dynamic ==> {
        $X_ = null as dynamic;
        $i = null as dynamic;
        $W_ = (int) ($t[1]->count() - 1 + -1) as dynamic;
        $V_ = 0 as dynamic;
        if (! ($W_ < 0)) {
          $i = $V_;
          for (;;) {
            $caml_check_bound($t[1], $i)[$i + 1] = $emptybucket;
            $caml_check_bound($t[2], $i)[$i + 1] = Vector{0};
            $X_ = (int) ($i + 1) as dynamic;
            if ($W_ !== $i) {$i = $X_;continue;}
            break;
          }
        }
        $t[3] = $limit;
        $t[4] = 0;
        return 0;
      };
      $fold = (dynamic $f, dynamic $t, dynamic $init) : dynamic ==> {
        $fold_bucket = (dynamic $i, dynamic $b, dynamic $accu) : dynamic ==> {
          $accu__1 = null as dynamic;
          $i__1 = null as dynamic;
          $i__2 = null as dynamic;
          $match = null as dynamic;
          $v = null as dynamic;
          $i__0 = $i;
          $accu__0 = $accu;
          for (;;) {
            if ($length($b) <= $i__0) {return $accu__0;}
            $match = $get($b, $i__0);
            if ($match) {
              $v = $match[1];
              $accu__1 = $call2($f, $v, $accu__0);
              $i__1 = (int) ($i__0 + 1) as dynamic;
              $i__0 = $i__1;
              $accu__0 = $accu__1;
              continue;
            }
            $i__2 = (int) ($i__0 + 1) as dynamic;
            $i__0 = $i__2;
            continue;
          }
        };
        $Q_ = $t[1];
        $R_ = 0 as dynamic;
        $S_ = (dynamic $T_, dynamic $U_) : dynamic ==> {
          return $fold_bucket($R_, $T_, $U_);
        };
        return $call3($Stdlib_array[18], $S_, $Q_, $init);
      };
      $iter = (dynamic $f, dynamic $t) : dynamic ==> {
        $iter_bucket = (dynamic $i, dynamic $b) : dynamic ==> {
          $i__1 = null as dynamic;
          $i__2 = null as dynamic;
          $match = null as dynamic;
          $v = null as dynamic;
          $i__0 = $i;
          for (;;) {
            if ($length($b) <= $i__0) {return 0;}
            $match = $get($b, $i__0);
            if ($match) {
              $v = $match[1];
              $call1($f, $v);
              $i__1 = (int) ($i__0 + 1) as dynamic;
              $i__0 = $i__1;
              continue;
            }
            $i__2 = (int) ($i__0 + 1) as dynamic;
            $i__0 = $i__2;
            continue;
          }
        };
        $M_ = $t[1];
        $N_ = 0 as dynamic;
        $O_ = (dynamic $P_) : dynamic ==> {return $iter_bucket($N_, $P_);};
        return $call2($Stdlib_array[13], $O_, $M_);
      };
      $iter_weak = (dynamic $f, dynamic $t) : dynamic ==> {
        $iter_bucket = (dynamic $i, dynamic $j, dynamic $b) : dynamic ==> {
          $i__1 = null as dynamic;
          $i__2 = null as dynamic;
          $match = null as dynamic;
          $i__0 = $i;
          for (;;) {
            if ($length($b) <= $i__0) {return 0;}
            $match = $check($b, $i__0);
            if (0 === $match) {
              $i__1 = (int) ($i__0 + 1) as dynamic;
              $i__0 = $i__1;
              continue;
            }
            $call3($f, $b, $caml_check_bound($t[2], $j)[$j + 1], $i__0);
            $i__2 = (int) ($i__0 + 1) as dynamic;
            $i__0 = $i__2;
            continue;
          }
        };
        $H_ = $t[1];
        $I_ = 0 as dynamic;
        $J_ = (dynamic $K_, dynamic $L_) : dynamic ==> {
          return $iter_bucket($I_, $K_, $L_);
        };
        return $call2($Stdlib_array[14], $J_, $H_);
      };
      $count_bucket = (dynamic $i, dynamic $b, dynamic $accu) : dynamic ==> {
        $G_ = null as dynamic;
        $accu__1 = null as dynamic;
        $i__1 = null as dynamic;
        $i__0 = $i;
        $accu__0 = $accu;
        for (;;) {
          if ($length($b) <= $i__0) {return $accu__0;}
          $G_ = $check($b, $i__0) ? 1 : (0);
          $accu__1 = (int) ($accu__0 + $G_) as dynamic;
          $i__1 = (int) ($i__0 + 1) as dynamic;
          $i__0 = $i__1;
          $accu__0 = $accu__1;
          continue;
        }
      };
      $count = (dynamic $t) : dynamic ==> {
        $A_ = 0 as dynamic;
        $B_ = $t[1];
        $C_ = 0 as dynamic;
        $D_ = (dynamic $E_, dynamic $F_) : dynamic ==> {
          return $count_bucket($C_, $E_, $F_);
        };
        return $call3($Stdlib_array[18], $D_, $B_, $A_);
      };
      $next_sz = (dynamic $n) : dynamic ==> {
        return $call2(
          $Stdlib[16],
          (int)
          ((int) ((int) (3 * $n) / 2) + 3),
          $Stdlib_sys[14]
        );
      };
      $prev_sz = (dynamic $n) : dynamic ==> {
        return (int) ((int) ((int) ((int) ($n + -3) * 2) + 2) / 3);
      };
      $test_shrink_bucket = (dynamic $t) : dynamic ==> {
        $loop = null as dynamic;
        $u_ = null as dynamic;
        $v_ = null as dynamic;
        $w_ = null as dynamic;
        $x_ = null as dynamic;
        $s_ = $t[5];
        $bucket = $caml_check_bound($t[1], $s_)[$s_ + 1];
        $t_ = $t[5];
        $hbucket = $caml_check_bound($t[2], $t_)[$t_ + 1];
        $len = $length($bucket);
        $prev_len = $prev_sz($len);
        $live = $count_bucket(0, $bucket, 0);
        if ($live <= $prev_len) {
          $loop = (dynamic $i, dynamic $j) : dynamic ==> {
            $i__1 = null as dynamic;
            $i__2 = null as dynamic;
            $j__1 = null as dynamic;
            $j__2 = null as dynamic;
            $y_ = null as dynamic;
            $z_ = null as dynamic;
            $i__0 = $i;
            $j__0 = $j;
            for (;;) {
              $y_ = $prev_len <= $j__0 ? 1 : (0);
              if ($y_) {
                if ($check($bucket, $i__0)) {
                  $i__1 = (int) ($i__0 + 1) as dynamic;
                  $i__0 = $i__1;
                  continue;
                }
                if ($check($bucket, $j__0)) {
                  $blit($bucket, $j__0, $bucket, $i__0, 1);
                  $z_ = $caml_check_bound($hbucket, $j__0)[$j__0 + 1];
                  $caml_check_bound($hbucket, $i__0)[$i__0 + 1] = $z_;
                  $j__1 = (int) ($j__0 + -1) as dynamic;
                  $i__2 = (int) ($i__0 + 1) as dynamic;
                  $i__0 = $i__2;
                  $j__0 = $j__1;
                  continue;
                }
                $j__2 = (int) ($j__0 + -1) as dynamic;
                $j__0 = $j__2;
                continue;
              }
              return $y_;
            }
          };
          $loop(0, (int) ($length($bucket) + -1));
          if (0 === $prev_len) {
            $u_ = $t[5];
            $caml_check_bound($t[1], $u_)[$u_ + 1] = $emptybucket;
            $v_ = $t[5];
            $caml_check_bound($t[2], $v_)[$v_ + 1] = Vector{0};
          }
          else {
            $caml_obj_truncate($bucket, (int) ($prev_len + 2));
            $caml_obj_truncate($hbucket, $prev_len);
          }
          $w_ = $t[3] < $len ? 1 : (0);
          $x_ = $w_ ? $prev_len <= $t[3] ? 1 : (0) : ($w_);
          if ($x_) {$t[4] = (int) ($t[4] + -1);}
        }
        $t[5] = $caml_mod((int) ($t[5] + 1), $t[1]->count() - 1);
        return 0;
      };
      $resize = (dynamic $t) : dynamic ==> {
        $add_weak = null as dynamic;
        $newt = null as dynamic;
        $oldlen = $t[1]->count() - 1;
        $newlen = $next_sz($oldlen);
        if ($oldlen < $newlen) {
          $newt = $create__0($newlen);
          $add_weak = (dynamic $ob, dynamic $oh, dynamic $oi) : dynamic ==> {
            $setter = (dynamic $nb, dynamic $ni, dynamic $param) : dynamic ==> {
              return $blit($ob, $oi, $nb, $ni, 1);
            };
            $h = $caml_check_bound($oh, $oi)[$oi + 1];
            return $add_aux->contents(
              $newt,
              $setter,
              0,
              $h,
              $get_index($newt, $h)
            );
          };
          $iter_weak($add_weak, $t);
          $t[1] = $newt[1];
          $t[2] = $newt[2];
          $t[3] = $newt[3];
          $t[4] = $newt[4];
          $t[5] = $caml_mod($t[5], $newt[1]->count() - 1);
          return 0;
        }
        $t[3] = $Stdlib[19];
        $t[4] = 0;
        return 0;
      };
      $add_aux->contents = 
      (dynamic $t, dynamic $setter, dynamic $d, dynamic $h, dynamic $index) : dynamic ==> {
        $bucket = $caml_check_bound($t[1], $index)[$index + 1];
        $hashes = $caml_check_bound($t[2], $index)[$index + 1];
        $sz = $length($bucket);
        $loop = (dynamic $i) : dynamic ==> {
          $i__1 = null as dynamic;
          $i__2 = null as dynamic;
          $newbucket = null as dynamic;
          $newhashes = null as dynamic;
          $newsz = null as dynamic;
          $o_ = null as dynamic;
          $p_ = null as dynamic;
          $q_ = null as dynamic;
          $r_ = null as dynamic;
          $i__0 = $i;
          for (;;) {
            if ($sz <= $i__0) {
              $newsz = $call2(
                $Stdlib[16],
                (int)
                ((int) ((int) (3 * $sz) / 2) + 3),
                (int)
                ($Stdlib_sys[14] - 2)
              );
              if ($newsz <= $sz) {
                $call1($Stdlib[2], $cst_Weak_Make_hash_bucket_cannot_grow_more
                );
              }
              $newbucket = $create($newsz);
              $newhashes = $caml_make_vect($newsz, 0);
              $blit($bucket, 0, $newbucket, 0, $sz);
              $call5($Stdlib_array[10], $hashes, 0, $newhashes, 0, $sz);
              $call3($setter, $newbucket, $sz, $d);
              $caml_check_bound($newhashes, $sz)[$sz + 1] = $h;
              $caml_check_bound($t[1], $index)[$index + 1] = $newbucket;
              $caml_check_bound($t[2], $index)[$index + 1] = $newhashes;
              $o_ = $sz <= $t[3] ? 1 : (0);
              $p_ = $o_ ? $t[3] < $newsz ? 1 : (0) : ($o_);
              if ($p_) {
                $t[4] = (int) ($t[4] + 1);
                $i__1 = 0 as dynamic;
                for (;;) {
                  $test_shrink_bucket($t);
                  $r_ = (int) ($i__1 + 1) as dynamic;
                  if (2 !== $i__1) {$i__1 = $r_;continue;}
                  break;
                }
              }
              $q_ = (int) (($t[1]->count() - 1) / 2) < $t[4] ? 1 : (0);
              return $q_ ? $resize($t) : ($q_);
            }
            if ($check($bucket, $i__0)) {
              $i__2 = (int) ($i__0 + 1) as dynamic;
              $i__0 = $i__2;
              continue;
            }
            $call3($setter, $bucket, $i__0, $d);
            $caml_check_bound($hashes, $i__0)[$i__0 + 1] = $h;
            return 0;
          }
        };
        return $loop(0);
      };
      $add = (dynamic $t, dynamic $d) : dynamic ==> {
        $h = $call1($H[2], $d);
        return $add_aux->contents(
          $t,
          $set,
          Vector{0, $d},
          $h,
          $get_index($t, $h)
        );
      };
      $find_or = (dynamic $t, dynamic $d, dynamic $ifnotfound) : dynamic ==> {
        $h = $call1($H[2], $d);
        $index = $get_index($t, $h);
        $bucket = $caml_check_bound($t[1], $index)[$index + 1];
        $hashes = $caml_check_bound($t[2], $index)[$index + 1];
        $sz = $length($bucket);
        $loop = (dynamic $i) : dynamic ==> {
          $i__1 = null as dynamic;
          $i__2 = null as dynamic;
          $i__3 = null as dynamic;
          $match = null as dynamic;
          $match__0 = null as dynamic;
          $v = null as dynamic;
          $v__0 = null as dynamic;
          $i__0 = $i;
          for (;;) {
            if ($sz <= $i__0) {return $call2($ifnotfound, $h, $index);}
            if ($h === $caml_check_bound($hashes, $i__0)[$i__0 + 1]) {
              $match = $get_copy($bucket, $i__0);
              if ($match) {
                $v = $match[1];
                if ($call2($H[1], $v, $d)) {
                  $match__0 = $get($bucket, $i__0);
                  if ($match__0) {$v__0 = $match__0[1];return $v__0;}
                  $i__1 = (int) ($i__0 + 1) as dynamic;
                  $i__0 = $i__1;
                  continue;
                }
              }
              $i__2 = (int) ($i__0 + 1) as dynamic;
              $i__0 = $i__2;
              continue;
            }
            $i__3 = (int) ($i__0 + 1) as dynamic;
            $i__0 = $i__3;
            continue;
          }
        };
        return $loop(0);
      };
      $merge = (dynamic $t, dynamic $d) : dynamic ==> {
        return $find_or(
          $t,
          $d,
          (dynamic $h, dynamic $index) : dynamic ==> {
            $add_aux->contents($t, $set, Vector{0, $d}, $h, $index);
            return $d;
          }
        );
      };
      $find = (dynamic $t, dynamic $d) : dynamic ==> {
        return $find_or(
          $t,
          $d,
          (dynamic $h, dynamic $index) : dynamic ==> {
            throw $caml_wrap_thrown_exception($Stdlib[8]) as \Throwable;
          }
        );
      };
      $find_opt = (dynamic $t, dynamic $d) : dynamic ==> {
        $h = $call1($H[2], $d);
        $index = $get_index($t, $h);
        $bucket = $caml_check_bound($t[1], $index)[$index + 1];
        $hashes = $caml_check_bound($t[2], $index)[$index + 1];
        $sz = $length($bucket);
        $loop = (dynamic $i) : dynamic ==> {
          $i__1 = null as dynamic;
          $i__2 = null as dynamic;
          $i__3 = null as dynamic;
          $match = null as dynamic;
          $v = null as dynamic;
          $v__0 = null as dynamic;
          $i__0 = $i;
          for (;;) {
            if ($sz <= $i__0) {return 0;}
            if ($h === $caml_check_bound($hashes, $i__0)[$i__0 + 1]) {
              $match = $get_copy($bucket, $i__0);
              if ($match) {
                $v = $match[1];
                if ($call2($H[1], $v, $d)) {
                  $v__0 = $get($bucket, $i__0);
                  if ($v__0) {return $v__0;}
                  $i__1 = (int) ($i__0 + 1) as dynamic;
                  $i__0 = $i__1;
                  continue;
                }
              }
              $i__2 = (int) ($i__0 + 1) as dynamic;
              $i__0 = $i__2;
              continue;
            }
            $i__3 = (int) ($i__0 + 1) as dynamic;
            $i__0 = $i__3;
            continue;
          }
        };
        return $loop(0);
      };
      $find_shadow = 
      (dynamic $t, dynamic $d, dynamic $iffound, dynamic $ifnotfound) : dynamic ==> {
        $h = $call1($H[2], $d);
        $index = $get_index($t, $h);
        $bucket = $caml_check_bound($t[1], $index)[$index + 1];
        $hashes = $caml_check_bound($t[2], $index)[$index + 1];
        $sz = $length($bucket);
        $loop = (dynamic $i) : dynamic ==> {
          $i__1 = null as dynamic;
          $i__2 = null as dynamic;
          $match = null as dynamic;
          $v = null as dynamic;
          $i__0 = $i;
          for (;;) {
            if ($sz <= $i__0) {return $ifnotfound;}
            if ($h === $caml_check_bound($hashes, $i__0)[$i__0 + 1]) {
              $match = $get_copy($bucket, $i__0);
              if ($match) {
                $v = $match[1];
                if ($call2($H[1], $v, $d)) {
                  return $call2($iffound, $bucket, $i__0);
                }
              }
              $i__1 = (int) ($i__0 + 1) as dynamic;
              $i__0 = $i__1;
              continue;
            }
            $i__2 = (int) ($i__0 + 1) as dynamic;
            $i__0 = $i__2;
            continue;
          }
        };
        return $loop(0);
      };
      $remove = (dynamic $t, dynamic $d) : dynamic ==> {
        $n_ = 0 as dynamic;
        return $find_shadow(
          $t,
          $d,
          (dynamic $w, dynamic $i) : dynamic ==> {return $set($w, $i, 0);},
          $n_
        );
      };
      $mem = (dynamic $t, dynamic $d) : dynamic ==> {
        $m_ = 0 as dynamic;
        return $find_shadow(
          $t,
          $d,
          (dynamic $w, dynamic $i) : dynamic ==> {return 1;},
          $m_
        );
      };
      $find_all = (dynamic $t, dynamic $d) : dynamic ==> {
        $h = $call1($H[2], $d);
        $index = $get_index($t, $h);
        $bucket = $caml_check_bound($t[1], $index)[$index + 1];
        $hashes = $caml_check_bound($t[2], $index)[$index + 1];
        $sz = $length($bucket);
        $loop = (dynamic $i, dynamic $accu) : dynamic ==> {
          $accu__1 = null as dynamic;
          $i__1 = null as dynamic;
          $i__2 = null as dynamic;
          $i__3 = null as dynamic;
          $i__4 = null as dynamic;
          $match = null as dynamic;
          $match__0 = null as dynamic;
          $v = null as dynamic;
          $v__0 = null as dynamic;
          $i__0 = $i;
          $accu__0 = $accu;
          for (;;) {
            if ($sz <= $i__0) {return $accu__0;}
            if ($h === $caml_check_bound($hashes, $i__0)[$i__0 + 1]) {
              $match = $get_copy($bucket, $i__0);
              if ($match) {
                $v = $match[1];
                if ($call2($H[1], $v, $d)) {
                  $match__0 = $get($bucket, $i__0);
                  if ($match__0) {
                    $v__0 = $match__0[1];
                    $accu__1 = Vector{0, $v__0, $accu__0} as dynamic;
                    $i__1 = (int) ($i__0 + 1) as dynamic;
                    $i__0 = $i__1;
                    $accu__0 = $accu__1;
                    continue;
                  }
                  $i__2 = (int) ($i__0 + 1) as dynamic;
                  $i__0 = $i__2;
                  continue;
                }
              }
              $i__3 = (int) ($i__0 + 1) as dynamic;
              $i__0 = $i__3;
              continue;
            }
            $i__4 = (int) ($i__0 + 1) as dynamic;
            $i__0 = $i__4;
            continue;
          }
        };
        return $loop(0, 0);
      };
      $stats = (dynamic $t) : dynamic ==> {
        $len = $t[1]->count() - 1;
        $lens = $call2($Stdlib_array[15], $length, $t[1]);
        $a_ = (dynamic $l_, dynamic $k_) : dynamic ==> {
          return $runtime["caml_int_compare"]($l_, $k_);
        };
        $call2($Stdlib_array[25], $a_, $lens);
        $b_ = 0 as dynamic;
        $c_ = (dynamic $j_, dynamic $i_) : dynamic ==> {
          return (int) ($j_ + $i_);
        };
        $totlen = $call3($Stdlib_array[17], $c_, $b_, $lens);
        $d_ = (int) ($len + -1) as dynamic;
        $f_ = (int) ($len / 2) as dynamic;
        $e_ = $caml_check_bound($lens, $d_)[$d_ + 1];
        $g_ = $caml_check_bound($lens, $f_)[$f_ + 1];
        $h_ = $caml_check_bound($lens, 0)[1];
        return Vector{0, $len, $count($t), $totlen, $h_, $g_, $e_};
      };
      return Vector{
        0,
        $create__0,
        $clear,
        $merge,
        $add,
        $remove,
        $find,
        $find_opt,
        $find_all,
        $mem,
        $iter,
        $fold,
        $count,
        $stats
      };
    };
    $Stdlib_weak = Vector{
      0,
      $create,
      $length,
      $set,
      $get,
      $get_copy,
      $check,
      $fill,
      $blit,
      $Make
    } as dynamic;
    
    return($Stdlib_weak);

  }
  public static function create(dynamic $l): dynamic {
    return static::syncCall(__FUNCTION__, 1, $l);
  }
  public static function length(dynamic $x): dynamic {
    return static::syncCall(__FUNCTION__, 2, $x);
  }
  public static function set(dynamic $e, dynamic $o, dynamic $x): dynamic {
    return static::syncCall(__FUNCTION__, 3, $e, $o, $x);
  }
  public static function _get(dynamic $e, dynamic $o): dynamic {
    return static::syncCall(__FUNCTION__, 4, $e, $o);
  }
  public static function get_copy(dynamic $e, dynamic $o): dynamic {
    return static::syncCall(__FUNCTION__, 5, $e, $o);
  }
  public static function check(dynamic $e, dynamic $o): dynamic {
    return static::syncCall(__FUNCTION__, 6, $e, $o);
  }
  public static function fill(dynamic $ar, dynamic $ofs, dynamic $len, dynamic $x): dynamic {
    return static::syncCall(__FUNCTION__, 7, $ar, $ofs, $len, $x);
  }
  public static function blit(dynamic $e1, dynamic $o1, dynamic $e2, dynamic $o2, dynamic $l): dynamic {
    return static::syncCall(__FUNCTION__, 8, $e1, $o1, $e2, $o2, $l);
  }
  public static function Make(dynamic $H): dynamic {
    return static::syncCall(__FUNCTION__, 9, $H);
  }

}
/* Hashing disabled */
