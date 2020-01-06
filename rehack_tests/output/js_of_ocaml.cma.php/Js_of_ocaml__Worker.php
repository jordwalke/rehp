<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class Js_of_ocaml__Worker {
  <<__Override, __Memoize>>
  public static function get() : Vector<dynamic> {
    
    $runtime = (\Rehack\GlobalObject::get() as dynamic)->jsoo_runtime;
    $call1 = $runtime["caml_call1"];
    $call2 = $runtime["caml_call2"];
    $caml_get_public_method = $runtime["caml_get_public_method"];
    $string = $runtime["caml_new_string"];
    $cst_Worker_onmessage_is_undefined__0 = $string(
      "Worker.onmessage is undefined"
    );
    $cst_Worker_onmessage_is_undefined = $string(
      "Worker.onmessage is undefined"
    );
    $cst_Worker_import_scripts_is_undefined = $string(
      "Worker.import_scripts is undefined"
    );
    $Js_of_ocaml_Js = Js_of_ocaml__Js::get();
    $Pervasives = Pervasives::get();
    $Array = Array_::get();
    $a_ = (dynamic $x) ==> {
      return $call1($caml_get_public_method($x, -324422083, 203), $x);
    };
    $b_ = $Js_of_ocaml_Js[50][1];
    $worker = ((dynamic $t0, dynamic $param) ==> {return $t0->Worker;})($b_, $a_);
    $create = (dynamic $script) ==> {
      $w_ = 0 as dynamic;
      $x_ = $script->toString();
      return ((dynamic $t2, dynamic $t1, dynamic $param) ==> {return new $t2($t1);
       })($worker, $x_, $w_);
    };
    $import_scripts = (dynamic $scripts) ==> {
      $o_ = $Js_of_ocaml_Js[3];
      $p_ = (dynamic $x) ==> {
        return $call1($caml_get_public_method($x, 815769891, 204), $x);
      };
      $q_ = $Js_of_ocaml_Js[50][1];
      if (
        ((dynamic $t4, dynamic $param) ==> {return $t4->importScripts;})($q_, $p_) === $o_
      ) {$call1($Pervasives[1], $cst_Worker_import_scripts_is_undefined);}
      $r_ = $call1($Array[12], $scripts);
      $s_ = (dynamic $s) ==> {return $s->toString();};
      $t_ = $call2($Array[15], $s_, $r_);
      $u_ = (dynamic $x) ==> {
        return $call1($caml_get_public_method($x, 815769891, 205), $x);
      };
      $v_ = $Js_of_ocaml_Js[50][1];
      return $runtime["caml_js_fun_call"](
        ((dynamic $t3, dynamic $param) ==> {return $t3->importScripts;})($v_, $u_),
        $t_
      );
    };
    $set_onmessage = (dynamic $handler) ==> {
      $h_ = $Js_of_ocaml_Js[3];
      $i_ = (dynamic $x) ==> {
        return $call1($caml_get_public_method($x, 610977416, 206), $x);
      };
      $j_ = $Js_of_ocaml_Js[50][1];
      if (
        ((dynamic $t8, dynamic $param) ==> {return $t8->onmessage;})($j_, $i_) === $h_
      ) {$call1($Pervasives[1], $cst_Worker_onmessage_is_undefined);}
      $js_handler = (dynamic $ev) ==> {
        $n_ = (dynamic $x) ==> {
          return $call1($caml_get_public_method($x, -1033677270, 207), $x);
        };
        return $call1(
          $handler,
          ((dynamic $t7, dynamic $param) ==> {return $t7->data;})($ev, $n_)
        );
      };
      $k_ = (dynamic $x) ==> {
        return $call1($caml_get_public_method($x, 610977416, 208), $x);
      };
      $l_ = $runtime["caml_js_wrap_callback"]($js_handler);
      $m_ = $Js_of_ocaml_Js[50][1];
      return ((dynamic $t6, dynamic $t5, dynamic $param) ==> {$t6->onmessage = $t5;return 0;
       })($m_, $l_, $k_);
    };
    $post_message = (dynamic $msg) ==> {
      $c_ = $Js_of_ocaml_Js[3];
      $d_ = (dynamic $x) ==> {
        return $call1($caml_get_public_method($x, -699849401, 209), $x);
      };
      $e_ = $Js_of_ocaml_Js[50][1];
      if (
        ((dynamic $t11, dynamic $param) ==> {return $t11->postMessage;})($e_, $d_) === $c_
      ) {$call1($Pervasives[1], $cst_Worker_onmessage_is_undefined__0);}
      $f_ = (dynamic $x) ==> {
        return $call1($caml_get_public_method($x, -699849401, 210), $x);
      };
      $g_ = $Js_of_ocaml_Js[50][1];
      return ((dynamic $t10, dynamic $t9, dynamic $param) ==> {return $t10->postMessage($t9);
       })($g_, $msg, $f_);
    };
    $Js_of_ocaml_Worker = Vector{
      0,
      $create,
      $import_scripts,
      $set_onmessage,
      $post_message
    } as dynamic;
    
    return($Js_of_ocaml_Worker);

  }
  public static function create(dynamic $script): dynamic {
    return static::syncCall(__FUNCTION__, 1, $script);
  }
  public static function import_scripts(dynamic $scripts): dynamic {
    return static::syncCall(__FUNCTION__, 2, $scripts);
  }
  public static function set_onmessage(dynamic $handler): dynamic {
    return static::syncCall(__FUNCTION__, 3, $handler);
  }
  public static function post_message(dynamic $msg): dynamic {
    return static::syncCall(__FUNCTION__, 4, $msg);
  }

}
/* Hashing disabled */
