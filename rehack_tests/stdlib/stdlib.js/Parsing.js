/**
 * Parsing
 * @providesModule Parsing
 */
"use strict";
var Array_ = require('Array_.js');
var Lexing = require('Lexing.js');
var Obj = require('Obj.js');
var runtime = require('runtime.js');

let joo_global_object = global;


var runtime = joo_global_object.jsoo_runtime;
var caml_check_bound = runtime["caml_check_bound"];
var caml_fresh_oo_id = runtime["caml_fresh_oo_id"];
var caml_make_vect = runtime["caml_make_vect"];
var caml_new_string = runtime["caml_new_string"];
var caml_wrap_exception = runtime["caml_wrap_exception"];

function caml_call1(f, a0) {
  return f.length == 1 ? f(a0) : runtime["caml_call_gen"](f, [a0]);
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

var global_data = runtime["caml_get_global_data"]();
var cst_syntax_error = caml_new_string("syntax error");
var cst_Parsing_YYexit = caml_new_string("Parsing.YYexit");
var cst_Parsing_Parse_error = caml_new_string("Parsing.Parse_error");
var Obj = global_data["Obj"];
var Array = global_data["Array_"];
var Lexing = global_data["Lexing"];
var YYexit = [248,cst_Parsing_YYexit,caml_fresh_oo_id(0)];
var Parse_error = [248,cst_Parsing_Parse_error,caml_fresh_oo_id(0)];
var env = [
  0,
  caml_make_vect(100, 0),
  caml_make_vect(100, 0),
  caml_make_vect(100, Lexing[1]),
  caml_make_vect(100, Lexing[1]),
  100,
  0,
  0,
  0,
  Lexing[1],
  Lexing[1],
  0,
  0,
  0,
  0,
  0,
  0
];

function grow_stacks(param) {
  var oldsize = env[5];
  var newsize = oldsize * 2 | 0;
  var new_s = caml_make_vect(newsize, 0);
  var new_v = caml_make_vect(newsize, 0);
  var new_start = caml_make_vect(newsize, Lexing[1]);
  var new_end = caml_make_vect(newsize, Lexing[1]);
  caml_call5(Array[10], env[1], 0, new_s, 0, oldsize);
  env[1] = new_s;
  caml_call5(Array[10], env[2], 0, new_v, 0, oldsize);
  env[2] = new_v;
  caml_call5(Array[10], env[3], 0, new_start, 0, oldsize);
  env[3] = new_start;
  caml_call5(Array[10], env[4], 0, new_end, 0, oldsize);
  env[4] = new_end;
  env[5] = newsize;
  return 0;
}

function clear_parser(param) {
  caml_call4(Array[9], env[2], 0, env[5], 0);
  env[8] = 0;
  return 0;
}

var current_lookahead_fun = [0,function(param) {return 0;}];

function yyparse(tables, start, lexer, lexbuf) {
  function loop(cmd, arg) {
    var cmd__0 = cmd;
    var arg__0 = arg;
    for (; ; ) {
      var match = runtime["caml_parse_engine"](tables, env, cmd__0, arg__0);
      switch (match) {
        case 0:
          var arg__1 = caml_call1(lexer, lexbuf);
          env[9] = lexbuf[11];
          env[10] = lexbuf[12];
          var cmd__0 = 1;
          var arg__0 = arg__1;
          continue;
        case 1:
          throw runtime["caml_wrap_thrown_exception"](Parse_error);
        case 2:
          grow_stacks(0);
          var cmd__0 = 2;
          var arg__0 = 0;
          continue;
        case 3:
          grow_stacks(0);
          var cmd__0 = 3;
          var arg__0 = 0;
          continue;
        case 4:
          try {
            var fh = env[13];
            var fi = caml_call1(caml_check_bound(tables[1], fh)[fh + 1], env);
            var fj = 4;
            var cmd__1 = fj;
            var arg__2 = fi;
          }
          catch(fk) {
            fk = caml_wrap_exception(fk);
            if (fk !== Parse_error) {
              throw runtime["caml_wrap_thrown_exception_reraise"](fk);
            }
            var ff = 0;
            var fg = 5;
            var cmd__1 = fg;
            var arg__2 = ff;
          }
          var cmd__0 = cmd__1;
          var arg__0 = arg__2;
          continue;
        default:
          caml_call1(tables[14], cst_syntax_error);
          var cmd__0 = 5;
          var arg__0 = 0;
          continue
        }
    }
  }
  var init_asp = env[11];
  var init_sp = env[14];
  var init_stackbase = env[6];
  var init_state = env[15];
  var init_curr_char = env[7];
  var init_lval = env[8];
  var init_errflag = env[16];
  env[6] = env[14] + 1 | 0;
  env[7] = start;
  env[10] = lexbuf[12];
  try {var fd = loop(0, 0);return fd;}
  catch(exn) {
    exn = caml_wrap_exception(exn);
    var curr_char = env[7];
    env[11] = init_asp;
    env[14] = init_sp;
    env[6] = init_stackbase;
    env[15] = init_state;
    env[7] = init_curr_char;
    env[8] = init_lval;
    env[16] = init_errflag;
    if (exn[1] === YYexit) {var v = exn[2];return v;}
    current_lookahead_fun[1] =
      function(tok) {
        if (caml_call1(Obj[1], tok)) {
          var fe = runtime["caml_obj_tag"](tok);
          return caml_check_bound(tables[3], fe)[fe + 1] === curr_char ? 1 : 0;
        }
        return caml_check_bound(tables[2], tok)[tok + 1] === curr_char ? 1 : 0;
      };
    throw runtime["caml_wrap_thrown_exception_reraise"](exn);
  }
}

function peek_val(env, n) {
  var fc = env[11] - n | 0;
  return caml_check_bound(env[2], fc)[fc + 1];
}

function symbol_start_pos(param) {
  function loop(i) {
    var i__0 = i;
    for (; ; ) {
      if (0 < i__0) {
        var e_ = (env[11] - i__0 | 0) + 1 | 0;
        var st = caml_check_bound(env[3], e_)[e_ + 1];
        var fa = (env[11] - i__0 | 0) + 1 | 0;
        var en = caml_check_bound(env[4], fa)[fa + 1];
        if (runtime["caml_notequal"](st, en)) {return st;}
        var i__1 = i__0 + -1 | 0;
        var i__0 = i__1;
        continue;
      }
      var fb = env[11];
      return caml_check_bound(env[4], fb)[fb + 1];
    }
  }
  return loop(env[12]);
}

function symbol_end_pos(param) {
  var e9 = env[11];
  return caml_check_bound(env[4], e9)[e9 + 1];
}

function rhs_start_pos(n) {
  var e8 = env[11] - (env[12] - n | 0) | 0;
  return caml_check_bound(env[3], e8)[e8 + 1];
}

function rhs_end_pos(n) {
  var e7 = env[11] - (env[12] - n | 0) | 0;
  return caml_check_bound(env[4], e7)[e7 + 1];
}

function symbol_start(param) {return symbol_start_pos(0)[4];}

function symbol_end(param) {return symbol_end_pos(0)[4];}

function rhs_start(n) {return rhs_start_pos(n)[4];}

function rhs_end(n) {return rhs_end_pos(n)[4];}

function is_current_lookahead(tok) {
  return caml_call1(current_lookahead_fun[1], tok);
}

function parse_error(param) {return 0;}

var Parsing = [
  0,
  symbol_start,
  symbol_end,
  rhs_start,
  rhs_end,
  symbol_start_pos,
  symbol_end_pos,
  rhs_start_pos,
  rhs_end_pos,
  clear_parser,
  Parse_error,
  function(e6) {return runtime["caml_set_parser_trace"](e6);},
  YYexit,
  yyparse,
  peek_val,
  is_current_lookahead,
  parse_error
];

runtime["caml_register_global"](7, Parsing, "Parsing");


module.exports = global.jsoo_runtime.caml_get_global_data().Parsing;