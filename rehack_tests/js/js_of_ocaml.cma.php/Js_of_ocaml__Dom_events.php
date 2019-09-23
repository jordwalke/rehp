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
    $call1 = $runtime["caml_call1"];
    $call2 = $runtime["caml_call2"];
    $call4 = $runtime["caml_call4"];
    $global_data = $runtime["caml_get_global_data"]();
    $Js_of_ocaml_Dom_html = $global_data["Js_of_ocaml__Dom_html"];
    $listen = function
    (dynamic $opt, dynamic $target, dynamic $typ, dynamic $cb) use ($Js_of_ocaml_Dom_html,$call1,$call2,$call4) {
      if ($opt) {
        $sth = $opt[1];
        $capture = $sth;
      }
      else {$capture = 0;}
      $a = ! ! $capture;
      $b = function(dynamic $n, dynamic $e) use ($call2,$cb) {
        return ! ! $call2($cb, $n, $e);
      };
      $c = $call1($Js_of_ocaml_Dom_html[11], $b);
      return $call4($Js_of_ocaml_Dom_html[16], $target, $typ, $c, $a);
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

