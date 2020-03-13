/**
 * @flow strict
 * Arg
 */

// @ts-check


"use strict";

var runtime = require("../runtime/runtime.js");

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
var cst_Arg_Bad = string("Arg.Bad");
var cst_Arg_Help = string("Arg.Help");
var cst_Arg_Stop = string("Arg.Stop");
var Not_found = require("../runtime/Not_found.js");
var Printf = require("./Printf.js");
var Pervasives = require("./Pervasives.js");
var Array = require("./Array.js");
var Buffer = require("./Buffer.js");
var End_of_file = require("../runtime/End_of_file.js");
var List = require("./List.js");
var String = require("./String.js");
var Sys = require("./Sys.js");
var Invalid_argument = require("../runtime/Invalid_argument.js");
var Failure = require("../runtime/Failure.js");
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
var Bad = [248,cst_Arg_Bad,caml_fresh_oo_id(0)];
var Help = [248,cst_Arg_Help,caml_fresh_oo_id(0)];
var Stop = [248,cst_Arg_Stop,caml_fresh_oo_id(0)];

function assoc3(x, l) {
  var t;
  var match;
  var y2;
  var y1;
  var l__0 = l;
  for (; ; ) {
    if (l__0) {
      t = l__0[2];
      match = l__0[1];
      y2 = match[2];
      y1 = match[1];
      if (caml_equal(y1, x)) {return y2;}
      l__0 = t;
      continue;
    }
    throw caml_wrap_thrown_exception(Not_found);
  }
}

function split(s) {
  var i = call2(String[14], s, 61);
  var len = caml_ml_string_length(s);
  var aG_ = call3(String[4], s, i + 1 | 0, len - (i + 1 | 0) | 0);
  return [0,call3(String[4], s, 0, i),aG_];
}

function make_symlist(prefix, sep, suffix, l) {
  var aE_;
  var aD_;
  var aC_;
  var h;
  var t;
  if (l) {
    t = l[2];
    h = l[1];
    aC_ = call2(Pervasives[16], prefix, h);
    aD_ =
      function(x, y) {
        var aF_ = call2(Pervasives[16], sep, y);
        return call2(Pervasives[16], x, aF_);
      };
    aE_ = call3(List[20], aD_, aC_, t);
    return call2(Pervasives[16], aE_, suffix);
  }
  return cst_none;
}

function print_spec(buf, param) {
  var l;
  var aB_;
  var doc = param[3];
  var spec = param[2];
  var key = param[1];
  var aA_ = 0 < caml_ml_string_length(doc) ? 1 : 0;
  if (aA_) {
    if (11 === spec[0]) {
      l = spec[1];
      aB_ = make_symlist(cst__1, cst__0, cst, l);
      return call5(Printf[5], buf, b_, key, aB_, doc);
    }
    return call4(Printf[5], buf, a_, key, doc);
  }
  return aA_;
}

function help_action(param) {throw caml_wrap_thrown_exception([0,Stop,c_]);}

function add_help(speclist) {
  var ax_;
  var aw_;
  var add2;
  var au_;
  var at_;
  var as_;
  try {assoc3(cst_help__2, speclist);ax_ = 0;at_ = ax_;}
  catch(az_) {
    az_ = runtime["caml_wrap_exception"](az_);
    if (az_ !== Not_found) {throw caml_wrap_thrown_exception_reraise(az_);}
    as_ = [0,[0,cst_help,[0,help_action],cst_Display_this_list_of_options],0];
    at_ = as_;
  }
  try {assoc3(cst_help__1, speclist);aw_ = 0;add2 = aw_;}
  catch(ay_) {
    ay_ = runtime["caml_wrap_exception"](ay_);
    if (ay_ !== Not_found) {throw caml_wrap_thrown_exception_reraise(ay_);}
    au_ =
      [0,[0,cst_help__0,[0,help_action],cst_Display_this_list_of_options__0],0
      ];
    add2 = au_;
  }
  var av_ = call2(Pervasives[25], at_, add2);
  return call2(Pervasives[25], speclist, av_);
}

