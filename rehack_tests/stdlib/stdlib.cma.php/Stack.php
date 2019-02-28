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
    $caml_arity_test = $runtime["caml_arity_test"];
    $caml_new_string = $runtime["caml_new_string"];
    $caml_call2 = function($f, $a0, $a1) use ($caml_arity_test,$runtime) {
      return $caml_arity_test($f) == 2
        ? $f($a0, $a1)
        : ($runtime["caml_call_gen"]($f, varray[$a0,$a1]));
    };
    $caml_call3 = function($f, $a0, $a1, $a2) use ($caml_arity_test,$runtime) {
      return $caml_arity_test($f) == 3
        ? $f($a0, $a1, $a2)
        : ($runtime["caml_call_gen"]($f, varray[$a0,$a1,$a2]));
    };
    $global_data = $runtime["caml_get_global_data"]();
    $cst_Stack_Empty = $caml_new_string("Stack.Empty");
    $List = $global_data["List_"];
    $Empty = V(248, $cst_Stack_Empty, $runtime["caml_fresh_oo_id"](0));
    $create = function($param) {return V(0, 0, 0);};
    $clear = function($s) {$s[1] = 0;$s[2] = 0;return 0;};
    $copy = function($s) {return V(0, $s[1], $s[2]);};
    $push = function($x, $s) {
      $s[1] = V(0, $x, $s[1]);
      $s[2] = $s[2] + 1 | 0;
      return 0;
    };
    $pop = function($s) use ($Empty,$runtime) {
      $gT = $s[1];
      if ($gT) {
        $tl = $gT[2];
        $hd = $gT[1];
        $s[1] = $tl;
        $s[2] = $s[2] + -1 | 0;
        return $hd;
      }
      throw $runtime["caml_wrap_thrown_exception"]($Empty);
    };
    $top = function($s) use ($Empty,$runtime) {
      $gS = $s[1];
      if ($gS) {$hd = $gS[1];return $hd;}
      throw $runtime["caml_wrap_thrown_exception"]($Empty);
    };
    $is_empty = function($s) {return 0 === $s[1] ? 1 : (0);};
    $length = function($s) {return $s[2];};
    $iter = function($f, $s) use ($List,$caml_call2) {
      return $caml_call2($List[15], $f, $s[1]);
    };
    $fold = function($f, $acc, $s) use ($List,$caml_call3) {
      return $caml_call3($List[20], $f, $acc, $s[1]);
    };
    $Stack = V(
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
    );
    
    $runtime["caml_register_global"](2, $Stack, "Stack");

  }
}