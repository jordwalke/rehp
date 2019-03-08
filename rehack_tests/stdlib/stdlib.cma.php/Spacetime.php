<?hh
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * Spacetime.php
 */

namespace Rehack;

final class Spacetime {
  <<__Memoize>>
  public static function get() {
    $global_object = \Rehack\GlobalObject::get();
    $runtime = \Rehack\Runtime::get();
    /*
     * Soon, these will replace the `global_data->ModuleName`
     * pattern in the load() function.
     */
    $Gc = Gc::get();
    $Pervasives = Pervasives::get();
    Spacetime::load($global_object);
    $memoized = $runtime->caml_get_global_data()->Spacetime;
    return $memoized;
  }

  /**
   * Performs module load operation. May have side effects.
   */
  private static function load($joo_global_object) {
    

    $runtime = $joo_global_object->jsoo_runtime;
    $caml_arity_test = $runtime["caml_arity_test"];
    $caml_new_string = $runtime["caml_new_string"];
    $caml_spacetime_enabled = $runtime["caml_spacetime_enabled"];
    $caml_spacetime_only_works_for_native_code = $runtime[
       "caml_spacetime_only_works_for_native_code"
     ];
    $caml_call1 = function($f, $a0) use ($caml_arity_test,$runtime) {
      return $caml_arity_test($f) == 1
        ? $f($a0)
        : ($runtime["caml_call_gen"]($f, varray[$a0]));
    };
    $global_data = $runtime["caml_get_global_data"]();
    $cst_Series_is_closed__0 = $caml_new_string("Series is closed");
    $cst_Series_is_closed = $caml_new_string("Series is closed");
    $Pervasives = $global_data["Pervasives"];
    $enabled = $caml_spacetime_enabled(0);
    $if_spacetime_enabled = function($f) use ($caml_call1,$enabled) {
      return $enabled ? $caml_call1($f, 0) : (0);
    };
    $create = function($path) use ($Pervasives,$caml_call1,$caml_spacetime_enabled,$caml_spacetime_only_works_for_native_code) {
      if ($caml_spacetime_enabled(0)) {
        $channel = $caml_call1($Pervasives[48], $path);
        $t = Vector{0, $channel, 0};
        $caml_spacetime_only_works_for_native_code($t[1]);
        return $t;
      }
      return Vector{0, $Pervasives[27], 1};
    };
    $save_event = function($time, $t, $event_name) use ($caml_spacetime_only_works_for_native_code,$if_spacetime_enabled) {
      return $if_spacetime_enabled(
        function($param) use ($caml_spacetime_only_works_for_native_code,$event_name,$t,$time) {
          return $caml_spacetime_only_works_for_native_code(
            $time,
            $t[1],
            $event_name
          );
        }
      );
    };
    $save_and_close = function($time, $t) use ($Pervasives,$caml_call1,$caml_spacetime_only_works_for_native_code,$cst_Series_is_closed,$if_spacetime_enabled) {
      return $if_spacetime_enabled(
        function($param) use ($Pervasives,$caml_call1,$caml_spacetime_only_works_for_native_code,$cst_Series_is_closed,$t,$time) {
          if ($t[2]) {$caml_call1($Pervasives[2], $cst_Series_is_closed);}
          $caml_spacetime_only_works_for_native_code($time, $t[1]);
          $caml_call1($Pervasives[64], $t[1]);
          $t[2] = 1;
          return 0;
        }
      );
    };
    $Series = Vector{0, $create, $save_event, $save_and_close};
    $take = function($time, $param) use ($Pervasives,$caml_call1,$caml_spacetime_only_works_for_native_code,$cst_Series_is_closed__0,$if_spacetime_enabled,$runtime) {
      $channel = $param[1];
      $closed = $param[2];
      return $if_spacetime_enabled(
        function($param) use ($Pervasives,$caml_call1,$caml_spacetime_only_works_for_native_code,$channel,$closed,$cst_Series_is_closed__0,$runtime,$time) {
          if ($closed) {
            $caml_call1($Pervasives[2], $cst_Series_is_closed__0);
          }
          $runtime["caml_gc_minor"](0);
          return $caml_spacetime_only_works_for_native_code($time, $channel);
        }
      );
    };
    $Snapshot = Vector{0, $take};
    $save_event_for_automatic_snapshots = function($event_name) use ($caml_spacetime_only_works_for_native_code,$if_spacetime_enabled) {
      return $if_spacetime_enabled(
        function($param) use ($caml_spacetime_only_works_for_native_code,$event_name) {
          return $caml_spacetime_only_works_for_native_code($event_name);
        }
      );
    };
    $Spacetime = Vector{
      0,
      $enabled,
      $Series,
      $Snapshot,
      $save_event_for_automatic_snapshots
    };
    
    $runtime["caml_register_global"](3, $Spacetime, "Spacetime");

  }
}