<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class Stdlib__seq {
  <<__Override, __Memoize>>
  public static function get() : Vector<dynamic> {
    
    $filter = new Ref();
    $filter_map = new Ref();
    $flat_map_app = new Ref();
    $flat_map_app__0 = new Ref();
    $map = new Ref();
    $runtime = (\Rehack\GlobalObject::get() as dynamic)->jsoo_runtime;
    $call1 = $runtime["caml_call1"];
    $call2 = $runtime["caml_call2"];
    $caml_trampoline = $runtime["caml_trampoline"];
    $caml_trampoline_return = $runtime["caml_trampoline_return"];
    $empty = (dynamic $param) : dynamic ==> {return 0;};
    $return__0 = (dynamic $x, dynamic $param) : dynamic ==> {
      return Vector{0, $x, $empty};
    };
    $map->contents = (dynamic $f, dynamic $seq, dynamic $param) : dynamic ==> {
      $g_ = null as dynamic;
      $next = null as dynamic;
      $x = null as dynamic;
      $match = $call1($seq, 0);
      if ($match) {
        $next = $match[2];
        $x = $match[1];
        $g_ = (dynamic $h_) : dynamic ==> {
          return $map->contents($f, $next, $h_);
        };
        return Vector{0, $call1($f, $x), $g_};
      }
      return 0;
    };
    $filter_map->contents = (dynamic $f, dynamic $seq, dynamic $param) : dynamic ==> {
      $match = null as dynamic;
      $match__0 = null as dynamic;
      $next = null as dynamic;
      $x = null as dynamic;
      $y = null as dynamic;
      $seq__0 = $seq;
      for (;;) {
        $match = $call1($seq__0, 0);
        if ($match) {
          $next = $match[2];
          $x = $match[1];
          $match__0 = $call1($f, $x);
          if ($match__0) {
            $y = $match__0[1];
            return Vector{
              0,
              $y,
              (dynamic $f_) : dynamic ==> {
                return $filter_map->contents($f, $next, $f_);
              }
            };
          }
          $seq__0 = $next;
          continue;
        }
        return 0;
      }
    };
    $filter->contents = (dynamic $f, dynamic $seq, dynamic $param) : dynamic ==> {
      $match = null as dynamic;
      $next = null as dynamic;
      $x = null as dynamic;
      $seq__0 = $seq;
      for (;;) {
        $match = $call1($seq__0, 0);
        if ($match) {
          $next = $match[2];
          $x = $match[1];
          if ($call1($f, $x)) {
            return Vector{
              0,
              $x,
              (dynamic $e_) : dynamic ==> {
                return $filter->contents($f, $next, $e_);
              }
            };
          }
          $seq__0 = $next;
          continue;
        }
        return 0;
      }
    };
    $flat_map__0 = 
    (dynamic $counter, dynamic $f, dynamic $seq, dynamic $param) : dynamic ==> {
      $c_ = null as dynamic;
      $counter__0 = null as dynamic;
      $d_ = null as dynamic;
      $next = null as dynamic;
      $x = null as dynamic;
      $match = $call1($seq, 0);
      if ($match) {
        $next = $match[2];
        $x = $match[1];
        $d_ = $call1($f, $x);
        $c_ = 0 as dynamic;
        if ($counter < 50) {
          $counter__0 = (int) ($counter + 1) as dynamic;
          return $flat_map_app__0->contents($counter__0, $f, $d_, $next, $c_);
        }
        return $caml_trampoline_return(
          $flat_map_app__0->contents,
          varray[0,$f,$d_,$next,$c_]
        );
      }
      return 0;
    };
    $flat_map_app__0->contents = 
    (dynamic $counter, dynamic $f, dynamic $seq, dynamic $tail, dynamic $param) : dynamic ==> {
      $counter__0 = null as dynamic;
      $next = null as dynamic;
      $x = null as dynamic;
      $match = $call1($seq, 0);
      if ($match) {
        $next = $match[2];
        $x = $match[1];
        return Vector{
          0,
          $x,
          (dynamic $b_) : dynamic ==> {
            return $flat_map_app->contents($f, $next, $tail, $b_);
          }
        };
      }
      $a_ = 0 as dynamic;
      if ($counter < 50) {
        $counter__0 = (int) ($counter + 1) as dynamic;
        return $flat_map__0($counter__0, $f, $tail, $a_);
      }
      return $caml_trampoline_return($flat_map__0, varray[0,$f,$tail,$a_]);
    };
    $flat_map = (dynamic $f, dynamic $seq, dynamic $param) : dynamic ==> {
      return $caml_trampoline($flat_map__0(0, $f, $seq, $param));
    };
    $flat_map_app->contents = 
    (dynamic $f, dynamic $seq, dynamic $tail, dynamic $param) : dynamic ==> {
      return $caml_trampoline(
        $flat_map_app__0->contents(0, $f, $seq, $tail, $param)
      );
    };
    $fold_left = (dynamic $f, dynamic $acc, dynamic $seq) : dynamic ==> {
      $aux = (dynamic $f, dynamic $acc, dynamic $seq) : dynamic ==> {
        $acc__1 = null as dynamic;
        $match = null as dynamic;
        $seq__1 = null as dynamic;
        $x = null as dynamic;
        $acc__0 = $acc;
        $seq__0 = $seq;
        for (;;) {
          $match = $call1($seq__0, 0);
          if ($match) {
            $seq__1 = $match[2];
            $x = $match[1];
            $acc__1 = $call2($f, $acc__0, $x);
            $acc__0 = $acc__1;
            $seq__0 = $seq__1;
            continue;
          }
          return $acc__0;
        }
      };
      return $aux($f, $acc, $seq);
    };
    $iter = (dynamic $f, dynamic $seq) : dynamic ==> {
      $aux = (dynamic $seq) : dynamic ==> {
        $match = null as dynamic;
        $seq__1 = null as dynamic;
        $x = null as dynamic;
        $seq__0 = $seq;
        for (;;) {
          $match = $call1($seq__0, 0);
          if ($match) {
            $seq__1 = $match[2];
            $x = $match[1];
            $call1($f, $x);
            $seq__0 = $seq__1;
            continue;
          }
          return 0;
        }
      };
      return $aux($seq);
    };
    $Stdlib_seq = Vector{
      0,
      $empty,
      $return__0,
      $map->contents,
      $filter->contents,
      $filter_map->contents,
      $flat_map,
      $fold_left,
      $iter
    } as dynamic;
    
    return($Stdlib_seq);

  }
  public static function empty(dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 1, $param);
  }
  public static function _return(dynamic $x, dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 2, $x, $param);
  }
  public static function map(dynamic $f, dynamic $seq, dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 3, $f, $seq, $param);
  }
  public static function filter(dynamic $f, dynamic $seq, dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 4, $f, $seq, $param);
  }
  public static function filter_map(dynamic $f, dynamic $seq, dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 5, $f, $seq, $param);
  }
  public static function flat_map(dynamic $f, dynamic $seq, dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 6, $f, $seq, $param);
  }
  public static function fold_left(dynamic $f, dynamic $acc, dynamic $seq): dynamic {
    return static::syncCall(__FUNCTION__, 7, $f, $acc, $seq);
  }
  public static function iter(dynamic $f, dynamic $seq): dynamic {
    return static::syncCall(__FUNCTION__, 8, $f, $seq);
  }

}
/* Hashing disabled */
