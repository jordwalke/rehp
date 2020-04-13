<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class Stdlib__lexing {
  <<__Override, __Memoize>>
  public static function get() : Vector<dynamic> {
    
    $runtime = (\Rehack\GlobalObject::get() as dynamic)->jsoo_runtime;
    $caml_bytes_get = $runtime["caml_bytes_get"];
    $call1 = $runtime["caml_call1"];
    $call2 = $runtime["caml_call2"];
    $call3 = $runtime["caml_call3"];
    $call4 = $runtime["caml_call4"];
    $call5 = $runtime["caml_call5"];
    $caml_check_bound = $runtime["caml_check_bound"];
    $caml_create_bytes = $runtime["caml_create_bytes"];
    $caml_ml_bytes_length = $runtime["caml_ml_bytes_length"];
    $string = $runtime["caml_new_string"];
    $cst_Lexing_lex_refill_cannot_grow_buffer = $string(
      "Lexing.lex_refill: cannot grow buffer"
    );
    $dummy_pos = Vector{0, $string(""), 0, 0, -1} as dynamic;
    $zero_pos = Vector{0, $string(""), 1, 0, 0} as dynamic;
    $Stdlib_bytes = Stdlib__bytes::get();
    $Stdlib = Stdlib::get();
    $Stdlib_sys = Stdlib__sys::get();
    $engine = (dynamic $tbl, dynamic $state, dynamic $buf) : dynamic ==> {
      $I_ = null as dynamic;
      $result = $runtime["caml_lex_engine"]($tbl, $state, $buf);
      $G_ = 0 <= $result ? 1 : (0);
      $H_ = $G_ ? $buf[12] !== $dummy_pos ? 1 : (0) : ($G_);
      if ($H_) {
        $buf[11] = $buf[12];
        $I_ = $buf[12];
        $buf[12] =
          Vector{0, $I_[1], $I_[2], $I_[3], (int) ($buf[4] + $buf[6])};
      }
      return $result;
    };
    $new_engine = (dynamic $tbl, dynamic $state, dynamic $buf) : dynamic ==> {
      $F_ = null as dynamic;
      $result = $runtime["caml_new_lex_engine"]($tbl, $state, $buf);
      $D_ = 0 <= $result ? 1 : (0);
      $E_ = $D_ ? $buf[12] !== $dummy_pos ? 1 : (0) : ($D_);
      if ($E_) {
        $buf[11] = $buf[12];
        $F_ = $buf[12];
        $buf[12] =
          Vector{0, $F_[1], $F_[2], $F_[3], (int) ($buf[4] + $buf[6])};
      }
      return $result;
    };
    $lex_refill = (dynamic $read_fun, dynamic $aux_buffer, dynamic $lexbuf) : dynamic ==> {
      $n = null as dynamic;
      $s = null as dynamic;
      $t = null as dynamic;
      $A_ = null as dynamic;
      $B_ = null as dynamic;
      $i = null as dynamic;
      $v = null as dynamic;
      $C_ = null as dynamic;
      $newlen = null as dynamic;
      $newbuf = null as dynamic;
      $read = $call2(
        $read_fun,
        $aux_buffer,
        $caml_ml_bytes_length($aux_buffer)
      );
      if (0 < $read) {$n = $read;}
      else {$lexbuf[9] = 1;$n = 0 as dynamic;}
      if ($caml_ml_bytes_length($lexbuf[2]) < (int) ($lexbuf[3] + $n)) {
        if (
          (int)
          ((int) ($lexbuf[3] - $lexbuf[5]) + $n) <= $caml_ml_bytes_length($lexbuf[2])
        ) {
          $call5(
            $Stdlib_bytes[11],
            $lexbuf[2],
            $lexbuf[5],
            $lexbuf[2],
            0,
            (int)
            ($lexbuf[3] - $lexbuf[5])
          );
        }
        else {
          $newlen =
            $call2(
              $Stdlib[16],
              (int)
              (2 * $caml_ml_bytes_length($lexbuf[2])),
              $Stdlib_sys[13]
            );
          if ($newlen < (int) ((int) ($lexbuf[3] - $lexbuf[5]) + $n)) {
            $call1($Stdlib[2], $cst_Lexing_lex_refill_cannot_grow_buffer);
          }
          $newbuf = $caml_create_bytes($newlen);
          $call5(
            $Stdlib_bytes[11],
            $lexbuf[2],
            $lexbuf[5],
            $newbuf,
            0,
            (int)
            ($lexbuf[3] - $lexbuf[5])
          );
          $lexbuf[2] = $newbuf;
        }
        $s = $lexbuf[5];
        $lexbuf[4] = (int) ($lexbuf[4] + $s);
        $lexbuf[6] = (int) ($lexbuf[6] - $s);
        $lexbuf[5] = 0;
        $lexbuf[7] = (int) ($lexbuf[7] - $s);
        $lexbuf[3] = (int) ($lexbuf[3] - $s);
        $t = $lexbuf[10];
        $B_ = (int) ($t->count() - 1 + -1) as dynamic;
        $A_ = 0 as dynamic;
        if (! ($B_ < 0)) {
          $i = $A_;
          for (;;) {
            $v = $caml_check_bound($t, $i)[$i + 1];
            if (0 <= $v) {
              $caml_check_bound($t, $i)[$i + 1] = (int) ($v - $s);
            }
            $C_ = (int) ($i + 1) as dynamic;
            if ($B_ !== $i) {$i = $C_;continue;}
            break;
          }
        }
      }
      $call5($Stdlib_bytes[11], $aux_buffer, 0, $lexbuf[2], $lexbuf[3], $n);
      $lexbuf[3] = (int) ($lexbuf[3] + $n);
      return 0;
    };
    $from_function = (dynamic $opt, dynamic $f) : dynamic ==> {
      $with_positions = null as dynamic;
      $sth = null as dynamic;
      if ($opt) {
        $sth = $opt[1];
        $with_positions = $sth;
      }
      else {$with_positions = 1 as dynamic;}
      $n_ = $with_positions ? $zero_pos : ($dummy_pos);
      $o_ = $with_positions ? $zero_pos : ($dummy_pos);
      $p_ = Vector{0} as dynamic;
      $q_ = 0 as dynamic;
      $r_ = 0 as dynamic;
      $s_ = 0 as dynamic;
      $t_ = 0 as dynamic;
      $u_ = 0 as dynamic;
      $v_ = 0 as dynamic;
      $w_ = 0 as dynamic;
      $x_ = $caml_create_bytes(1024);
      $y_ = $caml_create_bytes(512);
      return Vector{
        0,
        (dynamic $z_) : dynamic ==> {return $lex_refill($f, $y_, $z_);},
        $x_,
        $w_,
        $v_,
        $u_,
        $t_,
        $s_,
        $r_,
        $q_,
        $p_,
        $o_,
        $n_
      };
    };
    $from_channel = (dynamic $with_positions, dynamic $ic) : dynamic ==> {
      return $from_function(
        $with_positions,
        (dynamic $buf, dynamic $n) : dynamic ==> {
          return $call4($Stdlib[84], $ic, $buf, 0, $n);
        }
      );
    };
    $from_string = (dynamic $opt, dynamic $s) : dynamic ==> {
      $with_positions = null as dynamic;
      $sth = null as dynamic;
      if ($opt) {
        $sth = $opt[1];
        $with_positions = $sth;
      }
      else {$with_positions = 1 as dynamic;}
      $c_ = $with_positions ? $zero_pos : ($dummy_pos);
      $d_ = $with_positions ? $zero_pos : ($dummy_pos);
      $e_ = Vector{0} as dynamic;
      $f_ = 1 as dynamic;
      $g_ = 0 as dynamic;
      $h_ = 0 as dynamic;
      $i_ = 0 as dynamic;
      $j_ = 0 as dynamic;
      $k_ = 0 as dynamic;
      $l_ = $runtime["caml_ml_string_length"]($s);
      $m_ = $call1($Stdlib_bytes[5], $s);
      return Vector{
        0,
        (dynamic $lexbuf) : dynamic ==> {$lexbuf[9] = 1;return 0;},
        $m_,
        $l_,
        $k_,
        $j_,
        $i_,
        $h_,
        $g_,
        $f_,
        $e_,
        $d_,
        $c_
      };
    };
    $with_positions = (dynamic $lexbuf) : dynamic ==> {
      return $lexbuf[12] !== $dummy_pos ? 1 : (0);
    };
    $lexeme = (dynamic $lexbuf) : dynamic ==> {
      $len = (int) ($lexbuf[6] - $lexbuf[5]) as dynamic;
      return $call3($Stdlib_bytes[8], $lexbuf[2], $lexbuf[5], $len);
    };
    $sub_lexeme = (dynamic $lexbuf, dynamic $i1, dynamic $i2) : dynamic ==> {
      $len = (int) ($i2 - $i1) as dynamic;
      return $call3($Stdlib_bytes[8], $lexbuf[2], $i1, $len);
    };
    $sub_lexeme_opt = (dynamic $lexbuf, dynamic $i1, dynamic $i2) : dynamic ==> {
      $len = null as dynamic;
      if (0 <= $i1) {
        $len = (int) ($i2 - $i1) as dynamic;
        return Vector{0, $call3($Stdlib_bytes[8], $lexbuf[2], $i1, $len)};
      }
      return 0;
    };
    $sub_lexeme_char = (dynamic $lexbuf, dynamic $i) : dynamic ==> {
      return $caml_bytes_get($lexbuf[2], $i);
    };
    $sub_lexeme_char_opt = (dynamic $lexbuf, dynamic $i) : dynamic ==> {
      return 0 <= $i ? Vector{0, $caml_bytes_get($lexbuf[2], $i)} : (0);
    };
    $lexeme_char = (dynamic $lexbuf, dynamic $i) : dynamic ==> {
      return $caml_bytes_get($lexbuf[2], (int) ($lexbuf[5] + $i));
    };
    $lexeme_start = (dynamic $lexbuf) : dynamic ==> {return $lexbuf[11][4];};
    $lexeme_end = (dynamic $lexbuf) : dynamic ==> {return $lexbuf[12][4];};
    $lexeme_start_p = (dynamic $lexbuf) : dynamic ==> {return $lexbuf[11];};
    $lexeme_end_p = (dynamic $lexbuf) : dynamic ==> {return $lexbuf[12];};
    $new_line = (dynamic $lexbuf) : dynamic ==> {
      $b_ = null as dynamic;
      $lcp = $lexbuf[12];
      $a_ = $lcp !== $dummy_pos ? 1 : (0);
      if ($a_) {
        $lexbuf[12] =
          Vector{0, $lcp[1], (int) ($lcp[2] + 1), $lcp[4], $lcp[4]};
        $b_ = 0 as dynamic;
      }
      else {$b_ = $a_;}
      return $b_;
    };
    $flush_input = (dynamic $lb) : dynamic ==> {
      $lb[6] = 0;
      $lb[4] = 0;
      $lcp = $lb[12];
      if ($lcp !== $dummy_pos) {
        $lb[12] =
          Vector{0, $lcp[1], $zero_pos[2], $zero_pos[3], $zero_pos[4]};
      }
      $lb[3] = 0;
      return 0;
    };
    $Stdlib_lexing = Vector{
      0,
      $dummy_pos,
      $from_channel,
      $from_string,
      $from_function,
      $with_positions,
      $lexeme,
      $lexeme_char,
      $lexeme_start,
      $lexeme_end,
      $lexeme_start_p,
      $lexeme_end_p,
      $new_line,
      $flush_input,
      $sub_lexeme,
      $sub_lexeme_opt,
      $sub_lexeme_char,
      $sub_lexeme_char_opt,
      $engine,
      $new_engine
    } as dynamic;
    
    return($Stdlib_lexing);

  }
  public static function from_channel(dynamic $with_positions, dynamic $ic): dynamic {
    return static::syncCall(__FUNCTION__, 2, $with_positions, $ic);
  }
  public static function from_string(dynamic $opt, dynamic $s): dynamic {
    return static::syncCall(__FUNCTION__, 3, $opt, $s);
  }
  public static function from_function(dynamic $opt, dynamic $f): dynamic {
    return static::syncCall(__FUNCTION__, 4, $opt, $f);
  }
  public static function with_positions(dynamic $lexbuf): dynamic {
    return static::syncCall(__FUNCTION__, 5, $lexbuf);
  }
  public static function lexeme(dynamic $lexbuf): dynamic {
    return static::syncCall(__FUNCTION__, 6, $lexbuf);
  }
  public static function lexeme_char(dynamic $lexbuf, dynamic $i): dynamic {
    return static::syncCall(__FUNCTION__, 7, $lexbuf, $i);
  }
  public static function lexeme_start(dynamic $lexbuf): dynamic {
    return static::syncCall(__FUNCTION__, 8, $lexbuf);
  }
  public static function lexeme_end(dynamic $lexbuf): dynamic {
    return static::syncCall(__FUNCTION__, 9, $lexbuf);
  }
  public static function lexeme_start_p(dynamic $lexbuf): dynamic {
    return static::syncCall(__FUNCTION__, 10, $lexbuf);
  }
  public static function lexeme_end_p(dynamic $lexbuf): dynamic {
    return static::syncCall(__FUNCTION__, 11, $lexbuf);
  }
  public static function new_line(dynamic $lexbuf): dynamic {
    return static::syncCall(__FUNCTION__, 12, $lexbuf);
  }
  public static function flush_input(dynamic $lb): dynamic {
    return static::syncCall(__FUNCTION__, 13, $lb);
  }
  public static function sub_lexeme(dynamic $lexbuf, dynamic $i1, dynamic $i2): dynamic {
    return static::syncCall(__FUNCTION__, 14, $lexbuf, $i1, $i2);
  }
  public static function sub_lexeme_opt(dynamic $lexbuf, dynamic $i1, dynamic $i2): dynamic {
    return static::syncCall(__FUNCTION__, 15, $lexbuf, $i1, $i2);
  }
  public static function sub_lexeme_char(dynamic $lexbuf, dynamic $i): dynamic {
    return static::syncCall(__FUNCTION__, 16, $lexbuf, $i);
  }
  public static function sub_lexeme_char_opt(dynamic $lexbuf, dynamic $i): dynamic {
    return static::syncCall(__FUNCTION__, 17, $lexbuf, $i);
  }
  public static function engine(dynamic $tbl, dynamic $state, dynamic $buf): dynamic {
    return static::syncCall(__FUNCTION__, 18, $tbl, $state, $buf);
  }
  public static function new_engine(dynamic $tbl, dynamic $state, dynamic $buf): dynamic {
    return static::syncCall(__FUNCTION__, 19, $tbl, $state, $buf);
  }

}
/* Hashing disabled */
