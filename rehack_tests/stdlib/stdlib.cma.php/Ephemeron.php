<?hh
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * Ephemeron.php
 */

namespace Rehack;

final class Ephemeron {
  <<__Memoize>>
  public static function get() {
    $global_object = \Rehack\GlobalObject::get();
    $runtime = \Rehack\Runtime::get();
    /*
     * Soon, these will replace the `global_data->ModuleName`
     * pattern in the load() function.
     */
    $Array_ = Array_::get();
    $CamlinternalLazy = CamlinternalLazy::get();
    $Hashtbl = Hashtbl::get();
    $Obj = Obj::get();
    $Pervasives = Pervasives::get();
    $Random = Random::get();
    $Sys = Sys::get();
    $Not_found = Not_found::get();
    Ephemeron::load($global_object);
    $memoized = $runtime->caml_get_global_data()->Ephemeron;
    return $memoized;
  }

  /**
   * Performs module load operation. May have side effects.
   */
  private static function load($joo_global_object) {
    

    $runtime = $joo_global_object->jsoo_runtime;
    $unsigned_right_shift_32 = $runtime->unsigned_right_shift_32;
    $left_shift_32 = $runtime->left_shift_32;
    $caml_arity_test = $runtime->caml_arity_test;
    $caml_check_bound = $runtime["caml_check_bound"];
    $caml_make_vect = $runtime["caml_make_vect"];
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
    $caml_call5 = function($f, $a0, $a1, $a2, $a3, $a4) use ($caml_arity_test,$runtime) {
      return $caml_arity_test($f) == 5
        ? $f($a0, $a1, $a2, $a3, $a4)
        : ($runtime["caml_call_gen"]($f, varray[$a0,$a1,$a2,$a3,$a4]));
    };
    $global_data = $runtime["caml_get_global_data"]();
    $Obj = $global_data["Obj"];
    $Sys = $global_data["Sys"];
    $Not_found = $global_data["Not_found"];
    $Pervasives = $global_data["Pervasives"];
    $Array = $global_data["Array_"];
    $Hashtbl = $global_data["Hashtbl"];
    $CamlinternalLazy = $global_data["CamlinternalLazy"];
    $Random = $global_data["Random"];
    $z4 = R(0, 0);
    $z3 = R(0, 0);
    $z2 = R(0, 0);
    $MakeSeeded = function($H) use ($Array,$CamlinternalLazy,$Hashtbl,$Not_found,$Pervasives,$Random,$Sys,$caml_call1,$caml_call2,$caml_call3,$caml_check_bound,$caml_make_vect,$caml_wrap_exception,$insert_bucket,$left_shift_32,$runtime,$unsigned_right_shift_32) {
      $power_2_above = function($x, $n) use ($Sys) {
        $x__0 = $x;
        for (;;) {
          if ($n <= $x__0) {return $x__0;}
          if ($Sys[14] < ($x__0 * 2 | 0)) {return $x__0;}
          $x__1 = $x__0 * 2 | 0;
          $x__0 = $x__1;
          continue;
        }
      };
      $prng = V(
        246,
        function($Bd) use ($Random,$caml_call1) {
          return $caml_call1($Random[11][2], 0);
        }
      );
      $create = function($opt, $initial_size) use ($CamlinternalLazy,$Hashtbl,$Random,$caml_call1,$caml_make_vect,$power_2_above,$prng,$runtime) {
        if ($opt) {
          $sth = $opt[1];
          $random = $sth;
        }
        else {$random = $caml_call1($Hashtbl[17], 0);}
        $s = $power_2_above(16, $initial_size);
        if ($random) {
          $Bb = $runtime["caml_obj_tag"]($prng);
          $Bc = 250 === $Bb
            ? $prng[1]
            : (246 === $Bb
             ? $caml_call1($CamlinternalLazy[2], $prng)
             : ($prng));
          $seed = $caml_call1($Random[11][4], $Bc);
        }
        else {$seed = 0;}
        return V(0, 0, $caml_make_vect($s, 0), $seed, $s);
      };
      $clear = function($h) use ($caml_check_bound) {
        $h[1] = 0;
        $len = $h[2]->length - 1;
        $A_ = $len + -1 | 0;
        $A9 = 0;
        if (! ($A_ < 0)) {
          $i = $A9;
          for (;;) {
            $caml_check_bound($h[2], $i)[$i + 1] = 0;
            $Ba = $i + 1 | 0;
            if ($A_ !== $i) {$i = $Ba;continue;}
            break;
          }
        }
        return 0;
      };
      $reset = function($h) use ($caml_make_vect,$clear) {
        $len = $h[2]->length - 1;
        return $len === $h[4]
          ? $clear($h)
          : (($h[1] = 0) || true
           ? ($h[2] = $caml_make_vect($h[4], 0)) || true ? 0 : (0)
           : (($h[2] = $caml_make_vect($h[4], 0)) || true ? 0 : (0)));
      };
      $copy = function($h) use ($Array,$caml_call1) {
        $A6 = $h[4];
        $A7 = $h[3];
        $A8 = $caml_call1($Array[8], $h[2]);
        return V(0, $h[1], $A8, $A7, $A6);
      };
      $key_index = function($h, $hkey) {
        return $hkey & ($h[2]->length - 1 + -1 | 0);
      };
      $clean = function($h) use ($H,$caml_call1,$caml_check_bound) {
        $do_bucket = new Ref();
        $_ = $do_bucket->contents =
          function($param) use ($H,$caml_call1,$do_bucket,$h) {
            $param__0 = $param;
            for (;;) {
              if ($param__0) {
                $rest = $param__0[3];
                $c = $param__0[2];
                $hkey = $param__0[1];
                if ($caml_call1($H[7], $c)) {
                  return V(0, $hkey, $c, $do_bucket->contents($rest));
                }
                $h[1] = $h[1] + -1 | 0;
                $param__0 = $rest;
                continue;
              }
              return 0;
            }
          };
        $d = $h[2];
        $A4 = $d->length - 1 + -1 | 0;
        $A3 = 0;
        if (! ($A4 < 0)) {
          $i = $A3;
          for (;;) {
            $d[$i + 1] =
              $do_bucket->contents($caml_check_bound($d, $i)[$i + 1]);
            $A5 = $i + 1 | 0;
            if ($A4 !== $i) {$i = $A5;continue;}
            break;
          }
        }
        return 0;
      };
      $resize = function($h) use ($Sys,$caml_check_bound,$caml_make_vect,$clean,$insert_bucket,$key_index,$unsigned_right_shift_32) {
        $odata = $h[2];
        $osize = $odata->length - 1;
        $nsize = $osize * 2 | 0;
        $clean($h);
        $AX = $nsize < $Sys[14] ? 1 : (0);
        $AY = $AX
          ? ($unsigned_right_shift_32($osize, 1) | 0) <= $h[1] ? 1 : (0)
          : ($AX);
        if ($AY) {
          $ndata = $caml_make_vect($nsize, 0);
          $h[2] = $ndata;
          $_ = $insert_bucket->contents =
            function($param) use ($caml_check_bound,$h,$insert_bucket,$key_index,$ndata) {
              if ($param) {
                $rest = $param[3];
                $data = $param[2];
                $hkey = $param[1];
                $insert_bucket->contents($rest);
                $nidx = $key_index($h, $hkey);
                return $ndata[$nidx + 1] =
                  V(
                    0,
                    $hkey,
                    $data,
                    $caml_check_bound($ndata, $nidx)[$nidx + 1]
                  );
              }
              return 0;
            };
          $A0 = $osize + -1 | 0;
          $AZ = 0;
          if (! ($A0 < 0)) {
            $i = $AZ;
            for (;;) {
              $insert_bucket->contents($caml_check_bound($odata, $i)[$i + 1]);
              $A2 = $i + 1 | 0;
              if ($A0 !== $i) {$i = $A2;continue;}
              break;
            }
          }
          $A1 = 0;
        }
        else {$A1 = $AY;}
        return $A1;
      };
      $add = function($h, $key, $info) use ($H,$caml_call2,$caml_check_bound,$key_index,$left_shift_32,$resize) {
        $hkey = $caml_call2($H[2], $h[3], $key);
        $i = $key_index($h, $hkey);
        $container = $caml_call2($H[1], $key, $info);
        $bucket = V(0, $hkey, $container, $caml_check_bound($h[2], $i)[$i + 1]
        );
        $caml_check_bound($h[2], $i)[$i + 1] = $bucket;
        $h[1] = $h[1] + 1 | 0;
        $AW = $left_shift_32($h[2]->length - 1, 1) < $h[1] ? 1 : (0);
        return $AW ? $resize($h) : ($AW);
      };
      $remove = function($h, $key) use ($H,$caml_call2,$caml_check_bound,$key_index) {
        $remove_bucket = new Ref();
        $hkey = $caml_call2($H[2], $h[3], $key);
        $_ = $remove_bucket->contents =
          function($param) use ($H,$caml_call2,$h,$hkey,$key,$remove_bucket) {
            $param__0 = $param;
            for (;;) {
              if ($param__0) {
                $next = $param__0[3];
                $c = $param__0[2];
                $hk = $param__0[1];
                if ($hkey === $hk) {
                  $match = $caml_call2($H[3], $c, $key);
                  switch($match) {
                    // FALLTHROUGH
                    case 0:
                      $h[1] = $h[1] + -1 | 0;
                      return $next;
                    // FALLTHROUGH
                    case 1:
                      return V(0, $hk, $c, $remove_bucket->contents($next));
                    // FALLTHROUGH
                    default:
                      $h[1] = $h[1] + -1 | 0;
                      $param__0 = $next;
                      continue;
                    }
                }
                return V(0, $hk, $c, $remove_bucket->contents($next));
              }
              return 0;
            }
          };
        $i = $key_index($h, $hkey);
        $AV = $remove_bucket->contents($caml_check_bound($h[2], $i)[$i + 1]);
        return $caml_check_bound($h[2], $i)[$i + 1] = $AV;
      };
      $find_rec = function($key, $hkey, $param) use ($H,$Not_found,$caml_call1,$caml_call2,$runtime) {
        $param__0 = $param;
        for (;;) {
          if ($param__0) {
            $rest = $param__0[3];
            $c = $param__0[2];
            $hk = $param__0[1];
            if ($hkey === $hk) {
              $match = $caml_call2($H[3], $c, $key);
              switch($match) {
                // FALLTHROUGH
                case 0:
                  $match__0 = $caml_call1($H[4], $c);
                  if ($match__0) {$d = $match__0[1];return $d;}
                  $param__0 = $rest;
                  continue;
                // FALLTHROUGH
                case 1:
                  $param__0 = $rest;
                  continue;
                // FALLTHROUGH
                default:
                  $param__0 = $rest;
                  continue;
                }
            }
            $param__0 = $rest;
            continue;
          }
          throw $runtime["caml_wrap_thrown_exception"]($Not_found);
        }
      };
      $find = function($h, $key) use ($H,$caml_call2,$caml_check_bound,$find_rec,$key_index) {
        $hkey = $caml_call2($H[2], $h[3], $key);
        $AU = $key_index($h, $hkey);
        return $find_rec($key, $hkey, $caml_check_bound($h[2], $AU)[$AU + 1]);
      };
      $find_rec_opt = function($key, $hkey, $param) use ($H,$caml_call1,$caml_call2) {
        $param__0 = $param;
        for (;;) {
          if ($param__0) {
            $rest = $param__0[3];
            $c = $param__0[2];
            $hk = $param__0[1];
            if ($hkey === $hk) {
              $match = $caml_call2($H[3], $c, $key);
              switch($match) {
                // FALLTHROUGH
                case 0:
                  $d = $caml_call1($H[4], $c);
                  if ($d) {return $d;}
                  $param__0 = $rest;
                  continue;
                // FALLTHROUGH
                case 1:
                  $param__0 = $rest;
                  continue;
                // FALLTHROUGH
                default:
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
      $find_opt = function($h, $key) use ($H,$caml_call2,$caml_check_bound,$find_rec_opt,$key_index) {
        $hkey = $caml_call2($H[2], $h[3], $key);
        $AT = $key_index($h, $hkey);
        return $find_rec_opt(
          $key,
          $hkey,
          $caml_check_bound($h[2], $AT)[$AT + 1]
        );
      };
      $find_all = function($h, $key) use ($H,$caml_call1,$caml_call2,$caml_check_bound,$key_index) {
        $find_in_bucket = new Ref();
        $hkey = $caml_call2($H[2], $h[3], $key);
        $_ = $find_in_bucket->contents =
          function($param) use ($H,$caml_call1,$caml_call2,$find_in_bucket,$hkey,$key) {
            $param__0 = $param;
            for (;;) {
              if ($param__0) {
                $rest = $param__0[3];
                $c = $param__0[2];
                $hk = $param__0[1];
                if ($hkey === $hk) {
                  $match = $caml_call2($H[3], $c, $key);
                  switch($match) {
                    // FALLTHROUGH
                    case 0:
                      $match__0 = $caml_call1($H[4], $c);
                      if ($match__0) {
                        $d = $match__0[1];
                        return V(0, $d, $find_in_bucket->contents($rest));
                      }
                      $param__0 = $rest;
                      continue;
                    // FALLTHROUGH
                    case 1:
                      $param__0 = $rest;
                      continue;
                    // FALLTHROUGH
                    default:
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
        $AS = $key_index($h, $hkey);
        return $find_in_bucket->contents(
          $caml_check_bound($h[2], $AS)[$AS + 1]
        );
      };
      $replace = function($h, $key, $info) use ($H,$Not_found,$caml_call2,$caml_call3,$caml_check_bound,$caml_wrap_exception,$key_index,$left_shift_32,$resize,$runtime) {
        $hkey = $caml_call2($H[2], $h[3], $key);
        $replace_bucket = function($param) use ($H,$Not_found,$caml_call2,$caml_call3,$hkey,$info,$key,$runtime) {
          $param__0 = $param;
          for (;;) {
            if ($param__0) {
              $next = $param__0[3];
              $c = $param__0[2];
              $hk = $param__0[1];
              if ($hkey === $hk) {
                $match = $caml_call2($H[3], $c, $key);
                if (0 === $match) {
                  return $caml_call3($H[6], $c, $key, $info);
                }
                $param__0 = $next;
                continue;
              }
              $param__0 = $next;
              continue;
            }
            throw $runtime["caml_wrap_thrown_exception"]($Not_found);
          }
        };
        $i = $key_index($h, $hkey);
        $l = $caml_check_bound($h[2], $i)[$i + 1];
        try {$AQ = $replace_bucket($l);return $AQ;}
        catch(\Throwable $AR) {
          $AR = $caml_wrap_exception($AR);
          if ($AR === $Not_found) {
            $container = $caml_call2($H[1], $key, $info);
            $caml_check_bound($h[2], $i)[$i + 1] = V(0, $hkey, $container, $l);
            $h[1] = $h[1] + 1 | 0;
            $AP = $left_shift_32($h[2]->length - 1, 1) < $h[1] ? 1 : (0);
            return $AP ? $resize($h) : ($AP);
          }
          throw $runtime["caml_wrap_thrown_exception_reraise"]($AR);
        }
      };
      $mem = function($h, $key) use ($H,$caml_call2,$caml_check_bound,$key_index) {
        $hkey = $caml_call2($H[2], $h[3], $key);
        $mem_in_bucket = function($param) use ($H,$caml_call2,$hkey,$key) {
          $param__0 = $param;
          for (;;) {
            if ($param__0) {
              $rest = $param__0[3];
              $c = $param__0[2];
              $hk = $param__0[1];
              if ($hk === $hkey) {
                $match = $caml_call2($H[3], $c, $key);
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
        $AO = $key_index($h, $hkey);
        return $mem_in_bucket($caml_check_bound($h[2], $AO)[$AO + 1]);
      };
      $iter = function($f, $h) use ($H,$caml_call1,$caml_call2,$caml_check_bound) {
        $do_bucket = function($param) use ($H,$caml_call1,$caml_call2,$f) {
          $param__0 = $param;
          for (;;) {
            if ($param__0) {
              $rest = $param__0[3];
              $c = $param__0[2];
              $match = $caml_call1($H[5], $c);
              $match__0 = $caml_call1($H[4], $c);
              if ($match) {
                if ($match__0) {
                  $d = $match__0[1];
                  $k = $match[1];
                  $caml_call2($f, $k, $d);
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
        $AM = $d->length - 1 + -1 | 0;
        $AL = 0;
        if (! ($AM < 0)) {
          $i = $AL;
          for (;;) {
            $do_bucket($caml_check_bound($d, $i)[$i + 1]);
            $AN = $i + 1 | 0;
            if ($AM !== $i) {$i = $AN;continue;}
            break;
          }
        }
        return 0;
      };
      $fold = function($f, $h, $init) use ($H,$caml_call1,$caml_call3,$caml_check_bound) {
        $do_bucket = function($b, $accu) use ($H,$caml_call1,$caml_call3,$f) {
          $b__0 = $b;
          $accu__0 = $accu;
          for (;;) {
            if ($b__0) {
              $rest = $b__0[3];
              $c = $b__0[2];
              $match = $caml_call1($H[5], $c);
              $match__0 = $caml_call1($H[4], $c);
              if ($match) {
                if ($match__0) {
                  $d = $match__0[1];
                  $k = $match[1];
                  $accu__1 = $caml_call3($f, $k, $d, $accu__0);
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
        $accu = V(0, $init);
        $AI = $d->length - 1 + -1 | 0;
        $AH = 0;
        if (! ($AI < 0)) {
          $i = $AH;
          for (;;) {
            $AJ = $accu[1];
            $accu[1] = $do_bucket($caml_check_bound($d, $i)[$i + 1], $AJ);
            $AK = $i + 1 | 0;
            if ($AI !== $i) {$i = $AK;continue;}
            break;
          }
        }
        return $accu[1];
      };
      $filter_map_inplace = function($f, $h) use ($H,$caml_call1,$caml_call2,$caml_call3,$caml_check_bound) {
        $do_bucket = new Ref();
        $_ = $do_bucket->contents =
          function($param) use ($H,$caml_call1,$caml_call2,$caml_call3,$do_bucket,$f) {
            $param__0 = $param;
            for (;;) {
              if ($param__0) {
                $rest = $param__0[3];
                $c = $param__0[2];
                $hk = $param__0[1];
                $match = $caml_call1($H[5], $c);
                $match__0 = $caml_call1($H[4], $c);
                if ($match) {
                  if ($match__0) {
                    $d = $match__0[1];
                    $k = $match[1];
                    $match__1 = $caml_call2($f, $k, $d);
                    if ($match__1) {
                      $new_d = $match__1[1];
                      $caml_call3($H[6], $c, $k, $new_d);
                      return V(0, $hk, $c, $do_bucket->contents($rest));
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
        $AF = $d->length - 1 + -1 | 0;
        $AE = 0;
        if (! ($AF < 0)) {
          $i = $AE;
          for (;;) {
            $d[$i + 1] =
              $do_bucket->contents($caml_check_bound($d, $i)[$i + 1]);
            $AG = $i + 1 | 0;
            if ($AF !== $i) {$i = $AG;continue;}
            break;
          }
        }
        return 0;
      };
      $length = function($h) {return $h[1];};
      $bucket_length = function($accu, $param) {
        $accu__0 = $accu;
        $param__0 = $param;
        for (;;) {
          if ($param__0) {
            $param__1 = $param__0[3];
            $accu__1 = $accu__0 + 1 | 0;
            $accu__0 = $accu__1;
            $param__0 = $param__1;
            continue;
          }
          return $accu__0;
        }
      };
      $stats = function($h) use ($Array,$Pervasives,$bucket_length,$caml_call2,$caml_call3,$caml_check_bound,$caml_make_vect) {
        $Ay = $h[2];
        $Az = 0;
        $AA = function($m, $b) use ($Pervasives,$bucket_length,$caml_call2) {
          $AD = $bucket_length(0, $b);
          return $caml_call2($Pervasives[5], $m, $AD);
        };
        $mbl = $caml_call3($Array[17], $AA, $Az, $Ay);
        $histo = $caml_make_vect($mbl + 1 | 0, 0);
        $AB = $h[2];
        $AC = function($b) use ($bucket_length,$caml_check_bound,$histo) {
          $l = $bucket_length(0, $b);
          return $histo[$l + 1] =
            $caml_check_bound($histo, $l)[$l + 1] + 1 |
              0;
        };
        $caml_call2($Array[13], $AC, $AB);
        return V(0, $h[1], $h[2]->length - 1, $mbl, $histo);
      };
      $bucket_length_alive = function($accu, $param) use ($H,$caml_call1) {
        $accu__0 = $accu;
        $param__0 = $param;
        for (;;) {
          if ($param__0) {
            $rest = $param__0[3];
            $c = $param__0[2];
            if ($caml_call1($H[7], $c)) {
              $accu__1 = $accu__0 + 1 | 0;
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
      $stats_alive = function($h) use ($Array,$Pervasives,$bucket_length_alive,$caml_call2,$caml_call3,$caml_check_bound,$caml_make_vect) {
        $size = V(0, 0);
        $As = $h[2];
        $At = 0;
        $Au = function($m, $b) use ($Pervasives,$bucket_length_alive,$caml_call2) {
          $Ax = $bucket_length_alive(0, $b);
          return $caml_call2($Pervasives[5], $m, $Ax);
        };
        $mbl = $caml_call3($Array[17], $Au, $At, $As);
        $histo = $caml_make_vect($mbl + 1 | 0, 0);
        $Av = $h[2];
        $Aw = function($b) use ($bucket_length_alive,$caml_check_bound,$histo,$size) {
          $l = $bucket_length_alive(0, $b);
          $size[1] = $size[1] + $l | 0;
          return $histo[$l + 1] =
            $caml_check_bound($histo, $l)[$l + 1] + 1 |
              0;
        };
        $caml_call2($Array[13], $Aw, $Av);
        return V(0, $size[1], $h[2]->length - 1, $mbl, $histo);
      };
      return V(
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
      );
    };
    $obj_opt = function($x) {return $x;};
    $create = function($param) use ($Obj,$caml_call1) {
      return $caml_call1($Obj[26][1], 1);
    };
    $get_key = function($t) use ($Obj,$caml_call2,$obj_opt) {
      return $obj_opt($caml_call2($Obj[26][3], $t, 0));
    };
    $get_key_copy = function($t) use ($Obj,$caml_call2,$obj_opt) {
      return $obj_opt($caml_call2($Obj[26][4], $t, 0));
    };
    $set_key = function($t, $k) use ($Obj,$caml_call3) {
      return $caml_call3($Obj[26][5], $t, 0, $k);
    };
    $unset_key = function($t) use ($Obj,$caml_call2) {
      return $caml_call2($Obj[26][6], $t, 0);
    };
    $check_key = function($t) use ($Obj,$caml_call2) {
      return $caml_call2($Obj[26][7], $t, 0);
    };
    $blit_key = function($t1, $t2) use ($Obj,$caml_call5) {
      return $caml_call5($Obj[26][8], $t1, 0, $t2, 0, 1);
    };
    $get_data = function($t) use ($Obj,$caml_call1,$obj_opt) {
      return $obj_opt($caml_call1($Obj[26][9], $t));
    };
    $get_data_copy = function($t) use ($Obj,$caml_call1,$obj_opt) {
      return $obj_opt($caml_call1($Obj[26][10], $t));
    };
    $set_data = function($t, $d) use ($Obj,$caml_call2) {
      return $caml_call2($Obj[26][11], $t, $d);
    };
    $unset_data = function($t) use ($Obj,$caml_call1) {
      return $caml_call1($Obj[26][12], $t);
    };
    $check_data = function($t) use ($Obj,$caml_call1) {
      return $caml_call1($Obj[26][13], $t);
    };
    $blit_data = function($t1, $t2) use ($Obj,$caml_call2) {
      return $caml_call2($Obj[26][14], $t1, $t2);
    };
    $MakeSeeded__0 = function($H) use ($MakeSeeded,$caml_call2,$check_key,$create,$get_data,$get_key,$set_data,$set_key,$unset_data) {
      $create__0 = function($k, $d) use ($create,$set_data,$set_key) {
        $c = $create(0);
        $set_data($c, $d);
        $set_key($c, $k);
        return $c;
      };
      $hash = $H[2];
      $equal = function($c, $k) use ($H,$caml_call2,$get_key) {
        $match = $get_key($c);
        if ($match) {
          $k__0 = $match[1];
          return $caml_call2($H[1], $k, $k__0) ? 0 : (1);
        }
        return 2;
      };
      $set_key_data = function($c, $k, $d) use ($set_data,$set_key,$unset_data) {
        $unset_data($c);
        $set_key($c, $k);
        return $set_data($c, $d);
      };
      return $MakeSeeded(
        V(
          0,
          $create__0,
          $hash,
          $equal,
          $get_data,
          $get_key,
          $set_key_data,
          $check_key
        )
      );
    };
    $Make = function($H) use ($MakeSeeded__0,$caml_call1,$caml_call2,$z2) {
      $equal = $H[1];
      $hash = function($seed, $x) use ($H,$caml_call1) {
        return $caml_call1($H[2], $x);
      };
      $include = $MakeSeeded__0(V(0, $equal, $hash));
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
      $Ar = $include[1];
      $create = function($sz) use ($Ar,$caml_call2,$z2) {
        return $caml_call2($Ar, $z2, $sz);
      };
      return V(
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
      );
    };
    $create__0 = function($param) use ($Obj,$caml_call1) {
      return $caml_call1($Obj[26][1], 2);
    };
    $get_key1 = function($t) use ($Obj,$caml_call2,$obj_opt) {
      return $obj_opt($caml_call2($Obj[26][3], $t, 0));
    };
    $get_key1_copy = function($t) use ($Obj,$caml_call2,$obj_opt) {
      return $obj_opt($caml_call2($Obj[26][4], $t, 0));
    };
    $set_key1 = function($t, $k) use ($Obj,$caml_call3) {
      return $caml_call3($Obj[26][5], $t, 0, $k);
    };
    $unset_key1 = function($t) use ($Obj,$caml_call2) {
      return $caml_call2($Obj[26][6], $t, 0);
    };
    $check_key1 = function($t) use ($Obj,$caml_call2) {
      return $caml_call2($Obj[26][7], $t, 0);
    };
    $get_key2 = function($t) use ($Obj,$caml_call2,$obj_opt) {
      return $obj_opt($caml_call2($Obj[26][3], $t, 1));
    };
    $get_key2_copy = function($t) use ($Obj,$caml_call2,$obj_opt) {
      return $obj_opt($caml_call2($Obj[26][4], $t, 1));
    };
    $set_key2 = function($t, $k) use ($Obj,$caml_call3) {
      return $caml_call3($Obj[26][5], $t, 1, $k);
    };
    $unset_key2 = function($t) use ($Obj,$caml_call2) {
      return $caml_call2($Obj[26][6], $t, 1);
    };
    $check_key2 = function($t) use ($Obj,$caml_call2) {
      return $caml_call2($Obj[26][7], $t, 1);
    };
    $blit_key1 = function($t1, $t2) use ($Obj,$caml_call5) {
      return $caml_call5($Obj[26][8], $t1, 0, $t2, 0, 1);
    };
    $blit_key2 = function($t1, $t2) use ($Obj,$caml_call5) {
      return $caml_call5($Obj[26][8], $t1, 1, $t2, 1, 1);
    };
    $blit_key12 = function($t1, $t2) use ($Obj,$caml_call5) {
      return $caml_call5($Obj[26][8], $t1, 0, $t2, 0, 2);
    };
    $get_data__0 = function($t) use ($Obj,$caml_call1,$obj_opt) {
      return $obj_opt($caml_call1($Obj[26][9], $t));
    };
    $get_data_copy__0 = function($t) use ($Obj,$caml_call1,$obj_opt) {
      return $obj_opt($caml_call1($Obj[26][10], $t));
    };
    $set_data__0 = function($t, $d) use ($Obj,$caml_call2) {
      return $caml_call2($Obj[26][11], $t, $d);
    };
    $unset_data__0 = function($t) use ($Obj,$caml_call1) {
      return $caml_call1($Obj[26][12], $t);
    };
    $check_data__0 = function($t) use ($Obj,$caml_call1) {
      return $caml_call1($Obj[26][13], $t);
    };
    $blit_data__0 = function($t1, $t2) use ($Obj,$caml_call2) {
      return $caml_call2($Obj[26][14], $t1, $t2);
    };
    $MakeSeeded__1 = function($H1, $H2) use ($MakeSeeded,$caml_call2,$check_key1,$check_key2,$create__0,$get_data__0,$get_key1,$get_key2,$set_data__0,$set_key1,$set_key2,$unset_data__0) {
      $create = function($param, $d) use ($create__0,$set_data__0,$set_key1,$set_key2) {
        $k2 = $param[2];
        $k1 = $param[1];
        $c = $create__0(0);
        $set_data__0($c, $d);
        $set_key1($c, $k1);
        $set_key2($c, $k2);
        return $c;
      };
      $hash = function($seed, $param) use ($H1,$H2,$caml_call2) {
        $k2 = $param[2];
        $k1 = $param[1];
        $Aq = $caml_call2($H2[2], $seed, $k2) * 65599 | 0;
        return $caml_call2($H1[2], $seed, $k1) + $Aq | 0;
      };
      $equal = function($c, $param) use ($H1,$H2,$caml_call2,$get_key1,$get_key2) {
        $k2 = $param[2];
        $k1 = $param[1];
        $match = $get_key1($c);
        $match__0 = $get_key2($c);
        if ($match) {
          if ($match__0) {
            $k2__0 = $match__0[1];
            $k1__0 = $match[1];
            if ($caml_call2($H1[1], $k1, $k1__0)) {
              if ($caml_call2($H2[1], $k2, $k2__0)) {return 0;}
            }
            return 1;
          }
        }
        return 2;
      };
      $get_key = function($c) use ($get_key1,$get_key2) {
        $match = $get_key1($c);
        $match__0 = $get_key2($c);
        if ($match) {
          if ($match__0) {
            $k2 = $match__0[1];
            $k1 = $match[1];
            return V(0, V(0, $k1, $k2));
          }
        }
        return 0;
      };
      $set_key_data = function($c, $param, $d) use ($set_data__0,$set_key1,$set_key2,$unset_data__0) {
        $k2 = $param[2];
        $k1 = $param[1];
        $unset_data__0($c);
        $set_key1($c, $k1);
        $set_key2($c, $k2);
        return $set_data__0($c, $d);
      };
      $check_key = function($c) use ($check_key1,$check_key2) {
        $Ap = $check_key1($c);
        return $Ap ? $check_key2($c) : ($Ap);
      };
      return $MakeSeeded(
        V(
          0,
          $create,
          $hash,
          $equal,
          $get_data__0,
          $get_key,
          $set_key_data,
          $check_key
        )
      );
    };
    $Make__0 = function($H1, $H2) use ($MakeSeeded__1,$caml_call1,$caml_call2,$z3) {
      $equal = $H2[1];
      $hash = function($seed, $x) use ($H2,$caml_call1) {
        return $caml_call1($H2[2], $x);
      };
      $equal__0 = $H1[1];
      $Al = V(0, $equal, $hash);
      $hash__0 = function($seed, $x) use ($H1,$caml_call1) {
        return $caml_call1($H1[2], $x);
      };
      $Am = V(0, $equal__0, $hash__0);
      $include = (function($Ao) use ($Am,$MakeSeeded__1) {
         return $MakeSeeded__1($Am, $Ao);
       })($Al);
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
      $An = $include[1];
      $create = function($sz) use ($An,$caml_call2,$z3) {
        return $caml_call2($An, $z3, $sz);
      };
      return V(
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
      );
    };
    $create__1 = function($n) use ($Obj,$caml_call1) {
      return $caml_call1($Obj[26][1], $n);
    };
    $length = function($k) use ($Obj,$caml_call1) {
      return $caml_call1($Obj[26][2], $k);
    };
    $get_key__0 = function($t, $n) use ($Obj,$caml_call2,$obj_opt) {
      return $obj_opt($caml_call2($Obj[26][3], $t, $n));
    };
    $get_key_copy__0 = function($t, $n) use ($Obj,$caml_call2,$obj_opt) {
      return $obj_opt($caml_call2($Obj[26][4], $t, $n));
    };
    $set_key__0 = function($t, $n, $k) use ($Obj,$caml_call3) {
      return $caml_call3($Obj[26][5], $t, $n, $k);
    };
    $unset_key__0 = function($t, $n) use ($Obj,$caml_call2) {
      return $caml_call2($Obj[26][6], $t, $n);
    };
    $check_key__0 = function($t, $n) use ($Obj,$caml_call2) {
      return $caml_call2($Obj[26][7], $t, $n);
    };
    $blit_key__0 = function($t1, $o1, $t2, $o2, $l) use ($Obj,$caml_call5) {
      return $caml_call5($Obj[26][8], $t1, $o1, $t2, $o2, $l);
    };
    $get_data__1 = function($t) use ($Obj,$caml_call1,$obj_opt) {
      return $obj_opt($caml_call1($Obj[26][9], $t));
    };
    $get_data_copy__1 = function($t) use ($Obj,$caml_call1,$obj_opt) {
      return $obj_opt($caml_call1($Obj[26][10], $t));
    };
    $set_data__1 = function($t, $d) use ($Obj,$caml_call2) {
      return $caml_call2($Obj[26][11], $t, $d);
    };
    $unset_data__1 = function($t) use ($Obj,$caml_call1) {
      return $caml_call1($Obj[26][12], $t);
    };
    $check_data__1 = function($t) use ($Obj,$caml_call1) {
      return $caml_call1($Obj[26][13], $t);
    };
    $blit_data__1 = function($t1, $t2) use ($Obj,$caml_call2) {
      return $caml_call2($Obj[26][14], $t1, $t2);
    };
    $MakeSeeded__2 = function($H) use ($MakeSeeded,$caml_call2,$caml_check_bound,$caml_make_vect,$check_key__0,$create__1,$get_data__1,$get_key__0,$length,$set_data__1,$set_key__0,$unset_data__1) {
      $create = function($k, $d) use ($caml_check_bound,$create__1,$set_data__1,$set_key__0) {
        $c = $create__1($k->length - 1);
        $set_data__1($c, $d);
        $Aj = $k->length - 1 + -1 | 0;
        $Ai = 0;
        if (! ($Aj < 0)) {
          $i = $Ai;
          for (;;) {
            $set_key__0($c, $i, $caml_check_bound($k, $i)[$i + 1]);
            $Ak = $i + 1 | 0;
            if ($Aj !== $i) {$i = $Ak;continue;}
            break;
          }
        }
        return $c;
      };
      $hash = function($seed, $k) use ($H,$caml_call2,$caml_check_bound) {
        $h = V(0, 0);
        $Ae = $k->length - 1 + -1 | 0;
        $Ad = 0;
        if (! ($Ae < 0)) {
          $i = $Ad;
          for (;;) {
            $Af = $h[1];
            $Ag = $caml_check_bound($k, $i)[$i + 1];
            $h[1] = ($caml_call2($H[2], $seed, $Ag) * 65599 | 0) + $Af | 0;
            $Ah = $i + 1 | 0;
            if ($Ae !== $i) {$i = $Ah;continue;}
            break;
          }
        }
        return $h[1];
      };
      $equal = function($c, $k) use ($H,$caml_call2,$caml_check_bound,$get_key__0,$length) {
        $len = $k->length - 1;
        $len__0 = $length($c);
        if ($len !== $len__0) {return 1;}
        $equal_array = function($k, $c, $i) use ($H,$caml_call2,$caml_check_bound,$get_key__0) {
          $i__0 = $i;
          for (;;) {
            if (0 <= $i__0) {
              $match = $get_key__0($c, $i__0);
              if ($match) {
                $ki = $match[1];
                $Ac = $caml_check_bound($k, $i__0)[$i__0 + 1];
                if ($caml_call2($H[1], $Ac, $ki)) {
                  $i__1 = $i__0 + -1 | 0;
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
        return $equal_array($k, $c, $len + -1 | 0);
      };
      $get_key = function($c) use ($caml_check_bound,$caml_make_vect,$get_key__0,$length) {
        $len = $length($c);
        if (0 === $len) {return V(0, V(0));}
        $match = $get_key__0($c, 0);
        if ($match) {
          $k0 = $match[1];
          $fill = function($a, $i) use ($c,$caml_check_bound,$get_key__0) {
            $i__0 = $i;
            for (;;) {
              if (1 <= $i__0) {
                $match = $get_key__0($c, $i__0);
                if ($match) {
                  $ki = $match[1];
                  $caml_check_bound($a, $i__0)[$i__0 + 1] = $ki;
                  $i__1 = $i__0 + -1 | 0;
                  $i__0 = $i__1;
                  continue;
                }
                return 0;
              }
              return V(0, $a);
            }
          };
          $a = $caml_make_vect($len, $k0);
          return $fill($a, $len + -1 | 0);
        }
        return 0;
      };
      $set_key_data = function($c, $k, $d) use ($caml_check_bound,$set_data__1,$set_key__0,$unset_data__1) {
        $unset_data__1($c);
        $Aa = $k->length - 1 + -1 | 0;
        $z_ = 0;
        if (! ($Aa < 0)) {
          $i = $z_;
          for (;;) {
            $set_key__0($c, $i, $caml_check_bound($k, $i)[$i + 1]);
            $Ab = $i + 1 | 0;
            if ($Aa !== $i) {$i = $Ab;continue;}
            break;
          }
        }
        return $set_data__1($c, $d);
      };
      $check_key = function($c) use ($check_key__0,$length) {
        $check = function($c, $i) use ($check_key__0) {
          $i__0 = $i;
          for (;;) {
            $z7 = $i__0 < 0 ? 1 : (0);
            if ($z7) {
              $z8 = $z7;
            }
            else {
              $z9 = $check_key__0($c, $i__0);
              if ($z9) {$i__1 = $i__0 + -1 | 0;$i__0 = $i__1;continue;}
              $z8 = $z9;
            }
            return $z8;
          }
        };
        return $check($c, $length($c) + -1 | 0);
      };
      return $MakeSeeded(
        V(
          0,
          $create,
          $hash,
          $equal,
          $get_data__1,
          $get_key,
          $set_key_data,
          $check_key
        )
      );
    };
    $Make__1 = function($H) use ($MakeSeeded__2,$caml_call1,$caml_call2,$z4) {
      $equal = $H[1];
      $hash = function($seed, $x) use ($H,$caml_call1) {
        return $caml_call1($H[2], $x);
      };
      $include = $MakeSeeded__2(V(0, $equal, $hash));
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
      $z6 = $include[1];
      $create = function($sz) use ($caml_call2,$z4,$z6) {
        return $caml_call2($z6, $z4, $sz);
      };
      return V(
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
      );
    };
    $Ephemeron = V(
      0,
      V(
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
      ),
      V(
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
      ),
      V(
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
      ),
      V(
        0,
        function($z5) use ($MakeSeeded) {
          return $MakeSeeded(
            V(0, $z5[3], $z5[1], $z5[2], $z5[5], $z5[4], $z5[6], $z5[7])
          );
        }
      )
    );
    
    $runtime["caml_register_global"](11, $Ephemeron, "Ephemeron");

  }
}