/**
 * @flow strict
 * Js_of_ocaml__Sys_js
 */

// @ts-check


"use strict";

var runtime = require("../runtime/runtime.js");
var caml_js_wrap_callback = runtime["caml_js_wrap_callback"];
var string = runtime["caml_new_string"];

function call1(f, a0) {
  return f.length === 1 ? f(a0) : runtime["caml_call_gen"](f, [a0]);
}

function call2(f, a0, a1) {
  return f.length === 2 ? f(a0, a1) : runtime["caml_call_gen"](f, [a0,a1]);
}

var cst = string("");
var cst__0 = string("+");
var Pervasives = require("../stdlib.cma.js/Pervasives.js");
var Js_of_ocaml_Lib_version = require("./Js_of_ocaml__Lib_version.js");

function update_file(name, content) {
  var oc = call1(Pervasives[48], name);
  call2(Pervasives[54], oc, content);
  return call1(Pervasives[64], oc);
}

function set_channel_flusher(out_channel, f) {
  var f__0 = caml_js_wrap_callback(
    function(s) {return call1(f, runtime["caml_js_to_byte_string"](s));}
  );
  return runtime["caml_ml_set_channel_output"](out_channel, f__0);
}

function set_channel_filler(in_channel, f) {
  var f__0 = caml_js_wrap_callback(f);
  return runtime["caml_ml_set_channel_refill"](in_channel, f__0);
}

function mount(path, f) {
  return runtime["caml_mount_autoload"](
    path,
    caml_js_wrap_callback(
      function(prefix, path) {return call2(f, prefix, path);}
    )
  );
}

function unmount(path) {return runtime["caml_unmount"](path);}

if (runtime["caml_string_equal"](Js_of_ocaml_Lib_version[2], cst)) var js_of_ocaml_version = Js_of_ocaml_Lib_version[1];
else {
  var c_ = call2(Pervasives[16], cst__0, Js_of_ocaml_Lib_version[2]);
  var js_of_ocaml_version = call2(
    Pervasives[16],
    Js_of_ocaml_Lib_version[1],
    c_
  );
}

function a_(g_, f_) {return runtime["caml_create_file"](g_, f_);}

function b_(e_) {return runtime["caml_read_file_content"](e_);}

var Js_of_ocaml_Sys_js = [
  0,
  set_channel_flusher,
  set_channel_filler,
  function(d_) {return runtime["caml_list_mount_point"](d_);},
  unmount,
  mount,
  b_,
  a_,
  update_file,
  js_of_ocaml_version
];

exports = Js_of_ocaml_Sys_js;

/*::type Exports = {
  set_channel_flusher: (out_channel: any, f: any) => any,
  set_channel_filler: (in_channel: any, f: any) => any,
  unmount: (path: any) => any,
  mount: (path: any, f: any) => any,
  update_file: (name: any, content: any) => any,
  js_of_ocaml_version: any,
}*/
/** @type {{
  set_channel_flusher: (out_channel: any, f: any) => any,
  set_channel_filler: (in_channel: any, f: any) => any,
  unmount: (path: any) => any,
  mount: (path: any, f: any) => any,
  update_file: (name: any, content: any) => any,
  js_of_ocaml_version: any,
}} */
module.exports = ((exports /*:: : any*/) /*:: :Exports */);
module.exports.set_channel_flusher = module.exports[1];
module.exports.set_channel_filler = module.exports[2];
module.exports.unmount = module.exports[4];
module.exports.mount = module.exports[5];
module.exports.update_file = module.exports[8];
module.exports.js_of_ocaml_version = module.exports[9];

/* Hashing disabled */
