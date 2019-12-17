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

/* Hashing disabled */
