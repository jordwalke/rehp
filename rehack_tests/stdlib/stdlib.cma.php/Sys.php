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
    $getenv_opt = (dynamic $s) ==> {
      try {$d_ = Vector{0, $runtime["caml_sys_getenv"]($s)};return $d_;}
      catch(\Throwable $e_) {
        $e_ = $runtime["caml_wrap_exception"]($e_);
        if ($e_ === $Not_found) {return 0;}
        throw $caml_wrap_thrown_exception_reraise($e_) as \Throwable;
      }
    };
    $interactive = Vector{0, 0};
    $set_signal = (dynamic $sig_num, dynamic $sig_beh) ==> {return 0;};
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
    $catch_break = (dynamic $on) ==> {
      return $on
        ? $set_signal(
         $sigint,
         Vector{
           0,
           (dynamic $param) ==> {
             throw $caml_wrap_thrown_exception($Break) as \Throwable;
           }
         }
       )
        : ($set_signal($sigint, 0));
    };
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
    };
    
     return ($Sys);

  }
  public static function argv(): dynamic {
    return static::callRehackFunction(static::requireModule()[1], varray[]);
  }
  public static function executable_name(): dynamic {
    return static::callRehackFunction(static::requireModule()[2], varray[]);
  }
  public static function getenv_opt(dynamic $s): dynamic {
    return static::callRehackFunction(static::requireModule()[3], varray[$s]);
  }
  public static function interactive(): dynamic {
    return static::callRehackFunction(static::requireModule()[4], varray[]);
  }
  public static function os_type(): dynamic {
    return static::callRehackFunction(static::requireModule()[5], varray[]);
  }
  public static function backend_type(): dynamic {
    return static::callRehackFunction(static::requireModule()[6], varray[]);
  }
  public static function unix(): dynamic {
    return static::callRehackFunction(static::requireModule()[7], varray[]);
  }
  public static function win32(): dynamic {
    return static::callRehackFunction(static::requireModule()[8], varray[]);
  }
  public static function cygwin(): dynamic {
    return static::callRehackFunction(static::requireModule()[9], varray[]);
  }
  public static function word_size(): dynamic {
    return static::callRehackFunction(static::requireModule()[10], varray[]);
  }
  public static function int_size(): dynamic {
    return static::callRehackFunction(static::requireModule()[11], varray[]);
  }
  public static function big_endian(): dynamic {
    return static::callRehackFunction(static::requireModule()[12], varray[]);
  }
  public static function max_string_length(): dynamic {
    return static::callRehackFunction(static::requireModule()[13], varray[]);
  }
  public static function max_array_length(): dynamic {
    return static::callRehackFunction(static::requireModule()[14], varray[]);
  }
  public static function set_signal(dynamic $sig_num, dynamic $sig_beh): dynamic {
    return static::callRehackFunction(static::requireModule()[15], varray[$sig_num, $sig_beh]);
  }
  public static function sigabrt(): dynamic {
    return static::callRehackFunction(static::requireModule()[16], varray[]);
  }
  public static function sigalrm(): dynamic {
    return static::callRehackFunction(static::requireModule()[17], varray[]);
  }
  public static function sigfpe(): dynamic {
    return static::callRehackFunction(static::requireModule()[18], varray[]);
  }
  public static function sighup(): dynamic {
    return static::callRehackFunction(static::requireModule()[19], varray[]);
  }
  public static function sigill(): dynamic {
    return static::callRehackFunction(static::requireModule()[20], varray[]);
  }
  public static function sigint(): dynamic {
    return static::callRehackFunction(static::requireModule()[21], varray[]);
  }
  public static function sigkill(): dynamic {
    return static::callRehackFunction(static::requireModule()[22], varray[]);
  }
  public static function sigpipe(): dynamic {
    return static::callRehackFunction(static::requireModule()[23], varray[]);
  }
  public static function sigquit(): dynamic {
    return static::callRehackFunction(static::requireModule()[24], varray[]);
  }
  public static function sigsegv(): dynamic {
    return static::callRehackFunction(static::requireModule()[25], varray[]);
  }
  public static function sigterm(): dynamic {
    return static::callRehackFunction(static::requireModule()[26], varray[]);
  }
  public static function sigusr1(): dynamic {
    return static::callRehackFunction(static::requireModule()[27], varray[]);
  }
  public static function sigusr2(): dynamic {
    return static::callRehackFunction(static::requireModule()[28], varray[]);
  }
  public static function sigchld(): dynamic {
    return static::callRehackFunction(static::requireModule()[29], varray[]);
  }
  public static function sigcont(): dynamic {
    return static::callRehackFunction(static::requireModule()[30], varray[]);
  }
  public static function sigstop(): dynamic {
    return static::callRehackFunction(static::requireModule()[31], varray[]);
  }
  public static function sigtstp(): dynamic {
    return static::callRehackFunction(static::requireModule()[32], varray[]);
  }
  public static function sigttin(): dynamic {
    return static::callRehackFunction(static::requireModule()[33], varray[]);
  }
  public static function sigttou(): dynamic {
    return static::callRehackFunction(static::requireModule()[34], varray[]);
  }
  public static function sigvtalrm(): dynamic {
    return static::callRehackFunction(static::requireModule()[35], varray[]);
  }
  public static function sigprof(): dynamic {
    return static::callRehackFunction(static::requireModule()[36], varray[]);
  }
  public static function sigbus(): dynamic {
    return static::callRehackFunction(static::requireModule()[37], varray[]);
  }
  public static function sigpoll(): dynamic {
    return static::callRehackFunction(static::requireModule()[38], varray[]);
  }
  public static function sigsys(): dynamic {
    return static::callRehackFunction(static::requireModule()[39], varray[]);
  }
  public static function sigtrap(): dynamic {
    return static::callRehackFunction(static::requireModule()[40], varray[]);
  }
  public static function sigurg(): dynamic {
    return static::callRehackFunction(static::requireModule()[41], varray[]);
  }
  public static function sigxcpu(): dynamic {
    return static::callRehackFunction(static::requireModule()[42], varray[]);
  }
  public static function sigxfsz(): dynamic {
    return static::callRehackFunction(static::requireModule()[43], varray[]);
  }
  public static function Break(): dynamic {
    return static::callRehackFunction(static::requireModule()[44], varray[]);
  }
  public static function catch_break(dynamic $on): dynamic {
    return static::callRehackFunction(static::requireModule()[45], varray[$on]);
  }
  public static function ocaml_version(): dynamic {
    return static::callRehackFunction(static::requireModule()[46], varray[]);
  }

}
/* Hashing disabled */
