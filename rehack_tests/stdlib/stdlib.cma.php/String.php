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
    $caml_blit_string = $runtime["caml_blit_string"];
    $caml_bytes_unsafe_get = $runtime["caml_bytes_unsafe_get"];
    $call1 = $runtime["caml_call1"];
    $call2 = $runtime["caml_call2"];
    $call3 = $runtime["caml_call3"];
    $caml_ml_string_length = $runtime["caml_ml_string_length"];
    $string = $runtime["caml_new_string"];
    $caml_string_equal = $runtime["caml_string_equal"];
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
    $cst__0 = $string("");
    $cst = $string("");
    $cst_String_concat = $string("String.concat");
    $Not_found = $global_data["Not_found"];
    $Bytes = $global_data["Bytes"];
    $Pervasives = $global_data["Pervasives"];
    $bts = $Bytes[42];
    $bos = $Bytes[43];
    $make = function(dynamic $n, dynamic $c) use ($Bytes,$bts,$call1,$call2) {
      return $call1($bts, $call2($Bytes[1], $n, $c));
    };
    $init = function(dynamic $n, dynamic $f) use ($Bytes,$bts,$call1,$call2) {
      return $call1($bts, $call2($Bytes[2], $n, $f));
    };
    $copy = function(dynamic $s) use ($Bytes,$bos,$bts,$call1) {
      $J = $call1($bos, $s);
      return $call1($bts, $call1($Bytes[4], $J));
    };
    $sub = function(dynamic $s, dynamic $ofs, dynamic $len) use ($Bytes,$bos,$bts,$call1,$call3) {
      $I = $call1($bos, $s);
      return $call1($bts, $call3($Bytes[7], $I, $ofs, $len));
    };
    $fill = $Bytes[10];
    $blit = $Bytes[12];
    $ensure_ge = function(dynamic $x, dynamic $y) use ($Pervasives,$call1,$cst_String_concat) {
      return $y <= $x ? $x : ($call1($Pervasives[1], $cst_String_concat));
    };
    $sum_lengths = function(dynamic $acc, dynamic $seplen, dynamic $param) use ($caml_ml_string_length,$ensure_ge) {
      $acc__0 = $acc;
      $param__0 = $param;
      for (;;) {
        if ($param__0) {
          $G = $param__0[2];
          $H = $param__0[1];
          if ($G) {
            $acc__1 = $ensure_ge(
              (int)
              ((int) ($caml_ml_string_length($H) + $seplen) + $acc__0),
              $acc__0
            );
            $acc__0 = $acc__1;
            $param__0 = $G;
            continue;
          }
          return (int) ($caml_ml_string_length($H) + $acc__0);
        }
        return $acc__0;
      }
    };
    $unsafe_blits = function
    (dynamic $dst, dynamic $pos, dynamic $sep, dynamic $seplen, dynamic $param) use ($caml_blit_string,$caml_ml_string_length) {
      $pos__0 = $pos;
      $param__0 = $param;
      for (;;) {
        if ($param__0) {
          $E = $param__0[2];
          $F = $param__0[1];
          if ($E) {
            $caml_blit_string($F, 0, $dst, $pos__0, $caml_ml_string_length($F)
            );
            $caml_blit_string(
              $sep,
              0,
              $dst,
              (int)
              ($pos__0 + $caml_ml_string_length($F)),
              $seplen
            );
            $pos__1 = (int)
            ((int) ($pos__0 + $caml_ml_string_length($F)) + $seplen);
            $pos__0 = $pos__1;
            $param__0 = $E;
            continue;
          }
          $caml_blit_string($F, 0, $dst, $pos__0, $caml_ml_string_length($F));
          return $dst;
        }
        return $dst;
      }
    };
    $concat = function(dynamic $sep, dynamic $l) use ($bts,$call1,$caml_ml_string_length,$cst,$runtime,$sum_lengths,$unsafe_blits) {
      if ($l) {
        $seplen = $caml_ml_string_length($sep);
        return $call1(
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
    $iter = function(dynamic $f, dynamic $s) use ($call1,$caml_bytes_unsafe_get,$caml_ml_string_length) {
      $C = (int) ($caml_ml_string_length($s) + -1);
      $B = 0;
      if (! ($C < 0)) {
        $i = $B;
        for (;;) {
          $call1($f, $caml_bytes_unsafe_get($s, $i));
          $D = (int) ($i + 1);
          if ($C !== $i) {$i = $D;continue;}
          break;
        }
      }
      return 0;
    };
    $iteri = function(dynamic $f, dynamic $s) use ($call2,$caml_bytes_unsafe_get,$caml_ml_string_length) {
      $z = (int) ($caml_ml_string_length($s) + -1);
      $y = 0;
      if (! ($z < 0)) {
        $i = $y;
        for (;;) {
          $call2($f, $i, $caml_bytes_unsafe_get($s, $i));
          $A = (int) ($i + 1);
          if ($z !== $i) {$i = $A;continue;}
          break;
        }
      }
      return 0;
    };
    $map = function(dynamic $f, dynamic $s) use ($Bytes,$bos,$bts,$call1,$call2) {
      $x = $call1($bos, $s);
      return $call1($bts, $call2($Bytes[17], $f, $x));
    };
    $mapi = function(dynamic $f, dynamic $s) use ($Bytes,$bos,$bts,$call1,$call2) {
      $w = $call1($bos, $s);
      return $call1($bts, $call2($Bytes[18], $f, $w));
    };
    $is_space = function(dynamic $param) use ($unsigned_right_shift_32) {
      $v = (int) ($param + -9);
      $switch__0 = 4 < $unsigned_right_shift_32($v, 0)
        ? 23 === $v ? 1 : (0)
        : (2 === $v ? 0 : (1));
      return $switch__0 ? 1 : (0);
    };
    $trim = function(dynamic $s) use ($Bytes,$bos,$bts,$call1,$caml_bytes_unsafe_get,$caml_ml_string_length,$caml_string_equal,$cst__0,$is_space) {
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
      $u = $call1($bos, $s);
      return $call1($bts, $call1($Bytes[19], $u));
    };
    $escaped = function(dynamic $s) use ($Bytes,$bos,$bts,$call1,$caml_bytes_unsafe_get,$caml_ml_string_length,$unsigned_right_shift_32) {
      $needs_escape = function(dynamic $i) use ($caml_bytes_unsafe_get,$caml_ml_string_length,$s,$unsigned_right_shift_32) {
        $i__0 = $i;
        for (;;) {
          if ($caml_ml_string_length($s) <= $i__0) {return 0;}
          $match = $caml_bytes_unsafe_get($s, $i__0);
          if (32 <= $match) {
            $t = (int) ($match + -34);
            if (58 < $unsigned_right_shift_32($t, 0)) {
              if (93 <= $t) {
                $switch__0 = 0;
                $switch__1 = 0;
              }
              else {$switch__1 = 1;}
            }
            else {
              if (56 < $unsigned_right_shift_32((int) ($t + -1), 0)) {$switch__0 = 1;$switch__1 = 0;}
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
        $s = $call1($bos, $s);
        return $call1($bts, $call1($Bytes[20], $s));
      }
      return $s;
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
    $index = function(dynamic $s, dynamic $c) use ($caml_ml_string_length,$index_rec) {
      return $index_rec($s, $caml_ml_string_length($s), 0, $c);
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
    $index_opt = function(dynamic $s, dynamic $c) use ($caml_ml_string_length,$index_rec_opt) {
      return $index_rec_opt($s, $caml_ml_string_length($s), 0, $c);
    };
    $index_from = function(dynamic $s, dynamic $i, dynamic $c) use ($Pervasives,$call1,$caml_ml_string_length,$cst_String_index_from_Bytes_index_from,$index_rec) {
      $l = $caml_ml_string_length($s);
      if (0 <= $i) {if (! ($l < $i)) {return $index_rec($s, $l, $i, $c);}}
      return $call1($Pervasives[1], $cst_String_index_from_Bytes_index_from);
    };
    $index_from_opt = function(dynamic $s, dynamic $i, dynamic $c) use ($Pervasives,$call1,$caml_ml_string_length,$cst_String_index_from_opt_Bytes_index_from_opt,$index_rec_opt) {
      $l = $caml_ml_string_length($s);
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
    $rindex = function(dynamic $s, dynamic $c) use ($caml_ml_string_length,$rindex_rec) {
      return $rindex_rec($s, (int) ($caml_ml_string_length($s) + -1), $c);
    };
    $rindex_from = function(dynamic $s, dynamic $i, dynamic $c) use ($Pervasives,$call1,$caml_ml_string_length,$cst_String_rindex_from_Bytes_rindex_from,$rindex_rec) {
      if (-1 <= $i) {
        if (! ($caml_ml_string_length($s) <= $i)) {return $rindex_rec($s, $i, $c);}
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
    $rindex_opt = function(dynamic $s, dynamic $c) use ($caml_ml_string_length,$rindex_rec_opt) {
      return $rindex_rec_opt($s, (int) ($caml_ml_string_length($s) + -1), $c);
    };
    $rindex_from_opt = function(dynamic $s, dynamic $i, dynamic $c) use ($Pervasives,$call1,$caml_ml_string_length,$cst_String_rindex_from_opt_Bytes_rindex_from_opt,$rindex_rec_opt) {
      if (-1 <= $i) {
        if (! ($caml_ml_string_length($s) <= $i)) {return $rindex_rec_opt($s, $i, $c);}
      }
      return $call1(
        $Pervasives[1],
        $cst_String_rindex_from_opt_Bytes_rindex_from_opt
      );
    };
    $contains_from = function(dynamic $s, dynamic $i, dynamic $c) use ($Not_found,$Pervasives,$call1,$caml_ml_string_length,$caml_wrap_exception,$cst_String_contains_from_Bytes_contains_from,$index_rec,$runtime) {
      $l = $caml_ml_string_length($s);
      if (0 <= $i) {
        if (! ($l < $i)) {
          try {$index_rec($s, $l, $i, $c);$q = 1;return $q;}
          catch(\Throwable $r) {
            $r = $caml_wrap_exception($r);
            if ($r === $Not_found) {return 0;}
            throw $runtime["caml_wrap_thrown_exception_reraise"]($r) as \Throwable;
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
    $rcontains_from = function(dynamic $s, dynamic $i, dynamic $c) use ($Not_found,$Pervasives,$call1,$caml_ml_string_length,$caml_wrap_exception,$cst_String_rcontains_from_Bytes_rcontains_from,$rindex_rec,$runtime) {
      if (0 <= $i) {
        if (! ($caml_ml_string_length($s) <= $i)) {
          try {$rindex_rec($s, $i, $c);$o = 1;return $o;}
          catch(\Throwable $p) {
            $p = $caml_wrap_exception($p);
            if ($p === $Not_found) {return 0;}
            throw $runtime["caml_wrap_thrown_exception_reraise"]($p) as \Throwable;
          }
        }
      }
      return $call1(
        $Pervasives[1],
        $cst_String_rcontains_from_Bytes_rcontains_from
      );
    };
    $uppercase_ascii = function(dynamic $s) use ($Bytes,$bos,$bts,$call1) {
      $n = $call1($bos, $s);
      return $call1($bts, $call1($Bytes[36], $n));
    };
    $lowercase_ascii = function(dynamic $s) use ($Bytes,$bos,$bts,$call1) {
      $m = $call1($bos, $s);
      return $call1($bts, $call1($Bytes[37], $m));
    };
    $capitalize_ascii = function(dynamic $s) use ($Bytes,$bos,$bts,$call1) {
      $l = $call1($bos, $s);
      return $call1($bts, $call1($Bytes[38], $l));
    };
    $uncapitalize_ascii = function(dynamic $s) use ($Bytes,$bos,$bts,$call1) {
      $k = $call1($bos, $s);
      return $call1($bts, $call1($Bytes[39], $k));
    };
    $compare = function(dynamic $x, dynamic $y) use ($runtime) {
      return $runtime["caml_string_compare"]($x, $y);
    };
    $split_on_char = function(dynamic $sep, dynamic $s) use ($caml_bytes_unsafe_get,$caml_ml_string_length,$sub) {
      $r = Vector{0, 0};
      $j = Vector{0, $caml_ml_string_length($s)};
      $g = (int) ($caml_ml_string_length($s) + -1);
      if (! ($g < 0)) {
        $i = $g;
        for (;;) {
          if ($caml_bytes_unsafe_get($s, $i) === $sep) {
            $i = $r[1];
            $r[1] =
              Vector{
                0,
                $sub($s, (int) ($i + 1), (int) ((int) ($j[1] - $i) + -1)),
                $i
              };
            $j[1] = $i;
          }
          $j = (int) ($i + -1);
          if (0 !== $i) {$i = $j;continue;}
          break;
        }
      }
      $h = $r[1];
      return Vector{0, $sub($s, 0, $j[1]), $h};
    };
    $uppercase = function(dynamic $s) use ($Bytes,$bos,$bts,$call1) {
      $f = $call1($bos, $s);
      return $call1($bts, $call1($Bytes[32], $f));
    };
    $lowercase = function(dynamic $s) use ($Bytes,$bos,$bts,$call1) {
      $e = $call1($bos, $s);
      return $call1($bts, $call1($Bytes[33], $e));
    };
    $capitalize = function(dynamic $s) use ($Bytes,$bos,$bts,$call1) {
      $d = $call1($bos, $s);
      return $call1($bts, $call1($Bytes[34], $d));
    };
    $uncapitalize = function(dynamic $s) use ($Bytes,$bos,$bts,$call1) {
      $c = $call1($bos, $s);
      return $call1($bts, $call1($Bytes[35], $c));
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
      function(dynamic $b, dynamic $a) use ($caml_string_equal) {
        return $caml_string_equal($b, $a);
      },
      $split_on_char
    };
    
    $runtime["caml_register_global"](12, $String, "String");

  }
}

/*____hashes compiler:hashing-disabled inputs:hashing-disabled bytecode:hashing-disabled*/
