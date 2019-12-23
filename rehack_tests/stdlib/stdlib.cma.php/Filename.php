<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class Filename {
  <<__Override, __Memoize>>
  public static function requireModule() : Vector<dynamic> {
    $joo_global_object = \Rehack\GlobalObject::get() as dynamic;
    
    $runtime = $joo_global_object->jsoo_runtime;
    $temp_dir_name = null;
    $temp_dir_name__0 = null;
    $dirname__2 = null;
    $basename__2 = null;
    $quote__1 = null;
    $temp_dir_name__1 = null;
    $check_suffix__1 = null;
    $is_implicit__1 = null;
    $is_relative__1 = null;
    $is_dir_sep__1 = null;
    $dir_sep__2 = null;
    $parent_dir_name__2 = null;
    $current_dir_name__2 = null;
    $f_ = null;
    $g_ = null;
    $h_ = null;
    $switch__0 = null;
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
    $cst__9 = $string("");
    $cst_Filename_chop_suffix = $string("Filename.chop_suffix");
    $cst__8 = $string("");
    $cst__6 = $string("./");
    $cst__5 = $string(".\\");
    $cst__4 = $string("../");
    $cst__3 = $string("..\\");
    $cst__2 = $string("./");
    $cst__1 = $string("../");
    $cst__0 = $string("");
    $cst = $string("");
    $current_dir_name = $string(".");
    $parent_dir_name = $string("..");
    $dir_sep = $string("/");
    $cst_TMPDIR = $string("TMPDIR");
    $cst_tmp = $string("/tmp");
    $quotequote = $string("'\\''");
    $current_dir_name__0 = $string(".");
    $parent_dir_name__0 = $string("..");
    $dir_sep__0 = $string("\\");
    $cst_TEMP = $string("TEMP");
    $cst__7 = $string(".");
    $current_dir_name__1 = $string(".");
    $parent_dir_name__1 = $string("..");
    $dir_sep__1 = $string("/");
    $cst_Cygwin = $string("Cygwin");
    $cst_Win32 = $string("Win32");
    $Pervasives =  Pervasives::requireModule ();
    $Sys_error =  Sys_error::requireModule ();
    $CamlinternalLazy =  CamlinternalLazy::requireModule ();
    $Random =  Random::requireModule ();
    $Printf =  Printf::requireModule ();
    $String =  String_::requireModule ();
    $Buffer =  Buffer::requireModule ();
    $Not_found =  Not_found::requireModule ();
    $Sys =  Sys::requireModule ();
    $e_ = Vector{0, 7, 0} as dynamic;
    $d_ = Vector{0, 1, Vector{0, 3, Vector{0, 5, 0}}} as dynamic;
    $c_ = Vector{
      0,
      Vector{2, 0, Vector{4, 6, Vector{0, 2, 6}, 0, Vector{2, 0, 0}}},
      $string("%s%06x%s")
    } as dynamic;
    $generic_basename = 
    (dynamic $is_dir_sep, dynamic $current_dir_name, dynamic $name) ==> {
      $n__2 = null;
      $n__1 = null;
      $p = null;
      $n__0 = null;
      if ($caml_string_equal($name, $cst)) {return $current_dir_name;}
      $n__3 = (int) ($caml_ml_string_length($name) + -1);
      $n = $n__3;
      for (;;) {
        if (0 <= $n) {
          if ($call2($is_dir_sep, $name, $n)) {
            $n__0 = (int) ($n + -1);
            $n = $n__0;
            continue;
          }
          $p = (int) ($n + 1);
          $n__1 = $n;
          for (;;) {
            if (0 <= $n__1) {
              if ($call2($is_dir_sep, $name, $n__1)) {
                return $call3(
                  $String[4],
                  $name,
                  (int)
                  ($n__1 + 1),
                  (int)
                  ((int) ($p - $n__1) + -1)
                );
              }
              $n__2 = (int) ($n__1 + -1);
              $n__1 = $n__2;
              continue;
            }
            return $call3($String[4], $name, 0, $p);
          }
        }
        return $call3($String[4], $name, 0, 1);
      }
    };
    $generic_dirname = 
    (dynamic $is_dir_sep, dynamic $current_dir_name, dynamic $name) ==> {
      $n__4 = null;
      $n__3 = null;
      $n__2 = null;
      $n__1 = null;
      $n__0 = null;
      if ($caml_string_equal($name, $cst__0)) {return $current_dir_name;}
      $n__5 = (int) ($caml_ml_string_length($name) + -1);
      $n = $n__5;
      for (;;) {
        if (0 <= $n) {
          if ($call2($is_dir_sep, $name, $n)) {
            $n__0 = (int) ($n + -1);
            $n = $n__0;
            continue;
          }
          $n__1 = $n;
          for (;;) {
            if (0 <= $n__1) {
              if ($call2($is_dir_sep, $name, $n__1)) {
                $n__3 = $n__1;
                for (;;) {
                  if (0 <= $n__3) {
                    if ($call2($is_dir_sep, $name, $n__3)) {
                      $n__4 = (int) ($n__3 + -1);
                      $n__3 = $n__4;
                      continue;
                    }
                    return $call3($String[4], $name, 0, (int) ($n__3 + 1));
                  }
                  return $call3($String[4], $name, 0, 1);
                }
              }
              $n__2 = (int) ($n__1 + -1);
              $n__1 = $n__2;
              continue;
            }
            return $current_dir_name;
          }
        }
        return $call3($String[4], $name, 0, 1);
      }
    };
    $is_dir_sep = (dynamic $s, dynamic $i) ==> {
      return 47 === $caml_string_get($s, $i) ? 1 : (0);
    };
    $is_relative = (dynamic $n) ==> {
      $ak_ = $caml_ml_string_length($n) < 1 ? 1 : (0);
      $al_ = $ak_ ? $ak_ : (47 !== $caml_string_get($n, 0) ? 1 : (0));
      return $al_;
    };
    $is_implicit = (dynamic $n) ==> {
      $ag_ = null;
      $ah_ = null;
      $ai_ = null;
      $aj_ = null;
      $af_ = $is_relative($n);
      if ($af_) {
        $ag_ = $caml_ml_string_length($n) < 2 ? 1 : (0);
        $ah_ =
          $ag_
            ? $ag_
            : ($caml_string_notequal($call3($String[4], $n, 0, 2), $cst__2));
        if ($ah_) {
          $ai_ = $caml_ml_string_length($n) < 3 ? 1 : (0);
          $aj_ =
            $ai_
              ? $ai_
              : ($caml_string_notequal($call3($String[4], $n, 0, 3), $cst__1));
        }
        else {$aj_ = $ah_;}
      }
      else {$aj_ = $af_;}
      return $aj_;
    };
    $check_suffix = (dynamic $name, dynamic $suff) ==> {
      $ad_ = $caml_ml_string_length($suff) <= $caml_ml_string_length($name)
        ? 1
        : (0);
      $ae_ = $ad_
        ? $caml_string_equal(
         $call3(
           $String[4],
           $name,
           (int)
           ($caml_ml_string_length($name) - $caml_ml_string_length($suff)),
           $caml_ml_string_length($suff)
         ),
         $suff
       )
        : ($ad_);
      return $ae_;
    };
    
    try {$h_ = $caml_sys_getenv($cst_TMPDIR);$temp_dir_name = $h_;}
    catch(\Throwable $ac_) {
      $ac_ = $runtime["caml_wrap_exception"]($ac_);
      if ($ac_ !== $Not_found) {
        throw $caml_wrap_thrown_exception_reraise($ac_) as \Throwable;
      }
      $temp_dir_name = $cst_tmp;
    }
    
    $quote = (dynamic $s) ==> {
      $i = null;
      $aa_ = null;
      $ab_ = null;
      $l = $caml_ml_string_length($s);
      $b = $call1($Buffer[1], (int) ($l + 20));
      $call2($Buffer[10], $b, 39);
      $Z_ = (int) ($l + -1);
      $Y_ = 0;
      if (! ($Z_ < 0)) {
        $i = $Y_;
        for (;;) {
          if (39 === $caml_string_get($s, $i)) {
            $call2($Buffer[14], $b, $quotequote);
          }
          else {$ab_ = $caml_string_get($s, $i);$call2($Buffer[10], $b, $ab_);
          }
          $aa_ = (int) ($i + 1);
          if ($Z_ !== $i) {$i = $aa_;continue;}
          break;
        }
      }
      $call2($Buffer[10], $b, 39);
      return $call1($Buffer[2], $b);
    };
    $basename = (dynamic $X_) ==> {
      return $generic_basename($is_dir_sep, $current_dir_name, $X_);
    };
    $dirname = (dynamic $W_) ==> {
      return $generic_dirname($is_dir_sep, $current_dir_name, $W_);
    };
    $is_dir_sep__0 = (dynamic $s, dynamic $i) ==> {
      $U_ = null;
      $V_ = null;
      $c = $caml_string_get($s, $i);
      $T_ = 47 === $c ? 1 : (0);
      if ($T_) {
        $U_ = $T_;
      }
      else {$V_ = 92 === $c ? 1 : (0);$U_ = $V_ ? $V_ : (58 === $c ? 1 : (0));
      }
      return $U_;
    };
    $is_relative__0 = (dynamic $n) ==> {
      $P_ = null;
      $Q_ = null;
      $R_ = null;
      $S_ = null;
      $N_ = $caml_ml_string_length($n) < 1 ? 1 : (0);
      $O_ = $N_ ? $N_ : (47 !== $caml_string_get($n, 0) ? 1 : (0));
      if ($O_) {
        $P_ = $caml_ml_string_length($n) < 1 ? 1 : (0);
        $Q_ = $P_ ? $P_ : (92 !== $caml_string_get($n, 0) ? 1 : (0));
        if ($Q_) {
          $R_ = $caml_ml_string_length($n) < 2 ? 1 : (0);
          $S_ = $R_ ? $R_ : (58 !== $caml_string_get($n, 1) ? 1 : (0));
        }
        else {$S_ = $Q_;}
      }
      else {$S_ = $O_;}
      return $S_;
    };
    $is_implicit__0 = (dynamic $n) ==> {
      $F_ = null;
      $G_ = null;
      $H_ = null;
      $I_ = null;
      $J_ = null;
      $K_ = null;
      $L_ = null;
      $M_ = null;
      $E_ = $is_relative__0($n);
      if ($E_) {
        $F_ = $caml_ml_string_length($n) < 2 ? 1 : (0);
        $G_ =
          $F_
            ? $F_
            : ($caml_string_notequal($call3($String[4], $n, 0, 2), $cst__6));
        if ($G_) {
          $H_ = $caml_ml_string_length($n) < 2 ? 1 : (0);
          $I_ =
            $H_
              ? $H_
              : ($caml_string_notequal($call3($String[4], $n, 0, 2), $cst__5));
          if ($I_) {
            $J_ = $caml_ml_string_length($n) < 3 ? 1 : (0);
            $K_ =
              $J_
                ? $J_
                : ($caml_string_notequal($call3($String[4], $n, 0, 3), $cst__4
               ));
            if ($K_) {
              $L_ = $caml_ml_string_length($n) < 3 ? 1 : (0);
              $M_ =
                $L_
                  ? $L_
                  : ($caml_string_notequal(
                   $call3($String[4], $n, 0, 3),
                   $cst__3
                 ));
            }
            else {$M_ = $K_;}
          }
          else {$M_ = $I_;}
        }
        else {$M_ = $G_;}
      }
      else {$M_ = $E_;}
      return $M_;
    };
    $check_suffix__0 = (dynamic $name, dynamic $suff) ==> {
      $s = null;
      $C_ = null;
      $D_ = null;
      $B_ = $caml_ml_string_length($suff) <= $caml_ml_string_length($name)
        ? 1
        : (0);
      if ($B_) {
        $s =
          $call3(
            $String[4],
            $name,
            (int)
            ($caml_ml_string_length($name) - $caml_ml_string_length($suff)),
            $caml_ml_string_length($suff)
          );
        $C_ = $call1($String[30], $suff);
        $D_ = $caml_string_equal($call1($String[30], $s), $C_);
      }
      else {$D_ = $B_;}
      return $D_;
    };
    
    try {$g_ = $caml_sys_getenv($cst_TEMP);$temp_dir_name__0 = $g_;}
    catch(\Throwable $A_) {
      $A_ = $runtime["caml_wrap_exception"]($A_);
      if ($A_ !== $Not_found) {
        throw $caml_wrap_thrown_exception_reraise($A_) as \Throwable;
      }
      $temp_dir_name__0 = $cst__7;
    }
    
    $quote__0 = (dynamic $s) ==> {
      $loop_bs = new Ref();
      $l = $caml_ml_string_length($s);
      $b = $call1($Buffer[1], (int) ($l + 20));
      $call2($Buffer[10], $b, 34);
      $add_bs = (dynamic $n) ==> {
        $j = null;
        $z_ = null;
        $y_ = 1;
        if (! ($n < 1)) {
          $j = $y_;
          for (;;) {
            $call2($Buffer[10], $b, 92);
            $z_ = (int) ($j + 1);
            if ($n !== $j) {$j = $z_;continue;}
            break;
          }
        }
        return 0;
      };
      $loop__0 = (dynamic $counter, dynamic $i) ==> {
        $c = null;
        $w_ = null;
        $x_ = null;
        $i__1 = null;
        $counter__0 = null;
        $counter__1 = null;
        $i__0 = $i;
        for (;;) {
          if ($i__0 === $l) {return $call2($Buffer[10], $b, 34);}
          $c = $caml_string_get($s, $i__0);
          if (34 === $c) {
            $w_ = 0;
            if ($counter < 50) {
              $counter__1 = (int) ($counter + 1);
              return $loop_bs->contents($counter__1, $w_, $i__0);
            }
            return $caml_trampoline_return(
              $loop_bs->contents,
              varray[0,$w_,$i__0]
            );
          }
          if (92 === $c) {
            $x_ = 0;
            if ($counter < 50) {
              $counter__0 = (int) ($counter + 1);
              return $loop_bs->contents($counter__0, $x_, $i__0);
            }
            return $caml_trampoline_return(
              $loop_bs->contents,
              varray[0,$x_,$i__0]
            );
          }
          $call2($Buffer[10], $b, $c);
          $i__1 = (int) ($i__0 + 1);
          $i__0 = $i__1;
          continue;
        }
      };
      $loop_bs->contents = (dynamic $counter, dynamic $n, dynamic $i) ==> {
        $match = null;
        $v_ = null;
        $i__1 = null;
        $n__1 = null;
        $counter__0 = null;
        $counter__1 = null;
        $n__0 = $n;
        $i__0 = $i;
        for (;;) {
          if ($i__0 === $l) {
            $call2($Buffer[10], $b, 34);
            return $add_bs($n__0);
          }
          $match = $caml_string_get($s, $i__0);
          if (34 === $match) {
            $add_bs((int) ((int) (2 * $n__0) + 1));
            $call2($Buffer[10], $b, 34);
            $v_ = (int) ($i__0 + 1);
            if ($counter < 50) {
              $counter__1 = (int) ($counter + 1);
              return $loop__0($counter__1, $v_);
            }
            return $caml_trampoline_return($loop__0, varray[0,$v_]);
          }
          if (92 === $match) {
            $i__1 = (int) ($i__0 + 1);
            $n__1 = (int) ($n__0 + 1);
            $n__0 = $n__1;
            $i__0 = $i__1;
            continue;
          }
          $add_bs($n__0);
          if ($counter < 50) {
            $counter__0 = (int) ($counter + 1);
            return $loop__0($counter__0, $i__0);
          }
          return $caml_trampoline_return($loop__0, varray[0,$i__0]);
        }
      };
      $loop = (dynamic $i) ==> {return $caml_trampoline($loop__0(0, $i));};
      $loop(0);
      return $call1($Buffer[2], $b);
    };
    $drive_and_path = (dynamic $s) ==> {
      $param = null;
      $s_ = null;
      $t_ = null;
      $u_ = null;
      $switch__0 = null;
      $r_ = 2 <= $caml_ml_string_length($s) ? 1 : (0);
      if ($r_) {
        $param = $caml_string_get($s, 0);
        $switch__0 =
          91 <= $param
            ? 25 < $unsigned_right_shift_32((int) ($param + -97), 0) ? 0 : (1)
            : (65 <= $param ? 1 : (0));
        $s_ = $switch__0 ? 1 : (0);
        $t_ = $s_ ? 58 === $caml_string_get($s, 1) ? 1 : (0) : ($s_);
      }
      else {$t_ = $r_;}
      if ($t_) {
        $u_ =
          $call3($String[4], $s, 2, (int) ($caml_ml_string_length($s) + -2));
        return Vector{0, $call3($String[4], $s, 0, 2), $u_};
      }
      return Vector{0, $cst__8, $s};
    };
    $dirname__0 = (dynamic $s) ==> {
      $match = $drive_and_path($s);
      $path = $match[2];
      $drive = $match[1];
      $dir = $generic_dirname($is_dir_sep__0, $current_dir_name__0, $path);
      return $call2($Pervasives[16], $drive, $dir);
    };
    $basename__0 = (dynamic $s) ==> {
      $match = $drive_and_path($s);
      $path = $match[2];
      return $generic_basename($is_dir_sep__0, $current_dir_name__0, $path);
    };
    $basename__1 = (dynamic $q_) ==> {
      return $generic_basename($is_dir_sep__0, $current_dir_name__1, $q_);
    };
    $dirname__1 = (dynamic $p_) ==> {
      return $generic_dirname($is_dir_sep__0, $current_dir_name__1, $p_);
    };
    $a_ = $Sys[5];
    
    if ($caml_string_notequal($a_, $cst_Cygwin)) {
      if ($caml_string_notequal($a_, $cst_Win32)) {
        $current_dir_name__2 = $current_dir_name;
        $parent_dir_name__2 = $parent_dir_name;
        $dir_sep__2 = $dir_sep;
        $is_dir_sep__1 = $is_dir_sep;
        $is_relative__1 = $is_relative;
        $is_implicit__1 = $is_implicit;
        $check_suffix__1 = $check_suffix;
        $temp_dir_name__1 = $temp_dir_name;
        $quote__1 = $quote;
        $basename__2 = $basename;
        $dirname__2 = $dirname;
        $switch__0 = 1;
      }
      else {
        $f_ =
          Vector{
            0,
            $current_dir_name__0,
            $parent_dir_name__0,
            $dir_sep__0,
            $is_dir_sep__0,
            $is_relative__0,
            $is_implicit__0,
            $check_suffix__0,
            $temp_dir_name__0,
            $quote__0,
            $basename__0,
            $dirname__0
          };
        $switch__0 = 0;
      }
    }
    else {
      $f_ =
        Vector{
          0,
          $current_dir_name__1,
          $parent_dir_name__1,
          $dir_sep__1,
          $is_dir_sep__0,
          $is_relative__0,
          $is_implicit__0,
          $check_suffix__0,
          $temp_dir_name,
          $quote,
          $basename__1,
          $dirname__1
        };
      $switch__0 = 0;
    }
    
    if (! $switch__0) {
      $current_dir_name__2 = $f_[1];
      $parent_dir_name__2 = $f_[2];
      $dir_sep__2 = $f_[3];
      $is_dir_sep__1 = $is_dir_sep__0;
      $is_relative__1 = $is_relative__0;
      $is_implicit__1 = $is_implicit__0;
      $check_suffix__1 = $check_suffix__0;
      $temp_dir_name__1 = $f_[8];
      $quote__1 = $f_[9];
      $basename__2 = $f_[10];
      $dirname__2 = $f_[11];
    }
    
    $concat = (dynamic $dirname, dynamic $filename) ==> {
      $o_ = null;
      $l = $caml_ml_string_length($dirname);
      if (0 !== $l) {
        if (! $is_dir_sep__1($dirname, (int) ($l + -1))) {
          $o_ = $call2($Pervasives[16], $dir_sep__2, $filename);
          return $call2($Pervasives[16], $dirname, $o_);
        }
      }
      return $call2($Pervasives[16], $dirname, $filename);
    };
    $chop_suffix = (dynamic $name, dynamic $suff) ==> {
      $n = (int)
      ($caml_ml_string_length($name) - $caml_ml_string_length($suff));
      return 0 <= $n
        ? $call3($String[4], $name, 0, $n)
        : ($call1($Pervasives[1], $cst_Filename_chop_suffix));
    };
    $extension_len = (dynamic $name) ==> {
      $i = null;
      $i__0 = null;
      $i__2 = null;
      $i__3 = null;
      $i__4 = (int) ($caml_ml_string_length($name) + -1);
      $i__1 = $i__4;
      for (;;) {
        if (0 <= $i__1) {
          if (! $is_dir_sep__1($name, $i__1)) {
            if (46 === $caml_string_get($name, $i__1)) {
              $i__2 = (int) ($i__1 + -1);
              $i = $i__2;
              for (;;) {
                if (0 <= $i) {
                  if (! $is_dir_sep__1($name, $i)) {
                    if (46 === $caml_string_get($name, $i)) {
                      $i__0 = (int) ($i + -1);
                      $i = $i__0;
                      continue;
                    }
                    return (int) ($caml_ml_string_length($name) - $i__1);
                  }
                }
                return 0;
              }
            }
            $i__3 = (int) ($i__1 + -1);
            $i__1 = $i__3;
            continue;
          }
        }
        return 0;
      }
    };
    $extension = (dynamic $name) ==> {
      $l = $extension_len($name);
      return 0 === $l
        ? $cst__9
        : ($call3(
         $String[4],
         $name,
         (int)
         ($caml_ml_string_length($name) - $l),
         $l
       ));
    };
    $chop_extension = (dynamic $name) ==> {
      $l = $extension_len($name);
      return 0 === $l
        ? $call1($Pervasives[1], $cst_Filename_chop_extension)
        : ($call3(
         $String[4],
         $name,
         0,
         (int)
         ($caml_ml_string_length($name) - $l)
       ));
    };
    $remove_extension = (dynamic $name) ==> {
      $l = $extension_len($name);
      return 0 === $l
        ? $name
        : ($call3(
         $String[4],
         $name,
         0,
         (int)
         ($caml_ml_string_length($name) - $l)
       ));
    };
    $b_ = (dynamic $n_) ==> {return $call1($Random[11][2], 0);};
    $prng = Vector{246, $b_} as dynamic;
    $temp_file_name = (dynamic $temp_dir, dynamic $prefix, dynamic $suffix) ==> {
      $l_ = $runtime["caml_obj_tag"]($prng);
      $m_ = 250 === $l_
        ? $b_
        : (246 === $l_ ? $call1($CamlinternalLazy[2], $prng) : ($prng));
      $rnd = $call1($Random[11][4], $m_) & 16777215;
      return $concat(
        $temp_dir,
        $call4($Printf[4], $c_, $prefix, $rnd, $suffix)
      );
    };
    $current_temp_dir_name = Vector{0, $temp_dir_name__1} as dynamic;
    $set_temp_dir_name = (dynamic $s) ==> {
      $current_temp_dir_name[1] = $s;
      return 0;
    };
    $get_temp_dir_name = (dynamic $param) ==> {
      return $current_temp_dir_name[1];
    };
    $temp_file = (dynamic $opt, dynamic $prefix, dynamic $suffix) ==> {
      $temp_dir = null;
      $sth = null;
      if ($opt) {
        $sth = $opt[1];
        $temp_dir = $sth;
      }
      else {$temp_dir = $current_temp_dir_name[1];}
      $try_name = (dynamic $counter) ==> {
        $name = null;
        $counter__1 = null;
        $counter__0 = $counter;
        for (;;) {
          $name = $temp_file_name($temp_dir, $prefix, $suffix);
          try {
            $runtime["caml_sys_close"](
              $runtime["caml_sys_open"]($name, $d_, 384)
            );
            return $name;
          }
          catch(\Throwable $e) {
            $e = $runtime["caml_wrap_exception"]($e);
            if ($e[1] === $Sys_error) {
              if (1000 <= $counter__0) {
                throw $caml_wrap_thrown_exception_reraise($e) as \Throwable;
              }
              $counter__1 = (int) ($counter__0 + 1);
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
    (dynamic $opt, dynamic $j_, dynamic $i_, dynamic $prefix, dynamic $suffix) ==> {
      $temp_dir = null;
      $sth__1 = null;
      $perms = null;
      $sth__0 = null;
      $mode = null;
      $sth = null;
      if ($opt) {
        $sth = $opt[1];
        $mode = $sth;
      }
      else {$mode = $e_;}
      if ($j_) {
        $sth__0 = $j_[1];
        $perms = $sth__0;
      }
      else {$perms = 384;}
      if ($i_) {
        $sth__1 = $i_[1];
        $temp_dir = $sth__1;
      }
      else {$temp_dir = $current_temp_dir_name[1];}
      $try_name = (dynamic $counter) ==> {
        $name = null;
        $counter__1 = null;
        $k_ = null;
        $counter__0 = $counter;
        for (;;) {
          $name = $temp_file_name($temp_dir, $prefix, $suffix);
          try {
            $k_ =
              Vector{
                0,
                $name,
                $call3(
                  $Pervasives[50],
                  Vector{0, 1, Vector{0, 3, Vector{0, 5, $mode}}},
                  $perms,
                  $name
                )
              };
            return $k_;
          }
          catch(\Throwable $e) {
            $e = $runtime["caml_wrap_exception"]($e);
            if ($e[1] === $Sys_error) {
              if (1000 <= $counter__0) {
                throw $caml_wrap_thrown_exception_reraise($e) as \Throwable;
              }
              $counter__1 = (int) ($counter__0 + 1);
              $counter__0 = $counter__1;
              continue;
            }
            throw $caml_wrap_thrown_exception_reraise($e) as \Throwable;
          }
        }
      };
      return $try_name(0);
    };
    $Filename = Vector{
      0,
      $current_dir_name__2,
      $parent_dir_name__2,
      $dir_sep__2,
      $concat,
      $is_relative__1,
      $is_implicit__1,
      $check_suffix__1,
      $chop_suffix,
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
    
     return ($Filename);

  }
  public static function concat(dynamic $dirname, dynamic $filename): dynamic {
    return static::callRehackFunction(static::requireModule()[4], varray[$dirname, $filename]);
  }
  public static function chop_suffix(dynamic $name, dynamic $suff): dynamic {
    return static::callRehackFunction(static::requireModule()[8], varray[$name, $suff]);
  }
  public static function extension(dynamic $name): dynamic {
    return static::callRehackFunction(static::requireModule()[9], varray[$name]);
  }
  public static function remove_extension(dynamic $name): dynamic {
    return static::callRehackFunction(static::requireModule()[10], varray[$name]);
  }
  public static function chop_extension(dynamic $name): dynamic {
    return static::callRehackFunction(static::requireModule()[11], varray[$name]);
  }
  public static function temp_file(dynamic $opt, dynamic $prefix, dynamic $suffix): dynamic {
    return static::callRehackFunction(static::requireModule()[14], varray[$opt, $prefix, $suffix]);
  }
  public static function open_temp_file(dynamic $opt, dynamic $unnamed1, dynamic $unnamed2, dynamic $prefix, dynamic $suffix): dynamic {
    return static::callRehackFunction(static::requireModule()[15], varray[$opt, $unnamed1, $unnamed2, $prefix, $suffix]);
  }
  public static function get_temp_dir_name(dynamic $param): dynamic {
    return static::callRehackFunction(static::requireModule()[16], varray[$param]);
  }
  public static function set_temp_dir_name(dynamic $s): dynamic {
    return static::callRehackFunction(static::requireModule()[17], varray[$s]);
  }

}
/* Hashing disabled */
