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
var p3 = [0,caml_new_string(""),0];
var pY = [
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
  function s0(x) {
    return caml_call1(caml_get_public_method(x, 24046298, 267), x);
  }
  var s1 = caml_call2(String[1], 1, c).toString();
  var s2 = function(t1, t0, param) {return t1.split(t0);}(s, s1, s0);
  return caml_call1(Js_of_ocaml_Js[20], s2);
}

function split_2(c, s) {
  function sS(x) {
    return caml_call1(caml_get_public_method(x, -524334903, 268), x);
  }
  var sT = caml_call2(String[1], 1, c).toString();
  var index = function(t8, t7, param) {return t8.indexOf(t7);}(s, sT, sS);
  if (0 <= index) {
    var sU = function(x) {
      return caml_call1(caml_get_public_method(x, -303194578, 269), x);
    };
    var sV = index + 1 | 0;
    var sW = function(t6, t5, param) {return t6.slice(t5);}(s, sV, sU);
    var sX = function(x) {
      return caml_call1(caml_get_public_method(x, -20462510, 270), x);
    };
    var sY = 0;
    var sZ = [
      0,
      function(t4, t2, t3, param) {return t4.slice(t2, t3);}(s, sY, index, sX),
      sW
    ];
    return caml_call1(Js_of_ocaml_Js[4], sZ);
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

var pZ = 0;
var p0 = "g";
var p1 = "\\+";
var p2 = Js_of_ocaml_Js[11];
var plus_re_js_string = function(t11, t9, t10, param) {return new t11(t9, t10);
}(p2, p1, p0, pZ
);

function unescape_plus_js_string(s) {
  function sO(x) {
    return caml_call1(caml_get_public_method(x, 180472028, 271), x);
  }
  var sP = 0;
  (function(t16, t15, param) {return t16.lastIndex = t15;}(plus_re_js_string, sP, sO
   ));
  function sQ(x) {
    return caml_call1(caml_get_public_method(x, 724060212, 272), x);
  }
  var sR = " ";
  return function(t14, t12, t13, param) {return t14.replace(t12, t13);}(s, plus_re_js_string, sR, sQ
  );
}

function urldecode_js_string_string(s) {
  var sN = unescape_plus_js_string(s);
  return caml_js_to_byte_string(caml_call1(Js_of_ocaml_Js[42], sN));
}

function urldecode(s) {
  var sM = caml_jsbytes_of_string(unescape_plus(s));
  return caml_js_to_byte_string(caml_call1(Js_of_ocaml_Js[42], sM));
}

function urlencode(opt, s) {
  if (opt) {
    var sth = opt[1];
    var with_plus = sth;
  }
  else var with_plus = 1;
  if (with_plus) {
    return escape_plus(
      caml_js_to_byte_string(
        caml_call1(Js_of_ocaml_Js[41], caml_jsbytes_of_string(s))
      )
    );
  }
  return caml_js_to_byte_string(
    caml_call1(Js_of_ocaml_Js[41], caml_jsbytes_of_string(s))
  );
}

var Not_an_http_protocol = [
  248,
  cst_Js_of_ocaml_Url_Not_an_http_protocol,
  caml_fresh_oo_id(0)
];

function is_secure(prot_string) {
  function sL(x) {
    return caml_call1(caml_get_public_method(x, 946097238, 273), x);
  }
  var match = caml_js_to_byte_string(
    function(t17, param) {return t17.toLowerCase();}(prot_string, sL)
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
    try {var sJ = caml_call3(String[18], s, i, 47);var j = sJ;}
    catch(sK) {
      sK = caml_wrap_exception(sK);
      if (sK !== Not_found) {
        throw runtime["caml_wrap_thrown_exception_reraise"](sK);
      }
      var j = l;
    }
    var word = caml_call3(String[4], s, i, j - i | 0);
    if (l <= j) {return [0,word,0];}
    return [0,word,aux(j + 1 | 0)];
  }
  var a = aux(0);
  if (a) {
    if (! caml_string_notequal(a[1], cst__1)) {
      var sI = a[2];
      if (! sI) {return 0;}
      if (! caml_string_notequal(sI[1], cst__2)) {if (! sI[2]) {return p3;}}
    }
  }
  return a;
}

function encode_arguments(l) {
  function sD(param) {
    var v = param[2];
    var n = param[1];
    var sF = urlencode(0, v);
    var sG = caml_call2(Pervasives[16], cst__3, sF);
    var sH = urlencode(0, n);
    return caml_call2(Pervasives[16], sH, sG);
  }
  var sE = caml_call2(List[17], sD, l);
  return caml_call2(String[7], cst__4, sE);
}

function decode_arguments_js_string(s) {
  var arr = split(38, s);
  function su(x) {
    return caml_call1(caml_get_public_method(x, 520590566, 274), x);
  }
  var len = function(t18, param) {return t18.length;}(arr, su);
  function name_value_split(s) {return split_2(61, s);}
  function aux(acc, idx) {
    var idx__0 = idx;
    for (; ; ) {
      if (0 <= idx__0) {
        try {
          var sv = idx__0 + -1 | 0;
          var sw = function(s) {
            function sA(param) {
              var y = param[2];
              var x = param[1];
              var sC = urldecode_js_string_string(y);
              return [0,urldecode_js_string_string(x),sC];
            }
            var sB = name_value_split(s);
            return caml_call3(Js_of_ocaml_Js[6][7], sB, interrupt, sA);
          };
          var sx = caml_call2(Js_of_ocaml_Js[16], arr, idx__0);
          var sy = aux(
            [0,caml_call3(Js_of_ocaml_Js[6][7], sx, interrupt, sw),acc],
            sv
          );
          return sy;
        }
        catch(sz) {
          sz = caml_wrap_exception(sz);
          if (sz === Local_exn) {
            var idx__1 = idx__0 + -1 | 0;
            var idx__0 = idx__1;
            continue;
          }
          throw runtime["caml_wrap_thrown_exception_reraise"](sz);
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

var p4 = 0;
var p5 = caml_jsbytes_of_string(
  cst_Hh_Tt_Tt_Pp_Ss_0_9a_zA_Z_0_9a_zA_Z_0_9A_Fa_f_0_9
);
var p6 = Js_of_ocaml_Js[10];
var url_re = function(t20, t19, param) {return new t20(t19);}(p6, p5, p4);
var p7 = 0;
var p8 = caml_jsbytes_of_string(cst_Ff_Ii_Ll_Ee);
var p9 = Js_of_ocaml_Js[10];
var file_re = function(t22, t21, param) {return new t22(t21);}(p9, p8, p7);

function url_of_js_string(s) {
  function r1(handle) {
    var res = caml_call1(Js_of_ocaml_Js[21], handle);
    var sf = caml_call2(Js_of_ocaml_Js[16], res, 1);
    var ssl = is_secure(caml_call2(Js_of_ocaml_Js[6][8], sf, interrupt));
    function port_of_string(s) {
      if (caml_string_notequal(s, cst__5)) {return caml_int_of_string(s);}
      if (ssl) {return 443;}
      return 80;
    }
    function sg(param) {return caml_jsbytes_of_string(cst__6);}
    var sh = caml_call2(Js_of_ocaml_Js[16], res, 6);
    var path_str = urldecode_js_string_string(
      caml_call2(Js_of_ocaml_Js[6][8], sh, sg)
    );
    function si(param) {return caml_jsbytes_of_string(cst__7);}
    var sj = caml_call2(Js_of_ocaml_Js[16], res, 10);
    var sk = urldecode_js_string_string(
      caml_call2(Js_of_ocaml_Js[6][8], sj, si)
    );
    function sl(param) {return caml_jsbytes_of_string(cst__8);}
    var sm = caml_call2(Js_of_ocaml_Js[16], res, 8);
    var sn = decode_arguments_js_string(
      caml_call2(Js_of_ocaml_Js[6][8], sm, sl)
    );
    var so = path_of_path_string(path_str);
    function sp(param) {return caml_jsbytes_of_string(cst__9);}
    var sq = caml_call2(Js_of_ocaml_Js[16], res, 4);
    var sr = port_of_string(
      caml_js_to_byte_string(caml_call2(Js_of_ocaml_Js[6][8], sq, sp))
    );
    var ss = caml_call2(Js_of_ocaml_Js[16], res, 2);
    var url = [
      0,
      urldecode_js_string_string(
        caml_call2(Js_of_ocaml_Js[6][8], ss, interrupt)
      ),
      sr,
      so,
      path_str,
      sn,
      sk
    ];
    if (ssl) var st = [
      1,
      url
    ];
    else var st = [0,url];
    return [0,st];
  }
  function r2(param) {
    function r5(handle) {
      var res = caml_call1(Js_of_ocaml_Js[21], handle);
      var r9 = caml_call2(Js_of_ocaml_Js[16], res, 2);
      var path_str = urldecode_js_string_string(
        caml_call2(Js_of_ocaml_Js[6][8], r9, interrupt)
      );
      function r_(param) {return caml_jsbytes_of_string(cst__10);}
      var sa = caml_call2(Js_of_ocaml_Js[16], res, 6);
      var sb = caml_js_to_byte_string(caml_call2(Js_of_ocaml_Js[6][8], sa, r_)
      );
      function sc(param) {return caml_jsbytes_of_string(cst__11);}
      var sd = caml_call2(Js_of_ocaml_Js[16], res, 4);
      var se = decode_arguments_js_string(
        caml_call2(Js_of_ocaml_Js[6][8], sd, sc)
      );
      return [0,[2,[0,path_of_path_string(path_str),path_str,se,sb]]];
    }
    function r6(param) {return 0;}
    function r7(x) {
      return caml_call1(caml_get_public_method(x, -1021447279, 275), x);
    }
    var r8 = function(t26, t25, param) {return t26.exec(t25);}(file_re, s, r7);
    return caml_call3(Js_of_ocaml_Js[5][7], r8, r6, r5);
  }
  function r3(x) {
    return caml_call1(caml_get_public_method(x, -1021447279, 276), x);
  }
  var r4 = function(t24, t23, param) {return t24.exec(t23);}(url_re, s, r3);
  return caml_call3(Js_of_ocaml_Js[5][7], r4, r2, r1);
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
        var ro = urlencode(0, frag);
        var rp = caml_call2(Pervasives[16], cst__13, ro);
      }
      else var rp = cst__20;
      if (args) {
        var rq = encode_arguments(args);
        var rr = caml_call2(Pervasives[16], cst__14, rq);
      }
      else var rr = cst__19;
      var rs = caml_call2(Pervasives[16], rr, rp);
      var rt = function(x) {return urlencode(0, x);};
      var ru = caml_call2(List[17], rt, path);
      var rv = caml_call2(String[7], cst__15, ru);
      var rw = caml_call2(Pervasives[16], rv, rs);
      var rx = caml_call2(Pervasives[16], cst__16, rw);
      if (80 === port) var ry = cst__17;
      else {
        var rC = caml_call1(Pervasives[21], port);
        var ry = caml_call2(Pervasives[16], cst__18, rC);
      }
      var rz = caml_call2(Pervasives[16], ry, rx);
      var rA = urlencode(0, host);
      var rB = caml_call2(Pervasives[16], rA, rz);
      return caml_call2(Pervasives[16], cst_http__1, rB);
    case 1:
      var match__0 = param[1];
      var frag__0 = match__0[6];
      var args__0 = match__0[5];
      var path__0 = match__0[3];
      var port__0 = match__0[2];
      var host__0 = match__0[1];
      if (caml_string_notequal(frag__0, cst__21)) {
        var rD = urlencode(0, frag__0);
        var rE = caml_call2(Pervasives[16], cst__22, rD);
      }
      else var rE = cst__29;
      if (args__0) {
        var rF = encode_arguments(args__0);
        var rG = caml_call2(Pervasives[16], cst__23, rF);
      }
      else var rG = cst__28;
      var rH = caml_call2(Pervasives[16], rG, rE);
      var rI = function(x) {return urlencode(0, x);};
      var rJ = caml_call2(List[17], rI, path__0);
      var rK = caml_call2(String[7], cst__24, rJ);
      var rL = caml_call2(Pervasives[16], rK, rH);
      var rM = caml_call2(Pervasives[16], cst__25, rL);
      if (443 === port__0) var rN = cst__26;
      else {
        var rR = caml_call1(Pervasives[21], port__0);
        var rN = caml_call2(Pervasives[16], cst__27, rR);
      }
      var rO = caml_call2(Pervasives[16], rN, rM);
      var rP = urlencode(0, host__0);
      var rQ = caml_call2(Pervasives[16], rP, rO);
      return caml_call2(Pervasives[16], cst_https__1, rQ);
    default:
      var match__1 = param[1];
      var frag__1 = match__1[4];
      var args__1 = match__1[3];
      var path__1 = match__1[1];
      if (caml_string_notequal(frag__1, cst__30)) {
        var rS = urlencode(0, frag__1);
        var rT = caml_call2(Pervasives[16], cst__31, rS);
      }
      else var rT = cst__35;
      if (args__1) {
        var rU = encode_arguments(args__1);
        var rV = caml_call2(Pervasives[16], cst__32, rU);
      }
      else var rV = cst__34;
      var rW = caml_call2(Pervasives[16], rV, rT);
      var rX = function(x) {return urlencode(0, x);};
      var rY = caml_call2(List[17], rX, path__1);
      var rZ = caml_call2(String[7], cst__33, rY);
      var r0 = caml_call2(Pervasives[16], rZ, rW);
      return caml_call2(Pervasives[16], cst_file__1, r0)
    }
}

function p_(x) {
  return caml_call1(caml_get_public_method(x, -448369099, 277), x);
}

var qa = Js_of_ocaml_Dom_html[8];
var qb = function(t42, param) {return t42.location;}(qa, p_);
var qc = caml_call1(Js_of_ocaml_Js[6][2], qb);

if (caml_call1(Js_of_ocaml_Js[6][5], qc)) {
  var qd = function(x) {
    return caml_call1(caml_get_public_method(x, -448369099, 278), x);
  };
  var qe = Js_of_ocaml_Dom_html[8];
  var l = function(t41, param) {return t41.location;}(qe, qd);
}
else {
  var empty = "";
  var qv = [0,0,0,0];
  var qw = function(self, href, protocol, host, hostname, port, pathname, search, hash, origin, reload, replace, assign) {
    if (! qv[1]) {
      var qV = caml_call1(CamlinternalOO[16], shared);
      var qW = caml_call2(CamlinternalOO[3], qV, cst__37);
      var qX = caml_call2(CamlinternalOO[8], qV, pY);
      var qY = qX[1];
      var qZ = qX[2];
      var q0 = qX[3];
      var q1 = qX[4];
      var q2 = qX[5];
      var q3 = qX[6];
      var q4 = qX[7];
      var q5 = qX[8];
      var q6 = qX[9];
      var q7 = qX[10];
      var q8 = qX[11];
      var q9 = qX[12];
      var q_ = function(self_1) {
        var env = self_1[qW + 1];
        return caml_call1(env[2], env[1]);
      };
      var ra = function(self_1) {
        var env = self_1[qW + 1];
        return caml_call1(env[3], env[1]);
      };
      var rb = function(self_1) {
        var env = self_1[qW + 1];
        return caml_call1(env[4], env[1]);
      };
      var rc = function(self_1) {var env = self_1[qW + 1];return env[5];};
      var rd = function(self_1) {var env = self_1[qW + 1];return env[6];};
      var re = function(self_1) {var env = self_1[qW + 1];return env[7];};
      var rf = function(self_1) {var env = self_1[qW + 1];return env[8];};
      var rg = function(self_1) {var env = self_1[qW + 1];return env[9];};
      var rh = function(self_1) {var env = self_1[qW + 1];return env[10];};
      var ri = function(self_1) {var env = self_1[qW + 1];return env[11];};
      var rj = function(self_1) {var env = self_1[qW + 1];return env[12];};
      var rk = [
        0,
        q5,
        function(self_1) {var env = self_1[qW + 1];return env[13];},
        q1,
        rj,
        q7,
        ri,
        q6,
        rh,
        q2,
        rg,
        q3,
        rf,
        qY,
        re,
        q8,
        rd,
        q4,
        rc,
        q0,
        rb,
        qZ,
        ra,
        q9,
        q_
      ];
      caml_call2(CamlinternalOO[11], qV, rk);
      var rl = function(rm) {
        var rn = caml_call2(CamlinternalOO[24], 0, qV);
        rn[qW + 1] = rm;
        return rn;
      };
      caml_call1(CamlinternalOO[17], qV);
      qv[1] = rl;
    }
    return caml_call1(
      qv[1],
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
  var qx = function(param, qU) {return 0;};
  var qy = function(param, qT) {return 0;};
  var qz = function(param) {return 0;};
  var qA = Js_of_ocaml_Js[3];
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
  }(empty, empty, empty, empty, empty, empty, empty, empty, qA, qz, qy, qx, qw
  );
}

function qf(x) {
  return caml_call1(caml_get_public_method(x, -757983821, 279), x);
}

var host = urldecode_js_string_string(
  function(t43, param) {return t43.hostname;}(l, qf)
);

function qg(x) {
  return caml_call1(caml_get_public_method(x, 6510168, 280), x);
}

var protocol = urldecode_js_string_string(
  function(t44, param) {return t44.protocol;}(l, qg)
);
var qh = 0;
var port = function(param) {
  try {
    var qQ = function(x) {
      return caml_call1(caml_get_public_method(x, -899906687, 281), x);
    };
    var qR = [
      0,
      caml_int_of_string(
        caml_js_to_byte_string(function(t45, param) {return t45.port;}(l, qQ))
      )
    ];
    return qR;
  }
  catch(qS) {
    qS = caml_wrap_exception(qS);
    if (qS[1] === Failure) {return 0;}
    throw runtime["caml_wrap_thrown_exception_reraise"](qS);
  }
}(qh
);

function qi(x) {
  return caml_call1(caml_get_public_method(x, -742027664, 282), x);
}

var path_string = urldecode_js_string_string(
  function(t46, param) {return t46.pathname;}(l, qi)
);
var path = path_of_path_string(path_string);
var qj = "?";

function qk(x) {
  return caml_call1(caml_get_public_method(x, 930445673, 283), x);
}

var ql = 0;

function qm(x) {
  return caml_call1(caml_get_public_method(x, -487088280, 284), x);
}

var qn = function(t51, param) {return t51.search;}(l, qm);

if (function(t53, t52, param) {return t53.charAt(t52);}(qn, ql, qk) === qj) {
  var qo = function(x) {
    return caml_call1(caml_get_public_method(x, -303194578, 285), x);
  };
  var qp = 1;
  var qq = function(x) {
    return caml_call1(caml_get_public_method(x, -487088280, 286), x);
  };
  var qr = function(t48, param) {return t48.search;}(l, qq);
  var qs = function(t50, t49, param) {return t50.slice(t49);}(qr, qp, qo);
}
else {
  var qu = function(x) {
    return caml_call1(caml_get_public_method(x, -487088280, 293), x);
  };
  var qs = function(t47, param) {return t47.search;}(l, qu);
}

var arguments__0 = decode_arguments_js_string(qs);

function get_fragment(param) {
  function qG(res) {
    var res__0 = caml_call1(Js_of_ocaml_Js[21], res);
    return runtime["caml_js_to_string"](res__0[1]);
  }
  function qH(param) {return cst__36;}
  function qI(x) {
    return caml_call1(caml_get_public_method(x, -16084858, 287), x);
  }
  var qJ = 0;
  var qK = "#(.*)";
  var qL = Js_of_ocaml_Js[10];
  var qM = function(t56, t55, param) {return new t56(t55);}(qL, qK, qJ);
  function qN(x) {
    return caml_call1(caml_get_public_method(x, -988476949, 288), x);
  }
  var qO = function(t54, param) {return t54.href;}(l, qN);
  var qP = function(t58, t57, param) {return t58.match(t57);}(qO, qM, qI);
  return caml_call3(Js_of_ocaml_Js[5][7], qP, qH, qG);
}

function set_fragment(s) {
  function qE(x) {
    return caml_call1(caml_get_public_method(x, -989319218, 289), x);
  }
  var qF = caml_jsbytes_of_string(urlencode(0, s));
  return function(t60, t59, param) {return t60.hash = t59;}(l, qF, qE);
}

function get(param) {
  function qD(x) {
    return caml_call1(caml_get_public_method(x, -988476949, 290), x);
  }
  return url_of_js_string(function(t61, param) {return t61.href;}(l, qD));
}

function set(u) {
  function qB(x) {
    return caml_call1(caml_get_public_method(x, -988476949, 291), x);
  }
  var qC = caml_jsbytes_of_string(string_of_url(u));
  return function(t63, t62, param) {return t63.href = t62;}(l, qC, qB);
}

function qt(x) {
  return caml_call1(caml_get_public_method(x, -988476949, 292), x);
}

var as_string = urldecode_js_string_string(
  function(t64, param) {return t64.href;}(l, qt)
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