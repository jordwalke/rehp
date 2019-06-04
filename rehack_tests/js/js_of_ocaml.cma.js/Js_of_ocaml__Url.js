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
var p4 = [0,caml_new_string(""),0];
var pZ = [
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
  function s1(x) {
    return caml_call1(caml_get_public_method(x, 24046298, 267), x);
  }
  var s2 = caml_call2(String[1], 1, c).toString();
  var s3 = function(t1, t0, param) {return t1.split(t0);}(s, s2, s1);
  return caml_call1(Js_of_ocaml_Js[20], s3);
}

function split_2(c, s) {
  function sT(x) {
    return caml_call1(caml_get_public_method(x, -524334903, 268), x);
  }
  var sU = caml_call2(String[1], 1, c).toString();
  var index = function(t8, t7, param) {return t8.indexOf(t7);}(s, sU, sT);
  if (0 <= index) {
    var sV = function(x) {
      return caml_call1(caml_get_public_method(x, -303194578, 269), x);
    };
    var sW = index + 1 | 0;
    var sX = function(t6, t5, param) {return t6.slice(t5);}(s, sW, sV);
    var sY = function(x) {
      return caml_call1(caml_get_public_method(x, -20462510, 270), x);
    };
    var sZ = 0;
    var s0 = [
      0,
      function(t4, t2, t3, param) {return t4.slice(t2, t3);}(s, sZ, index, sY),
      sX
    ];
    return caml_call1(Js_of_ocaml_Js[4], s0);
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

var p0 = 0;
var p1 = "g";
var p2 = "\\+";
var p3 = Js_of_ocaml_Js[11];
var plus_re_js_string = function(t11, t9, t10, param) {return new t11(t9, t10);
}(p3, p2, p1, p0
);

function unescape_plus_js_string(s) {
  function sP(x) {
    return caml_call1(caml_get_public_method(x, 180472028, 271), x);
  }
  var sQ = 0;
  (function(t16, t15, param) {t16.lastIndex = t15;return 0;}(plus_re_js_string, sQ, sP
   ));
  function sR(x) {
    return caml_call1(caml_get_public_method(x, 724060212, 272), x);
  }
  var sS = " ";
  return function(t14, t12, t13, param) {return t14.replace(t12, t13);}(s, plus_re_js_string, sS, sR
  );
}

function urldecode_js_string_string(s) {
  var sO = unescape_plus_js_string(s);
  return caml_js_to_byte_string(caml_call1(Js_of_ocaml_Js[42], sO));
}

function urldecode(s) {
  var sN = caml_jsbytes_of_string(unescape_plus(s));
  return caml_js_to_byte_string(caml_call1(Js_of_ocaml_Js[42], sN));
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
  function sM(x) {
    return caml_call1(caml_get_public_method(x, 946097238, 273), x);
  }
  var match = caml_js_to_byte_string(
    function(t17, param) {return t17.toLowerCase();}(prot_string, sM)
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
    try {var sK = caml_call3(String[18], s, i, 47);var j = sK;}
    catch(sL) {
      sL = caml_wrap_exception(sL);
      if (sL !== Not_found) {
        throw runtime["caml_wrap_thrown_exception_reraise"](sL);
      }
      var j = l;
    }
    var word = caml_call3(String[4], s, i, j - i | 0);
    return l <= j ? [0,word,0] : [0,word,aux(j + 1 | 0)];
  }
  var a = aux(0);
  if (a) {
    if (! caml_string_notequal(a[1], cst__1)) {
      var sJ = a[2];
      if (! sJ) {return 0;}
      if (! caml_string_notequal(sJ[1], cst__2)) {if (! sJ[2]) {return p4;}}
    }
  }
  return a;
}

function encode_arguments(l) {
  function sE(param) {
    var v = param[2];
    var n = param[1];
    var sG = urlencode(0, v);
    var sH = caml_call2(Pervasives[16], cst__3, sG);
    var sI = urlencode(0, n);
    return caml_call2(Pervasives[16], sI, sH);
  }
  var sF = caml_call2(List[17], sE, l);
  return caml_call2(String[7], cst__4, sF);
}

function decode_arguments_js_string(s) {
  var arr = split(38, s);
  function sv(x) {
    return caml_call1(caml_get_public_method(x, 520590566, 274), x);
  }
  var len = function(t18, param) {return t18.length;}(arr, sv);
  function name_value_split(s) {return split_2(61, s);}
  function aux(acc, idx) {
    var idx__0 = idx;
    for (; ; ) {
      if (0 <= idx__0) {
        try {
          var sw = idx__0 + -1 | 0;
          var sx = function(s) {
            function sB(param) {
              var y = param[2];
              var x = param[1];
              var sD = urldecode_js_string_string(y);
              return [0,urldecode_js_string_string(x),sD];
            }
            var sC = name_value_split(s);
            return caml_call3(Js_of_ocaml_Js[6][7], sC, interrupt, sB);
          };
          var sy = caml_call2(Js_of_ocaml_Js[16], arr, idx__0);
          var sz = aux(
            [0,caml_call3(Js_of_ocaml_Js[6][7], sy, interrupt, sx),acc],
            sw
          );
          return sz;
        }
        catch(sA) {
          sA = caml_wrap_exception(sA);
          if (sA === Local_exn) {
            var idx__1 = idx__0 + -1 | 0;
            var idx__0 = idx__1;
            continue;
          }
          throw runtime["caml_wrap_thrown_exception_reraise"](sA);
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

var p5 = 0;
var p6 = caml_jsbytes_of_string(
  cst_Hh_Tt_Tt_Pp_Ss_0_9a_zA_Z_0_9a_zA_Z_0_9A_Fa_f_0_9
);
var p7 = Js_of_ocaml_Js[10];
var url_re = function(t20, t19, param) {return new t20(t19);}(p7, p6, p5);
var p8 = 0;
var p9 = caml_jsbytes_of_string(cst_Ff_Ii_Ll_Ee);
var p_ = Js_of_ocaml_Js[10];
var file_re = function(t22, t21, param) {return new t22(t21);}(p_, p9, p8);

function url_of_js_string(s) {
  function r2(handle) {
    var res = caml_call1(Js_of_ocaml_Js[21], handle);
    var sg = caml_call2(Js_of_ocaml_Js[16], res, 1);
    var ssl = is_secure(caml_call2(Js_of_ocaml_Js[6][8], sg, interrupt));
    function port_of_string(s) {
      return caml_string_notequal(s, cst__5) ?
        caml_int_of_string(s) :
        ssl ? 443 : 80;
    }
    function sh(param) {return caml_jsbytes_of_string(cst__6);}
    var si = caml_call2(Js_of_ocaml_Js[16], res, 6);
    var path_str = urldecode_js_string_string(
      caml_call2(Js_of_ocaml_Js[6][8], si, sh)
    );
    function sj(param) {return caml_jsbytes_of_string(cst__7);}
    var sk = caml_call2(Js_of_ocaml_Js[16], res, 10);
    var sl = urldecode_js_string_string(
      caml_call2(Js_of_ocaml_Js[6][8], sk, sj)
    );
    function sm(param) {return caml_jsbytes_of_string(cst__8);}
    var sn = caml_call2(Js_of_ocaml_Js[16], res, 8);
    var so = decode_arguments_js_string(
      caml_call2(Js_of_ocaml_Js[6][8], sn, sm)
    );
    var sp = path_of_path_string(path_str);
    function sq(param) {return caml_jsbytes_of_string(cst__9);}
    var sr = caml_call2(Js_of_ocaml_Js[16], res, 4);
    var ss = port_of_string(
      caml_js_to_byte_string(caml_call2(Js_of_ocaml_Js[6][8], sr, sq))
    );
    var st = caml_call2(Js_of_ocaml_Js[16], res, 2);
    var url = [
      0,
      urldecode_js_string_string(
        caml_call2(Js_of_ocaml_Js[6][8], st, interrupt)
      ),
      ss,
      sp,
      path_str,
      so,
      sl
    ];
    var su = ssl ? [1,url] : [0,url];
    return [0,su];
  }
  function r3(param) {
    function r6(handle) {
      var res = caml_call1(Js_of_ocaml_Js[21], handle);
      var r_ = caml_call2(Js_of_ocaml_Js[16], res, 2);
      var path_str = urldecode_js_string_string(
        caml_call2(Js_of_ocaml_Js[6][8], r_, interrupt)
      );
      function sa(param) {return caml_jsbytes_of_string(cst__10);}
      var sb = caml_call2(Js_of_ocaml_Js[16], res, 6);
      var sc = caml_js_to_byte_string(caml_call2(Js_of_ocaml_Js[6][8], sb, sa)
      );
      function sd(param) {return caml_jsbytes_of_string(cst__11);}
      var se = caml_call2(Js_of_ocaml_Js[16], res, 4);
      var sf = decode_arguments_js_string(
        caml_call2(Js_of_ocaml_Js[6][8], se, sd)
      );
      return [0,[2,[0,path_of_path_string(path_str),path_str,sf,sc]]];
    }
    function r7(param) {return 0;}
    function r8(x) {
      return caml_call1(caml_get_public_method(x, -1021447279, 275), x);
    }
    var r9 = function(t26, t25, param) {return t26.exec(t25);}(file_re, s, r8);
    return caml_call3(Js_of_ocaml_Js[5][7], r9, r7, r6);
  }
  function r4(x) {
    return caml_call1(caml_get_public_method(x, -1021447279, 276), x);
  }
  var r5 = function(t24, t23, param) {return t24.exec(t23);}(url_re, s, r4);
  return caml_call3(Js_of_ocaml_Js[5][7], r5, r3, r2);
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
        var rp = urlencode(0, frag);
        var rq = caml_call2(Pervasives[16], cst__13, rp);
      }
      else var rq = cst__20;
      if (args) {
        var rr = encode_arguments(args);
        var rs = caml_call2(Pervasives[16], cst__14, rr);
      }
      else var rs = cst__19;
      var rt = caml_call2(Pervasives[16], rs, rq);
      var ru = function(x) {return urlencode(0, x);};
      var rv = caml_call2(List[17], ru, path);
      var rw = caml_call2(String[7], cst__15, rv);
      var rx = caml_call2(Pervasives[16], rw, rt);
      var ry = caml_call2(Pervasives[16], cst__16, rx);
      if (80 === port) var rz = cst__17;
      else {
        var rD = caml_call1(Pervasives[21], port);
        var rz = caml_call2(Pervasives[16], cst__18, rD);
      }
      var rA = caml_call2(Pervasives[16], rz, ry);
      var rB = urlencode(0, host);
      var rC = caml_call2(Pervasives[16], rB, rA);
      return caml_call2(Pervasives[16], cst_http__1, rC);
    case 1:
      var match__0 = param[1];
      var frag__0 = match__0[6];
      var args__0 = match__0[5];
      var path__0 = match__0[3];
      var port__0 = match__0[2];
      var host__0 = match__0[1];
      if (caml_string_notequal(frag__0, cst__21)) {
        var rE = urlencode(0, frag__0);
        var rF = caml_call2(Pervasives[16], cst__22, rE);
      }
      else var rF = cst__29;
      if (args__0) {
        var rG = encode_arguments(args__0);
        var rH = caml_call2(Pervasives[16], cst__23, rG);
      }
      else var rH = cst__28;
      var rI = caml_call2(Pervasives[16], rH, rF);
      var rJ = function(x) {return urlencode(0, x);};
      var rK = caml_call2(List[17], rJ, path__0);
      var rL = caml_call2(String[7], cst__24, rK);
      var rM = caml_call2(Pervasives[16], rL, rI);
      var rN = caml_call2(Pervasives[16], cst__25, rM);
      if (443 === port__0) var rO = cst__26;
      else {
        var rS = caml_call1(Pervasives[21], port__0);
        var rO = caml_call2(Pervasives[16], cst__27, rS);
      }
      var rP = caml_call2(Pervasives[16], rO, rN);
      var rQ = urlencode(0, host__0);
      var rR = caml_call2(Pervasives[16], rQ, rP);
      return caml_call2(Pervasives[16], cst_https__1, rR);
    default:
      var match__1 = param[1];
      var frag__1 = match__1[4];
      var args__1 = match__1[3];
      var path__1 = match__1[1];
      if (caml_string_notequal(frag__1, cst__30)) {
        var rT = urlencode(0, frag__1);
        var rU = caml_call2(Pervasives[16], cst__31, rT);
      }
      else var rU = cst__35;
      if (args__1) {
        var rV = encode_arguments(args__1);
        var rW = caml_call2(Pervasives[16], cst__32, rV);
      }
      else var rW = cst__34;
      var rX = caml_call2(Pervasives[16], rW, rU);
      var rY = function(x) {return urlencode(0, x);};
      var rZ = caml_call2(List[17], rY, path__1);
      var r0 = caml_call2(String[7], cst__33, rZ);
      var r1 = caml_call2(Pervasives[16], r0, rX);
      return caml_call2(Pervasives[16], cst_file__1, r1)
    }
}

function qa(x) {
  return caml_call1(caml_get_public_method(x, -448369099, 277), x);
}

var qb = Js_of_ocaml_Dom_html[8];
var qc = function(t42, param) {return t42.location;}(qb, qa);
var qd = caml_call1(Js_of_ocaml_Js[6][2], qc);

if (caml_call1(Js_of_ocaml_Js[6][5], qd)) {
  var qe = function(x) {
    return caml_call1(caml_get_public_method(x, -448369099, 278), x);
  };
  var qf = Js_of_ocaml_Dom_html[8];
  var l = function(t41, param) {return t41.location;}(qf, qe);
}
else {
  var empty = "";
  var qw = [0,0,0,0];
  var qx = function(self, href, protocol, host, hostname, port, pathname, search, hash, origin, reload, replace, assign) {
    if (! qw[1]) {
      var qW = caml_call1(CamlinternalOO[16], shared);
      var qX = caml_call2(CamlinternalOO[3], qW, cst__37);
      var qY = caml_call2(CamlinternalOO[8], qW, pZ);
      var qZ = qY[1];
      var q0 = qY[2];
      var q1 = qY[3];
      var q2 = qY[4];
      var q3 = qY[5];
      var q4 = qY[6];
      var q5 = qY[7];
      var q6 = qY[8];
      var q7 = qY[9];
      var q8 = qY[10];
      var q9 = qY[11];
      var q_ = qY[12];
      var ra = function(self_1) {
        var env = self_1[qX + 1];
        return caml_call1(env[2], env[1]);
      };
      var rb = function(self_1) {
        var env = self_1[qX + 1];
        return caml_call1(env[3], env[1]);
      };
      var rc = function(self_1) {
        var env = self_1[qX + 1];
        return caml_call1(env[4], env[1]);
      };
      var rd = function(self_1) {var env = self_1[qX + 1];return env[5];};
      var re = function(self_1) {var env = self_1[qX + 1];return env[6];};
      var rf = function(self_1) {var env = self_1[qX + 1];return env[7];};
      var rg = function(self_1) {var env = self_1[qX + 1];return env[8];};
      var rh = function(self_1) {var env = self_1[qX + 1];return env[9];};
      var ri = function(self_1) {var env = self_1[qX + 1];return env[10];};
      var rj = function(self_1) {var env = self_1[qX + 1];return env[11];};
      var rk = function(self_1) {var env = self_1[qX + 1];return env[12];};
      var rl = [
        0,
        q6,
        function(self_1) {var env = self_1[qX + 1];return env[13];},
        q2,
        rk,
        q8,
        rj,
        q7,
        ri,
        q3,
        rh,
        q4,
        rg,
        qZ,
        rf,
        q9,
        re,
        q5,
        rd,
        q1,
        rc,
        q0,
        rb,
        q_,
        ra
      ];
      caml_call2(CamlinternalOO[11], qW, rl);
      var rm = function(rn) {
        var ro = caml_call2(CamlinternalOO[24], 0, qW);
        ro[qX + 1] = rn;
        return ro;
      };
      caml_call1(CamlinternalOO[17], qW);
      qw[1] = rm;
    }
    return caml_call1(
      qw[1],
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
  var qy = function(param, qV) {return 0;};
  var qz = function(param, qU) {return 0;};
  var qA = function(param) {return 0;};
  var qB = Js_of_ocaml_Js[3];
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
  }(empty, empty, empty, empty, empty, empty, empty, empty, qB, qA, qz, qy, qx
  );
}

function qg(x) {
  return caml_call1(caml_get_public_method(x, -757983821, 279), x);
}

var host = urldecode_js_string_string(
  function(t43, param) {return t43.hostname;}(l, qg)
);

function qh(x) {
  return caml_call1(caml_get_public_method(x, 6510168, 280), x);
}

var protocol = urldecode_js_string_string(
  function(t44, param) {return t44.protocol;}(l, qh)
);
var qi = 0;
var port = function(param) {
  try {
    var qR = function(x) {
      return caml_call1(caml_get_public_method(x, -899906687, 281), x);
    };
    var qS = [
      0,
      caml_int_of_string(
        caml_js_to_byte_string(function(t45, param) {return t45.port;}(l, qR))
      )
    ];
    return qS;
  }
  catch(qT) {
    qT = caml_wrap_exception(qT);
    if (qT[1] === Failure) {return 0;}
    throw runtime["caml_wrap_thrown_exception_reraise"](qT);
  }
}(qi
);

function qj(x) {
  return caml_call1(caml_get_public_method(x, -742027664, 282), x);
}

var path_string = urldecode_js_string_string(
  function(t46, param) {return t46.pathname;}(l, qj)
);
var path = path_of_path_string(path_string);
var qk = "?";

function ql(x) {
  return caml_call1(caml_get_public_method(x, 930445673, 283), x);
}

var qm = 0;

function qn(x) {
  return caml_call1(caml_get_public_method(x, -487088280, 284), x);
}

var qo = function(t51, param) {return t51.search;}(l, qn);

if (function(t53, t52, param) {return t53.charAt(t52);}(qo, qm, ql) === qk) {
  var qp = function(x) {
    return caml_call1(caml_get_public_method(x, -303194578, 285), x);
  };
  var qq = 1;
  var qr = function(x) {
    return caml_call1(caml_get_public_method(x, -487088280, 286), x);
  };
  var qs = function(t48, param) {return t48.search;}(l, qr);
  var qt = function(t50, t49, param) {return t50.slice(t49);}(qs, qq, qp);
}
else {
  var qv = function(x) {
    return caml_call1(caml_get_public_method(x, -487088280, 293), x);
  };
  var qt = function(t47, param) {return t47.search;}(l, qv);
}

var arguments__0 = decode_arguments_js_string(qt);

function get_fragment(param) {
  function qH(res) {
    var res__0 = caml_call1(Js_of_ocaml_Js[21], res);
    return runtime["caml_js_to_string"](res__0[1]);
  }
  function qI(param) {return cst__36;}
  function qJ(x) {
    return caml_call1(caml_get_public_method(x, -16084858, 287), x);
  }
  var qK = 0;
  var qL = "#(.*)";
  var qM = Js_of_ocaml_Js[10];
  var qN = function(t56, t55, param) {return new t56(t55);}(qM, qL, qK);
  function qO(x) {
    return caml_call1(caml_get_public_method(x, -988476949, 288), x);
  }
  var qP = function(t54, param) {return t54.href;}(l, qO);
  var qQ = function(t58, t57, param) {return t58.match(t57);}(qP, qN, qJ);
  return caml_call3(Js_of_ocaml_Js[5][7], qQ, qI, qH);
}

function set_fragment(s) {
  function qF(x) {
    return caml_call1(caml_get_public_method(x, -989319218, 289), x);
  }
  var qG = caml_jsbytes_of_string(urlencode(0, s));
  return function(t60, t59, param) {t60.hash = t59;return 0;}(l, qG, qF);
}

function get(param) {
  function qE(x) {
    return caml_call1(caml_get_public_method(x, -988476949, 290), x);
  }
  return url_of_js_string(function(t61, param) {return t61.href;}(l, qE));
}

function set(u) {
  function qC(x) {
    return caml_call1(caml_get_public_method(x, -988476949, 291), x);
  }
  var qD = caml_jsbytes_of_string(string_of_url(u));
  return function(t63, t62, param) {t63.href = t62;return 0;}(l, qD, qC);
}

function qu(x) {
  return caml_call1(caml_get_public_method(x, -988476949, 292), x);
}

var as_string = urldecode_js_string_string(
  function(t64, param) {return t64.href;}(l, qu)
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