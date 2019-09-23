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
    $call1 = $runtime["caml_call1"];
    $call2 = $runtime["caml_call2"];
    $caml_get_public_method = $runtime["caml_get_public_method"];
    $string = $runtime["caml_new_string"];
    $global_data = $runtime["caml_get_global_data"]();
    $cst_Worker_onmessage_is_undefined__0 = $string(
      "Worker.onmessage is undefined"
    );
    $cst_Worker_onmessage_is_undefined = $string(
      "Worker.onmessage is undefined"
    );
    $cst_Worker_import_scripts_is_undefined = $string(
      "Worker.import_scripts is undefined"
    );
    $Js_of_ocaml_Js = $global_data["Js_of_ocaml__Js"];
    $Pervasives = $global_data["Pervasives"];
    $Array = $global_data["Array_"];
    $a = function(dynamic $x) use ($call1,$caml_get_public_method) {
      return $call1($caml_get_public_method($x, -324422083, 203), $x);
    };
    $b = $Js_of_ocaml_Js[50][1];
    $worker = (function(dynamic $t0, dynamic $param) {return $t0->Worker;})($b, $a);
    $create = function(dynamic $script) use ($worker) {
      $w = 0;
      $x = $script->toString();
      return (function(dynamic $t2, dynamic $t1, dynamic $param) {return new $t2($t1);
       })($worker, $x, $w);
    };
    $import_scripts = function(dynamic $scripts) use ($Array,$Js_of_ocaml_Js,$Pervasives,$call1,$call2,$caml_get_public_method,$cst_Worker_import_scripts_is_undefined,$runtime) {
      $o = $Js_of_ocaml_Js[3];
      $p = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, 815769891, 204), $x);
      };
      $q = $Js_of_ocaml_Js[50][1];
      if (
        (function(dynamic $t4, dynamic $param) {return $t4->importScripts;})($q, $p) === $o
      ) {$call1($Pervasives[1], $cst_Worker_import_scripts_is_undefined);}
      $r = $call1($Array[12], $scripts);
      $s = function(dynamic $s) {return $s->toString();};
      $t = $call2($Array[15], $s, $r);
      $u = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, 815769891, 205), $x);
      };
      $v = $Js_of_ocaml_Js[50][1];
      return $runtime["caml_js_fun_call"](
        (function(dynamic $t3, dynamic $param) {return $t3->importScripts;})($v, $u),
        $t
      );
    };
    $set_onmessage = function(dynamic $handler) use ($Js_of_ocaml_Js,$Pervasives,$call1,$caml_get_public_method,$cst_Worker_onmessage_is_undefined,$runtime) {
      $h = $Js_of_ocaml_Js[3];
      $i = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, 610977416, 206), $x);
      };
      $j = $Js_of_ocaml_Js[50][1];
      if (
        (function(dynamic $t8, dynamic $param) {return $t8->onmessage;})($j, $i) === $h
      ) {$call1($Pervasives[1], $cst_Worker_onmessage_is_undefined);}
      $js_handler = function(dynamic $ev) use ($call1,$caml_get_public_method,$handler) {
        $n = function(dynamic $x) use ($call1,$caml_get_public_method) {
          return $call1($caml_get_public_method($x, -1033677270, 207), $x);
        };
        return $call1(
          $handler,
          (function(dynamic $t7, dynamic $param) {return $t7->data;})($ev, $n)
        );
      };
      $k = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, 610977416, 208), $x);
      };
      $l = $runtime["caml_js_wrap_callback"]($js_handler);
      $m = $Js_of_ocaml_Js[50][1];
      return (function(dynamic $t6, dynamic $t5, dynamic $param) {$t6->onmessage = $t5;return 0;
       })($m, $l, $k);
    };
    $post_message = function(dynamic $msg) use ($Js_of_ocaml_Js,$Pervasives,$call1,$caml_get_public_method,$cst_Worker_onmessage_is_undefined__0) {
      $c = $Js_of_ocaml_Js[3];
      $d = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, -699849401, 209), $x);
      };
      $e = $Js_of_ocaml_Js[50][1];
      if (
        (function(dynamic $t11, dynamic $param) {return $t11->postMessage;})($e, $d) === $c
      ) {$call1($Pervasives[1], $cst_Worker_onmessage_is_undefined__0);}
      $f = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, -699849401, 210), $x);
      };
      $g = $Js_of_ocaml_Js[50][1];
      return (function(dynamic $t10, dynamic $t9, dynamic $param) {return $t10->postMessage($t9);
       })($g, $msg, $f);
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

/*____hashes compiler:hashing-disabled inputs:hashing-disabled bytecode:hashing-disabled*/
