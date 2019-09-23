<?hh
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * Weak.php
 */

namespace Rehack;

final class Weak {
  <<__Memoize>>
  public static function get() {
    $global_object = \Rehack\GlobalObject::get();
    $runtime = \Rehack\Runtime::get();
    /*
     * Soon, these will replace the `global_data->ModuleName`
     * pattern in the load() function.
     */
    $Array_ = Array_::get();
    $Obj = Obj::get();
    $Pervasives = Pervasives::get();
    $Sys = Sys::get();
    $Invalid_argument = Invalid_argument::get();
    $Not_found = Not_found::get();
    Weak::load($global_object);
    $memoized = $runtime->caml_get_global_data()->Weak;
    return $memoized;
  }

  /**
   * Performs module load operation. May have side effects.
   */
  private static function load($joo_global_object) {
    

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
    $global_data = $runtime["caml_get_global_data"]();
    $cst_Weak_Make_hash_bucket_cannot_grow_more = $string(
      "Weak.Make: hash bucket cannot grow more"
    );
    $cst_Weak_fill = $string("Weak.fill");
    $Pervasives = $global_data["Pervasives"];
    $Sys = $global_data["Sys"];
    $Array = $global_data["Array_"];
    $Not_found = $global_data["Not_found"];
    $Invalid_argument = $global_data["Invalid_argument"];
    $length = function(dynamic $x) {return (int) ($x->count() - 1 - 2);};
    $fill = function(dynamic $ar, dynamic $ofs, dynamic $len, dynamic $x) use ($Invalid_argument,$caml_weak_set,$cst_Weak_fill,$length,$runtime) {
      if (0 <= $ofs) {
        if (0 <= $len) {
          if (! ($length($ar) < (int) ($ofs + $len))) {
            $aC = (int) ((int) ($ofs + $len) + -1);
            if (! ($aC < $ofs)) {
              $i = $ofs;
              for (;;) {
                $caml_weak_set($ar, $i, $x);
                $aD = (int) ($i + 1);
                if ($aC !== $i) {$i = $aD;continue;}
                break;
              }
            }
            return 0;
          }
        }
      }
      throw $runtime["caml_wrap_thrown_exception"](
              Vector{0, $Invalid_argument, $cst_Weak_fill}
            ) as \Throwable;
    };
    $Make = function(dynamic $H) use ($Array,$Not_found,$Pervasives,$Sys,$call1,$call2,$call3,$call5,$caml_check_bound,$caml_make_vect,$caml_mod,$caml_obj_truncate,$caml_weak_blit,$caml_weak_check,$caml_weak_create,$caml_weak_get,$caml_weak_get_copy,$caml_weak_set,$cst_Weak_Make_hash_bucket_cannot_grow_more,$length,$runtime) {
      $add_aux = new Ref();
      $weak_create = function(dynamic $aB) use ($caml_weak_create) {
        return $caml_weak_create($aB);
      };
      $emptybucket = $weak_create(0);
      $get_index = function(dynamic $t, dynamic $h) use ($Pervasives,$caml_mod) {
        return $caml_mod($h & $Pervasives[7], $t[1]->count() - 1);
      };
      $limit = 7;
      $create = function(dynamic $sz) use ($Sys,$caml_make_vect,$emptybucket,$limit) {
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
      $clear = function(dynamic $t) use ($caml_check_bound,$emptybucket,$limit) {
        $az = (int) ($t[1]->count() - 1 + -1);
        $ay = 0;
        if (! ($az < 0)) {
          $i = $ay;
          for (;;) {
            $caml_check_bound($t[1], $i)[$i + 1] = $emptybucket;
            $caml_check_bound($t[2], $i)[$i + 1] = Vector{0};
            $aA = (int) ($i + 1);
            if ($az !== $i) {$i = $aA;continue;}
            break;
          }
        }
        $t[3] = $limit;
        $t[4] = 0;
        return 0;
      };
      $fold = function(dynamic $f, dynamic $t, dynamic $init) use ($Array,$call2,$call3,$caml_weak_get,$length) {
        $fold_bucket = function(dynamic $i, dynamic $b, dynamic $accu) use ($call2,$caml_weak_get,$f,$length) {
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
        $at = $t[1];
        $au = 0;
        $av = function(dynamic $aw, dynamic $ax) use ($au,$fold_bucket) {
          return $fold_bucket($au, $aw, $ax);
        };
        return $call3($Array[18], $av, $at, $init);
      };
      $iter = function(dynamic $f, dynamic $t) use ($Array,$call1,$call2,$caml_weak_get,$length) {
        $iter_bucket = function(dynamic $i, dynamic $b) use ($call1,$caml_weak_get,$f,$length) {
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
        $ap = $t[1];
        $aq = 0;
        $ar = function(dynamic $as) use ($aq,$iter_bucket) {
          return $iter_bucket($aq, $as);
        };
        return $call2($Array[13], $ar, $ap);
      };
      $iter_weak = function(dynamic $f, dynamic $t) use ($Array,$call2,$call3,$caml_check_bound,$caml_weak_check,$length) {
        $iter_bucket = function(dynamic $i, dynamic $j, dynamic $b) use ($call3,$caml_check_bound,$caml_weak_check,$f,$length,$t) {
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
        $ak = $t[1];
        $al = 0;
        $am = function(dynamic $an, dynamic $ao) use ($al,$iter_bucket) {
          return $iter_bucket($al, $an, $ao);
        };
        return $call2($Array[14], $am, $ak);
      };
      $count_bucket = function(dynamic $i, dynamic $b, dynamic $accu) use ($caml_weak_check,$length) {
        $i__0 = $i;
        $accu__0 = $accu;
        for (;;) {
          if ($length($b) <= $i__0) {return $accu__0;}
          $aj = $caml_weak_check($b, $i__0) ? 1 : (0);
          $accu__1 = (int) ($accu__0 + $aj);
          $i__1 = (int) ($i__0 + 1);
          $i__0 = $i__1;
          $accu__0 = $accu__1;
          continue;
        }
      };
      $count = function(dynamic $t) use ($Array,$call3,$count_bucket) {
        $ad = 0;
        $ae = $t[1];
        $af = 0;
        $ag = function(dynamic $ah, dynamic $ai) use ($af,$count_bucket) {
          return $count_bucket($af, $ah, $ai);
        };
        return $call3($Array[18], $ag, $ae, $ad);
      };
      $next_sz = function(dynamic $n) use ($Pervasives,$Sys,$call2) {
        return $call2(
          $Pervasives[4],
          (int)
          ((int) ((int) (3 * $n) / 2) + 3),
          $Sys[14]
        );
      };
      $prev_sz = function(dynamic $n) {
        return (int) ((int) ((int) ((int) ($n + -3) * 2) + 2) / 3);
      };
      $test_shrink_bucket = function(dynamic $t) use ($caml_check_bound,$caml_mod,$caml_obj_truncate,$caml_weak_blit,$caml_weak_check,$count_bucket,$emptybucket,$length,$prev_sz) {
        $V = $t[5];
        $bucket = $caml_check_bound($t[1], $V)[$V + 1];
        $W = $t[5];
        $hbucket = $caml_check_bound($t[2], $W)[$W + 1];
        $len = $length($bucket);
        $prev_len = $prev_sz($len);
        $live = $count_bucket(0, $bucket, 0);
        if ($live <= $prev_len) {
          $loop = function(dynamic $i, dynamic $j) use ($bucket,$caml_check_bound,$caml_weak_blit,$caml_weak_check,$hbucket,$prev_len) {
            $i__0 = $i;
            $j__0 = $j;
            for (;;) {
              $ab = $prev_len <= $j__0 ? 1 : (0);
              if ($ab) {
                if ($caml_weak_check($bucket, $i__0)) {
                  $i__1 = (int) ($i__0 + 1);
                  $i__0 = $i__1;
                  continue;
                }
                if ($caml_weak_check($bucket, $j__0)) {
                  $caml_weak_blit($bucket, $j__0, $bucket, $i__0, 1);
                  $ac = $caml_check_bound($hbucket, $j__0)[$j__0 + 1];
                  $caml_check_bound($hbucket, $i__0)[$i__0 + 1] = $ac;
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
              return $ab;
            }
          };
          $loop(0, (int) ($length($bucket) + -1));
          if (0 === $prev_len) {
            $X = $t[5];
            $caml_check_bound($t[1], $X)[$X + 1] = $emptybucket;
            $Y = $t[5];
            $caml_check_bound($t[2], $Y)[$Y + 1] = Vector{0};
          }
          else {
            $caml_obj_truncate($bucket, (int) ($prev_len + 2));
            $caml_obj_truncate($hbucket, $prev_len);
          }
          $Z = $t[3] < $len ? 1 : (0);
          $aa = $Z ? $prev_len <= $t[3] ? 1 : (0) : ($Z);
          if ($aa) {$t[4] = (int) ($t[4] + -1);}
        }
        $t[5] = $caml_mod((int) ($t[5] + 1), $t[1]->count() - 1);
        return 0;
      };
      $resize = function(dynamic $t) use ($Pervasives,$add_aux,$caml_check_bound,$caml_mod,$caml_weak_blit,$create,$get_index,$iter_weak,$next_sz) {
        $oldlen = $t[1]->count() - 1;
        $newlen = $next_sz($oldlen);
        if ($oldlen < $newlen) {
          $newt = $create($newlen);
          $add_weak = function(dynamic $ob, dynamic $oh, dynamic $oi) use ($add_aux,$caml_check_bound,$caml_weak_blit,$get_index,$newt) {
            $setter = function(dynamic $nb, dynamic $ni, dynamic $param) use ($caml_weak_blit,$ob,$oi) {
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
      $add_aux->contents = function
      (dynamic $t, dynamic $setter, dynamic $d, dynamic $h, dynamic $index) use ($Array,$Pervasives,$Sys,$call1,$call2,$call3,$call5,$caml_check_bound,$caml_make_vect,$caml_weak_blit,$caml_weak_check,$cst_Weak_Make_hash_bucket_cannot_grow_more,$length,$resize,$test_shrink_bucket,$weak_create) {
        $bucket = $caml_check_bound($t[1], $index)[$index + 1];
        $hashes = $caml_check_bound($t[2], $index)[$index + 1];
        $sz = $length($bucket);
        $loop = function(dynamic $i) use ($Array,$Pervasives,$Sys,$bucket,$call1,$call2,$call3,$call5,$caml_check_bound,$caml_make_vect,$caml_weak_blit,$caml_weak_check,$cst_Weak_Make_hash_bucket_cannot_grow_more,$d,$h,$hashes,$index,$resize,$setter,$sz,$t,$test_shrink_bucket,$weak_create) {
          $i__0 = $i;
          for (;;) {
            if ($sz <= $i__0) {
              $newsz = $call2(
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
              $R = $sz <= $t[3] ? 1 : (0);
              $S = $R ? $t[3] < $newsz ? 1 : (0) : ($R);
              if ($S) {
                $t[4] = (int) ($t[4] + 1);
                $i__1 = 0;
                for (;;) {
                  $test_shrink_bucket($t);
                  $U = (int) ($i__1 + 1);
                  if (2 !== $i__1) {$i__1 = $U;continue;}
                  break;
                }
                if ($continue_counter > 0) {
                  $continue_counter -= 1;
                  break;
                }
                else if ($continue_counter === 0) {
                  $continue_counter = null;
                  continue;
                }
              }
              $T = (int) (($t[1]->count() - 1) / 2) < $t[4] ? 1 : (0);
              return $T ? $resize($t) : ($T);
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
      $add = function(dynamic $t, dynamic $d) use ($H,$add_aux,$call1,$caml_weak_set,$get_index) {
        $h = $call1($H[2], $d);
        $M = $get_index($t, $h);
        $N = Vector{0, $d};
        return $add_aux->contents(
          $t,
          function(dynamic $Q, dynamic $P, dynamic $O) use ($caml_weak_set) {
            return $caml_weak_set($Q, $P, $O);
          },
          $N,
          $h,
          $M
        );
      };
      $find_or = function(dynamic $t, dynamic $d, dynamic $ifnotfound) use ($H,$call1,$call2,$caml_check_bound,$caml_weak_get,$caml_weak_get_copy,$get_index,$length) {
        $h = $call1($H[2], $d);
        $index = $get_index($t, $h);
        $bucket = $caml_check_bound($t[1], $index)[$index + 1];
        $hashes = $caml_check_bound($t[2], $index)[$index + 1];
        $sz = $length($bucket);
        $loop = function(dynamic $i) use ($H,$bucket,$call2,$caml_check_bound,$caml_weak_get,$caml_weak_get_copy,$d,$h,$hashes,$ifnotfound,$index,$sz) {
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
      $merge = function(dynamic $t, dynamic $d) use ($add_aux,$caml_weak_set,$find_or) {
        return $find_or(
          $t,
          $d,
          function(dynamic $h, dynamic $index) use ($add_aux,$caml_weak_set,$d,$t) {
            $I = Vector{0, $d};
            $add_aux->contents(
              $t,
              function(dynamic $L, dynamic $K, dynamic $J) use ($caml_weak_set) {
                return $caml_weak_set($L, $K, $J);
              },
              $I,
              $h,
              $index
            );
            return $d;
          }
        );
      };
      $find = function(dynamic $t, dynamic $d) use ($Not_found,$find_or,$runtime) {
        return $find_or(
          $t,
          $d,
          function(dynamic $h, dynamic $index) use ($Not_found,$runtime) {
            throw $runtime["caml_wrap_thrown_exception"]($Not_found) as \Throwable;
          }
        );
      };
      $find_opt = function(dynamic $t, dynamic $d) use ($H,$call1,$call2,$caml_check_bound,$caml_weak_get,$caml_weak_get_copy,$get_index,$length) {
        $h = $call1($H[2], $d);
        $index = $get_index($t, $h);
        $bucket = $caml_check_bound($t[1], $index)[$index + 1];
        $hashes = $caml_check_bound($t[2], $index)[$index + 1];
        $sz = $length($bucket);
        $loop = function(dynamic $i) use ($H,$bucket,$call2,$caml_check_bound,$caml_weak_get,$caml_weak_get_copy,$d,$h,$hashes,$sz) {
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
      $find_shadow = function
      (dynamic $t, dynamic $d, dynamic $iffound, dynamic $ifnotfound) use ($H,$call1,$call2,$caml_check_bound,$caml_weak_get_copy,$get_index,$length) {
        $h = $call1($H[2], $d);
        $index = $get_index($t, $h);
        $bucket = $caml_check_bound($t[1], $index)[$index + 1];
        $hashes = $caml_check_bound($t[2], $index)[$index + 1];
        $sz = $length($bucket);
        $loop = function(dynamic $i) use ($H,$bucket,$call2,$caml_check_bound,$caml_weak_get_copy,$d,$h,$hashes,$iffound,$ifnotfound,$sz) {
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
      $remove = function(dynamic $t, dynamic $d) use ($caml_weak_set,$find_shadow) {
        $H = 0;
        return $find_shadow(
          $t,
          $d,
          function(dynamic $w, dynamic $i) use ($caml_weak_set) {
            return $caml_weak_set($w, $i, 0);
          },
          $H
        );
      };
      $mem = function(dynamic $t, dynamic $d) use ($find_shadow) {
        $G = 0;
        return $find_shadow(
          $t,
          $d,
          function(dynamic $w, dynamic $i) {return 1;},
          $G
        );
      };
      $find_all = function(dynamic $t, dynamic $d) use ($H,$call1,$call2,$caml_check_bound,$caml_weak_get,$caml_weak_get_copy,$get_index,$length) {
        $h = $call1($H[2], $d);
        $index = $get_index($t, $h);
        $bucket = $caml_check_bound($t[1], $index)[$index + 1];
        $hashes = $caml_check_bound($t[2], $index)[$index + 1];
        $sz = $length($bucket);
        $loop = function(dynamic $i, dynamic $accu) use ($H,$bucket,$call2,$caml_check_bound,$caml_weak_get,$caml_weak_get_copy,$d,$h,$hashes,$sz) {
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
      $stats = function(dynamic $t) use ($Array,$call2,$call3,$caml_check_bound,$count,$length,$runtime) {
        $len = $t[1]->count() - 1;
        $lens = $call2($Array[15], $length, $t[1]);
        $u = function(dynamic $F, dynamic $E) use ($runtime) {
          return $runtime["caml_int_compare"]($F, $E);
        };
        $call2($Array[25], $u, $lens);
        $v = 0;
        $w = function(dynamic $D, dynamic $C) {return (int) ($D + $C);};
        $totlen = $call3($Array[17], $w, $v, $lens);
        $x = (int) ($len + -1);
        $z = (int) ($len / 2);
        $y = $caml_check_bound($lens, $x)[$x + 1];
        $A = $caml_check_bound($lens, $z)[$z + 1];
        $B = $caml_check_bound($lens, 0)[1];
        return Vector{0, $len, $count($t), $totlen, $B, $A, $y};
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
    $a = function(dynamic $t, dynamic $s, dynamic $r, dynamic $q, dynamic $p) use ($caml_weak_blit) {return $caml_weak_blit($t, $s, $r, $q, $p);
    };
    $b = function(dynamic $o, dynamic $n) use ($caml_weak_check) {
      return $caml_weak_check($o, $n);
    };
    $c = function(dynamic $m, dynamic $l) use ($caml_weak_get_copy) {
      return $caml_weak_get_copy($m, $l);
    };
    $d = function(dynamic $k, dynamic $j) use ($caml_weak_get) {
      return $caml_weak_get($k, $j);
    };
    $e = function(dynamic $i, dynamic $h, dynamic $g) use ($caml_weak_set) {
      return $caml_weak_set($i, $h, $g);
    };
    $Weak = Vector{
      0,
      function(dynamic $f) use ($caml_weak_create) {
        return $caml_weak_create($f);
      },
      $length,
      $e,
      $d,
      $c,
      $b,
      $fill,
      $a,
      $Make
    };
    
    $runtime["caml_register_global"](7, $Weak, "Weak");

  }
}