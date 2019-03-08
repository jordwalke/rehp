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
    $unsigned_right_shift_32 = $runtime["unsigned_right_shift_32"];
    $caml_arity_test = $runtime["caml_arity_test"];
    $caml_bytes_unsafe_set = $runtime["caml_bytes_unsafe_set"];
    $caml_create_bytes = $runtime["caml_create_bytes"];
    $caml_ml_bytes_length = $runtime["caml_ml_bytes_length"];
    $caml_ml_string_length = $runtime["caml_ml_string_length"];
    $caml_new_string = $runtime["caml_new_string"];
    $caml_string_get = $runtime["caml_string_get"];
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
    $caml_call5 = function($f, $a0, $a1, $a2, $a3, $a4) use ($caml_arity_test,$runtime) {
      return $caml_arity_test($f) == 5
        ? $f($a0, $a1, $a2, $a3, $a4)
        : ($runtime["caml_call_gen"]($f, varray[$a0,$a1,$a2,$a3,$a4]));
    };
    $global_data = $runtime["caml_get_global_data"]();
    $cst_Buffer_truncate = $caml_new_string("Buffer.truncate");
    $cst_Buffer_add_channel = $caml_new_string("Buffer.add_channel");
    $cst_Buffer_add_substring_add_subbytes = $caml_new_string(
      "Buffer.add_substring/add_subbytes"
    );
    $cst_Buffer_add_cannot_grow_buffer = $caml_new_string(
      "Buffer.add: cannot grow buffer"
    );
    $cst_Buffer_nth = $caml_new_string("Buffer.nth");
    $cst_Buffer_blit = $caml_new_string("Buffer.blit");
    $cst_Buffer_sub = $caml_new_string("Buffer.sub");
    $Pervasives = $global_data["Pervasives"];
    $End_of_file = $global_data["End_of_file"];
    $Not_found = $global_data["Not_found"];
    $String = $global_data["String_"];
    $Assert_failure = $global_data["Assert_failure"];
    $Sys = $global_data["Sys"];
    $Bytes = $global_data["Bytes"];
    $Uchar = $global_data["Uchar"];
    $hq = Vector{0, $caml_new_string("buffer.ml"), 205, 9};
    $hp = Vector{0, $caml_new_string("buffer.ml"), 141, 19};
    $ho = Vector{0, $caml_new_string("buffer.ml"), 159, 8};
    $hn = Vector{0, $caml_new_string("buffer.ml"), 120, 19};
    $hm = Vector{0, $caml_new_string("buffer.ml"), 138, 8};
    $hl = Vector{0, $caml_new_string("buffer.ml"), 84, 19};
    $hk = Vector{0, $caml_new_string("buffer.ml"), 117, 8};
    $create = function($n) use ($Sys,$caml_create_bytes) {
      $n__0 = 1 <= $n ? $n : (1);
      $n__1 = $Sys[13] < $n__0 ? $Sys[13] : ($n__0);
      $s = $caml_create_bytes($n__1);
      return Vector{0, $s, 0, $n__1, $s};
    };
    $contents = function($b) use ($Bytes,$caml_call3) {
      return $caml_call3($Bytes[8], $b[1], 0, $b[2]);
    };
    $to_bytes = function($b) use ($Bytes,$caml_call3) {
      return $caml_call3($Bytes[7], $b[1], 0, $b[2]);
    };
    $sub = function($b, $ofs, $len) use ($Bytes,$Pervasives,$caml_call1,$caml_call3,$cst_Buffer_sub) {
      if (0 <= $ofs) {
        if (0 <= $len) {
          if (! (($b[2] - $len | 0) < $ofs)) {
            return $caml_call3($Bytes[8], $b[1], $ofs, $len);
          }
        }
      }
      return $caml_call1($Pervasives[1], $cst_Buffer_sub);
    };
    $blit = function($src, $srcoff, $dst, $dstoff, $len) use ($Pervasives,$caml_call1,$caml_ml_bytes_length,$cst_Buffer_blit,$runtime) {
      if (0 <= $len) {
        if (0 <= $srcoff) {
          if (! (($src[2] - $len | 0) < $srcoff)) {
            if (0 <= $dstoff) {
              if (! (($caml_ml_bytes_length($dst) - $len | 0) < $dstoff)) {
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
      return $caml_call1($Pervasives[1], $cst_Buffer_blit);
    };
    $nth = function($b, $ofs) use ($Pervasives,$caml_call1,$cst_Buffer_nth,$runtime) {
      if (0 <= $ofs) {
        if (! ($b[2] <= $ofs)) {
          return $runtime["caml_bytes_unsafe_get"]($b[1], $ofs);
        }
      }
      return $caml_call1($Pervasives[1], $cst_Buffer_nth);
    };
    $length = function($b) {return $b[2];};
    $clear = function($b) {$b[2] = 0;return 0;};
    $reset = function($b) use ($caml_ml_bytes_length) {
      $b[2] = 0;
      $b[1] = $b[4];
      $b[3] = $caml_ml_bytes_length($b[1]);
      return 0;
    };
    $resize = function($b, $more) use ($Bytes,$Pervasives,$Sys,$caml_call1,$caml_call5,$caml_create_bytes,$cst_Buffer_add_cannot_grow_buffer) {
      $len = $b[3];
      $new_len = Vector{0, $len};
      for (;;) {
        if ($new_len[1] < ($b[2] + $more | 0)) {
          $new_len[1] = 2 * $new_len[1] | 0;
          continue;
        }
        if ($Sys[13] < $new_len[1]) {
          if (($b[2] + $more | 0) <= $Sys[13]) {$new_len[1] = $Sys[13];}
          else {
            $caml_call1($Pervasives[2], $cst_Buffer_add_cannot_grow_buffer);
          }
        }
        $new_buffer = $caml_create_bytes($new_len[1]);
        $caml_call5($Bytes[11], $b[1], 0, $new_buffer, 0, $b[2]);
        $b[1] = $new_buffer;
        $b[3] = $new_len[1];
        return 0;
      }
    };
    $add_char = function($b, $c) use ($caml_bytes_unsafe_set,$resize) {
      $pos = $b[2];
      if ($b[3] <= $pos) {$resize($b, 1);}
      $caml_bytes_unsafe_set($b[1], $pos, $c);
      $b[2] = $pos + 1 | 0;
      return 0;
    };
    $add_utf_8_uchar = function($b, $u) use ($Assert_failure,$Uchar,$add_char,$caml_bytes_unsafe_set,$caml_call1,$hk,$hl,$resize,$runtime,$unsigned_right_shift_32) {
      $u__0 = $caml_call1($Uchar[10], $u);
      if (0 <= $u__0) {
        if (127 < $u__0) {
          if (2047 < $u__0) {
            if (65535 < $u__0) {
              if (1114111 < $u__0) {
                throw $runtime["caml_wrap_thrown_exception"](Vector{0, $Assert_failure, $hk});
              }
              $pos = $b[2];
              if ($b[3] < ($pos + 4 | 0)) {$resize($b, 4);}
              $caml_bytes_unsafe_set(
                $b[1],
                $pos,
                240 | $unsigned_right_shift_32($u__0, 18) | 0
              );
              $caml_bytes_unsafe_set(
                $b[1],
                $pos + 1 |
                  0,
                128 | ($unsigned_right_shift_32($u__0, 12) | 0) & 63
              );
              $caml_bytes_unsafe_set(
                $b[1],
                $pos + 2 |
                  0,
                128 | ($unsigned_right_shift_32($u__0, 6) | 0) & 63
              );
              $caml_bytes_unsafe_set($b[1], $pos + 3 | 0, 128 | $u__0 & 63);
              $b[2] = $pos + 4 | 0;
              return 0;
            }
            $pos__0 = $b[2];
            if ($b[3] < ($pos__0 + 3 | 0)) {$resize($b, 3);}
            $caml_bytes_unsafe_set(
              $b[1],
              $pos__0,
              224 | $unsigned_right_shift_32($u__0, 12) | 0
            );
            $caml_bytes_unsafe_set(
              $b[1],
              $pos__0 + 1 |
                0,
              128 | ($unsigned_right_shift_32($u__0, 6) | 0) & 63
            );
            $caml_bytes_unsafe_set($b[1], $pos__0 + 2 | 0, 128 | $u__0 & 63);
            $b[2] = $pos__0 + 3 | 0;
            return 0;
          }
          $pos__1 = $b[2];
          if ($b[3] < ($pos__1 + 2 | 0)) {$resize($b, 2);}
          $caml_bytes_unsafe_set(
            $b[1],
            $pos__1,
            192 | $unsigned_right_shift_32($u__0, 6) | 0
          );
          $caml_bytes_unsafe_set($b[1], $pos__1 + 1 | 0, 128 | $u__0 & 63);
          $b[2] = $pos__1 + 2 | 0;
          return 0;
        }
        return $add_char($b, $u__0);
      }
      throw $runtime["caml_wrap_thrown_exception"](Vector{0, $Assert_failure, $hl});
    };
    $add_utf_16be_uchar = function($b, $u) use ($Assert_failure,$Uchar,$caml_bytes_unsafe_set,$caml_call1,$hm,$hn,$resize,$runtime,$unsigned_right_shift_32) {
      $u__0 = $caml_call1($Uchar[10], $u);
      if (0 <= $u__0) {
        if (65535 < $u__0) {
          if (1114111 < $u__0) {
            throw $runtime["caml_wrap_thrown_exception"](Vector{0, $Assert_failure, $hm});
          }
          $u__1 = $u__0 + -65536 | 0;
          $hi = 55296 | $unsigned_right_shift_32($u__1, 10) | 0;
          $lo = 56320 | $u__1 & 1023;
          $pos = $b[2];
          if ($b[3] < ($pos + 4 | 0)) {$resize($b, 4);}
          $caml_bytes_unsafe_set(
            $b[1],
            $pos,
            $unsigned_right_shift_32($hi, 8) | 0
          );
          $caml_bytes_unsafe_set($b[1], $pos + 1 | 0, $hi & 255);
          $caml_bytes_unsafe_set(
            $b[1],
            $pos + 2 |
              0,
            $unsigned_right_shift_32($lo, 8) | 0
          );
          $caml_bytes_unsafe_set($b[1], $pos + 3 | 0, $lo & 255);
          $b[2] = $pos + 4 | 0;
          return 0;
        }
        $pos__0 = $b[2];
        if ($b[3] < ($pos__0 + 2 | 0)) {$resize($b, 2);}
        $caml_bytes_unsafe_set(
          $b[1],
          $pos__0,
          $unsigned_right_shift_32($u__0, 8) | 0
        );
        $caml_bytes_unsafe_set($b[1], $pos__0 + 1 | 0, $u__0 & 255);
        $b[2] = $pos__0 + 2 | 0;
        return 0;
      }
      throw $runtime["caml_wrap_thrown_exception"](Vector{0, $Assert_failure, $hn});
    };
    $add_utf_16le_uchar = function($b, $u) use ($Assert_failure,$Uchar,$caml_bytes_unsafe_set,$caml_call1,$ho,$hp,$resize,$runtime,$unsigned_right_shift_32) {
      $u__0 = $caml_call1($Uchar[10], $u);
      if (0 <= $u__0) {
        if (65535 < $u__0) {
          if (1114111 < $u__0) {
            throw $runtime["caml_wrap_thrown_exception"](Vector{0, $Assert_failure, $ho});
          }
          $u__1 = $u__0 + -65536 | 0;
          $hi = 55296 | $unsigned_right_shift_32($u__1, 10) | 0;
          $lo = 56320 | $u__1 & 1023;
          $pos = $b[2];
          if ($b[3] < ($pos + 4 | 0)) {$resize($b, 4);}
          $caml_bytes_unsafe_set($b[1], $pos, $hi & 255);
          $caml_bytes_unsafe_set(
            $b[1],
            $pos + 1 |
              0,
            $unsigned_right_shift_32($hi, 8) | 0
          );
          $caml_bytes_unsafe_set($b[1], $pos + 2 | 0, $lo & 255);
          $caml_bytes_unsafe_set(
            $b[1],
            $pos + 3 |
              0,
            $unsigned_right_shift_32($lo, 8) | 0
          );
          $b[2] = $pos + 4 | 0;
          return 0;
        }
        $pos__0 = $b[2];
        if ($b[3] < ($pos__0 + 2 | 0)) {$resize($b, 2);}
        $caml_bytes_unsafe_set($b[1], $pos__0, $u__0 & 255);
        $caml_bytes_unsafe_set(
          $b[1],
          $pos__0 + 1 |
            0,
          $unsigned_right_shift_32($u__0, 8) | 0
        );
        $b[2] = $pos__0 + 2 | 0;
        return 0;
      }
      throw $runtime["caml_wrap_thrown_exception"](Vector{0, $Assert_failure, $hp});
    };
    $add_substring = function($b, $s, $offset, $len) use ($Bytes,$Pervasives,$caml_call1,$caml_call5,$caml_ml_string_length,$cst_Buffer_add_substring_add_subbytes,$resize) {
      $hv = $offset < 0 ? 1 : (0);
      if ($hv) {
        $hw = $hv;
      }
      else {
        $hx = $len < 0 ? 1 : (0);
        $hw = $hx ||
          (($caml_ml_string_length($s) - $len | 0) < $offset ? 1 : (0));
      }
      if ($hw) {
        $caml_call1($Pervasives[1], $cst_Buffer_add_substring_add_subbytes);
      }
      $new_position = $b[2] + $len | 0;
      if ($b[3] < $new_position) {$resize($b, $len);}
      $caml_call5($Bytes[12], $s, $offset, $b[1], $b[2], $len);
      $b[2] = $new_position;
      return 0;
    };
    $add_subbytes = function($b, $s, $offset, $len) use ($Bytes,$add_substring,$caml_call1) {
      return $add_substring($b, $caml_call1($Bytes[42], $s), $offset, $len);
    };
    $add_string = function($b, $s) use ($Bytes,$caml_call5,$caml_ml_string_length,$resize) {
      $len = $caml_ml_string_length($s);
      $new_position = $b[2] + $len | 0;
      if ($b[3] < $new_position) {$resize($b, $len);}
      $caml_call5($Bytes[12], $s, 0, $b[1], $b[2], $len);
      $b[2] = $new_position;
      return 0;
    };
    $add_bytes = function($b, $s) use ($Bytes,$add_string,$caml_call1) {
      return $add_string($b, $caml_call1($Bytes[42], $s));
    };
    $add_buffer = function($b, $bs) use ($add_subbytes) {
      return $add_subbytes($b, $bs[1], 0, $bs[2]);
    };
    $add_channel_rec = function($b, $ic, $len) use ($End_of_file,$Pervasives,$caml_call4,$runtime) {
      $len__0 = $len;
      for (;;) {
        $hu = 0 < $len__0 ? 1 : (0);
        if ($hu) {
          $n = $caml_call4($Pervasives[72], $ic, $b[1], $b[2], $len__0);
          $b[2] = $b[2] + $n | 0;
          if (0 === $n) {
            throw $runtime["caml_wrap_thrown_exception"]($End_of_file);
          }
          $len__1 = $len__0 - $n | 0;
          $len__0 = $len__1;
          continue;
        }
        return $hu;
      }
    };
    $add_channel = function($b, $ic, $len) use ($Pervasives,$Sys,$add_channel_rec,$caml_call1,$cst_Buffer_add_channel,$resize) {
      $hs = $len < 0 ? 1 : (0);
      $ht = $hs || ($Sys[13] < $len ? 1 : (0));
      if ($ht) {$caml_call1($Pervasives[1], $cst_Buffer_add_channel);}
      if ($b[3] < ($b[2] + $len | 0)) {$resize($b, $len);}
      return $add_channel_rec($b, $ic, $len);
    };
    $output_buffer = function($oc, $b) use ($Pervasives,$caml_call4) {
      return $caml_call4($Pervasives[56], $oc, $b[1], 0, $b[2]);
    };
    $closing = function($param) use ($Assert_failure,$hq,$runtime) {
      if (40 === $param) {return 41;}
      if (123 === $param) {return 125;}
      throw $runtime["caml_wrap_thrown_exception"](Vector{0, $Assert_failure, $hq});
    };
    $advance_to_closing = function($opening, $closing, $k, $s, $start) use ($Not_found,$caml_ml_string_length,$caml_string_get,$runtime) {
      $advance = function($k, $i, $lim) use ($Not_found,$caml_string_get,$closing,$opening,$runtime,$s) {
        $k__0 = $k;
        $i__0 = $i;
        for (;;) {
          if ($lim <= $i__0) {
            throw $runtime["caml_wrap_thrown_exception"]($Not_found);
          }
          if ($caml_string_get($s, $i__0) === $opening) {
            $i__1 = $i__0 + 1 | 0;
            $k__1 = $k__0 + 1 | 0;
            $k__0 = $k__1;
            $i__0 = $i__1;
            continue;
          }
          if ($caml_string_get($s, $i__0) === $closing) {
            if (0 === $k__0) {return $i__0;}
            $i__2 = $i__0 + 1 | 0;
            $k__2 = $k__0 + -1 | 0;
            $k__0 = $k__2;
            $i__0 = $i__2;
            continue;
          }
          $i__3 = $i__0 + 1 | 0;
          $i__0 = $i__3;
          continue;
        }
      };
      return $advance($k, $start, $caml_ml_string_length($s));
    };
    $advance_to_non_alpha = function($s, $start) use ($caml_ml_string_length,$caml_string_get) {
      $advance = function($i, $lim) use ($caml_string_get,$s) {
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
          if ($switch__0) {$i__1 = $i__0 + 1 | 0;$i__0 = $i__1;continue;}
          return $i__0;
        }
      };
      return $advance($start, $caml_ml_string_length($s));
    };
    $find_ident = function($s, $start, $lim) use ($Not_found,$String,$advance_to_closing,$advance_to_non_alpha,$caml_call3,$caml_string_get,$closing,$runtime) {
      if ($lim <= $start) {
        throw $runtime["caml_wrap_thrown_exception"]($Not_found);
      }
      $c = $caml_string_get($s, $start);
      if (40 !== $c) {
        if (123 !== $c) {
          $stop__0 = $advance_to_non_alpha($s, $start + 1 | 0);
          return Vector{
            0,
            $caml_call3($String[4], $s, $start, $stop__0 - $start | 0),
            $stop__0
          };
        }
      }
      $new_start = $start + 1 | 0;
      $stop = $advance_to_closing($c, $closing($c), 0, $s, $new_start);
      return Vector{
        0,
        $caml_call3($String[4], $s, $new_start, ($stop - $start | 0) + -1 | 0),
        $stop + 1 |
          0
      };
    };
    $add_substitute = function($b, $f, $s) use ($add_char,$add_string,$caml_call1,$caml_ml_string_length,$caml_string_get,$find_ident) {
      $lim = $caml_ml_string_length($s);
      $subst = function($previous, $i) use ($add_char,$add_string,$b,$caml_call1,$caml_string_get,$f,$find_ident,$lim,$s) {
        $previous__0 = $previous;
        $i__0 = $i;
        for (;;) {
          if ($i__0 < $lim) {
            $current = $caml_string_get($s, $i__0);
            if (36 === $current) {
              if (92 === $previous__0) {
                $add_char($b, $current);
                $i__1 = $i__0 + 1 | 0;
                $previous__0 = 32;
                $i__0 = $i__1;
                continue;
              }
              $j = $i__0 + 1 | 0;
              $match = $find_ident($s, $j, $lim);
              $i__2 = $match[2];
              $ident = $match[1];
              $add_string($b, $caml_call1($f, $ident));
              $previous__0 = 32;
              $i__0 = $i__2;
              continue;
            }
            if (92 === $previous__0) {
              $add_char($b, 92);
              $add_char($b, $current);
              $i__3 = $i__0 + 1 | 0;
              $previous__0 = 32;
              $i__0 = $i__3;
              continue;
            }
            if (92 === $current) {
              $i__4 = $i__0 + 1 | 0;
              $previous__0 = $current;
              $i__0 = $i__4;
              continue;
            }
            $add_char($b, $current);
            $i__5 = $i__0 + 1 | 0;
            $previous__0 = $current;
            $i__0 = $i__5;
            continue;
          }
          $hr = 92 === $previous__0 ? 1 : (0);
          return $hr ? $add_char($b, $previous__0) : ($hr);
        }
      };
      return $subst(32, 0);
    };
    $truncate = function($b, $len) use ($Pervasives,$caml_call1,$cst_Buffer_truncate,$length) {
      if (0 <= $len) {if (! ($length($b) < $len)) {$b[2] = $len;return 0;}}
      return $caml_call1($Pervasives[1], $cst_Buffer_truncate);
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