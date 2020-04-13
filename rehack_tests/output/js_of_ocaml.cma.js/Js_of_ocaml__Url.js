/**
 * @flow strict
 * Js_of_ocaml__Url
 */

// @ts-check


"use strict";

var runtime = require("../runtime/runtime.js");
var caml_fresh_oo_id = runtime["caml_fresh_oo_id"];
var caml_get_public_method = runtime["caml_get_public_method"];
var caml_int_of_string = runtime["caml_int_of_string"];
var caml_js_to_byte_string = runtime["caml_js_to_byte_string"];
var caml_js_wrap_meth_callback = runtime["caml_js_wrap_meth_callback"];
var caml_jsbytes_of_string = runtime["caml_jsbytes_of_string"];
var string = runtime["caml_new_string"];
var caml_string_notequal = runtime["caml_string_notequal"];
var caml_wrap_thrown_exception = runtime["caml_wrap_thrown_exception"];
var caml_wrap_thrown_exception_reraise = runtime
 ["caml_wrap_thrown_exception_reraise"];

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

var cst__36 = string("");
var cst__37 = string("");
var cst__12 = string("");
var cst__20 = string("");
var cst__13 = string("#");
var cst__14 = string("?");
var cst__19 = string("");
var cst__15 = string("/");
var cst__16 = string("/");
var cst__18 = string(":");
var cst__17 = string("");
var cst_http__1 = string("http://");
var cst__21 = string("");
var cst__29 = string("");
var cst__22 = string("#");
var cst__23 = string("?");
var cst__28 = string("");
var cst__24 = string("/");
var cst__25 = string("/");
var cst__27 = string(":");
var cst__26 = string("");
var cst_https__1 = string("https://");
var cst__30 = string("");
var cst__35 = string("");
var cst__31 = string("#");
var cst__32 = string("?");
var cst__34 = string("");
var cst__33 = string("/");
var cst_file__1 = string("file://");
var cst__11 = string("");
var cst__10 = string("");
var cst__9 = string("");
var cst__8 = string("");
var cst__7 = string("");
var cst__6 = string("");
var cst__5 = string("");
var cst__3 = string("=");
var cst__4 = string("&");
var cst__1 = string("");
var cst__2 = string("");
var cst_file = string("file");
var cst_file__0 = string("file:");
var cst_http = string("http");
var cst_http__0 = string("http:");
var cst_https = string("https");
var cst_https__0 = string("https:");
var cst__0 = string(" ");
var cst_2B = string("%2B");
var shared = [
  0,
  string("hash"),
  string("host"),
  string("href"),
  string("port"),
  string("origin"),
  string("assign"),
  string("hostname"),
  string("pathname"),
  string("search"),
  string("protocol"),
  string("reload"),
  string("replace")
];
var cst_Js_of_ocaml_Url_Local_exn = string("Js_of_ocaml__Url.Local_exn");
var cst = string("+");
var cst_Js_of_ocaml_Url_Not_an_http_protocol = string(
  "Js_of_ocaml__Url.Not_an_http_protocol"
);
var cst_Hh_Tt_Tt_Pp_Ss_0_9a_zA_Z_0_9a_zA_Z_0_9A_Fa_f_0_9 = string(
  "^([Hh][Tt][Tt][Pp][Ss]?)://([0-9a-zA-Z.-]+|\\[[0-9a-zA-Z.-]+\\]|\\[[0-9A-Fa-f:.]+\\])?(:([0-9]+))?(/([^\\?#]*)(\\?([^#]*))?(#(.*))?)?$"
);
var cst_Ff_Ii_Ll_Ee = string(
  "^([Ff][Ii][Ll][Ee])://([^\\?#]*)(\\?([^#]*))?(#(.*))?$"
);
var Js_of_ocaml_Js = require("./Js_of_ocaml__Js.js");
var Stdlib = require("../stdlib.cma.js/Stdlib.js");
var CamlinternalOO = require("../stdlib.cma.js/CamlinternalOO.js");
var Stdlib_list = require("../stdlib.cma.js/Stdlib__list.js");
var Stdlib_string = require("../stdlib.cma.js/Stdlib__string.js");
var Js_of_ocaml_Regexp = require("./Js_of_ocaml__Regexp.js");
var Js_of_ocaml_Dom_html = require("./Js_of_ocaml__Dom_html.js");
var f_ = [0,string(""),0];
var a_ = [
  0,
  string("search"),
  string("replace"),
  string("reload"),
  string("protocol"),
  string("port"),
  string("pathname"),
  string("origin"),
  string("href"),
  string("hostname"),
  string("host"),
  string("hash"),
  string("assign")
];

