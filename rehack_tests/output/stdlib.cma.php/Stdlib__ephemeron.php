<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class Stdlib__ephemeron {
  <<__Override, __Memoize>>
  public static function get() : Vector<dynamic> {
    
    $runtime = (\Rehack\GlobalObject::get() as dynamic)->jsoo_runtime;
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
    $Stdlib_obj = Stdlib__obj::get();
    $Stdlib_sys = Stdlib__sys::get();
    $Stdlib = Stdlib::get();
    $Stdlib_seq = Stdlib__seq::get();
    $Stdlib_array = Stdlib__array::get();
    $Stdlib_hashtbl = Stdlib__hashtbl::get();
    $CamlinternalLazy = CamlinternalLazy::get();
    $Stdlib_random = Stdlib__random::get();
    $c_ = Vector{0, 0} as dynamic;
    $b_ = Vector{0, 0} as dynamic;
    $a_ = Vector{0, 0} as dynamic;
    $MakeSeeded = (dynamic $H) : dynamic ==> {
      $power_2_above = (dynamic $x, dynamic $n) : dynamic ==> {
        $x__1 = null as dynamic;
        $x__0 = $x;
        for (;;) {
          if ($n <= $x__0) {return $x__0;}
          if ($Stdlib_sys[14] < (int) ($x__0 * 2)) {return $x__0;}
          $x__1 = (int) ($x__0 * 2) as dynamic;
          $x__0 = $x__1;
          continue;
        }
      };
      $prng = Vector{
        246,
        (dynamic $aJ_) : dynamic ==> {
          return $call1($Stdlib_random[11][2], 0);
        }
      } as dynamic;
      $create = (dynamic $opt, dynamic $initial_size) : dynamic ==> {
        $seed = null as dynamic;
        $aI_ = null as dynamic;
        $aH_ = null as dynamic;
        $random = null as dynamic;
        $sth = null as dynamic;
        if ($opt) {
          $sth = $opt[1];
          $random = $sth;
        }
        else {$random = $call1($Stdlib_hashtbl[17], 0);}
        $s = $power_2_above(16, $initial_size);
        if ($random) {
          $aH_ = $runtime["caml_obj_tag"]($prng);
          $aI_ =
            250 === $aH_
              ? $prng[1]
              : (246 === $aH_ ? $call1($CamlinternalLazy[2], $prng) : ($prng));
          $seed = $call1($Stdlib_random[11][4], $aI_);
        }
        else {$seed = 0 as dynamic;}
        return Vector{0, 0, $caml_make_vect($s, 0), $seed, $s};
      };
      $clear = (dynamic $h) : dynamic ==> {
        $aG_ = null as dynamic;
        $i = null as dynamic;
        $h[1] = 0;
        $len = $h[2]->count() - 1;
        $aF_ = (int) ($len + -1) as dynamic;
        $aE_ = 0 as dynamic;
        if (! ($aF_ < 0)) {
          $i = $aE_;
          for (;;) {
            $caml_check_bound($h[2], $i)[$i + 1] = 0;
            $aG_ = (int) ($i + 1) as dynamic;
            if ($aF_ !== $i) {$i = $aG_;continue;}
            break;
          }
        }
        return 0;
      };
      $reset = (dynamic $h) : dynamic ==> {
        $len = $h[2]->count() - 1;
        if ($len === $h[4]) {return $clear($h);}
        $h[1] = 0;
        $h[2] = $caml_make_vect($h[4], 0);
        return 0;
      };
      $copy = (dynamic $h) : dynamic ==> {
        $aB_ = $h[4];
        $aC_ = $h[3];
        $aD_ = $call1($Stdlib_array[8], $h[2]);
        return Vector{0, $h[1], $aD_, $aC_, $aB_};
      };
      $key_index = (dynamic $h, dynamic $hkey) : dynamic ==> {
        return $hkey & (int) ($h[2]->count() - 1 + -1);
      };
      $clean = (dynamic $h) : dynamic ==> {
        $do_bucket = new Ref();
        $i = null as dynamic;
        $aA_ = null as dynamic;
        $do_bucket->contents = (dynamic $param) : dynamic ==> {
          $rest = null as dynamic;
          $c = null as dynamic;
          $hkey = null as dynamic;
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
        $az_ = (int) ($d->count() - 1 + -1) as dynamic;
        $ay_ = 0 as dynamic;
        if (! ($az_ < 0)) {
          $i = $ay_;
          for (;;) {
            $d[$i + 1] =
              $do_bucket->contents($caml_check_bound($d, $i)[$i + 1]);
            $aA_ = (int) ($i + 1) as dynamic;
            if ($az_ !== $i) {$i = $aA_;continue;}
            break;
          }
        }
        return 0;
      };
      $resize = (dynamic $h) : dynamic ==> {
        $ndata = null as dynamic;
        $insert_bucket = null as dynamic;
        $au_ = null as dynamic;
        $av_ = null as dynamic;
        $aw_ = null as dynamic;
        $i = null as dynamic;
        $ax_ = null as dynamic;
        $odata = $h[2];
        $osize = $odata->count() - 1;
        $nsize = (int) ($osize * 2) as dynamic;
        $clean($h);
        $as_ = $nsize < $Stdlib_sys[14] ? 1 : (0);
        $at_ = $as_
          ? (int) $unsigned_right_shift_32($osize, 1) <= $h[1] ? 1 : (0)
          : ($as_);
        if ($at_) {
          $ndata = $caml_make_vect($nsize, 0);
          $h[2] = $ndata;
          $insert_bucket =
            (dynamic $param) : dynamic ==> {
              $nidx = null as dynamic;
              $hkey = null as dynamic;
              $data = null as dynamic;
              $rest = null as dynamic;
              if ($param) {
                $rest = $param[3];
                $data = $param[2];
                $hkey = $param[1];
                $insert_bucket($rest);
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
          $av_ = (int) ($osize + -1) as dynamic;
          $au_ = 0 as dynamic;
          if (! ($av_ < 0)) {
            $i = $au_;
            for (;;) {
              $insert_bucket($caml_check_bound($odata, $i)[$i + 1]);
              $ax_ = (int) ($i + 1) as dynamic;
              if ($av_ !== $i) {$i = $ax_;continue;}
              break;
            }
          }
          $aw_ = 0 as dynamic;
        }
        else {$aw_ = $at_;}
        return $aw_;
      };
      $add = (dynamic $h, dynamic $key, dynamic $info) : dynamic ==> {
        $hkey = $call2($H[2], $h[3], $key);
        $i = $key_index($h, $hkey);
        $container = $call2($H[1], $key, $info);
        $bucket = Vector{
          0,
          $hkey,
          $container,
          $caml_check_bound($h[2], $i)[$i + 1]
        } as dynamic;
        $caml_check_bound($h[2], $i)[$i + 1] = $bucket;
        $h[1] = (int) ($h[1] + 1);
        $ar_ = $left_shift_32($h[2]->count() - 1, 1) < $h[1] ? 1 : (0);
        return $ar_ ? $resize($h) : ($ar_);
      };
      $remove = (dynamic $h, dynamic $key) : dynamic ==> {
        $remove_bucket = new Ref();
        $hkey = $call2($H[2], $h[3], $key);
        $remove_bucket->contents = (dynamic $param) : dynamic ==> {
          $next = null as dynamic;
          $c = null as dynamic;
          $hk = null as dynamic;
          $match = null as dynamic;
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
        $aq_ = $remove_bucket->contents($caml_check_bound($h[2], $i)[$i + 1]);
        $caml_check_bound($h[2], $i)[$i + 1] = $aq_;
        return 0;
      };
      $find_rec = (dynamic $key, dynamic $hkey, dynamic $param) : dynamic ==> {
        $rest = null as dynamic;
        $c = null as dynamic;
        $hk = null as dynamic;
        $match = null as dynamic;
        $match__0 = null as dynamic;
        $d = null as dynamic;
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
          throw $caml_wrap_thrown_exception($Stdlib[8]) as \Throwable;
        }
      };
      $find = (dynamic $h, dynamic $key) : dynamic ==> {
        $hkey = $call2($H[2], $h[3], $key);
        $ap_ = $key_index($h, $hkey);
        return $find_rec($key, $hkey, $caml_check_bound($h[2], $ap_)[$ap_ + 1]
        );
      };
      $find_rec_opt = (dynamic $key, dynamic $hkey, dynamic $param) : dynamic ==> {
        $rest = null as dynamic;
        $c = null as dynamic;
        $hk = null as dynamic;
        $match = null as dynamic;
        $d = null as dynamic;
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
      $find_opt = (dynamic $h, dynamic $key) : dynamic ==> {
        $hkey = $call2($H[2], $h[3], $key);
        $ao_ = $key_index($h, $hkey);
        return $find_rec_opt(
          $key,
          $hkey,
          $caml_check_bound($h[2], $ao_)[$ao_ + 1]
        );
      };
      $find_all = (dynamic $h, dynamic $key) : dynamic ==> {
        $find_in_bucket = new Ref();
        $hkey = $call2($H[2], $h[3], $key);
        $find_in_bucket->contents = (dynamic $param) : dynamic ==> {
          $rest = null as dynamic;
          $c = null as dynamic;
          $hk = null as dynamic;
          $match = null as dynamic;
          $match__0 = null as dynamic;
          $d = null as dynamic;
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
        $an_ = $key_index($h, $hkey);
        return $find_in_bucket->contents(
          $caml_check_bound($h[2], $an_)[$an_ + 1]
        );
      };
      $replace = (dynamic $h, dynamic $key, dynamic $info) : dynamic ==> {
        $container = null as dynamic;
        $ak_ = null as dynamic;
        $al_ = null as dynamic;
        $hkey = $call2($H[2], $h[3], $key);
        $replace_bucket = (dynamic $param) : dynamic ==> {
          $next = null as dynamic;
          $c = null as dynamic;
          $hk = null as dynamic;
          $match = null as dynamic;
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
            throw $caml_wrap_thrown_exception($Stdlib[8]) as \Throwable;
          }
        };
        $i = $key_index($h, $hkey);
        $l = $caml_check_bound($h[2], $i)[$i + 1];
        try {$al_ = $replace_bucket($l);return $al_;}
        catch(\Throwable $am_) {
          $am_ = $runtime["caml_wrap_exception"]($am_);
          if ($am_ === $Stdlib[8]) {
            $container = $call2($H[1], $key, $info);
            $caml_check_bound($h[2], $i)[$i + 1] = Vector{0, $hkey, $container, $l};
            $h[1] = (int) ($h[1] + 1);
            $ak_ = $left_shift_32($h[2]->count() - 1, 1) < $h[1] ? 1 : (0);
            return $ak_ ? $resize($h) : ($ak_);
          }
          throw $caml_wrap_thrown_exception_reraise($am_) as \Throwable;
        }
      };
      $mem = (dynamic $h, dynamic $key) : dynamic ==> {
        $hkey = $call2($H[2], $h[3], $key);
        $mem_in_bucket = (dynamic $param) : dynamic ==> {
          $rest = null as dynamic;
          $c = null as dynamic;
          $hk = null as dynamic;
          $match = null as dynamic;
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
        $aj_ = $key_index($h, $hkey);
        return $mem_in_bucket($caml_check_bound($h[2], $aj_)[$aj_ + 1]);
      };
      $iter = (dynamic $f, dynamic $h) : dynamic ==> {
        $i = null as dynamic;
        $ai_ = null as dynamic;
        $do_bucket = (dynamic $param) : dynamic ==> {
          $rest = null as dynamic;
          $c = null as dynamic;
          $match = null as dynamic;
          $match__0 = null as dynamic;
          $d = null as dynamic;
          $k = null as dynamic;
          $switch__0 = null as dynamic;
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
                  $switch__0 = 1 as dynamic;
                }
                else {$switch__0 = 0 as dynamic;}
              }
              else {$switch__0 = 0 as dynamic;}
              ;
              $param__0 = $rest;
              continue;
            }
            return 0;
          }
        };
        $d = $h[2];
        $ah_ = (int) ($d->count() - 1 + -1) as dynamic;
        $ag_ = 0 as dynamic;
        if (! ($ah_ < 0)) {
          $i = $ag_;
          for (;;) {
            $do_bucket($caml_check_bound($d, $i)[$i + 1]);
            $ai_ = (int) ($i + 1) as dynamic;
            if ($ah_ !== $i) {$i = $ai_;continue;}
            break;
          }
        }
        return 0;
      };
      $fold = (dynamic $f, dynamic $h, dynamic $init) : dynamic ==> {
        $i = null as dynamic;
        $ae_ = null as dynamic;
        $af_ = null as dynamic;
        $do_bucket = (dynamic $b, dynamic $accu) : dynamic ==> {
          $rest = null as dynamic;
          $c = null as dynamic;
          $match = null as dynamic;
          $match__0 = null as dynamic;
          $d = null as dynamic;
          $k = null as dynamic;
          $accu__1 = null as dynamic;
          $switch__0 = null as dynamic;
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
                  $switch__0 = 1 as dynamic;
                }
                else {$switch__0 = 0 as dynamic;}
              }
              else {$switch__0 = 0 as dynamic;}
              if (! $switch__0) {$accu__1 = $accu__0;}
              $b__0 = $rest;
              $accu__0 = $accu__1;
              continue;
            }
            return $accu__0;
          }
        };
        $d = $h[2];
        $accu = Vector{0, $init} as dynamic;
        $ad_ = (int) ($d->count() - 1 + -1) as dynamic;
        $ac_ = 0 as dynamic;
        if (! ($ad_ < 0)) {
          $i = $ac_;
          for (;;) {
            $ae_ = $accu[1];
            $accu[1] = $do_bucket($caml_check_bound($d, $i)[$i + 1], $ae_);
            $af_ = (int) ($i + 1) as dynamic;
            if ($ad_ !== $i) {$i = $af_;continue;}
            break;
          }
        }
        return $accu[1];
      };
      $filter_map_inplace = (dynamic $f, dynamic $h) : dynamic ==> {
        $do_bucket = new Ref();
        $i = null as dynamic;
        $ab_ = null as dynamic;
        $do_bucket->contents = (dynamic $param) : dynamic ==> {
          $rest = null as dynamic;
          $c = null as dynamic;
          $hk = null as dynamic;
          $match = null as dynamic;
          $match__0 = null as dynamic;
          $d = null as dynamic;
          $k = null as dynamic;
          $match__1 = null as dynamic;
          $new_d = null as dynamic;
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
        $aa_ = (int) ($d->count() - 1 + -1) as dynamic;
        $Z_ = 0 as dynamic;
        if (! ($aa_ < 0)) {
          $i = $Z_;
          for (;;) {
            $d[$i + 1] =
              $do_bucket->contents($caml_check_bound($d, $i)[$i + 1]);
            $ab_ = (int) ($i + 1) as dynamic;
            if ($aa_ !== $i) {$i = $ab_;continue;}
            break;
          }
        }
        return 0;
      };
      $length = (dynamic $h) : dynamic ==> {return $h[1];};
      $bucket_length = (dynamic $accu, dynamic $param) : dynamic ==> {
        $param__1 = null as dynamic;
        $accu__1 = null as dynamic;
        $accu__0 = $accu;
        $param__0 = $param;
        for (;;) {
          if ($param__0) {
            $param__1 = $param__0[3];
            $accu__1 = (int) ($accu__0 + 1) as dynamic;
            $accu__0 = $accu__1;
            $param__0 = $param__1;
            continue;
          }
          return $accu__0;
        }
      };
      $stats = (dynamic $h) : dynamic ==> {
        $T_ = $h[2];
        $U_ = 0 as dynamic;
        $V_ = (dynamic $m, dynamic $b) : dynamic ==> {
          $Y_ = $bucket_length(0, $b);
          return $call2($Stdlib[17], $m, $Y_);
        };
        $mbl = $call3($Stdlib_array[17], $V_, $U_, $T_);
        $histo = $caml_make_vect((int) ($mbl + 1), 0);
        $W_ = $h[2];
        $X_ = (dynamic $b) : dynamic ==> {
          $l = $bucket_length(0, $b);
          $histo[$l + 1] = (int) ($caml_check_bound($histo, $l)[$l + 1] + 1);
          return 0;
        };
        $call2($Stdlib_array[13], $X_, $W_);
        return Vector{0, $h[1], $h[2]->count() - 1, $mbl, $histo};
      };
      $bucket_length_alive = (dynamic $accu, dynamic $param) : dynamic ==> {
        $rest = null as dynamic;
        $c = null as dynamic;
        $accu__1 = null as dynamic;
        $accu__0 = $accu;
        $param__0 = $param;
        for (;;) {
          if ($param__0) {
            $rest = $param__0[3];
            $c = $param__0[2];
            if ($call1($H[7], $c)) {
              $accu__1 = (int) ($accu__0 + 1) as dynamic;
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
      $stats_alive = (dynamic $h) : dynamic ==> {
        $size = Vector{0, 0} as dynamic;
        $N_ = $h[2];
        $O_ = 0 as dynamic;
        $P_ = (dynamic $m, dynamic $b) : dynamic ==> {
          $S_ = $bucket_length_alive(0, $b);
          return $call2($Stdlib[17], $m, $S_);
        };
        $mbl = $call3($Stdlib_array[17], $P_, $O_, $N_);
        $histo = $caml_make_vect((int) ($mbl + 1), 0);
        $Q_ = $h[2];
        $R_ = (dynamic $b) : dynamic ==> {
          $l = $bucket_length_alive(0, $b);
          $size[1] = (int) ($size[1] + $l);
          $histo[$l + 1] = (int) ($caml_check_bound($histo, $l)[$l + 1] + 1);
          return 0;
        };
        $call2($Stdlib_array[13], $R_, $Q_);
        return Vector{0, $size[1], $h[2]->count() - 1, $mbl, $histo};
      };
      $to_seq = (dynamic $tbl) : dynamic ==> {
        $aux = new Ref();
        $tbl_data = $tbl[2];
        $aux->contents = (dynamic $i, dynamic $buck, dynamic $param) : dynamic ==> {
          $next = null as dynamic;
          $c = null as dynamic;
          $match = null as dynamic;
          $match__0 = null as dynamic;
          $data = null as dynamic;
          $key = null as dynamic;
          $buck__1 = null as dynamic;
          $i__1 = null as dynamic;
          $i__0 = $i;
          $buck__0 = $buck;
          for (;;) {
            if ($buck__0) {
              $next = $buck__0[3];
              $c = $buck__0[2];
              $match = $call1($H[5], $c);
              $match__0 = $call1($H[4], $c);
              if ($match) {
                if ($match__0) {
                  $data = $match__0[1];
                  $key = $match[1];
                  return Vector{
                    0,
                    Vector{0, $key, $data},
                    (dynamic $M_) : dynamic ==> {
                      return $aux->contents($i__0, $next, $M_);
                    }
                  };
                }
              }
              $buck__0 = $next;
              continue;
            }
            if ($i__0 === $tbl_data->count() - 1) {return 0;}
            $buck__1 = $caml_check_bound($tbl_data, $i__0)[$i__0 + 1];
            $i__1 = (int) ($i__0 + 1) as dynamic;
            $i__0 = $i__1;
            $buck__0 = $buck__1;
            continue;
          }
        };
        $J_ = 0 as dynamic;
        $K_ = 0 as dynamic;
        return (dynamic $L_) : dynamic ==> {
          return $aux->contents($K_, $J_, $L_);
        };
      };
      $to_seq_keys = (dynamic $m) : dynamic ==> {
        $G_ = $to_seq($m);
        $H_ = (dynamic $I_) : dynamic ==> {return $I_[1];};
        return $call2($Stdlib_seq[3], $H_, $G_);
      };
      $to_seq_values = (dynamic $m) : dynamic ==> {
        $D_ = $to_seq($m);
        $E_ = (dynamic $F_) : dynamic ==> {return $F_[2];};
        return $call2($Stdlib_seq[3], $E_, $D_);
      };
      $add_seq = (dynamic $tbl, dynamic $i) : dynamic ==> {
        $C_ = (dynamic $param) : dynamic ==> {
          $v = $param[2];
          $k = $param[1];
          return $add($tbl, $k, $v);
        };
        return $call2($Stdlib_seq[8], $C_, $i);
      };
      $replace_seq = (dynamic $tbl, dynamic $i) : dynamic ==> {
        $B_ = (dynamic $param) : dynamic ==> {
          $v = $param[2];
          $k = $param[1];
          return $replace($tbl, $k, $v);
        };
        return $call2($Stdlib_seq[8], $B_, $i);
      };
      $of_seq = (dynamic $i) : dynamic ==> {
        $tbl = $create(0, 16);
        $replace_seq($tbl, $i);
        return $tbl;
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
        $to_seq,
        $to_seq_keys,
        $to_seq_values,
        $add_seq,
        $replace_seq,
        $of_seq,
        $clean,
        $stats_alive
      };
    };
    $obj_opt = (dynamic $x) : dynamic ==> {return $x;};
    $create = (dynamic $param) : dynamic ==> {
      return $call1($Stdlib_obj[27][1], 1);
    };
    $get_key = (dynamic $t) : dynamic ==> {
      return $obj_opt($call2($Stdlib_obj[27][3], $t, 0));
    };
    $get_key_copy = (dynamic $t) : dynamic ==> {
      return $obj_opt($call2($Stdlib_obj[27][4], $t, 0));
    };
    $set_key = (dynamic $t, dynamic $k) : dynamic ==> {
      return $call3($Stdlib_obj[27][5], $t, 0, $k);
    };
    $unset_key = (dynamic $t) : dynamic ==> {
      return $call2($Stdlib_obj[27][6], $t, 0);
    };
    $check_key = (dynamic $t) : dynamic ==> {
      return $call2($Stdlib_obj[27][7], $t, 0);
    };
    $blit_key = (dynamic $t1, dynamic $t2) : dynamic ==> {
      return $call5($Stdlib_obj[27][8], $t1, 0, $t2, 0, 1);
    };
    $get_data = (dynamic $t) : dynamic ==> {
      return $obj_opt($call1($Stdlib_obj[27][9], $t));
    };
    $get_data_copy = (dynamic $t) : dynamic ==> {
      return $obj_opt($call1($Stdlib_obj[27][10], $t));
    };
    $set_data = (dynamic $t, dynamic $d) : dynamic ==> {
      return $call2($Stdlib_obj[27][11], $t, $d);
    };
    $unset_data = (dynamic $t) : dynamic ==> {
      return $call1($Stdlib_obj[27][12], $t);
    };
    $check_data = (dynamic $t) : dynamic ==> {
      return $call1($Stdlib_obj[27][13], $t);
    };
    $blit_data = (dynamic $t1, dynamic $t2) : dynamic ==> {
      return $call2($Stdlib_obj[27][14], $t1, $t2);
    };
    $MakeSeeded__0 = (dynamic $H) : dynamic ==> {
      $create__0 = (dynamic $k, dynamic $d) : dynamic ==> {
        $c = $create(0);
        $set_data($c, $d);
        $set_key($c, $k);
        return $c;
      };
      $hash = $H[2];
      $equal = (dynamic $c, dynamic $k) : dynamic ==> {
        $k__0 = null as dynamic;
        $match = $get_key($c);
        if ($match) {
          $k__0 = $match[1];
          return $call2($H[1], $k, $k__0) ? 0 : (1);
        }
        return 2;
      };
      $set_key_data = (dynamic $c, dynamic $k, dynamic $d) : dynamic ==> {
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
    $Make = (dynamic $H) : dynamic ==> {
      $equal = $H[1];
      $hash = (dynamic $seed, dynamic $x) : dynamic ==> {
        return $call1($H[2], $x);
      };
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
      $to_seq = $include[17];
      $to_seq_keys = $include[18];
      $to_seq_values = $include[19];
      $add_seq = $include[20];
      $replace_seq = $include[21];
      $clean = $include[23];
      $stats_alive = $include[24];
      $A_ = $include[1];
      $create = (dynamic $sz) : dynamic ==> {return $call2($A_, $a_, $sz);};
      $of_seq = (dynamic $i) : dynamic ==> {
        $tbl = $create(16);
        $call2($replace_seq, $tbl, $i);
        return $tbl;
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
        $to_seq,
        $to_seq_keys,
        $to_seq_values,
        $add_seq,
        $replace_seq,
        $of_seq,
        $clean,
        $stats_alive
      };
    };
    $create__0 = (dynamic $param) : dynamic ==> {
      return $call1($Stdlib_obj[27][1], 2);
    };
    $get_key1 = (dynamic $t) : dynamic ==> {
      return $obj_opt($call2($Stdlib_obj[27][3], $t, 0));
    };
    $get_key1_copy = (dynamic $t) : dynamic ==> {
      return $obj_opt($call2($Stdlib_obj[27][4], $t, 0));
    };
    $set_key1 = (dynamic $t, dynamic $k) : dynamic ==> {
      return $call3($Stdlib_obj[27][5], $t, 0, $k);
    };
    $unset_key1 = (dynamic $t) : dynamic ==> {
      return $call2($Stdlib_obj[27][6], $t, 0);
    };
    $check_key1 = (dynamic $t) : dynamic ==> {
      return $call2($Stdlib_obj[27][7], $t, 0);
    };
    $get_key2 = (dynamic $t) : dynamic ==> {
      return $obj_opt($call2($Stdlib_obj[27][3], $t, 1));
    };
    $get_key2_copy = (dynamic $t) : dynamic ==> {
      return $obj_opt($call2($Stdlib_obj[27][4], $t, 1));
    };
    $set_key2 = (dynamic $t, dynamic $k) : dynamic ==> {
      return $call3($Stdlib_obj[27][5], $t, 1, $k);
    };
    $unset_key2 = (dynamic $t) : dynamic ==> {
      return $call2($Stdlib_obj[27][6], $t, 1);
    };
    $check_key2 = (dynamic $t) : dynamic ==> {
      return $call2($Stdlib_obj[27][7], $t, 1);
    };
    $blit_key1 = (dynamic $t1, dynamic $t2) : dynamic ==> {
      return $call5($Stdlib_obj[27][8], $t1, 0, $t2, 0, 1);
    };
    $blit_key2 = (dynamic $t1, dynamic $t2) : dynamic ==> {
      return $call5($Stdlib_obj[27][8], $t1, 1, $t2, 1, 1);
    };
    $blit_key12 = (dynamic $t1, dynamic $t2) : dynamic ==> {
      return $call5($Stdlib_obj[27][8], $t1, 0, $t2, 0, 2);
    };
    $get_data__0 = (dynamic $t) : dynamic ==> {
      return $obj_opt($call1($Stdlib_obj[27][9], $t));
    };
    $get_data_copy__0 = (dynamic $t) : dynamic ==> {
      return $obj_opt($call1($Stdlib_obj[27][10], $t));
    };
    $set_data__0 = (dynamic $t, dynamic $d) : dynamic ==> {
      return $call2($Stdlib_obj[27][11], $t, $d);
    };
    $unset_data__0 = (dynamic $t) : dynamic ==> {
      return $call1($Stdlib_obj[27][12], $t);
    };
    $check_data__0 = (dynamic $t) : dynamic ==> {
      return $call1($Stdlib_obj[27][13], $t);
    };
    $blit_data__0 = (dynamic $t1, dynamic $t2) : dynamic ==> {
      return $call2($Stdlib_obj[27][14], $t1, $t2);
    };
    $MakeSeeded__1 = (dynamic $H1, dynamic $H2) : dynamic ==> {
      $create = (dynamic $param, dynamic $d) : dynamic ==> {
        $k2 = $param[2];
        $k1 = $param[1];
        $c = $create__0(0);
        $set_data__0($c, $d);
        $set_key1($c, $k1);
        $set_key2($c, $k2);
        return $c;
      };
      $hash = (dynamic $seed, dynamic $param) : dynamic ==> {
        $k2 = $param[2];
        $k1 = $param[1];
        $z_ = (int) ($call2($H2[2], $seed, $k2) * 65599) as dynamic;
        return (int) ($call2($H1[2], $seed, $k1) + $z_);
      };
      $equal = (dynamic $c, dynamic $param) : dynamic ==> {
        $k2__0 = null as dynamic;
        $k1__0 = null as dynamic;
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
      $get_key = (dynamic $c) : dynamic ==> {
        $k2 = null as dynamic;
        $k1 = null as dynamic;
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
      $set_key_data = (dynamic $c, dynamic $param, dynamic $d) : dynamic ==> {
        $k2 = $param[2];
        $k1 = $param[1];
        $unset_data__0($c);
        $set_key1($c, $k1);
        $set_key2($c, $k2);
        return $set_data__0($c, $d);
      };
      $check_key = (dynamic $c) : dynamic ==> {
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
    $Make__0 = (dynamic $H1, dynamic $H2) : dynamic ==> {
      $equal = $H2[1];
      $hash = (dynamic $seed, dynamic $x) : dynamic ==> {
        return $call1($H2[2], $x);
      };
      $equal__0 = $H1[1];
      $u_ = Vector{0, $equal, $hash} as dynamic;
      $hash__0 = (dynamic $seed, dynamic $x) : dynamic ==> {
        return $call1($H1[2], $x);
      };
      $v_ = Vector{0, $equal__0, $hash__0} as dynamic;
      $include = ((dynamic $x_) : dynamic ==> {
         return $MakeSeeded__1($v_, $x_);
       })($u_);
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
      $to_seq = $include[17];
      $to_seq_keys = $include[18];
      $to_seq_values = $include[19];
      $add_seq = $include[20];
      $replace_seq = $include[21];
      $clean = $include[23];
      $stats_alive = $include[24];
      $w_ = $include[1];
      $create = (dynamic $sz) : dynamic ==> {return $call2($w_, $b_, $sz);};
      $of_seq = (dynamic $i) : dynamic ==> {
        $tbl = $create(16);
        $call2($replace_seq, $tbl, $i);
        return $tbl;
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
        $to_seq,
        $to_seq_keys,
        $to_seq_values,
        $add_seq,
        $replace_seq,
        $of_seq,
        $clean,
        $stats_alive
      };
    };
    $create__1 = (dynamic $n) : dynamic ==> {
      return $call1($Stdlib_obj[27][1], $n);
    };
    $length = (dynamic $k) : dynamic ==> {
      return $call1($Stdlib_obj[27][2], $k);
    };
    $get_key__0 = (dynamic $t, dynamic $n) : dynamic ==> {
      return $obj_opt($call2($Stdlib_obj[27][3], $t, $n));
    };
    $get_key_copy__0 = (dynamic $t, dynamic $n) : dynamic ==> {
      return $obj_opt($call2($Stdlib_obj[27][4], $t, $n));
    };
    $set_key__0 = (dynamic $t, dynamic $n, dynamic $k) : dynamic ==> {
      return $call3($Stdlib_obj[27][5], $t, $n, $k);
    };
    $unset_key__0 = (dynamic $t, dynamic $n) : dynamic ==> {
      return $call2($Stdlib_obj[27][6], $t, $n);
    };
    $check_key__0 = (dynamic $t, dynamic $n) : dynamic ==> {
      return $call2($Stdlib_obj[27][7], $t, $n);
    };
    $blit_key__0 = 
    (dynamic $t1, dynamic $o1, dynamic $t2, dynamic $o2, dynamic $l) : dynamic ==> {
      return $call5($Stdlib_obj[27][8], $t1, $o1, $t2, $o2, $l);
    };
    $get_data__1 = (dynamic $t) : dynamic ==> {
      return $obj_opt($call1($Stdlib_obj[27][9], $t));
    };
    $get_data_copy__1 = (dynamic $t) : dynamic ==> {
      return $obj_opt($call1($Stdlib_obj[27][10], $t));
    };
    $set_data__1 = (dynamic $t, dynamic $d) : dynamic ==> {
      return $call2($Stdlib_obj[27][11], $t, $d);
    };
    $unset_data__1 = (dynamic $t) : dynamic ==> {
      return $call1($Stdlib_obj[27][12], $t);
    };
    $check_data__1 = (dynamic $t) : dynamic ==> {
      return $call1($Stdlib_obj[27][13], $t);
    };
    $blit_data__1 = (dynamic $t1, dynamic $t2) : dynamic ==> {
      return $call2($Stdlib_obj[27][14], $t1, $t2);
    };
    $MakeSeeded__2 = (dynamic $H) : dynamic ==> {
      $create = (dynamic $k, dynamic $d) : dynamic ==> {
        $i = null as dynamic;
        $t_ = null as dynamic;
        $c = $create__1($k->count() - 1);
        $set_data__1($c, $d);
        $s_ = (int) ($k->count() - 1 + -1) as dynamic;
        $r_ = 0 as dynamic;
        if (! ($s_ < 0)) {
          $i = $r_;
          for (;;) {
            $set_key__0($c, $i, $caml_check_bound($k, $i)[$i + 1]);
            $t_ = (int) ($i + 1) as dynamic;
            if ($s_ !== $i) {$i = $t_;continue;}
            break;
          }
        }
        return $c;
      };
      $hash = (dynamic $seed, dynamic $k) : dynamic ==> {
        $i = null as dynamic;
        $o_ = null as dynamic;
        $p_ = null as dynamic;
        $q_ = null as dynamic;
        $h = Vector{0, 0} as dynamic;
        $n_ = (int) ($k->count() - 1 + -1) as dynamic;
        $m_ = 0 as dynamic;
        if (! ($n_ < 0)) {
          $i = $m_;
          for (;;) {
            $o_ = $h[1];
            $p_ = $caml_check_bound($k, $i)[$i + 1];
            $h[1] = (int) ((int) ($call2($H[2], $seed, $p_) * 65599) + $o_);
            $q_ = (int) ($i + 1) as dynamic;
            if ($n_ !== $i) {$i = $q_;continue;}
            break;
          }
        }
        return $h[1];
      };
      $equal = (dynamic $c, dynamic $k) : dynamic ==> {
        $len = $k->count() - 1;
        $len__0 = $length($c);
        if ($len !== $len__0) {return 1;}
        $equal_array = (dynamic $k, dynamic $c, dynamic $i) : dynamic ==> {
          $match = null as dynamic;
          $ki = null as dynamic;
          $l_ = null as dynamic;
          $i__1 = null as dynamic;
          $i__0 = $i;
          for (;;) {
            if (0 <= $i__0) {
              $match = $get_key__0($c, $i__0);
              if ($match) {
                $ki = $match[1];
                $l_ = $caml_check_bound($k, $i__0)[$i__0 + 1];
                if ($call2($H[1], $l_, $ki)) {
                  $i__1 = (int) ($i__0 + -1) as dynamic;
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
      $get_key = (dynamic $c) : dynamic ==> {
        $k0 = null as dynamic;
        $fill = null as dynamic;
        $a = null as dynamic;
        $len = $length($c);
        if (0 === $len) {return Vector{0, Vector{0}};}
        $match = $get_key__0($c, 0);
        if ($match) {
          $k0 = $match[1];
          $fill =
            (dynamic $a, dynamic $i) : dynamic ==> {
              $match = null as dynamic;
              $ki = null as dynamic;
              $i__1 = null as dynamic;
              $i__0 = $i;
              for (;;) {
                if (1 <= $i__0) {
                  $match = $get_key__0($c, $i__0);
                  if ($match) {
                    $ki = $match[1];
                    $caml_check_bound($a, $i__0)[$i__0 + 1] = $ki;
                    $i__1 = (int) ($i__0 + -1) as dynamic;
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
      $set_key_data = (dynamic $c, dynamic $k, dynamic $d) : dynamic ==> {
        $k_ = null as dynamic;
        $i = null as dynamic;
        $unset_data__1($c);
        $j_ = (int) ($k->count() - 1 + -1) as dynamic;
        $i_ = 0 as dynamic;
        if (! ($j_ < 0)) {
          $i = $i_;
          for (;;) {
            $set_key__0($c, $i, $caml_check_bound($k, $i)[$i + 1]);
            $k_ = (int) ($i + 1) as dynamic;
            if ($j_ !== $i) {$i = $k_;continue;}
            break;
          }
        }
        return $set_data__1($c, $d);
      };
      $check_key = (dynamic $c) : dynamic ==> {
        $check = (dynamic $c, dynamic $i) : dynamic ==> {
          $f_ = null as dynamic;
          $g_ = null as dynamic;
          $h_ = null as dynamic;
          $i__1 = null as dynamic;
          $i__0 = $i;
          for (;;) {
            $f_ = $i__0 < 0 ? 1 : (0);
            if ($f_) {
              $g_ = $f_;
            }
            else {
              $h_ = $check_key__0($c, $i__0);
              if ($h_) {
                $i__1 = (int) ($i__0 + -1) as dynamic;
                $i__0 = $i__1;
                continue;
              }
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
    $Make__1 = (dynamic $H) : dynamic ==> {
      $equal = $H[1];
      $hash = (dynamic $seed, dynamic $x) : dynamic ==> {
        return $call1($H[2], $x);
      };
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
      $to_seq = $include[17];
      $to_seq_keys = $include[18];
      $to_seq_values = $include[19];
      $add_seq = $include[20];
      $replace_seq = $include[21];
      $clean = $include[23];
      $stats_alive = $include[24];
      $e_ = $include[1];
      $create = (dynamic $sz) : dynamic ==> {return $call2($e_, $c_, $sz);};
      $of_seq = (dynamic $i) : dynamic ==> {
        $tbl = $create(16);
        $call2($replace_seq, $tbl, $i);
        return $tbl;
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
        $to_seq,
        $to_seq_keys,
        $to_seq_values,
        $add_seq,
        $replace_seq,
        $of_seq,
        $clean,
        $stats_alive
      };
    };
    $Stdlib_ephemeron = Vector{
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
        (dynamic $d_) : dynamic ==> {
          return $MakeSeeded(
            Vector{0, $d_[3], $d_[1], $d_[2], $d_[5], $d_[4], $d_[6], $d_[7]}
          );
        }
      }
    } as dynamic;
    
    return($Stdlib_ephemeron);

  }

}
/* Hashing disabled */
