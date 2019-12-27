/**
 * @flow strict
 * Obj
 */

// @ts-check


"use strict";
let joo_global_object = typeof global !== 'undefined' ? global : window;
require('runtime.js');

var runtime = joo_global_object.jsoo_runtime;
var string = runtime["caml_new_string"];
var caml_obj_tag = runtime["caml_obj_tag"];

function call1(f, a0) {
  return f.length === 1 ? f(a0) : runtime["caml_call_gen"](f, [a0]);
}

function call2(f, a0, a1) {
  return f.length === 2 ? f(a0, a1) : runtime["caml_call_gen"](f, [a0,a1]);
}

var cst_Obj_extension_constructor__0 = string("Obj.extension_constructor");
var cst_Obj_extension_constructor = string("Obj.extension_constructor");
var Pervasives = require("Pervasives.js");
var Marshal = require("Marshal.js");

function is_block(a) {return 1 - (typeof a === "number");}

function double_field(x, i) {return runtime["caml_array_get"](x, i);}

function set_double_field(x, i, v) {
  return runtime["caml_array_set"](x, i, v);
}

function marshal(obj) {return runtime["caml_output_value_to_string"](obj, 0);}

function unmarshal(str, pos) {
  var L_ = pos + call2(Marshal[8], str, pos) | 0;
  return [0,call2(Marshal[4], str, pos),L_];
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

function a_(K_, J_) {return runtime["caml_ephe_blit_data"](K_, J_);}

function b_(I_) {return runtime["caml_ephe_check_data"](I_);}

function c_(H_) {return runtime["caml_ephe_unset_data"](H_);}

function d_(G_, F_) {return runtime["caml_ephe_set_data"](G_, F_);}

function e_(E_) {return runtime["caml_ephe_get_data_copy"](E_);}

function f_(D_) {return runtime["caml_ephe_get_data"](D_);}

function g_(C_, B_, A_, z_, y_) {
  return runtime["caml_ephe_blit_key"](C_, B_, A_, z_, y_);
}

function h_(x_, w_) {return runtime["caml_ephe_check_key"](x_, w_);}

function i_(v_, u_) {return runtime["caml_ephe_unset_key"](v_, u_);}

function j_(t_, s_, r_) {return runtime["caml_ephe_set_key"](t_, s_, r_);}

function k_(q_, p_) {return runtime["caml_ephe_get_key_copy"](q_, p_);}

function l_(o_, n_) {return runtime["caml_ephe_get_key"](o_, n_);}

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
    function(m_) {return runtime["caml_ephe_create"](m_);},
    length,
    l_,
    k_,
    j_,
    i_,
    h_,
    g_,
    f_,
    e_,
    d_,
    c_,
    b_,
    a_
  ]
];

exports = Obj;

/*::type Exports = {
  is_block: (a: any) => any,
  double_field: (x: any, i: any) => any,
  set_double_field: (x: any, i: any, v: any) => any,
  first_non_constant_constructor_tag: any
  last_non_constant_constructor_tag: any
  lazy_tag: any
  closure_tag: any
  object_tag: any
  infix_tag: any
  forward_tag: any
  no_scan_tag: any
  abstract_tag: any
  string_tag: any
  double_tag: any
  double_array_tag: any
  custom_tag: any
  custom_tag: any
  int_tag: any
  out_of_heap_tag: any
  unaligned_tag: any
  extension_constructor: (x: any) => any,
  extension_name: (slot: any) => any,
  extension_id: (slot: any) => any,
  marshal: (obj: any) => any,
  unmarshal: (str: any, pos: any) => any,
}*/
/** @type {{
  is_block: (any) => any,
  double_field: (any, any) => any,
  set_double_field: (any, any, any) => any,
  first_non_constant_constructor_tag: any,
  last_non_constant_constructor_tag: any,
  lazy_tag: any,
  closure_tag: any,
  object_tag: any,
  infix_tag: any,
  forward_tag: any,
  no_scan_tag: any,
  abstract_tag: any,
  string_tag: any,
  double_tag: any,
  double_array_tag: any,
  custom_tag: any,
  custom_tag: any,
  int_tag: any,
  out_of_heap_tag: any,
  unaligned_tag: any,
  extension_constructor: (any) => any,
  extension_name: (any) => any,
  extension_id: (any) => any,
  marshal: (any) => any,
  unmarshal: (any, any) => any,
}} */
module.exports = ((exports /*:: : any*/) /*:: :Exports */);
module.exports.is_block = module.exports[1];
module.exports.double_field = module.exports[2];
module.exports.set_double_field = module.exports[3];
module.exports.first_non_constant_constructor_tag = module.exports[4];
module.exports.last_non_constant_constructor_tag = module.exports[5];
module.exports.lazy_tag = module.exports[6];
module.exports.closure_tag = module.exports[7];
module.exports.object_tag = module.exports[8];
module.exports.infix_tag = module.exports[9];
module.exports.forward_tag = module.exports[10];
module.exports.no_scan_tag = module.exports[11];
module.exports.abstract_tag = module.exports[12];
module.exports.string_tag = module.exports[13];
module.exports.double_tag = module.exports[14];
module.exports.double_array_tag = module.exports[15];
module.exports.custom_tag = module.exports[16];
module.exports.custom_tag = module.exports[17];
module.exports.int_tag = module.exports[18];
module.exports.out_of_heap_tag = module.exports[19];
module.exports.unaligned_tag = module.exports[20];
module.exports.extension_constructor = module.exports[21];
module.exports.extension_name = module.exports[22];
module.exports.extension_id = module.exports[23];
module.exports.marshal = module.exports[24];
module.exports.unmarshal = module.exports[25];

/* Hashing disabled */
