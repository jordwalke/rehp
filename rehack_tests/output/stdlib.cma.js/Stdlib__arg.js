/**
 * @flow strict
 * Stdlib__arg
 */

// @ts-check


"use strict";

var runtime = require("../runtime/runtime.js");
var caml_check_bound = runtime["caml_check_bound"];
var caml_equal = runtime["caml_equal"];
var caml_fresh_oo_id = runtime["caml_fresh_oo_id"];
var caml_ml_string_length = runtime["caml_ml_string_length"];
var string = runtime["caml_new_string"];
var caml_string_get = runtime["caml_string_get"];
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

function call6(f, a0, a1, a2, a3, a4, a5) {
  return f.length === 6 ?
    f(a0, a1, a2, a3, a4, a5) :
    runtime["caml_call_gen"](f, [a0,a1,a2,a3,a4,a5]);
}

var cst__6 = string("");
var cst__7 = string("\n");
var cst_a_boolean = string("a boolean");
var cst_an_integer = string("an integer");
var cst_an_integer__0 = string("an integer");
var cst_a_float = string("a float");
var cst_a_float__0 = string("a float");
var cst__3 = string("");
var cst__4 = string(" ");
var cst__5 = string("");
var cst_one_of = string("one of: ");
var cst_Arg_Expand_is_is_only_allowed_with_Arg_parse_and_expand_argv_dynamic = string(
  "Arg.Expand is is only allowed with Arg.parse_and_expand_argv_dynamic"
);
var cst_no_argument = string("no argument");
var cst__2 = string("(?)");
var cst_help__3 = string("--help");
var cst_help__4 = string("-help");
var cst_help__2 = string("-help");
var cst_Display_this_list_of_options = string(" Display this list of options");
var cst_help = string("-help");
var cst_help__1 = string("--help");
var cst_Display_this_list_of_options__0 = string(
  " Display this list of options"
);
var cst_help__0 = string("--help");
var cst = string("}");
var cst__0 = string("|");
var cst__1 = string("{");
var cst_none = string("<none>");
var cst_Stdlib_Arg_Bad = string("Stdlib.Arg.Bad");
var cst_Stdlib_Arg_Help = string("Stdlib.Arg.Help");
var cst_Stdlib_Arg_Stop = string("Stdlib.Arg.Stop");
var Stdlib = require("./Stdlib.js");
var Stdlib_printf = require("./Stdlib__printf.js");
var Stdlib_array = require("./Stdlib__array.js");
var Stdlib_buffer = require("./Stdlib__buffer.js");
var Stdlib_list = require("./Stdlib__list.js");
var Stdlib_string = require("./Stdlib__string.js");
var Stdlib_sys = require("./Stdlib__sys.js");
var v_ = [0,[2,0,[0,0]],string("%s%c")];
var p_ = [0,[2,0,0],string("%s")];
var q_ = [0,[2,0,0],string("%s")];
var n_ = [0,[2,0,0],string("%s")];
var o_ = [0,[2,0,0],string("%s")];
var l_ = [0,[2,0,0],string("%s")];
var m_ = [0,[2,0,0],string("%s")];
var f_ = [
  0,
  [2,0,[11,string(": unknown option '"),[2,0,[11,string("'.\n"),0]]]],
  string("%s: unknown option '%s'.\n")
];
var i_ = [
  0,
  [
    2,
    0,
    [
      11,
      string(": wrong argument '"),
      [
        2,
        0,
        [
          11,
          string("'; option '"),
          [2,0,[11,string("' expects "),[2,0,[11,string(".\n"),0]]]]
        ]
      ]
    ]
  ],
  string("%s: wrong argument '%s'; option '%s' expects %s.\n")
];
var j_ = [
  0,
  [2,0,[11,string(": option '"),[2,0,[11,string("' needs an argument.\n"),0]]]
  ],
  string("%s: option '%s' needs an argument.\n")
];
var k_ = [
  0,
  [2,0,[11,string(": "),[2,0,[11,string(".\n"),0]]]],
  string("%s: %s.\n")
];
var g_ = [0,string("-help")];
var h_ = [0,string("--help")];
var e_ = [0,[2,0,0],string("%s")];
var d_ = [0,[2,0,[12,10,0]],string("%s\n")];
var c_ = [0,string("-help")];
var a_ = [
  0,
  [11,string("  "),[2,0,[12,32,[2,0,[12,10,0]]]]],
  string("  %s %s\n")
];
var b_ = [
  0,
  [11,string("  "),[2,0,[12,32,[2,0,[2,0,[12,10,0]]]]]],
  string("  %s %s%s\n")
];
var Bad = [248,cst_Stdlib_Arg_Bad,caml_fresh_oo_id(0)];
var Help = [248,cst_Stdlib_Arg_Help,caml_fresh_oo_id(0)];
var Stop = [248,cst_Stdlib_Arg_Stop,caml_fresh_oo_id(0)];