function usage_b(buf, speclist, errmsg) {
  call3(Printf[5], buf, d_, errmsg);
  var ap_ = add_help(speclist);
  function aq_(ar_) {return print_spec(buf, ar_);}
  return call2(List[15], aq_, ap_);
}

function usage_string(speclist, errmsg) {
  var b = call1(Buffer[1], 200);
  usage_b(b, speclist, errmsg);
  return call1(Buffer[2], b);
}

function usage(speclist, errmsg) {
  var ao_ = usage_string(speclist, errmsg);
  return call2(Printf[3], e_, ao_);
}

var current = [0,0];

function bool_of_string_opt(x) {
  var am_;
  try {am_ = [0,call1(Pervasives[19], x)];return am_;}
  catch(an_) {
    an_ = runtime["caml_wrap_exception"](an_);
    if (an_[1] === Invalid_argument) {return 0;}
    throw caml_wrap_thrown_exception_reraise(an_);
  }
}

function int_of_string_opt(x) {
  var ak_;
  try {ak_ = [0,runtime["caml_int_of_string"](x)];return ak_;}
  catch(al_) {
    al_ = runtime["caml_wrap_exception"](al_);
    if (al_[1] === Failure) {return 0;}
    throw caml_wrap_thrown_exception_reraise(al_);
  }
}

function float_of_string_opt(x) {
  var ai_;
  try {ai_ = [0,runtime["caml_float_of_string"](x)];return ai_;}
  catch(aj_) {
    aj_ = runtime["caml_wrap_exception"](aj_);
    if (aj_[1] === Failure) {return 0;}
    throw caml_wrap_thrown_exception_reraise(aj_);
  }
}

