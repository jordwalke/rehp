/**
 * @flow strict
 * Stdlib__spacetime
 */

// @ts-check


"use strict";

var runtime = require("../runtime/runtime.js");

function call1(f, a0) {
  return f.length === 1 ? f(a0) : runtime["caml_call_gen"](f, [a0]);
}

var string = runtime["caml_new_string"];
var caml_spacetime_enabled = runtime["caml_spacetime_enabled"];
var caml_spacetime_only_works_for_native_code = runtime
 ["caml_spacetime_only_works_for_native_code"];
var cst_Series_is_closed__0 = string("Series is closed");
var cst_Series_is_closed = string("Series is closed");
var Stdlib = require("./Stdlib.js");
var enabled = caml_spacetime_enabled(0);

function if_spacetime_enabled(f) {return enabled ? call1(f, 0) : 0;}

function create(path) {
  var t;
  var channel;
  if (caml_spacetime_enabled(0)) {
    channel = call1(Stdlib[60], path);
    t = [0,channel,0];
    caml_spacetime_only_works_for_native_code(t[1]);
    return t;
  }
  return [0,Stdlib[39],1];
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
      if (t[2]) {call1(Stdlib[2], cst_Series_is_closed);}
      caml_spacetime_only_works_for_native_code(time, t[1]);
      call1(Stdlib[76], t[1]);
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
      if (closed) {call1(Stdlib[2], cst_Series_is_closed__0);}
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

var Stdlib_spacetime = [
  0,
  enabled,
  Series,
  Snapshot,
  save_event_for_automatic_snapshots
];

module.exports = Stdlib_spacetime;

/*::type Exports = {
  enabled: any,
  Series: any,
  Snapshot: any,
  save_event_for_automatic_snapshots: (event_name: any) => any,
}*/
/** @type {{
  enabled: any,
  Series: any,
  Snapshot: any,
  save_event_for_automatic_snapshots: (event_name: any) => any,
}} */
module.exports = ((module.exports /*:: : any*/) /*:: :Exports */);
module.exports.enabled = module.exports[1];
module.exports.Series = module.exports[2];
module.exports.Snapshot = module.exports[3];
module.exports.save_event_for_automatic_snapshots = module.exports[4];

/* Hashing disabled */
