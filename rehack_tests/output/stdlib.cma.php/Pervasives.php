<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class Pervasives {
  <<__Override, __Memoize>>
  public static function requireModule() : Vector<dynamic> {
    $joo_global_object = \Rehack\GlobalObject::get() as dynamic;
    
    $symbol__0 = new Ref();
    $runtime = $joo_global_object->jsoo_runtime;
    $caml_blit_string = $runtime["caml_blit_string"];
    $call1 = $runtime["caml_call1"];
    $call2 = $runtime["caml_call2"];
    $caml_create_bytes = $runtime["caml_create_bytes"];
    $caml_float_of_string = $runtime["caml_float_of_string"];
    $caml_int64_float_of_bits = $runtime["caml_int64_float_of_bits"];
    $caml_int_of_string = $runtime["caml_int_of_string"];
    $caml_ml_bytes_length = $runtime["caml_ml_bytes_length"];
    $caml_ml_channel_size = $runtime["caml_ml_channel_size"];
    $caml_ml_channel_size_64 = $runtime["caml_ml_channel_size_64"];
    $caml_ml_close_channel = $runtime["caml_ml_close_channel"];
    $caml_ml_flush = $runtime["caml_ml_flush"];
    $caml_ml_input = $runtime["caml_ml_input"];
    $caml_ml_input_char = $runtime["caml_ml_input_char"];
    $caml_ml_open_descriptor_in = $runtime["caml_ml_open_descriptor_in"];
    $caml_ml_open_descriptor_out = $runtime["caml_ml_open_descriptor_out"];
    $caml_ml_output = $runtime["caml_ml_output"];
    $caml_ml_output_bytes = $runtime["caml_ml_output_bytes"];
    $caml_ml_output_char = $runtime["caml_ml_output_char"];
    $caml_ml_set_binary_mode = $runtime["caml_ml_set_binary_mode"];
    $caml_ml_set_channel_name = $runtime["caml_ml_set_channel_name"];
    $caml_ml_string_length = $runtime["caml_ml_string_length"];
    $string = $runtime["caml_new_string"];
    $caml_string_notequal = $runtime["caml_string_notequal"];
    $caml_sys_open = $runtime["caml_sys_open"];
    $caml_wrap_thrown_exception = $runtime["caml_wrap_thrown_exception"];
    $caml_wrap_thrown_exception_reraise = $runtime[
       "caml_wrap_thrown_exception_reraise"
     ];
    $cst__0 = $string("%,");
    $cst_really_input = $string("really_input");
    $cst_input = $string("input");
    $cst_output_substring = $string("output_substring");
    $cst_output = $string("output");
    $cst_12g = $string("%.12g");
    $cst = $string(".");
    $cst_false__1 = $string("false");
    $cst_true__1 = $string("true");
    $cst_false__0 = $string("false");
    $cst_true__0 = $string("true");
    $cst_bool_of_string = $string("bool_of_string");
    $cst_true = $string("true");
    $cst_false = $string("false");
    $cst_char_of_int = $string("char_of_int");
    $cst_Pervasives_Exit = $string("Pervasives.Exit");
    $End_of_file =  End_of_file::requireModule ();
    $CamlinternalFormatBasics =  CamlinternalFormatBasics::requireModule ();
    $Sys_error =  Sys_error::requireModule ();
    $Failure =  Failure::requireModule ();
    $Invalid_argument =  Invalid_argument::requireModule ();
    $l_ = Vector{0, 0, Vector{0, 6, 0}} as dynamic;
    $k_ = Vector{0, 0, Vector{0, 7, 0}} as dynamic;
    $j_ = Vector{0, 1, Vector{0, 3, Vector{0, 4, Vector{0, 6, 0}}}} as dynamic;
    $i_ = Vector{0, 1, Vector{0, 3, Vector{0, 4, Vector{0, 7, 0}}}} as dynamic;
    $g_ = Vector{0, 1} as dynamic;
    $h_ = Vector{0, 0} as dynamic;
    $a_ = Vector{255, 0, 0, 32752} as dynamic;
    $b_ = Vector{255, 0, 0, 65520} as dynamic;
    $c_ = Vector{255, 1, 0, 32752} as dynamic;
    $d_ = Vector{255, 16777215, 16777215, 32751} as dynamic;
    $e_ = Vector{255, 0, 0, 16} as dynamic;
    $f_ = Vector{255, 0, 0, 15536} as dynamic;
    $failwith = (dynamic $s) ==> {
      throw $caml_wrap_thrown_exception(Vector{0, $Failure, $s}) as \Throwable;
    };
    $invalid_arg = (dynamic $s) ==> {
      throw $caml_wrap_thrown_exception(Vector{0, $Invalid_argument, $s}) as \Throwable;
    };
    $Exit = Vector{248, $cst_Pervasives_Exit, $runtime["caml_fresh_oo_id"](0)} as dynamic;
    $min = (dynamic $x, dynamic $y) ==> {
      return $runtime["caml_lessequal"]($x, $y) ? $x : ($y);
    };
    $max = (dynamic $x, dynamic $y) ==> {
      return $runtime["caml_greaterequal"]($x, $y) ? $x : ($y);
    };
    $abs = (dynamic $x) ==> {return 0 <= $x ? $x : ((int) - $x);};
    $lnot = (dynamic $x) ==> {return $x ^ -1;};
    $infinity = $caml_int64_float_of_bits($a_);
    $neg_infinity = $caml_int64_float_of_bits($b_);
    $nan = $caml_int64_float_of_bits($c_);
    $max_float = $caml_int64_float_of_bits($d_);
    $min_float = $caml_int64_float_of_bits($e_);
    $epsilon_float = $caml_int64_float_of_bits($f_);
    $max_int = 2147483647 as dynamic;
    $min_int = -2147483648 as dynamic;
    $symbol = (dynamic $s1, dynamic $s2) ==> {
      $l1 = $caml_ml_string_length($s1);
      $l2 = $caml_ml_string_length($s2);
      $s = $caml_create_bytes((int) ($l1 + $l2));
      $caml_blit_string($s1, 0, $s, 0, $l1);
      $caml_blit_string($s2, 0, $s, $l1, $l2);
      return $s;
    };
    $char_of_int = (dynamic $n) ==> {
      if (0 <= $n) {if (! (255 < $n)) {return $n;}}
      return $invalid_arg($cst_char_of_int);
    };
    $string_of_bool = (dynamic $b) ==> {return $b ? $cst_true : ($cst_false);};
    $bool_of_string = (dynamic $param) ==> {
      return $caml_string_notequal($param, $cst_false__0)
        ? $caml_string_notequal($param, $cst_true__0)
         ? $invalid_arg($cst_bool_of_string)
         : (1)
        : (0);
    };
    $bool_of_string_opt = (dynamic $param) ==> {
      return $caml_string_notequal($param, $cst_false__1)
        ? $caml_string_notequal($param, $cst_true__1) ? 0 : ($g_)
        : ($h_);
    };
    $string_of_int = (dynamic $n) ==> {return $string("" . $n);};
    $int_of_string_opt = (dynamic $s) ==> {
      try {$ay_ = Vector{0, $caml_int_of_string($s)} as dynamic;return $ay_;}
      catch(\Throwable $az_) {
        $az_ = $runtime["caml_wrap_exception"]($az_);
        if ($az_[1] === $Failure) {return 0;}
        throw $caml_wrap_thrown_exception_reraise($az_) as \Throwable;
      }
    };
    $valid_float_lexem = (dynamic $s) ==> {
      $l = $caml_ml_string_length($s);
      $loop = (dynamic $i) ==> {
        $i__0 = $i;
        for (;;) {
          if ($l <= $i__0) {return $symbol($s, $cst);}
          $match = $runtime["caml_string_get"]($s, $i__0);
          $switch__0 = 48 <= $match
            ? 58 <= $match ? 0 : (1)
            : (45 === $match ? 1 : (0));
          if ($switch__0) {
            $i__1 = (int) ($i__0 + 1) as dynamic;
            $i__0 = $i__1;
            continue;
          }
          return $s;
        }
      };
      return $loop(0);
    };
    $string_of_float = (dynamic $f) ==> {
      return $valid_float_lexem($runtime["caml_format_float"]($cst_12g, $f));
    };
    $float_of_string_opt = (dynamic $s) ==> {
      try {$aw_ = Vector{0, $caml_float_of_string($s)} as dynamic;return $aw_;
      }
      catch(\Throwable $ax_) {
        $ax_ = $runtime["caml_wrap_exception"]($ax_);
        if ($ax_[1] === $Failure) {return 0;}
        throw $caml_wrap_thrown_exception_reraise($ax_) as \Throwable;
      }
    };
    $symbol__0->contents = (dynamic $l1, dynamic $l2) ==> {
      if ($l1) {
        $tl = $l1[2];
        $hd = $l1[1];
        return Vector{0, $hd, $symbol__0->contents($tl, $l2)};
      }
      return $l2;
    };
    $stdin = $caml_ml_open_descriptor_in(0);
    $stdout = $caml_ml_open_descriptor_out(1);
    $stderr = $caml_ml_open_descriptor_out(2);
    $open_out_gen = (dynamic $mode, dynamic $perm, dynamic $name) ==> {
      $c = $caml_ml_open_descriptor_out($caml_sys_open($name, $mode, $perm));
      $caml_ml_set_channel_name($c, $name);
      return $c;
    };
    $open_out = (dynamic $name) ==> {return $open_out_gen($i_, 438, $name);};
    $open_out_bin = (dynamic $name) ==> {
      return $open_out_gen($j_, 438, $name);
    };
    $flush_all = (dynamic $param) ==> {
      $iter = (dynamic $param) ==> {
        $param__0 = $param;
        for (;;) {
          if ($param__0) {
            $l = $param__0[2];
            $a = $param__0[1];
            try {$caml_ml_flush($a);}
            catch(\Throwable $av_) {
              $av_ = $runtime["caml_wrap_exception"]($av_);
              if ($av_[1] !== $Sys_error) {
                throw $caml_wrap_thrown_exception_reraise($av_) as \Throwable;
              }
            }
            $param__0 = $l;
            continue;
          }
          return 0;
        }
      };
      return $iter($runtime["caml_ml_out_channels_list"](0));
    };
    $output_bytes = (dynamic $oc, dynamic $s) ==> {
      return $caml_ml_output_bytes($oc, $s, 0, $caml_ml_bytes_length($s));
    };
    $output_string = (dynamic $oc, dynamic $s) ==> {
      return $caml_ml_output($oc, $s, 0, $caml_ml_string_length($s));
    };
    $output = (dynamic $oc, dynamic $s, dynamic $ofs, dynamic $len) ==> {
      if (0 <= $ofs) {
        if (0 <= $len) {
          if (! ((int) ($caml_ml_bytes_length($s) - $len) < $ofs)) {return $caml_ml_output_bytes($oc, $s, $ofs, $len);}
        }
      }
      return $invalid_arg($cst_output);
    };
    $output_substring = (dynamic $oc, dynamic $s, dynamic $ofs, dynamic $len) ==> {
      if (0 <= $ofs) {
        if (0 <= $len) {
          if (! ((int) ($caml_ml_string_length($s) - $len) < $ofs)) {return $caml_ml_output($oc, $s, $ofs, $len);}
        }
      }
      return $invalid_arg($cst_output_substring);
    };
    $output_value = (dynamic $chan, dynamic $v) ==> {
      return $runtime["caml_output_value"]($chan, $v, 0);
    };
    $close_out = (dynamic $oc) ==> {
      $caml_ml_flush($oc);
      return $caml_ml_close_channel($oc);
    };
    $close_out_noerr = (dynamic $oc) ==> {
      try {$caml_ml_flush($oc);}catch(\Throwable $au_) {}
      try {$as_ = $caml_ml_close_channel($oc);return $as_;}
      catch(\Throwable $at_) {return 0;}
    };
    $open_in_gen = (dynamic $mode, dynamic $perm, dynamic $name) ==> {
      $c = $caml_ml_open_descriptor_in($caml_sys_open($name, $mode, $perm));
      $caml_ml_set_channel_name($c, $name);
      return $c;
    };
    $open_in = (dynamic $name) ==> {return $open_in_gen($k_, 0, $name);};
    $open_in_bin = (dynamic $name) ==> {return $open_in_gen($l_, 0, $name);};
    $input = (dynamic $ic, dynamic $s, dynamic $ofs, dynamic $len) ==> {
      if (0 <= $ofs) {
        if (0 <= $len) {
          if (! ((int) ($caml_ml_bytes_length($s) - $len) < $ofs)) {return $caml_ml_input($ic, $s, $ofs, $len);}
        }
      }
      return $invalid_arg($cst_input);
    };
    $unsafe_really_input = 
    (dynamic $ic, dynamic $s, dynamic $ofs, dynamic $len) ==> {
      $ofs__0 = $ofs;
      $len__0 = $len;
      for (;;) {
        if (0 < $len__0) {
          $r = $caml_ml_input($ic, $s, $ofs__0, $len__0);
          if (0 === $r) {
            throw $caml_wrap_thrown_exception($End_of_file) as \Throwable;
          }
          $len__1 = (int) ($len__0 - $r) as dynamic;
          $ofs__1 = (int) ($ofs__0 + $r) as dynamic;
          $ofs__0 = $ofs__1;
          $len__0 = $len__1;
          continue;
        }
        return 0;
      }
    };
    $really_input = (dynamic $ic, dynamic $s, dynamic $ofs, dynamic $len) ==> {
      if (0 <= $ofs) {
        if (0 <= $len) {
          if (! ((int) ($caml_ml_bytes_length($s) - $len) < $ofs)) {return $unsafe_really_input($ic, $s, $ofs, $len);}
        }
      }
      return $invalid_arg($cst_really_input);
    };
    $really_input_string = (dynamic $ic, dynamic $len) ==> {
      $s = $caml_create_bytes($len);
      $really_input($ic, $s, 0, $len);
      return $s;
    };
    $input_line = (dynamic $chan) ==> {
      $build_result = (dynamic $buf, dynamic $pos, dynamic $param) ==> {
        $pos__0 = $pos;
        $param__0 = $param;
        for (;;) {
          if ($param__0) {
            $param__1 = $param__0[2];
            $hd = $param__0[1];
            $len = $caml_ml_bytes_length($hd);
            $runtime["caml_blit_bytes"](
              $hd,
              0,
              $buf,
              (int)
              ($pos__0 - $len),
              $len
            );
            $pos__1 = (int) ($pos__0 - $len) as dynamic;
            $pos__0 = $pos__1;
            $param__0 = $param__1;
            continue;
          }
          return $buf;
        }
      };
      $scan = (dynamic $accu, dynamic $len) ==> {
        $accu__0 = $accu;
        $len__0 = $len;
        for (;;) {
          $n = $runtime["caml_ml_input_scan_line"]($chan);
          if (0 === $n) {
            if ($accu__0) {
              return $build_result(
                $caml_create_bytes($len__0),
                $len__0,
                $accu__0
              );
            }
            throw $caml_wrap_thrown_exception($End_of_file) as \Throwable;
          }
          if (0 < $n) {
            $res = $caml_create_bytes((int) ($n + -1));
            $caml_ml_input($chan, $res, 0, (int) ($n + -1));
            $caml_ml_input_char($chan);
            if ($accu__0) {
              $len__1 = (int) ((int) ($len__0 + $n) + -1) as dynamic;
              return $build_result(
                $caml_create_bytes($len__1),
                $len__1,
                Vector{0, $res, $accu__0}
              );
            }
            return $res;
          }
          $beg = $caml_create_bytes((int) - $n);
          $caml_ml_input($chan, $beg, 0, (int) - $n);
          $len__2 = (int) ($len__0 - $n) as dynamic;
          $accu__1 = Vector{0, $beg, $accu__0} as dynamic;
          $accu__0 = $accu__1;
          $len__0 = $len__2;
          continue;
        }
      };
      return $scan(0, 0);
    };
    $close_in_noerr = (dynamic $ic) ==> {
      try {$aq_ = $caml_ml_close_channel($ic);return $aq_;}
      catch(\Throwable $ar_) {return 0;}
    };
    $print_char = (dynamic $c) ==> {return $caml_ml_output_char($stdout, $c);};
    $print_string = (dynamic $s) ==> {return $output_string($stdout, $s);};
    $print_bytes = (dynamic $s) ==> {return $output_bytes($stdout, $s);};
    $print_int = (dynamic $i) ==> {
      return $output_string($stdout, $string_of_int($i));
    };
    $print_float = (dynamic $f) ==> {
      return $output_string($stdout, $string_of_float($f));
    };
    $print_endline = (dynamic $s) ==> {
      $output_string($stdout, $s);
      $caml_ml_output_char($stdout, 10);
      return $caml_ml_flush($stdout);
    };
    $print_newline = (dynamic $param) ==> {
      $caml_ml_output_char($stdout, 10);
      return $caml_ml_flush($stdout);
    };
    $prerr_char = (dynamic $c) ==> {return $caml_ml_output_char($stderr, $c);};
    $prerr_string = (dynamic $s) ==> {return $output_string($stderr, $s);};
    $prerr_bytes = (dynamic $s) ==> {return $output_bytes($stderr, $s);};
    $prerr_int = (dynamic $i) ==> {
      return $output_string($stderr, $string_of_int($i));
    };
    $prerr_float = (dynamic $f) ==> {
      return $output_string($stderr, $string_of_float($f));
    };
    $prerr_endline = (dynamic $s) ==> {
      $output_string($stderr, $s);
      $caml_ml_output_char($stderr, 10);
      return $caml_ml_flush($stderr);
    };
    $prerr_newline = (dynamic $param) ==> {
      $caml_ml_output_char($stderr, 10);
      return $caml_ml_flush($stderr);
    };
    $read_line = (dynamic $param) ==> {
      $caml_ml_flush($stdout);
      return $input_line($stdin);
    };
    $read_int = (dynamic $param) ==> {
      return $caml_int_of_string($read_line(0));
    };
    $read_int_opt = (dynamic $param) ==> {
      return $int_of_string_opt($read_line(0));
    };
    $read_float = (dynamic $param) ==> {
      return $caml_float_of_string($read_line(0));
    };
    $read_float_opt = (dynamic $param) ==> {
      return $float_of_string_opt($read_line(0));
    };
    $string_of_format = (dynamic $param) ==> {$str = $param[2];return $str;};
    $symbol__1 = (dynamic $param, dynamic $ao_) ==> {
      $str2 = $ao_[2];
      $fmt2 = $ao_[1];
      $str1 = $param[2];
      $fmt1 = $param[1];
      $ap_ = $symbol($str1, $symbol($cst__0, $str2));
      return Vector{
        0,
        $call2($CamlinternalFormatBasics[3], $fmt1, $fmt2),
        $ap_
      };
    };
    $exit_function = Vector{0, $flush_all} as dynamic;
    $at_exit = (dynamic $f) ==> {
      $g = $exit_function[1];
      $exit_function[1] =
        (dynamic $param) ==> {$call1($f, 0);return $call1($g, 0);};
      return 0;
    };
    $do_at_exit = (dynamic $param) ==> {return $call1($exit_function[1], 0);};
    $exit = (dynamic $retcode) ==> {
      $do_at_exit(0);
      return $runtime["caml_sys_exit"]($retcode);
    };
    $m_ = (dynamic $an_) ==> {return $caml_ml_channel_size_64($an_);};
    $n_ = (dynamic $am_) ==> {return $runtime["caml_ml_pos_in_64"]($am_);};
    $o_ = (dynamic $al_, dynamic $ak_) ==> {
      return $runtime["caml_ml_seek_in_64"]($al_, $ak_);
    };
    $p_ = (dynamic $aj_) ==> {return $caml_ml_channel_size_64($aj_);};
    $q_ = (dynamic $ai_) ==> {return $runtime["caml_ml_pos_out_64"]($ai_);};
    $r_ = Vector{
      0,
      (dynamic $ah_, dynamic $ag_) ==> {
        return $runtime["caml_ml_seek_out_64"]($ah_, $ag_);
      },
      $q_,
      $p_,
      $o_,
      $n_,
      $m_
    } as dynamic;
    $s_ = (dynamic $af_, dynamic $ae_) ==> {
      return $caml_ml_set_binary_mode($af_, $ae_);
    };
    $t_ = (dynamic $ad_) ==> {return $caml_ml_close_channel($ad_);};
    $u_ = (dynamic $ac_) ==> {return $caml_ml_channel_size($ac_);};
    $v_ = (dynamic $ab_) ==> {return $runtime["caml_ml_pos_in"]($ab_);};
    $w_ = (dynamic $aa_, dynamic $Z_) ==> {
      return $runtime["caml_ml_seek_in"]($aa_, $Z_);
    };
    $x_ = (dynamic $Y_) ==> {return $runtime["caml_input_value"]($Y_);};
    $y_ = (dynamic $X_) ==> {return $runtime["caml_ml_input_int"]($X_);};
    $z_ = (dynamic $W_) ==> {return $caml_ml_input_char($W_);};
    $A_ = (dynamic $V_) ==> {return $caml_ml_input_char($V_);};
    $B_ = (dynamic $U_, dynamic $T_) ==> {
      return $caml_ml_set_binary_mode($U_, $T_);
    };
    $C_ = (dynamic $S_) ==> {return $caml_ml_channel_size($S_);};
    $D_ = (dynamic $R_) ==> {return $runtime["caml_ml_pos_out"]($R_);};
    $E_ = (dynamic $Q_, dynamic $P_) ==> {
      return $runtime["caml_ml_seek_out"]($Q_, $P_);
    };
    $F_ = (dynamic $O_, dynamic $N_) ==> {
      return $runtime["caml_ml_output_int"]($O_, $N_);
    };
    $G_ = (dynamic $M_, dynamic $L_) ==> {
      return $caml_ml_output_char($M_, $L_);
    };
    $H_ = (dynamic $K_, dynamic $J_) ==> {
      return $caml_ml_output_char($K_, $J_);
    };
    $Pervasives = Vector{
      0,
      $invalid_arg,
      $failwith,
      $Exit,
      $min,
      $max,
      $abs,
      $max_int,
      $min_int,
      $lnot,
      $infinity,
      $neg_infinity,
      $nan,
      $max_float,
      $min_float,
      $epsilon_float,
      $symbol,
      $char_of_int,
      $string_of_bool,
      $bool_of_string,
      $bool_of_string_opt,
      $string_of_int,
      $int_of_string_opt,
      $string_of_float,
      $float_of_string_opt,
      $symbol__0->contents,
      $stdin,
      $stdout,
      $stderr,
      $print_char,
      $print_string,
      $print_bytes,
      $print_int,
      $print_float,
      $print_endline,
      $print_newline,
      $prerr_char,
      $prerr_string,
      $prerr_bytes,
      $prerr_int,
      $prerr_float,
      $prerr_endline,
      $prerr_newline,
      $read_line,
      $read_int,
      $read_int_opt,
      $read_float,
      $read_float_opt,
      $open_out,
      $open_out_bin,
      $open_out_gen,
      (dynamic $I_) ==> {return $caml_ml_flush($I_);},
      $flush_all,
      $H_,
      $output_string,
      $output_bytes,
      $output,
      $output_substring,
      $G_,
      $F_,
      $output_value,
      $E_,
      $D_,
      $C_,
      $close_out,
      $close_out_noerr,
      $B_,
      $open_in,
      $open_in_bin,
      $open_in_gen,
      $A_,
      $input_line,
      $input,
      $really_input,
      $really_input_string,
      $z_,
      $y_,
      $x_,
      $w_,
      $v_,
      $u_,
      $t_,
      $close_in_noerr,
      $s_,
      $r_,
      $string_of_format,
      $symbol__1,
      $exit,
      $at_exit,
      $valid_float_lexem,
      $unsafe_really_input,
      $do_at_exit
    } as dynamic;
    
     return ($Pervasives);

  }
  public static function invalid_arg(dynamic $s): dynamic {
    return static::callRehackFunction(static::requireModule()[1], varray[$s]);
  }
  public static function failwith(dynamic $s): dynamic {
    return static::callRehackFunction(static::requireModule()[2], varray[$s]);
  }
  public static function min(dynamic $x, dynamic $y): dynamic {
    return static::callRehackFunction(static::requireModule()[4], varray[$x, $y]);
  }
  public static function max(dynamic $x, dynamic $y): dynamic {
    return static::callRehackFunction(static::requireModule()[5], varray[$x, $y]);
  }
  public static function abs(dynamic $x): dynamic {
    return static::callRehackFunction(static::requireModule()[6], varray[$x]);
  }
  public static function lnot(dynamic $x): dynamic {
    return static::callRehackFunction(static::requireModule()[9], varray[$x]);
  }
  public static function symbol(dynamic $s1, dynamic $s2): dynamic {
    return static::callRehackFunction(static::requireModule()[16], varray[$s1, $s2]);
  }
  public static function char_of_int(dynamic $n): dynamic {
    return static::callRehackFunction(static::requireModule()[17], varray[$n]);
  }
  public static function string_of_bool(dynamic $b): dynamic {
    return static::callRehackFunction(static::requireModule()[18], varray[$b]);
  }
  public static function bool_of_string(dynamic $param): dynamic {
    return static::callRehackFunction(static::requireModule()[19], varray[$param]);
  }
  public static function bool_of_string_opt(dynamic $param): dynamic {
    return static::callRehackFunction(static::requireModule()[20], varray[$param]);
  }
  public static function string_of_int(dynamic $n): dynamic {
    return static::callRehackFunction(static::requireModule()[21], varray[$n]);
  }
  public static function int_of_string_opt(dynamic $s): dynamic {
    return static::callRehackFunction(static::requireModule()[22], varray[$s]);
  }
  public static function string_of_float(dynamic $f): dynamic {
    return static::callRehackFunction(static::requireModule()[23], varray[$f]);
  }
  public static function float_of_string_opt(dynamic $s): dynamic {
    return static::callRehackFunction(static::requireModule()[24], varray[$s]);
  }
  public static function _print_char_(dynamic $c): dynamic {
    return static::callRehackFunction(static::requireModule()[29], varray[$c]);
  }
  public static function print_string(dynamic $s): dynamic {
    return static::callRehackFunction(static::requireModule()[30], varray[$s]);
  }
  public static function print_bytes(dynamic $s): dynamic {
    return static::callRehackFunction(static::requireModule()[31], varray[$s]);
  }
  public static function _print_int_(dynamic $i): dynamic {
    return static::callRehackFunction(static::requireModule()[32], varray[$i]);
  }
  public static function _print_float_(dynamic $f): dynamic {
    return static::callRehackFunction(static::requireModule()[33], varray[$f]);
  }
  public static function print_endline(dynamic $s): dynamic {
    return static::callRehackFunction(static::requireModule()[34], varray[$s]);
  }
  public static function print_newline(dynamic $param): dynamic {
    return static::callRehackFunction(static::requireModule()[35], varray[$param]);
  }
  public static function _prerr_char_(dynamic $c): dynamic {
    return static::callRehackFunction(static::requireModule()[36], varray[$c]);
  }
  public static function prerr_string(dynamic $s): dynamic {
    return static::callRehackFunction(static::requireModule()[37], varray[$s]);
  }
  public static function prerr_bytes(dynamic $s): dynamic {
    return static::callRehackFunction(static::requireModule()[38], varray[$s]);
  }
  public static function _prerr_int_(dynamic $i): dynamic {
    return static::callRehackFunction(static::requireModule()[39], varray[$i]);
  }
  public static function _prerr_float_(dynamic $f): dynamic {
    return static::callRehackFunction(static::requireModule()[40], varray[$f]);
  }
  public static function prerr_endline(dynamic $s): dynamic {
    return static::callRehackFunction(static::requireModule()[41], varray[$s]);
  }
  public static function prerr_newline(dynamic $param): dynamic {
    return static::callRehackFunction(static::requireModule()[42], varray[$param]);
  }
  public static function read_line(dynamic $param): dynamic {
    return static::callRehackFunction(static::requireModule()[43], varray[$param]);
  }
  public static function _read_int_(dynamic $param): dynamic {
    return static::callRehackFunction(static::requireModule()[44], varray[$param]);
  }
  public static function read_int_opt(dynamic $param): dynamic {
    return static::callRehackFunction(static::requireModule()[45], varray[$param]);
  }
  public static function _read_float_(dynamic $param): dynamic {
    return static::callRehackFunction(static::requireModule()[46], varray[$param]);
  }
  public static function read_float_opt(dynamic $param): dynamic {
    return static::callRehackFunction(static::requireModule()[47], varray[$param]);
  }
  public static function open_out(dynamic $name): dynamic {
    return static::callRehackFunction(static::requireModule()[48], varray[$name]);
  }
  public static function open_out_bin(dynamic $name): dynamic {
    return static::callRehackFunction(static::requireModule()[49], varray[$name]);
  }
  public static function open_out_gen(dynamic $mode, dynamic $perm, dynamic $name): dynamic {
    return static::callRehackFunction(static::requireModule()[50], varray[$mode, $perm, $name]);
  }
  public static function flush_all(dynamic $param): dynamic {
    return static::callRehackFunction(static::requireModule()[52], varray[$param]);
  }
  public static function output_string(dynamic $oc, dynamic $s): dynamic {
    return static::callRehackFunction(static::requireModule()[54], varray[$oc, $s]);
  }
  public static function output_bytes(dynamic $oc, dynamic $s): dynamic {
    return static::callRehackFunction(static::requireModule()[55], varray[$oc, $s]);
  }
  public static function output(dynamic $oc, dynamic $s, dynamic $ofs, dynamic $len): dynamic {
    return static::callRehackFunction(static::requireModule()[56], varray[$oc, $s, $ofs, $len]);
  }
  public static function output_substring(dynamic $oc, dynamic $s, dynamic $ofs, dynamic $len): dynamic {
    return static::callRehackFunction(static::requireModule()[57], varray[$oc, $s, $ofs, $len]);
  }
  public static function output_value(dynamic $chan, dynamic $v): dynamic {
    return static::callRehackFunction(static::requireModule()[60], varray[$chan, $v]);
  }
  public static function close_out(dynamic $oc): dynamic {
    return static::callRehackFunction(static::requireModule()[64], varray[$oc]);
  }
  public static function close_out_noerr(dynamic $oc): dynamic {
    return static::callRehackFunction(static::requireModule()[65], varray[$oc]);
  }
  public static function _open_in_(dynamic $name): dynamic {
    return static::callRehackFunction(static::requireModule()[67], varray[$name]);
  }
  public static function open_in_bin(dynamic $name): dynamic {
    return static::callRehackFunction(static::requireModule()[68], varray[$name]);
  }
  public static function open_in_gen(dynamic $mode, dynamic $perm, dynamic $name): dynamic {
    return static::callRehackFunction(static::requireModule()[69], varray[$mode, $perm, $name]);
  }
  public static function input_line(dynamic $chan): dynamic {
    return static::callRehackFunction(static::requireModule()[71], varray[$chan]);
  }
  public static function input(dynamic $ic, dynamic $s, dynamic $ofs, dynamic $len): dynamic {
    return static::callRehackFunction(static::requireModule()[72], varray[$ic, $s, $ofs, $len]);
  }
  public static function really_input(dynamic $ic, dynamic $s, dynamic $ofs, dynamic $len): dynamic {
    return static::callRehackFunction(static::requireModule()[73], varray[$ic, $s, $ofs, $len]);
  }
  public static function really_input_string(dynamic $ic, dynamic $len): dynamic {
    return static::callRehackFunction(static::requireModule()[74], varray[$ic, $len]);
  }
  public static function close_in_noerr(dynamic $ic): dynamic {
    return static::callRehackFunction(static::requireModule()[82], varray[$ic]);
  }
  public static function string_of_format(dynamic $param): dynamic {
    return static::callRehackFunction(static::requireModule()[85], varray[$param]);
  }
  public static function at_exit(dynamic $f): dynamic {
    return static::callRehackFunction(static::requireModule()[88], varray[$f]);
  }
  public static function valid_float_lexem(dynamic $s): dynamic {
    return static::callRehackFunction(static::requireModule()[89], varray[$s]);
  }
  public static function unsafe_really_input(dynamic $ic, dynamic $s, dynamic $ofs, dynamic $len): dynamic {
    return static::callRehackFunction(static::requireModule()[90], varray[$ic, $s, $ofs, $len]);
  }
  public static function do_at_exit(dynamic $param): dynamic {
    return static::callRehackFunction(static::requireModule()[91], varray[$param]);
  }

}
/* Hashing disabled */