function assoc3(x, l) {
  var l__0 = l;
  for (; ; ) {
    if (l__0) {
      var t = l__0[2];
      var match = l__0[1];
      var y2 = match[2];
      var y1 = match[1];
      if (caml_equal(y1, x)) {return y2;}
      var l__0 = t;
      continue;
    }
    throw caml_wrap_thrown_exception(Stdlib[8]);
  }
}

function split(s) {
  var i = call2(Stdlib_string[14], s, 61);
  var len = caml_ml_string_length(s);
  var aE_ = call3(Stdlib_string[4], s, i + 1 | 0, len - (i + 1 | 0) | 0);
  return [0,call3(Stdlib_string[4], s, 0, i),aE_];
}

function make_symlist(prefix, sep, suffix, l) {
  if (l) {
    var t = l[2];
    var h = l[1];
    var aA_ = call2(Stdlib[28], prefix, h);
    var aB_ = function(x, y) {
      var aD_ = call2(Stdlib[28], sep, y);
      return call2(Stdlib[28], x, aD_);
    };
    var aC_ = call3(Stdlib_list[21], aB_, aA_, t);
    return call2(Stdlib[28], aC_, suffix);
  }
  return cst_none;
}

function print_spec(buf, param) {
  var doc = param[3];
  var spec = param[2];
  var key = param[1];
  var ay_ = 0 < caml_ml_string_length(doc) ? 1 : 0;
  if (ay_) {
    if (11 === spec[0]) {
      var l = spec[1];
      var az_ = make_symlist(cst__1, cst__0, cst, l);
      return call5(Stdlib_printf[5], buf, b_, key, az_, doc);
    }
    return call4(Stdlib_printf[5], buf, a_, key, doc);
  }
  return ay_;
}

function help_action(param) {throw caml_wrap_thrown_exception([0,Stop,c_]);}

function add_help(speclist) {
  try {assoc3(cst_help__2, speclist);var av_ = 0;var ar_ = av_;}
  catch(ax_) {
    ax_ = runtime["caml_wrap_exception"](ax_);
    if (ax_ !== Stdlib[8]) {throw caml_wrap_thrown_exception_reraise(ax_);}
    var aq_ = [
      0,
      [0,cst_help,[0,help_action],cst_Display_this_list_of_options],
      0
    ];
    var ar_ = aq_;
  }
  try {assoc3(cst_help__1, speclist);var au_ = 0;var add2 = au_;}
  catch(aw_) {
    aw_ = runtime["caml_wrap_exception"](aw_);
    if (aw_ !== Stdlib[8]) {throw caml_wrap_thrown_exception_reraise(aw_);}
    var as_ = [
      0,
      [0,cst_help__0,[0,help_action],cst_Display_this_list_of_options__0],
      0
    ];
    var add2 = as_;
  }
  var at_ = call2(Stdlib[37], ar_, add2);
  return call2(Stdlib[37], speclist, at_);
}

function usage_b(buf, speclist, errmsg) {
  call3(Stdlib_printf[5], buf, d_, errmsg);
  var an_ = add_help(speclist);
  function ao_(ap_) {return print_spec(buf, ap_);}
  return call2(Stdlib_list[15], ao_, an_);
}

function usage_string(speclist, errmsg) {
  var b = call1(Stdlib_buffer[1], 200);
  usage_b(b, speclist, errmsg);
  return call1(Stdlib_buffer[2], b);
}

function usage(speclist, errmsg) {
  var am_ = usage_string(speclist, errmsg);
  return call2(Stdlib_printf[3], e_, am_);
}

var current = [0,0];

function bool_of_string_opt(x) {
  try {var ak_ = [0,call1(Stdlib[32], x)];return ak_;}
  catch(al_) {
    al_ = runtime["caml_wrap_exception"](al_);
    if (al_[1] === Stdlib[6]) {return 0;}
    throw caml_wrap_thrown_exception_reraise(al_);
  }
}

