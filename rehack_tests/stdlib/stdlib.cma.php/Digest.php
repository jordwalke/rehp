<?hh
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * Digest.php
 */

namespace Rehack;

final class Digest {
  <<__Memoize>>
  public static function get() {
    $global_object = \Rehack\GlobalObject::get();
    $runtime = \Rehack\Runtime::get();
    /*
     * Soon, these will replace the `global_data->ModuleName`
     * pattern in the load() function.
     */
    $Bytes = Bytes::get();
    $Char = Char::get();
    $Pervasives = Pervasives::get();
    $String_ = String_::get();
    $Invalid_argument = Invalid_argument::get();
    Digest::load($global_object);
    $memoized = $runtime->caml_get_global_data()->Digest;
    return $memoized;
  }

  /**
   * Performs module load operation. May have side effects.
   */
  private static function load($joo_global_object) {
    

    $runtime = $joo_global_object->jsoo_runtime;
    $caml_arity_test = $runtime["caml_arity_test"];
    $caml_bytes_unsafe_set = $runtime["caml_bytes_unsafe_set"];
    $caml_create_bytes = $runtime["caml_create_bytes"];
    $caml_md5_string = $runtime["caml_md5_string"];
    $caml_ml_string_length = $runtime["caml_ml_string_length"];
    $caml_new_string = $runtime["caml_new_string"];
    $caml_string_get = $runtime["caml_string_get"];
    $caml_wrap_exception = $runtime["caml_wrap_exception"];
    $left_shift_32 = $runtime["left_shift_32"];
    $unsigned_right_shift_32 = $runtime["unsigned_right_shift_32"];
    $caml_call1 = function(dynamic $f, dynamic $a0) use ($caml_arity_test,$runtime) {
      return $caml_arity_test($f) === 1
        ? $f($a0)
        : ($runtime["caml_call_gen"]($f, varray[$a0]));
    };
    $caml_call2 = function(dynamic $f, dynamic $a0, dynamic $a1) use ($caml_arity_test,$runtime) {
      return $caml_arity_test($f) === 2
        ? $f($a0, $a1)
        : ($runtime["caml_call_gen"]($f, varray[$a0,$a1]));
    };
    $global_data = $runtime["caml_get_global_data"]();
    $cst_Digest_from_hex__0 = $caml_new_string("Digest.from_hex");
    $cst_Digest_from_hex = $caml_new_string("Digest.from_hex");
    $cst_Digest_to_hex = $caml_new_string("Digest.to_hex");
    $cst_Digest_substring = $caml_new_string("Digest.substring");
    $Invalid_argument = $global_data["Invalid_argument"];
    $Pervasives = $global_data["Pervasives"];
    $Char = $global_data["Char"];
    $Bytes = $global_data["Bytes"];
    $String = $global_data["String_"];
    $compare = $String[33];
    $equal = $String[34];
    $string = function(dynamic $str) use ($caml_md5_string,$caml_ml_string_length) {
      return $caml_md5_string($str, 0, $caml_ml_string_length($str));
    };
    $bytes = function(dynamic $b) use ($Bytes,$caml_call1,$string) {
      return $string($caml_call1($Bytes[42], $b));
    };
    $substring = function(dynamic $str, dynamic $ofs, dynamic $len) use ($Pervasives,$caml_call1,$caml_md5_string,$caml_ml_string_length,$cst_Digest_substring) {
      if (0 <= $ofs) {
        if (0 <= $len) {
          if (! ((int) ($caml_ml_string_length($str) - $len) < $ofs)) {return $caml_md5_string($str, $ofs, $len);}
        }
      }
      return $caml_call1($Pervasives[1], $cst_Digest_substring);
    };
    $subbytes = function(dynamic $b, dynamic $ofs, dynamic $len) use ($Bytes,$caml_call1,$substring) {
      return $substring($caml_call1($Bytes[42], $b), $ofs, $len);
    };
    $file = function(dynamic $filename) use ($Pervasives,$caml_call1,$caml_wrap_exception,$runtime) {
      $ic = $caml_call1($Pervasives[68], $filename);
      try {$d = $runtime["caml_md5_chan"]($ic, -1);}
      catch(\Throwable $e) {
        $e = $caml_wrap_exception($e);
        $caml_call1($Pervasives[81], $ic);
        throw $runtime["caml_wrap_thrown_exception_reraise"]($e) as \Throwable;
      }
      $caml_call1($Pervasives[81], $ic);
      return $d;
    };
    $output = function(dynamic $chan, dynamic $digest) use ($Pervasives,$caml_call2) {
      return $caml_call2($Pervasives[54], $chan, $digest);
    };
    $input = function(dynamic $chan) use ($Pervasives,$caml_call2) {
      return $caml_call2($Pervasives[74], $chan, 16);
    };
    $char_hex = function(dynamic $n) {
      $pX = 10 <= $n ? 87 : (48);
      return (int) ($n + $pX);
    };
    $to_hex = function(dynamic $d) use ($Bytes,$Pervasives,$caml_bytes_unsafe_set,$caml_call1,$caml_create_bytes,$caml_ml_string_length,$caml_string_get,$char_hex,$cst_Digest_to_hex,$unsigned_right_shift_32) {
      if (16 !== $caml_ml_string_length($d)) {
        $caml_call1($Pervasives[1], $cst_Digest_to_hex);
      }
      $result = $caml_create_bytes(32);
      $i = 0;
      for (;;) {
        $x = $caml_string_get($d, $i);
        $caml_bytes_unsafe_set(
          $result,
          (int)
          ($i * 2),
          $char_hex((int) $unsigned_right_shift_32($x, 4))
        );
        $caml_bytes_unsafe_set(
          $result,
          (int)
          ((int) ($i * 2) + 1),
          $char_hex($x & 15)
        );
        $pW = (int) ($i + 1);
        if (15 !== $i) {$i = $pW;continue;}
        return $caml_call1($Bytes[42], $result);
      }
    };
    $from_hex = function(dynamic $s) use ($Bytes,$Char,$Invalid_argument,$Pervasives,$caml_call1,$caml_create_bytes,$caml_ml_string_length,$caml_string_get,$cst_Digest_from_hex,$cst_Digest_from_hex__0,$left_shift_32,$runtime,$unsigned_right_shift_32) {
      if (32 !== $caml_ml_string_length($s)) {
        $caml_call1($Pervasives[1], $cst_Digest_from_hex);
      }
      $digit = function(dynamic $c) use ($Invalid_argument,$cst_Digest_from_hex__0,$runtime,$unsigned_right_shift_32) {
        if (65 <= $c) {
          if (97 <= $c) {
            if (! (103 <= $c)) {return (int) ((int) ($c - 97) + 10);}
          }
          else {if (! (71 <= $c)) {return (int) ((int) ($c - 65) + 10);}}
        }
        else {
          $switcher = (int) ($c + -48);
          if (! (9 < $unsigned_right_shift_32($switcher, 0))) {return (int) ($c - 48);}
        }
        throw $runtime["caml_wrap_thrown_exception"](
                Vector{0, $Invalid_argument, $cst_Digest_from_hex__0}
              ) as \Throwable;
      };
      $byte__0 = function(dynamic $i) use ($caml_string_get,$digit,$left_shift_32,$s) {
        $pV = $digit($caml_string_get($s, (int) ($i + 1)));
        return (int)
        ($left_shift_32($digit($caml_string_get($s, $i)), 4) + $pV);
      };
      $result = $caml_create_bytes(16);
      $i = 0;
      for (;;) {
        $pT = $byte__0((int) (2 * $i));
        $runtime["caml_bytes_set"]($result, $i, $caml_call1($Char[1], $pT));
        $pU = (int) ($i + 1);
        if (15 !== $i) {$i = $pU;continue;}
        return $caml_call1($Bytes[42], $result);
      }
    };
    $Digest = Vector{
      0,
      $compare,
      $equal,
      $string,
      $bytes,
      $substring,
      $subbytes,
      $file,
      $output,
      $input,
      $to_hex,
      $from_hex
    };
    
    $runtime["caml_register_global"](9, $Digest, "Digest");

  }
}