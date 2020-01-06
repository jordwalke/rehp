<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class CamlinternalMod {
  <<__Override, __Memoize>>
  public static function get() : Vector<dynamic> {
    
    $runtime = (\Rehack\GlobalObject::get() as dynamic)->jsoo_runtime;
    $update_mod = $runtime["caml_CamlinternalMod_update_mod"];
    $init_mod = $runtime["caml_CamlinternalMod_init_mod"];
    $CamlinternalMod = Vector{0, $init_mod, $update_mod} as dynamic;
    
    return($CamlinternalMod);

  }

}
/* Hashing disabled */
