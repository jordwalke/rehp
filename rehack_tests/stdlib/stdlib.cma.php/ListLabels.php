<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class ListLabels {
  <<__Override, __Memoize>>
  public static function get() : Vector<dynamic> {
    $joo_global_object = \Rehack\GlobalObject::get() as dynamic;
    
    $runtime = $joo_global_object->jsoo_runtime;
    $List =  List_::get ();
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
    
     return ($ListLabels);

  }
  public static function length() {
    return static::get()[1]();
  }
  public static function hd() {
    return static::get()[2]();
  }
  public static function compare_lengths() {
    return static::get()[3]();
  }
  public static function compare_length_with() {
    return static::get()[4]();
  }
  public static function cons() {
    return static::get()[5]();
  }
  public static function tl() {
    return static::get()[6]();
  }
  public static function nth() {
    return static::get()[7]();
  }
  public static function nth_opt() {
    return static::get()[8]();
  }
  public static function rev() {
    return static::get()[9]();
  }
  public static function init() {
    return static::get()[10]();
  }
  public static function append() {
    return static::get()[11]();
  }
  public static function rev_append() {
    return static::get()[12]();
  }
  public static function concat() {
    return static::get()[13]();
  }
  public static function flatten() {
    return static::get()[14]();
  }
  public static function iter() {
    return static::get()[15]();
  }
  public static function iteri() {
    return static::get()[16]();
  }
  public static function map() {
    return static::get()[17]();
  }
  public static function mapi() {
    return static::get()[18]();
  }
  public static function rev_map() {
    return static::get()[19]();
  }
  public static function fold_left() {
    return static::get()[20]();
  }
  public static function fold_right() {
    return static::get()[21]();
  }
  public static function iter2() {
    return static::get()[22]();
  }
  public static function map2() {
    return static::get()[23]();
  }
  public static function rev_map2() {
    return static::get()[24]();
  }
  public static function fold_left2() {
    return static::get()[25]();
  }
  public static function fold_right2() {
    return static::get()[26]();
  }
  public static function for_all() {
    return static::get()[27]();
  }
  public static function exists() {
    return static::get()[28]();
  }
  public static function for_all2() {
    return static::get()[29]();
  }
  public static function exists2() {
    return static::get()[30]();
  }
  public static function mem() {
    return static::get()[31]();
  }
  public static function memq() {
    return static::get()[32]();
  }
  public static function find() {
    return static::get()[33]();
  }
  public static function find_opt() {
    return static::get()[34]();
  }
  public static function filter() {
    return static::get()[35]();
  }
  public static function find_all() {
    return static::get()[36]();
  }
  public static function partition() {
    return static::get()[37]();
  }
  public static function assoc() {
    return static::get()[38]();
  }
  public static function assoc_opt() {
    return static::get()[39]();
  }
  public static function assq() {
    return static::get()[40]();
  }
  public static function assq_opt() {
    return static::get()[41]();
  }
  public static function mem_assoc() {
    return static::get()[42]();
  }
  public static function mem_assq() {
    return static::get()[43]();
  }
  public static function remove_assoc() {
    return static::get()[44]();
  }
  public static function remove_assq() {
    return static::get()[45]();
  }
  public static function split() {
    return static::get()[46]();
  }
  public static function combine() {
    return static::get()[47]();
  }
  public static function sort() {
    return static::get()[48]();
  }
  public static function stable_sort() {
    return static::get()[49]();
  }
  public static function fast_sort() {
    return static::get()[50]();
  }
  public static function sort_uniq() {
    return static::get()[51]();
  }
  public static function merge() {
    return static::get()[52]();
  }

}
/* Hashing disabled */
