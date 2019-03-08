<?hh
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * Pervasives.php
 */

namespace Rehack;

final class Pervasives {
  <<__Memoize>>
  public static function get() {
    $global_object = \Rehack\GlobalObject::get();
    $runtime = \Rehack\Runtime::get();
    /*
     * Soon, these will replace the `global_data->ModuleName`
     * pattern in the load() function.
     */
    $CamlinternalFormatBasics = CamlinternalFormatBasics::get();
    $Invalid_argument = Invalid_argument::get();
    $Failure = Failure::get();
    $Sys_error = Sys_error::get();
    $End_of_file = End_of_file::get();
    Pervasives::load($global_object);
    $memoized = $runtime->caml_get_global_data()->Pervasives;
    return $memoized;
  }

  /**
   * Performs module load operation. May have side effects.
   */
  private static function load($joo_global_object) {
    

    $j = new Ref();
    $runtime = $joo_global_object->jsoo_runtime;
    $caml_arity_test = $runtime["caml_arity_test"];
    $caml_blit_string = $runtime["caml_blit_string"];
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
    $caml_new_string = $runtime["caml_new_string"];
    $caml_string_notequal = $runtime["caml_string_notequal"];
    $caml_sys_open = $runtime["caml_sys_open"];
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
    $global_data = $runtime["caml_get_global_data"]();
    $cst__0 = $caml_new_string("%,");
    $cst_really_input = $caml_new_string("really_input");
    $cst_input = $caml_new_string("input");
    $cst_output_substring = $caml_new_string("output_substring");
    $cst_output = $caml_new_string("output");
    $cst_12g = $caml_new_string("%.12g");
    $cst = $caml_new_string(".");
    $cst_false__1 = $caml_new_string("false");
    $cst_true__1 = $caml_new_string("true");
    $cst_false__0 = $caml_new_string("false");
    $cst_true__0 = $caml_new_string("true");
    $cst_bool_of_string = $caml_new_string("bool_of_string");
    $cst_true = $caml_new_string("true");
    $cst_false = $caml_new_string("false");
    $cst_char_of_int = $caml_new_string("char_of_int");
    $cst_Pervasives_Exit = $caml_new_string("Pervasives.Exit");
    $End_of_file = $global_data["End_of_file"];
    $CamlinternalFormatBasics = $global_data["CamlinternalFormatBasics"];
    $Sys_error = $global_data["Sys_error"];
    $Failure = $global_data["Failure"];
    $Invalid_argument = $global_data["Invalid_argument"];
    $n = Vector{0, 0, Vector{0, 6, 0}};
    $m = Vector{0, 0, Vector{0, 7, 0}};
    $l = Vector{0, 1, Vector{0, 3, Vector{0, 4, Vector{0, 6, 0}}}};
    $k = Vector{0, 1, Vector{0, 3, Vector{0, 4, Vector{0, 7, 0}}}};
    $h = Vector{0, 1};
    $i = Vector{0, 0};
    $a = Vector{255, 0, 0, 32752};
    $b = Vector{255, 0, 0, 65520};
    $c = Vector{255, 1, 0, 32752};
    $d = Vector{255, 16777215, 16777215, 32751};
    $e = Vector{255, 0, 0, 16};
    $f = Vector{255, 0, 0, 15536};
    $failwith = function($s) use ($Failure,$runtime) {
      throw $runtime["caml_wrap_thrown_exception"](Vector{0, $Failure, $s});
    };
    $invalid_arg = function($s) use ($Invalid_argument,$runtime) {
      throw $runtime["caml_wrap_thrown_exception"](Vector{0, $Invalid_argument, $s});
    };
    $Exit = Vector{248, $cst_Pervasives_Exit, $runtime["caml_fresh_oo_id"](0)};
    $min = function($x, $y) use ($runtime) {
      return $runtime["caml_lessequal"]($x, $y) ? $x : ($y);
    };
    $max = function($x, $y) use ($runtime) {
      return $runtime["caml_greaterequal"]($x, $y) ? $x : ($y);
    };
    $abs = function($x) {return 0 <= $x ? $x : (- $x | 0);};
    $lnot = function($x) {return $x ^ -1;};
    $infinity = $caml_int64_float_of_bits($a);
    $neg_infinity = $caml_int64_float_of_bits($b);
    $nan = $caml_int64_float_of_bits($c);
    $max_float = $caml_int64_float_of_bits($d);
    $min_float = $caml_int64_float_of_bits($e);
    $epsilon_float = $caml_int64_float_of_bits($f);
    $max_int = 2147483647;
    $min_int = -2147483648;
    $g = function($s1, $s2) use ($caml_blit_string,$caml_create_bytes,$caml_ml_string_length) {
      $l1 = $caml_ml_string_length($s1);
      $l2 = $caml_ml_string_length($s2);
      $s = $caml_create_bytes($l1 + $l2 | 0);
      $caml_blit_string($s1, 0, $s, 0, $l1);
      $caml_blit_string($s2, 0, $s, $l1, $l2);
      return $s;
    };
    $char_of_int = function($n) use ($cst_char_of_int,$invalid_arg) {
      if (0 <= $n) {if (! (255 < $n)) {return $n;}}
      return $invalid_arg($cst_char_of_int);
    };
    $string_of_bool = function($b) use ($cst_false,$cst_true) {
      return $b ? $cst_true : ($cst_false);
    };
    $bool_of_string = function($param) use ($caml_string_notequal,$cst_bool_of_string,$cst_false__0,$cst_true__0,$invalid_arg) {
      return $caml_string_notequal($param, $cst_false__0)
        ? $caml_string_notequal($param, $cst_true__0)
         ? $invalid_arg($cst_bool_of_string)
         : (1)
        : (0);
    };
    $bool_of_string_opt = function($param) use ($caml_string_notequal,$cst_false__1,$cst_true__1,$h,$i) {
      return $caml_string_notequal($param, $cst_false__1)
        ? $caml_string_notequal($param, $cst_true__1) ? 0 : ($h)
        : ($i);
    };
    $string_of_int = function($n) use ($caml_new_string) {
      return $caml_new_string("" . $n);
    };
    $int_of_string_opt = function($s) use ($Failure,$caml_int_of_string,$caml_wrap_exception,$runtime) {
      try {$aA = Vector{0, $caml_int_of_string($s)};return $aA;}
      catch(\Throwable $aB) {
        $aB = $caml_wrap_exception($aB);
        if ($aB[1] === $Failure) {return 0;}
        throw $runtime["caml_wrap_thrown_exception_reraise"]($aB);
      }
    };
    $valid_float_lexem = function($s) use ($caml_ml_string_length,$cst,$g,$runtime) {
      $l = $caml_ml_string_length($s);
      $loop = function($i) use ($cst,$g,$l,$runtime,$s) {
        $i__0 = $i;
        for (;;) {
          if ($l <= $i__0) {return $g($s, $cst);}
          $match = $runtime["caml_string_get"]($s, $i__0);
          $switch__0 = 48 <= $match
            ? 58 <= $match ? 0 : (1)
            : (45 === $match ? 1 : (0));
          if ($switch__0) {$i__1 = $i__0 + 1 | 0;$i__0 = $i__1;continue;}
          return $s;
        }
      };
      return $loop(0);
    };
    $string_of_float = function($f) use ($cst_12g,$runtime,$valid_float_lexem) {
      return $valid_float_lexem($runtime["caml_format_float"]($cst_12g, $f));
    };
    $float_of_string_opt = function($s) use ($Failure,$caml_float_of_string,$caml_wrap_exception,$runtime) {
      try {$ay = Vector{0, $caml_float_of_string($s)};return $ay;}
      catch(\Throwable $az) {
        $az = $caml_wrap_exception($az);
        if ($az[1] === $Failure) {return 0;}
        throw $runtime["caml_wrap_thrown_exception_reraise"]($az);
      }
    };
    $_ = $j->contents =
      function($l1, $l2) use ($j) {
        if ($l1) {
          $tl = $l1[2];
          $hd = $l1[1];
          return Vector{0, $hd, $j->contents($tl, $l2)};
        }
        return $l2;
      };
    $stdin = $caml_ml_open_descriptor_in(0);
    $stdout = $caml_ml_open_descriptor_out(1);
    $stderr = $caml_ml_open_descriptor_out(2);
    $open_out_gen = function($mode, $perm, $name) use ($caml_ml_open_descriptor_out,$caml_ml_set_channel_name,$caml_sys_open) {
      $c = $caml_ml_open_descriptor_out($caml_sys_open($name, $mode, $perm));
      $caml_ml_set_channel_name($c, $name);
      return $c;
    };
    $open_out = function($name) use ($k,$open_out_gen) {
      return $open_out_gen($k, 438, $name);
    };
    $open_out_bin = function($name) use ($l,$open_out_gen) {
      return $open_out_gen($l, 438, $name);
    };
    $flush_all = function($param) use ($Sys_error,$caml_ml_flush,$caml_wrap_exception,$runtime) {
      $iter = function($param) use ($Sys_error,$caml_ml_flush,$caml_wrap_exception,$runtime) {
        $param__0 = $param;
        for (;;) {
          if ($param__0) {
            $l = $param__0[2];
            $a = $param__0[1];
            try {$caml_ml_flush($a);}
            catch(\Throwable $ax) {
              $ax = $caml_wrap_exception($ax);
              if ($ax[1] !== $Sys_error) {
                throw $runtime["caml_wrap_thrown_exception_reraise"]($ax);
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
    $output_bytes = function($oc, $s) use ($caml_ml_bytes_length,$caml_ml_output_bytes) {
      return $caml_ml_output_bytes($oc, $s, 0, $caml_ml_bytes_length($s));
    };
    $output_string = function($oc, $s) use ($caml_ml_output,$caml_ml_string_length) {
      return $caml_ml_output($oc, $s, 0, $caml_ml_string_length($s));
    };
    $output = function($oc, $s, $ofs, $len) use ($caml_ml_bytes_length,$caml_ml_output_bytes,$cst_output,$invalid_arg) {
      if (0 <= $ofs) {
        if (0 <= $len) {
          if (! (($caml_ml_bytes_length($s) - $len | 0) < $ofs)) {return $caml_ml_output_bytes($oc, $s, $ofs, $len);}
        }
      }
      return $invalid_arg($cst_output);
    };
    $output_substring = function($oc, $s, $ofs, $len) use ($caml_ml_output,$caml_ml_string_length,$cst_output_substring,$invalid_arg) {
      if (0 <= $ofs) {
        if (0 <= $len) {
          if (! (($caml_ml_string_length($s) - $len | 0) < $ofs)) {return $caml_ml_output($oc, $s, $ofs, $len);}
        }
      }
      return $invalid_arg($cst_output_substring);
    };
    $output_value = function($chan, $v) use ($runtime) {
      return $runtime["caml_output_value"]($chan, $v, 0);
    };
    $close_out = function($oc) use ($caml_ml_close_channel,$caml_ml_flush) {
      $caml_ml_flush($oc);
      return $caml_ml_close_channel($oc);
    };
    $close_out_noerr = function($oc) use ($caml_ml_close_channel,$caml_ml_flush) {
      try {$caml_ml_flush($oc);}catch(\Throwable $aw) {}
      try {$au = $caml_ml_close_channel($oc);return $au;}
      catch(\Throwable $av) {return 0;}
    };
    $open_in_gen = function($mode, $perm, $name) use ($caml_ml_open_descriptor_in,$caml_ml_set_channel_name,$caml_sys_open) {
      $c = $caml_ml_open_descriptor_in($caml_sys_open($name, $mode, $perm));
      $caml_ml_set_channel_name($c, $name);
      return $c;
    };
    $open_in = function($name) use ($m,$open_in_gen) {
      return $open_in_gen($m, 0, $name);
    };
    $open_in_bin = function($name) use ($n,$open_in_gen) {
      return $open_in_gen($n, 0, $name);
    };
    $input = function($ic, $s, $ofs, $len) use ($caml_ml_bytes_length,$caml_ml_input,$cst_input,$invalid_arg) {
      if (0 <= $ofs) {
        if (0 <= $len) {
          if (! (($caml_ml_bytes_length($s) - $len | 0) < $ofs)) {return $caml_ml_input($ic, $s, $ofs, $len);}
        }
      }
      return $invalid_arg($cst_input);
    };
    $unsafe_really_input = function($ic, $s, $ofs, $len) use ($End_of_file,$caml_ml_input,$runtime) {
      $ofs__0 = $ofs;
      $len__0 = $len;
      for (;;) {
        if (0 < $len__0) {
          $r = $caml_ml_input($ic, $s, $ofs__0, $len__0);
          if (0 === $r) {
            throw $runtime["caml_wrap_thrown_exception"]($End_of_file);
          }
          $len__1 = $len__0 - $r | 0;
          $ofs__1 = $ofs__0 + $r | 0;
          $ofs__0 = $ofs__1;
          $len__0 = $len__1;
          continue;
        }
        return 0;
      }
    };
    $really_input = function($ic, $s, $ofs, $len) use ($caml_ml_bytes_length,$cst_really_input,$invalid_arg,$unsafe_really_input) {
      if (0 <= $ofs) {
        if (0 <= $len) {
          if (! (($caml_ml_bytes_length($s) - $len | 0) < $ofs)) {return $unsafe_really_input($ic, $s, $ofs, $len);}
        }
      }
      return $invalid_arg($cst_really_input);
    };
    $really_input_string = function($ic, $len) use ($caml_create_bytes,$really_input) {
      $s = $caml_create_bytes($len);
      $really_input($ic, $s, 0, $len);
      return $s;
    };
    $input_line = function($chan) use ($End_of_file,$caml_create_bytes,$caml_ml_bytes_length,$caml_ml_input,$caml_ml_input_char,$runtime) {
      $build_result = function($buf, $pos, $param) use ($caml_ml_bytes_length,$runtime) {
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
              $pos__0 - $len | 0,
              $len
            );
            $pos__1 = $pos__0 - $len | 0;
            $pos__0 = $pos__1;
            $param__0 = $param__1;
            continue;
          }
          return $buf;
        }
      };
      $scan = function($accu, $len) use ($End_of_file,$build_result,$caml_create_bytes,$caml_ml_input,$caml_ml_input_char,$chan,$runtime) {
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
            throw $runtime["caml_wrap_thrown_exception"]($End_of_file);
          }
          if (0 < $n) {
            $res = $caml_create_bytes($n + -1 | 0);
            $caml_ml_input($chan, $res, 0, $n + -1 | 0);
            $caml_ml_input_char($chan);
            if ($accu__0) {
              $len__1 = ($len__0 + $n | 0) + -1 | 0;
              return $build_result(
                $caml_create_bytes($len__1),
                $len__1,
                Vector{0, $res, $accu__0}
              );
            }
            return $res;
          }
          $beg = $caml_create_bytes(- $n | 0);
          $caml_ml_input($chan, $beg, 0, - $n | 0);
          $len__2 = $len__0 - $n | 0;
          $accu__1 = Vector{0, $beg, $accu__0};
          $accu__0 = $accu__1;
          $len__0 = $len__2;
          continue;
        }
      };
      return $scan(0, 0);
    };
    $close_in_noerr = function($ic) use ($caml_ml_close_channel) {
      try {$as = $caml_ml_close_channel($ic);return $as;}
      catch(\Throwable $at) {return 0;}
    };
    $print_char = function($c) use ($caml_ml_output_char,$stdout) {
      return $caml_ml_output_char($stdout, $c);
    };
    $print_string = function($s) use ($output_string,$stdout) {
      return $output_string($stdout, $s);
    };
    $print_bytes = function($s) use ($output_bytes,$stdout) {
      return $output_bytes($stdout, $s);
    };
    $print_int = function($i) use ($output_string,$stdout,$string_of_int) {
      return $output_string($stdout, $string_of_int($i));
    };
    $print_float = function($f) use ($output_string,$stdout,$string_of_float) {
      return $output_string($stdout, $string_of_float($f));
    };
    $print_endline = function($s) use ($caml_ml_flush,$caml_ml_output_char,$output_string,$stdout) {
      $output_string($stdout, $s);
      $caml_ml_output_char($stdout, 10);
      return $caml_ml_flush($stdout);
    };
    $print_newline = function($param) use ($caml_ml_flush,$caml_ml_output_char,$stdout) {
      $caml_ml_output_char($stdout, 10);
      return $caml_ml_flush($stdout);
    };
    $prerr_char = function($c) use ($caml_ml_output_char,$stderr) {
      return $caml_ml_output_char($stderr, $c);
    };
    $prerr_string = function($s) use ($output_string,$stderr) {
      return $output_string($stderr, $s);
    };
    $prerr_bytes = function($s) use ($output_bytes,$stderr) {
      return $output_bytes($stderr, $s);
    };
    $prerr_int = function($i) use ($output_string,$stderr,$string_of_int) {
      return $output_string($stderr, $string_of_int($i));
    };
    $prerr_float = function($f) use ($output_string,$stderr,$string_of_float) {
      return $output_string($stderr, $string_of_float($f));
    };
    $prerr_endline = function($s) use ($caml_ml_flush,$caml_ml_output_char,$output_string,$stderr) {
      $output_string($stderr, $s);
      $caml_ml_output_char($stderr, 10);
      return $caml_ml_flush($stderr);
    };
    $prerr_newline = function($param) use ($caml_ml_flush,$caml_ml_output_char,$stderr) {
      $caml_ml_output_char($stderr, 10);
      return $caml_ml_flush($stderr);
    };
    $read_line = function($param) use ($caml_ml_flush,$input_line,$stdin,$stdout) {
      $caml_ml_flush($stdout);
      return $input_line($stdin);
    };
    $read_int = function($param) use ($caml_int_of_string,$read_line) {
      return $caml_int_of_string($read_line(0));
    };
    $read_int_opt = function($param) use ($int_of_string_opt,$read_line) {
      return $int_of_string_opt($read_line(0));
    };
    $read_float = function($param) use ($caml_float_of_string,$read_line) {
      return $caml_float_of_string($read_line(0));
    };
    $read_float_opt = function($param) use ($float_of_string_opt,$read_line) {
      return $float_of_string_opt($read_line(0));
    };
    $string_of_format = function($param) {$str = $param[2];return $str;};
    $exit_function = Vector{0, $flush_all};
    $o = function($param, $aq) use ($CamlinternalFormatBasics,$caml_call2,$cst__0,$g) {
      $str2 = $aq[2];
      $fmt2 = $aq[1];
      $str1 = $param[2];
      $fmt1 = $param[1];
      $ar = $g($str1, $g($cst__0, $str2));
      return Vector{
        0,
        $caml_call2($CamlinternalFormatBasics[3], $fmt1, $fmt2),
        $ar
      };
    };
    $at_exit = function($f) use ($caml_call1,$exit_function) {
      $g = $exit_function[1];
      $exit_function[1] =
        function($param) use ($caml_call1,$f,$g) {
          $caml_call1($f, 0);
          return $caml_call1($g, 0);
        };
      return 0;
    };
    $do_at_exit = function($param) use ($caml_call1,$exit_function) {
      return $caml_call1($exit_function[1], 0);
    };
    $exit = function($retcode) use ($do_at_exit,$runtime) {
      $do_at_exit(0);
      return $runtime["caml_sys_exit"]($retcode);
    };
    $p = function($ap) use ($caml_ml_channel_size_64) {
      return $caml_ml_channel_size_64($ap);
    };
    $q = function($ao) use ($runtime) {
      return $runtime["caml_ml_pos_in_64"]($ao);
    };
    $r = function($an, $am) use ($runtime) {
      return $runtime["caml_ml_seek_in_64"]($an, $am);
    };
    $s = function($al) use ($caml_ml_channel_size_64) {
      return $caml_ml_channel_size_64($al);
    };
    $t = function($ak) use ($runtime) {
      return $runtime["caml_ml_pos_out_64"]($ak);
    };
    $u = Vector{
      0,
      function($aj, $ai) use ($runtime) {
        return $runtime["caml_ml_seek_out_64"]($aj, $ai);
      },
      $t,
      $s,
      $r,
      $q,
      $p
    };
    $v = function($ah, $ag) use ($caml_ml_set_binary_mode) {
      return $caml_ml_set_binary_mode($ah, $ag);
    };
    $w = function($af) use ($caml_ml_close_channel) {
      return $caml_ml_close_channel($af);
    };
    $x = function($ae) use ($caml_ml_channel_size) {
      return $caml_ml_channel_size($ae);
    };
    $y = function($ad) use ($runtime) {
      return $runtime["caml_ml_pos_in"]($ad);
    };
    $z = function($ac, $ab) use ($runtime) {
      return $runtime["caml_ml_seek_in"]($ac, $ab);
    };
    $A = function($aa) use ($runtime) {
      return $runtime["caml_input_value"]($aa);
    };
    $B = function($_) use ($runtime) {
      return $runtime["caml_ml_input_int"]($_);
    };
    $C = function($Z) use ($caml_ml_input_char) {
      return $caml_ml_input_char($Z);
    };
    $D = function($Y) use ($caml_ml_input_char) {
      return $caml_ml_input_char($Y);
    };
    $E = function($X, $W) use ($caml_ml_set_binary_mode) {
      return $caml_ml_set_binary_mode($X, $W);
    };
    $F = function($V) use ($caml_ml_channel_size) {
      return $caml_ml_channel_size($V);
    };
    $G = function($U) use ($runtime) {return $runtime["caml_ml_pos_out"]($U);};
    $H = function($T, $S) use ($runtime) {
      return $runtime["caml_ml_seek_out"]($T, $S);
    };
    $I = function($R, $Q) use ($runtime) {
      return $runtime["caml_ml_output_int"]($R, $Q);
    };
    $J = function($P, $O) use ($caml_ml_output_char) {
      return $caml_ml_output_char($P, $O);
    };
    $K = function($N, $M) use ($caml_ml_output_char) {
      return $caml_ml_output_char($N, $M);
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
      $g,
      $char_of_int,
      $string_of_bool,
      $bool_of_string,
      $bool_of_string_opt,
      $string_of_int,
      $int_of_string_opt,
      $string_of_float,
      $float_of_string_opt,
      $j->contents,
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
      function($L) use ($caml_ml_flush) {return $caml_ml_flush($L);},
      $flush_all,
      $K,
      $output_string,
      $output_bytes,
      $output,
      $output_substring,
      $J,
      $I,
      $output_value,
      $H,
      $G,
      $F,
      $close_out,
      $close_out_noerr,
      $E,
      $open_in,
      $open_in_bin,
      $open_in_gen,
      $D,
      $input_line,
      $input,
      $really_input,
      $really_input_string,
      $C,
      $B,
      $A,
      $z,
      $y,
      $x,
      $w,
      $close_in_noerr,
      $v,
      $u,
      $string_of_format,
      $o,
      $exit,
      $at_exit,
      $valid_float_lexem,
      $unsafe_really_input,
      $do_at_exit
    };
    
    $runtime["caml_register_global"](37, $Pervasives, "Pervasives");

  }
}