/**
 * @flow strict
 * CamlinternalFormat
 */

// @ts-check


"use strict";

var runtime = require("../runtime/runtime.js");
var caml_blit_string = runtime["caml_blit_string"];
var caml_bytes_set = runtime["caml_bytes_set"];
var caml_create_bytes = runtime["caml_create_bytes"];
var caml_format_int = runtime["caml_format_int"];
var caml_ml_string_length = runtime["caml_ml_string_length"];
var string = runtime["caml_new_string"];
var caml_notequal = runtime["caml_notequal"];
var caml_string_get = runtime["caml_string_get"];
var caml_string_notequal = runtime["caml_string_notequal"];
var caml_string_unsafe_get = runtime["caml_string_unsafe_get"];
var caml_trampoline = runtime["caml_trampoline"];
var caml_trampoline_return = runtime["caml_trampoline_return"];
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

function call4(f, a0, a1, a2, a3) {
  return f.length === 4 ?
    f(a0, a1, a2, a3) :
    runtime["caml_call_gen"](f, [a0,a1,a2,a3]);
}

function call5(f, a0, a1, a2, a3, a4) {
  return f.length === 5 ?
    f(a0, a1, a2, a3, a4) :
    runtime["caml_call_gen"](f, [a0,a1,a2,a3,a4]);
}

var cst_c = string("%c");
var cst_s = string("%s");
var cst_i = string("%i");
var cst_li = string("%li");
var cst_ni = string("%ni");
var cst_Li = string("%Li");
var cst_f = string("%f");
var cst_B = string("%B");
var cst__9 = string("%{");
var cst__10 = string("%}");
var cst__11 = string("%(");
var cst__12 = string("%)");
var cst_a = string("%a");
var cst_t = string("%t");
var cst__13 = string("%?");
var cst_r = string("%r");
var cst_r__0 = string("%_r");
var cst_u__0 = string("%u");
var cst_Printf_bad_conversion = string("Printf: bad conversion %[");
var cst_Printf_bad_conversion__0 = string("Printf: bad conversion %_");
var cst__17 = string("@{");
var cst__18 = string("@[");
var cst__19 = string("@{");
var cst__20 = string("@[");
var cst__21 = string("@{");
var cst__22 = string("@[");
var cst_0 = string("0");
var cst_padding = string("padding");
var cst_precision = string("precision");
var cst__27 = string("'*'");
var cst__25 = string("'-'");
var cst_0__2 = string("'0'");
var cst__26 = string("'*'");
var cst_0__0 = string("0");
var cst_0__1 = string("0");
var cst_precision__0 = string("precision");
var cst_precision__1 = string("precision");
var cst__28 = string("'+'");
var cst__29 = string("'#'");
var cst__30 = string("' '");
var cst_padding__0 = string("`padding'");
var cst_precision__2 = string("`precision'");
var cst__31 = string("'+'");
var cst__32 = string("'_'");
var sub_format = [0,0,string("")];
var formatting_lit = [0,string("@;"),1,0];
var cst_digit = string("digit");
var cst_character = string("character ')'");
var cst_character__0 = string("character '}'");
var cst__36 = string("'#'");
var cst__35 = string("'+'");
var cst__34 = string("'+'");
var cst__33 = string("' '");
var cst__39 = string("'+'");
var cst__38 = string("'+'");
var cst__37 = string("' '");
var cst_non_zero_widths_are_unsupported_for_c_conversions = string(
  "non-zero widths are unsupported for %c conversions"
);
var cst_unexpected_end_of_format = string("unexpected end of format");
var cst__23 = string("");
var cst__24 = string("");
var cst_b = string("b");
var cst_h = string("h");
var cst_hov = string("hov");
var cst_hv = string("hv");
var cst_v = string("v");
var cst_nan = string("nan");
var cst__16 = string(".");
var cst_neg_infinity = string("neg_infinity");
var cst_infinity = string("infinity");
var cst_12g = string("%.12g");
var cst_nd__0 = string("%+nd");
var cst_nd__1 = string("% nd");
var cst_ni__1 = string("%+ni");
var cst_ni__2 = string("% ni");
var cst_nx = string("%nx");
var cst_nx__0 = string("%#nx");
var cst_nX = string("%nX");
var cst_nX__0 = string("%#nX");
var cst_no = string("%no");
var cst_no__0 = string("%#no");
var cst_nd = string("%nd");
var cst_ni__0 = string("%ni");
var cst_nu = string("%nu");
var cst_ld__0 = string("%+ld");
var cst_ld__1 = string("% ld");
var cst_li__1 = string("%+li");
var cst_li__2 = string("% li");
var cst_lx = string("%lx");
var cst_lx__0 = string("%#lx");
var cst_lX = string("%lX");
var cst_lX__0 = string("%#lX");
var cst_lo = string("%lo");
var cst_lo__0 = string("%#lo");
var cst_ld = string("%ld");
var cst_li__0 = string("%li");
var cst_lu = string("%lu");
var cst_Ld__0 = string("%+Ld");
var cst_Ld__1 = string("% Ld");
var cst_Li__1 = string("%+Li");
var cst_Li__2 = string("% Li");
var cst_Lx = string("%Lx");
var cst_Lx__0 = string("%#Lx");
var cst_LX = string("%LX");
var cst_LX__0 = string("%#LX");
var cst_Lo = string("%Lo");
var cst_Lo__0 = string("%#Lo");
var cst_Ld = string("%Ld");
var cst_Li__0 = string("%Li");
var cst_Lu = string("%Lu");
var cst_d__0 = string("%+d");
var cst_d__1 = string("% d");
var cst_i__1 = string("%+i");
var cst_i__2 = string("% i");
var cst_x = string("%x");
var cst_x__0 = string("%#x");
var cst_X = string("%X");
var cst_X__0 = string("%#X");
var cst_o = string("%o");
var cst_o__0 = string("%#o");
var cst_d = string("%d");
var cst_i__0 = string("%i");
var cst_u = string("%u");
var cst__14 = string("%!");
var cst__15 = string("@{");
var cst_0c = string("0c");
var cst__8 = string("%%");
var cst__0 = string("@]");
var cst__1 = string("@}");
var cst__2 = string("@?");
var cst__3 = string("@\n");
var cst__4 = string("@.");
var cst__5 = string("@@");
var cst__6 = string("@%");
var cst__7 = string("@");
var cst = string(".*");
var cst_CamlinternalFormat_Type_mismatch = string(
  "CamlinternalFormat.Type_mismatch"
);
var Assert_failure = require("../runtime/Assert_failure.js");
var CamlinternalFormatBasics = require("./CamlinternalFormatBasics.js");
var Stdlib = require("./Stdlib.js");
var Stdlib_buffer = require("./Stdlib__buffer.js");
var Stdlib_string = require("./Stdlib__string.js");
var Stdlib_sys = require("./Stdlib__sys.js");
var Stdlib_char = require("./Stdlib__char.js");
var Stdlib_bytes = require("./Stdlib__bytes.js");
var Stdlib_int = require("./Stdlib__int.js");
var a_ = [0,string("camlinternalFormat.ml"),847,23];
var l_ = [0,string("camlinternalFormat.ml"),811,21];
var d_ = [0,string("camlinternalFormat.ml"),812,21];
var m_ = [0,string("camlinternalFormat.ml"),815,21];
var e_ = [0,string("camlinternalFormat.ml"),816,21];
var n_ = [0,string("camlinternalFormat.ml"),819,19];
var f_ = [0,string("camlinternalFormat.ml"),820,19];
var o_ = [0,string("camlinternalFormat.ml"),823,22];
var g_ = [0,string("camlinternalFormat.ml"),824,22];
var p_ = [0,string("camlinternalFormat.ml"),828,30];
var h_ = [0,string("camlinternalFormat.ml"),829,30];
var j_ = [0,string("camlinternalFormat.ml"),833,26];
var b_ = [0,string("camlinternalFormat.ml"),834,26];
var k_ = [0,string("camlinternalFormat.ml"),843,28];
var c_ = [0,string("camlinternalFormat.ml"),844,28];
var i_ = [0,string("camlinternalFormat.ml"),848,23];
var q_ = [0,string("camlinternalFormat.ml"),1556,4];
var r_ = [0,string("camlinternalFormat.ml"),1624,39];
var s_ = [0,string("camlinternalFormat.ml"),1647,31];
var t_ = [0,string("camlinternalFormat.ml"),1648,31];
var u_ = [0,string("camlinternalFormat.ml"),1828,8];
var Y_ = [
  0,
  [
    11,
    string("bad input: format type mismatch between "),
    [3,0,[11,string(" and "),[3,0,0]]]
  ],
  string("bad input: format type mismatch between %S and %S")
];
var X_ = [
  0,
  [
    11,
    string("bad input: format type mismatch between "),
    [3,0,[11,string(" and "),[3,0,0]]]
  ],
  string("bad input: format type mismatch between %S and %S")
];
var A_ = [
  0,
  [
    11,
    string("invalid format "),
    [
      3,
      0,
      [
        11,
        string(": at character number "),
        [4,0,0,0,[11,string(", duplicate flag "),[1,0]]]
      ]
    ]
  ],
  string("invalid format %S: at character number %d, duplicate flag %C")
];
var B_ = [0,1,0];
var C_ = [0,0];
var E_ = [1,0];
var D_ = [1,1];
var G_ = [1,1];
var F_ = [1,1];
var K_ = [
  0,
  [
    11,
    string("invalid format "),
    [
      3,
      0,
      [
        11,
        string(": at character number "),
        [
          4,
          0,
          0,
          0,
          [
            11,
            string(", flag "),
            [
              1,
              [
                11,
                string(" is only allowed after the '"),
                [12,37,[11,string("', before padding and precision"),0]]
              ]
            ]
          ]
        ]
      ]
    ]
  ],
  string(
    "invalid format %S: at character number %d, flag %C is only allowed after the '%%', before padding and precision"
  )
];
var H_ = [
  0,
  [
    11,
    string("invalid format "),
    [
      3,
      0,
      [
        11,
        string(": at character number "),
        [4,0,0,0,[11,string(', invalid conversion "'),[12,37,[0,[12,34,0]]]]]
      ]
    ]
  ],
  string(
    'invalid format %S: at character number %d, invalid conversion "%%%c"'
  )
];
var I_ = [0,0];
var J_ = [0,0];
var L_ = [0,[12,64,0]];
var M_ = [0,string("@ "),1,0];
var N_ = [0,string("@,"),0,0];
var O_ = [2,60];
var P_ = [
  0,
  [
    11,
    string("invalid format "),
    [
      3,
      0,
      [
        11,
        string(": '"),
        [
          12,
          37,
          [
            11,
            string("' alone is not accepted in character sets, use "),
            [
              12,
              37,
              [12,37,[11,string(" instead at position "),[4,0,0,0,[12,46,0]]]]
            ]
          ]
        ]
      ]
    ]
  ],
  string(
    "invalid format %S: '%%' alone is not accepted in character sets, use %%%% instead at position %d."
  )
];
var Q_ = [
  0,
  [
    11,
    string("invalid format "),
    [
      3,
      0,
      [
        11,
        string(": integer "),
        [4,0,0,0,[11,string(" is greater than the limit "),[4,0,0,0,0]]]
      ]
    ]
  ],
  string("invalid format %S: integer %d is greater than the limit %d")
];
var R_ = [0,string("camlinternalFormat.ml"),2843,11];
var S_ = [
  0,
  [
    11,
    string("invalid format "),
    [
      3,
      0,
      [
        11,
        string(': unclosed sub-format, expected "'),
        [12,37,[0,[11,string('" at character number '),[4,0,0,0,0]]]]
      ]
    ]
  ],
  string(
    'invalid format %S: unclosed sub-format, expected "%%%c" at character number %d'
  )
];
var T_ = [0,string("camlinternalFormat.ml"),2905,34];
var U_ = [0,string("camlinternalFormat.ml"),2941,28];
var V_ = [0,string("camlinternalFormat.ml"),2975,25];
var W_ = [
  0,
  [
    11,
    string("invalid format "),
    [
      3,
      0,
      [
        11,
        string(": at character number "),
        [
          4,
          0,
          0,
          0,
          [
            11,
            string(", "),
            [
              2,
              0,
              [
                11,
                string(" is incompatible with '"),
                [0,[11,string("' in sub-format "),[3,0,0]]]
              ]
            ]
          ]
        ]
      ]
    ]
  ],
  string(
    "invalid format %S: at character number %d, %s is incompatible with '%c' in sub-format %S"
  )
];
var z_ = [
  0,
  [
    11,
    string("invalid format "),
    [
      3,
      0,
      [
        11,
        string(": at character number "),
        [4,0,0,0,[11,string(", "),[2,0,[11,string(" expected, read "),[1,0]]]]
        ]
      ]
    ]
  ],
  string("invalid format %S: at character number %d, %s expected, read %C")
];
var y_ = [
  0,
  [
    11,
    string("invalid format "),
    [
      3,
      0,
      [
        11,
        string(": at character number "),
        [4,0,0,0,[11,string(", '"),[0,[11,string("' without "),[2,0,0]]]]]
      ]
    ]
  ],
  string("invalid format %S: at character number %d, '%c' without %s")
];
var x_ = [
  0,
  [
    11,
    string("invalid format "),
    [
      3,
      0,
      [11,string(": at character number "),[4,0,0,0,[11,string(", "),[2,0,0]]]
      ]
    ]
  ],
  string("invalid format %S: at character number %d, %s")
];
var w_ = [
  0,
  [11,string("invalid box description "),[3,0,0]],
  string("invalid box description %S")
];
var v_ = [0,0,4];

function create_char_set(param) {return call2(Stdlib_bytes[1], 32, 0);}

function add_in_char_set(char_set, c) {
  var str_ind = c >>> 3 | 0;
  var mask = 1 << (c & 7);
  var eV_ = runtime["caml_bytes_get"](char_set, str_ind) | mask;
  return caml_bytes_set(char_set, str_ind, call1(Stdlib[29], eV_));
}

function freeze_char_set(char_set) {return call1(Stdlib_bytes[6], char_set);}

function rev_char_set(char_set) {
  var char_set__0 = create_char_set(0);
  var i = 0;
  for (; ; ) {
    var eT_ = caml_string_get(char_set, i) ^ 255;
    caml_bytes_set(char_set__0, i, call1(Stdlib[29], eT_));
    var eU_ = i + 1 | 0;
    if (31 !== i) {var i = eU_;continue;}
    return call1(Stdlib_bytes[42], char_set__0);
  }
}

function is_in_char_set(char_set, c) {
  var str_ind = c >>> 3 | 0;
  var mask = 1 << (c & 7);
  return 0 !== (caml_string_get(char_set, str_ind) & mask) ? 1 : 0;
}

function pad_of_pad_opt(pad_opt) {
  if (pad_opt) {var width = pad_opt[1];return [0,1,width];}
  return 0;
}

function prec_of_prec_opt(prec_opt) {
  if (prec_opt) {var ndec = prec_opt[1];return [0,ndec];}
  return 0;
}

function param_format_of_ignored_format(ign, fmt) {
  if (typeof ign === "number") switch (ign) {
    case 0:
      return [0,[0,fmt]];
    case 1:
      return [0,[1,fmt]];
    case 2:
      return [0,[19,fmt]];
    default:
      return [0,[22,fmt]]
    }
  else switch (ign[0]) {
    case 0:
      var pad_opt = ign[1];
      return [0,[2,pad_of_pad_opt(pad_opt),fmt]];
    case 1:
      var pad_opt__0 = ign[1];
      return [0,[3,pad_of_pad_opt(pad_opt__0),fmt]];
    case 2:
      var pad_opt__1 = ign[2];
      var iconv = ign[1];
      return [0,[4,iconv,pad_of_pad_opt(pad_opt__1),0,fmt]];
    case 3:
      var pad_opt__2 = ign[2];
      var iconv__0 = ign[1];
      return [0,[5,iconv__0,pad_of_pad_opt(pad_opt__2),0,fmt]];
    case 4:
      var pad_opt__3 = ign[2];
      var iconv__1 = ign[1];
      return [0,[6,iconv__1,pad_of_pad_opt(pad_opt__3),0,fmt]];
    case 5:
      var pad_opt__4 = ign[2];
      var iconv__2 = ign[1];
      return [0,[7,iconv__2,pad_of_pad_opt(pad_opt__4),0,fmt]];
    case 6:
      var prec_opt = ign[2];
      var pad_opt__5 = ign[1];
      var eS_ = prec_of_prec_opt(prec_opt);
      return [0,[8,0,pad_of_pad_opt(pad_opt__5),eS_,fmt]];
    case 7:
      var pad_opt__6 = ign[1];
      return [0,[9,pad_of_pad_opt(pad_opt__6),fmt]];
    case 8:
      var fmtty = ign[2];
      var pad_opt__7 = ign[1];
      return [0,[13,pad_opt__7,fmtty,fmt]];
    case 9:
      var fmtty__0 = ign[2];
      var pad_opt__8 = ign[1];
      return [0,[14,pad_opt__8,fmtty__0,fmt]];
    case 10:
      var char_set = ign[2];
      var width_opt = ign[1];
      return [0,[20,width_opt,char_set,fmt]];
    default:
      var counter = ign[1];
      return [0,[21,counter,fmt]]
    }
}

var default_float_precision = -6;

function buffer_create(init_size) {return [0,0,caml_create_bytes(init_size)];}

function buffer_check_size(buf, overhead) {
  var len = runtime["caml_ml_bytes_length"](buf[2]);
  var min_len = buf[1] + overhead | 0;
  var eQ_ = len < min_len ? 1 : 0;
  if (eQ_) {
    var new_len = call2(Stdlib[17], len * 2 | 0, min_len);
    var new_str = caml_create_bytes(new_len);
    call5(Stdlib_bytes[11], buf[2], 0, new_str, 0, len);
    buf[2] = new_str;
    var eR_ = 0;
  }
  else var eR_ = eQ_;
  return eR_;
}

function buffer_add_char(buf, c) {
  buffer_check_size(buf, 1);
  caml_bytes_set(buf[2], buf[1], c);
  buf[1] = buf[1] + 1 | 0;
  return 0;
}

function buffer_add_string(buf, s) {
  var str_len = caml_ml_string_length(s);
  buffer_check_size(buf, str_len);
  call5(Stdlib_string[6], s, 0, buf[2], buf[1], str_len);
  buf[1] = buf[1] + str_len | 0;
  return 0;
}

function buffer_contents(buf) {
  return call3(Stdlib_bytes[8], buf[2], 0, buf[1]);
}

function char_of_iconv(iconv) {
  switch (iconv) {
    case 6:
    case 7:
      return 120;
    case 8:
    case 9:
      return 88;
    case 10:
    case 11:
      return 111;
    case 12:
    case 15:
      return 117;
    case 0:
    case 1:
    case 2:
    case 13:
      return 100;
    default:
      return 105
    }
}

function char_of_fconv(fconv) {
  switch (fconv) {
    case 15:
      return 70;
    case 0:
    case 1:
    case 2:
      return 102;
    case 3:
    case 4:
    case 5:
      return 101;
    case 6:
    case 7:
    case 8:
      return 69;
    case 9:
    case 10:
    case 11:
      return 103;
    case 12:
    case 13:
    case 14:
      return 71;
    case 16:
    case 17:
    case 18:
      return 104;
    default:
      return 72
    }
}

function char_of_counter(counter) {
  switch (counter) {case 0:return 108;case 1:return 110;default:return 78}
}

function bprint_char_set(buf, char_set) {
  function print_start(set) {
    function is_alone(c) {
      var after = call1(Stdlib_char[1], c + 1 | 0);
      var before = call1(Stdlib_char[1], c + -1 | 0);
      var eM_ = is_in_char_set(set, c);
      if (eM_) {
        var eN_ = is_in_char_set(set, before);
        var eO_ = eN_ ? is_in_char_set(set, after) : eN_;
        var eP_ = 1 - eO_;
      }
      else var eP_ = eM_;
      return eP_;
    }
    if (is_alone(93)) {buffer_add_char(buf, 93);}
    print_out(set, 1);
    var eL_ = is_alone(45);
    return eL_ ? buffer_add_char(buf, 45) : eL_;
  }
  function print_char(buf, i) {
    var c = call1(Stdlib[29], i);
    if (37 === c) {buffer_add_char(buf, 37);return buffer_add_char(buf, 37);}
    if (64 === c) {buffer_add_char(buf, 37);return buffer_add_char(buf, 64);}
    return buffer_add_char(buf, c);
  }
  function print_out__0(counter, set, i) {
    var i__0 = i;
    for (; ; ) {
      var eK_ = i__0 < 256 ? 1 : 0;
      if (eK_) {
        if (is_in_char_set(set, call1(Stdlib[29], i__0))) {
          if (counter < 50) {
            var counter__0 = counter + 1 | 0;
            return print_first(counter__0, set, i__0);
          }
          return caml_trampoline_return(print_first, [0,set,i__0]);
        }
        var i__1 = i__0 + 1 | 0;
        var i__0 = i__1;
        continue;
      }
      return eK_;
    }
  }
  function print_first(counter, set, i) {
    var match = call1(Stdlib[29], i);
    var switcher = match + -45 | 0;
    if (48 < switcher >>> 0) {
      if (210 <= switcher) {return print_char(buf, 255);}
    }
    else {
      var switcher__0 = switcher + -1 | 0;
      if (46 < switcher__0 >>> 0) {
        var eJ_ = i + 1 | 0;
        if (counter < 50) {
          var counter__1 = counter + 1 | 0;
          return print_out__0(counter__1, set, eJ_);
        }
        return caml_trampoline_return(print_out__0, [0,set,eJ_]);
      }
    }
    var eI_ = i + 1 | 0;
    if (counter < 50) {
      var counter__0 = counter + 1 | 0;
      return print_second(counter__0, set, eI_);
    }
    return caml_trampoline_return(print_second, [0,set,eI_]);
  }
  function print_second(counter, set, i) {
    if (is_in_char_set(set, call1(Stdlib[29], i))) {
      var match = call1(Stdlib[29], i);
      var switcher = match + -45 | 0;
      if (48 < switcher >>> 0) {
        if (210 <= switcher) {
          print_char(buf, 254);
          return print_char(buf, 255);
        }
      }
      else {
        var switcher__0 = switcher + -1 | 0;
        if (46 < switcher__0 >>> 0) {
          if (! is_in_char_set(set, call1(Stdlib[29], i + 1 | 0))) {
            print_char(buf, i + -1 | 0);
            var eG_ = i + 1 | 0;
            if (counter < 50) {
              var counter__1 = counter + 1 | 0;
              return print_out__0(counter__1, set, eG_);
            }
            return caml_trampoline_return(print_out__0, [0,set,eG_]);
          }
        }
      }
      if (is_in_char_set(set, call1(Stdlib[29], i + 1 | 0))) {
        var eD_ = i + 2 | 0;
        var eE_ = i + -1 | 0;
        if (counter < 50) {
          var counter__0 = counter + 1 | 0;
          return print_in(counter__0, set, eE_, eD_);
        }
        return caml_trampoline_return(print_in, [0,set,eE_,eD_]);
      }
      print_char(buf, i + -1 | 0);
      print_char(buf, i);
      var eF_ = i + 2 | 0;
      if (counter < 50) {
        var counter__2 = counter + 1 | 0;
        return print_out__0(counter__2, set, eF_);
      }
      return caml_trampoline_return(print_out__0, [0,set,eF_]);
    }
    print_char(buf, i + -1 | 0);
    var eH_ = i + 1 | 0;
    if (counter < 50) {
      var counter__3 = counter + 1 | 0;
      return print_out__0(counter__3, set, eH_);
    }
    return caml_trampoline_return(print_out__0, [0,set,eH_]);
  }
  function print_in(counter, set, i, j) {
    var j__0 = j;
    for (; ; ) {
      if (256 !== j__0) {
        if (is_in_char_set(set, call1(Stdlib[29], j__0))) {
          var j__1 = j__0 + 1 | 0;
          var j__0 = j__1;
          continue;
        }
      }
      print_char(buf, i);
      print_char(buf, 45);
      print_char(buf, j__0 + -1 | 0);
      var eB_ = j__0 < 256 ? 1 : 0;
      if (eB_) {
        var eC_ = j__0 + 1 | 0;
        if (counter < 50) {
          var counter__0 = counter + 1 | 0;
          return print_out__0(counter__0, set, eC_);
        }
        return caml_trampoline_return(print_out__0, [0,set,eC_]);
      }
      return eB_;
    }
  }
  function print_out(set, i) {
    return caml_trampoline(print_out__0(0, set, i));
  }
  buffer_add_char(buf, 91);
  if (is_in_char_set(char_set, 0)) {
    buffer_add_char(buf, 94);
    var eA_ = rev_char_set(char_set);
  }
  else var eA_ = char_set;
  print_start(eA_);
  return buffer_add_char(buf, 93);
}

function bprint_padty(buf, padty) {
  switch (padty) {
    case 0:
      return buffer_add_char(buf, 45);
    case 1:
      return 0;
    default:
      return buffer_add_char(buf, 48)
    }
}

function bprint_ignored_flag(buf, ign_flag) {
  return ign_flag ? buffer_add_char(buf, 95) : ign_flag;
}

function bprint_pad_opt(buf, pad_opt) {
  if (pad_opt) {
    var width = pad_opt[1];
    return buffer_add_string(buf, call1(Stdlib_int[10], width));
  }
  return 0;
}

function bprint_padding(buf, pad) {
  if (typeof pad === "number") return 0;
  else {
    if (0 === pad[0]) {
      var n = pad[2];
      var padty = pad[1];
      bprint_padty(buf, padty);
      return buffer_add_string(buf, call1(Stdlib_int[10], n));
    }
    var padty__0 = pad[1];
    bprint_padty(buf, padty__0);
    return buffer_add_char(buf, 42);
  }
}

function bprint_precision(buf, prec) {
  if (typeof prec === "number") {
    return 0 === prec ? 0 : buffer_add_string(buf, cst);
  }
  var n = prec[1];
  buffer_add_char(buf, 46);
  return buffer_add_string(buf, call1(Stdlib_int[10], n));
}

function bprint_iconv_flag(buf, iconv) {
  switch (iconv) {
    case 1:
    case 4:
      return buffer_add_char(buf, 43);
    case 2:
    case 5:
      return buffer_add_char(buf, 32);
    case 7:
    case 9:
    case 11:
    case 13:
    case 14:
    case 15:
      return buffer_add_char(buf, 35);
    default:return 0
    }
}

