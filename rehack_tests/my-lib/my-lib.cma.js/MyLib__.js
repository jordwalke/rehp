/**
 * @flow strict
 * MyLib__
 */

// @ts-check


"use strict";
let joo_global_object = typeof global !== 'undefined' ? global : window;
require('runtime.js');

var runtime = joo_global_object.jsoo_runtime;
var MyLib = [0,0];

exports = MyLib;

/*::type Exports = {
  MyLibUtility: any
}*/
/** @type {{
  MyLibUtility: any,
}} */
module.exports = ((exports /*:: : any*/) /*:: :Exports */);
module.exports.MyLibUtility = module.exports[1];

/*____hashes compiler: 6d834f124 flags: 404119557 bytecode: 3970371514 debug-data: 1818446335 primitives: 1058613066*/
