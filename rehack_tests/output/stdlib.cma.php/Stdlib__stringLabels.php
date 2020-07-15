<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class Stdlib__stringLabels {
  <<__Override, __Memoize>>
  public static function get() : Vector<dynamic> {
    
    $runtime = (\Rehack\GlobalObject::get() as dynamic)->jsoo_runtime;
    $Stdlib_string = Stdlib__string::get();
    $make = $Stdlib_string[1];
    $init = $Stdlib_string[2];
    $copy = $Stdlib_string[3];
    $sub = $Stdlib_string[4];
    $fill = $Stdlib_string[5];
    $blit = $Stdlib_string[6];
    $concat = $Stdlib_string[7];
    $iter = $Stdlib_string[8];
    $iteri = $Stdlib_string[9];
    $map = $Stdlib_string[10];
    $mapi = $Stdlib_string[11];
    $trim = $Stdlib_string[12];
    $escaped = $Stdlib_string[13];
    $index = $Stdlib_string[14];
    $index_opt = $Stdlib_string[15];
    $rindex = $Stdlib_string[16];
    $rindex_opt = $Stdlib_string[17];
    $index_from = $Stdlib_string[18];
    $index_from_opt = $Stdlib_string[19];
    $rindex_from = $Stdlib_string[20];
    $rindex_from_opt = $Stdlib_string[21];
    $contains = $Stdlib_string[22];
    $contains_from = $Stdlib_string[23];
    $rcontains_from = $Stdlib_string[24];
    $uppercase = $Stdlib_string[25];
    $lowercase = $Stdlib_string[26];
    $capitalize = $Stdlib_string[27];
    $uncapitalize = $Stdlib_string[28];
    $uppercase_ascii = $Stdlib_string[29];
    $lowercase_ascii = $Stdlib_string[30];
    $capitalize_ascii = $Stdlib_string[31];
    $uncapitalize_ascii = $Stdlib_string[32];
    $compare = $Stdlib_string[33];
    $equal = $Stdlib_string[34];
    $split_on_char = $Stdlib_string[35];
    $to_seq = $Stdlib_string[36];
    $to_seqi = $Stdlib_string[37];
    $of_seq = $Stdlib_string[38];
    $Stdlib_stringLabels = Vector{
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
      $split_on_char,
      $to_seq,
      $to_seqi,
      $of_seq
    } as dynamic;
    
    return($Stdlib_stringLabels);

  }

}
/* Hashing disabled */
