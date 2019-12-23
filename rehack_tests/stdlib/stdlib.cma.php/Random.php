<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class Random {
  <<__Override, __Memoize>>
  public static function requireModule() : Vector<dynamic> {
    $joo_global_object = \Rehack\GlobalObject::get() as dynamic;
    
    $runtime = $joo_global_object->jsoo_runtime;
    $call1 = $runtime["caml_call1"];
    $call2 = $runtime["caml_call2"];
    $call5 = $runtime["caml_call5"];
    $caml_check_bound = $runtime["caml_check_bound"];
    $caml_greaterthan = $runtime["caml_greaterthan"];
    $caml_int64_of_int32 = $runtime["caml_int64_of_int32"];
    $caml_int64_or = $runtime["caml_int64_or"];
    $caml_int64_shift_left = $runtime["caml_int64_shift_left"];
    $caml_int64_sub = $runtime["caml_int64_sub"];
    $caml_lessequal = $runtime["caml_lessequal"];
    $caml_mod = $runtime["caml_mod"];
    $string = $runtime["caml_new_string"];
    $caml_string_get = $runtime["caml_string_get"];
    $caml_sys_random_seed = $runtime["caml_sys_random_seed"];
    $left_shift_32 = $runtime["left_shift_32"];
    $unsigned_right_shift_32 = $runtime["unsigned_right_shift_32"];
    $cst_Random_int64 = $string("Random.int64");
    $cst_Random_int32 = $string("Random.int32");
    $cst_Random_int = $string("Random.int");
    $cst_x = $string("x");
    $Int32 =  Int32::requireModule ();
    $Int64 =  Int64::requireModule ();
    $Pervasives =  Pervasives::requireModule ();
    $Digest =  Digest::requireModule ();
    $Array =  Array_::requireModule ();
    $Nativeint =  Nativeint::requireModule ();
    $a_ = Vector{255, 1, 0, 0};
    $b_ = Vector{255, 0, 0, 0};
    $c_ = Vector{
      0,
      987910699,
      495797812,
      364182224,
      414272206,
      318284740,
      990407751,
      383018966,
      270373319,
      840823159,
      24560019,
      536292337,
      512266505,
      189156120,
      730249596,
      143776328,
      51606627,
      140166561,
      366354223,
      1003410265,
      700563762,
      981890670,
      913149062,
      526082594,
      1021425055,
      784300257,
      667753350,
      630144451,
      949649812,
      48546892,
      415514493,
      258888527,
      511570777,
      89983870,
      283659902,
      308386020,
      242688715,
      482270760,
      865188196,
      1027664170,
      207196989,
      193777847,
      619708188,
      671350186,
      149669678,
      257044018,
      87658204,
      558145612,
      183450813,
      28133145,
      901332182,
      710253903,
      510646120,
      652377910,
      409934019,
      801085050
    };
    $new_state = (dynamic $param) ==> {
      return Vector{0, $runtime["caml_make_vect"](55, 0), 0};
    };
    $assign = (dynamic $st1, dynamic $st2) ==> {
      $call5($Array[10], $st2[1], 0, $st1[1], 0, 55);
      $st1[2] = $st2[2];
      return 0;
    };
    $full_init = (dynamic $s, dynamic $seed) ==> {
      $combine = (dynamic $accu, dynamic $x) ==> {
        $q_ = $call1($Pervasives[21], $x);
        $r_ = $call2($Pervasives[16], $accu, $q_);
        return $call1($Digest[3], $r_);
      };
      $extract = (dynamic $d) ==> {
        $n_ = $left_shift_32($caml_string_get($d, 3), 24);
        $o_ = $left_shift_32($caml_string_get($d, 2), 16);
        $p_ = $left_shift_32($caml_string_get($d, 1), 8);
        return (int)
        ((int) ((int) ($caml_string_get($d, 0) + $p_) + $o_) + $n_);
      };
      $seed__0 = 0 === $seed->count() - 1 ? Vector{0, 0} : ($seed);
      $l = $seed__0->count() - 1;
      $i__0 = 0;
      for (;;) {
        $caml_check_bound($s[1], $i__0)[$i__0 + 1] = $i__0;
        $m_ = (int) ($i__0 + 1);
        if (54 !== $i__0) {$i__0 = $m_;continue;}
        $accu = Vector{0, $cst_x};
        $h_ = (int) (54 + $call2($Pervasives[5], 55, $l));
        $g_ = 0;
        if (! ($h_ < 0)) {
          $i = $g_;
          for (;;) {
            $j = (int) ($i % 55);
            $k = $caml_mod($i, $l);
            $i_ = $caml_check_bound($seed__0, $k)[$k + 1];
            $accu[1] = $combine($accu[1], $i_);
            $j_ = $extract($accu[1]);
            $k_ = ($caml_check_bound($s[1], $j)[$j + 1] ^ $j_) & 1073741823;
            $caml_check_bound($s[1], $j)[$j + 1] = $k_;
            $l_ = (int) ($i + 1);
            if ($h_ !== $i) {$i = $l_;continue;}
            break;
          }
        }
        $s[2] = 0;
        return 0;
      }
    };
    $make = (dynamic $seed) ==> {
      $result = $new_state(0);
      $full_init($result, $seed);
      return $result;
    };
    $make_self_init = (dynamic $param) ==> {
      return $make($caml_sys_random_seed(0));
    };
    $copy = (dynamic $s) ==> {
      $result = $new_state(0);
      $assign($result, $s);
      return $result;
    };
    $bits = (dynamic $s) ==> {
      $s[2] = (int) ((int) ($s[2] + 1) % 55);
      $d_ = $s[2];
      $curval = $caml_check_bound($s[1], $d_)[$d_ + 1];
      $e_ = (int) ((int) ($s[2] + 24) % 55);
      $newval = (int)
      ($caml_check_bound($s[1], $e_)[$e_ + 1] +
         ($curval ^ (int) $unsigned_right_shift_32($curval, 25) & 31));
      $newval30 = $newval & 1073741823;
      $f_ = $s[2];
      $caml_check_bound($s[1], $f_)[$f_ + 1] = $newval30;
      return $newval30;
    };
    $intaux = (dynamic $s, dynamic $n) ==> {
      for (;;) {
        $r = $bits($s);
        $v = $caml_mod($r, $n);
        if ((int) ((int) (1073741823 - $n) + 1) < (int) ($r - $v)) {continue;}
        return $v;
      }
    };
    $int__0 = (dynamic $s, dynamic $bound) ==> {
      if (! (1073741823 < $bound)) {
        if (0 < $bound) {return $intaux($s, $bound);}
      }
      return $call1($Pervasives[1], $cst_Random_int);
    };
    $int32aux = (dynamic $s, dynamic $n) ==> {
      for (;;) {
        $b1 = $bits($s);
        $b2 = $left_shift_32($bits($s) & 1, 30);
        $r = $b1 | $b2;
        $v = $caml_mod($r, $n);
        if (
          $caml_greaterthan(
            (int)
            ($r - $v),
            (int)
            ((int) ($Int32[7] - $n) + 1)
          )
        ) {continue;}
        return $v;
      }
    };
    $int32 = (dynamic $s, dynamic $bound) ==> {
      return $caml_lessequal($bound, 0)
        ? $call1($Pervasives[1], $cst_Random_int32)
        : ($int32aux($s, $bound));
    };
    $int64aux = (dynamic $s, dynamic $n) ==> {
      for (;;) {
        $b1 = $caml_int64_of_int32($bits($s));
        $b2 = $caml_int64_shift_left($caml_int64_of_int32($bits($s)), 30);
        $b3 = $caml_int64_shift_left($caml_int64_of_int32($bits($s) & 7), 60);
        $r = $caml_int64_or($b1, $caml_int64_or($b2, $b3));
        $v = $runtime["caml_int64_mod"]($r, $n);
        if (
          $caml_greaterthan(
            $caml_int64_sub($r, $v),
            $runtime["caml_int64_add"]($caml_int64_sub($Int64[7], $n), $a_)
          )
        ) {continue;}
        return $v;
      }
    };
    $int64 = (dynamic $s, dynamic $bound) ==> {
      return $caml_lessequal($bound, $b_)
        ? $call1($Pervasives[1], $cst_Random_int64)
        : ($int64aux($s, $bound));
    };
    $nativeint = 32 === $Nativeint[7]
      ? (dynamic $s, dynamic $bound) ==> {return $int32($s, $bound);}
      : ((dynamic $s, dynamic $bound) ==> {
       return $runtime["caml_int64_to_int32"](
         $int64($s, $caml_int64_of_int32($bound))
       );
     });
    $rawfloat = (dynamic $s) ==> {
      $r1 = $bits($s);
      $r2 = $bits($s);
      return ($r1 / 1073741824 + $r2) / 1073741824;
    };
    $float__0 = (dynamic $s, dynamic $bound) ==> {
      return $rawfloat($s) * $bound;
    };
    $bool = (dynamic $s) ==> {return 0 === ($bits($s) & 1) ? 1 : (0);};
    $default__0 = Vector{0, $c_->toVector(), 0};
    $bits__0 = (dynamic $param) ==> {return $bits($default__0);};
    $int__1 = (dynamic $bound) ==> {return $int__0($default__0, $bound);};
    $int32__0 = (dynamic $bound) ==> {return $int32($default__0, $bound);};
    $nativeint__0 = (dynamic $bound) ==> {
      return $nativeint($default__0, $bound);
    };
    $int64__0 = (dynamic $bound) ==> {return $int64($default__0, $bound);};
    $float__1 = (dynamic $scale) ==> {return $float__0($default__0, $scale);};
    $bool__0 = (dynamic $param) ==> {return $bool($default__0);};
    $full_init__0 = (dynamic $seed) ==> {
      return $full_init($default__0, $seed);
    };
    $init = (dynamic $seed) ==> {
      return $full_init($default__0, Vector{0, $seed});
    };
    $self_init = (dynamic $param) ==> {
      return $full_init__0($caml_sys_random_seed(0));
    };
    $get_state = (dynamic $param) ==> {return $copy($default__0);};
    $set_state = (dynamic $s) ==> {return $assign($default__0, $s);};
    $Random = Vector{
      0,
      $init,
      $full_init__0,
      $self_init,
      $bits__0,
      $int__1,
      $int32__0,
      $nativeint__0,
      $int64__0,
      $float__1,
      $bool__0,
      Vector{
        0,
        $make,
        $make_self_init,
        $copy,
        $bits,
        $int__0,
        $int32,
        $nativeint,
        $int64,
        $float__0,
        $bool
      },
      $get_state,
      $set_state
    };
    
     return ($Random);

  }
  public static function init(dynamic $seed): dynamic {
    return static::callRehackFunction(static::requireModule()[1], varray[$seed]);
  }
  public static function full_init(dynamic $seed): dynamic {
    return static::callRehackFunction(static::requireModule()[2], varray[$seed]);
  }
  public static function self_init(dynamic $param): dynamic {
    return static::callRehackFunction(static::requireModule()[3], varray[$param]);
  }
  public static function bits(dynamic $param): dynamic {
    return static::callRehackFunction(static::requireModule()[4], varray[$param]);
  }
  public static function _int_(dynamic $bound): dynamic {
    return static::callRehackFunction(static::requireModule()[5], varray[$bound]);
  }
  public static function int32(dynamic $bound): dynamic {
    return static::callRehackFunction(static::requireModule()[6], varray[$bound]);
  }
  public static function nativeint(dynamic $bound): dynamic {
    return static::callRehackFunction(static::requireModule()[7], varray[$bound]);
  }
  public static function int64(dynamic $bound): dynamic {
    return static::callRehackFunction(static::requireModule()[8], varray[$bound]);
  }
  public static function _float_(dynamic $scale): dynamic {
    return static::callRehackFunction(static::requireModule()[9], varray[$scale]);
  }
  public static function bool(dynamic $param): dynamic {
    return static::callRehackFunction(static::requireModule()[10], varray[$param]);
  }
  public static function get_state(dynamic $param): dynamic {
    return static::callRehackFunction(static::requireModule()[12], varray[$param]);
  }
  public static function set_state(dynamic $s): dynamic {
    return static::callRehackFunction(static::requireModule()[13], varray[$s]);
  }

}
/* Hashing disabled */
