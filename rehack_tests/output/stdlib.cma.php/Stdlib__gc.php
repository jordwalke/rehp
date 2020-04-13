<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class Stdlib__gc {
  <<__Override, __Memoize>>
  public static function get() : Vector<dynamic> {
    
    $runtime = (\Rehack\GlobalObject::get() as dynamic)->jsoo_runtime;
    $call2 = $runtime["caml_call2"];
    $call3 = $runtime["caml_call3"];
    $call4 = $runtime["caml_call4"];
    $caml_ml_string_length = $runtime["caml_ml_string_length"];
    $string = $runtime["caml_new_string"];
    $Stdlib_sys = Stdlib__sys::get();
    $Stdlib_printf = Stdlib__printf::get();
    $a_ = Vector{
      0,
      Vector{
        11,
        $string("minor_collections: "),
        Vector{4, 0, 0, 0, Vector{12, 10, 0}}
      },
      $string("minor_collections: %d\n")
    } as dynamic;
    $b_ = Vector{
      0,
      Vector{
        11,
        $string("major_collections: "),
        Vector{4, 0, 0, 0, Vector{12, 10, 0}}
      },
      $string("major_collections: %d\n")
    } as dynamic;
    $c_ = Vector{
      0,
      Vector{
        11,
        $string("compactions:       "),
        Vector{4, 0, 0, 0, Vector{12, 10, 0}}
      },
      $string("compactions:       %d\n")
    } as dynamic;
    $d_ = Vector{0, Vector{12, 10, 0}, $string("\n")} as dynamic;
    $e_ = Vector{0, Vector{8, 0, 0, Vector{0, 0}, 0}, $string("%.0f")} as dynamic;
    $f_ = Vector{
      0,
      Vector{
        11,
        $string("minor_words:    "),
        Vector{8, 0, Vector{1, 1}, Vector{0, 0}, Vector{12, 10, 0}}
      },
      $string("minor_words:    %*.0f\n")
    } as dynamic;
    $g_ = Vector{
      0,
      Vector{
        11,
        $string("promoted_words: "),
        Vector{8, 0, Vector{1, 1}, Vector{0, 0}, Vector{12, 10, 0}}
      },
      $string("promoted_words: %*.0f\n")
    } as dynamic;
    $h_ = Vector{
      0,
      Vector{
        11,
        $string("major_words:    "),
        Vector{8, 0, Vector{1, 1}, Vector{0, 0}, Vector{12, 10, 0}}
      },
      $string("major_words:    %*.0f\n")
    } as dynamic;
    $i_ = Vector{0, Vector{12, 10, 0}, $string("\n")} as dynamic;
    $j_ = Vector{0, Vector{4, 0, 0, 0, 0}, $string("%d")} as dynamic;
    $k_ = Vector{
      0,
      Vector{
        11,
        $string("top_heap_words: "),
        Vector{4, 0, Vector{1, 1}, 0, Vector{12, 10, 0}}
      },
      $string("top_heap_words: %*d\n")
    } as dynamic;
    $l_ = Vector{
      0,
      Vector{
        11,
        $string("heap_words:     "),
        Vector{4, 0, Vector{1, 1}, 0, Vector{12, 10, 0}}
      },
      $string("heap_words:     %*d\n")
    } as dynamic;
    $m_ = Vector{
      0,
      Vector{
        11,
        $string("live_words:     "),
        Vector{4, 0, Vector{1, 1}, 0, Vector{12, 10, 0}}
      },
      $string("live_words:     %*d\n")
    } as dynamic;
    $n_ = Vector{
      0,
      Vector{
        11,
        $string("free_words:     "),
        Vector{4, 0, Vector{1, 1}, 0, Vector{12, 10, 0}}
      },
      $string("free_words:     %*d\n")
    } as dynamic;
    $o_ = Vector{
      0,
      Vector{
        11,
        $string("largest_free:   "),
        Vector{4, 0, Vector{1, 1}, 0, Vector{12, 10, 0}}
      },
      $string("largest_free:   %*d\n")
    } as dynamic;
    $p_ = Vector{
      0,
      Vector{
        11,
        $string("fragments:      "),
        Vector{4, 0, Vector{1, 1}, 0, Vector{12, 10, 0}}
      },
      $string("fragments:      %*d\n")
    } as dynamic;
    $q_ = Vector{0, Vector{12, 10, 0}, $string("\n")} as dynamic;
    $r_ = Vector{
      0,
      Vector{
        11,
        $string("live_blocks: "),
        Vector{4, 0, 0, 0, Vector{12, 10, 0}}
      },
      $string("live_blocks: %d\n")
    } as dynamic;
    $s_ = Vector{
      0,
      Vector{
        11,
        $string("free_blocks: "),
        Vector{4, 0, 0, 0, Vector{12, 10, 0}}
      },
      $string("free_blocks: %d\n")
    } as dynamic;
    $t_ = Vector{
      0,
      Vector{
        11,
        $string("heap_chunks: "),
        Vector{4, 0, 0, 0, Vector{12, 10, 0}}
      },
      $string("heap_chunks: %d\n")
    } as dynamic;
    $print_stat = (dynamic $c) : dynamic ==> {
      $st = $runtime["caml_gc_stat"](0);
      $call3($Stdlib_printf[1], $c, $a_, $st[4]);
      $call3($Stdlib_printf[1], $c, $b_, $st[5]);
      $call3($Stdlib_printf[1], $c, $c_, $st[14]);
      $call2($Stdlib_printf[1], $c, $d_);
      $l1 = $caml_ml_string_length($call2($Stdlib_printf[4], $e_, $st[1]));
      $call4($Stdlib_printf[1], $c, $f_, $l1, $st[1]);
      $call4($Stdlib_printf[1], $c, $g_, $l1, $st[2]);
      $call4($Stdlib_printf[1], $c, $h_, $l1, $st[3]);
      $call2($Stdlib_printf[1], $c, $i_);
      $l2 = $caml_ml_string_length($call2($Stdlib_printf[4], $j_, $st[15]));
      $call4($Stdlib_printf[1], $c, $k_, $l2, $st[15]);
      $call4($Stdlib_printf[1], $c, $l_, $l2, $st[6]);
      $call4($Stdlib_printf[1], $c, $m_, $l2, $st[8]);
      $call4($Stdlib_printf[1], $c, $n_, $l2, $st[10]);
      $call4($Stdlib_printf[1], $c, $o_, $l2, $st[12]);
      $call4($Stdlib_printf[1], $c, $p_, $l2, $st[13]);
      $call2($Stdlib_printf[1], $c, $q_);
      $call3($Stdlib_printf[1], $c, $r_, $st[9]);
      $call3($Stdlib_printf[1], $c, $s_, $st[11]);
      return $call3($Stdlib_printf[1], $c, $t_, $st[7]);
    };
    $allocated_bytes = (dynamic $param) : dynamic ==> {
      $match = $runtime["caml_gc_counters"](0);
      $ma = $match[3];
      $pro = $match[2];
      $mi = $match[1];
      return ($mi + $ma - $pro) * (int) ($Stdlib_sys[10] / 8);
    };
    $create_alarm = (dynamic $f) : dynamic ==> {return Vector{0, 1};};
    $delete_alarm = (dynamic $a) : dynamic ==> {$a[1] = 0;return 0;};
    $u_ = (dynamic $A_) : dynamic ==> {
      return $runtime["caml_final_release"]($A_);
    };
    $v_ = (dynamic $z_, dynamic $y_) : dynamic ==> {
      return $runtime["caml_final_register_called_without_value"]($z_, $y_);
    };
    $Stdlib_gc = Vector{
      0,
      $print_stat,
      $allocated_bytes,
      (dynamic $x_, dynamic $w_) : dynamic ==> {
        return $runtime["caml_final_register"]($x_, $w_);
      },
      $v_,
      $u_,
      $create_alarm,
      $delete_alarm
    } as dynamic;
    
    return($Stdlib_gc);

  }
  public static function print_stat(dynamic $c): dynamic {
    return static::syncCall(__FUNCTION__, 1, $c);
  }
  public static function allocated_bytes(dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 2, $param);
  }
  public static function create_alarm(dynamic $f): dynamic {
    return static::syncCall(__FUNCTION__, 6, $f);
  }
  public static function delete_alarm(dynamic $a): dynamic {
    return static::syncCall(__FUNCTION__, 7, $a);
  }

}
/* Hashing disabled */
