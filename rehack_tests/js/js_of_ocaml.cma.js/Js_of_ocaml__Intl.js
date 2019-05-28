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
var caml_new_string = runtime["caml_new_string"];

function caml_call1(f, a0) {
  return f.length === 1 ? f(a0) : runtime["caml_call_gen"](f, [a0]);
}

function caml_call2(f, a0, a1) {
  return f.length === 2 ? f(a0, a1) : runtime["caml_call_gen"](f, [a0,a1]);
}

function caml_call3(f, a0, a1, a2) {
  return f.length === 3 ?
    f(a0, a1, a2) :
    runtime["caml_call_gen"](f, [a0,a1,a2]);
}

var global_data = runtime["caml_get_global_data"]();
var cst__3 = caml_new_string("");
var cst__2 = caml_new_string("");
var cst__1 = caml_new_string("");
var cst__0 = caml_new_string("");
var cst = caml_new_string("");
var cst_localeMatcher = caml_new_string("localeMatcher");
var shared = [
  0,
  caml_new_string("sensitivity"),
  caml_new_string("caseFirst"),
  caml_new_string("ignorePunctuation"),
  caml_new_string("localeMatcher"),
  caml_new_string("usage"),
  caml_new_string("numeric")
];
var Js_of_ocaml_Js = global_data["Js_of_ocaml__Js"];
var CamlinternalOO = global_data["CamlinternalOO"];
var mC = [0,caml_new_string("_type"),caml_new_string("localeMatcher")];
var mD = [
  0,
  caml_new_string("year"),
  caml_new_string("weekday"),
  caml_new_string("timeZoneName"),
  caml_new_string("timeZone"),
  caml_new_string("second"),
  caml_new_string("month"),
  caml_new_string("minute"),
  caml_new_string("localeMatcher"),
  caml_new_string("hourCycle"),
  caml_new_string("hour12"),
  caml_new_string("hour"),
  caml_new_string("formatMatcher"),
  caml_new_string("era"),
  caml_new_string("day")
];
var mE = [
  0,
  caml_new_string("useGrouping"),
  caml_new_string("style"),
  caml_new_string("minimumSignificantDigits"),
  caml_new_string("minimumIntegerDigits"),
  caml_new_string("minimumFractionDigits"),
  caml_new_string("maximumSignificantDigits"),
  caml_new_string("maximumFractionDigits"),
  caml_new_string("localeMatcher"),
  caml_new_string("currencyDisplay"),
  caml_new_string("currency")
];
var mF = [0,caml_new_string("localeMatcher"),caml_new_string("_type")];
var mG = [
  0,
  caml_new_string("usage"),
  caml_new_string("sensitivity"),
  caml_new_string("numeric"),
  caml_new_string("localeMatcher"),
  caml_new_string("ignorePunctuation"),
  caml_new_string("caseFirst")
];
var mH = [
  0,
  caml_new_string("hour"),
  caml_new_string("hour12"),
  caml_new_string("year"),
  caml_new_string("minute"),
  caml_new_string("second"),
  caml_new_string("timeZone"),
  caml_new_string("hourCycle"),
  caml_new_string("day"),
  caml_new_string("era"),
  caml_new_string("localeMatcher"),
  caml_new_string("month"),
  caml_new_string("weekday"),
  caml_new_string("timeZoneName"),
  caml_new_string("formatMatcher")
];
var mI = [0,caml_new_string("localeMatcher")];
var mJ = [
  0,
  caml_new_string("minimumIntegerDigits"),
  caml_new_string("maximumFractionDigits"),
  caml_new_string("minimumFractionDigits"),
  caml_new_string("minimumSignificantDigits"),
  caml_new_string("useGrouping"),
  caml_new_string("style"),
  caml_new_string("localeMatcher"),
  caml_new_string("currencyDisplay"),
  caml_new_string("maximumSignificantDigits"),
  caml_new_string("currency")
];
var mK = [0,0,0,0];

