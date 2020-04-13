/**
 * @flow strict
 * Stdlib__fun
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

var caml_restore_raw_backtrace = runtime["caml_restore_raw_backtrace"];
var caml_wrap_thrown_exception_reraise = runtime
 ["caml_wrap_thrown_exception_reraise"];
var cst_Stdlib_Fun_Finally_raised = runtime["caml_new_string"](
  "Stdlib.Fun.Finally_raised"
);
var Stdlib_printexc = require("./Stdlib__printexc.js");

function const__0(c, param) {return c;}

function flip(f, x, y) {return call2(f, y, x);}

function negate(p, v) {return 1 - call1(p, v);}

var Finally_raised = [
  248,
  cst_Stdlib_Fun_Finally_raised,
  runtime["caml_fresh_oo_id"](0)
];

function protect(finally__0, work) {
  var work_bt;
  var result;
  function finally_no_exn(param) {
    var a_;
    var exn;
    var bt;
    try {a_ = call1(finally__0, 0);return a_;}
    catch(e) {
      e = runtime["caml_wrap_exception"](e);
      bt = call1(Stdlib_printexc[9], 0);
      exn = [0,Finally_raised,e];
      caml_restore_raw_backtrace(exn, bt);
      throw caml_wrap_thrown_exception_reraise(exn);
    }
  }
  try {result = call1(work, 0);}
  catch(work_exn) {
    work_exn = runtime["caml_wrap_exception"](work_exn);
    work_bt = call1(Stdlib_printexc[9], 0);
    finally_no_exn(0);
    caml_restore_raw_backtrace(work_exn, work_bt);
    throw caml_wrap_thrown_exception_reraise(work_exn);
  }
  finally_no_exn(0);
  return result;
}

var Stdlib_fun = [0,const__0,flip,negate,protect,Finally_raised];

module.exports = Stdlib_fun;

/*::type Exports = {
  _const_: (c: any, param: any) => any,
  flip: (f: any, x: any, y: any) => any,
  negate: (p: any, v: any) => any,
  protect: (_finally_: any, work: any) => any,
  Finally_raised: any,
}*/
/** @type {{
  _const_: (c: any, param: any) => any,
  flip: (f: any, x: any, y: any) => any,
  negate: (p: any, v: any) => any,
  protect: (_finally_: any, work: any) => any,
  Finally_raised: any,
}} */
module.exports = ((module.exports /*:: : any*/) /*:: :Exports */);
module.exports._const_ = module.exports[1];
module.exports.flip = module.exports[2];
module.exports.negate = module.exports[3];
module.exports.protect = module.exports[4];
module.exports.Finally_raised = module.exports[5];

/* Hashing disabled */
