/**
 * @flow strict
 * Sys
 */

// @ts-check


"use strict";
let joo_global_object = typeof global !== 'undefined' ? global : window;
require('runtime.js');

var runtime = joo_global_object.jsoo_runtime;
var string = runtime["caml_new_string"];
var caml_wrap_thrown_exception = runtime["caml_wrap_thrown_exception"];
var caml_wrap_thrown_exception_reraise = runtime
 ["caml_wrap_thrown_exception_reraise"];
var cst_Sys_Break = string("Sys.Break");
var ocaml_version = string("4.06.0");
var Not_found = require("Not_found.js");
var match = runtime["caml_sys_get_argv"](0);
var argv = match[2];
var executable_name = match[1];
var match__0 = runtime["caml_sys_get_config"](0);
var os_type = match__0[1];
var backend_type = runtime["caml_sys_const_backend_type"](0);
var unix = runtime["caml_sys_const_ostype_unix"](0);
var win32 = runtime["caml_sys_const_ostype_win32"](0);
var cygwin = runtime["caml_sys_const_ostype_cygwin"](0);
var max_array_length = runtime["caml_sys_const_max_wosize"](0);
var max_string_length = (4 * max_array_length | 0) + -1 | 0;
var big_endian = 0;
var word_size = 32;
var int_size = 32;

function getenv_opt(s) {
  try {var d_ = [0,runtime["caml_sys_getenv"](s)];return d_;}
  catch(e_) {
    e_ = runtime["caml_wrap_exception"](e_);
    if (e_ === Not_found) {return 0;}
    throw caml_wrap_thrown_exception_reraise(e_);
  }
}

var interactive = [0,0];

function set_signal(sig_num, sig_beh) {return 0;}

var Break = [248,cst_Sys_Break,runtime["caml_fresh_oo_id"](0)];
var sigabrt = -1;
var sigalrm = -2;
var sigfpe = -3;
var sighup = -4;
var sigill = -5;
var sigint = -6;
var sigkill = -7;
var sigpipe = -8;
var sigquit = -9;
var sigsegv = -10;
var sigterm = -11;
var sigusr1 = -12;
var sigusr2 = -13;
var sigchld = -14;
var sigcont = -15;
var sigstop = -16;
var sigtstp = -17;
var sigttin = -18;
var sigttou = -19;
var sigvtalrm = -20;
var sigprof = -21;
var sigbus = -22;
var sigpoll = -23;
var sigsys = -24;
var sigtrap = -25;
var sigurg = -26;
var sigxcpu = -27;
var sigxfsz = -28;

function catch_break(on) {
  return on ?
    set_signal(
     sigint,
     [0,function(param) {throw caml_wrap_thrown_exception(Break);}]
   ) :
    set_signal(sigint, 0);
}

function a_(c_) {return runtime["caml_ml_runtime_warnings_enabled"](c_);}

var Sys = [
  0,
  argv,
  executable_name,
  getenv_opt,
  interactive,
  os_type,
  backend_type,
  unix,
  win32,
  cygwin,
  word_size,
  int_size,
  big_endian,
  max_string_length,
  max_array_length,
  set_signal,
  sigabrt,
  sigalrm,
  sigfpe,
  sighup,
  sigill,
  sigint,
  sigkill,
  sigpipe,
  sigquit,
  sigsegv,
  sigterm,
  sigusr1,
  sigusr2,
  sigchld,
  sigcont,
  sigstop,
  sigtstp,
  sigttin,
  sigttou,
  sigvtalrm,
  sigprof,
  sigbus,
  sigpoll,
  sigsys,
  sigtrap,
  sigurg,
  sigxcpu,
  sigxfsz,
  Break,
  catch_break,
  ocaml_version,
  function(b_) {return runtime["caml_ml_enable_runtime_warnings"](b_);},
  a_
];

exports = Sys;

