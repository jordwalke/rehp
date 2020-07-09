<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class Stdlib__bytes {
  <<__Override, __Memoize>>
  public static function get() : Vector<dynamic> {
    
    $runtime = (\Rehack\GlobalObject::get() as dynamic)->jsoo_runtime;
    $caml_blit_bytes = $runtime["caml_blit_bytes"];
    $caml_bswap16 = $runtime["caml_bswap16"];
    $caml_bytes_get = $runtime["caml_bytes_get"];
    $caml_bytes_get16 = $runtime["caml_bytes_get16"];
    $caml_bytes_get32 = $runtime["caml_bytes_get32"];
    $caml_bytes_get64 = $runtime["caml_bytes_get64"];
    $caml_bytes_of_string = $runtime["caml_bytes_of_string"];
    $caml_bytes_set = $runtime["caml_bytes_set"];
    $caml_bytes_set16 = $runtime["caml_bytes_set16"];
    $caml_bytes_set32 = $runtime["caml_bytes_set32"];
    $caml_bytes_set64 = $runtime["caml_bytes_set64"];
    $caml_bytes_unsafe_get = $runtime["caml_bytes_unsafe_get"];
    $caml_bytes_unsafe_set = $runtime["caml_bytes_unsafe_set"];
    $call1 = $runtime["caml_call1"];
    $call2 = $runtime["caml_call2"];
    $caml_create_bytes = $runtime["caml_create_bytes"];
    $caml_fill_bytes = $runtime["caml_fill_bytes"];
    $caml_int32_bswap = $runtime["caml_int32_bswap"];
    $caml_int64_bswap = $runtime["caml_int64_bswap"];
    $caml_ml_bytes_length = $runtime["caml_ml_bytes_length"];
    $string = $runtime["caml_new_string"];
    $caml_string_of_bytes = $runtime["caml_string_of_bytes"];
    $caml_wrap_thrown_exception = $runtime["caml_wrap_thrown_exception"];
    $caml_wrap_thrown_exception_reraise = $runtime[
       "caml_wrap_thrown_exception_reraise"
     ];
    $left_shift_32 = $runtime["left_shift_32"];
    $right_shift_32 = $runtime["right_shift_32"];
    $unsigned_right_shift_32 = $runtime["unsigned_right_shift_32"];
    $cst_Bytes_of_seq_cannot_grow_bytes = $string(
      "Bytes.of_seq: cannot grow bytes"
    );
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
    $Stdlib = Stdlib::get();
    $Stdlib_sys = Stdlib__sys::get();
    $Stdlib_seq = Stdlib__seq::get();
    $Stdlib_char = Stdlib__char::get();
    $make = (dynamic $n, dynamic $c) : dynamic ==> {
      $s = $caml_create_bytes($n);
      $caml_fill_bytes($s, 0, $n, $c);
      return $s;
    };
    $init = (dynamic $n, dynamic $f) : dynamic ==> {
      $i = null as dynamic;
      $aN_ = null as dynamic;
      $s = $caml_create_bytes($n);
      $aM_ = (int) ($n + -1) as dynamic;
      $aL_ = 0 as dynamic;
      if (! ($aM_ < 0)) {
        $i = $aL_;
        for (;;) {
          $caml_bytes_unsafe_set($s, $i, $call1($f, $i));
          $aN_ = (int) ($i + 1) as dynamic;
          if ($aM_ !== $i) {$i = $aN_;continue;}
          break;
        }
      }
      return $s;
    };
    $empty = $caml_create_bytes(0);
    $copy = (dynamic $s) : dynamic ==> {
      $len = $caml_ml_bytes_length($s);
      $r = $caml_create_bytes($len);
      $caml_blit_bytes($s, 0, $r, 0, $len);
      return $r;
    };
    $to_string = (dynamic $b) : dynamic ==> {
      return $caml_string_of_bytes($copy($b));
    };
    $of_string = (dynamic $s) : dynamic ==> {
      return $copy($caml_bytes_of_string($s));
    };
    $sub = (dynamic $s, dynamic $ofs, dynamic $len) : dynamic ==> {
      $r = null as dynamic;
      if (0 <= $ofs) {
        if (0 <= $len) {
          if (! ((int) ($caml_ml_bytes_length($s) - $len) < $ofs)) {
            $r = $caml_create_bytes($len);
            $caml_blit_bytes($s, $ofs, $r, 0, $len);
            return $r;
          }
        }
      }
      return $call1($Stdlib[1], $cst_String_sub_Bytes_sub);
    };
    $sub_string = (dynamic $b, dynamic $ofs, dynamic $len) : dynamic ==> {
      return $caml_string_of_bytes($sub($b, $ofs, $len));
    };
    $symbol = (dynamic $a, dynamic $b) : dynamic ==> {
      $c = (int) ($a + $b) as dynamic;
      $aK_ = $b < 0 ? 1 : (0);
      $match = $c < 0 ? 1 : (0);
      $switch__0 = 0 === ($a < 0 ? 1 : (0))
        ? 0 === $aK_ ? 0 === $match ? 0 : (1) : (0)
        : (0 === $aK_ ? 0 : (0 === $match ? 1 : (0)));
      return $switch__0 ? $call1($Stdlib[1], $cst_Bytes_extend) : ($c);
    };
    $extend = (dynamic $s, dynamic $left, dynamic $right) : dynamic ==> {
      $srcoff = null as dynamic;
      $dstoff = null as dynamic;
      $srcoff__0 = null as dynamic;
      $aI_ = null as dynamic;
      $aJ_ = null as dynamic;
      $len = $symbol($symbol($caml_ml_bytes_length($s), $left), $right);
      $r = $caml_create_bytes($len);
      if (0 <= $left) {
        $srcoff = 0 as dynamic;
        $srcoff__0 = $srcoff;
        $dstoff = $left;
      }
      else {
        $aI_ = 0 as dynamic;
        $aJ_ = (int) - $left as dynamic;
        $srcoff__0 = $aJ_;
        $dstoff = $aI_;
      }
      $cpylen = $call2(
        $Stdlib[16],
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
    $fill = (dynamic $s, dynamic $ofs, dynamic $len, dynamic $c) : dynamic ==> {
      if (0 <= $ofs) {
        if (0 <= $len) {
          if (! ((int) ($caml_ml_bytes_length($s) - $len) < $ofs)) {return $caml_fill_bytes($s, $ofs, $len, $c);}
        }
      }
      return $call1($Stdlib[1], $cst_String_fill_Bytes_fill);
    };
    $blit = 
    (dynamic $s1, dynamic $ofs1, dynamic $s2, dynamic $ofs2, dynamic $len) : dynamic ==> {
      if (0 <= $len) {
        if (0 <= $ofs1) {
          if (! ((int) ($caml_ml_bytes_length($s1) - $len) < $ofs1)) {
            if (0 <= $ofs2) {
              if (! ((int) ($caml_ml_bytes_length($s2) - $len) < $ofs2)) {return $caml_blit_bytes($s1, $ofs1, $s2, $ofs2, $len);}
            }
          }
        }
      }
      return $call1($Stdlib[1], $cst_Bytes_blit);
    };
    $blit_string = 
    (dynamic $s1, dynamic $ofs1, dynamic $s2, dynamic $ofs2, dynamic $len) : dynamic ==> {
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
      return $call1($Stdlib[1], $cst_String_blit_Bytes_blit_string);
    };
    $iter = (dynamic $f, dynamic $a) : dynamic ==> {
      $i = null as dynamic;
      $aH_ = null as dynamic;
      $aG_ = (int) ($caml_ml_bytes_length($a) + -1) as dynamic;
      $aF_ = 0 as dynamic;
      if (! ($aG_ < 0)) {
        $i = $aF_;
        for (;;) {
          $call1($f, $caml_bytes_unsafe_get($a, $i));
          $aH_ = (int) ($i + 1) as dynamic;
          if ($aG_ !== $i) {$i = $aH_;continue;}
          break;
        }
      }
      return 0;
    };
    $iteri = (dynamic $f, dynamic $a) : dynamic ==> {
      $i = null as dynamic;
      $aE_ = null as dynamic;
      $aD_ = (int) ($caml_ml_bytes_length($a) + -1) as dynamic;
      $aC_ = 0 as dynamic;
      if (! ($aD_ < 0)) {
        $i = $aC_;
        for (;;) {
          $call2($f, $i, $caml_bytes_unsafe_get($a, $i));
          $aE_ = (int) ($i + 1) as dynamic;
          if ($aD_ !== $i) {$i = $aE_;continue;}
          break;
        }
      }
      return 0;
    };
    $ensure_ge = (dynamic $x, dynamic $y) : dynamic ==> {
      return $y <= $x ? $x : ($call1($Stdlib[1], $cst_Bytes_concat));
    };
    $sum_lengths = (dynamic $acc, dynamic $seplen, dynamic $param) : dynamic ==> {
      $aA_ = null as dynamic;
      $aB_ = null as dynamic;
      $acc__1 = null as dynamic;
      $acc__0 = $acc;
      $param__0 = $param;
      for (;;) {
        if ($param__0) {
          $aA_ = $param__0[2];
          $aB_ = $param__0[1];
          if ($aA_) {
            $acc__1 =
              $ensure_ge(
                (int)
                ((int) ($caml_ml_bytes_length($aB_) + $seplen) + $acc__0),
                $acc__0
              );
            $acc__0 = $acc__1;
            $param__0 = $aA_;
            continue;
          }
          return (int) ($caml_ml_bytes_length($aB_) + $acc__0);
        }
        return $acc__0;
      }
    };
    $unsafe_blits = 
    (dynamic $dst, dynamic $pos, dynamic $sep, dynamic $seplen, dynamic $param) : dynamic ==> {
      $ay_ = null as dynamic;
      $az_ = null as dynamic;
      $pos__1 = null as dynamic;
      $pos__0 = $pos;
      $param__0 = $param;
      for (;;) {
        if ($param__0) {
          $ay_ = $param__0[2];
          $az_ = $param__0[1];
          if ($ay_) {
            $caml_blit_bytes(
              $az_,
              0,
              $dst,
              $pos__0,
              $caml_ml_bytes_length($az_)
            );
            $caml_blit_bytes(
              $sep,
              0,
              $dst,
              (int)
              ($pos__0 + $caml_ml_bytes_length($az_)),
              $seplen
            );
            $pos__1 =
              (int)
              ((int) ($pos__0 + $caml_ml_bytes_length($az_)) + $seplen) as dynamic;
            $pos__0 = $pos__1;
            $param__0 = $ay_;
            continue;
          }
          $caml_blit_bytes($az_, 0, $dst, $pos__0, $caml_ml_bytes_length($az_)
          );
          return $dst;
        }
        return $dst;
      }
    };
    $concat = (dynamic $sep, dynamic $l) : dynamic ==> {
      $seplen = null as dynamic;
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
    $cat = (dynamic $s1, dynamic $s2) : dynamic ==> {
      $l1 = $caml_ml_bytes_length($s1);
      $l2 = $caml_ml_bytes_length($s2);
      $r = $caml_create_bytes((int) ($l1 + $l2));
      $caml_blit_bytes($s1, 0, $r, 0, $l1);
      $caml_blit_bytes($s2, 0, $r, $l1, $l2);
      return $r;
    };
    $is_space = (dynamic $param) : dynamic ==> {
      $ax_ = (int) ($param + -9) as dynamic;
      $switch__0 = 4 < $unsigned_right_shift_32($ax_, 0)
        ? 23 === $ax_ ? 1 : (0)
        : (2 === $ax_ ? 0 : (1));
      return $switch__0 ? 1 : (0);
    };
    $trim = (dynamic $s) : dynamic ==> {
      $j = null as dynamic;
      $len = $caml_ml_bytes_length($s);
      $i = Vector{0, 0} as dynamic;
      for (;;) {
        if ($i[1] < $len) {
          if ($is_space($caml_bytes_unsafe_get($s, $i[1]))) {$i[1] = $i[1] + 1;continue;}
        }
        $j = Vector{0, (int) ($len + -1)} as dynamic;
        for (;;) {
          if ($i[1] <= $j[1]) {
            if ($is_space($caml_bytes_unsafe_get($s, $j[1]))) {$j[1] = $j[1] + -1;continue;}
          }
          return $i[1] <= $j[1]
            ? $sub($s, $i[1], (int) ((int) ($j[1] - $i[1]) + 1))
            : ($empty);
        }
      }
    };
    $escaped = (dynamic $s) : dynamic ==> {
      $i = null as dynamic;
      $c = null as dynamic;
      $at_ = null as dynamic;
      $i__0 = null as dynamic;
      $match = null as dynamic;
      $au_ = null as dynamic;
      $av_ = null as dynamic;
      $aw_ = null as dynamic;
      $switch__0 = null as dynamic;
      $switch__1 = null as dynamic;
      $switch__2 = null as dynamic;
      $n = Vector{0, 0} as dynamic;
      $aq_ = (int) ($caml_ml_bytes_length($s) + -1) as dynamic;
      $ap_ = 0 as dynamic;
      if (! ($aq_ < 0)) {
        $i__0 = $ap_;
        for (;;) {
          $match = $caml_bytes_unsafe_get($s, $i__0);
          if (32 <= $match) {
            $au_ = (int) ($match + -34) as dynamic;
            if (58 < $unsigned_right_shift_32($au_, 0)) {
              if (93 <= $au_) {
                $switch__0 = 0 as dynamic;
                $switch__1 = 0 as dynamic;
              }
              else {$switch__1 = 1 as dynamic;}
            }
            else {
              if (56 < $unsigned_right_shift_32((int) ($au_ + -1), 0)) {$switch__0 = 1 as dynamic;$switch__1 = 0 as dynamic;}
              else {$switch__1 = 1 as dynamic;}
            }
            if ($switch__1) {$av_ = 1 as dynamic;$switch__0 = 2 as dynamic;}
          }
          else {
            $switch__0 =
              11 <= $match ? 13 === $match ? 1 : (0) : (8 <= $match ? 1 : (0));
          }
          switch($switch__0) {
            // FALLTHROUGH
            case 0:
              $av_ = 4 as dynamic;
              break;
            // FALLTHROUGH
            case 1:
              $av_ = 2 as dynamic;
              break;
            }
          $n[1] = (int) ($n[1] + $av_);
          $aw_ = (int) ($i__0 + 1) as dynamic;
          if ($aq_ !== $i__0) {$i__0 = $aw_;continue;}
          break;
        }
      }
      if ($n[1] === $caml_ml_bytes_length($s)) {return $copy($s);}
      $s__0 = $caml_create_bytes($n[1]);
      $n[1] = 0;
      $as_ = (int) ($caml_ml_bytes_length($s) + -1) as dynamic;
      $ar_ = 0 as dynamic;
      if (! ($as_ < 0)) {
        $i = $ar_;
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
                $switch__2 = 0 as dynamic;
              }
              else {
                switch($c) {
                  // FALLTHROUGH
                  case 8:
                    $caml_bytes_unsafe_set($s__0, $n[1], 92);
                    $n[1] = $n[1] + 1;
                    $caml_bytes_unsafe_set($s__0, $n[1], 98);
                    $switch__2 = 3 as dynamic;
                    break;
                  // FALLTHROUGH
                  case 9:
                    $caml_bytes_unsafe_set($s__0, $n[1], 92);
                    $n[1] = $n[1] + 1;
                    $caml_bytes_unsafe_set($s__0, $n[1], 116);
                    $switch__2 = 3 as dynamic;
                    break;
                  // FALLTHROUGH
                  case 10:
                    $caml_bytes_unsafe_set($s__0, $n[1], 92);
                    $n[1] = $n[1] + 1;
                    $caml_bytes_unsafe_set($s__0, $n[1], 110);
                    $switch__2 = 3 as dynamic;
                    break;
                  // FALLTHROUGH
                  case 13:
                    $caml_bytes_unsafe_set($s__0, $n[1], 92);
                    $n[1] = $n[1] + 1;
                    $caml_bytes_unsafe_set($s__0, $n[1], 114);
                    $switch__2 = 3 as dynamic;
                    break;
                  // FALLTHROUGH
                  default:
                    $switch__2 = 0 as dynamic;
                  }
              }
            }
          }
          switch($switch__2) {
            // FALLTHROUGH
            case 0:
              $caml_bytes_unsafe_set($s__0, $n[1], 92);
              $n[1] = $n[1] + 1;
              $caml_bytes_unsafe_set(
                $s__0,
                $n[1],
                (int)
                (48 + (int) ($c / 100))
              );
              $n[1] = $n[1] + 1;
              $caml_bytes_unsafe_set(
                $s__0,
                $n[1],
                (int)
                (48 + (int) ((int) ($c / 10) % 10))
              );
              $n[1] = $n[1] + 1;
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
              $n[1] = $n[1] + 1;
              $caml_bytes_unsafe_set($s__0, $n[1], $c);
              break;
            // FALLTHROUGH
            case 2:
              $caml_bytes_unsafe_set($s__0, $n[1], $c);
              break;
            }
          $n[1] = $n[1] + 1;
          $at_ = (int) ($i + 1) as dynamic;
          if ($as_ !== $i) {$i = $at_;continue;}
          break;
        }
      }
      return $s__0;
    };
    $map = (dynamic $f, dynamic $s) : dynamic ==> {
      $i = null as dynamic;
      $ao_ = null as dynamic;
      $l = $caml_ml_bytes_length($s);
      if (0 === $l) {return $s;}
      $r = $caml_create_bytes($l);
      $an_ = (int) ($l + -1) as dynamic;
      $am_ = 0 as dynamic;
      if (! ($an_ < 0)) {
        $i = $am_;
        for (;;) {
          $caml_bytes_unsafe_set(
            $r,
            $i,
            $call1($f, $caml_bytes_unsafe_get($s, $i))
          );
          $ao_ = (int) ($i + 1) as dynamic;
          if ($an_ !== $i) {$i = $ao_;continue;}
          break;
        }
      }
      return $r;
    };
    $mapi = (dynamic $f, dynamic $s) : dynamic ==> {
      $i = null as dynamic;
      $al_ = null as dynamic;
      $l = $caml_ml_bytes_length($s);
      if (0 === $l) {return $s;}
      $r = $caml_create_bytes($l);
      $ak_ = (int) ($l + -1) as dynamic;
      $aj_ = 0 as dynamic;
      if (! ($ak_ < 0)) {
        $i = $aj_;
        for (;;) {
          $caml_bytes_unsafe_set(
            $r,
            $i,
            $call2($f, $i, $caml_bytes_unsafe_get($s, $i))
          );
          $al_ = (int) ($i + 1) as dynamic;
          if ($ak_ !== $i) {$i = $al_;continue;}
          break;
        }
      }
      return $r;
    };
    $uppercase_ascii = (dynamic $s) : dynamic ==> {
      return $map($Stdlib_char[6], $s);
    };
    $lowercase_ascii = (dynamic $s) : dynamic ==> {
      return $map($Stdlib_char[5], $s);
    };
    $apply1 = (dynamic $f, dynamic $s) : dynamic ==> {
      if (0 === $caml_ml_bytes_length($s)) {return $s;}
      $r = $copy($s);
      $caml_bytes_unsafe_set($r, 0, $call1($f, $caml_bytes_unsafe_get($s, 0)));
      return $r;
    };
    $capitalize_ascii = (dynamic $s) : dynamic ==> {
      return $apply1($Stdlib_char[6], $s);
    };
    $uncapitalize_ascii = (dynamic $s) : dynamic ==> {
      return $apply1($Stdlib_char[5], $s);
    };
    $index_rec = (dynamic $s, dynamic $lim, dynamic $i, dynamic $c) : dynamic ==> {
      $i__1 = null as dynamic;
      $i__0 = $i;
      for (;;) {
        if ($lim <= $i__0) {
          throw $caml_wrap_thrown_exception($Stdlib[8]) as \Throwable;
        }
        if ($caml_bytes_unsafe_get($s, $i__0) === $c) {return $i__0;}
        $i__1 = (int) ($i__0 + 1) as dynamic;
        $i__0 = $i__1;
        continue;
      }
    };
    $index = (dynamic $s, dynamic $c) : dynamic ==> {
      return $index_rec($s, $caml_ml_bytes_length($s), 0, $c);
    };
    $index_rec_opt = (dynamic $s, dynamic $lim, dynamic $i, dynamic $c) : dynamic ==> {
      $i__1 = null as dynamic;
      $i__0 = $i;
      for (;;) {
        if ($lim <= $i__0) {return 0;}
        if ($caml_bytes_unsafe_get($s, $i__0) === $c) {return Vector{0, $i__0};}
        $i__1 = (int) ($i__0 + 1) as dynamic;
        $i__0 = $i__1;
        continue;
      }
    };
    $index_opt = (dynamic $s, dynamic $c) : dynamic ==> {
      return $index_rec_opt($s, $caml_ml_bytes_length($s), 0, $c);
    };
    $index_from = (dynamic $s, dynamic $i, dynamic $c) : dynamic ==> {
      $l = $caml_ml_bytes_length($s);
      if (0 <= $i) {if (! ($l < $i)) {return $index_rec($s, $l, $i, $c);}}
      return $call1($Stdlib[1], $cst_String_index_from_Bytes_index_from);
    };
    $index_from_opt = (dynamic $s, dynamic $i, dynamic $c) : dynamic ==> {
      $l = $caml_ml_bytes_length($s);
      if (0 <= $i) {if (! ($l < $i)) {return $index_rec_opt($s, $l, $i, $c);}}
      return $call1(
        $Stdlib[1],
        $cst_String_index_from_opt_Bytes_index_from_opt
      );
    };
    $rindex_rec = (dynamic $s, dynamic $i, dynamic $c) : dynamic ==> {
      $i__1 = null as dynamic;
      $i__0 = $i;
      for (;;) {
        if (0 <= $i__0) {
          if ($caml_bytes_unsafe_get($s, $i__0) === $c) {return $i__0;}
          $i__1 = (int) ($i__0 + -1) as dynamic;
          $i__0 = $i__1;
          continue;
        }
        throw $caml_wrap_thrown_exception($Stdlib[8]) as \Throwable;
      }
    };
    $rindex = (dynamic $s, dynamic $c) : dynamic ==> {
      return $rindex_rec($s, (int) ($caml_ml_bytes_length($s) + -1), $c);
    };
    $rindex_from = (dynamic $s, dynamic $i, dynamic $c) : dynamic ==> {
      if (-1 <= $i) {
        if (! ($caml_ml_bytes_length($s) <= $i)) {return $rindex_rec($s, $i, $c);}
      }
      return $call1($Stdlib[1], $cst_String_rindex_from_Bytes_rindex_from);
    };
    $rindex_rec_opt = (dynamic $s, dynamic $i, dynamic $c) : dynamic ==> {
      $i__1 = null as dynamic;
      $i__0 = $i;
      for (;;) {
        if (0 <= $i__0) {
          if ($caml_bytes_unsafe_get($s, $i__0) === $c) {return Vector{0, $i__0};}
          $i__1 = (int) ($i__0 + -1) as dynamic;
          $i__0 = $i__1;
          continue;
        }
        return 0;
      }
    };
    $rindex_opt = (dynamic $s, dynamic $c) : dynamic ==> {
      return $rindex_rec_opt($s, (int) ($caml_ml_bytes_length($s) + -1), $c);
    };
    $rindex_from_opt = (dynamic $s, dynamic $i, dynamic $c) : dynamic ==> {
      if (-1 <= $i) {
        if (! ($caml_ml_bytes_length($s) <= $i)) {return $rindex_rec_opt($s, $i, $c);}
      }
      return $call1(
        $Stdlib[1],
        $cst_String_rindex_from_opt_Bytes_rindex_from_opt
      );
    };
    $contains_from = (dynamic $s, dynamic $i, dynamic $c) : dynamic ==> {
      $ah_ = null as dynamic;
      $l = $caml_ml_bytes_length($s);
      if (0 <= $i) {
        if (! ($l < $i)) {
          try {$index_rec($s, $l, $i, $c);$ah_ = 1 as dynamic;return $ah_;}
          catch(\Throwable $ai_) {
            $ai_ = $runtime["caml_wrap_exception"]($ai_);
            if ($ai_ === $Stdlib[8]) {return 0;}
            throw $caml_wrap_thrown_exception_reraise($ai_) as \Throwable;
          }
        }
      }
      return $call1($Stdlib[1], $cst_String_contains_from_Bytes_contains_from);
    };
    $contains = (dynamic $s, dynamic $c) : dynamic ==> {
      return $contains_from($s, 0, $c);
    };
    $rcontains_from = (dynamic $s, dynamic $i, dynamic $c) : dynamic ==> {
      $af_ = null as dynamic;
      if (0 <= $i) {
        if (! ($caml_ml_bytes_length($s) <= $i)) {
          try {$rindex_rec($s, $i, $c);$af_ = 1 as dynamic;return $af_;}
          catch(\Throwable $ag_) {
            $ag_ = $runtime["caml_wrap_exception"]($ag_);
            if ($ag_ === $Stdlib[8]) {return 0;}
            throw $caml_wrap_thrown_exception_reraise($ag_) as \Throwable;
          }
        }
      }
      return $call1(
        $Stdlib[1],
        $cst_String_rcontains_from_Bytes_rcontains_from
      );
    };
    $compare = (dynamic $x, dynamic $y) : dynamic ==> {
      return $runtime["caml_bytes_compare"]($x, $y);
    };
    $uppercase = (dynamic $s) : dynamic ==> {
      return $map($Stdlib_char[4], $s);
    };
    $lowercase = (dynamic $s) : dynamic ==> {
      return $map($Stdlib_char[3], $s);
    };
    $capitalize = (dynamic $s) : dynamic ==> {
      return $apply1($Stdlib_char[4], $s);
    };
    $uncapitalize = (dynamic $s) : dynamic ==> {
      return $apply1($Stdlib_char[3], $s);
    };
    $to_seq = (dynamic $s) : dynamic ==> {
      $aux = new Ref();
      $aux->contents = (dynamic $i, dynamic $param) : dynamic ==> {
        if ($i === $caml_ml_bytes_length($s)) {return 0;}
        $x = $caml_bytes_get($s, $i);
        $ad_ = (int) ($i + 1) as dynamic;
        return Vector{
          0,
          $x,
          (dynamic $ae_) : dynamic ==> {return $aux->contents($ad_, $ae_);}
        };
      };
      $ab_ = 0 as dynamic;
      return (dynamic $ac_) : dynamic ==> {return $aux->contents($ab_, $ac_);};
    };
    $to_seqi = (dynamic $s) : dynamic ==> {
      $aux = new Ref();
      $aux->contents = (dynamic $i, dynamic $param) : dynamic ==> {
        if ($i === $caml_ml_bytes_length($s)) {return 0;}
        $x = $caml_bytes_get($s, $i);
        $Z_ = (int) ($i + 1) as dynamic;
        return Vector{
          0,
          Vector{0, $i, $x},
          (dynamic $aa_) : dynamic ==> {return $aux->contents($Z_, $aa_);}
        };
      };
      $X_ = 0 as dynamic;
      return (dynamic $Y_) : dynamic ==> {return $aux->contents($X_, $Y_);};
    };
    $of_seq = (dynamic $i) : dynamic ==> {
      $n = Vector{0, 0} as dynamic;
      $buf = Vector{0, $make(256, 0)} as dynamic;
      $resize = (dynamic $param) : dynamic ==> {
        $new_len = $call2(
          $Stdlib[16],
          (int)
          (2 * $caml_ml_bytes_length($buf[1])),
          $Stdlib_sys[13]
        );
        if ($caml_ml_bytes_length($buf[1]) === $new_len) {
          $call1($Stdlib[2], $cst_Bytes_of_seq_cannot_grow_bytes);
        }
        $new_buf = $make($new_len, 0);
        $blit($buf[1], 0, $new_buf, 0, $n[1]);
        $buf[1] = $new_buf;
        return 0;
      };
      $W_ = (dynamic $c) : dynamic ==> {
        if ($n[1] === $caml_ml_bytes_length($buf[1])) {$resize(0);}
        $caml_bytes_set($buf[1], $n[1], $c);
        $n[1] = $n[1] + 1;
        return 0;
      };
      $call2($Stdlib_seq[8], $W_, $i);
      return $sub($buf[1], 0, $n[1]);
    };
    $get_int8 = (dynamic $b, dynamic $i) : dynamic ==> {
      $U_ = (int) ($Stdlib_sys[11] + -8) as dynamic;
      $V_ = (int) ($Stdlib_sys[11] + -8) as dynamic;
      return $right_shift_32($left_shift_32($caml_bytes_get($b, $i), $V_), $U_
      );
    };
    $get_uint16_le = (dynamic $b, dynamic $i) : dynamic ==> {
      return $Stdlib_sys[12]
        ? $caml_bswap16($caml_bytes_get16($b, $i))
        : ($caml_bytes_get16($b, $i));
    };
    $get_uint16_be = (dynamic $b, dynamic $i) : dynamic ==> {
      return $Stdlib_sys[12]
        ? $caml_bytes_get16($b, $i)
        : ($caml_bswap16($caml_bytes_get16($b, $i)));
    };
    $get_int16_ne = (dynamic $b, dynamic $i) : dynamic ==> {
      $S_ = (int) ($Stdlib_sys[11] + -16) as dynamic;
      $T_ = (int) ($Stdlib_sys[11] + -16) as dynamic;
      return $right_shift_32(
        $left_shift_32($caml_bytes_get16($b, $i), $T_),
        $S_
      );
    };
    $get_int16_le = (dynamic $b, dynamic $i) : dynamic ==> {
      $Q_ = (int) ($Stdlib_sys[11] + -16) as dynamic;
      $R_ = (int) ($Stdlib_sys[11] + -16) as dynamic;
      return $right_shift_32($left_shift_32($get_uint16_le($b, $i), $R_), $Q_);
    };
    $get_int16_be = (dynamic $b, dynamic $i) : dynamic ==> {
      $O_ = (int) ($Stdlib_sys[11] + -16) as dynamic;
      $P_ = (int) ($Stdlib_sys[11] + -16) as dynamic;
      return $right_shift_32($left_shift_32($get_uint16_be($b, $i), $P_), $O_);
    };
    $get_int32_le = (dynamic $b, dynamic $i) : dynamic ==> {
      return $Stdlib_sys[12]
        ? $caml_int32_bswap($caml_bytes_get32($b, $i))
        : ($caml_bytes_get32($b, $i));
    };
    $get_int32_be = (dynamic $b, dynamic $i) : dynamic ==> {
      return $Stdlib_sys[12]
        ? $caml_bytes_get32($b, $i)
        : ($caml_int32_bswap($caml_bytes_get32($b, $i)));
    };
    $get_int64_le = (dynamic $b, dynamic $i) : dynamic ==> {
      return $Stdlib_sys[12]
        ? $caml_int64_bswap($caml_bytes_get64($b, $i))
        : ($caml_bytes_get64($b, $i));
    };
    $get_int64_be = (dynamic $b, dynamic $i) : dynamic ==> {
      return $Stdlib_sys[12]
        ? $caml_bytes_get64($b, $i)
        : ($caml_int64_bswap($caml_bytes_get64($b, $i)));
    };
    $set_int16_le = (dynamic $b, dynamic $i, dynamic $x) : dynamic ==> {
      return $Stdlib_sys[12]
        ? $caml_bytes_set16($b, $i, $caml_bswap16($x))
        : ($caml_bytes_set16($b, $i, $x));
    };
    $set_int16_be = (dynamic $b, dynamic $i, dynamic $x) : dynamic ==> {
      return $Stdlib_sys[12]
        ? $caml_bytes_set16($b, $i, $x)
        : ($caml_bytes_set16($b, $i, $caml_bswap16($x)));
    };
    $set_int32_le = (dynamic $b, dynamic $i, dynamic $x) : dynamic ==> {
      return $Stdlib_sys[12]
        ? $caml_bytes_set32($b, $i, $caml_int32_bswap($x))
        : ($caml_bytes_set32($b, $i, $x));
    };
    $set_int32_be = (dynamic $b, dynamic $i, dynamic $x) : dynamic ==> {
      return $Stdlib_sys[12]
        ? $caml_bytes_set32($b, $i, $x)
        : ($caml_bytes_set32($b, $i, $caml_int32_bswap($x)));
    };
    $set_int64_le = (dynamic $b, dynamic $i, dynamic $x) : dynamic ==> {
      return $Stdlib_sys[12]
        ? $caml_bytes_set64($b, $i, $caml_int64_bswap($x))
        : ($caml_bytes_set64($b, $i, $x));
    };
    $set_int64_be = (dynamic $b, dynamic $i, dynamic $x) : dynamic ==> {
      return $Stdlib_sys[12]
        ? $caml_bytes_set64($b, $i, $x)
        : ($caml_bytes_set64($b, $i, $caml_int64_bswap($x)));
    };
    $set_uint8 = (dynamic $N_, dynamic $M_, dynamic $L_) : dynamic ==> {
      return $caml_bytes_set($N_, $M_, $L_);
    };
    $set_uint16_ne = (dynamic $K_, dynamic $J_, dynamic $I_) : dynamic ==> {
      return $caml_bytes_set16($K_, $J_, $I_);
    };
    $a_ = (dynamic $H_, dynamic $G_, dynamic $F_) : dynamic ==> {
      return $caml_bytes_set64($H_, $G_, $F_);
    };
    $b_ = (dynamic $E_, dynamic $D_, dynamic $C_) : dynamic ==> {
      return $caml_bytes_set32($E_, $D_, $C_);
    };
    $c_ = (dynamic $B_, dynamic $A_, dynamic $z_) : dynamic ==> {
      return $caml_bytes_set16($B_, $A_, $z_);
    };
    $d_ = (dynamic $y_, dynamic $x_, dynamic $w_) : dynamic ==> {
      return $caml_bytes_set($y_, $x_, $w_);
    };
    $e_ = (dynamic $v_, dynamic $u_) : dynamic ==> {
      return $caml_bytes_get64($v_, $u_);
    };
    $f_ = (dynamic $t_, dynamic $s_) : dynamic ==> {
      return $caml_bytes_get32($t_, $s_);
    };
    $g_ = (dynamic $r_, dynamic $q_) : dynamic ==> {
      return $caml_bytes_get16($r_, $q_);
    };
    $h_ = (dynamic $p_, dynamic $o_) : dynamic ==> {
      return $caml_bytes_get($p_, $o_);
    };
    $i_ = (dynamic $n_) : dynamic ==> {return $caml_bytes_of_string($n_);};
    $j_ = (dynamic $m_) : dynamic ==> {return $caml_string_of_bytes($m_);};
    $Stdlib_bytes = Vector{
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
      (dynamic $l_, dynamic $k_) : dynamic ==> {
        return $runtime["caml_bytes_equal"]($l_, $k_);
      },
      $j_,
      $i_,
      $to_seq,
      $to_seqi,
      $of_seq,
      $h_,
      $get_int8,
      $g_,
      $get_uint16_be,
      $get_uint16_le,
      $get_int16_ne,
      $get_int16_be,
      $get_int16_le,
      $f_,
      $get_int32_be,
      $get_int32_le,
      $e_,
      $get_int64_be,
      $get_int64_le,
      $set_uint8,
      $d_,
      $set_uint16_ne,
      $set_int16_be,
      $set_int16_le,
      $c_,
      $set_int16_be,
      $set_int16_le,
      $b_,
      $set_int32_be,
      $set_int32_le,
      $a_,
      $set_int64_be,
      $set_int64_le
    } as dynamic;
    
    return($Stdlib_bytes);

  }
  public static function make(dynamic $n, dynamic $c): dynamic {
    return static::syncCall(__FUNCTION__, 1, $n, $c);
  }
  public static function init(dynamic $n, dynamic $f): dynamic {
    return static::syncCall(__FUNCTION__, 2, $n, $f);
  }
  public static function copy(dynamic $s): dynamic {
    return static::syncCall(__FUNCTION__, 4, $s);
  }
  public static function of_string(dynamic $s): dynamic {
    return static::syncCall(__FUNCTION__, 5, $s);
  }
  public static function to_string(dynamic $b): dynamic {
    return static::syncCall(__FUNCTION__, 6, $b);
  }
  public static function sub(dynamic $s, dynamic $ofs, dynamic $len): dynamic {
    return static::syncCall(__FUNCTION__, 7, $s, $ofs, $len);
  }
  public static function sub_string(dynamic $b, dynamic $ofs, dynamic $len): dynamic {
    return static::syncCall(__FUNCTION__, 8, $b, $ofs, $len);
  }
  public static function extend(dynamic $s, dynamic $left, dynamic $right): dynamic {
    return static::syncCall(__FUNCTION__, 9, $s, $left, $right);
  }
  public static function fill(dynamic $s, dynamic $ofs, dynamic $len, dynamic $c): dynamic {
    return static::syncCall(__FUNCTION__, 10, $s, $ofs, $len, $c);
  }
  public static function blit(dynamic $s1, dynamic $ofs1, dynamic $s2, dynamic $ofs2, dynamic $len): dynamic {
    return static::syncCall(__FUNCTION__, 11, $s1, $ofs1, $s2, $ofs2, $len);
  }
  public static function blit_string(dynamic $s1, dynamic $ofs1, dynamic $s2, dynamic $ofs2, dynamic $len): dynamic {
    return static::syncCall(__FUNCTION__, 12, $s1, $ofs1, $s2, $ofs2, $len);
  }
  public static function concat(dynamic $sep, dynamic $l): dynamic {
    return static::syncCall(__FUNCTION__, 13, $sep, $l);
  }
  public static function cat(dynamic $s1, dynamic $s2): dynamic {
    return static::syncCall(__FUNCTION__, 14, $s1, $s2);
  }
  public static function iter(dynamic $f, dynamic $a): dynamic {
    return static::syncCall(__FUNCTION__, 15, $f, $a);
  }
  public static function iteri(dynamic $f, dynamic $a): dynamic {
    return static::syncCall(__FUNCTION__, 16, $f, $a);
  }
  public static function map(dynamic $f, dynamic $s): dynamic {
    return static::syncCall(__FUNCTION__, 17, $f, $s);
  }
  public static function mapi(dynamic $f, dynamic $s): dynamic {
    return static::syncCall(__FUNCTION__, 18, $f, $s);
  }
  public static function trim(dynamic $s): dynamic {
    return static::syncCall(__FUNCTION__, 19, $s);
  }
  public static function escaped(dynamic $s): dynamic {
    return static::syncCall(__FUNCTION__, 20, $s);
  }
  public static function index(dynamic $s, dynamic $c): dynamic {
    return static::syncCall(__FUNCTION__, 21, $s, $c);
  }
  public static function index_opt(dynamic $s, dynamic $c): dynamic {
    return static::syncCall(__FUNCTION__, 22, $s, $c);
  }
  public static function rindex(dynamic $s, dynamic $c): dynamic {
    return static::syncCall(__FUNCTION__, 23, $s, $c);
  }
  public static function rindex_opt(dynamic $s, dynamic $c): dynamic {
    return static::syncCall(__FUNCTION__, 24, $s, $c);
  }
  public static function index_from(dynamic $s, dynamic $i, dynamic $c): dynamic {
    return static::syncCall(__FUNCTION__, 25, $s, $i, $c);
  }
  public static function index_from_opt(dynamic $s, dynamic $i, dynamic $c): dynamic {
    return static::syncCall(__FUNCTION__, 26, $s, $i, $c);
  }
  public static function rindex_from(dynamic $s, dynamic $i, dynamic $c): dynamic {
    return static::syncCall(__FUNCTION__, 27, $s, $i, $c);
  }
  public static function rindex_from_opt(dynamic $s, dynamic $i, dynamic $c): dynamic {
    return static::syncCall(__FUNCTION__, 28, $s, $i, $c);
  }
  public static function contains(dynamic $s, dynamic $c): dynamic {
    return static::syncCall(__FUNCTION__, 29, $s, $c);
  }
  public static function contains_from(dynamic $s, dynamic $i, dynamic $c): dynamic {
    return static::syncCall(__FUNCTION__, 30, $s, $i, $c);
  }
  public static function rcontains_from(dynamic $s, dynamic $i, dynamic $c): dynamic {
    return static::syncCall(__FUNCTION__, 31, $s, $i, $c);
  }
  public static function uppercase(dynamic $s): dynamic {
    return static::syncCall(__FUNCTION__, 32, $s);
  }
  public static function lowercase(dynamic $s): dynamic {
    return static::syncCall(__FUNCTION__, 33, $s);
  }
  public static function capitalize(dynamic $s): dynamic {
    return static::syncCall(__FUNCTION__, 34, $s);
  }
  public static function uncapitalize(dynamic $s): dynamic {
    return static::syncCall(__FUNCTION__, 35, $s);
  }
  public static function uppercase_ascii(dynamic $s): dynamic {
    return static::syncCall(__FUNCTION__, 36, $s);
  }
  public static function lowercase_ascii(dynamic $s): dynamic {
    return static::syncCall(__FUNCTION__, 37, $s);
  }
  public static function capitalize_ascii(dynamic $s): dynamic {
    return static::syncCall(__FUNCTION__, 38, $s);
  }
  public static function uncapitalize_ascii(dynamic $s): dynamic {
    return static::syncCall(__FUNCTION__, 39, $s);
  }
  public static function compare(dynamic $x, dynamic $y): dynamic {
    return static::syncCall(__FUNCTION__, 40, $x, $y);
  }
  public static function to_seq(dynamic $s): dynamic {
    return static::syncCall(__FUNCTION__, 44, $s);
  }
  public static function to_seqi(dynamic $s): dynamic {
    return static::syncCall(__FUNCTION__, 45, $s);
  }
  public static function of_seq(dynamic $i): dynamic {
    return static::syncCall(__FUNCTION__, 46, $i);
  }
  public static function get_int8(dynamic $b, dynamic $i): dynamic {
    return static::syncCall(__FUNCTION__, 48, $b, $i);
  }
  public static function get_uint16_be(dynamic $b, dynamic $i): dynamic {
    return static::syncCall(__FUNCTION__, 50, $b, $i);
  }
  public static function get_uint16_le(dynamic $b, dynamic $i): dynamic {
    return static::syncCall(__FUNCTION__, 51, $b, $i);
  }
  public static function get_int16_ne(dynamic $b, dynamic $i): dynamic {
    return static::syncCall(__FUNCTION__, 52, $b, $i);
  }
  public static function get_int16_be(dynamic $b, dynamic $i): dynamic {
    return static::syncCall(__FUNCTION__, 53, $b, $i);
  }
  public static function get_int16_le(dynamic $b, dynamic $i): dynamic {
    return static::syncCall(__FUNCTION__, 54, $b, $i);
  }
  public static function get_int32_be(dynamic $b, dynamic $i): dynamic {
    return static::syncCall(__FUNCTION__, 56, $b, $i);
  }
  public static function get_int32_le(dynamic $b, dynamic $i): dynamic {
    return static::syncCall(__FUNCTION__, 57, $b, $i);
  }
  public static function get_int64_be(dynamic $b, dynamic $i): dynamic {
    return static::syncCall(__FUNCTION__, 59, $b, $i);
  }
  public static function get_int64_le(dynamic $b, dynamic $i): dynamic {
    return static::syncCall(__FUNCTION__, 60, $b, $i);
  }
  public static function set_uint8(dynamic $unnamed1, dynamic $unnamed2, dynamic $unnamed3): dynamic {
    return static::syncCall(__FUNCTION__, 61, $unnamed1, $unnamed2, $unnamed3);
  }
  public static function set_uint16_ne(dynamic $unnamed1, dynamic $unnamed2, dynamic $unnamed3): dynamic {
    return static::syncCall(__FUNCTION__, 63, $unnamed1, $unnamed2, $unnamed3);
  }
  public static function set_int16_be(dynamic $b, dynamic $i, dynamic $x): dynamic {
    return static::syncCall(__FUNCTION__, 64, $b, $i, $x);
  }
  public static function set_int16_le(dynamic $b, dynamic $i, dynamic $x): dynamic {
    return static::syncCall(__FUNCTION__, 65, $b, $i, $x);
  }
  public static function set_int32_be(dynamic $b, dynamic $i, dynamic $x): dynamic {
    return static::syncCall(__FUNCTION__, 70, $b, $i, $x);
  }
  public static function set_int32_le(dynamic $b, dynamic $i, dynamic $x): dynamic {
    return static::syncCall(__FUNCTION__, 71, $b, $i, $x);
  }
  public static function set_int64_be(dynamic $b, dynamic $i, dynamic $x): dynamic {
    return static::syncCall(__FUNCTION__, 73, $b, $i, $x);
  }
  public static function set_int64_le(dynamic $b, dynamic $i, dynamic $x): dynamic {
    return static::syncCall(__FUNCTION__, 74, $b, $i, $x);
  }

}
/* Hashing disabled */
