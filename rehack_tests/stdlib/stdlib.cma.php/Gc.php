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
    $caml_arity_test = $runtime["caml_arity_test"];
    $caml_ml_string_length = $runtime["caml_ml_string_length"];
    $caml_new_string = $runtime["caml_new_string"];
    $caml_call2 = function($f, $a0, $a1) use ($caml_arity_test,$runtime) {
      return $caml_arity_test($f) == 2
        ? $f($a0, $a1)
        : ($runtime["caml_call_gen"]($f, varray[$a0,$a1]));
    };
    $caml_call3 = function($f, $a0, $a1, $a2) use ($caml_arity_test,$runtime) {
      return $caml_arity_test($f) == 3
        ? $f($a0, $a1, $a2)
        : ($runtime["caml_call_gen"]($f, varray[$a0,$a1,$a2]));
    };
    $caml_call4 = function($f, $a0, $a1, $a2, $a3) use ($caml_arity_test,$runtime) {
      return $caml_arity_test($f) == 4
        ? $f($a0, $a1, $a2, $a3)
        : ($runtime["caml_call_gen"]($f, varray[$a0,$a1,$a2,$a3]));
    };
    $global_data = $runtime["caml_get_global_data"]();
    $Sys = $global_data["Sys"];
    $Printf = $global_data["Printf"];
    $pr = R(
      0,
      R(
        11,
        $caml_new_string("minor_collections: "),
        R(4, 0, 0, 0, R(12, 10, 0))
      ),
      $caml_new_string("minor_collections: %d\n")
    );
    $ps = R(
      0,
      R(
        11,
        $caml_new_string("major_collections: "),
        R(4, 0, 0, 0, R(12, 10, 0))
      ),
      $caml_new_string("major_collections: %d\n")
    );
    $pt = R(
      0,
      R(
        11,
        $caml_new_string("compactions:       "),
        R(4, 0, 0, 0, R(12, 10, 0))
      ),
      $caml_new_string("compactions:       %d\n")
    );
    $pu = R(0, R(12, 10, 0), $caml_new_string("\n"));
    $pv = R(0, R(8, 0, 0, R(0, 0), 0), $caml_new_string("%.0f"));
    $pw = R(
      0,
      R(
        11,
        $caml_new_string("minor_words:    "),
        R(8, 0, R(1, 1), R(0, 0), R(12, 10, 0))
      ),
      $caml_new_string("minor_words:    %*.0f\n")
    );
    $px = R(
      0,
      R(
        11,
        $caml_new_string("promoted_words: "),
        R(8, 0, R(1, 1), R(0, 0), R(12, 10, 0))
      ),
      $caml_new_string("promoted_words: %*.0f\n")
    );
    $py = R(
      0,
      R(
        11,
        $caml_new_string("major_words:    "),
        R(8, 0, R(1, 1), R(0, 0), R(12, 10, 0))
      ),
      $caml_new_string("major_words:    %*.0f\n")
    );
    $pz = R(0, R(12, 10, 0), $caml_new_string("\n"));
    $pA = R(0, R(4, 0, 0, 0, 0), $caml_new_string("%d"));
    $pB = R(
      0,
      R(
        11,
        $caml_new_string("top_heap_words: "),
        R(4, 0, R(1, 1), 0, R(12, 10, 0))
      ),
      $caml_new_string("top_heap_words: %*d\n")
    );
    $pC = R(
      0,
      R(
        11,
        $caml_new_string("heap_words:     "),
        R(4, 0, R(1, 1), 0, R(12, 10, 0))
      ),
      $caml_new_string("heap_words:     %*d\n")
    );
    $pD = R(
      0,
      R(
        11,
        $caml_new_string("live_words:     "),
        R(4, 0, R(1, 1), 0, R(12, 10, 0))
      ),
      $caml_new_string("live_words:     %*d\n")
    );
    $pE = R(
      0,
      R(
        11,
        $caml_new_string("free_words:     "),
        R(4, 0, R(1, 1), 0, R(12, 10, 0))
      ),
      $caml_new_string("free_words:     %*d\n")
    );
    $pF = R(
      0,
      R(
        11,
        $caml_new_string("largest_free:   "),
        R(4, 0, R(1, 1), 0, R(12, 10, 0))
      ),
      $caml_new_string("largest_free:   %*d\n")
    );
    $pG = R(
      0,
      R(
        11,
        $caml_new_string("fragments:      "),
        R(4, 0, R(1, 1), 0, R(12, 10, 0))
      ),
      $caml_new_string("fragments:      %*d\n")
    );
    $pH = R(0, R(12, 10, 0), $caml_new_string("\n"));
    $pI = R(
      0,
      R(11, $caml_new_string("live_blocks: "), R(4, 0, 0, 0, R(12, 10, 0))),
      $caml_new_string("live_blocks: %d\n")
    );
    $pJ = R(
      0,
      R(11, $caml_new_string("free_blocks: "), R(4, 0, 0, 0, R(12, 10, 0))),
      $caml_new_string("free_blocks: %d\n")
    );
    $pK = R(
      0,
      R(11, $caml_new_string("heap_chunks: "), R(4, 0, 0, 0, R(12, 10, 0))),
      $caml_new_string("heap_chunks: %d\n")
    );
    $print_stat = function($c) use ($Printf,$caml_call2,$caml_call3,$caml_call4,$caml_ml_string_length,$pA,$pB,$pC,$pD,$pE,$pF,$pG,$pH,$pI,$pJ,$pK,$pr,$ps,$pt,$pu,$pv,$pw,$px,$py,$pz,$runtime) {
      $st = $runtime["caml_gc_stat"](0);
      $caml_call3($Printf[1], $c, $pr, $st[4]);
      $caml_call3($Printf[1], $c, $ps, $st[5]);
      $caml_call3($Printf[1], $c, $pt, $st[14]);
      $caml_call2($Printf[1], $c, $pu);
      $l1 = $caml_ml_string_length($caml_call2($Printf[4], $pv, $st[1]));
      $caml_call4($Printf[1], $c, $pw, $l1, $st[1]);
      $caml_call4($Printf[1], $c, $px, $l1, $st[2]);
      $caml_call4($Printf[1], $c, $py, $l1, $st[3]);
      $caml_call2($Printf[1], $c, $pz);
      $l2 = $caml_ml_string_length($caml_call2($Printf[4], $pA, $st[15]));
      $caml_call4($Printf[1], $c, $pB, $l2, $st[15]);
      $caml_call4($Printf[1], $c, $pC, $l2, $st[6]);
      $caml_call4($Printf[1], $c, $pD, $l2, $st[8]);
      $caml_call4($Printf[1], $c, $pE, $l2, $st[10]);
      $caml_call4($Printf[1], $c, $pF, $l2, $st[12]);
      $caml_call4($Printf[1], $c, $pG, $l2, $st[13]);
      $caml_call2($Printf[1], $c, $pH);
      $caml_call3($Printf[1], $c, $pI, $st[9]);
      $caml_call3($Printf[1], $c, $pJ, $st[11]);
      return $caml_call3($Printf[1], $c, $pK, $st[7]);
    };
    $allocated_bytes = function($param) use ($Sys,$runtime) {
      $match = $runtime["caml_gc_counters"](0);
      $ma = $match[3];
      $pro = $match[2];
      $mi = $match[1];
      return ($mi + $ma - $pro) * ($Sys[10] / 8 | 0);
    };
    $create_alarm = function($f) {return V(0, 1);};
    $delete_alarm = function($a) {$a[1] = 0;return 0;};
    $pL = function($pR) use ($runtime) {
      return $runtime["caml_final_release"]($pR);
    };
    $pM = function($pQ, $pP) use ($runtime) {
      return $runtime["caml_final_register_called_without_value"]($pQ, $pP);
    };
    $Gc = V(
      0,
      $print_stat,
      $allocated_bytes,
      function($pO, $pN) use ($runtime) {
        return $runtime["caml_final_register"]($pO, $pN);
      },
      $pM,
      $pL,
      $create_alarm,
      $delete_alarm
    );
    
    $runtime["caml_register_global"](22, $Gc, "Gc");

  }
}