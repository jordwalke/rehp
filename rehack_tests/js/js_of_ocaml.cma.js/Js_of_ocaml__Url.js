/**
 * Js_of_ocaml__Url
 * @providesModule Js_of_ocaml__Url
 */
"use strict";
var CamlinternalOO = require('CamlinternalOO.js');
var Js_of_ocaml__Dom_html = require('Js_of_ocaml__Dom_html.js');
var Js_of_ocaml__Js = require('Js_of_ocaml__Js.js');
var Js_of_ocaml__Regexp = require('Js_of_ocaml__Regexp.js');
var List_ = require('List_.js');
var Pervasives = require('Pervasives.js');
var String_ = require('String_.js');
var Failure = require('Failure.js');
var Not_found = require('Not_found.js');
var runtime = require('runtime.js');

let joo_global_object = global;


var runtime = joo_global_object.jsoo_runtime;
var caml_fresh_oo_id = runtime["caml_fresh_oo_id"];
var caml_get_public_method = runtime["caml_get_public_method"];
var caml_int_of_string = runtime["caml_int_of_string"];
var caml_js_to_byte_string = runtime["caml_js_to_byte_string"];
var caml_js_wrap_meth_callback = runtime["caml_js_wrap_meth_callback"];
var caml_jsbytes_of_string = runtime["caml_jsbytes_of_string"];
var caml_new_string = runtime["caml_new_string"];
var caml_string_notequal = runtime["caml_string_notequal"];
var caml_wrap_exception = runtime["caml_wrap_exception"];

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
var cst__36 = caml_new_string("");
var cst__37 = caml_new_string("");
var cst__12 = caml_new_string("");
var cst__20 = caml_new_string("");
var cst__13 = caml_new_string("#");
var cst__14 = caml_new_string("?");
var cst__19 = caml_new_string("");
var cst__15 = caml_new_string("/");
var cst__16 = caml_new_string("/");
var cst__18 = caml_new_string(":");
var cst__17 = caml_new_string("");
var cst_http__1 = caml_new_string("http://");
var cst__21 = caml_new_string("");
var cst__29 = caml_new_string("");
var cst__22 = caml_new_string("#");
var cst__23 = caml_new_string("?");
var cst__28 = caml_new_string("");
var cst__24 = caml_new_string("/");
var cst__25 = caml_new_string("/");
var cst__27 = caml_new_string(":");
var cst__26 = caml_new_string("");
var cst_https__1 = caml_new_string("https://");
var cst__30 = caml_new_string("");
var cst__35 = caml_new_string("");
var cst__31 = caml_new_string("#");
var cst__32 = caml_new_string("?");
var cst__34 = caml_new_string("");
var cst__33 = caml_new_string("/");
var cst_file__1 = caml_new_string("file://");
var cst__11 = caml_new_string("");
var cst__10 = caml_new_string("");
var cst__9 = caml_new_string("");
var cst__8 = caml_new_string("");
var cst__7 = caml_new_string("");
var cst__6 = caml_new_string("");
var cst__5 = caml_new_string("");
var cst__3 = caml_new_string("=");
var cst__4 = caml_new_string("&");
var cst__1 = caml_new_string("");
var cst__2 = caml_new_string("");
var cst_file = caml_new_string("file");
var cst_file__0 = caml_new_string("file:");
var cst_http = caml_new_string("http");
var cst_http__0 = caml_new_string("http:");
var cst_https = caml_new_string("https");
var cst_https__0 = caml_new_string("https:");
var cst__0 = caml_new_string(" ");
var cst_2B = caml_new_string("%2B");
var shared = [
  0,
  caml_new_string("hash"),
  caml_new_string("host"),
  caml_new_string("href"),
  caml_new_string("port"),
  caml_new_string("origin"),
  caml_new_string("assign"),
  caml_new_string("hostname"),
  caml_new_string("pathname"),
  caml_new_string("search"),
  caml_new_string("protocol"),
  caml_new_string("reload"),
  caml_new_string("replace")
];
var cst_Js_of_ocaml_Url_Local_exn = caml_new_string(
  "Js_of_ocaml__Url.Local_exn"
);
var cst = caml_new_string("+");
var cst_Js_of_ocaml_Url_Not_an_http_protocol = caml_new_string(
  "Js_of_ocaml__Url.Not_an_http_protocol"
);
var cst_Hh_Tt_Tt_Pp_Ss_0_9a_zA_Z_0_9a_zA_Z_0_9A_Fa_f_0_9 = caml_new_string(
  "^([Hh][Tt][Tt][Pp][Ss]?)://([0-9a-zA-Z.-]+|\\[[0-9a-zA-Z.-]+\\]|\\[[0-9A-Fa-f:.]+\\])?(:([0-9]+))?(/([^\\?#]*)(\\?([^#]*))?(#(.*))?)?$"
);
var cst_Ff_Ii_Ll_Ee = caml_new_string(
  "^([Ff][Ii][Ll][Ee])://([^\\?#]*)(\\?([^#]*))?(#(.*))?$"
);
var Js_of_ocaml_Js = global_data["Js_of_ocaml__Js"];
var Failure = global_data["Failure"];
var CamlinternalOO = global_data["CamlinternalOO"];
var Pervasives = global_data["Pervasives"];
var List = global_data["List_"];
var String = global_data["String_"];
var Not_found = global_data["Not_found"];
var Js_of_ocaml_Regexp = global_data["Js_of_ocaml__Regexp"];
var Js_of_ocaml_Dom_html = global_data["Js_of_ocaml__Dom_html"];
var p5 = [0,caml_new_string(""),0];
var p0 = [
  0,
  caml_new_string("search"),
  caml_new_string("replace"),
  caml_new_string("reload"),
  caml_new_string("protocol"),
  caml_new_string("port"),
  caml_new_string("pathname"),
  caml_new_string("origin"),
  caml_new_string("href"),
  caml_new_string("hostname"),
  caml_new_string("host"),
  caml_new_string("hash"),
  caml_new_string("assign")
];

