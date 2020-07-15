<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class Stdlib__stack {
  <<__Override, __Memoize>>
  public static function get() : Vector<dynamic> {
    
    $runtime = (\Rehack\GlobalObject::get() as dynamic)->jsoo_runtime;
    $call1 = $runtime["caml_call1"];
    $call2 = $runtime["caml_call2"];
    $call3 = $runtime["caml_call3"];
    $caml_wrap_thrown_exception = $runtime["caml_wrap_thrown_exception"];
    $cst_Stdlib_Stack_Empty = $runtime["caml_new_string"]("Stdlib.Stack.Empty");
    $Stdlib_seq = Stdlib__seq::get();
    $Stdlib_list = Stdlib__list::get();
    $Empty = Vector{
      248,
      $cst_Stdlib_Stack_Empty,
      $runtime["caml_fresh_oo_id"](0)
    } as dynamic;
    $create = (dynamic $param) : dynamic ==> {return Vector{0, 0, 0};};
    $clear = (dynamic $s) : dynamic ==> {$s[1] = 0;$s[2] = 0;return 0;};
    $copy = (dynamic $s) : dynamic ==> {return Vector{0, $s[1], $s[2]};};
    $push = (dynamic $x, dynamic $s) : dynamic ==> {
      $s[1] = Vector{0, $x, $s[1]};
      $s[2] = (int) ($s[2] + 1);
      return 0;
    };
    $pop = (dynamic $s) : dynamic ==> {
      $hd = null as dynamic;
      $tl = null as dynamic;
      $e_ = $s[1];
      if ($e_) {
        $tl = $e_[2];
        $hd = $e_[1];
        $s[1] = $tl;
        $s[2] = (int) ($s[2] + -1);
        return $hd;
      }
      throw $caml_wrap_thrown_exception($Empty) as \Throwable;
    };
    $pop_opt = (dynamic $s) : dynamic ==> {
      $hd = null as dynamic;
      $tl = null as dynamic;
      $d_ = $s[1];
      if ($d_) {
        $tl = $d_[2];
        $hd = $d_[1];
        $s[1] = $tl;
        $s[2] = (int) ($s[2] + -1);
        return Vector{0, $hd};
      }
      return 0;
    };
    $top = (dynamic $s) : dynamic ==> {
      $hd = null as dynamic;
      $c_ = $s[1];
      if ($c_) {$hd = $c_[1];return $hd;}
      throw $caml_wrap_thrown_exception($Empty) as \Throwable;
    };
    $top_opt = (dynamic $s) : dynamic ==> {
      $hd = null as dynamic;
      $b_ = $s[1];
      if ($b_) {$hd = $b_[1];return Vector{0, $hd};}
      return 0;
    };
    $is_empty = (dynamic $s) : dynamic ==> {return 0 === $s[1] ? 1 : (0);};
    $length = (dynamic $s) : dynamic ==> {return $s[2];};
    $iter = (dynamic $f, dynamic $s) : dynamic ==> {
      return $call2($Stdlib_list[15], $f, $s[1]);
    };
    $fold = (dynamic $f, dynamic $acc, dynamic $s) : dynamic ==> {
      return $call3($Stdlib_list[21], $f, $acc, $s[1]);
    };
    $to_seq = (dynamic $s) : dynamic ==> {
      return $call1($Stdlib_list[54], $s[1]);
    };
    $add_seq = (dynamic $q, dynamic $i) : dynamic ==> {
      $a_ = (dynamic $x) : dynamic ==> {return $push($x, $q);};
      return $call2($Stdlib_seq[8], $a_, $i);
    };
    $of_seq = (dynamic $g) : dynamic ==> {
      $s = $create(0);
      $add_seq($s, $g);
      return $s;
    };
    $Stdlib_stack = Vector{
      0,
      $Empty,
      $create,
      $push,
      $pop,
      $pop_opt,
      $top,
      $top_opt,
      $clear,
      $copy,
      $is_empty,
      $length,
      $iter,
      $fold,
      $to_seq,
      $add_seq,
      $of_seq
    } as dynamic;
    
    return($Stdlib_stack);

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
  public static function pop_opt(dynamic $s): dynamic {
    return static::syncCall(__FUNCTION__, 5, $s);
  }
  public static function top(dynamic $s): dynamic {
    return static::syncCall(__FUNCTION__, 6, $s);
  }
  public static function top_opt(dynamic $s): dynamic {
    return static::syncCall(__FUNCTION__, 7, $s);
  }
  public static function clear(dynamic $s): dynamic {
    return static::syncCall(__FUNCTION__, 8, $s);
  }
  public static function copy(dynamic $s): dynamic {
    return static::syncCall(__FUNCTION__, 9, $s);
  }
  public static function is_empty(dynamic $s): dynamic {
    return static::syncCall(__FUNCTION__, 10, $s);
  }
  public static function length(dynamic $s): dynamic {
    return static::syncCall(__FUNCTION__, 11, $s);
  }
  public static function iter(dynamic $f, dynamic $s): dynamic {
    return static::syncCall(__FUNCTION__, 12, $f, $s);
  }
  public static function fold(dynamic $f, dynamic $acc, dynamic $s): dynamic {
    return static::syncCall(__FUNCTION__, 13, $f, $acc, $s);
  }
  public static function to_seq(dynamic $s): dynamic {
    return static::syncCall(__FUNCTION__, 14, $s);
  }
  public static function add_seq(dynamic $q, dynamic $i): dynamic {
    return static::syncCall(__FUNCTION__, 15, $q, $i);
  }
  public static function of_seq(dynamic $g): dynamic {
    return static::syncCall(__FUNCTION__, 16, $g);
  }

}
/* Hashing disabled */
