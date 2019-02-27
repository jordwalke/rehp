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
    $unsigned_right_shift_32 = $runtime->unsigned_right_shift_32;
    $left_shift_32 = $runtime->left_shift_32;
    $is_int = $runtime->is_int;
    $caml_arity_test = $runtime->caml_arity_test;
    $caml_blit_string = $runtime["caml_blit_string"];
    $caml_bytes_set = $runtime["caml_bytes_set"];
    $caml_create_bytes = $runtime["caml_create_bytes"];
    $caml_format_int = $runtime["caml_format_int"];
    $caml_ml_string_length = $runtime["caml_ml_string_length"];
    $caml_new_string = $runtime["caml_new_string"];
    $caml_notequal = $runtime["caml_notequal"];
    $caml_string_get = $runtime["caml_string_get"];
    $caml_string_notequal = $runtime["caml_string_notequal"];
    $caml_trampoline = $runtime["caml_trampoline"];
    $caml_trampoline_return = $runtime["caml_trampoline_return"];
    $caml_wrap_exception = $runtime["caml_wrap_exception"];
    $caml_call1 = function($f, $a0) use ($caml_arity_test,$runtime) {
      return $caml_arity_test($f) == 1
        ? $f($a0)
        : ($runtime["caml_call_gen"]($f, varray[$a0]));
    };
    $caml_call2 = function($f, $a0, $a1) use ($caml_arity_test,$runtime) {
      return $caml_arity_test($f) == 2
        ? $f($a0, $a1)
        : ($runtime["caml_call_gen"]($f, varray[$a0,$a1]));
    };
    $caml_call3 = function($f, $a0, $a1, $a2) use ($caml_arity_test,$runtime) {
      return $caml_arity_test($f) == 3
        ? $f($a0, $a1, $a2)
        : ($runtime["caml_call_gen"]($f, varray[$a0,$a1,$a2]));
    };
    $caml_call4 = function($f, $a0, $a1, $a2, $a3) use ($caml_arity_test,$runtime) {
      return $caml_arity_test($f) == 4
        ? $f($a0, $a1, $a2, $a3)
        : ($runtime["caml_call_gen"]($f, varray[$a0,$a1,$a2,$a3]));
    };
    $caml_call5 = function($f, $a0, $a1, $a2, $a3, $a4) use ($caml_arity_test,$runtime) {
      return $caml_arity_test($f) == 5
        ? $f($a0, $a1, $a2, $a3, $a4)
        : ($runtime["caml_call_gen"]($f, varray[$a0,$a1,$a2,$a3,$a4]));
    };
    $global_data = $runtime["caml_get_global_data"]();
    $cst_c = $caml_new_string("%c");
    $cst_s = $caml_new_string("%s");
    $cst_i = $caml_new_string("%i");
    $cst_li = $caml_new_string("%li");
    $cst_ni = $caml_new_string("%ni");
    $cst_Li = $caml_new_string("%Li");
    $cst_f = $caml_new_string("%f");
    $cst_B = $caml_new_string("%B");
    $cst__9 = $caml_new_string("%{");
    $cst__10 = $caml_new_string("%}");
    $cst__11 = $caml_new_string("%(");
    $cst__12 = $caml_new_string("%)");
    $cst_a = $caml_new_string("%a");
    $cst_t = $caml_new_string("%t");
    $cst__13 = $caml_new_string("%?");
    $cst_r = $caml_new_string("%r");
    $cst_r__0 = $caml_new_string("%_r");
    $cst_u__0 = $caml_new_string("%u");
    $cst_Printf_bad_conversion = $caml_new_string("Printf: bad conversion %[");
    $cst_Printf_bad_conversion__0 = $caml_new_string(
      "Printf: bad conversion %_"
    );
    $cst__17 = $caml_new_string("@{");
    $cst__18 = $caml_new_string("@[");
    $cst__19 = $caml_new_string("@{");
    $cst__20 = $caml_new_string("@[");
    $cst__21 = $caml_new_string("@{");
    $cst__22 = $caml_new_string("@[");
    $cst_0 = $caml_new_string("0");
    $cst_padding = $caml_new_string("padding");
    $cst_precision = $caml_new_string("precision");
    $cst__27 = $caml_new_string("'*'");
    $cst__25 = $caml_new_string("'-'");
    $cst_0__2 = $caml_new_string("'0'");
    $cst__26 = $caml_new_string("'*'");
    $cst_0__0 = $caml_new_string("0");
    $cst_0__1 = $caml_new_string("0");
    $cst_precision__0 = $caml_new_string("precision");
    $cst_precision__1 = $caml_new_string("precision");
    $cst__28 = $caml_new_string("'+'");
    $cst__29 = $caml_new_string("'#'");
    $cst__30 = $caml_new_string("' '");
    $cst_padding__0 = $caml_new_string("`padding'");
    $cst_precision__2 = $caml_new_string("`precision'");
    $cst__31 = $caml_new_string("'+'");
    $cst__32 = $caml_new_string("'_'");
    $sub_format = R(0, 0, $caml_new_string(""));
    $formatting_lit = R(0, $caml_new_string("@;"), 1, 0);
    $cst_digit = $caml_new_string("digit");
    $cst_character = $caml_new_string("character ')'");
    $cst_character__0 = $caml_new_string("character '}'");
    $cst__36 = $caml_new_string("'#'");
    $cst__35 = $caml_new_string("'+'");
    $cst__34 = $caml_new_string("'+'");
    $cst__33 = $caml_new_string("' '");
    $cst__39 = $caml_new_string("'+'");
    $cst__38 = $caml_new_string("'+'");
    $cst__37 = $caml_new_string("' '");
    $cst_non_zero_widths_are_unsupported_for_c_conversions = $caml_new_string(
      "non-zero widths are unsupported for %c conversions"
    );
    $cst_unexpected_end_of_format = $caml_new_string(
      "unexpected end of format"
    );
    $cst__23 = $caml_new_string("");
    $cst__24 = $caml_new_string("");
    $cst_b = $caml_new_string("b");
    $cst_h = $caml_new_string("h");
    $cst_hov = $caml_new_string("hov");
    $cst_hv = $caml_new_string("hv");
    $cst_v = $caml_new_string("v");
    $cst_nan = $caml_new_string("nan");
    $cst__16 = $caml_new_string(".");
    $cst_neg_infinity = $caml_new_string("neg_infinity");
    $cst_infinity = $caml_new_string("infinity");
    $cst_12g = $caml_new_string("%.12g");
    $cst_nd = $caml_new_string("%nd");
    $cst_nd__0 = $caml_new_string("%+nd");
    $cst_nd__1 = $caml_new_string("% nd");
    $cst_ni__0 = $caml_new_string("%ni");
    $cst_ni__1 = $caml_new_string("%+ni");
    $cst_ni__2 = $caml_new_string("% ni");
    $cst_nx = $caml_new_string("%nx");
    $cst_nx__0 = $caml_new_string("%#nx");
    $cst_nX = $caml_new_string("%nX");
    $cst_nX__0 = $caml_new_string("%#nX");
    $cst_no = $caml_new_string("%no");
    $cst_no__0 = $caml_new_string("%#no");
    $cst_nu = $caml_new_string("%nu");
    $cst_ld = $caml_new_string("%ld");
    $cst_ld__0 = $caml_new_string("%+ld");
    $cst_ld__1 = $caml_new_string("% ld");
    $cst_li__0 = $caml_new_string("%li");
    $cst_li__1 = $caml_new_string("%+li");
    $cst_li__2 = $caml_new_string("% li");
    $cst_lx = $caml_new_string("%lx");
    $cst_lx__0 = $caml_new_string("%#lx");
    $cst_lX = $caml_new_string("%lX");
    $cst_lX__0 = $caml_new_string("%#lX");
    $cst_lo = $caml_new_string("%lo");
    $cst_lo__0 = $caml_new_string("%#lo");
    $cst_lu = $caml_new_string("%lu");
    $cst_Ld = $caml_new_string("%Ld");
    $cst_Ld__0 = $caml_new_string("%+Ld");
    $cst_Ld__1 = $caml_new_string("% Ld");
    $cst_Li__0 = $caml_new_string("%Li");
    $cst_Li__1 = $caml_new_string("%+Li");
    $cst_Li__2 = $caml_new_string("% Li");
    $cst_Lx = $caml_new_string("%Lx");
    $cst_Lx__0 = $caml_new_string("%#Lx");
    $cst_LX = $caml_new_string("%LX");
    $cst_LX__0 = $caml_new_string("%#LX");
    $cst_Lo = $caml_new_string("%Lo");
    $cst_Lo__0 = $caml_new_string("%#Lo");
    $cst_Lu = $caml_new_string("%Lu");
    $cst_d = $caml_new_string("%d");
    $cst_d__0 = $caml_new_string("%+d");
    $cst_d__1 = $caml_new_string("% d");
    $cst_i__0 = $caml_new_string("%i");
    $cst_i__1 = $caml_new_string("%+i");
    $cst_i__2 = $caml_new_string("% i");
    $cst_x = $caml_new_string("%x");
    $cst_x__0 = $caml_new_string("%#x");
    $cst_X = $caml_new_string("%X");
    $cst_X__0 = $caml_new_string("%#X");
    $cst_o = $caml_new_string("%o");
    $cst_o__0 = $caml_new_string("%#o");
    $cst_u = $caml_new_string("%u");
    $cst__14 = $caml_new_string("%!");
    $cst__15 = $caml_new_string("@{");
    $cst_0c = $caml_new_string("0c");
    $cst__8 = $caml_new_string("%%");
    $cst__0 = $caml_new_string("@]");
    $cst__1 = $caml_new_string("@}");
    $cst__2 = $caml_new_string("@?");
    $cst__3 = $caml_new_string("@\n");
    $cst__4 = $caml_new_string("@.");
    $cst__5 = $caml_new_string("@@");
    $cst__6 = $caml_new_string("@%");
    $cst__7 = $caml_new_string("@");
    $cst = $caml_new_string(".*");
    $cst_CamlinternalFormat_Type_mismatch = $caml_new_string(
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
    $hy = R(0, $caml_new_string("camlinternalFormat.ml"), 846, 23);
    $hJ = R(0, $caml_new_string("camlinternalFormat.ml"), 810, 21);
    $hB = R(0, $caml_new_string("camlinternalFormat.ml"), 811, 21);
    $hK = R(0, $caml_new_string("camlinternalFormat.ml"), 814, 21);
    $hC = R(0, $caml_new_string("camlinternalFormat.ml"), 815, 21);
    $hL = R(0, $caml_new_string("camlinternalFormat.ml"), 818, 19);
    $hD = R(0, $caml_new_string("camlinternalFormat.ml"), 819, 19);
    $hM = R(0, $caml_new_string("camlinternalFormat.ml"), 822, 22);
    $hE = R(0, $caml_new_string("camlinternalFormat.ml"), 823, 22);
    $hN = R(0, $caml_new_string("camlinternalFormat.ml"), 827, 30);
    $hF = R(0, $caml_new_string("camlinternalFormat.ml"), 828, 30);
    $hH = R(0, $caml_new_string("camlinternalFormat.ml"), 832, 26);
    $hz = R(0, $caml_new_string("camlinternalFormat.ml"), 833, 26);
    $hI = R(0, $caml_new_string("camlinternalFormat.ml"), 842, 28);
    $hA = R(0, $caml_new_string("camlinternalFormat.ml"), 843, 28);
    $hG = R(0, $caml_new_string("camlinternalFormat.ml"), 847, 23);
    $hO = R(0, $caml_new_string("camlinternalFormat.ml"), 1525, 4);
    $hP = R(0, $caml_new_string("camlinternalFormat.ml"), 1593, 39);
    $hQ = R(0, $caml_new_string("camlinternalFormat.ml"), 1616, 31);
    $hR = R(0, $caml_new_string("camlinternalFormat.ml"), 1617, 31);
    $hS = R(0, $caml_new_string("camlinternalFormat.ml"), 1797, 8);
    $im = R(
      0,
      R(
        11,
        $caml_new_string("bad input: format type mismatch between "),
        R(3, 0, R(11, $caml_new_string(" and "), R(3, 0, 0)))
      ),
      $caml_new_string("bad input: format type mismatch between %S and %S")
    );
    $il = R(
      0,
      R(
        11,
        $caml_new_string("bad input: format type mismatch between "),
        R(3, 0, R(11, $caml_new_string(" and "), R(3, 0, 0)))
      ),
      $caml_new_string("bad input: format type mismatch between %S and %S")
    );
    $hY = R(
      0,
      R(
        11,
        $caml_new_string("invalid format "),
        R(
          3,
          0,
          R(
            11,
            $caml_new_string(": at character number "),
            R(
              4,
              0,
              0,
              0,
              R(11, $caml_new_string(", duplicate flag "), R(1, 0))
            )
          )
        )
      ),
      $caml_new_string(
        "invalid format %S: at character number %d, duplicate flag %C"
      )
    );
    $hZ = R(0, 1, 0);
    $h0 = R(0, 0);
    $h2 = R(1, 0);
    $h1 = R(1, 1);
    $h4 = R(1, 1);
    $h3 = R(1, 1);
    $h8 = R(
      0,
      R(
        11,
        $caml_new_string("invalid format "),
        R(
          3,
          0,
          R(
            11,
            $caml_new_string(": at character number "),
            R(
              4,
              0,
              0,
              0,
              R(
                11,
                $caml_new_string(", flag "),
                R(
                  1,
                  R(
                    11,
                    $caml_new_string(" is only allowed after the '"),
                    R(
                      12,
                      37,
                      R(11, $caml_new_string("', before padding and precision"), 0
                      )
                    )
                  )
                )
              )
            )
          )
        )
      ),
      $caml_new_string(
        "invalid format %S: at character number %d, flag %C is only allowed after the '%%', before padding and precision"
      )
    );
    $h5 = R(
      0,
      R(
        11,
        $caml_new_string("invalid format "),
        R(
          3,
          0,
          R(
            11,
            $caml_new_string(": at character number "),
            R(
              4,
              0,
              0,
              0,
              R(
                11,
                $caml_new_string(", invalid conversion \""),
                R(12, 37, R(0, R(12, 34, 0)))
              )
            )
          )
        )
      ),
      $caml_new_string(
        "invalid format %S: at character number %d, invalid conversion \"%%%c\""
      )
    );
    $h6 = R(0, 0);
    $h7 = R(0, 0);
    $h9 = R(0, R(12, 64, 0));
    $h_ = R(0, $caml_new_string("@ "), 1, 0);
    $ia = R(0, $caml_new_string("@,"), 0, 0);
    $ib = R(2, 60);
    $ic = R(
      0,
      R(
        11,
        $caml_new_string("invalid format "),
        R(
          3,
          0,
          R(
            11,
            $caml_new_string(": '"),
            R(
              12,
              37,
              R(
                11,
                $caml_new_string(
                  "' alone is not accepted in character sets, use "
                ),
                R(
                  12,
                  37,
                  R(
                    12,
                    37,
                    R(
                      11,
                      $caml_new_string(" instead at position "),
                      R(4, 0, 0, 0, R(12, 46, 0))
                    )
                  )
                )
              )
            )
          )
        )
      ),
      $caml_new_string(
        "invalid format %S: '%%' alone is not accepted in character sets, use %%%% instead at position %d."
      )
    );
    $id = R(
      0,
      R(
        11,
        $caml_new_string("invalid format "),
        R(
          3,
          0,
          R(
            11,
            $caml_new_string(": integer "),
            R(
              4,
              0,
              0,
              0,
              R(
                11,
                $caml_new_string(" is greater than the limit "),
                R(4, 0, 0, 0, 0)
              )
            )
          )
        )
      ),
      $caml_new_string(
        "invalid format %S: integer %d is greater than the limit %d"
      )
    );
    $ie = R(0, $caml_new_string("camlinternalFormat.ml"), 2811, 11);
    $ig = R(
      0,
      R(
        11,
        $caml_new_string("invalid format "),
        R(
          3,
          0,
          R(
            11,
            $caml_new_string(": unclosed sub-format, expected \""),
            R(
              12,
              37,
              R(
                0,
                R(
                  11,
                  $caml_new_string("\" at character number "),
                  R(4, 0, 0, 0, 0)
                )
              )
            )
          )
        )
      ),
      $caml_new_string(
        "invalid format %S: unclosed sub-format, expected \"%%%c\" at character number %d"
      )
    );
    $ih = R(0, $caml_new_string("camlinternalFormat.ml"), 2873, 34);
    $ii = R(0, $caml_new_string("camlinternalFormat.ml"), 2906, 28);
    $ij = R(0, $caml_new_string("camlinternalFormat.ml"), 2940, 25);
    $ik = R(
      0,
      R(
        11,
        $caml_new_string("invalid format "),
        R(
          3,
          0,
          R(
            11,
            $caml_new_string(": at character number "),
            R(
              4,
              0,
              0,
              0,
              R(
                11,
                $caml_new_string(", "),
                R(
                  2,
                  0,
                  R(
                    11,
                    $caml_new_string(" is incompatible with '"),
                    R(0, R(11, $caml_new_string("' in sub-format "), R(3, 0, 0))
                    )
                  )
                )
              )
            )
          )
        )
      ),
      $caml_new_string(
        "invalid format %S: at character number %d, %s is incompatible with '%c' in sub-format %S"
      )
    );
    $hX = R(
      0,
      R(
        11,
        $caml_new_string("invalid format "),
        R(
          3,
          0,
          R(
            11,
            $caml_new_string(": at character number "),
            R(
              4,
              0,
              0,
              0,
              R(
                11,
                $caml_new_string(", "),
                R(2, 0, R(11, $caml_new_string(" expected, read "), R(1, 0)))
              )
            )
          )
        )
      ),
      $caml_new_string(
        "invalid format %S: at character number %d, %s expected, read %C"
      )
    );
    $hW = R(
      0,
      R(
        11,
        $caml_new_string("invalid format "),
        R(
          3,
          0,
          R(
            11,
            $caml_new_string(": at character number "),
            R(
              4,
              0,
              0,
              0,
              R(
                11,
                $caml_new_string(", '"),
                R(0, R(11, $caml_new_string("' without "), R(2, 0, 0)))
              )
            )
          )
        )
      ),
      $caml_new_string(
        "invalid format %S: at character number %d, '%c' without %s"
      )
    );
    $hV = R(
      0,
      R(
        11,
        $caml_new_string("invalid format "),
        R(
          3,
          0,
          R(
            11,
            $caml_new_string(": at character number "),
            R(4, 0, 0, 0, R(11, $caml_new_string(", "), R(2, 0, 0)))
          )
        )
      ),
      $caml_new_string("invalid format %S: at character number %d, %s")
    );
    $hU = R(
      0,
      R(11, $caml_new_string("invalid box description "), R(3, 0, 0)),
      $caml_new_string("invalid box description %S")
    );
    $hT = R(0, 0, 4);
    $create_char_set = function($param) use ($Bytes,$caml_call2) {
      return $caml_call2($Bytes[1], 32, 0);
    };
    $add_in_char_set = function($char_set, $c) use ($Pervasives,$caml_bytes_set,$caml_call1,$left_shift_32,$runtime,$unsigned_right_shift_32) {
      $str_ind = $unsigned_right_shift_32($c, 3) | 0;
      $mask = $left_shift_32(1, $c & 7);
      $m4 = $runtime["caml_bytes_get"]($char_set, $str_ind) | $mask;
      return $caml_bytes_set(
        $char_set,
        $str_ind,
        $caml_call1($Pervasives[17], $m4)
      );
    };
    $freeze_char_set = function($char_set) use ($Bytes,$caml_call1) {
      return $caml_call1($Bytes[6], $char_set);
    };
    $rev_char_set = function($char_set) use ($Bytes,$Pervasives,$caml_bytes_set,$caml_call1,$caml_string_get,$create_char_set) {
      $char_set__0 = $create_char_set(0);
      $i = 0;
      for (;;) {
        $m2 = $caml_string_get($char_set, $i) ^ 255;
        $caml_bytes_set($char_set__0, $i, $caml_call1($Pervasives[17], $m2));
        $m3 = $i + 1 | 0;
        if (31 !== $i) {$i = $m3;continue;}
        return $caml_call1($Bytes[42], $char_set__0);
      }
    };
    $is_in_char_set = function($char_set, $c) use ($caml_string_get,$left_shift_32,$unsigned_right_shift_32) {
      $str_ind = $unsigned_right_shift_32($c, 3) | 0;
      $mask = $left_shift_32(1, $c & 7);
      return 0 !== ($caml_string_get($char_set, $str_ind) & $mask) ? 1 : (0);
    };
    $pad_of_pad_opt = function($pad_opt) {
      if ($pad_opt) {$width = $pad_opt[1];return V(0, 1, $width);}
      return 0;
    };
    $prec_of_prec_opt = function($prec_opt) {
      if ($prec_opt) {$ndec = $prec_opt[1];return V(0, $ndec);}
      return 0;
    };
    $param_format_of_ignored_format = function($ign, $fmt) use ($is_int,$pad_of_pad_opt,$prec_of_prec_opt) {
      if ($is_int($ign)) {
        switch($ign) {
          // FALLTHROUGH
          case 0:
            return V(0, V(0, $fmt));
          // FALLTHROUGH
          case 1:
            return V(0, V(1, $fmt));
          // FALLTHROUGH
          case 2:
            return V(0, V(19, $fmt));
          // FALLTHROUGH
          default:
            return V(0, V(22, $fmt));
          }
      }
      else {
        switch($ign[0]) {
          // FALLTHROUGH
          case 0:
            $pad_opt = $ign[1];
            return V(0, V(2, $pad_of_pad_opt($pad_opt), $fmt));
          // FALLTHROUGH
          case 1:
            $pad_opt__0 = $ign[1];
            return V(0, V(3, $pad_of_pad_opt($pad_opt__0), $fmt));
          // FALLTHROUGH
          case 2:
            $pad_opt__1 = $ign[2];
            $iconv = $ign[1];
            return V(0, V(4, $iconv, $pad_of_pad_opt($pad_opt__1), 0, $fmt));
          // FALLTHROUGH
          case 3:
            $pad_opt__2 = $ign[2];
            $iconv__0 = $ign[1];
            return V(0, V(5, $iconv__0, $pad_of_pad_opt($pad_opt__2), 0, $fmt)
            );
          // FALLTHROUGH
          case 4:
            $pad_opt__3 = $ign[2];
            $iconv__1 = $ign[1];
            return V(0, V(6, $iconv__1, $pad_of_pad_opt($pad_opt__3), 0, $fmt)
            );
          // FALLTHROUGH
          case 5:
            $pad_opt__4 = $ign[2];
            $iconv__2 = $ign[1];
            return V(0, V(7, $iconv__2, $pad_of_pad_opt($pad_opt__4), 0, $fmt)
            );
          // FALLTHROUGH
          case 6:
            $prec_opt = $ign[2];
            $pad_opt__5 = $ign[1];
            $m1 = $prec_of_prec_opt($prec_opt);
            return V(0, V(8, 0, $pad_of_pad_opt($pad_opt__5), $m1, $fmt));
          // FALLTHROUGH
          case 7:
            $pad_opt__6 = $ign[1];
            return V(0, V(9, $pad_of_pad_opt($pad_opt__6), $fmt));
          // FALLTHROUGH
          case 8:
            $fmtty = $ign[2];
            $pad_opt__7 = $ign[1];
            return V(0, V(13, $pad_opt__7, $fmtty, $fmt));
          // FALLTHROUGH
          case 9:
            $fmtty__0 = $ign[2];
            $pad_opt__8 = $ign[1];
            return V(0, V(14, $pad_opt__8, $fmtty__0, $fmt));
          // FALLTHROUGH
          case 10:
            $char_set = $ign[2];
            $width_opt = $ign[1];
            return V(0, V(20, $width_opt, $char_set, $fmt));
          // FALLTHROUGH
          default:
            $counter = $ign[1];
            return V(0, V(21, $counter, $fmt));
          }
      }
    };
    $default_float_precision = -6;
    $buffer_create = function($init_size) use ($caml_create_bytes) {
      return V(0, 0, $caml_create_bytes($init_size));
    };
    $buffer_check_size = function($buf, $overhead) use ($Bytes,$Pervasives,$caml_call2,$caml_call5,$caml_create_bytes,$runtime) {
      $len = $runtime["caml_ml_bytes_length"]($buf[2]);
      $min_len = $buf[1] + $overhead | 0;
      $mZ = $len < $min_len ? 1 : (0);
      if ($mZ) {
        $new_len = $caml_call2($Pervasives[5], $len * 2 | 0, $min_len);
        $new_str = $caml_create_bytes($new_len);
        $caml_call5($Bytes[11], $buf[2], 0, $new_str, 0, $len);
        $buf[2] = $new_str;
        $m0 = 0;
      }
      else {$m0 = $mZ;}
      return $m0;
    };
    $buffer_add_char = function($buf, $c) use ($buffer_check_size,$caml_bytes_set) {
      $buffer_check_size($buf, 1);
      $caml_bytes_set($buf[2], $buf[1], $c);
      $buf[1] = $buf[1] + 1 | 0;
      return 0;
    };
    $buffer_add_string = function($buf, $s) use ($String,$buffer_check_size,$caml_call5,$caml_ml_string_length) {
      $str_len = $caml_ml_string_length($s);
      $buffer_check_size($buf, $str_len);
      $caml_call5($String[6], $s, 0, $buf[2], $buf[1], $str_len);
      $buf[1] = $buf[1] + $str_len | 0;
      return 0;
    };
    $buffer_contents = function($buf) use ($Bytes,$caml_call3) {
      return $caml_call3($Bytes[8], $buf[2], 0, $buf[1]);
    };
    $char_of_iconv = function($iconv) {
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
    $char_of_fconv = function($fconv) {
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
    $char_of_counter = function($counter) {
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
    $bprint_char_set = function($buf, $char_set) use ($Char,$Pervasives,$buffer_add_char,$caml_call1,$caml_trampoline,$caml_trampoline_return,$is_in_char_set,$rev_char_set,$unsigned_right_shift_32) {
      $print_first = new Ref();
      $print_in = new Ref();
      $print_out = new Ref();
      $print_second = new Ref();
      $print_start = function($set) use ($Char,$buf,$buffer_add_char,$caml_call1,$is_in_char_set,$print_out) {
        $is_alone = function($c) use ($Char,$caml_call1,$is_in_char_set,$set) {
          $after = $caml_call1($Char[1], $c + 1 | 0);
          $before = $caml_call1($Char[1], $c + -1 | 0);
          $mV = $is_in_char_set($set, $c);
          if ($mV) {
            $mW = $is_in_char_set($set, $before);
            $mX = $mW ? $is_in_char_set($set, $after) : ($mW);
            $mY = 1 - $mX;
          }
          else {$mY = $mV;}
          return $mY;
        };
        if ($is_alone(93)) {$buffer_add_char($buf, 93);}
        $print_out->contents($set, 1);
        $mU = $is_alone(45);
        return $mU ? $buffer_add_char($buf, 45) : ($mU);
      };
      $print_char = function($buf, $i) use ($Pervasives,$buffer_add_char,$caml_call1) {
        $c = $caml_call1($Pervasives[17], $i);
        return 37 === $c
          ? $buffer_add_char($buf, 37) || true
           ? $buffer_add_char($buf, 37)
           : ($buffer_add_char($buf, 37))
          : (64 === $c
           ? $buffer_add_char($buf, 37) || true
            ? $buffer_add_char($buf, 64)
            : ($buffer_add_char($buf, 64))
           : ($buffer_add_char($buf, $c)));
      };
      $print_out__0 = function($counter, $set, $i) use ($Pervasives,$caml_call1,$caml_trampoline_return,$is_in_char_set,$print_first) {
        $i__0 = $i;
        for (;;) {
          $mT = $i__0 < 256 ? 1 : (0);
          if ($mT) {
            if ($is_in_char_set($set, $caml_call1($Pervasives[17], $i__0))) {
              if ($counter < 50) {
                $counter__0 = $counter + 1 | 0;
                return $print_first->contents($counter__0, $set, $i__0);
              }
              return $caml_trampoline_return(
                $print_first->contents,
                varray[0,$set,$i__0]
              );
            }
            $i__1 = $i__0 + 1 | 0;
            $i__0 = $i__1;
            continue;
          }
          return $mT;
        }
      };
      $_ = $print_first->contents =
        function($counter, $set, $i) use ($Pervasives,$buf,$caml_call1,$caml_trampoline_return,$print_char,$print_out__0,$print_second,$unsigned_right_shift_32) {
          $match = $caml_call1($Pervasives[17], $i);
          $switcher = $match + -45 | 0;
          if (48 < $unsigned_right_shift_32($switcher, 0)) {
            if (210 <= $switcher) {return $print_char($buf, 255);}
          }
          else {
            $switcher__0 = $switcher + -1 | 0;
            if (46 < $unsigned_right_shift_32($switcher__0, 0)) {
              $mS = $i + 1 | 0;
              if ($counter < 50) {
                $counter__1 = $counter + 1 | 0;
                return $print_out__0($counter__1, $set, $mS);
              }
              return $caml_trampoline_return($print_out__0, varray[0,$set,$mS]
              );
            }
          }
          $mR = $i + 1 | 0;
          if ($counter < 50) {
            $counter__0 = $counter + 1 | 0;
            return $print_second->contents($counter__0, $set, $mR);
          }
          return $caml_trampoline_return(
            $print_second->contents,
            varray[0,$set,$mR]
          );
        };
      $_ = $print_second->contents =
        function($counter, $set, $i) use ($Pervasives,$buf,$caml_call1,$caml_trampoline_return,$is_in_char_set,$print_char,$print_in,$print_out__0,$unsigned_right_shift_32) {
          if ($is_in_char_set($set, $caml_call1($Pervasives[17], $i))) {
            $match = $caml_call1($Pervasives[17], $i);
            $switcher = $match + -45 | 0;
            if (48 < $unsigned_right_shift_32($switcher, 0)) {
              if (210 <= $switcher) {
                $print_char($buf, 254);
                return $print_char($buf, 255);
              }
            }
            else {
              $switcher__0 = $switcher + -1 | 0;
              if (46 < $unsigned_right_shift_32($switcher__0, 0)) {
                if (
                  !
                  $is_in_char_set(
                    $set,
                    $caml_call1($Pervasives[17], $i + 1 | 0)
                  )
                ) {
                  $print_char($buf, $i + -1 | 0);
                  $mP = $i + 1 | 0;
                  if ($counter < 50) {
                    $counter__1 = $counter + 1 | 0;
                    return $print_out__0($counter__1, $set, $mP);
                  }
                  return $caml_trampoline_return(
                    $print_out__0,
                    varray[0,$set,$mP]
                  );
                }
              }
            }
            if (
              $is_in_char_set($set, $caml_call1($Pervasives[17], $i + 1 | 0))
            ) {
              $mM = $i + 2 | 0;
              $mN = $i + -1 | 0;
              if ($counter < 50) {
                $counter__0 = $counter + 1 | 0;
                return $print_in->contents($counter__0, $set, $mN, $mM);
              }
              return $caml_trampoline_return(
                $print_in->contents,
                varray[0,$set,$mN,$mM]
              );
            }
            $print_char($buf, $i + -1 | 0);
            $print_char($buf, $i);
            $mO = $i + 2 | 0;
            if ($counter < 50) {
              $counter__2 = $counter + 1 | 0;
              return $print_out__0($counter__2, $set, $mO);
            }
            return $caml_trampoline_return($print_out__0, varray[0,$set,$mO]);
          }
          $print_char($buf, $i + -1 | 0);
          $mQ = $i + 1 | 0;
          if ($counter < 50) {
            $counter__3 = $counter + 1 | 0;
            return $print_out__0($counter__3, $set, $mQ);
          }
          return $caml_trampoline_return($print_out__0, varray[0,$set,$mQ]);
        };
      $_ = $print_in->contents =
        function($counter, $set, $i, $j) use ($Pervasives,$buf,$caml_call1,$caml_trampoline_return,$is_in_char_set,$print_char,$print_out__0) {
          $j__0 = $j;
          for (;;) {
            if (256 !== $j__0) {
              if ($is_in_char_set($set, $caml_call1($Pervasives[17], $j__0))) {$j__1 = $j__0 + 1 | 0;$j__0 = $j__1;continue;}
            }
            $print_char($buf, $i);
            $print_char($buf, 45);
            $print_char($buf, $j__0 + -1 | 0);
            $mK = $j__0 < 256 ? 1 : (0);
            if ($mK) {
              $mL = $j__0 + 1 | 0;
              if ($counter < 50) {
                $counter__0 = $counter + 1 | 0;
                return $print_out__0($counter__0, $set, $mL);
              }
              return $caml_trampoline_return($print_out__0, varray[0,$set,$mL]
              );
            }
            return $mK;
          }
        };
      $_ = $print_out->contents =
        function($set, $i) use ($caml_trampoline,$print_out__0) {
          return $caml_trampoline($print_out__0(0, $set, $i));
        };
      $buffer_add_char($buf, 91);
      $mJ = $is_in_char_set($char_set, 0)
        ? $buffer_add_char($buf, 94) || true
         ? $rev_char_set($char_set)
         : ($rev_char_set($char_set))
        : ($char_set);
      $print_start($mJ);
      return $buffer_add_char($buf, 93);
    };
    $bprint_padty = function($buf, $padty) use ($buffer_add_char) {
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
    $bprint_ignored_flag = function($buf, $ign_flag) use ($buffer_add_char) {
      return $ign_flag ? $buffer_add_char($buf, 95) : ($ign_flag);
    };
    $bprint_pad_opt = function($buf, $pad_opt) use ($Pervasives,$buffer_add_string,$caml_call1) {
      if ($pad_opt) {
        $width = $pad_opt[1];
        return $buffer_add_string($buf, $caml_call1($Pervasives[21], $width));
      }
      return 0;
    };
    $bprint_padding = function($buf, $pad) use ($Pervasives,$bprint_padty,$buffer_add_char,$buffer_add_string,$caml_call1,$is_int) {
      if ($is_int($pad)) {return 0;}
      else {
        if (0 === $pad[0]) {
          $n = $pad[2];
          $padty = $pad[1];
          $bprint_padty($buf, $padty);
          return $buffer_add_string($buf, $caml_call1($Pervasives[21], $n));
        }
        $padty__0 = $pad[1];
        $bprint_padty($buf, $padty__0);
        return $buffer_add_char($buf, 42);
      }
    };
    $bprint_precision = function($buf, $prec) use ($Pervasives,$buffer_add_char,$buffer_add_string,$caml_call1,$cst,$is_int) {
      if ($is_int($prec)) {
        return 0 === $prec ? 0 : ($buffer_add_string($buf, $cst));
      }
      $n = $prec[1];
      $buffer_add_char($buf, 46);
      return $buffer_add_string($buf, $caml_call1($Pervasives[21], $n));
    };
    $bprint_iconv_flag = function($buf, $iconv) use ($buffer_add_char) {
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
    $bprint_int_fmt = function($buf, $ign_flag, $iconv, $pad, $prec) use ($bprint_iconv_flag,$bprint_ignored_flag,$bprint_padding,$bprint_precision,$buffer_add_char,$char_of_iconv) {
      $buffer_add_char($buf, 37);
      $bprint_ignored_flag($buf, $ign_flag);
      $bprint_iconv_flag($buf, $iconv);
      $bprint_padding($buf, $pad);
      $bprint_precision($buf, $prec);
      return $buffer_add_char($buf, $char_of_iconv($iconv));
    };
    $bprint_altint_fmt = function($buf, $ign_flag, $iconv, $pad, $prec, $c) use ($bprint_iconv_flag,$bprint_ignored_flag,$bprint_padding,$bprint_precision,$buffer_add_char,$char_of_iconv) {
      $buffer_add_char($buf, 37);
      $bprint_ignored_flag($buf, $ign_flag);
      $bprint_iconv_flag($buf, $iconv);
      $bprint_padding($buf, $pad);
      $bprint_precision($buf, $prec);
      $buffer_add_char($buf, $c);
      return $buffer_add_char($buf, $char_of_iconv($iconv));
    };
    $bprint_fconv_flag = function($buf, $fconv) use ($buffer_add_char) {
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
    $bprint_float_fmt = function($buf, $ign_flag, $fconv, $pad, $prec) use ($bprint_fconv_flag,$bprint_ignored_flag,$bprint_padding,$bprint_precision,$buffer_add_char,$char_of_fconv) {
      $buffer_add_char($buf, 37);
      $bprint_ignored_flag($buf, $ign_flag);
      $bprint_fconv_flag($buf, $fconv);
      $bprint_padding($buf, $pad);
      $bprint_precision($buf, $prec);
      return $buffer_add_char($buf, $char_of_fconv($fconv));
    };
    $string_of_formatting_lit = function($formatting_lit) use ($Pervasives,$String,$caml_call2,$cst__0,$cst__1,$cst__2,$cst__3,$cst__4,$cst__5,$cst__6,$cst__7,$is_int) {
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
            $mI = $caml_call2($String[1], 1, $c);
            return $caml_call2($Pervasives[16], $cst__7, $mI);
          }
      }
    };
    $string_of_formatting_gen = function($formatting_gen) {
      if (0 === $formatting_gen[0]) {
        $match = $formatting_gen[1];
        $str = $match[2];
        return $str;
      }
      $match__0 = $formatting_gen[1];
      $str__0 = $match__0[2];
      return $str__0;
    };
    $bprint_char_literal = function($buf, $chr) use ($buffer_add_char,$buffer_add_string,$cst__8) {
      return 37 === $chr
        ? $buffer_add_string($buf, $cst__8)
        : ($buffer_add_char($buf, $chr));
    };
    $bprint_string_literal = function($buf, $str) use ($bprint_char_literal,$caml_ml_string_length,$caml_string_get) {
      $mG = $caml_ml_string_length($str) + -1 | 0;
      $mF = 0;
      if (! ($mG < 0)) {
        $i = $mF;
        for (;;) {
          $bprint_char_literal($buf, $caml_string_get($str, $i));
          $mH = $i + 1 | 0;
          if ($mG !== $i) {$i = $mH;continue;}
          break;
        }
      }
      return 0;
    };
    $_ = $bprint_fmtty->contents =
      function($buf, $fmtty) use ($bprint_fmtty,$buffer_add_string,$cst_B,$cst_Li,$cst__10,$cst__11,$cst__12,$cst__13,$cst__9,$cst_a,$cst_c,$cst_f,$cst_i,$cst_li,$cst_ni,$cst_r,$cst_r__0,$cst_s,$cst_t,$is_int) {
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
    $_ = $int_of_custom_arity->contents =
      function($param) use ($int_of_custom_arity) {
        if ($param) {
          $x = $param[1];
          return 1 + $int_of_custom_arity->contents($x) | 0;
        }
        return 0;
      };
    $bprint_fmt = function($buf, $fmt) use ($bprint_altint_fmt,$bprint_char_literal,$bprint_char_set,$bprint_float_fmt,$bprint_fmtty,$bprint_ignored_flag,$bprint_int_fmt,$bprint_pad_opt,$bprint_padding,$bprint_string_literal,$buffer_add_char,$buffer_add_string,$char_of_counter,$cst_0c,$cst__14,$cst__15,$int_of_custom_arity,$is_int,$param_format_of_ignored_format,$string_of_formatting_gen,$string_of_formatting_lit) {
      $fmtiter = function($fmt, $ign_flag) use ($bprint_altint_fmt,$bprint_char_literal,$bprint_char_set,$bprint_float_fmt,$bprint_fmtty,$bprint_ignored_flag,$bprint_int_fmt,$bprint_pad_opt,$bprint_padding,$bprint_string_literal,$buf,$buffer_add_char,$buffer_add_string,$char_of_counter,$cst_0c,$cst__14,$cst__15,$int_of_custom_arity,$is_int,$param_format_of_ignored_format,$string_of_formatting_gen,$string_of_formatting_lit) {
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
              $mD = $int_of_custom_arity->contents($arity);
              $mC = 1;
              if (! ($mD < 1)) {
                $i = $mC;
                for (;;) {
                  $buffer_add_char($buf, 37);
                  $bprint_ignored_flag($buf, $ign_flag__0);
                  $buffer_add_char($buf, 63);
                  $mE = $i + 1 | 0;
                  if ($mD !== $i) {$i = $mE;continue;}
                  break;
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
    $string_of_fmt = function($fmt) use ($bprint_fmt,$buffer_contents,$buffer_create) {
      $buf = $buffer_create(16);
      $bprint_fmt($buf, $fmt);
      return $buffer_contents($buf);
    };
    $_ = $symm->contents =
      function($param) use ($is_int,$symm) {
        if ($is_int($param)) {return 0;}
        else {
          switch($param[0]) {
            // FALLTHROUGH
            case 0:
              $rest = $param[1];
              return V(0, $symm->contents($rest));
            // FALLTHROUGH
            case 1:
              $rest__0 = $param[1];
              return V(1, $symm->contents($rest__0));
            // FALLTHROUGH
            case 2:
              $rest__1 = $param[1];
              return V(2, $symm->contents($rest__1));
            // FALLTHROUGH
            case 3:
              $rest__2 = $param[1];
              return V(3, $symm->contents($rest__2));
            // FALLTHROUGH
            case 4:
              $rest__3 = $param[1];
              return V(4, $symm->contents($rest__3));
            // FALLTHROUGH
            case 5:
              $rest__4 = $param[1];
              return V(5, $symm->contents($rest__4));
            // FALLTHROUGH
            case 6:
              $rest__5 = $param[1];
              return V(6, $symm->contents($rest__5));
            // FALLTHROUGH
            case 7:
              $rest__6 = $param[1];
              return V(7, $symm->contents($rest__6));
            // FALLTHROUGH
            case 8:
              $rest__7 = $param[2];
              $ty = $param[1];
              return V(8, $ty, $symm->contents($rest__7));
            // FALLTHROUGH
            case 9:
              $rest__8 = $param[3];
              $ty2 = $param[2];
              $ty1 = $param[1];
              return V(9, $ty2, $ty1, $symm->contents($rest__8));
            // FALLTHROUGH
            case 10:
              $rest__9 = $param[1];
              return V(10, $symm->contents($rest__9));
            // FALLTHROUGH
            case 11:
              $rest__10 = $param[1];
              return V(11, $symm->contents($rest__10));
            // FALLTHROUGH
            case 12:
              $rest__11 = $param[1];
              return V(12, $symm->contents($rest__11));
            // FALLTHROUGH
            case 13:
              $rest__12 = $param[1];
              return V(13, $symm->contents($rest__12));
            // FALLTHROUGH
            default:
              $rest__13 = $param[1];
              return V(14, $symm->contents($rest__13));
            }
        }
      };
    $_ = $fmtty_rel_det->contents =
      function($param) use ($caml_call1,$fmtty_rel_det,$is_int,$symm,$trans) {
        if ($is_int($param)) {
          $me = function($param) {return 0;};
          $mf = function($param) {return 0;};
          $mg = function($param) {return 0;};
          return V(0, function($param) {return 0;}, $mg, $mf, $me);
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
              $mh = function($param) use ($af,$caml_call1) {
                $caml_call1($af, 0);
                return 0;
              };
              return V(
                0,
                function($param) use ($caml_call1,$fa) {
                  $caml_call1($fa, 0);
                  return 0;
                },
                $mh,
                $ed,
                $de
              );
            // FALLTHROUGH
            case 1:
              $rest__0 = $param[1];
              $match__0 = $fmtty_rel_det->contents($rest__0);
              $de__0 = $match__0[4];
              $ed__0 = $match__0[3];
              $af__0 = $match__0[2];
              $fa__0 = $match__0[1];
              $mi = function($param) use ($af__0,$caml_call1) {
                $caml_call1($af__0, 0);
                return 0;
              };
              return V(
                0,
                function($param) use ($caml_call1,$fa__0) {
                  $caml_call1($fa__0, 0);
                  return 0;
                },
                $mi,
                $ed__0,
                $de__0
              );
            // FALLTHROUGH
            case 2:
              $rest__1 = $param[1];
              $match__1 = $fmtty_rel_det->contents($rest__1);
              $de__1 = $match__1[4];
              $ed__1 = $match__1[3];
              $af__1 = $match__1[2];
              $fa__1 = $match__1[1];
              $mj = function($param) use ($af__1,$caml_call1) {
                $caml_call1($af__1, 0);
                return 0;
              };
              return V(
                0,
                function($param) use ($caml_call1,$fa__1) {
                  $caml_call1($fa__1, 0);
                  return 0;
                },
                $mj,
                $ed__1,
                $de__1
              );
            // FALLTHROUGH
            case 3:
              $rest__2 = $param[1];
              $match__2 = $fmtty_rel_det->contents($rest__2);
              $de__2 = $match__2[4];
              $ed__2 = $match__2[3];
              $af__2 = $match__2[2];
              $fa__2 = $match__2[1];
              $mk = function($param) use ($af__2,$caml_call1) {
                $caml_call1($af__2, 0);
                return 0;
              };
              return V(
                0,
                function($param) use ($caml_call1,$fa__2) {
                  $caml_call1($fa__2, 0);
                  return 0;
                },
                $mk,
                $ed__2,
                $de__2
              );
            // FALLTHROUGH
            case 4:
              $rest__3 = $param[1];
              $match__3 = $fmtty_rel_det->contents($rest__3);
              $de__3 = $match__3[4];
              $ed__3 = $match__3[3];
              $af__3 = $match__3[2];
              $fa__3 = $match__3[1];
              $ml = function($param) use ($af__3,$caml_call1) {
                $caml_call1($af__3, 0);
                return 0;
              };
              return V(
                0,
                function($param) use ($caml_call1,$fa__3) {
                  $caml_call1($fa__3, 0);
                  return 0;
                },
                $ml,
                $ed__3,
                $de__3
              );
            // FALLTHROUGH
            case 5:
              $rest__4 = $param[1];
              $match__4 = $fmtty_rel_det->contents($rest__4);
              $de__4 = $match__4[4];
              $ed__4 = $match__4[3];
              $af__4 = $match__4[2];
              $fa__4 = $match__4[1];
              $mm = function($param) use ($af__4,$caml_call1) {
                $caml_call1($af__4, 0);
                return 0;
              };
              return V(
                0,
                function($param) use ($caml_call1,$fa__4) {
                  $caml_call1($fa__4, 0);
                  return 0;
                },
                $mm,
                $ed__4,
                $de__4
              );
            // FALLTHROUGH
            case 6:
              $rest__5 = $param[1];
              $match__5 = $fmtty_rel_det->contents($rest__5);
              $de__5 = $match__5[4];
              $ed__5 = $match__5[3];
              $af__5 = $match__5[2];
              $fa__5 = $match__5[1];
              $mn = function($param) use ($af__5,$caml_call1) {
                $caml_call1($af__5, 0);
                return 0;
              };
              return V(
                0,
                function($param) use ($caml_call1,$fa__5) {
                  $caml_call1($fa__5, 0);
                  return 0;
                },
                $mn,
                $ed__5,
                $de__5
              );
            // FALLTHROUGH
            case 7:
              $rest__6 = $param[1];
              $match__6 = $fmtty_rel_det->contents($rest__6);
              $de__6 = $match__6[4];
              $ed__6 = $match__6[3];
              $af__6 = $match__6[2];
              $fa__6 = $match__6[1];
              $mo = function($param) use ($af__6,$caml_call1) {
                $caml_call1($af__6, 0);
                return 0;
              };
              return V(
                0,
                function($param) use ($caml_call1,$fa__6) {
                  $caml_call1($fa__6, 0);
                  return 0;
                },
                $mo,
                $ed__6,
                $de__6
              );
            // FALLTHROUGH
            case 8:
              $rest__7 = $param[2];
              $match__7 = $fmtty_rel_det->contents($rest__7);
              $de__7 = $match__7[4];
              $ed__7 = $match__7[3];
              $af__7 = $match__7[2];
              $fa__7 = $match__7[1];
              $mp = function($param) use ($af__7,$caml_call1) {
                $caml_call1($af__7, 0);
                return 0;
              };
              return V(
                0,
                function($param) use ($caml_call1,$fa__7) {
                  $caml_call1($fa__7, 0);
                  return 0;
                },
                $mp,
                $ed__7,
                $de__7
              );
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
              $mq = function($param) use ($caml_call1,$de__8,$jd) {
                $caml_call1($jd, 0);
                $caml_call1($de__8, 0);
                return 0;
              };
              $mr = function($param) use ($caml_call1,$dj,$ed__8) {
                $caml_call1($ed__8, 0);
                $caml_call1($dj, 0);
                return 0;
              };
              $ms = function($param) use ($af__8,$caml_call1,$ga) {
                $caml_call1($ga, 0);
                $caml_call1($af__8, 0);
                return 0;
              };
              return V(
                0,
                function($param) use ($ag,$caml_call1,$fa__8) {
                  $caml_call1($fa__8, 0);
                  $caml_call1($ag, 0);
                  return 0;
                },
                $ms,
                $mr,
                $mq
              );
            // FALLTHROUGH
            case 10:
              $rest__9 = $param[1];
              $match__10 = $fmtty_rel_det->contents($rest__9);
              $de__9 = $match__10[4];
              $ed__9 = $match__10[3];
              $af__9 = $match__10[2];
              $fa__9 = $match__10[1];
              $mt = function($param) use ($af__9,$caml_call1) {
                $caml_call1($af__9, 0);
                return 0;
              };
              return V(
                0,
                function($param) use ($caml_call1,$fa__9) {
                  $caml_call1($fa__9, 0);
                  return 0;
                },
                $mt,
                $ed__9,
                $de__9
              );
            // FALLTHROUGH
            case 11:
              $rest__10 = $param[1];
              $match__11 = $fmtty_rel_det->contents($rest__10);
              $de__10 = $match__11[4];
              $ed__10 = $match__11[3];
              $af__10 = $match__11[2];
              $fa__10 = $match__11[1];
              $mu = function($param) use ($af__10,$caml_call1) {
                $caml_call1($af__10, 0);
                return 0;
              };
              return V(
                0,
                function($param) use ($caml_call1,$fa__10) {
                  $caml_call1($fa__10, 0);
                  return 0;
                },
                $mu,
                $ed__10,
                $de__10
              );
            // FALLTHROUGH
            case 12:
              $rest__11 = $param[1];
              $match__12 = $fmtty_rel_det->contents($rest__11);
              $de__11 = $match__12[4];
              $ed__11 = $match__12[3];
              $af__11 = $match__12[2];
              $fa__11 = $match__12[1];
              $mv = function($param) use ($af__11,$caml_call1) {
                $caml_call1($af__11, 0);
                return 0;
              };
              return V(
                0,
                function($param) use ($caml_call1,$fa__11) {
                  $caml_call1($fa__11, 0);
                  return 0;
                },
                $mv,
                $ed__11,
                $de__11
              );
            // FALLTHROUGH
            case 13:
              $rest__12 = $param[1];
              $match__13 = $fmtty_rel_det->contents($rest__12);
              $de__12 = $match__13[4];
              $ed__12 = $match__13[3];
              $af__12 = $match__13[2];
              $fa__12 = $match__13[1];
              $mw = function($param) use ($caml_call1,$de__12) {
                $caml_call1($de__12, 0);
                return 0;
              };
              $mx = function($param) use ($caml_call1,$ed__12) {
                $caml_call1($ed__12, 0);
                return 0;
              };
              $my = function($param) use ($af__12,$caml_call1) {
                $caml_call1($af__12, 0);
                return 0;
              };
              return V(
                0,
                function($param) use ($caml_call1,$fa__12) {
                  $caml_call1($fa__12, 0);
                  return 0;
                },
                $my,
                $mx,
                $mw
              );
            // FALLTHROUGH
            default:
              $rest__13 = $param[1];
              $match__14 = $fmtty_rel_det->contents($rest__13);
              $de__13 = $match__14[4];
              $ed__13 = $match__14[3];
              $af__13 = $match__14[2];
              $fa__13 = $match__14[1];
              $mz = function($param) use ($caml_call1,$de__13) {
                $caml_call1($de__13, 0);
                return 0;
              };
              $mA = function($param) use ($caml_call1,$ed__13) {
                $caml_call1($ed__13, 0);
                return 0;
              };
              $mB = function($param) use ($af__13,$caml_call1) {
                $caml_call1($af__13, 0);
                return 0;
              };
              return V(
                0,
                function($param) use ($caml_call1,$fa__13) {
                  $caml_call1($fa__13, 0);
                  return 0;
                },
                $mB,
                $mA,
                $mz
              );
            }
        }
      };
    $_ = $trans->contents =
      function($ty1, $match) use ($Assert_failure,$caml_call1,$fmtty_rel_det,$hA,$hB,$hC,$hD,$hE,$hF,$hG,$hH,$hI,$hJ,$hK,$hL,$hM,$hN,$hy,$hz,$is_int,$runtime,$symm,$trans) {
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
                throw $runtime["caml_wrap_thrown_exception"](V(0, $Assert_failure, $hy));
              }
          }
        }
        else {
          switch($ty1[0]) {
            // FALLTHROUGH
            case 0:
              $lW = $ty1[1];
              if ($is_int($match)) {$switch__1 = 1;}
              else {
                switch($match[0]) {
                  // FALLTHROUGH
                  case 0:
                    $rest2 = $match[1];
                    return V(0, $trans->contents($lW, $rest2));
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
              $lX = $ty1[1];
              if ($is_int($match)) {$switch__2 = 1;}
              else {
                switch($match[0]) {
                  // FALLTHROUGH
                  case 1:
                    $rest2__0 = $match[1];
                    return V(1, $trans->contents($lX, $rest2__0));
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
              $lY = $ty1[1];
              if ($is_int($match)) {$switch__3 = 1;}
              else {
                switch($match[0]) {
                  // FALLTHROUGH
                  case 2:
                    $rest2__1 = $match[1];
                    return V(2, $trans->contents($lY, $rest2__1));
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
              $lZ = $ty1[1];
              if ($is_int($match)) {$switch__4 = 1;}
              else {
                switch($match[0]) {
                  // FALLTHROUGH
                  case 3:
                    $rest2__2 = $match[1];
                    return V(3, $trans->contents($lZ, $rest2__2));
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
              $l0 = $ty1[1];
              if ($is_int($match)) {$switch__5 = 1;}
              else {
                switch($match[0]) {
                  // FALLTHROUGH
                  case 4:
                    $rest2__3 = $match[1];
                    return V(4, $trans->contents($l0, $rest2__3));
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
              $l1 = $ty1[1];
              if ($is_int($match)) {$switch__6 = 1;}
              else {
                switch($match[0]) {
                  // FALLTHROUGH
                  case 5:
                    $rest2__4 = $match[1];
                    return V(5, $trans->contents($l1, $rest2__4));
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
              $l2 = $ty1[1];
              if ($is_int($match)) {$switch__7 = 1;}
              else {
                switch($match[0]) {
                  // FALLTHROUGH
                  case 6:
                    $rest2__5 = $match[1];
                    return V(6, $trans->contents($l2, $rest2__5));
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
              $l3 = $ty1[1];
              if ($is_int($match)) {$switch__8 = 1;}
              else {
                switch($match[0]) {
                  // FALLTHROUGH
                  case 7:
                    $rest2__6 = $match[1];
                    return V(7, $trans->contents($l3, $rest2__6));
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
              $l4 = $ty1[2];
              $l5 = $ty1[1];
              if ($is_int($match)) {$switch__9 = 1;}
              else {
                switch($match[0]) {
                  // FALLTHROUGH
                  case 8:
                    $rest2__7 = $match[2];
                    $ty2 = $match[1];
                    $l6 = $trans->contents($l4, $rest2__7);
                    return V(8, $trans->contents($l5, $ty2), $l6);
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
                throw $runtime["caml_wrap_thrown_exception"](V(0, $Assert_failure, $hH));
              }
              break;
            // FALLTHROUGH
            case 9:
              $l7 = $ty1[3];
              $l8 = $ty1[2];
              $l9 = $ty1[1];
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
                    $ty = $trans->contents($symm->contents($l8), $ty21);
                    $match__0 = $fmtty_rel_det->contents($ty);
                    $f4 = $match__0[4];
                    $f2 = $match__0[2];
                    $caml_call1($f2, 0);
                    $caml_call1($f4, 0);
                    return V(9, $l9, $ty22, $trans->contents($l7, $rest2__8));
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
                throw $runtime["caml_wrap_thrown_exception"](V(0, $Assert_failure, $hI));
              }
              break;
            // FALLTHROUGH
            case 10:
              $l_ = $ty1[1];
              if (! $is_int($match) && 10 === $match[0]) {
                $rest2__9 = $match[1];
                return V(10, $trans->contents($l_, $rest2__9));
              }
              throw $runtime["caml_wrap_thrown_exception"](V(0, $Assert_failure, $hJ));
            // FALLTHROUGH
            case 11:
              $ma = $ty1[1];
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
                    return V(11, $trans->contents($ma, $rest2__10));
                  // FALLTHROUGH
                  default:
                    $switch__11 = 1;
                  }
              }
              if ($switch__11) {
                throw $runtime["caml_wrap_thrown_exception"](V(0, $Assert_failure, $hK));
              }
              break;
            // FALLTHROUGH
            case 12:
              $mb = $ty1[1];
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
                    return V(12, $trans->contents($mb, $rest2__11));
                  // FALLTHROUGH
                  default:
                    $switch__12 = 1;
                  }
              }
              if ($switch__12) {
                throw $runtime["caml_wrap_thrown_exception"](V(0, $Assert_failure, $hL));
              }
              break;
            // FALLTHROUGH
            case 13:
              $mc = $ty1[1];
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
                    return V(13, $trans->contents($mc, $rest2__12));
                  // FALLTHROUGH
                  default:
                    $switch__13 = 1;
                  }
              }
              if ($switch__13) {
                throw $runtime["caml_wrap_thrown_exception"](V(0, $Assert_failure, $hM));
              }
              break;
            // FALLTHROUGH
            default:
              $md = $ty1[1];
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
                    return V(14, $trans->contents($md, $rest2__13));
                  // FALLTHROUGH
                  default:
                    $switch__14 = 1;
                  }
              }
              if ($switch__14) {
                throw $runtime["caml_wrap_thrown_exception"](V(0, $Assert_failure, $hN));
              }
            }
        }
        switch($switch__0) {
          // FALLTHROUGH
          case 0:
            throw $runtime["caml_wrap_thrown_exception"](V(0, $Assert_failure, $hB));
          // FALLTHROUGH
          case 1:
            throw $runtime["caml_wrap_thrown_exception"](V(0, $Assert_failure, $hC));
          // FALLTHROUGH
          case 2:
            throw $runtime["caml_wrap_thrown_exception"](V(0, $Assert_failure, $hD));
          // FALLTHROUGH
          case 3:
            throw $runtime["caml_wrap_thrown_exception"](V(0, $Assert_failure, $hE));
          // FALLTHROUGH
          case 4:
            throw $runtime["caml_wrap_thrown_exception"](V(0, $Assert_failure, $hF));
          // FALLTHROUGH
          case 5:
            throw $runtime["caml_wrap_thrown_exception"](V(0, $Assert_failure, $hz));
          // FALLTHROUGH
          case 6:
            throw $runtime["caml_wrap_thrown_exception"](V(0, $Assert_failure, $hA));
          // FALLTHROUGH
          default:
            throw $runtime["caml_wrap_thrown_exception"](V(0, $Assert_failure, $hG));
          }
      };
    $fmtty_of_padding_fmtty = function($pad, $fmtty) use ($is_int) {
      return $is_int($pad)
        ? $fmtty
        : (0 === $pad[0] ? $fmtty : (V(2, $fmtty)));
    };
    $_ = $fmtty_of_custom->contents =
      function($arity, $fmtty) use ($fmtty_of_custom) {
        if ($arity) {
          $arity__0 = $arity[1];
          return V(12, $fmtty_of_custom->contents($arity__0, $fmtty));
        }
        return $fmtty;
      };
    $fmtty_of_fmt__0 = function($counter, $fmtty) use ($CamlinternalFormatBasics,$caml_call2,$caml_trampoline_return,$fmtty_of_custom,$fmtty_of_fmt,$fmtty_of_formatting_gen,$fmtty_of_ignored_format,$fmtty_of_padding_fmtty,$fmtty_of_precision_fmtty,$is_int) {
      $fmtty__0 = $fmtty;
      for (;;) if (
        $is_int($fmtty__0)
      ) {return 0;}
      else {
        switch($fmtty__0[0]) {
          // FALLTHROUGH
          case 0:
            $rest = $fmtty__0[1];
            return V(0, $fmtty_of_fmt->contents($rest));
          // FALLTHROUGH
          case 1:
            $rest__0 = $fmtty__0[1];
            return V(0, $fmtty_of_fmt->contents($rest__0));
          // FALLTHROUGH
          case 2:
            $rest__1 = $fmtty__0[2];
            $pad = $fmtty__0[1];
            return $fmtty_of_padding_fmtty(
              $pad,
              V(1, $fmtty_of_fmt->contents($rest__1))
            );
          // FALLTHROUGH
          case 3:
            $rest__2 = $fmtty__0[2];
            $pad__0 = $fmtty__0[1];
            return $fmtty_of_padding_fmtty(
              $pad__0,
              V(1, $fmtty_of_fmt->contents($rest__2))
            );
          // FALLTHROUGH
          case 4:
            $rest__3 = $fmtty__0[4];
            $prec = $fmtty__0[3];
            $pad__1 = $fmtty__0[2];
            $ty_rest = $fmtty_of_fmt->contents($rest__3);
            $prec_ty = $fmtty_of_precision_fmtty->contents(
              $prec,
              V(2, $ty_rest)
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
              V(3, $ty_rest__0)
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
              V(4, $ty_rest__1)
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
              V(5, $ty_rest__2)
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
              V(6, $ty_rest__3)
            );
            return $fmtty_of_padding_fmtty($pad__5, $prec_ty__3);
          // FALLTHROUGH
          case 9:
            $rest__8 = $fmtty__0[2];
            $pad__6 = $fmtty__0[1];
            return $fmtty_of_padding_fmtty(
              $pad__6,
              V(7, $fmtty_of_fmt->contents($rest__8))
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
            return V(8, $ty, $fmtty_of_fmt->contents($rest__9));
          // FALLTHROUGH
          case 14:
            $rest__10 = $fmtty__0[3];
            $ty__0 = $fmtty__0[2];
            return V(9, $ty__0, $ty__0, $fmtty_of_fmt->contents($rest__10));
          // FALLTHROUGH
          case 15:
            $rest__11 = $fmtty__0[1];
            return V(10, $fmtty_of_fmt->contents($rest__11));
          // FALLTHROUGH
          case 16:
            $rest__12 = $fmtty__0[1];
            return V(11, $fmtty_of_fmt->contents($rest__12));
          // FALLTHROUGH
          case 17:
            $fmtty__4 = $fmtty__0[2];
            $fmtty__0 = $fmtty__4;
            continue;
          // FALLTHROUGH
          case 18:
            $rest__13 = $fmtty__0[2];
            $fmting_gen = $fmtty__0[1];
            $lU = $fmtty_of_fmt->contents($rest__13);
            $lV = $fmtty_of_formatting_gen->contents($fmting_gen);
            return $caml_call2($CamlinternalFormatBasics[1], $lV, $lU);
          // FALLTHROUGH
          case 19:
            $rest__14 = $fmtty__0[1];
            return V(13, $fmtty_of_fmt->contents($rest__14));
          // FALLTHROUGH
          case 20:
            $rest__15 = $fmtty__0[3];
            return V(1, $fmtty_of_fmt->contents($rest__15));
          // FALLTHROUGH
          case 21:
            $rest__16 = $fmtty__0[2];
            return V(2, $fmtty_of_fmt->contents($rest__16));
          // FALLTHROUGH
          case 22:
            $rest__17 = $fmtty__0[1];
            return V(0, $fmtty_of_fmt->contents($rest__17));
          // FALLTHROUGH
          case 23:
            $rest__18 = $fmtty__0[2];
            $ign = $fmtty__0[1];
            if ($counter < 50) {
              $counter__0 = $counter + 1 | 0;
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
    $_ = $fmtty_of_ignored_format->contents =
      function($counter, $ign, $fmt) use ($CamlinternalFormatBasics,$caml_call2,$caml_trampoline_return,$fmtty_of_fmt,$fmtty_of_fmt__0,$is_int) {
        if ($is_int($ign)) {
          switch($ign) {
            // FALLTHROUGH
            case 0:
              if ($counter < 50) {
                $counter__0 = $counter + 1 | 0;
                return $fmtty_of_fmt__0($counter__0, $fmt);
              }
              return $caml_trampoline_return($fmtty_of_fmt__0, varray[0,$fmt]);
            // FALLTHROUGH
            case 1:
              if ($counter < 50) {
                $counter__1 = $counter + 1 | 0;
                return $fmtty_of_fmt__0($counter__1, $fmt);
              }
              return $caml_trampoline_return($fmtty_of_fmt__0, varray[0,$fmt]);
            // FALLTHROUGH
            case 2:
              return V(14, $fmtty_of_fmt->contents($fmt));
            // FALLTHROUGH
            default:
              if ($counter < 50) {
                $counter__2 = $counter + 1 | 0;
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
                $counter__3 = $counter + 1 | 0;
                return $fmtty_of_fmt__0($counter__3, $fmt);
              }
              return $caml_trampoline_return($fmtty_of_fmt__0, varray[0,$fmt]);
            // FALLTHROUGH
            case 1:
              if ($counter < 50) {
                $counter__4 = $counter + 1 | 0;
                return $fmtty_of_fmt__0($counter__4, $fmt);
              }
              return $caml_trampoline_return($fmtty_of_fmt__0, varray[0,$fmt]);
            // FALLTHROUGH
            case 2:
              if ($counter < 50) {
                $counter__5 = $counter + 1 | 0;
                return $fmtty_of_fmt__0($counter__5, $fmt);
              }
              return $caml_trampoline_return($fmtty_of_fmt__0, varray[0,$fmt]);
            // FALLTHROUGH
            case 3:
              if ($counter < 50) {
                $counter__6 = $counter + 1 | 0;
                return $fmtty_of_fmt__0($counter__6, $fmt);
              }
              return $caml_trampoline_return($fmtty_of_fmt__0, varray[0,$fmt]);
            // FALLTHROUGH
            case 4:
              if ($counter < 50) {
                $counter__7 = $counter + 1 | 0;
                return $fmtty_of_fmt__0($counter__7, $fmt);
              }
              return $caml_trampoline_return($fmtty_of_fmt__0, varray[0,$fmt]);
            // FALLTHROUGH
            case 5:
              if ($counter < 50) {
                $counter__8 = $counter + 1 | 0;
                return $fmtty_of_fmt__0($counter__8, $fmt);
              }
              return $caml_trampoline_return($fmtty_of_fmt__0, varray[0,$fmt]);
            // FALLTHROUGH
            case 6:
              if ($counter < 50) {
                $counter__9 = $counter + 1 | 0;
                return $fmtty_of_fmt__0($counter__9, $fmt);
              }
              return $caml_trampoline_return($fmtty_of_fmt__0, varray[0,$fmt]);
            // FALLTHROUGH
            case 7:
              if ($counter < 50) {
                $counter__10 = $counter + 1 | 0;
                return $fmtty_of_fmt__0($counter__10, $fmt);
              }
              return $caml_trampoline_return($fmtty_of_fmt__0, varray[0,$fmt]);
            // FALLTHROUGH
            case 8:
              if ($counter < 50) {
                $counter__11 = $counter + 1 | 0;
                return $fmtty_of_fmt__0($counter__11, $fmt);
              }
              return $caml_trampoline_return($fmtty_of_fmt__0, varray[0,$fmt]);
            // FALLTHROUGH
            case 9:
              $fmtty = $ign[2];
              $lT = $fmtty_of_fmt->contents($fmt);
              return $caml_call2($CamlinternalFormatBasics[1], $fmtty, $lT);
            // FALLTHROUGH
            case 10:
              if ($counter < 50) {
                $counter__12 = $counter + 1 | 0;
                return $fmtty_of_fmt__0($counter__12, $fmt);
              }
              return $caml_trampoline_return($fmtty_of_fmt__0, varray[0,$fmt]);
            // FALLTHROUGH
            default:
              if ($counter < 50) {
                $counter__13 = $counter + 1 | 0;
                return $fmtty_of_fmt__0($counter__13, $fmt);
              }
              return $caml_trampoline_return($fmtty_of_fmt__0, varray[0,$fmt]);
            }
        }
      };
    $_ = $fmtty_of_fmt->contents =
      function($fmtty) use ($caml_trampoline,$fmtty_of_fmt__0) {
        return $caml_trampoline($fmtty_of_fmt__0(0, $fmtty));
      };
    $_ = $fmtty_of_formatting_gen->contents =
      function($formatting_gen) use ($fmtty_of_fmt) {
        if (0 === $formatting_gen[0]) {
          $match = $formatting_gen[1];
          $fmt = $match[1];
          return $fmtty_of_fmt->contents($fmt);
        }
        $match__0 = $formatting_gen[1];
        $fmt__0 = $match__0[1];
        return $fmtty_of_fmt->contents($fmt__0);
      };
    $_ = $fmtty_of_precision_fmtty->contents =
      function($prec, $fmtty) use ($is_int) {
        return $is_int($prec)
          ? 0 === $prec ? $fmtty : (V(2, $fmtty))
          : ($fmtty);
      };
    $Type_mismatch = V(
      248,
      $cst_CamlinternalFormat_Type_mismatch,
      $runtime["caml_fresh_oo_id"](0)
    );
    $type_padding = function($pad, $match) use ($Type_mismatch,$is_int,$runtime) {
      if ($is_int($pad)) {
        return V(0, 0, $match);
      }
      else {
        if (0 === $pad[0]) {
          $w = $pad[2];
          $padty = $pad[1];
          return V(0, V(0, $padty, $w), $match);
        }
        if (! $is_int($match) && 2 === $match[0]) {
          $rest = $match[1];
          $padty__0 = $pad[1];
          return V(0, V(1, $padty__0), $rest);
        }
        throw $runtime["caml_wrap_thrown_exception"]($Type_mismatch);
      }
    };
    $type_padprec = function($pad, $prec, $fmtty) use ($Type_mismatch,$is_int,$runtime,$type_padding) {
      $match = $type_padding($pad, $fmtty);
      if ($is_int($prec)) {
        if (0 === $prec) {
          $rest = $match[2];
          $pad__0 = $match[1];
          return V(0, $pad__0, 0, $rest);
        }
        $lS = $match[2];
        if (! $is_int($lS) && 2 === $lS[0]) {
          $rest__0 = $lS[1];
          $pad__1 = $match[1];
          return V(0, $pad__1, 1, $rest__0);
        }
        throw $runtime["caml_wrap_thrown_exception"]($Type_mismatch);
      }
      $rest__1 = $match[2];
      $pad__2 = $match[1];
      $p = $prec[1];
      return V(0, $pad__2, V(0, $p), $rest__1);
    };
    $type_format = function($fmt, $fmtty) use ($Type_mismatch,$is_int,$runtime,$type_format_gen) {
      $lR = $type_format_gen->contents($fmt, $fmtty);
      if ($is_int($lR[2])) {$fmt__0 = $lR[1];return $fmt__0;}
      throw $runtime["caml_wrap_thrown_exception"]($Type_mismatch);
    };
    $type_ignored_param_one = function($ign, $fmt, $fmtty) use ($type_format_gen) {
      $match = $type_format_gen->contents($fmt, $fmtty);
      $fmtty__0 = $match[2];
      $fmt__0 = $match[1];
      return V(0, V(23, $ign, $fmt__0), $fmtty__0);
    };
    $type_ignored_param = function($ign, $fmt, $fmtty) use ($Type_mismatch,$is_int,$runtime,$type_format_gen,$type_ignored_format_substitution,$type_ignored_param_one) {
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
              return V(0, V(23, 2, $fmt__0), $fmtty__0);
            }
            throw $runtime["caml_wrap_thrown_exception"]($Type_mismatch);
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
              V(8, $pad_opt, $sub_fmtty),
              $fmt,
              $fmtty
            );
          // FALLTHROUGH
          case 9:
            $sub_fmtty__0 = $ign[2];
            $pad_opt__0 = $ign[1];
            $lQ = $type_ignored_format_substitution->contents(
              $sub_fmtty__0,
              $fmt,
              $fmtty
            );
            $match__0 = $lQ[2];
            $fmtty__1 = $match__0[2];
            $fmt__1 = $match__0[1];
            $sub_fmtty__1 = $lQ[1];
            return V(
              0,
              V(23, V(9, $pad_opt__0, $sub_fmtty__1), $fmt__1),
              $fmtty__1
            );
          // FALLTHROUGH
          case 10:
            return $type_ignored_param_one($ign, $fmt, $fmtty);
          // FALLTHROUGH
          default:
            return $type_ignored_param_one($ign, $fmt, $fmtty);
          }
      }
    };
    $type_formatting_gen = function($formatting_gen, $fmt0, $fmtty0) use ($type_format_gen) {
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
        return V(0, V(18, V(0, V(0, $fmt2, $str)), $fmt3), $fmtty3);
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
      return V(0, V(18, V(1, V(0, $fmt2__0, $str__0)), $fmt3__0), $fmtty3__0);
    };
    $_ = $type_format_gen->contents =
      function($fmt, $match) use ($CamlinternalFormatBasics,$Type_mismatch,$caml_call1,$caml_notequal,$is_int,$runtime,$type_format_gen,$type_formatting_gen,$type_ignored_param,$type_padding,$type_padprec) {
        if ($is_int($fmt)) {
          return V(0, 0, $match);
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
                return V(0, V(0, $fmt__0), $fmtty);
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
                return V(0, V(1, $fmt__1), $fmtty__0);
              }
              break;
            // FALLTHROUGH
            case 2:
              $fmt_rest__1 = $fmt[2];
              $pad = $fmt[1];
              $lm = $type_padding($pad, $match);
              $ln = $lm[2];
              $lo = $lm[1];
              if (! $is_int($ln) && 1 === $ln[0]) {
                $fmtty_rest__1 = $ln[1];
                $match__2 = $type_format_gen->contents(
                  $fmt_rest__1,
                  $fmtty_rest__1
                );
                $fmtty__1 = $match__2[2];
                $fmt__2 = $match__2[1];
                return V(0, V(2, $lo, $fmt__2), $fmtty__1);
              }
              throw $runtime["caml_wrap_thrown_exception"]($Type_mismatch);
            // FALLTHROUGH
            case 3:
              $fmt_rest__2 = $fmt[2];
              $pad__0 = $fmt[1];
              $lp = $type_padding($pad__0, $match);
              $lq = $lp[2];
              $lr = $lp[1];
              if (! $is_int($lq) && 1 === $lq[0]) {
                $fmtty_rest__2 = $lq[1];
                $match__3 = $type_format_gen->contents(
                  $fmt_rest__2,
                  $fmtty_rest__2
                );
                $fmtty__2 = $match__3[2];
                $fmt__3 = $match__3[1];
                return V(0, V(3, $lr, $fmt__3), $fmtty__2);
              }
              throw $runtime["caml_wrap_thrown_exception"]($Type_mismatch);
            // FALLTHROUGH
            case 4:
              $fmt_rest__3 = $fmt[4];
              $prec = $fmt[3];
              $pad__1 = $fmt[2];
              $iconv = $fmt[1];
              $ls = $type_padprec($pad__1, $prec, $match);
              $lt = $ls[3];
              $lu = $ls[2];
              $lv = $ls[1];
              if (! $is_int($lt) && 2 === $lt[0]) {
                $fmtty_rest__3 = $lt[1];
                $match__4 = $type_format_gen->contents(
                  $fmt_rest__3,
                  $fmtty_rest__3
                );
                $fmtty__3 = $match__4[2];
                $fmt__4 = $match__4[1];
                return V(0, V(4, $iconv, $lv, $lu, $fmt__4), $fmtty__3);
              }
              throw $runtime["caml_wrap_thrown_exception"]($Type_mismatch);
            // FALLTHROUGH
            case 5:
              $fmt_rest__4 = $fmt[4];
              $prec__0 = $fmt[3];
              $pad__2 = $fmt[2];
              $iconv__0 = $fmt[1];
              $lw = $type_padprec($pad__2, $prec__0, $match);
              $lx = $lw[3];
              $ly = $lw[2];
              $lz = $lw[1];
              if (! $is_int($lx) && 3 === $lx[0]) {
                $fmtty_rest__4 = $lx[1];
                $match__5 = $type_format_gen->contents(
                  $fmt_rest__4,
                  $fmtty_rest__4
                );
                $fmtty__4 = $match__5[2];
                $fmt__5 = $match__5[1];
                return V(0, V(5, $iconv__0, $lz, $ly, $fmt__5), $fmtty__4);
              }
              throw $runtime["caml_wrap_thrown_exception"]($Type_mismatch);
            // FALLTHROUGH
            case 6:
              $fmt_rest__5 = $fmt[4];
              $prec__1 = $fmt[3];
              $pad__3 = $fmt[2];
              $iconv__1 = $fmt[1];
              $lA = $type_padprec($pad__3, $prec__1, $match);
              $lB = $lA[3];
              $lC = $lA[2];
              $lD = $lA[1];
              if (! $is_int($lB) && 4 === $lB[0]) {
                $fmtty_rest__5 = $lB[1];
                $match__6 = $type_format_gen->contents(
                  $fmt_rest__5,
                  $fmtty_rest__5
                );
                $fmtty__5 = $match__6[2];
                $fmt__6 = $match__6[1];
                return V(0, V(6, $iconv__1, $lD, $lC, $fmt__6), $fmtty__5);
              }
              throw $runtime["caml_wrap_thrown_exception"]($Type_mismatch);
            // FALLTHROUGH
            case 7:
              $fmt_rest__6 = $fmt[4];
              $prec__2 = $fmt[3];
              $pad__4 = $fmt[2];
              $iconv__2 = $fmt[1];
              $lE = $type_padprec($pad__4, $prec__2, $match);
              $lF = $lE[3];
              $lG = $lE[2];
              $lH = $lE[1];
              if (! $is_int($lF) && 5 === $lF[0]) {
                $fmtty_rest__6 = $lF[1];
                $match__7 = $type_format_gen->contents(
                  $fmt_rest__6,
                  $fmtty_rest__6
                );
                $fmtty__6 = $match__7[2];
                $fmt__7 = $match__7[1];
                return V(0, V(7, $iconv__2, $lH, $lG, $fmt__7), $fmtty__6);
              }
              throw $runtime["caml_wrap_thrown_exception"]($Type_mismatch);
            // FALLTHROUGH
            case 8:
              $fmt_rest__7 = $fmt[4];
              $prec__3 = $fmt[3];
              $pad__5 = $fmt[2];
              $fconv = $fmt[1];
              $lI = $type_padprec($pad__5, $prec__3, $match);
              $lJ = $lI[3];
              $lK = $lI[2];
              $lL = $lI[1];
              if (! $is_int($lJ) && 6 === $lJ[0]) {
                $fmtty_rest__7 = $lJ[1];
                $match__8 = $type_format_gen->contents(
                  $fmt_rest__7,
                  $fmtty_rest__7
                );
                $fmtty__7 = $match__8[2];
                $fmt__8 = $match__8[1];
                return V(0, V(8, $fconv, $lL, $lK, $fmt__8), $fmtty__7);
              }
              throw $runtime["caml_wrap_thrown_exception"]($Type_mismatch);
            // FALLTHROUGH
            case 9:
              $fmt_rest__8 = $fmt[2];
              $pad__6 = $fmt[1];
              $lM = $type_padding($pad__6, $match);
              $lN = $lM[2];
              $lO = $lM[1];
              if (! $is_int($lN) && 7 === $lN[0]) {
                $fmtty_rest__8 = $lN[1];
                $match__9 = $type_format_gen->contents(
                  $fmt_rest__8,
                  $fmtty_rest__8
                );
                $fmtty__8 = $match__9[2];
                $fmt__9 = $match__9[1];
                return V(0, V(9, $lO, $fmt__9), $fmtty__8);
              }
              throw $runtime["caml_wrap_thrown_exception"]($Type_mismatch);
            // FALLTHROUGH
            case 10:
              $fmt_rest__9 = $fmt[1];
              $match__10 = $type_format_gen->contents($fmt_rest__9, $match);
              $fmtty__9 = $match__10[2];
              $fmt__10 = $match__10[1];
              return V(0, V(10, $fmt__10), $fmtty__9);
            // FALLTHROUGH
            case 11:
              $fmt_rest__10 = $fmt[2];
              $str = $fmt[1];
              $match__11 = $type_format_gen->contents($fmt_rest__10, $match);
              $fmtty__10 = $match__11[2];
              $fmt__11 = $match__11[1];
              return V(0, V(11, $str, $fmt__11), $fmtty__10);
            // FALLTHROUGH
            case 12:
              $fmt_rest__11 = $fmt[2];
              $chr = $fmt[1];
              $match__12 = $type_format_gen->contents($fmt_rest__11, $match);
              $fmtty__11 = $match__12[2];
              $fmt__12 = $match__12[1];
              return V(0, V(12, $chr, $fmt__12), $fmtty__11);
            // FALLTHROUGH
            case 13:
              if (! $is_int($match) && 8 === $match[0]) {
                $fmtty_rest__9 = $match[2];
                $sub_fmtty = $match[1];
                $fmt_rest__12 = $fmt[3];
                $sub_fmtty__0 = $fmt[2];
                $pad_opt = $fmt[1];
                if ($caml_notequal(V(0, $sub_fmtty__0), V(0, $sub_fmtty))) {
                  throw $runtime["caml_wrap_thrown_exception"]($Type_mismatch);
                }
                $match__13 = $type_format_gen->contents(
                  $fmt_rest__12,
                  $fmtty_rest__9
                );
                $fmtty__12 = $match__13[2];
                $fmt__13 = $match__13[1];
                return V(0, V(13, $pad_opt, $sub_fmtty, $fmt__13), $fmtty__12);
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
                $lP = V(
                  0,
                  $caml_call1($CamlinternalFormatBasics[2], $sub_fmtty1)
                );
                if (
                  $caml_notequal(
                    V(
                      0,
                      $caml_call1($CamlinternalFormatBasics[2], $sub_fmtty__1)
                    ),
                    $lP
                  )
                ) {
                  throw $runtime["caml_wrap_thrown_exception"]($Type_mismatch);
                }
                $match__14 = $type_format_gen->contents(
                  $fmt_rest__13,
                  $caml_call1($CamlinternalFormatBasics[2], $fmtty_rest__10)
                );
                $fmtty__13 = $match__14[2];
                $fmt__14 = $match__14[1];
                return V(
                  0,
                  V(14, $pad_opt__0, $sub_fmtty1, $fmt__14),
                  $fmtty__13
                );
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
                return V(0, V(15, $fmt__15), $fmtty__14);
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
                return V(0, V(16, $fmt__16), $fmtty__15);
              }
              break;
            // FALLTHROUGH
            case 17:
              $fmt_rest__16 = $fmt[2];
              $formatting_lit = $fmt[1];
              $match__17 = $type_format_gen->contents($fmt_rest__16, $match);
              $fmtty__16 = $match__17[2];
              $fmt__17 = $match__17[1];
              return V(0, V(17, $formatting_lit, $fmt__17), $fmtty__16);
            // FALLTHROUGH
            case 18:
              $fmt_rest__17 = $fmt[2];
              $formatting_gen = $fmt[1];
              return $type_formatting_gen(
                $formatting_gen,
                $fmt_rest__17,
                $match
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
                return V(0, V(19, $fmt__18), $fmtty__17);
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
                return V(0, V(20, $width_opt, $char_set, $fmt__19), $fmtty__18
                );
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
                return V(0, V(21, $counter, $fmt__20), $fmtty__19);
              }
              break;
            // FALLTHROUGH
            case 23:
              $rest = $fmt[2];
              $ign = $fmt[1];
              return $type_ignored_param($ign, $rest, $match);
            }
        }
        throw $runtime["caml_wrap_thrown_exception"]($Type_mismatch);
      };
    $_ = $type_ignored_format_substitution->contents =
      function($sub_fmtty, $fmt, $match) use ($CamlinternalFormatBasics,$Type_mismatch,$caml_call1,$caml_notequal,$fmtty_rel_det,$is_int,$runtime,$symm,$trans,$type_format_gen,$type_ignored_format_substitution) {
        if ($is_int($sub_fmtty)) {
          return V(0, 0, $type_format_gen->contents($fmt, $match));
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
                return V(0, V(0, $sub_fmtty_rest__0), $fmt__0);
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
                return V(0, V(1, $sub_fmtty_rest__2), $fmt__1);
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
                return V(0, V(2, $sub_fmtty_rest__4), $fmt__2);
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
                return V(0, V(3, $sub_fmtty_rest__6), $fmt__3);
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
                return V(0, V(4, $sub_fmtty_rest__8), $fmt__4);
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
                return V(0, V(5, $sub_fmtty_rest__10), $fmt__5);
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
                return V(0, V(6, $sub_fmtty_rest__12), $fmt__6);
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
                return V(0, V(7, $sub_fmtty_rest__14), $fmt__7);
              }
              break;
            // FALLTHROUGH
            case 8:
              if (! $is_int($match) && 8 === $match[0]) {
                $fmtty_rest__7 = $match[2];
                $sub2_fmtty = $match[1];
                $sub_fmtty_rest__15 = $sub_fmtty[2];
                $sub2_fmtty__0 = $sub_fmtty[1];
                if ($caml_notequal(V(0, $sub2_fmtty__0), V(0, $sub2_fmtty))) {
                  throw $runtime["caml_wrap_thrown_exception"]($Type_mismatch);
                }
                $match__8 = $type_ignored_format_substitution->contents(
                  $sub_fmtty_rest__15,
                  $fmt,
                  $fmtty_rest__7
                );
                $fmt__8 = $match__8[2];
                $sub_fmtty_rest__16 = $match__8[1];
                return V(0, V(8, $sub2_fmtty, $sub_fmtty_rest__16), $fmt__8);
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
                $lk = V(
                  0,
                  $caml_call1($CamlinternalFormatBasics[2], $sub1_fmtty)
                );
                if (
                  $caml_notequal(
                    V(
                      0,
                      $caml_call1($CamlinternalFormatBasics[2], $sub1_fmtty__0)
                    ),
                    $lk
                  )
                ) {
                  throw $runtime["caml_wrap_thrown_exception"]($Type_mismatch);
                }
                $ll = V(
                  0,
                  $caml_call1($CamlinternalFormatBasics[2], $sub2_fmtty__1)
                );
                if (
                  $caml_notequal(
                    V(
                      0,
                      $caml_call1($CamlinternalFormatBasics[2], $sub2_fmtty__2)
                    ),
                    $ll
                  )
                ) {
                  throw $runtime["caml_wrap_thrown_exception"]($Type_mismatch);
                }
                $sub_fmtty__0 = $trans->contents(
                  $symm->contents($sub1_fmtty),
                  $sub2_fmtty__1
                );
                $match__9 = $fmtty_rel_det->contents($sub_fmtty__0);
                $f4 = $match__9[4];
                $f2 = $match__9[2];
                $caml_call1($f2, 0);
                $caml_call1($f4, 0);
                $match__10 = $type_ignored_format_substitution->contents(
                  $caml_call1(
                    $CamlinternalFormatBasics[2],
                    $sub_fmtty_rest__17
                  ),
                  $fmt,
                  $fmtty_rest__8
                );
                $fmt__9 = $match__10[2];
                $sub_fmtty_rest__18 = $match__10[1];
                return V(
                  0,
                  V(
                    9,
                    $sub1_fmtty,
                    $sub2_fmtty__1,
                    $symm->contents($sub_fmtty_rest__18)
                  ),
                  $fmt__9
                );
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
                return V(0, V(10, $sub_fmtty_rest__20), $fmt__10);
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
                return V(0, V(11, $sub_fmtty_rest__22), $fmt__11);
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
                return V(0, V(13, $sub_fmtty_rest__24), $fmt__12);
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
                return V(0, V(14, $sub_fmtty_rest__26), $fmt__13);
              }
              break;
            }
        }
        throw $runtime["caml_wrap_thrown_exception"]($Type_mismatch);
      };
    $recast = function($fmt, $fmtty) use ($CamlinternalFormatBasics,$caml_call1,$symm,$type_format) {
      $lj = $symm->contents($fmtty);
      return $type_format($fmt, $caml_call1($CamlinternalFormatBasics[2], $lj)
      );
    };
    $fix_padding = function($padty, $width, $str) use ($Bytes,$Pervasives,$String,$caml_bytes_set,$caml_call1,$caml_call2,$caml_call5,$caml_ml_string_length,$caml_string_get) {
      $len = $caml_ml_string_length($str);
      $padty__0 = 0 <= $width ? $padty : (0);
      $width__0 = $caml_call1($Pervasives[6], $width);
      if ($width__0 <= $len) {return $str;}
      $li = 2 === $padty__0 ? 48 : (32);
      $res = $caml_call2($Bytes[1], $width__0, $li);
      switch($padty__0) {
        // FALLTHROUGH
        case 0:
          $caml_call5($String[6], $str, 0, $res, 0, $len);
          break;
        // FALLTHROUGH
        case 1:
          $caml_call5($String[6], $str, 0, $res, $width__0 - $len | 0, $len);
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
              $caml_call5(
                $String[6],
                $str,
                1,
                $res,
                ($width__0 - $len | 0) + 1 |
                  0,
                $len + -1 |
                  0
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
                  $caml_call5(
                    $String[6],
                    $str,
                    2,
                    $res,
                    ($width__0 - $len | 0) + 2 |
                      0,
                    $len + -2 |
                      0
                  );
                  $switch__2 = 1;
                }
              }
              else {$switch__2 = 0;}
            }
            else {$switch__2 = 0;}
            if (! $switch__2) {
              $caml_call5(
                $String[6],
                $str,
                0,
                $res,
                $width__0 - $len | 0,
                $len
              );
            }
          }
        }
      return $caml_call1($Bytes[42], $res);
    };
    $fix_int_precision = function($prec, $str) use ($Bytes,$Pervasives,$String,$caml_bytes_set,$caml_call1,$caml_call2,$caml_call5,$caml_ml_string_length,$caml_string_get,$unsigned_right_shift_32) {
      $prec__0 = $caml_call1($Pervasives[6], $prec);
      $len = $caml_ml_string_length($str);
      $c = $caml_string_get($str, 0);
      if (58 <= $c) {
        $switch__0 = 71 <= $c
          ? 5 < $unsigned_right_shift_32($c + -97 | 0, 0) ? 1 : (0)
          : (65 <= $c ? 0 : (1));
      }
      else {
        if (32 === $c) {
          $switch__1 = 1;
        }
        else {
          if (43 <= $c) {
            $switcher = $c + -43 | 0;
            switch($switcher) {
              // FALLTHROUGH
              case 5:
                if ($len < ($prec__0 + 2 | 0)) {
                  if (1 < $len) {
                    $switch__2 = 120 === $caml_string_get($str, 1)
                      ? 0
                      : (88 === $caml_string_get($str, 1) ? 0 : (1));
                    if (! $switch__2) {
                      $res__1 = $caml_call2($Bytes[1], $prec__0 + 2 | 0, 48);
                      $caml_bytes_set($res__1, 1, $caml_string_get($str, 1));
                      $caml_call5(
                        $String[6],
                        $str,
                        2,
                        $res__1,
                        ($prec__0 - $len | 0) + 4 |
                          0,
                        $len + -2 |
                          0
                      );
                      return $caml_call1($Bytes[42], $res__1);
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
          if ($len < ($prec__0 + 1 | 0)) {
            $res__0 = $caml_call2($Bytes[1], $prec__0 + 1 | 0, 48);
            $caml_bytes_set($res__0, 0, $c);
            $caml_call5(
              $String[6],
              $str,
              1,
              $res__0,
              ($prec__0 - $len | 0) + 2 |
                0,
              $len + -1 |
                0
            );
            return $caml_call1($Bytes[42], $res__0);
          }
          $switch__0 = 1;
        }
      }
      if (! $switch__0) {
        if ($len < $prec__0) {
          $res = $caml_call2($Bytes[1], $prec__0, 48);
          $caml_call5($String[6], $str, 0, $res, $prec__0 - $len | 0, $len);
          return $caml_call1($Bytes[42], $res);
        }
      }
      return $str;
    };
    $string_to_caml_string = function($str) use ($Bytes,$String,$caml_blit_string,$caml_call1,$caml_call2,$caml_ml_string_length) {
      $str__0 = $caml_call1($String[13], $str);
      $l = $caml_ml_string_length($str__0);
      $res = $caml_call2($Bytes[1], $l + 2 | 0, 34);
      $caml_blit_string($str__0, 0, $res, 1, $l);
      return $caml_call1($Bytes[42], $res);
    };
    $format_of_iconv = function($param) use ($cst_X,$cst_X__0,$cst_d,$cst_d__0,$cst_d__1,$cst_i__0,$cst_i__1,$cst_i__2,$cst_o,$cst_o__0,$cst_u,$cst_x,$cst_x__0) {
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
    $format_of_iconvL = function($param) use ($cst_LX,$cst_LX__0,$cst_Ld,$cst_Ld__0,$cst_Ld__1,$cst_Li__0,$cst_Li__1,$cst_Li__2,$cst_Lo,$cst_Lo__0,$cst_Lu,$cst_Lx,$cst_Lx__0) {
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
    $format_of_iconvl = function($param) use ($cst_lX,$cst_lX__0,$cst_ld,$cst_ld__0,$cst_ld__1,$cst_li__0,$cst_li__1,$cst_li__2,$cst_lo,$cst_lo__0,$cst_lu,$cst_lx,$cst_lx__0) {
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
    $format_of_iconvn = function($param) use ($cst_nX,$cst_nX__0,$cst_nd,$cst_nd__0,$cst_nd__1,$cst_ni__0,$cst_ni__1,$cst_ni__2,$cst_no,$cst_no__0,$cst_nu,$cst_nx,$cst_nx__0) {
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
    $format_of_fconv = function($fconv, $prec) use ($Pervasives,$bprint_fconv_flag,$buffer_add_char,$buffer_add_string,$buffer_contents,$buffer_create,$caml_call1,$char_of_fconv,$cst_12g) {
      if (15 === $fconv) {return $cst_12g;}
      $prec__0 = $caml_call1($Pervasives[6], $prec);
      $symb = $char_of_fconv($fconv);
      $buf = $buffer_create(16);
      $buffer_add_char($buf, 37);
      $bprint_fconv_flag($buf, $fconv);
      $buffer_add_char($buf, 46);
      $buffer_add_string($buf, $caml_call1($Pervasives[21], $prec__0));
      $buffer_add_char($buf, $symb);
      return $buffer_contents($buf);
    };
    $convert_int = function($iconv, $n) use ($caml_format_int,$format_of_iconv) {
      return $caml_format_int($format_of_iconv($iconv), $n);
    };
    $convert_int32 = function($iconv, $n) use ($caml_format_int,$format_of_iconvl) {
      return $caml_format_int($format_of_iconvl($iconv), $n);
    };
    $convert_nativeint = function($iconv, $n) use ($caml_format_int,$format_of_iconvn) {
      return $caml_format_int($format_of_iconvn($iconv), $n);
    };
    $convert_int64 = function($iconv, $n) use ($format_of_iconvL,$runtime) {
      return $runtime["caml_int64_format"]($format_of_iconvL($iconv), $n);
    };
    $convert_float = function($fconv, $prec, $x) use ($Pervasives,$String,$caml_call1,$caml_call2,$caml_ml_string_length,$caml_string_get,$cst__16,$cst_infinity,$cst_nan,$cst_neg_infinity,$format_of_fconv,$runtime,$unsigned_right_shift_32) {
      if (16 <= $fconv) {
        if (17 <= $fconv) {
          switch($fconv + -17 | 0) {
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
        return 19 <= $fconv ? $caml_call1($String[29], $str) : ($str);
      }
      $str__0 = $runtime["caml_format_float"](
        $format_of_fconv($fconv, $prec),
        $x
      );
      if (15 === $fconv) {
        $len = $caml_ml_string_length($str__0);
        $is_valid = function($i) use ($caml_string_get,$len,$str__0,$unsigned_right_shift_32) {
          $i__0 = $i;
          for (;;) {
            if ($i__0 === $len) {return 0;}
            $match = $caml_string_get($str__0, $i__0);
            $lh = $match + -46 | 0;
            $switch__0 = 23 < $unsigned_right_shift_32($lh, 0)
              ? 55 === $lh ? 1 : (0)
              : (21 < $unsigned_right_shift_32($lh + -1 | 0, 0) ? 1 : (0));
            if ($switch__0) {return 1;}
            $i__1 = $i__0 + 1 | 0;
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
            : ($caml_call2($Pervasives[16], $str__0, $cst__16))));
      }
      return $str__0;
    };
    $format_caml_char = function($c) use ($Bytes,$Char,$caml_blit_string,$caml_call1,$caml_call2,$caml_ml_string_length) {
      $str = $caml_call1($Char[2], $c);
      $l = $caml_ml_string_length($str);
      $res = $caml_call2($Bytes[1], $l + 2 | 0, 39);
      $caml_blit_string($str, 0, $res, 1, $l);
      return $caml_call1($Bytes[42], $res);
    };
    $string_of_fmtty = function($fmtty) use ($bprint_fmtty,$buffer_contents,$buffer_create) {
      $buf = $buffer_create(16);
      $bprint_fmtty->contents($buf, $fmtty);
      return $buffer_contents($buf);
    };
    $make_float_padding_precision = function
    ($k, $o, $acc, $fmt, $pad, $match, $fconv) use ($convert_float,$default_float_precision,$fix_padding,$is_int,$make_printf) {
      if ($is_int($pad)) {
        if ($is_int($match)) {
          return 0 === $match
            ? function($x) use ($acc,$convert_float,$default_float_precision,$fconv,$fmt,$k,$make_printf,$o) {
             $str = $convert_float($fconv, $default_float_precision, $x);
             return $make_printf->contents($k, $o, V(4, $acc, $str), $fmt);
           }
            : (function($p, $x) use ($acc,$convert_float,$fconv,$fmt,$k,$make_printf,$o) {
             $str = $convert_float($fconv, $p, $x);
             return $make_printf->contents($k, $o, V(4, $acc, $str), $fmt);
           });
        }
        $p = $match[1];
        return function($x) use ($acc,$convert_float,$fconv,$fmt,$k,$make_printf,$o,$p) {
          $str = $convert_float($fconv, $p, $x);
          return $make_printf->contents($k, $o, V(4, $acc, $str), $fmt);
        };
      }
      else {
        if (0 === $pad[0]) {
          $le = $pad[2];
          $lf = $pad[1];
          if ($is_int($match)) {
            return 0 === $match
              ? function($x) use ($acc,$convert_float,$default_float_precision,$fconv,$fix_padding,$fmt,$k,$le,$lf,$make_printf,$o) {
               $str = $convert_float($fconv, $default_float_precision, $x);
               $str__0 = $fix_padding($lf, $le, $str);
               return $make_printf->contents($k, $o, V(4, $acc, $str__0), $fmt
               );
             }
              : (function($p, $x) use ($acc,$convert_float,$fconv,$fix_padding,$fmt,$k,$le,$lf,$make_printf,$o) {
               $str = $fix_padding($lf, $le, $convert_float($fconv, $p, $x));
               return $make_printf->contents($k, $o, V(4, $acc, $str), $fmt);
             });
          }
          $p__0 = $match[1];
          return function($x) use ($acc,$convert_float,$fconv,$fix_padding,$fmt,$k,$le,$lf,$make_printf,$o,$p__0) {
            $str = $fix_padding($lf, $le, $convert_float($fconv, $p__0, $x));
            return $make_printf->contents($k, $o, V(4, $acc, $str), $fmt);
          };
        }
        $lg = $pad[1];
        if ($is_int($match)) {
          return 0 === $match
            ? function($w, $x) use ($acc,$convert_float,$default_float_precision,$fconv,$fix_padding,$fmt,$k,$lg,$make_printf,$o) {
             $str = $convert_float($fconv, $default_float_precision, $x);
             $str__0 = $fix_padding($lg, $w, $str);
             return $make_printf->contents($k, $o, V(4, $acc, $str__0), $fmt);
           }
            : (function($w, $p, $x) use ($acc,$convert_float,$fconv,$fix_padding,$fmt,$k,$lg,$make_printf,$o) {
             $str = $fix_padding($lg, $w, $convert_float($fconv, $p, $x));
             return $make_printf->contents($k, $o, V(4, $acc, $str), $fmt);
           });
        }
        $p__1 = $match[1];
        return function($w, $x) use ($acc,$convert_float,$fconv,$fix_padding,$fmt,$k,$lg,$make_printf,$o,$p__1) {
          $str = $fix_padding($lg, $w, $convert_float($fconv, $p__1, $x));
          return $make_printf->contents($k, $o, V(4, $acc, $str), $fmt);
        };
      }
    };
    $make_int_padding_precision = function
    ($k, $o, $acc, $fmt, $pad, $match, $trans, $iconv) use ($caml_call2,$fix_int_precision,$fix_padding,$is_int,$make_printf) {
      if ($is_int($pad)) {
        if ($is_int($match)) {
          return 0 === $match
            ? function($x) use ($acc,$caml_call2,$fmt,$iconv,$k,$make_printf,$o,$trans) {
             $str = $caml_call2($trans, $iconv, $x);
             return $make_printf->contents($k, $o, V(4, $acc, $str), $fmt);
           }
            : (function($p, $x) use ($acc,$caml_call2,$fix_int_precision,$fmt,$iconv,$k,$make_printf,$o,$trans) {
             $str = $fix_int_precision($p, $caml_call2($trans, $iconv, $x));
             return $make_printf->contents($k, $o, V(4, $acc, $str), $fmt);
           });
        }
        $p = $match[1];
        return function($x) use ($acc,$caml_call2,$fix_int_precision,$fmt,$iconv,$k,$make_printf,$o,$p,$trans) {
          $str = $fix_int_precision($p, $caml_call2($trans, $iconv, $x));
          return $make_printf->contents($k, $o, V(4, $acc, $str), $fmt);
        };
      }
      else {
        if (0 === $pad[0]) {
          $lb = $pad[2];
          $lc = $pad[1];
          if ($is_int($match)) {
            return 0 === $match
              ? function($x) use ($acc,$caml_call2,$fix_padding,$fmt,$iconv,$k,$lb,$lc,$make_printf,$o,$trans) {
               $str = $fix_padding($lc, $lb, $caml_call2($trans, $iconv, $x));
               return $make_printf->contents($k, $o, V(4, $acc, $str), $fmt);
             }
              : (function($p, $x) use ($acc,$caml_call2,$fix_int_precision,$fix_padding,$fmt,$iconv,$k,$lb,$lc,$make_printf,$o,$trans) {
               $str = $fix_padding(
                 $lc,
                 $lb,
                 $fix_int_precision($p, $caml_call2($trans, $iconv, $x))
               );
               return $make_printf->contents($k, $o, V(4, $acc, $str), $fmt);
             });
          }
          $p__0 = $match[1];
          return function($x) use ($acc,$caml_call2,$fix_int_precision,$fix_padding,$fmt,$iconv,$k,$lb,$lc,$make_printf,$o,$p__0,$trans) {
            $str = $fix_padding(
              $lc,
              $lb,
              $fix_int_precision($p__0, $caml_call2($trans, $iconv, $x))
            );
            return $make_printf->contents($k, $o, V(4, $acc, $str), $fmt);
          };
        }
        $ld = $pad[1];
        if ($is_int($match)) {
          return 0 === $match
            ? function($w, $x) use ($acc,$caml_call2,$fix_padding,$fmt,$iconv,$k,$ld,$make_printf,$o,$trans) {
             $str = $fix_padding($ld, $w, $caml_call2($trans, $iconv, $x));
             return $make_printf->contents($k, $o, V(4, $acc, $str), $fmt);
           }
            : (function($w, $p, $x) use ($acc,$caml_call2,$fix_int_precision,$fix_padding,$fmt,$iconv,$k,$ld,$make_printf,$o,$trans) {
             $str = $fix_padding(
               $ld,
               $w,
               $fix_int_precision($p, $caml_call2($trans, $iconv, $x))
             );
             return $make_printf->contents($k, $o, V(4, $acc, $str), $fmt);
           });
        }
        $p__1 = $match[1];
        return function($w, $x) use ($acc,$caml_call2,$fix_int_precision,$fix_padding,$fmt,$iconv,$k,$ld,$make_printf,$o,$p__1,$trans) {
          $str = $fix_padding(
            $ld,
            $w,
            $fix_int_precision($p__1, $caml_call2($trans, $iconv, $x))
          );
          return $make_printf->contents($k, $o, V(4, $acc, $str), $fmt);
        };
      }
    };
    $make_padding = function($k, $o, $acc, $fmt, $pad, $trans) use ($caml_call1,$fix_padding,$is_int,$make_printf) {
      if ($is_int($pad)) {
        return function($x) use ($acc,$caml_call1,$fmt,$k,$make_printf,$o,$trans) {
          $new_acc = V(4, $acc, $caml_call1($trans, $x));
          return $make_printf->contents($k, $o, $new_acc, $fmt);
        };
      }
      else {
        if (0 === $pad[0]) {
          $width = $pad[2];
          $padty = $pad[1];
          return function($x) use ($acc,$caml_call1,$fix_padding,$fmt,$k,$make_printf,$o,$padty,$trans,$width) {
            $new_acc = V(
              4,
              $acc,
              $fix_padding($padty, $width, $caml_call1($trans, $x))
            );
            return $make_printf->contents($k, $o, $new_acc, $fmt);
          };
        }
        $padty__0 = $pad[1];
        return function($w, $x) use ($acc,$caml_call1,$fix_padding,$fmt,$k,$make_printf,$o,$padty__0,$trans) {
          $new_acc = V(
            4,
            $acc,
            $fix_padding($padty__0, $w, $caml_call1($trans, $x))
          );
          return $make_printf->contents($k, $o, $new_acc, $fmt);
        };
      }
    };
    $make_printf__0 = function($counter, $k, $o, $acc, $fmt) use ($Assert_failure,$CamlinternalFormatBasics,$Pervasives,$caml_call1,$caml_call2,$caml_format_int,$caml_trampoline_return,$convert_int,$convert_int32,$convert_int64,$convert_nativeint,$cst_Printf_bad_conversion,$cst_u__0,$format_caml_char,$hO,$is_int,$make_custom__0,$make_float_padding_precision,$make_ignored_param__0,$make_int_padding_precision,$make_padding,$make_printf,$recast,$runtime,$string_of_fmtty,$string_to_caml_string) {
      $k__0 = $k;
      $acc__0 = $acc;
      $fmt__0 = $fmt;
      for (;;) if (
        $is_int($fmt__0)
      ) {return $caml_call2($k__0, $o, $acc__0);}
      else {
        switch($fmt__0[0]) {
          // FALLTHROUGH
          case 0:
            $rest = $fmt__0[1];
            return function($c) use ($acc__0,$k__0,$make_printf,$o,$rest) {
              $new_acc = V(5, $acc__0, $c);
              return $make_printf->contents($k__0, $o, $new_acc, $rest);
            };
          // FALLTHROUGH
          case 1:
            $rest__0 = $fmt__0[1];
            return function($c) use ($acc__0,$format_caml_char,$k__0,$make_printf,$o,$rest__0) {
              $new_acc = V(4, $acc__0, $format_caml_char($c));
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
              function($str) {return $str;}
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
            $acc__1 = V(7, $acc__0);
            $acc__0 = $acc__1;
            $fmt__0 = $fmt__1;
            continue;
          // FALLTHROUGH
          case 11:
            $fmt__2 = $fmt__0[2];
            $str = $fmt__0[1];
            $acc__2 = V(2, $acc__0, $str);
            $acc__0 = $acc__2;
            $fmt__0 = $fmt__2;
            continue;
          // FALLTHROUGH
          case 12:
            $fmt__3 = $fmt__0[2];
            $chr = $fmt__0[1];
            $acc__3 = V(3, $acc__0, $chr);
            $acc__0 = $acc__3;
            $fmt__0 = $fmt__3;
            continue;
          // FALLTHROUGH
          case 13:
            $rest__9 = $fmt__0[3];
            $sub_fmtty = $fmt__0[2];
            $ty = $string_of_fmtty($sub_fmtty);
            return function($str) use ($acc__0,$k__0,$make_printf,$o,$rest__9,$ty) {
              return $make_printf->contents(
                $k__0,
                $o,
                V(4, $acc__0, $ty),
                $rest__9
              );
            };
          // FALLTHROUGH
          case 14:
            $rest__10 = $fmt__0[3];
            $fmtty = $fmt__0[2];
            return function($param) use ($CamlinternalFormatBasics,$acc__0,$caml_call2,$fmtty,$k__0,$make_printf,$o,$recast,$rest__10) {
              $fmt = $param[1];
              $la = $recast($fmt, $fmtty);
              return $make_printf->contents(
                $k__0,
                $o,
                $acc__0,
                $caml_call2($CamlinternalFormatBasics[3], $la, $rest__10)
              );
            };
          // FALLTHROUGH
          case 15:
            $rest__11 = $fmt__0[1];
            return function($f, $x) use ($acc__0,$caml_call2,$k__0,$make_printf,$o,$rest__11) {
              return $make_printf->contents(
                $k__0,
                $o,
                V(
                  6,
                  $acc__0,
                  function($o) use ($caml_call2,$f,$x) {
                    return $caml_call2($f, $o, $x);
                  }
                ),
                $rest__11
              );
            };
          // FALLTHROUGH
          case 16:
            $rest__12 = $fmt__0[1];
            return function($f) use ($acc__0,$k__0,$make_printf,$o,$rest__12) {
              return $make_printf->contents(
                $k__0,
                $o,
                V(6, $acc__0, $f),
                $rest__12
              );
            };
          // FALLTHROUGH
          case 17:
            $fmt__4 = $fmt__0[2];
            $fmting_lit = $fmt__0[1];
            $acc__4 = V(0, $acc__0, $fmting_lit);
            $acc__0 = $acc__4;
            $fmt__0 = $fmt__4;
            continue;
          // FALLTHROUGH
          case 18:
            $k9 = $fmt__0[1];
            if (0 === $k9[0]) {
              $rest__13 = $fmt__0[2];
              $match = $k9[1];
              $fmt__5 = $match[1];
              $k__3 = function($acc, $k, $rest) use ($make_printf) {
                $k__0 = function($koc, $kacc) use ($acc,$k,$make_printf,$rest) {
                  return $make_printf->contents(
                    $k,
                    $koc,
                    V(1, $acc, V(0, $kacc)),
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
            $match__0 = $k9[1];
            $fmt__6 = $match__0[1];
            $k__4 = function($acc, $k, $rest) use ($make_printf) {
              $k__0 = function($koc, $kacc) use ($acc,$k,$make_printf,$rest) {
                return $make_printf->contents(
                  $k,
                  $koc,
                  V(1, $acc, V(1, $kacc)),
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
            throw $runtime["caml_wrap_thrown_exception"](V(0, $Assert_failure, $hO));
          // FALLTHROUGH
          case 20:
            $rest__15 = $fmt__0[3];
            $new_acc = V(8, $acc__0, $cst_Printf_bad_conversion);
            return function($param) use ($k__0,$make_printf,$new_acc,$o,$rest__15) {
              return $make_printf->contents($k__0, $o, $new_acc, $rest__15);
            };
          // FALLTHROUGH
          case 21:
            $rest__16 = $fmt__0[2];
            return function($n) use ($acc__0,$caml_format_int,$cst_u__0,$k__0,$make_printf,$o,$rest__16) {
              $new_acc = V(4, $acc__0, $caml_format_int($cst_u__0, $n));
              return $make_printf->contents($k__0, $o, $new_acc, $rest__16);
            };
          // FALLTHROUGH
          case 22:
            $rest__17 = $fmt__0[1];
            return function($c) use ($acc__0,$k__0,$make_printf,$o,$rest__17) {
              $new_acc = V(5, $acc__0, $c);
              return $make_printf->contents($k__0, $o, $new_acc, $rest__17);
            };
          // FALLTHROUGH
          case 23:
            $rest__18 = $fmt__0[2];
            $ign = $fmt__0[1];
            if ($counter < 50) {
              $counter__1 = $counter + 1 | 0;
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
            $k_ = $caml_call1($f, 0);
            if ($counter < 50) {
              $counter__0 = $counter + 1 | 0;
              return $make_custom__0->contents(
                $counter__0,
                $k__0,
                $o,
                $acc__0,
                $rest__19,
                $arity,
                $k_
              );
            }
            return $caml_trampoline_return(
              $make_custom__0->contents,
              varray[0,$k__0,$o,$acc__0,$rest__19,$arity,$k_]
            );
          }
      }
    };
    $_ = $make_ignored_param__0->contents =
      function($counter, $k, $o, $acc, $ign, $fmt) use ($Assert_failure,$caml_trampoline_return,$hP,$is_int,$make_from_fmtty__0,$make_invalid_arg,$runtime) {
        if ($is_int($ign)) {
          switch($ign) {
            // FALLTHROUGH
            case 0:
              if ($counter < 50) {
                $counter__0 = $counter + 1 | 0;
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
                $counter__1 = $counter + 1 | 0;
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
              throw $runtime["caml_wrap_thrown_exception"](V(0, $Assert_failure, $hP));
            // FALLTHROUGH
            default:
              if ($counter < 50) {
                $counter__2 = $counter + 1 | 0;
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
                $counter__3 = $counter + 1 | 0;
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
                $counter__4 = $counter + 1 | 0;
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
                $counter__5 = $counter + 1 | 0;
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
                $counter__6 = $counter + 1 | 0;
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
                $counter__7 = $counter + 1 | 0;
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
                $counter__8 = $counter + 1 | 0;
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
                $counter__9 = $counter + 1 | 0;
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
                $counter__10 = $counter + 1 | 0;
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
                $counter__11 = $counter + 1 | 0;
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
                $counter__14 = $counter + 1 | 0;
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
                $counter__12 = $counter + 1 | 0;
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
                $counter__13 = $counter + 1 | 0;
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
    $_ = $make_from_fmtty__0->contents =
      function($counter, $k, $o, $acc, $fmtty, $fmt) use ($Assert_failure,$CamlinternalFormatBasics,$caml_call2,$caml_trampoline_return,$hQ,$hR,$is_int,$make_from_fmtty,$make_invalid_arg,$runtime,$symm,$trans) {
        if ($is_int($fmtty)) {
          if ($counter < 50) {
            $counter__0 = $counter + 1 | 0;
            return $make_invalid_arg->contents($counter__0, $k, $o, $acc, $fmt
            );
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
              return function($param) use ($acc,$fmt,$k,$make_from_fmtty,$o,$rest) {
                return $make_from_fmtty->contents($k, $o, $acc, $rest, $fmt);
              };
            // FALLTHROUGH
            case 1:
              $rest__0 = $fmtty[1];
              return function($param) use ($acc,$fmt,$k,$make_from_fmtty,$o,$rest__0) {
                return $make_from_fmtty->contents($k, $o, $acc, $rest__0, $fmt
                );
              };
            // FALLTHROUGH
            case 2:
              $rest__1 = $fmtty[1];
              return function($param) use ($acc,$fmt,$k,$make_from_fmtty,$o,$rest__1) {
                return $make_from_fmtty->contents($k, $o, $acc, $rest__1, $fmt
                );
              };
            // FALLTHROUGH
            case 3:
              $rest__2 = $fmtty[1];
              return function($param) use ($acc,$fmt,$k,$make_from_fmtty,$o,$rest__2) {
                return $make_from_fmtty->contents($k, $o, $acc, $rest__2, $fmt
                );
              };
            // FALLTHROUGH
            case 4:
              $rest__3 = $fmtty[1];
              return function($param) use ($acc,$fmt,$k,$make_from_fmtty,$o,$rest__3) {
                return $make_from_fmtty->contents($k, $o, $acc, $rest__3, $fmt
                );
              };
            // FALLTHROUGH
            case 5:
              $rest__4 = $fmtty[1];
              return function($param) use ($acc,$fmt,$k,$make_from_fmtty,$o,$rest__4) {
                return $make_from_fmtty->contents($k, $o, $acc, $rest__4, $fmt
                );
              };
            // FALLTHROUGH
            case 6:
              $rest__5 = $fmtty[1];
              return function($param) use ($acc,$fmt,$k,$make_from_fmtty,$o,$rest__5) {
                return $make_from_fmtty->contents($k, $o, $acc, $rest__5, $fmt
                );
              };
            // FALLTHROUGH
            case 7:
              $rest__6 = $fmtty[1];
              return function($param) use ($acc,$fmt,$k,$make_from_fmtty,$o,$rest__6) {
                return $make_from_fmtty->contents($k, $o, $acc, $rest__6, $fmt
                );
              };
            // FALLTHROUGH
            case 8:
              $rest__7 = $fmtty[2];
              return function($param) use ($acc,$fmt,$k,$make_from_fmtty,$o,$rest__7) {
                return $make_from_fmtty->contents($k, $o, $acc, $rest__7, $fmt
                );
              };
            // FALLTHROUGH
            case 9:
              $rest__8 = $fmtty[3];
              $ty2 = $fmtty[2];
              $ty1 = $fmtty[1];
              $ty = $trans->contents($symm->contents($ty1), $ty2);
              return function($param) use ($CamlinternalFormatBasics,$acc,$caml_call2,$fmt,$k,$make_from_fmtty,$o,$rest__8,$ty) {
                return $make_from_fmtty->contents(
                  $k,
                  $o,
                  $acc,
                  $caml_call2($CamlinternalFormatBasics[1], $ty, $rest__8),
                  $fmt
                );
              };
            // FALLTHROUGH
            case 10:
              $rest__9 = $fmtty[1];
              return function($param, $k8) use ($acc,$fmt,$k,$make_from_fmtty,$o,$rest__9) {
                return $make_from_fmtty->contents($k, $o, $acc, $rest__9, $fmt
                );
              };
            // FALLTHROUGH
            case 11:
              $rest__10 = $fmtty[1];
              return function($param) use ($acc,$fmt,$k,$make_from_fmtty,$o,$rest__10) {
                return $make_from_fmtty->contents(
                  $k,
                  $o,
                  $acc,
                  $rest__10,
                  $fmt
                );
              };
            // FALLTHROUGH
            case 12:
              $rest__11 = $fmtty[1];
              return function($param) use ($acc,$fmt,$k,$make_from_fmtty,$o,$rest__11) {
                return $make_from_fmtty->contents(
                  $k,
                  $o,
                  $acc,
                  $rest__11,
                  $fmt
                );
              };
            // FALLTHROUGH
            case 13:
              throw $runtime["caml_wrap_thrown_exception"](V(0, $Assert_failure, $hQ));
            // FALLTHROUGH
            default:
              throw $runtime["caml_wrap_thrown_exception"](V(0, $Assert_failure, $hR));
            }
        }
      };
    $_ = $make_invalid_arg->contents =
      function($counter, $k, $o, $acc, $fmt) use ($caml_trampoline_return,$cst_Printf_bad_conversion__0,$make_printf__0) {
        $k7 = V(8, $acc, $cst_Printf_bad_conversion__0);
        if ($counter < 50) {
          $counter__0 = $counter + 1 | 0;
          return $make_printf__0($counter__0, $k, $o, $k7, $fmt);
        }
        return $caml_trampoline_return(
          $make_printf__0,
          varray[0,$k,$o,$k7,$fmt]
        );
      };
    $_ = $make_custom__0->contents =
      function($counter, $k, $o, $acc, $rest, $arity, $f) use ($caml_call1,$caml_trampoline_return,$make_custom,$make_printf__0) {
        if ($arity) {
          $arity__0 = $arity[1];
          return function($x) use ($acc,$arity__0,$caml_call1,$f,$k,$make_custom,$o,$rest) {
            return $make_custom->contents(
              $k,
              $o,
              $acc,
              $rest,
              $arity__0,
              $caml_call1($f, $x)
            );
          };
        }
        $k6 = V(4, $acc, $f);
        if ($counter < 50) {
          $counter__0 = $counter + 1 | 0;
          return $make_printf__0($counter__0, $k, $o, $k6, $rest);
        }
        return $caml_trampoline_return(
          $make_printf__0,
          varray[0,$k,$o,$k6,$rest]
        );
      };
    $_ = $make_printf->contents =
      function($k, $o, $acc, $fmt) use ($caml_trampoline,$make_printf__0) {
        return $caml_trampoline($make_printf__0(0, $k, $o, $acc, $fmt));
      };
    $make_ignored_param = function($k, $o, $acc, $ign, $fmt) use ($caml_trampoline,$make_ignored_param__0) {
      return $caml_trampoline(
        $make_ignored_param__0->contents(0, $k, $o, $acc, $ign, $fmt)
      );
    };
    $_ = $make_from_fmtty->contents =
      function($k, $o, $acc, $fmtty, $fmt) use ($caml_trampoline,$make_from_fmtty__0) {
        return $caml_trampoline(
          $make_from_fmtty__0->contents(0, $k, $o, $acc, $fmtty, $fmt)
        );
      };
    $_ = $make_custom->contents =
      function($k, $o, $acc, $rest, $arity, $f) use ($caml_trampoline,$make_custom__0) {
        return $caml_trampoline(
          $make_custom__0->contents(0, $k, $o, $acc, $rest, $arity, $f)
        );
      };
    $const__0 = function($x, $param) {return $x;};
    $fn_of_padding_precision = function($k, $o, $fmt, $pad, $prec) use ($const__0,$is_int,$make_iprintf) {
      if ($is_int($pad)) {
        if ($is_int($prec)) {
          if (0 === $prec) {
            $kC = $make_iprintf->contents($k, $o, $fmt);
            return function($kU) use ($const__0,$kC) {
              return $const__0($kC, $kU);
            };
          }
          $kD = $make_iprintf->contents($k, $o, $fmt);
          $kE = function($kT) use ($const__0,$kD) {
            return $const__0($kD, $kT);
          };
          return function($kS) use ($const__0,$kE) {
            return $const__0($kE, $kS);
          };
        }
        $kF = $make_iprintf->contents($k, $o, $fmt);
        return function($kR) use ($const__0,$kF) {return $const__0($kF, $kR);};
      }
      else {
        if (0 === $pad[0]) {
          if ($is_int($prec)) {
            if (0 === $prec) {
              $kG = $make_iprintf->contents($k, $o, $fmt);
              return function($k5) use ($const__0,$kG) {
                return $const__0($kG, $k5);
              };
            }
            $kH = $make_iprintf->contents($k, $o, $fmt);
            $kI = function($k4) use ($const__0,$kH) {
              return $const__0($kH, $k4);
            };
            return function($k3) use ($const__0,$kI) {
              return $const__0($kI, $k3);
            };
          }
          $kJ = $make_iprintf->contents($k, $o, $fmt);
          return function($k2) use ($const__0,$kJ) {
            return $const__0($kJ, $k2);
          };
        }
        if ($is_int($prec)) {
          if (0 === $prec) {
            $kK = $make_iprintf->contents($k, $o, $fmt);
            $kL = function($k1) use ($const__0,$kK) {
              return $const__0($kK, $k1);
            };
            return function($k0) use ($const__0,$kL) {
              return $const__0($kL, $k0);
            };
          }
          $kM = $make_iprintf->contents($k, $o, $fmt);
          $kN = function($kZ) use ($const__0,$kM) {
            return $const__0($kM, $kZ);
          };
          $kO = function($kY) use ($const__0,$kN) {
            return $const__0($kN, $kY);
          };
          return function($kX) use ($const__0,$kO) {
            return $const__0($kO, $kX);
          };
        }
        $kP = $make_iprintf->contents($k, $o, $fmt);
        $kQ = function($kW) use ($const__0,$kP) {return $const__0($kP, $kW);};
        return function($kV) use ($const__0,$kQ) {return $const__0($kQ, $kV);};
      }
    };
    $make_iprintf__0 = function($counter, $k, $o, $fmt) use ($Assert_failure,$CamlinternalFormatBasics,$caml_call1,$caml_call2,$caml_trampoline_return,$const__0,$fn_of_custom_arity__0,$fn_of_padding_precision,$hS,$is_int,$make_ignored_param,$make_iprintf,$recast,$runtime) {
      $k__0 = $k;
      $fmt__0 = $fmt;
      for (;;) if (
        $is_int($fmt__0)
      ) {return $caml_call1($k__0, $o);}
      else {
        switch($fmt__0[0]) {
          // FALLTHROUGH
          case 0:
            $rest = $fmt__0[1];
            $jR = $make_iprintf->contents($k__0, $o, $rest);
            return function($kB) use ($const__0,$jR) {
              return $const__0($jR, $kB);
            };
          // FALLTHROUGH
          case 1:
            $rest__0 = $fmt__0[1];
            $jS = $make_iprintf->contents($k__0, $o, $rest__0);
            return function($kA) use ($const__0,$jS) {
              return $const__0($jS, $kA);
            };
          // FALLTHROUGH
          case 2:
            $jT = $fmt__0[1];
            if ($is_int($jT)) {
              $rest__1 = $fmt__0[2];
              $jU = $make_iprintf->contents($k__0, $o, $rest__1);
              return function($kw) use ($const__0,$jU) {
                return $const__0($jU, $kw);
              };
            }
            else {
              if (0 === $jT[0]) {
                $rest__2 = $fmt__0[2];
                $jV = $make_iprintf->contents($k__0, $o, $rest__2);
                return function($kz) use ($const__0,$jV) {
                  return $const__0($jV, $kz);
                };
              }
              $rest__3 = $fmt__0[2];
              $jW = $make_iprintf->contents($k__0, $o, $rest__3);
              $jX = function($ky) use ($const__0,$jW) {
                return $const__0($jW, $ky);
              };
              return function($kx) use ($const__0,$jX) {
                return $const__0($jX, $kx);
              };
            }
          // FALLTHROUGH
          case 3:
            $jY = $fmt__0[1];
            if ($is_int($jY)) {
              $rest__4 = $fmt__0[2];
              $jZ = $make_iprintf->contents($k__0, $o, $rest__4);
              return function($ks) use ($const__0,$jZ) {
                return $const__0($jZ, $ks);
              };
            }
            else {
              if (0 === $jY[0]) {
                $rest__5 = $fmt__0[2];
                $j0 = $make_iprintf->contents($k__0, $o, $rest__5);
                return function($kv) use ($const__0,$j0) {
                  return $const__0($j0, $kv);
                };
              }
              $rest__6 = $fmt__0[2];
              $j1 = $make_iprintf->contents($k__0, $o, $rest__6);
              $j2 = function($ku) use ($const__0,$j1) {
                return $const__0($j1, $ku);
              };
              return function($kt) use ($const__0,$j2) {
                return $const__0($j2, $kt);
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
            $j3 = $fmt__0[1];
            if ($is_int($j3)) {
              $rest__12 = $fmt__0[2];
              $j4 = $make_iprintf->contents($k__0, $o, $rest__12);
              return function($ko) use ($const__0,$j4) {
                return $const__0($j4, $ko);
              };
            }
            else {
              if (0 === $j3[0]) {
                $rest__13 = $fmt__0[2];
                $j5 = $make_iprintf->contents($k__0, $o, $rest__13);
                return function($kr) use ($const__0,$j5) {
                  return $const__0($j5, $kr);
                };
              }
              $rest__14 = $fmt__0[2];
              $j6 = $make_iprintf->contents($k__0, $o, $rest__14);
              $j7 = function($kq) use ($const__0,$j6) {
                return $const__0($j6, $kq);
              };
              return function($kp) use ($const__0,$j7) {
                return $const__0($j7, $kp);
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
            $j8 = $make_iprintf->contents($k__0, $o, $rest__15);
            return function($kn) use ($const__0,$j8) {
              return $const__0($j8, $kn);
            };
          // FALLTHROUGH
          case 14:
            $rest__16 = $fmt__0[3];
            $fmtty = $fmt__0[2];
            return function($param) use ($CamlinternalFormatBasics,$caml_call2,$fmtty,$k__0,$make_iprintf,$o,$recast,$rest__16) {
              $fmt = $param[1];
              $km = $recast($fmt, $fmtty);
              return $make_iprintf->contents(
                $k__0,
                $o,
                $caml_call2($CamlinternalFormatBasics[3], $km, $rest__16)
              );
            };
          // FALLTHROUGH
          case 15:
            $rest__17 = $fmt__0[1];
            $j9 = $make_iprintf->contents($k__0, $o, $rest__17);
            $j_ = function($kl) use ($const__0,$j9) {
              return $const__0($j9, $kl);
            };
            return function($kk) use ($const__0,$j_) {
              return $const__0($j_, $kk);
            };
          // FALLTHROUGH
          case 16:
            $rest__18 = $fmt__0[1];
            $ka = $make_iprintf->contents($k__0, $o, $rest__18);
            return function($kj) use ($const__0,$ka) {
              return $const__0($ka, $kj);
            };
          // FALLTHROUGH
          case 17:
            $fmt__4 = $fmt__0[2];
            $fmt__0 = $fmt__4;
            continue;
          // FALLTHROUGH
          case 18:
            $kb = $fmt__0[1];
            if (0 === $kb[0]) {
              $rest__19 = $fmt__0[2];
              $match = $kb[1];
              $fmt__5 = $match[1];
              $k__3 = function($k, $rest) use ($make_iprintf) {
                $k__0 = function($koc) use ($k,$make_iprintf,$rest) {
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
            $match__0 = $kb[1];
            $fmt__6 = $match__0[1];
            $k__4 = function($k, $rest) use ($make_iprintf) {
              $k__0 = function($koc) use ($k,$make_iprintf,$rest) {
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
            throw $runtime["caml_wrap_thrown_exception"](V(0, $Assert_failure, $hS));
          // FALLTHROUGH
          case 20:
            $rest__21 = $fmt__0[3];
            $kc = $make_iprintf->contents($k__0, $o, $rest__21);
            return function($ki) use ($const__0,$kc) {
              return $const__0($kc, $ki);
            };
          // FALLTHROUGH
          case 21:
            $rest__22 = $fmt__0[2];
            $kd = $make_iprintf->contents($k__0, $o, $rest__22);
            return function($kh) use ($const__0,$kd) {
              return $const__0($kd, $kh);
            };
          // FALLTHROUGH
          case 22:
            $rest__23 = $fmt__0[1];
            $ke = $make_iprintf->contents($k__0, $o, $rest__23);
            return function($kg) use ($const__0,$ke) {
              return $const__0($ke, $kg);
            };
          // FALLTHROUGH
          case 23:
            $rest__24 = $fmt__0[2];
            $ign = $fmt__0[1];
            $kf = 0;
            return $make_ignored_param(
              function($x, $param) use ($caml_call1,$k__0) {
                return $caml_call1($k__0, $x);
              },
              $o,
              $kf,
              $ign,
              $rest__24
            );
          // FALLTHROUGH
          default:
            $rest__25 = $fmt__0[3];
            $arity = $fmt__0[1];
            if ($counter < 50) {
              $counter__0 = $counter + 1 | 0;
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
    $_ = $fn_of_custom_arity__0->contents =
      function($counter, $k, $o, $fmt, $param) use ($caml_trampoline_return,$const__0,$fn_of_custom_arity,$make_iprintf__0) {
        if ($param) {
          $arity = $param[1];
          $jP = $fn_of_custom_arity->contents($k, $o, $fmt, $arity);
          return function($jQ) use ($const__0,$jP) {
            return $const__0($jP, $jQ);
          };
        }
        if ($counter < 50) {
          $counter__0 = $counter + 1 | 0;
          return $make_iprintf__0($counter__0, $k, $o, $fmt);
        }
        return $caml_trampoline_return($make_iprintf__0, varray[0,$k,$o,$fmt]);
      };
    $_ = $make_iprintf->contents =
      function($k, $o, $fmt) use ($caml_trampoline,$make_iprintf__0) {
        return $caml_trampoline($make_iprintf__0(0, $k, $o, $fmt));
      };
    $_ = $fn_of_custom_arity->contents =
      function($k, $o, $fmt, $param) use ($caml_trampoline,$fn_of_custom_arity__0) {
        return $caml_trampoline(
          $fn_of_custom_arity__0->contents(0, $k, $o, $fmt, $param)
        );
      };
    $_ = $output_acc->contents =
      function($o, $acc) use ($Pervasives,$caml_call1,$caml_call2,$cst__17,$cst__18,$is_int,$output_acc,$string_of_formatting_lit) {
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
              return $caml_call2($Pervasives[54], $o, $s);
            // FALLTHROUGH
            case 1:
              $jN = $acc__0[2];
              $jO = $acc__0[1];
              if (0 === $jN[0]) {
                $acc__1 = $jN[1];
                $output_acc->contents($o, $jO);
                $caml_call2($Pervasives[54], $o, $cst__17);
                $acc__0 = $acc__1;
                continue;
              }
              $acc__2 = $jN[1];
              $output_acc->contents($o, $jO);
              $caml_call2($Pervasives[54], $o, $cst__18);
              $acc__0 = $acc__2;
              continue;
            // FALLTHROUGH
            case 6:
              $f = $acc__0[2];
              $p__2 = $acc__0[1];
              $output_acc->contents($o, $p__2);
              return $caml_call1($f, $o);
            // FALLTHROUGH
            case 7:
              $p__3 = $acc__0[1];
              $output_acc->contents($o, $p__3);
              return $caml_call1($Pervasives[51], $o);
            // FALLTHROUGH
            case 8:
              $msg = $acc__0[2];
              $p__4 = $acc__0[1];
              $output_acc->contents($o, $p__4);
              return $caml_call1($Pervasives[1], $msg);
            // FALLTHROUGH
            case 2:
            // FALLTHROUGH
            case 4:
              $s__0 = $acc__0[2];
              $p__0 = $acc__0[1];
              $output_acc->contents($o, $p__0);
              return $caml_call2($Pervasives[54], $o, $s__0);
            // FALLTHROUGH
            default:
              $c = $acc__0[2];
              $p__1 = $acc__0[1];
              $output_acc->contents($o, $p__1);
              return $caml_call2($Pervasives[53], $o, $c);
            }
        }
      };
    $_ = $bufput_acc->contents =
      function($b, $acc) use ($Buffer,$Pervasives,$bufput_acc,$caml_call1,$caml_call2,$cst__19,$cst__20,$is_int,$string_of_formatting_lit) {
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
              return $caml_call2($Buffer[14], $b, $s);
            // FALLTHROUGH
            case 1:
              $jL = $acc__0[2];
              $jM = $acc__0[1];
              if (0 === $jL[0]) {
                $acc__1 = $jL[1];
                $bufput_acc->contents($b, $jM);
                $caml_call2($Buffer[14], $b, $cst__19);
                $acc__0 = $acc__1;
                continue;
              }
              $acc__2 = $jL[1];
              $bufput_acc->contents($b, $jM);
              $caml_call2($Buffer[14], $b, $cst__20);
              $acc__0 = $acc__2;
              continue;
            // FALLTHROUGH
            case 6:
              $f = $acc__0[2];
              $p__2 = $acc__0[1];
              $bufput_acc->contents($b, $p__2);
              return $caml_call1($f, $b);
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
              return $caml_call1($Pervasives[1], $msg);
            // FALLTHROUGH
            case 2:
            // FALLTHROUGH
            case 4:
              $s__0 = $acc__0[2];
              $p__0 = $acc__0[1];
              $bufput_acc->contents($b, $p__0);
              return $caml_call2($Buffer[14], $b, $s__0);
            // FALLTHROUGH
            default:
              $c = $acc__0[2];
              $p__1 = $acc__0[1];
              $bufput_acc->contents($b, $p__1);
              return $caml_call2($Buffer[10], $b, $c);
            }
        }
      };
    $_ = $strput_acc->contents =
      function($b, $acc) use ($Buffer,$Pervasives,$caml_call1,$caml_call2,$cst__21,$cst__22,$is_int,$string_of_formatting_lit,$strput_acc) {
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
              return $caml_call2($Buffer[14], $b, $s);
            // FALLTHROUGH
            case 1:
              $jI = $acc__0[2];
              $jJ = $acc__0[1];
              if (0 === $jI[0]) {
                $acc__1 = $jI[1];
                $strput_acc->contents($b, $jJ);
                $caml_call2($Buffer[14], $b, $cst__21);
                $acc__0 = $acc__1;
                continue;
              }
              $acc__2 = $jI[1];
              $strput_acc->contents($b, $jJ);
              $caml_call2($Buffer[14], $b, $cst__22);
              $acc__0 = $acc__2;
              continue;
            // FALLTHROUGH
            case 6:
              $f = $acc__0[2];
              $p__2 = $acc__0[1];
              $strput_acc->contents($b, $p__2);
              $jK = $caml_call1($f, 0);
              return $caml_call2($Buffer[14], $b, $jK);
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
              return $caml_call1($Pervasives[1], $msg);
            // FALLTHROUGH
            case 2:
            // FALLTHROUGH
            case 4:
              $s__0 = $acc__0[2];
              $p__0 = $acc__0[1];
              $strput_acc->contents($b, $p__0);
              return $caml_call2($Buffer[14], $b, $s__0);
            // FALLTHROUGH
            default:
              $c = $acc__0[2];
              $p__1 = $acc__0[1];
              $strput_acc->contents($b, $p__1);
              return $caml_call2($Buffer[10], $b, $c);
            }
        }
      };
    $failwith_message = function($param) use ($Buffer,$Pervasives,$caml_call1,$make_printf,$strput_acc) {
      $fmt = $param[1];
      $buf = $caml_call1($Buffer[1], 256);
      $k = function($param, $acc) use ($Buffer,$Pervasives,$buf,$caml_call1,$strput_acc) {
        $strput_acc->contents($buf, $acc);
        $jH = $caml_call1($Buffer[2], $buf);
        return $caml_call1($Pervasives[2], $jH);
      };
      return $make_printf->contents($k, 0, 0, $fmt);
    };
    $open_box_of_string = function($str) use ($Failure,$String,$caml_call1,$caml_call3,$caml_ml_string_length,$caml_string_get,$caml_string_notequal,$caml_wrap_exception,$cst__23,$cst__24,$cst_b,$cst_h,$cst_hov,$cst_hv,$cst_v,$failwith_message,$hT,$hU,$runtime,$unsigned_right_shift_32) {
      if ($runtime["caml_string_equal"]($str, $cst__23)) {return $hT;}
      $len = $caml_ml_string_length($str);
      $invalid_box = function($param) use ($caml_call1,$failwith_message,$hU,$str) {
        return $caml_call1($failwith_message($hU), $str);
      };
      $parse_spaces = function($i) use ($caml_string_get,$len,$str) {
        $i__0 = $i;
        for (;;) {
          if ($i__0 === $len) {return $i__0;}
          $match = $caml_string_get($str, $i__0);
          if (9 !== $match) {if (32 !== $match) {return $i__0;}}
          $i__1 = $i__0 + 1 | 0;
          $i__0 = $i__1;
          continue;
        }
      };
      $parse_lword = function($i, $j) use ($caml_string_get,$len,$str,$unsigned_right_shift_32) {
        $j__0 = $j;
        for (;;) {
          if ($j__0 === $len) {return $j__0;}
          $match = $caml_string_get($str, $j__0);
          $switcher = $match + -97 | 0;
          if (25 < $unsigned_right_shift_32($switcher, 0)) {return $j__0;}
          $j__1 = $j__0 + 1 | 0;
          $j__0 = $j__1;
          continue;
        }
      };
      $parse_int = function($i, $j) use ($caml_string_get,$len,$str) {
        $j__0 = $j;
        for (;;) {
          if ($j__0 === $len) {return $j__0;}
          $match = $caml_string_get($str, $j__0);
          $switch__0 = 48 <= $match
            ? 58 <= $match ? 0 : (1)
            : (45 === $match ? 1 : (0));
          if ($switch__0) {$j__1 = $j__0 + 1 | 0;$j__0 = $j__1;continue;}
          return $j__0;
        }
      };
      $wstart = $parse_spaces(0);
      $wend = $parse_lword($wstart, $wstart);
      $box_name = $caml_call3($String[4], $str, $wstart, $wend - $wstart | 0);
      $nstart = $parse_spaces($wend);
      $nend = $parse_int($nstart, $nstart);
      if ($nstart === $nend) {$indent = 0;}
      else {
        try {
          $jF = $runtime["caml_int_of_string"](
            $caml_call3($String[4], $str, $nstart, $nend - $nstart | 0)
          );
          $indent = $jF;
        }
        catch(\Throwable $jG) {
          $jG = $caml_wrap_exception($jG);
          if ($jG[1] !== $Failure) {
            throw $runtime["caml_wrap_thrown_exception_reraise"]($jG);
          }
          $jE = $invalid_box(0);
          $indent = $jE;
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
      return V(0, $indent, $box_type);
    };
    $make_padding_fmt_ebb = function($pad, $fmt) use ($is_int) {
      if ($is_int($pad)) {
        return V(0, 0, $fmt);
      }
      else {
        if (0 === $pad[0]) {
          $w = $pad[2];
          $s = $pad[1];
          return V(0, V(0, $s, $w), $fmt);
        }
        $s__0 = $pad[1];
        return V(0, V(1, $s__0), $fmt);
      }
    };
    $make_precision_fmt_ebb = function($prec, $fmt) use ($is_int) {
      if ($is_int($prec)) {
        return 0 === $prec ? V(0, 0, $fmt) : (V(0, 1, $fmt));
      }
      $p = $prec[1];
      return V(0, V(0, $p), $fmt);
    };
    $make_padprec_fmt_ebb = function($pad, $prec, $fmt) use ($is_int,$make_precision_fmt_ebb) {
      $match = $make_precision_fmt_ebb($prec, $fmt);
      $fmt__0 = $match[2];
      $prec__0 = $match[1];
      if ($is_int($pad)) {
        return V(0, 0, $prec__0, $fmt__0);
      }
      else {
        if (0 === $pad[0]) {
          $w = $pad[2];
          $s = $pad[1];
          return V(0, V(0, $s, $w), $prec__0, $fmt__0);
        }
        $s__0 = $pad[1];
        return V(0, V(1, $s__0), $prec__0, $fmt__0);
      }
    };
    $fmt_ebb_of_string = function($legacy_behavior, $str) use ($Assert_failure,$Failure,$Not_found,$Pervasives,$String,$Sys,$add_in_char_set,$caml_call1,$caml_call2,$caml_call3,$caml_call4,$caml_call5,$caml_ml_string_length,$caml_notequal,$caml_string_get,$caml_trampoline,$caml_trampoline_return,$caml_wrap_exception,$create_char_set,$cst_0,$cst_0__0,$cst_0__1,$cst_0__2,$cst__25,$cst__26,$cst__27,$cst__28,$cst__29,$cst__30,$cst__31,$cst__32,$cst__33,$cst__34,$cst__35,$cst__36,$cst__37,$cst__38,$cst__39,$cst_character,$cst_character__0,$cst_digit,$cst_non_zero_widths_are_unsupported_for_c_conversions,$cst_padding,$cst_padding__0,$cst_precision,$cst_precision__0,$cst_precision__1,$cst_precision__2,$cst_unexpected_end_of_format,$failwith_message,$fmtty_of_fmt,$formatting_lit,$freeze_char_set,$h0,$h1,$h2,$h3,$h4,$h5,$h6,$h7,$h8,$h9,$hV,$hW,$hX,$hY,$hZ,$h_,$ia,$ib,$ic,$id,$ie,$ig,$ih,$ii,$ij,$ik,$is_int,$make_padding_fmt_ebb,$make_padprec_fmt_ebb,$open_box_of_string,$rev_char_set,$runtime,$sub_format,$unsigned_right_shift_32) {
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
      $invalid_format_message = function($str_ind, $msg) use ($caml_call3,$failwith_message,$hV,$str) {
        return $caml_call3($failwith_message($hV), $str, $str_ind, $msg);
      };
      $unexpected_end_of_format = function($end_ind) use ($cst_unexpected_end_of_format,$invalid_format_message) {
        return $invalid_format_message($end_ind, $cst_unexpected_end_of_format
        );
      };
      $invalid_nonnull_char_width = function($str_ind) use ($cst_non_zero_widths_are_unsupported_for_c_conversions,$invalid_format_message) {
        return $invalid_format_message(
          $str_ind,
          $cst_non_zero_widths_are_unsupported_for_c_conversions
        );
      };
      $invalid_format_without = function($str_ind, $c, $s) use ($caml_call4,$failwith_message,$hW,$str) {
        return $caml_call4($failwith_message($hW), $str, $str_ind, $c, $s);
      };
      $expected_character = function($str_ind, $expected, $read) use ($caml_call4,$failwith_message,$hX,$str) {
        return $caml_call4(
          $failwith_message($hX),
          $str,
          $str_ind,
          $expected,
          $read
        );
      };
      $add_literal = function($lit_start, $str_ind, $fmt) use ($String,$caml_call3,$caml_string_get,$str) {
        $size = $str_ind - $lit_start | 0;
        return 0 === $size
          ? V(0, $fmt)
          : (1 === $size
           ? V(0, V(12, $caml_string_get($str, $lit_start), $fmt))
           : (V(
            0,
            V(11, $caml_call3($String[4], $str, $lit_start, $size), $fmt)
          )));
      };
      $parse_literal = function($lit_start, $str_ind, $end_ind) use ($add_literal,$caml_string_get,$parse_after_at,$parse_format,$str) {
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
              $str_ind__0 + 1 |
                0,
              $end_ind
            );
            $fmt_rest__0 = $match__1[1];
            return $add_literal($lit_start, $str_ind__0, $fmt_rest__0);
          }
          $str_ind__1 = $str_ind__0 + 1 | 0;
          $str_ind__0 = $str_ind__1;
          continue;
        }
      };
      $parse = function($beg_ind, $end_ind) use ($parse_literal) {
        return $parse_literal($beg_ind, $beg_ind, $end_ind);
      };
      $parse_flags = function($pct_ind, $str_ind, $end_ind, $ign) use ($caml_call3,$caml_string_get,$failwith_message,$hY,$legacy_behavior__0,$parse_padding,$str,$unexpected_end_of_format,$unsigned_right_shift_32) {
        $zero = V(0, 0);
        $minus = V(0, 0);
        $plus = V(0, 0);
        $space = V(0, 0);
        $hash = V(0, 0);
        $set_flag = function($str_ind, $flag) use ($caml_call3,$caml_string_get,$failwith_message,$hY,$legacy_behavior__0,$str) {
          $jB = $flag[1];
          $jC = $jB ? 1 - $legacy_behavior__0 : ($jB);
          if ($jC) {
            $jD = $caml_string_get($str, $str_ind);
            $caml_call3($failwith_message($hY), $str, $str_ind, $jD);
          }
          $flag[1] = 1;
          return 0;
        };
        $read_flags = function($str_ind) use ($caml_string_get,$end_ind,$hash,$ign,$minus,$parse_padding,$pct_ind,$plus,$set_flag,$space,$str,$unexpected_end_of_format,$unsigned_right_shift_32,$zero) {
          $str_ind__0 = $str_ind;
          for (;;) {
            if ($str_ind__0 === $end_ind) {
              $unexpected_end_of_format($end_ind);
            }
            $match = $caml_string_get($str, $str_ind__0);
            $switcher = $match + -32 | 0;
            if (! (16 < $unsigned_right_shift_32($switcher, 0))) {
              switch($switcher) {
                // FALLTHROUGH
                case 0:
                  $set_flag($str_ind__0, $space);
                  $str_ind__1 = $str_ind__0 + 1 | 0;
                  $str_ind__0 = $str_ind__1;
                  continue;
                // FALLTHROUGH
                case 3:
                  $set_flag($str_ind__0, $hash);
                  $str_ind__2 = $str_ind__0 + 1 | 0;
                  $str_ind__0 = $str_ind__2;
                  continue;
                // FALLTHROUGH
                case 11:
                  $set_flag($str_ind__0, $plus);
                  $str_ind__3 = $str_ind__0 + 1 | 0;
                  $str_ind__0 = $str_ind__3;
                  continue;
                // FALLTHROUGH
                case 13:
                  $set_flag($str_ind__0, $minus);
                  $str_ind__4 = $str_ind__0 + 1 | 0;
                  $str_ind__0 = $str_ind__4;
                  continue;
                // FALLTHROUGH
                case 16:
                  $set_flag($str_ind__0, $zero);
                  $str_ind__5 = $str_ind__0 + 1 | 0;
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
      $parse_ign = function($pct_ind, $str_ind, $end_ind) use ($caml_string_get,$parse_flags,$str,$unexpected_end_of_format) {
        if ($str_ind === $end_ind) {$unexpected_end_of_format($end_ind);}
        $match = $caml_string_get($str, $str_ind);
        return 95 === $match
          ? $parse_flags($pct_ind, $str_ind + 1 | 0, $end_ind, 1)
          : ($parse_flags($pct_ind, $str_ind, $end_ind, 0));
      };
      $_ = $parse_format->contents =
        function($pct_ind, $end_ind) use ($parse_ign) {
          return $parse_ign($pct_ind, $pct_ind + 1 | 0, $end_ind);
        };
      $parse_conversion = function
      ($pct_ind, $str_ind, $end_ind, $plus, $hash, $space, $ign, $pad, $prec, $padprec, $symb) use ($caml_call3,$caml_notequal,$caml_string_get,$compute_float_conv,$compute_int_conv,$counter_of_char,$cst_0__0,$cst_0__1,$cst_0__2,$cst__25,$cst__26,$cst__27,$cst__28,$cst__29,$cst__30,$cst__31,$cst__32,$cst_padding__0,$cst_precision__0,$cst_precision__1,$cst_precision__2,$failwith_message,$fmtty_of_fmt,$h3,$h4,$h5,$h6,$h7,$h8,$incompatible_flag,$invalid_nonnull_char_width,$is_int,$is_int_base,$legacy_behavior__0,$make_padding_fmt_ebb,$make_padprec_fmt_ebb,$parse,$parse_char_set,$search_subformat_end,$str) {
        $plus_used = V(0, 0);
        $hash_used = V(0, 0);
        $space_used = V(0, 0);
        $ign_used = V(0, 0);
        $pad_used = V(0, 0);
        $prec_used = V(0, 0);
        $get_plus = function($param) use ($plus,$plus_used) {
          $plus_used[1] = 1;
          return $plus;
        };
        $get_hash = function($param) use ($hash,$hash_used) {
          $hash_used[1] = 1;
          return $hash;
        };
        $get_space = function($param) use ($space,$space_used) {
          $space_used[1] = 1;
          return $space;
        };
        $get_ign = function($param) use ($ign,$ign_used) {
          $ign_used[1] = 1;
          return $ign;
        };
        $get_pad = function($param) use ($pad,$pad_used) {
          $pad_used[1] = 1;
          return $pad;
        };
        $get_prec = function($param) use ($prec,$prec_used) {
          $prec_used[1] = 1;
          return $prec;
        };
        $get_padprec = function($param) use ($pad_used,$padprec) {
          $pad_used[1] = 1;
          return $padprec;
        };
        $get_int_pad = function($param) use ($cst_precision__0,$cst_precision__1,$get_pad,$get_prec,$h3,$incompatible_flag,$is_int,$legacy_behavior__0,$pct_ind,$str_ind) {
          $pad = $get_pad(0);
          $match = $get_prec(0);
          if ($is_int($match)) {if (0 === $match) {return $pad;}}
          if ($is_int($pad)) {return 0;}
          else {
            if (0 === $pad[0]) {
              if (2 <= $pad[1]) {
                $n = $pad[2];
                return $legacy_behavior__0
                  ? V(0, 1, $n)
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
               ? $h3
               : ($incompatible_flag->contents(
                $pct_ind,
                $str_ind,
                48,
                $cst_precision__1
              ))
              : ($pad);
          }
        };
        $check_no_0 = function($symb, $pad) use ($cst_0__0,$cst_0__1,$h4,$incompatible_flag,$is_int,$legacy_behavior__0,$pct_ind,$str_ind) {
          if ($is_int($pad)) {return $pad;}
          else {
            if (0 === $pad[0]) {
              if (2 <= $pad[1]) {
                $width = $pad[2];
                return $legacy_behavior__0
                  ? V(0, 1, $width)
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
               ? $h4
               : ($incompatible_flag->contents(
                $pct_ind,
                $str_ind,
                $symb,
                $cst_0__1
              ))
              : ($pad);
          }
        };
        $opt_of_pad = function($c, $pad) use ($cst_0__2,$cst__25,$cst__26,$incompatible_flag,$is_int,$legacy_behavior__0,$pct_ind,$str_ind) {
          if ($is_int($pad)) {return 0;}
          else {
            if (0 === $pad[0]) {
              switch($pad[1]) {
                // FALLTHROUGH
                case 0:
                  $width = $pad[2];
                  return $legacy_behavior__0
                    ? V(0, $width)
                    : ($incompatible_flag->contents(
                     $pct_ind,
                     $str_ind,
                     $c,
                     $cst__25
                   ));
                // FALLTHROUGH
                case 1:
                  $width__0 = $pad[2];
                  return V(0, $width__0);
                // FALLTHROUGH
                default:
                  $width__1 = $pad[2];
                  return $legacy_behavior__0
                    ? V(0, $width__1)
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
        $get_pad_opt = function($c) use ($get_pad,$opt_of_pad) {
          return $opt_of_pad($c, $get_pad(0));
        };
        $get_padprec_opt = function($c) use ($get_padprec,$opt_of_pad) {
          return $opt_of_pad($c, $get_padprec(0));
        };
        $get_prec_opt = function($param) use ($cst__27,$get_prec,$incompatible_flag,$is_int,$pct_ind,$str_ind) {
          $match = $get_prec(0);
          if ($is_int($match)) {
            return 0 === $match
              ? 0
              : ($incompatible_flag->contents($pct_ind, $str_ind, 95, $cst__27
             ));
          }
          $ndec = $match[1];
          return V(0, $ndec);
        };
        if (124 <= $symb) {$switch__0 = 0;}
        else {
          switch($symb) {
            // FALLTHROUGH
            case 33:
              $match__5 = $parse($str_ind, $end_ind);
              $fmt_rest__5 = $match__5[1];
              $fmt_result = V(0, V(10, $fmt_rest__5));
              $switch__0 = 1;
              break;
            // FALLTHROUGH
            case 40:
              $sub_end = $search_subformat_end->contents(
                $str_ind,
                $end_ind,
                41
              );
              $match__7 = $parse($sub_end + 2 | 0, $end_ind);
              $fmt_rest__7 = $match__7[1];
              $match__8 = $parse($str_ind, $sub_end);
              $sub_fmt = $match__8[1];
              $sub_fmtty = $fmtty_of_fmt->contents($sub_fmt);
              if ($get_ign(0)) {
                $ignored__2 = V(9, $get_pad_opt(95), $sub_fmtty);
                $jh = V(0, V(23, $ignored__2, $fmt_rest__7));
              }
              else {
                $jh = V(0, V(14, $get_pad_opt(40), $sub_fmtty, $fmt_rest__7));
              }
              $fmt_result = $jh;
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
              $jj = $get_ign(0)
                ? V(0, V(23, 1, $fmt_rest__10))
                : (V(0, V(1, $fmt_rest__10)));
              $fmt_result = $jj;
              $switch__0 = 1;
              break;
            // FALLTHROUGH
            case 78:
              $match__15 = $parse($str_ind, $end_ind);
              $fmt_rest__14 = $match__15[1];
              $counter__0 = 2;
              if ($get_ign(0)) {
                $ignored__6 = V(11, $counter__0);
                $jp = V(0, V(23, $ignored__6, $fmt_rest__14));
              }
              else {$jp = V(0, V(21, $counter__0, $fmt_rest__14));}
              $fmt_result = $jp;
              $switch__0 = 1;
              break;
            // FALLTHROUGH
            case 83:
              $pad__6 = $check_no_0($symb, $get_padprec(0));
              $match__16 = $parse($str_ind, $end_ind);
              $fmt_rest__15 = $match__16[1];
              if ($get_ign(0)) {
                $ignored__7 = V(1, $get_padprec_opt(95));
                $jq = V(0, V(23, $ignored__7, $fmt_rest__15));
              }
              else {
                $match__17 = $make_padding_fmt_ebb($pad__6, $fmt_rest__15);
                $fmt_rest__16 = $match__17[2];
                $pad__7 = $match__17[1];
                $jq = V(0, V(3, $pad__7, $fmt_rest__16));
              }
              $fmt_result = $jq;
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
                $ignored__9 = V(10, $get_pad_opt(95), $char_set);
                $jv = V(0, V(23, $ignored__9, $fmt_rest__19));
              }
              else {
                $jv = V(0, V(20, $get_pad_opt(91), $char_set, $fmt_rest__19));
              }
              $fmt_result = $jv;
              $switch__0 = 1;
              break;
            // FALLTHROUGH
            case 97:
              $match__22 = $parse($str_ind, $end_ind);
              $fmt_rest__20 = $match__22[1];
              $fmt_result = V(0, V(15, $fmt_rest__20));
              $switch__0 = 1;
              break;
            // FALLTHROUGH
            case 99:
              $char_format = function($fmt_rest) use ($get_ign) {
                return $get_ign(0)
                  ? V(0, V(23, 0, $fmt_rest))
                  : (V(0, V(0, $fmt_rest)));
              };
              $scan_format = function($fmt_rest) use ($get_ign) {
                return $get_ign(0)
                  ? V(0, V(23, 3, $fmt_rest))
                  : (V(0, V(22, $fmt_rest)));
              };
              $match__23 = $parse($str_ind, $end_ind);
              $fmt_rest__21 = $match__23[1];
              $match__24 = $get_pad_opt(99);
              if ($match__24) {
                $jw = 0 === $match__24[1]
                  ? $scan_format($fmt_rest__21)
                  : ($legacy_behavior__0
                   ? $char_format($fmt_rest__21)
                   : ($invalid_nonnull_char_width($str_ind)));
                $jx = $jw;
              }
              else {$jx = $char_format($fmt_rest__21);}
              $fmt_result = $jx;
              $switch__0 = 1;
              break;
            // FALLTHROUGH
            case 114:
              $match__25 = $parse($str_ind, $end_ind);
              $fmt_rest__22 = $match__25[1];
              $jy = $get_ign(0)
                ? V(0, V(23, 2, $fmt_rest__22))
                : (V(0, V(19, $fmt_rest__22)));
              $fmt_result = $jy;
              $switch__0 = 1;
              break;
            // FALLTHROUGH
            case 115:
              $pad__9 = $check_no_0($symb, $get_padprec(0));
              $match__26 = $parse($str_ind, $end_ind);
              $fmt_rest__23 = $match__26[1];
              if ($get_ign(0)) {
                $ignored__10 = V(0, $get_padprec_opt(95));
                $jz = V(0, V(23, $ignored__10, $fmt_rest__23));
              }
              else {
                $match__27 = $make_padding_fmt_ebb($pad__9, $fmt_rest__23);
                $fmt_rest__24 = $match__27[2];
                $pad__10 = $match__27[1];
                $jz = V(0, V(2, $pad__10, $fmt_rest__24));
              }
              $fmt_result = $jz;
              $switch__0 = 1;
              break;
            // FALLTHROUGH
            case 116:
              $match__28 = $parse($str_ind, $end_ind);
              $fmt_rest__25 = $match__28[1];
              $fmt_result = V(0, V(16, $fmt_rest__25));
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
              $match__30 = $parse($sub_end__0 + 2 | 0, $end_ind);
              $fmt_rest__26 = $match__30[1];
              $sub_fmtty__0 = $fmtty_of_fmt->contents($sub_fmt__0);
              if ($get_ign(0)) {
                $ignored__11 = V(8, $get_pad_opt(95), $sub_fmtty__0);
                $jA = V(0, V(23, $ignored__11, $fmt_rest__26));
              }
              else {
                $jA = V(
                  0,
                  V(13, $get_pad_opt(123), $sub_fmtty__0, $fmt_rest__26)
                );
              }
              $fmt_result = $jA;
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
                $ignored__3 = V(7, $get_padprec_opt(95));
                $ji = V(0, V(23, $ignored__3, $fmt_rest__8));
              }
              else {
                $match__10 = $make_padding_fmt_ebb($pad__3, $fmt_rest__8);
                $fmt_rest__9 = $match__10[2];
                $pad__4 = $match__10[1];
                $ji = V(0, V(9, $pad__4, $fmt_rest__9));
              }
              $fmt_result = $ji;
              $switch__0 = 1;
              break;
            // FALLTHROUGH
            case 37:
            // FALLTHROUGH
            case 64:
              $match__6 = $parse($str_ind, $end_ind);
              $fmt_rest__6 = $match__6[1];
              $fmt_result = V(0, V(12, $symb, $fmt_rest__6));
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
                  $ignored__5 = V(11, $counter);
                  $jo = V(0, V(23, $ignored__5, $fmt_rest__13));
                }
                else {$jo = V(0, V(21, $counter, $fmt_rest__13));}
                $fmt_result = $jo;
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
              $fmt_result = $caml_call3(
                $failwith_message($h8),
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
              $jr = $get_space(0);
              $js = $get_hash(0);
              $iconv__2 = $compute_int_conv->contents(
                $pct_ind,
                $str_ind,
                $get_plus(0),
                $js,
                $jr,
                $symb
              );
              $match__18 = $parse($str_ind, $end_ind);
              $fmt_rest__17 = $match__18[1];
              if ($get_ign(0)) {
                $ignored__8 = V(2, $iconv__2, $get_pad_opt(95));
                $jt = V(0, V(23, $ignored__8, $fmt_rest__17));
              }
              else {
                $ju = $get_prec(0);
                $match__19 = $make_padprec_fmt_ebb(
                  $get_int_pad(0),
                  $ju,
                  $fmt_rest__17
                );
                $fmt_rest__18 = $match__19[3];
                $prec__4 = $match__19[2];
                $pad__8 = $match__19[1];
                $jt = V(0, V(4, $iconv__2, $pad__8, $prec__4, $fmt_rest__18));
              }
              $fmt_result = $jt;
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
              $jk = $get_space(0);
              $fconv = $compute_float_conv->contents(
                $pct_ind,
                $str_ind,
                $get_plus(0),
                $jk,
                $symb
              );
              $match__12 = $parse($str_ind, $end_ind);
              $fmt_rest__11 = $match__12[1];
              if ($get_ign(0)) {
                $jl = $get_prec_opt(0);
                $ignored__4 = V(6, $get_pad_opt(95), $jl);
                $jm = V(0, V(23, $ignored__4, $fmt_rest__11));
              }
              else {
                $jn = $get_prec(0);
                $match__13 = $make_padprec_fmt_ebb(
                  $get_pad(0),
                  $jn,
                  $fmt_rest__11
                );
                $fmt_rest__12 = $match__13[3];
                $prec__3 = $match__13[2];
                $pad__5 = $match__13[1];
                $jm = V(0, V(8, $fconv, $pad__5, $prec__3, $fmt_rest__12));
              }
              $fmt_result = $jm;
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
              $switcher = $symb + -108 | 0;
              switch($switcher) {
                // FALLTHROUGH
                case 0:
                  $i2 = $caml_string_get($str, $str_ind);
                  $i3 = $get_space(0);
                  $i4 = $get_hash(0);
                  $iconv = $compute_int_conv->contents(
                    $pct_ind,
                    $str_ind + 1 |
                      0,
                    $get_plus(0),
                    $i4,
                    $i3,
                    $i2
                  );
                  $match = $parse($str_ind + 1 | 0, $end_ind);
                  $fmt_rest = $match[1];
                  if ($get_ign(0)) {
                    $ignored = V(3, $iconv, $get_pad_opt(95));
                    $i5 = V(0, V(23, $ignored, $fmt_rest));
                  }
                  else {
                    $i7 = $get_prec(0);
                    $match__0 = $make_padprec_fmt_ebb(
                      $get_int_pad(0),
                      $i7,
                      $fmt_rest
                    );
                    $fmt_rest__0 = $match__0[3];
                    $prec__0 = $match__0[2];
                    $pad__0 = $match__0[1];
                    $i5 = V(0, V(5, $iconv, $pad__0, $prec__0, $fmt_rest__0));
                  }
                  $i6 = $i5;
                  $switch__3 = 1;
                  break;
                // FALLTHROUGH
                case 1:
                  $switch__2 = 0;
                  $switch__3 = 0;
                  break;
                // FALLTHROUGH
                default:
                  $i8 = $caml_string_get($str, $str_ind);
                  $i9 = $get_space(0);
                  $i_ = $get_hash(0);
                  $iconv__0 = $compute_int_conv->contents(
                    $pct_ind,
                    $str_ind + 1 |
                      0,
                    $get_plus(0),
                    $i_,
                    $i9,
                    $i8
                  );
                  $match__1 = $parse($str_ind + 1 | 0, $end_ind);
                  $fmt_rest__1 = $match__1[1];
                  if ($get_ign(0)) {
                    $ignored__0 = V(4, $iconv__0, $get_pad_opt(95));
                    $ja = V(0, V(23, $ignored__0, $fmt_rest__1));
                  }
                  else {
                    $jb = $get_prec(0);
                    $match__2 = $make_padprec_fmt_ebb(
                      $get_int_pad(0),
                      $jb,
                      $fmt_rest__1
                    );
                    $fmt_rest__2 = $match__2[3];
                    $prec__1 = $match__2[2];
                    $pad__1 = $match__2[1];
                    $ja = V(0, V(6, $iconv__0, $pad__1, $prec__1, $fmt_rest__2));
                  }
                  $i6 = $ja;
                  $switch__3 = 1;
                }
              if ($switch__3) {$fmt_result = $i6;$switch__2 = 1;}
            }
          }
          else {
            if (76 === $symb) {
              $jc = $caml_string_get($str, $str_ind);
              $jd = $get_space(0);
              $je = $get_hash(0);
              $iconv__1 = $compute_int_conv->contents(
                $pct_ind,
                $str_ind + 1 |
                  0,
                $get_plus(0),
                $je,
                $jd,
                $jc
              );
              $match__3 = $parse($str_ind + 1 | 0, $end_ind);
              $fmt_rest__3 = $match__3[1];
              if ($get_ign(0)) {
                $ignored__1 = V(5, $iconv__1, $get_pad_opt(95));
                $jf = V(0, V(23, $ignored__1, $fmt_rest__3));
              }
              else {
                $jg = $get_prec(0);
                $match__4 = $make_padprec_fmt_ebb(
                  $get_int_pad(0),
                  $jg,
                  $fmt_rest__3
                );
                $fmt_rest__4 = $match__4[3];
                $prec__2 = $match__4[2];
                $pad__2 = $match__4[1];
                $jf = V(0, V(7, $iconv__1, $pad__2, $prec__2, $fmt_rest__4));
              }
              $fmt_result = $jf;
              $switch__2 = 1;
            }
            else {$switch__2 = 0;}
          }
          if (! $switch__2) {
            $fmt_result = $caml_call3(
              $failwith_message($h5),
              $str,
              $str_ind + -1 |
                0,
              $symb
            );
          }
        }
        if (1 - $legacy_behavior__0) {
          $iT = 1 - $plus_used[1];
          $plus__0 = $iT ? $plus : ($iT);
          if ($plus__0) {
            $incompatible_flag->contents($pct_ind, $str_ind, $symb, $cst__28);
          }
          $iU = 1 - $hash_used[1];
          $hash__0 = $iU ? $hash : ($iU);
          if ($hash__0) {
            $incompatible_flag->contents($pct_ind, $str_ind, $symb, $cst__29);
          }
          $iV = 1 - $space_used[1];
          $space__0 = $iV ? $space : ($iV);
          if ($space__0) {
            $incompatible_flag->contents($pct_ind, $str_ind, $symb, $cst__30);
          }
          $iW = 1 - $pad_used[1];
          $iX = $iW ? $caml_notequal(V(0, $pad), $h6) : ($iW);
          if ($iX) {
            $incompatible_flag->contents(
              $pct_ind,
              $str_ind,
              $symb,
              $cst_padding__0
            );
          }
          $iY = 1 - $prec_used[1];
          $iZ = $iY ? $caml_notequal(V(0, $prec), $h7) : ($iY);
          if ($iZ) {
            $i0 = $ign ? 95 : ($symb);
            $incompatible_flag->contents(
              $pct_ind,
              $str_ind,
              $i0,
              $cst_precision__2
            );
          }
          $plus__1 = $ign ? $plus : ($ign);
          if ($plus__1) {
            $incompatible_flag->contents($pct_ind, $str_ind, 95, $cst__31);
          }
        }
        $i1 = 1 - $ign_used[1];
        $ign__0 = $i1 ? $ign : ($i1);
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
      ($pct_ind, $str_ind, $end_ind, $minus, $plus, $hash, $space, $ign, $pad, $match) use ($caml_string_get,$h1,$h2,$is_int,$parse_conversion,$str,$unexpected_end_of_format) {
        if ($str_ind === $end_ind) {$unexpected_end_of_format($end_ind);}
        $parse_conv = function($padprec) use ($caml_string_get,$end_ind,$hash,$ign,$match,$pad,$parse_conversion,$pct_ind,$plus,$space,$str,$str_ind) {
          return $parse_conversion(
            $pct_ind,
            $str_ind + 1 |
              0,
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
            if ($is_int($match)) {return $parse_conv($h1);}
            $n = $match[1];
            return $parse_conv(V(0, 1, $n));
          }
          if ($is_int($match)) {return $parse_conv($h2);}
          $n__0 = $match[1];
          return $parse_conv(V(0, 0, $n__0));
        }
        return $parse_conv($pad);
      };
      $parse_precision = function
      ($pct_ind, $str_ind, $end_ind, $minus, $plus, $hash, $space, $ign, $pad) use ($caml_string_get,$cst_precision,$h0,$invalid_format_without,$legacy_behavior__0,$parse_after_precision,$parse_positive,$str,$unexpected_end_of_format) {
        if ($str_ind === $end_ind) {$unexpected_end_of_format($end_ind);}
        $parse_literal = function($minus, $str_ind) use ($end_ind,$hash,$ign,$pad,$parse_after_precision,$parse_positive,$pct_ind,$plus,$space) {
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
            V(0, $prec)
          );
        };
        $symb = $caml_string_get($str, $str_ind);
        if (48 <= $symb) {
          if (! (58 <= $symb)) {return $parse_literal($minus, $str_ind);}
        }
        else {
          if (42 <= $symb) {
            $switcher = $symb + -42 | 0;
            switch($switcher) {
              // FALLTHROUGH
              case 0:
                return $parse_after_precision(
                  $pct_ind,
                  $str_ind + 1 |
                    0,
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
                  $iS = $str_ind + 1 | 0;
                  $minus__0 = $minus || (45 === $symb ? 1 : (0));
                  return $parse_literal($minus__0, $iS);
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
           $h0
         )
          : ($invalid_format_without($str_ind + -1 | 0, 46, $cst_precision));
      };
      $parse_after_padding = function
      ($pct_ind, $str_ind, $end_ind, $minus, $plus, $hash, $space, $ign, $pad) use ($caml_string_get,$parse_conversion,$parse_precision,$str,$unexpected_end_of_format) {
        if ($str_ind === $end_ind) {$unexpected_end_of_format($end_ind);}
        $symb = $caml_string_get($str, $str_ind);
        return 46 === $symb
          ? $parse_precision(
           $pct_ind,
           $str_ind + 1 |
             0,
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
           $str_ind + 1 |
             0,
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
      $_ = $parse_padding->contents =
        function
        ($pct_ind, $str_ind, $end_ind, $zero, $minus, $plus, $hash, $space, $ign) use ($caml_string_get,$cst_0,$cst_padding,$hZ,$incompatible_flag,$invalid_format_without,$legacy_behavior__0,$parse_after_padding,$parse_positive,$str,$unexpected_end_of_format) {
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
                V(0, $padty, $width)
              );
            }
          }
          else {
            if (42 === $match) {
              return $parse_after_padding(
                $pct_ind,
                $str_ind + 1 |
                  0,
                $end_ind,
                $minus,
                $plus,
                $hash,
                $space,
                $ign,
                V(1, $padty)
              );
            }
          }
          switch($padty) {
            // FALLTHROUGH
            case 0:
              if (1 - $legacy_behavior__0) {
                $invalid_format_without($str_ind + -1 | 0, 45, $cst_padding);
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
                $hZ
              );
            }
        };
      $parse_magic_size = function($str_ind, $end_ind) use ($Failure,$Not_found,$String,$caml_call3,$caml_string_get,$caml_wrap_exception,$ib,$parse,$parse_integer,$parse_spaces,$runtime,$str) {
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
              throw $runtime["caml_wrap_thrown_exception"]($Not_found);
            }
            $s = $caml_call3(
              $String[4],
              $str,
              $str_ind + -2 |
                0,
              ($str_ind_3 - $str_ind | 0) + 3 |
                0
            );
            $iQ = V(0, V(0, $str_ind_3 + 1 | 0, V(1, $s, $size)));
          }
          else {$iQ = 0;}
          $iP = $iQ;
        }
        catch(\Throwable $iR) {
          $iR = $caml_wrap_exception($iR);
          if ($iR !== $Not_found) {
            if ($iR[1] !== $Failure) {
              throw $runtime["caml_wrap_thrown_exception_reraise"]($iR);
            }
          }
          $iO = 0;
          $iP = $iO;
        }
        if ($iP) {
          $match = $iP[1];
          $formatting_lit = $match[2];
          $next_ind = $match[1];
          $match__0 = $parse($next_ind, $end_ind);
          $fmt_rest = $match__0[1];
          return V(0, V(17, $formatting_lit, $fmt_rest));
        }
        $match__1 = $parse($str_ind, $end_ind);
        $fmt_rest__0 = $match__1[1];
        return V(0, V(17, $ib, $fmt_rest__0));
      };
      $parse_good_break = function($str_ind, $end_ind) use ($Failure,$Not_found,$String,$caml_call3,$caml_string_get,$caml_wrap_exception,$formatting_lit,$parse,$parse_integer,$parse_spaces,$runtime,$str,$unsigned_right_shift_32) {
        try {
          $iH = $str_ind === $end_ind ? 1 : (0);
          $iI = $iH || (60 !== $caml_string_get($str, $str_ind) ? 1 : (0));
          if ($iI) {throw $runtime["caml_wrap_thrown_exception"]($Not_found);}
          $str_ind_1 = $parse_spaces->contents($str_ind + 1 | 0, $end_ind);
          $match__0 = $caml_string_get($str, $str_ind_1);
          $switch__0 = 48 <= $match__0
            ? 58 <= $match__0 ? 0 : (1)
            : (45 === $match__0 ? 1 : (0));
          if (! $switch__0) {
            throw $runtime["caml_wrap_thrown_exception"]($Not_found);
          }
          $match__1 = $parse_integer->contents($str_ind_1, $end_ind);
          $width = $match__1[2];
          $str_ind_2 = $match__1[1];
          $str_ind_3 = $parse_spaces->contents($str_ind_2, $end_ind);
          $match__2 = $caml_string_get($str, $str_ind_3);
          $switcher = $match__2 + -45 | 0;
          if (12 < $unsigned_right_shift_32($switcher, 0)) {
            if (17 === $switcher) {
              $s = $caml_call3(
                $String[4],
                $str,
                $str_ind + -2 |
                  0,
                ($str_ind_3 - $str_ind | 0) + 3 |
                  0
              );
              $iJ = V(0, $s, $width, 0);
              $iK = $str_ind_3 + 1 | 0;
              $next_ind = $iK;
              $formatting_lit__0 = $iJ;
              $switch__1 = 1;
            }
            else {$switch__1 = 0;}
          }
          else {
            $switcher__0 = $switcher + -1 | 0;
            if (1 < $unsigned_right_shift_32($switcher__0, 0)) {
              $match__3 = $parse_integer->contents($str_ind_3, $end_ind);
              $offset = $match__3[2];
              $str_ind_4 = $match__3[1];
              $str_ind_5 = $parse_spaces->contents($str_ind_4, $end_ind);
              if (62 !== $caml_string_get($str, $str_ind_5)) {
                throw $runtime["caml_wrap_thrown_exception"]($Not_found);
              }
              $s__0 = $caml_call3(
                $String[4],
                $str,
                $str_ind + -2 |
                  0,
                ($str_ind_5 - $str_ind | 0) + 3 |
                  0
              );
              $iL = V(0, $s__0, $width, $offset);
              $iM = $str_ind_5 + 1 | 0;
              $next_ind = $iM;
              $formatting_lit__0 = $iL;
              $switch__1 = 1;
            }
            else {$switch__1 = 0;}
          }
          if (! $switch__1) {
            throw $runtime["caml_wrap_thrown_exception"]($Not_found);
          }
        }
        catch(\Throwable $iN) {
          $iN = $caml_wrap_exception($iN);
          if ($iN !== $Not_found) {
            if ($iN[1] !== $Failure) {
              throw $runtime["caml_wrap_thrown_exception_reraise"]($iN);
            }
          }
          $next_ind = $str_ind;
          $formatting_lit__0 = $formatting_lit;
        }
        $match = $parse($next_ind, $end_ind);
        $fmt_rest = $match[1];
        return V(0, V(17, $formatting_lit__0, $fmt_rest));
      };
      $parse_tag = function($is_open_tag, $str_ind, $end_ind) use ($Not_found,$String,$caml_call3,$caml_string_get,$caml_wrap_exception,$check_open_box,$parse,$runtime,$str,$sub_format) {
        try {
          if ($str_ind === $end_ind) {
            throw $runtime["caml_wrap_thrown_exception"]($Not_found);
          }
          $match__0 = $caml_string_get($str, $str_ind);
          if (60 === $match__0) {
            $ind = $caml_call3($String[18], $str, $str_ind + 1 | 0, 62);
            if ($end_ind <= $ind) {
              throw $runtime["caml_wrap_thrown_exception"]($Not_found);
            }
            $sub_str = $caml_call3(
              $String[4],
              $str,
              $str_ind,
              ($ind - $str_ind | 0) + 1 |
                0
            );
            $match__1 = $parse($ind + 1 | 0, $end_ind);
            $fmt_rest__0 = $match__1[1];
            $match__2 = $parse($str_ind, $ind + 1 | 0);
            $sub_fmt = $match__2[1];
            $sub_format__0 = V(0, $sub_fmt, $sub_str);
            $formatting__0 = $is_open_tag
              ? V(0, $sub_format__0)
              : ($check_open_box->contents($sub_fmt) || true
               ? V(1, $sub_format__0)
               : (V(1, $sub_format__0)));
            $iF = V(0, V(18, $formatting__0, $fmt_rest__0));
            return $iF;
          }
          throw $runtime["caml_wrap_thrown_exception"]($Not_found);
        }
        catch(\Throwable $iG) {
          $iG = $caml_wrap_exception($iG);
          if ($iG === $Not_found) {
            $match = $parse($str_ind, $end_ind);
            $fmt_rest = $match[1];
            $formatting = $is_open_tag
              ? V(0, $sub_format)
              : (V(1, $sub_format));
            return V(0, V(18, $formatting, $fmt_rest));
          }
          throw $runtime["caml_wrap_thrown_exception_reraise"]($iG);
        }
      };
      $_ = $parse_after_at->contents =
        function($str_ind, $end_ind) use ($caml_string_get,$h9,$h_,$ia,$parse,$parse_good_break,$parse_magic_size,$parse_tag,$str,$unsigned_right_shift_32) {
          if ($str_ind === $end_ind) {return $h9;}
          $c = $caml_string_get($str, $str_ind);
          if (65 <= $c) {
            if (94 <= $c) {
              $switcher = $c + -123 | 0;
              if (! (2 < $unsigned_right_shift_32($switcher, 0))) {
                switch($switcher) {
                  // FALLTHROUGH
                  case 0:
                    return $parse_tag(1, $str_ind + 1 | 0, $end_ind);
                  // FALLTHROUGH
                  case 1:break;
                  // FALLTHROUGH
                  default:
                    $match__0 = $parse($str_ind + 1 | 0, $end_ind);
                    $fmt_rest__0 = $match__0[1];
                    return V(0, V(17, 1, $fmt_rest__0));
                  }
              }
            }
            else {
              if (91 <= $c) {
                $switcher__0 = $c + -91 | 0;
                switch($switcher__0) {
                  // FALLTHROUGH
                  case 0:
                    return $parse_tag(0, $str_ind + 1 | 0, $end_ind);
                  // FALLTHROUGH
                  case 1:break;
                  // FALLTHROUGH
                  default:
                    $match__1 = $parse($str_ind + 1 | 0, $end_ind);
                    $fmt_rest__1 = $match__1[1];
                    return V(0, V(17, 0, $fmt_rest__1));
                  }
              }
            }
          }
          else {
            if (10 === $c) {
              $match__2 = $parse($str_ind + 1 | 0, $end_ind);
              $fmt_rest__2 = $match__2[1];
              return V(0, V(17, 3, $fmt_rest__2));
            }
            if (32 <= $c) {
              $switcher__1 = $c + -32 | 0;
              switch($switcher__1) {
                // FALLTHROUGH
                case 0:
                  $match__3 = $parse($str_ind + 1 | 0, $end_ind);
                  $fmt_rest__3 = $match__3[1];
                  return V(0, V(17, $h_, $fmt_rest__3));
                // FALLTHROUGH
                case 5:
                  if (($str_ind + 1 | 0) < $end_ind) {
                    if (37 === $caml_string_get($str, $str_ind + 1 | 0)) {
                      $match__4 = $parse($str_ind + 2 | 0, $end_ind);
                      $fmt_rest__4 = $match__4[1];
                      return V(0, V(17, 6, $fmt_rest__4));
                    }
                  }
                  $match__5 = $parse($str_ind, $end_ind);
                  $fmt_rest__5 = $match__5[1];
                  return V(0, V(12, 64, $fmt_rest__5));
                // FALLTHROUGH
                case 12:
                  $match__6 = $parse($str_ind + 1 | 0, $end_ind);
                  $fmt_rest__6 = $match__6[1];
                  return V(0, V(17, $ia, $fmt_rest__6));
                // FALLTHROUGH
                case 14:
                  $match__7 = $parse($str_ind + 1 | 0, $end_ind);
                  $fmt_rest__7 = $match__7[1];
                  return V(0, V(17, 4, $fmt_rest__7));
                // FALLTHROUGH
                case 27:
                  return $parse_good_break($str_ind + 1 | 0, $end_ind);
                // FALLTHROUGH
                case 28:
                  return $parse_magic_size($str_ind + 1 | 0, $end_ind);
                // FALLTHROUGH
                case 31:
                  $match__8 = $parse($str_ind + 1 | 0, $end_ind);
                  $fmt_rest__8 = $match__8[1];
                  return V(0, V(17, 2, $fmt_rest__8));
                // FALLTHROUGH
                case 32:
                  $match__9 = $parse($str_ind + 1 | 0, $end_ind);
                  $fmt_rest__9 = $match__9[1];
                  return V(0, V(17, 5, $fmt_rest__9));
                }
            }
          }
          $match = $parse($str_ind + 1 | 0, $end_ind);
          $fmt_rest = $match[1];
          return V(0, V(17, V(2, $c), $fmt_rest));
        };
      $_ = $check_open_box->contents =
        function($fmt) use ($Failure,$caml_wrap_exception,$is_int,$open_box_of_string,$runtime) {
          if (! $is_int($fmt) && 11 === $fmt[0]) {
            if ($is_int($fmt[2])) {
              $str = $fmt[1];
              try {$open_box_of_string($str);$iD = 0;return $iD;}
              catch(\Throwable $iE) {
                $iE = $caml_wrap_exception($iE);
                if ($iE[1] === $Failure) {return 0;}
                throw $runtime["caml_wrap_thrown_exception_reraise"]($iE);
              }
            }
          }
          return 0;
        };
      $_ = $parse_char_set->contents =
        function($str_ind, $end_ind) use ($Pervasives,$add_in_char_set,$caml_call1,$caml_call2,$caml_string_get,$caml_trampoline,$caml_trampoline_return,$create_char_set,$failwith_message,$freeze_char_set,$ic,$rev_char_set,$str,$unexpected_end_of_format) {
          $parse_char_set_after_char__0 = new Ref();
          $parse_char_set_after_minus = new Ref();
          if ($str_ind === $end_ind) {$unexpected_end_of_format($end_ind);}
          $char_set = $create_char_set(0);
          $add_char = function($c) use ($add_in_char_set,$char_set) {
            return $add_in_char_set($char_set, $c);
          };
          $add_range = function($c__0, $c) use ($Pervasives,$add_in_char_set,$caml_call1,$char_set) {
            if (! ($c < $c__0)) {
              $i = $c__0;
              for (;;) {
                $add_in_char_set($char_set, $caml_call1($Pervasives[17], $i));
                $iC = $i + 1 | 0;
                if ($c !== $i) {$i = $iC;continue;}
                break;
              }
            }
            return 0;
          };
          $fail_single_percent = function($str_ind) use ($caml_call2,$failwith_message,$ic,$str) {
            return $caml_call2($failwith_message($ic), $str, $str_ind);
          };
          $parse_char_set_content = function($counter, $str_ind, $end_ind) use ($add_char,$caml_string_get,$caml_trampoline_return,$parse_char_set_after_char__0,$str,$unexpected_end_of_format) {
            $str_ind__0 = $str_ind;
            for (;;) {
              if ($str_ind__0 === $end_ind) {
                $unexpected_end_of_format($end_ind);
              }
              $c = $caml_string_get($str, $str_ind__0);
              if (45 === $c) {
                $add_char(45);
                $str_ind__1 = $str_ind__0 + 1 | 0;
                $str_ind__0 = $str_ind__1;
                continue;
              }
              if (93 === $c) {return $str_ind__0 + 1 | 0;}
              $iB = $str_ind__0 + 1 | 0;
              if ($counter < 50) {
                $counter__0 = $counter + 1 | 0;
                return $parse_char_set_after_char__0->contents(
                  $counter__0,
                  $iB,
                  $end_ind,
                  $c
                );
              }
              return $caml_trampoline_return(
                $parse_char_set_after_char__0->contents,
                varray[0,$iB,$end_ind,$c]
              );
            }
          };
          $_ = $parse_char_set_after_char__0->contents =
            function($counter, $str_ind, $end_ind, $c) use ($add_char,$caml_string_get,$caml_trampoline_return,$fail_single_percent,$parse_char_set_after_minus,$parse_char_set_content,$str,$unexpected_end_of_format) {
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
                      return $str_ind__0 + 1 | 0;
                    }
                    $switch__0 = 1;
                  }
                }
                else {
                  if (37 === $c__1) {$switch__0 = 0;}
                  else {
                    if (45 <= $c__1) {
                      $iA = $str_ind__0 + 1 | 0;
                      if ($counter < 50) {
                        $counter__0 = $counter + 1 | 0;
                        return $parse_char_set_after_minus->contents(
                          $counter__0,
                          $iA,
                          $end_ind,
                          $c__0
                        );
                      }
                      return $caml_trampoline_return(
                        $parse_char_set_after_minus->contents,
                        varray[0,$iA,$end_ind,$c__0]
                      );
                    }
                    $switch__0 = 1;
                  }
                }
                if (! $switch__0) {
                  if (37 === $c__0) {
                    $add_char($c__1);
                    $iz = $str_ind__0 + 1 | 0;
                    if ($counter < 50) {
                      $counter__1 = $counter + 1 | 0;
                      return $parse_char_set_content($counter__1, $iz, $end_ind);
                    }
                    return $caml_trampoline_return(
                      $parse_char_set_content,
                      varray[0,$iz,$end_ind]
                    );
                  }
                }
                if (37 === $c__0) {$fail_single_percent($str_ind__0);}
                $add_char($c__0);
                $str_ind__1 = $str_ind__0 + 1 | 0;
                $str_ind__0 = $str_ind__1;
                $c__0 = $c__1;
                continue;
              }
            };
          $_ = $parse_char_set_after_minus->contents =
            function($counter, $str_ind, $end_ind, $c) use ($add_char,$add_range,$caml_string_get,$caml_trampoline_return,$fail_single_percent,$parse_char_set_content,$str,$unexpected_end_of_format) {
              if ($str_ind === $end_ind) {
                $unexpected_end_of_format($end_ind);
              }
              $c__0 = $caml_string_get($str, $str_ind);
              if (37 === $c__0) {
                if (($str_ind + 1 | 0) === $end_ind) {$unexpected_end_of_format($end_ind);
                }
                $c__1 = $caml_string_get($str, $str_ind + 1 | 0);
                if (37 !== $c__1) {
                  if (64 !== $c__1) {return $fail_single_percent($str_ind);}
                }
                $add_range($c, $c__1);
                $ix = $str_ind + 2 | 0;
                if ($counter < 50) {
                  $counter__1 = $counter + 1 | 0;
                  return $parse_char_set_content($counter__1, $ix, $end_ind);
                }
                return $caml_trampoline_return(
                  $parse_char_set_content,
                  varray[0,$ix,$end_ind]
                );
              }
              if (93 === $c__0) {
                $add_char($c);
                $add_char(45);
                return $str_ind + 1 | 0;
              }
              $add_range($c, $c__0);
              $iy = $str_ind + 1 | 0;
              if ($counter < 50) {
                $counter__0 = $counter + 1 | 0;
                return $parse_char_set_content($counter__0, $iy, $end_ind);
              }
              return $caml_trampoline_return(
                $parse_char_set_content,
                varray[0,$iy,$end_ind]
              );
            };
          $parse_char_set_after_char = function($str_ind, $end_ind, $c) use ($caml_trampoline,$parse_char_set_after_char__0) {
            return $caml_trampoline(
              $parse_char_set_after_char__0->contents(
                0,
                $str_ind,
                $end_ind,
                $c
              )
            );
          };
          $parse_char_set_start = function($str_ind, $end_ind) use ($caml_string_get,$parse_char_set_after_char,$str,$unexpected_end_of_format) {
            if ($str_ind === $end_ind) {$unexpected_end_of_format($end_ind);}
            $c = $caml_string_get($str, $str_ind);
            return $parse_char_set_after_char($str_ind + 1 | 0, $end_ind, $c);
          };
          if ($str_ind === $end_ind) {$unexpected_end_of_format($end_ind);}
          $match = $caml_string_get($str, $str_ind);
          if (94 === $match) {
            $str_ind__0 = $str_ind + 1 | 0;
            $reverse = 1;
            $str_ind__1 = $str_ind__0;
            $reverse__0 = $reverse;
          }
          else {$iw = 0;$str_ind__1 = $str_ind;$reverse__0 = $iw;}
          $next_ind = $parse_char_set_start($str_ind__1, $end_ind);
          $char_set__0 = $freeze_char_set($char_set);
          $iv = $reverse__0 ? $rev_char_set($char_set__0) : ($char_set__0);
          return V(0, $next_ind, $iv);
        };
      $_ = $parse_spaces->contents =
        function($str_ind, $end_ind) use ($caml_string_get,$str,$unexpected_end_of_format) {
          $str_ind__0 = $str_ind;
          for (;;) {
            if ($str_ind__0 === $end_ind) {
              $unexpected_end_of_format($end_ind);
            }
            if (32 === $caml_string_get($str, $str_ind__0)) {
              $str_ind__1 = $str_ind__0 + 1 | 0;
              $str_ind__0 = $str_ind__1;
              continue;
            }
            return $str_ind__0;
          }
        };
      $_ = $parse_positive->contents =
        function($str_ind, $end_ind, $acc) use ($Sys,$caml_call3,$caml_string_get,$failwith_message,$id,$str,$unexpected_end_of_format,$unsigned_right_shift_32) {
          $str_ind__0 = $str_ind;
          $acc__0 = $acc;
          for (;;) {
            if ($str_ind__0 === $end_ind) {
              $unexpected_end_of_format($end_ind);
            }
            $c = $caml_string_get($str, $str_ind__0);
            $switcher = $c + -48 | 0;
            if (9 < $unsigned_right_shift_32($switcher, 0)) {return V(0, $str_ind__0, $acc__0);}
            $acc__1 = ($acc__0 * 10 | 0) + ($c - 48 | 0) | 0;
            if ($Sys[13] < $acc__1) {
              $iu = $Sys[13];
              return $caml_call3($failwith_message($id), $str, $acc__1, $iu);
            }
            $str_ind__1 = $str_ind__0 + 1 | 0;
            $str_ind__0 = $str_ind__1;
            $acc__0 = $acc__1;
            continue;
          }
        };
      $_ = $parse_integer->contents =
        function($str_ind, $end_ind) use ($Assert_failure,$caml_string_get,$cst_digit,$expected_character,$ie,$parse_positive,$runtime,$str,$unexpected_end_of_format,$unsigned_right_shift_32) {
          if ($str_ind === $end_ind) {$unexpected_end_of_format($end_ind);}
          $match = $caml_string_get($str, $str_ind);
          if (48 <= $match) {
            if (! (58 <= $match)) {
              return $parse_positive->contents($str_ind, $end_ind, 0);
            }
          }
          else {
            if (45 === $match) {
              if (($str_ind + 1 | 0) === $end_ind) {$unexpected_end_of_format($end_ind);
              }
              $c = $caml_string_get($str, $str_ind + 1 | 0);
              $switcher = $c + -48 | 0;
              if (9 < $unsigned_right_shift_32($switcher, 0)) {
                return $expected_character($str_ind + 1 | 0, $cst_digit, $c);
              }
              $match__0 = $parse_positive->contents(
                $str_ind + 1 |
                  0,
                $end_ind,
                0
              );
              $n = $match__0[2];
              $next_ind = $match__0[1];
              return V(0, $next_ind, - $n | 0);
            }
          }
          throw $runtime["caml_wrap_thrown_exception"](V(0, $Assert_failure, $ie));
        };
      $_ = $search_subformat_end->contents =
        function($str_ind, $end_ind, $c) use ($caml_call3,$caml_string_get,$cst_character,$cst_character__0,$expected_character,$failwith_message,$ig,$search_subformat_end,$str,$unexpected_end_of_format) {
          $str_ind__0 = $str_ind;
          for (;;) {
            if ($str_ind__0 === $end_ind) {
              $caml_call3($failwith_message($ig), $str, $c, $end_ind);
            }
            $match = $caml_string_get($str, $str_ind__0);
            if (37 === $match) {
              if (($str_ind__0 + 1 | 0) === $end_ind) {$unexpected_end_of_format($end_ind);}
              if ($caml_string_get($str, $str_ind__0 + 1 | 0) === $c) {return $str_ind__0;}
              $match__0 = $caml_string_get($str, $str_ind__0 + 1 | 0);
              if (95 <= $match__0) {
                if (123 <= $match__0) {
                  if (! (126 <= $match__0)) {
                    $switcher = $match__0 + -123 | 0;
                    switch($switcher) {
                      // FALLTHROUGH
                      case 0:
                        $sub_end = $search_subformat_end->contents(
                          $str_ind__0 + 2 |
                            0,
                          $end_ind,
                          125
                        );
                        $str_ind__2 = $sub_end + 2 | 0;
                        $str_ind__0 = $str_ind__2;
                        continue;
                      // FALLTHROUGH
                      case 1:break;
                      // FALLTHROUGH
                      default:
                        return $expected_character(
                          $str_ind__0 + 1 |
                            0,
                          $cst_character,
                          125
                        );
                      }
                  }
                }
                else {
                  if (! (96 <= $match__0)) {
                    if (($str_ind__0 + 2 | 0) === $end_ind) {$unexpected_end_of_format($end_ind);}
                    $match__1 = $caml_string_get($str, $str_ind__0 + 2 | 0);
                    if (40 === $match__1) {
                      $sub_end__0 = $search_subformat_end->contents(
                        $str_ind__0 + 3 |
                          0,
                        $end_ind,
                        41
                      );
                      $str_ind__3 = $sub_end__0 + 2 | 0;
                      $str_ind__0 = $str_ind__3;
                      continue;
                    }
                    if (123 === $match__1) {
                      $sub_end__1 = $search_subformat_end->contents(
                        $str_ind__0 + 3 |
                          0,
                        $end_ind,
                        125
                      );
                      $str_ind__4 = $sub_end__1 + 2 | 0;
                      $str_ind__0 = $str_ind__4;
                      continue;
                    }
                    $str_ind__5 = $str_ind__0 + 3 | 0;
                    $str_ind__0 = $str_ind__5;
                    continue;
                  }
                }
              }
              else {
                if (40 === $match__0) {
                  $sub_end__2 = $search_subformat_end->contents(
                    $str_ind__0 + 2 |
                      0,
                    $end_ind,
                    41
                  );
                  $str_ind__6 = $sub_end__2 + 2 | 0;
                  $str_ind__0 = $str_ind__6;
                  continue;
                }
                if (41 === $match__0) {
                  return $expected_character(
                    $str_ind__0 + 1 |
                      0,
                    $cst_character__0,
                    41
                  );
                }
              }
              $str_ind__1 = $str_ind__0 + 2 | 0;
              $str_ind__0 = $str_ind__1;
              continue;
            }
            $str_ind__7 = $str_ind__0 + 1 | 0;
            $str_ind__0 = $str_ind__7;
            continue;
          }
        };
      $_ = $is_int_base->contents =
        function($symb) use ($unsigned_right_shift_32) {
          $it = $symb + -88 | 0;
          if (! (32 < $unsigned_right_shift_32($it, 0))) {
            switch($it) {
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
      $_ = $counter_of_char->contents =
        function($symb) use ($Assert_failure,$ih,$runtime) {
          if (108 <= $symb) {
            if (! (111 <= $symb)) {
              $switcher = $symb + -108 | 0;
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
          throw $runtime["caml_wrap_thrown_exception"](V(0, $Assert_failure, $ih));
        };
      $_ = $incompatible_flag->contents =
        function($pct_ind, $str_ind, $symb, $option) use ($String,$caml_call3,$caml_call5,$failwith_message,$ik,$str) {
          $subfmt = $caml_call3(
            $String[4],
            $str,
            $pct_ind,
            $str_ind - $pct_ind | 0
          );
          return $caml_call5(
            $failwith_message($ik),
            $str,
            $pct_ind,
            $option,
            $symb,
            $subfmt
          );
        };
      $_ = $compute_int_conv->contents =
        function($pct_ind, $str_ind, $plus, $hash, $space, $symb) use ($Assert_failure,$cst__33,$cst__34,$cst__35,$cst__36,$ii,$incompatible_flag,$legacy_behavior__0,$runtime,$unsigned_right_shift_32) {
          $plus__0 = $plus;
          $hash__0 = $hash;
          $space__0 = $space;
          for (;;) {
            if (0 === $plus__0) {
              if (0 === $hash__0) {
                if (0 === $space__0) {
                  $switcher = $symb + -88 | 0;
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
              $switcher__0 = $symb + -88 | 0;
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
                throw $runtime["caml_wrap_thrown_exception"](V(0, $Assert_failure, $ii));
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
            return $incompatible_flag->contents(
              $pct_ind,
              $str_ind,
              32,
              $cst__35
            );
          }
        };
      $_ = $compute_float_conv->contents =
        function($pct_ind, $str_ind, $plus, $space, $symb) use ($Assert_failure,$cst__37,$cst__38,$cst__39,$ij,$incompatible_flag,$legacy_behavior__0,$runtime,$unsigned_right_shift_32) {
          $plus__0 = $plus;
          $space__0 = $space;
          for (;;) {
            if (0 === $plus__0) {
              if (0 === $space__0) {
                if (73 <= $symb) {
                  $switcher = $symb + -101 | 0;
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
                    $switcher__0 = $symb + -69 | 0;
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
                throw $runtime["caml_wrap_thrown_exception"](V(0, $Assert_failure, $ij));
              }
              if (73 <= $symb) {
                $switcher__1 = $symb + -101 | 0;
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
                  $switcher__2 = $symb + -69 | 0;
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
                $switcher__3 = $symb + -101 | 0;
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
                  $switcher__4 = $symb + -69 | 0;
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
            return $incompatible_flag->contents(
              $pct_ind,
              $str_ind,
              32,
              $cst__39
            );
          }
        };
      return $parse(0, $caml_ml_string_length($str));
    };
    $format_of_string_fmtty = function($str, $fmtty) use ($Type_mismatch,$caml_call2,$caml_wrap_exception,$failwith_message,$fmt_ebb_of_string,$il,$runtime,$string_of_fmtty,$type_format) {
      $match = $fmt_ebb_of_string(0, $str);
      $fmt = $match[1];
      try {$ir = V(0, $type_format($fmt, $fmtty), $str);return $ir;}
      catch(\Throwable $is) {
        $is = $caml_wrap_exception($is);
        if ($is === $Type_mismatch) {
          $iq = $string_of_fmtty($fmtty);
          return $caml_call2($failwith_message($il), $str, $iq);
        }
        throw $runtime["caml_wrap_thrown_exception_reraise"]($is);
      }
    };
    $format_of_string_format = function($str, $param) use ($Type_mismatch,$caml_call2,$caml_wrap_exception,$failwith_message,$fmt_ebb_of_string,$fmtty_of_fmt,$im,$runtime,$type_format) {
      $str__0 = $param[2];
      $fmt = $param[1];
      $match = $fmt_ebb_of_string(0, $str);
      $fmt__0 = $match[1];
      try {
        $io = V(0, $type_format($fmt__0, $fmtty_of_fmt->contents($fmt)), $str);
        return $io;
      }
      catch(\Throwable $ip) {
        $ip = $caml_wrap_exception($ip);
        if ($ip === $Type_mismatch) {
          return $caml_call2($failwith_message($im), $str, $str__0);
        }
        throw $runtime["caml_wrap_thrown_exception_reraise"]($ip);
      }
    };
    $CamlinternalFormat = V(
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
    );
    
    $runtime["caml_register_global"](
      198,
      $CamlinternalFormat,
      "CamlinternalFormat"
    );

  }
}