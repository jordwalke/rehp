<?hh
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * Lexing.php
 */

namespace Rehack;

final class Lexing {
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
    $Sys = Sys::get();
    Lexing::load($global_object);
    $memoized = $runtime->caml_get_global_data()->Lexing;
    return $memoized;
  }

  /**
   * Performs module load operation. May have side effects.
   */
  private static function load($joo_global_object) {
    

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
    $global_data = $runtime["caml_get_global_data"]();
    $cst_Lexing_lex_refill_cannot_grow_buffer = $string(
      "Lexing.lex_refill: cannot grow buffer"
    );
    $dummy_pos = Vector{0, $string(""), 0, 0, -1};
    $zero_pos = Vector{0, $string(""), 1, 0, 0};
    $Bytes = $global_data["Bytes"];
    $Pervasives = $global_data["Pervasives"];
    $Sys = $global_data["Sys"];
    $engine = function(dynamic $tbl, dynamic $state, dynamic $buf) use ($runtime) {
      $result = $runtime["caml_lex_engine"]($tbl, $state, $buf);
      if (0 <= $result) {
        $buf[11] = $buf[12];
        $z = $buf[12];
        $buf[12] = Vector{0, $z[1], $z[2], $z[3], (int) ($buf[4] + $buf[6])};
      }
      return $result;
    };
    $new_engine = function(dynamic $tbl, dynamic $state, dynamic $buf) use ($runtime) {
      $result = $runtime["caml_new_lex_engine"]($tbl, $state, $buf);
      if (0 <= $result) {
        $buf[11] = $buf[12];
        $y = $buf[12];
        $buf[12] = Vector{0, $y[1], $y[2], $y[3], (int) ($buf[4] + $buf[6])};
      }
      return $result;
    };
    $lex_refill = function
    (dynamic $read_fun, dynamic $aux_buffer, dynamic $lexbuf) use ($Bytes,$Pervasives,$Sys,$call1,$call2,$call5,$caml_check_bound,$caml_create_bytes,$caml_ml_bytes_length,$cst_Lexing_lex_refill_cannot_grow_buffer) {
      $read = $call2(
        $read_fun,
        $aux_buffer,
        $caml_ml_bytes_length($aux_buffer)
      );
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
          $newlen = $call2(
            $Pervasives[4],
            (int)
            (2 * $caml_ml_bytes_length($lexbuf[2])),
            $Sys[13]
          );
          if ($newlen < (int) ((int) ($lexbuf[3] - $lexbuf[5]) + $n)) {
            $call1($Pervasives[2], $cst_Lexing_lex_refill_cannot_grow_buffer);
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
        $w = (int) ($t->count() - 1 + -1);
        $v = 0;
        if (! ($w < 0)) {
          $i = $v;
          for (;;) {
            $v__0 = $caml_check_bound($t, $i)[$i + 1];
            if (0 <= $v__0) {
              $caml_check_bound($t, $i)[$i + 1] = (int) ($v__0 - $s);
            }
            $x = (int) ($i + 1);
            if ($w !== $i) {$i = $x;continue;}
            break;
          }
        }
      }
      $call5($Bytes[11], $aux_buffer, 0, $lexbuf[2], $lexbuf[3], $n);
      $lexbuf[3] = (int) ($lexbuf[3] + $n);
      return 0;
    };
    $from_function = function(dynamic $f) use ($caml_create_bytes,$lex_refill,$zero_pos) {
      $k = Vector{0};
      $l = 0;
      $m = 0;
      $n = 0;
      $o = 0;
      $p = 0;
      $q = 0;
      $r = 0;
      $s = $caml_create_bytes(1024);
      $t = $caml_create_bytes(512);
      return Vector{
        0,
        function(dynamic $u) use ($f,$lex_refill,$t) {
          return $lex_refill($f, $t, $u);
        },
        $s,
        $r,
        $q,
        $p,
        $o,
        $n,
        $m,
        $l,
        $k,
        $zero_pos,
        $zero_pos
      };
    };
    $from_channel = function(dynamic $ic) use ($Pervasives,$call4,$from_function) {
      return $from_function(
        function(dynamic $buf, dynamic $n) use ($Pervasives,$call4,$ic) {
          return $call4($Pervasives[72], $ic, $buf, 0, $n);
        }
      );
    };
    $from_string = function(dynamic $s) use ($Bytes,$call1,$runtime,$zero_pos) {
      $b = Vector{0};
      $c = 1;
      $d = 0;
      $e = 0;
      $f = 0;
      $g = 0;
      $h = 0;
      $i = $runtime["caml_ml_string_length"]($s);
      $j = $call1($Bytes[5], $s);
      return Vector{
        0,
        function(dynamic $lexbuf) {$lexbuf[9] = 1;return 0;},
        $j,
        $i,
        $h,
        $g,
        $f,
        $e,
        $d,
        $c,
        $b,
        $zero_pos,
        $zero_pos
      };
    };
    $lexeme = function(dynamic $lexbuf) use ($Bytes,$call3) {
      $len = (int) ($lexbuf[6] - $lexbuf[5]);
      return $call3($Bytes[8], $lexbuf[2], $lexbuf[5], $len);
    };
    $sub_lexeme = function(dynamic $lexbuf, dynamic $i1, dynamic $i2) use ($Bytes,$call3) {
      $len = (int) ($i2 - $i1);
      return $call3($Bytes[8], $lexbuf[2], $i1, $len);
    };
    $sub_lexeme_opt = function(dynamic $lexbuf, dynamic $i1, dynamic $i2) use ($Bytes,$call3) {
      if (0 <= $i1) {
        $len = (int) ($i2 - $i1);
        return Vector{0, $call3($Bytes[8], $lexbuf[2], $i1, $len)};
      }
      return 0;
    };
    $sub_lexeme_char = function(dynamic $lexbuf, dynamic $i) use ($caml_bytes_get) {
      return $caml_bytes_get($lexbuf[2], $i);
    };
    $sub_lexeme_char_opt = function(dynamic $lexbuf, dynamic $i) use ($caml_bytes_get) {
      return 0 <= $i ? Vector{0, $caml_bytes_get($lexbuf[2], $i)} : (0);
    };
    $lexeme_char = function(dynamic $lexbuf, dynamic $i) use ($caml_bytes_get) {
      return $caml_bytes_get($lexbuf[2], (int) ($lexbuf[5] + $i));
    };
    $lexeme_start = function(dynamic $lexbuf) {return $lexbuf[11][4];};
    $lexeme_end = function(dynamic $lexbuf) {return $lexbuf[12][4];};
    $lexeme_start_p = function(dynamic $lexbuf) {return $lexbuf[11];};
    $lexeme_end_p = function(dynamic $lexbuf) {return $lexbuf[12];};
    $new_line = function(dynamic $lexbuf) {
      $lcp = $lexbuf[12];
      $lexbuf[12] = Vector{0, $lcp[1], (int) ($lcp[2] + 1), $lcp[4], $lcp[4]};
      return 0;
    };
    $flush_input = function(dynamic $lb) {
      $lb[6] = 0;
      $lb[4] = 0;
      $a = $lb[12];
      $lb[12] = Vector{0, $a[1], $a[2], $a[3], 0};
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
    };
    
    $runtime["caml_register_global"](6, $Lexing, "Lexing");

  }
}