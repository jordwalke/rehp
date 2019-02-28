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
    $caml_arity_test = $runtime->caml_arity_test;
    $ArrayLiteral = $runtime->ArrayLiteral;
    $caml_array_sub = $runtime->caml_array_sub;
    $caml_check_bound = $runtime->caml_check_bound;
    $caml_make_vect = $runtime->caml_make_vect;
    $caml_new_string = $runtime->caml_new_string;
    $caml_wrap_exception = $runtime->caml_wrap_exception;
    $caml_call1 = function($f, $a0) use ($ArrayLiteral,$caml_arity_test,$runtime) {
      return $caml_arity_test($f) == 1
        ? $f($a0)
        : ($runtime->caml_call_gen($f, $ArrayLiteral($a0)));
    };
    $caml_call2 = function($f, $a0, $a1) use ($ArrayLiteral,$caml_arity_test,$runtime) {
      return $caml_arity_test($f) == 2
        ? $f($a0, $a1)
        : ($runtime->caml_call_gen($f, $ArrayLiteral($a0, $a1)));
    };
    $global_data = $runtime->caml_get_global_data();
    $cst_Array_map2_arrays_must_have_the_same_length = $caml_new_string(
      "Array.map2: arrays must have the same length"
    );
    $cst_Array_iter2_arrays_must_have_the_same_length = $caml_new_string(
      "Array.iter2: arrays must have the same length"
    );
    $cst_Array_blit = $caml_new_string("Array.blit");
    $cst_Array_fill = $caml_new_string("Array.fill");
    $cst_Array_sub = $caml_new_string("Array.sub");
    $cst_Array_init = $caml_new_string("Array.init");
    $cst_Array_Bottom = $caml_new_string("Array.Bottom");
    $Assert_failure = $global_data->Assert_failure;
    $Pervasives = $global_data->Pervasives;
    $dw = R(0, $caml_new_string("array.ml"), 233, 4);
    $make_float = function($eu) use ($runtime) {
      return $runtime->caml_make_float_vect($eu);
    };
    $Floatarray = V(0);
    $init = function($l, $f) use ($Pervasives,$caml_call1,$caml_make_vect,$cst_Array_init) {
      if (0 === $l) {return V(0);}
      if (0 <= $l) {
        $res = $caml_make_vect($l, $caml_call1($f, 0));
        $es = $l + -1 | 0;
        $er = 1;
        if (! ($es < 1)) {
          $i = $er;
          for (;;) {
            $res[$i + 1] = $caml_call1($f, $i);
            $et = $i + 1 | 0;
            if ($es !== $i) {$i = $et;continue;}
            break;
          }
        }
        return $res;
      }
      return $caml_call1($Pervasives[1], $cst_Array_init);
    };
    $make_matrix = function($sx, $sy, $init) use ($caml_make_vect) {
      $res = $caml_make_vect($sx, V(0));
      $ep = $sx + -1 | 0;
      $eo = 0;
      if (! ($ep < 0)) {
        $x = $eo;
        for (;;) {
          $res[$x + 1] = $caml_make_vect($sy, $init);
          $eq = $x + 1 | 0;
          if ($ep !== $x) {$x = $eq;continue;}
          break;
        }
      }
      return $res;
    };
    $copy = function($a) use ($caml_array_sub) {
      $l = $a->length - 1;
      return 0 === $l ? V(0) : ($caml_array_sub($a, 0, $l));
    };
    $append = function($a1, $a2) use ($caml_array_sub,$copy,$runtime) {
      $l1 = $a1->length - 1;
      return 0 === $l1
        ? $copy($a2)
        : (0 === $a2->length - 1
         ? $caml_array_sub($a1, 0, $l1)
         : ($runtime->caml_array_append($a1, $a2)));
    };
    $sub = function($a, $ofs, $len) use ($Pervasives,$caml_array_sub,$caml_call1,$cst_Array_sub) {
      if (0 <= $ofs) {
        if (0 <= $len) {
          if (! (($a->length - 1 - $len | 0) < $ofs)) {return $caml_array_sub($a, $ofs, $len);}
        }
      }
      return $caml_call1($Pervasives[1], $cst_Array_sub);
    };
    $fill = function($a, $ofs, $len, $v) use ($Pervasives,$caml_call1,$cst_Array_fill) {
      if (0 <= $ofs) {
        if (0 <= $len) {
          if (! (($a->length - 1 - $len | 0) < $ofs)) {
            $em = ($ofs + $len | 0) + -1 | 0;
            if (! ($em < $ofs)) {
              $i = $ofs;
              for (;;) {
                $a[$i + 1] = $v;
                $en = $i + 1 | 0;
                if ($em !== $i) {$i = $en;continue;}
                break;
              }
            }
            return 0;
          }
        }
      }
      return $caml_call1($Pervasives[1], $cst_Array_fill);
    };
    $blit = function($a1, $ofs1, $a2, $ofs2, $len) use ($Pervasives,$caml_call1,$cst_Array_blit,$runtime) {
      if (0 <= $len) {
        if (0 <= $ofs1) {
          if (! (($a1->length - 1 - $len | 0) < $ofs1)) {
            if (0 <= $ofs2) {
              if (! (($a2->length - 1 - $len | 0) < $ofs2)) {
                return $runtime->caml_array_blit($a1, $ofs1, $a2, $ofs2, $len);
              }
            }
          }
        }
      }
      return $caml_call1($Pervasives[1], $cst_Array_blit);
    };
    $iter = function($f, $a) use ($caml_call1) {
      $ek = $a->length - 1 + -1 | 0;
      $ej = 0;
      if (! ($ek < 0)) {
        $i = $ej;
        for (;;) {
          $caml_call1($f, $a[$i + 1]);
          $el = $i + 1 | 0;
          if ($ek !== $i) {$i = $el;continue;}
          break;
        }
      }
      return 0;
    };
    $iter2 = function($f, $a, $b) use ($Pervasives,$caml_call1,$caml_call2,$cst_Array_iter2_arrays_must_have_the_same_length) {
      if ($a->length - 1 !== $b->length - 1) {
        return $caml_call1(
          $Pervasives[1],
          $cst_Array_iter2_arrays_must_have_the_same_length
        );
      }
      $eh = $a->length - 1 + -1 | 0;
      $eg = 0;
      if (! ($eh < 0)) {
        $i = $eg;
        for (;;) {
          $caml_call2($f, $a[$i + 1], $b[$i + 1]);
          $ei = $i + 1 | 0;
          if ($eh !== $i) {$i = $ei;continue;}
          break;
        }
      }
      return 0;
    };
    $map = function($f, $a) use ($caml_call1,$caml_make_vect) {
      $l = $a->length - 1;
      if (0 === $l) {return V(0);}
      $r = $caml_make_vect($l, $caml_call1($f, $a[1]));
      $ee = $l + -1 | 0;
      $ed = 1;
      if (! ($ee < 1)) {
        $i = $ed;
        for (;;) {
          $r[$i + 1] = $caml_call1($f, $a[$i + 1]);
          $ef = $i + 1 | 0;
          if ($ee !== $i) {$i = $ef;continue;}
          break;
        }
      }
      return $r;
    };
    $map2 = function($f, $a, $b) use ($Pervasives,$caml_call1,$caml_call2,$caml_make_vect,$cst_Array_map2_arrays_must_have_the_same_length) {
      $la = $a->length - 1;
      $lb = $b->length - 1;
      if ($la !== $lb) {
        return $caml_call1(
          $Pervasives[1],
          $cst_Array_map2_arrays_must_have_the_same_length
        );
      }
      if (0 === $la) {return V(0);}
      $r = $caml_make_vect($la, $caml_call2($f, $a[1], $b[1]));
      $eb = $la + -1 | 0;
      $ea = 1;
      if (! ($eb < 1)) {
        $i = $ea;
        for (;;) {
          $r[$i + 1] = $caml_call2($f, $a[$i + 1], $b[$i + 1]);
          $ec = $i + 1 | 0;
          if ($eb !== $i) {$i = $ec;continue;}
          break;
        }
      }
      return $r;
    };
    $iteri = function($f, $a) use ($caml_call2) {
      $d9 = $a->length - 1 + -1 | 0;
      $d8 = 0;
      if (! ($d9 < 0)) {
        $i = $d8;
        for (;;) {
          $caml_call2($f, $i, $a[$i + 1]);
          $d_ = $i + 1 | 0;
          if ($d9 !== $i) {$i = $d_;continue;}
          break;
        }
      }
      return 0;
    };
    $mapi = function($f, $a) use ($caml_call2,$caml_make_vect) {
      $l = $a->length - 1;
      if (0 === $l) {return V(0);}
      $r = $caml_make_vect($l, $caml_call2($f, 0, $a[1]));
      $d6 = $l + -1 | 0;
      $d5 = 1;
      if (! ($d6 < 1)) {
        $i = $d5;
        for (;;) {
          $r[$i + 1] = $caml_call2($f, $i, $a[$i + 1]);
          $d7 = $i + 1 | 0;
          if ($d6 !== $i) {$i = $d7;continue;}
          break;
        }
      }
      return $r;
    };
    $to_list = function($a) {
      $tolist = function($i, $res) use ($a) {
        $i__0 = $i;
        $res__0 = $res;
        for (;;) {
          if (0 <= $i__0) {
            $res__1 = V(0, $a[$i__0 + 1], $res__0);
            $i__1 = $i__0 + -1 | 0;
            $i__0 = $i__1;
            $res__0 = $res__1;
            continue;
          }
          return $res__0;
        }
      };
      return $tolist($a->length - 1 + -1 | 0, 0);
    };
    $list_length = function($accu, $param) {
      $accu__0 = $accu;
      $param__0 = $param;
      for (;;) {
        if ($param__0) {
          $param__1 = $param__0[2];
          $accu__1 = $accu__0 + 1 | 0;
          $accu__0 = $accu__1;
          $param__0 = $param__1;
          continue;
        }
        return $accu__0;
      }
    };
    $of_list = function($l) use ($caml_make_vect,$list_length) {
      if ($l) {
        $tl = $l[2];
        $hd = $l[1];
        $a = $caml_make_vect($list_length(0, $l), $hd);
        $fill = function($i, $param) use ($a) {
          $i__0 = $i;
          $param__0 = $param;
          for (;;) {
            if ($param__0) {
              $param__1 = $param__0[2];
              $hd = $param__0[1];
              $a[$i__0 + 1] = $hd;
              $i__1 = $i__0 + 1 | 0;
              $i__0 = $i__1;
              $param__0 = $param__1;
              continue;
            }
            return $a;
          }
        };
        return $fill(1, $tl);
      }
      return V(0);
    };
    $fold_left = function($f, $x, $a) use ($caml_call2) {
      $r = V(0, $x);
      $d3 = $a->length - 1 + -1 | 0;
      $d2 = 0;
      if (! ($d3 < 0)) {
        $i = $d2;
        for (;;) {
          $r[1] = $caml_call2($f, $r[1], $a[$i + 1]);
          $d4 = $i + 1 | 0;
          if ($d3 !== $i) {$i = $d4;continue;}
          break;
        }
      }
      return $r[1];
    };
    $fold_right = function($f, $a, $x) use ($caml_call2) {
      $r = V(0, $x);
      $d0 = $a->length - 1 + -1 | 0;
      if (! ($d0 < 0)) {
        $i = $d0;
        for (;;) {
          $r[1] = $caml_call2($f, $a[$i + 1], $r[1]);
          $d1 = $i + -1 | 0;
          if (0 !== $i) {$i = $d1;continue;}
          break;
        }
      }
      return $r[1];
    };
    $exists = function($p, $a) use ($caml_call1) {
      $n = $a->length - 1;
      $loop = function($i) use ($a,$caml_call1,$n,$p) {
        $i__0 = $i;
        for (;;) {
          if ($i__0 === $n) {return 0;}
          if ($caml_call1($p, $a[$i__0 + 1])) {return 1;}
          $i__1 = $i__0 + 1 | 0;
          $i__0 = $i__1;
          continue;
        }
      };
      return $loop(0);
    };
    $for_all = function($p, $a) use ($caml_call1) {
      $n = $a->length - 1;
      $loop = function($i) use ($a,$caml_call1,$n,$p) {
        $i__0 = $i;
        for (;;) {
          if ($i__0 === $n) {return 1;}
          if ($caml_call1($p, $a[$i__0 + 1])) {
            $i__1 = $i__0 + 1 | 0;
            $i__0 = $i__1;
            continue;
          }
          return 0;
        }
      };
      return $loop(0);
    };
    $mem = function($x, $a) use ($runtime) {
      $n = $a->length - 1;
      $loop = function($i) use ($a,$n,$runtime,$x) {
        $i__0 = $i;
        for (;;) {
          if ($i__0 === $n) {return 0;}
          if (0 === $runtime->caml_compare($a[$i__0 + 1], $x)) {return 1;}
          $i__1 = $i__0 + 1 | 0;
          $i__0 = $i__1;
          continue;
        }
      };
      return $loop(0);
    };
    $memq = function($x, $a) {
      $n = $a->length - 1;
      $loop = function($i) use ($a,$n,$x) {
        $i__0 = $i;
        for (;;) {
          if ($i__0 === $n) {return 0;}
          if ($x === $a[$i__0 + 1]) {return 1;}
          $i__1 = $i__0 + 1 | 0;
          $i__0 = $i__1;
          continue;
        }
      };
      return $loop(0);
    };
    $Bottom = V(248, $cst_Array_Bottom, $runtime->caml_fresh_oo_id(0));
    $sort = function($cmp, $a) use ($Assert_failure,$Bottom,$caml_call2,$caml_check_bound,$caml_wrap_exception,$dw,$runtime) {
      $maxson = function($l, $i) use ($Bottom,$a,$caml_call2,$caml_check_bound,$cmp,$runtime) {
        $i31 = (($i + $i | 0) + $i | 0) + 1 | 0;
        $x = V(0, $i31);
        if (($i31 + 2 | 0) < $l) {
          $dT = $i31 + 1 | 0;
          $dU = $caml_check_bound($a, $dT)[$dT + 1];
          if (
            $caml_call2($cmp, $caml_check_bound($a, $i31)[$i31 + 1], $dU) < 0
          ) {$x[1] = $i31 + 1 | 0;}
          $dV = $i31 + 2 | 0;
          $dW = $caml_check_bound($a, $dV)[$dV + 1];
          $dX = $x[1];
          if ($caml_call2($cmp, $caml_check_bound($a, $dX)[$dX + 1], $dW) < 0
          ) {$x[1] = $i31 + 2 | 0;}
          return $x[1];
        }
        if (($i31 + 1 | 0) < $l) {
          $dY = $i31 + 1 | 0;
          $dZ = $caml_check_bound($a, $dY)[$dY + 1];
          if (
            !
            (0 <=
               $caml_call2($cmp, $caml_check_bound($a, $i31)[$i31 + 1], $dZ))
          ) {return $i31 + 1 | 0;}
        }
        if ($i31 < $l) {return $i31;}
        throw $runtime->caml_wrap_thrown_exception(V(0, $Bottom, $i));
      };
      $trickledown = function($l, $i, $e) use ($a,$caml_call2,$caml_check_bound,$cmp,$maxson) {
        $i__0 = $i;
        for (;;) {
          $j = $maxson($l, $i__0);
          if (0 < $caml_call2($cmp, $caml_check_bound($a, $j)[$j + 1], $e)) {
            $dS = $caml_check_bound($a, $j)[$j + 1];
            $caml_check_bound($a, $i__0)[$i__0 + 1] = $dS;
            $i__0 = $j;
            continue;
          }
          return $caml_check_bound($a, $i__0)[$i__0 + 1] = $e;
        }
      };
      $trickle = function($l, $i, $e) use ($Bottom,$a,$caml_check_bound,$caml_wrap_exception,$runtime,$trickledown) {
        try {$dR = $trickledown($l, $i, $e);return $dR;}
        catch(\Throwable $exn) {
          $exn = $caml_wrap_exception($exn);
          if ($exn[1] === $Bottom) {
            $i__0 = $exn[2];
            return $caml_check_bound($a, $i__0)[$i__0 + 1] = $e;
          }
          throw $runtime->caml_wrap_thrown_exception_reraise($exn);
        }
      };
      $bubbledown = function($l, $i) use ($a,$caml_check_bound,$maxson) {
        $i__0 = $i;
        for (;;) {
          $i__1 = $maxson($l, $i__0);
          $dQ = $caml_check_bound($a, $i__1)[$i__1 + 1];
          $caml_check_bound($a, $i__0)[$i__0 + 1] = $dQ;
          $i__0 = $i__1;
          continue;
        }
      };
      $bubble = function($l, $i) use ($Bottom,$bubbledown,$caml_wrap_exception,$runtime) {
        try {$dP = $bubbledown($l, $i);return $dP;}
        catch(\Throwable $exn) {
          $exn = $caml_wrap_exception($exn);
          if ($exn[1] === $Bottom) {$i__0 = $exn[2];return $i__0;}
          throw $runtime->caml_wrap_thrown_exception_reraise($exn);
        }
      };
      $trickleup = function($i, $e) use ($Assert_failure,$a,$caml_call2,$caml_check_bound,$cmp,$dw,$runtime) {
        $i__0 = $i;
        for (;;) {
          $father = ($i__0 + -1 | 0) / 3 | 0;
          if ($i__0 !== $father) {
            if (
              0 <=
                $caml_call2(
                  $cmp,
                  $caml_check_bound($a, $father)[$father + 1],
                  $e
                )
            ) {return $caml_check_bound($a, $i__0)[$i__0 + 1] = $e;}
            $dO = $caml_check_bound($a, $father)[$father + 1];
            $caml_check_bound($a, $i__0)[$i__0 + 1] = $dO;
            if (0 < $father) {$i__0 = $father;continue;}
            return $caml_check_bound($a, 0)[1] = $e;
          }
          throw $runtime->caml_wrap_thrown_exception(
                  V(0, $Assert_failure, $dw)
                );
        }
      };
      $l = $a->length - 1;
      $dI = (($l + 1 | 0) / 3 | 0) + -1 | 0;
      if (! ($dI < 0)) {
        $i__0 = $dI;
        for (;;) {
          $trickle($l, $i__0, $caml_check_bound($a, $i__0)[$i__0 + 1]);
          $dN = $i__0 + -1 | 0;
          if (0 !== $i__0) {$i__0 = $dN;continue;}
          break;
        }
      }
      $dJ = $l + -1 | 0;
      if (! ($dJ < 2)) {
        $i = $dJ;
        for (;;) {
          $e__0 = $caml_check_bound($a, $i)[$i + 1];
          $a[$i + 1] = $caml_check_bound($a, 0)[1];
          $trickleup($bubble($i, 0), $e__0);
          $dM = $i + -1 | 0;
          if (2 !== $i) {$i = $dM;continue;}
          break;
        }
      }
      $dK = 1 < $l ? 1 : (0);
      if ($dK) {
        $e = $caml_check_bound($a, 1)[2];
        $a[2] = $caml_check_bound($a, 0)[1];
        $dL = $a[1] = $e;
      }
      else {$dL = $dK;}
      return $dL;
    };
    $stable_sort = function($cmp, $a) use ($blit,$caml_call2,$caml_check_bound,$caml_make_vect) {
      $sortto = new Ref();
      $merge = function
      ($src1ofs, $src1len, $src2, $src2ofs, $src2len, $dst, $dstofs) use ($a,$blit,$caml_call2,$caml_check_bound,$cmp) {
        $src1r = $src1ofs + $src1len | 0;
        $src2r = $src2ofs + $src2len | 0;
        $loop = function($i1, $s1, $i2, $s2, $d) use ($a,$blit,$caml_call2,$caml_check_bound,$cmp,$dst,$src1r,$src2,$src2r) {
          $i1__0 = $i1;
          $s1__0 = $s1;
          $i2__0 = $i2;
          $s2__0 = $s2;
          $d__0 = $d;
          for (;;) {
            if (0 < $caml_call2($cmp, $s1__0, $s2__0)) {
              $caml_check_bound($dst, $d__0)[$d__0 + 1] = $s2__0;
              $i2__1 = $i2__0 + 1 | 0;
              if ($i2__1 < $src2r) {
                $d__1 = $d__0 + 1 | 0;
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
                $d__0 + 1 |
                  0,
                $src1r - $i1__0 | 0
              );
            }
            $caml_check_bound($dst, $d__0)[$d__0 + 1] = $s1__0;
            $i1__1 = $i1__0 + 1 | 0;
            if ($i1__1 < $src1r) {
              $d__2 = $d__0 + 1 | 0;
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
              $d__0 + 1 |
                0,
              $src2r - $i2__0 | 0
            );
          }
        };
        $dH = $caml_check_bound($src2, $src2ofs)[$src2ofs + 1];
        return $loop(
          $src1ofs,
          $caml_check_bound($a, $src1ofs)[$src1ofs + 1],
          $src2ofs,
          $dH,
          $dstofs
        );
      };
      $isortto = function($srcofs, $dst, $dstofs, $len) use ($a,$caml_call2,$caml_check_bound,$cmp) {
        $dz = $len + -1 | 0;
        $dy = 0;
        if (! ($dz < 0)) {
          $i = $dy;
          for (;;) {
            $dA = $srcofs + $i | 0;
            $e = $caml_check_bound($a, $dA)[$dA + 1];
            $j = V(0, ($dstofs + $i | 0) + -1 | 0);
            for (;;) {
              if ($dstofs <= $j[1]) {
                $dB = $j[1];
                if (
                  0 <
                    $caml_call2($cmp, $caml_check_bound($dst, $dB)[$dB + 1], $e)
                ) {
                  $dC = $j[1];
                  $dD = $caml_check_bound($dst, $dC)[$dC + 1];
                  $dE = $j[1] + 1 | 0;
                  $caml_check_bound($dst, $dE)[$dE + 1] = $dD;
                  $j[1] += -1;
                  continue;
                }
              }
              $dF = $j[1] + 1 | 0;
              $caml_check_bound($dst, $dF)[$dF + 1] = $e;
              $dG = $i + 1 | 0;
              if ($dz !== $i) {$i = $dG;goto a_continue;}
              break;
            }
            break;
            a_continue:;
            
          }
          a_break:
        }
        return 0;
      };
      $_ = $sortto->contents =
        function($srcofs, $dst, $dstofs, $len) use ($a,$isortto,$merge,$sortto) {
          if ($len <= 5) {return $isortto($srcofs, $dst, $dstofs, $len);}
          $l1 = $len / 2 | 0;
          $l2 = $len - $l1 | 0;
          $sortto->contents($srcofs + $l1 | 0, $dst, $dstofs + $l1 | 0, $l2);
          $sortto->contents($srcofs, $a, $srcofs + $l2 | 0, $l1);
          return $merge(
            $srcofs + $l2 | 0,
            $l1,
            $dst,
            $dstofs + $l1 | 0,
            $l2,
            $dst,
            $dstofs
          );
        };
      $l = $a->length - 1;
      if ($l <= 5) {return $isortto(0, $a, 0, $l);}
      $l1 = $l / 2 | 0;
      $l2 = $l - $l1 | 0;
      $t = $caml_make_vect($l2, $caml_check_bound($a, 0)[1]);
      $sortto->contents($l1, $t, 0, $l2);
      $sortto->contents(0, $a, $l2, $l1);
      return $merge($l2, $l1, $t, 0, $l2, $a, 0);
    };
    $Array = V(
      0,
      $make_float,
      $init,
      $make_matrix,
      $make_matrix,
      $append,
      function($dx) use ($runtime) {return $runtime->caml_array_concat($dx);},
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
    );
    
    $runtime->caml_register_global(10, $Array, "Array_");

  }
}