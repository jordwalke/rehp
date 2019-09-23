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
    $caml_blit_bytes = $runtime["caml_blit_bytes"];
    $caml_bytes_unsafe_get = $runtime["caml_bytes_unsafe_get"];
    $caml_bytes_unsafe_set = $runtime["caml_bytes_unsafe_set"];
    $call1 = $runtime["caml_call1"];
    $call2 = $runtime["caml_call2"];
    $caml_create_bytes = $runtime["caml_create_bytes"];
    $caml_fill_bytes = $runtime["caml_fill_bytes"];
    $caml_ml_bytes_length = $runtime["caml_ml_bytes_length"];
    $string = $runtime["caml_new_string"];
    $caml_wrap_exception = $runtime["caml_wrap_exception"];
    $unsigned_right_shift_32 = $runtime["unsigned_right_shift_32"];
    $global_data = $runtime["caml_get_global_data"]();
    $cst_String_rcontains_from_Bytes_rcontains_from = $string(
      "String.rcontains_from / Bytes.rcontains_from"
    );
    $cst_String_contains_from_Bytes_contains_from = $string(
      "String.contains_from / Bytes.contains_from"
    );
    $cst_String_rindex_from_opt_Bytes_rindex_from_opt = $string(
      "String.rindex_from_opt / Bytes.rindex_from_opt"
    );
    $cst_String_rindex_from_Bytes_rindex_from = $string(
      "String.rindex_from / Bytes.rindex_from"
    );
    $cst_String_index_from_opt_Bytes_index_from_opt = $string(
      "String.index_from_opt / Bytes.index_from_opt"
    );
    $cst_String_index_from_Bytes_index_from = $string(
      "String.index_from / Bytes.index_from"
    );
    $cst_Bytes_concat = $string("Bytes.concat");
    $cst_String_blit_Bytes_blit_string = $string(
      "String.blit / Bytes.blit_string"
    );
    $cst_Bytes_blit = $string("Bytes.blit");
    $cst_String_fill_Bytes_fill = $string("String.fill / Bytes.fill");
    $cst_Bytes_extend = $string("Bytes.extend");
    $cst_String_sub_Bytes_sub = $string("String.sub / Bytes.sub");
    $Not_found = $global_data["Not_found"];
    $Char = $global_data["Char"];
    $Pervasives = $global_data["Pervasives"];
    $make = function(dynamic $n, dynamic $c) use ($caml_create_bytes,$caml_fill_bytes) {
      $s = $caml_create_bytes($n);
      $caml_fill_bytes($s, 0, $n, $c);
      return $s;
    };
    $init = function(dynamic $n, dynamic $f) use ($call1,$caml_bytes_unsafe_set,$caml_create_bytes) {
      $s = $caml_create_bytes($n);
      $N = (int) ($n + -1);
      $M = 0;
      if (! ($N < 0)) {
        $i = $M;
        for (;;) {
          $caml_bytes_unsafe_set($s, $i, $call1($f, $i));
          $O = (int) ($i + 1);
          if ($N !== $i) {$i = $O;continue;}
          break;
        }
      }
      return $s;
    };
    $empty = $caml_create_bytes(0);
    $copy = function(dynamic $s) use ($caml_blit_bytes,$caml_create_bytes,$caml_ml_bytes_length) {
      $len = $caml_ml_bytes_length($s);
      $r = $caml_create_bytes($len);
      $caml_blit_bytes($s, 0, $r, 0, $len);
      return $r;
    };
    $to_string = function(dynamic $b) use ($copy) {return $copy($b);};
    $of_string = function(dynamic $s) use ($copy) {return $copy($s);};
    $sub = function(dynamic $s, dynamic $ofs, dynamic $len) use ($Pervasives,$call1,$caml_blit_bytes,$caml_create_bytes,$caml_ml_bytes_length,$cst_String_sub_Bytes_sub) {
      if (0 <= $ofs) {
        if (0 <= $len) {
          if (! ((int) ($caml_ml_bytes_length($s) - $len) < $ofs)) {
            $r = $caml_create_bytes($len);
            $caml_blit_bytes($s, $ofs, $r, 0, $len);
            return $r;
          }
        }
      }
      return $call1($Pervasives[1], $cst_String_sub_Bytes_sub);
    };
    $sub_string = function(dynamic $b, dynamic $ofs, dynamic $len) use ($sub) {return $sub($b, $ofs, $len);
    };
    $symbol = function(dynamic $a, dynamic $b) use ($Pervasives,$call1,$cst_Bytes_extend) {
      $c = (int) ($a + $b);
      $L = $b < 0 ? 1 : (0);
      $match = $c < 0 ? 1 : (0);
      $switch__0 = 0 === ($a < 0 ? 1 : (0))
        ? 0 === $L ? 0 === $match ? 0 : (1) : (0)
        : (0 === $L ? 0 : (0 === $match ? 1 : (0)));
      return $switch__0 ? $call1($Pervasives[1], $cst_Bytes_extend) : ($c);
    };
    $extend = function(dynamic $s, dynamic $left, dynamic $right) use ($Pervasives,$call2,$caml_blit_bytes,$caml_create_bytes,$caml_ml_bytes_length,$symbol) {
      $len = $symbol($symbol($caml_ml_bytes_length($s), $left), $right);
      $r = $caml_create_bytes($len);
      if (0 <= $left) {
        $srcoff = 0;
        $srcoff__0 = $srcoff;
        $dstoff = $left;
      }
      else {$J = 0;$K = (int) - $left;$srcoff__0 = $K;$dstoff = $J;}
      $cpylen = $call2(
        $Pervasives[4],
        (int)
        ($caml_ml_bytes_length($s) - $srcoff__0),
        (int)
        ($len - $dstoff)
      );
      if (0 < $cpylen) {
        $caml_blit_bytes($s, $srcoff__0, $r, $dstoff, $cpylen);
      }
      return $r;
    };
    $fill = function(dynamic $s, dynamic $ofs, dynamic $len, dynamic $c) use ($Pervasives,$call1,$caml_fill_bytes,$caml_ml_bytes_length,$cst_String_fill_Bytes_fill) {
      if (0 <= $ofs) {
        if (0 <= $len) {
          if (! ((int) ($caml_ml_bytes_length($s) - $len) < $ofs)) {return $caml_fill_bytes($s, $ofs, $len, $c);}
        }
      }
      return $call1($Pervasives[1], $cst_String_fill_Bytes_fill);
    };
    $blit = function
    (dynamic $s1, dynamic $ofs1, dynamic $s2, dynamic $ofs2, dynamic $len) use ($Pervasives,$call1,$caml_blit_bytes,$caml_ml_bytes_length,$cst_Bytes_blit) {
      if (0 <= $len) {
        if (0 <= $ofs1) {
          if (! ((int) ($caml_ml_bytes_length($s1) - $len) < $ofs1)) {
            if (0 <= $ofs2) {
              if (! ((int) ($caml_ml_bytes_length($s2) - $len) < $ofs2)) {return $caml_blit_bytes($s1, $ofs1, $s2, $ofs2, $len);}
            }
          }
        }
      }
      return $call1($Pervasives[1], $cst_Bytes_blit);
    };
    $blit_string = function
    (dynamic $s1, dynamic $ofs1, dynamic $s2, dynamic $ofs2, dynamic $len) use ($Pervasives,$call1,$caml_ml_bytes_length,$cst_String_blit_Bytes_blit_string,$runtime) {
      if (0 <= $len) {
        if (0 <= $ofs1) {
          if (
            !
            ((int) ($runtime["caml_ml_string_length"]($s1) - $len) < $ofs1)
          ) {
            if (0 <= $ofs2) {
              if (! ((int) ($caml_ml_bytes_length($s2) - $len) < $ofs2)) {
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
      return $call1($Pervasives[1], $cst_String_blit_Bytes_blit_string);
    };
    $iter = function(dynamic $f, dynamic $a) use ($call1,$caml_bytes_unsafe_get,$caml_ml_bytes_length) {
      $H = (int) ($caml_ml_bytes_length($a) + -1);
      $G = 0;
      if (! ($H < 0)) {
        $i = $G;
        for (;;) {
          $call1($f, $caml_bytes_unsafe_get($a, $i));
          $I = (int) ($i + 1);
          if ($H !== $i) {$i = $I;continue;}
          break;
        }
      }
      return 0;
    };
    $iteri = function(dynamic $f, dynamic $a) use ($call2,$caml_bytes_unsafe_get,$caml_ml_bytes_length) {
      $E = (int) ($caml_ml_bytes_length($a) + -1);
      $D = 0;
      if (! ($E < 0)) {
        $i = $D;
        for (;;) {
          $call2($f, $i, $caml_bytes_unsafe_get($a, $i));
          $F = (int) ($i + 1);
          if ($E !== $i) {$i = $F;continue;}
          break;
        }
      }
      return 0;
    };
    $ensure_ge = function(dynamic $x, dynamic $y) use ($Pervasives,$call1,$cst_Bytes_concat) {
      return $y <= $x ? $x : ($call1($Pervasives[1], $cst_Bytes_concat));
    };
    $sum_lengths = function(dynamic $acc, dynamic $seplen, dynamic $param) use ($caml_ml_bytes_length,$ensure_ge) {
      $acc__0 = $acc;
      $param__0 = $param;
      for (;;) {
        if ($param__0) {
          $B = $param__0[2];
          $C = $param__0[1];
          if ($B) {
            $acc__1 = $ensure_ge(
              (int)
              ((int) ($caml_ml_bytes_length($C) + $seplen) + $acc__0),
              $acc__0
            );
            $acc__0 = $acc__1;
            $param__0 = $B;
            continue;
          }
          return (int) ($caml_ml_bytes_length($C) + $acc__0);
        }
        return $acc__0;
      }
    };
    $unsafe_blits = function
    (dynamic $dst, dynamic $pos, dynamic $sep, dynamic $seplen, dynamic $param) use ($caml_blit_bytes,$caml_ml_bytes_length) {
      $pos__0 = $pos;
      $param__0 = $param;
      for (;;) {
        if ($param__0) {
          $z = $param__0[2];
          $A = $param__0[1];
          if ($z) {
            $caml_blit_bytes($A, 0, $dst, $pos__0, $caml_ml_bytes_length($A));
            $caml_blit_bytes(
              $sep,
              0,
              $dst,
              (int)
              ($pos__0 + $caml_ml_bytes_length($A)),
              $seplen
            );
            $pos__1 = (int)
            ((int) ($pos__0 + $caml_ml_bytes_length($A)) + $seplen);
            $pos__0 = $pos__1;
            $param__0 = $z;
            continue;
          }
          $caml_blit_bytes($A, 0, $dst, $pos__0, $caml_ml_bytes_length($A));
          return $dst;
        }
        return $dst;
      }
    };
    $concat = function(dynamic $sep, dynamic $l) use ($caml_create_bytes,$caml_ml_bytes_length,$empty,$sum_lengths,$unsafe_blits) {
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
    $cat = function(dynamic $s1, dynamic $s2) use ($caml_blit_bytes,$caml_create_bytes,$caml_ml_bytes_length) {
      $l1 = $caml_ml_bytes_length($s1);
      $l2 = $caml_ml_bytes_length($s2);
      $r = $caml_create_bytes((int) ($l1 + $l2));
      $caml_blit_bytes($s1, 0, $r, 0, $l1);
      $caml_blit_bytes($s2, 0, $r, $l1, $l2);
      return $r;
    };
    $is_space = function(dynamic $param) use ($unsigned_right_shift_32) {
      $y = (int) ($param + -9);
      $switch__0 = 4 < $unsigned_right_shift_32($y, 0)
        ? 23 === $y ? 1 : (0)
        : (2 === $y ? 0 : (1));
      return $switch__0 ? 1 : (0);
    };
    $trim = function(dynamic $s) use ($caml_bytes_unsafe_get,$caml_ml_bytes_length,$empty,$is_space,$sub) {
      $len = $caml_ml_bytes_length($s);
      $i = Vector{0, 0};
      for (;;) {
        if ($i[1] < $len) {
          if ($is_space($caml_bytes_unsafe_get($s, $i[1]))) {$i[1] += 1;continue;}
        }
        $j = Vector{0, (int) ($len + -1)};
        for (;;) {
          if ($i[1] <= $j[1]) {
            if ($is_space($caml_bytes_unsafe_get($s, $j[1]))) {$j[1] += -1;continue;}
          }
          return $i[1] <= $j[1]
            ? $sub($s, $i[1], (int) ((int) ($j[1] - $i[1]) + 1))
            : ($empty);
        }
        if ($continue_counter > 0) {
          $continue_counter -= 1;
          break;
        }
        else if ($continue_counter === 0) {$continue_counter = null;continue;}
      }
    };
    $escaped = function(dynamic $s) use ($caml_bytes_unsafe_get,$caml_bytes_unsafe_set,$caml_create_bytes,$caml_ml_bytes_length,$copy,$unsigned_right_shift_32) {
      $n = Vector{0, 0};
      $r = (int) ($caml_ml_bytes_length($s) + -1);
      $q = 0;
      if (! ($r < 0)) {
        $i__0 = $q;
        for (;;) {
          $match = $caml_bytes_unsafe_get($s, $i__0);
          if (32 <= $match) {
            $v = (int) ($match + -34);
            if (58 < $unsigned_right_shift_32($v, 0)) {
              if (93 <= $v) {
                $switch__0 = 0;
                $switch__1 = 0;
              }
              else {$switch__1 = 1;}
            }
            else {
              if (56 < $unsigned_right_shift_32((int) ($v + -1), 0)) {$switch__0 = 1;$switch__1 = 0;}
              else {$switch__1 = 1;}
            }
            if ($switch__1) {$w = 1;$switch__0 = 2;}
          }
          else {
            $switch__0 = 11 <= $match
              ? 13 === $match ? 1 : (0)
              : (8 <= $match ? 1 : (0));
          }
          switch($switch__0) {
            // FALLTHROUGH
            case 0:
              $w = 4;
              break;
            // FALLTHROUGH
            case 1:
              $w = 2;
              break;
            }
          $n[1] = (int) ($n[1] + $w);
          $x = (int) ($i__0 + 1);
          if ($r !== $i__0) {$i__0 = $x;continue;}
          break;
        }
      }
      if ($n[1] === $caml_ml_bytes_length($s)) {return $copy($s);}
      $s__0 = $caml_create_bytes($n[1]);
      $n[1] = 0;
      $t = (int) ($caml_ml_bytes_length($s) + -1);
      $s = 0;
      if (! ($t < 0)) {
        $i = $s;
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
              $caml_bytes_unsafe_set(
                $s__0,
                $n[1],
                (int)
                (48 + (int) ($c / 100))
              );
              $n[1] += 1;
              $caml_bytes_unsafe_set(
                $s__0,
                $n[1],
                (int)
                (48 + (int) ((int) ($c / 10) % 10))
              );
              $n[1] += 1;
              $caml_bytes_unsafe_set(
                $s__0,
                $n[1],
                (int)
                (48 + (int) ($c % 10))
              );
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
          $u = (int) ($i + 1);
          if ($t !== $i) {$i = $u;continue;}
          break;
        }
      }
      return $s__0;
    };
    $map = function(dynamic $f, dynamic $s) use ($call1,$caml_bytes_unsafe_get,$caml_bytes_unsafe_set,$caml_create_bytes,$caml_ml_bytes_length) {
      $l = $caml_ml_bytes_length($s);
      if (0 === $l) {return $s;}
      $r = $caml_create_bytes($l);
      $o = (int) ($l + -1);
      $n = 0;
      if (! ($o < 0)) {
        $i = $n;
        for (;;) {
          $caml_bytes_unsafe_set(
            $r,
            $i,
            $call1($f, $caml_bytes_unsafe_get($s, $i))
          );
          $p = (int) ($i + 1);
          if ($o !== $i) {$i = $p;continue;}
          break;
        }
      }
      return $r;
    };
    $mapi = function(dynamic $f, dynamic $s) use ($call2,$caml_bytes_unsafe_get,$caml_bytes_unsafe_set,$caml_create_bytes,$caml_ml_bytes_length) {
      $l = $caml_ml_bytes_length($s);
      if (0 === $l) {return $s;}
      $r = $caml_create_bytes($l);
      $l = (int) ($l + -1);
      $k = 0;
      if (! ($l < 0)) {
        $i = $k;
        for (;;) {
          $caml_bytes_unsafe_set(
            $r,
            $i,
            $call2($f, $i, $caml_bytes_unsafe_get($s, $i))
          );
          $m = (int) ($i + 1);
          if ($l !== $i) {$i = $m;continue;}
          break;
        }
      }
      return $r;
    };
    $uppercase_ascii = function(dynamic $s) use ($Char,$map) {
      return $map($Char[6], $s);
    };
    $lowercase_ascii = function(dynamic $s) use ($Char,$map) {
      return $map($Char[5], $s);
    };
    $apply1 = function(dynamic $f, dynamic $s) use ($call1,$caml_bytes_unsafe_get,$caml_bytes_unsafe_set,$caml_ml_bytes_length,$copy) {
      if (0 === $caml_ml_bytes_length($s)) {return $s;}
      $r = $copy($s);
      $caml_bytes_unsafe_set($r, 0, $call1($f, $caml_bytes_unsafe_get($s, 0)));
      return $r;
    };
    $capitalize_ascii = function(dynamic $s) use ($Char,$apply1) {
      return $apply1($Char[6], $s);
    };
    $uncapitalize_ascii = function(dynamic $s) use ($Char,$apply1) {
      return $apply1($Char[5], $s);
    };
    $index_rec = function(dynamic $s, dynamic $lim, dynamic $i, dynamic $c) use ($Not_found,$caml_bytes_unsafe_get,$runtime) {
      $i__0 = $i;
      for (;;) {
        if ($lim <= $i__0) {
          throw $runtime["caml_wrap_thrown_exception"]($Not_found) as \Throwable;
        }
        if ($caml_bytes_unsafe_get($s, $i__0) === $c) {return $i__0;}
        $i__1 = (int) ($i__0 + 1);
        $i__0 = $i__1;
        continue;
      }
    };
    $index = function(dynamic $s, dynamic $c) use ($caml_ml_bytes_length,$index_rec) {
      return $index_rec($s, $caml_ml_bytes_length($s), 0, $c);
    };
    $index_rec_opt = function
    (dynamic $s, dynamic $lim, dynamic $i, dynamic $c) use ($caml_bytes_unsafe_get) {
      $i__0 = $i;
      for (;;) {
        if ($lim <= $i__0) {return 0;}
        if ($caml_bytes_unsafe_get($s, $i__0) === $c) {return Vector{0, $i__0};}
        $i__1 = (int) ($i__0 + 1);
        $i__0 = $i__1;
        continue;
      }
    };
    $index_opt = function(dynamic $s, dynamic $c) use ($caml_ml_bytes_length,$index_rec_opt) {
      return $index_rec_opt($s, $caml_ml_bytes_length($s), 0, $c);
    };
    $index_from = function(dynamic $s, dynamic $i, dynamic $c) use ($Pervasives,$call1,$caml_ml_bytes_length,$cst_String_index_from_Bytes_index_from,$index_rec) {
      $l = $caml_ml_bytes_length($s);
      if (0 <= $i) {if (! ($l < $i)) {return $index_rec($s, $l, $i, $c);}}
      return $call1($Pervasives[1], $cst_String_index_from_Bytes_index_from);
    };
    $index_from_opt = function(dynamic $s, dynamic $i, dynamic $c) use ($Pervasives,$call1,$caml_ml_bytes_length,$cst_String_index_from_opt_Bytes_index_from_opt,$index_rec_opt) {
      $l = $caml_ml_bytes_length($s);
      if (0 <= $i) {if (! ($l < $i)) {return $index_rec_opt($s, $l, $i, $c);}}
      return $call1(
        $Pervasives[1],
        $cst_String_index_from_opt_Bytes_index_from_opt
      );
    };
    $rindex_rec = function(dynamic $s, dynamic $i, dynamic $c) use ($Not_found,$caml_bytes_unsafe_get,$runtime) {
      $i__0 = $i;
      for (;;) {
        if (0 <= $i__0) {
          if ($caml_bytes_unsafe_get($s, $i__0) === $c) {return $i__0;}
          $i__1 = (int) ($i__0 + -1);
          $i__0 = $i__1;
          continue;
        }
        throw $runtime["caml_wrap_thrown_exception"]($Not_found) as \Throwable;
      }
    };
    $rindex = function(dynamic $s, dynamic $c) use ($caml_ml_bytes_length,$rindex_rec) {
      return $rindex_rec($s, (int) ($caml_ml_bytes_length($s) + -1), $c);
    };
    $rindex_from = function(dynamic $s, dynamic $i, dynamic $c) use ($Pervasives,$call1,$caml_ml_bytes_length,$cst_String_rindex_from_Bytes_rindex_from,$rindex_rec) {
      if (-1 <= $i) {
        if (! ($caml_ml_bytes_length($s) <= $i)) {return $rindex_rec($s, $i, $c);}
      }
      return $call1($Pervasives[1], $cst_String_rindex_from_Bytes_rindex_from);
    };
    $rindex_rec_opt = function(dynamic $s, dynamic $i, dynamic $c) use ($caml_bytes_unsafe_get) {
      $i__0 = $i;
      for (;;) {
        if (0 <= $i__0) {
          if ($caml_bytes_unsafe_get($s, $i__0) === $c) {return Vector{0, $i__0};}
          $i__1 = (int) ($i__0 + -1);
          $i__0 = $i__1;
          continue;
        }
        return 0;
      }
    };
    $rindex_opt = function(dynamic $s, dynamic $c) use ($caml_ml_bytes_length,$rindex_rec_opt) {
      return $rindex_rec_opt($s, (int) ($caml_ml_bytes_length($s) + -1), $c);
    };
    $rindex_from_opt = function(dynamic $s, dynamic $i, dynamic $c) use ($Pervasives,$call1,$caml_ml_bytes_length,$cst_String_rindex_from_opt_Bytes_rindex_from_opt,$rindex_rec_opt) {
      if (-1 <= $i) {
        if (! ($caml_ml_bytes_length($s) <= $i)) {return $rindex_rec_opt($s, $i, $c);}
      }
      return $call1(
        $Pervasives[1],
        $cst_String_rindex_from_opt_Bytes_rindex_from_opt
      );
    };
    $contains_from = function(dynamic $s, dynamic $i, dynamic $c) use ($Not_found,$Pervasives,$call1,$caml_ml_bytes_length,$caml_wrap_exception,$cst_String_contains_from_Bytes_contains_from,$index_rec,$runtime) {
      $l = $caml_ml_bytes_length($s);
      if (0 <= $i) {
        if (! ($l < $i)) {
          try {$index_rec($s, $l, $i, $c);$i = 1;return $i;}
          catch(\Throwable $j) {
            $j = $caml_wrap_exception($j);
            if ($j === $Not_found) {return 0;}
            throw $runtime["caml_wrap_thrown_exception_reraise"]($j) as \Throwable;
          }
        }
      }
      return $call1(
        $Pervasives[1],
        $cst_String_contains_from_Bytes_contains_from
      );
    };
    $contains = function(dynamic $s, dynamic $c) use ($contains_from) {
      return $contains_from($s, 0, $c);
    };
    $rcontains_from = function(dynamic $s, dynamic $i, dynamic $c) use ($Not_found,$Pervasives,$call1,$caml_ml_bytes_length,$caml_wrap_exception,$cst_String_rcontains_from_Bytes_rcontains_from,$rindex_rec,$runtime) {
      if (0 <= $i) {
        if (! ($caml_ml_bytes_length($s) <= $i)) {
          try {$rindex_rec($s, $i, $c);$g = 1;return $g;}
          catch(\Throwable $h) {
            $h = $caml_wrap_exception($h);
            if ($h === $Not_found) {return 0;}
            throw $runtime["caml_wrap_thrown_exception_reraise"]($h) as \Throwable;
          }
        }
      }
      return $call1(
        $Pervasives[1],
        $cst_String_rcontains_from_Bytes_rcontains_from
      );
    };
    $compare = function(dynamic $x, dynamic $y) use ($runtime) {
      return $runtime["caml_bytes_compare"]($x, $y);
    };
    $uppercase = function(dynamic $s) use ($Char,$map) {
      return $map($Char[4], $s);
    };
    $lowercase = function(dynamic $s) use ($Char,$map) {
      return $map($Char[3], $s);
    };
    $capitalize = function(dynamic $s) use ($Char,$apply1) {
      return $apply1($Char[4], $s);
    };
    $uncapitalize = function(dynamic $s) use ($Char,$apply1) {
      return $apply1($Char[3], $s);
    };
    $a = function(dynamic $f) {return $f;};
    $b = function(dynamic $e) {return $e;};
    $Bytes = Vector{
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
      function(dynamic $d, dynamic $c) use ($runtime) {
        return $runtime["caml_bytes_equal"]($d, $c);
      },
      $b,
      $a
    };
    
    $runtime["caml_register_global"](15, $Bytes, "Bytes");

  }
}

/*____hashes compiler:hashing-disabled inputs:hashing-disabled bytecode:hashing-disabled*/
