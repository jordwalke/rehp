<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class Has_one_underscore {
  <<__Override, __Memoize>>
  public static function get() : Vector<dynamic> {
    
    $runtime = (\Rehack\GlobalObject::get() as dynamic)->jsoo_runtime;
    $call2 = $runtime["caml_call2"];
    $call3 = $runtime["caml_call3"];
    $caml_wrap_thrown_exception_reraise = $runtime[
       "caml_wrap_thrown_exception_reraise"
     ];
    $Stdlib_string = Stdlib__string::get();
    $Stdlib = Stdlib::get();
    $hasOneUnderscore = (dynamic $id_or_token) : dynamic ==> {
      $id_or_token__0 = $runtime["caml_js_to_string"]($id_or_token);
      try {$d_ = $call2($Stdlib_string[14], $id_or_token__0, 95);$index = $d_;
      }
      catch(\Throwable $e_) {
        $e_ = $runtime["caml_wrap_exception"]($e_);
        if ($e_ !== $Stdlib[8]) {
          throw $caml_wrap_thrown_exception_reraise($e_) as \Throwable;
        }
        $a_ = -1 as dynamic;
        $index = $a_;
      }
      $b_ = -1 < $index ? 1 : (0);
      $c_ = $b_
        ? 1 -
         $call3($Stdlib_string[23], $id_or_token__0, (int) ($index + 1), 95)
        : ($b_);
      return $c_;
    };
    $Has_one_underscore = Vector{0, $hasOneUnderscore} as dynamic;
    
    return($Has_one_underscore);

  }
  public static function hasOneUnderscore(dynamic $id_or_token): dynamic {
    return static::syncCall(__FUNCTION__, 1, $id_or_token);
  }

}
/* Hashing disabled */
