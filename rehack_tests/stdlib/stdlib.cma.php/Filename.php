<?hh
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * Filename.php
 */

namespace Rehack;

final class Filename {
  <<__Memoize>>
  public static function get() {
    $global_object = \Rehack\GlobalObject::get();
    $runtime = \Rehack\Runtime::get();
    /*
     * Soon, these will replace the `global_data->ModuleName`
     * pattern in the load() function.
     */
    $Buffer = Buffer::get();
    $CamlinternalLazy = CamlinternalLazy::get();
    $Pervasives = Pervasives::get();
    $Printf = Printf::get();
    $Random = Random::get();
    $String_ = String_::get();
    $Sys = Sys::get();
    $Not_found = Not_found::get();
    $Sys_error = Sys_error::get();
    Filename::load($global_object);
    $memoized = $runtime->caml_get_global_data()->Filename;
    return $memoized;
  }

  /**
   * Performs module load operation. May have side effects.
   */
  private static function load($joo_global_object) {
    

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
    $caml_wrap_exception = $runtime["caml_wrap_exception"];
    $unsigned_right_shift_32 = $runtime["unsigned_right_shift_32"];
    $global_data = $runtime["caml_get_global_data"]();
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
    $Pervasives = $global_data["Pervasives"];
    $Sys_error = $global_data["Sys_error"];
    $CamlinternalLazy = $global_data["CamlinternalLazy"];
    $Random = $global_data["Random"];
    $Printf = $global_data["Printf"];
    $String = $global_data["String_"];
    $Buffer = $global_data["Buffer"];
    $Not_found = $global_data["Not_found"];
    $Sys = $global_data["Sys"];
    $Bi = Vector{0, 7, 0};
    $Bh = Vector{0, 1, Vector{0, 3, Vector{0, 5, 0}}};
    $Bg = Vector{
      0,
      Vector{2, 0, Vector{4, 6, Vector{0, 2, 6}, 0, Vector{2, 0, 0}}},
      $string("%s%06x%s")
    };
    $generic_quote = function(dynamic $quotequote, dynamic $s) use ($Buffer,$call1,$call2,$caml_ml_string_length,$caml_string_get) {
      $l = $caml_ml_string_length($s);
      $b = $call1($Buffer[1], (int) ($l + 20));
      $call2($Buffer[10], $b, 39);
      $Ck = (int) ($l + -1);
      $Cj = 0;
      if (! ($Ck < 0)) {
        $i = $Cj;
        for (;;) {
          if (39 === $caml_string_get($s, $i)) {
            $call2($Buffer[14], $b, $quotequote);
          }
          else {$Cm = $caml_string_get($s, $i);$call2($Buffer[10], $b, $Cm);}
          $Cl = (int) ($i + 1);
          if ($Ck !== $i) {$i = $Cl;continue;}
          break;
        }
      }
      $call2($Buffer[10], $b, 39);
      return $call1($Buffer[2], $b);
    };
    $generic_basename = function
    (dynamic $is_dir_sep, dynamic $current_dir_name, dynamic $name) use ($String,$call2,$call3,$caml_ml_string_length,$caml_string_equal,$cst) {
      $find_beg = function(dynamic $n, dynamic $p) use ($String,$call2,$call3,$is_dir_sep,$name) {
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
      $find_end = function(dynamic $n) use ($String,$call2,$call3,$find_beg,$is_dir_sep,$name) {
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
    $generic_dirname = function
    (dynamic $is_dir_sep, dynamic $current_dir_name, dynamic $name) use ($String,$call2,$call3,$caml_ml_string_length,$caml_string_equal,$cst__0) {
      $intermediate_sep = function(dynamic $n) use ($String,$call2,$call3,$is_dir_sep,$name) {
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
      $base = function(dynamic $n) use ($call2,$current_dir_name,$intermediate_sep,$is_dir_sep,$name) {
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
      $trailing_sep = function(dynamic $n) use ($String,$base,$call2,$call3,$is_dir_sep,$name) {
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
    $is_dir_sep = function(dynamic $s, dynamic $i) use ($caml_string_get) {
      return 47 === $caml_string_get($s, $i) ? 1 : (0);
    };
    $is_relative = function(dynamic $n) use ($caml_ml_string_length,$caml_string_get) {
      $Ch = $caml_ml_string_length($n) < 1 ? 1 : (0);
      $Ci = $Ch ? $Ch : (47 !== $caml_string_get($n, 0) ? 1 : (0));
      return $Ci;
    };
    $is_implicit = function(dynamic $n) use ($String,$call3,$caml_ml_string_length,$caml_string_notequal,$cst__1,$cst__2,$is_relative) {
      $Cc = $is_relative($n);
      if ($Cc) {
        $Cd = $caml_ml_string_length($n) < 2 ? 1 : (0);
        $Ce = $Cd
          ? $Cd
          : ($caml_string_notequal($call3($String[4], $n, 0, 2), $cst__2));
        if ($Ce) {
          $Cf = $caml_ml_string_length($n) < 3 ? 1 : (0);
          $Cg = $Cf
            ? $Cf
            : ($caml_string_notequal($call3($String[4], $n, 0, 3), $cst__1));
        }
        else {$Cg = $Ce;}
      }
      else {$Cg = $Cc;}
      return $Cg;
    };
    $check_suffix = function(dynamic $name, dynamic $suff) use ($String,$call3,$caml_ml_string_length,$caml_string_equal) {
      $Ca = $caml_ml_string_length($suff) <= $caml_ml_string_length($name)
        ? 1
        : (0);
      $Cb = $Ca
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
        : ($Ca);
      return $Cb;
    };
    
    try {$Bs = $caml_sys_getenv($cst_TMPDIR);$temp_dir_name = $Bs;}
    catch(\Throwable $B_) {
      $B_ = $caml_wrap_exception($B_);
      if ($B_ !== $Not_found) {
        throw $runtime["caml_wrap_thrown_exception_reraise"]($B_) as \Throwable;
      }
      $temp_dir_name = $cst_tmp;
    }
    
    $quote = function(dynamic $B9) use ($cst__3,$generic_quote) {
      return $generic_quote($cst__3, $B9);
    };
    $basename = function(dynamic $B8) use ($current_dir_name,$generic_basename,$is_dir_sep) {
      return $generic_basename($is_dir_sep, $current_dir_name, $B8);
    };
    $dirname = function(dynamic $B7) use ($current_dir_name,$generic_dirname,$is_dir_sep) {
      return $generic_dirname($is_dir_sep, $current_dir_name, $B7);
    };
    $is_dir_sep__0 = function(dynamic $s, dynamic $i) use ($caml_string_get) {
      $c = $caml_string_get($s, $i);
      $B4 = 47 === $c ? 1 : (0);
      if ($B4) {
        $B5 = $B4;
      }
      else {$B6 = 92 === $c ? 1 : (0);$B5 = $B6 ? $B6 : (58 === $c ? 1 : (0));
      }
      return $B5;
    };
    $is_relative__0 = function(dynamic $n) use ($caml_ml_string_length,$caml_string_get) {
      $BY = $caml_ml_string_length($n) < 1 ? 1 : (0);
      $BZ = $BY ? $BY : (47 !== $caml_string_get($n, 0) ? 1 : (0));
      if ($BZ) {
        $B0 = $caml_ml_string_length($n) < 1 ? 1 : (0);
        $B1 = $B0 ? $B0 : (92 !== $caml_string_get($n, 0) ? 1 : (0));
        if ($B1) {
          $B2 = $caml_ml_string_length($n) < 2 ? 1 : (0);
          $B3 = $B2 ? $B2 : (58 !== $caml_string_get($n, 1) ? 1 : (0));
        }
        else {$B3 = $B1;}
      }
      else {$B3 = $BZ;}
      return $B3;
    };
    $is_implicit__0 = function(dynamic $n) use ($String,$call3,$caml_ml_string_length,$caml_string_notequal,$cst__4,$cst__5,$cst__6,$cst__7,$is_relative__0) {
      $BP = $is_relative__0($n);
      if ($BP) {
        $BQ = $caml_ml_string_length($n) < 2 ? 1 : (0);
        $BR = $BQ
          ? $BQ
          : ($caml_string_notequal($call3($String[4], $n, 0, 2), $cst__7));
        if ($BR) {
          $BS = $caml_ml_string_length($n) < 2 ? 1 : (0);
          $BT = $BS
            ? $BS
            : ($caml_string_notequal($call3($String[4], $n, 0, 2), $cst__6));
          if ($BT) {
            $BU = $caml_ml_string_length($n) < 3 ? 1 : (0);
            $BV = $BU
              ? $BU
              : ($caml_string_notequal($call3($String[4], $n, 0, 3), $cst__5));
            if ($BV) {
              $BW = $caml_ml_string_length($n) < 3 ? 1 : (0);
              $BX = $BW
                ? $BW
                : ($caml_string_notequal($call3($String[4], $n, 0, 3), $cst__4
               ));
            }
            else {$BX = $BV;}
          }
          else {$BX = $BT;}
        }
        else {$BX = $BR;}
      }
      else {$BX = $BP;}
      return $BX;
    };
    $check_suffix__0 = function(dynamic $name, dynamic $suff) use ($String,$call1,$call3,$caml_ml_string_length,$caml_string_equal) {
      $BM = $caml_ml_string_length($suff) <= $caml_ml_string_length($name)
        ? 1
        : (0);
      if ($BM) {
        $s = $call3(
          $String[4],
          $name,
          (int)
          ($caml_ml_string_length($name) - $caml_ml_string_length($suff)),
          $caml_ml_string_length($suff)
        );
        $BN = $call1($String[30], $suff);
        $BO = $caml_string_equal($call1($String[30], $s), $BN);
      }
      else {$BO = $BM;}
      return $BO;
    };
    
    try {$Br = $caml_sys_getenv($cst_TEMP);$temp_dir_name__0 = $Br;}
    catch(\Throwable $BL) {
      $BL = $caml_wrap_exception($BL);
      if ($BL !== $Not_found) {
        throw $runtime["caml_wrap_thrown_exception_reraise"]($BL) as \Throwable;
      }
      $temp_dir_name__0 = $cst__8;
    }
    
    $quote__0 = function(dynamic $s) use ($Buffer,$call1,$call2,$caml_ml_string_length,$caml_string_get,$caml_trampoline,$caml_trampoline_return) {
      $loop_bs = new Ref();
      $l = $caml_ml_string_length($s);
      $b = $call1($Buffer[1], (int) ($l + 20));
      $call2($Buffer[10], $b, 34);
      $add_bs = function(dynamic $n) use ($Buffer,$b,$call2) {
        $BJ = 1;
        if (! ($n < 1)) {
          $j = $BJ;
          for (;;) {
            $call2($Buffer[10], $b, 92);
            $BK = (int) ($j + 1);
            if ($n !== $j) {$j = $BK;continue;}
            break;
          }
        }
        return 0;
      };
      $loop__0 = function(dynamic $counter, dynamic $i) use ($Buffer,$b,$call2,$caml_string_get,$caml_trampoline_return,$l,$loop_bs,$s) {
        $i__0 = $i;
        for (;;) {
          if ($i__0 === $l) {return $call2($Buffer[10], $b, 34);}
          $c = $caml_string_get($s, $i__0);
          if (34 === $c) {
            $BH = 0;
            if ($counter < 50) {
              $counter__1 = (int) ($counter + 1);
              return $loop_bs->contents($counter__1, $BH, $i__0);
            }
            return $caml_trampoline_return(
              $loop_bs->contents,
              varray[0,$BH,$i__0]
            );
          }
          if (92 === $c) {
            $BI = 0;
            if ($counter < 50) {
              $counter__0 = (int) ($counter + 1);
              return $loop_bs->contents($counter__0, $BI, $i__0);
            }
            return $caml_trampoline_return(
              $loop_bs->contents,
              varray[0,$BI,$i__0]
            );
          }
          $call2($Buffer[10], $b, $c);
          $i__1 = (int) ($i__0 + 1);
          $i__0 = $i__1;
          continue;
        }
      };
      $loop_bs->contents = function(dynamic $counter, dynamic $n, dynamic $i) use ($Buffer,$add_bs,$b,$call2,$caml_string_get,$caml_trampoline_return,$l,$loop__0,$s) {
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
            $BG = (int) ($i__0 + 1);
            if ($counter < 50) {
              $counter__1 = (int) ($counter + 1);
              return $loop__0($counter__1, $BG);
            }
            return $caml_trampoline_return($loop__0, varray[0,$BG]);
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
      $loop = function(dynamic $i) use ($caml_trampoline,$loop__0) {
        return $caml_trampoline($loop__0(0, $i));
      };
      $loop(0);
      return $call1($Buffer[2], $b);
    };
    $has_drive = function(dynamic $s) use ($caml_ml_string_length,$caml_string_get,$unsigned_right_shift_32) {
      $is_letter = function(dynamic $param) use ($unsigned_right_shift_32) {
        $switch__0 = 91 <= $param
          ? 25 < $unsigned_right_shift_32((int) ($param + -97), 0) ? 0 : (1)
          : (65 <= $param ? 1 : (0));
        return $switch__0 ? 1 : (0);
      };
      $BD = 2 <= $caml_ml_string_length($s) ? 1 : (0);
      if ($BD) {
        $BE = $is_letter($caml_string_get($s, 0));
        $BF = $BE ? 58 === $caml_string_get($s, 1) ? 1 : (0) : ($BE);
      }
      else {$BF = $BD;}
      return $BF;
    };
    $drive_and_path = function(dynamic $s) use ($String,$call3,$caml_ml_string_length,$cst__9,$has_drive) {
      if ($has_drive($s)) {
        $BC = $call3(
          $String[4],
          $s,
          2,
          (int)
          ($caml_ml_string_length($s) + -2)
        );
        return Vector{0, $call3($String[4], $s, 0, 2), $BC};
      }
      return Vector{0, $cst__9, $s};
    };
    $dirname__0 = function(dynamic $s) use ($Pervasives,$call2,$current_dir_name__0,$drive_and_path,$generic_dirname,$is_dir_sep__0) {
      $match = $drive_and_path($s);
      $path = $match[2];
      $drive = $match[1];
      $dir = $generic_dirname($is_dir_sep__0, $current_dir_name__0, $path);
      return $call2($Pervasives[16], $drive, $dir);
    };
    $basename__0 = function(dynamic $s) use ($current_dir_name__0,$drive_and_path,$generic_basename,$is_dir_sep__0) {
      $match = $drive_and_path($s);
      $path = $match[2];
      return $generic_basename($is_dir_sep__0, $current_dir_name__0, $path);
    };
    $basename__1 = function(dynamic $BB) use ($current_dir_name__1,$generic_basename,$is_dir_sep__0) {
      return $generic_basename($is_dir_sep__0, $current_dir_name__1, $BB);
    };
    $dirname__1 = function(dynamic $BA) use ($current_dir_name__1,$generic_dirname,$is_dir_sep__0) {
      return $generic_dirname($is_dir_sep__0, $current_dir_name__1, $BA);
    };
    $Bf = $Sys[5];
    
    if ($caml_string_notequal($Bf, $cst_Cygwin)) {
      if ($caml_string_notequal($Bf, $cst_Win32)) {
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
        $Bj = Vector{
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
      $Bj = Vector{
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
      $Bk = $Bj[11];
      $Bl = $Bj[10];
      $Bm = $Bj[9];
      $Bn = $Bj[8];
      $Bo = $Bj[3];
      $Bp = $Bj[2];
      $Bq = $Bj[1];
      $current_dir_name__2 = $Bq;
      $parent_dir_name__2 = $Bp;
      $dir_sep__2 = $Bo;
      $is_dir_sep__1 = $is_dir_sep__0;
      $is_relative__1 = $is_relative__0;
      $is_implicit__1 = $is_implicit__0;
      $check_suffix__1 = $check_suffix__0;
      $temp_dir_name__1 = $Bn;
      $quote__1 = $Bm;
      $basename__2 = $Bl;
      $dirname__2 = $Bk;
    }
    
    $concat = function(dynamic $dirname, dynamic $filename) use ($Pervasives,$call2,$caml_ml_string_length,$dir_sep__2,$is_dir_sep__1) {
      $l = $caml_ml_string_length($dirname);
      if (0 !== $l) {
        if (! $is_dir_sep__1($dirname, (int) ($l + -1))) {
          $Bz = $call2($Pervasives[16], $dir_sep__2, $filename);
          return $call2($Pervasives[16], $dirname, $Bz);
        }
      }
      return $call2($Pervasives[16], $dirname, $filename);
    };
    $chop_suffix = function(dynamic $name, dynamic $suff) use ($Pervasives,$String,$call1,$call3,$caml_ml_string_length,$cst_Filename_chop_suffix) {
      $n = (int)
      ($caml_ml_string_length($name) - $caml_ml_string_length($suff));
      return 0 <= $n
        ? $call3($String[4], $name, 0, $n)
        : ($call1($Pervasives[1], $cst_Filename_chop_suffix));
    };
    $extension_len = function(dynamic $name) use ($caml_ml_string_length,$caml_string_get,$is_dir_sep__1) {
      $check = function(dynamic $i0, dynamic $i) use ($caml_ml_string_length,$caml_string_get,$is_dir_sep__1,$name) {
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
      $search_dot = function(dynamic $i) use ($caml_string_get,$check,$is_dir_sep__1,$name) {
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
    $extension = function(dynamic $name) use ($String,$call3,$caml_ml_string_length,$cst__10,$extension_len) {
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
    $chop_extension = function(dynamic $name) use ($Pervasives,$String,$call1,$call3,$caml_ml_string_length,$cst_Filename_chop_extension,$extension_len) {
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
    $remove_extension = function(dynamic $name) use ($String,$call3,$caml_ml_string_length,$extension_len) {
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
    $prng = Vector{
      246,
      function(dynamic $By) use ($Random,$call1) {
        return $call1($Random[11][2], 0);
      }
    };
    $temp_file_name = function
    (dynamic $temp_dir, dynamic $prefix, dynamic $suffix) use ($Bg,$CamlinternalLazy,$Printf,$Random,$call1,$call4,$concat,$prng,$runtime) {
      $Bw = $runtime["caml_obj_tag"]($prng);
      $Bx = 250 === $Bw
        ? $prng[1]
        : (246 === $Bw ? $call1($CamlinternalLazy[2], $prng) : ($prng));
      $rnd = $call1($Random[11][4], $Bx) & 16777215;
      return $concat(
        $temp_dir,
        $call4($Printf[4], $Bg, $prefix, $rnd, $suffix)
      );
    };
    $current_temp_dir_name = Vector{0, $temp_dir_name__1};
    $set_temp_dir_name = function(dynamic $s) use ($current_temp_dir_name) {
      $current_temp_dir_name[1] = $s;
      return 0;
    };
    $get_temp_dir_name = function(dynamic $param) use ($current_temp_dir_name) {
      return $current_temp_dir_name[1];
    };
    $temp_file = function(dynamic $opt, dynamic $prefix, dynamic $suffix) use ($Bh,$Sys_error,$caml_wrap_exception,$current_temp_dir_name,$runtime,$temp_file_name) {
      if ($opt) {
        $sth = $opt[1];
        $temp_dir = $sth;
      }
      else {$temp_dir = $current_temp_dir_name[1];}
      $try_name = function(dynamic $counter) use ($Bh,$Sys_error,$caml_wrap_exception,$prefix,$runtime,$suffix,$temp_dir,$temp_file_name) {
        $counter__0 = $counter;
        for (;;) {
          $name = $temp_file_name($temp_dir, $prefix, $suffix);
          try {
            $runtime["caml_sys_close"](
              $runtime["caml_sys_open"]($name, $Bh, 384)
            );
            return $name;
          }
          catch(\Throwable $e) {
            $e = $caml_wrap_exception($e);
            if ($e[1] === $Sys_error) {
              if (1000 <= $counter__0) {
                throw $runtime["caml_wrap_thrown_exception_reraise"]($e) as \Throwable;
              }
              $counter__1 = (int) ($counter__0 + 1);
              $counter__0 = $counter__1;
              continue;
            }
            throw $runtime["caml_wrap_thrown_exception_reraise"]($e) as \Throwable;
          }
        }
      };
      return $try_name(0);
    };
    $open_temp_file = function
    (dynamic $opt, dynamic $Bu, dynamic $Bt, dynamic $prefix, dynamic $suffix) use ($Bi,$Pervasives,$Sys_error,$call3,$caml_wrap_exception,$current_temp_dir_name,$runtime,$temp_file_name) {
      if ($opt) {
        $sth = $opt[1];
        $mode = $sth;
      }
      else {$mode = $Bi;}
      if ($Bu) {
        $sth__0 = $Bu[1];
        $perms = $sth__0;
      }
      else {$perms = 384;}
      if ($Bt) {
        $sth__1 = $Bt[1];
        $temp_dir = $sth__1;
      }
      else {$temp_dir = $current_temp_dir_name[1];}
      $try_name = function(dynamic $counter) use ($Pervasives,$Sys_error,$call3,$caml_wrap_exception,$mode,$perms,$prefix,$runtime,$suffix,$temp_dir,$temp_file_name) {
        $counter__0 = $counter;
        for (;;) {
          $name = $temp_file_name($temp_dir, $prefix, $suffix);
          try {
            $Bv = Vector{
              0,
              $name,
              $call3(
                $Pervasives[50],
                Vector{0, 1, Vector{0, 3, Vector{0, 5, $mode}}},
                $perms,
                $name
              )
            };
            return $Bv;
          }
          catch(\Throwable $e) {
            $e = $caml_wrap_exception($e);
            if ($e[1] === $Sys_error) {
              if (1000 <= $counter__0) {
                throw $runtime["caml_wrap_thrown_exception_reraise"]($e) as \Throwable;
              }
              $counter__1 = (int) ($counter__0 + 1);
              $counter__0 = $counter__1;
              continue;
            }
            throw $runtime["caml_wrap_thrown_exception_reraise"]($e) as \Throwable;
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
    
    $runtime["caml_register_global"](40, $Filename, "Filename");

  }
}