function split(c, s) {
  function cn_(x) {return call1(caml_get_public_method(x, 24046298, 241), x);}
  var co_ = call2(Stdlib_string[1], 1, c).toString();
  var cp_ = function(t1, t0, param) {return t1.split(t0);}(s, co_, cn_);
  return call1(Js_of_ocaml_Js[20], cp_);
}

function split_2(c, s) {
  function cf_(x) {
    return call1(caml_get_public_method(x, -524334903, 242), x);
  }
  var cg_ = call2(Stdlib_string[1], 1, c).toString();
  var index = function(t8, t7, param) {return t8.indexOf(t7);}(s, cg_, cf_);
  if (0 <= index) {
    var ch_ = function(x) {
      return call1(caml_get_public_method(x, -303194578, 243), x);
    };
    var ci_ = index + 1 | 0;
    var cj_ = function(t6, t5, param) {return t6.slice(t5);}(s, ci_, ch_);
    var ck_ = function(x) {
      return call1(caml_get_public_method(x, -20462510, 244), x);
    };
    var cl_ = 0;
    var cm_ = [
      0,
      function(t4, t2, t3, param) {return t4.slice(t2, t3);}(s, cl_, index, ck_
      ),
      cj_
    ];
    return call1(Js_of_ocaml_Js[4], cm_);
  }
  return Js_of_ocaml_Js[3];
}

var Local_exn = [248,cst_Js_of_ocaml_Url_Local_exn,caml_fresh_oo_id(0)];

function interrupt(param) {throw caml_wrap_thrown_exception(Local_exn);}

var plus_re = call1(Js_of_ocaml_Regexp[5], cst);

function escape_plus(s) {
  return call3(Js_of_ocaml_Regexp[12], plus_re, s, cst_2B);
}

function unescape_plus(s) {
  return call3(Js_of_ocaml_Regexp[12], plus_re, s, cst__0);
}

var b_ = 0;
var c_ = "g";
var d_ = "\\+";
var e_ = Js_of_ocaml_Js[11];
var plus_re_js_string = function(t11, t9, t10, param) {return new t11(t9, t10);
}(e_, d_, c_, b_
);

function unescape_plus_js_string(s) {
  function cb_(x) {
    return call1(caml_get_public_method(x, 180472028, 245), x);
  }
  var cc_ = 0;
  (function(t16, t15, param) {t16.lastIndex = t15;return 0;}(plus_re_js_string, cc_, cb_
   ));
  function cd_(x) {
    return call1(caml_get_public_method(x, 724060212, 246), x);
  }
  var ce_ = " ";
  return function(t14, t12, t13, param) {return t14.replace(t12, t13);}(s, plus_re_js_string, ce_, cd_
  );
}

function urldecode_js_string_string(s) {
  var ca_ = unescape_plus_js_string(s);
  return caml_js_to_byte_string(call1(Js_of_ocaml_Js[42], ca_));
}

function urldecode(s) {
  var b__ = caml_jsbytes_of_string(unescape_plus(s));
  return caml_js_to_byte_string(call1(Js_of_ocaml_Js[42], b__));
}

