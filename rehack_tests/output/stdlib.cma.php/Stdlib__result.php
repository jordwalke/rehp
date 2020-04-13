<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class Stdlib__result {
  <<__Override, __Memoize>>
  public static function get() : Vector<dynamic> {
    
    $runtime = (\Rehack\GlobalObject::get() as dynamic)->jsoo_runtime;
    $call1 = $runtime["caml_call1"];
    $call2 = $runtime["caml_call2"];
    $string = $runtime["caml_new_string"];
    $cst_result_is_Ok = $string("result is Ok _");
    $cst_result_is_Error = $string("result is Error _");
    $Stdlib_seq = Stdlib__seq::get();
    $Stdlib = Stdlib::get();
    $ok = (dynamic $v) : dynamic ==> {return Vector{0, $v};};
    $error = (dynamic $e) : dynamic ==> {return Vector{1, $e};};
    $value = (dynamic $r, dynamic $default__0) : dynamic ==> {
      $v = null as dynamic;
      if (0 === $r[0]) {$v = $r[1];return $v;}
      return $default__0;
    };
    $get_ok = (dynamic $param) : dynamic ==> {
      $v = null as dynamic;
      if (0 === $param[0]) {$v = $param[1];return $v;}
      return $call1($Stdlib[1], $cst_result_is_Error);
    };
    $get_error = (dynamic $param) : dynamic ==> {
      if (0 === $param[0]) {return $call1($Stdlib[1], $cst_result_is_Ok);}
      $e = $param[1];
      return $e;
    };
    $bind = (dynamic $r, dynamic $f) : dynamic ==> {
      $v = null as dynamic;
      if (0 === $r[0]) {$v = $r[1];return $call1($f, $v);}
      return $r;
    };
    $join = (dynamic $e) : dynamic ==> {
      $r = null as dynamic;
      if (0 === $e[0]) {$r = $e[1];return $r;}
      return $e;
    };
    $map = (dynamic $f, dynamic $e) : dynamic ==> {
      $v = null as dynamic;
      if (0 === $e[0]) {$v = $e[1];return Vector{0, $call1($f, $v)};}
      return $e;
    };
    $map_error = (dynamic $f, dynamic $v) : dynamic ==> {
      if (0 === $v[0]) {return $v;}
      $e = $v[1];
      return Vector{1, $call1($f, $e)};
    };
    $fold = (dynamic $ok, dynamic $error, dynamic $param) : dynamic ==> {
      $v = null as dynamic;
      if (0 === $param[0]) {$v = $param[1];return $call1($ok, $v);}
      $e = $param[1];
      return $call1($error, $e);
    };
    $iter = (dynamic $f, dynamic $param) : dynamic ==> {
      $v = null as dynamic;
      if (0 === $param[0]) {$v = $param[1];return $call1($f, $v);}
      return 0;
    };
    $iter_error = (dynamic $f, dynamic $param) : dynamic ==> {
      if (0 === $param[0]) {return 0;}
      $e = $param[1];
      return $call1($f, $e);
    };
    $is_ok = (dynamic $param) : dynamic ==> {
      return 0 === $param[0] ? 1 : (0);
    };
    $is_error = (dynamic $param) : dynamic ==> {
      return 0 === $param[0] ? 0 : (1);
    };
    $equal = (dynamic $ok, dynamic $error, dynamic $r0, dynamic $match) : dynamic ==> {
      $e1 = null as dynamic;
      $d_ = null as dynamic;
      $v1 = null as dynamic;
      $c_ = null as dynamic;
      if (0 === $r0[0]) {
        $c_ = $r0[1];
        if (0 === $match[0]) {$v1 = $match[1];return $call2($ok, $c_, $v1);}
      }
      else {
        $d_ = $r0[1];
        if (0 !== $match[0]) {
          $e1 = $match[1];
          return $call2($error, $d_, $e1);
        }
      }
      return 0;
    };
    $compare = (dynamic $ok, dynamic $error, dynamic $r0, dynamic $match) : dynamic ==> {
      $v1 = null as dynamic;
      $a_ = null as dynamic;
      if (0 === $r0[0]) {
        $a_ = $r0[1];
        if (0 === $match[0]) {$v1 = $match[1];return $call2($ok, $a_, $v1);}
        return -1;
      }
      $b_ = $r0[1];
      if (0 === $match[0]) {return 1;}
      $e1 = $match[1];
      return $call2($error, $b_, $e1);
    };
    $to_option = (dynamic $param) : dynamic ==> {
      $v = null as dynamic;
      if (0 === $param[0]) {$v = $param[1];return Vector{0, $v};}
      return 0;
    };
    $to_list = (dynamic $param) : dynamic ==> {
      $v = null as dynamic;
      if (0 === $param[0]) {$v = $param[1];return Vector{0, $v, 0};}
      return 0;
    };
    $to_seq = (dynamic $param) : dynamic ==> {
      $v = null as dynamic;
      if (0 === $param[0]) {$v = $param[1];return $call1($Stdlib_seq[2], $v);}
      return $Stdlib_seq[1];
    };
    $Stdlib_result = Vector{
      0,
      $ok,
      $error,
      $value,
      $get_ok,
      $get_error,
      $bind,
      $join,
      $map,
      $map_error,
      $fold,
      $iter,
      $iter_error,
      $is_ok,
      $is_error,
      $equal,
      $compare,
      $to_option,
      $to_list,
      $to_seq
    } as dynamic;
    
    return($Stdlib_result);

  }
  public static function ok(dynamic $v): dynamic {
    return static::syncCall(__FUNCTION__, 1, $v);
  }
  public static function error(dynamic $e): dynamic {
    return static::syncCall(__FUNCTION__, 2, $e);
  }
  public static function value(dynamic $r, dynamic $default): dynamic {
    return static::syncCall(__FUNCTION__, 3, $r, $default);
  }
  public static function get_ok(dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 4, $param);
  }
  public static function get_error(dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 5, $param);
  }
  public static function bind(dynamic $r, dynamic $f): dynamic {
    return static::syncCall(__FUNCTION__, 6, $r, $f);
  }
  public static function join(dynamic $e): dynamic {
    return static::syncCall(__FUNCTION__, 7, $e);
  }
  public static function map(dynamic $f, dynamic $e): dynamic {
    return static::syncCall(__FUNCTION__, 8, $f, $e);
  }
  public static function map_error(dynamic $f, dynamic $v): dynamic {
    return static::syncCall(__FUNCTION__, 9, $f, $v);
  }
  public static function fold(dynamic $ok, dynamic $error, dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 10, $ok, $error, $param);
  }
  public static function iter(dynamic $f, dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 11, $f, $param);
  }
  public static function iter_error(dynamic $f, dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 12, $f, $param);
  }
  public static function is_ok(dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 13, $param);
  }
  public static function is_error(dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 14, $param);
  }
  public static function equal(dynamic $ok, dynamic $error, dynamic $r0, dynamic $r1): dynamic {
    return static::syncCall(__FUNCTION__, 15, $ok, $error, $r0, $r1);
  }
  public static function compare(dynamic $ok, dynamic $error, dynamic $r0, dynamic $r1): dynamic {
    return static::syncCall(__FUNCTION__, 16, $ok, $error, $r0, $r1);
  }
  public static function to_option(dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 17, $param);
  }
  public static function to_list(dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 18, $param);
  }
  public static function to_seq(dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 19, $param);
  }

}
/* Hashing disabled */
