<?hh
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * Has_one_underscore.php
 */

namespace Rehack;

final class Has_one_underscore {
  <<__Memoize>>
  public static function get() {
    $global_object = \Rehack\GlobalObject::get();
    $runtime = \Rehack\Runtime::get();
    /*
     * Soon, these will replace the `global_data->ModuleName`
     * pattern in the load() function.
     */
    $Js_of_ocaml__Js = Js_of_ocaml__Js::get();
    $String_ = String_::get();
    $Not_found = Not_found::get();
    Has_one_underscore::load($global_object);
    $memoized = $runtime->caml_get_global_data()->Has_one_underscore;
    return $memoized;
  }

  /**
   * Performs module load operation. May have side effects.
   */
  private static function load($joo_global_object) {
    

    $runtime = $joo_global_object->jsoo_runtime;
    $call2 = $runtime["caml_call2"];
    $call3 = $runtime["caml_call3"];
    $caml_wrap_exception = $runtime["caml_wrap_exception"];
    $global_data = $runtime["caml_get_global_data"]();
    $String = $global_data["String_"];
    $Not_found = $global_data["Not_found"];
    $hasOneUnderscore = function(dynamic $id_or_token) use ($Not_found,$String,$call2,$call3,$caml_wrap_exception,$runtime) {
      $id_or_token__0 = $runtime["caml_js_to_string"]($id_or_token);
      try {$d = $call2($String[14], $id_or_token__0, 95);$index = $d;}
      catch(\Throwable $e) {
        $e = $caml_wrap_exception($e);
        if ($e !== $Not_found) {
          throw $runtime["caml_wrap_thrown_exception_reraise"]($e) as \Throwable;
        }
        $a = -1;
        $index = $a;
      }
      $b = -1 < $index ? 1 : (0);
      $c = $b
        ? 1 - $call3($String[23], $id_or_token__0, (int) ($index + 1), 95)
        : ($b);
      return $c;
    };
    $Has_one_underscore = Vector{0, $hasOneUnderscore};
    
    $runtime["caml_register_global"](
      2,
      $Has_one_underscore,
      "Has_one_underscore"
    );

  }
}

