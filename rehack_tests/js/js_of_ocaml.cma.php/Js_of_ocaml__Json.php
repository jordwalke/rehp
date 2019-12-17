<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class Js_of_ocaml__Json {
  <<__Override, __Memoize>>
  public static function get() : Vector<dynamic> {
    $joo_global_object = \Rehack\GlobalObject::get() as dynamic;
    
    $runtime = $joo_global_object->jsoo_runtime;
    $call1 = $runtime["caml_call1"];
    $caml_get_public_method = $runtime["caml_get_public_method"];
    $string = $runtime["caml_new_string"];
    $dummy_string = $string("");
    $json = $runtime["caml_json"](0);
    $reviver = function(dynamic $this__0, dynamic $key, dynamic $value) use ($runtime) {
      return typeof($value) == typeof("foo")
        ? $runtime["caml_js_to_byte_string"]($value)
        : ($value);
    };
    $input_reviver = $runtime["caml_js_wrap_meth_callback"]($reviver);
    $unsafe_input = function(dynamic $s) use ($call1,$caml_get_public_method,$input_reviver,$json) {
      $c_ = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, -309814068, 279), $x);
      };
      return (function(dynamic $t2, dynamic $t0, dynamic $t1, dynamic $param) {return $t2->parse($t0, $t1);
       })($json, $s, $input_reviver, $c_);
    };
    $a_ = function(dynamic $x) use ($call1,$caml_get_public_method) {
      return $call1($caml_get_public_method($x, 398798074, 280), $x);
    };
    $mlString_constr = (function(dynamic $t3, dynamic $param) {return $t3->constructor;
     })($dummy_string, $a_);
    $output_reviver = function(dynamic $key, dynamic $value) use ($mlString_constr,$runtime) {
      return instance_of($value, $mlString_constr)
        ? $runtime["caml_jsbytes_of_string"]($value)
        : ($value);
    };
    $output = function(dynamic $obj) use ($call1,$caml_get_public_method,$json,$output_reviver) {
      $b_ = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, 215522356, 281), $x);
      };
      return (function(dynamic $t6, dynamic $t4, dynamic $t5, dynamic $param) {return $t6->stringify($t4, $t5);
       })($json, $obj, $output_reviver, $b_);
    };
    $Js_of_ocaml_Json = Vector{0, $output, $unsafe_input};
    
     return ($Js_of_ocaml_Json);

  }
  public static function unsafe_input(dynamic $s) {
    return static::get()[2]($s);
  }
  public static function output(dynamic $obj) {
    return static::get()[1]($obj);
  }

}
/* Hashing disabled */
