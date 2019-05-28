<?hh
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * Js_of_ocaml__Dom_events.php
 */

namespace Rehack;

final class Js_of_ocaml__Dom_events {
  <<__Memoize>>
  public static function get() {
    $global_object = \Rehack\GlobalObject::get();
    $runtime = \Rehack\Runtime::get();
    /*
     * Soon, these will replace the `global_data->ModuleName`
     * pattern in the load() function.
     */
    $Js_of_ocaml__Dom_html = Js_of_ocaml__Dom_html::get();
    $Js_of_ocaml__Js = Js_of_ocaml__Js::get();
    Js_of_ocaml__Dom_events::load($global_object);
    $memoized = $runtime->caml_get_global_data()->Js_of_ocaml__Dom_events;
    return $memoized;
  }

  /**
   * Performs module load operation. May have side effects.
   */
  private static function load($joo_global_object) {
    

    $runtime = $joo_global_object->jsoo_runtime;
    $caml_arity_test = $runtime["caml_arity_test"];
    $caml_call1 = function($f, $a0) use ($caml_arity_test,$runtime) {
      return $caml_arity_test($f) === 1
        ? $f($a0)
        : ($runtime["caml_call_gen"]($f, varray[$a0]));
    };
    $caml_call2 = function($f, $a0, $a1) use ($caml_arity_test,$runtime) {
      return $caml_arity_test($f) === 2
        ? $f($a0, $a1)
        : ($runtime["caml_call_gen"]($f, varray[$a0,$a1]));
    };
    $caml_call4 = function($f, $a0, $a1, $a2, $a3) use ($caml_arity_test,$runtime) {
      return $caml_arity_test($f) === 4
        ? $f($a0, $a1, $a2, $a3)
        : ($runtime["caml_call_gen"]($f, varray[$a0,$a1,$a2,$a3]));
    };
    $global_data = $runtime["caml_get_global_data"]();
    $Js_of_ocaml_Dom_html = $global_data["Js_of_ocaml__Dom_html"];
    $listen = function($opt, $target, $typ, $cb) use ($Js_of_ocaml_Dom_html,$caml_call1,$caml_call2,$caml_call4) {
      if ($opt) {
        $sth = $opt[1];
        $capture = $sth;
      }
      else {$capture = 0;}
      $kV = ! ! $capture;
      $kW = function($n, $e) use ($caml_call2,$cb) {
        return ! ! $caml_call2($cb, $n, $e);
      };
      $kX = $caml_call1($Js_of_ocaml_Dom_html[11], $kW);
      return $caml_call4($Js_of_ocaml_Dom_html[16], $target, $typ, $kX, $kV);
    };
    $stop_listen = $Js_of_ocaml_Dom_html[17];
    $Js_of_ocaml_Dom_events = Vector{
      0,
      $Js_of_ocaml_Dom_html[15],
      $listen,
      $stop_listen
    };
    
    $runtime["caml_register_global"](
      1,
      $Js_of_ocaml_Dom_events,
      "Js_of_ocaml__Dom_events"
    );

  }
}