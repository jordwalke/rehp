external nullable_of_option : 'a => 'b = "caml_js_nullable";

let null = nullable_of_option(None);

external toOption : 'a => option('b) = {|
  raw-macro:
  <@.php>
    <@1/> === null ? 0 : Vector {0, <@1/>}
  </@.php>
  <@.js>
    <@1/> === null ? 0 : [0, <@1/>]
  </@.js>
|};

external duplicateNestedExternCalls: 'a => 'any = {|
  raw-macro:
  <@outerOuter><@outer><@inner><@1/></@inner></@outer></@outerOuter> +
  <@outerOuter><@outer><@inner><@1/></@inner></@outer></@outerOuter>
|};

external callExternWithConvertedToNull: ('a, 'b, 'c, 'd, 'e) => 'any = {|
  raw-macro:
  <@js>
  new Array(
  </@js>
  <@php>
  varray[
  </@php>
    <@outerOuter><@outer><@inner><@1/></@inner></@outer></@outerOuter>
    <@toString><@2/></@toString>,
    <@toNull><@3/></@toNull>,
    <@toNull><@4/></@toNull>
  <@js>
  )
  </@js>
  <@php>
  ]
  </@php>
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
external sideEffectAny : 'any1 => 'any2 = "side_effect_to_inject_into_nested_macros";
external pureExpression : string => 'a = "caml_pure_js_expr";

let nestedsResult = duplicateNestedExternCalls("hi");
let nestedResult2 = duplicateNestedExternCalls(sideEffectAny());
let nestedResult3 = duplicateNestedExternCalls(pureExpression("100"));

let includeMe = () => ();


let trueee = true;
let falseee = false;

external acceptsBools : (bool, bool) => bool = "
  raw-macro:
  <@.php>
    <@fromBool>
    <@raw>SomeClass::hereIsSomeBools(<@toBool><@1/></@toBool>, <@toBool><@2/></@toBool>)</@raw>
    </@fromBool>
  </@.php>
  <@.js>
  <@fromBool><@raw>SomeClass.hereIsSomeBools(<@toBool><@1/></@toBool>, <@toBool><@2/></@toBool>)</@raw></@fromBool>
  </@.js>
";

let boolTest1 = acceptsBools(true, false);
let boolTest2 = acceptsBools(false, true);

external sideEffect : unit => unit = "raw-macro:<@foo><@1/></@foo>";

sideEffect();



/**
 * Test this too:
  <someExtern>
      <@2/>
      <@raw.ifDefinitelySome1>
        <@1/>
      </@raw.ifDefinitelySome1>
  </someExtern>
*/
external xhpDiv : (~className:string=?, ~className2:string=?, list('a)) => option('b) = {|
raw-macro:
  <@.php>
  <div <@raw.ifDefinitelySome1>className={<@toString><@toNull><@2/></@toNull></@toString>}</@raw.ifDefinitelySome1>>
  </div>
  </@.php>
  <@.js>
  <div <@raw.ifDefinitelySome1>className={<@toString><@toNull><@2/></@toNull></@toString>}</@raw.ifDefinitelySome1>>
  </div>
  </@.js>
|};


let myDiv = xhpDiv(~className="one", ~className2="two", []);

/**
 * Test that even though the second arg will get removed, its side effect still
 * takes place.
 */
let myDiv2 = xhpDiv(~className2=sideEffectAny("sideEffectToInlinedArg"), []);

/**
 * Test that the side effect is always performed even though the first arg
 * doesn't actually appear in the output, and is only used to shape the
 * template.
 */
let myDiv3 = xhpDiv(~className=sideEffectAny("sideEffectToArgUsedToTest"), ~className2="hi", []);
