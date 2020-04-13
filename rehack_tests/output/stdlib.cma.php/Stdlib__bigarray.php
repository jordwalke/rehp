<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class Stdlib__bigarray {
  <<__Override, __Memoize>>
  public static function get() : Vector<dynamic> {
    
    $runtime = (\Rehack\GlobalObject::get() as dynamic)->jsoo_runtime;
    $caml_ba_change_layout = $runtime["caml_ba_change_layout"];
    $caml_ba_create = $runtime["caml_ba_create"];
    $caml_ba_dim_1 = $runtime["caml_ba_dim_1"];
    $caml_ba_dim_2 = $runtime["caml_ba_dim_2"];
    $caml_ba_kind = $runtime["caml_ba_kind"];
    $caml_ba_num_dims = $runtime["caml_ba_num_dims"];
    $caml_ba_reshape = $runtime["caml_ba_reshape"];
    $caml_ba_slice = $runtime["caml_ba_slice"];
    $call1 = $runtime["caml_call1"];
    $call3 = $runtime["caml_call3"];
    $caml_check_bound = $runtime["caml_check_bound"];
    $caml_mul = $runtime["caml_mul"];
    $string = $runtime["caml_new_string"];
    $cst_Bigarray_array3_of_genarray = $string("Bigarray.array3_of_genarray");
    $cst_Bigarray_array2_of_genarray = $string("Bigarray.array2_of_genarray");
    $cst_Bigarray_array1_of_genarray = $string("Bigarray.array1_of_genarray");
    $cst_Bigarray_array0_of_genarray = $string("Bigarray.array0_of_genarray");
    $cst_Bigarray_Array3_of_array_non_cubic_data = $string(
      "Bigarray.Array3.of_array: non-cubic data"
    );
    $cst_Bigarray_Array3_of_array_non_cubic_data__0 = $string(
      "Bigarray.Array3.of_array: non-cubic data"
    );
    $cst_Bigarray_Array2_of_array_non_rectangular_data = $string(
      "Bigarray.Array2.of_array: non-rectangular data"
    );
    $Stdlib = Stdlib::get();
    $Stdlib_array = Stdlib__array::get();
    $Stdlib_sys = Stdlib__sys::get();
    $float32 = 0 as dynamic;
    $float64 = 1 as dynamic;
    $int8_signed = 2 as dynamic;
    $int8_unsigned = 3 as dynamic;
    $int16_signed = 4 as dynamic;
    $int16_unsigned = 5 as dynamic;
    $int32 = 6 as dynamic;
    $int64 = 7 as dynamic;
    $int__0 = 8 as dynamic;
    $nativeint = 9 as dynamic;
    $complex32 = 10 as dynamic;
    $complex64 = 11 as dynamic;
    $char__0 = 12 as dynamic;
    $kind_size_in_bytes = (dynamic $param) : dynamic ==> {
      switch($param) {
        // FALLTHROUGH
        case 0:
          return 4;
        // FALLTHROUGH
        case 1:
          return 8;
        // FALLTHROUGH
        case 2:
          return 1;
        // FALLTHROUGH
        case 3:
          return 1;
        // FALLTHROUGH
        case 4:
          return 2;
        // FALLTHROUGH
        case 5:
          return 2;
        // FALLTHROUGH
        case 6:
          return 4;
        // FALLTHROUGH
        case 7:
          return 8;
        // FALLTHROUGH
        case 8:
          return (int) ($Stdlib_sys[10] / 8);
        // FALLTHROUGH
        case 9:
          return (int) ($Stdlib_sys[10] / 8);
        // FALLTHROUGH
        case 10:
          return 8;
        // FALLTHROUGH
        case 11:
          return 16;
        // FALLTHROUGH
        default:
          return 1;
        }
    };
    $c_layout = 0 as dynamic;
    $fortran_layout = 1 as dynamic;
    $dims = (dynamic $a) : dynamic ==> {
      $i = null as dynamic;
      $aa_ = null as dynamic;
      $ab_ = null as dynamic;
      $n = $caml_ba_num_dims($a);
      $d = $runtime["caml_make_vect"]($n, 0);
      $Z_ = (int) ($n + -1) as dynamic;
      $Y_ = 0 as dynamic;
      if (! ($Z_ < 0)) {
        $i = $Y_;
        for (;;) {
          $aa_ = $runtime["caml_ba_dim"]($a, $i);
          $caml_check_bound($d, $i)[$i + 1] = $aa_;
          $ab_ = (int) ($i + 1) as dynamic;
          if ($Z_ !== $i) {$i = $ab_;continue;}
          break;
        }
      }
      return $d;
    };
    $size_in_bytes = (dynamic $arr) : dynamic ==> {
      $S_ = $dims($arr);
      $T_ = 1 as dynamic;
      $U_ = (dynamic $X_, dynamic $W_) : dynamic ==> {
        return $caml_mul($X_, $W_);
      };
      $V_ = $call3($Stdlib_array[17], $U_, $T_, $S_);
      return $caml_mul($kind_size_in_bytes($caml_ba_kind($arr)), $V_);
    };
    $Genarray = Vector{0, $dims, $size_in_bytes} as dynamic;
    $create = (dynamic $kind, dynamic $layout) : dynamic ==> {
      return $caml_ba_create($kind, $layout, Vector{0});
    };
    $get = (dynamic $arr) : dynamic ==> {
      return $runtime["caml_ba_get_generic"]($arr, Vector{0});
    };
    $set = (dynamic $arr) : dynamic ==> {
      $M_ = Vector{0} as dynamic;
      $N_ = (dynamic $R_, dynamic $Q_, dynamic $P_) : dynamic ==> {
        return $runtime["caml_ba_set_generic"]($R_, $Q_, $P_);
      };
      return (dynamic $O_) : dynamic ==> {return $N_($arr, $M_, $O_);};
    };
    $size_in_bytes__0 = (dynamic $arr) : dynamic ==> {
      return $kind_size_in_bytes($caml_ba_kind($arr));
    };
    $of_value = (dynamic $kind, dynamic $layout, dynamic $v) : dynamic ==> {
      $a = $create($kind, $layout);
      $call1($set($a), $v);
      return $a;
    };
    $create__0 = (dynamic $kind, dynamic $layout, dynamic $dim) : dynamic ==> {
      return $caml_ba_create($kind, $layout, Vector{0, $dim});
    };
    $size_in_bytes__1 = (dynamic $arr) : dynamic ==> {
      $L_ = $caml_ba_dim_1($arr);
      return $caml_mul($kind_size_in_bytes($caml_ba_kind($arr)), $L_);
    };
    $slice = (dynamic $a, dynamic $n) : dynamic ==> {
      $match = $runtime["caml_ba_layout"]($a);
      return 0 === $match
        ? $caml_ba_slice($a, Vector{0, $n})
        : ($caml_ba_slice($a, Vector{0, $n}));
    };
    $of_array = (dynamic $kind, dynamic $layout, dynamic $data) : dynamic ==> {
      $i = null as dynamic;
      $K_ = null as dynamic;
      $ba = $create__0($kind, $layout, $data->count() - 1);
      $ofs = 0 === $layout ? 0 : (1);
      $J_ = (int) ($data->count() - 1 + -1) as dynamic;
      $I_ = 0 as dynamic;
      if (! ($J_ < 0)) {
        $i = $I_;
        for (;;) {
          $runtime["caml_ba_set_1"](
            $ba,
            (int)
            ($i + $ofs),
            $caml_check_bound($data, $i)[$i + 1]
          );
          $K_ = (int) ($i + 1) as dynamic;
          if ($J_ !== $i) {$i = $K_;continue;}
          break;
        }
      }
      return $ba;
    };
    $create__1 = 
    (dynamic $kind, dynamic $layout, dynamic $dim1, dynamic $dim2) : dynamic ==> {
      return $caml_ba_create($kind, $layout, Vector{0, $dim1, $dim2});
    };
    $size_in_bytes__2 = (dynamic $arr) : dynamic ==> {
      $G_ = $caml_ba_dim_2($arr);
      $H_ = $caml_ba_dim_1($arr);
      return $caml_mul(
        $caml_mul($kind_size_in_bytes($caml_ba_kind($arr)), $H_),
        $G_
      );
    };
    $slice_left = (dynamic $a, dynamic $n) : dynamic ==> {
      return $caml_ba_slice($a, Vector{0, $n});
    };
    $slice_right = (dynamic $a, dynamic $n) : dynamic ==> {
      return $caml_ba_slice($a, Vector{0, $n});
    };
    $of_array__0 = (dynamic $kind, dynamic $layout, dynamic $data) : dynamic ==> {
      $i = null as dynamic;
      $row = null as dynamic;
      $C_ = null as dynamic;
      $D_ = null as dynamic;
      $E_ = null as dynamic;
      $j = null as dynamic;
      $F_ = null as dynamic;
      $dim1 = $data->count() - 1;
      $dim2 = 0 === $dim1 ? 0 : ($caml_check_bound($data, 0)[1]->count() - 1);
      $ba = $create__1($kind, $layout, $dim1, $dim2);
      $ofs = 0 === $layout ? 0 : (1);
      $B_ = (int) ($dim1 + -1) as dynamic;
      $A_ = 0 as dynamic;
      if (! ($B_ < 0)) {
        $i = $A_;
        for (;;) {
          $row = $caml_check_bound($data, $i)[$i + 1];
          if ($row->count() - 1 !== $dim2) {
            $call1(
              $Stdlib[1],
              $cst_Bigarray_Array2_of_array_non_rectangular_data
            );
          }
          $D_ = (int) ($dim2 + -1) as dynamic;
          $C_ = 0 as dynamic;
          if (! ($D_ < 0)) {
            $j = $C_;
            for (;;) {
              $runtime["caml_ba_set_2"](
                $ba,
                (int)
                ($i + $ofs),
                (int)
                ($j + $ofs),
                $caml_check_bound($row, $j)[$j + 1]
              );
              $F_ = (int) ($j + 1) as dynamic;
              if ($D_ !== $j) {$j = $F_;continue;}
              break;
            }
          }
          $E_ = (int) ($i + 1) as dynamic;
          if ($B_ !== $i) {$i = $E_;continue;}
          break;
        }
      }
      return $ba;
    };
    $create__2 = 
    (dynamic $kind, dynamic $layout, dynamic $dim1, dynamic $dim2, dynamic $dim3) : dynamic ==> {
      return $caml_ba_create($kind, $layout, Vector{0, $dim1, $dim2, $dim3});
    };
    $size_in_bytes__3 = (dynamic $arr) : dynamic ==> {
      $x_ = $runtime["caml_ba_dim_3"]($arr);
      $y_ = $caml_ba_dim_2($arr);
      $z_ = $caml_ba_dim_1($arr);
      return $caml_mul(
        $caml_mul(
          $caml_mul($kind_size_in_bytes($caml_ba_kind($arr)), $z_),
          $y_
        ),
        $x_
      );
    };
    $slice_left_1 = (dynamic $a, dynamic $n, dynamic $m) : dynamic ==> {
      return $caml_ba_slice($a, Vector{0, $n, $m});
    };
    $slice_right_1 = (dynamic $a, dynamic $n, dynamic $m) : dynamic ==> {
      return $caml_ba_slice($a, Vector{0, $n, $m});
    };
    $slice_left_2 = (dynamic $a, dynamic $n) : dynamic ==> {
      return $caml_ba_slice($a, Vector{0, $n});
    };
    $slice_right_2 = (dynamic $a, dynamic $n) : dynamic ==> {
      return $caml_ba_slice($a, Vector{0, $n});
    };
    $of_array__1 = (dynamic $kind, dynamic $layout, dynamic $data) : dynamic ==> {
      $i = null as dynamic;
      $row = null as dynamic;
      $q_ = null as dynamic;
      $r_ = null as dynamic;
      $s_ = null as dynamic;
      $j = null as dynamic;
      $col = null as dynamic;
      $t_ = null as dynamic;
      $u_ = null as dynamic;
      $v_ = null as dynamic;
      $k = null as dynamic;
      $w_ = null as dynamic;
      $dim1 = $data->count() - 1;
      $dim2 = 0 === $dim1 ? 0 : ($caml_check_bound($data, 0)[1]->count() - 1);
      $dim3 = 0 === $dim2
        ? 0
        : ($caml_check_bound($caml_check_bound($data, 0)[1], 0)[1]->count() - 1);
      $ba = $create__2($kind, $layout, $dim1, $dim2, $dim3);
      $ofs = 0 === $layout ? 0 : (1);
      $p_ = (int) ($dim1 + -1) as dynamic;
      $o_ = 0 as dynamic;
      if (! ($p_ < 0)) {
        $i = $o_;
        for (;;) {
          $row = $caml_check_bound($data, $i)[$i + 1];
          if ($row->count() - 1 !== $dim2) {
            $call1($Stdlib[1], $cst_Bigarray_Array3_of_array_non_cubic_data);
          }
          $r_ = (int) ($dim2 + -1) as dynamic;
          $q_ = 0 as dynamic;
          if (! ($r_ < 0)) {
            $j = $q_;
            for (;;) {
              $col = $caml_check_bound($row, $j)[$j + 1];
              if ($col->count() - 1 !== $dim3) {
                $call1(
                  $Stdlib[1],
                  $cst_Bigarray_Array3_of_array_non_cubic_data__0
                );
              }
              $u_ = (int) ($dim3 + -1) as dynamic;
              $t_ = 0 as dynamic;
              if (! ($u_ < 0)) {
                $k = $t_;
                for (;;) {
                  $runtime["caml_ba_set_3"](
                    $ba,
                    (int)
                    ($i + $ofs),
                    (int)
                    ($j + $ofs),
                    (int)
                    ($k + $ofs),
                    $caml_check_bound($col, $k)[$k + 1]
                  );
                  $w_ = (int) ($k + 1) as dynamic;
                  if ($u_ !== $k) {$k = $w_;continue;}
                  break;
                }
              }
              $v_ = (int) ($j + 1) as dynamic;
              if ($r_ !== $j) {$j = $v_;continue;}
              break;
            }
          }
          $s_ = (int) ($i + 1) as dynamic;
          if ($p_ !== $i) {$i = $s_;continue;}
          break;
        }
      }
      return $ba;
    };
    $array0_of_genarray = (dynamic $a) : dynamic ==> {
      return 0 === $caml_ba_num_dims($a)
        ? $a
        : ($call1($Stdlib[1], $cst_Bigarray_array0_of_genarray));
    };
    $array1_of_genarray = (dynamic $a) : dynamic ==> {
      return 1 === $caml_ba_num_dims($a)
        ? $a
        : ($call1($Stdlib[1], $cst_Bigarray_array1_of_genarray));
    };
    $array2_of_genarray = (dynamic $a) : dynamic ==> {
      return 2 === $caml_ba_num_dims($a)
        ? $a
        : ($call1($Stdlib[1], $cst_Bigarray_array2_of_genarray));
    };
    $array3_of_genarray = (dynamic $a) : dynamic ==> {
      return 3 === $caml_ba_num_dims($a)
        ? $a
        : ($call1($Stdlib[1], $cst_Bigarray_array3_of_genarray));
    };
    $reshape_0 = (dynamic $a) : dynamic ==> {
      return $caml_ba_reshape($a, Vector{0});
    };
    $reshape_1 = (dynamic $a, dynamic $dim1) : dynamic ==> {
      return $caml_ba_reshape($a, Vector{0, $dim1});
    };
    $reshape_2 = (dynamic $a, dynamic $dim1, dynamic $dim2) : dynamic ==> {
      return $caml_ba_reshape($a, Vector{0, $dim1, $dim2});
    };
    $reshape_3 = (dynamic $a, dynamic $dim1, dynamic $dim2, dynamic $dim3) : dynamic ==> {
      return $caml_ba_reshape($a, Vector{0, $dim1, $dim2, $dim3});
    };
    $a_ = (dynamic $n_, dynamic $m_) : dynamic ==> {
      return $caml_ba_reshape($n_, $m_);
    };
    $b_ = Vector{
      0,
      $create__2,
      (dynamic $l_, dynamic $k_) : dynamic ==> {
        return $caml_ba_change_layout($l_, $k_);
      },
      $size_in_bytes__3,
      $slice_left_1,
      $slice_right_1,
      $slice_left_2,
      $slice_right_2,
      $of_array__1
    } as dynamic;
    $c_ = Vector{
      0,
      $create__1,
      (dynamic $j_, dynamic $i_) : dynamic ==> {
        return $caml_ba_change_layout($j_, $i_);
      },
      $size_in_bytes__2,
      $slice_left,
      $slice_right,
      $of_array__0
    } as dynamic;
    $d_ = Vector{
      0,
      $create__0,
      (dynamic $h_, dynamic $g_) : dynamic ==> {
        return $caml_ba_change_layout($h_, $g_);
      },
      $size_in_bytes__1,
      $slice,
      $of_array
    } as dynamic;
    $Stdlib_bigarray = Vector{
      0,
      $float32,
      $float64,
      $complex32,
      $complex64,
      $int8_signed,
      $int8_unsigned,
      $int16_signed,
      $int16_unsigned,
      $int__0,
      $int32,
      $int64,
      $nativeint,
      $char__0,
      $kind_size_in_bytes,
      $c_layout,
      $fortran_layout,
      $Genarray,
      Vector{
        0,
        $create,
        (dynamic $f_, dynamic $e_) : dynamic ==> {
          return $caml_ba_change_layout($f_, $e_);
        },
        $size_in_bytes__0,
        $get,
        $set,
        $of_value
      },
      $d_,
      $c_,
      $b_,
      $array0_of_genarray,
      $array1_of_genarray,
      $array2_of_genarray,
      $array3_of_genarray,
      $a_,
      $reshape_0,
      $reshape_1,
      $reshape_2,
      $reshape_3
    } as dynamic;
    
    return($Stdlib_bigarray);

  }
  public static function kind_size_in_bytes(dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 14, $param);
  }
  public static function array0_of_genarray(dynamic $a): dynamic {
    return static::syncCall(__FUNCTION__, 22, $a);
  }
  public static function array1_of_genarray(dynamic $a): dynamic {
    return static::syncCall(__FUNCTION__, 23, $a);
  }
  public static function array2_of_genarray(dynamic $a): dynamic {
    return static::syncCall(__FUNCTION__, 24, $a);
  }
  public static function array3_of_genarray(dynamic $a): dynamic {
    return static::syncCall(__FUNCTION__, 25, $a);
  }
  public static function reshape_0(dynamic $a): dynamic {
    return static::syncCall(__FUNCTION__, 27, $a);
  }
  public static function reshape_1(dynamic $a, dynamic $dim1): dynamic {
    return static::syncCall(__FUNCTION__, 28, $a, $dim1);
  }
  public static function reshape_2(dynamic $a, dynamic $dim1, dynamic $dim2): dynamic {
    return static::syncCall(__FUNCTION__, 29, $a, $dim1, $dim2);
  }
  public static function reshape_3(dynamic $a, dynamic $dim1, dynamic $dim2, dynamic $dim3): dynamic {
    return static::syncCall(__FUNCTION__, 30, $a, $dim1, $dim2, $dim3);
  }

}
/* Hashing disabled */
