<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class Stdlib__oo {
  <<__Override, __Memoize>>
  public static function get() : Vector<dynamic> {
    
    $runtime = (\Rehack\GlobalObject::get() as dynamic)->jsoo_runtime;
    $CamlinternalOO = CamlinternalOO::get();
    $copy = $CamlinternalOO[22];
    $new_method = $CamlinternalOO[1];
    $public_method_label = $CamlinternalOO[1];
    $Stdlib_oo = Vector{0, $copy, $new_method, $public_method_label} as dynamic;
    
    return($Stdlib_oo);

  }

}
/* Hashing disabled */
