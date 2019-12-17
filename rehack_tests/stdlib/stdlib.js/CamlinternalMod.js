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
  update_mod: any
  init_mod: any
}*/
/** @type {{
  update_mod: any,
  init_mod: any,
}} */
module.exports = ((exports /*:: : any*/) /*:: :Exports */);
module.exports.update_mod = module.exports[2];
module.exports.init_mod = module.exports[1];

/* Hashing disabled */
