/**
 * @flow strict
 * Js_of_ocaml__Firebug
 */

// @ts-check


"use strict";

var runtime = require("../runtime/runtime.js");
var console = runtime["caml_js_get_console"](0);
var Js_of_ocaml_Firebug = [0,console];

module.exports = Js_of_ocaml_Firebug;

/*::type Exports = {
  console: any,
}*/
/** @type {{
  console: any,
}} */
module.exports = ((module.exports /*:: : any*/) /*:: :Exports */);
module.exports.console = module.exports[1];

/* Hashing disabled */