function split(c, s) {
  function s2(x) {
    return caml_call1(caml_get_public_method(x, 24046298, 267), x);
  }
  var s3 = caml_call2(String[1], 1, c).toString();
  var s4 = function(t1, t0, param) {return t1.split(t0);}(s, s3, s2);
  return caml_call1(Js_of_ocaml_Js[20], s4);
}

function split_2(c, s) {
  function sU(x) {
    return caml_call1(caml_get_public_method(x, -524334903, 268), x);
  }
  var sV = caml_call2(String[1], 1, c).toString();
  var index = function(t8, t7, param) {return t8.indexOf(t7);}(s, sV, sU);
  if (0 <= index) {
    var sW = function(x) {
      return caml_call1(caml_get_public_method(x, -303194578, 269), x);
    };
    var sX = index + 1 | 0;
    var sY = function(t6, t5, param) {return t6.slice(t5);}(s, sX, sW);
    var sZ = function(x) {
      return caml_call1(caml_get_public_method(x, -20462510, 270), x);
    };
    var s0 = 0;
    var s1 = [
      0,
      function(t4, t2, t3, param) {return t4.slice(t2, t3);}(s, s0, index, sZ),
      sY
    ];
    return caml_call1(Js_of_ocaml_Js[4], s1);
  }
  return Js_of_ocaml_Js[3];
}

var Local_exn = [248,cst_Js_of_ocaml_Url_Local_exn,caml_fresh_oo_id(0)];

function interrupt(param) {
  throw runtime["caml_wrap_thrown_exception"](Local_exn);
}

var plus_re = caml_call1(Js_of_ocaml_Regexp[5], cst);

function escape_plus(s) {
  return caml_call3(Js_of_ocaml_Regexp[12], plus_re, s, cst_2B);
}

function unescape_plus(s) {
  return caml_call3(Js_of_ocaml_Regexp[12], plus_re, s, cst__0);
}

var p1 = 0;
var p2 = "g";
var p3 = "\\+";
var p4 = Js_of_ocaml_Js[11];
var plus_re_js_string = function(t11, t9, t10, param) {return new t11(t9, t10);
}(p4, p3, p2, p1
);

