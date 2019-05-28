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
    $caml_arity_test = $runtime["caml_arity_test"];
    $caml_get_public_method = $runtime["caml_get_public_method"];
    $caml_new_string = $runtime["caml_new_string"];
    $caml_call1 = function($f, $a0) use ($caml_arity_test,$runtime) {
      return $caml_arity_test($f) === 1
        ? $f($a0)
        : ($runtime["caml_call_gen"]($f, varray[$a0]));
    };
    $global_data = $runtime["caml_get_global_data"]();
    $cst_webglcontextlost = $caml_new_string("webglcontextlost");
    $cst_webglcontextrestored = $caml_new_string("webglcontextrestored");
    $cst_webglcontextcreationerror = $caml_new_string(
      "webglcontextcreationerror"
    );
    $Js_of_ocaml_Js = $global_data["Js_of_ocaml__Js"];
    $Js_of_ocaml_Dom_html = $global_data["Js_of_ocaml__Dom_html"];
    $defaultContextAttributes = (object)darray[
     "alpha"=>$Js_of_ocaml_Js[7],
     "depth"=>$Js_of_ocaml_Js[7],
     "stencil"=>$Js_of_ocaml_Js[8],
     "antialias"=>$Js_of_ocaml_Js[7],
     "premultipliedAlpha"=>$Js_of_ocaml_Js[8],
     "preserveDrawingBuffer"=>$Js_of_ocaml_Js[8],
     "preferLowPowerToHighPerformance"=>$Js_of_ocaml_Js[8],
     "failIfMajorPerformanceCaveat"=>$Js_of_ocaml_Js[8]];
    $webglcontextlost = $caml_call1(
      $Js_of_ocaml_Dom_html[15][73],
      $cst_webglcontextlost
    );
    $webglcontextrestored = $caml_call1(
      $Js_of_ocaml_Dom_html[15][73],
      $cst_webglcontextrestored
    );
    $webglcontextcreationerror = $caml_call1(
      $Js_of_ocaml_Dom_html[15][73],
      $cst_webglcontextcreationerror
    );
    $Event = Vector{
      0,
      $webglcontextlost,
      $webglcontextrestored,
      $webglcontextcreationerror
    };
    $getContext = function($c) use ($Js_of_ocaml_Js,$caml_call1,$caml_get_public_method) {
      $s7 = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, -388424711, 294), $x);
      };
      $s8 = "webgl";
      $ctx = (function($t3, $t2, $param) {return $t3->getContext($t2);})($c, $s8, $s7);
      if ($caml_call1($Js_of_ocaml_Js[5][5], $ctx)) {return $ctx;}
      $s9 = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, -388424711, 295), $x);
      };
      $s_ = "experimental-webgl";
      return (function($t1, $t0, $param) {return $t1->getContext($t0);})($c, $s_, $s9);
    };
    $getContextWithAttributes = function($c, $attribs) use ($Js_of_ocaml_Js,$caml_call1,$caml_get_public_method) {
      $s3 = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, -719364538, 296), $x);
      };
      $s4 = "webgl";
      $ctx = (function($t9, $t7, $t8, $param) {
         return $t9->getContext($t7, $t8);
       })($c, $s4, $attribs, $s3);
      if ($caml_call1($Js_of_ocaml_Js[5][5], $ctx)) {return $ctx;}
      $s5 = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, -719364538, 297), $x);
      };
      $s6 = "experimental-webgl";
      return (function($t6, $t4, $t5, $param) {
         return $t6->getContext($t4, $t5);
       })($c, $s6, $attribs, $s5);
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