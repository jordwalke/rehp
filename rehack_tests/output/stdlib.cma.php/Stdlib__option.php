<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class Stdlib__option {
  <<__Override, __Memoize>>
  public static function get() : Vector<dynamic> {
    
    $runtime = (\Rehack\GlobalObject::get() as dynamic)->jsoo_runtime;
    $call1 = $runtime["caml_call1"];
    $call2 = $runtime["caml_call2"];
    $cst_option_is_None = $runtime["caml_new_string"]("option is None");
    $Stdlib_seq = Stdlib__seq::get();
    $Stdlib = Stdlib::get();
    $none = 0 as dynamic;
    $some = (dynamic $v) : dynamic ==> {return Vector{0, $v};};
    $value = (dynamic $o, dynamic $default__0) : dynamic ==> {
      $v = null as dynamic;
      if ($o) {$v = $o[1];return $v;}
      return $default__0;
    };
    $get = (dynamic $param) : dynamic ==> {
      $v = null as dynamic;
      if ($param) {$v = $param[1];return $v;}
      return $call1($Stdlib[1], $cst_option_is_None);
    };
    $bind = (dynamic $o, dynamic $f) : dynamic ==> {
      $v = null as dynamic;
      if ($o) {$v = $o[1];return $call1($f, $v);}
      return 0;
    };
    $join = (dynamic $param) : dynamic ==> {
      $b_ = null as dynamic;
      if ($param) {$b_ = $param[1];if ($b_) {return $b_;}}
      return 0;
    };
    $map = (dynamic $f, dynamic $o) : dynamic ==> {
      $v = null as dynamic;
      if ($o) {$v = $o[1];return Vector{0, $call1($f, $v)};}
      return 0;
    };
    $fold = (dynamic $none, dynamic $some, dynamic $param) : dynamic ==> {
      $v = null as dynamic;
      if ($param) {$v = $param[1];return $call1($some, $v);}
      return $none;
    };
    $iter = (dynamic $f, dynamic $param) : dynamic ==> {
      $v = null as dynamic;
      if ($param) {$v = $param[1];return $call1($f, $v);}
      return 0;
    };
    $is_none = (dynamic $param) : dynamic ==> {return $param ? 0 : (1);};
    $is_some = (dynamic $param) : dynamic ==> {return $param ? 1 : (0);};
    $equal = (dynamic $eq, dynamic $o0, dynamic $o1) : dynamic ==> {
      $v0 = null as dynamic;
      $v1 = null as dynamic;
      if ($o0) {
        if ($o1) {$v1 = $o1[1];$v0 = $o0[1];return $call2($eq, $v0, $v1);}
      }
      else {if (! $o1) {return 1;}}
      return 0;
    };
    $compare = (dynamic $cmp, dynamic $o0, dynamic $o1) : dynamic ==> {
      $a_ = null as dynamic;
      $v1 = null as dynamic;
      if ($o0) {
        $a_ = $o0[1];
        if ($o1) {$v1 = $o1[1];return $call2($cmp, $a_, $v1);}
        return 1;
      }
      return $o1 ? -1 : (0);
    };
    $to_result = (dynamic $none, dynamic $param) : dynamic ==> {
      $v = null as dynamic;
      if ($param) {$v = $param[1];return Vector{0, $v};}
      return Vector{1, $none};
    };
    $to_list = (dynamic $param) : dynamic ==> {
      $v = null as dynamic;
      if ($param) {$v = $param[1];return Vector{0, $v, 0};}
      return 0;
    };
    $to_seq = (dynamic $param) : dynamic ==> {
      $v = null as dynamic;
      if ($param) {$v = $param[1];return $call1($Stdlib_seq[2], $v);}
      return $Stdlib_seq[1];
    };
    $Stdlib_option = Vector{
      0,
      $none,
      $some,
      $value,
      $get,
      $bind,
      $join,
      $map,
      $fold,
      $iter,
      $is_none,
      $is_some,
      $equal,
      $compare,
      $to_result,
      $to_list,
      $to_seq
    } as dynamic;
    
    return($Stdlib_option);

  }
  public static function some(dynamic $v): dynamic {
    return static::syncCall(__FUNCTION__, 2, $v);
  }
  public static function value(dynamic $o, dynamic $default): dynamic {
    return static::syncCall(__FUNCTION__, 3, $o, $default);
  }
  public static function _get(dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 4, $param);
  }
  public static function bind(dynamic $o, dynamic $f): dynamic {
    return static::syncCall(__FUNCTION__, 5, $o, $f);
  }
  public static function join(dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 6, $param);
  }
  public static function map(dynamic $f, dynamic $o): dynamic {
    return static::syncCall(__FUNCTION__, 7, $f, $o);
  }
  public static function fold(dynamic $none, dynamic $some, dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 8, $none, $some, $param);
  }
  public static function iter(dynamic $f, dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 9, $f, $param);
  }
  public static function is_none(dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 10, $param);
  }
  public static function is_some(dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 11, $param);
  }
  public static function equal(dynamic $eq, dynamic $o0, dynamic $o1): dynamic {
    return static::syncCall(__FUNCTION__, 12, $eq, $o0, $o1);
  }
  public static function compare(dynamic $cmp, dynamic $o0, dynamic $o1): dynamic {
    return static::syncCall(__FUNCTION__, 13, $cmp, $o0, $o1);
  }
  public static function to_result(dynamic $none, dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 14, $none, $param);
  }
  public static function to_list(dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 15, $param);
  }
  public static function to_seq(dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 16, $param);
  }

}
/* Hashing disabled */
