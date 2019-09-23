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
var string = runtime["caml_new_string"];
var caml_string_notequal = runtime["caml_string_notequal"];
var caml_wrap_exception = runtime["caml_wrap_exception"];

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
var Js_of_ocaml_Js = global_data["Js_of_ocaml__Js"];
var Failure = global_data["Failure"];
var CamlinternalOO = global_data["CamlinternalOO"];
var Pervasives = global_data["Pervasives"];
var List = global_data["List_"];
var String = global_data["String_"];
var Not_found = global_data["Not_found"];
var Js_of_ocaml_Regexp = global_data["Js_of_ocaml__Regexp"];
var Js_of_ocaml_Dom_html = global_data["Js_of_ocaml__Dom_html"];
var f = [0,string(""),0];
var a = [
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
  function cn(x) {return call1(caml_get_public_method(x, 24046298, 234), x);}
  var co = call2(String[1], 1, c).toString();
  var cp = function(t1, t0, param) {return t1.split(t0);}(s, co, cn);
  return call1(Js_of_ocaml_Js[20], cp);
}

function split_2(c, s) {
  function cf(x) {
    return call1(caml_get_public_method(x, -524334903, 235), x);
  }
  var cg = call2(String[1], 1, c).toString();
  var index = function(t8, t7, param) {return t8.indexOf(t7);}(s, cg, cf);
  if (0 <= index) {
    var ch = function(x) {
      return call1(caml_get_public_method(x, -303194578, 236), x);
    };
    var ci = index + 1 | 0;
    var cj = function(t6, t5, param) {return t6.slice(t5);}(s, ci, ch);
    var ck = function(x) {
      return call1(caml_get_public_method(x, -20462510, 237), x);
    };
    var cl = 0;
    var cm = [
      0,
      function(t4, t2, t3, param) {return t4.slice(t2, t3);}(s, cl, index, ck),
      cj
    ];
    return call1(Js_of_ocaml_Js[4], cm);
  }
  return Js_of_ocaml_Js[3];
}

var Local_exn = [248,cst_Js_of_ocaml_Url_Local_exn,caml_fresh_oo_id(0)];

function interrupt(param) {
  throw runtime["caml_wrap_thrown_exception"](Local_exn);
}

var plus_re = call1(Js_of_ocaml_Regexp[5], cst);

function escape_plus(s) {
  return call3(Js_of_ocaml_Regexp[12], plus_re, s, cst_2B);
}

function unescape_plus(s) {
  return call3(Js_of_ocaml_Regexp[12], plus_re, s, cst__0);
}

var b = 0;
var c = "g";
var d = "\\+";
var e = Js_of_ocaml_Js[11];
var plus_re_js_string = function(t11, t9, t10, param) {return new t11(t9, t10);
}(e, d, c, b
);

function unescape_plus_js_string(s) {
  function cb(x) {return call1(caml_get_public_method(x, 180472028, 238), x);}
  var cc = 0;
  (function(t16, t15, param) {t16.lastIndex = t15;return 0;}(plus_re_js_string, cc, cb
   ));
  function cd(x) {return call1(caml_get_public_method(x, 724060212, 239), x);}
  var ce = " ";
  return function(t14, t12, t13, param) {return t14.replace(t12, t13);}(s, plus_re_js_string, ce, cd
  );
}

function urldecode_js_string_string(s) {
  var ca = unescape_plus_js_string(s);
  return caml_js_to_byte_string(call1(Js_of_ocaml_Js[42], ca));
}

function urldecode(s) {
  var b_ = caml_jsbytes_of_string(unescape_plus(s));
  return caml_js_to_byte_string(call1(Js_of_ocaml_Js[42], b_));
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
  function b9(x) {return call1(caml_get_public_method(x, 946097238, 240), x);}
  var match = caml_js_to_byte_string(
    function(t17, param) {return t17.toLowerCase();}(prot_string, b9)
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
    try {var b7 = call3(String[18], s, i, 47);var j = b7;}
    catch(b8) {
      b8 = caml_wrap_exception(b8);
      if (b8 !== Not_found) {
        throw runtime["caml_wrap_thrown_exception_reraise"](b8);
      }
      var j = l;
    }
    var word = call3(String[4], s, i, j - i | 0);
    return l <= j ? [0,word,0] : [0,word,aux(j + 1 | 0)];
  }
  var a = aux(0);
  if (a) {
    if (! caml_string_notequal(a[1], cst__1)) {
      var b6 = a[2];
      if (! b6) {return 0;}
      if (! caml_string_notequal(b6[1], cst__2)) {if (! b6[2]) {return f;}}
    }
  }
  return a;
}

