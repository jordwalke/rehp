<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class Callback {
  <<__Override, __Memoize>>
  public static function get() : Vector<dynamic> {
    $joo_global_object = \Rehack\GlobalObject::get() as dynamic;
    
    $runtime = $joo_global_object->jsoo_runtime;
    $caml_register_named_value = $runtime["caml_register_named_value"];
    $Obj =  Obj::get ();
    $register = (dynamic $name, dynamic $v) ==> {
      return $caml_register_named_value($name, $v);
    };
    $register_exception = (dynamic $name, dynamic $exn) ==> {
      $slot = $runtime["caml_obj_tag"]($exn) === $Obj[8] ? $exn : ($exn[1]);
      return $caml_register_named_value($name, $slot);
    };
    $Callback = Vector{0, $register, $register_exception};
    
     return ($Callback);

  }
  public static function register(dynamic $name, dynamic $v): dynamic {
    return static::get()[1]($name, $v);
  }
  public static function register_exception(dynamic $name, dynamic $exn): dynamic {
    return static::get()[2]($name, $exn);
  }

}
/* Hashing disabled */
