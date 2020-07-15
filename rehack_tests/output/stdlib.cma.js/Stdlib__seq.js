/**
 * @flow strict
 * Stdlib__seq
 */

// @ts-check


"use strict";

var runtime = require("../runtime/runtime.js");
var caml_trampoline = runtime["caml_trampoline"];
var caml_trampoline_return = runtime["caml_trampoline_return"];

function call1(f, a0) {
  return f.length === 1 ? f(a0) : runtime["caml_call_gen"](f, [a0]);
}

function call2(f, a0, a1) {
  return f.length === 2 ? f(a0, a1) : runtime["caml_call_gen"](f, [a0,a1]);
}

function empty(param) {return 0;}

function return__0(x, param) {return [0,x,empty];}

function map(f, seq, param) {
  var match = call1(seq, 0);
  if (match) {
    var next = match[2];
    var x = match[1];
    var g_ = function(h_) {return map(f, next, h_);};
    return [0,call1(f, x),g_];
  }
  return 0;
}

function filter_map(f, seq, param) {
  var seq__0 = seq;
  for (; ; ) {
    var match = call1(seq__0, 0);
    if (match) {
      var next = match[2];
      var x = match[1];
      var match__0 = call1(f, x);
      if (match__0) {
        var y = match__0[1];
        return [0,y,function(f_) {return filter_map(f, next, f_);}];
      }
      var seq__0 = next;
      continue;
    }
    return 0;
  }
}

function filter(f, seq, param) {
  var seq__0 = seq;
  for (; ; ) {
    var match = call1(seq__0, 0);
    if (match) {
      var next = match[2];
      var x = match[1];
      if (call1(f, x)) {
        return [0,x,function(e_) {return filter(f, next, e_);}];
      }
      var seq__0 = next;
      continue;
    }
    return 0;
  }
}

function flat_map__0(counter, f, seq, param) {
  var match = call1(seq, 0);
  if (match) {
    var next = match[2];
    var x = match[1];
    var d_ = call1(f, x);
    var c_ = 0;
    if (counter < 50) {
      var counter__0 = counter + 1 | 0;
      return flat_map_app__0(counter__0, f, d_, next, c_);
    }
    return caml_trampoline_return(flat_map_app__0, [0,f,d_,next,c_]);
  }
  return 0;
}

function flat_map_app__0(counter, f, seq, tail, param) {
  var match = call1(seq, 0);
  if (match) {
    var next = match[2];
    var x = match[1];
    return [0,x,function(b_) {return flat_map_app(f, next, tail, b_);}];
  }
  var a_ = 0;
  if (counter < 50) {
    var counter__0 = counter + 1 | 0;
    return flat_map__0(counter__0, f, tail, a_);
  }
  return caml_trampoline_return(flat_map__0, [0,f,tail,a_]);
}

function flat_map(f, seq, param) {
  return caml_trampoline(flat_map__0(0, f, seq, param));
}

function flat_map_app(f, seq, tail, param) {
  return caml_trampoline(flat_map_app__0(0, f, seq, tail, param));
}

function fold_left(f, acc, seq) {
  function aux(f, acc, seq) {
    var acc__0 = acc;
    var seq__0 = seq;
    for (; ; ) {
      var match = call1(seq__0, 0);
      if (match) {
        var seq__1 = match[2];
        var x = match[1];
        var acc__1 = call2(f, acc__0, x);
        var acc__0 = acc__1;
        var seq__0 = seq__1;
        continue;
      }
      return acc__0;
    }
  }
  return aux(f, acc, seq);
}

function iter(f, seq) {
  function aux(seq) {
    var seq__0 = seq;
    for (; ; ) {
      var match = call1(seq__0, 0);
      if (match) {
        var seq__1 = match[2];
        var x = match[1];
        call1(f, x);
        var seq__0 = seq__1;
        continue;
      }
      return 0;
    }
  }
  return aux(seq);
}

var Stdlib_seq = [
  0,
  empty,
  return__0,
  map,
  filter,
  filter_map,
  flat_map,
  fold_left,
  iter
];

module.exports = Stdlib_seq;

/*::type Exports = {
  empty: (param: any) => any,
  _return_: (x: any, param: any) => any,
  map: (f: any, seq: any, param: any) => any,
  filter: (f: any, seq: any, param: any) => any,
  filter_map: (f: any, seq: any, param: any) => any,
  flat_map: (f: any, seq: any, param: any) => any,
  fold_left: (f: any, acc: any, seq: any) => any,
  iter: (f: any, seq: any) => any,
}*/
/** @type {{
  empty: (param: any) => any,
  _return_: (x: any, param: any) => any,
  map: (f: any, seq: any, param: any) => any,
  filter: (f: any, seq: any, param: any) => any,
  filter_map: (f: any, seq: any, param: any) => any,
  flat_map: (f: any, seq: any, param: any) => any,
  fold_left: (f: any, acc: any, seq: any) => any,
  iter: (f: any, seq: any) => any,
}} */
module.exports = ((module.exports /*:: : any*/) /*:: :Exports */);
module.exports.empty = module.exports[1];
module.exports._return_ = module.exports[2];
module.exports.map = module.exports[3];
module.exports.filter = module.exports[4];
module.exports.filter_map = module.exports[5];
module.exports.flat_map = module.exports[6];
module.exports.fold_left = module.exports[7];
module.exports.iter = module.exports[8];

/* Hashing disabled */