function unescape_plus_js_string(s) {
  function sQ(x) {
    return caml_call1(caml_get_public_method(x, 180472028, 271), x);
  }
  var sR = 0;
  (function(t16, t15, param) {t16.lastIndex = t15;return 0;}(plus_re_js_string, sR, sQ
   ));
  function sS(x) {
    return caml_call1(caml_get_public_method(x, 724060212, 272), x);
  }
  var sT = " ";
  return function(t14, t12, t13, param) {return t14.replace(t12, t13);}(s, plus_re_js_string, sT, sS
  );
}

function urldecode_js_string_string(s) {
  var sP = unescape_plus_js_string(s);
  return caml_js_to_byte_string(caml_call1(Js_of_ocaml_Js[42], sP));
}

function urldecode(s) {
  var sO = caml_jsbytes_of_string(unescape_plus(s));
  return caml_js_to_byte_string(caml_call1(Js_of_ocaml_Js[42], sO));
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
       caml_call1(Js_of_ocaml_Js[41], caml_jsbytes_of_string(s))
     )
   ) :
    caml_js_to_byte_string(
     caml_call1(Js_of_ocaml_Js[41], caml_jsbytes_of_string(s))
   );
}

var Not_an_http_protocol = [
  248,
  cst_Js_of_ocaml_Url_Not_an_http_protocol,
  caml_fresh_oo_id(0)
];

