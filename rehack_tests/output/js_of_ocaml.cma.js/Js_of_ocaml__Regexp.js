/**
 * @flow strict
 * Js_of_ocaml__Regexp
 */

// @ts-check


"use strict";

var runtime = require("../runtime/runtime.js");
var caml_get_public_method = runtime["caml_get_public_method"];
var caml_js_to_byte_string = runtime["caml_js_to_byte_string"];
var caml_jsbytes_of_string = runtime["caml_jsbytes_of_string"];
var string = runtime["caml_new_string"];
var caml_wrap_thrown_exception = runtime["caml_wrap_thrown_exception"];

function call1(f, a0) {
  return f.length === 1 ? f(a0) : runtime["caml_call_gen"](f, [a0]);
}

function call2(f, a0, a1) {
  return f.length === 2 ? f(a0, a1) : runtime["caml_call_gen"](f, [a0,a1]);
}

var cst_g = string("g");
var cst = string("[\\][()\\\\|+*.?{}^$]");
var Js_of_ocaml_Js = require("./Js_of_ocaml__Js.js");
var Assert_failure = require("../runtime/Assert_failure.js");
var Pervasives = require("../stdlib.cma.js/Pervasives.js");
var a_ = [0,string("lib/js_of_ocaml/regexp.ml"),33,64];

function regexp(s) {
  var al_ = 0;
  var am_ = "g";
  var an_ = caml_jsbytes_of_string(s);
  var ao_ = Js_of_ocaml_Js[11];
  return function(t2, t0, t1, param) {return new t2(t0, t1);}(ao_, an_, am_, al_
  );
}

function regexp_case_fold(s) {
  var ah_ = 0;
  var ai_ = "gi";
  var aj_ = caml_jsbytes_of_string(s);
  var ak_ = Js_of_ocaml_Js[11];
  return function(t5, t3, t4, param) {return new t5(t3, t4);}(ak_, aj_, ai_, ah_
  );
}

function regexp_with_flag(s, f) {
  var ae_ = call2(Pervasives[16], cst_g, f).toString();
  var ad_ = 0;
  var af_ = caml_jsbytes_of_string(s);
  var ag_ = Js_of_ocaml_Js[11];
  return function(t8, t6, t7, param) {return new t8(t6, t7);}(ag_, af_, ae_, ad_
  );
}

function blunt_str_array_get(a, i) {
  function ab_(param) {
    throw caml_wrap_thrown_exception([0,Assert_failure,a_]);
  }
  var ac_ = call2(Js_of_ocaml_Js[16], a, i);
  return caml_js_to_byte_string(call2(Js_of_ocaml_Js[6][8], ac_, ab_));
}

function string_match(r, s, i) {
  function V_(x) {return call1(caml_get_public_method(x, 180472028, 216), x);}
  (function(t12, t11, param) {t12.lastIndex = t11;return 0;}(r, i, V_));
  var W_ = Js_of_ocaml_Js[21];
  function X_(x) {
    return call1(caml_get_public_method(x, -1021447279, 217), x);
  }
  var Y_ = caml_jsbytes_of_string(s);
  var Z_ = function(t10, t9, param) {return t10.exec(t9);}(r, Y_, X_);
  var aa_ = call2(Js_of_ocaml_Js[5][3], Z_, W_);
  return call1(Js_of_ocaml_Js[5][10], aa_);
}

function search(r, s, i) {
  function O_(x) {return call1(caml_get_public_method(x, 180472028, 218), x);}
  (function(t17, t16, param) {t17.lastIndex = t16;return 0;}(r, i, O_));
  function P_(res_pre) {
    var res = call1(Js_of_ocaml_Js[21], res_pre);
    function U_(x) {
      return call1(caml_get_public_method(x, 1041537810, 219), x);
    }
    return [0,function(t15, param) {return t15.index;}(res, U_),res];
  }
  function Q_(x) {
    return call1(caml_get_public_method(x, -1021447279, 220), x);
  }
  var R_ = caml_jsbytes_of_string(s);
  var S_ = function(t14, t13, param) {return t14.exec(t13);}(r, R_, Q_);
  var T_ = call2(Js_of_ocaml_Js[5][3], S_, P_);
  return call1(Js_of_ocaml_Js[5][10], T_);
}

