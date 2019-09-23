/**
 * Js_of_ocaml__Intl
 * @providesModule Js_of_ocaml__Intl
 */
"use strict";
var CamlinternalOO = require('CamlinternalOO.js');
var Js_of_ocaml__Js = require('Js_of_ocaml__Js.js');
var runtime = require('runtime.js');

let joo_global_object = global;


var runtime = joo_global_object.jsoo_runtime;
var caml_get_public_method = runtime["caml_get_public_method"];
var string = runtime["caml_new_string"];

function call1(f, a0) {
  return f.length === 1 ? f(a0) : runtime["caml_call_gen"](f, [a0]);
}

function call2(f, a0, a1) {
  return f.length === 2 ? f(a0, a1) : runtime["caml_call_gen"](f, [a0,a1]);
}

function call3(f, a0, a1, a2) {
  return f.length === 3 ?
    f(a0, a1, a2) :
    runtime["caml_call_gen"](f, [a0,a1,a2]);
}

var global_data = runtime["caml_get_global_data"]();
var cst__3 = string("");
var cst__2 = string("");
var cst__1 = string("");
var cst__0 = string("");
var cst = string("");
var cst_localeMatcher = string("localeMatcher");
var shared = [
  0,
  string("sensitivity"),
  string("caseFirst"),
  string("ignorePunctuation"),
  string("localeMatcher"),
  string("usage"),
  string("numeric")
];
var Js_of_ocaml_Js = global_data["Js_of_ocaml__Js"];
var CamlinternalOO = global_data["CamlinternalOO"];
var a = [0,string("_type"),string("localeMatcher")];
var b = [
  0,
  string("year"),
  string("weekday"),
  string("timeZoneName"),
  string("timeZone"),
  string("second"),
  string("month"),
  string("minute"),
  string("localeMatcher"),
  string("hourCycle"),
  string("hour12"),
  string("hour"),
  string("formatMatcher"),
  string("era"),
  string("day")
];
var c = [
  0,
  string("useGrouping"),
  string("style"),
  string("minimumSignificantDigits"),
  string("minimumIntegerDigits"),
  string("minimumFractionDigits"),
  string("maximumSignificantDigits"),
  string("maximumFractionDigits"),
  string("localeMatcher"),
  string("currencyDisplay"),
  string("currency")
];
var d = [0,string("localeMatcher"),string("_type")];
var e = [
  0,
  string("usage"),
  string("sensitivity"),
  string("numeric"),
  string("localeMatcher"),
  string("ignorePunctuation"),
  string("caseFirst")
];
var f = [
  0,
  string("hour"),
  string("hour12"),
  string("year"),
  string("minute"),
  string("second"),
  string("timeZone"),
  string("hourCycle"),
  string("day"),
  string("era"),
  string("localeMatcher"),
  string("month"),
  string("weekday"),
  string("timeZoneName"),
  string("formatMatcher")
];
var g = [0,string("localeMatcher")];
var h = [
  0,
  string("minimumIntegerDigits"),
  string("maximumFractionDigits"),
  string("minimumFractionDigits"),
  string("minimumSignificantDigits"),
  string("useGrouping"),
  string("style"),
  string("localeMatcher"),
  string("currencyDisplay"),
  string("maximumSignificantDigits"),
  string("currency")
];
var i = [0,0,0,0];

function object_options(param) {
  function bO(self, localeMatcher) {
    if (! i[1]) {
      var bQ = call1(CamlinternalOO[16], g);
      var bR = call2(CamlinternalOO[3], bQ, cst);
      var bS = call2(CamlinternalOO[7], bQ, cst_localeMatcher);
      var bT = function(self_1) {var env = self_1[bR + 1];return env[1];};
      call3(CamlinternalOO[10], bQ, bS, bT);
      var bU = function(bV) {
        var bW = call2(CamlinternalOO[24], 0, bQ);
        bW[bR + 1] = bV;
        return bW;
      };
      call1(CamlinternalOO[17], bQ);
      i[1] = bU;
    }
    return call1(i[1], [0,localeMatcher]);
  }
  var bP = "best fit";
  return function(t0, param) {return {"localeMatcher": t0};}(bP, bO);
}

var j = [0,0,0,0];