function int_of_string_opt(x) {
  try {var ai_ = [0,runtime["caml_int_of_string"](x)];return ai_;}
  catch(aj_) {
    aj_ = runtime["caml_wrap_exception"](aj_);
    if (aj_[1] === Stdlib[7]) {return 0;}
    throw caml_wrap_thrown_exception_reraise(aj_);
  }
}

function float_of_string_opt(x) {
  try {var ag_ = [0,runtime["caml_float_of_string"](x)];return ag_;}
  catch(ah_) {
    ah_ = runtime["caml_wrap_exception"](ah_);
    if (ah_[1] === Stdlib[7]) {return 0;}
    throw caml_wrap_thrown_exception_reraise(ah_);
  }
}

function parse_and_expand_argv_dynamic_aux(allow_expand, current, argv, speclist, anonfun, errmsg) {
  var initpos = current[1];
  function convert_error(error) {
    var b = call1(Stdlib_buffer[1], 200);
    var progname = initpos < argv[1].length - 1 ?
      caml_check_bound(argv[1], initpos)[initpos + 1] :
      cst__2;
    switch (error[0]) {
      case 0:
        var af_ = error[1];
        if (caml_string_notequal(af_, cst_help__3)) {
          if (caml_string_notequal(af_, cst_help__4)) {
            call4(Stdlib_printf[5], b, f_, progname, af_);
          }
        }
        break;
      case 1:
        var expected = error[3];
        var arg = error[2];
        var opt = error[1];
        call6(Stdlib_printf[5], b, i_, progname, arg, opt, expected);
        break;
      case 2:
        var s = error[1];
        call4(Stdlib_printf[5], b, j_, progname, s);
        break;
      default:
        var s__0 = error[1];
        call4(Stdlib_printf[5], b, k_, progname, s__0)
      }
    usage_b(b, speclist[1], errmsg);
    if (! caml_equal(error, g_)) {
      if (! caml_equal(error, h_)) {
        return [0,Bad,call1(Stdlib_buffer[2], b)];
      }
    }
    return [0,Help,call1(Stdlib_buffer[2], b)];
  }
  current[1] += 1;
  for (; ; ) {
    if (current[1] < argv[1].length - 1) {
      try {
        var X_ = current[1];
        var s = caml_check_bound(argv[1], X_)[X_ + 1];
        if (1 <= caml_ml_string_length(s)) if (45 === caml_string_get(s, 0)) {
          try {
            var follow__1 = 0;
            var Z_ = assoc3(s, speclist[1]);
            var action = Z_;
            var follow__0 = follow__1;
          }
          catch(ad_) {
            ad_ = runtime["caml_wrap_exception"](ad_);
            if (ad_ !== Stdlib[8]) {
              throw caml_wrap_thrown_exception_reraise(ad_);
            }
            try {
              var match = split(s);
              var arg = match[2];
              var keyword = match[1];
              var follow = [0,arg];
              var Y_ = assoc3(keyword, speclist[1]);
            }
            catch(ae_) {
              ae_ = runtime["caml_wrap_exception"](ae_);
              if (ae_ === Stdlib[8]) {
                throw caml_wrap_thrown_exception([0,Stop,[0,s]]);
              }
              throw caml_wrap_thrown_exception_reraise(ae_);
            }
            var action = Y_;
            var follow__0 = follow;
          }
          var no_arg__0 = function(s, follow) {
            function no_arg(param) {
              if (follow) {
                var arg = follow[1];
                throw caml_wrap_thrown_exception(
                        [0,Stop,[1,s,arg,cst_no_argument]]
                      );
              }
              return 0;
            }
            return no_arg;
          };
          var no_arg = no_arg__0(s, follow__0);
          var get_arg__0 = function(s, follow) {
            function get_arg(param) {
              if (follow) {var arg = follow[1];return arg;}
              if ((current[1] + 1 | 0) < argv[1].length - 1) {
                var ac_ = current[1] + 1 | 0;
                return caml_check_bound(argv[1], ac_)[ac_ + 1];
              }
              throw caml_wrap_thrown_exception([0,Stop,[2,s]]);
            }
            return get_arg;
          };
          var get_arg = get_arg__0(s, follow__0);
          var consume_arg__0 = function(follow) {
            function consume_arg(param) {
              if (follow) {return 0;}
              current[1] += 1;
              return 0;
            }
            return consume_arg;
          };
          var consume_arg = consume_arg__0(follow__0);
          var treat_action__0 = function(s, no_arg, get_arg, consume_arg) {
            function treat_action(param) {
              switch (param[0]) {
                case 0:
                  var f = param[1];
                  no_arg(0);
                  return call1(f, 0);
                case 1:
                  var f__0 = param[1];
                  var arg = get_arg(0);
                  var match = bool_of_string_opt(arg);
                  if (match) {
                    var s__0 = match[1];
                    call1(f__0, s__0);
                    return consume_arg(0);
                  }
                  throw caml_wrap_thrown_exception(
                          [0,Stop,[1,s,arg,cst_a_boolean]]
                        );
                case 2:
                  var r = param[1];
                  no_arg(0);
                  r[1] = 1;
                  return 0;
                case 3:
                  var r__0 = param[1];
                  no_arg(0);
                  r__0[1] = 0;
                  return 0;
                case 4:
                  var f__1 = param[1];
                  var arg__0 = get_arg(0);
                  call1(f__1, arg__0);
                  return consume_arg(0);
                case 5:
                  var r__1 = param[1];
                  r__1[1] = get_arg(0);
                  return consume_arg(0);
                case 6:
                  var f__2 = param[1];
                  var arg__1 = get_arg(0);
                  var match__0 = int_of_string_opt(arg__1);
                  if (match__0) {
                    var x = match__0[1];
                    call1(f__2, x);
                    return consume_arg(0);
                  }
                  throw caml_wrap_thrown_exception(
                          [0,Stop,[1,s,arg__1,cst_an_integer]]
                        );
                case 7:
                  var r__2 = param[1];
                  var arg__2 = get_arg(0);
                  var match__1 = int_of_string_opt(arg__2);
                  if (match__1) {
                    var x__0 = match__1[1];
                    r__2[1] = x__0;
                    return consume_arg(0);
                  }
                  throw caml_wrap_thrown_exception(
                          [0,Stop,[1,s,arg__2,cst_an_integer__0]]
                        );
                case 8:
                  var f__3 = param[1];
                  var arg__3 = get_arg(0);
                  var match__2 = float_of_string_opt(arg__3);
                  if (match__2) {
                    var x__1 = match__2[1];
                    call1(f__3, x__1);
                    return consume_arg(0);
                  }
                  throw caml_wrap_thrown_exception(
                          [0,Stop,[1,s,arg__3,cst_a_float]]
                        );
                case 9:
                  var r__3 = param[1];
                  var arg__4 = get_arg(0);
                  var match__3 = float_of_string_opt(arg__4);
                  if (match__3) {
                    var x__2 = match__3[1];
                    r__3[1] = x__2;
                    return consume_arg(0);
                  }
                  throw caml_wrap_thrown_exception(
                          [0,Stop,[1,s,arg__4,cst_a_float__0]]
                        );
                case 10:
                  var specs = param[1];
                  no_arg(0);
                  return call2(Stdlib_list[15], treat_action, specs);
                case 11:
                  var f__4 = param[2];
                  var symb = param[1];
                  var arg__5 = get_arg(0);
                  if (call2(Stdlib_list[32], arg__5, symb)) {
                    call1(f__4, arg__5);
                    return consume_arg(0);
                  }
                  var aa_ = make_symlist(cst__5, cst__4, cst__3, symb);
                  throw caml_wrap_thrown_exception(
                          [0,Stop,[1,s,arg__5,call2(Stdlib[28], cst_one_of, aa_)]]
                        );
                case 12:
                  var f__5 = param[1];
                  no_arg(0);
                  for (; ; ) {
                    if (current[1] < (argv[1].length - 1 + -1 | 0)) {
                      var ab_ = current[1] + 1 | 0;
                      call1(f__5, caml_check_bound(argv[1], ab_)[ab_ + 1]);
                      consume_arg(0);
                      continue;
                    }
                    return 0;
                  }
                default:
                  var f__6 = param[1];
                  if (! allow_expand) {
                    throw caml_wrap_thrown_exception(
                            [
                              0,
                              Stdlib[6],
                              cst_Arg_Expand_is_is_only_allowed_with_Arg_parse_and_expand_argv_dynamic
                            ]
                          );
                  }
                  var arg__6 = get_arg(0);
                  var newarg = call1(f__6, arg__6);
                  consume_arg(0);
                  var before = call3(
                    Stdlib_array[7],
                    argv[1],
                    0,
                    current[1] + 1 | 0
                  );
                  var after = call3(
                    Stdlib_array[7],
                    argv[1],
                    current[1] + 1 | 0,
                    (argv[1].length - 1 - current[1] | 0) + -1 | 0
                  );
                  argv[1] =
                    call1(Stdlib_array[6], [0,before,[0,newarg,[0,after,0]]]);
                  return 0
                }
            }
            return treat_action;
          };
          var treat_action = treat_action__0(s, no_arg, get_arg, consume_arg);
          treat_action(action);
          var switch__0 = 1;
        }
        else var switch__0 = 0;
        else var switch__0 = 0;
        if (! switch__0) {call1(anonfun, s);}
      }
      catch(exn) {
        exn = runtime["caml_wrap_exception"](exn);
        if (exn[1] === Bad) {
          var m = exn[2];
          throw caml_wrap_thrown_exception(convert_error([3,m]));
        }
        if (exn[1] === Stop) {
          var e = exn[2];
          throw caml_wrap_thrown_exception(convert_error(e));
        }
        throw caml_wrap_thrown_exception_reraise(exn);
      }
      current[1] += 1;
      continue;
    }
    return 0;
  }
}

