<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class Calls__Macros {
  <<__Override, __Memoize>>
  public static function get() : Vector<dynamic> {
    
    $runtime = (\Rehack\GlobalObject::get() as dynamic)->jsoo_runtime;
    $string = $runtime["caml_new_string"];
    $cst_hello = $string("hello");
    $cst_hi = $string("hi");
    $null__0 = null;
    $inlinesMacros = varray[  $runtime["outerOuter"](
      $runtime["outer"]($runtime["inner"](100))
    )  "convertedToPlatformString",
  null,
  $string("converted to nullable")];
    $a_ = $runtime["caml_js_anything"]($cst_hello);
    $result = $a_ === null ? 0 : Vector {0, $a_};
    $d_ = $runtime["outerOuter"](
      $runtime["outer"]($runtime["inner"]($cst_hi))
    );
    $nestedsResult = $d_ +
$runtime["outerOuter"](
      $runtime["outer"]($runtime["inner"]($cst_hi))
    );
    $b_ = $runtime["side_effect_to_inject_into_nested_macros"](0);
    $e_ = $runtime["outerOuter"]($runtime["outer"]($runtime["inner"]($b_)));
    $nestedResult2 = $e_ +
$runtime["outerOuter"](
      $runtime["outer"]($runtime["inner"]($b_))
    );
    $c_ = 100;
    $f_ = $runtime["outerOuter"]($runtime["outer"]($runtime["inner"]($c_)));
    $nestedResult3 = $f_ +
$runtime["outerOuter"](
      $runtime["outer"]($runtime["inner"]($c_))
    );
    $includeMe = (dynamic $param) : dynamic ==> {return 0;};
    $Calls_Macros = Vector{
      0,
      $null__0,
      $inlinesMacros,
      $result,
      $nestedsResult,
      $nestedResult2,
      $nestedResult3,
      $includeMe
    } as dynamic;
    
    return($Calls_Macros);

  }
  public static function includeMe(dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 7, $param);
  }

}
/* Hashing disabled */
