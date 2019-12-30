/**
 * @flow strict
 * CamlinternalMod
 */

// @ts-check


"use strict";

var runtime = require("../runtime/runtime.js");

;

var update_mod = runtime["caml_CamlinternalMod_update_mod"];
var init_mod = runtime["caml_CamlinternalMod_init_mod"];
var CamlinternalMod = [0,init_mod,update_mod];

module.exports = CamlinternalMod;

/*::type Exports = {
  init_mod: any,
  update_mod: any,
}*/
/** @type {{
  init_mod: any,
  update_mod: any,
}} */
module.exports = ((module.exports /*:: : any*/) /*:: :Exports */);
module.exports.init_mod = module.exports[1];
module.exports.update_mod = module.exports[2];

/* Hashing disabled */
