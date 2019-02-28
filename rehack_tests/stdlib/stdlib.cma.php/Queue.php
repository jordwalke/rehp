<?hh
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * Queue.php
 */

namespace Rehack;

final class Queue {
  <<__Memoize>>
  public static function get() {
    $global_object = \Rehack\GlobalObject::get();
    $runtime = \Rehack\Runtime::get();
    /*
     * Soon, these will replace the `global_data->ModuleName`
     * pattern in the load() function.
     */

    Queue::load($global_object);
    $memoized = $runtime->caml_get_global_data()->Queue;
    return $memoized;
  }

  /**
   * Performs module load operation. May have side effects.
   */
  private static function load($joo_global_object) {
    

    $runtime = $joo_global_object->jsoo_runtime;
    $caml_arity_test = $runtime["caml_arity_test"];
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
    $cst_Queue_Empty = $runtime["caml_new_string"]("Queue.Empty");
    $Empty = V(248, $cst_Queue_Empty, $runtime["caml_fresh_oo_id"](0));
    $create = function($param) {return V(0, 0, 0, 0);};
    $clear = function($q) {$q[1] = 0;$q[2] = 0;$q[3] = 0;return 0;};
    $add = function($x, $q) {
      $cell = V(0, $x, 0);
      $g0 = $q[3];
      return $g0
        ? ($q[1] = $q[1] + 1 | 0) || true
         ? ($g0[2] = $cell) || true
          ? ($q[3] = $cell) || true ? 0 : (0)
          : (($q[3] = $cell) || true ? 0 : (0))
         : (($g0[2] = $cell) || true
          ? ($q[3] = $cell) || true ? 0 : (0)
          : (($q[3] = $cell) || true ? 0 : (0)))
        : (($q[1] = 1) || true
         ? ($q[2] = $cell) || true
          ? ($q[3] = $cell) || true ? 0 : (0)
          : (($q[3] = $cell) || true ? 0 : (0))
         : (($q[2] = $cell) || true
          ? ($q[3] = $cell) || true ? 0 : (0)
          : (($q[3] = $cell) || true ? 0 : (0))));
    };
    $peek = function($q) use ($Empty,$runtime) {
      $gZ = $q[2];
      if ($gZ) {$content = $gZ[1];return $content;}
      throw $runtime["caml_wrap_thrown_exception"]($Empty);
    };
    $take = function($q) use ($Empty,$clear,$runtime) {
      $gW = $q[2];
      if ($gW) {
        $gX = $gW[1];
        $gY = $gW[2];
        return $gY
          ? ($q[1] = $q[1] + -1 | 0) || true
           ? ($q[2] = $gY) || true ? $gX : ($gX)
           : (($q[2] = $gY) || true ? $gX : ($gX))
          : ($clear($q) || true ? $gX : ($gX));
      }
      throw $runtime["caml_wrap_thrown_exception"]($Empty);
    };
    $copy = function($q_res, $prev, $cell) {
      $prev__0 = $prev;
      $cell__0 = $cell;
      for (;;) {
        if ($cell__0) {
          $content = $cell__0[1];
          $next = $cell__0[2];
          $res = V(0, $content, 0);
          if ($prev__0) {
            $prev__0[2] = $res;
          }
          else {$q_res[2] = $res;}
          $prev__0 = $res;
          $cell__0 = $next;
          continue;
        }
        $q_res[3] = $prev__0;
        return $q_res;
      }
    };
    $copy__0 = function($q) use ($copy) {
      return $copy(V(0, $q[1], 0, 0), 0, $q[2]);
    };
    $is_empty = function($q) {return 0 === $q[1] ? 1 : (0);};
    $length = function($q) {return $q[1];};
    $iter = function($f, $cell) use ($caml_call1) {
      $cell__0 = $cell;
      for (;;) {
        if ($cell__0) {
          $content = $cell__0[1];
          $cell__1 = $cell__0[2];
          $caml_call1($f, $content);
          $cell__0 = $cell__1;
          continue;
        }
        return 0;
      }
    };
    $iter__0 = function($f, $q) use ($iter) {return $iter($f, $q[2]);};
    $fold = function($f, $accu, $cell) use ($caml_call2) {
      $accu__0 = $accu;
      $cell__0 = $cell;
      for (;;) {
        if ($cell__0) {
          $content = $cell__0[1];
          $cell__1 = $cell__0[2];
          $accu__1 = $caml_call2($f, $accu__0, $content);
          $accu__0 = $accu__1;
          $cell__0 = $cell__1;
          continue;
        }
        return $accu__0;
      }
    };
    $fold__0 = function($f, $accu, $q) use ($fold) {
      return $fold($f, $accu, $q[2]);
    };
    $transfer = function($q1, $q2) use ($clear) {
      $gU = 0 < $q1[1] ? 1 : (0);
      if ($gU) {
        $gV = $q2[3];
        return $gV
          ? ($q2[1] = $q2[1] + $q1[1] | 0) || true
           ? ($gV[2] = $q1[2]) || true
            ? ($q2[3] = $q1[3]) || true ? $clear($q1) : ($clear($q1))
            : (($q2[3] = $q1[3]) || true ? $clear($q1) : ($clear($q1)))
           : (($gV[2] = $q1[2]) || true
            ? ($q2[3] = $q1[3]) || true ? $clear($q1) : ($clear($q1))
            : (($q2[3] = $q1[3]) || true ? $clear($q1) : ($clear($q1))))
          : (($q2[1] = $q1[1]) || true
           ? ($q2[2] = $q1[2]) || true
            ? ($q2[3] = $q1[3]) || true ? $clear($q1) : ($clear($q1))
            : (($q2[3] = $q1[3]) || true ? $clear($q1) : ($clear($q1)))
           : (($q2[2] = $q1[2]) || true
            ? ($q2[3] = $q1[3]) || true ? $clear($q1) : ($clear($q1))
            : (($q2[3] = $q1[3]) || true ? $clear($q1) : ($clear($q1)))));
      }
      return $gU;
    };
    $Queue = V(
      0,
      $Empty,
      $create,
      $add,
      $add,
      $take,
      $take,
      $peek,
      $peek,
      $clear,
      $copy__0,
      $is_empty,
      $length,
      $iter__0,
      $fold__0,
      $transfer
    );
    
    $runtime["caml_register_global"](1, $Queue, "Queue");

  }
}