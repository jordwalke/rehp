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
    $make = function(dynamic $n, dynamic $c) use ($Bytes,$bts,$call1,$call2) {
      return $call1($bts, $call2($Bytes[1], $n, $c));
    };
    $init = function(dynamic $n, dynamic $f) use ($Bytes,$bts,$call1,$call2) {
      return $call1($bts, $call2($Bytes[2], $n, $f));
    };
    $copy = function(dynamic $s) use ($Bytes,$bos,$bts,$call1) {
      $J_ = $call1($bos, $s);
      return $call1($bts, $call1($Bytes[4], $J_));
    };
    $sub = function(dynamic $s, dynamic $ofs, dynamic $len) use ($Bytes,$bos,$bts,$call1,$call3) {
      $I_ = $call1($bos, $s);
      return $call1($bts, $call3($Bytes[7], $I_, $ofs, $len));
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
    $unsafe_blits = function
    (dynamic $dst, dynamic $pos, dynamic $sep, dynamic $seplen, dynamic $param) use ($caml_blit_string,$caml_ml_string_length) {
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
    $iteri = function(dynamic $f, dynamic $s) use ($call2,$caml_bytes_unsafe_get,$caml_ml_string_length) {
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
    $map = function(dynamic $f, dynamic $s) use ($Bytes,$bos,$bts,$call1,$call2) {
      $x_ = $call1($bos, $s);
      return $call1($bts, $call2($Bytes[17], $f, $x_));
    };
    $mapi = function(dynamic $f, dynamic $s) use ($Bytes,$bos,$bts,$call1,$call2) {
      $w_ = $call1($bos, $s);
      return $call1($bts, $call2($Bytes[18], $f, $w_));
    };
    $is_space = function(dynamic $param) use ($unsigned_right_shift_32) {
      $v_ = (int) ($param + -9);
      $switch__0 = 4 < $unsigned_right_shift_32($v_, 0)
        ? 23 === $v_ ? 1 : (0)
        : (2 === $v_ ? 0 : (1));
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
      $u_ = $call1($bos, $s);
      return $call1($bts, $call1($Bytes[19], $u_));
    };
    $escaped = function(dynamic $s) use ($Bytes,$bos,$bts,$call1,$caml_bytes_unsafe_get,$caml_ml_string_length,$unsigned_right_shift_32) {
      $needs_escape = function(dynamic $i) use ($caml_bytes_unsafe_get,$caml_ml_string_length,$s,$unsigned_right_shift_32) {
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
    $index_rec = function(dynamic $s, dynamic $lim, dynamic $i, dynamic $c) use ($Not_found,$caml_bytes_unsafe_get,$caml_wrap_thrown_exception) {
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
    $rindex_rec = function(dynamic $s, dynamic $i, dynamic $c) use ($Not_found,$caml_bytes_unsafe_get,$caml_wrap_thrown_exception) {
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
    $contains_from = function(dynamic $s, dynamic $i, dynamic $c) use ($Not_found,$Pervasives,$call1,$caml_ml_string_length,$caml_wrap_thrown_exception_reraise,$cst_String_contains_from_Bytes_contains_from,$index_rec,$runtime) {
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
    $contains = function(dynamic $s, dynamic $c) use ($contains_from) {
      return $contains_from($s, 0, $c);
    };
    $rcontains_from = function(dynamic $s, dynamic $i, dynamic $c) use ($Not_found,$Pervasives,$call1,$caml_ml_string_length,$caml_wrap_thrown_exception_reraise,$cst_String_rcontains_from_Bytes_rcontains_from,$rindex_rec,$runtime) {
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
    $uppercase_ascii = function(dynamic $s) use ($Bytes,$bos,$bts,$call1) {
      $n_ = $call1($bos, $s);
      return $call1($bts, $call1($Bytes[36], $n_));
    };
    $lowercase_ascii = function(dynamic $s) use ($Bytes,$bos,$bts,$call1) {
      $m_ = $call1($bos, $s);
      return $call1($bts, $call1($Bytes[37], $m_));
    };
    $capitalize_ascii = function(dynamic $s) use ($Bytes,$bos,$bts,$call1) {
      $l_ = $call1($bos, $s);
      return $call1($bts, $call1($Bytes[38], $l_));
    };
    $uncapitalize_ascii = function(dynamic $s) use ($Bytes,$bos,$bts,$call1) {
      $k_ = $call1($bos, $s);
      return $call1($bts, $call1($Bytes[39], $k_));
    };
    $compare = function(dynamic $x, dynamic $y) use ($runtime) {
      return $runtime["caml_string_compare"]($x, $y);
    };
    $split_on_char = function(dynamic $sep, dynamic $s) use ($caml_bytes_unsafe_get,$caml_ml_string_length,$sub) {
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
    $uppercase = function(dynamic $s) use ($Bytes,$bos,$bts,$call1) {
      $f_ = $call1($bos, $s);
      return $call1($bts, $call1($Bytes[32], $f_));
    };
    $lowercase = function(dynamic $s) use ($Bytes,$bos,$bts,$call1) {
      $e_ = $call1($bos, $s);
      return $call1($bts, $call1($Bytes[33], $e_));
    };
    $capitalize = function(dynamic $s) use ($Bytes,$bos,$bts,$call1) {
      $d_ = $call1($bos, $s);
      return $call1($bts, $call1($Bytes[34], $d_));
    };
    $uncapitalize = function(dynamic $s) use ($Bytes,$bos,$bts,$call1) {
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
      function(dynamic $b_, dynamic $a_) use ($caml_string_equal) {
        return $caml_string_equal($b_, $a_);
      },
      $split_on_char
    };
    
     return ($String);

  }
  public static function split_on_char(dynamic $sep, dynamic $s) {
    return static::get()[35]($sep, $s);
  }
  public static function compare(dynamic $x, dynamic $y) {
    return static::get()[33]($x, $y);
  }
  public static function uncapitalize_ascii(dynamic $s) {
    return static::get()[32]($s);
  }
  public static function capitalize_ascii(dynamic $s) {
    return static::get()[31]($s);
  }
  public static function lowercase_ascii(dynamic $s) {
    return static::get()[30]($s);
  }
  public static function uppercase_ascii(dynamic $s) {
    return static::get()[29]($s);
  }
  public static function uncapitalize(dynamic $s) {
    return static::get()[28]($s);
  }
  public static function capitalize(dynamic $s) {
    return static::get()[27]($s);
  }
  public static function lowercase(dynamic $s) {
    return static::get()[26]($s);
  }
  public static function uppercase(dynamic $s) {
    return static::get()[25]($s);
  }
  public static function rcontains_from(dynamic $s, dynamic $i, dynamic $c) {
    return static::get()[24]($s, $i, $c);
  }
  public static function contains_from(dynamic $s, dynamic $i, dynamic $c) {
    return static::get()[23]($s, $i, $c);
  }
  public static function contains(dynamic $s, dynamic $c) {
    return static::get()[22]($s, $c);
  }
  public static function rindex_from_opt(dynamic $s, dynamic $i, dynamic $c) {
    return static::get()[21]($s, $i, $c);
  }
  public static function rindex_from(dynamic $s, dynamic $i, dynamic $c) {
    return static::get()[20]($s, $i, $c);
  }
  public static function index_from_opt(dynamic $s, dynamic $i, dynamic $c) {
    return static::get()[19]($s, $i, $c);
  }
  public static function index_from(dynamic $s, dynamic $i, dynamic $c) {
    return static::get()[18]($s, $i, $c);
  }
  public static function rindex_opt(dynamic $s, dynamic $c) {
    return static::get()[17]($s, $c);
  }
  public static function rindex(dynamic $s, dynamic $c) {
    return static::get()[16]($s, $c);
  }
  public static function index_opt(dynamic $s, dynamic $c) {
    return static::get()[15]($s, $c);
  }
  public static function index(dynamic $s, dynamic $c) {
    return static::get()[14]($s, $c);
  }
  public static function escaped(dynamic $s) {
    return static::get()[13]($s);
  }
  public static function trim(dynamic $s) {
    return static::get()[12]($s);
  }
  public static function mapi(dynamic $f, dynamic $s) {
    return static::get()[11]($f, $s);
  }
  public static function map(dynamic $f, dynamic $s) {
    return static::get()[10]($f, $s);
  }
  public static function iteri(dynamic $f, dynamic $s) {
    return static::get()[9]($f, $s);
  }
  public static function iter(dynamic $f, dynamic $s) {
    return static::get()[8]($f, $s);
  }
  public static function concat(dynamic $sep, dynamic $l) {
    return static::get()[7]($sep, $l);
  }
  public static function blit() {
    return static::get()[6]();
  }
  public static function fill() {
    return static::get()[5]();
  }
  public static function sub(dynamic $s, dynamic $ofs, dynamic $len) {
    return static::get()[4]($s, $ofs, $len);
  }
  public static function copy(dynamic $s) {
    return static::get()[3]($s);
  }
  public static function init(dynamic $n, dynamic $f) {
    return static::get()[2]($n, $f);
  }
  public static function make(dynamic $n, dynamic $c) {
    return static::get()[1]($n, $c);
  }

}
/* Hashing disabled */
