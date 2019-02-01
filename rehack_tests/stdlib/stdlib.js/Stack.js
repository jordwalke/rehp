/**
 * Stack
 * @providesModule Stack
 */
"use strict";
var List_ = require('List_.js');
var runtime = require('runtime.js');

let joo_global_object = global;


var runtime = joo_global_object.jsoo_runtime;
var caml_new_string = runtime.caml_new_string;

function caml_call2(f, a0, a1) {
  return f.length == 2 ? f(a0, a1) : runtime.caml_call_gen(f, [a0,a1]);
}

function caml_call3(f, a0, a1, a2) {
  return f.length == 3 ? f(a0, a1, a2) : runtime.caml_call_gen(f, [a0,a1,a2]);
}

var global_data = runtime.caml_get_global_data();
var cst_Stack_Empty = caml_new_string("Stack.Empty");
var List = global_data.List;
var Empty = [248,cst_Stack_Empty,runtime.caml_fresh_oo_id(0)];

function create(param) {return [0,0,0];}

function clear(s) {s[1] = 0;s[2] = 0;return 0;}

function copy(s) {return [0,s[1],s[2]];}

function push(x, s) {s[1] = [0,x,s[1]];s[2] = s[2] + 1 | 0;return 0;}

function pop(s) {
  var gT = s[1];
  if (gT) {
    var tl = gT[2];
    var hd = gT[1];
    s[1] = tl;
    s[2] = s[2] + -1 | 0;
    return hd;
  }
  throw runtime.caml_wrap_thrown_exception(Empty);
}

function top(s) {
  var gS = s[1];
  if (gS) {var hd = gS[1];return hd;}
  throw runtime.caml_wrap_thrown_exception(Empty);
}

function is_empty(s) {return 0 === s[1] ? 1 : 0;}

function length(s) {return s[2];}

function iter(f, s) {return caml_call2(List[15], f, s[1]);}

function fold(f, acc, s) {return caml_call3(List[20], f, acc, s[1]);}

var Stack = [0,Empty,create,push,pop,top,clear,copy,is_empty,length,iter,fold];

runtime.caml_register_global(2, Stack, "Stack");


module.exports = global.jsoo_runtime.caml_get_global_data().Stack;