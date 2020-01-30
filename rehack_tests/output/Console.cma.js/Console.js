/**
 * @flow strict
 * Console
 */

// @ts-check


"use strict";

var runtime = require("../runtime/runtime.js");

;

function call1(f, a0) {
  return f.length === 1 ? f(a0) : runtime["caml_call_gen"](f, [a0]);
}

function call3(f, a0, a1, a2) {
  return f.length === 3 ?
    f(a0, a1, a2) :
    runtime["caml_call_gen"](f, [a0,a1,a2]);
}

var Console_ObjectPrinter = require("./Console__ObjectPrinter.js");

function makeStandardChannelsConsole(objectPrinter) {
  function a_(a) {
    return runtime["native_debug"](
      call3(objectPrinter[13], objectPrinter, 0, a)
    );
  }
  function b_(a) {
    return runtime["native_error"](
      call3(objectPrinter[13], objectPrinter, 0, a)
    );
  }
  function c_(a) {
    return runtime["native_warn"](
      call3(objectPrinter[13], objectPrinter, 0, a)
    );
  }
  function d_(a) {
    return runtime["native_out"](
      call3(objectPrinter[13], objectPrinter, 0, a)
    );
  }
  return [
    0,
    function(a) {
      return runtime["native_log"](
        call3(objectPrinter[13], objectPrinter, 0, a)
      );
    },
    d_,
    c_,
    b_,
    a_
  ];
}

var defaultGlobalConsole = makeStandardChannelsConsole(
  Console_ObjectPrinter[4]
);
var currentGlobalConsole = [0,defaultGlobalConsole];

function log(a) {return call1(defaultGlobalConsole[1], a);}

function out(a) {return call1(defaultGlobalConsole[2], a);}

function debug(a) {return call1(defaultGlobalConsole[5], a);}

function warn(a) {return call1(defaultGlobalConsole[3], a);}

function error(a) {return call1(defaultGlobalConsole[4], a);}

function log__0(a) {call1(defaultGlobalConsole[1], a);return a;}

function out__0(a) {call1(defaultGlobalConsole[2], a);return a;}

function debug__0(a) {call1(defaultGlobalConsole[5], a);return a;}

function warn__0(a) {call1(defaultGlobalConsole[3], a);return a;}

function error__0(a) {call1(defaultGlobalConsole[4], a);return a;}

var Console = [
  0,
  Console_ObjectPrinter,
  currentGlobalConsole,
  defaultGlobalConsole,
  makeStandardChannelsConsole,
  log,
  out,
  debug,
  error,
  warn,
  [0,log__0,out__0,debug__0,error__0,warn__0]
];

module.exports = Console;

/*::type Exports = {
  Console_ObjectPrinter: any,
  currentGlobalConsole: any,
  defaultGlobalConsole: any,
  makeStandardChannelsConsole: (objectPrinter: any) => any,
  log: (a: any) => any,
  out: (a: any) => any,
  debug: (a: any) => any,
  error: (a: any) => any,
  warn: (a: any) => any,
}*/
/** @type {{
  Console_ObjectPrinter: any,
  currentGlobalConsole: any,
  defaultGlobalConsole: any,
  makeStandardChannelsConsole: (objectPrinter: any) => any,
  log: (a: any) => any,
  out: (a: any) => any,
  debug: (a: any) => any,
  error: (a: any) => any,
  warn: (a: any) => any,
}} */
module.exports = ((module.exports /*:: : any*/) /*:: :Exports */);
module.exports.Console_ObjectPrinter = module.exports[1];
module.exports.currentGlobalConsole = module.exports[2];
module.exports.defaultGlobalConsole = module.exports[3];
module.exports.makeStandardChannelsConsole = module.exports[4];
module.exports.log = module.exports[5];
module.exports.out = module.exports[6];
module.exports.debug = module.exports[7];
module.exports.error = module.exports[8];
module.exports.warn = module.exports[9];

/* Hashing disabled */