function bprint_int_fmt(buf, ign_flag, iconv, pad, prec) {
  buffer_add_char(buf, 37);
  bprint_ignored_flag(buf, ign_flag);
  bprint_iconv_flag(buf, iconv);
  bprint_padding(buf, pad);
  bprint_precision(buf, prec);
  return buffer_add_char(buf, char_of_iconv(iconv));
}

function bprint_altint_fmt(buf, ign_flag, iconv, pad, prec, c) {
  buffer_add_char(buf, 37);
  bprint_ignored_flag(buf, ign_flag);
  bprint_iconv_flag(buf, iconv);
  bprint_padding(buf, pad);
  bprint_precision(buf, prec);
  buffer_add_char(buf, c);
  return buffer_add_char(buf, char_of_iconv(iconv));
}

function bprint_fconv_flag(buf, fconv) {
  switch (fconv) {
    case 1:
    case 4:
    case 7:
    case 10:
    case 13:
    case 17:
    case 20:
      return buffer_add_char(buf, 43);
    case 2:
    case 5:
    case 8:
    case 11:
    case 14:
    case 18:
    case 21:
      return buffer_add_char(buf, 32);
    default:return 0
    }
}

function bprint_float_fmt(buf, ign_flag, fconv, pad, prec) {
  buffer_add_char(buf, 37);
  bprint_ignored_flag(buf, ign_flag);
  bprint_fconv_flag(buf, fconv);
  bprint_padding(buf, pad);
  bprint_precision(buf, prec);
  return buffer_add_char(buf, char_of_fconv(fconv));
}

function string_of_formatting_lit(formatting_lit) {
  if (typeof formatting_lit === "number") switch (formatting_lit) {
    case 0:
      return cst__0;
    case 1:
      return cst__1;
    case 2:
      return cst__2;
    case 3:
      return cst__3;
    case 4:
      return cst__4;
    case 5:
      return cst__5;
    default:
      return cst__6
    }
  else switch (formatting_lit[0]) {
    case 0:
      var str = formatting_lit[1];
      return str;
    case 1:
      var str__0 = formatting_lit[1];
      return str__0;
    default:
      var c = formatting_lit[1];
      var ez_ = call2(Stdlib_string[1], 1, c);
      return call2(Stdlib[28], cst__7, ez_)
    }
}

function string_of_formatting_gen(formatting_gen) {
  if (0 === formatting_gen[0]) {
    var match = formatting_gen[1];
    var str = match[2];
    return str;
  }
  var match__0 = formatting_gen[1];
  var str__0 = match__0[2];
  return str__0;
}

function bprint_char_literal(buf, chr) {
  return 37 === chr ?
    buffer_add_string(buf, cst__8) :
    buffer_add_char(buf, chr);
}

function bprint_string_literal(buf, str) {
  var ex_ = caml_ml_string_length(str) + -1 | 0;
  var ew_ = 0;
  if (! (ex_ < 0)) {
    var i = ew_;
    for (; ; ) {
      bprint_char_literal(buf, caml_string_get(str, i));
      var ey_ = i + 1 | 0;
      if (ex_ !== i) {var i = ey_;continue;}
      break;
    }
  }
  return 0;
}

function bprint_fmtty(buf, fmtty) {
  var fmtty__0 = fmtty;
  for (; ; ) if (
    typeof fmtty__0 === "number"
  ) return 0;
  else switch (fmtty__0[0]) {
    case 0:
      var fmtty__1 = fmtty__0[1];
      buffer_add_string(buf, cst_c);
      var fmtty__0 = fmtty__1;
      continue;
    case 1:
      var fmtty__2 = fmtty__0[1];
      buffer_add_string(buf, cst_s);
      var fmtty__0 = fmtty__2;
      continue;
    case 2:
      var fmtty__3 = fmtty__0[1];
      buffer_add_string(buf, cst_i);
      var fmtty__0 = fmtty__3;
      continue;
    case 3:
      var fmtty__4 = fmtty__0[1];
      buffer_add_string(buf, cst_li);
      var fmtty__0 = fmtty__4;
      continue;
    case 4:
      var fmtty__5 = fmtty__0[1];
      buffer_add_string(buf, cst_ni);
      var fmtty__0 = fmtty__5;
      continue;
    case 5:
      var fmtty__6 = fmtty__0[1];
      buffer_add_string(buf, cst_Li);
      var fmtty__0 = fmtty__6;
      continue;
    case 6:
      var fmtty__7 = fmtty__0[1];
      buffer_add_string(buf, cst_f);
      var fmtty__0 = fmtty__7;
      continue;
    case 7:
      var fmtty__8 = fmtty__0[1];
      buffer_add_string(buf, cst_B);
      var fmtty__0 = fmtty__8;
      continue;
    case 8:
      var fmtty__9 = fmtty__0[2];
      var sub_fmtty = fmtty__0[1];
      buffer_add_string(buf, cst__9);
      bprint_fmtty(buf, sub_fmtty);
      buffer_add_string(buf, cst__10);
      var fmtty__0 = fmtty__9;
      continue;
    case 9:
      var fmtty__10 = fmtty__0[3];
      var sub_fmtty__0 = fmtty__0[1];
      buffer_add_string(buf, cst__11);
      bprint_fmtty(buf, sub_fmtty__0);
      buffer_add_string(buf, cst__12);
      var fmtty__0 = fmtty__10;
      continue;
    case 10:
      var fmtty__11 = fmtty__0[1];
      buffer_add_string(buf, cst_a);
      var fmtty__0 = fmtty__11;
      continue;
    case 11:
      var fmtty__12 = fmtty__0[1];
      buffer_add_string(buf, cst_t);
      var fmtty__0 = fmtty__12;
      continue;
    case 12:
      var fmtty__13 = fmtty__0[1];
      buffer_add_string(buf, cst__13);
      var fmtty__0 = fmtty__13;
      continue;
    case 13:
      var fmtty__14 = fmtty__0[1];
      buffer_add_string(buf, cst_r);
      var fmtty__0 = fmtty__14;
      continue;
    default:
      var fmtty__15 = fmtty__0[1];
      buffer_add_string(buf, cst_r__0);
      var fmtty__0 = fmtty__15;
      continue
    }
}

function int_of_custom_arity(param) {
  if (param) {var x = param[1];return 1 + int_of_custom_arity(x) | 0;}
  return 0;
}

function bprint_fmt(buf, fmt) {
  function fmtiter(fmt, ign_flag) {
    var fmt__0 = fmt;
    var ign_flag__0 = ign_flag;
    for (; ; ) if (
      typeof fmt__0 === "number"
    ) return 0;
    else switch (fmt__0[0]) {
      case 0:
        var fmt__1 = fmt__0[1];
        buffer_add_char(buf, 37);
        bprint_ignored_flag(buf, ign_flag__0);
        buffer_add_char(buf, 99);
        var fmt__0 = fmt__1;
        var ign_flag__0 = 0;
        continue;
      case 1:
        var fmt__2 = fmt__0[1];
        buffer_add_char(buf, 37);
        bprint_ignored_flag(buf, ign_flag__0);
        buffer_add_char(buf, 67);
        var fmt__0 = fmt__2;
        var ign_flag__0 = 0;
        continue;
      case 2:
        var fmt__3 = fmt__0[2];
        var pad = fmt__0[1];
        buffer_add_char(buf, 37);
        bprint_ignored_flag(buf, ign_flag__0);
        bprint_padding(buf, pad);
        buffer_add_char(buf, 115);
        var fmt__0 = fmt__3;
        var ign_flag__0 = 0;
        continue;
      case 3:
        var fmt__4 = fmt__0[2];
        var pad__0 = fmt__0[1];
        buffer_add_char(buf, 37);
        bprint_ignored_flag(buf, ign_flag__0);
        bprint_padding(buf, pad__0);
        buffer_add_char(buf, 83);
        var fmt__0 = fmt__4;
        var ign_flag__0 = 0;
        continue;
      case 4:
        var fmt__5 = fmt__0[4];
        var prec = fmt__0[3];
        var pad__1 = fmt__0[2];
        var iconv = fmt__0[1];
        bprint_int_fmt(buf, ign_flag__0, iconv, pad__1, prec);
        var fmt__0 = fmt__5;
        var ign_flag__0 = 0;
        continue;
      case 5:
        var fmt__6 = fmt__0[4];
        var prec__0 = fmt__0[3];
        var pad__2 = fmt__0[2];
        var iconv__0 = fmt__0[1];
        bprint_altint_fmt(buf, ign_flag__0, iconv__0, pad__2, prec__0, 108);
        var fmt__0 = fmt__6;
        var ign_flag__0 = 0;
        continue;
      case 6:
        var fmt__7 = fmt__0[4];
        var prec__1 = fmt__0[3];
        var pad__3 = fmt__0[2];
        var iconv__1 = fmt__0[1];
        bprint_altint_fmt(buf, ign_flag__0, iconv__1, pad__3, prec__1, 110);
        var fmt__0 = fmt__7;
        var ign_flag__0 = 0;
        continue;
      case 7:
        var fmt__8 = fmt__0[4];
        var prec__2 = fmt__0[3];
        var pad__4 = fmt__0[2];
        var iconv__2 = fmt__0[1];
        bprint_altint_fmt(buf, ign_flag__0, iconv__2, pad__4, prec__2, 76);
        var fmt__0 = fmt__8;
        var ign_flag__0 = 0;
        continue;
      case 8:
        var fmt__9 = fmt__0[4];
        var prec__3 = fmt__0[3];
        var pad__5 = fmt__0[2];
        var fconv = fmt__0[1];
        bprint_float_fmt(buf, ign_flag__0, fconv, pad__5, prec__3);
        var fmt__0 = fmt__9;
        var ign_flag__0 = 0;
        continue;
      case 9:
        var fmt__10 = fmt__0[2];
        var pad__6 = fmt__0[1];
        buffer_add_char(buf, 37);
        bprint_ignored_flag(buf, ign_flag__0);
        bprint_padding(buf, pad__6);
        buffer_add_char(buf, 66);
        var fmt__0 = fmt__10;
        var ign_flag__0 = 0;
        continue;
      case 10:
        var fmt__11 = fmt__0[1];
        buffer_add_string(buf, cst__14);
        var fmt__0 = fmt__11;
        continue;
      case 11:
        var fmt__12 = fmt__0[2];
        var str = fmt__0[1];
        bprint_string_literal(buf, str);
        var fmt__0 = fmt__12;
        continue;
      case 12:
        var fmt__13 = fmt__0[2];
        var chr = fmt__0[1];
        bprint_char_literal(buf, chr);
        var fmt__0 = fmt__13;
        continue;
      case 13:
        var fmt__14 = fmt__0[3];
        var fmtty = fmt__0[2];
        var pad_opt = fmt__0[1];
        buffer_add_char(buf, 37);
        bprint_ignored_flag(buf, ign_flag__0);
        bprint_pad_opt(buf, pad_opt);
        buffer_add_char(buf, 123);
        bprint_fmtty(buf, fmtty);
        buffer_add_char(buf, 37);
        buffer_add_char(buf, 125);
        var fmt__0 = fmt__14;
        var ign_flag__0 = 0;
        continue;
      case 14:
        var fmt__15 = fmt__0[3];
        var fmtty__0 = fmt__0[2];
        var pad_opt__0 = fmt__0[1];
        buffer_add_char(buf, 37);
        bprint_ignored_flag(buf, ign_flag__0);
        bprint_pad_opt(buf, pad_opt__0);
        buffer_add_char(buf, 40);
        bprint_fmtty(buf, fmtty__0);
        buffer_add_char(buf, 37);
        buffer_add_char(buf, 41);
        var fmt__0 = fmt__15;
        var ign_flag__0 = 0;
        continue;
      case 15:
        var fmt__16 = fmt__0[1];
        buffer_add_char(buf, 37);
        bprint_ignored_flag(buf, ign_flag__0);
        buffer_add_char(buf, 97);
        var fmt__0 = fmt__16;
        var ign_flag__0 = 0;
        continue;
      case 16:
        var fmt__17 = fmt__0[1];
        buffer_add_char(buf, 37);
        bprint_ignored_flag(buf, ign_flag__0);
        buffer_add_char(buf, 116);
        var fmt__0 = fmt__17;
        var ign_flag__0 = 0;
        continue;
      case 17:
        var fmt__18 = fmt__0[2];
        var fmting_lit = fmt__0[1];
        bprint_string_literal(buf, string_of_formatting_lit(fmting_lit));
        var fmt__0 = fmt__18;
        continue;
      case 18:
        var fmt__19 = fmt__0[2];
        var fmting_gen = fmt__0[1];
        bprint_string_literal(buf, cst__15);
        bprint_string_literal(buf, string_of_formatting_gen(fmting_gen));
        var fmt__0 = fmt__19;
        continue;
      case 19:
        var fmt__20 = fmt__0[1];
        buffer_add_char(buf, 37);
        bprint_ignored_flag(buf, ign_flag__0);
        buffer_add_char(buf, 114);
        var fmt__0 = fmt__20;
        var ign_flag__0 = 0;
        continue;
      case 20:
        var fmt__21 = fmt__0[3];
        var char_set = fmt__0[2];
        var width_opt = fmt__0[1];
        buffer_add_char(buf, 37);
        bprint_ignored_flag(buf, ign_flag__0);
        bprint_pad_opt(buf, width_opt);
        bprint_char_set(buf, char_set);
        var fmt__0 = fmt__21;
        var ign_flag__0 = 0;
        continue;
      case 21:
        var fmt__22 = fmt__0[2];
        var counter = fmt__0[1];
        buffer_add_char(buf, 37);
        bprint_ignored_flag(buf, ign_flag__0);
        buffer_add_char(buf, char_of_counter(counter));
        var fmt__0 = fmt__22;
        var ign_flag__0 = 0;
        continue;
      case 22:
        var fmt__23 = fmt__0[1];
        buffer_add_char(buf, 37);
        bprint_ignored_flag(buf, ign_flag__0);
        bprint_string_literal(buf, cst_0c);
        var fmt__0 = fmt__23;
        var ign_flag__0 = 0;
        continue;
      case 23:
        var rest = fmt__0[2];
        var ign = fmt__0[1];
        var match = param_format_of_ignored_format(ign, rest);
        var fmt__24 = match[1];
        var fmt__0 = fmt__24;
        var ign_flag__0 = 1;
        continue;
      default:
        var rest__0 = fmt__0[3];
        var arity = fmt__0[1];
        var eu_ = int_of_custom_arity(arity);
        var et_ = 1;
        if (! (eu_ < 1)) {
          var i = et_;
          for (; ; ) {
            buffer_add_char(buf, 37);
            bprint_ignored_flag(buf, ign_flag__0);
            buffer_add_char(buf, 63);
            var ev_ = i + 1 | 0;
            if (eu_ !== i) {var i = ev_;continue;}
            break;
          }
        }
        var fmt__0 = rest__0;
        var ign_flag__0 = 0;
        continue
      }
  }
  return fmtiter(fmt, 0);
}

function string_of_fmt(fmt) {
  var buf = buffer_create(16);
  bprint_fmt(buf, fmt);
  return buffer_contents(buf);
}

function symm(param) {
  if (typeof param === "number") return 0;
  else switch (param[0]) {
    case 0:
      var rest = param[1];
      return [0,symm(rest)];
    case 1:
      var rest__0 = param[1];
      return [1,symm(rest__0)];
    case 2:
      var rest__1 = param[1];
      return [2,symm(rest__1)];
    case 3:
      var rest__2 = param[1];
      return [3,symm(rest__2)];
    case 4:
      var rest__3 = param[1];
      return [4,symm(rest__3)];
    case 5:
      var rest__4 = param[1];
      return [5,symm(rest__4)];
    case 6:
      var rest__5 = param[1];
      return [6,symm(rest__5)];
    case 7:
      var rest__6 = param[1];
      return [7,symm(rest__6)];
    case 8:
      var rest__7 = param[2];
      var ty = param[1];
      return [8,ty,symm(rest__7)];
    case 9:
      var rest__8 = param[3];
      var ty2 = param[2];
      var ty1 = param[1];
      return [9,ty2,ty1,symm(rest__8)];
    case 10:
      var rest__9 = param[1];
      return [10,symm(rest__9)];
    case 11:
      var rest__10 = param[1];
      return [11,symm(rest__10)];
    case 12:
      var rest__11 = param[1];
      return [12,symm(rest__11)];
    case 13:
      var rest__12 = param[1];
      return [13,symm(rest__12)];
    default:
      var rest__13 = param[1];
      return [14,symm(rest__13)]
    }
}

function fmtty_rel_det(param) {
  if (typeof param === "number") {
    var d6_ = function(param) {return 0;};
    var d7_ = function(param) {return 0;};
    var d8_ = function(param) {return 0;};
    return [0,function(param) {return 0;},d8_,d7_,d6_];
  }
  else switch (param[0]) {
    case 0:
      var rest = param[1];
      var match = fmtty_rel_det(rest);
      var de = match[4];
      var ed = match[3];
      var af = match[2];
      var fa = match[1];
      var d9_ = function(param) {call1(af, 0);return 0;};
      return [0,function(param) {call1(fa, 0);return 0;},d9_,ed,de];
    case 1:
      var rest__0 = param[1];
      var match__0 = fmtty_rel_det(rest__0);
      var de__0 = match__0[4];
      var ed__0 = match__0[3];
      var af__0 = match__0[2];
      var fa__0 = match__0[1];
      var d__ = function(param) {call1(af__0, 0);return 0;};
      return [0,function(param) {call1(fa__0, 0);return 0;},d__,ed__0,de__0];
    case 2:
      var rest__1 = param[1];
      var match__1 = fmtty_rel_det(rest__1);
      var de__1 = match__1[4];
      var ed__1 = match__1[3];
      var af__1 = match__1[2];
      var fa__1 = match__1[1];
      var ea_ = function(param) {call1(af__1, 0);return 0;};
      return [0,function(param) {call1(fa__1, 0);return 0;},ea_,ed__1,de__1];
    case 3:
      var rest__2 = param[1];
      var match__2 = fmtty_rel_det(rest__2);
      var de__2 = match__2[4];
      var ed__2 = match__2[3];
      var af__2 = match__2[2];
      var fa__2 = match__2[1];
      var eb_ = function(param) {call1(af__2, 0);return 0;};
      return [0,function(param) {call1(fa__2, 0);return 0;},eb_,ed__2,de__2];
    case 4:
      var rest__3 = param[1];
      var match__3 = fmtty_rel_det(rest__3);
      var de__3 = match__3[4];
      var ed__3 = match__3[3];
      var af__3 = match__3[2];
      var fa__3 = match__3[1];
      var ec_ = function(param) {call1(af__3, 0);return 0;};
      return [0,function(param) {call1(fa__3, 0);return 0;},ec_,ed__3,de__3];
    case 5:
      var rest__4 = param[1];
      var match__4 = fmtty_rel_det(rest__4);
      var de__4 = match__4[4];
      var ed__4 = match__4[3];
      var af__4 = match__4[2];
      var fa__4 = match__4[1];
      var ed_ = function(param) {call1(af__4, 0);return 0;};
      return [0,function(param) {call1(fa__4, 0);return 0;},ed_,ed__4,de__4];
    case 6:
      var rest__5 = param[1];
      var match__5 = fmtty_rel_det(rest__5);
      var de__5 = match__5[4];
      var ed__5 = match__5[3];
      var af__5 = match__5[2];
      var fa__5 = match__5[1];
      var ee_ = function(param) {call1(af__5, 0);return 0;};
      return [0,function(param) {call1(fa__5, 0);return 0;},ee_,ed__5,de__5];
    case 7:
      var rest__6 = param[1];
      var match__6 = fmtty_rel_det(rest__6);
      var de__6 = match__6[4];
      var ed__6 = match__6[3];
      var af__6 = match__6[2];
      var fa__6 = match__6[1];
      var ef_ = function(param) {call1(af__6, 0);return 0;};
      return [0,function(param) {call1(fa__6, 0);return 0;},ef_,ed__6,de__6];
    case 8:
      var rest__7 = param[2];
      var match__7 = fmtty_rel_det(rest__7);
      var de__7 = match__7[4];
      var ed__7 = match__7[3];
      var af__7 = match__7[2];
      var fa__7 = match__7[1];
      var eg_ = function(param) {call1(af__7, 0);return 0;};
      return [0,function(param) {call1(fa__7, 0);return 0;},eg_,ed__7,de__7];
    case 9:
      var rest__8 = param[3];
      var ty2 = param[2];
      var ty1 = param[1];
      var match__8 = fmtty_rel_det(rest__8);
      var de__8 = match__8[4];
      var ed__8 = match__8[3];
      var af__8 = match__8[2];
      var fa__8 = match__8[1];
      var ty = trans(symm(ty1), ty2);
      var match__9 = fmtty_rel_det(ty);
      var jd = match__9[4];
      var dj = match__9[3];
      var ga = match__9[2];
      var ag = match__9[1];
      var eh_ = function(param) {call1(jd, 0);call1(de__8, 0);return 0;};
      var ei_ = function(param) {call1(ed__8, 0);call1(dj, 0);return 0;};
      var ej_ = function(param) {call1(ga, 0);call1(af__8, 0);return 0;};
      return [
        0,
        function(param) {call1(fa__8, 0);call1(ag, 0);return 0;},
        ej_,
        ei_,
        eh_
      ];
    case 10:
      var rest__9 = param[1];
      var match__10 = fmtty_rel_det(rest__9);
      var de__9 = match__10[4];
      var ed__9 = match__10[3];
      var af__9 = match__10[2];
      var fa__9 = match__10[1];
      var ek_ = function(param) {call1(af__9, 0);return 0;};
      return [0,function(param) {call1(fa__9, 0);return 0;},ek_,ed__9,de__9];
    case 11:
      var rest__10 = param[1];
      var match__11 = fmtty_rel_det(rest__10);
      var de__10 = match__11[4];
      var ed__10 = match__11[3];
      var af__10 = match__11[2];
      var fa__10 = match__11[1];
      var el_ = function(param) {call1(af__10, 0);return 0;};
      return [0,function(param) {call1(fa__10, 0);return 0;},el_,ed__10,de__10
      ];
    case 12:
      var rest__11 = param[1];
      var match__12 = fmtty_rel_det(rest__11);
      var de__11 = match__12[4];
      var ed__11 = match__12[3];
      var af__11 = match__12[2];
      var fa__11 = match__12[1];
      var em_ = function(param) {call1(af__11, 0);return 0;};
      return [0,function(param) {call1(fa__11, 0);return 0;},em_,ed__11,de__11
      ];
    case 13:
      var rest__12 = param[1];
      var match__13 = fmtty_rel_det(rest__12);
      var de__12 = match__13[4];
      var ed__12 = match__13[3];
      var af__12 = match__13[2];
      var fa__12 = match__13[1];
      var en_ = function(param) {call1(de__12, 0);return 0;};
      var eo_ = function(param) {call1(ed__12, 0);return 0;};
      var ep_ = function(param) {call1(af__12, 0);return 0;};
      return [0,function(param) {call1(fa__12, 0);return 0;},ep_,eo_,en_];
    default:
      var rest__13 = param[1];
      var match__14 = fmtty_rel_det(rest__13);
      var de__13 = match__14[4];
      var ed__13 = match__14[3];
      var af__13 = match__14[2];
      var fa__13 = match__14[1];
      var eq_ = function(param) {call1(de__13, 0);return 0;};
      var er_ = function(param) {call1(ed__13, 0);return 0;};
      var es_ = function(param) {call1(af__13, 0);return 0;};
      return [0,function(param) {call1(fa__13, 0);return 0;},es_,er_,eq_]
    }
}

