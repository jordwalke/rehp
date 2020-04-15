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
var null__0 = null;
var inlinesMacros = new Array(  runtime["outerOuter"](
  runtime["outer"](runtime["inner"](100))
)  "convertedToPlatformString",
  null,
  string("converted to nullable"));
var a_ = runtime["caml_js_anything"](cst_hello);
var result = a_ === null ? 0 : [0, a_];
var d_ = runtime["outerOuter"](runtime["outer"](runtime["inner"](cst_hi)));
var nestedsResult = d_ +
runtime["outerOuter"](
  runtime["outer"](runtime["inner"](cst_hi))
);
var b_ = runtime["side_effect_to_inject_into_nested_macros"](0);
var e_ = runtime["outerOuter"](runtime["outer"](runtime["inner"](b_)));
var nestedResult2 = e_ +
runtime["outerOuter"](
  runtime["outer"](runtime["inner"](b_))
);
var c_ = 100;
var f_ = runtime["outerOuter"](runtime["outer"](runtime["inner"](c_)));
var nestedResult3 = f_ +
runtime["outerOuter"](
  runtime["outer"](runtime["inner"](c_))
);

function includeMe(param) {return 0;}

var Calls_Macros = [
  0,
  null__0,
  inlinesMacros,
  result,
  nestedsResult,
  nestedResult2,
  nestedResult3,
  includeMe
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
}*/
/** @type {{
  _null_: any,
  inlinesMacros: any,
  result: any,
  nestedsResult: any,
  nestedResult2: any,
  nestedResult3: any,
  includeMe: (param: any) => any,
}} */
module.exports = ((module.exports /*:: : any*/) /*:: :Exports */);
module.exports._null_ = module.exports[1];
module.exports.inlinesMacros = module.exports[2];
module.exports.result = module.exports[3];
module.exports.nestedsResult = module.exports[4];
module.exports.nestedResult2 = module.exports[5];
module.exports.nestedResult3 = module.exports[6];
module.exports.includeMe = module.exports[7];

/* Hashing disabled */
