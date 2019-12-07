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

function return__0(al_) {return al_;}

function map(x, f) {return x == null__0 ? null__0 : return__0(call1(f, x));}

function bind(x, f) {return x == null__0 ? null__0 : call1(f, x);}

function test(x) {return 1 - (x == null__0 ? 1 : 0);}

function iter(x, f) {
  var ak_ = 1 - (x == null__0 ? 1 : 0);
  return ak_ ? call1(f, x) : ak_;
}

function case__0(x, f, g) {return x == null__0 ? call1(f, 0) : call1(g, x);}

function get(x, f) {return x == null__0 ? call1(f, 0) : x;}

function option(x) {
  if (x) {var x__0 = x[1];return return__0(x__0);}
  return null__0;
}

function to_option(x) {
  function aj_(x) {return [0,x];}
  return case__0(x, function(param) {return 0;}, aj_);
}

var Opt = [0,null__0,return__0,map,bind,test,iter,case__0,get,option,to_option
];

function return__1(ai_) {return ai_;}

function map__0(x, f) {
  return x === undefined__0 ? undefined__0 : return__1(call1(f, x));
}

function bind__0(x, f) {
  return x === undefined__0 ? undefined__0 : call1(f, x);
}

function test__0(x) {return x !== undefined__0 ? 1 : 0;}

function iter__0(x, f) {
  var ah_ = x !== undefined__0 ? 1 : 0;
  return ah_ ? call1(f, x) : ah_;
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
  function ag_(x) {return [0,x];}
  return case__1(x, function(param) {return 0;}, ag_);
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
  function ae_(param) {return call1(g, x);}
  var af_ = call1(f, x);
  return call2(Opt[8], af_, ae_);
}

function coerce_opt(x, f, g) {
  function ac_(param) {return call1(g, x);}
  var ad_ = call2(Opt[4], x, f);
  return call2(Opt[8], ad_, ac_);
}

var true__0 =  true ;
var false__0 =  false ;

function a_(x) {return call1(caml_get_public_method(x, 876326544, 1), x);}

var b_ = Unsafe[1];
var string_constr = function(t0, param) {return t0.String;}(b_, a_);

function c_(x) {return call1(caml_get_public_method(x, 595393896, 2), x);}

var d_ = Unsafe[1];
var regExp = function(t1, param) {return t1.RegExp;}(d_, c_);

function e_(x) {return call1(caml_get_public_method(x, 944440446, 3), x);}

var f_ = Unsafe[1];
var object_constructor = function(t2, param) {return t2.Object;}(f_, e_);

function object_keys(o) {
  function ab_(x) {return call1(caml_get_public_method(x, -955850252, 4), x);}
  return function(t4, t3, param) {return t4.keys(t3);}(object_constructor, o, ab_
  );
}

function g_(x) {return call1(caml_get_public_method(x, 883172538, 5), x);}

var h_ = Unsafe[1];
var array_constructor = function(t5, param) {return t5.Array;}(h_, g_);

function array_get(aa_, Z_) {return aa_[Z_];}

function array_set(Y_, X_, W_) {Y_[X_] = W_;return 0;}

