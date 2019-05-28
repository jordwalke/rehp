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
    $caml_arity_test = $runtime["caml_arity_test"];
    $caml_get_public_method = $runtime["caml_get_public_method"];
    $caml_call1 = function($f, $a0) use ($caml_arity_test,$runtime) {
      return $caml_arity_test($f) === 1
        ? $f($a0)
        : ($runtime["caml_call_gen"]($f, varray[$a0]));
    };
    $global_data = $runtime["caml_get_global_data"]();
    $Js_of_ocaml_Js = $global_data["Js_of_ocaml__Js"];
    $Js_of_ocaml_Dom = $global_data["Js_of_ocaml__Dom"];
    $withCredentials = function($b) use ($caml_call1,$caml_get_public_method) {
      $init = (object)darray[];
      $lj = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, -893090218, 199), $x);
      };
      $lk = ! ! $b;
      ((function($t1, $t0, $param) {return $t1->withCredentials = $t0;})($init, $lk, $lj));
      return $init;
    };
    $lf = function($x) use ($caml_call1,$caml_get_public_method) {
      return $caml_call1($caml_get_public_method($x, -809811338, 200), $x);
    };
    $lg = $Js_of_ocaml_Js[50][1];
    $eventSource = (function($t2, $param) {return $t2->EventSource;})($lg, $lf);
    $lh = function($x) use ($caml_call1,$caml_get_public_method) {
      return $caml_call1($caml_get_public_method($x, -809811338, 201), $x);
    };
    $li = $Js_of_ocaml_Js[50][1];
    $eventSource_options = (function($t3, $param) {return $t3->EventSource;})($li, $lh);
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