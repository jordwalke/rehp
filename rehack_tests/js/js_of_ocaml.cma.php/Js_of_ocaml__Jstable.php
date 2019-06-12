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
    $caml_new_string = $runtime["caml_new_string"];
    $global_data = $runtime["caml_get_global_data"]();
    $cst_Jstable_keys = $caml_new_string("Jstable.keys");
    $Pervasives = $global_data["Pervasives"];
    $Js_of_ocaml_Js = $global_data["Js_of_ocaml__Js"];
    $List = $global_data["List_"];
    $pg = function(dynamic $x) use ($call1,$caml_get_public_method) {
      return $call1($caml_get_public_method($x, 944440446, 249), $x);
    };
    $ph = $Js_of_ocaml_Js[50][1];
    $obj = (function(dynamic $t0, dynamic $param) {return $t0->Object;})($ph, $pg);
    $create = function(dynamic $param) use ($obj) {
      $pF = 0;
      return (function(dynamic $t1, dynamic $param) {return new $t1();})($obj, $pF);
    };
    $add = function(dynamic $t, dynamic $k, dynamic $v) use ($call1,$caml_get_public_method) {
      $pC = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, -942667500, 250), $x);
      };
      $pD = "_";
      $pE = 0;
      $t[
         (function(dynamic $t3, dynamic $t2, dynamic $param) {return $t3->concat($t2);
          })($k, $pD, $pC)
       ] = $v;
      return $pE;
    };
    $remove = function(dynamic $t, dynamic $k) use ($call1,$caml_get_public_method) {
      $pz = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, -942667500, 251), $x);
      };
      $pA = "_";
      $pB = 0;
      unset(
        $t[
           (function(dynamic $t5, dynamic $t4, dynamic $param) {return $t5->concat($t4);
            })($k, $pA, $pz)
         ]
      );
      return $pB;
    };
    $find = function(dynamic $t, dynamic $k) use ($call1,$caml_get_public_method) {
      $px = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, -942667500, 252), $x);
      };
      $py = "_";
      return $t[
         (function(dynamic $t7, dynamic $t6, dynamic $param) {return $t7->concat($t6);
          })($k, $py, $px)
       ];
    };
    $keys = function(dynamic $t) use ($Js_of_ocaml_Js,$List,$Pervasives,$call1,$call2,$caml_get_public_method,$cst_Jstable_keys) {
      $pi = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, -955850252, 253), $x);
      };
      $pj = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, 944440446, 254), $x);
      };
      $pk = $Js_of_ocaml_Js[50][1];
      $pl = (function(dynamic $t13, dynamic $param) {return $t13->Object;})($pk, $pj);
      $key_array = (function(dynamic $t15, dynamic $t14, dynamic $param) {return $t15->keys($t14);
       })($pl, $t, $pi);
      $res = Vector{0, 0};
      $pm = 0;
      $pn = function(dynamic $x) use ($call1,$caml_get_public_method) {
        return $call1($caml_get_public_method($x, 520590566, 255), $x);
      };
      $po = (int)
      ((function(dynamic $t12, dynamic $param) {return $t12->length;})($key_array, $pn) + -1);
      if (! ($po < 0)) {
        $i = $pm;
        for (;;) {
          $pp = function(dynamic $param) use ($Pervasives,$call1,$cst_Jstable_keys) {
            return $call1($Pervasives[2], $cst_Jstable_keys);
          };
          $pq = $call2($Js_of_ocaml_Js[16], $key_array, $i);
          $key = $call2($Js_of_ocaml_Js[6][8], $pq, $pp);
          $pr = $res[1];
          $ps = function(dynamic $x) use ($call1,$caml_get_public_method) {
            return $call1($caml_get_public_method($x, -488115631, 256), $x);
          };
          $pt = function(dynamic $x) use ($call1,$caml_get_public_method) {
            return $call1($caml_get_public_method($x, 520590566, 257), $x);
          };
          $pu = (int)
          ((function(dynamic $t8, dynamic $param) {return $t8->length;})($key, $pt) + -1);
          $pv = 0;
          $res[1] =
            Vector{
              0,
              (function
               (dynamic $t11, dynamic $t9, dynamic $t10, dynamic $param) {return $t11->substring($t9, $t10);
               })($key, $pv, $pu, $ps),
              $pr
            };
          $pw = (int) ($i + 1);
          if ($po !== $i) {$i = $pw;continue;}
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