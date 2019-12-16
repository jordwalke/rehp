/**
 * Js_of_ocaml__Js
 * @providesModule Js_of_ocaml__Js
 */
"use strict";
var Callback = require('Callback.js');
var Pervasives = require('Pervasives.js');
var Printexc = require('Printexc.js');
var runtime = require('runtime.js');

let joo_global_object = global;



var runtime = joo_global_object.jsoo_runtime;
var caml_get_public_method = runtime["caml_get_public_method"];
var caml_js_to_string = runtime["caml_js_to_string"];
var caml_js_wrap_callback = runtime["caml_js_wrap_callback"];
var string = runtime["caml_new_string"];

function call1(f, a0) {
  return f.length === 1 ? f(a0) : runtime["caml_call_gen"](f, [a0]);
}

function call2(f, a0, a1) {
  return f.length === 2 ? f(a0, a1) : runtime["caml_call_gen"](f, [a0,a1]);
}

var global_data = runtime["caml_get_global_data"]();
var cst_parseFloat = string("parseFloat");
var cst_parseInt = string("parseInt");
var cst_Js_of_ocaml_Js_Error = string("Js_of_ocaml__Js.Error");
var cst_jsError = string("jsError");
var Pervasives = global_data["Pervasives"];
var Callback = global_data["Callback"];
var Printexc = global_data["Printexc"];
var global =  joo_global_object ;
var Unsafe = [0,global];
var null__0 =  null ;
var undefined__0 =  undefined ;

function return__0(S_) {return S_;}

function map(x, f) {return x == null__0 ? null__0 : return__0(call1(f, x));}

function bind(x, f) {return x == null__0 ? null__0 : call1(f, x);}

function test(x) {return 1 - (x == null__0 ? 1 : 0);}

function iter(x, f) {
  var R_ = 1 - (x == null__0 ? 1 : 0);
  return R_ ? call1(f, x) : R_;
}

function case__0(x, f, g) {return x == null__0 ? call1(f, 0) : call1(g, x);}

function get(x, f) {return x == null__0 ? call1(f, 0) : x;}

function option(x) {
  if (x) {var x__0 = x[1];return return__0(x__0);}
  return null__0;
}

function to_option(x) {
  function Q_(x) {return [0,x];}
  return case__0(x, function(param) {return 0;}, Q_);
}

var Opt = [0,null__0,return__0,map,bind,test,iter,case__0,get,option,to_option
];

function return__1(P_) {return P_;}

function map__0(x, f) {
  return x === undefined__0 ? undefined__0 : return__1(call1(f, x));
}

function bind__0(x, f) {
  return x === undefined__0 ? undefined__0 : call1(f, x);
}

function test__0(x) {return x !== undefined__0 ? 1 : 0;}

function iter__0(x, f) {
  var O_ = x !== undefined__0 ? 1 : 0;
  return O_ ? call1(f, x) : O_;
}

function case__1(x, f, g) {
  return x === undefined__0 ? call1(f, 0) : call1(g, x);
}

function get__0(x, f) {return x === undefined__0 ? call1(f, 0) : x;}

function option__0(x) {
  if (x) {var x__0 = x[1];return return__1(x__0);}
  return undefined__0;
}

function to_option__0(x) {
  function N_(x) {return [0,x];}
  return case__1(x, function(param) {return 0;}, N_);
}

var Optdef = [
  0,
  undefined__0,
  return__1,
  map__0,
  bind__0,
  test__0,
  iter__0,
  case__1,
  get__0,
  option__0,
  to_option__0
];

function coerce(x, f, g) {
  function M_(param) {return call1(g, x);}
  return get(call1(f, x), M_);
}

function coerce_opt(x, f, g) {
  function L_(param) {return call1(g, x);}
  return get(bind(x, f), L_);
}

var true__0 =  true ;
var false__0 =  false ;

function a_(x) {return call1(caml_get_public_method(x, 876326544, 1), x);}

var string_constr = function(t0, param) {return t0.String;}(global, a_);

function b_(x) {return call1(caml_get_public_method(x, 595393896, 2), x);}

var regExp = function(t1, param) {return t1.RegExp;}(global, b_);

function c_(x) {return call1(caml_get_public_method(x, 944440446, 3), x);}

var object_constructor = function(t2, param) {return t2.Object;}(global, c_);

function object_keys(o) {
  function K_(x) {return call1(caml_get_public_method(x, -955850252, 4), x);}
  return function(t4, t3, param) {return t4.keys(t3);}(object_constructor, o, K_
  );
}

function d_(x) {return call1(caml_get_public_method(x, 883172538, 5), x);}

var array_constructor = function(t5, param) {return t5.Array;}(global, d_);

function array_get(J_, I_) {return J_[I_];}

function array_set(H_, G_, F_) {H_[G_] = F_;return 0;}

function array_map_poly(a, cb) {
  function E_(x) {return call1(caml_get_public_method(x, 5442204, 6), x);}
  return function(t7, t6, param) {return t7.map(t6);}(a, cb, E_);
}

function array_map(f, a) {
  return array_map_poly(
    a,
    caml_js_wrap_callback(function(x, idx, param) {return call1(f, x);})
  );
}

function array_mapi(f, a) {
  return array_map_poly(
    a,
    caml_js_wrap_callback(function(x, idx, param) {return call2(f, idx, x);})
  );
}

function str_array(D_) {return D_;}

function match_result(C_) {return C_;}

function e_(x) {return call1(caml_get_public_method(x, -531784147, 7), x);}

