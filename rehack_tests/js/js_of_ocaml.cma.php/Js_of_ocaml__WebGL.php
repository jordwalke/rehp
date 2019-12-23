<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class Js_of_ocaml__WebGL {
  <<__Override, __Memoize>>
  public static function requireModule() : Vector<dynamic> {
    $joo_global_object = \Rehack\GlobalObject::get() as dynamic;
    
    $runtime = $joo_global_object->jsoo_runtime;
    $call1 = $runtime["caml_call1"];
    $caml_get_public_method = $runtime["caml_get_public_method"];
    $string = $runtime["caml_new_string"];
    $cst_webglcontextlost = $string("webglcontextlost");
    $cst_webglcontextrestored = $string("webglcontextrestored");
    $cst_webglcontextcreationerror = $string("webglcontextcreationerror");
    $Js_of_ocaml_Js =  Js_of_ocaml__Js::get ();
    $Js_of_ocaml_Dom_html =  Js_of_ocaml__Dom_html::get ();
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
    $getContext = (dynamic $c) ==> {
      $e_ = (dynamic $x) ==> {
        return $call1($caml_get_public_method($x, -388424711, 212), $x);
      };
      $f_ = "webgl";
      $ctx = ((dynamic $t3, dynamic $t2, dynamic $param) ==> {return $t3->getContext($t2);
       })($c, $f_, $e_);
      if ($call1($Js_of_ocaml_Js[5][5], $ctx)) {return $ctx;}
      $g_ = (dynamic $x) ==> {
        return $call1($caml_get_public_method($x, -388424711, 213), $x);
      };
      $h_ = "experimental-webgl";
      return ((dynamic $t1, dynamic $t0, dynamic $param) ==> {return $t1->getContext($t0);
       })($c, $h_, $g_);
    };
    $getContextWithAttributes = (dynamic $c, dynamic $attribs) ==> {
      $a_ = (dynamic $x) ==> {
        return $call1($caml_get_public_method($x, -719364538, 214), $x);
      };
      $b_ = "webgl";
      $ctx = ((dynamic $t9, dynamic $t7, dynamic $t8, dynamic $param) ==> {return $t9->getContext($t7, $t8);
       })($c, $b_, $attribs, $a_);
      if ($call1($Js_of_ocaml_Js[5][5], $ctx)) {return $ctx;}
      $c_ = (dynamic $x) ==> {
        return $call1($caml_get_public_method($x, -719364538, 215), $x);
      };
      $d_ = "experimental-webgl";
      return ((dynamic $t6, dynamic $t4, dynamic $t5, dynamic $param) ==> {return $t6->getContext($t4, $t5);
       })($c, $d_, $attribs, $c_);
    };
    $Js_of_ocaml_WebGL = Vector{
      0,
      $defaultContextAttributes,
      $Event,
      $getContext,
      $getContextWithAttributes
    };
    
     return ($Js_of_ocaml_WebGL);

  }
  public static function defaultContextAttributes(): dynamic {
    return static::callRehackFunction(static::requireModule()[1], varray[]);
  }
  public static function Event(): dynamic {
    return static::callRehackFunction(static::requireModule()[2], varray[]);
  }
  public static function getContext(dynamic $c): dynamic {
    return static::callRehackFunction(static::requireModule()[3], varray[$c]);
  }
  public static function getContextWithAttributes(dynamic $c, dynamic $attribs): dynamic {
    return static::callRehackFunction(static::requireModule()[4], varray[$c, $attribs]);
  }

}
/* Hashing disabled */
