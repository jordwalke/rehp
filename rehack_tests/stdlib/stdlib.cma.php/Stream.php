<?hh
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * Stream.php
 */

namespace Rehack;

final class Stream {
  <<__Memoize>>
  public static function get() {
    $global_object = \Rehack\GlobalObject::get();
    $runtime = \Rehack\Runtime::get();
    /*
     * Soon, these will replace the `global_data->ModuleName`
     * pattern in the load() function.
     */
    $Bytes = Bytes::get();
    $CamlinternalLazy = CamlinternalLazy::get();
    $List_ = List_::get();
    $Pervasives = Pervasives::get();
    $Assert_failure = Assert_failure::get();
    Stream::load($global_object);
    $memoized = $runtime->caml_get_global_data()->Stream;
    return $memoized;
  }

  /**
   * Performs module load operation. May have side effects.
   */
  private static function load($joo_global_object) {
    

    $dump_data = new Ref();$get_data = new Ref();$nget_data = new Ref();
    $runtime = $joo_global_object->jsoo_runtime;
    $is_int = $runtime["is_int"];
    $caml_arity_test = $runtime["caml_arity_test"];
    $caml_bytes_unsafe_get = $runtime["caml_bytes_unsafe_get"];
    $caml_fresh_oo_id = $runtime["caml_fresh_oo_id"];
    $caml_ml_bytes_length = $runtime["caml_ml_bytes_length"];
    $caml_new_string = $runtime["caml_new_string"];
    $caml_obj_tag = $runtime["caml_obj_tag"];
    $caml_call1 = function($f, $a0) use ($caml_arity_test,$runtime) {
      return $caml_arity_test($f) == 1
        ? $f($a0)
        : ($runtime["caml_call_gen"]($f, varray[$a0]));
    };
    $caml_call3 = function($f, $a0, $a1, $a2) use ($caml_arity_test,$runtime) {
      return $caml_arity_test($f) == 3
        ? $f($a0, $a1, $a2)
        : ($runtime["caml_call_gen"]($f, varray[$a0,$a1,$a2]));
    };
    $caml_call4 = function($f, $a0, $a1, $a2, $a3) use ($caml_arity_test,$runtime) {
      return $caml_arity_test($f) == 4
        ? $f($a0, $a1, $a2, $a3)
        : ($runtime["caml_call_gen"]($f, varray[$a0,$a1,$a2,$a3]));
    };
    $global_data = $runtime["caml_get_global_data"]();
    $cst_count = $caml_new_string("{count = ");
    $cst_data = $caml_new_string("; data = ");
    $cst = $caml_new_string("}");
    $cst_Sempty = $caml_new_string("Sempty");
    $cst_Scons = $caml_new_string("Scons (");
    $cst__0 = $caml_new_string(", ");
    $cst__1 = $caml_new_string(")");
    $cst_Sapp = $caml_new_string("Sapp (");
    $cst__2 = $caml_new_string(", ");
    $cst__3 = $caml_new_string(")");
    $cst_Slazy = $caml_new_string("Slazy");
    $cst_Sgen = $caml_new_string("Sgen");
    $cst_Sbuffio = $caml_new_string("Sbuffio");
    $cst_Stream_Failure = $caml_new_string("Stream.Failure");
    $cst_Stream_Error = $caml_new_string("Stream.Error");
    $Assert_failure = $global_data["Assert_failure"];
    $CamlinternalLazy = $global_data["CamlinternalLazy"];
    $Pervasives = $global_data["Pervasives"];
    $List = $global_data["List_"];
    $g1 = Vector{0, $caml_new_string("stream.ml"), 53, 12};
    $g2 = Vector{0, 0};
    $g3 = Vector{0, $caml_new_string("stream.ml"), 82, 12};
    $Failure = Vector{248, $cst_Stream_Failure, $caml_fresh_oo_id(0)};
    $Error = Vector{248, $cst_Stream_Error, $caml_fresh_oo_id(0)};
    $count = function($param) {
      if ($param) {$match = $param[1];$count = $match[1];return $count;}
      return 0;
    };
    $data = function($param) {
      if ($param) {$match = $param[1];$data = $match[2];return $data;}
      return 0;
    };
    $fill_buff = function($b) use ($Pervasives,$caml_call4,$caml_ml_bytes_length) {
      $b[3] =
        $caml_call4(
          $Pervasives[72],
          $b[1],
          $b[2],
          0,
          $caml_ml_bytes_length($b[2])
        );
      $b[4] = 0;
      return 0;
    };
    $_ = $get_data->contents =
      function($count, $d) use ($Assert_failure,$CamlinternalLazy,$caml_bytes_unsafe_get,$caml_call1,$caml_obj_tag,$fill_buff,$g1,$g2,$get_data,$is_int,$runtime) {
        $d__0 = $d;
        for (;;) {
          if (! $is_int($d__0)) {
            switch($d__0[0]) {
              // FALLTHROUGH
              case 1:
                $d2 = $d__0[2];
                $d1 = $d__0[1];
                $match = $get_data->contents($count, $d1);
                if ($is_int($match)) {
                  $d__0 = $d2;
                  continue;
                }
                else {
                  if (0 === $match[0]) {
                    $d11 = $match[2];
                    $a = $match[1];
                    return Vector{0, $a, Vector{1, $d11, $d2}};
                  }
                  throw $runtime["caml_wrap_thrown_exception"](Vector{0, $Assert_failure, $g1});
                }
              // FALLTHROUGH
              case 2:
                $f = $d__0[1];
                $hg = $caml_obj_tag($f);
                $d__1 = 250 === $hg
                  ? $f[1]
                  : (246 === $hg
                   ? $caml_call1($CamlinternalLazy[2], $f)
                   : ($f));
                $d__0 = $d__1;
                continue;
              // FALLTHROUGH
              case 3:
                $hh = $d__0[1];
                $hi = $hh[1];
                if ($hi) {
                  $hj = $hi[1];
                  if ($hj) {
                    $a__0 = $hj[1];
                    $hh[1] = 0;
                    return Vector{0, $a__0, $d__0};
                  }
                  return 0;
                }
                $match__0 = $caml_call1($hh[2], $count);
                if ($match__0) {
                  $a__1 = $match__0[1];
                  return Vector{0, $a__1, $d__0};
                }
                $hh[1] = $g2;
                return 0;
              // FALLTHROUGH
              case 4:
                $b = $d__0[1];
                if ($b[3] <= $b[4]) {$fill_buff($b);}
                if (0 === $b[3]) {return 0;}
                $r = $caml_bytes_unsafe_get($b[2], $b[4]);
                $b[4] = $b[4] + 1 | 0;
                return Vector{0, $r, $d__0};
              }
          }
          return $d__0;
        }
      };
    $peek_data = function($s) use ($Assert_failure,$CamlinternalLazy,$caml_bytes_unsafe_get,$caml_call1,$caml_obj_tag,$fill_buff,$g3,$get_data,$is_int,$runtime) {
      for (;;) {
        $hb = $s[2];
        if ($is_int($hb)) {return 0;}
        else {
          switch($hb[0]) {
            // FALLTHROUGH
            case 0:
              $a = $hb[1];
              return Vector{0, $a};
            // FALLTHROUGH
            case 1:
              $d = $get_data->contents($s[1], $s[2]);
              if ($is_int($d)) {return 0;}
              else {
                if (0 === $d[0]) {
                  $a__0 = $d[1];
                  $s[2] = $d;
                  return Vector{0, $a__0};
                }
                throw $runtime["caml_wrap_thrown_exception"](Vector{0, $Assert_failure, $g3});
              }
            // FALLTHROUGH
            case 2:
              $f = $hb[1];
              $hc = $caml_obj_tag($f);
              $hd = 250 === $hc
                ? $f[1]
                : (246 === $hc ? $caml_call1($CamlinternalLazy[2], $f) : ($f));
              $s[2] = $hd;
              continue;
            // FALLTHROUGH
            case 3:
              $he = $hb[1];
              $hf = $he[1];
              if ($hf) {$a__1 = $hf[1];return $a__1;}
              $x = $caml_call1($he[2], $s[1]);
              $he[1] = Vector{0, $x};
              return $x;
            // FALLTHROUGH
            default:
              $b = $hb[1];
              if ($b[3] <= $b[4]) {$fill_buff($b);}
              return 0 === $b[3]
                ? ($s[2] = 0) || true ? 0 : (0)
                : (Vector{0, $caml_bytes_unsafe_get($b[2], $b[4])});
            }
        }
      }
    };
    $peek = function($param) use ($peek_data) {
      if ($param) {$s = $param[1];return $peek_data($s);}
      return 0;
    };
    $junk_data = function($s) use ($is_int,$peek_data) {
      for (;;) {
        $g_ = $s[2];
        if (! $is_int($g_)) {
          switch($g_[0]) {
            // FALLTHROUGH
            case 0:
              $d = $g_[2];
              $s[1] = $s[1] + 1 | 0;
              $s[2] = $d;
              return 0;
            // FALLTHROUGH
            case 3:
              $ha = $g_[1];
              if ($ha[1]) {$s[1] = $s[1] + 1 | 0;$ha[1] = 0;return 0;}
              break;
            // FALLTHROUGH
            case 4:
              $b = $g_[1];
              $s[1] = $s[1] + 1 | 0;
              $b[4] = $b[4] + 1 | 0;
              return 0;
            }
        }
        $match = $peek_data($s);
        if ($match) {continue;}
        return 0;
      }
    };
    $junk = function($param) use ($junk_data) {
      if ($param) {$data = $param[1];return $junk_data($data);}
      return 0;
    };
    $_ = $nget_data->contents =
      function($n, $s) use ($junk_data,$nget_data,$peek_data) {
        if (0 < $n) {
          $match = $peek_data($s);
          if ($match) {
            $a = $match[1];
            $junk_data($s);
            $match__0 = $nget_data->contents($n + -1 | 0, $s);
            $k = $match__0[3];
            $d = $match__0[2];
            $al = $match__0[1];
            return Vector{0, Vector{0, $a, $al}, Vector{0, $a, $d}, $k + 1 | 0
            };
          }
          return Vector{0, 0, $s[2], 0};
        }
        return Vector{0, 0, $s[2], 0};
      };
    $npeek_data = function($n, $s) use ($nget_data) {
      $match = $nget_data->contents($n, $s);
      $len = $match[3];
      $d = $match[2];
      $al = $match[1];
      $s[1] = $s[1] - $len | 0;
      $s[2] = $d;
      return $al;
    };
    $npeek = function($n, $param) use ($npeek_data) {
      if ($param) {$d = $param[1];return $npeek_data($n, $d);}
      return 0;
    };
    $next = function($s) use ($Failure,$junk,$peek,$runtime) {
      $match = $peek($s);
      if ($match) {$a = $match[1];$junk($s);return $a;}
      throw $runtime["caml_wrap_thrown_exception"]($Failure);
    };
    $empty = function($s) use ($Failure,$peek,$runtime) {
      $match = $peek($s);
      if ($match) {throw $runtime["caml_wrap_thrown_exception"]($Failure);}
      return 0;
    };
    $iter = function($f, $strm) use ($caml_call1,$junk,$peek) {
      $do_rec = function($param) use ($caml_call1,$f,$junk,$peek,$strm) {
        for (;;) {
          $match = $peek($strm);
          if ($match) {
            $a = $match[1];
            $junk($strm);
            $caml_call1($f, $a);
            continue;
          }
          return 0;
        }
      };
      return $do_rec(0);
    };
    $from = function($f) {
      return Vector{0, Vector{0, 0, Vector{3, Vector{0, 0, $f}}}};
    };
    $of_list = function($l) use ($List,$caml_call3) {
      $g8 = 0;
      $g9 = function($x, $l) {return Vector{0, $x, $l};};
      return Vector{0, Vector{0, 0, $caml_call3($List[21], $g9, $l, $g8)}};
    };
    $of_string = function($s) use ($from,$runtime) {
      $count = Vector{0, 0};
      return $from(
        function($param) use ($count,$runtime,$s) {
          $c = $count[1];
          return $c < $runtime["caml_ml_string_length"]($s)
            ? ($count[1] += 1) || true
             ? Vector{0, $runtime["caml_string_get"]($s, $c)}
             : (Vector{0, $runtime["caml_string_get"]($s, $c)})
            : (0);
        }
      );
    };
    $of_bytes = function($s) use ($caml_ml_bytes_length,$from,$runtime) {
      $count = Vector{0, 0};
      return $from(
        function($param) use ($caml_ml_bytes_length,$count,$runtime,$s) {
          $c = $count[1];
          return $c < $caml_ml_bytes_length($s)
            ? ($count[1] += 1) || true
             ? Vector{0, $runtime["caml_bytes_get"]($s, $c)}
             : (Vector{0, $runtime["caml_bytes_get"]($s, $c)})
            : (0);
        }
      );
    };
    $of_channel = function($ic) use ($runtime) {
      return Vector{
        0,
        Vector{
          0,
          0,
          Vector{4, Vector{0, $ic, $runtime["caml_create_bytes"](4096), 0, 0}}
        }
      };
    };
    $iapp = function($i, $s) use ($data) {
      $g7 = $data($s);
      return Vector{0, Vector{0, 0, Vector{1, $data($i), $g7}}};
    };
    $icons = function($i, $s) use ($data) {
      return Vector{0, Vector{0, 0, Vector{0, $i, $data($s)}}};
    };
    $ising = function($i) {return Vector{0, Vector{0, 0, Vector{0, $i, 0}}};};
    $lapp = function($f, $s) use ($caml_call1,$data) {
      return Vector{
        0,
        Vector{
          0,
          0,
          Vector{
            2,
            Vector{
              246,
              function($param) use ($caml_call1,$data,$f,$s) {
                $g6 = $data($s);
                return Vector{1, $data($caml_call1($f, 0)), $g6};
              }
            }
          }
        }
      };
    };
    $lcons = function($f, $s) use ($caml_call1,$data) {
      return Vector{
        0,
        Vector{
          0,
          0,
          Vector{
            2,
            Vector{
              246,
              function($param) use ($caml_call1,$data,$f,$s) {
                $g5 = $data($s);
                return Vector{0, $caml_call1($f, 0), $g5};
              }
            }
          }
        }
      };
    };
    $lsing = function($f) use ($caml_call1) {
      return Vector{
        0,
        Vector{
          0,
          0,
          Vector{
            2,
            Vector{
              246,
              function($param) use ($caml_call1,$f) {
                return Vector{0, $caml_call1($f, 0), 0};
              }
            }
          }
        }
      };
    };
    $sempty = 0;
    $slazy = function($f) use ($caml_call1,$data) {
      return Vector{
        0,
        Vector{
          0,
          0,
          Vector{
            2,
            Vector{
              246,
              function($param) use ($caml_call1,$data,$f) {
                return $data($caml_call1($f, 0));
              }
            }
          }
        }
      };
    };
    $dump = function($f, $s) use ($Pervasives,$caml_call1,$count,$cst,$cst_count,$cst_data,$data,$dump_data) {
      $caml_call1($Pervasives[30], $cst_count);
      $g4 = $count($s);
      $caml_call1($Pervasives[32], $g4);
      $caml_call1($Pervasives[30], $cst_data);
      $dump_data->contents($f, $data($s));
      $caml_call1($Pervasives[30], $cst);
      return $caml_call1($Pervasives[35], 0);
    };
    $_ = $dump_data->contents =
      function($f, $param) use ($Pervasives,$caml_call1,$cst_Sapp,$cst_Sbuffio,$cst_Scons,$cst_Sempty,$cst_Sgen,$cst_Slazy,$cst__0,$cst__1,$cst__2,$cst__3,$dump_data,$is_int) {
        if ($is_int($param)) {
          return $caml_call1($Pervasives[30], $cst_Sempty);
        }
        else {
          switch($param[0]) {
            // FALLTHROUGH
            case 0:
              $d = $param[2];
              $a = $param[1];
              $caml_call1($Pervasives[30], $cst_Scons);
              $caml_call1($f, $a);
              $caml_call1($Pervasives[30], $cst__0);
              $dump_data->contents($f, $d);
              return $caml_call1($Pervasives[30], $cst__1);
            // FALLTHROUGH
            case 1:
              $d2 = $param[2];
              $d1 = $param[1];
              $caml_call1($Pervasives[30], $cst_Sapp);
              $dump_data->contents($f, $d1);
              $caml_call1($Pervasives[30], $cst__2);
              $dump_data->contents($f, $d2);
              return $caml_call1($Pervasives[30], $cst__3);
            // FALLTHROUGH
            case 2:
              return $caml_call1($Pervasives[30], $cst_Slazy);
            // FALLTHROUGH
            case 3:
              return $caml_call1($Pervasives[30], $cst_Sgen);
            // FALLTHROUGH
            default:
              return $caml_call1($Pervasives[30], $cst_Sbuffio);
            }
        }
      };
    $Stream = Vector{
      0,
      $Failure,
      $Error,
      $from,
      $of_list,
      $of_string,
      $of_bytes,
      $of_channel,
      $iter,
      $next,
      $empty,
      $peek,
      $junk,
      $count,
      $npeek,
      $iapp,
      $icons,
      $ising,
      $lapp,
      $lcons,
      $lsing,
      $sempty,
      $slazy,
      $dump
    };
    
    $runtime["caml_register_global"](22, $Stream, "Stream");

  }
}