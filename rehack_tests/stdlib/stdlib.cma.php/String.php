<?hh
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * String_.php
 */

namespace Rehack;

final class String_ {
  <<__Memoize>>
  public static function get() {
    $global_object = \Rehack\GlobalObject::get();
    $runtime = \Rehack\Runtime::get();
    /*
     * Soon, these will replace the `global_data->ModuleName`
     * pattern in the load() function.
     */
    $Bytes = Bytes::get();
    $Pervasives = Pervasives::get();
    $Not_found = Not_found::get();
    String_::load($global_object);
    $memoized = $runtime->caml_get_global_data()->String_;
    return $memoized;
  }

  /**
   * Performs module load operation. May have side effects.
   */
  private static function load($joo_global_object) {
    

    $runtime = $joo_global_object->jsoo_runtime;
    $caml_arity_test = $runtime["caml_arity_test"];
    $caml_blit_string = $runtime["caml_blit_string"];
    $caml_bytes_unsafe_get = $runtime["caml_bytes_unsafe_get"];
    $caml_ml_string_length = $runtime["caml_ml_string_length"];
    $caml_new_string = $runtime["caml_new_string"];
    $caml_string_equal = $runtime["caml_string_equal"];
    $caml_wrap_exception = $runtime["caml_wrap_exception"];
    $unsigned_right_shift_32 = $runtime["unsigned_right_shift_32"];
    $caml_call1 = function($f, $a0) use ($caml_arity_test,$runtime) {
      return $caml_arity_test($f) === 1
        ? $f($a0)
        : ($runtime["caml_call_gen"]($f, varray[$a0]));
    };
    $caml_call2 = function($f, $a0, $a1) use ($caml_arity_test,$runtime) {
      return $caml_arity_test($f) === 2
        ? $f($a0, $a1)
        : ($runtime["caml_call_gen"]($f, varray[$a0,$a1]));
    };
    $caml_call3 = function($f, $a0, $a1, $a2) use ($caml_arity_test,$runtime) {
      return $caml_arity_test($f) === 3
        ? $f($a0, $a1, $a2)
        : ($runtime["caml_call_gen"]($f, varray[$a0,$a1,$a2]));
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
    $cst__0 = $caml_new_string("");
    $cst = $caml_new_string("");
    $cst_String_concat = $caml_new_string("String.concat");
    $Not_found = $global_data["Not_found"];
    $Bytes = $global_data["Bytes"];
    $Pervasives = $global_data["Pervasives"];
    $bts = $Bytes[42];
    $bos = $Bytes[43];
    $make = function($n, $c) use ($Bytes,$bts,$caml_call1,$caml_call2) {
      return $caml_call1($bts, $caml_call2($Bytes[1], $n, $c));
    };
    $init = function($n, $f) use ($Bytes,$bts,$caml_call1,$caml_call2) {
      return $caml_call1($bts, $caml_call2($Bytes[2], $n, $f));
    };
    $copy = function($s) use ($Bytes,$bos,$bts,$caml_call1) {
      $cy = $caml_call1($bos, $s);
      return $caml_call1($bts, $caml_call1($Bytes[4], $cy));
    };
    $sub = function($s, $ofs, $len) use ($Bytes,$bos,$bts,$caml_call1,$caml_call3) {
      $cx = $caml_call1($bos, $s);
      return $caml_call1($bts, $caml_call3($Bytes[7], $cx, $ofs, $len));
    };
    $fill = $Bytes[10];
    $blit = $Bytes[12];
    $ensure_ge = function($x, $y) use ($Pervasives,$caml_call1,$cst_String_concat) {
      return $y <= $x ? $x : ($caml_call1($Pervasives[1], $cst_String_concat));
    };
    $sum_lengths = function($acc, $seplen, $param) use ($caml_ml_string_length,$ensure_ge) {
      $acc__0 = $acc;
      $param__0 = $param;
      for (;;) {
        if ($param__0) {
          $cv = $param__0[2];
          $cw = $param__0[1];
          if ($cv) {
            $acc__1 = $ensure_ge(
              (int)
              ((int) ($caml_ml_string_length($cw) + $seplen) + $acc__0),
              $acc__0
            );
            $acc__0 = $acc__1;
            $param__0 = $cv;
            continue;
          }
          return (int) ($caml_ml_string_length($cw) + $acc__0);
        }
        return $acc__0;
      }
    };
    $unsafe_blits = function($dst, $pos, $sep, $seplen, $param) use ($caml_blit_string,$caml_ml_string_length) {
      $pos__0 = $pos;
      $param__0 = $param;
      for (;;) {
        if ($param__0) {
          $ct = $param__0[2];
          $cu = $param__0[1];
          if ($ct) {
            $caml_blit_string(
              $cu,
              0,
              $dst,
              $pos__0,
              $caml_ml_string_length($cu)
            );
            $caml_blit_string(
              $sep,
              0,
              $dst,
              (int)
              ($pos__0 + $caml_ml_string_length($cu)),
              $seplen
            );
            $pos__1 = (int)
            ((int) ($pos__0 + $caml_ml_string_length($cu)) + $seplen);
            $pos__0 = $pos__1;
            $param__0 = $ct;
            continue;
          }
          $caml_blit_string($cu, 0, $dst, $pos__0, $caml_ml_string_length($cu)
          );
          return $dst;
        }
        return $dst;
      }
    };
    $concat = function($sep, $l) use ($bts,$caml_call1,$caml_ml_string_length,$cst,$runtime,$sum_lengths,$unsafe_blits) {
      if ($l) {
        $seplen = $caml_ml_string_length($sep);
        return $caml_call1(
          $bts,
          $unsafe_blits(
            $runtime["caml_create_bytes"]($sum_lengths(0, $seplen, $l)),
            0,
            $sep,
            $seplen,
            $l
          )
        );
      }
      return $cst;
    };
    $iter = function($f, $s) use ($caml_bytes_unsafe_get,$caml_call1,$caml_ml_string_length) {
      $cr = (int) ($caml_ml_string_length($s) + -1);
      $cq = 0;
      if (! ($cr < 0)) {
        $i = $cq;
        for (;;) {
          $caml_call1($f, $caml_bytes_unsafe_get($s, $i));
          $cs = (int) ($i + 1);
          if ($cr !== $i) {$i = $cs;continue;}
          break;
        }
      }
      return 0;
    };
    $iteri = function($f, $s) use ($caml_bytes_unsafe_get,$caml_call2,$caml_ml_string_length) {
      $co = (int) ($caml_ml_string_length($s) + -1);
      $cn = 0;
      if (! ($co < 0)) {
        $i = $cn;
        for (;;) {
          $caml_call2($f, $i, $caml_bytes_unsafe_get($s, $i));
          $cp = (int) ($i + 1);
          if ($co !== $i) {$i = $cp;continue;}
          break;
        }
      }
      return 0;
    };
    $map = function($f, $s) use ($Bytes,$bos,$bts,$caml_call1,$caml_call2) {
      $cm = $caml_call1($bos, $s);
      return $caml_call1($bts, $caml_call2($Bytes[17], $f, $cm));
    };
    $mapi = function($f, $s) use ($Bytes,$bos,$bts,$caml_call1,$caml_call2) {
      $cl = $caml_call1($bos, $s);
      return $caml_call1($bts, $caml_call2($Bytes[18], $f, $cl));
    };
    $is_space = function($param) use ($unsigned_right_shift_32) {
      $ck = (int) ($param + -9);
      $switch__0 = 4 < $unsigned_right_shift_32($ck, 0)
        ? 23 === $ck ? 1 : (0)
        : (2 === $ck ? 0 : (1));
      return $switch__0 ? 1 : (0);
    };
    $trim = function($s) use ($Bytes,$bos,$bts,$caml_bytes_unsafe_get,$caml_call1,$caml_ml_string_length,$caml_string_equal,$cst__0,$is_space) {
      if ($caml_string_equal($s, $cst__0)) {return $s;}
      if (! $is_space($caml_bytes_unsafe_get($s, 0))) {
        if (
          !
          $is_space(
            $caml_bytes_unsafe_get($s, (int) ($caml_ml_string_length($s) + -1)
            )
          )
        ) {return $s;}
      }
      $cj = $caml_call1($bos, $s);
      return $caml_call1($bts, $caml_call1($Bytes[19], $cj));
    };
    $escaped = function($s) use ($Bytes,$bos,$bts,$caml_bytes_unsafe_get,$caml_call1,$caml_ml_string_length,$unsigned_right_shift_32) {
      $needs_escape = function($i) use ($caml_bytes_unsafe_get,$caml_ml_string_length,$s,$unsigned_right_shift_32) {
        $i__0 = $i;
        for (;;) {
          if ($caml_ml_string_length($s) <= $i__0) {return 0;}
          $match = $caml_bytes_unsafe_get($s, $i__0);
          if (32 <= $match) {
            $ci = (int) ($match + -34);
            if (58 < $unsigned_right_shift_32($ci, 0)) {
              if (93 <= $ci) {
                $switch__0 = 0;
                $switch__1 = 0;
              }
              else {$switch__1 = 1;}
            }
            else {
              if (56 < $unsigned_right_shift_32((int) ($ci + -1), 0)) {$switch__0 = 1;$switch__1 = 0;}
              else {$switch__1 = 1;}
            }
            if ($switch__1) {
              $i__1 = (int) ($i__0 + 1);
              $i__0 = $i__1;
              continue;
            }
          }
          else {
            $switch__0 = 11 <= $match
              ? 13 === $match ? 1 : (0)
              : (8 <= $match ? 1 : (0));
          }
          return $switch__0 ? 1 : (1);
        }
      };
      if ($needs_escape(0)) {
        $ch = $caml_call1($bos, $s);
        return $caml_call1($bts, $caml_call1($Bytes[20], $ch));
      }
      return $s;
    };
    $index_rec = function($s, $lim, $i, $c) use ($Not_found,$caml_bytes_unsafe_get,$runtime) {
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
    $index = function($s, $c) use ($caml_ml_string_length,$index_rec) {
      return $index_rec($s, $caml_ml_string_length($s), 0, $c);
    };
    $index_rec_opt = function($s, $lim, $i, $c) use ($caml_bytes_unsafe_get) {
      $i__0 = $i;
      for (;;) {
        if ($lim <= $i__0) {return 0;}
        if ($caml_bytes_unsafe_get($s, $i__0) === $c) {return Vector{0, $i__0};}
        $i__1 = (int) ($i__0 + 1);
        $i__0 = $i__1;
        continue;
      }
    };
    $index_opt = function($s, $c) use ($caml_ml_string_length,$index_rec_opt) {
      return $index_rec_opt($s, $caml_ml_string_length($s), 0, $c);
    };
    $index_from = function($s, $i, $c) use ($Pervasives,$caml_call1,$caml_ml_string_length,$cst_String_index_from_Bytes_index_from,$index_rec) {
      $l = $caml_ml_string_length($s);
      if (0 <= $i) {if (! ($l < $i)) {return $index_rec($s, $l, $i, $c);}}
      return $caml_call1(
        $Pervasives[1],
        $cst_String_index_from_Bytes_index_from
      );
    };
    $index_from_opt = function($s, $i, $c) use ($Pervasives,$caml_call1,$caml_ml_string_length,$cst_String_index_from_opt_Bytes_index_from_opt,$index_rec_opt) {
      $l = $caml_ml_string_length($s);
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
          $i__1 = (int) ($i__0 + -1);
          $i__0 = $i__1;
          continue;
        }
        throw $runtime["caml_wrap_thrown_exception"]($Not_found) as \Throwable;
      }
    };
    $rindex = function($s, $c) use ($caml_ml_string_length,$rindex_rec) {
      return $rindex_rec($s, (int) ($caml_ml_string_length($s) + -1), $c);
    };
    $rindex_from = function($s, $i, $c) use ($Pervasives,$caml_call1,$caml_ml_string_length,$cst_String_rindex_from_Bytes_rindex_from,$rindex_rec) {
      if (-1 <= $i) {
        if (! ($caml_ml_string_length($s) <= $i)) {return $rindex_rec($s, $i, $c);}
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
          if ($caml_bytes_unsafe_get($s, $i__0) === $c) {return Vector{0, $i__0};}
          $i__1 = (int) ($i__0 + -1);
          $i__0 = $i__1;
          continue;
        }
        return 0;
      }
    };
    $rindex_opt = function($s, $c) use ($caml_ml_string_length,$rindex_rec_opt) {
      return $rindex_rec_opt($s, (int) ($caml_ml_string_length($s) + -1), $c);
    };
    $rindex_from_opt = function($s, $i, $c) use ($Pervasives,$caml_call1,$caml_ml_string_length,$cst_String_rindex_from_opt_Bytes_rindex_from_opt,$rindex_rec_opt) {
      if (-1 <= $i) {
        if (! ($caml_ml_string_length($s) <= $i)) {return $rindex_rec_opt($s, $i, $c);}
      }
      return $caml_call1(
        $Pervasives[1],
        $cst_String_rindex_from_opt_Bytes_rindex_from_opt
      );
    };
    $contains_from = function($s, $i, $c) use ($Not_found,$Pervasives,$caml_call1,$caml_ml_string_length,$caml_wrap_exception,$cst_String_contains_from_Bytes_contains_from,$index_rec,$runtime) {
      $l = $caml_ml_string_length($s);
      if (0 <= $i) {
        if (! ($l < $i)) {
          try {$index_rec($s, $l, $i, $c);$cf = 1;return $cf;}
          catch(\Throwable $cg) {
            $cg = $caml_wrap_exception($cg);
            if ($cg === $Not_found) {return 0;}
            throw $runtime["caml_wrap_thrown_exception_reraise"]($cg) as \Throwable;
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
    $rcontains_from = function($s, $i, $c) use ($Not_found,$Pervasives,$caml_call1,$caml_ml_string_length,$caml_wrap_exception,$cst_String_rcontains_from_Bytes_rcontains_from,$rindex_rec,$runtime) {
      if (0 <= $i) {
        if (! ($caml_ml_string_length($s) <= $i)) {
          try {$rindex_rec($s, $i, $c);$cd = 1;return $cd;}
          catch(\Throwable $ce) {
            $ce = $caml_wrap_exception($ce);
            if ($ce === $Not_found) {return 0;}
            throw $runtime["caml_wrap_thrown_exception_reraise"]($ce) as \Throwable;
          }
        }
      }
      return $caml_call1(
        $Pervasives[1],
        $cst_String_rcontains_from_Bytes_rcontains_from
      );
    };
    $uppercase_ascii = function($s) use ($Bytes,$bos,$bts,$caml_call1) {
      $cc = $caml_call1($bos, $s);
      return $caml_call1($bts, $caml_call1($Bytes[36], $cc));
    };
    $lowercase_ascii = function($s) use ($Bytes,$bos,$bts,$caml_call1) {
      $cb = $caml_call1($bos, $s);
      return $caml_call1($bts, $caml_call1($Bytes[37], $cb));
    };
    $capitalize_ascii = function($s) use ($Bytes,$bos,$bts,$caml_call1) {
      $ca = $caml_call1($bos, $s);
      return $caml_call1($bts, $caml_call1($Bytes[38], $ca));
    };
    $uncapitalize_ascii = function($s) use ($Bytes,$bos,$bts,$caml_call1) {
      $b_ = $caml_call1($bos, $s);
      return $caml_call1($bts, $caml_call1($Bytes[39], $b_));
    };
    $compare = function($x, $y) use ($runtime) {
      return $runtime["caml_string_compare"]($x, $y);
    };
    $split_on_char = function($sep, $s) use ($caml_bytes_unsafe_get,$caml_ml_string_length,$sub) {
      $r = Vector{0, 0};
      $j = Vector{0, $caml_ml_string_length($s)};
      $b6 = (int) ($caml_ml_string_length($s) + -1);
      if (! ($b6 < 0)) {
        $i = $b6;
        for (;;) {
          if ($caml_bytes_unsafe_get($s, $i) === $sep) {
            $b8 = $r[1];
            $r[1] =
              Vector{
                0,
                $sub($s, (int) ($i + 1), (int) ((int) ($j[1] - $i) + -1)),
                $b8
              };
            $j[1] = $i;
          }
          $b9 = (int) ($i + -1);
          if (0 !== $i) {$i = $b9;continue;}
          break;
        }
      }
      $b7 = $r[1];
      return Vector{0, $sub($s, 0, $j[1]), $b7};
    };
    $uppercase = function($s) use ($Bytes,$bos,$bts,$caml_call1) {
      $b5 = $caml_call1($bos, $s);
      return $caml_call1($bts, $caml_call1($Bytes[32], $b5));
    };
    $lowercase = function($s) use ($Bytes,$bos,$bts,$caml_call1) {
      $b4 = $caml_call1($bos, $s);
      return $caml_call1($bts, $caml_call1($Bytes[33], $b4));
    };
    $capitalize = function($s) use ($Bytes,$bos,$bts,$caml_call1) {
      $b3 = $caml_call1($bos, $s);
      return $caml_call1($bts, $caml_call1($Bytes[34], $b3));
    };
    $uncapitalize = function($s) use ($Bytes,$bos,$bts,$caml_call1) {
      $b2 = $caml_call1($bos, $s);
      return $caml_call1($bts, $caml_call1($Bytes[35], $b2));
    };
    $String = Vector{
      0,
      $make,
      $init,
      $copy,
      $sub,
      $fill,
      $blit,
      $concat,
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
      function($b1, $b0) use ($caml_string_equal) {
        return $caml_string_equal($b1, $b0);
      },
      $split_on_char
    };
    
    $runtime["caml_register_global"](12, $String, "String_");

  }
}