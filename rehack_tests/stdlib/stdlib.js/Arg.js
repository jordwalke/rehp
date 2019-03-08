/**
 * Arg
 * @providesModule Arg
 */
"use strict";
var Array_ = require('Array_.js');
var Buffer = require('Buffer.js');
var List_ = require('List_.js');
var Pervasives = require('Pervasives.js');
var Printf = require('Printf.js');
var String_ = require('String_.js');
var Sys = require('Sys.js');
var Invalid_argument = require('Invalid_argument.js');
var Failure = require('Failure.js');
var Not_found = require('Not_found.js');
var End_of_file = require('End_of_file.js');
var runtime = require('runtime.js');

let joo_global_object = global;


var runtime = joo_global_object.jsoo_runtime;
var caml_check_bound = runtime["caml_check_bound"];
var caml_equal = runtime["caml_equal"];
var caml_fresh_oo_id = runtime["caml_fresh_oo_id"];
var caml_ml_string_length = runtime["caml_ml_string_length"];
var caml_new_string = runtime["caml_new_string"];
var caml_string_get = runtime["caml_string_get"];
var caml_string_notequal = runtime["caml_string_notequal"];
var caml_wrap_exception = runtime["caml_wrap_exception"];

function caml_call1(f, a0) {
  return f.length == 1 ? f(a0) : runtime["caml_call_gen"](f, [a0]);
}

function caml_call2(f, a0, a1) {
  return f.length == 2 ? f(a0, a1) : runtime["caml_call_gen"](f, [a0,a1]);
}

function caml_call3(f, a0, a1, a2) {
  return f.length == 3 ?
    f(a0, a1, a2) :
    runtime["caml_call_gen"](f, [a0,a1,a2]);
}

function caml_call4(f, a0, a1, a2, a3) {
  return f.length == 4 ?
    f(a0, a1, a2, a3) :
    runtime["caml_call_gen"](f, [a0,a1,a2,a3]);
}

function caml_call5(f, a0, a1, a2, a3, a4) {
  return f.length == 5 ?
    f(a0, a1, a2, a3, a4) :
    runtime["caml_call_gen"](f, [a0,a1,a2,a3,a4]);
}

function caml_call6(f, a0, a1, a2, a3, a4, a5) {
  return f.length == 6 ?
    f(a0, a1, a2, a3, a4, a5) :
    runtime["caml_call_gen"](f, [a0,a1,a2,a3,a4,a5]);
}

