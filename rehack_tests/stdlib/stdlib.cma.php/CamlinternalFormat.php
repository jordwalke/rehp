<?hh
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * CamlinternalFormat.php
 */

namespace Rehack;

final class CamlinternalFormat {
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
    $CamlinternalFormatBasics = CamlinternalFormatBasics::get();
    $Char = Char::get();
    $Pervasives = Pervasives::get();
    $String_ = String_::get();
    $Sys = Sys::get();
    $Failure = Failure::get();
    $Not_found = Not_found::get();
    $Assert_failure = Assert_failure::get();
    CamlinternalFormat::load($global_object);
    $memoized = $runtime->caml_get_global_data()->CamlinternalFormat;
    return $memoized;
  }

  /**
   * Performs module load operation. May have side effects.
   */
  private static function load($joo_global_object) {
    

    $bprint_fmtty = new Ref();
    $bufput_acc = new Ref();
    $fmtty_of_custom = new Ref();
    $fmtty_of_fmt = new Ref();
    $fmtty_of_formatting_gen = new Ref();
    $fmtty_of_ignored_format = new Ref();
    $fmtty_of_precision_fmtty = new Ref();
    $fmtty_rel_det = new Ref();
    $fn_of_custom_arity = new Ref();
    $fn_of_custom_arity__0 = new Ref();
    $int_of_custom_arity = new Ref();
    $make_custom = new Ref();
    $make_custom__0 = new Ref();
    $make_from_fmtty = new Ref();
    $make_from_fmtty__0 = new Ref();
    $make_ignored_param__0 = new Ref();
    $make_invalid_arg = new Ref();
    $make_iprintf = new Ref();
    $make_printf = new Ref();
    $output_acc = new Ref();
    $strput_acc = new Ref();
    $symm = new Ref();
    $trans = new Ref();
    $type_format_gen = new Ref();
    $type_ignored_format_substitution = new Ref();
    $runtime = $joo_global_object->jsoo_runtime;
    $caml_blit_string = $runtime["caml_blit_string"];
    $caml_bytes_set = $runtime["caml_bytes_set"];
    $call1 = $runtime["caml_call1"];
    $call2 = $runtime["caml_call2"];
    $call3 = $runtime["caml_call3"];
    $call4 = $runtime["caml_call4"];
    $call5 = $runtime["caml_call5"];
    $caml_create_bytes = $runtime["caml_create_bytes"];
    $caml_format_int = $runtime["caml_format_int"];
    $caml_ml_string_length = $runtime["caml_ml_string_length"];
    $string = $runtime["caml_new_string"];
    $caml_notequal = $runtime["caml_notequal"];
    $caml_string_get = $runtime["caml_string_get"];
    $caml_string_notequal = $runtime["caml_string_notequal"];
    $caml_trampoline = $runtime["caml_trampoline"];
    $caml_trampoline_return = $runtime["caml_trampoline_return"];
    $caml_wrap_exception = $runtime["caml_wrap_exception"];
    $is_int = $runtime["is_int"];
    $left_shift_32 = $runtime["left_shift_32"];
    $unsigned_right_shift_32 = $runtime["unsigned_right_shift_32"];
    $global_data = $runtime["caml_get_global_data"]();
    $cst_c = $string("%c");
    $cst_s = $string("%s");
    $cst_i = $string("%i");
    $cst_li = $string("%li");
    $cst_ni = $string("%ni");
    $cst_Li = $string("%Li");
    $cst_f = $string("%f");
    $cst_B = $string("%B");
    $cst__9 = $string("%{");
    $cst__10 = $string("%}");
    $cst__11 = $string("%(");
    $cst__12 = $string("%)");
    $cst_a = $string("%a");
    $cst_t = $string("%t");
    $cst__13 = $string("%?");
    $cst_r = $string("%r");
    $cst_r__0 = $string("%_r");
    $cst_u__0 = $string("%u");
    $cst_Printf_bad_conversion = $string("Printf: bad conversion %[");
    $cst_Printf_bad_conversion__0 = $string("Printf: bad conversion %_");
    $cst__17 = $string("@{");
    $cst__18 = $string("@[");
    $cst__19 = $string("@{");
    $cst__20 = $string("@[");
    $cst__21 = $string("@{");
    $cst__22 = $string("@[");
    $cst_0 = $string("0");
    $cst_padding = $string("padding");
    $cst_precision = $string("precision");
    $cst__27 = $string("'*'");
    $cst__25 = $string("'-'");
    $cst_0__2 = $string("'0'");
    $cst__26 = $string("'*'");
    $cst_0__0 = $string("0");
    $cst_0__1 = $string("0");
    $cst_precision__0 = $string("precision");
    $cst_precision__1 = $string("precision");
    $cst__28 = $string("'+'");
    $cst__29 = $string("'#'");
    $cst__30 = $string("' '");
    $cst_padding__0 = $string("`padding'");
    $cst_precision__2 = $string("`precision'");
    $cst__31 = $string("'+'");
    $cst__32 = $string("'_'");
    $sub_format = Vector{0, 0, $string("")};
    $formatting_lit = Vector{0, $string("@;"), 1, 0};
    $cst_digit = $string("digit");
    $cst_character = $string("character ')'");
    $cst_character__0 = $string("character '}'");
    $cst__36 = $string("'#'");
    $cst__35 = $string("'+'");
    $cst__34 = $string("'+'");
    $cst__33 = $string("' '");
    $cst__39 = $string("'+'");
    $cst__38 = $string("'+'");
    $cst__37 = $string("' '");
    $cst_non_zero_widths_are_unsupported_for_c_conversions = $string(
      "non-zero widths are unsupported for %c conversions"
    );
    $cst_unexpected_end_of_format = $string("unexpected end of format");
    $cst__23 = $string("");
    $cst__24 = $string("");
    $cst_b = $string("b");
    $cst_h = $string("h");
    $cst_hov = $string("hov");
    $cst_hv = $string("hv");
    $cst_v = $string("v");
    $cst_nan = $string("nan");
    $cst__16 = $string(".");
    $cst_neg_infinity = $string("neg_infinity");
    $cst_infinity = $string("infinity");
    $cst_12g = $string("%.12g");
    $cst_nd = $string("%nd");
    $cst_nd__0 = $string("%+nd");
    $cst_nd__1 = $string("% nd");
    $cst_ni__0 = $string("%ni");
    $cst_ni__1 = $string("%+ni");
    $cst_ni__2 = $string("% ni");
    $cst_nx = $string("%nx");
    $cst_nx__0 = $string("%#nx");
    $cst_nX = $string("%nX");
    $cst_nX__0 = $string("%#nX");
    $cst_no = $string("%no");
    $cst_no__0 = $string("%#no");
    $cst_nu = $string("%nu");
    $cst_ld = $string("%ld");
    $cst_ld__0 = $string("%+ld");
    $cst_ld__1 = $string("% ld");
    $cst_li__0 = $string("%li");
    $cst_li__1 = $string("%+li");
    $cst_li__2 = $string("% li");
    $cst_lx = $string("%lx");
    $cst_lx__0 = $string("%#lx");
    $cst_lX = $string("%lX");
    $cst_lX__0 = $string("%#lX");
    $cst_lo = $string("%lo");
    $cst_lo__0 = $string("%#lo");
    $cst_lu = $string("%lu");
    $cst_Ld = $string("%Ld");
    $cst_Ld__0 = $string("%+Ld");
    $cst_Ld__1 = $string("% Ld");
    $cst_Li__0 = $string("%Li");
    $cst_Li__1 = $string("%+Li");
    $cst_Li__2 = $string("% Li");
    $cst_Lx = $string("%Lx");
    $cst_Lx__0 = $string("%#Lx");
    $cst_LX = $string("%LX");
    $cst_LX__0 = $string("%#LX");
    $cst_Lo = $string("%Lo");
    $cst_Lo__0 = $string("%#Lo");
    $cst_Lu = $string("%Lu");
    $cst_d = $string("%d");
    $cst_d__0 = $string("%+d");
    $cst_d__1 = $string("% d");
    $cst_i__0 = $string("%i");
    $cst_i__1 = $string("%+i");
    $cst_i__2 = $string("% i");
    $cst_x = $string("%x");
    $cst_x__0 = $string("%#x");
    $cst_X = $string("%X");
    $cst_X__0 = $string("%#X");
    $cst_o = $string("%o");
    $cst_o__0 = $string("%#o");
    $cst_u = $string("%u");
    $cst__14 = $string("%!");
    $cst__15 = $string("@{");
    $cst_0c = $string("0c");
    $cst__8 = $string("%%");
    $cst__0 = $string("@]");
    $cst__1 = $string("@}");
    $cst__2 = $string("@?");
    $cst__3 = $string("@\n");
    $cst__4 = $string("@.");
    $cst__5 = $string("@@");
    $cst__6 = $string("@%");
    $cst__7 = $string("@");
    $cst = $string(".*");
    $cst_CamlinternalFormat_Type_mismatch = $string(
      "CamlinternalFormat.Type_mismatch"
    );
    $Assert_failure = $global_data["Assert_failure"];
    $CamlinternalFormatBasics = $global_data["CamlinternalFormatBasics"];
    $Pervasives = $global_data["Pervasives"];
    $Buffer = $global_data["Buffer"];
    $Failure = $global_data["Failure"];
    $Not_found = $global_data["Not_found"];
    $String = $global_data["String_"];
    $Sys = $global_data["Sys"];
    $Char = $global_data["Char"];
    $Bytes = $global_data["Bytes"];
    $a = Vector{0, $string("camlinternalFormat.ml"), 846, 23};
    $l = Vector{0, $string("camlinternalFormat.ml"), 810, 21};
    $d = Vector{0, $string("camlinternalFormat.ml"), 811, 21};
    $m = Vector{0, $string("camlinternalFormat.ml"), 814, 21};
    $e = Vector{0, $string("camlinternalFormat.ml"), 815, 21};
    $n = Vector{0, $string("camlinternalFormat.ml"), 818, 19};
    $f = Vector{0, $string("camlinternalFormat.ml"), 819, 19};
    $o = Vector{0, $string("camlinternalFormat.ml"), 822, 22};
    $g = Vector{0, $string("camlinternalFormat.ml"), 823, 22};
    $p = Vector{0, $string("camlinternalFormat.ml"), 827, 30};
    $h = Vector{0, $string("camlinternalFormat.ml"), 828, 30};
    $j = Vector{0, $string("camlinternalFormat.ml"), 832, 26};
    $b = Vector{0, $string("camlinternalFormat.ml"), 833, 26};
    $k = Vector{0, $string("camlinternalFormat.ml"), 842, 28};
    $c = Vector{0, $string("camlinternalFormat.ml"), 843, 28};
    $i = Vector{0, $string("camlinternalFormat.ml"), 847, 23};
    $q = Vector{0, $string("camlinternalFormat.ml"), 1525, 4};
    $r = Vector{0, $string("camlinternalFormat.ml"), 1593, 39};
    $s = Vector{0, $string("camlinternalFormat.ml"), 1616, 31};
    $t = Vector{0, $string("camlinternalFormat.ml"), 1617, 31};
    $u = Vector{0, $string("camlinternalFormat.ml"), 1797, 8};
    $Y = Vector{
      0,
      Vector{
        11,
        $string("bad input: format type mismatch between "),
        Vector{3, 0, Vector{11, $string(" and "), Vector{3, 0, 0}}}
      },
      $string("bad input: format type mismatch between %S and %S")
    };
    $X = Vector{
      0,
      Vector{
        11,
        $string("bad input: format type mismatch between "),
        Vector{3, 0, Vector{11, $string(" and "), Vector{3, 0, 0}}}
      },
      $string("bad input: format type mismatch between %S and %S")
    };
    $A = Vector{
      0,
      Vector{
        11,
        $string("invalid format "),
        Vector{
          3,
          0,
          Vector{
            11,
            $string(": at character number "),
            Vector{
              4,
              0,
              0,
              0,
              Vector{11, $string(", duplicate flag "), Vector{1, 0}}
            }
          }
        }
      },
      $string("invalid format %S: at character number %d, duplicate flag %C")
    };
    $B = Vector{0, 1, 0};
    $C = Vector{0, 0};
    $E = Vector{1, 0};
    $D = Vector{1, 1};
    $G = Vector{1, 1};
    $F = Vector{1, 1};
    $K = Vector{
      0,
      Vector{
        11,
        $string("invalid format "),
        Vector{
          3,
          0,
          Vector{
            11,
            $string(": at character number "),
            Vector{
              4,
              0,
              0,
              0,
              Vector{
                11,
                $string(", flag "),
                Vector{
                  1,
                  Vector{
                    11,
                    $string(" is only allowed after the '"),
                    Vector{
                      12,
                      37,
                      Vector{11, $string("', before padding and precision"), 0}
                    }
                  }
                }
              }
            }
          }
        }
      },
      $string(
        "invalid format %S: at character number %d, flag %C is only allowed after the '%%', before padding and precision"
      )
    };
    $H = Vector{
      0,
      Vector{
        11,
        $string("invalid format "),
        Vector{
          3,
          0,
          Vector{
            11,
            $string(": at character number "),
            Vector{
              4,
              0,
              0,
              0,
              Vector{
                11,
                $string(", invalid conversion \""),
                Vector{12, 37, Vector{0, Vector{12, 34, 0}}}
              }
            }
          }
        }
      },
      $string(
        "invalid format %S: at character number %d, invalid conversion \"%%%c\""
      )
    };
    $I = Vector{0, 0};
    $J = Vector{0, 0};
    $L = Vector{0, Vector{12, 64, 0}};
    $M = Vector{0, $string("@ "), 1, 0};
    $N = Vector{0, $string("@,"), 0, 0};
    $O = Vector{2, 60};
    $P = Vector{
      0,
      Vector{
        11,
        $string("invalid format "),
        Vector{
          3,
          0,
          Vector{
            11,
            $string(": '"),
            Vector{
              12,
              37,
              Vector{
                11,
                $string("' alone is not accepted in character sets, use "),
                Vector{
                  12,
                  37,
                  Vector{
                    12,
                    37,
                    Vector{
                      11,
                      $string(" instead at position "),
                      Vector{4, 0, 0, 0, Vector{12, 46, 0}}
                    }
                  }
                }
              }
            }
          }
        }
      },
      $string(
        "invalid format %S: '%%' alone is not accepted in character sets, use %%%% instead at position %d."
      )
    };
    $Q = Vector{
      0,
      Vector{
        11,
        $string("invalid format "),
        Vector{
          3,
          0,
          Vector{
            11,
            $string(": integer "),
            Vector{
              4,
              0,
              0,
              0,
              Vector{
                11,
                $string(" is greater than the limit "),
                Vector{4, 0, 0, 0, 0}
              }
            }
          }
        }
      },
      $string("invalid format %S: integer %d is greater than the limit %d")
    };
    $R = Vector{0, $string("camlinternalFormat.ml"), 2811, 11};
    $S = Vector{
      0,
      Vector{
        11,
        $string("invalid format "),
        Vector{
          3,
          0,
          Vector{
            11,
            $string(": unclosed sub-format, expected \""),
            Vector{
              12,
              37,
              Vector{
                0,
                Vector{
                  11,
                  $string("\" at character number "),
                  Vector{4, 0, 0, 0, 0}
                }
              }
            }
          }
        }
      },
      $string(
        "invalid format %S: unclosed sub-format, expected \"%%%c\" at character number %d"
      )
    };
    $T = Vector{0, $string("camlinternalFormat.ml"), 2873, 34};
    $U = Vector{0, $string("camlinternalFormat.ml"), 2906, 28};
    $V = Vector{0, $string("camlinternalFormat.ml"), 2940, 25};
    $W = Vector{
      0,
      Vector{
        11,
        $string("invalid format "),
        Vector{
          3,
          0,
          Vector{
            11,
            $string(": at character number "),
            Vector{
              4,
              0,
              0,
              0,
              Vector{
                11,
                $string(", "),
                Vector{
                  2,
                  0,
                  Vector{
                    11,
                    $string(" is incompatible with '"),
                    Vector{
                      0,
                      Vector{11, $string("' in sub-format "), Vector{3, 0, 0}}
                    }
                  }
                }
              }
            }
          }
        }
      },
      $string(
        "invalid format %S: at character number %d, %s is incompatible with '%c' in sub-format %S"
      )
    };
    $z = Vector{
      0,
      Vector{
        11,
        $string("invalid format "),
        Vector{
          3,
          0,
          Vector{
            11,
            $string(": at character number "),
            Vector{
              4,
              0,
              0,
              0,
              Vector{
                11,
                $string(", "),
                Vector{
                  2,
                  0,
                  Vector{11, $string(" expected, read "), Vector{1, 0}}
                }
              }
            }
          }
        }
      },
      $string(
        "invalid format %S: at character number %d, %s expected, read %C"
      )
    };
    $y = Vector{
      0,
      Vector{
        11,
        $string("invalid format "),
        Vector{
          3,
          0,
          Vector{
            11,
            $string(": at character number "),
            Vector{
              4,
              0,
              0,
              0,
              Vector{
                11,
                $string(", '"),
                Vector{0, Vector{11, $string("' without "), Vector{2, 0, 0}}}
              }
            }
          }
        }
      },
      $string("invalid format %S: at character number %d, '%c' without %s")
    };
    $x = Vector{
      0,
      Vector{
        11,
        $string("invalid format "),
        Vector{
          3,
          0,
          Vector{
            11,
            $string(": at character number "),
            Vector{4, 0, 0, 0, Vector{11, $string(", "), Vector{2, 0, 0}}}
          }
        }
      },
      $string("invalid format %S: at character number %d, %s")
    };
    $w = Vector{
      0,
      Vector{11, $string("invalid box description "), Vector{3, 0, 0}},
      $string("invalid box description %S")
    };
    $v = Vector{0, 0, 4};
    $create_char_set = function(dynamic $param) use ($Bytes,$call2) {
      return $call2($Bytes[1], 32, 0);
    };
    $add_in_char_set = function(dynamic $char_set, dynamic $c) use ($Pervasives,$call1,$caml_bytes_set,$left_shift_32,$runtime,$unsigned_right_shift_32) {
      $str_ind = (int) $unsigned_right_shift_32($c, 3);
      $mask = $left_shift_32(1, $c & 7);
      $eQ = $runtime["caml_bytes_get"]($char_set, $str_ind) | $mask;
      return $caml_bytes_set($char_set, $str_ind, $call1($Pervasives[17], $eQ)
      );
    };
    $freeze_char_set = function(dynamic $char_set) use ($Bytes,$call1) {
      return $call1($Bytes[6], $char_set);
    };
    $rev_char_set = function(dynamic $char_set) use ($Bytes,$Pervasives,$call1,$caml_bytes_set,$caml_string_get,$create_char_set) {
      $char_set__0 = $create_char_set(0);
      $i = 0;
      for (;;) {
        $eO = $caml_string_get($char_set, $i) ^ 255;
        $caml_bytes_set($char_set__0, $i, $call1($Pervasives[17], $eO));
        $eP = (int) ($i + 1);
        if (31 !== $i) {$i = $eP;continue;}
        return $call1($Bytes[42], $char_set__0);
      }
    };
    $is_in_char_set = function(dynamic $char_set, dynamic $c) use ($caml_string_get,$left_shift_32,$unsigned_right_shift_32) {
      $str_ind = (int) $unsigned_right_shift_32($c, 3);
      $mask = $left_shift_32(1, $c & 7);
      return 0 !== ($caml_string_get($char_set, $str_ind) & $mask) ? 1 : (0);
    };
    $pad_of_pad_opt = function(dynamic $pad_opt) {
      if ($pad_opt) {$width = $pad_opt[1];return Vector{0, 1, $width};}
      return 0;
    };
    $prec_of_prec_opt = function(dynamic $prec_opt) {
      if ($prec_opt) {$ndec = $prec_opt[1];return Vector{0, $ndec};}
      return 0;
    };
    $param_format_of_ignored_format = function(dynamic $ign, dynamic $fmt) use ($is_int,$pad_of_pad_opt,$prec_of_prec_opt) {
      if ($is_int($ign)) {
        switch($ign) {
          // FALLTHROUGH
          case 0:
            return Vector{0, Vector{0, $fmt}};
          // FALLTHROUGH
          case 1:
            return Vector{0, Vector{1, $fmt}};
          // FALLTHROUGH
          case 2:
            return Vector{0, Vector{19, $fmt}};
          // FALLTHROUGH
          default:
            return Vector{0, Vector{22, $fmt}};
          }
      }
      else {
        switch($ign[0]) {
          // FALLTHROUGH
          case 0:
            $pad_opt = $ign[1];
            return Vector{0, Vector{2, $pad_of_pad_opt($pad_opt), $fmt}};
          // FALLTHROUGH
          case 1:
            $pad_opt__0 = $ign[1];
            return Vector{0, Vector{3, $pad_of_pad_opt($pad_opt__0), $fmt}};
          // FALLTHROUGH
          case 2:
            $pad_opt__1 = $ign[2];
            $iconv = $ign[1];
            return Vector{
              0,
              Vector{4, $iconv, $pad_of_pad_opt($pad_opt__1), 0, $fmt}
            };
          // FALLTHROUGH
          case 3:
            $pad_opt__2 = $ign[2];
            $iconv__0 = $ign[1];
            return Vector{
              0,
              Vector{5, $iconv__0, $pad_of_pad_opt($pad_opt__2), 0, $fmt}
            };
          // FALLTHROUGH
          case 4:
            $pad_opt__3 = $ign[2];
            $iconv__1 = $ign[1];
            return Vector{
              0,
              Vector{6, $iconv__1, $pad_of_pad_opt($pad_opt__3), 0, $fmt}
            };
          // FALLTHROUGH
          case 5:
            $pad_opt__4 = $ign[2];
            $iconv__2 = $ign[1];
            return Vector{
              0,
              Vector{7, $iconv__2, $pad_of_pad_opt($pad_opt__4), 0, $fmt}
            };
          // FALLTHROUGH
          case 6:
            $prec_opt = $ign[2];
            $pad_opt__5 = $ign[1];
            $eN = $prec_of_prec_opt($prec_opt);
            return Vector{
              0,
              Vector{8, 0, $pad_of_pad_opt($pad_opt__5), $eN, $fmt}
            };
          // FALLTHROUGH
          case 7:
            $pad_opt__6 = $ign[1];
            return Vector{0, Vector{9, $pad_of_pad_opt($pad_opt__6), $fmt}};
          // FALLTHROUGH
          case 8:
            $fmtty = $ign[2];
            $pad_opt__7 = $ign[1];
            return Vector{0, Vector{13, $pad_opt__7, $fmtty, $fmt}};
          // FALLTHROUGH
          case 9:
            $fmtty__0 = $ign[2];
            $pad_opt__8 = $ign[1];
            return Vector{0, Vector{14, $pad_opt__8, $fmtty__0, $fmt}};
          // FALLTHROUGH
          case 10:
            $char_set = $ign[2];
            $width_opt = $ign[1];
            return Vector{0, Vector{20, $width_opt, $char_set, $fmt}};
          // FALLTHROUGH
          default:
            $counter = $ign[1];
            return Vector{0, Vector{21, $counter, $fmt}};
          }
      }
    };
    $default_float_precision = -6;
    $buffer_create = function(dynamic $init_size) use ($caml_create_bytes) {
      return Vector{0, 0, $caml_create_bytes($init_size)};
    };
    $buffer_check_size = function(dynamic $buf, dynamic $overhead) use ($Bytes,$Pervasives,$call2,$call5,$caml_create_bytes,$runtime) {
      $len = $runtime["caml_ml_bytes_length"]($buf[2]);
      $min_len = (int) ($buf[1] + $overhead);
      $eL = $len < $min_len ? 1 : (0);
      if ($eL) {
        $new_len = $call2($Pervasives[5], (int) ($len * 2), $min_len);
        $new_str = $caml_create_bytes($new_len);
        $call5($Bytes[11], $buf[2], 0, $new_str, 0, $len);
        $buf[2] = $new_str;
        $eM = 0;
      }
      else {$eM = $eL;}
      return $eM;
    };
    $buffer_add_char = function(dynamic $buf, dynamic $c) use ($buffer_check_size,$caml_bytes_set) {
      $buffer_check_size($buf, 1);
      $caml_bytes_set($buf[2], $buf[1], $c);
      $buf[1] = (int) ($buf[1] + 1);
      return 0;
    };
    $buffer_add_string = function(dynamic $buf, dynamic $s) use ($String,$buffer_check_size,$call5,$caml_ml_string_length) {
      $str_len = $caml_ml_string_length($s);
      $buffer_check_size($buf, $str_len);
      $call5($String[6], $s, 0, $buf[2], $buf[1], $str_len);
      $buf[1] = (int) ($buf[1] + $str_len);
      return 0;
    };
    $buffer_contents = function(dynamic $buf) use ($Bytes,$call3) {
      return $call3($Bytes[8], $buf[2], 0, $buf[1]);
    };
    $char_of_iconv = function(dynamic $iconv) {
      switch($iconv) {
        // FALLTHROUGH
        case 12:
          return 117;
        // FALLTHROUGH
        case 6:
        // FALLTHROUGH
        case 7:
          return 120;
        // FALLTHROUGH
        case 8:
        // FALLTHROUGH
        case 9:
          return 88;
        // FALLTHROUGH
        case 10:
        // FALLTHROUGH
        case 11:
          return 111;
        // FALLTHROUGH
        case 0:
        // FALLTHROUGH
        case 1:
        // FALLTHROUGH
        case 2:
          return 100;
        // FALLTHROUGH
        default:
          return 105;
        }
    };
    $char_of_fconv = function(dynamic $fconv) {
      switch($fconv) {
        // FALLTHROUGH
        case 15:
          return 70;
        // FALLTHROUGH
        case 0:
        // FALLTHROUGH
        case 1:
        // FALLTHROUGH
        case 2:
          return 102;
        // FALLTHROUGH
        case 3:
        // FALLTHROUGH
        case 4:
        // FALLTHROUGH
        case 5:
          return 101;
        // FALLTHROUGH
        case 6:
        // FALLTHROUGH
        case 7:
        // FALLTHROUGH
        case 8:
          return 69;
        // FALLTHROUGH
        case 9:
        // FALLTHROUGH
        case 10:
        // FALLTHROUGH
        case 11:
          return 103;
        // FALLTHROUGH
        case 12:
        // FALLTHROUGH
        case 13:
        // FALLTHROUGH
        case 14:
          return 71;
        // FALLTHROUGH
        case 16:
        // FALLTHROUGH
        case 17:
        // FALLTHROUGH
        case 18:
          return 104;
        // FALLTHROUGH
        default:
          return 72;
        }
    };
    $char_of_counter = function(dynamic $counter) {
      switch($counter) {
        // FALLTHROUGH
        case 0:
          return 108;
        // FALLTHROUGH
        case 1:
          return 110;
        // FALLTHROUGH
        default:
          return 78;
        }
    };
    $bprint_char_set = function(dynamic $buf, dynamic $char_set) use ($Char,$Pervasives,$buffer_add_char,$call1,$caml_trampoline,$caml_trampoline_return,$is_in_char_set,$rev_char_set,$unsigned_right_shift_32) {
      $print_first = new Ref();
      $print_in = new Ref();
      $print_out = new Ref();
      $print_second = new Ref();
      $print_start = function(dynamic $set) use ($Char,$buf,$buffer_add_char,$call1,$is_in_char_set,$print_out) {
        $is_alone = function(dynamic $c) use ($Char,$call1,$is_in_char_set,$set) {
          $after = $call1($Char[1], (int) ($c + 1));
          $before = $call1($Char[1], (int) ($c + -1));
          $eH = $is_in_char_set($set, $c);
          if ($eH) {
            $eI = $is_in_char_set($set, $before);
            $eJ = $eI ? $is_in_char_set($set, $after) : ($eI);
            $eK = 1 - $eJ;
          }
          else {$eK = $eH;}
          return $eK;
        };
        if ($is_alone(93)) {$buffer_add_char($buf, 93);}
        $print_out->contents($set, 1);
        $eG = $is_alone(45);
        return $eG ? $buffer_add_char($buf, 45) : ($eG);
      };
      $print_char = function(dynamic $buf, dynamic $i) use ($Pervasives,$buffer_add_char,$call1) {
        $c = $call1($Pervasives[17], $i);
        if (37 === $c) {
          $buffer_add_char($buf, 37);
          return $buffer_add_char($buf, 37);
        }
        if (64 === $c) {
          $buffer_add_char($buf, 37);
          return $buffer_add_char($buf, 64);
        }
        return $buffer_add_char($buf, $c);
      };
      $print_out__0 = function(dynamic $counter, dynamic $set, dynamic $i) use ($Pervasives,$call1,$caml_trampoline_return,$is_in_char_set,$print_first) {
        $i__0 = $i;
        for (;;) {
          $eF = $i__0 < 256 ? 1 : (0);
          if ($eF) {
            if ($is_in_char_set($set, $call1($Pervasives[17], $i__0))) {
              if ($counter < 50) {
                $counter__0 = (int) ($counter + 1);
                return $print_first->contents($counter__0, $set, $i__0);
              }
              return $caml_trampoline_return(
                $print_first->contents,
                varray[0,$set,$i__0]
              );
            }
            $i__1 = (int) ($i__0 + 1);
            $i__0 = $i__1;
            continue;
          }
          return $eF;
        }
      };
      $print_first->contents = function
      (dynamic $counter, dynamic $set, dynamic $i) use ($Pervasives,$buf,$call1,$caml_trampoline_return,$print_char,$print_out__0,$print_second,$unsigned_right_shift_32) {
        $match = $call1($Pervasives[17], $i);
        $switcher = (int) ($match + -45);
        if (48 < $unsigned_right_shift_32($switcher, 0)) {
          if (210 <= $switcher) {return $print_char($buf, 255);}
        }
        else {
          $switcher__0 = (int) ($switcher + -1);
          if (46 < $unsigned_right_shift_32($switcher__0, 0)) {
            $eE = (int) ($i + 1);
            if ($counter < 50) {
              $counter__1 = (int) ($counter + 1);
              return $print_out__0($counter__1, $set, $eE);
            }
            return $caml_trampoline_return($print_out__0, varray[0,$set,$eE]);
          }
        }
        $eD = (int) ($i + 1);
        if ($counter < 50) {
          $counter__0 = (int) ($counter + 1);
          return $print_second->contents($counter__0, $set, $eD);
        }
        return $caml_trampoline_return(
          $print_second->contents,
          varray[0,$set,$eD]
        );
      };
      $print_second->contents = function
      (dynamic $counter, dynamic $set, dynamic $i) use ($Pervasives,$buf,$call1,$caml_trampoline_return,$is_in_char_set,$print_char,$print_in,$print_out__0,$unsigned_right_shift_32) {
        if ($is_in_char_set($set, $call1($Pervasives[17], $i))) {
          $match = $call1($Pervasives[17], $i);
          $switcher = (int) ($match + -45);
          if (48 < $unsigned_right_shift_32($switcher, 0)) {
            if (210 <= $switcher) {
              $print_char($buf, 254);
              return $print_char($buf, 255);
            }
          }
          else {
            $switcher__0 = (int) ($switcher + -1);
            if (46 < $unsigned_right_shift_32($switcher__0, 0)) {
              if (
                !
                $is_in_char_set($set, $call1($Pervasives[17], (int) ($i + 1)))
              ) {
                $print_char($buf, (int) ($i + -1));
                $eB = (int) ($i + 1);
                if ($counter < 50) {
                  $counter__1 = (int) ($counter + 1);
                  return $print_out__0($counter__1, $set, $eB);
                }
                return $caml_trampoline_return(
                  $print_out__0,
                  varray[0,$set,$eB]
                );
              }
            }
          }
          if ($is_in_char_set($set, $call1($Pervasives[17], (int) ($i + 1)))) {
            $ey = (int) ($i + 2);
            $ez = (int) ($i + -1);
            if ($counter < 50) {
              $counter__0 = (int) ($counter + 1);
              return $print_in->contents($counter__0, $set, $ez, $ey);
            }
            return $caml_trampoline_return(
              $print_in->contents,
              varray[0,$set,$ez,$ey]
            );
          }
          $print_char($buf, (int) ($i + -1));
          $print_char($buf, $i);
          $eA = (int) ($i + 2);
          if ($counter < 50) {
            $counter__2 = (int) ($counter + 1);
            return $print_out__0($counter__2, $set, $eA);
          }
          return $caml_trampoline_return($print_out__0, varray[0,$set,$eA]);
        }
        $print_char($buf, (int) ($i + -1));
        $eC = (int) ($i + 1);
        if ($counter < 50) {
          $counter__3 = (int) ($counter + 1);
          return $print_out__0($counter__3, $set, $eC);
        }
        return $caml_trampoline_return($print_out__0, varray[0,$set,$eC]);
      };
      $print_in->contents = function
      (dynamic $counter, dynamic $set, dynamic $i, dynamic $j) use ($Pervasives,$buf,$call1,$caml_trampoline_return,$is_in_char_set,$print_char,$print_out__0) {
        $j__0 = $j;
        for (;;) {
          if (256 !== $j__0) {
            if ($is_in_char_set($set, $call1($Pervasives[17], $j__0))) {$j__1 = (int) ($j__0 + 1);$j__0 = $j__1;continue;}
          }
          $print_char($buf, $i);
          $print_char($buf, 45);
          $print_char($buf, (int) ($j__0 + -1));
          $ew = $j__0 < 256 ? 1 : (0);
          if ($ew) {
            $ex = (int) ($j__0 + 1);
            if ($counter < 50) {
              $counter__0 = (int) ($counter + 1);
              return $print_out__0($counter__0, $set, $ex);
            }
            return $caml_trampoline_return($print_out__0, varray[0,$set,$ex]);
          }
          return $ew;
        }
      };
      $print_out->contents = function(dynamic $set, dynamic $i) use ($caml_trampoline,$print_out__0) {
        return $caml_trampoline($print_out__0(0, $set, $i));
      };
      $buffer_add_char($buf, 91);
      if ($is_in_char_set($char_set, 0)) {
        $buffer_add_char($buf, 94);
        $ev = $rev_char_set($char_set);
      }
      else {$ev = $char_set;}
      $print_start($ev);
      return $buffer_add_char($buf, 93);
    };
    $bprint_padty = function(dynamic $buf, dynamic $padty) use ($buffer_add_char) {
      switch($padty) {
        // FALLTHROUGH
        case 0:
          return $buffer_add_char($buf, 45);
        // FALLTHROUGH
        case 1:
          return 0;
        // FALLTHROUGH
        default:
          return $buffer_add_char($buf, 48);
        }
    };
    $bprint_ignored_flag = function(dynamic $buf, dynamic $ign_flag) use ($buffer_add_char) {
      return $ign_flag ? $buffer_add_char($buf, 95) : ($ign_flag);
    };
    $bprint_pad_opt = function(dynamic $buf, dynamic $pad_opt) use ($Pervasives,$buffer_add_string,$call1) {
      if ($pad_opt) {
        $width = $pad_opt[1];
        return $buffer_add_string($buf, $call1($Pervasives[21], $width));
      }
      return 0;
    };
    $bprint_padding = function(dynamic $buf, dynamic $pad) use ($Pervasives,$bprint_padty,$buffer_add_char,$buffer_add_string,$call1,$is_int) {
      if ($is_int($pad)) {return 0;}
      else {
        if (0 === $pad[0]) {
          $n = $pad[2];
          $padty = $pad[1];
          $bprint_padty($buf, $padty);
          return $buffer_add_string($buf, $call1($Pervasives[21], $n));
        }
        $padty__0 = $pad[1];
        $bprint_padty($buf, $padty__0);
        return $buffer_add_char($buf, 42);
      }
    };
    $bprint_precision = function(dynamic $buf, dynamic $prec) use ($Pervasives,$buffer_add_char,$buffer_add_string,$call1,$cst,$is_int) {
      if ($is_int($prec)) {
        return 0 === $prec ? 0 : ($buffer_add_string($buf, $cst));
      }
      $n = $prec[1];
      $buffer_add_char($buf, 46);
      return $buffer_add_string($buf, $call1($Pervasives[21], $n));
    };
    $bprint_iconv_flag = function(dynamic $buf, dynamic $iconv) use ($buffer_add_char) {
      switch($iconv) {
        // FALLTHROUGH
        case 1:
        // FALLTHROUGH
        case 4:
          return $buffer_add_char($buf, 43);
        // FALLTHROUGH
        case 2:
        // FALLTHROUGH
        case 5:
          return $buffer_add_char($buf, 32);
        // FALLTHROUGH
        case 7:
        // FALLTHROUGH
        case 9:
        // FALLTHROUGH
        case 11:
          return $buffer_add_char($buf, 35);
        // FALLTHROUGH
        default:
          return 0;
        }
    };
    $bprint_int_fmt = function
    (dynamic $buf, dynamic $ign_flag, dynamic $iconv, dynamic $pad, dynamic $prec) use ($bprint_iconv_flag,$bprint_ignored_flag,$bprint_padding,$bprint_precision,$buffer_add_char,$char_of_iconv) {
      $buffer_add_char($buf, 37);
      $bprint_ignored_flag($buf, $ign_flag);
      $bprint_iconv_flag($buf, $iconv);
      $bprint_padding($buf, $pad);
      $bprint_precision($buf, $prec);
      return $buffer_add_char($buf, $char_of_iconv($iconv));
    };
    $bprint_altint_fmt = function
    (dynamic $buf, dynamic $ign_flag, dynamic $iconv, dynamic $pad, dynamic $prec, dynamic $c) use ($bprint_iconv_flag,$bprint_ignored_flag,$bprint_padding,$bprint_precision,$buffer_add_char,$char_of_iconv) {
      $buffer_add_char($buf, 37);
      $bprint_ignored_flag($buf, $ign_flag);
      $bprint_iconv_flag($buf, $iconv);
      $bprint_padding($buf, $pad);
      $bprint_precision($buf, $prec);
      $buffer_add_char($buf, $c);
      return $buffer_add_char($buf, $char_of_iconv($iconv));
    };
    $bprint_fconv_flag = function(dynamic $buf, dynamic $fconv) use ($buffer_add_char) {
      switch($fconv) {
        // FALLTHROUGH
        case 1:
        // FALLTHROUGH
        case 4:
        // FALLTHROUGH
        case 7:
        // FALLTHROUGH
        case 10:
        // FALLTHROUGH
        case 13:
        // FALLTHROUGH
        case 17:
        // FALLTHROUGH
        case 20:
          return $buffer_add_char($buf, 43);
        // FALLTHROUGH
        case 2:
        // FALLTHROUGH
        case 5:
        // FALLTHROUGH
        case 8:
        // FALLTHROUGH
        case 11:
        // FALLTHROUGH
        case 14:
        // FALLTHROUGH
        case 18:
        // FALLTHROUGH
        case 21:
          return $buffer_add_char($buf, 32);
        // FALLTHROUGH
        default:
          return 0;
        }
    };
    $bprint_float_fmt = function
    (dynamic $buf, dynamic $ign_flag, dynamic $fconv, dynamic $pad, dynamic $prec) use ($bprint_fconv_flag,$bprint_ignored_flag,$bprint_padding,$bprint_precision,$buffer_add_char,$char_of_fconv) {
      $buffer_add_char($buf, 37);
      $bprint_ignored_flag($buf, $ign_flag);
      $bprint_fconv_flag($buf, $fconv);
      $bprint_padding($buf, $pad);
      $bprint_precision($buf, $prec);
      return $buffer_add_char($buf, $char_of_fconv($fconv));
    };
    $string_of_formatting_lit = function(dynamic $formatting_lit) use ($Pervasives,$String,$call2,$cst__0,$cst__1,$cst__2,$cst__3,$cst__4,$cst__5,$cst__6,$cst__7,$is_int) {
      if ($is_int($formatting_lit)) {
        switch($formatting_lit) {
          // FALLTHROUGH
          case 0:
            return $cst__0;
          // FALLTHROUGH
          case 1:
            return $cst__1;
          // FALLTHROUGH
          case 2:
            return $cst__2;
          // FALLTHROUGH
          case 3:
            return $cst__3;
          // FALLTHROUGH
          case 4:
            return $cst__4;
          // FALLTHROUGH
          case 5:
            return $cst__5;
          // FALLTHROUGH
          default:
            return $cst__6;
          }
      }
      else {
        switch($formatting_lit[0]) {
          // FALLTHROUGH
          case 0:
            $str = $formatting_lit[1];
            return $str;
          // FALLTHROUGH
          case 1:
            $str__0 = $formatting_lit[1];
            return $str__0;
          // FALLTHROUGH
          default:
            $c = $formatting_lit[1];
            $eu = $call2($String[1], 1, $c);
            return $call2($Pervasives[16], $cst__7, $eu);
          }
      }
    };
    $string_of_formatting_gen = function(dynamic $formatting_gen) {
      if (0 === $formatting_gen[0]) {
        $match = $formatting_gen[1];
        $str = $match[2];
        return $str;
      }
      $match__0 = $formatting_gen[1];
      $str__0 = $match__0[2];
      return $str__0;
    };
    $bprint_char_literal = function(dynamic $buf, dynamic $chr) use ($buffer_add_char,$buffer_add_string,$cst__8) {
      return 37 === $chr
        ? $buffer_add_string($buf, $cst__8)
        : ($buffer_add_char($buf, $chr));
    };
    $bprint_string_literal = function(dynamic $buf, dynamic $str) use ($bprint_char_literal,$caml_ml_string_length,$caml_string_get) {
      $es = (int) ($caml_ml_string_length($str) + -1);
      $er = 0;
      if (! ($es < 0)) {
        $i = $er;
        for (;;) {
          $bprint_char_literal($buf, $caml_string_get($str, $i));
          $et = (int) ($i + 1);
          if ($es !== $i) {$i = $et;continue;}
          break;
        }
      }
      return 0;
    };
    $bprint_fmtty->contents = function(dynamic $buf, dynamic $fmtty) use ($bprint_fmtty,$buffer_add_string,$cst_B,$cst_Li,$cst__10,$cst__11,$cst__12,$cst__13,$cst__9,$cst_a,$cst_c,$cst_f,$cst_i,$cst_li,$cst_ni,$cst_r,$cst_r__0,$cst_s,$cst_t,$is_int) {
      $fmtty__0 = $fmtty;
      for (;;) if (
        $is_int($fmtty__0)
      ) {return 0;}
      else {
        switch($fmtty__0[0]) {
          // FALLTHROUGH
          case 0:
            $fmtty__1 = $fmtty__0[1];
            $buffer_add_string($buf, $cst_c);
            $fmtty__0 = $fmtty__1;
            continue;
          // FALLTHROUGH
          case 1:
            $fmtty__2 = $fmtty__0[1];
            $buffer_add_string($buf, $cst_s);
            $fmtty__0 = $fmtty__2;
            continue;
          // FALLTHROUGH
          case 2:
            $fmtty__3 = $fmtty__0[1];
            $buffer_add_string($buf, $cst_i);
            $fmtty__0 = $fmtty__3;
            continue;
          // FALLTHROUGH
          case 3:
            $fmtty__4 = $fmtty__0[1];
            $buffer_add_string($buf, $cst_li);
            $fmtty__0 = $fmtty__4;
            continue;
          // FALLTHROUGH
          case 4:
            $fmtty__5 = $fmtty__0[1];
            $buffer_add_string($buf, $cst_ni);
            $fmtty__0 = $fmtty__5;
            continue;
          // FALLTHROUGH
          case 5:
            $fmtty__6 = $fmtty__0[1];
            $buffer_add_string($buf, $cst_Li);
            $fmtty__0 = $fmtty__6;
            continue;
          // FALLTHROUGH
          case 6:
            $fmtty__7 = $fmtty__0[1];
            $buffer_add_string($buf, $cst_f);
            $fmtty__0 = $fmtty__7;
            continue;
          // FALLTHROUGH
          case 7:
            $fmtty__8 = $fmtty__0[1];
            $buffer_add_string($buf, $cst_B);
            $fmtty__0 = $fmtty__8;
            continue;
          // FALLTHROUGH
          case 8:
            $fmtty__9 = $fmtty__0[2];
            $sub_fmtty = $fmtty__0[1];
            $buffer_add_string($buf, $cst__9);
            $bprint_fmtty->contents($buf, $sub_fmtty);
            $buffer_add_string($buf, $cst__10);
            $fmtty__0 = $fmtty__9;
            continue;
          // FALLTHROUGH
          case 9:
            $fmtty__10 = $fmtty__0[3];
            $sub_fmtty__0 = $fmtty__0[1];
            $buffer_add_string($buf, $cst__11);
            $bprint_fmtty->contents($buf, $sub_fmtty__0);
            $buffer_add_string($buf, $cst__12);
            $fmtty__0 = $fmtty__10;
            continue;
          // FALLTHROUGH
          case 10:
            $fmtty__11 = $fmtty__0[1];
            $buffer_add_string($buf, $cst_a);
            $fmtty__0 = $fmtty__11;
            continue;
          // FALLTHROUGH
          case 11:
            $fmtty__12 = $fmtty__0[1];
            $buffer_add_string($buf, $cst_t);
            $fmtty__0 = $fmtty__12;
            continue;
          // FALLTHROUGH
          case 12:
            $fmtty__13 = $fmtty__0[1];
            $buffer_add_string($buf, $cst__13);
            $fmtty__0 = $fmtty__13;
            continue;
          // FALLTHROUGH
          case 13:
            $fmtty__14 = $fmtty__0[1];
            $buffer_add_string($buf, $cst_r);
            $fmtty__0 = $fmtty__14;
            continue;
          // FALLTHROUGH
          default:
            $fmtty__15 = $fmtty__0[1];
            $buffer_add_string($buf, $cst_r__0);
            $fmtty__0 = $fmtty__15;
            continue;
          }
      }
    };
    $int_of_custom_arity->contents = function(dynamic $param) use ($int_of_custom_arity) {
      if ($param) {
        $x = $param[1];
        return (int) (1 + $int_of_custom_arity->contents($x));
      }
      return 0;
    };
    $bprint_fmt = function(dynamic $buf, dynamic $fmt) use ($bprint_altint_fmt,$bprint_char_literal,$bprint_char_set,$bprint_float_fmt,$bprint_fmtty,$bprint_ignored_flag,$bprint_int_fmt,$bprint_pad_opt,$bprint_padding,$bprint_string_literal,$buffer_add_char,$buffer_add_string,$char_of_counter,$cst_0c,$cst__14,$cst__15,$int_of_custom_arity,$is_int,$param_format_of_ignored_format,$string_of_formatting_gen,$string_of_formatting_lit) {
      $fmtiter = function(dynamic $fmt, dynamic $ign_flag) use ($bprint_altint_fmt,$bprint_char_literal,$bprint_char_set,$bprint_float_fmt,$bprint_fmtty,$bprint_ignored_flag,$bprint_int_fmt,$bprint_pad_opt,$bprint_padding,$bprint_string_literal,$buf,$buffer_add_char,$buffer_add_string,$char_of_counter,$cst_0c,$cst__14,$cst__15,$int_of_custom_arity,$is_int,$param_format_of_ignored_format,$string_of_formatting_gen,$string_of_formatting_lit) {
        $fmt__0 = $fmt;
        $ign_flag__0 = $ign_flag;
        for (;;) if (
          $is_int($fmt__0)
        ) {return 0;}
        else {
          switch($fmt__0[0]) {
            // FALLTHROUGH
            case 0:
              $fmt__1 = $fmt__0[1];
              $buffer_add_char($buf, 37);
              $bprint_ignored_flag($buf, $ign_flag__0);
              $buffer_add_char($buf, 99);
              $fmt__0 = $fmt__1;
              $ign_flag__0 = 0;
              continue;
            // FALLTHROUGH
            case 1:
              $fmt__2 = $fmt__0[1];
              $buffer_add_char($buf, 37);
              $bprint_ignored_flag($buf, $ign_flag__0);
              $buffer_add_char($buf, 67);
              $fmt__0 = $fmt__2;
              $ign_flag__0 = 0;
              continue;
            // FALLTHROUGH
            case 2:
              $fmt__3 = $fmt__0[2];
              $pad = $fmt__0[1];
              $buffer_add_char($buf, 37);
              $bprint_ignored_flag($buf, $ign_flag__0);
              $bprint_padding($buf, $pad);
              $buffer_add_char($buf, 115);
              $fmt__0 = $fmt__3;
              $ign_flag__0 = 0;
              continue;
            // FALLTHROUGH
            case 3:
              $fmt__4 = $fmt__0[2];
              $pad__0 = $fmt__0[1];
              $buffer_add_char($buf, 37);
              $bprint_ignored_flag($buf, $ign_flag__0);
              $bprint_padding($buf, $pad__0);
              $buffer_add_char($buf, 83);
              $fmt__0 = $fmt__4;
              $ign_flag__0 = 0;
              continue;
            // FALLTHROUGH
            case 4:
              $fmt__5 = $fmt__0[4];
              $prec = $fmt__0[3];
              $pad__1 = $fmt__0[2];
              $iconv = $fmt__0[1];
              $bprint_int_fmt($buf, $ign_flag__0, $iconv, $pad__1, $prec);
              $fmt__0 = $fmt__5;
              $ign_flag__0 = 0;
              continue;
            // FALLTHROUGH
            case 5:
              $fmt__6 = $fmt__0[4];
              $prec__0 = $fmt__0[3];
              $pad__2 = $fmt__0[2];
              $iconv__0 = $fmt__0[1];
              $bprint_altint_fmt(
                $buf,
                $ign_flag__0,
                $iconv__0,
                $pad__2,
                $prec__0,
                108
              );
              $fmt__0 = $fmt__6;
              $ign_flag__0 = 0;
              continue;
            // FALLTHROUGH
            case 6:
              $fmt__7 = $fmt__0[4];
              $prec__1 = $fmt__0[3];
              $pad__3 = $fmt__0[2];
              $iconv__1 = $fmt__0[1];
              $bprint_altint_fmt(
                $buf,
                $ign_flag__0,
                $iconv__1,
                $pad__3,
                $prec__1,
                110
              );
              $fmt__0 = $fmt__7;
              $ign_flag__0 = 0;
              continue;
            // FALLTHROUGH
            case 7:
              $fmt__8 = $fmt__0[4];
              $prec__2 = $fmt__0[3];
              $pad__4 = $fmt__0[2];
              $iconv__2 = $fmt__0[1];
              $bprint_altint_fmt(
                $buf,
                $ign_flag__0,
                $iconv__2,
                $pad__4,
                $prec__2,
                76
              );
              $fmt__0 = $fmt__8;
              $ign_flag__0 = 0;
              continue;
            // FALLTHROUGH
            case 8:
              $fmt__9 = $fmt__0[4];
              $prec__3 = $fmt__0[3];
              $pad__5 = $fmt__0[2];
              $fconv = $fmt__0[1];
              $bprint_float_fmt($buf, $ign_flag__0, $fconv, $pad__5, $prec__3);
              $fmt__0 = $fmt__9;
              $ign_flag__0 = 0;
              continue;
            // FALLTHROUGH
            case 9:
              $fmt__10 = $fmt__0[2];
              $pad__6 = $fmt__0[1];
              $buffer_add_char($buf, 37);
              $bprint_ignored_flag($buf, $ign_flag__0);
              $bprint_padding($buf, $pad__6);
              $buffer_add_char($buf, 66);
              $fmt__0 = $fmt__10;
              $ign_flag__0 = 0;
              continue;
            // FALLTHROUGH
            case 10:
              $fmt__11 = $fmt__0[1];
              $buffer_add_string($buf, $cst__14);
              $fmt__0 = $fmt__11;
              continue;
            // FALLTHROUGH
            case 11:
              $fmt__12 = $fmt__0[2];
              $str = $fmt__0[1];
              $bprint_string_literal($buf, $str);
              $fmt__0 = $fmt__12;
              continue;
            // FALLTHROUGH
            case 12:
              $fmt__13 = $fmt__0[2];
              $chr = $fmt__0[1];
              $bprint_char_literal($buf, $chr);
              $fmt__0 = $fmt__13;
              continue;
            // FALLTHROUGH
            case 13:
              $fmt__14 = $fmt__0[3];
              $fmtty = $fmt__0[2];
              $pad_opt = $fmt__0[1];
              $buffer_add_char($buf, 37);
              $bprint_ignored_flag($buf, $ign_flag__0);
              $bprint_pad_opt($buf, $pad_opt);
              $buffer_add_char($buf, 123);
              $bprint_fmtty->contents($buf, $fmtty);
              $buffer_add_char($buf, 37);
              $buffer_add_char($buf, 125);
              $fmt__0 = $fmt__14;
              $ign_flag__0 = 0;
              continue;
            // FALLTHROUGH
            case 14:
              $fmt__15 = $fmt__0[3];
              $fmtty__0 = $fmt__0[2];
              $pad_opt__0 = $fmt__0[1];
              $buffer_add_char($buf, 37);
              $bprint_ignored_flag($buf, $ign_flag__0);
              $bprint_pad_opt($buf, $pad_opt__0);
              $buffer_add_char($buf, 40);
              $bprint_fmtty->contents($buf, $fmtty__0);
              $buffer_add_char($buf, 37);
              $buffer_add_char($buf, 41);
              $fmt__0 = $fmt__15;
              $ign_flag__0 = 0;
              continue;
            // FALLTHROUGH
            case 15:
              $fmt__16 = $fmt__0[1];
              $buffer_add_char($buf, 37);
              $bprint_ignored_flag($buf, $ign_flag__0);
              $buffer_add_char($buf, 97);
              $fmt__0 = $fmt__16;
              $ign_flag__0 = 0;
              continue;
            // FALLTHROUGH
            case 16:
              $fmt__17 = $fmt__0[1];
              $buffer_add_char($buf, 37);
              $bprint_ignored_flag($buf, $ign_flag__0);
              $buffer_add_char($buf, 116);
              $fmt__0 = $fmt__17;
              $ign_flag__0 = 0;
              continue;
            // FALLTHROUGH
            case 17:
              $fmt__18 = $fmt__0[2];
              $fmting_lit = $fmt__0[1];
              $bprint_string_literal(
                $buf,
                $string_of_formatting_lit($fmting_lit)
              );
              $fmt__0 = $fmt__18;
              continue;
            // FALLTHROUGH
            case 18:
              $fmt__19 = $fmt__0[2];
              $fmting_gen = $fmt__0[1];
              $bprint_string_literal($buf, $cst__15);
              $bprint_string_literal(
                $buf,
                $string_of_formatting_gen($fmting_gen)
              );
              $fmt__0 = $fmt__19;
              continue;
            // FALLTHROUGH
            case 19:
              $fmt__20 = $fmt__0[1];
              $buffer_add_char($buf, 37);
              $bprint_ignored_flag($buf, $ign_flag__0);
              $buffer_add_char($buf, 114);
              $fmt__0 = $fmt__20;
              $ign_flag__0 = 0;
              continue;
            // FALLTHROUGH
            case 20:
              $fmt__21 = $fmt__0[3];
              $char_set = $fmt__0[2];
              $width_opt = $fmt__0[1];
              $buffer_add_char($buf, 37);
              $bprint_ignored_flag($buf, $ign_flag__0);
              $bprint_pad_opt($buf, $width_opt);
              $bprint_char_set($buf, $char_set);
              $fmt__0 = $fmt__21;
              $ign_flag__0 = 0;
              continue;
            // FALLTHROUGH
            case 21:
              $fmt__22 = $fmt__0[2];
              $counter = $fmt__0[1];
              $buffer_add_char($buf, 37);
              $bprint_ignored_flag($buf, $ign_flag__0);
              $buffer_add_char($buf, $char_of_counter($counter));
              $fmt__0 = $fmt__22;
              $ign_flag__0 = 0;
              continue;
            // FALLTHROUGH
            case 22:
              $fmt__23 = $fmt__0[1];
              $buffer_add_char($buf, 37);
              $bprint_ignored_flag($buf, $ign_flag__0);
              $bprint_string_literal($buf, $cst_0c);
              $fmt__0 = $fmt__23;
              $ign_flag__0 = 0;
              continue;
            // FALLTHROUGH
            case 23:
              $rest = $fmt__0[2];
              $ign = $fmt__0[1];
              $match = $param_format_of_ignored_format($ign, $rest);
              $fmt__24 = $match[1];
              $fmt__0 = $fmt__24;
              $ign_flag__0 = 1;
              continue;
            // FALLTHROUGH
            default:
              $rest__0 = $fmt__0[3];
              $arity = $fmt__0[1];
              $ep = $int_of_custom_arity->contents($arity);
              $eo = 1;
              if (! ($ep < 1)) {
                $i = $eo;
                for (;;) {
                  $buffer_add_char($buf, 37);
                  $bprint_ignored_flag($buf, $ign_flag__0);
                  $buffer_add_char($buf, 63);
                  $eq = (int) ($i + 1);
                  if ($ep !== $i) {$i = $eq;continue;}
                  break;
                }
                if ($continue_counter > 0) {
                  $continue_counter -= 1;
                  break;
                }
                else if ($continue_counter === 0) {
                  $continue_counter = null;
                  continue;
                }
              }
              $fmt__0 = $rest__0;
              $ign_flag__0 = 0;
              continue;
            }
        }
      };
      return $fmtiter($fmt, 0);
    };
    $string_of_fmt = function(dynamic $fmt) use ($bprint_fmt,$buffer_contents,$buffer_create) {
      $buf = $buffer_create(16);
      $bprint_fmt($buf, $fmt);
      return $buffer_contents($buf);
    };
    $symm->contents = function(dynamic $param) use ($is_int,$symm) {
      if ($is_int($param)) {return 0;}
      else {
        switch($param[0]) {
          // FALLTHROUGH
          case 0:
            $rest = $param[1];
            return Vector{0, $symm->contents($rest)};
          // FALLTHROUGH
          case 1:
            $rest__0 = $param[1];
            return Vector{1, $symm->contents($rest__0)};
          // FALLTHROUGH
          case 2:
            $rest__1 = $param[1];
            return Vector{2, $symm->contents($rest__1)};
          // FALLTHROUGH
          case 3:
            $rest__2 = $param[1];
            return Vector{3, $symm->contents($rest__2)};
          // FALLTHROUGH
          case 4:
            $rest__3 = $param[1];
            return Vector{4, $symm->contents($rest__3)};
          // FALLTHROUGH
          case 5:
            $rest__4 = $param[1];
            return Vector{5, $symm->contents($rest__4)};
          // FALLTHROUGH
          case 6:
            $rest__5 = $param[1];
            return Vector{6, $symm->contents($rest__5)};
          // FALLTHROUGH
          case 7:
            $rest__6 = $param[1];
            return Vector{7, $symm->contents($rest__6)};
          // FALLTHROUGH
          case 8:
            $rest__7 = $param[2];
            $ty = $param[1];
            return Vector{8, $ty, $symm->contents($rest__7)};
          // FALLTHROUGH
          case 9:
            $rest__8 = $param[3];
            $ty2 = $param[2];
            $ty1 = $param[1];
            return Vector{9, $ty2, $ty1, $symm->contents($rest__8)};
          // FALLTHROUGH
          case 10:
            $rest__9 = $param[1];
            return Vector{10, $symm->contents($rest__9)};
          // FALLTHROUGH
          case 11:
            $rest__10 = $param[1];
            return Vector{11, $symm->contents($rest__10)};
          // FALLTHROUGH
          case 12:
            $rest__11 = $param[1];
            return Vector{12, $symm->contents($rest__11)};
          // FALLTHROUGH
          case 13:
            $rest__12 = $param[1];
            return Vector{13, $symm->contents($rest__12)};
          // FALLTHROUGH
          default:
            $rest__13 = $param[1];
            return Vector{14, $symm->contents($rest__13)};
          }
      }
    };
    $fmtty_rel_det->contents = function(dynamic $param) use ($call1,$fmtty_rel_det,$is_int,$symm,$trans) {
      if ($is_int($param)) {
        $d1 = function(dynamic $param) {return 0;};
        $d2 = function(dynamic $param) {return 0;};
        $d3 = function(dynamic $param) {return 0;};
        return Vector{0, function(dynamic $param) {return 0;}, $d3, $d2, $d1};
      }
      else {
        switch($param[0]) {
          // FALLTHROUGH
          case 0:
            $rest = $param[1];
            $match = $fmtty_rel_det->contents($rest);
            $de = $match[4];
            $ed = $match[3];
            $af = $match[2];
            $fa = $match[1];
            $d4 = function(dynamic $param) use ($af,$call1) {
              $call1($af, 0);
              return 0;
            };
            return Vector{
              0,
              function(dynamic $param) use ($call1,$fa) {
                $call1($fa, 0);
                return 0;
              },
              $d4,
              $ed,
              $de
            };
          // FALLTHROUGH
          case 1:
            $rest__0 = $param[1];
            $match__0 = $fmtty_rel_det->contents($rest__0);
            $de__0 = $match__0[4];
            $ed__0 = $match__0[3];
            $af__0 = $match__0[2];
            $fa__0 = $match__0[1];
            $d5 = function(dynamic $param) use ($af__0,$call1) {
              $call1($af__0, 0);
              return 0;
            };
            return Vector{
              0,
              function(dynamic $param) use ($call1,$fa__0) {
                $call1($fa__0, 0);
                return 0;
              },
              $d5,
              $ed__0,
              $de__0
            };
          // FALLTHROUGH
          case 2:
            $rest__1 = $param[1];
            $match__1 = $fmtty_rel_det->contents($rest__1);
            $de__1 = $match__1[4];
            $ed__1 = $match__1[3];
            $af__1 = $match__1[2];
            $fa__1 = $match__1[1];
            $d6 = function(dynamic $param) use ($af__1,$call1) {
              $call1($af__1, 0);
              return 0;
            };
            return Vector{
              0,
              function(dynamic $param) use ($call1,$fa__1) {
                $call1($fa__1, 0);
                return 0;
              },
              $d6,
              $ed__1,
              $de__1
            };
          // FALLTHROUGH
          case 3:
            $rest__2 = $param[1];
            $match__2 = $fmtty_rel_det->contents($rest__2);
            $de__2 = $match__2[4];
            $ed__2 = $match__2[3];
            $af__2 = $match__2[2];
            $fa__2 = $match__2[1];
            $d7 = function(dynamic $param) use ($af__2,$call1) {
              $call1($af__2, 0);
              return 0;
            };
            return Vector{
              0,
              function(dynamic $param) use ($call1,$fa__2) {
                $call1($fa__2, 0);
                return 0;
              },
              $d7,
              $ed__2,
              $de__2
            };
          // FALLTHROUGH
          case 4:
            $rest__3 = $param[1];
            $match__3 = $fmtty_rel_det->contents($rest__3);
            $de__3 = $match__3[4];
            $ed__3 = $match__3[3];
            $af__3 = $match__3[2];
            $fa__3 = $match__3[1];
            $d8 = function(dynamic $param) use ($af__3,$call1) {
              $call1($af__3, 0);
              return 0;
            };
            return Vector{
              0,
              function(dynamic $param) use ($call1,$fa__3) {
                $call1($fa__3, 0);
                return 0;
              },
              $d8,
              $ed__3,
              $de__3
            };
          // FALLTHROUGH
          case 5:
            $rest__4 = $param[1];
            $match__4 = $fmtty_rel_det->contents($rest__4);
            $de__4 = $match__4[4];
            $ed__4 = $match__4[3];
            $af__4 = $match__4[2];
            $fa__4 = $match__4[1];
            $d9 = function(dynamic $param) use ($af__4,$call1) {
              $call1($af__4, 0);
              return 0;
            };
            return Vector{
              0,
              function(dynamic $param) use ($call1,$fa__4) {
                $call1($fa__4, 0);
                return 0;
              },
              $d9,
              $ed__4,
              $de__4
            };
          // FALLTHROUGH
          case 6:
            $rest__5 = $param[1];
            $match__5 = $fmtty_rel_det->contents($rest__5);
            $de__5 = $match__5[4];
            $ed__5 = $match__5[3];
            $af__5 = $match__5[2];
            $fa__5 = $match__5[1];
            $d_ = function(dynamic $param) use ($af__5,$call1) {
              $call1($af__5, 0);
              return 0;
            };
            return Vector{
              0,
              function(dynamic $param) use ($call1,$fa__5) {
                $call1($fa__5, 0);
                return 0;
              },
              $d_,
              $ed__5,
              $de__5
            };
          // FALLTHROUGH
          case 7:
            $rest__6 = $param[1];
            $match__6 = $fmtty_rel_det->contents($rest__6);
            $de__6 = $match__6[4];
            $ed__6 = $match__6[3];
            $af__6 = $match__6[2];
            $fa__6 = $match__6[1];
            $ea = function(dynamic $param) use ($af__6,$call1) {
              $call1($af__6, 0);
              return 0;
            };
            return Vector{
              0,
              function(dynamic $param) use ($call1,$fa__6) {
                $call1($fa__6, 0);
                return 0;
              },
              $ea,
              $ed__6,
              $de__6
            };
          // FALLTHROUGH
          case 8:
            $rest__7 = $param[2];
            $match__7 = $fmtty_rel_det->contents($rest__7);
            $de__7 = $match__7[4];
            $ed__7 = $match__7[3];
            $af__7 = $match__7[2];
            $fa__7 = $match__7[1];
            $eb = function(dynamic $param) use ($af__7,$call1) {
              $call1($af__7, 0);
              return 0;
            };
            return Vector{
              0,
              function(dynamic $param) use ($call1,$fa__7) {
                $call1($fa__7, 0);
                return 0;
              },
              $eb,
              $ed__7,
              $de__7
            };
          // FALLTHROUGH
          case 9:
            $rest__8 = $param[3];
            $ty2 = $param[2];
            $ty1 = $param[1];
            $match__8 = $fmtty_rel_det->contents($rest__8);
            $de__8 = $match__8[4];
            $ed__8 = $match__8[3];
            $af__8 = $match__8[2];
            $fa__8 = $match__8[1];
            $ty = $trans->contents($symm->contents($ty1), $ty2);
            $match__9 = $fmtty_rel_det->contents($ty);
            $jd = $match__9[4];
            $dj = $match__9[3];
            $ga = $match__9[2];
            $ag = $match__9[1];
            $ec = function(dynamic $param) use ($call1,$de__8,$jd) {
              $call1($jd, 0);
              $call1($de__8, 0);
              return 0;
            };
            $ed = function(dynamic $param) use ($call1,$dj,$ed__8) {
              $call1($ed__8, 0);
              $call1($dj, 0);
              return 0;
            };
            $ee = function(dynamic $param) use ($af__8,$call1,$ga) {
              $call1($ga, 0);
              $call1($af__8, 0);
              return 0;
            };
            return Vector{
              0,
              function(dynamic $param) use ($ag,$call1,$fa__8) {
                $call1($fa__8, 0);
                $call1($ag, 0);
                return 0;
              },
              $ee,
              $ed,
              $ec
            };
          // FALLTHROUGH
          case 10:
            $rest__9 = $param[1];
            $match__10 = $fmtty_rel_det->contents($rest__9);
            $de__9 = $match__10[4];
            $ed__9 = $match__10[3];
            $af__9 = $match__10[2];
            $fa__9 = $match__10[1];
            $ef = function(dynamic $param) use ($af__9,$call1) {
              $call1($af__9, 0);
              return 0;
            };
            return Vector{
              0,
              function(dynamic $param) use ($call1,$fa__9) {
                $call1($fa__9, 0);
                return 0;
              },
              $ef,
              $ed__9,
              $de__9
            };
          // FALLTHROUGH
          case 11:
            $rest__10 = $param[1];
            $match__11 = $fmtty_rel_det->contents($rest__10);
            $de__10 = $match__11[4];
            $ed__10 = $match__11[3];
            $af__10 = $match__11[2];
            $fa__10 = $match__11[1];
            $eg = function(dynamic $param) use ($af__10,$call1) {
              $call1($af__10, 0);
              return 0;
            };
            return Vector{
              0,
              function(dynamic $param) use ($call1,$fa__10) {
                $call1($fa__10, 0);
                return 0;
              },
              $eg,
              $ed__10,
              $de__10
            };
          // FALLTHROUGH
          case 12:
            $rest__11 = $param[1];
            $match__12 = $fmtty_rel_det->contents($rest__11);
            $de__11 = $match__12[4];
            $ed__11 = $match__12[3];
            $af__11 = $match__12[2];
            $fa__11 = $match__12[1];
            $eh = function(dynamic $param) use ($af__11,$call1) {
              $call1($af__11, 0);
              return 0;
            };
            return Vector{
              0,
              function(dynamic $param) use ($call1,$fa__11) {
                $call1($fa__11, 0);
                return 0;
              },
              $eh,
              $ed__11,
              $de__11
            };
          // FALLTHROUGH
          case 13:
            $rest__12 = $param[1];
            $match__13 = $fmtty_rel_det->contents($rest__12);
            $de__12 = $match__13[4];
            $ed__12 = $match__13[3];
            $af__12 = $match__13[2];
            $fa__12 = $match__13[1];
            $ei = function(dynamic $param) use ($call1,$de__12) {
              $call1($de__12, 0);
              return 0;
            };
            $ej = function(dynamic $param) use ($call1,$ed__12) {
              $call1($ed__12, 0);
              return 0;
            };
            $ek = function(dynamic $param) use ($af__12,$call1) {
              $call1($af__12, 0);
              return 0;
            };
            return Vector{
              0,
              function(dynamic $param) use ($call1,$fa__12) {
                $call1($fa__12, 0);
                return 0;
              },
              $ek,
              $ej,
              $ei
            };
          // FALLTHROUGH
          default:
            $rest__13 = $param[1];
            $match__14 = $fmtty_rel_det->contents($rest__13);
            $de__13 = $match__14[4];
            $ed__13 = $match__14[3];
            $af__13 = $match__14[2];
            $fa__13 = $match__14[1];
            $el = function(dynamic $param) use ($call1,$de__13) {
              $call1($de__13, 0);
              return 0;
            };
            $em = function(dynamic $param) use ($call1,$ed__13) {
              $call1($ed__13, 0);
              return 0;
            };
            $en = function(dynamic $param) use ($af__13,$call1) {
              $call1($af__13, 0);
              return 0;
            };
            return Vector{
              0,
              function(dynamic $param) use ($call1,$fa__13) {
                $call1($fa__13, 0);
                return 0;
              },
              $en,
              $em,
              $el
            };
          }
      }
    };
    $trans->contents = function(dynamic $ty1, dynamic $match) use ($Assert_failure,$a,$b,$c,$call1,$d,$e,$f,$fmtty_rel_det,$g,$h,$i,$is_int,$j,$k,$l,$m,$n,$o,$p,$runtime,$symm,$trans) {
      if ($is_int($ty1)) {
        if ($is_int($match)) {return 0;}
        else {
          switch($match[0]) {
            // FALLTHROUGH
            case 10:
              $switch__0 = 0;
              break;
            // FALLTHROUGH
            case 11:
              $switch__0 = 1;
              break;
            // FALLTHROUGH
            case 12:
              $switch__0 = 2;
              break;
            // FALLTHROUGH
            case 13:
              $switch__0 = 3;
              break;
            // FALLTHROUGH
            case 14:
              $switch__0 = 4;
              break;
            // FALLTHROUGH
            case 8:
              $switch__0 = 5;
              break;
            // FALLTHROUGH
            case 9:
              $switch__0 = 6;
              break;
            // FALLTHROUGH
            default:
              throw $runtime["caml_wrap_thrown_exception"](Vector{0, $Assert_failure, $a}) as \Throwable;
            }
        }
      }
      else {
        switch($ty1[0]) {
          // FALLTHROUGH
          case 0:
            $dI = $ty1[1];
            if ($is_int($match)) {$switch__1 = 1;}
            else {
              switch($match[0]) {
                // FALLTHROUGH
                case 0:
                  $rest2 = $match[1];
                  return Vector{0, $trans->contents($dI, $rest2)};
                // FALLTHROUGH
                case 8:
                  $switch__0 = 5;
                  $switch__1 = 0;
                  break;
                // FALLTHROUGH
                case 9:
                  $switch__0 = 6;
                  $switch__1 = 0;
                  break;
                // FALLTHROUGH
                case 10:
                  $switch__0 = 0;
                  $switch__1 = 0;
                  break;
                // FALLTHROUGH
                case 11:
                  $switch__0 = 1;
                  $switch__1 = 0;
                  break;
                // FALLTHROUGH
                case 12:
                  $switch__0 = 2;
                  $switch__1 = 0;
                  break;
                // FALLTHROUGH
                case 13:
                  $switch__0 = 3;
                  $switch__1 = 0;
                  break;
                // FALLTHROUGH
                case 14:
                  $switch__0 = 4;
                  $switch__1 = 0;
                  break;
                // FALLTHROUGH
                default:
                  $switch__1 = 1;
                }
            }
            if ($switch__1) {$switch__0 = 7;}
            break;
          // FALLTHROUGH
          case 1:
            $dJ = $ty1[1];
            if ($is_int($match)) {$switch__2 = 1;}
            else {
              switch($match[0]) {
                // FALLTHROUGH
                case 1:
                  $rest2__0 = $match[1];
                  return Vector{1, $trans->contents($dJ, $rest2__0)};
                // FALLTHROUGH
                case 8:
                  $switch__0 = 5;
                  $switch__2 = 0;
                  break;
                // FALLTHROUGH
                case 9:
                  $switch__0 = 6;
                  $switch__2 = 0;
                  break;
                // FALLTHROUGH
                case 10:
                  $switch__0 = 0;
                  $switch__2 = 0;
                  break;
                // FALLTHROUGH
                case 11:
                  $switch__0 = 1;
                  $switch__2 = 0;
                  break;
                // FALLTHROUGH
                case 12:
                  $switch__0 = 2;
                  $switch__2 = 0;
                  break;
                // FALLTHROUGH
                case 13:
                  $switch__0 = 3;
                  $switch__2 = 0;
                  break;
                // FALLTHROUGH
                case 14:
                  $switch__0 = 4;
                  $switch__2 = 0;
                  break;
                // FALLTHROUGH
                default:
                  $switch__2 = 1;
                }
            }
            if ($switch__2) {$switch__0 = 7;}
            break;
          // FALLTHROUGH
          case 2:
            $dK = $ty1[1];
            if ($is_int($match)) {$switch__3 = 1;}
            else {
              switch($match[0]) {
                // FALLTHROUGH
                case 2:
                  $rest2__1 = $match[1];
                  return Vector{2, $trans->contents($dK, $rest2__1)};
                // FALLTHROUGH
                case 8:
                  $switch__0 = 5;
                  $switch__3 = 0;
                  break;
                // FALLTHROUGH
                case 9:
                  $switch__0 = 6;
                  $switch__3 = 0;
                  break;
                // FALLTHROUGH
                case 10:
                  $switch__0 = 0;
                  $switch__3 = 0;
                  break;
                // FALLTHROUGH
                case 11:
                  $switch__0 = 1;
                  $switch__3 = 0;
                  break;
                // FALLTHROUGH
                case 12:
                  $switch__0 = 2;
                  $switch__3 = 0;
                  break;
                // FALLTHROUGH
                case 13:
                  $switch__0 = 3;
                  $switch__3 = 0;
                  break;
                // FALLTHROUGH
                case 14:
                  $switch__0 = 4;
                  $switch__3 = 0;
                  break;
                // FALLTHROUGH
                default:
                  $switch__3 = 1;
                }
            }
            if ($switch__3) {$switch__0 = 7;}
            break;
          // FALLTHROUGH
          case 3:
            $dL = $ty1[1];
            if ($is_int($match)) {$switch__4 = 1;}
            else {
              switch($match[0]) {
                // FALLTHROUGH
                case 3:
                  $rest2__2 = $match[1];
                  return Vector{3, $trans->contents($dL, $rest2__2)};
                // FALLTHROUGH
                case 8:
                  $switch__0 = 5;
                  $switch__4 = 0;
                  break;
                // FALLTHROUGH
                case 9:
                  $switch__0 = 6;
                  $switch__4 = 0;
                  break;
                // FALLTHROUGH
                case 10:
                  $switch__0 = 0;
                  $switch__4 = 0;
                  break;
                // FALLTHROUGH
                case 11:
                  $switch__0 = 1;
                  $switch__4 = 0;
                  break;
                // FALLTHROUGH
                case 12:
                  $switch__0 = 2;
                  $switch__4 = 0;
                  break;
                // FALLTHROUGH
                case 13:
                  $switch__0 = 3;
                  $switch__4 = 0;
                  break;
                // FALLTHROUGH
                case 14:
                  $switch__0 = 4;
                  $switch__4 = 0;
                  break;
                // FALLTHROUGH
                default:
                  $switch__4 = 1;
                }
            }
            if ($switch__4) {$switch__0 = 7;}
            break;
          // FALLTHROUGH
          case 4:
            $dM = $ty1[1];
            if ($is_int($match)) {$switch__5 = 1;}
            else {
              switch($match[0]) {
                // FALLTHROUGH
                case 4:
                  $rest2__3 = $match[1];
                  return Vector{4, $trans->contents($dM, $rest2__3)};
                // FALLTHROUGH
                case 8:
                  $switch__0 = 5;
                  $switch__5 = 0;
                  break;
                // FALLTHROUGH
                case 9:
                  $switch__0 = 6;
                  $switch__5 = 0;
                  break;
                // FALLTHROUGH
                case 10:
                  $switch__0 = 0;
                  $switch__5 = 0;
                  break;
                // FALLTHROUGH
                case 11:
                  $switch__0 = 1;
                  $switch__5 = 0;
                  break;
                // FALLTHROUGH
                case 12:
                  $switch__0 = 2;
                  $switch__5 = 0;
                  break;
                // FALLTHROUGH
                case 13:
                  $switch__0 = 3;
                  $switch__5 = 0;
                  break;
                // FALLTHROUGH
                case 14:
                  $switch__0 = 4;
                  $switch__5 = 0;
                  break;
                // FALLTHROUGH
                default:
                  $switch__5 = 1;
                }
            }
            if ($switch__5) {$switch__0 = 7;}
            break;
          // FALLTHROUGH
          case 5:
            $dN = $ty1[1];
            if ($is_int($match)) {$switch__6 = 1;}
            else {
              switch($match[0]) {
                // FALLTHROUGH
                case 5:
                  $rest2__4 = $match[1];
                  return Vector{5, $trans->contents($dN, $rest2__4)};
                // FALLTHROUGH
                case 8:
                  $switch__0 = 5;
                  $switch__6 = 0;
                  break;
                // FALLTHROUGH
                case 9:
                  $switch__0 = 6;
                  $switch__6 = 0;
                  break;
                // FALLTHROUGH
                case 10:
                  $switch__0 = 0;
                  $switch__6 = 0;
                  break;
                // FALLTHROUGH
                case 11:
                  $switch__0 = 1;
                  $switch__6 = 0;
                  break;
                // FALLTHROUGH
                case 12:
                  $switch__0 = 2;
                  $switch__6 = 0;
                  break;
                // FALLTHROUGH
                case 13:
                  $switch__0 = 3;
                  $switch__6 = 0;
                  break;
                // FALLTHROUGH
                case 14:
                  $switch__0 = 4;
                  $switch__6 = 0;
                  break;
                // FALLTHROUGH
                default:
                  $switch__6 = 1;
                }
            }
            if ($switch__6) {$switch__0 = 7;}
            break;
          // FALLTHROUGH
          case 6:
            $dO = $ty1[1];
            if ($is_int($match)) {$switch__7 = 1;}
            else {
              switch($match[0]) {
                // FALLTHROUGH
                case 6:
                  $rest2__5 = $match[1];
                  return Vector{6, $trans->contents($dO, $rest2__5)};
                // FALLTHROUGH
                case 8:
                  $switch__0 = 5;
                  $switch__7 = 0;
                  break;
                // FALLTHROUGH
                case 9:
                  $switch__0 = 6;
                  $switch__7 = 0;
                  break;
                // FALLTHROUGH
                case 10:
                  $switch__0 = 0;
                  $switch__7 = 0;
                  break;
                // FALLTHROUGH
                case 11:
                  $switch__0 = 1;
                  $switch__7 = 0;
                  break;
                // FALLTHROUGH
                case 12:
                  $switch__0 = 2;
                  $switch__7 = 0;
                  break;
                // FALLTHROUGH
                case 13:
                  $switch__0 = 3;
                  $switch__7 = 0;
                  break;
                // FALLTHROUGH
                case 14:
                  $switch__0 = 4;
                  $switch__7 = 0;
                  break;
                // FALLTHROUGH
                default:
                  $switch__7 = 1;
                }
            }
            if ($switch__7) {$switch__0 = 7;}
            break;
          // FALLTHROUGH
          case 7:
            $dP = $ty1[1];
            if ($is_int($match)) {$switch__8 = 1;}
            else {
              switch($match[0]) {
                // FALLTHROUGH
                case 7:
                  $rest2__6 = $match[1];
                  return Vector{7, $trans->contents($dP, $rest2__6)};
                // FALLTHROUGH
                case 8:
                  $switch__0 = 5;
                  $switch__8 = 0;
                  break;
                // FALLTHROUGH
                case 9:
                  $switch__0 = 6;
                  $switch__8 = 0;
                  break;
                // FALLTHROUGH
                case 10:
                  $switch__0 = 0;
                  $switch__8 = 0;
                  break;
                // FALLTHROUGH
                case 11:
                  $switch__0 = 1;
                  $switch__8 = 0;
                  break;
                // FALLTHROUGH
                case 12:
                  $switch__0 = 2;
                  $switch__8 = 0;
                  break;
                // FALLTHROUGH
                case 13:
                  $switch__0 = 3;
                  $switch__8 = 0;
                  break;
                // FALLTHROUGH
                case 14:
                  $switch__0 = 4;
                  $switch__8 = 0;
                  break;
                // FALLTHROUGH
                default:
                  $switch__8 = 1;
                }
            }
            if ($switch__8) {$switch__0 = 7;}
            break;
          // FALLTHROUGH
          case 8:
            $dQ = $ty1[2];
            $dR = $ty1[1];
            if ($is_int($match)) {$switch__9 = 1;}
            else {
              switch($match[0]) {
                // FALLTHROUGH
                case 8:
                  $rest2__7 = $match[2];
                  $ty2 = $match[1];
                  $dS = $trans->contents($dQ, $rest2__7);
                  return Vector{8, $trans->contents($dR, $ty2), $dS};
                // FALLTHROUGH
                case 10:
                  $switch__0 = 0;
                  $switch__9 = 0;
                  break;
                // FALLTHROUGH
                case 11:
                  $switch__0 = 1;
                  $switch__9 = 0;
                  break;
                // FALLTHROUGH
                case 12:
                  $switch__0 = 2;
                  $switch__9 = 0;
                  break;
                // FALLTHROUGH
                case 13:
                  $switch__0 = 3;
                  $switch__9 = 0;
                  break;
                // FALLTHROUGH
                case 14:
                  $switch__0 = 4;
                  $switch__9 = 0;
                  break;
                // FALLTHROUGH
                default:
                  $switch__9 = 1;
                }
            }
            if ($switch__9) {
              throw $runtime["caml_wrap_thrown_exception"](Vector{0, $Assert_failure, $j}) as \Throwable;
            }
            break;
          // FALLTHROUGH
          case 9:
            $dT = $ty1[3];
            $dU = $ty1[2];
            $dV = $ty1[1];
            if ($is_int($match)) {$switch__10 = 1;}
            else {
              switch($match[0]) {
                // FALLTHROUGH
                case 8:
                  $switch__0 = 5;
                  $switch__10 = 0;
                  break;
                // FALLTHROUGH
                case 9:
                  $rest2__8 = $match[3];
                  $ty22 = $match[2];
                  $ty21 = $match[1];
                  $ty = $trans->contents($symm->contents($dU), $ty21);
                  $match__0 = $fmtty_rel_det->contents($ty);
                  $f4 = $match__0[4];
                  $f2 = $match__0[2];
                  $call1($f2, 0);
                  $call1($f4, 0);
                  return Vector{
                    9,
                    $dV,
                    $ty22,
                    $trans->contents($dT, $rest2__8)
                  };
                // FALLTHROUGH
                case 10:
                  $switch__0 = 0;
                  $switch__10 = 0;
                  break;
                // FALLTHROUGH
                case 11:
                  $switch__0 = 1;
                  $switch__10 = 0;
                  break;
                // FALLTHROUGH
                case 12:
                  $switch__0 = 2;
                  $switch__10 = 0;
                  break;
                // FALLTHROUGH
                case 13:
                  $switch__0 = 3;
                  $switch__10 = 0;
                  break;
                // FALLTHROUGH
                case 14:
                  $switch__0 = 4;
                  $switch__10 = 0;
                  break;
                // FALLTHROUGH
                default:
                  $switch__10 = 1;
                }
            }
            if ($switch__10) {
              throw $runtime["caml_wrap_thrown_exception"](Vector{0, $Assert_failure, $k}) as \Throwable;
            }
            break;
          // FALLTHROUGH
          case 10:
            $dW = $ty1[1];
            if (! $is_int($match) && 10 === $match[0]) {
              $rest2__9 = $match[1];
              return Vector{10, $trans->contents($dW, $rest2__9)};
            }
            throw $runtime["caml_wrap_thrown_exception"](Vector{0, $Assert_failure, $l}) as \Throwable;
          // FALLTHROUGH
          case 11:
            $dX = $ty1[1];
            if ($is_int($match)) {$switch__11 = 1;}
            else {
              switch($match[0]) {
                // FALLTHROUGH
                case 10:
                  $switch__0 = 0;
                  $switch__11 = 0;
                  break;
                // FALLTHROUGH
                case 11:
                  $rest2__10 = $match[1];
                  return Vector{11, $trans->contents($dX, $rest2__10)};
                // FALLTHROUGH
                default:
                  $switch__11 = 1;
                }
            }
            if ($switch__11) {
              throw $runtime["caml_wrap_thrown_exception"](Vector{0, $Assert_failure, $m}) as \Throwable;
            }
            break;
          // FALLTHROUGH
          case 12:
            $dY = $ty1[1];
            if ($is_int($match)) {$switch__12 = 1;}
            else {
              switch($match[0]) {
                // FALLTHROUGH
                case 10:
                  $switch__0 = 0;
                  $switch__12 = 0;
                  break;
                // FALLTHROUGH
                case 11:
                  $switch__0 = 1;
                  $switch__12 = 0;
                  break;
                // FALLTHROUGH
                case 12:
                  $rest2__11 = $match[1];
                  return Vector{12, $trans->contents($dY, $rest2__11)};
                // FALLTHROUGH
                default:
                  $switch__12 = 1;
                }
            }
            if ($switch__12) {
              throw $runtime["caml_wrap_thrown_exception"](Vector{0, $Assert_failure, $n}) as \Throwable;
            }
            break;
          // FALLTHROUGH
          case 13:
            $dZ = $ty1[1];
            if ($is_int($match)) {$switch__13 = 1;}
            else {
              switch($match[0]) {
                // FALLTHROUGH
                case 10:
                  $switch__0 = 0;
                  $switch__13 = 0;
                  break;
                // FALLTHROUGH
                case 11:
                  $switch__0 = 1;
                  $switch__13 = 0;
                  break;
                // FALLTHROUGH
                case 12:
                  $switch__0 = 2;
                  $switch__13 = 0;
                  break;
                // FALLTHROUGH
                case 13:
                  $rest2__12 = $match[1];
                  return Vector{13, $trans->contents($dZ, $rest2__12)};
                // FALLTHROUGH
                default:
                  $switch__13 = 1;
                }
            }
            if ($switch__13) {
              throw $runtime["caml_wrap_thrown_exception"](Vector{0, $Assert_failure, $o}) as \Throwable;
            }
            break;
          // FALLTHROUGH
          default:
            $d0 = $ty1[1];
            if ($is_int($match)) {$switch__14 = 1;}
            else {
              switch($match[0]) {
                // FALLTHROUGH
                case 10:
                  $switch__0 = 0;
                  $switch__14 = 0;
                  break;
                // FALLTHROUGH
                case 11:
                  $switch__0 = 1;
                  $switch__14 = 0;
                  break;
                // FALLTHROUGH
                case 12:
                  $switch__0 = 2;
                  $switch__14 = 0;
                  break;
                // FALLTHROUGH
                case 13:
                  $switch__0 = 3;
                  $switch__14 = 0;
                  break;
                // FALLTHROUGH
                case 14:
                  $rest2__13 = $match[1];
                  return Vector{14, $trans->contents($d0, $rest2__13)};
                // FALLTHROUGH
                default:
                  $switch__14 = 1;
                }
            }
            if ($switch__14) {
              throw $runtime["caml_wrap_thrown_exception"](Vector{0, $Assert_failure, $p}) as \Throwable;
            }
          }
      }
      switch($switch__0) {
        // FALLTHROUGH
        case 0:
          throw $runtime["caml_wrap_thrown_exception"](Vector{0, $Assert_failure, $d}) as \Throwable;
        // FALLTHROUGH
        case 1:
          throw $runtime["caml_wrap_thrown_exception"](Vector{0, $Assert_failure, $e}) as \Throwable;
        // FALLTHROUGH
        case 2:
          throw $runtime["caml_wrap_thrown_exception"](Vector{0, $Assert_failure, $f}) as \Throwable;
        // FALLTHROUGH
        case 3:
          throw $runtime["caml_wrap_thrown_exception"](Vector{0, $Assert_failure, $g}) as \Throwable;
        // FALLTHROUGH
        case 4:
          throw $runtime["caml_wrap_thrown_exception"](Vector{0, $Assert_failure, $h}) as \Throwable;
        // FALLTHROUGH
        case 5:
          throw $runtime["caml_wrap_thrown_exception"](Vector{0, $Assert_failure, $b}) as \Throwable;
        // FALLTHROUGH
        case 6:
          throw $runtime["caml_wrap_thrown_exception"](Vector{0, $Assert_failure, $c}) as \Throwable;
        // FALLTHROUGH
        default:
          throw $runtime["caml_wrap_thrown_exception"](Vector{0, $Assert_failure, $i}) as \Throwable;
        }
    };
    $fmtty_of_padding_fmtty = function(dynamic $pad, dynamic $fmtty) use ($is_int) {
      return $is_int($pad)
        ? $fmtty
        : (0 === $pad[0] ? $fmtty : (Vector{2, $fmtty}));
    };
    $fmtty_of_custom->contents = function(dynamic $arity, dynamic $fmtty) use ($fmtty_of_custom) {
      if ($arity) {
        $arity__0 = $arity[1];
        return Vector{12, $fmtty_of_custom->contents($arity__0, $fmtty)};
      }
      return $fmtty;
    };
    $fmtty_of_fmt__0 = function(dynamic $counter, dynamic $fmtty) use ($CamlinternalFormatBasics,$call2,$caml_trampoline_return,$fmtty_of_custom,$fmtty_of_fmt,$fmtty_of_formatting_gen,$fmtty_of_ignored_format,$fmtty_of_padding_fmtty,$fmtty_of_precision_fmtty,$is_int) {
      $fmtty__0 = $fmtty;
      for (;;) if (
        $is_int($fmtty__0)
      ) {return 0;}
      else {
        switch($fmtty__0[0]) {
          // FALLTHROUGH
          case 0:
            $rest = $fmtty__0[1];
            return Vector{0, $fmtty_of_fmt->contents($rest)};
          // FALLTHROUGH
          case 1:
            $rest__0 = $fmtty__0[1];
            return Vector{0, $fmtty_of_fmt->contents($rest__0)};
          // FALLTHROUGH
          case 2:
            $rest__1 = $fmtty__0[2];
            $pad = $fmtty__0[1];
            return $fmtty_of_padding_fmtty(
              $pad,
              Vector{1, $fmtty_of_fmt->contents($rest__1)}
            );
          // FALLTHROUGH
          case 3:
            $rest__2 = $fmtty__0[2];
            $pad__0 = $fmtty__0[1];
            return $fmtty_of_padding_fmtty(
              $pad__0,
              Vector{1, $fmtty_of_fmt->contents($rest__2)}
            );
          // FALLTHROUGH
          case 4:
            $rest__3 = $fmtty__0[4];
            $prec = $fmtty__0[3];
            $pad__1 = $fmtty__0[2];
            $ty_rest = $fmtty_of_fmt->contents($rest__3);
            $prec_ty = $fmtty_of_precision_fmtty->contents(
              $prec,
              Vector{2, $ty_rest}
            );
            return $fmtty_of_padding_fmtty($pad__1, $prec_ty);
          // FALLTHROUGH
          case 5:
            $rest__4 = $fmtty__0[4];
            $prec__0 = $fmtty__0[3];
            $pad__2 = $fmtty__0[2];
            $ty_rest__0 = $fmtty_of_fmt->contents($rest__4);
            $prec_ty__0 = $fmtty_of_precision_fmtty->contents(
              $prec__0,
              Vector{3, $ty_rest__0}
            );
            return $fmtty_of_padding_fmtty($pad__2, $prec_ty__0);
          // FALLTHROUGH
          case 6:
            $rest__5 = $fmtty__0[4];
            $prec__1 = $fmtty__0[3];
            $pad__3 = $fmtty__0[2];
            $ty_rest__1 = $fmtty_of_fmt->contents($rest__5);
            $prec_ty__1 = $fmtty_of_precision_fmtty->contents(
              $prec__1,
              Vector{4, $ty_rest__1}
            );
            return $fmtty_of_padding_fmtty($pad__3, $prec_ty__1);
          // FALLTHROUGH
          case 7:
            $rest__6 = $fmtty__0[4];
            $prec__2 = $fmtty__0[3];
            $pad__4 = $fmtty__0[2];
            $ty_rest__2 = $fmtty_of_fmt->contents($rest__6);
            $prec_ty__2 = $fmtty_of_precision_fmtty->contents(
              $prec__2,
              Vector{5, $ty_rest__2}
            );
            return $fmtty_of_padding_fmtty($pad__4, $prec_ty__2);
          // FALLTHROUGH
          case 8:
            $rest__7 = $fmtty__0[4];
            $prec__3 = $fmtty__0[3];
            $pad__5 = $fmtty__0[2];
            $ty_rest__3 = $fmtty_of_fmt->contents($rest__7);
            $prec_ty__3 = $fmtty_of_precision_fmtty->contents(
              $prec__3,
              Vector{6, $ty_rest__3}
            );
            return $fmtty_of_padding_fmtty($pad__5, $prec_ty__3);
          // FALLTHROUGH
          case 9:
            $rest__8 = $fmtty__0[2];
            $pad__6 = $fmtty__0[1];
            return $fmtty_of_padding_fmtty(
              $pad__6,
              Vector{7, $fmtty_of_fmt->contents($rest__8)}
            );
          // FALLTHROUGH
          case 10:
            $fmtty__1 = $fmtty__0[1];
            $fmtty__0 = $fmtty__1;
            continue;
          // FALLTHROUGH
          case 11:
            $fmtty__2 = $fmtty__0[2];
            $fmtty__0 = $fmtty__2;
            continue;
          // FALLTHROUGH
          case 12:
            $fmtty__3 = $fmtty__0[2];
            $fmtty__0 = $fmtty__3;
            continue;
          // FALLTHROUGH
          case 13:
            $rest__9 = $fmtty__0[3];
            $ty = $fmtty__0[2];
            return Vector{8, $ty, $fmtty_of_fmt->contents($rest__9)};
          // FALLTHROUGH
          case 14:
            $rest__10 = $fmtty__0[3];
            $ty__0 = $fmtty__0[2];
            return Vector{
              9,
              $ty__0,
              $ty__0,
              $fmtty_of_fmt->contents($rest__10)
            };
          // FALLTHROUGH
          case 15:
            $rest__11 = $fmtty__0[1];
            return Vector{10, $fmtty_of_fmt->contents($rest__11)};
          // FALLTHROUGH
          case 16:
            $rest__12 = $fmtty__0[1];
            return Vector{11, $fmtty_of_fmt->contents($rest__12)};
          // FALLTHROUGH
          case 17:
            $fmtty__4 = $fmtty__0[2];
            $fmtty__0 = $fmtty__4;
            continue;
          // FALLTHROUGH
          case 18:
            $rest__13 = $fmtty__0[2];
            $fmting_gen = $fmtty__0[1];
            $dG = $fmtty_of_fmt->contents($rest__13);
            $dH = $fmtty_of_formatting_gen->contents($fmting_gen);
            return $call2($CamlinternalFormatBasics[1], $dH, $dG);
          // FALLTHROUGH
          case 19:
            $rest__14 = $fmtty__0[1];
            return Vector{13, $fmtty_of_fmt->contents($rest__14)};
          // FALLTHROUGH
          case 20:
            $rest__15 = $fmtty__0[3];
            return Vector{1, $fmtty_of_fmt->contents($rest__15)};
          // FALLTHROUGH
          case 21:
            $rest__16 = $fmtty__0[2];
            return Vector{2, $fmtty_of_fmt->contents($rest__16)};
          // FALLTHROUGH
          case 22:
            $rest__17 = $fmtty__0[1];
            return Vector{0, $fmtty_of_fmt->contents($rest__17)};
          // FALLTHROUGH
          case 23:
            $rest__18 = $fmtty__0[2];
            $ign = $fmtty__0[1];
            if ($counter < 50) {
              $counter__0 = (int) ($counter + 1);
              return $fmtty_of_ignored_format->contents(
                $counter__0,
                $ign,
                $rest__18
              );
            }
            return $caml_trampoline_return(
              $fmtty_of_ignored_format->contents,
              varray[0,$ign,$rest__18]
            );
          // FALLTHROUGH
          default:
            $rest__19 = $fmtty__0[3];
            $arity = $fmtty__0[1];
            return $fmtty_of_custom->contents(
              $arity,
              $fmtty_of_fmt->contents($rest__19)
            );
          }
      }
    };
    $fmtty_of_ignored_format->contents = function
    (dynamic $counter, dynamic $ign, dynamic $fmt) use ($CamlinternalFormatBasics,$call2,$caml_trampoline_return,$fmtty_of_fmt,$fmtty_of_fmt__0,$is_int) {
      if ($is_int($ign)) {
        switch($ign) {
          // FALLTHROUGH
          case 0:
            if ($counter < 50) {
              $counter__0 = (int) ($counter + 1);
              return $fmtty_of_fmt__0($counter__0, $fmt);
            }
            return $caml_trampoline_return($fmtty_of_fmt__0, varray[0,$fmt]);
          // FALLTHROUGH
          case 1:
            if ($counter < 50) {
              $counter__1 = (int) ($counter + 1);
              return $fmtty_of_fmt__0($counter__1, $fmt);
            }
            return $caml_trampoline_return($fmtty_of_fmt__0, varray[0,$fmt]);
          // FALLTHROUGH
          case 2:
            return Vector{14, $fmtty_of_fmt->contents($fmt)};
          // FALLTHROUGH
          default:
            if ($counter < 50) {
              $counter__2 = (int) ($counter + 1);
              return $fmtty_of_fmt__0($counter__2, $fmt);
            }
            return $caml_trampoline_return($fmtty_of_fmt__0, varray[0,$fmt]);
          }
      }
      else {
        switch($ign[0]) {
          // FALLTHROUGH
          case 0:
            if ($counter < 50) {
              $counter__3 = (int) ($counter + 1);
              return $fmtty_of_fmt__0($counter__3, $fmt);
            }
            return $caml_trampoline_return($fmtty_of_fmt__0, varray[0,$fmt]);
          // FALLTHROUGH
          case 1:
            if ($counter < 50) {
              $counter__4 = (int) ($counter + 1);
              return $fmtty_of_fmt__0($counter__4, $fmt);
            }
            return $caml_trampoline_return($fmtty_of_fmt__0, varray[0,$fmt]);
          // FALLTHROUGH
          case 2:
            if ($counter < 50) {
              $counter__5 = (int) ($counter + 1);
              return $fmtty_of_fmt__0($counter__5, $fmt);
            }
            return $caml_trampoline_return($fmtty_of_fmt__0, varray[0,$fmt]);
          // FALLTHROUGH
          case 3:
            if ($counter < 50) {
              $counter__6 = (int) ($counter + 1);
              return $fmtty_of_fmt__0($counter__6, $fmt);
            }
            return $caml_trampoline_return($fmtty_of_fmt__0, varray[0,$fmt]);
          // FALLTHROUGH
          case 4:
            if ($counter < 50) {
              $counter__7 = (int) ($counter + 1);
              return $fmtty_of_fmt__0($counter__7, $fmt);
            }
            return $caml_trampoline_return($fmtty_of_fmt__0, varray[0,$fmt]);
          // FALLTHROUGH
          case 5:
            if ($counter < 50) {
              $counter__8 = (int) ($counter + 1);
              return $fmtty_of_fmt__0($counter__8, $fmt);
            }
            return $caml_trampoline_return($fmtty_of_fmt__0, varray[0,$fmt]);
          // FALLTHROUGH
          case 6:
            if ($counter < 50) {
              $counter__9 = (int) ($counter + 1);
              return $fmtty_of_fmt__0($counter__9, $fmt);
            }
            return $caml_trampoline_return($fmtty_of_fmt__0, varray[0,$fmt]);
          // FALLTHROUGH
          case 7:
            if ($counter < 50) {
              $counter__10 = (int) ($counter + 1);
              return $fmtty_of_fmt__0($counter__10, $fmt);
            }
            return $caml_trampoline_return($fmtty_of_fmt__0, varray[0,$fmt]);
          // FALLTHROUGH
          case 8:
            if ($counter < 50) {
              $counter__11 = (int) ($counter + 1);
              return $fmtty_of_fmt__0($counter__11, $fmt);
            }
            return $caml_trampoline_return($fmtty_of_fmt__0, varray[0,$fmt]);
          // FALLTHROUGH
          case 9:
            $fmtty = $ign[2];
            $dF = $fmtty_of_fmt->contents($fmt);
            return $call2($CamlinternalFormatBasics[1], $fmtty, $dF);
          // FALLTHROUGH
          case 10:
            if ($counter < 50) {
              $counter__12 = (int) ($counter + 1);
              return $fmtty_of_fmt__0($counter__12, $fmt);
            }
            return $caml_trampoline_return($fmtty_of_fmt__0, varray[0,$fmt]);
          // FALLTHROUGH
          default:
            if ($counter < 50) {
              $counter__13 = (int) ($counter + 1);
              return $fmtty_of_fmt__0($counter__13, $fmt);
            }
            return $caml_trampoline_return($fmtty_of_fmt__0, varray[0,$fmt]);
          }
      }
    };
    $fmtty_of_fmt->contents = function(dynamic $fmtty) use ($caml_trampoline,$fmtty_of_fmt__0) {
      return $caml_trampoline($fmtty_of_fmt__0(0, $fmtty));
    };
    $fmtty_of_formatting_gen->contents = function(dynamic $formatting_gen) use ($fmtty_of_fmt) {
      if (0 === $formatting_gen[0]) {
        $match = $formatting_gen[1];
        $fmt = $match[1];
        return $fmtty_of_fmt->contents($fmt);
      }
      $match__0 = $formatting_gen[1];
      $fmt__0 = $match__0[1];
      return $fmtty_of_fmt->contents($fmt__0);
    };
    $fmtty_of_precision_fmtty->contents = function
    (dynamic $prec, dynamic $fmtty) use ($is_int) {
      return $is_int($prec)
        ? 0 === $prec ? $fmtty : (Vector{2, $fmtty})
        : ($fmtty);
    };
    $Type_mismatch = Vector{
      248,
      $cst_CamlinternalFormat_Type_mismatch,
      $runtime["caml_fresh_oo_id"](0)
    };
    $type_padding = function(dynamic $pad, dynamic $match) use ($Type_mismatch,$is_int,$runtime) {
      if ($is_int($pad)) {
        return Vector{0, 0, $match};
      }
      else {
        if (0 === $pad[0]) {
          $w = $pad[2];
          $padty = $pad[1];
          return Vector{0, Vector{0, $padty, $w}, $match};
        }
        if (! $is_int($match) && 2 === $match[0]) {
          $rest = $match[1];
          $padty__0 = $pad[1];
          return Vector{0, Vector{1, $padty__0}, $rest};
        }
        throw $runtime["caml_wrap_thrown_exception"]($Type_mismatch) as \Throwable;
      }
    };
    $type_padprec = function(dynamic $pad, dynamic $prec, dynamic $fmtty) use ($Type_mismatch,$is_int,$runtime,$type_padding) {
      $match = $type_padding($pad, $fmtty);
      if ($is_int($prec)) {
        if (0 === $prec) {
          $rest = $match[2];
          $pad__0 = $match[1];
          return Vector{0, $pad__0, 0, $rest};
        }
        $dE = $match[2];
        if (! $is_int($dE) && 2 === $dE[0]) {
          $rest__0 = $dE[1];
          $pad__1 = $match[1];
          return Vector{0, $pad__1, 1, $rest__0};
        }
        throw $runtime["caml_wrap_thrown_exception"]($Type_mismatch) as \Throwable;
      }
      $rest__1 = $match[2];
      $pad__2 = $match[1];
      $p = $prec[1];
      return Vector{0, $pad__2, Vector{0, $p}, $rest__1};
    };
    $type_format = function(dynamic $fmt, dynamic $fmtty) use ($Type_mismatch,$is_int,$runtime,$type_format_gen) {
      $dD = $type_format_gen->contents($fmt, $fmtty);
      if ($is_int($dD[2])) {$fmt__0 = $dD[1];return $fmt__0;}
      throw $runtime["caml_wrap_thrown_exception"]($Type_mismatch) as \Throwable;
    };
    $type_ignored_param_one = function
    (dynamic $ign, dynamic $fmt, dynamic $fmtty) use ($type_format_gen) {
      $match = $type_format_gen->contents($fmt, $fmtty);
      $fmtty__0 = $match[2];
      $fmt__0 = $match[1];
      return Vector{0, Vector{23, $ign, $fmt__0}, $fmtty__0};
    };
    $type_ignored_param = function(dynamic $ign, dynamic $fmt, dynamic $fmtty) use ($Type_mismatch,$is_int,$runtime,$type_format_gen,$type_ignored_format_substitution,$type_ignored_param_one) {
      if ($is_int($ign)) {
        switch($ign) {
          // FALLTHROUGH
          case 0:
            return $type_ignored_param_one($ign, $fmt, $fmtty);
          // FALLTHROUGH
          case 1:
            return $type_ignored_param_one($ign, $fmt, $fmtty);
          // FALLTHROUGH
          case 2:
            if (! $is_int($fmtty) && 14 === $fmtty[0]) {
              $fmtty_rest = $fmtty[1];
              $match = $type_format_gen->contents($fmt, $fmtty_rest);
              $fmtty__0 = $match[2];
              $fmt__0 = $match[1];
              return Vector{0, Vector{23, 2, $fmt__0}, $fmtty__0};
            }
            throw $runtime["caml_wrap_thrown_exception"]($Type_mismatch) as \Throwable;
          // FALLTHROUGH
          default:
            return $type_ignored_param_one($ign, $fmt, $fmtty);
          }
      }
      else {
        switch($ign[0]) {
          // FALLTHROUGH
          case 0:
            return $type_ignored_param_one($ign, $fmt, $fmtty);
          // FALLTHROUGH
          case 1:
            return $type_ignored_param_one($ign, $fmt, $fmtty);
          // FALLTHROUGH
          case 2:
            return $type_ignored_param_one($ign, $fmt, $fmtty);
          // FALLTHROUGH
          case 3:
            return $type_ignored_param_one($ign, $fmt, $fmtty);
          // FALLTHROUGH
          case 4:
            return $type_ignored_param_one($ign, $fmt, $fmtty);
          // FALLTHROUGH
          case 5:
            return $type_ignored_param_one($ign, $fmt, $fmtty);
          // FALLTHROUGH
          case 6:
            return $type_ignored_param_one($ign, $fmt, $fmtty);
          // FALLTHROUGH
          case 7:
            return $type_ignored_param_one($ign, $fmt, $fmtty);
          // FALLTHROUGH
          case 8:
            $sub_fmtty = $ign[2];
            $pad_opt = $ign[1];
            return $type_ignored_param_one(
              Vector{8, $pad_opt, $sub_fmtty},
              $fmt,
              $fmtty
            );
          // FALLTHROUGH
          case 9:
            $sub_fmtty__0 = $ign[2];
            $pad_opt__0 = $ign[1];
            $dC = $type_ignored_format_substitution->contents(
              $sub_fmtty__0,
              $fmt,
              $fmtty
            );
            $match__0 = $dC[2];
            $fmtty__1 = $match__0[2];
            $fmt__1 = $match__0[1];
            $sub_fmtty__1 = $dC[1];
            return Vector{
              0,
              Vector{23, Vector{9, $pad_opt__0, $sub_fmtty__1}, $fmt__1},
              $fmtty__1
            };
          // FALLTHROUGH
          case 10:
            return $type_ignored_param_one($ign, $fmt, $fmtty);
          // FALLTHROUGH
          default:
            return $type_ignored_param_one($ign, $fmt, $fmtty);
          }
      }
    };
    $type_formatting_gen = function
    (dynamic $formatting_gen, dynamic $fmt0, dynamic $fmtty0) use ($type_format_gen) {
      if (0 === $formatting_gen[0]) {
        $match = $formatting_gen[1];
        $str = $match[2];
        $fmt1 = $match[1];
        $match__0 = $type_format_gen->contents($fmt1, $fmtty0);
        $fmtty2 = $match__0[2];
        $fmt2 = $match__0[1];
        $match__1 = $type_format_gen->contents($fmt0, $fmtty2);
        $fmtty3 = $match__1[2];
        $fmt3 = $match__1[1];
        return Vector{
          0,
          Vector{18, Vector{0, Vector{0, $fmt2, $str}}, $fmt3},
          $fmtty3
        };
      }
      $match__2 = $formatting_gen[1];
      $str__0 = $match__2[2];
      $fmt1__0 = $match__2[1];
      $match__3 = $type_format_gen->contents($fmt1__0, $fmtty0);
      $fmtty2__0 = $match__3[2];
      $fmt2__0 = $match__3[1];
      $match__4 = $type_format_gen->contents($fmt0, $fmtty2__0);
      $fmtty3__0 = $match__4[2];
      $fmt3__0 = $match__4[1];
      return Vector{
        0,
        Vector{18, Vector{1, Vector{0, $fmt2__0, $str__0}}, $fmt3__0},
        $fmtty3__0
      };
    };
    $type_format_gen->contents = function(dynamic $fmt, dynamic $match) use ($CamlinternalFormatBasics,$Type_mismatch,$call1,$caml_notequal,$is_int,$runtime,$type_format_gen,$type_formatting_gen,$type_ignored_param,$type_padding,$type_padprec) {
      if ($is_int($fmt)) {
        return Vector{0, 0, $match};
      }
      else {
        switch($fmt[0]) {
          // FALLTHROUGH
          case 0:
            if (! $is_int($match) && 0 === $match[0]) {
              $fmtty_rest = $match[1];
              $fmt_rest = $fmt[1];
              $match__0 = $type_format_gen->contents($fmt_rest, $fmtty_rest);
              $fmtty = $match__0[2];
              $fmt__0 = $match__0[1];
              return Vector{0, Vector{0, $fmt__0}, $fmtty};
            }
            break;
          // FALLTHROUGH
          case 1:
            if (! $is_int($match) && 0 === $match[0]) {
              $fmtty_rest__0 = $match[1];
              $fmt_rest__0 = $fmt[1];
              $match__1 = $type_format_gen->contents(
                $fmt_rest__0,
                $fmtty_rest__0
              );
              $fmtty__0 = $match__1[2];
              $fmt__1 = $match__1[1];
              return Vector{0, Vector{1, $fmt__1}, $fmtty__0};
            }
            break;
          // FALLTHROUGH
          case 2:
            $fmt_rest__1 = $fmt[2];
            $pad = $fmt[1];
            $c8 = $type_padding($pad, $match);
            $c9 = $c8[2];
            $c_ = $c8[1];
            if (! $is_int($c9) && 1 === $c9[0]) {
              $fmtty_rest__1 = $c9[1];
              $match__2 = $type_format_gen->contents(
                $fmt_rest__1,
                $fmtty_rest__1
              );
              $fmtty__1 = $match__2[2];
              $fmt__2 = $match__2[1];
              return Vector{0, Vector{2, $c_, $fmt__2}, $fmtty__1};
            }
            throw $runtime["caml_wrap_thrown_exception"]($Type_mismatch) as \Throwable;
          // FALLTHROUGH
          case 3:
            $fmt_rest__2 = $fmt[2];
            $pad__0 = $fmt[1];
            $da = $type_padding($pad__0, $match);
            $db = $da[2];
            $dc = $da[1];
            if (! $is_int($db) && 1 === $db[0]) {
              $fmtty_rest__2 = $db[1];
              $match__3 = $type_format_gen->contents(
                $fmt_rest__2,
                $fmtty_rest__2
              );
              $fmtty__2 = $match__3[2];
              $fmt__3 = $match__3[1];
              return Vector{0, Vector{3, $dc, $fmt__3}, $fmtty__2};
            }
            throw $runtime["caml_wrap_thrown_exception"]($Type_mismatch) as \Throwable;
          // FALLTHROUGH
          case 4:
            $fmt_rest__3 = $fmt[4];
            $prec = $fmt[3];
            $pad__1 = $fmt[2];
            $iconv = $fmt[1];
            $dd = $type_padprec($pad__1, $prec, $match);
            $de = $dd[3];
            $df = $dd[2];
            $dg = $dd[1];
            if (! $is_int($de) && 2 === $de[0]) {
              $fmtty_rest__3 = $de[1];
              $match__4 = $type_format_gen->contents(
                $fmt_rest__3,
                $fmtty_rest__3
              );
              $fmtty__3 = $match__4[2];
              $fmt__4 = $match__4[1];
              return Vector{0, Vector{4, $iconv, $dg, $df, $fmt__4}, $fmtty__3
              };
            }
            throw $runtime["caml_wrap_thrown_exception"]($Type_mismatch) as \Throwable;
          // FALLTHROUGH
          case 5:
            $fmt_rest__4 = $fmt[4];
            $prec__0 = $fmt[3];
            $pad__2 = $fmt[2];
            $iconv__0 = $fmt[1];
            $dh = $type_padprec($pad__2, $prec__0, $match);
            $di = $dh[3];
            $dj = $dh[2];
            $dk = $dh[1];
            if (! $is_int($di) && 3 === $di[0]) {
              $fmtty_rest__4 = $di[1];
              $match__5 = $type_format_gen->contents(
                $fmt_rest__4,
                $fmtty_rest__4
              );
              $fmtty__4 = $match__5[2];
              $fmt__5 = $match__5[1];
              return Vector{
                0,
                Vector{5, $iconv__0, $dk, $dj, $fmt__5},
                $fmtty__4
              };
            }
            throw $runtime["caml_wrap_thrown_exception"]($Type_mismatch) as \Throwable;
          // FALLTHROUGH
          case 6:
            $fmt_rest__5 = $fmt[4];
            $prec__1 = $fmt[3];
            $pad__3 = $fmt[2];
            $iconv__1 = $fmt[1];
            $dl = $type_padprec($pad__3, $prec__1, $match);
            $dm = $dl[3];
            $dn = $dl[2];
            $dp = $dl[1];
            if (! $is_int($dm) && 4 === $dm[0]) {
              $fmtty_rest__5 = $dm[1];
              $match__6 = $type_format_gen->contents(
                $fmt_rest__5,
                $fmtty_rest__5
              );
              $fmtty__5 = $match__6[2];
              $fmt__6 = $match__6[1];
              return Vector{
                0,
                Vector{6, $iconv__1, $dp, $dn, $fmt__6},
                $fmtty__5
              };
            }
            throw $runtime["caml_wrap_thrown_exception"]($Type_mismatch) as \Throwable;
          // FALLTHROUGH
          case 7:
            $fmt_rest__6 = $fmt[4];
            $prec__2 = $fmt[3];
            $pad__4 = $fmt[2];
            $iconv__2 = $fmt[1];
            $dq = $type_padprec($pad__4, $prec__2, $match);
            $dr = $dq[3];
            $ds = $dq[2];
            $dt = $dq[1];
            if (! $is_int($dr) && 5 === $dr[0]) {
              $fmtty_rest__6 = $dr[1];
              $match__7 = $type_format_gen->contents(
                $fmt_rest__6,
                $fmtty_rest__6
              );
              $fmtty__6 = $match__7[2];
              $fmt__7 = $match__7[1];
              return Vector{
                0,
                Vector{7, $iconv__2, $dt, $ds, $fmt__7},
                $fmtty__6
              };
            }
            throw $runtime["caml_wrap_thrown_exception"]($Type_mismatch) as \Throwable;
          // FALLTHROUGH
          case 8:
            $fmt_rest__7 = $fmt[4];
            $prec__3 = $fmt[3];
            $pad__5 = $fmt[2];
            $fconv = $fmt[1];
            $du = $type_padprec($pad__5, $prec__3, $match);
            $dv = $du[3];
            $dw = $du[2];
            $dx = $du[1];
            if (! $is_int($dv) && 6 === $dv[0]) {
              $fmtty_rest__7 = $dv[1];
              $match__8 = $type_format_gen->contents(
                $fmt_rest__7,
                $fmtty_rest__7
              );
              $fmtty__7 = $match__8[2];
              $fmt__8 = $match__8[1];
              return Vector{0, Vector{8, $fconv, $dx, $dw, $fmt__8}, $fmtty__7
              };
            }
            throw $runtime["caml_wrap_thrown_exception"]($Type_mismatch) as \Throwable;
          // FALLTHROUGH
          case 9:
            $fmt_rest__8 = $fmt[2];
            $pad__6 = $fmt[1];
            $dy = $type_padding($pad__6, $match);
            $dz = $dy[2];
            $dA = $dy[1];
            if (! $is_int($dz) && 7 === $dz[0]) {
              $fmtty_rest__8 = $dz[1];
              $match__9 = $type_format_gen->contents(
                $fmt_rest__8,
                $fmtty_rest__8
              );
              $fmtty__8 = $match__9[2];
              $fmt__9 = $match__9[1];
              return Vector{0, Vector{9, $dA, $fmt__9}, $fmtty__8};
            }
            throw $runtime["caml_wrap_thrown_exception"]($Type_mismatch) as \Throwable;
          // FALLTHROUGH
          case 10:
            $fmt_rest__9 = $fmt[1];
            $match__10 = $type_format_gen->contents($fmt_rest__9, $match);
            $fmtty__9 = $match__10[2];
            $fmt__10 = $match__10[1];
            return Vector{0, Vector{10, $fmt__10}, $fmtty__9};
          // FALLTHROUGH
          case 11:
            $fmt_rest__10 = $fmt[2];
            $str = $fmt[1];
            $match__11 = $type_format_gen->contents($fmt_rest__10, $match);
            $fmtty__10 = $match__11[2];
            $fmt__11 = $match__11[1];
            return Vector{0, Vector{11, $str, $fmt__11}, $fmtty__10};
          // FALLTHROUGH
          case 12:
            $fmt_rest__11 = $fmt[2];
            $chr = $fmt[1];
            $match__12 = $type_format_gen->contents($fmt_rest__11, $match);
            $fmtty__11 = $match__12[2];
            $fmt__12 = $match__12[1];
            return Vector{0, Vector{12, $chr, $fmt__12}, $fmtty__11};
          // FALLTHROUGH
          case 13:
            if (! $is_int($match) && 8 === $match[0]) {
              $fmtty_rest__9 = $match[2];
              $sub_fmtty = $match[1];
              $fmt_rest__12 = $fmt[3];
              $sub_fmtty__0 = $fmt[2];
              $pad_opt = $fmt[1];
              if (
                $caml_notequal(Vector{0, $sub_fmtty__0}, Vector{0, $sub_fmtty}
                )
              ) {
                throw $runtime["caml_wrap_thrown_exception"]($Type_mismatch) as \Throwable;
              }
              $match__13 = $type_format_gen->contents(
                $fmt_rest__12,
                $fmtty_rest__9
              );
              $fmtty__12 = $match__13[2];
              $fmt__13 = $match__13[1];
              return Vector{
                0,
                Vector{13, $pad_opt, $sub_fmtty, $fmt__13},
                $fmtty__12
              };
            }
            break;
          // FALLTHROUGH
          case 14:
            if (! $is_int($match) && 9 === $match[0]) {
              $fmtty_rest__10 = $match[3];
              $sub_fmtty1 = $match[1];
              $fmt_rest__13 = $fmt[3];
              $sub_fmtty__1 = $fmt[2];
              $pad_opt__0 = $fmt[1];
              $dB = Vector{
                0,
                $call1($CamlinternalFormatBasics[2], $sub_fmtty1)
              };
              if (
                $caml_notequal(
                  Vector{
                    0,
                    $call1($CamlinternalFormatBasics[2], $sub_fmtty__1)
                  },
                  $dB
                )
              ) {
                throw $runtime["caml_wrap_thrown_exception"]($Type_mismatch) as \Throwable;
              }
              $match__14 = $type_format_gen->contents(
                $fmt_rest__13,
                $call1($CamlinternalFormatBasics[2], $fmtty_rest__10)
              );
              $fmtty__13 = $match__14[2];
              $fmt__14 = $match__14[1];
              return Vector{
                0,
                Vector{14, $pad_opt__0, $sub_fmtty1, $fmt__14},
                $fmtty__13
              };
            }
            break;
          // FALLTHROUGH
          case 15:
            if (! $is_int($match) && 10 === $match[0]) {
              $fmtty_rest__11 = $match[1];
              $fmt_rest__14 = $fmt[1];
              $match__15 = $type_format_gen->contents(
                $fmt_rest__14,
                $fmtty_rest__11
              );
              $fmtty__14 = $match__15[2];
              $fmt__15 = $match__15[1];
              return Vector{0, Vector{15, $fmt__15}, $fmtty__14};
            }
            break;
          // FALLTHROUGH
          case 16:
            if (! $is_int($match) && 11 === $match[0]) {
              $fmtty_rest__12 = $match[1];
              $fmt_rest__15 = $fmt[1];
              $match__16 = $type_format_gen->contents(
                $fmt_rest__15,
                $fmtty_rest__12
              );
              $fmtty__15 = $match__16[2];
              $fmt__16 = $match__16[1];
              return Vector{0, Vector{16, $fmt__16}, $fmtty__15};
            }
            break;
          // FALLTHROUGH
          case 17:
            $fmt_rest__16 = $fmt[2];
            $formatting_lit = $fmt[1];
            $match__17 = $type_format_gen->contents($fmt_rest__16, $match);
            $fmtty__16 = $match__17[2];
            $fmt__17 = $match__17[1];
            return Vector{0, Vector{17, $formatting_lit, $fmt__17}, $fmtty__16
            };
          // FALLTHROUGH
          case 18:
            $fmt_rest__17 = $fmt[2];
            $formatting_gen = $fmt[1];
            return $type_formatting_gen($formatting_gen, $fmt_rest__17, $match
            );
          // FALLTHROUGH
          case 19:
            if (! $is_int($match) && 13 === $match[0]) {
              $fmtty_rest__13 = $match[1];
              $fmt_rest__18 = $fmt[1];
              $match__18 = $type_format_gen->contents(
                $fmt_rest__18,
                $fmtty_rest__13
              );
              $fmtty__17 = $match__18[2];
              $fmt__18 = $match__18[1];
              return Vector{0, Vector{19, $fmt__18}, $fmtty__17};
            }
            break;
          // FALLTHROUGH
          case 20:
            if (! $is_int($match) && 1 === $match[0]) {
              $fmtty_rest__14 = $match[1];
              $fmt_rest__19 = $fmt[3];
              $char_set = $fmt[2];
              $width_opt = $fmt[1];
              $match__19 = $type_format_gen->contents(
                $fmt_rest__19,
                $fmtty_rest__14
              );
              $fmtty__18 = $match__19[2];
              $fmt__19 = $match__19[1];
              return Vector{
                0,
                Vector{20, $width_opt, $char_set, $fmt__19},
                $fmtty__18
              };
            }
            break;
          // FALLTHROUGH
          case 21:
            if (! $is_int($match) && 2 === $match[0]) {
              $fmtty_rest__15 = $match[1];
              $fmt_rest__20 = $fmt[2];
              $counter = $fmt[1];
              $match__20 = $type_format_gen->contents(
                $fmt_rest__20,
                $fmtty_rest__15
              );
              $fmtty__19 = $match__20[2];
              $fmt__20 = $match__20[1];
              return Vector{0, Vector{21, $counter, $fmt__20}, $fmtty__19};
            }
            break;
          // FALLTHROUGH
          case 23:
            $rest = $fmt[2];
            $ign = $fmt[1];
            return $type_ignored_param($ign, $rest, $match);
          }
      }
      throw $runtime["caml_wrap_thrown_exception"]($Type_mismatch) as \Throwable;
    };
    $type_ignored_format_substitution->contents = function
    (dynamic $sub_fmtty, dynamic $fmt, dynamic $match) use ($CamlinternalFormatBasics,$Type_mismatch,$call1,$caml_notequal,$fmtty_rel_det,$is_int,$runtime,$symm,$trans,$type_format_gen,$type_ignored_format_substitution) {
      if ($is_int($sub_fmtty)) {
        return Vector{0, 0, $type_format_gen->contents($fmt, $match)};
      }
      else {
        switch($sub_fmtty[0]) {
          // FALLTHROUGH
          case 0:
            if (! $is_int($match) && 0 === $match[0]) {
              $fmtty_rest = $match[1];
              $sub_fmtty_rest = $sub_fmtty[1];
              $match__0 = $type_ignored_format_substitution->contents(
                $sub_fmtty_rest,
                $fmt,
                $fmtty_rest
              );
              $fmt__0 = $match__0[2];
              $sub_fmtty_rest__0 = $match__0[1];
              return Vector{0, Vector{0, $sub_fmtty_rest__0}, $fmt__0};
            }
            break;
          // FALLTHROUGH
          case 1:
            if (! $is_int($match) && 1 === $match[0]) {
              $fmtty_rest__0 = $match[1];
              $sub_fmtty_rest__1 = $sub_fmtty[1];
              $match__1 = $type_ignored_format_substitution->contents(
                $sub_fmtty_rest__1,
                $fmt,
                $fmtty_rest__0
              );
              $fmt__1 = $match__1[2];
              $sub_fmtty_rest__2 = $match__1[1];
              return Vector{0, Vector{1, $sub_fmtty_rest__2}, $fmt__1};
            }
            break;
          // FALLTHROUGH
          case 2:
            if (! $is_int($match) && 2 === $match[0]) {
              $fmtty_rest__1 = $match[1];
              $sub_fmtty_rest__3 = $sub_fmtty[1];
              $match__2 = $type_ignored_format_substitution->contents(
                $sub_fmtty_rest__3,
                $fmt,
                $fmtty_rest__1
              );
              $fmt__2 = $match__2[2];
              $sub_fmtty_rest__4 = $match__2[1];
              return Vector{0, Vector{2, $sub_fmtty_rest__4}, $fmt__2};
            }
            break;
          // FALLTHROUGH
          case 3:
            if (! $is_int($match) && 3 === $match[0]) {
              $fmtty_rest__2 = $match[1];
              $sub_fmtty_rest__5 = $sub_fmtty[1];
              $match__3 = $type_ignored_format_substitution->contents(
                $sub_fmtty_rest__5,
                $fmt,
                $fmtty_rest__2
              );
              $fmt__3 = $match__3[2];
              $sub_fmtty_rest__6 = $match__3[1];
              return Vector{0, Vector{3, $sub_fmtty_rest__6}, $fmt__3};
            }
            break;
          // FALLTHROUGH
          case 4:
            if (! $is_int($match) && 4 === $match[0]) {
              $fmtty_rest__3 = $match[1];
              $sub_fmtty_rest__7 = $sub_fmtty[1];
              $match__4 = $type_ignored_format_substitution->contents(
                $sub_fmtty_rest__7,
                $fmt,
                $fmtty_rest__3
              );
              $fmt__4 = $match__4[2];
              $sub_fmtty_rest__8 = $match__4[1];
              return Vector{0, Vector{4, $sub_fmtty_rest__8}, $fmt__4};
            }
            break;
          // FALLTHROUGH
          case 5:
            if (! $is_int($match) && 5 === $match[0]) {
              $fmtty_rest__4 = $match[1];
              $sub_fmtty_rest__9 = $sub_fmtty[1];
              $match__5 = $type_ignored_format_substitution->contents(
                $sub_fmtty_rest__9,
                $fmt,
                $fmtty_rest__4
              );
              $fmt__5 = $match__5[2];
              $sub_fmtty_rest__10 = $match__5[1];
              return Vector{0, Vector{5, $sub_fmtty_rest__10}, $fmt__5};
            }
            break;
          // FALLTHROUGH
          case 6:
            if (! $is_int($match) && 6 === $match[0]) {
              $fmtty_rest__5 = $match[1];
              $sub_fmtty_rest__11 = $sub_fmtty[1];
              $match__6 = $type_ignored_format_substitution->contents(
                $sub_fmtty_rest__11,
                $fmt,
                $fmtty_rest__5
              );
              $fmt__6 = $match__6[2];
              $sub_fmtty_rest__12 = $match__6[1];
              return Vector{0, Vector{6, $sub_fmtty_rest__12}, $fmt__6};
            }
            break;
          // FALLTHROUGH
          case 7:
            if (! $is_int($match) && 7 === $match[0]) {
              $fmtty_rest__6 = $match[1];
              $sub_fmtty_rest__13 = $sub_fmtty[1];
              $match__7 = $type_ignored_format_substitution->contents(
                $sub_fmtty_rest__13,
                $fmt,
                $fmtty_rest__6
              );
              $fmt__7 = $match__7[2];
              $sub_fmtty_rest__14 = $match__7[1];
              return Vector{0, Vector{7, $sub_fmtty_rest__14}, $fmt__7};
            }
            break;
          // FALLTHROUGH
          case 8:
            if (! $is_int($match) && 8 === $match[0]) {
              $fmtty_rest__7 = $match[2];
              $sub2_fmtty = $match[1];
              $sub_fmtty_rest__15 = $sub_fmtty[2];
              $sub2_fmtty__0 = $sub_fmtty[1];
              if (
                $caml_notequal(
                  Vector{0, $sub2_fmtty__0},
                  Vector{0, $sub2_fmtty}
                )
              ) {
                throw $runtime["caml_wrap_thrown_exception"]($Type_mismatch) as \Throwable;
              }
              $match__8 = $type_ignored_format_substitution->contents(
                $sub_fmtty_rest__15,
                $fmt,
                $fmtty_rest__7
              );
              $fmt__8 = $match__8[2];
              $sub_fmtty_rest__16 = $match__8[1];
              return Vector{
                0,
                Vector{8, $sub2_fmtty, $sub_fmtty_rest__16},
                $fmt__8
              };
            }
            break;
          // FALLTHROUGH
          case 9:
            if (! $is_int($match) && 9 === $match[0]) {
              $fmtty_rest__8 = $match[3];
              $sub2_fmtty__1 = $match[2];
              $sub1_fmtty = $match[1];
              $sub_fmtty_rest__17 = $sub_fmtty[3];
              $sub2_fmtty__2 = $sub_fmtty[2];
              $sub1_fmtty__0 = $sub_fmtty[1];
              $c6 = Vector{
                0,
                $call1($CamlinternalFormatBasics[2], $sub1_fmtty)
              };
              if (
                $caml_notequal(
                  Vector{
                    0,
                    $call1($CamlinternalFormatBasics[2], $sub1_fmtty__0)
                  },
                  $c6
                )
              ) {
                throw $runtime["caml_wrap_thrown_exception"]($Type_mismatch) as \Throwable;
              }
              $c7 = Vector{
                0,
                $call1($CamlinternalFormatBasics[2], $sub2_fmtty__1)
              };
              if (
                $caml_notequal(
                  Vector{
                    0,
                    $call1($CamlinternalFormatBasics[2], $sub2_fmtty__2)
                  },
                  $c7
                )
              ) {
                throw $runtime["caml_wrap_thrown_exception"]($Type_mismatch) as \Throwable;
              }
              $sub_fmtty__0 = $trans->contents(
                $symm->contents($sub1_fmtty),
                $sub2_fmtty__1
              );
              $match__9 = $fmtty_rel_det->contents($sub_fmtty__0);
              $f4 = $match__9[4];
              $f2 = $match__9[2];
              $call1($f2, 0);
              $call1($f4, 0);
              $match__10 = $type_ignored_format_substitution->contents(
                $call1($CamlinternalFormatBasics[2], $sub_fmtty_rest__17),
                $fmt,
                $fmtty_rest__8
              );
              $fmt__9 = $match__10[2];
              $sub_fmtty_rest__18 = $match__10[1];
              return Vector{
                0,
                Vector{
                  9,
                  $sub1_fmtty,
                  $sub2_fmtty__1,
                  $symm->contents($sub_fmtty_rest__18)
                },
                $fmt__9
              };
            }
            break;
          // FALLTHROUGH
          case 10:
            if (! $is_int($match) && 10 === $match[0]) {
              $fmtty_rest__9 = $match[1];
              $sub_fmtty_rest__19 = $sub_fmtty[1];
              $match__11 = $type_ignored_format_substitution->contents(
                $sub_fmtty_rest__19,
                $fmt,
                $fmtty_rest__9
              );
              $fmt__10 = $match__11[2];
              $sub_fmtty_rest__20 = $match__11[1];
              return Vector{0, Vector{10, $sub_fmtty_rest__20}, $fmt__10};
            }
            break;
          // FALLTHROUGH
          case 11:
            if (! $is_int($match) && 11 === $match[0]) {
              $fmtty_rest__10 = $match[1];
              $sub_fmtty_rest__21 = $sub_fmtty[1];
              $match__12 = $type_ignored_format_substitution->contents(
                $sub_fmtty_rest__21,
                $fmt,
                $fmtty_rest__10
              );
              $fmt__11 = $match__12[2];
              $sub_fmtty_rest__22 = $match__12[1];
              return Vector{0, Vector{11, $sub_fmtty_rest__22}, $fmt__11};
            }
            break;
          // FALLTHROUGH
          case 13:
            if (! $is_int($match) && 13 === $match[0]) {
              $fmtty_rest__11 = $match[1];
              $sub_fmtty_rest__23 = $sub_fmtty[1];
              $match__13 = $type_ignored_format_substitution->contents(
                $sub_fmtty_rest__23,
                $fmt,
                $fmtty_rest__11
              );
              $fmt__12 = $match__13[2];
              $sub_fmtty_rest__24 = $match__13[1];
              return Vector{0, Vector{13, $sub_fmtty_rest__24}, $fmt__12};
            }
            break;
          // FALLTHROUGH
          case 14:
            if (! $is_int($match) && 14 === $match[0]) {
              $fmtty_rest__12 = $match[1];
              $sub_fmtty_rest__25 = $sub_fmtty[1];
              $match__14 = $type_ignored_format_substitution->contents(
                $sub_fmtty_rest__25,
                $fmt,
                $fmtty_rest__12
              );
              $fmt__13 = $match__14[2];
              $sub_fmtty_rest__26 = $match__14[1];
              return Vector{0, Vector{14, $sub_fmtty_rest__26}, $fmt__13};
            }
            break;
          }
      }
      throw $runtime["caml_wrap_thrown_exception"]($Type_mismatch) as \Throwable;
    };
    $recast = function(dynamic $fmt, dynamic $fmtty) use ($CamlinternalFormatBasics,$call1,$symm,$type_format) {
      $c5 = $symm->contents($fmtty);
      return $type_format($fmt, $call1($CamlinternalFormatBasics[2], $c5));
    };
    $fix_padding = function(dynamic $padty, dynamic $width, dynamic $str) use ($Bytes,$Pervasives,$String,$call1,$call2,$call5,$caml_bytes_set,$caml_ml_string_length,$caml_string_get) {
      $len = $caml_ml_string_length($str);
      $padty__0 = 0 <= $width ? $padty : (0);
      $width__0 = $call1($Pervasives[6], $width);
      if ($width__0 <= $len) {return $str;}
      $c4 = 2 === $padty__0 ? 48 : (32);
      $res = $call2($Bytes[1], $width__0, $c4);
      switch($padty__0) {
        // FALLTHROUGH
        case 0:
          $call5($String[6], $str, 0, $res, 0, $len);
          break;
        // FALLTHROUGH
        case 1:
          $call5($String[6], $str, 0, $res, (int) ($width__0 - $len), $len);
          break;
        // FALLTHROUGH
        default:
          if (0 < $len) {
            if (43 === $caml_string_get($str, 0)) {$switch__1 = 1;}
            else {
              if (45 === $caml_string_get($str, 0)) {$switch__1 = 1;}
              else {
                if (32 === $caml_string_get($str, 0)) {$switch__1 = 1;}
                else {$switch__0 = 0;$switch__1 = 0;}
              }
            }
            if ($switch__1) {
              $caml_bytes_set($res, 0, $caml_string_get($str, 0));
              $call5(
                $String[6],
                $str,
                1,
                $res,
                (int)
                ((int) ($width__0 - $len) + 1),
                (int)
                ($len + -1)
              );
              $switch__0 = 1;
            }
          }
          else {$switch__0 = 0;}
          if (! $switch__0) {
            if (1 < $len) {
              if (48 === $caml_string_get($str, 0)) {
                if (120 === $caml_string_get($str, 1)) {$switch__3 = 1;}
                else {
                  if (88 === $caml_string_get($str, 1)) {$switch__3 = 1;}
                  else {$switch__2 = 0;$switch__3 = 0;}
                }
                if ($switch__3) {
                  $caml_bytes_set($res, 1, $caml_string_get($str, 1));
                  $call5(
                    $String[6],
                    $str,
                    2,
                    $res,
                    (int)
                    ((int) ($width__0 - $len) + 2),
                    (int)
                    ($len + -2)
                  );
                  $switch__2 = 1;
                }
              }
              else {$switch__2 = 0;}
            }
            else {$switch__2 = 0;}
            if (! $switch__2) {
              $call5($String[6], $str, 0, $res, (int) ($width__0 - $len), $len
              );
            }
          }
        }
      return $call1($Bytes[42], $res);
    };
    $fix_int_precision = function(dynamic $prec, dynamic $str) use ($Bytes,$Pervasives,$String,$call1,$call2,$call5,$caml_bytes_set,$caml_ml_string_length,$caml_string_get,$unsigned_right_shift_32) {
      $prec__0 = $call1($Pervasives[6], $prec);
      $len = $caml_ml_string_length($str);
      $c = $caml_string_get($str, 0);
      if (58 <= $c) {
        $switch__0 = 71 <= $c
          ? 5 < $unsigned_right_shift_32((int) ($c + -97), 0) ? 1 : (0)
          : (65 <= $c ? 0 : (1));
      }
      else {
        if (32 === $c) {
          $switch__1 = 1;
        }
        else {
          if (43 <= $c) {
            $switcher = (int) ($c + -43);
            switch($switcher) {
              // FALLTHROUGH
              case 5:
                if ($len < (int) ($prec__0 + 2)) {
                  if (1 < $len) {
                    $switch__2 = 120 === $caml_string_get($str, 1)
                      ? 0
                      : (88 === $caml_string_get($str, 1) ? 0 : (1));
                    if (! $switch__2) {
                      $res__1 = $call2($Bytes[1], (int) ($prec__0 + 2), 48);
                      $caml_bytes_set($res__1, 1, $caml_string_get($str, 1));
                      $call5(
                        $String[6],
                        $str,
                        2,
                        $res__1,
                        (int)
                        ((int) ($prec__0 - $len) + 4),
                        (int)
                        ($len + -2)
                      );
                      return $call1($Bytes[42], $res__1);
                    }
                  }
                }
                $switch__0 = 0;
                $switch__1 = 0;
                break;
              // FALLTHROUGH
              case 0:
              // FALLTHROUGH
              case 2:
                $switch__1 = 1;
                break;
              // FALLTHROUGH
              case 1:
              // FALLTHROUGH
              case 3:
              // FALLTHROUGH
              case 4:
                $switch__0 = 1;
                $switch__1 = 0;
                break;
              // FALLTHROUGH
              default:
                $switch__0 = 0;
                $switch__1 = 0;
              }
          }
          else {$switch__0 = 1;$switch__1 = 0;}
        }
        if ($switch__1) {
          if ($len < (int) ($prec__0 + 1)) {
            $res__0 = $call2($Bytes[1], (int) ($prec__0 + 1), 48);
            $caml_bytes_set($res__0, 0, $c);
            $call5(
              $String[6],
              $str,
              1,
              $res__0,
              (int)
              ((int) ($prec__0 - $len) + 2),
              (int)
              ($len + -1)
            );
            return $call1($Bytes[42], $res__0);
          }
          $switch__0 = 1;
        }
      }
      if (! $switch__0) {
        if ($len < $prec__0) {
          $res = $call2($Bytes[1], $prec__0, 48);
          $call5($String[6], $str, 0, $res, (int) ($prec__0 - $len), $len);
          return $call1($Bytes[42], $res);
        }
      }
      return $str;
    };
    $string_to_caml_string = function(dynamic $str) use ($Bytes,$String,$call1,$call2,$caml_blit_string,$caml_ml_string_length) {
      $str__0 = $call1($String[13], $str);
      $l = $caml_ml_string_length($str__0);
      $res = $call2($Bytes[1], (int) ($l + 2), 34);
      $caml_blit_string($str__0, 0, $res, 1, $l);
      return $call1($Bytes[42], $res);
    };
    $format_of_iconv = function(dynamic $param) use ($cst_X,$cst_X__0,$cst_d,$cst_d__0,$cst_d__1,$cst_i__0,$cst_i__1,$cst_i__2,$cst_o,$cst_o__0,$cst_u,$cst_x,$cst_x__0) {
      switch($param) {
        // FALLTHROUGH
        case 0:
          return $cst_d;
        // FALLTHROUGH
        case 1:
          return $cst_d__0;
        // FALLTHROUGH
        case 2:
          return $cst_d__1;
        // FALLTHROUGH
        case 3:
          return $cst_i__0;
        // FALLTHROUGH
        case 4:
          return $cst_i__1;
        // FALLTHROUGH
        case 5:
          return $cst_i__2;
        // FALLTHROUGH
        case 6:
          return $cst_x;
        // FALLTHROUGH
        case 7:
          return $cst_x__0;
        // FALLTHROUGH
        case 8:
          return $cst_X;
        // FALLTHROUGH
        case 9:
          return $cst_X__0;
        // FALLTHROUGH
        case 10:
          return $cst_o;
        // FALLTHROUGH
        case 11:
          return $cst_o__0;
        // FALLTHROUGH
        default:
          return $cst_u;
        }
    };
    $format_of_iconvL = function(dynamic $param) use ($cst_LX,$cst_LX__0,$cst_Ld,$cst_Ld__0,$cst_Ld__1,$cst_Li__0,$cst_Li__1,$cst_Li__2,$cst_Lo,$cst_Lo__0,$cst_Lu,$cst_Lx,$cst_Lx__0) {
      switch($param) {
        // FALLTHROUGH
        case 0:
          return $cst_Ld;
        // FALLTHROUGH
        case 1:
          return $cst_Ld__0;
        // FALLTHROUGH
        case 2:
          return $cst_Ld__1;
        // FALLTHROUGH
        case 3:
          return $cst_Li__0;
        // FALLTHROUGH
        case 4:
          return $cst_Li__1;
        // FALLTHROUGH
        case 5:
          return $cst_Li__2;
        // FALLTHROUGH
        case 6:
          return $cst_Lx;
        // FALLTHROUGH
        case 7:
          return $cst_Lx__0;
        // FALLTHROUGH
        case 8:
          return $cst_LX;
        // FALLTHROUGH
        case 9:
          return $cst_LX__0;
        // FALLTHROUGH
        case 10:
          return $cst_Lo;
        // FALLTHROUGH
        case 11:
          return $cst_Lo__0;
        // FALLTHROUGH
        default:
          return $cst_Lu;
        }
    };
    $format_of_iconvl = function(dynamic $param) use ($cst_lX,$cst_lX__0,$cst_ld,$cst_ld__0,$cst_ld__1,$cst_li__0,$cst_li__1,$cst_li__2,$cst_lo,$cst_lo__0,$cst_lu,$cst_lx,$cst_lx__0) {
      switch($param) {
        // FALLTHROUGH
        case 0:
          return $cst_ld;
        // FALLTHROUGH
        case 1:
          return $cst_ld__0;
        // FALLTHROUGH
        case 2:
          return $cst_ld__1;
        // FALLTHROUGH
        case 3:
          return $cst_li__0;
        // FALLTHROUGH
        case 4:
          return $cst_li__1;
        // FALLTHROUGH
        case 5:
          return $cst_li__2;
        // FALLTHROUGH
        case 6:
          return $cst_lx;
        // FALLTHROUGH
        case 7:
          return $cst_lx__0;
        // FALLTHROUGH
        case 8:
          return $cst_lX;
        // FALLTHROUGH
        case 9:
          return $cst_lX__0;
        // FALLTHROUGH
        case 10:
          return $cst_lo;
        // FALLTHROUGH
        case 11:
          return $cst_lo__0;
        // FALLTHROUGH
        default:
          return $cst_lu;
        }
    };
    $format_of_iconvn = function(dynamic $param) use ($cst_nX,$cst_nX__0,$cst_nd,$cst_nd__0,$cst_nd__1,$cst_ni__0,$cst_ni__1,$cst_ni__2,$cst_no,$cst_no__0,$cst_nu,$cst_nx,$cst_nx__0) {
      switch($param) {
        // FALLTHROUGH
        case 0:
          return $cst_nd;
        // FALLTHROUGH
        case 1:
          return $cst_nd__0;
        // FALLTHROUGH
        case 2:
          return $cst_nd__1;
        // FALLTHROUGH
        case 3:
          return $cst_ni__0;
        // FALLTHROUGH
        case 4:
          return $cst_ni__1;
        // FALLTHROUGH
        case 5:
          return $cst_ni__2;
        // FALLTHROUGH
        case 6:
          return $cst_nx;
        // FALLTHROUGH
        case 7:
          return $cst_nx__0;
        // FALLTHROUGH
        case 8:
          return $cst_nX;
        // FALLTHROUGH
        case 9:
          return $cst_nX__0;
        // FALLTHROUGH
        case 10:
          return $cst_no;
        // FALLTHROUGH
        case 11:
          return $cst_no__0;
        // FALLTHROUGH
        default:
          return $cst_nu;
        }
    };
    $format_of_fconv = function(dynamic $fconv, dynamic $prec) use ($Pervasives,$bprint_fconv_flag,$buffer_add_char,$buffer_add_string,$buffer_contents,$buffer_create,$call1,$char_of_fconv,$cst_12g) {
      if (15 === $fconv) {return $cst_12g;}
      $prec__0 = $call1($Pervasives[6], $prec);
      $symb = $char_of_fconv($fconv);
      $buf = $buffer_create(16);
      $buffer_add_char($buf, 37);
      $bprint_fconv_flag($buf, $fconv);
      $buffer_add_char($buf, 46);
      $buffer_add_string($buf, $call1($Pervasives[21], $prec__0));
      $buffer_add_char($buf, $symb);
      return $buffer_contents($buf);
    };
    $convert_int = function(dynamic $iconv, dynamic $n) use ($caml_format_int,$format_of_iconv) {
      return $caml_format_int($format_of_iconv($iconv), $n);
    };
    $convert_int32 = function(dynamic $iconv, dynamic $n) use ($caml_format_int,$format_of_iconvl) {
      return $caml_format_int($format_of_iconvl($iconv), $n);
    };
    $convert_nativeint = function(dynamic $iconv, dynamic $n) use ($caml_format_int,$format_of_iconvn) {
      return $caml_format_int($format_of_iconvn($iconv), $n);
    };
    $convert_int64 = function(dynamic $iconv, dynamic $n) use ($format_of_iconvL,$runtime) {
      return $runtime["caml_int64_format"]($format_of_iconvL($iconv), $n);
    };
    $convert_float = function(dynamic $fconv, dynamic $prec, dynamic $x) use ($Pervasives,$String,$call1,$call2,$caml_ml_string_length,$caml_string_get,$cst__16,$cst_infinity,$cst_nan,$cst_neg_infinity,$format_of_fconv,$runtime,$unsigned_right_shift_32) {
      if (16 <= $fconv) {
        if (17 <= $fconv) {
          switch((int) ($fconv + -17)) {
            // FALLTHROUGH
            case 2:
              $switch__0 = 0;
              break;
            // FALLTHROUGH
            case 0:
            // FALLTHROUGH
            case 3:
              $sign = 43;
              $switch__0 = 1;
              break;
            // FALLTHROUGH
            default:
              $sign = 32;
              $switch__0 = 1;
            }
        }
        else {$switch__0 = 0;}
        if (! $switch__0) {$sign = 45;}
        $str = $runtime["caml_hexstring_of_float"]($x, $prec, $sign);
        return 19 <= $fconv ? $call1($String[29], $str) : ($str);
      }
      $str__0 = $runtime["caml_format_float"](
        $format_of_fconv($fconv, $prec),
        $x
      );
      if (15 === $fconv) {
        $len = $caml_ml_string_length($str__0);
        $is_valid = function(dynamic $i) use ($caml_string_get,$len,$str__0,$unsigned_right_shift_32) {
          $i__0 = $i;
          for (;;) {
            if ($i__0 === $len) {return 0;}
            $match = $caml_string_get($str__0, $i__0);
            $c3 = (int) ($match + -46);
            $switch__0 = 23 < $unsigned_right_shift_32($c3, 0)
              ? 55 === $c3 ? 1 : (0)
              : (21 < $unsigned_right_shift_32((int) ($c3 + -1), 0) ? 1 : (0));
            if ($switch__0) {return 1;}
            $i__1 = (int) ($i__0 + 1);
            $i__0 = $i__1;
            continue;
          }
        };
        $match = $runtime["caml_classify_float"]($x);
        return 3 === $match
          ? $x < 0 ? $cst_neg_infinity : ($cst_infinity)
          : (4 <= $match
           ? $cst_nan
           : ($is_valid(0)
            ? $str__0
            : ($call2($Pervasives[16], $str__0, $cst__16))));
      }
      return $str__0;
    };
    $format_caml_char = function(dynamic $c) use ($Bytes,$Char,$call1,$call2,$caml_blit_string,$caml_ml_string_length) {
      $str = $call1($Char[2], $c);
      $l = $caml_ml_string_length($str);
      $res = $call2($Bytes[1], (int) ($l + 2), 39);
      $caml_blit_string($str, 0, $res, 1, $l);
      return $call1($Bytes[42], $res);
    };
    $string_of_fmtty = function(dynamic $fmtty) use ($bprint_fmtty,$buffer_contents,$buffer_create) {
      $buf = $buffer_create(16);
      $bprint_fmtty->contents($buf, $fmtty);
      return $buffer_contents($buf);
    };
    $make_float_padding_precision = function
    (dynamic $k, dynamic $o, dynamic $acc, dynamic $fmt, dynamic $pad, dynamic $match, dynamic $fconv) use ($convert_float,$default_float_precision,$fix_padding,$is_int,$make_printf) {
      if ($is_int($pad)) {
        if ($is_int($match)) {
          return 0 === $match
            ? function(dynamic $x) use ($acc,$convert_float,$default_float_precision,$fconv,$fmt,$k,$make_printf,$o) {
             $str = $convert_float($fconv, $default_float_precision, $x);
             return $make_printf->contents($k, $o, Vector{4, $acc, $str}, $fmt
             );
           }
            : (function(dynamic $p, dynamic $x) use ($acc,$convert_float,$fconv,$fmt,$k,$make_printf,$o) {
             $str = $convert_float($fconv, $p, $x);
             return $make_printf->contents($k, $o, Vector{4, $acc, $str}, $fmt
             );
           });
        }
        $p = $match[1];
        return function(dynamic $x) use ($acc,$convert_float,$fconv,$fmt,$k,$make_printf,$o,$p) {
          $str = $convert_float($fconv, $p, $x);
          return $make_printf->contents($k, $o, Vector{4, $acc, $str}, $fmt);
        };
      }
      else {
        if (0 === $pad[0]) {
          $c0 = $pad[2];
          $c1 = $pad[1];
          if ($is_int($match)) {
            return 0 === $match
              ? function(dynamic $x) use ($acc,$c0,$c1,$convert_float,$default_float_precision,$fconv,$fix_padding,$fmt,$k,$make_printf,$o) {
               $str = $convert_float($fconv, $default_float_precision, $x);
               $str__0 = $fix_padding($c1, $c0, $str);
               return $make_printf->contents(
                 $k,
                 $o,
                 Vector{4, $acc, $str__0},
                 $fmt
               );
             }
              : (function(dynamic $p, dynamic $x) use ($acc,$c0,$c1,$convert_float,$fconv,$fix_padding,$fmt,$k,$make_printf,$o) {
               $str = $fix_padding($c1, $c0, $convert_float($fconv, $p, $x));
               return $make_printf->contents(
                 $k,
                 $o,
                 Vector{4, $acc, $str},
                 $fmt
               );
             });
          }
          $p__0 = $match[1];
          return function(dynamic $x) use ($acc,$c0,$c1,$convert_float,$fconv,$fix_padding,$fmt,$k,$make_printf,$o,$p__0) {
            $str = $fix_padding($c1, $c0, $convert_float($fconv, $p__0, $x));
            return $make_printf->contents($k, $o, Vector{4, $acc, $str}, $fmt);
          };
        }
        $c2 = $pad[1];
        if ($is_int($match)) {
          return 0 === $match
            ? function(dynamic $w, dynamic $x) use ($acc,$c2,$convert_float,$default_float_precision,$fconv,$fix_padding,$fmt,$k,$make_printf,$o) {
             $str = $convert_float($fconv, $default_float_precision, $x);
             $str__0 = $fix_padding($c2, $w, $str);
             return $make_printf->contents(
               $k,
               $o,
               Vector{4, $acc, $str__0},
               $fmt
             );
           }
            : (function(dynamic $w, dynamic $p, dynamic $x) use ($acc,$c2,$convert_float,$fconv,$fix_padding,$fmt,$k,$make_printf,$o) {
             $str = $fix_padding($c2, $w, $convert_float($fconv, $p, $x));
             return $make_printf->contents($k, $o, Vector{4, $acc, $str}, $fmt
             );
           });
        }
        $p__1 = $match[1];
        return function(dynamic $w, dynamic $x) use ($acc,$c2,$convert_float,$fconv,$fix_padding,$fmt,$k,$make_printf,$o,$p__1) {
          $str = $fix_padding($c2, $w, $convert_float($fconv, $p__1, $x));
          return $make_printf->contents($k, $o, Vector{4, $acc, $str}, $fmt);
        };
      }
    };
    $make_int_padding_precision = function
    (dynamic $k, dynamic $o, dynamic $acc, dynamic $fmt, dynamic $pad, dynamic $match, dynamic $trans, dynamic $iconv) use ($call2,$fix_int_precision,$fix_padding,$is_int,$make_printf) {
      if ($is_int($pad)) {
        if ($is_int($match)) {
          return 0 === $match
            ? function(dynamic $x) use ($acc,$call2,$fmt,$iconv,$k,$make_printf,$o,$trans) {
             $str = $call2($trans, $iconv, $x);
             return $make_printf->contents($k, $o, Vector{4, $acc, $str}, $fmt
             );
           }
            : (function(dynamic $p, dynamic $x) use ($acc,$call2,$fix_int_precision,$fmt,$iconv,$k,$make_printf,$o,$trans) {
             $str = $fix_int_precision($p, $call2($trans, $iconv, $x));
             return $make_printf->contents($k, $o, Vector{4, $acc, $str}, $fmt
             );
           });
        }
        $p = $match[1];
        return function(dynamic $x) use ($acc,$call2,$fix_int_precision,$fmt,$iconv,$k,$make_printf,$o,$p,$trans) {
          $str = $fix_int_precision($p, $call2($trans, $iconv, $x));
          return $make_printf->contents($k, $o, Vector{4, $acc, $str}, $fmt);
        };
      }
      else {
        if (0 === $pad[0]) {
          $cX = $pad[2];
          $cY = $pad[1];
          if ($is_int($match)) {
            return 0 === $match
              ? function(dynamic $x) use ($acc,$cX,$cY,$call2,$fix_padding,$fmt,$iconv,$k,$make_printf,$o,$trans) {
               $str = $fix_padding($cY, $cX, $call2($trans, $iconv, $x));
               return $make_printf->contents(
                 $k,
                 $o,
                 Vector{4, $acc, $str},
                 $fmt
               );
             }
              : (function(dynamic $p, dynamic $x) use ($acc,$cX,$cY,$call2,$fix_int_precision,$fix_padding,$fmt,$iconv,$k,$make_printf,$o,$trans) {
               $str = $fix_padding(
                 $cY,
                 $cX,
                 $fix_int_precision($p, $call2($trans, $iconv, $x))
               );
               return $make_printf->contents(
                 $k,
                 $o,
                 Vector{4, $acc, $str},
                 $fmt
               );
             });
          }
          $p__0 = $match[1];
          return function(dynamic $x) use ($acc,$cX,$cY,$call2,$fix_int_precision,$fix_padding,$fmt,$iconv,$k,$make_printf,$o,$p__0,$trans) {
            $str = $fix_padding(
              $cY,
              $cX,
              $fix_int_precision($p__0, $call2($trans, $iconv, $x))
            );
            return $make_printf->contents($k, $o, Vector{4, $acc, $str}, $fmt);
          };
        }
        $cZ = $pad[1];
        if ($is_int($match)) {
          return 0 === $match
            ? function(dynamic $w, dynamic $x) use ($acc,$cZ,$call2,$fix_padding,$fmt,$iconv,$k,$make_printf,$o,$trans) {
             $str = $fix_padding($cZ, $w, $call2($trans, $iconv, $x));
             return $make_printf->contents($k, $o, Vector{4, $acc, $str}, $fmt
             );
           }
            : (function(dynamic $w, dynamic $p, dynamic $x) use ($acc,$cZ,$call2,$fix_int_precision,$fix_padding,$fmt,$iconv,$k,$make_printf,$o,$trans) {
             $str = $fix_padding(
               $cZ,
               $w,
               $fix_int_precision($p, $call2($trans, $iconv, $x))
             );
             return $make_printf->contents($k, $o, Vector{4, $acc, $str}, $fmt
             );
           });
        }
        $p__1 = $match[1];
        return function(dynamic $w, dynamic $x) use ($acc,$cZ,$call2,$fix_int_precision,$fix_padding,$fmt,$iconv,$k,$make_printf,$o,$p__1,$trans) {
          $str = $fix_padding(
            $cZ,
            $w,
            $fix_int_precision($p__1, $call2($trans, $iconv, $x))
          );
          return $make_printf->contents($k, $o, Vector{4, $acc, $str}, $fmt);
        };
      }
    };
    $make_padding = function
    (dynamic $k, dynamic $o, dynamic $acc, dynamic $fmt, dynamic $pad, dynamic $trans) use ($call1,$fix_padding,$is_int,$make_printf) {
      if ($is_int($pad)) {
        return function(dynamic $x) use ($acc,$call1,$fmt,$k,$make_printf,$o,$trans) {
          $new_acc = Vector{4, $acc, $call1($trans, $x)};
          return $make_printf->contents($k, $o, $new_acc, $fmt);
        };
      }
      else {
        if (0 === $pad[0]) {
          $width = $pad[2];
          $padty = $pad[1];
          return function(dynamic $x) use ($acc,$call1,$fix_padding,$fmt,$k,$make_printf,$o,$padty,$trans,$width) {
            $new_acc = Vector{
              4,
              $acc,
              $fix_padding($padty, $width, $call1($trans, $x))
            };
            return $make_printf->contents($k, $o, $new_acc, $fmt);
          };
        }
        $padty__0 = $pad[1];
        return function(dynamic $w, dynamic $x) use ($acc,$call1,$fix_padding,$fmt,$k,$make_printf,$o,$padty__0,$trans) {
          $new_acc = Vector{
            4,
            $acc,
            $fix_padding($padty__0, $w, $call1($trans, $x))
          };
          return $make_printf->contents($k, $o, $new_acc, $fmt);
        };
      }
    };
    $make_printf__0 = function
    (dynamic $counter, dynamic $k, dynamic $o, dynamic $acc, dynamic $fmt) use ($Assert_failure,$CamlinternalFormatBasics,$Pervasives,$call1,$call2,$caml_format_int,$caml_trampoline_return,$convert_int,$convert_int32,$convert_int64,$convert_nativeint,$cst_Printf_bad_conversion,$cst_u__0,$format_caml_char,$is_int,$make_custom__0,$make_float_padding_precision,$make_ignored_param__0,$make_int_padding_precision,$make_padding,$make_printf,$q,$recast,$runtime,$string_of_fmtty,$string_to_caml_string) {
      $k__0 = $k;
      $acc__0 = $acc;
      $fmt__0 = $fmt;
      for (;;) if (
        $is_int($fmt__0)
      ) {return $call2($k__0, $o, $acc__0);}
      else {
        switch($fmt__0[0]) {
          // FALLTHROUGH
          case 0:
            $rest = $fmt__0[1];
            return function(dynamic $c) use ($acc__0,$k__0,$make_printf,$o,$rest) {
              $new_acc = Vector{5, $acc__0, $c};
              return $make_printf->contents($k__0, $o, $new_acc, $rest);
            };
          // FALLTHROUGH
          case 1:
            $rest__0 = $fmt__0[1];
            return function(dynamic $c) use ($acc__0,$format_caml_char,$k__0,$make_printf,$o,$rest__0) {
              $new_acc = Vector{4, $acc__0, $format_caml_char($c)};
              return $make_printf->contents($k__0, $o, $new_acc, $rest__0);
            };
          // FALLTHROUGH
          case 2:
            $rest__1 = $fmt__0[2];
            $pad = $fmt__0[1];
            return $make_padding(
              $k__0,
              $o,
              $acc__0,
              $rest__1,
              $pad,
              function(dynamic $str) {return $str;}
            );
          // FALLTHROUGH
          case 3:
            $rest__2 = $fmt__0[2];
            $pad__0 = $fmt__0[1];
            return $make_padding(
              $k__0,
              $o,
              $acc__0,
              $rest__2,
              $pad__0,
              $string_to_caml_string
            );
          // FALLTHROUGH
          case 4:
            $rest__3 = $fmt__0[4];
            $prec = $fmt__0[3];
            $pad__1 = $fmt__0[2];
            $iconv = $fmt__0[1];
            return $make_int_padding_precision(
              $k__0,
              $o,
              $acc__0,
              $rest__3,
              $pad__1,
              $prec,
              $convert_int,
              $iconv
            );
          // FALLTHROUGH
          case 5:
            $rest__4 = $fmt__0[4];
            $prec__0 = $fmt__0[3];
            $pad__2 = $fmt__0[2];
            $iconv__0 = $fmt__0[1];
            return $make_int_padding_precision(
              $k__0,
              $o,
              $acc__0,
              $rest__4,
              $pad__2,
              $prec__0,
              $convert_int32,
              $iconv__0
            );
          // FALLTHROUGH
          case 6:
            $rest__5 = $fmt__0[4];
            $prec__1 = $fmt__0[3];
            $pad__3 = $fmt__0[2];
            $iconv__1 = $fmt__0[1];
            return $make_int_padding_precision(
              $k__0,
              $o,
              $acc__0,
              $rest__5,
              $pad__3,
              $prec__1,
              $convert_nativeint,
              $iconv__1
            );
          // FALLTHROUGH
          case 7:
            $rest__6 = $fmt__0[4];
            $prec__2 = $fmt__0[3];
            $pad__4 = $fmt__0[2];
            $iconv__2 = $fmt__0[1];
            return $make_int_padding_precision(
              $k__0,
              $o,
              $acc__0,
              $rest__6,
              $pad__4,
              $prec__2,
              $convert_int64,
              $iconv__2
            );
          // FALLTHROUGH
          case 8:
            $rest__7 = $fmt__0[4];
            $prec__3 = $fmt__0[3];
            $pad__5 = $fmt__0[2];
            $fconv = $fmt__0[1];
            return $make_float_padding_precision(
              $k__0,
              $o,
              $acc__0,
              $rest__7,
              $pad__5,
              $prec__3,
              $fconv
            );
          // FALLTHROUGH
          case 9:
            $rest__8 = $fmt__0[2];
            $pad__6 = $fmt__0[1];
            return $make_padding(
              $k__0,
              $o,
              $acc__0,
              $rest__8,
              $pad__6,
              $Pervasives[18]
            );
          // FALLTHROUGH
          case 10:
            $fmt__1 = $fmt__0[1];
            $acc__1 = Vector{7, $acc__0};
            $acc__0 = $acc__1;
            $fmt__0 = $fmt__1;
            continue;
          // FALLTHROUGH
          case 11:
            $fmt__2 = $fmt__0[2];
            $str = $fmt__0[1];
            $acc__2 = Vector{2, $acc__0, $str};
            $acc__0 = $acc__2;
            $fmt__0 = $fmt__2;
            continue;
          // FALLTHROUGH
          case 12:
            $fmt__3 = $fmt__0[2];
            $chr = $fmt__0[1];
            $acc__3 = Vector{3, $acc__0, $chr};
            $acc__0 = $acc__3;
            $fmt__0 = $fmt__3;
            continue;
          // FALLTHROUGH
          case 13:
            $rest__9 = $fmt__0[3];
            $sub_fmtty = $fmt__0[2];
            $ty = $string_of_fmtty($sub_fmtty);
            return function(dynamic $str) use ($acc__0,$k__0,$make_printf,$o,$rest__9,$ty) {
              return $make_printf->contents(
                $k__0,
                $o,
                Vector{4, $acc__0, $ty},
                $rest__9
              );
            };
          // FALLTHROUGH
          case 14:
            $rest__10 = $fmt__0[3];
            $fmtty = $fmt__0[2];
            return function(dynamic $param) use ($CamlinternalFormatBasics,$acc__0,$call2,$fmtty,$k__0,$make_printf,$o,$recast,$rest__10) {
              $fmt = $param[1];
              $cW = $recast($fmt, $fmtty);
              return $make_printf->contents(
                $k__0,
                $o,
                $acc__0,
                $call2($CamlinternalFormatBasics[3], $cW, $rest__10)
              );
            };
          // FALLTHROUGH
          case 15:
            $rest__11 = $fmt__0[1];
            return function(dynamic $f, dynamic $x) use ($acc__0,$call2,$k__0,$make_printf,$o,$rest__11) {
              return $make_printf->contents(
                $k__0,
                $o,
                Vector{
                  6,
                  $acc__0,
                  function(dynamic $o) use ($call2,$f,$x) {
                    return $call2($f, $o, $x);
                  }
                },
                $rest__11
              );
            };
          // FALLTHROUGH
          case 16:
            $rest__12 = $fmt__0[1];
            return function(dynamic $f) use ($acc__0,$k__0,$make_printf,$o,$rest__12) {
              return $make_printf->contents(
                $k__0,
                $o,
                Vector{6, $acc__0, $f},
                $rest__12
              );
            };
          // FALLTHROUGH
          case 17:
            $fmt__4 = $fmt__0[2];
            $fmting_lit = $fmt__0[1];
            $acc__4 = Vector{0, $acc__0, $fmting_lit};
            $acc__0 = $acc__4;
            $fmt__0 = $fmt__4;
            continue;
          // FALLTHROUGH
          case 18:
            $cU = $fmt__0[1];
            if (0 === $cU[0]) {
              $rest__13 = $fmt__0[2];
              $match = $cU[1];
              $fmt__5 = $match[1];
              $k__3 = function(dynamic $acc, dynamic $k, dynamic $rest) use ($make_printf) {
                $k__0 = function(dynamic $koc, dynamic $kacc) use ($acc,$k,$make_printf,$rest) {
                  return $make_printf->contents(
                    $k,
                    $koc,
                    Vector{1, $acc, Vector{0, $kacc}},
                    $rest
                  );
                };
                return $k__0;
              };
              $k__1 = $k__3($acc__0, $k__0, $rest__13);
              $k__0 = $k__1;
              $acc__0 = 0;
              $fmt__0 = $fmt__5;
              continue;
            }
            $rest__14 = $fmt__0[2];
            $match__0 = $cU[1];
            $fmt__6 = $match__0[1];
            $k__4 = function(dynamic $acc, dynamic $k, dynamic $rest) use ($make_printf) {
              $k__0 = function(dynamic $koc, dynamic $kacc) use ($acc,$k,$make_printf,$rest) {
                return $make_printf->contents(
                  $k,
                  $koc,
                  Vector{1, $acc, Vector{1, $kacc}},
                  $rest
                );
              };
              return $k__0;
            };
            $k__2 = $k__4($acc__0, $k__0, $rest__14);
            $k__0 = $k__2;
            $acc__0 = 0;
            $fmt__0 = $fmt__6;
            continue;
          // FALLTHROUGH
          case 19:
            throw $runtime["caml_wrap_thrown_exception"](Vector{0, $Assert_failure, $q}) as \Throwable;
          // FALLTHROUGH
          case 20:
            $rest__15 = $fmt__0[3];
            $new_acc = Vector{8, $acc__0, $cst_Printf_bad_conversion};
            return function(dynamic $param) use ($k__0,$make_printf,$new_acc,$o,$rest__15) {
              return $make_printf->contents($k__0, $o, $new_acc, $rest__15);
            };
          // FALLTHROUGH
          case 21:
            $rest__16 = $fmt__0[2];
            return function(dynamic $n) use ($acc__0,$caml_format_int,$cst_u__0,$k__0,$make_printf,$o,$rest__16) {
              $new_acc = Vector{4, $acc__0, $caml_format_int($cst_u__0, $n)};
              return $make_printf->contents($k__0, $o, $new_acc, $rest__16);
            };
          // FALLTHROUGH
          case 22:
            $rest__17 = $fmt__0[1];
            return function(dynamic $c) use ($acc__0,$k__0,$make_printf,$o,$rest__17) {
              $new_acc = Vector{5, $acc__0, $c};
              return $make_printf->contents($k__0, $o, $new_acc, $rest__17);
            };
          // FALLTHROUGH
          case 23:
            $rest__18 = $fmt__0[2];
            $ign = $fmt__0[1];
            if ($counter < 50) {
              $counter__1 = (int) ($counter + 1);
              return $make_ignored_param__0->contents(
                $counter__1,
                $k__0,
                $o,
                $acc__0,
                $ign,
                $rest__18
              );
            }
            return $caml_trampoline_return(
              $make_ignored_param__0->contents,
              varray[0,$k__0,$o,$acc__0,$ign,$rest__18]
            );
          // FALLTHROUGH
          default:
            $rest__19 = $fmt__0[3];
            $f = $fmt__0[2];
            $arity = $fmt__0[1];
            $cV = $call1($f, 0);
            if ($counter < 50) {
              $counter__0 = (int) ($counter + 1);
              return $make_custom__0->contents(
                $counter__0,
                $k__0,
                $o,
                $acc__0,
                $rest__19,
                $arity,
                $cV
              );
            }
            return $caml_trampoline_return(
              $make_custom__0->contents,
              varray[0,$k__0,$o,$acc__0,$rest__19,$arity,$cV]
            );
          }
      }
    };
    $make_ignored_param__0->contents = function
    (dynamic $counter, dynamic $k, dynamic $o, dynamic $acc, dynamic $ign, dynamic $fmt) use ($Assert_failure,$caml_trampoline_return,$is_int,$make_from_fmtty__0,$make_invalid_arg,$r,$runtime) {
      if ($is_int($ign)) {
        switch($ign) {
          // FALLTHROUGH
          case 0:
            if ($counter < 50) {
              $counter__0 = (int) ($counter + 1);
              return $make_invalid_arg->contents(
                $counter__0,
                $k,
                $o,
                $acc,
                $fmt
              );
            }
            return $caml_trampoline_return(
              $make_invalid_arg->contents,
              varray[0,$k,$o,$acc,$fmt]
            );
          // FALLTHROUGH
          case 1:
            if ($counter < 50) {
              $counter__1 = (int) ($counter + 1);
              return $make_invalid_arg->contents(
                $counter__1,
                $k,
                $o,
                $acc,
                $fmt
              );
            }
            return $caml_trampoline_return(
              $make_invalid_arg->contents,
              varray[0,$k,$o,$acc,$fmt]
            );
          // FALLTHROUGH
          case 2:
            throw $runtime["caml_wrap_thrown_exception"](Vector{0, $Assert_failure, $r}) as \Throwable;
          // FALLTHROUGH
          default:
            if ($counter < 50) {
              $counter__2 = (int) ($counter + 1);
              return $make_invalid_arg->contents(
                $counter__2,
                $k,
                $o,
                $acc,
                $fmt
              );
            }
            return $caml_trampoline_return(
              $make_invalid_arg->contents,
              varray[0,$k,$o,$acc,$fmt]
            );
          }
      }
      else {
        switch($ign[0]) {
          // FALLTHROUGH
          case 0:
            if ($counter < 50) {
              $counter__3 = (int) ($counter + 1);
              return $make_invalid_arg->contents(
                $counter__3,
                $k,
                $o,
                $acc,
                $fmt
              );
            }
            return $caml_trampoline_return(
              $make_invalid_arg->contents,
              varray[0,$k,$o,$acc,$fmt]
            );
          // FALLTHROUGH
          case 1:
            if ($counter < 50) {
              $counter__4 = (int) ($counter + 1);
              return $make_invalid_arg->contents(
                $counter__4,
                $k,
                $o,
                $acc,
                $fmt
              );
            }
            return $caml_trampoline_return(
              $make_invalid_arg->contents,
              varray[0,$k,$o,$acc,$fmt]
            );
          // FALLTHROUGH
          case 2:
            if ($counter < 50) {
              $counter__5 = (int) ($counter + 1);
              return $make_invalid_arg->contents(
                $counter__5,
                $k,
                $o,
                $acc,
                $fmt
              );
            }
            return $caml_trampoline_return(
              $make_invalid_arg->contents,
              varray[0,$k,$o,$acc,$fmt]
            );
          // FALLTHROUGH
          case 3:
            if ($counter < 50) {
              $counter__6 = (int) ($counter + 1);
              return $make_invalid_arg->contents(
                $counter__6,
                $k,
                $o,
                $acc,
                $fmt
              );
            }
            return $caml_trampoline_return(
              $make_invalid_arg->contents,
              varray[0,$k,$o,$acc,$fmt]
            );
          // FALLTHROUGH
          case 4:
            if ($counter < 50) {
              $counter__7 = (int) ($counter + 1);
              return $make_invalid_arg->contents(
                $counter__7,
                $k,
                $o,
                $acc,
                $fmt
              );
            }
            return $caml_trampoline_return(
              $make_invalid_arg->contents,
              varray[0,$k,$o,$acc,$fmt]
            );
          // FALLTHROUGH
          case 5:
            if ($counter < 50) {
              $counter__8 = (int) ($counter + 1);
              return $make_invalid_arg->contents(
                $counter__8,
                $k,
                $o,
                $acc,
                $fmt
              );
            }
            return $caml_trampoline_return(
              $make_invalid_arg->contents,
              varray[0,$k,$o,$acc,$fmt]
            );
          // FALLTHROUGH
          case 6:
            if ($counter < 50) {
              $counter__9 = (int) ($counter + 1);
              return $make_invalid_arg->contents(
                $counter__9,
                $k,
                $o,
                $acc,
                $fmt
              );
            }
            return $caml_trampoline_return(
              $make_invalid_arg->contents,
              varray[0,$k,$o,$acc,$fmt]
            );
          // FALLTHROUGH
          case 7:
            if ($counter < 50) {
              $counter__10 = (int) ($counter + 1);
              return $make_invalid_arg->contents(
                $counter__10,
                $k,
                $o,
                $acc,
                $fmt
              );
            }
            return $caml_trampoline_return(
              $make_invalid_arg->contents,
              varray[0,$k,$o,$acc,$fmt]
            );
          // FALLTHROUGH
          case 8:
            if ($counter < 50) {
              $counter__11 = (int) ($counter + 1);
              return $make_invalid_arg->contents(
                $counter__11,
                $k,
                $o,
                $acc,
                $fmt
              );
            }
            return $caml_trampoline_return(
              $make_invalid_arg->contents,
              varray[0,$k,$o,$acc,$fmt]
            );
          // FALLTHROUGH
          case 9:
            $fmtty = $ign[2];
            if ($counter < 50) {
              $counter__14 = (int) ($counter + 1);
              return $make_from_fmtty__0->contents(
                $counter__14,
                $k,
                $o,
                $acc,
                $fmtty,
                $fmt
              );
            }
            return $caml_trampoline_return(
              $make_from_fmtty__0->contents,
              varray[0,$k,$o,$acc,$fmtty,$fmt]
            );
          // FALLTHROUGH
          case 10:
            if ($counter < 50) {
              $counter__12 = (int) ($counter + 1);
              return $make_invalid_arg->contents(
                $counter__12,
                $k,
                $o,
                $acc,
                $fmt
              );
            }
            return $caml_trampoline_return(
              $make_invalid_arg->contents,
              varray[0,$k,$o,$acc,$fmt]
            );
          // FALLTHROUGH
          default:
            if ($counter < 50) {
              $counter__13 = (int) ($counter + 1);
              return $make_invalid_arg->contents(
                $counter__13,
                $k,
                $o,
                $acc,
                $fmt
              );
            }
            return $caml_trampoline_return(
              $make_invalid_arg->contents,
              varray[0,$k,$o,$acc,$fmt]
            );
          }
      }
    };
    $make_from_fmtty__0->contents = function
    (dynamic $counter, dynamic $k, dynamic $o, dynamic $acc, dynamic $fmtty, dynamic $fmt) use ($Assert_failure,$CamlinternalFormatBasics,$call2,$caml_trampoline_return,$is_int,$make_from_fmtty,$make_invalid_arg,$runtime,$s,$symm,$t,$trans) {
      if ($is_int($fmtty)) {
        if ($counter < 50) {
          $counter__0 = (int) ($counter + 1);
          return $make_invalid_arg->contents($counter__0, $k, $o, $acc, $fmt);
        }
        return $caml_trampoline_return(
          $make_invalid_arg->contents,
          varray[0,$k,$o,$acc,$fmt]
        );
      }
      else {
        switch($fmtty[0]) {
          // FALLTHROUGH
          case 0:
            $rest = $fmtty[1];
            return function(dynamic $param) use ($acc,$fmt,$k,$make_from_fmtty,$o,$rest) {
              return $make_from_fmtty->contents($k, $o, $acc, $rest, $fmt);
            };
          // FALLTHROUGH
          case 1:
            $rest__0 = $fmtty[1];
            return function(dynamic $param) use ($acc,$fmt,$k,$make_from_fmtty,$o,$rest__0) {
              return $make_from_fmtty->contents($k, $o, $acc, $rest__0, $fmt);
            };
          // FALLTHROUGH
          case 2:
            $rest__1 = $fmtty[1];
            return function(dynamic $param) use ($acc,$fmt,$k,$make_from_fmtty,$o,$rest__1) {
              return $make_from_fmtty->contents($k, $o, $acc, $rest__1, $fmt);
            };
          // FALLTHROUGH
          case 3:
            $rest__2 = $fmtty[1];
            return function(dynamic $param) use ($acc,$fmt,$k,$make_from_fmtty,$o,$rest__2) {
              return $make_from_fmtty->contents($k, $o, $acc, $rest__2, $fmt);
            };
          // FALLTHROUGH
          case 4:
            $rest__3 = $fmtty[1];
            return function(dynamic $param) use ($acc,$fmt,$k,$make_from_fmtty,$o,$rest__3) {
              return $make_from_fmtty->contents($k, $o, $acc, $rest__3, $fmt);
            };
          // FALLTHROUGH
          case 5:
            $rest__4 = $fmtty[1];
            return function(dynamic $param) use ($acc,$fmt,$k,$make_from_fmtty,$o,$rest__4) {
              return $make_from_fmtty->contents($k, $o, $acc, $rest__4, $fmt);
            };
          // FALLTHROUGH
          case 6:
            $rest__5 = $fmtty[1];
            return function(dynamic $param) use ($acc,$fmt,$k,$make_from_fmtty,$o,$rest__5) {
              return $make_from_fmtty->contents($k, $o, $acc, $rest__5, $fmt);
            };
          // FALLTHROUGH
          case 7:
            $rest__6 = $fmtty[1];
            return function(dynamic $param) use ($acc,$fmt,$k,$make_from_fmtty,$o,$rest__6) {
              return $make_from_fmtty->contents($k, $o, $acc, $rest__6, $fmt);
            };
          // FALLTHROUGH
          case 8:
            $rest__7 = $fmtty[2];
            return function(dynamic $param) use ($acc,$fmt,$k,$make_from_fmtty,$o,$rest__7) {
              return $make_from_fmtty->contents($k, $o, $acc, $rest__7, $fmt);
            };
          // FALLTHROUGH
          case 9:
            $rest__8 = $fmtty[3];
            $ty2 = $fmtty[2];
            $ty1 = $fmtty[1];
            $ty = $trans->contents($symm->contents($ty1), $ty2);
            return function(dynamic $param) use ($CamlinternalFormatBasics,$acc,$call2,$fmt,$k,$make_from_fmtty,$o,$rest__8,$ty) {
              return $make_from_fmtty->contents(
                $k,
                $o,
                $acc,
                $call2($CamlinternalFormatBasics[1], $ty, $rest__8),
                $fmt
              );
            };
          // FALLTHROUGH
          case 10:
            $rest__9 = $fmtty[1];
            return function(dynamic $param, dynamic $cT) use ($acc,$fmt,$k,$make_from_fmtty,$o,$rest__9) {
              return $make_from_fmtty->contents($k, $o, $acc, $rest__9, $fmt);
            };
          // FALLTHROUGH
          case 11:
            $rest__10 = $fmtty[1];
            return function(dynamic $param) use ($acc,$fmt,$k,$make_from_fmtty,$o,$rest__10) {
              return $make_from_fmtty->contents($k, $o, $acc, $rest__10, $fmt);
            };
          // FALLTHROUGH
          case 12:
            $rest__11 = $fmtty[1];
            return function(dynamic $param) use ($acc,$fmt,$k,$make_from_fmtty,$o,$rest__11) {
              return $make_from_fmtty->contents($k, $o, $acc, $rest__11, $fmt);
            };
          // FALLTHROUGH
          case 13:
            throw $runtime["caml_wrap_thrown_exception"](Vector{0, $Assert_failure, $s}) as \Throwable;
          // FALLTHROUGH
          default:
            throw $runtime["caml_wrap_thrown_exception"](Vector{0, $Assert_failure, $t}) as \Throwable;
          }
      }
    };
    $make_invalid_arg->contents = function
    (dynamic $counter, dynamic $k, dynamic $o, dynamic $acc, dynamic $fmt) use ($caml_trampoline_return,$cst_Printf_bad_conversion__0,$make_printf__0) {
      $cS = Vector{8, $acc, $cst_Printf_bad_conversion__0};
      if ($counter < 50) {
        $counter__0 = (int) ($counter + 1);
        return $make_printf__0($counter__0, $k, $o, $cS, $fmt);
      }
      return $caml_trampoline_return($make_printf__0, varray[0,$k,$o,$cS,$fmt]
      );
    };
    $make_custom__0->contents = function
    (dynamic $counter, dynamic $k, dynamic $o, dynamic $acc, dynamic $rest, dynamic $arity, dynamic $f) use ($call1,$caml_trampoline_return,$make_custom,$make_printf__0) {
      if ($arity) {
        $arity__0 = $arity[1];
        return function(dynamic $x) use ($acc,$arity__0,$call1,$f,$k,$make_custom,$o,$rest) {
          return $make_custom->contents(
            $k,
            $o,
            $acc,
            $rest,
            $arity__0,
            $call1($f, $x)
          );
        };
      }
      $cR = Vector{4, $acc, $f};
      if ($counter < 50) {
        $counter__0 = (int) ($counter + 1);
        return $make_printf__0($counter__0, $k, $o, $cR, $rest);
      }
      return $caml_trampoline_return(
        $make_printf__0,
        varray[0,$k,$o,$cR,$rest]
      );
    };
    $make_printf->contents = function
    (dynamic $k, dynamic $o, dynamic $acc, dynamic $fmt) use ($caml_trampoline,$make_printf__0) {
      return $caml_trampoline($make_printf__0(0, $k, $o, $acc, $fmt));
    };
    $make_ignored_param = function
    (dynamic $k, dynamic $o, dynamic $acc, dynamic $ign, dynamic $fmt) use ($caml_trampoline,$make_ignored_param__0) {
      return $caml_trampoline(
        $make_ignored_param__0->contents(0, $k, $o, $acc, $ign, $fmt)
      );
    };
    $make_from_fmtty->contents = function
    (dynamic $k, dynamic $o, dynamic $acc, dynamic $fmtty, dynamic $fmt) use ($caml_trampoline,$make_from_fmtty__0) {
      return $caml_trampoline(
        $make_from_fmtty__0->contents(0, $k, $o, $acc, $fmtty, $fmt)
      );
    };
    $make_custom->contents = function
    (dynamic $k, dynamic $o, dynamic $acc, dynamic $rest, dynamic $arity, dynamic $f) use ($caml_trampoline,$make_custom__0) {
      return $caml_trampoline(
        $make_custom__0->contents(0, $k, $o, $acc, $rest, $arity, $f)
      );
    };
    $const__0 = function(dynamic $x, dynamic $param) {return $x;};
    $fn_of_padding_precision = function
    (dynamic $k, dynamic $o, dynamic $fmt, dynamic $pad, dynamic $prec) use ($const__0,$is_int,$make_iprintf) {
      if ($is_int($pad)) {
        if ($is_int($prec)) {
          if (0 === $prec) {
            $cn = $make_iprintf->contents($k, $o, $fmt);
            return function(dynamic $cF) use ($cn,$const__0) {
              return $const__0($cn, $cF);
            };
          }
          $co = $make_iprintf->contents($k, $o, $fmt);
          $cp = function(dynamic $cE) use ($co,$const__0) {
            return $const__0($co, $cE);
          };
          return function(dynamic $cD) use ($const__0,$cp) {
            return $const__0($cp, $cD);
          };
        }
        $cq = $make_iprintf->contents($k, $o, $fmt);
        return function(dynamic $cC) use ($const__0,$cq) {
          return $const__0($cq, $cC);
        };
      }
      else {
        if (0 === $pad[0]) {
          if ($is_int($prec)) {
            if (0 === $prec) {
              $cr = $make_iprintf->contents($k, $o, $fmt);
              return function(dynamic $cQ) use ($const__0,$cr) {
                return $const__0($cr, $cQ);
              };
            }
            $cs = $make_iprintf->contents($k, $o, $fmt);
            $ct = function(dynamic $cP) use ($const__0,$cs) {
              return $const__0($cs, $cP);
            };
            return function(dynamic $cO) use ($const__0,$ct) {
              return $const__0($ct, $cO);
            };
          }
          $cu = $make_iprintf->contents($k, $o, $fmt);
          return function(dynamic $cN) use ($const__0,$cu) {
            return $const__0($cu, $cN);
          };
        }
        if ($is_int($prec)) {
          if (0 === $prec) {
            $cv = $make_iprintf->contents($k, $o, $fmt);
            $cw = function(dynamic $cM) use ($const__0,$cv) {
              return $const__0($cv, $cM);
            };
            return function(dynamic $cL) use ($const__0,$cw) {
              return $const__0($cw, $cL);
            };
          }
          $cx = $make_iprintf->contents($k, $o, $fmt);
          $cy = function(dynamic $cK) use ($const__0,$cx) {
            return $const__0($cx, $cK);
          };
          $cz = function(dynamic $cJ) use ($const__0,$cy) {
            return $const__0($cy, $cJ);
          };
          return function(dynamic $cI) use ($const__0,$cz) {
            return $const__0($cz, $cI);
          };
        }
        $cA = $make_iprintf->contents($k, $o, $fmt);
        $cB = function(dynamic $cH) use ($cA,$const__0) {
          return $const__0($cA, $cH);
        };
        return function(dynamic $cG) use ($cB,$const__0) {
          return $const__0($cB, $cG);
        };
      }
    };
    $make_iprintf__0 = function
    (dynamic $counter, dynamic $k, dynamic $o, dynamic $fmt) use ($Assert_failure,$CamlinternalFormatBasics,$call1,$call2,$caml_trampoline_return,$const__0,$fn_of_custom_arity__0,$fn_of_padding_precision,$is_int,$make_ignored_param,$make_iprintf,$recast,$runtime,$u) {
      $k__0 = $k;
      $fmt__0 = $fmt;
      for (;;) if (
        $is_int($fmt__0)
      ) {return $call1($k__0, $o);}
      else {
        switch($fmt__0[0]) {
          // FALLTHROUGH
          case 0:
            $rest = $fmt__0[1];
            $bC = $make_iprintf->contents($k__0, $o, $rest);
            return function(dynamic $cm) use ($bC,$const__0) {
              return $const__0($bC, $cm);
            };
          // FALLTHROUGH
          case 1:
            $rest__0 = $fmt__0[1];
            $bD = $make_iprintf->contents($k__0, $o, $rest__0);
            return function(dynamic $cl) use ($bD,$const__0) {
              return $const__0($bD, $cl);
            };
          // FALLTHROUGH
          case 2:
            $bE = $fmt__0[1];
            if ($is_int($bE)) {
              $rest__1 = $fmt__0[2];
              $bF = $make_iprintf->contents($k__0, $o, $rest__1);
              return function(dynamic $ch) use ($bF,$const__0) {
                return $const__0($bF, $ch);
              };
            }
            else {
              if (0 === $bE[0]) {
                $rest__2 = $fmt__0[2];
                $bG = $make_iprintf->contents($k__0, $o, $rest__2);
                return function(dynamic $ck) use ($bG,$const__0) {
                  return $const__0($bG, $ck);
                };
              }
              $rest__3 = $fmt__0[2];
              $bH = $make_iprintf->contents($k__0, $o, $rest__3);
              $bI = function(dynamic $cj) use ($bH,$const__0) {
                return $const__0($bH, $cj);
              };
              return function(dynamic $ci) use ($bI,$const__0) {
                return $const__0($bI, $ci);
              };
            }
          // FALLTHROUGH
          case 3:
            $bJ = $fmt__0[1];
            if ($is_int($bJ)) {
              $rest__4 = $fmt__0[2];
              $bK = $make_iprintf->contents($k__0, $o, $rest__4);
              return function(dynamic $cd) use ($bK,$const__0) {
                return $const__0($bK, $cd);
              };
            }
            else {
              if (0 === $bJ[0]) {
                $rest__5 = $fmt__0[2];
                $bL = $make_iprintf->contents($k__0, $o, $rest__5);
                return function(dynamic $cg) use ($bL,$const__0) {
                  return $const__0($bL, $cg);
                };
              }
              $rest__6 = $fmt__0[2];
              $bM = $make_iprintf->contents($k__0, $o, $rest__6);
              $bN = function(dynamic $cf) use ($bM,$const__0) {
                return $const__0($bM, $cf);
              };
              return function(dynamic $ce) use ($bN,$const__0) {
                return $const__0($bN, $ce);
              };
            }
          // FALLTHROUGH
          case 4:
            $rest__7 = $fmt__0[4];
            $prec = $fmt__0[3];
            $pad = $fmt__0[2];
            return $fn_of_padding_precision($k__0, $o, $rest__7, $pad, $prec);
          // FALLTHROUGH
          case 5:
            $rest__8 = $fmt__0[4];
            $prec__0 = $fmt__0[3];
            $pad__0 = $fmt__0[2];
            return $fn_of_padding_precision(
              $k__0,
              $o,
              $rest__8,
              $pad__0,
              $prec__0
            );
          // FALLTHROUGH
          case 6:
            $rest__9 = $fmt__0[4];
            $prec__1 = $fmt__0[3];
            $pad__1 = $fmt__0[2];
            return $fn_of_padding_precision(
              $k__0,
              $o,
              $rest__9,
              $pad__1,
              $prec__1
            );
          // FALLTHROUGH
          case 7:
            $rest__10 = $fmt__0[4];
            $prec__2 = $fmt__0[3];
            $pad__2 = $fmt__0[2];
            return $fn_of_padding_precision(
              $k__0,
              $o,
              $rest__10,
              $pad__2,
              $prec__2
            );
          // FALLTHROUGH
          case 8:
            $rest__11 = $fmt__0[4];
            $prec__3 = $fmt__0[3];
            $pad__3 = $fmt__0[2];
            return $fn_of_padding_precision(
              $k__0,
              $o,
              $rest__11,
              $pad__3,
              $prec__3
            );
          // FALLTHROUGH
          case 9:
            $bO = $fmt__0[1];
            if ($is_int($bO)) {
              $rest__12 = $fmt__0[2];
              $bP = $make_iprintf->contents($k__0, $o, $rest__12);
              return function(dynamic $b_) use ($bP,$const__0) {
                return $const__0($bP, $b_);
              };
            }
            else {
              if (0 === $bO[0]) {
                $rest__13 = $fmt__0[2];
                $bQ = $make_iprintf->contents($k__0, $o, $rest__13);
                return function(dynamic $cc) use ($bQ,$const__0) {
                  return $const__0($bQ, $cc);
                };
              }
              $rest__14 = $fmt__0[2];
              $bR = $make_iprintf->contents($k__0, $o, $rest__14);
              $bS = function(dynamic $cb) use ($bR,$const__0) {
                return $const__0($bR, $cb);
              };
              return function(dynamic $ca) use ($bS,$const__0) {
                return $const__0($bS, $ca);
              };
            }
          // FALLTHROUGH
          case 10:
            $fmt__1 = $fmt__0[1];
            $fmt__0 = $fmt__1;
            continue;
          // FALLTHROUGH
          case 11:
            $fmt__2 = $fmt__0[2];
            $fmt__0 = $fmt__2;
            continue;
          // FALLTHROUGH
          case 12:
            $fmt__3 = $fmt__0[2];
            $fmt__0 = $fmt__3;
            continue;
          // FALLTHROUGH
          case 13:
            $rest__15 = $fmt__0[3];
            $bT = $make_iprintf->contents($k__0, $o, $rest__15);
            return function(dynamic $b9) use ($bT,$const__0) {
              return $const__0($bT, $b9);
            };
          // FALLTHROUGH
          case 14:
            $rest__16 = $fmt__0[3];
            $fmtty = $fmt__0[2];
            return function(dynamic $param) use ($CamlinternalFormatBasics,$call2,$fmtty,$k__0,$make_iprintf,$o,$recast,$rest__16) {
              $fmt = $param[1];
              $b8 = $recast($fmt, $fmtty);
              return $make_iprintf->contents(
                $k__0,
                $o,
                $call2($CamlinternalFormatBasics[3], $b8, $rest__16)
              );
            };
          // FALLTHROUGH
          case 15:
            $rest__17 = $fmt__0[1];
            $bU = $make_iprintf->contents($k__0, $o, $rest__17);
            $bV = function(dynamic $b7) use ($bU,$const__0) {
              return $const__0($bU, $b7);
            };
            return function(dynamic $b6) use ($bV,$const__0) {
              return $const__0($bV, $b6);
            };
          // FALLTHROUGH
          case 16:
            $rest__18 = $fmt__0[1];
            $bW = $make_iprintf->contents($k__0, $o, $rest__18);
            return function(dynamic $b5) use ($bW,$const__0) {
              return $const__0($bW, $b5);
            };
          // FALLTHROUGH
          case 17:
            $fmt__4 = $fmt__0[2];
            $fmt__0 = $fmt__4;
            continue;
          // FALLTHROUGH
          case 18:
            $bX = $fmt__0[1];
            if (0 === $bX[0]) {
              $rest__19 = $fmt__0[2];
              $match = $bX[1];
              $fmt__5 = $match[1];
              $k__3 = function(dynamic $k, dynamic $rest) use ($make_iprintf) {
                $k__0 = function(dynamic $koc) use ($k,$make_iprintf,$rest) {
                  return $make_iprintf->contents($k, $koc, $rest);
                };
                return $k__0;
              };
              $k__1 = $k__3($k__0, $rest__19);
              $k__0 = $k__1;
              $fmt__0 = $fmt__5;
              continue;
            }
            $rest__20 = $fmt__0[2];
            $match__0 = $bX[1];
            $fmt__6 = $match__0[1];
            $k__4 = function(dynamic $k, dynamic $rest) use ($make_iprintf) {
              $k__0 = function(dynamic $koc) use ($k,$make_iprintf,$rest) {
                return $make_iprintf->contents($k, $koc, $rest);
              };
              return $k__0;
            };
            $k__2 = $k__4($k__0, $rest__20);
            $k__0 = $k__2;
            $fmt__0 = $fmt__6;
            continue;
          // FALLTHROUGH
          case 19:
            throw $runtime["caml_wrap_thrown_exception"](Vector{0, $Assert_failure, $u}) as \Throwable;
          // FALLTHROUGH
          case 20:
            $rest__21 = $fmt__0[3];
            $bY = $make_iprintf->contents($k__0, $o, $rest__21);
            return function(dynamic $b4) use ($bY,$const__0) {
              return $const__0($bY, $b4);
            };
          // FALLTHROUGH
          case 21:
            $rest__22 = $fmt__0[2];
            $bZ = $make_iprintf->contents($k__0, $o, $rest__22);
            return function(dynamic $b3) use ($bZ,$const__0) {
              return $const__0($bZ, $b3);
            };
          // FALLTHROUGH
          case 22:
            $rest__23 = $fmt__0[1];
            $b0 = $make_iprintf->contents($k__0, $o, $rest__23);
            return function(dynamic $b2) use ($b0,$const__0) {
              return $const__0($b0, $b2);
            };
          // FALLTHROUGH
          case 23:
            $rest__24 = $fmt__0[2];
            $ign = $fmt__0[1];
            $b1 = 0;
            return $make_ignored_param(
              function(dynamic $x, dynamic $param) use ($call1,$k__0) {
                return $call1($k__0, $x);
              },
              $o,
              $b1,
              $ign,
              $rest__24
            );
          // FALLTHROUGH
          default:
            $rest__25 = $fmt__0[3];
            $arity = $fmt__0[1];
            if ($counter < 50) {
              $counter__0 = (int) ($counter + 1);
              return $fn_of_custom_arity__0->contents(
                $counter__0,
                $k__0,
                $o,
                $rest__25,
                $arity
              );
            }
            return $caml_trampoline_return(
              $fn_of_custom_arity__0->contents,
              varray[0,$k__0,$o,$rest__25,$arity]
            );
          }
      }
    };
    $fn_of_custom_arity__0->contents = function
    (dynamic $counter, dynamic $k, dynamic $o, dynamic $fmt, dynamic $param) use ($caml_trampoline_return,$const__0,$fn_of_custom_arity,$make_iprintf__0) {
      if ($param) {
        $arity = $param[1];
        $bA = $fn_of_custom_arity->contents($k, $o, $fmt, $arity);
        return function(dynamic $bB) use ($bA,$const__0) {
          return $const__0($bA, $bB);
        };
      }
      if ($counter < 50) {
        $counter__0 = (int) ($counter + 1);
        return $make_iprintf__0($counter__0, $k, $o, $fmt);
      }
      return $caml_trampoline_return($make_iprintf__0, varray[0,$k,$o,$fmt]);
    };
    $make_iprintf->contents = function(dynamic $k, dynamic $o, dynamic $fmt) use ($caml_trampoline,$make_iprintf__0) {
      return $caml_trampoline($make_iprintf__0(0, $k, $o, $fmt));
    };
    $fn_of_custom_arity->contents = function
    (dynamic $k, dynamic $o, dynamic $fmt, dynamic $param) use ($caml_trampoline,$fn_of_custom_arity__0) {
      return $caml_trampoline(
        $fn_of_custom_arity__0->contents(0, $k, $o, $fmt, $param)
      );
    };
    $output_acc->contents = function(dynamic $o, dynamic $acc) use ($Pervasives,$call1,$call2,$cst__17,$cst__18,$is_int,$output_acc,$string_of_formatting_lit) {
      $acc__0 = $acc;
      for (;;) if (
        $is_int($acc__0)
      ) {return 0;}
      else {
        switch($acc__0[0]) {
          // FALLTHROUGH
          case 0:
            $fmting_lit = $acc__0[2];
            $p = $acc__0[1];
            $s = $string_of_formatting_lit($fmting_lit);
            $output_acc->contents($o, $p);
            return $call2($Pervasives[54], $o, $s);
          // FALLTHROUGH
          case 1:
            $by = $acc__0[2];
            $bz = $acc__0[1];
            if (0 === $by[0]) {
              $acc__1 = $by[1];
              $output_acc->contents($o, $bz);
              $call2($Pervasives[54], $o, $cst__17);
              $acc__0 = $acc__1;
              continue;
            }
            $acc__2 = $by[1];
            $output_acc->contents($o, $bz);
            $call2($Pervasives[54], $o, $cst__18);
            $acc__0 = $acc__2;
            continue;
          // FALLTHROUGH
          case 6:
            $f = $acc__0[2];
            $p__2 = $acc__0[1];
            $output_acc->contents($o, $p__2);
            return $call1($f, $o);
          // FALLTHROUGH
          case 7:
            $p__3 = $acc__0[1];
            $output_acc->contents($o, $p__3);
            return $call1($Pervasives[51], $o);
          // FALLTHROUGH
          case 8:
            $msg = $acc__0[2];
            $p__4 = $acc__0[1];
            $output_acc->contents($o, $p__4);
            return $call1($Pervasives[1], $msg);
          // FALLTHROUGH
          case 2:
          // FALLTHROUGH
          case 4:
            $s__0 = $acc__0[2];
            $p__0 = $acc__0[1];
            $output_acc->contents($o, $p__0);
            return $call2($Pervasives[54], $o, $s__0);
          // FALLTHROUGH
          default:
            $c = $acc__0[2];
            $p__1 = $acc__0[1];
            $output_acc->contents($o, $p__1);
            return $call2($Pervasives[53], $o, $c);
          }
      }
    };
    $bufput_acc->contents = function(dynamic $b, dynamic $acc) use ($Buffer,$Pervasives,$bufput_acc,$call1,$call2,$cst__19,$cst__20,$is_int,$string_of_formatting_lit) {
      $acc__0 = $acc;
      for (;;) if (
        $is_int($acc__0)
      ) {return 0;}
      else {
        switch($acc__0[0]) {
          // FALLTHROUGH
          case 0:
            $fmting_lit = $acc__0[2];
            $p = $acc__0[1];
            $s = $string_of_formatting_lit($fmting_lit);
            $bufput_acc->contents($b, $p);
            return $call2($Buffer[14], $b, $s);
          // FALLTHROUGH
          case 1:
            $bw = $acc__0[2];
            $bx = $acc__0[1];
            if (0 === $bw[0]) {
              $acc__1 = $bw[1];
              $bufput_acc->contents($b, $bx);
              $call2($Buffer[14], $b, $cst__19);
              $acc__0 = $acc__1;
              continue;
            }
            $acc__2 = $bw[1];
            $bufput_acc->contents($b, $bx);
            $call2($Buffer[14], $b, $cst__20);
            $acc__0 = $acc__2;
            continue;
          // FALLTHROUGH
          case 6:
            $f = $acc__0[2];
            $p__2 = $acc__0[1];
            $bufput_acc->contents($b, $p__2);
            return $call1($f, $b);
          // FALLTHROUGH
          case 7:
            $acc__3 = $acc__0[1];
            $acc__0 = $acc__3;
            continue;
          // FALLTHROUGH
          case 8:
            $msg = $acc__0[2];
            $p__3 = $acc__0[1];
            $bufput_acc->contents($b, $p__3);
            return $call1($Pervasives[1], $msg);
          // FALLTHROUGH
          case 2:
          // FALLTHROUGH
          case 4:
            $s__0 = $acc__0[2];
            $p__0 = $acc__0[1];
            $bufput_acc->contents($b, $p__0);
            return $call2($Buffer[14], $b, $s__0);
          // FALLTHROUGH
          default:
            $c = $acc__0[2];
            $p__1 = $acc__0[1];
            $bufput_acc->contents($b, $p__1);
            return $call2($Buffer[10], $b, $c);
          }
      }
    };
    $strput_acc->contents = function(dynamic $b, dynamic $acc) use ($Buffer,$Pervasives,$call1,$call2,$cst__21,$cst__22,$is_int,$string_of_formatting_lit,$strput_acc) {
      $acc__0 = $acc;
      for (;;) if (
        $is_int($acc__0)
      ) {return 0;}
      else {
        switch($acc__0[0]) {
          // FALLTHROUGH
          case 0:
            $fmting_lit = $acc__0[2];
            $p = $acc__0[1];
            $s = $string_of_formatting_lit($fmting_lit);
            $strput_acc->contents($b, $p);
            return $call2($Buffer[14], $b, $s);
          // FALLTHROUGH
          case 1:
            $bt = $acc__0[2];
            $bu = $acc__0[1];
            if (0 === $bt[0]) {
              $acc__1 = $bt[1];
              $strput_acc->contents($b, $bu);
              $call2($Buffer[14], $b, $cst__21);
              $acc__0 = $acc__1;
              continue;
            }
            $acc__2 = $bt[1];
            $strput_acc->contents($b, $bu);
            $call2($Buffer[14], $b, $cst__22);
            $acc__0 = $acc__2;
            continue;
          // FALLTHROUGH
          case 6:
            $f = $acc__0[2];
            $p__2 = $acc__0[1];
            $strput_acc->contents($b, $p__2);
            $bv = $call1($f, 0);
            return $call2($Buffer[14], $b, $bv);
          // FALLTHROUGH
          case 7:
            $acc__3 = $acc__0[1];
            $acc__0 = $acc__3;
            continue;
          // FALLTHROUGH
          case 8:
            $msg = $acc__0[2];
            $p__3 = $acc__0[1];
            $strput_acc->contents($b, $p__3);
            return $call1($Pervasives[1], $msg);
          // FALLTHROUGH
          case 2:
          // FALLTHROUGH
          case 4:
            $s__0 = $acc__0[2];
            $p__0 = $acc__0[1];
            $strput_acc->contents($b, $p__0);
            return $call2($Buffer[14], $b, $s__0);
          // FALLTHROUGH
          default:
            $c = $acc__0[2];
            $p__1 = $acc__0[1];
            $strput_acc->contents($b, $p__1);
            return $call2($Buffer[10], $b, $c);
          }
      }
    };
    $failwith_message = function(dynamic $param) use ($Buffer,$Pervasives,$call1,$make_printf,$strput_acc) {
      $fmt = $param[1];
      $buf = $call1($Buffer[1], 256);
      $k = function(dynamic $param, dynamic $acc) use ($Buffer,$Pervasives,$buf,$call1,$strput_acc) {
        $strput_acc->contents($buf, $acc);
        $bs = $call1($Buffer[2], $buf);
        return $call1($Pervasives[2], $bs);
      };
      return $make_printf->contents($k, 0, 0, $fmt);
    };
    $open_box_of_string = function(dynamic $str) use ($Failure,$String,$call1,$call3,$caml_ml_string_length,$caml_string_get,$caml_string_notequal,$caml_wrap_exception,$cst__23,$cst__24,$cst_b,$cst_h,$cst_hov,$cst_hv,$cst_v,$failwith_message,$runtime,$unsigned_right_shift_32,$v,$w) {
      if ($runtime["caml_string_equal"]($str, $cst__23)) {return $v;}
      $len = $caml_ml_string_length($str);
      $invalid_box = function(dynamic $param) use ($call1,$failwith_message,$str,$w) {
        return $call1($failwith_message($w), $str);
      };
      $parse_spaces = function(dynamic $i) use ($caml_string_get,$len,$str) {
        $i__0 = $i;
        for (;;) {
          if ($i__0 === $len) {return $i__0;}
          $match = $caml_string_get($str, $i__0);
          if (9 !== $match) {if (32 !== $match) {return $i__0;}}
          $i__1 = (int) ($i__0 + 1);
          $i__0 = $i__1;
          continue;
        }
      };
      $parse_lword = function(dynamic $i, dynamic $j) use ($caml_string_get,$len,$str,$unsigned_right_shift_32) {
        $j__0 = $j;
        for (;;) {
          if ($j__0 === $len) {return $j__0;}
          $match = $caml_string_get($str, $j__0);
          $switcher = (int) ($match + -97);
          if (25 < $unsigned_right_shift_32($switcher, 0)) {return $j__0;}
          $j__1 = (int) ($j__0 + 1);
          $j__0 = $j__1;
          continue;
        }
      };
      $parse_int = function(dynamic $i, dynamic $j) use ($caml_string_get,$len,$str) {
        $j__0 = $j;
        for (;;) {
          if ($j__0 === $len) {return $j__0;}
          $match = $caml_string_get($str, $j__0);
          $switch__0 = 48 <= $match
            ? 58 <= $match ? 0 : (1)
            : (45 === $match ? 1 : (0));
          if ($switch__0) {$j__1 = (int) ($j__0 + 1);$j__0 = $j__1;continue;}
          return $j__0;
        }
      };
      $wstart = $parse_spaces(0);
      $wend = $parse_lword($wstart, $wstart);
      $box_name = $call3($String[4], $str, $wstart, (int) ($wend - $wstart));
      $nstart = $parse_spaces($wend);
      $nend = $parse_int($nstart, $nstart);
      if ($nstart === $nend) {$indent = 0;}
      else {
        try {
          $bq = $runtime["caml_int_of_string"](
            $call3($String[4], $str, $nstart, (int) ($nend - $nstart))
          );
          $indent = $bq;
        }
        catch(\Throwable $br) {
          $br = $caml_wrap_exception($br);
          if ($br[1] !== $Failure) {
            throw $runtime["caml_wrap_thrown_exception_reraise"]($br) as \Throwable;
          }
          $bp = $invalid_box(0);
          $indent = $bp;
        }
      }
      $exp_end = $parse_spaces($nend);
      if ($exp_end !== $len) {$invalid_box(0);}
      if ($caml_string_notequal($box_name, $cst__24)) {
        if ($caml_string_notequal($box_name, $cst_b)) {
          if ($caml_string_notequal($box_name, $cst_h)) {
            if ($caml_string_notequal($box_name, $cst_hov)) {
              if ($caml_string_notequal($box_name, $cst_hv)) {
                if ($caml_string_notequal($box_name, $cst_v)) {$box_type = $invalid_box(0);$switch__0 = 1;}
                else {$box_type = 1;$switch__0 = 1;}
              }
              else {$box_type = 2;$switch__0 = 1;}
            }
            else {$box_type = 3;$switch__0 = 1;}
          }
          else {$box_type = 0;$switch__0 = 1;}
        }
        else {$switch__0 = 0;}
      }
      else {$switch__0 = 0;}
      if (! $switch__0) {$box_type = 4;}
      return Vector{0, $indent, $box_type};
    };
    $make_padding_fmt_ebb = function(dynamic $pad, dynamic $fmt) use ($is_int) {
      if ($is_int($pad)) {
        return Vector{0, 0, $fmt};
      }
      else {
        if (0 === $pad[0]) {
          $w = $pad[2];
          $s = $pad[1];
          return Vector{0, Vector{0, $s, $w}, $fmt};
        }
        $s__0 = $pad[1];
        return Vector{0, Vector{1, $s__0}, $fmt};
      }
    };
    $make_precision_fmt_ebb = function(dynamic $prec, dynamic $fmt) use ($is_int) {
      if ($is_int($prec)) {
        return 0 === $prec ? Vector{0, 0, $fmt} : (Vector{0, 1, $fmt});
      }
      $p = $prec[1];
      return Vector{0, Vector{0, $p}, $fmt};
    };
    $make_padprec_fmt_ebb = function
    (dynamic $pad, dynamic $prec, dynamic $fmt) use ($is_int,$make_precision_fmt_ebb) {
      $match = $make_precision_fmt_ebb($prec, $fmt);
      $fmt__0 = $match[2];
      $prec__0 = $match[1];
      if ($is_int($pad)) {
        return Vector{0, 0, $prec__0, $fmt__0};
      }
      else {
        if (0 === $pad[0]) {
          $w = $pad[2];
          $s = $pad[1];
          return Vector{0, Vector{0, $s, $w}, $prec__0, $fmt__0};
        }
        $s__0 = $pad[1];
        return Vector{0, Vector{1, $s__0}, $prec__0, $fmt__0};
      }
    };
    $fmt_ebb_of_string = function(dynamic $legacy_behavior, dynamic $str) use ($A,$Assert_failure,$B,$C,$D,$E,$F,$Failure,$G,$H,$I,$J,$K,$L,$M,$N,$Not_found,$O,$P,$Pervasives,$Q,$R,$S,$String,$Sys,$T,$U,$V,$W,$add_in_char_set,$call1,$call2,$call3,$call4,$call5,$caml_ml_string_length,$caml_notequal,$caml_string_get,$caml_trampoline,$caml_trampoline_return,$caml_wrap_exception,$create_char_set,$cst_0,$cst_0__0,$cst_0__1,$cst_0__2,$cst__25,$cst__26,$cst__27,$cst__28,$cst__29,$cst__30,$cst__31,$cst__32,$cst__33,$cst__34,$cst__35,$cst__36,$cst__37,$cst__38,$cst__39,$cst_character,$cst_character__0,$cst_digit,$cst_non_zero_widths_are_unsupported_for_c_conversions,$cst_padding,$cst_padding__0,$cst_precision,$cst_precision__0,$cst_precision__1,$cst_precision__2,$cst_unexpected_end_of_format,$failwith_message,$fmtty_of_fmt,$formatting_lit,$freeze_char_set,$is_int,$make_padding_fmt_ebb,$make_padprec_fmt_ebb,$open_box_of_string,$rev_char_set,$runtime,$sub_format,$unsigned_right_shift_32,$x,$y,$z) {
      $check_open_box = new Ref();
      $compute_float_conv = new Ref();
      $compute_int_conv = new Ref();
      $counter_of_char = new Ref();
      $incompatible_flag = new Ref();
      $is_int_base = new Ref();
      $parse_after_at = new Ref();
      $parse_char_set = new Ref();
      $parse_format = new Ref();
      $parse_integer = new Ref();
      $parse_padding = new Ref();
      $parse_positive = new Ref();
      $parse_spaces = new Ref();
      $search_subformat_end = new Ref();
      if ($legacy_behavior) {
        $flag = $legacy_behavior[1];
        $legacy_behavior__0 = $flag;
      }
      else {$legacy_behavior__0 = 1;}
      $invalid_format_message = function(dynamic $str_ind, dynamic $msg) use ($call3,$failwith_message,$str,$x) {
        return $call3($failwith_message($x), $str, $str_ind, $msg);
      };
      $unexpected_end_of_format = function(dynamic $end_ind) use ($cst_unexpected_end_of_format,$invalid_format_message) {
        return $invalid_format_message($end_ind, $cst_unexpected_end_of_format
        );
      };
      $invalid_nonnull_char_width = function(dynamic $str_ind) use ($cst_non_zero_widths_are_unsupported_for_c_conversions,$invalid_format_message) {
        return $invalid_format_message(
          $str_ind,
          $cst_non_zero_widths_are_unsupported_for_c_conversions
        );
      };
      $invalid_format_without = function
      (dynamic $str_ind, dynamic $c, dynamic $s) use ($call4,$failwith_message,$str,$y) {
        return $call4($failwith_message($y), $str, $str_ind, $c, $s);
      };
      $expected_character = function
      (dynamic $str_ind, dynamic $expected, dynamic $read) use ($call4,$failwith_message,$str,$z) {
        return $call4($failwith_message($z), $str, $str_ind, $expected, $read);
      };
      $add_literal = function
      (dynamic $lit_start, dynamic $str_ind, dynamic $fmt) use ($String,$call3,$caml_string_get,$str) {
        $size = (int) ($str_ind - $lit_start);
        return 0 === $size
          ? Vector{0, $fmt}
          : (1 === $size
           ? Vector{0, Vector{12, $caml_string_get($str, $lit_start), $fmt}}
           : (Vector{
            0,
            Vector{11, $call3($String[4], $str, $lit_start, $size), $fmt}
          }));
      };
      $parse_literal = function
      (dynamic $lit_start, dynamic $str_ind, dynamic $end_ind) use ($add_literal,$caml_string_get,$parse_after_at,$parse_format,$str) {
        $str_ind__0 = $str_ind;
        for (;;) {
          if ($str_ind__0 === $end_ind) {
            return $add_literal($lit_start, $str_ind__0, 0);
          }
          $match = $caml_string_get($str, $str_ind__0);
          if (37 === $match) {
            $match__0 = $parse_format->contents($str_ind__0, $end_ind);
            $fmt_rest = $match__0[1];
            return $add_literal($lit_start, $str_ind__0, $fmt_rest);
          }
          if (64 === $match) {
            $match__1 = $parse_after_at->contents(
              (int)
              ($str_ind__0 + 1),
              $end_ind
            );
            $fmt_rest__0 = $match__1[1];
            return $add_literal($lit_start, $str_ind__0, $fmt_rest__0);
          }
          $str_ind__1 = (int) ($str_ind__0 + 1);
          $str_ind__0 = $str_ind__1;
          continue;
        }
      };
      $parse = function(dynamic $beg_ind, dynamic $end_ind) use ($parse_literal) {
        return $parse_literal($beg_ind, $beg_ind, $end_ind);
      };
      $parse_flags = function
      (dynamic $pct_ind, dynamic $str_ind, dynamic $end_ind, dynamic $ign) use ($A,$call3,$caml_string_get,$failwith_message,$legacy_behavior__0,$parse_padding,$str,$unexpected_end_of_format,$unsigned_right_shift_32) {
        $zero = Vector{0, 0};
        $minus = Vector{0, 0};
        $plus = Vector{0, 0};
        $space = Vector{0, 0};
        $hash = Vector{0, 0};
        $set_flag = function(dynamic $str_ind, dynamic $flag) use ($A,$call3,$caml_string_get,$failwith_message,$legacy_behavior__0,$str) {
          $bm = $flag[1];
          $bn = $bm ? 1 - $legacy_behavior__0 : ($bm);
          if ($bn) {
            $bo = $caml_string_get($str, $str_ind);
            $call3($failwith_message($A), $str, $str_ind, $bo);
          }
          $flag[1] = 1;
          return 0;
        };
        $read_flags = function(dynamic $str_ind) use ($caml_string_get,$end_ind,$hash,$ign,$minus,$parse_padding,$pct_ind,$plus,$set_flag,$space,$str,$unexpected_end_of_format,$unsigned_right_shift_32,$zero) {
          $str_ind__0 = $str_ind;
          for (;;) {
            if ($str_ind__0 === $end_ind) {
              $unexpected_end_of_format($end_ind);
            }
            $match = $caml_string_get($str, $str_ind__0);
            $switcher = (int) ($match + -32);
            if (! (16 < $unsigned_right_shift_32($switcher, 0))) {
              switch($switcher) {
                // FALLTHROUGH
                case 0:
                  $set_flag($str_ind__0, $space);
                  $str_ind__1 = (int) ($str_ind__0 + 1);
                  $str_ind__0 = $str_ind__1;
                  continue;
                // FALLTHROUGH
                case 3:
                  $set_flag($str_ind__0, $hash);
                  $str_ind__2 = (int) ($str_ind__0 + 1);
                  $str_ind__0 = $str_ind__2;
                  continue;
                // FALLTHROUGH
                case 11:
                  $set_flag($str_ind__0, $plus);
                  $str_ind__3 = (int) ($str_ind__0 + 1);
                  $str_ind__0 = $str_ind__3;
                  continue;
                // FALLTHROUGH
                case 13:
                  $set_flag($str_ind__0, $minus);
                  $str_ind__4 = (int) ($str_ind__0 + 1);
                  $str_ind__0 = $str_ind__4;
                  continue;
                // FALLTHROUGH
                case 16:
                  $set_flag($str_ind__0, $zero);
                  $str_ind__5 = (int) ($str_ind__0 + 1);
                  $str_ind__0 = $str_ind__5;
                  continue;
                }
            }
            return $parse_padding->contents(
              $pct_ind,
              $str_ind__0,
              $end_ind,
              $zero[1],
              $minus[1],
              $plus[1],
              $hash[1],
              $space[1],
              $ign
            );
          }
        };
        return $read_flags($str_ind);
      };
      $parse_ign = function
      (dynamic $pct_ind, dynamic $str_ind, dynamic $end_ind) use ($caml_string_get,$parse_flags,$str,$unexpected_end_of_format) {
        if ($str_ind === $end_ind) {$unexpected_end_of_format($end_ind);}
        $match = $caml_string_get($str, $str_ind);
        return 95 === $match
          ? $parse_flags($pct_ind, (int) ($str_ind + 1), $end_ind, 1)
          : ($parse_flags($pct_ind, $str_ind, $end_ind, 0));
      };
      $parse_format->contents = function(dynamic $pct_ind, dynamic $end_ind) use ($parse_ign) {
        return $parse_ign($pct_ind, (int) ($pct_ind + 1), $end_ind);
      };
      $parse_conversion = function
      (dynamic $pct_ind, dynamic $str_ind, dynamic $end_ind, dynamic $plus, dynamic $hash, dynamic $space, dynamic $ign, dynamic $pad, dynamic $prec, dynamic $padprec, dynamic $symb) use ($F,$G,$H,$I,$J,$K,$call3,$caml_notequal,$caml_string_get,$compute_float_conv,$compute_int_conv,$counter_of_char,$cst_0__0,$cst_0__1,$cst_0__2,$cst__25,$cst__26,$cst__27,$cst__28,$cst__29,$cst__30,$cst__31,$cst__32,$cst_padding__0,$cst_precision__0,$cst_precision__1,$cst_precision__2,$failwith_message,$fmtty_of_fmt,$incompatible_flag,$invalid_nonnull_char_width,$is_int,$is_int_base,$legacy_behavior__0,$make_padding_fmt_ebb,$make_padprec_fmt_ebb,$parse,$parse_char_set,$search_subformat_end,$str) {
        $plus_used = Vector{0, 0};
        $hash_used = Vector{0, 0};
        $space_used = Vector{0, 0};
        $ign_used = Vector{0, 0};
        $pad_used = Vector{0, 0};
        $prec_used = Vector{0, 0};
        $get_plus = function(dynamic $param) use ($plus,$plus_used) {
          $plus_used[1] = 1;
          return $plus;
        };
        $get_hash = function(dynamic $param) use ($hash,$hash_used) {
          $hash_used[1] = 1;
          return $hash;
        };
        $get_space = function(dynamic $param) use ($space,$space_used) {
          $space_used[1] = 1;
          return $space;
        };
        $get_ign = function(dynamic $param) use ($ign,$ign_used) {
          $ign_used[1] = 1;
          return $ign;
        };
        $get_pad = function(dynamic $param) use ($pad,$pad_used) {
          $pad_used[1] = 1;
          return $pad;
        };
        $get_prec = function(dynamic $param) use ($prec,$prec_used) {
          $prec_used[1] = 1;
          return $prec;
        };
        $get_padprec = function(dynamic $param) use ($pad_used,$padprec) {
          $pad_used[1] = 1;
          return $padprec;
        };
        $get_int_pad = function(dynamic $param) use ($F,$cst_precision__0,$cst_precision__1,$get_pad,$get_prec,$incompatible_flag,$is_int,$legacy_behavior__0,$pct_ind,$str_ind) {
          $pad = $get_pad(0);
          $match = $get_prec(0);
          if ($is_int($match)) {if (0 === $match) {return $pad;}}
          if ($is_int($pad)) {return 0;}
          else {
            if (0 === $pad[0]) {
              if (2 <= $pad[1]) {
                $n = $pad[2];
                return $legacy_behavior__0
                  ? Vector{0, 1, $n}
                  : ($incompatible_flag->contents(
                   $pct_ind,
                   $str_ind,
                   48,
                   $cst_precision__0
                 ));
              }
              return $pad;
            }
            return 2 <= $pad[1]
              ? $legacy_behavior__0
               ? $F
               : ($incompatible_flag->contents(
                $pct_ind,
                $str_ind,
                48,
                $cst_precision__1
              ))
              : ($pad);
          }
        };
        $check_no_0 = function(dynamic $symb, dynamic $pad) use ($G,$cst_0__0,$cst_0__1,$incompatible_flag,$is_int,$legacy_behavior__0,$pct_ind,$str_ind) {
          if ($is_int($pad)) {return $pad;}
          else {
            if (0 === $pad[0]) {
              if (2 <= $pad[1]) {
                $width = $pad[2];
                return $legacy_behavior__0
                  ? Vector{0, 1, $width}
                  : ($incompatible_flag->contents(
                   $pct_ind,
                   $str_ind,
                   $symb,
                   $cst_0__0
                 ));
              }
              return $pad;
            }
            return 2 <= $pad[1]
              ? $legacy_behavior__0
               ? $G
               : ($incompatible_flag->contents(
                $pct_ind,
                $str_ind,
                $symb,
                $cst_0__1
              ))
              : ($pad);
          }
        };
        $opt_of_pad = function(dynamic $c, dynamic $pad) use ($cst_0__2,$cst__25,$cst__26,$incompatible_flag,$is_int,$legacy_behavior__0,$pct_ind,$str_ind) {
          if ($is_int($pad)) {return 0;}
          else {
            if (0 === $pad[0]) {
              switch($pad[1]) {
                // FALLTHROUGH
                case 0:
                  $width = $pad[2];
                  return $legacy_behavior__0
                    ? Vector{0, $width}
                    : ($incompatible_flag->contents(
                     $pct_ind,
                     $str_ind,
                     $c,
                     $cst__25
                   ));
                // FALLTHROUGH
                case 1:
                  $width__0 = $pad[2];
                  return Vector{0, $width__0};
                // FALLTHROUGH
                default:
                  $width__1 = $pad[2];
                  return $legacy_behavior__0
                    ? Vector{0, $width__1}
                    : ($incompatible_flag->contents(
                     $pct_ind,
                     $str_ind,
                     $c,
                     $cst_0__2
                   ));
                }
            }
            return $incompatible_flag->contents(
              $pct_ind,
              $str_ind,
              $c,
              $cst__26
            );
          }
        };
        $get_pad_opt = function(dynamic $c) use ($get_pad,$opt_of_pad) {
          return $opt_of_pad($c, $get_pad(0));
        };
        $get_padprec_opt = function(dynamic $c) use ($get_padprec,$opt_of_pad) {
          return $opt_of_pad($c, $get_padprec(0));
        };
        $get_prec_opt = function(dynamic $param) use ($cst__27,$get_prec,$incompatible_flag,$is_int,$pct_ind,$str_ind) {
          $match = $get_prec(0);
          if ($is_int($match)) {
            return 0 === $match
              ? 0
              : ($incompatible_flag->contents($pct_ind, $str_ind, 95, $cst__27
             ));
          }
          $ndec = $match[1];
          return Vector{0, $ndec};
        };
        if (124 <= $symb) {$switch__0 = 0;}
        else {
          switch($symb) {
            // FALLTHROUGH
            case 33:
              $match__5 = $parse($str_ind, $end_ind);
              $fmt_rest__5 = $match__5[1];
              $fmt_result = Vector{0, Vector{10, $fmt_rest__5}};
              $switch__0 = 1;
              break;
            // FALLTHROUGH
            case 40:
              $sub_end = $search_subformat_end->contents(
                $str_ind,
                $end_ind,
                41
              );
              $match__7 = $parse((int) ($sub_end + 2), $end_ind);
              $fmt_rest__7 = $match__7[1];
              $match__8 = $parse($str_ind, $sub_end);
              $sub_fmt = $match__8[1];
              $sub_fmtty = $fmtty_of_fmt->contents($sub_fmt);
              if ($get_ign(0)) {
                $ignored__2 = Vector{9, $get_pad_opt(95), $sub_fmtty};
                $a3 = Vector{0, Vector{23, $ignored__2, $fmt_rest__7}};
              }
              else {
                $a3 = Vector{
                  0,
                  Vector{14, $get_pad_opt(40), $sub_fmtty, $fmt_rest__7}
                };
              }
              $fmt_result = $a3;
              $switch__0 = 1;
              break;
            // FALLTHROUGH
            case 44:
              $fmt_result = $parse($str_ind, $end_ind);
              $switch__0 = 1;
              break;
            // FALLTHROUGH
            case 67:
              $match__11 = $parse($str_ind, $end_ind);
              $fmt_rest__10 = $match__11[1];
              $a5 = $get_ign(0)
                ? Vector{0, Vector{23, 1, $fmt_rest__10}}
                : (Vector{0, Vector{1, $fmt_rest__10}});
              $fmt_result = $a5;
              $switch__0 = 1;
              break;
            // FALLTHROUGH
            case 78:
              $match__15 = $parse($str_ind, $end_ind);
              $fmt_rest__14 = $match__15[1];
              $counter__0 = 2;
              if ($get_ign(0)) {
                $ignored__6 = Vector{11, $counter__0};
                $ba = Vector{0, Vector{23, $ignored__6, $fmt_rest__14}};
              }
              else {$ba = Vector{0, Vector{21, $counter__0, $fmt_rest__14}};}
              $fmt_result = $ba;
              $switch__0 = 1;
              break;
            // FALLTHROUGH
            case 83:
              $pad__6 = $check_no_0($symb, $get_padprec(0));
              $match__16 = $parse($str_ind, $end_ind);
              $fmt_rest__15 = $match__16[1];
              if ($get_ign(0)) {
                $ignored__7 = Vector{1, $get_padprec_opt(95)};
                $bb = Vector{0, Vector{23, $ignored__7, $fmt_rest__15}};
              }
              else {
                $match__17 = $make_padding_fmt_ebb($pad__6, $fmt_rest__15);
                $fmt_rest__16 = $match__17[2];
                $pad__7 = $match__17[1];
                $bb = Vector{0, Vector{3, $pad__7, $fmt_rest__16}};
              }
              $fmt_result = $bb;
              $switch__0 = 1;
              break;
            // FALLTHROUGH
            case 91:
              $match__20 = $parse_char_set->contents($str_ind, $end_ind);
              $char_set = $match__20[2];
              $next_ind = $match__20[1];
              $match__21 = $parse($next_ind, $end_ind);
              $fmt_rest__19 = $match__21[1];
              if ($get_ign(0)) {
                $ignored__9 = Vector{10, $get_pad_opt(95), $char_set};
                $bg = Vector{0, Vector{23, $ignored__9, $fmt_rest__19}};
              }
              else {
                $bg = Vector{
                  0,
                  Vector{20, $get_pad_opt(91), $char_set, $fmt_rest__19}
                };
              }
              $fmt_result = $bg;
              $switch__0 = 1;
              break;
            // FALLTHROUGH
            case 97:
              $match__22 = $parse($str_ind, $end_ind);
              $fmt_rest__20 = $match__22[1];
              $fmt_result = Vector{0, Vector{15, $fmt_rest__20}};
              $switch__0 = 1;
              break;
            // FALLTHROUGH
            case 99:
              $char_format = function(dynamic $fmt_rest) use ($get_ign) {
                return $get_ign(0)
                  ? Vector{0, Vector{23, 0, $fmt_rest}}
                  : (Vector{0, Vector{0, $fmt_rest}});
              };
              $scan_format = function(dynamic $fmt_rest) use ($get_ign) {
                return $get_ign(0)
                  ? Vector{0, Vector{23, 3, $fmt_rest}}
                  : (Vector{0, Vector{22, $fmt_rest}});
              };
              $match__23 = $parse($str_ind, $end_ind);
              $fmt_rest__21 = $match__23[1];
              $match__24 = $get_pad_opt(99);
              if ($match__24) {
                $bh = 0 === $match__24[1]
                  ? $scan_format($fmt_rest__21)
                  : ($legacy_behavior__0
                   ? $char_format($fmt_rest__21)
                   : ($invalid_nonnull_char_width($str_ind)));
                $bi = $bh;
              }
              else {$bi = $char_format($fmt_rest__21);}
              $fmt_result = $bi;
              $switch__0 = 1;
              break;
            // FALLTHROUGH
            case 114:
              $match__25 = $parse($str_ind, $end_ind);
              $fmt_rest__22 = $match__25[1];
              $bj = $get_ign(0)
                ? Vector{0, Vector{23, 2, $fmt_rest__22}}
                : (Vector{0, Vector{19, $fmt_rest__22}});
              $fmt_result = $bj;
              $switch__0 = 1;
              break;
            // FALLTHROUGH
            case 115:
              $pad__9 = $check_no_0($symb, $get_padprec(0));
              $match__26 = $parse($str_ind, $end_ind);
              $fmt_rest__23 = $match__26[1];
              if ($get_ign(0)) {
                $ignored__10 = Vector{0, $get_padprec_opt(95)};
                $bk = Vector{0, Vector{23, $ignored__10, $fmt_rest__23}};
              }
              else {
                $match__27 = $make_padding_fmt_ebb($pad__9, $fmt_rest__23);
                $fmt_rest__24 = $match__27[2];
                $pad__10 = $match__27[1];
                $bk = Vector{0, Vector{2, $pad__10, $fmt_rest__24}};
              }
              $fmt_result = $bk;
              $switch__0 = 1;
              break;
            // FALLTHROUGH
            case 116:
              $match__28 = $parse($str_ind, $end_ind);
              $fmt_rest__25 = $match__28[1];
              $fmt_result = Vector{0, Vector{16, $fmt_rest__25}};
              $switch__0 = 1;
              break;
            // FALLTHROUGH
            case 123:
              $sub_end__0 = $search_subformat_end->contents(
                $str_ind,
                $end_ind,
                125
              );
              $match__29 = $parse($str_ind, $sub_end__0);
              $sub_fmt__0 = $match__29[1];
              $match__30 = $parse((int) ($sub_end__0 + 2), $end_ind);
              $fmt_rest__26 = $match__30[1];
              $sub_fmtty__0 = $fmtty_of_fmt->contents($sub_fmt__0);
              if ($get_ign(0)) {
                $ignored__11 = Vector{8, $get_pad_opt(95), $sub_fmtty__0};
                $bl = Vector{0, Vector{23, $ignored__11, $fmt_rest__26}};
              }
              else {
                $bl = Vector{
                  0,
                  Vector{13, $get_pad_opt(123), $sub_fmtty__0, $fmt_rest__26}
                };
              }
              $fmt_result = $bl;
              $switch__0 = 1;
              break;
            // FALLTHROUGH
            case 66:
            // FALLTHROUGH
            case 98:
              $pad__3 = $check_no_0($symb, $get_padprec(0));
              $match__9 = $parse($str_ind, $end_ind);
              $fmt_rest__8 = $match__9[1];
              if ($get_ign(0)) {
                $ignored__3 = Vector{7, $get_padprec_opt(95)};
                $a4 = Vector{0, Vector{23, $ignored__3, $fmt_rest__8}};
              }
              else {
                $match__10 = $make_padding_fmt_ebb($pad__3, $fmt_rest__8);
                $fmt_rest__9 = $match__10[2];
                $pad__4 = $match__10[1];
                $a4 = Vector{0, Vector{9, $pad__4, $fmt_rest__9}};
              }
              $fmt_result = $a4;
              $switch__0 = 1;
              break;
            // FALLTHROUGH
            case 37:
            // FALLTHROUGH
            case 64:
              $match__6 = $parse($str_ind, $end_ind);
              $fmt_rest__6 = $match__6[1];
              $fmt_result = Vector{0, Vector{12, $symb, $fmt_rest__6}};
              $switch__0 = 1;
              break;
            // FALLTHROUGH
            case 76:
            // FALLTHROUGH
            case 108:
            // FALLTHROUGH
            case 110:
              if ($str_ind === $end_ind) {$switch__1 = 1;}
              else {
                if ($is_int_base->contents($caml_string_get($str, $str_ind))) {$switch__0 = 0;$switch__1 = 0;}
                else {$switch__1 = 1;}
              }
              if ($switch__1) {
                $match__14 = $parse($str_ind, $end_ind);
                $fmt_rest__13 = $match__14[1];
                $counter = $counter_of_char->contents($symb);
                if ($get_ign(0)) {
                  $ignored__5 = Vector{11, $counter};
                  $a_ = Vector{0, Vector{23, $ignored__5, $fmt_rest__13}};
                }
                else {$a_ = Vector{0, Vector{21, $counter, $fmt_rest__13}};}
                $fmt_result = $a_;
                $switch__0 = 1;
              }
              break;
            // FALLTHROUGH
            case 32:
            // FALLTHROUGH
            case 35:
            // FALLTHROUGH
            case 43:
            // FALLTHROUGH
            case 45:
            // FALLTHROUGH
            case 95:
              $fmt_result = $call3(
                $failwith_message($K),
                $str,
                $pct_ind,
                $symb
              );
              $switch__0 = 1;
              break;
            // FALLTHROUGH
            case 88:
            // FALLTHROUGH
            case 100:
            // FALLTHROUGH
            case 105:
            // FALLTHROUGH
            case 111:
            // FALLTHROUGH
            case 117:
            // FALLTHROUGH
            case 120:
              $bc = $get_space(0);
              $bd = $get_hash(0);
              $iconv__2 = $compute_int_conv->contents(
                $pct_ind,
                $str_ind,
                $get_plus(0),
                $bd,
                $bc,
                $symb
              );
              $match__18 = $parse($str_ind, $end_ind);
              $fmt_rest__17 = $match__18[1];
              if ($get_ign(0)) {
                $ignored__8 = Vector{2, $iconv__2, $get_pad_opt(95)};
                $be = Vector{0, Vector{23, $ignored__8, $fmt_rest__17}};
              }
              else {
                $bf = $get_prec(0);
                $match__19 = $make_padprec_fmt_ebb(
                  $get_int_pad(0),
                  $bf,
                  $fmt_rest__17
                );
                $fmt_rest__18 = $match__19[3];
                $prec__4 = $match__19[2];
                $pad__8 = $match__19[1];
                $be = Vector{
                  0,
                  Vector{4, $iconv__2, $pad__8, $prec__4, $fmt_rest__18}
                };
              }
              $fmt_result = $be;
              $switch__0 = 1;
              break;
            // FALLTHROUGH
            case 69:
            // FALLTHROUGH
            case 70:
            // FALLTHROUGH
            case 71:
            // FALLTHROUGH
            case 72:
            // FALLTHROUGH
            case 101:
            // FALLTHROUGH
            case 102:
            // FALLTHROUGH
            case 103:
            // FALLTHROUGH
            case 104:
              $a6 = $get_space(0);
              $fconv = $compute_float_conv->contents(
                $pct_ind,
                $str_ind,
                $get_plus(0),
                $a6,
                $symb
              );
              $match__12 = $parse($str_ind, $end_ind);
              $fmt_rest__11 = $match__12[1];
              if ($get_ign(0)) {
                $a7 = $get_prec_opt(0);
                $ignored__4 = Vector{6, $get_pad_opt(95), $a7};
                $a8 = Vector{0, Vector{23, $ignored__4, $fmt_rest__11}};
              }
              else {
                $a9 = $get_prec(0);
                $match__13 = $make_padprec_fmt_ebb(
                  $get_pad(0),
                  $a9,
                  $fmt_rest__11
                );
                $fmt_rest__12 = $match__13[3];
                $prec__3 = $match__13[2];
                $pad__5 = $match__13[1];
                $a8 = Vector{
                  0,
                  Vector{8, $fconv, $pad__5, $prec__3, $fmt_rest__12}
                };
              }
              $fmt_result = $a8;
              $switch__0 = 1;
              break;
            // FALLTHROUGH
            default:
              $switch__0 = 0;
            }
        }
        if (! $switch__0) {
          if (108 <= $symb) {
            if (111 <= $symb) {$switch__2 = 0;}
            else {
              $switcher = (int) ($symb + -108);
              switch($switcher) {
                // FALLTHROUGH
                case 0:
                  $aN = $caml_string_get($str, $str_ind);
                  $aO = $get_space(0);
                  $aP = $get_hash(0);
                  $iconv = $compute_int_conv->contents(
                    $pct_ind,
                    (int)
                    ($str_ind + 1),
                    $get_plus(0),
                    $aP,
                    $aO,
                    $aN
                  );
                  $match = $parse((int) ($str_ind + 1), $end_ind);
                  $fmt_rest = $match[1];
                  if ($get_ign(0)) {
                    $ignored = Vector{3, $iconv, $get_pad_opt(95)};
                    $aQ = Vector{0, Vector{23, $ignored, $fmt_rest}};
                  }
                  else {
                    $aS = $get_prec(0);
                    $match__0 = $make_padprec_fmt_ebb(
                      $get_int_pad(0),
                      $aS,
                      $fmt_rest
                    );
                    $fmt_rest__0 = $match__0[3];
                    $prec__0 = $match__0[2];
                    $pad__0 = $match__0[1];
                    $aQ = Vector{
                      0,
                      Vector{5, $iconv, $pad__0, $prec__0, $fmt_rest__0}
                    };
                  }
                  $aR = $aQ;
                  $switch__3 = 1;
                  break;
                // FALLTHROUGH
                case 1:
                  $switch__2 = 0;
                  $switch__3 = 0;
                  break;
                // FALLTHROUGH
                default:
                  $aT = $caml_string_get($str, $str_ind);
                  $aU = $get_space(0);
                  $aV = $get_hash(0);
                  $iconv__0 = $compute_int_conv->contents(
                    $pct_ind,
                    (int)
                    ($str_ind + 1),
                    $get_plus(0),
                    $aV,
                    $aU,
                    $aT
                  );
                  $match__1 = $parse((int) ($str_ind + 1), $end_ind);
                  $fmt_rest__1 = $match__1[1];
                  if ($get_ign(0)) {
                    $ignored__0 = Vector{4, $iconv__0, $get_pad_opt(95)};
                    $aW = Vector{0, Vector{23, $ignored__0, $fmt_rest__1}};
                  }
                  else {
                    $aX = $get_prec(0);
                    $match__2 = $make_padprec_fmt_ebb(
                      $get_int_pad(0),
                      $aX,
                      $fmt_rest__1
                    );
                    $fmt_rest__2 = $match__2[3];
                    $prec__1 = $match__2[2];
                    $pad__1 = $match__2[1];
                    $aW = Vector{
                      0,
                      Vector{6, $iconv__0, $pad__1, $prec__1, $fmt_rest__2}
                    };
                  }
                  $aR = $aW;
                  $switch__3 = 1;
                }
              if ($switch__3) {$fmt_result = $aR;$switch__2 = 1;}
            }
          }
          else {
            if (76 === $symb) {
              $aY = $caml_string_get($str, $str_ind);
              $aZ = $get_space(0);
              $a0 = $get_hash(0);
              $iconv__1 = $compute_int_conv->contents(
                $pct_ind,
                (int)
                ($str_ind + 1),
                $get_plus(0),
                $a0,
                $aZ,
                $aY
              );
              $match__3 = $parse((int) ($str_ind + 1), $end_ind);
              $fmt_rest__3 = $match__3[1];
              if ($get_ign(0)) {
                $ignored__1 = Vector{5, $iconv__1, $get_pad_opt(95)};
                $a1 = Vector{0, Vector{23, $ignored__1, $fmt_rest__3}};
              }
              else {
                $a2 = $get_prec(0);
                $match__4 = $make_padprec_fmt_ebb(
                  $get_int_pad(0),
                  $a2,
                  $fmt_rest__3
                );
                $fmt_rest__4 = $match__4[3];
                $prec__2 = $match__4[2];
                $pad__2 = $match__4[1];
                $a1 = Vector{
                  0,
                  Vector{7, $iconv__1, $pad__2, $prec__2, $fmt_rest__4}
                };
              }
              $fmt_result = $a1;
              $switch__2 = 1;
            }
            else {$switch__2 = 0;}
          }
          if (! $switch__2) {
            $fmt_result = $call3(
              $failwith_message($H),
              $str,
              (int)
              ($str_ind + -1),
              $symb
            );
          }
        }
        if (1 - $legacy_behavior__0) {
          $aE = 1 - $plus_used[1];
          $plus__0 = $aE ? $plus : ($aE);
          if ($plus__0) {
            $incompatible_flag->contents($pct_ind, $str_ind, $symb, $cst__28);
          }
          $aF = 1 - $hash_used[1];
          $hash__0 = $aF ? $hash : ($aF);
          if ($hash__0) {
            $incompatible_flag->contents($pct_ind, $str_ind, $symb, $cst__29);
          }
          $aG = 1 - $space_used[1];
          $space__0 = $aG ? $space : ($aG);
          if ($space__0) {
            $incompatible_flag->contents($pct_ind, $str_ind, $symb, $cst__30);
          }
          $aH = 1 - $pad_used[1];
          $aI = $aH ? $caml_notequal(Vector{0, $pad}, $I) : ($aH);
          if ($aI) {
            $incompatible_flag->contents(
              $pct_ind,
              $str_ind,
              $symb,
              $cst_padding__0
            );
          }
          $aJ = 1 - $prec_used[1];
          $aK = $aJ ? $caml_notequal(Vector{0, $prec}, $J) : ($aJ);
          if ($aK) {
            $aL = $ign ? 95 : ($symb);
            $incompatible_flag->contents(
              $pct_ind,
              $str_ind,
              $aL,
              $cst_precision__2
            );
          }
          $plus__1 = $ign ? $plus : ($ign);
          if ($plus__1) {
            $incompatible_flag->contents($pct_ind, $str_ind, 95, $cst__31);
          }
        }
        $aM = 1 - $ign_used[1];
        $ign__0 = $aM ? $ign : ($aM);
        if ($ign__0) {
          $switch__4 = 38 <= $symb
            ? 44 === $symb ? 0 : (64 === $symb ? 0 : (1))
            : (33 === $symb ? 0 : (37 <= $symb ? 0 : (1)));
          $switch__5 = $switch__4 ? 0 : ($legacy_behavior__0 ? 1 : (0));
          if (! $switch__5) {
            $incompatible_flag->contents($pct_ind, $str_ind, $symb, $cst__32);
          }
        }
        return $fmt_result;
      };
      $parse_after_precision = function
      (dynamic $pct_ind, dynamic $str_ind, dynamic $end_ind, dynamic $minus, dynamic $plus, dynamic $hash, dynamic $space, dynamic $ign, dynamic $pad, dynamic $match) use ($D,$E,$caml_string_get,$is_int,$parse_conversion,$str,$unexpected_end_of_format) {
        if ($str_ind === $end_ind) {$unexpected_end_of_format($end_ind);}
        $parse_conv = function(dynamic $padprec) use ($caml_string_get,$end_ind,$hash,$ign,$match,$pad,$parse_conversion,$pct_ind,$plus,$space,$str,$str_ind) {
          return $parse_conversion(
            $pct_ind,
            (int)
            ($str_ind + 1),
            $end_ind,
            $plus,
            $hash,
            $space,
            $ign,
            $pad,
            $match,
            $padprec,
            $caml_string_get($str, $str_ind)
          );
        };
        if ($is_int($pad)) {
          if ($is_int($match)) {if (0 === $match) {return $parse_conv(0);}}
          if (0 === $minus) {
            if ($is_int($match)) {return $parse_conv($D);}
            $n = $match[1];
            return $parse_conv(Vector{0, 1, $n});
          }
          if ($is_int($match)) {return $parse_conv($E);}
          $n__0 = $match[1];
          return $parse_conv(Vector{0, 0, $n__0});
        }
        return $parse_conv($pad);
      };
      $parse_precision = function
      (dynamic $pct_ind, dynamic $str_ind, dynamic $end_ind, dynamic $minus, dynamic $plus, dynamic $hash, dynamic $space, dynamic $ign, dynamic $pad) use ($C,$caml_string_get,$cst_precision,$invalid_format_without,$legacy_behavior__0,$parse_after_precision,$parse_positive,$str,$unexpected_end_of_format) {
        if ($str_ind === $end_ind) {$unexpected_end_of_format($end_ind);}
        $parse_literal = function(dynamic $minus, dynamic $str_ind) use ($end_ind,$hash,$ign,$pad,$parse_after_precision,$parse_positive,$pct_ind,$plus,$space) {
          $match = $parse_positive->contents($str_ind, $end_ind, 0);
          $prec = $match[2];
          $new_ind = $match[1];
          return $parse_after_precision(
            $pct_ind,
            $new_ind,
            $end_ind,
            $minus,
            $plus,
            $hash,
            $space,
            $ign,
            $pad,
            Vector{0, $prec}
          );
        };
        $symb = $caml_string_get($str, $str_ind);
        if (48 <= $symb) {
          if (! (58 <= $symb)) {return $parse_literal($minus, $str_ind);}
        }
        else {
          if (42 <= $symb) {
            $switcher = (int) ($symb + -42);
            switch($switcher) {
              // FALLTHROUGH
              case 0:
                return $parse_after_precision(
                  $pct_ind,
                  (int)
                  ($str_ind + 1),
                  $end_ind,
                  $minus,
                  $plus,
                  $hash,
                  $space,
                  $ign,
                  $pad,
                  1
                );
              // FALLTHROUGH
              case 1:
              // FALLTHROUGH
              case 3:
                if ($legacy_behavior__0) {
                  $aD = (int) ($str_ind + 1);
                  $minus__0 = $minus ? $minus : (45 === $symb ? 1 : (0));
                  return $parse_literal($minus__0, $aD);
                }
                break;
              }
          }
        }
        return $legacy_behavior__0
          ? $parse_after_precision(
           $pct_ind,
           $str_ind,
           $end_ind,
           $minus,
           $plus,
           $hash,
           $space,
           $ign,
           $pad,
           $C
         )
          : ($invalid_format_without((int) ($str_ind + -1), 46, $cst_precision
         ));
      };
      $parse_after_padding = function
      (dynamic $pct_ind, dynamic $str_ind, dynamic $end_ind, dynamic $minus, dynamic $plus, dynamic $hash, dynamic $space, dynamic $ign, dynamic $pad) use ($caml_string_get,$parse_conversion,$parse_precision,$str,$unexpected_end_of_format) {
        if ($str_ind === $end_ind) {$unexpected_end_of_format($end_ind);}
        $symb = $caml_string_get($str, $str_ind);
        return 46 === $symb
          ? $parse_precision(
           $pct_ind,
           (int)
           ($str_ind + 1),
           $end_ind,
           $minus,
           $plus,
           $hash,
           $space,
           $ign,
           $pad
         )
          : ($parse_conversion(
           $pct_ind,
           (int)
           ($str_ind + 1),
           $end_ind,
           $plus,
           $hash,
           $space,
           $ign,
           $pad,
           0,
           $pad,
           $symb
         ));
      };
      $parse_padding->contents = function
      (dynamic $pct_ind, dynamic $str_ind, dynamic $end_ind, dynamic $zero, dynamic $minus, dynamic $plus, dynamic $hash, dynamic $space, dynamic $ign) use ($B,$caml_string_get,$cst_0,$cst_padding,$incompatible_flag,$invalid_format_without,$legacy_behavior__0,$parse_after_padding,$parse_positive,$str,$unexpected_end_of_format) {
        if ($str_ind === $end_ind) {$unexpected_end_of_format($end_ind);}
        $padty = 0 === $zero
          ? 0 === $minus ? 1 : (0)
          : (0 === $minus
           ? 2
           : ($legacy_behavior__0
            ? 0
            : ($incompatible_flag->contents($pct_ind, $str_ind, 45, $cst_0))));
        $match = $caml_string_get($str, $str_ind);
        if (48 <= $match) {
          if (! (58 <= $match)) {
            $match__0 = $parse_positive->contents($str_ind, $end_ind, 0);
            $width = $match__0[2];
            $new_ind = $match__0[1];
            return $parse_after_padding(
              $pct_ind,
              $new_ind,
              $end_ind,
              $minus,
              $plus,
              $hash,
              $space,
              $ign,
              Vector{0, $padty, $width}
            );
          }
        }
        else {
          if (42 === $match) {
            return $parse_after_padding(
              $pct_ind,
              (int)
              ($str_ind + 1),
              $end_ind,
              $minus,
              $plus,
              $hash,
              $space,
              $ign,
              Vector{1, $padty}
            );
          }
        }
        switch($padty) {
          // FALLTHROUGH
          case 0:
            if (1 - $legacy_behavior__0) {
              $invalid_format_without((int) ($str_ind + -1), 45, $cst_padding);
            }
            return $parse_after_padding(
              $pct_ind,
              $str_ind,
              $end_ind,
              $minus,
              $plus,
              $hash,
              $space,
              $ign,
              0
            );
          // FALLTHROUGH
          case 1:
            return $parse_after_padding(
              $pct_ind,
              $str_ind,
              $end_ind,
              $minus,
              $plus,
              $hash,
              $space,
              $ign,
              0
            );
          // FALLTHROUGH
          default:
            return $parse_after_padding(
              $pct_ind,
              $str_ind,
              $end_ind,
              $minus,
              $plus,
              $hash,
              $space,
              $ign,
              $B
            );
          }
      };
      $parse_magic_size = function(dynamic $str_ind, dynamic $end_ind) use ($Failure,$Not_found,$O,$String,$call3,$caml_string_get,$caml_wrap_exception,$parse,$parse_integer,$parse_spaces,$runtime,$str) {
        try {
          $str_ind_1 = $parse_spaces->contents($str_ind, $end_ind);
          $match__2 = $caml_string_get($str, $str_ind_1);
          $switch__0 = 48 <= $match__2
            ? 58 <= $match__2 ? 0 : (1)
            : (45 === $match__2 ? 1 : (0));
          if ($switch__0) {
            $match__3 = $parse_integer->contents($str_ind_1, $end_ind);
            $size = $match__3[2];
            $str_ind_2 = $match__3[1];
            $str_ind_3 = $parse_spaces->contents($str_ind_2, $end_ind);
            if (62 !== $caml_string_get($str, $str_ind_3)) {
              throw $runtime["caml_wrap_thrown_exception"]($Not_found) as \Throwable;
            }
            $s = $call3(
              $String[4],
              $str,
              (int)
              ($str_ind + -2),
              (int)
              ((int) ($str_ind_3 - $str_ind) + 3)
            );
            $aB = Vector{
              0,
              Vector{0, (int) ($str_ind_3 + 1), Vector{1, $s, $size}}
            };
          }
          else {$aB = 0;}
          $aA = $aB;
        }
        catch(\Throwable $aC) {
          $aC = $caml_wrap_exception($aC);
          if ($aC !== $Not_found) {
            if ($aC[1] !== $Failure) {
              throw $runtime["caml_wrap_thrown_exception_reraise"]($aC) as \Throwable;
            }
          }
          $az = 0;
          $aA = $az;
        }
        if ($aA) {
          $match = $aA[1];
          $formatting_lit = $match[2];
          $next_ind = $match[1];
          $match__0 = $parse($next_ind, $end_ind);
          $fmt_rest = $match__0[1];
          return Vector{0, Vector{17, $formatting_lit, $fmt_rest}};
        }
        $match__1 = $parse($str_ind, $end_ind);
        $fmt_rest__0 = $match__1[1];
        return Vector{0, Vector{17, $O, $fmt_rest__0}};
      };
      $parse_good_break = function(dynamic $str_ind, dynamic $end_ind) use ($Failure,$Not_found,$String,$call3,$caml_string_get,$caml_wrap_exception,$formatting_lit,$parse,$parse_integer,$parse_spaces,$runtime,$str,$unsigned_right_shift_32) {
        try {
          $as = $str_ind === $end_ind ? 1 : (0);
          $at = $as
            ? $as
            : (60 !== $caml_string_get($str, $str_ind) ? 1 : (0));
          if ($at) {
            throw $runtime["caml_wrap_thrown_exception"]($Not_found) as \Throwable;
          }
          $str_ind_1 = $parse_spaces->contents((int) ($str_ind + 1), $end_ind);
          $match__0 = $caml_string_get($str, $str_ind_1);
          $switch__0 = 48 <= $match__0
            ? 58 <= $match__0 ? 0 : (1)
            : (45 === $match__0 ? 1 : (0));
          if (! $switch__0) {
            throw $runtime["caml_wrap_thrown_exception"]($Not_found) as \Throwable;
          }
          $match__1 = $parse_integer->contents($str_ind_1, $end_ind);
          $width = $match__1[2];
          $str_ind_2 = $match__1[1];
          $str_ind_3 = $parse_spaces->contents($str_ind_2, $end_ind);
          $match__2 = $caml_string_get($str, $str_ind_3);
          $switcher = (int) ($match__2 + -45);
          if (12 < $unsigned_right_shift_32($switcher, 0)) {
            if (17 === $switcher) {
              $s = $call3(
                $String[4],
                $str,
                (int)
                ($str_ind + -2),
                (int)
                ((int) ($str_ind_3 - $str_ind) + 3)
              );
              $au = Vector{0, $s, $width, 0};
              $av = (int) ($str_ind_3 + 1);
              $next_ind = $av;
              $formatting_lit__0 = $au;
              $switch__1 = 1;
            }
            else {$switch__1 = 0;}
          }
          else {
            $switcher__0 = (int) ($switcher + -1);
            if (1 < $unsigned_right_shift_32($switcher__0, 0)) {
              $match__3 = $parse_integer->contents($str_ind_3, $end_ind);
              $offset = $match__3[2];
              $str_ind_4 = $match__3[1];
              $str_ind_5 = $parse_spaces->contents($str_ind_4, $end_ind);
              if (62 !== $caml_string_get($str, $str_ind_5)) {
                throw $runtime["caml_wrap_thrown_exception"]($Not_found) as \Throwable;
              }
              $s__0 = $call3(
                $String[4],
                $str,
                (int)
                ($str_ind + -2),
                (int)
                ((int) ($str_ind_5 - $str_ind) + 3)
              );
              $aw = Vector{0, $s__0, $width, $offset};
              $ax = (int) ($str_ind_5 + 1);
              $next_ind = $ax;
              $formatting_lit__0 = $aw;
              $switch__1 = 1;
            }
            else {$switch__1 = 0;}
          }
          if (! $switch__1) {
            throw $runtime["caml_wrap_thrown_exception"]($Not_found) as \Throwable;
          }
        }
        catch(\Throwable $ay) {
          $ay = $caml_wrap_exception($ay);
          if ($ay !== $Not_found) {
            if ($ay[1] !== $Failure) {
              throw $runtime["caml_wrap_thrown_exception_reraise"]($ay) as \Throwable;
            }
          }
          $next_ind = $str_ind;
          $formatting_lit__0 = $formatting_lit;
        }
        $match = $parse($next_ind, $end_ind);
        $fmt_rest = $match[1];
        return Vector{0, Vector{17, $formatting_lit__0, $fmt_rest}};
      };
      $parse_tag = function
      (dynamic $is_open_tag, dynamic $str_ind, dynamic $end_ind) use ($Not_found,$String,$call3,$caml_string_get,$caml_wrap_exception,$check_open_box,$parse,$runtime,$str,$sub_format) {
        try {
          if ($str_ind === $end_ind) {
            throw $runtime["caml_wrap_thrown_exception"]($Not_found) as \Throwable;
          }
          $match__0 = $caml_string_get($str, $str_ind);
          if (60 === $match__0) {
            $ind = $call3($String[18], $str, (int) ($str_ind + 1), 62);
            if ($end_ind <= $ind) {
              throw $runtime["caml_wrap_thrown_exception"]($Not_found) as \Throwable;
            }
            $sub_str = $call3(
              $String[4],
              $str,
              $str_ind,
              (int)
              ((int) ($ind - $str_ind) + 1)
            );
            $match__1 = $parse((int) ($ind + 1), $end_ind);
            $fmt_rest__0 = $match__1[1];
            $match__2 = $parse($str_ind, (int) ($ind + 1));
            $sub_fmt = $match__2[1];
            $sub_format__0 = Vector{0, $sub_fmt, $sub_str};
            if ($is_open_tag) {
              $formatting__0 = Vector{0, $sub_format__0};
            }
            else {
              $check_open_box->contents($sub_fmt);
              $formatting__0 = Vector{1, $sub_format__0};
            }
            $aq = Vector{0, Vector{18, $formatting__0, $fmt_rest__0}};
            return $aq;
          }
          throw $runtime["caml_wrap_thrown_exception"]($Not_found) as \Throwable;
        }
        catch(\Throwable $ar) {
          $ar = $caml_wrap_exception($ar);
          if ($ar === $Not_found) {
            $match = $parse($str_ind, $end_ind);
            $fmt_rest = $match[1];
            $formatting = $is_open_tag
              ? Vector{0, $sub_format}
              : (Vector{1, $sub_format});
            return Vector{0, Vector{18, $formatting, $fmt_rest}};
          }
          throw $runtime["caml_wrap_thrown_exception_reraise"]($ar) as \Throwable;
        }
      };
      $parse_after_at->contents = function(dynamic $str_ind, dynamic $end_ind) use ($L,$M,$N,$caml_string_get,$parse,$parse_good_break,$parse_magic_size,$parse_tag,$str,$unsigned_right_shift_32) {
        if ($str_ind === $end_ind) {return $L;}
        $c = $caml_string_get($str, $str_ind);
        if (65 <= $c) {
          if (94 <= $c) {
            $switcher = (int) ($c + -123);
            if (! (2 < $unsigned_right_shift_32($switcher, 0))) {
              switch($switcher) {
                // FALLTHROUGH
                case 0:
                  return $parse_tag(1, (int) ($str_ind + 1), $end_ind);
                // FALLTHROUGH
                case 1:break;
                // FALLTHROUGH
                default:
                  $match__0 = $parse((int) ($str_ind + 1), $end_ind);
                  $fmt_rest__0 = $match__0[1];
                  return Vector{0, Vector{17, 1, $fmt_rest__0}};
                }
            }
          }
          else {
            if (91 <= $c) {
              $switcher__0 = (int) ($c + -91);
              switch($switcher__0) {
                // FALLTHROUGH
                case 0:
                  return $parse_tag(0, (int) ($str_ind + 1), $end_ind);
                // FALLTHROUGH
                case 1:break;
                // FALLTHROUGH
                default:
                  $match__1 = $parse((int) ($str_ind + 1), $end_ind);
                  $fmt_rest__1 = $match__1[1];
                  return Vector{0, Vector{17, 0, $fmt_rest__1}};
                }
            }
          }
        }
        else {
          if (10 === $c) {
            $match__2 = $parse((int) ($str_ind + 1), $end_ind);
            $fmt_rest__2 = $match__2[1];
            return Vector{0, Vector{17, 3, $fmt_rest__2}};
          }
          if (32 <= $c) {
            $switcher__1 = (int) ($c + -32);
            switch($switcher__1) {
              // FALLTHROUGH
              case 0:
                $match__3 = $parse((int) ($str_ind + 1), $end_ind);
                $fmt_rest__3 = $match__3[1];
                return Vector{0, Vector{17, $M, $fmt_rest__3}};
              // FALLTHROUGH
              case 5:
                if ((int) ($str_ind + 1) < $end_ind) {
                  if (37 === $caml_string_get($str, (int) ($str_ind + 1))) {
                    $match__4 = $parse((int) ($str_ind + 2), $end_ind);
                    $fmt_rest__4 = $match__4[1];
                    return Vector{0, Vector{17, 6, $fmt_rest__4}};
                  }
                }
                $match__5 = $parse($str_ind, $end_ind);
                $fmt_rest__5 = $match__5[1];
                return Vector{0, Vector{12, 64, $fmt_rest__5}};
              // FALLTHROUGH
              case 12:
                $match__6 = $parse((int) ($str_ind + 1), $end_ind);
                $fmt_rest__6 = $match__6[1];
                return Vector{0, Vector{17, $N, $fmt_rest__6}};
              // FALLTHROUGH
              case 14:
                $match__7 = $parse((int) ($str_ind + 1), $end_ind);
                $fmt_rest__7 = $match__7[1];
                return Vector{0, Vector{17, 4, $fmt_rest__7}};
              // FALLTHROUGH
              case 27:
                return $parse_good_break((int) ($str_ind + 1), $end_ind);
              // FALLTHROUGH
              case 28:
                return $parse_magic_size((int) ($str_ind + 1), $end_ind);
              // FALLTHROUGH
              case 31:
                $match__8 = $parse((int) ($str_ind + 1), $end_ind);
                $fmt_rest__8 = $match__8[1];
                return Vector{0, Vector{17, 2, $fmt_rest__8}};
              // FALLTHROUGH
              case 32:
                $match__9 = $parse((int) ($str_ind + 1), $end_ind);
                $fmt_rest__9 = $match__9[1];
                return Vector{0, Vector{17, 5, $fmt_rest__9}};
              }
          }
        }
        $match = $parse((int) ($str_ind + 1), $end_ind);
        $fmt_rest = $match[1];
        return Vector{0, Vector{17, Vector{2, $c}, $fmt_rest}};
      };
      $check_open_box->contents = function(dynamic $fmt) use ($Failure,$caml_wrap_exception,$is_int,$open_box_of_string,$runtime) {
        if (! $is_int($fmt) && 11 === $fmt[0]) {
          if ($is_int($fmt[2])) {
            $str = $fmt[1];
            try {$open_box_of_string($str);$ao = 0;return $ao;}
            catch(\Throwable $ap) {
              $ap = $caml_wrap_exception($ap);
              if ($ap[1] === $Failure) {return 0;}
              throw $runtime["caml_wrap_thrown_exception_reraise"]($ap) as \Throwable;
            }
          }
        }
        return 0;
      };
      $parse_char_set->contents = function(dynamic $str_ind, dynamic $end_ind) use ($P,$Pervasives,$add_in_char_set,$call1,$call2,$caml_string_get,$caml_trampoline,$caml_trampoline_return,$create_char_set,$failwith_message,$freeze_char_set,$rev_char_set,$str,$unexpected_end_of_format) {
        $parse_char_set_after_char__0 = new Ref();
        $parse_char_set_after_minus = new Ref();
        if ($str_ind === $end_ind) {$unexpected_end_of_format($end_ind);}
        $char_set = $create_char_set(0);
        $add_char = function(dynamic $c) use ($add_in_char_set,$char_set) {
          return $add_in_char_set($char_set, $c);
        };
        $add_range = function(dynamic $c__0, dynamic $c) use ($Pervasives,$add_in_char_set,$call1,$char_set) {
          if (! ($c < $c__0)) {
            $i = $c__0;
            for (;;) {
              $add_in_char_set($char_set, $call1($Pervasives[17], $i));
              $an = (int) ($i + 1);
              if ($c !== $i) {$i = $an;continue;}
              break;
            }
          }
          return 0;
        };
        $fail_single_percent = function(dynamic $str_ind) use ($P,$call2,$failwith_message,$str) {
          return $call2($failwith_message($P), $str, $str_ind);
        };
        $parse_char_set_content = function
        (dynamic $counter, dynamic $str_ind, dynamic $end_ind) use ($add_char,$caml_string_get,$caml_trampoline_return,$parse_char_set_after_char__0,$str,$unexpected_end_of_format) {
          $str_ind__0 = $str_ind;
          for (;;) {
            if ($str_ind__0 === $end_ind) {
              $unexpected_end_of_format($end_ind);
            }
            $c = $caml_string_get($str, $str_ind__0);
            if (45 === $c) {
              $add_char(45);
              $str_ind__1 = (int) ($str_ind__0 + 1);
              $str_ind__0 = $str_ind__1;
              continue;
            }
            if (93 === $c) {return (int) ($str_ind__0 + 1);}
            $am = (int) ($str_ind__0 + 1);
            if ($counter < 50) {
              $counter__0 = (int) ($counter + 1);
              return $parse_char_set_after_char__0->contents(
                $counter__0,
                $am,
                $end_ind,
                $c
              );
            }
            return $caml_trampoline_return(
              $parse_char_set_after_char__0->contents,
              varray[0,$am,$end_ind,$c]
            );
          }
        };
        $parse_char_set_after_char__0->contents = function
        (dynamic $counter, dynamic $str_ind, dynamic $end_ind, dynamic $c) use ($add_char,$caml_string_get,$caml_trampoline_return,$fail_single_percent,$parse_char_set_after_minus,$parse_char_set_content,$str,$unexpected_end_of_format) {
          $str_ind__0 = $str_ind;
          $c__0 = $c;
          for (;;) {
            if ($str_ind__0 === $end_ind) {
              $unexpected_end_of_format($end_ind);
            }
            $c__1 = $caml_string_get($str, $str_ind__0);
            if (46 <= $c__1) {
              if (64 === $c__1) {$switch__0 = 0;}
              else {
                if (93 === $c__1) {
                  $add_char($c__0);
                  return (int) ($str_ind__0 + 1);
                }
                $switch__0 = 1;
              }
            }
            else {
              if (37 === $c__1) {$switch__0 = 0;}
              else {
                if (45 <= $c__1) {
                  $al = (int) ($str_ind__0 + 1);
                  if ($counter < 50) {
                    $counter__0 = (int) ($counter + 1);
                    return $parse_char_set_after_minus->contents(
                      $counter__0,
                      $al,
                      $end_ind,
                      $c__0
                    );
                  }
                  return $caml_trampoline_return(
                    $parse_char_set_after_minus->contents,
                    varray[0,$al,$end_ind,$c__0]
                  );
                }
                $switch__0 = 1;
              }
            }
            if (! $switch__0) {
              if (37 === $c__0) {
                $add_char($c__1);
                $ak = (int) ($str_ind__0 + 1);
                if ($counter < 50) {
                  $counter__1 = (int) ($counter + 1);
                  return $parse_char_set_content($counter__1, $ak, $end_ind);
                }
                return $caml_trampoline_return(
                  $parse_char_set_content,
                  varray[0,$ak,$end_ind]
                );
              }
            }
            if (37 === $c__0) {$fail_single_percent($str_ind__0);}
            $add_char($c__0);
            $str_ind__1 = (int) ($str_ind__0 + 1);
            $str_ind__0 = $str_ind__1;
            $c__0 = $c__1;
            continue;
          }
        };
        $parse_char_set_after_minus->contents = function
        (dynamic $counter, dynamic $str_ind, dynamic $end_ind, dynamic $c) use ($add_char,$add_range,$caml_string_get,$caml_trampoline_return,$fail_single_percent,$parse_char_set_content,$str,$unexpected_end_of_format) {
          if ($str_ind === $end_ind) {$unexpected_end_of_format($end_ind);}
          $c__0 = $caml_string_get($str, $str_ind);
          if (37 === $c__0) {
            if ((int) ($str_ind + 1) === $end_ind) {$unexpected_end_of_format($end_ind);}
            $c__1 = $caml_string_get($str, (int) ($str_ind + 1));
            if (37 !== $c__1) {
              if (64 !== $c__1) {return $fail_single_percent($str_ind);}
            }
            $add_range($c, $c__1);
            $ai = (int) ($str_ind + 2);
            if ($counter < 50) {
              $counter__1 = (int) ($counter + 1);
              return $parse_char_set_content($counter__1, $ai, $end_ind);
            }
            return $caml_trampoline_return(
              $parse_char_set_content,
              varray[0,$ai,$end_ind]
            );
          }
          if (93 === $c__0) {
            $add_char($c);
            $add_char(45);
            return (int) ($str_ind + 1);
          }
          $add_range($c, $c__0);
          $aj = (int) ($str_ind + 1);
          if ($counter < 50) {
            $counter__0 = (int) ($counter + 1);
            return $parse_char_set_content($counter__0, $aj, $end_ind);
          }
          return $caml_trampoline_return(
            $parse_char_set_content,
            varray[0,$aj,$end_ind]
          );
        };
        $parse_char_set_after_char = function
        (dynamic $str_ind, dynamic $end_ind, dynamic $c) use ($caml_trampoline,$parse_char_set_after_char__0) {
          return $caml_trampoline(
            $parse_char_set_after_char__0->contents(0, $str_ind, $end_ind, $c)
          );
        };
        $parse_char_set_start = function(dynamic $str_ind, dynamic $end_ind) use ($caml_string_get,$parse_char_set_after_char,$str,$unexpected_end_of_format) {
          if ($str_ind === $end_ind) {$unexpected_end_of_format($end_ind);}
          $c = $caml_string_get($str, $str_ind);
          return $parse_char_set_after_char((int) ($str_ind + 1), $end_ind, $c
          );
        };
        if ($str_ind === $end_ind) {$unexpected_end_of_format($end_ind);}
        $match = $caml_string_get($str, $str_ind);
        if (94 === $match) {
          $str_ind__0 = (int) ($str_ind + 1);
          $reverse = 1;
          $str_ind__1 = $str_ind__0;
          $reverse__0 = $reverse;
        }
        else {$ah = 0;$str_ind__1 = $str_ind;$reverse__0 = $ah;}
        $next_ind = $parse_char_set_start($str_ind__1, $end_ind);
        $char_set__0 = $freeze_char_set($char_set);
        $ag = $reverse__0 ? $rev_char_set($char_set__0) : ($char_set__0);
        return Vector{0, $next_ind, $ag};
      };
      $parse_spaces->contents = function(dynamic $str_ind, dynamic $end_ind) use ($caml_string_get,$str,$unexpected_end_of_format) {
        $str_ind__0 = $str_ind;
        for (;;) {
          if ($str_ind__0 === $end_ind) {$unexpected_end_of_format($end_ind);}
          if (32 === $caml_string_get($str, $str_ind__0)) {
            $str_ind__1 = (int) ($str_ind__0 + 1);
            $str_ind__0 = $str_ind__1;
            continue;
          }
          return $str_ind__0;
        }
      };
      $parse_positive->contents = function
      (dynamic $str_ind, dynamic $end_ind, dynamic $acc) use ($Q,$Sys,$call3,$caml_string_get,$failwith_message,$str,$unexpected_end_of_format,$unsigned_right_shift_32) {
        $str_ind__0 = $str_ind;
        $acc__0 = $acc;
        for (;;) {
          if ($str_ind__0 === $end_ind) {$unexpected_end_of_format($end_ind);}
          $c = $caml_string_get($str, $str_ind__0);
          $switcher = (int) ($c + -48);
          if (9 < $unsigned_right_shift_32($switcher, 0)) {return Vector{0, $str_ind__0, $acc__0};}
          $acc__1 = (int) ((int) ($acc__0 * 10) + (int) ($c - 48));
          if ($Sys[13] < $acc__1) {
            $af = $Sys[13];
            return $call3($failwith_message($Q), $str, $acc__1, $af);
          }
          $str_ind__1 = (int) ($str_ind__0 + 1);
          $str_ind__0 = $str_ind__1;
          $acc__0 = $acc__1;
          continue;
        }
      };
      $parse_integer->contents = function(dynamic $str_ind, dynamic $end_ind) use ($Assert_failure,$R,$caml_string_get,$cst_digit,$expected_character,$parse_positive,$runtime,$str,$unexpected_end_of_format,$unsigned_right_shift_32) {
        if ($str_ind === $end_ind) {$unexpected_end_of_format($end_ind);}
        $match = $caml_string_get($str, $str_ind);
        if (48 <= $match) {
          if (! (58 <= $match)) {
            return $parse_positive->contents($str_ind, $end_ind, 0);
          }
        }
        else {
          if (45 === $match) {
            if ((int) ($str_ind + 1) === $end_ind) {$unexpected_end_of_format($end_ind);}
            $c = $caml_string_get($str, (int) ($str_ind + 1));
            $switcher = (int) ($c + -48);
            if (9 < $unsigned_right_shift_32($switcher, 0)) {
              return $expected_character((int) ($str_ind + 1), $cst_digit, $c);
            }
            $match__0 = $parse_positive->contents(
              (int)
              ($str_ind + 1),
              $end_ind,
              0
            );
            $n = $match__0[2];
            $next_ind = $match__0[1];
            return Vector{0, $next_ind, (int) - $n};
          }
        }
        throw $runtime["caml_wrap_thrown_exception"](Vector{0, $Assert_failure, $R}) as \Throwable;
      };
      $search_subformat_end->contents = function
      (dynamic $str_ind, dynamic $end_ind, dynamic $c) use ($S,$call3,$caml_string_get,$cst_character,$cst_character__0,$expected_character,$failwith_message,$search_subformat_end,$str,$unexpected_end_of_format) {
        $str_ind__0 = $str_ind;
        for (;;) {
          if ($str_ind__0 === $end_ind) {
            $call3($failwith_message($S), $str, $c, $end_ind);
          }
          $match = $caml_string_get($str, $str_ind__0);
          if (37 === $match) {
            if ((int) ($str_ind__0 + 1) === $end_ind) {$unexpected_end_of_format($end_ind);}
            if ($caml_string_get($str, (int) ($str_ind__0 + 1)) === $c) {return $str_ind__0;}
            $match__0 = $caml_string_get($str, (int) ($str_ind__0 + 1));
            if (95 <= $match__0) {
              if (123 <= $match__0) {
                if (! (126 <= $match__0)) {
                  $switcher = (int) ($match__0 + -123);
                  switch($switcher) {
                    // FALLTHROUGH
                    case 0:
                      $sub_end = $search_subformat_end->contents(
                        (int)
                        ($str_ind__0 + 2),
                        $end_ind,
                        125
                      );
                      $str_ind__2 = (int) ($sub_end + 2);
                      $str_ind__0 = $str_ind__2;
                      continue;
                    // FALLTHROUGH
                    case 1:break;
                    // FALLTHROUGH
                    default:
                      return $expected_character(
                        (int)
                        ($str_ind__0 + 1),
                        $cst_character,
                        125
                      );
                    }
                }
              }
              else {
                if (! (96 <= $match__0)) {
                  if ((int) ($str_ind__0 + 2) === $end_ind) {$unexpected_end_of_format($end_ind);}
                  $match__1 = $caml_string_get($str, (int) ($str_ind__0 + 2));
                  if (40 === $match__1) {
                    $sub_end__0 = $search_subformat_end->contents(
                      (int)
                      ($str_ind__0 + 3),
                      $end_ind,
                      41
                    );
                    $str_ind__3 = (int) ($sub_end__0 + 2);
                    $str_ind__0 = $str_ind__3;
                    continue;
                  }
                  if (123 === $match__1) {
                    $sub_end__1 = $search_subformat_end->contents(
                      (int)
                      ($str_ind__0 + 3),
                      $end_ind,
                      125
                    );
                    $str_ind__4 = (int) ($sub_end__1 + 2);
                    $str_ind__0 = $str_ind__4;
                    continue;
                  }
                  $str_ind__5 = (int) ($str_ind__0 + 3);
                  $str_ind__0 = $str_ind__5;
                  continue;
                }
              }
            }
            else {
              if (40 === $match__0) {
                $sub_end__2 = $search_subformat_end->contents(
                  (int)
                  ($str_ind__0 + 2),
                  $end_ind,
                  41
                );
                $str_ind__6 = (int) ($sub_end__2 + 2);
                $str_ind__0 = $str_ind__6;
                continue;
              }
              if (41 === $match__0) {
                return $expected_character(
                  (int)
                  ($str_ind__0 + 1),
                  $cst_character__0,
                  41
                );
              }
            }
            $str_ind__1 = (int) ($str_ind__0 + 2);
            $str_ind__0 = $str_ind__1;
            continue;
          }
          $str_ind__7 = (int) ($str_ind__0 + 1);
          $str_ind__0 = $str_ind__7;
          continue;
        }
      };
      $is_int_base->contents = function(dynamic $symb) use ($unsigned_right_shift_32) {
        $ae = (int) ($symb + -88);
        if (! (32 < $unsigned_right_shift_32($ae, 0))) {
          switch($ae) {
            // FALLTHROUGH
            case 0:
            // FALLTHROUGH
            case 12:
            // FALLTHROUGH
            case 17:
            // FALLTHROUGH
            case 23:
            // FALLTHROUGH
            case 29:
            // FALLTHROUGH
            case 32:
              return 1;
            }
        }
        return 0;
      };
      $counter_of_char->contents = function(dynamic $symb) use ($Assert_failure,$T,$runtime) {
        if (108 <= $symb) {
          if (! (111 <= $symb)) {
            $switcher = (int) ($symb + -108);
            switch($switcher) {
              // FALLTHROUGH
              case 0:
                return 0;
              // FALLTHROUGH
              case 1:break;
              // FALLTHROUGH
              default:
                return 1;
              }
          }
        }
        else {if (76 === $symb) {return 2;}}
        throw $runtime["caml_wrap_thrown_exception"](Vector{0, $Assert_failure, $T}) as \Throwable;
      };
      $incompatible_flag->contents = function
      (dynamic $pct_ind, dynamic $str_ind, dynamic $symb, dynamic $option) use ($String,$W,$call3,$call5,$failwith_message,$str) {
        $subfmt = $call3(
          $String[4],
          $str,
          $pct_ind,
          (int)
          ($str_ind - $pct_ind)
        );
        return $call5(
          $failwith_message($W),
          $str,
          $pct_ind,
          $option,
          $symb,
          $subfmt
        );
      };
      $compute_int_conv->contents = function
      (dynamic $pct_ind, dynamic $str_ind, dynamic $plus, dynamic $hash, dynamic $space, dynamic $symb) use ($Assert_failure,$U,$cst__33,$cst__34,$cst__35,$cst__36,$incompatible_flag,$legacy_behavior__0,$runtime,$unsigned_right_shift_32) {
        $plus__0 = $plus;
        $hash__0 = $hash;
        $space__0 = $space;
        for (;;) {
          if (0 === $plus__0) {
            if (0 === $hash__0) {
              if (0 === $space__0) {
                $switcher = (int) ($symb + -88);
                if (32 < $unsigned_right_shift_32($switcher, 0)) {$switch__0 = 1;}
                else {
                  switch($switcher) {
                    // FALLTHROUGH
                    case 0:
                      return 8;
                    // FALLTHROUGH
                    case 12:
                      return 0;
                    // FALLTHROUGH
                    case 17:
                      return 3;
                    // FALLTHROUGH
                    case 23:
                      return 10;
                    // FALLTHROUGH
                    case 29:
                      return 12;
                    // FALLTHROUGH
                    case 32:
                      return 6;
                    // FALLTHROUGH
                    default:
                      $switch__0 = 1;
                    }
                }
              }
              else {
                if (100 === $symb) {return 2;}
                if (105 === $symb) {return 5;}
                $switch__0 = 1;
              }
            }
            else {
              if (0 === $space__0) {
                if (88 === $symb) {return 9;}
                if (111 === $symb) {return 11;}
                if (120 === $symb) {return 7;}
                $switch__0 = 0;
              }
              else {$switch__0 = 0;}
            }
          }
          else {
            if (0 === $hash__0) {
              if (0 === $space__0) {
                if (100 === $symb) {return 1;}
                if (105 === $symb) {return 4;}
                $switch__0 = 1;
              }
              else {$switch__0 = 1;}
            }
            else {$switch__0 = 0;}
          }
          if (! $switch__0) {
            $switcher__0 = (int) ($symb + -88);
            if (! (32 < $unsigned_right_shift_32($switcher__0, 0))) {
              switch($switcher__0) {
                // FALLTHROUGH
                case 0:
                  if ($legacy_behavior__0) {return 9;}
                  break;
                // FALLTHROUGH
                case 23:
                  if ($legacy_behavior__0) {return 11;}
                  break;
                // FALLTHROUGH
                case 32:
                  if ($legacy_behavior__0) {return 7;}
                  break;
                // FALLTHROUGH
                case 12:
                // FALLTHROUGH
                case 17:
                // FALLTHROUGH
                case 29:
                  if ($legacy_behavior__0) {$hash__0 = 0;continue;}
                  return $incompatible_flag->contents(
                    $pct_ind,
                    $str_ind,
                    $symb,
                    $cst__36
                  );
                }
            }
          }
          if (0 === $plus__0) {
            if (0 === $space__0) {
              throw $runtime["caml_wrap_thrown_exception"](Vector{0, $Assert_failure, $U}) as \Throwable;
            }
            if ($legacy_behavior__0) {$space__0 = 0;continue;}
            return $incompatible_flag->contents(
              $pct_ind,
              $str_ind,
              $symb,
              $cst__33
            );
          }
          if (0 === $space__0) {
            if ($legacy_behavior__0) {$plus__0 = 0;continue;}
            return $incompatible_flag->contents(
              $pct_ind,
              $str_ind,
              $symb,
              $cst__34
            );
          }
          if ($legacy_behavior__0) {$space__0 = 0;continue;}
          return $incompatible_flag->contents($pct_ind, $str_ind, 32, $cst__35
          );
        }
      };
      $compute_float_conv->contents = function
      (dynamic $pct_ind, dynamic $str_ind, dynamic $plus, dynamic $space, dynamic $symb) use ($Assert_failure,$V,$cst__37,$cst__38,$cst__39,$incompatible_flag,$legacy_behavior__0,$runtime,$unsigned_right_shift_32) {
        $plus__0 = $plus;
        $space__0 = $space;
        for (;;) {
          if (0 === $plus__0) {
            if (0 === $space__0) {
              if (73 <= $symb) {
                $switcher = (int) ($symb + -101);
                if (! (3 < $unsigned_right_shift_32($switcher, 0))) {
                  switch($switcher) {
                    // FALLTHROUGH
                    case 0:
                      return 3;
                    // FALLTHROUGH
                    case 1:
                      return 0;
                    // FALLTHROUGH
                    case 2:
                      return 9;
                    // FALLTHROUGH
                    default:
                      return 16;
                    }
                }
              }
              else {
                if (69 <= $symb) {
                  $switcher__0 = (int) ($symb + -69);
                  switch($switcher__0) {
                    // FALLTHROUGH
                    case 0:
                      return 6;
                    // FALLTHROUGH
                    case 1:
                      return 15;
                    // FALLTHROUGH
                    case 2:
                      return 12;
                    // FALLTHROUGH
                    default:
                      return 19;
                    }
                }
              }
              throw $runtime["caml_wrap_thrown_exception"](Vector{0, $Assert_failure, $V}) as \Throwable;
            }
            if (73 <= $symb) {
              $switcher__1 = (int) ($symb + -101);
              if (! (3 < $unsigned_right_shift_32($switcher__1, 0))) {
                switch($switcher__1) {
                  // FALLTHROUGH
                  case 0:
                    return 5;
                  // FALLTHROUGH
                  case 1:
                    return 2;
                  // FALLTHROUGH
                  case 2:
                    return 11;
                  // FALLTHROUGH
                  default:
                    return 18;
                  }
              }
            }
            else {
              if (69 <= $symb) {
                $switcher__2 = (int) ($symb + -69);
                switch($switcher__2) {
                  // FALLTHROUGH
                  case 0:
                    return 8;
                  // FALLTHROUGH
                  case 1:break;
                  // FALLTHROUGH
                  case 2:
                    return 14;
                  // FALLTHROUGH
                  default:
                    return 21;
                  }
              }
            }
            if ($legacy_behavior__0) {$space__0 = 0;continue;}
            return $incompatible_flag->contents(
              $pct_ind,
              $str_ind,
              $symb,
              $cst__37
            );
          }
          if (0 === $space__0) {
            if (73 <= $symb) {
              $switcher__3 = (int) ($symb + -101);
              if (! (3 < $unsigned_right_shift_32($switcher__3, 0))) {
                switch($switcher__3) {
                  // FALLTHROUGH
                  case 0:
                    return 4;
                  // FALLTHROUGH
                  case 1:
                    return 1;
                  // FALLTHROUGH
                  case 2:
                    return 10;
                  // FALLTHROUGH
                  default:
                    return 17;
                  }
              }
            }
            else {
              if (69 <= $symb) {
                $switcher__4 = (int) ($symb + -69);
                switch($switcher__4) {
                  // FALLTHROUGH
                  case 0:
                    return 7;
                  // FALLTHROUGH
                  case 1:break;
                  // FALLTHROUGH
                  case 2:
                    return 13;
                  // FALLTHROUGH
                  default:
                    return 20;
                  }
              }
            }
            if ($legacy_behavior__0) {$plus__0 = 0;continue;}
            return $incompatible_flag->contents(
              $pct_ind,
              $str_ind,
              $symb,
              $cst__38
            );
          }
          if ($legacy_behavior__0) {$space__0 = 0;continue;}
          return $incompatible_flag->contents($pct_ind, $str_ind, 32, $cst__39
          );
        }
      };
      return $parse(0, $caml_ml_string_length($str));
    };
    $format_of_string_fmtty = function(dynamic $str, dynamic $fmtty) use ($Type_mismatch,$X,$call2,$caml_wrap_exception,$failwith_message,$fmt_ebb_of_string,$runtime,$string_of_fmtty,$type_format) {
      $match = $fmt_ebb_of_string(0, $str);
      $fmt = $match[1];
      try {$ac = Vector{0, $type_format($fmt, $fmtty), $str};return $ac;}
      catch(\Throwable $ad) {
        $ad = $caml_wrap_exception($ad);
        if ($ad === $Type_mismatch) {
          $ab = $string_of_fmtty($fmtty);
          return $call2($failwith_message($X), $str, $ab);
        }
        throw $runtime["caml_wrap_thrown_exception_reraise"]($ad) as \Throwable;
      }
    };
    $format_of_string_format = function(dynamic $str, dynamic $param) use ($Type_mismatch,$Y,$call2,$caml_wrap_exception,$failwith_message,$fmt_ebb_of_string,$fmtty_of_fmt,$runtime,$type_format) {
      $str__0 = $param[2];
      $fmt = $param[1];
      $match = $fmt_ebb_of_string(0, $str);
      $fmt__0 = $match[1];
      try {
        $Z = Vector{
          0,
          $type_format($fmt__0, $fmtty_of_fmt->contents($fmt)),
          $str
        };
        return $Z;
      }
      catch(\Throwable $aa) {
        $aa = $caml_wrap_exception($aa);
        if ($aa === $Type_mismatch) {
          return $call2($failwith_message($Y), $str, $str__0);
        }
        throw $runtime["caml_wrap_thrown_exception_reraise"]($aa) as \Throwable;
      }
    };
    $CamlinternalFormat = Vector{
      0,
      $is_in_char_set,
      $rev_char_set,
      $create_char_set,
      $add_in_char_set,
      $freeze_char_set,
      $param_format_of_ignored_format,
      $make_printf->contents,
      $make_iprintf->contents,
      $output_acc->contents,
      $bufput_acc->contents,
      $strput_acc->contents,
      $type_format,
      $fmt_ebb_of_string,
      $format_of_string_fmtty,
      $format_of_string_format,
      $char_of_iconv,
      $string_of_formatting_lit,
      $string_of_formatting_gen,
      $string_of_fmtty,
      $string_of_fmt,
      $open_box_of_string,
      $symm->contents,
      $trans->contents,
      $recast
    };
    
    $runtime["caml_register_global"](
      198,
      $CamlinternalFormat,
      "CamlinternalFormat"
    );

  }
}

