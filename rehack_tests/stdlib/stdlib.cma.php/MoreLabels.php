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
    
    ;
    
    $Set =  Set::requireModule ();
    $Map =  Map::requireModule ();
    $Hashtbl =  Hashtbl::requireModule ();
    $MoreLabels = Vector{0, $Hashtbl, $Map, $Set} as dynamic;
    
     return ($MoreLabels);

  }

}
/* Hashing disabled */
