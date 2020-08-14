<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class ReproNonexit {
  <<__Override, __Memoize>>
  public static function get() : Vector<dynamic> {
    
    $runtime = (\Rehack\GlobalObject::get() as dynamic)->jsoo_runtime;
    $call1 = $runtime["caml_call1"];
    $Stdlib = Stdlib::get();
    $bench = (dynamic $lim) : dynamic ==> {
      $sum = Vector{0, 0} as dynamic;
      $a_ = 0 as dynamic;
      if (! ($lim < 0)) {
        $i = $a_;
        for (;;) {
          $sum[1] = (int) ($sum[1] + 1);
          $c_ = (int) ($i + 1) as dynamic;
          if ($lim !== $i) {$i = $c_;continue;}
          break;
        }
      }
      $b_ = $call1($Stdlib[33], $sum[1]);
      return $call1($Stdlib[46], $b_);
    };
    $res = $bench(999);
    $ReproNonexit = Vector{0, $res} as dynamic;
    
    return($ReproNonexit);

  }

}
/* Hashing disabled */