function trans(ty1, match) {
  if (typeof ty1 === "number") if (typeof match === "number"
  ) return 0;
  else switch (match[0]) {
    case 10:
      var switch__0 = 0;
      break;
    case 11:
      var switch__0 = 1;
      break;
    case 12:
      var switch__0 = 2;
      break;
    case 13:
      var switch__0 = 3;
      break;
    case 14:
      var switch__0 = 4;
      break;
    case 8:
      var switch__0 = 5;
      break;
    case 9:
      var switch__0 = 6;
      break;
    default:
      throw caml_wrap_thrown_exception([0,Assert_failure,a_])
    }
  else switch (ty1[0]) {
    case 0:
      var dN_ = ty1[1];
      if (typeof match === "number") var switch__1 = 1;
      else switch (match[0]) {
        case 0:
          var rest2 = match[1];
          return [0,trans(dN_, rest2)];
        case 8:
          var switch__0 = 5;
          var switch__1 = 0;
          break;
        case 9:
          var switch__0 = 6;
          var switch__1 = 0;
          break;
        case 10:
          var switch__0 = 0;
          var switch__1 = 0;
          break;
        case 11:
          var switch__0 = 1;
          var switch__1 = 0;
          break;
        case 12:
          var switch__0 = 2;
          var switch__1 = 0;
          break;
        case 13:
          var switch__0 = 3;
          var switch__1 = 0;
          break;
        case 14:
          var switch__0 = 4;
          var switch__1 = 0;
          break;
        default:
          var switch__1 = 1
        }
      if (switch__1) {var switch__0 = 7;}
      break;
    case 1:
      var dO_ = ty1[1];
      if (typeof match === "number") var switch__2 = 1;
      else switch (match[0]) {
        case 1:
          var rest2__0 = match[1];
          return [1,trans(dO_, rest2__0)];
        case 8:
          var switch__0 = 5;
          var switch__2 = 0;
          break;
        case 9:
          var switch__0 = 6;
          var switch__2 = 0;
          break;
        case 10:
          var switch__0 = 0;
          var switch__2 = 0;
          break;
        case 11:
          var switch__0 = 1;
          var switch__2 = 0;
          break;
        case 12:
          var switch__0 = 2;
          var switch__2 = 0;
          break;
        case 13:
          var switch__0 = 3;
          var switch__2 = 0;
          break;
        case 14:
          var switch__0 = 4;
          var switch__2 = 0;
          break;
        default:
          var switch__2 = 1
        }
      if (switch__2) {var switch__0 = 7;}
      break;
    case 2:
      var dP_ = ty1[1];
      if (typeof match === "number") var switch__3 = 1;
      else switch (match[0]) {
        case 2:
          var rest2__1 = match[1];
          return [2,trans(dP_, rest2__1)];
        case 8:
          var switch__0 = 5;
          var switch__3 = 0;
          break;
        case 9:
          var switch__0 = 6;
          var switch__3 = 0;
          break;
        case 10:
          var switch__0 = 0;
          var switch__3 = 0;
          break;
        case 11:
          var switch__0 = 1;
          var switch__3 = 0;
          break;
        case 12:
          var switch__0 = 2;
          var switch__3 = 0;
          break;
        case 13:
          var switch__0 = 3;
          var switch__3 = 0;
          break;
        case 14:
          var switch__0 = 4;
          var switch__3 = 0;
          break;
        default:
          var switch__3 = 1
        }
      if (switch__3) {var switch__0 = 7;}
      break;
    case 3:
      var dQ_ = ty1[1];
      if (typeof match === "number") var switch__4 = 1;
      else switch (match[0]) {
        case 3:
          var rest2__2 = match[1];
          return [3,trans(dQ_, rest2__2)];
        case 8:
          var switch__0 = 5;
          var switch__4 = 0;
          break;
        case 9:
          var switch__0 = 6;
          var switch__4 = 0;
          break;
        case 10:
          var switch__0 = 0;
          var switch__4 = 0;
          break;
        case 11:
          var switch__0 = 1;
          var switch__4 = 0;
          break;
        case 12:
          var switch__0 = 2;
          var switch__4 = 0;
          break;
        case 13:
          var switch__0 = 3;
          var switch__4 = 0;
          break;
        case 14:
          var switch__0 = 4;
          var switch__4 = 0;
          break;
        default:
          var switch__4 = 1
        }
      if (switch__4) {var switch__0 = 7;}
      break;
    case 4:
      var dR_ = ty1[1];
      if (typeof match === "number") var switch__5 = 1;
      else switch (match[0]) {
        case 4:
          var rest2__3 = match[1];
          return [4,trans(dR_, rest2__3)];
        case 8:
          var switch__0 = 5;
          var switch__5 = 0;
          break;
        case 9:
          var switch__0 = 6;
          var switch__5 = 0;
          break;
        case 10:
          var switch__0 = 0;
          var switch__5 = 0;
          break;
        case 11:
          var switch__0 = 1;
          var switch__5 = 0;
          break;
        case 12:
          var switch__0 = 2;
          var switch__5 = 0;
          break;
        case 13:
          var switch__0 = 3;
          var switch__5 = 0;
          break;
        case 14:
          var switch__0 = 4;
          var switch__5 = 0;
          break;
        default:
          var switch__5 = 1
        }
      if (switch__5) {var switch__0 = 7;}
      break;
    case 5:
      var dS_ = ty1[1];
      if (typeof match === "number") var switch__6 = 1;
      else switch (match[0]) {
        case 5:
          var rest2__4 = match[1];
          return [5,trans(dS_, rest2__4)];
        case 8:
          var switch__0 = 5;
          var switch__6 = 0;
          break;
        case 9:
          var switch__0 = 6;
          var switch__6 = 0;
          break;
        case 10:
          var switch__0 = 0;
          var switch__6 = 0;
          break;
        case 11:
          var switch__0 = 1;
          var switch__6 = 0;
          break;
        case 12:
          var switch__0 = 2;
          var switch__6 = 0;
          break;
        case 13:
          var switch__0 = 3;
          var switch__6 = 0;
          break;
        case 14:
          var switch__0 = 4;
          var switch__6 = 0;
          break;
        default:
          var switch__6 = 1
        }
      if (switch__6) {var switch__0 = 7;}
      break;
    case 6:
      var dT_ = ty1[1];
      if (typeof match === "number") var switch__7 = 1;
      else switch (match[0]) {
        case 6:
          var rest2__5 = match[1];
          return [6,trans(dT_, rest2__5)];
        case 8:
          var switch__0 = 5;
          var switch__7 = 0;
          break;
        case 9:
          var switch__0 = 6;
          var switch__7 = 0;
          break;
        case 10:
          var switch__0 = 0;
          var switch__7 = 0;
          break;
        case 11:
          var switch__0 = 1;
          var switch__7 = 0;
          break;
        case 12:
          var switch__0 = 2;
          var switch__7 = 0;
          break;
        case 13:
          var switch__0 = 3;
          var switch__7 = 0;
          break;
        case 14:
          var switch__0 = 4;
          var switch__7 = 0;
          break;
        default:
          var switch__7 = 1
        }
      if (switch__7) {var switch__0 = 7;}
      break;
    case 7:
      var dU_ = ty1[1];
      if (typeof match === "number") var switch__8 = 1;
      else switch (match[0]) {
        case 7:
          var rest2__6 = match[1];
          return [7,trans(dU_, rest2__6)];
        case 8:
          var switch__0 = 5;
          var switch__8 = 0;
          break;
        case 9:
          var switch__0 = 6;
          var switch__8 = 0;
          break;
        case 10:
          var switch__0 = 0;
          var switch__8 = 0;
          break;
        case 11:
          var switch__0 = 1;
          var switch__8 = 0;
          break;
        case 12:
          var switch__0 = 2;
          var switch__8 = 0;
          break;
        case 13:
          var switch__0 = 3;
          var switch__8 = 0;
          break;
        case 14:
          var switch__0 = 4;
          var switch__8 = 0;
          break;
        default:
          var switch__8 = 1
        }
      if (switch__8) {var switch__0 = 7;}
      break;
    case 8:
      var dV_ = ty1[2];
      var dW_ = ty1[1];
      if (typeof match === "number") var switch__9 = 1;
      else switch (match[0]) {
        case 8:
          var rest2__7 = match[2];
          var ty2 = match[1];
          var dX_ = trans(dV_, rest2__7);
          return [8,trans(dW_, ty2),dX_];
        case 10:
          var switch__0 = 0;
          var switch__9 = 0;
          break;
        case 11:
          var switch__0 = 1;
          var switch__9 = 0;
          break;
        case 12:
          var switch__0 = 2;
          var switch__9 = 0;
          break;
        case 13:
          var switch__0 = 3;
          var switch__9 = 0;
          break;
        case 14:
          var switch__0 = 4;
          var switch__9 = 0;
          break;
        default:
          var switch__9 = 1
        }
      if (switch__9) {
        throw caml_wrap_thrown_exception([0,Assert_failure,j_]);
      }
      break;
    case 9:
      var dY_ = ty1[3];
      var dZ_ = ty1[2];
      var d0_ = ty1[1];
      if (typeof match === "number") var switch__10 = 1;
      else switch (match[0]) {
        case 8:
          var switch__0 = 5;
          var switch__10 = 0;
          break;
        case 9:
          var rest2__8 = match[3];
          var ty22 = match[2];
          var ty21 = match[1];
          var ty = trans(symm(dZ_), ty21);
          var match__0 = fmtty_rel_det(ty);
          var f4 = match__0[4];
          var f2 = match__0[2];
          call1(f2, 0);
          call1(f4, 0);
          return [9,d0_,ty22,trans(dY_, rest2__8)];
        case 10:
          var switch__0 = 0;
          var switch__10 = 0;
          break;
        case 11:
          var switch__0 = 1;
          var switch__10 = 0;
          break;
        case 12:
          var switch__0 = 2;
          var switch__10 = 0;
          break;
        case 13:
          var switch__0 = 3;
          var switch__10 = 0;
          break;
        case 14:
          var switch__0 = 4;
          var switch__10 = 0;
          break;
        default:
          var switch__10 = 1
        }
      if (switch__10) {
        throw caml_wrap_thrown_exception([0,Assert_failure,k_]);
      }
      break;
    case 10:
      var d1_ = ty1[1];
      if (! (typeof match === "number") && 10 === match[0]) {
        var rest2__9 = match[1];
        return [10,trans(d1_, rest2__9)];
      }
      throw caml_wrap_thrown_exception([0,Assert_failure,l_]);
    case 11:
      var d2_ = ty1[1];
      if (typeof match === "number") var switch__11 = 1;
      else switch (match[0]) {
        case 10:
          var switch__0 = 0;
          var switch__11 = 0;
          break;
        case 11:
          var rest2__10 = match[1];
          return [11,trans(d2_, rest2__10)];
        default:
          var switch__11 = 1
        }
      if (switch__11) {
        throw caml_wrap_thrown_exception([0,Assert_failure,m_]);
      }
      break;
    case 12:
      var d3_ = ty1[1];
      if (typeof match === "number") var switch__12 = 1;
      else switch (match[0]) {
        case 10:
          var switch__0 = 0;
          var switch__12 = 0;
          break;
        case 11:
          var switch__0 = 1;
          var switch__12 = 0;
          break;
        case 12:
          var rest2__11 = match[1];
          return [12,trans(d3_, rest2__11)];
        default:
          var switch__12 = 1
        }
      if (switch__12) {
        throw caml_wrap_thrown_exception([0,Assert_failure,n_]);
      }
      break;
    case 13:
      var d4_ = ty1[1];
      if (typeof match === "number") var switch__13 = 1;
      else switch (match[0]) {
        case 10:
          var switch__0 = 0;
          var switch__13 = 0;
          break;
        case 11:
          var switch__0 = 1;
          var switch__13 = 0;
          break;
        case 12:
          var switch__0 = 2;
          var switch__13 = 0;
          break;
        case 13:
          var rest2__12 = match[1];
          return [13,trans(d4_, rest2__12)];
        default:
          var switch__13 = 1
        }
      if (switch__13) {
        throw caml_wrap_thrown_exception([0,Assert_failure,o_]);
      }
      break;
    default:
      var d5_ = ty1[1];
      if (typeof match === "number") var switch__14 = 1;
      else switch (match[0]) {
        case 10:
          var switch__0 = 0;
          var switch__14 = 0;
          break;
        case 11:
          var switch__0 = 1;
          var switch__14 = 0;
          break;
        case 12:
          var switch__0 = 2;
          var switch__14 = 0;
          break;
        case 13:
          var switch__0 = 3;
          var switch__14 = 0;
          break;
        case 14:
          var rest2__13 = match[1];
          return [14,trans(d5_, rest2__13)];
        default:
          var switch__14 = 1
        }
      if (switch__14) {
        throw caml_wrap_thrown_exception([0,Assert_failure,p_]);
      }
    }
  switch (switch__0) {
    case 0:
      throw caml_wrap_thrown_exception([0,Assert_failure,d_]);
    case 1:
      throw caml_wrap_thrown_exception([0,Assert_failure,e_]);
    case 2:
      throw caml_wrap_thrown_exception([0,Assert_failure,f_]);
    case 3:
      throw caml_wrap_thrown_exception([0,Assert_failure,g_]);
    case 4:
      throw caml_wrap_thrown_exception([0,Assert_failure,h_]);
    case 5:
      throw caml_wrap_thrown_exception([0,Assert_failure,b_]);
    case 6:
      throw caml_wrap_thrown_exception([0,Assert_failure,c_]);
    default:
      throw caml_wrap_thrown_exception([0,Assert_failure,i_])
    }
}

function fmtty_of_padding_fmtty(pad, fmtty) {
  return typeof pad === "number" ? fmtty : 0 === pad[0] ? fmtty : [2,fmtty];
}

function fmtty_of_custom(arity, fmtty) {
  if (arity) {
    var arity__0 = arity[1];
    return [12,fmtty_of_custom(arity__0, fmtty)];
  }
  return fmtty;
}

function fmtty_of_fmt__0(counter, fmtty) {
  var fmtty__0 = fmtty;
  for (; ; ) if (
    typeof fmtty__0 === "number"
  ) return 0;
  else switch (fmtty__0[0]) {
    case 0:
      var rest = fmtty__0[1];
      return [0,fmtty_of_fmt(rest)];
    case 1:
      var rest__0 = fmtty__0[1];
      return [0,fmtty_of_fmt(rest__0)];
    case 2:
      var rest__1 = fmtty__0[2];
      var pad = fmtty__0[1];
      return fmtty_of_padding_fmtty(pad, [1,fmtty_of_fmt(rest__1)]);
    case 3:
      var rest__2 = fmtty__0[2];
      var pad__0 = fmtty__0[1];
      return fmtty_of_padding_fmtty(pad__0, [1,fmtty_of_fmt(rest__2)]);
    case 4:
      var rest__3 = fmtty__0[4];
      var prec = fmtty__0[3];
      var pad__1 = fmtty__0[2];
      var ty_rest = fmtty_of_fmt(rest__3);
      var prec_ty = fmtty_of_precision_fmtty(prec, [2,ty_rest]);
      return fmtty_of_padding_fmtty(pad__1, prec_ty);
    case 5:
      var rest__4 = fmtty__0[4];
      var prec__0 = fmtty__0[3];
      var pad__2 = fmtty__0[2];
      var ty_rest__0 = fmtty_of_fmt(rest__4);
      var prec_ty__0 = fmtty_of_precision_fmtty(prec__0, [3,ty_rest__0]);
      return fmtty_of_padding_fmtty(pad__2, prec_ty__0);
    case 6:
      var rest__5 = fmtty__0[4];
      var prec__1 = fmtty__0[3];
      var pad__3 = fmtty__0[2];
      var ty_rest__1 = fmtty_of_fmt(rest__5);
      var prec_ty__1 = fmtty_of_precision_fmtty(prec__1, [4,ty_rest__1]);
      return fmtty_of_padding_fmtty(pad__3, prec_ty__1);
    case 7:
      var rest__6 = fmtty__0[4];
      var prec__2 = fmtty__0[3];
      var pad__4 = fmtty__0[2];
      var ty_rest__2 = fmtty_of_fmt(rest__6);
      var prec_ty__2 = fmtty_of_precision_fmtty(prec__2, [5,ty_rest__2]);
      return fmtty_of_padding_fmtty(pad__4, prec_ty__2);
    case 8:
      var rest__7 = fmtty__0[4];
      var prec__3 = fmtty__0[3];
      var pad__5 = fmtty__0[2];
      var ty_rest__3 = fmtty_of_fmt(rest__7);
      var prec_ty__3 = fmtty_of_precision_fmtty(prec__3, [6,ty_rest__3]);
      return fmtty_of_padding_fmtty(pad__5, prec_ty__3);
    case 9:
      var rest__8 = fmtty__0[2];
      var pad__6 = fmtty__0[1];
      return fmtty_of_padding_fmtty(pad__6, [7,fmtty_of_fmt(rest__8)]);
    case 10:
      var fmtty__1 = fmtty__0[1];
      var fmtty__0 = fmtty__1;
      continue;
    case 11:
      var fmtty__2 = fmtty__0[2];
      var fmtty__0 = fmtty__2;
      continue;
    case 12:
      var fmtty__3 = fmtty__0[2];
      var fmtty__0 = fmtty__3;
      continue;
    case 13:
      var rest__9 = fmtty__0[3];
      var ty = fmtty__0[2];
      return [8,ty,fmtty_of_fmt(rest__9)];
    case 14:
      var rest__10 = fmtty__0[3];
      var ty__0 = fmtty__0[2];
      return [9,ty__0,ty__0,fmtty_of_fmt(rest__10)];
    case 15:
      var rest__11 = fmtty__0[1];
      return [10,fmtty_of_fmt(rest__11)];
    case 16:
      var rest__12 = fmtty__0[1];
      return [11,fmtty_of_fmt(rest__12)];
    case 17:
      var fmtty__4 = fmtty__0[2];
      var fmtty__0 = fmtty__4;
      continue;
    case 18:
      var rest__13 = fmtty__0[2];
      var fmting_gen = fmtty__0[1];
      var dL_ = fmtty_of_fmt(rest__13);
      var dM_ = fmtty_of_formatting_gen(fmting_gen);
      return call2(CamlinternalFormatBasics[1], dM_, dL_);
    case 19:
      var rest__14 = fmtty__0[1];
      return [13,fmtty_of_fmt(rest__14)];
    case 20:
      var rest__15 = fmtty__0[3];
      return [1,fmtty_of_fmt(rest__15)];
    case 21:
      var rest__16 = fmtty__0[2];
      return [2,fmtty_of_fmt(rest__16)];
    case 22:
      var rest__17 = fmtty__0[1];
      return [0,fmtty_of_fmt(rest__17)];
    case 23:
      var rest__18 = fmtty__0[2];
      var ign = fmtty__0[1];
      if (counter < 50) {
        var counter__0 = counter + 1 | 0;
        return fmtty_of_ignored_format(counter__0, ign, rest__18);
      }
      return caml_trampoline_return(fmtty_of_ignored_format, [0,ign,rest__18]);
    default:
      var rest__19 = fmtty__0[3];
      var arity = fmtty__0[1];
      return fmtty_of_custom(arity, fmtty_of_fmt(rest__19))
    }
}

function fmtty_of_ignored_format(counter, ign, fmt) {
  if (typeof ign === "number") switch (ign) {
    case 0:
      if (counter < 50) {
        var counter__0 = counter + 1 | 0;
        return fmtty_of_fmt__0(counter__0, fmt);
      }
      return caml_trampoline_return(fmtty_of_fmt__0, [0,fmt]);
    case 1:
      if (counter < 50) {
        var counter__1 = counter + 1 | 0;
        return fmtty_of_fmt__0(counter__1, fmt);
      }
      return caml_trampoline_return(fmtty_of_fmt__0, [0,fmt]);
    case 2:
      return [14,fmtty_of_fmt(fmt)];
    default:
      if (counter < 50) {
        var counter__2 = counter + 1 | 0;
        return fmtty_of_fmt__0(counter__2, fmt);
      }
      return caml_trampoline_return(fmtty_of_fmt__0, [0,fmt])
    }
  else switch (ign[0]) {
    case 0:
      if (counter < 50) {
        var counter__3 = counter + 1 | 0;
        return fmtty_of_fmt__0(counter__3, fmt);
      }
      return caml_trampoline_return(fmtty_of_fmt__0, [0,fmt]);
    case 1:
      if (counter < 50) {
        var counter__4 = counter + 1 | 0;
        return fmtty_of_fmt__0(counter__4, fmt);
      }
      return caml_trampoline_return(fmtty_of_fmt__0, [0,fmt]);
    case 2:
      if (counter < 50) {
        var counter__5 = counter + 1 | 0;
        return fmtty_of_fmt__0(counter__5, fmt);
      }
      return caml_trampoline_return(fmtty_of_fmt__0, [0,fmt]);
    case 3:
      if (counter < 50) {
        var counter__6 = counter + 1 | 0;
        return fmtty_of_fmt__0(counter__6, fmt);
      }
      return caml_trampoline_return(fmtty_of_fmt__0, [0,fmt]);
    case 4:
      if (counter < 50) {
        var counter__7 = counter + 1 | 0;
        return fmtty_of_fmt__0(counter__7, fmt);
      }
      return caml_trampoline_return(fmtty_of_fmt__0, [0,fmt]);
    case 5:
      if (counter < 50) {
        var counter__8 = counter + 1 | 0;
        return fmtty_of_fmt__0(counter__8, fmt);
      }
      return caml_trampoline_return(fmtty_of_fmt__0, [0,fmt]);
    case 6:
      if (counter < 50) {
        var counter__9 = counter + 1 | 0;
        return fmtty_of_fmt__0(counter__9, fmt);
      }
      return caml_trampoline_return(fmtty_of_fmt__0, [0,fmt]);
    case 7:
      if (counter < 50) {
        var counter__10 = counter + 1 | 0;
        return fmtty_of_fmt__0(counter__10, fmt);
      }
      return caml_trampoline_return(fmtty_of_fmt__0, [0,fmt]);
    case 8:
      if (counter < 50) {
        var counter__11 = counter + 1 | 0;
        return fmtty_of_fmt__0(counter__11, fmt);
      }
      return caml_trampoline_return(fmtty_of_fmt__0, [0,fmt]);
    case 9:
      var fmtty = ign[2];
      var dK_ = fmtty_of_fmt(fmt);
      return call2(CamlinternalFormatBasics[1], fmtty, dK_);
    case 10:
      if (counter < 50) {
        var counter__12 = counter + 1 | 0;
        return fmtty_of_fmt__0(counter__12, fmt);
      }
      return caml_trampoline_return(fmtty_of_fmt__0, [0,fmt]);
    default:
      if (counter < 50) {
        var counter__13 = counter + 1 | 0;
        return fmtty_of_fmt__0(counter__13, fmt);
      }
      return caml_trampoline_return(fmtty_of_fmt__0, [0,fmt])
    }
}

function fmtty_of_fmt(fmtty) {
  return caml_trampoline(fmtty_of_fmt__0(0, fmtty));
}

function fmtty_of_formatting_gen(formatting_gen) {
  if (0 === formatting_gen[0]) {
    var match = formatting_gen[1];
    var fmt = match[1];
    return fmtty_of_fmt(fmt);
  }
  var match__0 = formatting_gen[1];
  var fmt__0 = match__0[1];
  return fmtty_of_fmt(fmt__0);
}

function fmtty_of_precision_fmtty(prec, fmtty) {
  return typeof prec === "number" ? 0 === prec ? fmtty : [2,fmtty] : fmtty;
}

var Type_mismatch = [
  248,
  cst_CamlinternalFormat_Type_mismatch,
  runtime["caml_fresh_oo_id"](0)
];

function type_padding(pad, match) {
  if (typeof pad === "number") return [0,0,match];
  else {
    if (0 === pad[0]) {
      var w = pad[2];
      var padty = pad[1];
      return [0,[0,padty,w],match];
    }
    if (! (typeof match === "number") && 2 === match[0]) {
      var rest = match[1];
      var padty__0 = pad[1];
      return [0,[1,padty__0],rest];
    }
    throw caml_wrap_thrown_exception(Type_mismatch);
  }
}

function type_padprec(pad, prec, fmtty) {
  var match = type_padding(pad, fmtty);
  if (typeof prec === "number") {
    if (0 === prec) {
      var rest = match[2];
      var pad__0 = match[1];
      return [0,pad__0,0,rest];
    }
    var dJ_ = match[2];
    if (! (typeof dJ_ === "number") && 2 === dJ_[0]) {
      var rest__0 = dJ_[1];
      var pad__1 = match[1];
      return [0,pad__1,1,rest__0];
    }
    throw caml_wrap_thrown_exception(Type_mismatch);
  }
  var rest__1 = match[2];
  var pad__2 = match[1];
  var p = prec[1];
  return [0,pad__2,[0,p],rest__1];
}

function type_format(fmt, fmtty) {
  var dI_ = type_format_gen(fmt, fmtty);
  if (typeof dI_[2] === "number") {var fmt__0 = dI_[1];return fmt__0;}
  throw caml_wrap_thrown_exception(Type_mismatch);
}

function type_ignored_param_one(ign, fmt, fmtty) {
  var match = type_format_gen(fmt, fmtty);
  var fmtty__0 = match[2];
  var fmt__0 = match[1];
  return [0,[23,ign,fmt__0],fmtty__0];
}

function type_ignored_param(ign, fmt, fmtty) {
  if (typeof ign === "number") switch (ign) {
    case 0:
      return type_ignored_param_one(ign, fmt, fmtty);
    case 1:
      return type_ignored_param_one(ign, fmt, fmtty);
    case 2:
      if (! (typeof fmtty === "number") && 14 === fmtty[0]) {
        var fmtty_rest = fmtty[1];
        var match = type_format_gen(fmt, fmtty_rest);
        var fmtty__0 = match[2];
        var fmt__0 = match[1];
        return [0,[23,2,fmt__0],fmtty__0];
      }
      throw caml_wrap_thrown_exception(Type_mismatch);
    default:
      return type_ignored_param_one(ign, fmt, fmtty)
    }
  else switch (ign[0]) {
    case 0:
      return type_ignored_param_one(ign, fmt, fmtty);
    case 1:
      return type_ignored_param_one(ign, fmt, fmtty);
    case 2:
      return type_ignored_param_one(ign, fmt, fmtty);
    case 3:
      return type_ignored_param_one(ign, fmt, fmtty);
    case 4:
      return type_ignored_param_one(ign, fmt, fmtty);
    case 5:
      return type_ignored_param_one(ign, fmt, fmtty);
    case 6:
      return type_ignored_param_one(ign, fmt, fmtty);
    case 7:
      return type_ignored_param_one(ign, fmt, fmtty);
    case 8:
      var sub_fmtty = ign[2];
      var pad_opt = ign[1];
      return type_ignored_param_one([8,pad_opt,sub_fmtty], fmt, fmtty);
    case 9:
      var sub_fmtty__0 = ign[2];
      var pad_opt__0 = ign[1];
      var dH_ = type_ignored_format_substitution(sub_fmtty__0, fmt, fmtty);
      var match__0 = dH_[2];
      var fmtty__1 = match__0[2];
      var fmt__1 = match__0[1];
      var sub_fmtty__1 = dH_[1];
      return [0,[23,[9,pad_opt__0,sub_fmtty__1],fmt__1],fmtty__1];
    case 10:
      return type_ignored_param_one(ign, fmt, fmtty);
    default:
      return type_ignored_param_one(ign, fmt, fmtty)
    }
}

function type_formatting_gen(formatting_gen, fmt0, fmtty0) {
  if (0 === formatting_gen[0]) {
    var match = formatting_gen[1];
    var str = match[2];
    var fmt1 = match[1];
    var match__0 = type_format_gen(fmt1, fmtty0);
    var fmtty2 = match__0[2];
    var fmt2 = match__0[1];
    var match__1 = type_format_gen(fmt0, fmtty2);
    var fmtty3 = match__1[2];
    var fmt3 = match__1[1];
    return [0,[18,[0,[0,fmt2,str]],fmt3],fmtty3];
  }
  var match__2 = formatting_gen[1];
  var str__0 = match__2[2];
  var fmt1__0 = match__2[1];
  var match__3 = type_format_gen(fmt1__0, fmtty0);
  var fmtty2__0 = match__3[2];
  var fmt2__0 = match__3[1];
  var match__4 = type_format_gen(fmt0, fmtty2__0);
  var fmtty3__0 = match__4[2];
  var fmt3__0 = match__4[1];
  return [0,[18,[1,[0,fmt2__0,str__0]],fmt3__0],fmtty3__0];
}