function parse_and_expand_argv_dynamic(current, argv, speclist, anonfun, errmsg) {
  return parse_and_expand_argv_dynamic_aux(
    1,
    current,
    argv,
    speclist,
    anonfun,
    errmsg
  );
}

function parse_argv_dynamic(opt, argv, speclist, anonfun, errmsg) {
  if (opt) {
    var sth = opt[1];
    var current__0 = sth;
  }
  else var current__0 = current;
  return parse_and_expand_argv_dynamic_aux(
    0,
    current__0,
    [0,argv],
    speclist,
    anonfun,
    errmsg
  );
}

function parse_argv(opt, argv, speclist, anonfun, errmsg) {
  if (opt) {
    var sth = opt[1];
    var current__0 = sth;
  }
  else var current__0 = current;
  return parse_argv_dynamic(
    [0,current__0],
    argv,
    [0,speclist],
    anonfun,
    errmsg
  );
}

function parse(l, f, msg) {
  try {var W_ = parse_argv(0, Stdlib_sys[1], l, f, msg);return W_;}
  catch(exn) {
    exn = runtime["caml_wrap_exception"](exn);
    if (exn[1] === Bad) {
      var msg__0 = exn[2];
      call2(Stdlib_printf[3], l_, msg__0);
      return call1(Stdlib[99], 2);
    }
    if (exn[1] === Help) {
      var msg__1 = exn[2];
      call2(Stdlib_printf[2], m_, msg__1);
      return call1(Stdlib[99], 0);
    }
    throw caml_wrap_thrown_exception_reraise(exn);
  }
}

