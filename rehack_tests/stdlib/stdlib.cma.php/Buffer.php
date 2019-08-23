<?hh
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * Buffer.php
 */

namespace Rehack;

final class Buffer {
  <<__Memoize>>
  public static function get() {
    $global_object = \Rehack\GlobalObject::get();
    $runtime = \Rehack\Runtime::get();
    /*
     * Soon, these will replace the `global_data->ModuleName`
     * pattern in the load() function.
     */
    $Bytes = Bytes::get();
    $Pervasives = Pervasives::get();
    $String_ = String_::get();
    $Sys = Sys::get();
    $Uchar = Uchar::get();
    $Not_found = Not_found::get();
    $End_of_file = End_of_file::get();
    $Assert_failure = Assert_failure::get();
    Buffer::load($global_object);
    $memoized = $runtime->caml_get_global_data()->Buffer;
    return $memoized;
  }

  /**
   * Performs module load operation. May have side effects.
   */
  private static function load($joo_global_object) {
    

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
    $unsigned_right_shift_32 = $runtime["unsigned_right_shift_32"];
    $global_data = $runtime["caml_get_global_data"]();
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
    $Pervasives = $global_data["Pervasives"];
    $End_of_file = $global_data["End_of_file"];
    $Not_found = $global_data["Not_found"];
    $String = $global_data["String_"];
    $Assert_failure = $global_data["Assert_failure"];
    $Sys = $global_data["Sys"];
    $Bytes = $global_data["Bytes"];
    $Uchar = $global_data["Uchar"];
    $hr = Vector{0, $string("buffer.ml"), 205, 9};
    $hq = Vector{0, $string("buffer.ml"), 141, 19};
    $hp = Vector{0, $string("buffer.ml"), 159, 8};
    $ho = Vector{0, $string("buffer.ml"), 120, 19};
    $hn = Vector{0, $string("buffer.ml"), 138, 8};
    $hm = Vector{0, $string("buffer.ml"), 84, 19};
    $hl = Vector{0, $string("buffer.ml"), 117, 8};
    $create = function(dynamic $n) use ($Sys,$caml_create_bytes) {
      $n__0 = 1 <= $n ? $n : (1);
      $n__1 = $Sys[13] < $n__0 ? $Sys[13] : ($n__0);
      $s = $caml_create_bytes($n__1);
      return Vector{0, $s, 0, $n__1, $s};
    };
    $contents = function(dynamic $b) use ($Bytes,$call3) {
      return $call3($Bytes[8], $b[1], 0, $b[2]);
    };
    $to_bytes = function(dynamic $b) use ($Bytes,$call3) {
      return $call3($Bytes[7], $b[1], 0, $b[2]);
    };
    $sub = function(dynamic $b, dynamic $ofs, dynamic $len) use ($Bytes,$Pervasives,$call1,$call3,$cst_Buffer_sub) {
      if (0 <= $ofs) {
        if (0 <= $len) {
          if (! ((int) ($b[2] - $len) < $ofs)) {
            return $call3($Bytes[8], $b[1], $ofs, $len);
          }
        }
      }
      return $call1($Pervasives[1], $cst_Buffer_sub);
    };
    $blit = function
    (dynamic $src, dynamic $srcoff, dynamic $dst, dynamic $dstoff, dynamic $len) use ($Pervasives,$call1,$caml_ml_bytes_length,$cst_Buffer_blit,$runtime) {
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
    $nth = function(dynamic $b, dynamic $ofs) use ($Pervasives,$call1,$cst_Buffer_nth,$runtime) {
      if (0 <= $ofs) {
        if (! ($b[2] <= $ofs)) {
          return $runtime["caml_bytes_unsafe_get"]($b[1], $ofs);
        }
      }
      return $call1($Pervasives[1], $cst_Buffer_nth);
    };
    $length = function(dynamic $b) {return $b[2];};
    $clear = function(dynamic $b) {$b[2] = 0;return 0;};
    $reset = function(dynamic $b) use ($caml_ml_bytes_length) {
      $b[2] = 0;
      $b[1] = $b[4];
      $b[3] = $caml_ml_bytes_length($b[1]);
      return 0;
    };
    $resize = function(dynamic $b, dynamic $more) use ($Bytes,$Pervasives,$Sys,$call1,$call5,$caml_create_bytes,$cst_Buffer_add_cannot_grow_buffer) {
      $len = $b[3];
      $new_len = Vector{0, $len};
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
    $add_char = function(dynamic $b, dynamic $c) use ($caml_bytes_unsafe_set,$resize) {
      $pos = $b[2];
      if ($b[3] <= $pos) {$resize($b, 1);}
      $caml_bytes_unsafe_set($b[1], $pos, $c);
      $b[2] = (int) ($pos + 1);
      return 0;
    };
    $add_utf_8_uchar = function(dynamic $b, dynamic $u) use ($Assert_failure,$Uchar,$add_char,$call1,$caml_bytes_unsafe_set,$hl,$hm,$resize,$runtime,$unsigned_right_shift_32) {
      $u__0 = $call1($Uchar[10], $u);
      if (0 <= $u__0) {
        if (127 < $u__0) {
          if (2047 < $u__0) {
            if (65535 < $u__0) {
              if (1114111 < $u__0) {
                throw $runtime["caml_wrap_thrown_exception"](Vector{0, $Assert_failure, $hl}) as \Throwable;
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
      throw $runtime["caml_wrap_thrown_exception"](Vector{0, $Assert_failure, $hm}) as \Throwable;
    };
    $add_utf_16be_uchar = function(dynamic $b, dynamic $u) use ($Assert_failure,$Uchar,$call1,$caml_bytes_unsafe_set,$hn,$ho,$resize,$runtime,$unsigned_right_shift_32) {
      $u__0 = $call1($Uchar[10], $u);
      if (0 <= $u__0) {
        if (65535 < $u__0) {
          if (1114111 < $u__0) {
            throw $runtime["caml_wrap_thrown_exception"](Vector{0, $Assert_failure, $hn}) as \Throwable;
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
      throw $runtime["caml_wrap_thrown_exception"](Vector{0, $Assert_failure, $ho}) as \Throwable;
    };
    $add_utf_16le_uchar = function(dynamic $b, dynamic $u) use ($Assert_failure,$Uchar,$call1,$caml_bytes_unsafe_set,$hp,$hq,$resize,$runtime,$unsigned_right_shift_32) {
      $u__0 = $call1($Uchar[10], $u);
      if (0 <= $u__0) {
        if (65535 < $u__0) {
          if (1114111 < $u__0) {
            throw $runtime["caml_wrap_thrown_exception"](Vector{0, $Assert_failure, $hp}) as \Throwable;
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
      throw $runtime["caml_wrap_thrown_exception"](Vector{0, $Assert_failure, $hq}) as \Throwable;
    };
    $add_substring = function
    (dynamic $b, dynamic $s, dynamic $offset, dynamic $len) use ($Bytes,$Pervasives,$call1,$call5,$caml_ml_string_length,$cst_Buffer_add_substring_add_subbytes,$resize) {
      $hw = $offset < 0 ? 1 : (0);
      if ($hw) {
        $hx = $hw;
      }
      else {
        $hy = $len < 0 ? 1 : (0);
        $hx = $hy
          ? $hy
          : ((int) ($caml_ml_string_length($s) - $len) < $offset ? 1 : (0));
      }
      if ($hx) {
        $call1($Pervasives[1], $cst_Buffer_add_substring_add_subbytes);
      }
      $new_position = (int) ($b[2] + $len);
      if ($b[3] < $new_position) {$resize($b, $len);}
      $call5($Bytes[12], $s, $offset, $b[1], $b[2], $len);
      $b[2] = $new_position;
      return 0;
    };
    $add_subbytes = function
    (dynamic $b, dynamic $s, dynamic $offset, dynamic $len) use ($Bytes,$add_substring,$call1) {
      return $add_substring($b, $call1($Bytes[42], $s), $offset, $len);
    };
    $add_string = function(dynamic $b, dynamic $s) use ($Bytes,$call5,$caml_ml_string_length,$resize) {
      $len = $caml_ml_string_length($s);
      $new_position = (int) ($b[2] + $len);
      if ($b[3] < $new_position) {$resize($b, $len);}
      $call5($Bytes[12], $s, 0, $b[1], $b[2], $len);
      $b[2] = $new_position;
      return 0;
    };
    $add_bytes = function(dynamic $b, dynamic $s) use ($Bytes,$add_string,$call1) {
      return $add_string($b, $call1($Bytes[42], $s));
    };
    $add_buffer = function(dynamic $b, dynamic $bs) use ($add_subbytes) {
      return $add_subbytes($b, $bs[1], 0, $bs[2]);
    };
    $add_channel_rec = function(dynamic $b, dynamic $ic, dynamic $len) use ($End_of_file,$Pervasives,$call4,$runtime) {
      $len__0 = $len;
      for (;;) {
        $hv = 0 < $len__0 ? 1 : (0);
        if ($hv) {
          $n = $call4($Pervasives[72], $ic, $b[1], $b[2], $len__0);
          $b[2] = (int) ($b[2] + $n);
          if (0 === $n) {
            throw $runtime["caml_wrap_thrown_exception"]($End_of_file) as \Throwable;
          }
          $len__1 = (int) ($len__0 - $n);
          $len__0 = $len__1;
          continue;
        }
        return $hv;
      }
    };
    $add_channel = function(dynamic $b, dynamic $ic, dynamic $len) use ($Pervasives,$Sys,$add_channel_rec,$call1,$cst_Buffer_add_channel,$resize) {
      $ht = $len < 0 ? 1 : (0);
      $hu = $ht ? $ht : ($Sys[13] < $len ? 1 : (0));
      if ($hu) {$call1($Pervasives[1], $cst_Buffer_add_channel);}
      if ($b[3] < (int) ($b[2] + $len)) {$resize($b, $len);}
      return $add_channel_rec($b, $ic, $len);
    };
    $output_buffer = function(dynamic $oc, dynamic $b) use ($Pervasives,$call4) {
      return $call4($Pervasives[56], $oc, $b[1], 0, $b[2]);
    };
    $closing = function(dynamic $param) use ($Assert_failure,$hr,$runtime) {
      if (40 === $param) {return 41;}
      if (123 === $param) {return 125;}
      throw $runtime["caml_wrap_thrown_exception"](Vector{0, $Assert_failure, $hr}) as \Throwable;
    };
    $advance_to_closing = function
    (dynamic $opening, dynamic $closing, dynamic $k, dynamic $s, dynamic $start) use ($Not_found,$caml_ml_string_length,$caml_string_get,$runtime) {
      $advance = function(dynamic $k, dynamic $i, dynamic $lim) use ($Not_found,$caml_string_get,$closing,$opening,$runtime,$s) {
        $k__0 = $k;
        $i__0 = $i;
        for (;;) {
          if ($lim <= $i__0) {
            throw $runtime["caml_wrap_thrown_exception"]($Not_found) as \Throwable;
          }
          if ($caml_string_get($s, $i__0) === $opening) {
            $i__1 = (int) ($i__0 + 1);
            $k__1 = (int) ($k__0 + 1);
            $k__0 = $k__1;
            $i__0 = $i__1;
            continue;
          }
          if ($caml_string_get($s, $i__0) === $closing) {
            if (0 === $k__0) {return $i__0;}
            $i__2 = (int) ($i__0 + 1);
            $k__2 = (int) ($k__0 + -1);
            $k__0 = $k__2;
            $i__0 = $i__2;
            continue;
          }
          $i__3 = (int) ($i__0 + 1);
          $i__0 = $i__3;
          continue;
        }
      };
      return $advance($k, $start, $caml_ml_string_length($s));
    };
    $advance_to_non_alpha = function(dynamic $s, dynamic $start) use ($caml_ml_string_length,$caml_string_get) {
      $advance = function(dynamic $i, dynamic $lim) use ($caml_string_get,$s) {
        $i__0 = $i;
        for (;;) {
          if ($lim <= $i__0) {return $lim;}
          $match = $caml_string_get($s, $i__0);
          $switch__0 = 91 <= $match
            ? 97 <= $match
             ? 123 <= $match ? 0 : (1)
             : (95 === $match ? 1 : (0))
            : (58 <= $match
             ? 65 <= $match ? 1 : (0)
             : (48 <= $match ? 1 : (0)));
          if ($switch__0) {$i__1 = (int) ($i__0 + 1);$i__0 = $i__1;continue;}
          return $i__0;
        }
      };
      return $advance($start, $caml_ml_string_length($s));
    };
    $find_ident = function(dynamic $s, dynamic $start, dynamic $lim) use ($Not_found,$String,$advance_to_closing,$advance_to_non_alpha,$call3,$caml_string_get,$closing,$runtime) {
      if ($lim <= $start) {
        throw $runtime["caml_wrap_thrown_exception"]($Not_found) as \Throwable;
      }
      $c = $caml_string_get($s, $start);
      if (40 !== $c) {
        if (123 !== $c) {
          $stop__0 = $advance_to_non_alpha($s, (int) ($start + 1));
          return Vector{
            0,
            $call3($String[4], $s, $start, (int) ($stop__0 - $start)),
            $stop__0
          };
        }
      }
      $new_start = (int) ($start + 1);
      $stop = $advance_to_closing($c, $closing($c), 0, $s, $new_start);
      return Vector{
        0,
        $call3($String[4], $s, $new_start, (int) ((int) ($stop - $start) + -1)
        ),
        (int)
        ($stop + 1)
      };
    };
    $add_substitute = function(dynamic $b, dynamic $f, dynamic $s) use ($add_char,$add_string,$call1,$caml_ml_string_length,$caml_string_get,$find_ident) {
      $lim = $caml_ml_string_length($s);
      $subst = function(dynamic $previous, dynamic $i) use ($add_char,$add_string,$b,$call1,$caml_string_get,$f,$find_ident,$lim,$s) {
        $previous__0 = $previous;
        $i__0 = $i;
        for (;;) {
          if ($i__0 < $lim) {
            $current = $caml_string_get($s, $i__0);
            if (36 === $current) {
              if (92 === $previous__0) {
                $add_char($b, $current);
                $i__1 = (int) ($i__0 + 1);
                $previous__0 = 32;
                $i__0 = $i__1;
                continue;
              }
              $j = (int) ($i__0 + 1);
              $match = $find_ident($s, $j, $lim);
              $i__2 = $match[2];
              $ident = $match[1];
              $add_string($b, $call1($f, $ident));
              $previous__0 = 32;
              $i__0 = $i__2;
              continue;
            }
            if (92 === $previous__0) {
              $add_char($b, 92);
              $add_char($b, $current);
              $i__3 = (int) ($i__0 + 1);
              $previous__0 = 32;
              $i__0 = $i__3;
              continue;
            }
            if (92 === $current) {
              $i__4 = (int) ($i__0 + 1);
              $previous__0 = $current;
              $i__0 = $i__4;
              continue;
            }
            $add_char($b, $current);
            $i__5 = (int) ($i__0 + 1);
            $previous__0 = $current;
            $i__0 = $i__5;
            continue;
          }
          $hs = 92 === $previous__0 ? 1 : (0);
          return $hs ? $add_char($b, $previous__0) : ($hs);
        }
      };
      return $subst(32, 0);
    };
    $truncate = function(dynamic $b, dynamic $len) use ($Pervasives,$call1,$cst_Buffer_truncate,$length) {
      if (0 <= $len) {if (! ($length($b) < $len)) {$b[2] = $len;return 0;}}
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
    };
    
    $runtime["caml_register_global"](22, $Buffer, "Buffer");

  }
}