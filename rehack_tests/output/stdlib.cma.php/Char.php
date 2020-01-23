<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class Char {
  <<__Override, __Memoize>>
  public static function get() : Vector<dynamic> {
    
    $runtime = (\Rehack\GlobalObject::get() as dynamic)->jsoo_runtime;
    $caml_bytes_unsafe_set = $runtime["caml_bytes_unsafe_set"];
    $call1 = $runtime["caml_call1"];
    $caml_create_bytes = $runtime["caml_create_bytes"];
    $string = $runtime["caml_new_string"];
    $cst = $string("\\\\");
    $cst__0 = $string("\\'");
    $cst_b = $string("\\b");
    $cst_t = $string("\\t");
    $cst_n = $string("\\n");
    $cst_r = $string("\\r");
    $cst_Char_chr = $string("Char.chr");
    $Pervasives = Pervasives::get();
    $chr = (dynamic $n) ==> {
      if (0 <= $n) {if (! (255 < $n)) {return $n;}}
      return $call1($Pervasives[1], $cst_Char_chr);
    };
    $escaped = (dynamic $c) ==> {
      $switch__0 = null;
      $s__0 = null;
      if (40 <= $c) {
        if (92 === $c) {return $cst;}
        $switch__0 = 127 <= $c ? 0 : (1);
      }
      else {
        if (32 <= $c) {
          if (39 <= $c) {return $cst__0;}
          $switch__0 = 1;
        }
        else {
          if (14 <= $c) {
            $switch__0 = 0;
          }
          else {
            switch($c) {
              // FALLTHROUGH
              case 8:
                return $cst_b;
              // FALLTHROUGH
              case 9:
                return $cst_t;
              // FALLTHROUGH
              case 10:
                return $cst_n;
              // FALLTHROUGH
              case 13:
                return $cst_r;
              // FALLTHROUGH
              default:
                $switch__0 = 0;
              }
          }
        }
      }
      if ($switch__0) {
        $s__0 = $caml_create_bytes(1);
        $caml_bytes_unsafe_set($s__0, 0, $c);
        return $s__0;
      }
      $s = $caml_create_bytes(4);
      $caml_bytes_unsafe_set($s, 0, 92);
      $caml_bytes_unsafe_set($s, 1, (int) (48 + (int) ($c / 100)));
      $caml_bytes_unsafe_set($s, 2, (int) (48 + (int) ((int) ($c / 10) % 10)));
      $caml_bytes_unsafe_set($s, 3, (int) (48 + (int) ($c % 10)));
      return $s;
    };
    $lowercase = (dynamic $c) ==> {
      $switch__1 = null;
      $switch__2 = null;
      $switch__0 = 65 <= $c ? 90 < $c ? 0 : (1) : (0);
      if (! $switch__0) {
        $switch__1 = 192 <= $c ? 214 < $c ? 0 : (1) : (0);
        if (! $switch__1) {
          $switch__2 = 216 <= $c ? 222 < $c ? 1 : (0) : (1);
          if ($switch__2) {return $c;}
        }
      }
      return (int) ($c + 32);
    };
    $uppercase = (dynamic $c) ==> {
      $switch__1 = null;
      $switch__2 = null;
      $switch__0 = 97 <= $c ? 122 < $c ? 0 : (1) : (0);
      if (! $switch__0) {
        $switch__1 = 224 <= $c ? 246 < $c ? 0 : (1) : (0);
        if (! $switch__1) {
          $switch__2 = 248 <= $c ? 254 < $c ? 1 : (0) : (1);
          if ($switch__2) {return $c;}
        }
      }
      return (int) ($c + -32);
    };
    $lowercase_ascii = (dynamic $c) ==> {
      if (65 <= $c) {if (! (90 < $c)) {return (int) ($c + 32);}}
      return $c;
    };
    $uppercase_ascii = (dynamic $c) ==> {
      if (97 <= $c) {if (! (122 < $c)) {return (int) ($c + -32);}}
      return $c;
    };
    $compare = (dynamic $c1, dynamic $c2) ==> {return (int) ($c1 - $c2);};
    $equal = (dynamic $c1, dynamic $c2) ==> {
      return 0 === $compare($c1, $c2) ? 1 : (0);
    };
    $Char = Vector{
      0,
      $chr,
      $escaped,
      $lowercase,
      $uppercase,
      $lowercase_ascii,
      $uppercase_ascii,
      $compare,
      $equal
    } as dynamic;
    
    return($Char);

  }
  public static function chr(dynamic $n): dynamic {
    return static::syncCall(__FUNCTION__, 1, $n);
  }
  public static function escaped(dynamic $c): dynamic {
    return static::syncCall(__FUNCTION__, 2, $c);
  }
  public static function lowercase(dynamic $c): dynamic {
    return static::syncCall(__FUNCTION__, 3, $c);
  }
  public static function uppercase(dynamic $c): dynamic {
    return static::syncCall(__FUNCTION__, 4, $c);
  }
  public static function lowercase_ascii(dynamic $c): dynamic {
    return static::syncCall(__FUNCTION__, 5, $c);
  }
  public static function uppercase_ascii(dynamic $c): dynamic {
    return static::syncCall(__FUNCTION__, 6, $c);
  }
  public static function compare(dynamic $c1, dynamic $c2): dynamic {
    return static::syncCall(__FUNCTION__, 7, $c1, $c2);
  }
  public static function equal(dynamic $c1, dynamic $c2): dynamic {
    return static::syncCall(__FUNCTION__, 8, $c1, $c2);
  }

}
/* Hashing disabled */
