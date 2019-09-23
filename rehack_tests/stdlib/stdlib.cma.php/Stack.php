<?hh
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * Stack.php
 */

namespace Rehack;

final class Stack {
  <<__Memoize>>
  public static function get() {
    $global_object = \Rehack\GlobalObject::get();
    $runtime = \Rehack\Runtime::get();
    /*
     * Soon, these will replace the `global_data->ModuleName`
     * pattern in the load() function.
     */
    $List_ = List_::get();
    Stack::load($global_object);
    $memoized = $runtime->caml_get_global_data()->Stack;
    return $memoized;
  }

  /**
   * Performs module load operation. May have side effects.
   */
  private static function load($joo_global_object) {
    

    $runtime = $joo_global_object->jsoo_runtime;
    $call2 = $runtime["caml_call2"];
    $call3 = $runtime["caml_call3"];
    $global_data = $runtime["caml_get_global_data"]();
    $cst_Stack_Empty = $runtime["caml_new_string"]("Stack.Empty");
    $List = $global_data["List_"];
    $Empty = Vector{248, $cst_Stack_Empty, $runtime["caml_fresh_oo_id"](0)};
    $create = function(dynamic $param) {return Vector{0, 0, 0};};
    $clear = function(dynamic $s) {$s[1] = 0;$s[2] = 0;return 0;};
    $copy = function(dynamic $s) {return Vector{0, $s[1], $s[2]};};
    $push = function(dynamic $x, dynamic $s) {
      $s[1] = Vector{0, $x, $s[1]};
      $s[2] = (int) ($s[2] + 1);
      return 0;
    };
    $pop = function(dynamic $s) use ($Empty,$runtime) {
      $b = $s[1];
      if ($b) {
        $tl = $b[2];
        $hd = $b[1];
        $s[1] = $tl;
        $s[2] = (int) ($s[2] + -1);
        return $hd;
      }
      throw $runtime["caml_wrap_thrown_exception"]($Empty) as \Throwable;
    };
    $top = function(dynamic $s) use ($Empty,$runtime) {
      $a = $s[1];
      if ($a) {$hd = $a[1];return $hd;}
      throw $runtime["caml_wrap_thrown_exception"]($Empty) as \Throwable;
    };
    $is_empty = function(dynamic $s) {return 0 === $s[1] ? 1 : (0);};
    $length = function(dynamic $s) {return $s[2];};
    $iter = function(dynamic $f, dynamic $s) use ($List,$call2) {
      return $call2($List[15], $f, $s[1]);
    };
    $fold = function(dynamic $f, dynamic $acc, dynamic $s) use ($List,$call3) {
      return $call3($List[20], $f, $acc, $s[1]);
    };
    $Stack = Vector{
      0,
      $Empty,
      $create,
      $push,
      $pop,
      $top,
      $clear,
      $copy,
      $is_empty,
      $length,
      $iter,
      $fold
    };
    
    $runtime["caml_register_global"](2, $Stack, "Stack");

  }
}