function urlencode(opt, s) {
  if (opt) {
    var sth = opt[1];
    var with_plus = sth;
  }
  else var with_plus = 1;
  return with_plus ?
    escape_plus(
     caml_js_to_byte_string(
       call1(Js_of_ocaml_Js[41], caml_jsbytes_of_string(s))
     )
   ) :
    caml_js_to_byte_string(
     call1(Js_of_ocaml_Js[41], caml_jsbytes_of_string(s))
   );
}

var Not_an_http_protocol = [
  248,
  cst_Js_of_ocaml_Url_Not_an_http_protocol,
  caml_fresh_oo_id(0)
];

function is_secure(prot_string) {
  function b9_(x) {
    return call1(caml_get_public_method(x, 946097238, 247), x);
  }
  var match = caml_js_to_byte_string(
    function(t17, param) {return t17.toLowerCase();}(prot_string, b9_)
  );
  if (caml_string_notequal(match, cst_file)) {
    if (caml_string_notequal(match, cst_file__0)) {
      if (caml_string_notequal(match, cst_http)) if (
        caml_string_notequal(match, cst_http__0)
      ) {
        if (caml_string_notequal(match, cst_https)) if (
          caml_string_notequal(match, cst_https__0)
        ) {var switch__0 = 1;var switch__1 = 0;}
        else var switch__1 = 1;
        else var switch__1 = 1;
        if (switch__1) {return 1;}
      }
      else var switch__0 = 0;
      else var switch__0 = 0;
      if (! switch__0) {return 0;}
    }
  }
  throw caml_wrap_thrown_exception(Not_an_http_protocol);
}

var default_http_port = 80;
var default_https_port = 443;

function path_of_path_string(s) {
  var l = runtime["caml_ml_string_length"](s);
  function aux(i) {
    try {var b7_ = call3(Stdlib_string[18], s, i, 47);var j = b7_;}
    catch(b8_) {
      b8_ = runtime["caml_wrap_exception"](b8_);
      if (b8_ !== Stdlib[8]) {throw caml_wrap_thrown_exception_reraise(b8_);}
      var j = l;
    }
    var word = call3(Stdlib_string[4], s, i, j - i | 0);
    return l <= j ? [0,word,0] : [0,word,aux(j + 1 | 0)];
  }
  var a = aux(0);
  if (a) {
    if (! caml_string_notequal(a[1], cst__1)) {
      var b6_ = a[2];
      if (! b6_) {return 0;}
      if (! caml_string_notequal(b6_[1], cst__2)) {if (! b6_[2]) {return f_;}}
    }
  }
  return a;
}

function encode_arguments(l) {
  function b1_(param) {
    var v = param[2];
    var n = param[1];
    var b3_ = urlencode(0, v);
    var b4_ = call2(Stdlib[28], cst__3, b3_);
    var b5_ = urlencode(0, n);
    return call2(Stdlib[28], b5_, b4_);
  }
  var b2_ = call2(Stdlib_list[17], b1_, l);
  return call2(Stdlib_string[7], cst__4, b2_);
}

function decode_arguments_js_string(s) {
  var arr = split(38, s);
  function bS_(x) {
    return call1(caml_get_public_method(x, 520590566, 248), x);
  }
  var len = function(t18, param) {return t18.length;}(arr, bS_);
  function name_value_split(s) {return split_2(61, s);}
  function aux(acc, idx) {
    var idx__0 = idx;
    for (; ; ) {
      if (0 <= idx__0) {
        try {
          var bT_ = idx__0 + -1 | 0;
          var bU_ = function(s) {
            function bY_(param) {
              var y = param[2];
              var x = param[1];
              var b0_ = urldecode_js_string_string(y);
              return [0,urldecode_js_string_string(x),b0_];
            }
            var bZ_ = name_value_split(s);
            return call3(Js_of_ocaml_Js[6][7], bZ_, interrupt, bY_);
          };
          var bV_ = call2(Js_of_ocaml_Js[16], arr, idx__0);
          var bW_ = aux(
            [0,call3(Js_of_ocaml_Js[6][7], bV_, interrupt, bU_),acc],
            bT_
          );
          return bW_;
        }
        catch(bX_) {
          bX_ = runtime["caml_wrap_exception"](bX_);
          if (bX_ === Local_exn) {
            var idx__1 = idx__0 + -1 | 0;
            var idx__0 = idx__1;
            continue;
          }
          throw caml_wrap_thrown_exception_reraise(bX_);
        }
      }
      return acc;
    }
  }
  return aux(0, len + -1 | 0);
}

