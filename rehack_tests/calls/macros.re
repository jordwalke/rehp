external nullable_of_option : 'a => 'b = "caml_js_nullable";

let null = nullable_of_option(None);

external toOption : 'a => option('b) = {|
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
  <@.js>
  new Array(
    <@outerOuter><@outer><@inner><@1/></@inner></@outer></@outerOuter>,
    <@toString><@2/></@toString>,
    <@toNull><@3/></@toNull>,
    <@toString><@toNull><@4/></@toNull></@toString>
  )
  </@.js>
  <@.php>
  varray[
    <@outerOuter><@outer><@inner><@1/></@inner></@outer></@outerOuter>,
    <@toString><@2/></@toString>,
    <@toNull><@3/></@toNull>,
    <@toString><@toNull><@4/></@toNull></@toString>
  ]
  </@.php>
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

external acceptsBools : (bool, bool) => bool = {|
  <@.php>
    <@fromBool><@>SomeClass::hereIsSomeBools(<@toBool><@1/></@toBool>, <@toBool><@2/></@toBool>)</@></@fromBool>
  </@.php>
  <@.js>
    <@fromBool><@><@require>my-project/foo/SomeClass</@require>.hereIsSomeBools(<@toBool><@1/></@toBool>, <@toBool><@2/></@toBool>)</@></@fromBool>
  </@.js>
|};

let boolTest1 = acceptsBools(true, false);
let boolTest2 = acceptsBools(false, true);

external sideEffect : unit => unit = "raw-macro:<@foo><@1/></@foo>";

sideEffect();



/**
 * Test this too:
  <somePrimitive>
      <@2/somePrimitive
      <@if.1.known.some>
        <@1/>
      <@/if.1.known.some>
  </somePrimitive>
*/


/**
 * Ideally, we could just omit the <@>
 */
external ungroupedConditionalsNotCountedAsOneArg : ('a, 'b) => 'c = {|
raw-macro:
  <@somePrimitive>
    <@2/>
    <@?>
      <@isSome><@1/></@isSome>
      <@true><@toNull><@1/><@/toNull><@/true>
      <@false><@2/><@/false>
      <@unknown><@2/></@unknown>
    </@?>
  </@somePrimitive>
|};

external correctConditionalsCountedAsOneArg : ('a, 'b) => 'c = {|
raw-macro:
  <@somePrimitive>
    <@2/>
    <@>
      <@?>
        <@isSome><@1/></@isSome>
        <@true><@toNull><@1/><@/toNull><@/true>
        <@false><@2/><@/false>
        <@unknown><@2/><@/unknown>
      <@/?>
    </@>
  </@somePrimitive>
|};


let oneTwoSideEffectUngrouped =
  ungroupedConditionalsNotCountedAsOneArg(
    Some(print_endline("Argsideeffect1")),
    Some(print_endline("Argsideeffect2")),
  );

let oneSideEffectUngrouped =
  ungroupedConditionalsNotCountedAsOneArg(
    Some(print_endline("Argsideeffect1")),
    (),
  );

let twoSideEffectUngrouped =
  ungroupedConditionalsNotCountedAsOneArg(
    (),
    Some(print_endline("Argsideeffect1")),
  );

let oneTwoSideEffectCorrect =
  correctConditionalsCountedAsOneArg(
    Some(print_endline("Argsideeffect1")),
    Some(print_endline("Argsideeffect2")),
  );

let oneSideEffectCorrect =
  correctConditionalsCountedAsOneArg(
    Some(print_endline("Argsideeffect1")),
    (),
  );

let twoSideEffectCorrect =
  correctConditionalsCountedAsOneArg(
    (),
    Some(print_endline("Argsideeffect1")),
  );

/**
 * TODO: Test invalid:
 *
 * <@2.toNull.toString>anythinghere</@2.toNull.toString>
 * <@.toNull.toString><@more/><@than/><@one/></@toNull.toString>
 */
