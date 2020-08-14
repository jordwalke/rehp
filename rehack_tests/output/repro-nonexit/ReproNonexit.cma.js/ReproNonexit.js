/**
 * @flow strict
 * ReproNonexit
 */

// @ts-check


"use strict";

var runtime = require("../../runtime/runtime.js");

function call1(f, a0) {
  return f.length === 1 ? f(a0) : runtime["caml_call_gen"](f, [a0]);
}

var Stdlib = require("../../stdlib.cma.js/Stdlib.js");
var sum = [0,0];
var i = 0;

for (; ; ) {
  sum[1] = sum[1] + 1 | 0;
  var b_ = i + 1 | 0;
  if (999 !== i) {var i = b_;continue;}
  var a_ = call1(Stdlib[33], sum[1]);
  var res = call1(Stdlib[46], a_);
  var ReproNonexit = [0,res];
  module.exports = ReproNonexit;
}

/*::type Exports = {
  res: any,
}*/
/** @type {{
  res: any,
}} */
module.exports = ((module.exports /*:: : any*/) /*:: :Exports */);
module.exports.res = module.exports[1];

/* Hashing disabled */