function decode_arguments(s) {
  return decode_arguments_js_string(caml_jsbytes_of_string(s));
}

var g_ = 0;
var h_ = caml_jsbytes_of_string(
  cst_Hh_Tt_Tt_Pp_Ss_0_9a_zA_Z_0_9a_zA_Z_0_9A_Fa_f_0_9
);
var i_ = Js_of_ocaml_Js[10];
var url_re = function(t20, t19, param) {return new t20(t19);}(i_, h_, g_);
var j_ = 0;
var k_ = caml_jsbytes_of_string(cst_Ff_Ii_Ll_Ee);
var l_ = Js_of_ocaml_Js[10];
var file_re = function(t22, t21, param) {return new t22(t21);}(l_, k_, j_);

function url_of_js_string(s) {
  function bo_(handle) {
    var res = call1(Js_of_ocaml_Js[21], handle);
    var bD_ = call2(Js_of_ocaml_Js[16], res, 1);
    var ssl = is_secure(call2(Js_of_ocaml_Js[6][8], bD_, interrupt));
    function port_of_string(s) {
      return caml_string_notequal(s, cst__5) ?
        caml_int_of_string(s) :
        ssl ? 443 : 80;
    }
    function bE_(param) {return caml_jsbytes_of_string(cst__6);}
    var bF_ = call2(Js_of_ocaml_Js[16], res, 6);
    var path_str = urldecode_js_string_string(
      call2(Js_of_ocaml_Js[6][8], bF_, bE_)
    );
    function bG_(param) {return caml_jsbytes_of_string(cst__7);}
    var bH_ = call2(Js_of_ocaml_Js[16], res, 10);
    var bI_ = urldecode_js_string_string(call2(Js_of_ocaml_Js[6][8], bH_, bG_)
    );
    function bJ_(param) {return caml_jsbytes_of_string(cst__8);}
    var bK_ = call2(Js_of_ocaml_Js[16], res, 8);
    var bL_ = decode_arguments_js_string(call2(Js_of_ocaml_Js[6][8], bK_, bJ_)
    );
    var bM_ = path_of_path_string(path_str);
    function bN_(param) {return caml_jsbytes_of_string(cst__9);}
    var bO_ = call2(Js_of_ocaml_Js[16], res, 4);
    var bP_ = port_of_string(
      caml_js_to_byte_string(call2(Js_of_ocaml_Js[6][8], bO_, bN_))
    );
    var bQ_ = call2(Js_of_ocaml_Js[16], res, 2);
    var url = [
      0,
      urldecode_js_string_string(call2(Js_of_ocaml_Js[6][8], bQ_, interrupt)),
      bP_,
      bM_,
      path_str,
      bL_,
      bI_
    ];
    var bR_ = ssl ? [1,url] : [0,url];
    return [0,bR_];
  }
  function bp_(param) {
    function bs_(handle) {
      var res = call1(Js_of_ocaml_Js[21], handle);
      var bw_ = call2(Js_of_ocaml_Js[16], res, 2);
      var path_str = urldecode_js_string_string(
        call2(Js_of_ocaml_Js[6][8], bw_, interrupt)
      );
      function bx_(param) {return caml_jsbytes_of_string(cst__10);}
      var by_ = call2(Js_of_ocaml_Js[16], res, 6);
      var bz_ = caml_js_to_byte_string(call2(Js_of_ocaml_Js[6][8], by_, bx_));
      function bA_(param) {return caml_jsbytes_of_string(cst__11);}
      var bB_ = call2(Js_of_ocaml_Js[16], res, 4);
      var bC_ = decode_arguments_js_string(
        call2(Js_of_ocaml_Js[6][8], bB_, bA_)
      );
      return [0,[2,[0,path_of_path_string(path_str),path_str,bC_,bz_]]];
    }
    function bt_(param) {return 0;}
    function bu_(x) {
      return call1(caml_get_public_method(x, -1021447279, 249), x);
    }
    var bv_ = function(t26, t25, param) {return t26.exec(t25);}(file_re, s, bu_
    );
    return call3(Js_of_ocaml_Js[5][7], bv_, bt_, bs_);
  }
  function bq_(x) {
    return call1(caml_get_public_method(x, -1021447279, 250), x);
  }
  var br_ = function(t24, t23, param) {return t24.exec(t23);}(url_re, s, bq_);
  return call3(Js_of_ocaml_Js[5][7], br_, bp_, bo_);
}

