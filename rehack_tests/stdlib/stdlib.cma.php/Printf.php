<?hh
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * Printf.php
 */

namespace Rehack;

final class Printf {
  <<__Memoize>>
  public static function get() {
    $global_object = \Rehack\GlobalObject::get();
    $runtime = \Rehack\Runtime::get();
    /*
     * Soon, these will replace the `global_data->ModuleName`
     * pattern in the load() function.
     */
    $Buffer = Buffer::get();
    $CamlinternalFormat = CamlinternalFormat::get();
    $Pervasives = Pervasives::get();
    Printf::load($global_object);
    $memoized = $runtime->caml_get_global_data()->Printf;
    return $memoized;
  }

  /**
   * Performs module load operation. May have side effects.
   */
  private static function load($joo_global_object) {
    

    $runtime = $joo_global_object->jsoo_runtime;
    $call1 = $runtime["caml_call1"];
    $call2 = $runtime["caml_call2"];
    $call3 = $runtime["caml_call3"];
    $call4 = $runtime["caml_call4"];
    $global_data = $runtime["caml_get_global_data"]();
    $Buffer = $global_data["Buffer"];
    $CamlinternalFormat = $global_data["CamlinternalFormat"];
    $Pervasives = $global_data["Pervasives"];
    $kfprintf = function(dynamic $k, dynamic $o, dynamic $param) use ($CamlinternalFormat,$call1,$call2,$call4) {
      $fmt = $param[1];
      $f = 0;
      $g = function(dynamic $o, dynamic $acc) use ($CamlinternalFormat,$call1,$call2,$k) {
        $call2($CamlinternalFormat[9], $o, $acc);
        return $call1($k, $o);
      };
      return $call4($CamlinternalFormat[7], $g, $o, $f, $fmt);
    };
    $kbprintf = function(dynamic $k, dynamic $b, dynamic $param) use ($CamlinternalFormat,$call1,$call2,$call4) {
      $fmt = $param[1];
      $d = 0;
      $e = function(dynamic $b, dynamic $acc) use ($CamlinternalFormat,$call1,$call2,$k) {
        $call2($CamlinternalFormat[10], $b, $acc);
        return $call1($k, $b);
      };
      return $call4($CamlinternalFormat[7], $e, $b, $d, $fmt);
    };
    $ikfprintf = function(dynamic $k, dynamic $oc, dynamic $param) use ($CamlinternalFormat,$call3) {
      $fmt = $param[1];
      return $call3($CamlinternalFormat[8], $k, $oc, $fmt);
    };
    $fprintf = function(dynamic $oc, dynamic $fmt) use ($kfprintf) {
      return $kfprintf(function(dynamic $c) {return 0;}, $oc, $fmt);
    };
    $bprintf = function(dynamic $b, dynamic $fmt) use ($kbprintf) {
      return $kbprintf(function(dynamic $b) {return 0;}, $b, $fmt);
    };
    $ifprintf = function(dynamic $oc, dynamic $fmt) use ($ikfprintf) {
      return $ikfprintf(function(dynamic $a) {return 0;}, $oc, $fmt);
    };
    $printf = function(dynamic $fmt) use ($Pervasives,$fprintf) {
      return $fprintf($Pervasives[27], $fmt);
    };
    $eprintf = function(dynamic $fmt) use ($Pervasives,$fprintf) {
      return $fprintf($Pervasives[28], $fmt);
    };
    $ksprintf = function(dynamic $k, dynamic $param) use ($Buffer,$CamlinternalFormat,$call1,$call2,$call4) {
      $fmt = $param[1];
      $k__0 = function(dynamic $param, dynamic $acc) use ($Buffer,$CamlinternalFormat,$call1,$call2,$k) {
        $buf = $call1($Buffer[1], 64);
        $call2($CamlinternalFormat[11], $buf, $acc);
        return $call1($k, $call1($Buffer[2], $buf));
      };
      return $call4($CamlinternalFormat[7], $k__0, 0, 0, $fmt);
    };
    $sprintf = function(dynamic $fmt) use ($ksprintf) {
      return $ksprintf(function(dynamic $s) {return $s;}, $fmt);
    };
    $Printf = Vector{
      0,
      $fprintf,
      $printf,
      $eprintf,
      $sprintf,
      $bprintf,
      $ifprintf,
      $kfprintf,
      $ikfprintf,
      $ksprintf,
      $kbprintf,
      $ksprintf
    };
    
    $runtime["caml_register_global"](3, $Printf, "Printf");

  }
}