function array_map_poly(a, cb) {
  function V_(x) {return call1(caml_get_public_method(x, 5442204, 6), x);}
  return function(t7, t6, param) {return t7.map(t6);}(a, cb, V_);
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

function str_array(U_) {return U_;}

function match_result(T_) {return T_;}

function i_(x) {return call1(caml_get_public_method(x, -531784147, 7), x);}

var j_ = Unsafe[1];
var date_constr = function(t8, param) {return t8.Date;}(j_, i_);

function k_(x) {return call1(caml_get_public_method(x, -431978041, 8), x);}

var l_ = Unsafe[1];
var math = function(t9, param) {return t9.Math;}(l_, k_);
var Error = [248,cst_Js_of_ocaml_Js_Error,runtime["caml_fresh_oo_id"](0)];

function m_(x) {return call1(caml_get_public_method(x, 37651177, 9), x);}

var n_ = Unsafe[1];
var error_constr = function(t10, param) {return t10.Error;}(n_, m_);

call2(Callback[2], cst_jsError, [0,Error,{}]);

var raise_js_error =  (function (exn) { throw exn }) ;

function o_(x) {return call1(caml_get_public_method(x, -465951225, 10), x);}

var p_ = Unsafe[1];
var JSON = function(t11, param) {return t11.JSON;}(p_, o_);

function decodeURI(s) {
  function R_(x) {return call1(caml_get_public_method(x, -994878754, 11), x);}
  var S_ = Unsafe[1];
  return function(t12, param) {return t12.decodeURI;}(S_, R_)(s);
}

function decodeURIComponent(s) {
  function P_(x) {return call1(caml_get_public_method(x, 751577599, 12), x);}
  var Q_ = Unsafe[1];
  return function(t13, param) {return t13.decodeURIComponent;}(Q_, P_)(s);
}

function encodeURI(s) {
  function N_(x) {return call1(caml_get_public_method(x, 443205366, 13), x);}
  var O_ = Unsafe[1];
  return function(t14, param) {return t14.encodeURI;}(O_, N_)(s);
}

function encodeURIComponent(s) {
  function L_(x) {return call1(caml_get_public_method(x, -641565977, 14), x);}
  var M_ = Unsafe[1];
  return function(t15, param) {return t15.encodeURIComponent;}(M_, L_)(s);
}

function escape(s) {
  function J_(x) {return call1(caml_get_public_method(x, -623230079, 15), x);}
  var K_ = Unsafe[1];
  return function(t16, param) {return t16.escape;}(K_, J_)(s);
}

function unescape(s) {
  function H_(x) {return call1(caml_get_public_method(x, -585010534, 16), x);}
  var I_ = Unsafe[1];
  return function(t17, param) {return t17.unescape;}(I_, H_)(s);
}

function isNaN(i) {
  function F_(x) {
    return call1(caml_get_public_method(x, -1051592975, 17), x);
  }
  var G_ = Unsafe[1];
  return function(t18, param) {return t18.isNaN;}(G_, F_)(i) | 0;
}

function parseInt(s) {
  function D_(x) {return call1(caml_get_public_method(x, -697166212, 18), x);}
  var E_ = Unsafe[1];
  var s__0 = function(t19, param) {return t19.parseInt;}(E_, D_)(s);
  return isNaN(s__0) ? call1(Pervasives[2], cst_parseInt) : s__0;
}

function parseFloat(s) {
  function B_(x) {return call1(caml_get_public_method(x, 746065001, 19), x);}
  var C_ = Unsafe[1];
  var s__0 = function(t20, param) {return t20.parseFloat;}(C_, B_)(s);
  return isNaN(s__0) ? call1(Pervasives[2], cst_parseFloat) : s__0;
}

function q_(param) {
  if (param[1] === Error) {
    var e = param[2];
    var A_ = function(x) {
      return call1(caml_get_public_method(x, 946786476, 20), x);
    };
    return [
      0,
      caml_js_to_string(function(t21, param) {return t21.toString();}(e, A_))
    ];
  }
  return 0;
}

call1(Printexc[8], q_);

function r_(e) {
  if (e instanceof array_constructor) {return 0;}
  function z_(x) {return call1(caml_get_public_method(x, 946786476, 21), x);}
  return [
    0,
    caml_js_to_string(function(t22, param) {return t22.toString();}(e, z_))
  ];
}

call1(Printexc[8], r_);

function string_of_error(e) {
  function y_(x) {return call1(caml_get_public_method(x, 946786476, 22), x);}
  return caml_js_to_string(
    function(t23, param) {return t23.toString();}(e, y_)
  );
}

function export_js(field, x) {
  runtime["caml_js_export_var"](0)[field] = x;
  return 0;
}

function export__0(field, x) {return export_js(field.toString(), x);}

function export_all(obj) {
  var keys = object_keys(obj);
  function v_(x) {return call1(caml_get_public_method(x, -994170454, 23), x);}
  var w_ = caml_js_wrap_callback(
    function(key, param, x_) {return export_js(key, obj[key]);}
  );
  return function(t25, t24, param) {return t25.forEach(t24);}(keys, w_, v_);
}

function s_(u_) {return u_;}

var Js_of_ocaml_Js = [
  0,
  null__0,
  function(t_) {return t_;},
  undefined__0,
  s_,
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
/*____hashes compiler:hashing-disabled inputs:hashing-disabled bytecode:hashing-disabled*/
