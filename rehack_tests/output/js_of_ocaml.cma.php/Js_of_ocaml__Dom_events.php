<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class Js_of_ocaml__Dom_events {
  <<__Override, __Memoize>>
  public static function requireModule() : Vector<dynamic> {
    
    $runtime =  (\Rehack\GlobalObject::get() as dynamic)->jsoo_runtime ;
    $call1 = $runtime["caml_call1"];
    $call2 = $runtime["caml_call2"];
    $call4 = $runtime["caml_call4"];
    $Js_of_ocaml_Dom_html =  Js_of_ocaml__Dom_html::requireModule ();
    $listen = (dynamic $opt, dynamic $target, dynamic $typ, dynamic $cb) ==> {
      if ($opt) {
        $sth = $opt[1];
        $capture = $sth;
      }
      else {$capture = 0 as dynamic;}
      $a_ = ! ! $capture;
      $b_ = (dynamic $n, dynamic $e) ==> {return ! ! $call2($cb, $n, $e);};
      $c_ = $call1($Js_of_ocaml_Dom_html[11], $b_);
      return $call4($Js_of_ocaml_Dom_html[16], $target, $typ, $c_, $a_);
    };
    $stop_listen = $Js_of_ocaml_Dom_html[17];
    $Js_of_ocaml_Dom_events = Vector{
      0,
      $Js_of_ocaml_Dom_html[15],
      $listen,
      $stop_listen
    } as dynamic;
    
     return ($Js_of_ocaml_Dom_events);

  }
  public static function listen(dynamic $opt, dynamic $target, dynamic $typ, dynamic $cb): dynamic {
    return static::callRehackFunction(static::requireModule()[2], varray[$opt, $target, $typ, $cb]);
  }

}
/* Hashing disabled */
