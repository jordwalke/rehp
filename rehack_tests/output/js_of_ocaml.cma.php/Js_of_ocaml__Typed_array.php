<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class Js_of_ocaml__Typed_array {
  <<__Override, __Memoize>>
  public static function requireModule() : Vector<dynamic> {
    $joo_global_object = \Rehack\GlobalObject::get() as dynamic;
    
    $runtime = $joo_global_object->jsoo_runtime;
    $call1 = $runtime["caml_call1"];
    $call3 = $runtime["caml_call3"];
    $caml_get_public_method = $runtime["caml_get_public_method"];
    $Js_of_ocaml_Js =  Js_of_ocaml__Js::requireModule ();
    $a_ = (dynamic $x) ==> {
      return $call1($caml_get_public_method($x, 135830874, 52), $x);
    };
    $b_ = $Js_of_ocaml_Js[50][1];
    $arrayBuffer = ((dynamic $t0, dynamic $param) ==> {
       return $t0->ArrayBuffer;
     })($b_, $a_);
    $c_ = (dynamic $x) ==> {
      return $call1($caml_get_public_method($x, 177821713, 53), $x);
    };
    $d_ = $Js_of_ocaml_Js[50][1];
    $int8Array = ((dynamic $t1, dynamic $param) ==> {return $t1->Int8Array;})($d_, $c_);
    $e_ = (dynamic $x) ==> {
      return $call1($caml_get_public_method($x, 946312858, 54), $x);
    };
    $f_ = $Js_of_ocaml_Js[50][1];
    $uint8Array = ((dynamic $t2, dynamic $param) ==> {return $t2->Uint8Array;})($f_, $e_);
    $g_ = (dynamic $x) ==> {
      return $call1($caml_get_public_method($x, -67443548, 55), $x);
    };
    $h_ = $Js_of_ocaml_Js[50][1];
    $int16Array = ((dynamic $t3, dynamic $param) ==> {return $t3->Int16Array;})($h_, $g_);
    $i_ = (dynamic $x) ==> {
      return $call1($caml_get_public_method($x, -492610053, 56), $x);
    };
    $j_ = $Js_of_ocaml_Js[50][1];
    $uint16Array = ((dynamic $t4, dynamic $param) ==> {
       return $t4->Uint16Array;
     })($j_, $i_);
    $k_ = (dynamic $x) ==> {
      return $call1($caml_get_public_method($x, 901275818, 57), $x);
    };
    $l_ = $Js_of_ocaml_Js[50][1];
    $int32Array = ((dynamic $t5, dynamic $param) ==> {return $t5->Int32Array;})($l_, $k_);
    $m_ = (dynamic $x) ==> {
      return $call1($caml_get_public_method($x, 476109313, 58), $x);
    };
    $n_ = $Js_of_ocaml_Js[50][1];
    $uint32Array = ((dynamic $t6, dynamic $param) ==> {
       return $t6->Uint32Array;
     })($n_, $m_);
    $o_ = (dynamic $x) ==> {
      return $call1($caml_get_public_method($x, -225061539, 59), $x);
    };
    $p_ = $Js_of_ocaml_Js[50][1];
    $float32Array = ((dynamic $t7, dynamic $param) ==> {
       return $t7->Float32Array;
     })($p_, $o_);
    $q_ = (dynamic $x) ==> {
      return $call1($caml_get_public_method($x, 1007481438, 60), $x);
    };
    $r_ = $Js_of_ocaml_Js[50][1];
    $float64Array = ((dynamic $t8, dynamic $param) ==> {
       return $t8->Float64Array;
     })($r_, $q_);
    $set = (dynamic $a, dynamic $i, dynamic $v) ==> {
      return $call3($Js_of_ocaml_Js[17], $a, $i, $v);
    };
    $get = (dynamic $a, dynamic $i) ==> {return $a[$i];};
    $unsafe_get = (dynamic $a, dynamic $i) ==> {return $a[$i];};
    $s_ = (dynamic $x) ==> {
      return $call1($caml_get_public_method($x, 789234990, 61), $x);
    };
    $t_ = $Js_of_ocaml_Js[50][1];
    $dataView = ((dynamic $t9, dynamic $param) ==> {return $t9->DataView;})($t_, $s_);
    $of_arrayBuffer = (dynamic $ab) ==> {
      $x_ = 0 as dynamic;
      $uint8 = ((dynamic $t11, dynamic $t10, dynamic $param) ==> {return new $t11($t10);
       })($uint8Array, $ab, $x_);
      return $runtime["caml_string_of_array"]($uint8);
    };
    $String = Vector{0, $of_arrayBuffer} as dynamic;
    $u_ = (dynamic $w_) ==> {
      return $runtime["bigstring_of_array_buffer"]($w_);
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
        (dynamic $v_) ==> {return $runtime["bigstring_to_array_buffer"]($v_);},
        $u_
      },
      $String
    } as dynamic;
    
     return ($Js_of_ocaml_Typed_array);

  }
  public static function set(dynamic $a, dynamic $i, dynamic $v): dynamic {
    return static::callRehackFunction(static::requireModule()[42], varray[$a, $i, $v]);
  }
  public static function get(dynamic $a, dynamic $i): dynamic {
    return static::callRehackFunction(static::requireModule()[43], varray[$a, $i]);
  }
  public static function unsafe_get(dynamic $a, dynamic $i): dynamic {
    return static::callRehackFunction(static::requireModule()[44], varray[$a, $i]);
  }

}
/* Hashing disabled */
