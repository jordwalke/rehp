<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class Oo {
  <<__Override, __Memoize>>
  public static function requireModule() : Vector<dynamic> {
    $joo_global_object = \Rehack\GlobalObject::get() as dynamic;
    
    $runtime = $joo_global_object->jsoo_runtime;
    
    ;
    
    $CamlinternalOO =  CamlinternalOO::requireModule ();
    $copy = $CamlinternalOO[22];
    $new_method = $CamlinternalOO[1];
    $public_method_label = $CamlinternalOO[1];
    $Oo = Vector{0, $copy, $new_method, $public_method_label} as dynamic;
    
     return ($Oo);

  }

}
/* Hashing disabled */
