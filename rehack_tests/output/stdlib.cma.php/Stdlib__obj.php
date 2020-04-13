<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class Stdlib__obj {
  <<__Override, __Memoize>>
  public static function get() : Vector<dynamic> {
    
    $runtime = (\Rehack\GlobalObject::get() as dynamic)->jsoo_runtime;
    $call1 = $runtime["caml_call1"];
    $call2 = $runtime["caml_call2"];
    $string = $runtime["caml_new_string"];
    $caml_obj_tag = $runtime["caml_obj_tag"];
    $is_int = $runtime["is_int"];
    $cst_Obj_Ephemeron_blit_key = $string("Obj.Ephemeron.blit_key");
    $cst_Obj_Ephemeron_check_key = $string("Obj.Ephemeron.check_key");
    $cst_Obj_Ephemeron_unset_key = $string("Obj.Ephemeron.unset_key");
    $cst_Obj_Ephemeron_set_key = $string("Obj.Ephemeron.set_key");
    $cst_Obj_Ephemeron_get_key_copy = $string("Obj.Ephemeron.get_key_copy");
    $cst_Obj_Ephemeron_get_key = $string("Obj.Ephemeron.get_key");
    $cst_Obj_Ephemeron_create = $string("Obj.Ephemeron.create");
    $cst_Obj_extension_constructor__0 = $string("Obj.extension_constructor");
    $cst_Obj_extension_constructor = $string("Obj.extension_constructor");
    $Stdlib = Stdlib::get();
    $Stdlib_marshal = Stdlib__marshal::get();
    $Stdlib_sys = Stdlib__sys::get();
    $is_block = (dynamic $a) : dynamic ==> {return 1 - $is_int($a);};
    $double_field = (dynamic $x, dynamic $i) : dynamic ==> {
      return $runtime["caml_array_get"]($x, $i);
    };
    $set_double_field = (dynamic $x, dynamic $i, dynamic $v) : dynamic ==> {
      return $runtime["caml_array_set"]($x, $i, $v);
    };
    $marshal = (dynamic $obj) : dynamic ==> {
      return $runtime["caml_output_value_to_bytes"]($obj, 0);
    };
    $unmarshal = (dynamic $str, dynamic $pos) : dynamic ==> {
      $u_ = (int) ($pos + $call2($Stdlib_marshal[8], $str, $pos)) as dynamic;
      return Vector{0, $call2($Stdlib_marshal[4], $str, $pos), $u_};
    };
    $first_non_constant_constructor_tag = 0 as dynamic;
    $last_non_constant_constructor_tag = 245 as dynamic;
    $lazy_tag = 246 as dynamic;
    $closure_tag = 247 as dynamic;
    $object_tag = 248 as dynamic;
    $infix_tag = 249 as dynamic;
    $forward_tag = 250 as dynamic;
    $no_scan_tag = 251 as dynamic;
    $abstract_tag = 251 as dynamic;
    $string_tag = 252 as dynamic;
    $double_tag = 253 as dynamic;
    $double_array_tag = 254 as dynamic;
    $custom_tag = 255 as dynamic;
    $int_tag = 1000 as dynamic;
    $out_of_heap_tag = 1001 as dynamic;
    $unaligned_tag = 1002 as dynamic;
    $of_val = (dynamic $x) : dynamic ==> {
      $switch__1 = null as dynamic;
      $switch__0 = null as dynamic;
      $name = null as dynamic;
      $slot = null as dynamic;
      if ($is_block($x)) {
        if ($caml_obj_tag($x) !== 248) {
          if (1 <= $x->count() - 1) {
            $slot = $x[1];
            $switch__0 = 1 as dynamic;
          }
          else {$switch__0 = 0 as dynamic;}
        }
        else {$switch__0 = 0 as dynamic;}
      }
      else {$switch__0 = 0 as dynamic;}
      if (! $switch__0) {$slot = $x;}
      if ($is_block($slot)) {
        if ($caml_obj_tag($slot) === 248) {
          $name = $slot[1];
          $switch__1 = 1 as dynamic;
        }
        else {$switch__1 = 0 as dynamic;}
      }
      else {$switch__1 = 0 as dynamic;}
      if (! $switch__1) {
        $name = $call1($Stdlib[1], $cst_Obj_extension_constructor__0);
      }
      return $caml_obj_tag($name) === 252
        ? $slot
        : ($call1($Stdlib[1], $cst_Obj_extension_constructor));
    };
    $name = (dynamic $slot) : dynamic ==> {return $slot[1];};
    $id = (dynamic $slot) : dynamic ==> {return $slot[2];};
    $Extension_constructor = Vector{0, $of_val, $name, $id} as dynamic;
    $extension_constructor = $Extension_constructor[1];
    $extension_name = $Extension_constructor[2];
    $extension_id = $Extension_constructor[3];
    $max_ephe_length = (int) ($Stdlib_sys[14] - 2) as dynamic;
    $create = (dynamic $l) : dynamic ==> {
      $s_ = 0 <= $l ? 1 : (0);
      $t_ = $s_ ? $l <= $max_ephe_length ? 1 : (0) : ($s_);
      if (1 - $t_) {$call1($Stdlib[1], $cst_Obj_Ephemeron_create);}
      return $runtime["caml_ephe_create"]($l);
    };
    $length = (dynamic $x) : dynamic ==> {return (int) ($x->count() - 1 - 2);};
    $raise_if_invalid_offset = (dynamic $e, dynamic $o, dynamic $msg) : dynamic ==> {
      $p_ = 0 <= $o ? 1 : (0);
      $q_ = $p_ ? $o < $length($e) ? 1 : (0) : ($p_);
      $r_ = 1 - $q_;
      return $r_ ? $call1($Stdlib[1], $msg) : ($r_);
    };
    $get_key = (dynamic $e, dynamic $o) : dynamic ==> {
      $raise_if_invalid_offset($e, $o, $cst_Obj_Ephemeron_get_key);
      return $runtime["caml_ephe_get_key"]($e, $o);
    };
    $get_key_copy = (dynamic $e, dynamic $o) : dynamic ==> {
      $raise_if_invalid_offset($e, $o, $cst_Obj_Ephemeron_get_key_copy);
      return $runtime["caml_ephe_get_key_copy"]($e, $o);
    };
    $set_key = (dynamic $e, dynamic $o, dynamic $x) : dynamic ==> {
      $raise_if_invalid_offset($e, $o, $cst_Obj_Ephemeron_set_key);
      return $runtime["caml_ephe_set_key"]($e, $o, $x);
    };
    $unset_key = (dynamic $e, dynamic $o) : dynamic ==> {
      $raise_if_invalid_offset($e, $o, $cst_Obj_Ephemeron_unset_key);
      return $runtime["caml_ephe_unset_key"]($e, $o);
    };
    $check_key = (dynamic $e, dynamic $o) : dynamic ==> {
      $raise_if_invalid_offset($e, $o, $cst_Obj_Ephemeron_check_key);
      return $runtime["caml_ephe_check_key"]($e, $o);
    };
    $blit_key = 
    (dynamic $e1, dynamic $o1, dynamic $e2, dynamic $o2, dynamic $l) : dynamic ==> {
      $o_ = null as dynamic;
      $n_ = null as dynamic;
      if (0 <= $l) {
        if (0 <= $o1) {
          if (! ((int) ($length($e1) - $l) < $o1)) {
            if (0 <= $o2) {
              if (! ((int) ($length($e2) - $l) < $o2)) {
                $n_ = 0 !== $l ? 1 : (0);
                $o_ =
                  $n_
                    ? $runtime["caml_ephe_blit_key"]($e1, $o1, $e2, $o2, $l)
                    : ($n_);
                return $o_;
              }
            }
          }
        }
      }
      return $call1($Stdlib[1], $cst_Obj_Ephemeron_blit_key);
    };
    $a_ = (dynamic $m_, dynamic $l_) : dynamic ==> {
      return $runtime["caml_ephe_blit_data"]($m_, $l_);
    };
    $b_ = (dynamic $k_) : dynamic ==> {
      return $runtime["caml_ephe_check_data"]($k_);
    };
    $c_ = (dynamic $j_) : dynamic ==> {
      return $runtime["caml_ephe_unset_data"]($j_);
    };
    $d_ = (dynamic $i_, dynamic $h_) : dynamic ==> {
      return $runtime["caml_ephe_set_data"]($i_, $h_);
    };
    $e_ = (dynamic $g_) : dynamic ==> {
      return $runtime["caml_ephe_get_data_copy"]($g_);
    };
    $Stdlib_obj = Vector{
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
      $Extension_constructor,
      $extension_constructor,
      $extension_name,
      $extension_id,
      $marshal,
      $unmarshal,
      Vector{
        0,
        $create,
        $length,
        $get_key,
        $get_key_copy,
        $set_key,
        $unset_key,
        $check_key,
        $blit_key,
        (dynamic $f_) : dynamic ==> {
          return $runtime["caml_ephe_get_data"]($f_);
        },
        $e_,
        $d_,
        $c_,
        $b_,
        $a_,
        $max_ephe_length
      }
    } as dynamic;
    
    return($Stdlib_obj);

  }
  public static function is_block(dynamic $a): dynamic {
    return static::syncCall(__FUNCTION__, 1, $a);
  }
  public static function double_field(dynamic $x, dynamic $i): dynamic {
    return static::syncCall(__FUNCTION__, 2, $x, $i);
  }
  public static function set_double_field(dynamic $x, dynamic $i, dynamic $v): dynamic {
    return static::syncCall(__FUNCTION__, 3, $x, $i, $v);
  }
  public static function marshal(dynamic $obj): dynamic {
    return static::syncCall(__FUNCTION__, 25, $obj);
  }
  public static function unmarshal(dynamic $str, dynamic $pos): dynamic {
    return static::syncCall(__FUNCTION__, 26, $str, $pos);
  }

}
/* Hashing disabled */
