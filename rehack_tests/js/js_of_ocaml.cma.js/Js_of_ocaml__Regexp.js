/**
 * Js_of_ocaml__Regexp
 * @providesModule Js_of_ocaml__Regexp
 */
"use strict";
var Js_of_ocaml__Js = require('Js_of_ocaml__Js.js');
var Pervasives = require('Pervasives.js');
var Assert_failure = require('Assert_failure.js');
var runtime = require('runtime.js');

let joo_global_object = global;


var runtime = joo_global_object.jsoo_runtime;
var caml_get_public_method = runtime["caml_get_public_method"];
var caml_js_to_byte_string = runtime["caml_js_to_byte_string"];
var caml_jsbytes_of_string = runtime["caml_jsbytes_of_string"];
var string = runtime["caml_new_string"];

function call1(f, a0) {
  return f.length === 1 ? f(a0) : runtime["caml_call_gen"](f, [a0]);
}

function call2(f, a0, a1) {
  return f.length === 2 ? f(a0, a1) : runtime["caml_call_gen"](f, [a0,a1]);
}

var global_data = runtime["caml_get_global_data"]();
var cst_g = string("g");
var cst = string("[\\][()\\\\|+*.?{}^$]");
var Js_of_ocaml_Js = global_data["Js_of_ocaml__Js"];
var Assert_failure = global_data["Assert_failure"];
var Pervasives = global_data["Pervasives"];
var a = [0,string("lib/js_of_ocaml/regexp.ml"),33,64];

function regexp(s) {
  var al = 0;
  var am = "g";
  var an = caml_jsbytes_of_string(s);
  var ao = Js_of_ocaml_Js[11];
  return function(t2, t0, t1, param) {return new t2(t0, t1);}(ao, an, am, al);
}

function regexp_case_fold(s) {
  var ah = 0;
  var ai = "gi";
  var aj = caml_jsbytes_of_string(s);
  var ak = Js_of_ocaml_Js[11];
  return function(t5, t3, t4, param) {return new t5(t3, t4);}(ak, aj, ai, ah);
}

function regexp_with_flag(s, f) {
  var ae = call2(Pervasives[16], cst_g, f).toString();
  var ad = 0;
  var af = caml_jsbytes_of_string(s);
  var ag = Js_of_ocaml_Js[11];
  return function(t8, t6, t7, param) {return new t8(t6, t7);}(ag, af, ae, ad);
}

function blunt_str_array_get(a__0, i) {
  function ab(param) {
    throw runtime["caml_wrap_thrown_exception"]([0,Assert_failure,a]);
  }
  var ac = call2(Js_of_ocaml_Js[16], a__0, i);
  return caml_js_to_byte_string(call2(Js_of_ocaml_Js[6][8], ac, ab));
}

function string_match(r, s, i) {
  function V(x) {return call1(caml_get_public_method(x, 180472028, 216), x);}
  (function(t12, t11, param) {t12.lastIndex = t11;return 0;}(r, i, V));
  var W = Js_of_ocaml_Js[21];
  function X(x) {
    return call1(caml_get_public_method(x, -1021447279, 217), x);
  }
  var Y = caml_jsbytes_of_string(s);
  var Z = function(t10, t9, param) {return t10.exec(t9);}(r, Y, X);
  var aa = call2(Js_of_ocaml_Js[5][3], Z, W);
  return call1(Js_of_ocaml_Js[5][10], aa);
}

function search(r, s, i) {
  function O(x) {return call1(caml_get_public_method(x, 180472028, 218), x);}
  (function(t17, t16, param) {t17.lastIndex = t16;return 0;}(r, i, O));
  function P(res_pre) {
    var res = call1(Js_of_ocaml_Js[21], res_pre);
    function U(x) {
      return call1(caml_get_public_method(x, 1041537810, 219), x);
    }
    return [0,function(t15, param) {return t15.index;}(res, U),res];
  }
  function Q(x) {
    return call1(caml_get_public_method(x, -1021447279, 220), x);
  }
  var R = caml_jsbytes_of_string(s);
  var S = function(t14, t13, param) {return t14.exec(t13);}(r, R, Q);
  var T = call2(Js_of_ocaml_Js[5][3], S, P);
  return call1(Js_of_ocaml_Js[5][10], T);
}

function matched_string(r) {return blunt_str_array_get(r, 0);}

