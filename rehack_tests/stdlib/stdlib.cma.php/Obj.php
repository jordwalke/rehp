<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class Obj {
  <<__Override, __Memoize>>
  public static function get() : Vector<dynamic> {
    $joo_global_object = \Rehack\GlobalObject::get() as dynamic;
    
    $runtime = $joo_global_object->jsoo_runtime;
    $call1 = $runtime["caml_call1"];
    $call2 = $runtime["caml_call2"];
    $string = $runtime["caml_new_string"];
    $caml_obj_tag = $runtime["caml_obj_tag"];
    $is_int = $runtime["is_int"];
    $cst_Obj_extension_constructor__0 = $string("Obj.extension_constructor");
    $cst_Obj_extension_constructor = $string("Obj.extension_constructor");
    $Pervasives =  Pervasives::get ();
    $Marshal =  Marshal::get ();
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
      $L_ = (int) ($pos + $call2($Marshal[8], $str, $pos));
      return Vector{0, $call2($Marshal[4], $str, $pos), $L_};
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
    $a_ = function(dynamic $K_, dynamic $J_) use ($runtime) {
      return $runtime["caml_ephe_blit_data"]($K_, $J_);
    };
    $b_ = function(dynamic $I_) use ($runtime) {
      return $runtime["caml_ephe_check_data"]($I_);
    };
    $c_ = function(dynamic $H_) use ($runtime) {
      return $runtime["caml_ephe_unset_data"]($H_);
    };
    $d_ = function(dynamic $G_, dynamic $F_) use ($runtime) {
      return $runtime["caml_ephe_set_data"]($G_, $F_);
    };
    $e_ = function(dynamic $E_) use ($runtime) {
      return $runtime["caml_ephe_get_data_copy"]($E_);
    };
    $f_ = function(dynamic $D_) use ($runtime) {
      return $runtime["caml_ephe_get_data"]($D_);
    };
    $g_ = function
    (dynamic $C_, dynamic $B_, dynamic $A_, dynamic $z_, dynamic $y_) use ($runtime) {
      return $runtime["caml_ephe_blit_key"]($C_, $B_, $A_, $z_, $y_);
    };
    $h_ = function(dynamic $x_, dynamic $w_) use ($runtime) {
      return $runtime["caml_ephe_check_key"]($x_, $w_);
    };
    $i_ = function(dynamic $v_, dynamic $u_) use ($runtime) {
      return $runtime["caml_ephe_unset_key"]($v_, $u_);
    };
    $j_ = function(dynamic $t_, dynamic $s_, dynamic $r_) use ($runtime) {
      return $runtime["caml_ephe_set_key"]($t_, $s_, $r_);
    };
    $k_ = function(dynamic $q_, dynamic $p_) use ($runtime) {
      return $runtime["caml_ephe_get_key_copy"]($q_, $p_);
    };
    $l_ = function(dynamic $o_, dynamic $n_) use ($runtime) {
      return $runtime["caml_ephe_get_key"]($o_, $n_);
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
        function(dynamic $m_) use ($runtime) {
          return $runtime["caml_ephe_create"]($m_);
        },
        $length,
        $l_,
        $k_,
        $j_,
        $i_,
        $h_,
        $g_,
        $f_,
        $e_,
        $d_,
        $c_,
        $b_,
        $a_
      }
    };
    
     return ($Obj);

  }
  public static function unmarshal(dynamic $str, dynamic $pos) {
    return static::get()[25]($str, $pos);
  }
  public static function marshal(dynamic $obj) {
    return static::get()[24]($obj);
  }
  public static function extension_id(dynamic $slot) {
    return static::get()[23]($slot);
  }
  public static function extension_name(dynamic $slot) {
    return static::get()[22]($slot);
  }
  public static function extension_constructor(dynamic $x) {
    return static::get()[21]($x);
  }
  public static function unaligned_tag() {
    return static::get()[20]();
  }
  public static function out_of_heap_tag() {
    return static::get()[19]();
  }
  public static function int_tag() {
    return static::get()[18]();
  }
  public static function custom_tag() {
    return static::get()[17]();
  }
  public static function custom_tag() {
    return static::get()[16]();
  }
  public static function double_array_tag() {
    return static::get()[15]();
  }
  public static function double_tag() {
    return static::get()[14]();
  }
  public static function string_tag() {
    return static::get()[13]();
  }
  public static function abstract_tag() {
    return static::get()[12]();
  }
  public static function no_scan_tag() {
    return static::get()[11]();
  }
  public static function forward_tag() {
    return static::get()[10]();
  }
  public static function infix_tag() {
    return static::get()[9]();
  }
  public static function object_tag() {
    return static::get()[8]();
  }
  public static function closure_tag() {
    return static::get()[7]();
  }
  public static function lazy_tag() {
    return static::get()[6]();
  }
  public static function last_non_constant_constructor_tag() {
    return static::get()[5]();
  }
  public static function first_non_constant_constructor_tag() {
    return static::get()[4]();
  }
  public static function set_double_field(dynamic $x, dynamic $i, dynamic $v) {
    return static::get()[3]($x, $i, $v);
  }
  public static function double_field(dynamic $x, dynamic $i) {
    return static::get()[2]($x, $i);
  }
  public static function is_block(dynamic $a) {
    return static::get()[1]($a);
  }

}
/* Hashing disabled */
