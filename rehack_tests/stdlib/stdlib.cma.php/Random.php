<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class Random {
  <<__Override, __Memoize>>
  public static function get() : Vector<dynamic> {
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
    $Int32 =  Int32::get ();
    $Int64 =  Int64::get ();
    $Pervasives =  Pervasives::get ();
    $Digest =  Digest::get ();
    $Array =  Array_::get ();
    $Nativeint =  Nativeint::get ();
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
    $new_state = function(dynamic $param) use ($runtime) {
      return Vector{0, $runtime["caml_make_vect"](55, 0), 0};
    };
    $assign = function(dynamic $st1, dynamic $st2) use ($Array,$call5) {
      $call5($Array[10], $st2[1], 0, $st1[1], 0, 55);
      $st1[2] = $st2[2];
      return 0;
    };
    $full_init = function(dynamic $s, dynamic $seed) use ($Digest,$Pervasives,$call1,$call2,$caml_check_bound,$caml_mod,$caml_string_get,$cst_x,$left_shift_32) {
      $combine = function(dynamic $accu, dynamic $x) use ($Digest,$Pervasives,$call1,$call2) {
        $q_ = $call1($Pervasives[21], $x);
        $r_ = $call2($Pervasives[16], $accu, $q_);
        return $call1($Digest[3], $r_);
      };
      $extract = function(dynamic $d) use ($caml_string_get,$left_shift_32) {
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
    $make = function(dynamic $seed) use ($full_init,$new_state) {
      $result = $new_state(0);
      $full_init($result, $seed);
      return $result;
    };
    $make_self_init = function(dynamic $param) use ($caml_sys_random_seed,$make) {
      return $make($caml_sys_random_seed(0));
    };
    $copy = function(dynamic $s) use ($assign,$new_state) {
      $result = $new_state(0);
      $assign($result, $s);
      return $result;
    };
    $bits = function(dynamic $s) use ($caml_check_bound,$unsigned_right_shift_32) {
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
    $intaux = function(dynamic $s, dynamic $n) use ($bits,$caml_mod) {
      for (;;) {
        $r = $bits($s);
        $v = $caml_mod($r, $n);
        if ((int) ((int) (1073741823 - $n) + 1) < (int) ($r - $v)) {continue;}
        return $v;
      }
    };
    $int__0 = function(dynamic $s, dynamic $bound) use ($Pervasives,$call1,$cst_Random_int,$intaux) {
      if (! (1073741823 < $bound)) {
        if (0 < $bound) {return $intaux($s, $bound);}
      }
      return $call1($Pervasives[1], $cst_Random_int);
    };
    $int32aux = function(dynamic $s, dynamic $n) use ($Int32,$bits,$caml_greaterthan,$caml_mod,$left_shift_32) {
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
    $int32 = function(dynamic $s, dynamic $bound) use ($Pervasives,$call1,$caml_lessequal,$cst_Random_int32,$int32aux) {
      return $caml_lessequal($bound, 0)
        ? $call1($Pervasives[1], $cst_Random_int32)
        : ($int32aux($s, $bound));
    };
    $int64aux = function(dynamic $s, dynamic $n) use ($Int64,$a_,$bits,$caml_greaterthan,$caml_int64_of_int32,$caml_int64_or,$caml_int64_shift_left,$caml_int64_sub,$runtime) {
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
    $int64 = function(dynamic $s, dynamic $bound) use ($Pervasives,$b_,$call1,$caml_lessequal,$cst_Random_int64,$int64aux) {
      return $caml_lessequal($bound, $b_)
        ? $call1($Pervasives[1], $cst_Random_int64)
        : ($int64aux($s, $bound));
    };
    $nativeint = 32 === $Nativeint[7]
      ? function(dynamic $s, dynamic $bound) use ($int32) {
       return $int32($s, $bound);
     }
      : (function(dynamic $s, dynamic $bound) use ($caml_int64_of_int32,$int64,$runtime) {
       return $runtime["caml_int64_to_int32"](
         $int64($s, $caml_int64_of_int32($bound))
       );
     });
    $rawfloat = function(dynamic $s) use ($bits) {
      $r1 = $bits($s);
      $r2 = $bits($s);
      return ($r1 / 1073741824 + $r2) / 1073741824;
    };
    $float__0 = function(dynamic $s, dynamic $bound) use ($rawfloat) {
      return $rawfloat($s) * $bound;
    };
    $bool = function(dynamic $s) use ($bits) {
      return 0 === ($bits($s) & 1) ? 1 : (0);
    };
    $default__0 = Vector{0, $c_->toVector(), 0};
    $bits__0 = function(dynamic $param) use ($bits,$default__0) {
      return $bits($default__0);
    };
    $int__1 = function(dynamic $bound) use ($default__0,$int__0) {
      return $int__0($default__0, $bound);
    };
    $int32__0 = function(dynamic $bound) use ($default__0,$int32) {
      return $int32($default__0, $bound);
    };
    $nativeint__0 = function(dynamic $bound) use ($default__0,$nativeint) {
      return $nativeint($default__0, $bound);
    };
    $int64__0 = function(dynamic $bound) use ($default__0,$int64) {
      return $int64($default__0, $bound);
    };
    $float__1 = function(dynamic $scale) use ($default__0,$float__0) {
      return $float__0($default__0, $scale);
    };
    $bool__0 = function(dynamic $param) use ($bool,$default__0) {
      return $bool($default__0);
    };
    $full_init__0 = function(dynamic $seed) use ($default__0,$full_init) {
      return $full_init($default__0, $seed);
    };
    $init = function(dynamic $seed) use ($default__0,$full_init) {
      return $full_init($default__0, Vector{0, $seed});
    };
    $self_init = function(dynamic $param) use ($caml_sys_random_seed,$full_init__0) {
      return $full_init__0($caml_sys_random_seed(0));
    };
    $get_state = function(dynamic $param) use ($copy,$default__0) {
      return $copy($default__0);
    };
    $set_state = function(dynamic $s) use ($assign,$default__0) {
      return $assign($default__0, $s);
    };
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
  public static function set_state(dynamic $s) {
    return static::get()[13]($s);
  }
  public static function get_state(dynamic $param) {
    return static::get()[12]($param);
  }
  public static function bool(dynamic $param) {
    return static::get()[10]($param);
  }
  public static function float(dynamic $scale) {
    return static::get()[9]($scale);
  }
  public static function int64(dynamic $bound) {
    return static::get()[8]($bound);
  }
  public static function nativeint(dynamic $bound) {
    return static::get()[7]($bound);
  }
  public static function int32(dynamic $bound) {
    return static::get()[6]($bound);
  }
  public static function int(dynamic $bound) {
    return static::get()[5]($bound);
  }
  public static function bits(dynamic $param) {
    return static::get()[4]($param);
  }
  public static function self_init(dynamic $param) {
    return static::get()[3]($param);
  }
  public static function full_init(dynamic $seed) {
    return static::get()[2]($seed);
  }
  public static function init(dynamic $seed) {
    return static::get()[1]($seed);
  }

}
/* Hashing disabled */