function options(param) {
  function bp(self, localeMatcher, usage, sensitivity, ignorePunctuation, numeric, caseFirst) {
    if (! j[1]) {
      var bw = call1(CamlinternalOO[16], shared);
      var bx = call2(CamlinternalOO[3], bw, cst__0);
      var by = call2(CamlinternalOO[8], bw, e);
      var bz = by[1];
      var bA = by[2];
      var bB = by[3];
      var bC = by[4];
      var bD = by[5];
      var bE = by[6];
      var bF = function(self_2) {var env = self_2[bx + 1];return env[1];};
      var bG = function(self_2) {var env = self_2[bx + 1];return env[2];};
      var bH = function(self_2) {var env = self_2[bx + 1];return env[3];};
      var bI = function(self_2) {var env = self_2[bx + 1];return env[4];};
      var bJ = function(self_2) {var env = self_2[bx + 1];return env[5];};
      var bK = [
        0,
        bC,
        function(self_2) {var env = self_2[bx + 1];return env[6];},
        bz,
        bJ,
        bA,
        bI,
        bD,
        bH,
        bB,
        bG,
        bE,
        bF
      ];
      call2(CamlinternalOO[11], bw, bK);
      var bL = function(bM) {
        var bN = call2(CamlinternalOO[24], 0, bw);
        bN[bx + 1] = bM;
        return bN;
      };
      call1(CamlinternalOO[17], bw);
      j[1] = bL;
    }
    return call1(
      j[1],
      [0,caseFirst,numeric,ignorePunctuation,sensitivity,usage,localeMatcher]
    );
  }
  var bq = "false";
  var br = Js_of_ocaml_Js[8];
  var bs = Js_of_ocaml_Js[8];
  var bt = "variant";
  var bu = "sort";
  var bv = "best fit";
  return function(t1, t2, t3, t4, t5, t6, param) {
    return {
      "localeMatcher": t1,
      "usage": t2,
      "sensitivity": t3,
      "ignorePunctuation": t4,
      "numeric": t5,
      "caseFirst": t6
    };
  }(bv, bu, bt, bs, br, bq, bp
  );
}

var Collator = [0,object_options,options];
var k = [0,0,0,0];

function options__0(param) {
  function aD(self, localeMatcher, timeZone, hour12, hourCycle, formatMatcher, weekday, era, year, month, day, hour, minute, second, timeZoneName) {
    if (! k[1]) {
      var aS = call1(CamlinternalOO[16], f);
      var aT = call2(CamlinternalOO[3], aS, cst__1);
      var aU = call2(CamlinternalOO[8], aS, b);
      var aV = aU[1];
      var aW = aU[2];
      var aX = aU[3];
      var aY = aU[4];
      var aZ = aU[5];
      var a0 = aU[6];
      var a1 = aU[7];
      var a2 = aU[8];
      var a3 = aU[9];
      var a4 = aU[10];
      var a5 = aU[11];
      var a6 = aU[12];
      var a7 = aU[13];
      var a8 = aU[14];
      var a9 = function(self_3) {var env = self_3[aT + 1];return env[1];};
      var a_ = function(self_3) {var env = self_3[aT + 1];return env[2];};
      var ba = function(self_3) {var env = self_3[aT + 1];return env[3];};
      var bb = function(self_3) {var env = self_3[aT + 1];return env[4];};
      var bc = function(self_3) {var env = self_3[aT + 1];return env[5];};
      var bd = function(self_3) {var env = self_3[aT + 1];return env[6];};
      var be = function(self_3) {var env = self_3[aT + 1];return env[7];};
      var bf = function(self_3) {var env = self_3[aT + 1];return env[8];};
      var bg = function(self_3) {var env = self_3[aT + 1];return env[9];};
      var bh = function(self_3) {var env = self_3[aT + 1];return env[10];};
      var bi = function(self_3) {var env = self_3[aT + 1];return env[11];};
      var bj = function(self_3) {var env = self_3[aT + 1];return env[12];};
      var bk = function(self_3) {var env = self_3[aT + 1];return env[13];};
      var bl = [
        0,
        a2,
        function(self_3) {var env = self_3[aT + 1];return env[14];},
        aY,
        bk,
        a4,
        bj,
        a3,
        bi,
        a6,
        bh,
        aW,
        bg,
        a7,
        bf,
        aV,
        be,
        a0,
        bd,
        a8,
        bc,
        a5,
        bb,
        a1,
        ba,
        aZ,
        a_,
        aX,
        a9
      ];
      call2(CamlinternalOO[11], aS, bl);
      var bm = function(bn) {
        var bo = call2(CamlinternalOO[24], 0, aS);
        bo[aT + 1] = bn;
        return bo;
      };
      call1(CamlinternalOO[17], aS);
      k[1] = bm;
    }
    return call1(
      k[1],
      [
        0,
        timeZoneName,
        second,
        minute,
        hour,
        day,
        month,
        year,
        era,
        weekday,
        formatMatcher,
        hourCycle,
        hour12,
        timeZone,
        localeMatcher
      ]
    );
  }
  var aE = Js_of_ocaml_Js[3];
  var aF = Js_of_ocaml_Js[3];
  var aG = Js_of_ocaml_Js[3];
  var aH = Js_of_ocaml_Js[3];
  var aI = Js_of_ocaml_Js[3];
  var aJ = Js_of_ocaml_Js[3];
  var aK = Js_of_ocaml_Js[3];
  var aL = Js_of_ocaml_Js[3];
  var aM = Js_of_ocaml_Js[3];
  var aN = "best fit";
  var aO = Js_of_ocaml_Js[3];
  var aP = Js_of_ocaml_Js[3];
  var aQ = Js_of_ocaml_Js[3];
  var aR = "best fit";
  return function(t7, t8, t9, t10, t11, t12, t13, t14, t15, t16, t17, t18, t19, t20, param) {
    return {
      "localeMatcher": t7,
      "timeZone": t8,
      "hour12": t9,
      "hourCycle": t10,
      "formatMatcher": t11,
      "weekday": t12,
      "era": t13,
      "year": t14,
      "month": t15,
      "day": t16,
      "hour": t17,
      "minute": t18,
      "second": t19,
      "timeZoneName": t20
    };
  }(aR, aQ, aP, aO, aN, aM, aL, aK, aJ, aI, aH, aG, aF, aE, aD
  );
}

