<?hh
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * Js_of_ocaml__XmlHttpRequest.php
 */

namespace Rehack;

final class Js_of_ocaml__XmlHttpRequest {
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
    $Assert_failure = Assert_failure::get();
    Js_of_ocaml__XmlHttpRequest::load($global_object);
    $memoized = $runtime->caml_get_global_data()->Js_of_ocaml__XmlHttpRequest;
    return $memoized;
  }

  /**
   * Performs module load operation. May have side effects.
   */
  private static function load($joo_global_object) {
    

    $runtime = $joo_global_object->jsoo_runtime;
    $caml_arity_test = $runtime["caml_arity_test"];
    $caml_get_public_method = $runtime["caml_get_public_method"];
    $caml_new_string = $runtime["caml_new_string"];
    $caml_call1 = function($f, $a0) use ($caml_arity_test,$runtime) {
      return $caml_arity_test($f) === 1
        ? $f($a0)
        : ($runtime["caml_call_gen"]($f, varray[$a0]));
    };
    $global_data = $runtime["caml_get_global_data"]();
    $cst_readystatechange = $caml_new_string("readystatechange");
    $cst_loadstart = $caml_new_string("loadstart");
    $cst_progress = $caml_new_string("progress");
    $cst_abort = $caml_new_string("abort");
    $cst_error = $caml_new_string("error");
    $cst_load = $caml_new_string("load");
    $cst_timeout = $caml_new_string("timeout");
    $cst_loadend = $caml_new_string("loadend");
    $Js_of_ocaml_Js = $global_data["Js_of_ocaml__Js"];
    $Assert_failure = $global_data["Assert_failure"];
    $Js_of_ocaml_Dom = $global_data["Js_of_ocaml__Dom"];
    $tB = Vector{
      0,
      $caml_new_string("lib/js_of_ocaml/xmlHttpRequest.ml"),
      125,
      75
    };
    $readystatechange = $caml_call1(
      $Js_of_ocaml_Dom[14][1],
      $cst_readystatechange
    );
    $loadstart = $caml_call1($Js_of_ocaml_Dom[14][1], $cst_loadstart);
    $progress = $caml_call1($Js_of_ocaml_Dom[14][1], $cst_progress);
    $abort = $caml_call1($Js_of_ocaml_Dom[14][1], $cst_abort);
    $error = $caml_call1($Js_of_ocaml_Dom[14][1], $cst_error);
    $load = $caml_call1($Js_of_ocaml_Dom[14][1], $cst_load);
    $timeout = $caml_call1($Js_of_ocaml_Dom[14][1], $cst_timeout);
    $loadend = $caml_call1($Js_of_ocaml_Dom[14][1], $cst_loadend);
    $Event = Vector{
      0,
      $readystatechange,
      $loadstart,
      $progress,
      $abort,
      $error,
      $load,
      $timeout,
      $loadend
    };
    $create = function($param) use ($Assert_failure,$Js_of_ocaml_Js,$caml_call1,$caml_get_public_method,$runtime,$tB) {
      $tC = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, -1035517745, 307), $x);
      };
      $tD = $Js_of_ocaml_Js[50][1];
      $xmlHttpRequest = (function($t8, $param) {return $t8->XMLHttpRequest;})($tD, $tC);
      $tE = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, -5445583, 308), $x);
      };
      $tF = $Js_of_ocaml_Js[50][1];
      $activeXObject = (function($t7, $param) {return $t7->activeXObject;})($tF, $tE);
      try {
        $tP = 0;
        $tQ = (function($t6, $param) {return new $t6();})($xmlHttpRequest, $tP);
        return $tQ;
      }
      catch(\Throwable $tR) {
        try {
          $tM = 0;
          $tN = "Msxml2.XMLHTTP";
          $tO = (function($t5, $t4, $param) {return new $t5($t4);})($activeXObject, $tN, $tM);
          return $tO;
        }
        catch(\Throwable $tS) {
          try {
            $tJ = 0;
            $tK = "Msxml3.XMLHTTP";
            $tL = (function($t3, $t2, $param) {return new $t3($t2);})($activeXObject, $tK, $tJ);
            return $tL;
          }
          catch(\Throwable $tT) {
            try {
              $tG = 0;
              $tH = "Microsoft.XMLHTTP";
              $tI = (function($t1, $t0, $param) {return new $t1($t0);})($activeXObject, $tH, $tG);
              return $tI;
            }
            catch(\Throwable $tU) {
              throw $runtime["caml_wrap_thrown_exception"](Vector{0, $Assert_failure, $tB}) as \Throwable;
            }
          }
        }
      }
    };
    $Js_of_ocaml_XmlHttpRequest = Vector{0, $create, $Event};
    
    $runtime["caml_register_global"](
      17,
      $Js_of_ocaml_XmlHttpRequest,
      "Js_of_ocaml__XmlHttpRequest"
    );

  }
}