function encode_arguments(l) {
  function b1(param) {
    var v = param[2];
    var n = param[1];
    var b3 = urlencode(0, v);
    var b4 = call2(Pervasives[16], cst__3, b3);
    var b5 = urlencode(0, n);
    return call2(Pervasives[16], b5, b4);
  }
  var b2 = call2(List[17], b1, l);
  return call2(String[7], cst__4, b2);
}

function decode_arguments_js_string(s) {
  var arr = split(38, s);
  function bS(x) {return call1(caml_get_public_method(x, 520590566, 241), x);}
  var len = function(t18, param) {return t18.length;}(arr, bS);
  function name_value_split(s) {return split_2(61, s);}
  function aux(acc, idx) {
    var idx__0 = idx;
    for (; ; ) {
      if (0 <= idx__0) {
        try {
          var bT = idx__0 + -1 | 0;
          var bU = function(s) {
            function bY(param) {
              var y = param[2];
              var x = param[1];
              var b0 = urldecode_js_string_string(y);
              return [0,urldecode_js_string_string(x),b0];
            }
            var bZ = name_value_split(s);
            return call3(Js_of_ocaml_Js[6][7], bZ, interrupt, bY);
          };
          var bV = call2(Js_of_ocaml_Js[16], arr, idx__0);
          var bW = aux(
            [0,call3(Js_of_ocaml_Js[6][7], bV, interrupt, bU),acc],
            bT
          );
          return bW;
        }
        catch(bX) {
          bX = caml_wrap_exception(bX);
          if (bX === Local_exn) {
            var idx__1 = idx__0 + -1 | 0;
            var idx__0 = idx__1;
            continue;
          }
          throw runtime["caml_wrap_thrown_exception_reraise"](bX);
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

var g = 0;
var h = caml_jsbytes_of_string(
  cst_Hh_Tt_Tt_Pp_Ss_0_9a_zA_Z_0_9a_zA_Z_0_9A_Fa_f_0_9
);
var i = Js_of_ocaml_Js[10];
var url_re = function(t20, t19, param) {return new t20(t19);}(i, h, g);
var j = 0;
var k = caml_jsbytes_of_string(cst_Ff_Ii_Ll_Ee);
var l = Js_of_ocaml_Js[10];
var file_re = function(t22, t21, param) {return new t22(t21);}(l, k, j);

function url_of_js_string(s) {
  function bo(handle) {
    var res = call1(Js_of_ocaml_Js[21], handle);
    var bD = call2(Js_of_ocaml_Js[16], res, 1);
    var ssl = is_secure(call2(Js_of_ocaml_Js[6][8], bD, interrupt));
    function port_of_string(s) {
      return caml_string_notequal(s, cst__5) ?
        caml_int_of_string(s) :
        ssl ? 443 : 80;
    }
    function bE(param) {return caml_jsbytes_of_string(cst__6);}
    var bF = call2(Js_of_ocaml_Js[16], res, 6);
    var path_str = urldecode_js_string_string(
      call2(Js_of_ocaml_Js[6][8], bF, bE)
    );
    function bG(param) {return caml_jsbytes_of_string(cst__7);}
    var bH = call2(Js_of_ocaml_Js[16], res, 10);
    var bI = urldecode_js_string_string(call2(Js_of_ocaml_Js[6][8], bH, bG));
    function bJ(param) {return caml_jsbytes_of_string(cst__8);}
    var bK = call2(Js_of_ocaml_Js[16], res, 8);
    var bL = decode_arguments_js_string(call2(Js_of_ocaml_Js[6][8], bK, bJ));
    var bM = path_of_path_string(path_str);
    function bN(param) {return caml_jsbytes_of_string(cst__9);}
    var bO = call2(Js_of_ocaml_Js[16], res, 4);
    var bP = port_of_string(
      caml_js_to_byte_string(call2(Js_of_ocaml_Js[6][8], bO, bN))
    );
    var bQ = call2(Js_of_ocaml_Js[16], res, 2);
    var url = [
      0,
      urldecode_js_string_string(call2(Js_of_ocaml_Js[6][8], bQ, interrupt)),
      bP,
      bM,
      path_str,
      bL,
      bI
    ];
    var bR = ssl ? [1,url] : [0,url];
    return [0,bR];
  }
  function bp(param) {
    function bs(handle) {
      var res = call1(Js_of_ocaml_Js[21], handle);
      var bw = call2(Js_of_ocaml_Js[16], res, 2);
      var path_str = urldecode_js_string_string(
        call2(Js_of_ocaml_Js[6][8], bw, interrupt)
      );
      function bx(param) {return caml_jsbytes_of_string(cst__10);}
      var by = call2(Js_of_ocaml_Js[16], res, 6);
      var bz = caml_js_to_byte_string(call2(Js_of_ocaml_Js[6][8], by, bx));
      function bA(param) {return caml_jsbytes_of_string(cst__11);}
      var bB = call2(Js_of_ocaml_Js[16], res, 4);
      var bC = decode_arguments_js_string(call2(Js_of_ocaml_Js[6][8], bB, bA));
      return [0,[2,[0,path_of_path_string(path_str),path_str,bC,bz]]];
    }
    function bt(param) {return 0;}
    function bu(x) {
      return call1(caml_get_public_method(x, -1021447279, 242), x);
    }
    var bv = function(t26, t25, param) {return t26.exec(t25);}(file_re, s, bu);
    return call3(Js_of_ocaml_Js[5][7], bv, bt, bs);
  }
  function bq(x) {
    return call1(caml_get_public_method(x, -1021447279, 243), x);
  }
  var br = function(t24, t23, param) {return t24.exec(t23);}(url_re, s, bq);
  return call3(Js_of_ocaml_Js[5][7], br, bp, bo);
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
        var aM = urlencode(0, frag);
        var aN = call2(Pervasives[16], cst__13, aM);
      }
      else var aN = cst__20;
      if (args) {
        var aO = encode_arguments(args);
        var aP = call2(Pervasives[16], cst__14, aO);
      }
      else var aP = cst__19;
      var aQ = call2(Pervasives[16], aP, aN);
      var aR = function(x) {return urlencode(0, x);};
      var aS = call2(List[17], aR, path);
      var aT = call2(String[7], cst__15, aS);
      var aU = call2(Pervasives[16], aT, aQ);
      var aV = call2(Pervasives[16], cst__16, aU);
      if (80 === port) var aW = cst__17;
      else {
        var a0 = call1(Pervasives[21], port);
        var aW = call2(Pervasives[16], cst__18, a0);
      }
      var aX = call2(Pervasives[16], aW, aV);
      var aY = urlencode(0, host);
      var aZ = call2(Pervasives[16], aY, aX);
      return call2(Pervasives[16], cst_http__1, aZ);
    case 1:
      var match__0 = param[1];
      var frag__0 = match__0[6];
      var args__0 = match__0[5];
      var path__0 = match__0[3];
      var port__0 = match__0[2];
      var host__0 = match__0[1];
      if (caml_string_notequal(frag__0, cst__21)) {
        var a1 = urlencode(0, frag__0);
        var a2 = call2(Pervasives[16], cst__22, a1);
      }
      else var a2 = cst__29;
      if (args__0) {
        var a3 = encode_arguments(args__0);
        var a4 = call2(Pervasives[16], cst__23, a3);
      }
      else var a4 = cst__28;
      var a5 = call2(Pervasives[16], a4, a2);
      var a6 = function(x) {return urlencode(0, x);};
      var a7 = call2(List[17], a6, path__0);
      var a8 = call2(String[7], cst__24, a7);
      var a9 = call2(Pervasives[16], a8, a5);
      var a_ = call2(Pervasives[16], cst__25, a9);
      if (443 === port__0) var ba = cst__26;
      else {
        var be = call1(Pervasives[21], port__0);
        var ba = call2(Pervasives[16], cst__27, be);
      }
      var bb = call2(Pervasives[16], ba, a_);
      var bc = urlencode(0, host__0);
      var bd = call2(Pervasives[16], bc, bb);
      return call2(Pervasives[16], cst_https__1, bd);
    default:
      var match__1 = param[1];
      var frag__1 = match__1[4];
      var args__1 = match__1[3];
      var path__1 = match__1[1];
      if (caml_string_notequal(frag__1, cst__30)) {
        var bf = urlencode(0, frag__1);
        var bg = call2(Pervasives[16], cst__31, bf);
      }
      else var bg = cst__35;
      if (args__1) {
        var bh = encode_arguments(args__1);
        var bi = call2(Pervasives[16], cst__32, bh);
      }
      else var bi = cst__34;
      var bj = call2(Pervasives[16], bi, bg);
      var bk = function(x) {return urlencode(0, x);};
      var bl = call2(List[17], bk, path__1);
      var bm = call2(String[7], cst__33, bl);
      var bn = call2(Pervasives[16], bm, bj);
      return call2(Pervasives[16], cst_file__1, bn)
    }
}

function m(x) {return call1(caml_get_public_method(x, -448369099, 244), x);}

var n = Js_of_ocaml_Dom_html[8];
var o = function(t42, param) {return t42.location;}(n, m);
var p = call1(Js_of_ocaml_Js[6][2], o);

if (call1(Js_of_ocaml_Js[6][5], p)) {
  var q = function(x) {
    return call1(caml_get_public_method(x, -448369099, 245), x);
  };
  var r = Js_of_ocaml_Dom_html[8];
  var l__0 = function(t41, param) {return t41.location;}(r, q);
}
else {
  var empty = "";
  var I = [0,0,0,0];
  var J = function(self, href, protocol, host, hostname, port, pathname, search, hash, origin, reload, replace, assign) {
    if (! I[1]) {
      var ai = call1(CamlinternalOO[16], shared);
      var aj = call2(CamlinternalOO[3], ai, cst__37);
      var ak = call2(CamlinternalOO[8], ai, a);
      var al = ak[1];
      var am = ak[2];
      var an = ak[3];
      var ao = ak[4];
      var ap = ak[5];
      var aq = ak[6];
      var ar = ak[7];
      var as = ak[8];
      var at = ak[9];
      var au = ak[10];
      var av = ak[11];
      var aw = ak[12];
      var ax = function(self_1) {
        var env = self_1[aj + 1];
        return call1(env[2], env[1]);
      };
      var ay = function(self_1) {
        var env = self_1[aj + 1];
        return call1(env[3], env[1]);
      };
      var az = function(self_1) {
        var env = self_1[aj + 1];
        return call1(env[4], env[1]);
      };
      var aA = function(self_1) {var env = self_1[aj + 1];return env[5];};
      var aB = function(self_1) {var env = self_1[aj + 1];return env[6];};
      var aC = function(self_1) {var env = self_1[aj + 1];return env[7];};
      var aD = function(self_1) {var env = self_1[aj + 1];return env[8];};
      var aE = function(self_1) {var env = self_1[aj + 1];return env[9];};
      var aF = function(self_1) {var env = self_1[aj + 1];return env[10];};
      var aG = function(self_1) {var env = self_1[aj + 1];return env[11];};
      var aH = function(self_1) {var env = self_1[aj + 1];return env[12];};
      var aI = [
        0,
        as,
        function(self_1) {var env = self_1[aj + 1];return env[13];},
        ao,
        aH,
        au,
        aG,
        at,
        aF,
        ap,
        aE,
        aq,
        aD,
        al,
        aC,
        av,
        aB,
        ar,
        aA,
        an,
        az,
        am,
        ay,
        aw,
        ax
      ];
      call2(CamlinternalOO[11], ai, aI);
      var aJ = function(aK) {
        var aL = call2(CamlinternalOO[24], 0, ai);
        aL[aj + 1] = aK;
        return aL;
      };
      call1(CamlinternalOO[17], ai);
      I[1] = aJ;
    }
    return call1(
      I[1],
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
  var K = function(param, ah) {return 0;};
  var L = function(param, ag) {return 0;};
  var M = function(param) {return 0;};
  var N = Js_of_ocaml_Js[3];
  var l__0 = function(t29, t30, t31, t32, t33, t34, t35, t36, t37, t38, t39, t40, param) {
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
  }(empty, empty, empty, empty, empty, empty, empty, empty, N, M, L, K, J
  );
}

function s(x) {return call1(caml_get_public_method(x, -757983821, 246), x);}

var host = urldecode_js_string_string(
  function(t43, param) {return t43.hostname;}(l__0, s)
);

function t(x) {return call1(caml_get_public_method(x, 6510168, 247), x);}

var protocol = urldecode_js_string_string(
  function(t44, param) {return t44.protocol;}(l__0, t)
);
var u = 0;
var port = function(param) {
  try {
    var ad = function(x) {
      return call1(caml_get_public_method(x, -899906687, 248), x);
    };
    var ae = [
      0,
      caml_int_of_string(
        caml_js_to_byte_string(
          function(t45, param) {return t45.port;}(l__0, ad)
        )
      )
    ];
    return ae;
  }
  catch(af) {
    af = caml_wrap_exception(af);
    if (af[1] === Failure) {return 0;}
    throw runtime["caml_wrap_thrown_exception_reraise"](af);
  }
}(u
);

function v(x) {return call1(caml_get_public_method(x, -742027664, 249), x);}

var path_string = urldecode_js_string_string(
  function(t46, param) {return t46.pathname;}(l__0, v)
);
var path = path_of_path_string(path_string);
var w = "?";

function x(x) {return call1(caml_get_public_method(x, 930445673, 250), x);}

var y = 0;

function z(x) {return call1(caml_get_public_method(x, -487088280, 251), x);}

var A = function(t51, param) {return t51.search;}(l__0, z);

if (function(t53, t52, param) {return t53.charAt(t52);}(A, y, x) === w) {
  var B = function(x) {
    return call1(caml_get_public_method(x, -303194578, 252), x);
  };
  var C = 1;
  var D = function(x) {
    return call1(caml_get_public_method(x, -487088280, 253), x);
  };
  var E = function(t48, param) {return t48.search;}(l__0, D);
  var F = function(t50, t49, param) {return t50.slice(t49);}(E, C, B);
}
else {
  var H = function(x) {
    return call1(caml_get_public_method(x, -487088280, 260), x);
  };
  var F = function(t47, param) {return t47.search;}(l__0, H);
}

var arguments__0 = decode_arguments_js_string(F);

function get_fragment(param) {
  function T(res) {
    var res__0 = call1(Js_of_ocaml_Js[21], res);
    return runtime["caml_js_to_string"](res__0[1]);
  }
  function U(param) {return cst__36;}
  function V(x) {return call1(caml_get_public_method(x, -16084858, 254), x);}
  var W = 0;
  var X = "#(.*)";
  var Y = Js_of_ocaml_Js[10];
  var Z = function(t56, t55, param) {return new t56(t55);}(Y, X, W);
  function aa(x) {
    return call1(caml_get_public_method(x, -988476949, 255), x);
  }
  var ab = function(t54, param) {return t54.href;}(l__0, aa);
  var ac = function(t58, t57, param) {return t58.match(t57);}(ab, Z, V);
  return call3(Js_of_ocaml_Js[5][7], ac, U, T);
}

function set_fragment(s) {
  function R(x) {return call1(caml_get_public_method(x, -989319218, 256), x);}
  var S = caml_jsbytes_of_string(urlencode(0, s));
  return function(t60, t59, param) {t60.hash = t59;return 0;}(l__0, S, R);
}

function get(param) {
  function Q(x) {return call1(caml_get_public_method(x, -988476949, 257), x);}
  return url_of_js_string(function(t61, param) {return t61.href;}(l__0, Q));
}

function set(u) {
  function O(x) {return call1(caml_get_public_method(x, -988476949, 258), x);}
  var P = caml_jsbytes_of_string(string_of_url(u));
  return function(t63, t62, param) {t63.href = t62;return 0;}(l__0, P, O);
}

function G(x) {return call1(caml_get_public_method(x, -988476949, 259), x);}

var as_string = urldecode_js_string_string(
  function(t64, param) {return t64.href;}(l__0, G)
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
