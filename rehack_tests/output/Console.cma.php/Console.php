<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class Console {
  <<__Override, __Memoize>>
  public static function get() : Vector<dynamic> {
    
    $runtime = (\Rehack\GlobalObject::get() as dynamic)->jsoo_runtime;
    $call1 = $runtime["caml_call1"];
    $call3 = $runtime["caml_call3"];
    $Console_ObjectPrinter = Console__ObjectPrinter::get();
    $makeStandardChannelsConsole = (dynamic $objectPrinter) : dynamic ==> {
      $a_ = (dynamic $a) : dynamic ==> {
        return $runtime["native_debug"](
          $call3($objectPrinter[13], $objectPrinter, 0, $a)
        );
      };
      $b_ = (dynamic $a) : dynamic ==> {
        return $runtime["native_error"](
          $call3($objectPrinter[13], $objectPrinter, 0, $a)
        );
      };
      $c_ = (dynamic $a) : dynamic ==> {
        return $runtime["native_warn"](
          $call3($objectPrinter[13], $objectPrinter, 0, $a)
        );
      };
      $d_ = (dynamic $a) : dynamic ==> {
        return $runtime["native_out"](
          $call3($objectPrinter[13], $objectPrinter, 0, $a)
        );
      };
      return Vector{
        0,
        (dynamic $a) : dynamic ==> {
          return $runtime["native_log"](
            $call3($objectPrinter[13], $objectPrinter, 0, $a)
          );
        },
        $d_,
        $c_,
        $b_,
        $a_
      };
    };
    $defaultGlobalConsole = $makeStandardChannelsConsole(
      $Console_ObjectPrinter[4]
    );
    $currentGlobalConsole = Vector{0, $defaultGlobalConsole} as dynamic;
    $log = (dynamic $a) : dynamic ==> {
      return $call1($currentGlobalConsole[1][1], $a);
    };
    $out = (dynamic $a) : dynamic ==> {
      return $call1($currentGlobalConsole[1][2], $a);
    };
    $debug = (dynamic $a) : dynamic ==> {
      return $call1($currentGlobalConsole[1][5], $a);
    };
    $warn = (dynamic $a) : dynamic ==> {
      return $call1($currentGlobalConsole[1][3], $a);
    };
    $error = (dynamic $a) : dynamic ==> {
      return $call1($currentGlobalConsole[1][4], $a);
    };
    $log__0 = (dynamic $a) : dynamic ==> {
      $call1($currentGlobalConsole[1][1], $a);
      return $a;
    };
    $out__0 = (dynamic $a) : dynamic ==> {
      $call1($currentGlobalConsole[1][2], $a);
      return $a;
    };
    $debug__0 = (dynamic $a) : dynamic ==> {
      $call1($currentGlobalConsole[1][5], $a);
      return $a;
    };
    $warn__0 = (dynamic $a) : dynamic ==> {
      $call1($currentGlobalConsole[1][3], $a);
      return $a;
    };
    $error__0 = (dynamic $a) : dynamic ==> {
      $call1($currentGlobalConsole[1][4], $a);
      return $a;
    };
    $Console = Vector{
      0,
      $Console_ObjectPrinter,
      $currentGlobalConsole,
      $defaultGlobalConsole,
      $makeStandardChannelsConsole,
      $log,
      $out,
      $debug,
      $error,
      $warn,
      Vector{0, $log__0, $out__0, $debug__0, $error__0, $warn__0}
    } as dynamic;
    
    return($Console);

  }
  public static function makeStandardChannelsConsole(dynamic $objectPrinter): dynamic {
    return static::syncCall(__FUNCTION__, 4, $objectPrinter);
  }
  public static function log(dynamic $a): dynamic {
    return static::syncCall(__FUNCTION__, 5, $a);
  }
  public static function out(dynamic $a): dynamic {
    return static::syncCall(__FUNCTION__, 6, $a);
  }
  public static function debug(dynamic $a): dynamic {
    return static::syncCall(__FUNCTION__, 7, $a);
  }
  public static function error(dynamic $a): dynamic {
    return static::syncCall(__FUNCTION__, 8, $a);
  }
  public static function warn(dynamic $a): dynamic {
    return static::syncCall(__FUNCTION__, 9, $a);
  }

}
/* Hashing disabled */
