/**
 * @flow strict
 * StdLabels
 */

// @ts-check


"use strict";
let joo_global_object = typeof global !== 'undefined' ? global : window;
require('runtime.js');

var runtime = joo_global_object.jsoo_runtime;
var StdLabels = [0,0,0,0,0];

exports = StdLabels;

/*::type Exports = {
  Array: any
  Bytes: any
  List: any
  String: any
}*/
/** @type {{
  Array: any,
  Bytes: any,
  List: any,
  String: any,
}} */
module.exports = ((exports /*:: : any*/) /*:: :Exports */);
module.exports.Array = module.exports[1];
module.exports.Bytes = module.exports[2];
module.exports.List = module.exports[3];
module.exports.String = module.exports[4];

/* Hashing disabled */
