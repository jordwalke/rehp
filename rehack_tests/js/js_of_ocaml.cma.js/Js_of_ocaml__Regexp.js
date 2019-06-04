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
var caml_new_string = runtime["caml_new_string"];

function caml_call1(f, a0) {
  return f.length === 1 ? f(a0) : runtime["caml_call_gen"](f, [a0]);
}

function caml_call2(f, a0, a1) {
  return f.length === 2 ? f(a0, a1) : runtime["caml_call_gen"](f, [a0,a1]);
}

var global_data = runtime["caml_get_global_data"]();
var cst_g = caml_new_string("g");
var cst = caml_new_string("[\\][()\\\\|+*.?{}^$]");
var Js_of_ocaml_Js = global_data["Js_of_ocaml__Js"];
var Assert_failure = global_data["Assert_failure"];
var Pervasives = global_data["Pervasives"];
var am = [0,caml_new_string("lib/js_of_ocaml/regexp.ml"),33,64];

function regexp(s) {
  var bm = 0;
  var bn = "g";
  var bo = caml_jsbytes_of_string(s);
  var bp = Js_of_ocaml_Js[11];
  return function(t2, t0, t1, param) {return new t2(t0, t1);}(bp, bo, bn, bm);
}

function regexp_case_fold(s) {
  var bi = 0;
  var bj = "gi";
  var bk = caml_jsbytes_of_string(s);
  var bl = Js_of_ocaml_Js[11];
  return function(t5, t3, t4, param) {return new t5(t3, t4);}(bl, bk, bj, bi);
}

function regexp_with_flag(s, f) {
  var bf = caml_call2(Pervasives[16], cst_g, f).toString();
  var be = 0;
  var bg = caml_jsbytes_of_string(s);
  var bh = Js_of_ocaml_Js[11];
  return function(t8, t6, t7, param) {return new t8(t6, t7);}(bh, bg, bf, be);
}

function blunt_str_array_get(a, i) {
  function bc(param) {
    throw runtime["caml_wrap_thrown_exception"]([0,Assert_failure,am]);
  }
  var bd = caml_call2(Js_of_ocaml_Js[16], a, i);
  return caml_js_to_byte_string(caml_call2(Js_of_ocaml_Js[6][8], bd, bc));
}

function string_match(r, s, i) {
  function a7(x) {
    return caml_call1(caml_get_public_method(x, 180472028, 24), x);
  }
  (function(t12, t11, param) {t12.lastIndex = t11;return 0;}(r, i, a7));
  var a8 = Js_of_ocaml_Js[21];
  function a9(x) {
    return caml_call1(caml_get_public_method(x, -1021447279, 25), x);
  }
  var a_ = caml_jsbytes_of_string(s);
  var ba = function(t10, t9, param) {return t10.exec(t9);}(r, a_, a9);
  var bb = caml_call2(Js_of_ocaml_Js[5][3], ba, a8);
  return caml_call1(Js_of_ocaml_Js[5][10], bb);
}

function search(r, s, i) {
  function a0(x) {
    return caml_call1(caml_get_public_method(x, 180472028, 26), x);
  }
  (function(t17, t16, param) {t17.lastIndex = t16;return 0;}(r, i, a0));
  function a1(res_pre) {
    var res = caml_call1(Js_of_ocaml_Js[21], res_pre);
    function a6(x) {
      return caml_call1(caml_get_public_method(x, 1041537810, 27), x);
    }
    return [0,function(t15, param) {return t15.index;}(res, a6),res];
  }
  function a2(x) {
    return caml_call1(caml_get_public_method(x, -1021447279, 28), x);
  }
  var a3 = caml_jsbytes_of_string(s);
  var a4 = function(t14, t13, param) {return t14.exec(t13);}(r, a3, a2);
  var a5 = caml_call2(Js_of_ocaml_Js[5][3], a4, a1);
  return caml_call1(Js_of_ocaml_Js[5][10], a5);
}

function matched_string(r) {return blunt_str_array_get(r, 0);}

function matched_group(r, i) {
  function aW(aZ) {return caml_js_to_byte_string(aZ);}
  var aX = caml_call2(Js_of_ocaml_Js[16], r, i);
  var aY = caml_call2(Js_of_ocaml_Js[6][3], aX, aW);
  return caml_call1(Js_of_ocaml_Js[6][10], aY);
}

