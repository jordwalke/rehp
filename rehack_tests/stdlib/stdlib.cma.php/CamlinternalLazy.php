<?hh
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * CamlinternalLazy.php
 */

namespace Rehack;

final class CamlinternalLazy {
  <<__Memoize>>
  public static function get() {
    $global_object = \Rehack\GlobalObject::get();
    $runtime = \Rehack\Runtime::get();
    /*
     * Soon, these will replace the `global_data->ModuleName`
     * pattern in the load() function.
     */
    $Obj = Obj::get();
    CamlinternalLazy::load($global_object);
    $memoized = $runtime->caml_get_global_data()->CamlinternalLazy;
    return $memoized;
  }

  /**
   * Performs module load operation. May have side effects.
   */
  private static function load($joo_global_object) {
    

    $runtime = $joo_global_object->jsoo_runtime;
    $caml_arity_test = $runtime["caml_arity_test"];
    $caml_new_string = $runtime["caml_new_string"];
    $caml_obj_set_tag = $runtime["caml_obj_set_tag"];
    $caml_obj_tag = $runtime["caml_obj_tag"];
    $caml_wrap_exception = $runtime["caml_wrap_exception"];
    $caml_call1 = function($f, $a0) use ($caml_arity_test,$runtime) {
      return $caml_arity_test($f) == 1
        ? $f($a0)
        : ($runtime["caml_call_gen"]($f, varray[$a0]));
    };
    $global_data = $runtime["caml_get_global_data"]();
    $cst_CamlinternalLazy_Undefined = $caml_new_string(
      "CamlinternalLazy.Undefined"
    );
    $Obj = $global_data["Obj"];
    $Undefined = Vector{
      248,
      $cst_CamlinternalLazy_Undefined,
      $runtime["caml_fresh_oo_id"](0)
    };
    $raise_undefined = function($param) use ($Undefined,$runtime) {
      throw $runtime["caml_wrap_thrown_exception"]($Undefined);
    };
    $force_lazy_block = function($blk) use ($Obj,$caml_call1,$caml_obj_set_tag,$caml_wrap_exception,$raise_undefined,$runtime) {
      $closure = $blk[1];
      $blk[1] = $raise_undefined;
      try {
        $result = $caml_call1($closure, 0);
        $blk[1] = $result;
        $caml_obj_set_tag($blk, $Obj[10]);
        return $result;
      }
      catch(\Throwable $e) {
        $e = $caml_wrap_exception($e);
        $blk[1] =
          function($param) use ($e,$runtime) {
            throw $runtime["caml_wrap_thrown_exception_reraise"]($e);
          };
        throw $runtime["caml_wrap_thrown_exception_reraise"]($e);
      }
    };
    $force_val_lazy_block = function($blk) use ($Obj,$caml_call1,$caml_obj_set_tag,$raise_undefined) {
      $closure = $blk[1];
      $blk[1] = $raise_undefined;
      $result = $caml_call1($closure, 0);
      $blk[1] = $result;
      $caml_obj_set_tag($blk, $Obj[10]);
      return $result;
    };
    $force = function($lzv) use ($Obj,$caml_obj_tag,$force_lazy_block) {
      $t = $caml_obj_tag($lzv);
      return $t === $Obj[10]
        ? $lzv[1]
        : ($t !== $Obj[6] ? $lzv : ($force_lazy_block($lzv)));
    };
    $force_val = function($lzv) use ($Obj,$caml_obj_tag,$force_val_lazy_block) {
      $t = $caml_obj_tag($lzv);
      return $t === $Obj[10]
        ? $lzv[1]
        : ($t !== $Obj[6] ? $lzv : ($force_val_lazy_block($lzv)));
    };
    $CamlinternalLazy = Vector{
      0,
      $Undefined,
      $force_lazy_block,
      $force_val_lazy_block,
      $force,
      $force_val
    };
    
    $runtime["caml_register_global"](2, $CamlinternalLazy, "CamlinternalLazy");

  }
}