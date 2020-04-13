<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class Stdlib__string {
  <<__Override, __Memoize>>
  public static function get() : Vector<dynamic> {
    
    $runtime = (\Rehack\GlobalObject::get() as dynamic)->jsoo_runtime;
    $caml_blit_string = $runtime["caml_blit_string"];
    $call1 = $runtime["caml_call1"];
    $call2 = $runtime["caml_call2"];
    $call3 = $runtime["caml_call3"];
    $caml_ml_string_length = $runtime["caml_ml_string_length"];
    $string = $runtime["caml_new_string"];
    $caml_string_equal = $runtime["caml_string_equal"];
    $caml_string_unsafe_get = $runtime["caml_string_unsafe_get"];
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
    $cst__0 = $string("");
    $cst = $string("");
    $cst_String_concat = $string("String.concat");
    $Stdlib = Stdlib::get();
    $Stdlib_bytes = Stdlib__bytes::get();
    $bts = $Stdlib_bytes[42];
    $bos = $Stdlib_bytes[43];
    $make = (dynamic $n, dynamic $c) : dynamic ==> {
      return $call1($bts, $call2($Stdlib_bytes[1], $n, $c));
    };
    $init = (dynamic $n, dynamic $f) : dynamic ==> {
      return $call1($bts, $call2($Stdlib_bytes[2], $n, $f));
    };
    $copy = (dynamic $s) : dynamic ==> {
      $L_ = $call1($bos, $s);
      return $call1($bts, $call1($Stdlib_bytes[4], $L_));
    };
    $sub = (dynamic $s, dynamic $ofs, dynamic $len) : dynamic ==> {
      $K_ = $call1($bos, $s);
      return $call1($bts, $call3($Stdlib_bytes[7], $K_, $ofs, $len));
    };
    $fill = $Stdlib_bytes[10];
    $blit = $Stdlib_bytes[12];
    $ensure_ge = (dynamic $x, dynamic $y) : dynamic ==> {
      return $y <= $x ? $x : ($call1($Stdlib[1], $cst_String_concat));
    };
    $sum_lengths = (dynamic $acc, dynamic $seplen, dynamic $param) : dynamic ==> {
      $I_ = null as dynamic;
      $J_ = null as dynamic;
      $acc__1 = null as dynamic;
      $acc__0 = $acc;
      $param__0 = $param;
      for (;;) {
        if ($param__0) {
          $I_ = $param__0[2];
          $J_ = $param__0[1];
          if ($I_) {
            $acc__1 =
              $ensure_ge(
                (int)
                ((int) ($caml_ml_string_length($J_) + $seplen) + $acc__0),
                $acc__0
              );
            $acc__0 = $acc__1;
            $param__0 = $I_;
            continue;
          }
          return (int) ($caml_ml_string_length($J_) + $acc__0);
        }
        return $acc__0;
      }
    };
    $unsafe_blits = 
    (dynamic $dst, dynamic $pos, dynamic $sep, dynamic $seplen, dynamic $param) : dynamic ==> {
      $G_ = null as dynamic;
      $H_ = null as dynamic;
      $pos__1 = null as dynamic;
      $pos__0 = $pos;
      $param__0 = $param;
      for (;;) {
        if ($param__0) {
          $G_ = $param__0[2];
          $H_ = $param__0[1];
          if ($G_) {
            $caml_blit_string(
              $H_,
              0,
              $dst,
              $pos__0,
              $caml_ml_string_length($H_)
            );
            $caml_blit_string(
              $sep,
              0,
              $dst,
              (int)
              ($pos__0 + $caml_ml_string_length($H_)),
              $seplen
            );
            $pos__1 =
              (int)
              ((int) ($pos__0 + $caml_ml_string_length($H_)) + $seplen) as dynamic;
            $pos__0 = $pos__1;
            $param__0 = $G_;
            continue;
          }
          $caml_blit_string($H_, 0, $dst, $pos__0, $caml_ml_string_length($H_)
          );
          return $dst;
        }
        return $dst;
      }
    };
    $concat = (dynamic $sep, dynamic $l) : dynamic ==> {
      $seplen = null as dynamic;
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
    $iter = (dynamic $f, dynamic $s) : dynamic ==> {
      $i = null as dynamic;
      $F_ = null as dynamic;
      $E_ = (int) ($caml_ml_string_length($s) + -1) as dynamic;
      $D_ = 0 as dynamic;
      if (! ($E_ < 0)) {
        $i = $D_;
        for (;;) {
          $call1($f, $caml_string_unsafe_get($s, $i));
          $F_ = (int) ($i + 1) as dynamic;
          if ($E_ !== $i) {$i = $F_;continue;}
          break;
        }
      }
      return 0;
    };
    $iteri = (dynamic $f, dynamic $s) : dynamic ==> {
      $i = null as dynamic;
      $C_ = null as dynamic;
      $B_ = (int) ($caml_ml_string_length($s) + -1) as dynamic;
      $A_ = 0 as dynamic;
      if (! ($B_ < 0)) {
        $i = $A_;
        for (;;) {
          $call2($f, $i, $caml_string_unsafe_get($s, $i));
          $C_ = (int) ($i + 1) as dynamic;
          if ($B_ !== $i) {$i = $C_;continue;}
          break;
        }
      }
      return 0;
    };
    $map = (dynamic $f, dynamic $s) : dynamic ==> {
      $z_ = $call1($bos, $s);
      return $call1($bts, $call2($Stdlib_bytes[17], $f, $z_));
    };
    $mapi = (dynamic $f, dynamic $s) : dynamic ==> {
      $y_ = $call1($bos, $s);
      return $call1($bts, $call2($Stdlib_bytes[18], $f, $y_));
    };
    $is_space = (dynamic $param) : dynamic ==> {
      $x_ = (int) ($param + -9) as dynamic;
      $switch__0 = 4 < $unsigned_right_shift_32($x_, 0)
        ? 23 === $x_ ? 1 : (0)
        : (2 === $x_ ? 0 : (1));
      return $switch__0 ? 1 : (0);
    };
    $trim = (dynamic $s) : dynamic ==> {
      if ($caml_string_equal($s, $cst__0)) {return $s;}
      if (! $is_space($caml_string_unsafe_get($s, 0))) {
        if (
          !
          $is_space(
            $caml_string_unsafe_get(
              $s,
              (int)
              ($caml_ml_string_length($s) + -1)
            )
          )
        ) {return $s;}
      }
      $w_ = $call1($bos, $s);
      return $call1($bts, $call1($Stdlib_bytes[19], $w_));
    };
    $escaped = (dynamic $s) : dynamic ==> {
      $escape_if_needed = (dynamic $s, dynamic $n, dynamic $i) : dynamic ==> {
        $match = null as dynamic;
        $u_ = null as dynamic;
        $v_ = null as dynamic;
        $i__1 = null as dynamic;
        $switch__0 = null as dynamic;
        $i__0 = $i;
        for (;;) {
          if ($n <= $i__0) {return $s;}
          $match = $caml_string_unsafe_get($s, $i__0);
          $u_ = (int) ($match + -32) as dynamic;
          $switch__0 =
            59 < $unsigned_right_shift_32($u_, 0)
              ? 33 < $unsigned_right_shift_32((int) ($u_ + -61), 0) ? 1 : (0)
              : (2 === $u_ ? 1 : (0));
          if ($switch__0) {
            $v_ = $call1($bos, $s);
            return $call1($bts, $call1($Stdlib_bytes[20], $v_));
          }
          $i__1 = (int) ($i__0 + 1) as dynamic;
          $i__0 = $i__1;
          continue;
        }
      };
      return $escape_if_needed($s, $caml_ml_string_length($s), 0);
    };
    $index_rec = (dynamic $s, dynamic $lim, dynamic $i, dynamic $c) : dynamic ==> {
      $i__1 = null as dynamic;
      $i__0 = $i;
      for (;;) {
        if ($lim <= $i__0) {
          throw $caml_wrap_thrown_exception($Stdlib[8]) as \Throwable;
        }
        if ($caml_string_unsafe_get($s, $i__0) === $c) {return $i__0;}
        $i__1 = (int) ($i__0 + 1) as dynamic;
        $i__0 = $i__1;
        continue;
      }
    };
    $index = (dynamic $s, dynamic $c) : dynamic ==> {
      return $index_rec($s, $caml_ml_string_length($s), 0, $c);
    };
    $index_rec_opt = (dynamic $s, dynamic $lim, dynamic $i, dynamic $c) : dynamic ==> {
      $i__1 = null as dynamic;
      $i__0 = $i;
      for (;;) {
        if ($lim <= $i__0) {return 0;}
        if ($caml_string_unsafe_get($s, $i__0) === $c) {return Vector{0, $i__0};}
        $i__1 = (int) ($i__0 + 1) as dynamic;
        $i__0 = $i__1;
        continue;
      }
    };
    $index_opt = (dynamic $s, dynamic $c) : dynamic ==> {
      return $index_rec_opt($s, $caml_ml_string_length($s), 0, $c);
    };
    $index_from = (dynamic $s, dynamic $i, dynamic $c) : dynamic ==> {
      $l = $caml_ml_string_length($s);
      if (0 <= $i) {if (! ($l < $i)) {return $index_rec($s, $l, $i, $c);}}
      return $call1($Stdlib[1], $cst_String_index_from_Bytes_index_from);
    };
    $index_from_opt = (dynamic $s, dynamic $i, dynamic $c) : dynamic ==> {
      $l = $caml_ml_string_length($s);
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
          if ($caml_string_unsafe_get($s, $i__0) === $c) {return $i__0;}
          $i__1 = (int) ($i__0 + -1) as dynamic;
          $i__0 = $i__1;
          continue;
        }
        throw $caml_wrap_thrown_exception($Stdlib[8]) as \Throwable;
      }
    };
    $rindex = (dynamic $s, dynamic $c) : dynamic ==> {
      return $rindex_rec($s, (int) ($caml_ml_string_length($s) + -1), $c);
    };
    $rindex_from = (dynamic $s, dynamic $i, dynamic $c) : dynamic ==> {
      if (-1 <= $i) {
        if (! ($caml_ml_string_length($s) <= $i)) {return $rindex_rec($s, $i, $c);}
      }
      return $call1($Stdlib[1], $cst_String_rindex_from_Bytes_rindex_from);
    };
    $rindex_rec_opt = (dynamic $s, dynamic $i, dynamic $c) : dynamic ==> {
      $i__1 = null as dynamic;
      $i__0 = $i;
      for (;;) {
        if (0 <= $i__0) {
          if ($caml_string_unsafe_get($s, $i__0) === $c) {return Vector{0, $i__0};}
          $i__1 = (int) ($i__0 + -1) as dynamic;
          $i__0 = $i__1;
          continue;
        }
        return 0;
      }
    };
    $rindex_opt = (dynamic $s, dynamic $c) : dynamic ==> {
      return $rindex_rec_opt($s, (int) ($caml_ml_string_length($s) + -1), $c);
    };
    $rindex_from_opt = (dynamic $s, dynamic $i, dynamic $c) : dynamic ==> {
      if (-1 <= $i) {
        if (! ($caml_ml_string_length($s) <= $i)) {return $rindex_rec_opt($s, $i, $c);}
      }
      return $call1(
        $Stdlib[1],
        $cst_String_rindex_from_opt_Bytes_rindex_from_opt
      );
    };
    $contains_from = (dynamic $s, dynamic $i, dynamic $c) : dynamic ==> {
      $s_ = null as dynamic;
      $l = $caml_ml_string_length($s);
      if (0 <= $i) {
        if (! ($l < $i)) {
          try {$index_rec($s, $l, $i, $c);$s_ = 1 as dynamic;return $s_;}
          catch(\Throwable $t_) {
            $t_ = $runtime["caml_wrap_exception"]($t_);
            if ($t_ === $Stdlib[8]) {return 0;}
            throw $caml_wrap_thrown_exception_reraise($t_) as \Throwable;
          }
        }
      }
      return $call1($Stdlib[1], $cst_String_contains_from_Bytes_contains_from);
    };
    $contains = (dynamic $s, dynamic $c) : dynamic ==> {
      return $contains_from($s, 0, $c);
    };
    $rcontains_from = (dynamic $s, dynamic $i, dynamic $c) : dynamic ==> {
      $q_ = null as dynamic;
      if (0 <= $i) {
        if (! ($caml_ml_string_length($s) <= $i)) {
          try {$rindex_rec($s, $i, $c);$q_ = 1 as dynamic;return $q_;}
          catch(\Throwable $r_) {
            $r_ = $runtime["caml_wrap_exception"]($r_);
            if ($r_ === $Stdlib[8]) {return 0;}
            throw $caml_wrap_thrown_exception_reraise($r_) as \Throwable;
          }
        }
      }
      return $call1(
        $Stdlib[1],
        $cst_String_rcontains_from_Bytes_rcontains_from
      );
    };
    $uppercase_ascii = (dynamic $s) : dynamic ==> {
      $p_ = $call1($bos, $s);
      return $call1($bts, $call1($Stdlib_bytes[36], $p_));
    };
    $lowercase_ascii = (dynamic $s) : dynamic ==> {
      $o_ = $call1($bos, $s);
      return $call1($bts, $call1($Stdlib_bytes[37], $o_));
    };
    $capitalize_ascii = (dynamic $s) : dynamic ==> {
      $n_ = $call1($bos, $s);
      return $call1($bts, $call1($Stdlib_bytes[38], $n_));
    };
    $uncapitalize_ascii = (dynamic $s) : dynamic ==> {
      $m_ = $call1($bos, $s);
      return $call1($bts, $call1($Stdlib_bytes[39], $m_));
    };
    $compare = (dynamic $x, dynamic $y) : dynamic ==> {
      return $runtime["caml_string_compare"]($x, $y);
    };
    $split_on_char = (dynamic $sep, dynamic $s) : dynamic ==> {
      $i = null as dynamic;
      $k_ = null as dynamic;
      $l_ = null as dynamic;
      $r = Vector{0, 0} as dynamic;
      $j = Vector{0, $caml_ml_string_length($s)} as dynamic;
      $i_ = (int) ($caml_ml_string_length($s) + -1) as dynamic;
      if (! ($i_ < 0)) {
        $i = $i_;
        for (;;) {
          if ($caml_string_unsafe_get($s, $i) === $sep) {
            $k_ = $r[1];
            $r[1] =
              Vector{
                0,
                $sub($s, (int) ($i + 1), (int) ((int) ($j[1] - $i) + -1)),
                $k_
              };
            $j[1] = $i;
          }
          $l_ = (int) ($i + -1) as dynamic;
          if (0 !== $i) {$i = $l_;continue;}
          break;
        }
      }
      $j_ = $r[1];
      return Vector{0, $sub($s, 0, $j[1]), $j_};
    };
    $uppercase = (dynamic $s) : dynamic ==> {
      $h_ = $call1($bos, $s);
      return $call1($bts, $call1($Stdlib_bytes[32], $h_));
    };
    $lowercase = (dynamic $s) : dynamic ==> {
      $g_ = $call1($bos, $s);
      return $call1($bts, $call1($Stdlib_bytes[33], $g_));
    };
    $capitalize = (dynamic $s) : dynamic ==> {
      $f_ = $call1($bos, $s);
      return $call1($bts, $call1($Stdlib_bytes[34], $f_));
    };
    $uncapitalize = (dynamic $s) : dynamic ==> {
      $e_ = $call1($bos, $s);
      return $call1($bts, $call1($Stdlib_bytes[35], $e_));
    };
    $to_seq = (dynamic $s) : dynamic ==> {
      $d_ = $call1($bos, $s);
      return $call1($Stdlib_bytes[44], $d_);
    };
    $to_seqi = (dynamic $s) : dynamic ==> {
      $c_ = $call1($bos, $s);
      return $call1($Stdlib_bytes[45], $c_);
    };
    $of_seq = (dynamic $g) : dynamic ==> {
      return $call1($bts, $call1($Stdlib_bytes[46], $g));
    };
    $Stdlib_string = Vector{
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
      (dynamic $b_, dynamic $a_) : dynamic ==> {
        return $caml_string_equal($b_, $a_);
      },
      $split_on_char,
      $to_seq,
      $to_seqi,
      $of_seq
    } as dynamic;
    
    return($Stdlib_string);

  }
  public static function make(dynamic $n, dynamic $c): dynamic {
    return static::syncCall(__FUNCTION__, 1, $n, $c);
  }
  public static function init(dynamic $n, dynamic $f): dynamic {
    return static::syncCall(__FUNCTION__, 2, $n, $f);
  }
  public static function copy(dynamic $s): dynamic {
    return static::syncCall(__FUNCTION__, 3, $s);
  }
  public static function sub(dynamic $s, dynamic $ofs, dynamic $len): dynamic {
    return static::syncCall(__FUNCTION__, 4, $s, $ofs, $len);
  }
  public static function concat(dynamic $sep, dynamic $l): dynamic {
    return static::syncCall(__FUNCTION__, 7, $sep, $l);
  }
  public static function iter(dynamic $f, dynamic $s): dynamic {
    return static::syncCall(__FUNCTION__, 8, $f, $s);
  }
  public static function iteri(dynamic $f, dynamic $s): dynamic {
    return static::syncCall(__FUNCTION__, 9, $f, $s);
  }
  public static function map(dynamic $f, dynamic $s): dynamic {
    return static::syncCall(__FUNCTION__, 10, $f, $s);
  }
  public static function mapi(dynamic $f, dynamic $s): dynamic {
    return static::syncCall(__FUNCTION__, 11, $f, $s);
  }
  public static function trim(dynamic $s): dynamic {
    return static::syncCall(__FUNCTION__, 12, $s);
  }
  public static function escaped(dynamic $s): dynamic {
    return static::syncCall(__FUNCTION__, 13, $s);
  }
  public static function index(dynamic $s, dynamic $c): dynamic {
    return static::syncCall(__FUNCTION__, 14, $s, $c);
  }
  public static function index_opt(dynamic $s, dynamic $c): dynamic {
    return static::syncCall(__FUNCTION__, 15, $s, $c);
  }
  public static function rindex(dynamic $s, dynamic $c): dynamic {
    return static::syncCall(__FUNCTION__, 16, $s, $c);
  }
  public static function rindex_opt(dynamic $s, dynamic $c): dynamic {
    return static::syncCall(__FUNCTION__, 17, $s, $c);
  }
  public static function index_from(dynamic $s, dynamic $i, dynamic $c): dynamic {
    return static::syncCall(__FUNCTION__, 18, $s, $i, $c);
  }
  public static function index_from_opt(dynamic $s, dynamic $i, dynamic $c): dynamic {
    return static::syncCall(__FUNCTION__, 19, $s, $i, $c);
  }
  public static function rindex_from(dynamic $s, dynamic $i, dynamic $c): dynamic {
    return static::syncCall(__FUNCTION__, 20, $s, $i, $c);
  }
  public static function rindex_from_opt(dynamic $s, dynamic $i, dynamic $c): dynamic {
    return static::syncCall(__FUNCTION__, 21, $s, $i, $c);
  }
  public static function contains(dynamic $s, dynamic $c): dynamic {
    return static::syncCall(__FUNCTION__, 22, $s, $c);
  }
  public static function contains_from(dynamic $s, dynamic $i, dynamic $c): dynamic {
    return static::syncCall(__FUNCTION__, 23, $s, $i, $c);
  }
  public static function rcontains_from(dynamic $s, dynamic $i, dynamic $c): dynamic {
    return static::syncCall(__FUNCTION__, 24, $s, $i, $c);
  }
  public static function uppercase(dynamic $s): dynamic {
    return static::syncCall(__FUNCTION__, 25, $s);
  }
  public static function lowercase(dynamic $s): dynamic {
    return static::syncCall(__FUNCTION__, 26, $s);
  }
  public static function capitalize(dynamic $s): dynamic {
    return static::syncCall(__FUNCTION__, 27, $s);
  }
  public static function uncapitalize(dynamic $s): dynamic {
    return static::syncCall(__FUNCTION__, 28, $s);
  }
  public static function uppercase_ascii(dynamic $s): dynamic {
    return static::syncCall(__FUNCTION__, 29, $s);
  }
  public static function lowercase_ascii(dynamic $s): dynamic {
    return static::syncCall(__FUNCTION__, 30, $s);
  }
  public static function capitalize_ascii(dynamic $s): dynamic {
    return static::syncCall(__FUNCTION__, 31, $s);
  }
  public static function uncapitalize_ascii(dynamic $s): dynamic {
    return static::syncCall(__FUNCTION__, 32, $s);
  }
  public static function compare(dynamic $x, dynamic $y): dynamic {
    return static::syncCall(__FUNCTION__, 33, $x, $y);
  }
  public static function split_on_char(dynamic $sep, dynamic $s): dynamic {
    return static::syncCall(__FUNCTION__, 35, $sep, $s);
  }
  public static function to_seq(dynamic $s): dynamic {
    return static::syncCall(__FUNCTION__, 36, $s);
  }
  public static function to_seqi(dynamic $s): dynamic {
    return static::syncCall(__FUNCTION__, 37, $s);
  }
  public static function of_seq(dynamic $g): dynamic {
    return static::syncCall(__FUNCTION__, 38, $g);
  }

}
/* Hashing disabled */