var DateTimeFormat = [0,object_options,options__0];
var l = [0,0,0,0];

function options__1(param) {
  function S(self, localeMatcher, style, currency, currencyDisplay, useGrouping, minimumIntegerDigits, minimumFractionDigits, maximumFractionDigits, minimumSignificantDigits, maximumSignificantDigits) {
    if (! l[1]) {
      var ad = call1(CamlinternalOO[16], h);
      var ae = call2(CamlinternalOO[3], ad, cst__2);
      var af = call2(CamlinternalOO[8], ad, c);
      var ag = af[1];
      var ah = af[2];
      var ai = af[3];
      var aj = af[4];
      var ak = af[5];
      var al = af[6];
      var am = af[7];
      var an = af[8];
      var ao = af[9];
      var ap = af[10];
      var aq = function(self_4) {var env = self_4[ae + 1];return env[1];};
      var ar = function(self_4) {var env = self_4[ae + 1];return env[2];};
      var as = function(self_4) {var env = self_4[ae + 1];return env[3];};
      var at = function(self_4) {var env = self_4[ae + 1];return env[4];};
      var au = function(self_4) {var env = self_4[ae + 1];return env[5];};
      var av = function(self_4) {var env = self_4[ae + 1];return env[6];};
      var aw = function(self_4) {var env = self_4[ae + 1];return env[7];};
      var ax = function(self_4) {var env = self_4[ae + 1];return env[8];};
      var ay = function(self_4) {var env = self_4[ae + 1];return env[9];};
      var az = [
        0,
        an,
        function(self_4) {var env = self_4[ae + 1];return env[10];},
        ah,
        ay,
        ap,
        ax,
        ao,
        aw,
        ag,
        av,
        aj,
        au,
        ak,
        at,
        am,
        as,
        ai,
        ar,
        al,
        aq
      ];
      call2(CamlinternalOO[11], ad, az);
      var aA = function(aB) {
        var aC = call2(CamlinternalOO[24], 0, ad);
        aC[ae + 1] = aB;
        return aC;
      };
      call1(CamlinternalOO[17], ad);
      l[1] = aA;
    }
    return call1(
      l[1],
      [
        0,
        maximumSignificantDigits,
        minimumSignificantDigits,
        maximumFractionDigits,
        minimumFractionDigits,
        minimumIntegerDigits,
        useGrouping,
        currencyDisplay,
        currency,
        style,
        localeMatcher
      ]
    );
  }
  var T = Js_of_ocaml_Js[3];
  var U = Js_of_ocaml_Js[3];
  var V = Js_of_ocaml_Js[3];
  var W = Js_of_ocaml_Js[3];
  var X = Js_of_ocaml_Js[3];
  var Y = Js_of_ocaml_Js[7];
  var Z = Js_of_ocaml_Js[3];
  var aa = Js_of_ocaml_Js[3];
  var ab = "decimal";
  var ac = "best fit";
  return function(t21, t22, t23, t24, t25, t26, t27, t28, t29, t30, param) {
    return {
      "localeMatcher": t21,
      "style": t22,
      "currency": t23,
      "currencyDisplay": t24,
      "useGrouping": t25,
      "minimumIntegerDigits": t26,
      "minimumFractionDigits": t27,
      "maximumFractionDigits": t28,
      "minimumSignificantDigits": t29,
      "maximumSignificantDigits": t30
    };
  }(ac, ab, aa, Z, Y, X, W, V, U, T, S
  );
}

