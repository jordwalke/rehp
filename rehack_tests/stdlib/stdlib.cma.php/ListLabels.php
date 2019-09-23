<?hh
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * ListLabels.php
 */

namespace Rehack;

final class ListLabels {
  <<__Memoize>>
  public static function get() {
    $global_object = \Rehack\GlobalObject::get();
    $runtime = \Rehack\Runtime::get();
    /*
     * Soon, these will replace the `global_data->ModuleName`
     * pattern in the load() function.
     */
    $List_ = List_::get();
    ListLabels::load($global_object);
    $memoized = $runtime->caml_get_global_data()->ListLabels;
    return $memoized;
  }

  /**
   * Performs module load operation. May have side effects.
   */
  private static function load($joo_global_object) {
    

    $runtime = $joo_global_object->jsoo_runtime;
    $global_data = $runtime["caml_get_global_data"]();
    $List = $global_data["List_"];
    $length = $List[1];
    $compare_lengths = $List[2];
    $compare_length_with = $List[3];
    $cons = $List[4];
    $hd = $List[5];
    $tl = $List[6];
    $nth = $List[7];
    $nth_opt = $List[8];
    $rev = $List[9];
    $init = $List[10];
    $append = $List[11];
    $rev_append = $List[12];
    $concat = $List[13];
    $flatten = $List[14];
    $iter = $List[15];
    $iteri = $List[16];
    $map = $List[17];
    $mapi = $List[18];
    $rev_map = $List[19];
    $fold_left = $List[20];
    $fold_right = $List[21];
    $iter2 = $List[22];
    $map2 = $List[23];
    $rev_map2 = $List[24];
    $fold_left2 = $List[25];
    $fold_right2 = $List[26];
    $for_all = $List[27];
    $exists = $List[28];
    $for_all2 = $List[29];
    $exists2 = $List[30];
    $mem = $List[31];
    $memq = $List[32];
    $find = $List[33];
    $find_opt = $List[34];
    $filter = $List[35];
    $find_all = $List[36];
    $partition = $List[37];
    $assoc = $List[38];
    $assoc_opt = $List[39];
    $assq = $List[40];
    $assq_opt = $List[41];
    $mem_assoc = $List[42];
    $mem_assq = $List[43];
    $remove_assoc = $List[44];
    $remove_assq = $List[45];
    $split = $List[46];
    $combine = $List[47];
    $sort = $List[48];
    $stable_sort = $List[49];
    $fast_sort = $List[50];
    $sort_uniq = $List[51];
    $merge = $List[52];
    $ListLabels = Vector{
      0,
      $length,
      $hd,
      $compare_lengths,
      $compare_length_with,
      $cons,
      $tl,
      $nth,
      $nth_opt,
      $rev,
      $init,
      $append,
      $rev_append,
      $concat,
      $flatten,
      $iter,
      $iteri,
      $map,
      $mapi,
      $rev_map,
      $fold_left,
      $fold_right,
      $iter2,
      $map2,
      $rev_map2,
      $fold_left2,
      $fold_right2,
      $for_all,
      $exists,
      $for_all2,
      $exists2,
      $mem,
      $memq,
      $find,
      $find_opt,
      $filter,
      $find_all,
      $partition,
      $assoc,
      $assoc_opt,
      $assq,
      $assq_opt,
      $mem_assoc,
      $mem_assq,
      $remove_assoc,
      $remove_assq,
      $split,
      $combine,
      $sort,
      $stable_sort,
      $fast_sort,
      $sort_uniq,
      $merge
    };
    
    $runtime["caml_register_global"](1, $ListLabels, "ListLabels");

  }
}

