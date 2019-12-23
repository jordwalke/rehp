<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class Scanf {
  <<__Override, __Memoize>>
  public static function requireModule() : Vector<dynamic> {
    $joo_global_object = \Rehack\GlobalObject::get() as dynamic;
    
    $make_scanf = new Ref();
    $take_fmtty_format_readers = new Ref();
    $take_fmtty_format_readers__0 = new Ref();
    $take_format_readers = new Ref();
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
    $caml_wrap_thrown_exception = $runtime["caml_wrap_thrown_exception"];
    $caml_wrap_thrown_exception_reraise = $runtime[
       "caml_wrap_thrown_exception_reraise"
     ];
    $is_int = $runtime["is_int"];
    $unsigned_right_shift_32 = $runtime["unsigned_right_shift_32"];
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
    $CamlinternalFormat =  CamlinternalFormat::requireModule ();
    $CamlinternalFormatBasics =  CamlinternalFormatBasics::requireModule ();
    $String =  String_::requireModule ();
    $Failure =  Failure::requireModule ();
    $Pervasives =  Pervasives::requireModule ();
    $Assert_failure =  Assert_failure::requireModule ();
    $Buffer =  Buffer::requireModule ();
    $End_of_file =  End_of_file::requireModule ();
    $Invalid_argument =  Invalid_argument::requireModule ();
    $Printf =  Printf::requireModule ();
    $List =  List_::requireModule ();
    $Not_found =  Not_found::requireModule ();
    $r_ = Vector{0, 91} as dynamic;
    $q_ = Vector{0, 123} as dynamic;
    $s_ = Vector{0, $string("scanf.ml"), 1455, 13} as dynamic;
    $t_ = Vector{0, Vector{3, 0, Vector{10, 0}}, $string("%S%!")} as dynamic;
    $p_ = Vector{0, 37, $string("")} as dynamic;
    $o_ = Vector{
      0,
      Vector{
        11,
        $string("scanf: bad input at char number "),
        Vector{4, 3, 0, 0, Vector{11, $string(": "), Vector{2, 0, 0}}}
      },
      $string("scanf: bad input at char number %i: %s")
    } as dynamic;
    $n_ = Vector{
      0,
      Vector{
        11,
        $string("the character "),
        Vector{1, Vector{11, $string(" cannot start a boolean"), 0}}
      },
      $string("the character %C cannot start a boolean")
    } as dynamic;
    $m_ = Vector{
      0,
      Vector{
        11,
        $string("bad character hexadecimal encoding \\"),
        Vector{0, Vector{0, 0}}
      },
      $string("bad character hexadecimal encoding \\%c%c")
    } as dynamic;
    $l_ = Vector{
      0,
      Vector{
        11,
        $string("bad character decimal encoding \\"),
        Vector{0, Vector{0, Vector{0, 0}}}
      },
      $string("bad character decimal encoding \\%c%c%c")
    } as dynamic;
    $k_ = Vector{
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
    } as dynamic;
    $j_ = Vector{
      0,
      Vector{
        11,
        $string("character "),
        Vector{1, Vector{11, $string(" is not a decimal digit"), 0}}
      },
      $string("character %C is not a decimal digit")
    } as dynamic;
    $i_ = Vector{0, $string("scanf.ml"), 555, 9} as dynamic;
    $h_ = Vector{
      0,
      Vector{11, $string("invalid boolean '"), Vector{2, 0, Vector{12, 39, 0}}
      },
      $string("invalid boolean '%s'")
    } as dynamic;
    $g_ = Vector{
      0,
      Vector{
        11,
        $string("looking for "),
        Vector{1, Vector{11, $string(", found "), Vector{1, 0}}}
      },
      $string("looking for %C, found %C")
    } as dynamic;
    $f_ = Vector{
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
    } as dynamic;
    $e_ = Vector{
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
    } as dynamic;
    $d_ = Vector{
      0,
      Vector{11, $string("illegal escape character "), Vector{1, 0}},
      $string("illegal escape character %C")
    } as dynamic;
    $null_char = 0;
    $next_char = (dynamic $ib) ==> {
      $c = null;
      try {
        $c = $call1($ib[7], 0);
        $ib[2] = $c;
        $ib[3] = 1;
        $ib[4] = (int) ($ib[4] + 1);
        if (10 === $c) {$ib[5] = (int) ($ib[5] + 1);}
        return $c;
      }
      catch(\Throwable $br_) {
        $br_ = $runtime["caml_wrap_exception"]($br_);
        if ($br_ === $End_of_file) {
          $ib[2] = $null_char;
          $ib[3] = 0;
          $ib[1] = 1;
          return $null_char;
        }
        throw $caml_wrap_thrown_exception_reraise($br_) as \Throwable;
      }
    };
    $peek_char = (dynamic $ib) ==> {
      return $ib[3] ? $ib[2] : ($next_char($ib));
    };
    $checked_peek_char = (dynamic $ib) ==> {
      $c = $peek_char($ib);
      if ($ib[1]) {
        throw $caml_wrap_thrown_exception($End_of_file) as \Throwable;
      }
      return $c;
    };
    $end_of_input = (dynamic $ib) ==> {$peek_char($ib);return $ib[1];};
    $beginning_of_input = (dynamic $ib) ==> {return 0 === $ib[4] ? 1 : (0);};
    $name_of_input = (dynamic $ib) ==> {
      $fname = null;
      $bq_ = $ib[9];
      if ($is_int($bq_)) {
        return 0 === $bq_
          ? $cst_unnamed_function
          : ($cst_unnamed_character_string);
      }
      else {
        if (0 === $bq_[0]) {return $cst_unnamed_Pervasives_input_channel;}
        $fname = $bq_[1];
        return $fname;
      }
    };
    $char_count = (dynamic $ib) ==> {
      return $ib[3] ? (int) ($ib[4] + -1) : ($ib[4]);
    };
    $reset_token = (dynamic $ib) ==> {return $call1($Buffer[9], $ib[8]);};
    $invalidate_current_char = (dynamic $ib) ==> {$ib[3] = 0;return 0;};
    $token_string = (dynamic $ib) ==> {
      $token_buffer = $ib[8];
      $tok = $call1($Buffer[2], $token_buffer);
      $call1($Buffer[8], $token_buffer);
      $ib[6] = (int) ($ib[6] + 1);
      return $tok;
    };
    $skip_char = (dynamic $width, dynamic $ib) ==> {
      $invalidate_current_char($ib);
      return $width;
    };
    $ignore_char = (dynamic $width, dynamic $ib) ==> {
      return $skip_char((int) ($width + -1), $ib);
    };
    $store_char = (dynamic $width, dynamic $ib, dynamic $c) ==> {
      $call2($Buffer[10], $ib[8], $c);
      return $ignore_char($width, $ib);
    };
    $default_token_buffer_size = 1024;
    $create = (dynamic $iname, dynamic $next) ==> {
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
    $from_string = (dynamic $s) ==> {
      $i = Vector{0, 0} as dynamic;
      $len = $caml_ml_string_length($s);
      $next = (dynamic $param) ==> {
        if ($len <= $i[1]) {
          throw $caml_wrap_thrown_exception($End_of_file) as \Throwable;
        }
        $c = $caml_string_get($s, $i[1]);
        $i[1] += 1;
        return $c;
      };
      return $create(1, $next);
    };
    $a_ = 0;
    $from_function = (dynamic $bp_) ==> {return $create($a_, $bp_);};
    $len = 1024;
    $scan_close_at_end = (dynamic $ic) ==> {
      $call1($Pervasives[81], $ic);
      throw $caml_wrap_thrown_exception($End_of_file) as \Throwable;
    };
    $scan_raise_at_end = (dynamic $ic) ==> {
      throw $caml_wrap_thrown_exception($End_of_file) as \Throwable;
    };
    $from_ic = (dynamic $scan_close_ic, dynamic $iname, dynamic $ic) ==> {
      $buf = $runtime["caml_create_bytes"](1024);
      $i = Vector{0, 0} as dynamic;
      $lim = Vector{0, 0} as dynamic;
      $eof = Vector{0, 0} as dynamic;
      $next = (dynamic $param) ==> {
        $c = null;
        if ($i[1] < $lim[1]) {
          $c = $caml_bytes_get($buf, $i[1]);
          $i[1] += 1;
          return $c;
        }
        if ($eof[1]) {
          throw $caml_wrap_thrown_exception($End_of_file) as \Throwable;
        }
        $lim[1] = $call4($Pervasives[72], $ic, $buf, 0, $len);
        if (0 === $lim[1]) {$eof[1] = 1;return $call1($scan_close_ic, $ic);}
        $i[1] = 1;
        return $caml_bytes_get($buf, 0);
      };
      return $create($iname, $next);
    };
    $stdin = $from_ic(
      $scan_raise_at_end,
      Vector{1, $cst, $Pervasives[26]},
      $Pervasives[26]
    );
    $open_in_file = (dynamic $open_in, dynamic $fname) ==> {
      $ic = null;
      if ($caml_string_notequal($fname, $cst__0)) {
        $ic = $call1($open_in, $fname);
        return $from_ic($scan_close_at_end, Vector{1, $fname, $ic}, $ic);
      }
      return $stdin;
    };
    $b_ = $Pervasives[67];
    $open_in = (dynamic $bo_) ==> {return $open_in_file($b_, $bo_);};
    $c_ = $Pervasives[68];
    $open_in_bin = (dynamic $bn_) ==> {return $open_in_file($c_, $bn_);};
    $from_channel = (dynamic $ic) ==> {
      return $from_ic($scan_raise_at_end, Vector{0, $ic}, $ic);
    };
    $close_in = (dynamic $ib) ==> {
      $ic = null;
      $ic__0 = null;
      $bm_ = $ib[9];
      if ($is_int($bm_)) {return 0;}
      else {
        if (0 === $bm_[0]) {
          $ic = $bm_[1];
          return $call1($Pervasives[81], $ic);
        }
        $ic__0 = $bm_[2];
        return $call1($Pervasives[81], $ic__0);
      }
    };
    $memo = Vector{0, 0} as dynamic;
    $memo_from_ic = (dynamic $scan_close_ic, dynamic $ic) ==> {
      $bk_ = null;
      $ib = null;
      try {$bk_ = $call2($List[40], $ic, $memo[1]);return $bk_;}
      catch(\Throwable $bl_) {
        $bl_ = $runtime["caml_wrap_exception"]($bl_);
        if ($bl_ === $Not_found) {
          $ib = $from_ic($scan_close_ic, Vector{0, $ic}, $ic);
          $memo[1] = Vector{0, Vector{0, $ic, $ib}, $memo[1]};
          return $ib;
        }
        throw $caml_wrap_thrown_exception_reraise($bl_) as \Throwable;
      }
    };
    $memo_from_channel = (dynamic $bj_) ==> {
      return $memo_from_ic($scan_raise_at_end, $bj_);
    };
    $Scan_failure = Vector{
      248,
      $cst_Scanf_Scan_failure,
      $runtime["caml_fresh_oo_id"](0)
    } as dynamic;
    $bad_input = (dynamic $s) ==> {
      throw $caml_wrap_thrown_exception(Vector{0, $Scan_failure, $s}) as \Throwable;
    };
    $bad_input_escape = (dynamic $c) ==> {
      return $bad_input($call2($Printf[4], $d_, $c));
    };
    $bad_token_length = (dynamic $message) ==> {
      return $bad_input($call2($Printf[4], $e_, $message));
    };
    $bad_float = (dynamic $param) ==> {
      return $bad_input($cst_no_dot_or_exponent_part_found_in_float_token);
    };
    $bad_hex_float = (dynamic $param) ==> {
      return $bad_input($cst_not_a_valid_float_in_hexadecimal_notation);
    };
    $character_mismatch = (dynamic $c, dynamic $ci) ==> {
      return $bad_input($call3($Printf[4], $g_, $c, $ci));
    };
    $check_this_char = (dynamic $ib, dynamic $c) ==> {
      $ci = $checked_peek_char($ib);
      return $ci === $c
        ? $invalidate_current_char($ib)
        : ($character_mismatch($c, $ci));
    };
    $check_char = (dynamic $ib, dynamic $c__0) ==> {
      $switch__0 = null;
      $ci = null;
      $bi_ = null;
      $bh_ = null;
      $c = null;
      if (10 === $c__0) {
        $ci = $checked_peek_char($ib);
        if (10 === $ci) {return $invalidate_current_char($ib);}
        if (13 === $ci) {
          $invalidate_current_char($ib);
          return $check_this_char($ib, 10);
        }
        return $character_mismatch(10, $ci);
      }
      if (32 === $c__0) {
        for (;;) {
          $c = $peek_char($ib);
          $bh_ = 1 - $ib[1];
          if ($bh_) {
            $bi_ = (int) ($c + -9);
            $switch__0 =
              4 < $unsigned_right_shift_32($bi_, 0)
                ? 23 === $bi_ ? 1 : (0)
                : (1 < $unsigned_right_shift_32((int) ($bi_ + -2), 0)
                 ? 1
                 : (0));
            if ($switch__0) {$invalidate_current_char($ib);continue;}
            return 0;
          }
          return $bh_;
        }
      }
      return $check_this_char($ib, $c__0);
    };
    $token_char = (dynamic $ib) ==> {
      return $caml_string_get($token_string($ib), 0);
    };
    $token_bool = (dynamic $ib) ==> {
      $s = $token_string($ib);
      return $caml_string_notequal($s, $cst_false)
        ? $caml_string_notequal($s, $cst_true)
         ? $bad_input($call2($Printf[4], $h_, $s))
         : (1)
        : (0);
    };
    $integer_conversion_of_char = (dynamic $param) ==> {
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
      throw $caml_wrap_thrown_exception(Vector{0, $Assert_failure, $i_}) as \Throwable;
    };
    $token_int_literal = (dynamic $conv, dynamic $ib) ==> {
      $bg_ = null;
      $bf_ = null;
      $be_ = null;
      $tok = null;
      $bd_ = null;
      switch($conv) {
        // FALLTHROUGH
        case 0:
          $bd_ = $token_string($ib);
          $tok = $call2($Pervasives[16], $cst_0b, $bd_);
          break;
        // FALLTHROUGH
        case 3:
          $be_ = $token_string($ib);
          $tok = $call2($Pervasives[16], $cst_0o, $be_);
          break;
        // FALLTHROUGH
        case 4:
          $bf_ = $token_string($ib);
          $tok = $call2($Pervasives[16], $cst_0u, $bf_);
          break;
        // FALLTHROUGH
        case 5:
          $bg_ = $token_string($ib);
          $tok = $call2($Pervasives[16], $cst_0x, $bg_);
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
    $token_float = (dynamic $ib) ==> {
      return $runtime["caml_float_of_string"]($token_string($ib));
    };
    $scan_decimal_digit_star = (dynamic $width, dynamic $ib) ==> {
      $c = null;
      $width__1 = null;
      $width__2 = null;
      $width__0 = $width;
      for (;;) {
        if (0 === $width__0) {return $width__0;}
        $c = $peek_char($ib);
        if ($ib[1]) {return $width__0;}
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
    $scan_decimal_digit_plus = (dynamic $width, dynamic $ib) ==> {
      if (0 === $width) {return $bad_token_length($cst_decimal_digits);}
      $c = $checked_peek_char($ib);
      $switcher = (int) ($c + -48);
      if (9 < $unsigned_right_shift_32($switcher, 0)) {return $bad_input($call2($Printf[4], $j_, $c));
      }
      $width__0 = $store_char($width, $ib, $c);
      return $scan_decimal_digit_star($width__0, $ib);
    };
    $scan_digit_plus = 
    (dynamic $basis, dynamic $digitp, dynamic $width__2, dynamic $ib) ==> {
      $width__3 = null;
      $width__1 = null;
      $width__0 = null;
      $c = null;
      $width = null;
      if (0 === $width__2) {return $bad_token_length($cst_digits);}
      $c__0 = $checked_peek_char($ib);
      if ($call1($digitp, $c__0)) {
        $width__3 = $store_char($width__2, $ib, $c__0);
        $width = $width__3;
        for (;;) {
          if (0 === $width) {return $width;}
          $c = $peek_char($ib);
          if ($ib[1]) {return $width;}
          if ($call1($digitp, $c)) {
            $width__0 = $store_char($width, $ib, $c);
            $width = $width__0;
            continue;
          }
          if (95 === $c) {
            $width__1 = $ignore_char($width, $ib);
            $width = $width__1;
            continue;
          }
          return $width;
        }
      }
      return $bad_input($call3($Printf[4], $k_, $c__0, $basis));
    };
    $is_binary_digit = (dynamic $param) ==> {
      $switcher = (int) ($param + -48);
      return 1 < $unsigned_right_shift_32($switcher, 0) ? 0 : (1);
    };
    $scan_binary_int = (dynamic $bb_, dynamic $bc_) ==> {
      return $scan_digit_plus($cst_binary, $is_binary_digit, $bb_, $bc_);
    };
    $is_octal_digit = (dynamic $param) ==> {
      $switcher = (int) ($param + -48);
      return 7 < $unsigned_right_shift_32($switcher, 0) ? 0 : (1);
    };
    $scan_octal_int = (dynamic $a__, dynamic $ba_) ==> {
      return $scan_digit_plus($cst_octal, $is_octal_digit, $a__, $ba_);
    };
    $is_hexa_digit = (dynamic $param) ==> {
      $a9_ = (int) ($param + -48);
      $switch__0 = 22 < $unsigned_right_shift_32($a9_, 0)
        ? 5 < $unsigned_right_shift_32((int) ($a9_ + -49), 0) ? 0 : (1)
        : (6 < $unsigned_right_shift_32((int) ($a9_ + -10), 0) ? 1 : (0));
      return $switch__0 ? 1 : (0);
    };
    $scan_hexadecimal_int = (dynamic $a7_, dynamic $a8_) ==> {
      return $scan_digit_plus($cst_hexadecimal, $is_hexa_digit, $a7_, $a8_);
    };
    $scan_sign = (dynamic $width, dynamic $ib) ==> {
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
    $scan_optionally_signed_decimal_int = (dynamic $width, dynamic $ib) ==> {
      $width__0 = $scan_sign($width, $ib);
      return $scan_decimal_digit_plus($width__0, $ib);
    };
    $scan_int_conversion = (dynamic $conv, dynamic $width__1, dynamic $ib) ==> {
      $switch__0 = null;
      $width__0 = null;
      $c__0 = null;
      $width = null;
      $c = null;
      switch($conv) {
        // FALLTHROUGH
        case 0:
          return $scan_binary_int($width__1, $ib);
        // FALLTHROUGH
        case 1:
          return $scan_optionally_signed_decimal_int($width__1, $ib);
        // FALLTHROUGH
        case 2:
          $width__0 = $scan_sign($width__1, $ib);
          $c = $checked_peek_char($ib);
          if (48 === $c) {
            $width = $store_char($width__0, $ib, $c);
            if (0 === $width) {return $width;}
            $c__0 = $peek_char($ib);
            if ($ib[1]) {return $width;}
            if (99 <= $c__0) {
              if (111 === $c__0) {
                return $scan_octal_int($store_char($width, $ib, $c__0), $ib);
              }
              $switch__0 = 120 === $c__0 ? 1 : (0);
            }
            else {
              if (88 === $c__0) {$switch__0 = 1;}
              else {
                if (98 <= $c__0) {
                  return $scan_binary_int($store_char($width, $ib, $c__0), $ib
                  );
                }
                $switch__0 = 0;
              }
            }
            return $switch__0
              ? $scan_hexadecimal_int($store_char($width, $ib, $c__0), $ib)
              : ($scan_decimal_digit_star($width, $ib));
          }
          return $scan_decimal_digit_plus($width__0, $ib);
        // FALLTHROUGH
        case 3:
          return $scan_octal_int($width__1, $ib);
        // FALLTHROUGH
        case 4:
          return $scan_decimal_digit_plus($width__1, $ib);
        // FALLTHROUGH
        default:
          return $scan_hexadecimal_int($width__1, $ib);
        }
    };
    $scan_fractional_part = (dynamic $width, dynamic $ib) ==> {
      if (0 === $width) {return $width;}
      $c = $peek_char($ib);
      if ($ib[1]) {return $width;}
      $switcher = (int) ($c + -48);
      return 9 < $unsigned_right_shift_32($switcher, 0)
        ? $width
        : ($scan_decimal_digit_star($store_char($width, $ib, $c), $ib));
    };
    $scan_exponent_part = (dynamic $width, dynamic $ib) ==> {
      if (0 === $width) {return $width;}
      $c = $peek_char($ib);
      if ($ib[1]) {return $width;}
      if (69 !== $c) {if (101 !== $c) {return $width;}}
      return $scan_optionally_signed_decimal_int(
        $store_char($width, $ib, $c),
        $ib
      );
    };
    $scan_float = (dynamic $width__1, dynamic $precision, dynamic $ib) ==> {
      $width__2 = null;
      $precision__0 = null;
      $width__3 = null;
      $width = $scan_sign($width__1, $ib);
      $width__0 = $scan_decimal_digit_star($width, $ib);
      if (0 === $width__0) {return Vector{0, $width__0, $precision};}
      $c = $peek_char($ib);
      if ($ib[1]) {return Vector{0, $width__0, $precision};}
      if (46 === $c) {
        $width__2 = $store_char($width__0, $ib, $c);
        $precision__0 = $call2($Pervasives[4], $width__2, $precision);
        $width__3 =
          (int)
          ($width__2 -
             (int)
             ($precision__0 - $scan_fractional_part($precision__0, $ib)));
        return Vector{0, $scan_exponent_part($width__3, $ib), $precision__0};
      }
      return Vector{0, $scan_exponent_part($width__0, $ib), $precision};
    };
    $check_case_insensitive_string = 
    (dynamic $width, dynamic $ib, dynamic $error, dynamic $str) ==> {
      $i = null;
      $c = null;
      $a5_ = null;
      $a6_ = null;
      $lowercase = (dynamic $c) ==> {
        $switcher = (int) ($c + -65);
        return 25 < $unsigned_right_shift_32($switcher, 0)
          ? $c
          : ($call1($Pervasives[17], (int) ((int) ($c - 65) + 97)));
      };
      $len = $caml_ml_string_length($str);
      $width__0 = Vector{0, $width} as dynamic;
      $a4_ = (int) ($len + -1);
      $a3_ = 0;
      if (! ($a4_ < 0)) {
        $i = $a3_;
        for (;;) {
          $c = $peek_char($ib);
          $a5_ = $lowercase($caml_string_get($str, $i));
          if ($lowercase($c) !== $a5_) {$call1($error, 0);}
          if (0 === $width__0[1]) {$call1($error, 0);}
          $width__0[1] = $store_char($width__0[1], $ib, $c);
          $a6_ = (int) ($i + 1);
          if ($a4_ !== $i) {$i = $a6_;continue;}
          break;
        }
      }
      return $width__0[1];
    };
    $scan_hex_float = (dynamic $width, dynamic $precision, dynamic $ib) ==> {
      $switcher = null;
      $width__1 = null;
      $aU_ = null;
      $aV_ = null;
      $width__2 = null;
      $aW_ = null;
      $aX_ = null;
      $width__3 = null;
      $aY_ = null;
      $aZ_ = null;
      $width__4 = null;
      $match = null;
      $a0_ = null;
      $width__5 = null;
      $c__0 = null;
      $width__6 = null;
      $width__7 = null;
      $width__8 = null;
      $c__1 = null;
      $width__9 = null;
      $a1_ = null;
      $a2_ = null;
      $match__0 = null;
      $width__10 = null;
      $precision__0 = null;
      $switch__0 = null;
      $switch__1 = null;
      $switch__2 = null;
      $switch__3 = null;
      $aQ_ = 0 === $width ? 1 : (0);
      $aR_ = $aQ_ ? $aQ_ : ($end_of_input($ib));
      if ($aR_) {$bad_hex_float(0);}
      $width__0 = $scan_sign($width, $ib);
      $aS_ = 0 === $width__0 ? 1 : (0);
      $aT_ = $aS_ ? $aS_ : ($end_of_input($ib));
      if ($aT_) {$bad_hex_float(0);}
      $c = $peek_char($ib);
      if (78 <= $c) {
        $switcher = (int) ($c + -79);
        if (30 < $unsigned_right_shift_32($switcher, 0)) {
          if (! (32 <= $switcher)) {
            $width__1 = $store_char($width__0, $ib, $c);
            $aU_ = 0 === $width__1 ? 1 : (0);
            $aV_ = $aU_ ? $aU_ : ($end_of_input($ib));
            if ($aV_) {$bad_hex_float(0);}
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
          $aY_ = 0 === $width__3 ? 1 : (0);
          $aZ_ = $aY_ ? $aY_ : ($end_of_input($ib));
          if ($aZ_) {$bad_hex_float(0);}
          $width__4 =
            $check_case_insensitive_string(
              $width__3,
              $ib,
              $bad_hex_float,
              $cst_x
            );
          if (0 !== $width__4) {
            if (! $end_of_input($ib)) {
              $match = $peek_char($ib);
              $a0_ = (int) ($match + -46);
              $switch__1 =
                34 < $unsigned_right_shift_32($a0_, 0)
                  ? 66 === $a0_ ? 1 : (0)
                  : (32 < $unsigned_right_shift_32((int) ($a0_ + -1), 0)
                   ? 1
                   : (0));
              $width__5 =
                $switch__1
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
                            $precision__0 =
                              $call2($Pervasives[4], $width__6, $precision);
                            $width__10 =
                              (int)
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
                      $a1_ = 0 === $width__9 ? 1 : (0);
                      $a2_ = $a1_ ? $a1_ : ($end_of_input($ib));
                      if ($a2_) {$bad_hex_float(0);}
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
        $aW_ = 0 === $width__2 ? 1 : (0);
        $aX_ = $aW_ ? $aW_ : ($end_of_input($ib));
        if ($aX_) {$bad_hex_float(0);}
        return $check_case_insensitive_string(
          $width__2,
          $ib,
          $bad_hex_float,
          $cst_nfinity
        );
      }
      return $bad_hex_float(0);
    };
    $scan_caml_float_rest = (dynamic $width, dynamic $precision, dynamic $ib) ==> {
      $width__1 = null;
      $precision__0 = null;
      $width_precision = null;
      $frac_width = null;
      $width__2 = null;
      $switcher__0 = null;
      $aM_ = 0 === $width ? 1 : (0);
      $aN_ = $aM_ ? $aM_ : ($end_of_input($ib));
      if ($aN_) {$bad_float(0);}
      $width__0 = $scan_decimal_digit_star($width, $ib);
      $aO_ = 0 === $width__0 ? 1 : (0);
      $aP_ = $aO_ ? $aO_ : ($end_of_input($ib));
      if ($aP_) {$bad_float(0);}
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
    $scan_caml_float = (dynamic $width, dynamic $precision, dynamic $ib) ==> {
      $width__1 = null;
      $aC_ = null;
      $aD_ = null;
      $width__2 = null;
      $aE_ = null;
      $aF_ = null;
      $c__0 = null;
      $width__3 = null;
      $aG_ = null;
      $aH_ = null;
      $width__4 = null;
      $aI_ = null;
      $aJ_ = null;
      $c__1 = null;
      $switcher = null;
      $width__5 = null;
      $width__6 = null;
      $width__7 = null;
      $width__8 = null;
      $c__2 = null;
      $width__9 = null;
      $aK_ = null;
      $aL_ = null;
      $match = null;
      $width__10 = null;
      $precision__0 = null;
      $switcher__0 = null;
      $switch__0 = null;
      $switch__1 = null;
      $switch__2 = null;
      $ay_ = 0 === $width ? 1 : (0);
      $az_ = $ay_ ? $ay_ : ($end_of_input($ib));
      if ($az_) {$bad_float(0);}
      $width__0 = $scan_sign($width, $ib);
      $aA_ = 0 === $width__0 ? 1 : (0);
      $aB_ = $aA_ ? $aA_ : ($end_of_input($ib));
      if ($aB_) {$bad_float(0);}
      $c = $peek_char($ib);
      if (49 <= $c) {
        if (! (58 <= $c)) {
          $width__1 = $store_char($width__0, $ib, $c);
          $aC_ = 0 === $width__1 ? 1 : (0);
          $aD_ = $aC_ ? $aC_ : ($end_of_input($ib));
          if ($aD_) {$bad_float(0);}
          return $scan_caml_float_rest($width__1, $precision, $ib);
        }
      }
      else {
        if (48 <= $c) {
          $width__2 = $store_char($width__0, $ib, $c);
          $aE_ = 0 === $width__2 ? 1 : (0);
          $aF_ = $aE_ ? $aE_ : ($end_of_input($ib));
          if ($aF_) {$bad_float(0);}
          $c__0 = $peek_char($ib);
          if (88 !== $c__0) {
            if (120 !== $c__0) {
              return $scan_caml_float_rest($width__2, $precision, $ib);
            }
          }
          $width__3 = $store_char($width__2, $ib, $c__0);
          $aG_ = 0 === $width__3 ? 1 : (0);
          $aH_ = $aG_ ? $aG_ : ($end_of_input($ib));
          if ($aH_) {$bad_float(0);}
          $width__4 = $scan_hexadecimal_int($width__3, $ib);
          $aI_ = 0 === $width__4 ? 1 : (0);
          $aJ_ = $aI_ ? $aI_ : ($end_of_input($ib));
          if ($aJ_) {$bad_float(0);}
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
                      $precision__0 =
                        $call2($Pervasives[4], $width__5, $precision);
                      $width__10 =
                        (int)
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
              $aK_ = 0 === $width__9 ? 1 : (0);
              $aL_ = $aK_ ? $aK_ : ($end_of_input($ib));
              if ($aL_) {$bad_hex_float(0);}
              return $scan_optionally_signed_decimal_int($width__9, $ib);
            }
          }
          return $width__8;
        }
      }
      return $bad_float(0);
    };
    $scan_string = (dynamic $stp, dynamic $width, dynamic $ib) ==> {
      $c = null;
      $c__0 = null;
      $width__1 = null;
      $ax_ = null;
      $width__2 = null;
      $switch__0 = null;
      $width__0 = $width;
      for (;;) {
        if (0 === $width__0) {return $width__0;}
        $c = $peek_char($ib);
        if ($ib[1]) {return $width__0;}
        if ($stp) {
          $c__0 = $stp[1];
          if ($c === $c__0) {return $skip_char($width__0, $ib);}
          $width__1 = $store_char($width__0, $ib, $c);
          $width__0 = $width__1;
          continue;
        }
        $ax_ = (int) ($c + -9);
        $switch__0 =
          4 < $unsigned_right_shift_32($ax_, 0)
            ? 23 === $ax_ ? 1 : (0)
            : (1 < $unsigned_right_shift_32((int) ($ax_ + -2), 0) ? 1 : (0));
        if ($switch__0) {return $width__0;}
        $width__2 = $store_char($width__0, $ib, $c);
        $width__0 = $width__2;
        continue;
      }
    };
    $scan_char = (dynamic $width, dynamic $ib) ==> {
      return $store_char($width, $ib, $checked_peek_char($ib));
    };
    $hexadecimal_value_of_char = (dynamic $d) ==> {
      return 97 <= $d
        ? (int) ($d + -87)
        : (65 <= $d ? (int) ($d + -55) : ((int) ($d - 48)));
    };
    $check_next_char = (dynamic $message, dynamic $width, dynamic $ib) ==> {
      if (0 === $width) {return $bad_token_length($message);}
      $c = $peek_char($ib);
      return $ib[1] ? $bad_input($call2($Printf[4], $f_, $message)) : ($c);
    };
    $check_next_char_for_char = (dynamic $av_, dynamic $aw_) ==> {
      return $check_next_char($cst_a_Char, $av_, $aw_);
    };
    $check_next_char_for_string = (dynamic $at_, dynamic $au_) ==> {
      return $check_next_char($cst_a_String, $at_, $au_);
    };
    $scan_backslash_char = (dynamic $width, dynamic $ib) ==> {
      $switcher = null;
      $c = null;
      $ao_ = null;
      $c__0 = null;
      $switcher__0 = null;
      $ap_ = null;
      $get_digit = null;
      $c1 = null;
      $c2 = null;
      $aq_ = null;
      $get_digit__0 = null;
      $c1__0 = null;
      $c2__0 = null;
      $ar_ = null;
      $switch__0 = null;
      $switch__1 = null;
      $switch__2 = null;
      $switch__3 = null;
      $c0 = $check_next_char_for_char($width, $ib);
      if (40 <= $c0) {
        if (58 <= $c0) {
          $switcher__0 = (int) ($c0 + -92);
          if (28 < $unsigned_right_shift_32($switcher__0, 0)) {$switch__0 = 0;}
          else {
            switch($switcher__0) {
              // FALLTHROUGH
              case 28:
                $get_digit =
                  (dynamic $param) ==> {
                    $c = $next_char($ib);
                    $as_ = (int) ($c + -48);
                    $switch__0 = 22 < $unsigned_right_shift_32($as_, 0)
                      ? 5 < $unsigned_right_shift_32((int) ($as_ + -49), 0)
                       ? 0
                       : (1)
                      : (6 < $unsigned_right_shift_32((int) ($as_ + -10), 0)
                       ? 1
                       : (0));
                    return $switch__0 ? $c : ($bad_input_escape($c));
                  };
                $c1 = $get_digit(0);
                $c2 = $get_digit(0);
                $ao_ = $hexadecimal_value_of_char($c2);
                $c__0 =
                  (int)
                  ((int) (16 * $hexadecimal_value_of_char($c1)) + $ao_);
                if (0 <= $c__0) {
                  if (255 < $c__0) {$switch__1 = 0;}
                  else {$aq_ = $call1($Pervasives[17], $c__0);$switch__1 = 1;}
                }
                else {$switch__1 = 0;}
                if (! $switch__1) {
                  $aq_ = $bad_input($call3($Printf[4], $m_, $c1, $c2));
                }
                return $store_char((int) ($width + -2), $ib, $aq_);
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
          if (48 <= $c0) {
            $get_digit__0 =
              (dynamic $param) ==> {
                $c = $next_char($ib);
                $switcher = (int) ($c + -48);
                return 9 < $unsigned_right_shift_32($switcher, 0)
                  ? $bad_input_escape($c)
                  : ($c);
              };
            $c1__0 = $get_digit__0(0);
            $c2__0 = $get_digit__0(0);
            $c =
              (int)
              ((int)
               ((int)
                (100 * (int) ($c0 - 48)) +
                  (int)
                  (10 * (int) ($c1__0 - 48))) + (int) ($c2__0 - 48));
            if (0 <= $c) {
              if (255 < $c) {
                $switch__2 = 0;
              }
              else {$ar_ = $call1($Pervasives[17], $c);$switch__2 = 1;}
            }
            else {$switch__2 = 0;}
            if (! $switch__2) {
              $ar_ = $bad_input($call4($Printf[4], $l_, $c0, $c1__0, $c2__0));
            }
            return $store_char((int) ($width + -2), $ib, $ar_);
          }
          $switch__0 = 0;
        }
      }
      else {$switch__0 = 34 === $c0 ? 1 : (39 <= $c0 ? 1 : (0));}
      if ($switch__0) {
        if (110 <= $c0) {
          if (117 <= $c0) {$switch__3 = 0;
          }
          else {
            $switcher = (int) ($c0 + -110);
            switch($switcher) {
              // FALLTHROUGH
              case 0:
                $ap_ = 10;
                $switch__3 = 1;
                break;
              // FALLTHROUGH
              case 4:
                $ap_ = 13;
                $switch__3 = 1;
                break;
              // FALLTHROUGH
              case 6:
                $ap_ = 9;
                $switch__3 = 1;
                break;
              // FALLTHROUGH
              default:
                $switch__3 = 0;
              }
          }
        }
        else {if (98 === $c0) {$ap_ = 8;$switch__3 = 1;}else {$switch__3 = 0;}
        }
        if (! $switch__3) {$ap_ = $c0;}
        return $store_char($width, $ib, $ap_);
      }
      return $bad_input_escape($c0);
    };
    $scan_caml_char = (dynamic $width, dynamic $ib) ==> {
      $width__0 = null;
      $c__0 = null;
      $find_stop = (dynamic $width) ==> {
        $c = $check_next_char_for_char($width, $ib);
        return 39 === $c
          ? $ignore_char($width, $ib)
          : ($character_mismatch(39, $c));
      };
      $c = $checked_peek_char($ib);
      if (39 === $c) {
        $width__0 = $ignore_char($width, $ib);
        $c__0 = $check_next_char_for_char($width__0, $ib);
        return 92 === $c__0
          ? $find_stop($scan_backslash_char($ignore_char($width__0, $ib), $ib)
         )
          : ($find_stop($store_char($width__0, $ib, $c__0)));
      }
      return $character_mismatch(39, $c);
    };
    $scan_caml_string = (dynamic $width, dynamic $ib) ==> {
      $skip_spaces = new Ref();
      $find_stop__0 = (dynamic $counter, dynamic $width) ==> {
        $c = null;
        $width__1 = null;
        $width__2 = null;
        $match = null;
        $am_ = null;
        $width__3 = null;
        $width__4 = null;
        $match__0 = null;
        $an_ = null;
        $width__5 = null;
        $counter__0 = null;
        $counter__1 = null;
        $width__0 = $width;
        for (;;) {
          $c = $check_next_char_for_string($width__0, $ib);
          if (34 === $c) {return $ignore_char($width__0, $ib);}
          if (92 === $c) {
            $width__1 = $ignore_char($width__0, $ib);
            $match = $check_next_char_for_string($width__1, $ib);
            if (10 === $match) {
              $am_ = $ignore_char($width__1, $ib);
              if ($counter < 50) {
                $counter__0 = (int) ($counter + 1);
                return $skip_spaces->contents($counter__0, $am_);
              }
              return $caml_trampoline_return(
                $skip_spaces->contents,
                varray[0,$am_]
              );
            }
            if (13 === $match) {
              $width__3 = $ignore_char($width__1, $ib);
              $match__0 = $check_next_char_for_string($width__3, $ib);
              if (10 === $match__0) {
                $an_ = $ignore_char($width__3, $ib);
                if ($counter < 50) {
                  $counter__1 = (int) ($counter + 1);
                  return $skip_spaces->contents($counter__1, $an_);
                }
                return $caml_trampoline_return(
                  $skip_spaces->contents,
                  varray[0,$an_]
                );
              }
              $width__5 = $store_char($width__3, $ib, 13);
              $width__0 = $width__5;
              continue;
            }
            $width__4 = $scan_backslash_char($width__1, $ib);
            $width__0 = $width__4;
            continue;
          }
          $width__2 = $store_char($width__0, $ib, $c);
          $width__0 = $width__2;
          continue;
        }
      };
      $skip_spaces->contents = (dynamic $counter, dynamic $width) ==> {
        $match = null;
        $width__1 = null;
        $counter__0 = null;
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
      $find_stop = (dynamic $width) ==> {
        return $caml_trampoline($find_stop__0(0, $width));
      };
      $c = $checked_peek_char($ib);
      return 34 === $c
        ? $find_stop($ignore_char($width, $ib))
        : ($character_mismatch(34, $c));
    };
    $scan_chars_in_char_set = 
    (dynamic $char_set, dynamic $scan_indic, dynamic $width, dynamic $ib) ==> {
      $c = null;
      $ah_ = null;
      $ci = null;
      $scan_chars = (dynamic $i, dynamic $stp) ==> {
        $c = null;
        $ai_ = null;
        $aj_ = null;
        $ak_ = null;
        $al_ = null;
        $i__1 = null;
        $i__0 = $i;
        for (;;) {
          $c = $peek_char($ib);
          $ai_ = 0 < $i__0 ? 1 : (0);
          if ($ai_) {
            $aj_ = 1 - $ib[1];
            if ($aj_) {
              $ak_ = $call2($CamlinternalFormat[1], $char_set, $c);
              $al_ = $ak_ ? $c !== $stp ? 1 : (0) : ($ak_);
            }
            else {$al_ = $aj_;}
          }
          else {$al_ = $ai_;}
          if ($al_) {
            $store_char($Pervasives[7], $ib, $c);
            $i__1 = (int) ($i__0 + -1);
            $i__0 = $i__1;
            continue;
          }
          return $al_;
        }
      };
      if ($scan_indic) {
        $c = $scan_indic[1];
        $scan_chars($width, $c);
        $ah_ = 1 - $ib[1];
        if ($ah_) {
          $ci = $peek_char($ib);
          return $c === $ci
            ? $invalidate_current_char($ib)
            : ($character_mismatch($c, $ci));
        }
        return $ah_;
      }
      return $scan_chars($width, -1);
    };
    $scanf_bad_input = (dynamic $ib, dynamic $x) ==> {
      $s = null;
      if ($x[1] === $Scan_failure) {$s = $x[2];}
      else {
        if ($x[1] !== $Failure) {
          throw $caml_wrap_thrown_exception($x) as \Throwable;
        }
        $s = $x[2];
      }
      $i = $char_count($ib);
      return $bad_input($call3($Printf[4], $o_, $i, $s));
    };
    $get_counter = (dynamic $ib, dynamic $counter) ==> {
      switch($counter) {
        // FALLTHROUGH
        case 0:
          return $ib[5];
        // FALLTHROUGH
        case 1:
          return $char_count($ib);
        // FALLTHROUGH
        default:
          return $ib[6];
        }
    };
    $width_of_pad_opt = (dynamic $pad_opt) ==> {
      $width = null;
      if ($pad_opt) {$width = $pad_opt[1];return $width;}
      return $Pervasives[7];
    };
    $stopper_of_formatting_lit = (dynamic $fmting) ==> {
      if (6 === $fmting) {return $p_;}
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
    $take_format_readers__0 = (dynamic $counter, dynamic $k, dynamic $fmt) ==> {
      $fmt__1 = null;
      $fmt__2 = null;
      $fmt__3 = null;
      $fmt__4 = null;
      $fmt__5 = null;
      $fmt__6 = null;
      $fmt__7 = null;
      $fmt__8 = null;
      $fmt__9 = null;
      $fmt__10 = null;
      $fmt__11 = null;
      $fmt__12 = null;
      $fmt__13 = null;
      $fmt__14 = null;
      $rest = null;
      $fmtty = null;
      $ae_ = null;
      $af_ = null;
      $fmt__15 = null;
      $fmt__16 = null;
      $fmt__17 = null;
      $ag_ = null;
      $rest__0 = null;
      $match = null;
      $fmt__18 = null;
      $fmt__19 = null;
      $rest__1 = null;
      $match__0 = null;
      $fmt__20 = null;
      $fmt__21 = null;
      $fmt_rest = null;
      $fmt__22 = null;
      $fmt__23 = null;
      $fmt__24 = null;
      $rest__2 = null;
      $ign = null;
      $fmt__25 = null;
      $fmtty__0 = null;
      $counter__0 = null;
      $counter__1 = null;
      $fmt__0 = $fmt;
      for (;;) {
        if ($is_int($fmt__0)) {return $call1($k, 0);
        }
        else {
          $continue_label = null;
          switch($fmt__0[0]) {
            // FALLTHROUGH
            case 0:
              $fmt__1 = $fmt__0[1];
              $fmt__0 = $fmt__1;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 1:
              $fmt__2 = $fmt__0[1];
              $fmt__0 = $fmt__2;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 2:
              $fmt__3 = $fmt__0[2];
              $fmt__0 = $fmt__3;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 3:
              $fmt__4 = $fmt__0[2];
              $fmt__0 = $fmt__4;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 4:
              $fmt__5 = $fmt__0[4];
              $fmt__0 = $fmt__5;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 5:
              $fmt__6 = $fmt__0[4];
              $fmt__0 = $fmt__6;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 6:
              $fmt__7 = $fmt__0[4];
              $fmt__0 = $fmt__7;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 7:
              $fmt__8 = $fmt__0[4];
              $fmt__0 = $fmt__8;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 8:
              $fmt__9 = $fmt__0[4];
              $fmt__0 = $fmt__9;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 9:
              $fmt__10 = $fmt__0[2];
              $fmt__0 = $fmt__10;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 10:
              $fmt__11 = $fmt__0[1];
              $fmt__0 = $fmt__11;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 11:
              $fmt__12 = $fmt__0[2];
              $fmt__0 = $fmt__12;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 12:
              $fmt__13 = $fmt__0[2];
              $fmt__0 = $fmt__13;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 13:
              $fmt__14 = $fmt__0[3];
              $fmt__0 = $fmt__14;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 14:
              $rest = $fmt__0[3];
              $fmtty = $fmt__0[2];
              $ae_ = $call1($CamlinternalFormat[22], $fmtty);
              $af_ = $call1($CamlinternalFormatBasics[2], $ae_);
              if ($counter < 50) {
                $counter__0 = (int) ($counter + 1);
                return $take_fmtty_format_readers__0->contents(
                  $counter__0,
                  $k,
                  $af_,
                  $rest
                );
              }
              return $caml_trampoline_return(
                $take_fmtty_format_readers__0->contents,
                varray[0,$k,$af_,$rest]
              );
            // FALLTHROUGH
            case 15:
              $fmt__15 = $fmt__0[1];
              $fmt__0 = $fmt__15;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 16:
              $fmt__16 = $fmt__0[1];
              $fmt__0 = $fmt__16;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 17:
              $fmt__17 = $fmt__0[2];
              $fmt__0 = $fmt__17;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 18:
              $ag_ = $fmt__0[1];
              if (0 === $ag_[0]) {
                $rest__0 = $fmt__0[2];
                $match = $ag_[1];
                $fmt__18 = $match[1];
                $fmt__19 =
                  $call2($CamlinternalFormatBasics[3], $fmt__18, $rest__0);
                $fmt__0 = $fmt__19;
                $continue_label = "#";break;
              }
              $rest__1 = $fmt__0[2];
              $match__0 = $ag_[1];
              $fmt__20 = $match__0[1];
              $fmt__21 =
                $call2($CamlinternalFormatBasics[3], $fmt__20, $rest__1);
              $fmt__0 = $fmt__21;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 19:
              $fmt_rest = $fmt__0[1];
              return (dynamic $reader) ==> {
                $new_k = (dynamic $readers_rest) ==> {
                  return $call1($k, Vector{0, $reader, $readers_rest});
                };
                return $take_format_readers->contents($new_k, $fmt_rest);
              };
            // FALLTHROUGH
            case 20:
              $fmt__22 = $fmt__0[3];
              $fmt__0 = $fmt__22;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 21:
              $fmt__23 = $fmt__0[2];
              $fmt__0 = $fmt__23;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 22:
              $fmt__24 = $fmt__0[1];
              $fmt__0 = $fmt__24;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 23:
              $rest__2 = $fmt__0[2];
              $ign = $fmt__0[1];
              if ($is_int($ign)) {
                switch($ign) {
                  // FALLTHROUGH
                  case 0:
                    $fmt__0 = $rest__2;
                    $continue_label = "#";break;
                  // FALLTHROUGH
                  case 1:
                    $fmt__0 = $rest__2;
                    $continue_label = "#";break;
                  // FALLTHROUGH
                  case 2:
                    return (dynamic $reader) ==> {
                      $new_k = (dynamic $readers_rest) ==> {
                        return $call1($k, Vector{0, $reader, $readers_rest});
                      };
                      return $take_format_readers->contents($new_k, $rest__2);
                    };
                  // FALLTHROUGH
                  default:
                    $fmt__0 = $rest__2;
                    $continue_label = "#";break;
                  }
                if ($continue_label !== null) {break;}
              }
              else {
                switch($ign[0]) {
                  // FALLTHROUGH
                  case 0:
                    $fmt__0 = $rest__2;
                    $continue_label = "#";break;
                  // FALLTHROUGH
                  case 1:
                    $fmt__0 = $rest__2;
                    $continue_label = "#";break;
                  // FALLTHROUGH
                  case 2:
                    $fmt__0 = $rest__2;
                    $continue_label = "#";break;
                  // FALLTHROUGH
                  case 3:
                    $fmt__0 = $rest__2;
                    $continue_label = "#";break;
                  // FALLTHROUGH
                  case 4:
                    $fmt__0 = $rest__2;
                    $continue_label = "#";break;
                  // FALLTHROUGH
                  case 5:
                    $fmt__0 = $rest__2;
                    $continue_label = "#";break;
                  // FALLTHROUGH
                  case 6:
                    $fmt__0 = $rest__2;
                    $continue_label = "#";break;
                  // FALLTHROUGH
                  case 7:
                    $fmt__0 = $rest__2;
                    $continue_label = "#";break;
                  // FALLTHROUGH
                  case 8:
                    $fmt__0 = $rest__2;
                    $continue_label = "#";break;
                  // FALLTHROUGH
                  case 9:
                    $fmtty__0 = $ign[2];
                    if ($counter < 50) {
                      $counter__1 = (int) ($counter + 1);
                      return $take_fmtty_format_readers__0->contents(
                        $counter__1,
                        $k,
                        $fmtty__0,
                        $rest__2
                      );
                    }
                    return $caml_trampoline_return(
                      $take_fmtty_format_readers__0->contents,
                      varray[0,$k,$fmtty__0,$rest__2]
                    );
                  // FALLTHROUGH
                  case 10:
                    $fmt__0 = $rest__2;
                    $continue_label = "#";break;
                  // FALLTHROUGH
                  default:
                    $fmt__0 = $rest__2;
                    $continue_label = "#";break;
                  }
                if ($continue_label !== null) {break;}
              }
            // FALLTHROUGH
            default:
              $fmt__25 = $fmt__0[3];
              $fmt__0 = $fmt__25;
              $continue_label = "#";break;
            }
          if ($continue_label === "#") {continue;}
        }
      }
    };
    $take_fmtty_format_readers__0->contents = 
    (dynamic $counter, dynamic $k, dynamic $fmtty, dynamic $fmt) ==> {
      $fmtty__1 = null;
      $fmtty__2 = null;
      $fmtty__3 = null;
      $fmtty__4 = null;
      $fmtty__5 = null;
      $fmtty__6 = null;
      $fmtty__7 = null;
      $fmtty__8 = null;
      $fmtty__9 = null;
      $rest = null;
      $ty2 = null;
      $ty1 = null;
      $ad_ = null;
      $ty = null;
      $fmtty__10 = null;
      $fmtty__11 = null;
      $fmtty__12 = null;
      $fmtty__13 = null;
      $fmt_rest = null;
      $fmt_rest__0 = null;
      $counter__0 = null;
      $fmtty__0 = $fmtty;
      for (;;) {
        if ($is_int($fmtty__0)) {
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
          $continue_label = null;
          switch($fmtty__0[0]) {
            // FALLTHROUGH
            case 0:
              $fmtty__1 = $fmtty__0[1];
              $fmtty__0 = $fmtty__1;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 1:
              $fmtty__2 = $fmtty__0[1];
              $fmtty__0 = $fmtty__2;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 2:
              $fmtty__3 = $fmtty__0[1];
              $fmtty__0 = $fmtty__3;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 3:
              $fmtty__4 = $fmtty__0[1];
              $fmtty__0 = $fmtty__4;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 4:
              $fmtty__5 = $fmtty__0[1];
              $fmtty__0 = $fmtty__5;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 5:
              $fmtty__6 = $fmtty__0[1];
              $fmtty__0 = $fmtty__6;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 6:
              $fmtty__7 = $fmtty__0[1];
              $fmtty__0 = $fmtty__7;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 7:
              $fmtty__8 = $fmtty__0[1];
              $fmtty__0 = $fmtty__8;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 8:
              $fmtty__9 = $fmtty__0[2];
              $fmtty__0 = $fmtty__9;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 9:
              $rest = $fmtty__0[3];
              $ty2 = $fmtty__0[2];
              $ty1 = $fmtty__0[1];
              $ad_ = $call1($CamlinternalFormat[22], $ty1);
              $ty = $call2($CamlinternalFormat[23], $ad_, $ty2);
              $fmtty__10 = $call2($CamlinternalFormatBasics[1], $ty, $rest);
              $fmtty__0 = $fmtty__10;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 10:
              $fmtty__11 = $fmtty__0[1];
              $fmtty__0 = $fmtty__11;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 11:
              $fmtty__12 = $fmtty__0[1];
              $fmtty__0 = $fmtty__12;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 12:
              $fmtty__13 = $fmtty__0[1];
              $fmtty__0 = $fmtty__13;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 13:
              $fmt_rest = $fmtty__0[1];
              return (dynamic $reader) ==> {
                $new_k = (dynamic $readers_rest) ==> {
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
              return (dynamic $reader) ==> {
                $new_k = (dynamic $readers_rest) ==> {
                  return $call1($k, Vector{0, $reader, $readers_rest});
                };
                return $take_fmtty_format_readers->contents(
                  $new_k,
                  $fmt_rest__0,
                  $fmt
                );
              };
            }
          if ($continue_label === "#") {continue;}
        }
      }
    };
    $take_format_readers->contents = (dynamic $k, dynamic $fmt) ==> {
      return $caml_trampoline($take_format_readers__0(0, $k, $fmt));
    };
    $take_fmtty_format_readers->contents = 
    (dynamic $k, dynamic $fmtty, dynamic $fmt) ==> {
      return $caml_trampoline(
        $take_fmtty_format_readers__0->contents(0, $k, $fmtty, $fmt)
      );
    };
    $pad_prec_scanf = 
    (dynamic $ib, dynamic $fmt, dynamic $readers, dynamic $pad, dynamic $prec, dynamic $scan, dynamic $token) ==> {
      $x__2 = null;
      $p__0 = null;
      $x__1 = null;
      $ac_ = null;
      $x__0 = null;
      $p = null;
      $x = null;
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
          $ac_ = $pad[2];
          if ($is_int($prec)) {
            if (0 === $prec) {
              $call3($scan, $ac_, $Pervasives[7], $ib);
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
          $call3($scan, $ac_, $p__0, $ib);
          $x__2 = $call1($token, $ib);
          return Vector{0, $x__2, $make_scanf->contents($ib, $fmt, $readers)};
        }
        return $call1($Pervasives[1], $cst_scanf_bad_conversion__2);
      }
    };
    $make_scanf->contents = (dynamic $ib, dynamic $fmt, dynamic $readers) ==> {
      $rest = null;
      $c = null;
      $rest__0 = null;
      $c__0 = null;
      $I_ = null;
      $J_ = null;
      $scan = null;
      $rest__1 = null;
      $fmting_lit = null;
      $match = null;
      $str = null;
      $stp = null;
      $scan__0 = null;
      $str_rest = null;
      $K_ = null;
      $rest__2 = null;
      $match__0 = null;
      $fmt__1 = null;
      $scan__1 = null;
      $rest__3 = null;
      $match__1 = null;
      $fmt__2 = null;
      $scan__2 = null;
      $rest__4 = null;
      $pad = null;
      $scan__3 = null;
      $rest__5 = null;
      $prec = null;
      $pad__0 = null;
      $iconv = null;
      $conv = null;
      $scan__4 = null;
      $rest__6 = null;
      $prec__0 = null;
      $pad__1 = null;
      $iconv__0 = null;
      $conv__0 = null;
      $scan__5 = null;
      $rest__7 = null;
      $prec__1 = null;
      $pad__2 = null;
      $iconv__1 = null;
      $conv__1 = null;
      $scan__6 = null;
      $rest__8 = null;
      $prec__2 = null;
      $pad__3 = null;
      $iconv__2 = null;
      $conv__2 = null;
      $scan__7 = null;
      $L_ = null;
      $rest__9 = null;
      $prec__3 = null;
      $pad__4 = null;
      $rest__10 = null;
      $prec__4 = null;
      $pad__5 = null;
      $rest__11 = null;
      $prec__5 = null;
      $pad__6 = null;
      $rest__12 = null;
      $pad__7 = null;
      $scan__8 = null;
      $rest__13 = null;
      $fmt__3 = null;
      $str__0 = null;
      $M_ = null;
      $fmt__4 = null;
      $chr = null;
      $rest__14 = null;
      $fmtty = null;
      $pad_opt = null;
      $s = null;
      $msg = null;
      $fmt__5 = null;
      $N_ = null;
      $rest__15 = null;
      $fmtty__0 = null;
      $pad_opt__0 = null;
      $s__0 = null;
      $msg__0 = null;
      $O_ = null;
      $fmt__6 = null;
      $fmt__7 = null;
      $match__2 = null;
      $fmt__8 = null;
      $match__3 = null;
      $fmt__9 = null;
      $P_ = null;
      $Q_ = null;
      $fmt__10 = null;
      $R_ = null;
      $S_ = null;
      $fmt__11 = null;
      $formatting_lit = null;
      $T_ = null;
      $U_ = null;
      $V_ = null;
      $rest__16 = null;
      $match__4 = null;
      $fmt__12 = null;
      $fmt__13 = null;
      $rest__17 = null;
      $match__5 = null;
      $fmt__14 = null;
      $fmt__15 = null;
      $fmt_rest = null;
      $readers_rest = null;
      $reader = null;
      $x = null;
      $W_ = null;
      $X_ = null;
      $Y_ = null;
      $width = null;
      $s__1 = null;
      $rest__18 = null;
      $fmting_lit__0 = null;
      $match__6 = null;
      $str__1 = null;
      $stp__0 = null;
      $width__0 = null;
      $s__2 = null;
      $str_rest__0 = null;
      $rest__19 = null;
      $counter = null;
      $count = null;
      $rest__20 = null;
      $c__1 = null;
      $rest__21 = null;
      $ign = null;
      $match__7 = null;
      $fmt__16 = null;
      $match__8 = null;
      $arg_rest = null;
      $fmt__0 = $fmt;
      for (;;) {
        if ($is_int($fmt__0)) {return 0;}
        else {
          $continue_label = null;
          switch($fmt__0[0]) {
            // FALLTHROUGH
            case 0:
              $rest = $fmt__0[1];
              $scan_char(0, $ib);
              $c = $token_char($ib);
              return Vector{0, $c, $make_scanf->contents($ib, $rest, $readers)
              };
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
              $I_ = $fmt__0[2];
              $J_ = $fmt__0[1];
              if (! $is_int($I_)) {
                switch($I_[0]) {
                  // FALLTHROUGH
                  case 17:
                    $rest__1 = $I_[2];
                    $fmting_lit = $I_[1];
                    $match = $stopper_of_formatting_lit($fmting_lit);
                    $str = $match[2];
                    $stp = $match[1];
                    $scan__0 =
                      (dynamic $width, dynamic $param, dynamic $ib) ==> {
                        return $scan_string(Vector{0, $stp}, $width, $ib);
                      };
                    $str_rest = Vector{11, $str, $rest__1};
                    return $pad_prec_scanf(
                      $ib,
                      $str_rest,
                      $readers,
                      $J_,
                      0,
                      $scan__0,
                      $token_string
                    );
                  // FALLTHROUGH
                  case 18:
                    $K_ = $I_[1];
                    if (0 === $K_[0]) {
                      $rest__2 = $I_[2];
                      $match__0 = $K_[1];
                      $fmt__1 = $match__0[1];
                      $scan__1 =
                        (dynamic $width, dynamic $param, dynamic $ib) ==> {return $scan_string($q_, $width, $ib);
                        };
                      return $pad_prec_scanf(
                        $ib,
                        $call2($CamlinternalFormatBasics[3], $fmt__1, $rest__2),
                        $readers,
                        $J_,
                        0,
                        $scan__1,
                        $token_string
                      );
                    }
                    $rest__3 = $I_[2];
                    $match__1 = $K_[1];
                    $fmt__2 = $match__1[1];
                    $scan__2 =
                      (dynamic $width, dynamic $param, dynamic $ib) ==> {return $scan_string($r_, $width, $ib);
                      };
                    return $pad_prec_scanf(
                      $ib,
                      $call2($CamlinternalFormatBasics[3], $fmt__2, $rest__3),
                      $readers,
                      $J_,
                      0,
                      $scan__2,
                      $token_string
                    );
                  }
              }
              $scan =
                (dynamic $width, dynamic $param, dynamic $ib) ==> {return $scan_string(0, $width, $ib);
                };
              return $pad_prec_scanf(
                $ib,
                $I_,
                $readers,
                $J_,
                0,
                $scan,
                $token_string
              );
            // FALLTHROUGH
            case 3:
              $rest__4 = $fmt__0[2];
              $pad = $fmt__0[1];
              $scan__3 =
                (dynamic $width, dynamic $param, dynamic $ib) ==> {return $scan_caml_string($width, $ib);
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
              $conv =
                $integer_conversion_of_char(
                  $call1($CamlinternalFormat[16], $iconv)
                );
              $scan__4 =
                (dynamic $width, dynamic $param, dynamic $ib) ==> {
                  return $scan_int_conversion($conv, $width, $ib);
                };
              return $pad_prec_scanf(
                $ib,
                $rest__5,
                $readers,
                $pad__0,
                $prec,
                $scan__4,
                (dynamic $ib) ==> {
                  return $caml_int_of_string($token_int_literal($conv, $ib));
                }
              );
            // FALLTHROUGH
            case 5:
              $rest__6 = $fmt__0[4];
              $prec__0 = $fmt__0[3];
              $pad__1 = $fmt__0[2];
              $iconv__0 = $fmt__0[1];
              $conv__0 =
                $integer_conversion_of_char(
                  $call1($CamlinternalFormat[16], $iconv__0)
                );
              $scan__5 =
                (dynamic $width, dynamic $param, dynamic $ib) ==> {
                  return $scan_int_conversion($conv__0, $width, $ib);
                };
              return $pad_prec_scanf(
                $ib,
                $rest__6,
                $readers,
                $pad__1,
                $prec__0,
                $scan__5,
                (dynamic $ib) ==> {
                  return $caml_int_of_string($token_int_literal($conv__0, $ib)
                  );
                }
              );
            // FALLTHROUGH
            case 6:
              $rest__7 = $fmt__0[4];
              $prec__1 = $fmt__0[3];
              $pad__2 = $fmt__0[2];
              $iconv__1 = $fmt__0[1];
              $conv__1 =
                $integer_conversion_of_char(
                  $call1($CamlinternalFormat[16], $iconv__1)
                );
              $scan__6 =
                (dynamic $width, dynamic $param, dynamic $ib) ==> {
                  return $scan_int_conversion($conv__1, $width, $ib);
                };
              return $pad_prec_scanf(
                $ib,
                $rest__7,
                $readers,
                $pad__2,
                $prec__1,
                $scan__6,
                (dynamic $ib) ==> {
                  return $caml_int_of_string($token_int_literal($conv__1, $ib)
                  );
                }
              );
            // FALLTHROUGH
            case 7:
              $rest__8 = $fmt__0[4];
              $prec__2 = $fmt__0[3];
              $pad__3 = $fmt__0[2];
              $iconv__2 = $fmt__0[1];
              $conv__2 =
                $integer_conversion_of_char(
                  $call1($CamlinternalFormat[16], $iconv__2)
                );
              $scan__7 =
                (dynamic $width, dynamic $param, dynamic $ib) ==> {
                  return $scan_int_conversion($conv__2, $width, $ib);
                };
              return $pad_prec_scanf(
                $ib,
                $rest__8,
                $readers,
                $pad__3,
                $prec__2,
                $scan__7,
                (dynamic $ib) ==> {
                  return $runtime["caml_int64_of_string"](
                    $token_int_literal($conv__2, $ib)
                  );
                }
              );
            // FALLTHROUGH
            case 8:
              $L_ = $fmt__0[1];
              if (15 === $L_) {
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
              if (16 <= $L_) {
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
              $scan__8 =
                (dynamic $param, dynamic $ab_, dynamic $ib) ==> {
                  $c = $checked_peek_char($ib);
                  $m = 102 === $c
                    ? 5
                    : (116 === $c
                     ? 4
                     : ($bad_input($call2($Printf[4], $n_, $c))));
                  return $scan_string(0, $m, $ib);
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
              if ($end_of_input($ib)) {
                $fmt__0 = $rest__13;
                $continue_label = "#";break;
              }
              return $bad_input($cst_end_of_input_not_found);
            // FALLTHROUGH
            case 11:
              $fmt__3 = $fmt__0[2];
              $str__0 = $fmt__0[1];
              $M_ = (dynamic $aa_) ==> {return $check_char($ib, $aa_);};
              $call2($String[8], $M_, $str__0);
              $fmt__0 = $fmt__3;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 12:
              $fmt__4 = $fmt__0[2];
              $chr = $fmt__0[1];
              $check_char($ib, $chr);
              $fmt__0 = $fmt__4;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 13:
              $rest__14 = $fmt__0[3];
              $fmtty = $fmt__0[2];
              $pad_opt = $fmt__0[1];
              $scan_caml_string($width_of_pad_opt($pad_opt), $ib);
              $s = $token_string($ib);
              try {
                $N_ = $call2($CamlinternalFormat[14], $s, $fmtty);
                $fmt__5 = $N_;
              }
              catch(\Throwable $exn) {
                $exn = $runtime["caml_wrap_exception"]($exn);
                if ($exn[1] !== $Failure) {
                  throw $caml_wrap_thrown_exception_reraise($exn) as \Throwable;
                }
                $msg = $exn[2];
                $fmt__5 = $bad_input($msg);
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
              $s__0 = $token_string($ib);
              try {
                $match__2 = $call2($CamlinternalFormat[13], 0, $s__0);
                $fmt__8 = $match__2[1];
                $match__3 = $call2($CamlinternalFormat[13], 0, $s__0);
                $fmt__9 = $match__3[1];
                $P_ = $call1($CamlinternalFormat[22], $fmtty__0);
                $Q_ = $call1($CamlinternalFormatBasics[2], $P_);
                $fmt__10 = $call2($CamlinternalFormat[12], $fmt__9, $Q_);
                $R_ = $call1($CamlinternalFormatBasics[2], $fmtty__0);
                $S_ = $call2($CamlinternalFormat[12], $fmt__8, $R_);
                $fmt__7 = $S_;
                $fmt__6 = $fmt__10;
              }
              catch(\Throwable $exn) {
                $exn = $runtime["caml_wrap_exception"]($exn);
                if ($exn[1] !== $Failure) {
                  throw $caml_wrap_thrown_exception_reraise($exn) as \Throwable;
                }
                $msg__0 = $exn[2];
                $O_ = $bad_input($msg__0);
                $fmt__7 = $O_[1];
                $fmt__6 = $O_[2];
              }
              return Vector{
                0,
                Vector{0, $fmt__7, $s__0},
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
              $T_ = $call1($CamlinternalFormat[17], $formatting_lit);
              $U_ = (dynamic $Z_) ==> {return $check_char($ib, $Z_);};
              $call2($String[8], $U_, $T_);
              $fmt__0 = $fmt__11;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 18:
              $V_ = $fmt__0[1];
              if (0 === $V_[0]) {
                $rest__16 = $fmt__0[2];
                $match__4 = $V_[1];
                $fmt__12 = $match__4[1];
                $check_char($ib, 64);
                $check_char($ib, 123);
                $fmt__13 =
                  $call2($CamlinternalFormatBasics[3], $fmt__12, $rest__16);
                $fmt__0 = $fmt__13;
                $continue_label = "#";break;
              }
              $rest__17 = $fmt__0[2];
              $match__5 = $V_[1];
              $fmt__14 = $match__5[1];
              $check_char($ib, 64);
              $check_char($ib, 91);
              $fmt__15 =
                $call2($CamlinternalFormatBasics[3], $fmt__14, $rest__17);
              $fmt__0 = $fmt__15;
              $continue_label = "#";break;
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
              $W_ = $fmt__0[3];
              $X_ = $fmt__0[2];
              $Y_ = $fmt__0[1];
              if (! $is_int($W_) && 17 === $W_[0]) {
                $rest__18 = $W_[2];
                $fmting_lit__0 = $W_[1];
                $match__6 = $stopper_of_formatting_lit($fmting_lit__0);
                $str__1 = $match__6[2];
                $stp__0 = $match__6[1];
                $width__0 = $width_of_pad_opt($Y_);
                $scan_chars_in_char_set(
                  $X_,
                  Vector{0, $stp__0},
                  $width__0,
                  $ib
                );
                $s__2 = $token_string($ib);
                $str_rest__0 = Vector{11, $str__1, $rest__18};
                return Vector{
                  0,
                  $s__2,
                  $make_scanf->contents($ib, $str_rest__0, $readers)
                };
              }
              $width = $width_of_pad_opt($Y_);
              $scan_chars_in_char_set($X_, 0, $width, $ib);
              $s__1 = $token_string($ib);
              return Vector{
                0,
                $s__1,
                $make_scanf->contents($ib, $W_, $readers)
              };
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
              $c__1 = $checked_peek_char($ib);
              return Vector{
                0,
                $c__1,
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
              throw $caml_wrap_thrown_exception(
                      Vector{0, $Assert_failure, $s_}
                    ) as \Throwable;
            // FALLTHROUGH
            default:
              return $call1(
                $Pervasives[1],
                $cst_scanf_bad_conversion_custom_converter
              );
            }
          if ($continue_label === "#") {continue;}
        }
      }
    };
    $kscanf = (dynamic $ib, dynamic $ef, dynamic $param) ==> {
      $str = $param[2];
      $fmt = $param[1];
      $apply = (dynamic $f, dynamic $args) ==> {
        $args__1 = null;
        $x = null;
        $f__1 = null;
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
      $k = (dynamic $readers, dynamic $f) ==> {
        $switch__0 = null;
        $H_ = null;
        $G_ = null;
        $F_ = null;
        $E_ = null;
        $D_ = null;
        $msg = null;
        $args = null;
        $C_ = null;
        $B_ = null;
        $reset_token($ib);
        try {
          $H_ = Vector{0, $make_scanf->contents($ib, $fmt, $readers)};
          $C_ = $H_;
        }
        catch(\Throwable $exc) {
          $exc = $runtime["caml_wrap_exception"]($exc);
          if ($exc[1] === $Scan_failure) {$switch__0 = 0;}
          else {
            if ($exc[1] === $Failure) {$switch__0 = 0;}
            else {
              if ($exc === $End_of_file) {$switch__0 = 0;}
              else {
                if ($exc[1] !== $Invalid_argument) {
                  throw $caml_wrap_thrown_exception_reraise($exc) as \Throwable;
                }
                $msg = $exc[2];
                $D_ = $call1($String[13], $str);
                $E_ = $call2($Pervasives[16], $D_, $cst__1);
                $F_ = $call2($Pervasives[16], $cst_in_format, $E_);
                $G_ = $call2($Pervasives[16], $msg, $F_);
                $B_ = $call1($Pervasives[1], $G_);
                $switch__0 = 1;
              }
            }
          }
          if (! $switch__0) {$B_ = Vector{1, $exc};}
          $C_ = $B_;
        }
        if (0 === $C_[0]) {$args = $C_[1];return $apply($f, $args);}
        $exc = $C_[1];
        return $call2($ef, $ib, $exc);
      };
      return $take_format_readers->contents($k, $fmt);
    };
    $bscanf = (dynamic $ib, dynamic $fmt) ==> {
      return $kscanf($ib, $scanf_bad_input, $fmt);
    };
    $ksscanf = (dynamic $s, dynamic $ef, dynamic $fmt) ==> {
      return $kscanf($from_string($s), $ef, $fmt);
    };
    $sscanf = (dynamic $s, dynamic $fmt) ==> {
      return $kscanf($from_string($s), $scanf_bad_input, $fmt);
    };
    $scanf = (dynamic $fmt) ==> {
      return $kscanf($stdin, $scanf_bad_input, $fmt);
    };
    $bscanf_format = (dynamic $ib, dynamic $format, dynamic $f) ==> {
      $A_ = null;
      $fmt = null;
      $msg = null;
      $scan_caml_string($Pervasives[7], $ib);
      $str = $token_string($ib);
      try {$A_ = $call2($CamlinternalFormat[15], $str, $format);$fmt = $A_;}
      catch(\Throwable $exn) {
        $exn = $runtime["caml_wrap_exception"]($exn);
        if ($exn[1] !== $Failure) {
          throw $caml_wrap_thrown_exception_reraise($exn) as \Throwable;
        }
        $msg = $exn[2];
        $fmt = $bad_input($msg);
      }
      return $call1($f, $fmt);
    };
    $sscanf_format = (dynamic $s, dynamic $format, dynamic $f) ==> {
      return $bscanf_format($from_string($s), $format, $f);
    };
    $format_from_string = (dynamic $s, dynamic $fmt) ==> {
      $i = null;
      $c = null;
      $y_ = null;
      $l = $caml_ml_string_length($s);
      $z_ = (dynamic $x) ==> {return $x;};
      $b = $call1($Buffer[1], (int) ($l + 2));
      $call2($Buffer[10], $b, 34);
      $x_ = (int) ($l + -1);
      $w_ = 0;
      if (! ($x_ < 0)) {
        $i = $w_;
        for (;;) {
          $c = $caml_string_get($s, $i);
          if (34 === $c) {$call2($Buffer[10], $b, 92);}
          $call2($Buffer[10], $b, $c);
          $y_ = (int) ($i + 1);
          if ($x_ !== $i) {$i = $y_;continue;}
          break;
        }
      }
      $call2($Buffer[10], $b, 34);
      return $sscanf_format($call1($Buffer[2], $b), $fmt, $z_);
    };
    $unescaped = (dynamic $s) ==> {
      $u_ = (dynamic $x) ==> {return $x;};
      $v_ = $call2($Pervasives[16], $s, $cst__2);
      return $call1($sscanf($call2($Pervasives[16], $cst__3, $v_), $t_), $u_);
    };
    $kfscanf = (dynamic $ic, dynamic $ef, dynamic $fmt) ==> {
      return $kscanf($memo_from_channel($ic), $ef, $fmt);
    };
    $fscanf = (dynamic $ic, dynamic $fmt) ==> {
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
    } as dynamic;
    
     return ($Scanf);

  }
  public static function bscanf(dynamic $ib, dynamic $fmt): dynamic {
    return static::callRehackFunction(static::requireModule()[3], varray[$ib, $fmt]);
  }
  public static function sscanf(dynamic $s, dynamic $fmt): dynamic {
    return static::callRehackFunction(static::requireModule()[4], varray[$s, $fmt]);
  }
  public static function scanf(dynamic $fmt): dynamic {
    return static::callRehackFunction(static::requireModule()[5], varray[$fmt]);
  }
  public static function kscanf(dynamic $ib, dynamic $ef, dynamic $param): dynamic {
    return static::callRehackFunction(static::requireModule()[6], varray[$ib, $ef, $param]);
  }
  public static function ksscanf(dynamic $s, dynamic $ef, dynamic $fmt): dynamic {
    return static::callRehackFunction(static::requireModule()[7], varray[$s, $ef, $fmt]);
  }
  public static function bscanf_format(dynamic $ib, dynamic $format, dynamic $f): dynamic {
    return static::callRehackFunction(static::requireModule()[8], varray[$ib, $format, $f]);
  }
  public static function sscanf_format(dynamic $s, dynamic $format, dynamic $f): dynamic {
    return static::callRehackFunction(static::requireModule()[9], varray[$s, $format, $f]);
  }
  public static function format_from_string(dynamic $s, dynamic $fmt): dynamic {
    return static::callRehackFunction(static::requireModule()[10], varray[$s, $fmt]);
  }
  public static function unescaped(dynamic $s): dynamic {
    return static::callRehackFunction(static::requireModule()[11], varray[$s]);
  }
  public static function fscanf(dynamic $ic, dynamic $fmt): dynamic {
    return static::callRehackFunction(static::requireModule()[12], varray[$ic, $fmt]);
  }
  public static function kfscanf(dynamic $ic, dynamic $ef, dynamic $fmt): dynamic {
    return static::callRehackFunction(static::requireModule()[13], varray[$ic, $ef, $fmt]);
  }

}
/* Hashing disabled */
