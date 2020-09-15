<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class Stdlib {
  <<__Override, __Memoize>>
  public static function get() : Vector<dynamic> {
    
    $symbol__0 = new Ref();
    $runtime = (\Rehack\GlobalObject::get() as dynamic)->jsoo_runtime;
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
    $caml_string_of_bytes = $runtime["caml_string_of_bytes"];
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
    $cst_Stdlib_Exit = $string("Stdlib.Exit");
    $CamlinternalFormatBasics = CamlinternalFormatBasics::get();
    $Invalid_argument = Invalid_argument::get();
    $Failure = Failure::get();
    $Match_failure = Match_failure::get();
    $Assert_failure = Assert_failure::get();
    $Not_found = Not_found::get();
    $Out_of_memory = Out_of_memory::get();
    $Stack_overflow = Stack_overflow::get();
    $Sys_error = Sys_error::get();
    $End_of_file = End_of_file::get();
    $Division_by_zero = Division_by_zero::get();
    $Sys_blocked_io = Sys_blocked_io::get();
    $Undefined_recursive_module = Undefined_recursive_module::get();
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
    $failwith = (dynamic $s) : dynamic ==> {
      throw $caml_wrap_thrown_exception(Vector{0, $Failure, $s}) as \Throwable;
    };
    $invalid_arg = (dynamic $s) : dynamic ==> {
      throw $caml_wrap_thrown_exception(Vector{0, $Invalid_argument, $s}) as \Throwable;
    };
    $Exit = Vector{248, $cst_Stdlib_Exit, $runtime["caml_fresh_oo_id"](0)} as dynamic;
    $min = (dynamic $x, dynamic $y) : dynamic ==> {
      return $runtime["caml_lessequal"]($x, $y) ? $x : ($y);
    };
    $max = (dynamic $x, dynamic $y) : dynamic ==> {
      return $runtime["caml_greaterequal"]($x, $y) ? $x : ($y);
    };
    $abs = (dynamic $x) : dynamic ==> {return 0 <= $x ? $x : ((int) - $x);};
    $lnot = (dynamic $x) : dynamic ==> {return $x ^ -1;};
    $infinity = $caml_int64_float_of_bits($a_);
    $neg_infinity = $caml_int64_float_of_bits($b_);
    $nan = $caml_int64_float_of_bits($c_);
    $max_float = $caml_int64_float_of_bits($d_);
    $min_float = $caml_int64_float_of_bits($e_);
    $epsilon_float = $caml_int64_float_of_bits($f_);
    $max_int = 2147483647 as dynamic;
    $min_int = -2147483648 as dynamic;
    $symbol = (dynamic $s1, dynamic $s2) : dynamic ==> {
      $l1 = $caml_ml_string_length($s1);
      $l2 = $caml_ml_string_length($s2);
      $s = $caml_create_bytes((int) ($l1 + $l2));
      $caml_blit_string($s1, 0, $s, 0, $l1);
      $caml_blit_string($s2, 0, $s, $l1, $l2);
      return $caml_string_of_bytes($s);
    };
    $char_of_int = (dynamic $n) : dynamic ==> {
      if (0 <= $n) {if (! (255 < $n)) {return $n;}}
      return $invalid_arg($cst_char_of_int);
    };
    $string_of_bool = (dynamic $b) : dynamic ==> {
      return $b ? $cst_true : ($cst_false);
    };
    $bool_of_string = (dynamic $param) : dynamic ==> {
      return $caml_string_notequal($param, $cst_false__0)
        ? $caml_string_notequal($param, $cst_true__0)
         ? $invalid_arg($cst_bool_of_string)
         : (1)
        : (0);
    };
    $bool_of_string_opt = (dynamic $param) : dynamic ==> {
      return $caml_string_notequal($param, $cst_false__1)
        ? $caml_string_notequal($param, $cst_true__1) ? 0 : ($g_)
        : ($h_);
    };
    $string_of_int = (dynamic $n) : dynamic ==> {return $string((string) $n);};
    $int_of_string_opt = (dynamic $s) : dynamic ==> {
      $ay_ = null as dynamic;
      try {$ay_ = Vector{0, $caml_int_of_string($s)} as dynamic;return $ay_;}
      catch(\Throwable $az_) {
        $az_ = $runtime["caml_wrap_exception"]($az_);
        if ($az_[1] === $Failure) {return 0;}
        throw $caml_wrap_thrown_exception_reraise($az_) as \Throwable;
      }
    };
    $valid_float_lexem = (dynamic $s) : dynamic ==> {
      $l = $caml_ml_string_length($s);
      $loop = (dynamic $i) : dynamic ==> {
        $i__1 = null as dynamic;
        $match = null as dynamic;
        $switch__0 = null as dynamic;
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
    $string_of_float = (dynamic $f) : dynamic ==> {
      return $valid_float_lexem($runtime["caml_format_float"]($cst_12g, $f));
    };
    $float_of_string_opt = (dynamic $s) : dynamic ==> {
      $aw_ = null as dynamic;
      try {$aw_ = Vector{0, $caml_float_of_string($s)} as dynamic;return $aw_;
      }
      catch(\Throwable $ax_) {
        $ax_ = $runtime["caml_wrap_exception"]($ax_);
        if ($ax_[1] === $Failure) {return 0;}
        throw $caml_wrap_thrown_exception_reraise($ax_) as \Throwable;
      }
    };
    $symbol__0->contents = (dynamic $l1, dynamic $l2) : dynamic ==> {
      $hd = null as dynamic;
      $tl = null as dynamic;
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
    $open_out_gen = (dynamic $mode, dynamic $perm, dynamic $name) : dynamic ==> {
      $c = $caml_ml_open_descriptor_out($caml_sys_open($name, $mode, $perm));
      $caml_ml_set_channel_name($c, $name);
      return $c;
    };
    $open_out = (dynamic $name) : dynamic ==> {
      return $open_out_gen($i_, 438, $name);
    };
    $open_out_bin = (dynamic $name) : dynamic ==> {
      return $open_out_gen($j_, 438, $name);
    };
    $flush_all = (dynamic $param) : dynamic ==> {
      $iter = (dynamic $param) : dynamic ==> {
        $a = null as dynamic;
        $l = null as dynamic;
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
    $output_bytes = (dynamic $oc, dynamic $s) : dynamic ==> {
      return $caml_ml_output_bytes($oc, $s, 0, $caml_ml_bytes_length($s));
    };
    $output_string = (dynamic $oc, dynamic $s) : dynamic ==> {
      return $caml_ml_output($oc, $s, 0, $caml_ml_string_length($s));
    };
    $output = (dynamic $oc, dynamic $s, dynamic $ofs, dynamic $len) : dynamic ==> {
      if (0 <= $ofs) {
        if (0 <= $len) {
          if (! ((int) ($caml_ml_bytes_length($s) - $len) < $ofs)) {return $caml_ml_output_bytes($oc, $s, $ofs, $len);}
        }
      }
      return $invalid_arg($cst_output);
    };
    $output_substring = (dynamic $oc, dynamic $s, dynamic $ofs, dynamic $len) : dynamic ==> {
      if (0 <= $ofs) {
        if (0 <= $len) {
          if (! ((int) ($caml_ml_string_length($s) - $len) < $ofs)) {return $caml_ml_output($oc, $s, $ofs, $len);}
        }
      }
      return $invalid_arg($cst_output_substring);
    };
    $output_value = (dynamic $chan, dynamic $v) : dynamic ==> {
      return $runtime["caml_output_value"]($chan, $v, 0);
    };
    $close_out = (dynamic $oc) : dynamic ==> {
      $caml_ml_flush($oc);
      return $caml_ml_close_channel($oc);
    };
    $close_out_noerr = (dynamic $oc) : dynamic ==> {
      $as_ = null as dynamic;
      try {$caml_ml_flush($oc);}catch(\Throwable $au_) {}
      try {$as_ = $caml_ml_close_channel($oc);return $as_;}
      catch(\Throwable $at_) {return 0;}
    };
    $open_in_gen = (dynamic $mode, dynamic $perm, dynamic $name) : dynamic ==> {
      $c = $caml_ml_open_descriptor_in($caml_sys_open($name, $mode, $perm));
      $caml_ml_set_channel_name($c, $name);
      return $c;
    };
    $open_in = (dynamic $name) : dynamic ==> {
      return $open_in_gen($k_, 0, $name);
    };
    $open_in_bin = (dynamic $name) : dynamic ==> {
      return $open_in_gen($l_, 0, $name);
    };
    $input = (dynamic $ic, dynamic $s, dynamic $ofs, dynamic $len) : dynamic ==> {
      if (0 <= $ofs) {
        if (0 <= $len) {
          if (! ((int) ($caml_ml_bytes_length($s) - $len) < $ofs)) {return $caml_ml_input($ic, $s, $ofs, $len);}
        }
      }
      return $invalid_arg($cst_input);
    };
    $unsafe_really_input = 
    (dynamic $ic, dynamic $s, dynamic $ofs, dynamic $len) : dynamic ==> {
      $len__1 = null as dynamic;
      $ofs__1 = null as dynamic;
      $r = null as dynamic;
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
    $really_input = (dynamic $ic, dynamic $s, dynamic $ofs, dynamic $len) : dynamic ==> {
      if (0 <= $ofs) {
        if (0 <= $len) {
          if (! ((int) ($caml_ml_bytes_length($s) - $len) < $ofs)) {return $unsafe_really_input($ic, $s, $ofs, $len);}
        }
      }
      return $invalid_arg($cst_really_input);
    };
    $really_input_string = (dynamic $ic, dynamic $len) : dynamic ==> {
      $s = $caml_create_bytes($len);
      $really_input($ic, $s, 0, $len);
      return $caml_string_of_bytes($s);
    };
    $input_line = (dynamic $chan) : dynamic ==> {
      $build_result = (dynamic $buf, dynamic $pos, dynamic $param) : dynamic ==> {
        $hd = null as dynamic;
        $len = null as dynamic;
        $param__1 = null as dynamic;
        $pos__1 = null as dynamic;
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
      $scan = (dynamic $accu, dynamic $len) : dynamic ==> {
        $accu__1 = null as dynamic;
        $beg = null as dynamic;
        $len__1 = null as dynamic;
        $len__2 = null as dynamic;
        $n = null as dynamic;
        $res = null as dynamic;
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
      return $caml_string_of_bytes($scan(0, 0));
    };
    $close_in_noerr = (dynamic $ic) : dynamic ==> {
      $aq_ = null as dynamic;
      try {$aq_ = $caml_ml_close_channel($ic);return $aq_;}
      catch(\Throwable $ar_) {return 0;}
    };
    $print_char = (dynamic $c) : dynamic ==> {
      return $caml_ml_output_char($stdout, $c);
    };
    $print_string = (dynamic $s) : dynamic ==> {
      return $output_string($stdout, $s);
    };
    $print_bytes = (dynamic $s) : dynamic ==> {
      return $output_bytes($stdout, $s);
    };
    $print_int = (dynamic $i) : dynamic ==> {
      return $output_string($stdout, $string_of_int($i));
    };
    $print_float = (dynamic $f) : dynamic ==> {
      return $output_string($stdout, $string_of_float($f));
    };
    $print_endline = (dynamic $s) : dynamic ==> {
      $output_string($stdout, $s);
      $caml_ml_output_char($stdout, 10);
      return $caml_ml_flush($stdout);
    };
    $print_newline = (dynamic $param) : dynamic ==> {
      $caml_ml_output_char($stdout, 10);
      return $caml_ml_flush($stdout);
    };
    $prerr_char = (dynamic $c) : dynamic ==> {
      return $caml_ml_output_char($stderr, $c);
    };
    $prerr_string = (dynamic $s) : dynamic ==> {
      return $output_string($stderr, $s);
    };
    $prerr_bytes = (dynamic $s) : dynamic ==> {
      return $output_bytes($stderr, $s);
    };
    $prerr_int = (dynamic $i) : dynamic ==> {
      return $output_string($stderr, $string_of_int($i));
    };
    $prerr_float = (dynamic $f) : dynamic ==> {
      return $output_string($stderr, $string_of_float($f));
    };
    $prerr_endline = (dynamic $s) : dynamic ==> {
      $output_string($stderr, $s);
      $caml_ml_output_char($stderr, 10);
      return $caml_ml_flush($stderr);
    };
    $prerr_newline = (dynamic $param) : dynamic ==> {
      $caml_ml_output_char($stderr, 10);
      return $caml_ml_flush($stderr);
    };
    $read_line = (dynamic $param) : dynamic ==> {
      $caml_ml_flush($stdout);
      return $input_line($stdin);
    };
    $read_int = (dynamic $param) : dynamic ==> {
      return $caml_int_of_string($read_line(0));
    };
    $read_int_opt = (dynamic $param) : dynamic ==> {
      return $int_of_string_opt($read_line(0));
    };
    $read_float = (dynamic $param) : dynamic ==> {
      return $caml_float_of_string($read_line(0));
    };
    $read_float_opt = (dynamic $param) : dynamic ==> {
      return $float_of_string_opt($read_line(0));
    };
    $string_of_format = (dynamic $param) : dynamic ==> {
      $str = $param[2];
      return $str;
    };
    $symbol__1 = (dynamic $param, dynamic $ao_) : dynamic ==> {
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
    $at_exit = (dynamic $f) : dynamic ==> {
      $g = $exit_function[1];
      $f_already_ran = Vector{0, 0} as dynamic;
      $exit_function[1] =
        (dynamic $param) : dynamic ==> {
          if (! $f_already_ran[1]) {$f_already_ran[1] = 1;$call1($f, 0);}
          return $call1($g, 0);
        };
      return 0;
    };
    $do_at_exit = (dynamic $param) : dynamic ==> {
      return $call1($exit_function[1], 0);
    };
    $exit = (dynamic $retcode) : dynamic ==> {
      $do_at_exit(0);
      return $runtime["caml_sys_exit"]($retcode);
    };
    $m_ = (dynamic $an_) : dynamic ==> {
      return $caml_ml_channel_size_64($an_);
    };
    $n_ = (dynamic $am_) : dynamic ==> {
      return $runtime["caml_ml_pos_in_64"]($am_);
    };
    $o_ = (dynamic $al_, dynamic $ak_) : dynamic ==> {
      return $runtime["caml_ml_seek_in_64"]($al_, $ak_);
    };
    $p_ = (dynamic $aj_) : dynamic ==> {
      return $caml_ml_channel_size_64($aj_);
    };
    $q_ = (dynamic $ai_) : dynamic ==> {
      return $runtime["caml_ml_pos_out_64"]($ai_);
    };
    $r_ = Vector{
      0,
      (dynamic $ah_, dynamic $ag_) : dynamic ==> {
        return $runtime["caml_ml_seek_out_64"]($ah_, $ag_);
      },
      $q_,
      $p_,
      $o_,
      $n_,
      $m_
    } as dynamic;
    $s_ = (dynamic $af_, dynamic $ae_) : dynamic ==> {
      return $caml_ml_set_binary_mode($af_, $ae_);
    };
    $t_ = (dynamic $ad_) : dynamic ==> {return $caml_ml_close_channel($ad_);};
    $u_ = (dynamic $ac_) : dynamic ==> {return $caml_ml_channel_size($ac_);};
    $v_ = (dynamic $ab_) : dynamic ==> {
      return $runtime["caml_ml_pos_in"]($ab_);
    };
    $w_ = (dynamic $aa_, dynamic $Z_) : dynamic ==> {
      return $runtime["caml_ml_seek_in"]($aa_, $Z_);
    };
    $x_ = (dynamic $Y_) : dynamic ==> {
      return $runtime["caml_input_value"]($Y_);
    };
    $y_ = (dynamic $X_) : dynamic ==> {
      return $runtime["caml_ml_input_int"]($X_);
    };
    $z_ = (dynamic $W_) : dynamic ==> {return $caml_ml_input_char($W_);};
    $A_ = (dynamic $V_) : dynamic ==> {return $caml_ml_input_char($V_);};
    $B_ = (dynamic $U_, dynamic $T_) : dynamic ==> {
      return $caml_ml_set_binary_mode($U_, $T_);
    };
    $C_ = (dynamic $S_) : dynamic ==> {return $caml_ml_channel_size($S_);};
    $D_ = (dynamic $R_) : dynamic ==> {
      return $runtime["caml_ml_pos_out"]($R_);
    };
    $E_ = (dynamic $Q_, dynamic $P_) : dynamic ==> {
      return $runtime["caml_ml_seek_out"]($Q_, $P_);
    };
    $F_ = (dynamic $O_, dynamic $N_) : dynamic ==> {
      return $runtime["caml_ml_output_int"]($O_, $N_);
    };
    $G_ = (dynamic $M_, dynamic $L_) : dynamic ==> {
      return $caml_ml_output_char($M_, $L_);
    };
    $H_ = (dynamic $K_, dynamic $J_) : dynamic ==> {
      return $caml_ml_output_char($K_, $J_);
    };
    $Stdlib = Vector{
      0,
      $invalid_arg,
      $failwith,
      $Exit,
      $Match_failure,
      $Assert_failure,
      $Invalid_argument,
      $Failure,
      $Not_found,
      $Out_of_memory,
      $Stack_overflow,
      $Sys_error,
      $End_of_file,
      $Division_by_zero,
      $Sys_blocked_io,
      $Undefined_recursive_module,
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
      $bool_of_string_opt,
      $bool_of_string,
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
      $read_int_opt,
      $read_int,
      $read_float_opt,
      $read_float,
      $open_out,
      $open_out_bin,
      $open_out_gen,
      (dynamic $I_) : dynamic ==> {return $caml_ml_flush($I_);},
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
    
    return($Stdlib);

  }
  public static function invalid_arg(dynamic $s): dynamic {
    return static::syncCall(__FUNCTION__, 1, $s);
  }
  public static function failwith(dynamic $s): dynamic {
    return static::syncCall(__FUNCTION__, 2, $s);
  }
  public static function min(dynamic $x, dynamic $y): dynamic {
    return static::syncCall(__FUNCTION__, 16, $x, $y);
  }
  public static function max(dynamic $x, dynamic $y): dynamic {
    return static::syncCall(__FUNCTION__, 17, $x, $y);
  }
  public static function abs(dynamic $x): dynamic {
    return static::syncCall(__FUNCTION__, 18, $x);
  }
  public static function lnot(dynamic $x): dynamic {
    return static::syncCall(__FUNCTION__, 21, $x);
  }
  public static function symbol(dynamic $s1, dynamic $s2): dynamic {
    return static::syncCall(__FUNCTION__, 28, $s1, $s2);
  }
  public static function char_of_int(dynamic $n): dynamic {
    return static::syncCall(__FUNCTION__, 29, $n);
  }
  public static function string_of_bool(dynamic $b): dynamic {
    return static::syncCall(__FUNCTION__, 30, $b);
  }
  public static function bool_of_string_opt(dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 31, $param);
  }
  public static function bool_of_string(dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 32, $param);
  }
  public static function string_of_int(dynamic $n): dynamic {
    return static::syncCall(__FUNCTION__, 33, $n);
  }
  public static function int_of_string_opt(dynamic $s): dynamic {
    return static::syncCall(__FUNCTION__, 34, $s);
  }
  public static function string_of_float(dynamic $f): dynamic {
    return static::syncCall(__FUNCTION__, 35, $f);
  }
  public static function float_of_string_opt(dynamic $s): dynamic {
    return static::syncCall(__FUNCTION__, 36, $s);
  }
  public static function print_char(dynamic $c): dynamic {
    return static::syncCall(__FUNCTION__, 41, $c);
  }
  public static function print_string(dynamic $s): dynamic {
    return static::syncCall(__FUNCTION__, 42, $s);
  }
  public static function print_bytes(dynamic $s): dynamic {
    return static::syncCall(__FUNCTION__, 43, $s);
  }
  public static function print_int(dynamic $i): dynamic {
    return static::syncCall(__FUNCTION__, 44, $i);
  }
  public static function print_float(dynamic $f): dynamic {
    return static::syncCall(__FUNCTION__, 45, $f);
  }
  public static function print_endline(dynamic $s): dynamic {
    return static::syncCall(__FUNCTION__, 46, $s);
  }
  public static function print_newline(dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 47, $param);
  }
  public static function prerr_char(dynamic $c): dynamic {
    return static::syncCall(__FUNCTION__, 48, $c);
  }
  public static function prerr_string(dynamic $s): dynamic {
    return static::syncCall(__FUNCTION__, 49, $s);
  }
  public static function prerr_bytes(dynamic $s): dynamic {
    return static::syncCall(__FUNCTION__, 50, $s);
  }
  public static function prerr_int(dynamic $i): dynamic {
    return static::syncCall(__FUNCTION__, 51, $i);
  }
  public static function prerr_float(dynamic $f): dynamic {
    return static::syncCall(__FUNCTION__, 52, $f);
  }
  public static function prerr_endline(dynamic $s): dynamic {
    return static::syncCall(__FUNCTION__, 53, $s);
  }
  public static function prerr_newline(dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 54, $param);
  }
  public static function read_line(dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 55, $param);
  }
  public static function read_int_opt(dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 56, $param);
  }
  public static function read_int(dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 57, $param);
  }
  public static function read_float_opt(dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 58, $param);
  }
  public static function read_float(dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 59, $param);
  }
  public static function open_out(dynamic $name): dynamic {
    return static::syncCall(__FUNCTION__, 60, $name);
  }
  public static function open_out_bin(dynamic $name): dynamic {
    return static::syncCall(__FUNCTION__, 61, $name);
  }
  public static function open_out_gen(dynamic $mode, dynamic $perm, dynamic $name): dynamic {
    return static::syncCall(__FUNCTION__, 62, $mode, $perm, $name);
  }
  public static function flush_all(dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 64, $param);
  }
  public static function output_string(dynamic $oc, dynamic $s): dynamic {
    return static::syncCall(__FUNCTION__, 66, $oc, $s);
  }
  public static function output_bytes(dynamic $oc, dynamic $s): dynamic {
    return static::syncCall(__FUNCTION__, 67, $oc, $s);
  }
  public static function output(dynamic $oc, dynamic $s, dynamic $ofs, dynamic $len): dynamic {
    return static::syncCall(__FUNCTION__, 68, $oc, $s, $ofs, $len);
  }
  public static function output_substring(dynamic $oc, dynamic $s, dynamic $ofs, dynamic $len): dynamic {
    return static::syncCall(__FUNCTION__, 69, $oc, $s, $ofs, $len);
  }
  public static function output_value(dynamic $chan, dynamic $v): dynamic {
    return static::syncCall(__FUNCTION__, 72, $chan, $v);
  }
  public static function close_out(dynamic $oc): dynamic {
    return static::syncCall(__FUNCTION__, 76, $oc);
  }
  public static function close_out_noerr(dynamic $oc): dynamic {
    return static::syncCall(__FUNCTION__, 77, $oc);
  }
  public static function open_in(dynamic $name): dynamic {
    return static::syncCall(__FUNCTION__, 79, $name);
  }
  public static function open_in_bin(dynamic $name): dynamic {
    return static::syncCall(__FUNCTION__, 80, $name);
  }
  public static function open_in_gen(dynamic $mode, dynamic $perm, dynamic $name): dynamic {
    return static::syncCall(__FUNCTION__, 81, $mode, $perm, $name);
  }
  public static function input_line(dynamic $chan): dynamic {
    return static::syncCall(__FUNCTION__, 83, $chan);
  }
  public static function input(dynamic $ic, dynamic $s, dynamic $ofs, dynamic $len): dynamic {
    return static::syncCall(__FUNCTION__, 84, $ic, $s, $ofs, $len);
  }
  public static function really_input(dynamic $ic, dynamic $s, dynamic $ofs, dynamic $len): dynamic {
    return static::syncCall(__FUNCTION__, 85, $ic, $s, $ofs, $len);
  }
  public static function really_input_string(dynamic $ic, dynamic $len): dynamic {
    return static::syncCall(__FUNCTION__, 86, $ic, $len);
  }
  public static function close_in_noerr(dynamic $ic): dynamic {
    return static::syncCall(__FUNCTION__, 94, $ic);
  }
  public static function string_of_format(dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 97, $param);
  }
  public static function at_exit(dynamic $f): dynamic {
    return static::syncCall(__FUNCTION__, 100, $f);
  }
  public static function valid_float_lexem(dynamic $s): dynamic {
    return static::syncCall(__FUNCTION__, 101, $s);
  }
  public static function unsafe_really_input(dynamic $ic, dynamic $s, dynamic $ofs, dynamic $len): dynamic {
    return static::syncCall(__FUNCTION__, 102, $ic, $s, $ofs, $len);
  }
  public static function do_at_exit(dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 103, $param);
  }

}
/* Hashing disabled */