function url_of_string(s) {
  return url_of_js_string(caml_jsbytes_of_string(s));
}

function string_of_url(param) {
  switch (param[0]) {
    case 0:
      var match = param[1];
      var frag = match[6];
      var args = match[5];
      var path = match[3];
      var port = match[2];
      var host = match[1];
      if (caml_string_notequal(frag, cst__12)) {
        var aM_ = urlencode(0, frag);
        var aN_ = call2(Stdlib[28], cst__13, aM_);
      }
      else var aN_ = cst__20;
      if (args) {
        var aO_ = encode_arguments(args);
        var aP_ = call2(Stdlib[28], cst__14, aO_);
      }
      else var aP_ = cst__19;
      var aQ_ = call2(Stdlib[28], aP_, aN_);
      var aR_ = function(x) {return urlencode(0, x);};
      var aS_ = call2(Stdlib_list[17], aR_, path);
      var aT_ = call2(Stdlib_string[7], cst__15, aS_);
      var aU_ = call2(Stdlib[28], aT_, aQ_);
      var aV_ = call2(Stdlib[28], cst__16, aU_);
      if (80 === port) var aW_ = cst__17;
      else {
        var a0_ = call1(Stdlib[33], port);
        var aW_ = call2(Stdlib[28], cst__18, a0_);
      }
      var aX_ = call2(Stdlib[28], aW_, aV_);
      var aY_ = urlencode(0, host);
      var aZ_ = call2(Stdlib[28], aY_, aX_);
      return call2(Stdlib[28], cst_http__1, aZ_);
    case 1:
      var match__0 = param[1];
      var frag__0 = match__0[6];
      var args__0 = match__0[5];
      var path__0 = match__0[3];
      var port__0 = match__0[2];
      var host__0 = match__0[1];
      if (caml_string_notequal(frag__0, cst__21)) {
        var a1_ = urlencode(0, frag__0);
        var a2_ = call2(Stdlib[28], cst__22, a1_);
      }
      else var a2_ = cst__29;
      if (args__0) {
        var a3_ = encode_arguments(args__0);
        var a4_ = call2(Stdlib[28], cst__23, a3_);
      }
      else var a4_ = cst__28;
      var a5_ = call2(Stdlib[28], a4_, a2_);
      var a6_ = function(x) {return urlencode(0, x);};
      var a7_ = call2(Stdlib_list[17], a6_, path__0);
      var a8_ = call2(Stdlib_string[7], cst__24, a7_);
      var a9_ = call2(Stdlib[28], a8_, a5_);
      var a__ = call2(Stdlib[28], cst__25, a9_);
      if (443 === port__0) var ba_ = cst__26;
      else {
        var be_ = call1(Stdlib[33], port__0);
        var ba_ = call2(Stdlib[28], cst__27, be_);
      }
      var bb_ = call2(Stdlib[28], ba_, a__);
      var bc_ = urlencode(0, host__0);
      var bd_ = call2(Stdlib[28], bc_, bb_);
      return call2(Stdlib[28], cst_https__1, bd_);
    default:
      var match__1 = param[1];
      var frag__1 = match__1[4];
      var args__1 = match__1[3];
      var path__1 = match__1[1];
      if (caml_string_notequal(frag__1, cst__30)) {
        var bf_ = urlencode(0, frag__1);
        var bg_ = call2(Stdlib[28], cst__31, bf_);
      }
      else var bg_ = cst__35;
      if (args__1) {
        var bh_ = encode_arguments(args__1);
        var bi_ = call2(Stdlib[28], cst__32, bh_);
      }
      else var bi_ = cst__34;
      var bj_ = call2(Stdlib[28], bi_, bg_);
      var bk_ = function(x) {return urlencode(0, x);};
      var bl_ = call2(Stdlib_list[17], bk_, path__1);
      var bm_ = call2(Stdlib_string[7], cst__33, bl_);
      var bn_ = call2(Stdlib[28], bm_, bj_);
      return call2(Stdlib[28], cst_file__1, bn_)
    }
}

