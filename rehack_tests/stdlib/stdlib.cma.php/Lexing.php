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
    $caml_arity_test = $runtime["caml_arity_test"];
    $caml_bytes_get = $runtime["caml_bytes_get"];
    $caml_check_bound = $runtime["caml_check_bound"];
    $caml_create_bytes = $runtime["caml_create_bytes"];
    $caml_ml_bytes_length = $runtime["caml_ml_bytes_length"];
    $caml_new_string = $runtime["caml_new_string"];
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
    $caml_call4 = function($f, $a0, $a1, $a2, $a3) use ($caml_arity_test,$runtime) {
      return $caml_arity_test($f) === 4
        ? $f($a0, $a1, $a2, $a3)
        : ($runtime["caml_call_gen"]($f, varray[$a0,$a1,$a2,$a3]));
    };
    $caml_call5 = function($f, $a0, $a1, $a2, $a3, $a4) use ($caml_arity_test,$runtime) {
      return $caml_arity_test($f) === 5
        ? $f($a0, $a1, $a2, $a3, $a4)
        : ($runtime["caml_call_gen"]($f, varray[$a0,$a1,$a2,$a3,$a4]));
    };
    $global_data = $runtime["caml_get_global_data"]();
    $cst_Lexing_lex_refill_cannot_grow_buffer = $caml_new_string(
      "Lexing.lex_refill: cannot grow buffer"
    );
    $dummy_pos = Vector{0, $caml_new_string(""), 0, 0, -1};
    $zero_pos = Vector{0, $caml_new_string(""), 1, 0, 0};
    $Bytes = $global_data["Bytes"];
    $Pervasives = $global_data["Pervasives"];
    $Sys = $global_data["Sys"];
    $engine = function($tbl, $state, $buf) use ($runtime) {
      $result = $runtime["caml_lex_engine"]($tbl, $state, $buf);
      if (0 <= $result) {
        $buf[11] = $buf[12];
        $e5 = $buf[12];
        $buf[12] =
          Vector{0, $e5[1], $e5[2], $e5[3], (int) ($buf[4] + $buf[6])};
      }
      return $result;
    };
    $new_engine = function($tbl, $state, $buf) use ($runtime) {
      $result = $runtime["caml_new_lex_engine"]($tbl, $state, $buf);
      if (0 <= $result) {
        $buf[11] = $buf[12];
        $e4 = $buf[12];
        $buf[12] =
          Vector{0, $e4[1], $e4[2], $e4[3], (int) ($buf[4] + $buf[6])};
      }
      return $result;
    };
    $lex_refill = function($read_fun, $aux_buffer, $lexbuf) use ($Bytes,$Pervasives,$Sys,$caml_call1,$caml_call2,$caml_call5,$caml_check_bound,$caml_create_bytes,$caml_ml_bytes_length,$cst_Lexing_lex_refill_cannot_grow_buffer) {
      $read = $caml_call2(
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
          $caml_call5(
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
          $newlen = $caml_call2(
            $Pervasives[4],
            (int)
            (2 * $caml_ml_bytes_length($lexbuf[2])),
            $Sys[13]
          );
          if ($newlen < (int) ((int) ($lexbuf[3] - $lexbuf[5]) + $n)) {
            $caml_call1(
              $Pervasives[2],
              $cst_Lexing_lex_refill_cannot_grow_buffer
            );
          }
          $newbuf = $caml_create_bytes($newlen);
          $caml_call5(
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
        $e2 = (int) ($t->count() - 1 + -1);
        $e1 = 0;
        if (! ($e2 < 0)) {
          $i = $e1;
          $continue_counter = null;
          for (;;) {
            $v = $caml_check_bound($t, $i)[$i + 1];
            if (0 <= $v) {
              $caml_check_bound($t, $i)[$i + 1] = (int) ($v - $s);
            }
            $e3 = (int) ($i + 1);
            if ($e2 !== $i) {$i = $e3;continue;}
            break;
          }
        }
      }
      $caml_call5($Bytes[11], $aux_buffer, 0, $lexbuf[2], $lexbuf[3], $n);
      $lexbuf[3] = (int) ($lexbuf[3] + $n);
      return 0;
    };
    $from_function = function($f) use ($caml_create_bytes,$lex_refill,$zero_pos) {
      $eQ = Vector{0};
      $eR = 0;
      $eS = 0;
      $eT = 0;
      $eU = 0;
      $eV = 0;
      $eW = 0;
      $eX = 0;
      $eY = $caml_create_bytes(1024);
      $eZ = $caml_create_bytes(512);
      return Vector{
        0,
        function($e0) use ($eZ,$f,$lex_refill) {
          return $lex_refill($f, $eZ, $e0);
        },
        $eY,
        $eX,
        $eW,
        $eV,
        $eU,
        $eT,
        $eS,
        $eR,
        $eQ,
        $zero_pos,
        $zero_pos
      };
    };
    $from_channel = function($ic) use ($Pervasives,$caml_call4,$from_function) {
      return $from_function(
        function($buf, $n) use ($Pervasives,$caml_call4,$ic) {
          return $caml_call4($Pervasives[72], $ic, $buf, 0, $n);
        }
      );
    };
    $from_string = function($s) use ($Bytes,$caml_call1,$runtime,$zero_pos) {
      $eH = Vector{0};
      $eI = 1;
      $eJ = 0;
      $eK = 0;
      $eL = 0;
      $eM = 0;
      $eN = 0;
      $eO = $runtime["caml_ml_string_length"]($s);
      $eP = $caml_call1($Bytes[5], $s);
      return Vector{
        0,
        function($lexbuf) {$lexbuf[9] = 1;return 0;},
        $eP,
        $eO,
        $eN,
        $eM,
        $eL,
        $eK,
        $eJ,
        $eI,
        $eH,
        $zero_pos,
        $zero_pos
      };
    };
    $lexeme = function($lexbuf) use ($Bytes,$caml_call3) {
      $len = (int) ($lexbuf[6] - $lexbuf[5]);
      return $caml_call3($Bytes[8], $lexbuf[2], $lexbuf[5], $len);
    };
    $sub_lexeme = function($lexbuf, $i1, $i2) use ($Bytes,$caml_call3) {
      $len = (int) ($i2 - $i1);
      return $caml_call3($Bytes[8], $lexbuf[2], $i1, $len);
    };
    $sub_lexeme_opt = function($lexbuf, $i1, $i2) use ($Bytes,$caml_call3) {
      if (0 <= $i1) {
        $len = (int) ($i2 - $i1);
        return Vector{0, $caml_call3($Bytes[8], $lexbuf[2], $i1, $len)};
      }
      return 0;
    };
    $sub_lexeme_char = function($lexbuf, $i) use ($caml_bytes_get) {
      return $caml_bytes_get($lexbuf[2], $i);
    };
    $sub_lexeme_char_opt = function($lexbuf, $i) use ($caml_bytes_get) {
      return 0 <= $i ? Vector{0, $caml_bytes_get($lexbuf[2], $i)} : (0);
    };
    $lexeme_char = function($lexbuf, $i) use ($caml_bytes_get) {
      return $caml_bytes_get($lexbuf[2], (int) ($lexbuf[5] + $i));
    };
    $lexeme_start = function($lexbuf) {return $lexbuf[11][4];};
    $lexeme_end = function($lexbuf) {return $lexbuf[12][4];};
    $lexeme_start_p = function($lexbuf) {return $lexbuf[11];};
    $lexeme_end_p = function($lexbuf) {return $lexbuf[12];};
    $new_line = function($lexbuf) {
      $lcp = $lexbuf[12];
      $lexbuf[12] = Vector{0, $lcp[1], (int) ($lcp[2] + 1), $lcp[4], $lcp[4]};
      return 0;
    };
    $flush_input = function($lb) {
      $lb[6] = 0;
      $lb[4] = 0;
      $eG = $lb[12];
      $lb[12] = Vector{0, $eG[1], $eG[2], $eG[3], 0};
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