function parse_and_expand_argv_dynamic_aux(allow_expand, current, argv, speclist, anonfun, errmsg) {
  var m;
  var e;
  var Z_;
  var s;
  var match;
  var arg;
  var keyword;
  var follow;
  var aa_;
  var follow__0;
  var action;
  var no_arg;
  var get_arg;
  var consume_arg;
  var treat_action;
  var follow__1;
  var ab_;
  var treat_action__0;
  var consume_arg__0;
  var get_arg__0;
  var no_arg__0;
  var switch__0;
  var initpos = current[1];
  function convert_error(error) {
    var ah_;
    var expected;
    var arg;
    var opt;
    var s;
    var s__0;
    var b = call1(Buffer[1], 200);
    var progname = initpos < argv[1].length - 1 ?
      caml_check_bound(argv[1], initpos)[initpos + 1] :
      cst__2;
    switch (error[0]) {
      case 0:
        ah_ = error[1];
        if (caml_string_notequal(ah_, cst_help__3)) {
          if (caml_string_notequal(ah_, cst_help__4)) {call4(Printf[5], b, f_, progname, ah_);}
        }
        break;
      case 1:
        expected = error[3];
        arg = error[2];
        opt = error[1];
        call6(Printf[5], b, i_, progname, arg, opt, expected);
        break;
      case 2:
        s = error[1];
        call4(Printf[5], b, j_, progname, s);
        break;
      default:
        s__0 = error[1];
        call4(Printf[5], b, k_, progname, s__0)
      }
    usage_b(b, speclist[1], errmsg);
    if (! caml_equal(error, g_)) {
      if (! caml_equal(error, h_)) {return [0,Bad,call1(Buffer[2], b)];}
    }
    return [0,Help,call1(Buffer[2], b)];
  }
  current[1] += 1;
  for (; ; ) {
    if (current[1] < argv[1].length - 1) {
      try {
        Z_ = current[1];
        s = caml_check_bound(argv[1], Z_)[Z_ + 1];
        if (1 <= caml_ml_string_length(s)) if (45 === caml_string_get(s, 0)) {
          try {
            follow__1 = 0;
            ab_ = assoc3(s, speclist[1]);
            action = ab_;
            follow__0 = follow__1;
          }
          catch(af_) {
            af_ = runtime["caml_wrap_exception"](af_);
            if (af_ !== Not_found) {
              throw caml_wrap_thrown_exception_reraise(af_);
            }
            try {
              match = split(s);
              arg = match[2];
              keyword = match[1];
              follow = [0,arg];
              aa_ = assoc3(keyword, speclist[1]);
            }
            catch(ag_) {
              ag_ = runtime["caml_wrap_exception"](ag_);
              if (ag_ === Not_found) {
                throw caml_wrap_thrown_exception([0,Stop,[0,s]]);
              }
              throw caml_wrap_thrown_exception_reraise(ag_);
            }
            action = aa_;
            follow__0 = follow;
          }
          no_arg__0 =
            function(s, follow) {
              function no_arg(param) {
                var arg;
                if (follow) {
                  arg = follow[1];
                  throw caml_wrap_thrown_exception(
                          [0,Stop,[1,s,arg,cst_no_argument]]
                        );
                }
                return 0;
              }
              return no_arg;
            };
          no_arg = no_arg__0(s, follow__0);
          get_arg__0 =
            function(s, follow) {
              function get_arg(param) {
                var ae_;
                var arg;
                if (follow) {arg = follow[1];return arg;}
                if ((current[1] + 1 | 0) < argv[1].length - 1) {
                  ae_ = current[1] + 1 | 0;
                  return caml_check_bound(argv[1], ae_)[ae_ + 1];
                }
                throw caml_wrap_thrown_exception([0,Stop,[2,s]]);
              }
              return get_arg;
            };
          get_arg = get_arg__0(s, follow__0);
          consume_arg__0 =
            function(follow) {
              function consume_arg(param) {
                if (follow) {return 0;}
                current[1] += 1;
                return 0;
              }
              return consume_arg;
            };
          consume_arg = consume_arg__0(follow__0);
          treat_action__0 =
            function(s, no_arg, get_arg, consume_arg) {
              function treat_action(param) {
                var after;
                var before;
                var newarg;
                var arg__6;
                var f__6;
                var ad_;
                var f__5;
                var ac_;
                var arg__5;
                var symb;
                var f__4;
                var specs;
                var x__2;
                var match__3;
                var arg__4;
                var r__3;
                var x__1;
                var match__2;
                var arg__3;
                var f__3;
                var x__0;
                var match__1;
                var arg__2;
                var r__2;
                var x;
                var match__0;
                var arg__1;
                var f__2;
                var r__1;
                var arg__0;
                var f__1;
                var r__0;
                var r;
                var s__0;
                var match;
                var arg;
                var f__0;
                var f;
                switch (param[0]) {
                  case 0:
                    f = param[1];
                    return call1(f, 0);
                  case 1:
                    f__0 = param[1];
                    arg = get_arg(0);
                    match = bool_of_string_opt(arg);
                    if (match) {
                      s__0 = match[1];
                      call1(f__0, s__0);
                      return consume_arg(0);
                    }
                    throw caml_wrap_thrown_exception(
                            [0,Stop,[1,s,arg,cst_a_boolean]]
                          );
                  case 2:
                    r = param[1];
                    no_arg(0);
                    r[1] = 1;
                    return 0;
                  case 3:
                    r__0 = param[1];
                    no_arg(0);
                    r__0[1] = 0;
                    return 0;
                  case 4:
                    f__1 = param[1];
                    arg__0 = get_arg(0);
                    call1(f__1, arg__0);
                    return consume_arg(0);
                  case 5:
                    r__1 = param[1];
                    r__1[1] = get_arg(0);
                    return consume_arg(0);
                  case 6:
                    f__2 = param[1];
                    arg__1 = get_arg(0);
                    match__0 = int_of_string_opt(arg__1);
                    if (match__0) {
                      x = match__0[1];
                      call1(f__2, x);
                      return consume_arg(0);
                    }
                    throw caml_wrap_thrown_exception(
                            [0,Stop,[1,s,arg__1,cst_an_integer]]
                          );
                  case 7:
                    r__2 = param[1];
                    arg__2 = get_arg(0);
                    match__1 = int_of_string_opt(arg__2);
                    if (match__1) {
                      x__0 = match__1[1];
                      r__2[1] = x__0;
                      return consume_arg(0);
                    }
                    throw caml_wrap_thrown_exception(
                            [0,Stop,[1,s,arg__2,cst_an_integer__0]]
                          );
                  case 8:
                    f__3 = param[1];
                    arg__3 = get_arg(0);
                    match__2 = float_of_string_opt(arg__3);
                    if (match__2) {
                      x__1 = match__2[1];
                      call1(f__3, x__1);
                      return consume_arg(0);
                    }
                    throw caml_wrap_thrown_exception(
                            [0,Stop,[1,s,arg__3,cst_a_float]]
                          );
                  case 9:
                    r__3 = param[1];
                    arg__4 = get_arg(0);
                    match__3 = float_of_string_opt(arg__4);
                    if (match__3) {
                      x__2 = match__3[1];
                      r__3[1] = x__2;
                      return consume_arg(0);
                    }
                    throw caml_wrap_thrown_exception(
                            [0,Stop,[1,s,arg__4,cst_a_float__0]]
                          );
                  case 10:
                    specs = param[1];
                    return call2(List[15], treat_action, specs);
                  case 11:
                    f__4 = param[2];
                    symb = param[1];
                    arg__5 = get_arg(0);
                    if (call2(List[31], arg__5, symb)) {
                      call1(f__4, arg__5);
                      return consume_arg(0);
                    }
                    ac_ = make_symlist(cst__5, cst__4, cst__3, symb);
                    throw caml_wrap_thrown_exception(
                            [0,Stop,[1,s,arg__5,call2(Pervasives[16], cst_one_of, ac_)]]
                          );
                  case 12:
                    f__5 = param[1];
                    for (; ; ) {
                      if (current[1] < (argv[1].length - 1 + -1 | 0)) {
                        ad_ = current[1] + 1 | 0;
                        call1(f__5, caml_check_bound(argv[1], ad_)[ad_ + 1]);
                        consume_arg(0);
                        continue;
                      }
                      return 0;
                    }
                  default:
                    f__6 = param[1];
                    if (1 - allow_expand) {
                      throw caml_wrap_thrown_exception(
                              [
                                0,
                                Invalid_argument,
                                cst_Arg_Expand_is_is_only_allowed_with_Arg_parse_and_expand_argv_dynamic
                              ]
                            );
                    }
                    arg__6 = get_arg(0);
                    newarg = call1(f__6, arg__6);
                    consume_arg(0);
                    before = call3(Array[7], argv[1], 0, current[1] + 1 | 0);
                    after =
                      call3(
                        Array[7],
                        argv[1],
                        current[1] + 1 | 0,
                        (argv[1].length - 1 - current[1] | 0) + -1 | 0
                      );
                    argv[1] =
                      call1(Array[6], [0,before,[0,newarg,[0,after,0]]]);
                    return 0
                  }
              }
              return treat_action;
            };
          treat_action = treat_action__0(s, no_arg, get_arg, consume_arg);
          treat_action(action);
          switch__0 = 1;
        }
        else switch__0 = 0;
        else switch__0 = 0;
        if (! switch__0) {call1(anonfun, s);}
      }
      catch(exn) {
        exn = runtime["caml_wrap_exception"](exn);
        if (exn[1] === Bad) {
          m = exn[2];
          throw caml_wrap_thrown_exception(convert_error([3,m]));
        }
        if (exn[1] === Stop) {
          e = exn[2];
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
  var current__0;
  var sth;
  if (opt) {
    sth = opt[1];
    current__0 = sth;
  }
  else current__0 = current;
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
  var current__0;
  var sth;
  if (opt) {
    sth = opt[1];
    current__0 = sth;
  }
  else current__0 = current;
  return parse_argv_dynamic(
    [0,current__0],
    argv,
    [0,speclist],
    anonfun,
    errmsg
  );
}

function parse(l, f, msg) {
  var Y_;
  var msg__1;
  var msg__0;
  try {Y_ = parse_argv(0, Sys[1], l, f, msg);return Y_;}
  catch(exn) {
    exn = runtime["caml_wrap_exception"](exn);
    if (exn[1] === Bad) {
      msg__0 = exn[2];
      call2(Printf[3], l_, msg__0);
      return call1(Pervasives[87], 2);
    }
    if (exn[1] === Help) {
      msg__1 = exn[2];
      call2(Printf[2], m_, msg__1);
      return call1(Pervasives[87], 0);
    }
    throw caml_wrap_thrown_exception_reraise(exn);
  }
}

function parse_dynamic(l, f, msg) {
  var X_;
  var msg__1;
  var msg__0;
  try {X_ = parse_argv_dynamic(0, Sys[1], l, f, msg);return X_;}
  catch(exn) {
    exn = runtime["caml_wrap_exception"](exn);
    if (exn[1] === Bad) {
      msg__0 = exn[2];
      call2(Printf[3], n_, msg__0);
      return call1(Pervasives[87], 2);
    }
    if (exn[1] === Help) {
      msg__1 = exn[2];
      call2(Printf[2], o_, msg__1);
      return call1(Pervasives[87], 0);
    }
    throw caml_wrap_thrown_exception_reraise(exn);
  }
}

function parse_expand(l, f, msg) {
  var W_;
  var current__0;
  var spec;
  var argv;
  var msg__1;
  var msg__0;
  try {
    argv = [0,Sys[1]];
    spec = [0,l];
    current__0 = [0,current[1]];
    W_ = parse_and_expand_argv_dynamic(current__0, argv, spec, f, msg);
    return W_;
  }
  catch(exn) {
    exn = runtime["caml_wrap_exception"](exn);
    if (exn[1] === Bad) {
      msg__0 = exn[2];
      call2(Printf[3], p_, msg__0);
      return call1(Pervasives[87], 2);
    }
    if (exn[1] === Help) {
      msg__1 = exn[2];
      call2(Printf[2], q_, msg__1);
      return call1(Pervasives[87], 0);
    }
    throw caml_wrap_thrown_exception_reraise(exn);
  }
}

function second_word(s) {
  var n;
  var n__0;
  var len = caml_ml_string_length(s);
  function loop(n) {
    var n__1;
    var n__0 = n;
    for (; ; ) {
      if (len <= n__0) {return len;}
      if (32 === caml_string_get(s, n__0)) {
        n__1 = n__0 + 1 | 0;
        n__0 = n__1;
        continue;
      }
      return n__0;
    }
  }
  try {n__0 = call2(String[14], s, 9);}
  catch(U_) {
    U_ = runtime["caml_wrap_exception"](U_);
    if (U_ === Not_found) {
      try {n = call2(String[14], s, 32);}
      catch(V_) {
        V_ = runtime["caml_wrap_exception"](V_);
        if (V_ === Not_found) {return len;}
        throw caml_wrap_thrown_exception_reraise(V_);
      }
      return loop(n + 1 | 0);
    }
    throw caml_wrap_thrown_exception_reraise(U_);
  }
  return loop(n__0 + 1 | 0);
}

function max_arg_len(cur, param) {
  var doc = param[3];
  var spec = param[2];
  var kwd = param[1];
  if (11 === spec[0]) {
    return call2(Pervasives[5], cur, caml_ml_string_length(kwd));
  }
  var T_ = caml_ml_string_length(kwd) + second_word(doc) | 0;
  return call2(Pervasives[5], cur, T_);
}

function replace_leading_tab(s) {
  var seen = [0,0];
  function S_(c) {
    if (9 === c) {if (! seen[1]) {seen[1] = 1;return 32;}}
    return c;
  }
  return call2(String[10], S_, s);
}

function add_padding(len, ksd) {
  var msg;
  var cutcol;
  var kwd_len;
  var diff;
  var spaces;
  var N_;
  var prefix;
  var suffix;
  var O_;
  var msg__0;
  var cutcol__0;
  var P_;
  var spaces__0;
  var Q_;
  var R_;
  var L_ = ksd[2];
  var M_ = ksd[1];
  if (caml_string_notequal(ksd[3], cst__6)) {
    if (11 === L_[0]) {
      msg__0 = ksd[3];
      cutcol__0 = second_word(msg__0);
      P_ = call2(Pervasives[5], 0, len - cutcol__0 | 0) + 3 | 0;
      spaces__0 = call2(String[1], P_, 32);
      Q_ = replace_leading_tab(msg__0);
      R_ = call2(Pervasives[16], spaces__0, Q_);
      return [0,M_,L_,call2(Pervasives[16], cst__7, R_)];
    }
    msg = ksd[3];
    cutcol = second_word(msg);
    kwd_len = caml_ml_string_length(M_);
    diff = (len - kwd_len | 0) - cutcol | 0;
    if (0 < diff) {
      spaces = call2(String[1], diff, 32);
      N_ = replace_leading_tab(msg);
      prefix = call3(String[4], N_, 0, cutcol);
      suffix =
        call3(String[4], msg, cutcol, caml_ml_string_length(msg) - cutcol | 0);
      O_ = call2(Pervasives[16], spaces, suffix);
      return [0,M_,L_,call2(Pervasives[16], prefix, O_)];
    }
    return [0,M_,L_,replace_leading_tab(msg)];
  }
  return ksd;
}

function align(opt, speclist) {
  var limit;
  var sth;
  if (opt) {
    sth = opt[1];
    limit = sth;
  }
  else limit = Pervasives[7];
  var completed = add_help(speclist);
  var len = call3(List[20], max_arg_len, 0, completed);
  var len__0 = call2(Pervasives[4], len, limit);
  function J_(K_) {return add_padding(len__0, K_);}
  return call2(List[17], J_, completed);
}

function trim_cr(s) {
  var len = caml_ml_string_length(s);
  if (0 < len) {
    if (13 === caml_string_get(s, len + -1 | 0)) {
      return call3(String[4], s, 0, len + -1 | 0);
    }
  }
  return s;
}

function read_aux(trim, sep, file) {
  var ic = call1(Pervasives[68], file);
  var buf = call1(Buffer[1], 200);
  var words = [0,0];
  function stash(param) {
    var word = call1(Buffer[2], buf);
    var word__0 = trim ? trim_cr(word) : word;
    words[1] = [0,word__0,words[1]];
    return call1(Buffer[8], buf);
  }
  function read(param) {
    var H_;
    var c;
    var G_;
    try {
      c = call1(Pervasives[70], ic);
      if (c === sep) {
        stash(0);
        H_ = read(0);
      }
      else {call2(Buffer[10], buf, c);H_ = read(0);}
      return H_;
    }
    catch(I_) {
      I_ = runtime["caml_wrap_exception"](I_);
      if (I_ === End_of_file) {
        G_ = 0 < call1(Buffer[7], buf) ? 1 : 0;
        return G_ ? stash(0) : G_;
      }
      throw caml_wrap_thrown_exception_reraise(I_);
    }
  }
  read(0);
  call1(Pervasives[81], ic);
  var F_ = call1(List[9], words[1]);
  return call1(Array[12], F_);
}

var r_ = 10;
var s_ = 1;

function read_arg(E_) {return read_aux(s_, r_, E_);}

var t_ = 0;
var u_ = 0;

function read_arg0(D_) {return read_aux(u_, t_, D_);}

function write_aux(sep, file, args) {
  var oc = call1(Pervasives[49], file);
  function C_(s) {return call4(Printf[1], oc, v_, s, sep);}
  call2(Array[13], C_, args);
  return call1(Pervasives[64], oc);
}

var w_ = 10;

function write_arg(A_, B_) {return write_aux(w_, A_, B_);}

var x_ = 0;

function write_arg0(y_, z_) {return write_aux(x_, y_, z_);}

var Arg = [
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

module.exports = Arg;

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
