<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class Lazy {
  <<__Override, __Memoize>>
  public static function get() : Vector<dynamic> {
    
    $runtime = (\Rehack\GlobalObject::get() as dynamic)->jsoo_runtime;
    $caml_obj_tag = $runtime["caml_obj_tag"];
    $Obj = Obj::get();
    $CamlinternalLazy = CamlinternalLazy::get();
    $Undefined = $CamlinternalLazy[1];
    $force_val = $CamlinternalLazy[5];
    $from_fun = (dynamic $f) ==> {
      $x = $runtime["caml_obj_block"]($Obj[6], 1);
      $x[1] = $f;
      return $x;
    };
    $from_val = (dynamic $v) ==> {
      $t = $caml_obj_tag($v);
      if ($t !== $Obj[10]) {
        if ($t !== $Obj[6]) {if ($t !== $Obj[14]) {return $v;}}
      }
      return $runtime["caml_lazy_make_forward"]($v);
    };
    $is_val = (dynamic $l) ==> {
      return $caml_obj_tag($l) !== $Obj[6] ? 1 : (0);
    };
    $Lazy = Vector{
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
    
    return($Lazy);

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
