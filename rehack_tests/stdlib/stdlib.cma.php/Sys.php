<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class Sys {
  <<__Override, __Memoize>>
  public static function requireModule() : Vector<dynamic> {
    $joo_global_object = \Rehack\GlobalObject::get() as dynamic;
    
    $runtime = $joo_global_object->jsoo_runtime;
    $string = $runtime["caml_new_string"];
    $caml_wrap_thrown_exception_reraise = $runtime[
       "caml_wrap_thrown_exception_reraise"
     ];
    $cst_Sys_Break = $string("Sys.Break");
    $ocaml_version = $string("4.06.0");
    $Not_found =  Not_found::requireModule ();
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
    $getenv_opt = (dynamic $s) ==> {
      $d_ = null;
      try {$d_ = Vector{0, $runtime["caml_sys_getenv"]($s)};return $d_;}
      catch(\Throwable $e_) {
        $e_ = $runtime["caml_wrap_exception"]($e_);
        if ($e_ === $Not_found) {return 0;}
        throw $caml_wrap_thrown_exception_reraise($e_) as \Throwable;
      }
    };
    $interactive = Vector{0, 0} as dynamic;
    $set_signal = (dynamic $sig_num, dynamic $sig_beh) ==> {return 0;};
    $Break = Vector{248, $cst_Sys_Break, $runtime["caml_fresh_oo_id"](0)} as dynamic;
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
    $catch_break = (dynamic $on) ==> {return $on ? 0 : (0);};
    $a_ = (dynamic $c_) ==> {
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
      (dynamic $b_) ==> {
        return $runtime["caml_ml_enable_runtime_warnings"]($b_);
      },
      $a_
    } as dynamic;
    
     return ($Sys);

  }
  public static function getenv_opt(dynamic $s): dynamic {
    return static::callRehackFunction(static::requireModule()[3], varray[$s]);
  }
  public static function set_signal(dynamic $sig_num, dynamic $sig_beh): dynamic {
    return static::callRehackFunction(static::requireModule()[15], varray[$sig_num, $sig_beh]);
  }
  public static function _catch_break_(dynamic $on): dynamic {
    return static::callRehackFunction(static::requireModule()[45], varray[$on]);
  }

}
/* Hashing disabled */
