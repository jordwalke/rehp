<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class Weak {
  <<__Override, __Memoize>>
  public static function requireModule() : Vector<dynamic> {
    $joo_global_object = \Rehack\GlobalObject::get() as dynamic;
    
    $runtime = $joo_global_object->jsoo_runtime;
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
    $Pervasives =  Pervasives::requireModule ();
    $Sys =  Sys::requireModule ();
    $Array =  Array_::requireModule ();
    $Not_found =  Not_found::requireModule ();
    $Invalid_argument =  Invalid_argument::requireModule ();
    $length = (dynamic $x) ==> {return (int) ($x->count() - 1 - 2);};
    $fill = (dynamic $ar, dynamic $ofs, dynamic $len, dynamic $x) ==> {
      $at_ = null;
      $i = null;
      $as_ = null;
      if (0 <= $ofs) {
        if (0 <= $len) {
          if (! ($length($ar) < (int) ($ofs + $len))) {
            $as_ = (int) ((int) ($ofs + $len) + -1);
            if (! ($as_ < $ofs)) {
              $i = $ofs;
              for (;;) {
                $caml_weak_set($ar, $i, $x);
                $at_ = (int) ($i + 1);
                if ($as_ !== $i) {$i = $at_;continue;}
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
      $emptybucket = $caml_weak_create(0);
      $get_index = (dynamic $t, dynamic $h) ==> {
        return $caml_mod($h & $Pervasives[7], $t[1]->count() - 1);
      };
      $limit = 7;
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
        $ar_ = null;
        $aq_ = (int) ($t[1]->count() - 1 + -1);
        $ap_ = 0;
        if (! ($aq_ < 0)) {
          $i = $ap_;
          for (;;) {
            $caml_check_bound($t[1], $i)[$i + 1] = $emptybucket;
            $caml_check_bound($t[2], $i)[$i + 1] = Vector{0};
            $ar_ = (int) ($i + 1);
            if ($aq_ !== $i) {$i = $ar_;continue;}
            break;
          }
        }
        $t[3] = $limit;
        $t[4] = 0;
        return 0;
      };
      $fold = (dynamic $f, dynamic $t, dynamic $init) ==> {
        $an_ = $t[1];
        $i = 0;
        $ao_ = (dynamic $b, dynamic $accu__1) ==> {
          $match = null;
          $v = null;
          $accu__0 = null;
          $i__1 = null;
          $i__2 = null;
          $i__0 = $i;
          $accu = $accu__1;
          for (;;) {
            if ($length($b) <= $i__0) {return $accu;}
            $match = $caml_weak_get($b, $i__0);
            if ($match) {
              $v = $match[1];
              $accu__0 = $call2($f, $v, $accu);
              $i__1 = (int) ($i__0 + 1);
              $i__0 = $i__1;
              $accu = $accu__0;
              continue;
            }
            $i__2 = (int) ($i__0 + 1);
            $i__0 = $i__2;
            continue;
          }
        };
        return $call3($Array[18], $ao_, $an_, $init);
      };
      $iter = (dynamic $f, dynamic $t) ==> {
        $al_ = $t[1];
        $i = 0;
        $am_ = (dynamic $b) ==> {
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
        return $call2($Array[13], $am_, $al_);
      };
      $count_bucket = (dynamic $i, dynamic $b, dynamic $accu) ==> {
        $ak_ = null;
        $accu__1 = null;
        $i__1 = null;
        $i__0 = $i;
        $accu__0 = $accu;
        for (;;) {
          if ($length($b) <= $i__0) {return $accu__0;}
          $ak_ = $caml_weak_check($b, $i__0) ? 1 : (0);
          $accu__1 = (int) ($accu__0 + $ak_);
          $i__1 = (int) ($i__0 + 1);
          $i__0 = $i__1;
          $accu__0 = $accu__1;
          continue;
        }
      };
      $count = (dynamic $t) ==> {
        $ae_ = 0;
        $af_ = $t[1];
        $ag_ = 0;
        $ah_ = (dynamic $ai_, dynamic $aj_) ==> {
          return $count_bucket($ag_, $ai_, $aj_);
        };
        return $call3($Array[18], $ah_, $af_, $ae_);
      };
      $add_aux->contents = 
      (dynamic $t, dynamic $setter, dynamic $d, dynamic $h, dynamic $index) ==> {
        $R_ = null;
        $i = null;
        $S_ = null;
        $newlen = null;
        $prev_len = null;
        $T_ = null;
        $bucket = null;
        $U_ = null;
        $hbucket = null;
        $n = null;
        $live = null;
        $j = null;
        $i__0 = null;
        $i__1 = null;
        $V_ = null;
        $j__0 = null;
        $i__2 = null;
        $j__1 = null;
        $j__2 = null;
        $W_ = null;
        $X_ = null;
        $Y_ = null;
        $Z_ = null;
        $n__0 = null;
        $newt = null;
        $newsz = null;
        $newbucket = null;
        $newhashes = null;
        $aa_ = null;
        $ab_ = null;
        $ac_ = null;
        $i__4 = null;
        $ad_ = null;
        $i__5 = null;
        $bucket__0 = $caml_check_bound($t[1], $index)[$index + 1];
        $hashes = $caml_check_bound($t[2], $index)[$index + 1];
        $sz = $length($bucket__0);
        $i__3 = 0;
        for (;;) {
          if ($sz <= $i__3) {
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
            $newbucket = $caml_weak_create($newsz);
            $newhashes = $caml_make_vect($newsz, 0);
            $caml_weak_blit($bucket__0, 0, $newbucket, 0, $sz);
            $call5($Array[10], $hashes, 0, $newhashes, 0, $sz);
            $call3($setter, $newbucket, $sz, $d);
            $caml_check_bound($newhashes, $sz)[$sz + 1] = $h;
            $caml_check_bound($t[1], $index)[$index + 1] = $newbucket;
            $caml_check_bound($t[2], $index)[$index + 1] = $newhashes;
            $aa_ = $sz <= $t[3] ? 1 : (0);
            $ab_ = $aa_ ? $t[3] < $newsz ? 1 : (0) : ($aa_);
            if ($ab_) {
              $t[4] = (int) ($t[4] + 1);
              $i__4 = 0;
              for (;;) {
                $T_ = $t[5];
                $bucket = $caml_check_bound($t[1], $T_)[$T_ + 1];
                $U_ = $t[5];
                $hbucket = $caml_check_bound($t[2], $U_)[$U_ + 1];
                $n = $length($bucket);
                $prev_len =
                  (int)
                  ((int) ((int) ((int) ($n + -3) * 2) + 2) / 3);
                $live = $count_bucket(0, $bucket, 0);
                if ($live <= $prev_len) {
                  $j__2 = (int) ($length($bucket) + -1);
                  $i__0 = 0;
                  $j = $j__2;
                  for (;;) {
                    if ($prev_len <= $j) {
                      if ($caml_weak_check($bucket, $i__0)) {
                        $i__1 = (int) ($i__0 + 1);
                        $i__0 = $i__1;
                        continue;
                      }
                      if ($caml_weak_check($bucket, $j)) {
                        $caml_weak_blit($bucket, $j, $bucket, $i__0, 1);
                        $V_ = $caml_check_bound($hbucket, $j)[$j + 1];
                        $caml_check_bound($hbucket, $i__0)[$i__0 + 1] = $V_;
                        $j__0 = (int) ($j + -1);
                        $i__2 = (int) ($i__0 + 1);
                        $i__0 = $i__2;
                        $j = $j__0;
                        continue;
                      }
                      $j__1 = (int) ($j + -1);
                      $j = $j__1;
                      continue;
                    }
                    if (0 === $prev_len) {
                      $W_ = $t[5];
                      $caml_check_bound($t[1], $W_)[$W_ + 1] = $emptybucket;
                      $X_ = $t[5];
                      $caml_check_bound($t[2], $X_)[$X_ + 1] = Vector{0};
                    }
                    else {
                      $caml_obj_truncate($bucket, (int) ($prev_len + 2));
                      $caml_obj_truncate($hbucket, $prev_len);
                    }
                    $Y_ = $t[3] < $n ? 1 : (0);
                    $Z_ = $Y_ ? $prev_len <= $t[3] ? 1 : (0) : ($Y_);
                    if ($Z_) {$t[4] = (int) ($t[4] + -1);}
                    break;
                  }
                }
                $t[5] = $caml_mod((int) ($t[5] + 1), $t[1]->count() - 1);
                $ad_ = (int) ($i__4 + 1);
                if (2 !== $i__4) {$i__4 = $ad_;continue;}
                break;
              }
            }
            $ac_ = (int) (($t[1]->count() - 1) / 2) < $t[4] ? 1 : (0);
            if ($ac_) {
              $n__0 = $t[1]->count() - 1;
              $newlen =
                $call2(
                  $Pervasives[4],
                  (int)
                  ((int) ((int) (3 * $n__0) / 2) + 3),
                  $Sys[14]
                );
              if ($n__0 < $newlen) {
                $newt = $create($newlen);
                $R_ = $t[1];
                $i = 0;
                $S_ =
                  (dynamic $j, dynamic $ob) ==> {
                    $match = null;
                    $i__1 = null;
                    $oh = null;
                    $i__2 = null;
                    $setter = null;
                    $h = null;
                    $setter__0 = null;
                    $i__0 = $i;
                    for (;;) {
                      if ($length($ob) <= $i__0) {return 0;}
                      $match = $caml_weak_check($ob, $i__0);
                      if (0 === $match) {
                        $i__1 = (int) ($i__0 + 1);
                        $i__0 = $i__1;
                        continue;
                      }
                      $oh = $caml_check_bound($t[2], $j)[$j + 1];
                      $setter__0 =
                        (dynamic $i) ==> {
                          $setter = (dynamic $nb, dynamic $ni, dynamic $param) ==> {
                            return $caml_weak_blit($ob, $i, $nb, $ni, 1);
                          };
                          return $setter;
                        };
                      $setter = $setter__0($i__0);
                      $h = $caml_check_bound($oh, $i__0)[$i__0 + 1];
                      $add_aux->contents(
                        $newt,
                        $setter,
                        0,
                        $h,
                        $get_index($newt, $h)
                      );
                      $i__2 = (int) ($i__0 + 1);
                      $i__0 = $i__2;
                      continue;
                    }
                  };
                $call2($Array[14], $S_, $R_);
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
            }
            return $ac_;
          }
          if ($caml_weak_check($bucket__0, $i__3)) {
            $i__5 = (int) ($i__3 + 1);
            $i__3 = $i__5;
            continue;
          }
          $call3($setter, $bucket__0, $i__3, $d);
          $caml_check_bound($hashes, $i__3)[$i__3 + 1] = $h;
          return 0;
        }
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
        $match = null;
        $v = null;
        $match__0 = null;
        $v__0 = null;
        $i__0 = null;
        $i__1 = null;
        $i__2 = null;
        $h = $call1($H[2], $d);
        $index = $get_index($t, $h);
        $bucket = $caml_check_bound($t[1], $index)[$index + 1];
        $hashes = $caml_check_bound($t[2], $index)[$index + 1];
        $sz = $length($bucket);
        $i = 0;
        for (;;) {
          if ($sz <= $i) {return $call2($ifnotfound, $h, $index);}
          if ($h === $caml_check_bound($hashes, $i)[$i + 1]) {
            $match = $caml_weak_get_copy($bucket, $i);
            if ($match) {
              $v = $match[1];
              if ($call2($H[1], $v, $d)) {
                $match__0 = $caml_weak_get($bucket, $i);
                if ($match__0) {$v__0 = $match__0[1];return $v__0;}
                $i__0 = (int) ($i + 1);
                $i = $i__0;
                continue;
              }
            }
            $i__1 = (int) ($i + 1);
            $i = $i__1;
            continue;
          }
          $i__2 = (int) ($i + 1);
          $i = $i__2;
          continue;
        }
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
        $match = null;
        $v = null;
        $v__0 = null;
        $i__0 = null;
        $i__1 = null;
        $i__2 = null;
        $h = $call1($H[2], $d);
        $index = $get_index($t, $h);
        $bucket = $caml_check_bound($t[1], $index)[$index + 1];
        $hashes = $caml_check_bound($t[2], $index)[$index + 1];
        $sz = $length($bucket);
        $i = 0;
        for (;;) {
          if ($sz <= $i) {return 0;}
          if ($h === $caml_check_bound($hashes, $i)[$i + 1]) {
            $match = $caml_weak_get_copy($bucket, $i);
            if ($match) {
              $v = $match[1];
              if ($call2($H[1], $v, $d)) {
                $v__0 = $caml_weak_get($bucket, $i);
                if ($v__0) {return $v__0;}
                $i__0 = (int) ($i + 1);
                $i = $i__0;
                continue;
              }
            }
            $i__1 = (int) ($i + 1);
            $i = $i__1;
            continue;
          }
          $i__2 = (int) ($i + 1);
          $i = $i__2;
          continue;
        }
      };
      $find_shadow = 
      (dynamic $t, dynamic $d, dynamic $iffound, dynamic $ifnotfound) ==> {
        $match = null;
        $v = null;
        $i__0 = null;
        $i__1 = null;
        $h = $call1($H[2], $d);
        $index = $get_index($t, $h);
        $bucket = $caml_check_bound($t[1], $index)[$index + 1];
        $hashes = $caml_check_bound($t[2], $index)[$index + 1];
        $sz = $length($bucket);
        $i = 0;
        for (;;) {
          if ($sz <= $i) {return $ifnotfound;}
          if ($h === $caml_check_bound($hashes, $i)[$i + 1]) {
            $match = $caml_weak_get_copy($bucket, $i);
            if ($match) {
              $v = $match[1];
              if ($call2($H[1], $v, $d)) {
                return $call2($iffound, $bucket, $i);
              }
            }
            $i__0 = (int) ($i + 1);
            $i = $i__0;
            continue;
          }
          $i__1 = (int) ($i + 1);
          $i = $i__1;
          continue;
        }
      };
      $remove = (dynamic $t, dynamic $d) ==> {
        $H_ = 0;
        return $find_shadow(
          $t,
          $d,
          (dynamic $w, dynamic $i) ==> {return $caml_weak_set($w, $i, 0);},
          $H_
        );
      };
      $mem = (dynamic $t, dynamic $d) ==> {
        $G_ = 0;
        return $find_shadow(
          $t,
          $d,
          (dynamic $w, dynamic $i) ==> {return 1;},
          $G_
        );
      };
      $find_all = (dynamic $t, dynamic $d) ==> {
        $match = null;
        $v = null;
        $match__0 = null;
        $v__0 = null;
        $accu__0 = null;
        $i__0 = null;
        $i__1 = null;
        $i__2 = null;
        $i__3 = null;
        $h = $call1($H[2], $d);
        $index = $get_index($t, $h);
        $bucket = $caml_check_bound($t[1], $index)[$index + 1];
        $hashes = $caml_check_bound($t[2], $index)[$index + 1];
        $sz = $length($bucket);
        $i = 0;
        $accu = 0;
        for (;;) {
          if ($sz <= $i) {return $accu;}
          if ($h === $caml_check_bound($hashes, $i)[$i + 1]) {
            $match = $caml_weak_get_copy($bucket, $i);
            if ($match) {
              $v = $match[1];
              if ($call2($H[1], $v, $d)) {
                $match__0 = $caml_weak_get($bucket, $i);
                if ($match__0) {
                  $v__0 = $match__0[1];
                  $accu__0 = Vector{0, $v__0, $accu};
                  $i__0 = (int) ($i + 1);
                  $i = $i__0;
                  $accu = $accu__0;
                  continue;
                }
                $i__1 = (int) ($i + 1);
                $i = $i__1;
                continue;
              }
            }
            $i__2 = (int) ($i + 1);
            $i = $i__2;
            continue;
          }
          $i__3 = (int) ($i + 1);
          $i = $i__3;
          continue;
        }
      };
      $stats = (dynamic $t) ==> {
        $len = $t[1]->count() - 1;
        $lens = $call2($Array[15], $length, $t[1]);
        $u_ = (dynamic $F_, dynamic $E_) ==> {
          return $runtime["caml_int_compare"]($F_, $E_);
        };
        $call2($Array[25], $u_, $lens);
        $v_ = 0;
        $w_ = (dynamic $D_, dynamic $C_) ==> {return (int) ($D_ + $C_);};
        $totlen = $call3($Array[17], $w_, $v_, $lens);
        $x_ = (int) ($len + -1);
        $z_ = (int) ($len / 2);
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
    
     return ($Weak);

  }
  public static function length(dynamic $x): dynamic {
    return static::callRehackFunction(static::requireModule()[2], varray[$x]);
  }
  public static function fill(dynamic $ar, dynamic $ofs, dynamic $len, dynamic $x): dynamic {
    return static::callRehackFunction(static::requireModule()[7], varray[$ar, $ofs, $len, $x]);
  }
  public static function Make(dynamic $H): dynamic {
    return static::callRehackFunction(static::requireModule()[9], varray[$H]);
  }

}
/* Hashing disabled */
