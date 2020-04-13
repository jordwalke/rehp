<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class Stdlib__sys {
  <<__Override, __Memoize>>
  public static function get() : Vector<dynamic> {
    
    $runtime = (\Rehack\GlobalObject::get() as dynamic)->jsoo_runtime;
    $string = $runtime["caml_new_string"];
    $caml_wrap_thrown_exception = $runtime["caml_wrap_thrown_exception"];
    $caml_wrap_thrown_exception_reraise = $runtime[
       "caml_wrap_thrown_exception_reraise"
     ];
    $cst_Stdlib_Sys_Break = $string("Stdlib.Sys.Break");
    $ocaml_version = $string("4.08.1");
    $Stdlib = Stdlib::get();
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
    $max_floatarray_length = (int) ($max_array_length / 2) as dynamic;
    $max_string_length = (int) ((int) (4 * $max_array_length) + -1) as dynamic;
    $big_endian = 0 as dynamic;
    $word_size = 32 as dynamic;
    $int_size = 32 as dynamic;
    $getenv_opt = (dynamic $s) : dynamic ==> {
      $d_ = null as dynamic;
      try {
        $d_ = Vector{0, $runtime["caml_sys_getenv"]($s)} as dynamic;
        return $d_;
      }
      catch(\Throwable $e_) {
        $e_ = $runtime["caml_wrap_exception"]($e_);
        if ($e_ === $Stdlib[8]) {return 0;}
        throw $caml_wrap_thrown_exception_reraise($e_) as \Throwable;
      }
    };
    $interactive = Vector{0, 0} as dynamic;
    $set_signal = (dynamic $sig_num, dynamic $sig_beh) : dynamic ==> {return 0;
    };
    $Break = Vector{
      248,
      $cst_Stdlib_Sys_Break,
      $runtime["caml_fresh_oo_id"](0)
    } as dynamic;
    $sigabrt = -1 as dynamic;
    $sigalrm = -2 as dynamic;
    $sigfpe = -3 as dynamic;
    $sighup = -4 as dynamic;
    $sigill = -5 as dynamic;
    $sigint = -6 as dynamic;
    $sigkill = -7 as dynamic;
    $sigpipe = -8 as dynamic;
    $sigquit = -9 as dynamic;
    $sigsegv = -10 as dynamic;
    $sigterm = -11 as dynamic;
    $sigusr1 = -12 as dynamic;
    $sigusr2 = -13 as dynamic;
    $sigchld = -14 as dynamic;
    $sigcont = -15 as dynamic;
    $sigstop = -16 as dynamic;
    $sigtstp = -17 as dynamic;
    $sigttin = -18 as dynamic;
    $sigttou = -19 as dynamic;
    $sigvtalrm = -20 as dynamic;
    $sigprof = -21 as dynamic;
    $sigbus = -22 as dynamic;
    $sigpoll = -23 as dynamic;
    $sigsys = -24 as dynamic;
    $sigtrap = -25 as dynamic;
    $sigurg = -26 as dynamic;
    $sigxcpu = -27 as dynamic;
    $sigxfsz = -28 as dynamic;
    $catch_break = (dynamic $on) : dynamic ==> {
      return $on
        ? $set_signal(
         $sigint,
         Vector{
           0,
           (dynamic $param) : dynamic ==> {
             throw $caml_wrap_thrown_exception($Break) as \Throwable;
           }
         }
       )
        : ($set_signal($sigint, 0));
    };
    $a_ = (dynamic $c_) : dynamic ==> {
      return $runtime["caml_ml_runtime_warnings_enabled"]($c_);
    };
    $Stdlib_sys = Vector{
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
      $max_floatarray_length,
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
      (dynamic $b_) : dynamic ==> {
        return $runtime["caml_ml_enable_runtime_warnings"]($b_);
      },
      $a_
    } as dynamic;
    
    return($Stdlib_sys);

  }
  public static function getenv_opt(dynamic $s): dynamic {
    return static::syncCall(__FUNCTION__, 3, $s);
  }
  public static function set_signal(dynamic $sig_num, dynamic $sig_beh): dynamic {
    return static::syncCall(__FUNCTION__, 16, $sig_num, $sig_beh);
  }
  public static function catch_break(dynamic $on): dynamic {
    return static::syncCall(__FUNCTION__, 46, $on);
  }

}
/* Hashing disabled */
