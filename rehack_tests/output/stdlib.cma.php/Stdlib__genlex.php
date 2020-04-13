<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class Stdlib__genlex {
  <<__Override, __Memoize>>
  public static function get() : Vector<dynamic> {
    
    $runtime = (\Rehack\GlobalObject::get() as dynamic)->jsoo_runtime;
    $call1 = $runtime["caml_call1"];
    $call2 = $runtime["caml_call2"];
    $call3 = $runtime["caml_call3"];
    $call5 = $runtime["caml_call5"];
    $caml_create_bytes = $runtime["caml_create_bytes"];
    $caml_float_of_string = $runtime["caml_float_of_string"];
    $string = $runtime["caml_new_string"];
    $caml_trampoline = $runtime["caml_trampoline"];
    $caml_trampoline_return = $runtime["caml_trampoline_return"];
    $caml_wrap_thrown_exception = $runtime["caml_wrap_thrown_exception"];
    $caml_wrap_thrown_exception_reraise = $runtime[
       "caml_wrap_thrown_exception_reraise"
     ];
    $unsigned_right_shift_32 = $runtime["unsigned_right_shift_32"];
    $cst = $string("");
    $cst__0 = $string("");
    $cst__1 = $string("");
    $cst__2 = $string("");
    $cst__4 = $string("");
    $cst__3 = $string("");
    $cst_Illegal_character = $string("Illegal character ");
    $Stdlib_stream = Stdlib__stream::get();
    $Stdlib_char = Stdlib__char::get();
    $Stdlib_string = Stdlib__string::get();
    $Stdlib_hashtbl = Stdlib__hashtbl::get();
    $Stdlib = Stdlib::get();
    $Stdlib_list = Stdlib__list::get();
    $Stdlib_bytes = Stdlib__bytes::get();
    $initial_buffer = $caml_create_bytes(32);
    $buffer = Vector{0, $initial_buffer} as dynamic;
    $bufpos = Vector{0, 0} as dynamic;
    $reset_buffer = (dynamic $param) : dynamic ==> {
      $buffer[1] = $initial_buffer;
      $bufpos[1] = 0;
      return 0;
    };
    $store = (dynamic $c) : dynamic ==> {
      $newbuffer = null as dynamic;
      if ($runtime["caml_ml_bytes_length"]($buffer[1]) <= $bufpos[1]) {
        $newbuffer = $caml_create_bytes((int) (2 * $bufpos[1]));
        $call5($Stdlib_bytes[11], $buffer[1], 0, $newbuffer, 0, $bufpos[1]);
        $buffer[1] = $newbuffer;
      }
      $runtime["caml_bytes_set"]($buffer[1], $bufpos[1], $c);
      $bufpos[1] += 1;
      return 0;
    };
    $get_string = (dynamic $param) : dynamic ==> {
      $s = $call3($Stdlib_bytes[8], $buffer[1], 0, $bufpos[1]);
      $buffer[1] = $initial_buffer;
      return $s;
    };
    $make_lexer = (dynamic $keywords) : dynamic ==> {
      $char__0 = new Ref();
      $comment = new Ref();
      $escape = new Ref();
      $maybe_comment = new Ref();
      $maybe_end_comment = new Ref();
      $maybe_nested_comment = new Ref();
      $kwd_table = $call2($Stdlib_hashtbl[1], 0, 17);
      $a_ = (dynamic $s) : dynamic ==> {
        return $call3($Stdlib_hashtbl[5], $kwd_table, $s, Vector{0, $s});
      };
      $call2($Stdlib_list[15], $a_, $keywords);
      $ident_or_keyword = (dynamic $id) : dynamic ==> {
        $C_ = null as dynamic;
        try {$C_ = $call2($Stdlib_hashtbl[6], $kwd_table, $id);return $C_;}
        catch(\Throwable $D_) {
          $D_ = $runtime["caml_wrap_exception"]($D_);
          if ($D_ === $Stdlib[8]) {return Vector{1, $id};}
          throw $caml_wrap_thrown_exception_reraise($D_) as \Throwable;
        }
      };
      $keyword_or_error = (dynamic $c) : dynamic ==> {
        $z_ = null as dynamic;
        $A_ = null as dynamic;
        $s = $call2($Stdlib_string[1], 1, $c);
        try {$A_ = $call2($Stdlib_hashtbl[6], $kwd_table, $s);return $A_;}
        catch(\Throwable $B_) {
          $B_ = $runtime["caml_wrap_exception"]($B_);
          if ($B_ === $Stdlib[8]) {
            $z_ = $call2($Stdlib[28], $cst_Illegal_character, $s);
            throw $caml_wrap_thrown_exception(
                    Vector{0, $Stdlib_stream[2], $z_}
                  ) as \Throwable;
          }
          throw $caml_wrap_thrown_exception_reraise($B_) as \Throwable;
        }
      };
      $end_exponent_part = (dynamic $strm) : dynamic ==> {
        $switcher = null as dynamic;
        $y_ = null as dynamic;
        $match = null as dynamic;
        for (;;) {
          $match = $call1($Stdlib_stream[11], $strm);
          if ($match) {
            $y_ = $match[1];
            $switcher = (int) ($y_ + -48) as dynamic;
            if (! (9 < $unsigned_right_shift_32($switcher, 0))) {
              $call1($Stdlib_stream[12], $strm);
              $store($y_);
              continue;
            }
          }
          return Vector{0, Vector{3, $caml_float_of_string($get_string(0))}};
        }
      };
      $exponent_part = (dynamic $strm) : dynamic ==> {
        $x_ = null as dynamic;
        $switch__0 = null as dynamic;
        $match = $call1($Stdlib_stream[11], $strm);
        if ($match) {
          $x_ = $match[1];
          $switch__0 = 43 === $x_ ? 0 : (45 === $x_ ? 0 : (1));
          if (! $switch__0) {
            $call1($Stdlib_stream[12], $strm);
            $store($x_);
            return $end_exponent_part($strm);
          }
        }
        return $end_exponent_part($strm);
      };
      $decimal_part = (dynamic $strm) : dynamic ==> {
        $switcher__0 = null as dynamic;
        $switcher = null as dynamic;
        $w_ = null as dynamic;
        $v_ = null as dynamic;
        $match = null as dynamic;
        for (;;) {
          $match = $call1($Stdlib_stream[11], $strm);
          if ($match) {
            $v_ = $match[1];
            $w_ = (int) ($v_ + -69) as dynamic;
            if (32 < $unsigned_right_shift_32($w_, 0)) {
              $switcher = (int) ($w_ + 21) as dynamic;
              if (! (9 < $unsigned_right_shift_32($switcher, 0))) {
                $call1($Stdlib_stream[12], $strm);
                $store($v_);
                continue;
              }
            }
            else {
              $switcher__0 = (int) ($w_ + -1) as dynamic;
              if (30 < $unsigned_right_shift_32($switcher__0, 0)) {
                $call1($Stdlib_stream[12], $strm);
                $store(69);
                return $exponent_part($strm);
              }
            }
          }
          return Vector{0, Vector{3, $caml_float_of_string($get_string(0))}};
        }
      };
      $number = (dynamic $strm) : dynamic ==> {
        $switch__0 = null as dynamic;
        $u_ = null as dynamic;
        $match = null as dynamic;
        for (;;) {
          $match = $call1($Stdlib_stream[11], $strm);
          if ($match) {
            $u_ = $match[1];
            if (58 <= $u_) {
              $switch__0 = 69 === $u_ ? 0 : (101 === $u_ ? 0 : (1));
              if (! $switch__0) {
                $call1($Stdlib_stream[12], $strm);
                $store(69);
                return $exponent_part($strm);
              }
            }
            else {
              if (46 === $u_) {
                $call1($Stdlib_stream[12], $strm);
                $store(46);
                return $decimal_part($strm);
              }
              if (48 <= $u_) {
                $call1($Stdlib_stream[12], $strm);
                $store($u_);
                continue;
              }
            }
          }
          return Vector{
            0,
            Vector{2, $runtime["caml_int_of_string"]($get_string(0))}
          };
        }
      };
      $ident2 = (dynamic $strm) : dynamic ==> {
        $switch__0 = null as dynamic;
        $t_ = null as dynamic;
        $s_ = null as dynamic;
        $match = null as dynamic;
        for (;;) {
          $match = $call1($Stdlib_stream[11], $strm);
          if ($match) {
            $s_ = $match[1];
            if (94 <= $s_) {
              $t_ = (int) ($s_ + -95) as dynamic;
              $switch__0 =
                30 < $unsigned_right_shift_32($t_, 0)
                  ? 32 <= $t_ ? 1 : (0)
                  : (29 === $t_ ? 0 : (1));
            }
            else {
              if (65 <= $s_) {
                $switch__0 = 92 === $s_ ? 0 : (1);
              }
              else {
                if (33 <= $s_) {
                  switch((int) ($s_ + -33)) {
                    // FALLTHROUGH
                    case 0:
                    // FALLTHROUGH
                    case 2:
                    // FALLTHROUGH
                    case 3:
                    // FALLTHROUGH
                    case 4:
                    // FALLTHROUGH
                    case 5:
                    // FALLTHROUGH
                    case 9:
                    // FALLTHROUGH
                    case 10:
                    // FALLTHROUGH
                    case 12:
                    // FALLTHROUGH
                    case 14:
                    // FALLTHROUGH
                    case 25:
                    // FALLTHROUGH
                    case 27:
                    // FALLTHROUGH
                    case 28:
                    // FALLTHROUGH
                    case 29:
                    // FALLTHROUGH
                    case 30:
                    // FALLTHROUGH
                    case 31:
                      $switch__0 = 0 as dynamic;
                      break;
                    // FALLTHROUGH
                    default:
                      $switch__0 = 1 as dynamic;
                    }
                }
                else {$switch__0 = 1 as dynamic;}
              }
            }
            if (! $switch__0) {
              $call1($Stdlib_stream[12], $strm);
              $store($s_);
              continue;
            }
          }
          return Vector{0, $ident_or_keyword($get_string(0))};
        }
      };
      $neg_number = (dynamic $strm) : dynamic ==> {
        $r_ = null as dynamic;
        $switcher = null as dynamic;
        $match = $call1($Stdlib_stream[11], $strm);
        if ($match) {
          $r_ = $match[1];
          $switcher = (int) ($r_ + -48) as dynamic;
          if (! (9 < $unsigned_right_shift_32($switcher, 0))) {
            $call1($Stdlib_stream[12], $strm);
            $reset_buffer(0);
            $store(45);
            $store($r_);
            return $number($strm);
          }
        }
        $reset_buffer(0);
        $store(45);
        return $ident2($strm);
      };
      $ident = (dynamic $strm) : dynamic ==> {
        $switch__0 = null as dynamic;
        $q_ = null as dynamic;
        $p_ = null as dynamic;
        $match = null as dynamic;
        for (;;) {
          $match = $call1($Stdlib_stream[11], $strm);
          if ($match) {
            $p_ = $match[1];
            if (91 <= $p_) {
              $q_ = (int) ($p_ + -95) as dynamic;
              $switch__0 =
                27 < $unsigned_right_shift_32($q_, 0)
                  ? 97 <= $q_ ? 0 : (1)
                  : (1 === $q_ ? 1 : (0));
            }
            else {
              $switch__0 =
                48 <= $p_
                  ? 6 < $unsigned_right_shift_32((int) ($p_ + -58), 0)
                   ? 0
                   : (1)
                  : (39 === $p_ ? 0 : (1));
            }
            if (! $switch__0) {
              $call1($Stdlib_stream[12], $strm);
              $store($p_);
              continue;
            }
          }
          return Vector{0, $ident_or_keyword($get_string(0))};
        }
      };
      $next_token__0 = (dynamic $counter, dynamic $strm) : dynamic ==> {
        $switch__0 = null as dynamic;
        $counter__0 = null as dynamic;
        $n_ = null as dynamic;
        $match__0 = null as dynamic;
        $c = null as dynamic;
        $switcher = null as dynamic;
        $m_ = null as dynamic;
        $l_ = null as dynamic;
        $match = null as dynamic;
        for (;;) {
          $match = $call1($Stdlib_stream[11], $strm);
          if ($match) {
            $l_ = $match[1];
            if (124 <= $l_) {
              $switch__0 =
                127 <= $l_ ? 192 <= $l_ ? 1 : (0) : (125 === $l_ ? 0 : (2));
            }
            else {
              $m_ = (int) ($l_ + -65) as dynamic;
              if (57 < $unsigned_right_shift_32($m_, 0)) {
                if (58 <= $m_) {
                  $switch__0 = 0 as dynamic;
                }
                else {
                  $switcher = (int) ($m_ + 65) as dynamic;
                  $continue_label = null;
                  switch($switcher) {
                    // FALLTHROUGH
                    case 34:
                      $call1($Stdlib_stream[12], $strm);
                      $reset_buffer(0);
                      return Vector{0, Vector{4, $string($strm)}};
                    // FALLTHROUGH
                    case 39:
                      $call1($Stdlib_stream[12], $strm);
                      try {$c = $char__0->contents($strm);}
                      catch(\Throwable $o_) {
                        $o_ = $runtime["caml_wrap_exception"]($o_);
                        if ($o_ === $Stdlib_stream[1]) {
                          throw $caml_wrap_thrown_exception(
                                  Vector{0, $Stdlib_stream[2], $cst}
                                ) as \Throwable;
                        }
                        throw $caml_wrap_thrown_exception_reraise($o_) as \Throwable;
                      }
                      $match__0 = $call1($Stdlib_stream[11], $strm);
                      if ($match__0) {
                        if (39 === $match__0[1]) {
                          $call1($Stdlib_stream[12], $strm);
                          return Vector{0, Vector{5, $c}};
                        }
                      }
                      throw $caml_wrap_thrown_exception(
                              Vector{0, $Stdlib_stream[2], $cst__0}
                            ) as \Throwable;
                    // FALLTHROUGH
                    case 40:
                      $call1($Stdlib_stream[12], $strm);
                      if ($counter < 50) {
                        $counter__0 = (int) ($counter + 1) as dynamic;
                        return $maybe_comment->contents($counter__0, $strm);
                      }
                      return $caml_trampoline_return(
                        $maybe_comment->contents,
                        varray[0,$strm]
                      );
                    // FALLTHROUGH
                    case 45:
                      $call1($Stdlib_stream[12], $strm);
                      return $neg_number($strm);
                    // FALLTHROUGH
                    case 9:
                    // FALLTHROUGH
                    case 10:
                    // FALLTHROUGH
                    case 12:
                    // FALLTHROUGH
                    case 13:
                    // FALLTHROUGH
                    case 26:
                    // FALLTHROUGH
                    case 32:
                      $call1($Stdlib_stream[12], $strm);
                      $continue_label = "#";break;
                    // FALLTHROUGH
                    case 48:
                    // FALLTHROUGH
                    case 49:
                    // FALLTHROUGH
                    case 50:
                    // FALLTHROUGH
                    case 51:
                    // FALLTHROUGH
                    case 52:
                    // FALLTHROUGH
                    case 53:
                    // FALLTHROUGH
                    case 54:
                    // FALLTHROUGH
                    case 55:
                    // FALLTHROUGH
                    case 56:
                    // FALLTHROUGH
                    case 57:
                      $call1($Stdlib_stream[12], $strm);
                      $reset_buffer(0);
                      $store($l_);
                      return $number($strm);
                    // FALLTHROUGH
                    case 33:
                    // FALLTHROUGH
                    case 35:
                    // FALLTHROUGH
                    case 36:
                    // FALLTHROUGH
                    case 37:
                    // FALLTHROUGH
                    case 38:
                    // FALLTHROUGH
                    case 42:
                    // FALLTHROUGH
                    case 43:
                    // FALLTHROUGH
                    case 47:
                    // FALLTHROUGH
                    case 58:
                    // FALLTHROUGH
                    case 60:
                    // FALLTHROUGH
                    case 61:
                    // FALLTHROUGH
                    case 62:
                    // FALLTHROUGH
                    case 63:
                    // FALLTHROUGH
                    case 64:
                      $switch__0 = 2 as dynamic;
                      break;
                    // FALLTHROUGH
                    default:
                      $switch__0 = 0 as dynamic;
                    }
                  if ($continue_label === "#") {continue;}
                }
              }
              else {
                $n_ = (int) ($m_ + -26) as dynamic;
                if (5 < $unsigned_right_shift_32($n_, 0)) {$switch__0 = 1 as dynamic;}
                else {
                  switch($n_) {
                    // FALLTHROUGH
                    case 4:
                      $switch__0 = 1 as dynamic;
                      break;
                    // FALLTHROUGH
                    case 1:
                    // FALLTHROUGH
                    case 3:
                      $switch__0 = 2 as dynamic;
                      break;
                    // FALLTHROUGH
                    default:
                      $switch__0 = 0 as dynamic;
                    }
                }
              }
            }
            switch($switch__0) {
              // FALLTHROUGH
              case 0:
                $call1($Stdlib_stream[12], $strm);
                return Vector{0, $keyword_or_error($l_)};
              // FALLTHROUGH
              case 1:
                $call1($Stdlib_stream[12], $strm);
                $reset_buffer(0);
                $store($l_);
                return $ident($strm);
              // FALLTHROUGH
              default:
                $call1($Stdlib_stream[12], $strm);
                $reset_buffer(0);
                $store($l_);
                return $ident2($strm);
              }
          }
          return 0;
        }
      };
      $maybe_comment->contents = (dynamic $counter, dynamic $strm) : dynamic ==> {
        $counter__0 = null as dynamic;
        $match = $call1($Stdlib_stream[11], $strm);
        if ($match) {
          if (42 === $match[1]) {
            $call1($Stdlib_stream[12], $strm);
            $comment->contents($strm);
            if ($counter < 50) {
              $counter__0 = (int) ($counter + 1) as dynamic;
              return $next_token__0($counter__0, $strm);
            }
            return $caml_trampoline_return($next_token__0, varray[0,$strm]);
          }
        }
        return Vector{0, $keyword_or_error(40)};
      };
      $next_token = (dynamic $strm) : dynamic ==> {
        return $caml_trampoline($next_token__0(0, $strm));
      };
      $string->contents = (dynamic $strm) : dynamic ==> {
        $c = null as dynamic;
        $j_ = null as dynamic;
        $match = null as dynamic;
        for (;;) {
          $match = $call1($Stdlib_stream[11], $strm);
          if ($match) {
            $j_ = $match[1];
            if (34 === $j_) {
              $call1($Stdlib_stream[12], $strm);
              return $get_string(0);
            }
            if (92 === $j_) {
              $call1($Stdlib_stream[12], $strm);
              try {$c = $escape->contents($strm);}
              catch(\Throwable $k_) {
                $k_ = $runtime["caml_wrap_exception"]($k_);
                if ($k_ === $Stdlib_stream[1]) {
                  throw $caml_wrap_thrown_exception(
                          Vector{0, $Stdlib_stream[2], $cst__1}
                        ) as \Throwable;
                }
                throw $caml_wrap_thrown_exception_reraise($k_) as \Throwable;
              }
              $store($c);
              continue;
            }
            $call1($Stdlib_stream[12], $strm);
            $store($j_);
            continue;
          }
          throw $caml_wrap_thrown_exception($Stdlib_stream[1]) as \Throwable;
        }
      };
      $char__0->contents = (dynamic $strm) : dynamic ==> {
        $g_ = null as dynamic;
        $h_ = null as dynamic;
        $match = $call1($Stdlib_stream[11], $strm);
        if ($match) {
          $g_ = $match[1];
          if (92 === $g_) {
            $call1($Stdlib_stream[12], $strm);
            try {$h_ = $escape->contents($strm);return $h_;}
            catch(\Throwable $i_) {
              $i_ = $runtime["caml_wrap_exception"]($i_);
              if ($i_ === $Stdlib_stream[1]) {
                throw $caml_wrap_thrown_exception(
                        Vector{0, $Stdlib_stream[2], $cst__2}
                      ) as \Throwable;
              }
              throw $caml_wrap_thrown_exception_reraise($i_) as \Throwable;
            }
          }
          $call1($Stdlib_stream[12], $strm);
          return $g_;
        }
        throw $caml_wrap_thrown_exception($Stdlib_stream[1]) as \Throwable;
      };
      $escape->contents = (dynamic $strm) : dynamic ==> {
        $d_ = null as dynamic;
        $switcher = null as dynamic;
        $match__0 = null as dynamic;
        $e_ = null as dynamic;
        $switcher__0 = null as dynamic;
        $match__1 = null as dynamic;
        $f_ = null as dynamic;
        $switcher__1 = null as dynamic;
        $match = $call1($Stdlib_stream[11], $strm);
        if ($match) {
          $d_ = $match[1];
          if (58 <= $d_) {
            $switcher = (int) ($d_ + -110) as dynamic;
            if (! (6 < $unsigned_right_shift_32($switcher, 0))) {
              switch($switcher) {
                // FALLTHROUGH
                case 0:
                  $call1($Stdlib_stream[12], $strm);
                  return 10;
                // FALLTHROUGH
                case 4:
                  $call1($Stdlib_stream[12], $strm);
                  return 13;
                // FALLTHROUGH
                case 6:
                  $call1($Stdlib_stream[12], $strm);
                  return 9;
                }
            }
          }
          else {
            if (48 <= $d_) {
              $call1($Stdlib_stream[12], $strm);
              $match__0 = $call1($Stdlib_stream[11], $strm);
              if ($match__0) {
                $e_ = $match__0[1];
                $switcher__0 = (int) ($e_ + -48) as dynamic;
                if (! (9 < $unsigned_right_shift_32($switcher__0, 0))) {
                  $call1($Stdlib_stream[12], $strm);
                  $match__1 = $call1($Stdlib_stream[11], $strm);
                  if ($match__1) {
                    $f_ = $match__1[1];
                    $switcher__1 = (int) ($f_ + -48) as dynamic;
                    if (! (9 < $unsigned_right_shift_32($switcher__1, 0))) {
                      $call1($Stdlib_stream[12], $strm);
                      return $call1(
                        $Stdlib_char[1],
                        (int)
                        ((int)
                         ((int)
                          ((int) ($d_ + -48) * 100) +
                            (int)
                            ((int) ($e_ + -48) * 10)) + (int) ($f_ + -48))
                      );
                    }
                  }
                  throw $caml_wrap_thrown_exception(
                          Vector{0, $Stdlib_stream[2], $cst__4}
                        ) as \Throwable;
                }
              }
              throw $caml_wrap_thrown_exception(
                      Vector{0, $Stdlib_stream[2], $cst__3}
                    ) as \Throwable;
            }
          }
          $call1($Stdlib_stream[12], $strm);
          return $d_;
        }
        throw $caml_wrap_thrown_exception($Stdlib_stream[1]) as \Throwable;
      };
      $comment__0 = (dynamic $counter, dynamic $strm) : dynamic ==> {
        $counter__1 = null as dynamic;
        $counter__0 = null as dynamic;
        $switcher = null as dynamic;
        $match = null as dynamic;
        for (;;) {
          $match = $call1($Stdlib_stream[11], $strm);
          if ($match) {
            $switcher = (int) ($match[1] + -40) as dynamic;
            if (! (2 < $unsigned_right_shift_32($switcher, 0))) {
              switch($switcher) {
                // FALLTHROUGH
                case 0:
                  $call1($Stdlib_stream[12], $strm);
                  if ($counter < 50) {
                    $counter__1 = (int) ($counter + 1) as dynamic;
                    return $maybe_nested_comment->contents($counter__1, $strm);
                  }
                  return $caml_trampoline_return(
                    $maybe_nested_comment->contents,
                    varray[0,$strm]
                  );
                // FALLTHROUGH
                case 1:break;
                // FALLTHROUGH
                default:
                  $call1($Stdlib_stream[12], $strm);
                  if ($counter < 50) {
                    $counter__0 = (int) ($counter + 1) as dynamic;
                    return $maybe_end_comment->contents($counter__0, $strm);
                  }
                  return $caml_trampoline_return(
                    $maybe_end_comment->contents,
                    varray[0,$strm]
                  );
                }
            }
            $call1($Stdlib_stream[12], $strm);
            continue;
          }
          throw $caml_wrap_thrown_exception($Stdlib_stream[1]) as \Throwable;
        }
      };
      $maybe_nested_comment->contents = (dynamic $counter, dynamic $strm) : dynamic ==> {
        $counter__0 = null as dynamic;
        $counter__1 = null as dynamic;
        $match = $call1($Stdlib_stream[11], $strm);
        if ($match) {
          if (42 === $match[1]) {
            $call1($Stdlib_stream[12], $strm);
            $comment->contents($strm);
            if ($counter < 50) {
              $counter__1 = (int) ($counter + 1) as dynamic;
              return $comment__0($counter__1, $strm);
            }
            return $caml_trampoline_return($comment__0, varray[0,$strm]);
          }
          $call1($Stdlib_stream[12], $strm);
          if ($counter < 50) {
            $counter__0 = (int) ($counter + 1) as dynamic;
            return $comment__0($counter__0, $strm);
          }
          return $caml_trampoline_return($comment__0, varray[0,$strm]);
        }
        throw $caml_wrap_thrown_exception($Stdlib_stream[1]) as \Throwable;
      };
      $maybe_end_comment->contents = (dynamic $counter, dynamic $strm) : dynamic ==> {
        $counter__0 = null as dynamic;
        $c_ = null as dynamic;
        $match = null as dynamic;
        for (;;) {
          $match = $call1($Stdlib_stream[11], $strm);
          if ($match) {
            $c_ = $match[1];
            if (41 === $c_) {$call1($Stdlib_stream[12], $strm);return 0;}
            if (42 === $c_) {$call1($Stdlib_stream[12], $strm);continue;}
            $call1($Stdlib_stream[12], $strm);
            if ($counter < 50) {
              $counter__0 = (int) ($counter + 1) as dynamic;
              return $comment__0($counter__0, $strm);
            }
            return $caml_trampoline_return($comment__0, varray[0,$strm]);
          }
          throw $caml_wrap_thrown_exception($Stdlib_stream[1]) as \Throwable;
        }
      };
      $comment->contents = (dynamic $strm) : dynamic ==> {
        return $caml_trampoline($comment__0(0, $strm));
      };
      return (dynamic $input) : dynamic ==> {
        $b_ = (dynamic $count) : dynamic ==> {return $next_token($input);};
        return $call1($Stdlib_stream[3], $b_);
      };
    };
    $Stdlib_genlex = Vector{0, $make_lexer} as dynamic;
    
    return($Stdlib_genlex);

  }
  public static function make_lexer(dynamic $keywords): dynamic {
    return static::syncCall(__FUNCTION__, 1, $keywords);
  }

}
/* Hashing disabled */