function type_format_gen(fmt, match) {
  if (typeof fmt === "number") return [0,0,match];
  else switch (fmt[0]) {
    case 0:
      if (! (typeof match === "number") && 0 === match[0]) {
        var fmtty_rest = match[1];
        var fmt_rest = fmt[1];
        var match__0 = type_format_gen(fmt_rest, fmtty_rest);
        var fmtty = match__0[2];
        var fmt__0 = match__0[1];
        return [0,[0,fmt__0],fmtty];
      }
      break;
    case 1:
      if (! (typeof match === "number") && 0 === match[0]) {
        var fmtty_rest__0 = match[1];
        var fmt_rest__0 = fmt[1];
        var match__1 = type_format_gen(fmt_rest__0, fmtty_rest__0);
        var fmtty__0 = match__1[2];
        var fmt__1 = match__1[1];
        return [0,[1,fmt__1],fmtty__0];
      }
      break;
    case 2:
      var fmt_rest__1 = fmt[2];
      var pad = fmt[1];
      var dd_ = type_padding(pad, match);
      var de_ = dd_[2];
      var df_ = dd_[1];
      if (! (typeof de_ === "number") && 1 === de_[0]) {
        var fmtty_rest__1 = de_[1];
        var match__2 = type_format_gen(fmt_rest__1, fmtty_rest__1);
        var fmtty__1 = match__2[2];
        var fmt__2 = match__2[1];
        return [0,[2,df_,fmt__2],fmtty__1];
      }
      throw caml_wrap_thrown_exception(Type_mismatch);
    case 3:
      var fmt_rest__2 = fmt[2];
      var pad__0 = fmt[1];
      var dg_ = type_padding(pad__0, match);
      var dh_ = dg_[2];
      var di_ = dg_[1];
      if (! (typeof dh_ === "number") && 1 === dh_[0]) {
        var fmtty_rest__2 = dh_[1];
        var match__3 = type_format_gen(fmt_rest__2, fmtty_rest__2);
        var fmtty__2 = match__3[2];
        var fmt__3 = match__3[1];
        return [0,[3,di_,fmt__3],fmtty__2];
      }
      throw caml_wrap_thrown_exception(Type_mismatch);
    case 4:
      var fmt_rest__3 = fmt[4];
      var prec = fmt[3];
      var pad__1 = fmt[2];
      var iconv = fmt[1];
      var dj_ = type_padprec(pad__1, prec, match);
      var dk_ = dj_[3];
      var dl_ = dj_[2];
      var dm_ = dj_[1];
      if (! (typeof dk_ === "number") && 2 === dk_[0]) {
        var fmtty_rest__3 = dk_[1];
        var match__4 = type_format_gen(fmt_rest__3, fmtty_rest__3);
        var fmtty__3 = match__4[2];
        var fmt__4 = match__4[1];
        return [0,[4,iconv,dm_,dl_,fmt__4],fmtty__3];
      }
      throw caml_wrap_thrown_exception(Type_mismatch);
    case 5:
      var fmt_rest__4 = fmt[4];
      var prec__0 = fmt[3];
      var pad__2 = fmt[2];
      var iconv__0 = fmt[1];
      var dn_ = type_padprec(pad__2, prec__0, match);
      var do_ = dn_[3];
      var dp_ = dn_[2];
      var dq_ = dn_[1];
      if (! (typeof do_ === "number") && 3 === do_[0]) {
        var fmtty_rest__4 = do_[1];
        var match__5 = type_format_gen(fmt_rest__4, fmtty_rest__4);
        var fmtty__4 = match__5[2];
        var fmt__5 = match__5[1];
        return [0,[5,iconv__0,dq_,dp_,fmt__5],fmtty__4];
      }
      throw caml_wrap_thrown_exception(Type_mismatch);
    case 6:
      var fmt_rest__5 = fmt[4];
      var prec__1 = fmt[3];
      var pad__3 = fmt[2];
      var iconv__1 = fmt[1];
      var dr_ = type_padprec(pad__3, prec__1, match);
      var ds_ = dr_[3];
      var dt_ = dr_[2];
      var du_ = dr_[1];
      if (! (typeof ds_ === "number") && 4 === ds_[0]) {
        var fmtty_rest__5 = ds_[1];
        var match__6 = type_format_gen(fmt_rest__5, fmtty_rest__5);
        var fmtty__5 = match__6[2];
        var fmt__6 = match__6[1];
        return [0,[6,iconv__1,du_,dt_,fmt__6],fmtty__5];
      }
      throw caml_wrap_thrown_exception(Type_mismatch);
    case 7:
      var fmt_rest__6 = fmt[4];
      var prec__2 = fmt[3];
      var pad__4 = fmt[2];
      var iconv__2 = fmt[1];
      var dv_ = type_padprec(pad__4, prec__2, match);
      var dw_ = dv_[3];
      var dx_ = dv_[2];
      var dy_ = dv_[1];
      if (! (typeof dw_ === "number") && 5 === dw_[0]) {
        var fmtty_rest__6 = dw_[1];
        var match__7 = type_format_gen(fmt_rest__6, fmtty_rest__6);
        var fmtty__6 = match__7[2];
        var fmt__7 = match__7[1];
        return [0,[7,iconv__2,dy_,dx_,fmt__7],fmtty__6];
      }
      throw caml_wrap_thrown_exception(Type_mismatch);
    case 8:
      var fmt_rest__7 = fmt[4];
      var prec__3 = fmt[3];
      var pad__5 = fmt[2];
      var fconv = fmt[1];
      var dz_ = type_padprec(pad__5, prec__3, match);
      var dA_ = dz_[3];
      var dB_ = dz_[2];
      var dC_ = dz_[1];
      if (! (typeof dA_ === "number") && 6 === dA_[0]) {
        var fmtty_rest__7 = dA_[1];
        var match__8 = type_format_gen(fmt_rest__7, fmtty_rest__7);
        var fmtty__7 = match__8[2];
        var fmt__8 = match__8[1];
        return [0,[8,fconv,dC_,dB_,fmt__8],fmtty__7];
      }
      throw caml_wrap_thrown_exception(Type_mismatch);
    case 9:
      var fmt_rest__8 = fmt[2];
      var pad__6 = fmt[1];
      var dD_ = type_padding(pad__6, match);
      var dE_ = dD_[2];
      var dF_ = dD_[1];
      if (! (typeof dE_ === "number") && 7 === dE_[0]) {
        var fmtty_rest__8 = dE_[1];
        var match__9 = type_format_gen(fmt_rest__8, fmtty_rest__8);
        var fmtty__8 = match__9[2];
        var fmt__9 = match__9[1];
        return [0,[9,dF_,fmt__9],fmtty__8];
      }
      throw caml_wrap_thrown_exception(Type_mismatch);
    case 10:
      var fmt_rest__9 = fmt[1];
      var match__10 = type_format_gen(fmt_rest__9, match);
      var fmtty__9 = match__10[2];
      var fmt__10 = match__10[1];
      return [0,[10,fmt__10],fmtty__9];
    case 11:
      var fmt_rest__10 = fmt[2];
      var str = fmt[1];
      var match__11 = type_format_gen(fmt_rest__10, match);
      var fmtty__10 = match__11[2];
      var fmt__11 = match__11[1];
      return [0,[11,str,fmt__11],fmtty__10];
    case 12:
      var fmt_rest__11 = fmt[2];
      var chr = fmt[1];
      var match__12 = type_format_gen(fmt_rest__11, match);
      var fmtty__11 = match__12[2];
      var fmt__12 = match__12[1];
      return [0,[12,chr,fmt__12],fmtty__11];
    case 13:
      if (! (typeof match === "number") && 8 === match[0]) {
        var fmtty_rest__9 = match[2];
        var sub_fmtty = match[1];
        var fmt_rest__12 = fmt[3];
        var sub_fmtty__0 = fmt[2];
        var pad_opt = fmt[1];
        if (caml_notequal([0,sub_fmtty__0], [0,sub_fmtty])) {throw caml_wrap_thrown_exception(Type_mismatch);}
        var match__13 = type_format_gen(fmt_rest__12, fmtty_rest__9);
        var fmtty__12 = match__13[2];
        var fmt__13 = match__13[1];
        return [0,[13,pad_opt,sub_fmtty,fmt__13],fmtty__12];
      }
      break;
    case 14:
      if (! (typeof match === "number") && 9 === match[0]) {
        var fmtty_rest__10 = match[3];
        var sub_fmtty1 = match[1];
        var fmt_rest__13 = fmt[3];
        var sub_fmtty__1 = fmt[2];
        var pad_opt__0 = fmt[1];
        var dG_ = [0,call1(CamlinternalFormatBasics[2], sub_fmtty1)];
        if (
        caml_notequal(
          [0,call1(CamlinternalFormatBasics[2], sub_fmtty__1)],
          dG_
        )
        ) {throw caml_wrap_thrown_exception(Type_mismatch);}
        var match__14 = type_format_gen(
          fmt_rest__13,
          call1(CamlinternalFormatBasics[2], fmtty_rest__10)
        );
        var fmtty__13 = match__14[2];
        var fmt__14 = match__14[1];
        return [0,[14,pad_opt__0,sub_fmtty1,fmt__14],fmtty__13];
      }
      break;
    case 15:
      if (! (typeof match === "number") && 10 === match[0]) {
        var fmtty_rest__11 = match[1];
        var fmt_rest__14 = fmt[1];
        var match__15 = type_format_gen(fmt_rest__14, fmtty_rest__11);
        var fmtty__14 = match__15[2];
        var fmt__15 = match__15[1];
        return [0,[15,fmt__15],fmtty__14];
      }
      break;
    case 16:
      if (! (typeof match === "number") && 11 === match[0]) {
        var fmtty_rest__12 = match[1];
        var fmt_rest__15 = fmt[1];
        var match__16 = type_format_gen(fmt_rest__15, fmtty_rest__12);
        var fmtty__15 = match__16[2];
        var fmt__16 = match__16[1];
        return [0,[16,fmt__16],fmtty__15];
      }
      break;
    case 17:
      var fmt_rest__16 = fmt[2];
      var formatting_lit = fmt[1];
      var match__17 = type_format_gen(fmt_rest__16, match);
      var fmtty__16 = match__17[2];
      var fmt__17 = match__17[1];
      return [0,[17,formatting_lit,fmt__17],fmtty__16];
    case 18:
      var fmt_rest__17 = fmt[2];
      var formatting_gen = fmt[1];
      return type_formatting_gen(formatting_gen, fmt_rest__17, match);
    case 19:
      if (! (typeof match === "number") && 13 === match[0]) {
        var fmtty_rest__13 = match[1];
        var fmt_rest__18 = fmt[1];
        var match__18 = type_format_gen(fmt_rest__18, fmtty_rest__13);
        var fmtty__17 = match__18[2];
        var fmt__18 = match__18[1];
        return [0,[19,fmt__18],fmtty__17];
      }
      break;
    case 20:
      if (! (typeof match === "number") && 1 === match[0]) {
        var fmtty_rest__14 = match[1];
        var fmt_rest__19 = fmt[3];
        var char_set = fmt[2];
        var width_opt = fmt[1];
        var match__19 = type_format_gen(fmt_rest__19, fmtty_rest__14);
        var fmtty__18 = match__19[2];
        var fmt__19 = match__19[1];
        return [0,[20,width_opt,char_set,fmt__19],fmtty__18];
      }
      break;
    case 21:
      if (! (typeof match === "number") && 2 === match[0]) {
        var fmtty_rest__15 = match[1];
        var fmt_rest__20 = fmt[2];
        var counter = fmt[1];
        var match__20 = type_format_gen(fmt_rest__20, fmtty_rest__15);
        var fmtty__19 = match__20[2];
        var fmt__20 = match__20[1];
        return [0,[21,counter,fmt__20],fmtty__19];
      }
      break;
    case 23:
      var rest = fmt[2];
      var ign = fmt[1];
      return type_ignored_param(ign, rest, match)
    }
  throw caml_wrap_thrown_exception(Type_mismatch);
}

function type_ignored_format_substitution(sub_fmtty, fmt, match) {
  if (typeof sub_fmtty === "number") return [
    0,
    0,
    type_format_gen(fmt, match)
  ];
  else switch (sub_fmtty[0]) {
    case 0:
      if (! (typeof match === "number") && 0 === match[0]) {
        var fmtty_rest = match[1];
        var sub_fmtty_rest = sub_fmtty[1];
        var match__0 = type_ignored_format_substitution(
          sub_fmtty_rest,
          fmt,
          fmtty_rest
        );
        var fmt__0 = match__0[2];
        var sub_fmtty_rest__0 = match__0[1];
        return [0,[0,sub_fmtty_rest__0],fmt__0];
      }
      break;
    case 1:
      if (! (typeof match === "number") && 1 === match[0]) {
        var fmtty_rest__0 = match[1];
        var sub_fmtty_rest__1 = sub_fmtty[1];
        var match__1 = type_ignored_format_substitution(
          sub_fmtty_rest__1,
          fmt,
          fmtty_rest__0
        );
        var fmt__1 = match__1[2];
        var sub_fmtty_rest__2 = match__1[1];
        return [0,[1,sub_fmtty_rest__2],fmt__1];
      }
      break;
    case 2:
      if (! (typeof match === "number") && 2 === match[0]) {
        var fmtty_rest__1 = match[1];
        var sub_fmtty_rest__3 = sub_fmtty[1];
        var match__2 = type_ignored_format_substitution(
          sub_fmtty_rest__3,
          fmt,
          fmtty_rest__1
        );
        var fmt__2 = match__2[2];
        var sub_fmtty_rest__4 = match__2[1];
        return [0,[2,sub_fmtty_rest__4],fmt__2];
      }
      break;
    case 3:
      if (! (typeof match === "number") && 3 === match[0]) {
        var fmtty_rest__2 = match[1];
        var sub_fmtty_rest__5 = sub_fmtty[1];
        var match__3 = type_ignored_format_substitution(
          sub_fmtty_rest__5,
          fmt,
          fmtty_rest__2
        );
        var fmt__3 = match__3[2];
        var sub_fmtty_rest__6 = match__3[1];
        return [0,[3,sub_fmtty_rest__6],fmt__3];
      }
      break;
    case 4:
      if (! (typeof match === "number") && 4 === match[0]) {
        var fmtty_rest__3 = match[1];
        var sub_fmtty_rest__7 = sub_fmtty[1];
        var match__4 = type_ignored_format_substitution(
          sub_fmtty_rest__7,
          fmt,
          fmtty_rest__3
        );
        var fmt__4 = match__4[2];
        var sub_fmtty_rest__8 = match__4[1];
        return [0,[4,sub_fmtty_rest__8],fmt__4];
      }
      break;
    case 5:
      if (! (typeof match === "number") && 5 === match[0]) {
        var fmtty_rest__4 = match[1];
        var sub_fmtty_rest__9 = sub_fmtty[1];
        var match__5 = type_ignored_format_substitution(
          sub_fmtty_rest__9,
          fmt,
          fmtty_rest__4
        );
        var fmt__5 = match__5[2];
        var sub_fmtty_rest__10 = match__5[1];
        return [0,[5,sub_fmtty_rest__10],fmt__5];
      }
      break;
    case 6:
      if (! (typeof match === "number") && 6 === match[0]) {
        var fmtty_rest__5 = match[1];
        var sub_fmtty_rest__11 = sub_fmtty[1];
        var match__6 = type_ignored_format_substitution(
          sub_fmtty_rest__11,
          fmt,
          fmtty_rest__5
        );
        var fmt__6 = match__6[2];
        var sub_fmtty_rest__12 = match__6[1];
        return [0,[6,sub_fmtty_rest__12],fmt__6];
      }
      break;
    case 7:
      if (! (typeof match === "number") && 7 === match[0]) {
        var fmtty_rest__6 = match[1];
        var sub_fmtty_rest__13 = sub_fmtty[1];
        var match__7 = type_ignored_format_substitution(
          sub_fmtty_rest__13,
          fmt,
          fmtty_rest__6
        );
        var fmt__7 = match__7[2];
        var sub_fmtty_rest__14 = match__7[1];
        return [0,[7,sub_fmtty_rest__14],fmt__7];
      }
      break;
    case 8:
      if (! (typeof match === "number") && 8 === match[0]) {
        var fmtty_rest__7 = match[2];
        var sub2_fmtty = match[1];
        var sub_fmtty_rest__15 = sub_fmtty[2];
        var sub2_fmtty__0 = sub_fmtty[1];
        if (caml_notequal([0,sub2_fmtty__0], [0,sub2_fmtty])) {throw caml_wrap_thrown_exception(Type_mismatch);}
        var match__8 = type_ignored_format_substitution(
          sub_fmtty_rest__15,
          fmt,
          fmtty_rest__7
        );
        var fmt__8 = match__8[2];
        var sub_fmtty_rest__16 = match__8[1];
        return [0,[8,sub2_fmtty,sub_fmtty_rest__16],fmt__8];
      }
      break;
    case 9:
      if (! (typeof match === "number") && 9 === match[0]) {
        var fmtty_rest__8 = match[3];
        var sub2_fmtty__1 = match[2];
        var sub1_fmtty = match[1];
        var sub_fmtty_rest__17 = sub_fmtty[3];
        var sub2_fmtty__2 = sub_fmtty[2];
        var sub1_fmtty__0 = sub_fmtty[1];
        var db_ = [0,call1(CamlinternalFormatBasics[2], sub1_fmtty)];
        if (
        caml_notequal(
          [0,call1(CamlinternalFormatBasics[2], sub1_fmtty__0)],
          db_
        )
        ) {throw caml_wrap_thrown_exception(Type_mismatch);}
        var dc_ = [0,call1(CamlinternalFormatBasics[2], sub2_fmtty__1)];
        if (
        caml_notequal(
          [0,call1(CamlinternalFormatBasics[2], sub2_fmtty__2)],
          dc_
        )
        ) {throw caml_wrap_thrown_exception(Type_mismatch);}
        var sub_fmtty__0 = trans(symm(sub1_fmtty), sub2_fmtty__1);
        var match__9 = fmtty_rel_det(sub_fmtty__0);
        var f4 = match__9[4];
        var f2 = match__9[2];
        call1(f2, 0);
        call1(f4, 0);
        var match__10 = type_ignored_format_substitution(
          call1(CamlinternalFormatBasics[2], sub_fmtty_rest__17),
          fmt,
          fmtty_rest__8
        );
        var fmt__9 = match__10[2];
        var sub_fmtty_rest__18 = match__10[1];
        return [0,[9,sub1_fmtty,sub2_fmtty__1,symm(sub_fmtty_rest__18)],fmt__9
        ];
      }
      break;
    case 10:
      if (! (typeof match === "number") && 10 === match[0]) {
        var fmtty_rest__9 = match[1];
        var sub_fmtty_rest__19 = sub_fmtty[1];
        var match__11 = type_ignored_format_substitution(
          sub_fmtty_rest__19,
          fmt,
          fmtty_rest__9
        );
        var fmt__10 = match__11[2];
        var sub_fmtty_rest__20 = match__11[1];
        return [0,[10,sub_fmtty_rest__20],fmt__10];
      }
      break;
    case 11:
      if (! (typeof match === "number") && 11 === match[0]) {
        var fmtty_rest__10 = match[1];
        var sub_fmtty_rest__21 = sub_fmtty[1];
        var match__12 = type_ignored_format_substitution(
          sub_fmtty_rest__21,
          fmt,
          fmtty_rest__10
        );
        var fmt__11 = match__12[2];
        var sub_fmtty_rest__22 = match__12[1];
        return [0,[11,sub_fmtty_rest__22],fmt__11];
      }
      break;
    case 13:
      if (! (typeof match === "number") && 13 === match[0]) {
        var fmtty_rest__11 = match[1];
        var sub_fmtty_rest__23 = sub_fmtty[1];
        var match__13 = type_ignored_format_substitution(
          sub_fmtty_rest__23,
          fmt,
          fmtty_rest__11
        );
        var fmt__12 = match__13[2];
        var sub_fmtty_rest__24 = match__13[1];
        return [0,[13,sub_fmtty_rest__24],fmt__12];
      }
      break;
    case 14:
      if (! (typeof match === "number") && 14 === match[0]) {
        var fmtty_rest__12 = match[1];
        var sub_fmtty_rest__25 = sub_fmtty[1];
        var match__14 = type_ignored_format_substitution(
          sub_fmtty_rest__25,
          fmt,
          fmtty_rest__12
        );
        var fmt__13 = match__14[2];
        var sub_fmtty_rest__26 = match__14[1];
        return [0,[14,sub_fmtty_rest__26],fmt__13];
      }
      break
    }
  throw caml_wrap_thrown_exception(Type_mismatch);
}

function recast(fmt, fmtty) {
  var da_ = symm(fmtty);
  return type_format(fmt, call1(CamlinternalFormatBasics[2], da_));
}

function fix_padding(padty, width, str) {
  var len = caml_ml_string_length(str);
  var padty__0 = 0 <= width ? padty : 0;
  var width__0 = call1(Stdlib[18], width);
  if (width__0 <= len) {return str;}
  var c__ = 2 === padty__0 ? 48 : 32;
  var res = call2(Stdlib_bytes[1], width__0, c__);
  switch (padty__0) {
    case 0:
      call5(Stdlib_string[6], str, 0, res, 0, len);
      break;
    case 1:
      call5(Stdlib_string[6], str, 0, res, width__0 - len | 0, len);
      break;
    default:
      if (0 < len) {
        if (43 === caml_string_get(str, 0)) var switch__1 = 1;
        else if (45 === caml_string_get(str, 0)) var switch__1 = 1;
        else if (32 === caml_string_get(str, 0)) var switch__1 = 1;
        else {var switch__0 = 0;var switch__1 = 0;}
        if (switch__1) {
          caml_bytes_set(res, 0, caml_string_get(str, 0));
          call5(
            Stdlib_string[6],
            str,
            1,
            res,
            (width__0 - len | 0) + 1 | 0,
            len + -1 | 0
          );
          var switch__0 = 1;
        }
      }
      else var switch__0 = 0;
      if (! switch__0) {
        if (1 < len) if (
          48 === caml_string_get(str, 0)
        ) {
          if (120 === caml_string_get(str, 1)) var switch__3 = 1;
          else if (88 === caml_string_get(str, 1)) var switch__3 = 1;
          else {var switch__2 = 0;var switch__3 = 0;}
          if (switch__3) {
            caml_bytes_set(res, 1, caml_string_get(str, 1));
            call5(
              Stdlib_string[6],
              str,
              2,
              res,
              (width__0 - len | 0) + 2 | 0,
              len + -2 | 0
            );
            var switch__2 = 1;
          }
        }
        else var switch__2 = 0;
        else var switch__2 = 0;
        if (! switch__2) {
          call5(Stdlib_string[6], str, 0, res, width__0 - len | 0, len);
        }
      }
    }
  return call1(Stdlib_bytes[42], res);
}

function fix_int_precision(prec, str) {
  var prec__0 = call1(Stdlib[18], prec);
  var len = caml_ml_string_length(str);
  var c = caml_string_get(str, 0);
  if (58 <= c) var switch__0 = 71 <=
     c ?
    5 < (c + -97 | 0) >>> 0 ? 1 : 0 :
    65 <= c ? 0 : 1;
  else {
    if (32 === c) var switch__1 = 1;
    else if (43 <= c) {
      var switcher = c + -43 | 0;
      switch (switcher) {
        case 5:
          if (len < (prec__0 + 2 | 0)) {
            if (1 < len) {
              var switch__2 = 120 === caml_string_get(str, 1) ?
                0 :
                88 === caml_string_get(str, 1) ? 0 : 1;
              if (! switch__2) {
                var res__1 = call2(Stdlib_bytes[1], prec__0 + 2 | 0, 48);
                caml_bytes_set(res__1, 1, caml_string_get(str, 1));
                call5(
                  Stdlib_string[6],
                  str,
                  2,
                  res__1,
                  (prec__0 - len | 0) + 4 | 0,
                  len + -2 | 0
                );
                return call1(Stdlib_bytes[42], res__1);
              }
            }
          }
          var switch__0 = 0;
          var switch__1 = 0;
          break;
        case 0:
        case 2:
          var switch__1 = 1;
          break;
        case 1:
        case 3:
        case 4:
          var switch__0 = 1;
          var switch__1 = 0;
          break;
        default:
          var switch__0 = 0;
          var switch__1 = 0
        }
    }
    else {var switch__0 = 1;var switch__1 = 0;}
    if (switch__1) {
      if (len < (prec__0 + 1 | 0)) {
        var res__0 = call2(Stdlib_bytes[1], prec__0 + 1 | 0, 48);
        caml_bytes_set(res__0, 0, c);
        call5(
          Stdlib_string[6],
          str,
          1,
          res__0,
          (prec__0 - len | 0) + 2 | 0,
          len + -1 | 0
        );
        return call1(Stdlib_bytes[42], res__0);
      }
      var switch__0 = 1;
    }
  }
  if (! switch__0) {
    if (len < prec__0) {
      var res = call2(Stdlib_bytes[1], prec__0, 48);
      call5(Stdlib_string[6], str, 0, res, prec__0 - len | 0, len);
      return call1(Stdlib_bytes[42], res);
    }
  }
  return str;
}

function string_to_caml_string(str) {
  var str__0 = call1(Stdlib_string[13], str);
  var l = caml_ml_string_length(str__0);
  var res = call2(Stdlib_bytes[1], l + 2 | 0, 34);
  caml_blit_string(str__0, 0, res, 1, l);
  return call1(Stdlib_bytes[42], res);
}

function format_of_iconv(param) {
  switch (param) {
    case 1:
      return cst_d__0;
    case 2:
      return cst_d__1;
    case 4:
      return cst_i__1;
    case 5:
      return cst_i__2;
    case 6:
      return cst_x;
    case 7:
      return cst_x__0;
    case 8:
      return cst_X;
    case 9:
      return cst_X__0;
    case 10:
      return cst_o;
    case 11:
      return cst_o__0;
    case 0:
    case 13:
      return cst_d;
    case 3:
    case 14:
      return cst_i__0;
    default:
      return cst_u
    }
}

function format_of_iconvL(param) {
  switch (param) {
    case 1:
      return cst_Ld__0;
    case 2:
      return cst_Ld__1;
    case 4:
      return cst_Li__1;
    case 5:
      return cst_Li__2;
    case 6:
      return cst_Lx;
    case 7:
      return cst_Lx__0;
    case 8:
      return cst_LX;
    case 9:
      return cst_LX__0;
    case 10:
      return cst_Lo;
    case 11:
      return cst_Lo__0;
    case 0:
    case 13:
      return cst_Ld;
    case 3:
    case 14:
      return cst_Li__0;
    default:
      return cst_Lu
    }
}

