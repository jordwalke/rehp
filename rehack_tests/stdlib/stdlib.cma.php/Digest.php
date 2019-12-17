<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class Digest {
  <<__Override, __Memoize>>
  public static function get() : Vector<dynamic> {
    $joo_global_object = \Rehack\GlobalObject::get() as dynamic;
    
    $runtime = $joo_global_object->jsoo_runtime;
    $caml_bytes_unsafe_set = $runtime["caml_bytes_unsafe_set"];
    $call1 = $runtime["caml_call1"];
    $call2 = $runtime["caml_call2"];
    $caml_create_bytes = $runtime["caml_create_bytes"];
    $caml_md5_string = $runtime["caml_md5_string"];
    $caml_ml_string_length = $runtime["caml_ml_string_length"];
    $string__0 = $runtime["caml_new_string"];
    $caml_string_get = $runtime["caml_string_get"];
    $caml_wrap_thrown_exception = $runtime["caml_wrap_thrown_exception"];
    $caml_wrap_thrown_exception_reraise = $runtime[
       "caml_wrap_thrown_exception_reraise"
     ];
    $left_shift_32 = $runtime["left_shift_32"];
    $unsigned_right_shift_32 = $runtime["unsigned_right_shift_32"];
    $cst_Digest_from_hex__0 = $string__0("Digest.from_hex");
    $cst_Digest_from_hex = $string__0("Digest.from_hex");
    $cst_Digest_to_hex = $string__0("Digest.to_hex");
    $cst_Digest_substring = $string__0("Digest.substring");
    $Invalid_argument =  Invalid_argument::get ();
    $Pervasives =  Pervasives::get ();
    $Char =  Char::get ();
    $Bytes =  Bytes::get ();
    $String =  String_::get ();
    $compare = $String[33];
    $equal = $String[34];
    $string = function(dynamic $str) use ($caml_md5_string,$caml_ml_string_length) {
      return $caml_md5_string($str, 0, $caml_ml_string_length($str));
    };
    $bytes = function(dynamic $b) use ($Bytes,$call1,$string) {
      return $string($call1($Bytes[42], $b));
    };
    $substring = function(dynamic $str, dynamic $ofs, dynamic $len) use ($Pervasives,$call1,$caml_md5_string,$caml_ml_string_length,$cst_Digest_substring) {
      if (0 <= $ofs) {
        if (0 <= $len) {
          if (! ((int) ($caml_ml_string_length($str) - $len) < $ofs)) {return $caml_md5_string($str, $ofs, $len);}
        }
      }
      return $call1($Pervasives[1], $cst_Digest_substring);
    };
    $subbytes = function(dynamic $b, dynamic $ofs, dynamic $len) use ($Bytes,$call1,$substring) {
      return $substring($call1($Bytes[42], $b), $ofs, $len);
    };
    $file = function(dynamic $filename) use ($Pervasives,$call1,$caml_wrap_thrown_exception_reraise,$runtime) {
      $ic = $call1($Pervasives[68], $filename);
      try {$d = $runtime["caml_md5_chan"]($ic, -1);}
      catch(\Throwable $e) {
        $e = $runtime["caml_wrap_exception"]($e);
        $call1($Pervasives[81], $ic);
        throw $caml_wrap_thrown_exception_reraise($e) as \Throwable;
      }
      $call1($Pervasives[81], $ic);
      return $d;
    };
    $output = function(dynamic $chan, dynamic $digest) use ($Pervasives,$call2) {
      return $call2($Pervasives[54], $chan, $digest);
    };
    $input = function(dynamic $chan) use ($Pervasives,$call2) {
      return $call2($Pervasives[74], $chan, 16);
    };
    $char_hex = function(dynamic $n) {
      $e_ = 10 <= $n ? 87 : (48);
      return (int) ($n + $e_);
    };
    $to_hex = function(dynamic $d) use ($Bytes,$Pervasives,$call1,$caml_bytes_unsafe_set,$caml_create_bytes,$caml_ml_string_length,$caml_string_get,$char_hex,$cst_Digest_to_hex,$unsigned_right_shift_32) {
      if (16 !== $caml_ml_string_length($d)) {
        $call1($Pervasives[1], $cst_Digest_to_hex);
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
        $d_ = (int) ($i + 1);
        if (15 !== $i) {$i = $d_;continue;}
        return $call1($Bytes[42], $result);
      }
    };
    $from_hex = function(dynamic $s) use ($Bytes,$Char,$Invalid_argument,$Pervasives,$call1,$caml_create_bytes,$caml_ml_string_length,$caml_string_get,$caml_wrap_thrown_exception,$cst_Digest_from_hex,$cst_Digest_from_hex__0,$left_shift_32,$runtime,$unsigned_right_shift_32) {
      if (32 !== $caml_ml_string_length($s)) {
        $call1($Pervasives[1], $cst_Digest_from_hex);
      }
      $digit = function(dynamic $c) use ($Invalid_argument,$caml_wrap_thrown_exception,$cst_Digest_from_hex__0,$unsigned_right_shift_32) {
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
        throw $caml_wrap_thrown_exception(
                Vector{0, $Invalid_argument, $cst_Digest_from_hex__0}
              ) as \Throwable;
      };
      $byte__0 = function(dynamic $i) use ($caml_string_get,$digit,$left_shift_32,$s) {
        $c_ = $digit($caml_string_get($s, (int) ($i + 1)));
        return (int)
        ($left_shift_32($digit($caml_string_get($s, $i)), 4) + $c_);
      };
      $result = $caml_create_bytes(16);
      $i = 0;
      for (;;) {
        $a_ = $byte__0((int) (2 * $i));
        $runtime["caml_bytes_set"]($result, $i, $call1($Char[1], $a_));
        $b_ = (int) ($i + 1);
        if (15 !== $i) {$i = $b_;continue;}
        return $call1($Bytes[42], $result);
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
    
     return ($Digest);

  }
  public static function from_hex(dynamic $s) {
    return static::get()[11]($s);
  }
  public static function to_hex(dynamic $d) {
    return static::get()[10]($d);
  }
  public static function input(dynamic $chan) {
    return static::get()[9]($chan);
  }
  public static function output(dynamic $chan, dynamic $digest) {
    return static::get()[8]($chan, $digest);
  }
  public static function file(dynamic $filename) {
    return static::get()[7]($filename);
  }
  public static function subbytes(dynamic $b, dynamic $ofs, dynamic $len) {
    return static::get()[6]($b, $ofs, $len);
  }
  public static function substring(dynamic $str, dynamic $ofs, dynamic $len) {
    return static::get()[5]($str, $ofs, $len);
  }
  public static function bytes(dynamic $b) {
    return static::get()[4]($b);
  }
  public static function string(dynamic $str) {
    return static::get()[3]($str);
  }
  public static function equal() {
    return static::get()[2]();
  }
  public static function compare() {
    return static::get()[1]();
  }

}
/* Hashing disabled */
