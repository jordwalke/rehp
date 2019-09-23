/**
 * MoreLabels
 * @providesModule MoreLabels
 */
"use strict";
var Hashtbl = require('Hashtbl.js');
var Map = require('Map.js');
var Set = require('Set.js');
var runtime = require('runtime.js');

let joo_global_object = global;


var runtime = joo_global_object.jsoo_runtime;
var global_data = runtime["caml_get_global_data"]();
var Set = global_data["Set"];
var Map = global_data["Map"];
var Hashtbl = global_data["Hashtbl"];
var MoreLabels = [0,Hashtbl,Map,Set];

runtime["caml_register_global"](3, MoreLabels, "MoreLabels");


module.exports = global.jsoo_runtime.caml_get_global_data().MoreLabels;
/*____hashes compiler:hashing-disabled inputs:hashing-disabled bytecode:hashing-disabled*/
