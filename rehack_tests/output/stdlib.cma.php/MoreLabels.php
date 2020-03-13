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
    
    $runtime = (\Rehack\GlobalObject::get() as dynamic)->jsoo_runtime;
    
    ;
    
    $Set = Set::get();
    $Map = Map::get();
    $Hashtbl = Hashtbl::get();
    $MoreLabels = Vector{0, $Hashtbl, $Map, $Set} as dynamic;
    
    return($MoreLabels);

  }

}
/* Hashing disabled */
