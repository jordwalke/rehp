<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class Stdlib__spacetime {
  <<__Override, __Memoize>>
  public static function get() : Vector<dynamic> {
    
    $runtime = (\Rehack\GlobalObject::get() as dynamic)->jsoo_runtime;
    $call1 = $runtime["caml_call1"];
    $string = $runtime["caml_new_string"];
    $caml_spacetime_enabled = $runtime["caml_spacetime_enabled"];
    $caml_spacetime_only_works_for_native_code = $runtime[
       "caml_spacetime_only_works_for_native_code"
     ];
    $cst_Series_is_closed__0 = $string("Series is closed");
    $cst_Series_is_closed = $string("Series is closed");
    $Stdlib = Stdlib::get();
    $enabled = $caml_spacetime_enabled(0);
    $if_spacetime_enabled = (dynamic $f) : dynamic ==> {
      return $enabled ? $call1($f, 0) : (0);
    };
    $create = (dynamic $path) : dynamic ==> {
      $channel = null as dynamic;
      $t = null as dynamic;
      if ($caml_spacetime_enabled(0)) {
        $channel = $call1($Stdlib[60], $path);
        $t = Vector{0, $channel, 0} as dynamic;
        $caml_spacetime_only_works_for_native_code($t[1]);
        return $t;
      }
      return Vector{0, $Stdlib[39], 1};
    };
    $save_event = (dynamic $time, dynamic $t, dynamic $event_name) : dynamic ==> {
      return $if_spacetime_enabled(
        (dynamic $param) : dynamic ==> {
          return $caml_spacetime_only_works_for_native_code(
            $time,
            $t[1],
            $event_name
          );
        }
      );
    };
    $save_and_close = (dynamic $time, dynamic $t) : dynamic ==> {
      return $if_spacetime_enabled(
        (dynamic $param) : dynamic ==> {
          if ($t[2]) {$call1($Stdlib[2], $cst_Series_is_closed);}
          $caml_spacetime_only_works_for_native_code($time, $t[1]);
          $call1($Stdlib[76], $t[1]);
          $t[2] = 1;
          return 0;
        }
      );
    };
    $Series = Vector{0, $create, $save_event, $save_and_close} as dynamic;
    $take = (dynamic $time, dynamic $param) : dynamic ==> {
      $channel = $param[1];
      $closed = $param[2];
      return $if_spacetime_enabled(
        (dynamic $param) : dynamic ==> {
          if ($closed) {$call1($Stdlib[2], $cst_Series_is_closed__0);}
          $runtime["caml_gc_minor"](0);
          return $caml_spacetime_only_works_for_native_code($time, $channel);
        }
      );
    };
    $Snapshot = Vector{0, $take} as dynamic;
    $save_event_for_automatic_snapshots = (dynamic $event_name) : dynamic ==> {
      return $if_spacetime_enabled(
        (dynamic $param) : dynamic ==> {
          return $caml_spacetime_only_works_for_native_code($event_name);
        }
      );
    };
    $Stdlib_spacetime = Vector{
      0,
      $enabled,
      $Series,
      $Snapshot,
      $save_event_for_automatic_snapshots
    } as dynamic;
    
    return($Stdlib_spacetime);

  }
  public static function save_event_for_automatic_snapshots(dynamic $event_name): dynamic {
    return static::syncCall(__FUNCTION__, 4, $event_name);
  }

}
/* Hashing disabled */
