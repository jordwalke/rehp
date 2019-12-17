/**
 * @flow strict
 * MoreLabels
 */

// @ts-check


"use strict";
let joo_global_object = typeof global !== 'undefined' ? global : window;
require('runtime.js');

var runtime = joo_global_object.jsoo_runtime;
var Set = require("Set.js");
var Map = require("Map.js");
var Hashtbl = require("Hashtbl.js");
var MoreLabels = [0,Hashtbl,Map,Set];

exports = MoreLabels;

/*::type Exports = {
  Set: any
  Map: any
  Hashtbl: any
}*/
/** @type {{
  Set: any,
  Map: any,
  Hashtbl: any,
}} */
module.exports = ((exports /*:: : any*/) /*:: :Exports */);
module.exports.Set = module.exports[3];
module.exports.Map = module.exports[2];
module.exports.Hashtbl = module.exports[1];

/* Hashing disabled */