function parse_dynamic(l, f, msg) {
  try {var V_ = parse_argv_dynamic(0, Stdlib_sys[1], l, f, msg);return V_;}
  catch(exn) {
    exn = runtime["caml_wrap_exception"](exn);
    if (exn[1] === Bad) {
      var msg__0 = exn[2];
      call2(Stdlib_printf[3], n_, msg__0);
      return call1(Stdlib[99], 2);
    }
    if (exn[1] === Help) {
      var msg__1 = exn[2];
      call2(Stdlib_printf[2], o_, msg__1);
      return call1(Stdlib[99], 0);
    }
    throw caml_wrap_thrown_exception_reraise(exn);
  }
}

function parse_expand(l, f, msg) {
  try {
    var argv = [0,Stdlib_sys[1]];
    var spec = [0,l];
    var current__0 = [0,current[1]];
    var U_ = parse_and_expand_argv_dynamic(current__0, argv, spec, f, msg);
    return U_;
  }
  catch(exn) {
    exn = runtime["caml_wrap_exception"](exn);
    if (exn[1] === Bad) {
      var msg__0 = exn[2];
      call2(Stdlib_printf[3], p_, msg__0);
      return call1(Stdlib[99], 2);
    }
    if (exn[1] === Help) {
      var msg__1 = exn[2];
      call2(Stdlib_printf[2], q_, msg__1);
      return call1(Stdlib[99], 0);
    }
    throw caml_wrap_thrown_exception_reraise(exn);
  }
}

