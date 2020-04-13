<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class Stdlib__callback {
  <<__Override, __Memoize>>
  public static function get() : Vector<dynamic> {
    
    $runtime = (\Rehack\GlobalObject::get() as dynamic)->jsoo_runtime;
    $caml_register_named_value = $runtime["caml_register_named_value"];
    $Stdlib_obj = Stdlib__obj::get();
    $register = (dynamic $name, dynamic $v) : dynamic ==> {
      return $caml_register_named_value($name, $v);
    };
    $register_exception = (dynamic $name, dynamic $exn) : dynamic ==> {
      $slot = $runtime["caml_obj_tag"]($exn) === $Stdlib_obj[8]
        ? $exn
        : ($exn[1]);
      return $caml_register_named_value($name, $slot);
    };
    $Stdlib_callback = Vector{0, $register, $register_exception} as dynamic;
    
    return($Stdlib_callback);

  }
  public static function register(dynamic $name, dynamic $v): dynamic {
    return static::syncCall(__FUNCTION__, 1, $name, $v);
  }
  public static function register_exception(dynamic $name, dynamic $exn): dynamic {
    return static::syncCall(__FUNCTION__, 2, $name, $exn);
  }

}
/* Hashing disabled */
