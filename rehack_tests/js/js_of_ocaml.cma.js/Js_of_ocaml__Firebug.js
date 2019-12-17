/**
 * @flow strict
 * Js_of_ocaml__Firebug
 */

// @ts-check


"use strict";
let joo_global_object = typeof global !== 'undefined' ? global : window;
require('runtime.js');

var runtime = joo_global_object.jsoo_runtime;
var console = runtime["caml_js_get_console"](0);
var Js_of_ocaml_Firebug = [0,console];

exports = Js_of_ocaml_Firebug;

/*::type Exports = {
  console: any
}*/
/** @type {{
  console: any,
}} */
module.exports = ((exports /*:: : any*/) /*:: :Exports */);
module.exports.console = module.exports[1];

/* Hashing disabled */