function format_of_iconvl(param) {
  switch (param) {
    case 1:
      return cst_ld__0;
    case 2:
      return cst_ld__1;
    case 4:
      return cst_li__1;
    case 5:
      return cst_li__2;
    case 6:
      return cst_lx;
    case 7:
      return cst_lx__0;
    case 8:
      return cst_lX;
    case 9:
      return cst_lX__0;
    case 10:
      return cst_lo;
    case 11:
      return cst_lo__0;
    case 0:
    case 13:
      return cst_ld;
    case 3:
    case 14:
      return cst_li__0;
    default:
      return cst_lu
    }
}

function format_of_iconvn(param) {
  switch (param) {
    case 1:
      return cst_nd__0;
    case 2:
      return cst_nd__1;
    case 4:
      return cst_ni__1;
    case 5:
      return cst_ni__2;
    case 6:
      return cst_nx;
    case 7:
      return cst_nx__0;
    case 8:
      return cst_nX;
    case 9:
      return cst_nX__0;
    case 10:
      return cst_no;
    case 11:
      return cst_no__0;
    case 0:
    case 13:
      return cst_nd;
    case 3:
    case 14:
      return cst_ni__0;
    default:
      return cst_nu
    }
}

function format_of_fconv(fconv, prec) {
  if (15 === fconv) {return cst_12g;}
  var prec__0 = call1(Stdlib[18], prec);
  var symb = char_of_fconv(fconv);
  var buf = buffer_create(16);
  buffer_add_char(buf, 37);
  bprint_fconv_flag(buf, fconv);
  buffer_add_char(buf, 46);
  buffer_add_string(buf, call1(Stdlib_int[10], prec__0));
  buffer_add_char(buf, symb);
  return buffer_contents(buf);
}

function transform_int_alt(iconv, s) {
  if (13 <= iconv) {
    var n = [0,0];
    var c5_ = caml_ml_string_length(s) + -1 | 0;
    var c4_ = 0;
    if (! (c5_ < 0)) {
      var i__0 = c4_;
      for (; ; ) {
        var match = caml_string_unsafe_get(s, i__0);
        var switcher__0 = match + -48 | 0;
        if (! (9 < switcher__0 >>> 0)) {n[1] += 1;}
        var c9_ = i__0 + 1 | 0;
        if (c5_ !== i__0) {var i__0 = c9_;continue;}
        break;
      }
    }
    var digits = n[1];
    var buf = caml_create_bytes(
      caml_ml_string_length(s) + ((digits + -1 | 0) / 3 | 0) | 0
    );
    var pos = [0,0];
    var put = function(c) {
      caml_bytes_set(buf, pos[1], c);
      pos[1] += 1;
      return 0;
    };
    var left = [0,((digits + -1 | 0) % 3 | 0) + 1 | 0];
    var c7_ = caml_ml_string_length(s) + -1 | 0;
    var c6_ = 0;
    if (! (c7_ < 0)) {
      var i = c6_;
      for (; ; ) {
        var c = caml_string_unsafe_get(s, i);
        var switcher = c + -48 | 0;
        if (9 < switcher >>> 0) put(c);
        else {if (0 === left[1]) {put(95);left[1] = 3;}left[1] += -1;put(c);}
        var c8_ = i + 1 | 0;
        if (c7_ !== i) {var i = c8_;continue;}
        break;
      }
    }
    return call1(Stdlib_bytes[42], buf);
  }
  return s;
}

function convert_int(iconv, n) {
  return transform_int_alt(iconv, caml_format_int(format_of_iconv(iconv), n));
}

function convert_int32(iconv, n) {
  return transform_int_alt(iconv, caml_format_int(format_of_iconvl(iconv), n));
}

function convert_nativeint(iconv, n) {
  return transform_int_alt(iconv, caml_format_int(format_of_iconvn(iconv), n));
}

function convert_int64(iconv, n) {
  return transform_int_alt(
    iconv,
    runtime["caml_int64_format"](format_of_iconvL(iconv), n)
  );
}

function convert_float(fconv, prec, x) {
  if (16 <= fconv) {
    if (17 <= fconv) switch (
      fconv + -17 | 0
    ) {
      case 2:
        var switch__0 = 0;
        break;
      case 0:
      case 3:
        var sign = 43;
        var switch__0 = 1;
        break;
      default:
        var sign = 32;
        var switch__0 = 1
      }
    else var switch__0 = 0;
    if (! switch__0) {var sign = 45;}
    var str = runtime["caml_hexstring_of_float"](x, prec, sign);
    return 19 <= fconv ? call1(Stdlib_string[29], str) : str;
  }
  var str__0 = runtime["caml_format_float"](format_of_fconv(fconv, prec), x);
  if (15 === fconv) {
    var len = caml_ml_string_length(str__0);
    var is_valid = function(i) {
      var i__0 = i;
      for (; ; ) {
        if (i__0 === len) {return 0;}
        var match = caml_string_get(str__0, i__0);
        var c3_ = match + -46 | 0;
        var switch__0 = 23 < c3_ >>> 0 ?
          55 === c3_ ? 1 : 0 :
          21 < (c3_ + -1 | 0) >>> 0 ? 1 : 0;
        if (switch__0) {return 1;}
        var i__1 = i__0 + 1 | 0;
        var i__0 = i__1;
        continue;
      }
    };
    var match = runtime["caml_classify_float"](x);
    return 3 === match ?
      x < 0 ? cst_neg_infinity : cst_infinity :
      4 <= match ?
       cst_nan :
       is_valid(0) ? str__0 : call2(Stdlib[28], str__0, cst__16);
  }
  return str__0;
}

function format_caml_char(c) {
  var str = call1(Stdlib_char[2], c);
  var l = caml_ml_string_length(str);
  var res = call2(Stdlib_bytes[1], l + 2 | 0, 39);
  caml_blit_string(str, 0, res, 1, l);
  return call1(Stdlib_bytes[42], res);
}

function string_of_fmtty(fmtty) {
  var buf = buffer_create(16);
  bprint_fmtty(buf, fmtty);
  return buffer_contents(buf);
}

function make_float_padding_precision(k, acc, fmt, pad, match, fconv) {
  if (typeof pad === "number") {
    if (typeof match === "number") {
      return 0 === match ?
        function(x) {
         var str = convert_float(fconv, default_float_precision, x);
         return make_printf(k, [4,acc,str], fmt);
       } :
        function(p, x) {
         var str = convert_float(fconv, p, x);
         return make_printf(k, [4,acc,str], fmt);
       };
    }
    var p = match[1];
    return function(x) {
      var str = convert_float(fconv, p, x);
      return make_printf(k, [4,acc,str], fmt);
    };
  }
  else {
    if (0 === pad[0]) {
      var c0_ = pad[2];
      var c1_ = pad[1];
      if (typeof match === "number") {
        return 0 === match ?
          function(x) {
           var str = convert_float(fconv, default_float_precision, x);
           var str__0 = fix_padding(c1_, c0_, str);
           return make_printf(k, [4,acc,str__0], fmt);
         } :
          function(p, x) {
           var str = fix_padding(c1_, c0_, convert_float(fconv, p, x));
           return make_printf(k, [4,acc,str], fmt);
         };
      }
      var p__0 = match[1];
      return function(x) {
        var str = fix_padding(c1_, c0_, convert_float(fconv, p__0, x));
        return make_printf(k, [4,acc,str], fmt);
      };
    }
    var c2_ = pad[1];
    if (typeof match === "number") {
      return 0 === match ?
        function(w, x) {
         var str = convert_float(fconv, default_float_precision, x);
         var str__0 = fix_padding(c2_, w, str);
         return make_printf(k, [4,acc,str__0], fmt);
       } :
        function(w, p, x) {
         var str = fix_padding(c2_, w, convert_float(fconv, p, x));
         return make_printf(k, [4,acc,str], fmt);
       };
    }
    var p__1 = match[1];
    return function(w, x) {
      var str = fix_padding(c2_, w, convert_float(fconv, p__1, x));
      return make_printf(k, [4,acc,str], fmt);
    };
  }
}

function make_int_padding_precision(k, acc, fmt, pad, match, trans, iconv) {
  if (typeof pad === "number") {
    if (typeof match === "number") {
      return 0 === match ?
        function(x) {
         var str = call2(trans, iconv, x);
         return make_printf(k, [4,acc,str], fmt);
       } :
        function(p, x) {
         var str = fix_int_precision(p, call2(trans, iconv, x));
         return make_printf(k, [4,acc,str], fmt);
       };
    }
    var p = match[1];
    return function(x) {
      var str = fix_int_precision(p, call2(trans, iconv, x));
      return make_printf(k, [4,acc,str], fmt);
    };
  }
  else {
    if (0 === pad[0]) {
      var cX_ = pad[2];
      var cY_ = pad[1];
      if (typeof match === "number") {
        return 0 === match ?
          function(x) {
           var str = fix_padding(cY_, cX_, call2(trans, iconv, x));
           return make_printf(k, [4,acc,str], fmt);
         } :
          function(p, x) {
           var str = fix_padding(
             cY_,
             cX_,
             fix_int_precision(p, call2(trans, iconv, x))
           );
           return make_printf(k, [4,acc,str], fmt);
         };
      }
      var p__0 = match[1];
      return function(x) {
        var str = fix_padding(
          cY_,
          cX_,
          fix_int_precision(p__0, call2(trans, iconv, x))
        );
        return make_printf(k, [4,acc,str], fmt);
      };
    }
    var cZ_ = pad[1];
    if (typeof match === "number") {
      return 0 === match ?
        function(w, x) {
         var str = fix_padding(cZ_, w, call2(trans, iconv, x));
         return make_printf(k, [4,acc,str], fmt);
       } :
        function(w, p, x) {
         var str = fix_padding(
           cZ_,
           w,
           fix_int_precision(p, call2(trans, iconv, x))
         );
         return make_printf(k, [4,acc,str], fmt);
       };
    }
    var p__1 = match[1];
    return function(w, x) {
      var str = fix_padding(
        cZ_,
        w,
        fix_int_precision(p__1, call2(trans, iconv, x))
      );
      return make_printf(k, [4,acc,str], fmt);
    };
  }
}

function make_padding(k, acc, fmt, pad, trans) {
  if (typeof pad === "number") return function(x) {
    var new_acc = [4,acc,call1(trans, x)];
    return make_printf(k, new_acc, fmt);
  };
  else {
    if (0 === pad[0]) {
      var width = pad[2];
      var padty = pad[1];
      return function(x) {
        var new_acc = [4,acc,fix_padding(padty, width, call1(trans, x))];
        return make_printf(k, new_acc, fmt);
      };
    }
    var padty__0 = pad[1];
    return function(w, x) {
      var new_acc = [4,acc,fix_padding(padty__0, w, call1(trans, x))];
      return make_printf(k, new_acc, fmt);
    };
  }
}

function make_printf__0(counter, k, acc, fmt) {
  var k__0 = k;
  var acc__0 = acc;
  var fmt__0 = fmt;
  for (; ; ) if (
    typeof fmt__0 === "number"
  ) return call1(k__0, acc__0);
  else switch (fmt__0[0]) {
    case 0:
      var rest = fmt__0[1];
      return function(c) {
        var new_acc = [5,acc__0,c];
        return make_printf(k__0, new_acc, rest);
      };
    case 1:
      var rest__0 = fmt__0[1];
      return function(c) {
        var new_acc = [4,acc__0,format_caml_char(c)];
        return make_printf(k__0, new_acc, rest__0);
      };
    case 2:
      var rest__1 = fmt__0[2];
      var pad = fmt__0[1];
      return make_padding(
        k__0,
        acc__0,
        rest__1,
        pad,
        function(str) {return str;}
      );
    case 3:
      var rest__2 = fmt__0[2];
      var pad__0 = fmt__0[1];
      return make_padding(k__0, acc__0, rest__2, pad__0, string_to_caml_string
      );
    case 4:
      var rest__3 = fmt__0[4];
      var prec = fmt__0[3];
      var pad__1 = fmt__0[2];
      var iconv = fmt__0[1];
      return make_int_padding_precision(
        k__0,
        acc__0,
        rest__3,
        pad__1,
        prec,
        convert_int,
        iconv
      );
    case 5:
      var rest__4 = fmt__0[4];
      var prec__0 = fmt__0[3];
      var pad__2 = fmt__0[2];
      var iconv__0 = fmt__0[1];
      return make_int_padding_precision(
        k__0,
        acc__0,
        rest__4,
        pad__2,
        prec__0,
        convert_int32,
        iconv__0
      );
    case 6:
      var rest__5 = fmt__0[4];
      var prec__1 = fmt__0[3];
      var pad__3 = fmt__0[2];
      var iconv__1 = fmt__0[1];
      return make_int_padding_precision(
        k__0,
        acc__0,
        rest__5,
        pad__3,
        prec__1,
        convert_nativeint,
        iconv__1
      );
    case 7:
      var rest__6 = fmt__0[4];
      var prec__2 = fmt__0[3];
      var pad__4 = fmt__0[2];
      var iconv__2 = fmt__0[1];
      return make_int_padding_precision(
        k__0,
        acc__0,
        rest__6,
        pad__4,
        prec__2,
        convert_int64,
        iconv__2
      );
    case 8:
      var rest__7 = fmt__0[4];
      var prec__3 = fmt__0[3];
      var pad__5 = fmt__0[2];
      var fconv = fmt__0[1];
      return make_float_padding_precision(
        k__0,
        acc__0,
        rest__7,
        pad__5,
        prec__3,
        fconv
      );
    case 9:
      var rest__8 = fmt__0[2];
      var pad__6 = fmt__0[1];
      return make_padding(k__0, acc__0, rest__8, pad__6, Stdlib[30]);
    case 10:
      var fmt__1 = fmt__0[1];
      var acc__1 = [7,acc__0];
      var acc__0 = acc__1;
      var fmt__0 = fmt__1;
      continue;
    case 11:
      var fmt__2 = fmt__0[2];
      var str = fmt__0[1];
      var acc__2 = [2,acc__0,str];
      var acc__0 = acc__2;
      var fmt__0 = fmt__2;
      continue;
    case 12:
      var fmt__3 = fmt__0[2];
      var chr = fmt__0[1];
      var acc__3 = [3,acc__0,chr];
      var acc__0 = acc__3;
      var fmt__0 = fmt__3;
      continue;
    case 13:
      var rest__9 = fmt__0[3];
      var sub_fmtty = fmt__0[2];
      var ty = string_of_fmtty(sub_fmtty);
      return function(str) {
        return make_printf(k__0, [4,acc__0,ty], rest__9);
      };
    case 14:
      var rest__10 = fmt__0[3];
      var fmtty = fmt__0[2];
      return function(param) {
        var fmt = param[1];
        var cW_ = recast(fmt, fmtty);
        return make_printf(
          k__0,
          acc__0,
          call2(CamlinternalFormatBasics[3], cW_, rest__10)
        );
      };
    case 15:
      var rest__11 = fmt__0[1];
      return function(f, x) {
        return make_printf(
          k__0,
          [6,acc__0,function(o) {return call2(f, o, x);}],
          rest__11
        );
      };
    case 16:
      var rest__12 = fmt__0[1];
      return function(f) {return make_printf(k__0, [6,acc__0,f], rest__12);};
    case 17:
      var fmt__4 = fmt__0[2];
      var fmting_lit = fmt__0[1];
      var acc__4 = [0,acc__0,fmting_lit];
      var acc__0 = acc__4;
      var fmt__0 = fmt__4;
      continue;
    case 18:
      var cU_ = fmt__0[1];
      if (0 === cU_[0]) {
        var rest__13 = fmt__0[2];
        var match = cU_[1];
        var fmt__5 = match[1];
        var k__3 = function(acc, k, rest) {
          function k__0(kacc) {return make_printf(k, [1,acc,[0,kacc]], rest);}
          return k__0;
        };
        var k__1 = k__3(acc__0, k__0, rest__13);
        var k__0 = k__1;
        var acc__0 = 0;
        var fmt__0 = fmt__5;
        continue;
      }
      var rest__14 = fmt__0[2];
      var match__0 = cU_[1];
      var fmt__6 = match__0[1];
      var k__4 = function(acc, k, rest) {
        function k__0(kacc) {return make_printf(k, [1,acc,[1,kacc]], rest);}
        return k__0;
      };
      var k__2 = k__4(acc__0, k__0, rest__14);
      var k__0 = k__2;
      var acc__0 = 0;
      var fmt__0 = fmt__6;
      continue;
    case 19:
      throw caml_wrap_thrown_exception([0,Assert_failure,q_]);
    case 20:
      var rest__15 = fmt__0[3];
      var new_acc = [8,acc__0,cst_Printf_bad_conversion];
      return function(param) {return make_printf(k__0, new_acc, rest__15);};
    case 21:
      var rest__16 = fmt__0[2];
      return function(n) {
        var new_acc = [4,acc__0,caml_format_int(cst_u__0, n)];
        return make_printf(k__0, new_acc, rest__16);
      };
    case 22:
      var rest__17 = fmt__0[1];
      return function(c) {
        var new_acc = [5,acc__0,c];
        return make_printf(k__0, new_acc, rest__17);
      };
    case 23:
      var rest__18 = fmt__0[2];
      var ign = fmt__0[1];
      if (counter < 50) {
        var counter__1 = counter + 1 | 0;
        return make_ignored_param__0(counter__1, k__0, acc__0, ign, rest__18);
      }
      return caml_trampoline_return(
        make_ignored_param__0,
        [0,k__0,acc__0,ign,rest__18]
      );
    default:
      var rest__19 = fmt__0[3];
      var f = fmt__0[2];
      var arity = fmt__0[1];
      var cV_ = call1(f, 0);
      if (counter < 50) {
        var counter__0 = counter + 1 | 0;
        return make_custom__0(counter__0, k__0, acc__0, rest__19, arity, cV_);
      }
      return caml_trampoline_return(
        make_custom__0,
        [0,k__0,acc__0,rest__19,arity,cV_]
      )
    }
}

function make_ignored_param__0(counter, k, acc, ign, fmt) {
  if (typeof ign === "number") switch (ign) {
    case 0:
      if (counter < 50) {
        var counter__0 = counter + 1 | 0;
        return make_invalid_arg(counter__0, k, acc, fmt);
      }
      return caml_trampoline_return(make_invalid_arg, [0,k,acc,fmt]);
    case 1:
      if (counter < 50) {
        var counter__1 = counter + 1 | 0;
        return make_invalid_arg(counter__1, k, acc, fmt);
      }
      return caml_trampoline_return(make_invalid_arg, [0,k,acc,fmt]);
    case 2:
      throw caml_wrap_thrown_exception([0,Assert_failure,r_]);
    default:
      if (counter < 50) {
        var counter__2 = counter + 1 | 0;
        return make_invalid_arg(counter__2, k, acc, fmt);
      }
      return caml_trampoline_return(make_invalid_arg, [0,k,acc,fmt])
    }
  else switch (ign[0]) {
    case 0:
      if (counter < 50) {
        var counter__3 = counter + 1 | 0;
        return make_invalid_arg(counter__3, k, acc, fmt);
      }
      return caml_trampoline_return(make_invalid_arg, [0,k,acc,fmt]);
    case 1:
      if (counter < 50) {
        var counter__4 = counter + 1 | 0;
        return make_invalid_arg(counter__4, k, acc, fmt);
      }
      return caml_trampoline_return(make_invalid_arg, [0,k,acc,fmt]);
    case 2:
      if (counter < 50) {
        var counter__5 = counter + 1 | 0;
        return make_invalid_arg(counter__5, k, acc, fmt);
      }
      return caml_trampoline_return(make_invalid_arg, [0,k,acc,fmt]);
    case 3:
      if (counter < 50) {
        var counter__6 = counter + 1 | 0;
        return make_invalid_arg(counter__6, k, acc, fmt);
      }
      return caml_trampoline_return(make_invalid_arg, [0,k,acc,fmt]);
    case 4:
      if (counter < 50) {
        var counter__7 = counter + 1 | 0;
        return make_invalid_arg(counter__7, k, acc, fmt);
      }
      return caml_trampoline_return(make_invalid_arg, [0,k,acc,fmt]);
    case 5:
      if (counter < 50) {
        var counter__8 = counter + 1 | 0;
        return make_invalid_arg(counter__8, k, acc, fmt);
      }
      return caml_trampoline_return(make_invalid_arg, [0,k,acc,fmt]);
    case 6:
      if (counter < 50) {
        var counter__9 = counter + 1 | 0;
        return make_invalid_arg(counter__9, k, acc, fmt);
      }
      return caml_trampoline_return(make_invalid_arg, [0,k,acc,fmt]);
    case 7:
      if (counter < 50) {
        var counter__10 = counter + 1 | 0;
        return make_invalid_arg(counter__10, k, acc, fmt);
      }
      return caml_trampoline_return(make_invalid_arg, [0,k,acc,fmt]);
    case 8:
      if (counter < 50) {
        var counter__11 = counter + 1 | 0;
        return make_invalid_arg(counter__11, k, acc, fmt);
      }
      return caml_trampoline_return(make_invalid_arg, [0,k,acc,fmt]);
    case 9:
      var fmtty = ign[2];
      if (counter < 50) {
        var counter__14 = counter + 1 | 0;
        return make_from_fmtty__0(counter__14, k, acc, fmtty, fmt);
      }
      return caml_trampoline_return(make_from_fmtty__0, [0,k,acc,fmtty,fmt]);
    case 10:
      if (counter < 50) {
        var counter__12 = counter + 1 | 0;
        return make_invalid_arg(counter__12, k, acc, fmt);
      }
      return caml_trampoline_return(make_invalid_arg, [0,k,acc,fmt]);
    default:
      if (counter < 50) {
        var counter__13 = counter + 1 | 0;
        return make_invalid_arg(counter__13, k, acc, fmt);
      }
      return caml_trampoline_return(make_invalid_arg, [0,k,acc,fmt])
    }
}

function make_from_fmtty__0(counter, k, acc, fmtty, fmt) {
  if (typeof fmtty === "number") {
    if (counter < 50) {
      var counter__0 = counter + 1 | 0;
      return make_invalid_arg(counter__0, k, acc, fmt);
    }
    return caml_trampoline_return(make_invalid_arg, [0,k,acc,fmt]);
  }
  else switch (fmtty[0]) {
    case 0:
      var rest = fmtty[1];
      return function(param) {return make_from_fmtty(k, acc, rest, fmt);};
    case 1:
      var rest__0 = fmtty[1];
      return function(param) {return make_from_fmtty(k, acc, rest__0, fmt);};
    case 2:
      var rest__1 = fmtty[1];
      return function(param) {return make_from_fmtty(k, acc, rest__1, fmt);};
    case 3:
      var rest__2 = fmtty[1];
      return function(param) {return make_from_fmtty(k, acc, rest__2, fmt);};
    case 4:
      var rest__3 = fmtty[1];
      return function(param) {return make_from_fmtty(k, acc, rest__3, fmt);};
    case 5:
      var rest__4 = fmtty[1];
      return function(param) {return make_from_fmtty(k, acc, rest__4, fmt);};
    case 6:
      var rest__5 = fmtty[1];
      return function(param) {return make_from_fmtty(k, acc, rest__5, fmt);};
    case 7:
      var rest__6 = fmtty[1];
      return function(param) {return make_from_fmtty(k, acc, rest__6, fmt);};
    case 8:
      var rest__7 = fmtty[2];
      return function(param) {return make_from_fmtty(k, acc, rest__7, fmt);};
    case 9:
      var rest__8 = fmtty[3];
      var ty2 = fmtty[2];
      var ty1 = fmtty[1];
      var ty = trans(symm(ty1), ty2);
      return function(param) {
        return make_from_fmtty(
          k,
          acc,
          call2(CamlinternalFormatBasics[1], ty, rest__8),
          fmt
        );
      };
    case 10:
      var rest__9 = fmtty[1];
      return function(param, cT_) {
        return make_from_fmtty(k, acc, rest__9, fmt);
      };
    case 11:
      var rest__10 = fmtty[1];
      return function(param) {return make_from_fmtty(k, acc, rest__10, fmt);};
    case 12:
      var rest__11 = fmtty[1];
      return function(param) {return make_from_fmtty(k, acc, rest__11, fmt);};
    case 13:
      throw caml_wrap_thrown_exception([0,Assert_failure,s_]);
    default:
      throw caml_wrap_thrown_exception([0,Assert_failure,t_])
    }
}

function make_invalid_arg(counter, k, acc, fmt) {
  var cS_ = [8,acc,cst_Printf_bad_conversion__0];
  if (counter < 50) {
    var counter__0 = counter + 1 | 0;
    return make_printf__0(counter__0, k, cS_, fmt);
  }
  return caml_trampoline_return(make_printf__0, [0,k,cS_,fmt]);
}

function make_custom__0(counter, k, acc, rest, arity, f) {
  if (arity) {
    var arity__0 = arity[1];
    return function(x) {
      return make_custom(k, acc, rest, arity__0, call1(f, x));
    };
  }
  var cR_ = [4,acc,f];
  if (counter < 50) {
    var counter__0 = counter + 1 | 0;
    return make_printf__0(counter__0, k, cR_, rest);
  }
  return caml_trampoline_return(make_printf__0, [0,k,cR_,rest]);
}

function make_printf(k, acc, fmt) {
  return caml_trampoline(make_printf__0(0, k, acc, fmt));
}

function make_ignored_param(k, acc, ign, fmt) {
  return caml_trampoline(make_ignored_param__0(0, k, acc, ign, fmt));
}

function make_from_fmtty(k, acc, fmtty, fmt) {
  return caml_trampoline(make_from_fmtty__0(0, k, acc, fmtty, fmt));
}

function make_custom(k, acc, rest, arity, f) {
  return caml_trampoline(make_custom__0(0, k, acc, rest, arity, f));
}

function const__0(x, param) {return x;}

