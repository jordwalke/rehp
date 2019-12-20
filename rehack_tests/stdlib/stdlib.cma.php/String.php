<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class String_ {
  <<__Override, __Memoize>>
  public static function get() : Vector<dynamic> {
    $joo_global_object = \Rehack\GlobalObject::get() as dynamic;
    
    $runtime = $joo_global_object->jsoo_runtime;
    $caml_blit_string = $runtime["caml_blit_string"];
    $caml_bytes_unsafe_get = $runtime["caml_bytes_unsafe_get"];
    $call1 = $runtime["caml_call1"];
    $call2 = $runtime["caml_call2"];
    $call3 = $runtime["caml_call3"];
    $caml_ml_string_length = $runtime["caml_ml_string_length"];
    $string = $runtime["caml_new_string"];
    $caml_string_equal = $runtime["caml_string_equal"];
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
    $Not_found =  Not_found::get ();
    $Bytes =  Bytes::get ();
    $Pervasives =  Pervasives::get ();
    $bts = $Bytes[42];
    $bos = $Bytes[43];
    $make = (dynamic $n, dynamic $c) ==> {
      return $call1($bts, $call2($Bytes[1], $n, $c));
    };
    $init = (dynamic $n, dynamic $f) ==> {
      return $call1($bts, $call2($Bytes[2], $n, $f));
    };
    $copy = (dynamic $s) ==> {
      $J_ = $call1($bos, $s);
      return $call1($bts, $call1($Bytes[4], $J_));
    };
    $sub = (dynamic $s, dynamic $ofs, dynamic $len) ==> {
      $I_ = $call1($bos, $s);
      return $call1($bts, $call3($Bytes[7], $I_, $ofs, $len));
    };
    $fill = $Bytes[10];
    $blit = $Bytes[12];
    $ensure_ge = (dynamic $x, dynamic $y) ==> {
      return $y <= $x ? $x : ($call1($Pervasives[1], $cst_String_concat));
    };
    $sum_lengths = (dynamic $acc, dynamic $seplen, dynamic $param) ==> {
      $acc__0 = $acc;
      $param__0 = $param;
      for (;;) {
        if ($param__0) {
          $G_ = $param__0[2];
          $H_ = $param__0[1];
          if ($G_) {
            $acc__1 = $ensure_ge(
              (int)
              ((int) ($caml_ml_string_length($H_) + $seplen) + $acc__0),
              $acc__0
            );
            $acc__0 = $acc__1;
            $param__0 = $G_;
            continue;
          }
          return (int) ($caml_ml_string_length($H_) + $acc__0);
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
          $E_ = $param__0[2];
          $F_ = $param__0[1];
          if ($E_) {
            $caml_blit_string(
              $F_,
              0,
              $dst,
              $pos__0,
              $caml_ml_string_length($F_)
            );
            $caml_blit_string(
              $sep,
              0,
              $dst,
              (int)
              ($pos__0 + $caml_ml_string_length($F_)),
              $seplen
            );
            $pos__1 = (int)
            ((int) ($pos__0 + $caml_ml_string_length($F_)) + $seplen);
            $pos__0 = $pos__1;
            $param__0 = $E_;
            continue;
          }
          $caml_blit_string($F_, 0, $dst, $pos__0, $caml_ml_string_length($F_)
          );
          return $dst;
        }
        return $dst;
      }
    };
    $concat = (dynamic $sep, dynamic $l) ==> {
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
    $iter = (dynamic $f, dynamic $s) ==> {
      $C_ = (int) ($caml_ml_string_length($s) + -1);
      $B_ = 0;
      if (! ($C_ < 0)) {
        $i = $B_;
        for (;;) {
          $call1($f, $caml_bytes_unsafe_get($s, $i));
          $D_ = (int) ($i + 1);
          if ($C_ !== $i) {$i = $D_;continue;}
          break;
        }
      }
      return 0;
    };
    $iteri = (dynamic $f, dynamic $s) ==> {
      $z_ = (int) ($caml_ml_string_length($s) + -1);
      $y_ = 0;
      if (! ($z_ < 0)) {
        $i = $y_;
        for (;;) {
          $call2($f, $i, $caml_bytes_unsafe_get($s, $i));
          $A_ = (int) ($i + 1);
          if ($z_ !== $i) {$i = $A_;continue;}
          break;
        }
      }
      return 0;
    };
    $map = (dynamic $f, dynamic $s) ==> {
      $x_ = $call1($bos, $s);
      return $call1($bts, $call2($Bytes[17], $f, $x_));
    };
    $mapi = (dynamic $f, dynamic $s) ==> {
      $w_ = $call1($bos, $s);
      return $call1($bts, $call2($Bytes[18], $f, $w_));
    };
    $is_space = (dynamic $param) ==> {
      $v_ = (int) ($param + -9);
      $switch__0 = 4 < $unsigned_right_shift_32($v_, 0)
        ? 23 === $v_ ? 1 : (0)
        : (2 === $v_ ? 0 : (1));
      return $switch__0 ? 1 : (0);
    };
    $trim = (dynamic $s) ==> {
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
      $u_ = $call1($bos, $s);
      return $call1($bts, $call1($Bytes[19], $u_));
    };
    $escaped = (dynamic $s) ==> {
      $needs_escape = (dynamic $i) ==> {
        $i__0 = $i;
        for (;;) {
          if ($caml_ml_string_length($s) <= $i__0) {return 0;}
          $match = $caml_bytes_unsafe_get($s, $i__0);
          if (32 <= $match) {
            $t_ = (int) ($match + -34);
            if (58 < $unsigned_right_shift_32($t_, 0)) {
              if (93 <= $t_) {
                $switch__0 = 0;
                $switch__1 = 0;
              }
              else {$switch__1 = 1;}
            }
            else {
              if (56 < $unsigned_right_shift_32((int) ($t_ + -1), 0)) {$switch__0 = 1;$switch__1 = 0;}
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
        $s_ = $call1($bos, $s);
        return $call1($bts, $call1($Bytes[20], $s_));
      }
      return $s;
    };
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
      return $index_rec($s, $caml_ml_string_length($s), 0, $c);
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
      return $index_rec_opt($s, $caml_ml_string_length($s), 0, $c);
    };
    $index_from = (dynamic $s, dynamic $i, dynamic $c) ==> {
      $l = $caml_ml_string_length($s);
      if (0 <= $i) {if (! ($l < $i)) {return $index_rec($s, $l, $i, $c);}}
      return $call1($Pervasives[1], $cst_String_index_from_Bytes_index_from);
    };
    $index_from_opt = (dynamic $s, dynamic $i, dynamic $c) ==> {
      $l = $caml_ml_string_length($s);
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
      return $rindex_rec($s, (int) ($caml_ml_string_length($s) + -1), $c);
    };
    $rindex_from = (dynamic $s, dynamic $i, dynamic $c) ==> {
      if (-1 <= $i) {
        if (! ($caml_ml_string_length($s) <= $i)) {return $rindex_rec($s, $i, $c);}
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
      return $rindex_rec_opt($s, (int) ($caml_ml_string_length($s) + -1), $c);
    };
    $rindex_from_opt = (dynamic $s, dynamic $i, dynamic $c) ==> {
      if (-1 <= $i) {
        if (! ($caml_ml_string_length($s) <= $i)) {return $rindex_rec_opt($s, $i, $c);}
      }
      return $call1(
        $Pervasives[1],
        $cst_String_rindex_from_opt_Bytes_rindex_from_opt
      );
    };
    $contains_from = (dynamic $s, dynamic $i, dynamic $c) ==> {
      $l = $caml_ml_string_length($s);
      if (0 <= $i) {
        if (! ($l < $i)) {
          try {$index_rec($s, $l, $i, $c);$q_ = 1;return $q_;}
          catch(\Throwable $r_) {
            $r_ = $runtime["caml_wrap_exception"]($r_);
            if ($r_ === $Not_found) {return 0;}
            throw $caml_wrap_thrown_exception_reraise($r_) as \Throwable;
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
        if (! ($caml_ml_string_length($s) <= $i)) {
          try {$rindex_rec($s, $i, $c);$o_ = 1;return $o_;}
          catch(\Throwable $p_) {
            $p_ = $runtime["caml_wrap_exception"]($p_);
            if ($p_ === $Not_found) {return 0;}
            throw $caml_wrap_thrown_exception_reraise($p_) as \Throwable;
          }
        }
      }
      return $call1(
        $Pervasives[1],
        $cst_String_rcontains_from_Bytes_rcontains_from
      );
    };
    $uppercase_ascii = (dynamic $s) ==> {
      $n_ = $call1($bos, $s);
      return $call1($bts, $call1($Bytes[36], $n_));
    };
    $lowercase_ascii = (dynamic $s) ==> {
      $m_ = $call1($bos, $s);
      return $call1($bts, $call1($Bytes[37], $m_));
    };
    $capitalize_ascii = (dynamic $s) ==> {
      $l_ = $call1($bos, $s);
      return $call1($bts, $call1($Bytes[38], $l_));
    };
    $uncapitalize_ascii = (dynamic $s) ==> {
      $k_ = $call1($bos, $s);
      return $call1($bts, $call1($Bytes[39], $k_));
    };
    $compare = (dynamic $x, dynamic $y) ==> {
      return $runtime["caml_string_compare"]($x, $y);
    };
    $split_on_char = (dynamic $sep, dynamic $s) ==> {
      $r = Vector{0, 0};
      $j = Vector{0, $caml_ml_string_length($s)};
      $g_ = (int) ($caml_ml_string_length($s) + -1);
      if (! ($g_ < 0)) {
        $i = $g_;
        for (;;) {
          if ($caml_bytes_unsafe_get($s, $i) === $sep) {
            $i_ = $r[1];
            $r[1] =
              Vector{
                0,
                $sub($s, (int) ($i + 1), (int) ((int) ($j[1] - $i) + -1)),
                $i_
              };
            $j[1] = $i;
          }
          $j_ = (int) ($i + -1);
          if (0 !== $i) {$i = $j_;continue;}
          break;
        }
      }
      $h_ = $r[1];
      return Vector{0, $sub($s, 0, $j[1]), $h_};
    };
    $uppercase = (dynamic $s) ==> {
      $f_ = $call1($bos, $s);
      return $call1($bts, $call1($Bytes[32], $f_));
    };
    $lowercase = (dynamic $s) ==> {
      $e_ = $call1($bos, $s);
      return $call1($bts, $call1($Bytes[33], $e_));
    };
    $capitalize = (dynamic $s) ==> {
      $d_ = $call1($bos, $s);
      return $call1($bts, $call1($Bytes[34], $d_));
    };
    $uncapitalize = (dynamic $s) ==> {
      $c_ = $call1($bos, $s);
      return $call1($bts, $call1($Bytes[35], $c_));
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
      (dynamic $b_, dynamic $a_) ==> {return $caml_string_equal($b_, $a_);},
      $split_on_char
    };
    
     return ($String);

  }
  public static function make(dynamic $n, dynamic $c): dynamic {
    return static::get()[1]($n, $c);
  }
  public static function init(dynamic $n, dynamic $f): dynamic {
    return static::get()[2]($n, $f);
  }
  public static function copy(dynamic $s): dynamic {
    return static::get()[3]($s);
  }
  public static function sub(dynamic $s, dynamic $ofs, dynamic $len): dynamic {
    return static::get()[4]($s, $ofs, $len);
  }
  public static function fill(): dynamic {
    return static::get()[5]();
  }
  public static function blit(): dynamic {
    return static::get()[6]();
  }
  public static function concat(dynamic $sep, dynamic $l): dynamic {
    return static::get()[7]($sep, $l);
  }
  public static function iter(dynamic $f, dynamic $s): dynamic {
    return static::get()[8]($f, $s);
  }
  public static function iteri(dynamic $f, dynamic $s): dynamic {
    return static::get()[9]($f, $s);
  }
  public static function map(dynamic $f, dynamic $s): dynamic {
    return static::get()[10]($f, $s);
  }
  public static function mapi(dynamic $f, dynamic $s): dynamic {
    return static::get()[11]($f, $s);
  }
  public static function trim(dynamic $s): dynamic {
    return static::get()[12]($s);
  }
  public static function escaped(dynamic $s): dynamic {
    return static::get()[13]($s);
  }
  public static function index(dynamic $s, dynamic $c): dynamic {
    return static::get()[14]($s, $c);
  }
  public static function index_opt(dynamic $s, dynamic $c): dynamic {
    return static::get()[15]($s, $c);
  }
  public static function rindex(dynamic $s, dynamic $c): dynamic {
    return static::get()[16]($s, $c);
  }
  public static function rindex_opt(dynamic $s, dynamic $c): dynamic {
    return static::get()[17]($s, $c);
  }
  public static function index_from(dynamic $s, dynamic $i, dynamic $c): dynamic {
    return static::get()[18]($s, $i, $c);
  }
  public static function index_from_opt(dynamic $s, dynamic $i, dynamic $c): dynamic {
    return static::get()[19]($s, $i, $c);
  }
  public static function rindex_from(dynamic $s, dynamic $i, dynamic $c): dynamic {
    return static::get()[20]($s, $i, $c);
  }
  public static function rindex_from_opt(dynamic $s, dynamic $i, dynamic $c): dynamic {
    return static::get()[21]($s, $i, $c);
  }
  public static function contains(dynamic $s, dynamic $c): dynamic {
    return static::get()[22]($s, $c);
  }
  public static function contains_from(dynamic $s, dynamic $i, dynamic $c): dynamic {
    return static::get()[23]($s, $i, $c);
  }
  public static function rcontains_from(dynamic $s, dynamic $i, dynamic $c): dynamic {
    return static::get()[24]($s, $i, $c);
  }
  public static function uppercase(dynamic $s): dynamic {
    return static::get()[25]($s);
  }
  public static function lowercase(dynamic $s): dynamic {
    return static::get()[26]($s);
  }
  public static function capitalize(dynamic $s): dynamic {
    return static::get()[27]($s);
  }
  public static function uncapitalize(dynamic $s): dynamic {
    return static::get()[28]($s);
  }
  public static function uppercase_ascii(dynamic $s): dynamic {
    return static::get()[29]($s);
  }
  public static function lowercase_ascii(dynamic $s): dynamic {
    return static::get()[30]($s);
  }
  public static function capitalize_ascii(dynamic $s): dynamic {
    return static::get()[31]($s);
  }
  public static function uncapitalize_ascii(dynamic $s): dynamic {
    return static::get()[32]($s);
  }
  public static function compare(dynamic $x, dynamic $y): dynamic {
    return static::get()[33]($x, $y);
  }
  public static function split_on_char(dynamic $sep, dynamic $s): dynamic {
    return static::get()[35]($sep, $s);
  }

}
/* Hashing disabled */
