<?hh
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * Runtime.php
 */

namespace Rehack;

final class Runtime {
  <<__Memoize>>
  public static function get() {
    $global_object = \Rehack\GlobalObject::get();
    $runtime = \Rehack\Runtime::get();
    /*
     * Soon, these will replace the `global_data->ModuleName`
     * pattern in the load() function.
     */

    Runtime::load($global_object);
    $memoized = $runtime->caml_get_global_data()->Runtime;
    return $memoized;
  }

  /**
   * Performs module load operation. May have side effects.
   */
  private static function load($joo_global_object) {
    

    
    
$String = $joo_global_object->String;
    
    
    
    
$caml_wrap_thrown_exception = function($e) use($String, $caml_global_data) {
  if ($e instanceof RehpExceptionBox) {
    return $e;
  }
  // Check for __isArrayLike because some exceptions are manually constructed in stubs
  if ($e instanceof R || $e instanceof V || isset($e->__isArrayLike)) {
    return new RehpExceptionBox($e);
  }
  // Stack overflows cannot be caught reliably in PHP it seems. Cannot easily
  // map it to Stack_overflow.

  // Wrap Error in Js.Error exception
  if($e instanceof \Exception) { // && $caml_named_value("phpError"))
    // return [0,caml_named_value("phpError"),e];
    return new RehpExceptionBox(R(0, $String->new("phpError"), $e), $e->getCode(), $e);
  }
  //fallback: wrapped in Failure
  // Again, with proper stubs this will refer to the actual Failure - always
  // kept in sync.
  return new RehpExceptionBox(R(0, $caml_global_data->Failure, $e));
};
    
    
    
    
  $ObjectLiteral = $joo_global_object->ObjectLiteral;
    
    
    
    
  $Error = $ObjectLiteral(darray[
     // Define to return a PHP exception subclass.
    "new" => function($payload) {
       return new \ErrorException($payload->__php_str);
    }
  ]);
    
    
    
    
$Func=$joo_global_object->Func;
    
    
    
    
$caml_js_to_string = $Func(
  function($s) use ($Error,$MlBytes,$String,$caml_is_ascii,$eqEqEq,$typeof) {
    if (PHP\is_string($s)) {
      $s=$String->new($s);
    }
    if (!$eqEqEq($typeof($s), $String->new("string"))) {
      throw $Error->new(
              $String->new("caml_js_to_string called with non-string")
            );
    }
    $tag = 9;
    if (! $caml_is_ascii($s)) {($tag = 8) || true ? $s = $s : ($s = $s);}
    return $MlBytes->new($tag, $s, $s->length);
  }
);
    
    
    
    
$caml_arity_test = function($f) {
  $php_f = ($f instanceof Func) ? $f->fun : $f;
  if (is_object($php_f) && ($php_f instanceof \Closure)) {
    return (new \ReflectionFunction($php_f))->getNumberOfRequiredParameters();
  } else {
    throw new \ErrorException("Passed non closure to rehack_arity");
  }
};
    
    
    
    
  $caml_call_gen=function(
    (function(mixed...): mixed) $f,
    varray<mixed> $args,
  ): mixed
  use($raw_array_sub, $caml_arity_test) {
    $n = caml_arity_test($f);
    $argsLen = C\count($args);
    $d = $n - $argsLen;

    if ($d === 0) {
      return $f(...$args);
    } else if ($d < 0) {
      return $caml_call_gen(
        /* HH_IGNORE_ERROR[4110] $f must return a function here */
        $f(...$raw_array_sub($args, 0, $n)),
        $raw_array_sub($args, $n, $argsLen - $n),
      );
    } else {
      return function(mixed $x) use ($f, $args) {
        $args[] = $x;
        return $caml_call_gen($f, $args);
      };
    }
  }
    
    
    
    
 $caml_call6=function(
   (function(mixed...): mixed) $f,
   dynamic $a1,
   dynamic $a2,
   dynamic $a3,
   dynamic $a4,
   dynamic $a5,
   dynamic $a6,
 ): dynamic
  use($caml_arity_test, $caml_call_gen) {
   return $caml_arity_test($f) === 6
     ? $f($a1, $a2, $a3, $a4, $a5, $a6)
     : $caml_call_gen($f, varray[$a1, $a2, $a3, $a4, $a5, $a6]);
 }
    
    
    
    
  $isFinite = function($value) {
   $value = to_number($value);
   return !($value === \INF || $value === -\INF || PHP\is_nan($value));
  };
    
    
    
    
  $isNaN = function($value) {
   return PHP\is_nan(to_number($value));
  };
    
    
    
    
  $eval = function($str){throw new \ErrorException("Eval not supported");};
    
    
    
    
  $NaN=\NAN;
    
    
    
    
  $is_in = function($key, $val) {
   return isset($val[$key]);
  };
    
    
    
    
 $caml_call4=function(
   (function(mixed...): mixed) $f,
   dynamic $a1,
   dynamic $a2,
   dynamic $a3,
   dynamic $a4,
 ): dynamic
  use($caml_arity_test, $caml_call_gen) {
   return $caml_arity_test($f) === 4
     ? $f($a1, $a2, $a3, $a4)
     : $caml_call_gen($f, varray[$a1, $a2, $a3, $a4]);
 }
    
    
    
    
$caml_wrap_exception = function($e) use($String, $caml_global_data) {
  if ($e instanceof RehpExceptionBox) {
    return $e->contents;
  }
  // Check for __isArrayLike because some exceptions are manually constructed in stubs
  if ($e instanceof R || $e instanceof V || isset($e->__isArrayLike)) {
    return $e;
  }
  // Stack overflows cannot be caught reliably in PHP it seems. Cannot easily
  // map it to Stack_overflow.
  // Wrap Error in Js.Error exception
  if($e instanceof \Throwable) { // && $caml_named_value("phpError"))
    // return [0,caml_named_value("phpError"),e];
    return R(0, $String->new("phpError"), $e);
  }
  //fallback: wrapped in Failure
  // Again, with proper stubs this will refer to the actual Failure - always
  // kept in sync.
  return R(0, $caml_global_data->Failure, $e);
};
    
    
    
    
$ArrayLiteral=$joo_global_object->ArrayLiteral;
    
    
    
    
  $caml_js_wrap_callback = $Func(
    function($f) use ($Array,$ArrayLiteral,$Func,$caml_call_gen) {
      print("WARNING: caml_js_wrap_callback is not yet tested");
      return $Func(
        function() use ($Array,$ArrayLiteral,$caml_call_gen,$f) {
          $arguments=\func_get_args();
          if (PHP\count($arguments) > 0) {
            return $caml_call_gen($f, $Array->new($arguments));
          } else {
            return $caml_call_gen($f, $ArrayLiteral(NULL));
          }
        }
      );
    }
  );
    
    
    
    
  $caml_js_wrap_callback_arguments = $Func(
    function($f) use ($Func, $caml_js_wrap_callback) {
      print("WARNING: caml_js_wrap_callback_arguments is not yet tested");
      return $Func(
        function() use ($caml_js_wrap_callback, $f) {
          $arguments=\func_get_args();
          return $caml_js_wrap_callback($f)($arguments);
        }
      );
    }
  );
    
    
    
    
    $caml_js_html_entities = function() {
      throw new \Exception(
        'caml_js_html_entities is not supported in PHP backend'
      );
    };
    
    
    
    
 $caml_call8=function(
   (function(mixed...): mixed) $f,
   dynamic $a1,
   dynamic $a2,
   dynamic $a3,
   dynamic $a4,
   dynamic $a5,
   dynamic $a6,
   dynamic $a7,
   dynamic $a8,
 ): dynamic
  use($caml_arity_test, $caml_call_gen) {
   return $caml_arity_test($f) === 8
     ? $f($a1, $a2, $a3, $a4, $a5, $a6, $a7, $a8)
     : $caml_call_gen($f, varray[$a1, $a2, $a3, $a4, $a5, $a6, $a7, $a8]);
 }
    
    
    
    
$polymorphic_log=$joo_global_object->polymorphic_log;
    
    
    
    
    $right_shift_32 = function(int $a, int $b): int {
      if (\PHP_INT_SIZE === 8) {
        // 64 bit.
        $a_normalized = ($a << 32) >> 32;
      } else {
        // Size four means 32bit
        $a_normalized = $a;
      }
      return $a_normalized >> $b;
    };
    
    
    
    
 $caml_call7=function(
   (function(mixed...): mixed) $f,
   dynamic $a1,
   dynamic $a2,
   dynamic $a3,
   dynamic $a4,
   dynamic $a5,
   dynamic $a6,
   dynamic $a7,
 ): dynamic
  use($caml_arity_test, $caml_call_gen) {
   return $caml_arity_test($f) === 7
     ? $f($a1, $a2, $a3, $a4, $a5, $a6, $a7)
     : $caml_call_gen($f, varray[$a1, $a2, $a3, $a4, $a5, $a6, $a7]);
 }
    
    
    
    
    $parseInt = function($str, $base) {
      print('oh hi markk');
      return PHP\intval($str, $base);
    };
    
    
    
    
 $caml_call5=function(
   (function(mixed...): mixed) $f,
   dynamic $a1,
   dynamic $a2,
   dynamic $a3,
   dynamic $a4,
   dynamic $a5,
 ): dynamic
  use($caml_arity_test, $caml_call_gen) {
   return $caml_arity_test($f) === 5
     ? $f($a1, $a2, $a3, $a4, $a5)
     : $caml_call_gen($f, varray[$a1, $a2, $a3, $a4, $a5]);
 }
    
    
    
    
  $caml_call2=function(
   (function(mixed...): mixed) $f,
   dynamic $a1,
   dynamic $a2,
 ): dynamic
  use($caml_arity_test, $caml_call_gen) {
   return $caml_arity_test($f) === 2
     ? $f($a1, $a2)
     : $caml_call_gen($f, varray[$a1, $a2]);
 }
    
    
    
    
    $caml_js_wrap_meth_callback_arguments = $Func(
      function($f) use (
        $ArrayLiteral,
        $Func,
        $caml_call_gen,
        $joo_global_object
      ) {
        print("WARNING: caml_js_wrap_meth_callback_arguments is not yet tested");
        return $Func(
          function() use ($ArrayLiteral, $caml_call_gen, $f, $joo_global_object) {
            return $caml_call_gen(
              $f,
              $ArrayLiteral(
                varray[
                  $joo_global_object->context,
                  $ArrayLiteral(\func_get_args())
                ]
              )
            );
          }
        );
      }
    );
    
    
    
    
    $caml_js_wrap_callback_strict = $Func(
      function($arity, $f) use (
        $Func,
        $Math,
        $ArrayLiteral,
        $caml_call_gen
      ) {
        print("WARNING: caml_js_wrap_callback_strict is not yet tested");
        return $Func(
          function() use (
            $Math,
            $ArrayLiteral,
            $arity,
            $caml_call_gen,
            $f
          ) {
            $func_args = \func_get_args();
            $n = PHP\count($func_args);
            if ($n !== $arity) {
              $func_args = PHP\array_slice($func_args, 0, $Math->min($n, $arity));
            }
            return $caml_call_gen($f, $ArrayLiteral($func_args));
          }
        );
      }
    );
    
    
    
    
    $caml_js_wrap_meth_callback = $Func(
      function($f) use (
        $ArrayLiteral,
        $Func,
        $caml_call_gen,
        $raw_array_cons,
        $joo_global_object
      ) {
        print("WARNING: caml_js_wrap_meth_callback is not yet tested");
        return $Func(
          function() use (
            $caml_call_gen,
            $f,
            $joo_global_object,
            $raw_array_cons,
            $ArrayLiteral
          ) {
            return $caml_call_gen(
              $f,
              $raw_array_cons(
                $ArrayLiteral(\func_get_args()),
                $joo_global_object->context
              )
            );
          }
        );
      }
    );
    
    
    
    
  $SyntaxError = $ObjectLiteral(darray[
     // Define to return a PHP exception subclass.
    "new" => function($payload) {
       return new \ErrorException('SyntaxError: ' .$payload->__php_str);
    }
  ]);
    
    
    
    
    $unsigned_right_shift_32 = function(int $a, int $b): int {
      if ($b >= 32 || $b < -32) {
        $m = (int)($b / 32);
        $b = $b - ($m * 32);
      }
      if ($b < 0) {
        $b = 32 + $b;
      }
      if ($b === 0) {
        return (($a >> 1) & 0x7fffffff) * 2 + (($a >> $b) & 1);
      }
      if ($a < 0) {
        $a = ($a >> 1);
        $a &= 2147483647;
        $a |= 0x40000000;
        $a = ($a >> ($b - 1));
      } else {
        $a = ($a >> $b);
      }
      return $a;
    };
    
    
    
    
  $is_int=$joo_global_object->is_int;
    
    
    
    
$caml_wrap_thrown_exception_traceless = $caml_wrap_thrown_exception;
    
    
    
    
    $left_shift_32 = (int $a, int $b): int {
      $shifted = $a << $b;
      if (\PHP_INT_SIZE === 8) {
        // 64 bit.
        return ($shifted << 32) >> 32;
      } else {
        // Size four means 32bit
        return $shifted;
      }
    };
    
    
    
    
$RegExp=$joo_global_object->RegExp;
    
    
    
    
    $caml_js_wrap_meth_callback_unsafe = $Func(
      function($f) use (
        $ArrayLiteral,
        $Func,
        $joo_global_object,
        $raw_array_cons
      ) {
        print("WARNING: caml_js_wrap_meth_callback_unsafe is not yet tested");
        return $Func(
          function() use (
            $ArrayLiteral,
            $f,
            $joo_global_object,
            $raw_array_cons
          ) {
            $f->apply(
              varray[],
              $raw_array_cons(
                $ArrayLiteral(\func_get_args()),
                $joo_global_object->context
              )
            );
          }
        );
      }
    );
    
    
    
    
 $caml_call3=function(
   (function(mixed...): mixed) $f,
   dynamic $a1,
   dynamic $a2,
   dynamic $a3,
 ): dynamic
  use($caml_arity_test, $caml_call_gen) {
   return $caml_arity_test($f) === 3
     ? $f($a1, $a2, $a3)
     : $caml_call_gen($f, varray[$a1, $a2, $a3]);
 }
    
    
    
    
  $caml_update_dummy = function($x, $y) {
    if(PHP\is_callable($y)) {
      $x->fun = $y;
      return 0;
    }
    if(isset($y->fun)) {
      $x->fun = $y->fun;
      return 0;
    }
    $i = $y->length;
    while ($i--) $x[$i] = $y[$i];
    return 0;
  };
    
    
    
    
$caml_wrap_thrown_exception_reraise = $caml_wrap_thrown_exception;
    
    
    
    
    $caml_alloc_dummy_function = $Func(
      function($size, $arity) use (
        $ArrayLiteral,
        $Func,
        $joo_global_object
      ) {
        print("WARNING: caml_alloc_dummy_function is not yet tested");
        $f = new Ref();
        $f->contents = $Func(
          function() use ($ArrayLiteral, $f, $joo_global_object) {
            return $f->contents
              ->fun
              ->apply(
                $joo_global_object->context,
                $ArrayLiteral(\func_get_args())
              );
          }
        );
        $f->contents->length = $arity;
        return $f->contents;
      }
    );
    
    
    
    
    $caml_js_wrap_meth_callback_strict = $Func(
      function($arity, $f) use (
        $ArrayLiteral,
        $Func,
        $caml_call_gen,
        $joo_global_object
      ) {
        print("WARNING: caml_js_wrap_meth_callback_strict is not yet tested");
        return $Func(
          function() use (
            $ArrayLiteral,
            $arity,
            $caml_call_gen,
            $f,
            $joo_global_object
          ) {
            $func_args = \func_get_args();
            $n = PHP\count($func_args);
            $args = varray[$joo_global_object->context];
            if ($n === $arity) {
              $args = PHP\array_merge($args, $func_args);
            } else {
              for ($i = 1; $i < $n && $i <= $arity; $i++) {
                $args[$i] = $func_args[$i];
              }
            }
            return $caml_call_gen($f, $ArrayLiteral($args));
          }
        );
      }
    );
    
    
    
    
  $caml_call1=function((function(mixed...): mixed) $f, dynamic $a1): dynamic
  use($caml_arity_test, $caml_call_gen) {
    return $caml_arity_test($f) === 1 ? $f($a1) : $caml_call_gen($f, varray[$a1]);
  }
    
    
    $joo_global_object->jsoo_runtime =
      $ObjectLiteral(
        darray[
         "caml_ephe_check_data"=>$caml_ephe_check_data,
         "caml_ephe_unset_data"=>$caml_ephe_unset_data,
         "caml_ephe_set_data"=>$caml_ephe_set_data,
         "caml_ephe_get_data_copy"=>$caml_ephe_get_data_copy,
         "caml_ephe_get_data"=>$caml_ephe_get_data,
         "caml_ephe_blit_data"=>$caml_ephe_blit_data,
         "caml_ephe_unset_key"=>$caml_ephe_unset_key,
         "caml_ephe_set_key"=>$caml_ephe_set_key,
         "caml_ephe_check_key"=>$caml_ephe_check_key,
         "caml_ephe_get_key_copy"=>$caml_ephe_get_key_copy,
         "caml_ephe_get_key"=>$caml_ephe_get_key,
         "caml_ephe_blit_key"=>$caml_ephe_blit_key,
         "caml_ephe_create"=>$caml_ephe_create,
         "caml_weak_blit"=>$caml_weak_blit,
         "caml_weak_check"=>$caml_weak_check,
         "caml_weak_get_copy"=>$caml_weak_get_copy,
         "caml_weak_get"=>$caml_weak_get,
         "caml_weak_set"=>$caml_weak_set,
         "caml_weak_create"=>$caml_weak_create,
         "caml_ephe_data_offset"=>$caml_ephe_data_offset,
         "caml_ephe_key_offset"=>$caml_ephe_key_offset,
         "caml_hash_mix_bigstring"=>$caml_hash_mix_bigstring,
         "bigstring_of_array_buffer"=>$bigstring_of_array_buffer,
         "bigstring_to_array_buffer"=>$bigstring_to_array_buffer,
         "bigstring_find"=>$bigstring_find,
         "bigstring_memcmp_stub"=>$bigstring_memcmp_stub,
         "bigstring_blit_stub"=>$bigstring_blit_stub,
         "caml_blit_string_to_bigstring"=>$caml_blit_string_to_bigstring,
         "bigstring_blit_bytes_bigstring_stub"=>
         $bigstring_blit_bytes_bigstring_stub,
         "bigstring_blit_string_bigstring_stub"=>
         $bigstring_blit_string_bigstring_stub,
         "caml_blit_bigstring_to_string"=>$caml_blit_bigstring_to_string,
         "bigstring_blit_bigstring_string_stub"=>
         $bigstring_blit_bigstring_string_stub,
         "bigstring_blit_bigstring_bytes_stub"=>
         $bigstring_blit_bigstring_bytes_stub,
         "bigstring_destroy_stub"=>$bigstring_destroy_stub,
         "bigstring_alloc"=>$bigstring_alloc,
         "caml_json"=>$caml_json,
         "JSON"=>$JSON,
         "caml_gc_get"=>$caml_gc_get,
         "caml_gc_set"=>$caml_gc_set,
         "caml_gc_stat"=>$caml_gc_stat,
         "caml_gc_quick_stat"=>$caml_gc_quick_stat,
         "caml_gc_counters"=>$caml_gc_counters,
         "caml_gc_compaction"=>$caml_gc_compaction,
         "caml_gc_full_major"=>$caml_gc_full_major,
         "caml_gc_major"=>$caml_gc_major,
         "caml_gc_minor"=>$caml_gc_minor,
         "caml_CamlinternalMod_update_mod"=>$caml_CamlinternalMod_update_mod,
         "caml_CamlinternalMod_init_mod"=>$caml_CamlinternalMod_init_mod,
         "eval"=>$eval,
         "caml_js_export_var"=>$caml_js_export_var,
         "caml_js_object"=>$caml_js_object,
         "caml_pure_js_expr"=>$caml_pure_js_expr,
         "caml_js_raw_expr"=>$caml_js_raw_expr,
         "caml_js_expr"=>$caml_js_expr,
         "caml_js_eval_string"=>$caml_js_eval_string,
         "caml_js_to_byte_string"=>$caml_js_to_byte_string,
         "caml_js_equals"=>$caml_js_equals,
         "caml_js_wrap_meth_callback_unsafe"=>
         $caml_js_wrap_meth_callback_unsafe,
         "caml_js_wrap_meth_callback_strict"=>
         $caml_js_wrap_meth_callback_strict,
         "caml_js_wrap_meth_callback_arguments"=>
         $caml_js_wrap_meth_callback_arguments,
         "caml_js_wrap_meth_callback"=>$caml_js_wrap_meth_callback,
         "caml_js_wrap_callback_strict"=>$caml_js_wrap_callback_strict,
         "caml_js_wrap_callback_arguments"=>$caml_js_wrap_callback_arguments,
         "caml_js_wrap_callback"=>$caml_js_wrap_callback,
         "caml_ojs_new_arr"=>$caml_ojs_new_arr,
         "caml_js_new"=>$caml_js_new,
         "caml_js_meth_call3"=>$caml_js_meth_call3,
         "caml_js_meth_call2"=>$caml_js_meth_call2,
         "caml_js_meth_call1"=>$caml_js_meth_call1,
         "caml_js_meth_call0"=>$caml_js_meth_call0,
         "caml_js_meth_call"=>$caml_js_meth_call,
         "caml_js_fun_call4"=>$caml_js_fun_call4,
         "caml_js_fun_call3"=>$caml_js_fun_call3,
         "caml_js_fun_call2"=>$caml_js_fun_call2,
         "caml_js_fun_call1"=>$caml_js_fun_call1,
         "caml_js_fun_call0"=>$caml_js_fun_call0,
         "caml_js_fun_call"=>$caml_js_fun_call,
         "caml_js_call"=>$caml_js_call,
         "caml_js_var"=>$caml_js_var,
         "caml_js_to_array"=>$caml_js_to_array,
         "caml_js_from_array"=>$caml_js_from_array,
         "caml_js_from_string"=>$caml_js_from_string,
         "caml_js_to_float"=>$caml_js_to_float,
         "caml_js_from_float"=>$caml_js_from_float,
         "caml_js_to_bool"=>$caml_js_to_bool,
         "caml_js_from_bool"=>$caml_js_from_bool,
         "js_print_stderr"=>$js_print_stderr,
         "js_print_stdout"=>$js_print_stdout,
         "caml_trampoline_return"=>$caml_trampoline_return,
         "caml_trampoline"=>$caml_trampoline,
         "caml_js_get_console"=>$caml_js_get_console,
         "caml_js_html_entities"=>$caml_js_html_entities,
         "caml_js_html_escape"=>$caml_js_html_escape,
         "caml_js_on_ie"=>$caml_js_on_ie,
         "caml_js_typeof"=>$caml_js_typeof,
         "caml_js_instanceof"=>$caml_js_instanceof,
         "caml_js_set"=>$caml_js_set,
         "caml_js_property_set"=>$caml_js_property_set,
         "caml_js_dict_set"=>$caml_js_dict_set,
         "caml_js_get"=>$caml_js_get,
         "caml_js_property_get"=>$caml_js_property_get,
         "caml_js_dict_get"=>$caml_js_dict_get,
         "caml_js_delete"=>$caml_js_delete,
         "caml_js_pure_expr"=>$caml_js_pure_expr,
         "MlNodeFile"=>$MlNodeFile,
         "MlNodeDevice"=>$MlNodeDevice,
         "fs_node_supported"=>$fs_node_supported,
         "MlFakeFile"=>$MlFakeFile,
         "MlFakeDevice"=>$MlFakeDevice,
         "caml_read_file_content"=>$caml_read_file_content,
         "caml_create_file"=>$caml_create_file,
         "caml_fs_init"=>$caml_fs_init,
         "caml_create_file_extern"=>$caml_create_file_extern,
         "caml_ba_map_file_bytecode"=>$caml_ba_map_file_bytecode,
         "caml_ba_map_file"=>$caml_ba_map_file,
         "caml_sys_rename"=>$caml_sys_rename,
         "caml_sys_is_directory"=>$caml_sys_is_directory,
         "caml_sys_remove"=>$caml_sys_remove,
         "caml_sys_read_directory"=>$caml_sys_read_directory,
         "caml_sys_file_exists"=>$caml_sys_file_exists,
         "caml_raise_not_a_dir"=>$caml_raise_not_a_dir,
         "caml_raise_no_such_file"=>$caml_raise_no_such_file,
         "caml_sys_chdir"=>$caml_sys_chdir,
         "caml_sys_getcwd"=>$caml_sys_getcwd,
         "caml_unmount"=>$caml_unmount,
         "caml_mount_autoload"=>$caml_mount_autoload,
         "resolve_fs_device"=>$resolve_fs_device,
         "caml_list_mount_point"=>$caml_list_mount_point,
         "jsoo_mount_point"=>$jsoo_mount_point,
         "caml_make_path"=>$caml_make_path,
         "MlFile"=>$MlFile,
         "caml_root"=>$caml_root,
         "caml_current_dir"=>$caml_current_dir,
         "caml_ml_output_int"=>$caml_ml_output_int,
         "caml_ml_pos_out_64"=>$caml_ml_pos_out_64,
         "caml_ml_pos_out"=>$caml_ml_pos_out,
         "caml_ml_seek_out_64"=>$caml_ml_seek_out_64,
         "caml_ml_seek_out"=>$caml_ml_seek_out,
         "caml_output_value"=>$caml_output_value,
         "caml_ml_output_char"=>$caml_ml_output_char,
         "caml_ml_output"=>$caml_ml_output,
         "caml_ml_output_bytes"=>$caml_ml_output_bytes,
         "caml_ml_flush"=>$caml_ml_flush,
         "caml_ml_input_scan_line"=>$caml_ml_input_scan_line,
         "caml_ml_pos_in_64"=>$caml_ml_pos_in_64,
         "caml_ml_pos_in"=>$caml_ml_pos_in,
         "caml_ml_seek_in_64"=>$caml_ml_seek_in_64,
         "caml_ml_seek_in"=>$caml_ml_seek_in,
         "caml_ml_input_int"=>$caml_ml_input_int,
         "caml_ml_input_char"=>$caml_ml_input_char,
         "caml_input_value"=>$caml_input_value,
         "caml_ml_input"=>$caml_ml_input,
         "caml_ml_may_refill_input"=>$caml_ml_may_refill_input,
         "caml_ml_refill_input"=>$caml_ml_refill_input,
         "caml_ml_set_channel_refill"=>$caml_ml_set_channel_refill,
         "caml_ml_set_channel_output"=>$caml_ml_set_channel_output,
         "caml_ml_channel_size_64"=>$caml_ml_channel_size_64,
         "caml_ml_channel_size"=>$caml_ml_channel_size,
         "caml_ml_close_channel"=>$caml_ml_close_channel,
         "caml_ml_set_binary_mode"=>$caml_ml_set_binary_mode,
         "caml_ml_open_descriptor_in"=>$caml_ml_open_descriptor_in,
         "caml_ml_open_descriptor_out"=>$caml_ml_open_descriptor_out,
         "caml_ml_out_channels_list"=>$caml_ml_out_channels_list,
         "caml_ml_channels"=>$caml_ml_channels,
         "caml_ml_set_channel_name"=>$caml_ml_set_channel_name,
         "caml_sys_open"=>$caml_sys_open,
         "caml_std_output"=>$caml_std_output,
         "caml_sys_close"=>$caml_sys_close,
         "right_shift_32"=>$right_shift_32,
         "unsigned_right_shift_32"=>$unsigned_right_shift_32,
         "left_shift_32"=>$left_shift_32,
         "is_in"=>$is_in,
         "isFinite"=>$isFinite,
         "isNaN"=>$isNaN,
         "SyntaxError"=>$SyntaxError,
         "Error"=>$Error,
         "ObjectLiteral"=>$ObjectLiteral,
         "NaN"=>$NaN,
         "is_int"=>$is_int,
         "polymorphic_log"=>$polymorphic_log,
         "Func"=>$Func,
         "RegExp"=>$RegExp,
         "ArrayLiteral"=>$ArrayLiteral,
         "caml_is_js"=>$caml_is_js,
         "caml_spacetime_only_works_for_native_code"=>
         $caml_spacetime_only_works_for_native_code,
         "caml_register_channel_for_spacetime"=>
         $caml_register_channel_for_spacetime,
         "caml_spacetime_enabled"=>$caml_spacetime_enabled,
         "caml_sys_isatty"=>$caml_sys_isatty,
         "caml_runtime_parameters"=>$caml_runtime_parameters,
         "caml_runtime_variant"=>$caml_runtime_variant,
         "caml_ml_runtime_warnings_enabled"=>$caml_ml_runtime_warnings_enabled,
         "caml_ml_enable_runtime_warnings"=>$caml_ml_enable_runtime_warnings,
         "caml_runtime_warnings"=>$caml_runtime_warnings,
         "caml_list_of_js_array"=>$caml_list_of_js_array,
         "caml_int64_bswap"=>$caml_int64_bswap,
         "caml_int32_bswap"=>$caml_int32_bswap,
         "caml_bswap16"=>$caml_bswap16,
         "caml_convert_raw_backtrace_slot"=>$caml_convert_raw_backtrace_slot,
         "caml_install_signal_handler"=>$caml_install_signal_handler,
         "caml_fresh_oo_id"=>$caml_fresh_oo_id,
         "caml_set_oo_id"=>$caml_set_oo_id,
         "caml_oo_last_id"=>$caml_oo_last_id,
         "unix_inet_addr_of_string"=>$unix_inet_addr_of_string,
         "caml_sys_get_argv"=>$caml_sys_get_argv,
         "caml_sys_exit"=>$caml_sys_exit,
         "caml_sys_getenv"=>$caml_sys_getenv,
         "caml_set_static_env"=>$caml_set_static_env,
         "caml_get_current_callstack"=>$caml_get_current_callstack,
         "caml_restore_raw_backtrace"=>$caml_restore_raw_backtrace,
         "caml_raw_backtrace_slot"=>$caml_raw_backtrace_slot,
         "caml_raw_backtrace_next_slot"=>$caml_raw_backtrace_next_slot,
         "caml_raw_backtrace_length"=>$caml_raw_backtrace_length,
         "caml_convert_raw_backtrace"=>$caml_convert_raw_backtrace,
         "caml_record_backtrace"=>$caml_record_backtrace,
         "caml_get_exception_raw_backtrace"=>$caml_get_exception_raw_backtrace,
         "caml_get_exception_backtrace"=>$caml_get_exception_backtrace,
         "caml_backtrace_status"=>$caml_backtrace_status,
         "caml_final_release"=>$caml_final_release,
         "caml_final_register_called_without_value"=>
         $caml_final_register_called_without_value,
         "caml_final_register"=>$caml_final_register,
         "caml_get_public_method"=>$caml_get_public_method,
         "caml_array_blit"=>$caml_array_blit,
         "caml_array_concat"=>$caml_array_concat,
         "caml_array_append"=>$caml_array_append,
         "caml_array_sub"=>$caml_array_sub,
         "caml_sys_system_command"=>$caml_sys_system_command,
         "caml_sys_const_ostype_win32"=>$caml_sys_const_ostype_win32,
         "caml_sys_const_ostype_unix"=>$caml_sys_const_ostype_unix,
         "caml_sys_const_ostype_cygwin"=>$caml_sys_const_ostype_cygwin,
         "caml_sys_const_max_wosize"=>$caml_sys_const_max_wosize,
         "caml_sys_const_int_size"=>$caml_sys_const_int_size,
         "caml_sys_const_word_size"=>$caml_sys_const_word_size,
         "caml_sys_const_big_endian"=>$caml_sys_const_big_endian,
         "caml_sys_random_seed"=>$caml_sys_random_seed,
         "caml_sys_const_backend_type"=>$caml_sys_const_backend_type,
         "caml_sys_get_config"=>$caml_sys_get_config,
         "caml_sys_time"=>$caml_sys_time,
         "caml_hash"=>$caml_hash,
         "caml_hash_mix_string"=>$caml_hash_mix_string,
         "caml_hash_mix_string_arr"=>$caml_hash_mix_string_arr,
         "caml_hash_mix_string_str"=>$caml_hash_mix_string_str,
         "caml_hash_mix_int64"=>$caml_hash_mix_int64,
         "caml_hash_mix_float"=>$caml_hash_mix_float,
         "caml_hash_mix_final"=>$caml_hash_mix_final,
         "caml_hash_mix_int"=>$caml_hash_mix_int,
         "caml_hash_univ_param"=>$caml_hash_univ_param,
         "caml_format_float"=>$caml_format_float,
         "caml_format_int"=>$caml_format_int,
         "caml_finish_formatting"=>$caml_finish_formatting,
         "caml_parse_format"=>$caml_parse_format,
         "caml_is_printable"=>$caml_is_printable,
         "caml_float_of_string"=>$caml_float_of_string,
         "parseInt"=>$parseInt,
         "caml_int_of_string"=>$caml_int_of_string,
         "caml_parse_digit"=>$caml_parse_digit,
         "caml_parse_sign_and_base"=>$caml_parse_sign_and_base,
         "caml_lessthan"=>$caml_lessthan,
         "caml_lessequal"=>$caml_lessequal,
         "caml_greaterthan"=>$caml_greaterthan,
         "caml_greaterequal"=>$caml_greaterequal,
         "caml_notequal"=>$caml_notequal,
         "caml_equal"=>$caml_equal,
         "caml_int_compare"=>$caml_int_compare,
         "caml_compare"=>$caml_compare,
         "caml_compare_val"=>$caml_compare_val,
         "caml_floatarray_create"=>$caml_floatarray_create,
         "caml_make_float_vect"=>$caml_make_float_vect,
         "caml_make_vect"=>$caml_make_vect,
         "caml_check_bound"=>$caml_check_bound,
         "caml_array_get"=>$caml_array_get,
         "caml_array_set"=>$caml_array_set,
         "caml_mod"=>$caml_mod,
         "caml_div"=>$caml_div,
         "caml_mul"=>$caml_mul,
         "caml_lazy_make_forward"=>$caml_lazy_make_forward,
         "caml_obj_truncate"=>$caml_obj_truncate,
         "caml_obj_dup"=>$caml_obj_dup,
         "caml_obj_block"=>$caml_obj_block,
         "caml_obj_set_tag"=>$caml_obj_set_tag,
         "caml_obj_tag"=>$caml_obj_tag,
         "caml_obj_is_block"=>$caml_obj_is_block,
         "caml_update_dummy"=>$caml_update_dummy,
         "caml_array_bound_error"=>$caml_array_bound_error,
         "caml_raise_not_found"=>$caml_raise_not_found,
         "caml_raise_zero_divide"=>$caml_raise_zero_divide,
         "caml_raise_end_of_file"=>$caml_raise_end_of_file,
         "caml_invalid_argument"=>$caml_invalid_argument,
         "caml_alloc_dummy_function"=>$caml_alloc_dummy_function,
         "caml_js_error_of_exception"=>$caml_js_error_of_exception,
         "caml_failwith"=>$caml_failwith,
         "caml_raise_sys_error"=>$caml_raise_sys_error,
         "caml_raise_with_string"=>$caml_raise_with_string,
         "caml_raise_with_arg"=>$caml_raise_with_arg,
         "caml_raise_constant"=>$caml_raise_constant,
         "caml_wrap_thrown_exception_traceless"=>
         $caml_wrap_thrown_exception_traceless,
         "caml_wrap_thrown_exception_reraise"=>
         $caml_wrap_thrown_exception_reraise,
         "caml_wrap_thrown_exception"=>$caml_wrap_thrown_exception,
         "caml_wrap_exception"=>$caml_wrap_exception,
         "String"=>$String,
         "caml_return_exn_constant"=>$caml_return_exn_constant,
         "caml_get_global_data"=>$caml_get_global_data,
         "caml_register_global"=>$caml_register_global,
         "caml_global_data"=>$caml_global_data,
         "caml_named_value"=>$caml_named_value,
         "caml_register_named_value"=>$caml_register_named_value,
         "caml_named_values"=>$caml_named_values,
         "caml_call8"=>$caml_call8,
         "caml_call7"=>$caml_call7,
         "caml_call6"=>$caml_call6,
         "caml_call5"=>$caml_call5,
         "caml_call4"=>$caml_call4,
         "caml_call3"=>$caml_call3,
         "caml_call2"=>$caml_call2,
         "caml_call1"=>$caml_call1,
         "caml_call_gen"=>$caml_call_gen,
         "caml_arity_test"=>$caml_arity_test,
         "raw_array_append_one"=>$raw_array_append_one,
         "raw_array_cons"=>$raw_array_cons,
         "raw_array_copy"=>$raw_array_copy,
         "raw_array_sub"=>$raw_array_sub,
         "win_handle_fd"=>$win_handle_fd,
         "win_cleanup"=>$win_cleanup,
         "win_startup"=>$win_startup,
         "unix_mktime"=>$unix_mktime,
         "unix_localtime"=>$unix_localtime,
         "unix_gmtime"=>$unix_gmtime,
         "unix_time"=>$unix_time,
         "unix_gettimeofday"=>$unix_gettimeofday,
         "caml_ba_reshape"=>$caml_ba_reshape,
         "caml_ba_slice"=>$caml_ba_slice,
         "caml_ba_sub"=>$caml_ba_sub,
         "caml_ba_fill"=>$caml_ba_fill,
         "caml_ba_blit"=>$caml_ba_blit,
         "caml_ba_set_3"=>$caml_ba_set_3,
         "caml_ba_set_2"=>$caml_ba_set_2,
         "caml_ba_set_1"=>$caml_ba_set_1,
         "caml_ba_uint8_set64"=>$caml_ba_uint8_set64,
         "caml_ba_uint8_set32"=>$caml_ba_uint8_set32,
         "caml_ba_uint8_set16"=>$caml_ba_uint8_set16,
         "caml_ba_set_generic"=>$caml_ba_set_generic,
         "caml_ba_get_3"=>$caml_ba_get_3,
         "caml_ba_get_2"=>$caml_ba_get_2,
         "caml_ba_get_1"=>$caml_ba_get_1,
         "caml_ba_uint8_get64"=>$caml_ba_uint8_get64,
         "caml_ba_uint8_get32"=>$caml_ba_uint8_get32,
         "caml_ba_uint8_get16"=>$caml_ba_uint8_get16,
         "caml_ba_get_generic"=>$caml_ba_get_generic,
         "caml_ba_dim_3"=>$caml_ba_dim_3,
         "caml_ba_dim_2"=>$caml_ba_dim_2,
         "caml_ba_dim_1"=>$caml_ba_dim_1,
         "caml_ba_dim"=>$caml_ba_dim,
         "caml_ba_num_dims"=>$caml_ba_num_dims,
         "caml_ba_layout"=>$caml_ba_layout,
         "caml_ba_kind"=>$caml_ba_kind,
         "caml_ba_change_layout"=>$caml_ba_change_layout,
         "caml_ba_create"=>$caml_ba_create,
         "caml_ba_create_from"=>$caml_ba_create_from,
         "caml_ba_views"=>$caml_ba_views,
         "caml_ba_get_size"=>$caml_ba_get_size,
         "caml_ba_init_views"=>$caml_ba_init_views,
         "caml_ba_init"=>$caml_ba_init,
         "caml_set_parser_trace"=>$caml_set_parser_trace,
         "caml_parse_engine"=>$caml_parse_engine,
         "caml_new_lex_engine"=>$caml_new_lex_engine,
         "caml_lex_engine"=>$caml_lex_engine,
         "caml_lex_array"=>$caml_lex_array,
         "caml_output_value_to_buffer"=>$caml_output_value_to_buffer,
         "caml_output_value_to_bytes"=>$caml_output_value_to_bytes,
         "caml_output_value_to_string"=>$caml_output_value_to_string,
         "caml_output_val"=>$caml_output_val,
         "caml_marshal_data_size"=>$caml_marshal_data_size,
         "caml_input_value_from_reader"=>$caml_input_value_from_reader,
         "caml_input_value_from_bytes"=>$caml_input_value_from_bytes,
         "caml_input_value_from_string"=>$caml_input_value_from_string,
         "caml_float_of_bytes"=>$caml_float_of_bytes,
         "BigStringReader"=>$BigStringReader,
         "MlBytesReader"=>$MlBytesReader,
         "caml_marshal_constants"=>$caml_marshal_constants,
         "caml_md5_string"=>$caml_md5_string,
         "caml_md5_chan"=>$caml_md5_chan,
         "caml_int64_to_bytes"=>$caml_int64_to_bytes,
         "caml_int64_of_bytes"=>$caml_int64_of_bytes,
         "caml_int64_of_string"=>$caml_int64_of_string,
         "caml_int64_format"=>$caml_int64_format,
         "caml_int64_of_float"=>$caml_int64_of_float,
         "caml_int64_to_float"=>$caml_int64_to_float,
         "caml_int64_to_int32"=>$caml_int64_to_int32,
         "caml_int64_of_int32"=>$caml_int64_of_int32,
         "caml_int64_mod"=>$caml_int64_mod,
         "caml_int64_div"=>$caml_int64_div,
         "caml_int64_udivmod"=>$caml_int64_udivmod,
         "caml_int64_lsr1"=>$caml_int64_lsr1,
         "caml_int64_lsl1"=>$caml_int64_lsl1,
         "caml_int64_shift_right"=>$caml_int64_shift_right,
         "caml_int64_shift_right_unsigned"=>$caml_int64_shift_right_unsigned,
         "caml_int64_shift_left"=>$caml_int64_shift_left,
         "caml_int64_xor"=>$caml_int64_xor,
         "caml_int64_or"=>$caml_int64_or,
         "caml_int64_and"=>$caml_int64_and,
         "caml_int64_is_minus_one"=>$caml_int64_is_minus_one,
         "caml_int64_is_min_int"=>$caml_int64_is_min_int,
         "caml_int64_is_negative"=>$caml_int64_is_negative,
         "caml_int64_is_zero"=>$caml_int64_is_zero,
         "caml_int64_mul"=>$caml_int64_mul,
         "caml_int64_sub"=>$caml_int64_sub,
         "caml_int64_add"=>$caml_int64_add,
         "caml_int64_neg"=>$caml_int64_neg,
         "caml_int64_compare"=>$caml_int64_compare,
         "caml_int64_ult"=>$caml_int64_ult,
         "caml_int64_ucompare"=>$caml_int64_ucompare,
         "caml_int64_offset"=>$caml_int64_offset,
         "caml_tanh_float"=>$caml_tanh_float,
         "caml_sinh_float"=>$caml_sinh_float,
         "caml_cosh_float"=>$caml_cosh_float,
         "caml_log10_float"=>$caml_log10_float,
         "caml_hypot_float"=>$caml_hypot_float,
         "caml_log1p_float"=>$caml_log1p_float,
         "caml_expm1_float"=>$caml_expm1_float,
         "caml_copysign_float"=>$caml_copysign_float,
         "caml_float_compare"=>$caml_float_compare,
         "caml_frexp_float"=>$caml_frexp_float,
         "caml_ldexp_float"=>$caml_ldexp_float,
         "caml_modf_float"=>$caml_modf_float,
         "caml_classify_float"=>$caml_classify_float,
         "caml_int32_float_of_bits"=>$caml_int32_float_of_bits,
         "caml_int64_float_of_bits"=>$caml_int64_float_of_bits,
         "caml_hexstring_of_float"=>$caml_hexstring_of_float,
         "caml_int32_bits_of_float"=>$caml_int32_bits_of_float,
         "caml_int64_bits_of_float"=>$caml_int64_bits_of_float,
         "jsoo_floor_log2"=>$jsoo_floor_log2,
         "caml_bytes_of_string"=>$caml_bytes_of_string,
         "caml_string_of_bytes"=>$caml_string_of_bytes,
         "caml_ml_bytes_length"=>$caml_ml_bytes_length,
         "caml_ml_string_length"=>$caml_ml_string_length,
         "caml_blit_string"=>$caml_blit_string,
         "caml_blit_bytes"=>$caml_blit_bytes,
         "caml_fill_string"=>$caml_fill_string,
         "caml_fill_bytes"=>$caml_fill_bytes,
         "caml_bytes_greaterthan"=>$caml_bytes_greaterthan,
         "caml_string_greaterthan"=>$caml_string_greaterthan,
         "caml_bytes_greaterequal"=>$caml_bytes_greaterequal,
         "caml_string_greaterequal"=>$caml_string_greaterequal,
         "caml_bytes_lessthan"=>$caml_bytes_lessthan,
         "caml_string_lessthan"=>$caml_string_lessthan,
         "caml_bytes_lessequal"=>$caml_bytes_lessequal,
         "caml_string_lessequal"=>$caml_string_lessequal,
         "caml_bytes_notequal"=>$caml_bytes_notequal,
         "caml_string_notequal"=>$caml_string_notequal,
         "caml_bytes_equal"=>$caml_bytes_equal,
         "caml_string_equal"=>$caml_string_equal,
         "caml_bytes_compare"=>$caml_bytes_compare,
         "caml_string_compare"=>$caml_string_compare,
         "caml_string_of_array"=>$caml_string_of_array,
         "caml_new_string"=>$caml_new_string,
         "caml_new_string_impl"=>$caml_new_string_impl,
         "caml_create_bytes"=>$caml_create_bytes,
         "caml_create_string"=>$caml_create_string,
         "caml_js_to_string"=>$caml_js_to_string,
         "caml_jsbytes_of_string"=>$caml_jsbytes_of_string,
         "caml_array_of_string"=>$caml_array_of_string,
         "caml_convert_string_to_array"=>$caml_convert_string_to_array,
         "caml_convert_string_to_bytes"=>$caml_convert_string_to_bytes,
         "MlBytes"=>$MlBytes,
         "caml_bytes_set"=>$caml_bytes_set,
         "caml_string_set64"=>$caml_string_set64,
         "caml_bytes_set64"=>$caml_bytes_set64,
         "caml_string_set32"=>$caml_string_set32,
         "caml_bytes_set32"=>$caml_bytes_set32,
         "caml_string_set16"=>$caml_string_set16,
         "caml_bytes_set16"=>$caml_bytes_set16,
         "caml_string_set"=>$caml_string_set,
         "caml_bytes_get"=>$caml_bytes_get,
         "caml_bytes_get64"=>$caml_bytes_get64,
         "caml_string_get64"=>$caml_string_get64,
         "caml_bytes_get32"=>$caml_bytes_get32,
         "caml_string_get32"=>$caml_string_get32,
         "caml_bytes_get16"=>$caml_bytes_get16,
         "caml_string_get16"=>$caml_string_get16,
         "caml_string_get"=>$caml_string_get,
         "caml_string_bound_error"=>$caml_string_bound_error,
         "caml_string_unsafe_set"=>$caml_string_unsafe_set,
         "caml_bytes_unsafe_set"=>$caml_bytes_unsafe_set,
         "caml_bytes_unsafe_get"=>$caml_bytes_unsafe_get,
         "caml_string_unsafe_get"=>$caml_string_unsafe_get,
         "caml_to_js_string"=>$caml_to_js_string,
         "caml_is_ascii"=>$caml_is_ascii,
         "caml_utf16_of_utf8"=>$caml_utf16_of_utf8,
         "caml_utf8_of_utf16"=>$caml_utf8_of_utf16,
         "caml_subarray_to_string"=>$caml_subarray_to_string,
         "caml_str_repeat"=>$caml_str_repeat]
      );
    
    
    
    $caml_fs_init();
    
    $caml_register_global(
      0,
      Vector{248, $caml_new_string("Out_of_memory"), 0},
      "Out_of_memory"
    );
    
    $caml_register_global(
      1,
      Vector{248, $caml_new_string("Sys_error"), -1},
      "Sys_error"
    );
    
    $caml_register_global(
      2,
      Vector{248, $caml_new_string("Failure"), -2},
      "Failure"
    );
    
    $caml_register_global(
      3,
      Vector{248, $caml_new_string("Invalid_argument"), -3},
      "Invalid_argument"
    );
    
    $caml_register_global(
      4,
      Vector{248, $caml_new_string("End_of_file"), -4},
      "End_of_file"
    );
    
    $caml_register_global(
      5,
      Vector{248, $caml_new_string("Division_by_zero"), -5},
      "Division_by_zero"
    );
    
    $caml_register_global(
      6,
      Vector{248, $caml_new_string("Not_found"), -6},
      "Not_found"
    );
    
    $caml_register_global(
      7,
      Vector{248, $caml_new_string("Match_failure"), -7},
      "Match_failure"
    );
    
    $caml_register_global(
      8,
      Vector{248, $caml_new_string("Stack_overflow"), -8},
      "Stack_overflow"
    );
    
    $caml_register_global(
      9,
      Vector{248, $caml_new_string("Sys_blocked_io"), -9},
      "Sys_blocked_io"
    );
    
    $caml_register_global(
      10,
      Vector{248, $caml_new_string("Assert_failure"), -10},
      "Assert_failure"
    );
    
    $caml_register_global(
      11,
      Vector{248, $caml_new_string("Undefined_recursive_module"), -11},
      "Undefined_recursive_module"
    );

  }
}