function fn_of_padding_precision(k, o, fmt, pad, prec) {
  if (typeof pad === "number") {
    if (typeof prec === "number") {
      if (0 === prec) {
        var cn_ = make_iprintf(k, o, fmt);
        return function(cF_) {return const__0(cn_, cF_);};
      }
      var co_ = make_iprintf(k, o, fmt);
      var cp_ = function(cE_) {return const__0(co_, cE_);};
      return function(cD_) {return const__0(cp_, cD_);};
    }
    var cq_ = make_iprintf(k, o, fmt);
    return function(cC_) {return const__0(cq_, cC_);};
  }
  else {
    if (0 === pad[0]) {
      if (typeof prec === "number") {
        if (0 === prec) {
          var cr_ = make_iprintf(k, o, fmt);
          return function(cQ_) {return const__0(cr_, cQ_);};
        }
        var cs_ = make_iprintf(k, o, fmt);
        var ct_ = function(cP_) {return const__0(cs_, cP_);};
        return function(cO_) {return const__0(ct_, cO_);};
      }
      var cu_ = make_iprintf(k, o, fmt);
      return function(cN_) {return const__0(cu_, cN_);};
    }
    if (typeof prec === "number") {
      if (0 === prec) {
        var cv_ = make_iprintf(k, o, fmt);
        var cw_ = function(cM_) {return const__0(cv_, cM_);};
        return function(cL_) {return const__0(cw_, cL_);};
      }
      var cx_ = make_iprintf(k, o, fmt);
      var cy_ = function(cK_) {return const__0(cx_, cK_);};
      var cz_ = function(cJ_) {return const__0(cy_, cJ_);};
      return function(cI_) {return const__0(cz_, cI_);};
    }
    var cA_ = make_iprintf(k, o, fmt);
    var cB_ = function(cH_) {return const__0(cA_, cH_);};
    return function(cG_) {return const__0(cB_, cG_);};
  }
}

function make_iprintf__0(counter, k, o, fmt) {
  var k__0 = k;
  var fmt__0 = fmt;
  for (; ; ) if (
    typeof fmt__0 === "number"
  ) return call1(k__0, o);
  else switch (fmt__0[0]) {
    case 0:
      var rest = fmt__0[1];
      var bC_ = make_iprintf(k__0, o, rest);
      return function(cm_) {return const__0(bC_, cm_);};
    case 1:
      var rest__0 = fmt__0[1];
      var bD_ = make_iprintf(k__0, o, rest__0);
      return function(cl_) {return const__0(bD_, cl_);};
    case 2:
      var bE_ = fmt__0[1];
      if (typeof bE_ === "number") {
        var rest__1 = fmt__0[2];
        var bF_ = make_iprintf(k__0, o, rest__1);
        return function(ch_) {return const__0(bF_, ch_);};
      }
      else {
        if (0 === bE_[0]) {
          var rest__2 = fmt__0[2];
          var bG_ = make_iprintf(k__0, o, rest__2);
          return function(ck_) {return const__0(bG_, ck_);};
        }
        var rest__3 = fmt__0[2];
        var bH_ = make_iprintf(k__0, o, rest__3);
        var bI_ = function(cj_) {return const__0(bH_, cj_);};
        return function(ci_) {return const__0(bI_, ci_);};
      }
    case 3:
      var bJ_ = fmt__0[1];
      if (typeof bJ_ === "number") {
        var rest__4 = fmt__0[2];
        var bK_ = make_iprintf(k__0, o, rest__4);
        return function(cd_) {return const__0(bK_, cd_);};
      }
      else {
        if (0 === bJ_[0]) {
          var rest__5 = fmt__0[2];
          var bL_ = make_iprintf(k__0, o, rest__5);
          return function(cg_) {return const__0(bL_, cg_);};
        }
        var rest__6 = fmt__0[2];
        var bM_ = make_iprintf(k__0, o, rest__6);
        var bN_ = function(cf_) {return const__0(bM_, cf_);};
        return function(ce_) {return const__0(bN_, ce_);};
      }
    case 4:
      var rest__7 = fmt__0[4];
      var prec = fmt__0[3];
      var pad = fmt__0[2];
      return fn_of_padding_precision(k__0, o, rest__7, pad, prec);
    case 5:
      var rest__8 = fmt__0[4];
      var prec__0 = fmt__0[3];
      var pad__0 = fmt__0[2];
      return fn_of_padding_precision(k__0, o, rest__8, pad__0, prec__0);
    case 6:
      var rest__9 = fmt__0[4];
      var prec__1 = fmt__0[3];
      var pad__1 = fmt__0[2];
      return fn_of_padding_precision(k__0, o, rest__9, pad__1, prec__1);
    case 7:
      var rest__10 = fmt__0[4];
      var prec__2 = fmt__0[3];
      var pad__2 = fmt__0[2];
      return fn_of_padding_precision(k__0, o, rest__10, pad__2, prec__2);
    case 8:
      var rest__11 = fmt__0[4];
      var prec__3 = fmt__0[3];
      var pad__3 = fmt__0[2];
      return fn_of_padding_precision(k__0, o, rest__11, pad__3, prec__3);
    case 9:
      var bO_ = fmt__0[1];
      if (typeof bO_ === "number") {
        var rest__12 = fmt__0[2];
        var bP_ = make_iprintf(k__0, o, rest__12);
        return function(b__) {return const__0(bP_, b__);};
      }
      else {
        if (0 === bO_[0]) {
          var rest__13 = fmt__0[2];
          var bQ_ = make_iprintf(k__0, o, rest__13);
          return function(cc_) {return const__0(bQ_, cc_);};
        }
        var rest__14 = fmt__0[2];
        var bR_ = make_iprintf(k__0, o, rest__14);
        var bS_ = function(cb_) {return const__0(bR_, cb_);};
        return function(ca_) {return const__0(bS_, ca_);};
      }
    case 10:
      var fmt__1 = fmt__0[1];
      var fmt__0 = fmt__1;
      continue;
    case 11:
      var fmt__2 = fmt__0[2];
      var fmt__0 = fmt__2;
      continue;
    case 12:
      var fmt__3 = fmt__0[2];
      var fmt__0 = fmt__3;
      continue;
    case 13:
      var rest__15 = fmt__0[3];
      var bT_ = make_iprintf(k__0, o, rest__15);
      return function(b9_) {return const__0(bT_, b9_);};
    case 14:
      var rest__16 = fmt__0[3];
      var fmtty = fmt__0[2];
      return function(param) {
        var fmt = param[1];
        var b8_ = recast(fmt, fmtty);
        return make_iprintf(
          k__0,
          o,
          call2(CamlinternalFormatBasics[3], b8_, rest__16)
        );
      };
    case 15:
      var rest__17 = fmt__0[1];
      var bU_ = make_iprintf(k__0, o, rest__17);
      var bV_ = function(b7_) {return const__0(bU_, b7_);};
      return function(b6_) {return const__0(bV_, b6_);};
    case 16:
      var rest__18 = fmt__0[1];
      var bW_ = make_iprintf(k__0, o, rest__18);
      return function(b5_) {return const__0(bW_, b5_);};
    case 17:
      var fmt__4 = fmt__0[2];
      var fmt__0 = fmt__4;
      continue;
    case 18:
      var bX_ = fmt__0[1];
      if (0 === bX_[0]) {
        var rest__19 = fmt__0[2];
        var match = bX_[1];
        var fmt__5 = match[1];
        var k__3 = function(k, rest) {
          function k__0(koc) {return make_iprintf(k, koc, rest);}
          return k__0;
        };
        var k__1 = k__3(k__0, rest__19);
        var k__0 = k__1;
        var fmt__0 = fmt__5;
        continue;
      }
      var rest__20 = fmt__0[2];
      var match__0 = bX_[1];
      var fmt__6 = match__0[1];
      var k__4 = function(k, rest) {
        function k__0(koc) {return make_iprintf(k, koc, rest);}
        return k__0;
      };
      var k__2 = k__4(k__0, rest__20);
      var k__0 = k__2;
      var fmt__0 = fmt__6;
      continue;
    case 19:
      throw caml_wrap_thrown_exception([0,Assert_failure,u_]);
    case 20:
      var rest__21 = fmt__0[3];
      var bY_ = make_iprintf(k__0, o, rest__21);
      return function(b4_) {return const__0(bY_, b4_);};
    case 21:
      var rest__22 = fmt__0[2];
      var bZ_ = make_iprintf(k__0, o, rest__22);
      return function(b3_) {return const__0(bZ_, b3_);};
    case 22:
      var rest__23 = fmt__0[1];
      var b0_ = make_iprintf(k__0, o, rest__23);
      return function(b2_) {return const__0(b0_, b2_);};
    case 23:
      var rest__24 = fmt__0[2];
      var ign = fmt__0[1];
      var b1_ = 0;
      return make_ignored_param(
        function(param) {return call1(k__0, o);},
        b1_,
        ign,
        rest__24
      );
    default:
      var rest__25 = fmt__0[3];
      var arity = fmt__0[1];
      if (counter < 50) {
        var counter__0 = counter + 1 | 0;
        return fn_of_custom_arity__0(counter__0, k__0, o, rest__25, arity);
      }
      return caml_trampoline_return(
        fn_of_custom_arity__0,
        [0,k__0,o,rest__25,arity]
      )
    }
}

function fn_of_custom_arity__0(counter, k, o, fmt, param) {
  if (param) {
    var arity = param[1];
    var bA_ = fn_of_custom_arity(k, o, fmt, arity);
    return function(bB_) {return const__0(bA_, bB_);};
  }
  if (counter < 50) {
    var counter__0 = counter + 1 | 0;
    return make_iprintf__0(counter__0, k, o, fmt);
  }
  return caml_trampoline_return(make_iprintf__0, [0,k,o,fmt]);
}

function make_iprintf(k, o, fmt) {
  return caml_trampoline(make_iprintf__0(0, k, o, fmt));
}

function fn_of_custom_arity(k, o, fmt, param) {
  return caml_trampoline(fn_of_custom_arity__0(0, k, o, fmt, param));
}

function output_acc(o, acc) {
  var acc__0 = acc;
  for (; ; ) if (
    typeof acc__0 === "number"
  ) return 0;
  else switch (acc__0[0]) {
    case 0:
      var fmting_lit = acc__0[2];
      var p = acc__0[1];
      var s = string_of_formatting_lit(fmting_lit);
      output_acc(o, p);
      return call2(Stdlib[66], o, s);
    case 1:
      var by_ = acc__0[2];
      var bz_ = acc__0[1];
      if (0 === by_[0]) {
        var acc__1 = by_[1];
        output_acc(o, bz_);
        call2(Stdlib[66], o, cst__17);
        var acc__0 = acc__1;
        continue;
      }
      var acc__2 = by_[1];
      output_acc(o, bz_);
      call2(Stdlib[66], o, cst__18);
      var acc__0 = acc__2;
      continue;
    case 6:
      var f = acc__0[2];
      var p__2 = acc__0[1];
      output_acc(o, p__2);
      return call1(f, o);
    case 7:
      var p__3 = acc__0[1];
      output_acc(o, p__3);
      return call1(Stdlib[63], o);
    case 8:
      var msg = acc__0[2];
      var p__4 = acc__0[1];
      output_acc(o, p__4);
      return call1(Stdlib[1], msg);
    case 2:
    case 4:
      var s__0 = acc__0[2];
      var p__0 = acc__0[1];
      output_acc(o, p__0);
      return call2(Stdlib[66], o, s__0);
    default:
      var c = acc__0[2];
      var p__1 = acc__0[1];
      output_acc(o, p__1);
      return call2(Stdlib[65], o, c)
    }
}

function bufput_acc(b, acc) {
  var acc__0 = acc;
  for (; ; ) if (
    typeof acc__0 === "number"
  ) return 0;
  else switch (acc__0[0]) {
    case 0:
      var fmting_lit = acc__0[2];
      var p = acc__0[1];
      var s = string_of_formatting_lit(fmting_lit);
      bufput_acc(b, p);
      return call2(Stdlib_buffer[14], b, s);
    case 1:
      var bw_ = acc__0[2];
      var bx_ = acc__0[1];
      if (0 === bw_[0]) {
        var acc__1 = bw_[1];
        bufput_acc(b, bx_);
        call2(Stdlib_buffer[14], b, cst__19);
        var acc__0 = acc__1;
        continue;
      }
      var acc__2 = bw_[1];
      bufput_acc(b, bx_);
      call2(Stdlib_buffer[14], b, cst__20);
      var acc__0 = acc__2;
      continue;
    case 6:
      var f = acc__0[2];
      var p__2 = acc__0[1];
      bufput_acc(b, p__2);
      return call1(f, b);
    case 7:
      var acc__3 = acc__0[1];
      var acc__0 = acc__3;
      continue;
    case 8:
      var msg = acc__0[2];
      var p__3 = acc__0[1];
      bufput_acc(b, p__3);
      return call1(Stdlib[1], msg);
    case 2:
    case 4:
      var s__0 = acc__0[2];
      var p__0 = acc__0[1];
      bufput_acc(b, p__0);
      return call2(Stdlib_buffer[14], b, s__0);
    default:
      var c = acc__0[2];
      var p__1 = acc__0[1];
      bufput_acc(b, p__1);
      return call2(Stdlib_buffer[10], b, c)
    }
}

function strput_acc(b, acc) {
  var acc__0 = acc;
  for (; ; ) if (
    typeof acc__0 === "number"
  ) return 0;
  else switch (acc__0[0]) {
    case 0:
      var fmting_lit = acc__0[2];
      var p = acc__0[1];
      var s = string_of_formatting_lit(fmting_lit);
      strput_acc(b, p);
      return call2(Stdlib_buffer[14], b, s);
    case 1:
      var bt_ = acc__0[2];
      var bu_ = acc__0[1];
      if (0 === bt_[0]) {
        var acc__1 = bt_[1];
        strput_acc(b, bu_);
        call2(Stdlib_buffer[14], b, cst__21);
        var acc__0 = acc__1;
        continue;
      }
      var acc__2 = bt_[1];
      strput_acc(b, bu_);
      call2(Stdlib_buffer[14], b, cst__22);
      var acc__0 = acc__2;
      continue;
    case 6:
      var f = acc__0[2];
      var p__2 = acc__0[1];
      strput_acc(b, p__2);
      var bv_ = call1(f, 0);
      return call2(Stdlib_buffer[14], b, bv_);
    case 7:
      var acc__3 = acc__0[1];
      var acc__0 = acc__3;
      continue;
    case 8:
      var msg = acc__0[2];
      var p__3 = acc__0[1];
      strput_acc(b, p__3);
      return call1(Stdlib[1], msg);
    case 2:
    case 4:
      var s__0 = acc__0[2];
      var p__0 = acc__0[1];
      strput_acc(b, p__0);
      return call2(Stdlib_buffer[14], b, s__0);
    default:
      var c = acc__0[2];
      var p__1 = acc__0[1];
      strput_acc(b, p__1);
      return call2(Stdlib_buffer[10], b, c)
    }
}

function failwith_message(param) {
  var fmt = param[1];
  var buf = call1(Stdlib_buffer[1], 256);
  function k(acc) {
    strput_acc(buf, acc);
    var bs_ = call1(Stdlib_buffer[2], buf);
    return call1(Stdlib[2], bs_);
  }
  return make_printf(k, 0, fmt);
}

function open_box_of_string(str) {
  if (runtime["caml_string_equal"](str, cst__23)) {return v_;}
  var len = caml_ml_string_length(str);
  function invalid_box(param) {return call1(failwith_message(w_), str);}
  function parse_spaces(i) {
    var i__0 = i;
    for (; ; ) {
      if (i__0 === len) {return i__0;}
      var match = caml_string_get(str, i__0);
      if (9 !== match) {if (32 !== match) {return i__0;}}
      var i__1 = i__0 + 1 | 0;
      var i__0 = i__1;
      continue;
    }
  }
  function parse_lword(i, j) {
    var j__0 = j;
    for (; ; ) {
      if (j__0 === len) {return j__0;}
      var match = caml_string_get(str, j__0);
      var switcher = match + -97 | 0;
      if (25 < switcher >>> 0) {return j__0;}
      var j__1 = j__0 + 1 | 0;
      var j__0 = j__1;
      continue;
    }
  }
  function parse_int(i, j) {
    var j__0 = j;
    for (; ; ) {
      if (j__0 === len) {return j__0;}
      var match = caml_string_get(str, j__0);
      var switch__0 = 48 <= match ? 58 <= match ? 0 : 1 : 45 === match ? 1 : 0;
      if (switch__0) {var j__1 = j__0 + 1 | 0;var j__0 = j__1;continue;}
      return j__0;
    }
  }
  var wstart = parse_spaces(0);
  var wend = parse_lword(wstart, wstart);
  var box_name = call3(Stdlib_string[4], str, wstart, wend - wstart | 0);
  var nstart = parse_spaces(wend);
  var nend = parse_int(nstart, nstart);
  if (nstart === nend) var indent = 0;
  else try {
    var bq_ = runtime["caml_int_of_string"](
      call3(Stdlib_string[4], str, nstart, nend - nstart | 0)
    );
    var indent = bq_;
  }
  catch(br_) {
    br_ = runtime["caml_wrap_exception"](br_);
    if (br_[1] !== Stdlib[7]) {throw caml_wrap_thrown_exception_reraise(br_);}
    var bp_ = invalid_box(0);
    var indent = bp_;
  }
  var exp_end = parse_spaces(nend);
  if (exp_end !== len) {invalid_box(0);}
  if (caml_string_notequal(box_name, cst__24)) if (caml_string_notequal(box_name, cst_b)) if (caml_string_notequal(box_name, cst_h)) if (caml_string_notequal(box_name, cst_hov)
  ) if (caml_string_notequal(box_name, cst_hv)) if (caml_string_notequal(box_name, cst_v)) {
    var box_type = invalid_box(0);
    var switch__0 = 1;
  }
  else {var box_type = 1;var switch__0 = 1;}
  else {var box_type = 2;var switch__0 = 1;}
  else {var box_type = 3;var switch__0 = 1;}
  else {var box_type = 0;var switch__0 = 1;}
  else var switch__0 = 0;
  else var switch__0 = 0;
  if (! switch__0) {var box_type = 4;}
  return [0,indent,box_type];
}

function make_padding_fmt_ebb(pad, fmt) {
  if (typeof pad === "number") return [0,0,fmt];
  else {
    if (0 === pad[0]) {var w = pad[2];var s = pad[1];return [0,[0,s,w],fmt];}
    var s__0 = pad[1];
    return [0,[1,s__0],fmt];
  }
}

function make_precision_fmt_ebb(prec, fmt) {
  if (typeof prec === "number") {return 0 === prec ? [0,0,fmt] : [0,1,fmt];}
  var p = prec[1];
  return [0,[0,p],fmt];
}

function make_padprec_fmt_ebb(pad, prec, fmt) {
  var match = make_precision_fmt_ebb(prec, fmt);
  var fmt__0 = match[2];
  var prec__0 = match[1];
  if (typeof pad === "number") return [0,0,prec__0,fmt__0];
  else {
    if (0 === pad[0]) {
      var w = pad[2];
      var s = pad[1];
      return [0,[0,s,w],prec__0,fmt__0];
    }
    var s__0 = pad[1];
    return [0,[1,s__0],prec__0,fmt__0];
  }
}

