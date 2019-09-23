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
    $call1 = $runtime["caml_call1"];
    $call2 = $runtime["caml_call2"];
    $string = $runtime["caml_new_string"];
    $caml_obj_tag = $runtime["caml_obj_tag"];
    $is_int = $runtime["is_int"];
    $global_data = $runtime["caml_get_global_data"]();
    $cst_Obj_extension_constructor__0 = $string("Obj.extension_constructor");
    $cst_Obj_extension_constructor = $string("Obj.extension_constructor");
    $Pervasives = $global_data["Pervasives"];
    $Marshal = $global_data["Marshal"];
    $is_block = function(dynamic $a) use ($is_int) {return 1 - $is_int($a);};
    $double_field = function(dynamic $x, dynamic $i) use ($runtime) {
      return $runtime["caml_array_get"]($x, $i);
    };
    $set_double_field = function(dynamic $x, dynamic $i, dynamic $v) use ($runtime) {
      return $runtime["caml_array_set"]($x, $i, $v);
    };
    $marshal = function(dynamic $obj) use ($runtime) {
      return $runtime["caml_output_value_to_string"]($obj, 0);
    };
    $unmarshal = function(dynamic $str, dynamic $pos) use ($Marshal,$call2) {
      $L = (int) ($pos + $call2($Marshal[8], $str, $pos));
      return Vector{0, $call2($Marshal[4], $str, $pos), $L};
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
    $int_tag = 1000;
    $out_of_heap_tag = 1001;
    $unaligned_tag = 1002;
    $extension_constructor = function(dynamic $x) use ($Pervasives,$call1,$caml_obj_tag,$cst_Obj_extension_constructor,$cst_Obj_extension_constructor__0,$is_block) {
      if ($is_block($x)) {
        if ($caml_obj_tag($x) !== 248) {
          if (1 <= $x->count() - 1) {
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
        $name = $call1($Pervasives[1], $cst_Obj_extension_constructor__0);
      }
      return $caml_obj_tag($name) === 252
        ? $slot
        : ($call1($Pervasives[1], $cst_Obj_extension_constructor));
    };
    $extension_name = function(dynamic $slot) {return $slot[1];};
    $extension_id = function(dynamic $slot) {return $slot[2];};
    $length = function(dynamic $x) {return (int) ($x->count() - 1 + -2);};
    $a = function(dynamic $K, dynamic $J) use ($runtime) {
      return $runtime["caml_ephe_blit_data"]($K, $J);
    };
    $b = function(dynamic $I) use ($runtime) {
      return $runtime["caml_ephe_check_data"]($I);
    };
    $c = function(dynamic $H) use ($runtime) {
      return $runtime["caml_ephe_unset_data"]($H);
    };
    $d = function(dynamic $G, dynamic $F) use ($runtime) {
      return $runtime["caml_ephe_set_data"]($G, $F);
    };
    $e = function(dynamic $E) use ($runtime) {
      return $runtime["caml_ephe_get_data_copy"]($E);
    };
    $f = function(dynamic $D) use ($runtime) {
      return $runtime["caml_ephe_get_data"]($D);
    };
    $g = function(dynamic $C, dynamic $B, dynamic $A, dynamic $z, dynamic $y) use ($runtime) {
      return $runtime["caml_ephe_blit_key"]($C, $B, $A, $z, $y);
    };
    $h = function(dynamic $x, dynamic $w) use ($runtime) {
      return $runtime["caml_ephe_check_key"]($x, $w);
    };
    $i = function(dynamic $v, dynamic $u) use ($runtime) {
      return $runtime["caml_ephe_unset_key"]($v, $u);
    };
    $j = function(dynamic $t, dynamic $s, dynamic $r) use ($runtime) {
      return $runtime["caml_ephe_set_key"]($t, $s, $r);
    };
    $k = function(dynamic $q, dynamic $p) use ($runtime) {
      return $runtime["caml_ephe_get_key_copy"]($q, $p);
    };
    $l = function(dynamic $o, dynamic $n) use ($runtime) {
      return $runtime["caml_ephe_get_key"]($o, $n);
    };
    $Obj = Vector{
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
      Vector{
        0,
        function(dynamic $m) use ($runtime) {
          return $runtime["caml_ephe_create"]($m);
        },
        $length,
        $l,
        $k,
        $j,
        $i,
        $h,
        $g,
        $f,
        $e,
        $d,
        $c,
        $b,
        $a
      }
    };
    
    $runtime["caml_register_global"](4, $Obj, "Obj");

  }
}

