/**
 * @flow strict
 * Stdlib__sys
 */

// @ts-check


"use strict";

var runtime = require("../runtime/runtime.js");
var string = runtime["caml_new_string"];
var caml_wrap_thrown_exception = runtime["caml_wrap_thrown_exception"];
var caml_wrap_thrown_exception_reraise = runtime
 ["caml_wrap_thrown_exception_reraise"];
var cst_Stdlib_Sys_Break = string("Stdlib.Sys.Break");
var ocaml_version = string("4.08.1");
var Stdlib = require("./Stdlib.js");
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
var max_floatarray_length = max_array_length / 2 | 0;
var max_string_length = (4 * max_array_length | 0) + -1 | 0;
var big_endian = 0;
var word_size = 32;
var int_size = 32;

function getenv_opt(s) {
  try {var d_ = [0,runtime["caml_sys_getenv"](s)];return d_;}
  catch(e_) {
    e_ = runtime["caml_wrap_exception"](e_);
    if (e_ === Stdlib[8]) {return 0;}
    throw caml_wrap_thrown_exception_reraise(e_);
  }
}

var interactive = [0,0];

function set_signal(sig_num, sig_beh) {return 0;}

var Break = [248,cst_Stdlib_Sys_Break,runtime["caml_fresh_oo_id"](0)];
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

var Stdlib_sys = [
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
  max_floatarray_length,
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

module.exports = Stdlib_sys;

/*::type Exports = {
  argv: any,
  executable_name: any,
  getenv_opt: (s: any) => any,
  interactive: any,
  os_type: any,
  backend_type: any,
  unix: any,
  win32: any,
  cygwin: any,
  word_size: any,
  int_size: any,
  big_endian: any,
  max_string_length: any,
  max_array_length: any,
  max_floatarray_length: any,
  set_signal: (sig_num: any, sig_beh: any) => any,
  sigabrt: any,
  sigalrm: any,
  sigfpe: any,
  sighup: any,
  sigill: any,
  sigint: any,
  sigkill: any,
  sigpipe: any,
  sigquit: any,
  sigsegv: any,
  sigterm: any,
  sigusr1: any,
  sigusr2: any,
  sigchld: any,
  sigcont: any,
  sigstop: any,
  sigtstp: any,
  sigttin: any,
  sigttou: any,
  sigvtalrm: any,
  sigprof: any,
  sigbus: any,
  sigpoll: any,
  sigsys: any,
  sigtrap: any,
  sigurg: any,
  sigxcpu: any,
  sigxfsz: any,
  Break: any,
  catch_break: (on: any) => any,
  ocaml_version: any,
}*/
/** @type {{
  argv: any,
  executable_name: any,
  getenv_opt: (s: any) => any,
  interactive: any,
  os_type: any,
  backend_type: any,
  unix: any,
  win32: any,
  cygwin: any,
  word_size: any,
  int_size: any,
  big_endian: any,
  max_string_length: any,
  max_array_length: any,
  max_floatarray_length: any,
  set_signal: (sig_num: any, sig_beh: any) => any,
  sigabrt: any,
  sigalrm: any,
  sigfpe: any,
  sighup: any,
  sigill: any,
  sigint: any,
  sigkill: any,
  sigpipe: any,
  sigquit: any,
  sigsegv: any,
  sigterm: any,
  sigusr1: any,
  sigusr2: any,
  sigchld: any,
  sigcont: any,
  sigstop: any,
  sigtstp: any,
  sigttin: any,
  sigttou: any,
  sigvtalrm: any,
  sigprof: any,
  sigbus: any,
  sigpoll: any,
  sigsys: any,
  sigtrap: any,
  sigurg: any,
  sigxcpu: any,
  sigxfsz: any,
  Break: any,
  catch_break: (on: any) => any,
  ocaml_version: any,
}} */
module.exports = ((module.exports /*:: : any*/) /*:: :Exports */);
module.exports.argv = module.exports[1];
module.exports.executable_name = module.exports[2];
module.exports.getenv_opt = module.exports[3];
module.exports.interactive = module.exports[4];
module.exports.os_type = module.exports[5];
module.exports.backend_type = module.exports[6];
module.exports.unix = module.exports[7];
module.exports.win32 = module.exports[8];
module.exports.cygwin = module.exports[9];
module.exports.word_size = module.exports[10];
module.exports.int_size = module.exports[11];
module.exports.big_endian = module.exports[12];
module.exports.max_string_length = module.exports[13];
module.exports.max_array_length = module.exports[14];
module.exports.max_floatarray_length = module.exports[15];
module.exports.set_signal = module.exports[16];
module.exports.sigabrt = module.exports[17];
module.exports.sigalrm = module.exports[18];
module.exports.sigfpe = module.exports[19];
module.exports.sighup = module.exports[20];
module.exports.sigill = module.exports[21];
module.exports.sigint = module.exports[22];
module.exports.sigkill = module.exports[23];
module.exports.sigpipe = module.exports[24];
module.exports.sigquit = module.exports[25];
module.exports.sigsegv = module.exports[26];
module.exports.sigterm = module.exports[27];
module.exports.sigusr1 = module.exports[28];
module.exports.sigusr2 = module.exports[29];
module.exports.sigchld = module.exports[30];
module.exports.sigcont = module.exports[31];
module.exports.sigstop = module.exports[32];
module.exports.sigtstp = module.exports[33];
module.exports.sigttin = module.exports[34];
module.exports.sigttou = module.exports[35];
module.exports.sigvtalrm = module.exports[36];
module.exports.sigprof = module.exports[37];
module.exports.sigbus = module.exports[38];
module.exports.sigpoll = module.exports[39];
module.exports.sigsys = module.exports[40];
module.exports.sigtrap = module.exports[41];
module.exports.sigurg = module.exports[42];
module.exports.sigxcpu = module.exports[43];
module.exports.sigxfsz = module.exports[44];
module.exports.Break = module.exports[45];
module.exports.catch_break = module.exports[46];
module.exports.ocaml_version = module.exports[47];

/* Hashing disabled */
