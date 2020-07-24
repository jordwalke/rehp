/**
 * @flow strict
 * Recursion
 */

// @ts-check


"use strict";

var runtime = require("../../runtime/runtime.js");

function nobug1(x) {return 1 + nobug1(x) | 0;}

nobug1(42);

function nobug2(x) {function sub(x) {return 1 + sub(x) | 0;}return sub(x);}

function bug(x) {
  if (0 === x) {var sub = function(x) {return 1 + sub(x) | 0;};return sub(x);}
  return 0;
}

function bug__0(x) {
  if (0 === x) {var sub = function(x) {return 1 + sub(x) | 0;};return sub(x);}
  return 0;
}

var M = [0,bug__0];

function bug2(param) {
  var k = [0,0];
  var x = 0;
  for (; ; ) {
    var sub = function(x) {return 1 + sub(x) | 0;};
    var c_ = sub(x);
    k[1] = k[1] + c_ | 0;
    var d_ = x + 1 | 0;
    if (10 !== x) {var x = d_;continue;}
    return k;
  }
}

function bug3(param) {
  var k = [0,0];
  var x = 0;
  for (; ; ) {
    if (0 === x) {
      var sub = function(x) {return 1 + sub(x) | 0;};
      var a_ = sub(x);
    }
    else var a_ = 0;
    k[1] = k[1] + a_ | 0;
    var b_ = x + 1 | 0;
    if (10 !== x) {var x = b_;continue;}
    return k;
  }
}

function mutual_recursion1(param) {
  function f(param) {for (; ; ) continue;}
  function g(param) {return f(0);}
  return [0,f,g];
}

function mutual_recursion2(param) {
  function f2(param) {function f3(param) {return f1(0);}return f3;}
  function f1(param) {for (; ; ) continue;}
  return [0,f1,f2];
}

var Recursion = [
  0,
  nobug1,
  nobug2,
  bug,
  M,
  bug2,
  bug3,
  mutual_recursion1,
  mutual_recursion2
];

module.exports = Recursion;

/*::type Exports = {
  nobug1: (x: any) => any,
  nobug2: (x: any) => any,
  bug: (x: any) => any,
  M: any,
  bug2: (param: any) => any,
  bug3: (param: any) => any,
  mutual_recursion1: (param: any) => any,
  mutual_recursion2: (param: any) => any,
}*/
/** @type {{
  nobug1: (x: any) => any,
  nobug2: (x: any) => any,
  bug: (x: any) => any,
  M: any,
  bug2: (param: any) => any,
  bug3: (param: any) => any,
  mutual_recursion1: (param: any) => any,
  mutual_recursion2: (param: any) => any,
}} */
module.exports = ((module.exports /*:: : any*/) /*:: :Exports */);
module.exports.nobug1 = module.exports[1];
module.exports.nobug2 = module.exports[2];
module.exports.bug = module.exports[3];
module.exports.M = module.exports[4];
module.exports.bug2 = module.exports[5];
module.exports.bug3 = module.exports[6];
module.exports.mutual_recursion1 = module.exports[7];
module.exports.mutual_recursion2 = module.exports[8];

/* Hashing disabled */
