/**
 * Sys
 * @providesModule Sys
 */
"use strict";
var Not_found = require('Not_found.js');
var runtime = require('runtime.js');

let joo_global_object = global;


var runtime = joo_global_object.jsoo_runtime;
var string = runtime["caml_new_string"];
var caml_wrap_exception = runtime["caml_wrap_exception"];
var global_data = runtime["caml_get_global_data"]();
var cst_Sys_Break = string("Sys.Break");
var ocaml_version = string("4.06.0");
var Not_found = global_data["Not_found"];
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
  try {var d = [0,runtime["caml_sys_getenv"](s)];return d;}
  catch(e) {
    e = caml_wrap_exception(e);
    if (e === Not_found) {return 0;}
    throw runtime["caml_wrap_thrown_exception_reraise"](e);
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
     [0,function(param) {throw runtime["caml_wrap_thrown_exception"](Break);}]
   ) :
    set_signal(sigint, 0);
}

function a(c) {return runtime["caml_ml_runtime_warnings_enabled"](c);}

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
  function(b) {return runtime["caml_ml_enable_runtime_warnings"](b);},
  a
];

runtime["caml_register_global"](3, Sys, "Sys");


module.exports = global.jsoo_runtime.caml_get_global_data().Sys;