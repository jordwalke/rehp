/**
 * @flow strict
 * Calls__Macros
 */

// @ts-check


"use strict";

var runtime = require("../runtime/runtime.js");
var alwaysPulledInDepX = require("../../../../../alwaysPulledInDepX.js");
var alwaysPulledInDepZ = require("../../../../../alwaysPulledInDepZ.js");
var alwaysPulledInDepY = require("alwaysPulledInDepY");
var conditionalDepM = require("conditionalDepM");
var conditionalDepQ = require("conditionalDepQ");
var SomeClass = require("my-project/foo/SomeClass");
var caml_js_is_some = runtime["caml_js_is_some"];
var caml_js_nullable = runtime["caml_js_nullable"];
var string = runtime["caml_new_string"];

function call1(f, a0) {
  return f.length === 1 ? f(a0) : runtime["caml_call_gen"](f, [a0]);
}

var cst_hello = string("hello");
var cst_hi = string("hi");
var cst_Argsideeffect2 = string("Argsideeffect2");
var cst_Argsideeffect1 = string("Argsideeffect1");
var cst_Argsideeffect1__0 = string("Argsideeffect1");
var cst_Argsideeffect1__1 = string("Argsideeffect1");
var cst_Argsideeffect2__0 = string("Argsideeffect2");
var cst_Argsideeffect1__2 = string("Argsideeffect1");
var cst_Argsideeffect1__3 = string("Argsideeffect1");
var cst_Argsideeffect1__4 = string("Argsideeffect1");
var Stdlib = require("Stdlib.js");
var null__0 = null;
var inlinesMacros = new Array(
  runtime["outerOuter"](
  runtime["outer"](runtime["inner"](100))
),
  "convertedToPlatformString",
  null,
  "converted to nullable");
var inlinesMacrosWithSugar = new Array(
  runtime["outerOuter"](
  runtime["outer"](runtime["inner"](100))
),
  "convertedToPlatformString",
  null,
  "converted to nullable");
var a_ = runtime["caml_js_anything"](cst_hello);
var result = a_ === null ? 0 : [0, a_];
var l_ = runtime["outerOuter"](runtime["outer"](runtime["inner"](cst_hi)));
var nestedsResult = l_ +
runtime["outerOuter"](
  runtime["outer"](runtime["inner"](cst_hi))
);
var b_ = runtime["side_effect_to_inject_into_nested_macros"](0);
var m_ = runtime["outerOuter"](runtime["outer"](runtime["inner"](b_)));
var nestedResult2 = m_ +
runtime["outerOuter"](
  runtime["outer"](runtime["inner"](b_))
);
var c_ = 100;
var n_ = runtime["outerOuter"](runtime["outer"](runtime["inner"](c_)));
var nestedResult3 = n_ +
runtime["outerOuter"](
  runtime["outer"](runtime["inner"](c_))
);

function includeMe(param) {return 0;}

var boolTest1 = SomeClass.hereIsSomeBools(! ! 1, ! ! 0) | 0;
var boolTest2 = SomeClass.hereIsSomeBools(! ! 0, ! ! 1) | 0;

(runtime["foo"](0));

var d_ = [0,call1(Stdlib[46], cst_Argsideeffect2)];
var e_ = [0,call1(Stdlib[46], cst_Argsideeffect1)];
var oneTwoSideEffectUngrouped = runtime["somePrimitive"](d_, d_);
var f_ = [0,call1(Stdlib[46], cst_Argsideeffect1__0)];
var oneSideEffectUngrouped = runtime["somePrimitive"](0, 0);
var g_ = [0,call1(Stdlib[46], cst_Argsideeffect1__1)];
var twoSideEffectUngrouped = runtime["somePrimitive"](g_, g_);
var h_ = [0,call1(Stdlib[46], cst_Argsideeffect2__0)];
var i_ = [0,call1(Stdlib[46], cst_Argsideeffect1__2)];
var oneTwoSideEffectCorrect = runtime["somePrimitive"](h_, h_  );
var j_ = [0,call1(Stdlib[46], cst_Argsideeffect1__3)];
var oneSideEffectCorrect = runtime["somePrimitive"](0, 0  );
var k_ = [0,call1(Stdlib[46], cst_Argsideeffect1__4)];
var twoSideEffectCorrect = runtime["somePrimitive"](k_, k_  );
var myStyle = {
  backgroundColor: "blue",color: "black",};
var emptyChildren = </>;
var innerDiv = <div class="ThisIsTheClasName"  style={{
  backgroundColor: "red",}}  >
  {emptyChildren}
</div>;
var myOuterDiv = <div class="OuterDiv"  style={{
  backgroundColor: "red",color: "black",}}  >
  {innerDiv}
