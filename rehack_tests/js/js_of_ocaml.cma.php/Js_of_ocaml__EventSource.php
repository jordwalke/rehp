<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class Js_of_ocaml__EventSource {
  <<__Override, __Memoize>>
  public static function get() : Vector<dynamic> {
    $joo_global_object = \Rehack\GlobalObject::get() as dynamic;
    
    $runtime = $joo_global_object->jsoo_runtime;
    $call1 = $runtime["caml_call1"];
    $caml_get_public_method = $runtime["caml_get_public_method"];
    $Js_of_ocaml_Js =  Js_of_ocaml__Js::get ();
    $Js_of_ocaml_Dom =  Js_of_ocaml__Dom::get ();
    $withCredentials = function(dynamic $b) use ($call1,$caml_get_public_method) {
      $init = darray[];
      $e_ = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, -893090218, 295), $x);
      };
      $f_ = ! ! $b;
      ((function(dynamic $t1, dynamic $t0, dynamic $param) {$t1->withCredentials = $t0;return 0;
        })($init, $f_, $e_));
      return $init;
    };
    $a_ = function(dynamic $x) use ($call1,$caml_get_public_method) {
      return $call1($caml_get_public_method($x, -809811338, 296), $x);
    };
    $b_ = $Js_of_ocaml_Js[50][1];
    $eventSource = (function(dynamic $t2, dynamic $param) {return $t2->EventSource;
     })($b_, $a_);
    $c_ = function(dynamic $x) use ($call1,$caml_get_public_method) {
      return $call1($caml_get_public_method($x, -809811338, 297), $x);
    };
    $d_ = $Js_of_ocaml_Js[50][1];
    $eventSource_options = (function(dynamic $t3, dynamic $param) {return $t3->EventSource;
     })($d_, $c_);
    $addEventListener = $Js_of_ocaml_Dom[15];
    $Js_of_ocaml_EventSource = Vector{
      0,
      $withCredentials,
      $eventSource,
      $eventSource_options,
      $addEventListener
    };
    
     return ($Js_of_ocaml_EventSource);

  }
  public static function addEventListener() {
    return static::get()[4]();
  }
  public static function eventSource_options() {
    return static::get()[3]();
  }
  public static function eventSource() {
    return static::get()[2]();
  }
  public static function withCredentials(dynamic $b) {
    return static::get()[1]($b);
  }

}
/* Hashing disabled */