function m_(x) {return call1(caml_get_public_method(x, -448369099, 251), x);}

var n_ = Js_of_ocaml_Dom_html[8];
var o_ = function(t42, param) {return t42.location;}(n_, m_);
var p_ = call1(Js_of_ocaml_Js[6][2], o_);

if (call1(Js_of_ocaml_Js[6][5], p_)) {
  var q_ = function(x) {
    return call1(caml_get_public_method(x, -448369099, 252), x);
  };
  var r_ = Js_of_ocaml_Dom_html[8];
  var l = function(t41, param) {return t41.location;}(r_, q_);
}
else {
  var empty = "";
  var I_ = [0,0,0,0];
  var J_ = function(self, href, protocol, host, hostname, port, pathname, search, hash, origin, reload, replace, assign) {
    if (! I_[1]) {
      var ai_ = call1(CamlinternalOO[16], shared);
      var aj_ = call2(CamlinternalOO[3], ai_, cst__37);
      var ak_ = call2(CamlinternalOO[8], ai_, a_);
      var al_ = ak_[1];
      var am_ = ak_[2];
      var an_ = ak_[3];
      var ao_ = ak_[4];
      var ap_ = ak_[5];
      var aq_ = ak_[6];
      var ar_ = ak_[7];
      var as_ = ak_[8];
      var at_ = ak_[9];
      var au_ = ak_[10];
      var av_ = ak_[11];
      var aw_ = ak_[12];
      var ax_ = function(self_1) {
        var env = self_1[aj_ + 1];
        return call1(env[2], env[1]);
      };
      var ay_ = function(self_1) {
        var env = self_1[aj_ + 1];
        return call1(env[3], env[1]);
      };
      var az_ = function(self_1) {
        var env = self_1[aj_ + 1];
        return call1(env[4], env[1]);
      };
      var aA_ = function(self_1) {var env = self_1[aj_ + 1];return env[5];};
      var aB_ = function(self_1) {var env = self_1[aj_ + 1];return env[6];};
      var aC_ = function(self_1) {var env = self_1[aj_ + 1];return env[7];};
      var aD_ = function(self_1) {var env = self_1[aj_ + 1];return env[8];};
      var aE_ = function(self_1) {var env = self_1[aj_ + 1];return env[9];};
      var aF_ = function(self_1) {var env = self_1[aj_ + 1];return env[10];};
      var aG_ = function(self_1) {var env = self_1[aj_ + 1];return env[11];};
      var aH_ = function(self_1) {var env = self_1[aj_ + 1];return env[12];};
      var aI_ = [
        0,
        as_,
        function(self_1) {var env = self_1[aj_ + 1];return env[13];},
        ao_,
        aH_,
        au_,
        aG_,
        at_,
        aF_,
        ap_,
        aE_,
        aq_,
        aD_,
        al_,
        aC_,
        av_,
        aB_,
        ar_,
        aA_,
        an_,
        az_,
        am_,
        ay_,
        aw_,
        ax_
      ];
      call2(CamlinternalOO[11], ai_, aI_);
      var aJ_ = function(aK_) {
        var aL_ = call2(CamlinternalOO[24], 0, ai_);
        aL_[aj_ + 1] = aK_;
        return aL_;
      };
      call1(CamlinternalOO[17], ai_);
      I_[1] = aJ_;
    }
    return call1(
      I_[1],
      [
        0,
        self,
        assign,
        replace,
        reload,
        origin,
        hash,
        search,
        pathname,
        port,
        hostname,
        host,
        protocol,
        href
      ]
    );
  };
  var K_ = function(param, ah_) {return 0;};
  var L_ = function(param, ag_) {return 0;};
  var M_ = function(param) {return 0;};
  var N_ = Js_of_ocaml_Js[3];
  var l = function(t29, t30, t31, t32, t33, t34, t35, t36, t37, t38, t39, t40, param) {
    return {
      "href": t29,
      "protocol": t30,
      "host": t31,
      "hostname": t32,
      "port": t33,
      "pathname": t34,
      "search": t35,
      "hash": t36,
      "origin": t37,
      "reload": caml_js_wrap_meth_callback(t38),
      "replace": caml_js_wrap_meth_callback(t39),
      "assign": caml_js_wrap_meth_callback(t40)
    };
  }(empty, empty, empty, empty, empty, empty, empty, empty, N_, M_, L_, K_, J_
  );
}

