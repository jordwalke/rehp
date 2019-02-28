<?hh
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * Obj.php
 */

namespace Rehack;

final class Obj {
  <<__Memoize>>
  public static function get() {
    $global_object = \Rehack\GlobalObject::get();
    $runtime = \Rehack\Runtime::get();
    /*
     * Soon, these will replace the `global_data->ModuleName`
     * pattern in the load() function.
     */
    $Marshal = Marshal::get();
    $Pervasives = Pervasives::get();
    Obj::load($global_object);
    $memoized = $runtime->caml_get_global_data()->Obj;
    return $memoized;
  }

  /**
   * Performs module load operation. May have side effects.
   */
  private static function load($joo_global_object) {
    

    $runtime = $joo_global_object->jsoo_runtime;
    $is_int = $runtime["is_int"];
    $caml_arity_test = $runtime["caml_arity_test"];
    $caml_new_string = $runtime["caml_new_string"];
    $caml_obj_tag = $runtime["caml_obj_tag"];
    $caml_call1 = function($f, $a0) use ($caml_arity_test,$runtime) {
      return $caml_arity_test($f) == 1
        ? $f($a0)
        : ($runtime["caml_call_gen"]($f, varray[$a0]));
    };
    $caml_call2 = function($f, $a0, $a1) use ($caml_arity_test,$runtime) {
      return $caml_arity_test($f) == 2
        ? $f($a0, $a1)
        : ($runtime["caml_call_gen"]($f, varray[$a0,$a1]));
    };
    $global_data = $runtime["caml_get_global_data"]();
    $cst_Obj_extension_constructor__0 = $caml_new_string(
      "Obj.extension_constructor"
    );
    $cst_Obj_extension_constructor = $caml_new_string(
      "Obj.extension_constructor"
    );
    $Pervasives = $global_data["Pervasives"];
    $Marshal = $global_data["Marshal"];
    $is_block = function($a) use ($is_int) {return 1 - $is_int($a);};
    $double_field = function($x, $i) use ($runtime) {
      return $runtime["caml_array_get"]($x, $i);
    };
    $set_double_field = function($x, $i, $v) use ($runtime) {
      return $runtime["caml_array_set"]($x, $i, $v);
    };
    $marshal = function($obj) use ($runtime) {
      return $runtime["caml_output_value_to_string"]($obj, 0);
    };
    $unmarshal = function($str, $pos) use ($Marshal,$caml_call2) {
      $dv = $pos + $caml_call2($Marshal[8], $str, $pos) | 0;
      return V(0, $caml_call2($Marshal[4], $str, $pos), $dv);
    };
    $first_non_constant_constructor_tag = 0;
    $last_non_constant_constructor_tag = 245;
    $lazy_tag = 246;
    $closure_tag = 247;
    $object_tag = 248;
    $infix_tag = 249;
    $forward_tag = 250;
    $no_scan_tag = 251;
    $abstract_tag = 251;
    $string_tag = 252;
    $double_tag = 253;
    $double_array_tag = 254;
    $custom_tag = 255;
    $int_tag = 1e3;
    $out_of_heap_tag = 1001;
    $unaligned_tag = 1002;
    $extension_constructor = function($x) use ($Pervasives,$caml_call1,$caml_obj_tag,$cst_Obj_extension_constructor,$cst_Obj_extension_constructor__0,$is_block) {
      if ($is_block($x)) {
        if ($caml_obj_tag($x) !== 248) {
          if (1 <= $x->length - 1) {
            $slot = $x[1];
            $switch__0 = 1;
          }
          else {$switch__0 = 0;}
        }
        else {$switch__0 = 0;}
      }
      else {$switch__0 = 0;}
      if (! $switch__0) {$slot = $x;}
      if ($is_block($slot)) {
        if ($caml_obj_tag($slot) === 248) {$name = $slot[1];$switch__1 = 1;}
        else {$switch__1 = 0;}
      }
      else {$switch__1 = 0;}
      if (! $switch__1) {
        $name = $caml_call1($Pervasives[1], $cst_Obj_extension_constructor__0);
      }
      return $caml_obj_tag($name) === 252
        ? $slot
        : ($caml_call1($Pervasives[1], $cst_Obj_extension_constructor));
    };
    $extension_name = function($slot) {return $slot[1];};
    $extension_id = function($slot) {return $slot[2];};
    $length = function($x) {return $x->length - 1 + -2 | 0;};
    $cU = function($du, $dt) use ($runtime) {
      return $runtime["caml_ephe_blit_data"]($du, $dt);
    };
    $cV = function($ds) use ($runtime) {
      return $runtime["caml_ephe_check_data"]($ds);
    };
    $cW = function($dr) use ($runtime) {
      return $runtime["caml_ephe_unset_data"]($dr);
    };
    $cX = function($dq, $dp) use ($runtime) {
      return $runtime["caml_ephe_set_data"]($dq, $dp);
    };
    $cY = function($dn) use ($runtime) {
      return $runtime["caml_ephe_get_data_copy"]($dn);
    };
    $cZ = function($dm) use ($runtime) {
      return $runtime["caml_ephe_get_data"]($dm);
    };
    $c0 = function($dl, $dk, $dj, $di, $dh) use ($runtime) {
      return $runtime["caml_ephe_blit_key"]($dl, $dk, $dj, $di, $dh);
    };
    $c1 = function($dg, $df) use ($runtime) {
      return $runtime["caml_ephe_check_key"]($dg, $df);
    };
    $c2 = function($de, $dd) use ($runtime) {
      return $runtime["caml_ephe_unset_key"]($de, $dd);
    };
    $c3 = function($dc, $db, $da) use ($runtime) {
      return $runtime["caml_ephe_set_key"]($dc, $db, $da);
    };
    $c4 = function($c_, $c9) use ($runtime) {
      return $runtime["caml_ephe_get_key_copy"]($c_, $c9);
    };
    $c5 = function($c8, $c7) use ($runtime) {
      return $runtime["caml_ephe_get_key"]($c8, $c7);
    };
    $Obj = V(
      0,
      $is_block,
      $double_field,
      $set_double_field,
      $first_non_constant_constructor_tag,
      $last_non_constant_constructor_tag,
      $lazy_tag,
      $closure_tag,
      $object_tag,
      $infix_tag,
      $forward_tag,
      $no_scan_tag,
      $abstract_tag,
      $string_tag,
      $double_tag,
      $double_array_tag,
      $custom_tag,
      $custom_tag,
      $int_tag,
      $out_of_heap_tag,
      $unaligned_tag,
      $extension_constructor,
      $extension_name,
      $extension_id,
      $marshal,
      $unmarshal,
      V(
        0,
        function($c6) use ($runtime) {
          return $runtime["caml_ephe_create"]($c6);
        },
        $length,
        $c5,
        $c4,
        $c3,
        $c2,
        $c1,
        $c0,
        $cZ,
        $cY,
        $cX,
        $cW,
        $cV,
        $cU
      )
    );
    
    $runtime["caml_register_global"](4, $Obj, "Obj");

  }
}