function is_secure(prot_string) {
  function sN(x) {
    return caml_call1(caml_get_public_method(x, 946097238, 273), x);
  }
  var match = caml_js_to_byte_string(
    function(t17, param) {return t17.toLowerCase();}(prot_string, sN)
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
  throw runtime["caml_wrap_thrown_exception"](Not_an_http_protocol);
}

var default_http_port = 80;
var default_https_port = 443;

function path_of_path_string(s) {
  var l = runtime["caml_ml_string_length"](s);
  function aux(i) {
    try {var sL = caml_call3(String[18], s, i, 47);var j = sL;}
    catch(sM) {
      sM = caml_wrap_exception(sM);
      if (sM !== Not_found) {
        throw runtime["caml_wrap_thrown_exception_reraise"](sM);
      }
      var j = l;
    }
    var word = caml_call3(String[4], s, i, j - i | 0);
    return l <= j ? [0,word,0] : [0,word,aux(j + 1 | 0)];
  }
  var a = aux(0);
  if (a) {
    if (! caml_string_notequal(a[1], cst__1)) {
      var sK = a[2];
      if (! sK) {return 0;}
      if (! caml_string_notequal(sK[1], cst__2)) {if (! sK[2]) {return p5;}}
    }
  }
  return a;
}

function encode_arguments(l) {
  function sF(param) {
    var v = param[2];
    var n = param[1];
    var sH = urlencode(0, v);
    var sI = caml_call2(Pervasives[16], cst__3, sH);
    var sJ = urlencode(0, n);
    return caml_call2(Pervasives[16], sJ, sI);
  }
  var sG = caml_call2(List[17], sF, l);
  return caml_call2(String[7], cst__4, sG);
}

function decode_arguments_js_string(s) {
  var arr = split(38, s);
  function sw(x) {
    return caml_call1(caml_get_public_method(x, 520590566, 274), x);
  }
  var len = function(t18, param) {return t18.length;}(arr, sw);
  function name_value_split(s) {return split_2(61, s);}
  function aux(acc, idx) {
    var idx__0 = idx;
    for (; ; ) {
      if (0 <= idx__0) {
        try {
          var sx = idx__0 + -1 | 0;
          var sy = function(s) {
            function sC(param) {
              var y = param[2];
              var x = param[1];
              var sE = urldecode_js_string_string(y);
              return [0,urldecode_js_string_string(x),sE];
            }
            var sD = name_value_split(s);
            return caml_call3(Js_of_ocaml_Js[6][7], sD, interrupt, sC);
          };
          var sz = caml_call2(Js_of_ocaml_Js[16], arr, idx__0);
          var sA = aux(
            [0,caml_call3(Js_of_ocaml_Js[6][7], sz, interrupt, sy),acc],
            sx
          );
          return sA;
        }
        catch(sB) {
          sB = caml_wrap_exception(sB);
          if (sB === Local_exn) {
            var idx__1 = idx__0 + -1 | 0;
            var idx__0 = idx__1;
            continue;
          }
          throw runtime["caml_wrap_thrown_exception_reraise"](sB);
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

var p6 = 0;
var p7 = caml_jsbytes_of_string(
  cst_Hh_Tt_Tt_Pp_Ss_0_9a_zA_Z_0_9a_zA_Z_0_9A_Fa_f_0_9
);
var p8 = Js_of_ocaml_Js[10];
var url_re = function(t20, t19, param) {return new t20(t19);}(p8, p7, p6);
var p9 = 0;
var p_ = caml_jsbytes_of_string(cst_Ff_Ii_Ll_Ee);
var qa = Js_of_ocaml_Js[10];
var file_re = function(t22, t21, param) {return new t22(t21);}(qa, p_, p9);

function url_of_js_string(s) {
  function r3(handle) {
    var res = caml_call1(Js_of_ocaml_Js[21], handle);
    var sh = caml_call2(Js_of_ocaml_Js[16], res, 1);
    var ssl = is_secure(caml_call2(Js_of_ocaml_Js[6][8], sh, interrupt));
    function port_of_string(s) {
      return caml_string_notequal(s, cst__5) ?
        caml_int_of_string(s) :
        ssl ? 443 : 80;
    }
    function si(param) {return caml_jsbytes_of_string(cst__6);}
    var sj = caml_call2(Js_of_ocaml_Js[16], res, 6);
    var path_str = urldecode_js_string_string(
      caml_call2(Js_of_ocaml_Js[6][8], sj, si)
    );
    function sk(param) {return caml_jsbytes_of_string(cst__7);}
    var sl = caml_call2(Js_of_ocaml_Js[16], res, 10);
    var sm = urldecode_js_string_string(
      caml_call2(Js_of_ocaml_Js[6][8], sl, sk)
    );
    function sn(param) {return caml_jsbytes_of_string(cst__8);}
    var so = caml_call2(Js_of_ocaml_Js[16], res, 8);
    var sp = decode_arguments_js_string(
      caml_call2(Js_of_ocaml_Js[6][8], so, sn)
    );
    var sq = path_of_path_string(path_str);
    function sr(param) {return caml_jsbytes_of_string(cst__9);}
    var ss = caml_call2(Js_of_ocaml_Js[16], res, 4);
    var st = port_of_string(
      caml_js_to_byte_string(caml_call2(Js_of_ocaml_Js[6][8], ss, sr))
    );
    var su = caml_call2(Js_of_ocaml_Js[16], res, 2);
    var url = [
      0,
      urldecode_js_string_string(
        caml_call2(Js_of_ocaml_Js[6][8], su, interrupt)
      ),
      st,
      sq,
      path_str,
      sp,
      sm
    ];
    var sv = ssl ? [1,url] : [0,url];
    return [0,sv];
  }
  function r4(param) {
    function r7(handle) {
      var res = caml_call1(Js_of_ocaml_Js[21], handle);
      var sa = caml_call2(Js_of_ocaml_Js[16], res, 2);
      var path_str = urldecode_js_string_string(
        caml_call2(Js_of_ocaml_Js[6][8], sa, interrupt)
      );
      function sb(param) {return caml_jsbytes_of_string(cst__10);}
      var sc = caml_call2(Js_of_ocaml_Js[16], res, 6);
      var sd = caml_js_to_byte_string(caml_call2(Js_of_ocaml_Js[6][8], sc, sb)
      );
      function se(param) {return caml_jsbytes_of_string(cst__11);}
      var sf = caml_call2(Js_of_ocaml_Js[16], res, 4);
      var sg = decode_arguments_js_string(
        caml_call2(Js_of_ocaml_Js[6][8], sf, se)
      );
      return [0,[2,[0,path_of_path_string(path_str),path_str,sg,sd]]];
    }
    function r8(param) {return 0;}
    function r9(x) {
      return caml_call1(caml_get_public_method(x, -1021447279, 275), x);
    }
    var r_ = function(t26, t25, param) {return t26.exec(t25);}(file_re, s, r9);
    return caml_call3(Js_of_ocaml_Js[5][7], r_, r8, r7);
  }
  function r5(x) {
    return caml_call1(caml_get_public_method(x, -1021447279, 276), x);
  }
  var r6 = function(t24, t23, param) {return t24.exec(t23);}(url_re, s, r5);
  return caml_call3(Js_of_ocaml_Js[5][7], r6, r4, r3);
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
        var rq = urlencode(0, frag);
        var rr = caml_call2(Pervasives[16], cst__13, rq);
      }
      else var rr = cst__20;
      if (args) {
        var rs = encode_arguments(args);
        var rt = caml_call2(Pervasives[16], cst__14, rs);
      }
      else var rt = cst__19;
      var ru = caml_call2(Pervasives[16], rt, rr);
      var rv = function(x) {return urlencode(0, x);};
      var rw = caml_call2(List[17], rv, path);
      var rx = caml_call2(String[7], cst__15, rw);
      var ry = caml_call2(Pervasives[16], rx, ru);
      var rz = caml_call2(Pervasives[16], cst__16, ry);
      if (80 === port) var rA = cst__17;
      else {
        var rE = caml_call1(Pervasives[21], port);
        var rA = caml_call2(Pervasives[16], cst__18, rE);
      }
      var rB = caml_call2(Pervasives[16], rA, rz);
      var rC = urlencode(0, host);
      var rD = caml_call2(Pervasives[16], rC, rB);
      return caml_call2(Pervasives[16], cst_http__1, rD);
    case 1:
      var match__0 = param[1];
      var frag__0 = match__0[6];
      var args__0 = match__0[5];
      var path__0 = match__0[3];
      var port__0 = match__0[2];
      var host__0 = match__0[1];
      if (caml_string_notequal(frag__0, cst__21)) {
        var rF = urlencode(0, frag__0);
        var rG = caml_call2(Pervasives[16], cst__22, rF);
      }
      else var rG = cst__29;
      if (args__0) {
        var rH = encode_arguments(args__0);
        var rI = caml_call2(Pervasives[16], cst__23, rH);
      }
      else var rI = cst__28;
      var rJ = caml_call2(Pervasives[16], rI, rG);
      var rK = function(x) {return urlencode(0, x);};
      var rL = caml_call2(List[17], rK, path__0);
      var rM = caml_call2(String[7], cst__24, rL);
      var rN = caml_call2(Pervasives[16], rM, rJ);
      var rO = caml_call2(Pervasives[16], cst__25, rN);
      if (443 === port__0) var rP = cst__26;
      else {
        var rT = caml_call1(Pervasives[21], port__0);
        var rP = caml_call2(Pervasives[16], cst__27, rT);
      }
      var rQ = caml_call2(Pervasives[16], rP, rO);
      var rR = urlencode(0, host__0);
      var rS = caml_call2(Pervasives[16], rR, rQ);
      return caml_call2(Pervasives[16], cst_https__1, rS);
    default:
      var match__1 = param[1];
      var frag__1 = match__1[4];
      var args__1 = match__1[3];
      var path__1 = match__1[1];
      if (caml_string_notequal(frag__1, cst__30)) {
        var rU = urlencode(0, frag__1);
        var rV = caml_call2(Pervasives[16], cst__31, rU);
      }
      else var rV = cst__35;
      if (args__1) {
        var rW = encode_arguments(args__1);
        var rX = caml_call2(Pervasives[16], cst__32, rW);
      }
      else var rX = cst__34;
      var rY = caml_call2(Pervasives[16], rX, rV);
      var rZ = function(x) {return urlencode(0, x);};
      var r0 = caml_call2(List[17], rZ, path__1);
      var r1 = caml_call2(String[7], cst__33, r0);
      var r2 = caml_call2(Pervasives[16], r1, rY);
      return caml_call2(Pervasives[16], cst_file__1, r2)
    }
}

function qb(x) {
  return caml_call1(caml_get_public_method(x, -448369099, 277), x);
}

var qc = Js_of_ocaml_Dom_html[8];
var qd = function(t42, param) {return t42.location;}(qc, qb);
var qe = caml_call1(Js_of_ocaml_Js[6][2], qd);

if (caml_call1(Js_of_ocaml_Js[6][5], qe)) {
  var qf = function(x) {
    return caml_call1(caml_get_public_method(x, -448369099, 278), x);
  };
  var qg = Js_of_ocaml_Dom_html[8];
  var l = function(t41, param) {return t41.location;}(qg, qf);
}
else {
  var empty = "";
  var qx = [0,0,0,0];
  var qy = function(self, href, protocol, host, hostname, port, pathname, search, hash, origin, reload, replace, assign) {
    if (! qx[1]) {
      var qX = caml_call1(CamlinternalOO[16], shared);
      var qY = caml_call2(CamlinternalOO[3], qX, cst__37);
      var qZ = caml_call2(CamlinternalOO[8], qX, p0);
      var q0 = qZ[1];
      var q1 = qZ[2];
      var q2 = qZ[3];
      var q3 = qZ[4];
      var q4 = qZ[5];
      var q5 = qZ[6];
      var q6 = qZ[7];
      var q7 = qZ[8];
      var q8 = qZ[9];
      var q9 = qZ[10];
      var q_ = qZ[11];
      var ra = qZ[12];
      var rb = function(self_1) {
        var env = self_1[qY + 1];
        return caml_call1(env[2], env[1]);
      };
      var rc = function(self_1) {
        var env = self_1[qY + 1];
        return caml_call1(env[3], env[1]);
      };
      var rd = function(self_1) {
        var env = self_1[qY + 1];
        return caml_call1(env[4], env[1]);
      };
      var re = function(self_1) {var env = self_1[qY + 1];return env[5];};
      var rf = function(self_1) {var env = self_1[qY + 1];return env[6];};
      var rg = function(self_1) {var env = self_1[qY + 1];return env[7];};
      var rh = function(self_1) {var env = self_1[qY + 1];return env[8];};
      var ri = function(self_1) {var env = self_1[qY + 1];return env[9];};
      var rj = function(self_1) {var env = self_1[qY + 1];return env[10];};
      var rk = function(self_1) {var env = self_1[qY + 1];return env[11];};
      var rl = function(self_1) {var env = self_1[qY + 1];return env[12];};
      var rm = [
        0,
        q7,
        function(self_1) {var env = self_1[qY + 1];return env[13];},
        q3,
        rl,
        q9,
        rk,
        q8,
        rj,
        q4,
        ri,
        q5,
        rh,
        q0,
        rg,
        q_,
        rf,
        q6,
        re,
        q2,
        rd,
        q1,
        rc,
        ra,
        rb
      ];
      caml_call2(CamlinternalOO[11], qX, rm);
      var rn = function(ro) {
        var rp = caml_call2(CamlinternalOO[24], 0, qX);
        rp[qY + 1] = ro;
        return rp;
      };
      caml_call1(CamlinternalOO[17], qX);
      qx[1] = rn;
    }
    return caml_call1(
      qx[1],
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
  var qz = function(param, qW) {return 0;};
  var qA = function(param, qV) {return 0;};
  var qB = function(param) {return 0;};
  var qC = Js_of_ocaml_Js[3];
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
  }(empty, empty, empty, empty, empty, empty, empty, empty, qC, qB, qA, qz, qy
  );
}

function qh(x) {
  return caml_call1(caml_get_public_method(x, -757983821, 279), x);
}

var host = urldecode_js_string_string(
  function(t43, param) {return t43.hostname;}(l, qh)
);

function qi(x) {
  return caml_call1(caml_get_public_method(x, 6510168, 280), x);
}

var protocol = urldecode_js_string_string(
  function(t44, param) {return t44.protocol;}(l, qi)
);
var qj = 0;
var port = function(param) {
  try {
    var qS = function(x) {
      return caml_call1(caml_get_public_method(x, -899906687, 281), x);
    };
    var qT = [
      0,
      caml_int_of_string(
        caml_js_to_byte_string(function(t45, param) {return t45.port;}(l, qS))
      )
    ];
    return qT;
  }
  catch(qU) {
    qU = caml_wrap_exception(qU);
    if (qU[1] === Failure) {return 0;}
    throw runtime["caml_wrap_thrown_exception_reraise"](qU);
  }
}(qj
);

function qk(x) {
  return caml_call1(caml_get_public_method(x, -742027664, 282), x);
}

var path_string = urldecode_js_string_string(
  function(t46, param) {return t46.pathname;}(l, qk)
);
var path = path_of_path_string(path_string);
var ql = "?";

function qm(x) {
  return caml_call1(caml_get_public_method(x, 930445673, 283), x);
}

var qn = 0;

function qo(x) {
  return caml_call1(caml_get_public_method(x, -487088280, 284), x);
}

var qp = function(t51, param) {return t51.search;}(l, qo);

if (function(t53, t52, param) {return t53.charAt(t52);}(qp, qn, qm) === ql) {
  var qq = function(x) {
    return caml_call1(caml_get_public_method(x, -303194578, 285), x);
  };
  var qr = 1;
  var qs = function(x) {
    return caml_call1(caml_get_public_method(x, -487088280, 286), x);
  };
  var qt = function(t48, param) {return t48.search;}(l, qs);
  var qu = function(t50, t49, param) {return t50.slice(t49);}(qt, qr, qq);
}
else {
  var qw = function(x) {
    return caml_call1(caml_get_public_method(x, -487088280, 293), x);
  };
  var qu = function(t47, param) {return t47.search;}(l, qw);
}

var arguments__0 = decode_arguments_js_string(qu);

function get_fragment(param) {
  function qI(res) {
    var res__0 = caml_call1(Js_of_ocaml_Js[21], res);
    return runtime["caml_js_to_string"](res__0[1]);
  }
  function qJ(param) {return cst__36;}
  function qK(x) {
    return caml_call1(caml_get_public_method(x, -16084858, 287), x);
  }
  var qL = 0;
  var qM = "#(.*)";
  var qN = Js_of_ocaml_Js[10];
  var qO = function(t56, t55, param) {return new t56(t55);}(qN, qM, qL);
  function qP(x) {
    return caml_call1(caml_get_public_method(x, -988476949, 288), x);
  }
  var qQ = function(t54, param) {return t54.href;}(l, qP);
  var qR = function(t58, t57, param) {return t58.match(t57);}(qQ, qO, qK);
  return caml_call3(Js_of_ocaml_Js[5][7], qR, qJ, qI);
}

function set_fragment(s) {
  function qG(x) {
    return caml_call1(caml_get_public_method(x, -989319218, 289), x);
  }
  var qH = caml_jsbytes_of_string(urlencode(0, s));
  return function(t60, t59, param) {t60.hash = t59;return 0;}(l, qH, qG);
}

function get(param) {
  function qF(x) {
    return caml_call1(caml_get_public_method(x, -988476949, 290), x);
  }
  return url_of_js_string(function(t61, param) {return t61.href;}(l, qF));
}

function set(u) {
  function qD(x) {
    return caml_call1(caml_get_public_method(x, -988476949, 291), x);
  }
  var qE = caml_jsbytes_of_string(string_of_url(u));
  return function(t63, t62, param) {t63.href = t62;return 0;}(l, qE, qD);
}

function qv(x) {
  return caml_call1(caml_get_public_method(x, -988476949, 292), x);
}

var as_string = urldecode_js_string_string(
  function(t64, param) {return t64.href;}(l, qv)
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

runtime["caml_register_global"](110, Js_of_ocaml_Url, "Js_of_ocaml__Url");


module.exports = global.jsoo_runtime.caml_get_global_data().Js_of_ocaml__Url;