type style;
external style: (~backgroundColor:string=?, ~color:string=?, unit) => style = {|
  <@.js>{
    <@?>
      <@isSome><@1/></@isSome>
      <@true>backgroundColor: <@toString><@toNull><@1/><@/toNull></@toString>,</@true>
      <@false></@false>
      <@unknown>backgroundColor: <@toNull><@1/><@/toNull> === null ? null : <@toString><@1/><@/toString>,</@unknown>
    </@?><@?>
      <@isSome><@2/></@isSome>
      <@true>color: <@toString><@toNull><@2/><@/toNull></@toString>,</@true>
      <@false></@false>
      <@unknown>color: <@toNull><@2/><@/toNull> === null ? null : <@toString><@2/><@/toString>,</@unknown>
  </@?>}</@.js>
  <@.php>{<@?>
      <@isSome><@1/></@isSome>
      <@true>backgroundColor: <@toString><@toNull><@1/><@/toNull></@toString>,</@true>
      <@false></@false>
      <@unknown>backgroundColor: <@toNull><@1/><@/toNull> === null ? null : <@toString><@1/><@/toString>,</@unknown>
    </@?><@?>
      <@isSome><@2/></@isSome>
      <@true>color: <@toString><@toNull><@2/><@/toNull></@toString>,</@true>
      <@false></@false>
      <@unknown>color: <@toNull><@2/><@/toNull> === null ? null : <@toString><@toNull><@2/></@toNull><@/toString>,</@unknown>
  </@?>}</@.php>
|};

let myStyle = style(~backgroundColor="blue", ~color="black", ());

type xhp;

/**
 * Ideally we would have a lot more sugar.
 */
external div: (~className:string=?, ~style:style=?, ~children:string=?, unit) => xhp = {|
<@.js>
  <div <@?>
    <@isSome><@1/></@isSome>
    <@true>class=<@1.toNull.toString/></@true>
    <@false/>
    <@unknown>class={<@1.toNull.toString/>}</@unknown>
    <@isSome><@2/></@isSome>
    <@true>style={<@2.toNull/>}</@true>
    <@false/>
    <@unknown>style={<@2.toNull/>}</@unknown>
    <@isSome><@3/></@isSome>
    <@true>>{<@3.toNull.toString/>} </div> </@true>
    <@false>/></@false>
    <@unknown>>{<@3.toNull.toString/>}</div></@unknown>
  </@?>
</@.js>
|};

/**
 * And ideally we would have sub-macro embedding with `.toRaw`.
 */
external dom: (~tag:string, ~className:string=?, ~style:style=?, ~children:string=?, unit) => xhp = {|
<@.js>
  <<@1.toRaw/> <@?>
    <@isSome><@2/></@isSome>
    <@true>class=<@2.toNull.toString/></@true>
    <@false/>
    <@unknown>class={<@2.toNull.toString/>}</@unknown>
    <@isSome><@3/></@isSome>
    <@true>style={<@3.toNull/>}</@true>
    <@false/>
    <@unknown>style={<@3.toNull/>}</@unknown>
    <@isSome><@4/></@isSome>
    <@true>>{<@4.toNull.toString/>} </div> </@true>
    <@false>/></@false>
    <@unknown>>{<@4.toNull.toString/>}</div></@unknown>
  </@?>
</@.js>
|};

external div: (~className:string=?, ~style:style=?, ~children:string=?, unit) => xhp = {|
  dom(div)
|};

external emptyXhp : unit => xhp = {|
<@.js></>
</@.js>
<@.php></>
</@.php>
|};

let emptyChildren = emptyXhp();


/**
 * Testing xhp.
 */
external div: (~className:string=?, ~style:style=?, ~children:xhp=?, unit) => xhp = {|
<@.js>
  <div <@?>
    <@isSome><@1/></@isSome>
    <@true>class=<@toString><@toNull><@1/><@/toNull></@toString></@true>
    <@false/>
    <@unknown>class={<@toNull><@1/><@/toNull> === null ? null : <@toString><@toNull><@1/><@/toNull></@toString>}</@unknown>
  </@?>
  <@?>
    <@isSome><@2/></@isSome>
    <@true>style={<@toNull><@2/><@/toNull>}</@true>
    <@false/>
    <@unknown>style={<@toNull><@2/><@/toNull>}</@unknown></@?>
  <@?>
    <@isSome><@3/></@isSome>
    <@true>>
    {<@toNull><@3/></@toNull>}
    </div>
  </@true>
  <@false>/></@false>
  <@unknown>>
    {<@toNull><@3/></@toNull>}
  </div></@unknown>
  </@?>
</@.js>
<@.php>
  <div <@?><@isSome><@1/></@isSome>
    <@true>class=<@toString><@toNull><@1/><@/toNull></@toString></@true>
    <@false/>
    <@unknown>class={<@toNull><@1/><@/toNull> === null ? null : <@toString><@toNull><@1/><@/toNull></@toString>}</@unknown>
  </@?>
  <@?><@isSome><@2/></@isSome>
    <@true>style={<@toNull><@2/><@/toNull>}</@true>
    <@false/>
    <@unknown>style={<@toNull><@2/><@/toNull>}</@unknown></@?>
  <@?><@isSome><@3/></@isSome>
  <@true>>
    {<@toNull><@3/></@toNull>}
  </div>
  </@true>
  <@false>/></@false>
  <@unknown>>
    {<@toNull><@3/></@toNull>}
  </div></@unknown>
  </@?>
</@.php>
|};