function second_word(s) {
  var len = caml_ml_string_length(s);
  function loop(n) {
    var n__0 = n;
    for (; ; ) {
      if (len <= n__0) {return len;}
      if (32 === caml_string_get(s, n__0)) {
        var n__1 = n__0 + 1 | 0;
        var n__0 = n__1;
        continue;
      }
      return n__0;
    }
  }
  try {var n__0 = call2(Stdlib_string[14], s, 9);}
  catch(S_) {
    S_ = runtime["caml_wrap_exception"](S_);
    if (S_ === Stdlib[8]) {
      try {var n = call2(Stdlib_string[14], s, 32);}
      catch(T_) {
        T_ = runtime["caml_wrap_exception"](T_);
        if (T_ === Stdlib[8]) {return len;}
        throw caml_wrap_thrown_exception_reraise(T_);
      }
      return loop(n + 1 | 0);
    }
    throw caml_wrap_thrown_exception_reraise(S_);
  }
  return loop(n__0 + 1 | 0);
}

function max_arg_len(cur, param) {
  var doc = param[3];
  var spec = param[2];
  var kwd = param[1];
  if (11 === spec[0]) {
    return call2(Stdlib[17], cur, caml_ml_string_length(kwd));
  }
  var R_ = caml_ml_string_length(kwd) + second_word(doc) | 0;
  return call2(Stdlib[17], cur, R_);
}

function replace_leading_tab(s) {
  var seen = [0,0];
  function Q_(c) {
    if (9 === c) {if (! seen[1]) {seen[1] = 1;return 32;}}
    return c;
  }
  return call2(Stdlib_string[10], Q_, s);
}

function add_padding(len, ksd) {
  var J_ = ksd[2];
  var K_ = ksd[1];
  if (caml_string_notequal(ksd[3], cst__6)) {
    if (11 === J_[0]) {
      var msg__0 = ksd[3];
      var cutcol__0 = second_word(msg__0);
      var N_ = call2(Stdlib[17], 0, len - cutcol__0 | 0) + 3 | 0;
      var spaces__0 = call2(Stdlib_string[1], N_, 32);
      var O_ = replace_leading_tab(msg__0);
      var P_ = call2(Stdlib[28], spaces__0, O_);
      return [0,K_,J_,call2(Stdlib[28], cst__7, P_)];
    }
    var msg = ksd[3];
    var cutcol = second_word(msg);
    var kwd_len = caml_ml_string_length(K_);
    var diff = (len - kwd_len | 0) - cutcol | 0;
    if (0 < diff) {
      var spaces = call2(Stdlib_string[1], diff, 32);
      var L_ = replace_leading_tab(msg);
      var prefix = call3(Stdlib_string[4], L_, 0, cutcol);
      var suffix = call3(
        Stdlib_string[4],
        msg,
        cutcol,
        caml_ml_string_length(msg) - cutcol | 0
      );
      var M_ = call2(Stdlib[28], spaces, suffix);
      return [0,K_,J_,call2(Stdlib[28], prefix, M_)];
    }
    return [0,K_,J_,replace_leading_tab(msg)];
  }
  return ksd;
}

function align(opt, speclist) {
  if (opt) {
    var sth = opt[1];
    var limit = sth;
  }
  else var limit = Stdlib[19];
  var completed = add_help(speclist);
  var len = call3(Stdlib_list[21], max_arg_len, 0, completed);
  var len__0 = call2(Stdlib[16], len, limit);
  function H_(I_) {return add_padding(len__0, I_);}
  return call2(Stdlib_list[17], H_, completed);
}

function trim_cr(s) {
  var len = caml_ml_string_length(s);
  if (0 < len) {
    if (13 === caml_string_get(s, len + -1 | 0)) {
      return call3(Stdlib_string[4], s, 0, len + -1 | 0);
    }
  }
  return s;
}

function read_aux(trim, sep, file) {
  var ic = call1(Stdlib[80], file);
  var buf = call1(Stdlib_buffer[1], 200);
  var words = [0,0];
  function stash(param) {
    var word = call1(Stdlib_buffer[2], buf);
    var word__0 = trim ? trim_cr(word) : word;
    words[1] = [0,word__0,words[1]];
    return call1(Stdlib_buffer[8], buf);
  }
  try {
    for (; ; ) {
      var c = call1(Stdlib[82], ic);
      if (c === sep) stash(0);
      else call2(Stdlib_buffer[10], buf, c);
      continue;
    }
  }
  catch(G_) {
    G_ = runtime["caml_wrap_exception"](G_);
    if (G_ === Stdlib[12]) {
      if (0 < call1(Stdlib_buffer[7], buf)) {stash(0);}
      call1(Stdlib[93], ic);
      var F_ = call1(Stdlib_list[9], words[1]);
      return call1(Stdlib_array[12], F_);
    }
    throw caml_wrap_thrown_exception_reraise(G_);
  }
}

