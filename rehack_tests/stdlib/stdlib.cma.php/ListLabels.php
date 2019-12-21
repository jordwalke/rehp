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
  public static function length(): dynamic {
    return static::callRehackFunction(static::get()[1], varray[]);
  }
  public static function hd(): dynamic {
    return static::callRehackFunction(static::get()[2], varray[]);
  }
  public static function compare_lengths(): dynamic {
    return static::callRehackFunction(static::get()[3], varray[]);
  }
  public static function compare_length_with(): dynamic {
    return static::callRehackFunction(static::get()[4], varray[]);
  }
  public static function cons(): dynamic {
    return static::callRehackFunction(static::get()[5], varray[]);
  }
  public static function tl(): dynamic {
    return static::callRehackFunction(static::get()[6], varray[]);
  }
  public static function nth(): dynamic {
    return static::callRehackFunction(static::get()[7], varray[]);
  }
  public static function nth_opt(): dynamic {
    return static::callRehackFunction(static::get()[8], varray[]);
  }
  public static function rev(): dynamic {
    return static::callRehackFunction(static::get()[9], varray[]);
  }
  public static function init(): dynamic {
    return static::callRehackFunction(static::get()[10], varray[]);
  }
  public static function append(): dynamic {
    return static::callRehackFunction(static::get()[11], varray[]);
  }
  public static function rev_append(): dynamic {
    return static::callRehackFunction(static::get()[12], varray[]);
  }
  public static function concat(): dynamic {
    return static::callRehackFunction(static::get()[13], varray[]);
  }
  public static function flatten(): dynamic {
    return static::callRehackFunction(static::get()[14], varray[]);
  }
  public static function iter(): dynamic {
    return static::callRehackFunction(static::get()[15], varray[]);
  }
  public static function iteri(): dynamic {
    return static::callRehackFunction(static::get()[16], varray[]);
  }
  public static function map(): dynamic {
    return static::callRehackFunction(static::get()[17], varray[]);
  }
  public static function mapi(): dynamic {
    return static::callRehackFunction(static::get()[18], varray[]);
  }
  public static function rev_map(): dynamic {
    return static::callRehackFunction(static::get()[19], varray[]);
  }
  public static function fold_left(): dynamic {
    return static::callRehackFunction(static::get()[20], varray[]);
  }
  public static function fold_right(): dynamic {
    return static::callRehackFunction(static::get()[21], varray[]);
  }
  public static function iter2(): dynamic {
    return static::callRehackFunction(static::get()[22], varray[]);
  }
  public static function map2(): dynamic {
    return static::callRehackFunction(static::get()[23], varray[]);
  }
  public static function rev_map2(): dynamic {
    return static::callRehackFunction(static::get()[24], varray[]);
  }
  public static function fold_left2(): dynamic {
    return static::callRehackFunction(static::get()[25], varray[]);
  }
  public static function fold_right2(): dynamic {
    return static::callRehackFunction(static::get()[26], varray[]);
  }
  public static function for_all(): dynamic {
    return static::callRehackFunction(static::get()[27], varray[]);
  }
  public static function exists(): dynamic {
    return static::callRehackFunction(static::get()[28], varray[]);
  }
  public static function for_all2(): dynamic {
    return static::callRehackFunction(static::get()[29], varray[]);
  }
  public static function exists2(): dynamic {
    return static::callRehackFunction(static::get()[30], varray[]);
  }
  public static function mem(): dynamic {
    return static::callRehackFunction(static::get()[31], varray[]);
  }
  public static function memq(): dynamic {
    return static::callRehackFunction(static::get()[32], varray[]);
  }
  public static function find(): dynamic {
    return static::callRehackFunction(static::get()[33], varray[]);
  }
  public static function find_opt(): dynamic {
    return static::callRehackFunction(static::get()[34], varray[]);
  }
  public static function filter(): dynamic {
    return static::callRehackFunction(static::get()[35], varray[]);
  }
  public static function find_all(): dynamic {
    return static::callRehackFunction(static::get()[36], varray[]);
  }
  public static function partition(): dynamic {
    return static::callRehackFunction(static::get()[37], varray[]);
  }
  public static function assoc(): dynamic {
    return static::callRehackFunction(static::get()[38], varray[]);
  }
  public static function assoc_opt(): dynamic {
    return static::callRehackFunction(static::get()[39], varray[]);
  }
  public static function assq(): dynamic {
    return static::callRehackFunction(static::get()[40], varray[]);
  }
  public static function assq_opt(): dynamic {
    return static::callRehackFunction(static::get()[41], varray[]);
  }
  public static function mem_assoc(): dynamic {
    return static::callRehackFunction(static::get()[42], varray[]);
  }
  public static function mem_assq(): dynamic {
    return static::callRehackFunction(static::get()[43], varray[]);
  }
  public static function remove_assoc(): dynamic {
    return static::callRehackFunction(static::get()[44], varray[]);
  }
  public static function remove_assq(): dynamic {
    return static::callRehackFunction(static::get()[45], varray[]);
  }
  public static function split(): dynamic {
    return static::callRehackFunction(static::get()[46], varray[]);
  }
  public static function combine(): dynamic {
    return static::callRehackFunction(static::get()[47], varray[]);
  }
  public static function sort(): dynamic {
    return static::callRehackFunction(static::get()[48], varray[]);
  }
  public static function stable_sort(): dynamic {
    return static::callRehackFunction(static::get()[49], varray[]);
  }
  public static function fast_sort(): dynamic {
    return static::callRehackFunction(static::get()[50], varray[]);
  }
  public static function sort_uniq(): dynamic {
    return static::callRehackFunction(static::get()[51], varray[]);
  }
  public static function merge(): dynamic {
    return static::callRehackFunction(static::get()[52], varray[]);
  }

}
/* Hashing disabled */
