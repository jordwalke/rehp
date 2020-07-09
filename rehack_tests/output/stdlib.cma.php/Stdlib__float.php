<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class Stdlib__float {
  <<__Override, __Memoize>>
  public static function get() : Vector<dynamic> {
    
    $runtime = (\Rehack\GlobalObject::get() as dynamic)->jsoo_runtime;
    $caml_array_get = $runtime["caml_array_get"];
    $caml_array_set = $runtime["caml_array_set"];
    $call1 = $runtime["caml_call1"];
    $call2 = $runtime["caml_call2"];
    $call3 = $runtime["caml_call3"];
    $caml_float_compare = $runtime["caml_float_compare"];
    $caml_floatarray_create = $runtime["caml_floatarray_create"];
    $string = $runtime["caml_new_string"];
    $caml_wrap_thrown_exception = $runtime["caml_wrap_thrown_exception"];
    $caml_wrap_thrown_exception_reraise = $runtime[
       "caml_wrap_thrown_exception_reraise"
     ];
    $cst_Float_Array_map2_arrays_must_have_the_same_length = $string(
      "Float.Array.map2: arrays must have the same length"
    );
    $cst_Float_Array_iter2_arrays_must_have_the_same_length = $string(
      "Float.Array.iter2: arrays must have the same length"
    );
    $cst_Float_array_blit = $string("Float.array.blit");
    $cst_Float_array_blit__0 = $string("Float.array.blit");
    $cst_Float_Array_fill = $string("Float.Array.fill");
    $cst_Float_Array_sub = $string("Float.Array.sub");
    $cst_Float_Array_concat = $string("Float.Array.concat");
    $cst_Float_Array_init = $string("Float.Array.init");
    $cst_Stdlib_Float_Array_Bottom = $string("Stdlib.Float.Array.Bottom");
    $Stdlib_seq = Stdlib__seq::get();
    $Stdlib_list = Stdlib__list::get();
    $Assert_failure = Assert_failure::get();
    $Stdlib = Stdlib::get();
    $b_ = Vector{0, $string("float.ml"), 381, 6} as dynamic;
    $a_ = Vector{0, $string("float.ml"), 208, 14} as dynamic;
    $infinity = $Stdlib[22];
    $neg_infinity = $Stdlib[23];
    $nan = $Stdlib[24];
    $zero = 0 as dynamic;
    $one = 1 as dynamic;
    $minus_one = -1 as dynamic;
    $is_finite = (dynamic $x) : dynamic ==> {return $x - $x == 0 ? 1 : (0);};
    $is_infinite = (dynamic $x) : dynamic ==> {return 1 / $x == 0 ? 1 : (0);};
    $is_nan = (dynamic $x) : dynamic ==> {return $x != $x ? 1 : (0);};
    $max_float = $Stdlib[25];
    $min_float = $Stdlib[26];
    $epsilon = $Stdlib[27];
    $of_string_opt = $Stdlib[36];
    $to_string = $Stdlib[35];
    $pi = 3.14159265358979312 as dynamic;
    $is_integer = (dynamic $x) : dynamic ==> {
      $aP_ = $x == $runtime["caml_trunc_float"]($x) ? 1 : (0);
      return $aP_ ? $is_finite($x) : ($aP_);
    };
    $succ = (dynamic $x) : dynamic ==> {
      return $runtime["caml_nextafter_float"]($x, $infinity);
    };
    $pred = (dynamic $x) : dynamic ==> {
      return $runtime["caml_nextafter_float"]($x, $neg_infinity);
    };
    $equal = (dynamic $x, dynamic $y) : dynamic ==> {
      return 0 === $caml_float_compare($x, $y) ? 1 : (0);
    };
    $min = (dynamic $x, dynamic $y) : dynamic ==> {
      $switch__0 = null as dynamic;
      if (! ($x < $y)) {
        $switch__0 =
          $runtime["caml_signbit_float"]($y)
            ? 1
            : ($runtime["caml_signbit_float"]($x) ? 0 : (1));
        if ($switch__0) {return $is_nan($x) ? $x : ($y);}
      }
      return $is_nan($y) ? $y : ($x);
    };
    $max = (dynamic $x, dynamic $y) : dynamic ==> {
      $switch__0 = null as dynamic;
      if (! ($x < $y)) {
        $switch__0 =
          $runtime["caml_signbit_float"]($y)
            ? 1
            : ($runtime["caml_signbit_float"]($x) ? 0 : (1));
        if ($switch__0) {return $is_nan($y) ? $y : ($x);}
      }
      return $is_nan($x) ? $x : ($y);
    };
    $min_max = (dynamic $x, dynamic $y) : dynamic ==> {
      $switch__0 = null as dynamic;
      if (! $is_nan($x)) {
        if (! $is_nan($y)) {
          if (! ($x < $y)) {
            $switch__0 =
              $runtime["caml_signbit_float"]($y)
                ? 1
                : ($runtime["caml_signbit_float"]($x) ? 0 : (1));
            if ($switch__0) {return Vector{0, $y, $x};}
          }
          return Vector{0, $x, $y};
        }
      }
      return Vector{0, $nan, $nan};
    };
    $min_num = (dynamic $x, dynamic $y) : dynamic ==> {
      $switch__0 = null as dynamic;
      if (! ($x < $y)) {
        $switch__0 =
          $runtime["caml_signbit_float"]($y)
            ? 1
            : ($runtime["caml_signbit_float"]($x) ? 0 : (1));
        if ($switch__0) {return $is_nan($y) ? $x : ($y);}
      }
      return $is_nan($x) ? $y : ($x);
    };
    $max_num = (dynamic $x, dynamic $y) : dynamic ==> {
      $switch__0 = null as dynamic;
      if (! ($x < $y)) {
        $switch__0 =
          $runtime["caml_signbit_float"]($y)
            ? 1
            : ($runtime["caml_signbit_float"]($x) ? 0 : (1));
        if ($switch__0) {return $is_nan($x) ? $y : ($x);}
      }
      return $is_nan($y) ? $x : ($y);
    };
    $min_max_num = (dynamic $x, dynamic $y) : dynamic ==> {
      $switch__0 = null as dynamic;
      if ($is_nan($x)) {return Vector{0, $y, $y};}
      if ($is_nan($y)) {return Vector{0, $x, $x};}
      if (! ($x < $y)) {
        $switch__0 =
          $runtime["caml_signbit_float"]($y)
            ? 1
            : ($runtime["caml_signbit_float"]($x) ? 0 : (1));
        if ($switch__0) {return Vector{0, $y, $x};}
      }
      return Vector{0, $x, $y};
    };
    $hash = (dynamic $x) : dynamic ==> {
      return $runtime["caml_hash"](10, 100, 0, $x);
    };
    $unsafe_fill = (dynamic $a, dynamic $ofs, dynamic $len, dynamic $v) : dynamic ==> {
      $i = null as dynamic;
      $aO_ = null as dynamic;
      $aN_ = (int) ((int) ($ofs + $len) + -1) as dynamic;
      if (! ($aN_ < $ofs)) {
        $i = $ofs;
        for (;;) {
          $a[$i + 1] = $v;
          $aO_ = (int) ($i + 1) as dynamic;
          if ($aN_ !== $i) {$i = $aO_;continue;}
          break;
        }
      }
      return 0;
    };
    $unsafe_blit = 
    (dynamic $src, dynamic $sofs, dynamic $dst, dynamic $dofs, dynamic $len) : dynamic ==> {
      $i = null as dynamic;
      $aM_ = null as dynamic;
      $aL_ = (int) ($len + -1) as dynamic;
      $aK_ = 0 as dynamic;
      if (! ($aL_ < 0)) {
        $i = $aK_;
        for (;;) {
          $dst[(int) ($dofs + $i) + 1] = $src[(int) ($sofs + $i) + 1];
          $aM_ = (int) ($i + 1) as dynamic;
          if ($aL_ !== $i) {$i = $aM_;continue;}
          break;
        }
      }
      return 0;
    };
    $check = (dynamic $a, dynamic $ofs, dynamic $len, dynamic $msg) : dynamic ==> {
      $aH_ = null as dynamic;
      $aI_ = null as dynamic;
      $aJ_ = null as dynamic;
      $aG_ = $ofs < 0 ? 1 : (0);
      if ($aG_) {
        $aH_ = $aG_;
      }
      else {
        $aI_ = $len < 0 ? 1 : (0);
        if ($aI_) {
          $aH_ = $aI_;
        }
        else {
          $aJ_ = (int) ($ofs + $len) < 0 ? 1 : (0);
          $aH_ =
            $aJ_ ? $aJ_ : ($a->count() - 1 < (int) ($ofs + $len) ? 1 : (0));
        }
      }
      return $aH_ ? $call1($Stdlib[1], $msg) : ($aH_);
    };
    $make = (dynamic $n, dynamic $v) : dynamic ==> {
      $result = $caml_floatarray_create($n);
      $unsafe_fill($result, 0, $n, $v);
      return $result;
    };
    $init = (dynamic $l, dynamic $f) : dynamic ==> {
      $aF_ = null as dynamic;
      $i = null as dynamic;
      $aE_ = null as dynamic;
      $aD_ = null as dynamic;
      $res = null as dynamic;
      if (0 <= $l) {
        $res = $caml_floatarray_create($l);
        $aE_ = (int) ($l + -1) as dynamic;
        $aD_ = 0 as dynamic;
        if (! ($aE_ < 0)) {
          $i = $aD_;
          for (;;) {
            $res[$i + 1] = $call1($f, $i);
            $aF_ = (int) ($i + 1) as dynamic;
            if ($aE_ !== $i) {$i = $aF_;continue;}
            break;
          }
        }
        return $res;
      }
      return $call1($Stdlib[1], $cst_Float_Array_init);
    };
    $append = (dynamic $a1, dynamic $a2) : dynamic ==> {
      $l1 = $a1->count() - 1;
      $l2 = $a2->count() - 1;
      $result = $caml_floatarray_create((int) ($l1 + $l2));
      $unsafe_blit($a1, 0, $result, 0, $l1);
      $unsafe_blit($a2, 0, $result, $l1, $l2);
      return $result;
    };
    $ensure_ge = (dynamic $x, dynamic $y) : dynamic ==> {
      return $y <= $x ? $x : ($call1($Stdlib[1], $cst_Float_Array_concat));
    };
    $sum_lengths = (dynamic $acc, dynamic $param) : dynamic ==> {
      $param__1 = null as dynamic;
      $hd = null as dynamic;
      $acc__1 = null as dynamic;
      $acc__0 = $acc;
      $param__0 = $param;
      for (;;) {
        if ($param__0) {
          $param__1 = $param__0[2];
          $hd = $param__0[1];
          $acc__1 = $ensure_ge((int) ($hd->count() - 1 + $acc__0), $acc__0);
          $acc__0 = $acc__1;
          $param__0 = $param__1;
          continue;
        }
        return $acc__0;
      }
    };
    $concat = (dynamic $l) : dynamic ==> {
      $len = $sum_lengths(0, $l);
      $result = $caml_floatarray_create($len);
      $loop = (dynamic $l, dynamic $i) : dynamic ==> {
        $l__1 = null as dynamic;
        $hd = null as dynamic;
        $hlen = null as dynamic;
        $i__1 = null as dynamic;
        $l__0 = $l;
        $i__0 = $i;
        for (;;) {
          if ($l__0) {
            $l__1 = $l__0[2];
            $hd = $l__0[1];
            $hlen = $hd->count() - 1;
            $unsafe_blit($hd, 0, $result, $i__0, $hlen);
            $i__1 = (int) ($i__0 + $hlen) as dynamic;
            $l__0 = $l__1;
            $i__0 = $i__1;
            continue;
          }
          if ($i__0 === $len) {return 0;}
          throw $caml_wrap_thrown_exception(Vector{0, $Assert_failure, $a_}) as \Throwable;
        }
      };
      $loop($l, 0);
      return $result;
    };
    $sub = (dynamic $a, dynamic $ofs, dynamic $len) : dynamic ==> {
      $check($a, $ofs, $len, $cst_Float_Array_sub);
      $result = $caml_floatarray_create($len);
      $unsafe_blit($a, $ofs, $result, 0, $len);
      return $result;
    };
    $copy = (dynamic $a) : dynamic ==> {
      $l = $a->count() - 1;
      $result = $caml_floatarray_create($l);
      $unsafe_blit($a, 0, $result, 0, $l);
      return $result;
    };
    $fill = (dynamic $a, dynamic $ofs, dynamic $len, dynamic $v) : dynamic ==> {
      $check($a, $ofs, $len, $cst_Float_Array_fill);
      return $unsafe_fill($a, $ofs, $len, $v);
    };
    $blit = 
    (dynamic $src, dynamic $sofs, dynamic $dst, dynamic $dofs, dynamic $len) : dynamic ==> {
      $check($src, $sofs, $len, $cst_Float_array_blit);
      $check($dst, $dofs, $len, $cst_Float_array_blit__0);
      return $unsafe_blit($src, $sofs, $dst, $dofs, $len);
    };
    $to_list = (dynamic $a) : dynamic ==> {
      $ay_ = (dynamic $aC_, dynamic $aB_) : dynamic ==> {
        return $aC_[$aB_ + 1];
      };
      $az_ = (dynamic $aA_) : dynamic ==> {return $ay_($a, $aA_);};
      return $call2($Stdlib_list[10], $a->count() - 1, $az_);
    };
    $of_list = (dynamic $l) : dynamic ==> {
      $result = $caml_floatarray_create($call1($Stdlib_list[1], $l));
      $fill = (dynamic $i, dynamic $l) : dynamic ==> {
        $l__1 = null as dynamic;
        $h = null as dynamic;
        $i__1 = null as dynamic;
        $i__0 = $i;
        $l__0 = $l;
        for (;;) {
          if ($l__0) {
            $l__1 = $l__0[2];
            $h = $l__0[1];
            $result[$i__0 + 1] = $h;
            $i__1 = (int) ($i__0 + 1) as dynamic;
            $i__0 = $i__1;
            $l__0 = $l__1;
            continue;
          }
          return $result;
        }
      };
      return $fill(0, $l);
    };
    $iter = (dynamic $f, dynamic $a) : dynamic ==> {
      $i = null as dynamic;
      $ax_ = null as dynamic;
      $aw_ = (int) ($a->count() - 1 + -1) as dynamic;
      $av_ = 0 as dynamic;
      if (! ($aw_ < 0)) {
        $i = $av_;
        for (;;) {
          $call1($f, $a[$i + 1]);
          $ax_ = (int) ($i + 1) as dynamic;
          if ($aw_ !== $i) {$i = $ax_;continue;}
          break;
        }
      }
      return 0;
    };
    $iter2 = (dynamic $f, dynamic $a, dynamic $b) : dynamic ==> {
      $au_ = null as dynamic;
      $i = null as dynamic;
      if ($a->count() - 1 !== $b->count() - 1) {
        return $call1(
          $Stdlib[1],
          $cst_Float_Array_iter2_arrays_must_have_the_same_length
        );
      }
      $at_ = (int) ($a->count() - 1 + -1) as dynamic;
      $as_ = 0 as dynamic;
      if (! ($at_ < 0)) {
        $i = $as_;
        for (;;) {
          $call2($f, $a[$i + 1], $b[$i + 1]);
          $au_ = (int) ($i + 1) as dynamic;
          if ($at_ !== $i) {$i = $au_;continue;}
          break;
        }
      }
      return 0;
    };
    $map = (dynamic $f, dynamic $a) : dynamic ==> {
      $i = null as dynamic;
      $ar_ = null as dynamic;
      $l = $a->count() - 1;
      $r = $caml_floatarray_create($l);
      $aq_ = (int) ($l + -1) as dynamic;
      $ap_ = 0 as dynamic;
      if (! ($aq_ < 0)) {
        $i = $ap_;
        for (;;) {
          $r[$i + 1] = $call1($f, $a[$i + 1]);
          $ar_ = (int) ($i + 1) as dynamic;
          if ($aq_ !== $i) {$i = $ar_;continue;}
          break;
        }
      }
      return $r;
    };
    $map2 = (dynamic $f, dynamic $a, dynamic $b) : dynamic ==> {
      $i = null as dynamic;
      $ao_ = null as dynamic;
      $la = $a->count() - 1;
      $lb = $b->count() - 1;
      if ($la !== $lb) {
        return $call1(
          $Stdlib[1],
          $cst_Float_Array_map2_arrays_must_have_the_same_length
        );
      }
      $r = $caml_floatarray_create($la);
      $an_ = (int) ($la + -1) as dynamic;
      $am_ = 0 as dynamic;
      if (! ($an_ < 0)) {
        $i = $am_;
        for (;;) {
          $r[$i + 1] = $call2($f, $a[$i + 1], $b[$i + 1]);
          $ao_ = (int) ($i + 1) as dynamic;
          if ($an_ !== $i) {$i = $ao_;continue;}
          break;
        }
      }
      return $r;
    };
    $iteri = (dynamic $f, dynamic $a) : dynamic ==> {
      $i = null as dynamic;
      $al_ = null as dynamic;
      $ak_ = (int) ($a->count() - 1 + -1) as dynamic;
      $aj_ = 0 as dynamic;
      if (! ($ak_ < 0)) {
        $i = $aj_;
        for (;;) {
          $call2($f, $i, $a[$i + 1]);
          $al_ = (int) ($i + 1) as dynamic;
          if ($ak_ !== $i) {$i = $al_;continue;}
          break;
        }
      }
      return 0;
    };
    $mapi = (dynamic $f, dynamic $a) : dynamic ==> {
      $i = null as dynamic;
      $ai_ = null as dynamic;
      $l = $a->count() - 1;
      $r = $caml_floatarray_create($l);
      $ah_ = (int) ($l + -1) as dynamic;
      $ag_ = 0 as dynamic;
      if (! ($ah_ < 0)) {
        $i = $ag_;
        for (;;) {
          $r[$i + 1] = $call2($f, $i, $a[$i + 1]);
          $ai_ = (int) ($i + 1) as dynamic;
          if ($ah_ !== $i) {$i = $ai_;continue;}
          break;
        }
      }
      return $r;
    };
    $fold_left = (dynamic $f, dynamic $x, dynamic $a) : dynamic ==> {
      $i = null as dynamic;
      $af_ = null as dynamic;
      $r = Vector{0, $x} as dynamic;
      $ae_ = (int) ($a->count() - 1 + -1) as dynamic;
      $ad_ = 0 as dynamic;
      if (! ($ae_ < 0)) {
        $i = $ad_;
        for (;;) {
          $r[1] = $call2($f, $r[1], $a[$i + 1]);
          $af_ = (int) ($i + 1) as dynamic;
          if ($ae_ !== $i) {$i = $af_;continue;}
          break;
        }
      }
      return $r[1];
    };
    $fold_right = (dynamic $f, dynamic $a, dynamic $x) : dynamic ==> {
      $i = null as dynamic;
      $ac_ = null as dynamic;
      $r = Vector{0, $x} as dynamic;
      $ab_ = (int) ($a->count() - 1 + -1) as dynamic;
      if (! ($ab_ < 0)) {
        $i = $ab_;
        for (;;) {
          $r[1] = $call2($f, $a[$i + 1], $r[1]);
          $ac_ = (int) ($i + -1) as dynamic;
          if (0 !== $i) {$i = $ac_;continue;}
          break;
        }
      }
      return $r[1];
    };
    $exists = (dynamic $p, dynamic $a) : dynamic ==> {
      $n = $a->count() - 1;
      $loop = (dynamic $i) : dynamic ==> {
        $i__1 = null as dynamic;
        $i__0 = $i;
        for (;;) {
          if ($i__0 === $n) {return 0;}
          if ($call1($p, $a[$i__0 + 1])) {return 1;}
          $i__1 = (int) ($i__0 + 1) as dynamic;
          $i__0 = $i__1;
          continue;
        }
      };
      return $loop(0);
    };
    $for_all = (dynamic $p, dynamic $a) : dynamic ==> {
      $n = $a->count() - 1;
      $loop = (dynamic $i) : dynamic ==> {
        $i__1 = null as dynamic;
        $i__0 = $i;
        for (;;) {
          if ($i__0 === $n) {return 1;}
          if ($call1($p, $a[$i__0 + 1])) {
            $i__1 = (int) ($i__0 + 1) as dynamic;
            $i__0 = $i__1;
            continue;
          }
          return 0;
        }
      };
      return $loop(0);
    };
    $mem = (dynamic $x, dynamic $a) : dynamic ==> {
      $n = $a->count() - 1;
      $loop = (dynamic $i) : dynamic ==> {
        $i__1 = null as dynamic;
        $i__0 = $i;
        for (;;) {
          if ($i__0 === $n) {return 0;}
          if (0 === $caml_float_compare($a[$i__0 + 1], $x)) {return 1;}
          $i__1 = (int) ($i__0 + 1) as dynamic;
          $i__0 = $i__1;
          continue;
        }
      };
      return $loop(0);
    };
    $mem_ieee = (dynamic $x, dynamic $a) : dynamic ==> {
      $n = $a->count() - 1;
      $loop = (dynamic $i) : dynamic ==> {
        $i__1 = null as dynamic;
        $i__0 = $i;
        for (;;) {
          if ($i__0 === $n) {return 0;}
          if ($x == $a[$i__0 + 1]) {return 1;}
          $i__1 = (int) ($i__0 + 1) as dynamic;
          $i__0 = $i__1;
          continue;
        }
      };
      return $loop(0);
    };
    $Bottom = Vector{
      248,
      $cst_Stdlib_Float_Array_Bottom,
      $runtime["caml_fresh_oo_id"](0)
    } as dynamic;
    $sort = (dynamic $cmp, dynamic $a) : dynamic ==> {
      $e = null as dynamic;
      $W_ = null as dynamic;
      $i = null as dynamic;
      $e__0 = null as dynamic;
      $X_ = null as dynamic;
      $i__0 = null as dynamic;
      $Y_ = null as dynamic;
      $maxson = (dynamic $l, dynamic $i) : dynamic ==> {
        $i31 = (int) ((int) ((int) ($i + $i) + $i) + 1) as dynamic;
        $x = Vector{0, $i31} as dynamic;
        if ((int) ($i31 + 2) < $l) {
          if (
            $call2(
              $cmp,
              $caml_array_get($a, $i31),
              $caml_array_get($a, (int) ($i31 + 1))
            ) < 0
          ) {$x[1] = (int) ($i31 + 1);}
          if (
            $call2(
              $cmp,
              $caml_array_get($a, $x[1]),
              $caml_array_get($a, (int) ($i31 + 2))
            ) < 0
          ) {$x[1] = (int) ($i31 + 2);}
          return $x[1];
        }
        if ((int) ($i31 + 1) < $l) {
          if (
            !
            (0 <=
               $call2(
                 $cmp,
                 $caml_array_get($a, $i31),
                 $caml_array_get($a, (int) ($i31 + 1))
               ))
          ) {return (int) ($i31 + 1);}
        }
        if ($i31 < $l) {return $i31;}
        throw $caml_wrap_thrown_exception(Vector{0, $Bottom, $i}) as \Throwable;
      };
      $trickledown = (dynamic $l, dynamic $i, dynamic $e) : dynamic ==> {
        $j = null as dynamic;
        $i__0 = $i;
        for (;;) {
          $j = $maxson($l, $i__0);
          if (0 < $call2($cmp, $caml_array_get($a, $j), $e)) {
            $caml_array_set($a, $i__0, $caml_array_get($a, $j));
            $i__0 = $j;
            continue;
          }
          return $caml_array_set($a, $i__0, $e);
        }
      };
      $trickle = (dynamic $l, dynamic $i, dynamic $e) : dynamic ==> {
        $aa_ = null as dynamic;
        $i__0 = null as dynamic;
        try {$aa_ = $trickledown($l, $i, $e);return $aa_;}
        catch(\Throwable $exn) {
          $exn = $runtime["caml_wrap_exception"]($exn);
          if ($exn[1] === $Bottom) {
            $i__0 = $exn[2];
            return $caml_array_set($a, $i__0, $e);
          }
          throw $caml_wrap_thrown_exception_reraise($exn) as \Throwable;
        }
      };
      $bubbledown = (dynamic $l, dynamic $i) : dynamic ==> {
        $i__1 = null as dynamic;
        $i__0 = $i;
        for (;;) {
          $i__1 = $maxson($l, $i__0);
          $caml_array_set($a, $i__0, $caml_array_get($a, $i__1));
          $i__0 = $i__1;
          continue;
        }
      };
      $bubble = (dynamic $l, dynamic $i) : dynamic ==> {
        $Z_ = null as dynamic;
        $i__0 = null as dynamic;
        try {$Z_ = $bubbledown($l, $i);return $Z_;}
        catch(\Throwable $exn) {
          $exn = $runtime["caml_wrap_exception"]($exn);
          if ($exn[1] === $Bottom) {$i__0 = $exn[2];return $i__0;}
          throw $caml_wrap_thrown_exception_reraise($exn) as \Throwable;
        }
      };
      $trickleup = (dynamic $i, dynamic $e) : dynamic ==> {
        $father = null as dynamic;
        $i__0 = $i;
        for (;;) {
          $father = (int) ((int) ($i__0 + -1) / 3) as dynamic;
          if ($i__0 !== $father) {
            if (0 <= $call2($cmp, $caml_array_get($a, $father), $e)) {return $caml_array_set($a, $i__0, $e);}
            $caml_array_set($a, $i__0, $caml_array_get($a, $father));
            if (0 < $father) {$i__0 = $father;continue;}
            return $caml_array_set($a, 0, $e);
          }
          throw $caml_wrap_thrown_exception(Vector{0, $Assert_failure, $b_}) as \Throwable;
        }
      };
      $l = $a->count() - 1;
      $T_ = (int) ((int) ((int) ($l + 1) / 3) + -1) as dynamic;
      if (! ($T_ < 0)) {
        $i__0 = $T_;
        for (;;) {
          $trickle($l, $i__0, $caml_array_get($a, $i__0));
          $Y_ = (int) ($i__0 + -1) as dynamic;
          if (0 !== $i__0) {$i__0 = $Y_;continue;}
          break;
        }
      }
      $U_ = (int) ($l + -1) as dynamic;
      if (! ($U_ < 2)) {
        $i = $U_;
        for (;;) {
          $e__0 = $caml_array_get($a, $i);
          $caml_array_set($a, $i, $caml_array_get($a, 0));
          $trickleup($bubble($i, 0), $e__0);
          $X_ = (int) ($i + -1) as dynamic;
          if (2 !== $i) {$i = $X_;continue;}
          break;
        }
      }
      $V_ = 1 < $l ? 1 : (0);
      if ($V_) {
        $e = $caml_array_get($a, 1);
        $caml_array_set($a, 1, $caml_array_get($a, 0));
        $W_ = $caml_array_set($a, 0, $e);
      }
      else {$W_ = $V_;}
      return $W_;
    };
    $stable_sort = (dynamic $cmp, dynamic $a) : dynamic ==> {
      $sortto = new Ref();
      $merge = 
      (dynamic $src1ofs, dynamic $src1len, dynamic $src2, dynamic $src2ofs, dynamic $src2len, dynamic $dst, dynamic $dstofs) : dynamic ==> {
        $src1r = (int) ($src1ofs + $src1len) as dynamic;
        $src2r = (int) ($src2ofs + $src2len) as dynamic;
        $loop = 
        (dynamic $i1, dynamic $s1, dynamic $i2, dynamic $s2, dynamic $d) : dynamic ==> {
          $i2__1 = null as dynamic;
          $d__1 = null as dynamic;
          $s2__1 = null as dynamic;
          $i1__1 = null as dynamic;
          $d__2 = null as dynamic;
          $s1__1 = null as dynamic;
          $i1__0 = $i1;
          $s1__0 = $s1;
          $i2__0 = $i2;
          $s2__0 = $s2;
          $d__0 = $d;
          for (;;) {
            if (0 < $call2($cmp, $s1__0, $s2__0)) {
              $caml_array_set($dst, $d__0, $s2__0);
              $i2__1 = (int) ($i2__0 + 1) as dynamic;
              if ($i2__1 < $src2r) {
                $d__1 = (int) ($d__0 + 1) as dynamic;
                $s2__1 = $caml_array_get($src2, $i2__1);
                $i2__0 = $i2__1;
                $s2__0 = $s2__1;
                $d__0 = $d__1;
                continue;
              }
              return $blit(
                $a,
                $i1__0,
                $dst,
                (int)
                ($d__0 + 1),
                (int)
                ($src1r - $i1__0)
              );
            }
            $caml_array_set($dst, $d__0, $s1__0);
            $i1__1 = (int) ($i1__0 + 1) as dynamic;
            if ($i1__1 < $src1r) {
              $d__2 = (int) ($d__0 + 1) as dynamic;
              $s1__1 = $caml_array_get($a, $i1__1);
              $i1__0 = $i1__1;
              $s1__0 = $s1__1;
              $d__0 = $d__2;
              continue;
            }
            return $blit(
              $src2,
              $i2__0,
              $dst,
              (int)
              ($d__0 + 1),
              (int)
              ($src2r - $i2__0)
            );
          }
        };
        return $loop(
          $src1ofs,
          $caml_array_get($a, $src1ofs),
          $src2ofs,
          $caml_array_get($src2, $src2ofs),
          $dstofs
        );
      };
      $isortto = 
      (dynamic $srcofs, dynamic $dst, dynamic $dstofs, dynamic $len) : dynamic ==> {
        $i = null as dynamic;
        $e = null as dynamic;
        $j = null as dynamic;
        $S_ = null as dynamic;
        $R_ = (int) ($len + -1) as dynamic;
        $Q_ = 0 as dynamic;
        if (! ($R_ < 0)) {
          $i = $Q_;
          for (;;) {
            $continue_label = null;
            $e = $caml_array_get($a, (int) ($srcofs + $i));
            $j = Vector{0, (int) ((int) ($dstofs + $i) + -1)} as dynamic;
            for (;;) {
              if ($dstofs <= $j[1]) {
                if (0 < $call2($cmp, $caml_array_get($dst, $j[1]), $e)) {
                  $caml_array_set(
                    $dst,
                    (int)
                    ($j[1] + 1),
                    $caml_array_get($dst, $j[1])
                  );
                  $j[1] = $j[1] + -1;
                  continue;
                }
              }
              $caml_array_set($dst, (int) ($j[1] + 1), $e);
              $S_ = (int) ($i + 1) as dynamic;
              if ($R_ !== $i) {$i = $S_;$continue_label = "a";break;}
              break;
            }
            if ($continue_label === "a") {continue;}
            break;
          }
        }
        return 0;
      };
      $sortto->contents = 
      (dynamic $srcofs, dynamic $dst, dynamic $dstofs, dynamic $len) : dynamic ==> {
        if ($len <= 5) {return $isortto($srcofs, $dst, $dstofs, $len);}
        $l1 = (int) ($len / 2) as dynamic;
        $l2 = (int) ($len - $l1) as dynamic;
        $sortto->contents(
          (int)
          ($srcofs + $l1),
          $dst,
          (int)
          ($dstofs + $l1),
          $l2
        );
        $sortto->contents($srcofs, $a, (int) ($srcofs + $l2), $l1);
        return $merge(
          (int)
          ($srcofs + $l2),
          $l1,
          $dst,
          (int)
          ($dstofs + $l1),
          $l2,
          $dst,
          $dstofs
        );
      };
      $l = $a->count() - 1;
      if ($l <= 5) {return $isortto(0, $a, 0, $l);}
      $l1 = (int) ($l / 2) as dynamic;
      $l2 = (int) ($l - $l1) as dynamic;
      $t = $caml_floatarray_create($l2);
      $sortto->contents($l1, $t, 0, $l2);
      $sortto->contents(0, $a, $l2, $l1);
      return $merge($l2, $l1, $t, 0, $l2, $a, 0);
    };
    $to_seq = (dynamic $a) : dynamic ==> {
      $aux = new Ref();
      $aux->contents = (dynamic $i, dynamic $param) : dynamic ==> {
        $O_ = null as dynamic;
        $x = null as dynamic;
        if ($i < $a->count() - 1) {
          $x = $a[$i + 1];
          $O_ = (int) ($i + 1) as dynamic;
          return Vector{
            0,
            $x,
            (dynamic $P_) : dynamic ==> {return $aux->contents($O_, $P_);}
          };
        }
        return 0;
      };
      $M_ = 0 as dynamic;
      return (dynamic $N_) : dynamic ==> {return $aux->contents($M_, $N_);};
    };
    $to_seqi = (dynamic $a) : dynamic ==> {
      $aux = new Ref();
      $aux->contents = (dynamic $i, dynamic $param) : dynamic ==> {
        $K_ = null as dynamic;
        $x = null as dynamic;
        if ($i < $a->count() - 1) {
          $x = $a[$i + 1];
          $K_ = (int) ($i + 1) as dynamic;
          return Vector{
            0,
            Vector{0, $i, $x},
            (dynamic $L_) : dynamic ==> {return $aux->contents($K_, $L_);}
          };
        }
        return 0;
      };
      $I_ = 0 as dynamic;
      return (dynamic $J_) : dynamic ==> {return $aux->contents($I_, $J_);};
    };
    $of_rev_list = (dynamic $l) : dynamic ==> {
      $len = $call1($Stdlib_list[1], $l);
      $a = $caml_floatarray_create($len);
      $fill = (dynamic $i, dynamic $param) : dynamic ==> {
        $param__1 = null as dynamic;
        $hd = null as dynamic;
        $i__1 = null as dynamic;
        $i__0 = $i;
        $param__0 = $param;
        for (;;) {
          if ($param__0) {
            $param__1 = $param__0[2];
            $hd = $param__0[1];
            $a[$i__0 + 1] = $hd;
            $i__1 = (int) ($i__0 + -1) as dynamic;
            $i__0 = $i__1;
            $param__0 = $param__1;
            continue;
          }
          return $a;
        }
      };
      return $fill((int) ($len + -1), $l);
    };
    $of_seq = (dynamic $i) : dynamic ==> {
      $G_ = 0 as dynamic;
      $H_ = (dynamic $acc, dynamic $x) : dynamic ==> {
        return Vector{0, $x, $acc};
      };
      $l = $call3($Stdlib_seq[7], $H_, $G_, $i);
      return $of_rev_list($l);
    };
    $map_to_array = (dynamic $f, dynamic $a) : dynamic ==> {
      $i = null as dynamic;
      $F_ = null as dynamic;
      $l = $a->count() - 1;
      if (0 === $l) {return Vector{0};}
      $r = $runtime["caml_make_vect"]($l, $call1($f, $a[1]));
      $E_ = (int) ($l + -1) as dynamic;
      $D_ = 1 as dynamic;
      if (! ($E_ < 1)) {
        $i = $D_;
        for (;;) {
          $r[$i + 1] = $call1($f, $a[$i + 1]);
          $F_ = (int) ($i + 1) as dynamic;
          if ($E_ !== $i) {$i = $F_;continue;}
          break;
        }
      }
      return $r;
    };
    $map_from_array = (dynamic $f, dynamic $a) : dynamic ==> {
      $i = null as dynamic;
      $C_ = null as dynamic;
      $l = $a->count() - 1;
      $r = $caml_floatarray_create($l);
      $B_ = (int) ($l + -1) as dynamic;
      $A_ = 0 as dynamic;
      if (! ($B_ < 0)) {
        $i = $A_;
        for (;;) {
          $r[$i + 1] = $call1($f, $a[$i + 1]);
          $C_ = (int) ($i + 1) as dynamic;
          if ($B_ !== $i) {$i = $C_;continue;}
          break;
        }
      }
      return $r;
    };
    $c_ = (dynamic $z_) : dynamic ==> {return $caml_floatarray_create($z_);};
    $d_ = (dynamic $y_, dynamic $x_, dynamic $w_) : dynamic ==> {
      return $caml_array_set($y_, $x_, $w_);
    };
    $e_ = (dynamic $v_, dynamic $u_) : dynamic ==> {
      return $caml_array_get($v_, $u_);
    };
    $f_ = Vector{
      0,
      (dynamic $t_) : dynamic ==> {return $t_->count() - 1;},
      $e_,
      $d_,
      $make,
      $c_,
      $init,
      $append,
      $concat,
      $sub,
      $copy,
      $fill,
      $blit,
      $to_list,
      $of_list,
      $iter,
      $iteri,
      $map,
      $mapi,
      $fold_left,
      $fold_right,
      $iter2,
      $map2,
      $for_all,
      $exists,
      $mem,
      $mem_ieee,
      $sort,
      $stable_sort,
      $stable_sort,
      $to_seq,
      $to_seqi,
      $of_seq,
      $map_to_array,
      $map_from_array
    } as dynamic;
    $g_ = (dynamic $s_) : dynamic ==> {return $caml_floatarray_create($s_);};
    $h_ = (dynamic $r_, dynamic $q_, dynamic $p_) : dynamic ==> {
      return $caml_array_set($r_, $q_, $p_);
    };
    $i_ = (dynamic $o_, dynamic $n_) : dynamic ==> {
      return $caml_array_get($o_, $n_);
    };
    $j_ = Vector{
      0,
      (dynamic $m_) : dynamic ==> {return $m_->count() - 1;},
      $i_,
      $h_,
      $make,
      $g_,
      $init,
      $append,
      $concat,
      $sub,
      $copy,
      $fill,
      $blit,
      $to_list,
      $of_list,
      $iter,
      $iteri,
      $map,
      $mapi,
      $fold_left,
      $fold_right,
      $iter2,
      $map2,
      $for_all,
      $exists,
      $mem,
      $mem_ieee,
      $sort,
      $stable_sort,
      $stable_sort,
      $to_seq,
      $to_seqi,
      $of_seq,
      $map_to_array,
      $map_from_array
    } as dynamic;
    $Stdlib_float = Vector{
      0,
      $zero,
      $one,
      $minus_one,
      $succ,
      $pred,
      $infinity,
      $neg_infinity,
      $nan,
      $pi,
      $max_float,
      $min_float,
      $epsilon,
      $is_finite,
      $is_infinite,
      $is_nan,
      $is_integer,
      $of_string_opt,
      $to_string,
      (dynamic $l_, dynamic $k_) : dynamic ==> {
        return $caml_float_compare($l_, $k_);
      },
      $equal,
      $min,
      $max,
      $min_max,
      $min_num,
      $max_num,
      $min_max_num,
      $hash,
      $j_,
      $f_
    } as dynamic;
    
    return($Stdlib_float);

  }
  public static function succ(dynamic $x): dynamic {
    return static::syncCall(__FUNCTION__, 4, $x);
  }
  public static function pred(dynamic $x): dynamic {
    return static::syncCall(__FUNCTION__, 5, $x);
  }
  public static function is_finite(dynamic $x): dynamic {
    return static::syncCall(__FUNCTION__, 13, $x);
  }
  public static function is_infinite(dynamic $x): dynamic {
    return static::syncCall(__FUNCTION__, 14, $x);
  }
  public static function is_nan(dynamic $x): dynamic {
    return static::syncCall(__FUNCTION__, 15, $x);
  }
  public static function is_integer(dynamic $x): dynamic {
    return static::syncCall(__FUNCTION__, 16, $x);
  }
  public static function equal(dynamic $x, dynamic $y): dynamic {
    return static::syncCall(__FUNCTION__, 20, $x, $y);
  }
  public static function min(dynamic $x, dynamic $y): dynamic {
    return static::syncCall(__FUNCTION__, 21, $x, $y);
  }
  public static function max(dynamic $x, dynamic $y): dynamic {
    return static::syncCall(__FUNCTION__, 22, $x, $y);
  }
  public static function min_max(dynamic $x, dynamic $y): dynamic {
    return static::syncCall(__FUNCTION__, 23, $x, $y);
  }
  public static function min_num(dynamic $x, dynamic $y): dynamic {
    return static::syncCall(__FUNCTION__, 24, $x, $y);
  }
  public static function max_num(dynamic $x, dynamic $y): dynamic {
    return static::syncCall(__FUNCTION__, 25, $x, $y);
  }
  public static function min_max_num(dynamic $x, dynamic $y): dynamic {
    return static::syncCall(__FUNCTION__, 26, $x, $y);
  }
  public static function hash(dynamic $x): dynamic {
    return static::syncCall(__FUNCTION__, 27, $x);
  }

}
/* Hashing disabled */
