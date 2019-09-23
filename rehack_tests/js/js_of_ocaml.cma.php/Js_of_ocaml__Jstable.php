<?hh
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * Js_of_ocaml__Jstable.php
 */

namespace Rehack;

final class Js_of_ocaml__Jstable {
  <<__Memoize>>
  public static function get() {
    $global_object = \Rehack\GlobalObject::get();
    $runtime = \Rehack\Runtime::get();
    /*
     * Soon, these will replace the `global_data->ModuleName`
     * pattern in the load() function.
     */
    $Js_of_ocaml__Js = Js_of_ocaml__Js::get();
    $List_ = List_::get();
    $Pervasives = Pervasives::get();
    Js_of_ocaml__Jstable::load($global_object);
    $memoized = $runtime->caml_get_global_data()->Js_of_ocaml__Jstable;
    return $memoized;
  }

  /**
   * Performs module load operation. May have side effects.
   */
  private static function load($joo_global_object) {
    

    $runtime = $joo_global_object->jsoo_runtime;
    $call1 = $runtime["caml_call1"];
    $call2 = $runtime["caml_call2"];
    $caml_get_public_method = $runtime["caml_get_public_method"];
    $string = $runtime["caml_new_string"];
    $global_data = $runtime["caml_get_global_data"]();
    $cst_Jstable_keys = $string("Jstable.keys");
    $Pervasives = $global_data["Pervasives"];
    $Js_of_ocaml_Js = $global_data["Js_of_ocaml__Js"];
    $List = $global_data["List_"];
    $a = function(dynamic $x) use ($call1,$caml_get_public_method) {
      return $call1($caml_get_public_method($x, 944440446, 270), $x);
    };
    $b = $Js_of_ocaml_Js[50][1];
    $obj = (function(dynamic $t0, dynamic $param) {return $t0->Object;})($b, $a);
    $create = function(dynamic $param) use ($obj) {
      $z = 0;
      return (function(dynamic $t1, dynamic $param) {return new $t1();})($obj, $z);
    };
    $add = function(dynamic $t, dynamic $k, dynamic $v) use ($call1,$caml_get_public_method) {
      $w = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, -942667500, 271), $x);
      };
      $x = "_";
      $y = 0;
      $t[
         (function(dynamic $t3, dynamic $t2, dynamic $param) {return $t3->concat($t2);
          })($k, $x, $w)
       ] = $v;
      return $y;
    };
    $remove = function(dynamic $t, dynamic $k) use ($call1,$caml_get_public_method) {
      $t = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, -942667500, 272), $x);
      };
      $u = "_";
      $v = 0;
      unset(
        $t[
           (function(dynamic $t5, dynamic $t4, dynamic $param) {return $t5->concat($t4);
            })($k, $u, $t)
         ]
      );
      return $v;
    };
    $find = function(dynamic $t, dynamic $k) use ($call1,$caml_get_public_method) {
      $r = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, -942667500, 273), $x);
      };
      $s = "_";
      return $t[
         (function(dynamic $t7, dynamic $t6, dynamic $param) {return $t7->concat($t6);
          })($k, $s, $r)
       ];
    };
    $keys = function(dynamic $t) use ($Js_of_ocaml_Js,$List,$Pervasives,$call1,$call2,$caml_get_public_method,$cst_Jstable_keys) {
      $c = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, -955850252, 274), $x);
      };
      $d = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, 944440446, 275), $x);
      };
      $e = $Js_of_ocaml_Js[50][1];
      $f = (function(dynamic $t13, dynamic $param) {return $t13->Object;})($e, $d);
      $key_array = (function(dynamic $t15, dynamic $t14, dynamic $param) {return $t15->keys($t14);
       })($f, $t, $c);
      $res = Vector{0, 0};
      $g = 0;
      $h = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, 520590566, 276), $x);
      };
      $i = (int)
      ((function(dynamic $t12, dynamic $param) {return $t12->length;})($key_array, $h) + -1);
      if (! ($i < 0)) {
        $i__0 = $g;
        for (;;) {
          $j = function(dynamic $param) use ($Pervasives,$call1,$cst_Jstable_keys) {
            return $call1($Pervasives[2], $cst_Jstable_keys);
          };
          $k = $call2($Js_of_ocaml_Js[16], $key_array, $i__0);
          $key = $call2($Js_of_ocaml_Js[6][8], $k, $j);
          $l = $res[1];
          $m = function(dynamic $x) use ($call1,$caml_get_public_method) {
            return $call1($caml_get_public_method($x, -488115631, 277), $x);
          };
          $n = function(dynamic $x) use ($call1,$caml_get_public_method) {
            return $call1($caml_get_public_method($x, 520590566, 278), $x);
          };
          $o = (int)
          ((function(dynamic $t8, dynamic $param) {return $t8->length;})($key, $n) + -1);
          $p = 0;
          $res[1] =
            Vector{
              0,
              (function
               (dynamic $t11, dynamic $t9, dynamic $t10, dynamic $param) {return $t11->substring($t9, $t10);
               })($key, $p, $o, $m),
              $l
            };
          $q = (int) ($i__0 + 1);
          if ($i !== $i__0) {$i__0 = $q;continue;}
          break;
        }
      }
      return $call1($List[9], $res[1]);
    };
    $Js_of_ocaml_Jstable = Vector{0, $create, $add, $remove, $find, $keys};
    
    $runtime["caml_register_global"](
      16,
      $Js_of_ocaml_Jstable,
      "Js_of_ocaml__Jstable"
    );

  }
}