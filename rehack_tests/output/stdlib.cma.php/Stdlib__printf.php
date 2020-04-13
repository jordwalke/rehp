<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class Stdlib__printf {
  <<__Override, __Memoize>>
  public static function get() : Vector<dynamic> {
    
    $runtime = (\Rehack\GlobalObject::get() as dynamic)->jsoo_runtime;
    $call1 = $runtime["caml_call1"];
    $call2 = $runtime["caml_call2"];
    $call3 = $runtime["caml_call3"];
    $Stdlib_buffer = Stdlib__buffer::get();
    $CamlinternalFormat = CamlinternalFormat::get();
    $Stdlib = Stdlib::get();
    $kfprintf = (dynamic $k, dynamic $o, dynamic $param) : dynamic ==> {
      $fmt = $param[1];
      $f_ = 0 as dynamic;
      $g_ = (dynamic $acc) : dynamic ==> {
        $call2($CamlinternalFormat[9], $o, $acc);
        return $call1($k, $o);
      };
      return $call3($CamlinternalFormat[7], $g_, $f_, $fmt);
    };
    $kbprintf = (dynamic $k, dynamic $b, dynamic $param) : dynamic ==> {
      $fmt = $param[1];
      $d_ = 0 as dynamic;
      $e_ = (dynamic $acc) : dynamic ==> {
        $call2($CamlinternalFormat[10], $b, $acc);
        return $call1($k, $b);
      };
      return $call3($CamlinternalFormat[7], $e_, $d_, $fmt);
    };
    $ikfprintf = (dynamic $k, dynamic $oc, dynamic $param) : dynamic ==> {
      $fmt = $param[1];
      return $call3($CamlinternalFormat[8], $k, $oc, $fmt);
    };
    $fprintf = (dynamic $oc, dynamic $fmt) : dynamic ==> {
      return $kfprintf((dynamic $c_) : dynamic ==> {return 0;}, $oc, $fmt);
    };
    $bprintf = (dynamic $b, dynamic $fmt) : dynamic ==> {
      return $kbprintf((dynamic $b_) : dynamic ==> {return 0;}, $b, $fmt);
    };
    $ifprintf = (dynamic $oc, dynamic $fmt) : dynamic ==> {
      return $ikfprintf((dynamic $a_) : dynamic ==> {return 0;}, $oc, $fmt);
    };
    $printf = (dynamic $fmt) : dynamic ==> {
      return $fprintf($Stdlib[39], $fmt);
    };
    $eprintf = (dynamic $fmt) : dynamic ==> {
      return $fprintf($Stdlib[40], $fmt);
    };
    $ksprintf = (dynamic $k, dynamic $param) : dynamic ==> {
      $fmt = $param[1];
      $k__0 = (dynamic $acc) : dynamic ==> {
        $buf = $call1($Stdlib_buffer[1], 64);
        $call2($CamlinternalFormat[11], $buf, $acc);
        return $call1($k, $call1($Stdlib_buffer[2], $buf));
      };
      return $call3($CamlinternalFormat[7], $k__0, 0, $fmt);
    };
    $sprintf = (dynamic $fmt) : dynamic ==> {
      return $ksprintf((dynamic $s) : dynamic ==> {return $s;}, $fmt);
    };
    $Stdlib_printf = Vector{
      0,
      $fprintf,
      $printf,
      $eprintf,
      $sprintf,
      $bprintf,
      $ifprintf,
      $kfprintf,
      $ikfprintf,
      $ksprintf,
      $kbprintf,
      $ksprintf
    } as dynamic;
    
    return($Stdlib_printf);

  }
  public static function fprintf(dynamic $oc, dynamic $fmt): dynamic {
    return static::syncCall(__FUNCTION__, 1, $oc, $fmt);
  }
  public static function printf(dynamic $fmt): dynamic {
    return static::syncCall(__FUNCTION__, 2, $fmt);
  }
  public static function eprintf(dynamic $fmt): dynamic {
    return static::syncCall(__FUNCTION__, 3, $fmt);
  }
  public static function sprintf(dynamic $fmt): dynamic {
    return static::syncCall(__FUNCTION__, 4, $fmt);
  }
  public static function bprintf(dynamic $b, dynamic $fmt): dynamic {
    return static::syncCall(__FUNCTION__, 5, $b, $fmt);
  }
  public static function ifprintf(dynamic $oc, dynamic $fmt): dynamic {
    return static::syncCall(__FUNCTION__, 6, $oc, $fmt);
  }
  public static function kfprintf(dynamic $k, dynamic $o, dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 7, $k, $o, $param);
  }
  public static function ikfprintf(dynamic $k, dynamic $oc, dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 8, $k, $oc, $param);
  }
  public static function ksprintf(dynamic $k, dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 9, $k, $param);
  }
  public static function kbprintf(dynamic $k, dynamic $b, dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 10, $k, $b, $param);
  }

}
/* Hashing disabled */
