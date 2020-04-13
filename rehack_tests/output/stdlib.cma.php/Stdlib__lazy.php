<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class Stdlib__lazy {
  <<__Override, __Memoize>>
  public static function get() : Vector<dynamic> {
    
    $runtime = (\Rehack\GlobalObject::get() as dynamic)->jsoo_runtime;
    $caml_obj_tag = $runtime["caml_obj_tag"];
    $Stdlib_obj = Stdlib__obj::get();
    $CamlinternalLazy = CamlinternalLazy::get();
    $Undefined = $CamlinternalLazy[1];
    $force_val = $CamlinternalLazy[5];
    $from_fun = (dynamic $f) : dynamic ==> {
      $x = $runtime["caml_obj_block"]($Stdlib_obj[6], 1);
      $x[1] = $f;
      return $x;
    };
    $from_val = (dynamic $v) : dynamic ==> {
      $t = $caml_obj_tag($v);
      if ($t !== $Stdlib_obj[10]) {
        if ($t !== $Stdlib_obj[6]) {if ($t !== $Stdlib_obj[14]) {return $v;}}
      }
      return $runtime["caml_lazy_make_forward"]($v);
    };
    $is_val = (dynamic $l) : dynamic ==> {
      return $caml_obj_tag($l) !== $Stdlib_obj[6] ? 1 : (0);
    };
    $Stdlib_lazy = Vector{
      0,
      $Undefined,
      $force_val,
      $from_fun,
      $from_val,
      $is_val,
      $from_fun,
      $from_val,
      $is_val
    } as dynamic;
    
    return($Stdlib_lazy);

  }
  public static function from_fun(dynamic $f): dynamic {
    return static::syncCall(__FUNCTION__, 3, $f);
  }
  public static function from_val(dynamic $v): dynamic {
    return static::syncCall(__FUNCTION__, 4, $v);
  }
  public static function is_val(dynamic $l): dynamic {
    return static::syncCall(__FUNCTION__, 5, $l);
  }

}
/* Hashing disabled */