/*::type Exports = {
  ocaml_version: any
  catch_break: (on: any) => any,
  Break: any
  sigxfsz: any
  sigxcpu: any
  sigurg: any
  sigtrap: any
  sigsys: any
  sigpoll: any
  sigbus: any
  sigprof: any
  sigvtalrm: any
  sigttou: any
  sigttin: any
  sigtstp: any
  sigstop: any
  sigcont: any
  sigchld: any
  sigusr2: any
  sigusr1: any
  sigterm: any
  sigsegv: any
  sigquit: any
  sigpipe: any
  sigkill: any
  sigint: any
  sigill: any
  sighup: any
  sigfpe: any
  sigalrm: any
  sigabrt: any
  set_signal: (sig_num: any, sig_beh: any) => any,
  max_array_length: any
  max_string_length: any
  big_endian: any
  int_size: any
  word_size: any
  cygwin: any
  win32: any
  unix: any
  backend_type: any
  os_type: any
  interactive: any
  getenv_opt: (s: any) => any,
  executable_name: any
  argv: any
}*/
/** @type {{
  ocaml_version: any,
  catch_break: (any) => any,
  Break: any,
  sigxfsz: any,
  sigxcpu: any,
  sigurg: any,
  sigtrap: any,
  sigsys: any,
  sigpoll: any,
  sigbus: any,
  sigprof: any,
  sigvtalrm: any,
  sigttou: any,
  sigttin: any,
  sigtstp: any,
  sigstop: any,
  sigcont: any,
  sigchld: any,
  sigusr2: any,
  sigusr1: any,
  sigterm: any,
  sigsegv: any,
  sigquit: any,
  sigpipe: any,
  sigkill: any,
  sigint: any,
  sigill: any,
  sighup: any,
  sigfpe: any,
  sigalrm: any,
  sigabrt: any,
  set_signal: (any, any) => any,
  max_array_length: any,
  max_string_length: any,
  big_endian: any,
  int_size: any,
  word_size: any,
  cygwin: any,
  win32: any,
  unix: any,
  backend_type: any,
  os_type: any,
  interactive: any,
  getenv_opt: (any) => any,
  executable_name: any,
  argv: any,
}} */
module.exports = ((exports /*:: : any*/) /*:: :Exports */);
module.exports.ocaml_version = module.exports[46];
module.exports.catch_break = module.exports[45];
module.exports.Break = module.exports[44];
module.exports.sigxfsz = module.exports[43];
module.exports.sigxcpu = module.exports[42];
module.exports.sigurg = module.exports[41];
module.exports.sigtrap = module.exports[40];
module.exports.sigsys = module.exports[39];
module.exports.sigpoll = module.exports[38];
module.exports.sigbus = module.exports[37];
module.exports.sigprof = module.exports[36];
module.exports.sigvtalrm = module.exports[35];
module.exports.sigttou = module.exports[34];
module.exports.sigttin = module.exports[33];
module.exports.sigtstp = module.exports[32];
module.exports.sigstop = module.exports[31];
module.exports.sigcont = module.exports[30];
module.exports.sigchld = module.exports[29];
module.exports.sigusr2 = module.exports[28];
module.exports.sigusr1 = module.exports[27];
module.exports.sigterm = module.exports[26];
module.exports.sigsegv = module.exports[25];
module.exports.sigquit = module.exports[24];
module.exports.sigpipe = module.exports[23];
module.exports.sigkill = module.exports[22];
module.exports.sigint = module.exports[21];
module.exports.sigill = module.exports[20];
module.exports.sighup = module.exports[19];
module.exports.sigfpe = module.exports[18];
module.exports.sigalrm = module.exports[17];
module.exports.sigabrt = module.exports[16];
module.exports.set_signal = module.exports[15];
module.exports.max_array_length = module.exports[14];
module.exports.max_string_length = module.exports[13];
module.exports.big_endian = module.exports[12];
module.exports.int_size = module.exports[11];
module.exports.word_size = module.exports[10];
module.exports.cygwin = module.exports[9];
module.exports.win32 = module.exports[8];
module.exports.unix = module.exports[7];
module.exports.backend_type = module.exports[6];
module.exports.os_type = module.exports[5];
module.exports.interactive = module.exports[4];
module.exports.getenv_opt = module.exports[3];
module.exports.executable_name = module.exports[2];
module.exports.argv = module.exports[1];

/* Hashing disabled */
