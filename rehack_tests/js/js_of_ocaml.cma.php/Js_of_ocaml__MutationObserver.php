<?hh
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * Js_of_ocaml__MutationObserver.php
 */

namespace Rehack;

final class Js_of_ocaml__MutationObserver {
  <<__Memoize>>
  public static function get() {
    $global_object = \Rehack\GlobalObject::get();
    $runtime = \Rehack\Runtime::get();
    /*
     * Soon, these will replace the `global_data->ModuleName`
     * pattern in the load() function.
     */
    $Array_ = Array_::get();
    $Js_of_ocaml__Js = Js_of_ocaml__Js::get();
    Js_of_ocaml__MutationObserver::load($global_object);
    $memoized = $runtime->caml_get_global_data()->Js_of_ocaml__MutationObserver;
    return $memoized;
  }

  /**
   * Performs module load operation. May have side effects.
   */
  private static function load($joo_global_object) {
    

    $runtime = $joo_global_object->jsoo_runtime;
    $caml_arity_test = $runtime["caml_arity_test"];
    $caml_get_public_method = $runtime["caml_get_public_method"];
    $caml_call1 = function($f, $a0) use ($caml_arity_test,$runtime) {
      return $caml_arity_test($f) === 1
        ? $f($a0)
        : ($runtime["caml_call_gen"]($f, varray[$a0]));
    };
    $global_data = $runtime["caml_get_global_data"]();
    $Array = $global_data["Array_"];
    $Js_of_ocaml_Js = $global_data["Js_of_ocaml__Js"];
    $empty_mutation_observer_init = function($param) {
      return (object)darray[];
    };
    $pG = function($x) use ($caml_call1,$caml_get_public_method) {
      return $caml_call1($caml_get_public_method($x, -412262690, 258), $x);
    };
    $pH = $Js_of_ocaml_Js[50][1];
    $mutationObserver = (function($t0, $param) {return $t0->MutationObserver;})($pH, $pG);
    $is_supported = function($param) use ($Js_of_ocaml_Js,$caml_call1,$mutationObserver) {
      return $caml_call1($Js_of_ocaml_Js[6][5], $mutationObserver);
    };
    $observe = function
    ($node, $f, $child_list, $attributes, $character_data, $subtree, $attribute_old_value, $character_data_old_value, $attribute_filter, $param) use ($Array,$caml_call1,$caml_get_public_method,$empty_mutation_observer_init,$mutationObserver,$runtime) {
      $opt_iter = function($x, $f) use ($caml_call1) {
        if ($x) {$x__0 = $x[1];return $caml_call1($f, $x__0);}
        return 0;
      };
      $pI = 0;
      $pJ = $runtime["caml_js_wrap_callback"]($f);
      $obs = (function($t19, $t18, $param) {return new $t19($t18);})($mutationObserver, $pJ, $pI);
      $cfg = $empty_mutation_observer_init(0);
      $opt_iter(
        $child_list,
        function($v) use ($caml_call1,$caml_get_public_method,$cfg) {
          $pS = function($x) use ($caml_call1,$caml_get_public_method) {
            return $caml_call1(
              $caml_get_public_method($x, -749670374, 259),
              $x
            );
          };
          return (function($t17, $t16, $param) {
             $t17->childList = $t16;
             return 0;
           })($cfg, $v, $pS);
        }
      );
      $opt_iter(
        $attributes,
        function($v) use ($caml_call1,$caml_get_public_method,$cfg) {
          $pR = function($x) use ($caml_call1,$caml_get_public_method) {
            return $caml_call1($caml_get_public_method($x, 393324759, 260), $x
            );
          };
          return (function($t15, $t14, $param) {
             $t15->attributes = $t14;
             return 0;
           })($cfg, $v, $pR);
        }
      );
      $opt_iter(
        $character_data,
        function($v) use ($caml_call1,$caml_get_public_method,$cfg) {
          $pQ = function($x) use ($caml_call1,$caml_get_public_method) {
            return $caml_call1($caml_get_public_method($x, 995092083, 261), $x
            );
          };
          return (function($t13, $t12, $param) {
             $t13->characterData = $t12;
             return 0;
           })($cfg, $v, $pQ);
        }
      );
      $opt_iter(
        $subtree,
        function($v) use ($caml_call1,$caml_get_public_method,$cfg) {
          $pP = function($x) use ($caml_call1,$caml_get_public_method) {
            return $caml_call1($caml_get_public_method($x, 808321758, 262), $x
            );
          };
          return (function($t11, $t10, $param) {
             $t11->subtree = $t10;
             return 0;
           })($cfg, $v, $pP);
        }
      );
      $opt_iter(
        $attribute_old_value,
        function($v) use ($caml_call1,$caml_get_public_method,$cfg) {
          $pO = function($x) use ($caml_call1,$caml_get_public_method) {
            return $caml_call1($caml_get_public_method($x, 226312582, 263), $x
            );
          };
          return (function($t9, $t8, $param) {
             $t9->attributeOldValue = $t8;
             return 0;
           })($cfg, $v, $pO);
        }
      );
      $opt_iter(
        $character_data_old_value,
        function($v) use ($caml_call1,$caml_get_public_method,$cfg) {
          $pN = function($x) use ($caml_call1,$caml_get_public_method) {
            return $caml_call1($caml_get_public_method($x, 994928349, 264), $x
            );
          };
          return (function($t7, $t6, $param) {
             $t7->characterDataOldValue = $t6;
             return 0;
           })($cfg, $v, $pN);
        }
      );
      $opt_iter(
        $attribute_filter,
        function($l) use ($Array,$caml_call1,$caml_get_public_method,$cfg,$runtime) {
          $pL = function($x) use ($caml_call1,$caml_get_public_method) {
            return $caml_call1(
              $caml_get_public_method($x, -116981516, 265),
              $x
            );
          };
          $pM = $runtime["caml_js_from_array"]($caml_call1($Array[12], $l));
          return (function($t5, $t4, $param) {
             $t5->attributeFilter = $t4;
             return 0;
           })($cfg, $pM, $pL);
        }
      );
      $pK = function($x) use ($caml_call1,$caml_get_public_method) {
        return $caml_call1($caml_get_public_method($x, 821429468, 266), $x);
      };
      ((function($t3, $t1, $t2, $param) {return $t3->observe($t1, $t2);})($obs, $node, $cfg, $pK));
      return $obs;
    };
    $Js_of_ocaml_MutationObserver = Vector{
      0,
      $empty_mutation_observer_init,
      $mutationObserver,
      $is_supported,
      $observe
    };
    
    $runtime["caml_register_global"](
      11,
      $Js_of_ocaml_MutationObserver,
      "Js_of_ocaml__MutationObserver"
    );

  }
}