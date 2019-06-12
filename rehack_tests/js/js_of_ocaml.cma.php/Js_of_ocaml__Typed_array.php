<?hh
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * Js_of_ocaml__Typed_array.php
 */

namespace Rehack;

final class Js_of_ocaml__Typed_array {
  <<__Memoize>>
  public static function get() {
    $global_object = \Rehack\GlobalObject::get();
    $runtime = \Rehack\Runtime::get();
    /*
     * Soon, these will replace the `global_data->ModuleName`
     * pattern in the load() function.
     */
    $Js_of_ocaml__Js = Js_of_ocaml__Js::get();
    Js_of_ocaml__Typed_array::load($global_object);
    $memoized = $runtime->caml_get_global_data()->Js_of_ocaml__Typed_array;
    return $memoized;
  }

  /**
   * Performs module load operation. May have side effects.
   */
  private static function load($joo_global_object) {
    

    $runtime = $joo_global_object->jsoo_runtime;
    $call1 = $runtime["caml_call1"];
    $call3 = $runtime["caml_call3"];
    $caml_get_public_method = $runtime["caml_get_public_method"];
    $global_data = $runtime["caml_get_global_data"]();
    $Js_of_ocaml_Js = $global_data["Js_of_ocaml__Js"];
    $fZ = function(dynamic $x) use ($call1,$caml_get_public_method) {
      return $call1($caml_get_public_method($x, 135830874, 76), $x);
    };
    $f0 = $Js_of_ocaml_Js[50][1];
    $arrayBuffer = (function(dynamic $t0, dynamic $param) {return $t0->ArrayBuffer;
     })($f0, $fZ);
    $f1 = function(dynamic $x) use ($call1,$caml_get_public_method) {
      return $call1($caml_get_public_method($x, 177821713, 77), $x);
    };
    $f2 = $Js_of_ocaml_Js[50][1];
    $int8Array = (function(dynamic $t1, dynamic $param) {return $t1->Int8Array;
     })($f2, $f1);
    $f3 = function(dynamic $x) use ($call1,$caml_get_public_method) {
      return $call1($caml_get_public_method($x, 946312858, 78), $x);
    };
    $f4 = $Js_of_ocaml_Js[50][1];
    $uint8Array = (function(dynamic $t2, dynamic $param) {return $t2->Uint8Array;
     })($f4, $f3);
    $f5 = function(dynamic $x) use ($call1,$caml_get_public_method) {
      return $call1($caml_get_public_method($x, -67443548, 79), $x);
    };
    $f6 = $Js_of_ocaml_Js[50][1];
    $int16Array = (function(dynamic $t3, dynamic $param) {return $t3->Int16Array;
     })($f6, $f5);
    $f7 = function(dynamic $x) use ($call1,$caml_get_public_method) {
      return $call1($caml_get_public_method($x, -492610053, 80), $x);
    };
    $f8 = $Js_of_ocaml_Js[50][1];
    $uint16Array = (function(dynamic $t4, dynamic $param) {return $t4->Uint16Array;
     })($f8, $f7);
    $f9 = function(dynamic $x) use ($call1,$caml_get_public_method) {
      return $call1($caml_get_public_method($x, 901275818, 81), $x);
    };
    $f_ = $Js_of_ocaml_Js[50][1];
    $int32Array = (function(dynamic $t5, dynamic $param) {return $t5->Int32Array;
     })($f_, $f9);
    $ga = function(dynamic $x) use ($call1,$caml_get_public_method) {
      return $call1($caml_get_public_method($x, 476109313, 82), $x);
    };
    $gb = $Js_of_ocaml_Js[50][1];
    $uint32Array = (function(dynamic $t6, dynamic $param) {return $t6->Uint32Array;
     })($gb, $ga);
    $gc = function(dynamic $x) use ($call1,$caml_get_public_method) {
      return $call1($caml_get_public_method($x, -225061539, 83), $x);
    };
    $gd = $Js_of_ocaml_Js[50][1];
    $float32Array = (function(dynamic $t7, dynamic $param) {return $t7->Float32Array;
     })($gd, $gc);
    $ge = function(dynamic $x) use ($call1,$caml_get_public_method) {
      return $call1($caml_get_public_method($x, 1007481438, 84), $x);
    };
    $gf = $Js_of_ocaml_Js[50][1];
    $float64Array = (function(dynamic $t8, dynamic $param) {return $t8->Float64Array;
     })($gf, $ge);
    $set = function(dynamic $a, dynamic $i, dynamic $v) use ($Js_of_ocaml_Js,$call3) {
      return $call3($Js_of_ocaml_Js[17], $a, $i, $v);
    };
    $get = function(dynamic $a, dynamic $i) {return $a[$i];};
    $unsafe_get = function(dynamic $a, dynamic $i) {return $a[$i];};
    $gg = function(dynamic $x) use ($call1,$caml_get_public_method) {
      return $call1($caml_get_public_method($x, 789234990, 85), $x);
    };
    $gh = $Js_of_ocaml_Js[50][1];
    $dataView = (function(dynamic $t9, dynamic $param) {return $t9->DataView;})($gh, $gg);
    $of_arrayBuffer = function(dynamic $ab) use ($runtime,$uint8Array) {
      $gl = 0;
      $uint8 = (function(dynamic $t11, dynamic $t10, dynamic $param) {return new $t11($t10);
       })($uint8Array, $ab, $gl);
      return $runtime["caml_string_of_array"]($uint8);
    };
    $String = Vector{0, $of_arrayBuffer};
    $gi = function(dynamic $gk) use ($runtime) {
      return $runtime["bigstring_of_array_buffer"]($gk);
    };
    $Js_of_ocaml_Typed_array = Vector{
      0,
      $arrayBuffer,
      $int8Array,
      $int8Array,
      $int8Array,
      $int8Array,
      $int8Array,
      $uint8Array,
      $uint8Array,
      $uint8Array,
      $uint8Array,
      $uint8Array,
      $int16Array,
      $int16Array,
      $int16Array,
      $int16Array,
      $int16Array,
      $uint16Array,
      $uint16Array,
      $uint16Array,
      $uint16Array,
      $uint16Array,
      $int32Array,
      $int32Array,
      $int32Array,
      $int32Array,
      $int32Array,
      $uint32Array,
      $uint32Array,
      $uint32Array,
      $uint32Array,
      $uint32Array,
      $float32Array,
      $float32Array,
      $float32Array,
      $float32Array,
      $float32Array,
      $float64Array,
      $float64Array,
      $float64Array,
      $float64Array,
      $float64Array,
      $set,
      $get,
      $unsafe_get,
      $dataView,
      $dataView,
      Vector{
        0,
        function(dynamic $gj) use ($runtime) {
          return $runtime["bigstring_to_array_buffer"]($gj);
        },
        $gi
      },
      $String
    };
    
    $runtime["caml_register_global"](
      11,
      $Js_of_ocaml_Typed_array,
      "Js_of_ocaml__Typed_array"
    );

  }
}