var global_data = runtime["caml_get_global_data"]();
var cst__6 = caml_new_string("");
var cst__7 = caml_new_string("\n");
var cst_a_boolean = caml_new_string("a boolean");
var cst_an_integer = caml_new_string("an integer");
var cst_an_integer__0 = caml_new_string("an integer");
var cst_a_float = caml_new_string("a float");
var cst_a_float__0 = caml_new_string("a float");
var cst__3 = caml_new_string("");
var cst__4 = caml_new_string(" ");
var cst__5 = caml_new_string("");
var cst_one_of = caml_new_string("one of: ");
var cst_Arg_Expand_is_is_only_allowed_with_Arg_parse_and_expand_argv_dynamic = caml_new_string(
  "Arg.Expand is is only allowed with Arg.parse_and_expand_argv_dynamic"
);
var cst_no_argument = caml_new_string("no argument");
var cst__2 = caml_new_string("(?)");
var cst_help__3 = caml_new_string("--help");
var cst_help__4 = caml_new_string("-help");
var cst_help__2 = caml_new_string("-help");
var cst_Display_this_list_of_options = caml_new_string(
  " Display this list of options"
);
var cst_help = caml_new_string("-help");
var cst_help__1 = caml_new_string("--help");
var cst_Display_this_list_of_options__0 = caml_new_string(
  " Display this list of options"
);
var cst_help__0 = caml_new_string("--help");
var cst = caml_new_string("}");
var cst__0 = caml_new_string("|");
var cst__1 = caml_new_string("{");
var cst_none = caml_new_string("<none>");
var cst_Arg_Bad = caml_new_string("Arg.Bad");
var cst_Arg_Help = caml_new_string("Arg.Help");
var cst_Arg_Stop = caml_new_string("Arg.Stop");
var Not_found = global_data["Not_found"];
var Printf = global_data["Printf"];
var Pervasives = global_data["Pervasives"];
var Array = global_data["Array_"];
var Buffer = global_data["Buffer"];
var End_of_file = global_data["End_of_file"];
var List = global_data["List_"];
var String = global_data["String_"];
var Sys = global_data["Sys"];
var Invalid_argument = global_data["Invalid_argument"];
var Failure = global_data["Failure"];
var nx = [0,[2,0,[0,0]],caml_new_string("%s%c")];
var nr = [0,[2,0,0],caml_new_string("%s")];
var ns = [0,[2,0,0],caml_new_string("%s")];
var np = [0,[2,0,0],caml_new_string("%s")];
var nq = [0,[2,0,0],caml_new_string("%s")];
var nn = [0,[2,0,0],caml_new_string("%s")];
var no = [0,[2,0,0],caml_new_string("%s")];
var nh = [
  0,
  [
    2,
    0,
    [
      11,
      caml_new_string(": unknown option '"),
      [2,0,[11,caml_new_string("'.\n"),0]]
    ]
  ],
  caml_new_string("%s: unknown option '%s'.\n")
];
var nk = [
  0,
  [
    2,
    0,
    [
      11,
      caml_new_string(": wrong argument '"),
      [
        2,
        0,
        [
          11,
          caml_new_string("'; option '"),
          [
            2,
            0,
            [
              11,
              caml_new_string("' expects "),
              [2,0,[11,caml_new_string(".\n"),0]]
            ]
          ]
        ]
      ]
    ]
  ],
  caml_new_string("%s: wrong argument '%s'; option '%s' expects %s.\n")
];
var nl = [
  0,
  [
    2,
    0,
    [
      11,
      caml_new_string(": option '"),
      [2,0,[11,caml_new_string("' needs an argument.\n"),0]]
    ]
  ],
  caml_new_string("%s: option '%s' needs an argument.\n")
];
var nm = [
  0,
  [2,0,[11,caml_new_string(": "),[2,0,[11,caml_new_string(".\n"),0]]]],
  caml_new_string("%s: %s.\n")
];
var ni = [0,caml_new_string("-help")];
var nj = [0,caml_new_string("--help")];
var ng = [0,[2,0,0],caml_new_string("%s")];
var nf = [0,[2,0,[12,10,0]],caml_new_string("%s\n")];
var ne = [0,caml_new_string("-help")];
var nc = [
  0,
  [11,caml_new_string("  "),[2,0,[12,32,[2,0,[12,10,0]]]]],
  caml_new_string("  %s %s\n")
];
var nd = [
  0,
  [11,caml_new_string("  "),[2,0,[12,32,[2,0,[2,0,[12,10,0]]]]]],
  caml_new_string("  %s %s%s\n")
];
var Bad = [248,cst_Arg_Bad,caml_fresh_oo_id(0)];
var Help = [248,cst_Arg_Help,caml_fresh_oo_id(0)];
var Stop = [248,cst_Arg_Stop,caml_fresh_oo_id(0)];

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
    throw runtime["caml_wrap_thrown_exception"](Not_found);
  }
}

function split(s) {
  var i = caml_call2(String[14], s, 61);
  var len = caml_ml_string_length(s);
  var ox = caml_call3(String[4], s, i + 1 | 0, len - (i + 1 | 0) | 0);
  return [0,caml_call3(String[4], s, 0, i),ox];
}

function make_symlist(prefix, sep, suffix, l) {
  if (l) {
    var t = l[2];
    var h = l[1];
    var ot = caml_call2(Pervasives[16], prefix, h);
    var ou = function(x, y) {
      var ow = caml_call2(Pervasives[16], sep, y);
      return caml_call2(Pervasives[16], x, ow);
    };
    var ov = caml_call3(List[20], ou, ot, t);
    return caml_call2(Pervasives[16], ov, suffix);
  }
  return cst_none;
}

function print_spec(buf, param) {
  var doc = param[3];
  var spec = param[2];
  var key = param[1];
  var or = 0 < caml_ml_string_length(doc) ? 1 : 0;
  if (or) {
    if (11 === spec[0]) {
      var l = spec[1];
      var os = make_symlist(cst__1, cst__0, cst, l);
      return caml_call5(Printf[5], buf, nd, key, os, doc);
    }
    return caml_call4(Printf[5], buf, nc, key, doc);
  }
  return or;
}

function help_action(param) {
  throw runtime["caml_wrap_thrown_exception"]([0,Stop,ne]);
}

