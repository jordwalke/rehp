<?hh
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * Sys.php
 */

namespace Rehack;

final class Sys {
  <<__Memoize>>
  public static function get() {
    $global_object = \Rehack\GlobalObject::get();
    $runtime = \Rehack\Runtime::get();
    /*
     * Soon, these will replace the `global_data->ModuleName`
     * pattern in the load() function.
     */
    $Not_found = Not_found::get();
    Sys::load($global_object);
    $memoized = $runtime->caml_get_global_data()->Sys;
    return $memoized;
  }

  /**
   * Performs module load operation. May have side effects.
   */
  private static function load($joo_global_object) {
    

    $runtime = $joo_global_object->jsoo_runtime;
    $string = $runtime["caml_new_string"];
    $caml_wrap_exception = $runtime["caml_wrap_exception"];
    $global_data = $runtime["caml_get_global_data"]();
    $cst_Sys_Break = $string("Sys.Break");
    $ocaml_version = $string("4.06.0");
    $Not_found = $global_data["Not_found"];
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
    $getenv_opt = function(dynamic $s) use ($Not_found,$caml_wrap_exception,$runtime) {
      try {$d = Vector{0, $runtime["caml_sys_getenv"]($s)};return $d;}
      catch(\Throwable $e) {
        $e = $caml_wrap_exception($e);
        if ($e === $Not_found) {return 0;}
        throw $runtime["caml_wrap_thrown_exception_reraise"]($e) as \Throwable;
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
    $catch_break = function(dynamic $on) use ($Break,$runtime,$set_signal,$sigint) {
      return $on
        ? $set_signal(
         $sigint,
         Vector{
           0,
           function(dynamic $param) use ($Break,$runtime) {
             throw $runtime["caml_wrap_thrown_exception"]($Break) as \Throwable;
           }
         }
       )
        : ($set_signal($sigint, 0));
    };
    $a = function(dynamic $c) use ($runtime) {
      return $runtime["caml_ml_runtime_warnings_enabled"]($c);
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
      function(dynamic $b) use ($runtime) {
        return $runtime["caml_ml_enable_runtime_warnings"]($b);
      },
      $a
    };
    
    $runtime["caml_register_global"](3, $Sys, "Sys");

  }
}