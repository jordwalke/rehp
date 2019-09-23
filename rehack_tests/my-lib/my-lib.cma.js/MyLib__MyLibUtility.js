/**
 * MyLib__MyLibUtility
 * @providesModule MyLib__MyLibUtility
 */
"use strict";
var Random = require('Random.js');
var runtime = require('runtime.js');

let joo_global_object = global;


var runtime = joo_global_object.jsoo_runtime;

function call1(f, a0) {
  return f.length === 1 ? f(a0) : runtime["caml_call_gen"](f, [a0]);
}

var global_data = runtime["caml_get_global_data"]();
var Random = global_data["Random"];

function thisIsAUtilityFunction(param) {return call1(Random[5], 100);}

var MyLib_MyLibUtility = [0,thisIsAUtilityFunction];

runtime["caml_register_global"](1, MyLib_MyLibUtility, "MyLib__MyLibUtility");


module.exports = global.jsoo_runtime.caml_get_global_data().MyLib__MyLibUtility;
