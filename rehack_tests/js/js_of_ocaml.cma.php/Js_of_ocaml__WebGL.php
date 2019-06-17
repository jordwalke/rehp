<?hh
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * Js_of_ocaml__WebGL.php
 */

namespace Rehack;

final class Js_of_ocaml__WebGL {
  <<__Memoize>>
  public static function get() {
    $global_object = \Rehack\GlobalObject::get();
    $runtime = \Rehack\Runtime::get();
    /*
     * Soon, these will replace the `global_data->ModuleName`
     * pattern in the load() function.
     */
    $Js_of_ocaml__Dom_html = Js_of_ocaml__Dom_html::get();
    $Js_of_ocaml__Js = Js_of_ocaml__Js::get();
    Js_of_ocaml__WebGL::load($global_object);
    $memoized = $runtime->caml_get_global_data()->Js_of_ocaml__WebGL;
    return $memoized;
  }

  /**
   * Performs module load operation. May have side effects.
   */
  private static function load($joo_global_object) {
    

    $runtime = $joo_global_object->jsoo_runtime;
    $call1 = $runtime["caml_call1"];
    $caml_get_public_method = $runtime["caml_get_public_method"];
    $string = $runtime["caml_new_string"];
    $global_data = $runtime["caml_get_global_data"]();
    $cst_webglcontextlost = $string("webglcontextlost");
    $cst_webglcontextrestored = $string("webglcontextrestored");
    $cst_webglcontextcreationerror = $string("webglcontextcreationerror");
    $Js_of_ocaml_Js = $global_data["Js_of_ocaml__Js"];
    $Js_of_ocaml_Dom_html = $global_data["Js_of_ocaml__Dom_html"];
    $defaultContextAttributes = darray[
     "alpha"=>$Js_of_ocaml_Js[7],
     "depth"=>$Js_of_ocaml_Js[7],
     "stencil"=>$Js_of_ocaml_Js[8],
     "antialias"=>$Js_of_ocaml_Js[7],
     "premultipliedAlpha"=>$Js_of_ocaml_Js[8],
     "preserveDrawingBuffer"=>$Js_of_ocaml_Js[8],
     "preferLowPowerToHighPerformance"=>$Js_of_ocaml_Js[8],
     "failIfMajorPerformanceCaveat"=>$Js_of_ocaml_Js[8]];
    $webglcontextlost = $call1(
      $Js_of_ocaml_Dom_html[15][73],
      $cst_webglcontextlost
    );
    $webglcontextrestored = $call1(
      $Js_of_ocaml_Dom_html[15][73],
      $cst_webglcontextrestored
    );
    $webglcontextcreationerror = $call1(
      $Js_of_ocaml_Dom_html[15][73],
      $cst_webglcontextcreationerror
    );
    $Event = Vector{
      0,
      $webglcontextlost,
      $webglcontextrestored,
      $webglcontextcreationerror
    };
    $getContext = function(dynamic $c) use ($Js_of_ocaml_Js,$call1,$caml_get_public_method) {
      $s9 = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, -388424711, 294), $x);
      };
      $s_ = "webgl";
      $ctx = (function(dynamic $t3, dynamic $t2, dynamic $param) {return $t3->getContext($t2);
       })($c, $s_, $s9);
      if ($call1($Js_of_ocaml_Js[5][5], $ctx)) {return $ctx;}
      $ta = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, -388424711, 295), $x);
      };
      $tb = "experimental-webgl";
      return (function(dynamic $t1, dynamic $t0, dynamic $param) {return $t1->getContext($t0);
       })($c, $tb, $ta);
    };
    $getContextWithAttributes = function(dynamic $c, dynamic $attribs) use ($Js_of_ocaml_Js,$call1,$caml_get_public_method) {
      $s5 = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, -719364538, 296), $x);
      };
      $s6 = "webgl";
      $ctx = (function(dynamic $t9, dynamic $t7, dynamic $t8, dynamic $param) {return $t9->getContext($t7, $t8);
       })($c, $s6, $attribs, $s5);
      if ($call1($Js_of_ocaml_Js[5][5], $ctx)) {return $ctx;}
      $s7 = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, -719364538, 297), $x);
      };
      $s8 = "experimental-webgl";
      return (function(dynamic $t6, dynamic $t4, dynamic $t5, dynamic $param) {return $t6->getContext($t4, $t5);
       })($c, $s8, $attribs, $s7);
    };
    $Js_of_ocaml_WebGL = Vector{
      0,
      $defaultContextAttributes,
      $Event,
      $getContext,
      $getContextWithAttributes
    };
    
    $runtime["caml_register_global"](
      21,
      $Js_of_ocaml_WebGL,
      "Js_of_ocaml__WebGL"
    );

  }
}