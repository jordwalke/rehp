/**
 * @flow strict
 * CamlinternalMod
 */

// @ts-check


"use strict";
let joo_global_object = typeof global !== 'undefined' ? global : window;
require('runtime.js');

var runtime = joo_global_object.jsoo_runtime;
var update_mod = runtime["caml_CamlinternalMod_update_mod"];
var init_mod = runtime["caml_CamlinternalMod_init_mod"];
var CamlinternalMod = [0,init_mod,update_mod];

exports = CamlinternalMod;

/*::type Exports = {
  init_mod: any
  update_mod: any
}*/
/** @type {{
  init_mod: any,
  update_mod: any,
}} */
module.exports = ((exports /*:: : any*/) /*:: :Exports */);
module.exports.init_mod = module.exports[1];
module.exports.update_mod = module.exports[2];

/* Hashing disabled */
