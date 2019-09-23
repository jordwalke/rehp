<?hh
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * Scanf.php
 */

namespace Rehack;

final class Scanf {
  <<__Memoize>>
  public static function get() {
    $global_object = \Rehack\GlobalObject::get();
    $runtime = \Rehack\Runtime::get();
    /*
     * Soon, these will replace the `global_data->ModuleName`
     * pattern in the load() function.
     */
    $Buffer = Buffer::get();
    $Bytes = Bytes::get();
    $CamlinternalFormat = CamlinternalFormat::get();
    $CamlinternalFormatBasics = CamlinternalFormatBasics::get();
    $List_ = List_::get();
    $Pervasives = Pervasives::get();
    $Printf = Printf::get();
    $String_ = String_::get();
    $Invalid_argument = Invalid_argument::get();
    $Failure = Failure::get();
    $Not_found = Not_found::get();
    $End_of_file = End_of_file::get();
    $Assert_failure = Assert_failure::get();
    Scanf::load($global_object);
    $memoized = $runtime->caml_get_global_data()->Scanf;
    return $memoized;
  }

  /**
   * Performs module load operation. May have side effects.
   */
  private static function load($joo_global_object) {
    

    $make_scanf = new Ref();
    $take_fmtty_format_readers = new Ref();
    $take_fmtty_format_readers__0 = new Ref();
    $take_format_readers = new Ref();
    $take_ignored_format_readers = new Ref();
    $runtime = $joo_global_object->jsoo_runtime;
    $caml_bytes_get = $runtime["caml_bytes_get"];
    $call1 = $runtime["caml_call1"];
    $call2 = $runtime["caml_call2"];
    $call3 = $runtime["caml_call3"];
    $call4 = $runtime["caml_call4"];
    $caml_int_of_string = $runtime["caml_int_of_string"];
    $caml_ml_string_length = $runtime["caml_ml_string_length"];
    $string = $runtime["caml_new_string"];
    $caml_string_get = $runtime["caml_string_get"];
    $caml_string_notequal = $runtime["caml_string_notequal"];
    $caml_trampoline = $runtime["caml_trampoline"];
    $caml_trampoline_return = $runtime["caml_trampoline_return"];
    $caml_wrap_exception = $runtime["caml_wrap_exception"];
    $is_int = $runtime["is_int"];
    $unsigned_right_shift_32 = $runtime["unsigned_right_shift_32"];
    $global_data = $runtime["caml_get_global_data"]();
    $cst_end_of_input_not_found = $string("end of input not found");
    $cst_scanf_bad_conversion_a = $string("scanf: bad conversion \"%a\"");
    $cst_scanf_bad_conversion_t = $string("scanf: bad conversion \"%t\"");
    $cst_scanf_missing_reader = $string("scanf: missing reader");
    $cst_scanf_bad_conversion_custom_converter = $string(
      "scanf: bad conversion \"%?\" (custom converter)"
    );
    $cst_scanf_bad_conversion = $string("scanf: bad conversion \"%*\"");
    $cst_scanf_bad_conversion__1 = $string("scanf: bad conversion \"%*\"");
    $cst_scanf_bad_conversion__0 = $string("scanf: bad conversion \"%-\"");
    $cst_scanf_bad_conversion__2 = $string("scanf: bad conversion \"%*\"");
    $cst__2 = $string("\"");
    $cst__3 = $string("\"");
    $cst__1 = $string("\"");
    $cst_in_format = $string(" in format \"");
    $cst_an = $string("an");
    $cst_x = $string("x");
    $cst_nfinity = $string("nfinity");
    $cst_digits = $string("digits");
    $cst_decimal_digits = $string("decimal digits");
    $cst_0b = $string("0b");
    $cst_0o = $string("0o");
    $cst_0u = $string("0u");
    $cst_0x = $string("0x");
    $cst_false = $string("false");
    $cst_true = $string("true");
    $cst_not_a_valid_float_in_hexadecimal_notation = $string(
      "not a valid float in hexadecimal notation"
    );
    $cst_no_dot_or_exponent_part_found_in_float_token = $string(
      "no dot or exponent part found in float token"
    );
    $cst__0 = $string("-");
    $cst_unnamed_function = $string("unnamed function");
    $cst_unnamed_character_string = $string("unnamed character string");
    $cst_unnamed_Pervasives_input_channel = $string(
      "unnamed Pervasives input channel"
    );
    $cst = $string("-");
    $cst_Scanf_Scan_failure = $string("Scanf.Scan_failure");
    $cst_binary = $string("binary");
    $cst_octal = $string("octal");
    $cst_hexadecimal = $string("hexadecimal");
    $cst_a_Char = $string("a Char");
    $cst_a_String = $string("a String");
    $CamlinternalFormat = $global_data["CamlinternalFormat"];
    $CamlinternalFormatBasics = $global_data["CamlinternalFormatBasics"];
    $String = $global_data["String_"];
    $Failure = $global_data["Failure"];
    $Pervasives = $global_data["Pervasives"];
    $Assert_failure = $global_data["Assert_failure"];
    $Buffer = $global_data["Buffer"];
    $End_of_file = $global_data["End_of_file"];
    $Invalid_argument = $global_data["Invalid_argument"];
    $Printf = $global_data["Printf"];
    $List = $global_data["List_"];
    $Not_found = $global_data["Not_found"];
    $r = Vector{0, 91};
    $q = Vector{0, 123};
    $s = Vector{0, $string("scanf.ml"), 1455, 13};
    $t = Vector{0, Vector{3, 0, Vector{10, 0}}, $string("%S%!")};
    $p = Vector{0, 37, $string("")};
    $o = Vector{
      0,
      Vector{
        11,
        $string("scanf: bad input at char number "),
        Vector{4, 3, 0, 0, Vector{11, $string(": "), Vector{2, 0, 0}}}
      },
      $string("scanf: bad input at char number %i: %s")
    };
    $n = Vector{
      0,
      Vector{
        11,
        $string("the character "),
        Vector{1, Vector{11, $string(" cannot start a boolean"), 0}}
      },
      $string("the character %C cannot start a boolean")
    };
    $m = Vector{
      0,
      Vector{
        11,
        $string("bad character hexadecimal encoding \\"),
        Vector{0, Vector{0, 0}}
      },
      $string("bad character hexadecimal encoding \\%c%c")
    };
    $l = Vector{
      0,
      Vector{
        11,
        $string("bad character decimal encoding \\"),
        Vector{0, Vector{0, Vector{0, 0}}}
      },
      $string("bad character decimal encoding \\%c%c%c")
    };
    $k = Vector{
      0,
      Vector{
        11,
        $string("character "),
        Vector{
          1,
          Vector{
            11,
            $string(" is not a valid "),
            Vector{2, 0, Vector{11, $string(" digit"), 0}}
          }
        }
      },
      $string("character %C is not a valid %s digit")
    };
    $j = Vector{
      0,
      Vector{
        11,
        $string("character "),
        Vector{1, Vector{11, $string(" is not a decimal digit"), 0}}
      },
      $string("character %C is not a decimal digit")
    };
    $i = Vector{0, $string("scanf.ml"), 555, 9};
    $h = Vector{
      0,
      Vector{11, $string("invalid boolean '"), Vector{2, 0, Vector{12, 39, 0}}
      },
      $string("invalid boolean '%s'")
    };
    $g = Vector{
      0,
      Vector{
        11,
        $string("looking for "),
        Vector{1, Vector{11, $string(", found "), Vector{1, 0}}}
      },
      $string("looking for %C, found %C")
    };
    $f = Vector{
      0,
      Vector{
        11,
        $string("scanning of "),
        Vector{
          2,
          0,
          Vector{
            11,
            $string(
              " failed: premature end of file occurred before end of token"
            ),
            0
          }
        }
      },
      $string(
        "scanning of %s failed: premature end of file occurred before end of token"
      )
    };
    $e = Vector{
      0,
      Vector{
        11,
        $string("scanning of "),
        Vector{
          2,
          0,
          Vector{
            11,
            $string(" failed: the specified length was too short for token"),
            0
          }
        }
      },
      $string(
        "scanning of %s failed: the specified length was too short for token"
      )
    };
    $d = Vector{
      0,
      Vector{11, $string("illegal escape character "), Vector{1, 0}},
      $string("illegal escape character %C")
    };
    $null_char = 0;
    $next_char = function(dynamic $ib) use ($End_of_file,$call1,$caml_wrap_exception,$null_char,$runtime) {
      try {
        $c = $call1($ib[7], 0);
        $ib[2] = $c;
        $ib[3] = 1;
        $ib[4] = (int) ($ib[4] + 1);
        if (10 === $c) {$ib[5] = (int) ($ib[5] + 1);}
        return $c;
      }
      catch(\Throwable $bH) {
        $bH = $caml_wrap_exception($bH);
        if ($bH === $End_of_file) {
          $ib[2] = $null_char;
          $ib[3] = 0;
          $ib[1] = 1;
          return $null_char;
        }
        throw $runtime["caml_wrap_thrown_exception_reraise"]($bH) as \Throwable;
      }
    };
    $peek_char = function(dynamic $ib) use ($next_char) {
      return $ib[3] ? $ib[2] : ($next_char($ib));
    };
    $checked_peek_char = function(dynamic $ib) use ($End_of_file,$peek_char,$runtime) {
      $c = $peek_char($ib);
      if ($ib[1]) {
        throw $runtime["caml_wrap_thrown_exception"]($End_of_file) as \Throwable;
      }
      return $c;
    };
    $end_of_input = function(dynamic $ib) use ($peek_char) {
      $peek_char($ib);
      return $ib[1];
    };
    $eof = function(dynamic $ib) {return $ib[1];};
    $beginning_of_input = function(dynamic $ib) {
      return 0 === $ib[4] ? 1 : (0);
    };
    $name_of_input = function(dynamic $ib) use ($cst_unnamed_Pervasives_input_channel,$cst_unnamed_character_string,$cst_unnamed_function,$is_int) {
      $bG = $ib[9];
      if ($is_int($bG)) {
        return 0 === $bG
          ? $cst_unnamed_function
          : ($cst_unnamed_character_string);
      }
      else {
        if (0 === $bG[0]) {return $cst_unnamed_Pervasives_input_channel;}
        $fname = $bG[1];
        return $fname;
      }
    };
    $char_count = function(dynamic $ib) {
      return $ib[3] ? (int) ($ib[4] + -1) : ($ib[4]);
    };
    $line_count = function(dynamic $ib) {return $ib[5];};
    $reset_token = function(dynamic $ib) use ($Buffer,$call1) {
      return $call1($Buffer[9], $ib[8]);
    };
    $invalidate_current_char = function(dynamic $ib) {$ib[3] = 0;return 0;};
    $token_string = function(dynamic $ib) use ($Buffer,$call1) {
      $token_buffer = $ib[8];
      $tok = $call1($Buffer[2], $token_buffer);
      $call1($Buffer[8], $token_buffer);
      $ib[6] = (int) ($ib[6] + 1);
      return $tok;
    };
    $token_count = function(dynamic $ib) {return $ib[6];};
    $skip_char = function(dynamic $width, dynamic $ib) use ($invalidate_current_char) {
      $invalidate_current_char($ib);
      return $width;
    };
    $ignore_char = function(dynamic $width, dynamic $ib) use ($skip_char) {
      return $skip_char((int) ($width + -1), $ib);
    };
    $store_char = function(dynamic $width, dynamic $ib, dynamic $c) use ($Buffer,$call2,$ignore_char) {
      $call2($Buffer[10], $ib[8], $c);
      return $ignore_char($width, $ib);
    };
    $default_token_buffer_size = 1024;
    $create = function(dynamic $iname, dynamic $next) use ($Buffer,$call1,$default_token_buffer_size,$null_char) {
      return Vector{
        0,
        0,
        $null_char,
        0,
        0,
        0,
        0,
        $next,
        $call1($Buffer[1], $default_token_buffer_size),
        $iname
      };
    };
    $from_string = function(dynamic $s) use ($End_of_file,$caml_ml_string_length,$caml_string_get,$create,$runtime) {
      $i = Vector{0, 0};
      $len = $caml_ml_string_length($s);
      $next = function(dynamic $param) use ($End_of_file,$caml_string_get,$i,$len,$runtime,$s) {
        if ($len <= $i[1]) {
          throw $runtime["caml_wrap_thrown_exception"]($End_of_file) as \Throwable;
        }
        $c = $caml_string_get($s, $i[1]);
        $i[1] += 1;
        return $c;
      };
      return $create(1, $next);
    };
    $a = 0;
    $from_function = function(dynamic $bF) use ($a,$create) {
      return $create($a, $bF);
    };
    $len = 1024;
    $scan_close_at_end = function(dynamic $ic) use ($End_of_file,$Pervasives,$call1,$runtime) {
      $call1($Pervasives[81], $ic);
      throw $runtime["caml_wrap_thrown_exception"]($End_of_file) as \Throwable;
    };
    $scan_raise_at_end = function(dynamic $ic) use ($End_of_file,$runtime) {
      throw $runtime["caml_wrap_thrown_exception"]($End_of_file) as \Throwable;
    };
    $from_ic = function(dynamic $scan_close_ic, dynamic $iname, dynamic $ic) use ($End_of_file,$Pervasives,$call1,$call4,$caml_bytes_get,$create,$len,$runtime) {
      $buf = $runtime["caml_create_bytes"](1024);
      $i = Vector{0, 0};
      $lim = Vector{0, 0};
      $eof = Vector{0, 0};
      $next = function(dynamic $param) use ($End_of_file,$Pervasives,$buf,$call1,$call4,$caml_bytes_get,$eof,$i,$ic,$len,$lim,$runtime,$scan_close_ic) {
        if ($i[1] < $lim[1]) {
          $c = $caml_bytes_get($buf, $i[1]);
          $i[1] += 1;
          return $c;
        }
        if ($eof[1]) {
          throw $runtime["caml_wrap_thrown_exception"]($End_of_file) as \Throwable;
        }
        $lim[1] = $call4($Pervasives[72], $ic, $buf, 0, $len);
        if (0 === $lim[1]) {$eof[1] = 1;return $call1($scan_close_ic, $ic);}
        $i[1] = 1;
        return $caml_bytes_get($buf, 0);
      };
      return $create($iname, $next);
    };
    $from_ic_close_at_end = function(dynamic $bD, dynamic $bE) use ($from_ic,$scan_close_at_end) {
      return $from_ic($scan_close_at_end, $bD, $bE);
    };
    $from_ic_raise_at_end = function(dynamic $bB, dynamic $bC) use ($from_ic,$scan_raise_at_end) {
      return $from_ic($scan_raise_at_end, $bB, $bC);
    };
    $stdin = $from_ic(
      $scan_raise_at_end,
      Vector{1, $cst, $Pervasives[26]},
      $Pervasives[26]
    );
    $open_in_file = function(dynamic $open_in, dynamic $fname) use ($call1,$caml_string_notequal,$cst__0,$from_ic_close_at_end,$stdin) {
      if ($caml_string_notequal($fname, $cst__0)) {
        $ic = $call1($open_in, $fname);
        return $from_ic_close_at_end(Vector{1, $fname, $ic}, $ic);
      }
      return $stdin;
    };
    $b = $Pervasives[67];
    $open_in = function(dynamic $bA) use ($b,$open_in_file) {
      return $open_in_file($b, $bA);
    };
    $c = $Pervasives[68];
    $open_in_bin = function(dynamic $bz) use ($c,$open_in_file) {
      return $open_in_file($c, $bz);
    };
    $from_channel = function(dynamic $ic) use ($from_ic_raise_at_end) {
      return $from_ic_raise_at_end(Vector{0, $ic}, $ic);
    };
    $close_in = function(dynamic $ib) use ($Pervasives,$call1,$is_int) {
      $by = $ib[9];
      if ($is_int($by)) {return 0;}
      else {
        if (0 === $by[0]) {$ic = $by[1];return $call1($Pervasives[81], $ic);}
        $ic__0 = $by[2];
        return $call1($Pervasives[81], $ic__0);
      }
    };
    $memo = Vector{0, 0};
    $memo_from_ic = function(dynamic $scan_close_ic, dynamic $ic) use ($List,$Not_found,$call2,$caml_wrap_exception,$from_ic,$memo,$runtime) {
      try {$bw = $call2($List[40], $ic, $memo[1]);return $bw;}
      catch(\Throwable $bx) {
        $bx = $caml_wrap_exception($bx);
        if ($bx === $Not_found) {
          $ib = $from_ic($scan_close_ic, Vector{0, $ic}, $ic);
          $memo[1] = Vector{0, Vector{0, $ic, $ib}, $memo[1]};
          return $ib;
        }
        throw $runtime["caml_wrap_thrown_exception_reraise"]($bx) as \Throwable;
      }
    };
    $memo_from_channel = function(dynamic $bv) use ($memo_from_ic,$scan_raise_at_end) {
      return $memo_from_ic($scan_raise_at_end, $bv);
    };
    $Scan_failure = Vector{
      248,
      $cst_Scanf_Scan_failure,
      $runtime["caml_fresh_oo_id"](0)
    };
    $bad_input = function(dynamic $s) use ($Scan_failure,$runtime) {
      throw $runtime["caml_wrap_thrown_exception"](Vector{0, $Scan_failure, $s}) as \Throwable;
    };
    $bad_input_escape = function(dynamic $c) use ($Printf,$bad_input,$call2,$d) {
      return $bad_input($call2($Printf[4], $d, $c));
    };
    $bad_token_length = function(dynamic $message) use ($Printf,$bad_input,$call2,$e) {
      return $bad_input($call2($Printf[4], $e, $message));
    };
    $bad_end_of_input = function(dynamic $message) use ($Printf,$bad_input,$call2,$f) {
      return $bad_input($call2($Printf[4], $f, $message));
    };
    $bad_float = function(dynamic $param) use ($bad_input,$cst_no_dot_or_exponent_part_found_in_float_token) {
      return $bad_input($cst_no_dot_or_exponent_part_found_in_float_token);
    };
    $bad_hex_float = function(dynamic $param) use ($bad_input,$cst_not_a_valid_float_in_hexadecimal_notation) {
      return $bad_input($cst_not_a_valid_float_in_hexadecimal_notation);
    };
    $character_mismatch_err = function(dynamic $c, dynamic $ci) use ($Printf,$call3,$g) {
      return $call3($Printf[4], $g, $c, $ci);
    };
    $character_mismatch = function(dynamic $c, dynamic $ci) use ($bad_input,$character_mismatch_err) {
      return $bad_input($character_mismatch_err($c, $ci));
    };
    $skip_whites = function(dynamic $ib) use ($eof,$invalidate_current_char,$peek_char,$unsigned_right_shift_32) {
      for (;;) {
        $c = $peek_char($ib);
        $bt = 1 - $eof($ib);
        if ($bt) {
          $bu = (int) ($c + -9);
          $switch__0 = 4 < $unsigned_right_shift_32($bu, 0)
            ? 23 === $bu ? 1 : (0)
            : (1 < $unsigned_right_shift_32((int) ($bu + -2), 0) ? 1 : (0));
          if ($switch__0) {$invalidate_current_char($ib);continue;}
          return 0;
        }
        return $bt;
      }
    };
    $check_this_char = function(dynamic $ib, dynamic $c) use ($character_mismatch,$checked_peek_char,$invalidate_current_char) {
      $ci = $checked_peek_char($ib);
      return $ci === $c
        ? $invalidate_current_char($ib)
        : ($character_mismatch($c, $ci));
    };
    $check_newline = function(dynamic $ib) use ($character_mismatch,$check_this_char,$checked_peek_char,$invalidate_current_char) {
      $ci = $checked_peek_char($ib);
      if (10 === $ci) {return $invalidate_current_char($ib);}
      if (13 === $ci) {
        $invalidate_current_char($ib);
        return $check_this_char($ib, 10);
      }
      return $character_mismatch(10, $ci);
    };
    $check_char = function(dynamic $ib, dynamic $c) use ($check_newline,$check_this_char,$skip_whites) {
      return 10 === $c
        ? $check_newline($ib)
        : (32 === $c ? $skip_whites($ib) : ($check_this_char($ib, $c)));
    };
    $token_char = function(dynamic $ib) use ($caml_string_get,$token_string) {
      return $caml_string_get($token_string($ib), 0);
    };
    $token_bool = function(dynamic $ib) use ($Printf,$bad_input,$call2,$caml_string_notequal,$cst_false,$cst_true,$h,$token_string) {
      $s = $token_string($ib);
      return $caml_string_notequal($s, $cst_false)
        ? $caml_string_notequal($s, $cst_true)
         ? $bad_input($call2($Printf[4], $h, $s))
         : (1)
        : (0);
    };
    $integer_conversion_of_char = function(dynamic $param) use ($Assert_failure,$i,$runtime,$unsigned_right_shift_32) {
      $switcher = (int) ($param + -88);
      if (! (32 < $unsigned_right_shift_32($switcher, 0))) {
        switch($switcher) {
          // FALLTHROUGH
          case 10:
            return 0;
          // FALLTHROUGH
          case 12:
            return 1;
          // FALLTHROUGH
          case 17:
            return 2;
          // FALLTHROUGH
          case 23:
            return 3;
          // FALLTHROUGH
          case 29:
            return 4;
          // FALLTHROUGH
          case 0:
          // FALLTHROUGH
          case 32:
            return 5;
          }
      }
      throw $runtime["caml_wrap_thrown_exception"](Vector{0, $Assert_failure, $i}) as \Throwable;
    };
    $token_int_literal = function(dynamic $conv, dynamic $ib) use ($Pervasives,$String,$call2,$call3,$caml_ml_string_length,$caml_string_get,$cst_0b,$cst_0o,$cst_0u,$cst_0x,$token_string) {
      switch($conv) {
        // FALLTHROUGH
        case 0:
          $bp = $token_string($ib);
          $tok = $call2($Pervasives[16], $cst_0b, $bp);
          break;
        // FALLTHROUGH
        case 3:
          $bq = $token_string($ib);
          $tok = $call2($Pervasives[16], $cst_0o, $bq);
          break;
        // FALLTHROUGH
        case 4:
          $br = $token_string($ib);
          $tok = $call2($Pervasives[16], $cst_0u, $br);
          break;
        // FALLTHROUGH
        case 5:
          $bs = $token_string($ib);
          $tok = $call2($Pervasives[16], $cst_0x, $bs);
          break;
        // FALLTHROUGH
        default:
          $tok = $token_string($ib);
        }
      $l = $caml_ml_string_length($tok);
      if (0 !== $l) {
        if (43 === $caml_string_get($tok, 0)) {
          return $call3($String[4], $tok, 1, (int) ($l + -1));
        }
      }
      return $tok;
    };
    $token_int = function(dynamic $conv, dynamic $ib) use ($caml_int_of_string,$token_int_literal) {
      return $caml_int_of_string($token_int_literal($conv, $ib));
    };
    $token_float = function(dynamic $ib) use ($runtime,$token_string) {
      return $runtime["caml_float_of_string"]($token_string($ib));
    };
    $token_nativeint = function(dynamic $conv, dynamic $ib) use ($caml_int_of_string,$token_int_literal) {
      return $caml_int_of_string($token_int_literal($conv, $ib));
    };
    $token_int32 = function(dynamic $conv, dynamic $ib) use ($caml_int_of_string,$token_int_literal) {
      return $caml_int_of_string($token_int_literal($conv, $ib));
    };
    $token_int64 = function(dynamic $conv, dynamic $ib) use ($runtime,$token_int_literal) {
      return $runtime["caml_int64_of_string"]($token_int_literal($conv, $ib));
    };
    $scan_decimal_digit_star = function(dynamic $width, dynamic $ib) use ($eof,$ignore_char,$peek_char,$store_char) {
      $width__0 = $width;
      for (;;) {
        if (0 === $width__0) {return $width__0;}
        $c = $peek_char($ib);
        if ($eof($ib)) {return $width__0;}
        if (58 <= $c) {
          if (95 === $c) {
            $width__1 = $ignore_char($width__0, $ib);
            $width__0 = $width__1;
            continue;
          }
        }
        else {
          if (48 <= $c) {
            $width__2 = $store_char($width__0, $ib, $c);
            $width__0 = $width__2;
            continue;
          }
        }
        return $width__0;
      }
    };
    $scan_decimal_digit_plus = function(dynamic $width, dynamic $ib) use ($Printf,$bad_input,$bad_token_length,$call2,$checked_peek_char,$cst_decimal_digits,$j,$scan_decimal_digit_star,$store_char,$unsigned_right_shift_32) {
      if (0 === $width) {return $bad_token_length($cst_decimal_digits);}
      $c = $checked_peek_char($ib);
      $switcher = (int) ($c + -48);
      if (9 < $unsigned_right_shift_32($switcher, 0)) {return $bad_input($call2($Printf[4], $j, $c));}
      $width__0 = $store_char($width, $ib, $c);
      return $scan_decimal_digit_star($width__0, $ib);
    };
    $scan_digit_star = function(dynamic $digitp, dynamic $width, dynamic $ib) use ($call1,$eof,$ignore_char,$peek_char,$store_char) {
      $scan_digits = function(dynamic $width, dynamic $ib) use ($call1,$digitp,$eof,$ignore_char,$peek_char,$store_char) {
        $width__0 = $width;
        for (;;) {
          if (0 === $width__0) {return $width__0;}
          $c = $peek_char($ib);
          if ($eof($ib)) {return $width__0;}
          if ($call1($digitp, $c)) {
            $width__1 = $store_char($width__0, $ib, $c);
            $width__0 = $width__1;
            continue;
          }
          if (95 === $c) {
            $width__2 = $ignore_char($width__0, $ib);
            $width__0 = $width__2;
            continue;
          }
          return $width__0;
        }
      };
      return $scan_digits($width, $ib);
    };
    $scan_digit_plus = function
    (dynamic $basis, dynamic $digitp, dynamic $width, dynamic $ib) use ($Printf,$bad_input,$bad_token_length,$call1,$call3,$checked_peek_char,$cst_digits,$k,$scan_digit_star,$store_char) {
      if (0 === $width) {return $bad_token_length($cst_digits);}
      $c = $checked_peek_char($ib);
      if ($call1($digitp, $c)) {
        $width__0 = $store_char($width, $ib, $c);
        return $scan_digit_star($digitp, $width__0, $ib);
      }
      return $bad_input($call3($Printf[4], $k, $c, $basis));
    };
    $is_binary_digit = function(dynamic $param) use ($unsigned_right_shift_32) {
      $switcher = (int) ($param + -48);
      return 1 < $unsigned_right_shift_32($switcher, 0) ? 0 : (1);
    };
    $scan_binary_int = function(dynamic $bn, dynamic $bo) use ($cst_binary,$is_binary_digit,$scan_digit_plus) {
      return $scan_digit_plus($cst_binary, $is_binary_digit, $bn, $bo);
    };
    $is_octal_digit = function(dynamic $param) use ($unsigned_right_shift_32) {
      $switcher = (int) ($param + -48);
      return 7 < $unsigned_right_shift_32($switcher, 0) ? 0 : (1);
    };
    $scan_octal_int = function(dynamic $bl, dynamic $bm) use ($cst_octal,$is_octal_digit,$scan_digit_plus) {
      return $scan_digit_plus($cst_octal, $is_octal_digit, $bl, $bm);
    };
    $is_hexa_digit = function(dynamic $param) use ($unsigned_right_shift_32) {
      $bk = (int) ($param + -48);
      $switch__0 = 22 < $unsigned_right_shift_32($bk, 0)
        ? 5 < $unsigned_right_shift_32((int) ($bk + -49), 0) ? 0 : (1)
        : (6 < $unsigned_right_shift_32((int) ($bk + -10), 0) ? 1 : (0));
      return $switch__0 ? 1 : (0);
    };
    $scan_hexadecimal_int = function(dynamic $bi, dynamic $bj) use ($cst_hexadecimal,$is_hexa_digit,$scan_digit_plus) {
      return $scan_digit_plus($cst_hexadecimal, $is_hexa_digit, $bi, $bj);
    };
    $scan_sign = function(dynamic $width, dynamic $ib) use ($checked_peek_char,$store_char,$unsigned_right_shift_32) {
      $c = $checked_peek_char($ib);
      $switcher = (int) ($c + -43);
      if (! (2 < $unsigned_right_shift_32($switcher, 0))) {
        switch($switcher) {
          // FALLTHROUGH
          case 0:
            return $store_char($width, $ib, $c);
          // FALLTHROUGH
          case 1:break;
          // FALLTHROUGH
          default:
            return $store_char($width, $ib, $c);
          }
      }
      return $width;
    };
    $scan_optionally_signed_decimal_int = function
    (dynamic $width, dynamic $ib) use ($scan_decimal_digit_plus,$scan_sign) {
      $width__0 = $scan_sign($width, $ib);
      return $scan_decimal_digit_plus($width__0, $ib);
    };
    $scan_unsigned_int = function(dynamic $width, dynamic $ib) use ($checked_peek_char,$eof,$peek_char,$scan_binary_int,$scan_decimal_digit_plus,$scan_decimal_digit_star,$scan_hexadecimal_int,$scan_octal_int,$store_char) {
      $c = $checked_peek_char($ib);
      if (48 === $c) {
        $width__0 = $store_char($width, $ib, $c);
        if (0 === $width__0) {return $width__0;}
        $c__0 = $peek_char($ib);
        if ($eof($ib)) {return $width__0;}
        if (99 <= $c__0) {
          if (111 === $c__0) {
            return $scan_octal_int($store_char($width__0, $ib, $c__0), $ib);
          }
          $switch__0 = 120 === $c__0 ? 1 : (0);
        }
        else {
          if (88 === $c__0) {$switch__0 = 1;}
          else {
            if (98 <= $c__0) {
              return $scan_binary_int($store_char($width__0, $ib, $c__0), $ib);
            }
            $switch__0 = 0;
          }
        }
        return $switch__0
          ? $scan_hexadecimal_int($store_char($width__0, $ib, $c__0), $ib)
          : ($scan_decimal_digit_star($width__0, $ib));
      }
      return $scan_decimal_digit_plus($width, $ib);
    };
    $scan_optionally_signed_int = function(dynamic $width, dynamic $ib) use ($scan_sign,$scan_unsigned_int) {
      $width__0 = $scan_sign($width, $ib);
      return $scan_unsigned_int($width__0, $ib);
    };
    $scan_int_conversion = function
    (dynamic $conv, dynamic $width, dynamic $ib) use ($scan_binary_int,$scan_decimal_digit_plus,$scan_hexadecimal_int,$scan_octal_int,$scan_optionally_signed_decimal_int,$scan_optionally_signed_int) {
      switch($conv) {
        // FALLTHROUGH
        case 0:
          return $scan_binary_int($width, $ib);
        // FALLTHROUGH
        case 1:
          return $scan_optionally_signed_decimal_int($width, $ib);
        // FALLTHROUGH
        case 2:
          return $scan_optionally_signed_int($width, $ib);
        // FALLTHROUGH
        case 3:
          return $scan_octal_int($width, $ib);
        // FALLTHROUGH
        case 4:
          return $scan_decimal_digit_plus($width, $ib);
        // FALLTHROUGH
        default:
          return $scan_hexadecimal_int($width, $ib);
        }
    };
    $scan_fractional_part = function(dynamic $width, dynamic $ib) use ($eof,$peek_char,$scan_decimal_digit_star,$store_char,$unsigned_right_shift_32) {
      if (0 === $width) {return $width;}
      $c = $peek_char($ib);
      if ($eof($ib)) {return $width;}
      $switcher = (int) ($c + -48);
      return 9 < $unsigned_right_shift_32($switcher, 0)
        ? $width
        : ($scan_decimal_digit_star($store_char($width, $ib, $c), $ib));
    };
    $scan_exponent_part = function(dynamic $width, dynamic $ib) use ($eof,$peek_char,$scan_optionally_signed_decimal_int,$store_char) {
      if (0 === $width) {return $width;}
      $c = $peek_char($ib);
      if ($eof($ib)) {return $width;}
      if (69 !== $c) {if (101 !== $c) {return $width;}}
      return $scan_optionally_signed_decimal_int(
        $store_char($width, $ib, $c),
        $ib
      );
    };
    $scan_integer_part = function(dynamic $width, dynamic $ib) use ($scan_decimal_digit_star,$scan_sign) {
      $width__0 = $scan_sign($width, $ib);
      return $scan_decimal_digit_star($width__0, $ib);
    };
    $scan_float = function(dynamic $width, dynamic $precision, dynamic $ib) use ($Pervasives,$call2,$eof,$peek_char,$scan_exponent_part,$scan_fractional_part,$scan_integer_part,$store_char) {
      $width__0 = $scan_integer_part($width, $ib);
      if (0 === $width__0) {return Vector{0, $width__0, $precision};}
      $c = $peek_char($ib);
      if ($eof($ib)) {return Vector{0, $width__0, $precision};}
      if (46 === $c) {
        $width__1 = $store_char($width__0, $ib, $c);
        $precision__0 = $call2($Pervasives[4], $width__1, $precision);
        $width__2 = (int)
        ($width__1 -
           (int)
           ($precision__0 - $scan_fractional_part($precision__0, $ib)));
        return Vector{0, $scan_exponent_part($width__2, $ib), $precision__0};
      }
      return Vector{0, $scan_exponent_part($width__0, $ib), $precision};
    };
    $check_case_insensitive_string = function
    (dynamic $width, dynamic $ib, dynamic $error, dynamic $str) use ($Pervasives,$call1,$caml_ml_string_length,$caml_string_get,$peek_char,$store_char,$unsigned_right_shift_32) {
      $lowercase = function(dynamic $c) use ($Pervasives,$call1,$unsigned_right_shift_32) {
        $switcher = (int) ($c + -65);
        return 25 < $unsigned_right_shift_32($switcher, 0)
          ? $c
          : ($call1($Pervasives[17], (int) ((int) ($c - 65) + 97)));
      };
      $len = $caml_ml_string_length($str);
      $width__0 = Vector{0, $width};
      $bf = (int) ($len + -1);
      $be = 0;
      if (! ($bf < 0)) {
        $i = $be;
        for (;;) {
          $c = $peek_char($ib);
          $bg = $lowercase($caml_string_get($str, $i));
          if ($lowercase($c) !== $bg) {$call1($error, 0);}
          if (0 === $width__0[1]) {$call1($error, 0);}
          $width__0[1] = $store_char($width__0[1], $ib, $c);
          $bh = (int) ($i + 1);
          if ($bf !== $i) {$i = $bh;continue;}
          break;
        }
      }
      return $width__0[1];
    };
    $scan_hex_float = function
    (dynamic $width, dynamic $precision, dynamic $ib) use ($Pervasives,$bad_hex_float,$call2,$check_case_insensitive_string,$cst_an,$cst_nfinity,$cst_x,$end_of_input,$peek_char,$scan_hexadecimal_int,$scan_optionally_signed_decimal_int,$scan_sign,$store_char,$unsigned_right_shift_32) {
      $a2 = 0 === $width ? 1 : (0);
      $a3 = $a2 ? $a2 : ($end_of_input($ib));
      if ($a3) {$bad_hex_float(0);}
      $width__0 = $scan_sign($width, $ib);
      $a4 = 0 === $width__0 ? 1 : (0);
      $a5 = $a4 ? $a4 : ($end_of_input($ib));
      if ($a5) {$bad_hex_float(0);}
      $c = $peek_char($ib);
      if (78 <= $c) {
        $switcher = (int) ($c + -79);
        if (30 < $unsigned_right_shift_32($switcher, 0)) {
          if (! (32 <= $switcher)) {
            $width__1 = $store_char($width__0, $ib, $c);
            $a6 = 0 === $width__1 ? 1 : (0);
            $a7 = $a6 ? $a6 : ($end_of_input($ib));
            if ($a7) {$bad_hex_float(0);}
            return $check_case_insensitive_string(
              $width__1,
              $ib,
              $bad_hex_float,
              $cst_an
            );
          }
          $switch__0 = 0;
        }
        else {$switch__0 = 26 === $switcher ? 1 : (0);}
      }
      else {
        if (48 === $c) {
          $width__3 = $store_char($width__0, $ib, $c);
          $a_ = 0 === $width__3 ? 1 : (0);
          $ba = $a_ ? $a_ : ($end_of_input($ib));
          if ($ba) {$bad_hex_float(0);}
          $width__4 = $check_case_insensitive_string(
            $width__3,
            $ib,
            $bad_hex_float,
            $cst_x
          );
          if (0 !== $width__4) {
            if (! $end_of_input($ib)) {
              $match = $peek_char($ib);
              $bb = (int) ($match + -46);
              $switch__1 = 34 < $unsigned_right_shift_32($bb, 0)
                ? 66 === $bb ? 1 : (0)
                : (32 < $unsigned_right_shift_32((int) ($bb + -1), 0)
                 ? 1
                 : (0));
              $width__5 = $switch__1
                ? $width__4
                : ($scan_hexadecimal_int($width__4, $ib));
              if (0 !== $width__5) {
                if (! $end_of_input($ib)) {
                  $c__0 = $peek_char($ib);
                  if (46 === $c__0) {
                    $width__6 = $store_char($width__5, $ib, $c__0);
                    if (0 === $width__6) {$switch__2 = 0;}
                    else {
                      if ($end_of_input($ib)) {$switch__2 = 0;}
                      else {
                        $match__0 = $peek_char($ib);
                        if (80 === $match__0) {$switch__3 = 0;}
                        else {
                          if (112 === $match__0) {$switch__3 = 0;}
                          else {
                            $precision__0 = $call2($Pervasives[4], $width__6, $precision
                            );
                            $width__10 = (int)
                            ($width__6 -
                               (int)
                               ($precision__0 - $scan_hexadecimal_int($precision__0, $ib)));
                            $switch__3 = 1;
                          }
                        }
                        if (! $switch__3) {$width__10 = $width__6;}
                        $width__7 = $width__10;
                        $switch__2 = 1;
                      }
                    }
                    if (! $switch__2) {$width__7 = $width__6;}
                    $width__8 = $width__7;
                  }
                  else {$width__8 = $width__5;}
                  if (0 !== $width__8) {
                    if (! $end_of_input($ib)) {
                      $c__1 = $peek_char($ib);
                      if (80 !== $c__1) {if (112 !== $c__1) {return $width__8;}}
                      $width__9 = $store_char($width__8, $ib, $c__1);
                      $bc = 0 === $width__9 ? 1 : (0);
                      $bd = $bc ? $bc : ($end_of_input($ib));
                      if ($bd) {$bad_hex_float(0);}
                      return $scan_optionally_signed_decimal_int($width__9, $ib);
                    }
                  }
                  return $width__8;
                }
              }
              return $width__5;
            }
          }
          return $width__4;
        }
        $switch__0 = 73 === $c ? 1 : (0);
      }
      if ($switch__0) {
        $width__2 = $store_char($width__0, $ib, $c);
        $a8 = 0 === $width__2 ? 1 : (0);
        $a9 = $a8 ? $a8 : ($end_of_input($ib));
        if ($a9) {$bad_hex_float(0);}
        return $check_case_insensitive_string(
          $width__2,
          $ib,
          $bad_hex_float,
          $cst_nfinity
        );
      }
      return $bad_hex_float(0);
    };
    $scan_caml_float_rest = function
    (dynamic $width, dynamic $precision, dynamic $ib) use ($Pervasives,$bad_float,$call2,$end_of_input,$peek_char,$scan_decimal_digit_star,$scan_exponent_part,$scan_fractional_part,$store_char,$unsigned_right_shift_32) {
      $aY = 0 === $width ? 1 : (0);
      $aZ = $aY ? $aY : ($end_of_input($ib));
      if ($aZ) {$bad_float(0);}
      $width__0 = $scan_decimal_digit_star($width, $ib);
      $a0 = 0 === $width__0 ? 1 : (0);
      $a1 = $a0 ? $a0 : ($end_of_input($ib));
      if ($a1) {$bad_float(0);}
      $c = $peek_char($ib);
      $switcher = (int) ($c + -69);
      if (32 < $unsigned_right_shift_32($switcher, 0)) {
        if (-23 === $switcher) {
          $width__1 = $store_char($width__0, $ib, $c);
          $precision__0 = $call2($Pervasives[4], $width__1, $precision);
          $width_precision = $scan_fractional_part($precision__0, $ib);
          $frac_width = (int) ($precision__0 - $width_precision);
          $width__2 = (int) ($width__1 - $frac_width);
          return $scan_exponent_part($width__2, $ib);
        }
      }
      else {
        $switcher__0 = (int) ($switcher + -1);
        if (30 < $unsigned_right_shift_32($switcher__0, 0)) {return $scan_exponent_part($width__0, $ib);}
      }
      return $bad_float(0);
    };
    $scan_caml_float = function
    (dynamic $width, dynamic $precision, dynamic $ib) use ($Pervasives,$bad_float,$bad_hex_float,$call2,$end_of_input,$peek_char,$scan_caml_float_rest,$scan_hexadecimal_int,$scan_optionally_signed_decimal_int,$scan_sign,$store_char,$unsigned_right_shift_32) {
      $aK = 0 === $width ? 1 : (0);
      $aL = $aK ? $aK : ($end_of_input($ib));
      if ($aL) {$bad_float(0);}
      $width__0 = $scan_sign($width, $ib);
      $aM = 0 === $width__0 ? 1 : (0);
      $aN = $aM ? $aM : ($end_of_input($ib));
      if ($aN) {$bad_float(0);}
      $c = $peek_char($ib);
      if (49 <= $c) {
        if (! (58 <= $c)) {
          $width__1 = $store_char($width__0, $ib, $c);
          $aO = 0 === $width__1 ? 1 : (0);
          $aP = $aO ? $aO : ($end_of_input($ib));
          if ($aP) {$bad_float(0);}
          return $scan_caml_float_rest($width__1, $precision, $ib);
        }
      }
      else {
        if (48 <= $c) {
          $width__2 = $store_char($width__0, $ib, $c);
          $aQ = 0 === $width__2 ? 1 : (0);
          $aR = $aQ ? $aQ : ($end_of_input($ib));
          if ($aR) {$bad_float(0);}
          $c__0 = $peek_char($ib);
          if (88 !== $c__0) {
            if (120 !== $c__0) {
              return $scan_caml_float_rest($width__2, $precision, $ib);
            }
          }
          $width__3 = $store_char($width__2, $ib, $c__0);
          $aS = 0 === $width__3 ? 1 : (0);
          $aT = $aS ? $aS : ($end_of_input($ib));
          if ($aT) {$bad_float(0);}
          $width__4 = $scan_hexadecimal_int($width__3, $ib);
          $aU = 0 === $width__4 ? 1 : (0);
          $aV = $aU ? $aU : ($end_of_input($ib));
          if ($aV) {$bad_float(0);}
          $c__1 = $peek_char($ib);
          $switcher = (int) ($c__1 + -80);
          if (32 < $unsigned_right_shift_32($switcher, 0)) {
            if (-34 === $switcher) {
              $width__5 = $store_char($width__4, $ib, $c__1);
              if (0 === $width__5) {$switch__1 = 0;}
              else {
                if ($end_of_input($ib)) {$switch__1 = 0;}
                else {
                  $match = $peek_char($ib);
                  if (80 === $match) {$switch__2 = 0;}
                  else {
                    if (112 === $match) {$switch__2 = 0;}
                    else {
                      $precision__0 = $call2($Pervasives[4], $width__5, $precision
                      );
                      $width__10 = (int)
                      ($width__5 -
                         (int)
                         ($precision__0 - $scan_hexadecimal_int($precision__0, $ib)));
                      $switch__2 = 1;
                    }
                  }
                  if (! $switch__2) {$width__10 = $width__5;}
                  $width__6 = $width__10;
                  $switch__1 = 1;
                }
              }
              if (! $switch__1) {$width__6 = $width__5;}
              $width__7 = $width__6;
              $switch__0 = 0;
            }
            else {$switch__0 = 1;}
          }
          else {
            $switcher__0 = (int) ($switcher + -1);
            if (30 < $unsigned_right_shift_32($switcher__0, 0)) {$width__7 = $width__4;$switch__0 = 0;}
            else {$switch__0 = 1;}
          }
          $width__8 = $switch__0 ? $bad_float(0) : ($width__7);
          if (0 !== $width__8) {
            if (! $end_of_input($ib)) {
              $c__2 = $peek_char($ib);
              if (80 !== $c__2) {if (112 !== $c__2) {return $width__8;}}
              $width__9 = $store_char($width__8, $ib, $c__2);
              $aW = 0 === $width__9 ? 1 : (0);
              $aX = $aW ? $aW : ($end_of_input($ib));
              if ($aX) {$bad_hex_float(0);}
              return $scan_optionally_signed_decimal_int($width__9, $ib);
            }
          }
          return $width__8;
        }
      }
      return $bad_float(0);
    };
    $scan_string = function(dynamic $stp, dynamic $width, dynamic $ib) use ($eof,$peek_char,$skip_char,$store_char,$unsigned_right_shift_32) {
      $loop = function(dynamic $width) use ($eof,$ib,$peek_char,$skip_char,$store_char,$stp,$unsigned_right_shift_32) {
        $width__0 = $width;
        for (;;) {
          if (0 === $width__0) {return $width__0;}
          $c = $peek_char($ib);
          if ($eof($ib)) {return $width__0;}
          if ($stp) {
            $c__0 = $stp[1];
            if ($c === $c__0) {return $skip_char($width__0, $ib);}
            $width__1 = $store_char($width__0, $ib, $c);
            $width__0 = $width__1;
            continue;
          }
          $aJ = (int) ($c + -9);
          $switch__0 = 4 < $unsigned_right_shift_32($aJ, 0)
            ? 23 === $aJ ? 1 : (0)
            : (1 < $unsigned_right_shift_32((int) ($aJ + -2), 0) ? 1 : (0));
          if ($switch__0) {return $width__0;}
          $width__2 = $store_char($width__0, $ib, $c);
          $width__0 = $width__2;
          continue;
        }
      };
      return $loop($width);
    };
    $scan_char = function(dynamic $width, dynamic $ib) use ($checked_peek_char,$store_char) {
      return $store_char($width, $ib, $checked_peek_char($ib));
    };
    $char_for_backslash = function(dynamic $c) {
      if (110 <= $c) {
        if (! (117 <= $c)) {
          $switcher = (int) ($c + -110);
          switch($switcher) {
            // FALLTHROUGH
            case 0:
              return 10;
            // FALLTHROUGH
            case 4:
              return 13;
            // FALLTHROUGH
            case 6:
              return 9;
            }
        }
      }
      else {if (98 === $c) {return 8;}}
      return $c;
    };
    $decimal_value_of_char = function(dynamic $c) {return (int) ($c - 48);};
    $char_for_decimal_code = function(dynamic $c0, dynamic $c1, dynamic $c2) use ($Pervasives,$Printf,$bad_input,$call1,$call4,$decimal_value_of_char,$l) {
      $aH = $decimal_value_of_char($c2);
      $aI = (int) (10 * $decimal_value_of_char($c1));
      $c = (int)
      ((int) ((int) (100 * $decimal_value_of_char($c0)) + $aI) + $aH);
      if (0 <= $c) {if (! (255 < $c)) {return $call1($Pervasives[17], $c);}}
      return $bad_input($call4($Printf[4], $l, $c0, $c1, $c2));
    };
    $hexadecimal_value_of_char = function(dynamic $d) {
      return 97 <= $d
        ? (int) ($d + -87)
        : (65 <= $d ? (int) ($d + -55) : ((int) ($d - 48)));
    };
    $char_for_hexadecimal_code = function(dynamic $c1, dynamic $c2) use ($Pervasives,$Printf,$bad_input,$call1,$call3,$hexadecimal_value_of_char,$m) {
      $aG = $hexadecimal_value_of_char($c2);
      $c = (int) ((int) (16 * $hexadecimal_value_of_char($c1)) + $aG);
      if (0 <= $c) {if (! (255 < $c)) {return $call1($Pervasives[17], $c);}}
      return $bad_input($call3($Printf[4], $m, $c1, $c2));
    };
    $check_next_char = function(dynamic $message, dynamic $width, dynamic $ib) use ($bad_end_of_input,$bad_token_length,$eof,$peek_char) {
      if (0 === $width) {return $bad_token_length($message);}
      $c = $peek_char($ib);
      return $eof($ib) ? $bad_end_of_input($message) : ($c);
    };
    $check_next_char_for_char = function(dynamic $aE, dynamic $aF) use ($check_next_char,$cst_a_Char) {
      return $check_next_char($cst_a_Char, $aE, $aF);
    };
    $check_next_char_for_string = function(dynamic $aC, dynamic $aD) use ($check_next_char,$cst_a_String) {
      return $check_next_char($cst_a_String, $aC, $aD);
    };
    $scan_backslash_char = function(dynamic $width, dynamic $ib) use ($bad_input_escape,$char_for_backslash,$char_for_decimal_code,$char_for_hexadecimal_code,$check_next_char_for_char,$next_char,$store_char,$unsigned_right_shift_32) {
      $c = $check_next_char_for_char($width, $ib);
      if (40 <= $c) {
        if (58 <= $c) {
          $switcher = (int) ($c + -92);
          if (28 < $unsigned_right_shift_32($switcher, 0)) {$switch__0 = 0;}
          else {
            switch($switcher) {
              // FALLTHROUGH
              case 28:
                $get_digit = function(dynamic $param) use ($bad_input_escape,$ib,$next_char,$unsigned_right_shift_32) {
                  $c = $next_char($ib);
                  $aB = (int) ($c + -48);
                  $switch__0 = 22 < $unsigned_right_shift_32($aB, 0)
                    ? 5 < $unsigned_right_shift_32((int) ($aB + -49), 0)
                     ? 0
                     : (1)
                    : (6 < $unsigned_right_shift_32((int) ($aB + -10), 0)
                     ? 1
                     : (0));
                  return $switch__0 ? $c : ($bad_input_escape($c));
                };
                $c1 = $get_digit(0);
                $c2 = $get_digit(0);
                return $store_char(
                  (int)
                  ($width + -2),
                  $ib,
                  $char_for_hexadecimal_code($c1, $c2)
                );
              // FALLTHROUGH
              case 0:
              // FALLTHROUGH
              case 6:
              // FALLTHROUGH
              case 18:
              // FALLTHROUGH
              case 22:
              // FALLTHROUGH
              case 24:
                $switch__0 = 1;
                break;
              // FALLTHROUGH
              default:
                $switch__0 = 0;
              }
          }
        }
        else {
          if (48 <= $c) {
            $get_digit__0 = function(dynamic $param) use ($bad_input_escape,$ib,$next_char,$unsigned_right_shift_32) {
              $c = $next_char($ib);
              $switcher = (int) ($c + -48);
              return 9 < $unsigned_right_shift_32($switcher, 0)
                ? $bad_input_escape($c)
                : ($c);
            };
            $c1__0 = $get_digit__0(0);
            $c2__0 = $get_digit__0(0);
            return $store_char(
              (int)
              ($width + -2),
              $ib,
              $char_for_decimal_code($c, $c1__0, $c2__0)
            );
          }
          $switch__0 = 0;
        }
      }
      else {$switch__0 = 34 === $c ? 1 : (39 <= $c ? 1 : (0));}
      return $switch__0
        ? $store_char($width, $ib, $char_for_backslash($c))
        : ($bad_input_escape($c));
    };
    $scan_caml_char = function(dynamic $width, dynamic $ib) use ($character_mismatch,$check_next_char_for_char,$checked_peek_char,$ignore_char,$scan_backslash_char,$store_char) {
      $find_stop = function(dynamic $width) use ($character_mismatch,$check_next_char_for_char,$ib,$ignore_char) {
        $c = $check_next_char_for_char($width, $ib);
        return 39 === $c
          ? $ignore_char($width, $ib)
          : ($character_mismatch(39, $c));
      };
      $find_char = function(dynamic $width) use ($check_next_char_for_char,$find_stop,$ib,$ignore_char,$scan_backslash_char,$store_char) {
        $c = $check_next_char_for_char($width, $ib);
        return 92 === $c
          ? $find_stop($scan_backslash_char($ignore_char($width, $ib), $ib))
          : ($find_stop($store_char($width, $ib, $c)));
      };
      $find_start = function(dynamic $width) use ($character_mismatch,$checked_peek_char,$find_char,$ib,$ignore_char) {
        $c = $checked_peek_char($ib);
        return 39 === $c
          ? $find_char($ignore_char($width, $ib))
          : ($character_mismatch(39, $c));
      };
      return $find_start($width);
    };
    $scan_caml_string = function(dynamic $width, dynamic $ib) use ($caml_trampoline,$caml_trampoline_return,$character_mismatch,$check_next_char_for_string,$checked_peek_char,$ignore_char,$scan_backslash_char,$store_char) {
      $scan_backslash = new Ref();
      $skip_newline = new Ref();
      $skip_spaces = new Ref();
      $find_stop__0 = function(dynamic $counter, dynamic $width) use ($caml_trampoline_return,$check_next_char_for_string,$ib,$ignore_char,$scan_backslash,$store_char) {
        $width__0 = $width;
        for (;;) {
          $c = $check_next_char_for_string($width__0, $ib);
          if (34 === $c) {return $ignore_char($width__0, $ib);}
          if (92 === $c) {
            $aA = $ignore_char($width__0, $ib);
            if ($counter < 50) {
              $counter__0 = (int) ($counter + 1);
              return $scan_backslash->contents($counter__0, $aA);
            }
            return $caml_trampoline_return(
              $scan_backslash->contents,
              varray[0,$aA]
            );
          }
          $width__1 = $store_char($width__0, $ib, $c);
          $width__0 = $width__1;
          continue;
        }
      };
      $scan_backslash->contents = function(dynamic $counter, dynamic $width) use ($caml_trampoline_return,$check_next_char_for_string,$find_stop__0,$ib,$ignore_char,$scan_backslash_char,$skip_newline,$skip_spaces) {
        $match = $check_next_char_for_string($width, $ib);
        if (10 === $match) {
          $ax = $ignore_char($width, $ib);
          if ($counter < 50) {
            $counter__0 = (int) ($counter + 1);
            return $skip_spaces->contents($counter__0, $ax);
          }
          return $caml_trampoline_return($skip_spaces->contents, varray[0,$ax]
          );
        }
        if (13 === $match) {
          $ay = $ignore_char($width, $ib);
          if ($counter < 50) {
            $counter__1 = (int) ($counter + 1);
            return $skip_newline->contents($counter__1, $ay);
          }
          return $caml_trampoline_return(
            $skip_newline->contents,
            varray[0,$ay]
          );
        }
        $az = $scan_backslash_char($width, $ib);
        if ($counter < 50) {
          $counter__2 = (int) ($counter + 1);
          return $find_stop__0($counter__2, $az);
        }
        return $caml_trampoline_return($find_stop__0, varray[0,$az]);
      };
      $skip_newline->contents = function(dynamic $counter, dynamic $width) use ($caml_trampoline_return,$check_next_char_for_string,$find_stop__0,$ib,$ignore_char,$skip_spaces,$store_char) {
        $match = $check_next_char_for_string($width, $ib);
        if (10 === $match) {
          $av = $ignore_char($width, $ib);
          if ($counter < 50) {
            $counter__0 = (int) ($counter + 1);
            return $skip_spaces->contents($counter__0, $av);
          }
          return $caml_trampoline_return($skip_spaces->contents, varray[0,$av]
          );
        }
        $aw = $store_char($width, $ib, 13);
        if ($counter < 50) {
          $counter__1 = (int) ($counter + 1);
          return $find_stop__0($counter__1, $aw);
        }
        return $caml_trampoline_return($find_stop__0, varray[0,$aw]);
      };
      $skip_spaces->contents = function(dynamic $counter, dynamic $width) use ($caml_trampoline_return,$check_next_char_for_string,$find_stop__0,$ib,$ignore_char) {
        $width__0 = $width;
        for (;;) {
          $match = $check_next_char_for_string($width__0, $ib);
          if (32 === $match) {
            $width__1 = $ignore_char($width__0, $ib);
            $width__0 = $width__1;
            continue;
          }
          if ($counter < 50) {
            $counter__0 = (int) ($counter + 1);
            return $find_stop__0($counter__0, $width__0);
          }
          return $caml_trampoline_return($find_stop__0, varray[0,$width__0]);
        }
      };
      $find_stop = function(dynamic $width) use ($caml_trampoline,$find_stop__0) {
        return $caml_trampoline($find_stop__0(0, $width));
      };
      $find_start = function(dynamic $width) use ($character_mismatch,$checked_peek_char,$find_stop,$ib,$ignore_char) {
        $c = $checked_peek_char($ib);
        return 34 === $c
          ? $find_stop($ignore_char($width, $ib))
          : ($character_mismatch(34, $c));
      };
      return $find_start($width);
    };
    $scan_bool = function(dynamic $ib) use ($Printf,$bad_input,$call2,$checked_peek_char,$n,$scan_string) {
      $c = $checked_peek_char($ib);
      $m = 102 === $c
        ? 5
        : (116 === $c ? 4 : ($bad_input($call2($Printf[4], $n, $c))));
      return $scan_string(0, $m, $ib);
    };
    $scan_chars_in_char_set = function
    (dynamic $char_set, dynamic $scan_indic, dynamic $width, dynamic $ib) use ($CamlinternalFormat,$Pervasives,$call2,$character_mismatch,$eof,$invalidate_current_char,$peek_char,$store_char) {
      $scan_chars = function(dynamic $i, dynamic $stp) use ($CamlinternalFormat,$Pervasives,$call2,$char_set,$eof,$ib,$peek_char,$store_char) {
        $i__0 = $i;
        for (;;) {
          $c = $peek_char($ib);
          $ar = 0 < $i__0 ? 1 : (0);
          if ($ar) {
            $as = 1 - $eof($ib);
            if ($as) {
              $at = $call2($CamlinternalFormat[1], $char_set, $c);
              $au = $at ? $c !== $stp ? 1 : (0) : ($at);
            }
            else {$au = $as;}
          }
          else {$au = $ar;}
          if ($au) {
            $store_char($Pervasives[7], $ib, $c);
            $i__1 = (int) ($i__0 + -1);
            $i__0 = $i__1;
            continue;
          }
          return $au;
        }
      };
      if ($scan_indic) {
        $c = $scan_indic[1];
        $scan_chars($width, $c);
        $aq = 1 - $eof($ib);
        if ($aq) {
          $ci = $peek_char($ib);
          return $c === $ci
            ? $invalidate_current_char($ib)
            : ($character_mismatch($c, $ci));
        }
        return $aq;
      }
      return $scan_chars($width, -1);
    };
    $scanf_bad_input = function(dynamic $ib, dynamic $x) use ($Failure,$Printf,$Scan_failure,$bad_input,$call3,$char_count,$o,$runtime) {
      if ($x[1] === $Scan_failure) {$s = $x[2];}
      else {
        if ($x[1] !== $Failure) {
          throw $runtime["caml_wrap_thrown_exception"]($x) as \Throwable;
        }
        $s = $x[2];
      }
      $i = $char_count($ib);
      return $bad_input($call3($Printf[4], $o, $i, $s));
    };
    $get_counter = function(dynamic $ib, dynamic $counter) use ($char_count,$line_count,$token_count) {
      switch($counter) {
        // FALLTHROUGH
        case 0:
          return $line_count($ib);
        // FALLTHROUGH
        case 1:
          return $char_count($ib);
        // FALLTHROUGH
        default:
          return $token_count($ib);
        }
    };
    $width_of_pad_opt = function(dynamic $pad_opt) use ($Pervasives) {
      if ($pad_opt) {$width = $pad_opt[1];return $width;}
      return $Pervasives[7];
    };
    $stopper_of_formatting_lit = function(dynamic $fmting) use ($CamlinternalFormat,$String,$call1,$call3,$caml_ml_string_length,$caml_string_get,$p) {
      if (6 === $fmting) {return $p;}
      $str = $call1($CamlinternalFormat[17], $fmting);
      $stp = $caml_string_get($str, 1);
      $sub_str = $call3(
        $String[4],
        $str,
        2,
        (int)
        ($caml_ml_string_length($str) + -2)
      );
      return Vector{0, $stp, $sub_str};
    };
    $take_format_readers__0 = function
    (dynamic $counter, dynamic $k, dynamic $fmt) use ($CamlinternalFormat,$CamlinternalFormatBasics,$call1,$call2,$caml_trampoline_return,$is_int,$take_fmtty_format_readers__0,$take_format_readers,$take_ignored_format_readers) {
      $fmt__0 = $fmt;
      for (;;) if (
        $is_int($fmt__0)
      ) {return $call1($k, 0);}
      else {
        switch($fmt__0[0]) {
          // FALLTHROUGH
          case 0:
            $fmt__1 = $fmt__0[1];
            $fmt__0 = $fmt__1;
            continue;
          // FALLTHROUGH
          case 1:
            $fmt__2 = $fmt__0[1];
            $fmt__0 = $fmt__2;
            continue;
          // FALLTHROUGH
          case 2:
            $fmt__3 = $fmt__0[2];
            $fmt__0 = $fmt__3;
            continue;
          // FALLTHROUGH
          case 3:
            $fmt__4 = $fmt__0[2];
            $fmt__0 = $fmt__4;
            continue;
          // FALLTHROUGH
          case 4:
            $fmt__5 = $fmt__0[4];
            $fmt__0 = $fmt__5;
            continue;
          // FALLTHROUGH
          case 5:
            $fmt__6 = $fmt__0[4];
            $fmt__0 = $fmt__6;
            continue;
          // FALLTHROUGH
          case 6:
            $fmt__7 = $fmt__0[4];
            $fmt__0 = $fmt__7;
            continue;
          // FALLTHROUGH
          case 7:
            $fmt__8 = $fmt__0[4];
            $fmt__0 = $fmt__8;
            continue;
          // FALLTHROUGH
          case 8:
            $fmt__9 = $fmt__0[4];
            $fmt__0 = $fmt__9;
            continue;
          // FALLTHROUGH
          case 9:
            $fmt__10 = $fmt__0[2];
            $fmt__0 = $fmt__10;
            continue;
          // FALLTHROUGH
          case 10:
            $fmt__11 = $fmt__0[1];
            $fmt__0 = $fmt__11;
            continue;
          // FALLTHROUGH
          case 11:
            $fmt__12 = $fmt__0[2];
            $fmt__0 = $fmt__12;
            continue;
          // FALLTHROUGH
          case 12:
            $fmt__13 = $fmt__0[2];
            $fmt__0 = $fmt__13;
            continue;
          // FALLTHROUGH
          case 13:
            $fmt__14 = $fmt__0[3];
            $fmt__0 = $fmt__14;
            continue;
          // FALLTHROUGH
          case 14:
            $rest = $fmt__0[3];
            $fmtty = $fmt__0[2];
            $an = $call1($CamlinternalFormat[22], $fmtty);
            $ao = $call1($CamlinternalFormatBasics[2], $an);
            if ($counter < 50) {
              $counter__1 = (int) ($counter + 1);
              return $take_fmtty_format_readers__0->contents(
                $counter__1,
                $k,
                $ao,
                $rest
              );
            }
            return $caml_trampoline_return(
              $take_fmtty_format_readers__0->contents,
              varray[0,$k,$ao,$rest]
            );
          // FALLTHROUGH
          case 15:
            $fmt__15 = $fmt__0[1];
            $fmt__0 = $fmt__15;
            continue;
          // FALLTHROUGH
          case 16:
            $fmt__16 = $fmt__0[1];
            $fmt__0 = $fmt__16;
            continue;
          // FALLTHROUGH
          case 17:
            $fmt__17 = $fmt__0[2];
            $fmt__0 = $fmt__17;
            continue;
          // FALLTHROUGH
          case 18:
            $ap = $fmt__0[1];
            if (0 === $ap[0]) {
              $rest__0 = $fmt__0[2];
              $match = $ap[1];
              $fmt__18 = $match[1];
              $fmt__19 = $call2(
                $CamlinternalFormatBasics[3],
                $fmt__18,
                $rest__0
              );
              $fmt__0 = $fmt__19;
              continue;
            }
            $rest__1 = $fmt__0[2];
            $match__0 = $ap[1];
            $fmt__20 = $match__0[1];
            $fmt__21 = $call2($CamlinternalFormatBasics[3], $fmt__20, $rest__1
            );
            $fmt__0 = $fmt__21;
            continue;
          // FALLTHROUGH
          case 19:
            $fmt_rest = $fmt__0[1];
            return function(dynamic $reader) use ($call1,$fmt_rest,$k,$take_format_readers) {
              $new_k = function(dynamic $readers_rest) use ($call1,$k,$reader) {
                return $call1($k, Vector{0, $reader, $readers_rest});
              };
              return $take_format_readers->contents($new_k, $fmt_rest);
            };
          // FALLTHROUGH
          case 20:
            $fmt__22 = $fmt__0[3];
            $fmt__0 = $fmt__22;
            continue;
          // FALLTHROUGH
          case 21:
            $fmt__23 = $fmt__0[2];
            $fmt__0 = $fmt__23;
            continue;
          // FALLTHROUGH
          case 22:
            $fmt__24 = $fmt__0[1];
            $fmt__0 = $fmt__24;
            continue;
          // FALLTHROUGH
          case 23:
            $rest__2 = $fmt__0[2];
            $ign = $fmt__0[1];
            if ($counter < 50) {
              $counter__0 = (int) ($counter + 1);
              return $take_ignored_format_readers->contents(
                $counter__0,
                $k,
                $ign,
                $rest__2
              );
            }
            return $caml_trampoline_return(
              $take_ignored_format_readers->contents,
              varray[0,$k,$ign,$rest__2]
            );
          // FALLTHROUGH
          default:
            $fmt__25 = $fmt__0[3];
            $fmt__0 = $fmt__25;
            continue;
          }
      }
    };
    $take_fmtty_format_readers__0->contents = function
    (dynamic $counter, dynamic $k, dynamic $fmtty, dynamic $fmt) use ($CamlinternalFormat,$CamlinternalFormatBasics,$call1,$call2,$caml_trampoline_return,$is_int,$take_fmtty_format_readers,$take_format_readers__0) {
      $fmtty__0 = $fmtty;
      for (;;) if (
        $is_int($fmtty__0)
      ) {
        if ($counter < 50) {
          $counter__0 = (int) ($counter + 1);
          return $take_format_readers__0($counter__0, $k, $fmt);
        }
        return $caml_trampoline_return(
          $take_format_readers__0,
          varray[0,$k,$fmt]
        );
      }
      else {
        switch($fmtty__0[0]) {
          // FALLTHROUGH
          case 0:
            $fmtty__1 = $fmtty__0[1];
            $fmtty__0 = $fmtty__1;
            continue;
          // FALLTHROUGH
          case 1:
            $fmtty__2 = $fmtty__0[1];
            $fmtty__0 = $fmtty__2;
            continue;
          // FALLTHROUGH
          case 2:
            $fmtty__3 = $fmtty__0[1];
            $fmtty__0 = $fmtty__3;
            continue;
          // FALLTHROUGH
          case 3:
            $fmtty__4 = $fmtty__0[1];
            $fmtty__0 = $fmtty__4;
            continue;
          // FALLTHROUGH
          case 4:
            $fmtty__5 = $fmtty__0[1];
            $fmtty__0 = $fmtty__5;
            continue;
          // FALLTHROUGH
          case 5:
            $fmtty__6 = $fmtty__0[1];
            $fmtty__0 = $fmtty__6;
            continue;
          // FALLTHROUGH
          case 6:
            $fmtty__7 = $fmtty__0[1];
            $fmtty__0 = $fmtty__7;
            continue;
          // FALLTHROUGH
          case 7:
            $fmtty__8 = $fmtty__0[1];
            $fmtty__0 = $fmtty__8;
            continue;
          // FALLTHROUGH
          case 8:
            $fmtty__9 = $fmtty__0[2];
            $fmtty__0 = $fmtty__9;
            continue;
          // FALLTHROUGH
          case 9:
            $rest = $fmtty__0[3];
            $ty2 = $fmtty__0[2];
            $ty1 = $fmtty__0[1];
            $am = $call1($CamlinternalFormat[22], $ty1);
            $ty = $call2($CamlinternalFormat[23], $am, $ty2);
            $fmtty__10 = $call2($CamlinternalFormatBasics[1], $ty, $rest);
            $fmtty__0 = $fmtty__10;
            continue;
          // FALLTHROUGH
          case 10:
            $fmtty__11 = $fmtty__0[1];
            $fmtty__0 = $fmtty__11;
            continue;
          // FALLTHROUGH
          case 11:
            $fmtty__12 = $fmtty__0[1];
            $fmtty__0 = $fmtty__12;
            continue;
          // FALLTHROUGH
          case 12:
            $fmtty__13 = $fmtty__0[1];
            $fmtty__0 = $fmtty__13;
            continue;
          // FALLTHROUGH
          case 13:
            $fmt_rest = $fmtty__0[1];
            return function(dynamic $reader) use ($call1,$fmt,$fmt_rest,$k,$take_fmtty_format_readers) {
              $new_k = function(dynamic $readers_rest) use ($call1,$k,$reader) {
                return $call1($k, Vector{0, $reader, $readers_rest});
              };
              return $take_fmtty_format_readers->contents(
                $new_k,
                $fmt_rest,
                $fmt
              );
            };
          // FALLTHROUGH
          default:
            $fmt_rest__0 = $fmtty__0[1];
            return function(dynamic $reader) use ($call1,$fmt,$fmt_rest__0,$k,$take_fmtty_format_readers) {
              $new_k = function(dynamic $readers_rest) use ($call1,$k,$reader) {
                return $call1($k, Vector{0, $reader, $readers_rest});
              };
              return $take_fmtty_format_readers->contents(
                $new_k,
                $fmt_rest__0,
                $fmt
              );
            };
          }
      }
    };
    $take_ignored_format_readers->contents = function
    (dynamic $counter, dynamic $k, dynamic $ign, dynamic $fmt) use ($call1,$caml_trampoline_return,$is_int,$take_fmtty_format_readers__0,$take_format_readers,$take_format_readers__0) {
      if ($is_int($ign)) {
        switch($ign) {
          // FALLTHROUGH
          case 0:
            if ($counter < 50) {
              $counter__1 = (int) ($counter + 1);
              return $take_format_readers__0($counter__1, $k, $fmt);
            }
            return $caml_trampoline_return(
              $take_format_readers__0,
              varray[0,$k,$fmt]
            );
          // FALLTHROUGH
          case 1:
            if ($counter < 50) {
              $counter__2 = (int) ($counter + 1);
              return $take_format_readers__0($counter__2, $k, $fmt);
            }
            return $caml_trampoline_return(
              $take_format_readers__0,
              varray[0,$k,$fmt]
            );
          // FALLTHROUGH
          case 2:
            return function(dynamic $reader) use ($call1,$fmt,$k,$take_format_readers) {
              $new_k = function(dynamic $readers_rest) use ($call1,$k,$reader) {
                return $call1($k, Vector{0, $reader, $readers_rest});
              };
              return $take_format_readers->contents($new_k, $fmt);
            };
          // FALLTHROUGH
          default:
            if ($counter < 50) {
              $counter__3 = (int) ($counter + 1);
              return $take_format_readers__0($counter__3, $k, $fmt);
            }
            return $caml_trampoline_return(
              $take_format_readers__0,
              varray[0,$k,$fmt]
            );
          }
      }
      else {
        switch($ign[0]) {
          // FALLTHROUGH
          case 0:
            if ($counter < 50) {
              $counter__4 = (int) ($counter + 1);
              return $take_format_readers__0($counter__4, $k, $fmt);
            }
            return $caml_trampoline_return(
              $take_format_readers__0,
              varray[0,$k,$fmt]
            );
          // FALLTHROUGH
          case 1:
            if ($counter < 50) {
              $counter__5 = (int) ($counter + 1);
              return $take_format_readers__0($counter__5, $k, $fmt);
            }
            return $caml_trampoline_return(
              $take_format_readers__0,
              varray[0,$k,$fmt]
            );
          // FALLTHROUGH
          case 2:
            if ($counter < 50) {
              $counter__6 = (int) ($counter + 1);
              return $take_format_readers__0($counter__6, $k, $fmt);
            }
            return $caml_trampoline_return(
              $take_format_readers__0,
              varray[0,$k,$fmt]
            );
          // FALLTHROUGH
          case 3:
            if ($counter < 50) {
              $counter__7 = (int) ($counter + 1);
              return $take_format_readers__0($counter__7, $k, $fmt);
            }
            return $caml_trampoline_return(
              $take_format_readers__0,
              varray[0,$k,$fmt]
            );
          // FALLTHROUGH
          case 4:
            if ($counter < 50) {
              $counter__8 = (int) ($counter + 1);
              return $take_format_readers__0($counter__8, $k, $fmt);
            }
            return $caml_trampoline_return(
              $take_format_readers__0,
              varray[0,$k,$fmt]
            );
          // FALLTHROUGH
          case 5:
            if ($counter < 50) {
              $counter__9 = (int) ($counter + 1);
              return $take_format_readers__0($counter__9, $k, $fmt);
            }
            return $caml_trampoline_return(
              $take_format_readers__0,
              varray[0,$k,$fmt]
            );
          // FALLTHROUGH
          case 6:
            if ($counter < 50) {
              $counter__10 = (int) ($counter + 1);
              return $take_format_readers__0($counter__10, $k, $fmt);
            }
            return $caml_trampoline_return(
              $take_format_readers__0,
              varray[0,$k,$fmt]
            );
          // FALLTHROUGH
          case 7:
            if ($counter < 50) {
              $counter__11 = (int) ($counter + 1);
              return $take_format_readers__0($counter__11, $k, $fmt);
            }
            return $caml_trampoline_return(
              $take_format_readers__0,
              varray[0,$k,$fmt]
            );
          // FALLTHROUGH
          case 8:
            if ($counter < 50) {
              $counter__12 = (int) ($counter + 1);
              return $take_format_readers__0($counter__12, $k, $fmt);
            }
            return $caml_trampoline_return(
              $take_format_readers__0,
              varray[0,$k,$fmt]
            );
          // FALLTHROUGH
          case 9:
            $fmtty = $ign[2];
            if ($counter < 50) {
              $counter__0 = (int) ($counter + 1);
              return $take_fmtty_format_readers__0->contents(
                $counter__0,
                $k,
                $fmtty,
                $fmt
              );
            }
            return $caml_trampoline_return(
              $take_fmtty_format_readers__0->contents,
              varray[0,$k,$fmtty,$fmt]
            );
          // FALLTHROUGH
          case 10:
            if ($counter < 50) {
              $counter__13 = (int) ($counter + 1);
              return $take_format_readers__0($counter__13, $k, $fmt);
            }
            return $caml_trampoline_return(
              $take_format_readers__0,
              varray[0,$k,$fmt]
            );
          // FALLTHROUGH
          default:
            if ($counter < 50) {
              $counter__14 = (int) ($counter + 1);
              return $take_format_readers__0($counter__14, $k, $fmt);
            }
            return $caml_trampoline_return(
              $take_format_readers__0,
              varray[0,$k,$fmt]
            );
          }
      }
    };
    $take_format_readers->contents = function(dynamic $k, dynamic $fmt) use ($caml_trampoline,$take_format_readers__0) {
      return $caml_trampoline($take_format_readers__0(0, $k, $fmt));
    };
    $take_fmtty_format_readers->contents = function
    (dynamic $k, dynamic $fmtty, dynamic $fmt) use ($caml_trampoline,$take_fmtty_format_readers__0) {
      return $caml_trampoline(
        $take_fmtty_format_readers__0->contents(0, $k, $fmtty, $fmt)
      );
    };
    $pad_prec_scanf = function
    (dynamic $ib, dynamic $fmt, dynamic $readers, dynamic $pad, dynamic $prec, dynamic $scan, dynamic $token) use ($Pervasives,$call1,$call3,$cst_scanf_bad_conversion,$cst_scanf_bad_conversion__0,$cst_scanf_bad_conversion__1,$cst_scanf_bad_conversion__2,$is_int,$make_scanf) {
      if ($is_int($pad)) {
        if ($is_int($prec)) {
          if (0 === $prec) {
            $call3($scan, $Pervasives[7], $Pervasives[7], $ib);
            $x = $call1($token, $ib);
            return Vector{0, $x, $make_scanf->contents($ib, $fmt, $readers)};
          }
          return $call1($Pervasives[1], $cst_scanf_bad_conversion);
        }
        $p = $prec[1];
        $call3($scan, $Pervasives[7], $p, $ib);
        $x__0 = $call1($token, $ib);
        return Vector{0, $x__0, $make_scanf->contents($ib, $fmt, $readers)};
      }
      else {
        if (0 === $pad[0]) {
          if (0 === $pad[1]) {
            return $call1($Pervasives[1], $cst_scanf_bad_conversion__0);
          }
          $al = $pad[2];
          if ($is_int($prec)) {
            if (0 === $prec) {
              $call3($scan, $al, $Pervasives[7], $ib);
              $x__1 = $call1($token, $ib);
              return Vector{
                0,
                $x__1,
                $make_scanf->contents($ib, $fmt, $readers)
              };
            }
            return $call1($Pervasives[1], $cst_scanf_bad_conversion__1);
          }
          $p__0 = $prec[1];
          $call3($scan, $al, $p__0, $ib);
          $x__2 = $call1($token, $ib);
          return Vector{0, $x__2, $make_scanf->contents($ib, $fmt, $readers)};
        }
        return $call1($Pervasives[1], $cst_scanf_bad_conversion__2);
      }
    };
    $make_scanf->contents = function
    (dynamic $ib, dynamic $fmt, dynamic $readers) use ($Assert_failure,$CamlinternalFormat,$CamlinternalFormatBasics,$Failure,$Pervasives,$String,$bad_input,$call1,$call2,$caml_wrap_exception,$check_char,$checked_peek_char,$cst_end_of_input_not_found,$cst_scanf_bad_conversion_a,$cst_scanf_bad_conversion_custom_converter,$cst_scanf_bad_conversion_t,$cst_scanf_missing_reader,$end_of_input,$get_counter,$integer_conversion_of_char,$is_int,$make_scanf,$pad_prec_scanf,$q,$r,$runtime,$s,$scan_bool,$scan_caml_char,$scan_caml_float,$scan_caml_string,$scan_char,$scan_chars_in_char_set,$scan_float,$scan_hex_float,$scan_int_conversion,$scan_string,$stopper_of_formatting_lit,$token_bool,$token_char,$token_float,$token_int,$token_int32,$token_int64,$token_nativeint,$token_string,$width_of_pad_opt) {
      $fmt__0 = $fmt;
      for (;;) if (
        $is_int($fmt__0)
      ) {return 0;}
      else {
        switch($fmt__0[0]) {
          // FALLTHROUGH
          case 0:
            $rest = $fmt__0[1];
            $scan_char(0, $ib);
            $c = $token_char($ib);
            return Vector{0, $c, $make_scanf->contents($ib, $rest, $readers)};
          // FALLTHROUGH
          case 1:
            $rest__0 = $fmt__0[1];
            $scan_caml_char(0, $ib);
            $c__0 = $token_char($ib);
            return Vector{
              0,
              $c__0,
              $make_scanf->contents($ib, $rest__0, $readers)
            };
          // FALLTHROUGH
          case 2:
            $K = $fmt__0[2];
            $L = $fmt__0[1];
            if (! $is_int($K)) {
              switch($K[0]) {
                // FALLTHROUGH
                case 17:
                  $rest__1 = $K[2];
                  $fmting_lit = $K[1];
                  $match = $stopper_of_formatting_lit($fmting_lit);
                  $str = $match[2];
                  $stp = $match[1];
                  $scan__0 = function
                  (dynamic $width, dynamic $param, dynamic $ib) use ($scan_string,$stp) {
                    return $scan_string(Vector{0, $stp}, $width, $ib);
                  };
                  $str_rest = Vector{11, $str, $rest__1};
                  return $pad_prec_scanf(
                    $ib,
                    $str_rest,
                    $readers,
                    $L,
                    0,
                    $scan__0,
                    $token_string
                  );
                // FALLTHROUGH
                case 18:
                  $M = $K[1];
                  if (0 === $M[0]) {
                    $rest__2 = $K[2];
                    $match__0 = $M[1];
                    $fmt__1 = $match__0[1];
                    $scan__1 = function
                    (dynamic $width, dynamic $param, dynamic $ib) use ($q,$scan_string) {
                      return $scan_string($q, $width, $ib);
                    };
                    return $pad_prec_scanf(
                      $ib,
                      $call2($CamlinternalFormatBasics[3], $fmt__1, $rest__2),
                      $readers,
                      $L,
                      0,
                      $scan__1,
                      $token_string
                    );
                  }
                  $rest__3 = $K[2];
                  $match__1 = $M[1];
                  $fmt__2 = $match__1[1];
                  $scan__2 = function
                  (dynamic $width, dynamic $param, dynamic $ib) use ($r,$scan_string) {
                    return $scan_string($r, $width, $ib);
                  };
                  return $pad_prec_scanf(
                    $ib,
                    $call2($CamlinternalFormatBasics[3], $fmt__2, $rest__3),
                    $readers,
                    $L,
                    0,
                    $scan__2,
                    $token_string
                  );
                }
            }
            $scan = function(dynamic $width, dynamic $param, dynamic $ib) use ($scan_string) {
              return $scan_string(0, $width, $ib);
            };
            return $pad_prec_scanf(
              $ib,
              $K,
              $readers,
              $L,
              0,
              $scan,
              $token_string
            );
          // FALLTHROUGH
          case 3:
            $rest__4 = $fmt__0[2];
            $pad = $fmt__0[1];
            $scan__3 = function(dynamic $width, dynamic $param, dynamic $ib) use ($scan_caml_string) {
              return $scan_caml_string($width, $ib);
            };
            return $pad_prec_scanf(
              $ib,
              $rest__4,
              $readers,
              $pad,
              0,
              $scan__3,
              $token_string
            );
          // FALLTHROUGH
          case 4:
            $rest__5 = $fmt__0[4];
            $prec = $fmt__0[3];
            $pad__0 = $fmt__0[2];
            $iconv = $fmt__0[1];
            $c__1 = $integer_conversion_of_char(
              $call1($CamlinternalFormat[16], $iconv)
            );
            $scan__4 = function(dynamic $width, dynamic $param, dynamic $ib) use ($c__1,$scan_int_conversion) {
              return $scan_int_conversion($c__1, $width, $ib);
            };
            return $pad_prec_scanf(
              $ib,
              $rest__5,
              $readers,
              $pad__0,
              $prec,
              $scan__4,
              function(dynamic $ak) use ($c__1,$token_int) {
                return $token_int($c__1, $ak);
              }
            );
          // FALLTHROUGH
          case 5:
            $rest__6 = $fmt__0[4];
            $prec__0 = $fmt__0[3];
            $pad__1 = $fmt__0[2];
            $iconv__0 = $fmt__0[1];
            $c__2 = $integer_conversion_of_char(
              $call1($CamlinternalFormat[16], $iconv__0)
            );
            $scan__5 = function(dynamic $width, dynamic $param, dynamic $ib) use ($c__2,$scan_int_conversion) {
              return $scan_int_conversion($c__2, $width, $ib);
            };
            return $pad_prec_scanf(
              $ib,
              $rest__6,
              $readers,
              $pad__1,
              $prec__0,
              $scan__5,
              function(dynamic $aj) use ($c__2,$token_int32) {
                return $token_int32($c__2, $aj);
              }
            );
          // FALLTHROUGH
          case 6:
            $rest__7 = $fmt__0[4];
            $prec__1 = $fmt__0[3];
            $pad__2 = $fmt__0[2];
            $iconv__1 = $fmt__0[1];
            $c__3 = $integer_conversion_of_char(
              $call1($CamlinternalFormat[16], $iconv__1)
            );
            $scan__6 = function(dynamic $width, dynamic $param, dynamic $ib) use ($c__3,$scan_int_conversion) {
              return $scan_int_conversion($c__3, $width, $ib);
            };
            return $pad_prec_scanf(
              $ib,
              $rest__7,
              $readers,
              $pad__2,
              $prec__1,
              $scan__6,
              function(dynamic $ai) use ($c__3,$token_nativeint) {
                return $token_nativeint($c__3, $ai);
              }
            );
          // FALLTHROUGH
          case 7:
            $rest__8 = $fmt__0[4];
            $prec__2 = $fmt__0[3];
            $pad__3 = $fmt__0[2];
            $iconv__2 = $fmt__0[1];
            $c__4 = $integer_conversion_of_char(
              $call1($CamlinternalFormat[16], $iconv__2)
            );
            $scan__7 = function(dynamic $width, dynamic $param, dynamic $ib) use ($c__4,$scan_int_conversion) {
              return $scan_int_conversion($c__4, $width, $ib);
            };
            return $pad_prec_scanf(
              $ib,
              $rest__8,
              $readers,
              $pad__3,
              $prec__2,
              $scan__7,
              function(dynamic $ah) use ($c__4,$token_int64) {
                return $token_int64($c__4, $ah);
              }
            );
          // FALLTHROUGH
          case 8:
            $N = $fmt__0[1];
            if (15 === $N) {
              $rest__9 = $fmt__0[4];
              $prec__3 = $fmt__0[3];
              $pad__4 = $fmt__0[2];
              return $pad_prec_scanf(
                $ib,
                $rest__9,
                $readers,
                $pad__4,
                $prec__3,
                $scan_caml_float,
                $token_float
              );
            }
            if (16 <= $N) {
              $rest__10 = $fmt__0[4];
              $prec__4 = $fmt__0[3];
              $pad__5 = $fmt__0[2];
              return $pad_prec_scanf(
                $ib,
                $rest__10,
                $readers,
                $pad__5,
                $prec__4,
                $scan_hex_float,
                $token_float
              );
            }
            $rest__11 = $fmt__0[4];
            $prec__5 = $fmt__0[3];
            $pad__6 = $fmt__0[2];
            return $pad_prec_scanf(
              $ib,
              $rest__11,
              $readers,
              $pad__6,
              $prec__5,
              $scan_float,
              $token_float
            );
          // FALLTHROUGH
          case 9:
            $rest__12 = $fmt__0[2];
            $pad__7 = $fmt__0[1];
            $scan__8 = function(dynamic $param, dynamic $ag, dynamic $ib) use ($scan_bool) {return $scan_bool($ib);
            };
            return $pad_prec_scanf(
              $ib,
              $rest__12,
              $readers,
              $pad__7,
              0,
              $scan__8,
              $token_bool
            );
          // FALLTHROUGH
          case 10:
            $rest__13 = $fmt__0[1];
            if ($end_of_input($ib)) {$fmt__0 = $rest__13;continue;}
            return $bad_input($cst_end_of_input_not_found);
          // FALLTHROUGH
          case 11:
            $fmt__3 = $fmt__0[2];
            $str__0 = $fmt__0[1];
            $O = function(dynamic $af) use ($check_char,$ib) {
              return $check_char($ib, $af);
            };
            $call2($String[8], $O, $str__0);
            $fmt__0 = $fmt__3;
            continue;
          // FALLTHROUGH
          case 12:
            $fmt__4 = $fmt__0[2];
            $chr = $fmt__0[1];
            $check_char($ib, $chr);
            $fmt__0 = $fmt__4;
            continue;
          // FALLTHROUGH
          case 13:
            $rest__14 = $fmt__0[3];
            $fmtty = $fmt__0[2];
            $pad_opt = $fmt__0[1];
            $scan_caml_string($width_of_pad_opt($pad_opt), $ib);
            $s__0 = $token_string($ib);
            try {
              $Q = $call2($CamlinternalFormat[14], $s__0, $fmtty);
              $fmt__5 = $Q;
            }
            catch(\Throwable $exn) {
              $exn = $caml_wrap_exception($exn);
              if ($exn[1] !== $Failure) {
                throw $runtime["caml_wrap_thrown_exception_reraise"]($exn) as \Throwable;
              }
              $msg = $exn[2];
              $P = $bad_input($msg);
              $fmt__5 = $P;
            }
            return Vector{
              0,
              $fmt__5,
              $make_scanf->contents($ib, $rest__14, $readers)
            };
          // FALLTHROUGH
          case 14:
            $rest__15 = $fmt__0[3];
            $fmtty__0 = $fmt__0[2];
            $pad_opt__0 = $fmt__0[1];
            $scan_caml_string($width_of_pad_opt($pad_opt__0), $ib);
            $s__1 = $token_string($ib);
            try {
              $match__2 = $call2($CamlinternalFormat[13], 0, $s__1);
              $fmt__8 = $match__2[1];
              $match__3 = $call2($CamlinternalFormat[13], 0, $s__1);
              $fmt__9 = $match__3[1];
              $U = $call1($CamlinternalFormat[22], $fmtty__0);
              $V = $call1($CamlinternalFormatBasics[2], $U);
              $fmt__10 = $call2($CamlinternalFormat[12], $fmt__9, $V);
              $W = $call1($CamlinternalFormatBasics[2], $fmtty__0);
              $X = $call2($CamlinternalFormat[12], $fmt__8, $W);
              $fmt__7 = $X;
              $fmt__6 = $fmt__10;
            }
            catch(\Throwable $exn) {
              $exn = $caml_wrap_exception($exn);
              if ($exn[1] !== $Failure) {
                throw $runtime["caml_wrap_thrown_exception_reraise"]($exn) as \Throwable;
              }
              $msg__0 = $exn[2];
              $R = $bad_input($msg__0);
              $S = $R[2];
              $T = $R[1];
              $fmt__7 = $T;
              $fmt__6 = $S;
            }
            return Vector{
              0,
              Vector{0, $fmt__7, $s__1},
              $make_scanf->contents(
                $ib,
                $call2($CamlinternalFormatBasics[3], $fmt__6, $rest__15),
                $readers
              )
            };
          // FALLTHROUGH
          case 15:
            return $call1($Pervasives[1], $cst_scanf_bad_conversion_a);
          // FALLTHROUGH
          case 16:
            return $call1($Pervasives[1], $cst_scanf_bad_conversion_t);
          // FALLTHROUGH
          case 17:
            $fmt__11 = $fmt__0[2];
            $formatting_lit = $fmt__0[1];
            $Y = $call1($CamlinternalFormat[17], $formatting_lit);
            $Z = function(dynamic $ae) use ($check_char,$ib) {
              return $check_char($ib, $ae);
            };
            $call2($String[8], $Z, $Y);
            $fmt__0 = $fmt__11;
            continue;
          // FALLTHROUGH
          case 18:
            $aa = $fmt__0[1];
            if (0 === $aa[0]) {
              $rest__16 = $fmt__0[2];
              $match__4 = $aa[1];
              $fmt__12 = $match__4[1];
              $check_char($ib, 64);
              $check_char($ib, 123);
              $fmt__13 = $call2(
                $CamlinternalFormatBasics[3],
                $fmt__12,
                $rest__16
              );
              $fmt__0 = $fmt__13;
              continue;
            }
            $rest__17 = $fmt__0[2];
            $match__5 = $aa[1];
            $fmt__14 = $match__5[1];
            $check_char($ib, 64);
            $check_char($ib, 91);
            $fmt__15 = $call2(
              $CamlinternalFormatBasics[3],
              $fmt__14,
              $rest__17
            );
            $fmt__0 = $fmt__15;
            continue;
          // FALLTHROUGH
          case 19:
            $fmt_rest = $fmt__0[1];
            if ($readers) {
              $readers_rest = $readers[2];
              $reader = $readers[1];
              $x = $call1($reader, $ib);
              return Vector{
                0,
                $x,
                $make_scanf->contents($ib, $fmt_rest, $readers_rest)
              };
            }
            return $call1($Pervasives[1], $cst_scanf_missing_reader);
          // FALLTHROUGH
          case 20:
            $ab = $fmt__0[3];
            $ac = $fmt__0[2];
            $ad = $fmt__0[1];
            if (! $is_int($ab) && 17 === $ab[0]) {
              $rest__18 = $ab[2];
              $fmting_lit__0 = $ab[1];
              $match__6 = $stopper_of_formatting_lit($fmting_lit__0);
              $str__1 = $match__6[2];
              $stp__0 = $match__6[1];
              $width__0 = $width_of_pad_opt($ad);
              $scan_chars_in_char_set($ac, Vector{0, $stp__0}, $width__0, $ib);
              $s__3 = $token_string($ib);
              $str_rest__0 = Vector{11, $str__1, $rest__18};
              return Vector{
                0,
                $s__3,
                $make_scanf->contents($ib, $str_rest__0, $readers)
              };
            }
            $width = $width_of_pad_opt($ad);
            $scan_chars_in_char_set($ac, 0, $width, $ib);
            $s__2 = $token_string($ib);
            return Vector{0, $s__2, $make_scanf->contents($ib, $ab, $readers)};
          // FALLTHROUGH
          case 21:
            $rest__19 = $fmt__0[2];
            $counter = $fmt__0[1];
            $count = $get_counter($ib, $counter);
            return Vector{
              0,
              $count,
              $make_scanf->contents($ib, $rest__19, $readers)
            };
          // FALLTHROUGH
          case 22:
            $rest__20 = $fmt__0[1];
            $c__5 = $checked_peek_char($ib);
            return Vector{
              0,
              $c__5,
              $make_scanf->contents($ib, $rest__20, $readers)
            };
          // FALLTHROUGH
          case 23:
            $rest__21 = $fmt__0[2];
            $ign = $fmt__0[1];
            $match__7 = $call2($CamlinternalFormat[6], $ign, $rest__21);
            $fmt__16 = $match__7[1];
            $match__8 = $make_scanf->contents($ib, $fmt__16, $readers);
            if ($match__8) {$arg_rest = $match__8[2];return $arg_rest;}
            throw $runtime["caml_wrap_thrown_exception"](Vector{0, $Assert_failure, $s}) as \Throwable;
          // FALLTHROUGH
          default:
            return $call1(
              $Pervasives[1],
              $cst_scanf_bad_conversion_custom_converter
            );
          }
      }
    };
    $kscanf = function(dynamic $ib, dynamic $ef, dynamic $param) use ($End_of_file,$Failure,$Invalid_argument,$Pervasives,$Scan_failure,$String,$call1,$call2,$caml_wrap_exception,$cst__1,$cst_in_format,$make_scanf,$reset_token,$runtime,$take_format_readers) {
      $str = $param[2];
      $fmt = $param[1];
      $apply = function(dynamic $f, dynamic $args) use ($call1) {
        $f__0 = $f;
        $args__0 = $args;
        for (;;) {
          if ($args__0) {
            $args__1 = $args__0[2];
            $x = $args__0[1];
            $f__1 = $call1($f__0, $x);
            $f__0 = $f__1;
            $args__0 = $args__1;
            continue;
          }
          return $f__0;
        }
      };
      $k = function(dynamic $readers, dynamic $f) use ($End_of_file,$Failure,$Invalid_argument,$Pervasives,$Scan_failure,$String,$apply,$call1,$call2,$caml_wrap_exception,$cst__1,$cst_in_format,$ef,$fmt,$ib,$make_scanf,$reset_token,$runtime,$str) {
        $reset_token($ib);
        try {
          $J = Vector{0, $make_scanf->contents($ib, $fmt, $readers)};
          $D = $J;
        }
        catch(\Throwable $exc) {
          $exc = $caml_wrap_exception($exc);
          if ($exc[1] === $Scan_failure) {$switch__0 = 0;}
          else {
            if ($exc[1] === $Failure) {$switch__0 = 0;}
            else {
              if ($exc === $End_of_file) {$switch__0 = 0;}
              else {
                if ($exc[1] !== $Invalid_argument) {
                  throw $runtime["caml_wrap_thrown_exception_reraise"]($exc) as \Throwable;
                }
                $msg = $exc[2];
                $E = $call1($String[13], $str);
                $F = $call2($Pervasives[16], $E, $cst__1);
                $G = $call2($Pervasives[16], $cst_in_format, $F);
                $H = $call2($Pervasives[16], $msg, $G);
                $I = $call1($Pervasives[1], $H);
                $C = $I;
                $switch__0 = 1;
              }
            }
          }
          if (! $switch__0) {$C = Vector{1, $exc};}
          $D = $C;
        }
        if (0 === $D[0]) {$args = $D[1];return $apply($f, $args);}
        $exc = $D[1];
        return $call2($ef, $ib, $exc);
      };
      return $take_format_readers->contents($k, $fmt);
    };
    $bscanf = function(dynamic $ib, dynamic $fmt) use ($kscanf,$scanf_bad_input) {
      return $kscanf($ib, $scanf_bad_input, $fmt);
    };
    $ksscanf = function(dynamic $s, dynamic $ef, dynamic $fmt) use ($from_string,$kscanf) {
      return $kscanf($from_string($s), $ef, $fmt);
    };
    $sscanf = function(dynamic $s, dynamic $fmt) use ($from_string,$kscanf,$scanf_bad_input) {
      return $kscanf($from_string($s), $scanf_bad_input, $fmt);
    };
    $scanf = function(dynamic $fmt) use ($kscanf,$scanf_bad_input,$stdin) {
      return $kscanf($stdin, $scanf_bad_input, $fmt);
    };
    $bscanf_format = function(dynamic $ib, dynamic $format, dynamic $f) use ($CamlinternalFormat,$Failure,$Pervasives,$bad_input,$call1,$call2,$caml_wrap_exception,$runtime,$scan_caml_string,$token_string) {
      $scan_caml_string($Pervasives[7], $ib);
      $str = $token_string($ib);
      try {$B = $call2($CamlinternalFormat[15], $str, $format);$fmt = $B;}
      catch(\Throwable $exn) {
        $exn = $caml_wrap_exception($exn);
        if ($exn[1] !== $Failure) {
          throw $runtime["caml_wrap_thrown_exception_reraise"]($exn) as \Throwable;
        }
        $msg = $exn[2];
        $A = $bad_input($msg);
        $fmt = $A;
      }
      return $call1($f, $fmt);
    };
    $sscanf_format = function(dynamic $s, dynamic $format, dynamic $f) use ($bscanf_format,$from_string) {
      return $bscanf_format($from_string($s), $format, $f);
    };
    $string_to_String = function(dynamic $s) use ($Buffer,$call1,$call2,$caml_ml_string_length,$caml_string_get) {
      $l = $caml_ml_string_length($s);
      $b = $call1($Buffer[1], (int) ($l + 2));
      $call2($Buffer[10], $b, 34);
      $y = (int) ($l + -1);
      $x = 0;
      if (! ($y < 0)) {
        $i = $x;
        for (;;) {
          $c = $caml_string_get($s, $i);
          if (34 === $c) {$call2($Buffer[10], $b, 92);}
          $call2($Buffer[10], $b, $c);
          $z = (int) ($i + 1);
          if ($y !== $i) {$i = $z;continue;}
          break;
        }
      }
      $call2($Buffer[10], $b, 34);
      return $call1($Buffer[2], $b);
    };
    $format_from_string = function(dynamic $s, dynamic $fmt) use ($sscanf_format,$string_to_String) {
      $w = function(dynamic $x) {return $x;};
      return $sscanf_format($string_to_String($s), $fmt, $w);
    };
    $unescaped = function(dynamic $s) use ($Pervasives,$call1,$call2,$cst__2,$cst__3,$sscanf,$t) {
      $u = function(dynamic $x) {return $x;};
      $v = $call2($Pervasives[16], $s, $cst__2);
      return $call1($sscanf($call2($Pervasives[16], $cst__3, $v), $t), $u);
    };
    $kfscanf = function(dynamic $ic, dynamic $ef, dynamic $fmt) use ($kscanf,$memo_from_channel) {
      return $kscanf($memo_from_channel($ic), $ef, $fmt);
    };
    $fscanf = function(dynamic $ic, dynamic $fmt) use ($kscanf,$memo_from_channel,$scanf_bad_input) {
      return $kscanf($memo_from_channel($ic), $scanf_bad_input, $fmt);
    };
    $Scanf = Vector{
      0,
      Vector{
        0,
        $stdin,
        $open_in,
        $open_in_bin,
        $close_in,
        $open_in,
        $open_in_bin,
        $from_string,
        $from_function,
        $from_channel,
        $end_of_input,
        $beginning_of_input,
        $name_of_input,
        $stdin
      },
      $Scan_failure,
      $bscanf,
      $sscanf,
      $scanf,
      $kscanf,
      $ksscanf,
      $bscanf_format,
      $sscanf_format,
      $format_from_string,
      $unescaped,
      $fscanf,
      $kfscanf
    };
    
    $runtime["caml_register_global"](66, $Scanf, "Scanf");

  }
}

