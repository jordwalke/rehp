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
    $td = function($x) use ($caml_call1,$caml_get_public_method) {
      return $caml_call1($caml_get_public_method($x, -324422083, 299), $x);
    };
    $te = $Js_of_ocaml_Js[50][1];
    $worker = (function($t0, $param) {return $t0->Worker;})($te, $td);
    $create = function($script) use ($worker) {
      $tz = 0;
      $tA = $script->toString();
      return (function($t2, $t1, $param) {return new $t2($t1);})($worker, $tA, $tz);
    };
    $import_scripts = function($scripts) use ($Array,$Js_of_ocaml_Js,$Pervasives,$caml_call1,$caml_call2,$caml_get_public_method,$cst_Worker_import_scripts_is_undefined,$runtime) {
      $tr = $Js_of_ocaml_Js[3];
      $ts = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, 815769891, 300), $x);
      };
      $tt = $Js_of_ocaml_Js[50][1];
      if (
        (function($t4, $param) {return $t4->importScripts;})($tt, $ts) === $tr
      ) {$caml_call1($Pervasives[1], $cst_Worker_import_scripts_is_undefined);
      }
      $tu = $caml_call1($Array[12], $scripts);
      $tv = function($s) {return $s->toString();};
      $tw = $caml_call2($Array[15], $tv, $tu);
      $tx = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, 815769891, 301), $x);
      };
      $ty = $Js_of_ocaml_Js[50][1];
      return $runtime["caml_js_fun_call"](
        (function($t3, $param) {return $t3->importScripts;})($ty, $tx),
        $tw
      );
    };
    $set_onmessage = function($handler) use ($Js_of_ocaml_Js,$Pervasives,$caml_call1,$caml_get_public_method,$cst_Worker_onmessage_is_undefined,$runtime) {
      $tk = $Js_of_ocaml_Js[3];
      $tl = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, 610977416, 302), $x);
      };
      $tm = $Js_of_ocaml_Js[50][1];
      if ((function($t8, $param) {return $t8->onmessage;})($tm, $tl) === $tk) {$caml_call1($Pervasives[1], $cst_Worker_onmessage_is_undefined);}
      $js_handler = function($ev) use ($caml_call1,$caml_get_public_method,$handler) {
        $tq = function($x) use ($caml_call1,$caml_get_public_method) {
          return $caml_call1($caml_get_public_method($x, -1033677270, 303), $x
          );
        };
        return $caml_call1(
          $handler,
          (function($t7, $param) {return $t7->data;})($ev, $tq)
        );
      };
      $tn = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, 610977416, 304), $x);
      };
      $to = $runtime["caml_js_wrap_callback"]($js_handler);
      $tp = $Js_of_ocaml_Js[50][1];
      return (function($t6, $t5, $param) {$t6->onmessage = $t5;return 0;})($tp, $to, $tn);
    };
    $post_message = function($msg) use ($Js_of_ocaml_Js,$Pervasives,$caml_call1,$caml_get_public_method,$cst_Worker_onmessage_is_undefined__0) {
      $tf = $Js_of_ocaml_Js[3];
      $tg = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, -699849401, 305), $x);
      };
      $th = $Js_of_ocaml_Js[50][1];
      if (
        (function($t11, $param) {return $t11->postMessage;})($th, $tg) === $tf
      ) {$caml_call1($Pervasives[1], $cst_Worker_onmessage_is_undefined__0);}
      $ti = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, -699849401, 306), $x);
      };
      $tj = $Js_of_ocaml_Js[50][1];
      return (function($t10, $t9, $param) {return $t10->postMessage($t9);})($tj, $msg, $ti);
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