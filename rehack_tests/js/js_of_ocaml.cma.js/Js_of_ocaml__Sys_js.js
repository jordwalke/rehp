/**
 * Js_of_ocaml__Sys_js
 * @providesModule Js_of_ocaml__Sys_js
 */
"use strict";
var Js_of_ocaml__Js = require('Js_of_ocaml__Js.js');
var Js_of_ocaml__Lib_version = require('Js_of_ocaml__Lib_version.js');
var Pervasives = require('Pervasives.js');
var runtime = require('runtime.js');

let joo_global_object = global;


var runtime = joo_global_object.jsoo_runtime;
var caml_js_wrap_callback = runtime["caml_js_wrap_callback"];
var string = runtime["caml_new_string"];

function call1(f, a0) {
  return f.length === 1 ? f(a0) : runtime["caml_call_gen"](f, [a0]);
}

function call2(f, a0, a1) {
  return f.length === 2 ? f(a0, a1) : runtime["caml_call_gen"](f, [a0,a1]);
}

var global_data = runtime["caml_get_global_data"]();
var cst = string("");
var cst__0 = string("+");
var Pervasives = global_data["Pervasives"];
var Js_of_ocaml_Lib_version = global_data["Js_of_ocaml__Lib_version"];

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
  var c = call2(Pervasives[16], cst__0, Js_of_ocaml_Lib_version[2]);
  var js_of_ocaml_version = call2(
    Pervasives[16],
    Js_of_ocaml_Lib_version[1],
    c
  );
}

function a(g, f) {return runtime["caml_create_file"](g, f);}

function b(e) {return runtime["caml_read_file_content"](e);}

var Js_of_ocaml_Sys_js = [
  0,
  set_channel_flusher,
  set_channel_filler,
  function(d) {return runtime["caml_list_mount_point"](d);},
  unmount,
  mount,
  b,
  a,
  update_file,
  js_of_ocaml_version
];

runtime["caml_register_global"](4, Js_of_ocaml_Sys_js, "Js_of_ocaml__Sys_js");


module.exports = global.jsoo_runtime.caml_get_global_data().Js_of_ocaml__Sys_js;
/*____hashes compiler:hashing-disabled inputs:hashing-disabled bytecode:hashing-disabled*/
