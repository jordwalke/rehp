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
    $caml_arity_test = $runtime["caml_arity_test"];
    $caml_get_public_method = $runtime["caml_get_public_method"];
    $caml_new_string = $runtime["caml_new_string"];
    $caml_call1 = function($f, $a0) use ($caml_arity_test,$runtime) {
      return $caml_arity_test($f) === 1
        ? $f($a0)
        : ($runtime["caml_call_gen"]($f, varray[$a0]));
    };
    $caml_call2 = function($f, $a0, $a1) use ($caml_arity_test,$runtime) {
      return $caml_arity_test($f) === 2
        ? $f($a0, $a1)
        : ($runtime["caml_call_gen"]($f, varray[$a0,$a1]));
    };
    $global_data = $runtime["caml_get_global_data"]();
    $cst_Jstable_keys = $caml_new_string("Jstable.keys");
    $Pervasives = $global_data["Pervasives"];
    $Js_of_ocaml_Js = $global_data["Js_of_ocaml__Js"];
    $List = $global_data["List_"];
    $pg = function($x) use ($caml_call1,$caml_get_public_method) {
      return $caml_call1($caml_get_public_method($x, 944440446, 249), $x);
    };
    $ph = $Js_of_ocaml_Js[50][1];
    $obj = (function($t0, $param) {return $t0->Object;})($ph, $pg);
    $create = function($param) use ($obj) {
      $pE = 0;
      return (function($t1, $param) {return new $t1();})($obj, $pE);
    };
    $add = function($t, $k, $v) use ($caml_call1,$caml_get_public_method) {
      $pB = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, -942667500, 250), $x);
      };
      $pC = "_";
      $pD = 0;
      $t[(function($t3, $t2, $param) {return $t3->concat($t2);})($k, $pC, $pB)
       ] = $v;
      return $pD;
    };
    $remove = function($t, $k) use ($caml_call1,$caml_get_public_method) {
      $pz = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, -942667500, 251), $x);
      };
      $pA = "_";
      return unset(
        $t[
           (function($t5, $t4, $param) {return $t5->concat($t4);})($k, $pA, $pz)
         ]
      );
    };
    $find = function($t, $k) use ($caml_call1,$caml_get_public_method) {
      $px = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, -942667500, 252), $x);
      };
      $py = "_";
      return $t[
         (function($t7, $t6, $param) {return $t7->concat($t6);})($k, $py, $px)
       ];
    };
    $keys = function($t) use ($Js_of_ocaml_Js,$List,$Pervasives,$caml_call1,$caml_call2,$caml_get_public_method,$cst_Jstable_keys) {
      $pi = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, -955850252, 253), $x);
      };
      $pj = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, 944440446, 254), $x);
      };
      $pk = $Js_of_ocaml_Js[50][1];
      $pl = (function($t13, $param) {return $t13->Object;})($pk, $pj);
      $key_array = (function($t15, $t14, $param) {return $t15->keys($t14);})($pl, $t, $pi);
      $res = Vector{0, 0};
      $pm = 0;
      $pn = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, 520590566, 255), $x);
      };
      $po = (int)
      ((function($t12, $param) {return $t12->length;})($key_array, $pn) + -1);
      if (! ($po < 0)) {
        $i = $pm;
        for (;;) {
          $pp = function($param) use ($Pervasives,$caml_call1,$cst_Jstable_keys) {
            return $caml_call1($Pervasives[2], $cst_Jstable_keys);
          };
          $pq = $caml_call2($Js_of_ocaml_Js[16], $key_array, $i);
          $key = $caml_call2($Js_of_ocaml_Js[6][8], $pq, $pp);
          $pr = $res[1];
          $ps = function($x) use ($caml_call1,$caml_get_public_method) {
            return $caml_call1(
              $caml_get_public_method($x, -488115631, 256),
              $x
            );
          };
          $pt = function($x) use ($caml_call1,$caml_get_public_method) {
            return $caml_call1($caml_get_public_method($x, 520590566, 257), $x
            );
          };
          $pu = (int)
          ((function($t8, $param) {return $t8->length;})($key, $pt) + -1);
          $pv = 0;
          $res[1] =
            Vector{
              0,
              (function($t11, $t9, $t10, $param) {
                 return $t11->substring($t9, $t10);
               })($key, $pv, $pu, $ps),
              $pr
            };
          $pw = (int) ($i + 1);
          if ($po !== $i) {$i = $pw;continue;}
          break;
        }
      }
      return $caml_call1($List[9], $res[1]);
    };
    $Js_of_ocaml_Jstable = Vector{0, $create, $add, $remove, $find, $keys};
    
    $runtime["caml_register_global"](
      16,
      $Js_of_ocaml_Jstable,
      "Js_of_ocaml__Jstable"
    );

  }
}