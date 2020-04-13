/**
 * @flow strict
 * Stdlib__callback
 */

// @ts-check


"use strict";

var runtime = require("../runtime/runtime.js");
var caml_register_named_value = runtime["caml_register_named_value"];
var Stdlib_obj = require("./Stdlib__obj.js");

function register(name, v) {return caml_register_named_value(name, v);}

function register_exception(name, exn) {
  var slot = runtime["caml_obj_tag"](exn) === Stdlib_obj[8] ? exn : exn[1];
  return caml_register_named_value(name, slot);
}

var Stdlib_callback = [0,register,register_exception];

module.exports = Stdlib_callback;

/*::type Exports = {
  register: (name: any, v: any) => any,
  register_exception: (name: any, exn: any) => any,
}*/
/** @type {{
  register: (name: any, v: any) => any,
  register_exception: (name: any, exn: any) => any,
}} */
module.exports = ((module.exports /*:: : any*/) /*:: :Exports */);
module.exports.register = module.exports[1];
module.exports.register_exception = module.exports[2];

/* Hashing disabled */
