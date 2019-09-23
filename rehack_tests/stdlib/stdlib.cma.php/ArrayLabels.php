<?hh
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * ArrayLabels.php
 */

namespace Rehack;

final class ArrayLabels {
  <<__Memoize>>
  public static function get() {
    $global_object = \Rehack\GlobalObject::get();
    $runtime = \Rehack\Runtime::get();
    /*
     * Soon, these will replace the `global_data->ModuleName`
     * pattern in the load() function.
     */
    $Array_ = Array_::get();
    ArrayLabels::load($global_object);
    $memoized = $runtime->caml_get_global_data()->ArrayLabels;
    return $memoized;
  }

  /**
   * Performs module load operation. May have side effects.
   */
  private static function load($joo_global_object) {
    

    $runtime = $joo_global_object->jsoo_runtime;
    $global_data = $runtime["caml_get_global_data"]();
    $Array = $global_data["Array_"];
    $make_float = $Array[1];
    $init = $Array[2];
    $make_matrix = $Array[3];
    $create_matrix = $Array[4];
    $append = $Array[5];
    $concat = $Array[6];
    $sub = $Array[7];
    $copy = $Array[8];
    $fill = $Array[9];
    $blit = $Array[10];
    $to_list = $Array[11];
    $of_list = $Array[12];
    $iter = $Array[13];
    $iteri = $Array[14];
    $map = $Array[15];
    $mapi = $Array[16];
    $fold_left = $Array[17];
    $fold_right = $Array[18];
    $iter2 = $Array[19];
    $map2 = $Array[20];
    $for_all = $Array[21];
    $exists = $Array[22];
    $mem = $Array[23];
    $memq = $Array[24];
    $sort = $Array[25];
    $stable_sort = $Array[26];
    $fast_sort = $Array[27];
    $Floatarray = $Array[28];
    $ArrayLabels = Vector{
      0,
      $init,
      $make_matrix,
      $create_matrix,
      $append,
      $concat,
      $sub,
      $copy,
      $fill,
      $blit,
      $to_list,
      $of_list,
      $iter,
      $map,
      $iteri,
      $mapi,
      $fold_left,
      $fold_right,
      $iter2,
      $map2,
      $exists,
      $for_all,
      $mem,
      $memq,
      $make_float,
      $sort,
      $stable_sort,
      $fast_sort,
      $Floatarray
    };
    
    $runtime["caml_register_global"](1, $ArrayLabels, "ArrayLabels");

  }
}