var an = 0;
var ao = "g";
var ap = "[$]";
var aq = Js_of_ocaml_Js[11];
var quote_repl_re = function(t20, t18, t19, param) {return new t20(t18, t19);}(aq, ap, ao, an
);

function quote_repl(s) {
  function aT(x) {
    return caml_call1(caml_get_public_method(x, 724060212, 29), x);
  }
  var aU = "$$$$";
  var aV = caml_jsbytes_of_string(s);
  return function(t23, t21, t22, param) {return t23.replace(t21, t22);}(aV, quote_repl_re, aU, aT
  );
}

function global_replace(r, s, s_by) {
  function aO(x) {
    return caml_call1(caml_get_public_method(x, 180472028, 30), x);
  }
  var aP = 0;
  (function(t28, t27, param) {t28.lastIndex = t27;return 0;}(r, aP, aO));
  function aQ(x) {
    return caml_call1(caml_get_public_method(x, 724060212, 31), x);
  }
  var aR = quote_repl(s_by);
  var aS = caml_jsbytes_of_string(s);
  return caml_js_to_byte_string(
    function(t26, t24, t25, param) {return t26.replace(t24, t25);}(aS, r, aR, aQ
    )
  );
}

function replace_first(r, s, s_by) {
  function aF(x) {
    return caml_call1(caml_get_public_method(x, -1042090782, 32), x);
  }
  var match = function(t36, param) {return t36.ignoreCase;}(r, aF) | 0;
  function aG(x) {
    return caml_call1(caml_get_public_method(x, 504484589, 33), x);
  }
  var match__0 = function(t37, param) {return t37.multiline;}(r, aG) | 0;
  var flags = 0 === match ?
    0 === match__0 ? "" : "m" :
    0 === match__0 ? "i" : "mi";
  var aH = 0;
  function aI(x) {
    return caml_call1(caml_get_public_method(x, 842117339, 34), x);
  }
  var aJ = function(t32, param) {return t32.source;}(r, aI);
  var aK = Js_of_ocaml_Js[11];
  var r__0 = function(t35, t33, t34, param) {return new t35(t33, t34);}(aK, aJ, flags, aH
  );
  function aL(x) {
    return caml_call1(caml_get_public_method(x, 724060212, 35), x);
  }
  var aM = quote_repl(s_by);
  var aN = caml_jsbytes_of_string(s);
  return caml_js_to_byte_string(
    function(t31, t29, t30, param) {return t31.replace(t29, t30);}(aN, r__0, aM, aL
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
  function aE(x) {
    return caml_call1(caml_get_public_method(x, 520590566, 36), x);
  }
  return aux(0, function(t38, param) {return t38.length;}(a, aE) + -1 | 0);
}

function split(r, s) {
  function az(x) {
    return caml_call1(caml_get_public_method(x, 180472028, 37), x);
  }
  var aA = 0;
  (function(t42, t41, param) {t42.lastIndex = t41;return 0;}(r, aA, az));
  function aB(x) {
    return caml_call1(caml_get_public_method(x, -394261074, 38), x);
  }
  var aC = caml_jsbytes_of_string(s);
  var aD = function(t40, t39, param) {return t40.split(t39);}(aC, r, aB);
  return list_of_js_array(caml_call1(Js_of_ocaml_Js[20], aD));
}

function bounded_split(r, s, i) {
  function au(x) {
    return caml_call1(caml_get_public_method(x, 180472028, 39), x);
  }
  var av = 0;
  (function(t47, t46, param) {t47.lastIndex = t46;return 0;}(r, av, au));
  function aw(x) {
    return caml_call1(caml_get_public_method(x, -203798452, 40), x);
  }
  var ax = caml_jsbytes_of_string(s);
  var ay = function(t45, t43, t44, param) {return t45.split(t43, t44);}(ax, r, i, aw
  );
  return list_of_js_array(caml_call1(Js_of_ocaml_Js[20], ay));
}

var quote_re = regexp(cst);

function quote(s) {
  function ar(x) {
    return caml_call1(caml_get_public_method(x, 724060212, 41), x);
  }
  var as = "\\$&";
  var at = caml_jsbytes_of_string(s);
  return caml_js_to_byte_string(
    function(t50, t48, t49, param) {return t50.replace(t48, t49);}(at, quote_re, as, ar
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