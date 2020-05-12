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
    $call1 = $runtime["caml_call1"];
    $caml_js_is_some = $runtime["caml_js_is_some"];
    $caml_js_nullable = $runtime["caml_js_nullable"];
    $string = $runtime["caml_new_string"];
    $cst_hello = $string("hello");
    $cst_hi = $string("hi");
    $cst_Argsideeffect2 = $string("Argsideeffect2");
    $cst_Argsideeffect1 = $string("Argsideeffect1");
    $cst_Argsideeffect1__0 = $string("Argsideeffect1");
    $cst_Argsideeffect1__1 = $string("Argsideeffect1");
    $cst_Argsideeffect2__0 = $string("Argsideeffect2");
    $cst_Argsideeffect1__2 = $string("Argsideeffect1");
    $cst_Argsideeffect1__3 = $string("Argsideeffect1");
    $cst_Argsideeffect1__4 = $string("Argsideeffect1");
    $Stdlib = Stdlib::get();
    $null__0 = null;
    $inlinesMacros = varray[
  $runtime["outerOuter"](
      $runtime["outer"]($runtime["inner"](100))
    ),
  "convertedToPlatformString",
  null,
  "converted to nullable"];
    $inlinesMacrosWithSugar = varray[
  $runtime["outerOuter"](
      $runtime["outer"]($runtime["inner"](100))
    ),
  "convertedToPlatformString",
  null,
  "converted to nullable"];
    $a_ = $runtime["caml_js_anything"]($cst_hello);
    $result = $a_ === null ? 0 : Vector {0, $a_};
    $l_ = $runtime["outerOuter"](
      $runtime["outer"]($runtime["inner"]($cst_hi))
    );
    $nestedsResult = $l_ +
$runtime["outerOuter"](
      $runtime["outer"]($runtime["inner"]($cst_hi))
    );
    $b_ = $runtime["side_effect_to_inject_into_nested_macros"](0);
    $m_ = $runtime["outerOuter"]($runtime["outer"]($runtime["inner"]($b_)));
    $nestedResult2 = $m_ +
$runtime["outerOuter"](
      $runtime["outer"]($runtime["inner"]($b_))
    );
    $c_ = 100;
    $n_ = $runtime["outerOuter"]($runtime["outer"]($runtime["inner"]($c_)));
    $nestedResult3 = $n_ +
$runtime["outerOuter"](
      $runtime["outer"]($runtime["inner"]($c_))
    );
    $includeMe = (dynamic $param) : dynamic ==> {return 0;};
    $boolTest1 = (int) SomeClass::hereIsSomeBools(! ! 1, ! ! 0);
    $boolTest2 = (int) SomeClass::hereIsSomeBools(! ! 0, ! ! 1);
    
    ($runtime["foo"](0));
    
    $d_ = Vector{0, $call1($Stdlib[46], $cst_Argsideeffect2)} as dynamic;
    $e_ = Vector{0, $call1($Stdlib[46], $cst_Argsideeffect1)} as dynamic;
    $oneTwoSideEffectUngrouped = $runtime["somePrimitive"]($d_, $d_);
    $f_ = Vector{0, $call1($Stdlib[46], $cst_Argsideeffect1__0)} as dynamic;
    $oneSideEffectUngrouped = $runtime["somePrimitive"](0, 0);
    $g_ = Vector{0, $call1($Stdlib[46], $cst_Argsideeffect1__1)} as dynamic;
    $twoSideEffectUngrouped = $runtime["somePrimitive"]($g_, $g_);
    $h_ = Vector{0, $call1($Stdlib[46], $cst_Argsideeffect2__0)} as dynamic;
    $i_ = Vector{0, $call1($Stdlib[46], $cst_Argsideeffect1__2)} as dynamic;
    $oneTwoSideEffectCorrect = $runtime["somePrimitive"]($h_, $h_  );
    $j_ = Vector{0, $call1($Stdlib[46], $cst_Argsideeffect1__3)} as dynamic;
    $oneSideEffectCorrect = $runtime["somePrimitive"](0, 0  );
    $k_ = Vector{0, $call1($Stdlib[46], $cst_Argsideeffect1__4)} as dynamic;
    $twoSideEffectCorrect = $runtime["somePrimitive"]($k_, $k_  );
    $myStyle = {backgroundColor: "blue",color: "black",};
    $emptyChildren = </>;
    $innerDiv = <div class="ThisIsTheClasName"  style={{backgroundColor: "red",}}  >
  {$emptyChildren}
</div>;
    $myOuterDiv = <div class="OuterDiv"  style={{backgroundColor: "red",color: "black",}}  >
  {$innerDiv}
</div>;
    $trueee = 1 as dynamic;
    $falseee = 0 as dynamic;
    $createDivWithUnknowns = 
    (dynamic $className, dynamic $style, dynamic $param) : dynamic ==> {
      return (
        <div class={$caml_js_nullable($className) === null ? null : $caml_js_nullable(
          $className
        )->toString()}  style={$caml_js_nullable(
          $style
        )}  >
  {$emptyChildren}
</div>
      );
    };
    $smartLoggingResult = "Test not applicable to PHP";
    $pullsInDep1 = "Test Doesn't apply to Php";
    $pullsInDep2 = "Test Doesn't apply to Php";
    $Calls_Macros = Vector{
      0,
      $null__0,
      $inlinesMacros,
      $inlinesMacrosWithSugar,
      $result,
      $nestedsResult,
      $nestedResult2,
      $nestedResult3,
      $includeMe,
      $trueee,
      $falseee,
      $boolTest1,
      $boolTest2,
      $oneTwoSideEffectUngrouped,
      $oneSideEffectUngrouped,
      $twoSideEffectUngrouped,
      $oneTwoSideEffectCorrect,
      $oneSideEffectCorrect,
      $twoSideEffectCorrect,
      $myStyle,
      $emptyChildren,
      $myOuterDiv,
      $createDivWithUnknowns,
      $smartLoggingResult,
      $pullsInDep1,
      $pullsInDep2
    } as dynamic;
    
    return($Calls_Macros);

  }
  public static function includeMe(dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 8, $param);
  }
  public static function createDivWithUnknowns(dynamic $className, dynamic $style, dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 22, $className, $style, $param);
  }

}
/* Hashing disabled */
