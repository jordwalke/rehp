/**
 * @flow strict
 * Stdlib__obj
 */

// @ts-check


"use strict";

var runtime = require("../runtime/runtime.js");
var string = runtime["caml_new_string"];
var caml_obj_tag = runtime["caml_obj_tag"];

function call1(f, a0) {
  return f.length === 1 ? f(a0) : runtime["caml_call_gen"](f, [a0]);
}

function call2(f, a0, a1) {
  return f.length === 2 ? f(a0, a1) : runtime["caml_call_gen"](f, [a0,a1]);
}

var cst_Obj_Ephemeron_blit_key = string("Obj.Ephemeron.blit_key");
var cst_Obj_Ephemeron_check_key = string("Obj.Ephemeron.check_key");
var cst_Obj_Ephemeron_unset_key = string("Obj.Ephemeron.unset_key");
var cst_Obj_Ephemeron_set_key = string("Obj.Ephemeron.set_key");
var cst_Obj_Ephemeron_get_key_copy = string("Obj.Ephemeron.get_key_copy");
var cst_Obj_Ephemeron_get_key = string("Obj.Ephemeron.get_key");
var cst_Obj_Ephemeron_create = string("Obj.Ephemeron.create");
var cst_Obj_extension_constructor__0 = string("Obj.extension_constructor");
var cst_Obj_extension_constructor = string("Obj.extension_constructor");
var Stdlib = require("./Stdlib.js");
var Stdlib_marshal = require("./Stdlib__marshal.js");
var Stdlib_sys = require("./Stdlib__sys.js");

function is_block(a) {return ! (typeof a === "number");}

function double_field(x, i) {return runtime["caml_array_get"](x, i);}

function set_double_field(x, i, v) {
  return runtime["caml_array_set"](x, i, v);
}

function marshal(obj) {return runtime["caml_output_value_to_bytes"](obj, 0);}

function unmarshal(str, pos) {
  var u_ = pos + call2(Stdlib_marshal[8], str, pos) | 0;
  return [0,call2(Stdlib_marshal[4], str, pos),u_];
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

function of_val(x) {
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
    var name = call1(Stdlib[1], cst_Obj_extension_constructor__0);
  }
  return caml_obj_tag(name) === 252 ?
    slot :
    call1(Stdlib[1], cst_Obj_extension_constructor);
}

function name(slot) {return slot[1];}

function id(slot) {return slot[2];}

var Extension_constructor = [0,of_val,name,id];
var extension_constructor = Extension_constructor[1];
var extension_name = Extension_constructor[2];
var extension_id = Extension_constructor[3];
var max_ephe_length = Stdlib_sys[14] - 2 | 0;

function create(l) {
  var s_ = 0 <= l ? 1 : 0;
  var t_ = s_ ? l <= max_ephe_length ? 1 : 0 : s_;
  if (! t_) {call1(Stdlib[1], cst_Obj_Ephemeron_create);}
  return runtime["caml_ephe_create"](l);
}

function length(x) {return x.length - 1 - 2 | 0;}

function raise_if_invalid_offset(e, o, msg) {
  var p_ = 0 <= o ? 1 : 0;
  var q_ = p_ ? o < length(e) ? 1 : 0 : p_;
  var r_ = ! q_;
  return r_ ? call1(Stdlib[1], msg) : r_;
}

function get_key(e, o) {
  raise_if_invalid_offset(e, o, cst_Obj_Ephemeron_get_key);
  return runtime["caml_ephe_get_key"](e, o);
}

function get_key_copy(e, o) {
  raise_if_invalid_offset(e, o, cst_Obj_Ephemeron_get_key_copy);
  return runtime["caml_ephe_get_key_copy"](e, o);
}

function set_key(e, o, x) {
  raise_if_invalid_offset(e, o, cst_Obj_Ephemeron_set_key);
  return runtime["caml_ephe_set_key"](e, o, x);
}

function unset_key(e, o) {
  raise_if_invalid_offset(e, o, cst_Obj_Ephemeron_unset_key);
  return runtime["caml_ephe_unset_key"](e, o);
}

function check_key(e, o) {
  raise_if_invalid_offset(e, o, cst_Obj_Ephemeron_check_key);
  return runtime["caml_ephe_check_key"](e, o);
}

function blit_key(e1, o1, e2, o2, l) {
  if (0 <= l) {
    if (0 <= o1) {
      if (! ((length(e1) - l | 0) < o1)) {
        if (0 <= o2) {
          if (! ((length(e2) - l | 0) < o2)) {
            var n_ = 0 !== l ? 1 : 0;
            var o_ = n_ ?
              runtime["caml_ephe_blit_key"](e1, o1, e2, o2, l) :
              n_;
            return o_;
          }
        }
      }
    }
  }
  return call1(Stdlib[1], cst_Obj_Ephemeron_blit_key);
}

function a_(m_, l_) {return runtime["caml_ephe_blit_data"](m_, l_);}

function b_(k_) {return runtime["caml_ephe_check_data"](k_);}

function c_(j_) {return runtime["caml_ephe_unset_data"](j_);}

function d_(i_, h_) {return runtime["caml_ephe_set_data"](i_, h_);}

function e_(g_) {return runtime["caml_ephe_get_data_copy"](g_);}

var Stdlib_obj = [
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
  Extension_constructor,
  extension_constructor,
  extension_name,
  extension_id,
  marshal,
  unmarshal,
  [
    0,
    create,
    length,
    get_key,
    get_key_copy,
    set_key,
    unset_key,
    check_key,
    blit_key,
    function(f_) {return runtime["caml_ephe_get_data"](f_);},
    e_,
    d_,
    c_,
    b_,
    a_,
    max_ephe_length
  ]
];

module.exports = Stdlib_obj;

/*::type Exports = {
  is_block: (a: any) => any,
  double_field: (x: any, i: any) => any,
  set_double_field: (x: any, i: any, v: any) => any,
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
  int_tag: any,
  out_of_heap_tag: any,
  unaligned_tag: any,
  Extension_constructor: any,
  extension_constructor: any,
  extension_name: any,
  extension_id: any,
  marshal: (obj: any) => any,
  unmarshal: (str: any, pos: any) => any,
}*/
/** @type {{
  is_block: (a: any) => any,
  double_field: (x: any, i: any) => any,
  set_double_field: (x: any, i: any, v: any) => any,
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
  int_tag: any,
  out_of_heap_tag: any,
  unaligned_tag: any,
  Extension_constructor: any,
  extension_constructor: any,
  extension_name: any,
  extension_id: any,
  marshal: (obj: any) => any,
  unmarshal: (str: any, pos: any) => any,
}} */
module.exports = ((module.exports /*:: : any*/) /*:: :Exports */);
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
module.exports.int_tag = module.exports[18];
module.exports.out_of_heap_tag = module.exports[19];
module.exports.unaligned_tag = module.exports[20];
module.exports.Extension_constructor = module.exports[21];
module.exports.extension_constructor = module.exports[22];
module.exports.extension_name = module.exports[23];
module.exports.extension_id = module.exports[24];
module.exports.marshal = module.exports[25];
module.exports.unmarshal = module.exports[26];

/* Hashing disabled */
