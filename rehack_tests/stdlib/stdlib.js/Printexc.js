/**
 * Printexc
 * @providesModule Printexc
 */
"use strict";
var Buffer = require('Buffer.js');
var Obj = require('Obj.js');
var Pervasives = require('Pervasives.js');
var Printf = require('Printf.js');
var Match_failure = require('Match_failure.js');
var Out_of_memory = require('Out_of_memory.js');
var Failure = require('Failure.js');
var Stack_overflow = require('Stack_overflow.js');
var Assert_failure = require('Assert_failure.js');
var Undefined_recursive_module = require('Undefined_recursive_module.js');
var runtime = require('runtime.js');

let joo_global_object = global;


var runtime = joo_global_object.jsoo_runtime;
var caml_check_bound = runtime["caml_check_bound"];
var caml_get_exception_raw_backtrace = runtime
 ["caml_get_exception_raw_backtrace"];
var string = runtime["caml_new_string"];
var caml_obj_tag = runtime["caml_obj_tag"];
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

function call6(f, a0, a1, a2, a3, a4, a5) {
  return f.length === 6 ?
    f(a0, a1, a2, a3, a4, a5) :
    runtime["caml_call_gen"](f, [a0,a1,a2,a3,a4,a5]);
}

function call7(f, a0, a1, a2, a3, a4, a5, a6) {
  return f.length === 7 ?
    f(a0, a1, a2, a3, a4, a5, a6) :
    runtime["caml_call_gen"](f, [a0,a1,a2,a3,a4,a5,a6]);
}

var global_data = runtime["caml_get_global_data"]();
var cst__0 = string("");
var cst_Program_not_linked_with_g_cannot_print_stack_backtrace = string(
  "(Program not linked with -g, cannot print stack backtrace)\n"
);
var cst_Raised_at = string("Raised at");
var cst_Re_raised_at = string("Re-raised at");
var cst_Raised_by_primitive_operation_at = string(
  "Raised by primitive operation at"
);
var cst_Called_from = string("Called from");
var cst_inlined = string(" (inlined)");
var cst__3 = string("");
var partial = [4,0,0,0,0];
var cst_Out_of_memory = string("Out of memory");
var cst_Stack_overflow = string("Stack overflow");
var cst_Pattern_matching_failed = string("Pattern matching failed");
var cst_Assertion_failed = string("Assertion failed");
var cst_Undefined_recursive_module = string("Undefined recursive module");
var cst__1 = string("");
var cst__2 = string("");
var cst = string("_");
var locfmt = [
  0,
  [
    11,
    string('File "'),
    [
      2,
      0,
      [
        11,
        string('", line '),
        [
          4,
          0,
          0,
          0,
          [
            11,
            string(", characters "),
            [4,0,0,0,[12,45,[4,0,0,0,[11,string(": "),[2,0,0]]]]]
          ]
        ]
      ]
    ]
  ],
  string('File "%s", line %d, characters %d-%d: %s')
];
var Printf = global_data["Printf"];
var Pervasives = global_data["Pervasives"];
var Out_of_memory = global_data["Out_of_memory"];
var Buffer = global_data["Buffer"];
var Stack_overflow = global_data["Stack_overflow"];
var Match_failure = global_data["Match_failure"];
var Assert_failure = global_data["Assert_failure"];
var Undefined_recursive_module = global_data["Undefined_recursive_module"];
var Obj = global_data["Obj"];
var c = [0,[11,string(", "),[2,0,[2,0,0]]],string(", %s%s")];
var l = [0,[2,0,[12,10,0]],string("%s\n")];
var j = [0,[2,0,[12,10,0]],string("%s\n")];
var k = [
  0,
  [11,string("(Program not linked with -g, cannot print stack backtrace)\n"),0
  ],
  string("(Program not linked with -g, cannot print stack backtrace)\n")
];
var h = [
  0,
  [
    2,
    0,
    [
      11,
      string(' file "'),
      [
        2,
        0,
        [
          12,
          34,
          [
            2,
            0,
            [
              11,
              string(", line "),
              [4,0,0,0,[11,string(", characters "),[4,0,0,0,[12,45,partial]]]]
            ]
          ]
        ]
      ]
    ]
  ],
  string('%s file "%s"%s, line %d, characters %d-%d')
];
var i = [
  0,
  [2,0,[11,string(" unknown location"),0]],
  string("%s unknown location")
];
var g = [
  0,
  [11,string("Uncaught exception: "),[2,0,[12,10,0]]],
  string("Uncaught exception: %s\n")
];
var f = [
  0,
  [11,string("Uncaught exception: "),[2,0,[12,10,0]]],
  string("Uncaught exception: %s\n")
];
var d = [0,[12,40,[2,0,[2,0,[12,41,0]]]],string("(%s%s)")];
var e = [0,[12,40,[2,0,[12,41,0]]],string("(%s)")];
var b = [0,[4,0,0,0,0],string("%d")];
var a = [0,[3,0,0],string("%S")];
var printers = [0,0];

