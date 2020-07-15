<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class Stdlib__moreLabels {
  <<__Override, __Memoize>>
  public static function get() : Vector<dynamic> {
    
    $runtime = (\Rehack\GlobalObject::get() as dynamic)->jsoo_runtime;
    $Stdlib_set = Stdlib__set::get();
    $Stdlib_map = Stdlib__map::get();
    $Stdlib_hashtbl = Stdlib__hashtbl::get();
    $Stdlib_moreLabels = Vector{0, $Stdlib_hashtbl, $Stdlib_map, $Stdlib_set} as dynamic;
    
    return($Stdlib_moreLabels);

  }

}
/* Hashing disabled */
