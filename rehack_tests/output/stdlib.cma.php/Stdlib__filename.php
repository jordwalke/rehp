<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class Stdlib__filename {
  <<__Override, __Memoize>>
  public static function get() : Vector<dynamic> {
    
    $basename__2 = null as dynamic;
    $check_suffix__1 = null as dynamic;
    $chop_suffix_opt__1 = null as dynamic;
    $current_dir_name__2 = null as dynamic;
    $dir_sep__2 = null as dynamic;
    $dirname__2 = null as dynamic;
    $e_ = null as dynamic;
    $f_ = null as dynamic;
    $g_ = null as dynamic;
    $h_ = null as dynamic;
    $i_ = null as dynamic;
    $is_dir_sep__1 = null as dynamic;
    $is_implicit__1 = null as dynamic;
    $is_relative__1 = null as dynamic;
    $j_ = null as dynamic;
    $k_ = null as dynamic;
    $l_ = null as dynamic;
    $m_ = null as dynamic;
    $n_ = null as dynamic;
    $parent_dir_name__2 = null as dynamic;
    $quote__1 = null as dynamic;
    $switch__0 = null as dynamic;
    $temp_dir_name = null as dynamic;
    $temp_dir_name__0 = null as dynamic;
    $temp_dir_name__1 = null as dynamic;
    $runtime = (\Rehack\GlobalObject::get() as dynamic)->jsoo_runtime;
    $call1 = $runtime["caml_call1"];
    $call2 = $runtime["caml_call2"];
    $call3 = $runtime["caml_call3"];
    $call4 = $runtime["caml_call4"];
    $caml_ml_string_length = $runtime["caml_ml_string_length"];
    $string = $runtime["caml_new_string"];
    $caml_string_equal = $runtime["caml_string_equal"];
    $caml_string_get = $runtime["caml_string_get"];
    $caml_string_notequal = $runtime["caml_string_notequal"];
    $caml_sys_getenv = $runtime["caml_sys_getenv"];
    $caml_trampoline = $runtime["caml_trampoline"];
    $caml_trampoline_return = $runtime["caml_trampoline_return"];
    $caml_wrap_thrown_exception_reraise = $runtime[
       "caml_wrap_thrown_exception_reraise"
     ];
    $unsigned_right_shift_32 = $runtime["unsigned_right_shift_32"];
    $cst_Filename_chop_extension = $string("Filename.chop_extension");
    $cst__10 = $string("");
    $cst_Filename_chop_suffix = $string("Filename.chop_suffix");
    $cst__9 = $string("");
    $cst__7 = $string("./");
    $cst__6 = $string(".\\");
    $cst__5 = $string("../");
    $cst__4 = $string("..\\");
    $cst__2 = $string("./");
    $cst__1 = $string("../");
    $cst__0 = $string("");
    $cst = $string("");
    $current_dir_name = $string(".");
    $parent_dir_name = $string("..");
    $dir_sep = $string("/");
    $cst_TMPDIR = $string("TMPDIR");
    $cst_tmp = $string("/tmp");
    $cst__3 = $string("'\\''");
    $current_dir_name__0 = $string(".");
    $parent_dir_name__0 = $string("..");
    $dir_sep__0 = $string("\\");
    $cst_TEMP = $string("TEMP");
    $cst__8 = $string(".");
    $current_dir_name__1 = $string(".");
    $parent_dir_name__1 = $string("..");
    $dir_sep__1 = $string("/");
    $cst_Cygwin = $string("Cygwin");
    $cst_Win32 = $string("Win32");
    $Stdlib = Stdlib::get();
    $CamlinternalLazy = CamlinternalLazy::get();
    $Stdlib_random = Stdlib__random::get();
    $Stdlib_printf = Stdlib__printf::get();
    $Stdlib_string = Stdlib__string::get();
    $Stdlib_buffer = Stdlib__buffer::get();
    $Stdlib_sys = Stdlib__sys::get();
    $d_ = Vector{0, 7, 0} as dynamic;
    $c_ = Vector{0, 1, Vector{0, 3, Vector{0, 5, 0}}} as dynamic;
    $b_ = Vector{
      0,
      Vector{2, 0, Vector{4, 6, Vector{0, 2, 6}, 0, Vector{2, 0, 0}}},
      $string("%s%06x%s")
    } as dynamic;
    $generic_quote = (dynamic $quotequote, dynamic $s) : dynamic ==> {
      $as_ = null as dynamic;
      $at_ = null as dynamic;
      $i = null as dynamic;
      $l = $caml_ml_string_length($s);
      $b = $call1($Stdlib_buffer[1], (int) ($l + 20));
      $call2($Stdlib_buffer[10], $b, 39);
      $ar_ = (int) ($l + -1) as dynamic;
      $aq_ = 0 as dynamic;
      if (! ($ar_ < 0)) {
        $i = $aq_;
        for (;;) {
          if (39 === $caml_string_get($s, $i)) {
            $call2($Stdlib_buffer[14], $b, $quotequote);
          }
          else {
            $at_ = $caml_string_get($s, $i);
            $call2($Stdlib_buffer[10], $b, $at_);
          }
          $as_ = (int) ($i + 1) as dynamic;
          if ($ar_ !== $i) {$i = $as_;continue;}
          break;
        }
      }
      $call2($Stdlib_buffer[10], $b, 39);
      return $call1($Stdlib_buffer[2], $b);
    };
    $generic_basename = 
    (dynamic $is_dir_sep, dynamic $current_dir_name, dynamic $name) : dynamic ==> {
      $find_beg = (dynamic $n, dynamic $p) : dynamic ==> {
        $n__1 = null as dynamic;
        $n__0 = $n;
        for (;;) {
          if (0 <= $n__0) {
            if ($call2($is_dir_sep, $name, $n__0)) {
              return $call3(
                $Stdlib_string[4],
                $name,
                (int)
                ($n__0 + 1),
                (int)
                ((int) ($p - $n__0) + -1)
              );
            }
            $n__1 = (int) ($n__0 + -1) as dynamic;
            $n__0 = $n__1;
            continue;
          }
          return $call3($Stdlib_string[4], $name, 0, $p);
        }
      };
      $find_end = (dynamic $n) : dynamic ==> {
        $n__1 = null as dynamic;
        $n__0 = $n;
        for (;;) {
          if (0 <= $n__0) {
            if ($call2($is_dir_sep, $name, $n__0)) {
              $n__1 = (int) ($n__0 + -1) as dynamic;
              $n__0 = $n__1;
              continue;
            }
            return $find_beg($n__0, (int) ($n__0 + 1));
          }
          return $call3($Stdlib_string[4], $name, 0, 1);
        }
      };
      return $caml_string_equal($name, $cst)
        ? $current_dir_name
        : ($find_end((int) ($caml_ml_string_length($name) + -1)));
    };
    $generic_dirname = 
    (dynamic $is_dir_sep, dynamic $current_dir_name, dynamic $name) : dynamic ==> {
      $intermediate_sep = (dynamic $n) : dynamic ==> {
        $n__1 = null as dynamic;
        $n__0 = $n;
        for (;;) {
          if (0 <= $n__0) {
            if ($call2($is_dir_sep, $name, $n__0)) {
              $n__1 = (int) ($n__0 + -1) as dynamic;
              $n__0 = $n__1;
              continue;
            }
            return $call3($Stdlib_string[4], $name, 0, (int) ($n__0 + 1));
          }
          return $call3($Stdlib_string[4], $name, 0, 1);
        }
      };
      $base = (dynamic $n) : dynamic ==> {
        $n__1 = null as dynamic;
        $n__0 = $n;
        for (;;) {
          if (0 <= $n__0) {
            if ($call2($is_dir_sep, $name, $n__0)) {return $intermediate_sep($n__0);}
            $n__1 = (int) ($n__0 + -1) as dynamic;
            $n__0 = $n__1;
            continue;
          }
          return $current_dir_name;
        }
      };
      $trailing_sep = (dynamic $n) : dynamic ==> {
        $n__1 = null as dynamic;
        $n__0 = $n;
        for (;;) {
          if (0 <= $n__0) {
            if ($call2($is_dir_sep, $name, $n__0)) {
              $n__1 = (int) ($n__0 + -1) as dynamic;
              $n__0 = $n__1;
              continue;
            }
            return $base($n__0);
          }
          return $call3($Stdlib_string[4], $name, 0, 1);
        }
      };
      return $caml_string_equal($name, $cst__0)
        ? $current_dir_name
        : ($trailing_sep((int) ($caml_ml_string_length($name) + -1)));
    };
    $is_dir_sep = (dynamic $s, dynamic $i) : dynamic ==> {
      return 47 === $caml_string_get($s, $i) ? 1 : (0);
    };
    $is_relative = (dynamic $n) : dynamic ==> {
      $ao_ = $caml_ml_string_length($n) < 1 ? 1 : (0);
      $ap_ = $ao_ ? $ao_ : (47 !== $caml_string_get($n, 0) ? 1 : (0));
      return $ap_;
    };
    $is_implicit = (dynamic $n) : dynamic ==> {
      $ak_ = null as dynamic;
      $al_ = null as dynamic;
      $am_ = null as dynamic;
      $an_ = null as dynamic;
      $aj_ = $is_relative($n);
      if ($aj_) {
        $ak_ = $caml_ml_string_length($n) < 2 ? 1 : (0);
        $al_ = $ak_
          ? $ak_
          : ($caml_string_notequal(
           $call3($Stdlib_string[4], $n, 0, 2),
           $cst__2
         ));
        if ($al_) {
          $am_ = $caml_ml_string_length($n) < 3 ? 1 : (0);
          $an_ = $am_
            ? $am_
            : ($caml_string_notequal(
             $call3($Stdlib_string[4], $n, 0, 3),
             $cst__1
           ));
        }
        else {$an_ = $al_;}
      }
      else {$an_ = $aj_;}
      return $an_;
    };
    $check_suffix = (dynamic $name, dynamic $suff) : dynamic ==> {
      $ah_ = $caml_ml_string_length($suff) <= $caml_ml_string_length($name)
        ? 1
        : (0);
      $ai_ = $ah_
        ? $caml_string_equal(
         $call3(
           $Stdlib_string[4],
           $name,
           (int)
           ($caml_ml_string_length($name) - $caml_ml_string_length($suff)),
           $caml_ml_string_length($suff)
         ),
         $suff
       )
        : ($ah_);
      return $ai_;
    };
    $chop_suffix_opt = (dynamic $suffix, dynamic $filename) : dynamic ==> {
      $r = null as dynamic;
      $len_s = $caml_ml_string_length($suffix);
      $len_f = $caml_ml_string_length($filename);
      if ($len_s <= $len_f) {
        $r = $call3(
          $Stdlib_string[4],
          $filename,
          (int)
          ($len_f - $len_s),
          $len_s
        );
        return $caml_string_equal($r, $suffix)
          ? Vector{
           0,
           $call3($Stdlib_string[4], $filename, 0, (int) ($len_f - $len_s))
         }
          : (0);
      }
      return 0;
    };
    
    try {$n_ = $caml_sys_getenv($cst_TMPDIR);$temp_dir_name = $n_;}
    catch(\Throwable $ag_) {
      $ag_ = $runtime["caml_wrap_exception"]($ag_);
      if ($ag_ !== $Stdlib[8]) {
        throw $caml_wrap_thrown_exception_reraise($ag_) as \Throwable;
      }
      $temp_dir_name = $cst_tmp;
    }
    
    $quote = (dynamic $af_) : dynamic ==> {
      return $generic_quote($cst__3, $af_);
    };
    $basename = (dynamic $ae_) : dynamic ==> {
      return $generic_basename($is_dir_sep, $current_dir_name, $ae_);
    };
    $dirname = (dynamic $ad_) : dynamic ==> {
      return $generic_dirname($is_dir_sep, $current_dir_name, $ad_);
    };
    $is_dir_sep__0 = (dynamic $s, dynamic $i) : dynamic ==> {
      $ab_ = null as dynamic;
      $ac_ = null as dynamic;
      $c = $caml_string_get($s, $i);
      $aa_ = 47 === $c ? 1 : (0);
      if ($aa_) {
        $ab_ = $aa_;
      }
      else {
        $ac_ = 92 === $c ? 1 : (0);
        $ab_ = $ac_ ? $ac_ : (58 === $c ? 1 : (0));
      }
      return $ab_;
    };
    $is_relative__0 = (dynamic $n) : dynamic ==> {
      $W_ = null as dynamic;
      $X_ = null as dynamic;
      $Y_ = null as dynamic;
      $Z_ = null as dynamic;
      $U_ = $caml_ml_string_length($n) < 1 ? 1 : (0);
      $V_ = $U_ ? $U_ : (47 !== $caml_string_get($n, 0) ? 1 : (0));
      if ($V_) {
        $W_ = $caml_ml_string_length($n) < 1 ? 1 : (0);
        $X_ = $W_ ? $W_ : (92 !== $caml_string_get($n, 0) ? 1 : (0));
        if ($X_) {
          $Y_ = $caml_ml_string_length($n) < 2 ? 1 : (0);
          $Z_ = $Y_ ? $Y_ : (58 !== $caml_string_get($n, 1) ? 1 : (0));
        }
        else {$Z_ = $X_;}
      }
      else {$Z_ = $V_;}
      return $Z_;
    };
    $is_implicit__0 = (dynamic $n) : dynamic ==> {
      $M_ = null as dynamic;
      $N_ = null as dynamic;
      $O_ = null as dynamic;
      $P_ = null as dynamic;
      $Q_ = null as dynamic;
      $R_ = null as dynamic;
      $S_ = null as dynamic;
      $T_ = null as dynamic;
      $L_ = $is_relative__0($n);
      if ($L_) {
        $M_ = $caml_ml_string_length($n) < 2 ? 1 : (0);
        $N_ = $M_
          ? $M_
          : ($caml_string_notequal(
           $call3($Stdlib_string[4], $n, 0, 2),
           $cst__7
         ));
        if ($N_) {
          $O_ = $caml_ml_string_length($n) < 2 ? 1 : (0);
          $P_ = $O_
            ? $O_
            : ($caml_string_notequal(
             $call3($Stdlib_string[4], $n, 0, 2),
             $cst__6
           ));
          if ($P_) {
            $Q_ = $caml_ml_string_length($n) < 3 ? 1 : (0);
            $R_ = $Q_
              ? $Q_
              : ($caml_string_notequal(
               $call3($Stdlib_string[4], $n, 0, 3),
               $cst__5
             ));
            if ($R_) {
              $S_ = $caml_ml_string_length($n) < 3 ? 1 : (0);
              $T_ = $S_
                ? $S_
                : ($caml_string_notequal(
                 $call3($Stdlib_string[4], $n, 0, 3),
                 $cst__4
               ));
            }
            else {$T_ = $R_;}
          }
          else {$T_ = $P_;}
        }
        else {$T_ = $N_;}
      }
      else {$T_ = $L_;}
      return $T_;
    };
    $check_suffix__0 = (dynamic $name, dynamic $suff) : dynamic ==> {
      $J_ = null as dynamic;
      $K_ = null as dynamic;
      $s = null as dynamic;
      $I_ = $caml_ml_string_length($suff) <= $caml_ml_string_length($name)
        ? 1
        : (0);
      if ($I_) {
        $s = $call3(
          $Stdlib_string[4],
          $name,
          (int)
          ($caml_ml_string_length($name) - $caml_ml_string_length($suff)),
          $caml_ml_string_length($suff)
        );
        $J_ = $call1($Stdlib_string[30], $suff);
        $K_ = $caml_string_equal($call1($Stdlib_string[30], $s), $J_);
      }
      else {$K_ = $I_;}
      return $K_;
    };
    $chop_suffix_opt__0 = (dynamic $suffix, dynamic $filename) : dynamic ==> {
      $H_ = null as dynamic;
      $r = null as dynamic;
      $len_s = $caml_ml_string_length($suffix);
      $len_f = $caml_ml_string_length($filename);
      if ($len_s <= $len_f) {
        $r = $call3(
          $Stdlib_string[4],
          $filename,
          (int)
          ($len_f - $len_s),
          $len_s
        );
        $H_ = $call1($Stdlib_string[30], $suffix);
        return $caml_string_equal($call1($Stdlib_string[30], $r), $H_)
          ? Vector{
           0,
           $call3($Stdlib_string[4], $filename, 0, (int) ($len_f - $len_s))
         }
          : (0);
      }
      return 0;
    };
    
    try {$m_ = $caml_sys_getenv($cst_TEMP);$temp_dir_name__0 = $m_;}
    catch(\Throwable $G_) {
      $G_ = $runtime["caml_wrap_exception"]($G_);
      if ($G_ !== $Stdlib[8]) {
        throw $caml_wrap_thrown_exception_reraise($G_) as \Throwable;
      }
      $temp_dir_name__0 = $cst__8;
    }
    
    $quote__0 = (dynamic $s) : dynamic ==> {
      $loop_bs = new Ref();
      $l = $caml_ml_string_length($s);
      $b = $call1($Stdlib_buffer[1], (int) ($l + 20));
      $call2($Stdlib_buffer[10], $b, 34);
      $add_bs = (dynamic $n) : dynamic ==> {
        $F_ = null as dynamic;
        $j = null as dynamic;
        $E_ = 1 as dynamic;
        if (! ($n < 1)) {
          $j = $E_;
          for (;;) {
            $call2($Stdlib_buffer[10], $b, 92);
            $F_ = (int) ($j + 1) as dynamic;
            if ($n !== $j) {$j = $F_;continue;}
            break;
          }
        }
        return 0;
      };
      $loop__0 = (dynamic $counter, dynamic $i) : dynamic ==> {
        $C_ = null as dynamic;
        $D_ = null as dynamic;
        $c = null as dynamic;
        $counter__0 = null as dynamic;
        $counter__1 = null as dynamic;
        $i__1 = null as dynamic;
        $i__0 = $i;
        for (;;) {
          if ($i__0 === $l) {return $call2($Stdlib_buffer[10], $b, 34);}
          $c = $caml_string_get($s, $i__0);
          if (34 === $c) {
            $C_ = 0 as dynamic;
            if ($counter < 50) {
              $counter__1 = (int) ($counter + 1) as dynamic;
              return $loop_bs->contents($counter__1, $C_, $i__0);
            }
            return $caml_trampoline_return(
              $loop_bs->contents,
              varray[0,$C_,$i__0]
            );
          }
          if (92 === $c) {
            $D_ = 0 as dynamic;
            if ($counter < 50) {
              $counter__0 = (int) ($counter + 1) as dynamic;
              return $loop_bs->contents($counter__0, $D_, $i__0);
            }
            return $caml_trampoline_return(
              $loop_bs->contents,
              varray[0,$D_,$i__0]
            );
          }
          $call2($Stdlib_buffer[10], $b, $c);
          $i__1 = (int) ($i__0 + 1) as dynamic;
          $i__0 = $i__1;
          continue;
        }
      };
      $loop_bs->contents = (dynamic $counter, dynamic $n, dynamic $i) : dynamic ==> {
        $B_ = null as dynamic;
        $counter__0 = null as dynamic;
        $counter__1 = null as dynamic;
        $i__1 = null as dynamic;
        $match = null as dynamic;
        $n__1 = null as dynamic;
        $n__0 = $n;
        $i__0 = $i;
        for (;;) {
          if ($i__0 === $l) {
            $call2($Stdlib_buffer[10], $b, 34);
            return $add_bs($n__0);
          }
          $match = $caml_string_get($s, $i__0);
          if (34 === $match) {
            $add_bs((int) ((int) (2 * $n__0) + 1));
            $call2($Stdlib_buffer[10], $b, 34);
            $B_ = (int) ($i__0 + 1) as dynamic;
            if ($counter < 50) {
              $counter__1 = (int) ($counter + 1) as dynamic;
              return $loop__0($counter__1, $B_);
            }
            return $caml_trampoline_return($loop__0, varray[0,$B_]);
          }
          if (92 === $match) {
            $i__1 = (int) ($i__0 + 1) as dynamic;
            $n__1 = (int) ($n__0 + 1) as dynamic;
            $n__0 = $n__1;
            $i__0 = $i__1;
            continue;
          }
          $add_bs($n__0);
          if ($counter < 50) {
            $counter__0 = (int) ($counter + 1) as dynamic;
            return $loop__0($counter__0, $i__0);
          }
          return $caml_trampoline_return($loop__0, varray[0,$i__0]);
        }
      };
      $loop = (dynamic $i) : dynamic ==> {
        return $caml_trampoline($loop__0(0, $i));
      };
      $loop(0);
      return $call1($Stdlib_buffer[2], $b);
    };
    $has_drive = (dynamic $s) : dynamic ==> {
      $A_ = null as dynamic;
      $z_ = null as dynamic;
      $is_letter = (dynamic $param) : dynamic ==> {
        $switch__0 = 91 <= $param
          ? 25 < $unsigned_right_shift_32((int) ($param + -97), 0) ? 0 : (1)
          : (65 <= $param ? 1 : (0));
        return $switch__0 ? 1 : (0);
      };
      $y_ = 2 <= $caml_ml_string_length($s) ? 1 : (0);
      if ($y_) {
        $z_ = $is_letter($caml_string_get($s, 0));
        $A_ = $z_ ? 58 === $caml_string_get($s, 1) ? 1 : (0) : ($z_);
      }
      else {$A_ = $y_;}
      return $A_;
    };
    $drive_and_path = (dynamic $s) : dynamic ==> {
      $x_ = null as dynamic;
      if ($has_drive($s)) {
        $x_ = $call3(
          $Stdlib_string[4],
          $s,
          2,
          (int)
          ($caml_ml_string_length($s) + -2)
        );
        return Vector{0, $call3($Stdlib_string[4], $s, 0, 2), $x_};
      }
      return Vector{0, $cst__9, $s};
    };
    $dirname__0 = (dynamic $s) : dynamic ==> {
      $match = $drive_and_path($s);
      $path = $match[2];
      $drive = $match[1];
      $dir = $generic_dirname($is_dir_sep__0, $current_dir_name__0, $path);
      return $call2($Stdlib[28], $drive, $dir);
    };
    $basename__0 = (dynamic $s) : dynamic ==> {
      $match = $drive_and_path($s);
      $path = $match[2];
      return $generic_basename($is_dir_sep__0, $current_dir_name__0, $path);
    };
    $basename__1 = (dynamic $w_) : dynamic ==> {
      return $generic_basename($is_dir_sep__0, $current_dir_name__1, $w_);
    };
    $dirname__1 = (dynamic $v_) : dynamic ==> {
      return $generic_dirname($is_dir_sep__0, $current_dir_name__1, $v_);
    };
    $a_ = $Stdlib_sys[5];
    
    if ($caml_string_notequal($a_, $cst_Cygwin)) {
      if ($caml_string_notequal($a_, $cst_Win32)) {
        $current_dir_name__2 = $current_dir_name;
        $parent_dir_name__2 = $parent_dir_name;
        $dir_sep__2 = $dir_sep;
        $is_dir_sep__1 = $is_dir_sep;
        $is_relative__1 = $is_relative;
        $is_implicit__1 = $is_implicit;
        $check_suffix__1 = $check_suffix;
        $chop_suffix_opt__1 = $chop_suffix_opt;
        $temp_dir_name__1 = $temp_dir_name;
        $quote__1 = $quote;
        $basename__2 = $basename;
        $dirname__2 = $dirname;
        $switch__0 = 1 as dynamic;
      }
      else {
        $e_ = Vector{
          0,
          $current_dir_name__0,
          $parent_dir_name__0,
          $dir_sep__0,
          $is_dir_sep__0,
          $is_relative__0,
          $is_implicit__0,
          $check_suffix__0,
          $chop_suffix_opt__0,
          $temp_dir_name__0,
          $quote__0,
          $basename__0,
          $dirname__0
        } as dynamic;
        $switch__0 = 0 as dynamic;
      }
    }
    else {
      $e_ = Vector{
        0,
        $current_dir_name__1,
        $parent_dir_name__1,
        $dir_sep__1,
        $is_dir_sep__0,
        $is_relative__0,
        $is_implicit__0,
        $check_suffix__0,
        $chop_suffix_opt__0,
        $temp_dir_name,
        $quote,
        $basename__1,
        $dirname__1
      } as dynamic;
      $switch__0 = 0 as dynamic;
    }
    
    if (! $switch__0) {
      $f_ = $e_[12];
      $g_ = $e_[11];
      $h_ = $e_[10];
      $i_ = $e_[9];
      $j_ = $e_[3];
      $k_ = $e_[2];
      $l_ = $e_[1];
      $current_dir_name__2 = $l_;
      $parent_dir_name__2 = $k_;
      $dir_sep__2 = $j_;
      $is_dir_sep__1 = $is_dir_sep__0;
      $is_relative__1 = $is_relative__0;
      $is_implicit__1 = $is_implicit__0;
      $check_suffix__1 = $check_suffix__0;
      $chop_suffix_opt__1 = $chop_suffix_opt__0;
      $temp_dir_name__1 = $i_;
      $quote__1 = $h_;
      $basename__2 = $g_;
      $dirname__2 = $f_;
    }
    
    $concat = (dynamic $dirname, dynamic $filename) : dynamic ==> {
      $u_ = null as dynamic;
      $l = $caml_ml_string_length($dirname);
      if (0 !== $l) {
        if (! $is_dir_sep__1($dirname, (int) ($l + -1))) {
          $u_ = $call2($Stdlib[28], $dir_sep__2, $filename);
          return $call2($Stdlib[28], $dirname, $u_);
        }
      }
      return $call2($Stdlib[28], $dirname, $filename);
    };
    $chop_suffix = (dynamic $name, dynamic $suff) : dynamic ==> {
      $n = (int)
      ($caml_ml_string_length($name) - $caml_ml_string_length($suff)) as dynamic;
      return 0 <= $n
        ? $call3($Stdlib_string[4], $name, 0, $n)
        : ($call1($Stdlib[1], $cst_Filename_chop_suffix));
    };
    $extension_len = (dynamic $name) : dynamic ==> {
      $check = (dynamic $i0, dynamic $i) : dynamic ==> {
        $i__1 = null as dynamic;
        $i__0 = $i;
        for (;;) {
          if (0 <= $i__0) {
            if (! $is_dir_sep__1($name, $i__0)) {
              if (46 === $caml_string_get($name, $i__0)) {
                $i__1 = (int) ($i__0 + -1) as dynamic;
                $i__0 = $i__1;
                continue;
              }
              return (int) ($caml_ml_string_length($name) - $i0);
            }
          }
          return 0;
        }
      };
      $search_dot = (dynamic $i) : dynamic ==> {
        $i__1 = null as dynamic;
        $i__0 = $i;
        for (;;) {
          if (0 <= $i__0) {
            if (! $is_dir_sep__1($name, $i__0)) {
              if (46 === $caml_string_get($name, $i__0)) {return $check($i__0, (int) ($i__0 + -1));}
              $i__1 = (int) ($i__0 + -1) as dynamic;
              $i__0 = $i__1;
              continue;
            }
          }
          return 0;
        }
      };
      return $search_dot((int) ($caml_ml_string_length($name) + -1));
    };
    $extension = (dynamic $name) : dynamic ==> {
      $l = $extension_len($name);
      return 0 === $l
        ? $cst__10
        : ($call3(
         $Stdlib_string[4],
         $name,
         (int)
         ($caml_ml_string_length($name) - $l),
         $l
       ));
    };
    $chop_extension = (dynamic $name) : dynamic ==> {
      $l = $extension_len($name);
      return 0 === $l
        ? $call1($Stdlib[1], $cst_Filename_chop_extension)
        : ($call3(
         $Stdlib_string[4],
         $name,
         0,
         (int)
         ($caml_ml_string_length($name) - $l)
       ));
    };
    $remove_extension = (dynamic $name) : dynamic ==> {
      $l = $extension_len($name);
      return 0 === $l
        ? $name
        : ($call3(
         $Stdlib_string[4],
         $name,
         0,
         (int)
         ($caml_ml_string_length($name) - $l)
       ));
    };
    $prng = Vector{
      246,
      (dynamic $t_) : dynamic ==> {return $call1($Stdlib_random[11][2], 0);}
    } as dynamic;
    $temp_file_name = (dynamic $temp_dir, dynamic $prefix, dynamic $suffix) : dynamic ==> {
      $r_ = $runtime["caml_obj_tag"]($prng);
      $s_ = 250 === $r_
        ? $prng[1]
        : (246 === $r_ ? $call1($CamlinternalLazy[2], $prng) : ($prng));
      $rnd = $call1($Stdlib_random[11][4], $s_) & 16777215;
      return $concat(
        $temp_dir,
        $call4($Stdlib_printf[4], $b_, $prefix, $rnd, $suffix)
      );
    };
    $current_temp_dir_name = Vector{0, $temp_dir_name__1} as dynamic;
    $set_temp_dir_name = (dynamic $s) : dynamic ==> {
      $current_temp_dir_name[1] = $s;
      return 0;
    };
    $get_temp_dir_name = (dynamic $param) : dynamic ==> {
      return $current_temp_dir_name[1];
    };
    $temp_file = (dynamic $opt, dynamic $prefix, dynamic $suffix) : dynamic ==> {
      $sth = null as dynamic;
      $temp_dir = null as dynamic;
      if ($opt) {
        $sth = $opt[1];
        $temp_dir = $sth;
      }
      else {$temp_dir = $current_temp_dir_name[1];}
      $try_name = (dynamic $counter) : dynamic ==> {
        $counter__1 = null as dynamic;
        $name = null as dynamic;
        $counter__0 = $counter;
        for (;;) {
          $name = $temp_file_name($temp_dir, $prefix, $suffix);
          try {
            $runtime["caml_sys_close"](
              $runtime["caml_sys_open"]($name, $c_, 384)
            );
            return $name;
          }
          catch(\Throwable $e) {
            $e = $runtime["caml_wrap_exception"]($e);
            if ($e[1] === $Stdlib[11]) {
              if (1000 <= $counter__0) {
                throw $caml_wrap_thrown_exception_reraise($e) as \Throwable;
              }
              $counter__1 = (int) ($counter__0 + 1) as dynamic;
              $counter__0 = $counter__1;
              continue;
            }
            throw $caml_wrap_thrown_exception_reraise($e) as \Throwable;
          }
        }
      };
      return $try_name(0);
    };
    $open_temp_file = 
    (dynamic $opt, dynamic $p_, dynamic $o_, dynamic $prefix, dynamic $suffix) : dynamic ==> {
      $mode = null as dynamic;
      $perms = null as dynamic;
      $sth = null as dynamic;
      $sth__0 = null as dynamic;
      $sth__1 = null as dynamic;
      $temp_dir = null as dynamic;
      if ($opt) {
        $sth = $opt[1];
        $mode = $sth;
      }
      else {$mode = $d_;}
      if ($p_) {
        $sth__0 = $p_[1];
        $perms = $sth__0;
      }
      else {$perms = 384 as dynamic;}
      if ($o_) {
        $sth__1 = $o_[1];
        $temp_dir = $sth__1;
      }
      else {$temp_dir = $current_temp_dir_name[1];}
      $try_name = (dynamic $counter) : dynamic ==> {
        $counter__1 = null as dynamic;
        $name = null as dynamic;
        $q_ = null as dynamic;
        $counter__0 = $counter;
        for (;;) {
          $name = $temp_file_name($temp_dir, $prefix, $suffix);
          try {
            $q_ = Vector{
              0,
              $name,
              $call3(
                $Stdlib[62],
                Vector{0, 1, Vector{0, 3, Vector{0, 5, $mode}}},
                $perms,
                $name
              )
            } as dynamic;
            return $q_;
          }
          catch(\Throwable $e) {
            $e = $runtime["caml_wrap_exception"]($e);
            if ($e[1] === $Stdlib[11]) {
              if (1000 <= $counter__0) {
                throw $caml_wrap_thrown_exception_reraise($e) as \Throwable;
              }
              $counter__1 = (int) ($counter__0 + 1) as dynamic;
              $counter__0 = $counter__1;
              continue;
            }
            throw $caml_wrap_thrown_exception_reraise($e) as \Throwable;
          }
        }
      };
      return $try_name(0);
    };
    $Stdlib_filename = Vector{
      0,
      $current_dir_name__2,
      $parent_dir_name__2,
      $dir_sep__2,
      $concat,
      $is_relative__1,
      $is_implicit__1,
      $check_suffix__1,
      $chop_suffix,
      $chop_suffix_opt__1,
      $extension,
      $remove_extension,
      $chop_extension,
      $basename__2,
      $dirname__2,
      $temp_file,
      $open_temp_file,
      $get_temp_dir_name,
      $set_temp_dir_name,
      $temp_dir_name__1,
      $quote__1
    } as dynamic;
    
    return($Stdlib_filename);

  }
  public static function concat(dynamic $dirname, dynamic $filename): dynamic {
    return static::syncCall(__FUNCTION__, 4, $dirname, $filename);
  }
  public static function is_relative(dynamic $n): dynamic {
    return static::syncCall(__FUNCTION__, 5, $n);
  }
  public static function is_implicit(dynamic $n): dynamic {
    return static::syncCall(__FUNCTION__, 6, $n);
  }
  public static function check_suffix(dynamic $name, dynamic $suff): dynamic {
    return static::syncCall(__FUNCTION__, 7, $name, $suff);
  }
  public static function chop_suffix(dynamic $name, dynamic $suff): dynamic {
    return static::syncCall(__FUNCTION__, 8, $name, $suff);
  }
  public static function chop_suffix_opt(dynamic $suffix, dynamic $filename): dynamic {
    return static::syncCall(__FUNCTION__, 9, $suffix, $filename);
  }
  public static function extension(dynamic $name): dynamic {
    return static::syncCall(__FUNCTION__, 10, $name);
  }
  public static function remove_extension(dynamic $name): dynamic {
    return static::syncCall(__FUNCTION__, 11, $name);
  }
  public static function chop_extension(dynamic $name): dynamic {
    return static::syncCall(__FUNCTION__, 12, $name);
  }
  public static function basename(dynamic $unnamed1): dynamic {
    return static::syncCall(__FUNCTION__, 13, $unnamed1);
  }
  public static function dirname(dynamic $unnamed1): dynamic {
    return static::syncCall(__FUNCTION__, 14, $unnamed1);
  }
  public static function temp_file(dynamic $opt, dynamic $prefix, dynamic $suffix): dynamic {
    return static::syncCall(__FUNCTION__, 15, $opt, $prefix, $suffix);
  }
  public static function open_temp_file(dynamic $opt, dynamic $unnamed1, dynamic $unnamed2, dynamic $prefix, dynamic $suffix): dynamic {
    return static::syncCall(__FUNCTION__, 16, $opt, $unnamed1, $unnamed2, $prefix, $suffix);
  }
  public static function get_temp_dir_name(dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 17, $param);
  }
  public static function set_temp_dir_name(dynamic $s): dynamic {
    return static::syncCall(__FUNCTION__, 18, $s);
  }
  public static function quote(dynamic $unnamed1): dynamic {
    return static::syncCall(__FUNCTION__, 20, $unnamed1);
  }

}
/* Hashing disabled */