function add_help(speclist) {
  try {assoc3(cst_help__2, speclist);var oo = 0;var ok = oo;}
  catch(oq) {
    oq = caml_wrap_exception(oq);
    if (oq !== Not_found) {
      throw runtime["caml_wrap_thrown_exception_reraise"](oq);
    }
    var oj = [
      0,
      [0,cst_help,[0,help_action],cst_Display_this_list_of_options],
      0
    ];
    var ok = oj;
  }
  try {assoc3(cst_help__1, speclist);var on = 0;var add2 = on;}
  catch(op) {
    op = caml_wrap_exception(op);
    if (op !== Not_found) {
      throw runtime["caml_wrap_thrown_exception_reraise"](op);
    }
    var ol = [
      0,
      [0,cst_help__0,[0,help_action],cst_Display_this_list_of_options__0],
      0
    ];
    var add2 = ol;
  }
  var om = caml_call2(Pervasives[25], ok, add2);
  return caml_call2(Pervasives[25], speclist, om);
}

function usage_b(buf, speclist, errmsg) {
  caml_call3(Printf[5], buf, nf, errmsg);
  var og = add_help(speclist);
  function oh(oi) {return print_spec(buf, oi);}
  return caml_call2(List[15], oh, og);
}

function usage_string(speclist, errmsg) {
  var b = caml_call1(Buffer[1], 200);
  usage_b(b, speclist, errmsg);
  return caml_call1(Buffer[2], b);
}

function usage(speclist, errmsg) {
  var of = usage_string(speclist, errmsg);
  return caml_call2(Printf[3], ng, of);
}

var current = [0,0];

function bool_of_string_opt(x) {
  try {var od = [0,caml_call1(Pervasives[19], x)];return od;}
  catch(oe) {
    oe = caml_wrap_exception(oe);
    if (oe[1] === Invalid_argument) {return 0;}
    throw runtime["caml_wrap_thrown_exception_reraise"](oe);
  }
}

function int_of_string_opt(x) {
  try {var ob = [0,runtime["caml_int_of_string"](x)];return ob;}
  catch(oc) {
    oc = caml_wrap_exception(oc);
    if (oc[1] === Failure) {return 0;}
    throw runtime["caml_wrap_thrown_exception_reraise"](oc);
  }
}

function float_of_string_opt(x) {
  try {var n_ = [0,runtime["caml_float_of_string"](x)];return n_;}
  catch(oa) {
    oa = caml_wrap_exception(oa);
    if (oa[1] === Failure) {return 0;}
    throw runtime["caml_wrap_thrown_exception_reraise"](oa);
  }
}

