<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class StringLabels {
  <<__Override, __Memoize>>
  public static function requireModule() : Vector<dynamic> {
    $joo_global_object = \Rehack\GlobalObject::get() as dynamic;
    
    $runtime = $joo_global_object->jsoo_runtime;
    $String =  String_::get ();
    $make = $String[1];
    $init = $String[2];
    $copy = $String[3];
    $sub = $String[4];
    $fill = $String[5];
    $blit = $String[6];
    $concat = $String[7];
    $iter = $String[8];
    $iteri = $String[9];
    $map = $String[10];
    $mapi = $String[11];
    $trim = $String[12];
    $escaped = $String[13];
    $index = $String[14];
    $index_opt = $String[15];
    $rindex = $String[16];
    $rindex_opt = $String[17];
    $index_from = $String[18];
    $index_from_opt = $String[19];
    $rindex_from = $String[20];
    $rindex_from_opt = $String[21];
    $contains = $String[22];
    $contains_from = $String[23];
    $rcontains_from = $String[24];
    $uppercase = $String[25];
    $lowercase = $String[26];
    $capitalize = $String[27];
    $uncapitalize = $String[28];
    $uppercase_ascii = $String[29];
    $lowercase_ascii = $String[30];
    $capitalize_ascii = $String[31];
    $uncapitalize_ascii = $String[32];
    $compare = $String[33];
    $equal = $String[34];
    $split_on_char = $String[35];
    $StringLabels = Vector{
      0,
      $make,
      $init,
      $copy,
      $sub,
      $fill,
      $blit,
      $concat,
      $iter,
      $iteri,
      $map,
      $mapi,
      $trim,
      $escaped,
      $index,
      $index_opt,
      $rindex,
      $rindex_opt,
      $index_from,
      $index_from_opt,
      $rindex_from,
      $rindex_from_opt,
      $contains,
      $contains_from,
      $rcontains_from,
      $uppercase,
      $lowercase,
      $capitalize,
      $uncapitalize,
      $uppercase_ascii,
      $lowercase_ascii,
      $capitalize_ascii,
      $uncapitalize_ascii,
      $compare,
      $equal,
      $split_on_char
    };
    
     return ($StringLabels);

  }
  public static function make(): dynamic {
    return static::callRehackFunction(static::requireModule()[1], varray[]);
  }
  public static function init(): dynamic {
    return static::callRehackFunction(static::requireModule()[2], varray[]);
  }
  public static function copy(): dynamic {
    return static::callRehackFunction(static::requireModule()[3], varray[]);
  }
  public static function sub(): dynamic {
    return static::callRehackFunction(static::requireModule()[4], varray[]);
  }
  public static function fill(): dynamic {
    return static::callRehackFunction(static::requireModule()[5], varray[]);
  }
  public static function blit(): dynamic {
    return static::callRehackFunction(static::requireModule()[6], varray[]);
  }
  public static function concat(): dynamic {
    return static::callRehackFunction(static::requireModule()[7], varray[]);
  }
  public static function iter(): dynamic {
    return static::callRehackFunction(static::requireModule()[8], varray[]);
  }
  public static function iteri(): dynamic {
    return static::callRehackFunction(static::requireModule()[9], varray[]);
  }
  public static function map(): dynamic {
    return static::callRehackFunction(static::requireModule()[10], varray[]);
  }
  public static function mapi(): dynamic {
    return static::callRehackFunction(static::requireModule()[11], varray[]);
  }
  public static function trim(): dynamic {
    return static::callRehackFunction(static::requireModule()[12], varray[]);
  }
  public static function escaped(): dynamic {
    return static::callRehackFunction(static::requireModule()[13], varray[]);
  }
  public static function index(): dynamic {
    return static::callRehackFunction(static::requireModule()[14], varray[]);
  }
  public static function index_opt(): dynamic {
    return static::callRehackFunction(static::requireModule()[15], varray[]);
  }
  public static function rindex(): dynamic {
    return static::callRehackFunction(static::requireModule()[16], varray[]);
  }
  public static function rindex_opt(): dynamic {
    return static::callRehackFunction(static::requireModule()[17], varray[]);
  }
  public static function index_from(): dynamic {
    return static::callRehackFunction(static::requireModule()[18], varray[]);
  }
  public static function index_from_opt(): dynamic {
    return static::callRehackFunction(static::requireModule()[19], varray[]);
  }
  public static function rindex_from(): dynamic {
    return static::callRehackFunction(static::requireModule()[20], varray[]);
  }
  public static function rindex_from_opt(): dynamic {
    return static::callRehackFunction(static::requireModule()[21], varray[]);
  }
  public static function contains(): dynamic {
    return static::callRehackFunction(static::requireModule()[22], varray[]);
  }
  public static function contains_from(): dynamic {
    return static::callRehackFunction(static::requireModule()[23], varray[]);
  }
  public static function rcontains_from(): dynamic {
    return static::callRehackFunction(static::requireModule()[24], varray[]);
  }
  public static function uppercase(): dynamic {
    return static::callRehackFunction(static::requireModule()[25], varray[]);
  }
  public static function lowercase(): dynamic {
    return static::callRehackFunction(static::requireModule()[26], varray[]);
  }
  public static function capitalize(): dynamic {
    return static::callRehackFunction(static::requireModule()[27], varray[]);
  }
  public static function uncapitalize(): dynamic {
    return static::callRehackFunction(static::requireModule()[28], varray[]);
  }
  public static function uppercase_ascii(): dynamic {
    return static::callRehackFunction(static::requireModule()[29], varray[]);
  }
  public static function lowercase_ascii(): dynamic {
    return static::callRehackFunction(static::requireModule()[30], varray[]);
  }
  public static function capitalize_ascii(): dynamic {
    return static::callRehackFunction(static::requireModule()[31], varray[]);
  }
  public static function uncapitalize_ascii(): dynamic {
    return static::callRehackFunction(static::requireModule()[32], varray[]);
  }
  public static function compare(): dynamic {
    return static::callRehackFunction(static::requireModule()[33], varray[]);
  }
  public static function equal(): dynamic {
    return static::callRehackFunction(static::requireModule()[34], varray[]);
  }
  public static function split_on_char(): dynamic {
    return static::callRehackFunction(static::requireModule()[35], varray[]);
  }

}
/* Hashing disabled */
