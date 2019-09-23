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
    $call2 = $runtime["caml_call2"];
    $unsigned_right_shift_32 = $runtime["unsigned_right_shift_32"];
    $global_data = $runtime["caml_get_global_data"]();
    $cst_Sort_array = $runtime["caml_new_string"]("Sort.array");
    $Invalid_argument = $global_data["Invalid_argument"];
    $merge->contents = function(dynamic $order, dynamic $l1, dynamic $l2) use ($call2,$merge) {
      if ($l1) {
        $t1 = $l1[2];
        $h1 = $l1[1];
        if ($l2) {
          $t2 = $l2[2];
          $h2 = $l2[1];
          return $call2($order, $h1, $h2)
            ? Vector{0, $h1, $merge->contents($order, $t1, $l2)}
            : (Vector{0, $h2, $merge->contents($order, $l1, $t2)});
        }
        return $l1;
      }
      return $l2;
    };
    $list = function(dynamic $order, dynamic $l) use ($call2,$merge) {
      $initlist = new Ref();$merge2 = new Ref();
      $initlist->contents = function(dynamic $param) use ($call2,$initlist,$order) {
        if ($param) {
          $i = $param[2];
          $j = $param[1];
          if ($i) {
            $rest = $i[2];
            $e2 = $i[1];
            $k = $initlist->contents($rest);
            $l = $call2($order, $j, $e2)
              ? Vector{0, $j, Vector{0, $e2, 0}}
              : (Vector{0, $e2, Vector{0, $j, 0}});
            return Vector{0, $l, $k};
          }
          return Vector{0, Vector{0, $j, 0}, 0};
        }
        return 0;
      };
      $merge2->contents = function(dynamic $x) use ($merge,$merge2,$order) {
        if ($x) {
          $g = $x[2];
          if ($g) {
            $rest = $g[2];
            $l2 = $g[1];
            $l1 = $x[1];
            $h = $merge2->contents($rest);
            return Vector{0, $merge->contents($order, $l1, $l2), $h};
          }
        }
        return $x;
      };
      $mergeall = function(dynamic $llist) use ($merge2) {
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
    $swap = function(dynamic $arr, dynamic $i, dynamic $j) {
      $tmp = $arr[$i + 1];
      $arr[$i + 1] = $arr[$j + 1];
      $arr[$j + 1] = $tmp;
      return 0;
    };
    $array = function(dynamic $cmp, dynamic $arr) use ($Invalid_argument,$call2,$cst_Sort_array,$runtime,$swap,$unsigned_right_shift_32) {
      $qsort = new Ref();
      $qsort->contents = function(dynamic $lo, dynamic $hi) use ($Invalid_argument,$arr,$call2,$cmp,$cst_Sort_array,$qsort,$runtime,$swap,$unsigned_right_shift_32) {
        $lo__0 = $lo;
        $hi__0 = $hi;
        $continue_counter = null;
        for (;;) {
          $d = 6 <= (int) ($hi__0 - $lo__0) ? 1 : (0);
          if ($d) {
            $mid = (int) $unsigned_right_shift_32((int) ($lo__0 + $hi__0), 1);
            if ($call2($cmp, $arr[$mid + 1], $arr[$lo__0 + 1])) {$swap($arr, $mid, $lo__0);}
            if ($call2($cmp, $arr[$hi__0 + 1], $arr[$mid + 1])) {
              $swap($arr, $mid, $hi__0);
              if ($call2($cmp, $arr[$mid + 1], $arr[$lo__0 + 1])) {$swap($arr, $mid, $lo__0);}
            }
            $pivot = $arr[$mid + 1];
            $i = Vector{0, (int) ($lo__0 + 1)};
            $j = Vector{0, (int) ($hi__0 + -1)};
            $e = 1 - $call2($cmp, $pivot, $arr[$hi__0 + 1]);
            $f = $e ? $e : (1 - $call2($cmp, $arr[$lo__0 + 1], $pivot));
            if ($f) {
              throw $runtime["caml_wrap_thrown_exception"](
                      Vector{0, $Invalid_argument, $cst_Sort_array}
                    ) as \Throwable;
            }
            for (;;) {
              if ($i[1] < $j[1]) {
                for (;;) {
                  if ($call2($cmp, $pivot, $arr[$i[1] + 1])) {
                    for (;;) {
                      if ($call2($cmp, $arr[$j[1] + 1], $pivot)) {
                        if ($i[1] < $j[1]) {$swap($arr, $i[1], $j[1]);}
                        $i[1] += 1;
                        $j[1] += -1;
                        $continue_counter = 1;break;
                      }
                      $j[1] += -1;
                      continue;
                    }
                    if ($continue_counter > 0) {
                      $continue_counter -= 1;
                      break;
                    }
                    else if ($continue_counter === 0) {
                      $continue_counter = null;
                      continue;
                    }
                  }
                  $i[1] += 1;
                  continue;
                }
                if ($continue_counter > 0) {
                  $continue_counter -= 1;
                  break;
                }
                else if ($continue_counter === 0) {
                  $continue_counter = null;
                  continue;
                }
              }
              if ((int) ($j[1] - $lo__0) <= (int) ($hi__0 - $i[1])) {
                $qsort->contents($lo__0, $j[1]);
                $lo__1 = $i[1];
                $lo__0 = $lo__1;
                $continue_counter = 0;break;
              }
              $qsort->contents($i[1], $hi__0);
              $hi__1 = $j[1];
              $hi__0 = $hi__1;
              $continue_counter = 0;break;
            }
            if ($continue_counter > 0) {
              $continue_counter -= 1;
              break;
            }
            else if ($continue_counter === 0) {
              $continue_counter = null;
              continue;
            }
          }
          return $d;
        }
      };
      $qsort->contents(0, (int) ($arr->count() - 1 + -1));
      $b = (int) ($arr->count() - 1 + -1);
      $a = 1;
      if (! ($b < 1)) {
        $i = $a;
        for (;;) {
          $val_i = $arr[$i + 1];
          if (1 - $call2($cmp, $arr[(int) ($i + -1) + 1], $val_i)) {
            $arr[$i + 1] = $arr[(int) ($i + -1) + 1];
            $j = Vector{0, (int) ($i + -1)};
            for (;;) {
              if (1 <= $j[1]) {
                if (! $call2($cmp, $arr[(int) ($j[1] + -1) + 1], $val_i)) {
                  $arr[$j[1] + 1] = $arr[(int) ($j[1] + -1) + 1];
                  $j[1] += -1;
                  continue;
                }
              }
              $arr[$j[1] + 1] = $val_i;
              break;
            }
            if ($continue_counter > 0) {
              $continue_counter -= 1;
              break;
            }
            else if ($continue_counter === 0) {
              $continue_counter = null;
              continue;
            }
          }
          $c = (int) ($i + 1);
          if ($b !== $i) {$i = $c;continue;}
          break;
        }
      }
      return 0;
    };
    $Sort = Vector{0, $list, $array, $merge->contents};
    
    $runtime["caml_register_global"](2, $Sort, "Sort");

  }
}

