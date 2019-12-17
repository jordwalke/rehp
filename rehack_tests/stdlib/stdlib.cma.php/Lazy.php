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
    $joo_global_object = \Rehack\GlobalObject::get() as dynamic;
    
    $runtime = $joo_global_object->jsoo_runtime;
    $caml_obj_tag = $runtime["caml_obj_tag"];
    $Obj =  Obj::get ();
    $CamlinternalLazy =  CamlinternalLazy::get ();
    $Undefined = $CamlinternalLazy[1];
    $force_val = $CamlinternalLazy[5];
    $from_fun = function(dynamic $f) use ($Obj,$runtime) {
      $x = $runtime["caml_obj_block"]($Obj[6], 1);
      $x[1] = $f;
      return $x;
    };
    $from_val = function(dynamic $v) use ($Obj,$caml_obj_tag,$runtime) {
      $t = $caml_obj_tag($v);
      if ($t !== $Obj[10]) {
        if ($t !== $Obj[6]) {if ($t !== $Obj[14]) {return $v;}}
      }
      return $runtime["caml_lazy_make_forward"]($v);
    };
    $is_val = function(dynamic $l) use ($Obj,$caml_obj_tag) {
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
    };
    
     return ($Lazy);

  }
  public static function is_val(dynamic $l) {
    return static::get()[8]($l);
  }
  public static function from_val(dynamic $v) {
    return static::get()[7]($v);
  }
  public static function from_fun(dynamic $f) {
    return static::get()[6]($f);
  }
  public static function is_val(dynamic $l) {
    return static::get()[5]($l);
  }
  public static function from_val(dynamic $v) {
    return static::get()[4]($v);
  }
  public static function from_fun(dynamic $f) {
    return static::get()[3]($f);
  }
  public static function force_val() {
    return static::get()[2]();
  }
  public static function Undefined() {
    return static::get()[1]();
  }

}
/* Hashing disabled */
