<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class Stdlib__queue {
  <<__Override, __Memoize>>
  public static function get() : Vector<dynamic> {
    
    $runtime = (\Rehack\GlobalObject::get() as dynamic)->jsoo_runtime;
    $call1 = $runtime["caml_call1"];
    $call2 = $runtime["caml_call2"];
    $caml_wrap_thrown_exception = $runtime["caml_wrap_thrown_exception"];
    $cst_Stdlib_Queue_Empty = $runtime["caml_new_string"]("Stdlib.Queue.Empty");
    $Stdlib_seq = Stdlib__seq::get();
    $Empty = Vector{
      248,
      $cst_Stdlib_Queue_Empty,
      $runtime["caml_fresh_oo_id"](0)
    } as dynamic;
    $create = (dynamic $param) : dynamic ==> {return Vector{0, 0, 0, 0};};
    $clear = (dynamic $q) : dynamic ==> {
      $q[1] = 0;
      $q[2] = 0;
      $q[3] = 0;
      return 0;
    };
    $add = (dynamic $x, dynamic $q) : dynamic ==> {
      $cell = Vector{0, $x, 0} as dynamic;
      $o_ = $q[3];
      if ($o_) {
        $q[1] = (int) ($q[1] + 1);
        $o_[2] = $cell;
        $q[3] = $cell;
        return 0;
      }
      $q[1] = 1;
      $q[2] = $cell;
      $q[3] = $cell;
      return 0;
    };
    $peek = (dynamic $q) : dynamic ==> {
      $content = null as dynamic;
      $n_ = $q[2];
      if ($n_) {$content = $n_[1];return $content;}
      throw $caml_wrap_thrown_exception($Empty) as \Throwable;
    };
    $peek_opt = (dynamic $q) : dynamic ==> {
      $content = null as dynamic;
      $m_ = $q[2];
      if ($m_) {$content = $m_[1];return Vector{0, $content};}
      return 0;
    };
    $take = (dynamic $q) : dynamic ==> {
      $k_ = null as dynamic;
      $l_ = null as dynamic;
      $j_ = $q[2];
      if ($j_) {
        $k_ = $j_[1];
        $l_ = $j_[2];
        if ($l_) {$q[1] = (int) ($q[1] + -1);$q[2] = $l_;return $k_;}
        $clear($q);
        return $k_;
      }
      throw $caml_wrap_thrown_exception($Empty) as \Throwable;
    };
    $take_opt = (dynamic $q) : dynamic ==> {
      $h_ = null as dynamic;
      $i_ = null as dynamic;
      $g_ = $q[2];
      if ($g_) {
        $h_ = $g_[1];
        $i_ = $g_[2];
        if ($i_) {
          $q[1] = (int) ($q[1] + -1);
          $q[2] = $i_;
          return Vector{0, $h_};
        }
        $clear($q);
        return Vector{0, $h_};
      }
      return 0;
    };
    $copy = (dynamic $q_res, dynamic $prev, dynamic $cell) : dynamic ==> {
      $content = null as dynamic;
      $next = null as dynamic;
      $res = null as dynamic;
      $prev__0 = $prev;
      $cell__0 = $cell;
      for (;;) {
        if ($cell__0) {
          $content = $cell__0[1];
          $next = $cell__0[2];
          $res = Vector{0, $content, 0} as dynamic;
          if ($prev__0) {
            $prev__0[2] = $res;
          }
          else {$q_res[2] = $res;}
          $prev__0 = $res;
          $cell__0 = $next;
          continue;
        }
        $q_res[3] = $prev__0;
        return $q_res;
      }
    };
    $copy__0 = (dynamic $q) : dynamic ==> {
      return $copy(Vector{0, $q[1], 0, 0}, 0, $q[2]);
    };
    $is_empty = (dynamic $q) : dynamic ==> {return 0 === $q[1] ? 1 : (0);};
    $length = (dynamic $q) : dynamic ==> {return $q[1];};
    $iter = (dynamic $f, dynamic $cell) : dynamic ==> {
      $cell__1 = null as dynamic;
      $content = null as dynamic;
      $cell__0 = $cell;
      for (;;) {
        if ($cell__0) {
          $content = $cell__0[1];
          $cell__1 = $cell__0[2];
          $call1($f, $content);
          $cell__0 = $cell__1;
          continue;
        }
        return 0;
      }
    };
    $iter__0 = (dynamic $f, dynamic $q) : dynamic ==> {
      return $iter($f, $q[2]);
    };
    $fold = (dynamic $f, dynamic $accu, dynamic $cell) : dynamic ==> {
      $accu__1 = null as dynamic;
      $cell__1 = null as dynamic;
      $content = null as dynamic;
      $accu__0 = $accu;
      $cell__0 = $cell;
      for (;;) {
        if ($cell__0) {
          $content = $cell__0[1];
          $cell__1 = $cell__0[2];
          $accu__1 = $call2($f, $accu__0, $content);
          $accu__0 = $accu__1;
          $cell__0 = $cell__1;
          continue;
        }
        return $accu__0;
      }
    };
    $fold__0 = (dynamic $f, dynamic $accu, dynamic $q) : dynamic ==> {
      return $fold($f, $accu, $q[2]);
    };
    $transfer = (dynamic $q1, dynamic $q2) : dynamic ==> {
      $f_ = null as dynamic;
      $e_ = 0 < $q1[1] ? 1 : (0);
      if ($e_) {
        $f_ = $q2[3];
        if ($f_) {
          $q2[1] = (int) ($q2[1] + $q1[1]);
          $f_[2] = $q1[2];
          $q2[3] = $q1[3];
          return $clear($q1);
        }
        $q2[1] = $q1[1];
        $q2[2] = $q1[2];
        $q2[3] = $q1[3];
        return $clear($q1);
      }
      return $e_;
    };
    $to_seq = (dynamic $q) : dynamic ==> {
      $aux = new Ref();
      $aux->contents = (dynamic $c, dynamic $param) : dynamic ==> {
        $next = null as dynamic;
        $x = null as dynamic;
        if ($c) {
          $x = $c[1];
          $next = $c[2];
          return Vector{
            0,
            $x,
            (dynamic $d_) : dynamic ==> {return $aux->contents($next, $d_);}
          };
        }
        return 0;
      };
      $b_ = $q[2];
      return (dynamic $c_) : dynamic ==> {return $aux->contents($b_, $c_);};
    };
    $add_seq = (dynamic $q, dynamic $i) : dynamic ==> {
      $a_ = (dynamic $x) : dynamic ==> {return $add($x, $q);};
      return $call2($Stdlib_seq[8], $a_, $i);
    };
    $of_seq = (dynamic $g) : dynamic ==> {
      $q = $create(0);
      $add_seq($q, $g);
      return $q;
    };
    $Stdlib_queue = Vector{
      0,
      $Empty,
      $create,
      $add,
      $add,
      $take,
      $take_opt,
      $take,
      $peek,
      $peek_opt,
      $peek,
      $clear,
      $copy__0,
      $is_empty,
      $length,
      $iter__0,
      $fold__0,
      $transfer,
      $to_seq,
      $add_seq,
      $of_seq
    } as dynamic;
    
    return($Stdlib_queue);

  }
  public static function create(dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 2, $param);
  }
  public static function add(dynamic $x, dynamic $q): dynamic {
    return static::syncCall(__FUNCTION__, 3, $x, $q);
  }
  public static function take(dynamic $q): dynamic {
    return static::syncCall(__FUNCTION__, 5, $q);
  }
  public static function take_opt(dynamic $q): dynamic {
    return static::syncCall(__FUNCTION__, 6, $q);
  }
  public static function peek(dynamic $q): dynamic {
    return static::syncCall(__FUNCTION__, 8, $q);
  }
  public static function peek_opt(dynamic $q): dynamic {
    return static::syncCall(__FUNCTION__, 9, $q);
  }
  public static function clear(dynamic $q): dynamic {
    return static::syncCall(__FUNCTION__, 11, $q);
  }
  public static function copy(dynamic $q): dynamic {
    return static::syncCall(__FUNCTION__, 12, $q);
  }
  public static function is_empty(dynamic $q): dynamic {
    return static::syncCall(__FUNCTION__, 13, $q);
  }
  public static function length(dynamic $q): dynamic {
    return static::syncCall(__FUNCTION__, 14, $q);
  }
  public static function iter(dynamic $f, dynamic $q): dynamic {
    return static::syncCall(__FUNCTION__, 15, $f, $q);
  }
  public static function fold(dynamic $f, dynamic $accu, dynamic $q): dynamic {
    return static::syncCall(__FUNCTION__, 16, $f, $accu, $q);
  }
  public static function transfer(dynamic $q1, dynamic $q2): dynamic {
    return static::syncCall(__FUNCTION__, 17, $q1, $q2);
  }
  public static function to_seq(dynamic $q): dynamic {
    return static::syncCall(__FUNCTION__, 18, $q);
  }
  public static function add_seq(dynamic $q, dynamic $i): dynamic {
    return static::syncCall(__FUNCTION__, 19, $q, $i);
  }
  public static function of_seq(dynamic $g): dynamic {
    return static::syncCall(__FUNCTION__, 20, $g);
  }

}
/* Hashing disabled */