function object_options(param) {
  function o5(self, localeMatcher) {
    if (! mK[1]) {
      var o7 = caml_call1(CamlinternalOO[16], mI);
      var o8 = caml_call2(CamlinternalOO[3], o7, cst);
      var o9 = caml_call2(CamlinternalOO[7], o7, cst_localeMatcher);
      var o_ = function(self_1) {var env = self_1[o8 + 1];return env[1];};
      caml_call3(CamlinternalOO[10], o7, o9, o_);
      var pa = function(pb) {
        var pc = caml_call2(CamlinternalOO[24], 0, o7);
        pc[o8 + 1] = pb;
        return pc;
      };
      caml_call1(CamlinternalOO[17], o7);
      mK[1] = pa;
    }
    return caml_call1(mK[1], [0,localeMatcher]);
  }
  var o6 = "best fit";
  return function(t0, param) {return {"localeMatcher": t0};}(o6, o5);
}

var mL = [0,0,0,0];

function options(param) {
  function oG(self, localeMatcher, usage, sensitivity, ignorePunctuation, numeric, caseFirst) {
    if (! mL[1]) {
      var oN = caml_call1(CamlinternalOO[16], shared);
      var oO = caml_call2(CamlinternalOO[3], oN, cst__0);
      var oP = caml_call2(CamlinternalOO[8], oN, mG);
      var oQ = oP[1];
      var oR = oP[2];
      var oS = oP[3];
      var oT = oP[4];
      var oU = oP[5];
      var oV = oP[6];
      var oW = function(self_2) {var env = self_2[oO + 1];return env[1];};
      var oX = function(self_2) {var env = self_2[oO + 1];return env[2];};
      var oY = function(self_2) {var env = self_2[oO + 1];return env[3];};
      var oZ = function(self_2) {var env = self_2[oO + 1];return env[4];};
      var o0 = function(self_2) {var env = self_2[oO + 1];return env[5];};
      var o1 = [
        0,
        oT,
        function(self_2) {var env = self_2[oO + 1];return env[6];},
        oQ,
        o0,
        oR,
        oZ,
        oU,
        oY,
        oS,
        oX,
        oV,
        oW
      ];
      caml_call2(CamlinternalOO[11], oN, o1);
      var o2 = function(o3) {
        var o4 = caml_call2(CamlinternalOO[24], 0, oN);
        o4[oO + 1] = o3;
        return o4;
      };
      caml_call1(CamlinternalOO[17], oN);
      mL[1] = o2;
    }
    return caml_call1(
      mL[1],
      [0,caseFirst,numeric,ignorePunctuation,sensitivity,usage,localeMatcher]
    );
  }
  var oH = "false";
  var oI = Js_of_ocaml_Js[8];
  var oJ = Js_of_ocaml_Js[8];
  var oK = "variant";
  var oL = "sort";
  var oM = "best fit";
  return function(t1, t2, t3, t4, t5, t6, param) {
    return {
      "localeMatcher": t1,
      "usage": t2,
      "sensitivity": t3,
      "ignorePunctuation": t4,
      "numeric": t5,
      "caseFirst": t6
    };
  }(oM, oL, oK, oJ, oI, oH, oG
  );
}

var Collator = [0,object_options,options];
var mM = [0,0,0,0];

