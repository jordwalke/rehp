<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class Uchar {
  <<__Override, __Memoize>>
  public static function get() : Vector<dynamic> {
    
    $runtime = (\Rehack\GlobalObject::get() as dynamic)->jsoo_runtime;
    $call1 = $runtime["caml_call1"];
    $call2 = $runtime["caml_call2"];
    $caml_format_int = $runtime["caml_format_int"];
    $string = $runtime["caml_new_string"];
    $cst_is_not_a_latin1_character = $string(" is not a latin1 character");
    $cst_04X = $string("%04X");
    $cst_U = $string("U+");
    $cst_is_not_an_Unicode_scalar_value = $string(
      " is not an Unicode scalar value"
    );
    $cst_X = $string("%X");
    $err_no_pred = $string("U+0000 has no predecessor");
    $err_no_succ = $string("U+10FFFF has no successor");
    $Pervasives = Pervasives::get();
    $err_not_sv = (dynamic $i) : dynamic ==> {
      return $call2(
        $Pervasives[16],
        $caml_format_int($cst_X, $i),
        $cst_is_not_an_Unicode_scalar_value
      );
    };
    $err_not_latin1 = (dynamic $u) : dynamic ==> {
      $p_ = $call2(
        $Pervasives[16],
        $caml_format_int($cst_04X, $u),
        $cst_is_not_a_latin1_character
      );
      return $call2($Pervasives[16], $cst_U, $p_);
    };
    $min = 0 as dynamic;
    $max = 1114111 as dynamic;
    $lo_bound = 55295 as dynamic;
    $hi_bound = 57344 as dynamic;
    $bom = 65279 as dynamic;
    $rep = 65533 as dynamic;
    $succ = (dynamic $u) : dynamic ==> {
      return $u === 55295
        ? $hi_bound
        : ($u === 1114111
         ? $call1($Pervasives[1], $err_no_succ)
         : ((int) ($u + 1)));
    };
    $pred = (dynamic $u) : dynamic ==> {
      return $u === 57344
        ? $lo_bound
        : ($u === 0 ? $call1($Pervasives[1], $err_no_pred) : ((int) ($u + -1)));
    };
    $is_valid = (dynamic $i) : dynamic ==> {
      $n_ = null as dynamic;
      $o_ = null as dynamic;
      $l_ = 0 <= $i ? 1 : (0);
      $m_ = $l_ ? $i <= 55295 ? 1 : (0) : ($l_);
      if ($m_) {
        $n_ = $m_;
      }
      else {
        $o_ = 57344 <= $i ? 1 : (0);
        $n_ = $o_ ? $i <= 1114111 ? 1 : (0) : ($o_);
      }
      return $n_;
    };
    $of_int = (dynamic $i) : dynamic ==> {
      if ($is_valid($i)) {return $i;}
      $k_ = $err_not_sv($i);
      return $call1($Pervasives[1], $k_);
    };
    $is_char = (dynamic $u) : dynamic ==> {return $u < 256 ? 1 : (0);};
    $of_char = (dynamic $c) : dynamic ==> {return $c;};
    $to_char = (dynamic $u) : dynamic ==> {
      $j_ = null as dynamic;
      if (255 < $u) {
        $j_ = $err_not_latin1($u);
        return $call1($Pervasives[1], $j_);
      }
      return $u;
    };
    $unsafe_to_char = (dynamic $i_) : dynamic ==> {return $i_;};
    $equal = (dynamic $h_, dynamic $g_) : dynamic ==> {
      return $h_ === $g_ ? 1 : (0);
    };
    $compare = (dynamic $f_, dynamic $e_) : dynamic ==> {
      return $runtime["caml_int_compare"]($f_, $e_);
    };
    $hash = (dynamic $d_) : dynamic ==> {return $d_;};
    $a_ = (dynamic $c_) : dynamic ==> {return $c_;};
    $Uchar = Vector{
      0,
      $min,
      $max,
      $bom,
      $rep,
      $succ,
      $pred,
      $is_valid,
      $of_int,
      (dynamic $b_) : dynamic ==> {return $b_;},
      $a_,
      $is_char,
      $of_char,
      $to_char,
      $unsafe_to_char,
      $equal,
      $compare,
      $hash
    } as dynamic;
    
    return($Uchar);

  }
  public static function succ(dynamic $u): dynamic {
    return static::syncCall(__FUNCTION__, 5, $u);
  }
  public static function pred(dynamic $u): dynamic {
    return static::syncCall(__FUNCTION__, 6, $u);
  }
  public static function is_valid(dynamic $i): dynamic {
    return static::syncCall(__FUNCTION__, 7, $i);
  }
  public static function of_int(dynamic $i): dynamic {
    return static::syncCall(__FUNCTION__, 8, $i);
  }
  public static function is_char(dynamic $u): dynamic {
    return static::syncCall(__FUNCTION__, 11, $u);
  }
  public static function of_char(dynamic $c): dynamic {
    return static::syncCall(__FUNCTION__, 12, $c);
  }
  public static function to_char(dynamic $u): dynamic {
    return static::syncCall(__FUNCTION__, 13, $u);
  }
  public static function unsafe_to_char(dynamic $unnamed1): dynamic {
    return static::syncCall(__FUNCTION__, 14, $unnamed1);
  }
  public static function equal(dynamic $unnamed1, dynamic $unnamed2): dynamic {
    return static::syncCall(__FUNCTION__, 15, $unnamed1, $unnamed2);
  }
  public static function compare(dynamic $unnamed1, dynamic $unnamed2): dynamic {
    return static::syncCall(__FUNCTION__, 16, $unnamed1, $unnamed2);
  }
  public static function hash(dynamic $unnamed1): dynamic {
    return static::syncCall(__FUNCTION__, 17, $unnamed1);
  }

}
/* Hashing disabled */
