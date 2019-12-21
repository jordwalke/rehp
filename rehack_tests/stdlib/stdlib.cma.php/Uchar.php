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
    $joo_global_object = \Rehack\GlobalObject::get() as dynamic;
    
    $runtime = $joo_global_object->jsoo_runtime;
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
    $Pervasives =  Pervasives::get ();
    $err_not_sv = (dynamic $i) ==> {
      return $call2(
        $Pervasives[16],
        $caml_format_int($cst_X, $i),
        $cst_is_not_an_Unicode_scalar_value
      );
    };
    $err_not_latin1 = (dynamic $u) ==> {
      $p_ = $call2(
        $Pervasives[16],
        $caml_format_int($cst_04X, $u),
        $cst_is_not_a_latin1_character
      );
      return $call2($Pervasives[16], $cst_U, $p_);
    };
    $min = 0;
    $max = 1114111;
    $lo_bound = 55295;
    $hi_bound = 57344;
    $bom = 65279;
    $rep = 65533;
    $succ = (dynamic $u) ==> {
      return $u === 55295
        ? $hi_bound
        : ($u === 1114111
         ? $call1($Pervasives[1], $err_no_succ)
         : ((int) ($u + 1)));
    };
    $pred = (dynamic $u) ==> {
      return $u === 57344
        ? $lo_bound
        : ($u === 0 ? $call1($Pervasives[1], $err_no_pred) : ((int) ($u + -1)));
    };
    $is_valid = (dynamic $i) ==> {
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
    $of_int = (dynamic $i) ==> {
      if ($is_valid($i)) {return $i;}
      $k_ = $err_not_sv($i);
      return $call1($Pervasives[1], $k_);
    };
    $is_char = (dynamic $u) ==> {return $u < 256 ? 1 : (0);};
    $of_char = (dynamic $c) ==> {return $c;};
    $to_char = (dynamic $u) ==> {
      if (255 < $u) {
        $j_ = $err_not_latin1($u);
        return $call1($Pervasives[1], $j_);
      }
      return $u;
    };
    $unsafe_to_char = (dynamic $i_) ==> {return $i_;};
    $equal = (dynamic $h_, dynamic $g_) ==> {return $h_ === $g_ ? 1 : (0);};
    $compare = (dynamic $f_, dynamic $e_) ==> {
      return $runtime["caml_int_compare"]($f_, $e_);
    };
    $hash = (dynamic $d_) ==> {return $d_;};
    $a_ = (dynamic $c_) ==> {return $c_;};
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
      (dynamic $b_) ==> {return $b_;},
      $a_,
      $is_char,
      $of_char,
      $to_char,
      $unsafe_to_char,
      $equal,
      $compare,
      $hash
    };
    
     return ($Uchar);

  }
  public static function min(): dynamic {
    return static::callRehackFunction(static::get()[1], varray[]);
  }
  public static function max(): dynamic {
    return static::callRehackFunction(static::get()[2], varray[]);
  }
  public static function bom(): dynamic {
    return static::callRehackFunction(static::get()[3], varray[]);
  }
  public static function rep(): dynamic {
    return static::callRehackFunction(static::get()[4], varray[]);
  }
  public static function succ(dynamic $u): dynamic {
    return static::callRehackFunction(static::get()[5], varray[$u]);
  }
  public static function pred(dynamic $u): dynamic {
    return static::callRehackFunction(static::get()[6], varray[$u]);
  }
  public static function is_valid(dynamic $i): dynamic {
    return static::callRehackFunction(static::get()[7], varray[$i]);
  }
  public static function of_int(dynamic $i): dynamic {
    return static::callRehackFunction(static::get()[8], varray[$i]);
  }
  public static function is_char(dynamic $u): dynamic {
    return static::callRehackFunction(static::get()[11], varray[$u]);
  }
  public static function of_char(dynamic $c): dynamic {
    return static::callRehackFunction(static::get()[12], varray[$c]);
  }
  public static function to_char(dynamic $u): dynamic {
    return static::callRehackFunction(static::get()[13], varray[$u]);
  }
  public static function unsafe_to_char(dynamic $unnamed1): dynamic {
    return static::callRehackFunction(static::get()[14], varray[$unnamed1]);
  }
  public static function equal(dynamic $unnamed1, dynamic $unnamed2): dynamic {
    return static::callRehackFunction(static::get()[15], varray[$unnamed1, $unnamed2]);
  }
  public static function compare(dynamic $unnamed1, dynamic $unnamed2): dynamic {
    return static::callRehackFunction(static::get()[16], varray[$unnamed1, $unnamed2]);
  }
  public static function hash(dynamic $unnamed1): dynamic {
    return static::callRehackFunction(static::get()[17], varray[$unnamed1]);
  }

}
/* Hashing disabled */