var NumberFormat = [0,object_options,options__1];
var m = [0,0,0,0];

function options__2(param) {
  function F(self, localeMatcher, type) {
    if (! m[1]) {
      var I = call1(CamlinternalOO[16], a);
      var J = call2(CamlinternalOO[3], I, cst__3);
      var K = call2(CamlinternalOO[8], I, d);
      var L = K[1];
      var M = K[2];
      var N = function(self_5) {var env = self_5[J + 1];return env[1];};
      var O = [
        0,
        L,
        function(self_5) {var env = self_5[J + 1];return env[2];},
        M,
        N
      ];
      call2(CamlinternalOO[11], I, O);
      var P = function(Q) {
        var R = call2(CamlinternalOO[24], 0, I);
        R[J + 1] = Q;
        return R;
      };
      call1(CamlinternalOO[17], I);
      m[1] = P;
    }
    return call1(m[1], [0,type,localeMatcher]);
  }
  var G = "cardinal";
  var H = "best fit";
  return function(t31, t32, param) {
    return {"localeMatcher": t31,"type": t32};
  }(H, G, F
  );
}

var PluralRules = [0,object_options,options__2];

function n(x) {return call1(caml_get_public_method(x, -475689828, 300), x);}

var o = Js_of_ocaml_Js[50][1];
var intl = function(t33, param) {return t33.Intl;}(o, n);

function p(x) {return call1(caml_get_public_method(x, -438302079, 301), x);}

function q(x) {return call1(caml_get_public_method(x, -475689828, 302), x);}

var r = Js_of_ocaml_Js[50][1];
var s = function(t34, param) {return t34.Intl;}(r, q);
var collator_constr = function(t35, param) {return t35.Collator;}(s, p);

function t(x) {return call1(caml_get_public_method(x, 568382385, 303), x);}

function u(x) {return call1(caml_get_public_method(x, -475689828, 304), x);}

var v = Js_of_ocaml_Js[50][1];
var w = function(t36, param) {return t36.Intl;}(v, u);
var dateTimeFormat_constr = function(t37, param) {return t37.DateTimeFormat;}(w, t
);

function x(x) {return call1(caml_get_public_method(x, 941696479, 305), x);}

function y(x) {return call1(caml_get_public_method(x, -475689828, 306), x);}

var z = Js_of_ocaml_Js[50][1];
var A = function(t38, param) {return t38.Intl;}(z, y);
var numberFormat_constr = function(t39, param) {return t39.NumberFormat;}(A, x
);

function B(x) {return call1(caml_get_public_method(x, 544366260, 307), x);}

function C(x) {return call1(caml_get_public_method(x, -475689828, 308), x);}

var D = Js_of_ocaml_Js[50][1];
var E = function(t40, param) {return t40.Intl;}(D, C);
var pluralRules_constr = function(t41, param) {return t41.PluralRules;}(E, B);

function is_supported(param) {return call1(Js_of_ocaml_Js[6][5], intl);}

var Js_of_ocaml_Intl = [
  0,
  Collator,
  DateTimeFormat,
  NumberFormat,
  PluralRules,
  intl,
  collator_constr,
  dateTimeFormat_constr,
  numberFormat_constr,
  pluralRules_constr,
  is_supported
];

runtime["caml_register_global"](70, Js_of_ocaml_Intl, "Js_of_ocaml__Intl");


module.exports = global.jsoo_runtime.caml_get_global_data().Js_of_ocaml__Intl;