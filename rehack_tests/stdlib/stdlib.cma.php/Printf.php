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
    $caml_arity_test = $runtime["caml_arity_test"];
    $caml_call1 = function(dynamic $f, dynamic $a0) use ($caml_arity_test,$runtime) {
      return $caml_arity_test($f) === 1
        ? $f($a0)
        : ($runtime["caml_call_gen"]($f, varray[$a0]));
    };
    $caml_call2 = function(dynamic $f, dynamic $a0, dynamic $a1) use ($caml_arity_test,$runtime) {
      return $caml_arity_test($f) === 2
        ? $f($a0, $a1)
        : ($runtime["caml_call_gen"]($f, varray[$a0,$a1]));
    };
    $caml_call3 = function(dynamic $f, dynamic $a0, dynamic $a1, dynamic $a2) use ($caml_arity_test,$runtime) {
      return $caml_arity_test($f) === 3
        ? $f($a0, $a1, $a2)
        : ($runtime["caml_call_gen"]($f, varray[$a0,$a1,$a2]));
    };
    $caml_call4 = function
    (dynamic $f, dynamic $a0, dynamic $a1, dynamic $a2, dynamic $a3) use ($caml_arity_test,$runtime) {
      return $caml_arity_test($f) === 4
        ? $f($a0, $a1, $a2, $a3)
        : ($runtime["caml_call_gen"]($f, varray[$a0,$a1,$a2,$a3]));
    };
    $global_data = $runtime["caml_get_global_data"]();
    $Buffer = $global_data["Buffer"];
    $CamlinternalFormat = $global_data["CamlinternalFormat"];
    $Pervasives = $global_data["Pervasives"];
    $kfprintf = function(dynamic $k, dynamic $o, dynamic $param) use ($CamlinternalFormat,$caml_call1,$caml_call2,$caml_call4) {
      $fmt = $param[1];
      $na = 0;
      $nb = function(dynamic $o, dynamic $acc) use ($CamlinternalFormat,$caml_call1,$caml_call2,$k) {
        $caml_call2($CamlinternalFormat[9], $o, $acc);
        return $caml_call1($k, $o);
      };
      return $caml_call4($CamlinternalFormat[7], $nb, $o, $na, $fmt);
    };
    $kbprintf = function(dynamic $k, dynamic $b, dynamic $param) use ($CamlinternalFormat,$caml_call1,$caml_call2,$caml_call4) {
      $fmt = $param[1];
      $m9 = 0;
      $m_ = function(dynamic $b, dynamic $acc) use ($CamlinternalFormat,$caml_call1,$caml_call2,$k) {
        $caml_call2($CamlinternalFormat[10], $b, $acc);
        return $caml_call1($k, $b);
      };
      return $caml_call4($CamlinternalFormat[7], $m_, $b, $m9, $fmt);
    };
    $ikfprintf = function(dynamic $k, dynamic $oc, dynamic $param) use ($CamlinternalFormat,$caml_call3) {
      $fmt = $param[1];
      return $caml_call3($CamlinternalFormat[8], $k, $oc, $fmt);
    };
    $fprintf = function(dynamic $oc, dynamic $fmt) use ($kfprintf) {
      return $kfprintf(function(dynamic $m8) {return 0;}, $oc, $fmt);
    };
    $bprintf = function(dynamic $b, dynamic $fmt) use ($kbprintf) {
      return $kbprintf(function(dynamic $m7) {return 0;}, $b, $fmt);
    };
    $ifprintf = function(dynamic $oc, dynamic $fmt) use ($ikfprintf) {
      return $ikfprintf(function(dynamic $m6) {return 0;}, $oc, $fmt);
    };
    $printf = function(dynamic $fmt) use ($Pervasives,$fprintf) {
      return $fprintf($Pervasives[27], $fmt);
    };
    $eprintf = function(dynamic $fmt) use ($Pervasives,$fprintf) {
      return $fprintf($Pervasives[28], $fmt);
    };
    $ksprintf = function(dynamic $k, dynamic $param) use ($Buffer,$CamlinternalFormat,$caml_call1,$caml_call2,$caml_call4) {
      $fmt = $param[1];
      $k__0 = function(dynamic $param, dynamic $acc) use ($Buffer,$CamlinternalFormat,$caml_call1,$caml_call2,$k) {
        $buf = $caml_call1($Buffer[1], 64);
        $caml_call2($CamlinternalFormat[11], $buf, $acc);
        return $caml_call1($k, $caml_call1($Buffer[2], $buf));
      };
      return $caml_call4($CamlinternalFormat[7], $k__0, 0, 0, $fmt);
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