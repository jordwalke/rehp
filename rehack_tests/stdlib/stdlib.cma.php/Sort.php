<?hh
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * Sort.php
 */

namespace Rehack;

final class Sort {
  <<__Memoize>>
  public static function get() {
    $global_object = \Rehack\GlobalObject::get();
    $runtime = \Rehack\Runtime::get();
    /*
     * Soon, these will replace the `global_data->ModuleName`
     * pattern in the load() function.
     */
    $Invalid_argument = Invalid_argument::get();
    Sort::load($global_object);
    $memoized = $runtime->caml_get_global_data()->Sort;
    return $memoized;
  }

  /**
   * Performs module load operation. May have side effects.
   */
  private static function load($joo_global_object) {
    

    $merge = new Ref();
    $runtime = $joo_global_object->jsoo_runtime;
    $unsigned_right_shift_32 = $runtime["unsigned_right_shift_32"];
    $caml_arity_test = $runtime["caml_arity_test"];
    $caml_new_string = $runtime["caml_new_string"];
    $caml_call2 = function($f, $a0, $a1) use ($caml_arity_test,$runtime) {
      return $caml_arity_test($f) == 2
        ? $f($a0, $a1)
        : ($runtime["caml_call_gen"]($f, varray[$a0,$a1]));
    };
    $global_data = $runtime["caml_get_global_data"]();
    $cst_Sort_array = $caml_new_string("Sort.array");
    $Invalid_argument = $global_data["Invalid_argument"];
    $_ = $merge->contents =
      function($order, $l1, $l2) use ($caml_call2,$merge) {
        if ($l1) {
          $t1 = $l1[2];
          $h1 = $l1[1];
          if ($l2) {
            $t2 = $l2[2];
            $h2 = $l2[1];
            return $caml_call2($order, $h1, $h2)
              ? Vector{0, $h1, $merge->contents($order, $t1, $l2)}
              : (Vector{0, $h2, $merge->contents($order, $l1, $t2)});
          }
          return $l1;
        }
        return $l2;
      };
    $list = function($order, $l) use ($caml_call2,$merge) {
      $initlist = new Ref();$merge2 = new Ref();
      $_ = $initlist->contents =
        function($param) use ($caml_call2,$initlist,$order) {
          if ($param) {
            $cL = $param[2];
            $cM = $param[1];
            if ($cL) {
              $rest = $cL[2];
              $e2 = $cL[1];
              $cN = $initlist->contents($rest);
              $cO = $caml_call2($order, $cM, $e2)
                ? Vector{0, $cM, Vector{0, $e2, 0}}
                : (Vector{0, $e2, Vector{0, $cM, 0}});
              return Vector{0, $cO, $cN};
            }
            return Vector{0, Vector{0, $cM, 0}, 0};
          }
          return 0;
        };
      $_ = $merge2->contents =
        function($x) use ($merge,$merge2,$order) {
          if ($x) {
            $cJ = $x[2];
            if ($cJ) {
              $rest = $cJ[2];
              $l2 = $cJ[1];
              $l1 = $x[1];
              $cK = $merge2->contents($rest);
              return Vector{0, $merge->contents($order, $l1, $l2), $cK};
            }
          }
          return $x;
        };
      $mergeall = function($llist) use ($merge2) {
        $llist__0 = $llist;
        for (;;) {
          if ($llist__0) {
            if ($llist__0[2]) {
              $llist__1 = $merge2->contents($llist__0);
              $llist__0 = $llist__1;
              continue;
            }
            $l = $llist__0[1];
            return $l;
          }
          return 0;
        }
      };
      return $mergeall($initlist->contents($l));
    };
    $swap = function($arr, $i, $j) {
      $tmp = $arr[$i + 1];
      $arr[$i + 1] = $arr[$j + 1];
      return $arr[$j + 1] = $tmp;
    };
    $array = function($cmp, $arr) use ($Invalid_argument,$caml_call2,$cst_Sort_array,$runtime,$swap,$unsigned_right_shift_32) {
      $qsort = new Ref();
      $_ = $qsort->contents =
        function($lo, $hi) use ($Invalid_argument,$arr,$caml_call2,$cmp,$cst_Sort_array,$qsort,$runtime,$swap,$unsigned_right_shift_32) {
          $lo__0 = $lo;
          $hi__0 = $hi;
          for (;;) {
            $cG = 6 <= ($hi__0 - $lo__0 | 0) ? 1 : (0);
            if ($cG) {
              $mid = $unsigned_right_shift_32($lo__0 + $hi__0 | 0, 1) | 0;
              if ($caml_call2($cmp, $arr[$mid + 1], $arr[$lo__0 + 1])) {$swap($arr, $mid, $lo__0);}
              if ($caml_call2($cmp, $arr[$hi__0 + 1], $arr[$mid + 1])) {
                $swap($arr, $mid, $hi__0);
                if ($caml_call2($cmp, $arr[$mid + 1], $arr[$lo__0 + 1])) {$swap($arr, $mid, $lo__0);}
              }
              $pivot = $arr[$mid + 1];
              $i = Vector{0, $lo__0 + 1 | 0};
              $j = Vector{0, $hi__0 + -1 | 0};
              $cH = 1 - $caml_call2($cmp, $pivot, $arr[$hi__0 + 1]);
              $cI = $cH || 1 - $caml_call2($cmp, $arr[$lo__0 + 1], $pivot);
              if ($cI) {
                throw $runtime["caml_wrap_thrown_exception"](
                        Vector{0, $Invalid_argument, $cst_Sort_array}
                      );
              }
              for (;;) {
                if ($i[1] < $j[1]) {
                  for (;;) {
                    if ($caml_call2($cmp, $pivot, $arr[$i[1] + 1])) {
                      for (;;) {
                        if ($caml_call2($cmp, $arr[$j[1] + 1], $pivot)) {
                          if ($i[1] < $j[1]) {$swap($arr, $i[1], $j[1]);}
                          $i[1] += 1;
                          $j[1] += -1;
                          goto b_continue;
                        }
                        $j[1] += -1;
                        continue;
                      }
                    }
                    $i[1] += 1;
                    continue;
                  }
                }
                if (($j[1] - $lo__0 | 0) <= ($hi__0 - $i[1] | 0)) {
                  $qsort->contents($lo__0, $j[1]);
                  $lo__1 = $i[1];
                  $lo__0 = $lo__1;
                  goto a_continue;
                }
                $qsort->contents($i[1], $hi__0);
                $hi__1 = $j[1];
                $hi__0 = $hi__1;
                goto a_continue;
                b_continue:;
                
              }
              b_break:
            }
            return $cG;
            a_continue:;
            
          }
          a_break:
        };
      $qsort->contents(0, $arr->count() - 1 + -1 | 0);
      $cE = $arr->count() - 1 + -1 | 0;
      $cD = 1;
      if (! ($cE < 1)) {
        $i = $cD;
        for (;;) {
          $val_i = $arr[$i + 1];
          if (1 - $caml_call2($cmp, $arr[($i + -1 | 0) + 1], $val_i)) {
            $arr[$i + 1] = $arr[($i + -1 | 0) + 1];
            $j = Vector{0, $i + -1 | 0};
            for (;;) {
              if (1 <= $j[1]) {
                if (! $caml_call2($cmp, $arr[($j[1] + -1 | 0) + 1], $val_i)) {
                  $arr[$j[1] + 1] = $arr[($j[1] + -1 | 0) + 1];
                  $j[1] += -1;
                  continue;
                }
              }
              $arr[$j[1] + 1] = $val_i;
              break;
            }
          }
          $cF = $i + 1 | 0;
          if ($cE !== $i) {$i = $cF;continue;}
          break;
        }
      }
      return 0;
    };
    $Sort = Vector{0, $list, $array, $merge->contents};
    
    $runtime["caml_register_global"](2, $Sort, "Sort");

  }
}