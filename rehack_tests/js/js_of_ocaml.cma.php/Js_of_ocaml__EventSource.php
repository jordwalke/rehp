<?hh
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * Js_of_ocaml__EventSource.php
 */

namespace Rehack;

final class Js_of_ocaml__EventSource {
  <<__Memoize>>
  public static function get() {
    $global_object = \Rehack\GlobalObject::get();
    $runtime = \Rehack\Runtime::get();
    /*
     * Soon, these will replace the `global_data->ModuleName`
     * pattern in the load() function.
     */
    $Js_of_ocaml__Dom = Js_of_ocaml__Dom::get();
    $Js_of_ocaml__Js = Js_of_ocaml__Js::get();
    Js_of_ocaml__EventSource::load($global_object);
    $memoized = $runtime->caml_get_global_data()->Js_of_ocaml__EventSource;
    return $memoized;
  }

  /**
   * Performs module load operation. May have side effects.
   */
  private static function load($joo_global_object) {
    

    $runtime = $joo_global_object->jsoo_runtime;
    $call1 = $runtime["caml_call1"];
    $caml_get_public_method = $runtime["caml_get_public_method"];
    $global_data = $runtime["caml_get_global_data"]();
    $Js_of_ocaml_Js = $global_data["Js_of_ocaml__Js"];
    $Js_of_ocaml_Dom = $global_data["Js_of_ocaml__Dom"];
    $withCredentials = function(dynamic $b) use ($call1,$caml_get_public_method) {
      $init = darray[];
      $e = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, -893090218, 295), $x);
      };
      $f = ! ! $b;
      ((function(dynamic $t1, dynamic $t0, dynamic $param) {$t1->withCredentials = $t0;return 0;
        })($init, $f, $e));
      return $init;
    };
    $a = function(dynamic $x) use ($call1,$caml_get_public_method) {
      return $call1($caml_get_public_method($x, -809811338, 296), $x);
    };
    $b = $Js_of_ocaml_Js[50][1];
    $eventSource = (function(dynamic $t2, dynamic $param) {return $t2->EventSource;
     })($b, $a);
    $c = function(dynamic $x) use ($call1,$caml_get_public_method) {
      return $call1($caml_get_public_method($x, -809811338, 297), $x);
    };
    $d = $Js_of_ocaml_Js[50][1];
    $eventSource_options = (function(dynamic $t3, dynamic $param) {return $t3->EventSource;
     })($d, $c);
    $addEventListener = $Js_of_ocaml_Dom[15];
    $Js_of_ocaml_EventSource = Vector{
      0,
      $withCredentials,
      $eventSource,
      $eventSource_options,
      $addEventListener
    };
    
    $runtime["caml_register_global"](
      5,
      $Js_of_ocaml_EventSource,
      "Js_of_ocaml__EventSource"
    );

  }
}

