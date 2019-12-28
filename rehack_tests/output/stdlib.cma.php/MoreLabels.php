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
    
    $runtime =  (\Rehack\GlobalObject::get() as dynamic)->jsoo_runtime ;
    $Set =  Set::requireModule ();
    $Map =  Map::requireModule ();
    $Hashtbl =  Hashtbl::requireModule ();
    $MoreLabels = Vector{0, $Hashtbl, $Map, $Set} as dynamic;
    
     return ($MoreLabels);

  }

}
/* Hashing disabled */
