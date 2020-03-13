/**
 * @flow strict
 * Js_of_ocaml__Intl
 */

// @ts-check


"use strict";

var runtime = require("../runtime/runtime.js");
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
var Js_of_ocaml_Js = require("./Js_of_ocaml__Js.js");
var CamlinternalOO = require("../stdlib.cma.js/CamlinternalOO.js");
var a_ = [0,string("_type"),string("localeMatcher")];
var b_ = [
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
var c_ = [
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
var d_ = [0,string("localeMatcher"),string("_type")];
var e_ = [
  0,
  string("usage"),
  string("sensitivity"),
  string("numeric"),
  string("localeMatcher"),
  string("ignorePunctuation"),
  string("caseFirst")
];
var f_ = [
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
var g_ = [0,string("localeMatcher")];
var h_ = [
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
var i_ = [0,0,0,0];

function object_options(param) {
  function bO_(self, localeMatcher) {
    if (! i_[1]) {
      var bQ_ = call1(CamlinternalOO[16], g_);
      var bR_ = call2(CamlinternalOO[3], bQ_, cst);
      var bS_ = call2(CamlinternalOO[7], bQ_, cst_localeMatcher);
      var bT_ = function(self_1) {var env = self_1[bR_ + 1];return env[1];};
      call3(CamlinternalOO[10], bQ_, bS_, bT_);
      var bU_ = function(bV_) {
        var bW_ = call2(CamlinternalOO[24], 0, bQ_);
        bW_[bR_ + 1] = bV_;
        return bW_;
      };
      call1(CamlinternalOO[17], bQ_);
      i_[1] = bU_;
    }
    return call1(i_[1], [0,localeMatcher]);
  }
  var bP_ = "best fit";
  return function(t0, param) {return {"localeMatcher": t0};}(bP_, bO_);
}

var j_ = [0,0,0,0];

function options(param) {
  function bp_(self, localeMatcher, usage, sensitivity, ignorePunctuation, numeric, caseFirst) {
    if (! j_[1]) {
      var bw_ = call1(CamlinternalOO[16], shared);
      var bx_ = call2(CamlinternalOO[3], bw_, cst__0);
      var by_ = call2(CamlinternalOO[8], bw_, e_);
      var bz_ = by_[1];
      var bA_ = by_[2];
      var bB_ = by_[3];
      var bC_ = by_[4];
      var bD_ = by_[5];
      var bE_ = by_[6];
      var bF_ = function(self_2) {var env = self_2[bx_ + 1];return env[1];};
      var bG_ = function(self_2) {var env = self_2[bx_ + 1];return env[2];};
      var bH_ = function(self_2) {var env = self_2[bx_ + 1];return env[3];};
      var bI_ = function(self_2) {var env = self_2[bx_ + 1];return env[4];};
      var bJ_ = function(self_2) {var env = self_2[bx_ + 1];return env[5];};
      var bK_ = [
        0,
        bC_,
        function(self_2) {var env = self_2[bx_ + 1];return env[6];},
        bz_,
        bJ_,
        bA_,
        bI_,
        bD_,
        bH_,
        bB_,
        bG_,
        bE_,
        bF_
      ];
      call2(CamlinternalOO[11], bw_, bK_);
      var bL_ = function(bM_) {
        var bN_ = call2(CamlinternalOO[24], 0, bw_);
        bN_[bx_ + 1] = bM_;
        return bN_;
      };
      call1(CamlinternalOO[17], bw_);
      j_[1] = bL_;
    }
    return call1(
      j_[1],
      [0,caseFirst,numeric,ignorePunctuation,sensitivity,usage,localeMatcher]
    );
  }
  var bq_ = "false";
  var br_ = Js_of_ocaml_Js[8];
  var bs_ = Js_of_ocaml_Js[8];
  var bt_ = "variant";
  var bu_ = "sort";
  var bv_ = "best fit";
  return function(t1, t2, t3, t4, t5, t6, param) {
    return {
      "localeMatcher": t1,
      "usage": t2,
      "sensitivity": t3,
      "ignorePunctuation": t4,
      "numeric": t5,
      "caseFirst": t6
    };
  }(bv_, bu_, bt_, bs_, br_, bq_, bp_
  );
}

var Collator = [0,object_options,options];
var k_ = [0,0,0,0];

function options__0(param) {
  function aD_(self, localeMatcher, timeZone, hour12, hourCycle, formatMatcher, weekday, era, year, month, day, hour, minute, second, timeZoneName) {
    if (! k_[1]) {
      var aS_ = call1(CamlinternalOO[16], f_);
      var aT_ = call2(CamlinternalOO[3], aS_, cst__1);
      var aU_ = call2(CamlinternalOO[8], aS_, b_);
      var aV_ = aU_[1];
      var aW_ = aU_[2];
      var aX_ = aU_[3];
      var aY_ = aU_[4];
      var aZ_ = aU_[5];
      var a0_ = aU_[6];
      var a1_ = aU_[7];
      var a2_ = aU_[8];
      var a3_ = aU_[9];
      var a4_ = aU_[10];
      var a5_ = aU_[11];
      var a6_ = aU_[12];
      var a7_ = aU_[13];
      var a8_ = aU_[14];
      var a9_ = function(self_3) {var env = self_3[aT_ + 1];return env[1];};
      var a__ = function(self_3) {var env = self_3[aT_ + 1];return env[2];};
      var ba_ = function(self_3) {var env = self_3[aT_ + 1];return env[3];};
      var bb_ = function(self_3) {var env = self_3[aT_ + 1];return env[4];};
      var bc_ = function(self_3) {var env = self_3[aT_ + 1];return env[5];};
      var bd_ = function(self_3) {var env = self_3[aT_ + 1];return env[6];};
      var be_ = function(self_3) {var env = self_3[aT_ + 1];return env[7];};
      var bf_ = function(self_3) {var env = self_3[aT_ + 1];return env[8];};
      var bg_ = function(self_3) {var env = self_3[aT_ + 1];return env[9];};
      var bh_ = function(self_3) {var env = self_3[aT_ + 1];return env[10];};
      var bi_ = function(self_3) {var env = self_3[aT_ + 1];return env[11];};
      var bj_ = function(self_3) {var env = self_3[aT_ + 1];return env[12];};
      var bk_ = function(self_3) {var env = self_3[aT_ + 1];return env[13];};
      var bl_ = [
        0,
        a2_,
        function(self_3) {var env = self_3[aT_ + 1];return env[14];},
        aY_,
        bk_,
        a4_,
        bj_,
        a3_,
        bi_,
        a6_,
        bh_,
        aW_,
        bg_,
        a7_,
        bf_,
        aV_,
        be_,
        a0_,
        bd_,
        a8_,
        bc_,
        a5_,
        bb_,
        a1_,
        ba_,
        aZ_,
        a__,
        aX_,
        a9_
      ];
      call2(CamlinternalOO[11], aS_, bl_);
      var bm_ = function(bn_) {
        var bo_ = call2(CamlinternalOO[24], 0, aS_);
        bo_[aT_ + 1] = bn_;
        return bo_;
      };
      call1(CamlinternalOO[17], aS_);
      k_[1] = bm_;
    }
    return call1(
      k_[1],
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
  var aE_ = Js_of_ocaml_Js[3];
  var aF_ = Js_of_ocaml_Js[3];
  var aG_ = Js_of_ocaml_Js[3];
  var aH_ = Js_of_ocaml_Js[3];
  var aI_ = Js_of_ocaml_Js[3];
  var aJ_ = Js_of_ocaml_Js[3];
  var aK_ = Js_of_ocaml_Js[3];
  var aL_ = Js_of_ocaml_Js[3];
  var aM_ = Js_of_ocaml_Js[3];
  var aN_ = "best fit";
  var aO_ = Js_of_ocaml_Js[3];
  var aP_ = Js_of_ocaml_Js[3];
  var aQ_ = Js_of_ocaml_Js[3];
  var aR_ = "best fit";
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
  }(aR_, aQ_, aP_, aO_, aN_, aM_, aL_, aK_, aJ_, aI_, aH_, aG_, aF_, aE_, aD_
  );
}

var DateTimeFormat = [0,object_options,options__0];
var l_ = [0,0,0,0];

function options__1(param) {
  function S_(self, localeMatcher, style, currency, currencyDisplay, useGrouping, minimumIntegerDigits, minimumFractionDigits, maximumFractionDigits, minimumSignificantDigits, maximumSignificantDigits) {
    if (! l_[1]) {
      var ad_ = call1(CamlinternalOO[16], h_);
      var ae_ = call2(CamlinternalOO[3], ad_, cst__2);
      var af_ = call2(CamlinternalOO[8], ad_, c_);
      var ag_ = af_[1];
      var ah_ = af_[2];
      var ai_ = af_[3];
      var aj_ = af_[4];
      var ak_ = af_[5];
      var al_ = af_[6];
      var am_ = af_[7];
      var an_ = af_[8];
      var ao_ = af_[9];
      var ap_ = af_[10];
      var aq_ = function(self_4) {var env = self_4[ae_ + 1];return env[1];};
      var ar_ = function(self_4) {var env = self_4[ae_ + 1];return env[2];};
      var as_ = function(self_4) {var env = self_4[ae_ + 1];return env[3];};
      var at_ = function(self_4) {var env = self_4[ae_ + 1];return env[4];};
      var au_ = function(self_4) {var env = self_4[ae_ + 1];return env[5];};
      var av_ = function(self_4) {var env = self_4[ae_ + 1];return env[6];};
      var aw_ = function(self_4) {var env = self_4[ae_ + 1];return env[7];};
      var ax_ = function(self_4) {var env = self_4[ae_ + 1];return env[8];};
      var ay_ = function(self_4) {var env = self_4[ae_ + 1];return env[9];};
      var az_ = [
        0,
        an_,
        function(self_4) {var env = self_4[ae_ + 1];return env[10];},
        ah_,
        ay_,
        ap_,
        ax_,
        ao_,
        aw_,
        ag_,
        av_,
        aj_,
        au_,
        ak_,
        at_,
        am_,
        as_,
        ai_,
        ar_,
        al_,
        aq_
      ];
      call2(CamlinternalOO[11], ad_, az_);
      var aA_ = function(aB_) {
        var aC_ = call2(CamlinternalOO[24], 0, ad_);
        aC_[ae_ + 1] = aB_;
        return aC_;
      };
      call1(CamlinternalOO[17], ad_);
      l_[1] = aA_;
    }
    return call1(
      l_[1],
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
  var T_ = Js_of_ocaml_Js[3];
  var U_ = Js_of_ocaml_Js[3];
  var V_ = Js_of_ocaml_Js[3];
  var W_ = Js_of_ocaml_Js[3];
  var X_ = Js_of_ocaml_Js[3];
  var Y_ = Js_of_ocaml_Js[7];
  var Z_ = Js_of_ocaml_Js[3];
  var aa_ = Js_of_ocaml_Js[3];
  var ab_ = "decimal";
  var ac_ = "best fit";
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
  }(ac_, ab_, aa_, Z_, Y_, X_, W_, V_, U_, T_, S_
  );
}

var NumberFormat = [0,object_options,options__1];
var m_ = [0,0,0,0];

function options__2(param) {
  function F_(self, localeMatcher, type) {
    if (! m_[1]) {
      var I_ = call1(CamlinternalOO[16], a_);
      var J_ = call2(CamlinternalOO[3], I_, cst__3);
      var K_ = call2(CamlinternalOO[8], I_, d_);
      var L_ = K_[1];
      var M_ = K_[2];
      var N_ = function(self_5) {var env = self_5[J_ + 1];return env[1];};
      var O_ = [
        0,
        L_,
        function(self_5) {var env = self_5[J_ + 1];return env[2];},
        M_,
        N_
      ];
      call2(CamlinternalOO[11], I_, O_);
      var P_ = function(Q_) {
        var R_ = call2(CamlinternalOO[24], 0, I_);
        R_[J_ + 1] = Q_;
        return R_;
      };
      call1(CamlinternalOO[17], I_);
      m_[1] = P_;
    }
    return call1(m_[1], [0,type,localeMatcher]);
  }
  var G_ = "cardinal";
  var H_ = "best fit";
  return function(t31, t32, param) {
    return {"localeMatcher": t31,"type": t32};
  }(H_, G_, F_
  );
}

var PluralRules = [0,object_options,options__2];

function n_(x) {return call1(caml_get_public_method(x, -475689828, 307), x);}

var o_ = Js_of_ocaml_Js[50][1];
var intl = function(t33, param) {return t33.Intl;}(o_, n_);

function p_(x) {return call1(caml_get_public_method(x, -438302079, 308), x);}

function q_(x) {return call1(caml_get_public_method(x, -475689828, 309), x);}

var r_ = Js_of_ocaml_Js[50][1];
var s_ = function(t34, param) {return t34.Intl;}(r_, q_);
var collator_constr = function(t35, param) {return t35.Collator;}(s_, p_);

function t_(x) {return call1(caml_get_public_method(x, 568382385, 310), x);}

function u_(x) {return call1(caml_get_public_method(x, -475689828, 311), x);}

var v_ = Js_of_ocaml_Js[50][1];
var w_ = function(t36, param) {return t36.Intl;}(v_, u_);
var dateTimeFormat_constr = function(t37, param) {return t37.DateTimeFormat;}(w_, t_
);

function x_(x) {return call1(caml_get_public_method(x, 941696479, 312), x);}

function y_(x) {return call1(caml_get_public_method(x, -475689828, 313), x);}

var z_ = Js_of_ocaml_Js[50][1];
var A_ = function(t38, param) {return t38.Intl;}(z_, y_);
var numberFormat_constr = function(t39, param) {return t39.NumberFormat;}(A_, x_
);

function B_(x) {return call1(caml_get_public_method(x, 544366260, 314), x);}

function C_(x) {return call1(caml_get_public_method(x, -475689828, 315), x);}

var D_ = Js_of_ocaml_Js[50][1];
var E_ = function(t40, param) {return t40.Intl;}(D_, C_);
var pluralRules_constr = function(t41, param) {return t41.PluralRules;}(E_, B_
);

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

module.exports = Js_of_ocaml_Intl;

/*::type Exports = {
  Collator: any,
  DateTimeFormat: any,
  NumberFormat: any,
  PluralRules: any,
  intl: any,
  collator_constr: any,
  dateTimeFormat_constr: any,
  numberFormat_constr: any,
  pluralRules_constr: any,
  is_supported: (param: any) => any,
}*/
/** @type {{
  Collator: any,
  DateTimeFormat: any,
  NumberFormat: any,
  PluralRules: any,
  intl: any,
  collator_constr: any,
  dateTimeFormat_constr: any,
  numberFormat_constr: any,
  pluralRules_constr: any,
  is_supported: (param: any) => any,
}} */
module.exports = ((module.exports /*:: : any*/) /*:: :Exports */);
module.exports.Collator = module.exports[1];
module.exports.DateTimeFormat = module.exports[2];
module.exports.NumberFormat = module.exports[3];
module.exports.PluralRules = module.exports[4];
module.exports.intl = module.exports[5];
module.exports.collator_constr = module.exports[6];
module.exports.dateTimeFormat_constr = module.exports[7];
module.exports.numberFormat_constr = module.exports[8];
module.exports.pluralRules_constr = module.exports[9];
module.exports.is_supported = module.exports[10];

/* Hashing disabled */
