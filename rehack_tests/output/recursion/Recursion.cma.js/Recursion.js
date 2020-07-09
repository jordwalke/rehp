/**
 * @flow strict
 * Recursion
 */

// @ts-check


"use strict";

var runtime = require("../../runtime/runtime.js");

;

function nobug1(x) {return 1 + nobug1(x) | 0;}

nobug1(42);

function nobug2(x) {function sub(x) {return 1 + sub(x) | 0;}return sub(x);}

function bug(x) {
  var sub;
  if (0 === x) {sub = function(x) {return 1 + sub(x) | 0;};return sub(x);}
  return 0;
}

function bug__0(x) {
  var sub;
  if (0 === x) {sub = function(x) {return 1 + sub(x) | 0;};return sub(x);}
  return 0;
}

var M = [0,bug__0];

function bug2(param) {
  var sub;
  var c_;
  var d_;
  var k = [0,0];
  var x = 0;
  for (; ; ) {
    sub = function(x) {return 1 + sub(x) | 0;};
    c_ = sub(x);
    k[1] = k[1] + c_ | 0;
    d_ = x + 1 | 0;
    if (10 !== x) {x = d_;continue;}
    return k;
  }
}

function bug3(param) {
  var sub;
  var a_;
  var b_;
  var k = [0,0];
  var x = 0;
  for (; ; ) {
    if (0 === x) {
      sub = function(x) {return 1 + sub(x) | 0;};
      a_ = sub(x);
    }
    else a_ = 0;
    k[1] = k[1] + a_ | 0;
    b_ = x + 1 | 0;
    if (10 !== x) {x = b_;continue;}
    return k;
  }
}

var Recursion = [0,nobug1,nobug2,bug,M,bug2,bug3];

module.exports = Recursion;

/*::type Exports = {
  nobug1: (x: any) => any,
  nobug2: (x: any) => any,
  bug: (x: any) => any,
  M: any,
  bug2: (param: any) => any,
  bug3: (param: any) => any,
}*/
/** @type {{
  nobug1: (x: any) => any,
  nobug2: (x: any) => any,
  bug: (x: any) => any,
  M: any,
  bug2: (param: any) => any,
  bug3: (param: any) => any,
}} */
module.exports = ((module.exports /*:: : any*/) /*:: :Exports */);
module.exports.nobug1 = module.exports[1];
module.exports.nobug2 = module.exports[2];
module.exports.bug = module.exports[3];
module.exports.M = module.exports[4];
module.exports.bug2 = module.exports[5];
module.exports.bug3 = module.exports[6];

/* Hashing disabled */
