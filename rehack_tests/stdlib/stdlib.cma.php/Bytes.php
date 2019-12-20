<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class Bytes {
  <<__Override, __Memoize>>
  public static function get() : Vector<dynamic> {
    $joo_global_object = \Rehack\GlobalObject::get() as dynamic;
    
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
    $caml_wrap_thrown_exception = $runtime["caml_wrap_thrown_exception"];
    $caml_wrap_thrown_exception_reraise = $runtime[
       "caml_wrap_thrown_exception_reraise"
     ];
    $unsigned_right_shift_32 = $runtime["unsigned_right_shift_32"];
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
    $Not_found =  Not_found::get ();
    $Char =  Char::get ();
    $Pervasives =  Pervasives::get ();
    $make = (dynamic $n, dynamic $c) ==> {
      $s = $caml_create_bytes($n);
      $caml_fill_bytes($s, 0, $n, $c);
      return $s;
    };
    $init = (dynamic $n, dynamic $f) ==> {
      $s = $caml_create_bytes($n);
      $N_ = (int) ($n + -1);
      $M_ = 0;
      if (! ($N_ < 0)) {
        $i = $M_;
        for (;;) {
          $caml_bytes_unsafe_set($s, $i, $call1($f, $i));
          $O_ = (int) ($i + 1);
          if ($N_ !== $i) {$i = $O_;continue;}
          break;
        }
      }
      return $s;
    };
    $empty = $caml_create_bytes(0);
    $copy = (dynamic $s) ==> {
      $len = $caml_ml_bytes_length($s);
      $r = $caml_create_bytes($len);
      $caml_blit_bytes($s, 0, $r, 0, $len);
      return $r;
    };
    $to_string = (dynamic $b) ==> {return $copy($b);};
    $of_string = (dynamic $s) ==> {return $copy($s);};
    $sub = (dynamic $s, dynamic $ofs, dynamic $len) ==> {
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
    $sub_string = (dynamic $b, dynamic $ofs, dynamic $len) ==> {return $sub($b, $ofs, $len);
    };
    $symbol = (dynamic $a, dynamic $b) ==> {
      $c = (int) ($a + $b);
      $L_ = $b < 0 ? 1 : (0);
      $match = $c < 0 ? 1 : (0);
      $switch__0 = 0 === ($a < 0 ? 1 : (0))
        ? 0 === $L_ ? 0 === $match ? 0 : (1) : (0)
        : (0 === $L_ ? 0 : (0 === $match ? 1 : (0)));
      return $switch__0 ? $call1($Pervasives[1], $cst_Bytes_extend) : ($c);
    };
    $extend = (dynamic $s, dynamic $left, dynamic $right) ==> {
      $len = $symbol($symbol($caml_ml_bytes_length($s), $left), $right);
      $r = $caml_create_bytes($len);
      if (0 <= $left) {
        $srcoff = 0;
        $srcoff__0 = $srcoff;
        $dstoff = $left;
      }
      else {$J_ = 0;$K_ = (int) - $left;$srcoff__0 = $K_;$dstoff = $J_;}
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
    $fill = (dynamic $s, dynamic $ofs, dynamic $len, dynamic $c) ==> {
      if (0 <= $ofs) {
        if (0 <= $len) {
          if (! ((int) ($caml_ml_bytes_length($s) - $len) < $ofs)) {return $caml_fill_bytes($s, $ofs, $len, $c);}
        }
      }
      return $call1($Pervasives[1], $cst_String_fill_Bytes_fill);
    };
    $blit = 
    (dynamic $s1, dynamic $ofs1, dynamic $s2, dynamic $ofs2, dynamic $len) ==> {
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
    $blit_string = 
    (dynamic $s1, dynamic $ofs1, dynamic $s2, dynamic $ofs2, dynamic $len) ==> {
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
    $iter = (dynamic $f, dynamic $a) ==> {
      $H_ = (int) ($caml_ml_bytes_length($a) + -1);
      $G_ = 0;
      if (! ($H_ < 0)) {
        $i = $G_;
        for (;;) {
          $call1($f, $caml_bytes_unsafe_get($a, $i));
          $I_ = (int) ($i + 1);
          if ($H_ !== $i) {$i = $I_;continue;}
          break;
        }
      }
      return 0;
    };
    $iteri = (dynamic $f, dynamic $a) ==> {
      $E_ = (int) ($caml_ml_bytes_length($a) + -1);
      $D_ = 0;
      if (! ($E_ < 0)) {
        $i = $D_;
        for (;;) {
          $call2($f, $i, $caml_bytes_unsafe_get($a, $i));
          $F_ = (int) ($i + 1);
          if ($E_ !== $i) {$i = $F_;continue;}
          break;
        }
      }
      return 0;
    };
    $ensure_ge = (dynamic $x, dynamic $y) ==> {
      return $y <= $x ? $x : ($call1($Pervasives[1], $cst_Bytes_concat));
    };
    $sum_lengths = (dynamic $acc, dynamic $seplen, dynamic $param) ==> {
      $acc__0 = $acc;
      $param__0 = $param;
      for (;;) {
        if ($param__0) {
          $B_ = $param__0[2];
          $C_ = $param__0[1];
          if ($B_) {
            $acc__1 = $ensure_ge(
              (int)
              ((int) ($caml_ml_bytes_length($C_) + $seplen) + $acc__0),
              $acc__0
            );
            $acc__0 = $acc__1;
            $param__0 = $B_;
            continue;
          }
          return (int) ($caml_ml_bytes_length($C_) + $acc__0);
        }
        return $acc__0;
      }
    };
    $unsafe_blits = 
    (dynamic $dst, dynamic $pos, dynamic $sep, dynamic $seplen, dynamic $param) ==> {
      $pos__0 = $pos;
      $param__0 = $param;
      for (;;) {
        if ($param__0) {
          $z_ = $param__0[2];
          $A_ = $param__0[1];
          if ($z_) {
            $caml_blit_bytes($A_, 0, $dst, $pos__0, $caml_ml_bytes_length($A_)
            );
            $caml_blit_bytes(
              $sep,
              0,
              $dst,
              (int)
              ($pos__0 + $caml_ml_bytes_length($A_)),
              $seplen
            );
            $pos__1 = (int)
            ((int) ($pos__0 + $caml_ml_bytes_length($A_)) + $seplen);
            $pos__0 = $pos__1;
            $param__0 = $z_;
            continue;
          }
          $caml_blit_bytes($A_, 0, $dst, $pos__0, $caml_ml_bytes_length($A_));
          return $dst;
        }
        return $dst;
      }
    };
    $concat = (dynamic $sep, dynamic $l) ==> {
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
    $cat = (dynamic $s1, dynamic $s2) ==> {
      $l1 = $caml_ml_bytes_length($s1);
      $l2 = $caml_ml_bytes_length($s2);
      $r = $caml_create_bytes((int) ($l1 + $l2));
      $caml_blit_bytes($s1, 0, $r, 0, $l1);
      $caml_blit_bytes($s2, 0, $r, $l1, $l2);
      return $r;
    };
    $is_space = (dynamic $param) ==> {
      $y_ = (int) ($param + -9);
      $switch__0 = 4 < $unsigned_right_shift_32($y_, 0)
        ? 23 === $y_ ? 1 : (0)
        : (2 === $y_ ? 0 : (1));
      return $switch__0 ? 1 : (0);
    };
    $trim = (dynamic $s) ==> {
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
      }
    };
    $escaped = (dynamic $s) ==> {
      $n = Vector{0, 0};
      $r_ = (int) ($caml_ml_bytes_length($s) + -1);
      $q_ = 0;
      if (! ($r_ < 0)) {
        $i__0 = $q_;
        for (;;) {
          $match = $caml_bytes_unsafe_get($s, $i__0);
          if (32 <= $match) {
            $v_ = (int) ($match + -34);
            if (58 < $unsigned_right_shift_32($v_, 0)) {
              if (93 <= $v_) {
                $switch__0 = 0;
                $switch__1 = 0;
              }
              else {$switch__1 = 1;}
            }
            else {
              if (56 < $unsigned_right_shift_32((int) ($v_ + -1), 0)) {$switch__0 = 1;$switch__1 = 0;}
              else {$switch__1 = 1;}
            }
            if ($switch__1) {$w_ = 1;$switch__0 = 2;}
          }
          else {
            $switch__0 = 11 <= $match
              ? 13 === $match ? 1 : (0)
              : (8 <= $match ? 1 : (0));
          }
          switch($switch__0) {
            // FALLTHROUGH
            case 0:
              $w_ = 4;
              break;
            // FALLTHROUGH
            case 1:
              $w_ = 2;
              break;
            }
          $n[1] = (int) ($n[1] + $w_);
          $x_ = (int) ($i__0 + 1);
          if ($r_ !== $i__0) {$i__0 = $x_;continue;}
          break;
        }
      }
      if ($n[1] === $caml_ml_bytes_length($s)) {return $copy($s);}
      $s__0 = $caml_create_bytes($n[1]);
      $n[1] = 0;
      $t_ = (int) ($caml_ml_bytes_length($s) + -1);
      $s_ = 0;
      if (! ($t_ < 0)) {
        $i = $s_;
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
          $u_ = (int) ($i + 1);
          if ($t_ !== $i) {$i = $u_;continue;}
          break;
        }
      }
      return $s__0;
    };
    $map = (dynamic $f, dynamic $s) ==> {
      $l = $caml_ml_bytes_length($s);
      if (0 === $l) {return $s;}
      $r = $caml_create_bytes($l);
      $o_ = (int) ($l + -1);
      $n_ = 0;
      if (! ($o_ < 0)) {
        $i = $n_;
        for (;;) {
          $caml_bytes_unsafe_set(
            $r,
            $i,
            $call1($f, $caml_bytes_unsafe_get($s, $i))
          );
          $p_ = (int) ($i + 1);
          if ($o_ !== $i) {$i = $p_;continue;}
          break;
        }
      }
      return $r;
    };
    $mapi = (dynamic $f, dynamic $s) ==> {
      $l = $caml_ml_bytes_length($s);
      if (0 === $l) {return $s;}
      $r = $caml_create_bytes($l);
      $l_ = (int) ($l + -1);
      $k_ = 0;
      if (! ($l_ < 0)) {
        $i = $k_;
        for (;;) {
          $caml_bytes_unsafe_set(
            $r,
            $i,
            $call2($f, $i, $caml_bytes_unsafe_get($s, $i))
          );
          $m_ = (int) ($i + 1);
          if ($l_ !== $i) {$i = $m_;continue;}
          break;
        }
      }
      return $r;
    };
    $uppercase_ascii = (dynamic $s) ==> {return $map($Char[6], $s);};
    $lowercase_ascii = (dynamic $s) ==> {return $map($Char[5], $s);};
    $apply1 = (dynamic $f, dynamic $s) ==> {
      if (0 === $caml_ml_bytes_length($s)) {return $s;}
      $r = $copy($s);
      $caml_bytes_unsafe_set($r, 0, $call1($f, $caml_bytes_unsafe_get($s, 0)));
      return $r;
    };
    $capitalize_ascii = (dynamic $s) ==> {return $apply1($Char[6], $s);};
    $uncapitalize_ascii = (dynamic $s) ==> {return $apply1($Char[5], $s);};
    $index_rec = (dynamic $s, dynamic $lim, dynamic $i, dynamic $c) ==> {
      $i__0 = $i;
      for (;;) {
        if ($lim <= $i__0) {
          throw $caml_wrap_thrown_exception($Not_found) as \Throwable;
        }
        if ($caml_bytes_unsafe_get($s, $i__0) === $c) {return $i__0;}
        $i__1 = (int) ($i__0 + 1);
        $i__0 = $i__1;
        continue;
      }
    };
    $index = (dynamic $s, dynamic $c) ==> {
      return $index_rec($s, $caml_ml_bytes_length($s), 0, $c);
    };
    $index_rec_opt = (dynamic $s, dynamic $lim, dynamic $i, dynamic $c) ==> {
      $i__0 = $i;
      for (;;) {
        if ($lim <= $i__0) {return 0;}
        if ($caml_bytes_unsafe_get($s, $i__0) === $c) {return Vector{0, $i__0};}
        $i__1 = (int) ($i__0 + 1);
        $i__0 = $i__1;
        continue;
      }
    };
    $index_opt = (dynamic $s, dynamic $c) ==> {
      return $index_rec_opt($s, $caml_ml_bytes_length($s), 0, $c);
    };
    $index_from = (dynamic $s, dynamic $i, dynamic $c) ==> {
      $l = $caml_ml_bytes_length($s);
      if (0 <= $i) {if (! ($l < $i)) {return $index_rec($s, $l, $i, $c);}}
      return $call1($Pervasives[1], $cst_String_index_from_Bytes_index_from);
    };
    $index_from_opt = (dynamic $s, dynamic $i, dynamic $c) ==> {
      $l = $caml_ml_bytes_length($s);
      if (0 <= $i) {if (! ($l < $i)) {return $index_rec_opt($s, $l, $i, $c);}}
      return $call1(
        $Pervasives[1],
        $cst_String_index_from_opt_Bytes_index_from_opt
      );
    };
    $rindex_rec = (dynamic $s, dynamic $i, dynamic $c) ==> {
      $i__0 = $i;
      for (;;) {
        if (0 <= $i__0) {
          if ($caml_bytes_unsafe_get($s, $i__0) === $c) {return $i__0;}
          $i__1 = (int) ($i__0 + -1);
          $i__0 = $i__1;
          continue;
        }
        throw $caml_wrap_thrown_exception($Not_found) as \Throwable;
      }
    };
    $rindex = (dynamic $s, dynamic $c) ==> {
      return $rindex_rec($s, (int) ($caml_ml_bytes_length($s) + -1), $c);
    };
    $rindex_from = (dynamic $s, dynamic $i, dynamic $c) ==> {
      if (-1 <= $i) {
        if (! ($caml_ml_bytes_length($s) <= $i)) {return $rindex_rec($s, $i, $c);}
      }
      return $call1($Pervasives[1], $cst_String_rindex_from_Bytes_rindex_from);
    };
    $rindex_rec_opt = (dynamic $s, dynamic $i, dynamic $c) ==> {
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
    $rindex_opt = (dynamic $s, dynamic $c) ==> {
      return $rindex_rec_opt($s, (int) ($caml_ml_bytes_length($s) + -1), $c);
    };
    $rindex_from_opt = (dynamic $s, dynamic $i, dynamic $c) ==> {
      if (-1 <= $i) {
        if (! ($caml_ml_bytes_length($s) <= $i)) {return $rindex_rec_opt($s, $i, $c);}
      }
      return $call1(
        $Pervasives[1],
        $cst_String_rindex_from_opt_Bytes_rindex_from_opt
      );
    };
    $contains_from = (dynamic $s, dynamic $i, dynamic $c) ==> {
      $l = $caml_ml_bytes_length($s);
      if (0 <= $i) {
        if (! ($l < $i)) {
          try {$index_rec($s, $l, $i, $c);$i_ = 1;return $i_;}
          catch(\Throwable $j_) {
            $j_ = $runtime["caml_wrap_exception"]($j_);
            if ($j_ === $Not_found) {return 0;}
            throw $caml_wrap_thrown_exception_reraise($j_) as \Throwable;
          }
        }
      }
      return $call1(
        $Pervasives[1],
        $cst_String_contains_from_Bytes_contains_from
      );
    };
    $contains = (dynamic $s, dynamic $c) ==> {
      return $contains_from($s, 0, $c);
    };
    $rcontains_from = (dynamic $s, dynamic $i, dynamic $c) ==> {
      if (0 <= $i) {
        if (! ($caml_ml_bytes_length($s) <= $i)) {
          try {$rindex_rec($s, $i, $c);$g_ = 1;return $g_;}
          catch(\Throwable $h_) {
            $h_ = $runtime["caml_wrap_exception"]($h_);
            if ($h_ === $Not_found) {return 0;}
            throw $caml_wrap_thrown_exception_reraise($h_) as \Throwable;
          }
        }
      }
      return $call1(
        $Pervasives[1],
        $cst_String_rcontains_from_Bytes_rcontains_from
      );
    };
    $compare = (dynamic $x, dynamic $y) ==> {
      return $runtime["caml_bytes_compare"]($x, $y);
    };
    $uppercase = (dynamic $s) ==> {return $map($Char[4], $s);};
    $lowercase = (dynamic $s) ==> {return $map($Char[3], $s);};
    $capitalize = (dynamic $s) ==> {return $apply1($Char[4], $s);};
    $uncapitalize = (dynamic $s) ==> {return $apply1($Char[3], $s);};
    $a_ = (dynamic $f_) ==> {return $f_;};
    $b_ = (dynamic $e_) ==> {return $e_;};
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
      (dynamic $d_, dynamic $c_) ==> {
        return $runtime["caml_bytes_equal"]($d_, $c_);
      },
      $b_,
      $a_
    };
    
     return ($Bytes);

  }
  public static function make(dynamic $n, dynamic $c): dynamic {
    return static::get()[1]($n, $c);
  }
  public static function init(dynamic $n, dynamic $f): dynamic {
    return static::get()[2]($n, $f);
  }
  public static function empty(): dynamic {
    return static::get()[3]();
  }
  public static function copy(dynamic $s): dynamic {
    return static::get()[4]($s);
  }
  public static function of_string(dynamic $s): dynamic {
    return static::get()[5]($s);
  }
  public static function to_string(dynamic $b): dynamic {
    return static::get()[6]($b);
  }
  public static function sub(dynamic $s, dynamic $ofs, dynamic $len): dynamic {
    return static::get()[7]($s, $ofs, $len);
  }
  public static function sub_string(dynamic $b, dynamic $ofs, dynamic $len): dynamic {
    return static::get()[8]($b, $ofs, $len);
  }
  public static function extend(dynamic $s, dynamic $left, dynamic $right): dynamic {
    return static::get()[9]($s, $left, $right);
  }
  public static function fill(dynamic $s, dynamic $ofs, dynamic $len, dynamic $c): dynamic {
    return static::get()[10]($s, $ofs, $len, $c);
  }
  public static function blit(dynamic $s1, dynamic $ofs1, dynamic $s2, dynamic $ofs2, dynamic $len): dynamic {
    return static::get()[11]($s1, $ofs1, $s2, $ofs2, $len);
  }
  public static function blit_string(dynamic $s1, dynamic $ofs1, dynamic $s2, dynamic $ofs2, dynamic $len): dynamic {
    return static::get()[12]($s1, $ofs1, $s2, $ofs2, $len);
  }
  public static function concat(dynamic $sep, dynamic $l): dynamic {
    return static::get()[13]($sep, $l);
  }
  public static function cat(dynamic $s1, dynamic $s2): dynamic {
    return static::get()[14]($s1, $s2);
  }
  public static function iter(dynamic $f, dynamic $a): dynamic {
    return static::get()[15]($f, $a);
  }
  public static function iteri(dynamic $f, dynamic $a): dynamic {
    return static::get()[16]($f, $a);
  }
  public static function map(dynamic $f, dynamic $s): dynamic {
    return static::get()[17]($f, $s);
  }
  public static function mapi(dynamic $f, dynamic $s): dynamic {
    return static::get()[18]($f, $s);
  }
  public static function trim(dynamic $s): dynamic {
    return static::get()[19]($s);
  }
  public static function escaped(dynamic $s): dynamic {
    return static::get()[20]($s);
  }
  public static function index(dynamic $s, dynamic $c): dynamic {
    return static::get()[21]($s, $c);
  }
  public static function index_opt(dynamic $s, dynamic $c): dynamic {
    return static::get()[22]($s, $c);
  }
  public static function rindex(dynamic $s, dynamic $c): dynamic {
    return static::get()[23]($s, $c);
  }
  public static function rindex_opt(dynamic $s, dynamic $c): dynamic {
    return static::get()[24]($s, $c);
  }
  public static function index_from(dynamic $s, dynamic $i, dynamic $c): dynamic {
    return static::get()[25]($s, $i, $c);
  }
  public static function index_from_opt(dynamic $s, dynamic $i, dynamic $c): dynamic {
    return static::get()[26]($s, $i, $c);
  }
  public static function rindex_from(dynamic $s, dynamic $i, dynamic $c): dynamic {
    return static::get()[27]($s, $i, $c);
  }
  public static function rindex_from_opt(dynamic $s, dynamic $i, dynamic $c): dynamic {
    return static::get()[28]($s, $i, $c);
  }
  public static function contains(dynamic $s, dynamic $c): dynamic {
    return static::get()[29]($s, $c);
  }
  public static function contains_from(dynamic $s, dynamic $i, dynamic $c): dynamic {
    return static::get()[30]($s, $i, $c);
  }
  public static function rcontains_from(dynamic $s, dynamic $i, dynamic $c): dynamic {
    return static::get()[31]($s, $i, $c);
  }
  public static function uppercase(dynamic $s): dynamic {
    return static::get()[32]($s);
  }
  public static function lowercase(dynamic $s): dynamic {
    return static::get()[33]($s);
  }
  public static function capitalize(dynamic $s): dynamic {
    return static::get()[34]($s);
  }
  public static function uncapitalize(dynamic $s): dynamic {
    return static::get()[35]($s);
  }
  public static function uppercase_ascii(dynamic $s): dynamic {
    return static::get()[36]($s);
  }
  public static function lowercase_ascii(dynamic $s): dynamic {
    return static::get()[37]($s);
  }
  public static function capitalize_ascii(dynamic $s): dynamic {
    return static::get()[38]($s);
  }
  public static function uncapitalize_ascii(dynamic $s): dynamic {
    return static::get()[39]($s);
  }
  public static function compare(dynamic $x, dynamic $y): dynamic {
    return static::get()[40]($x, $y);
  }

}
/* Hashing disabled */