function s_(x) {return call1(caml_get_public_method(x, -757983821, 253), x);}

var host = urldecode_js_string_string(
  function(t43, param) {return t43.hostname;}(l, s_)
);

function t_(x) {return call1(caml_get_public_method(x, 6510168, 254), x);}

var protocol = urldecode_js_string_string(
  function(t44, param) {return t44.protocol;}(l, t_)
);
var u_ = 0;
var port = function(param) {
  try {
    var ad_ = function(x) {
      return call1(caml_get_public_method(x, -899906687, 255), x);
    };
    var ae_ = [
      0,
      caml_int_of_string(
        caml_js_to_byte_string(function(t45, param) {return t45.port;}(l, ad_)
        )
      )
    ];
    return ae_;
  }
  catch(af_) {
    af_ = runtime["caml_wrap_exception"](af_);
    if (af_[1] === Stdlib[7]) {return 0;}
    throw caml_wrap_thrown_exception_reraise(af_);
  }
}(u_
);

function v_(x) {return call1(caml_get_public_method(x, -742027664, 256), x);}

var path_string = urldecode_js_string_string(
  function(t46, param) {return t46.pathname;}(l, v_)
);
var path = path_of_path_string(path_string);
var w_ = "?";

function x_(x) {return call1(caml_get_public_method(x, 930445673, 257), x);}

var y_ = 0;

function z_(x) {return call1(caml_get_public_method(x, -487088280, 258), x);}

var A_ = function(t51, param) {return t51.search;}(l, z_);

if (function(t53, t52, param) {return t53.charAt(t52);}(A_, y_, x_) === w_) {
  var B_ = function(x) {
    return call1(caml_get_public_method(x, -303194578, 259), x);
  };
  var C_ = 1;
  var D_ = function(x) {
    return call1(caml_get_public_method(x, -487088280, 260), x);
  };
  var E_ = function(t48, param) {return t48.search;}(l, D_);
  var F_ = function(t50, t49, param) {return t50.slice(t49);}(E_, C_, B_);
}
else {
  var H_ = function(x) {
    return call1(caml_get_public_method(x, -487088280, 267), x);
  };
  var F_ = function(t47, param) {return t47.search;}(l, H_);
}

