/**
 * @flow strict
 * Stdlib__moreLabels
 */

// @ts-check


"use strict";

var runtime = require("../runtime/runtime.js");
var Stdlib_set = require("./Stdlib__set.js");
var Stdlib_map = require("./Stdlib__map.js");
var Stdlib_hashtbl = require("./Stdlib__hashtbl.js");
var Stdlib_moreLabels = [0,Stdlib_hashtbl,Stdlib_map,Stdlib_set];

module.exports = Stdlib_moreLabels;

/*::type Exports = {
  Stdlib_hashtbl: any,
  Stdlib_map: any,
  Stdlib_set: any,
}*/
/** @type {{
  Stdlib_hashtbl: any,
  Stdlib_map: any,
  Stdlib_set: any,
}} */
module.exports = ((module.exports /*:: : any*/) /*:: :Exports */);
module.exports.Stdlib_hashtbl = module.exports[1];
module.exports.Stdlib_map = module.exports[2];
module.exports.Stdlib_set = module.exports[3];

/* Hashing disabled */