var date_constr = function(t8, param) {return t8.Date;}(global, e_);

function f_(x) {return call1(caml_get_public_method(x, -431978041, 8), x);}

var math = function(t9, param) {return t9.Math;}(global, f_);
var Error = [248,cst_Js_of_ocaml_Js_Error,runtime["caml_fresh_oo_id"](0)];

function g_(x) {return call1(caml_get_public_method(x, 37651177, 9), x);}

var error_constr = function(t10, param) {return t10.Error;}(global, g_);

call2(Callback[2], cst_jsError, [0,Error,{}]);

var raise_js_error =  (function (exn) { throw exn }) ;

function h_(x) {return call1(caml_get_public_method(x, -465951225, 10), x);}

var JSON = function(t11, param) {return t11.JSON;}(global, h_);

function decodeURI(s) {
  function B_(x) {return call1(caml_get_public_method(x, -994878754, 11), x);}
  return function(t12, param) {return t12.decodeURI;}(global, B_)(s);
}

function decodeURIComponent(s) {
  function A_(x) {return call1(caml_get_public_method(x, 751577599, 12), x);}
  return function(t13, param) {return t13.decodeURIComponent;}(global, A_)(s);
}

function encodeURI(s) {
  function z_(x) {return call1(caml_get_public_method(x, 443205366, 13), x);}
  return function(t14, param) {return t14.encodeURI;}(global, z_)(s);
}

function encodeURIComponent(s) {
  function y_(x) {return call1(caml_get_public_method(x, -641565977, 14), x);}
  return function(t15, param) {return t15.encodeURIComponent;}(global, y_)(s);
}

function escape(s) {
  function x_(x) {return call1(caml_get_public_method(x, -623230079, 15), x);}
  return function(t16, param) {return t16.escape;}(global, x_)(s);
}

function unescape(s) {
  function w_(x) {return call1(caml_get_public_method(x, -585010534, 16), x);}
  return function(t17, param) {return t17.unescape;}(global, w_)(s);
}

function isNaN(i) {
  function v_(x) {
    return call1(caml_get_public_method(x, -1051592975, 17), x);
  }
  return function(t18, param) {return t18.isNaN;}(global, v_)(i) | 0;
}

function parseInt(s) {
  function u_(x) {return call1(caml_get_public_method(x, -697166212, 18), x);}
  var s__0 = function(t19, param) {return t19.parseInt;}(global, u_)(s);
  return isNaN(s__0) ? call1(Pervasives[2], cst_parseInt) : s__0;
}

function parseFloat(s) {
  function t_(x) {return call1(caml_get_public_method(x, 746065001, 19), x);}
  var s__0 = function(t20, param) {return t20.parseFloat;}(global, t_)(s);
  return isNaN(s__0) ? call1(Pervasives[2], cst_parseFloat) : s__0;
}

function i_(param) {
  if (param[1] === Error) {
    var e = param[2];
    var s_ = function(x) {
      return call1(caml_get_public_method(x, 946786476, 20), x);
    };
    return [
      0,
      caml_js_to_string(function(t21, param) {return t21.toString();}(e, s_))
    ];
  }
  return 0;
}

call1(Printexc[8], i_);

function j_(e) {
  if (e instanceof array_constructor) {return 0;}
  function r_(x) {return call1(caml_get_public_method(x, 946786476, 21), x);}
  return [
    0,
    caml_js_to_string(function(t22, param) {return t22.toString();}(e, r_))
  ];
}

call1(Printexc[8], j_);

function string_of_error(e) {
  function q_(x) {return call1(caml_get_public_method(x, 946786476, 22), x);}
  return caml_js_to_string(
    function(t23, param) {return t23.toString();}(e, q_)
  );
}

function export_js(field, x) {
  runtime["caml_js_export_var"](0)[field] = x;
  return 0;
}

function export__0(field, x) {return export_js(field.toString(), x);}

function export_all(obj) {
  var keys = object_keys(obj);
  function n_(x) {return call1(caml_get_public_method(x, -994170454, 23), x);}
  var o_ = caml_js_wrap_callback(
    function(key, param, p_) {return export_js(key, obj[key]);}
  );
  return function(t25, t24, param) {return t25.forEach(t24);}(keys, o_, n_);
}

function k_(m_) {return m_;}

var Js_of_ocaml_Js = [
  0,
  null__0,
  function(l_) {return l_;},
  undefined__0,
  k_,
  Opt,
  Optdef,
  true__0,
  false__0,
  string_constr,
  regExp,
  regExp,
  regExp,
  object_keys,
  array_constructor,
  array_constructor,
  array_get,
  array_set,
  array_map,
  array_mapi,
  str_array,
  match_result,
  date_constr,
  date_constr,
  date_constr,
  date_constr,
  date_constr,
  date_constr,
  date_constr,
  date_constr,
  date_constr,
  math,
  error_constr,
  string_of_error,
  raise_js_error,
  Error,
  JSON,
  decodeURI,
  decodeURIComponent,
  encodeURI,
  encodeURIComponent,
  escape,
  unescape,
  isNaN,
  parseInt,
  parseFloat,
  coerce,
  coerce_opt,
  export__0,
  export_all,
  Unsafe
];

runtime["caml_register_global"](36, Js_of_ocaml_Js, "Js_of_ocaml__Js");


module.exports = global.jsoo_runtime.caml_get_global_data().Js_of_ocaml__Js;
/* Hashing disabled */
