<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class Lexing {
  <<__Override, __Memoize>>
  public static function requireModule() : Vector<dynamic> {
    $joo_global_object = \Rehack\GlobalObject::get() as dynamic;
    
    $runtime = $joo_global_object->jsoo_runtime;
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
    $Bytes =  Bytes::requireModule ();
    $Pervasives =  Pervasives::requireModule ();
    $Sys =  Sys::requireModule ();
    $engine = (dynamic $tbl, dynamic $state, dynamic $buf) ==> {
      $x_ = null;
      $result = $runtime["caml_lex_engine"]($tbl, $state, $buf);
      if (0 <= $result) {
        $buf[11] = $buf[12];
        $x_ = $buf[12];
        $buf[12] =
          Vector{0, $x_[1], $x_[2], $x_[3], (int) ($buf[4] + $buf[6])};
      }
      return $result;
    };
    $new_engine = (dynamic $tbl, dynamic $state, dynamic $buf) ==> {
      $w_ = null;
      $result = $runtime["caml_new_lex_engine"]($tbl, $state, $buf);
      if (0 <= $result) {
        $buf[11] = $buf[12];
        $w_ = $buf[12];
        $buf[12] =
          Vector{0, $w_[1], $w_[2], $w_[3], (int) ($buf[4] + $buf[6])};
      }
      return $result;
    };
    $from_function = (dynamic $f) ==> {
      $aux_buffer = $caml_create_bytes(512);
      $k_ = Vector{0} as dynamic;
      $l_ = 0;
      $m_ = 0;
      $n_ = 0;
      $o_ = 0;
      $p_ = 0;
      $q_ = 0;
      $r_ = 0;
      $s_ = $caml_create_bytes(1024);
      return Vector{
        0,
        (dynamic $lexbuf) ==> {
          $n = null;
          $s = null;
          $t = null;
          $t_ = null;
          $u_ = null;
          $i = null;
          $v = null;
          $v_ = null;
          $newlen = null;
          $newbuf = null;
          $read = $call2($f, $aux_buffer, $caml_ml_bytes_length($aux_buffer));
          if (0 < $read) {$n = $read;}
          else {$lexbuf[9] = 1;$n = 0;}
          if ($caml_ml_bytes_length($lexbuf[2]) < (int) ($lexbuf[3] + $n)) {
            if (
              (int)
              ((int) ($lexbuf[3] - $lexbuf[5]) + $n) <= $caml_ml_bytes_length($lexbuf[2])
            ) {
              $call5(
                $Bytes[11],
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
                  $Pervasives[4],
                  (int)
                  (2 * $caml_ml_bytes_length($lexbuf[2])),
                  $Sys[13]
                );
              if ($newlen < (int) ((int) ($lexbuf[3] - $lexbuf[5]) + $n)) {
                $call1(
                  $Pervasives[2],
                  $cst_Lexing_lex_refill_cannot_grow_buffer
                );
              }
              $newbuf = $caml_create_bytes($newlen);
              $call5(
                $Bytes[11],
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
            $u_ = (int) ($t->count() - 1 + -1);
            $t_ = 0;
            if (! ($u_ < 0)) {
              $i = $t_;
              for (;;) {
                $v = $caml_check_bound($t, $i)[$i + 1];
                if (0 <= $v) {
                  $caml_check_bound($t, $i)[$i + 1] = (int) ($v - $s);
                }
                $v_ = (int) ($i + 1);
                if ($u_ !== $i) {$i = $v_;continue;}
                break;
              }
            }
          }
          $call5($Bytes[11], $aux_buffer, 0, $lexbuf[2], $lexbuf[3], $n);
          $lexbuf[3] = (int) ($lexbuf[3] + $n);
          return 0;
        },
        $s_,
        $r_,
        $q_,
        $p_,
        $o_,
        $n_,
        $m_,
        $l_,
        $k_,
        $zero_pos,
        $zero_pos
      };
    };
    $from_channel = (dynamic $ic) ==> {
      return $from_function(
        (dynamic $buf, dynamic $n) ==> {
          return $call4($Pervasives[72], $ic, $buf, 0, $n);
        }
      );
    };
    $from_string = (dynamic $s) ==> {
      $b_ = Vector{0} as dynamic;
      $c_ = 1;
      $d_ = 0;
      $e_ = 0;
      $f_ = 0;
      $g_ = 0;
      $h_ = 0;
      $i_ = $runtime["caml_ml_string_length"]($s);
      $j_ = $call1($Bytes[5], $s);
      return Vector{
        0,
        (dynamic $lexbuf) ==> {$lexbuf[9] = 1;return 0;},
        $j_,
        $i_,
        $h_,
        $g_,
        $f_,
        $e_,
        $d_,
        $c_,
        $b_,
        $zero_pos,
        $zero_pos
      };
    };
    $lexeme = (dynamic $lexbuf) ==> {
      $len = (int) ($lexbuf[6] - $lexbuf[5]);
      return $call3($Bytes[8], $lexbuf[2], $lexbuf[5], $len);
    };
    $sub_lexeme = (dynamic $lexbuf, dynamic $i1, dynamic $i2) ==> {
      $len = (int) ($i2 - $i1);
      return $call3($Bytes[8], $lexbuf[2], $i1, $len);
    };
    $sub_lexeme_opt = (dynamic $lexbuf, dynamic $i1, dynamic $i2) ==> {
      $len = null;
      if (0 <= $i1) {
        $len = (int) ($i2 - $i1);
        return Vector{0, $call3($Bytes[8], $lexbuf[2], $i1, $len)};
      }
      return 0;
    };
    $sub_lexeme_char = (dynamic $lexbuf, dynamic $i) ==> {
      return $caml_bytes_get($lexbuf[2], $i);
    };
    $sub_lexeme_char_opt = (dynamic $lexbuf, dynamic $i) ==> {
      return 0 <= $i ? Vector{0, $caml_bytes_get($lexbuf[2], $i)} : (0);
    };
    $lexeme_char = (dynamic $lexbuf, dynamic $i) ==> {
      return $caml_bytes_get($lexbuf[2], (int) ($lexbuf[5] + $i));
    };
    $lexeme_start = (dynamic $lexbuf) ==> {return $lexbuf[11][4];};
    $lexeme_end = (dynamic $lexbuf) ==> {return $lexbuf[12][4];};
    $lexeme_start_p = (dynamic $lexbuf) ==> {return $lexbuf[11];};
    $lexeme_end_p = (dynamic $lexbuf) ==> {return $lexbuf[12];};
    $new_line = (dynamic $lexbuf) ==> {
      $lcp = $lexbuf[12];
      $lexbuf[12] = Vector{0, $lcp[1], (int) ($lcp[2] + 1), $lcp[4], $lcp[4]};
      return 0;
    };
    $flush_input = (dynamic $lb) ==> {
      $lb[6] = 0;
      $lb[4] = 0;
      $a_ = $lb[12];
      $lb[12] = Vector{0, $a_[1], $a_[2], $a_[3], 0};
      $lb[3] = 0;
      return 0;
    };
    $Lexing = Vector{
      0,
      $dummy_pos,
      $from_channel,
      $from_string,
      $from_function,
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
    
     return ($Lexing);

  }
  public static function from_channel(dynamic $ic): dynamic {
    return static::callRehackFunction(static::requireModule()[2], varray[$ic]);
  }
  public static function from_string(dynamic $s): dynamic {
    return static::callRehackFunction(static::requireModule()[3], varray[$s]);
  }
  public static function _from_function_(dynamic $f): dynamic {
    return static::callRehackFunction(static::requireModule()[4], varray[$f]);
  }
  public static function lexeme(dynamic $lexbuf): dynamic {
    return static::callRehackFunction(static::requireModule()[5], varray[$lexbuf]);
  }
  public static function _lexeme_char_(dynamic $lexbuf, dynamic $i): dynamic {
    return static::callRehackFunction(static::requireModule()[6], varray[$lexbuf, $i]);
  }
  public static function lexeme_start(dynamic $lexbuf): dynamic {
    return static::callRehackFunction(static::requireModule()[7], varray[$lexbuf]);
  }
  public static function lexeme_end(dynamic $lexbuf): dynamic {
    return static::callRehackFunction(static::requireModule()[8], varray[$lexbuf]);
  }
  public static function lexeme_start_p(dynamic $lexbuf): dynamic {
    return static::callRehackFunction(static::requireModule()[9], varray[$lexbuf]);
  }
  public static function lexeme_end_p(dynamic $lexbuf): dynamic {
    return static::callRehackFunction(static::requireModule()[10], varray[$lexbuf]);
  }
  public static function new_line(dynamic $lexbuf): dynamic {
    return static::callRehackFunction(static::requireModule()[11], varray[$lexbuf]);
  }
  public static function flush_input(dynamic $lb): dynamic {
    return static::callRehackFunction(static::requireModule()[12], varray[$lb]);
  }
  public static function sub_lexeme(dynamic $lexbuf, dynamic $i1, dynamic $i2): dynamic {
    return static::callRehackFunction(static::requireModule()[13], varray[$lexbuf, $i1, $i2]);
  }
  public static function sub_lexeme_opt(dynamic $lexbuf, dynamic $i1, dynamic $i2): dynamic {
    return static::callRehackFunction(static::requireModule()[14], varray[$lexbuf, $i1, $i2]);
  }
  public static function sub_lexeme_char(dynamic $lexbuf, dynamic $i): dynamic {
    return static::callRehackFunction(static::requireModule()[15], varray[$lexbuf, $i]);
  }
  public static function sub_lexeme_char_opt(dynamic $lexbuf, dynamic $i): dynamic {
    return static::callRehackFunction(static::requireModule()[16], varray[$lexbuf, $i]);
  }
  public static function engine(dynamic $tbl, dynamic $state, dynamic $buf): dynamic {
    return static::callRehackFunction(static::requireModule()[17], varray[$tbl, $state, $buf]);
  }
  public static function new_engine(dynamic $tbl, dynamic $state, dynamic $buf): dynamic {
    return static::callRehackFunction(static::requireModule()[18], varray[$tbl, $state, $buf]);
  }

}
/* Hashing disabled */
