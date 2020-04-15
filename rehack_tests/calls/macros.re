external nullable_of_option : 'a => 'b = "caml_js_nullable";

let null = nullable_of_option(None);

external toOption : 'a => option('b) = {|
  raw-macro:
  <@php>
    <@1/> === null ? 0 : Vector {0, <@1/>}
  <@/php>
  <@js>
    <@1/> === null ? 0 : [0, <@1/>]
  <@/js>
|};

external duplicateNestedExternCalls: 'a => 'any = {|
  raw-macro:
  <@extern.outerOuter><@extern.outer><@extern.inner><@1/></@extern.inner></@extern.outer></@extern.outerOuter> +
  <@extern.outerOuter><@extern.outer><@extern.inner><@1/></@extern.inner></@extern.outer></@extern.outerOuter>
|};

external callExternWithConvertedToNull: ('a, 'b, 'c, 'd, 'e) => 'any = {|
  raw-macro:
  <@js>
  new Array(
  <@/js>
  <@php>
  varray[
  <@/php>
    <@extern.outerOuter><@extern.outer><@extern.inner><@1/></@extern.inner></@extern.outer></@extern.outerOuter>
    <@toString><@2/></@toString>,
    <@toNull><@3/></@toNull>,
    <@toNull><@4/></@toNull>
  <@js>
  )
  <@/js>
  <@php>
  ]
  <@/php>
|};

let inlinesMacros =
  callExternWithConvertedToNull(
    100,
    "convertedToPlatformString",
    None,
    Some("converted to nullable"),
    null,
  );
external something : 'a => unit = "caml_js_anything";

let result = toOption(something("hello"));

/**
 * Makes sure that nesting extern calls that are duplicated get hoisted out, in
 * case they have side effects.
 */
external sideEffect : unit => unit = "side_effect_to_inject_into_nested_macros";
external pureExpression : string => 'a = "caml_pure_js_expr";

let nestedsResult = duplicateNestedExternCalls("hi");
let nestedResult2 = duplicateNestedExternCalls(sideEffect());
let nestedResult3 = duplicateNestedExternCalls(pureExpression("100"));

let includeMe = () => ();


let trueee = true;
let falseee = false;

external acceptsBools : (bool, bool) => bool = "
  raw-macro:
  <@php>
   SomeClass::hereIsSomeBools(<@toBool><@1/></@toBool>, <@toBool><@2/></@toBool>) 
  <@/php>
  <@js>
  SomeClass.hereIsSomeBools(<@toBool><@1/></@toBool>, <@toBool><@2/></@toBool>) 
  <@/js>
";

let boolTest1 = acceptsBools(true, false);
let boolTest2 = acceptsBools(false, true);

external sideEffect : unit => unit = "raw-macro:<@extern.foo><@1/></@extern.foo>";

sideEffect();


external xhpDiv : (string, list('a)) => option('b) = {|
raw-macro:
  <@php>
  <div
    <@ifSome>
      <@1/>
      className={<@1/>}>
    <@/ifSome>
    {<@2/>}
  </div>
  <@/php>
  <@js>
  <div
    className={<@1/>}>
    {<@2/>}
  </div>
  <@/js>
|};


let myDiv = xhpDiv("HelloClass", []);
