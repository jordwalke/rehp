<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class Js_of_ocaml__XmlHttpRequest {
  <<__Override, __Memoize>>
  public static function get() : Vector<dynamic> {
    $joo_global_object = \Rehack\GlobalObject::get() as dynamic;
    
    $runtime = $joo_global_object->jsoo_runtime;
    $call1 = $runtime["caml_call1"];
    $caml_get_public_method = $runtime["caml_get_public_method"];
    $string = $runtime["caml_new_string"];
    $caml_wrap_thrown_exception = $runtime["caml_wrap_thrown_exception"];
    $cst_readystatechange = $string("readystatechange");
    $cst_loadstart = $string("loadstart");
    $cst_progress = $string("progress");
    $cst_abort = $string("abort");
    $cst_error = $string("error");
    $cst_load = $string("load");
    $cst_timeout = $string("timeout");
    $cst_loadend = $string("loadend");
    $Js_of_ocaml_Js =  Js_of_ocaml__Js::get ();
    $Assert_failure =  Assert_failure::get ();
    $Js_of_ocaml_Dom =  Js_of_ocaml__Dom::get ();
    $a_ = Vector{0, $string("lib/js_of_ocaml/xmlHttpRequest.ml"), 125, 75};
    $readystatechange = $call1($Js_of_ocaml_Dom[14][1], $cst_readystatechange);
    $loadstart = $call1($Js_of_ocaml_Dom[14][1], $cst_loadstart);
    $progress = $call1($Js_of_ocaml_Dom[14][1], $cst_progress);
    $abort = $call1($Js_of_ocaml_Dom[14][1], $cst_abort);
    $error = $call1($Js_of_ocaml_Dom[14][1], $cst_error);
    $load = $call1($Js_of_ocaml_Dom[14][1], $cst_load);
    $timeout = $call1($Js_of_ocaml_Dom[14][1], $cst_timeout);
    $loadend = $call1($Js_of_ocaml_Dom[14][1], $cst_loadend);
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
    $create = (dynamic $param) ==> {
      $b_ = (dynamic $x) ==> {
        return $call1($caml_get_public_method($x, -1035517745, 201), $x);
      };
      $c_ = $Js_of_ocaml_Js[50][1];
      $xmlHttpRequest = ((dynamic $t8, dynamic $param) ==> {
         return $t8->XMLHttpRequest;
       })($c_, $b_);
      $d_ = (dynamic $x) ==> {
        return $call1($caml_get_public_method($x, -5445583, 202), $x);
      };
      $e_ = $Js_of_ocaml_Js[50][1];
      $activeXObject = ((dynamic $t7, dynamic $param) ==> {
         return $t7->activeXObject;
       })($e_, $d_);
      try {
        $o_ = 0;
        $p_ = ((dynamic $t6, dynamic $param) ==> {return new $t6();})($xmlHttpRequest, $o_);
        return $p_;
      }
      catch(\Throwable $q_) {
        try {
          $l_ = 0;
          $m_ = "Msxml2.XMLHTTP";
          $n_ = ((dynamic $t5, dynamic $t4, dynamic $param) ==> {return new $t5($t4);
           })($activeXObject, $m_, $l_);
          return $n_;
        }
        catch(\Throwable $r_) {
          try {
            $i_ = 0;
            $j_ = "Msxml3.XMLHTTP";
            $k_ = ((dynamic $t3, dynamic $t2, dynamic $param) ==> {return new $t3($t2);
             })($activeXObject, $j_, $i_);
            return $k_;
          }
          catch(\Throwable $s_) {
            try {
              $f_ = 0;
              $g_ = "Microsoft.XMLHTTP";
              $h_ = ((dynamic $t1, dynamic $t0, dynamic $param) ==> {return new $t1($t0);
               })($activeXObject, $g_, $f_);
              return $h_;
            }
            catch(\Throwable $t_) {
              throw $caml_wrap_thrown_exception(
                      Vector{0, $Assert_failure, $a_}
                    ) as \Throwable;
            }
          }
        }
      }
    };
    $Js_of_ocaml_XmlHttpRequest = Vector{0, $create, $Event};
    
     return ($Js_of_ocaml_XmlHttpRequest);

  }
  public static function create(dynamic $param): dynamic {
    return static::callRehackFunction(static::get()[1], varray[$param]);
  }
  public static function Event(): dynamic {
    return static::callRehackFunction(static::get()[2], varray[]);
  }

}
/* Hashing disabled */
