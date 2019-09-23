<?hh
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * Char.php
 */

namespace Rehack;

final class Char {
  <<__Memoize>>
  public static function get() {
    $global_object = \Rehack\GlobalObject::get();
    $runtime = \Rehack\Runtime::get();
    /*
     * Soon, these will replace the `global_data->ModuleName`
     * pattern in the load() function.
     */
    $Pervasives = Pervasives::get();
    Char::load($global_object);
    $memoized = $runtime->caml_get_global_data()->Char;
    return $memoized;
  }

  /**
   * Performs module load operation. May have side effects.
   */
  private static function load($joo_global_object) {
    

    $runtime = $joo_global_object->jsoo_runtime;
    $caml_bytes_unsafe_set = $runtime["caml_bytes_unsafe_set"];
    $call1 = $runtime["caml_call1"];
    $caml_create_bytes = $runtime["caml_create_bytes"];
    $string = $runtime["caml_new_string"];
    $global_data = $runtime["caml_get_global_data"]();
    $cst = $string("\\\\");
    $cst__0 = $string("\\'");
    $cst_b = $string("\\b");
    $cst_t = $string("\\t");
    $cst_n = $string("\\n");
    $cst_r = $string("\\r");
    $cst_Char_chr = $string("Char.chr");
    $Pervasives = $global_data["Pervasives"];
    $chr = function(dynamic $n) use ($Pervasives,$call1,$cst_Char_chr) {
      if (0 <= $n) {if (! (255 < $n)) {return $n;}}
      return $call1($Pervasives[1], $cst_Char_chr);
    };
    $escaped = function(dynamic $c) use ($caml_bytes_unsafe_set,$caml_create_bytes,$cst,$cst__0,$cst_b,$cst_n,$cst_r,$cst_t) {
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
    $lowercase = function(dynamic $c) {
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
    $uppercase = function(dynamic $c) {
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
    $lowercase_ascii = function(dynamic $c) {
      if (65 <= $c) {if (! (90 < $c)) {return (int) ($c + 32);}}
      return $c;
    };
    $uppercase_ascii = function(dynamic $c) {
      if (97 <= $c) {if (! (122 < $c)) {return (int) ($c + -32);}}
      return $c;
    };
    $compare = function(dynamic $c1, dynamic $c2) {return (int) ($c1 - $c2);};
    $equal = function(dynamic $c1, dynamic $c2) use ($compare) {
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
    };
    
    $runtime["caml_register_global"](8, $Char, "Char");

  }
}

/*____hashes compiler:hashing-disabled inputs:hashing-disabled bytecode:hashing-disabled*/
