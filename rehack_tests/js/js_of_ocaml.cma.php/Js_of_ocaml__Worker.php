<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class Js_of_ocaml__Worker {
  <<__Override, __Memoize>>
  public static function get() : Vector<dynamic> {
    $joo_global_object = \Rehack\GlobalObject::get() as dynamic;
    
    $runtime = $joo_global_object->jsoo_runtime;
    $call1 = $runtime["caml_call1"];
    $call2 = $runtime["caml_call2"];
    $caml_get_public_method = $runtime["caml_get_public_method"];
    $string = $runtime["caml_new_string"];
    $cst_Worker_onmessage_is_undefined__0 = $string(
      "Worker.onmessage is undefined"
    );
    $cst_Worker_onmessage_is_undefined = $string(
      "Worker.onmessage is undefined"
    );
    $cst_Worker_import_scripts_is_undefined = $string(
      "Worker.import_scripts is undefined"
    );
    $Js_of_ocaml_Js =  Js_of_ocaml__Js::get ();
    $Pervasives =  Pervasives::get ();
    $Array =  Array_::get ();
    $a_ = function(dynamic $x) use ($call1,$caml_get_public_method) {
      return $call1($caml_get_public_method($x, -324422083, 203), $x);
    };
    $b_ = $Js_of_ocaml_Js[50][1];
    $worker = (function(dynamic $t0, dynamic $param) {return $t0->Worker;})($b_, $a_);
    $create = function(dynamic $script) use ($worker) {
      $w_ = 0;
      $x_ = $script->toString();
      return (function(dynamic $t2, dynamic $t1, dynamic $param) {return new $t2($t1);
       })($worker, $x_, $w_);
    };
    $import_scripts = function(dynamic $scripts) use ($Array,$Js_of_ocaml_Js,$Pervasives,$call1,$call2,$caml_get_public_method,$cst_Worker_import_scripts_is_undefined,$runtime) {
      $o_ = $Js_of_ocaml_Js[3];
      $p_ = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, 815769891, 204), $x);
      };
      $q_ = $Js_of_ocaml_Js[50][1];
      if (
        (function(dynamic $t4, dynamic $param) {return $t4->importScripts;})($q_, $p_) === $o_
      ) {$call1($Pervasives[1], $cst_Worker_import_scripts_is_undefined);}
      $r_ = $call1($Array[12], $scripts);
      $s_ = function(dynamic $s) {return $s->toString();};
      $t_ = $call2($Array[15], $s_, $r_);
      $u_ = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, 815769891, 205), $x);
      };
      $v_ = $Js_of_ocaml_Js[50][1];
      return $runtime["caml_js_fun_call"](
        (function(dynamic $t3, dynamic $param) {return $t3->importScripts;})($v_, $u_),
        $t_
      );
    };
    $set_onmessage = function(dynamic $handler) use ($Js_of_ocaml_Js,$Pervasives,$call1,$caml_get_public_method,$cst_Worker_onmessage_is_undefined,$runtime) {
      $h_ = $Js_of_ocaml_Js[3];
      $i_ = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, 610977416, 206), $x);
      };
      $j_ = $Js_of_ocaml_Js[50][1];
      if (
        (function(dynamic $t8, dynamic $param) {return $t8->onmessage;})($j_, $i_) === $h_
      ) {$call1($Pervasives[1], $cst_Worker_onmessage_is_undefined);}
      $js_handler = function(dynamic $ev) use ($call1,$caml_get_public_method,$handler) {
        $n_ = function(dynamic $x) use ($call1,$caml_get_public_method) {
          return $call1($caml_get_public_method($x, -1033677270, 207), $x);
        };
        return $call1(
          $handler,
          (function(dynamic $t7, dynamic $param) {return $t7->data;})($ev, $n_)
        );
      };
      $k_ = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, 610977416, 208), $x);
      };
      $l_ = $runtime["caml_js_wrap_callback"]($js_handler);
      $m_ = $Js_of_ocaml_Js[50][1];
      return (function(dynamic $t6, dynamic $t5, dynamic $param) {$t6->onmessage = $t5;return 0;
       })($m_, $l_, $k_);
    };
    $post_message = function(dynamic $msg) use ($Js_of_ocaml_Js,$Pervasives,$call1,$caml_get_public_method,$cst_Worker_onmessage_is_undefined__0) {
      $c_ = $Js_of_ocaml_Js[3];
      $d_ = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, -699849401, 209), $x);
      };
      $e_ = $Js_of_ocaml_Js[50][1];
      if (
        (function(dynamic $t11, dynamic $param) {return $t11->postMessage;})($e_, $d_) === $c_
      ) {$call1($Pervasives[1], $cst_Worker_onmessage_is_undefined__0);}
      $f_ = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, -699849401, 210), $x);
      };
      $g_ = $Js_of_ocaml_Js[50][1];
      return (function(dynamic $t10, dynamic $t9, dynamic $param) {return $t10->postMessage($t9);
       })($g_, $msg, $f_);
    };
    $Js_of_ocaml_Worker = Vector{
      0,
      $create,
      $import_scripts,
      $set_onmessage,
      $post_message
    };
    
     return ($Js_of_ocaml_Worker);

  }
  public static function post_message(dynamic $msg) {
    return static::get()[4]($msg);
  }
  public static function set_onmessage(dynamic $handler) {
    return static::get()[3]($handler);
  }
  public static function import_scripts(dynamic $scripts) {
    return static::get()[2]($scripts);
  }
  public static function create(dynamic $script) {
    return static::get()[1]($script);
  }

}
/* Hashing disabled */
