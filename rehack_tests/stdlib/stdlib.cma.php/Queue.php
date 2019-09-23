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
    $call1 = $runtime["caml_call1"];
    $call2 = $runtime["caml_call2"];
    $cst_Queue_Empty = $runtime["caml_new_string"]("Queue.Empty");
    $Empty = Vector{248, $cst_Queue_Empty, $runtime["caml_fresh_oo_id"](0)};
    $create = function(dynamic $param) {return Vector{0, 0, 0, 0};};
    $clear = function(dynamic $q) {$q[1] = 0;$q[2] = 0;$q[3] = 0;return 0;};
    $add = function(dynamic $x, dynamic $q) {
      $cell = Vector{0, $x, 0};
      $g = $q[3];
      if ($g) {
        $q[1] = (int) ($q[1] + 1);
        $g[2] = $cell;
        $q[3] = $cell;
        return 0;
      }
      $q[1] = 1;
      $q[2] = $cell;
      $q[3] = $cell;
      return 0;
    };
    $peek = function(dynamic $q) use ($Empty,$runtime) {
      $f = $q[2];
      if ($f) {$content = $f[1];return $content;}
      throw $runtime["caml_wrap_thrown_exception"]($Empty) as \Throwable;
    };
    $take = function(dynamic $q) use ($Empty,$clear,$runtime) {
      $c = $q[2];
      if ($c) {
        $d = $c[1];
        $e = $c[2];
        if ($e) {$q[1] = (int) ($q[1] + -1);$q[2] = $e;return $d;}
        $clear($q);
        return $d;
      }
      throw $runtime["caml_wrap_thrown_exception"]($Empty) as \Throwable;
    };
    $copy = function(dynamic $q_res, dynamic $prev, dynamic $cell) {
      $prev__0 = $prev;
      $cell__0 = $cell;
      for (;;) {
        if ($cell__0) {
          $content = $cell__0[1];
          $next = $cell__0[2];
          $res = Vector{0, $content, 0};
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
    $copy__0 = function(dynamic $q) use ($copy) {
      return $copy(Vector{0, $q[1], 0, 0}, 0, $q[2]);
    };
    $is_empty = function(dynamic $q) {return 0 === $q[1] ? 1 : (0);};
    $length = function(dynamic $q) {return $q[1];};
    $iter = function(dynamic $f, dynamic $cell) use ($call1) {
      $cell__0 = $cell;
      for (;;) {
        if ($cell__0) {
          $content = $cell__0[1];
          $cell__1 = $cell__0[2];
          $call1($f, $content);
          $cell__0 = $cell__1;
          continue;
        }
        return 0;
      }
    };
    $iter__0 = function(dynamic $f, dynamic $q) use ($iter) {
      return $iter($f, $q[2]);
    };
    $fold = function(dynamic $f, dynamic $accu, dynamic $cell) use ($call2) {
      $accu__0 = $accu;
      $cell__0 = $cell;
      for (;;) {
        if ($cell__0) {
          $content = $cell__0[1];
          $cell__1 = $cell__0[2];
          $accu__1 = $call2($f, $accu__0, $content);
          $accu__0 = $accu__1;
          $cell__0 = $cell__1;
          continue;
        }
        return $accu__0;
      }
    };
    $fold__0 = function(dynamic $f, dynamic $accu, dynamic $q) use ($fold) {return $fold($f, $accu, $q[2]);
    };
    $transfer = function(dynamic $q1, dynamic $q2) use ($clear) {
      $a = 0 < $q1[1] ? 1 : (0);
      if ($a) {
        $b = $q2[3];
        if ($b) {
          $q2[1] = (int) ($q2[1] + $q1[1]);
          $b[2] = $q1[2];
          $q2[3] = $q1[3];
          return $clear($q1);
        }
        $q2[1] = $q1[1];
        $q2[2] = $q1[2];
        $q2[3] = $q1[3];
        return $clear($q1);
      }
      return $a;
    };
    $Queue = Vector{
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
    };
    
    $runtime["caml_register_global"](1, $Queue, "Queue");

  }
}