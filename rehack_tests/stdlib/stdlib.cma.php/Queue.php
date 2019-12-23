<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class Queue {
  <<__Override, __Memoize>>
  public static function requireModule() : Vector<dynamic> {
    $joo_global_object = \Rehack\GlobalObject::get() as dynamic;
    
    $runtime = $joo_global_object->jsoo_runtime;
    $call1 = $runtime["caml_call1"];
    $call2 = $runtime["caml_call2"];
    $caml_wrap_thrown_exception = $runtime["caml_wrap_thrown_exception"];
    $cst_Queue_Empty = $runtime["caml_new_string"]("Queue.Empty");
    $Empty = Vector{248, $cst_Queue_Empty, $runtime["caml_fresh_oo_id"](0)} as dynamic;
    $create = (dynamic $param) ==> {return Vector{0, 0, 0, 0};};
    $clear = (dynamic $q) ==> {$q[1] = 0;$q[2] = 0;$q[3] = 0;return 0;};
    $add = (dynamic $x, dynamic $q) ==> {
      $cell = Vector{0, $x, 0} as dynamic;
      $g_ = $q[3];
      if ($g_) {
        $q[1] = (int) ($q[1] + 1);
        $g_[2] = $cell;
        $q[3] = $cell;
        return 0;
      }
      $q[1] = 1;
      $q[2] = $cell;
      $q[3] = $cell;
      return 0;
    };
    $peek = (dynamic $q) ==> {
      $content = null;
      $f_ = $q[2];
      if ($f_) {$content = $f_[1];return $content;}
      throw $caml_wrap_thrown_exception($Empty) as \Throwable;
    };
    $take = (dynamic $q) ==> {
      $d_ = null;
      $e_ = null;
      $c_ = $q[2];
      if ($c_) {
        $d_ = $c_[1];
        $e_ = $c_[2];
        if ($e_) {$q[1] = (int) ($q[1] + -1);$q[2] = $e_;return $d_;}
        $clear($q);
        return $d_;
      }
      throw $caml_wrap_thrown_exception($Empty) as \Throwable;
    };
    $copy = (dynamic $q) ==> {
      $content = null;
      $next = null;
      $res = null;
      $q_res = Vector{0, $q[1], 0, 0} as dynamic;
      $prev = 0;
      $cell = $q[2];
      for (;;) {
        if ($cell) {
          $content = $cell[1];
          $next = $cell[2];
          $res = Vector{0, $content, 0};
          if ($prev) {
            $prev[2] = $res;
          }
          else {$q_res[2] = $res;}
          $prev = $res;
          $cell = $next;
          continue;
        }
        $q_res[3] = $prev;
        return $q_res;
      }
    };
    $is_empty = (dynamic $q) ==> {return 0 === $q[1] ? 1 : (0);};
    $length = (dynamic $q) ==> {return $q[1];};
    $iter = (dynamic $f, dynamic $q) ==> {
      $content = null;
      $cell__0 = null;
      $cell = $q[2];
      for (;;) {
        if ($cell) {
          $content = $cell[1];
          $cell__0 = $cell[2];
          $call1($f, $content);
          $cell = $cell__0;
          continue;
        }
        return 0;
      }
    };
    $fold = (dynamic $f, dynamic $accu__1, dynamic $q) ==> {
      $content = null;
      $cell__0 = null;
      $accu__0 = null;
      $accu = $accu__1;
      $cell = $q[2];
      for (;;) {
        if ($cell) {
          $content = $cell[1];
          $cell__0 = $cell[2];
          $accu__0 = $call2($f, $accu, $content);
          $accu = $accu__0;
          $cell = $cell__0;
          continue;
        }
        return $accu;
      }
    };
    $transfer = (dynamic $q1, dynamic $q2) ==> {
      $b_ = null;
      $a_ = 0 < $q1[1] ? 1 : (0);
      if ($a_) {
        $b_ = $q2[3];
        if ($b_) {
          $q2[1] = (int) ($q2[1] + $q1[1]);
          $b_[2] = $q1[2];
          $q2[3] = $q1[3];
          return $clear($q1);
        }
        $q2[1] = $q1[1];
        $q2[2] = $q1[2];
        $q2[3] = $q1[3];
        return $clear($q1);
      }
      return $a_;
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
      $copy,
      $is_empty,
      $length,
      $iter,
      $fold,
      $transfer
    } as dynamic;
    
     return ($Queue);

  }
  public static function create(dynamic $param): dynamic {
    return static::callRehackFunction(static::requireModule()[2], varray[$param]);
  }
  public static function add(dynamic $x, dynamic $q): dynamic {
    return static::callRehackFunction(static::requireModule()[3], varray[$x, $q]);
  }
  public static function take(dynamic $q): dynamic {
    return static::callRehackFunction(static::requireModule()[5], varray[$q]);
  }
  public static function peek(dynamic $q): dynamic {
    return static::callRehackFunction(static::requireModule()[7], varray[$q]);
  }
  public static function clear(dynamic $q): dynamic {
    return static::callRehackFunction(static::requireModule()[9], varray[$q]);
  }
  public static function copy(dynamic $q): dynamic {
    return static::callRehackFunction(static::requireModule()[10], varray[$q]);
  }
  public static function is_empty(dynamic $q): dynamic {
    return static::callRehackFunction(static::requireModule()[11], varray[$q]);
  }
  public static function length(dynamic $q): dynamic {
    return static::callRehackFunction(static::requireModule()[12], varray[$q]);
  }
  public static function iter(dynamic $f, dynamic $q): dynamic {
    return static::callRehackFunction(static::requireModule()[13], varray[$f, $q]);
  }
  public static function fold(dynamic $f, dynamic $accu, dynamic $q): dynamic {
    return static::callRehackFunction(static::requireModule()[14], varray[$f, $accu, $q]);
  }
  public static function transfer(dynamic $q1, dynamic $q2): dynamic {
    return static::callRehackFunction(static::requireModule()[15], varray[$q1, $q2]);
  }

}
/* Hashing disabled */
