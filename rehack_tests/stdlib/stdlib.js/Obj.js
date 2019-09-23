/**
 * Obj
 * @providesModule Obj
 */
"use strict";
var Marshal = require('Marshal.js');
var Pervasives = require('Pervasives.js');
var runtime = require('runtime.js');

let joo_global_object = global;


var runtime = joo_global_object.jsoo_runtime;
var string = runtime["caml_new_string"];
var caml_obj_tag = runtime["caml_obj_tag"];

function call1(f, a0) {
  return f.length === 1 ? f(a0) : runtime["caml_call_gen"](f, [a0]);
}

function call2(f, a0, a1) {
  return f.length === 2 ? f(a0, a1) : runtime["caml_call_gen"](f, [a0,a1]);
}

var global_data = runtime["caml_get_global_data"]();
var cst_Obj_extension_constructor__0 = string("Obj.extension_constructor");
var cst_Obj_extension_constructor = string("Obj.extension_constructor");
var Pervasives = global_data["Pervasives"];
var Marshal = global_data["Marshal"];

function is_block(a) {return 1 - (typeof a === "number");}

function double_field(x, i) {return runtime["caml_array_get"](x, i);}

function set_double_field(x, i, v) {
  return runtime["caml_array_set"](x, i, v);
}

function marshal(obj) {return runtime["caml_output_value_to_string"](obj, 0);}

function unmarshal(str, pos) {
  var L = pos + call2(Marshal[8], str, pos) | 0;
  return [0,call2(Marshal[4], str, pos),L];
}

var first_non_constant_constructor_tag = 0;
var last_non_constant_constructor_tag = 245;
var lazy_tag = 246;
var closure_tag = 247;
var object_tag = 248;
var infix_tag = 249;
var forward_tag = 250;
var no_scan_tag = 251;
var abstract_tag = 251;
var string_tag = 252;
var double_tag = 253;
var double_array_tag = 254;
var custom_tag = 255;
var int_tag = 1e3;
var out_of_heap_tag = 1001;
var unaligned_tag = 1002;

function extension_constructor(x) {
  if (is_block(x)) if (
    caml_obj_tag(x) !== 248
  ) if (1 <= x.length - 1) {
    var slot = x[1];
    var switch__0 = 1;
  }
  else var switch__0 = 0;
  else var switch__0 = 0;
  else var switch__0 = 0;
  if (! switch__0) {var slot = x;}
  if (is_block(slot)) if (
    caml_obj_tag(slot) === 248
  ) {var name = slot[1];var switch__1 = 1;}
  else var switch__1 = 0;
  else var switch__1 = 0;
  if (! switch__1) {
    var name = call1(Pervasives[1], cst_Obj_extension_constructor__0);
  }
  return caml_obj_tag(name) === 252 ?
    slot :
    call1(Pervasives[1], cst_Obj_extension_constructor);
}

function extension_name(slot) {return slot[1];}

function extension_id(slot) {return slot[2];}

function length(x) {return x.length - 1 + -2 | 0;}

function a(K, J) {return runtime["caml_ephe_blit_data"](K, J);}

function b(I) {return runtime["caml_ephe_check_data"](I);}

function c(H) {return runtime["caml_ephe_unset_data"](H);}

function d(G, F) {return runtime["caml_ephe_set_data"](G, F);}

function e(E) {return runtime["caml_ephe_get_data_copy"](E);}

function f(D) {return runtime["caml_ephe_get_data"](D);}

function g(C, B, A, z, y) {
  return runtime["caml_ephe_blit_key"](C, B, A, z, y);
}

function h(x, w) {return runtime["caml_ephe_check_key"](x, w);}

function i(v, u) {return runtime["caml_ephe_unset_key"](v, u);}

function j(t, s, r) {return runtime["caml_ephe_set_key"](t, s, r);}

function k(q, p) {return runtime["caml_ephe_get_key_copy"](q, p);}

function l(o, n) {return runtime["caml_ephe_get_key"](o, n);}

var Obj = [
  0,
  is_block,
  double_field,
  set_double_field,
  first_non_constant_constructor_tag,
  last_non_constant_constructor_tag,
  lazy_tag,
  closure_tag,
  object_tag,
  infix_tag,
  forward_tag,
  no_scan_tag,
  abstract_tag,
  string_tag,
  double_tag,
  double_array_tag,
  custom_tag,
  custom_tag,
  int_tag,
  out_of_heap_tag,
  unaligned_tag,
  extension_constructor,
  extension_name,
  extension_id,
  marshal,
  unmarshal,
  [
    0,
    function(m) {return runtime["caml_ephe_create"](m);},
    length,
    l,
    k,
    j,
    i,
    h,
    g,
    f,
    e,
    d,
    c,
    b,
    a
  ]
];

runtime["caml_register_global"](4, Obj, "Obj");


module.exports = global.jsoo_runtime.caml_get_global_data().Obj;
/*____hashes compiler:hashing-disabled inputs:hashing-disabled bytecode:hashing-disabled*/