function matched_string(r) {return blunt_str_array_get(r, 0);}

function matched_group(r, i) {
  function K_(N_) {return caml_js_to_byte_string(N_);}
  var L_ = call2(Js_of_ocaml_Js[16], r, i);
  var M_ = call2(Js_of_ocaml_Js[6][3], L_, K_);
  return call1(Js_of_ocaml_Js[6][10], M_);
}

var b_ = 0;
var c_ = "g";
var d_ = "[$]";
var e_ = Js_of_ocaml_Js[11];
var quote_repl_re = function(t20, t18, t19, param) {return new t20(t18, t19);}(e_, d_, c_, b_
);

function quote_repl(s) {
  function H_(x) {return call1(caml_get_public_method(x, 724060212, 221), x);}
  var I_ = "$$$$";
  var J_ = caml_jsbytes_of_string(s);
  return function(t23, t21, t22, param) {return t23.replace(t21, t22);}(J_, quote_repl_re, I_, H_
  );
}

function global_replace(r, s, s_by) {
  function C_(x) {return call1(caml_get_public_method(x, 180472028, 222), x);}
  var D_ = 0;
  (function(t28, t27, param) {t28.lastIndex = t27;return 0;}(r, D_, C_));
  function E_(x) {return call1(caml_get_public_method(x, 724060212, 223), x);}
  var F_ = quote_repl(s_by);
  var G_ = caml_jsbytes_of_string(s);
  return caml_js_to_byte_string(
    function(t26, t24, t25, param) {return t26.replace(t24, t25);}(G_, r, F_, E_
    )
  );
}

function replace_first(r, s, s_by) {
  function t_(x) {
    return call1(caml_get_public_method(x, -1042090782, 224), x);
  }
  var match = function(t36, param) {return t36.ignoreCase;}(r, t_) | 0;
  function u_(x) {return call1(caml_get_public_method(x, 504484589, 225), x);}
  var match__0 = function(t37, param) {return t37.multiline;}(r, u_) | 0;
  var flags = 0 === match ?
    0 === match__0 ? "" : "m" :
    0 === match__0 ? "i" : "mi";
  var v_ = 0;
  function w_(x) {return call1(caml_get_public_method(x, 842117339, 226), x);}
  var x_ = function(t32, param) {return t32.source;}(r, w_);
  var y_ = Js_of_ocaml_Js[11];
  var r__0 = function(t35, t33, t34, param) {return new t35(t33, t34);}(y_, x_, flags, v_
  );
  function z_(x) {return call1(caml_get_public_method(x, 724060212, 227), x);}
  var A_ = quote_repl(s_by);
  var B_ = caml_jsbytes_of_string(s);
  return caml_js_to_byte_string(
    function(t31, t29, t30, param) {return t31.replace(t29, t30);}(B_, r__0, A_, z_
    )
  );
}

function list_of_js_array(a) {
  function aux(accu, idx) {
    var accu__0 = accu;
    var idx__0 = idx;
    for (; ; ) {
      if (0 <= idx__0) {
        var idx__1 = idx__0 + -1 | 0;
        var accu__1 = [0,blunt_str_array_get(a, idx__0),accu__0];
        var accu__0 = accu__1;
        var idx__0 = idx__1;
        continue;
      }
      return accu__0;
    }
  }
  function s_(x) {return call1(caml_get_public_method(x, 520590566, 228), x);}
  return aux(0, function(t38, param) {return t38.length;}(a, s_) + -1 | 0);
}

