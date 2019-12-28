/**
 * @flow strict
 * MoreLabels
 */

// @ts-check


"use strict";

var runtime = require("../runtime/runtime.js");

;

var Set = require("./Set.js");
var Map = require("./Map.js");
var Hashtbl = require("./Hashtbl.js");
var MoreLabels = [0,Hashtbl,Map,Set];

exports = MoreLabels;

/*::type Exports = {
  Hashtbl: any,
  Map: any,
  Set: any,
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
