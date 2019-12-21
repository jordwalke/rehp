<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class Queue {
  <<__Override, __Memoize>>
  public static function get() : Vector<dynamic> {
    $joo_global_object = \Rehack\GlobalObject::get() as dynamic;
    
    $runtime = $joo_global_object->jsoo_runtime;
    $call1 = $runtime["caml_call1"];
    $call2 = $runtime["caml_call2"];
    $caml_wrap_thrown_exception = $runtime["caml_wrap_thrown_exception"];
    $cst_Queue_Empty = $runtime["caml_new_string"]("Queue.Empty");
    $Empty = Vector{248, $cst_Queue_Empty, $runtime["caml_fresh_oo_id"](0)};
    $create = (dynamic $param) ==> {return Vector{0, 0, 0, 0};};
    $clear = (dynamic $q) ==> {$q[1] = 0;$q[2] = 0;$q[3] = 0;return 0;};
    $add = (dynamic $x, dynamic $q) ==> {
      $cell = Vector{0, $x, 0};
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
      $f_ = $q[2];
      if ($f_) {$content = $f_[1];return $content;}
      throw $caml_wrap_thrown_exception($Empty) as \Throwable;
    };
    $take = (dynamic $q) ==> {
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
    $copy = (dynamic $q_res, dynamic $prev, dynamic $cell) ==> {
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
    $copy__0 = (dynamic $q) ==> {
      return $copy(Vector{0, $q[1], 0, 0}, 0, $q[2]);
    };
    $is_empty = (dynamic $q) ==> {return 0 === $q[1] ? 1 : (0);};
    $length = (dynamic $q) ==> {return $q[1];};
    $iter = (dynamic $f, dynamic $cell) ==> {
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
    $iter__0 = (dynamic $f, dynamic $q) ==> {return $iter($f, $q[2]);};
    $fold = (dynamic $f, dynamic $accu, dynamic $cell) ==> {
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
    $fold__0 = (dynamic $f, dynamic $accu, dynamic $q) ==> {return $fold($f, $accu, $q[2]);
    };
    $transfer = (dynamic $q1, dynamic $q2) ==> {
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
      $copy__0,
      $is_empty,
      $length,
      $iter__0,
      $fold__0,
      $transfer
    };
    
     return ($Queue);

  }
  public static function Empty(): dynamic {
    return static::callRehackFunction(static::get()[1], varray[]);
  }
  public static function create(dynamic $param): dynamic {
    return static::callRehackFunction(static::get()[2], varray[$param]);
  }
  public static function add(dynamic $x, dynamic $q): dynamic {
    return static::callRehackFunction(static::get()[3], varray[$x, $q]);
  }
  public static function take(dynamic $q): dynamic {
    return static::callRehackFunction(static::get()[5], varray[$q]);
  }
  public static function peek(dynamic $q): dynamic {
    return static::callRehackFunction(static::get()[7], varray[$q]);
  }
  public static function clear(dynamic $q): dynamic {
    return static::callRehackFunction(static::get()[9], varray[$q]);
  }
  public static function copy(dynamic $q): dynamic {
    return static::callRehackFunction(static::get()[10], varray[$q]);
  }
  public static function is_empty(dynamic $q): dynamic {
    return static::callRehackFunction(static::get()[11], varray[$q]);
  }
  public static function length(dynamic $q): dynamic {
    return static::callRehackFunction(static::get()[12], varray[$q]);
  }
  public static function iter(dynamic $f, dynamic $q): dynamic {
    return static::callRehackFunction(static::get()[13], varray[$f, $q]);
  }
  public static function fold(dynamic $f, dynamic $accu, dynamic $q): dynamic {
    return static::callRehackFunction(static::get()[14], varray[$f, $accu, $q]);
  }
  public static function transfer(dynamic $q1, dynamic $q2): dynamic {
    return static::callRehackFunction(static::get()[15], varray[$q1, $q2]);
  }

}
/* Hashing disabled */
