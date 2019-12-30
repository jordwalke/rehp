/**
 * @flow strict
 * StringHelper
 */

// @ts-check


"use strict";

var runtime = require("../runtime/runtime.js");
var helperVal = runtime["caml_new_string"]("hello");
var StringHelper = [0,helperVal];

module.exports = StringHelper;

/*::type Exports = {
  helperVal: any,
}*/
/** @type {{
  helperVal: any,
}} */
module.exports = ((module.exports /*:: : any*/) /*:: :Exports */);
module.exports.helperVal = module.exports[1];

/* Hashing disabled */
