<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class Ephemeron {
  <<__Override, __Memoize>>
  public static function requireModule() : Vector<dynamic> {
    $joo_global_object = \Rehack\GlobalObject::get() as dynamic;
    
    $runtime = $joo_global_object->jsoo_runtime;
    $call1 = $runtime["caml_call1"];
    $call2 = $runtime["caml_call2"];
    $call3 = $runtime["caml_call3"];
    $call5 = $runtime["caml_call5"];
    $caml_check_bound = $runtime["caml_check_bound"];
    $caml_make_vect = $runtime["caml_make_vect"];
    $caml_wrap_thrown_exception = $runtime["caml_wrap_thrown_exception"];
    $caml_wrap_thrown_exception_reraise = $runtime[
       "caml_wrap_thrown_exception_reraise"
     ];
    $left_shift_32 = $runtime["left_shift_32"];
    $unsigned_right_shift_32 = $runtime["unsigned_right_shift_32"];
    $Obj =  Obj::get ();
    $Sys =  Sys::get ();
    $Not_found =  Not_found::get ();
    $Pervasives =  Pervasives::get ();
    $Array =  Array_::get ();
    $Hashtbl =  Hashtbl::get ();
    $CamlinternalLazy =  CamlinternalLazy::get ();
    $Random =  Random::get ();
    $c_ = Vector{0, 0};
    $b_ = Vector{0, 0};
    $a_ = Vector{0, 0};
    $MakeSeeded = (dynamic $H) ==> {
      $power_2_above = (dynamic $x, dynamic $n) ==> {
        $x__0 = $x;
        for (;;) {
          if ($n <= $x__0) {return $x__0;}
          if ($Sys[14] < (int) ($x__0 * 2)) {return $x__0;}
          $x__1 = (int) ($x__0 * 2);
          $x__0 = $x__1;
          continue;
        }
      };
      $B_ = (dynamic $ay_) ==> {return $call1($Random[11][2], 0);};
      $prng = Vector{246, $B_};
      $create = (dynamic $opt, dynamic $initial_size) ==> {
        if ($opt) {
          $sth = $opt[1];
          $random = $sth;
        }
        else {$random = $call1($Hashtbl[17], 0);}
        $s = $power_2_above(16, $initial_size);
        if ($random) {
          $aw_ = $runtime["caml_obj_tag"]($prng);
          $ax_ = 250 === $aw_
            ? $B_
            : (246 === $aw_ ? $call1($CamlinternalLazy[2], $prng) : ($prng));
          $seed = $call1($Random[11][4], $ax_);
        }
        else {$seed = 0;}
        return Vector{0, 0, $caml_make_vect($s, 0), $seed, $s};
      };
      $clear = (dynamic $h) ==> {
        $h[1] = 0;
        $len = $h[2]->count() - 1;
        $au_ = (int) ($len + -1);
        $at_ = 0;
        if (! ($au_ < 0)) {
          $i = $at_;
          for (;;) {
            $caml_check_bound($h[2], $i)[$i + 1] = 0;
            $av_ = (int) ($i + 1);
            if ($au_ !== $i) {$i = $av_;continue;}
            break;
          }
        }
        return 0;
      };
      $reset = (dynamic $h) ==> {
        $len = $h[2]->count() - 1;
        if ($len === $h[4]) {return $clear($h);}
        $h[1] = 0;
        $h[2] = $caml_make_vect($h[4], 0);
        return 0;
      };
      $copy = (dynamic $h) ==> {
        $aq_ = $h[4];
        $ar_ = $h[3];
        $as_ = $call1($Array[8], $h[2]);
        return Vector{0, $h[1], $as_, $ar_, $aq_};
      };
      $key_index = (dynamic $h, dynamic $hkey) ==> {
        return $hkey & (int) ($h[2]->count() - 1 + -1);
      };
      $clean = (dynamic $h) ==> {
        $do_bucket = new Ref();
        $do_bucket->contents = (dynamic $param) ==> {
          $param__0 = $param;
          for (;;) {
            if ($param__0) {
              $rest = $param__0[3];
              $c = $param__0[2];
              $hkey = $param__0[1];
              if ($call1($H[7], $c)) {
                return Vector{0, $hkey, $c, $do_bucket->contents($rest)};
              }
              $h[1] = (int) ($h[1] + -1);
              $param__0 = $rest;
              continue;
            }
            return 0;
          }
        };
        $d = $h[2];
        $ao_ = (int) ($d->count() - 1 + -1);
        $an_ = 0;
        if (! ($ao_ < 0)) {
          $i = $an_;
          for (;;) {
            $d[$i + 1] =
              $do_bucket->contents($caml_check_bound($d, $i)[$i + 1]);
            $ap_ = (int) ($i + 1);
            if ($ao_ !== $i) {$i = $ap_;continue;}
            break;
          }
        }
        return 0;
      };
      $resize = (dynamic $h) ==> {
        $odata = $h[2];
        $osize = $odata->count() - 1;
        $nsize = (int) ($osize * 2);
        $clean($h);
        $ah_ = $nsize < $Sys[14] ? 1 : (0);
        $ai_ = $ah_
          ? (int) $unsigned_right_shift_32($osize, 1) <= $h[1] ? 1 : (0)
          : ($ah_);
        if ($ai_) {
          $ndata = $caml_make_vect($nsize, 0);
          $h[2] = $ndata;
          $insert_bucket->contents = (dynamic $param) ==> {
            if ($param) {
              $rest = $param[3];
              $data = $param[2];
              $hkey = $param[1];
              $insert_bucket->contents($rest);
              $nidx = $key_index($h, $hkey);
              $ndata[$nidx + 1] =
                Vector{
                  0,
                  $hkey,
                  $data,
                  $caml_check_bound($ndata, $nidx)[$nidx + 1]
                };
              return 0;
            }
            return 0;
          };
          $ak_ = (int) ($osize + -1);
          $aj_ = 0;
          if (! ($ak_ < 0)) {
            $i = $aj_;
            for (;;) {
              $insert_bucket->contents($caml_check_bound($odata, $i)[$i + 1]);
              $am_ = (int) ($i + 1);
              if ($ak_ !== $i) {$i = $am_;continue;}
              break;
            }
          }
          $al_ = 0;
        }
        else {$al_ = $ai_;}
        return $al_;
      };
      $add = (dynamic $h, dynamic $key, dynamic $info) ==> {
        $hkey = $call2($H[2], $h[3], $key);
        $i = $key_index($h, $hkey);
        $container = $call2($H[1], $key, $info);
        $bucket = Vector{
          0,
          $hkey,
          $container,
          $caml_check_bound($h[2], $i)[$i + 1]
        };
        $caml_check_bound($h[2], $i)[$i + 1] = $bucket;
        $h[1] = (int) ($h[1] + 1);
        $ag_ = $left_shift_32($h[2]->count() - 1, 1) < $h[1] ? 1 : (0);
        return $ag_ ? $resize($h) : ($ag_);
      };
      $remove = (dynamic $h, dynamic $key) ==> {
        $remove_bucket = new Ref();
        $hkey = $call2($H[2], $h[3], $key);
        $remove_bucket->contents = (dynamic $param) ==> {
          $param__0 = $param;
          for (;;) {
            if ($param__0) {
              $next = $param__0[3];
              $c = $param__0[2];
              $hk = $param__0[1];
              if ($hkey === $hk) {
                $match = $call2($H[3], $c, $key);
                $continue_label = null;
                switch($match) {
                  // FALLTHROUGH
                  case 0:
                    $h[1] = (int) ($h[1] + -1);
                    return $next;
                  // FALLTHROUGH
                  case 1:
                    return Vector{0, $hk, $c, $remove_bucket->contents($next)};
                  // FALLTHROUGH
                  default:
                    $h[1] = (int) ($h[1] + -1);
                    $param__0 = $next;
                    $continue_label = "#";break;
                  }
                if ($continue_label === "#") {continue;}
              }
              return Vector{0, $hk, $c, $remove_bucket->contents($next)};
            }
            return 0;
          }
        };
        $i = $key_index($h, $hkey);
        $af_ = $remove_bucket->contents($caml_check_bound($h[2], $i)[$i + 1]);
        $caml_check_bound($h[2], $i)[$i + 1] = $af_;
        return 0;
      };
      $find_rec = (dynamic $key, dynamic $hkey, dynamic $param) ==> {
        $param__0 = $param;
        for (;;) {
          if ($param__0) {
            $rest = $param__0[3];
            $c = $param__0[2];
            $hk = $param__0[1];
            if ($hkey === $hk) {
              $match = $call2($H[3], $c, $key);
              $continue_label = null;
              switch($match) {
                // FALLTHROUGH
                case 0:
                  $match__0 = $call1($H[4], $c);
                  if ($match__0) {$d = $match__0[1];return $d;}
                  $param__0 = $rest;
                  $continue_label = "#";break;
                // FALLTHROUGH
                case 1:
                  $param__0 = $rest;
                  $continue_label = "#";break;
                // FALLTHROUGH
                default:
                  $param__0 = $rest;
                  $continue_label = "#";break;
                }
              if ($continue_label === "#") {continue;}
            }
            $param__0 = $rest;
            continue;
          }
          throw $caml_wrap_thrown_exception($Not_found) as \Throwable;
        }
      };
      $find = (dynamic $h, dynamic $key) ==> {
        $hkey = $call2($H[2], $h[3], $key);
        $ae_ = $key_index($h, $hkey);
        return $find_rec($key, $hkey, $caml_check_bound($h[2], $ae_)[$ae_ + 1]
        );
      };
      $find_rec_opt = (dynamic $key, dynamic $hkey, dynamic $param) ==> {
        $param__0 = $param;
        for (;;) {
          if ($param__0) {
            $rest = $param__0[3];
            $c = $param__0[2];
            $hk = $param__0[1];
            if ($hkey === $hk) {
              $match = $call2($H[3], $c, $key);
              $continue_label = null;
              switch($match) {
                // FALLTHROUGH
                case 0:
                  $d = $call1($H[4], $c);
                  if ($d) {return $d;}
                  $param__0 = $rest;
                  $continue_label = "#";break;
                // FALLTHROUGH
                case 1:
                  $param__0 = $rest;
                  $continue_label = "#";break;
                // FALLTHROUGH
                default:
                  $param__0 = $rest;
                  $continue_label = "#";break;
                }
              if ($continue_label === "#") {continue;}
            }
            $param__0 = $rest;
            continue;
          }
          return 0;
        }
      };
      $find_opt = (dynamic $h, dynamic $key) ==> {
        $hkey = $call2($H[2], $h[3], $key);
        $ad_ = $key_index($h, $hkey);
        return $find_rec_opt(
          $key,
          $hkey,
          $caml_check_bound($h[2], $ad_)[$ad_ + 1]
        );
      };
      $find_all = (dynamic $h, dynamic $key) ==> {
        $find_in_bucket = new Ref();
        $hkey = $call2($H[2], $h[3], $key);
        $find_in_bucket->contents = (dynamic $param) ==> {
          $param__0 = $param;
          for (;;) {
            if ($param__0) {
              $rest = $param__0[3];
              $c = $param__0[2];
              $hk = $param__0[1];
              if ($hkey === $hk) {
                $match = $call2($H[3], $c, $key);
                $continue_label = null;
                switch($match) {
                  // FALLTHROUGH
                  case 0:
                    $match__0 = $call1($H[4], $c);
                    if ($match__0) {
                      $d = $match__0[1];
                      return Vector{0, $d, $find_in_bucket->contents($rest)};
                    }
                    $param__0 = $rest;
                    $continue_label = "#";break;
                  // FALLTHROUGH
                  case 1:
                    $param__0 = $rest;
                    $continue_label = "#";break;
                  // FALLTHROUGH
                  default:
                    $param__0 = $rest;
                    $continue_label = "#";break;
                  }
                if ($continue_label === "#") {continue;}
              }
              $param__0 = $rest;
              continue;
            }
            return 0;
          }
        };
        $ac_ = $key_index($h, $hkey);
        return $find_in_bucket->contents(
          $caml_check_bound($h[2], $ac_)[$ac_ + 1]
        );
      };
      $replace = (dynamic $h, dynamic $key, dynamic $info) ==> {
        $hkey = $call2($H[2], $h[3], $key);
        $replace_bucket = (dynamic $param) ==> {
          $param__0 = $param;
          for (;;) {
            if ($param__0) {
              $next = $param__0[3];
              $c = $param__0[2];
              $hk = $param__0[1];
              if ($hkey === $hk) {
                $match = $call2($H[3], $c, $key);
                if (0 === $match) {return $call3($H[6], $c, $key, $info);}
                $param__0 = $next;
                continue;
              }
              $param__0 = $next;
              continue;
            }
            throw $caml_wrap_thrown_exception($Not_found) as \Throwable;
          }
        };
        $i = $key_index($h, $hkey);
        $l = $caml_check_bound($h[2], $i)[$i + 1];
        try {$aa_ = $replace_bucket($l);return $aa_;}
        catch(\Throwable $ab_) {
          $ab_ = $runtime["caml_wrap_exception"]($ab_);
          if ($ab_ === $Not_found) {
            $container = $call2($H[1], $key, $info);
            $caml_check_bound($h[2], $i)[$i + 1] = Vector{0, $hkey, $container, $l};
            $h[1] = (int) ($h[1] + 1);
            $Z_ = $left_shift_32($h[2]->count() - 1, 1) < $h[1] ? 1 : (0);
            return $Z_ ? $resize($h) : ($Z_);
          }
          throw $caml_wrap_thrown_exception_reraise($ab_) as \Throwable;
        }
      };
      $mem = (dynamic $h, dynamic $key) ==> {
        $hkey = $call2($H[2], $h[3], $key);
        $mem_in_bucket = (dynamic $param) ==> {
          $param__0 = $param;
          for (;;) {
            if ($param__0) {
              $rest = $param__0[3];
              $c = $param__0[2];
              $hk = $param__0[1];
              if ($hk === $hkey) {
                $match = $call2($H[3], $c, $key);
                if (0 === $match) {return 1;}
                $param__0 = $rest;
                continue;
              }
              $param__0 = $rest;
              continue;
            }
            return 0;
          }
        };
        $Y_ = $key_index($h, $hkey);
        return $mem_in_bucket($caml_check_bound($h[2], $Y_)[$Y_ + 1]);
      };
      $iter = (dynamic $f, dynamic $h) ==> {
        $do_bucket = (dynamic $param) ==> {
          $param__0 = $param;
          for (;;) {
            if ($param__0) {
              $rest = $param__0[3];
              $c = $param__0[2];
              $match = $call1($H[5], $c);
              $match__0 = $call1($H[4], $c);
              if ($match) {
                if ($match__0) {
                  $d = $match__0[1];
                  $k = $match[1];
                  $call2($f, $k, $d);
                  $switch__0 = 1;
                }
                else {$switch__0 = 0;}
              }
              else {$switch__0 = 0;}
              ;
              $param__0 = $rest;
              continue;
            }
            return 0;
          }
        };
        $d = $h[2];
        $W_ = (int) ($d->count() - 1 + -1);
        $V_ = 0;
        if (! ($W_ < 0)) {
          $i = $V_;
          for (;;) {
            $do_bucket($caml_check_bound($d, $i)[$i + 1]);
            $X_ = (int) ($i + 1);
            if ($W_ !== $i) {$i = $X_;continue;}
            break;
          }
        }
        return 0;
      };
      $fold = (dynamic $f, dynamic $h, dynamic $init) ==> {
        $do_bucket = (dynamic $b, dynamic $accu) ==> {
          $b__0 = $b;
          $accu__0 = $accu;
          for (;;) {
            if ($b__0) {
              $rest = $b__0[3];
              $c = $b__0[2];
              $match = $call1($H[5], $c);
              $match__0 = $call1($H[4], $c);
              if ($match) {
                if ($match__0) {
                  $d = $match__0[1];
                  $k = $match[1];
                  $accu__1 = $call3($f, $k, $d, $accu__0);
                  $switch__0 = 1;
                }
                else {$switch__0 = 0;}
              }
              else {$switch__0 = 0;}
              if (! $switch__0) {$accu__1 = $accu__0;}
              $b__0 = $rest;
              $accu__0 = $accu__1;
              continue;
            }
            return $accu__0;
          }
        };
        $d = $h[2];
        $accu = Vector{0, $init};
        $S_ = (int) ($d->count() - 1 + -1);
        $R_ = 0;
        if (! ($S_ < 0)) {
          $i = $R_;
          for (;;) {
            $T_ = $accu[1];
            $accu[1] = $do_bucket($caml_check_bound($d, $i)[$i + 1], $T_);
            $U_ = (int) ($i + 1);
            if ($S_ !== $i) {$i = $U_;continue;}
            break;
          }
        }
        return $accu[1];
      };
      $filter_map_inplace = (dynamic $f, dynamic $h) ==> {
        $do_bucket = new Ref();
        $do_bucket->contents = (dynamic $param) ==> {
          $param__0 = $param;
          for (;;) {
            if ($param__0) {
              $rest = $param__0[3];
              $c = $param__0[2];
              $hk = $param__0[1];
              $match = $call1($H[5], $c);
              $match__0 = $call1($H[4], $c);
              if ($match) {
                if ($match__0) {
                  $d = $match__0[1];
                  $k = $match[1];
                  $match__1 = $call2($f, $k, $d);
                  if ($match__1) {
                    $new_d = $match__1[1];
                    $call3($H[6], $c, $k, $new_d);
                    return Vector{0, $hk, $c, $do_bucket->contents($rest)};
                  }
                  $param__0 = $rest;
                  continue;
                }
              }
              $param__0 = $rest;
              continue;
            }
            return 0;
          }
        };
        $d = $h[2];
        $P_ = (int) ($d->count() - 1 + -1);
        $O_ = 0;
        if (! ($P_ < 0)) {
          $i = $O_;
          for (;;) {
            $d[$i + 1] =
              $do_bucket->contents($caml_check_bound($d, $i)[$i + 1]);
            $Q_ = (int) ($i + 1);
            if ($P_ !== $i) {$i = $Q_;continue;}
            break;
          }
        }
        return 0;
      };
      $length = (dynamic $h) ==> {return $h[1];};
      $bucket_length = (dynamic $accu, dynamic $param) ==> {
        $accu__0 = $accu;
        $param__0 = $param;
        for (;;) {
          if ($param__0) {
            $param__1 = $param__0[3];
            $accu__1 = (int) ($accu__0 + 1);
            $accu__0 = $accu__1;
            $param__0 = $param__1;
            continue;
          }
          return $accu__0;
        }
      };
      $stats = (dynamic $h) ==> {
        $I_ = $h[2];
        $J_ = 0;
        $K_ = (dynamic $m, dynamic $b) ==> {
          $N_ = $bucket_length(0, $b);
          return $call2($Pervasives[5], $m, $N_);
        };
        $mbl = $call3($Array[17], $K_, $J_, $I_);
        $histo = $caml_make_vect((int) ($mbl + 1), 0);
        $L_ = $h[2];
        $M_ = (dynamic $b) ==> {
          $l = $bucket_length(0, $b);
          $histo[$l + 1] = (int) ($caml_check_bound($histo, $l)[$l + 1] + 1);
          return 0;
        };
        $call2($Array[13], $M_, $L_);
        return Vector{0, $h[1], $h[2]->count() - 1, $mbl, $histo};
      };
      $bucket_length_alive = (dynamic $accu, dynamic $param) ==> {
        $accu__0 = $accu;
        $param__0 = $param;
        for (;;) {
          if ($param__0) {
            $rest = $param__0[3];
            $c = $param__0[2];
            if ($call1($H[7], $c)) {
              $accu__1 = (int) ($accu__0 + 1);
              $accu__0 = $accu__1;
              $param__0 = $rest;
              continue;
            }
            $param__0 = $rest;
            continue;
          }
          return $accu__0;
        }
      };
      $stats_alive = (dynamic $h) ==> {
        $size = Vector{0, 0};
        $C_ = $h[2];
        $D_ = 0;
        $E_ = (dynamic $m, dynamic $b) ==> {
          $H_ = $bucket_length_alive(0, $b);
          return $call2($Pervasives[5], $m, $H_);
        };
        $mbl = $call3($Array[17], $E_, $D_, $C_);
        $histo = $caml_make_vect((int) ($mbl + 1), 0);
        $F_ = $h[2];
        $G_ = (dynamic $b) ==> {
          $l = $bucket_length_alive(0, $b);
          $size[1] = (int) ($size[1] + $l);
          $histo[$l + 1] = (int) ($caml_check_bound($histo, $l)[$l + 1] + 1);
          return 0;
        };
        $call2($Array[13], $G_, $F_);
        return Vector{0, $size[1], $h[2]->count() - 1, $mbl, $histo};
      };
      return Vector{
        0,
        $create,
        $clear,
        $reset,
        $copy,
        $add,
        $remove,
        $find,
        $find_opt,
        $find_all,
        $replace,
        $mem,
        $iter,
        $filter_map_inplace,
        $fold,
        $length,
        $stats,
        $clean,
        $stats_alive
      };
    };
    $obj_opt = (dynamic $x) ==> {return $x;};
    $create = (dynamic $param) ==> {return $call1($Obj[26][1], 1);};
    $get_key = (dynamic $t) ==> {return $obj_opt($call2($Obj[26][3], $t, 0));};
    $get_key_copy = (dynamic $t) ==> {
      return $obj_opt($call2($Obj[26][4], $t, 0));
    };
    $set_key = (dynamic $t, dynamic $k) ==> {
      return $call3($Obj[26][5], $t, 0, $k);
    };
    $unset_key = (dynamic $t) ==> {return $call2($Obj[26][6], $t, 0);};
    $check_key = (dynamic $t) ==> {return $call2($Obj[26][7], $t, 0);};
    $blit_key = (dynamic $t1, dynamic $t2) ==> {
      return $call5($Obj[26][8], $t1, 0, $t2, 0, 1);
    };
    $get_data = (dynamic $t) ==> {return $obj_opt($call1($Obj[26][9], $t));};
    $get_data_copy = (dynamic $t) ==> {
      return $obj_opt($call1($Obj[26][10], $t));
    };
    $set_data = (dynamic $t, dynamic $d) ==> {
      return $call2($Obj[26][11], $t, $d);
    };
    $unset_data = (dynamic $t) ==> {return $call1($Obj[26][12], $t);};
    $check_data = (dynamic $t) ==> {return $call1($Obj[26][13], $t);};
    $blit_data = (dynamic $t1, dynamic $t2) ==> {
      return $call2($Obj[26][14], $t1, $t2);
    };
    $MakeSeeded__0 = (dynamic $H) ==> {
      $create__0 = (dynamic $k, dynamic $d) ==> {
        $c = $create(0);
        $set_data($c, $d);
        $set_key($c, $k);
        return $c;
      };
      $hash = $H[2];
      $equal = (dynamic $c, dynamic $k) ==> {
        $match = $get_key($c);
        if ($match) {
          $k__0 = $match[1];
          return $call2($H[1], $k, $k__0) ? 0 : (1);
        }
        return 2;
      };
      $set_key_data = (dynamic $c, dynamic $k, dynamic $d) ==> {
        $unset_data($c);
        $set_key($c, $k);
        return $set_data($c, $d);
      };
      return $MakeSeeded(
        Vector{
          0,
          $create__0,
          $hash,
          $equal,
          $get_data,
          $get_key,
          $set_key_data,
          $check_key
        }
      );
    };
    $Make = (dynamic $H) ==> {
      $equal = $H[1];
      $hash = (dynamic $seed, dynamic $x) ==> {return $call1($H[2], $x);};
      $include = $MakeSeeded__0(Vector{0, $equal, $hash});
      $clear = $include[2];
      $reset = $include[3];
      $copy = $include[4];
      $add = $include[5];
      $remove = $include[6];
      $find = $include[7];
      $find_opt = $include[8];
      $find_all = $include[9];
      $replace = $include[10];
      $mem = $include[11];
      $iter = $include[12];
      $filter_map_inplace = $include[13];
      $fold = $include[14];
      $length = $include[15];
      $stats = $include[16];
      $clean = $include[17];
      $stats_alive = $include[18];
      $A_ = $include[1];
      $create = (dynamic $sz) ==> {return $call2($A_, $a_, $sz);};
      return Vector{
        0,
        $create,
        $clear,
        $reset,
        $copy,
        $add,
        $remove,
        $find,
        $find_opt,
        $find_all,
        $replace,
        $mem,
        $iter,
        $filter_map_inplace,
        $fold,
        $length,
        $stats,
        $clean,
        $stats_alive
      };
    };
    $create__0 = (dynamic $param) ==> {return $call1($Obj[26][1], 2);};
    $get_key1 = (dynamic $t) ==> {
      return $obj_opt($call2($Obj[26][3], $t, 0));
    };
    $get_key1_copy = (dynamic $t) ==> {
      return $obj_opt($call2($Obj[26][4], $t, 0));
    };
    $set_key1 = (dynamic $t, dynamic $k) ==> {
      return $call3($Obj[26][5], $t, 0, $k);
    };
    $unset_key1 = (dynamic $t) ==> {return $call2($Obj[26][6], $t, 0);};
    $check_key1 = (dynamic $t) ==> {return $call2($Obj[26][7], $t, 0);};
    $get_key2 = (dynamic $t) ==> {
      return $obj_opt($call2($Obj[26][3], $t, 1));
    };
    $get_key2_copy = (dynamic $t) ==> {
      return $obj_opt($call2($Obj[26][4], $t, 1));
    };
    $set_key2 = (dynamic $t, dynamic $k) ==> {
      return $call3($Obj[26][5], $t, 1, $k);
    };
    $unset_key2 = (dynamic $t) ==> {return $call2($Obj[26][6], $t, 1);};
    $check_key2 = (dynamic $t) ==> {return $call2($Obj[26][7], $t, 1);};
    $blit_key1 = (dynamic $t1, dynamic $t2) ==> {
      return $call5($Obj[26][8], $t1, 0, $t2, 0, 1);
    };
    $blit_key2 = (dynamic $t1, dynamic $t2) ==> {
      return $call5($Obj[26][8], $t1, 1, $t2, 1, 1);
    };
    $blit_key12 = (dynamic $t1, dynamic $t2) ==> {
      return $call5($Obj[26][8], $t1, 0, $t2, 0, 2);
    };
    $get_data__0 = (dynamic $t) ==> {
      return $obj_opt($call1($Obj[26][9], $t));
    };
    $get_data_copy__0 = (dynamic $t) ==> {
      return $obj_opt($call1($Obj[26][10], $t));
    };
    $set_data__0 = (dynamic $t, dynamic $d) ==> {
      return $call2($Obj[26][11], $t, $d);
    };
    $unset_data__0 = (dynamic $t) ==> {return $call1($Obj[26][12], $t);};
    $check_data__0 = (dynamic $t) ==> {return $call1($Obj[26][13], $t);};
    $blit_data__0 = (dynamic $t1, dynamic $t2) ==> {
      return $call2($Obj[26][14], $t1, $t2);
    };
    $MakeSeeded__1 = (dynamic $H1, dynamic $H2) ==> {
      $create = (dynamic $param, dynamic $d) ==> {
        $k2 = $param[2];
        $k1 = $param[1];
        $c = $create__0(0);
        $set_data__0($c, $d);
        $set_key1($c, $k1);
        $set_key2($c, $k2);
        return $c;
      };
      $hash = (dynamic $seed, dynamic $param) ==> {
        $k2 = $param[2];
        $k1 = $param[1];
        $z_ = (int) ($call2($H2[2], $seed, $k2) * 65599);
        return (int) ($call2($H1[2], $seed, $k1) + $z_);
      };
      $equal = (dynamic $c, dynamic $param) ==> {
        $k2 = $param[2];
        $k1 = $param[1];
        $match = $get_key1($c);
        $match__0 = $get_key2($c);
        if ($match) {
          if ($match__0) {
            $k2__0 = $match__0[1];
            $k1__0 = $match[1];
            if ($call2($H1[1], $k1, $k1__0)) {
              if ($call2($H2[1], $k2, $k2__0)) {return 0;}
            }
            return 1;
          }
        }
        return 2;
      };
      $get_key = (dynamic $c) ==> {
        $match = $get_key1($c);
        $match__0 = $get_key2($c);
        if ($match) {
          if ($match__0) {
            $k2 = $match__0[1];
            $k1 = $match[1];
            return Vector{0, Vector{0, $k1, $k2}};
          }
        }
        return 0;
      };
      $set_key_data = (dynamic $c, dynamic $param, dynamic $d) ==> {
        $k2 = $param[2];
        $k1 = $param[1];
        $unset_data__0($c);
        $set_key1($c, $k1);
        $set_key2($c, $k2);
        return $set_data__0($c, $d);
      };
      $check_key = (dynamic $c) ==> {
        $y_ = $check_key1($c);
        return $y_ ? $check_key2($c) : ($y_);
      };
      return $MakeSeeded(
        Vector{
          0,
          $create,
          $hash,
          $equal,
          $get_data__0,
          $get_key,
          $set_key_data,
          $check_key
        }
      );
    };
    $Make__0 = (dynamic $H1, dynamic $H2) ==> {
      $equal = $H2[1];
      $hash = (dynamic $seed, dynamic $x) ==> {return $call1($H2[2], $x);};
      $equal__0 = $H1[1];
      $u_ = Vector{0, $equal, $hash};
      $hash__0 = (dynamic $seed, dynamic $x) ==> {return $call1($H1[2], $x);};
      $v_ = Vector{0, $equal__0, $hash__0};
      $include = ((dynamic $x_) ==> {return $MakeSeeded__1($v_, $x_);})($u_);
      $clear = $include[2];
      $reset = $include[3];
      $copy = $include[4];
      $add = $include[5];
      $remove = $include[6];
      $find = $include[7];
      $find_opt = $include[8];
      $find_all = $include[9];
      $replace = $include[10];
      $mem = $include[11];
      $iter = $include[12];
      $filter_map_inplace = $include[13];
      $fold = $include[14];
      $length = $include[15];
      $stats = $include[16];
      $clean = $include[17];
      $stats_alive = $include[18];
      $w_ = $include[1];
      $create = (dynamic $sz) ==> {return $call2($w_, $b_, $sz);};
      return Vector{
        0,
        $create,
        $clear,
        $reset,
        $copy,
        $add,
        $remove,
        $find,
        $find_opt,
        $find_all,
        $replace,
        $mem,
        $iter,
        $filter_map_inplace,
        $fold,
        $length,
        $stats,
        $clean,
        $stats_alive
      };
    };
    $create__1 = (dynamic $n) ==> {return $call1($Obj[26][1], $n);};
    $length = (dynamic $k) ==> {return $call1($Obj[26][2], $k);};
    $get_key__0 = (dynamic $t, dynamic $n) ==> {
      return $obj_opt($call2($Obj[26][3], $t, $n));
    };
    $get_key_copy__0 = (dynamic $t, dynamic $n) ==> {
      return $obj_opt($call2($Obj[26][4], $t, $n));
    };
    $set_key__0 = (dynamic $t, dynamic $n, dynamic $k) ==> {
      return $call3($Obj[26][5], $t, $n, $k);
    };
    $unset_key__0 = (dynamic $t, dynamic $n) ==> {
      return $call2($Obj[26][6], $t, $n);
    };
    $check_key__0 = (dynamic $t, dynamic $n) ==> {
      return $call2($Obj[26][7], $t, $n);
    };
    $blit_key__0 = 
    (dynamic $t1, dynamic $o1, dynamic $t2, dynamic $o2, dynamic $l) ==> {return $call5($Obj[26][8], $t1, $o1, $t2, $o2, $l);
    };
    $get_data__1 = (dynamic $t) ==> {
      return $obj_opt($call1($Obj[26][9], $t));
    };
    $get_data_copy__1 = (dynamic $t) ==> {
      return $obj_opt($call1($Obj[26][10], $t));
    };
    $set_data__1 = (dynamic $t, dynamic $d) ==> {
      return $call2($Obj[26][11], $t, $d);
    };
    $unset_data__1 = (dynamic $t) ==> {return $call1($Obj[26][12], $t);};
    $check_data__1 = (dynamic $t) ==> {return $call1($Obj[26][13], $t);};
    $blit_data__1 = (dynamic $t1, dynamic $t2) ==> {
      return $call2($Obj[26][14], $t1, $t2);
    };
    $MakeSeeded__2 = (dynamic $H) ==> {
      $create = (dynamic $k, dynamic $d) ==> {
        $c = $create__1($k->count() - 1);
        $set_data__1($c, $d);
        $s_ = (int) ($k->count() - 1 + -1);
        $r_ = 0;
        if (! ($s_ < 0)) {
          $i = $r_;
          for (;;) {
            $set_key__0($c, $i, $caml_check_bound($k, $i)[$i + 1]);
            $t_ = (int) ($i + 1);
            if ($s_ !== $i) {$i = $t_;continue;}
            break;
          }
        }
        return $c;
      };
      $hash = (dynamic $seed, dynamic $k) ==> {
        $h = Vector{0, 0};
        $n_ = (int) ($k->count() - 1 + -1);
        $m_ = 0;
        if (! ($n_ < 0)) {
          $i = $m_;
          for (;;) {
            $o_ = $h[1];
            $p_ = $caml_check_bound($k, $i)[$i + 1];
            $h[1] = (int) ((int) ($call2($H[2], $seed, $p_) * 65599) + $o_);
            $q_ = (int) ($i + 1);
            if ($n_ !== $i) {$i = $q_;continue;}
            break;
          }
        }
        return $h[1];
      };
      $equal = (dynamic $c, dynamic $k) ==> {
        $len = $k->count() - 1;
        $len__0 = $length($c);
        if ($len !== $len__0) {return 1;}
        $equal_array = (dynamic $k, dynamic $c, dynamic $i) ==> {
          $i__0 = $i;
          for (;;) {
            if (0 <= $i__0) {
              $match = $get_key__0($c, $i__0);
              if ($match) {
                $ki = $match[1];
                $l_ = $caml_check_bound($k, $i__0)[$i__0 + 1];
                if ($call2($H[1], $l_, $ki)) {
                  $i__1 = (int) ($i__0 + -1);
                  $i__0 = $i__1;
                  continue;
                }
                return 1;
              }
              return 2;
            }
            return 0;
          }
        };
        return $equal_array($k, $c, (int) ($len + -1));
      };
      $get_key = (dynamic $c) ==> {
        $len = $length($c);
        if (0 === $len) {return Vector{0, Vector{0}};}
        $match = $get_key__0($c, 0);
        if ($match) {
          $k0 = $match[1];
          $fill = (dynamic $a, dynamic $i) ==> {
            $i__0 = $i;
            for (;;) {
              if (1 <= $i__0) {
                $match = $get_key__0($c, $i__0);
                if ($match) {
                  $ki = $match[1];
                  $caml_check_bound($a, $i__0)[$i__0 + 1] = $ki;
                  $i__1 = (int) ($i__0 + -1);
                  $i__0 = $i__1;
                  continue;
                }
                return 0;
              }
              return Vector{0, $a};
            }
          };
          $a = $caml_make_vect($len, $k0);
          return $fill($a, (int) ($len + -1));
        }
        return 0;
      };
      $set_key_data = (dynamic $c, dynamic $k, dynamic $d) ==> {
        $unset_data__1($c);
        $j_ = (int) ($k->count() - 1 + -1);
        $i_ = 0;
        if (! ($j_ < 0)) {
          $i = $i_;
          for (;;) {
            $set_key__0($c, $i, $caml_check_bound($k, $i)[$i + 1]);
            $k_ = (int) ($i + 1);
            if ($j_ !== $i) {$i = $k_;continue;}
            break;
          }
        }
        return $set_data__1($c, $d);
      };
      $check_key = (dynamic $c) ==> {
        $check = (dynamic $c, dynamic $i) ==> {
          $i__0 = $i;
          for (;;) {
            $f_ = $i__0 < 0 ? 1 : (0);
            if ($f_) {
              $g_ = $f_;
            }
            else {
              $h_ = $check_key__0($c, $i__0);
              if ($h_) {$i__1 = (int) ($i__0 + -1);$i__0 = $i__1;continue;}
              $g_ = $h_;
            }
            return $g_;
          }
        };
        return $check($c, (int) ($length($c) + -1));
      };
      return $MakeSeeded(
        Vector{
          0,
          $create,
          $hash,
          $equal,
          $get_data__1,
          $get_key,
          $set_key_data,
          $check_key
        }
      );
    };
    $Make__1 = (dynamic $H) ==> {
      $equal = $H[1];
      $hash = (dynamic $seed, dynamic $x) ==> {return $call1($H[2], $x);};
      $include = $MakeSeeded__2(Vector{0, $equal, $hash});
      $clear = $include[2];
      $reset = $include[3];
      $copy = $include[4];
      $add = $include[5];
      $remove = $include[6];
      $find = $include[7];
      $find_opt = $include[8];
      $find_all = $include[9];
      $replace = $include[10];
      $mem = $include[11];
      $iter = $include[12];
      $filter_map_inplace = $include[13];
      $fold = $include[14];
      $length = $include[15];
      $stats = $include[16];
      $clean = $include[17];
      $stats_alive = $include[18];
      $e_ = $include[1];
      $create = (dynamic $sz) ==> {return $call2($e_, $c_, $sz);};
      return Vector{
        0,
        $create,
        $clear,
        $reset,
        $copy,
        $add,
        $remove,
        $find,
        $find_opt,
        $find_all,
        $replace,
        $mem,
        $iter,
        $filter_map_inplace,
        $fold,
        $length,
        $stats,
        $clean,
        $stats_alive
      };
    };
    $Ephemeron = Vector{
      0,
      Vector{
        0,
        $create,
        $get_key,
        $get_key_copy,
        $set_key,
        $unset_key,
        $check_key,
        $blit_key,
        $get_data,
        $get_data_copy,
        $set_data,
        $unset_data,
        $check_data,
        $blit_data,
        $Make,
        $MakeSeeded__0
      },
      Vector{
        0,
        $create__0,
        $get_key1,
        $get_key1_copy,
        $set_key1,
        $unset_key1,
        $check_key1,
        $get_key2,
        $get_key2_copy,
        $set_key2,
        $unset_key2,
        $check_key2,
        $blit_key1,
        $blit_key2,
        $blit_key12,
        $get_data__0,
        $get_data_copy__0,
        $set_data__0,
        $unset_data__0,
        $check_data__0,
        $blit_data__0,
        $Make__0,
        $MakeSeeded__1
      },
      Vector{
        0,
        $create__1,
        $get_key__0,
        $get_key_copy__0,
        $set_key__0,
        $unset_key__0,
        $check_key__0,
        $blit_key__0,
        $get_data__1,
        $get_data_copy__1,
        $set_data__1,
        $unset_data__1,
        $check_data__1,
        $blit_data__1,
        $Make__1,
        $MakeSeeded__2
      },
      Vector{
        0,
        (dynamic $d_) ==> {
          return $MakeSeeded(
            Vector{0, $d_[3], $d_[1], $d_[2], $d_[5], $d_[4], $d_[6], $d_[7]}
          );
        }
      }
    };
    
     return ($Ephemeron);

  }

}
/* Hashing disabled */
