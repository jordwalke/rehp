<?hh
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * Array_.php
 */

namespace Rehack;

final class Array_ {
  <<__Memoize>>
  public static function get() {
    $global_object = \Rehack\GlobalObject::get();
    $runtime = \Rehack\Runtime::get();
    /*
     * Soon, these will replace the `global_data->ModuleName`
     * pattern in the load() function.
     */
    $Pervasives = Pervasives::get();
    $Assert_failure = Assert_failure::get();
    Array_::load($global_object);
    $memoized = $runtime->caml_get_global_data()->Array_;
    return $memoized;
  }

  /**
   * Performs module load operation. May have side effects.
   */
  private static function load($joo_global_object) {
    

    $runtime = $joo_global_object->jsoo_runtime;
    $caml_array_sub = $runtime["caml_array_sub"];
    $call1 = $runtime["caml_call1"];
    $call2 = $runtime["caml_call2"];
    $caml_check_bound = $runtime["caml_check_bound"];
    $caml_make_vect = $runtime["caml_make_vect"];
    $string = $runtime["caml_new_string"];
    $caml_wrap_exception = $runtime["caml_wrap_exception"];
    $global_data = $runtime["caml_get_global_data"]();
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
    $Assert_failure = $global_data["Assert_failure"];
    $Pervasives = $global_data["Pervasives"];
    $dx = Vector{0, $string("array.ml"), 233, 4};
    $make_float = function(dynamic $ev) use ($runtime) {
      return $runtime["caml_make_float_vect"]($ev);
    };
    $Floatarray = Vector{0};
    $init = function(dynamic $l, dynamic $f) use ($Pervasives,$call1,$caml_make_vect,$cst_Array_init) {
      if (0 === $l) {return Vector{0};}
      if (0 <= $l) {
        $res = $caml_make_vect($l, $call1($f, 0));
        $et = (int) ($l + -1);
        $es = 1;
        if (! ($et < 1)) {
          $i = $es;
          for (;;) {
            $res[$i + 1] = $call1($f, $i);
            $eu = (int) ($i + 1);
            if ($et !== $i) {$i = $eu;continue;}
            break;
          }
        }
        return $res;
      }
      return $call1($Pervasives[1], $cst_Array_init);
    };
    $make_matrix = function(dynamic $sx, dynamic $sy, dynamic $init) use ($caml_make_vect) {
      $res = $caml_make_vect($sx, Vector{0});
      $eq = (int) ($sx + -1);
      $ep = 0;
      if (! ($eq < 0)) {
        $x = $ep;
        for (;;) {
          $res[$x + 1] = $caml_make_vect($sy, $init);
          $er = (int) ($x + 1);
          if ($eq !== $x) {$x = $er;continue;}
          break;
        }
      }
      return $res;
    };
    $copy = function(dynamic $a) use ($caml_array_sub) {
      $l = $a->count() - 1;
      return 0 === $l ? Vector{0} : ($caml_array_sub($a, 0, $l));
    };
    $append = function(dynamic $a1, dynamic $a2) use ($caml_array_sub,$copy,$runtime) {
      $l1 = $a1->count() - 1;
      return 0 === $l1
        ? $copy($a2)
        : (0 === $a2->count() - 1
         ? $caml_array_sub($a1, 0, $l1)
         : ($runtime["caml_array_append"]($a1, $a2)));
    };
    $sub = function(dynamic $a, dynamic $ofs, dynamic $len) use ($Pervasives,$call1,$caml_array_sub,$cst_Array_sub) {
      if (0 <= $ofs) {
        if (0 <= $len) {
          if (! ((int) ($a->count() - 1 - $len) < $ofs)) {return $caml_array_sub($a, $ofs, $len);}
        }
      }
      return $call1($Pervasives[1], $cst_Array_sub);
    };
    $fill = function(dynamic $a, dynamic $ofs, dynamic $len, dynamic $v) use ($Pervasives,$call1,$cst_Array_fill) {
      if (0 <= $ofs) {
        if (0 <= $len) {
          if (! ((int) ($a->count() - 1 - $len) < $ofs)) {
            $en = (int) ((int) ($ofs + $len) + -1);
            if (! ($en < $ofs)) {
              $i = $ofs;
              for (;;) {
                $a[$i + 1] = $v;
                $eo = (int) ($i + 1);
                if ($en !== $i) {$i = $eo;continue;}
                break;
              }
            }
            return 0;
          }
        }
      }
      return $call1($Pervasives[1], $cst_Array_fill);
    };
    $blit = function
    (dynamic $a1, dynamic $ofs1, dynamic $a2, dynamic $ofs2, dynamic $len) use ($Pervasives,$call1,$cst_Array_blit,$runtime) {
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
    $iter = function(dynamic $f, dynamic $a) use ($call1) {
      $el = (int) ($a->count() - 1 + -1);
      $ek = 0;
      if (! ($el < 0)) {
        $i = $ek;
        for (;;) {
          $call1($f, $a[$i + 1]);
          $em = (int) ($i + 1);
          if ($el !== $i) {$i = $em;continue;}
          break;
        }
      }
      return 0;
    };
    $iter2 = function(dynamic $f, dynamic $a, dynamic $b) use ($Pervasives,$call1,$call2,$cst_Array_iter2_arrays_must_have_the_same_length) {
      if ($a->count() - 1 !== $b->count() - 1) {
        return $call1(
          $Pervasives[1],
          $cst_Array_iter2_arrays_must_have_the_same_length
        );
      }
      $ei = (int) ($a->count() - 1 + -1);
      $eh = 0;
      if (! ($ei < 0)) {
        $i = $eh;
        for (;;) {
          $call2($f, $a[$i + 1], $b[$i + 1]);
          $ej = (int) ($i + 1);
          if ($ei !== $i) {$i = $ej;continue;}
          break;
        }
      }
      return 0;
    };
    $map = function(dynamic $f, dynamic $a) use ($call1,$caml_make_vect) {
      $l = $a->count() - 1;
      if (0 === $l) {return Vector{0};}
      $r = $caml_make_vect($l, $call1($f, $a[1]));
      $ef = (int) ($l + -1);
      $ee = 1;
      if (! ($ef < 1)) {
        $i = $ee;
        for (;;) {
          $r[$i + 1] = $call1($f, $a[$i + 1]);
          $eg = (int) ($i + 1);
          if ($ef !== $i) {$i = $eg;continue;}
          break;
        }
      }
      return $r;
    };
    $map2 = function(dynamic $f, dynamic $a, dynamic $b) use ($Pervasives,$call1,$call2,$caml_make_vect,$cst_Array_map2_arrays_must_have_the_same_length) {
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
      $ec = (int) ($la + -1);
      $eb = 1;
      if (! ($ec < 1)) {
        $i = $eb;
        for (;;) {
          $r[$i + 1] = $call2($f, $a[$i + 1], $b[$i + 1]);
          $ed = (int) ($i + 1);
          if ($ec !== $i) {$i = $ed;continue;}
          break;
        }
      }
      return $r;
    };
    $iteri = function(dynamic $f, dynamic $a) use ($call2) {
      $d_ = (int) ($a->count() - 1 + -1);
      $d9 = 0;
      if (! ($d_ < 0)) {
        $i = $d9;
        for (;;) {
          $call2($f, $i, $a[$i + 1]);
          $ea = (int) ($i + 1);
          if ($d_ !== $i) {$i = $ea;continue;}
          break;
        }
      }
      return 0;
    };
    $mapi = function(dynamic $f, dynamic $a) use ($call2,$caml_make_vect) {
      $l = $a->count() - 1;
      if (0 === $l) {return Vector{0};}
      $r = $caml_make_vect($l, $call2($f, 0, $a[1]));
      $d7 = (int) ($l + -1);
      $d6 = 1;
      if (! ($d7 < 1)) {
        $i = $d6;
        for (;;) {
          $r[$i + 1] = $call2($f, $i, $a[$i + 1]);
          $d8 = (int) ($i + 1);
          if ($d7 !== $i) {$i = $d8;continue;}
          break;
        }
      }
      return $r;
    };
    $to_list = function(dynamic $a) {
      $tolist = function(dynamic $i, dynamic $res) use ($a) {
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
    $list_length = function(dynamic $accu, dynamic $param) {
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
    $of_list = function(dynamic $l) use ($caml_make_vect,$list_length) {
      if ($l) {
        $tl = $l[2];
        $hd = $l[1];
        $a = $caml_make_vect($list_length(0, $l), $hd);
        $fill = function(dynamic $i, dynamic $param) use ($a) {
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
    $fold_left = function(dynamic $f, dynamic $x, dynamic $a) use ($call2) {
      $r = Vector{0, $x};
      $d4 = (int) ($a->count() - 1 + -1);
      $d3 = 0;
      if (! ($d4 < 0)) {
        $i = $d3;
        for (;;) {
          $r[1] = $call2($f, $r[1], $a[$i + 1]);
          $d5 = (int) ($i + 1);
          if ($d4 !== $i) {$i = $d5;continue;}
          break;
        }
      }
      return $r[1];
    };
    $fold_right = function(dynamic $f, dynamic $a, dynamic $x) use ($call2) {
      $r = Vector{0, $x};
      $d1 = (int) ($a->count() - 1 + -1);
      if (! ($d1 < 0)) {
        $i = $d1;
        for (;;) {
          $r[1] = $call2($f, $a[$i + 1], $r[1]);
          $d2 = (int) ($i + -1);
          if (0 !== $i) {$i = $d2;continue;}
          break;
        }
      }
      return $r[1];
    };
    $exists = function(dynamic $p, dynamic $a) use ($call1) {
      $n = $a->count() - 1;
      $loop = function(dynamic $i) use ($a,$call1,$n,$p) {
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
    $for_all = function(dynamic $p, dynamic $a) use ($call1) {
      $n = $a->count() - 1;
      $loop = function(dynamic $i) use ($a,$call1,$n,$p) {
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
    $mem = function(dynamic $x, dynamic $a) use ($runtime) {
      $n = $a->count() - 1;
      $loop = function(dynamic $i) use ($a,$n,$runtime,$x) {
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
    $memq = function(dynamic $x, dynamic $a) {
      $n = $a->count() - 1;
      $loop = function(dynamic $i) use ($a,$n,$x) {
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
    $sort = function(dynamic $cmp, dynamic $a) use ($Assert_failure,$Bottom,$call2,$caml_check_bound,$caml_wrap_exception,$dx,$runtime) {
      $maxson = function(dynamic $l, dynamic $i) use ($Bottom,$a,$call2,$caml_check_bound,$cmp,$runtime) {
        $i31 = (int) ((int) ((int) ($i + $i) + $i) + 1);
        $x = Vector{0, $i31};
        if ((int) ($i31 + 2) < $l) {
          $dU = (int) ($i31 + 1);
          $dV = $caml_check_bound($a, $dU)[$dU + 1];
          if ($call2($cmp, $caml_check_bound($a, $i31)[$i31 + 1], $dV) < 0) {$x[1] = (int) ($i31 + 1);}
          $dW = (int) ($i31 + 2);
          $dX = $caml_check_bound($a, $dW)[$dW + 1];
          $dY = $x[1];
          if ($call2($cmp, $caml_check_bound($a, $dY)[$dY + 1], $dX) < 0) {$x[1] = (int) ($i31 + 2);}
          return $x[1];
        }
        if ((int) ($i31 + 1) < $l) {
          $dZ = (int) ($i31 + 1);
          $d0 = $caml_check_bound($a, $dZ)[$dZ + 1];
          if (
            !
            (0 <= $call2($cmp, $caml_check_bound($a, $i31)[$i31 + 1], $d0))
          ) {return (int) ($i31 + 1);}
        }
        if ($i31 < $l) {return $i31;}
        throw $runtime["caml_wrap_thrown_exception"](Vector{0, $Bottom, $i}) as \Throwable;
      };
      $trickledown = function(dynamic $l, dynamic $i, dynamic $e) use ($a,$call2,$caml_check_bound,$cmp,$maxson) {
        $i__0 = $i;
        for (;;) {
          $j = $maxson($l, $i__0);
          if (0 < $call2($cmp, $caml_check_bound($a, $j)[$j + 1], $e)) {
            $dT = $caml_check_bound($a, $j)[$j + 1];
            $caml_check_bound($a, $i__0)[$i__0 + 1] = $dT;
            $i__0 = $j;
            continue;
          }
          $caml_check_bound($a, $i__0)[$i__0 + 1] = $e;
          return 0;
        }
      };
      $trickle = function(dynamic $l, dynamic $i, dynamic $e) use ($Bottom,$a,$caml_check_bound,$caml_wrap_exception,$runtime,$trickledown) {
        try {$dS = $trickledown($l, $i, $e);return $dS;}
        catch(\Throwable $exn) {
          $exn = $caml_wrap_exception($exn);
          if ($exn[1] === $Bottom) {
            $i__0 = $exn[2];
            $caml_check_bound($a, $i__0)[$i__0 + 1] = $e;
            return 0;
          }
          throw $runtime["caml_wrap_thrown_exception_reraise"]($exn) as \Throwable;
        }
      };
      $bubbledown = function(dynamic $l, dynamic $i) use ($a,$caml_check_bound,$maxson) {
        $i__0 = $i;
        for (;;) {
          $i__1 = $maxson($l, $i__0);
          $dR = $caml_check_bound($a, $i__1)[$i__1 + 1];
          $caml_check_bound($a, $i__0)[$i__0 + 1] = $dR;
          $i__0 = $i__1;
          continue;
        }
      };
      $bubble = function(dynamic $l, dynamic $i) use ($Bottom,$bubbledown,$caml_wrap_exception,$runtime) {
        try {$dQ = $bubbledown($l, $i);return $dQ;}
        catch(\Throwable $exn) {
          $exn = $caml_wrap_exception($exn);
          if ($exn[1] === $Bottom) {$i__0 = $exn[2];return $i__0;}
          throw $runtime["caml_wrap_thrown_exception_reraise"]($exn) as \Throwable;
        }
      };
      $trickleup = function(dynamic $i, dynamic $e) use ($Assert_failure,$a,$call2,$caml_check_bound,$cmp,$dx,$runtime) {
        $i__0 = $i;
        for (;;) {
          $father = (int) ((int) ($i__0 + -1) / 3);
          if ($i__0 !== $father) {
            if (
              0 <=
                $call2($cmp, $caml_check_bound($a, $father)[$father + 1], $e)
            ) {$caml_check_bound($a, $i__0)[$i__0 + 1] = $e;return 0;}
            $dP = $caml_check_bound($a, $father)[$father + 1];
            $caml_check_bound($a, $i__0)[$i__0 + 1] = $dP;
            if (0 < $father) {$i__0 = $father;continue;}
            $caml_check_bound($a, 0)[1] = $e;
            return 0;
          }
          throw $runtime["caml_wrap_thrown_exception"](Vector{0, $Assert_failure, $dx}) as \Throwable;
        }
      };
      $l = $a->count() - 1;
      $dJ = (int) ((int) ((int) ($l + 1) / 3) + -1);
      if (! ($dJ < 0)) {
        $i__0 = $dJ;
        for (;;) {
          $trickle($l, $i__0, $caml_check_bound($a, $i__0)[$i__0 + 1]);
          $dO = (int) ($i__0 + -1);
          if (0 !== $i__0) {$i__0 = $dO;continue;}
          break;
        }
      }
      $dK = (int) ($l + -1);
      if (! ($dK < 2)) {
        $i = $dK;
        for (;;) {
          $e__0 = $caml_check_bound($a, $i)[$i + 1];
          $a[$i + 1] = $caml_check_bound($a, 0)[1];
          $trickleup($bubble($i, 0), $e__0);
          $dN = (int) ($i + -1);
          if (2 !== $i) {$i = $dN;continue;}
          break;
        }
      }
      $dL = 1 < $l ? 1 : (0);
      if ($dL) {
        $e = $caml_check_bound($a, 1)[2];
        $a[2] = $caml_check_bound($a, 0)[1];
        $a[1] = $e;
        $dM = 0;
      }
      else {$dM = $dL;}
      return $dM;
    };
    $stable_sort = function(dynamic $cmp, dynamic $a) use ($blit,$call2,$caml_check_bound,$caml_make_vect) {
      $sortto = new Ref();
      $merge = function
      (dynamic $src1ofs, dynamic $src1len, dynamic $src2, dynamic $src2ofs, dynamic $src2len, dynamic $dst, dynamic $dstofs) use ($a,$blit,$call2,$caml_check_bound,$cmp) {
        $src1r = (int) ($src1ofs + $src1len);
        $src2r = (int) ($src2ofs + $src2len);
        $loop = function
        (dynamic $i1, dynamic $s1, dynamic $i2, dynamic $s2, dynamic $d) use ($a,$blit,$call2,$caml_check_bound,$cmp,$dst,$src1r,$src2,$src2r) {
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
        $dI = $caml_check_bound($src2, $src2ofs)[$src2ofs + 1];
        return $loop(
          $src1ofs,
          $caml_check_bound($a, $src1ofs)[$src1ofs + 1],
          $src2ofs,
          $dI,
          $dstofs
        );
      };
      $isortto = function
      (dynamic $srcofs, dynamic $dst, dynamic $dstofs, dynamic $len) use ($a,$call2,$caml_check_bound,$cmp) {
        $dA = (int) ($len + -1);
        $dz = 0;
        if (! ($dA < 0)) {
          $i = $dz;
          $continue_counter = null;
          for (;;) {
            $dB = (int) ($srcofs + $i);
            $e = $caml_check_bound($a, $dB)[$dB + 1];
            $j = Vector{0, (int) ((int) ($dstofs + $i) + -1)};
            for (;;) {
              if ($dstofs <= $j[1]) {
                $dC = $j[1];
                if (
                  0 < $call2($cmp, $caml_check_bound($dst, $dC)[$dC + 1], $e)
                ) {
                  $dD = $j[1];
                  $dE = $caml_check_bound($dst, $dD)[$dD + 1];
                  $dF = (int) ($j[1] + 1);
                  $caml_check_bound($dst, $dF)[$dF + 1] = $dE;
                  $j[1] += -1;
                  continue;
                }
              }
              $dG = (int) ($j[1] + 1);
              $caml_check_bound($dst, $dG)[$dG + 1] = $e;
              $dH = (int) ($i + 1);
              if ($dA !== $i) {$i = $dH;$continue_counter = 0;break;}
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
            break;
          }
        }
        return 0;
      };
      $sortto->contents = function
      (dynamic $srcofs, dynamic $dst, dynamic $dstofs, dynamic $len) use ($a,$isortto,$merge,$sortto) {
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
      function(dynamic $dy) use ($runtime) {
        return $runtime["caml_array_concat"]($dy);
      },
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
    
    $runtime["caml_register_global"](10, $Array, "Array_");

  }
}