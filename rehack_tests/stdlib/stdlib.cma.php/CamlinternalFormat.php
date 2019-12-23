<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class CamlinternalFormat {
  <<__Override, __Memoize>>
  public static function requireModule() : Vector<dynamic> {
    $joo_global_object = \Rehack\GlobalObject::get() as dynamic;
    
    $bprint_fmtty = new Ref();
    $bufput_acc = new Ref();
    $fmtty_of_custom = new Ref();
    $fmtty_of_fmt = new Ref();
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
    $s = $string("precision");
    $cst__27 = $string("'*'");
    $cst__25 = $string("'-'");
    $cst_0__1 = $string("'0'");
    $cst__26 = $string("'*'");
    $cst_0 = $string("0");
    $cst_0__0 = $string("0");
    $cst_precision = $string("precision");
    $cst_precision__0 = $string("precision");
    $cst__28 = $string("'+'");
    $cst__29 = $string("'#'");
    $cst__30 = $string("' '");
    $cst_padding = $string("`padding'");
    $cst_precision__1 = $string("`precision'");
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
    $Assert_failure =  Assert_failure::requireModule ();
    $CamlinternalFormatBasics =  CamlinternalFormatBasics::requireModule ();
    $Pervasives =  Pervasives::requireModule ();
    $Buffer =  Buffer::requireModule ();
    $Failure =  Failure::requireModule ();
    $Not_found =  Not_found::requireModule ();
    $String =  String_::requireModule ();
    $Sys =  Sys::requireModule ();
    $Char =  Char::requireModule ();
    $Bytes =  Bytes::requireModule ();
    $a_ = Vector{0, $string("camlinternalFormat.ml"), 846, 23} as dynamic;
    $l_ = Vector{0, $string("camlinternalFormat.ml"), 810, 21} as dynamic;
    $d_ = Vector{0, $string("camlinternalFormat.ml"), 811, 21} as dynamic;
    $m_ = Vector{0, $string("camlinternalFormat.ml"), 814, 21} as dynamic;
    $e_ = Vector{0, $string("camlinternalFormat.ml"), 815, 21} as dynamic;
    $n_ = Vector{0, $string("camlinternalFormat.ml"), 818, 19} as dynamic;
    $f_ = Vector{0, $string("camlinternalFormat.ml"), 819, 19} as dynamic;
    $o_ = Vector{0, $string("camlinternalFormat.ml"), 822, 22} as dynamic;
    $g_ = Vector{0, $string("camlinternalFormat.ml"), 823, 22} as dynamic;
    $p_ = Vector{0, $string("camlinternalFormat.ml"), 827, 30} as dynamic;
    $h_ = Vector{0, $string("camlinternalFormat.ml"), 828, 30} as dynamic;
    $j_ = Vector{0, $string("camlinternalFormat.ml"), 832, 26} as dynamic;
    $b_ = Vector{0, $string("camlinternalFormat.ml"), 833, 26} as dynamic;
    $k_ = Vector{0, $string("camlinternalFormat.ml"), 842, 28} as dynamic;
    $c_ = Vector{0, $string("camlinternalFormat.ml"), 843, 28} as dynamic;
    $i_ = Vector{0, $string("camlinternalFormat.ml"), 847, 23} as dynamic;
    $q_ = Vector{0, $string("camlinternalFormat.ml"), 1525, 4} as dynamic;
    $r_ = Vector{0, $string("camlinternalFormat.ml"), 1593, 39} as dynamic;
    $s_ = Vector{0, $string("camlinternalFormat.ml"), 1616, 31} as dynamic;
    $t_ = Vector{0, $string("camlinternalFormat.ml"), 1617, 31} as dynamic;
    $u_ = Vector{0, $string("camlinternalFormat.ml"), 1797, 8} as dynamic;
    $X_ = Vector{
      0,
      Vector{
        11,
        $string("bad input: format type mismatch between "),
        Vector{3, 0, Vector{11, $string(" and "), Vector{3, 0, 0}}}
      },
      $string("bad input: format type mismatch between %S and %S")
    } as dynamic;
    $W_ = Vector{
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
    $B_ = Vector{0, 0} as dynamic;
    $D_ = Vector{1, 0} as dynamic;
    $C_ = Vector{1, 1} as dynamic;
    $F_ = Vector{1, 1} as dynamic;
    $E_ = Vector{1, 1} as dynamic;
    $J_ = Vector{
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
    $G_ = Vector{
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
    $H_ = Vector{0, 0} as dynamic;
    $I_ = Vector{0, 0} as dynamic;
    $K_ = Vector{0, Vector{12, 64, 0}} as dynamic;
    $L_ = Vector{0, $string("@ "), 1, 0} as dynamic;
    $M_ = Vector{0, $string("@,"), 0, 0} as dynamic;
    $N_ = Vector{2, 60} as dynamic;
    $O_ = Vector{
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
    $Q_ = Vector{0, $string("camlinternalFormat.ml"), 2811, 11} as dynamic;
    $R_ = Vector{
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
    $S_ = Vector{0, $string("camlinternalFormat.ml"), 2873, 34} as dynamic;
    $T_ = Vector{0, $string("camlinternalFormat.ml"), 2906, 28} as dynamic;
    $U_ = Vector{0, $string("camlinternalFormat.ml"), 2940, 25} as dynamic;
    $V_ = Vector{
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
    $create_char_set = (dynamic $param) ==> {return $call2($Bytes[1], 32, 0);};
    $add_in_char_set = (dynamic $char_set, dynamic $c) ==> {
      $str_ind = (int) $unsigned_right_shift_32($c, 3);
      $mask = $left_shift_32(1, $c & 7);
      $eH_ = $runtime["caml_bytes_get"]($char_set, $str_ind) | $mask;
      return $caml_bytes_set(
        $char_set,
        $str_ind,
        $call1($Pervasives[17], $eH_)
      );
    };
    $freeze_char_set = (dynamic $char_set) ==> {
      return $call1($Bytes[6], $char_set);
    };
    $rev_char_set = (dynamic $char_set) ==> {
      $eF_ = null;
      $eG_ = null;
      $char_set__0 = $create_char_set(0);
      $i = 0;
      for (;;) {
        $eF_ = $caml_string_get($char_set, $i) ^ 255;
        $caml_bytes_set($char_set__0, $i, $call1($Pervasives[17], $eF_));
        $eG_ = (int) ($i + 1);
        if (31 !== $i) {$i = $eG_;continue;}
        return $call1($Bytes[42], $char_set__0);
      }
    };
    $is_in_char_set = (dynamic $char_set, dynamic $c) ==> {
      $str_ind = (int) $unsigned_right_shift_32($c, 3);
      $mask = $left_shift_32(1, $c & 7);
      return 0 !== ($caml_string_get($char_set, $str_ind) & $mask) ? 1 : (0);
    };
    $pad_of_pad_opt = (dynamic $pad_opt) ==> {
      $width = null;
      if ($pad_opt) {$width = $pad_opt[1];return Vector{0, 1, $width};}
      return 0;
    };
    $param_format_of_ignored_format = (dynamic $ign, dynamic $fmt) ==> {
      $counter = null;
      $width_opt = null;
      $char_set = null;
      $pad_opt__8 = null;
      $fmtty__0 = null;
      $pad_opt__7 = null;
      $fmtty = null;
      $pad_opt__6 = null;
      $eE_ = null;
      $pad_opt__5 = null;
      $prec_opt = null;
      $iconv__2 = null;
      $pad_opt__4 = null;
      $iconv__1 = null;
      $pad_opt__3 = null;
      $iconv__0 = null;
      $pad_opt__2 = null;
      $iconv = null;
      $pad_opt__1 = null;
      $pad_opt__0 = null;
      $pad_opt = null;
      $ndec = null;
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
            if ($prec_opt) {
              $ndec = $prec_opt[1];
              $eE_ = Vector{0, $ndec};
            }
            else {$eE_ = 0;}
            return Vector{
              0,
              Vector{8, 0, $pad_of_pad_opt($pad_opt__5), $eE_, $fmt}
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
    $buffer_create = (dynamic $init_size) ==> {
      return Vector{0, 0, $caml_create_bytes($init_size)};
    };
    $buffer_check_size = (dynamic $buf, dynamic $overhead) ==> {
      $new_len = null;
      $new_str = null;
      $eD_ = null;
      $len = $runtime["caml_ml_bytes_length"]($buf[2]);
      $min_len = (int) ($buf[1] + $overhead);
      $eC_ = $len < $min_len ? 1 : (0);
      if ($eC_) {
        $new_len = $call2($Pervasives[5], (int) ($len * 2), $min_len);
        $new_str = $caml_create_bytes($new_len);
        $call5($Bytes[11], $buf[2], 0, $new_str, 0, $len);
        $buf[2] = $new_str;
        $eD_ = 0;
      }
      else {$eD_ = $eC_;}
      return $eD_;
    };
    $buffer_add_char = (dynamic $buf, dynamic $c) ==> {
      $buffer_check_size($buf, 1);
      $caml_bytes_set($buf[2], $buf[1], $c);
      $buf[1] = (int) ($buf[1] + 1);
      return 0;
    };
    $buffer_add_string = (dynamic $buf, dynamic $s) ==> {
      $str_len = $caml_ml_string_length($s);
      $buffer_check_size($buf, $str_len);
      $call5($String[6], $s, 0, $buf[2], $buf[1], $str_len);
      $buf[1] = (int) ($buf[1] + $str_len);
      return 0;
    };
    $buffer_contents = (dynamic $buf) ==> {
      return $call3($Bytes[8], $buf[2], 0, $buf[1]);
    };
    $char_of_iconv = (dynamic $iconv) ==> {
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
    $char_of_fconv = (dynamic $fconv) ==> {
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
    $bprint_padty = (dynamic $buf, dynamic $padty) ==> {
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
    $bprint_ignored_flag = (dynamic $buf, dynamic $ign_flag) ==> {
      return $ign_flag ? $buffer_add_char($buf, 95) : ($ign_flag);
    };
    $bprint_pad_opt = (dynamic $buf, dynamic $pad_opt) ==> {
      $width = null;
      if ($pad_opt) {
        $width = $pad_opt[1];
        return $buffer_add_string($buf, $call1($Pervasives[21], $width));
      }
      return 0;
    };
    $bprint_padding = (dynamic $buf, dynamic $pad) ==> {
      $padty__0 = null;
      $padty = null;
      $n = null;
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
    $bprint_precision = (dynamic $buf, dynamic $prec) ==> {
      if ($is_int($prec)) {
        return 0 === $prec ? 0 : ($buffer_add_string($buf, $cst));
      }
      $n = $prec[1];
      $buffer_add_char($buf, 46);
      return $buffer_add_string($buf, $call1($Pervasives[21], $n));
    };
    $bprint_iconv_flag = (dynamic $buf, dynamic $iconv) ==> {
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
    $bprint_altint_fmt = 
    (dynamic $buf, dynamic $ign_flag, dynamic $iconv, dynamic $pad, dynamic $prec, dynamic $c) ==> {
      $buffer_add_char($buf, 37);
      $bprint_ignored_flag($buf, $ign_flag);
      $bprint_iconv_flag($buf, $iconv);
      $bprint_padding($buf, $pad);
      $bprint_precision($buf, $prec);
      $buffer_add_char($buf, $c);
      return $buffer_add_char($buf, $char_of_iconv($iconv));
    };
    $bprint_fconv_flag = (dynamic $buf, dynamic $fconv) ==> {
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
    $string_of_formatting_lit = (dynamic $formatting_lit) ==> {
      $eB_ = null;
      $c = null;
      $str__0 = null;
      $str = null;
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
            $eB_ = $call2($String[1], 1, $c);
            return $call2($Pervasives[16], $cst__7, $eB_);
          }
      }
    };
    $string_of_formatting_gen = (dynamic $formatting_gen) ==> {
      $str = null;
      $match = null;
      if (0 === $formatting_gen[0]) {
        $match = $formatting_gen[1];
        $str = $match[2];
        return $str;
      }
      $match__0 = $formatting_gen[1];
      $str__0 = $match__0[2];
      return $str__0;
    };
    $bprint_char_literal = (dynamic $buf, dynamic $chr) ==> {
      return 37 === $chr
        ? $buffer_add_string($buf, $cst__8)
        : ($buffer_add_char($buf, $chr));
    };
    $bprint_string_literal = (dynamic $buf, dynamic $str) ==> {
      $i = null;
      $eA_ = null;
      $ez_ = (int) ($caml_ml_string_length($str) + -1);
      $ey_ = 0;
      if (! ($ez_ < 0)) {
        $i = $ey_;
        for (;;) {
          $bprint_char_literal($buf, $caml_string_get($str, $i));
          $eA_ = (int) ($i + 1);
          if ($ez_ !== $i) {$i = $eA_;continue;}
          break;
        }
      }
      return 0;
    };
    $bprint_fmtty->contents = (dynamic $buf, dynamic $fmtty) ==> {
      $fmtty__1 = null;
      $fmtty__2 = null;
      $fmtty__3 = null;
      $fmtty__4 = null;
      $fmtty__5 = null;
      $fmtty__6 = null;
      $fmtty__7 = null;
      $fmtty__8 = null;
      $fmtty__9 = null;
      $sub_fmtty = null;
      $fmtty__10 = null;
      $sub_fmtty__0 = null;
      $fmtty__11 = null;
      $fmtty__12 = null;
      $fmtty__13 = null;
      $fmtty__14 = null;
      $fmtty__15 = null;
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
    $int_of_custom_arity->contents = (dynamic $param) ==> {
      $x = null;
      if ($param) {
        $x = $param[1];
        return (int) (1 + $int_of_custom_arity->contents($x));
      }
      return 0;
    };
    $string_of_fmt = (dynamic $fmt__24) ==> {
      $print_char = null;
      $is_alone = null;
      $i = null;
      $i__0 = null;
      $match = null;
      $switcher = null;
      $i__1 = null;
      $switcher__0 = null;
      $i__2 = null;
      $match__0 = null;
      $switcher__1 = null;
      $j = null;
      $i__3 = null;
      $i__4 = null;
      $switcher__2 = null;
      $i__5 = null;
      $i__6 = null;
      $j__0 = null;
      $i__7 = null;
      $j__1 = null;
      $eo_ = null;
      $fmt__0 = null;
      $fmt__1 = null;
      $fmt__2 = null;
      $pad = null;
      $fmt__3 = null;
      $pad__0 = null;
      $fmt__4 = null;
      $prec = null;
      $pad__1 = null;
      $iconv = null;
      $fmt__5 = null;
      $prec__0 = null;
      $pad__2 = null;
      $iconv__0 = null;
      $fmt__6 = null;
      $prec__1 = null;
      $pad__3 = null;
      $iconv__1 = null;
      $fmt__7 = null;
      $prec__2 = null;
      $pad__4 = null;
      $iconv__2 = null;
      $fmt__8 = null;
      $prec__3 = null;
      $pad__5 = null;
      $fconv = null;
      $fmt__9 = null;
      $pad__6 = null;
      $fmt__10 = null;
      $fmt__11 = null;
      $str = null;
      $fmt__12 = null;
      $chr = null;
      $fmt__13 = null;
      $fmtty = null;
      $pad_opt = null;
      $fmt__14 = null;
      $fmtty__0 = null;
      $pad_opt__0 = null;
      $fmt__15 = null;
      $fmt__16 = null;
      $fmt__17 = null;
      $fmting_lit = null;
      $fmt__18 = null;
      $fmting_gen = null;
      $fmt__19 = null;
      $fmt__20 = null;
      $char_set = null;
      $width_opt = null;
      $fmt__21 = null;
      $counter = null;
      $ep_ = null;
      $fmt__22 = null;
      $rest = null;
      $ign = null;
      $match__1 = null;
      $fmt__23 = null;
      $rest__0 = null;
      $arity = null;
      $eq_ = null;
      $er_ = null;
      $i__8 = null;
      $es_ = null;
      $is_alone__0 = null;
      $switch__0 = null;
      $switch__1 = null;
      $buf = $buffer_create(16);
      $fmt = $fmt__24;
      $ign_flag = 0;
      for (;;) {
        $continue_label = null;
        if ($is_int($fmt)) {
          return $buffer_contents($buf);
        }
        else {
          $continue_label = null;
          switch($fmt[0]) {
            // FALLTHROUGH
            case 0:
              $fmt__0 = $fmt[1];
              $buffer_add_char($buf, 37);
              $bprint_ignored_flag($buf, $ign_flag);
              $buffer_add_char($buf, 99);
              $fmt = $fmt__0;
              $ign_flag = 0;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 1:
              $fmt__1 = $fmt[1];
              $buffer_add_char($buf, 37);
              $bprint_ignored_flag($buf, $ign_flag);
              $buffer_add_char($buf, 67);
              $fmt = $fmt__1;
              $ign_flag = 0;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 2:
              $fmt__2 = $fmt[2];
              $pad = $fmt[1];
              $buffer_add_char($buf, 37);
              $bprint_ignored_flag($buf, $ign_flag);
              $bprint_padding($buf, $pad);
              $buffer_add_char($buf, 115);
              $fmt = $fmt__2;
              $ign_flag = 0;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 3:
              $fmt__3 = $fmt[2];
              $pad__0 = $fmt[1];
              $buffer_add_char($buf, 37);
              $bprint_ignored_flag($buf, $ign_flag);
              $bprint_padding($buf, $pad__0);
              $buffer_add_char($buf, 83);
              $fmt = $fmt__3;
              $ign_flag = 0;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 4:
              $fmt__4 = $fmt[4];
              $prec = $fmt[3];
              $pad__1 = $fmt[2];
              $iconv = $fmt[1];
              $buffer_add_char($buf, 37);
              $bprint_ignored_flag($buf, $ign_flag);
              $bprint_iconv_flag($buf, $iconv);
              $bprint_padding($buf, $pad__1);
              $bprint_precision($buf, $prec);
              $buffer_add_char($buf, $char_of_iconv($iconv));
              $fmt = $fmt__4;
              $ign_flag = 0;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 5:
              $fmt__5 = $fmt[4];
              $prec__0 = $fmt[3];
              $pad__2 = $fmt[2];
              $iconv__0 = $fmt[1];
              $bprint_altint_fmt(
                $buf,
                $ign_flag,
                $iconv__0,
                $pad__2,
                $prec__0,
                108
              );
              $fmt = $fmt__5;
              $ign_flag = 0;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 6:
              $fmt__6 = $fmt[4];
              $prec__1 = $fmt[3];
              $pad__3 = $fmt[2];
              $iconv__1 = $fmt[1];
              $bprint_altint_fmt(
                $buf,
                $ign_flag,
                $iconv__1,
                $pad__3,
                $prec__1,
                110
              );
              $fmt = $fmt__6;
              $ign_flag = 0;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 7:
              $fmt__7 = $fmt[4];
              $prec__2 = $fmt[3];
              $pad__4 = $fmt[2];
              $iconv__2 = $fmt[1];
              $bprint_altint_fmt(
                $buf,
                $ign_flag,
                $iconv__2,
                $pad__4,
                $prec__2,
                76
              );
              $fmt = $fmt__7;
              $ign_flag = 0;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 8:
              $fmt__8 = $fmt[4];
              $prec__3 = $fmt[3];
              $pad__5 = $fmt[2];
              $fconv = $fmt[1];
              $buffer_add_char($buf, 37);
              $bprint_ignored_flag($buf, $ign_flag);
              $bprint_fconv_flag($buf, $fconv);
              $bprint_padding($buf, $pad__5);
              $bprint_precision($buf, $prec__3);
              $buffer_add_char($buf, $char_of_fconv($fconv));
              $fmt = $fmt__8;
              $ign_flag = 0;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 9:
              $fmt__9 = $fmt[2];
              $pad__6 = $fmt[1];
              $buffer_add_char($buf, 37);
              $bprint_ignored_flag($buf, $ign_flag);
              $bprint_padding($buf, $pad__6);
              $buffer_add_char($buf, 66);
              $fmt = $fmt__9;
              $ign_flag = 0;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 10:
              $fmt__10 = $fmt[1];
              $buffer_add_string($buf, $cst__14);
              $fmt = $fmt__10;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 11:
              $fmt__11 = $fmt[2];
              $str = $fmt[1];
              $bprint_string_literal($buf, $str);
              $fmt = $fmt__11;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 12:
              $fmt__12 = $fmt[2];
              $chr = $fmt[1];
              $bprint_char_literal($buf, $chr);
              $fmt = $fmt__12;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 13:
              $fmt__13 = $fmt[3];
              $fmtty = $fmt[2];
              $pad_opt = $fmt[1];
              $buffer_add_char($buf, 37);
              $bprint_ignored_flag($buf, $ign_flag);
              $bprint_pad_opt($buf, $pad_opt);
              $buffer_add_char($buf, 123);
              $bprint_fmtty->contents($buf, $fmtty);
              $buffer_add_char($buf, 37);
              $buffer_add_char($buf, 125);
              $fmt = $fmt__13;
              $ign_flag = 0;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 14:
              $fmt__14 = $fmt[3];
              $fmtty__0 = $fmt[2];
              $pad_opt__0 = $fmt[1];
              $buffer_add_char($buf, 37);
              $bprint_ignored_flag($buf, $ign_flag);
              $bprint_pad_opt($buf, $pad_opt__0);
              $buffer_add_char($buf, 40);
              $bprint_fmtty->contents($buf, $fmtty__0);
              $buffer_add_char($buf, 37);
              $buffer_add_char($buf, 41);
              $fmt = $fmt__14;
              $ign_flag = 0;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 15:
              $fmt__15 = $fmt[1];
              $buffer_add_char($buf, 37);
              $bprint_ignored_flag($buf, $ign_flag);
              $buffer_add_char($buf, 97);
              $fmt = $fmt__15;
              $ign_flag = 0;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 16:
              $fmt__16 = $fmt[1];
              $buffer_add_char($buf, 37);
              $bprint_ignored_flag($buf, $ign_flag);
              $buffer_add_char($buf, 116);
              $fmt = $fmt__16;
              $ign_flag = 0;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 17:
              $fmt__17 = $fmt[2];
              $fmting_lit = $fmt[1];
              $bprint_string_literal(
                $buf,
                $string_of_formatting_lit($fmting_lit)
              );
              $fmt = $fmt__17;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 18:
              $fmt__18 = $fmt[2];
              $fmting_gen = $fmt[1];
              $bprint_string_literal($buf, $cst__15);
              $bprint_string_literal(
                $buf,
                $string_of_formatting_gen($fmting_gen)
              );
              $fmt = $fmt__18;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 19:
              $fmt__19 = $fmt[1];
              $buffer_add_char($buf, 37);
              $bprint_ignored_flag($buf, $ign_flag);
              $buffer_add_char($buf, 114);
              $fmt = $fmt__19;
              $ign_flag = 0;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 20:
              $fmt__20 = $fmt[3];
              $char_set = $fmt[2];
              $width_opt = $fmt[1];
              $buffer_add_char($buf, 37);
              $bprint_ignored_flag($buf, $ign_flag);
              $bprint_pad_opt($buf, $width_opt);
              $print_char =
                (dynamic $buf, dynamic $i) ==> {
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
              $buffer_add_char($buf, 91);
              if ($is_in_char_set($char_set, 0)) {
                $buffer_add_char($buf, 94);
                $eo_ = $rev_char_set($char_set);
              }
              else {$eo_ = $char_set;}
              $is_alone__0 =
                (dynamic $et_) ==> {
                  $is_alone = (dynamic $c) ==> {
                    $ev_ = null;
                    $ew_ = null;
                    $ex_ = null;
                    $after = $call1($Char[1], (int) ($c + 1));
                    $before = $call1($Char[1], (int) ($c + -1));
                    $eu_ = $is_in_char_set($et_, $c);
                    if ($eu_) {
                      $ev_ = $is_in_char_set($et_, $before);
                      $ew_ = $ev_ ? $is_in_char_set($et_, $after) : ($ev_);
                      $ex_ = 1 - $ew_;
                    }
                    else {$ex_ = $eu_;}
                    return $ex_;
                  };
                  return $is_alone;
                };
              $is_alone = $is_alone__0($eo_);
              if ($is_alone(93)) {$buffer_add_char($buf, 93);}
              $i = 1;
              for (;;) {
                $continue_label = null;
                if ($i < 256) {
                  if (! $is_in_char_set($eo_, $call1($Pervasives[17], $i))) {$i__0 = (int) ($i + 1);$i = $i__0;continue;}
                  $match = $call1($Pervasives[17], $i);
                  $switcher = (int) ($match + -45);
                  if (48 < $unsigned_right_shift_32($switcher, 0)) {
                    if (210 <= $switcher) {
                      $print_char($buf, 255);
                      $switch__0 = 1;
                    }
                    else {$switch__0 = 0;}
                  }
                  else {
                    $switcher__0 = (int) ($switcher + -1);
                    if (46 < $unsigned_right_shift_32($switcher__0, 0)) {$i__2 = (int) ($i + 1);$i = $i__2;continue;}
                    $switch__0 = 0;
                  }
                  if (! $switch__0) {
                    $i__1 = (int) ($i + 1);
                    if (! $is_in_char_set($eo_, $call1($Pervasives[17], $i__1))
                    ) {
                      $print_char($buf, (int) ($i__1 + -1));
                      $i__6 = (int) ($i__1 + 1);
                      $i = $i__6;
                      continue;
                    }
                    $match__0 = $call1($Pervasives[17], $i__1);
                    $switcher__1 = (int) ($match__0 + -45);
                    if (48 < $unsigned_right_shift_32($switcher__1, 0)) {
                      if (210 <= $switcher__1) {
                        $print_char($buf, 254);
                        $print_char($buf, 255);
                        $switch__1 = 1;
                      }
                      else {$switch__1 = 0;}
                    }
                    else {
                      $switcher__2 = (int) ($switcher__1 + -1);
                      if (46 < $unsigned_right_shift_32($switcher__2, 0)) {
                        if (
                          !
                          $is_in_char_set(
                            $eo_,
                            $call1($Pervasives[17], (int) ($i__1 + 1))
                          )
                        ) {
                          $print_char($buf, (int) ($i__1 + -1));
                          $i__5 = (int) ($i__1 + 1);
                          $i = $i__5;
                          continue;
                        }
                        $switch__1 = 0;
                      }
                      else {$switch__1 = 0;}
                    }
                    if (! $switch__1) {
                      if (
                        !
                        $is_in_char_set(
                          $eo_,
                          $call1($Pervasives[17], (int) ($i__1 + 1))
                        )
                      ) {
                        $print_char($buf, (int) ($i__1 + -1));
                        $print_char($buf, $i__1);
                        $i__4 = (int) ($i__1 + 2);
                        $i = $i__4;
                        continue;
                      }
                      $j = (int) ($i__1 + 2);
                      $i__3 = (int) ($i__1 + -1);
                      $j__0 = $j;
                      for (;;) {
                        if (256 !== $j__0) {
                          if ($is_in_char_set($eo_, $call1($Pervasives[17], $j__0))) {$j__1 = (int) ($j__0 + 1);$j__0 = $j__1;continue;}
                        }
                        $print_char($buf, $i__3);
                        $print_char($buf, 45);
                        $print_char($buf, (int) ($j__0 + -1));
                        if ($j__0 < 256) {
                          $i__7 = (int) ($j__0 + 1);
                          $i = $i__7;
                          $continue_label = "b";break;
                        }
                        break;
                      }
                      if ($continue_label === "b") {continue;}
                    }
                  }
                }
                if ($is_alone(45)) {$buffer_add_char($buf, 45);}
                $buffer_add_char($buf, 93);
                $fmt = $fmt__20;
                $ign_flag = 0;
                $continue_label = "a";break;
              }
              if ($continue_label !== null) {break;}
            // FALLTHROUGH
            case 21:
              $fmt__21 = $fmt[2];
              $counter = $fmt[1];
              $buffer_add_char($buf, 37);
              $bprint_ignored_flag($buf, $ign_flag);
              switch($counter) {
                // FALLTHROUGH
                case 0:
                  $ep_ = 108;
                  break;
                // FALLTHROUGH
                case 1:
                  $ep_ = 110;
                  break;
                // FALLTHROUGH
                default:
                  $ep_ = 78;
                }
              $buffer_add_char($buf, $ep_);
              $fmt = $fmt__21;
              $ign_flag = 0;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 22:
              $fmt__22 = $fmt[1];
              $buffer_add_char($buf, 37);
              $bprint_ignored_flag($buf, $ign_flag);
              $bprint_string_literal($buf, $cst_0c);
              $fmt = $fmt__22;
              $ign_flag = 0;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 23:
              $rest = $fmt[2];
              $ign = $fmt[1];
              $match__1 = $param_format_of_ignored_format($ign, $rest);
              $fmt__23 = $match__1[1];
              $fmt = $fmt__23;
              $ign_flag = 1;
              $continue_label = "#";break;
            // FALLTHROUGH
            default:
              $rest__0 = $fmt[3];
              $arity = $fmt[1];
              $er_ = $int_of_custom_arity->contents($arity);
              $eq_ = 1;
              if (! ($er_ < 1)) {
                $i__8 = $eq_;
                for (;;) {
                  $buffer_add_char($buf, 37);
                  $bprint_ignored_flag($buf, $ign_flag);
                  $buffer_add_char($buf, 63);
                  $es_ = (int) ($i__8 + 1);
                  if ($er_ !== $i__8) {$i__8 = $es_;continue;}
                  break;
                }
              }
              $fmt = $rest__0;
              $ign_flag = 0;
              $continue_label = "#";break;
            }
          if ($continue_label === "#") {continue;}
          else if ($continue_label === "a") {continue;}
        }
      }
    };
    $symm->contents = (dynamic $param) ==> {
      $rest__13 = null;
      $rest__12 = null;
      $rest__11 = null;
      $rest__10 = null;
      $rest__9 = null;
      $ty1 = null;
      $ty2 = null;
      $rest__8 = null;
      $ty = null;
      $rest__7 = null;
      $rest__6 = null;
      $rest__5 = null;
      $rest__4 = null;
      $rest__3 = null;
      $rest__2 = null;
      $rest__1 = null;
      $rest__0 = null;
      $rest = null;
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
    $fmtty_rel_det->contents = (dynamic $param) ==> {
      $en_ = null;
      $em_ = null;
      $el_ = null;
      $fa__13 = null;
      $af__13 = null;
      $ed__13 = null;
      $de__13 = null;
      $match__14 = null;
      $rest__13 = null;
      $ek_ = null;
      $ej_ = null;
      $ei_ = null;
      $fa__12 = null;
      $af__12 = null;
      $ed__12 = null;
      $de__12 = null;
      $match__13 = null;
      $rest__12 = null;
      $eh_ = null;
      $fa__11 = null;
      $af__11 = null;
      $ed__11 = null;
      $de__11 = null;
      $match__12 = null;
      $rest__11 = null;
      $eg_ = null;
      $fa__10 = null;
      $af__10 = null;
      $ed__10 = null;
      $de__10 = null;
      $match__11 = null;
      $rest__10 = null;
      $ef_ = null;
      $fa__9 = null;
      $af__9 = null;
      $ed__9 = null;
      $de__9 = null;
      $match__10 = null;
      $rest__9 = null;
      $ee_ = null;
      $ed_ = null;
      $ec_ = null;
      $ag = null;
      $ga = null;
      $dj = null;
      $jd = null;
      $match__9 = null;
      $ty = null;
      $fa__8 = null;
      $af__8 = null;
      $ed__8 = null;
      $de__8 = null;
      $match__8 = null;
      $ty1 = null;
      $ty2 = null;
      $rest__8 = null;
      $eb_ = null;
      $fa__7 = null;
      $af__7 = null;
      $ed__7 = null;
      $de__7 = null;
      $match__7 = null;
      $rest__7 = null;
      $ea_ = null;
      $fa__6 = null;
      $af__6 = null;
      $ed__6 = null;
      $de__6 = null;
      $match__6 = null;
      $rest__6 = null;
      $d__ = null;
      $fa__5 = null;
      $af__5 = null;
      $ed__5 = null;
      $de__5 = null;
      $match__5 = null;
      $rest__5 = null;
      $d9_ = null;
      $fa__4 = null;
      $af__4 = null;
      $ed__4 = null;
      $de__4 = null;
      $match__4 = null;
      $rest__4 = null;
      $d8_ = null;
      $fa__3 = null;
      $af__3 = null;
      $ed__3 = null;
      $de__3 = null;
      $match__3 = null;
      $rest__3 = null;
      $d7_ = null;
      $fa__2 = null;
      $af__2 = null;
      $ed__2 = null;
      $de__2 = null;
      $match__2 = null;
      $rest__2 = null;
      $d6_ = null;
      $fa__1 = null;
      $af__1 = null;
      $ed__1 = null;
      $de__1 = null;
      $match__1 = null;
      $rest__1 = null;
      $d5_ = null;
      $fa__0 = null;
      $af__0 = null;
      $ed__0 = null;
      $de__0 = null;
      $match__0 = null;
      $rest__0 = null;
      $d4_ = null;
      $fa = null;
      $af = null;
      $ed = null;
      $de = null;
      $match = null;
      $rest = null;
      $d3_ = null;
      $d2_ = null;
      $d1_ = null;
      if ($is_int($param)) {
        $d1_ = (dynamic $param) ==> {return 0;};
        $d2_ = (dynamic $param) ==> {return 0;};
        $d3_ = (dynamic $param) ==> {return 0;};
        return Vector{0, (dynamic $param) ==> {return 0;}, $d3_, $d2_, $d1_};
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
            $d4_ = (dynamic $param) ==> {$call1($af, 0);return 0;};
            return Vector{
              0,
              (dynamic $param) ==> {$call1($fa, 0);return 0;},
              $d4_,
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
            $d5_ = (dynamic $param) ==> {$call1($af__0, 0);return 0;};
            return Vector{
              0,
              (dynamic $param) ==> {$call1($fa__0, 0);return 0;},
              $d5_,
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
            $d6_ = (dynamic $param) ==> {$call1($af__1, 0);return 0;};
            return Vector{
              0,
              (dynamic $param) ==> {$call1($fa__1, 0);return 0;},
              $d6_,
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
            $d7_ = (dynamic $param) ==> {$call1($af__2, 0);return 0;};
            return Vector{
              0,
              (dynamic $param) ==> {$call1($fa__2, 0);return 0;},
              $d7_,
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
            $d8_ = (dynamic $param) ==> {$call1($af__3, 0);return 0;};
            return Vector{
              0,
              (dynamic $param) ==> {$call1($fa__3, 0);return 0;},
              $d8_,
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
            $d9_ = (dynamic $param) ==> {$call1($af__4, 0);return 0;};
            return Vector{
              0,
              (dynamic $param) ==> {$call1($fa__4, 0);return 0;},
              $d9_,
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
            $d__ = (dynamic $param) ==> {$call1($af__5, 0);return 0;};
            return Vector{
              0,
              (dynamic $param) ==> {$call1($fa__5, 0);return 0;},
              $d__,
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
            $ea_ = (dynamic $param) ==> {$call1($af__6, 0);return 0;};
            return Vector{
              0,
              (dynamic $param) ==> {$call1($fa__6, 0);return 0;},
              $ea_,
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
            $eb_ = (dynamic $param) ==> {$call1($af__7, 0);return 0;};
            return Vector{
              0,
              (dynamic $param) ==> {$call1($fa__7, 0);return 0;},
              $eb_,
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
            $ec_ =
              (dynamic $param) ==> {
                $call1($jd, 0);
                $call1($de__8, 0);
                return 0;
              };
            $ed_ =
              (dynamic $param) ==> {
                $call1($ed__8, 0);
                $call1($dj, 0);
                return 0;
              };
            $ee_ =
              (dynamic $param) ==> {
                $call1($ga, 0);
                $call1($af__8, 0);
                return 0;
              };
            return Vector{
              0,
              (dynamic $param) ==> {
                $call1($fa__8, 0);
                $call1($ag, 0);
                return 0;
              },
              $ee_,
              $ed_,
              $ec_
            };
          // FALLTHROUGH
          case 10:
            $rest__9 = $param[1];
            $match__10 = $fmtty_rel_det->contents($rest__9);
            $de__9 = $match__10[4];
            $ed__9 = $match__10[3];
            $af__9 = $match__10[2];
            $fa__9 = $match__10[1];
            $ef_ = (dynamic $param) ==> {$call1($af__9, 0);return 0;};
            return Vector{
              0,
              (dynamic $param) ==> {$call1($fa__9, 0);return 0;},
              $ef_,
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
            $eg_ = (dynamic $param) ==> {$call1($af__10, 0);return 0;};
            return Vector{
              0,
              (dynamic $param) ==> {$call1($fa__10, 0);return 0;},
              $eg_,
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
            $eh_ = (dynamic $param) ==> {$call1($af__11, 0);return 0;};
            return Vector{
              0,
              (dynamic $param) ==> {$call1($fa__11, 0);return 0;},
              $eh_,
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
            $ei_ = (dynamic $param) ==> {$call1($de__12, 0);return 0;};
            $ej_ = (dynamic $param) ==> {$call1($ed__12, 0);return 0;};
            $ek_ = (dynamic $param) ==> {$call1($af__12, 0);return 0;};
            return Vector{
              0,
              (dynamic $param) ==> {$call1($fa__12, 0);return 0;},
              $ek_,
              $ej_,
              $ei_
            };
          // FALLTHROUGH
          default:
            $rest__13 = $param[1];
            $match__14 = $fmtty_rel_det->contents($rest__13);
            $de__13 = $match__14[4];
            $ed__13 = $match__14[3];
            $af__13 = $match__14[2];
            $fa__13 = $match__14[1];
            $el_ = (dynamic $param) ==> {$call1($de__13, 0);return 0;};
            $em_ = (dynamic $param) ==> {$call1($ed__13, 0);return 0;};
            $en_ = (dynamic $param) ==> {$call1($af__13, 0);return 0;};
            return Vector{
              0,
              (dynamic $param) ==> {$call1($fa__13, 0);return 0;},
              $en_,
              $em_,
              $el_
            };
          }
      }
    };
    $trans->contents = (dynamic $ty1, dynamic $match) ==> {
      $switch__14 = null;
      $switch__13 = null;
      $switch__12 = null;
      $switch__11 = null;
      $switch__10 = null;
      $switch__9 = null;
      $switch__8 = null;
      $switch__7 = null;
      $switch__6 = null;
      $switch__5 = null;
      $switch__4 = null;
      $switch__3 = null;
      $switch__2 = null;
      $switch__1 = null;
      $switch__0 = null;
      $rest2__13 = null;
      $d0_ = null;
      $rest2__12 = null;
      $dZ_ = null;
      $rest2__11 = null;
      $dY_ = null;
      $rest2__10 = null;
      $dX_ = null;
      $rest2__9 = null;
      $dW_ = null;
      $f2 = null;
      $f4 = null;
      $match__0 = null;
      $ty = null;
      $ty21 = null;
      $ty22 = null;
      $rest2__8 = null;
      $dV_ = null;
      $dU_ = null;
      $dT_ = null;
      $dS_ = null;
      $ty2 = null;
      $rest2__7 = null;
      $dR_ = null;
      $dQ_ = null;
      $rest2__6 = null;
      $dP_ = null;
      $rest2__5 = null;
      $dO_ = null;
      $rest2__4 = null;
      $dN_ = null;
      $rest2__3 = null;
      $dM_ = null;
      $rest2__2 = null;
      $dL_ = null;
      $rest2__1 = null;
      $dK_ = null;
      $rest2__0 = null;
      $dJ_ = null;
      $rest2 = null;
      $dI_ = null;
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
            $dI_ = $ty1[1];
            if ($is_int($match)) {$switch__1 = 1;}
            else {
              switch($match[0]) {
                // FALLTHROUGH
                case 0:
                  $rest2 = $match[1];
                  return Vector{0, $trans->contents($dI_, $rest2)};
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
            $dJ_ = $ty1[1];
            if ($is_int($match)) {$switch__2 = 1;}
            else {
              switch($match[0]) {
                // FALLTHROUGH
                case 1:
                  $rest2__0 = $match[1];
                  return Vector{1, $trans->contents($dJ_, $rest2__0)};
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
            $dK_ = $ty1[1];
            if ($is_int($match)) {$switch__3 = 1;}
            else {
              switch($match[0]) {
                // FALLTHROUGH
                case 2:
                  $rest2__1 = $match[1];
                  return Vector{2, $trans->contents($dK_, $rest2__1)};
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
            $dL_ = $ty1[1];
            if ($is_int($match)) {$switch__4 = 1;}
            else {
              switch($match[0]) {
                // FALLTHROUGH
                case 3:
                  $rest2__2 = $match[1];
                  return Vector{3, $trans->contents($dL_, $rest2__2)};
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
            $dM_ = $ty1[1];
            if ($is_int($match)) {$switch__5 = 1;}
            else {
              switch($match[0]) {
                // FALLTHROUGH
                case 4:
                  $rest2__3 = $match[1];
                  return Vector{4, $trans->contents($dM_, $rest2__3)};
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
            $dN_ = $ty1[1];
            if ($is_int($match)) {$switch__6 = 1;}
            else {
              switch($match[0]) {
                // FALLTHROUGH
                case 5:
                  $rest2__4 = $match[1];
                  return Vector{5, $trans->contents($dN_, $rest2__4)};
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
            $dO_ = $ty1[1];
            if ($is_int($match)) {$switch__7 = 1;}
            else {
              switch($match[0]) {
                // FALLTHROUGH
                case 6:
                  $rest2__5 = $match[1];
                  return Vector{6, $trans->contents($dO_, $rest2__5)};
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
            $dP_ = $ty1[1];
            if ($is_int($match)) {$switch__8 = 1;}
            else {
              switch($match[0]) {
                // FALLTHROUGH
                case 7:
                  $rest2__6 = $match[1];
                  return Vector{7, $trans->contents($dP_, $rest2__6)};
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
            $dQ_ = $ty1[2];
            $dR_ = $ty1[1];
            if ($is_int($match)) {$switch__9 = 1;}
            else {
              switch($match[0]) {
                // FALLTHROUGH
                case 8:
                  $rest2__7 = $match[2];
                  $ty2 = $match[1];
                  $dS_ = $trans->contents($dQ_, $rest2__7);
                  return Vector{8, $trans->contents($dR_, $ty2), $dS_};
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
              throw $caml_wrap_thrown_exception(
                      Vector{0, $Assert_failure, $j_}
                    ) as \Throwable;
            }
            break;
          // FALLTHROUGH
          case 9:
            $dT_ = $ty1[3];
            $dU_ = $ty1[2];
            $dV_ = $ty1[1];
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
                  $ty = $trans->contents($symm->contents($dU_), $ty21);
                  $match__0 = $fmtty_rel_det->contents($ty);
                  $f4 = $match__0[4];
                  $f2 = $match__0[2];
                  $call1($f2, 0);
                  $call1($f4, 0);
                  return Vector{
                    9,
                    $dV_,
                    $ty22,
                    $trans->contents($dT_, $rest2__8)
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
              throw $caml_wrap_thrown_exception(
                      Vector{0, $Assert_failure, $k_}
                    ) as \Throwable;
            }
            break;
          // FALLTHROUGH
          case 10:
            $dW_ = $ty1[1];
            if (! $is_int($match) && 10 === $match[0]) {
              $rest2__9 = $match[1];
              return Vector{10, $trans->contents($dW_, $rest2__9)};
            }
            throw $caml_wrap_thrown_exception(Vector{0, $Assert_failure, $l_}) as \Throwable;
          // FALLTHROUGH
          case 11:
            $dX_ = $ty1[1];
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
                  return Vector{11, $trans->contents($dX_, $rest2__10)};
                // FALLTHROUGH
                default:
                  $switch__11 = 1;
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
            $dY_ = $ty1[1];
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
                  return Vector{12, $trans->contents($dY_, $rest2__11)};
                // FALLTHROUGH
                default:
                  $switch__12 = 1;
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
            $dZ_ = $ty1[1];
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
                  return Vector{13, $trans->contents($dZ_, $rest2__12)};
                // FALLTHROUGH
                default:
                  $switch__13 = 1;
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
            $d0_ = $ty1[1];
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
                  return Vector{14, $trans->contents($d0_, $rest2__13)};
                // FALLTHROUGH
                default:
                  $switch__14 = 1;
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
    $fmtty_of_padding_fmtty = (dynamic $pad, dynamic $fmtty) ==> {
      return $is_int($pad)
        ? $fmtty
        : (0 === $pad[0] ? $fmtty : (Vector{2, $fmtty}));
    };
    $fmtty_of_custom->contents = (dynamic $arity, dynamic $fmtty) ==> {
      $arity__0 = null;
      if ($arity) {
        $arity__0 = $arity[1];
        return Vector{12, $fmtty_of_custom->contents($arity__0, $fmtty)};
      }
      return $fmtty;
    };
    $fmtty_of_fmt->contents = (dynamic $fmtty) ==> {
      $match = null;
      $fmt = null;
      $match__0 = null;
      $fmt__0 = null;
      $rest = null;
      $rest__0 = null;
      $rest__1 = null;
      $pad = null;
      $rest__2 = null;
      $pad__0 = null;
      $rest__3 = null;
      $prec = null;
      $pad__1 = null;
      $ty_rest = null;
      $prec_ty = null;
      $rest__4 = null;
      $prec__0 = null;
      $pad__2 = null;
      $ty_rest__0 = null;
      $prec_ty__0 = null;
      $rest__5 = null;
      $prec__1 = null;
      $pad__3 = null;
      $ty_rest__1 = null;
      $prec_ty__1 = null;
      $rest__6 = null;
      $prec__2 = null;
      $pad__4 = null;
      $ty_rest__2 = null;
      $prec_ty__2 = null;
      $rest__7 = null;
      $prec__3 = null;
      $pad__5 = null;
      $ty_rest__3 = null;
      $prec_ty__3 = null;
      $rest__8 = null;
      $pad__6 = null;
      $fmtty__1 = null;
      $fmtty__2 = null;
      $fmtty__3 = null;
      $rest__9 = null;
      $ty = null;
      $rest__10 = null;
      $ty__0 = null;
      $rest__11 = null;
      $rest__12 = null;
      $fmtty__4 = null;
      $rest__13 = null;
      $fmting_gen = null;
      $dF_ = null;
      $dG_ = null;
      $rest__14 = null;
      $rest__15 = null;
      $rest__16 = null;
      $rest__17 = null;
      $rest__18 = null;
      $ign = null;
      $rest__19 = null;
      $arity = null;
      $fmtty__5 = null;
      $dH_ = null;
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
              $prec_ty =
                $fmtty_of_precision_fmtty->contents($prec, Vector{2, $ty_rest}
                );
              return $fmtty_of_padding_fmtty($pad__1, $prec_ty);
            // FALLTHROUGH
            case 5:
              $rest__4 = $fmtty__0[4];
              $prec__0 = $fmtty__0[3];
              $pad__2 = $fmtty__0[2];
              $ty_rest__0 = $fmtty_of_fmt->contents($rest__4);
              $prec_ty__0 =
                $fmtty_of_precision_fmtty->contents(
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
              $prec_ty__1 =
                $fmtty_of_precision_fmtty->contents(
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
              $prec_ty__2 =
                $fmtty_of_precision_fmtty->contents(
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
              $prec_ty__3 =
                $fmtty_of_precision_fmtty->contents(
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
              $dF_ = $fmtty_of_fmt->contents($rest__13);
              if (0 === $fmting_gen[0]) {
                $match = $fmting_gen[1];
                $fmt = $match[1];
                $dG_ = $fmtty_of_fmt->contents($fmt);
              }
              else {
                $match__0 = $fmting_gen[1];
                $fmt__0 = $match__0[1];
                $dG_ = $fmtty_of_fmt->contents($fmt__0);
              }
              return $call2($CamlinternalFormatBasics[1], $dG_, $dF_);
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
              if ($is_int($ign)) {
                switch($ign) {
                  // FALLTHROUGH
                  case 0:
                    $fmtty__0 = $rest__18;
                    $continue_label = "#";break;
                  // FALLTHROUGH
                  case 1:
                    $fmtty__0 = $rest__18;
                    $continue_label = "#";break;
                  // FALLTHROUGH
                  case 2:
                    return Vector{14, $fmtty_of_fmt->contents($rest__18)};
                  // FALLTHROUGH
                  default:
                    $fmtty__0 = $rest__18;
                    $continue_label = "#";break;
                  }
                if ($continue_label !== null) {break;}
              }
              else {
                switch($ign[0]) {
                  // FALLTHROUGH
                  case 0:
                    $fmtty__0 = $rest__18;
                    $continue_label = "#";break;
                  // FALLTHROUGH
                  case 1:
                    $fmtty__0 = $rest__18;
                    $continue_label = "#";break;
                  // FALLTHROUGH
                  case 2:
                    $fmtty__0 = $rest__18;
                    $continue_label = "#";break;
                  // FALLTHROUGH
                  case 3:
                    $fmtty__0 = $rest__18;
                    $continue_label = "#";break;
                  // FALLTHROUGH
                  case 4:
                    $fmtty__0 = $rest__18;
                    $continue_label = "#";break;
                  // FALLTHROUGH
                  case 5:
                    $fmtty__0 = $rest__18;
                    $continue_label = "#";break;
                  // FALLTHROUGH
                  case 6:
                    $fmtty__0 = $rest__18;
                    $continue_label = "#";break;
                  // FALLTHROUGH
                  case 7:
                    $fmtty__0 = $rest__18;
                    $continue_label = "#";break;
                  // FALLTHROUGH
                  case 8:
                    $fmtty__0 = $rest__18;
                    $continue_label = "#";break;
                  // FALLTHROUGH
                  case 9:
                    $fmtty__5 = $ign[2];
                    $dH_ = $fmtty_of_fmt->contents($rest__18);
                    return $call2($CamlinternalFormatBasics[1], $fmtty__5, $dH_);
                  // FALLTHROUGH
                  case 10:
                    $fmtty__0 = $rest__18;
                    $continue_label = "#";break;
                  // FALLTHROUGH
                  default:
                    $fmtty__0 = $rest__18;
                    $continue_label = "#";break;
                  }
                if ($continue_label !== null) {break;}
              }
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
    $fmtty_of_precision_fmtty->contents = (dynamic $prec, dynamic $fmtty) ==> {
      return $is_int($prec)
        ? 0 === $prec ? $fmtty : (Vector{2, $fmtty})
        : ($fmtty);
    };
    $Type_mismatch = Vector{
      248,
      $cst_CamlinternalFormat_Type_mismatch,
      $runtime["caml_fresh_oo_id"](0)
    } as dynamic;
    $type_padding = (dynamic $pad, dynamic $match) ==> {
      $padty__0 = null;
      $rest = null;
      $padty = null;
      $w = null;
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
    $type_padprec = (dynamic $pad, dynamic $prec, dynamic $fmtty) ==> {
      $rest = null;
      $pad__0 = null;
      $dE_ = null;
      $rest__0 = null;
      $pad__1 = null;
      $match = $type_padding($pad, $fmtty);
      if ($is_int($prec)) {
        if (0 === $prec) {
          $rest = $match[2];
          $pad__0 = $match[1];
          return Vector{0, $pad__0, 0, $rest};
        }
        $dE_ = $match[2];
        if (! $is_int($dE_) && 2 === $dE_[0]) {
          $rest__0 = $dE_[1];
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
    $type_format = (dynamic $fmt, dynamic $fmtty) ==> {
      $fmt__0 = null;
      $dD_ = $type_format_gen->contents($fmt, $fmtty);
      if ($is_int($dD_[2])) {$fmt__0 = $dD_[1];return $fmt__0;}
      throw $caml_wrap_thrown_exception($Type_mismatch) as \Throwable;
    };
    $type_ignored_param_one = (dynamic $ign, dynamic $fmt, dynamic $fmtty) ==> {
      $match = $type_format_gen->contents($fmt, $fmtty);
      $fmtty__0 = $match[2];
      $fmt__0 = $match[1];
      return Vector{0, Vector{23, $ign, $fmt__0}, $fmtty__0};
    };
    $type_format_gen->contents = (dynamic $fmt, dynamic $fmtty) ==> {
      $sub_fmtty__4 = null;
      $fmt__22 = null;
      $fmtty__22 = null;
      $match__27 = null;
      $dC_ = null;
      $pad_opt__2 = null;
      $sub_fmtty__3 = null;
      $pad_opt__1 = null;
      $sub_fmtty__2 = null;
      $fmt__21 = null;
      $fmtty__21 = null;
      $match__26 = null;
      $fmtty_rest__16 = null;
      $fmt3__0 = null;
      $fmtty3__0 = null;
      $match__25 = null;
      $fmt2__0 = null;
      $fmtty2__0 = null;
      $match__24 = null;
      $fmt1__0 = null;
      $str__1 = null;
      $match__23 = null;
      $fmt3 = null;
      $fmtty3 = null;
      $match__22 = null;
      $fmt2 = null;
      $fmtty2 = null;
      $match__21 = null;
      $fmt1 = null;
      $str__0 = null;
      $match__20 = null;
      $ign = null;
      $rest = null;
      $fmt__20 = null;
      $fmtty__20 = null;
      $match__19 = null;
      $counter = null;
      $fmt_rest__20 = null;
      $fmtty_rest__15 = null;
      $fmt__19 = null;
      $fmtty__19 = null;
      $match__18 = null;
      $width_opt = null;
      $char_set = null;
      $fmt_rest__19 = null;
      $fmtty_rest__14 = null;
      $fmt__18 = null;
      $fmtty__18 = null;
      $match__17 = null;
      $fmt_rest__18 = null;
      $fmtty_rest__13 = null;
      $formatting_gen = null;
      $fmt_rest__17 = null;
      $fmt__17 = null;
      $fmtty__17 = null;
      $match__16 = null;
      $formatting_lit = null;
      $fmt_rest__16 = null;
      $fmt__16 = null;
      $fmtty__16 = null;
      $match__15 = null;
      $fmt_rest__15 = null;
      $fmtty_rest__12 = null;
      $fmt__15 = null;
      $fmtty__15 = null;
      $match__14 = null;
      $fmt_rest__14 = null;
      $fmtty_rest__11 = null;
      $fmt__14 = null;
      $fmtty__14 = null;
      $match__13 = null;
      $dB_ = null;
      $pad_opt__0 = null;
      $sub_fmtty__1 = null;
      $fmt_rest__13 = null;
      $sub_fmtty1 = null;
      $fmtty_rest__10 = null;
      $fmt__13 = null;
      $fmtty__13 = null;
      $match__12 = null;
      $pad_opt = null;
      $sub_fmtty__0 = null;
      $fmt_rest__12 = null;
      $sub_fmtty = null;
      $fmtty_rest__9 = null;
      $fmt__12 = null;
      $fmtty__12 = null;
      $match__11 = null;
      $chr = null;
      $fmt_rest__11 = null;
      $fmt__11 = null;
      $fmtty__11 = null;
      $match__10 = null;
      $str = null;
      $fmt_rest__10 = null;
      $fmt__10 = null;
      $fmtty__10 = null;
      $match__9 = null;
      $fmt_rest__9 = null;
      $fmt__9 = null;
      $fmtty__9 = null;
      $match__8 = null;
      $fmtty_rest__8 = null;
      $dA_ = null;
      $dz_ = null;
      $dy_ = null;
      $pad__6 = null;
      $fmt_rest__8 = null;
      $fmt__8 = null;
      $fmtty__8 = null;
      $match__7 = null;
      $fmtty_rest__7 = null;
      $dx_ = null;
      $dw_ = null;
      $dv_ = null;
      $du_ = null;
      $fconv = null;
      $pad__5 = null;
      $prec__3 = null;
      $fmt_rest__7 = null;
      $fmt__7 = null;
      $fmtty__7 = null;
      $match__6 = null;
      $fmtty_rest__6 = null;
      $dt_ = null;
      $ds_ = null;
      $dr_ = null;
      $dq_ = null;
      $iconv__2 = null;
      $pad__4 = null;
      $prec__2 = null;
      $fmt_rest__6 = null;
      $fmt__6 = null;
      $fmtty__6 = null;
      $match__5 = null;
      $fmtty_rest__5 = null;
      $dp_ = null;
      $do_ = null;
      $dn_ = null;
      $dm_ = null;
      $iconv__1 = null;
      $pad__3 = null;
      $prec__1 = null;
      $fmt_rest__5 = null;
      $fmt__5 = null;
      $fmtty__5 = null;
      $match__4 = null;
      $fmtty_rest__4 = null;
      $dl_ = null;
      $dk_ = null;
      $dj_ = null;
      $di_ = null;
      $iconv__0 = null;
      $pad__2 = null;
      $prec__0 = null;
      $fmt_rest__4 = null;
      $fmt__4 = null;
      $fmtty__4 = null;
      $match__3 = null;
      $fmtty_rest__3 = null;
      $dh_ = null;
      $dg_ = null;
      $df_ = null;
      $de_ = null;
      $iconv = null;
      $pad__1 = null;
      $prec = null;
      $fmt_rest__3 = null;
      $fmt__3 = null;
      $fmtty__3 = null;
      $match__2 = null;
      $fmtty_rest__2 = null;
      $dd_ = null;
      $dc_ = null;
      $db_ = null;
      $pad__0 = null;
      $fmt_rest__2 = null;
      $fmt__2 = null;
      $fmtty__2 = null;
      $match__1 = null;
      $fmtty_rest__1 = null;
      $da_ = null;
      $c__ = null;
      $c9_ = null;
      $pad = null;
      $fmt_rest__1 = null;
      $fmt__1 = null;
      $fmtty__1 = null;
      $match__0 = null;
      $fmt_rest__0 = null;
      $fmtty_rest__0 = null;
      $fmt__0 = null;
      $fmtty__0 = null;
      $match = null;
      $fmt_rest = null;
      $fmtty_rest = null;
      if ($is_int($fmt)) {
        return Vector{0, 0, $fmtty};
      }
      else {
        switch($fmt[0]) {
          // FALLTHROUGH
          case 0:
            if (! $is_int($fmtty) && 0 === $fmtty[0]) {
              $fmtty_rest = $fmtty[1];
              $fmt_rest = $fmt[1];
              $match = $type_format_gen->contents($fmt_rest, $fmtty_rest);
              $fmtty__0 = $match[2];
              $fmt__0 = $match[1];
              return Vector{0, Vector{0, $fmt__0}, $fmtty__0};
            }
            break;
          // FALLTHROUGH
          case 1:
            if (! $is_int($fmtty) && 0 === $fmtty[0]) {
              $fmtty_rest__0 = $fmtty[1];
              $fmt_rest__0 = $fmt[1];
              $match__0 =
                $type_format_gen->contents($fmt_rest__0, $fmtty_rest__0);
              $fmtty__1 = $match__0[2];
              $fmt__1 = $match__0[1];
              return Vector{0, Vector{1, $fmt__1}, $fmtty__1};
            }
            break;
          // FALLTHROUGH
          case 2:
            $fmt_rest__1 = $fmt[2];
            $pad = $fmt[1];
            $c9_ = $type_padding($pad, $fmtty);
            $c__ = $c9_[2];
            $da_ = $c9_[1];
            if (! $is_int($c__) && 1 === $c__[0]) {
              $fmtty_rest__1 = $c__[1];
              $match__1 =
                $type_format_gen->contents($fmt_rest__1, $fmtty_rest__1);
              $fmtty__2 = $match__1[2];
              $fmt__2 = $match__1[1];
              return Vector{0, Vector{2, $da_, $fmt__2}, $fmtty__2};
            }
            throw $caml_wrap_thrown_exception($Type_mismatch) as \Throwable;
          // FALLTHROUGH
          case 3:
            $fmt_rest__2 = $fmt[2];
            $pad__0 = $fmt[1];
            $db_ = $type_padding($pad__0, $fmtty);
            $dc_ = $db_[2];
            $dd_ = $db_[1];
            if (! $is_int($dc_) && 1 === $dc_[0]) {
              $fmtty_rest__2 = $dc_[1];
              $match__2 =
                $type_format_gen->contents($fmt_rest__2, $fmtty_rest__2);
              $fmtty__3 = $match__2[2];
              $fmt__3 = $match__2[1];
              return Vector{0, Vector{3, $dd_, $fmt__3}, $fmtty__3};
            }
            throw $caml_wrap_thrown_exception($Type_mismatch) as \Throwable;
          // FALLTHROUGH
          case 4:
            $fmt_rest__3 = $fmt[4];
            $prec = $fmt[3];
            $pad__1 = $fmt[2];
            $iconv = $fmt[1];
            $de_ = $type_padprec($pad__1, $prec, $fmtty);
            $df_ = $de_[3];
            $dg_ = $de_[2];
            $dh_ = $de_[1];
            if (! $is_int($df_) && 2 === $df_[0]) {
              $fmtty_rest__3 = $df_[1];
              $match__3 =
                $type_format_gen->contents($fmt_rest__3, $fmtty_rest__3);
              $fmtty__4 = $match__3[2];
              $fmt__4 = $match__3[1];
              return Vector{
                0,
                Vector{4, $iconv, $dh_, $dg_, $fmt__4},
                $fmtty__4
              };
            }
            throw $caml_wrap_thrown_exception($Type_mismatch) as \Throwable;
          // FALLTHROUGH
          case 5:
            $fmt_rest__4 = $fmt[4];
            $prec__0 = $fmt[3];
            $pad__2 = $fmt[2];
            $iconv__0 = $fmt[1];
            $di_ = $type_padprec($pad__2, $prec__0, $fmtty);
            $dj_ = $di_[3];
            $dk_ = $di_[2];
            $dl_ = $di_[1];
            if (! $is_int($dj_) && 3 === $dj_[0]) {
              $fmtty_rest__4 = $dj_[1];
              $match__4 =
                $type_format_gen->contents($fmt_rest__4, $fmtty_rest__4);
              $fmtty__5 = $match__4[2];
              $fmt__5 = $match__4[1];
              return Vector{
                0,
                Vector{5, $iconv__0, $dl_, $dk_, $fmt__5},
                $fmtty__5
              };
            }
            throw $caml_wrap_thrown_exception($Type_mismatch) as \Throwable;
          // FALLTHROUGH
          case 6:
            $fmt_rest__5 = $fmt[4];
            $prec__1 = $fmt[3];
            $pad__3 = $fmt[2];
            $iconv__1 = $fmt[1];
            $dm_ = $type_padprec($pad__3, $prec__1, $fmtty);
            $dn_ = $dm_[3];
            $do_ = $dm_[2];
            $dp_ = $dm_[1];
            if (! $is_int($dn_) && 4 === $dn_[0]) {
              $fmtty_rest__5 = $dn_[1];
              $match__5 =
                $type_format_gen->contents($fmt_rest__5, $fmtty_rest__5);
              $fmtty__6 = $match__5[2];
              $fmt__6 = $match__5[1];
              return Vector{
                0,
                Vector{6, $iconv__1, $dp_, $do_, $fmt__6},
                $fmtty__6
              };
            }
            throw $caml_wrap_thrown_exception($Type_mismatch) as \Throwable;
          // FALLTHROUGH
          case 7:
            $fmt_rest__6 = $fmt[4];
            $prec__2 = $fmt[3];
            $pad__4 = $fmt[2];
            $iconv__2 = $fmt[1];
            $dq_ = $type_padprec($pad__4, $prec__2, $fmtty);
            $dr_ = $dq_[3];
            $ds_ = $dq_[2];
            $dt_ = $dq_[1];
            if (! $is_int($dr_) && 5 === $dr_[0]) {
              $fmtty_rest__6 = $dr_[1];
              $match__6 =
                $type_format_gen->contents($fmt_rest__6, $fmtty_rest__6);
              $fmtty__7 = $match__6[2];
              $fmt__7 = $match__6[1];
              return Vector{
                0,
                Vector{7, $iconv__2, $dt_, $ds_, $fmt__7},
                $fmtty__7
              };
            }
            throw $caml_wrap_thrown_exception($Type_mismatch) as \Throwable;
          // FALLTHROUGH
          case 8:
            $fmt_rest__7 = $fmt[4];
            $prec__3 = $fmt[3];
            $pad__5 = $fmt[2];
            $fconv = $fmt[1];
            $du_ = $type_padprec($pad__5, $prec__3, $fmtty);
            $dv_ = $du_[3];
            $dw_ = $du_[2];
            $dx_ = $du_[1];
            if (! $is_int($dv_) && 6 === $dv_[0]) {
              $fmtty_rest__7 = $dv_[1];
              $match__7 =
                $type_format_gen->contents($fmt_rest__7, $fmtty_rest__7);
              $fmtty__8 = $match__7[2];
              $fmt__8 = $match__7[1];
              return Vector{
                0,
                Vector{8, $fconv, $dx_, $dw_, $fmt__8},
                $fmtty__8
              };
            }
            throw $caml_wrap_thrown_exception($Type_mismatch) as \Throwable;
          // FALLTHROUGH
          case 9:
            $fmt_rest__8 = $fmt[2];
            $pad__6 = $fmt[1];
            $dy_ = $type_padding($pad__6, $fmtty);
            $dz_ = $dy_[2];
            $dA_ = $dy_[1];
            if (! $is_int($dz_) && 7 === $dz_[0]) {
              $fmtty_rest__8 = $dz_[1];
              $match__8 =
                $type_format_gen->contents($fmt_rest__8, $fmtty_rest__8);
              $fmtty__9 = $match__8[2];
              $fmt__9 = $match__8[1];
              return Vector{0, Vector{9, $dA_, $fmt__9}, $fmtty__9};
            }
            throw $caml_wrap_thrown_exception($Type_mismatch) as \Throwable;
          // FALLTHROUGH
          case 10:
            $fmt_rest__9 = $fmt[1];
            $match__9 = $type_format_gen->contents($fmt_rest__9, $fmtty);
            $fmtty__10 = $match__9[2];
            $fmt__10 = $match__9[1];
            return Vector{0, Vector{10, $fmt__10}, $fmtty__10};
          // FALLTHROUGH
          case 11:
            $fmt_rest__10 = $fmt[2];
            $str = $fmt[1];
            $match__10 = $type_format_gen->contents($fmt_rest__10, $fmtty);
            $fmtty__11 = $match__10[2];
            $fmt__11 = $match__10[1];
            return Vector{0, Vector{11, $str, $fmt__11}, $fmtty__11};
          // FALLTHROUGH
          case 12:
            $fmt_rest__11 = $fmt[2];
            $chr = $fmt[1];
            $match__11 = $type_format_gen->contents($fmt_rest__11, $fmtty);
            $fmtty__12 = $match__11[2];
            $fmt__12 = $match__11[1];
            return Vector{0, Vector{12, $chr, $fmt__12}, $fmtty__12};
          // FALLTHROUGH
          case 13:
            if (! $is_int($fmtty) && 8 === $fmtty[0]) {
              $fmtty_rest__9 = $fmtty[2];
              $sub_fmtty = $fmtty[1];
              $fmt_rest__12 = $fmt[3];
              $sub_fmtty__0 = $fmt[2];
              $pad_opt = $fmt[1];
              if (
                $caml_notequal(Vector{0, $sub_fmtty__0}, Vector{0, $sub_fmtty}
                )
              ) {
                throw $caml_wrap_thrown_exception($Type_mismatch) as \Throwable;
              }
              $match__12 =
                $type_format_gen->contents($fmt_rest__12, $fmtty_rest__9);
              $fmtty__13 = $match__12[2];
              $fmt__13 = $match__12[1];
              return Vector{
                0,
                Vector{13, $pad_opt, $sub_fmtty, $fmt__13},
                $fmtty__13
              };
            }
            break;
          // FALLTHROUGH
          case 14:
            if (! $is_int($fmtty) && 9 === $fmtty[0]) {
              $fmtty_rest__10 = $fmtty[3];
              $sub_fmtty1 = $fmtty[1];
              $fmt_rest__13 = $fmt[3];
              $sub_fmtty__1 = $fmt[2];
              $pad_opt__0 = $fmt[1];
              $dB_ =
                Vector{0, $call1($CamlinternalFormatBasics[2], $sub_fmtty1)};
              if (
                $caml_notequal(
                  Vector{
                    0,
                    $call1($CamlinternalFormatBasics[2], $sub_fmtty__1)
                  },
                  $dB_
                )
              ) {
                throw $caml_wrap_thrown_exception($Type_mismatch) as \Throwable;
              }
              $match__13 =
                $type_format_gen->contents(
                  $fmt_rest__13,
                  $call1($CamlinternalFormatBasics[2], $fmtty_rest__10)
                );
              $fmtty__14 = $match__13[2];
              $fmt__14 = $match__13[1];
              return Vector{
                0,
                Vector{14, $pad_opt__0, $sub_fmtty1, $fmt__14},
                $fmtty__14
              };
            }
            break;
          // FALLTHROUGH
          case 15:
            if (! $is_int($fmtty) && 10 === $fmtty[0]) {
              $fmtty_rest__11 = $fmtty[1];
              $fmt_rest__14 = $fmt[1];
              $match__14 =
                $type_format_gen->contents($fmt_rest__14, $fmtty_rest__11);
              $fmtty__15 = $match__14[2];
              $fmt__15 = $match__14[1];
              return Vector{0, Vector{15, $fmt__15}, $fmtty__15};
            }
            break;
          // FALLTHROUGH
          case 16:
            if (! $is_int($fmtty) && 11 === $fmtty[0]) {
              $fmtty_rest__12 = $fmtty[1];
              $fmt_rest__15 = $fmt[1];
              $match__15 =
                $type_format_gen->contents($fmt_rest__15, $fmtty_rest__12);
              $fmtty__16 = $match__15[2];
              $fmt__16 = $match__15[1];
              return Vector{0, Vector{16, $fmt__16}, $fmtty__16};
            }
            break;
          // FALLTHROUGH
          case 17:
            $fmt_rest__16 = $fmt[2];
            $formatting_lit = $fmt[1];
            $match__16 = $type_format_gen->contents($fmt_rest__16, $fmtty);
            $fmtty__17 = $match__16[2];
            $fmt__17 = $match__16[1];
            return Vector{0, Vector{17, $formatting_lit, $fmt__17}, $fmtty__17
            };
          // FALLTHROUGH
          case 18:
            $fmt_rest__17 = $fmt[2];
            $formatting_gen = $fmt[1];
            if (0 === $formatting_gen[0]) {
              $match__20 = $formatting_gen[1];
              $str__0 = $match__20[2];
              $fmt1 = $match__20[1];
              $match__21 = $type_format_gen->contents($fmt1, $fmtty);
              $fmtty2 = $match__21[2];
              $fmt2 = $match__21[1];
              $match__22 = $type_format_gen->contents($fmt_rest__17, $fmtty2);
              $fmtty3 = $match__22[2];
              $fmt3 = $match__22[1];
              return Vector{
                0,
                Vector{18, Vector{0, Vector{0, $fmt2, $str__0}}, $fmt3},
                $fmtty3
              };
            }
            $match__23 = $formatting_gen[1];
            $str__1 = $match__23[2];
            $fmt1__0 = $match__23[1];
            $match__24 = $type_format_gen->contents($fmt1__0, $fmtty);
            $fmtty2__0 = $match__24[2];
            $fmt2__0 = $match__24[1];
            $match__25 = $type_format_gen->contents($fmt_rest__17, $fmtty2__0);
            $fmtty3__0 = $match__25[2];
            $fmt3__0 = $match__25[1];
            return Vector{
              0,
              Vector{18, Vector{1, Vector{0, $fmt2__0, $str__1}}, $fmt3__0},
              $fmtty3__0
            };
          // FALLTHROUGH
          case 19:
            if (! $is_int($fmtty) && 13 === $fmtty[0]) {
              $fmtty_rest__13 = $fmtty[1];
              $fmt_rest__18 = $fmt[1];
              $match__17 =
                $type_format_gen->contents($fmt_rest__18, $fmtty_rest__13);
              $fmtty__18 = $match__17[2];
              $fmt__18 = $match__17[1];
              return Vector{0, Vector{19, $fmt__18}, $fmtty__18};
            }
            break;
          // FALLTHROUGH
          case 20:
            if (! $is_int($fmtty) && 1 === $fmtty[0]) {
              $fmtty_rest__14 = $fmtty[1];
              $fmt_rest__19 = $fmt[3];
              $char_set = $fmt[2];
              $width_opt = $fmt[1];
              $match__18 =
                $type_format_gen->contents($fmt_rest__19, $fmtty_rest__14);
              $fmtty__19 = $match__18[2];
              $fmt__19 = $match__18[1];
              return Vector{
                0,
                Vector{20, $width_opt, $char_set, $fmt__19},
                $fmtty__19
              };
            }
            break;
          // FALLTHROUGH
          case 21:
            if (! $is_int($fmtty) && 2 === $fmtty[0]) {
              $fmtty_rest__15 = $fmtty[1];
              $fmt_rest__20 = $fmt[2];
              $counter = $fmt[1];
              $match__19 =
                $type_format_gen->contents($fmt_rest__20, $fmtty_rest__15);
              $fmtty__20 = $match__19[2];
              $fmt__20 = $match__19[1];
              return Vector{0, Vector{21, $counter, $fmt__20}, $fmtty__20};
            }
            break;
          // FALLTHROUGH
          case 23:
            $rest = $fmt[2];
            $ign = $fmt[1];
            if ($is_int($ign)) {
              switch($ign) {
                // FALLTHROUGH
                case 0:
                  return $type_ignored_param_one($ign, $rest, $fmtty);
                // FALLTHROUGH
                case 1:
                  return $type_ignored_param_one($ign, $rest, $fmtty);
                // FALLTHROUGH
                case 2:
                  if (! $is_int($fmtty) && 14 === $fmtty[0]) {
                    $fmtty_rest__16 = $fmtty[1];
                    $match__26 =
                      $type_format_gen->contents($rest, $fmtty_rest__16);
                    $fmtty__21 = $match__26[2];
                    $fmt__21 = $match__26[1];
                    return Vector{0, Vector{23, 2, $fmt__21}, $fmtty__21};
                  }
                  throw $caml_wrap_thrown_exception($Type_mismatch) as \Throwable;
                // FALLTHROUGH
                default:
                  return $type_ignored_param_one($ign, $rest, $fmtty);
                }
            }
            else {
              switch($ign[0]) {
                // FALLTHROUGH
                case 0:
                  return $type_ignored_param_one($ign, $rest, $fmtty);
                // FALLTHROUGH
                case 1:
                  return $type_ignored_param_one($ign, $rest, $fmtty);
                // FALLTHROUGH
                case 2:
                  return $type_ignored_param_one($ign, $rest, $fmtty);
                // FALLTHROUGH
                case 3:
                  return $type_ignored_param_one($ign, $rest, $fmtty);
                // FALLTHROUGH
                case 4:
                  return $type_ignored_param_one($ign, $rest, $fmtty);
                // FALLTHROUGH
                case 5:
                  return $type_ignored_param_one($ign, $rest, $fmtty);
                // FALLTHROUGH
                case 6:
                  return $type_ignored_param_one($ign, $rest, $fmtty);
                // FALLTHROUGH
                case 7:
                  return $type_ignored_param_one($ign, $rest, $fmtty);
                // FALLTHROUGH
                case 8:
                  $sub_fmtty__2 = $ign[2];
                  $pad_opt__1 = $ign[1];
                  return $type_ignored_param_one(
                    Vector{8, $pad_opt__1, $sub_fmtty__2},
                    $rest,
                    $fmtty
                  );
                // FALLTHROUGH
                case 9:
                  $sub_fmtty__3 = $ign[2];
                  $pad_opt__2 = $ign[1];
                  $dC_ =
                    $type_ignored_format_substitution->contents(
                      $sub_fmtty__3,
                      $rest,
                      $fmtty
                    );
                  $match__27 = $dC_[2];
                  $fmtty__22 = $match__27[2];
                  $fmt__22 = $match__27[1];
                  $sub_fmtty__4 = $dC_[1];
                  return Vector{
                    0,
                    Vector{23, Vector{9, $pad_opt__2, $sub_fmtty__4}, $fmt__22},
                    $fmtty__22
                  };
                // FALLTHROUGH
                case 10:
                  return $type_ignored_param_one($ign, $rest, $fmtty);
                // FALLTHROUGH
                default:
                  return $type_ignored_param_one($ign, $rest, $fmtty);
                }
            }
          }
      }
      throw $caml_wrap_thrown_exception($Type_mismatch) as \Throwable;
    };
    $type_ignored_format_substitution->contents = 
    (dynamic $sub_fmtty, dynamic $fmt, dynamic $match) ==> {
      $sub_fmtty_rest__26 = null;
      $fmt__13 = null;
      $match__14 = null;
      $sub_fmtty_rest__25 = null;
      $fmtty_rest__12 = null;
      $sub_fmtty_rest__24 = null;
      $fmt__12 = null;
      $match__13 = null;
      $sub_fmtty_rest__23 = null;
      $fmtty_rest__11 = null;
      $sub_fmtty_rest__22 = null;
      $fmt__11 = null;
      $match__12 = null;
      $sub_fmtty_rest__21 = null;
      $fmtty_rest__10 = null;
      $sub_fmtty_rest__20 = null;
      $fmt__10 = null;
      $match__11 = null;
      $sub_fmtty_rest__19 = null;
      $fmtty_rest__9 = null;
      $sub_fmtty_rest__18 = null;
      $fmt__9 = null;
      $match__10 = null;
      $f2 = null;
      $f4 = null;
      $match__9 = null;
      $sub_fmtty__0 = null;
      $c8_ = null;
      $c7_ = null;
      $sub1_fmtty__0 = null;
      $sub2_fmtty__2 = null;
      $sub_fmtty_rest__17 = null;
      $sub1_fmtty = null;
      $sub2_fmtty__1 = null;
      $fmtty_rest__8 = null;
      $sub_fmtty_rest__16 = null;
      $fmt__8 = null;
      $match__8 = null;
      $sub2_fmtty__0 = null;
      $sub_fmtty_rest__15 = null;
      $sub2_fmtty = null;
      $fmtty_rest__7 = null;
      $sub_fmtty_rest__14 = null;
      $fmt__7 = null;
      $match__7 = null;
      $sub_fmtty_rest__13 = null;
      $fmtty_rest__6 = null;
      $sub_fmtty_rest__12 = null;
      $fmt__6 = null;
      $match__6 = null;
      $sub_fmtty_rest__11 = null;
      $fmtty_rest__5 = null;
      $sub_fmtty_rest__10 = null;
      $fmt__5 = null;
      $match__5 = null;
      $sub_fmtty_rest__9 = null;
      $fmtty_rest__4 = null;
      $sub_fmtty_rest__8 = null;
      $fmt__4 = null;
      $match__4 = null;
      $sub_fmtty_rest__7 = null;
      $fmtty_rest__3 = null;
      $sub_fmtty_rest__6 = null;
      $fmt__3 = null;
      $match__3 = null;
      $sub_fmtty_rest__5 = null;
      $fmtty_rest__2 = null;
      $sub_fmtty_rest__4 = null;
      $fmt__2 = null;
      $match__2 = null;
      $sub_fmtty_rest__3 = null;
      $fmtty_rest__1 = null;
      $sub_fmtty_rest__2 = null;
      $fmt__1 = null;
      $match__1 = null;
      $sub_fmtty_rest__1 = null;
      $fmtty_rest__0 = null;
      $sub_fmtty_rest__0 = null;
      $fmt__0 = null;
      $match__0 = null;
      $sub_fmtty_rest = null;
      $fmtty_rest = null;
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
              $match__0 =
                $type_ignored_format_substitution->contents(
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
              $match__1 =
                $type_ignored_format_substitution->contents(
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
              $match__2 =
                $type_ignored_format_substitution->contents(
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
              $match__3 =
                $type_ignored_format_substitution->contents(
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
              $match__4 =
                $type_ignored_format_substitution->contents(
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
              $match__5 =
                $type_ignored_format_substitution->contents(
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
              $match__6 =
                $type_ignored_format_substitution->contents(
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
              $match__7 =
                $type_ignored_format_substitution->contents(
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
              $match__8 =
                $type_ignored_format_substitution->contents(
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
              $c7_ =
                Vector{0, $call1($CamlinternalFormatBasics[2], $sub1_fmtty)};
              if (
                $caml_notequal(
                  Vector{
                    0,
                    $call1($CamlinternalFormatBasics[2], $sub1_fmtty__0)
                  },
                  $c7_
                )
              ) {
                throw $caml_wrap_thrown_exception($Type_mismatch) as \Throwable;
              }
              $c8_ =
                Vector{0, $call1($CamlinternalFormatBasics[2], $sub2_fmtty__1)
                };
              if (
                $caml_notequal(
                  Vector{
                    0,
                    $call1($CamlinternalFormatBasics[2], $sub2_fmtty__2)
                  },
                  $c8_
                )
              ) {
                throw $caml_wrap_thrown_exception($Type_mismatch) as \Throwable;
              }
              $sub_fmtty__0 =
                $trans->contents($symm->contents($sub1_fmtty), $sub2_fmtty__1);
              $match__9 = $fmtty_rel_det->contents($sub_fmtty__0);
              $f4 = $match__9[4];
              $f2 = $match__9[2];
              $call1($f2, 0);
              $call1($f4, 0);
              $match__10 =
                $type_ignored_format_substitution->contents(
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
              $match__11 =
                $type_ignored_format_substitution->contents(
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
              $match__12 =
                $type_ignored_format_substitution->contents(
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
              $match__13 =
                $type_ignored_format_substitution->contents(
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
              $match__14 =
                $type_ignored_format_substitution->contents(
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
      throw $caml_wrap_thrown_exception($Type_mismatch) as \Throwable;
    };
    $recast = (dynamic $fmt, dynamic $fmtty) ==> {
      $c6_ = $symm->contents($fmtty);
      return $type_format($fmt, $call1($CamlinternalFormatBasics[2], $c6_));
    };
    $fix_padding = (dynamic $padty, dynamic $width, dynamic $str) ==> {
      $switch__0 = null;
      $switch__1 = null;
      $switch__2 = null;
      $switch__3 = null;
      $len = $caml_ml_string_length($str);
      $padty__0 = 0 <= $width ? $padty : (0);
      $width__0 = $call1($Pervasives[6], $width);
      if ($width__0 <= $len) {return $str;}
      $c5_ = 2 === $padty__0 ? 48 : (32);
      $res = $call2($Bytes[1], $width__0, $c5_);
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
    $fix_int_precision = (dynamic $prec, dynamic $str) ==> {
      $res = null;
      $res__0 = null;
      $switcher = null;
      $res__1 = null;
      $switch__0 = null;
      $switch__1 = null;
      $switch__2 = null;
      $prec__0 = $call1($Pervasives[6], $prec);
      $len = $caml_ml_string_length($str);
      $c = $caml_string_get($str, 0);
      if (58 <= $c) {
        $switch__0 =
          71 <= $c
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
                    $switch__2 =
                      120 === $caml_string_get($str, 1)
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
    $string_to_caml_string = (dynamic $str) ==> {
      $str__0 = $call1($String[13], $str);
      $l = $caml_ml_string_length($str__0);
      $res = $call2($Bytes[1], (int) ($l + 2), 34);
      $caml_blit_string($str__0, 0, $res, 1, $l);
      return $call1($Bytes[42], $res);
    };
    $convert_int = (dynamic $iconv, dynamic $n) ==> {
      $c4_ = null;
      switch($iconv) {
        // FALLTHROUGH
        case 0:
          $c4_ = $cst_d;
          break;
        // FALLTHROUGH
        case 1:
          $c4_ = $cst_d__0;
          break;
        // FALLTHROUGH
        case 2:
          $c4_ = $cst_d__1;
          break;
        // FALLTHROUGH
        case 3:
          $c4_ = $cst_i__0;
          break;
        // FALLTHROUGH
        case 4:
          $c4_ = $cst_i__1;
          break;
        // FALLTHROUGH
        case 5:
          $c4_ = $cst_i__2;
          break;
        // FALLTHROUGH
        case 6:
          $c4_ = $cst_x;
          break;
        // FALLTHROUGH
        case 7:
          $c4_ = $cst_x__0;
          break;
        // FALLTHROUGH
        case 8:
          $c4_ = $cst_X;
          break;
        // FALLTHROUGH
        case 9:
          $c4_ = $cst_X__0;
          break;
        // FALLTHROUGH
        case 10:
          $c4_ = $cst_o;
          break;
        // FALLTHROUGH
        case 11:
          $c4_ = $cst_o__0;
          break;
        // FALLTHROUGH
        default:
          $c4_ = $cst_u;
        }
      return $caml_format_int($c4_, $n);
    };
    $convert_int32 = (dynamic $iconv, dynamic $n) ==> {
      $c3_ = null;
      switch($iconv) {
        // FALLTHROUGH
        case 0:
          $c3_ = $cst_ld;
          break;
        // FALLTHROUGH
        case 1:
          $c3_ = $cst_ld__0;
          break;
        // FALLTHROUGH
        case 2:
          $c3_ = $cst_ld__1;
          break;
        // FALLTHROUGH
        case 3:
          $c3_ = $cst_li__0;
          break;
        // FALLTHROUGH
        case 4:
          $c3_ = $cst_li__1;
          break;
        // FALLTHROUGH
        case 5:
          $c3_ = $cst_li__2;
          break;
        // FALLTHROUGH
        case 6:
          $c3_ = $cst_lx;
          break;
        // FALLTHROUGH
        case 7:
          $c3_ = $cst_lx__0;
          break;
        // FALLTHROUGH
        case 8:
          $c3_ = $cst_lX;
          break;
        // FALLTHROUGH
        case 9:
          $c3_ = $cst_lX__0;
          break;
        // FALLTHROUGH
        case 10:
          $c3_ = $cst_lo;
          break;
        // FALLTHROUGH
        case 11:
          $c3_ = $cst_lo__0;
          break;
        // FALLTHROUGH
        default:
          $c3_ = $cst_lu;
        }
      return $caml_format_int($c3_, $n);
    };
    $convert_nativeint = (dynamic $iconv, dynamic $n) ==> {
      $c2_ = null;
      switch($iconv) {
        // FALLTHROUGH
        case 0:
          $c2_ = $cst_nd;
          break;
        // FALLTHROUGH
        case 1:
          $c2_ = $cst_nd__0;
          break;
        // FALLTHROUGH
        case 2:
          $c2_ = $cst_nd__1;
          break;
        // FALLTHROUGH
        case 3:
          $c2_ = $cst_ni__0;
          break;
        // FALLTHROUGH
        case 4:
          $c2_ = $cst_ni__1;
          break;
        // FALLTHROUGH
        case 5:
          $c2_ = $cst_ni__2;
          break;
        // FALLTHROUGH
        case 6:
          $c2_ = $cst_nx;
          break;
        // FALLTHROUGH
        case 7:
          $c2_ = $cst_nx__0;
          break;
        // FALLTHROUGH
        case 8:
          $c2_ = $cst_nX;
          break;
        // FALLTHROUGH
        case 9:
          $c2_ = $cst_nX__0;
          break;
        // FALLTHROUGH
        case 10:
          $c2_ = $cst_no;
          break;
        // FALLTHROUGH
        case 11:
          $c2_ = $cst_no__0;
          break;
        // FALLTHROUGH
        default:
          $c2_ = $cst_nu;
        }
      return $caml_format_int($c2_, $n);
    };
    $convert_int64 = (dynamic $iconv, dynamic $n) ==> {
      $c1_ = null;
      switch($iconv) {
        // FALLTHROUGH
        case 0:
          $c1_ = $cst_Ld;
          break;
        // FALLTHROUGH
        case 1:
          $c1_ = $cst_Ld__0;
          break;
        // FALLTHROUGH
        case 2:
          $c1_ = $cst_Ld__1;
          break;
        // FALLTHROUGH
        case 3:
          $c1_ = $cst_Li__0;
          break;
        // FALLTHROUGH
        case 4:
          $c1_ = $cst_Li__1;
          break;
        // FALLTHROUGH
        case 5:
          $c1_ = $cst_Li__2;
          break;
        // FALLTHROUGH
        case 6:
          $c1_ = $cst_Lx;
          break;
        // FALLTHROUGH
        case 7:
          $c1_ = $cst_Lx__0;
          break;
        // FALLTHROUGH
        case 8:
          $c1_ = $cst_LX;
          break;
        // FALLTHROUGH
        case 9:
          $c1_ = $cst_LX__0;
          break;
        // FALLTHROUGH
        case 10:
          $c1_ = $cst_Lo;
          break;
        // FALLTHROUGH
        case 11:
          $c1_ = $cst_Lo__0;
          break;
        // FALLTHROUGH
        default:
          $c1_ = $cst_Lu;
        }
      return $runtime["caml_int64_format"]($c1_, $n);
    };
    $convert_float = (dynamic $fconv, dynamic $prec__0, dynamic $x) ==> {
      $switch__1 = null;
      $switch__0 = null;
      $c0_ = null;
      $match__0 = null;
      $i__0 = null;
      $cZ_ = null;
      $match = null;
      $i = null;
      $len = null;
      $cY_ = null;
      $str = null;
      $sign = null;
      $buf = null;
      $symb = null;
      $prec = null;
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
        $str = $runtime["caml_hexstring_of_float"]($x, $prec__0, $sign);
        return 19 <= $fconv ? $call1($String[29], $str) : ($str);
      }
      if (15 === $fconv) {$cY_ = $cst_12g;}
      else {
        $prec = $call1($Pervasives[6], $prec__0);
        $symb = $char_of_fconv($fconv);
        $buf = $buffer_create(16);
        $buffer_add_char($buf, 37);
        $bprint_fconv_flag($buf, $fconv);
        $buffer_add_char($buf, 46);
        $buffer_add_string($buf, $call1($Pervasives[21], $prec));
        $buffer_add_char($buf, $symb);
        $cY_ = $buffer_contents($buf);
      }
      $str__0 = $runtime["caml_format_float"]($cY_, $x);
      if (15 === $fconv) {
        $len = $caml_ml_string_length($str__0);
        $match__0 = $runtime["caml_classify_float"]($x);
        if (3 === $match__0) {
          return $x < 0 ? $cst_neg_infinity : ($cst_infinity);
        }
        if (4 <= $match__0) {return $cst_nan;}
        $i = 0;
        for (;;) {
          if ($i === $len) {$c0_ = 0;}
          else {
            $match = $caml_string_get($str__0, $i);
            $cZ_ = (int) ($match + -46);
            $switch__1 =
              23 < $unsigned_right_shift_32($cZ_, 0)
                ? 55 === $cZ_ ? 1 : (0)
                : (21 < $unsigned_right_shift_32((int) ($cZ_ + -1), 0)
                 ? 1
                 : (0));
            if (! $switch__1) {$i__0 = (int) ($i + 1);$i = $i__0;continue;}
            $c0_ = 1;
          }
          return $c0_ ? $str__0 : ($call2($Pervasives[16], $str__0, $cst__16));
        }
      }
      return $str__0;
    };
    $string_of_fmtty = (dynamic $fmtty) ==> {
      $buf = $buffer_create(16);
      $bprint_fmtty->contents($buf, $fmtty);
      return $buffer_contents($buf);
    };
    $make_int_padding_precision = 
    (dynamic $k, dynamic $o, dynamic $acc, dynamic $fmt, dynamic $pad, dynamic $match, dynamic $trans, dynamic $iconv) ==> {
      $p__1 = null;
      $cX_ = null;
      $p__0 = null;
      $cW_ = null;
      $cV_ = null;
      $p = null;
      if ($is_int($pad)) {
        if ($is_int($match)) {
          return 0 === $match
            ? (dynamic $x) ==> {
             $str = $call2($trans, $iconv, $x);
             return $make_printf->contents($k, $o, Vector{4, $acc, $str}, $fmt
             );
           }
            : ((dynamic $p, dynamic $x) ==> {
             $str = $fix_int_precision($p, $call2($trans, $iconv, $x));
             return $make_printf->contents($k, $o, Vector{4, $acc, $str}, $fmt
             );
           });
        }
        $p = $match[1];
        return (dynamic $x) ==> {
          $str = $fix_int_precision($p, $call2($trans, $iconv, $x));
          return $make_printf->contents($k, $o, Vector{4, $acc, $str}, $fmt);
        };
      }
      else {
        if (0 === $pad[0]) {
          $cV_ = $pad[2];
          $cW_ = $pad[1];
          if ($is_int($match)) {
            return 0 === $match
              ? (dynamic $x) ==> {
               $str = $fix_padding($cW_, $cV_, $call2($trans, $iconv, $x));
               return $make_printf->contents(
                 $k,
                 $o,
                 Vector{4, $acc, $str},
                 $fmt
               );
             }
              : ((dynamic $p, dynamic $x) ==> {
               $str = $fix_padding(
                 $cW_,
                 $cV_,
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
          return (dynamic $x) ==> {
            $str = $fix_padding(
              $cW_,
              $cV_,
              $fix_int_precision($p__0, $call2($trans, $iconv, $x))
            );
            return $make_printf->contents($k, $o, Vector{4, $acc, $str}, $fmt);
          };
        }
        $cX_ = $pad[1];
        if ($is_int($match)) {
          return 0 === $match
            ? (dynamic $w, dynamic $x) ==> {
             $str = $fix_padding($cX_, $w, $call2($trans, $iconv, $x));
             return $make_printf->contents($k, $o, Vector{4, $acc, $str}, $fmt
             );
           }
            : ((dynamic $w, dynamic $p, dynamic $x) ==> {
             $str = $fix_padding(
               $cX_,
               $w,
               $fix_int_precision($p, $call2($trans, $iconv, $x))
             );
             return $make_printf->contents($k, $o, Vector{4, $acc, $str}, $fmt
             );
           });
        }
        $p__1 = $match[1];
        return (dynamic $w, dynamic $x) ==> {
          $str = $fix_padding(
            $cX_,
            $w,
            $fix_int_precision($p__1, $call2($trans, $iconv, $x))
          );
          return $make_printf->contents($k, $o, Vector{4, $acc, $str}, $fmt);
        };
      }
    };
    $make_padding = 
    (dynamic $k, dynamic $o, dynamic $acc, dynamic $fmt, dynamic $pad, dynamic $trans) ==> {
      $padty__0 = null;
      $padty = null;
      $width = null;
      if ($is_int($pad)) {
        return (dynamic $x) ==> {
          $new_acc = Vector{4, $acc, $call1($trans, $x)} as dynamic;
          return $make_printf->contents($k, $o, $new_acc, $fmt);
        };
      }
      else {
        if (0 === $pad[0]) {
          $width = $pad[2];
          $padty = $pad[1];
          return (dynamic $x) ==> {
            $new_acc = Vector{
              4,
              $acc,
              $fix_padding($padty, $width, $call1($trans, $x))
            } as dynamic;
            return $make_printf->contents($k, $o, $new_acc, $fmt);
          };
        }
        $padty__0 = $pad[1];
        return (dynamic $w, dynamic $x) ==> {
          $new_acc = Vector{
            4,
            $acc,
            $fix_padding($padty__0, $w, $call1($trans, $x))
          } as dynamic;
          return $make_printf->contents($k, $o, $new_acc, $fmt);
        };
      }
    };
    $make_printf__0 = 
    (dynamic $counter, dynamic $k, dynamic $o, dynamic $acc, dynamic $fmt) ==> {
      $rest = null;
      $rest__0 = null;
      $rest__1 = null;
      $pad = null;
      $rest__2 = null;
      $pad__0 = null;
      $rest__3 = null;
      $prec = null;
      $pad__1 = null;
      $iconv = null;
      $rest__4 = null;
      $prec__0 = null;
      $pad__2 = null;
      $iconv__0 = null;
      $rest__5 = null;
      $prec__1 = null;
      $pad__3 = null;
      $iconv__1 = null;
      $rest__6 = null;
      $prec__2 = null;
      $pad__4 = null;
      $iconv__2 = null;
      $rest__7 = null;
      $prec__3 = null;
      $pad__5 = null;
      $fconv = null;
      $rest__8 = null;
      $pad__6 = null;
      $fmt__1 = null;
      $acc__1 = null;
      $fmt__2 = null;
      $str = null;
      $acc__2 = null;
      $fmt__3 = null;
      $chr = null;
      $acc__3 = null;
      $rest__9 = null;
      $sub_fmtty = null;
      $ty = null;
      $rest__10 = null;
      $fmtty = null;
      $rest__11 = null;
      $rest__12 = null;
      $fmt__4 = null;
      $fmting_lit = null;
      $acc__4 = null;
      $cP_ = null;
      $rest__13 = null;
      $match = null;
      $fmt__5 = null;
      $k__1 = null;
      $rest__14 = null;
      $match__0 = null;
      $fmt__6 = null;
      $k__2 = null;
      $rest__15 = null;
      $new_acc = null;
      $rest__16 = null;
      $rest__17 = null;
      $rest__18 = null;
      $ign = null;
      $rest__19 = null;
      $f = null;
      $arity = null;
      $cQ_ = null;
      $p = null;
      $cR_ = null;
      $cS_ = null;
      $p__0 = null;
      $cT_ = null;
      $p__1 = null;
      $k__3 = null;
      $k__4 = null;
      $counter__0 = null;
      $counter__1 = null;
      $k__0 = $k;
      $acc__0 = $acc;
      $fmt__0 = $fmt;
      for (;;) {
        if ($is_int($fmt__0)) {
          return $call2($k__0, $o, $acc__0);
        }
        else {
          $continue_label = null;
          switch($fmt__0[0]) {
            // FALLTHROUGH
            case 0:
              $rest = $fmt__0[1];
              return (dynamic $c) ==> {
                $new_acc = Vector{5, $acc__0, $c} as dynamic;
                return $make_printf->contents($k__0, $o, $new_acc, $rest);
              };
            // FALLTHROUGH
            case 1:
              $rest__0 = $fmt__0[1];
              return (dynamic $c) ==> {
                $str = $call1($Char[2], $c);
                $l = $caml_ml_string_length($str);
                $res = $call2($Bytes[1], (int) ($l + 2), 39);
                $caml_blit_string($str, 0, $res, 1, $l);
                $new_acc = Vector{4, $acc__0, $call1($Bytes[42], $res)} as dynamic;
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
                (dynamic $str) ==> {return $str;}
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
              if ($is_int($pad__5)) {
                if ($is_int($prec__3)) {
                  return 0 === $prec__3
                    ? (dynamic $x) ==> {
                     $str = $convert_float($fconv, $default_float_precision, $x);
                     return $make_printf->contents(
                       $k__0,
                       $o,
                       Vector{4, $acc__0, $str},
                       $rest__7
                     );
                   }
                    : ((dynamic $p, dynamic $x) ==> {
                     $str = $convert_float($fconv, $p, $x);
                     return $make_printf->contents(
                       $k__0,
                       $o,
                       Vector{4, $acc__0, $str},
                       $rest__7
                     );
                   });
                }
                $p = $prec__3[1];
                return (dynamic $x) ==> {
                  $str = $convert_float($fconv, $p, $x);
                  return $make_printf->contents(
                    $k__0,
                    $o,
                    Vector{4, $acc__0, $str},
                    $rest__7
                  );
                };
              }
              else {
                if (0 === $pad__5[0]) {
                  $cR_ = $pad__5[2];
                  $cS_ = $pad__5[1];
                  if ($is_int($prec__3)) {
                    return 0 === $prec__3
                      ? (dynamic $x) ==> {
                       $str = $convert_float($fconv, $default_float_precision, $x);
                       $str__0 = $fix_padding($cS_, $cR_, $str);
                       return $make_printf->contents(
                         $k__0,
                         $o,
                         Vector{4, $acc__0, $str__0},
                         $rest__7
                       );
                     }
                      : ((dynamic $p, dynamic $x) ==> {
                       $str = $fix_padding(
                         $cS_,
                         $cR_,
                         $convert_float($fconv, $p, $x)
                       );
                       return $make_printf->contents(
                         $k__0,
                         $o,
                         Vector{4, $acc__0, $str},
                         $rest__7
                       );
                     });
                  }
                  $p__0 = $prec__3[1];
                  return (dynamic $x) ==> {
                    $str = $fix_padding(
                      $cS_,
                      $cR_,
                      $convert_float($fconv, $p__0, $x)
                    );
                    return $make_printf->contents(
                      $k__0,
                      $o,
                      Vector{4, $acc__0, $str},
                      $rest__7
                    );
                  };
                }
                $cT_ = $pad__5[1];
                if ($is_int($prec__3)) {
                  return 0 === $prec__3
                    ? (dynamic $w, dynamic $x) ==> {
                     $str = $convert_float($fconv, $default_float_precision, $x);
                     $str__0 = $fix_padding($cT_, $w, $str);
                     return $make_printf->contents(
                       $k__0,
                       $o,
                       Vector{4, $acc__0, $str__0},
                       $rest__7
                     );
                   }
                    : ((dynamic $w, dynamic $p, dynamic $x) ==> {
                     $str = $fix_padding($cT_, $w, $convert_float($fconv, $p, $x)
                     );
                     return $make_printf->contents(
                       $k__0,
                       $o,
                       Vector{4, $acc__0, $str},
                       $rest__7
                     );
                   });
                }
                $p__1 = $prec__3[1];
                return (dynamic $w, dynamic $x) ==> {
                  $str = $fix_padding(
                    $cT_,
                    $w,
                    $convert_float($fconv, $p__1, $x)
                  );
                  return $make_printf->contents(
                    $k__0,
                    $o,
                    Vector{4, $acc__0, $str},
                    $rest__7
                  );
                };
              }
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
              $continue_label = "#";break;
            // FALLTHROUGH
            case 11:
              $fmt__2 = $fmt__0[2];
              $str = $fmt__0[1];
              $acc__2 = Vector{2, $acc__0, $str};
              $acc__0 = $acc__2;
              $fmt__0 = $fmt__2;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 12:
              $fmt__3 = $fmt__0[2];
              $chr = $fmt__0[1];
              $acc__3 = Vector{3, $acc__0, $chr};
              $acc__0 = $acc__3;
              $fmt__0 = $fmt__3;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 13:
              $rest__9 = $fmt__0[3];
              $sub_fmtty = $fmt__0[2];
              $ty = $string_of_fmtty($sub_fmtty);
              return (dynamic $str) ==> {
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
              return (dynamic $param) ==> {
                $fmt = $param[1];
                $cU_ = $recast($fmt, $fmtty);
                return $make_printf->contents(
                  $k__0,
                  $o,
                  $acc__0,
                  $call2($CamlinternalFormatBasics[3], $cU_, $rest__10)
                );
              };
            // FALLTHROUGH
            case 15:
              $rest__11 = $fmt__0[1];
              return (dynamic $f, dynamic $x) ==> {
                return $make_printf->contents(
                  $k__0,
                  $o,
                  Vector{
                    6,
                    $acc__0,
                    (dynamic $o) ==> {return $call2($f, $o, $x);}
                  },
                  $rest__11
                );
              };
            // FALLTHROUGH
            case 16:
              $rest__12 = $fmt__0[1];
              return (dynamic $f) ==> {
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
              $continue_label = "#";break;
            // FALLTHROUGH
            case 18:
              $cP_ = $fmt__0[1];
              if (0 === $cP_[0]) {
                $rest__13 = $fmt__0[2];
                $match = $cP_[1];
                $fmt__5 = $match[1];
                $k__3 =
                  (dynamic $acc, dynamic $k, dynamic $rest) ==> {
                    $k__0 = (dynamic $koc, dynamic $kacc) ==> {
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
                $continue_label = "#";break;
              }
              $rest__14 = $fmt__0[2];
              $match__0 = $cP_[1];
              $fmt__6 = $match__0[1];
              $k__4 =
                (dynamic $acc, dynamic $k, dynamic $rest) ==> {
                  $k__0 = (dynamic $koc, dynamic $kacc) ==> {
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
              $continue_label = "#";break;
            // FALLTHROUGH
            case 19:
              throw $caml_wrap_thrown_exception(
                      Vector{0, $Assert_failure, $q_}
                    ) as \Throwable;
            // FALLTHROUGH
            case 20:
              $rest__15 = $fmt__0[3];
              $new_acc = Vector{8, $acc__0, $cst_Printf_bad_conversion};
              return (dynamic $param) ==> {
                return $make_printf->contents($k__0, $o, $new_acc, $rest__15);
              };
            // FALLTHROUGH
            case 21:
              $rest__16 = $fmt__0[2];
              return (dynamic $n) ==> {
                $new_acc = Vector{4, $acc__0, $caml_format_int($cst_u__0, $n)} as dynamic;
                return $make_printf->contents($k__0, $o, $new_acc, $rest__16);
              };
            // FALLTHROUGH
            case 22:
              $rest__17 = $fmt__0[1];
              return (dynamic $c) ==> {
                $new_acc = Vector{5, $acc__0, $c} as dynamic;
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
              $cQ_ = $call1($f, 0);
              if ($counter < 50) {
                $counter__0 = (int) ($counter + 1);
                return $make_custom__0->contents(
                  $counter__0,
                  $k__0,
                  $o,
                  $acc__0,
                  $rest__19,
                  $arity,
                  $cQ_
                );
              }
              return $caml_trampoline_return(
                $make_custom__0->contents,
                varray[0,$k__0,$o,$acc__0,$rest__19,$arity,$cQ_]
              );
            }
          if ($continue_label === "#") {continue;}
        }
      }
    };
    $make_ignored_param__0->contents = 
    (dynamic $counter, dynamic $k, dynamic $o, dynamic $acc, dynamic $ign, dynamic $fmt) ==> {
      $counter__14 = null;
      $counter__13 = null;
      $counter__12 = null;
      $counter__11 = null;
      $counter__10 = null;
      $counter__9 = null;
      $counter__8 = null;
      $counter__7 = null;
      $counter__6 = null;
      $counter__5 = null;
      $counter__4 = null;
      $counter__3 = null;
      $counter__2 = null;
      $counter__1 = null;
      $counter__0 = null;
      $fmtty = null;
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
            throw $caml_wrap_thrown_exception(Vector{0, $Assert_failure, $r_}) as \Throwable;
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
    $make_from_fmtty__0->contents = 
    (dynamic $counter, dynamic $k, dynamic $o, dynamic $acc, dynamic $fmtty, dynamic $fmt) ==> {
      $counter__0 = null;
      $rest__11 = null;
      $rest__10 = null;
      $rest__9 = null;
      $ty = null;
      $ty1 = null;
      $ty2 = null;
      $rest__8 = null;
      $rest__7 = null;
      $rest__6 = null;
      $rest__5 = null;
      $rest__4 = null;
      $rest__3 = null;
      $rest__2 = null;
      $rest__1 = null;
      $rest__0 = null;
      $rest = null;
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
            return (dynamic $param) ==> {
              return $make_from_fmtty->contents($k, $o, $acc, $rest, $fmt);
            };
          // FALLTHROUGH
          case 1:
            $rest__0 = $fmtty[1];
            return (dynamic $param) ==> {
              return $make_from_fmtty->contents($k, $o, $acc, $rest__0, $fmt);
            };
          // FALLTHROUGH
          case 2:
            $rest__1 = $fmtty[1];
            return (dynamic $param) ==> {
              return $make_from_fmtty->contents($k, $o, $acc, $rest__1, $fmt);
            };
          // FALLTHROUGH
          case 3:
            $rest__2 = $fmtty[1];
            return (dynamic $param) ==> {
              return $make_from_fmtty->contents($k, $o, $acc, $rest__2, $fmt);
            };
          // FALLTHROUGH
          case 4:
            $rest__3 = $fmtty[1];
            return (dynamic $param) ==> {
              return $make_from_fmtty->contents($k, $o, $acc, $rest__3, $fmt);
            };
          // FALLTHROUGH
          case 5:
            $rest__4 = $fmtty[1];
            return (dynamic $param) ==> {
              return $make_from_fmtty->contents($k, $o, $acc, $rest__4, $fmt);
            };
          // FALLTHROUGH
          case 6:
            $rest__5 = $fmtty[1];
            return (dynamic $param) ==> {
              return $make_from_fmtty->contents($k, $o, $acc, $rest__5, $fmt);
            };
          // FALLTHROUGH
          case 7:
            $rest__6 = $fmtty[1];
            return (dynamic $param) ==> {
              return $make_from_fmtty->contents($k, $o, $acc, $rest__6, $fmt);
            };
          // FALLTHROUGH
          case 8:
            $rest__7 = $fmtty[2];
            return (dynamic $param) ==> {
              return $make_from_fmtty->contents($k, $o, $acc, $rest__7, $fmt);
            };
          // FALLTHROUGH
          case 9:
            $rest__8 = $fmtty[3];
            $ty2 = $fmtty[2];
            $ty1 = $fmtty[1];
            $ty = $trans->contents($symm->contents($ty1), $ty2);
            return (dynamic $param) ==> {
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
            return (dynamic $param, dynamic $cO_) ==> {
              return $make_from_fmtty->contents($k, $o, $acc, $rest__9, $fmt);
            };
          // FALLTHROUGH
          case 11:
            $rest__10 = $fmtty[1];
            return (dynamic $param) ==> {
              return $make_from_fmtty->contents($k, $o, $acc, $rest__10, $fmt);
            };
          // FALLTHROUGH
          case 12:
            $rest__11 = $fmtty[1];
            return (dynamic $param) ==> {
              return $make_from_fmtty->contents($k, $o, $acc, $rest__11, $fmt);
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
    (dynamic $counter, dynamic $k, dynamic $o, dynamic $acc, dynamic $fmt) ==> {
      $counter__0 = null;
      $cN_ = Vector{8, $acc, $cst_Printf_bad_conversion__0} as dynamic;
      if ($counter < 50) {
        $counter__0 = (int) ($counter + 1);
        return $make_printf__0($counter__0, $k, $o, $cN_, $fmt);
      }
      return $caml_trampoline_return(
        $make_printf__0,
        varray[0,$k,$o,$cN_,$fmt]
      );
    };
    $make_custom__0->contents = 
    (dynamic $counter, dynamic $k, dynamic $o, dynamic $acc, dynamic $rest, dynamic $arity, dynamic $f) ==> {
      $counter__0 = null;
      $arity__0 = null;
      if ($arity) {
        $arity__0 = $arity[1];
        return (dynamic $x) ==> {
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
      $cM_ = Vector{4, $acc, $f} as dynamic;
      if ($counter < 50) {
        $counter__0 = (int) ($counter + 1);
        return $make_printf__0($counter__0, $k, $o, $cM_, $rest);
      }
      return $caml_trampoline_return(
        $make_printf__0,
        varray[0,$k,$o,$cM_,$rest]
      );
    };
    $make_printf->contents = 
    (dynamic $k, dynamic $o, dynamic $acc, dynamic $fmt) ==> {
      return $caml_trampoline($make_printf__0(0, $k, $o, $acc, $fmt));
    };
    $make_ignored_param = 
    (dynamic $k, dynamic $o, dynamic $acc, dynamic $ign, dynamic $fmt) ==> {
      return $caml_trampoline(
        $make_ignored_param__0->contents(0, $k, $o, $acc, $ign, $fmt)
      );
    };
    $make_from_fmtty->contents = 
    (dynamic $k, dynamic $o, dynamic $acc, dynamic $fmtty, dynamic $fmt) ==> {
      return $caml_trampoline(
        $make_from_fmtty__0->contents(0, $k, $o, $acc, $fmtty, $fmt)
      );
    };
    $make_custom->contents = 
    (dynamic $k, dynamic $o, dynamic $acc, dynamic $rest, dynamic $arity, dynamic $f) ==> {
      return $caml_trampoline(
        $make_custom__0->contents(0, $k, $o, $acc, $rest, $arity, $f)
      );
    };
    $fn_of_padding_precision = 
    (dynamic $k, dynamic $o, dynamic $fmt, dynamic $pad, dynamic $prec) ==> {
      $cw_ = null;
      $cv_ = null;
      $cu_ = null;
      $ct_ = null;
      $cs_ = null;
      $cr_ = null;
      $cq_ = null;
      $cp_ = null;
      $co_ = null;
      $cn_ = null;
      $cm_ = null;
      $cl_ = null;
      $ck_ = null;
      $cj_ = null;
      $ci_ = null;
      if ($is_int($pad)) {
        if ($is_int($prec)) {
          if (0 === $prec) {
            $ci_ = $make_iprintf->contents($k, $o, $fmt);
            return (dynamic $cA_) ==> {return $ci_;};
          }
          $cj_ = $make_iprintf->contents($k, $o, $fmt);
          $ck_ = (dynamic $cz_) ==> {return $cj_;};
          return (dynamic $cy_) ==> {return $ck_;};
        }
        $cl_ = $make_iprintf->contents($k, $o, $fmt);
        return (dynamic $cx_) ==> {return $cl_;};
      }
      else {
        if (0 === $pad[0]) {
          if ($is_int($prec)) {
            if (0 === $prec) {
              $cm_ = $make_iprintf->contents($k, $o, $fmt);
              return (dynamic $cL_) ==> {return $cm_;};
            }
            $cn_ = $make_iprintf->contents($k, $o, $fmt);
            $co_ = (dynamic $cK_) ==> {return $cn_;};
            return (dynamic $cJ_) ==> {return $co_;};
          }
          $cp_ = $make_iprintf->contents($k, $o, $fmt);
          return (dynamic $cI_) ==> {return $cp_;};
        }
        if ($is_int($prec)) {
          if (0 === $prec) {
            $cq_ = $make_iprintf->contents($k, $o, $fmt);
            $cr_ = (dynamic $cH_) ==> {return $cq_;};
            return (dynamic $cG_) ==> {return $cr_;};
          }
          $cs_ = $make_iprintf->contents($k, $o, $fmt);
          $ct_ = (dynamic $cF_) ==> {return $cs_;};
          $cu_ = (dynamic $cE_) ==> {return $ct_;};
          return (dynamic $cD_) ==> {return $cu_;};
        }
        $cv_ = $make_iprintf->contents($k, $o, $fmt);
        $cw_ = (dynamic $cC_) ==> {return $cv_;};
        return (dynamic $cB_) ==> {return $cw_;};
      }
    };
    $make_iprintf__0 = 
    (dynamic $counter, dynamic $k, dynamic $o, dynamic $fmt) ==> {
      $rest = null;
      $bx_ = null;
      $rest__0 = null;
      $by_ = null;
      $bz_ = null;
      $rest__1 = null;
      $bA_ = null;
      $rest__2 = null;
      $bB_ = null;
      $rest__3 = null;
      $bC_ = null;
      $bD_ = null;
      $bE_ = null;
      $rest__4 = null;
      $bF_ = null;
      $rest__5 = null;
      $bG_ = null;
      $rest__6 = null;
      $bH_ = null;
      $bI_ = null;
      $rest__7 = null;
      $prec = null;
      $pad = null;
      $rest__8 = null;
      $prec__0 = null;
      $pad__0 = null;
      $rest__9 = null;
      $prec__1 = null;
      $pad__1 = null;
      $rest__10 = null;
      $prec__2 = null;
      $pad__2 = null;
      $rest__11 = null;
      $prec__3 = null;
      $pad__3 = null;
      $bJ_ = null;
      $rest__12 = null;
      $bK_ = null;
      $rest__13 = null;
      $bL_ = null;
      $rest__14 = null;
      $bM_ = null;
      $bN_ = null;
      $fmt__1 = null;
      $fmt__2 = null;
      $fmt__3 = null;
      $rest__15 = null;
      $bO_ = null;
      $rest__16 = null;
      $fmtty = null;
      $rest__17 = null;
      $bP_ = null;
      $bQ_ = null;
      $rest__18 = null;
      $bR_ = null;
      $fmt__4 = null;
      $bS_ = null;
      $rest__19 = null;
      $match = null;
      $fmt__5 = null;
      $k__1 = null;
      $rest__20 = null;
      $match__0 = null;
      $fmt__6 = null;
      $k__2 = null;
      $rest__21 = null;
      $bT_ = null;
      $rest__22 = null;
      $bU_ = null;
      $rest__23 = null;
      $bV_ = null;
      $rest__24 = null;
      $ign = null;
      $bW_ = null;
      $rest__25 = null;
      $arity = null;
      $k__3 = null;
      $k__4 = null;
      $counter__0 = null;
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
              $bx_ = $make_iprintf->contents($k__0, $o, $rest);
              return (dynamic $ch_) ==> {return $bx_;};
            // FALLTHROUGH
            case 1:
              $rest__0 = $fmt__0[1];
              $by_ = $make_iprintf->contents($k__0, $o, $rest__0);
              return (dynamic $cg_) ==> {return $by_;};
            // FALLTHROUGH
            case 2:
              $bz_ = $fmt__0[1];
              if ($is_int($bz_)) {
                $rest__1 = $fmt__0[2];
                $bA_ = $make_iprintf->contents($k__0, $o, $rest__1);
                return (dynamic $cc_) ==> {return $bA_;};
              }
              else {
                if (0 === $bz_[0]) {
                  $rest__2 = $fmt__0[2];
                  $bB_ = $make_iprintf->contents($k__0, $o, $rest__2);
                  return (dynamic $cf_) ==> {return $bB_;};
                }
                $rest__3 = $fmt__0[2];
                $bC_ = $make_iprintf->contents($k__0, $o, $rest__3);
                $bD_ = (dynamic $ce_) ==> {return $bC_;};
                return (dynamic $cd_) ==> {return $bD_;};
              }
            // FALLTHROUGH
            case 3:
              $bE_ = $fmt__0[1];
              if ($is_int($bE_)) {
                $rest__4 = $fmt__0[2];
                $bF_ = $make_iprintf->contents($k__0, $o, $rest__4);
                return (dynamic $b9_) ==> {return $bF_;};
              }
              else {
                if (0 === $bE_[0]) {
                  $rest__5 = $fmt__0[2];
                  $bG_ = $make_iprintf->contents($k__0, $o, $rest__5);
                  return (dynamic $cb_) ==> {return $bG_;};
                }
                $rest__6 = $fmt__0[2];
                $bH_ = $make_iprintf->contents($k__0, $o, $rest__6);
                $bI_ = (dynamic $ca_) ==> {return $bH_;};
                return (dynamic $b__) ==> {return $bI_;};
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
              $bJ_ = $fmt__0[1];
              if ($is_int($bJ_)) {
                $rest__12 = $fmt__0[2];
                $bK_ = $make_iprintf->contents($k__0, $o, $rest__12);
                return (dynamic $b5_) ==> {return $bK_;};
              }
              else {
                if (0 === $bJ_[0]) {
                  $rest__13 = $fmt__0[2];
                  $bL_ = $make_iprintf->contents($k__0, $o, $rest__13);
                  return (dynamic $b8_) ==> {return $bL_;};
                }
                $rest__14 = $fmt__0[2];
                $bM_ = $make_iprintf->contents($k__0, $o, $rest__14);
                $bN_ = (dynamic $b7_) ==> {return $bM_;};
                return (dynamic $b6_) ==> {return $bN_;};
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
              $bO_ = $make_iprintf->contents($k__0, $o, $rest__15);
              return (dynamic $b4_) ==> {return $bO_;};
            // FALLTHROUGH
            case 14:
              $rest__16 = $fmt__0[3];
              $fmtty = $fmt__0[2];
              return (dynamic $param) ==> {
                $fmt = $param[1];
                $b3_ = $recast($fmt, $fmtty);
                return $make_iprintf->contents(
                  $k__0,
                  $o,
                  $call2($CamlinternalFormatBasics[3], $b3_, $rest__16)
                );
              };
            // FALLTHROUGH
            case 15:
              $rest__17 = $fmt__0[1];
              $bP_ = $make_iprintf->contents($k__0, $o, $rest__17);
              $bQ_ = (dynamic $b2_) ==> {return $bP_;};
              return (dynamic $b1_) ==> {return $bQ_;};
            // FALLTHROUGH
            case 16:
              $rest__18 = $fmt__0[1];
              $bR_ = $make_iprintf->contents($k__0, $o, $rest__18);
              return (dynamic $b0_) ==> {return $bR_;};
            // FALLTHROUGH
            case 17:
              $fmt__4 = $fmt__0[2];
              $fmt__0 = $fmt__4;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 18:
              $bS_ = $fmt__0[1];
              if (0 === $bS_[0]) {
                $rest__19 = $fmt__0[2];
                $match = $bS_[1];
                $fmt__5 = $match[1];
                $k__3 =
                  (dynamic $k, dynamic $rest) ==> {
                    $k__0 = (dynamic $koc) ==> {
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
              $match__0 = $bS_[1];
              $fmt__6 = $match__0[1];
              $k__4 =
                (dynamic $k, dynamic $rest) ==> {
                  $k__0 = (dynamic $koc) ==> {
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
              $bT_ = $make_iprintf->contents($k__0, $o, $rest__21);
              return (dynamic $bZ_) ==> {return $bT_;};
            // FALLTHROUGH
            case 21:
              $rest__22 = $fmt__0[2];
              $bU_ = $make_iprintf->contents($k__0, $o, $rest__22);
              return (dynamic $bY_) ==> {return $bU_;};
            // FALLTHROUGH
            case 22:
              $rest__23 = $fmt__0[1];
              $bV_ = $make_iprintf->contents($k__0, $o, $rest__23);
              return (dynamic $bX_) ==> {return $bV_;};
            // FALLTHROUGH
            case 23:
              $rest__24 = $fmt__0[2];
              $ign = $fmt__0[1];
              $bW_ = 0;
              return $make_ignored_param(
                (dynamic $x, dynamic $param) ==> {return $call1($k__0, $x);},
                $o,
                $bW_,
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
          if ($continue_label === "#") {continue;}
        }
      }
    };
    $fn_of_custom_arity__0->contents = 
    (dynamic $counter, dynamic $k, dynamic $o, dynamic $fmt, dynamic $param) ==> {
      $counter__0 = null;
      $bv_ = null;
      $arity = null;
      if ($param) {
        $arity = $param[1];
        $bv_ = $fn_of_custom_arity->contents($k, $o, $fmt, $arity);
        return (dynamic $bw_) ==> {return $bv_;};
      }
      if ($counter < 50) {
        $counter__0 = (int) ($counter + 1);
        return $make_iprintf__0($counter__0, $k, $o, $fmt);
      }
      return $caml_trampoline_return($make_iprintf__0, varray[0,$k,$o,$fmt]);
    };
    $make_iprintf->contents = (dynamic $k, dynamic $o, dynamic $fmt) ==> {
      return $caml_trampoline($make_iprintf__0(0, $k, $o, $fmt));
    };
    $fn_of_custom_arity->contents = 
    (dynamic $k, dynamic $o, dynamic $fmt, dynamic $param) ==> {
      return $caml_trampoline(
        $fn_of_custom_arity__0->contents(0, $k, $o, $fmt, $param)
      );
    };
    $output_acc->contents = (dynamic $o, dynamic $acc) ==> {
      $fmting_lit = null;
      $p = null;
      $s = null;
      $bt_ = null;
      $bu_ = null;
      $acc__1 = null;
      $acc__2 = null;
      $s__0 = null;
      $p__0 = null;
      $c = null;
      $p__1 = null;
      $f = null;
      $p__2 = null;
      $p__3 = null;
      $msg = null;
      $p__4 = null;
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
              return $call2($Pervasives[54], $o, $s);
            // FALLTHROUGH
            case 1:
              $bt_ = $acc__0[2];
              $bu_ = $acc__0[1];
              if (0 === $bt_[0]) {
                $acc__1 = $bt_[1];
                $output_acc->contents($o, $bu_);
                $call2($Pervasives[54], $o, $cst__17);
                $acc__0 = $acc__1;
                $continue_label = "#";break;
              }
              $acc__2 = $bt_[1];
              $output_acc->contents($o, $bu_);
              $call2($Pervasives[54], $o, $cst__18);
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
          if ($continue_label === "#") {continue;}
        }
      }
    };
    $bufput_acc->contents = (dynamic $b, dynamic $acc) ==> {
      $fmting_lit = null;
      $p = null;
      $s = null;
      $br_ = null;
      $bs_ = null;
      $acc__1 = null;
      $acc__2 = null;
      $s__0 = null;
      $p__0 = null;
      $c = null;
      $p__1 = null;
      $f = null;
      $p__2 = null;
      $acc__3 = null;
      $msg = null;
      $p__3 = null;
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
              return $call2($Buffer[14], $b, $s);
            // FALLTHROUGH
            case 1:
              $br_ = $acc__0[2];
              $bs_ = $acc__0[1];
              if (0 === $br_[0]) {
                $acc__1 = $br_[1];
                $bufput_acc->contents($b, $bs_);
                $call2($Buffer[14], $b, $cst__19);
                $acc__0 = $acc__1;
                $continue_label = "#";break;
              }
              $acc__2 = $br_[1];
              $bufput_acc->contents($b, $bs_);
              $call2($Buffer[14], $b, $cst__20);
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
          if ($continue_label === "#") {continue;}
        }
      }
    };
    $strput_acc->contents = (dynamic $b, dynamic $acc) ==> {
      $fmting_lit = null;
      $p = null;
      $s = null;
      $bo_ = null;
      $bp_ = null;
      $acc__1 = null;
      $acc__2 = null;
      $s__0 = null;
      $p__0 = null;
      $c = null;
      $p__1 = null;
      $f = null;
      $p__2 = null;
      $bq_ = null;
      $acc__3 = null;
      $msg = null;
      $p__3 = null;
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
              return $call2($Buffer[14], $b, $s);
            // FALLTHROUGH
            case 1:
              $bo_ = $acc__0[2];
              $bp_ = $acc__0[1];
              if (0 === $bo_[0]) {
                $acc__1 = $bo_[1];
                $strput_acc->contents($b, $bp_);
                $call2($Buffer[14], $b, $cst__21);
                $acc__0 = $acc__1;
                $continue_label = "#";break;
              }
              $acc__2 = $bo_[1];
              $strput_acc->contents($b, $bp_);
              $call2($Buffer[14], $b, $cst__22);
              $acc__0 = $acc__2;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 6:
              $f = $acc__0[2];
              $p__2 = $acc__0[1];
              $strput_acc->contents($b, $p__2);
              $bq_ = $call1($f, 0);
              return $call2($Buffer[14], $b, $bq_);
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
          if ($continue_label === "#") {continue;}
        }
      }
    };
    $failwith_message = (dynamic $param) ==> {
      $fmt = $param[1];
      $buf = $call1($Buffer[1], 256);
      $k = (dynamic $param, dynamic $acc) ==> {
        $strput_acc->contents($buf, $acc);
        $bn_ = $call1($Buffer[2], $buf);
        return $call1($Pervasives[2], $bn_);
      };
      return $make_printf->contents($k, 0, 0, $fmt);
    };
    $open_box_of_string = (dynamic $str) ==> {
      $switch__0 = null;
      $bl_ = null;
      $box_type = null;
      $indent = null;
      if ($runtime["caml_string_equal"]($str, $cst__23)) {return $v_;}
      $len = $caml_ml_string_length($str);
      $invalid_box = (dynamic $param) ==> {
        return $call1($failwith_message($w_), $str);
      };
      $parse_spaces = (dynamic $i) ==> {
        $match = null;
        $i__1 = null;
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
      $parse_lword = (dynamic $i, dynamic $j) ==> {
        $match = null;
        $switcher = null;
        $j__1 = null;
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
      $parse_int = (dynamic $i, dynamic $j) ==> {
        $match = null;
        $j__1 = null;
        $switch__0 = null;
        $j__0 = $j;
        for (;;) {
          if ($j__0 === $len) {return $j__0;}
          $match = $caml_string_get($str, $j__0);
          $switch__0 =
            48 <= $match ? 58 <= $match ? 0 : (1) : (45 === $match ? 1 : (0));
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
          $bl_ =
            $runtime["caml_int_of_string"](
              $call3($String[4], $str, $nstart, (int) ($nend - $nstart))
            );
          $indent = $bl_;
        }
        catch(\Throwable $bm_) {
          $bm_ = $runtime["caml_wrap_exception"]($bm_);
          if ($bm_[1] !== $Failure) {
            throw $caml_wrap_thrown_exception_reraise($bm_) as \Throwable;
          }
          $indent = $invalid_box(0);
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
    $make_padding_fmt_ebb = (dynamic $pad, dynamic $fmt) ==> {
      $s__0 = null;
      $s = null;
      $w = null;
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
    $make_padprec_fmt_ebb = (dynamic $pad, dynamic $prec, dynamic $fmt) ==> {
      $s__0 = null;
      $s = null;
      $w = null;
      $match = null;
      $p = null;
      if ($is_int($prec)) {
        $match = 0 === $prec ? Vector{0, 0, $fmt} : (Vector{0, 1, $fmt});
      }
      else {$p = $prec[1];$match = Vector{0, Vector{0, $p}, $fmt};}
      $prec__0 = $match[1];
      if ($is_int($pad)) {
        return Vector{0, 0, $prec__0, $fmt};
      }
      else {
        if (0 === $pad[0]) {
          $w = $pad[2];
          $s = $pad[1];
          return Vector{0, Vector{0, $s, $w}, $prec__0, $fmt};
        }
        $s__0 = $pad[1];
        return Vector{0, Vector{1, $s__0}, $prec__0, $fmt};
      }
    };
    $fmt_ebb_of_string = (dynamic $legacy_behavior, dynamic $str) ==> {
      $compute_int_conv = new Ref();
      $incompatible_flag = new Ref();
      $parse = new Ref();
      $parse_flags = new Ref();
      $parse_good_break = new Ref();
      $parse_integer = new Ref();
      $parse_magic_size = new Ref();
      $parse_positive = new Ref();
      $parse_spaces = new Ref();
      $parse_tag = new Ref();
      $search_subformat_end = new Ref();
      $legacy_behavior__0 = null;
      $flag = null;
      if ($legacy_behavior) {
        $flag = $legacy_behavior[1];
        $legacy_behavior__0 = $flag;
      }
      else {$legacy_behavior__0 = 1;}
      $invalid_format_message = (dynamic $str_ind, dynamic $msg) ==> {
        return $call3($failwith_message($x_), $str, $str_ind, $msg);
      };
      $unexpected_end_of_format = (dynamic $end_ind) ==> {
        return $invalid_format_message($end_ind, $cst_unexpected_end_of_format
        );
      };
      $expected_character = 
      (dynamic $str_ind, dynamic $expected, dynamic $read) ==> {
        return $call4($failwith_message($z_), $str, $str_ind, $expected, $read
        );
      };
      $add_literal = (dynamic $lit_start, dynamic $str_ind, dynamic $fmt) ==> {
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
      $parse->contents = (dynamic $lit_start, dynamic $end_ind) ==> {
        $match = null;
        $fmt_rest = null;
        $str_ind__0 = null;
        $match__0 = null;
        $fmt_rest__0 = null;
        $str_ind__1 = null;
        $str_ind__2 = null;
        $bk_ = null;
        $match__1 = null;
        $c = null;
        $switcher = null;
        $match__2 = null;
        $fmt_rest__1 = null;
        $match__3 = null;
        $fmt_rest__2 = null;
        $switcher__0 = null;
        $match__4 = null;
        $fmt_rest__3 = null;
        $match__5 = null;
        $fmt_rest__4 = null;
        $switcher__1 = null;
        $match__6 = null;
        $fmt_rest__5 = null;
        $match__7 = null;
        $fmt_rest__6 = null;
        $match__8 = null;
        $fmt_rest__7 = null;
        $match__9 = null;
        $fmt_rest__8 = null;
        $match__10 = null;
        $fmt_rest__9 = null;
        $match__11 = null;
        $fmt_rest__10 = null;
        $match__12 = null;
        $fmt_rest__11 = null;
        $switch__0 = null;
        $switch__1 = null;
        $str_ind = $lit_start;
        for (;;) {
          if ($str_ind === $end_ind) {
            return $add_literal($lit_start, $str_ind, 0);
          }
          $match = $caml_string_get($str, $str_ind);
          if (37 === $match) {
            $str_ind__2 = (int) ($str_ind + 1);
            if ($str_ind__2 === $end_ind) {
              $unexpected_end_of_format($end_ind);
            }
            $match__1 = $caml_string_get($str, $str_ind__2);
            $bk_ =
              95 === $match__1
                ? $parse_flags->contents(
                 $str_ind,
                 (int)
                 ($str_ind__2 + 1),
                 $end_ind,
                 1
               )
                : ($parse_flags->contents($str_ind, $str_ind__2, $end_ind, 0));
            $fmt_rest = $bk_[1];
            return $add_literal($lit_start, $str_ind, $fmt_rest);
          }
          if (64 === $match) {
            $str_ind__0 = (int) ($str_ind + 1);
            if ($str_ind__0 === $end_ind) {$match__0 = $K_;}
            else {
              $c = $caml_string_get($str, $str_ind__0);
              if (65 <= $c) {
                if (94 <= $c) {
                  $switcher = (int) ($c + -123);
                  if (2 < $unsigned_right_shift_32($switcher, 0)) {$switch__0 = 0;}
                  else {
                    switch($switcher) {
                      // FALLTHROUGH
                      case 0:
                        $match__0 =
                          $parse_tag->contents(1, (int) ($str_ind__0 + 1), $end_ind);
                        $switch__0 = 1;
                        break;
                      // FALLTHROUGH
                      case 1:
                        $switch__0 = 0;
                        break;
                      // FALLTHROUGH
                      default:
                        $match__3 =
                          $parse->contents((int) ($str_ind__0 + 1), $end_ind);
                        $fmt_rest__2 = $match__3[1];
                        $match__0 = Vector{0, Vector{17, 1, $fmt_rest__2}};
                        $switch__0 = 1;
                      }
                  }
                }
                else {
                  if (91 <= $c) {
                    $switcher__0 = (int) ($c + -91);
                    switch($switcher__0) {
                      // FALLTHROUGH
                      case 0:
                        $match__0 =
                          $parse_tag->contents(0, (int) ($str_ind__0 + 1), $end_ind);
                        $switch__0 = 1;
                        break;
                      // FALLTHROUGH
                      case 1:
                        $switch__0 = 0;
                        break;
                      // FALLTHROUGH
                      default:
                        $match__4 =
                          $parse->contents((int) ($str_ind__0 + 1), $end_ind);
                        $fmt_rest__3 = $match__4[1];
                        $match__0 = Vector{0, Vector{17, 0, $fmt_rest__3}};
                        $switch__0 = 1;
                      }
                  }
                  else {$switch__0 = 0;}
                }
              }
              else {
                if (10 === $c) {
                  $match__5 =
                    $parse->contents((int) ($str_ind__0 + 1), $end_ind);
                  $fmt_rest__4 = $match__5[1];
                  $match__0 = Vector{0, Vector{17, 3, $fmt_rest__4}};
                  $switch__0 = 1;
                }
                else {
                  if (32 <= $c) {
                    $switcher__1 = (int) ($c + -32);
                    switch($switcher__1) {
                      // FALLTHROUGH
                      case 0:
                        $match__6 =
                          $parse->contents((int) ($str_ind__0 + 1), $end_ind);
                        $fmt_rest__5 = $match__6[1];
                        $match__0 = Vector{0, Vector{17, $L_, $fmt_rest__5}};
                        $switch__0 = 1;
                        break;
                      // FALLTHROUGH
                      case 5:
                        if ((int) ($str_ind__0 + 1) < $end_ind) {
                          if (37 === $caml_string_get($str, (int) ($str_ind__0 + 1))) {
                            $match__7 =
                              $parse->contents((int) ($str_ind__0 + 2), $end_ind);
                            $fmt_rest__6 = $match__7[1];
                            $match__0 = Vector{0, Vector{17, 6, $fmt_rest__6}};
                            $switch__0 = 1;
                            $switch__1 = 0;
                          }
                          else {$switch__1 = 1;}
                        }
                        else {$switch__1 = 1;}
                        if ($switch__1) {
                          $match__8 = $parse->contents($str_ind__0, $end_ind);
                          $fmt_rest__7 = $match__8[1];
                          $match__0 = Vector{0, Vector{12, 64, $fmt_rest__7}};
                          $switch__0 = 1;
                        }
                        break;
                      // FALLTHROUGH
                      case 12:
                        $match__9 =
                          $parse->contents((int) ($str_ind__0 + 1), $end_ind);
                        $fmt_rest__8 = $match__9[1];
                        $match__0 = Vector{0, Vector{17, $M_, $fmt_rest__8}};
                        $switch__0 = 1;
                        break;
                      // FALLTHROUGH
                      case 14:
                        $match__10 =
                          $parse->contents((int) ($str_ind__0 + 1), $end_ind);
                        $fmt_rest__9 = $match__10[1];
                        $match__0 = Vector{0, Vector{17, 4, $fmt_rest__9}};
                        $switch__0 = 1;
                        break;
                      // FALLTHROUGH
                      case 27:
                        $match__0 =
                          $parse_good_break->contents(
                            (int)
                            ($str_ind__0 + 1),
                            $end_ind
                          );
                        $switch__0 = 1;
                        break;
                      // FALLTHROUGH
                      case 28:
                        $match__0 =
                          $parse_magic_size->contents(
                            (int)
                            ($str_ind__0 + 1),
                            $end_ind
                          );
                        $switch__0 = 1;
                        break;
                      // FALLTHROUGH
                      case 31:
                        $match__11 =
                          $parse->contents((int) ($str_ind__0 + 1), $end_ind);
                        $fmt_rest__10 = $match__11[1];
                        $match__0 = Vector{0, Vector{17, 2, $fmt_rest__10}};
                        $switch__0 = 1;
                        break;
                      // FALLTHROUGH
                      case 32:
                        $match__12 =
                          $parse->contents((int) ($str_ind__0 + 1), $end_ind);
                        $fmt_rest__11 = $match__12[1];
                        $match__0 = Vector{0, Vector{17, 5, $fmt_rest__11}};
                        $switch__0 = 1;
                        break;
                      // FALLTHROUGH
                      default:
                        $switch__0 = 0;
                      }
                  }
                  else {$switch__0 = 0;}
                }
              }
              if (! $switch__0) {
                $match__2 =
                  $parse->contents((int) ($str_ind__0 + 1), $end_ind);
                $fmt_rest__1 = $match__2[1];
                $match__0 = Vector{0, Vector{17, Vector{2, $c}, $fmt_rest__1}};
              }
            }
            $fmt_rest__0 = $match__0[1];
            return $add_literal($lit_start, $str_ind, $fmt_rest__0);
          }
          $str_ind__1 = (int) ($str_ind + 1);
          $str_ind = $str_ind__1;
          continue;
        }
      };
      $parse_conversion = 
      (dynamic $pct_ind, dynamic $str_ind, dynamic $end_ind, dynamic $plus, dynamic $hash, dynamic $space, dynamic $ign, dynamic $pad, dynamic $prec, dynamic $padprec, dynamic $symb) ==> {
        $match = null;
        $ndec = null;
        $fmt_result = null;
        $av_ = null;
        $plus__0 = null;
        $aw_ = null;
        $hash__0 = null;
        $ax_ = null;
        $space__0 = null;
        $ay_ = null;
        $az_ = null;
        $aA_ = null;
        $aB_ = null;
        $aC_ = null;
        $plus__1 = null;
        $switcher = null;
        $aE_ = null;
        $aF_ = null;
        $aG_ = null;
        $iconv = null;
        $match__0 = null;
        $fmt_rest = null;
        $ignored = null;
        $aH_ = null;
        $aI_ = null;
        $aJ_ = null;
        $match__1 = null;
        $fmt_rest__0 = null;
        $prec__0 = null;
        $pad__0 = null;
        $aK_ = null;
        $aL_ = null;
        $aM_ = null;
        $iconv__0 = null;
        $match__2 = null;
        $fmt_rest__1 = null;
        $ignored__0 = null;
        $aN_ = null;
        $aO_ = null;
        $match__3 = null;
        $fmt_rest__2 = null;
        $prec__1 = null;
        $pad__1 = null;
        $aP_ = null;
        $aQ_ = null;
        $aR_ = null;
        $iconv__1 = null;
        $match__4 = null;
        $fmt_rest__3 = null;
        $ignored__1 = null;
        $aS_ = null;
        $aT_ = null;
        $match__5 = null;
        $fmt_rest__4 = null;
        $prec__2 = null;
        $pad__2 = null;
        $match__6 = null;
        $fmt_rest__5 = null;
        $match__7 = null;
        $fmt_rest__6 = null;
        $sub_end = null;
        $match__8 = null;
        $fmt_rest__7 = null;
        $match__9 = null;
        $sub_fmt = null;
        $sub_fmtty = null;
        $ignored__2 = null;
        $aU_ = null;
        $pad__3 = null;
        $match__10 = null;
        $fmt_rest__8 = null;
        $ignored__3 = null;
        $aV_ = null;
        $match__11 = null;
        $fmt_rest__9 = null;
        $pad__4 = null;
        $match__12 = null;
        $fmt_rest__10 = null;
        $aW_ = null;
        $space__1 = null;
        $plus__2 = null;
        $fconv = null;
        $match__13 = null;
        $fmt_rest__11 = null;
        $aX_ = null;
        $ignored__4 = null;
        $aY_ = null;
        $aZ_ = null;
        $match__14 = null;
        $fmt_rest__12 = null;
        $prec__3 = null;
        $pad__5 = null;
        $match__15 = null;
        $fmt_rest__13 = null;
        $counter = null;
        $ignored__5 = null;
        $a0_ = null;
        $symb__0 = null;
        $a1_ = null;
        $match__16 = null;
        $fmt_rest__14 = null;
        $counter__0 = null;
        $ignored__6 = null;
        $a2_ = null;
        $pad__6 = null;
        $match__17 = null;
        $fmt_rest__15 = null;
        $ignored__7 = null;
        $a3_ = null;
        $match__18 = null;
        $fmt_rest__16 = null;
        $pad__7 = null;
        $a4_ = null;
        $a5_ = null;
        $iconv__2 = null;
        $match__19 = null;
        $fmt_rest__17 = null;
        $ignored__8 = null;
        $a6_ = null;
        $a7_ = null;
        $match__20 = null;
        $fmt_rest__18 = null;
        $prec__4 = null;
        $pad__8 = null;
        $match__21 = null;
        $fmt_rest__19 = null;
        $ignored__9 = null;
        $a8_ = null;
        $match__22 = null;
        $fmt_rest__20 = null;
        $char_format = null;
        $match__23 = null;
        $fmt_rest__21 = null;
        $match__24 = null;
        $a9_ = null;
        $a__ = null;
        $ba_ = null;
        $match__25 = null;
        $fmt_rest__22 = null;
        $bb_ = null;
        $pad__9 = null;
        $match__26 = null;
        $fmt_rest__23 = null;
        $ignored__10 = null;
        $bc_ = null;
        $match__27 = null;
        $fmt_rest__24 = null;
        $pad__10 = null;
        $match__28 = null;
        $fmt_rest__25 = null;
        $sub_end__0 = null;
        $match__29 = null;
        $sub_fmt__0 = null;
        $match__30 = null;
        $fmt_rest__26 = null;
        $sub_fmtty__0 = null;
        $ignored__11 = null;
        $bd_ = null;
        $char_set = null;
        $add_char = null;
        $add_range = null;
        $fail_single_percent = null;
        $parse_char_set_after_char = null;
        $c = null;
        $next_ind = null;
        $match__31 = null;
        $str_ind__0 = null;
        $reverse = null;
        $str_ind__1 = null;
        $char_set__0 = null;
        $char_set__1 = null;
        $be_ = null;
        $switcher__0 = null;
        $space__2 = null;
        $plus__3 = null;
        $switcher__1 = null;
        $switcher__2 = null;
        $switcher__3 = null;
        $switcher__4 = null;
        $switcher__5 = null;
        $switcher__6 = null;
        $parse_char_set_after_char__0 = null;
        $parse_char_set_content = null;
        $switch__0 = null;
        $switch__1 = null;
        $switch__2 = null;
        $switch__3 = null;
        $switch__4 = null;
        $switch__5 = null;
        $switch__6 = null;
        $switch__7 = null;
        $switch__8 = null;
        $switch__9 = null;
        $switch__10 = null;
        $plus_used = Vector{0, 0} as dynamic;
        $hash_used = Vector{0, 0} as dynamic;
        $space_used = Vector{0, 0} as dynamic;
        $ign_used = Vector{0, 0} as dynamic;
        $pad_used = Vector{0, 0} as dynamic;
        $prec_used = Vector{0, 0} as dynamic;
        $get_plus = (dynamic $param) ==> {$plus_used[1] = 1;return $plus;};
        $get_hash = (dynamic $param) ==> {$hash_used[1] = 1;return $hash;};
        $get_space = (dynamic $param) ==> {$space_used[1] = 1;return $space;};
        $get_ign = (dynamic $param) ==> {$ign_used[1] = 1;return $ign;};
        $get_pad = (dynamic $param) ==> {$pad_used[1] = 1;return $pad;};
        $get_prec = (dynamic $param) ==> {$prec_used[1] = 1;return $prec;};
        $get_padprec = (dynamic $param) ==> {
          $pad_used[1] = 1;
          return $padprec;
        };
        $get_int_pad = (dynamic $param) ==> {
          $n = null;
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
                   $cst_precision
                 ));
              }
              return $pad;
            }
            return 2 <= $pad[1]
              ? $legacy_behavior__0
               ? $E_
               : ($incompatible_flag->contents(
                $pct_ind,
                $str_ind,
                48,
                $cst_precision__0
              ))
              : ($pad);
          }
        };
        $check_no_0 = (dynamic $symb, dynamic $pad) ==> {
          $width = null;
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
                   $cst_0
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
                $symb,
                $cst_0__0
              ))
              : ($pad);
          }
        };
        $opt_of_pad = (dynamic $c, dynamic $pad) ==> {
          $width__1 = null;
          $width__0 = null;
          $width = null;
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
                     $cst_0__1
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
        $get_pad_opt = (dynamic $c) ==> {return $opt_of_pad($c, $get_pad(0));};
        $get_padprec_opt = (dynamic $c) ==> {
          return $opt_of_pad($c, $get_padprec(0));
        };
        if (124 <= $symb) {$switch__0 = 0;}
        else {
          switch($symb) {
            // FALLTHROUGH
            case 33:
              $match__6 = $parse->contents($str_ind, $end_ind);
              $fmt_rest__5 = $match__6[1];
              $fmt_result = Vector{0, Vector{10, $fmt_rest__5}};
              $switch__0 = 1;
              break;
            // FALLTHROUGH
            case 40:
              $sub_end =
                $search_subformat_end->contents($str_ind, $end_ind, 41);
              $match__8 = $parse->contents((int) ($sub_end + 2), $end_ind);
              $fmt_rest__7 = $match__8[1];
              $match__9 = $parse->contents($str_ind, $sub_end);
              $sub_fmt = $match__9[1];
              $sub_fmtty = $fmtty_of_fmt->contents($sub_fmt);
              if ($get_ign(0)) {
                $ignored__2 = Vector{9, $get_pad_opt(95), $sub_fmtty};
                $aU_ = Vector{0, Vector{23, $ignored__2, $fmt_rest__7}};
              }
              else {
                $aU_ =
                  Vector{
                    0,
                    Vector{14, $get_pad_opt(40), $sub_fmtty, $fmt_rest__7}
                  };
              }
              $fmt_result = $aU_;
              $switch__0 = 1;
              break;
            // FALLTHROUGH
            case 44:
              $fmt_result = $parse->contents($str_ind, $end_ind);
              $switch__0 = 1;
              break;
            // FALLTHROUGH
            case 67:
              $match__12 = $parse->contents($str_ind, $end_ind);
              $fmt_rest__10 = $match__12[1];
              $aW_ =
                $get_ign(0)
                  ? Vector{0, Vector{23, 1, $fmt_rest__10}}
                  : (Vector{0, Vector{1, $fmt_rest__10}});
              $fmt_result = $aW_;
              $switch__0 = 1;
              break;
            // FALLTHROUGH
            case 78:
              $match__16 = $parse->contents($str_ind, $end_ind);
              $fmt_rest__14 = $match__16[1];
              $counter__0 = 2;
              if ($get_ign(0)) {
                $ignored__6 = Vector{11, $counter__0};
                $a2_ = Vector{0, Vector{23, $ignored__6, $fmt_rest__14}};
              }
              else {$a2_ = Vector{0, Vector{21, $counter__0, $fmt_rest__14}};}
              $fmt_result = $a2_;
              $switch__0 = 1;
              break;
            // FALLTHROUGH
            case 83:
              $pad__6 = $check_no_0($symb, $get_padprec(0));
              $match__17 = $parse->contents($str_ind, $end_ind);
              $fmt_rest__15 = $match__17[1];
              if ($get_ign(0)) {
                $ignored__7 = Vector{1, $get_padprec_opt(95)};
                $a3_ = Vector{0, Vector{23, $ignored__7, $fmt_rest__15}};
              }
              else {
                $match__18 = $make_padding_fmt_ebb($pad__6, $fmt_rest__15);
                $fmt_rest__16 = $match__18[2];
                $pad__7 = $match__18[1];
                $a3_ = Vector{0, Vector{3, $pad__7, $fmt_rest__16}};
              }
              $fmt_result = $a3_;
              $switch__0 = 1;
              break;
            // FALLTHROUGH
            case 91:
              if ($str_ind === $end_ind) {
                $unexpected_end_of_format($end_ind);
              }
              $char_set = $create_char_set(0);
              $add_char =
                (dynamic $c) ==> {return $add_in_char_set($char_set, $c);};
              $add_range =
                (dynamic $c__0, dynamic $c) ==> {
                  $bj_ = null;
                  $i = null;
                  if (! ($c < $c__0)) {
                    $i = $c__0;
                    for (;;) {
                      $add_in_char_set($char_set, $call1($Pervasives[17], $i));
                      $bj_ = (int) ($i + 1);
                      if ($c !== $i) {$i = $bj_;continue;}
                      break;
                    }
                  }
                  return 0;
                };
              $fail_single_percent =
                (dynamic $str_ind) ==> {
                  return $call2($failwith_message($O_), $str, $str_ind);
                };
              $parse_char_set_content =
                (dynamic $counter, dynamic $str_ind, dynamic $end_ind) ==> {
                  $c = null;
                  $str_ind__1 = null;
                  $bi_ = null;
                  $counter__0 = null;
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
                    $bi_ = (int) ($str_ind__0 + 1);
                    if ($counter < 50) {
                      $counter__0 = (int) ($counter + 1);
                      return $parse_char_set_after_char__0(
                        $counter__0,
                        $bi_,
                        $end_ind,
                        $c
                      );
                    }
                    return $caml_trampoline_return(
                      $parse_char_set_after_char__0,
                      varray[0,$bi_,$end_ind,$c]
                    );
                  }
                };
              $parse_char_set_after_char__0 =
                
                (dynamic $counter, dynamic $str_ind, dynamic $end_ind, dynamic $c) ==> {
                  $c__1 = null;
                  $bf_ = null;
                  $str_ind__1 = null;
                  $str_ind__2 = null;
                  $c__2 = null;
                  $c__3 = null;
                  $bg_ = null;
                  $bh_ = null;
                  $counter__0 = null;
                  $counter__1 = null;
                  $counter__2 = null;
                  $switch__0 = null;
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
                          $str_ind__2 = (int) ($str_ind__0 + 1);
                          if ($str_ind__2 === $end_ind) {
                            $unexpected_end_of_format($end_ind);
                          }
                          $c__2 = $caml_string_get($str, $str_ind__2);
                          if (37 === $c__2) {
                            if ((int) ($str_ind__2 + 1) === $end_ind) {$unexpected_end_of_format($end_ind);}
                            $c__3 = $caml_string_get($str, (int) ($str_ind__2 + 1));
                            if (37 !== $c__3) {
                              if (64 !== $c__3) {
                                return $fail_single_percent($str_ind__2);
                              }
                            }
                            $add_range($c__0, $c__3);
                            $bg_ = (int) ($str_ind__2 + 2);
                            if ($counter < 50) {
                              $counter__2 = (int) ($counter + 1);
                              return $parse_char_set_content($counter__2, $bg_, $end_ind);
                            }
                            return $caml_trampoline_return(
                              $parse_char_set_content,
                              varray[0,$bg_,$end_ind]
                            );
                          }
                          if (93 === $c__2) {
                            $add_char($c__0);
                            $add_char(45);
                            return (int) ($str_ind__2 + 1);
                          }
                          $add_range($c__0, $c__2);
                          $bh_ = (int) ($str_ind__2 + 1);
                          if ($counter < 50) {
                            $counter__1 = (int) ($counter + 1);
                            return $parse_char_set_content($counter__1, $bh_, $end_ind);
                          }
                          return $caml_trampoline_return(
                            $parse_char_set_content,
                            varray[0,$bh_,$end_ind]
                          );
                        }
                        $switch__0 = 1;
                      }
                    }
                    if (! $switch__0) {
                      if (37 === $c__0) {
                        $add_char($c__1);
                        $bf_ = (int) ($str_ind__0 + 1);
                        if ($counter < 50) {
                          $counter__0 = (int) ($counter + 1);
                          return $parse_char_set_content($counter__0, $bf_, $end_ind);
                        }
                        return $caml_trampoline_return(
                          $parse_char_set_content,
                          varray[0,$bf_,$end_ind]
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
              $parse_char_set_after_char =
                (dynamic $str_ind, dynamic $end_ind, dynamic $c) ==> {
                  return $caml_trampoline(
                    $parse_char_set_after_char__0(0, $str_ind, $end_ind, $c)
                  );
                };
              if ($str_ind === $end_ind) {
                $unexpected_end_of_format($end_ind);
              }
              $match__31 = $caml_string_get($str, $str_ind);
              if (94 === $match__31) {
                $str_ind__0 = (int) ($str_ind + 1);
                $str_ind__1 = $str_ind__0;
                $reverse = 1;
              }
              else {$str_ind__1 = $str_ind;$reverse = 0;}
              if ($str_ind__1 === $end_ind) {
                $unexpected_end_of_format($end_ind);
              }
              $c = $caml_string_get($str, $str_ind__1);
              $next_ind =
                $parse_char_set_after_char(
                  (int)
                  ($str_ind__1 + 1),
                  $end_ind,
                  $c
                );
              $char_set__0 = $freeze_char_set($char_set);
              $char_set__1 =
                $reverse ? $rev_char_set($char_set__0) : ($char_set__0);
              $match__21 = $parse->contents($next_ind, $end_ind);
              $fmt_rest__19 = $match__21[1];
              if ($get_ign(0)) {
                $ignored__9 = Vector{10, $get_pad_opt(95), $char_set__1};
                $a8_ = Vector{0, Vector{23, $ignored__9, $fmt_rest__19}};
              }
              else {
                $a8_ =
                  Vector{
                    0,
                    Vector{20, $get_pad_opt(91), $char_set__1, $fmt_rest__19}
                  };
              }
              $fmt_result = $a8_;
              $switch__0 = 1;
              break;
            // FALLTHROUGH
            case 97:
              $match__22 = $parse->contents($str_ind, $end_ind);
              $fmt_rest__20 = $match__22[1];
              $fmt_result = Vector{0, Vector{15, $fmt_rest__20}};
              $switch__0 = 1;
              break;
            // FALLTHROUGH
            case 99:
              $char_format =
                (dynamic $fmt_rest) ==> {
                  return $get_ign(0)
                    ? Vector{0, Vector{23, 0, $fmt_rest}}
                    : (Vector{0, Vector{0, $fmt_rest}});
                };
              $match__23 = $parse->contents($str_ind, $end_ind);
              $fmt_rest__21 = $match__23[1];
              $match__24 = $get_pad_opt(99);
              if ($match__24) {
                if (0 === $match__24[1]) {
                  $a9_ =
                    $get_ign(0)
                      ? Vector{0, Vector{23, 3, $fmt_rest__21}}
                      : (Vector{0, Vector{22, $fmt_rest__21}});
                  $a__ = $a9_;
                }
                else {
                  $a__ =
                    $legacy_behavior__0
                      ? $char_format($fmt_rest__21)
                      : ($invalid_format_message(
                       $str_ind,
                       $cst_non_zero_widths_are_unsupported_for_c_conversions
                     ));
                }
                $ba_ = $a__;
              }
              else {$ba_ = $char_format($fmt_rest__21);}
              $fmt_result = $ba_;
              $switch__0 = 1;
              break;
            // FALLTHROUGH
            case 114:
              $match__25 = $parse->contents($str_ind, $end_ind);
              $fmt_rest__22 = $match__25[1];
              $bb_ =
                $get_ign(0)
                  ? Vector{0, Vector{23, 2, $fmt_rest__22}}
                  : (Vector{0, Vector{19, $fmt_rest__22}});
              $fmt_result = $bb_;
              $switch__0 = 1;
              break;
            // FALLTHROUGH
            case 115:
              $pad__9 = $check_no_0($symb, $get_padprec(0));
              $match__26 = $parse->contents($str_ind, $end_ind);
              $fmt_rest__23 = $match__26[1];
              if ($get_ign(0)) {
                $ignored__10 = Vector{0, $get_padprec_opt(95)};
                $bc_ = Vector{0, Vector{23, $ignored__10, $fmt_rest__23}};
              }
              else {
                $match__27 = $make_padding_fmt_ebb($pad__9, $fmt_rest__23);
                $fmt_rest__24 = $match__27[2];
                $pad__10 = $match__27[1];
                $bc_ = Vector{0, Vector{2, $pad__10, $fmt_rest__24}};
              }
              $fmt_result = $bc_;
              $switch__0 = 1;
              break;
            // FALLTHROUGH
            case 116:
              $match__28 = $parse->contents($str_ind, $end_ind);
              $fmt_rest__25 = $match__28[1];
              $fmt_result = Vector{0, Vector{16, $fmt_rest__25}};
              $switch__0 = 1;
              break;
            // FALLTHROUGH
            case 123:
              $sub_end__0 =
                $search_subformat_end->contents($str_ind, $end_ind, 125);
              $match__29 = $parse->contents($str_ind, $sub_end__0);
              $sub_fmt__0 = $match__29[1];
              $match__30 = $parse->contents((int) ($sub_end__0 + 2), $end_ind);
              $fmt_rest__26 = $match__30[1];
              $sub_fmtty__0 = $fmtty_of_fmt->contents($sub_fmt__0);
              if ($get_ign(0)) {
                $ignored__11 = Vector{8, $get_pad_opt(95), $sub_fmtty__0};
                $bd_ = Vector{0, Vector{23, $ignored__11, $fmt_rest__26}};
              }
              else {
                $bd_ =
                  Vector{
                    0,
                    Vector{13, $get_pad_opt(123), $sub_fmtty__0, $fmt_rest__26}
                  };
              }
              $fmt_result = $bd_;
              $switch__0 = 1;
              break;
            // FALLTHROUGH
            case 66:
            // FALLTHROUGH
            case 98:
              $pad__3 = $check_no_0($symb, $get_padprec(0));
              $match__10 = $parse->contents($str_ind, $end_ind);
              $fmt_rest__8 = $match__10[1];
              if ($get_ign(0)) {
                $ignored__3 = Vector{7, $get_padprec_opt(95)};
                $aV_ = Vector{0, Vector{23, $ignored__3, $fmt_rest__8}};
              }
              else {
                $match__11 = $make_padding_fmt_ebb($pad__3, $fmt_rest__8);
                $fmt_rest__9 = $match__11[2];
                $pad__4 = $match__11[1];
                $aV_ = Vector{0, Vector{9, $pad__4, $fmt_rest__9}};
              }
              $fmt_result = $aV_;
              $switch__0 = 1;
              break;
            // FALLTHROUGH
            case 37:
            // FALLTHROUGH
            case 64:
              $match__7 = $parse->contents($str_ind, $end_ind);
              $fmt_rest__6 = $match__7[1];
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
                $symb__0 = $caml_string_get($str, $str_ind);
                $be_ = (int) ($symb__0 + -88);
                if (32 < $unsigned_right_shift_32($be_, 0)) {$switch__2 = 0;}
                else {
                  switch($be_) {
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
                      $a1_ = 1;
                      $switch__2 = 1;
                      break;
                    // FALLTHROUGH
                    default:
                      $switch__2 = 0;
                    }
                }
                if (! $switch__2) {$a1_ = 0;}
                if ($a1_) {
                  $switch__0 = 0;
                  $switch__1 = 0;
                }
                else {$switch__1 = 1;}
              }
              if ($switch__1) {
                $match__15 = $parse->contents($str_ind, $end_ind);
                $fmt_rest__13 = $match__15[1];
                if (108 <= $symb) {
                  if (111 <= $symb) {$switch__3 = 0;}
                  else {
                    $switcher__0 = (int) ($symb + -108);
                    switch($switcher__0) {
                      // FALLTHROUGH
                      case 0:
                        $counter = 0;
                        $switch__3 = 1;
                        break;
                      // FALLTHROUGH
                      case 1:
                        $switch__3 = 0;
                        break;
                      // FALLTHROUGH
                      default:
                        $counter = 1;
                        $switch__3 = 1;
                      }
                  }
                }
                else {
                  if (76 === $symb) {
                    $counter = 2;
                    $switch__3 = 1;
                  }
                  else {$switch__3 = 0;}
                }
                if (! $switch__3) {
                  throw $caml_wrap_thrown_exception(
                          Vector{0, $Assert_failure, $S_}
                        ) as \Throwable;
                }
                if ($get_ign(0)) {
                  $ignored__5 = Vector{11, $counter};
                  $a0_ = Vector{0, Vector{23, $ignored__5, $fmt_rest__13}};
                }
                else {$a0_ = Vector{0, Vector{21, $counter, $fmt_rest__13}};}
                $fmt_result = $a0_;
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
              $fmt_result =
                $call3($failwith_message($J_), $str, $pct_ind, $symb);
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
              $a4_ = $get_space(0);
              $a5_ = $get_hash(0);
              $iconv__2 =
                $compute_int_conv->contents(
                  $pct_ind,
                  $str_ind,
                  $get_plus(0),
                  $a5_,
                  $a4_,
                  $symb
                );
              $match__19 = $parse->contents($str_ind, $end_ind);
              $fmt_rest__17 = $match__19[1];
              if ($get_ign(0)) {
                $ignored__8 = Vector{2, $iconv__2, $get_pad_opt(95)};
                $a6_ = Vector{0, Vector{23, $ignored__8, $fmt_rest__17}};
              }
              else {
                $a7_ = $get_prec(0);
                $match__20 =
                  $make_padprec_fmt_ebb($get_int_pad(0), $a7_, $fmt_rest__17);
                $fmt_rest__18 = $match__20[3];
                $prec__4 = $match__20[2];
                $pad__8 = $match__20[1];
                $a6_ =
                  Vector{
                    0,
                    Vector{4, $iconv__2, $pad__8, $prec__4, $fmt_rest__18}
                  };
              }
              $fmt_result = $a6_;
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
              $space__1 = $get_space(0);
              $plus__2 = $get_plus(0);
              $plus__3 = $plus__2;
              $space__2 = $space__1;
              for (;;) {
                if (0 === $plus__3) {
                  if (0 === $space__2) {
                    if (73 <= $symb) {
                      $switcher__1 = (int) ($symb + -101);
                      if (3 < $unsigned_right_shift_32($switcher__1, 0)) {$switch__4 = 0;}
                      else {
                        switch($switcher__1) {
                          // FALLTHROUGH
                          case 0:
                            $fconv = 3;
                            $switch__4 = 1;
                            break;
                          // FALLTHROUGH
                          case 1:
                            $fconv = 0;
                            $switch__4 = 1;
                            break;
                          // FALLTHROUGH
                          case 2:
                            $fconv = 9;
                            $switch__4 = 1;
                            break;
                          // FALLTHROUGH
                          default:
                            $fconv = 16;
                            $switch__4 = 1;
                          }
                      }
                    }
                    else {
                      if (69 <= $symb) {
                        $switcher__2 = (int) ($symb + -69);
                        switch($switcher__2) {
                          // FALLTHROUGH
                          case 0:
                            $fconv = 6;
                            $switch__4 = 1;
                            break;
                          // FALLTHROUGH
                          case 1:
                            $fconv = 15;
                            $switch__4 = 1;
                            break;
                          // FALLTHROUGH
                          case 2:
                            $fconv = 12;
                            $switch__4 = 1;
                            break;
                          // FALLTHROUGH
                          default:
                            $fconv = 19;
                            $switch__4 = 1;
                          }
                      }
                      else {$switch__4 = 0;}
                    }
                    if (! $switch__4) {
                      throw $caml_wrap_thrown_exception(
                              Vector{0, $Assert_failure, $U_}
                            ) as \Throwable;
                    }
                  }
                  else {
                    if (73 <= $symb) {
                      $switcher__3 = (int) ($symb + -101);
                      if (3 < $unsigned_right_shift_32($switcher__3, 0)) {$switch__5 = 0;}
                      else {
                        switch($switcher__3) {
                          // FALLTHROUGH
                          case 0:
                            $fconv = 5;
                            $switch__5 = 1;
                            break;
                          // FALLTHROUGH
                          case 1:
                            $fconv = 2;
                            $switch__5 = 1;
                            break;
                          // FALLTHROUGH
                          case 2:
                            $fconv = 11;
                            $switch__5 = 1;
                            break;
                          // FALLTHROUGH
                          default:
                            $fconv = 18;
                            $switch__5 = 1;
                          }
                      }
                    }
                    else {
                      if (69 <= $symb) {
                        $switcher__4 = (int) ($symb + -69);
                        switch($switcher__4) {
                          // FALLTHROUGH
                          case 0:
                            $fconv = 8;
                            $switch__5 = 1;
                            break;
                          // FALLTHROUGH
                          case 1:
                            $switch__5 = 0;
                            break;
                          // FALLTHROUGH
                          case 2:
                            $fconv = 14;
                            $switch__5 = 1;
                            break;
                          // FALLTHROUGH
                          default:
                            $fconv = 21;
                            $switch__5 = 1;
                          }
                      }
                      else {$switch__5 = 0;}
                    }
                    if (! $switch__5) {
                      if ($legacy_behavior__0) {$space__2 = 0;continue;}
                      $fconv =
                        $incompatible_flag->contents(
                          $pct_ind,
                          $str_ind,
                          $symb,
                          $cst__37
                        );
                    }
                  }
                }
                else {
                  if (0 === $space__2) {
                    if (73 <= $symb) {
                      $switcher__5 = (int) ($symb + -101);
                      if (3 < $unsigned_right_shift_32($switcher__5, 0)) {$switch__6 = 0;}
                      else {
                        switch($switcher__5) {
                          // FALLTHROUGH
                          case 0:
                            $fconv = 4;
                            $switch__6 = 1;
                            break;
                          // FALLTHROUGH
                          case 1:
                            $fconv = 1;
                            $switch__6 = 1;
                            break;
                          // FALLTHROUGH
                          case 2:
                            $fconv = 10;
                            $switch__6 = 1;
                            break;
                          // FALLTHROUGH
                          default:
                            $fconv = 17;
                            $switch__6 = 1;
                          }
                      }
                    }
                    else {
                      if (69 <= $symb) {
                        $switcher__6 = (int) ($symb + -69);
                        switch($switcher__6) {
                          // FALLTHROUGH
                          case 0:
                            $fconv = 7;
                            $switch__6 = 1;
                            break;
                          // FALLTHROUGH
                          case 1:
                            $switch__6 = 0;
                            break;
                          // FALLTHROUGH
                          case 2:
                            $fconv = 13;
                            $switch__6 = 1;
                            break;
                          // FALLTHROUGH
                          default:
                            $fconv = 20;
                            $switch__6 = 1;
                          }
                      }
                      else {$switch__6 = 0;}
                    }
                    if (! $switch__6) {
                      if ($legacy_behavior__0) {$plus__3 = 0;continue;}
                      $fconv =
                        $incompatible_flag->contents(
                          $pct_ind,
                          $str_ind,
                          $symb,
                          $cst__38
                        );
                    }
                  }
                  else {
                    if ($legacy_behavior__0) {$space__2 = 0;continue;}
                    $fconv =
                      $incompatible_flag->contents(
                        $pct_ind,
                        $str_ind,
                        32,
                        $cst__39
                      );
                  }
                }
                $match__13 = $parse->contents($str_ind, $end_ind);
                $fmt_rest__11 = $match__13[1];
                if ($get_ign(0)) {
                  $match = $get_prec(0);
                  if ($is_int($match)) {
                    $aX_ =
                      0 === $match
                        ? 0
                        : ($incompatible_flag->contents(
                         $pct_ind,
                         $str_ind,
                         95,
                         $cst__27
                       ));
                  }
                  else {$ndec = $match[1];$aX_ = Vector{0, $ndec};}
                  $ignored__4 = Vector{6, $get_pad_opt(95), $aX_};
                  $aY_ = Vector{0, Vector{23, $ignored__4, $fmt_rest__11}};
                }
                else {
                  $aZ_ = $get_prec(0);
                  $match__14 =
                    $make_padprec_fmt_ebb($get_pad(0), $aZ_, $fmt_rest__11);
                  $fmt_rest__12 = $match__14[3];
                  $prec__3 = $match__14[2];
                  $pad__5 = $match__14[1];
                  $aY_ =
                    Vector{
                      0,
                      Vector{8, $fconv, $pad__5, $prec__3, $fmt_rest__12}
                    };
                }
                $fmt_result = $aY_;
                $switch__0 = 1;
                break;
              }
              break;
            // FALLTHROUGH
            default:
              $switch__0 = 0;
            }
        }
        if (! $switch__0) {
          if (108 <= $symb) {
            if (111 <= $symb) {$switch__7 = 0;}
            else {
              $switcher = (int) ($symb + -108);
              switch($switcher) {
                // FALLTHROUGH
                case 0:
                  $aE_ = $caml_string_get($str, $str_ind);
                  $aF_ = $get_space(0);
                  $aG_ = $get_hash(0);
                  $iconv =
                    $compute_int_conv->contents(
                      $pct_ind,
                      (int)
                      ($str_ind + 1),
                      $get_plus(0),
                      $aG_,
                      $aF_,
                      $aE_
                    );
                  $match__0 = $parse->contents((int) ($str_ind + 1), $end_ind);
                  $fmt_rest = $match__0[1];
                  if ($get_ign(0)) {
                    $ignored = Vector{3, $iconv, $get_pad_opt(95)};
                    $aH_ = Vector{0, Vector{23, $ignored, $fmt_rest}};
                  }
                  else {
                    $aJ_ = $get_prec(0);
                    $match__1 =
                      $make_padprec_fmt_ebb($get_int_pad(0), $aJ_, $fmt_rest);
                    $fmt_rest__0 = $match__1[3];
                    $prec__0 = $match__1[2];
                    $pad__0 = $match__1[1];
                    $aH_ =
                      Vector{0, Vector{5, $iconv, $pad__0, $prec__0, $fmt_rest__0}
                      };
                  }
                  $aI_ = $aH_;
                  $switch__8 = 1;
                  break;
                // FALLTHROUGH
                case 1:
                  $switch__7 = 0;
                  $switch__8 = 0;
                  break;
                // FALLTHROUGH
                default:
                  $aK_ = $caml_string_get($str, $str_ind);
                  $aL_ = $get_space(0);
                  $aM_ = $get_hash(0);
                  $iconv__0 =
                    $compute_int_conv->contents(
                      $pct_ind,
                      (int)
                      ($str_ind + 1),
                      $get_plus(0),
                      $aM_,
                      $aL_,
                      $aK_
                    );
                  $match__2 = $parse->contents((int) ($str_ind + 1), $end_ind);
                  $fmt_rest__1 = $match__2[1];
                  if ($get_ign(0)) {
                    $ignored__0 = Vector{4, $iconv__0, $get_pad_opt(95)};
                    $aN_ = Vector{0, Vector{23, $ignored__0, $fmt_rest__1}};
                  }
                  else {
                    $aO_ = $get_prec(0);
                    $match__3 =
                      $make_padprec_fmt_ebb($get_int_pad(0), $aO_, $fmt_rest__1);
                    $fmt_rest__2 = $match__3[3];
                    $prec__1 = $match__3[2];
                    $pad__1 = $match__3[1];
                    $aN_ =
                      Vector{
                        0,
                        Vector{6, $iconv__0, $pad__1, $prec__1, $fmt_rest__2}
                      };
                  }
                  $aI_ = $aN_;
                  $switch__8 = 1;
                }
              if ($switch__8) {$fmt_result = $aI_;$switch__7 = 1;}
            }
          }
          else {
            if (76 === $symb) {
              $aP_ = $caml_string_get($str, $str_ind);
              $aQ_ = $get_space(0);
              $aR_ = $get_hash(0);
              $iconv__1 =
                $compute_int_conv->contents(
                  $pct_ind,
                  (int)
                  ($str_ind + 1),
                  $get_plus(0),
                  $aR_,
                  $aQ_,
                  $aP_
                );
              $match__4 = $parse->contents((int) ($str_ind + 1), $end_ind);
              $fmt_rest__3 = $match__4[1];
              if ($get_ign(0)) {
                $ignored__1 = Vector{5, $iconv__1, $get_pad_opt(95)};
                $aS_ = Vector{0, Vector{23, $ignored__1, $fmt_rest__3}};
              }
              else {
                $aT_ = $get_prec(0);
                $match__5 =
                  $make_padprec_fmt_ebb($get_int_pad(0), $aT_, $fmt_rest__3);
                $fmt_rest__4 = $match__5[3];
                $prec__2 = $match__5[2];
                $pad__2 = $match__5[1];
                $aS_ =
                  Vector{
                    0,
                    Vector{7, $iconv__1, $pad__2, $prec__2, $fmt_rest__4}
                  };
              }
              $fmt_result = $aS_;
              $switch__7 = 1;
            }
            else {$switch__7 = 0;}
          }
          if (! $switch__7) {
            $fmt_result =
              $call3(
                $failwith_message($G_),
                $str,
                (int)
                ($str_ind + -1),
                $symb
              );
          }
        }
        if (1 - $legacy_behavior__0) {
          $av_ = 1 - $plus_used[1];
          $plus__0 = $av_ ? $plus : ($av_);
          if ($plus__0) {
            $incompatible_flag->contents($pct_ind, $str_ind, $symb, $cst__28);
          }
          $aw_ = 1 - $hash_used[1];
          $hash__0 = $aw_ ? $hash : ($aw_);
          if ($hash__0) {
            $incompatible_flag->contents($pct_ind, $str_ind, $symb, $cst__29);
          }
          $ax_ = 1 - $space_used[1];
          $space__0 = $ax_ ? $space : ($ax_);
          if ($space__0) {
            $incompatible_flag->contents($pct_ind, $str_ind, $symb, $cst__30);
          }
          $ay_ = 1 - $pad_used[1];
          $az_ = $ay_ ? $caml_notequal(Vector{0, $pad}, $H_) : ($ay_);
          if ($az_) {
            $incompatible_flag->contents(
              $pct_ind,
              $str_ind,
              $symb,
              $cst_padding
            );
          }
          $aA_ = 1 - $prec_used[1];
          $aB_ = $aA_ ? $caml_notequal(Vector{0, $prec}, $I_) : ($aA_);
          if ($aB_) {
            $aC_ = $ign ? 95 : ($symb);
            $incompatible_flag->contents(
              $pct_ind,
              $str_ind,
              $aC_,
              $cst_precision__1
            );
          }
          $plus__1 = $ign ? $plus : ($ign);
          if ($plus__1) {
            $incompatible_flag->contents($pct_ind, $str_ind, 95, $cst__31);
          }
        }
        $aD_ = 1 - $ign_used[1];
        $ign__0 = $aD_ ? $ign : ($aD_);
        if ($ign__0) {
          $switch__9 =
            38 <= $symb
              ? 44 === $symb ? 0 : (64 === $symb ? 0 : (1))
              : (33 === $symb ? 0 : (37 <= $symb ? 0 : (1)));
          $switch__10 = $switch__9 ? 0 : ($legacy_behavior__0 ? 1 : (0));
          if (! $switch__10) {
            $incompatible_flag->contents($pct_ind, $str_ind, $symb, $cst__32);
          }
        }
        return $fmt_result;
      };
      $parse_after_precision = 
      (dynamic $pct_ind, dynamic $str_ind, dynamic $end_ind, dynamic $minus, dynamic $plus, dynamic $hash, dynamic $space, dynamic $ign, dynamic $pad, dynamic $match) ==> {
        $n__0 = null;
        $n = null;
        if ($str_ind === $end_ind) {$unexpected_end_of_format($end_ind);}
        $parse_conv = (dynamic $padprec) ==> {
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
            if ($is_int($match)) {return $parse_conv($C_);}
            $n = $match[1];
            return $parse_conv(Vector{0, 1, $n});
          }
          if ($is_int($match)) {return $parse_conv($D_);}
          $n__0 = $match[1];
          return $parse_conv(Vector{0, 0, $n__0});
        }
        return $parse_conv($pad);
      };
      $parse_after_padding = 
      (dynamic $pct_ind, dynamic $str_ind, dynamic $end_ind, dynamic $minus, dynamic $plus, dynamic $hash, dynamic $space, dynamic $ign, dynamic $pad) ==> {
        $minus__0 = null;
        $au_ = null;
        $switcher = null;
        $str_ind__1 = null;
        $symb__0 = null;
        $parse_literal = null;
        $str_ind__0 = null;
        if ($str_ind === $end_ind) {$unexpected_end_of_format($end_ind);}
        $symb = $caml_string_get($str, $str_ind);
        if (46 === $symb) {
          $str_ind__0 = (int) ($str_ind + 1);
          if ($str_ind__0 === $end_ind) {$unexpected_end_of_format($end_ind);}
          $parse_literal =
            (dynamic $minus, dynamic $str_ind) ==> {
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
          $symb__0 = $caml_string_get($str, $str_ind__0);
          if (48 <= $symb__0) {
            if (! (58 <= $symb__0)) {
              return $parse_literal($minus, $str_ind__0);
            }
          }
          else {
            if (42 <= $symb__0) {
              $switcher = (int) ($symb__0 + -42);
              switch($switcher) {
                // FALLTHROUGH
                case 0:
                  return $parse_after_precision(
                    $pct_ind,
                    (int)
                    ($str_ind__0 + 1),
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
                    $au_ = (int) ($str_ind__0 + 1);
                    $minus__0 = $minus ? $minus : (45 === $symb__0 ? 1 : (0));
                    return $parse_literal($minus__0, $au_);
                  }
                  break;
                }
            }
          }
          if ($legacy_behavior__0) {
            return $parse_after_precision(
              $pct_ind,
              $str_ind__0,
              $end_ind,
              $minus,
              $plus,
              $hash,
              $space,
              $ign,
              $pad,
              $B_
            );
          }
          $str_ind__1 = (int) ($str_ind__0 + -1);
          return $call4($failwith_message($y_), $str, $str_ind__1, 46, $s);
        }
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
          0,
          $pad,
          $symb
        );
      };
      $parse_flags->contents = 
      (dynamic $pct_ind, dynamic $str_ind, dynamic $end_ind, dynamic $ign) ==> {
        $match = null;
        $switcher = null;
        $str_ind__1 = null;
        $str_ind__2 = null;
        $str_ind__3 = null;
        $str_ind__4 = null;
        $str_ind__5 = null;
        $padty = null;
        $match__0 = null;
        $match__1 = null;
        $width = null;
        $new_ind = null;
        $zero = Vector{0, 0} as dynamic;
        $minus__0 = Vector{0, 0} as dynamic;
        $plus__0 = Vector{0, 0} as dynamic;
        $space__0 = Vector{0, 0} as dynamic;
        $hash__0 = Vector{0, 0} as dynamic;
        $minus = 0;
        $plus = 0;
        $space = 0;
        $hash = 0;
        $set_flag = (dynamic $str_ind, dynamic $flag) ==> {
          $at_ = null;
          $ar_ = $flag[1];
          $as_ = $ar_ ? 1 - $legacy_behavior__0 : ($ar_);
          if ($as_) {
            $at_ = $caml_string_get($str, $str_ind);
            $call3($failwith_message($A_), $str, $str_ind, $at_);
          }
          $flag[1] = 1;
          return 0;
        };
        $str_ind__0 = $str_ind;
        for (;;) {
          if ($str_ind__0 === $end_ind) {$unexpected_end_of_format($end_ind);}
          $match = $caml_string_get($str, $str_ind__0);
          $switcher = (int) ($match + -32);
          if (! (16 < $unsigned_right_shift_32($switcher, 0))) {
            $continue_label = null;
            switch($switcher) {
              // FALLTHROUGH
              case 0:
                $set_flag($str_ind__0, $space__0);
                $str_ind__1 = (int) ($str_ind__0 + 1);
                $str_ind__0 = $str_ind__1;
                $continue_label = "#";break;
              // FALLTHROUGH
              case 3:
                $set_flag($str_ind__0, $hash__0);
                $str_ind__2 = (int) ($str_ind__0 + 1);
                $str_ind__0 = $str_ind__2;
                $continue_label = "#";break;
              // FALLTHROUGH
              case 11:
                $set_flag($str_ind__0, $plus__0);
                $str_ind__3 = (int) ($str_ind__0 + 1);
                $str_ind__0 = $str_ind__3;
                $continue_label = "#";break;
              // FALLTHROUGH
              case 13:
                $set_flag($str_ind__0, $minus__0);
                $str_ind__4 = (int) ($str_ind__0 + 1);
                $str_ind__0 = $str_ind__4;
                $continue_label = "#";break;
              // FALLTHROUGH
              case 16:
                $set_flag($str_ind__0, $zero);
                $str_ind__5 = (int) ($str_ind__0 + 1);
                $str_ind__0 = $str_ind__5;
                $continue_label = "#";break;
              }
            if ($continue_label === "#") {continue;}
          }
          if ($str_ind__0 === $end_ind) {$unexpected_end_of_format($end_ind);}
          $match__0 = $caml_string_get($str, $str_ind__0);
          $padty = 1;
          if (48 <= $match__0) {
            if (! (58 <= $match__0)) {
              $match__1 = $parse_positive->contents($str_ind__0, $end_ind, 0);
              $width = $match__1[2];
              $new_ind = $match__1[1];
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
            if (42 === $match__0) {
              return $parse_after_padding(
                $pct_ind,
                (int)
                ($str_ind__0 + 1),
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
          return $parse_after_padding(
            $pct_ind,
            $str_ind__0,
            $end_ind,
            $minus,
            $plus,
            $hash,
            $space,
            $ign,
            0
          );
        }
      };
      $parse_tag->contents = 
      (dynamic $is_open_tag, dynamic $str_ind, dynamic $end_ind) ==> {
        $switch__1 = null;
        $switch__0 = null;
        $ao_ = null;
        $formatting__0 = null;
        $sub_format__0 = null;
        $sub_fmt = null;
        $match__2 = null;
        $fmt_rest__0 = null;
        $match__1 = null;
        $sub_str = null;
        $ind = null;
        $match__0 = null;
        $formatting = null;
        $fmt_rest = null;
        $match = null;
        $str__0 = null;
        try {
          if ($str_ind === $end_ind) {
            throw $caml_wrap_thrown_exception($Not_found) as \Throwable;
          }
          $match__0 = $caml_string_get($str, $str_ind);
          if (60 === $match__0) {
            $ind = $call3($String[18], $str, (int) ($str_ind + 1), 62);
            if ($end_ind <= $ind) {
              throw $caml_wrap_thrown_exception($Not_found) as \Throwable;
            }
            $sub_str =
              $call3(
                $String[4],
                $str,
                $str_ind,
                (int)
                ((int) ($ind - $str_ind) + 1)
              );
            $match__1 = $parse->contents((int) ($ind + 1), $end_ind);
            $fmt_rest__0 = $match__1[1];
            $match__2 = $parse->contents($str_ind, (int) ($ind + 1));
            $sub_fmt = $match__2[1];
            $sub_format__0 = Vector{0, $sub_fmt, $sub_str};
            if ($is_open_tag) {
              $formatting__0 = Vector{0, $sub_format__0};
            }
            else {
              if ($is_int($sub_fmt)) {$switch__0 = 0;}
              else {
                if (11 === $sub_fmt[0]) {
                  if ($is_int($sub_fmt[2])) {
                    $str__0 = $sub_fmt[1];
                    try {$open_box_of_string($str__0);$switch__1 = 1;}
                    catch(\Throwable $aq_) {
                      $aq_ = $runtime["caml_wrap_exception"]($aq_);
                      if ($aq_[1] !== $Failure) {
                        throw $caml_wrap_thrown_exception_reraise($aq_) as \Throwable;
                      }
                      $switch__0 = 1;
                      $switch__1 = 0;
                    }
                    if ($switch__1) {$switch__0 = 1;}
                  }
                  else {$switch__0 = 0;}
                }
                else {$switch__0 = 0;}
              }
              ;
              $formatting__0 = Vector{1, $sub_format__0};
            }
            $ao_ = Vector{0, Vector{18, $formatting__0, $fmt_rest__0}};
            return $ao_;
          }
          throw $caml_wrap_thrown_exception($Not_found) as \Throwable;
        }
        catch(\Throwable $ap_) {
          $ap_ = $runtime["caml_wrap_exception"]($ap_);
          if ($ap_ === $Not_found) {
            $match = $parse->contents($str_ind, $end_ind);
            $fmt_rest = $match[1];
            $formatting =
              $is_open_tag ? Vector{0, $sub_format} : (Vector{1, $sub_format});
            return Vector{0, Vector{18, $formatting, $fmt_rest}};
          }
          throw $caml_wrap_thrown_exception_reraise($ap_) as \Throwable;
        }
      };
      $parse_good_break->contents = (dynamic $str_ind, dynamic $end_ind) ==> {
        $switch__1 = null;
        $switch__0 = null;
        $am_ = null;
        $al_ = null;
        $s__0 = null;
        $str_ind_5 = null;
        $str_ind_4 = null;
        $offset = null;
        $match__3 = null;
        $switcher__0 = null;
        $ak_ = null;
        $aj_ = null;
        $s = null;
        $switcher = null;
        $match__2 = null;
        $str_ind_3 = null;
        $str_ind_2 = null;
        $width = null;
        $match__1 = null;
        $match__0 = null;
        $str_ind_1 = null;
        $ai_ = null;
        $ah_ = null;
        $next_ind = null;
        $formatting_lit__0 = null;
        try {
          $ah_ = $str_ind === $end_ind ? 1 : (0);
          $ai_ =
            $ah_ ? $ah_ : (60 !== $caml_string_get($str, $str_ind) ? 1 : (0));
          if ($ai_) {
            throw $caml_wrap_thrown_exception($Not_found) as \Throwable;
          }
          $str_ind_1 = $parse_spaces->contents((int) ($str_ind + 1), $end_ind);
          $match__0 = $caml_string_get($str, $str_ind_1);
          $switch__0 =
            48 <= $match__0
              ? 58 <= $match__0 ? 0 : (1)
              : (45 === $match__0 ? 1 : (0));
          if (! $switch__0) {
            throw $caml_wrap_thrown_exception($Not_found) as \Throwable;
          }
          $match__1 = $parse_integer->contents($str_ind_1, $end_ind);
          $width = $match__1[2];
          $str_ind_2 = $match__1[1];
          $str_ind_3 = $parse_spaces->contents($str_ind_2, $end_ind);
          $match__2 = $caml_string_get($str, $str_ind_3);
          $switcher = (int) ($match__2 + -45);
          if (12 < $unsigned_right_shift_32($switcher, 0)) {
            if (17 === $switcher) {
              $s =
                $call3(
                  $String[4],
                  $str,
                  (int)
                  ($str_ind + -2),
                  (int)
                  ((int) ($str_ind_3 - $str_ind) + 3)
                );
              $aj_ = Vector{0, $s, $width, 0};
              $ak_ = (int) ($str_ind_3 + 1);
              $next_ind = $ak_;
              $formatting_lit__0 = $aj_;
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
                throw $caml_wrap_thrown_exception($Not_found) as \Throwable;
              }
              $s__0 =
                $call3(
                  $String[4],
                  $str,
                  (int)
                  ($str_ind + -2),
                  (int)
                  ((int) ($str_ind_5 - $str_ind) + 3)
                );
              $al_ = Vector{0, $s__0, $width, $offset};
              $am_ = (int) ($str_ind_5 + 1);
              $next_ind = $am_;
              $formatting_lit__0 = $al_;
              $switch__1 = 1;
            }
            else {$switch__1 = 0;}
          }
          if (! $switch__1) {
            throw $caml_wrap_thrown_exception($Not_found) as \Throwable;
          }
        }
        catch(\Throwable $an_) {
          $an_ = $runtime["caml_wrap_exception"]($an_);
          if ($an_ !== $Not_found) {
            if ($an_[1] !== $Failure) {
              throw $caml_wrap_thrown_exception_reraise($an_) as \Throwable;
            }
          }
          $next_ind = $str_ind;
          $formatting_lit__0 = $formatting_lit;
        }
        $match = $parse->contents($next_ind, $end_ind);
        $fmt_rest = $match[1];
        return Vector{0, Vector{17, $formatting_lit__0, $fmt_rest}};
      };
      $parse_magic_size->contents = (dynamic $str_ind, dynamic $end_ind) ==> {
        $switch__0 = null;
        $s = null;
        $str_ind_3 = null;
        $str_ind_2 = null;
        $size = null;
        $match__3 = null;
        $af_ = null;
        $match__2 = null;
        $str_ind_1 = null;
        $fmt_rest = null;
        $match__0 = null;
        $next_ind = null;
        $formatting_lit = null;
        $match = null;
        $ae_ = null;
        try {
          $str_ind_1 = $parse_spaces->contents($str_ind, $end_ind);
          $match__2 = $caml_string_get($str, $str_ind_1);
          $switch__0 =
            48 <= $match__2
              ? 58 <= $match__2 ? 0 : (1)
              : (45 === $match__2 ? 1 : (0));
          if ($switch__0) {
            $match__3 = $parse_integer->contents($str_ind_1, $end_ind);
            $size = $match__3[2];
            $str_ind_2 = $match__3[1];
            $str_ind_3 = $parse_spaces->contents($str_ind_2, $end_ind);
            if (62 !== $caml_string_get($str, $str_ind_3)) {
              throw $caml_wrap_thrown_exception($Not_found) as \Throwable;
            }
            $s =
              $call3(
                $String[4],
                $str,
                (int)
                ($str_ind + -2),
                (int)
                ((int) ($str_ind_3 - $str_ind) + 3)
              );
            $af_ =
              Vector{
                0,
                Vector{0, (int) ($str_ind_3 + 1), Vector{1, $s, $size}}
              };
          }
          else {$af_ = 0;}
          $ae_ = $af_;
        }
        catch(\Throwable $ag_) {
          $ag_ = $runtime["caml_wrap_exception"]($ag_);
          if ($ag_ !== $Not_found) {
            if ($ag_[1] !== $Failure) {
              throw $caml_wrap_thrown_exception_reraise($ag_) as \Throwable;
            }
          }
          $ae_ = 0;
        }
        if ($ae_) {
          $match = $ae_[1];
          $formatting_lit = $match[2];
          $next_ind = $match[1];
          $match__0 = $parse->contents($next_ind, $end_ind);
          $fmt_rest = $match__0[1];
          return Vector{0, Vector{17, $formatting_lit, $fmt_rest}};
        }
        $match__1 = $parse->contents($str_ind, $end_ind);
        $fmt_rest__0 = $match__1[1];
        return Vector{0, Vector{17, $N_, $fmt_rest__0}};
      };
      $parse_spaces->contents = (dynamic $str_ind, dynamic $end_ind) ==> {
        $str_ind__1 = null;
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
      $parse_positive->contents = 
      (dynamic $str_ind, dynamic $end_ind, dynamic $acc) ==> {
        $c = null;
        $switcher = null;
        $acc__1 = null;
        $ad_ = null;
        $str_ind__1 = null;
        $str_ind__0 = $str_ind;
        $acc__0 = $acc;
        for (;;) {
          if ($str_ind__0 === $end_ind) {$unexpected_end_of_format($end_ind);}
          $c = $caml_string_get($str, $str_ind__0);
          $switcher = (int) ($c + -48);
          if (9 < $unsigned_right_shift_32($switcher, 0)) {return Vector{0, $str_ind__0, $acc__0};}
          $acc__1 = (int) ((int) ($acc__0 * 10) + (int) ($c - 48));
          if ($Sys[13] < $acc__1) {
            $ad_ = $Sys[13];
            return $call3($failwith_message($P_), $str, $acc__1, $ad_);
          }
          $str_ind__1 = (int) ($str_ind__0 + 1);
          $str_ind__0 = $str_ind__1;
          $acc__0 = $acc__1;
          continue;
        }
      };
      $parse_integer->contents = (dynamic $str_ind, dynamic $end_ind) ==> {
        $next_ind = null;
        $n = null;
        $match__0 = null;
        $switcher = null;
        $c = null;
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
            $match__0 =
              $parse_positive->contents((int) ($str_ind + 1), $end_ind, 0);
            $n = $match__0[2];
            $next_ind = $match__0[1];
            return Vector{0, $next_ind, (int) - $n};
          }
        }
        throw $caml_wrap_thrown_exception(Vector{0, $Assert_failure, $Q_}) as \Throwable;
      };
      $search_subformat_end->contents = 
      (dynamic $str_ind, dynamic $end_ind, dynamic $c) ==> {
        $match = null;
        $match__0 = null;
        $str_ind__1 = null;
        $switcher = null;
        $sub_end = null;
        $str_ind__2 = null;
        $match__1 = null;
        $sub_end__0 = null;
        $str_ind__3 = null;
        $sub_end__1 = null;
        $str_ind__4 = null;
        $str_ind__5 = null;
        $sub_end__2 = null;
        $str_ind__6 = null;
        $str_ind__7 = null;
        $str_ind__0 = $str_ind;
        for (;;) {
          if ($str_ind__0 === $end_ind) {
            $call3($failwith_message($R_), $str, $c, $end_ind);
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
                  $continue_label = null;
                  switch($switcher) {
                    // FALLTHROUGH
                    case 0:
                      $sub_end =
                        $search_subformat_end->contents(
                          (int)
                          ($str_ind__0 + 2),
                          $end_ind,
                          125
                        );
                      $str_ind__2 = (int) ($sub_end + 2);
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
                    $sub_end__0 =
                      $search_subformat_end->contents(
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
                    $sub_end__1 =
                      $search_subformat_end->contents(
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
                $sub_end__2 =
                  $search_subformat_end->contents(
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
      $incompatible_flag->contents = 
      (dynamic $pct_ind, dynamic $str_ind, dynamic $symb, dynamic $option) ==> {
        $subfmt = $call3(
          $String[4],
          $str,
          $pct_ind,
          (int)
          ($str_ind - $pct_ind)
        );
        return $call5(
          $failwith_message($V_),
          $str,
          $pct_ind,
          $option,
          $symb,
          $subfmt
        );
      };
      $compute_int_conv->contents = 
      (dynamic $pct_ind, dynamic $str_ind, dynamic $plus, dynamic $hash, dynamic $space, dynamic $symb) ==> {
        $switcher = null;
        $switcher__0 = null;
        $switch__0 = null;
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
              $continue_label = null;
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
                  if ($legacy_behavior__0) {
                    $hash__0 = 0;
                    $continue_label = "#";break;
                  }
                  return $incompatible_flag->contents(
                    $pct_ind,
                    $str_ind,
                    $symb,
                    $cst__36
                  );
                }
              if ($continue_label === "#") {continue;}
            }
          }
          if (0 === $plus__0) {
            if (0 === $space__0) {
              throw $caml_wrap_thrown_exception(
                      Vector{0, $Assert_failure, $T_}
                    ) as \Throwable;
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
      return $parse->contents(0, $caml_ml_string_length($str));
    };
    $format_of_string_fmtty = (dynamic $str, dynamic $fmtty) ==> {
      $aa_ = null;
      $ab_ = null;
      $match = $fmt_ebb_of_string(0, $str);
      $fmt = $match[1];
      try {$ab_ = Vector{0, $type_format($fmt, $fmtty), $str};return $ab_;}
      catch(\Throwable $ac_) {
        $ac_ = $runtime["caml_wrap_exception"]($ac_);
        if ($ac_ === $Type_mismatch) {
          $aa_ = $string_of_fmtty($fmtty);
          return $call2($failwith_message($W_), $str, $aa_);
        }
        throw $caml_wrap_thrown_exception_reraise($ac_) as \Throwable;
      }
    };
    $format_of_string_format = (dynamic $str, dynamic $param) ==> {
      $Y_ = null;
      $str__0 = $param[2];
      $fmt = $param[1];
      $match = $fmt_ebb_of_string(0, $str);
      $fmt__0 = $match[1];
      try {
        $Y_ =
          Vector{0, $type_format($fmt__0, $fmtty_of_fmt->contents($fmt)), $str
          };
        return $Y_;
      }
      catch(\Throwable $Z_) {
        $Z_ = $runtime["caml_wrap_exception"]($Z_);
        if ($Z_ === $Type_mismatch) {
          return $call2($failwith_message($X_), $str, $str__0);
        }
        throw $caml_wrap_thrown_exception_reraise($Z_) as \Throwable;
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
    
     return ($CamlinternalFormat);

  }
  public static function is_in_char_set(dynamic $char_set, dynamic $c): dynamic {
    return static::callRehackFunction(static::requireModule()[1], varray[$char_set, $c]);
  }
  public static function rev_char_set(dynamic $char_set): dynamic {
    return static::callRehackFunction(static::requireModule()[2], varray[$char_set]);
  }
  public static function create_char_set(dynamic $param): dynamic {
    return static::callRehackFunction(static::requireModule()[3], varray[$param]);
  }
  public static function add_in_char_set(dynamic $char_set, dynamic $c): dynamic {
    return static::callRehackFunction(static::requireModule()[4], varray[$char_set, $c]);
  }
  public static function freeze_char_set(dynamic $char_set): dynamic {
    return static::callRehackFunction(static::requireModule()[5], varray[$char_set]);
  }
  public static function param_format_of_ignored_format(dynamic $ign, dynamic $fmt): dynamic {
    return static::callRehackFunction(static::requireModule()[6], varray[$ign, $fmt]);
  }
  public static function make_printf(dynamic $k, dynamic $o, dynamic $acc, dynamic $fmt): dynamic {
    return static::callRehackFunction(static::requireModule()[7], varray[$k, $o, $acc, $fmt]);
  }
  public static function make_iprintf(dynamic $k, dynamic $o, dynamic $fmt): dynamic {
    return static::callRehackFunction(static::requireModule()[8], varray[$k, $o, $fmt]);
  }
  public static function output_acc(dynamic $o, dynamic $acc): dynamic {
    return static::callRehackFunction(static::requireModule()[9], varray[$o, $acc]);
  }
  public static function bufput_acc(dynamic $b, dynamic $acc): dynamic {
    return static::callRehackFunction(static::requireModule()[10], varray[$b, $acc]);
  }
  public static function strput_acc(dynamic $b, dynamic $acc): dynamic {
    return static::callRehackFunction(static::requireModule()[11], varray[$b, $acc]);
  }
  public static function type_format(dynamic $fmt, dynamic $fmtty): dynamic {
    return static::callRehackFunction(static::requireModule()[12], varray[$fmt, $fmtty]);
  }
  public static function fmt_ebb_of_string(dynamic $legacy_behavior, dynamic $str): dynamic {
    return static::callRehackFunction(static::requireModule()[13], varray[$legacy_behavior, $str]);
  }
  public static function format_of_string_fmtty(dynamic $str, dynamic $fmtty): dynamic {
    return static::callRehackFunction(static::requireModule()[14], varray[$str, $fmtty]);
  }
  public static function format_of_string_format(dynamic $str, dynamic $param): dynamic {
    return static::callRehackFunction(static::requireModule()[15], varray[$str, $param]);
  }
  public static function char_of_iconv(dynamic $iconv): dynamic {
    return static::callRehackFunction(static::requireModule()[16], varray[$iconv]);
  }
  public static function string_of_formatting_lit(dynamic $formatting_lit): dynamic {
    return static::callRehackFunction(static::requireModule()[17], varray[$formatting_lit]);
  }
  public static function string_of_formatting_gen(dynamic $formatting_gen): dynamic {
    return static::callRehackFunction(static::requireModule()[18], varray[$formatting_gen]);
  }
  public static function string_of_fmtty(dynamic $fmtty): dynamic {
    return static::callRehackFunction(static::requireModule()[19], varray[$fmtty]);
  }
  public static function string_of_fmt(dynamic $fmt): dynamic {
    return static::callRehackFunction(static::requireModule()[20], varray[$fmt]);
  }
  public static function open_box_of_string(dynamic $str): dynamic {
    return static::callRehackFunction(static::requireModule()[21], varray[$str]);
  }
  public static function symm(dynamic $param): dynamic {
    return static::callRehackFunction(static::requireModule()[22], varray[$param]);
  }
  public static function trans(dynamic $ty1, dynamic $ty2): dynamic {
    return static::callRehackFunction(static::requireModule()[23], varray[$ty1, $ty2]);
  }
  public static function recast(dynamic $fmt, dynamic $fmtty): dynamic {
    return static::callRehackFunction(static::requireModule()[24], varray[$fmt, $fmtty]);
  }

}
/* Hashing disabled */
