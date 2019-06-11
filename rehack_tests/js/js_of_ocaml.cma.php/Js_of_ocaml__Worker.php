<?hh
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * Js_of_ocaml__Worker.php
 */

namespace Rehack;

final class Js_of_ocaml__Worker {
  <<__Memoize>>
  public static function get() {
    $global_object = \Rehack\GlobalObject::get();
    $runtime = \Rehack\Runtime::get();
    /*
     * Soon, these will replace the `global_data->ModuleName`
     * pattern in the load() function.
     */
    $Array_ = Array_::get();
    $Js_of_ocaml__Js = Js_of_ocaml__Js::get();
    $Pervasives = Pervasives::get();
    Js_of_ocaml__Worker::load($global_object);
    $memoized = $runtime->caml_get_global_data()->Js_of_ocaml__Worker;
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
    $caml_call1 = function(dynamic $f, dynamic $a0) use ($caml_arity_test,$runtime) {
      return $caml_arity_test($f) === 1
        ? $f($a0)
        : ($runtime["caml_call_gen"]($f, varray[$a0]));
    };
    $caml_call2 = function(dynamic $f, dynamic $a0, dynamic $a1) use ($caml_arity_test,$runtime) {
      return $caml_arity_test($f) === 2
        ? $f($a0, $a1)
        : ($runtime["caml_call_gen"]($f, varray[$a0,$a1]));
    };
    $global_data = $runtime["caml_get_global_data"]();
    $cst_Worker_onmessage_is_undefined__0 = $caml_new_string(
      "Worker.onmessage is undefined"
    );
    $cst_Worker_onmessage_is_undefined = $caml_new_string(
      "Worker.onmessage is undefined"
    );
    $cst_Worker_import_scripts_is_undefined = $caml_new_string(
      "Worker.import_scripts is undefined"
    );
    $Js_of_ocaml_Js = $global_data["Js_of_ocaml__Js"];
    $Pervasives = $global_data["Pervasives"];
    $Array = $global_data["Array_"];
    $te = function(dynamic $x) use ($caml_call1,$caml_get_public_method) {
      return $caml_call1($caml_get_public_method($x, -324422083, 299), $x);
    };
    $tf = $Js_of_ocaml_Js[50][1];
    $worker = (function(dynamic $t0, dynamic $param) {return $t0->Worker;})($tf, $te);
    $create = function(dynamic $script) use ($worker) {
      $tA = 0;
      $tB = $script->toString();
      return (function(dynamic $t2, dynamic $t1, dynamic $param) {return new $t2($t1);
       })($worker, $tB, $tA);
    };
    $import_scripts = function(dynamic $scripts) use ($Array,$Js_of_ocaml_Js,$Pervasives,$caml_call1,$caml_call2,$caml_get_public_method,$cst_Worker_import_scripts_is_undefined,$runtime) {
      $ts = $Js_of_ocaml_Js[3];
      $tt = function(dynamic $x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, 815769891, 300), $x);
      };
      $tu = $Js_of_ocaml_Js[50][1];
      if (
        (function(dynamic $t4, dynamic $param) {return $t4->importScripts;})($tu, $tt) === $ts
      ) {$caml_call1($Pervasives[1], $cst_Worker_import_scripts_is_undefined);
      }
      $tv = $caml_call1($Array[12], $scripts);
      $tw = function(dynamic $s) {return $s->toString();};
      $tx = $caml_call2($Array[15], $tw, $tv);
      $ty = function(dynamic $x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, 815769891, 301), $x);
      };
      $tz = $Js_of_ocaml_Js[50][1];
      return $runtime["caml_js_fun_call"](
        (function(dynamic $t3, dynamic $param) {return $t3->importScripts;})($tz, $ty),
        $tx
      );
    };
    $set_onmessage = function(dynamic $handler) use ($Js_of_ocaml_Js,$Pervasives,$caml_call1,$caml_get_public_method,$cst_Worker_onmessage_is_undefined,$runtime) {
      $tl = $Js_of_ocaml_Js[3];
      $tm = function(dynamic $x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, 610977416, 302), $x);
      };
      $tn = $Js_of_ocaml_Js[50][1];
      if (
        (function(dynamic $t8, dynamic $param) {return $t8->onmessage;})($tn, $tm) === $tl
      ) {$caml_call1($Pervasives[1], $cst_Worker_onmessage_is_undefined);}
      $js_handler = function(dynamic $ev) use ($caml_call1,$caml_get_public_method,$handler) {
        $tr = function(dynamic $x) use ($caml_call1,$caml_get_public_method) {
          return $caml_call1($caml_get_public_method($x, -1033677270, 303), $x
          );
        };
        return $caml_call1(
          $handler,
          (function(dynamic $t7, dynamic $param) {return $t7->data;})($ev, $tr)
        );
      };
      $to = function(dynamic $x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, 610977416, 304), $x);
      };
      $tp = $runtime["caml_js_wrap_callback"]($js_handler);
      $tq = $Js_of_ocaml_Js[50][1];
      return (function(dynamic $t6, dynamic $t5, dynamic $param) {$t6->onmessage = $t5;return 0;
       })($tq, $tp, $to);
    };
    $post_message = function(dynamic $msg) use ($Js_of_ocaml_Js,$Pervasives,$caml_call1,$caml_get_public_method,$cst_Worker_onmessage_is_undefined__0) {
      $tg = $Js_of_ocaml_Js[3];
      $th = function(dynamic $x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, -699849401, 305), $x);
      };
      $ti = $Js_of_ocaml_Js[50][1];
      if (
        (function(dynamic $t11, dynamic $param) {return $t11->postMessage;})($ti, $th) === $tg
      ) {$caml_call1($Pervasives[1], $cst_Worker_onmessage_is_undefined__0);}
      $tj = function(dynamic $x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, -699849401, 306), $x);
      };
      $tk = $Js_of_ocaml_Js[50][1];
      return (function(dynamic $t10, dynamic $t9, dynamic $param) {return $t10->postMessage($t9);
       })($tk, $msg, $tj);
    };
    $Js_of_ocaml_Worker = Vector{
      0,
      $create,
      $import_scripts,
      $set_onmessage,
      $post_message
    };
    
    $runtime["caml_register_global"](
      14,
      $Js_of_ocaml_Worker,
      "Js_of_ocaml__Worker"
    );

  }
}