function fmt_ebb_of_string(legacy_behavior, str) {
  if (legacy_behavior) {
    var flag = legacy_behavior[1];
    var legacy_behavior__0 = flag;
  }
  else var legacy_behavior__0 = 1;
  function invalid_format_message(str_ind, msg) {
    return call3(failwith_message(x_), str, str_ind, msg);
  }
  function unexpected_end_of_format(end_ind) {
    return invalid_format_message(end_ind, cst_unexpected_end_of_format);
  }
  function invalid_nonnull_char_width(str_ind) {
    return invalid_format_message(
      str_ind,
      cst_non_zero_widths_are_unsupported_for_c_conversions
    );
  }
  function invalid_format_without(str_ind, c, s) {
    return call4(failwith_message(y_), str, str_ind, c, s);
  }
  function expected_character(str_ind, expected, read) {
    return call4(failwith_message(z_), str, str_ind, expected, read);
  }
  function add_literal(lit_start, str_ind, fmt) {
    var size = str_ind - lit_start | 0;
    return 0 === size ?
      [0,fmt] :
      1 === size ?
       [0,[12,caml_string_get(str, lit_start),fmt]] :
       [0,[11,call3(Stdlib_string[4], str, lit_start, size),fmt]];
  }
  function parse_literal(lit_start, str_ind, end_ind) {
    var str_ind__0 = str_ind;
    for (; ; ) {
      if (str_ind__0 === end_ind) {
        return add_literal(lit_start, str_ind__0, 0);
      }
      var match = caml_string_get(str, str_ind__0);
      if (37 === match) {
        var match__0 = parse_format(str_ind__0, end_ind);
        var fmt_rest = match__0[1];
        return add_literal(lit_start, str_ind__0, fmt_rest);
      }
      if (64 === match) {
        var match__1 = parse_after_at(str_ind__0 + 1 | 0, end_ind);
        var fmt_rest__0 = match__1[1];
        return add_literal(lit_start, str_ind__0, fmt_rest__0);
      }
      var str_ind__1 = str_ind__0 + 1 | 0;
      var str_ind__0 = str_ind__1;
      continue;
    }
  }
  function parse(beg_ind, end_ind) {
    return parse_literal(beg_ind, beg_ind, end_ind);
  }
  function parse_flags(pct_ind, str_ind, end_ind, ign) {
    var zero = [0,0];
    var minus = [0,0];
    var plus = [0,0];
    var space = [0,0];
    var hash = [0,0];
    function set_flag(str_ind, flag) {
      var bm_ = flag[1];
      var bn_ = bm_ ? 1 - legacy_behavior__0 : bm_;
      if (bn_) {
        var bo_ = caml_string_get(str, str_ind);
        call3(failwith_message(A_), str, str_ind, bo_);
      }
      flag[1] = 1;
      return 0;
    }
    function read_flags(str_ind) {
      var str_ind__0 = str_ind;
      for (; ; ) {
        if (str_ind__0 === end_ind) {unexpected_end_of_format(end_ind);}
        var match = caml_string_get(str, str_ind__0);
        var switcher = match + -32 | 0;
        if (! (16 < switcher >>> 0)) {
          switch (switcher) {
            case 0:
              set_flag(str_ind__0, space);
              var str_ind__1 = str_ind__0 + 1 | 0;
              var str_ind__0 = str_ind__1;
              continue;
            case 3:
              set_flag(str_ind__0, hash);
              var str_ind__2 = str_ind__0 + 1 | 0;
              var str_ind__0 = str_ind__2;
              continue;
            case 11:
              set_flag(str_ind__0, plus);
              var str_ind__3 = str_ind__0 + 1 | 0;
              var str_ind__0 = str_ind__3;
              continue;
            case 13:
              set_flag(str_ind__0, minus);
              var str_ind__4 = str_ind__0 + 1 | 0;
              var str_ind__0 = str_ind__4;
              continue;
            case 16:
              set_flag(str_ind__0, zero);
              var str_ind__5 = str_ind__0 + 1 | 0;
              var str_ind__0 = str_ind__5;
              continue
            }
        }
        return parse_padding(
          pct_ind,
          str_ind__0,
          end_ind,
          zero[1],
          minus[1],
          plus[1],
          hash[1],
          space[1],
          ign
        );
      }
    }
    return read_flags(str_ind);
  }
  function parse_ign(pct_ind, str_ind, end_ind) {
    if (str_ind === end_ind) {unexpected_end_of_format(end_ind);}
    var match = caml_string_get(str, str_ind);
    return 95 === match ?
      parse_flags(pct_ind, str_ind + 1 | 0, end_ind, 1) :
      parse_flags(pct_ind, str_ind, end_ind, 0);
  }
  function parse_format(pct_ind, end_ind) {
    return parse_ign(pct_ind, pct_ind + 1 | 0, end_ind);
  }
  function parse_conversion(pct_ind, str_ind, end_ind, plus, hash, space, ign, pad, prec, padprec, symb) {
    var plus_used = [0,0];
    var hash_used = [0,0];
    var space_used = [0,0];
    var ign_used = [0,0];
    var pad_used = [0,0];
    var prec_used = [0,0];
    function get_plus(param) {plus_used[1] = 1;return plus;}
    function get_hash(param) {hash_used[1] = 1;return hash;}
    function get_space(param) {space_used[1] = 1;return space;}
    function get_ign(param) {ign_used[1] = 1;return ign;}
    function get_pad(param) {pad_used[1] = 1;return pad;}
    function get_prec(param) {prec_used[1] = 1;return prec;}
    function get_padprec(param) {pad_used[1] = 1;return padprec;}
    function get_int_pad(param) {
      var pad = get_pad(0);
      var match = get_prec(0);
      if (typeof match === "number") {if (0 === match) {return pad;}}
      if (typeof pad === "number") return 0;
      else {
        if (0 === pad[0]) {
          if (2 <= pad[1]) {
            var n = pad[2];
            return legacy_behavior__0 ?
              [0,1,n] :
              incompatible_flag(pct_ind, str_ind, 48, cst_precision__0);
          }
          return pad;
        }
        return 2 <= pad[1] ?
          legacy_behavior__0 ?
           F_ :
           incompatible_flag(pct_ind, str_ind, 48, cst_precision__1) :
          pad;
      }
    }
    function check_no_0(symb, pad) {
      if (typeof pad === "number") return pad;
      else {
        if (0 === pad[0]) {
          if (2 <= pad[1]) {
            var width = pad[2];
            return legacy_behavior__0 ?
              [0,1,width] :
              incompatible_flag(pct_ind, str_ind, symb, cst_0__0);
          }
          return pad;
        }
        return 2 <= pad[1] ?
          legacy_behavior__0 ?
           G_ :
           incompatible_flag(pct_ind, str_ind, symb, cst_0__1) :
          pad;
      }
    }
    function opt_of_pad(c, pad) {
      if (typeof pad === "number") return 0;
      else {
        if (0 === pad[0]) {
          switch (pad[1]) {
            case 0:
              var width = pad[2];
              return legacy_behavior__0 ?
                [0,width] :
                incompatible_flag(pct_ind, str_ind, c, cst__25);
            case 1:
              var width__0 = pad[2];
              return [0,width__0];
            default:
              var width__1 = pad[2];
              return legacy_behavior__0 ?
                [0,width__1] :
                incompatible_flag(pct_ind, str_ind, c, cst_0__2)
            }
        }
        return incompatible_flag(pct_ind, str_ind, c, cst__26);
      }
    }
    function get_pad_opt(c) {return opt_of_pad(c, get_pad(0));}
    function get_padprec_opt(c) {return opt_of_pad(c, get_padprec(0));}
    function get_prec_opt(param) {
      var match = get_prec(0);
      if (typeof match === "number") {
        return 0 === match ?
          0 :
          incompatible_flag(pct_ind, str_ind, 95, cst__27);
      }
      var ndec = match[1];
      return [0,ndec];
    }
    if (124 <= symb) var switch__0 = 0;
    else switch (symb) {
      case 33:
        var match__5 = parse(str_ind, end_ind);
        var fmt_rest__5 = match__5[1];
        var fmt_result = [0,[10,fmt_rest__5]];
        var switch__0 = 1;
        break;
      case 40:
        var sub_end = search_subformat_end(str_ind, end_ind, 41);
        var match__7 = parse(sub_end + 2 | 0, end_ind);
        var fmt_rest__7 = match__7[1];
        var match__8 = parse(str_ind, sub_end);
        var sub_fmt = match__8[1];
        var sub_fmtty = fmtty_of_fmt(sub_fmt);
        if (get_ign(0)) {
          var ignored__2 = [9,get_pad_opt(95),sub_fmtty];
          var a3_ = [0,[23,ignored__2,fmt_rest__7]];
        }
        else var a3_ = [0,[14,get_pad_opt(40),sub_fmtty,fmt_rest__7]];
        var fmt_result = a3_;
        var switch__0 = 1;
        break;
      case 44:
        var fmt_result = parse(str_ind, end_ind);
        var switch__0 = 1;
        break;
      case 67:
        var match__11 = parse(str_ind, end_ind);
        var fmt_rest__10 = match__11[1];
        var a5_ = get_ign(0) ? [0,[23,1,fmt_rest__10]] : [0,[1,fmt_rest__10]];
        var fmt_result = a5_;
        var switch__0 = 1;
        break;
      case 78:
        var match__15 = parse(str_ind, end_ind);
        var fmt_rest__14 = match__15[1];
        var counter__0 = 2;
        if (get_ign(0)) {
          var ignored__6 = [11,counter__0];
          var ba_ = [0,[23,ignored__6,fmt_rest__14]];
        }
        else var ba_ = [0,[21,counter__0,fmt_rest__14]];
        var fmt_result = ba_;
        var switch__0 = 1;
        break;
      case 83:
        var pad__6 = check_no_0(symb, get_padprec(0));
        var match__16 = parse(str_ind, end_ind);
        var fmt_rest__15 = match__16[1];
        if (get_ign(0)) {
          var ignored__7 = [1,get_padprec_opt(95)];
          var bb_ = [0,[23,ignored__7,fmt_rest__15]];
        }
        else {
          var match__17 = make_padding_fmt_ebb(pad__6, fmt_rest__15);
          var fmt_rest__16 = match__17[2];
          var pad__7 = match__17[1];
          var bb_ = [0,[3,pad__7,fmt_rest__16]];
        }
        var fmt_result = bb_;
        var switch__0 = 1;
        break;
      case 91:
        var match__20 = parse_char_set(str_ind, end_ind);
        var char_set = match__20[2];
        var next_ind = match__20[1];
        var match__21 = parse(next_ind, end_ind);
        var fmt_rest__19 = match__21[1];
        if (get_ign(0)) {
          var ignored__9 = [10,get_pad_opt(95),char_set];
          var bg_ = [0,[23,ignored__9,fmt_rest__19]];
        }
        else var bg_ = [0,[20,get_pad_opt(91),char_set,fmt_rest__19]];
        var fmt_result = bg_;
        var switch__0 = 1;
        break;
      case 97:
        var match__22 = parse(str_ind, end_ind);
        var fmt_rest__20 = match__22[1];
        var fmt_result = [0,[15,fmt_rest__20]];
        var switch__0 = 1;
        break;
      case 99:
        var char_format = function(fmt_rest) {
          return get_ign(0) ? [0,[23,0,fmt_rest]] : [0,[0,fmt_rest]];
        };
        var scan_format = function(fmt_rest) {
          return get_ign(0) ? [0,[23,3,fmt_rest]] : [0,[22,fmt_rest]];
        };
        var match__23 = parse(str_ind, end_ind);
        var fmt_rest__21 = match__23[1];
        var match__24 = get_pad_opt(99);
        if (match__24) {
          var bh_ = 0 === match__24[1] ?
            scan_format(fmt_rest__21) :
            legacy_behavior__0 ?
             char_format(fmt_rest__21) :
             invalid_nonnull_char_width(str_ind);
          var bi_ = bh_;
        }
        else var bi_ = char_format(fmt_rest__21);
        var fmt_result = bi_;
        var switch__0 = 1;
        break;
      case 114:
        var match__25 = parse(str_ind, end_ind);
        var fmt_rest__22 = match__25[1];
        var bj_ = get_ign(0) ? [0,[23,2,fmt_rest__22]] : [0,[19,fmt_rest__22]];
        var fmt_result = bj_;
        var switch__0 = 1;
        break;
      case 115:
        var pad__9 = check_no_0(symb, get_padprec(0));
        var match__26 = parse(str_ind, end_ind);
        var fmt_rest__23 = match__26[1];
        if (get_ign(0)) {
          var ignored__10 = [0,get_padprec_opt(95)];
          var bk_ = [0,[23,ignored__10,fmt_rest__23]];
        }
        else {
          var match__27 = make_padding_fmt_ebb(pad__9, fmt_rest__23);
          var fmt_rest__24 = match__27[2];
          var pad__10 = match__27[1];
          var bk_ = [0,[2,pad__10,fmt_rest__24]];
        }
        var fmt_result = bk_;
        var switch__0 = 1;
        break;
      case 116:
        var match__28 = parse(str_ind, end_ind);
        var fmt_rest__25 = match__28[1];
        var fmt_result = [0,[16,fmt_rest__25]];
        var switch__0 = 1;
        break;
      case 123:
        var sub_end__0 = search_subformat_end(str_ind, end_ind, 125);
        var match__29 = parse(str_ind, sub_end__0);
        var sub_fmt__0 = match__29[1];
        var match__30 = parse(sub_end__0 + 2 | 0, end_ind);
        var fmt_rest__26 = match__30[1];
        var sub_fmtty__0 = fmtty_of_fmt(sub_fmt__0);
        if (get_ign(0)) {
          var ignored__11 = [8,get_pad_opt(95),sub_fmtty__0];
          var bl_ = [0,[23,ignored__11,fmt_rest__26]];
        }
        else var bl_ = [0,[13,get_pad_opt(123),sub_fmtty__0,fmt_rest__26]];
        var fmt_result = bl_;
        var switch__0 = 1;
        break;
      case 66:
      case 98:
        var pad__3 = check_no_0(symb, get_padprec(0));
        var match__9 = parse(str_ind, end_ind);
        var fmt_rest__8 = match__9[1];
        if (get_ign(0)) {
          var ignored__3 = [7,get_padprec_opt(95)];
          var a4_ = [0,[23,ignored__3,fmt_rest__8]];
        }
        else {
          var match__10 = make_padding_fmt_ebb(pad__3, fmt_rest__8);
          var fmt_rest__9 = match__10[2];
          var pad__4 = match__10[1];
          var a4_ = [0,[9,pad__4,fmt_rest__9]];
        }
        var fmt_result = a4_;
        var switch__0 = 1;
        break;
      case 37:
      case 64:
        var match__6 = parse(str_ind, end_ind);
        var fmt_rest__6 = match__6[1];
        var fmt_result = [0,[12,symb,fmt_rest__6]];
        var switch__0 = 1;
        break;
      case 76:
      case 108:
      case 110:
        if (str_ind === end_ind) var switch__1 = 1;
        else if (is_int_base(caml_string_get(str, str_ind))) {var switch__0 = 0;var switch__1 = 0;}
        else var switch__1 = 1;
        if (switch__1) {
          var match__14 = parse(str_ind, end_ind);
          var fmt_rest__13 = match__14[1];
          var counter = counter_of_char(symb);
          if (get_ign(0)) {
            var ignored__5 = [11,counter];
            var a__ = [0,[23,ignored__5,fmt_rest__13]];
          }
          else var a__ = [0,[21,counter,fmt_rest__13]];
          var fmt_result = a__;
          var switch__0 = 1;
        }
        break;
      case 32:
      case 35:
      case 43:
      case 45:
      case 95:
        var fmt_result = call3(failwith_message(K_), str, pct_ind, symb);
        var switch__0 = 1;
        break;
      case 88:
      case 100:
      case 105:
      case 111:
      case 117:
      case 120:
        var bc_ = get_space(0);
        var bd_ = get_hash(0);
        var iconv__2 = compute_int_conv(
          pct_ind,
          str_ind,
          get_plus(0),
          bd_,
          bc_,
          symb
        );
        var match__18 = parse(str_ind, end_ind);
        var fmt_rest__17 = match__18[1];
        if (get_ign(0)) {
          var ignored__8 = [2,iconv__2,get_pad_opt(95)];
          var be_ = [0,[23,ignored__8,fmt_rest__17]];
        }
        else {
          var bf_ = get_prec(0);
          var match__19 = make_padprec_fmt_ebb(
            get_int_pad(0),
            bf_,
            fmt_rest__17
          );
          var fmt_rest__18 = match__19[3];
          var prec__4 = match__19[2];
          var pad__8 = match__19[1];
          var be_ = [0,[4,iconv__2,pad__8,prec__4,fmt_rest__18]];
        }
        var fmt_result = be_;
        var switch__0 = 1;
        break;
      case 69:
      case 70:
      case 71:
      case 72:
      case 101:
      case 102:
      case 103:
      case 104:
        var a6_ = get_space(0);
        var fconv = compute_float_conv(
          pct_ind,
          str_ind,
          get_plus(0),
          a6_,
          symb
        );
        var match__12 = parse(str_ind, end_ind);
        var fmt_rest__11 = match__12[1];
        if (get_ign(0)) {
          var a7_ = get_prec_opt(0);
          var ignored__4 = [6,get_pad_opt(95),a7_];
          var a8_ = [0,[23,ignored__4,fmt_rest__11]];
        }
        else {
          var a9_ = get_prec(0);
          var match__13 = make_padprec_fmt_ebb(get_pad(0), a9_, fmt_rest__11);
          var fmt_rest__12 = match__13[3];
          var prec__3 = match__13[2];
          var pad__5 = match__13[1];
          var a8_ = [0,[8,fconv,pad__5,prec__3,fmt_rest__12]];
        }
        var fmt_result = a8_;
        var switch__0 = 1;
        break;
      default:
        var switch__0 = 0
      }
    if (! switch__0) {
      if (108 <= symb) if (111 <= symb) var switch__2 = 0;
      else {
        var switcher = symb + -108 | 0;
        switch (switcher) {
          case 0:
            var aN_ = caml_string_get(str, str_ind);
            var aO_ = get_space(0);
            var aP_ = get_hash(0);
            var iconv = compute_int_conv(
              pct_ind,
              str_ind + 1 | 0,
              get_plus(0),
              aP_,
              aO_,
              aN_
            );
            var match = parse(str_ind + 1 | 0, end_ind);
            var fmt_rest = match[1];
            if (get_ign(0)) {
              var ignored = [3,iconv,get_pad_opt(95)];
              var aQ_ = [0,[23,ignored,fmt_rest]];
            }
            else {
              var aS_ = get_prec(0);
              var match__0 = make_padprec_fmt_ebb(
                get_int_pad(0),
                aS_,
                fmt_rest
              );
              var fmt_rest__0 = match__0[3];
              var prec__0 = match__0[2];
              var pad__0 = match__0[1];
              var aQ_ = [0,[5,iconv,pad__0,prec__0,fmt_rest__0]];
            }
            var aR_ = aQ_;
            var switch__3 = 1;
            break;
          case 1:
            var switch__2 = 0;
            var switch__3 = 0;
            break;
          default:
            var aT_ = caml_string_get(str, str_ind);
            var aU_ = get_space(0);
            var aV_ = get_hash(0);
            var iconv__0 = compute_int_conv(
              pct_ind,
              str_ind + 1 | 0,
              get_plus(0),
              aV_,
              aU_,
              aT_
            );
            var match__1 = parse(str_ind + 1 | 0, end_ind);
            var fmt_rest__1 = match__1[1];
            if (get_ign(0)) {
              var ignored__0 = [4,iconv__0,get_pad_opt(95)];
              var aW_ = [0,[23,ignored__0,fmt_rest__1]];
            }
            else {
              var aX_ = get_prec(0);
              var match__2 = make_padprec_fmt_ebb(
                get_int_pad(0),
                aX_,
                fmt_rest__1
              );
              var fmt_rest__2 = match__2[3];
              var prec__1 = match__2[2];
              var pad__1 = match__2[1];
              var aW_ = [0,[6,iconv__0,pad__1,prec__1,fmt_rest__2]];
            }
            var aR_ = aW_;
            var switch__3 = 1
          }
        if (switch__3) {var fmt_result = aR_;var switch__2 = 1;}
      }
      else if (76 === symb) {
        var aY_ = caml_string_get(str, str_ind);
        var aZ_ = get_space(0);
        var a0_ = get_hash(0);
        var iconv__1 = compute_int_conv(
          pct_ind,
          str_ind + 1 | 0,
          get_plus(0),
          a0_,
          aZ_,
          aY_
        );
        var match__3 = parse(str_ind + 1 | 0, end_ind);
        var fmt_rest__3 = match__3[1];
        if (get_ign(0)) {
          var ignored__1 = [5,iconv__1,get_pad_opt(95)];
          var a1_ = [0,[23,ignored__1,fmt_rest__3]];
        }
        else {
          var a2_ = get_prec(0);
          var match__4 = make_padprec_fmt_ebb(get_int_pad(0), a2_, fmt_rest__3
          );
          var fmt_rest__4 = match__4[3];
          var prec__2 = match__4[2];
          var pad__2 = match__4[1];
          var a1_ = [0,[7,iconv__1,pad__2,prec__2,fmt_rest__4]];
        }
        var fmt_result = a1_;
        var switch__2 = 1;
      }
      else var switch__2 = 0;
      if (! switch__2) {
        var fmt_result = call3(
          failwith_message(H_),
          str,
          str_ind + -1 | 0,
          symb
        );
      }
    }
    if (1 - legacy_behavior__0) {
      var aE_ = 1 - plus_used[1];
      var plus__0 = aE_ ? plus : aE_;
      if (plus__0) {incompatible_flag(pct_ind, str_ind, symb, cst__28);}
      var aF_ = 1 - hash_used[1];
      var hash__0 = aF_ ? hash : aF_;
      if (hash__0) {incompatible_flag(pct_ind, str_ind, symb, cst__29);}
      var aG_ = 1 - space_used[1];
      var space__0 = aG_ ? space : aG_;
      if (space__0) {incompatible_flag(pct_ind, str_ind, symb, cst__30);}
      var aH_ = 1 - pad_used[1];
      var aI_ = aH_ ? caml_notequal([0,pad], I_) : aH_;
      if (aI_) {incompatible_flag(pct_ind, str_ind, symb, cst_padding__0);}
      var aJ_ = 1 - prec_used[1];
      var aK_ = aJ_ ? caml_notequal([0,prec], J_) : aJ_;
      if (aK_) {
        var aL_ = ign ? 95 : symb;
        incompatible_flag(pct_ind, str_ind, aL_, cst_precision__2);
      }
      var plus__1 = ign ? plus : ign;
      if (plus__1) {incompatible_flag(pct_ind, str_ind, 95, cst__31);}
    }
    var aM_ = 1 - ign_used[1];
    var ign__0 = aM_ ? ign : aM_;
    if (ign__0) {
      var switch__4 = 38 <= symb ?
        44 === symb ? 0 : 64 === symb ? 0 : 1 :
        33 === symb ? 0 : 37 <= symb ? 0 : 1;
      var switch__5 = switch__4 ? 0 : legacy_behavior__0 ? 1 : 0;
      if (! switch__5) {incompatible_flag(pct_ind, str_ind, symb, cst__32);}
    }
    return fmt_result;
  }
  function parse_after_precision(pct_ind, str_ind, end_ind, minus, plus, hash, space, ign, pad, match) {
    if (str_ind === end_ind) {unexpected_end_of_format(end_ind);}
    function parse_conv(padprec) {
      return parse_conversion(
        pct_ind,
        str_ind + 1 | 0,
        end_ind,
        plus,
        hash,
        space,
        ign,
        pad,
        match,
        padprec,
        caml_string_get(str, str_ind)
      );
    }
    if (typeof pad === "number") {
      if (typeof match === "number") {
        if (0 === match) {return parse_conv(0);}
      }
      if (0 === minus) {
        if (typeof match === "number") {return parse_conv(D_);}
        var n = match[1];
        return parse_conv([0,1,n]);
      }
      if (typeof match === "number") {return parse_conv(E_);}
      var n__0 = match[1];
      return parse_conv([0,0,n__0]);
    }
    return parse_conv(pad);
  }
  function parse_precision(pct_ind, str_ind, end_ind, minus, plus, hash, space, ign, pad) {
    if (str_ind === end_ind) {unexpected_end_of_format(end_ind);}
    function parse_literal(minus, str_ind) {
      var match = parse_positive(str_ind, end_ind, 0);
      var prec = match[2];
      var new_ind = match[1];
      return parse_after_precision(
        pct_ind,
        new_ind,
        end_ind,
        minus,
        plus,
        hash,
        space,
        ign,
        pad,
        [0,prec]
      );
    }
    var symb = caml_string_get(str, str_ind);
    if (48 <= symb) {
      if (! (58 <= symb)) {return parse_literal(minus, str_ind);}
    }
    else if (42 <= symb) {
      var switcher = symb + -42 | 0;
      switch (switcher) {
        case 0:
          return parse_after_precision(
            pct_ind,
            str_ind + 1 | 0,
            end_ind,
            minus,
            plus,
            hash,
            space,
            ign,
            pad,
            1
          );
        case 1:
        case 3:
          if (legacy_behavior__0) {
            var aD_ = str_ind + 1 | 0;
            var minus__0 = minus ? minus : 45 === symb ? 1 : 0;
            return parse_literal(minus__0, aD_);
          }
          break
        }
    }
    return legacy_behavior__0 ?
      parse_after_precision(
       pct_ind,
       str_ind,
       end_ind,
       minus,
       plus,
       hash,
       space,
       ign,
       pad,
       C_
     ) :
      invalid_format_without(str_ind + -1 | 0, 46, cst_precision);
  }
  function parse_after_padding(pct_ind, str_ind, end_ind, minus, plus, hash, space, ign, pad) {
    if (str_ind === end_ind) {unexpected_end_of_format(end_ind);}
    var symb = caml_string_get(str, str_ind);
    return 46 === symb ?
      parse_precision(
       pct_ind,
       str_ind + 1 | 0,
       end_ind,
       minus,
       plus,
       hash,
       space,
       ign,
       pad
     ) :
      parse_conversion(
       pct_ind,
       str_ind + 1 | 0,
       end_ind,
       plus,
       hash,
       space,
       ign,
       pad,
       0,
       pad,
       symb
     );
  }
  function parse_padding(pct_ind, str_ind, end_ind, zero, minus, plus, hash, space, ign) {
    if (str_ind === end_ind) {unexpected_end_of_format(end_ind);}
    var padty = 0 === zero ?
      0 === minus ? 1 : 0 :
      0 === minus ?
       2 :
       legacy_behavior__0 ? 0 : incompatible_flag(pct_ind, str_ind, 45, cst_0);
    var match = caml_string_get(str, str_ind);
    if (48 <= match) {
      if (! (58 <= match)) {
        var match__0 = parse_positive(str_ind, end_ind, 0);
        var width = match__0[2];
        var new_ind = match__0[1];
        return parse_after_padding(
          pct_ind,
          new_ind,
          end_ind,
          minus,
          plus,
          hash,
          space,
          ign,
          [0,padty,width]
        );
      }
    }
    else if (42 === match) {
      return parse_after_padding(
        pct_ind,
        str_ind + 1 | 0,
        end_ind,
        minus,
        plus,
        hash,
        space,
        ign,
        [1,padty]
      );
    }
    switch (padty) {
      case 0:
        if (1 - legacy_behavior__0) {
          invalid_format_without(str_ind + -1 | 0, 45, cst_padding);
        }
        return parse_after_padding(
          pct_ind,
          str_ind,
          end_ind,
          minus,
          plus,
          hash,
          space,
          ign,
          0
        );
      case 1:
        return parse_after_padding(
          pct_ind,
          str_ind,
          end_ind,
          minus,
          plus,
          hash,
          space,
          ign,
          0
        );
      default:
        return parse_after_padding(
          pct_ind,
          str_ind,
          end_ind,
          minus,
          plus,
          hash,
          space,
          ign,
          B_
        )
      }
  }
  function parse_magic_size(str_ind, end_ind) {
    try {
      var str_ind_1 = parse_spaces(str_ind, end_ind);
      var match__2 = caml_string_get(str, str_ind_1);
      var switch__0 = 48 <= match__2 ?
        58 <= match__2 ? 0 : 1 :
        45 === match__2 ? 1 : 0;
      if (switch__0) {
        var match__3 = parse_integer(str_ind_1, end_ind);
        var size = match__3[2];
        var str_ind_2 = match__3[1];
        var str_ind_3 = parse_spaces(str_ind_2, end_ind);
        if (62 !== caml_string_get(str, str_ind_3)) {
          throw caml_wrap_thrown_exception(Stdlib[8]);
        }
        var s = call3(
          Stdlib_string[4],
          str,
          str_ind + -2 | 0,
          (str_ind_3 - str_ind | 0) + 3 | 0
        );
        var aB_ = [0,[0,str_ind_3 + 1 | 0,[1,s,size]]];
      }
      else var aB_ = 0;
      var aA_ = aB_;
    }
    catch(aC_) {
      aC_ = runtime["caml_wrap_exception"](aC_);
      if (aC_ !== Stdlib[8]) {
        if (aC_[1] !== Stdlib[7]) {
          throw caml_wrap_thrown_exception_reraise(aC_);
        }
      }
      var az_ = 0;
      var aA_ = az_;
    }
    if (aA_) {
      var match = aA_[1];
      var formatting_lit = match[2];
      var next_ind = match[1];
      var match__0 = parse(next_ind, end_ind);
      var fmt_rest = match__0[1];
      return [0,[17,formatting_lit,fmt_rest]];
    }
    var match__1 = parse(str_ind, end_ind);
    var fmt_rest__0 = match__1[1];
    return [0,[17,O_,fmt_rest__0]];
  }
  function parse_good_break(str_ind, end_ind) {
    try {
      var as_ = str_ind === end_ind ? 1 : 0;
      var at_ = as_ ? as_ : 60 !== caml_string_get(str, str_ind) ? 1 : 0;
      if (at_) {throw caml_wrap_thrown_exception(Stdlib[8]);}
      var str_ind_1 = parse_spaces(str_ind + 1 | 0, end_ind);
      var match__0 = caml_string_get(str, str_ind_1);
      var switch__0 = 48 <= match__0 ?
        58 <= match__0 ? 0 : 1 :
        45 === match__0 ? 1 : 0;
      if (! switch__0) {throw caml_wrap_thrown_exception(Stdlib[8]);}
      var match__1 = parse_integer(str_ind_1, end_ind);
      var width = match__1[2];
      var str_ind_2 = match__1[1];
      var str_ind_3 = parse_spaces(str_ind_2, end_ind);
      var match__2 = caml_string_get(str, str_ind_3);
      var switcher = match__2 + -45 | 0;
      if (12 < switcher >>> 0) if (17 === switcher) {
        var s = call3(
          Stdlib_string[4],
          str,
          str_ind + -2 | 0,
          (str_ind_3 - str_ind | 0) + 3 | 0
        );
        var au_ = [0,s,width,0];
        var av_ = str_ind_3 + 1 | 0;
        var next_ind = av_;
        var formatting_lit__0 = au_;
        var switch__1 = 1;
      }
      else var switch__1 = 0;
      else {
        var switcher__0 = switcher + -1 | 0;
        if (1 < switcher__0 >>> 0) {
          var match__3 = parse_integer(str_ind_3, end_ind);
          var offset = match__3[2];
          var str_ind_4 = match__3[1];
          var str_ind_5 = parse_spaces(str_ind_4, end_ind);
          if (62 !== caml_string_get(str, str_ind_5)) {
            throw caml_wrap_thrown_exception(Stdlib[8]);
          }
          var s__0 = call3(
            Stdlib_string[4],
            str,
            str_ind + -2 | 0,
            (str_ind_5 - str_ind | 0) + 3 | 0
          );
          var aw_ = [0,s__0,width,offset];
          var ax_ = str_ind_5 + 1 | 0;
          var next_ind = ax_;
          var formatting_lit__0 = aw_;
          var switch__1 = 1;
        }
        else var switch__1 = 0;
      }
      if (! switch__1) {throw caml_wrap_thrown_exception(Stdlib[8]);}
    }
    catch(ay_) {
      ay_ = runtime["caml_wrap_exception"](ay_);
      if (ay_ !== Stdlib[8]) {
        if (ay_[1] !== Stdlib[7]) {
          throw caml_wrap_thrown_exception_reraise(ay_);
        }
      }
      var next_ind = str_ind;
      var formatting_lit__0 = formatting_lit;
    }
    var match = parse(next_ind, end_ind);
    var fmt_rest = match[1];
    return [0,[17,formatting_lit__0,fmt_rest]];
  }
  function parse_tag(is_open_tag, str_ind, end_ind) {
    try {
      if (str_ind === end_ind) {throw caml_wrap_thrown_exception(Stdlib[8]);}
      var match__0 = caml_string_get(str, str_ind);
      if (60 === match__0) {
        var ind = call3(Stdlib_string[18], str, str_ind + 1 | 0, 62);
        if (end_ind <= ind) {throw caml_wrap_thrown_exception(Stdlib[8]);}
        var sub_str = call3(
          Stdlib_string[4],
          str,
          str_ind,
          (ind - str_ind | 0) + 1 | 0
        );
        var match__1 = parse(ind + 1 | 0, end_ind);
        var fmt_rest__0 = match__1[1];
        var match__2 = parse(str_ind, ind + 1 | 0);
        var sub_fmt = match__2[1];
        var sub_format__0 = [0,sub_fmt,sub_str];
        if (is_open_tag) var formatting__0 = [
          0,
          sub_format__0
        ];
        else {check_open_box(sub_fmt);var formatting__0 = [1,sub_format__0];}
        var aq_ = [0,[18,formatting__0,fmt_rest__0]];
        return aq_;
      }
      throw caml_wrap_thrown_exception(Stdlib[8]);
    }
    catch(ar_) {
      ar_ = runtime["caml_wrap_exception"](ar_);
      if (ar_ === Stdlib[8]) {
        var match = parse(str_ind, end_ind);
        var fmt_rest = match[1];
        var formatting = is_open_tag ? [0,sub_format] : [1,sub_format];
        return [0,[18,formatting,fmt_rest]];
      }
      throw caml_wrap_thrown_exception_reraise(ar_);
    }
  }
  function parse_after_at(str_ind, end_ind) {
    if (str_ind === end_ind) {return L_;}
    var c = caml_string_get(str, str_ind);
    if (65 <= c) {
      if (94 <= c) {
        var switcher = c + -123 | 0;
        if (! (2 < switcher >>> 0)) {
          switch (switcher) {
            case 0:
              return parse_tag(1, str_ind + 1 | 0, end_ind);
            case 1:break;
            default:
              var match__0 = parse(str_ind + 1 | 0, end_ind);
              var fmt_rest__0 = match__0[1];
              return [0,[17,1,fmt_rest__0]]
            }
        }
      }
      else if (91 <= c) {
        var switcher__0 = c + -91 | 0;
        switch (switcher__0) {
          case 0:
            return parse_tag(0, str_ind + 1 | 0, end_ind);
          case 1:break;
          default:
            var match__1 = parse(str_ind + 1 | 0, end_ind);
            var fmt_rest__1 = match__1[1];
            return [0,[17,0,fmt_rest__1]]
          }
      }
    }
    else {
      if (10 === c) {
        var match__2 = parse(str_ind + 1 | 0, end_ind);
        var fmt_rest__2 = match__2[1];
        return [0,[17,3,fmt_rest__2]];
      }
      if (32 <= c) {
        var switcher__1 = c + -32 | 0;
        switch (switcher__1) {
          case 0:
            var match__3 = parse(str_ind + 1 | 0, end_ind);
            var fmt_rest__3 = match__3[1];
            return [0,[17,M_,fmt_rest__3]];
          case 5:
            if ((str_ind + 1 | 0) < end_ind) {
              if (37 === caml_string_get(str, str_ind + 1 | 0)) {
                var match__4 = parse(str_ind + 2 | 0, end_ind);
                var fmt_rest__4 = match__4[1];
                return [0,[17,6,fmt_rest__4]];
              }
            }
            var match__5 = parse(str_ind, end_ind);
            var fmt_rest__5 = match__5[1];
            return [0,[12,64,fmt_rest__5]];
          case 12:
            var match__6 = parse(str_ind + 1 | 0, end_ind);
            var fmt_rest__6 = match__6[1];
            return [0,[17,N_,fmt_rest__6]];
          case 14:
            var match__7 = parse(str_ind + 1 | 0, end_ind);
            var fmt_rest__7 = match__7[1];
            return [0,[17,4,fmt_rest__7]];
          case 27:
            return parse_good_break(str_ind + 1 | 0, end_ind);
          case 28:
            return parse_magic_size(str_ind + 1 | 0, end_ind);
          case 31:
            var match__8 = parse(str_ind + 1 | 0, end_ind);
            var fmt_rest__8 = match__8[1];
            return [0,[17,2,fmt_rest__8]];
          case 32:
            var match__9 = parse(str_ind + 1 | 0, end_ind);
            var fmt_rest__9 = match__9[1];
            return [0,[17,5,fmt_rest__9]]
          }
      }
    }
    var match = parse(str_ind + 1 | 0, end_ind);
    var fmt_rest = match[1];
    return [0,[17,[2,c],fmt_rest]];
  }
  function check_open_box(fmt) {
    if (! (typeof fmt === "number") && 11 === fmt[0]) {
      if (typeof fmt[2] === "number") {
        var str = fmt[1];
        try {open_box_of_string(str);var ao_ = 0;return ao_;}
        catch(ap_) {
          ap_ = runtime["caml_wrap_exception"](ap_);
          if (ap_[1] === Stdlib[7]) {return 0;}
          throw caml_wrap_thrown_exception_reraise(ap_);
        }
      }
    }
    return 0;
  }
  function parse_char_set(str_ind, end_ind) {
    if (str_ind === end_ind) {unexpected_end_of_format(end_ind);}
    var char_set = create_char_set(0);
    function add_char(c) {return add_in_char_set(char_set, c);}
    function add_range(c__0, c) {
      if (! (c < c__0)) {
        var i = c__0;
        for (; ; ) {
          add_in_char_set(char_set, call1(Stdlib[29], i));
          var an_ = i + 1 | 0;
          if (c !== i) {var i = an_;continue;}
          break;
        }
      }
      return 0;
    }
    function fail_single_percent(str_ind) {
      return call2(failwith_message(P_), str, str_ind);
    }
    function parse_char_set_content(counter, str_ind, end_ind) {
      var str_ind__0 = str_ind;
      for (; ; ) {
        if (str_ind__0 === end_ind) {unexpected_end_of_format(end_ind);}
        var c = caml_string_get(str, str_ind__0);
        if (45 === c) {
          add_char(45);
          var str_ind__1 = str_ind__0 + 1 | 0;
          var str_ind__0 = str_ind__1;
          continue;
        }
        if (93 === c) {return str_ind__0 + 1 | 0;}
        var am_ = str_ind__0 + 1 | 0;
        if (counter < 50) {
          var counter__0 = counter + 1 | 0;
          return parse_char_set_after_char__0(counter__0, am_, end_ind, c);
        }
        return caml_trampoline_return(
          parse_char_set_after_char__0,
          [0,am_,end_ind,c]
        );
      }
    }
    function parse_char_set_after_char__0(counter, str_ind, end_ind, c) {
      var str_ind__0 = str_ind;
      var c__0 = c;
      for (; ; ) {
        if (str_ind__0 === end_ind) {unexpected_end_of_format(end_ind);}
        var c__1 = caml_string_get(str, str_ind__0);
        if (46 <= c__1) if (64 === c__1
        ) var switch__0 = 0;
        else {
          if (93 === c__1) {add_char(c__0);return str_ind__0 + 1 | 0;}
          var switch__0 = 1;
        }
        else if (37 === c__1) var switch__0 = 0;
        else {
          if (45 <= c__1) {
            var al_ = str_ind__0 + 1 | 0;
            if (counter < 50) {
              var counter__0 = counter + 1 | 0;
              return parse_char_set_after_minus(counter__0, al_, end_ind, c__0
              );
            }
            return caml_trampoline_return(
              parse_char_set_after_minus,
              [0,al_,end_ind,c__0]
            );
          }
          var switch__0 = 1;
        }
        if (! switch__0) {
          if (37 === c__0) {
            add_char(c__1);
            var ak_ = str_ind__0 + 1 | 0;
            if (counter < 50) {
              var counter__1 = counter + 1 | 0;
              return parse_char_set_content(counter__1, ak_, end_ind);
            }
            return caml_trampoline_return(
              parse_char_set_content,
              [0,ak_,end_ind]
            );
          }
        }
        if (37 === c__0) {fail_single_percent(str_ind__0);}
        add_char(c__0);
        var str_ind__1 = str_ind__0 + 1 | 0;
        var str_ind__0 = str_ind__1;
        var c__0 = c__1;
        continue;
      }
    }
    function parse_char_set_after_minus(counter, str_ind, end_ind, c) {
      if (str_ind === end_ind) {unexpected_end_of_format(end_ind);}
      var c__0 = caml_string_get(str, str_ind);
      if (37 === c__0) {
        if ((str_ind + 1 | 0) === end_ind) {
          unexpected_end_of_format(end_ind);
        }
        var c__1 = caml_string_get(str, str_ind + 1 | 0);
        if (37 !== c__1) {
          if (64 !== c__1) {return fail_single_percent(str_ind);}
        }
        add_range(c, c__1);
        var ai_ = str_ind + 2 | 0;
        if (counter < 50) {
          var counter__1 = counter + 1 | 0;
          return parse_char_set_content(counter__1, ai_, end_ind);
        }
        return caml_trampoline_return(parse_char_set_content, [0,ai_,end_ind]);
      }
      if (93 === c__0) {add_char(c);add_char(45);return str_ind + 1 | 0;}
      add_range(c, c__0);
      var aj_ = str_ind + 1 | 0;
      if (counter < 50) {
        var counter__0 = counter + 1 | 0;
        return parse_char_set_content(counter__0, aj_, end_ind);
      }
      return caml_trampoline_return(parse_char_set_content, [0,aj_,end_ind]);
    }
    function parse_char_set_after_char(str_ind, end_ind, c) {
      return caml_trampoline(
        parse_char_set_after_char__0(0, str_ind, end_ind, c)
      );
    }
    function parse_char_set_start(str_ind, end_ind) {
      if (str_ind === end_ind) {unexpected_end_of_format(end_ind);}
      var c = caml_string_get(str, str_ind);
      return parse_char_set_after_char(str_ind + 1 | 0, end_ind, c);
    }
    if (str_ind === end_ind) {unexpected_end_of_format(end_ind);}
    var match = caml_string_get(str, str_ind);
    if (94 === match) {
      var str_ind__0 = str_ind + 1 | 0;
      var reverse = 1;
      var str_ind__1 = str_ind__0;
      var reverse__0 = reverse;
    }
    else {var ah_ = 0;var str_ind__1 = str_ind;var reverse__0 = ah_;}
    var next_ind = parse_char_set_start(str_ind__1, end_ind);
    var char_set__0 = freeze_char_set(char_set);
    var ag_ = reverse__0 ? rev_char_set(char_set__0) : char_set__0;
    return [0,next_ind,ag_];
  }
  function parse_spaces(str_ind, end_ind) {
    var str_ind__0 = str_ind;
    for (; ; ) {
      if (str_ind__0 === end_ind) {unexpected_end_of_format(end_ind);}
      if (32 === caml_string_get(str, str_ind__0)) {
        var str_ind__1 = str_ind__0 + 1 | 0;
        var str_ind__0 = str_ind__1;
        continue;
      }
      return str_ind__0;
    }
  }
  function parse_positive(str_ind, end_ind, acc) {
    var str_ind__0 = str_ind;
    var acc__0 = acc;
    for (; ; ) {
      if (str_ind__0 === end_ind) {unexpected_end_of_format(end_ind);}
      var c = caml_string_get(str, str_ind__0);
      var switcher = c + -48 | 0;
      if (9 < switcher >>> 0) {return [0,str_ind__0,acc__0];}
      var acc__1 = (acc__0 * 10 | 0) + (c - 48 | 0) | 0;
      if (Stdlib_sys[13] < acc__1) {
        var af_ = Stdlib_sys[13];
        return call3(failwith_message(Q_), str, acc__1, af_);
      }
      var str_ind__1 = str_ind__0 + 1 | 0;
      var str_ind__0 = str_ind__1;
      var acc__0 = acc__1;
      continue;
    }
  }
  function parse_integer(str_ind, end_ind) {
    if (str_ind === end_ind) {unexpected_end_of_format(end_ind);}
    var match = caml_string_get(str, str_ind);
    if (48 <= match) {
      if (! (58 <= match)) {return parse_positive(str_ind, end_ind, 0);}
    }
    else if (45 === match) {
      if ((str_ind + 1 | 0) === end_ind) {unexpected_end_of_format(end_ind);}
      var c = caml_string_get(str, str_ind + 1 | 0);
      var switcher = c + -48 | 0;
      if (9 < switcher >>> 0) {
        return expected_character(str_ind + 1 | 0, cst_digit, c);
      }
      var match__0 = parse_positive(str_ind + 1 | 0, end_ind, 0);
      var n = match__0[2];
      var next_ind = match__0[1];
      return [0,next_ind,- n | 0];
    }
    throw caml_wrap_thrown_exception([0,Assert_failure,R_]);
  }
  function search_subformat_end(str_ind, end_ind, c) {
    var str_ind__0 = str_ind;
    for (; ; ) {
      if (str_ind__0 === end_ind) {
        call3(failwith_message(S_), str, c, end_ind);
      }
      var match = caml_string_get(str, str_ind__0);
      if (37 === match) {
        if ((str_ind__0 + 1 | 0) === end_ind) {unexpected_end_of_format(end_ind);}
        if (caml_string_get(str, str_ind__0 + 1 | 0) === c) {return str_ind__0;}
        var match__0 = caml_string_get(str, str_ind__0 + 1 | 0);
        if (95 <= match__0) {
          if (123 <= match__0) {
            if (! (126 <= match__0)) {
              var switcher = match__0 + -123 | 0;
              switch (switcher) {
                case 0:
                  var sub_end = search_subformat_end(
                    str_ind__0 + 2 | 0,
                    end_ind,
                    125
                  );
                  var str_ind__2 = sub_end + 2 | 0;
                  var str_ind__0 = str_ind__2;
                  continue;
                case 1:break;
                default:
                  return expected_character(
                    str_ind__0 + 1 | 0,
                    cst_character,
                    125
                  )
                }
            }
          }
          else if (! (96 <= match__0)) {
            if ((str_ind__0 + 2 | 0) === end_ind) {unexpected_end_of_format(end_ind);}
            var match__1 = caml_string_get(str, str_ind__0 + 2 | 0);
            if (40 === match__1) {
              var sub_end__0 = search_subformat_end(
                str_ind__0 + 3 | 0,
                end_ind,
                41
              );
              var str_ind__3 = sub_end__0 + 2 | 0;
              var str_ind__0 = str_ind__3;
              continue;
            }
            if (123 === match__1) {
              var sub_end__1 = search_subformat_end(
                str_ind__0 + 3 | 0,
                end_ind,
                125
              );
              var str_ind__4 = sub_end__1 + 2 | 0;
              var str_ind__0 = str_ind__4;
              continue;
            }
            var str_ind__5 = str_ind__0 + 3 | 0;
            var str_ind__0 = str_ind__5;
            continue;
          }
        }
        else {
          if (40 === match__0) {
            var sub_end__2 = search_subformat_end(
              str_ind__0 + 2 | 0,
              end_ind,
              41
            );
            var str_ind__6 = sub_end__2 + 2 | 0;
            var str_ind__0 = str_ind__6;
            continue;
          }
          if (41 === match__0) {
            return expected_character(str_ind__0 + 1 | 0, cst_character__0, 41
            );
          }
        }
        var str_ind__1 = str_ind__0 + 2 | 0;
        var str_ind__0 = str_ind__1;
        continue;
      }
      var str_ind__7 = str_ind__0 + 1 | 0;
      var str_ind__0 = str_ind__7;
      continue;
    }
  }
  function is_int_base(symb) {
    var ae_ = symb + -88 | 0;
    if (! (32 < ae_ >>> 0)) {
      switch (ae_) {case 0:case 12:case 17:case 23:case 29:case 32:return 1}
    }
    return 0;
  }
  function counter_of_char(symb) {
    if (108 <= symb) {
      if (! (111 <= symb)) {
        var switcher = symb + -108 | 0;
        switch (switcher) {case 0:return 0;case 1:break;default:return 1}
      }
    }
    else if (76 === symb) {return 2;}
    throw caml_wrap_thrown_exception([0,Assert_failure,T_]);
  }
  function incompatible_flag(pct_ind, str_ind, symb, option) {
    var subfmt = call3(Stdlib_string[4], str, pct_ind, str_ind - pct_ind | 0);
    return call5(failwith_message(W_), str, pct_ind, option, symb, subfmt);
  }
  function compute_int_conv(pct_ind, str_ind, plus, hash, space, symb) {
    var plus__0 = plus;
    var hash__0 = hash;
    var space__0 = space;
    for (; ; ) {
      if (0 === plus__0) if (0 === hash__0) if (0 === space__0
      ) {
        var switcher = symb + -88 | 0;
        if (32 < switcher >>> 0) var switch__0 = 1;
        else switch (switcher) {
          case 0:
            return 8;
          case 12:
            return 0;
          case 17:
            return 3;
          case 23:
            return 10;
          case 29:
            return 12;
          case 32:
            return 6;
          default:
            var switch__0 = 1
          }
      }
      else {
        if (100 === symb) {return 2;}
        if (105 === symb) {return 5;}
        var switch__0 = 1;
      }
      else if (0 === space__0) {
        var switcher__0 = symb + -88 | 0;
        if (32 < switcher__0 >>> 0) var switch__0 = 0;
        else switch (switcher__0) {
          case 0:
            return 9;
          case 12:
            return 13;
          case 17:
            return 14;
          case 23:
            return 11;
          case 29:
            return 15;
          case 32:
            return 7;
          default:
            var switch__0 = 0
          }
      }
      else var switch__0 = 0;
      else if (0 === hash__0) if (0 === space__0
      ) {
        if (100 === symb) {return 1;}
        if (105 === symb) {return 4;}
        var switch__0 = 1;
      }
      else var switch__0 = 1;
      else var switch__0 = 0;
      if (! switch__0) {
        var switcher__1 = symb + -88 | 0;
        if (! (32 < switcher__1 >>> 0)) {
          switch (switcher__1) {
            case 0:
              if (legacy_behavior__0) {return 9;}
              break;
            case 23:
              if (legacy_behavior__0) {return 11;}
              break;
            case 32:
              if (legacy_behavior__0) {return 7;}
              break;
            case 12:
            case 17:
            case 29:
              if (legacy_behavior__0) {var hash__0 = 0;continue;}
              return incompatible_flag(pct_ind, str_ind, symb, cst__36)
            }
        }
      }
      if (0 === plus__0) {
        if (0 === space__0) {
          throw caml_wrap_thrown_exception([0,Assert_failure,U_]);
        }
        if (legacy_behavior__0) {var space__0 = 0;continue;}
        return incompatible_flag(pct_ind, str_ind, symb, cst__33);
      }
      if (0 === space__0) {
        if (legacy_behavior__0) {var plus__0 = 0;continue;}
        return incompatible_flag(pct_ind, str_ind, symb, cst__34);
      }
      if (legacy_behavior__0) {var space__0 = 0;continue;}
      return incompatible_flag(pct_ind, str_ind, 32, cst__35);
    }
  }
  function compute_float_conv(pct_ind, str_ind, plus, space, symb) {
    var plus__0 = plus;
    var space__0 = space;
    for (; ; ) {
      if (0 === plus__0) {
        if (0 === space__0) {
          if (73 <= symb) {
            var switcher = symb + -101 | 0;
            if (! (3 < switcher >>> 0)) {
              switch (switcher) {
                case 0:
                  return 3;
                case 1:
                  return 0;
                case 2:
                  return 9;
                default:
                  return 16
                }
            }
          }
          else if (69 <= symb) {
            var switcher__0 = symb + -69 | 0;
            switch (switcher__0) {
              case 0:
                return 6;
              case 1:
                return 15;
              case 2:
                return 12;
              default:
                return 19
              }
          }
          throw caml_wrap_thrown_exception([0,Assert_failure,V_]);
        }
        if (73 <= symb) {
          var switcher__1 = symb + -101 | 0;
          if (! (3 < switcher__1 >>> 0)) {
            switch (switcher__1) {
              case 0:
                return 5;
              case 1:
                return 2;
              case 2:
                return 11;
              default:
                return 18
              }
          }
        }
        else if (69 <= symb) {
          var switcher__2 = symb + -69 | 0;
          switch (switcher__2) {
            case 0:
              return 8;
            case 1:break;
            case 2:
              return 14;
            default:
              return 21
            }
        }
        if (legacy_behavior__0) {var space__0 = 0;continue;}
        return incompatible_flag(pct_ind, str_ind, symb, cst__37);
      }
      if (0 === space__0) {
        if (73 <= symb) {
          var switcher__3 = symb + -101 | 0;
          if (! (3 < switcher__3 >>> 0)) {
            switch (switcher__3) {
              case 0:
                return 4;
              case 1:
                return 1;
              case 2:
                return 10;
              default:
                return 17
              }
          }
        }
        else if (69 <= symb) {
          var switcher__4 = symb + -69 | 0;
          switch (switcher__4) {
            case 0:
              return 7;
            case 1:break;
            case 2:
              return 13;
            default:
              return 20
            }
        }
        if (legacy_behavior__0) {var plus__0 = 0;continue;}
        return incompatible_flag(pct_ind, str_ind, symb, cst__38);
      }
      if (legacy_behavior__0) {var space__0 = 0;continue;}
      return incompatible_flag(pct_ind, str_ind, 32, cst__39);
    }
  }
  return parse(0, caml_ml_string_length(str));
}