var r_ = 10;
var s_ = 1;

function read_arg(E_) {return read_aux(s_, r_, E_);}

var t_ = 0;
var u_ = 0;

function read_arg0(D_) {return read_aux(u_, t_, D_);}

function write_aux(sep, file, args) {
  var oc = call1(Stdlib[61], file);
  function C_(s) {return call4(Stdlib_printf[1], oc, v_, s, sep);}
  call2(Stdlib_array[13], C_, args);
  return call1(Stdlib[76], oc);
}

var w_ = 10;

function write_arg(A_, B_) {return write_aux(w_, A_, B_);}

var x_ = 0;

function write_arg0(y_, z_) {return write_aux(x_, y_, z_);}

var Stdlib_arg = [
  0,
  parse,
  parse_dynamic,
  parse_argv,
  parse_argv_dynamic,
  parse_and_expand_argv_dynamic,
  parse_expand,
  Help,
  Bad,
  usage,
  usage_string,
  align,
  current,
  read_arg,
  read_arg0,
  write_arg,
  write_arg0
];

module.exports = Stdlib_arg;

/*::type Exports = {
  parse: (l: any, f: any, msg: any) => any,
  parse_dynamic: (l: any, f: any, msg: any) => any,
  parse_argv: (opt: any, argv: any, speclist: any, anonfun: any, errmsg: any) => any,
  parse_argv_dynamic: (opt: any, argv: any, speclist: any, anonfun: any, errmsg: any) => any,
  parse_and_expand_argv_dynamic: (current: any, argv: any, speclist: any, anonfun: any, errmsg: any) => any,
  parse_expand: (l: any, f: any, msg: any) => any,
  Help: any,
  Bad: any,
  usage: (speclist: any, errmsg: any) => any,
  usage_string: (speclist: any, errmsg: any) => any,
  align: (opt: any, speclist: any) => any,
  current: any,
  read_arg: (file: any) => any,
  read_arg0: (file: any) => any,
  write_arg: (file: any, args: any) => any,
  write_arg0: (file: any, args: any) => any,
}*/
/** @type {{
  parse: (l: any, f: any, msg: any) => any,
  parse_dynamic: (l: any, f: any, msg: any) => any,
  parse_argv: (opt: any, argv: any, speclist: any, anonfun: any, errmsg: any) => any,
  parse_argv_dynamic: (opt: any, argv: any, speclist: any, anonfun: any, errmsg: any) => any,
  parse_and_expand_argv_dynamic: (current: any, argv: any, speclist: any, anonfun: any, errmsg: any) => any,
  parse_expand: (l: any, f: any, msg: any) => any,
  Help: any,
  Bad: any,
  usage: (speclist: any, errmsg: any) => any,
  usage_string: (speclist: any, errmsg: any) => any,
  align: (opt: any, speclist: any) => any,
  current: any,
  read_arg: (file: any) => any,
  read_arg0: (file: any) => any,
  write_arg: (file: any, args: any) => any,
  write_arg0: (file: any, args: any) => any,
}} */
module.exports = ((module.exports /*:: : any*/) /*:: :Exports */);
module.exports.parse = module.exports[1];
module.exports.parse_dynamic = module.exports[2];
module.exports.parse_argv = module.exports[3];
module.exports.parse_argv_dynamic = module.exports[4];
module.exports.parse_and_expand_argv_dynamic = module.exports[5];
module.exports.parse_expand = module.exports[6];
module.exports.Help = module.exports[7];
module.exports.Bad = module.exports[8];
module.exports.usage = module.exports[9];
module.exports.usage_string = module.exports[10];
module.exports.align = module.exports[11];
module.exports.current = module.exports[12];
module.exports.read_arg = module.exports[13];
module.exports.read_arg0 = module.exports[14];
module.exports.write_arg = module.exports[15];
module.exports.write_arg0 = module.exports[16];

/* Hashing disabled */