let myOuterDiv = {
  let innerDiv =
    <div className="ThisIsTheClasName" style=style(~backgroundColor="red", ())>
    ...emptyChildren
    </div>;
  <div className="OuterDiv" style=style(~backgroundColor="red", ~color="black", ())>
  ...innerDiv
  </div>;
};

let createDivWithUnknowns = (~className=?, ~style=?, ()) => {
  <div ?className ?style>...emptyChildren</div>
};

external _INVALID_relativeRequire : (unit) => unit = {|
  <@.js>
    <@require>./relative/module.js</@require>(0)
  </@.js>
  <@.php>
    RelativeModule::callSomeFunction(0)
  </@.php>
|};


/**
 * `alwaysPulledInDepX` is always pulled in by `conditionallyPullsDepA`
 * `alwaysPulledInDepY` is always pulled in by `conditionallyPullsDepA`.
 * `conditionalDepM` is conditionally pulled in by `conditionallyPullsDepA`.
 * `conditionalDepN` is conditionally pulled in by `conditionallyPullsDepA`.
 */
external conditionallyPullsDepA : (bool) => unit = {|
  <@.js>
    <@require><@projectRoot/>/alwaysPulledInDepX.js</@require>(0) +
      <@require>"alwaysPulledInDepY"</@require>(1) +
      <@?>
      <@1/>
      <@true><@require>"conditionalDepM"</@require>()</@true>
      <@false>0</@false>
      <@unknown><@require>"conditionalDepM"</@require>(/*unknown*/)</@unknown>
      </@?>+
      <@?>
      <@1/>
      <@true>0</@true>
      <@false><@require>"conditionalDepN"</@require>()</@false>
      <@unknown><@require>"conditionalDepN"</@require>(/*unknown*/)</@unknown>
      </@?>
  </@.js>
  <@.php>
  "Test Doesn't apply to Php"
  </@.php>
|};


/**
 * `alwaysPulledInDepY` is always pulled in by `conditionallyPullsDepB`
 * `alwaysPulledInDepZ` is always pulled in by `conditionallyPullsDepB`.
 * `conditionalDepQ` is conditionally pulled in by `conditionallyPullsDepB`.
 * `conditionalDepR` is conditionally pulled in by `conditionallyPullsDepB`.
 */
external conditionallyPullsDepB : (bool) => unit = {|
  <@.js>
    <@require>alwaysPulledInDepY</@require>(0) +
      <@require><@projectRoot/>alwaysPulledInDepZ.js</@require>(1) +
      <@?>
      <@1/>
      <@true><@require>"conditionalDepQ"</@require>()</@true>
      <@false>0</@false>
      <@unknown><@require>"conditionalDepQ"</@require>(/*unknown*/)</@unknown>
      </@?>+
      <@?>
      <@1/>
      <@true>0</@true>
      <@false><@require>"conditionalDepR"</@require>()</@false>
      <@unknown><@require>"conditionalDepR"</@require>(/*unknown*/)</@unknown>
      </@?>
  </@.js>
  <@.php>
  "Test Doesn't apply to Php"
  </@.php>
|};

/* Should pull in `alwaysPulledInDepX`, `alwaysPulledInDepY`, and `conditionalDepM` */
let pullsInDep1 = conditionallyPullsDepA(true);
/* Should pull in `alwaysPulledInDepY`, `alwaysPulledInDepZ`, and
 * `conditionalDepQ`.  Has overlap in the "always" pulled in deps, and
 * shouldn't cause any funny behavior in that case. They should always be
 * hoisted.  */

let pullsInDep2 = conditionallyPullsDepB(true);
