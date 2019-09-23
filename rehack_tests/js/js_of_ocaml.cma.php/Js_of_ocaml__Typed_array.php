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
    $a = function(dynamic $x) use ($call1,$caml_get_public_method) {
      return $call1($caml_get_public_method($x, 135830874, 52), $x);
    };
    $b = $Js_of_ocaml_Js[50][1];
    $arrayBuffer = (function(dynamic $t0, dynamic $param) {return $t0->ArrayBuffer;
     })($b, $a);
    $c = function(dynamic $x) use ($call1,$caml_get_public_method) {
      return $call1($caml_get_public_method($x, 177821713, 53), $x);
    };
    $d = $Js_of_ocaml_Js[50][1];
    $int8Array = (function(dynamic $t1, dynamic $param) {return $t1->Int8Array;
     })($d, $c);
    $e = function(dynamic $x) use ($call1,$caml_get_public_method) {
      return $call1($caml_get_public_method($x, 946312858, 54), $x);
    };
    $f = $Js_of_ocaml_Js[50][1];
    $uint8Array = (function(dynamic $t2, dynamic $param) {return $t2->Uint8Array;
     })($f, $e);
    $g = function(dynamic $x) use ($call1,$caml_get_public_method) {
      return $call1($caml_get_public_method($x, -67443548, 55), $x);
    };
    $h = $Js_of_ocaml_Js[50][1];
    $int16Array = (function(dynamic $t3, dynamic $param) {return $t3->Int16Array;
     })($h, $g);
    $i = function(dynamic $x) use ($call1,$caml_get_public_method) {
      return $call1($caml_get_public_method($x, -492610053, 56), $x);
    };
    $j = $Js_of_ocaml_Js[50][1];
    $uint16Array = (function(dynamic $t4, dynamic $param) {return $t4->Uint16Array;
     })($j, $i);
    $k = function(dynamic $x) use ($call1,$caml_get_public_method) {
      return $call1($caml_get_public_method($x, 901275818, 57), $x);
    };
    $l = $Js_of_ocaml_Js[50][1];
    $int32Array = (function(dynamic $t5, dynamic $param) {return $t5->Int32Array;
     })($l, $k);
    $m = function(dynamic $x) use ($call1,$caml_get_public_method) {
      return $call1($caml_get_public_method($x, 476109313, 58), $x);
    };
    $n = $Js_of_ocaml_Js[50][1];
    $uint32Array = (function(dynamic $t6, dynamic $param) {return $t6->Uint32Array;
     })($n, $m);
    $o = function(dynamic $x) use ($call1,$caml_get_public_method) {
      return $call1($caml_get_public_method($x, -225061539, 59), $x);
    };
    $p = $Js_of_ocaml_Js[50][1];
    $float32Array = (function(dynamic $t7, dynamic $param) {return $t7->Float32Array;
     })($p, $o);
    $q = function(dynamic $x) use ($call1,$caml_get_public_method) {
      return $call1($caml_get_public_method($x, 1007481438, 60), $x);
    };
    $r = $Js_of_ocaml_Js[50][1];
    $float64Array = (function(dynamic $t8, dynamic $param) {return $t8->Float64Array;
     })($r, $q);
    $set = function(dynamic $a, dynamic $i, dynamic $v) use ($Js_of_ocaml_Js,$call3) {
      return $call3($Js_of_ocaml_Js[17], $a, $i, $v);
    };
    $get = function(dynamic $a, dynamic $i) {return $a[$i];};
    $unsafe_get = function(dynamic $a, dynamic $i) {return $a[$i];};
    $s = function(dynamic $x) use ($call1,$caml_get_public_method) {
      return $call1($caml_get_public_method($x, 789234990, 61), $x);
    };
    $t = $Js_of_ocaml_Js[50][1];
    $dataView = (function(dynamic $t9, dynamic $param) {return $t9->DataView;})($t, $s);
    $of_arrayBuffer = function(dynamic $ab) use ($runtime,$uint8Array) {
      $x = 0;
      $uint8 = (function(dynamic $t11, dynamic $t10, dynamic $param) {return new $t11($t10);
       })($uint8Array, $ab, $x);
      return $runtime["caml_string_of_array"]($uint8);
    };
    $String = Vector{0, $of_arrayBuffer};
    $u = function(dynamic $w) use ($runtime) {
      return $runtime["bigstring_of_array_buffer"]($w);
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
        function(dynamic $v) use ($runtime) {
          return $runtime["bigstring_to_array_buffer"]($v);
        },
        $u
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

/*____hashes compiler:hashing-disabled inputs:hashing-disabled bytecode:hashing-disabled*/
