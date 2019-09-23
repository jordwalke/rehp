/**
 * Spacetime
 * @providesModule Spacetime
 */
"use strict";
var Gc = require('Gc.js');
var Pervasives = require('Pervasives.js');
var runtime = require('runtime.js');

let joo_global_object = global;


var runtime = joo_global_object.jsoo_runtime;
var string = runtime["caml_new_string"];
var caml_spacetime_enabled = runtime["caml_spacetime_enabled"];
var caml_spacetime_only_works_for_native_code = runtime
 ["caml_spacetime_only_works_for_native_code"];

function call1(f, a0) {
  return f.length === 1 ? f(a0) : runtime["caml_call_gen"](f, [a0]);
}

var global_data = runtime["caml_get_global_data"]();
var cst_Series_is_closed__0 = string("Series is closed");
var cst_Series_is_closed = string("Series is closed");
var Pervasives = global_data["Pervasives"];
var enabled = caml_spacetime_enabled(0);

function if_spacetime_enabled(f) {return enabled ? call1(f, 0) : 0;}

function create(path) {
  if (caml_spacetime_enabled(0)) {
    var channel = call1(Pervasives[48], path);
    var t = [0,channel,0];
    caml_spacetime_only_works_for_native_code(t[1]);
    return t;
  }
  return [0,Pervasives[27],1];
}

function save_event(time, t, event_name) {
  return if_spacetime_enabled(
    function(param) {
      return caml_spacetime_only_works_for_native_code(time, t[1], event_name);
    }
  );
}

function save_and_close(time, t) {
  return if_spacetime_enabled(
    function(param) {
      if (t[2]) {call1(Pervasives[2], cst_Series_is_closed);}
      caml_spacetime_only_works_for_native_code(time, t[1]);
      call1(Pervasives[64], t[1]);
      t[2] = 1;
      return 0;
    }
  );
}

var Series = [0,create,save_event,save_and_close];

function take(time, param) {
  var channel = param[1];
  var closed = param[2];
  return if_spacetime_enabled(
    function(param) {
      if (closed) {call1(Pervasives[2], cst_Series_is_closed__0);}
      runtime["caml_gc_minor"](0);
      return caml_spacetime_only_works_for_native_code(time, channel);
    }
  );
}

var Snapshot = [0,take];

function save_event_for_automatic_snapshots(event_name) {
  return if_spacetime_enabled(
    function(param) {
      return caml_spacetime_only_works_for_native_code(event_name);
    }
  );
}

var Spacetime = [0,enabled,Series,Snapshot,save_event_for_automatic_snapshots];

runtime["caml_register_global"](3, Spacetime, "Spacetime");


module.exports = global.jsoo_runtime.caml_get_global_data().Spacetime;
/*____hashes compiler:hashing-disabled inputs:hashing-disabled bytecode:hashing-disabled*/
