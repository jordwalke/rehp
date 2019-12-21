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
    $joo_global_object = \Rehack\GlobalObject::get() as dynamic;
    
    $runtime = $joo_global_object->jsoo_runtime;
    $update_mod = $runtime["caml_CamlinternalMod_update_mod"];
    $init_mod = $runtime["caml_CamlinternalMod_init_mod"];
    $CamlinternalMod = Vector{0, $init_mod, $update_mod};
    
     return ($CamlinternalMod);

  }
  public static function init_mod(): dynamic {
    return static::callRehackFunction(static::get()[1], varray[]);
  }
  public static function update_mod(): dynamic {
    return static::callRehackFunction(static::get()[2], varray[]);
  }

}
/* Hashing disabled */
