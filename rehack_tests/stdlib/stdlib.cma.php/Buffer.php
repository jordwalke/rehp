<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class Buffer {
  <<__Override, __Memoize>>
  public static function requireModule() : Vector<dynamic> {
    $joo_global_object = \Rehack\GlobalObject::get() as dynamic;
    
    $runtime = $joo_global_object->jsoo_runtime;
    $caml_bytes_unsafe_set = $runtime["caml_bytes_unsafe_set"];
    $call1 = $runtime["caml_call1"];
    $call3 = $runtime["caml_call3"];
    $call4 = $runtime["caml_call4"];
    $call5 = $runtime["caml_call5"];
    $caml_create_bytes = $runtime["caml_create_bytes"];
    $caml_ml_bytes_length = $runtime["caml_ml_bytes_length"];
    $caml_ml_string_length = $runtime["caml_ml_string_length"];
    $string = $runtime["caml_new_string"];
    $caml_string_get = $runtime["caml_string_get"];
    $caml_wrap_thrown_exception = $runtime["caml_wrap_thrown_exception"];
    $unsigned_right_shift_32 = $runtime["unsigned_right_shift_32"];
    $cst_Buffer_truncate = $string("Buffer.truncate");
    $cst_Buffer_add_channel = $string("Buffer.add_channel");
    $cst_Buffer_add_substring_add_subbytes = $string(
      "Buffer.add_substring/add_subbytes"
    );
    $cst_Buffer_add_cannot_grow_buffer = $string(
      "Buffer.add: cannot grow buffer"
    );
    $cst_Buffer_nth = $string("Buffer.nth");
    $cst_Buffer_blit = $string("Buffer.blit");
    $cst_Buffer_sub = $string("Buffer.sub");
    $Pervasives =  Pervasives::requireModule ();
    $End_of_file =  End_of_file::requireModule ();
    $Not_found =  Not_found::requireModule ();
    $String =  String_::requireModule ();
    $Assert_failure =  Assert_failure::requireModule ();
    $Sys =  Sys::requireModule ();
    $Bytes =  Bytes::requireModule ();
    $Uchar =  Uchar::requireModule ();
    $g_ = Vector{0, $string("buffer.ml"), 205, 9} as dynamic;
    $f_ = Vector{0, $string("buffer.ml"), 141, 19} as dynamic;
    $e_ = Vector{0, $string("buffer.ml"), 159, 8} as dynamic;
    $d_ = Vector{0, $string("buffer.ml"), 120, 19} as dynamic;
    $c_ = Vector{0, $string("buffer.ml"), 138, 8} as dynamic;
    $b_ = Vector{0, $string("buffer.ml"), 84, 19} as dynamic;
    $a_ = Vector{0, $string("buffer.ml"), 117, 8} as dynamic;
    $create = (dynamic $n) ==> {
      $n__0 = 1 <= $n ? $n : (1);
      $n__1 = $Sys[13] < $n__0 ? $Sys[13] : ($n__0);
      $s = $caml_create_bytes($n__1);
      return Vector{0, $s, 0, $n__1, $s};
    };
    $contents = (dynamic $b) ==> {return $call3($Bytes[8], $b[1], 0, $b[2]);};
    $to_bytes = (dynamic $b) ==> {return $call3($Bytes[7], $b[1], 0, $b[2]);};
    $sub = (dynamic $b, dynamic $ofs, dynamic $len) ==> {
      if (0 <= $ofs) {
        if (0 <= $len) {
          if (! ((int) ($b[2] - $len) < $ofs)) {
            return $call3($Bytes[8], $b[1], $ofs, $len);
          }
        }
      }
      return $call1($Pervasives[1], $cst_Buffer_sub);
    };
    $blit = 
    (dynamic $src, dynamic $srcoff, dynamic $dst, dynamic $dstoff, dynamic $len) ==> {
      if (0 <= $len) {
        if (0 <= $srcoff) {
          if (! ((int) ($src[2] - $len) < $srcoff)) {
            if (0 <= $dstoff) {
              if (! ((int) ($caml_ml_bytes_length($dst) - $len) < $dstoff)) {
                return $runtime["caml_blit_bytes"](
                  $src[1],
                  $srcoff,
                  $dst,
                  $dstoff,
                  $len
                );
              }
            }
          }
        }
      }
      return $call1($Pervasives[1], $cst_Buffer_blit);
    };
    $nth = (dynamic $b, dynamic $ofs) ==> {
      if (0 <= $ofs) {
        if (! ($b[2] <= $ofs)) {
          return $runtime["caml_bytes_unsafe_get"]($b[1], $ofs);
        }
      }
      return $call1($Pervasives[1], $cst_Buffer_nth);
    };
    $length = (dynamic $b) ==> {return $b[2];};
    $clear = (dynamic $b) ==> {$b[2] = 0;return 0;};
    $reset = (dynamic $b) ==> {
      $b[2] = 0;
      $b[1] = $b[4];
      $b[3] = $caml_ml_bytes_length($b[1]);
      return 0;
    };
    $resize = (dynamic $b, dynamic $more) ==> {
      $new_buffer = null;
      $len = $b[3];
      $new_len = Vector{0, $len} as dynamic;
      for (;;) {
        if ($new_len[1] < (int) ($b[2] + $more)) {
          $new_len[1] = (int) (2 * $new_len[1]);
          continue;
        }
        if ($Sys[13] < $new_len[1]) {
          if ((int) ($b[2] + $more) <= $Sys[13]) {$new_len[1] = $Sys[13];}
          else {$call1($Pervasives[2], $cst_Buffer_add_cannot_grow_buffer);}
        }
        $new_buffer = $caml_create_bytes($new_len[1]);
        $call5($Bytes[11], $b[1], 0, $new_buffer, 0, $b[2]);
        $b[1] = $new_buffer;
        $b[3] = $new_len[1];
        return 0;
      }
    };
    $add_char = (dynamic $b, dynamic $c) ==> {
      $pos = $b[2];
      if ($b[3] <= $pos) {$resize($b, 1);}
      $caml_bytes_unsafe_set($b[1], $pos, $c);
      $b[2] = (int) ($pos + 1);
      return 0;
    };
    $add_utf_8_uchar = (dynamic $b, dynamic $u) ==> {
      $pos = null;
      $pos__0 = null;
      $pos__1 = null;
      $u__0 = $call1($Uchar[10], $u);
      if (0 <= $u__0) {
        if (127 < $u__0) {
          if (2047 < $u__0) {
            if (65535 < $u__0) {
              if (1114111 < $u__0) {
                throw $caml_wrap_thrown_exception(
                        Vector{0, $Assert_failure, $a_}
                      ) as \Throwable;
              }
              $pos = $b[2];
              if ($b[3] < (int) ($pos + 4)) {$resize($b, 4);}
              $caml_bytes_unsafe_set(
                $b[1],
                $pos,
                240 | (int) $unsigned_right_shift_32($u__0, 18)
              );
              $caml_bytes_unsafe_set(
                $b[1],
                (int)
                ($pos + 1),
                128 | (int) $unsigned_right_shift_32($u__0, 12) & 63
              );
              $caml_bytes_unsafe_set(
                $b[1],
                (int)
                ($pos + 2),
                128 | (int) $unsigned_right_shift_32($u__0, 6) & 63
              );
              $caml_bytes_unsafe_set($b[1], (int) ($pos + 3), 128 | $u__0 & 63
              );
              $b[2] = (int) ($pos + 4);
              return 0;
            }
            $pos__0 = $b[2];
            if ($b[3] < (int) ($pos__0 + 3)) {$resize($b, 3);}
            $caml_bytes_unsafe_set(
              $b[1],
              $pos__0,
              224 | (int) $unsigned_right_shift_32($u__0, 12)
            );
            $caml_bytes_unsafe_set(
              $b[1],
              (int)
              ($pos__0 + 1),
              128 | (int) $unsigned_right_shift_32($u__0, 6) & 63
            );
            $caml_bytes_unsafe_set(
              $b[1],
              (int)
              ($pos__0 + 2),
              128 | $u__0 & 63
            );
            $b[2] = (int) ($pos__0 + 3);
            return 0;
          }
          $pos__1 = $b[2];
          if ($b[3] < (int) ($pos__1 + 2)) {$resize($b, 2);}
          $caml_bytes_unsafe_set(
            $b[1],
            $pos__1,
            192 | (int) $unsigned_right_shift_32($u__0, 6)
          );
          $caml_bytes_unsafe_set($b[1], (int) ($pos__1 + 1), 128 | $u__0 & 63);
          $b[2] = (int) ($pos__1 + 2);
          return 0;
        }
        return $add_char($b, $u__0);
      }
      throw $caml_wrap_thrown_exception(Vector{0, $Assert_failure, $b_}) as \Throwable;
    };
    $add_utf_16be_uchar = (dynamic $b, dynamic $u) ==> {
      $u__1 = null;
      $hi = null;
      $lo = null;
      $pos = null;
      $pos__0 = null;
      $u__0 = $call1($Uchar[10], $u);
      if (0 <= $u__0) {
        if (65535 < $u__0) {
          if (1114111 < $u__0) {
            throw $caml_wrap_thrown_exception(Vector{0, $Assert_failure, $c_}) as \Throwable;
          }
          $u__1 = (int) ($u__0 + -65536);
          $hi = 55296 | (int) $unsigned_right_shift_32($u__1, 10);
          $lo = 56320 | $u__1 & 1023;
          $pos = $b[2];
          if ($b[3] < (int) ($pos + 4)) {$resize($b, 4);}
          $caml_bytes_unsafe_set(
            $b[1],
            $pos,
            (int)
            $unsigned_right_shift_32($hi, 8)
          );
          $caml_bytes_unsafe_set($b[1], (int) ($pos + 1), $hi & 255);
          $caml_bytes_unsafe_set(
            $b[1],
            (int)
            ($pos + 2),
            (int)
            $unsigned_right_shift_32($lo, 8)
          );
          $caml_bytes_unsafe_set($b[1], (int) ($pos + 3), $lo & 255);
          $b[2] = (int) ($pos + 4);
          return 0;
        }
        $pos__0 = $b[2];
        if ($b[3] < (int) ($pos__0 + 2)) {$resize($b, 2);}
        $caml_bytes_unsafe_set(
          $b[1],
          $pos__0,
          (int)
          $unsigned_right_shift_32($u__0, 8)
        );
        $caml_bytes_unsafe_set($b[1], (int) ($pos__0 + 1), $u__0 & 255);
        $b[2] = (int) ($pos__0 + 2);
        return 0;
      }
      throw $caml_wrap_thrown_exception(Vector{0, $Assert_failure, $d_}) as \Throwable;
    };
    $add_utf_16le_uchar = (dynamic $b, dynamic $u) ==> {
      $u__1 = null;
      $hi = null;
      $lo = null;
      $pos = null;
      $pos__0 = null;
      $u__0 = $call1($Uchar[10], $u);
      if (0 <= $u__0) {
        if (65535 < $u__0) {
          if (1114111 < $u__0) {
            throw $caml_wrap_thrown_exception(Vector{0, $Assert_failure, $e_}) as \Throwable;
          }
          $u__1 = (int) ($u__0 + -65536);
          $hi = 55296 | (int) $unsigned_right_shift_32($u__1, 10);
          $lo = 56320 | $u__1 & 1023;
          $pos = $b[2];
          if ($b[3] < (int) ($pos + 4)) {$resize($b, 4);}
          $caml_bytes_unsafe_set($b[1], $pos, $hi & 255);
          $caml_bytes_unsafe_set(
            $b[1],
            (int)
            ($pos + 1),
            (int)
            $unsigned_right_shift_32($hi, 8)
          );
          $caml_bytes_unsafe_set($b[1], (int) ($pos + 2), $lo & 255);
          $caml_bytes_unsafe_set(
            $b[1],
            (int)
            ($pos + 3),
            (int)
            $unsigned_right_shift_32($lo, 8)
          );
          $b[2] = (int) ($pos + 4);
          return 0;
        }
        $pos__0 = $b[2];
        if ($b[3] < (int) ($pos__0 + 2)) {$resize($b, 2);}
        $caml_bytes_unsafe_set($b[1], $pos__0, $u__0 & 255);
        $caml_bytes_unsafe_set(
          $b[1],
          (int)
          ($pos__0 + 1),
          (int)
          $unsigned_right_shift_32($u__0, 8)
        );
        $b[2] = (int) ($pos__0 + 2);
        return 0;
      }
      throw $caml_wrap_thrown_exception(Vector{0, $Assert_failure, $f_}) as \Throwable;
    };
    $add_substring = (dynamic $b, dynamic $s, dynamic $offset, dynamic $len) ==> {
      $n_ = null;
      $o_ = null;
      $m_ = $offset < 0 ? 1 : (0);
      if ($m_) {
        $n_ = $m_;
      }
      else {
        $o_ = $len < 0 ? 1 : (0);
        $n_ =
          $o_
            ? $o_
            : ((int) ($caml_ml_string_length($s) - $len) < $offset ? 1 : (0));
      }
      if ($n_) {
        $call1($Pervasives[1], $cst_Buffer_add_substring_add_subbytes);
      }
      $new_position = (int) ($b[2] + $len);
      if ($b[3] < $new_position) {$resize($b, $len);}
      $call5($Bytes[12], $s, $offset, $b[1], $b[2], $len);
      $b[2] = $new_position;
      return 0;
    };
    $add_subbytes = (dynamic $b, dynamic $s, dynamic $offset, dynamic $len) ==> {
      return $add_substring($b, $call1($Bytes[42], $s), $offset, $len);
    };
    $add_string = (dynamic $b, dynamic $s) ==> {
      $len = $caml_ml_string_length($s);
      $new_position = (int) ($b[2] + $len);
      if ($b[3] < $new_position) {$resize($b, $len);}
      $call5($Bytes[12], $s, 0, $b[1], $b[2], $len);
      $b[2] = $new_position;
      return 0;
    };
    $add_bytes = (dynamic $b, dynamic $s) ==> {
      return $add_string($b, $call1($Bytes[42], $s));
    };
    $add_buffer = (dynamic $b, dynamic $bs) ==> {
      return $add_subbytes($b, $bs[1], 0, $bs[2]);
    };
    $add_channel = (dynamic $b, dynamic $ic, dynamic $len__1) ==> {
      $j_ = null;
      $n = null;
      $len__0 = null;
      $k_ = $len__1 < 0 ? 1 : (0);
      $l_ = $k_ ? $k_ : ($Sys[13] < $len__1 ? 1 : (0));
      if ($l_) {$call1($Pervasives[1], $cst_Buffer_add_channel);}
      if ($b[3] < (int) ($b[2] + $len__1)) {$resize($b, $len__1);}
      $len = $len__1;
      for (;;) {
        $j_ = 0 < $len ? 1 : (0);
        if ($j_) {
          $n = $call4($Pervasives[72], $ic, $b[1], $b[2], $len);
          $b[2] = (int) ($b[2] + $n);
          if (0 === $n) {
            throw $caml_wrap_thrown_exception($End_of_file) as \Throwable;
          }
          $len__0 = (int) ($len - $n);
          $len = $len__0;
          continue;
        }
        return $j_;
      }
    };
    $output_buffer = (dynamic $oc, dynamic $b) ==> {
      return $call4($Pervasives[56], $oc, $b[1], 0, $b[2]);
    };
    $add_substitute = (dynamic $b, dynamic $f, dynamic $s) ==> {
      $i = null;
      $k = null;
      $i__0 = null;
      $k__0 = null;
      $i__1 = null;
      $k__1 = null;
      $i__2 = null;
      $lim = null;
      $i__3 = null;
      $match = null;
      $i__4 = null;
      $lim__0 = null;
      $opening = null;
      $i__5 = null;
      $k__2 = null;
      $h_ = null;
      $i__6 = null;
      $stop = null;
      $current = null;
      $i__8 = null;
      $start = null;
      $match__0 = null;
      $i__9 = null;
      $ident = null;
      $i__10 = null;
      $i__11 = null;
      $i__12 = null;
      $i_ = null;
      $switch__0 = null;
      $switch__1 = null;
      $lim__1 = $caml_ml_string_length($s);
      $previous = 32;
      $i__7 = 0;
      for (;;) {
        if ($i__7 < $lim__1) {
          $current = $caml_string_get($s, $i__7);
          if (36 === $current) {
            if (92 === $previous) {
              $add_char($b, $current);
              $i__8 = (int) ($i__7 + 1);
              $previous = 32;
              $i__7 = $i__8;
              continue;
            }
            $start = (int) ($i__7 + 1);
            if ($lim__1 <= $start) {
              throw $caml_wrap_thrown_exception($Not_found) as \Throwable;
            }
            $opening = $caml_string_get($s, $start);
            if (40 === $opening) {$switch__0 = 0;}
            else {
              if (123 === $opening) {$switch__0 = 0;}
              else {
                $i__6 = (int) ($start + 1);
                $lim__0 = $caml_ml_string_length($s);
                $i__3 = $i__6;
                for (;;) {
                  if ($lim__0 <= $i__3) {$stop = $lim__0;}
                  else {
                    $match = $caml_string_get($s, $i__3);
                    $switch__1 =
                      91 <= $match
                        ? 97 <= $match
                         ? 123 <= $match ? 0 : (1)
                         : (95 === $match ? 1 : (0))
                        : (58 <= $match
                         ? 65 <= $match ? 1 : (0)
                         : (48 <= $match ? 1 : (0)));
                    if ($switch__1) {
                      $i__4 = (int) ($i__3 + 1);
                      $i__3 = $i__4;
                      continue;
                    }
                    $stop = $i__3;
                  }
                  $match__0 =
                    Vector{
                      0,
                      $call3($String[4], $s, $start, (int) ($stop - $start)),
                      $stop
                    };
                  $switch__0 = 1;
                  break;
                }
              }
            }
            if (! $switch__0) {
              $i__5 = (int) ($start + 1);
              $k__2 = 0;
              if (40 === $opening) {$h_ = 41;}
              else {
                if (123 !== $opening) {
                  throw $caml_wrap_thrown_exception(
                          Vector{0, $Assert_failure, $g_}
                        ) as \Throwable;
                }
                $h_ = 125;
              }
              $lim = $caml_ml_string_length($s);
              $k = $k__2;
              $i = $i__5;
              for (;;) {
                if ($lim <= $i) {
                  throw $caml_wrap_thrown_exception($Not_found) as \Throwable;
                }
                if ($caml_string_get($s, $i) === $opening) {
                  $i__0 = (int) ($i + 1);
                  $k__0 = (int) ($k + 1);
                  $k = $k__0;
                  $i = $i__0;
                  continue;
                }
                if ($caml_string_get($s, $i) !== $h_) {
                  $i__2 = (int) ($i + 1);
                  $i = $i__2;
                  continue;
                }
                if (0 !== $k) {
                  $i__1 = (int) ($i + 1);
                  $k__1 = (int) ($k + -1);
                  $k = $k__1;
                  $i = $i__1;
                  continue;
                }
                $match__0 =
                  Vector{
                    0,
                    $call3(
                      $String[4],
                      $s,
                      $i__5,
                      (int)
                      ((int) ($i - $start) + -1)
                    ),
                    (int)
                    ($i + 1)
                  };
                break;
              }
            }
            $i__9 = $match__0[2];
            $ident = $match__0[1];
            $add_string($b, $call1($f, $ident));
            $previous = 32;
            $i__7 = $i__9;
            continue;
          }
          if (92 === $previous) {
            $add_char($b, 92);
            $add_char($b, $current);
            $i__10 = (int) ($i__7 + 1);
            $previous = 32;
            $i__7 = $i__10;
            continue;
          }
          if (92 === $current) {
            $i__11 = (int) ($i__7 + 1);
            $previous = $current;
            $i__7 = $i__11;
            continue;
          }
          $add_char($b, $current);
          $i__12 = (int) ($i__7 + 1);
          $previous = $current;
          $i__7 = $i__12;
          continue;
        }
        $i_ = 92 === $previous ? 1 : (0);
        return $i_ ? $add_char($b, $previous) : ($i_);
      }
    };
    $truncate = (dynamic $b, dynamic $len) ==> {
      if (0 <= $len) {if (! ($b[2] < $len)) {$b[2] = $len;return 0;}}
      return $call1($Pervasives[1], $cst_Buffer_truncate);
    };
    $Buffer = Vector{
      0,
      $create,
      $contents,
      $to_bytes,
      $sub,
      $blit,
      $nth,
      $length,
      $clear,
      $reset,
      $add_char,
      $add_utf_8_uchar,
      $add_utf_16le_uchar,
      $add_utf_16be_uchar,
      $add_string,
      $add_bytes,
      $add_substring,
      $add_subbytes,
      $add_substitute,
      $add_buffer,
      $add_channel,
      $output_buffer,
      $truncate
    } as dynamic;
    
     return ($Buffer);

  }
  public static function create(dynamic $n): dynamic {
    return static::callRehackFunction(static::requireModule()[1], varray[$n]);
  }
  public static function contents(dynamic $b): dynamic {
    return static::callRehackFunction(static::requireModule()[2], varray[$b]);
  }
  public static function to_bytes(dynamic $b): dynamic {
    return static::callRehackFunction(static::requireModule()[3], varray[$b]);
  }
  public static function sub(dynamic $b, dynamic $ofs, dynamic $len): dynamic {
    return static::callRehackFunction(static::requireModule()[4], varray[$b, $ofs, $len]);
  }
  public static function blit(dynamic $src, dynamic $srcoff, dynamic $dst, dynamic $dstoff, dynamic $len): dynamic {
    return static::callRehackFunction(static::requireModule()[5], varray[$src, $srcoff, $dst, $dstoff, $len]);
  }
  public static function nth(dynamic $b, dynamic $ofs): dynamic {
    return static::callRehackFunction(static::requireModule()[6], varray[$b, $ofs]);
  }
  public static function length(dynamic $b): dynamic {
    return static::callRehackFunction(static::requireModule()[7], varray[$b]);
  }
  public static function clear(dynamic $b): dynamic {
    return static::callRehackFunction(static::requireModule()[8], varray[$b]);
  }
  public static function reset(dynamic $b): dynamic {
    return static::callRehackFunction(static::requireModule()[9], varray[$b]);
  }
  public static function _add_char_(dynamic $b, dynamic $c): dynamic {
    return static::callRehackFunction(static::requireModule()[10], varray[$b, $c]);
  }
  public static function add_utf_8_uchar(dynamic $b, dynamic $u): dynamic {
    return static::callRehackFunction(static::requireModule()[11], varray[$b, $u]);
  }
  public static function add_utf_16le_uchar(dynamic $b, dynamic $u): dynamic {
    return static::callRehackFunction(static::requireModule()[12], varray[$b, $u]);
  }
  public static function add_utf_16be_uchar(dynamic $b, dynamic $u): dynamic {
    return static::callRehackFunction(static::requireModule()[13], varray[$b, $u]);
  }
  public static function add_string(dynamic $b, dynamic $s): dynamic {
    return static::callRehackFunction(static::requireModule()[14], varray[$b, $s]);
  }
  public static function add_bytes(dynamic $b, dynamic $s): dynamic {
    return static::callRehackFunction(static::requireModule()[15], varray[$b, $s]);
  }
  public static function add_substring(dynamic $b, dynamic $s, dynamic $offset, dynamic $len): dynamic {
    return static::callRehackFunction(static::requireModule()[16], varray[$b, $s, $offset, $len]);
  }
  public static function add_subbytes(dynamic $b, dynamic $s, dynamic $offset, dynamic $len): dynamic {
    return static::callRehackFunction(static::requireModule()[17], varray[$b, $s, $offset, $len]);
  }
  public static function add_substitute(dynamic $b, dynamic $f, dynamic $s): dynamic {
    return static::callRehackFunction(static::requireModule()[18], varray[$b, $f, $s]);
  }
  public static function add_buffer(dynamic $b, dynamic $bs): dynamic {
    return static::callRehackFunction(static::requireModule()[19], varray[$b, $bs]);
  }
  public static function add_channel(dynamic $b, dynamic $ic, dynamic $len): dynamic {
    return static::callRehackFunction(static::requireModule()[20], varray[$b, $ic, $len]);
  }
  public static function output_buffer(dynamic $oc, dynamic $b): dynamic {
    return static::callRehackFunction(static::requireModule()[21], varray[$oc, $b]);
  }
  public static function truncate(dynamic $b, dynamic $len): dynamic {
    return static::callRehackFunction(static::requireModule()[22], varray[$b, $len]);
  }

}
/* Hashing disabled */
