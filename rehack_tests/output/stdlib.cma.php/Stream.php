<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class Stream {
  <<__Override, __Memoize>>
  public static function requireModule() : Vector<dynamic> {
    
    $dump_data = new Ref();$get_data = new Ref();$nget_data = new Ref();
    $runtime =  (\Rehack\GlobalObject::get() as dynamic)->jsoo_runtime ;
    $caml_bytes_unsafe_get = $runtime["caml_bytes_unsafe_get"];
    $call1 = $runtime["caml_call1"];
    $call3 = $runtime["caml_call3"];
    $call4 = $runtime["caml_call4"];
    $caml_fresh_oo_id = $runtime["caml_fresh_oo_id"];
    $caml_ml_bytes_length = $runtime["caml_ml_bytes_length"];
    $string = $runtime["caml_new_string"];
    $caml_obj_tag = $runtime["caml_obj_tag"];
    $caml_wrap_thrown_exception = $runtime["caml_wrap_thrown_exception"];
    $is_int = $runtime["is_int"];
    $cst_count = $string("{count = ");
    $cst_data = $string("; data = ");
    $cst = $string("}");
    $cst_Sempty = $string("Sempty");
    $cst_Scons = $string("Scons (");
    $cst__0 = $string(", ");
    $cst__1 = $string(")");
    $cst_Sapp = $string("Sapp (");
    $cst__2 = $string(", ");
    $cst__3 = $string(")");
    $cst_Slazy = $string("Slazy");
    $cst_Sgen = $string("Sgen");
    $cst_Sbuffio = $string("Sbuffio");
    $cst_Stream_Failure = $string("Stream.Failure");
    $cst_Stream_Error = $string("Stream.Error");
    $Assert_failure =  Assert_failure::requireModule ();
    $CamlinternalLazy =  CamlinternalLazy::requireModule ();
    $Pervasives =  Pervasives::requireModule ();
    $List =  List_::requireModule ();
    $a_ = Vector{0, $string("stream.ml"), 53, 12} as dynamic;
    $b_ = Vector{0, 0} as dynamic;
    $c_ = Vector{0, $string("stream.ml"), 82, 12} as dynamic;
    $Failure = Vector{248, $cst_Stream_Failure, $caml_fresh_oo_id(0)} as dynamic;
    $Error = Vector{248, $cst_Stream_Error, $caml_fresh_oo_id(0)} as dynamic;
    $count = (dynamic $param) ==> {
      if ($param) {$match = $param[1];$count = $match[1];return $count;}
      return 0;
    };
    $data = (dynamic $param) ==> {
      if ($param) {$match = $param[1];$data = $match[2];return $data;}
      return 0;
    };
    $fill_buff = (dynamic $b) ==> {
      $b[3] =
        $call4($Pervasives[72], $b[1], $b[2], 0, $caml_ml_bytes_length($b[2]));
      $b[4] = 0;
      return 0;
    };
    $get_data->contents = (dynamic $count, dynamic $d) ==> {
      $d__0 = $d;
      for (;;) {
        if (! $is_int($d__0)) {
          $continue_label = null;
          switch($d__0[0]) {
            // FALLTHROUGH
            case 1:
              $d2 = $d__0[2];
              $d1 = $d__0[1];
              $match = $get_data->contents($count, $d1);
              if ($is_int($match)) {
                $d__0 = $d2;
                $continue_label = "#";break;
              }
              else {
                if (0 === $match[0]) {
                  $d11 = $match[2];
                  $a = $match[1];
                  return Vector{0, $a, Vector{1, $d11, $d2}};
                }
                throw $caml_wrap_thrown_exception(
                        Vector{0, $Assert_failure, $a_}
                      ) as \Throwable;
              }
            // FALLTHROUGH
            case 2:
              $f = $d__0[1];
              $q_ = $caml_obj_tag($f);
              $d__1 = 250 === $q_
                ? $f[1]
                : (246 === $q_ ? $call1($CamlinternalLazy[2], $f) : ($f));
              $d__0 = $d__1;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 3:
              $r_ = $d__0[1];
              $s_ = $r_[1];
              if ($s_) {
                $t_ = $s_[1];
                if ($t_) {
                  $a__0 = $t_[1];
                  $r_[1] = 0;
                  return Vector{0, $a__0, $d__0};
                }
                return 0;
              }
              $match__0 = $call1($r_[2], $count);
              if ($match__0) {
                $a__1 = $match__0[1];
                return Vector{0, $a__1, $d__0};
              }
              $r_[1] = $b_;
              return 0;
            // FALLTHROUGH
            case 4:
              $b = $d__0[1];
              if ($b[3] <= $b[4]) {$fill_buff($b);}
              if (0 === $b[3]) {return 0;}
              $r = $caml_bytes_unsafe_get($b[2], $b[4]);
              $b[4] = (int) ($b[4] + 1);
              return Vector{0, $r, $d__0};
            }
          if ($continue_label === "#") {continue;}
        }
        return $d__0;
      }
    };
    $peek_data = (dynamic $s) ==> {
      for (;;) {
        $l_ = $s[2];
        if ($is_int($l_)) {return 0;}
        else {
          $continue_label = null;
          switch($l_[0]) {
            // FALLTHROUGH
            case 0:
              $a = $l_[1];
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
                throw $caml_wrap_thrown_exception(
                        Vector{0, $Assert_failure, $c_}
                      ) as \Throwable;
              }
            // FALLTHROUGH
            case 2:
              $f = $l_[1];
              $m_ = $caml_obj_tag($f);
              $n_ = 250 === $m_
                ? $f[1]
                : (246 === $m_ ? $call1($CamlinternalLazy[2], $f) : ($f));
              $s[2] = $n_;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 3:
              $o_ = $l_[1];
              $p_ = $o_[1];
              if ($p_) {$a__1 = $p_[1];return $a__1;}
              $x = $call1($o_[2], $s[1]);
              $o_[1] = Vector{0, $x};
              return $x;
            // FALLTHROUGH
            default:
              $b = $l_[1];
              if ($b[3] <= $b[4]) {$fill_buff($b);}
              if (0 === $b[3]) {$s[2] = 0;return 0;}
              return Vector{0, $caml_bytes_unsafe_get($b[2], $b[4])};
            }
          if ($continue_label === "#") {continue;}
        }
      }
    };
    $peek = (dynamic $param) ==> {
      if ($param) {$s = $param[1];return $peek_data($s);}
      return 0;
    };
    $junk_data = (dynamic $s) ==> {
      for (;;) {
        $j_ = $s[2];
        if (! $is_int($j_)) {
          switch($j_[0]) {
            // FALLTHROUGH
            case 0:
              $d = $j_[2];
              $s[1] = (int) ($s[1] + 1);
              $s[2] = $d;
              return 0;
            // FALLTHROUGH
            case 3:
              $k_ = $j_[1];
              if ($k_[1]) {$s[1] = (int) ($s[1] + 1);$k_[1] = 0;return 0;}
              break;
            // FALLTHROUGH
            case 4:
              $b = $j_[1];
              $s[1] = (int) ($s[1] + 1);
              $b[4] = (int) ($b[4] + 1);
              return 0;
            }
        }
        $match = $peek_data($s);
        if ($match) {continue;}
        return 0;
      }
    };
    $junk = (dynamic $param) ==> {
      if ($param) {$data = $param[1];return $junk_data($data);}
      return 0;
    };
    $nget_data->contents = (dynamic $n, dynamic $s) ==> {
      if (0 < $n) {
        $match = $peek_data($s);
        if ($match) {
          $a = $match[1];
          $junk_data($s);
          $match__0 = $nget_data->contents((int) ($n + -1), $s);
          $k = $match__0[3];
          $d = $match__0[2];
          $al = $match__0[1];
          return Vector{
            0,
            Vector{0, $a, $al},
            Vector{0, $a, $d},
            (int)
            ($k + 1)
          };
        }
        return Vector{0, 0, $s[2], 0};
      }
      return Vector{0, 0, $s[2], 0};
    };
    $npeek_data = (dynamic $n, dynamic $s) ==> {
      $match = $nget_data->contents($n, $s);
      $len = $match[3];
      $d = $match[2];
      $al = $match[1];
      $s[1] = (int) ($s[1] - $len);
      $s[2] = $d;
      return $al;
    };
    $npeek = (dynamic $n, dynamic $param) ==> {
      if ($param) {$d = $param[1];return $npeek_data($n, $d);}
      return 0;
    };
    $next = (dynamic $s) ==> {
      $match = $peek($s);
      if ($match) {$a = $match[1];$junk($s);return $a;}
      throw $caml_wrap_thrown_exception($Failure) as \Throwable;
    };
    $empty = (dynamic $s) ==> {
      $match = $peek($s);
      if ($match) {throw $caml_wrap_thrown_exception($Failure) as \Throwable;}
      return 0;
    };
    $iter = (dynamic $f, dynamic $strm) ==> {
      $do_rec = (dynamic $param) ==> {
        for (;;) {
          $match = $peek($strm);
          if ($match) {$a = $match[1];$junk($strm);$call1($f, $a);continue;}
          return 0;
        }
      };
      return $do_rec(0);
    };
    $from = (dynamic $f) ==> {
      return Vector{0, Vector{0, 0, Vector{3, Vector{0, 0, $f}}}};
    };
    $of_list = (dynamic $l) ==> {
      $h_ = 0 as dynamic;
      $i_ = (dynamic $x, dynamic $l) ==> {return Vector{0, $x, $l};};
      return Vector{0, Vector{0, 0, $call3($List[21], $i_, $l, $h_)}};
    };
    $of_string = (dynamic $s) ==> {
      $count = Vector{0, 0} as dynamic;
      return $from(
        (dynamic $param) ==> {
          $c = $count[1];
          if ($c < $runtime["caml_ml_string_length"]($s)) {
            $count[1] += 1;
            return Vector{0, $runtime["caml_string_get"]($s, $c)};
          }
          return 0;
        }
      );
    };
    $of_bytes = (dynamic $s) ==> {
      $count = Vector{0, 0} as dynamic;
      return $from(
        (dynamic $param) ==> {
          $c = $count[1];
          if ($c < $caml_ml_bytes_length($s)) {
            $count[1] += 1;
            return Vector{0, $runtime["caml_bytes_get"]($s, $c)};
          }
          return 0;
        }
      );
    };
    $of_channel = (dynamic $ic) ==> {
      return Vector{
        0,
        Vector{
          0,
          0,
          Vector{4, Vector{0, $ic, $runtime["caml_create_bytes"](4096), 0, 0}}
        }
      };
    };
    $iapp = (dynamic $i, dynamic $s) ==> {
      $g_ = $data($s);
      return Vector{0, Vector{0, 0, Vector{1, $data($i), $g_}}};
    };
    $icons = (dynamic $i, dynamic $s) ==> {
      return Vector{0, Vector{0, 0, Vector{0, $i, $data($s)}}};
    };
    $ising = (dynamic $i) ==> {
      return Vector{0, Vector{0, 0, Vector{0, $i, 0}}};
    };
    $lapp = (dynamic $f, dynamic $s) ==> {
      return Vector{
        0,
        Vector{
          0,
          0,
          Vector{
            2,
            Vector{
              246,
              (dynamic $param) ==> {
                $f_ = $data($s);
                return Vector{1, $data($call1($f, 0)), $f_};
              }
            }
          }
        }
      };
    };
    $lcons = (dynamic $f, dynamic $s) ==> {
      return Vector{
        0,
        Vector{
          0,
          0,
          Vector{
            2,
            Vector{
              246,
              (dynamic $param) ==> {
                $e_ = $data($s);
                return Vector{0, $call1($f, 0), $e_};
              }
            }
          }
        }
      };
    };
    $lsing = (dynamic $f) ==> {
      return Vector{
        0,
        Vector{
          0,
          0,
          Vector{
            2,
            Vector{
              246,
              (dynamic $param) ==> {return Vector{0, $call1($f, 0), 0};}
            }
          }
        }
      };
    };
    $sempty = 0 as dynamic;
    $slazy = (dynamic $f) ==> {
      return Vector{
        0,
        Vector{
          0,
          0,
          Vector{
            2,
            Vector{246, (dynamic $param) ==> {return $data($call1($f, 0));}}
          }
        }
      };
    };
    $dump = (dynamic $f, dynamic $s) ==> {
      $call1($Pervasives[30], $cst_count);
      $d_ = $count($s);
      $call1($Pervasives[32], $d_);
      $call1($Pervasives[30], $cst_data);
      $dump_data->contents($f, $data($s));
      $call1($Pervasives[30], $cst);
      return $call1($Pervasives[35], 0);
    };
    $dump_data->contents = (dynamic $f, dynamic $param) ==> {
      if ($is_int($param)) {
        return $call1($Pervasives[30], $cst_Sempty);
      }
      else {
        switch($param[0]) {
          // FALLTHROUGH
          case 0:
            $d = $param[2];
            $a = $param[1];
            $call1($Pervasives[30], $cst_Scons);
            $call1($f, $a);
            $call1($Pervasives[30], $cst__0);
            $dump_data->contents($f, $d);
            return $call1($Pervasives[30], $cst__1);
          // FALLTHROUGH
          case 1:
            $d2 = $param[2];
            $d1 = $param[1];
            $call1($Pervasives[30], $cst_Sapp);
            $dump_data->contents($f, $d1);
            $call1($Pervasives[30], $cst__2);
            $dump_data->contents($f, $d2);
            return $call1($Pervasives[30], $cst__3);
          // FALLTHROUGH
          case 2:
            return $call1($Pervasives[30], $cst_Slazy);
          // FALLTHROUGH
          case 3:
            return $call1($Pervasives[30], $cst_Sgen);
          // FALLTHROUGH
          default:
            return $call1($Pervasives[30], $cst_Sbuffio);
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
    } as dynamic;
    
     return ($Stream);

  }
  public static function from(dynamic $f): dynamic {
    return static::callRehackFunction(static::requireModule()[3], varray[$f]);
  }
  public static function of_list(dynamic $l): dynamic {
    return static::callRehackFunction(static::requireModule()[4], varray[$l]);
  }
  public static function of_string(dynamic $s): dynamic {
    return static::callRehackFunction(static::requireModule()[5], varray[$s]);
  }
  public static function of_bytes(dynamic $s): dynamic {
    return static::callRehackFunction(static::requireModule()[6], varray[$s]);
  }
  public static function of_channel(dynamic $ic): dynamic {
    return static::callRehackFunction(static::requireModule()[7], varray[$ic]);
  }
  public static function iter(dynamic $f, dynamic $strm): dynamic {
    return static::callRehackFunction(static::requireModule()[8], varray[$f, $strm]);
  }
  public static function next(dynamic $s): dynamic {
    return static::callRehackFunction(static::requireModule()[9], varray[$s]);
  }
  public static function empty(dynamic $s): dynamic {
    return static::callRehackFunction(static::requireModule()[10], varray[$s]);
  }
  public static function peek(dynamic $param): dynamic {
    return static::callRehackFunction(static::requireModule()[11], varray[$param]);
  }
  public static function junk(dynamic $param): dynamic {
    return static::callRehackFunction(static::requireModule()[12], varray[$param]);
  }
  public static function count(dynamic $param): dynamic {
    return static::callRehackFunction(static::requireModule()[13], varray[$param]);
  }
  public static function npeek(dynamic $n, dynamic $param): dynamic {
    return static::callRehackFunction(static::requireModule()[14], varray[$n, $param]);
  }
  public static function iapp(dynamic $i, dynamic $s): dynamic {
    return static::callRehackFunction(static::requireModule()[15], varray[$i, $s]);
  }
  public static function icons(dynamic $i, dynamic $s): dynamic {
    return static::callRehackFunction(static::requireModule()[16], varray[$i, $s]);
  }
  public static function ising(dynamic $i): dynamic {
    return static::callRehackFunction(static::requireModule()[17], varray[$i]);
  }
  public static function lapp(dynamic $f, dynamic $s): dynamic {
    return static::callRehackFunction(static::requireModule()[18], varray[$f, $s]);
  }
  public static function lcons(dynamic $f, dynamic $s): dynamic {
    return static::callRehackFunction(static::requireModule()[19], varray[$f, $s]);
  }
  public static function lsing(dynamic $f): dynamic {
    return static::callRehackFunction(static::requireModule()[20], varray[$f]);
  }
  public static function slazy(dynamic $f): dynamic {
    return static::callRehackFunction(static::requireModule()[22], varray[$f]);
  }
  public static function dump(dynamic $f, dynamic $s): dynamic {
    return static::callRehackFunction(static::requireModule()[23], varray[$f, $s]);
  }

}
/* Hashing disabled */
