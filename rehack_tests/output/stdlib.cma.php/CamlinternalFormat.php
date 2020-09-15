<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class CamlinternalFormat {
  <<__Override, __Memoize>>
  public static function get() : Vector<dynamic> {
    
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
    $runtime = (\Rehack\GlobalObject::get() as dynamic)->jsoo_runtime;
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
    $caml_string_unsafe_get = $runtime["caml_string_unsafe_get"];
    $caml_trampoline = $runtime["caml_trampoline"];
    $caml_trampoline_return = $runtime["caml_trampoline_return"];
    $caml_wrap_thrown_exception = $runtime["caml_wrap_thrown_exception"];
    $caml_wrap_thrown_exception_reraise = $runtime[
       "caml_wrap_thrown_exception_reraise"
     ];
    $is_int = $runtime["is_int"];
    $left_shift_32 = $runtime["left_shift_32"];
    $unsigned_right_shift_32 = $runtime["unsigned_right_shift_32"];
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
    $sub_format = Vector{0, 0, $string("")} as dynamic;
    $formatting_lit = Vector{0, $string("@;"), 1, 0} as dynamic;
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
    $cst_nd__0 = $string("%+nd");
    $cst_nd__1 = $string("% nd");
    $cst_ni__1 = $string("%+ni");
    $cst_ni__2 = $string("% ni");
    $cst_nx = $string("%nx");
    $cst_nx__0 = $string("%#nx");
    $cst_nX = $string("%nX");
    $cst_nX__0 = $string("%#nX");
    $cst_no = $string("%no");
    $cst_no__0 = $string("%#no");
    $cst_nd = $string("%nd");
    $cst_ni__0 = $string("%ni");
    $cst_nu = $string("%nu");
    $cst_ld__0 = $string("%+ld");
    $cst_ld__1 = $string("% ld");
    $cst_li__1 = $string("%+li");
    $cst_li__2 = $string("% li");
    $cst_lx = $string("%lx");
    $cst_lx__0 = $string("%#lx");
    $cst_lX = $string("%lX");
    $cst_lX__0 = $string("%#lX");
    $cst_lo = $string("%lo");
    $cst_lo__0 = $string("%#lo");
    $cst_ld = $string("%ld");
    $cst_li__0 = $string("%li");
    $cst_lu = $string("%lu");
    $cst_Ld__0 = $string("%+Ld");
    $cst_Ld__1 = $string("% Ld");
    $cst_Li__1 = $string("%+Li");
    $cst_Li__2 = $string("% Li");
    $cst_Lx = $string("%Lx");
    $cst_Lx__0 = $string("%#Lx");
    $cst_LX = $string("%LX");
    $cst_LX__0 = $string("%#LX");
    $cst_Lo = $string("%Lo");
    $cst_Lo__0 = $string("%#Lo");
    $cst_Ld = $string("%Ld");
    $cst_Li__0 = $string("%Li");
    $cst_Lu = $string("%Lu");
    $cst_d__0 = $string("%+d");
    $cst_d__1 = $string("% d");
    $cst_i__1 = $string("%+i");
    $cst_i__2 = $string("% i");
    $cst_x = $string("%x");
    $cst_x__0 = $string("%#x");
    $cst_X = $string("%X");
    $cst_X__0 = $string("%#X");
    $cst_o = $string("%o");
    $cst_o__0 = $string("%#o");
    $cst_d = $string("%d");
    $cst_i__0 = $string("%i");
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
    $Assert_failure = Assert_failure::get();
    $CamlinternalFormatBasics = CamlinternalFormatBasics::get();
    $Stdlib = Stdlib::get();
    $Stdlib_buffer = Stdlib__buffer::get();
    $Stdlib_string = Stdlib__string::get();
    $Stdlib_sys = Stdlib__sys::get();
    $Stdlib_char = Stdlib__char::get();
    $Stdlib_bytes = Stdlib__bytes::get();
    $Stdlib_int = Stdlib__int::get();
    $a_ = Vector{0, $string("camlinternalFormat.ml"), 847, 23} as dynamic;
    $l_ = Vector{0, $string("camlinternalFormat.ml"), 811, 21} as dynamic;
    $d_ = Vector{0, $string("camlinternalFormat.ml"), 812, 21} as dynamic;
    $m_ = Vector{0, $string("camlinternalFormat.ml"), 815, 21} as dynamic;
    $e_ = Vector{0, $string("camlinternalFormat.ml"), 816, 21} as dynamic;
    $n_ = Vector{0, $string("camlinternalFormat.ml"), 819, 19} as dynamic;
    $f_ = Vector{0, $string("camlinternalFormat.ml"), 820, 19} as dynamic;
    $o_ = Vector{0, $string("camlinternalFormat.ml"), 823, 22} as dynamic;
    $g_ = Vector{0, $string("camlinternalFormat.ml"), 824, 22} as dynamic;
    $p_ = Vector{0, $string("camlinternalFormat.ml"), 828, 30} as dynamic;
    $h_ = Vector{0, $string("camlinternalFormat.ml"), 829, 30} as dynamic;
    $j_ = Vector{0, $string("camlinternalFormat.ml"), 833, 26} as dynamic;
    $b_ = Vector{0, $string("camlinternalFormat.ml"), 834, 26} as dynamic;
    $k_ = Vector{0, $string("camlinternalFormat.ml"), 843, 28} as dynamic;
    $c_ = Vector{0, $string("camlinternalFormat.ml"), 844, 28} as dynamic;
    $i_ = Vector{0, $string("camlinternalFormat.ml"), 848, 23} as dynamic;
    $q_ = Vector{0, $string("camlinternalFormat.ml"), 1556, 4} as dynamic;
    $r_ = Vector{0, $string("camlinternalFormat.ml"), 1624, 39} as dynamic;
    $s_ = Vector{0, $string("camlinternalFormat.ml"), 1647, 31} as dynamic;
    $t_ = Vector{0, $string("camlinternalFormat.ml"), 1648, 31} as dynamic;
    $u_ = Vector{0, $string("camlinternalFormat.ml"), 1828, 8} as dynamic;
    $Y_ = Vector{
      0,
      Vector{
        11,
        $string("bad input: format type mismatch between "),
        Vector{3, 0, Vector{11, $string(" and "), Vector{3, 0, 0}}}
      },
      $string("bad input: format type mismatch between %S and %S")
    } as dynamic;
    $X_ = Vector{
      0,
      Vector{
        11,
        $string("bad input: format type mismatch between "),
        Vector{3, 0, Vector{11, $string(" and "), Vector{3, 0, 0}}}
      },
      $string("bad input: format type mismatch between %S and %S")
    } as dynamic;
    $A_ = Vector{
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
    } as dynamic;
    $B_ = Vector{0, 1, 0} as dynamic;
    $C_ = Vector{0, 0} as dynamic;
    $E_ = Vector{1, 0} as dynamic;
    $D_ = Vector{1, 1} as dynamic;
    $G_ = Vector{1, 1} as dynamic;
    $F_ = Vector{1, 1} as dynamic;
    $K_ = Vector{
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
    } as dynamic;
    $H_ = Vector{
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
    } as dynamic;
    $I_ = Vector{0, 0} as dynamic;
    $J_ = Vector{0, 0} as dynamic;
    $L_ = Vector{0, Vector{12, 64, 0}} as dynamic;
    $M_ = Vector{0, $string("@ "), 1, 0} as dynamic;
    $N_ = Vector{0, $string("@,"), 0, 0} as dynamic;
    $O_ = Vector{2, 60} as dynamic;
    $P_ = Vector{
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
    } as dynamic;
    $Q_ = Vector{
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
    } as dynamic;
    $R_ = Vector{0, $string("camlinternalFormat.ml"), 2843, 11} as dynamic;
    $S_ = Vector{
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
    } as dynamic;
    $T_ = Vector{0, $string("camlinternalFormat.ml"), 2905, 34} as dynamic;
    $U_ = Vector{0, $string("camlinternalFormat.ml"), 2941, 28} as dynamic;
    $V_ = Vector{0, $string("camlinternalFormat.ml"), 2975, 25} as dynamic;
    $W_ = Vector{
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
    } as dynamic;
    $z_ = Vector{
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
    } as dynamic;
    $y_ = Vector{
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
    } as dynamic;
    $x_ = Vector{
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
    } as dynamic;
    $w_ = Vector{
      0,
      Vector{11, $string("invalid box description "), Vector{3, 0, 0}},
      $string("invalid box description %S")
    } as dynamic;
    $v_ = Vector{0, 0, 4} as dynamic;
    $create_char_set = (dynamic $param) : dynamic ==> {
      return $call2($Stdlib_bytes[1], 32, 0);
    };
    $add_in_char_set = (dynamic $char_set, dynamic $c) : dynamic ==> {
      $str_ind = (int) $unsigned_right_shift_32($c, 3) as dynamic;
      $mask = $left_shift_32(1, $c & 7);
      $eV_ = $runtime["caml_bytes_get"]($char_set, $str_ind) | $mask;
      return $caml_bytes_set($char_set, $str_ind, $call1($Stdlib[29], $eV_));
    };
    $freeze_char_set = (dynamic $char_set) : dynamic ==> {
      return $call1($Stdlib_bytes[6], $char_set);
    };
    $rev_char_set = (dynamic $char_set) : dynamic ==> {
      $eT_ = null as dynamic;
      $eU_ = null as dynamic;
      $char_set__0 = $create_char_set(0);
      $i = 0 as dynamic;
      for (;;) {
        $eT_ = $caml_string_get($char_set, $i) ^ 255;
        $caml_bytes_set($char_set__0, $i, $call1($Stdlib[29], $eT_));
        $eU_ = (int) ($i + 1) as dynamic;
        if (31 !== $i) {$i = $eU_;continue;}
        return $call1($Stdlib_bytes[42], $char_set__0);
      }
    };
    $is_in_char_set = (dynamic $char_set, dynamic $c) : dynamic ==> {
      $str_ind = (int) $unsigned_right_shift_32($c, 3) as dynamic;
      $mask = $left_shift_32(1, $c & 7);
      return 0 !== ($caml_string_get($char_set, $str_ind) & $mask) ? 1 : (0);
    };
    $pad_of_pad_opt = (dynamic $pad_opt) : dynamic ==> {
      $width = null as dynamic;
      if ($pad_opt) {$width = $pad_opt[1];return Vector{0, 1, $width};}
      return 0;
    };
    $prec_of_prec_opt = (dynamic $prec_opt) : dynamic ==> {
      $ndec = null as dynamic;
      if ($prec_opt) {$ndec = $prec_opt[1];return Vector{0, $ndec};}
      return 0;
    };
    $param_format_of_ignored_format = (dynamic $ign, dynamic $fmt) : dynamic ==> {
      $char_set = null as dynamic;
      $counter = null as dynamic;
      $eS_ = null as dynamic;
      $fmtty = null as dynamic;
      $fmtty__0 = null as dynamic;
      $iconv = null as dynamic;
      $iconv__0 = null as dynamic;
      $iconv__1 = null as dynamic;
      $iconv__2 = null as dynamic;
      $pad_opt = null as dynamic;
      $pad_opt__0 = null as dynamic;
      $pad_opt__1 = null as dynamic;
      $pad_opt__2 = null as dynamic;
      $pad_opt__3 = null as dynamic;
      $pad_opt__4 = null as dynamic;
      $pad_opt__5 = null as dynamic;
      $pad_opt__6 = null as dynamic;
      $pad_opt__7 = null as dynamic;
      $pad_opt__8 = null as dynamic;
      $prec_opt = null as dynamic;
      $width_opt = null as dynamic;
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
            $eS_ = $prec_of_prec_opt($prec_opt);
            return Vector{
              0,
              Vector{8, 0, $pad_of_pad_opt($pad_opt__5), $eS_, $fmt}
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
    $default_float_precision = -6 as dynamic;
    $buffer_create = (dynamic $init_size) : dynamic ==> {
      return Vector{0, 0, $caml_create_bytes($init_size)};
    };
    $buffer_check_size = (dynamic $buf, dynamic $overhead) : dynamic ==> {
      $eR_ = null as dynamic;
      $new_len = null as dynamic;
      $new_str = null as dynamic;
      $len = $runtime["caml_ml_bytes_length"]($buf[2]);
      $min_len = (int) ($buf[1] + $overhead) as dynamic;
      $eQ_ = $len < $min_len ? 1 : (0);
      if ($eQ_) {
        $new_len = $call2($Stdlib[17], (int) ($len * 2), $min_len);
        $new_str = $caml_create_bytes($new_len);
        $call5($Stdlib_bytes[11], $buf[2], 0, $new_str, 0, $len);
        $buf[2] = $new_str;
        $eR_ = 0 as dynamic;
      }
      else {$eR_ = $eQ_;}
      return $eR_;
    };
    $buffer_add_char = (dynamic $buf, dynamic $c) : dynamic ==> {
      $buffer_check_size($buf, 1);
      $caml_bytes_set($buf[2], $buf[1], $c);
      $buf[1] = (int) ($buf[1] + 1);
      return 0;
    };
    $buffer_add_string = (dynamic $buf, dynamic $s) : dynamic ==> {
      $str_len = $caml_ml_string_length($s);
      $buffer_check_size($buf, $str_len);
      $call5($Stdlib_string[6], $s, 0, $buf[2], $buf[1], $str_len);
      $buf[1] = (int) ($buf[1] + $str_len);
      return 0;
    };
    $buffer_contents = (dynamic $buf) : dynamic ==> {
      return $call3($Stdlib_bytes[8], $buf[2], 0, $buf[1]);
    };
    $char_of_iconv = (dynamic $iconv) : dynamic ==> {
      switch($iconv) {
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
        case 12:
        // FALLTHROUGH
        case 15:
          return 117;
        // FALLTHROUGH
        case 0:
        // FALLTHROUGH
        case 1:
        // FALLTHROUGH
        case 2:
        // FALLTHROUGH
        case 13:
          return 100;
        // FALLTHROUGH
        default:
          return 105;
        }
    };
    $char_of_fconv = (dynamic $fconv) : dynamic ==> {
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
    $char_of_counter = (dynamic $counter) : dynamic ==> {
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
    $bprint_char_set = (dynamic $buf, dynamic $char_set) : dynamic ==> {
      $print_first = new Ref();
      $print_in = new Ref();
      $print_out = new Ref();
      $print_second = new Ref();
      $eA_ = null as dynamic;
      $print_start = (dynamic $set) : dynamic ==> {
        $is_alone = (dynamic $c) : dynamic ==> {
          $eN_ = null as dynamic;
          $eO_ = null as dynamic;
          $eP_ = null as dynamic;
          $after = $call1($Stdlib_char[1], (int) ($c + 1));
          $before = $call1($Stdlib_char[1], (int) ($c + -1));
          $eM_ = $is_in_char_set($set, $c);
          if ($eM_) {
            $eN_ = $is_in_char_set($set, $before);
            $eO_ = $eN_ ? $is_in_char_set($set, $after) : ($eN_);
            $eP_ = ! $eO_;
          }
          else {$eP_ = $eM_;}
          return $eP_;
        };
        if ($is_alone(93)) {$buffer_add_char($buf, 93);}
        $print_out->contents($set, 1);
        $eL_ = $is_alone(45);
        return $eL_ ? $buffer_add_char($buf, 45) : ($eL_);
      };
      $print_char = (dynamic $buf, dynamic $i) : dynamic ==> {
        $c = $call1($Stdlib[29], $i);
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
      $print_out__0 = (dynamic $counter, dynamic $set, dynamic $i) : dynamic ==> {
        $counter__0 = null as dynamic;
        $eK_ = null as dynamic;
        $i__1 = null as dynamic;
        $i__0 = $i;
        for (;;) {
          $eK_ = $i__0 < 256 ? 1 : (0);
          if ($eK_) {
            if ($is_in_char_set($set, $call1($Stdlib[29], $i__0))) {
              if ($counter < 50) {
                $counter__0 = (int) ($counter + 1) as dynamic;
                return $print_first->contents($counter__0, $set, $i__0);
              }
              return $caml_trampoline_return(
                $print_first->contents,
                varray[0,$set,$i__0]
              );
            }
            $i__1 = (int) ($i__0 + 1) as dynamic;
            $i__0 = $i__1;
            continue;
          }
          return $eK_;
        }
      };
      $print_first->contents = (dynamic $counter, dynamic $set, dynamic $i) : dynamic ==> {
        $counter__0 = null as dynamic;
        $counter__1 = null as dynamic;
        $eJ_ = null as dynamic;
        $switcher__0 = null as dynamic;
        $match = $call1($Stdlib[29], $i);
        $switcher = (int) ($match + -45) as dynamic;
        if (48 < $unsigned_right_shift_32($switcher, 0)) {
          if (210 <= $switcher) {return $print_char($buf, 255);}
        }
        else {
          $switcher__0 = (int) ($switcher + -1) as dynamic;
          if (46 < $unsigned_right_shift_32($switcher__0, 0)) {
            $eJ_ = (int) ($i + 1) as dynamic;
            if ($counter < 50) {
              $counter__1 = (int) ($counter + 1) as dynamic;
              return $print_out__0($counter__1, $set, $eJ_);
            }
            return $caml_trampoline_return($print_out__0, varray[0,$set,$eJ_]);
          }
        }
        $eI_ = (int) ($i + 1) as dynamic;
        if ($counter < 50) {
          $counter__0 = (int) ($counter + 1) as dynamic;
          return $print_second->contents($counter__0, $set, $eI_);
        }
        return $caml_trampoline_return(
          $print_second->contents,
          varray[0,$set,$eI_]
        );
      };
      $print_second->contents = (dynamic $counter, dynamic $set, dynamic $i) : dynamic ==> {
        $counter__0 = null as dynamic;
        $counter__1 = null as dynamic;
        $counter__2 = null as dynamic;
        $counter__3 = null as dynamic;
        $eD_ = null as dynamic;
        $eE_ = null as dynamic;
        $eF_ = null as dynamic;
        $eG_ = null as dynamic;
        $match = null as dynamic;
        $switcher = null as dynamic;
        $switcher__0 = null as dynamic;
        if ($is_in_char_set($set, $call1($Stdlib[29], $i))) {
          $match = $call1($Stdlib[29], $i);
          $switcher = (int) ($match + -45) as dynamic;
          if (48 < $unsigned_right_shift_32($switcher, 0)) {
            if (210 <= $switcher) {
              $print_char($buf, 254);
              return $print_char($buf, 255);
            }
          }
          else {
            $switcher__0 = (int) ($switcher + -1) as dynamic;
            if (46 < $unsigned_right_shift_32($switcher__0, 0)) {
              if (! $is_in_char_set($set, $call1($Stdlib[29], (int) ($i + 1)))
              ) {
                $print_char($buf, (int) ($i + -1));
                $eG_ = (int) ($i + 1) as dynamic;
                if ($counter < 50) {
                  $counter__1 = (int) ($counter + 1) as dynamic;
                  return $print_out__0($counter__1, $set, $eG_);
                }
                return $caml_trampoline_return(
                  $print_out__0,
                  varray[0,$set,$eG_]
                );
              }
            }
          }
          if ($is_in_char_set($set, $call1($Stdlib[29], (int) ($i + 1)))) {
            $eD_ = (int) ($i + 2) as dynamic;
            $eE_ = (int) ($i + -1) as dynamic;
            if ($counter < 50) {
              $counter__0 = (int) ($counter + 1) as dynamic;
              return $print_in->contents($counter__0, $set, $eE_, $eD_);
            }
            return $caml_trampoline_return(
              $print_in->contents,
              varray[0,$set,$eE_,$eD_]
            );
          }
          $print_char($buf, (int) ($i + -1));
          $print_char($buf, $i);
          $eF_ = (int) ($i + 2) as dynamic;
          if ($counter < 50) {
            $counter__2 = (int) ($counter + 1) as dynamic;
            return $print_out__0($counter__2, $set, $eF_);
          }
          return $caml_trampoline_return($print_out__0, varray[0,$set,$eF_]);
        }
        $print_char($buf, (int) ($i + -1));
        $eH_ = (int) ($i + 1) as dynamic;
        if ($counter < 50) {
          $counter__3 = (int) ($counter + 1) as dynamic;
          return $print_out__0($counter__3, $set, $eH_);
        }
        return $caml_trampoline_return($print_out__0, varray[0,$set,$eH_]);
      };
      $print_in->contents = 
      (dynamic $counter, dynamic $set, dynamic $i, dynamic $j) : dynamic ==> {
        $counter__0 = null as dynamic;
        $eB_ = null as dynamic;
        $eC_ = null as dynamic;
        $j__1 = null as dynamic;
        $j__0 = $j;
        for (;;) {
          if (256 !== $j__0) {
            if ($is_in_char_set($set, $call1($Stdlib[29], $j__0))) {
              $j__1 = (int) ($j__0 + 1) as dynamic;
              $j__0 = $j__1;
              continue;
            }
          }
          $print_char($buf, $i);
          $print_char($buf, 45);
          $print_char($buf, (int) ($j__0 + -1));
          $eB_ = $j__0 < 256 ? 1 : (0);
          if ($eB_) {
            $eC_ = (int) ($j__0 + 1) as dynamic;
            if ($counter < 50) {
              $counter__0 = (int) ($counter + 1) as dynamic;
              return $print_out__0($counter__0, $set, $eC_);
            }
            return $caml_trampoline_return($print_out__0, varray[0,$set,$eC_]);
          }
          return $eB_;
        }
      };
      $print_out->contents = (dynamic $set, dynamic $i) : dynamic ==> {
        return $caml_trampoline($print_out__0(0, $set, $i));
      };
      $buffer_add_char($buf, 91);
      if ($is_in_char_set($char_set, 0)) {
        $buffer_add_char($buf, 94);
        $eA_ = $rev_char_set($char_set);
      }
      else {$eA_ = $char_set;}
      $print_start($eA_);
      return $buffer_add_char($buf, 93);
    };
    $bprint_padty = (dynamic $buf, dynamic $padty) : dynamic ==> {
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
    $bprint_ignored_flag = (dynamic $buf, dynamic $ign_flag) : dynamic ==> {
      return $ign_flag ? $buffer_add_char($buf, 95) : ($ign_flag);
    };
    $bprint_pad_opt = (dynamic $buf, dynamic $pad_opt) : dynamic ==> {
      $width = null as dynamic;
      if ($pad_opt) {
        $width = $pad_opt[1];
        return $buffer_add_string($buf, $call1($Stdlib_int[10], $width));
      }
      return 0;
    };
    $bprint_padding = (dynamic $buf, dynamic $pad) : dynamic ==> {
      $n = null as dynamic;
      $padty = null as dynamic;
      $padty__0 = null as dynamic;
      if ($is_int($pad)) {return 0;}
      else {
        if (0 === $pad[0]) {
          $n = $pad[2];
          $padty = $pad[1];
          $bprint_padty($buf, $padty);
          return $buffer_add_string($buf, $call1($Stdlib_int[10], $n));
        }
        $padty__0 = $pad[1];
        $bprint_padty($buf, $padty__0);
        return $buffer_add_char($buf, 42);
      }
    };
    $bprint_precision = (dynamic $buf, dynamic $prec) : dynamic ==> {
      if ($is_int($prec)) {
        return 0 === $prec ? 0 : ($buffer_add_string($buf, $cst));
      }
      $n = $prec[1];
      $buffer_add_char($buf, 46);
      return $buffer_add_string($buf, $call1($Stdlib_int[10], $n));
    };
    $bprint_iconv_flag = (dynamic $buf, dynamic $iconv) : dynamic ==> {
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
        // FALLTHROUGH
        case 13:
        // FALLTHROUGH
        case 14:
        // FALLTHROUGH
        case 15:
          return $buffer_add_char($buf, 35);
        // FALLTHROUGH
        default:
          return 0;
        }
    };
    $bprint_int_fmt = 
    (dynamic $buf, dynamic $ign_flag, dynamic $iconv, dynamic $pad, dynamic $prec) : dynamic ==> {
      $buffer_add_char($buf, 37);
      $bprint_ignored_flag($buf, $ign_flag);
      $bprint_iconv_flag($buf, $iconv);
      $bprint_padding($buf, $pad);
      $bprint_precision($buf, $prec);
      return $buffer_add_char($buf, $char_of_iconv($iconv));
    };
    $bprint_altint_fmt = 
    (dynamic $buf, dynamic $ign_flag, dynamic $iconv, dynamic $pad, dynamic $prec, dynamic $c) : dynamic ==> {
      $buffer_add_char($buf, 37);
      $bprint_ignored_flag($buf, $ign_flag);
      $bprint_iconv_flag($buf, $iconv);
      $bprint_padding($buf, $pad);
      $bprint_precision($buf, $prec);
      $buffer_add_char($buf, $c);
      return $buffer_add_char($buf, $char_of_iconv($iconv));
    };
    $bprint_fconv_flag = (dynamic $buf, dynamic $fconv) : dynamic ==> {
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
    $bprint_float_fmt = 
    (dynamic $buf, dynamic $ign_flag, dynamic $fconv, dynamic $pad, dynamic $prec) : dynamic ==> {
      $buffer_add_char($buf, 37);
      $bprint_ignored_flag($buf, $ign_flag);
      $bprint_fconv_flag($buf, $fconv);
      $bprint_padding($buf, $pad);
      $bprint_precision($buf, $prec);
      return $buffer_add_char($buf, $char_of_fconv($fconv));
    };
    $string_of_formatting_lit = (dynamic $formatting_lit) : dynamic ==> {
      $c = null as dynamic;
      $ez_ = null as dynamic;
      $str = null as dynamic;
      $str__0 = null as dynamic;
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
            $ez_ = $call2($Stdlib_string[1], 1, $c);
            return $call2($Stdlib[28], $cst__7, $ez_);
          }
      }
    };
    $string_of_formatting_gen = (dynamic $formatting_gen) : dynamic ==> {
      $match = null as dynamic;
      $str = null as dynamic;
      if (0 === $formatting_gen[0]) {
        $match = $formatting_gen[1];
        $str = $match[2];
        return $str;
      }
      $match__0 = $formatting_gen[1];
      $str__0 = $match__0[2];
      return $str__0;
    };
    $bprint_char_literal = (dynamic $buf, dynamic $chr) : dynamic ==> {
      return 37 === $chr
        ? $buffer_add_string($buf, $cst__8)
        : ($buffer_add_char($buf, $chr));
    };
    $bprint_string_literal = (dynamic $buf, dynamic $str) : dynamic ==> {
      $ey_ = null as dynamic;
      $i = null as dynamic;
      $ex_ = (int) ($caml_ml_string_length($str) + -1) as dynamic;
      $ew_ = 0 as dynamic;
      if (! ($ex_ < 0)) {
        $i = $ew_;
        for (;;) {
          $bprint_char_literal($buf, $caml_string_get($str, $i));
          $ey_ = (int) ($i + 1) as dynamic;
          if ($ex_ !== $i) {$i = $ey_;continue;}
          break;
        }
      }
      return 0;
    };
    $bprint_fmtty->contents = (dynamic $buf, dynamic $fmtty) : dynamic ==> {
      $fmtty__1 = null as dynamic;
      $fmtty__10 = null as dynamic;
      $fmtty__11 = null as dynamic;
      $fmtty__12 = null as dynamic;
      $fmtty__13 = null as dynamic;
      $fmtty__14 = null as dynamic;
      $fmtty__15 = null as dynamic;
      $fmtty__2 = null as dynamic;
      $fmtty__3 = null as dynamic;
      $fmtty__4 = null as dynamic;
      $fmtty__5 = null as dynamic;
      $fmtty__6 = null as dynamic;
      $fmtty__7 = null as dynamic;
      $fmtty__8 = null as dynamic;
      $fmtty__9 = null as dynamic;
      $sub_fmtty = null as dynamic;
      $sub_fmtty__0 = null as dynamic;
      $fmtty__0 = $fmtty;
      for (;;) {
        if ($is_int($fmtty__0)) {return 0;}
        else {
          $continue_label = null;
          switch($fmtty__0[0]) {
            // FALLTHROUGH
            case 0:
              $fmtty__1 = $fmtty__0[1];
              $buffer_add_string($buf, $cst_c);
              $fmtty__0 = $fmtty__1;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 1:
              $fmtty__2 = $fmtty__0[1];
              $buffer_add_string($buf, $cst_s);
              $fmtty__0 = $fmtty__2;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 2:
              $fmtty__3 = $fmtty__0[1];
              $buffer_add_string($buf, $cst_i);
              $fmtty__0 = $fmtty__3;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 3:
              $fmtty__4 = $fmtty__0[1];
              $buffer_add_string($buf, $cst_li);
              $fmtty__0 = $fmtty__4;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 4:
              $fmtty__5 = $fmtty__0[1];
              $buffer_add_string($buf, $cst_ni);
              $fmtty__0 = $fmtty__5;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 5:
              $fmtty__6 = $fmtty__0[1];
              $buffer_add_string($buf, $cst_Li);
              $fmtty__0 = $fmtty__6;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 6:
              $fmtty__7 = $fmtty__0[1];
              $buffer_add_string($buf, $cst_f);
              $fmtty__0 = $fmtty__7;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 7:
              $fmtty__8 = $fmtty__0[1];
              $buffer_add_string($buf, $cst_B);
              $fmtty__0 = $fmtty__8;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 8:
              $fmtty__9 = $fmtty__0[2];
              $sub_fmtty = $fmtty__0[1];
              $buffer_add_string($buf, $cst__9);
              $bprint_fmtty->contents($buf, $sub_fmtty);
              $buffer_add_string($buf, $cst__10);
              $fmtty__0 = $fmtty__9;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 9:
              $fmtty__10 = $fmtty__0[3];
              $sub_fmtty__0 = $fmtty__0[1];
              $buffer_add_string($buf, $cst__11);
              $bprint_fmtty->contents($buf, $sub_fmtty__0);
              $buffer_add_string($buf, $cst__12);
              $fmtty__0 = $fmtty__10;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 10:
              $fmtty__11 = $fmtty__0[1];
              $buffer_add_string($buf, $cst_a);
              $fmtty__0 = $fmtty__11;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 11:
              $fmtty__12 = $fmtty__0[1];
              $buffer_add_string($buf, $cst_t);
              $fmtty__0 = $fmtty__12;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 12:
              $fmtty__13 = $fmtty__0[1];
              $buffer_add_string($buf, $cst__13);
              $fmtty__0 = $fmtty__13;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 13:
              $fmtty__14 = $fmtty__0[1];
              $buffer_add_string($buf, $cst_r);
              $fmtty__0 = $fmtty__14;
              $continue_label = "#";break;
            // FALLTHROUGH
            default:
              $fmtty__15 = $fmtty__0[1];
              $buffer_add_string($buf, $cst_r__0);
              $fmtty__0 = $fmtty__15;
              $continue_label = "#";break;
            }
          if ($continue_label === "#") {continue;}
        }
      }
    };
    $int_of_custom_arity->contents = (dynamic $param) : dynamic ==> {
      $x = null as dynamic;
      if ($param) {
        $x = $param[1];
        return (int) (1 + $int_of_custom_arity->contents($x));
      }
      return 0;
    };
    $bprint_fmt = (dynamic $buf, dynamic $fmt) : dynamic ==> {
      $fmtiter = (dynamic $fmt, dynamic $ign_flag) : dynamic ==> {
        $arity = null as dynamic;
        $char_set = null as dynamic;
        $chr = null as dynamic;
        $counter = null as dynamic;
        $et_ = null as dynamic;
        $eu_ = null as dynamic;
        $ev_ = null as dynamic;
        $fconv = null as dynamic;
        $fmt__1 = null as dynamic;
        $fmt__10 = null as dynamic;
        $fmt__11 = null as dynamic;
        $fmt__12 = null as dynamic;
        $fmt__13 = null as dynamic;
        $fmt__14 = null as dynamic;
        $fmt__15 = null as dynamic;
        $fmt__16 = null as dynamic;
        $fmt__17 = null as dynamic;
        $fmt__18 = null as dynamic;
        $fmt__19 = null as dynamic;
        $fmt__2 = null as dynamic;
        $fmt__20 = null as dynamic;
        $fmt__21 = null as dynamic;
        $fmt__22 = null as dynamic;
        $fmt__23 = null as dynamic;
        $fmt__24 = null as dynamic;
        $fmt__3 = null as dynamic;
        $fmt__4 = null as dynamic;
        $fmt__5 = null as dynamic;
        $fmt__6 = null as dynamic;
        $fmt__7 = null as dynamic;
        $fmt__8 = null as dynamic;
        $fmt__9 = null as dynamic;
        $fmting_gen = null as dynamic;
        $fmting_lit = null as dynamic;
        $fmtty = null as dynamic;
        $fmtty__0 = null as dynamic;
        $i = null as dynamic;
        $iconv = null as dynamic;
        $iconv__0 = null as dynamic;
        $iconv__1 = null as dynamic;
        $iconv__2 = null as dynamic;
        $ign = null as dynamic;
        $match = null as dynamic;
        $pad = null as dynamic;
        $pad__0 = null as dynamic;
        $pad__1 = null as dynamic;
        $pad__2 = null as dynamic;
        $pad__3 = null as dynamic;
        $pad__4 = null as dynamic;
        $pad__5 = null as dynamic;
        $pad__6 = null as dynamic;
        $pad_opt = null as dynamic;
        $pad_opt__0 = null as dynamic;
        $prec = null as dynamic;
        $prec__0 = null as dynamic;
        $prec__1 = null as dynamic;
        $prec__2 = null as dynamic;
        $prec__3 = null as dynamic;
        $rest = null as dynamic;
        $rest__0 = null as dynamic;
        $str = null as dynamic;
        $width_opt = null as dynamic;
        $fmt__0 = $fmt;
        $ign_flag__0 = $ign_flag;
        for (;;) {
          if ($is_int($fmt__0)) {return 0;}
          else {
            $continue_label = null;
            switch($fmt__0[0]) {
              // FALLTHROUGH
              case 0:
                $fmt__1 = $fmt__0[1];
                $buffer_add_char($buf, 37);
                $bprint_ignored_flag($buf, $ign_flag__0);
                $buffer_add_char($buf, 99);
                $fmt__0 = $fmt__1;
                $ign_flag__0 = 0 as dynamic;
                $continue_label = "#";break;
              // FALLTHROUGH
              case 1:
                $fmt__2 = $fmt__0[1];
                $buffer_add_char($buf, 37);
                $bprint_ignored_flag($buf, $ign_flag__0);
                $buffer_add_char($buf, 67);
                $fmt__0 = $fmt__2;
                $ign_flag__0 = 0 as dynamic;
                $continue_label = "#";break;
              // FALLTHROUGH
              case 2:
                $fmt__3 = $fmt__0[2];
                $pad = $fmt__0[1];
                $buffer_add_char($buf, 37);
                $bprint_ignored_flag($buf, $ign_flag__0);
                $bprint_padding($buf, $pad);
                $buffer_add_char($buf, 115);
                $fmt__0 = $fmt__3;
                $ign_flag__0 = 0 as dynamic;
                $continue_label = "#";break;
              // FALLTHROUGH
              case 3:
                $fmt__4 = $fmt__0[2];
                $pad__0 = $fmt__0[1];
                $buffer_add_char($buf, 37);
                $bprint_ignored_flag($buf, $ign_flag__0);
                $bprint_padding($buf, $pad__0);
                $buffer_add_char($buf, 83);
                $fmt__0 = $fmt__4;
                $ign_flag__0 = 0 as dynamic;
                $continue_label = "#";break;
              // FALLTHROUGH
              case 4:
                $fmt__5 = $fmt__0[4];
                $prec = $fmt__0[3];
                $pad__1 = $fmt__0[2];
                $iconv = $fmt__0[1];
                $bprint_int_fmt($buf, $ign_flag__0, $iconv, $pad__1, $prec);
                $fmt__0 = $fmt__5;
                $ign_flag__0 = 0 as dynamic;
                $continue_label = "#";break;
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
                $ign_flag__0 = 0 as dynamic;
                $continue_label = "#";break;
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
                $ign_flag__0 = 0 as dynamic;
                $continue_label = "#";break;
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
                $ign_flag__0 = 0 as dynamic;
                $continue_label = "#";break;
              // FALLTHROUGH
              case 8:
                $fmt__9 = $fmt__0[4];
                $prec__3 = $fmt__0[3];
                $pad__5 = $fmt__0[2];
                $fconv = $fmt__0[1];
                $bprint_float_fmt(
                  $buf,
                  $ign_flag__0,
                  $fconv,
                  $pad__5,
                  $prec__3
                );
                $fmt__0 = $fmt__9;
                $ign_flag__0 = 0 as dynamic;
                $continue_label = "#";break;
              // FALLTHROUGH
              case 9:
                $fmt__10 = $fmt__0[2];
                $pad__6 = $fmt__0[1];
                $buffer_add_char($buf, 37);
                $bprint_ignored_flag($buf, $ign_flag__0);
                $bprint_padding($buf, $pad__6);
                $buffer_add_char($buf, 66);
                $fmt__0 = $fmt__10;
                $ign_flag__0 = 0 as dynamic;
                $continue_label = "#";break;
              // FALLTHROUGH
              case 10:
                $fmt__11 = $fmt__0[1];
                $buffer_add_string($buf, $cst__14);
                $fmt__0 = $fmt__11;
                $continue_label = "#";break;
              // FALLTHROUGH
              case 11:
                $fmt__12 = $fmt__0[2];
                $str = $fmt__0[1];
                $bprint_string_literal($buf, $str);
                $fmt__0 = $fmt__12;
                $continue_label = "#";break;
              // FALLTHROUGH
              case 12:
                $fmt__13 = $fmt__0[2];
                $chr = $fmt__0[1];
                $bprint_char_literal($buf, $chr);
                $fmt__0 = $fmt__13;
                $continue_label = "#";break;
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
                $ign_flag__0 = 0 as dynamic;
                $continue_label = "#";break;
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
                $ign_flag__0 = 0 as dynamic;
                $continue_label = "#";break;
              // FALLTHROUGH
              case 15:
                $fmt__16 = $fmt__0[1];
                $buffer_add_char($buf, 37);
                $bprint_ignored_flag($buf, $ign_flag__0);
                $buffer_add_char($buf, 97);
                $fmt__0 = $fmt__16;
                $ign_flag__0 = 0 as dynamic;
                $continue_label = "#";break;
              // FALLTHROUGH
              case 16:
                $fmt__17 = $fmt__0[1];
                $buffer_add_char($buf, 37);
                $bprint_ignored_flag($buf, $ign_flag__0);
                $buffer_add_char($buf, 116);
                $fmt__0 = $fmt__17;
                $ign_flag__0 = 0 as dynamic;
                $continue_label = "#";break;
              // FALLTHROUGH
              case 17:
                $fmt__18 = $fmt__0[2];
                $fmting_lit = $fmt__0[1];
                $bprint_string_literal(
                  $buf,
                  $string_of_formatting_lit($fmting_lit)
                );
                $fmt__0 = $fmt__18;
                $continue_label = "#";break;
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
                $continue_label = "#";break;
              // FALLTHROUGH
              case 19:
                $fmt__20 = $fmt__0[1];
                $buffer_add_char($buf, 37);
                $bprint_ignored_flag($buf, $ign_flag__0);
                $buffer_add_char($buf, 114);
                $fmt__0 = $fmt__20;
                $ign_flag__0 = 0 as dynamic;
                $continue_label = "#";break;
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
                $ign_flag__0 = 0 as dynamic;
                $continue_label = "#";break;
              // FALLTHROUGH
              case 21:
                $fmt__22 = $fmt__0[2];
                $counter = $fmt__0[1];
                $buffer_add_char($buf, 37);
                $bprint_ignored_flag($buf, $ign_flag__0);
                $buffer_add_char($buf, $char_of_counter($counter));
                $fmt__0 = $fmt__22;
                $ign_flag__0 = 0 as dynamic;
                $continue_label = "#";break;
              // FALLTHROUGH
              case 22:
                $fmt__23 = $fmt__0[1];
                $buffer_add_char($buf, 37);
                $bprint_ignored_flag($buf, $ign_flag__0);
                $bprint_string_literal($buf, $cst_0c);
                $fmt__0 = $fmt__23;
                $ign_flag__0 = 0 as dynamic;
                $continue_label = "#";break;
              // FALLTHROUGH
              case 23:
                $rest = $fmt__0[2];
                $ign = $fmt__0[1];
                $match = $param_format_of_ignored_format($ign, $rest);
                $fmt__24 = $match[1];
                $fmt__0 = $fmt__24;
                $ign_flag__0 = 1 as dynamic;
                $continue_label = "#";break;
              // FALLTHROUGH
              default:
                $rest__0 = $fmt__0[3];
                $arity = $fmt__0[1];
                $eu_ = $int_of_custom_arity->contents($arity);
                $et_ = 1 as dynamic;
                if (! ($eu_ < 1)) {
                  $i = $et_;
                  for (;;) {
                    $buffer_add_char($buf, 37);
                    $bprint_ignored_flag($buf, $ign_flag__0);
                    $buffer_add_char($buf, 63);
                    $ev_ = (int) ($i + 1) as dynamic;
                    if ($eu_ !== $i) {$i = $ev_;continue;}
                    break;
                  }
                }
                $fmt__0 = $rest__0;
                $ign_flag__0 = 0 as dynamic;
                $continue_label = "#";break;
              }
            if ($continue_label === "#") {continue;}
          }
        }
      };
      return $fmtiter($fmt, 0);
    };
    $string_of_fmt = (dynamic $fmt) : dynamic ==> {
      $buf = $buffer_create(16);
      $bprint_fmt($buf, $fmt);
      return $buffer_contents($buf);
    };
    $symm->contents = (dynamic $param) : dynamic ==> {
      $rest = null as dynamic;
      $rest__0 = null as dynamic;
      $rest__1 = null as dynamic;
      $rest__10 = null as dynamic;
      $rest__11 = null as dynamic;
      $rest__12 = null as dynamic;
      $rest__13 = null as dynamic;
      $rest__2 = null as dynamic;
      $rest__3 = null as dynamic;
      $rest__4 = null as dynamic;
      $rest__5 = null as dynamic;
      $rest__6 = null as dynamic;
      $rest__7 = null as dynamic;
      $rest__8 = null as dynamic;
      $rest__9 = null as dynamic;
      $ty = null as dynamic;
      $ty1 = null as dynamic;
      $ty2 = null as dynamic;
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
    $fmtty_rel_det->contents = (dynamic $param) : dynamic ==> {
      $af = null as dynamic;
      $af__0 = null as dynamic;
      $af__1 = null as dynamic;
      $af__10 = null as dynamic;
      $af__11 = null as dynamic;
      $af__12 = null as dynamic;
      $af__13 = null as dynamic;
      $af__2 = null as dynamic;
      $af__3 = null as dynamic;
      $af__4 = null as dynamic;
      $af__5 = null as dynamic;
      $af__6 = null as dynamic;
      $af__7 = null as dynamic;
      $af__8 = null as dynamic;
      $af__9 = null as dynamic;
      $ag = null as dynamic;
      $d6_ = null as dynamic;
      $d7_ = null as dynamic;
      $d8_ = null as dynamic;
      $d9_ = null as dynamic;
      $d__ = null as dynamic;
      $de = null as dynamic;
      $de__0 = null as dynamic;
      $de__1 = null as dynamic;
      $de__10 = null as dynamic;
      $de__11 = null as dynamic;
      $de__12 = null as dynamic;
      $de__13 = null as dynamic;
      $de__2 = null as dynamic;
      $de__3 = null as dynamic;
      $de__4 = null as dynamic;
      $de__5 = null as dynamic;
      $de__6 = null as dynamic;
      $de__7 = null as dynamic;
      $de__8 = null as dynamic;
      $de__9 = null as dynamic;
      $dj = null as dynamic;
      $ea_ = null as dynamic;
      $eb_ = null as dynamic;
      $ec_ = null as dynamic;
      $ed = null as dynamic;
      $ed_ = null as dynamic;
      $ed__0 = null as dynamic;
      $ed__1 = null as dynamic;
      $ed__10 = null as dynamic;
      $ed__11 = null as dynamic;
      $ed__12 = null as dynamic;
      $ed__13 = null as dynamic;
      $ed__2 = null as dynamic;
      $ed__3 = null as dynamic;
      $ed__4 = null as dynamic;
      $ed__5 = null as dynamic;
      $ed__6 = null as dynamic;
      $ed__7 = null as dynamic;
      $ed__8 = null as dynamic;
      $ed__9 = null as dynamic;
      $ee_ = null as dynamic;
      $ef_ = null as dynamic;
      $eg_ = null as dynamic;
      $eh_ = null as dynamic;
      $ei_ = null as dynamic;
      $ej_ = null as dynamic;
      $ek_ = null as dynamic;
      $el_ = null as dynamic;
      $em_ = null as dynamic;
      $en_ = null as dynamic;
      $eo_ = null as dynamic;
      $ep_ = null as dynamic;
      $eq_ = null as dynamic;
      $er_ = null as dynamic;
      $es_ = null as dynamic;
      $fa = null as dynamic;
      $fa__0 = null as dynamic;
      $fa__1 = null as dynamic;
      $fa__10 = null as dynamic;
      $fa__11 = null as dynamic;
      $fa__12 = null as dynamic;
      $fa__13 = null as dynamic;
      $fa__2 = null as dynamic;
      $fa__3 = null as dynamic;
      $fa__4 = null as dynamic;
      $fa__5 = null as dynamic;
      $fa__6 = null as dynamic;
      $fa__7 = null as dynamic;
      $fa__8 = null as dynamic;
      $fa__9 = null as dynamic;
      $ga = null as dynamic;
      $jd = null as dynamic;
      $match = null as dynamic;
      $match__0 = null as dynamic;
      $match__1 = null as dynamic;
      $match__10 = null as dynamic;
      $match__11 = null as dynamic;
      $match__12 = null as dynamic;
      $match__13 = null as dynamic;
      $match__14 = null as dynamic;
      $match__2 = null as dynamic;
      $match__3 = null as dynamic;
      $match__4 = null as dynamic;
      $match__5 = null as dynamic;
      $match__6 = null as dynamic;
      $match__7 = null as dynamic;
      $match__8 = null as dynamic;
      $match__9 = null as dynamic;
      $rest = null as dynamic;
      $rest__0 = null as dynamic;
      $rest__1 = null as dynamic;
      $rest__10 = null as dynamic;
      $rest__11 = null as dynamic;
      $rest__12 = null as dynamic;
      $rest__13 = null as dynamic;
      $rest__2 = null as dynamic;
      $rest__3 = null as dynamic;
      $rest__4 = null as dynamic;
      $rest__5 = null as dynamic;
      $rest__6 = null as dynamic;
      $rest__7 = null as dynamic;
      $rest__8 = null as dynamic;
      $rest__9 = null as dynamic;
      $ty = null as dynamic;
      $ty1 = null as dynamic;
      $ty2 = null as dynamic;
      if ($is_int($param)) {
        $d6_ = (dynamic $param) : dynamic ==> {return 0;};
        $d7_ = (dynamic $param) : dynamic ==> {return 0;};
        $d8_ = (dynamic $param) : dynamic ==> {return 0;};
        return Vector{
          0,
          (dynamic $param) : dynamic ==> {return 0;},
          $d8_,
          $d7_,
          $d6_
        };
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
            $d9_ = (dynamic $param) : dynamic ==> {$call1($af, 0);return 0;};
            return Vector{
              0,
              (dynamic $param) : dynamic ==> {$call1($fa, 0);return 0;},
              $d9_,
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
            $d__ = (dynamic $param) : dynamic ==> {
              $call1($af__0, 0);
              return 0;
            };
            return Vector{
              0,
              (dynamic $param) : dynamic ==> {$call1($fa__0, 0);return 0;},
              $d__,
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
            $ea_ = (dynamic $param) : dynamic ==> {
              $call1($af__1, 0);
              return 0;
            };
            return Vector{
              0,
              (dynamic $param) : dynamic ==> {$call1($fa__1, 0);return 0;},
              $ea_,
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
            $eb_ = (dynamic $param) : dynamic ==> {
              $call1($af__2, 0);
              return 0;
            };
            return Vector{
              0,
              (dynamic $param) : dynamic ==> {$call1($fa__2, 0);return 0;},
              $eb_,
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
            $ec_ = (dynamic $param) : dynamic ==> {
              $call1($af__3, 0);
              return 0;
            };
            return Vector{
              0,
              (dynamic $param) : dynamic ==> {$call1($fa__3, 0);return 0;},
              $ec_,
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
            $ed_ = (dynamic $param) : dynamic ==> {
              $call1($af__4, 0);
              return 0;
            };
            return Vector{
              0,
              (dynamic $param) : dynamic ==> {$call1($fa__4, 0);return 0;},
              $ed_,
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
            $ee_ = (dynamic $param) : dynamic ==> {
              $call1($af__5, 0);
              return 0;
            };
            return Vector{
              0,
              (dynamic $param) : dynamic ==> {$call1($fa__5, 0);return 0;},
              $ee_,
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
            $ef_ = (dynamic $param) : dynamic ==> {
              $call1($af__6, 0);
              return 0;
            };
            return Vector{
              0,
              (dynamic $param) : dynamic ==> {$call1($fa__6, 0);return 0;},
              $ef_,
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
            $eg_ = (dynamic $param) : dynamic ==> {
              $call1($af__7, 0);
              return 0;
            };
            return Vector{
              0,
              (dynamic $param) : dynamic ==> {$call1($fa__7, 0);return 0;},
              $eg_,
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
            $eh_ = (dynamic $param) : dynamic ==> {
              $call1($jd, 0);
              $call1($de__8, 0);
              return 0;
            };
            $ei_ = (dynamic $param) : dynamic ==> {
              $call1($ed__8, 0);
              $call1($dj, 0);
              return 0;
            };
            $ej_ = (dynamic $param) : dynamic ==> {
              $call1($ga, 0);
              $call1($af__8, 0);
              return 0;
            };
            return Vector{
              0,
              (dynamic $param) : dynamic ==> {
                $call1($fa__8, 0);
                $call1($ag, 0);
                return 0;
              },
              $ej_,
              $ei_,
              $eh_
            };
          // FALLTHROUGH
          case 10:
            $rest__9 = $param[1];
            $match__10 = $fmtty_rel_det->contents($rest__9);
            $de__9 = $match__10[4];
            $ed__9 = $match__10[3];
            $af__9 = $match__10[2];
            $fa__9 = $match__10[1];
            $ek_ = (dynamic $param) : dynamic ==> {
              $call1($af__9, 0);
              return 0;
            };
            return Vector{
              0,
              (dynamic $param) : dynamic ==> {$call1($fa__9, 0);return 0;},
              $ek_,
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
            $el_ = (dynamic $param) : dynamic ==> {
              $call1($af__10, 0);
              return 0;
            };
            return Vector{
              0,
              (dynamic $param) : dynamic ==> {$call1($fa__10, 0);return 0;},
              $el_,
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
            $em_ = (dynamic $param) : dynamic ==> {
              $call1($af__11, 0);
              return 0;
            };
            return Vector{
              0,
              (dynamic $param) : dynamic ==> {$call1($fa__11, 0);return 0;},
              $em_,
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
            $en_ = (dynamic $param) : dynamic ==> {
              $call1($de__12, 0);
              return 0;
            };
            $eo_ = (dynamic $param) : dynamic ==> {
              $call1($ed__12, 0);
              return 0;
            };
            $ep_ = (dynamic $param) : dynamic ==> {
              $call1($af__12, 0);
              return 0;
            };
            return Vector{
              0,
              (dynamic $param) : dynamic ==> {$call1($fa__12, 0);return 0;},
              $ep_,
              $eo_,
              $en_
            };
          // FALLTHROUGH
          default:
            $rest__13 = $param[1];
            $match__14 = $fmtty_rel_det->contents($rest__13);
            $de__13 = $match__14[4];
            $ed__13 = $match__14[3];
            $af__13 = $match__14[2];
            $fa__13 = $match__14[1];
            $eq_ = (dynamic $param) : dynamic ==> {
              $call1($de__13, 0);
              return 0;
            };
            $er_ = (dynamic $param) : dynamic ==> {
              $call1($ed__13, 0);
              return 0;
            };
            $es_ = (dynamic $param) : dynamic ==> {
              $call1($af__13, 0);
              return 0;
            };
            return Vector{
              0,
              (dynamic $param) : dynamic ==> {$call1($fa__13, 0);return 0;},
              $es_,
              $er_,
              $eq_
            };
          }
      }
    };
    $trans->contents = (dynamic $ty1, dynamic $match) : dynamic ==> {
      $d0_ = null as dynamic;
      $d1_ = null as dynamic;
      $d2_ = null as dynamic;
      $d3_ = null as dynamic;
      $d4_ = null as dynamic;
      $d5_ = null as dynamic;
      $dN_ = null as dynamic;
      $dO_ = null as dynamic;
      $dP_ = null as dynamic;
      $dQ_ = null as dynamic;
      $dR_ = null as dynamic;
      $dS_ = null as dynamic;
      $dT_ = null as dynamic;
      $dU_ = null as dynamic;
      $dV_ = null as dynamic;
      $dW_ = null as dynamic;
      $dX_ = null as dynamic;
      $dY_ = null as dynamic;
      $dZ_ = null as dynamic;
      $f2 = null as dynamic;
      $f4 = null as dynamic;
      $match__0 = null as dynamic;
      $rest2 = null as dynamic;
      $rest2__0 = null as dynamic;
      $rest2__1 = null as dynamic;
      $rest2__10 = null as dynamic;
      $rest2__11 = null as dynamic;
      $rest2__12 = null as dynamic;
      $rest2__13 = null as dynamic;
      $rest2__2 = null as dynamic;
      $rest2__3 = null as dynamic;
      $rest2__4 = null as dynamic;
      $rest2__5 = null as dynamic;
      $rest2__6 = null as dynamic;
      $rest2__7 = null as dynamic;
      $rest2__8 = null as dynamic;
      $rest2__9 = null as dynamic;
      $switch__0 = null as dynamic;
      $switch__1 = null as dynamic;
      $switch__10 = null as dynamic;
      $switch__11 = null as dynamic;
      $switch__12 = null as dynamic;
      $switch__13 = null as dynamic;
      $switch__14 = null as dynamic;
      $switch__2 = null as dynamic;
      $switch__3 = null as dynamic;
      $switch__4 = null as dynamic;
      $switch__5 = null as dynamic;
      $switch__6 = null as dynamic;
      $switch__7 = null as dynamic;
      $switch__8 = null as dynamic;
      $switch__9 = null as dynamic;
      $ty = null as dynamic;
      $ty2 = null as dynamic;
      $ty21 = null as dynamic;
      $ty22 = null as dynamic;
      if ($is_int($ty1)) {
        if ($is_int($match)) {return 0;}
        else {
          switch($match[0]) {
            // FALLTHROUGH
            case 10:
              $switch__0 = 0 as dynamic;
              break;
            // FALLTHROUGH
            case 11:
              $switch__0 = 1 as dynamic;
              break;
            // FALLTHROUGH
            case 12:
              $switch__0 = 2 as dynamic;
              break;
            // FALLTHROUGH
            case 13:
              $switch__0 = 3 as dynamic;
              break;
            // FALLTHROUGH
            case 14:
              $switch__0 = 4 as dynamic;
              break;
            // FALLTHROUGH
            case 8:
              $switch__0 = 5 as dynamic;
              break;
            // FALLTHROUGH
            case 9:
              $switch__0 = 6 as dynamic;
              break;
            // FALLTHROUGH
            default:
              throw $caml_wrap_thrown_exception(
                      Vector{0, $Assert_failure, $a_}
                    ) as \Throwable;
            }
        }
      }
      else {
        switch($ty1[0]) {
          // FALLTHROUGH
          case 0:
            $dN_ = $ty1[1];
            if ($is_int($match)) {
              $switch__1 = 1 as dynamic;
            }
            else {
              switch($match[0]) {
                // FALLTHROUGH
                case 0:
                  $rest2 = $match[1];
                  return Vector{0, $trans->contents($dN_, $rest2)};
                // FALLTHROUGH
                case 8:
                  $switch__0 = 5 as dynamic;
                  $switch__1 = 0 as dynamic;
                  break;
                // FALLTHROUGH
                case 9:
                  $switch__0 = 6 as dynamic;
                  $switch__1 = 0 as dynamic;
                  break;
                // FALLTHROUGH
                case 10:
                  $switch__0 = 0 as dynamic;
                  $switch__1 = 0 as dynamic;
                  break;
                // FALLTHROUGH
                case 11:
                  $switch__0 = 1 as dynamic;
                  $switch__1 = 0 as dynamic;
                  break;
                // FALLTHROUGH
                case 12:
                  $switch__0 = 2 as dynamic;
                  $switch__1 = 0 as dynamic;
                  break;
                // FALLTHROUGH
                case 13:
                  $switch__0 = 3 as dynamic;
                  $switch__1 = 0 as dynamic;
                  break;
                // FALLTHROUGH
                case 14:
                  $switch__0 = 4 as dynamic;
                  $switch__1 = 0 as dynamic;
                  break;
                // FALLTHROUGH
                default:
                  $switch__1 = 1 as dynamic;
                }
            }
            if ($switch__1) {$switch__0 = 7 as dynamic;}
            break;
          // FALLTHROUGH
          case 1:
            $dO_ = $ty1[1];
            if ($is_int($match)) {
              $switch__2 = 1 as dynamic;
            }
            else {
              switch($match[0]) {
                // FALLTHROUGH
                case 1:
                  $rest2__0 = $match[1];
                  return Vector{1, $trans->contents($dO_, $rest2__0)};
                // FALLTHROUGH
                case 8:
                  $switch__0 = 5 as dynamic;
                  $switch__2 = 0 as dynamic;
                  break;
                // FALLTHROUGH
                case 9:
                  $switch__0 = 6 as dynamic;
                  $switch__2 = 0 as dynamic;
                  break;
                // FALLTHROUGH
                case 10:
                  $switch__0 = 0 as dynamic;
                  $switch__2 = 0 as dynamic;
                  break;
                // FALLTHROUGH
                case 11:
                  $switch__0 = 1 as dynamic;
                  $switch__2 = 0 as dynamic;
                  break;
                // FALLTHROUGH
                case 12:
                  $switch__0 = 2 as dynamic;
                  $switch__2 = 0 as dynamic;
                  break;
                // FALLTHROUGH
                case 13:
                  $switch__0 = 3 as dynamic;
                  $switch__2 = 0 as dynamic;
                  break;
                // FALLTHROUGH
                case 14:
                  $switch__0 = 4 as dynamic;
                  $switch__2 = 0 as dynamic;
                  break;
                // FALLTHROUGH
                default:
                  $switch__2 = 1 as dynamic;
                }
            }
            if ($switch__2) {$switch__0 = 7 as dynamic;}
            break;
          // FALLTHROUGH
          case 2:
            $dP_ = $ty1[1];
            if ($is_int($match)) {
              $switch__3 = 1 as dynamic;
            }
            else {
              switch($match[0]) {
                // FALLTHROUGH
                case 2:
                  $rest2__1 = $match[1];
                  return Vector{2, $trans->contents($dP_, $rest2__1)};
                // FALLTHROUGH
                case 8:
                  $switch__0 = 5 as dynamic;
                  $switch__3 = 0 as dynamic;
                  break;
                // FALLTHROUGH
                case 9:
                  $switch__0 = 6 as dynamic;
                  $switch__3 = 0 as dynamic;
                  break;
                // FALLTHROUGH
                case 10:
                  $switch__0 = 0 as dynamic;
                  $switch__3 = 0 as dynamic;
                  break;
                // FALLTHROUGH
                case 11:
                  $switch__0 = 1 as dynamic;
                  $switch__3 = 0 as dynamic;
                  break;
                // FALLTHROUGH
                case 12:
                  $switch__0 = 2 as dynamic;
                  $switch__3 = 0 as dynamic;
                  break;
                // FALLTHROUGH
                case 13:
                  $switch__0 = 3 as dynamic;
                  $switch__3 = 0 as dynamic;
                  break;
                // FALLTHROUGH
                case 14:
                  $switch__0 = 4 as dynamic;
                  $switch__3 = 0 as dynamic;
                  break;
                // FALLTHROUGH
                default:
                  $switch__3 = 1 as dynamic;
                }
            }
            if ($switch__3) {$switch__0 = 7 as dynamic;}
            break;
          // FALLTHROUGH
          case 3:
            $dQ_ = $ty1[1];
            if ($is_int($match)) {
              $switch__4 = 1 as dynamic;
            }
            else {
              switch($match[0]) {
                // FALLTHROUGH
                case 3:
                  $rest2__2 = $match[1];
                  return Vector{3, $trans->contents($dQ_, $rest2__2)};
                // FALLTHROUGH
                case 8:
                  $switch__0 = 5 as dynamic;
                  $switch__4 = 0 as dynamic;
                  break;
                // FALLTHROUGH
                case 9:
                  $switch__0 = 6 as dynamic;
                  $switch__4 = 0 as dynamic;
                  break;
                // FALLTHROUGH
                case 10:
                  $switch__0 = 0 as dynamic;
                  $switch__4 = 0 as dynamic;
                  break;
                // FALLTHROUGH
                case 11:
                  $switch__0 = 1 as dynamic;
                  $switch__4 = 0 as dynamic;
                  break;
                // FALLTHROUGH
                case 12:
                  $switch__0 = 2 as dynamic;
                  $switch__4 = 0 as dynamic;
                  break;
                // FALLTHROUGH
                case 13:
                  $switch__0 = 3 as dynamic;
                  $switch__4 = 0 as dynamic;
                  break;
                // FALLTHROUGH
                case 14:
                  $switch__0 = 4 as dynamic;
                  $switch__4 = 0 as dynamic;
                  break;
                // FALLTHROUGH
                default:
                  $switch__4 = 1 as dynamic;
                }
            }
            if ($switch__4) {$switch__0 = 7 as dynamic;}
            break;
          // FALLTHROUGH
          case 4:
            $dR_ = $ty1[1];
            if ($is_int($match)) {
              $switch__5 = 1 as dynamic;
            }
            else {
              switch($match[0]) {
                // FALLTHROUGH
                case 4:
                  $rest2__3 = $match[1];
                  return Vector{4, $trans->contents($dR_, $rest2__3)};
                // FALLTHROUGH
                case 8:
                  $switch__0 = 5 as dynamic;
                  $switch__5 = 0 as dynamic;
                  break;
                // FALLTHROUGH
                case 9:
                  $switch__0 = 6 as dynamic;
                  $switch__5 = 0 as dynamic;
                  break;
                // FALLTHROUGH
                case 10:
                  $switch__0 = 0 as dynamic;
                  $switch__5 = 0 as dynamic;
                  break;
                // FALLTHROUGH
                case 11:
                  $switch__0 = 1 as dynamic;
                  $switch__5 = 0 as dynamic;
                  break;
                // FALLTHROUGH
                case 12:
                  $switch__0 = 2 as dynamic;
                  $switch__5 = 0 as dynamic;
                  break;
                // FALLTHROUGH
                case 13:
                  $switch__0 = 3 as dynamic;
                  $switch__5 = 0 as dynamic;
                  break;
                // FALLTHROUGH
                case 14:
                  $switch__0 = 4 as dynamic;
                  $switch__5 = 0 as dynamic;
                  break;
                // FALLTHROUGH
                default:
                  $switch__5 = 1 as dynamic;
                }
            }
            if ($switch__5) {$switch__0 = 7 as dynamic;}
            break;
          // FALLTHROUGH
          case 5:
            $dS_ = $ty1[1];
            if ($is_int($match)) {
              $switch__6 = 1 as dynamic;
            }
            else {
              switch($match[0]) {
                // FALLTHROUGH
                case 5:
                  $rest2__4 = $match[1];
                  return Vector{5, $trans->contents($dS_, $rest2__4)};
                // FALLTHROUGH
                case 8:
                  $switch__0 = 5 as dynamic;
                  $switch__6 = 0 as dynamic;
                  break;
                // FALLTHROUGH
                case 9:
                  $switch__0 = 6 as dynamic;
                  $switch__6 = 0 as dynamic;
                  break;
                // FALLTHROUGH
                case 10:
                  $switch__0 = 0 as dynamic;
                  $switch__6 = 0 as dynamic;
                  break;
                // FALLTHROUGH
                case 11:
                  $switch__0 = 1 as dynamic;
                  $switch__6 = 0 as dynamic;
                  break;
                // FALLTHROUGH
                case 12:
                  $switch__0 = 2 as dynamic;
                  $switch__6 = 0 as dynamic;
                  break;
                // FALLTHROUGH
                case 13:
                  $switch__0 = 3 as dynamic;
                  $switch__6 = 0 as dynamic;
                  break;
                // FALLTHROUGH
                case 14:
                  $switch__0 = 4 as dynamic;
                  $switch__6 = 0 as dynamic;
                  break;
                // FALLTHROUGH
                default:
                  $switch__6 = 1 as dynamic;
                }
            }
            if ($switch__6) {$switch__0 = 7 as dynamic;}
            break;
          // FALLTHROUGH
          case 6:
            $dT_ = $ty1[1];
            if ($is_int($match)) {
              $switch__7 = 1 as dynamic;
            }
            else {
              switch($match[0]) {
                // FALLTHROUGH
                case 6:
                  $rest2__5 = $match[1];
                  return Vector{6, $trans->contents($dT_, $rest2__5)};
                // FALLTHROUGH
                case 8:
                  $switch__0 = 5 as dynamic;
                  $switch__7 = 0 as dynamic;
                  break;
                // FALLTHROUGH
                case 9:
                  $switch__0 = 6 as dynamic;
                  $switch__7 = 0 as dynamic;
                  break;
                // FALLTHROUGH
                case 10:
                  $switch__0 = 0 as dynamic;
                  $switch__7 = 0 as dynamic;
                  break;
                // FALLTHROUGH
                case 11:
                  $switch__0 = 1 as dynamic;
                  $switch__7 = 0 as dynamic;
                  break;
                // FALLTHROUGH
                case 12:
                  $switch__0 = 2 as dynamic;
                  $switch__7 = 0 as dynamic;
                  break;
                // FALLTHROUGH
                case 13:
                  $switch__0 = 3 as dynamic;
                  $switch__7 = 0 as dynamic;
                  break;
                // FALLTHROUGH
                case 14:
                  $switch__0 = 4 as dynamic;
                  $switch__7 = 0 as dynamic;
                  break;
                // FALLTHROUGH
                default:
                  $switch__7 = 1 as dynamic;
                }
            }
            if ($switch__7) {$switch__0 = 7 as dynamic;}
            break;
          // FALLTHROUGH
          case 7:
            $dU_ = $ty1[1];
            if ($is_int($match)) {
              $switch__8 = 1 as dynamic;
            }
            else {
              switch($match[0]) {
                // FALLTHROUGH
                case 7:
                  $rest2__6 = $match[1];
                  return Vector{7, $trans->contents($dU_, $rest2__6)};
                // FALLTHROUGH
                case 8:
                  $switch__0 = 5 as dynamic;
                  $switch__8 = 0 as dynamic;
                  break;
                // FALLTHROUGH
                case 9:
                  $switch__0 = 6 as dynamic;
                  $switch__8 = 0 as dynamic;
                  break;
                // FALLTHROUGH
                case 10:
                  $switch__0 = 0 as dynamic;
                  $switch__8 = 0 as dynamic;
                  break;
                // FALLTHROUGH
                case 11:
                  $switch__0 = 1 as dynamic;
                  $switch__8 = 0 as dynamic;
                  break;
                // FALLTHROUGH
                case 12:
                  $switch__0 = 2 as dynamic;
                  $switch__8 = 0 as dynamic;
                  break;
                // FALLTHROUGH
                case 13:
                  $switch__0 = 3 as dynamic;
                  $switch__8 = 0 as dynamic;
                  break;
                // FALLTHROUGH
                case 14:
                  $switch__0 = 4 as dynamic;
                  $switch__8 = 0 as dynamic;
                  break;
                // FALLTHROUGH
                default:
                  $switch__8 = 1 as dynamic;
                }
            }
            if ($switch__8) {$switch__0 = 7 as dynamic;}
            break;
          // FALLTHROUGH
          case 8:
            $dV_ = $ty1[2];
            $dW_ = $ty1[1];
            if ($is_int($match)) {
              $switch__9 = 1 as dynamic;
            }
            else {
              switch($match[0]) {
                // FALLTHROUGH
                case 8:
                  $rest2__7 = $match[2];
                  $ty2 = $match[1];
                  $dX_ = $trans->contents($dV_, $rest2__7);
                  return Vector{8, $trans->contents($dW_, $ty2), $dX_};
                // FALLTHROUGH
                case 10:
                  $switch__0 = 0 as dynamic;
                  $switch__9 = 0 as dynamic;
                  break;
                // FALLTHROUGH
                case 11:
                  $switch__0 = 1 as dynamic;
                  $switch__9 = 0 as dynamic;
                  break;
                // FALLTHROUGH
                case 12:
                  $switch__0 = 2 as dynamic;
                  $switch__9 = 0 as dynamic;
                  break;
                // FALLTHROUGH
                case 13:
                  $switch__0 = 3 as dynamic;
                  $switch__9 = 0 as dynamic;
                  break;
                // FALLTHROUGH
                case 14:
                  $switch__0 = 4 as dynamic;
                  $switch__9 = 0 as dynamic;
                  break;
                // FALLTHROUGH
                default:
                  $switch__9 = 1 as dynamic;
                }
            }
            if ($switch__9) {
              throw $caml_wrap_thrown_exception(
                      Vector{0, $Assert_failure, $j_}
                    ) as \Throwable;
            }
            break;
          // FALLTHROUGH
          case 9:
            $dY_ = $ty1[3];
            $dZ_ = $ty1[2];
            $d0_ = $ty1[1];
            if ($is_int($match)) {
              $switch__10 = 1 as dynamic;
            }
            else {
              switch($match[0]) {
                // FALLTHROUGH
                case 8:
                  $switch__0 = 5 as dynamic;
                  $switch__10 = 0 as dynamic;
                  break;
                // FALLTHROUGH
                case 9:
                  $rest2__8 = $match[3];
                  $ty22 = $match[2];
                  $ty21 = $match[1];
                  $ty = $trans->contents($symm->contents($dZ_), $ty21);
                  $match__0 = $fmtty_rel_det->contents($ty);
                  $f4 = $match__0[4];
                  $f2 = $match__0[2];
                  $call1($f2, 0);
                  $call1($f4, 0);
                  return Vector{
                    9,
                    $d0_,
                    $ty22,
                    $trans->contents($dY_, $rest2__8)
                  };
                // FALLTHROUGH
                case 10:
                  $switch__0 = 0 as dynamic;
                  $switch__10 = 0 as dynamic;
                  break;
                // FALLTHROUGH
                case 11:
                  $switch__0 = 1 as dynamic;
                  $switch__10 = 0 as dynamic;
                  break;
                // FALLTHROUGH
                case 12:
                  $switch__0 = 2 as dynamic;
                  $switch__10 = 0 as dynamic;
                  break;
                // FALLTHROUGH
                case 13:
                  $switch__0 = 3 as dynamic;
                  $switch__10 = 0 as dynamic;
                  break;
                // FALLTHROUGH
                case 14:
                  $switch__0 = 4 as dynamic;
                  $switch__10 = 0 as dynamic;
                  break;
                // FALLTHROUGH
                default:
                  $switch__10 = 1 as dynamic;
                }
            }
            if ($switch__10) {
              throw $caml_wrap_thrown_exception(
                      Vector{0, $Assert_failure, $k_}
                    ) as \Throwable;
            }
            break;
          // FALLTHROUGH
          case 10:
            $d1_ = $ty1[1];
            if (! $is_int($match) && 10 === $match[0]) {
              $rest2__9 = $match[1];
              return Vector{10, $trans->contents($d1_, $rest2__9)};
            }
            throw $caml_wrap_thrown_exception(Vector{0, $Assert_failure, $l_}) as \Throwable;
          // FALLTHROUGH
          case 11:
            $d2_ = $ty1[1];
            if ($is_int($match)) {
              $switch__11 = 1 as dynamic;
            }
            else {
              switch($match[0]) {
                // FALLTHROUGH
                case 10:
                  $switch__0 = 0 as dynamic;
                  $switch__11 = 0 as dynamic;
                  break;
                // FALLTHROUGH
                case 11:
                  $rest2__10 = $match[1];
                  return Vector{11, $trans->contents($d2_, $rest2__10)};
                // FALLTHROUGH
                default:
                  $switch__11 = 1 as dynamic;
                }
            }
            if ($switch__11) {
              throw $caml_wrap_thrown_exception(
                      Vector{0, $Assert_failure, $m_}
                    ) as \Throwable;
            }
            break;
          // FALLTHROUGH
          case 12:
            $d3_ = $ty1[1];
            if ($is_int($match)) {
              $switch__12 = 1 as dynamic;
            }
            else {
              switch($match[0]) {
                // FALLTHROUGH
                case 10:
                  $switch__0 = 0 as dynamic;
                  $switch__12 = 0 as dynamic;
                  break;
                // FALLTHROUGH
                case 11:
                  $switch__0 = 1 as dynamic;
                  $switch__12 = 0 as dynamic;
                  break;
                // FALLTHROUGH
                case 12:
                  $rest2__11 = $match[1];
                  return Vector{12, $trans->contents($d3_, $rest2__11)};
                // FALLTHROUGH
                default:
                  $switch__12 = 1 as dynamic;
                }
            }
            if ($switch__12) {
              throw $caml_wrap_thrown_exception(
                      Vector{0, $Assert_failure, $n_}
                    ) as \Throwable;
            }
            break;
          // FALLTHROUGH
          case 13:
            $d4_ = $ty1[1];
            if ($is_int($match)) {
              $switch__13 = 1 as dynamic;
            }
            else {
              switch($match[0]) {
                // FALLTHROUGH
                case 10:
                  $switch__0 = 0 as dynamic;
                  $switch__13 = 0 as dynamic;
                  break;
                // FALLTHROUGH
                case 11:
                  $switch__0 = 1 as dynamic;
                  $switch__13 = 0 as dynamic;
                  break;
                // FALLTHROUGH
                case 12:
                  $switch__0 = 2 as dynamic;
                  $switch__13 = 0 as dynamic;
                  break;
                // FALLTHROUGH
                case 13:
                  $rest2__12 = $match[1];
                  return Vector{13, $trans->contents($d4_, $rest2__12)};
                // FALLTHROUGH
                default:
                  $switch__13 = 1 as dynamic;
                }
            }
            if ($switch__13) {
              throw $caml_wrap_thrown_exception(
                      Vector{0, $Assert_failure, $o_}
                    ) as \Throwable;
            }
            break;
          // FALLTHROUGH
          default:
            $d5_ = $ty1[1];
            if ($is_int($match)) {
              $switch__14 = 1 as dynamic;
            }
            else {
              switch($match[0]) {
                // FALLTHROUGH
                case 10:
                  $switch__0 = 0 as dynamic;
                  $switch__14 = 0 as dynamic;
                  break;
                // FALLTHROUGH
                case 11:
                  $switch__0 = 1 as dynamic;
                  $switch__14 = 0 as dynamic;
                  break;
                // FALLTHROUGH
                case 12:
                  $switch__0 = 2 as dynamic;
                  $switch__14 = 0 as dynamic;
                  break;
                // FALLTHROUGH
                case 13:
                  $switch__0 = 3 as dynamic;
                  $switch__14 = 0 as dynamic;
                  break;
                // FALLTHROUGH
                case 14:
                  $rest2__13 = $match[1];
                  return Vector{14, $trans->contents($d5_, $rest2__13)};
                // FALLTHROUGH
                default:
                  $switch__14 = 1 as dynamic;
                }
            }
            if ($switch__14) {
              throw $caml_wrap_thrown_exception(
                      Vector{0, $Assert_failure, $p_}
                    ) as \Throwable;
            }
          }
      }
      switch($switch__0) {
        // FALLTHROUGH
        case 0:
          throw $caml_wrap_thrown_exception(Vector{0, $Assert_failure, $d_}) as \Throwable;
        // FALLTHROUGH
        case 1:
          throw $caml_wrap_thrown_exception(Vector{0, $Assert_failure, $e_}) as \Throwable;
        // FALLTHROUGH
        case 2:
          throw $caml_wrap_thrown_exception(Vector{0, $Assert_failure, $f_}) as \Throwable;
        // FALLTHROUGH
        case 3:
          throw $caml_wrap_thrown_exception(Vector{0, $Assert_failure, $g_}) as \Throwable;
        // FALLTHROUGH
        case 4:
          throw $caml_wrap_thrown_exception(Vector{0, $Assert_failure, $h_}) as \Throwable;
        // FALLTHROUGH
        case 5:
          throw $caml_wrap_thrown_exception(Vector{0, $Assert_failure, $b_}) as \Throwable;
        // FALLTHROUGH
        case 6:
          throw $caml_wrap_thrown_exception(Vector{0, $Assert_failure, $c_}) as \Throwable;
        // FALLTHROUGH
        default:
          throw $caml_wrap_thrown_exception(Vector{0, $Assert_failure, $i_}) as \Throwable;
        }
    };
    $fmtty_of_padding_fmtty = (dynamic $pad, dynamic $fmtty) : dynamic ==> {
      return $is_int($pad)
        ? $fmtty
        : (0 === $pad[0] ? $fmtty : (Vector{2, $fmtty}));
    };
    $fmtty_of_custom->contents = (dynamic $arity, dynamic $fmtty) : dynamic ==> {
      $arity__0 = null as dynamic;
      if ($arity) {
        $arity__0 = $arity[1];
        return Vector{12, $fmtty_of_custom->contents($arity__0, $fmtty)};
      }
      return $fmtty;
    };
    $fmtty_of_fmt__0 = (dynamic $counter, dynamic $fmtty) : dynamic ==> {
      $arity = null as dynamic;
      $counter__0 = null as dynamic;
      $dL_ = null as dynamic;
      $dM_ = null as dynamic;
      $fmting_gen = null as dynamic;
      $fmtty__1 = null as dynamic;
      $fmtty__2 = null as dynamic;
      $fmtty__3 = null as dynamic;
      $fmtty__4 = null as dynamic;
      $ign = null as dynamic;
      $pad = null as dynamic;
      $pad__0 = null as dynamic;
      $pad__1 = null as dynamic;
      $pad__2 = null as dynamic;
      $pad__3 = null as dynamic;
      $pad__4 = null as dynamic;
      $pad__5 = null as dynamic;
      $pad__6 = null as dynamic;
      $prec = null as dynamic;
      $prec__0 = null as dynamic;
      $prec__1 = null as dynamic;
      $prec__2 = null as dynamic;
      $prec__3 = null as dynamic;
      $prec_ty = null as dynamic;
      $prec_ty__0 = null as dynamic;
      $prec_ty__1 = null as dynamic;
      $prec_ty__2 = null as dynamic;
      $prec_ty__3 = null as dynamic;
      $rest = null as dynamic;
      $rest__0 = null as dynamic;
      $rest__1 = null as dynamic;
      $rest__10 = null as dynamic;
      $rest__11 = null as dynamic;
      $rest__12 = null as dynamic;
      $rest__13 = null as dynamic;
      $rest__14 = null as dynamic;
      $rest__15 = null as dynamic;
      $rest__16 = null as dynamic;
      $rest__17 = null as dynamic;
      $rest__18 = null as dynamic;
      $rest__19 = null as dynamic;
      $rest__2 = null as dynamic;
      $rest__3 = null as dynamic;
      $rest__4 = null as dynamic;
      $rest__5 = null as dynamic;
      $rest__6 = null as dynamic;
      $rest__7 = null as dynamic;
      $rest__8 = null as dynamic;
      $rest__9 = null as dynamic;
      $ty = null as dynamic;
      $ty__0 = null as dynamic;
      $ty_rest = null as dynamic;
      $ty_rest__0 = null as dynamic;
      $ty_rest__1 = null as dynamic;
      $ty_rest__2 = null as dynamic;
      $ty_rest__3 = null as dynamic;
      $fmtty__0 = $fmtty;
      for (;;) {
        if ($is_int($fmtty__0)) {return 0;}
        else {
          $continue_label = null;
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
              $continue_label = "#";break;
            // FALLTHROUGH
            case 11:
              $fmtty__2 = $fmtty__0[2];
              $fmtty__0 = $fmtty__2;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 12:
              $fmtty__3 = $fmtty__0[2];
              $fmtty__0 = $fmtty__3;
              $continue_label = "#";break;
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
              $continue_label = "#";break;
            // FALLTHROUGH
            case 18:
              $rest__13 = $fmtty__0[2];
              $fmting_gen = $fmtty__0[1];
              $dL_ = $fmtty_of_fmt->contents($rest__13);
              $dM_ = $fmtty_of_formatting_gen->contents($fmting_gen);
              return $call2($CamlinternalFormatBasics[1], $dM_, $dL_);
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
                $counter__0 = (int) ($counter + 1) as dynamic;
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
          if ($continue_label === "#") {continue;}
        }
      }
    };
    $fmtty_of_ignored_format->contents = 
    (dynamic $counter, dynamic $ign, dynamic $fmt) : dynamic ==> {
      $counter__0 = null as dynamic;
      $counter__1 = null as dynamic;
      $counter__10 = null as dynamic;
      $counter__11 = null as dynamic;
      $counter__12 = null as dynamic;
      $counter__13 = null as dynamic;
      $counter__2 = null as dynamic;
      $counter__3 = null as dynamic;
      $counter__4 = null as dynamic;
      $counter__5 = null as dynamic;
      $counter__6 = null as dynamic;
      $counter__7 = null as dynamic;
      $counter__8 = null as dynamic;
      $counter__9 = null as dynamic;
      $dK_ = null as dynamic;
      $fmtty = null as dynamic;
      if ($is_int($ign)) {
        switch($ign) {
          // FALLTHROUGH
          case 0:
            if ($counter < 50) {
              $counter__0 = (int) ($counter + 1) as dynamic;
              return $fmtty_of_fmt__0($counter__0, $fmt);
            }
            return $caml_trampoline_return($fmtty_of_fmt__0, varray[0,$fmt]);
          // FALLTHROUGH
          case 1:
            if ($counter < 50) {
              $counter__1 = (int) ($counter + 1) as dynamic;
              return $fmtty_of_fmt__0($counter__1, $fmt);
            }
            return $caml_trampoline_return($fmtty_of_fmt__0, varray[0,$fmt]);
          // FALLTHROUGH
          case 2:
            return Vector{14, $fmtty_of_fmt->contents($fmt)};
          // FALLTHROUGH
          default:
            if ($counter < 50) {
              $counter__2 = (int) ($counter + 1) as dynamic;
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
              $counter__3 = (int) ($counter + 1) as dynamic;
              return $fmtty_of_fmt__0($counter__3, $fmt);
            }
            return $caml_trampoline_return($fmtty_of_fmt__0, varray[0,$fmt]);
          // FALLTHROUGH
          case 1:
            if ($counter < 50) {
              $counter__4 = (int) ($counter + 1) as dynamic;
              return $fmtty_of_fmt__0($counter__4, $fmt);
            }
            return $caml_trampoline_return($fmtty_of_fmt__0, varray[0,$fmt]);
          // FALLTHROUGH
          case 2:
            if ($counter < 50) {
              $counter__5 = (int) ($counter + 1) as dynamic;
              return $fmtty_of_fmt__0($counter__5, $fmt);
            }
            return $caml_trampoline_return($fmtty_of_fmt__0, varray[0,$fmt]);
          // FALLTHROUGH
          case 3:
            if ($counter < 50) {
              $counter__6 = (int) ($counter + 1) as dynamic;
              return $fmtty_of_fmt__0($counter__6, $fmt);
            }
            return $caml_trampoline_return($fmtty_of_fmt__0, varray[0,$fmt]);
          // FALLTHROUGH
          case 4:
            if ($counter < 50) {
              $counter__7 = (int) ($counter + 1) as dynamic;
              return $fmtty_of_fmt__0($counter__7, $fmt);
            }
            return $caml_trampoline_return($fmtty_of_fmt__0, varray[0,$fmt]);
          // FALLTHROUGH
          case 5:
            if ($counter < 50) {
              $counter__8 = (int) ($counter + 1) as dynamic;
              return $fmtty_of_fmt__0($counter__8, $fmt);
            }
            return $caml_trampoline_return($fmtty_of_fmt__0, varray[0,$fmt]);
          // FALLTHROUGH
          case 6:
            if ($counter < 50) {
              $counter__9 = (int) ($counter + 1) as dynamic;
              return $fmtty_of_fmt__0($counter__9, $fmt);
            }
            return $caml_trampoline_return($fmtty_of_fmt__0, varray[0,$fmt]);
          // FALLTHROUGH
          case 7:
            if ($counter < 50) {
              $counter__10 = (int) ($counter + 1) as dynamic;
              return $fmtty_of_fmt__0($counter__10, $fmt);
            }
            return $caml_trampoline_return($fmtty_of_fmt__0, varray[0,$fmt]);
          // FALLTHROUGH
          case 8:
            if ($counter < 50) {
              $counter__11 = (int) ($counter + 1) as dynamic;
              return $fmtty_of_fmt__0($counter__11, $fmt);
            }
            return $caml_trampoline_return($fmtty_of_fmt__0, varray[0,$fmt]);
          // FALLTHROUGH
          case 9:
            $fmtty = $ign[2];
            $dK_ = $fmtty_of_fmt->contents($fmt);
            return $call2($CamlinternalFormatBasics[1], $fmtty, $dK_);
          // FALLTHROUGH
          case 10:
            if ($counter < 50) {
              $counter__12 = (int) ($counter + 1) as dynamic;
              return $fmtty_of_fmt__0($counter__12, $fmt);
            }
            return $caml_trampoline_return($fmtty_of_fmt__0, varray[0,$fmt]);
          // FALLTHROUGH
          default:
            if ($counter < 50) {
              $counter__13 = (int) ($counter + 1) as dynamic;
              return $fmtty_of_fmt__0($counter__13, $fmt);
            }
            return $caml_trampoline_return($fmtty_of_fmt__0, varray[0,$fmt]);
          }
      }
    };
    $fmtty_of_fmt->contents = (dynamic $fmtty) : dynamic ==> {
      return $caml_trampoline($fmtty_of_fmt__0(0, $fmtty));
    };
    $fmtty_of_formatting_gen->contents = (dynamic $formatting_gen) : dynamic ==> {
      $fmt = null as dynamic;
      $match = null as dynamic;
      if (0 === $formatting_gen[0]) {
        $match = $formatting_gen[1];
        $fmt = $match[1];
        return $fmtty_of_fmt->contents($fmt);
      }
      $match__0 = $formatting_gen[1];
      $fmt__0 = $match__0[1];
      return $fmtty_of_fmt->contents($fmt__0);
    };
    $fmtty_of_precision_fmtty->contents = (dynamic $prec, dynamic $fmtty) : dynamic ==> {
      return $is_int($prec)
        ? 0 === $prec ? $fmtty : (Vector{2, $fmtty})
        : ($fmtty);
    };
    $Type_mismatch = Vector{
      248,
      $cst_CamlinternalFormat_Type_mismatch,
      $runtime["caml_fresh_oo_id"](0)
    } as dynamic;
    $type_padding = (dynamic $pad, dynamic $match) : dynamic ==> {
      $padty = null as dynamic;
      $padty__0 = null as dynamic;
      $rest = null as dynamic;
      $w = null as dynamic;
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
        throw $caml_wrap_thrown_exception($Type_mismatch) as \Throwable;
      }
    };
    $type_padprec = (dynamic $pad, dynamic $prec, dynamic $fmtty) : dynamic ==> {
      $dJ_ = null as dynamic;
      $pad__0 = null as dynamic;
      $pad__1 = null as dynamic;
      $rest = null as dynamic;
      $rest__0 = null as dynamic;
      $match = $type_padding($pad, $fmtty);
      if ($is_int($prec)) {
        if (0 === $prec) {
          $rest = $match[2];
          $pad__0 = $match[1];
          return Vector{0, $pad__0, 0, $rest};
        }
        $dJ_ = $match[2];
        if (! $is_int($dJ_) && 2 === $dJ_[0]) {
          $rest__0 = $dJ_[1];
          $pad__1 = $match[1];
          return Vector{0, $pad__1, 1, $rest__0};
        }
        throw $caml_wrap_thrown_exception($Type_mismatch) as \Throwable;
      }
      $rest__1 = $match[2];
      $pad__2 = $match[1];
      $p = $prec[1];
      return Vector{0, $pad__2, Vector{0, $p}, $rest__1};
    };
    $type_format = (dynamic $fmt, dynamic $fmtty) : dynamic ==> {
      $fmt__0 = null as dynamic;
      $dI_ = $type_format_gen->contents($fmt, $fmtty);
      if ($is_int($dI_[2])) {$fmt__0 = $dI_[1];return $fmt__0;}
      throw $caml_wrap_thrown_exception($Type_mismatch) as \Throwable;
    };
    $type_ignored_param_one = (dynamic $ign, dynamic $fmt, dynamic $fmtty) : dynamic ==> {
      $match = $type_format_gen->contents($fmt, $fmtty);
      $fmtty__0 = $match[2];
      $fmt__0 = $match[1];
      return Vector{0, Vector{23, $ign, $fmt__0}, $fmtty__0};
    };
    $type_ignored_param = (dynamic $ign, dynamic $fmt, dynamic $fmtty) : dynamic ==> {
      $dH_ = null as dynamic;
      $fmt__0 = null as dynamic;
      $fmt__1 = null as dynamic;
      $fmtty__0 = null as dynamic;
      $fmtty__1 = null as dynamic;
      $fmtty_rest = null as dynamic;
      $match = null as dynamic;
      $match__0 = null as dynamic;
      $pad_opt = null as dynamic;
      $pad_opt__0 = null as dynamic;
      $sub_fmtty = null as dynamic;
      $sub_fmtty__0 = null as dynamic;
      $sub_fmtty__1 = null as dynamic;
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
            throw $caml_wrap_thrown_exception($Type_mismatch) as \Throwable;
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
            $dH_ = $type_ignored_format_substitution->contents(
              $sub_fmtty__0,
              $fmt,
              $fmtty
            );
            $match__0 = $dH_[2];
            $fmtty__1 = $match__0[2];
            $fmt__1 = $match__0[1];
            $sub_fmtty__1 = $dH_[1];
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
    $type_formatting_gen = 
    (dynamic $formatting_gen, dynamic $fmt0, dynamic $fmtty0) : dynamic ==> {
      $fmt1 = null as dynamic;
      $fmt2 = null as dynamic;
      $fmt3 = null as dynamic;
      $fmtty2 = null as dynamic;
      $fmtty3 = null as dynamic;
      $match = null as dynamic;
      $match__0 = null as dynamic;
      $match__1 = null as dynamic;
      $str = null as dynamic;
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
    $type_format_gen->contents = (dynamic $fmt, dynamic $match) : dynamic ==> {
      $char_set = null as dynamic;
      $chr = null as dynamic;
      $counter = null as dynamic;
      $dA_ = null as dynamic;
      $dB_ = null as dynamic;
      $dC_ = null as dynamic;
      $dD_ = null as dynamic;
      $dE_ = null as dynamic;
      $dF_ = null as dynamic;
      $dG_ = null as dynamic;
      $dd_ = null as dynamic;
      $de_ = null as dynamic;
      $df_ = null as dynamic;
      $dg_ = null as dynamic;
      $dh_ = null as dynamic;
      $di_ = null as dynamic;
      $dj_ = null as dynamic;
      $dk_ = null as dynamic;
      $dl_ = null as dynamic;
      $dm_ = null as dynamic;
      $dn_ = null as dynamic;
      $do_ = null as dynamic;
      $dp_ = null as dynamic;
      $dq_ = null as dynamic;
      $dr_ = null as dynamic;
      $ds_ = null as dynamic;
      $dt_ = null as dynamic;
      $du_ = null as dynamic;
      $dv_ = null as dynamic;
      $dw_ = null as dynamic;
      $dx_ = null as dynamic;
      $dy_ = null as dynamic;
      $dz_ = null as dynamic;
      $fconv = null as dynamic;
      $fmt__0 = null as dynamic;
      $fmt__1 = null as dynamic;
      $fmt__10 = null as dynamic;
      $fmt__11 = null as dynamic;
      $fmt__12 = null as dynamic;
      $fmt__13 = null as dynamic;
      $fmt__14 = null as dynamic;
      $fmt__15 = null as dynamic;
      $fmt__16 = null as dynamic;
      $fmt__17 = null as dynamic;
      $fmt__18 = null as dynamic;
      $fmt__19 = null as dynamic;
      $fmt__2 = null as dynamic;
      $fmt__20 = null as dynamic;
      $fmt__3 = null as dynamic;
      $fmt__4 = null as dynamic;
      $fmt__5 = null as dynamic;
      $fmt__6 = null as dynamic;
      $fmt__7 = null as dynamic;
      $fmt__8 = null as dynamic;
      $fmt__9 = null as dynamic;
      $fmt_rest = null as dynamic;
      $fmt_rest__0 = null as dynamic;
      $fmt_rest__1 = null as dynamic;
      $fmt_rest__10 = null as dynamic;
      $fmt_rest__11 = null as dynamic;
      $fmt_rest__12 = null as dynamic;
      $fmt_rest__13 = null as dynamic;
      $fmt_rest__14 = null as dynamic;
      $fmt_rest__15 = null as dynamic;
      $fmt_rest__16 = null as dynamic;
      $fmt_rest__17 = null as dynamic;
      $fmt_rest__18 = null as dynamic;
      $fmt_rest__19 = null as dynamic;
      $fmt_rest__2 = null as dynamic;
      $fmt_rest__20 = null as dynamic;
      $fmt_rest__3 = null as dynamic;
      $fmt_rest__4 = null as dynamic;
      $fmt_rest__5 = null as dynamic;
      $fmt_rest__6 = null as dynamic;
      $fmt_rest__7 = null as dynamic;
      $fmt_rest__8 = null as dynamic;
      $fmt_rest__9 = null as dynamic;
      $fmtty = null as dynamic;
      $fmtty__0 = null as dynamic;
      $fmtty__1 = null as dynamic;
      $fmtty__10 = null as dynamic;
      $fmtty__11 = null as dynamic;
      $fmtty__12 = null as dynamic;
      $fmtty__13 = null as dynamic;
      $fmtty__14 = null as dynamic;
      $fmtty__15 = null as dynamic;
      $fmtty__16 = null as dynamic;
      $fmtty__17 = null as dynamic;
      $fmtty__18 = null as dynamic;
      $fmtty__19 = null as dynamic;
      $fmtty__2 = null as dynamic;
      $fmtty__3 = null as dynamic;
      $fmtty__4 = null as dynamic;
      $fmtty__5 = null as dynamic;
      $fmtty__6 = null as dynamic;
      $fmtty__7 = null as dynamic;
      $fmtty__8 = null as dynamic;
      $fmtty__9 = null as dynamic;
      $fmtty_rest = null as dynamic;
      $fmtty_rest__0 = null as dynamic;
      $fmtty_rest__1 = null as dynamic;
      $fmtty_rest__10 = null as dynamic;
      $fmtty_rest__11 = null as dynamic;
      $fmtty_rest__12 = null as dynamic;
      $fmtty_rest__13 = null as dynamic;
      $fmtty_rest__14 = null as dynamic;
      $fmtty_rest__15 = null as dynamic;
      $fmtty_rest__2 = null as dynamic;
      $fmtty_rest__3 = null as dynamic;
      $fmtty_rest__4 = null as dynamic;
      $fmtty_rest__5 = null as dynamic;
      $fmtty_rest__6 = null as dynamic;
      $fmtty_rest__7 = null as dynamic;
      $fmtty_rest__8 = null as dynamic;
      $fmtty_rest__9 = null as dynamic;
      $formatting_gen = null as dynamic;
      $formatting_lit = null as dynamic;
      $iconv = null as dynamic;
      $iconv__0 = null as dynamic;
      $iconv__1 = null as dynamic;
      $iconv__2 = null as dynamic;
      $ign = null as dynamic;
      $match__0 = null as dynamic;
      $match__1 = null as dynamic;
      $match__10 = null as dynamic;
      $match__11 = null as dynamic;
      $match__12 = null as dynamic;
      $match__13 = null as dynamic;
      $match__14 = null as dynamic;
      $match__15 = null as dynamic;
      $match__16 = null as dynamic;
      $match__17 = null as dynamic;
      $match__18 = null as dynamic;
      $match__19 = null as dynamic;
      $match__2 = null as dynamic;
      $match__20 = null as dynamic;
      $match__3 = null as dynamic;
      $match__4 = null as dynamic;
      $match__5 = null as dynamic;
      $match__6 = null as dynamic;
      $match__7 = null as dynamic;
      $match__8 = null as dynamic;
      $match__9 = null as dynamic;
      $pad = null as dynamic;
      $pad__0 = null as dynamic;
      $pad__1 = null as dynamic;
      $pad__2 = null as dynamic;
      $pad__3 = null as dynamic;
      $pad__4 = null as dynamic;
      $pad__5 = null as dynamic;
      $pad__6 = null as dynamic;
      $pad_opt = null as dynamic;
      $pad_opt__0 = null as dynamic;
      $prec = null as dynamic;
      $prec__0 = null as dynamic;
      $prec__1 = null as dynamic;
      $prec__2 = null as dynamic;
      $prec__3 = null as dynamic;
      $rest = null as dynamic;
      $str = null as dynamic;
      $sub_fmtty = null as dynamic;
      $sub_fmtty1 = null as dynamic;
      $sub_fmtty__0 = null as dynamic;
      $sub_fmtty__1 = null as dynamic;
      $width_opt = null as dynamic;
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
            $dd_ = $type_padding($pad, $match);
            $de_ = $dd_[2];
            $df_ = $dd_[1];
            if (! $is_int($de_) && 1 === $de_[0]) {
              $fmtty_rest__1 = $de_[1];
              $match__2 = $type_format_gen->contents(
                $fmt_rest__1,
                $fmtty_rest__1
              );
              $fmtty__1 = $match__2[2];
              $fmt__2 = $match__2[1];
              return Vector{0, Vector{2, $df_, $fmt__2}, $fmtty__1};
            }
            throw $caml_wrap_thrown_exception($Type_mismatch) as \Throwable;
          // FALLTHROUGH
          case 3:
            $fmt_rest__2 = $fmt[2];
            $pad__0 = $fmt[1];
            $dg_ = $type_padding($pad__0, $match);
            $dh_ = $dg_[2];
            $di_ = $dg_[1];
            if (! $is_int($dh_) && 1 === $dh_[0]) {
              $fmtty_rest__2 = $dh_[1];
              $match__3 = $type_format_gen->contents(
                $fmt_rest__2,
                $fmtty_rest__2
              );
              $fmtty__2 = $match__3[2];
              $fmt__3 = $match__3[1];
              return Vector{0, Vector{3, $di_, $fmt__3}, $fmtty__2};
            }
            throw $caml_wrap_thrown_exception($Type_mismatch) as \Throwable;
          // FALLTHROUGH
          case 4:
            $fmt_rest__3 = $fmt[4];
            $prec = $fmt[3];
            $pad__1 = $fmt[2];
            $iconv = $fmt[1];
            $dj_ = $type_padprec($pad__1, $prec, $match);
            $dk_ = $dj_[3];
            $dl_ = $dj_[2];
            $dm_ = $dj_[1];
            if (! $is_int($dk_) && 2 === $dk_[0]) {
              $fmtty_rest__3 = $dk_[1];
              $match__4 = $type_format_gen->contents(
                $fmt_rest__3,
                $fmtty_rest__3
              );
              $fmtty__3 = $match__4[2];
              $fmt__4 = $match__4[1];
              return Vector{
                0,
                Vector{4, $iconv, $dm_, $dl_, $fmt__4},
                $fmtty__3
              };
            }
            throw $caml_wrap_thrown_exception($Type_mismatch) as \Throwable;
          // FALLTHROUGH
          case 5:
            $fmt_rest__4 = $fmt[4];
            $prec__0 = $fmt[3];
            $pad__2 = $fmt[2];
            $iconv__0 = $fmt[1];
            $dn_ = $type_padprec($pad__2, $prec__0, $match);
            $do_ = $dn_[3];
            $dp_ = $dn_[2];
            $dq_ = $dn_[1];
            if (! $is_int($do_) && 3 === $do_[0]) {
              $fmtty_rest__4 = $do_[1];
              $match__5 = $type_format_gen->contents(
                $fmt_rest__4,
                $fmtty_rest__4
              );
              $fmtty__4 = $match__5[2];
              $fmt__5 = $match__5[1];
              return Vector{
                0,
                Vector{5, $iconv__0, $dq_, $dp_, $fmt__5},
                $fmtty__4
              };
            }
            throw $caml_wrap_thrown_exception($Type_mismatch) as \Throwable;
          // FALLTHROUGH
          case 6:
            $fmt_rest__5 = $fmt[4];
            $prec__1 = $fmt[3];
            $pad__3 = $fmt[2];
            $iconv__1 = $fmt[1];
            $dr_ = $type_padprec($pad__3, $prec__1, $match);
            $ds_ = $dr_[3];
            $dt_ = $dr_[2];
            $du_ = $dr_[1];
            if (! $is_int($ds_) && 4 === $ds_[0]) {
              $fmtty_rest__5 = $ds_[1];
              $match__6 = $type_format_gen->contents(
                $fmt_rest__5,
                $fmtty_rest__5
              );
              $fmtty__5 = $match__6[2];
              $fmt__6 = $match__6[1];
              return Vector{
                0,
                Vector{6, $iconv__1, $du_, $dt_, $fmt__6},
                $fmtty__5
              };
            }
            throw $caml_wrap_thrown_exception($Type_mismatch) as \Throwable;
          // FALLTHROUGH
          case 7:
            $fmt_rest__6 = $fmt[4];
            $prec__2 = $fmt[3];
            $pad__4 = $fmt[2];
            $iconv__2 = $fmt[1];
            $dv_ = $type_padprec($pad__4, $prec__2, $match);
            $dw_ = $dv_[3];
            $dx_ = $dv_[2];
            $dy_ = $dv_[1];
            if (! $is_int($dw_) && 5 === $dw_[0]) {
              $fmtty_rest__6 = $dw_[1];
              $match__7 = $type_format_gen->contents(
                $fmt_rest__6,
                $fmtty_rest__6
              );
              $fmtty__6 = $match__7[2];
              $fmt__7 = $match__7[1];
              return Vector{
                0,
                Vector{7, $iconv__2, $dy_, $dx_, $fmt__7},
                $fmtty__6
              };
            }
            throw $caml_wrap_thrown_exception($Type_mismatch) as \Throwable;
          // FALLTHROUGH
          case 8:
            $fmt_rest__7 = $fmt[4];
            $prec__3 = $fmt[3];
            $pad__5 = $fmt[2];
            $fconv = $fmt[1];
            $dz_ = $type_padprec($pad__5, $prec__3, $match);
            $dA_ = $dz_[3];
            $dB_ = $dz_[2];
            $dC_ = $dz_[1];
            if (! $is_int($dA_) && 6 === $dA_[0]) {
              $fmtty_rest__7 = $dA_[1];
              $match__8 = $type_format_gen->contents(
                $fmt_rest__7,
                $fmtty_rest__7
              );
              $fmtty__7 = $match__8[2];
              $fmt__8 = $match__8[1];
              return Vector{
                0,
                Vector{8, $fconv, $dC_, $dB_, $fmt__8},
                $fmtty__7
              };
            }
            throw $caml_wrap_thrown_exception($Type_mismatch) as \Throwable;
          // FALLTHROUGH
          case 9:
            $fmt_rest__8 = $fmt[2];
            $pad__6 = $fmt[1];
            $dD_ = $type_padding($pad__6, $match);
            $dE_ = $dD_[2];
            $dF_ = $dD_[1];
            if (! $is_int($dE_) && 7 === $dE_[0]) {
              $fmtty_rest__8 = $dE_[1];
              $match__9 = $type_format_gen->contents(
                $fmt_rest__8,
                $fmtty_rest__8
              );
              $fmtty__8 = $match__9[2];
              $fmt__9 = $match__9[1];
              return Vector{0, Vector{9, $dF_, $fmt__9}, $fmtty__8};
            }
            throw $caml_wrap_thrown_exception($Type_mismatch) as \Throwable;
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
                throw $caml_wrap_thrown_exception($Type_mismatch) as \Throwable;
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
              $dG_ = Vector{
                0,
                $call1($CamlinternalFormatBasics[2], $sub_fmtty1)
              } as dynamic;
              if (
                $caml_notequal(
                  Vector{
                    0,
                    $call1($CamlinternalFormatBasics[2], $sub_fmtty__1)
                  },
                  $dG_
                )
              ) {
                throw $caml_wrap_thrown_exception($Type_mismatch) as \Throwable;
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
          // FALLTHROUGH
          default:break;
          }
      }
      throw $caml_wrap_thrown_exception($Type_mismatch) as \Throwable;
    };
    $type_ignored_format_substitution->contents = 
    (dynamic $sub_fmtty, dynamic $fmt, dynamic $match) : dynamic ==> {
      $db_ = null as dynamic;
      $dc_ = null as dynamic;
      $f2 = null as dynamic;
      $f4 = null as dynamic;
      $fmt__0 = null as dynamic;
      $fmt__1 = null as dynamic;
      $fmt__10 = null as dynamic;
      $fmt__11 = null as dynamic;
      $fmt__12 = null as dynamic;
      $fmt__13 = null as dynamic;
      $fmt__2 = null as dynamic;
      $fmt__3 = null as dynamic;
      $fmt__4 = null as dynamic;
      $fmt__5 = null as dynamic;
      $fmt__6 = null as dynamic;
      $fmt__7 = null as dynamic;
      $fmt__8 = null as dynamic;
      $fmt__9 = null as dynamic;
      $fmtty_rest = null as dynamic;
      $fmtty_rest__0 = null as dynamic;
      $fmtty_rest__1 = null as dynamic;
      $fmtty_rest__10 = null as dynamic;
      $fmtty_rest__11 = null as dynamic;
      $fmtty_rest__12 = null as dynamic;
      $fmtty_rest__2 = null as dynamic;
      $fmtty_rest__3 = null as dynamic;
      $fmtty_rest__4 = null as dynamic;
      $fmtty_rest__5 = null as dynamic;
      $fmtty_rest__6 = null as dynamic;
      $fmtty_rest__7 = null as dynamic;
      $fmtty_rest__8 = null as dynamic;
      $fmtty_rest__9 = null as dynamic;
      $match__0 = null as dynamic;
      $match__1 = null as dynamic;
      $match__10 = null as dynamic;
      $match__11 = null as dynamic;
      $match__12 = null as dynamic;
      $match__13 = null as dynamic;
      $match__14 = null as dynamic;
      $match__2 = null as dynamic;
      $match__3 = null as dynamic;
      $match__4 = null as dynamic;
      $match__5 = null as dynamic;
      $match__6 = null as dynamic;
      $match__7 = null as dynamic;
      $match__8 = null as dynamic;
      $match__9 = null as dynamic;
      $sub1_fmtty = null as dynamic;
      $sub1_fmtty__0 = null as dynamic;
      $sub2_fmtty = null as dynamic;
      $sub2_fmtty__0 = null as dynamic;
      $sub2_fmtty__1 = null as dynamic;
      $sub2_fmtty__2 = null as dynamic;
      $sub_fmtty__0 = null as dynamic;
      $sub_fmtty_rest = null as dynamic;
      $sub_fmtty_rest__0 = null as dynamic;
      $sub_fmtty_rest__1 = null as dynamic;
      $sub_fmtty_rest__10 = null as dynamic;
      $sub_fmtty_rest__11 = null as dynamic;
      $sub_fmtty_rest__12 = null as dynamic;
      $sub_fmtty_rest__13 = null as dynamic;
      $sub_fmtty_rest__14 = null as dynamic;
      $sub_fmtty_rest__15 = null as dynamic;
      $sub_fmtty_rest__16 = null as dynamic;
      $sub_fmtty_rest__17 = null as dynamic;
      $sub_fmtty_rest__18 = null as dynamic;
      $sub_fmtty_rest__19 = null as dynamic;
      $sub_fmtty_rest__2 = null as dynamic;
      $sub_fmtty_rest__20 = null as dynamic;
      $sub_fmtty_rest__21 = null as dynamic;
      $sub_fmtty_rest__22 = null as dynamic;
      $sub_fmtty_rest__23 = null as dynamic;
      $sub_fmtty_rest__24 = null as dynamic;
      $sub_fmtty_rest__25 = null as dynamic;
      $sub_fmtty_rest__26 = null as dynamic;
      $sub_fmtty_rest__3 = null as dynamic;
      $sub_fmtty_rest__4 = null as dynamic;
      $sub_fmtty_rest__5 = null as dynamic;
      $sub_fmtty_rest__6 = null as dynamic;
      $sub_fmtty_rest__7 = null as dynamic;
      $sub_fmtty_rest__8 = null as dynamic;
      $sub_fmtty_rest__9 = null as dynamic;
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
                throw $caml_wrap_thrown_exception($Type_mismatch) as \Throwable;
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
              $db_ = Vector{
                0,
                $call1($CamlinternalFormatBasics[2], $sub1_fmtty)
              } as dynamic;
              if (
                $caml_notequal(
                  Vector{
                    0,
                    $call1($CamlinternalFormatBasics[2], $sub1_fmtty__0)
                  },
                  $db_
                )
              ) {
                throw $caml_wrap_thrown_exception($Type_mismatch) as \Throwable;
              }
              $dc_ = Vector{
                0,
                $call1($CamlinternalFormatBasics[2], $sub2_fmtty__1)
              } as dynamic;
              if (
                $caml_notequal(
                  Vector{
                    0,
                    $call1($CamlinternalFormatBasics[2], $sub2_fmtty__2)
                  },
                  $dc_
                )
              ) {
                throw $caml_wrap_thrown_exception($Type_mismatch) as \Throwable;
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
          // FALLTHROUGH
          default:break;
          }
      }
      throw $caml_wrap_thrown_exception($Type_mismatch) as \Throwable;
    };
    $recast = (dynamic $fmt, dynamic $fmtty) : dynamic ==> {
      $da_ = $symm->contents($fmtty);
      return $type_format($fmt, $call1($CamlinternalFormatBasics[2], $da_));
    };
    $fix_padding = (dynamic $padty, dynamic $width, dynamic $str) : dynamic ==> {
      $switch__0 = null as dynamic;
      $switch__1 = null as dynamic;
      $switch__2 = null as dynamic;
      $switch__3 = null as dynamic;
      $len = $caml_ml_string_length($str);
      $padty__0 = 0 <= $width ? $padty : (0);
      $width__0 = $call1($Stdlib[18], $width);
      if ($width__0 <= $len) {return $str;}
      $c__ = 2 === $padty__0 ? 48 : (32);
      $res = $call2($Stdlib_bytes[1], $width__0, $c__);
      switch($padty__0) {
        // FALLTHROUGH
        case 0:
          $call5($Stdlib_string[6], $str, 0, $res, 0, $len);
          break;
        // FALLTHROUGH
        case 1:
          $call5(
            $Stdlib_string[6],
            $str,
            0,
            $res,
            (int)
            ($width__0 - $len),
            $len
          );
          break;
        // FALLTHROUGH
        default:
          if (0 < $len) {
            if (43 === $caml_string_get($str, 0)) {$switch__1 = 1 as dynamic;}
            else {
              if (45 === $caml_string_get($str, 0)) {$switch__1 = 1 as dynamic;}
              else {
                if (32 === $caml_string_get($str, 0)) {$switch__1 = 1 as dynamic;}
                else {$switch__0 = 0 as dynamic;$switch__1 = 0 as dynamic;}
              }
            }
            if ($switch__1) {
              $caml_bytes_set($res, 0, $caml_string_get($str, 0));
              $call5(
                $Stdlib_string[6],
                $str,
                1,
                $res,
                (int)
                ((int) ($width__0 - $len) + 1),
                (int)
                ($len + -1)
              );
              $switch__0 = 1 as dynamic;
            }
          }
          else {$switch__0 = 0 as dynamic;}
          if (! $switch__0) {
            if (1 < $len) {
              if (48 === $caml_string_get($str, 0)) {
                if (120 === $caml_string_get($str, 1)) {$switch__3 = 1 as dynamic;}
                else {
                  if (88 === $caml_string_get($str, 1)) {$switch__3 = 1 as dynamic;}
                  else {$switch__2 = 0 as dynamic;$switch__3 = 0 as dynamic;}
                }
                if ($switch__3) {
                  $caml_bytes_set($res, 1, $caml_string_get($str, 1));
                  $call5(
                    $Stdlib_string[6],
                    $str,
                    2,
                    $res,
                    (int)
                    ((int) ($width__0 - $len) + 2),
                    (int)
                    ($len + -2)
                  );
                  $switch__2 = 1 as dynamic;
                }
              }
              else {$switch__2 = 0 as dynamic;}
            }
            else {$switch__2 = 0 as dynamic;}
            if (! $switch__2) {
              $call5(
                $Stdlib_string[6],
                $str,
                0,
                $res,
                (int)
                ($width__0 - $len),
                $len
              );
            }
          }
        }
      return $call1($Stdlib_bytes[42], $res);
    };
    $fix_int_precision = (dynamic $prec, dynamic $str) : dynamic ==> {
      $res = null as dynamic;
      $res__0 = null as dynamic;
      $res__1 = null as dynamic;
      $switch__0 = null as dynamic;
      $switch__1 = null as dynamic;
      $switch__2 = null as dynamic;
      $switcher = null as dynamic;
      $prec__0 = $call1($Stdlib[18], $prec);
      $len = $caml_ml_string_length($str);
      $c = $caml_string_get($str, 0);
      if (58 <= $c) {
        $switch__0 = 71 <= $c
          ? 5 < $unsigned_right_shift_32((int) ($c + -97), 0) ? 1 : (0)
          : (65 <= $c ? 0 : (1));
      }
      else {
        if (32 === $c) {
          $switch__1 = 1 as dynamic;
        }
        else {
          if (43 <= $c) {
            $switcher = (int) ($c + -43) as dynamic;
            switch($switcher) {
              // FALLTHROUGH
              case 5:
                if ($len < (int) ($prec__0 + 2)) {
                  if (1 < $len) {
                    $switch__2 = 120 === $caml_string_get($str, 1)
                      ? 0
                      : (88 === $caml_string_get($str, 1) ? 0 : (1));
                    if (! $switch__2) {
                      $res__1 = $call2($Stdlib_bytes[1], (int) ($prec__0 + 2), 48);
                      $caml_bytes_set($res__1, 1, $caml_string_get($str, 1));
                      $call5(
                        $Stdlib_string[6],
                        $str,
                        2,
                        $res__1,
                        (int)
                        ((int) ($prec__0 - $len) + 4),
                        (int)
                        ($len + -2)
                      );
                      return $call1($Stdlib_bytes[42], $res__1);
                    }
                  }
                }
                $switch__0 = 0 as dynamic;
                $switch__1 = 0 as dynamic;
                break;
              // FALLTHROUGH
              case 0:
              // FALLTHROUGH
              case 2:
                $switch__1 = 1 as dynamic;
                break;
              // FALLTHROUGH
              case 1:
              // FALLTHROUGH
              case 3:
              // FALLTHROUGH
              case 4:
                $switch__0 = 1 as dynamic;
                $switch__1 = 0 as dynamic;
                break;
              // FALLTHROUGH
              default:
                $switch__0 = 0 as dynamic;
                $switch__1 = 0 as dynamic;
              }
          }
          else {$switch__0 = 1 as dynamic;$switch__1 = 0 as dynamic;}
        }
        if ($switch__1) {
          if ($len < (int) ($prec__0 + 1)) {
            $res__0 = $call2($Stdlib_bytes[1], (int) ($prec__0 + 1), 48);
            $caml_bytes_set($res__0, 0, $c);
            $call5(
              $Stdlib_string[6],
              $str,
              1,
              $res__0,
              (int)
              ((int) ($prec__0 - $len) + 2),
              (int)
              ($len + -1)
            );
            return $call1($Stdlib_bytes[42], $res__0);
          }
          $switch__0 = 1 as dynamic;
        }
      }
      if (! $switch__0) {
        if ($len < $prec__0) {
          $res = $call2($Stdlib_bytes[1], $prec__0, 48);
          $call5(
            $Stdlib_string[6],
            $str,
            0,
            $res,
            (int)
            ($prec__0 - $len),
            $len
          );
          return $call1($Stdlib_bytes[42], $res);
        }
      }
      return $str;
    };
    $string_to_caml_string = (dynamic $str) : dynamic ==> {
      $str__0 = $call1($Stdlib_string[13], $str);
      $l = $caml_ml_string_length($str__0);
      $res = $call2($Stdlib_bytes[1], (int) ($l + 2), 34);
      $caml_blit_string($str__0, 0, $res, 1, $l);
      return $call1($Stdlib_bytes[42], $res);
    };
    $format_of_iconv = (dynamic $param) : dynamic ==> {
      switch($param) {
        // FALLTHROUGH
        case 1:
          return $cst_d__0;
        // FALLTHROUGH
        case 2:
          return $cst_d__1;
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
        case 0:
        // FALLTHROUGH
        case 13:
          return $cst_d;
        // FALLTHROUGH
        case 3:
        // FALLTHROUGH
        case 14:
          return $cst_i__0;
        // FALLTHROUGH
        default:
          return $cst_u;
        }
    };
    $format_of_iconvL = (dynamic $param) : dynamic ==> {
      switch($param) {
        // FALLTHROUGH
        case 1:
          return $cst_Ld__0;
        // FALLTHROUGH
        case 2:
          return $cst_Ld__1;
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
        case 0:
        // FALLTHROUGH
        case 13:
          return $cst_Ld;
        // FALLTHROUGH
        case 3:
        // FALLTHROUGH
        case 14:
          return $cst_Li__0;
        // FALLTHROUGH
        default:
          return $cst_Lu;
        }
    };
    $format_of_iconvl = (dynamic $param) : dynamic ==> {
      switch($param) {
        // FALLTHROUGH
        case 1:
          return $cst_ld__0;
        // FALLTHROUGH
        case 2:
          return $cst_ld__1;
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
        case 0:
        // FALLTHROUGH
        case 13:
          return $cst_ld;
        // FALLTHROUGH
        case 3:
        // FALLTHROUGH
        case 14:
          return $cst_li__0;
        // FALLTHROUGH
        default:
          return $cst_lu;
        }
    };
    $format_of_iconvn = (dynamic $param) : dynamic ==> {
      switch($param) {
        // FALLTHROUGH
        case 1:
          return $cst_nd__0;
        // FALLTHROUGH
        case 2:
          return $cst_nd__1;
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
        case 0:
        // FALLTHROUGH
        case 13:
          return $cst_nd;
        // FALLTHROUGH
        case 3:
        // FALLTHROUGH
        case 14:
          return $cst_ni__0;
        // FALLTHROUGH
        default:
          return $cst_nu;
        }
    };
    $format_of_fconv = (dynamic $fconv, dynamic $prec) : dynamic ==> {
      if (15 === $fconv) {return $cst_12g;}
      $prec__0 = $call1($Stdlib[18], $prec);
      $symb = $char_of_fconv($fconv);
      $buf = $buffer_create(16);
      $buffer_add_char($buf, 37);
      $bprint_fconv_flag($buf, $fconv);
      $buffer_add_char($buf, 46);
      $buffer_add_string($buf, $call1($Stdlib_int[10], $prec__0));
      $buffer_add_char($buf, $symb);
      return $buffer_contents($buf);
    };
    $transform_int_alt = (dynamic $iconv, dynamic $s) : dynamic ==> {
      $buf = null as dynamic;
      $c = null as dynamic;
      $c4_ = null as dynamic;
      $c5_ = null as dynamic;
      $c6_ = null as dynamic;
      $c7_ = null as dynamic;
      $c8_ = null as dynamic;
      $c9_ = null as dynamic;
      $digits = null as dynamic;
      $i = null as dynamic;
      $i__0 = null as dynamic;
      $left = null as dynamic;
      $match = null as dynamic;
      $n = null as dynamic;
      $pos = null as dynamic;
      $put = null as dynamic;
      $switcher = null as dynamic;
      $switcher__0 = null as dynamic;
      if (13 <= $iconv) {
        $n = Vector{0, 0} as dynamic;
        $c5_ = (int) ($caml_ml_string_length($s) + -1) as dynamic;
        $c4_ = 0 as dynamic;
        if (! ($c5_ < 0)) {
          $i__0 = $c4_;
          for (;;) {
            $match = $caml_string_unsafe_get($s, $i__0);
            $switcher__0 = (int) ($match + -48) as dynamic;
            if (! (9 < $unsigned_right_shift_32($switcher__0, 0))) {$n[1] += 1;}
            $c9_ = (int) ($i__0 + 1) as dynamic;
            if ($c5_ !== $i__0) {$i__0 = $c9_;continue;}
            break;
          }
        }
        $digits = $n[1];
        $buf = $caml_create_bytes(
          (int)
          ($caml_ml_string_length($s) + (int) ((int) ($digits + -1) / 3))
        );
        $pos = Vector{0, 0} as dynamic;
        $put = (dynamic $c) : dynamic ==> {
          $caml_bytes_set($buf, $pos[1], $c);
          $pos[1] += 1;
          return 0;
        };
        $left = Vector{0, (int) ((int) ((int) ($digits + -1) % 3) + 1)} as dynamic;
        $c7_ = (int) ($caml_ml_string_length($s) + -1) as dynamic;
        $c6_ = 0 as dynamic;
        if (! ($c7_ < 0)) {
          $i = $c6_;
          for (;;) {
            $c = $caml_string_unsafe_get($s, $i);
            $switcher = (int) ($c + -48) as dynamic;
            if (9 < $unsigned_right_shift_32($switcher, 0)) {$put($c);}
            else {
              if (0 === $left[1]) {$put(95);$left[1] = 3;}
              $left[1] += -1;
              $put($c);
            }
            $c8_ = (int) ($i + 1) as dynamic;
            if ($c7_ !== $i) {$i = $c8_;continue;}
            break;
          }
        }
        return $call1($Stdlib_bytes[42], $buf);
      }
      return $s;
    };
    $convert_int = (dynamic $iconv, dynamic $n) : dynamic ==> {
      return $transform_int_alt(
        $iconv,
        $caml_format_int($format_of_iconv($iconv), $n)
      );
    };
    $convert_int32 = (dynamic $iconv, dynamic $n) : dynamic ==> {
      return $transform_int_alt(
        $iconv,
        $caml_format_int($format_of_iconvl($iconv), $n)
      );
    };
    $convert_nativeint = (dynamic $iconv, dynamic $n) : dynamic ==> {
      return $transform_int_alt(
        $iconv,
        $caml_format_int($format_of_iconvn($iconv), $n)
      );
    };
    $convert_int64 = (dynamic $iconv, dynamic $n) : dynamic ==> {
      return $transform_int_alt(
        $iconv,
        $runtime["caml_int64_format"]($format_of_iconvL($iconv), $n)
      );
    };
    $convert_float = (dynamic $fconv, dynamic $prec, dynamic $x) : dynamic ==> {
      $is_valid = null as dynamic;
      $len = null as dynamic;
      $match = null as dynamic;
      $sign = null as dynamic;
      $str = null as dynamic;
      $switch__0 = null as dynamic;
      if (16 <= $fconv) {
        if (17 <= $fconv) {
          switch((int) ($fconv + -17)) {
            // FALLTHROUGH
            case 2:
              $switch__0 = 0 as dynamic;
              break;
            // FALLTHROUGH
            case 0:
            // FALLTHROUGH
            case 3:
              $sign = 43 as dynamic;
              $switch__0 = 1 as dynamic;
              break;
            // FALLTHROUGH
            default:
              $sign = 32 as dynamic;
              $switch__0 = 1 as dynamic;
            }
        }
        else {$switch__0 = 0 as dynamic;}
        if (! $switch__0) {$sign = 45 as dynamic;}
        $str = $runtime["caml_hexstring_of_float"]($x, $prec, $sign);
        return 19 <= $fconv ? $call1($Stdlib_string[29], $str) : ($str);
      }
      $str__0 = $runtime["caml_format_float"](
        $format_of_fconv($fconv, $prec),
        $x
      );
      if (15 === $fconv) {
        $len = $caml_ml_string_length($str__0);
        $is_valid = (dynamic $i) : dynamic ==> {
          $c3_ = null as dynamic;
          $i__1 = null as dynamic;
          $match = null as dynamic;
          $switch__0 = null as dynamic;
          $i__0 = $i;
          for (;;) {
            if ($i__0 === $len) {return 0;}
            $match = $caml_string_get($str__0, $i__0);
            $c3_ = (int) ($match + -46) as dynamic;
            $switch__0 = 23 < $unsigned_right_shift_32($c3_, 0)
              ? 55 === $c3_ ? 1 : (0)
              : (21 < $unsigned_right_shift_32((int) ($c3_ + -1), 0) ? 1 : (0));
            if ($switch__0) {return 1;}
            $i__1 = (int) ($i__0 + 1) as dynamic;
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
            : ($call2($Stdlib[28], $str__0, $cst__16))));
      }
      return $str__0;
    };
    $format_caml_char = (dynamic $c) : dynamic ==> {
      $str = $call1($Stdlib_char[2], $c);
      $l = $caml_ml_string_length($str);
      $res = $call2($Stdlib_bytes[1], (int) ($l + 2), 39);
      $caml_blit_string($str, 0, $res, 1, $l);
      return $call1($Stdlib_bytes[42], $res);
    };
    $string_of_fmtty = (dynamic $fmtty) : dynamic ==> {
      $buf = $buffer_create(16);
      $bprint_fmtty->contents($buf, $fmtty);
      return $buffer_contents($buf);
    };
    $make_float_padding_precision = 
    (dynamic $k, dynamic $acc, dynamic $fmt, dynamic $pad, dynamic $match, dynamic $fconv) : dynamic ==> {
      $c0_ = null as dynamic;
      $c1_ = null as dynamic;
      $c2_ = null as dynamic;
      $p = null as dynamic;
      $p__0 = null as dynamic;
      $p__1 = null as dynamic;
      if ($is_int($pad)) {
        if ($is_int($match)) {
          return 0 === $match
            ? (dynamic $x) : dynamic ==> {
             $str = $convert_float($fconv, $default_float_precision, $x);
             return $make_printf->contents($k, Vector{4, $acc, $str}, $fmt);
           }
            : ((dynamic $p, dynamic $x) : dynamic ==> {
             $str = $convert_float($fconv, $p, $x);
             return $make_printf->contents($k, Vector{4, $acc, $str}, $fmt);
           });
        }
        $p = $match[1];
        return (dynamic $x) : dynamic ==> {
          $str = $convert_float($fconv, $p, $x);
          return $make_printf->contents($k, Vector{4, $acc, $str}, $fmt);
        };
      }
      else {
        if (0 === $pad[0]) {
          $c0_ = $pad[2];
          $c1_ = $pad[1];
          if ($is_int($match)) {
            return 0 === $match
              ? (dynamic $x) : dynamic ==> {
               $str = $convert_float($fconv, $default_float_precision, $x);
               $str__0 = $fix_padding($c1_, $c0_, $str);
               return $make_printf->contents(
                 $k,
                 Vector{4, $acc, $str__0},
                 $fmt
               );
             }
              : ((dynamic $p, dynamic $x) : dynamic ==> {
               $str = $fix_padding($c1_, $c0_, $convert_float($fconv, $p, $x));
               return $make_printf->contents($k, Vector{4, $acc, $str}, $fmt);
             });
          }
          $p__0 = $match[1];
          return (dynamic $x) : dynamic ==> {
            $str = $fix_padding($c1_, $c0_, $convert_float($fconv, $p__0, $x));
            return $make_printf->contents($k, Vector{4, $acc, $str}, $fmt);
          };
        }
        $c2_ = $pad[1];
        if ($is_int($match)) {
          return 0 === $match
            ? (dynamic $w, dynamic $x) : dynamic ==> {
             $str = $convert_float($fconv, $default_float_precision, $x);
             $str__0 = $fix_padding($c2_, $w, $str);
             return $make_printf->contents($k, Vector{4, $acc, $str__0}, $fmt);
           }
            : ((dynamic $w, dynamic $p, dynamic $x) : dynamic ==> {
             $str = $fix_padding($c2_, $w, $convert_float($fconv, $p, $x));
             return $make_printf->contents($k, Vector{4, $acc, $str}, $fmt);
           });
        }
        $p__1 = $match[1];
        return (dynamic $w, dynamic $x) : dynamic ==> {
          $str = $fix_padding($c2_, $w, $convert_float($fconv, $p__1, $x));
          return $make_printf->contents($k, Vector{4, $acc, $str}, $fmt);
        };
      }
    };
    $make_int_padding_precision = 
    (dynamic $k, dynamic $acc, dynamic $fmt, dynamic $pad, dynamic $match, dynamic $trans, dynamic $iconv) : dynamic ==> {
      $cX_ = null as dynamic;
      $cY_ = null as dynamic;
      $cZ_ = null as dynamic;
      $p = null as dynamic;
      $p__0 = null as dynamic;
      $p__1 = null as dynamic;
      if ($is_int($pad)) {
        if ($is_int($match)) {
          return 0 === $match
            ? (dynamic $x) : dynamic ==> {
             $str = $call2($trans, $iconv, $x);
             return $make_printf->contents($k, Vector{4, $acc, $str}, $fmt);
           }
            : ((dynamic $p, dynamic $x) : dynamic ==> {
             $str = $fix_int_precision($p, $call2($trans, $iconv, $x));
             return $make_printf->contents($k, Vector{4, $acc, $str}, $fmt);
           });
        }
        $p = $match[1];
        return (dynamic $x) : dynamic ==> {
          $str = $fix_int_precision($p, $call2($trans, $iconv, $x));
          return $make_printf->contents($k, Vector{4, $acc, $str}, $fmt);
        };
      }
      else {
        if (0 === $pad[0]) {
          $cX_ = $pad[2];
          $cY_ = $pad[1];
          if ($is_int($match)) {
            return 0 === $match
              ? (dynamic $x) : dynamic ==> {
               $str = $fix_padding($cY_, $cX_, $call2($trans, $iconv, $x));
               return $make_printf->contents($k, Vector{4, $acc, $str}, $fmt);
             }
              : ((dynamic $p, dynamic $x) : dynamic ==> {
               $str = $fix_padding(
                 $cY_,
                 $cX_,
                 $fix_int_precision($p, $call2($trans, $iconv, $x))
               );
               return $make_printf->contents($k, Vector{4, $acc, $str}, $fmt);
             });
          }
          $p__0 = $match[1];
          return (dynamic $x) : dynamic ==> {
            $str = $fix_padding(
              $cY_,
              $cX_,
              $fix_int_precision($p__0, $call2($trans, $iconv, $x))
            );
            return $make_printf->contents($k, Vector{4, $acc, $str}, $fmt);
          };
        }
        $cZ_ = $pad[1];
        if ($is_int($match)) {
          return 0 === $match
            ? (dynamic $w, dynamic $x) : dynamic ==> {
             $str = $fix_padding($cZ_, $w, $call2($trans, $iconv, $x));
             return $make_printf->contents($k, Vector{4, $acc, $str}, $fmt);
           }
            : ((dynamic $w, dynamic $p, dynamic $x) : dynamic ==> {
             $str = $fix_padding(
               $cZ_,
               $w,
               $fix_int_precision($p, $call2($trans, $iconv, $x))
             );
             return $make_printf->contents($k, Vector{4, $acc, $str}, $fmt);
           });
        }
        $p__1 = $match[1];
        return (dynamic $w, dynamic $x) : dynamic ==> {
          $str = $fix_padding(
            $cZ_,
            $w,
            $fix_int_precision($p__1, $call2($trans, $iconv, $x))
          );
          return $make_printf->contents($k, Vector{4, $acc, $str}, $fmt);
        };
      }
    };
    $make_padding = 
    (dynamic $k, dynamic $acc, dynamic $fmt, dynamic $pad, dynamic $trans) : dynamic ==> {
      $padty = null as dynamic;
      $padty__0 = null as dynamic;
      $width = null as dynamic;
      if ($is_int($pad)) {
        return (dynamic $x) : dynamic ==> {
          $new_acc = Vector{4, $acc, $call1($trans, $x)} as dynamic;
          return $make_printf->contents($k, $new_acc, $fmt);
        };
      }
      else {
        if (0 === $pad[0]) {
          $width = $pad[2];
          $padty = $pad[1];
          return (dynamic $x) : dynamic ==> {
            $new_acc = Vector{
              4,
              $acc,
              $fix_padding($padty, $width, $call1($trans, $x))
            } as dynamic;
            return $make_printf->contents($k, $new_acc, $fmt);
          };
        }
        $padty__0 = $pad[1];
        return (dynamic $w, dynamic $x) : dynamic ==> {
          $new_acc = Vector{
            4,
            $acc,
            $fix_padding($padty__0, $w, $call1($trans, $x))
          } as dynamic;
          return $make_printf->contents($k, $new_acc, $fmt);
        };
      }
    };
    $make_printf__0 = 
    (dynamic $counter, dynamic $k, dynamic $acc, dynamic $fmt) : dynamic ==> {
      $acc__1 = null as dynamic;
      $acc__2 = null as dynamic;
      $acc__3 = null as dynamic;
      $acc__4 = null as dynamic;
      $arity = null as dynamic;
      $cU_ = null as dynamic;
      $cV_ = null as dynamic;
      $chr = null as dynamic;
      $counter__0 = null as dynamic;
      $counter__1 = null as dynamic;
      $f = null as dynamic;
      $fconv = null as dynamic;
      $fmt__1 = null as dynamic;
      $fmt__2 = null as dynamic;
      $fmt__3 = null as dynamic;
      $fmt__4 = null as dynamic;
      $fmt__5 = null as dynamic;
      $fmt__6 = null as dynamic;
      $fmting_lit = null as dynamic;
      $fmtty = null as dynamic;
      $iconv = null as dynamic;
      $iconv__0 = null as dynamic;
      $iconv__1 = null as dynamic;
      $iconv__2 = null as dynamic;
      $ign = null as dynamic;
      $k__1 = null as dynamic;
      $k__2 = null as dynamic;
      $k__3 = null as dynamic;
      $k__4 = null as dynamic;
      $match = null as dynamic;
      $match__0 = null as dynamic;
      $new_acc = null as dynamic;
      $pad = null as dynamic;
      $pad__0 = null as dynamic;
      $pad__1 = null as dynamic;
      $pad__2 = null as dynamic;
      $pad__3 = null as dynamic;
      $pad__4 = null as dynamic;
      $pad__5 = null as dynamic;
      $pad__6 = null as dynamic;
      $prec = null as dynamic;
      $prec__0 = null as dynamic;
      $prec__1 = null as dynamic;
      $prec__2 = null as dynamic;
      $prec__3 = null as dynamic;
      $rest = null as dynamic;
      $rest__0 = null as dynamic;
      $rest__1 = null as dynamic;
      $rest__10 = null as dynamic;
      $rest__11 = null as dynamic;
      $rest__12 = null as dynamic;
      $rest__13 = null as dynamic;
      $rest__14 = null as dynamic;
      $rest__15 = null as dynamic;
      $rest__16 = null as dynamic;
      $rest__17 = null as dynamic;
      $rest__18 = null as dynamic;
      $rest__19 = null as dynamic;
      $rest__2 = null as dynamic;
      $rest__3 = null as dynamic;
      $rest__4 = null as dynamic;
      $rest__5 = null as dynamic;
      $rest__6 = null as dynamic;
      $rest__7 = null as dynamic;
      $rest__8 = null as dynamic;
      $rest__9 = null as dynamic;
      $str = null as dynamic;
      $sub_fmtty = null as dynamic;
      $ty = null as dynamic;
      $k__0 = $k;
      $acc__0 = $acc;
      $fmt__0 = $fmt;
      for (;;) {
        if ($is_int($fmt__0)) {
          return $call1($k__0, $acc__0);
        }
        else {
          $continue_label = null;
          switch($fmt__0[0]) {
            // FALLTHROUGH
            case 0:
              $rest = $fmt__0[1];
              return (dynamic $c) : dynamic ==> {
                $new_acc = Vector{5, $acc__0, $c} as dynamic;
                return $make_printf->contents($k__0, $new_acc, $rest);
              };
            // FALLTHROUGH
            case 1:
              $rest__0 = $fmt__0[1];
              return (dynamic $c) : dynamic ==> {
                $new_acc = Vector{4, $acc__0, $format_caml_char($c)} as dynamic;
                return $make_printf->contents($k__0, $new_acc, $rest__0);
              };
            // FALLTHROUGH
            case 2:
              $rest__1 = $fmt__0[2];
              $pad = $fmt__0[1];
              return $make_padding(
                $k__0,
                $acc__0,
                $rest__1,
                $pad,
                (dynamic $str) : dynamic ==> {return $str;}
              );
            // FALLTHROUGH
            case 3:
              $rest__2 = $fmt__0[2];
              $pad__0 = $fmt__0[1];
              return $make_padding(
                $k__0,
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
                $acc__0,
                $rest__8,
                $pad__6,
                $Stdlib[30]
              );
            // FALLTHROUGH
            case 10:
              $fmt__1 = $fmt__0[1];
              $acc__1 = Vector{7, $acc__0} as dynamic;
              $acc__0 = $acc__1;
              $fmt__0 = $fmt__1;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 11:
              $fmt__2 = $fmt__0[2];
              $str = $fmt__0[1];
              $acc__2 = Vector{2, $acc__0, $str} as dynamic;
              $acc__0 = $acc__2;
              $fmt__0 = $fmt__2;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 12:
              $fmt__3 = $fmt__0[2];
              $chr = $fmt__0[1];
              $acc__3 = Vector{3, $acc__0, $chr} as dynamic;
              $acc__0 = $acc__3;
              $fmt__0 = $fmt__3;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 13:
              $rest__9 = $fmt__0[3];
              $sub_fmtty = $fmt__0[2];
              $ty = $string_of_fmtty($sub_fmtty);
              return (dynamic $str) : dynamic ==> {
                return $make_printf->contents(
                  $k__0,
                  Vector{4, $acc__0, $ty},
                  $rest__9
                );
              };
            // FALLTHROUGH
            case 14:
              $rest__10 = $fmt__0[3];
              $fmtty = $fmt__0[2];
              return (dynamic $param) : dynamic ==> {
                $fmt = $param[1];
                $cW_ = $recast($fmt, $fmtty);
                return $make_printf->contents(
                  $k__0,
                  $acc__0,
                  $call2($CamlinternalFormatBasics[3], $cW_, $rest__10)
                );
              };
            // FALLTHROUGH
            case 15:
              $rest__11 = $fmt__0[1];
              return (dynamic $f, dynamic $x) : dynamic ==> {
                return $make_printf->contents(
                  $k__0,
                  Vector{
                    6,
                    $acc__0,
                    (dynamic $o) : dynamic ==> {return $call2($f, $o, $x);}
                  },
                  $rest__11
                );
              };
            // FALLTHROUGH
            case 16:
              $rest__12 = $fmt__0[1];
              return (dynamic $f) : dynamic ==> {
                return $make_printf->contents(
                  $k__0,
                  Vector{6, $acc__0, $f},
                  $rest__12
                );
              };
            // FALLTHROUGH
            case 17:
              $fmt__4 = $fmt__0[2];
              $fmting_lit = $fmt__0[1];
              $acc__4 = Vector{0, $acc__0, $fmting_lit} as dynamic;
              $acc__0 = $acc__4;
              $fmt__0 = $fmt__4;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 18:
              $cU_ = $fmt__0[1];
              if (0 === $cU_[0]) {
                $rest__13 = $fmt__0[2];
                $match = $cU_[1];
                $fmt__5 = $match[1];
                $k__3 = (dynamic $acc, dynamic $k, dynamic $rest) : dynamic ==> {
                  $k__0 = (dynamic $kacc) : dynamic ==> {
                    return $make_printf->contents(
                      $k,
                      Vector{1, $acc, Vector{0, $kacc}},
                      $rest
                    );
                  };
                  return $k__0;
                };
                $k__1 = $k__3($acc__0, $k__0, $rest__13);
                $k__0 = $k__1;
                $acc__0 = 0 as dynamic;
                $fmt__0 = $fmt__5;
                $continue_label = "#";break;
              }
              $rest__14 = $fmt__0[2];
              $match__0 = $cU_[1];
              $fmt__6 = $match__0[1];
              $k__4 = (dynamic $acc, dynamic $k, dynamic $rest) : dynamic ==> {
                $k__0 = (dynamic $kacc) : dynamic ==> {
                  return $make_printf->contents(
                    $k,
                    Vector{1, $acc, Vector{1, $kacc}},
                    $rest
                  );
                };
                return $k__0;
              };
              $k__2 = $k__4($acc__0, $k__0, $rest__14);
              $k__0 = $k__2;
              $acc__0 = 0 as dynamic;
              $fmt__0 = $fmt__6;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 19:
              throw $caml_wrap_thrown_exception(
                      Vector{0, $Assert_failure, $q_}
                    ) as \Throwable;
            // FALLTHROUGH
            case 20:
              $rest__15 = $fmt__0[3];
              $new_acc = Vector{8, $acc__0, $cst_Printf_bad_conversion} as dynamic;
              return (dynamic $param) : dynamic ==> {
                return $make_printf->contents($k__0, $new_acc, $rest__15);
              };
            // FALLTHROUGH
            case 21:
              $rest__16 = $fmt__0[2];
              return (dynamic $n) : dynamic ==> {
                $new_acc = Vector{4, $acc__0, $caml_format_int($cst_u__0, $n)} as dynamic;
                return $make_printf->contents($k__0, $new_acc, $rest__16);
              };
            // FALLTHROUGH
            case 22:
              $rest__17 = $fmt__0[1];
              return (dynamic $c) : dynamic ==> {
                $new_acc = Vector{5, $acc__0, $c} as dynamic;
                return $make_printf->contents($k__0, $new_acc, $rest__17);
              };
            // FALLTHROUGH
            case 23:
              $rest__18 = $fmt__0[2];
              $ign = $fmt__0[1];
              if ($counter < 50) {
                $counter__1 = (int) ($counter + 1) as dynamic;
                return $make_ignored_param__0->contents(
                  $counter__1,
                  $k__0,
                  $acc__0,
                  $ign,
                  $rest__18
                );
              }
              return $caml_trampoline_return(
                $make_ignored_param__0->contents,
                varray[0,$k__0,$acc__0,$ign,$rest__18]
              );
            // FALLTHROUGH
            default:
              $rest__19 = $fmt__0[3];
              $f = $fmt__0[2];
              $arity = $fmt__0[1];
              $cV_ = $call1($f, 0);
              if ($counter < 50) {
                $counter__0 = (int) ($counter + 1) as dynamic;
                return $make_custom__0->contents(
                  $counter__0,
                  $k__0,
                  $acc__0,
                  $rest__19,
                  $arity,
                  $cV_
                );
              }
              return $caml_trampoline_return(
                $make_custom__0->contents,
                varray[0,$k__0,$acc__0,$rest__19,$arity,$cV_]
              );
            }
          if ($continue_label === "#") {continue;}
        }
      }
    };
    $make_ignored_param__0->contents = 
    (dynamic $counter, dynamic $k, dynamic $acc, dynamic $ign, dynamic $fmt) : dynamic ==> {
      $counter__0 = null as dynamic;
      $counter__1 = null as dynamic;
      $counter__10 = null as dynamic;
      $counter__11 = null as dynamic;
      $counter__12 = null as dynamic;
      $counter__13 = null as dynamic;
      $counter__14 = null as dynamic;
      $counter__2 = null as dynamic;
      $counter__3 = null as dynamic;
      $counter__4 = null as dynamic;
      $counter__5 = null as dynamic;
      $counter__6 = null as dynamic;
      $counter__7 = null as dynamic;
      $counter__8 = null as dynamic;
      $counter__9 = null as dynamic;
      $fmtty = null as dynamic;
      if ($is_int($ign)) {
        switch($ign) {
          // FALLTHROUGH
          case 0:
            if ($counter < 50) {
              $counter__0 = (int) ($counter + 1) as dynamic;
              return $make_invalid_arg->contents($counter__0, $k, $acc, $fmt);
            }
            return $caml_trampoline_return(
              $make_invalid_arg->contents,
              varray[0,$k,$acc,$fmt]
            );
          // FALLTHROUGH
          case 1:
            if ($counter < 50) {
              $counter__1 = (int) ($counter + 1) as dynamic;
              return $make_invalid_arg->contents($counter__1, $k, $acc, $fmt);
            }
            return $caml_trampoline_return(
              $make_invalid_arg->contents,
              varray[0,$k,$acc,$fmt]
            );
          // FALLTHROUGH
          case 2:
            throw $caml_wrap_thrown_exception(Vector{0, $Assert_failure, $r_}) as \Throwable;
          // FALLTHROUGH
          default:
            if ($counter < 50) {
              $counter__2 = (int) ($counter + 1) as dynamic;
              return $make_invalid_arg->contents($counter__2, $k, $acc, $fmt);
            }
            return $caml_trampoline_return(
              $make_invalid_arg->contents,
              varray[0,$k,$acc,$fmt]
            );
          }
      }
      else {
        switch($ign[0]) {
          // FALLTHROUGH
          case 0:
            if ($counter < 50) {
              $counter__3 = (int) ($counter + 1) as dynamic;
              return $make_invalid_arg->contents($counter__3, $k, $acc, $fmt);
            }
            return $caml_trampoline_return(
              $make_invalid_arg->contents,
              varray[0,$k,$acc,$fmt]
            );
          // FALLTHROUGH
          case 1:
            if ($counter < 50) {
              $counter__4 = (int) ($counter + 1) as dynamic;
              return $make_invalid_arg->contents($counter__4, $k, $acc, $fmt);
            }
            return $caml_trampoline_return(
              $make_invalid_arg->contents,
              varray[0,$k,$acc,$fmt]
            );
          // FALLTHROUGH
          case 2:
            if ($counter < 50) {
              $counter__5 = (int) ($counter + 1) as dynamic;
              return $make_invalid_arg->contents($counter__5, $k, $acc, $fmt);
            }
            return $caml_trampoline_return(
              $make_invalid_arg->contents,
              varray[0,$k,$acc,$fmt]
            );
          // FALLTHROUGH
          case 3:
            if ($counter < 50) {
              $counter__6 = (int) ($counter + 1) as dynamic;
              return $make_invalid_arg->contents($counter__6, $k, $acc, $fmt);
            }
            return $caml_trampoline_return(
              $make_invalid_arg->contents,
              varray[0,$k,$acc,$fmt]
            );
          // FALLTHROUGH
          case 4:
            if ($counter < 50) {
              $counter__7 = (int) ($counter + 1) as dynamic;
              return $make_invalid_arg->contents($counter__7, $k, $acc, $fmt);
            }
            return $caml_trampoline_return(
              $make_invalid_arg->contents,
              varray[0,$k,$acc,$fmt]
            );
          // FALLTHROUGH
          case 5:
            if ($counter < 50) {
              $counter__8 = (int) ($counter + 1) as dynamic;
              return $make_invalid_arg->contents($counter__8, $k, $acc, $fmt);
            }
            return $caml_trampoline_return(
              $make_invalid_arg->contents,
              varray[0,$k,$acc,$fmt]
            );
          // FALLTHROUGH
          case 6:
            if ($counter < 50) {
              $counter__9 = (int) ($counter + 1) as dynamic;
              return $make_invalid_arg->contents($counter__9, $k, $acc, $fmt);
            }
            return $caml_trampoline_return(
              $make_invalid_arg->contents,
              varray[0,$k,$acc,$fmt]
            );
          // FALLTHROUGH
          case 7:
            if ($counter < 50) {
              $counter__10 = (int) ($counter + 1) as dynamic;
              return $make_invalid_arg->contents($counter__10, $k, $acc, $fmt);
            }
            return $caml_trampoline_return(
              $make_invalid_arg->contents,
              varray[0,$k,$acc,$fmt]
            );
          // FALLTHROUGH
          case 8:
            if ($counter < 50) {
              $counter__11 = (int) ($counter + 1) as dynamic;
              return $make_invalid_arg->contents($counter__11, $k, $acc, $fmt);
            }
            return $caml_trampoline_return(
              $make_invalid_arg->contents,
              varray[0,$k,$acc,$fmt]
            );
          // FALLTHROUGH
          case 9:
            $fmtty = $ign[2];
            if ($counter < 50) {
              $counter__14 = (int) ($counter + 1) as dynamic;
              return $make_from_fmtty__0->contents(
                $counter__14,
                $k,
                $acc,
                $fmtty,
                $fmt
              );
            }
            return $caml_trampoline_return(
              $make_from_fmtty__0->contents,
              varray[0,$k,$acc,$fmtty,$fmt]
            );
          // FALLTHROUGH
          case 10:
            if ($counter < 50) {
              $counter__12 = (int) ($counter + 1) as dynamic;
              return $make_invalid_arg->contents($counter__12, $k, $acc, $fmt);
            }
            return $caml_trampoline_return(
              $make_invalid_arg->contents,
              varray[0,$k,$acc,$fmt]
            );
          // FALLTHROUGH
          default:
            if ($counter < 50) {
              $counter__13 = (int) ($counter + 1) as dynamic;
              return $make_invalid_arg->contents($counter__13, $k, $acc, $fmt);
            }
            return $caml_trampoline_return(
              $make_invalid_arg->contents,
              varray[0,$k,$acc,$fmt]
            );
          }
      }
    };
    $make_from_fmtty__0->contents = 
    (dynamic $counter, dynamic $k, dynamic $acc, dynamic $fmtty, dynamic $fmt) : dynamic ==> {
      $counter__0 = null as dynamic;
      $rest = null as dynamic;
      $rest__0 = null as dynamic;
      $rest__1 = null as dynamic;
      $rest__10 = null as dynamic;
      $rest__11 = null as dynamic;
      $rest__2 = null as dynamic;
      $rest__3 = null as dynamic;
      $rest__4 = null as dynamic;
      $rest__5 = null as dynamic;
      $rest__6 = null as dynamic;
      $rest__7 = null as dynamic;
      $rest__8 = null as dynamic;
      $rest__9 = null as dynamic;
      $ty = null as dynamic;
      $ty1 = null as dynamic;
      $ty2 = null as dynamic;
      if ($is_int($fmtty)) {
        if ($counter < 50) {
          $counter__0 = (int) ($counter + 1) as dynamic;
          return $make_invalid_arg->contents($counter__0, $k, $acc, $fmt);
        }
        return $caml_trampoline_return(
          $make_invalid_arg->contents,
          varray[0,$k,$acc,$fmt]
        );
      }
      else {
        switch($fmtty[0]) {
          // FALLTHROUGH
          case 0:
            $rest = $fmtty[1];
            return (dynamic $param) : dynamic ==> {
              return $make_from_fmtty->contents($k, $acc, $rest, $fmt);
            };
          // FALLTHROUGH
          case 1:
            $rest__0 = $fmtty[1];
            return (dynamic $param) : dynamic ==> {
              return $make_from_fmtty->contents($k, $acc, $rest__0, $fmt);
            };
          // FALLTHROUGH
          case 2:
            $rest__1 = $fmtty[1];
            return (dynamic $param) : dynamic ==> {
              return $make_from_fmtty->contents($k, $acc, $rest__1, $fmt);
            };
          // FALLTHROUGH
          case 3:
            $rest__2 = $fmtty[1];
            return (dynamic $param) : dynamic ==> {
              return $make_from_fmtty->contents($k, $acc, $rest__2, $fmt);
            };
          // FALLTHROUGH
          case 4:
            $rest__3 = $fmtty[1];
            return (dynamic $param) : dynamic ==> {
              return $make_from_fmtty->contents($k, $acc, $rest__3, $fmt);
            };
          // FALLTHROUGH
          case 5:
            $rest__4 = $fmtty[1];
            return (dynamic $param) : dynamic ==> {
              return $make_from_fmtty->contents($k, $acc, $rest__4, $fmt);
            };
          // FALLTHROUGH
          case 6:
            $rest__5 = $fmtty[1];
            return (dynamic $param) : dynamic ==> {
              return $make_from_fmtty->contents($k, $acc, $rest__5, $fmt);
            };
          // FALLTHROUGH
          case 7:
            $rest__6 = $fmtty[1];
            return (dynamic $param) : dynamic ==> {
              return $make_from_fmtty->contents($k, $acc, $rest__6, $fmt);
            };
          // FALLTHROUGH
          case 8:
            $rest__7 = $fmtty[2];
            return (dynamic $param) : dynamic ==> {
              return $make_from_fmtty->contents($k, $acc, $rest__7, $fmt);
            };
          // FALLTHROUGH
          case 9:
            $rest__8 = $fmtty[3];
            $ty2 = $fmtty[2];
            $ty1 = $fmtty[1];
            $ty = $trans->contents($symm->contents($ty1), $ty2);
            return (dynamic $param) : dynamic ==> {
              return $make_from_fmtty->contents(
                $k,
                $acc,
                $call2($CamlinternalFormatBasics[1], $ty, $rest__8),
                $fmt
              );
            };
          // FALLTHROUGH
          case 10:
            $rest__9 = $fmtty[1];
            return (dynamic $param, dynamic $cT_) : dynamic ==> {
              return $make_from_fmtty->contents($k, $acc, $rest__9, $fmt);
            };
          // FALLTHROUGH
          case 11:
            $rest__10 = $fmtty[1];
            return (dynamic $param) : dynamic ==> {
              return $make_from_fmtty->contents($k, $acc, $rest__10, $fmt);
            };
          // FALLTHROUGH
          case 12:
            $rest__11 = $fmtty[1];
            return (dynamic $param) : dynamic ==> {
              return $make_from_fmtty->contents($k, $acc, $rest__11, $fmt);
            };
          // FALLTHROUGH
          case 13:
            throw $caml_wrap_thrown_exception(Vector{0, $Assert_failure, $s_}) as \Throwable;
          // FALLTHROUGH
          default:
            throw $caml_wrap_thrown_exception(Vector{0, $Assert_failure, $t_}) as \Throwable;
          }
      }
    };
    $make_invalid_arg->contents = 
    (dynamic $counter, dynamic $k, dynamic $acc, dynamic $fmt) : dynamic ==> {
      $counter__0 = null as dynamic;
      $cS_ = Vector{8, $acc, $cst_Printf_bad_conversion__0} as dynamic;
      if ($counter < 50) {
        $counter__0 = (int) ($counter + 1) as dynamic;
        return $make_printf__0($counter__0, $k, $cS_, $fmt);
      }
      return $caml_trampoline_return($make_printf__0, varray[0,$k,$cS_,$fmt]);
    };
    $make_custom__0->contents = 
    (dynamic $counter, dynamic $k, dynamic $acc, dynamic $rest, dynamic $arity, dynamic $f) : dynamic ==> {
      $arity__0 = null as dynamic;
      $counter__0 = null as dynamic;
      if ($arity) {
        $arity__0 = $arity[1];
        return (dynamic $x) : dynamic ==> {
          return $make_custom->contents(
            $k,
            $acc,
            $rest,
            $arity__0,
            $call1($f, $x)
          );
        };
      }
      $cR_ = Vector{4, $acc, $f} as dynamic;
      if ($counter < 50) {
        $counter__0 = (int) ($counter + 1) as dynamic;
        return $make_printf__0($counter__0, $k, $cR_, $rest);
      }
      return $caml_trampoline_return($make_printf__0, varray[0,$k,$cR_,$rest]);
    };
    $make_printf->contents = (dynamic $k, dynamic $acc, dynamic $fmt) : dynamic ==> {
      return $caml_trampoline($make_printf__0(0, $k, $acc, $fmt));
    };
    $make_ignored_param = 
    (dynamic $k, dynamic $acc, dynamic $ign, dynamic $fmt) : dynamic ==> {
      return $caml_trampoline(
        $make_ignored_param__0->contents(0, $k, $acc, $ign, $fmt)
      );
    };
    $make_from_fmtty->contents = 
    (dynamic $k, dynamic $acc, dynamic $fmtty, dynamic $fmt) : dynamic ==> {
      return $caml_trampoline(
        $make_from_fmtty__0->contents(0, $k, $acc, $fmtty, $fmt)
      );
    };
    $make_custom->contents = 
    (dynamic $k, dynamic $acc, dynamic $rest, dynamic $arity, dynamic $f) : dynamic ==> {
      return $caml_trampoline(
        $make_custom__0->contents(0, $k, $acc, $rest, $arity, $f)
      );
    };
    $const__0 = (dynamic $x, dynamic $param) : dynamic ==> {return $x;};
    $fn_of_padding_precision = 
    (dynamic $k, dynamic $o, dynamic $fmt, dynamic $pad, dynamic $prec) : dynamic ==> {
      $cA_ = null as dynamic;
      $cB_ = null as dynamic;
      $cn_ = null as dynamic;
      $co_ = null as dynamic;
      $cp_ = null as dynamic;
      $cq_ = null as dynamic;
      $cr_ = null as dynamic;
      $cs_ = null as dynamic;
      $ct_ = null as dynamic;
      $cu_ = null as dynamic;
      $cv_ = null as dynamic;
      $cw_ = null as dynamic;
      $cx_ = null as dynamic;
      $cy_ = null as dynamic;
      $cz_ = null as dynamic;
      if ($is_int($pad)) {
        if ($is_int($prec)) {
          if (0 === $prec) {
            $cn_ = $make_iprintf->contents($k, $o, $fmt);
            return (dynamic $cF_) : dynamic ==> {
              return $const__0($cn_, $cF_);
            };
          }
          $co_ = $make_iprintf->contents($k, $o, $fmt);
          $cp_ = (dynamic $cE_) : dynamic ==> {return $const__0($co_, $cE_);};
          return (dynamic $cD_) : dynamic ==> {return $const__0($cp_, $cD_);};
        }
        $cq_ = $make_iprintf->contents($k, $o, $fmt);
        return (dynamic $cC_) : dynamic ==> {return $const__0($cq_, $cC_);};
      }
      else {
        if (0 === $pad[0]) {
          if ($is_int($prec)) {
            if (0 === $prec) {
              $cr_ = $make_iprintf->contents($k, $o, $fmt);
              return (dynamic $cQ_) : dynamic ==> {
                return $const__0($cr_, $cQ_);
              };
            }
            $cs_ = $make_iprintf->contents($k, $o, $fmt);
            $ct_ = (dynamic $cP_) : dynamic ==> {
              return $const__0($cs_, $cP_);
            };
            return (dynamic $cO_) : dynamic ==> {
              return $const__0($ct_, $cO_);
            };
          }
          $cu_ = $make_iprintf->contents($k, $o, $fmt);
          return (dynamic $cN_) : dynamic ==> {return $const__0($cu_, $cN_);};
        }
        if ($is_int($prec)) {
          if (0 === $prec) {
            $cv_ = $make_iprintf->contents($k, $o, $fmt);
            $cw_ = (dynamic $cM_) : dynamic ==> {
              return $const__0($cv_, $cM_);
            };
            return (dynamic $cL_) : dynamic ==> {
              return $const__0($cw_, $cL_);
            };
          }
          $cx_ = $make_iprintf->contents($k, $o, $fmt);
          $cy_ = (dynamic $cK_) : dynamic ==> {return $const__0($cx_, $cK_);};
          $cz_ = (dynamic $cJ_) : dynamic ==> {return $const__0($cy_, $cJ_);};
          return (dynamic $cI_) : dynamic ==> {return $const__0($cz_, $cI_);};
        }
        $cA_ = $make_iprintf->contents($k, $o, $fmt);
        $cB_ = (dynamic $cH_) : dynamic ==> {return $const__0($cA_, $cH_);};
        return (dynamic $cG_) : dynamic ==> {return $const__0($cB_, $cG_);};
      }
    };
    $make_iprintf__0 = 
    (dynamic $counter, dynamic $k, dynamic $o, dynamic $fmt) : dynamic ==> {
      $arity = null as dynamic;
      $b0_ = null as dynamic;
      $b1_ = null as dynamic;
      $bC_ = null as dynamic;
      $bD_ = null as dynamic;
      $bE_ = null as dynamic;
      $bF_ = null as dynamic;
      $bG_ = null as dynamic;
      $bH_ = null as dynamic;
      $bI_ = null as dynamic;
      $bJ_ = null as dynamic;
      $bK_ = null as dynamic;
      $bL_ = null as dynamic;
      $bM_ = null as dynamic;
      $bN_ = null as dynamic;
      $bO_ = null as dynamic;
      $bP_ = null as dynamic;
      $bQ_ = null as dynamic;
      $bR_ = null as dynamic;
      $bS_ = null as dynamic;
      $bT_ = null as dynamic;
      $bU_ = null as dynamic;
      $bV_ = null as dynamic;
      $bW_ = null as dynamic;
      $bX_ = null as dynamic;
      $bY_ = null as dynamic;
      $bZ_ = null as dynamic;
      $counter__0 = null as dynamic;
      $fmt__1 = null as dynamic;
      $fmt__2 = null as dynamic;
      $fmt__3 = null as dynamic;
      $fmt__4 = null as dynamic;
      $fmt__5 = null as dynamic;
      $fmt__6 = null as dynamic;
      $fmtty = null as dynamic;
      $ign = null as dynamic;
      $k__1 = null as dynamic;
      $k__2 = null as dynamic;
      $k__3 = null as dynamic;
      $k__4 = null as dynamic;
      $match = null as dynamic;
      $match__0 = null as dynamic;
      $pad = null as dynamic;
      $pad__0 = null as dynamic;
      $pad__1 = null as dynamic;
      $pad__2 = null as dynamic;
      $pad__3 = null as dynamic;
      $prec = null as dynamic;
      $prec__0 = null as dynamic;
      $prec__1 = null as dynamic;
      $prec__2 = null as dynamic;
      $prec__3 = null as dynamic;
      $rest = null as dynamic;
      $rest__0 = null as dynamic;
      $rest__1 = null as dynamic;
      $rest__10 = null as dynamic;
      $rest__11 = null as dynamic;
      $rest__12 = null as dynamic;
      $rest__13 = null as dynamic;
      $rest__14 = null as dynamic;
      $rest__15 = null as dynamic;
      $rest__16 = null as dynamic;
      $rest__17 = null as dynamic;
      $rest__18 = null as dynamic;
      $rest__19 = null as dynamic;
      $rest__2 = null as dynamic;
      $rest__20 = null as dynamic;
      $rest__21 = null as dynamic;
      $rest__22 = null as dynamic;
      $rest__23 = null as dynamic;
      $rest__24 = null as dynamic;
      $rest__25 = null as dynamic;
      $rest__3 = null as dynamic;
      $rest__4 = null as dynamic;
      $rest__5 = null as dynamic;
      $rest__6 = null as dynamic;
      $rest__7 = null as dynamic;
      $rest__8 = null as dynamic;
      $rest__9 = null as dynamic;
      $k__0 = $k;
      $fmt__0 = $fmt;
      for (;;) {
        if ($is_int($fmt__0)) {
          return $call1($k__0, $o);
        }
        else {
          $continue_label = null;
          switch($fmt__0[0]) {
            // FALLTHROUGH
            case 0:
              $rest = $fmt__0[1];
              $bC_ = $make_iprintf->contents($k__0, $o, $rest);
              return (dynamic $cm_) : dynamic ==> {
                return $const__0($bC_, $cm_);
              };
            // FALLTHROUGH
            case 1:
              $rest__0 = $fmt__0[1];
              $bD_ = $make_iprintf->contents($k__0, $o, $rest__0);
              return (dynamic $cl_) : dynamic ==> {
                return $const__0($bD_, $cl_);
              };
            // FALLTHROUGH
            case 2:
              $bE_ = $fmt__0[1];
              if ($is_int($bE_)) {
                $rest__1 = $fmt__0[2];
                $bF_ = $make_iprintf->contents($k__0, $o, $rest__1);
                return (dynamic $ch_) : dynamic ==> {
                  return $const__0($bF_, $ch_);
                };
              }
              else {
                if (0 === $bE_[0]) {
                  $rest__2 = $fmt__0[2];
                  $bG_ = $make_iprintf->contents($k__0, $o, $rest__2);
                  return (dynamic $ck_) : dynamic ==> {
                    return $const__0($bG_, $ck_);
                  };
                }
                $rest__3 = $fmt__0[2];
                $bH_ = $make_iprintf->contents($k__0, $o, $rest__3);
                $bI_ = (dynamic $cj_) : dynamic ==> {
                  return $const__0($bH_, $cj_);
                };
                return (dynamic $ci_) : dynamic ==> {
                  return $const__0($bI_, $ci_);
                };
              }
            // FALLTHROUGH
            case 3:
              $bJ_ = $fmt__0[1];
              if ($is_int($bJ_)) {
                $rest__4 = $fmt__0[2];
                $bK_ = $make_iprintf->contents($k__0, $o, $rest__4);
                return (dynamic $cd_) : dynamic ==> {
                  return $const__0($bK_, $cd_);
                };
              }
              else {
                if (0 === $bJ_[0]) {
                  $rest__5 = $fmt__0[2];
                  $bL_ = $make_iprintf->contents($k__0, $o, $rest__5);
                  return (dynamic $cg_) : dynamic ==> {
                    return $const__0($bL_, $cg_);
                  };
                }
                $rest__6 = $fmt__0[2];
                $bM_ = $make_iprintf->contents($k__0, $o, $rest__6);
                $bN_ = (dynamic $cf_) : dynamic ==> {
                  return $const__0($bM_, $cf_);
                };
                return (dynamic $ce_) : dynamic ==> {
                  return $const__0($bN_, $ce_);
                };
              }
            // FALLTHROUGH
            case 4:
              $rest__7 = $fmt__0[4];
              $prec = $fmt__0[3];
              $pad = $fmt__0[2];
              return $fn_of_padding_precision($k__0, $o, $rest__7, $pad, $prec
              );
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
              $bO_ = $fmt__0[1];
              if ($is_int($bO_)) {
                $rest__12 = $fmt__0[2];
                $bP_ = $make_iprintf->contents($k__0, $o, $rest__12);
                return (dynamic $b__) : dynamic ==> {
                  return $const__0($bP_, $b__);
                };
              }
              else {
                if (0 === $bO_[0]) {
                  $rest__13 = $fmt__0[2];
                  $bQ_ = $make_iprintf->contents($k__0, $o, $rest__13);
                  return (dynamic $cc_) : dynamic ==> {
                    return $const__0($bQ_, $cc_);
                  };
                }
                $rest__14 = $fmt__0[2];
                $bR_ = $make_iprintf->contents($k__0, $o, $rest__14);
                $bS_ = (dynamic $cb_) : dynamic ==> {
                  return $const__0($bR_, $cb_);
                };
                return (dynamic $ca_) : dynamic ==> {
                  return $const__0($bS_, $ca_);
                };
              }
            // FALLTHROUGH
            case 10:
              $fmt__1 = $fmt__0[1];
              $fmt__0 = $fmt__1;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 11:
              $fmt__2 = $fmt__0[2];
              $fmt__0 = $fmt__2;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 12:
              $fmt__3 = $fmt__0[2];
              $fmt__0 = $fmt__3;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 13:
              $rest__15 = $fmt__0[3];
              $bT_ = $make_iprintf->contents($k__0, $o, $rest__15);
              return (dynamic $b9_) : dynamic ==> {
                return $const__0($bT_, $b9_);
              };
            // FALLTHROUGH
            case 14:
              $rest__16 = $fmt__0[3];
              $fmtty = $fmt__0[2];
              return (dynamic $param) : dynamic ==> {
                $fmt = $param[1];
                $b8_ = $recast($fmt, $fmtty);
                return $make_iprintf->contents(
                  $k__0,
                  $o,
                  $call2($CamlinternalFormatBasics[3], $b8_, $rest__16)
                );
              };
            // FALLTHROUGH
            case 15:
              $rest__17 = $fmt__0[1];
              $bU_ = $make_iprintf->contents($k__0, $o, $rest__17);
              $bV_ = (dynamic $b7_) : dynamic ==> {
                return $const__0($bU_, $b7_);
              };
              return (dynamic $b6_) : dynamic ==> {
                return $const__0($bV_, $b6_);
              };
            // FALLTHROUGH
            case 16:
              $rest__18 = $fmt__0[1];
              $bW_ = $make_iprintf->contents($k__0, $o, $rest__18);
              return (dynamic $b5_) : dynamic ==> {
                return $const__0($bW_, $b5_);
              };
            // FALLTHROUGH
            case 17:
              $fmt__4 = $fmt__0[2];
              $fmt__0 = $fmt__4;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 18:
              $bX_ = $fmt__0[1];
              if (0 === $bX_[0]) {
                $rest__19 = $fmt__0[2];
                $match = $bX_[1];
                $fmt__5 = $match[1];
                $k__3 = (dynamic $k, dynamic $rest) : dynamic ==> {
                  $k__0 = (dynamic $koc) : dynamic ==> {
                    return $make_iprintf->contents($k, $koc, $rest);
                  };
                  return $k__0;
                };
                $k__1 = $k__3($k__0, $rest__19);
                $k__0 = $k__1;
                $fmt__0 = $fmt__5;
                $continue_label = "#";break;
              }
              $rest__20 = $fmt__0[2];
              $match__0 = $bX_[1];
              $fmt__6 = $match__0[1];
              $k__4 = (dynamic $k, dynamic $rest) : dynamic ==> {
                $k__0 = (dynamic $koc) : dynamic ==> {
                  return $make_iprintf->contents($k, $koc, $rest);
                };
                return $k__0;
              };
              $k__2 = $k__4($k__0, $rest__20);
              $k__0 = $k__2;
              $fmt__0 = $fmt__6;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 19:
              throw $caml_wrap_thrown_exception(
                      Vector{0, $Assert_failure, $u_}
                    ) as \Throwable;
            // FALLTHROUGH
            case 20:
              $rest__21 = $fmt__0[3];
              $bY_ = $make_iprintf->contents($k__0, $o, $rest__21);
              return (dynamic $b4_) : dynamic ==> {
                return $const__0($bY_, $b4_);
              };
            // FALLTHROUGH
            case 21:
              $rest__22 = $fmt__0[2];
              $bZ_ = $make_iprintf->contents($k__0, $o, $rest__22);
              return (dynamic $b3_) : dynamic ==> {
                return $const__0($bZ_, $b3_);
              };
            // FALLTHROUGH
            case 22:
              $rest__23 = $fmt__0[1];
              $b0_ = $make_iprintf->contents($k__0, $o, $rest__23);
              return (dynamic $b2_) : dynamic ==> {
                return $const__0($b0_, $b2_);
              };
            // FALLTHROUGH
            case 23:
              $rest__24 = $fmt__0[2];
              $ign = $fmt__0[1];
              $b1_ = 0 as dynamic;
              return $make_ignored_param(
                (dynamic $param) : dynamic ==> {return $call1($k__0, $o);},
                $b1_,
                $ign,
                $rest__24
              );
            // FALLTHROUGH
            default:
              $rest__25 = $fmt__0[3];
              $arity = $fmt__0[1];
              if ($counter < 50) {
                $counter__0 = (int) ($counter + 1) as dynamic;
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
          if ($continue_label === "#") {continue;}
        }
      }
    };
    $fn_of_custom_arity__0->contents = 
    (dynamic $counter, dynamic $k, dynamic $o, dynamic $fmt, dynamic $param) : dynamic ==> {
      $arity = null as dynamic;
      $bA_ = null as dynamic;
      $counter__0 = null as dynamic;
      if ($param) {
        $arity = $param[1];
        $bA_ = $fn_of_custom_arity->contents($k, $o, $fmt, $arity);
        return (dynamic $bB_) : dynamic ==> {return $const__0($bA_, $bB_);};
      }
      if ($counter < 50) {
        $counter__0 = (int) ($counter + 1) as dynamic;
        return $make_iprintf__0($counter__0, $k, $o, $fmt);
      }
      return $caml_trampoline_return($make_iprintf__0, varray[0,$k,$o,$fmt]);
    };
    $make_iprintf->contents = (dynamic $k, dynamic $o, dynamic $fmt) : dynamic ==> {
      return $caml_trampoline($make_iprintf__0(0, $k, $o, $fmt));
    };
    $fn_of_custom_arity->contents = 
    (dynamic $k, dynamic $o, dynamic $fmt, dynamic $param) : dynamic ==> {
      return $caml_trampoline(
        $fn_of_custom_arity__0->contents(0, $k, $o, $fmt, $param)
      );
    };
    $output_acc->contents = (dynamic $o, dynamic $acc) : dynamic ==> {
      $acc__1 = null as dynamic;
      $acc__2 = null as dynamic;
      $by_ = null as dynamic;
      $bz_ = null as dynamic;
      $c = null as dynamic;
      $f = null as dynamic;
      $fmting_lit = null as dynamic;
      $msg = null as dynamic;
      $p = null as dynamic;
      $p__0 = null as dynamic;
      $p__1 = null as dynamic;
      $p__2 = null as dynamic;
      $p__3 = null as dynamic;
      $p__4 = null as dynamic;
      $s = null as dynamic;
      $s__0 = null as dynamic;
      $acc__0 = $acc;
      for (;;) {
        if ($is_int($acc__0)) {return 0;}
        else {
          $continue_label = null;
          switch($acc__0[0]) {
            // FALLTHROUGH
            case 0:
              $fmting_lit = $acc__0[2];
              $p = $acc__0[1];
              $s = $string_of_formatting_lit($fmting_lit);
              $output_acc->contents($o, $p);
              return $call2($Stdlib[66], $o, $s);
            // FALLTHROUGH
            case 1:
              $by_ = $acc__0[2];
              $bz_ = $acc__0[1];
              if (0 === $by_[0]) {
                $acc__1 = $by_[1];
                $output_acc->contents($o, $bz_);
                $call2($Stdlib[66], $o, $cst__17);
                $acc__0 = $acc__1;
                $continue_label = "#";break;
              }
              $acc__2 = $by_[1];
              $output_acc->contents($o, $bz_);
              $call2($Stdlib[66], $o, $cst__18);
              $acc__0 = $acc__2;
              $continue_label = "#";break;
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
              return $call1($Stdlib[63], $o);
            // FALLTHROUGH
            case 8:
              $msg = $acc__0[2];
              $p__4 = $acc__0[1];
              $output_acc->contents($o, $p__4);
              return $call1($Stdlib[1], $msg);
            // FALLTHROUGH
            case 2:
            // FALLTHROUGH
            case 4:
              $s__0 = $acc__0[2];
              $p__0 = $acc__0[1];
              $output_acc->contents($o, $p__0);
              return $call2($Stdlib[66], $o, $s__0);
            // FALLTHROUGH
            default:
              $c = $acc__0[2];
              $p__1 = $acc__0[1];
              $output_acc->contents($o, $p__1);
              return $call2($Stdlib[65], $o, $c);
            }
          if ($continue_label === "#") {continue;}
        }
      }
    };
    $bufput_acc->contents = (dynamic $b, dynamic $acc) : dynamic ==> {
      $acc__1 = null as dynamic;
      $acc__2 = null as dynamic;
      $acc__3 = null as dynamic;
      $bw_ = null as dynamic;
      $bx_ = null as dynamic;
      $c = null as dynamic;
      $f = null as dynamic;
      $fmting_lit = null as dynamic;
      $msg = null as dynamic;
      $p = null as dynamic;
      $p__0 = null as dynamic;
      $p__1 = null as dynamic;
      $p__2 = null as dynamic;
      $p__3 = null as dynamic;
      $s = null as dynamic;
      $s__0 = null as dynamic;
      $acc__0 = $acc;
      for (;;) {
        if ($is_int($acc__0)) {return 0;}
        else {
          $continue_label = null;
          switch($acc__0[0]) {
            // FALLTHROUGH
            case 0:
              $fmting_lit = $acc__0[2];
              $p = $acc__0[1];
              $s = $string_of_formatting_lit($fmting_lit);
              $bufput_acc->contents($b, $p);
              return $call2($Stdlib_buffer[14], $b, $s);
            // FALLTHROUGH
            case 1:
              $bw_ = $acc__0[2];
              $bx_ = $acc__0[1];
              if (0 === $bw_[0]) {
                $acc__1 = $bw_[1];
                $bufput_acc->contents($b, $bx_);
                $call2($Stdlib_buffer[14], $b, $cst__19);
                $acc__0 = $acc__1;
                $continue_label = "#";break;
              }
              $acc__2 = $bw_[1];
              $bufput_acc->contents($b, $bx_);
              $call2($Stdlib_buffer[14], $b, $cst__20);
              $acc__0 = $acc__2;
              $continue_label = "#";break;
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
              $continue_label = "#";break;
            // FALLTHROUGH
            case 8:
              $msg = $acc__0[2];
              $p__3 = $acc__0[1];
              $bufput_acc->contents($b, $p__3);
              return $call1($Stdlib[1], $msg);
            // FALLTHROUGH
            case 2:
            // FALLTHROUGH
            case 4:
              $s__0 = $acc__0[2];
              $p__0 = $acc__0[1];
              $bufput_acc->contents($b, $p__0);
              return $call2($Stdlib_buffer[14], $b, $s__0);
            // FALLTHROUGH
            default:
              $c = $acc__0[2];
              $p__1 = $acc__0[1];
              $bufput_acc->contents($b, $p__1);
              return $call2($Stdlib_buffer[10], $b, $c);
            }
          if ($continue_label === "#") {continue;}
        }
      }
    };
    $strput_acc->contents = (dynamic $b, dynamic $acc) : dynamic ==> {
      $acc__1 = null as dynamic;
      $acc__2 = null as dynamic;
      $acc__3 = null as dynamic;
      $bt_ = null as dynamic;
      $bu_ = null as dynamic;
      $bv_ = null as dynamic;
      $c = null as dynamic;
      $f = null as dynamic;
      $fmting_lit = null as dynamic;
      $msg = null as dynamic;
      $p = null as dynamic;
      $p__0 = null as dynamic;
      $p__1 = null as dynamic;
      $p__2 = null as dynamic;
      $p__3 = null as dynamic;
      $s = null as dynamic;
      $s__0 = null as dynamic;
      $acc__0 = $acc;
      for (;;) {
        if ($is_int($acc__0)) {return 0;}
        else {
          $continue_label = null;
          switch($acc__0[0]) {
            // FALLTHROUGH
            case 0:
              $fmting_lit = $acc__0[2];
              $p = $acc__0[1];
              $s = $string_of_formatting_lit($fmting_lit);
              $strput_acc->contents($b, $p);
              return $call2($Stdlib_buffer[14], $b, $s);
            // FALLTHROUGH
            case 1:
              $bt_ = $acc__0[2];
              $bu_ = $acc__0[1];
              if (0 === $bt_[0]) {
                $acc__1 = $bt_[1];
                $strput_acc->contents($b, $bu_);
                $call2($Stdlib_buffer[14], $b, $cst__21);
                $acc__0 = $acc__1;
                $continue_label = "#";break;
              }
              $acc__2 = $bt_[1];
              $strput_acc->contents($b, $bu_);
              $call2($Stdlib_buffer[14], $b, $cst__22);
              $acc__0 = $acc__2;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 6:
              $f = $acc__0[2];
              $p__2 = $acc__0[1];
              $strput_acc->contents($b, $p__2);
              $bv_ = $call1($f, 0);
              return $call2($Stdlib_buffer[14], $b, $bv_);
            // FALLTHROUGH
            case 7:
              $acc__3 = $acc__0[1];
              $acc__0 = $acc__3;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 8:
              $msg = $acc__0[2];
              $p__3 = $acc__0[1];
              $strput_acc->contents($b, $p__3);
              return $call1($Stdlib[1], $msg);
            // FALLTHROUGH
            case 2:
            // FALLTHROUGH
            case 4:
              $s__0 = $acc__0[2];
              $p__0 = $acc__0[1];
              $strput_acc->contents($b, $p__0);
              return $call2($Stdlib_buffer[14], $b, $s__0);
            // FALLTHROUGH
            default:
              $c = $acc__0[2];
              $p__1 = $acc__0[1];
              $strput_acc->contents($b, $p__1);
              return $call2($Stdlib_buffer[10], $b, $c);
            }
          if ($continue_label === "#") {continue;}
        }
      }
    };
    $failwith_message = (dynamic $param) : dynamic ==> {
      $fmt = $param[1];
      $buf = $call1($Stdlib_buffer[1], 256);
      $k = (dynamic $acc) : dynamic ==> {
        $strput_acc->contents($buf, $acc);
        $bs_ = $call1($Stdlib_buffer[2], $buf);
        return $call1($Stdlib[2], $bs_);
      };
      return $make_printf->contents($k, 0, $fmt);
    };
    $open_box_of_string = (dynamic $str) : dynamic ==> {
      $box_type = null as dynamic;
      $bp_ = null as dynamic;
      $bq_ = null as dynamic;
      $indent = null as dynamic;
      $switch__0 = null as dynamic;
      if ($runtime["caml_string_equal"]($str, $cst__23)) {return $v_;}
      $len = $caml_ml_string_length($str);
      $invalid_box = (dynamic $param) : dynamic ==> {
        return $call1($failwith_message($w_), $str);
      };
      $parse_spaces = (dynamic $i) : dynamic ==> {
        $i__1 = null as dynamic;
        $match = null as dynamic;
        $i__0 = $i;
        for (;;) {
          if ($i__0 === $len) {return $i__0;}
          $match = $caml_string_get($str, $i__0);
          if (9 !== $match) {if (32 !== $match) {return $i__0;}}
          $i__1 = (int) ($i__0 + 1) as dynamic;
          $i__0 = $i__1;
          continue;
        }
      };
      $parse_lword = (dynamic $i, dynamic $j) : dynamic ==> {
        $j__1 = null as dynamic;
        $match = null as dynamic;
        $switcher = null as dynamic;
        $j__0 = $j;
        for (;;) {
          if ($j__0 === $len) {return $j__0;}
          $match = $caml_string_get($str, $j__0);
          $switcher = (int) ($match + -97) as dynamic;
          if (25 < $unsigned_right_shift_32($switcher, 0)) {return $j__0;}
          $j__1 = (int) ($j__0 + 1) as dynamic;
          $j__0 = $j__1;
          continue;
        }
      };
      $parse_int = (dynamic $i, dynamic $j) : dynamic ==> {
        $j__1 = null as dynamic;
        $match = null as dynamic;
        $switch__0 = null as dynamic;
        $j__0 = $j;
        for (;;) {
          if ($j__0 === $len) {return $j__0;}
          $match = $caml_string_get($str, $j__0);
          $switch__0 = 48 <= $match
            ? 58 <= $match ? 0 : (1)
            : (45 === $match ? 1 : (0));
          if ($switch__0) {
            $j__1 = (int) ($j__0 + 1) as dynamic;
            $j__0 = $j__1;
            continue;
          }
          return $j__0;
        }
      };
      $wstart = $parse_spaces(0);
      $wend = $parse_lword($wstart, $wstart);
      $box_name = $call3(
        $Stdlib_string[4],
        $str,
        $wstart,
        (int)
        ($wend - $wstart)
      );
      $nstart = $parse_spaces($wend);
      $nend = $parse_int($nstart, $nstart);
      if ($nstart === $nend) {
        $indent = 0 as dynamic;
      }
      else {
        try {
          $bq_ = $runtime["caml_int_of_string"](
            $call3($Stdlib_string[4], $str, $nstart, (int) ($nend - $nstart))
          );
          $indent = $bq_;
        }
        catch(\Throwable $br_) {
          $br_ = $runtime["caml_wrap_exception"]($br_);
          if ($br_[1] !== $Stdlib[7]) {
            throw $caml_wrap_thrown_exception_reraise($br_) as \Throwable;
          }
          $bp_ = $invalid_box(0);
          $indent = $bp_;
        }
      }
      $exp_end = $parse_spaces($nend);
      if ($exp_end !== $len) {$invalid_box(0);}
      if ($caml_string_notequal($box_name, $cst__24)) {
        if ($caml_string_notequal($box_name, $cst_b)) {
          if ($caml_string_notequal($box_name, $cst_h)) {
            if ($caml_string_notequal($box_name, $cst_hov)) {
              if ($caml_string_notequal($box_name, $cst_hv)) {
                if ($caml_string_notequal($box_name, $cst_v)) {
                  $box_type = $invalid_box(0);
                  $switch__0 = 1 as dynamic;
                }
                else {$box_type = 1 as dynamic;$switch__0 = 1 as dynamic;}
              }
              else {$box_type = 2 as dynamic;$switch__0 = 1 as dynamic;}
            }
            else {$box_type = 3 as dynamic;$switch__0 = 1 as dynamic;}
          }
          else {$box_type = 0 as dynamic;$switch__0 = 1 as dynamic;}
        }
        else {$switch__0 = 0 as dynamic;}
      }
      else {$switch__0 = 0 as dynamic;}
      if (! $switch__0) {$box_type = 4 as dynamic;}
      return Vector{0, $indent, $box_type};
    };
    $make_padding_fmt_ebb = (dynamic $pad, dynamic $fmt) : dynamic ==> {
      $s = null as dynamic;
      $s__0 = null as dynamic;
      $w = null as dynamic;
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
    $make_precision_fmt_ebb = (dynamic $prec, dynamic $fmt) : dynamic ==> {
      if ($is_int($prec)) {
        return 0 === $prec ? Vector{0, 0, $fmt} : (Vector{0, 1, $fmt});
      }
      $p = $prec[1];
      return Vector{0, Vector{0, $p}, $fmt};
    };
    $make_padprec_fmt_ebb = (dynamic $pad, dynamic $prec, dynamic $fmt) : dynamic ==> {
      $s = null as dynamic;
      $s__0 = null as dynamic;
      $w = null as dynamic;
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
    $fmt_ebb_of_string = (dynamic $legacy_behavior, dynamic $str) : dynamic ==> {
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
      $flag = null as dynamic;
      $legacy_behavior__0 = null as dynamic;
      if ($legacy_behavior) {
        $flag = $legacy_behavior[1];
        $legacy_behavior__0 = $flag;
      }
      else {$legacy_behavior__0 = 1 as dynamic;}
      $invalid_format_message = (dynamic $str_ind, dynamic $msg) : dynamic ==> {
        return $call3($failwith_message($x_), $str, $str_ind, $msg);
      };
      $unexpected_end_of_format = (dynamic $end_ind) : dynamic ==> {
        return $invalid_format_message($end_ind, $cst_unexpected_end_of_format
        );
      };
      $invalid_nonnull_char_width = (dynamic $str_ind) : dynamic ==> {
        return $invalid_format_message(
          $str_ind,
          $cst_non_zero_widths_are_unsupported_for_c_conversions
        );
      };
      $invalid_format_without = (dynamic $str_ind, dynamic $c, dynamic $s) : dynamic ==> {
        return $call4($failwith_message($y_), $str, $str_ind, $c, $s);
      };
      $expected_character = 
      (dynamic $str_ind, dynamic $expected, dynamic $read) : dynamic ==> {
        return $call4($failwith_message($z_), $str, $str_ind, $expected, $read
        );
      };
      $add_literal = (dynamic $lit_start, dynamic $str_ind, dynamic $fmt) : dynamic ==> {
        $size = (int) ($str_ind - $lit_start) as dynamic;
        return 0 === $size
          ? Vector{0, $fmt}
          : (1 === $size
           ? Vector{0, Vector{12, $caml_string_get($str, $lit_start), $fmt}}
           : (Vector{
            0,
            Vector{
              11,
              $call3($Stdlib_string[4], $str, $lit_start, $size),
              $fmt
            }
          }));
      };
      $parse_literal = 
      (dynamic $lit_start, dynamic $str_ind, dynamic $end_ind) : dynamic ==> {
        $fmt_rest = null as dynamic;
        $fmt_rest__0 = null as dynamic;
        $match = null as dynamic;
        $match__0 = null as dynamic;
        $match__1 = null as dynamic;
        $str_ind__1 = null as dynamic;
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
          $str_ind__1 = (int) ($str_ind__0 + 1) as dynamic;
          $str_ind__0 = $str_ind__1;
          continue;
        }
      };
      $parse = (dynamic $beg_ind, dynamic $end_ind) : dynamic ==> {
        return $parse_literal($beg_ind, $beg_ind, $end_ind);
      };
      $parse_flags = 
      (dynamic $pct_ind, dynamic $str_ind, dynamic $end_ind, dynamic $ign) : dynamic ==> {
        $zero = Vector{0, 0} as dynamic;
        $minus = Vector{0, 0} as dynamic;
        $plus = Vector{0, 0} as dynamic;
        $space = Vector{0, 0} as dynamic;
        $hash = Vector{0, 0} as dynamic;
        $set_flag = (dynamic $str_ind, dynamic $flag) : dynamic ==> {
          $bo_ = null as dynamic;
          $bm_ = $flag[1];
          $bn_ = $bm_ ? ! $legacy_behavior__0 : ($bm_);
          if ($bn_) {
            $bo_ = $caml_string_get($str, $str_ind);
            $call3($failwith_message($A_), $str, $str_ind, $bo_);
          }
          $flag[1] = 1;
          return 0;
        };
        $read_flags = (dynamic $str_ind) : dynamic ==> {
          $match = null as dynamic;
          $str_ind__1 = null as dynamic;
          $str_ind__2 = null as dynamic;
          $str_ind__3 = null as dynamic;
          $str_ind__4 = null as dynamic;
          $str_ind__5 = null as dynamic;
          $switcher = null as dynamic;
          $str_ind__0 = $str_ind;
          for (;;) {
            if ($str_ind__0 === $end_ind) {
              $unexpected_end_of_format($end_ind);
            }
            $match = $caml_string_get($str, $str_ind__0);
            $switcher = (int) ($match + -32) as dynamic;
            if (! (16 < $unsigned_right_shift_32($switcher, 0))) {
              $continue_label = null;
              switch($switcher) {
                // FALLTHROUGH
                case 0:
                  $set_flag($str_ind__0, $space);
                  $str_ind__1 = (int) ($str_ind__0 + 1) as dynamic;
                  $str_ind__0 = $str_ind__1;
                  $continue_label = "#";break;
                // FALLTHROUGH
                case 3:
                  $set_flag($str_ind__0, $hash);
                  $str_ind__2 = (int) ($str_ind__0 + 1) as dynamic;
                  $str_ind__0 = $str_ind__2;
                  $continue_label = "#";break;
                // FALLTHROUGH
                case 11:
                  $set_flag($str_ind__0, $plus);
                  $str_ind__3 = (int) ($str_ind__0 + 1) as dynamic;
                  $str_ind__0 = $str_ind__3;
                  $continue_label = "#";break;
                // FALLTHROUGH
                case 13:
                  $set_flag($str_ind__0, $minus);
                  $str_ind__4 = (int) ($str_ind__0 + 1) as dynamic;
                  $str_ind__0 = $str_ind__4;
                  $continue_label = "#";break;
                // FALLTHROUGH
                case 16:
                  $set_flag($str_ind__0, $zero);
                  $str_ind__5 = (int) ($str_ind__0 + 1) as dynamic;
                  $str_ind__0 = $str_ind__5;
                  $continue_label = "#";break;
                // FALLTHROUGH
                default:break;
                }
              if ($continue_label === "#") {continue;}
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
      $parse_ign = (dynamic $pct_ind, dynamic $str_ind, dynamic $end_ind) : dynamic ==> {
        if ($str_ind === $end_ind) {$unexpected_end_of_format($end_ind);}
        $match = $caml_string_get($str, $str_ind);
        return 95 === $match
          ? $parse_flags($pct_ind, (int) ($str_ind + 1), $end_ind, 1)
          : ($parse_flags($pct_ind, $str_ind, $end_ind, 0));
      };
      $parse_format->contents = (dynamic $pct_ind, dynamic $end_ind) : dynamic ==> {
        return $parse_ign($pct_ind, (int) ($pct_ind + 1), $end_ind);
      };
      $parse_conversion = 
      (dynamic $pct_ind, dynamic $str_ind, dynamic $end_ind, dynamic $plus, dynamic $hash, dynamic $space, dynamic $ign, dynamic $pad, dynamic $prec, dynamic $padprec, dynamic $symb) : dynamic ==> {
        $a0_ = null as dynamic;
        $a1_ = null as dynamic;
        $a2_ = null as dynamic;
        $a3_ = null as dynamic;
        $a4_ = null as dynamic;
        $a5_ = null as dynamic;
        $a6_ = null as dynamic;
        $a7_ = null as dynamic;
        $a8_ = null as dynamic;
        $a9_ = null as dynamic;
        $aE_ = null as dynamic;
        $aF_ = null as dynamic;
        $aG_ = null as dynamic;
        $aH_ = null as dynamic;
        $aI_ = null as dynamic;
        $aJ_ = null as dynamic;
        $aK_ = null as dynamic;
        $aL_ = null as dynamic;
        $aN_ = null as dynamic;
        $aO_ = null as dynamic;
        $aP_ = null as dynamic;
        $aQ_ = null as dynamic;
        $aR_ = null as dynamic;
        $aS_ = null as dynamic;
        $aT_ = null as dynamic;
        $aU_ = null as dynamic;
        $aV_ = null as dynamic;
        $aW_ = null as dynamic;
        $aX_ = null as dynamic;
        $aY_ = null as dynamic;
        $aZ_ = null as dynamic;
        $a__ = null as dynamic;
        $ba_ = null as dynamic;
        $bb_ = null as dynamic;
        $bc_ = null as dynamic;
        $bd_ = null as dynamic;
        $be_ = null as dynamic;
        $bf_ = null as dynamic;
        $bg_ = null as dynamic;
        $bh_ = null as dynamic;
        $bi_ = null as dynamic;
        $bj_ = null as dynamic;
        $bk_ = null as dynamic;
        $bl_ = null as dynamic;
        $char_format = null as dynamic;
        $char_set = null as dynamic;
        $counter = null as dynamic;
        $counter__0 = null as dynamic;
        $fconv = null as dynamic;
        $fmt_rest = null as dynamic;
        $fmt_rest__0 = null as dynamic;
        $fmt_rest__1 = null as dynamic;
        $fmt_rest__10 = null as dynamic;
        $fmt_rest__11 = null as dynamic;
        $fmt_rest__12 = null as dynamic;
        $fmt_rest__13 = null as dynamic;
        $fmt_rest__14 = null as dynamic;
        $fmt_rest__15 = null as dynamic;
        $fmt_rest__16 = null as dynamic;
        $fmt_rest__17 = null as dynamic;
        $fmt_rest__18 = null as dynamic;
        $fmt_rest__19 = null as dynamic;
        $fmt_rest__2 = null as dynamic;
        $fmt_rest__20 = null as dynamic;
        $fmt_rest__21 = null as dynamic;
        $fmt_rest__22 = null as dynamic;
        $fmt_rest__23 = null as dynamic;
        $fmt_rest__24 = null as dynamic;
        $fmt_rest__25 = null as dynamic;
        $fmt_rest__26 = null as dynamic;
        $fmt_rest__3 = null as dynamic;
        $fmt_rest__4 = null as dynamic;
        $fmt_rest__5 = null as dynamic;
        $fmt_rest__6 = null as dynamic;
        $fmt_rest__7 = null as dynamic;
        $fmt_rest__8 = null as dynamic;
        $fmt_rest__9 = null as dynamic;
        $fmt_result = null as dynamic;
        $hash__0 = null as dynamic;
        $iconv = null as dynamic;
        $iconv__0 = null as dynamic;
        $iconv__1 = null as dynamic;
        $iconv__2 = null as dynamic;
        $ignored = null as dynamic;
        $ignored__0 = null as dynamic;
        $ignored__1 = null as dynamic;
        $ignored__10 = null as dynamic;
        $ignored__11 = null as dynamic;
        $ignored__2 = null as dynamic;
        $ignored__3 = null as dynamic;
        $ignored__4 = null as dynamic;
        $ignored__5 = null as dynamic;
        $ignored__6 = null as dynamic;
        $ignored__7 = null as dynamic;
        $ignored__8 = null as dynamic;
        $ignored__9 = null as dynamic;
        $match = null as dynamic;
        $match__0 = null as dynamic;
        $match__1 = null as dynamic;
        $match__10 = null as dynamic;
        $match__11 = null as dynamic;
        $match__12 = null as dynamic;
        $match__13 = null as dynamic;
        $match__14 = null as dynamic;
        $match__15 = null as dynamic;
        $match__16 = null as dynamic;
        $match__17 = null as dynamic;
        $match__18 = null as dynamic;
        $match__19 = null as dynamic;
        $match__2 = null as dynamic;
        $match__20 = null as dynamic;
        $match__21 = null as dynamic;
        $match__22 = null as dynamic;
        $match__23 = null as dynamic;
        $match__24 = null as dynamic;
        $match__25 = null as dynamic;
        $match__26 = null as dynamic;
        $match__27 = null as dynamic;
        $match__28 = null as dynamic;
        $match__29 = null as dynamic;
        $match__3 = null as dynamic;
        $match__30 = null as dynamic;
        $match__4 = null as dynamic;
        $match__5 = null as dynamic;
        $match__6 = null as dynamic;
        $match__7 = null as dynamic;
        $match__8 = null as dynamic;
        $match__9 = null as dynamic;
        $next_ind = null as dynamic;
        $pad__0 = null as dynamic;
        $pad__1 = null as dynamic;
        $pad__10 = null as dynamic;
        $pad__2 = null as dynamic;
        $pad__3 = null as dynamic;
        $pad__4 = null as dynamic;
        $pad__5 = null as dynamic;
        $pad__6 = null as dynamic;
        $pad__7 = null as dynamic;
        $pad__8 = null as dynamic;
        $pad__9 = null as dynamic;
        $plus__0 = null as dynamic;
        $plus__1 = null as dynamic;
        $prec__0 = null as dynamic;
        $prec__1 = null as dynamic;
        $prec__2 = null as dynamic;
        $prec__3 = null as dynamic;
        $prec__4 = null as dynamic;
        $scan_format = null as dynamic;
        $space__0 = null as dynamic;
        $sub_end = null as dynamic;
        $sub_end__0 = null as dynamic;
        $sub_fmt = null as dynamic;
        $sub_fmt__0 = null as dynamic;
        $sub_fmtty = null as dynamic;
        $sub_fmtty__0 = null as dynamic;
        $switch__0 = null as dynamic;
        $switch__1 = null as dynamic;
        $switch__2 = null as dynamic;
        $switch__3 = null as dynamic;
        $switch__4 = null as dynamic;
        $switch__5 = null as dynamic;
        $switcher = null as dynamic;
        $plus_used = Vector{0, 0} as dynamic;
        $hash_used = Vector{0, 0} as dynamic;
        $space_used = Vector{0, 0} as dynamic;
        $ign_used = Vector{0, 0} as dynamic;
        $pad_used = Vector{0, 0} as dynamic;
        $prec_used = Vector{0, 0} as dynamic;
        $get_plus = (dynamic $param) : dynamic ==> {
          $plus_used[1] = 1;
          return $plus;
        };
        $get_hash = (dynamic $param) : dynamic ==> {
          $hash_used[1] = 1;
          return $hash;
        };
        $get_space = (dynamic $param) : dynamic ==> {
          $space_used[1] = 1;
          return $space;
        };
        $get_ign = (dynamic $param) : dynamic ==> {
          $ign_used[1] = 1;
          return $ign;
        };
        $get_pad = (dynamic $param) : dynamic ==> {
          $pad_used[1] = 1;
          return $pad;
        };
        $get_prec = (dynamic $param) : dynamic ==> {
          $prec_used[1] = 1;
          return $prec;
        };
        $get_padprec = (dynamic $param) : dynamic ==> {
          $pad_used[1] = 1;
          return $padprec;
        };
        $get_int_pad = (dynamic $param) : dynamic ==> {
          $n = null as dynamic;
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
               ? $F_
               : ($incompatible_flag->contents(
                $pct_ind,
                $str_ind,
                48,
                $cst_precision__1
              ))
              : ($pad);
          }
        };
        $check_no_0 = (dynamic $symb, dynamic $pad) : dynamic ==> {
          $width = null as dynamic;
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
               ? $G_
               : ($incompatible_flag->contents(
                $pct_ind,
                $str_ind,
                $symb,
                $cst_0__1
              ))
              : ($pad);
          }
        };
        $opt_of_pad = (dynamic $c, dynamic $pad) : dynamic ==> {
          $width = null as dynamic;
          $width__0 = null as dynamic;
          $width__1 = null as dynamic;
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
        $get_pad_opt = (dynamic $c) : dynamic ==> {
          return $opt_of_pad($c, $get_pad(0));
        };
        $get_padprec_opt = (dynamic $c) : dynamic ==> {
          return $opt_of_pad($c, $get_padprec(0));
        };
        $get_prec_opt = (dynamic $param) : dynamic ==> {
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
        if (124 <= $symb) {
          $switch__0 = 0 as dynamic;
        }
        else {
          switch($symb) {
            // FALLTHROUGH
            case 33:
              $match__5 = $parse($str_ind, $end_ind);
              $fmt_rest__5 = $match__5[1];
              $fmt_result = Vector{0, Vector{10, $fmt_rest__5}} as dynamic;
              $switch__0 = 1 as dynamic;
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
                $ignored__2 = Vector{9, $get_pad_opt(95), $sub_fmtty} as dynamic;
                $a3_ = Vector{0, Vector{23, $ignored__2, $fmt_rest__7}} as dynamic;
              }
              else {
                $a3_ = Vector{
                  0,
                  Vector{14, $get_pad_opt(40), $sub_fmtty, $fmt_rest__7}
                } as dynamic;
              }
              $fmt_result = $a3_;
              $switch__0 = 1 as dynamic;
              break;
            // FALLTHROUGH
            case 44:
              $fmt_result = $parse($str_ind, $end_ind);
              $switch__0 = 1 as dynamic;
              break;
            // FALLTHROUGH
            case 67:
              $match__11 = $parse($str_ind, $end_ind);
              $fmt_rest__10 = $match__11[1];
              $a5_ = $get_ign(0)
                ? Vector{0, Vector{23, 1, $fmt_rest__10}}
                : (Vector{0, Vector{1, $fmt_rest__10}});
              $fmt_result = $a5_;
              $switch__0 = 1 as dynamic;
              break;
            // FALLTHROUGH
            case 78:
              $match__15 = $parse($str_ind, $end_ind);
              $fmt_rest__14 = $match__15[1];
              $counter__0 = 2 as dynamic;
              if ($get_ign(0)) {
                $ignored__6 = Vector{11, $counter__0} as dynamic;
                $ba_ = Vector{0, Vector{23, $ignored__6, $fmt_rest__14}} as dynamic;
              }
              else {
                $ba_ = Vector{0, Vector{21, $counter__0, $fmt_rest__14}} as dynamic;
              }
              $fmt_result = $ba_;
              $switch__0 = 1 as dynamic;
              break;
            // FALLTHROUGH
            case 83:
              $pad__6 = $check_no_0($symb, $get_padprec(0));
              $match__16 = $parse($str_ind, $end_ind);
              $fmt_rest__15 = $match__16[1];
              if ($get_ign(0)) {
                $ignored__7 = Vector{1, $get_padprec_opt(95)} as dynamic;
                $bb_ = Vector{0, Vector{23, $ignored__7, $fmt_rest__15}} as dynamic;
              }
              else {
                $match__17 = $make_padding_fmt_ebb($pad__6, $fmt_rest__15);
                $fmt_rest__16 = $match__17[2];
                $pad__7 = $match__17[1];
                $bb_ = Vector{0, Vector{3, $pad__7, $fmt_rest__16}} as dynamic;
              }
              $fmt_result = $bb_;
              $switch__0 = 1 as dynamic;
              break;
            // FALLTHROUGH
            case 91:
              $match__20 = $parse_char_set->contents($str_ind, $end_ind);
              $char_set = $match__20[2];
              $next_ind = $match__20[1];
              $match__21 = $parse($next_ind, $end_ind);
              $fmt_rest__19 = $match__21[1];
              if ($get_ign(0)) {
                $ignored__9 = Vector{10, $get_pad_opt(95), $char_set} as dynamic;
                $bg_ = Vector{0, Vector{23, $ignored__9, $fmt_rest__19}} as dynamic;
              }
              else {
                $bg_ = Vector{
                  0,
                  Vector{20, $get_pad_opt(91), $char_set, $fmt_rest__19}
                } as dynamic;
              }
              $fmt_result = $bg_;
              $switch__0 = 1 as dynamic;
              break;
            // FALLTHROUGH
            case 97:
              $match__22 = $parse($str_ind, $end_ind);
              $fmt_rest__20 = $match__22[1];
              $fmt_result = Vector{0, Vector{15, $fmt_rest__20}} as dynamic;
              $switch__0 = 1 as dynamic;
              break;
            // FALLTHROUGH
            case 99:
              $char_format = (dynamic $fmt_rest) : dynamic ==> {
                return $get_ign(0)
                  ? Vector{0, Vector{23, 0, $fmt_rest}}
                  : (Vector{0, Vector{0, $fmt_rest}});
              };
              $scan_format = (dynamic $fmt_rest) : dynamic ==> {
                return $get_ign(0)
                  ? Vector{0, Vector{23, 3, $fmt_rest}}
                  : (Vector{0, Vector{22, $fmt_rest}});
              };
              $match__23 = $parse($str_ind, $end_ind);
              $fmt_rest__21 = $match__23[1];
              $match__24 = $get_pad_opt(99);
              if ($match__24) {
                $bh_ = 0 === $match__24[1]
                  ? $scan_format($fmt_rest__21)
                  : ($legacy_behavior__0
                   ? $char_format($fmt_rest__21)
                   : ($invalid_nonnull_char_width($str_ind)));
                $bi_ = $bh_;
              }
              else {$bi_ = $char_format($fmt_rest__21);}
              $fmt_result = $bi_;
              $switch__0 = 1 as dynamic;
              break;
            // FALLTHROUGH
            case 114:
              $match__25 = $parse($str_ind, $end_ind);
              $fmt_rest__22 = $match__25[1];
              $bj_ = $get_ign(0)
                ? Vector{0, Vector{23, 2, $fmt_rest__22}}
                : (Vector{0, Vector{19, $fmt_rest__22}});
              $fmt_result = $bj_;
              $switch__0 = 1 as dynamic;
              break;
            // FALLTHROUGH
            case 115:
              $pad__9 = $check_no_0($symb, $get_padprec(0));
              $match__26 = $parse($str_ind, $end_ind);
              $fmt_rest__23 = $match__26[1];
              if ($get_ign(0)) {
                $ignored__10 = Vector{0, $get_padprec_opt(95)} as dynamic;
                $bk_ = Vector{0, Vector{23, $ignored__10, $fmt_rest__23}} as dynamic;
              }
              else {
                $match__27 = $make_padding_fmt_ebb($pad__9, $fmt_rest__23);
                $fmt_rest__24 = $match__27[2];
                $pad__10 = $match__27[1];
                $bk_ = Vector{0, Vector{2, $pad__10, $fmt_rest__24}} as dynamic;
              }
              $fmt_result = $bk_;
              $switch__0 = 1 as dynamic;
              break;
            // FALLTHROUGH
            case 116:
              $match__28 = $parse($str_ind, $end_ind);
              $fmt_rest__25 = $match__28[1];
              $fmt_result = Vector{0, Vector{16, $fmt_rest__25}} as dynamic;
              $switch__0 = 1 as dynamic;
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
                $ignored__11 = Vector{8, $get_pad_opt(95), $sub_fmtty__0} as dynamic;
                $bl_ = Vector{0, Vector{23, $ignored__11, $fmt_rest__26}} as dynamic;
              }
              else {
                $bl_ = Vector{
                  0,
                  Vector{13, $get_pad_opt(123), $sub_fmtty__0, $fmt_rest__26}
                } as dynamic;
              }
              $fmt_result = $bl_;
              $switch__0 = 1 as dynamic;
              break;
            // FALLTHROUGH
            case 66:
            // FALLTHROUGH
            case 98:
              $pad__3 = $check_no_0($symb, $get_padprec(0));
              $match__9 = $parse($str_ind, $end_ind);
              $fmt_rest__8 = $match__9[1];
              if ($get_ign(0)) {
                $ignored__3 = Vector{7, $get_padprec_opt(95)} as dynamic;
                $a4_ = Vector{0, Vector{23, $ignored__3, $fmt_rest__8}} as dynamic;
              }
              else {
                $match__10 = $make_padding_fmt_ebb($pad__3, $fmt_rest__8);
                $fmt_rest__9 = $match__10[2];
                $pad__4 = $match__10[1];
                $a4_ = Vector{0, Vector{9, $pad__4, $fmt_rest__9}} as dynamic;
              }
              $fmt_result = $a4_;
              $switch__0 = 1 as dynamic;
              break;
            // FALLTHROUGH
            case 37:
            // FALLTHROUGH
            case 64:
              $match__6 = $parse($str_ind, $end_ind);
              $fmt_rest__6 = $match__6[1];
              $fmt_result = Vector{0, Vector{12, $symb, $fmt_rest__6}} as dynamic;
              $switch__0 = 1 as dynamic;
              break;
            // FALLTHROUGH
            case 76:
            // FALLTHROUGH
            case 108:
            // FALLTHROUGH
            case 110:
              if ($str_ind === $end_ind) {$switch__1 = 1 as dynamic;
              }
              else {
                if ($is_int_base->contents($caml_string_get($str, $str_ind))) {$switch__0 = 0 as dynamic;$switch__1 = 0 as dynamic;}
                else {$switch__1 = 1 as dynamic;}
              }
              if ($switch__1) {
                $match__14 = $parse($str_ind, $end_ind);
                $fmt_rest__13 = $match__14[1];
                $counter = $counter_of_char->contents($symb);
                if ($get_ign(0)) {
                  $ignored__5 = Vector{11, $counter} as dynamic;
                  $a__ = Vector{0, Vector{23, $ignored__5, $fmt_rest__13}} as dynamic;
                }
                else {
                  $a__ = Vector{0, Vector{21, $counter, $fmt_rest__13}} as dynamic;
                }
                $fmt_result = $a__;
                $switch__0 = 1 as dynamic;
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
                $failwith_message($K_),
                $str,
                $pct_ind,
                $symb
              );
              $switch__0 = 1 as dynamic;
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
              $bc_ = $get_space(0);
              $bd_ = $get_hash(0);
              $iconv__2 = $compute_int_conv->contents(
                $pct_ind,
                $str_ind,
                $get_plus(0),
                $bd_,
                $bc_,
                $symb
              );
              $match__18 = $parse($str_ind, $end_ind);
              $fmt_rest__17 = $match__18[1];
              if ($get_ign(0)) {
                $ignored__8 = Vector{2, $iconv__2, $get_pad_opt(95)} as dynamic;
                $be_ = Vector{0, Vector{23, $ignored__8, $fmt_rest__17}} as dynamic;
              }
              else {
                $bf_ = $get_prec(0);
                $match__19 = $make_padprec_fmt_ebb(
                  $get_int_pad(0),
                  $bf_,
                  $fmt_rest__17
                );
                $fmt_rest__18 = $match__19[3];
                $prec__4 = $match__19[2];
                $pad__8 = $match__19[1];
                $be_ = Vector{
                  0,
                  Vector{4, $iconv__2, $pad__8, $prec__4, $fmt_rest__18}
                } as dynamic;
              }
              $fmt_result = $be_;
              $switch__0 = 1 as dynamic;
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
              $a6_ = $get_space(0);
              $fconv = $compute_float_conv->contents(
                $pct_ind,
                $str_ind,
                $get_plus(0),
                $a6_,
                $symb
              );
              $match__12 = $parse($str_ind, $end_ind);
              $fmt_rest__11 = $match__12[1];
              if ($get_ign(0)) {
                $a7_ = $get_prec_opt(0);
                $ignored__4 = Vector{6, $get_pad_opt(95), $a7_} as dynamic;
                $a8_ = Vector{0, Vector{23, $ignored__4, $fmt_rest__11}} as dynamic;
              }
              else {
                $a9_ = $get_prec(0);
                $match__13 = $make_padprec_fmt_ebb(
                  $get_pad(0),
                  $a9_,
                  $fmt_rest__11
                );
                $fmt_rest__12 = $match__13[3];
                $prec__3 = $match__13[2];
                $pad__5 = $match__13[1];
                $a8_ = Vector{
                  0,
                  Vector{8, $fconv, $pad__5, $prec__3, $fmt_rest__12}
                } as dynamic;
              }
              $fmt_result = $a8_;
              $switch__0 = 1 as dynamic;
              break;
            // FALLTHROUGH
            default:
              $switch__0 = 0 as dynamic;
            }
        }
        if (! $switch__0) {
          if (108 <= $symb) {
            if (111 <= $symb) {
              $switch__2 = 0 as dynamic;
            }
            else {
              $switcher = (int) ($symb + -108) as dynamic;
              switch($switcher) {
                // FALLTHROUGH
                case 0:
                  $aN_ = $caml_string_get($str, $str_ind);
                  $aO_ = $get_space(0);
                  $aP_ = $get_hash(0);
                  $iconv = $compute_int_conv->contents(
                    $pct_ind,
                    (int)
                    ($str_ind + 1),
                    $get_plus(0),
                    $aP_,
                    $aO_,
                    $aN_
                  );
                  $match = $parse((int) ($str_ind + 1), $end_ind);
                  $fmt_rest = $match[1];
                  if ($get_ign(0)) {
                    $ignored = Vector{3, $iconv, $get_pad_opt(95)} as dynamic;
                    $aQ_ = Vector{0, Vector{23, $ignored, $fmt_rest}} as dynamic;
                  }
                  else {
                    $aS_ = $get_prec(0);
                    $match__0 = $make_padprec_fmt_ebb(
                      $get_int_pad(0),
                      $aS_,
                      $fmt_rest
                    );
                    $fmt_rest__0 = $match__0[3];
                    $prec__0 = $match__0[2];
                    $pad__0 = $match__0[1];
                    $aQ_ = Vector{
                      0,
                      Vector{5, $iconv, $pad__0, $prec__0, $fmt_rest__0}
                    } as dynamic;
                  }
                  $aR_ = $aQ_;
                  $switch__3 = 1 as dynamic;
                  break;
                // FALLTHROUGH
                case 1:
                  $switch__2 = 0 as dynamic;
                  $switch__3 = 0 as dynamic;
                  break;
                // FALLTHROUGH
                default:
                  $aT_ = $caml_string_get($str, $str_ind);
                  $aU_ = $get_space(0);
                  $aV_ = $get_hash(0);
                  $iconv__0 = $compute_int_conv->contents(
                    $pct_ind,
                    (int)
                    ($str_ind + 1),
                    $get_plus(0),
                    $aV_,
                    $aU_,
                    $aT_
                  );
                  $match__1 = $parse((int) ($str_ind + 1), $end_ind);
                  $fmt_rest__1 = $match__1[1];
                  if ($get_ign(0)) {
                    $ignored__0 = Vector{4, $iconv__0, $get_pad_opt(95)} as dynamic;
                    $aW_ = Vector{0, Vector{23, $ignored__0, $fmt_rest__1}} as dynamic;
                  }
                  else {
                    $aX_ = $get_prec(0);
                    $match__2 = $make_padprec_fmt_ebb(
                      $get_int_pad(0),
                      $aX_,
                      $fmt_rest__1
                    );
                    $fmt_rest__2 = $match__2[3];
                    $prec__1 = $match__2[2];
                    $pad__1 = $match__2[1];
                    $aW_ = Vector{
                      0,
                      Vector{6, $iconv__0, $pad__1, $prec__1, $fmt_rest__2}
                    } as dynamic;
                  }
                  $aR_ = $aW_;
                  $switch__3 = 1 as dynamic;
                }
              if ($switch__3) {$fmt_result = $aR_;$switch__2 = 1 as dynamic;}
            }
          }
          else {
            if (76 === $symb) {
              $aY_ = $caml_string_get($str, $str_ind);
              $aZ_ = $get_space(0);
              $a0_ = $get_hash(0);
              $iconv__1 = $compute_int_conv->contents(
                $pct_ind,
                (int)
                ($str_ind + 1),
                $get_plus(0),
                $a0_,
                $aZ_,
                $aY_
              );
              $match__3 = $parse((int) ($str_ind + 1), $end_ind);
              $fmt_rest__3 = $match__3[1];
              if ($get_ign(0)) {
                $ignored__1 = Vector{5, $iconv__1, $get_pad_opt(95)} as dynamic;
                $a1_ = Vector{0, Vector{23, $ignored__1, $fmt_rest__3}} as dynamic;
              }
              else {
                $a2_ = $get_prec(0);
                $match__4 = $make_padprec_fmt_ebb(
                  $get_int_pad(0),
                  $a2_,
                  $fmt_rest__3
                );
                $fmt_rest__4 = $match__4[3];
                $prec__2 = $match__4[2];
                $pad__2 = $match__4[1];
                $a1_ = Vector{
                  0,
                  Vector{7, $iconv__1, $pad__2, $prec__2, $fmt_rest__4}
                } as dynamic;
              }
              $fmt_result = $a1_;
              $switch__2 = 1 as dynamic;
            }
            else {$switch__2 = 0 as dynamic;}
          }
          if (! $switch__2) {
            $fmt_result = $call3(
              $failwith_message($H_),
              $str,
              (int)
              ($str_ind + -1),
              $symb
            );
          }
        }
        if (! $legacy_behavior__0) {
          $aE_ = ! $plus_used[1];
          $plus__0 = $aE_ ? $plus : ($aE_);
          if ($plus__0) {
            $incompatible_flag->contents($pct_ind, $str_ind, $symb, $cst__28);
          }
          $aF_ = ! $hash_used[1];
          $hash__0 = $aF_ ? $hash : ($aF_);
          if ($hash__0) {
            $incompatible_flag->contents($pct_ind, $str_ind, $symb, $cst__29);
          }
          $aG_ = ! $space_used[1];
          $space__0 = $aG_ ? $space : ($aG_);
          if ($space__0) {
            $incompatible_flag->contents($pct_ind, $str_ind, $symb, $cst__30);
          }
          $aH_ = ! $pad_used[1];
          $aI_ = $aH_ ? $caml_notequal(Vector{0, $pad}, $I_) : ($aH_);
          if ($aI_) {
            $incompatible_flag->contents(
              $pct_ind,
              $str_ind,
              $symb,
              $cst_padding__0
            );
          }
          $aJ_ = ! $prec_used[1];
          $aK_ = $aJ_ ? $caml_notequal(Vector{0, $prec}, $J_) : ($aJ_);
          if ($aK_) {
            $aL_ = $ign ? 95 : ($symb);
            $incompatible_flag->contents(
              $pct_ind,
              $str_ind,
              $aL_,
              $cst_precision__2
            );
          }
          $plus__1 = $ign ? $plus : ($ign);
          if ($plus__1) {
            $incompatible_flag->contents($pct_ind, $str_ind, 95, $cst__31);
          }
        }
        $aM_ = ! $ign_used[1];
        $ign__0 = $aM_ ? $ign : ($aM_);
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
      $parse_after_precision = 
      (dynamic $pct_ind, dynamic $str_ind, dynamic $end_ind, dynamic $minus, dynamic $plus, dynamic $hash, dynamic $space, dynamic $ign, dynamic $pad, dynamic $match) : dynamic ==> {
        $n = null as dynamic;
        $n__0 = null as dynamic;
        if ($str_ind === $end_ind) {$unexpected_end_of_format($end_ind);}
        $parse_conv = (dynamic $padprec) : dynamic ==> {
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
            if ($is_int($match)) {return $parse_conv($D_);}
            $n = $match[1];
            return $parse_conv(Vector{0, 1, $n});
          }
          if ($is_int($match)) {return $parse_conv($E_);}
          $n__0 = $match[1];
          return $parse_conv(Vector{0, 0, $n__0});
        }
        return $parse_conv($pad);
      };
      $parse_precision = 
      (dynamic $pct_ind, dynamic $str_ind, dynamic $end_ind, dynamic $minus, dynamic $plus, dynamic $hash, dynamic $space, dynamic $ign, dynamic $pad) : dynamic ==> {
        $aD_ = null as dynamic;
        $minus__0 = null as dynamic;
        $switcher = null as dynamic;
        if ($str_ind === $end_ind) {$unexpected_end_of_format($end_ind);}
        $parse_literal = (dynamic $minus, dynamic $str_ind) : dynamic ==> {
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
            $switcher = (int) ($symb + -42) as dynamic;
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
                  $aD_ = (int) ($str_ind + 1) as dynamic;
                  $minus__0 = $minus ? $minus : (45 === $symb ? 1 : (0));
                  return $parse_literal($minus__0, $aD_);
                }
                break;
              // FALLTHROUGH
              default:break;
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
           $C_
         )
          : ($invalid_format_without((int) ($str_ind + -1), 46, $cst_precision
         ));
      };
      $parse_after_padding = 
      (dynamic $pct_ind, dynamic $str_ind, dynamic $end_ind, dynamic $minus, dynamic $plus, dynamic $hash, dynamic $space, dynamic $ign, dynamic $pad) : dynamic ==> {
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
      $parse_padding->contents = 
      (dynamic $pct_ind, dynamic $str_ind, dynamic $end_ind, dynamic $zero, dynamic $minus, dynamic $plus, dynamic $hash, dynamic $space, dynamic $ign) : dynamic ==> {
        $match__0 = null as dynamic;
        $new_ind = null as dynamic;
        $width = null as dynamic;
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
            if (! $legacy_behavior__0) {
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
              $B_
            );
          }
      };
      $parse_magic_size = (dynamic $str_ind, dynamic $end_ind) : dynamic ==> {
        $aA_ = null as dynamic;
        $aB_ = null as dynamic;
        $az_ = null as dynamic;
        $fmt_rest = null as dynamic;
        $formatting_lit = null as dynamic;
        $match = null as dynamic;
        $match__0 = null as dynamic;
        $match__2 = null as dynamic;
        $match__3 = null as dynamic;
        $next_ind = null as dynamic;
        $s = null as dynamic;
        $size = null as dynamic;
        $str_ind_1 = null as dynamic;
        $str_ind_2 = null as dynamic;
        $str_ind_3 = null as dynamic;
        $switch__0 = null as dynamic;
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
              throw $caml_wrap_thrown_exception($Stdlib[8]) as \Throwable;
            }
            $s = $call3(
              $Stdlib_string[4],
              $str,
              (int)
              ($str_ind + -2),
              (int)
              ((int) ($str_ind_3 - $str_ind) + 3)
            );
            $aB_ = Vector{
              0,
              Vector{0, (int) ($str_ind_3 + 1), Vector{1, $s, $size}}
            } as dynamic;
          }
          else {$aB_ = 0 as dynamic;}
          $aA_ = $aB_;
        }
        catch(\Throwable $aC_) {
          $aC_ = $runtime["caml_wrap_exception"]($aC_);
          if ($aC_ !== $Stdlib[8]) {
            if ($aC_[1] !== $Stdlib[7]) {
              throw $caml_wrap_thrown_exception_reraise($aC_) as \Throwable;
            }
          }
          $az_ = 0 as dynamic;
          $aA_ = $az_;
        }
        if ($aA_) {
          $match = $aA_[1];
          $formatting_lit = $match[2];
          $next_ind = $match[1];
          $match__0 = $parse($next_ind, $end_ind);
          $fmt_rest = $match__0[1];
          return Vector{0, Vector{17, $formatting_lit, $fmt_rest}};
        }
        $match__1 = $parse($str_ind, $end_ind);
        $fmt_rest__0 = $match__1[1];
        return Vector{0, Vector{17, $O_, $fmt_rest__0}};
      };
      $parse_good_break = (dynamic $str_ind, dynamic $end_ind) : dynamic ==> {
        $as_ = null as dynamic;
        $at_ = null as dynamic;
        $au_ = null as dynamic;
        $av_ = null as dynamic;
        $aw_ = null as dynamic;
        $ax_ = null as dynamic;
        $formatting_lit__0 = null as dynamic;
        $match__0 = null as dynamic;
        $match__1 = null as dynamic;
        $match__2 = null as dynamic;
        $match__3 = null as dynamic;
        $next_ind = null as dynamic;
        $offset = null as dynamic;
        $s = null as dynamic;
        $s__0 = null as dynamic;
        $str_ind_1 = null as dynamic;
        $str_ind_2 = null as dynamic;
        $str_ind_3 = null as dynamic;
        $str_ind_4 = null as dynamic;
        $str_ind_5 = null as dynamic;
        $switch__0 = null as dynamic;
        $switch__1 = null as dynamic;
        $switcher = null as dynamic;
        $switcher__0 = null as dynamic;
        $width = null as dynamic;
        try {
          $as_ = $str_ind === $end_ind ? 1 : (0);
          $at_ = $as_
            ? $as_
            : (60 !== $caml_string_get($str, $str_ind) ? 1 : (0));
          if ($at_) {
            throw $caml_wrap_thrown_exception($Stdlib[8]) as \Throwable;
          }
          $str_ind_1 = $parse_spaces->contents((int) ($str_ind + 1), $end_ind);
          $match__0 = $caml_string_get($str, $str_ind_1);
          $switch__0 = 48 <= $match__0
            ? 58 <= $match__0 ? 0 : (1)
            : (45 === $match__0 ? 1 : (0));
          if (! $switch__0) {
            throw $caml_wrap_thrown_exception($Stdlib[8]) as \Throwable;
          }
          $match__1 = $parse_integer->contents($str_ind_1, $end_ind);
          $width = $match__1[2];
          $str_ind_2 = $match__1[1];
          $str_ind_3 = $parse_spaces->contents($str_ind_2, $end_ind);
          $match__2 = $caml_string_get($str, $str_ind_3);
          $switcher = (int) ($match__2 + -45) as dynamic;
          if (12 < $unsigned_right_shift_32($switcher, 0)) {
            if (17 === $switcher) {
              $s = $call3(
                $Stdlib_string[4],
                $str,
                (int)
                ($str_ind + -2),
                (int)
                ((int) ($str_ind_3 - $str_ind) + 3)
              );
              $au_ = Vector{0, $s, $width, 0} as dynamic;
              $av_ = (int) ($str_ind_3 + 1) as dynamic;
              $next_ind = $av_;
              $formatting_lit__0 = $au_;
              $switch__1 = 1 as dynamic;
            }
            else {$switch__1 = 0 as dynamic;}
          }
          else {
            $switcher__0 = (int) ($switcher + -1) as dynamic;
            if (1 < $unsigned_right_shift_32($switcher__0, 0)) {
              $match__3 = $parse_integer->contents($str_ind_3, $end_ind);
              $offset = $match__3[2];
              $str_ind_4 = $match__3[1];
              $str_ind_5 = $parse_spaces->contents($str_ind_4, $end_ind);
              if (62 !== $caml_string_get($str, $str_ind_5)) {
                throw $caml_wrap_thrown_exception($Stdlib[8]) as \Throwable;
              }
              $s__0 = $call3(
                $Stdlib_string[4],
                $str,
                (int)
                ($str_ind + -2),
                (int)
                ((int) ($str_ind_5 - $str_ind) + 3)
              );
              $aw_ = Vector{0, $s__0, $width, $offset} as dynamic;
              $ax_ = (int) ($str_ind_5 + 1) as dynamic;
              $next_ind = $ax_;
              $formatting_lit__0 = $aw_;
              $switch__1 = 1 as dynamic;
            }
            else {$switch__1 = 0 as dynamic;}
          }
          if (! $switch__1) {
            throw $caml_wrap_thrown_exception($Stdlib[8]) as \Throwable;
          }
        }
        catch(\Throwable $ay_) {
          $ay_ = $runtime["caml_wrap_exception"]($ay_);
          if ($ay_ !== $Stdlib[8]) {
            if ($ay_[1] !== $Stdlib[7]) {
              throw $caml_wrap_thrown_exception_reraise($ay_) as \Throwable;
            }
          }
          $next_ind = $str_ind;
          $formatting_lit__0 = $formatting_lit;
        }
        $match = $parse($next_ind, $end_ind);
        $fmt_rest = $match[1];
        return Vector{0, Vector{17, $formatting_lit__0, $fmt_rest}};
      };
      $parse_tag = (dynamic $is_open_tag, dynamic $str_ind, dynamic $end_ind) : dynamic ==> {
        $aq_ = null as dynamic;
        $fmt_rest = null as dynamic;
        $fmt_rest__0 = null as dynamic;
        $formatting = null as dynamic;
        $formatting__0 = null as dynamic;
        $ind = null as dynamic;
        $match = null as dynamic;
        $match__0 = null as dynamic;
        $match__1 = null as dynamic;
        $match__2 = null as dynamic;
        $sub_fmt = null as dynamic;
        $sub_format__0 = null as dynamic;
        $sub_str = null as dynamic;
        try {
          if ($str_ind === $end_ind) {
            throw $caml_wrap_thrown_exception($Stdlib[8]) as \Throwable;
          }
          $match__0 = $caml_string_get($str, $str_ind);
          if (60 === $match__0) {
            $ind = $call3($Stdlib_string[18], $str, (int) ($str_ind + 1), 62);
            if ($end_ind <= $ind) {
              throw $caml_wrap_thrown_exception($Stdlib[8]) as \Throwable;
            }
            $sub_str = $call3(
              $Stdlib_string[4],
              $str,
              $str_ind,
              (int)
              ((int) ($ind - $str_ind) + 1)
            );
            $match__1 = $parse((int) ($ind + 1), $end_ind);
            $fmt_rest__0 = $match__1[1];
            $match__2 = $parse($str_ind, (int) ($ind + 1));
            $sub_fmt = $match__2[1];
            $sub_format__0 = Vector{0, $sub_fmt, $sub_str} as dynamic;
            if ($is_open_tag) {
              $formatting__0 = Vector{0, $sub_format__0} as dynamic;
            }
            else {
              $check_open_box->contents($sub_fmt);
              $formatting__0 = Vector{1, $sub_format__0} as dynamic;
            }
            $aq_ = Vector{0, Vector{18, $formatting__0, $fmt_rest__0}} as dynamic;
            return $aq_;
          }
          throw $caml_wrap_thrown_exception($Stdlib[8]) as \Throwable;
        }
        catch(\Throwable $ar_) {
          $ar_ = $runtime["caml_wrap_exception"]($ar_);
          if ($ar_ === $Stdlib[8]) {
            $match = $parse($str_ind, $end_ind);
            $fmt_rest = $match[1];
            $formatting = $is_open_tag
              ? Vector{0, $sub_format}
              : (Vector{1, $sub_format});
            return Vector{0, Vector{18, $formatting, $fmt_rest}};
          }
          throw $caml_wrap_thrown_exception_reraise($ar_) as \Throwable;
        }
      };
      $parse_after_at->contents = (dynamic $str_ind, dynamic $end_ind) : dynamic ==> {
        $fmt_rest__0 = null as dynamic;
        $fmt_rest__1 = null as dynamic;
        $fmt_rest__2 = null as dynamic;
        $fmt_rest__3 = null as dynamic;
        $fmt_rest__4 = null as dynamic;
        $fmt_rest__5 = null as dynamic;
        $fmt_rest__6 = null as dynamic;
        $fmt_rest__7 = null as dynamic;
        $fmt_rest__8 = null as dynamic;
        $fmt_rest__9 = null as dynamic;
        $match__0 = null as dynamic;
        $match__1 = null as dynamic;
        $match__2 = null as dynamic;
        $match__3 = null as dynamic;
        $match__4 = null as dynamic;
        $match__5 = null as dynamic;
        $match__6 = null as dynamic;
        $match__7 = null as dynamic;
        $match__8 = null as dynamic;
        $match__9 = null as dynamic;
        $switcher = null as dynamic;
        $switcher__0 = null as dynamic;
        $switcher__1 = null as dynamic;
        if ($str_ind === $end_ind) {return $L_;}
        $c = $caml_string_get($str, $str_ind);
        if (65 <= $c) {
          if (94 <= $c) {
            $switcher = (int) ($c + -123) as dynamic;
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
              $switcher__0 = (int) ($c + -91) as dynamic;
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
            $switcher__1 = (int) ($c + -32) as dynamic;
            switch($switcher__1) {
              // FALLTHROUGH
              case 0:
                $match__3 = $parse((int) ($str_ind + 1), $end_ind);
                $fmt_rest__3 = $match__3[1];
                return Vector{0, Vector{17, $M_, $fmt_rest__3}};
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
                return Vector{0, Vector{17, $N_, $fmt_rest__6}};
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
              // FALLTHROUGH
              default:break;
              }
          }
        }
        $match = $parse((int) ($str_ind + 1), $end_ind);
        $fmt_rest = $match[1];
        return Vector{0, Vector{17, Vector{2, $c}, $fmt_rest}};
      };
      $check_open_box->contents = (dynamic $fmt) : dynamic ==> {
        $ao_ = null as dynamic;
        $str = null as dynamic;
        if (! $is_int($fmt) && 11 === $fmt[0]) {
          if ($is_int($fmt[2])) {
            $str = $fmt[1];
            try {$open_box_of_string($str);$ao_ = 0 as dynamic;return $ao_;}
            catch(\Throwable $ap_) {
              $ap_ = $runtime["caml_wrap_exception"]($ap_);
              if ($ap_[1] === $Stdlib[7]) {return 0;}
              throw $caml_wrap_thrown_exception_reraise($ap_) as \Throwable;
            }
          }
        }
        return 0;
      };
      $parse_char_set->contents = (dynamic $str_ind, dynamic $end_ind) : dynamic ==> {
        $parse_char_set_after_char__0 = new Ref();
        $parse_char_set_after_minus = new Ref();
        $ah_ = null as dynamic;
        $reverse = null as dynamic;
        $reverse__0 = null as dynamic;
        $str_ind__0 = null as dynamic;
        $str_ind__1 = null as dynamic;
        if ($str_ind === $end_ind) {$unexpected_end_of_format($end_ind);}
        $char_set = $create_char_set(0);
        $add_char = (dynamic $c) : dynamic ==> {
          return $add_in_char_set($char_set, $c);
        };
        $add_range = (dynamic $c__0, dynamic $c) : dynamic ==> {
          $an_ = null as dynamic;
          $i = null as dynamic;
          if (! ($c < $c__0)) {
            $i = $c__0;
            for (;;) {
              $add_in_char_set($char_set, $call1($Stdlib[29], $i));
              $an_ = (int) ($i + 1) as dynamic;
              if ($c !== $i) {$i = $an_;continue;}
              break;
            }
          }
          return 0;
        };
        $fail_single_percent = (dynamic $str_ind) : dynamic ==> {
          return $call2($failwith_message($P_), $str, $str_ind);
        };
        $parse_char_set_content = 
        (dynamic $counter, dynamic $str_ind, dynamic $end_ind) : dynamic ==> {
          $am_ = null as dynamic;
          $c = null as dynamic;
          $counter__0 = null as dynamic;
          $str_ind__1 = null as dynamic;
          $str_ind__0 = $str_ind;
          for (;;) {
            if ($str_ind__0 === $end_ind) {
              $unexpected_end_of_format($end_ind);
            }
            $c = $caml_string_get($str, $str_ind__0);
            if (45 === $c) {
              $add_char(45);
              $str_ind__1 = (int) ($str_ind__0 + 1) as dynamic;
              $str_ind__0 = $str_ind__1;
              continue;
            }
            if (93 === $c) {return (int) ($str_ind__0 + 1);}
            $am_ = (int) ($str_ind__0 + 1) as dynamic;
            if ($counter < 50) {
              $counter__0 = (int) ($counter + 1) as dynamic;
              return $parse_char_set_after_char__0->contents(
                $counter__0,
                $am_,
                $end_ind,
                $c
              );
            }
            return $caml_trampoline_return(
              $parse_char_set_after_char__0->contents,
              varray[0,$am_,$end_ind,$c]
            );
          }
        };
        $parse_char_set_after_char__0->contents = 
        (dynamic $counter, dynamic $str_ind, dynamic $end_ind, dynamic $c) : dynamic ==> {
          $ak_ = null as dynamic;
          $al_ = null as dynamic;
          $c__1 = null as dynamic;
          $counter__0 = null as dynamic;
          $counter__1 = null as dynamic;
          $str_ind__1 = null as dynamic;
          $switch__0 = null as dynamic;
          $str_ind__0 = $str_ind;
          $c__0 = $c;
          for (;;) {
            if ($str_ind__0 === $end_ind) {
              $unexpected_end_of_format($end_ind);
            }
            $c__1 = $caml_string_get($str, $str_ind__0);
            if (46 <= $c__1) {
              if (64 === $c__1) {
                $switch__0 = 0 as dynamic;
              }
              else {
                if (93 === $c__1) {
                  $add_char($c__0);
                  return (int) ($str_ind__0 + 1);
                }
                $switch__0 = 1 as dynamic;
              }
            }
            else {
              if (37 === $c__1) {
                $switch__0 = 0 as dynamic;
              }
              else {
                if (45 <= $c__1) {
                  $al_ = (int) ($str_ind__0 + 1) as dynamic;
                  if ($counter < 50) {
                    $counter__0 = (int) ($counter + 1) as dynamic;
                    return $parse_char_set_after_minus->contents(
                      $counter__0,
                      $al_,
                      $end_ind,
                      $c__0
                    );
                  }
                  return $caml_trampoline_return(
                    $parse_char_set_after_minus->contents,
                    varray[0,$al_,$end_ind,$c__0]
                  );
                }
                $switch__0 = 1 as dynamic;
              }
            }
            if (! $switch__0) {
              if (37 === $c__0) {
                $add_char($c__1);
                $ak_ = (int) ($str_ind__0 + 1) as dynamic;
                if ($counter < 50) {
                  $counter__1 = (int) ($counter + 1) as dynamic;
                  return $parse_char_set_content($counter__1, $ak_, $end_ind);
                }
                return $caml_trampoline_return(
                  $parse_char_set_content,
                  varray[0,$ak_,$end_ind]
                );
              }
            }
            if (37 === $c__0) {$fail_single_percent($str_ind__0);}
            $add_char($c__0);
            $str_ind__1 = (int) ($str_ind__0 + 1) as dynamic;
            $str_ind__0 = $str_ind__1;
            $c__0 = $c__1;
            continue;
          }
        };
        $parse_char_set_after_minus->contents = 
        (dynamic $counter, dynamic $str_ind, dynamic $end_ind, dynamic $c) : dynamic ==> {
          $ai_ = null as dynamic;
          $c__1 = null as dynamic;
          $counter__0 = null as dynamic;
          $counter__1 = null as dynamic;
          if ($str_ind === $end_ind) {$unexpected_end_of_format($end_ind);}
          $c__0 = $caml_string_get($str, $str_ind);
          if (37 === $c__0) {
            if ((int) ($str_ind + 1) === $end_ind) {$unexpected_end_of_format($end_ind);}
            $c__1 = $caml_string_get($str, (int) ($str_ind + 1));
            if (37 !== $c__1) {
              if (64 !== $c__1) {return $fail_single_percent($str_ind);}
            }
            $add_range($c, $c__1);
            $ai_ = (int) ($str_ind + 2) as dynamic;
            if ($counter < 50) {
              $counter__1 = (int) ($counter + 1) as dynamic;
              return $parse_char_set_content($counter__1, $ai_, $end_ind);
            }
            return $caml_trampoline_return(
              $parse_char_set_content,
              varray[0,$ai_,$end_ind]
            );
          }
          if (93 === $c__0) {
            $add_char($c);
            $add_char(45);
            return (int) ($str_ind + 1);
          }
          $add_range($c, $c__0);
          $aj_ = (int) ($str_ind + 1) as dynamic;
          if ($counter < 50) {
            $counter__0 = (int) ($counter + 1) as dynamic;
            return $parse_char_set_content($counter__0, $aj_, $end_ind);
          }
          return $caml_trampoline_return(
            $parse_char_set_content,
            varray[0,$aj_,$end_ind]
          );
        };
        $parse_char_set_after_char = 
        (dynamic $str_ind, dynamic $end_ind, dynamic $c) : dynamic ==> {
          return $caml_trampoline(
            $parse_char_set_after_char__0->contents(0, $str_ind, $end_ind, $c)
          );
        };
        $parse_char_set_start = (dynamic $str_ind, dynamic $end_ind) : dynamic ==> {
          if ($str_ind === $end_ind) {$unexpected_end_of_format($end_ind);}
          $c = $caml_string_get($str, $str_ind);
          return $parse_char_set_after_char((int) ($str_ind + 1), $end_ind, $c
          );
        };
        if ($str_ind === $end_ind) {$unexpected_end_of_format($end_ind);}
        $match = $caml_string_get($str, $str_ind);
        if (94 === $match) {
          $str_ind__0 = (int) ($str_ind + 1) as dynamic;
          $reverse = 1 as dynamic;
          $str_ind__1 = $str_ind__0;
          $reverse__0 = $reverse;
        }
        else {$ah_ = 0 as dynamic;$str_ind__1 = $str_ind;$reverse__0 = $ah_;}
        $next_ind = $parse_char_set_start($str_ind__1, $end_ind);
        $char_set__0 = $freeze_char_set($char_set);
        $ag_ = $reverse__0 ? $rev_char_set($char_set__0) : ($char_set__0);
        return Vector{0, $next_ind, $ag_};
      };
      $parse_spaces->contents = (dynamic $str_ind, dynamic $end_ind) : dynamic ==> {
        $str_ind__1 = null as dynamic;
        $str_ind__0 = $str_ind;
        for (;;) {
          if ($str_ind__0 === $end_ind) {$unexpected_end_of_format($end_ind);}
          if (32 === $caml_string_get($str, $str_ind__0)) {
            $str_ind__1 = (int) ($str_ind__0 + 1) as dynamic;
            $str_ind__0 = $str_ind__1;
            continue;
          }
          return $str_ind__0;
        }
      };
      $parse_positive->contents = 
      (dynamic $str_ind, dynamic $end_ind, dynamic $acc) : dynamic ==> {
        $acc__1 = null as dynamic;
        $af_ = null as dynamic;
        $c = null as dynamic;
        $str_ind__1 = null as dynamic;
        $switcher = null as dynamic;
        $str_ind__0 = $str_ind;
        $acc__0 = $acc;
        for (;;) {
          if ($str_ind__0 === $end_ind) {$unexpected_end_of_format($end_ind);}
          $c = $caml_string_get($str, $str_ind__0);
          $switcher = (int) ($c + -48) as dynamic;
          if (9 < $unsigned_right_shift_32($switcher, 0)) {return Vector{0, $str_ind__0, $acc__0};}
          $acc__1 = (int) ((int) ($acc__0 * 10) + (int) ($c - 48)) as dynamic;
          if ($Stdlib_sys[13] < $acc__1) {
            $af_ = $Stdlib_sys[13];
            return $call3($failwith_message($Q_), $str, $acc__1, $af_);
          }
          $str_ind__1 = (int) ($str_ind__0 + 1) as dynamic;
          $str_ind__0 = $str_ind__1;
          $acc__0 = $acc__1;
          continue;
        }
      };
      $parse_integer->contents = (dynamic $str_ind, dynamic $end_ind) : dynamic ==> {
        $c = null as dynamic;
        $match__0 = null as dynamic;
        $n = null as dynamic;
        $next_ind = null as dynamic;
        $switcher = null as dynamic;
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
            $switcher = (int) ($c + -48) as dynamic;
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
        throw $caml_wrap_thrown_exception(Vector{0, $Assert_failure, $R_}) as \Throwable;
      };
      $search_subformat_end->contents = 
      (dynamic $str_ind, dynamic $end_ind, dynamic $c) : dynamic ==> {
        $match = null as dynamic;
        $match__0 = null as dynamic;
        $match__1 = null as dynamic;
        $str_ind__1 = null as dynamic;
        $str_ind__2 = null as dynamic;
        $str_ind__3 = null as dynamic;
        $str_ind__4 = null as dynamic;
        $str_ind__5 = null as dynamic;
        $str_ind__6 = null as dynamic;
        $str_ind__7 = null as dynamic;
        $sub_end = null as dynamic;
        $sub_end__0 = null as dynamic;
        $sub_end__1 = null as dynamic;
        $sub_end__2 = null as dynamic;
        $switcher = null as dynamic;
        $str_ind__0 = $str_ind;
        for (;;) {
          if ($str_ind__0 === $end_ind) {
            $call3($failwith_message($S_), $str, $c, $end_ind);
          }
          $match = $caml_string_get($str, $str_ind__0);
          if (37 === $match) {
            if ((int) ($str_ind__0 + 1) === $end_ind) {$unexpected_end_of_format($end_ind);}
            if ($caml_string_get($str, (int) ($str_ind__0 + 1)) === $c) {return $str_ind__0;}
            $match__0 = $caml_string_get($str, (int) ($str_ind__0 + 1));
            if (95 <= $match__0) {
              if (123 <= $match__0) {
                if (! (126 <= $match__0)) {
                  $switcher = (int) ($match__0 + -123) as dynamic;
                  $continue_label = null;
                  switch($switcher) {
                    // FALLTHROUGH
                    case 0:
                      $sub_end = $search_subformat_end->contents(
                        (int)
                        ($str_ind__0 + 2),
                        $end_ind,
                        125
                      );
                      $str_ind__2 = (int) ($sub_end + 2) as dynamic;
                      $str_ind__0 = $str_ind__2;
                      $continue_label = "#";break;
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
                  if ($continue_label === "#") {continue;}
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
                    $str_ind__3 = (int) ($sub_end__0 + 2) as dynamic;
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
                    $str_ind__4 = (int) ($sub_end__1 + 2) as dynamic;
                    $str_ind__0 = $str_ind__4;
                    continue;
                  }
                  $str_ind__5 = (int) ($str_ind__0 + 3) as dynamic;
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
                $str_ind__6 = (int) ($sub_end__2 + 2) as dynamic;
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
            $str_ind__1 = (int) ($str_ind__0 + 2) as dynamic;
            $str_ind__0 = $str_ind__1;
            continue;
          }
          $str_ind__7 = (int) ($str_ind__0 + 1) as dynamic;
          $str_ind__0 = $str_ind__7;
          continue;
        }
      };
      $is_int_base->contents = (dynamic $symb) : dynamic ==> {
        $ae_ = (int) ($symb + -88) as dynamic;
        if (! (32 < $unsigned_right_shift_32($ae_, 0))) {
          switch($ae_) {
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
            // FALLTHROUGH
            default:break;
            }
        }
        return 0;
      };
      $counter_of_char->contents = (dynamic $symb) : dynamic ==> {
        $switcher = null as dynamic;
        if (108 <= $symb) {
          if (! (111 <= $symb)) {
            $switcher = (int) ($symb + -108) as dynamic;
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
        throw $caml_wrap_thrown_exception(Vector{0, $Assert_failure, $T_}) as \Throwable;
      };
      $incompatible_flag->contents = 
      (dynamic $pct_ind, dynamic $str_ind, dynamic $symb, dynamic $option) : dynamic ==> {
        $subfmt = $call3(
          $Stdlib_string[4],
          $str,
          $pct_ind,
          (int)
          ($str_ind - $pct_ind)
        );
        return $call5(
          $failwith_message($W_),
          $str,
          $pct_ind,
          $option,
          $symb,
          $subfmt
        );
      };
      $compute_int_conv->contents = 
      (dynamic $pct_ind, dynamic $str_ind, dynamic $plus, dynamic $hash, dynamic $space, dynamic $symb) : dynamic ==> {
        $switch__0 = null as dynamic;
        $switcher = null as dynamic;
        $switcher__0 = null as dynamic;
        $switcher__1 = null as dynamic;
        $plus__0 = $plus;
        $hash__0 = $hash;
        $space__0 = $space;
        for (;;) {
          if (0 === $plus__0) {
            if (0 === $hash__0) {
              if (0 === $space__0) {
                $switcher = (int) ($symb + -88) as dynamic;
                if (32 < $unsigned_right_shift_32($switcher, 0)) {$switch__0 = 1 as dynamic;}
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
                      $switch__0 = 1 as dynamic;
                    }
                }
              }
              else {
                if (100 === $symb) {return 2;}
                if (105 === $symb) {return 5;}
                $switch__0 = 1 as dynamic;
              }
            }
            else {
              if (0 === $space__0) {
                $switcher__0 = (int) ($symb + -88) as dynamic;
                if (32 < $unsigned_right_shift_32($switcher__0, 0)) {$switch__0 = 0 as dynamic;}
                else {
                  switch($switcher__0) {
                    // FALLTHROUGH
                    case 0:
                      return 9;
                    // FALLTHROUGH
                    case 12:
                      return 13;
                    // FALLTHROUGH
                    case 17:
                      return 14;
                    // FALLTHROUGH
                    case 23:
                      return 11;
                    // FALLTHROUGH
                    case 29:
                      return 15;
                    // FALLTHROUGH
                    case 32:
                      return 7;
                    // FALLTHROUGH
                    default:
                      $switch__0 = 0 as dynamic;
                    }
                }
              }
              else {$switch__0 = 0 as dynamic;}
            }
          }
          else {
            if (0 === $hash__0) {
              if (0 === $space__0) {
                if (100 === $symb) {return 1;}
                if (105 === $symb) {return 4;}
                $switch__0 = 1 as dynamic;
              }
              else {$switch__0 = 1 as dynamic;}
            }
            else {$switch__0 = 0 as dynamic;}
          }
          if (! $switch__0) {
            $switcher__1 = (int) ($symb + -88) as dynamic;
            if (! (32 < $unsigned_right_shift_32($switcher__1, 0))) {
              $continue_label = null;
              switch($switcher__1) {
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
                  if ($legacy_behavior__0) {
                    $hash__0 = 0 as dynamic;
                    $continue_label = "#";break;
                  }
                  return $incompatible_flag->contents(
                    $pct_ind,
                    $str_ind,
                    $symb,
                    $cst__36
                  );
                // FALLTHROUGH
                default:break;
                }
              if ($continue_label === "#") {continue;}
            }
          }
          if (0 === $plus__0) {
            if (0 === $space__0) {
              throw $caml_wrap_thrown_exception(
                      Vector{0, $Assert_failure, $U_}
                    ) as \Throwable;
            }
            if ($legacy_behavior__0) {$space__0 = 0 as dynamic;continue;}
            return $incompatible_flag->contents(
              $pct_ind,
              $str_ind,
              $symb,
              $cst__33
            );
          }
          if (0 === $space__0) {
            if ($legacy_behavior__0) {$plus__0 = 0 as dynamic;continue;}
            return $incompatible_flag->contents(
              $pct_ind,
              $str_ind,
              $symb,
              $cst__34
            );
          }
          if ($legacy_behavior__0) {$space__0 = 0 as dynamic;continue;}
          return $incompatible_flag->contents($pct_ind, $str_ind, 32, $cst__35
          );
        }
      };
      $compute_float_conv->contents = 
      (dynamic $pct_ind, dynamic $str_ind, dynamic $plus, dynamic $space, dynamic $symb) : dynamic ==> {
        $switcher = null as dynamic;
        $switcher__0 = null as dynamic;
        $switcher__1 = null as dynamic;
        $switcher__2 = null as dynamic;
        $switcher__3 = null as dynamic;
        $switcher__4 = null as dynamic;
        $plus__0 = $plus;
        $space__0 = $space;
        for (;;) {
          if (0 === $plus__0) {
            if (0 === $space__0) {
              if (73 <= $symb) {
                $switcher = (int) ($symb + -101) as dynamic;
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
                  $switcher__0 = (int) ($symb + -69) as dynamic;
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
              throw $caml_wrap_thrown_exception(
                      Vector{0, $Assert_failure, $V_}
                    ) as \Throwable;
            }
            if (73 <= $symb) {
              $switcher__1 = (int) ($symb + -101) as dynamic;
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
                $switcher__2 = (int) ($symb + -69) as dynamic;
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
            if ($legacy_behavior__0) {$space__0 = 0 as dynamic;continue;}
            return $incompatible_flag->contents(
              $pct_ind,
              $str_ind,
              $symb,
              $cst__37
            );
          }
          if (0 === $space__0) {
            if (73 <= $symb) {
              $switcher__3 = (int) ($symb + -101) as dynamic;
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
                $switcher__4 = (int) ($symb + -69) as dynamic;
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
            if ($legacy_behavior__0) {$plus__0 = 0 as dynamic;continue;}
            return $incompatible_flag->contents(
              $pct_ind,
              $str_ind,
              $symb,
              $cst__38
            );
          }
          if ($legacy_behavior__0) {$space__0 = 0 as dynamic;continue;}
          return $incompatible_flag->contents($pct_ind, $str_ind, 32, $cst__39
          );
        }
      };
      return $parse(0, $caml_ml_string_length($str));
    };
    $format_of_string_fmtty = (dynamic $str, dynamic $fmtty) : dynamic ==> {
      $ab_ = null as dynamic;
      $ac_ = null as dynamic;
      $match = $fmt_ebb_of_string(0, $str);
      $fmt = $match[1];
      try {
        $ac_ = Vector{0, $type_format($fmt, $fmtty), $str} as dynamic;
        return $ac_;
      }
      catch(\Throwable $ad_) {
        $ad_ = $runtime["caml_wrap_exception"]($ad_);
        if ($ad_ === $Type_mismatch) {
          $ab_ = $string_of_fmtty($fmtty);
          return $call2($failwith_message($X_), $str, $ab_);
        }
        throw $caml_wrap_thrown_exception_reraise($ad_) as \Throwable;
      }
    };
    $format_of_string_format = (dynamic $str, dynamic $param) : dynamic ==> {
      $Z_ = null as dynamic;
      $str__0 = $param[2];
      $fmt = $param[1];
      $match = $fmt_ebb_of_string(0, $str);
      $fmt__0 = $match[1];
      try {
        $Z_ = Vector{
          0,
          $type_format($fmt__0, $fmtty_of_fmt->contents($fmt)),
          $str
        } as dynamic;
        return $Z_;
      }
      catch(\Throwable $aa_) {
        $aa_ = $runtime["caml_wrap_exception"]($aa_);
        if ($aa_ === $Type_mismatch) {
          return $call2($failwith_message($Y_), $str, $str__0);
        }
        throw $caml_wrap_thrown_exception_reraise($aa_) as \Throwable;
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
    } as dynamic;
    
    return($CamlinternalFormat);

  }
  public static function is_in_char_set(dynamic $char_set, dynamic $c): dynamic {
    return static::syncCall(__FUNCTION__, 1, $char_set, $c);
  }
  public static function rev_char_set(dynamic $char_set): dynamic {
    return static::syncCall(__FUNCTION__, 2, $char_set);
  }
  public static function create_char_set(dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 3, $param);
  }
  public static function add_in_char_set(dynamic $char_set, dynamic $c): dynamic {
    return static::syncCall(__FUNCTION__, 4, $char_set, $c);
  }
  public static function freeze_char_set(dynamic $char_set): dynamic {
    return static::syncCall(__FUNCTION__, 5, $char_set);
  }
  public static function param_format_of_ignored_format(dynamic $ign, dynamic $fmt): dynamic {
    return static::syncCall(__FUNCTION__, 6, $ign, $fmt);
  }
  public static function make_printf(dynamic $k, dynamic $acc, dynamic $fmt): dynamic {
    return static::syncCall(__FUNCTION__, 7, $k, $acc, $fmt);
  }
  public static function make_iprintf(dynamic $k, dynamic $o, dynamic $fmt): dynamic {
    return static::syncCall(__FUNCTION__, 8, $k, $o, $fmt);
  }
  public static function output_acc(dynamic $o, dynamic $acc): dynamic {
    return static::syncCall(__FUNCTION__, 9, $o, $acc);
  }
  public static function bufput_acc(dynamic $b, dynamic $acc): dynamic {
    return static::syncCall(__FUNCTION__, 10, $b, $acc);
  }
  public static function strput_acc(dynamic $b, dynamic $acc): dynamic {
    return static::syncCall(__FUNCTION__, 11, $b, $acc);
  }
  public static function type_format(dynamic $fmt, dynamic $fmtty): dynamic {
    return static::syncCall(__FUNCTION__, 12, $fmt, $fmtty);
  }
  public static function fmt_ebb_of_string(dynamic $legacy_behavior, dynamic $str): dynamic {
    return static::syncCall(__FUNCTION__, 13, $legacy_behavior, $str);
  }
  public static function format_of_string_fmtty(dynamic $str, dynamic $fmtty): dynamic {
    return static::syncCall(__FUNCTION__, 14, $str, $fmtty);
  }
  public static function format_of_string_format(dynamic $str, dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 15, $str, $param);
  }
  public static function char_of_iconv(dynamic $iconv): dynamic {
    return static::syncCall(__FUNCTION__, 16, $iconv);
  }
  public static function string_of_formatting_lit(dynamic $formatting_lit): dynamic {
    return static::syncCall(__FUNCTION__, 17, $formatting_lit);
  }
  public static function string_of_formatting_gen(dynamic $formatting_gen): dynamic {
    return static::syncCall(__FUNCTION__, 18, $formatting_gen);
  }
  public static function string_of_fmtty(dynamic $fmtty): dynamic {
    return static::syncCall(__FUNCTION__, 19, $fmtty);
  }
  public static function string_of_fmt(dynamic $fmt): dynamic {
    return static::syncCall(__FUNCTION__, 20, $fmt);
  }
  public static function open_box_of_string(dynamic $str): dynamic {
    return static::syncCall(__FUNCTION__, 21, $str);
  }
  public static function symm(dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 22, $param);
  }
  public static function trans(dynamic $ty1, dynamic $ty2): dynamic {
    return static::syncCall(__FUNCTION__, 23, $ty1, $ty2);
  }
  public static function recast(dynamic $fmt, dynamic $fmtty): dynamic {
    return static::syncCall(__FUNCTION__, 24, $fmt, $fmtty);
  }

}
/* Hashing disabled */
