<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class Filename {
  <<__Override, __Memoize>>
  public static function get() : Vector<dynamic> {
    $joo_global_object = \Rehack\GlobalObject::get() as dynamic;
    
    $runtime = $joo_global_object->jsoo_runtime;
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
    $Pervasives =  Pervasives::get ();
    $Sys_error =  Sys_error::get ();
    $CamlinternalLazy =  CamlinternalLazy::get ();
    $Random =  Random::get ();
    $Printf =  Printf::get ();
    $String =  String_::get ();
    $Buffer =  Buffer::get ();
    $Not_found =  Not_found::get ();
    $Sys =  Sys::get ();
    $e_ = Vector{0, 7, 0};
    $d_ = Vector{0, 1, Vector{0, 3, Vector{0, 5, 0}}};
    $c_ = Vector{
      0,
      Vector{2, 0, Vector{4, 6, Vector{0, 2, 6}, 0, Vector{2, 0, 0}}},
      $string("%s%06x%s")
    };
    $generic_quote = (dynamic $quotequote, dynamic $s) ==> {
      $l = $caml_ml_string_length($s);
      $b = $call1($Buffer[1], (int) ($l + 20));
      $call2($Buffer[10], $b, 39);
      $ar_ = (int) ($l + -1);
      $aq_ = 0;
      if (! ($ar_ < 0)) {
        $i = $aq_;
        for (;;) {
          if (39 === $caml_string_get($s, $i)) {
            $call2($Buffer[14], $b, $quotequote);
          }
          else {$at_ = $caml_string_get($s, $i);$call2($Buffer[10], $b, $at_);
          }
          $as_ = (int) ($i + 1);
          if ($ar_ !== $i) {$i = $as_;continue;}
          break;
        }
      }
      $call2($Buffer[10], $b, 39);
      return $call1($Buffer[2], $b);
    };
    $generic_basename = 
    (dynamic $is_dir_sep, dynamic $current_dir_name, dynamic $name) ==> {
      $find_beg = (dynamic $n, dynamic $p) ==> {
        $n__0 = $n;
        for (;;) {
          if (0 <= $n__0) {
            if ($call2($is_dir_sep, $name, $n__0)) {
              return $call3(
                $String[4],
                $name,
                (int)
                ($n__0 + 1),
                (int)
                ((int) ($p - $n__0) + -1)
              );
            }
            $n__1 = (int) ($n__0 + -1);
            $n__0 = $n__1;
            continue;
          }
          return $call3($String[4], $name, 0, $p);
        }
      };
      $find_end = (dynamic $n) ==> {
        $n__0 = $n;
        for (;;) {
          if (0 <= $n__0) {
            if ($call2($is_dir_sep, $name, $n__0)) {
              $n__1 = (int) ($n__0 + -1);
              $n__0 = $n__1;
              continue;
            }
            return $find_beg($n__0, (int) ($n__0 + 1));
          }
          return $call3($String[4], $name, 0, 1);
        }
      };
      return $caml_string_equal($name, $cst)
        ? $current_dir_name
        : ($find_end((int) ($caml_ml_string_length($name) + -1)));
    };
    $generic_dirname = 
    (dynamic $is_dir_sep, dynamic $current_dir_name, dynamic $name) ==> {
      $intermediate_sep = (dynamic $n) ==> {
        $n__0 = $n;
        for (;;) {
          if (0 <= $n__0) {
            if ($call2($is_dir_sep, $name, $n__0)) {
              $n__1 = (int) ($n__0 + -1);
              $n__0 = $n__1;
              continue;
            }
            return $call3($String[4], $name, 0, (int) ($n__0 + 1));
          }
          return $call3($String[4], $name, 0, 1);
        }
      };
      $base = (dynamic $n) ==> {
        $n__0 = $n;
        for (;;) {
          if (0 <= $n__0) {
            if ($call2($is_dir_sep, $name, $n__0)) {return $intermediate_sep($n__0);}
            $n__1 = (int) ($n__0 + -1);
            $n__0 = $n__1;
            continue;
          }
          return $current_dir_name;
        }
      };
      $trailing_sep = (dynamic $n) ==> {
        $n__0 = $n;
        for (;;) {
          if (0 <= $n__0) {
            if ($call2($is_dir_sep, $name, $n__0)) {
              $n__1 = (int) ($n__0 + -1);
              $n__0 = $n__1;
              continue;
            }
            return $base($n__0);
          }
          return $call3($String[4], $name, 0, 1);
        }
      };
      return $caml_string_equal($name, $cst__0)
        ? $current_dir_name
        : ($trailing_sep((int) ($caml_ml_string_length($name) + -1)));
    };
    $is_dir_sep = (dynamic $s, dynamic $i) ==> {
      return 47 === $caml_string_get($s, $i) ? 1 : (0);
    };
    $is_relative = (dynamic $n) ==> {
      $ao_ = $caml_ml_string_length($n) < 1 ? 1 : (0);
      $ap_ = $ao_ ? $ao_ : (47 !== $caml_string_get($n, 0) ? 1 : (0));
      return $ap_;
    };
    $is_implicit = (dynamic $n) ==> {
      $aj_ = $is_relative($n);
      if ($aj_) {
        $ak_ = $caml_ml_string_length($n) < 2 ? 1 : (0);
        $al_ = $ak_
          ? $ak_
          : ($caml_string_notequal($call3($String[4], $n, 0, 2), $cst__2));
        if ($al_) {
          $am_ = $caml_ml_string_length($n) < 3 ? 1 : (0);
          $an_ = $am_
            ? $am_
            : ($caml_string_notequal($call3($String[4], $n, 0, 3), $cst__1));
        }
        else {$an_ = $al_;}
      }
      else {$an_ = $aj_;}
      return $an_;
    };
    $check_suffix = (dynamic $name, dynamic $suff) ==> {
      $ah_ = $caml_ml_string_length($suff) <= $caml_ml_string_length($name)
        ? 1
        : (0);
      $ai_ = $ah_
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
        : ($ah_);
      return $ai_;
    };
    
    try {$o_ = $caml_sys_getenv($cst_TMPDIR);$temp_dir_name = $o_;}
    catch(\Throwable $ag_) {
      $ag_ = $runtime["caml_wrap_exception"]($ag_);
      if ($ag_ !== $Not_found) {
        throw $caml_wrap_thrown_exception_reraise($ag_) as \Throwable;
      }
      $temp_dir_name = $cst_tmp;
    }
    
    $quote = (dynamic $af_) ==> {return $generic_quote($cst__3, $af_);};
    $basename = (dynamic $ae_) ==> {
      return $generic_basename($is_dir_sep, $current_dir_name, $ae_);
    };
    $dirname = (dynamic $ad_) ==> {
      return $generic_dirname($is_dir_sep, $current_dir_name, $ad_);
    };
    $is_dir_sep__0 = (dynamic $s, dynamic $i) ==> {
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
    $is_relative__0 = (dynamic $n) ==> {
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
    $is_implicit__0 = (dynamic $n) ==> {
      $L_ = $is_relative__0($n);
      if ($L_) {
        $M_ = $caml_ml_string_length($n) < 2 ? 1 : (0);
        $N_ = $M_
          ? $M_
          : ($caml_string_notequal($call3($String[4], $n, 0, 2), $cst__7));
        if ($N_) {
          $O_ = $caml_ml_string_length($n) < 2 ? 1 : (0);
          $P_ = $O_
            ? $O_
            : ($caml_string_notequal($call3($String[4], $n, 0, 2), $cst__6));
          if ($P_) {
            $Q_ = $caml_ml_string_length($n) < 3 ? 1 : (0);
            $R_ = $Q_
              ? $Q_
              : ($caml_string_notequal($call3($String[4], $n, 0, 3), $cst__5));
            if ($R_) {
              $S_ = $caml_ml_string_length($n) < 3 ? 1 : (0);
              $T_ = $S_
                ? $S_
                : ($caml_string_notequal($call3($String[4], $n, 0, 3), $cst__4
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
    $check_suffix__0 = (dynamic $name, dynamic $suff) ==> {
      $I_ = $caml_ml_string_length($suff) <= $caml_ml_string_length($name)
        ? 1
        : (0);
      if ($I_) {
        $s = $call3(
          $String[4],
          $name,
          (int)
          ($caml_ml_string_length($name) - $caml_ml_string_length($suff)),
          $caml_ml_string_length($suff)
        );
        $J_ = $call1($String[30], $suff);
        $K_ = $caml_string_equal($call1($String[30], $s), $J_);
      }
      else {$K_ = $I_;}
      return $K_;
    };
    
    try {$n_ = $caml_sys_getenv($cst_TEMP);$temp_dir_name__0 = $n_;}
    catch(\Throwable $H_) {
      $H_ = $runtime["caml_wrap_exception"]($H_);
      if ($H_ !== $Not_found) {
        throw $caml_wrap_thrown_exception_reraise($H_) as \Throwable;
      }
      $temp_dir_name__0 = $cst__8;
    }
    
    $quote__0 = (dynamic $s) ==> {
      $loop_bs = new Ref();
      $l = $caml_ml_string_length($s);
      $b = $call1($Buffer[1], (int) ($l + 20));
      $call2($Buffer[10], $b, 34);
      $add_bs = (dynamic $n) ==> {
        $F_ = 1;
        if (! ($n < 1)) {
          $j = $F_;
          for (;;) {
            $call2($Buffer[10], $b, 92);
            $G_ = (int) ($j + 1);
            if ($n !== $j) {$j = $G_;continue;}
            break;
          }
        }
        return 0;
      };
      $loop__0 = (dynamic $counter, dynamic $i) ==> {
        $i__0 = $i;
        for (;;) {
          if ($i__0 === $l) {return $call2($Buffer[10], $b, 34);}
          $c = $caml_string_get($s, $i__0);
          if (34 === $c) {
            $D_ = 0;
            if ($counter < 50) {
              $counter__1 = (int) ($counter + 1);
              return $loop_bs->contents($counter__1, $D_, $i__0);
            }
            return $caml_trampoline_return(
              $loop_bs->contents,
              varray[0,$D_,$i__0]
            );
          }
          if (92 === $c) {
            $E_ = 0;
            if ($counter < 50) {
              $counter__0 = (int) ($counter + 1);
              return $loop_bs->contents($counter__0, $E_, $i__0);
            }
            return $caml_trampoline_return(
              $loop_bs->contents,
              varray[0,$E_,$i__0]
            );
          }
          $call2($Buffer[10], $b, $c);
          $i__1 = (int) ($i__0 + 1);
          $i__0 = $i__1;
          continue;
        }
      };
      $loop_bs->contents = (dynamic $counter, dynamic $n, dynamic $i) ==> {
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
            $C_ = (int) ($i__0 + 1);
            if ($counter < 50) {
              $counter__1 = (int) ($counter + 1);
              return $loop__0($counter__1, $C_);
            }
            return $caml_trampoline_return($loop__0, varray[0,$C_]);
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
    $has_drive = (dynamic $s) ==> {
      $is_letter = (dynamic $param) ==> {
        $switch__0 = 91 <= $param
          ? 25 < $unsigned_right_shift_32((int) ($param + -97), 0) ? 0 : (1)
          : (65 <= $param ? 1 : (0));
        return $switch__0 ? 1 : (0);
      };
      $z_ = 2 <= $caml_ml_string_length($s) ? 1 : (0);
      if ($z_) {
        $A_ = $is_letter($caml_string_get($s, 0));
        $B_ = $A_ ? 58 === $caml_string_get($s, 1) ? 1 : (0) : ($A_);
      }
      else {$B_ = $z_;}
      return $B_;
    };
    $drive_and_path = (dynamic $s) ==> {
      if ($has_drive($s)) {
        $y_ = $call3(
          $String[4],
          $s,
          2,
          (int)
          ($caml_ml_string_length($s) + -2)
        );
        return Vector{0, $call3($String[4], $s, 0, 2), $y_};
      }
      return Vector{0, $cst__9, $s};
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
    $basename__1 = (dynamic $x_) ==> {
      return $generic_basename($is_dir_sep__0, $current_dir_name__1, $x_);
    };
    $dirname__1 = (dynamic $w_) ==> {
      return $generic_dirname($is_dir_sep__0, $current_dir_name__1, $w_);
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
        $f_ = Vector{
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
      $f_ = Vector{
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
      $g_ = $f_[11];
      $h_ = $f_[10];
      $i_ = $f_[9];
      $j_ = $f_[8];
      $k_ = $f_[3];
      $l_ = $f_[2];
      $m_ = $f_[1];
      $current_dir_name__2 = $m_;
      $parent_dir_name__2 = $l_;
      $dir_sep__2 = $k_;
      $is_dir_sep__1 = $is_dir_sep__0;
      $is_relative__1 = $is_relative__0;
      $is_implicit__1 = $is_implicit__0;
      $check_suffix__1 = $check_suffix__0;
      $temp_dir_name__1 = $j_;
      $quote__1 = $i_;
      $basename__2 = $h_;
      $dirname__2 = $g_;
    }
    
    $concat = (dynamic $dirname, dynamic $filename) ==> {
      $l = $caml_ml_string_length($dirname);
      if (0 !== $l) {
        if (! $is_dir_sep__1($dirname, (int) ($l + -1))) {
          $v_ = $call2($Pervasives[16], $dir_sep__2, $filename);
          return $call2($Pervasives[16], $dirname, $v_);
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
      $check = (dynamic $i0, dynamic $i) ==> {
        $i__0 = $i;
        for (;;) {
          if (0 <= $i__0) {
            if (! $is_dir_sep__1($name, $i__0)) {
              if (46 === $caml_string_get($name, $i__0)) {
                $i__1 = (int) ($i__0 + -1);
                $i__0 = $i__1;
                continue;
              }
              return (int) ($caml_ml_string_length($name) - $i0);
            }
          }
          return 0;
        }
      };
      $search_dot = (dynamic $i) ==> {
        $i__0 = $i;
        for (;;) {
          if (0 <= $i__0) {
            if (! $is_dir_sep__1($name, $i__0)) {
              if (46 === $caml_string_get($name, $i__0)) {return $check($i__0, (int) ($i__0 + -1));}
              $i__1 = (int) ($i__0 + -1);
              $i__0 = $i__1;
              continue;
            }
          }
          return 0;
        }
      };
      return $search_dot((int) ($caml_ml_string_length($name) + -1));
    };
    $extension = (dynamic $name) ==> {
      $l = $extension_len($name);
      return 0 === $l
        ? $cst__10
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
    $b_ = (dynamic $u_) ==> {return $call1($Random[11][2], 0);};
    $prng = Vector{246, $b_};
    $temp_file_name = (dynamic $temp_dir, dynamic $prefix, dynamic $suffix) ==> {
      $s_ = $runtime["caml_obj_tag"]($prng);
      $t_ = 250 === $s_
        ? $b_
        : (246 === $s_ ? $call1($CamlinternalLazy[2], $prng) : ($prng));
      $rnd = $call1($Random[11][4], $t_) & 16777215;
      return $concat(
        $temp_dir,
        $call4($Printf[4], $c_, $prefix, $rnd, $suffix)
      );
    };
    $current_temp_dir_name = Vector{0, $temp_dir_name__1};
    $set_temp_dir_name = (dynamic $s) ==> {
      $current_temp_dir_name[1] = $s;
      return 0;
    };
    $get_temp_dir_name = (dynamic $param) ==> {
      return $current_temp_dir_name[1];
    };
    $temp_file = (dynamic $opt, dynamic $prefix, dynamic $suffix) ==> {
      if ($opt) {
        $sth = $opt[1];
        $temp_dir = $sth;
      }
      else {$temp_dir = $current_temp_dir_name[1];}
      $try_name = (dynamic $counter) ==> {
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
    (dynamic $opt, dynamic $q_, dynamic $p_, dynamic $prefix, dynamic $suffix) ==> {
      if ($opt) {
        $sth = $opt[1];
        $mode = $sth;
      }
      else {$mode = $e_;}
      if ($q_) {
        $sth__0 = $q_[1];
        $perms = $sth__0;
      }
      else {$perms = 384;}
      if ($p_) {
        $sth__1 = $p_[1];
        $temp_dir = $sth__1;
      }
      else {$temp_dir = $current_temp_dir_name[1];}
      $try_name = (dynamic $counter) ==> {
        $counter__0 = $counter;
        for (;;) {
          $name = $temp_file_name($temp_dir, $prefix, $suffix);
          try {
            $r_ = Vector{
              0,
              $name,
              $call3(
                $Pervasives[50],
                Vector{0, 1, Vector{0, 3, Vector{0, 5, $mode}}},
                $perms,
                $name
              )
            };
            return $r_;
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
    };
    
     return ($Filename);

  }
  public static function current_dir_name() {
    return static::get()[1]();
  }
  public static function parent_dir_name() {
    return static::get()[2]();
  }
  public static function dir_sep() {
    return static::get()[3]();
  }
  public static function concat(dynamic $dirname, dynamic $filename) {
    return static::get()[4]($dirname, $filename);
  }
  public static function is_relative() {
    return static::get()[5]();
  }
  public static function is_implicit() {
    return static::get()[6]();
  }
  public static function check_suffix() {
    return static::get()[7]();
  }
  public static function chop_suffix(dynamic $name, dynamic $suff) {
    return static::get()[8]($name, $suff);
  }
  public static function extension(dynamic $name) {
    return static::get()[9]($name);
  }
  public static function remove_extension(dynamic $name) {
    return static::get()[10]($name);
  }
  public static function chop_extension(dynamic $name) {
    return static::get()[11]($name);
  }
  public static function basename() {
    return static::get()[12]();
  }
  public static function dirname() {
    return static::get()[13]();
  }
  public static function temp_file(dynamic $opt, dynamic $prefix, dynamic $suffix) {
    return static::get()[14]($opt, $prefix, $suffix);
  }
  public static function open_temp_file(dynamic $opt, dynamic $unnamed1, dynamic $unnamed2, dynamic $prefix, dynamic $suffix) {
    return static::get()[15]($opt, $unnamed1, $unnamed2, $prefix, $suffix);
  }
  public static function get_temp_dir_name(dynamic $param) {
    return static::get()[16]($param);
  }
  public static function set_temp_dir_name(dynamic $s) {
    return static::get()[17]($s);
  }
  public static function temp_dir_name() {
    return static::get()[18]();
  }
  public static function quote() {
    return static::get()[19]();
  }

}
/* Hashing disabled */
