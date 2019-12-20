<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class MoreLabels {
  <<__Override, __Memoize>>
  public static function get() : Vector<dynamic> {
    $joo_global_object = \Rehack\GlobalObject::get() as dynamic;
    
    $runtime = $joo_global_object->jsoo_runtime;
    $Set =  Set::get ();
    $Map =  Map::get ();
    $Hashtbl =  Hashtbl::get ();
    $MoreLabels = Vector{0, $Hashtbl, $Map, $Set};
    
     return ($MoreLabels);

  }
  public static function Hashtbl(): dynamic {
    return static::get()[1]();
  }
  public static function Map(): dynamic {
    return static::get()[2]();
  }
  public static function Set(): dynamic {
    return static::get()[3]();
  }

}
/* Hashing disabled */
