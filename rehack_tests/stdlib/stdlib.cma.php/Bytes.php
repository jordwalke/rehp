<?hh
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * Bytes.php
 */

namespace Rehack;

final class Bytes {
  <<__Memoize>>
  public static function get() {
    $global_object = \Rehack\GlobalObject::get();
    $runtime = \Rehack\Runtime::get();
    /*
     * Soon, these will replace the `global_data->ModuleName`
     * pattern in the load() function.
     */
    $Char = Char::get();
    $Pervasives = Pervasives::get();
    $Not_found = Not_found::get();
    Bytes::load($global_object);
    $memoized = $runtime->caml_get_global_data()->Bytes;
    return $memoized;
  }

  /**
   * Performs module load operation. May have side effects.
   */
  private static function load($joo_global_object) {
    

    $runtime = $joo_global_object->jsoo_runtime;
    $unsigned_right_shift_32 = $runtime->unsigned_right_shift_32;
    $caml_arity_test = $runtime->caml_arity_test;
    $caml_blit_bytes = $runtime["caml_blit_bytes"];
    $caml_bytes_unsafe_get = $runtime["caml_bytes_unsafe_get"];
    $caml_bytes_unsafe_set = $runtime["caml_bytes_unsafe_set"];
    $caml_create_bytes = $runtime["caml_create_bytes"];
    $caml_fill_bytes = $runtime["caml_fill_bytes"];
    $caml_ml_bytes_length = $runtime["caml_ml_bytes_length"];
    $caml_new_string = $runtime["caml_new_string"];
    $caml_wrap_exception = $runtime["caml_wrap_exception"];
    $caml_call1 = function($f, $a0) use ($caml_arity_test,$runtime) {
      return $caml_arity_test($f) == 1
        ? $f($a0)
        : ($runtime["caml_call_gen"]($f, varray[$a0]));
    };
    $caml_call2 = function($f, $a0, $a1) use ($caml_arity_test,$runtime) {
      return $caml_arity_test($f) == 2
        ? $f($a0, $a1)
        : ($runtime["caml_call_gen"]($f, varray[$a0,$a1]));
    };
    $global_data = $runtime["caml_get_global_data"]();
    $cst_String_rcontains_from_Bytes_rcontains_from = $caml_new_string(
      "String.rcontains_from / Bytes.rcontains_from"
    );
    $cst_String_contains_from_Bytes_contains_from = $caml_new_string(
      "String.contains_from / Bytes.contains_from"
    );
    $cst_String_rindex_from_opt_Bytes_rindex_from_opt = $caml_new_string(
      "String.rindex_from_opt / Bytes.rindex_from_opt"
    );
    $cst_String_rindex_from_Bytes_rindex_from = $caml_new_string(
      "String.rindex_from / Bytes.rindex_from"
    );
    $cst_String_index_from_opt_Bytes_index_from_opt = $caml_new_string(
      "String.index_from_opt / Bytes.index_from_opt"
    );
    $cst_String_index_from_Bytes_index_from = $caml_new_string(
      "String.index_from / Bytes.index_from"
    );
    $cst_Bytes_concat = $caml_new_string("Bytes.concat");
    $cst_String_blit_Bytes_blit_string = $caml_new_string(
      "String.blit / Bytes.blit_string"
    );
    $cst_Bytes_blit = $caml_new_string("Bytes.blit");
    $cst_String_fill_Bytes_fill = $caml_new_string("String.fill / Bytes.fill");
    $cst_Bytes_extend = $caml_new_string("Bytes.extend");
    $cst_String_sub_Bytes_sub = $caml_new_string("String.sub / Bytes.sub");
    $Not_found = $global_data["Not_found"];
    $Char = $global_data["Char"];
    $Pervasives = $global_data["Pervasives"];
    $make = function($n, $c) use ($caml_create_bytes,$caml_fill_bytes) {
      $s = $caml_create_bytes($n);
      $caml_fill_bytes($s, 0, $n, $c);
      return $s;
    };
    $init = function($n, $f) use ($caml_bytes_unsafe_set,$caml_call1,$caml_create_bytes) {
      $s = $caml_create_bytes($n);
      $bX = $n + -1 | 0;
      $bW = 0;
      if (! ($bX < 0)) {
        $i = $bW;
        for (;;) {
          $caml_bytes_unsafe_set($s, $i, $caml_call1($f, $i));
          $bY = $i + 1 | 0;
          if ($bX !== $i) {$i = $bY;continue;}
          break;
        }
      }
      return $s;
    };
    $empty = $caml_create_bytes(0);
    $copy = function($s) use ($caml_blit_bytes,$caml_create_bytes,$caml_ml_bytes_length) {
      $len = $caml_ml_bytes_length($s);
      $r = $caml_create_bytes($len);
      $caml_blit_bytes($s, 0, $r, 0, $len);
      return $r;
    };
    $to_string = function($b) use ($copy) {return $copy($b);};
    $of_string = function($s) use ($copy) {return $copy($s);};
    $sub = function($s, $ofs, $len) use ($Pervasives,$caml_blit_bytes,$caml_call1,$caml_create_bytes,$caml_ml_bytes_length,$cst_String_sub_Bytes_sub) {
      if (0 <= $ofs) {
        if (0 <= $len) {
          if (! (($caml_ml_bytes_length($s) - $len | 0) < $ofs)) {
            $r = $caml_create_bytes($len);
            $caml_blit_bytes($s, $ofs, $r, 0, $len);
            return $r;
          }
        }
      }
      return $caml_call1($Pervasives[1], $cst_String_sub_Bytes_sub);
    };
    $sub_string = function($b, $ofs, $len) use ($sub) {
      return $sub($b, $ofs, $len);
    };
    $bj = function($a, $b) use ($Pervasives,$caml_call1,$cst_Bytes_extend) {
      $c = $a + $b | 0;
      $bV = $b < 0 ? 1 : (0);
      $match = $c < 0 ? 1 : (0);
      $switch__0 = 0 === ($a < 0 ? 1 : (0))
        ? 0 === $bV ? 0 === $match ? 0 : (1) : (0)
        : (0 === $bV ? 0 : (0 === $match ? 1 : (0)));
      return $switch__0
        ? $caml_call1($Pervasives[1], $cst_Bytes_extend)
        : ($c);
    };
    $extend = function($s, $left, $right) use ($Pervasives,$bj,$caml_blit_bytes,$caml_call2,$caml_create_bytes,$caml_ml_bytes_length) {
      $len = $bj($bj($caml_ml_bytes_length($s), $left), $right);
      $r = $caml_create_bytes($len);
      if (0 <= $left) {
        $srcoff = 0;
        $srcoff__0 = $srcoff;
        $dstoff = $left;
      }
      else {$bT = 0;$bU = - $left | 0;$srcoff__0 = $bU;$dstoff = $bT;}
      $cpylen = $caml_call2(
        $Pervasives[4],
        $caml_ml_bytes_length($s) - $srcoff__0 | 0,
        $len - $dstoff | 0
      );
      if (0 < $cpylen) {
        $caml_blit_bytes($s, $srcoff__0, $r, $dstoff, $cpylen);
      }
      return $r;
    };
    $fill = function($s, $ofs, $len, $c) use ($Pervasives,$caml_call1,$caml_fill_bytes,$caml_ml_bytes_length,$cst_String_fill_Bytes_fill) {
      if (0 <= $ofs) {
        if (0 <= $len) {
          if (! (($caml_ml_bytes_length($s) - $len | 0) < $ofs)) {return $caml_fill_bytes($s, $ofs, $len, $c);}
        }
      }
      return $caml_call1($Pervasives[1], $cst_String_fill_Bytes_fill);
    };
    $blit = function($s1, $ofs1, $s2, $ofs2, $len) use ($Pervasives,$caml_blit_bytes,$caml_call1,$caml_ml_bytes_length,$cst_Bytes_blit) {
      if (0 <= $len) {
        if (0 <= $ofs1) {
          if (! (($caml_ml_bytes_length($s1) - $len | 0) < $ofs1)) {
            if (0 <= $ofs2) {
              if (! (($caml_ml_bytes_length($s2) - $len | 0) < $ofs2)) {return $caml_blit_bytes($s1, $ofs1, $s2, $ofs2, $len);}
            }
          }
        }
      }
      return $caml_call1($Pervasives[1], $cst_Bytes_blit);
    };
    $blit_string = function($s1, $ofs1, $s2, $ofs2, $len) use ($Pervasives,$caml_call1,$caml_ml_bytes_length,$cst_String_blit_Bytes_blit_string,$runtime) {
      if (0 <= $len) {
        if (0 <= $ofs1) {
          if (! (($runtime["caml_ml_string_length"]($s1) - $len | 0) < $ofs1)
          ) {
            if (0 <= $ofs2) {
              if (! (($caml_ml_bytes_length($s2) - $len | 0) < $ofs2)) {
                return $runtime["caml_blit_string"](
                  $s1,
                  $ofs1,
                  $s2,
                  $ofs2,
                  $len
                );
              }
            }
          }
        }
      }
      return $caml_call1($Pervasives[1], $cst_String_blit_Bytes_blit_string);
    };
    $iter = function($f, $a) use ($caml_bytes_unsafe_get,$caml_call1,$caml_ml_bytes_length) {
      $bR = $caml_ml_bytes_length($a) + -1 | 0;
      $bQ = 0;
      if (! ($bR < 0)) {
        $i = $bQ;
        for (;;) {
          $caml_call1($f, $caml_bytes_unsafe_get($a, $i));
          $bS = $i + 1 | 0;
          if ($bR !== $i) {$i = $bS;continue;}
          break;
        }
      }
      return 0;
    };
    $iteri = function($f, $a) use ($caml_bytes_unsafe_get,$caml_call2,$caml_ml_bytes_length) {
      $bO = $caml_ml_bytes_length($a) + -1 | 0;
      $bN = 0;
      if (! ($bO < 0)) {
        $i = $bN;
        for (;;) {
          $caml_call2($f, $i, $caml_bytes_unsafe_get($a, $i));
          $bP = $i + 1 | 0;
          if ($bO !== $i) {$i = $bP;continue;}
          break;
        }
      }
      return 0;
    };
    $ensure_ge = function($x, $y) use ($Pervasives,$caml_call1,$cst_Bytes_concat) {
      return $y <= $x ? $x : ($caml_call1($Pervasives[1], $cst_Bytes_concat));
    };
    $sum_lengths = function($acc, $seplen, $param) use ($caml_ml_bytes_length,$ensure_ge) {
      $acc__0 = $acc;
      $param__0 = $param;
      for (;;) {
        if ($param__0) {
          $bL = $param__0[2];
          $bM = $param__0[1];
          if ($bL) {
            $acc__1 = $ensure_ge(
              ($caml_ml_bytes_length($bM) + $seplen | 0) + $acc__0 | 0,
              $acc__0
            );
            $acc__0 = $acc__1;
            $param__0 = $bL;
            continue;
          }
          return $caml_ml_bytes_length($bM) + $acc__0 | 0;
        }
        return $acc__0;
      }
    };
    $unsafe_blits = function($dst, $pos, $sep, $seplen, $param) use ($caml_blit_bytes,$caml_ml_bytes_length) {
      $pos__0 = $pos;
      $param__0 = $param;
      for (;;) {
        if ($param__0) {
          $bJ = $param__0[2];
          $bK = $param__0[1];
          if ($bJ) {
            $caml_blit_bytes($bK, 0, $dst, $pos__0, $caml_ml_bytes_length($bK)
            );
            $caml_blit_bytes(
              $sep,
              0,
              $dst,
              $pos__0 + $caml_ml_bytes_length($bK) | 0,
              $seplen
            );
            $pos__1 = ($pos__0 + $caml_ml_bytes_length($bK) | 0) + $seplen | 0;
            $pos__0 = $pos__1;
            $param__0 = $bJ;
            continue;
          }
          $caml_blit_bytes($bK, 0, $dst, $pos__0, $caml_ml_bytes_length($bK));
          return $dst;
        }
        return $dst;
      }
    };
    $concat = function($sep, $l) use ($caml_create_bytes,$caml_ml_bytes_length,$empty,$sum_lengths,$unsafe_blits) {
      if ($l) {
        $seplen = $caml_ml_bytes_length($sep);
        return $unsafe_blits(
          $caml_create_bytes($sum_lengths(0, $seplen, $l)),
          0,
          $sep,
          $seplen,
          $l
        );
      }
      return $empty;
    };
    $cat = function($s1, $s2) use ($caml_blit_bytes,$caml_create_bytes,$caml_ml_bytes_length) {
      $l1 = $caml_ml_bytes_length($s1);
      $l2 = $caml_ml_bytes_length($s2);
      $r = $caml_create_bytes($l1 + $l2 | 0);
      $caml_blit_bytes($s1, 0, $r, 0, $l1);
      $caml_blit_bytes($s2, 0, $r, $l1, $l2);
      return $r;
    };
    $is_space = function($param) use ($unsigned_right_shift_32) {
      $bI = $param + -9 | 0;
      $switch__0 = 4 < $unsigned_right_shift_32($bI, 0)
        ? 23 === $bI ? 1 : (0)
        : (2 === $bI ? 0 : (1));
      return $switch__0 ? 1 : (0);
    };
    $trim = function($s) use ($caml_bytes_unsafe_get,$caml_ml_bytes_length,$empty,$is_space,$sub) {
      $len = $caml_ml_bytes_length($s);
      $i = V(0, 0);
      for (;;) {
        if ($i[1] < $len) {
          if ($is_space($caml_bytes_unsafe_get($s, $i[1]))) {$i[1] += 1;continue;}
        }
        $j = V(0, $len + -1 | 0);
        for (;;) {
          if ($i[1] <= $j[1]) {
            if ($is_space($caml_bytes_unsafe_get($s, $j[1]))) {$j[1] += -1;continue;}
          }
          return $i[1] <= $j[1]
            ? $sub($s, $i[1], ($j[1] - $i[1] | 0) + 1 | 0)
            : ($empty);
        }
      }
    };
    $escaped = function($s) use ($caml_bytes_unsafe_get,$caml_bytes_unsafe_set,$caml_create_bytes,$caml_ml_bytes_length,$copy,$unsigned_right_shift_32) {
      $n = V(0, 0);
      $bB = $caml_ml_bytes_length($s) + -1 | 0;
      $bA = 0;
      if (! ($bB < 0)) {
        $i__0 = $bA;
        for (;;) {
          $match = $caml_bytes_unsafe_get($s, $i__0);
          if (32 <= $match) {
            $bF = $match + -34 | 0;
            if (58 < $unsigned_right_shift_32($bF, 0)) {
              if (93 <= $bF) {
                $switch__0 = 0;
                $switch__1 = 0;
              }
              else {$switch__1 = 1;}
            }
            else {
              if (56 < $unsigned_right_shift_32($bF + -1 | 0, 0)) {$switch__0 = 1;$switch__1 = 0;}
              else {$switch__1 = 1;}
            }
            if ($switch__1) {$bG = 1;$switch__0 = 2;}
          }
          else {
            $switch__0 = 11 <= $match
              ? 13 === $match ? 1 : (0)
              : (8 <= $match ? 1 : (0));
          }
          switch($switch__0) {
            // FALLTHROUGH
            case 0:
              $bG = 4;
              break;
            // FALLTHROUGH
            case 1:
              $bG = 2;
              break;
            }
          $n[1] = $n[1] + $bG | 0;
          $bH = $i__0 + 1 | 0;
          if ($bB !== $i__0) {$i__0 = $bH;continue;}
          break;
        }
      }
      if ($n[1] === $caml_ml_bytes_length($s)) {return $copy($s);}
      $s__0 = $caml_create_bytes($n[1]);
      $n[1] = 0;
      $bD = $caml_ml_bytes_length($s) + -1 | 0;
      $bC = 0;
      if (! ($bD < 0)) {
        $i = $bC;
        for (;;) {
          $c = $caml_bytes_unsafe_get($s, $i);
          if (35 <= $c) {
            $switch__2 = 92 === $c ? 1 : (127 <= $c ? 0 : (2));
          }
          else {
            if (32 <= $c) {
              $switch__2 = 34 <= $c ? 1 : (2);
            }
            else {
              if (14 <= $c) {
                $switch__2 = 0;
              }
              else {
                switch($c) {
                  // FALLTHROUGH
                  case 8:
                    $caml_bytes_unsafe_set($s__0, $n[1], 92);
                    $n[1] += 1;
                    $caml_bytes_unsafe_set($s__0, $n[1], 98);
                    $switch__2 = 3;
                    break;
                  // FALLTHROUGH
                  case 9:
                    $caml_bytes_unsafe_set($s__0, $n[1], 92);
                    $n[1] += 1;
                    $caml_bytes_unsafe_set($s__0, $n[1], 116);
                    $switch__2 = 3;
                    break;
                  // FALLTHROUGH
                  case 10:
                    $caml_bytes_unsafe_set($s__0, $n[1], 92);
                    $n[1] += 1;
                    $caml_bytes_unsafe_set($s__0, $n[1], 110);
                    $switch__2 = 3;
                    break;
                  // FALLTHROUGH
                  case 13:
                    $caml_bytes_unsafe_set($s__0, $n[1], 92);
                    $n[1] += 1;
                    $caml_bytes_unsafe_set($s__0, $n[1], 114);
                    $switch__2 = 3;
                    break;
                  // FALLTHROUGH
                  default:
                    $switch__2 = 0;
                  }
              }
            }
          }
          switch($switch__2) {
            // FALLTHROUGH
            case 0:
              $caml_bytes_unsafe_set($s__0, $n[1], 92);
              $n[1] += 1;
              $caml_bytes_unsafe_set($s__0, $n[1], 48 + ($c / 100 | 0) | 0);
              $n[1] += 1;
              $caml_bytes_unsafe_set(
                $s__0,
                $n[1],
                48 + (($c / 10 | 0) % 10 | 0) | 0
              );
              $n[1] += 1;
              $caml_bytes_unsafe_set($s__0, $n[1], 48 + ($c % 10 | 0) | 0);
              break;
            // FALLTHROUGH
            case 1:
              $caml_bytes_unsafe_set($s__0, $n[1], 92);
              $n[1] += 1;
              $caml_bytes_unsafe_set($s__0, $n[1], $c);
              break;
            // FALLTHROUGH
            case 2:
              $caml_bytes_unsafe_set($s__0, $n[1], $c);
              break;
            }
          $n[1] += 1;
          $bE = $i + 1 | 0;
          if ($bD !== $i) {$i = $bE;continue;}
          break;
        }
      }
      return $s__0;
    };
    $map = function($f, $s) use ($caml_bytes_unsafe_get,$caml_bytes_unsafe_set,$caml_call1,$caml_create_bytes,$caml_ml_bytes_length) {
      $l = $caml_ml_bytes_length($s);
      if (0 === $l) {return $s;}
      $r = $caml_create_bytes($l);
      $by = $l + -1 | 0;
      $bx = 0;
      if (! ($by < 0)) {
        $i = $bx;
        for (;;) {
          $caml_bytes_unsafe_set(
            $r,
            $i,
            $caml_call1($f, $caml_bytes_unsafe_get($s, $i))
          );
          $bz = $i + 1 | 0;
          if ($by !== $i) {$i = $bz;continue;}
          break;
        }
      }
      return $r;
    };
    $mapi = function($f, $s) use ($caml_bytes_unsafe_get,$caml_bytes_unsafe_set,$caml_call2,$caml_create_bytes,$caml_ml_bytes_length) {
      $l = $caml_ml_bytes_length($s);
      if (0 === $l) {return $s;}
      $r = $caml_create_bytes($l);
      $bv = $l + -1 | 0;
      $bu = 0;
      if (! ($bv < 0)) {
        $i = $bu;
        for (;;) {
          $caml_bytes_unsafe_set(
            $r,
            $i,
            $caml_call2($f, $i, $caml_bytes_unsafe_get($s, $i))
          );
          $bw = $i + 1 | 0;
          if ($bv !== $i) {$i = $bw;continue;}
          break;
        }
      }
      return $r;
    };
    $uppercase_ascii = function($s) use ($Char,$map) {
      return $map($Char[6], $s);
    };
    $lowercase_ascii = function($s) use ($Char,$map) {
      return $map($Char[5], $s);
    };
    $apply1 = function($f, $s) use ($caml_bytes_unsafe_get,$caml_bytes_unsafe_set,$caml_call1,$caml_ml_bytes_length,$copy) {
      if (0 === $caml_ml_bytes_length($s)) {return $s;}
      $r = $copy($s);
      $caml_bytes_unsafe_set(
        $r,
        0,
        $caml_call1($f, $caml_bytes_unsafe_get($s, 0))
      );
      return $r;
    };
    $capitalize_ascii = function($s) use ($Char,$apply1) {
      return $apply1($Char[6], $s);
    };
    $uncapitalize_ascii = function($s) use ($Char,$apply1) {
      return $apply1($Char[5], $s);
    };
    $index_rec = function($s, $lim, $i, $c) use ($Not_found,$caml_bytes_unsafe_get,$runtime) {
      $i__0 = $i;
      for (;;) {
        if ($lim <= $i__0) {
          throw $runtime["caml_wrap_thrown_exception"]($Not_found);
        }
        if ($caml_bytes_unsafe_get($s, $i__0) === $c) {return $i__0;}
        $i__1 = $i__0 + 1 | 0;
        $i__0 = $i__1;
        continue;
      }
    };
    $index = function($s, $c) use ($caml_ml_bytes_length,$index_rec) {
      return $index_rec($s, $caml_ml_bytes_length($s), 0, $c);
    };
    $index_rec_opt = function($s, $lim, $i, $c) use ($caml_bytes_unsafe_get) {
      $i__0 = $i;
      for (;;) {
        if ($lim <= $i__0) {return 0;}
        if ($caml_bytes_unsafe_get($s, $i__0) === $c) {return V(0, $i__0);}
        $i__1 = $i__0 + 1 | 0;
        $i__0 = $i__1;
        continue;
      }
    };
    $index_opt = function($s, $c) use ($caml_ml_bytes_length,$index_rec_opt) {
      return $index_rec_opt($s, $caml_ml_bytes_length($s), 0, $c);
    };
    $index_from = function($s, $i, $c) use ($Pervasives,$caml_call1,$caml_ml_bytes_length,$cst_String_index_from_Bytes_index_from,$index_rec) {
      $l = $caml_ml_bytes_length($s);
      if (0 <= $i) {if (! ($l < $i)) {return $index_rec($s, $l, $i, $c);}}
      return $caml_call1(
        $Pervasives[1],
        $cst_String_index_from_Bytes_index_from
      );
    };
    $index_from_opt = function($s, $i, $c) use ($Pervasives,$caml_call1,$caml_ml_bytes_length,$cst_String_index_from_opt_Bytes_index_from_opt,$index_rec_opt) {
      $l = $caml_ml_bytes_length($s);
      if (0 <= $i) {if (! ($l < $i)) {return $index_rec_opt($s, $l, $i, $c);}}
      return $caml_call1(
        $Pervasives[1],
        $cst_String_index_from_opt_Bytes_index_from_opt
      );
    };
    $rindex_rec = function($s, $i, $c) use ($Not_found,$caml_bytes_unsafe_get,$runtime) {
      $i__0 = $i;
      for (;;) {
        if (0 <= $i__0) {
          if ($caml_bytes_unsafe_get($s, $i__0) === $c) {return $i__0;}
          $i__1 = $i__0 + -1 | 0;
          $i__0 = $i__1;
          continue;
        }
        throw $runtime["caml_wrap_thrown_exception"]($Not_found);
      }
    };
    $rindex = function($s, $c) use ($caml_ml_bytes_length,$rindex_rec) {
      return $rindex_rec($s, $caml_ml_bytes_length($s) + -1 | 0, $c);
    };
    $rindex_from = function($s, $i, $c) use ($Pervasives,$caml_call1,$caml_ml_bytes_length,$cst_String_rindex_from_Bytes_rindex_from,$rindex_rec) {
      if (-1 <= $i) {
        if (! ($caml_ml_bytes_length($s) <= $i)) {return $rindex_rec($s, $i, $c);}
      }
      return $caml_call1(
        $Pervasives[1],
        $cst_String_rindex_from_Bytes_rindex_from
      );
    };
    $rindex_rec_opt = function($s, $i, $c) use ($caml_bytes_unsafe_get) {
      $i__0 = $i;
      for (;;) {
        if (0 <= $i__0) {
          if ($caml_bytes_unsafe_get($s, $i__0) === $c) {return V(0, $i__0);}
          $i__1 = $i__0 + -1 | 0;
          $i__0 = $i__1;
          continue;
        }
        return 0;
      }
    };
    $rindex_opt = function($s, $c) use ($caml_ml_bytes_length,$rindex_rec_opt) {
      return $rindex_rec_opt($s, $caml_ml_bytes_length($s) + -1 | 0, $c);
    };
    $rindex_from_opt = function($s, $i, $c) use ($Pervasives,$caml_call1,$caml_ml_bytes_length,$cst_String_rindex_from_opt_Bytes_rindex_from_opt,$rindex_rec_opt) {
      if (-1 <= $i) {
        if (! ($caml_ml_bytes_length($s) <= $i)) {return $rindex_rec_opt($s, $i, $c);}
      }
      return $caml_call1(
        $Pervasives[1],
        $cst_String_rindex_from_opt_Bytes_rindex_from_opt
      );
    };
    $contains_from = function($s, $i, $c) use ($Not_found,$Pervasives,$caml_call1,$caml_ml_bytes_length,$caml_wrap_exception,$cst_String_contains_from_Bytes_contains_from,$index_rec,$runtime) {
      $l = $caml_ml_bytes_length($s);
      if (0 <= $i) {
        if (! ($l < $i)) {
          try {$index_rec($s, $l, $i, $c);$bs = 1;return $bs;}
          catch(\Throwable $bt) {
            $bt = $caml_wrap_exception($bt);
            if ($bt === $Not_found) {return 0;}
            throw $runtime["caml_wrap_thrown_exception_reraise"]($bt);
          }
        }
      }
      return $caml_call1(
        $Pervasives[1],
        $cst_String_contains_from_Bytes_contains_from
      );
    };
    $contains = function($s, $c) use ($contains_from) {
      return $contains_from($s, 0, $c);
    };
    $rcontains_from = function($s, $i, $c) use ($Not_found,$Pervasives,$caml_call1,$caml_ml_bytes_length,$caml_wrap_exception,$cst_String_rcontains_from_Bytes_rcontains_from,$rindex_rec,$runtime) {
      if (0 <= $i) {
        if (! ($caml_ml_bytes_length($s) <= $i)) {
          try {$rindex_rec($s, $i, $c);$bq = 1;return $bq;}
          catch(\Throwable $br) {
            $br = $caml_wrap_exception($br);
            if ($br === $Not_found) {return 0;}
            throw $runtime["caml_wrap_thrown_exception_reraise"]($br);
          }
        }
      }
      return $caml_call1(
        $Pervasives[1],
        $cst_String_rcontains_from_Bytes_rcontains_from
      );
    };
    $compare = function($x, $y) use ($runtime) {
      return $runtime["caml_bytes_compare"]($x, $y);
    };
    $uppercase = function($s) use ($Char,$map) {return $map($Char[4], $s);};
    $lowercase = function($s) use ($Char,$map) {return $map($Char[3], $s);};
    $capitalize = function($s) use ($Char,$apply1) {
      return $apply1($Char[4], $s);
    };
    $uncapitalize = function($s) use ($Char,$apply1) {
      return $apply1($Char[3], $s);
    };
    $bk = function($bp) {return $bp;};
    $bl = function($bo) {return $bo;};
    $Bytes = V(
      0,
      $make,
      $init,
      $empty,
      $copy,
      $of_string,
      $to_string,
      $sub,
      $sub_string,
      $extend,
      $fill,
      $blit,
      $blit_string,
      $concat,
      $cat,
      $iter,
      $iteri,
      $map,
      $mapi,
      $trim,
      $escaped,
      $index,
      $index_opt,
      $rindex,
      $rindex_opt,
      $index_from,
      $index_from_opt,
      $rindex_from,
      $rindex_from_opt,
      $contains,
      $contains_from,
      $rcontains_from,
      $uppercase,
      $lowercase,
      $capitalize,
      $uncapitalize,
      $uppercase_ascii,
      $lowercase_ascii,
      $capitalize_ascii,
      $uncapitalize_ascii,
      $compare,
      function($bn, $bm) use ($runtime) {
        return $runtime["caml_bytes_equal"]($bn, $bm);
      },
      $bl,
      $bk
    );
    
    $runtime["caml_register_global"](15, $Bytes, "Bytes");

  }
}