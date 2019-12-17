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
    $joo_global_object = \Rehack\GlobalObject::get() as dynamic;
    
    $runtime = $joo_global_object->jsoo_runtime;
    $call2 = $runtime["caml_call2"];
    $call3 = $runtime["caml_call3"];
    $caml_wrap_thrown_exception = $runtime["caml_wrap_thrown_exception"];
    $cst_Stack_Empty = $runtime["caml_new_string"]("Stack.Empty");
    $List =  List_::get ();
    $Empty = Vector{248, $cst_Stack_Empty, $runtime["caml_fresh_oo_id"](0)};
    $create = function(dynamic $param) {return Vector{0, 0, 0};};
    $clear = function(dynamic $s) {$s[1] = 0;$s[2] = 0;return 0;};
    $copy = function(dynamic $s) {return Vector{0, $s[1], $s[2]};};
    $push = function(dynamic $x, dynamic $s) {
      $s[1] = Vector{0, $x, $s[1]};
      $s[2] = (int) ($s[2] + 1);
      return 0;
    };
    $pop = function(dynamic $s) use ($Empty,$caml_wrap_thrown_exception) {
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
    $top = function(dynamic $s) use ($Empty,$caml_wrap_thrown_exception) {
      $a_ = $s[1];
      if ($a_) {$hd = $a_[1];return $hd;}
      throw $caml_wrap_thrown_exception($Empty) as \Throwable;
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
    
     return ($Stack);

  }
  public static function fold(dynamic $f, dynamic $acc, dynamic $s) {
    return static::get()[11]($f, $acc, $s);
  }
  public static function iter(dynamic $f, dynamic $s) {
    return static::get()[10]($f, $s);
  }
  public static function length(dynamic $s) {
    return static::get()[9]($s);
  }
  public static function is_empty(dynamic $s) {
    return static::get()[8]($s);
  }
  public static function copy(dynamic $s) {
    return static::get()[7]($s);
  }
  public static function clear(dynamic $s) {
    return static::get()[6]($s);
  }
  public static function top(dynamic $s) {
    return static::get()[5]($s);
  }
  public static function pop(dynamic $s) {
    return static::get()[4]($s);
  }
  public static function push(dynamic $x, dynamic $s) {
    return static::get()[3]($x, $s);
  }
  public static function create(dynamic $param) {
    return static::get()[2]($param);
  }
  public static function Empty() {
    return static::get()[1]();
  }

}
/* Hashing disabled */
