<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class Stack {
  <<__Override, __Memoize>>
  public static function get() : Vector<dynamic> {
    
    $runtime = (\Rehack\GlobalObject::get() as dynamic)->jsoo_runtime;
    $call2 = $runtime["caml_call2"];
    $call3 = $runtime["caml_call3"];
    $caml_wrap_thrown_exception = $runtime["caml_wrap_thrown_exception"];
    $cst_Stack_Empty = $runtime["caml_new_string"]("Stack.Empty");
    $List = List_::get();
    $Empty = Vector{248, $cst_Stack_Empty, $runtime["caml_fresh_oo_id"](0)} as dynamic;
    $create = (dynamic $param) ==> {return Vector{0, 0, 0};};
    $clear = (dynamic $s) ==> {$s[1] = 0;$s[2] = 0;return 0;};
    $copy = (dynamic $s) ==> {return Vector{0, $s[1], $s[2]};};
    $push = (dynamic $x, dynamic $s) ==> {
      $s[1] = Vector{0, $x, $s[1]};
      $s[2] = (int) ($s[2] + 1);
      return 0;
    };
    $pop = (dynamic $s) ==> {
      $tl = null as dynamic;
      $hd = null as dynamic;
      $b_ = $s[1];
      if ($b_) {
        $tl = $b_[2];
        $hd = $b_[1];
        $s[1] = $tl;
        $s[2] = (int) ($s[2] + -1);
        return $hd;
      }
      throw $caml_wrap_thrown_exception($Empty) as \Throwable;
    };
    $top = (dynamic $s) ==> {
      $hd = null as dynamic;
      $a_ = $s[1];
      if ($a_) {$hd = $a_[1];return $hd;}
      throw $caml_wrap_thrown_exception($Empty) as \Throwable;
    };
    $is_empty = (dynamic $s) ==> {return 0 === $s[1] ? 1 : (0);};
    $length = (dynamic $s) ==> {return $s[2];};
    $iter = (dynamic $f, dynamic $s) ==> {
      return $call2($List[15], $f, $s[1]);
    };
    $fold = (dynamic $f, dynamic $acc, dynamic $s) ==> {
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
    } as dynamic;
    
    return($Stack);

  }
  public static function create(dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 2, $param);
  }
  public static function push(dynamic $x, dynamic $s): dynamic {
    return static::syncCall(__FUNCTION__, 3, $x, $s);
  }
  public static function pop(dynamic $s): dynamic {
    return static::syncCall(__FUNCTION__, 4, $s);
  }
  public static function top(dynamic $s): dynamic {
    return static::syncCall(__FUNCTION__, 5, $s);
  }
  public static function clear(dynamic $s): dynamic {
    return static::syncCall(__FUNCTION__, 6, $s);
  }
  public static function copy(dynamic $s): dynamic {
    return static::syncCall(__FUNCTION__, 7, $s);
  }
  public static function is_empty(dynamic $s): dynamic {
    return static::syncCall(__FUNCTION__, 8, $s);
  }
  public static function length(dynamic $s): dynamic {
    return static::syncCall(__FUNCTION__, 9, $s);
  }
  public static function iter(dynamic $f, dynamic $s): dynamic {
    return static::syncCall(__FUNCTION__, 10, $f, $s);
  }
  public static function fold(dynamic $f, dynamic $acc, dynamic $s): dynamic {
    return static::syncCall(__FUNCTION__, 11, $f, $acc, $s);
  }

}
/* Hashing disabled */
