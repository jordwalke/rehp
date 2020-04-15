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
