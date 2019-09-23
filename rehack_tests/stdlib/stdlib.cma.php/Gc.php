<?hh
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * Gc.php
 */

namespace Rehack;

final class Gc {
  <<__Memoize>>
  public static function get() {
    $global_object = \Rehack\GlobalObject::get();
    $runtime = \Rehack\Runtime::get();
    /*
     * Soon, these will replace the `global_data->ModuleName`
     * pattern in the load() function.
     */
    $Printf = Printf::get();
    $Sys = Sys::get();
    Gc::load($global_object);
    $memoized = $runtime->caml_get_global_data()->Gc;
    return $memoized;
  }

  /**
   * Performs module load operation. May have side effects.
   */
  private static function load($joo_global_object) {
    

    $runtime = $joo_global_object->jsoo_runtime;
    $call2 = $runtime["caml_call2"];
    $call3 = $runtime["caml_call3"];
    $call4 = $runtime["caml_call4"];
    $caml_ml_string_length = $runtime["caml_ml_string_length"];
    $string = $runtime["caml_new_string"];
    $global_data = $runtime["caml_get_global_data"]();
    $Sys = $global_data["Sys"];
    $Printf = $global_data["Printf"];
    $a = Vector{
      0,
      Vector{
        11,
        $string("minor_collections: "),
        Vector{4, 0, 0, 0, Vector{12, 10, 0}}
      },
      $string("minor_collections: %d\n")
    };
    $b = Vector{
      0,
      Vector{
        11,
        $string("major_collections: "),
        Vector{4, 0, 0, 0, Vector{12, 10, 0}}
      },
      $string("major_collections: %d\n")
    };
    $c = Vector{
      0,
      Vector{
        11,
        $string("compactions:       "),
        Vector{4, 0, 0, 0, Vector{12, 10, 0}}
      },
      $string("compactions:       %d\n")
    };
    $d = Vector{0, Vector{12, 10, 0}, $string("\n")};
    $e = Vector{0, Vector{8, 0, 0, Vector{0, 0}, 0}, $string("%.0f")};
    $f = Vector{
      0,
      Vector{
        11,
        $string("minor_words:    "),
        Vector{8, 0, Vector{1, 1}, Vector{0, 0}, Vector{12, 10, 0}}
      },
      $string("minor_words:    %*.0f\n")
    };
    $g = Vector{
      0,
      Vector{
        11,
        $string("promoted_words: "),
        Vector{8, 0, Vector{1, 1}, Vector{0, 0}, Vector{12, 10, 0}}
      },
      $string("promoted_words: %*.0f\n")
    };
    $h = Vector{
      0,
      Vector{
        11,
        $string("major_words:    "),
        Vector{8, 0, Vector{1, 1}, Vector{0, 0}, Vector{12, 10, 0}}
      },
      $string("major_words:    %*.0f\n")
    };
    $i = Vector{0, Vector{12, 10, 0}, $string("\n")};
    $j = Vector{0, Vector{4, 0, 0, 0, 0}, $string("%d")};
    $k = Vector{
      0,
      Vector{
        11,
        $string("top_heap_words: "),
        Vector{4, 0, Vector{1, 1}, 0, Vector{12, 10, 0}}
      },
      $string("top_heap_words: %*d\n")
    };
    $l = Vector{
      0,
      Vector{
        11,
        $string("heap_words:     "),
        Vector{4, 0, Vector{1, 1}, 0, Vector{12, 10, 0}}
      },
      $string("heap_words:     %*d\n")
    };
    $m = Vector{
      0,
      Vector{
        11,
        $string("live_words:     "),
        Vector{4, 0, Vector{1, 1}, 0, Vector{12, 10, 0}}
      },
      $string("live_words:     %*d\n")
    };
    $n = Vector{
      0,
      Vector{
        11,
        $string("free_words:     "),
        Vector{4, 0, Vector{1, 1}, 0, Vector{12, 10, 0}}
      },
      $string("free_words:     %*d\n")
    };
    $o = Vector{
      0,
      Vector{
        11,
        $string("largest_free:   "),
        Vector{4, 0, Vector{1, 1}, 0, Vector{12, 10, 0}}
      },
      $string("largest_free:   %*d\n")
    };
    $p = Vector{
      0,
      Vector{
        11,
        $string("fragments:      "),
        Vector{4, 0, Vector{1, 1}, 0, Vector{12, 10, 0}}
      },
      $string("fragments:      %*d\n")
    };
    $q = Vector{0, Vector{12, 10, 0}, $string("\n")};
    $r = Vector{
      0,
      Vector{
        11,
        $string("live_blocks: "),
        Vector{4, 0, 0, 0, Vector{12, 10, 0}}
      },
      $string("live_blocks: %d\n")
    };
    $s = Vector{
      0,
      Vector{
        11,
        $string("free_blocks: "),
        Vector{4, 0, 0, 0, Vector{12, 10, 0}}
      },
      $string("free_blocks: %d\n")
    };
    $t = Vector{
      0,
      Vector{
        11,
        $string("heap_chunks: "),
        Vector{4, 0, 0, 0, Vector{12, 10, 0}}
      },
      $string("heap_chunks: %d\n")
    };
    $print_stat = function(dynamic $c__0) use ($Printf,$a,$b,$c,$call2,$call3,$call4,$caml_ml_string_length,$d,$e,$f,$g,$h,$i,$j,$k,$l,$m,$n,$o,$p,$q,$r,$runtime,$s,$t) {
      $st = $runtime["caml_gc_stat"](0);
      $call3($Printf[1], $c__0, $a, $st[4]);
      $call3($Printf[1], $c__0, $b, $st[5]);
      $call3($Printf[1], $c__0, $c, $st[14]);
      $call2($Printf[1], $c__0, $d);
      $l1 = $caml_ml_string_length($call2($Printf[4], $e, $st[1]));
      $call4($Printf[1], $c__0, $f, $l1, $st[1]);
      $call4($Printf[1], $c__0, $g, $l1, $st[2]);
      $call4($Printf[1], $c__0, $h, $l1, $st[3]);
      $call2($Printf[1], $c__0, $i);
      $l2 = $caml_ml_string_length($call2($Printf[4], $j, $st[15]));
      $call4($Printf[1], $c__0, $k, $l2, $st[15]);
      $call4($Printf[1], $c__0, $l, $l2, $st[6]);
      $call4($Printf[1], $c__0, $m, $l2, $st[8]);
      $call4($Printf[1], $c__0, $n, $l2, $st[10]);
      $call4($Printf[1], $c__0, $o, $l2, $st[12]);
      $call4($Printf[1], $c__0, $p, $l2, $st[13]);
      $call2($Printf[1], $c__0, $q);
      $call3($Printf[1], $c__0, $r, $st[9]);
      $call3($Printf[1], $c__0, $s, $st[11]);
      return $call3($Printf[1], $c__0, $t, $st[7]);
    };
    $allocated_bytes = function(dynamic $param) use ($Sys,$runtime) {
      $match = $runtime["caml_gc_counters"](0);
      $ma = $match[3];
      $pro = $match[2];
      $mi = $match[1];
      return ($mi + $ma - $pro) * (int) ($Sys[10] / 8);
    };
    $create_alarm = function(dynamic $f) {return Vector{0, 1};};
    $delete_alarm = function(dynamic $a) {$a[1] = 0;return 0;};
    $u = function(dynamic $A) use ($runtime) {
      return $runtime["caml_final_release"]($A);
    };
    $v = function(dynamic $z, dynamic $y) use ($runtime) {
      return $runtime["caml_final_register_called_without_value"]($z, $y);
    };
    $Gc = Vector{
      0,
      $print_stat,
      $allocated_bytes,
      function(dynamic $x, dynamic $w) use ($runtime) {
        return $runtime["caml_final_register"]($x, $w);
      },
      $v,
      $u,
      $create_alarm,
      $delete_alarm
    };
    
    $runtime["caml_register_global"](22, $Gc, "Gc");

  }
}

/*____hashes compiler:hashing-disabled inputs:hashing-disabled bytecode:hashing-disabled*/
