<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class Weak {
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
    $caml_weak_blit = $runtime["caml_weak_blit"];
    $caml_weak_check = $runtime["caml_weak_check"];
    $caml_weak_create = $runtime["caml_weak_create"];
    $caml_weak_get = $runtime["caml_weak_get"];
    $caml_weak_get_copy = $runtime["caml_weak_get_copy"];
    $caml_weak_set = $runtime["caml_weak_set"];
    $caml_wrap_thrown_exception = $runtime["caml_wrap_thrown_exception"];
    $cst_Weak_Make_hash_bucket_cannot_grow_more = $string(
      "Weak.Make: hash bucket cannot grow more"
    );
    $cst_Weak_fill = $string("Weak.fill");
    $Pervasives = Pervasives::get();
    $Sys = Sys::get();
    $Array = Array_::get();
    $Not_found = Not_found::get();
    $Invalid_argument = Invalid_argument::get();
    $length = (dynamic $x) ==> {return (int) ($x->count() - 1 - 2);};
    $fill = (dynamic $ar, dynamic $ofs, dynamic $len, dynamic $x) ==> {
      $aD_ = null;
      $i = null;
      $aC_ = null;
      if (0 <= $ofs) {
        if (0 <= $len) {
          if (! ($length($ar) < (int) ($ofs + $len))) {
            $aC_ = (int) ((int) ($ofs + $len) + -1);
            if (! ($aC_ < $ofs)) {
              $i = $ofs;
              for (;;) {
                $caml_weak_set($ar, $i, $x);
                $aD_ = (int) ($i + 1);
                if ($aC_ !== $i) {$i = $aD_;continue;}
                break;
              }
            }
            return 0;
          }
        }
      }
      throw $caml_wrap_thrown_exception(
              Vector{0, $Invalid_argument, $cst_Weak_fill}
            ) as \Throwable;
    };
    $Make = (dynamic $H) ==> {
      $add_aux = new Ref();
      $weak_create = (dynamic $aB_) ==> {return $caml_weak_create($aB_);};
      $emptybucket = $weak_create(0);
      $get_index = (dynamic $t, dynamic $h) ==> {
        return $caml_mod($h & $Pervasives[7], $t[1]->count() - 1);
      };
      $limit = 7 as dynamic;
      $create = (dynamic $sz) ==> {
        $sz__0 = 7 <= $sz ? $sz : (7);
        $sz__1 = $Sys[14] < $sz__0 ? $Sys[14] : ($sz__0);
        return Vector{
          0,
          $caml_make_vect($sz__1, $emptybucket),
          $caml_make_vect($sz__1, Vector{0}),
          $limit,
          0,
          0
        };
      };
      $clear = (dynamic $t) ==> {
        $i = null;
        $aA_ = null;
        $az_ = (int) ($t[1]->count() - 1 + -1) as dynamic;
        $ay_ = 0 as dynamic;
        if (! ($az_ < 0)) {
          $i = $ay_;
          for (;;) {
            $caml_check_bound($t[1], $i)[$i + 1] = $emptybucket;
            $caml_check_bound($t[2], $i)[$i + 1] = Vector{0};
            $aA_ = (int) ($i + 1);
            if ($az_ !== $i) {$i = $aA_;continue;}
            break;
          }
        }
        $t[3] = $limit;
        $t[4] = 0;
        return 0;
      };
      $fold = (dynamic $f, dynamic $t, dynamic $init) ==> {
        $fold_bucket = (dynamic $i, dynamic $b, dynamic $accu) ==> {
          $match = null;
          $v = null;
          $accu__1 = null;
          $i__1 = null;
          $i__2 = null;
          $i__0 = $i;
          $accu__0 = $accu;
          for (;;) {
            if ($length($b) <= $i__0) {return $accu__0;}
            $match = $caml_weak_get($b, $i__0);
            if ($match) {
              $v = $match[1];
              $accu__1 = $call2($f, $v, $accu__0);
              $i__1 = (int) ($i__0 + 1);
              $i__0 = $i__1;
              $accu__0 = $accu__1;
              continue;
            }
            $i__2 = (int) ($i__0 + 1);
            $i__0 = $i__2;
            continue;
          }
        };
        $at_ = $t[1];
        $au_ = 0 as dynamic;
        $av_ = (dynamic $aw_, dynamic $ax_) ==> {
          return $fold_bucket($au_, $aw_, $ax_);
        };
        return $call3($Array[18], $av_, $at_, $init);
      };
      $iter = (dynamic $f, dynamic $t) ==> {
        $iter_bucket = (dynamic $i, dynamic $b) ==> {
          $match = null;
          $v = null;
          $i__1 = null;
          $i__2 = null;
          $i__0 = $i;
          for (;;) {
            if ($length($b) <= $i__0) {return 0;}
            $match = $caml_weak_get($b, $i__0);
            if ($match) {
              $v = $match[1];
              $call1($f, $v);
              $i__1 = (int) ($i__0 + 1);
              $i__0 = $i__1;
              continue;
            }
            $i__2 = (int) ($i__0 + 1);
            $i__0 = $i__2;
            continue;
          }
        };
        $ap_ = $t[1];
        $aq_ = 0 as dynamic;
        $ar_ = (dynamic $as_) ==> {return $iter_bucket($aq_, $as_);};
        return $call2($Array[13], $ar_, $ap_);
      };
      $iter_weak = (dynamic $f, dynamic $t) ==> {
        $iter_bucket = (dynamic $i, dynamic $j, dynamic $b) ==> {
          $match = null;
          $i__1 = null;
          $i__2 = null;
          $i__0 = $i;
          for (;;) {
            if ($length($b) <= $i__0) {return 0;}
            $match = $caml_weak_check($b, $i__0);
            if (0 === $match) {
              $i__1 = (int) ($i__0 + 1);
              $i__0 = $i__1;
              continue;
            }
            $call3($f, $b, $caml_check_bound($t[2], $j)[$j + 1], $i__0);
            $i__2 = (int) ($i__0 + 1);
            $i__0 = $i__2;
            continue;
          }
        };
        $ak_ = $t[1];
        $al_ = 0 as dynamic;
        $am_ = (dynamic $an_, dynamic $ao_) ==> {
          return $iter_bucket($al_, $an_, $ao_);
        };
        return $call2($Array[14], $am_, $ak_);
      };
      $count_bucket = (dynamic $i, dynamic $b, dynamic $accu) ==> {
        $aj_ = null;
        $accu__1 = null;
        $i__1 = null;
        $i__0 = $i;
        $accu__0 = $accu;
        for (;;) {
          if ($length($b) <= $i__0) {return $accu__0;}
          $aj_ = $caml_weak_check($b, $i__0) ? 1 : (0);
          $accu__1 = (int) ($accu__0 + $aj_);
          $i__1 = (int) ($i__0 + 1);
          $i__0 = $i__1;
          $accu__0 = $accu__1;
          continue;
        }
      };
      $count = (dynamic $t) ==> {
        $ad_ = 0 as dynamic;
        $ae_ = $t[1];
        $af_ = 0 as dynamic;
        $ag_ = (dynamic $ah_, dynamic $ai_) ==> {
          return $count_bucket($af_, $ah_, $ai_);
        };
        return $call3($Array[18], $ag_, $ae_, $ad_);
      };
      $next_sz = (dynamic $n) ==> {
        return $call2(
          $Pervasives[4],
          (int)
          ((int) ((int) (3 * $n) / 2) + 3),
          $Sys[14]
        );
      };
      $prev_sz = (dynamic $n) ==> {
        return (int) ((int) ((int) ((int) ($n + -3) * 2) + 2) / 3);
      };
      $test_shrink_bucket = (dynamic $t) ==> {
        $loop = null;
        $X_ = null;
        $Y_ = null;
        $Z_ = null;
        $aa_ = null;
        $V_ = $t[5];
        $bucket = $caml_check_bound($t[1], $V_)[$V_ + 1];
        $W_ = $t[5];
        $hbucket = $caml_check_bound($t[2], $W_)[$W_ + 1];
        $len = $length($bucket);
        $prev_len = $prev_sz($len);
        $live = $count_bucket(0, $bucket, 0);
        if ($live <= $prev_len) {
          $loop =
            (dynamic $i, dynamic $j) ==> {
              $ab_ = null;
              $i__1 = null;
              $ac_ = null;
              $j__1 = null;
              $i__2 = null;
              $j__2 = null;
              $i__0 = $i;
              $j__0 = $j;
              for (;;) {
                $ab_ = $prev_len <= $j__0 ? 1 : (0);
                if ($ab_) {
                  if ($caml_weak_check($bucket, $i__0)) {
                    $i__1 = (int) ($i__0 + 1);
                    $i__0 = $i__1;
                    continue;
                  }
                  if ($caml_weak_check($bucket, $j__0)) {
                    $caml_weak_blit($bucket, $j__0, $bucket, $i__0, 1);
                    $ac_ = $caml_check_bound($hbucket, $j__0)[$j__0 + 1];
                    $caml_check_bound($hbucket, $i__0)[$i__0 + 1] = $ac_;
                    $j__1 = (int) ($j__0 + -1);
                    $i__2 = (int) ($i__0 + 1);
                    $i__0 = $i__2;
                    $j__0 = $j__1;
                    continue;
                  }
                  $j__2 = (int) ($j__0 + -1);
                  $j__0 = $j__2;
                  continue;
                }
                return $ab_;
              }
            };
          $loop(0, (int) ($length($bucket) + -1));
          if (0 === $prev_len) {
            $X_ = $t[5];
            $caml_check_bound($t[1], $X_)[$X_ + 1] = $emptybucket;
            $Y_ = $t[5];
            $caml_check_bound($t[2], $Y_)[$Y_ + 1] = Vector{0};
          }
          else {
            $caml_obj_truncate($bucket, (int) ($prev_len + 2));
            $caml_obj_truncate($hbucket, $prev_len);
          }
          $Z_ = $t[3] < $len ? 1 : (0);
          $aa_ = $Z_ ? $prev_len <= $t[3] ? 1 : (0) : ($Z_);
          if ($aa_) {$t[4] = (int) ($t[4] + -1);}
        }
        $t[5] = $caml_mod((int) ($t[5] + 1), $t[1]->count() - 1);
        return 0;
      };
      $resize = (dynamic $t) ==> {
        $newt = null;
        $add_weak = null;
        $oldlen = $t[1]->count() - 1;
        $newlen = $next_sz($oldlen);
        if ($oldlen < $newlen) {
          $newt = $create($newlen);
          $add_weak =
            (dynamic $ob, dynamic $oh, dynamic $oi) ==> {
              $setter = (dynamic $nb, dynamic $ni, dynamic $param) ==> {
                return $caml_weak_blit($ob, $oi, $nb, $ni, 1);
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
        $t[3] = $Pervasives[7];
        $t[4] = 0;
        return 0;
      };
      $add_aux->contents = 
      (dynamic $t, dynamic $setter, dynamic $d, dynamic $h, dynamic $index) ==> {
        $bucket = $caml_check_bound($t[1], $index)[$index + 1];
        $hashes = $caml_check_bound($t[2], $index)[$index + 1];
        $sz = $length($bucket);
        $loop = (dynamic $i) ==> {
          $newsz = null;
          $newbucket = null;
          $newhashes = null;
          $R_ = null;
          $S_ = null;
          $T_ = null;
          $i__1 = null;
          $U_ = null;
          $i__2 = null;
          $i__0 = $i;
          for (;;) {
            if ($sz <= $i__0) {
              $newsz =
                $call2(
                  $Pervasives[4],
                  (int)
                  ((int) ((int) (3 * $sz) / 2) + 3),
                  (int)
                  ($Sys[14] - 2)
                );
              if ($newsz <= $sz) {
                $call1(
                  $Pervasives[2],
                  $cst_Weak_Make_hash_bucket_cannot_grow_more
                );
              }
              $newbucket = $weak_create($newsz);
              $newhashes = $caml_make_vect($newsz, 0);
              $caml_weak_blit($bucket, 0, $newbucket, 0, $sz);
              $call5($Array[10], $hashes, 0, $newhashes, 0, $sz);
              $call3($setter, $newbucket, $sz, $d);
              $caml_check_bound($newhashes, $sz)[$sz + 1] = $h;
              $caml_check_bound($t[1], $index)[$index + 1] = $newbucket;
              $caml_check_bound($t[2], $index)[$index + 1] = $newhashes;
              $R_ = $sz <= $t[3] ? 1 : (0);
              $S_ = $R_ ? $t[3] < $newsz ? 1 : (0) : ($R_);
              if ($S_) {
                $t[4] = (int) ($t[4] + 1);
                $i__1 = 0;
                for (;;) {
                  $test_shrink_bucket($t);
                  $U_ = (int) ($i__1 + 1);
                  if (2 !== $i__1) {$i__1 = $U_;continue;}
                  break;
                }
              }
              $T_ = (int) (($t[1]->count() - 1) / 2) < $t[4] ? 1 : (0);
              return $T_ ? $resize($t) : ($T_);
            }
            if ($caml_weak_check($bucket, $i__0)) {
              $i__2 = (int) ($i__0 + 1);
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
      $add = (dynamic $t, dynamic $d) ==> {
        $h = $call1($H[2], $d);
        $M_ = $get_index($t, $h);
        $N_ = Vector{0, $d} as dynamic;
        return $add_aux->contents(
          $t,
          (dynamic $Q_, dynamic $P_, dynamic $O_) ==> {
            return $caml_weak_set($Q_, $P_, $O_);
          },
          $N_,
          $h,
          $M_
        );
      };
      $find_or = (dynamic $t, dynamic $d, dynamic $ifnotfound) ==> {
        $h = $call1($H[2], $d);
        $index = $get_index($t, $h);
        $bucket = $caml_check_bound($t[1], $index)[$index + 1];
        $hashes = $caml_check_bound($t[2], $index)[$index + 1];
        $sz = $length($bucket);
        $loop = (dynamic $i) ==> {
          $match = null;
          $v = null;
          $match__0 = null;
          $v__0 = null;
          $i__1 = null;
          $i__2 = null;
          $i__3 = null;
          $i__0 = $i;
          for (;;) {
            if ($sz <= $i__0) {return $call2($ifnotfound, $h, $index);}
            if ($h === $caml_check_bound($hashes, $i__0)[$i__0 + 1]) {
              $match = $caml_weak_get_copy($bucket, $i__0);
              if ($match) {
                $v = $match[1];
                if ($call2($H[1], $v, $d)) {
                  $match__0 = $caml_weak_get($bucket, $i__0);
                  if ($match__0) {$v__0 = $match__0[1];return $v__0;}
                  $i__1 = (int) ($i__0 + 1);
                  $i__0 = $i__1;
                  continue;
                }
              }
              $i__2 = (int) ($i__0 + 1);
              $i__0 = $i__2;
              continue;
            }
            $i__3 = (int) ($i__0 + 1);
            $i__0 = $i__3;
            continue;
          }
        };
        return $loop(0);
      };
      $merge = (dynamic $t, dynamic $d) ==> {
        return $find_or(
          $t,
          $d,
          (dynamic $h, dynamic $index) ==> {
            $I_ = Vector{0, $d} as dynamic;
            $add_aux->contents(
              $t,
              (dynamic $L_, dynamic $K_, dynamic $J_) ==> {
                return $caml_weak_set($L_, $K_, $J_);
              },
              $I_,
              $h,
              $index
            );
            return $d;
          }
        );
      };
      $find = (dynamic $t, dynamic $d) ==> {
        return $find_or(
          $t,
          $d,
          (dynamic $h, dynamic $index) ==> {
            throw $caml_wrap_thrown_exception($Not_found) as \Throwable;
          }
        );
      };
      $find_opt = (dynamic $t, dynamic $d) ==> {
        $h = $call1($H[2], $d);
        $index = $get_index($t, $h);
        $bucket = $caml_check_bound($t[1], $index)[$index + 1];
        $hashes = $caml_check_bound($t[2], $index)[$index + 1];
        $sz = $length($bucket);
        $loop = (dynamic $i) ==> {
          $match = null;
          $v = null;
          $v__0 = null;
          $i__1 = null;
          $i__2 = null;
          $i__3 = null;
          $i__0 = $i;
          for (;;) {
            if ($sz <= $i__0) {return 0;}
            if ($h === $caml_check_bound($hashes, $i__0)[$i__0 + 1]) {
              $match = $caml_weak_get_copy($bucket, $i__0);
              if ($match) {
                $v = $match[1];
                if ($call2($H[1], $v, $d)) {
                  $v__0 = $caml_weak_get($bucket, $i__0);
                  if ($v__0) {return $v__0;}
                  $i__1 = (int) ($i__0 + 1);
                  $i__0 = $i__1;
                  continue;
                }
              }
              $i__2 = (int) ($i__0 + 1);
              $i__0 = $i__2;
              continue;
            }
            $i__3 = (int) ($i__0 + 1);
            $i__0 = $i__3;
            continue;
          }
        };
        return $loop(0);
      };
      $find_shadow = 
      (dynamic $t, dynamic $d, dynamic $iffound, dynamic $ifnotfound) ==> {
        $h = $call1($H[2], $d);
        $index = $get_index($t, $h);
        $bucket = $caml_check_bound($t[1], $index)[$index + 1];
        $hashes = $caml_check_bound($t[2], $index)[$index + 1];
        $sz = $length($bucket);
        $loop = (dynamic $i) ==> {
          $match = null;
          $v = null;
          $i__1 = null;
          $i__2 = null;
          $i__0 = $i;
          for (;;) {
            if ($sz <= $i__0) {return $ifnotfound;}
            if ($h === $caml_check_bound($hashes, $i__0)[$i__0 + 1]) {
              $match = $caml_weak_get_copy($bucket, $i__0);
              if ($match) {
                $v = $match[1];
                if ($call2($H[1], $v, $d)) {
                  return $call2($iffound, $bucket, $i__0);
                }
              }
              $i__1 = (int) ($i__0 + 1);
              $i__0 = $i__1;
              continue;
            }
            $i__2 = (int) ($i__0 + 1);
            $i__0 = $i__2;
            continue;
          }
        };
        return $loop(0);
      };
      $remove = (dynamic $t, dynamic $d) ==> {
        $H_ = 0 as dynamic;
        return $find_shadow(
          $t,
          $d,
          (dynamic $w, dynamic $i) ==> {return $caml_weak_set($w, $i, 0);},
          $H_
        );
      };
      $mem = (dynamic $t, dynamic $d) ==> {
        $G_ = 0 as dynamic;
        return $find_shadow(
          $t,
          $d,
          (dynamic $w, dynamic $i) ==> {return 1;},
          $G_
        );
      };
      $find_all = (dynamic $t, dynamic $d) ==> {
        $h = $call1($H[2], $d);
        $index = $get_index($t, $h);
        $bucket = $caml_check_bound($t[1], $index)[$index + 1];
        $hashes = $caml_check_bound($t[2], $index)[$index + 1];
        $sz = $length($bucket);
        $loop = (dynamic $i, dynamic $accu) ==> {
          $match = null;
          $v = null;
          $match__0 = null;
          $v__0 = null;
          $accu__1 = null;
          $i__1 = null;
          $i__2 = null;
          $i__3 = null;
          $i__4 = null;
          $i__0 = $i;
          $accu__0 = $accu;
          for (;;) {
            if ($sz <= $i__0) {return $accu__0;}
            if ($h === $caml_check_bound($hashes, $i__0)[$i__0 + 1]) {
              $match = $caml_weak_get_copy($bucket, $i__0);
              if ($match) {
                $v = $match[1];
                if ($call2($H[1], $v, $d)) {
                  $match__0 = $caml_weak_get($bucket, $i__0);
                  if ($match__0) {
                    $v__0 = $match__0[1];
                    $accu__1 = Vector{0, $v__0, $accu__0};
                    $i__1 = (int) ($i__0 + 1);
                    $i__0 = $i__1;
                    $accu__0 = $accu__1;
                    continue;
                  }
                  $i__2 = (int) ($i__0 + 1);
                  $i__0 = $i__2;
                  continue;
                }
              }
              $i__3 = (int) ($i__0 + 1);
              $i__0 = $i__3;
              continue;
            }
            $i__4 = (int) ($i__0 + 1);
            $i__0 = $i__4;
            continue;
          }
        };
        return $loop(0, 0);
      };
      $stats = (dynamic $t) ==> {
        $len = $t[1]->count() - 1;
        $lens = $call2($Array[15], $length, $t[1]);
        $u_ = (dynamic $F_, dynamic $E_) ==> {
          return $runtime["caml_int_compare"]($F_, $E_);
        };
        $call2($Array[25], $u_, $lens);
        $v_ = 0 as dynamic;
        $w_ = (dynamic $D_, dynamic $C_) ==> {return (int) ($D_ + $C_);};
        $totlen = $call3($Array[17], $w_, $v_, $lens);
        $x_ = (int) ($len + -1) as dynamic;
        $z_ = (int) ($len / 2) as dynamic;
        $y_ = $caml_check_bound($lens, $x_)[$x_ + 1];
        $A_ = $caml_check_bound($lens, $z_)[$z_ + 1];
        $B_ = $caml_check_bound($lens, 0)[1];
        return Vector{0, $len, $count($t), $totlen, $B_, $A_, $y_};
      };
      return Vector{
        0,
        $create,
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
    $a_ = (dynamic $t_, dynamic $s_, dynamic $r_, dynamic $q_, dynamic $p_) ==> {return $caml_weak_blit($t_, $s_, $r_, $q_, $p_);
    };
    $b_ = (dynamic $o_, dynamic $n_) ==> {return $caml_weak_check($o_, $n_);};
    $c_ = (dynamic $m_, dynamic $l_) ==> {
      return $caml_weak_get_copy($m_, $l_);
    };
    $d_ = (dynamic $k_, dynamic $j_) ==> {return $caml_weak_get($k_, $j_);};
    $e_ = (dynamic $i_, dynamic $h_, dynamic $g_) ==> {
      return $caml_weak_set($i_, $h_, $g_);
    };
    $Weak = Vector{
      0,
      (dynamic $f_) ==> {return $caml_weak_create($f_);},
      $length,
      $e_,
      $d_,
      $c_,
      $b_,
      $fill,
      $a_,
      $Make
    } as dynamic;
    
    return($Weak);

  }
  public static function length(dynamic $x): dynamic {
    return static::syncCall(__FUNCTION__, 2, $x);
  }
  public static function fill(dynamic $ar, dynamic $ofs, dynamic $len, dynamic $x): dynamic {
    return static::syncCall(__FUNCTION__, 7, $ar, $ofs, $len, $x);
  }
  public static function Make(dynamic $H): dynamic {
    return static::syncCall(__FUNCTION__, 9, $H);
  }

}
/* Hashing disabled */
