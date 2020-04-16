/**
 * @flow strict
 * Calls__Macros
 */

// @ts-check


"use strict";

var runtime = require("../runtime/runtime.js");
var string = runtime["caml_new_string"];
var cst_hello = string("hello");
var cst_hi = string("hi");
var cst_HelloClass = string("HelloClass");
var null__0 = null;
var inlinesMacros = new Array(  runtime["outerOuter"](
  runtime["outer"](runtime["inner"](100))
)  "convertedToPlatformString",
  null,
  string("converted to nullable"));
var a_ = runtime["caml_js_anything"](cst_hello);
var result = a_ === null ? 0 : [0, a_];
var e_ = runtime["outer"](runtime["inner"](cst_hi));
var d_ = runtime["outerOuter"](runtime["outer"](runtime["inner"](cst_hi)));
var nestedsResult = d_ +
runtime["outerOuter"](e_);
var b_ = runtime["side_effect_to_inject_into_nested_macros"](0);
var g_ = runtime["outer"](runtime["inner"](b_));
var f_ = runtime["outerOuter"](runtime["outer"](runtime["inner"](b_)));
var nestedResult2 = f_ +
runtime["outerOuter"](g_);
var c_ = 100;
var i_ = runtime["outer"](runtime["inner"](c_));
var h_ = runtime["outerOuter"](runtime["outer"](runtime["inner"](c_)));
var nestedResult3 = h_ +
runtime["outerOuter"](i_);

function includeMe(param) {return 0;}

var boolTest1 = SomeClass.hereIsSomeBools(! ! 1, ! ! 0) | 0;
var boolTest2 = SomeClass.hereIsSomeBools(! ! 0, ! ! 1) | 0;

(runtime["foo"](0));

var myDiv = <div
  className={cst_HelloClass}>
  {0}
</div>;
var Calls_Macros = [
  0,
  null__0,
  inlinesMacros,
  result,
  nestedsResult,
  nestedResult2,
  nestedResult3,
  includeMe,
  1,
  0,
  boolTest1,
  boolTest2,
  myDiv
];

module.exports = Calls_Macros;

/*::type Exports = {
  _null_: any,
  inlinesMacros: any,
  result: any,
  nestedsResult: any,
  nestedResult2: any,
  nestedResult3: any,
  includeMe: (param: any) => any,
  trueee: any,
  falseee: any,
  boolTest1: any,
  boolTest2: any,
  myDiv: any,
}*/
/** @type {{
  _null_: any,
  inlinesMacros: any,
  result: any,
  nestedsResult: any,
  nestedResult2: any,
  nestedResult3: any,
  includeMe: (param: any) => any,
  trueee: any,
  falseee: any,
  boolTest1: any,
  boolTest2: any,
  myDiv: any,
}} */
module.exports = ((module.exports /*:: : any*/) /*:: :Exports */);
module.exports._null_ = module.exports[1];
module.exports.inlinesMacros = module.exports[2];
module.exports.result = module.exports[3];
module.exports.nestedsResult = module.exports[4];
module.exports.nestedResult2 = module.exports[5];
module.exports.nestedResult3 = module.exports[6];
module.exports.includeMe = module.exports[7];
module.exports.trueee = module.exports[8];
module.exports.falseee = module.exports[9];
module.exports.boolTest1 = module.exports[10];
module.exports.boolTest2 = module.exports[11];
module.exports.myDiv = module.exports[12];

/* Hashing disabled */
