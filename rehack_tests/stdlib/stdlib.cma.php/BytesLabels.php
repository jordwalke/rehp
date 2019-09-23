<?hh
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * BytesLabels.php
 */

namespace Rehack;

final class BytesLabels {
  <<__Memoize>>
  public static function get() {
    $global_object = \Rehack\GlobalObject::get();
    $runtime = \Rehack\Runtime::get();
    /*
     * Soon, these will replace the `global_data->ModuleName`
     * pattern in the load() function.
     */
    $Bytes = Bytes::get();
    BytesLabels::load($global_object);
    $memoized = $runtime->caml_get_global_data()->BytesLabels;
    return $memoized;
  }

  /**
   * Performs module load operation. May have side effects.
   */
  private static function load($joo_global_object) {
    

    $runtime = $joo_global_object->jsoo_runtime;
    $global_data = $runtime["caml_get_global_data"]();
    $Bytes = $global_data["Bytes"];
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
    
    $runtime["caml_register_global"](1, $BytesLabels, "BytesLabels");

  }
}

/*____hashes compiler:hashing-disabled inputs:hashing-disabled bytecode:hashing-disabled*/