function parse_and_expand_argv_dynamic_aux(allow_expand, current, argv, speclist, anonfun, errmsg) {
  var initpos = current[1];
  function convert_error(error) {
    var b = caml_call1(Buffer[1], 200);
    var progname = initpos < argv[1].length - 1 ?
      caml_check_bound(argv[1], initpos)[initpos + 1] :
      cst__2;
    switch (error[0]) {
      case 0:
        var n9 = error[1];
        if (caml_string_notequal(n9, cst_help__3)) {
          if (caml_string_notequal(n9, cst_help__4)) {
            caml_call4(Printf[5], b, nh, progname, n9);
          }
        }
        break;
      case 1:
        var expected = error[3];
        var arg = error[2];
        var opt = error[1];
        caml_call6(Printf[5], b, nk, progname, arg, opt, expected);
        break;
      case 2:
        var s = error[1];
        caml_call4(Printf[5], b, nl, progname, s);
        break;
      default:
        var s__0 = error[1];
        caml_call4(Printf[5], b, nm, progname, s__0)
      }
    usage_b(b, speclist[1], errmsg);
    if (! caml_equal(error, ni)) {
      if (! caml_equal(error, nj)) {return [0,Bad,caml_call1(Buffer[2], b)];}
    }
    return [0,Help,caml_call1(Buffer[2], b)];
  }
  current[1] += 1;
  for (; ; ) {
    if (current[1] < argv[1].length - 1) {
      try {
        var n1 = current[1];
        var s = caml_check_bound(argv[1], n1)[n1 + 1];
        if (1 <= caml_ml_string_length(s)) if (45 === caml_string_get(s, 0)) {
          try {
            var follow__1 = 0;
            var n3 = assoc3(s, speclist[1]);
            var action = n3;
            var follow__0 = follow__1;
          }
          catch(n7) {
            n7 = caml_wrap_exception(n7);
            if (n7 !== Not_found) {
              throw runtime["caml_wrap_thrown_exception_reraise"](n7);
            }
            try {
              var match = split(s);
              var arg = match[2];
              var keyword = match[1];
              var follow = [0,arg];
              var n2 = assoc3(keyword, speclist[1]);
            }
            catch(n8) {
              n8 = caml_wrap_exception(n8);
              if (n8 === Not_found) {
                throw runtime["caml_wrap_thrown_exception"]([0,Stop,[0,s]]);
              }
              throw runtime["caml_wrap_thrown_exception_reraise"](n8);
            }
            var action = n2;
            var follow__0 = follow;
          }
          var no_arg__0 = function(s, follow) {
            function no_arg(param) {
              if (follow) {
                var arg = follow[1];
                throw runtime["caml_wrap_thrown_exception"]([0,Stop,[1,s,arg,cst_no_argument]]
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
                var n6 = current[1] + 1 | 0;
                return caml_check_bound(argv[1], n6)[n6 + 1];
              }
              throw runtime["caml_wrap_thrown_exception"]([0,Stop,[2,s]]);
            }
            return get_arg;
          };
          var get_arg = get_arg__0(s, follow__0);
          var consume_arg__0 = function(follow) {
            function consume_arg(param) {
              return follow ? 0 : (current[1] += 1,0);
            }
            return consume_arg;
          };
          var consume_arg = consume_arg__0(follow__0);
          var treat_action__0 = function(s, no_arg, get_arg, consume_arg) {
            function treat_action(param) {
              switch (param[0]) {
                case 0:
                  var f = param[1];
                  return caml_call1(f, 0);
                case 1:
                  var f__0 = param[1];
                  var arg = get_arg(0);
                  var match = bool_of_string_opt(arg);
                  if (match) {
                    var s__0 = match[1];
                    caml_call1(f__0, s__0);
                    return consume_arg(0);
                  }
                  throw runtime["caml_wrap_thrown_exception"]([0,Stop,[1,s,arg,cst_a_boolean]]
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
                  caml_call1(f__1, arg__0);
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
                    caml_call1(f__2, x);
                    return consume_arg(0);
                  }
                  throw runtime["caml_wrap_thrown_exception"]([0,Stop,[1,s,arg__1,cst_an_integer]]
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
                  throw runtime["caml_wrap_thrown_exception"](
                          [0,Stop,[1,s,arg__2,cst_an_integer__0]]
                        );
                case 8:
                  var f__3 = param[1];
                  var arg__3 = get_arg(0);
                  var match__2 = float_of_string_opt(arg__3);
                  if (match__2) {
                    var x__1 = match__2[1];
                    caml_call1(f__3, x__1);
                    return consume_arg(0);
                  }
                  throw runtime["caml_wrap_thrown_exception"]([0,Stop,[1,s,arg__3,cst_a_float]]
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
                  throw runtime["caml_wrap_thrown_exception"]([0,Stop,[1,s,arg__4,cst_a_float__0]]
                        );
                case 10:
                  var specs = param[1];
                  return caml_call2(List[15], treat_action, specs);
                case 11:
                  var f__4 = param[2];
                  var symb = param[1];
                  var arg__5 = get_arg(0);
                  if (caml_call2(List[31], arg__5, symb)) {
                    caml_call1(f__4, arg__5);
                    return consume_arg(0);
                  }
                  var n4 = make_symlist(cst__5, cst__4, cst__3, symb);
                  throw runtime["caml_wrap_thrown_exception"](
                          [
                            0,
                            Stop,
                            [1,s,arg__5,caml_call2(Pervasives[16], cst_one_of, n4)]
                          ]
                        );
                case 12:
                  var f__5 = param[1];
                  for (; ; ) {
                    if (current[1] < (argv[1].length - 1 + -1 | 0)) {
                      var n5 = current[1] + 1 | 0;
                      caml_call1(f__5, caml_check_bound(argv[1], n5)[n5 + 1]);
                      consume_arg(0);
                      continue;
                    }
                    return 0;
                  }
                default:
                  var f__6 = param[1];
                  if (1 - allow_expand) {
                    throw runtime["caml_wrap_thrown_exception"](
                            [
                              0,
                              Invalid_argument,
                              cst_Arg_Expand_is_is_only_allowed_with_Arg_parse_and_expand_argv_dynamic
                            ]
                          );
                  }
                  var arg__6 = get_arg(0);
                  var newarg = caml_call1(f__6, arg__6);
                  consume_arg(0);
                  var before = caml_call3(
                    Array[7],
                    argv[1],
                    0,
                    current[1] + 1 | 0
                  );
                  var after = caml_call3(
                    Array[7],
                    argv[1],
                    current[1] + 1 | 0,
                    (argv[1].length - 1 - current[1] | 0) + -1 | 0
                  );
                  argv[1] =
                    caml_call1(Array[6], [0,before,[0,newarg,[0,after,0]]]);
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
        if (! switch__0) {caml_call1(anonfun, s);}
      }
      catch(exn) {
        exn = caml_wrap_exception(exn);
        if (exn[1] === Bad) {
          var m = exn[2];
          throw runtime["caml_wrap_thrown_exception"](convert_error([3,m]));
        }
        if (exn[1] === Stop) {
          var e = exn[2];
          throw runtime["caml_wrap_thrown_exception"](convert_error(e));
        }
        throw runtime["caml_wrap_thrown_exception_reraise"](exn);
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
  try {var n0 = parse_argv(0, Sys[1], l, f, msg);return n0;}
  catch(exn) {
    exn = caml_wrap_exception(exn);
    if (exn[1] === Bad) {
      var msg__0 = exn[2];
      caml_call2(Printf[3], nn, msg__0);
      return caml_call1(Pervasives[87], 2);
    }
    if (exn[1] === Help) {
      var msg__1 = exn[2];
      caml_call2(Printf[2], no, msg__1);
      return caml_call1(Pervasives[87], 0);
    }
    throw runtime["caml_wrap_thrown_exception_reraise"](exn);
  }
}

function parse_dynamic(l, f, msg) {
  try {var nZ = parse_argv_dynamic(0, Sys[1], l, f, msg);return nZ;}
  catch(exn) {
    exn = caml_wrap_exception(exn);
    if (exn[1] === Bad) {
      var msg__0 = exn[2];
      caml_call2(Printf[3], np, msg__0);
      return caml_call1(Pervasives[87], 2);
    }
    if (exn[1] === Help) {
      var msg__1 = exn[2];
      caml_call2(Printf[2], nq, msg__1);
      return caml_call1(Pervasives[87], 0);
    }
    throw runtime["caml_wrap_thrown_exception_reraise"](exn);
  }
}

function parse_expand(l, f, msg) {
  try {
    var argv = [0,Sys[1]];
    var spec = [0,l];
    var current__0 = [0,current[1]];
    var nY = parse_and_expand_argv_dynamic(current__0, argv, spec, f, msg);
    return nY;
  }
  catch(exn) {
    exn = caml_wrap_exception(exn);
    if (exn[1] === Bad) {
      var msg__0 = exn[2];
      caml_call2(Printf[3], nr, msg__0);
      return caml_call1(Pervasives[87], 2);
    }
    if (exn[1] === Help) {
      var msg__1 = exn[2];
      caml_call2(Printf[2], ns, msg__1);
      return caml_call1(Pervasives[87], 0);
    }
    throw runtime["caml_wrap_thrown_exception_reraise"](exn);
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
  try {var n__0 = caml_call2(String[14], s, 9);}
  catch(nW) {
    nW = caml_wrap_exception(nW);
    if (nW === Not_found) {
      try {var n = caml_call2(String[14], s, 32);}
      catch(nX) {
        nX = caml_wrap_exception(nX);
        if (nX === Not_found) {return len;}
        throw runtime["caml_wrap_thrown_exception_reraise"](nX);
      }
      return loop(n + 1 | 0);
    }
    throw runtime["caml_wrap_thrown_exception_reraise"](nW);
  }
  return loop(n__0 + 1 | 0);
}

function max_arg_len(cur, param) {
  var doc = param[3];
  var spec = param[2];
  var kwd = param[1];
  if (11 === spec[0]) {
    return caml_call2(Pervasives[5], cur, caml_ml_string_length(kwd));
  }
  var nV = caml_ml_string_length(kwd) + second_word(doc) | 0;
  return caml_call2(Pervasives[5], cur, nV);
}

function replace_leading_tab(s) {
  var seen = [0,0];
  function nU(c) {
    if (9 === c) {if (! seen[1]) {seen[1] = 1;return 32;}}
    return c;
  }
  return caml_call2(String[10], nU, s);
}

function add_padding(len, ksd) {
  var nN = ksd[2];
  var nO = ksd[1];
  if (caml_string_notequal(ksd[3], cst__6)) {
    if (11 === nN[0]) {
      var msg__0 = ksd[3];
      var cutcol__0 = second_word(msg__0);
      var nR = caml_call2(Pervasives[5], 0, len - cutcol__0 | 0) + 3 | 0;
      var spaces__0 = caml_call2(String[1], nR, 32);
      var nS = replace_leading_tab(msg__0);
      var nT = caml_call2(Pervasives[16], spaces__0, nS);
      return [0,nO,nN,caml_call2(Pervasives[16], cst__7, nT)];
    }
    var msg = ksd[3];
    var cutcol = second_word(msg);
    var kwd_len = caml_ml_string_length(nO);
    var diff = (len - kwd_len | 0) - cutcol | 0;
    if (0 < diff) {
      var spaces = caml_call2(String[1], diff, 32);
      var nP = replace_leading_tab(msg);
      var prefix = caml_call3(String[4], nP, 0, cutcol);
      var suffix = caml_call3(
        String[4],
        msg,
        cutcol,
        caml_ml_string_length(msg) - cutcol | 0
      );
      var nQ = caml_call2(Pervasives[16], spaces, suffix);
      return [0,nO,nN,caml_call2(Pervasives[16], prefix, nQ)];
    }
    return [0,nO,nN,replace_leading_tab(msg)];
  }
  return ksd;
}

function align(opt, speclist) {
  if (opt) {
    var sth = opt[1];
    var limit = sth;
  }
  else var limit = Pervasives[7];
  var completed = add_help(speclist);
  var len = caml_call3(List[20], max_arg_len, 0, completed);
  var len__0 = caml_call2(Pervasives[4], len, limit);
  function nL(nM) {return add_padding(len__0, nM);}
  return caml_call2(List[17], nL, completed);
}

function trim_cr(s) {
  var len = caml_ml_string_length(s);
  if (0 < len) {
    if (13 === caml_string_get(s, len + -1 | 0)) {
      return caml_call3(String[4], s, 0, len + -1 | 0);
    }
  }
  return s;
}

function read_aux(trim, sep, file) {
  var ic = caml_call1(Pervasives[68], file);
  var buf = caml_call1(Buffer[1], 200);
  var words = [0,0];
  function stash(param) {
    var word = caml_call1(Buffer[2], buf);
    var word__0 = trim ? trim_cr(word) : word;
    words[1] = [0,word__0,words[1]];
    return caml_call1(Buffer[8], buf);
  }
  function read(param) {
    try {
      var c = caml_call1(Pervasives[70], ic);
      var nJ = c === sep ?
        (stash(0),read(0)) :
        (caml_call2(Buffer[10], buf, c),read(0));
      return nJ;
    }
    catch(nK) {
      nK = caml_wrap_exception(nK);
      if (nK === End_of_file) {
        var nI = 0 < caml_call1(Buffer[7], buf) ? 1 : 0;
        return nI ? stash(0) : nI;
      }
      throw runtime["caml_wrap_thrown_exception_reraise"](nK);
    }
  }
  read(0);
  caml_call1(Pervasives[81], ic);
  var nH = caml_call1(List[9], words[1]);
  return caml_call1(Array[12], nH);
}

var nt = 10;
var nu = 1;

function read_arg(nG) {return read_aux(nu, nt, nG);}

var nv = 0;
var nw = 0;

function read_arg0(nF) {return read_aux(nw, nv, nF);}

function write_aux(sep, file, args) {
  var oc = caml_call1(Pervasives[49], file);
  function nE(s) {return caml_call4(Printf[1], oc, nx, s, sep);}
  caml_call2(Array[13], nE, args);
  return caml_call1(Pervasives[64], oc);
}

var ny = 10;

function write_arg(nC, nD) {return write_aux(ny, nC, nD);}

var nz = 0;

function write_arg0(nA, nB) {return write_aux(nz, nA, nB);}

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

runtime["caml_register_global"](58, Arg, "Arg");


module.exports = global.jsoo_runtime.caml_get_global_data().Arg;