function field(x, i) {
  var f = x[i + 1];
  return call1(Obj[1], f) ?
    caml_obj_tag(f) === Obj[13] ?
     call2(Printf[4], a, f) :
     caml_obj_tag(f) === Obj[14] ? call1(Pervasives[23], f) : cst :
    call2(Printf[4], b, f);
}

function other_fields(x, i) {
  if (x.length - 1 <= i) {return cst__0;}
  var ad = other_fields(x, i + 1 | 0);
  var ae = field(x, i);
  return call3(Printf[4], c, ae, ad);
}

function fields(x) {
  var match = x.length - 1;
  if (2 < match >>> 0) {
    var aa = other_fields(x, 2);
    var ab = field(x, 1);
    return call3(Printf[4], d, ab, aa);
  }
  switch (match) {
    case 0:
      return cst__1;
    case 1:
      return cst__2;
    default:
      var ac = field(x, 1);
      return call2(Printf[4], e, ac)
    }
}

function to_string(x) {
  function conv(param) {
    var param__0 = param;
    for (; ; ) {
      if (param__0) {
        var tl = param__0[2];
        var hd = param__0[1];
        try {var X = call1(hd, x);var W = X;}catch(Z) {var W = 0;}
        if (W) {var s = W[1];return s;}
        var param__0 = tl;
        continue;
      }
      if (x === Out_of_memory) {return cst_Out_of_memory;}
      if (x === Stack_overflow) {return cst_Stack_overflow;}
      if (x[1] === Match_failure) {
        var match = x[2];
        var char__0 = match[3];
        var line = match[2];
        var file = match[1];
        return call6(
          Printf[4],
          locfmt,
          file,
          line,
          char__0,
          char__0 + 5 | 0,
          cst_Pattern_matching_failed
        );
      }
      if (x[1] === Assert_failure) {
        var match__0 = x[2];
        var char__1 = match__0[3];
        var line__0 = match__0[2];
        var file__0 = match__0[1];
        return call6(
          Printf[4],
          locfmt,
          file__0,
          line__0,
          char__1,
          char__1 + 6 | 0,
          cst_Assertion_failed
        );
      }
      if (x[1] === Undefined_recursive_module) {
        var match__1 = x[2];
        var char__2 = match__1[3];
        var line__1 = match__1[2];
        var file__1 = match__1[1];
        return call6(
          Printf[4],
          locfmt,
          file__1,
          line__1,
          char__2,
          char__2 + 6 | 0,
          cst_Undefined_recursive_module
        );
      }
      if (0 === caml_obj_tag(x)) {
        var constructor = x[1][1];
        var Y = fields(x);
        return call2(Pervasives[16], constructor, Y);
      }
      return x[1];
    }
  }
  return conv(printers[1]);
}

function print(fct, arg) {
  try {var V = call1(fct, arg);return V;}
  catch(x) {
    x = caml_wrap_exception(x);
    var U = to_string(x);
    call2(Printf[3], f, U);
    call1(Pervasives[51], Pervasives[28]);
    throw runtime["caml_wrap_thrown_exception_reraise"](x);
  }
}

function catch__0(fct, arg) {
  try {var T = call1(fct, arg);return T;}
  catch(x) {
    x = caml_wrap_exception(x);
    call1(Pervasives[51], Pervasives[27]);
    var S = to_string(x);
    call2(Printf[3], g, S);
    return call1(Pervasives[87], 2);
  }
}

function convert_raw_backtrace(bt) {
  var R = [0,runtime["caml_convert_raw_backtrace"](bt)];
  return R;
}

function format_backtrace_slot(pos, slot) {
  function info(is_raise) {
    return is_raise ?
      0 === pos ? cst_Raised_at : cst_Re_raised_at :
      0 === pos ? cst_Raised_by_primitive_operation_at : cst_Called_from;
  }
  if (0 === slot[0]) {
    var K = slot[5];
    var L = slot[4];
    var M = slot[3];
    var N = slot[6] ? cst_inlined : cst__3;
    var O = slot[2];
    var P = info(slot[1]);
    return [0,call7(Printf[4], h, P, O, N, M, L, K)];
  }
  if (slot[1]) {return 0;}
  var Q = info(0);
  return [0,call2(Printf[4], i, Q)];
}