function split(r, s) {
  function n_(x) {return call1(caml_get_public_method(x, 180472028, 229), x);}
  var o_ = 0;
  (function(t42, t41, param) {t42.lastIndex = t41;return 0;}(r, o_, n_));
  function p_(x) {
    return call1(caml_get_public_method(x, -394261074, 230), x);
  }
  var q_ = caml_jsbytes_of_string(s);
  var r_ = function(t40, t39, param) {return t40.split(t39);}(q_, r, p_);
  return list_of_js_array(call1(Js_of_ocaml_Js[20], r_));
}

function bounded_split(r, s, i) {
  function i_(x) {return call1(caml_get_public_method(x, 180472028, 231), x);}
  var j_ = 0;
  (function(t47, t46, param) {t47.lastIndex = t46;return 0;}(r, j_, i_));
  function k_(x) {
    return call1(caml_get_public_method(x, -203798452, 232), x);
  }
  var l_ = caml_jsbytes_of_string(s);
  var m_ = function(t45, t43, t44, param) {return t45.split(t43, t44);}(l_, r, i, k_
  );
  return list_of_js_array(call1(Js_of_ocaml_Js[20], m_));
}

var quote_re = regexp(cst);

function quote(s) {
  function f_(x) {return call1(caml_get_public_method(x, 724060212, 233), x);}
  var g_ = "\\$&";
  var h_ = caml_jsbytes_of_string(s);
  return caml_js_to_byte_string(
    function(t50, t48, t49, param) {return t50.replace(t48, t49);}(h_, quote_re, g_, f_
    )
  );
}

function regexp_string(s) {return regexp(quote(s));}

function regexp_string_case_fold(s) {return regexp_case_fold(quote(s));}

var Js_of_ocaml_Regexp = [
  0,
  regexp,
  regexp_case_fold,
  regexp_with_flag,
  quote,
  regexp_string,
  regexp_string_case_fold,
  string_match,
  search,
  search,
  matched_string,
  matched_group,
  global_replace,
  replace_first,
  split,
  bounded_split
];

exports = Js_of_ocaml_Regexp;

/*::type Exports = {
  regexp: (s: any) => any,
  regexp_case_fold: (s: any) => any,
  regexp_with_flag: (s: any, f: any) => any,
  quote: (s: any) => any,
  regexp_string: (s: any) => any,
  regexp_string_case_fold: (s: any) => any,
  string_match: (r: any, s: any, i: any) => any,
  search: (r: any, s: any, i: any) => any,
  matched_string: (r: any) => any,
  matched_group: (r: any, i: any) => any,
  global_replace: (r: any, s: any, s_by: any) => any,
  replace_first: (r: any, s: any, s_by: any) => any,
  split: (r: any, s: any) => any,
  bounded_split: (r: any, s: any, i: any) => any,
}*/
/** @type {{
  regexp: (s: any) => any,
  regexp_case_fold: (s: any) => any,
  regexp_with_flag: (s: any, f: any) => any,
  quote: (s: any) => any,
  regexp_string: (s: any) => any,
  regexp_string_case_fold: (s: any) => any,
  string_match: (r: any, s: any, i: any) => any,
  search: (r: any, s: any, i: any) => any,
  matched_string: (r: any) => any,
  matched_group: (r: any, i: any) => any,
  global_replace: (r: any, s: any, s_by: any) => any,
  replace_first: (r: any, s: any, s_by: any) => any,
  split: (r: any, s: any) => any,
  bounded_split: (r: any, s: any, i: any) => any,
}} */
module.exports = ((exports /*:: : any*/) /*:: :Exports */);
module.exports.regexp = module.exports[1];
module.exports.regexp_case_fold = module.exports[2];
module.exports.regexp_with_flag = module.exports[3];
module.exports.quote = module.exports[4];
module.exports.regexp_string = module.exports[5];
module.exports.regexp_string_case_fold = module.exports[6];
module.exports.string_match = module.exports[7];
module.exports.search = module.exports[8];
module.exports.matched_string = module.exports[10];
module.exports.matched_group = module.exports[11];
module.exports.global_replace = module.exports[12];
module.exports.replace_first = module.exports[13];
module.exports.split = module.exports[14];
module.exports.bounded_split = module.exports[15];

/* Hashing disabled */
