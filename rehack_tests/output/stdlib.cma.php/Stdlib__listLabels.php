<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class Stdlib__listLabels {
  <<__Override, __Memoize>>
  public static function get() : Vector<dynamic> {
    
    $runtime = (\Rehack\GlobalObject::get() as dynamic)->jsoo_runtime;
    $Stdlib_list = Stdlib__list::get();
    $length = $Stdlib_list[1];
    $compare_lengths = $Stdlib_list[2];
    $compare_length_with = $Stdlib_list[3];
    $cons = $Stdlib_list[4];
    $hd = $Stdlib_list[5];
    $tl = $Stdlib_list[6];
    $nth = $Stdlib_list[7];
    $nth_opt = $Stdlib_list[8];
    $rev = $Stdlib_list[9];
    $init = $Stdlib_list[10];
    $append = $Stdlib_list[11];
    $rev_append = $Stdlib_list[12];
    $concat = $Stdlib_list[13];
    $flatten = $Stdlib_list[14];
    $iter = $Stdlib_list[15];
    $iteri = $Stdlib_list[16];
    $map = $Stdlib_list[17];
    $mapi = $Stdlib_list[18];
    $rev_map = $Stdlib_list[19];
    $filter_map = $Stdlib_list[20];
    $fold_left = $Stdlib_list[21];
    $fold_right = $Stdlib_list[22];
    $iter2 = $Stdlib_list[23];
    $map2 = $Stdlib_list[24];
    $rev_map2 = $Stdlib_list[25];
    $fold_left2 = $Stdlib_list[26];
    $fold_right2 = $Stdlib_list[27];
    $for_all = $Stdlib_list[28];
    $exists = $Stdlib_list[29];
    $for_all2 = $Stdlib_list[30];
    $exists2 = $Stdlib_list[31];
    $mem = $Stdlib_list[32];
    $memq = $Stdlib_list[33];
    $find = $Stdlib_list[34];
    $find_opt = $Stdlib_list[35];
    $filter = $Stdlib_list[36];
    $find_all = $Stdlib_list[37];
    $partition = $Stdlib_list[38];
    $assoc = $Stdlib_list[39];
    $assoc_opt = $Stdlib_list[40];
    $assq = $Stdlib_list[41];
    $assq_opt = $Stdlib_list[42];
    $mem_assoc = $Stdlib_list[43];
    $mem_assq = $Stdlib_list[44];
    $remove_assoc = $Stdlib_list[45];
    $remove_assq = $Stdlib_list[46];
    $split = $Stdlib_list[47];
    $combine = $Stdlib_list[48];
    $sort = $Stdlib_list[49];
    $stable_sort = $Stdlib_list[50];
    $fast_sort = $Stdlib_list[51];
    $sort_uniq = $Stdlib_list[52];
    $merge = $Stdlib_list[53];
    $to_seq = $Stdlib_list[54];
    $of_seq = $Stdlib_list[55];
    $Stdlib_listLabels = Vector{
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
      $filter_map,
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
      $merge,
      $to_seq,
      $of_seq
    } as dynamic;
    
    return($Stdlib_listLabels);

  }

}
/* Hashing disabled */
