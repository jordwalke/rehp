<?hh
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * Js_of_ocaml__WebSockets.php
 */

namespace Rehack;

final class Js_of_ocaml__WebSockets {
  <<__Memoize>>
  public static function get() {
    $global_object = \Rehack\GlobalObject::get();
    $runtime = \Rehack\Runtime::get();
    /*
     * Soon, these will replace the `global_data->ModuleName`
     * pattern in the load() function.
     */
    $Js_of_ocaml__Js = Js_of_ocaml__Js::get();
    Js_of_ocaml__WebSockets::load($global_object);
    $memoized = $runtime->caml_get_global_data()->Js_of_ocaml__WebSockets;
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
    $global_data = $runtime["caml_get_global_data"]();
    $Js_of_ocaml_Js = $global_data["Js_of_ocaml__Js"];
    $ta = function($x) use ($caml_call1,$runtime) {
      return $caml_call1(
        $runtime["caml_get_public_method"]($x, -492394744, 298),
        $x
      );
    };
    $tb = $Js_of_ocaml_Js[50][1];
    $webSocket = (function($t0, $param) {return $t0->WebSocket;})($tb, $ta);
    $is_supported = function($param) use ($Js_of_ocaml_Js,$caml_call1,$webSocket) {
      return $caml_call1($Js_of_ocaml_Js[6][5], $webSocket);
    };
    $Js_of_ocaml_WebSockets = Vector{
      0,
      $webSocket,
      $webSocket,
      $webSocket,
      $is_supported
    };
    
    $runtime["caml_register_global"](
      2,
      $Js_of_ocaml_WebSockets,
      "Js_of_ocaml__WebSockets"
    );

  }
}