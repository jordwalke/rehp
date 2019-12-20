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
  Hashtbl: any
  Map: any
  Set: any
}*/
/** @type {{
  Hashtbl: any,
  Map: any,
  Set: any,
}} */
module.exports = ((exports /*:: : any*/) /*:: :Exports */);
module.exports.Hashtbl = module.exports[1];
module.exports.Map = module.exports[2];
module.exports.Set = module.exports[3];

/* Hashing disabled */