function print_exception_backtrace(outchan, backtrace) {
  if (backtrace) {
    var a = backtrace[1];
    var I = a.length - 1 + -1 | 0;
    var H = 0;
    if (! (I < 0)) {
      var i = H;
      for (; ; ) {
        var match = format_backtrace_slot(i, caml_check_bound(a, i)[i + 1]);
        if (match) {var str = match[1];call3(Printf[1], outchan, j, str);}
        var J = i + 1 | 0;
        if (I !== i) {var i = J;continue;}
        break;
      }
    }
    return 0;
  }
  return call2(Printf[1], outchan, k);
}

function print_raw_backtrace(outchan, raw_backtrace) {
  return print_exception_backtrace(
    outchan,
    convert_raw_backtrace(raw_backtrace)
  );
}

function print_backtrace(outchan) {
  return print_raw_backtrace(outchan, caml_get_exception_raw_backtrace(0));
}

function backtrace_to_string(backtrace) {
  if (backtrace) {
    var a = backtrace[1];
    var b = call1(Buffer[1], 1024);
    var F = a.length - 1 + -1 | 0;
    var E = 0;
    if (! (F < 0)) {
      var i = E;
      for (; ; ) {
        var match = format_backtrace_slot(i, caml_check_bound(a, i)[i + 1]);
        if (match) {var str = match[1];call3(Printf[5], b, l, str);}
        var G = i + 1 | 0;
        if (F !== i) {var i = G;continue;}
        break;
      }
    }
    return call1(Buffer[2], b);
  }
  return cst_Program_not_linked_with_g_cannot_print_stack_backtrace;
}

function raw_backtrace_to_string(raw_backtrace) {
  return backtrace_to_string(convert_raw_backtrace(raw_backtrace));
}

function backtrace_slot_is_raise(param) {
  return 0 === param[0] ? param[1] : param[1];
}

function backtrace_slot_is_inline(param) {return 0 === param[0] ? param[6] : 0;
}

function backtrace_slot_location(param) {
  return 0 === param[0] ? [0,[0,param[2],param[3],param[4],param[5]]] : 0;
}

function backtrace_slots(raw_backtrace) {
  var match = convert_raw_backtrace(raw_backtrace);
  if (match) {
    var backtrace = match[1];
    var usable_slot = function(param) {return 0 === param[0] ? 1 : 0;};
    var exists_usable = function(i) {
      var i__0 = i;
      for (; ; ) {
        if (-1 === i__0) {return 0;}
        var D = usable_slot(caml_check_bound(backtrace, i__0)[i__0 + 1]);
        if (D) {return D;}
        var i__1 = i__0 + -1 | 0;
        var i__0 = i__1;
        continue;
      }
    };
    return exists_usable(backtrace.length - 1 + -1 | 0) ? [0,backtrace] : 0;
  }
  return 0;
}

function get_backtrace(param) {
  return raw_backtrace_to_string(caml_get_exception_raw_backtrace(0));
}

function register_printer(fn) {printers[1] = [0,fn,printers[1]];return 0;}

function exn_slot(x) {return 0 === caml_obj_tag(x) ? x[1] : x;}

function exn_slot_id(x) {var slot = exn_slot(x);return slot[2];}

function exn_slot_name(x) {var slot = exn_slot(x);return slot[1];}

var uncaught_exception_handler = [0,0];

function set_uncaught_exception_handler(fn) {
  uncaught_exception_handler[1] = [0,fn];
  return 0;
}

function m(C) {return runtime["caml_raw_backtrace_next_slot"](C);}

function n(B) {return runtime["caml_convert_raw_backtrace_slot"](B);}

function o(A, z) {return runtime["caml_raw_backtrace_slot"](A, z);}

function p(y) {return runtime["caml_raw_backtrace_length"](y);}

var q = [
  0,
  backtrace_slot_is_raise,
  backtrace_slot_is_inline,
  backtrace_slot_location,
  format_backtrace_slot
];

function r(x) {return runtime["caml_get_current_callstack"](x);}

function s(w) {return caml_get_exception_raw_backtrace(w);}

function t(v) {return runtime["caml_backtrace_status"](v);}

var Printexc = [
  0,
  to_string,
  print,
  catch__0,
  print_backtrace,
  get_backtrace,
  function(u) {return runtime["caml_record_backtrace"](u);},
  t,
  register_printer,
  s,
  print_raw_backtrace,
  raw_backtrace_to_string,
  r,
  set_uncaught_exception_handler,
  backtrace_slots,
  q,
  p,
  o,
  n,
  m,
  exn_slot_id,
  exn_slot_name
];

runtime["caml_register_global"](45, Printexc, "Printexc");


module.exports = global.jsoo_runtime.caml_get_global_data().Printexc;