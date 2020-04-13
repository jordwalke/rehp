<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class Stdlib__arrayLabels {
  <<__Override, __Memoize>>
  public static function get() : Vector<dynamic> {
    
    $runtime = (\Rehack\GlobalObject::get() as dynamic)->jsoo_runtime;
    
    ;
    
    $Stdlib_array = Stdlib__array::get();
    $make_float = $Stdlib_array[1];
    $init = $Stdlib_array[2];
    $make_matrix = $Stdlib_array[3];
    $create_matrix = $Stdlib_array[4];
    $append = $Stdlib_array[5];
    $concat = $Stdlib_array[6];
    $sub = $Stdlib_array[7];
    $copy = $Stdlib_array[8];
    $fill = $Stdlib_array[9];
    $blit = $Stdlib_array[10];
    $to_list = $Stdlib_array[11];
    $of_list = $Stdlib_array[12];
    $iter = $Stdlib_array[13];
    $iteri = $Stdlib_array[14];
    $map = $Stdlib_array[15];
    $mapi = $Stdlib_array[16];
    $fold_left = $Stdlib_array[17];
    $fold_right = $Stdlib_array[18];
    $iter2 = $Stdlib_array[19];
    $map2 = $Stdlib_array[20];
    $for_all = $Stdlib_array[21];
    $exists = $Stdlib_array[22];
    $mem = $Stdlib_array[23];
    $memq = $Stdlib_array[24];
    $sort = $Stdlib_array[25];
    $stable_sort = $Stdlib_array[26];
    $fast_sort = $Stdlib_array[27];
    $to_seq = $Stdlib_array[28];
    $to_seqi = $Stdlib_array[29];
    $of_seq = $Stdlib_array[30];
    $Floatarray = $Stdlib_array[31];
    $Stdlib_arrayLabels = Vector{
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
      $to_seq,
      $to_seqi,
      $of_seq,
      $Floatarray
    } as dynamic;
    
    return($Stdlib_arrayLabels);

  }

}
/* Hashing disabled */
