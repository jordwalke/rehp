<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class Genlex {
  <<__Override, __Memoize>>
  public static function requireModule() : Vector<dynamic> {
    $joo_global_object = \Rehack\GlobalObject::get() as dynamic;
    
    $runtime = $joo_global_object->jsoo_runtime;
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
    $Stream =  Stream::requireModule ();
    $Char =  Char::requireModule ();
    $String =  String_::requireModule ();
    $Hashtbl =  Hashtbl::requireModule ();
    $Not_found =  Not_found::requireModule ();
    $Pervasives =  Pervasives::requireModule ();
    $List =  List_::requireModule ();
    $Bytes =  Bytes::requireModule ();
    $initial_buffer = $caml_create_bytes(32);
    $buffer = Vector{0, $initial_buffer} as dynamic;
    $bufpos = Vector{0, 0} as dynamic;
    $reset_buffer = (dynamic $param) ==> {
      $buffer[1] = $initial_buffer;
      $bufpos[1] = 0;
      return 0;
    };
    $store = (dynamic $c) ==> {
      $newbuffer = null;
      if ($runtime["caml_ml_bytes_length"]($buffer[1]) <= $bufpos[1]) {
        $newbuffer = $caml_create_bytes((int) (2 * $bufpos[1]));
        $call5($Bytes[11], $buffer[1], 0, $newbuffer, 0, $bufpos[1]);
        $buffer[1] = $newbuffer;
      }
      $runtime["caml_bytes_set"]($buffer[1], $bufpos[1], $c);
      $bufpos[1] += 1;
      return 0;
    };
    $get_string = (dynamic $param) ==> {
      $s = $call3($Bytes[8], $buffer[1], 0, $bufpos[1]);
      $buffer[1] = $initial_buffer;
      return $s;
    };
    $make_lexer = (dynamic $keywords) ==> {
      $comment = new Ref();$escape = new Ref();$maybe_comment = new Ref();
      $kwd_table = $call2($Hashtbl[1], 0, 17);
      $a_ = (dynamic $s) ==> {
        return $call3($Hashtbl[5], $kwd_table, $s, Vector{0, $s});
      };
      $call2($List[15], $a_, $keywords);
      $ident_or_keyword = (dynamic $id) ==> {
        $C_ = null;
        try {$C_ = $call2($Hashtbl[6], $kwd_table, $id);return $C_;}
        catch(\Throwable $D_) {
          $D_ = $runtime["caml_wrap_exception"]($D_);
          if ($D_ === $Not_found) {return Vector{1, $id};}
          throw $caml_wrap_thrown_exception_reraise($D_) as \Throwable;
        }
      };
      $keyword_or_error = (dynamic $c) ==> {
        $z_ = null;
        $A_ = null;
        $s = $call2($String[1], 1, $c);
        try {$A_ = $call2($Hashtbl[6], $kwd_table, $s);return $A_;}
        catch(\Throwable $B_) {
          $B_ = $runtime["caml_wrap_exception"]($B_);
          if ($B_ === $Not_found) {
            $z_ = $call2($Pervasives[16], $cst_Illegal_character, $s);
            throw $caml_wrap_thrown_exception(Vector{0, $Stream[2], $z_}) as \Throwable;
          }
          throw $caml_wrap_thrown_exception_reraise($B_) as \Throwable;
        }
      };
      $end_exponent_part = (dynamic $strm) ==> {
        $switcher = null;
        $y_ = null;
        $match = null;
        for (;;) {
          $match = $call1($Stream[11], $strm);
          if ($match) {
            $y_ = $match[1];
            $switcher = (int) ($y_ + -48);
            if (! (9 < $unsigned_right_shift_32($switcher, 0))) {$call1($Stream[12], $strm);$store($y_);continue;}
          }
          return Vector{0, Vector{3, $caml_float_of_string($get_string(0))}};
        }
      };
      $exponent_part = (dynamic $strm) ==> {
        $x_ = null;
        $switch__0 = null;
        $match = $call1($Stream[11], $strm);
        if ($match) {
          $x_ = $match[1];
          $switch__0 = 43 === $x_ ? 0 : (45 === $x_ ? 0 : (1));
          if (! $switch__0) {
            $call1($Stream[12], $strm);
            $store($x_);
            return $end_exponent_part($strm);
          }
        }
        return $end_exponent_part($strm);
      };
      $number = (dynamic $strm) ==> {
        $switch__0 = null;
        $switcher__0 = null;
        $switcher = null;
        $w_ = null;
        $v_ = null;
        $match__0 = null;
        $u_ = null;
        $match = null;
        for (;;) {
          $match = $call1($Stream[11], $strm);
          if ($match) {
            $u_ = $match[1];
            if (58 <= $u_) {
              $switch__0 = 69 === $u_ ? 0 : (101 === $u_ ? 0 : (1));
              if (! $switch__0) {
                $call1($Stream[12], $strm);
                $store(69);
                return $exponent_part($strm);
              }
            }
            else {
              if (46 === $u_) {
                $call1($Stream[12], $strm);
                $store(46);
                for (;;) {
                  $match__0 = $call1($Stream[11], $strm);
                  if ($match__0) {
                    $v_ = $match__0[1];
                    $w_ = (int) ($v_ + -69);
                    if (32 < $unsigned_right_shift_32($w_, 0)) {
                      $switcher = (int) ($w_ + 21);
                      if (! (9 < $unsigned_right_shift_32($switcher, 0))) {$call1($Stream[12], $strm);$store($v_);continue;}
                    }
                    else {
                      $switcher__0 = (int) ($w_ + -1);
                      if (30 < $unsigned_right_shift_32($switcher__0, 0)) {
                        $call1($Stream[12], $strm);
                        $store(69);
                        return $exponent_part($strm);
                      }
                    }
                  }
                  return Vector{
                    0,
                    Vector{3, $caml_float_of_string($get_string(0))}
                  };
                }
              }
              if (48 <= $u_) {
                $call1($Stream[12], $strm);
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
      $ident2 = (dynamic $strm) ==> {
        $switch__0 = null;
        $t_ = null;
        $s_ = null;
        $match = null;
        for (;;) {
          $match = $call1($Stream[11], $strm);
          if ($match) {
            $s_ = $match[1];
            if (94 <= $s_) {
              $t_ = (int) ($s_ + -95);
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
                      $switch__0 = 0;
                      break;
                    // FALLTHROUGH
                    default:
                      $switch__0 = 1;
                    }
                }
                else {$switch__0 = 1;}
              }
            }
            if (! $switch__0) {
              $call1($Stream[12], $strm);
              $store($s_);
              continue;
            }
          }
          return Vector{0, $ident_or_keyword($get_string(0))};
        }
      };
      $neg_number = (dynamic $strm) ==> {
        $r_ = null;
        $switcher = null;
        $match = $call1($Stream[11], $strm);
        if ($match) {
          $r_ = $match[1];
          $switcher = (int) ($r_ + -48);
          if (! (9 < $unsigned_right_shift_32($switcher, 0))) {
            $call1($Stream[12], $strm);
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
      $ident = (dynamic $strm) ==> {
        $switch__0 = null;
        $q_ = null;
        $p_ = null;
        $match = null;
        for (;;) {
          $match = $call1($Stream[11], $strm);
          if ($match) {
            $p_ = $match[1];
            if (91 <= $p_) {
              $q_ = (int) ($p_ + -95);
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
              $call1($Stream[12], $strm);
              $store($p_);
              continue;
            }
          }
          return Vector{0, $ident_or_keyword($get_string(0))};
        }
      };
      $next_token__0 = (dynamic $counter, dynamic $strm) ==> {
        $switch__0 = null;
        $counter__0 = null;
        $l_ = null;
        $k_ = null;
        $match__2 = null;
        $c__0 = null;
        $j_ = null;
        $match__1 = null;
        $i_ = null;
        $match__0 = null;
        $c = null;
        $switcher = null;
        $h_ = null;
        $g_ = null;
        $match = null;
        for (;;) {
          $match = $call1($Stream[11], $strm);
          if ($match) {
            $g_ = $match[1];
            if (124 <= $g_) {
              $switch__0 =
                127 <= $g_ ? 192 <= $g_ ? 1 : (0) : (125 === $g_ ? 0 : (2));
            }
            else {
              $h_ = (int) ($g_ + -65);
              if (57 < $unsigned_right_shift_32($h_, 0)) {
                if (58 <= $h_) {
                  $switch__0 = 0;
                }
                else {
                  $switcher = (int) ($h_ + 65);
                  $continue_label = null;
                  switch($switcher) {
                    // FALLTHROUGH
                    case 34:
                      $call1($Stream[12], $strm);
                      $reset_buffer(0);
                      for (;;) {
                        $match__1 = $call1($Stream[11], $strm);
                        if ($match__1) {
                          $j_ = $match__1[1];
                          if (34 === $j_) {
                            $call1($Stream[12], $strm);
                            return Vector{0, Vector{4, $get_string(0)}};
                          }
                          if (92 === $j_) {
                            $call1($Stream[12], $strm);
                            try {$c__0 = $escape->contents($strm);}
                            catch(\Throwable $o_) {
                              $o_ = $runtime["caml_wrap_exception"]($o_);
                              if ($o_ === $Stream[1]) {
                                throw $caml_wrap_thrown_exception(
                                        Vector{0, $Stream[2], $cst__1}
                                      ) as \Throwable;
                              }
                              throw $caml_wrap_thrown_exception_reraise($o_) as \Throwable;
                            }
                            $store($c__0);
                            continue;
                          }
                          $call1($Stream[12], $strm);
                          $store($j_);
                          continue;
                        }
                        throw $caml_wrap_thrown_exception($Stream[1]) as \Throwable;
                      }
                    // FALLTHROUGH
                    case 39:
                      $call1($Stream[12], $strm);
                      try {
                        $match__2 = $call1($Stream[11], $strm);
                        if (! $match__2) {
                          throw $caml_wrap_thrown_exception($Stream[1]) as \Throwable;
                        }
                        $k_ = $match__2[1];
                        if (92 === $k_) {
                          $call1($Stream[12], $strm);
                          try {$l_ = $escape->contents($strm);}
                          catch(\Throwable $n_) {
                            $n_ = $runtime["caml_wrap_exception"]($n_);
                            if ($n_ === $Stream[1]) {
                              throw $caml_wrap_thrown_exception(
                                      Vector{0, $Stream[2], $cst__2}
                                    ) as \Throwable;
                            }
                            throw $caml_wrap_thrown_exception_reraise($n_) as \Throwable;
                          }
                          $c = $l_;
                        }
                        else {$call1($Stream[12], $strm);$c = $k_;}
                      }
                      catch(\Throwable $m_) {
                        $m_ = $runtime["caml_wrap_exception"]($m_);
                        if ($m_ === $Stream[1]) {
                          throw $caml_wrap_thrown_exception(
                                  Vector{0, $Stream[2], $cst}
                                ) as \Throwable;
                        }
                        throw $caml_wrap_thrown_exception_reraise($m_) as \Throwable;
                      }
                      $match__0 = $call1($Stream[11], $strm);
                      if ($match__0) {
                        if (39 === $match__0[1]) {
                          $call1($Stream[12], $strm);
                          return Vector{0, Vector{5, $c}};
                        }
                      }
                      throw $caml_wrap_thrown_exception(
                              Vector{0, $Stream[2], $cst__0}
                            ) as \Throwable;
                    // FALLTHROUGH
                    case 40:
                      $call1($Stream[12], $strm);
                      if ($counter < 50) {
                        $counter__0 = (int) ($counter + 1);
                        return $maybe_comment->contents($counter__0, $strm);
                      }
                      return $caml_trampoline_return(
                        $maybe_comment->contents,
                        varray[0,$strm]
                      );
                    // FALLTHROUGH
                    case 45:
                      $call1($Stream[12], $strm);
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
                      $call1($Stream[12], $strm);
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
                      $call1($Stream[12], $strm);
                      $reset_buffer(0);
                      $store($g_);
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
                      $switch__0 = 2;
                      break;
                    // FALLTHROUGH
                    default:
                      $switch__0 = 0;
                    }
                  if ($continue_label === "#") {continue;}
                }
              }
              else {
                $i_ = (int) ($h_ + -26);
                if (5 < $unsigned_right_shift_32($i_, 0)) {$switch__0 = 1;}
                else {
                  switch($i_) {
                    // FALLTHROUGH
                    case 4:
                      $switch__0 = 1;
                      break;
                    // FALLTHROUGH
                    case 1:
                    // FALLTHROUGH
                    case 3:
                      $switch__0 = 2;
                      break;
                    // FALLTHROUGH
                    default:
                      $switch__0 = 0;
                    }
                }
              }
            }
            switch($switch__0) {
              // FALLTHROUGH
              case 0:
                $call1($Stream[12], $strm);
                return Vector{0, $keyword_or_error($g_)};
              // FALLTHROUGH
              case 1:
                $call1($Stream[12], $strm);
                $reset_buffer(0);
                $store($g_);
                return $ident($strm);
              // FALLTHROUGH
              default:
                $call1($Stream[12], $strm);
                $reset_buffer(0);
                $store($g_);
                return $ident2($strm);
              }
          }
          return 0;
        }
      };
      $maybe_comment->contents = (dynamic $counter, dynamic $strm) ==> {
        $counter__0 = null;
        $match = $call1($Stream[11], $strm);
        if ($match) {
          if (42 === $match[1]) {
            $call1($Stream[12], $strm);
            $comment->contents($strm);
            if ($counter < 50) {
              $counter__0 = (int) ($counter + 1);
              return $next_token__0($counter__0, $strm);
            }
            return $caml_trampoline_return($next_token__0, varray[0,$strm]);
          }
        }
        return Vector{0, $keyword_or_error(40)};
      };
      $next_token = (dynamic $strm) ==> {
        return $caml_trampoline($next_token__0(0, $strm));
      };
      $escape->contents = (dynamic $strm) ==> {
        $d_ = null;
        $switcher = null;
        $match__0 = null;
        $e_ = null;
        $switcher__0 = null;
        $match__1 = null;
        $f_ = null;
        $switcher__1 = null;
        $match = $call1($Stream[11], $strm);
        if ($match) {
          $d_ = $match[1];
          if (58 <= $d_) {
            $switcher = (int) ($d_ + -110);
            if (! (6 < $unsigned_right_shift_32($switcher, 0))) {
              switch($switcher) {
                // FALLTHROUGH
                case 0:
                  $call1($Stream[12], $strm);
                  return 10;
                // FALLTHROUGH
                case 4:
                  $call1($Stream[12], $strm);
                  return 13;
                // FALLTHROUGH
                case 6:
                  $call1($Stream[12], $strm);
                  return 9;
                }
            }
          }
          else {
            if (48 <= $d_) {
              $call1($Stream[12], $strm);
              $match__0 = $call1($Stream[11], $strm);
              if ($match__0) {
                $e_ = $match__0[1];
                $switcher__0 = (int) ($e_ + -48);
                if (! (9 < $unsigned_right_shift_32($switcher__0, 0))) {
                  $call1($Stream[12], $strm);
                  $match__1 = $call1($Stream[11], $strm);
                  if ($match__1) {
                    $f_ = $match__1[1];
                    $switcher__1 = (int) ($f_ + -48);
                    if (! (9 < $unsigned_right_shift_32($switcher__1, 0))) {
                      $call1($Stream[12], $strm);
                      return $call1(
                        $Char[1],
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
                          Vector{0, $Stream[2], $cst__4}
                        ) as \Throwable;
                }
              }
              throw $caml_wrap_thrown_exception(Vector{0, $Stream[2], $cst__3}
                    ) as \Throwable;
            }
          }
          $call1($Stream[12], $strm);
          return $d_;
        }
        throw $caml_wrap_thrown_exception($Stream[1]) as \Throwable;
      };
      $comment->contents = (dynamic $strm) ==> {
        $c_ = null;
        $match__1 = null;
        $match__0 = null;
        $switcher = null;
        $match = null;
        for (;;) {
          $continue_label = null;
          $match = $call1($Stream[11], $strm);
          if ($match) {
            $switcher = (int) ($match[1] + -40);
            if (! (2 < $unsigned_right_shift_32($switcher, 0))) {
              $continue_label = null;
              switch($switcher) {
                // FALLTHROUGH
                case 0:
                  $call1($Stream[12], $strm);
                  $match__0 = $call1($Stream[11], $strm);
                  if ($match__0) {
                    if (42 === $match__0[1]) {
                      $call1($Stream[12], $strm);
                      $comment->contents($strm);
                      $continue_label = "#";break;
                    }
                    $call1($Stream[12], $strm);
                    $continue_label = "#";break;
                  }
                  throw $caml_wrap_thrown_exception($Stream[1]) as \Throwable;
                // FALLTHROUGH
                case 1:break;
                // FALLTHROUGH
                default:
                  $call1($Stream[12], $strm);
                  for (;;) {
                    $match__1 = $call1($Stream[11], $strm);
                    if ($match__1) {
                      $c_ = $match__1[1];
                      if (41 === $c_) {$call1($Stream[12], $strm);return 0;}
                      if (42 === $c_) {$call1($Stream[12], $strm);continue;}
                      $call1($Stream[12], $strm);
                      $continue_label = "a";break;
                    }
                    throw $caml_wrap_thrown_exception($Stream[1]) as \Throwable;
                  }
                  if ($continue_label !== null) {break;}
                }
              if ($continue_label === "#") {continue;}
              else if ($continue_label === "a") {continue;}
            }
            $call1($Stream[12], $strm);
            continue;
          }
          throw $caml_wrap_thrown_exception($Stream[1]) as \Throwable;
        }
      };
      return (dynamic $input) ==> {
        $b_ = (dynamic $count) ==> {return $next_token($input);};
        return $call1($Stream[3], $b_);
      };
    };
    $Genlex = Vector{0, $make_lexer} as dynamic;
    
     return ($Genlex);

  }
  public static function make_lexer(dynamic $keywords): dynamic {
    return static::callRehackFunction(static::requireModule()[1], varray[$keywords]);
  }

}
/* Hashing disabled */
