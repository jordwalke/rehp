/**
 * @flow strict
 * StdLabels
 */

// @ts-check


"use strict";

var runtime = require("../runtime/runtime.js");

;

var StdLabels = [0,0,0,0,0];

module.exports = StdLabels;

/*::type Exports = {
  Array: any,
  Bytes: any,
  List: any,
  String: any,
}*/
/** @type {{
  Array: any,
  Bytes: any,
  List: any,
  String: any,
}} */
module.exports = ((module.exports /*:: : any*/) /*:: :Exports */);
module.exports.Array = module.exports[1];
module.exports.Bytes = module.exports[2];
module.exports.List = module.exports[3];
module.exports.String = module.exports[4];

/* Hashing disabled */
