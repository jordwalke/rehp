<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class BytesLabels {
  <<__Override, __Memoize>>
  public static function requireModule() : Vector<dynamic> {
    $joo_global_object = \Rehack\GlobalObject::get() as dynamic;
    
    $runtime = $joo_global_object->jsoo_runtime;
    $Bytes =  Bytes::requireModule ();
    $make = $Bytes[1];
    $init = $Bytes[2];
    $empty = $Bytes[3];
    $copy = $Bytes[4];
    $of_string = $Bytes[5];
    $to_string = $Bytes[6];
    $sub = $Bytes[7];
    $sub_string = $Bytes[8];
    $extend = $Bytes[9];
    $fill = $Bytes[10];
    $blit = $Bytes[11];
    $blit_string = $Bytes[12];
    $concat = $Bytes[13];
    $cat = $Bytes[14];
    $iter = $Bytes[15];
    $iteri = $Bytes[16];
    $map = $Bytes[17];
    $mapi = $Bytes[18];
    $trim = $Bytes[19];
    $escaped = $Bytes[20];
    $index = $Bytes[21];
    $index_opt = $Bytes[22];
    $rindex = $Bytes[23];
    $rindex_opt = $Bytes[24];
    $index_from = $Bytes[25];
    $index_from_opt = $Bytes[26];
    $rindex_from = $Bytes[27];
    $rindex_from_opt = $Bytes[28];
    $contains = $Bytes[29];
    $contains_from = $Bytes[30];
    $rcontains_from = $Bytes[31];
    $uppercase = $Bytes[32];
    $lowercase = $Bytes[33];
    $capitalize = $Bytes[34];
    $uncapitalize = $Bytes[35];
    $uppercase_ascii = $Bytes[36];
    $lowercase_ascii = $Bytes[37];
    $capitalize_ascii = $Bytes[38];
    $uncapitalize_ascii = $Bytes[39];
    $compare = $Bytes[40];
    $equal = $Bytes[41];
    $unsafe_to_string = $Bytes[42];
    $unsafe_of_string = $Bytes[43];
    $BytesLabels = Vector{
      0,
      $make,
      $init,
      $empty,
      $copy,
      $of_string,
      $to_string,
      $sub,
      $sub_string,
      $extend,
      $fill,
      $blit,
      $blit_string,
      $concat,
      $cat,
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
      $unsafe_to_string,
      $unsafe_of_string
    };
    
     return ($BytesLabels);

  }
  public static function make(): dynamic {
    return static::callRehackFunction(static::requireModule()[1], varray[]);
  }
  public static function init(): dynamic {
    return static::callRehackFunction(static::requireModule()[2], varray[]);
  }
  public static function empty(): dynamic {
    return static::callRehackFunction(static::requireModule()[3], varray[]);
  }
  public static function copy(): dynamic {
    return static::callRehackFunction(static::requireModule()[4], varray[]);
  }
  public static function of_string(): dynamic {
    return static::callRehackFunction(static::requireModule()[5], varray[]);
  }
  public static function to_string(): dynamic {
    return static::callRehackFunction(static::requireModule()[6], varray[]);
  }
  public static function sub(): dynamic {
    return static::callRehackFunction(static::requireModule()[7], varray[]);
  }
  public static function sub_string(): dynamic {
    return static::callRehackFunction(static::requireModule()[8], varray[]);
  }
  public static function extend(): dynamic {
    return static::callRehackFunction(static::requireModule()[9], varray[]);
  }
  public static function fill(): dynamic {
    return static::callRehackFunction(static::requireModule()[10], varray[]);
  }
  public static function blit(): dynamic {
    return static::callRehackFunction(static::requireModule()[11], varray[]);
  }
  public static function blit_string(): dynamic {
    return static::callRehackFunction(static::requireModule()[12], varray[]);
  }
  public static function concat(): dynamic {
    return static::callRehackFunction(static::requireModule()[13], varray[]);
  }
  public static function cat(): dynamic {
    return static::callRehackFunction(static::requireModule()[14], varray[]);
  }
  public static function iter(): dynamic {
    return static::callRehackFunction(static::requireModule()[15], varray[]);
  }
  public static function iteri(): dynamic {
    return static::callRehackFunction(static::requireModule()[16], varray[]);
  }
  public static function map(): dynamic {
    return static::callRehackFunction(static::requireModule()[17], varray[]);
  }
  public static function mapi(): dynamic {
    return static::callRehackFunction(static::requireModule()[18], varray[]);
  }
  public static function trim(): dynamic {
    return static::callRehackFunction(static::requireModule()[19], varray[]);
  }
  public static function escaped(): dynamic {
    return static::callRehackFunction(static::requireModule()[20], varray[]);
  }
  public static function index(): dynamic {
    return static::callRehackFunction(static::requireModule()[21], varray[]);
  }
  public static function index_opt(): dynamic {
    return static::callRehackFunction(static::requireModule()[22], varray[]);
  }
  public static function rindex(): dynamic {
    return static::callRehackFunction(static::requireModule()[23], varray[]);
  }
  public static function rindex_opt(): dynamic {
    return static::callRehackFunction(static::requireModule()[24], varray[]);
  }
  public static function index_from(): dynamic {
    return static::callRehackFunction(static::requireModule()[25], varray[]);
  }
  public static function index_from_opt(): dynamic {
    return static::callRehackFunction(static::requireModule()[26], varray[]);
  }
  public static function rindex_from(): dynamic {
    return static::callRehackFunction(static::requireModule()[27], varray[]);
  }
  public static function rindex_from_opt(): dynamic {
    return static::callRehackFunction(static::requireModule()[28], varray[]);
  }
  public static function contains(): dynamic {
    return static::callRehackFunction(static::requireModule()[29], varray[]);
  }
  public static function contains_from(): dynamic {
    return static::callRehackFunction(static::requireModule()[30], varray[]);
  }
  public static function rcontains_from(): dynamic {
    return static::callRehackFunction(static::requireModule()[31], varray[]);
  }
  public static function uppercase(): dynamic {
    return static::callRehackFunction(static::requireModule()[32], varray[]);
  }
  public static function lowercase(): dynamic {
    return static::callRehackFunction(static::requireModule()[33], varray[]);
  }
  public static function capitalize(): dynamic {
    return static::callRehackFunction(static::requireModule()[34], varray[]);
  }
  public static function uncapitalize(): dynamic {
    return static::callRehackFunction(static::requireModule()[35], varray[]);
  }
  public static function uppercase_ascii(): dynamic {
    return static::callRehackFunction(static::requireModule()[36], varray[]);
  }
  public static function lowercase_ascii(): dynamic {
    return static::callRehackFunction(static::requireModule()[37], varray[]);
  }
  public static function capitalize_ascii(): dynamic {
    return static::callRehackFunction(static::requireModule()[38], varray[]);
  }
  public static function uncapitalize_ascii(): dynamic {
    return static::callRehackFunction(static::requireModule()[39], varray[]);
  }
  public static function compare(): dynamic {
    return static::callRehackFunction(static::requireModule()[40], varray[]);
  }
  public static function equal(): dynamic {
    return static::callRehackFunction(static::requireModule()[41], varray[]);
  }
  public static function unsafe_to_string(): dynamic {
    return static::callRehackFunction(static::requireModule()[42], varray[]);
  }
  public static function unsafe_of_string(): dynamic {
    return static::callRehackFunction(static::requireModule()[43], varray[]);
  }

}
/* Hashing disabled */