var arguments__0 = decode_arguments_js_string(F_);

function get_fragment(param) {
  function T_(res) {
    var res__0 = call1(Js_of_ocaml_Js[21], res);
    return runtime["caml_js_to_string"](res__0[1]);
  }
  function U_(param) {return cst__36;}
  function V_(x) {return call1(caml_get_public_method(x, -16084858, 261), x);}
  var W_ = 0;
  var X_ = "#(.*)";
  var Y_ = Js_of_ocaml_Js[10];
  var Z_ = function(t56, t55, param) {return new t56(t55);}(Y_, X_, W_);
  function aa_(x) {
    return call1(caml_get_public_method(x, -988476949, 262), x);
  }
  var ab_ = function(t54, param) {return t54.href;}(l, aa_);
  var ac_ = function(t58, t57, param) {return t58.match(t57);}(ab_, Z_, V_);
  return call3(Js_of_ocaml_Js[5][7], ac_, U_, T_);
}

function set_fragment(s) {
  function R_(x) {
    return call1(caml_get_public_method(x, -989319218, 263), x);
  }
  var S_ = caml_jsbytes_of_string(urlencode(0, s));
  return function(t60, t59, param) {t60.hash = t59;return 0;}(l, S_, R_);
}

function get(param) {
  function Q_(x) {
    return call1(caml_get_public_method(x, -988476949, 264), x);
  }
  return url_of_js_string(function(t61, param) {return t61.href;}(l, Q_));
}

function set(u) {
  function O_(x) {
    return call1(caml_get_public_method(x, -988476949, 265), x);
  }
  var P_ = caml_jsbytes_of_string(string_of_url(u));
  return function(t63, t62, param) {t63.href = t62;return 0;}(l, P_, O_);
}

function G_(x) {return call1(caml_get_public_method(x, -988476949, 266), x);}

var as_string = urldecode_js_string_string(
  function(t64, param) {return t64.href;}(l, G_)
);
var Js_of_ocaml_Url = [
  0,
  urldecode,
  urlencode,
  default_http_port,
  default_https_port,
  path_of_path_string,
  encode_arguments,
  decode_arguments,
  url_of_string,
  string_of_url,
  [
    0,
    host,
    port,
    protocol,
    path_string,
    path,
    arguments__0,
    get_fragment,
    set_fragment,
    get,
    set,
    as_string
  ]
];

module.exports = Js_of_ocaml_Url;

/*::type Exports = {
  urldecode: (s: any) => any,
  urlencode: (opt: any, s: any) => any,
  default_http_port: any,
  default_https_port: any,
  path_of_path_string: (s: any) => any,
  encode_arguments: (l: any) => any,
  decode_arguments: (s: any) => any,
  url_of_string: (s: any) => any,
  string_of_url: (param: any) => any,
}*/
/** @type {{
  urldecode: (s: any) => any,
  urlencode: (opt: any, s: any) => any,
  default_http_port: any,
  default_https_port: any,
  path_of_path_string: (s: any) => any,
  encode_arguments: (l: any) => any,
  decode_arguments: (s: any) => any,
  url_of_string: (s: any) => any,
  string_of_url: (param: any) => any,
}} */
module.exports = ((module.exports /*:: : any*/) /*:: :Exports */);
module.exports.urldecode = module.exports[1];
module.exports.urlencode = module.exports[2];
module.exports.default_http_port = module.exports[3];
module.exports.default_https_port = module.exports[4];
module.exports.path_of_path_string = module.exports[5];
module.exports.encode_arguments = module.exports[6];
module.exports.decode_arguments = module.exports[7];
module.exports.url_of_string = module.exports[8];
module.exports.string_of_url = module.exports[9];

/* Hashing disabled */
