<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class MoreLabels {
  <<__Override, __Memoize>>
  public static function requireModule() : Vector<dynamic> {
    $joo_global_object = \Rehack\GlobalObject::get() as dynamic;
    
    $runtime = $joo_global_object->jsoo_runtime;
    $Set =  Set::get ();
    $Map =  Map::get ();
    $Hashtbl =  Hashtbl::get ();
    $MoreLabels = Vector{0, $Hashtbl, $Map, $Set};
    
     return ($MoreLabels);

  }
  public static function Hashtbl(): dynamic {
    return static::callRehackFunction(static::requireModule()[1], varray[]);
  }
  public static function Map(): dynamic {
    return static::callRehackFunction(static::requireModule()[2], varray[]);
  }
  public static function Set(): dynamic {
    return static::callRehackFunction(static::requireModule()[3], varray[]);
  }

}
/* Hashing disabled */