function matched_group(r, i) {
  function K(N) {return caml_js_to_byte_string(N);}
  var L = call2(Js_of_ocaml_Js[16], r, i);
  var M = call2(Js_of_ocaml_Js[6][3], L, K);
  return call1(Js_of_ocaml_Js[6][10], M);
}

var b = 0;
var c = "g";
var d = "[$]";
var e = Js_of_ocaml_Js[11];
var quote_repl_re = function(t20, t18, t19, param) {return new t20(t18, t19);}(e, d, c, b
);

function quote_repl(s) {
  function H(x) {return call1(caml_get_public_method(x, 724060212, 221), x);}
  var I = "$$$$";
  var J = caml_jsbytes_of_string(s);
  return function(t23, t21, t22, param) {return t23.replace(t21, t22);}(J, quote_repl_re, I, H
  );
}

function global_replace(r, s, s_by) {
  function C(x) {return call1(caml_get_public_method(x, 180472028, 222), x);}
  var D = 0;
  (function(t28, t27, param) {t28.lastIndex = t27;return 0;}(r, D, C));
  function E(x) {return call1(caml_get_public_method(x, 724060212, 223), x);}
  var F = quote_repl(s_by);
  var G = caml_jsbytes_of_string(s);
  return caml_js_to_byte_string(
    function(t26, t24, t25, param) {return t26.replace(t24, t25);}(G, r, F, E)
  );
}

function replace_first(r, s, s_by) {
  function t(x) {
    return call1(caml_get_public_method(x, -1042090782, 224), x);
  }
  var match = function(t36, param) {return t36.ignoreCase;}(r, t) | 0;
  function u(x) {return call1(caml_get_public_method(x, 504484589, 225), x);}
  var match__0 = function(t37, param) {return t37.multiline;}(r, u) | 0;
  var flags = 0 === match ?
    0 === match__0 ? "" : "m" :
    0 === match__0 ? "i" : "mi";
  var v = 0;
  function w(x) {return call1(caml_get_public_method(x, 842117339, 226), x);}
  var x = function(t32, param) {return t32.source;}(r, w);
  var y = Js_of_ocaml_Js[11];
  var r__0 = function(t35, t33, t34, param) {return new t35(t33, t34);}(y, x, flags, v
  );
  function z(x) {return call1(caml_get_public_method(x, 724060212, 227), x);}
  var A = quote_repl(s_by);
  var B = caml_jsbytes_of_string(s);
  return caml_js_to_byte_string(
    function(t31, t29, t30, param) {return t31.replace(t29, t30);}(B, r__0, A, z
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
  function s(x) {return call1(caml_get_public_method(x, 520590566, 228), x);}
  return aux(0, function(t38, param) {return t38.length;}(a, s) + -1 | 0);
}

function split(r, s) {
  function n(x) {return call1(caml_get_public_method(x, 180472028, 229), x);}
  var o = 0;
  (function(t42, t41, param) {t42.lastIndex = t41;return 0;}(r, o, n));
  function p(x) {return call1(caml_get_public_method(x, -394261074, 230), x);}
  var q = caml_jsbytes_of_string(s);
  var r = function(t40, t39, param) {return t40.split(t39);}(q, r, p);
  return list_of_js_array(call1(Js_of_ocaml_Js[20], r));
}

function bounded_split(r, s, i) {
  function i(x) {return call1(caml_get_public_method(x, 180472028, 231), x);}
  var j = 0;
  (function(t47, t46, param) {t47.lastIndex = t46;return 0;}(r, j, i));
  function k(x) {return call1(caml_get_public_method(x, -203798452, 232), x);}
  var l = caml_jsbytes_of_string(s);
  var m = function(t45, t43, t44, param) {return t45.split(t43, t44);}(l, r, i, k
  );
  return list_of_js_array(call1(Js_of_ocaml_Js[20], m));
}

var quote_re = regexp(cst);

function quote(s) {
  function f(x) {return call1(caml_get_public_method(x, 724060212, 233), x);}
  var g = "\\$&";
  var h = caml_jsbytes_of_string(s);
  return caml_js_to_byte_string(
    function(t50, t48, t49, param) {return t50.replace(t48, t49);}(h, quote_re, g, f
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

runtime["caml_register_global"](34, Js_of_ocaml_Regexp, "Js_of_ocaml__Regexp");


module.exports = global.jsoo_runtime.caml_get_global_data().Js_of_ocaml__Regexp;