function format_of_string_fmtty(str, fmtty) {
  var match = fmt_ebb_of_string(0, str);
  var fmt = match[1];
  try {var ac_ = [0,type_format(fmt, fmtty),str];return ac_;}
  catch(ad_) {
    ad_ = runtime["caml_wrap_exception"](ad_);
    if (ad_ === Type_mismatch) {
      var ab_ = string_of_fmtty(fmtty);
      return call2(failwith_message(X_), str, ab_);
    }
    throw caml_wrap_thrown_exception_reraise(ad_);
  }
}

function format_of_string_format(str, param) {
  var str__0 = param[2];
  var fmt = param[1];
  var match = fmt_ebb_of_string(0, str);
  var fmt__0 = match[1];
  try {var Z_ = [0,type_format(fmt__0, fmtty_of_fmt(fmt)),str];return Z_;}
  catch(aa_) {
    aa_ = runtime["caml_wrap_exception"](aa_);
    if (aa_ === Type_mismatch) {
      return call2(failwith_message(Y_), str, str__0);
    }
    throw caml_wrap_thrown_exception_reraise(aa_);
  }
}

var CamlinternalFormat = [
  0,
  is_in_char_set,
  rev_char_set,
  create_char_set,
  add_in_char_set,
  freeze_char_set,
  param_format_of_ignored_format,
  make_printf,
  make_iprintf,
  output_acc,
  bufput_acc,
  strput_acc,
  type_format,
  fmt_ebb_of_string,
  format_of_string_fmtty,
  format_of_string_format,
  char_of_iconv,
  string_of_formatting_lit,
  string_of_formatting_gen,
  string_of_fmtty,
  string_of_fmt,
  open_box_of_string,
  symm,
  trans,
  recast
];

module.exports = CamlinternalFormat;

/*::type Exports = {
  is_in_char_set: (char_set: any, c: any) => any,
  rev_char_set: (char_set: any) => any,
  create_char_set: (param: any) => any,
  add_in_char_set: (char_set: any, c: any) => any,
  freeze_char_set: (char_set: any) => any,
  param_format_of_ignored_format: (ign: any, fmt: any) => any,
  make_printf: (k: any, acc: any, fmt: any) => any,
  make_iprintf: (k: any, o: any, fmt: any) => any,
  output_acc: (o: any, acc: any) => any,
  bufput_acc: (b: any, acc: any) => any,
  strput_acc: (b: any, acc: any) => any,
  type_format: (fmt: any, fmtty: any) => any,
  fmt_ebb_of_string: (legacy_behavior: any, str: any) => any,
  format_of_string_fmtty: (str: any, fmtty: any) => any,
  format_of_string_format: (str: any, param: any) => any,
  char_of_iconv: (iconv: any) => any,
  string_of_formatting_lit: (formatting_lit: any) => any,
  string_of_formatting_gen: (formatting_gen: any) => any,
  string_of_fmtty: (fmtty: any) => any,
  string_of_fmt: (fmt: any) => any,
  open_box_of_string: (str: any) => any,
  symm: (param: any) => any,
  trans: (ty1: any, ty2: any) => any,
  recast: (fmt: any, fmtty: any) => any,
}*/
/** @type {{
  is_in_char_set: (char_set: any, c: any) => any,
  rev_char_set: (char_set: any) => any,
  create_char_set: (param: any) => any,
  add_in_char_set: (char_set: any, c: any) => any,
  freeze_char_set: (char_set: any) => any,
  param_format_of_ignored_format: (ign: any, fmt: any) => any,
  make_printf: (k: any, acc: any, fmt: any) => any,
  make_iprintf: (k: any, o: any, fmt: any) => any,
  output_acc: (o: any, acc: any) => any,
  bufput_acc: (b: any, acc: any) => any,
  strput_acc: (b: any, acc: any) => any,
  type_format: (fmt: any, fmtty: any) => any,
  fmt_ebb_of_string: (legacy_behavior: any, str: any) => any,
  format_of_string_fmtty: (str: any, fmtty: any) => any,
  format_of_string_format: (str: any, param: any) => any,
  char_of_iconv: (iconv: any) => any,
  string_of_formatting_lit: (formatting_lit: any) => any,
  string_of_formatting_gen: (formatting_gen: any) => any,
  string_of_fmtty: (fmtty: any) => any,
  string_of_fmt: (fmt: any) => any,
  open_box_of_string: (str: any) => any,
  symm: (param: any) => any,
  trans: (ty1: any, ty2: any) => any,
  recast: (fmt: any, fmtty: any) => any,
}} */
module.exports = ((module.exports /*:: : any*/) /*:: :Exports */);
module.exports.is_in_char_set = module.exports[1];
module.exports.rev_char_set = module.exports[2];
module.exports.create_char_set = module.exports[3];
module.exports.add_in_char_set = module.exports[4];
module.exports.freeze_char_set = module.exports[5];
module.exports.param_format_of_ignored_format = module.exports[6];
module.exports.make_printf = module.exports[7];
module.exports.make_iprintf = module.exports[8];
module.exports.output_acc = module.exports[9];
module.exports.bufput_acc = module.exports[10];
module.exports.strput_acc = module.exports[11];
module.exports.type_format = module.exports[12];
module.exports.fmt_ebb_of_string = module.exports[13];
module.exports.format_of_string_fmtty = module.exports[14];
module.exports.format_of_string_format = module.exports[15];
module.exports.char_of_iconv = module.exports[16];
module.exports.string_of_formatting_lit = module.exports[17];
module.exports.string_of_formatting_gen = module.exports[18];
module.exports.string_of_fmtty = module.exports[19];
module.exports.string_of_fmt = module.exports[20];
module.exports.open_box_of_string = module.exports[21];
module.exports.symm = module.exports[22];
module.exports.trans = module.exports[23];
module.exports.recast = module.exports[24];

/* Hashing disabled */