function options__0(param) {
  function nU(self, localeMatcher, timeZone, hour12, hourCycle, formatMatcher, weekday, era, year, month, day, hour, minute, second, timeZoneName) {
    if (! mM[1]) {
      var n9 = caml_call1(CamlinternalOO[16], mH);
      var n_ = caml_call2(CamlinternalOO[3], n9, cst__1);
      var oa = caml_call2(CamlinternalOO[8], n9, mD);
      var ob = oa[1];
      var oc = oa[2];
      var od = oa[3];
      var oe = oa[4];
      var of = oa[5];
      var og = oa[6];
      var oh = oa[7];
      var oi = oa[8];
      var oj = oa[9];
      var ok = oa[10];
      var ol = oa[11];
      var om = oa[12];
      var on = oa[13];
      var oo = oa[14];
      var op = function(self_3) {var env = self_3[n_ + 1];return env[1];};
      var oq = function(self_3) {var env = self_3[n_ + 1];return env[2];};
      var or = function(self_3) {var env = self_3[n_ + 1];return env[3];};
      var os = function(self_3) {var env = self_3[n_ + 1];return env[4];};
      var ot = function(self_3) {var env = self_3[n_ + 1];return env[5];};
      var ou = function(self_3) {var env = self_3[n_ + 1];return env[6];};
      var ov = function(self_3) {var env = self_3[n_ + 1];return env[7];};
      var ow = function(self_3) {var env = self_3[n_ + 1];return env[8];};
      var ox = function(self_3) {var env = self_3[n_ + 1];return env[9];};
      var oy = function(self_3) {var env = self_3[n_ + 1];return env[10];};
      var oz = function(self_3) {var env = self_3[n_ + 1];return env[11];};
      var oA = function(self_3) {var env = self_3[n_ + 1];return env[12];};
      var oB = function(self_3) {var env = self_3[n_ + 1];return env[13];};
      var oC = [
        0,
        oi,
        function(self_3) {var env = self_3[n_ + 1];return env[14];},
        oe,
        oB,
        ok,
        oA,
        oj,
        oz,
        om,
        oy,
        oc,
        ox,
        on,
        ow,
        ob,
        ov,
        og,
        ou,
        oo,
        ot,
        ol,
        os,
        oh,
        or,
        of,
        oq,
        od,
        op
      ];
      caml_call2(CamlinternalOO[11], n9, oC);
      var oD = function(oE) {
        var oF = caml_call2(CamlinternalOO[24], 0, n9);
        oF[n_ + 1] = oE;
        return oF;
      };
      caml_call1(CamlinternalOO[17], n9);
      mM[1] = oD;
    }
    return caml_call1(
      mM[1],
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
  var nV = Js_of_ocaml_Js[3];
  var nW = Js_of_ocaml_Js[3];
  var nX = Js_of_ocaml_Js[3];
  var nY = Js_of_ocaml_Js[3];
  var nZ = Js_of_ocaml_Js[3];
  var n0 = Js_of_ocaml_Js[3];
  var n1 = Js_of_ocaml_Js[3];
  var n2 = Js_of_ocaml_Js[3];
  var n3 = Js_of_ocaml_Js[3];
  var n4 = "best fit";
  var n5 = Js_of_ocaml_Js[3];
  var n6 = Js_of_ocaml_Js[3];
  var n7 = Js_of_ocaml_Js[3];
  var n8 = "best fit";
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
  }(n8, n7, n6, n5, n4, n3, n2, n1, n0, nZ, nY, nX, nW, nV, nU
  );
}

var DateTimeFormat = [0,object_options,options__0];
var mN = [0,0,0,0];

function options__1(param) {
  function nj(self, localeMatcher, style, currency, currencyDisplay, useGrouping, minimumIntegerDigits, minimumFractionDigits, maximumFractionDigits, minimumSignificantDigits, maximumSignificantDigits) {
    if (! mN[1]) {
      var nu = caml_call1(CamlinternalOO[16], mJ);
      var nv = caml_call2(CamlinternalOO[3], nu, cst__2);
      var nw = caml_call2(CamlinternalOO[8], nu, mE);
      var nx = nw[1];
      var ny = nw[2];
      var nz = nw[3];
      var nA = nw[4];
      var nB = nw[5];
      var nC = nw[6];
      var nD = nw[7];
      var nE = nw[8];
      var nF = nw[9];
      var nG = nw[10];
      var nH = function(self_4) {var env = self_4[nv + 1];return env[1];};
      var nI = function(self_4) {var env = self_4[nv + 1];return env[2];};
      var nJ = function(self_4) {var env = self_4[nv + 1];return env[3];};
      var nK = function(self_4) {var env = self_4[nv + 1];return env[4];};
      var nL = function(self_4) {var env = self_4[nv + 1];return env[5];};
      var nM = function(self_4) {var env = self_4[nv + 1];return env[6];};
      var nN = function(self_4) {var env = self_4[nv + 1];return env[7];};
      var nO = function(self_4) {var env = self_4[nv + 1];return env[8];};
      var nP = function(self_4) {var env = self_4[nv + 1];return env[9];};
      var nQ = [
        0,
        nE,
        function(self_4) {var env = self_4[nv + 1];return env[10];},
        ny,
        nP,
        nG,
        nO,
        nF,
        nN,
        nx,
        nM,
        nA,
        nL,
        nB,
        nK,
        nD,
        nJ,
        nz,
        nI,
        nC,
        nH
      ];
      caml_call2(CamlinternalOO[11], nu, nQ);
      var nR = function(nS) {
        var nT = caml_call2(CamlinternalOO[24], 0, nu);
        nT[nv + 1] = nS;
        return nT;
      };
      caml_call1(CamlinternalOO[17], nu);
      mN[1] = nR;
    }
    return caml_call1(
      mN[1],
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
  var nk = Js_of_ocaml_Js[3];
  var nl = Js_of_ocaml_Js[3];
  var nm = Js_of_ocaml_Js[3];
  var nn = Js_of_ocaml_Js[3];
  var no = Js_of_ocaml_Js[3];
  var np = Js_of_ocaml_Js[7];
  var nq = Js_of_ocaml_Js[3];
  var nr = Js_of_ocaml_Js[3];
  var ns = "decimal";
  var nt = "best fit";
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
  }(nt, ns, nr, nq, np, no, nn, nm, nl, nk, nj
  );
}

var NumberFormat = [0,object_options,options__1];
var mO = [0,0,0,0];

function options__2(param) {
  function m7(self, localeMatcher, type) {
    if (! mO[1]) {
      var m_ = caml_call1(CamlinternalOO[16], mC);
      var na = caml_call2(CamlinternalOO[3], m_, cst__3);
      var nb = caml_call2(CamlinternalOO[8], m_, mF);
      var nc = nb[1];
      var nd = nb[2];
      var ne = function(self_5) {var env = self_5[na + 1];return env[1];};
      var nf = [
        0,
        nc,
        function(self_5) {var env = self_5[na + 1];return env[2];},
        nd,
        ne
      ];
      caml_call2(CamlinternalOO[11], m_, nf);
      var ng = function(nh) {
        var ni = caml_call2(CamlinternalOO[24], 0, m_);
        ni[na + 1] = nh;
        return ni;
      };
      caml_call1(CamlinternalOO[17], m_);
      mO[1] = ng;
    }
    return caml_call1(mO[1], [0,type,localeMatcher]);
  }
  var m8 = "cardinal";
  var m9 = "best fit";
  return function(t31, t32, param) {
    return {"localeMatcher": t31,"type": t32};
  }(m9, m8, m7
  );
}

var PluralRules = [0,object_options,options__2];

function mP(x) {
  return caml_call1(caml_get_public_method(x, -475689828, 237), x);
}

var mQ = Js_of_ocaml_Js[50][1];
var intl = function(t33, param) {return t33.Intl;}(mQ, mP);

function mR(x) {
  return caml_call1(caml_get_public_method(x, -438302079, 238), x);
}

function mS(x) {
  return caml_call1(caml_get_public_method(x, -475689828, 239), x);
}

var mT = Js_of_ocaml_Js[50][1];
var mU = function(t34, param) {return t34.Intl;}(mT, mS);
var collator_constr = function(t35, param) {return t35.Collator;}(mU, mR);

function mV(x) {
  return caml_call1(caml_get_public_method(x, 568382385, 240), x);
}

function mW(x) {
  return caml_call1(caml_get_public_method(x, -475689828, 241), x);
}

var mX = Js_of_ocaml_Js[50][1];
var mY = function(t36, param) {return t36.Intl;}(mX, mW);
var dateTimeFormat_constr = function(t37, param) {return t37.DateTimeFormat;}(mY, mV
);

function mZ(x) {
  return caml_call1(caml_get_public_method(x, 941696479, 242), x);
}

function m0(x) {
  return caml_call1(caml_get_public_method(x, -475689828, 243), x);
}

var m1 = Js_of_ocaml_Js[50][1];
var m2 = function(t38, param) {return t38.Intl;}(m1, m0);
var numberFormat_constr = function(t39, param) {return t39.NumberFormat;}(m2, mZ
);

function m3(x) {
  return caml_call1(caml_get_public_method(x, 544366260, 244), x);
}

function m4(x) {
  return caml_call1(caml_get_public_method(x, -475689828, 245), x);
}

var m5 = Js_of_ocaml_Js[50][1];
var m6 = function(t40, param) {return t40.Intl;}(m5, m4);
var pluralRules_constr = function(t41, param) {return t41.PluralRules;}(m6, m3
);

function is_supported(param) {return caml_call1(Js_of_ocaml_Js[6][5], intl);}

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