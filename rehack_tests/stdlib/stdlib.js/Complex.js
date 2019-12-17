/**
 * @flow strict
 * Complex
 */

// @ts-check


"use strict";
let joo_global_object = typeof global !== 'undefined' ? global : window;
require('runtime.js');

var runtime = joo_global_object.jsoo_runtime;
var zero = [254,0,0];
var one = [254,1,0];
var i = [254,0,1];
var a_ = [254,0,0];

function add(x, y) {return [254,x[1] + y[1],x[2] + y[2]];}

function sub(x, y) {return [254,x[1] - y[1],x[2] - y[2]];}

function neg(x) {return [254,- x[1],- x[2]];}

function conj(x) {return [254,x[1],- x[2]];}

function mul(x, y) {
  return [254,x[1] * y[1] - x[2] * y[2],x[1] * y[2] + x[2] * y[1]];
}

function div(x, y) {
  if (Math.abs(y[2]) <= Math.abs(y[1])) {
    var r = y[2] / y[1];
    var d = y[1] + r * y[2];
    return [254,(x[1] + r * x[2]) / d,(x[2] - r * x[1]) / d];
  }
  var r__0 = y[1] / y[2];
  var d__0 = y[2] + r__0 * y[1];
  return [254,(r__0 * x[1] + x[2]) / d__0,(r__0 * x[2] - x[1]) / d__0];
}

function inv(x) {return div(one, x);}

function norm2(x) {return x[1] * x[1] + x[2] * x[2];}

function norm(x) {
  var r = Math.abs(x[1]);
  var i = Math.abs(x[2]);
  if (r == 0) {return i;}
  if (i == 0) {return r;}
  if (i <= r) {var q = i / r;return r * Math.sqrt(1 + q * q);}
  var q__0 = r / i;
  return i * Math.sqrt(1 + q__0 * q__0);
}

function arg(x) {return Math.atan2(x[2], x[1]);}

function polar(n, a) {return [254,Math.cos(a) * n,Math.sin(a) * n];}

function sqrt(x) {
  if (x[1] == 0) {if (x[2] == 0) {return a_;}}
  var r = Math.abs(x[1]);
  var i = Math.abs(x[2]);
  if (i <= r) {
    var q = i / r;
    var w = Math.sqrt(r) * Math.sqrt(0.5 * (1 + Math.sqrt(1 + q * q)));
  }
  else {
    var q__0 = r / i;
    var w = Math.sqrt(i) *
      Math.sqrt(0.5 * (q__0 + Math.sqrt(1 + q__0 * q__0)));
  }
  if (0 <= x[1]) {return [254,w,0.5 * x[2] / w];}
  var w__0 = 0 <= x[2] ? w : - w;
  return [254,0.5 * i / w,w__0];
}

function exp(x) {
  var e = Math.exp(x[1]);
  return [254,e * Math.cos(x[2]),e * Math.sin(x[2])];
}

function log(x) {
  var b_ = Math.atan2(x[2], x[1]);
  return [254,Math.log(norm(x)),b_];
}

function pow(x, y) {return exp(mul(y, log(x)));}

var Complex = [
  0,
  zero,
  one,
  i,
  neg,
  conj,
  add,
  sub,
  mul,
  inv,
  div,
  sqrt,
  norm2,
  norm,
  arg,
  polar,
  exp,
  log,
  pow
];

exports = Complex;

/*::type Exports = {
  pow: (x: any, y: any) => any,
  log: (x: any) => any,
  exp: (x: any) => any,
  polar: (n: any, a: any) => any,
  arg: (x: any) => any,
  norm: (x: any) => any,
  norm2: (x: any) => any,
  sqrt: (x: any) => any,
  div: (x: any, y: any) => any,
  inv: (x: any) => any,
  mul: (x: any, y: any) => any,
  sub: (x: any, y: any) => any,
  add: (x: any, y: any) => any,
  conj: (x: any) => any,
  neg: (x: any) => any,
  i: any
  one: any
  zero: any
}*/
/** @type {{
  pow: (any, any) => any,
  log: (any) => any,
  exp: (any) => any,
  polar: (any, any) => any,
  arg: (any) => any,
  norm: (any) => any,
  norm2: (any) => any,
  sqrt: (any) => any,
  div: (any, any) => any,
  inv: (any) => any,
  mul: (any, any) => any,
  sub: (any, any) => any,
  add: (any, any) => any,
  conj: (any) => any,
  neg: (any) => any,
  i: any,
  one: any,
  zero: any,
}} */
module.exports = ((exports /*:: : any*/) /*:: :Exports */);
module.exports.pow = module.exports[18];
module.exports.log = module.exports[17];
module.exports.exp = module.exports[16];
module.exports.polar = module.exports[15];
module.exports.arg = module.exports[14];
module.exports.norm = module.exports[13];
module.exports.norm2 = module.exports[12];
module.exports.sqrt = module.exports[11];
module.exports.div = module.exports[10];
module.exports.inv = module.exports[9];
module.exports.mul = module.exports[8];
module.exports.sub = module.exports[7];
module.exports.add = module.exports[6];
module.exports.conj = module.exports[5];
module.exports.neg = module.exports[4];
module.exports.i = module.exports[3];
module.exports.one = module.exports[2];
module.exports.zero = module.exports[1];

/* Hashing disabled */
