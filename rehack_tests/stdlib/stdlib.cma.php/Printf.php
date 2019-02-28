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
    $caml_arity_test = $runtime->caml_arity_test;
    $caml_call1 = function($f, $a0) use ($caml_arity_test,$runtime) {
      return $caml_arity_test($f) == 1
        ? $f($a0)
        : ($runtime->caml_call_gen($f, varray[$a0]));
    };
    $caml_call2 = function($f, $a0, $a1) use ($caml_arity_test,$runtime) {
      return $caml_arity_test($f) == 2
        ? $f($a0, $a1)
        : ($runtime->caml_call_gen($f, varray[$a0,$a1]));
    };
    $caml_call3 = function($f, $a0, $a1, $a2) use ($caml_arity_test,$runtime) {
      return $caml_arity_test($f) == 3
        ? $f($a0, $a1, $a2)
        : ($runtime->caml_call_gen($f, varray[$a0,$a1,$a2]));
    };
    $caml_call4 = function($f, $a0, $a1, $a2, $a3) use ($caml_arity_test,$runtime) {
      return $caml_arity_test($f) == 4
        ? $f($a0, $a1, $a2, $a3)
        : ($runtime->caml_call_gen($f, varray[$a0,$a1,$a2,$a3]));
    };
    $global_data = $runtime->caml_get_global_data();
    $Buffer = $global_data->Buffer;
    $CamlinternalFormat = $global_data->CamlinternalFormat;
    $Pervasives = $global_data->Pervasives;
    $kfprintf = function($k, $o, $param) use ($CamlinternalFormat,$caml_call1,$caml_call2,$caml_call4) {
      $fmt = $param[1];
      $m_ = 0;
      $na = function($o, $acc) use ($CamlinternalFormat,$caml_call1,$caml_call2,$k) {
        $caml_call2($CamlinternalFormat[9], $o, $acc);
        return $caml_call1($k, $o);
      };
      return $caml_call4($CamlinternalFormat[7], $na, $o, $m_, $fmt);
    };
    $kbprintf = function($k, $b, $param) use ($CamlinternalFormat,$caml_call1,$caml_call2,$caml_call4) {
      $fmt = $param[1];
      $m8 = 0;
      $m9 = function($b, $acc) use ($CamlinternalFormat,$caml_call1,$caml_call2,$k) {
        $caml_call2($CamlinternalFormat[10], $b, $acc);
        return $caml_call1($k, $b);
      };
      return $caml_call4($CamlinternalFormat[7], $m9, $b, $m8, $fmt);
    };
    $ikfprintf = function($k, $oc, $param) use ($CamlinternalFormat,$caml_call3) {
      $fmt = $param[1];
      return $caml_call3($CamlinternalFormat[8], $k, $oc, $fmt);
    };
    $fprintf = function($oc, $fmt) use ($kfprintf) {
      return $kfprintf(function($m7) {return 0;}, $oc, $fmt);
    };
    $bprintf = function($b, $fmt) use ($kbprintf) {
      return $kbprintf(function($m6) {return 0;}, $b, $fmt);
    };
    $ifprintf = function($oc, $fmt) use ($ikfprintf) {
      return $ikfprintf(function($m5) {return 0;}, $oc, $fmt);
    };
    $printf = function($fmt) use ($Pervasives,$fprintf) {
      return $fprintf($Pervasives[27], $fmt);
    };
    $eprintf = function($fmt) use ($Pervasives,$fprintf) {
      return $fprintf($Pervasives[28], $fmt);
    };
    $ksprintf = function($k, $param) use ($Buffer,$CamlinternalFormat,$caml_call1,$caml_call2,$caml_call4) {
      $fmt = $param[1];
      $k__0 = function($param, $acc) use ($Buffer,$CamlinternalFormat,$caml_call1,$caml_call2,$k) {
        $buf = $caml_call1($Buffer[1], 64);
        $caml_call2($CamlinternalFormat[11], $buf, $acc);
        return $caml_call1($k, $caml_call1($Buffer[2], $buf));
      };
      return $caml_call4($CamlinternalFormat[7], $k__0, 0, 0, $fmt);
    };
    $sprintf = function($fmt) use ($ksprintf) {
      return $ksprintf(function($s) {return $s;}, $fmt);
    };
    $Printf = V(
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
    );
    
    $runtime->caml_register_global(3, $Printf, "Printf");

  }
}