</div>;
var trueee = 1;
var falseee = 0;

function createDivWithUnknowns(className, style, param) {
  return (
    <div class={caml_js_nullable(className) === null ? null : caml_js_nullable(
      className
    ).toString()}  style={caml_js_nullable(style)}  >
  {emptyChildren}
</div>
  );
}

var smartLoggingResult = console.log("No dependency pulled in");
var pullsInDep1 = alwaysPulledInDepX(0) +
  alwaysPulledInDepY(1) +
  conditionalDepM()+
  0;
var pullsInDep2 = alwaysPulledInDepY(0) +
  alwaysPulledInDepZ(1) +
  conditionalDepQ()+
  0;
var Calls_Macros = [
  0,
  null__0,
  inlinesMacros,
  inlinesMacrosWithSugar,
  result,
  nestedsResult,
  nestedResult2,
  nestedResult3,
  includeMe,
  trueee,
  falseee,
  boolTest1,
  boolTest2,
  oneTwoSideEffectUngrouped,
  oneSideEffectUngrouped,
  twoSideEffectUngrouped,
  oneTwoSideEffectCorrect,
  oneSideEffectCorrect,
  twoSideEffectCorrect,
  myStyle,
  emptyChildren,
  myOuterDiv,
  createDivWithUnknowns,
  smartLoggingResult,
  pullsInDep1,
  pullsInDep2
];

module.exports = Calls_Macros;

/*::type Exports = {
  _null_: any,
  inlinesMacros: any,
  inlinesMacrosWithSugar: any,
  result: any,
  nestedsResult: any,
  nestedResult2: any,
  nestedResult3: any,
  includeMe: (param: any) => any,
  trueee: any,
  falseee: any,
  boolTest1: any,
  boolTest2: any,
  oneTwoSideEffectUngrouped: any,
  oneSideEffectUngrouped: any,
  twoSideEffectUngrouped: any,
  oneTwoSideEffectCorrect: any,
  oneSideEffectCorrect: any,
  twoSideEffectCorrect: any,
  myStyle: any,
  emptyChildren: any,
  myOuterDiv: any,
  createDivWithUnknowns: (className: any, style: any, param: any) => any,
  smartLoggingResult: any,
  pullsInDep1: any,
  pullsInDep2: any,
}*/
/** @type {{
  _null_: any,
  inlinesMacros: any,
  inlinesMacrosWithSugar: any,
  result: any,
  nestedsResult: any,
  nestedResult2: any,
  nestedResult3: any,
  includeMe: (param: any) => any,
  trueee: any,
  falseee: any,
  boolTest1: any,
  boolTest2: any,
  oneTwoSideEffectUngrouped: any,
  oneSideEffectUngrouped: any,
  twoSideEffectUngrouped: any,
  oneTwoSideEffectCorrect: any,
  oneSideEffectCorrect: any,
  twoSideEffectCorrect: any,
  myStyle: any,
  emptyChildren: any,
  myOuterDiv: any,
  createDivWithUnknowns: (className: any, style: any, param: any) => any,
  smartLoggingResult: any,
  pullsInDep1: any,
  pullsInDep2: any,
}} */
module.exports = ((module.exports /*:: : any*/) /*:: :Exports */);
module.exports._null_ = module.exports[1];
module.exports.inlinesMacros = module.exports[2];
module.exports.inlinesMacrosWithSugar = module.exports[3];
module.exports.result = module.exports[4];
module.exports.nestedsResult = module.exports[5];
module.exports.nestedResult2 = module.exports[6];
module.exports.nestedResult3 = module.exports[7];
module.exports.includeMe = module.exports[8];
module.exports.trueee = module.exports[9];
module.exports.falseee = module.exports[10];
module.exports.boolTest1 = module.exports[11];
module.exports.boolTest2 = module.exports[12];
module.exports.oneTwoSideEffectUngrouped = module.exports[13];
module.exports.oneSideEffectUngrouped = module.exports[14];
module.exports.twoSideEffectUngrouped = module.exports[15];
module.exports.oneTwoSideEffectCorrect = module.exports[16];
module.exports.oneSideEffectCorrect = module.exports[17];
module.exports.twoSideEffectCorrect = module.exports[18];
module.exports.myStyle = module.exports[19];
module.exports.emptyChildren = module.exports[20];
module.exports.myOuterDiv = module.exports[21];
module.exports.createDivWithUnknowns = module.exports[22];
module.exports.smartLoggingResult = module.exports[23];
module.exports.pullsInDep1 = module.exports[24];
module.exports.pullsInDep2 = module.exports[25];

/* Hashing disabled */
