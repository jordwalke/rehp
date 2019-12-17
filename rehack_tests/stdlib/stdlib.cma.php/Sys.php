<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class Sys {
  <<__Override, __Memoize>>
  public static function get() : Vector<dynamic> {
    $joo_global_object = \Rehack\GlobalObject::get() as dynamic;
    
    $runtime = $joo_global_object->jsoo_runtime;
    $string = $runtime["caml_new_string"];
    $caml_wrap_thrown_exception = $runtime["caml_wrap_thrown_exception"];
    $caml_wrap_thrown_exception_reraise = $runtime[
       "caml_wrap_thrown_exception_reraise"
     ];
    $cst_Sys_Break = $string("Sys.Break");
    $ocaml_version = $string("4.06.0");
    $Not_found =  Not_found::get ();
    $match = $runtime["caml_sys_get_argv"](0);
    $argv = $match[2];
    $executable_name = $match[1];
    $match__0 = $runtime["caml_sys_get_config"](0);
    $os_type = $match__0[1];
    $backend_type = $runtime["caml_sys_const_backend_type"](0);
    $unix = $runtime["caml_sys_const_ostype_unix"](0);
    $win32 = $runtime["caml_sys_const_ostype_win32"](0);
    $cygwin = $runtime["caml_sys_const_ostype_cygwin"](0);
    $max_array_length = $runtime["caml_sys_const_max_wosize"](0);
    $max_string_length = (int) ((int) (4 * $max_array_length) + -1);
    $big_endian = 0;
    $word_size = 32;
    $int_size = 32;
    $getenv_opt = function(dynamic $s) use ($Not_found,$caml_wrap_thrown_exception_reraise,$runtime) {
      try {$d_ = Vector{0, $runtime["caml_sys_getenv"]($s)};return $d_;}
      catch(\Throwable $e_) {
        $e_ = $runtime["caml_wrap_exception"]($e_);
        if ($e_ === $Not_found) {return 0;}
        throw $caml_wrap_thrown_exception_reraise($e_) as \Throwable;
      }
    };
    $interactive = Vector{0, 0};
    $set_signal = function(dynamic $sig_num, dynamic $sig_beh) {return 0;};
    $Break = Vector{248, $cst_Sys_Break, $runtime["caml_fresh_oo_id"](0)};
    $sigabrt = -1;
    $sigalrm = -2;
    $sigfpe = -3;
    $sighup = -4;
    $sigill = -5;
    $sigint = -6;
    $sigkill = -7;
    $sigpipe = -8;
    $sigquit = -9;
    $sigsegv = -10;
    $sigterm = -11;
    $sigusr1 = -12;
    $sigusr2 = -13;
    $sigchld = -14;
    $sigcont = -15;
    $sigstop = -16;
    $sigtstp = -17;
    $sigttin = -18;
    $sigttou = -19;
    $sigvtalrm = -20;
    $sigprof = -21;
    $sigbus = -22;
    $sigpoll = -23;
    $sigsys = -24;
    $sigtrap = -25;
    $sigurg = -26;
    $sigxcpu = -27;
    $sigxfsz = -28;
    $catch_break = function(dynamic $on) use ($Break,$caml_wrap_thrown_exception,$set_signal,$sigint) {
      return $on
        ? $set_signal(
         $sigint,
         Vector{
           0,
           function(dynamic $param) use ($Break,$caml_wrap_thrown_exception) {
             throw $caml_wrap_thrown_exception($Break) as \Throwable;
           }
         }
       )
        : ($set_signal($sigint, 0));
    };
    $a_ = function(dynamic $c_) use ($runtime) {
      return $runtime["caml_ml_runtime_warnings_enabled"]($c_);
    };
    $Sys = Vector{
      0,
      $argv,
      $executable_name,
      $getenv_opt,
      $interactive,
      $os_type,
      $backend_type,
      $unix,
      $win32,
      $cygwin,
      $word_size,
      $int_size,
      $big_endian,
      $max_string_length,
      $max_array_length,
      $set_signal,
      $sigabrt,
      $sigalrm,
      $sigfpe,
      $sighup,
      $sigill,
      $sigint,
      $sigkill,
      $sigpipe,
      $sigquit,
      $sigsegv,
      $sigterm,
      $sigusr1,
      $sigusr2,
      $sigchld,
      $sigcont,
      $sigstop,
      $sigtstp,
      $sigttin,
      $sigttou,
      $sigvtalrm,
      $sigprof,
      $sigbus,
      $sigpoll,
      $sigsys,
      $sigtrap,
      $sigurg,
      $sigxcpu,
      $sigxfsz,
      $Break,
      $catch_break,
      $ocaml_version,
      function(dynamic $b_) use ($runtime) {
        return $runtime["caml_ml_enable_runtime_warnings"]($b_);
      },
      $a_
    };
    
     return ($Sys);

  }
  public static function ocaml_version() {
    return static::get()[46]();
  }
  public static function catch_break(dynamic $on) {
    return static::get()[45]($on);
  }
  public static function Break() {
    return static::get()[44]();
  }
  public static function sigxfsz() {
    return static::get()[43]();
  }
  public static function sigxcpu() {
    return static::get()[42]();
  }
  public static function sigurg() {
    return static::get()[41]();
  }
  public static function sigtrap() {
    return static::get()[40]();
  }
  public static function sigsys() {
    return static::get()[39]();
  }
  public static function sigpoll() {
    return static::get()[38]();
  }
  public static function sigbus() {
    return static::get()[37]();
  }
  public static function sigprof() {
    return static::get()[36]();
  }
  public static function sigvtalrm() {
    return static::get()[35]();
  }
  public static function sigttou() {
    return static::get()[34]();
  }
  public static function sigttin() {
    return static::get()[33]();
  }
  public static function sigtstp() {
    return static::get()[32]();
  }
  public static function sigstop() {
    return static::get()[31]();
  }
  public static function sigcont() {
    return static::get()[30]();
  }
  public static function sigchld() {
    return static::get()[29]();
  }
  public static function sigusr2() {
    return static::get()[28]();
  }
  public static function sigusr1() {
    return static::get()[27]();
  }
  public static function sigterm() {
    return static::get()[26]();
  }
  public static function sigsegv() {
    return static::get()[25]();
  }
  public static function sigquit() {
    return static::get()[24]();
  }
  public static function sigpipe() {
    return static::get()[23]();
  }
  public static function sigkill() {
    return static::get()[22]();
  }
  public static function sigint() {
    return static::get()[21]();
  }
  public static function sigill() {
    return static::get()[20]();
  }
  public static function sighup() {
    return static::get()[19]();
  }
  public static function sigfpe() {
    return static::get()[18]();
  }
  public static function sigalrm() {
    return static::get()[17]();
  }
  public static function sigabrt() {
    return static::get()[16]();
  }
  public static function set_signal(dynamic $sig_num, dynamic $sig_beh) {
    return static::get()[15]($sig_num, $sig_beh);
  }
  public static function max_array_length() {
    return static::get()[14]();
  }
  public static function max_string_length() {
    return static::get()[13]();
  }
  public static function big_endian() {
    return static::get()[12]();
  }
  public static function int_size() {
    return static::get()[11]();
  }
  public static function word_size() {
    return static::get()[10]();
  }
  public static function cygwin() {
    return static::get()[9]();
  }
  public static function win32() {
    return static::get()[8]();
  }
  public static function unix() {
    return static::get()[7]();
  }
  public static function backend_type() {
    return static::get()[6]();
  }
  public static function os_type() {
    return static::get()[5]();
  }
  public static function interactive() {
    return static::get()[4]();
  }
  public static function getenv_opt(dynamic $s) {
    return static::get()[3]($s);
  }
  public static function executable_name() {
    return static::get()[2]();
  }
  public static function argv() {
    return static::get()[1]();
  }

}
/* Hashing disabled */
