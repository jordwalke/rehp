<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class Js_of_ocaml__Dom_events {
  <<__Override, __Memoize>>
  public static function get() : Vector<dynamic> {
    $joo_global_object = \Rehack\GlobalObject::get() as dynamic;
    
    $runtime = $joo_global_object->jsoo_runtime;
    $call1 = $runtime["caml_call1"];
    $call2 = $runtime["caml_call2"];
    $call4 = $runtime["caml_call4"];
    $Js_of_ocaml_Dom_html =  Js_of_ocaml__Dom_html::get ();
    $listen = function
    (dynamic $opt, dynamic $target, dynamic $typ, dynamic $cb) use ($Js_of_ocaml_Dom_html,$call1,$call2,$call4) {
      if ($opt) {
        $sth = $opt[1];
        $capture = $sth;
      }
      else {$capture = 0;}
      $a_ = ! ! $capture;
      $b_ = function(dynamic $n, dynamic $e) use ($call2,$cb) {
        return ! ! $call2($cb, $n, $e);
      };
      $c_ = $call1($Js_of_ocaml_Dom_html[11], $b_);
      return $call4($Js_of_ocaml_Dom_html[16], $target, $typ, $c_, $a_);
    };
    $stop_listen = $Js_of_ocaml_Dom_html[17];
    $Js_of_ocaml_Dom_events = Vector{
      0,
      $Js_of_ocaml_Dom_html[15],
      $listen,
      $stop_listen
    };
    
     return ($Js_of_ocaml_Dom_events);

  }
  public static function stop_listen() {
    return static::get()[3]();
  }
  public static function listen(dynamic $opt, dynamic $target, dynamic $typ, dynamic $cb) {
    return static::get()[2]($opt, $target, $typ, $cb);
  }

}
/* Hashing disabled */
