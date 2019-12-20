<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class Js_of_ocaml__Typed_array {
  <<__Override, __Memoize>>
  public static function get() : Vector<dynamic> {
    $joo_global_object = \Rehack\GlobalObject::get() as dynamic;
    
    $runtime = $joo_global_object->jsoo_runtime;
    $call1 = $runtime["caml_call1"];
    $call3 = $runtime["caml_call3"];
    $caml_get_public_method = $runtime["caml_get_public_method"];
    $Js_of_ocaml_Js =  Js_of_ocaml__Js::get ();
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
      $x_ = 0;
      $uint8 = ((dynamic $t11, dynamic $t10, dynamic $param) ==> {return new $t11($t10);
       })($uint8Array, $ab, $x_);
      return $runtime["caml_string_of_array"]($uint8);
    };
    $String = Vector{0, $of_arrayBuffer};
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
    };
    
     return ($Js_of_ocaml_Typed_array);

  }
  public static function arrayBuffer() {
    return static::get()[1]();
  }
  public static function int8Array() {
    return static::get()[2]();
  }
  public static function int8Array() {
    return static::get()[3]();
  }
  public static function int8Array() {
    return static::get()[4]();
  }
  public static function int8Array() {
    return static::get()[5]();
  }
  public static function int8Array() {
    return static::get()[6]();
  }
  public static function uint8Array() {
    return static::get()[7]();
  }
  public static function uint8Array() {
    return static::get()[8]();
  }
  public static function uint8Array() {
    return static::get()[9]();
  }
  public static function uint8Array() {
    return static::get()[10]();
  }
  public static function uint8Array() {
    return static::get()[11]();
  }
  public static function int16Array() {
    return static::get()[12]();
  }
  public static function int16Array() {
    return static::get()[13]();
  }
  public static function int16Array() {
    return static::get()[14]();
  }
  public static function int16Array() {
    return static::get()[15]();
  }
  public static function int16Array() {
    return static::get()[16]();
  }
  public static function uint16Array() {
    return static::get()[17]();
  }
  public static function uint16Array() {
    return static::get()[18]();
  }
  public static function uint16Array() {
    return static::get()[19]();
  }
  public static function uint16Array() {
    return static::get()[20]();
  }
  public static function uint16Array() {
    return static::get()[21]();
  }
  public static function int32Array() {
    return static::get()[22]();
  }
  public static function int32Array() {
    return static::get()[23]();
  }
  public static function int32Array() {
    return static::get()[24]();
  }
  public static function int32Array() {
    return static::get()[25]();
  }
  public static function int32Array() {
    return static::get()[26]();
  }
  public static function uint32Array() {
    return static::get()[27]();
  }
  public static function uint32Array() {
    return static::get()[28]();
  }
  public static function uint32Array() {
    return static::get()[29]();
  }
  public static function uint32Array() {
    return static::get()[30]();
  }
  public static function uint32Array() {
    return static::get()[31]();
  }
  public static function float32Array() {
    return static::get()[32]();
  }
  public static function float32Array() {
    return static::get()[33]();
  }
  public static function float32Array() {
    return static::get()[34]();
  }
  public static function float32Array() {
    return static::get()[35]();
  }
  public static function float32Array() {
    return static::get()[36]();
  }
  public static function float64Array() {
    return static::get()[37]();
  }
  public static function float64Array() {
    return static::get()[38]();
  }
  public static function float64Array() {
    return static::get()[39]();
  }
  public static function float64Array() {
    return static::get()[40]();
  }
  public static function float64Array() {
    return static::get()[41]();
  }
  public static function set(dynamic $a, dynamic $i, dynamic $v) {
    return static::get()[42]($a, $i, $v);
  }
  public static function get(dynamic $a, dynamic $i) {
    return static::get()[43]($a, $i);
  }
  public static function unsafe_get(dynamic $a, dynamic $i) {
    return static::get()[44]($a, $i);
  }
  public static function dataView() {
    return static::get()[45]();
  }
  public static function dataView() {
    return static::get()[46]();
  }
  public static function String() {
    return static::get()[48]();
  }

}
/* Hashing disabled */
