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
    
    $runtime = (\Rehack\GlobalObject::get() as dynamic)->jsoo_runtime;
    $call1 = $runtime["caml_call1"];
    $caml_get_public_method = $runtime["caml_get_public_method"];
    $Js_of_ocaml_Js = Js_of_ocaml__Js::get();
    $Js_of_ocaml_Dom = Js_of_ocaml__Dom::get();
    $withCredentials = (dynamic $b) : dynamic ==> {
      $init = darray[];
      $e_ = (dynamic $x) : dynamic ==> {
        return $call1($caml_get_public_method($x, -893090218, 302), $x);
      };
      $f_ = ! ! $b;
      (((dynamic $t1, dynamic $t0, dynamic $param) : dynamic ==> {
          $t1->withCredentials = $t0;
          return 0;
        })($init, $f_, $e_));
      return $init;
    };
    $a_ = (dynamic $x) : dynamic ==> {
      return $call1($caml_get_public_method($x, -809811338, 303), $x);
    };
    $b_ = $Js_of_ocaml_Js[50][1];
    $eventSource = ((dynamic $t2, dynamic $param) : dynamic ==> {
       return $t2->EventSource;
     })($b_, $a_);
    $c_ = (dynamic $x) : dynamic ==> {
      return $call1($caml_get_public_method($x, -809811338, 304), $x);
    };
    $d_ = $Js_of_ocaml_Js[50][1];
    $eventSource_options = ((dynamic $t3, dynamic $param) : dynamic ==> {
       return $t3->EventSource;
     })($d_, $c_);
    $addEventListener = $Js_of_ocaml_Dom[16];
    $Js_of_ocaml_EventSource = Vector{
      0,
      $withCredentials,
      $eventSource,
      $eventSource_options,
      $addEventListener
    } as dynamic;
    
    return($Js_of_ocaml_EventSource);

  }
  public static function withCredentials(dynamic $b): dynamic {
    return static::syncCall(__FUNCTION__, 1, $b);
  }

}
/* Hashing disabled */
