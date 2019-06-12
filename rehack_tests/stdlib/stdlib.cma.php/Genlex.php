<?hh
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * Genlex.php
 */

namespace Rehack;

final class Genlex {
  <<__Memoize>>
  public static function get() {
    $global_object = \Rehack\GlobalObject::get();
    $runtime = \Rehack\Runtime::get();
    /*
     * Soon, these will replace the `global_data->ModuleName`
     * pattern in the load() function.
     */
    $Bytes = Bytes::get();
    $Char = Char::get();
    $Hashtbl = Hashtbl::get();
    $List_ = List_::get();
    $Pervasives = Pervasives::get();
    $Stream = Stream::get();
    $String_ = String_::get();
    $Not_found = Not_found::get();
    Genlex::load($global_object);
    $memoized = $runtime->caml_get_global_data()->Genlex;
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
    $call5 = $runtime["caml_call5"];
    $caml_create_bytes = $runtime["caml_create_bytes"];
    $caml_float_of_string = $runtime["caml_float_of_string"];
    $string = $runtime["caml_new_string"];
    $caml_trampoline = $runtime["caml_trampoline"];
    $caml_trampoline_return = $runtime["caml_trampoline_return"];
    $caml_wrap_exception = $runtime["caml_wrap_exception"];
    $unsigned_right_shift_32 = $runtime["unsigned_right_shift_32"];
    $global_data = $runtime["caml_get_global_data"]();
    $cst = $string("");
    $cst__0 = $string("");
    $cst__1 = $string("");
    $cst__2 = $string("");
    $cst__4 = $string("");
    $cst__3 = $string("");
    $cst_Illegal_character = $string("Illegal character ");
    $Stream = $global_data["Stream"];
    $Char = $global_data["Char"];
    $String = $global_data["String_"];
    $Hashtbl = $global_data["Hashtbl"];
    $Not_found = $global_data["Not_found"];
    $Pervasives = $global_data["Pervasives"];
    $List = $global_data["List_"];
    $Bytes = $global_data["Bytes"];
    $initial_buffer = $caml_create_bytes(32);
    $buffer = Vector{0, $initial_buffer};
    $bufpos = Vector{0, 0};
    $reset_buffer = function(dynamic $param) use ($buffer,$bufpos,$initial_buffer) {
      $buffer[1] = $initial_buffer;
      $bufpos[1] = 0;
      return 0;
    };
    $store = function(dynamic $c) use ($Bytes,$buffer,$bufpos,$call5,$caml_create_bytes,$runtime) {
      if ($runtime["caml_ml_bytes_length"]($buffer[1]) <= $bufpos[1]) {
        $newbuffer = $caml_create_bytes((int) (2 * $bufpos[1]));
        $call5($Bytes[11], $buffer[1], 0, $newbuffer, 0, $bufpos[1]);
        $buffer[1] = $newbuffer;
      }
      $runtime["caml_bytes_set"]($buffer[1], $bufpos[1], $c);
      $bufpos[1] += 1;
      return 0;
    };
    $get_string = function(dynamic $param) use ($Bytes,$buffer,$bufpos,$call3,$initial_buffer) {
      $s = $call3($Bytes[8], $buffer[1], 0, $bufpos[1]);
      $buffer[1] = $initial_buffer;
      return $s;
    };
    $make_lexer = function(dynamic $keywords) use ($Char,$Hashtbl,$List,$Not_found,$Pervasives,$Stream,$String,$call1,$call2,$call3,$caml_float_of_string,$caml_trampoline,$caml_trampoline_return,$caml_wrap_exception,$cst,$cst_Illegal_character,$cst__0,$cst__1,$cst__2,$cst__3,$cst__4,$get_string,$reset_buffer,$runtime,$store,$string,$unsigned_right_shift_32) {
      $char__0 = new Ref();
      $comment = new Ref();
      $escape = new Ref();
      $maybe_comment = new Ref();
      $maybe_end_comment = new Ref();
      $maybe_nested_comment = new Ref();
      $kwd_table = $call2($Hashtbl[1], 0, 17);
      $zz = function(dynamic $s) use ($Hashtbl,$call3,$kwd_table) {
        return $call3($Hashtbl[5], $kwd_table, $s, Vector{0, $s});
      };
      $call2($List[15], $zz, $keywords);
      $ident_or_keyword = function(dynamic $id) use ($Hashtbl,$Not_found,$call2,$caml_wrap_exception,$kwd_table,$runtime) {
        try {$z1 = $call2($Hashtbl[6], $kwd_table, $id);return $z1;}
        catch(\Throwable $z2) {
          $z2 = $caml_wrap_exception($z2);
          if ($z2 === $Not_found) {return Vector{1, $id};}
          throw $runtime["caml_wrap_thrown_exception_reraise"]($z2) as \Throwable;
        }
      };
      $keyword_or_error = function(dynamic $c) use ($Hashtbl,$Not_found,$Pervasives,$Stream,$String,$call2,$caml_wrap_exception,$cst_Illegal_character,$kwd_table,$runtime) {
        $s = $call2($String[1], 1, $c);
        try {$zZ = $call2($Hashtbl[6], $kwd_table, $s);return $zZ;}
        catch(\Throwable $z0) {
          $z0 = $caml_wrap_exception($z0);
          if ($z0 === $Not_found) {
            $zY = $call2($Pervasives[16], $cst_Illegal_character, $s);
            throw $runtime["caml_wrap_thrown_exception"](Vector{0, $Stream[2], $zY}) as \Throwable;
          }
          throw $runtime["caml_wrap_thrown_exception_reraise"]($z0) as \Throwable;
        }
      };
      $end_exponent_part = function(dynamic $strm) use ($Stream,$call1,$caml_float_of_string,$get_string,$store,$unsigned_right_shift_32) {
        for (;;) {
          $match = $call1($Stream[11], $strm);
          if ($match) {
            $zX = $match[1];
            $switcher = (int) ($zX + -48);
            if (! (9 < $unsigned_right_shift_32($switcher, 0))) {$call1($Stream[12], $strm);$store($zX);continue;}
          }
          return Vector{0, Vector{3, $caml_float_of_string($get_string(0))}};
        }
      };
      $exponent_part = function(dynamic $strm) use ($Stream,$call1,$end_exponent_part,$store) {
        $match = $call1($Stream[11], $strm);
        if ($match) {
          $zW = $match[1];
          $switch__0 = 43 === $zW ? 0 : (45 === $zW ? 0 : (1));
          if (! $switch__0) {
            $call1($Stream[12], $strm);
            $store($zW);
            return $end_exponent_part($strm);
          }
        }
        return $end_exponent_part($strm);
      };
      $decimal_part = function(dynamic $strm) use ($Stream,$call1,$caml_float_of_string,$exponent_part,$get_string,$store,$unsigned_right_shift_32) {
        for (;;) {
          $match = $call1($Stream[11], $strm);
          if ($match) {
            $zU = $match[1];
            $zV = (int) ($zU + -69);
            if (32 < $unsigned_right_shift_32($zV, 0)) {
              $switcher = (int) ($zV + 21);
              if (! (9 < $unsigned_right_shift_32($switcher, 0))) {$call1($Stream[12], $strm);$store($zU);continue;}
            }
            else {
              $switcher__0 = (int) ($zV + -1);
              if (30 < $unsigned_right_shift_32($switcher__0, 0)) {
                $call1($Stream[12], $strm);
                $store(69);
                return $exponent_part($strm);
              }
            }
          }
          return Vector{0, Vector{3, $caml_float_of_string($get_string(0))}};
        }
      };
      $number = function(dynamic $strm) use ($Stream,$call1,$decimal_part,$exponent_part,$get_string,$runtime,$store) {
        for (;;) {
          $match = $call1($Stream[11], $strm);
          if ($match) {
            $zT = $match[1];
            if (58 <= $zT) {
              $switch__0 = 69 === $zT ? 0 : (101 === $zT ? 0 : (1));
              if (! $switch__0) {
                $call1($Stream[12], $strm);
                $store(69);
                return $exponent_part($strm);
              }
            }
            else {
              if (46 === $zT) {
                $call1($Stream[12], $strm);
                $store(46);
                return $decimal_part($strm);
              }
              if (48 <= $zT) {
                $call1($Stream[12], $strm);
                $store($zT);
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
      $ident2 = function(dynamic $strm) use ($Stream,$call1,$get_string,$ident_or_keyword,$store,$unsigned_right_shift_32) {
        for (;;) {
          $match = $call1($Stream[11], $strm);
          if ($match) {
            $zR = $match[1];
            if (94 <= $zR) {
              $zS = (int) ($zR + -95);
              $switch__0 = 30 < $unsigned_right_shift_32($zS, 0)
                ? 32 <= $zS ? 1 : (0)
                : (29 === $zS ? 0 : (1));
            }
            else {
              if (65 <= $zR) {
                $switch__0 = 92 === $zR ? 0 : (1);
              }
              else {
                if (33 <= $zR) {
                  switch((int) ($zR + -33)) {
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
              $store($zR);
              continue;
            }
          }
          return Vector{0, $ident_or_keyword($get_string(0))};
        }
      };
      $neg_number = function(dynamic $strm) use ($Stream,$call1,$ident2,$number,$reset_buffer,$store,$unsigned_right_shift_32) {
        $match = $call1($Stream[11], $strm);
        if ($match) {
          $zQ = $match[1];
          $switcher = (int) ($zQ + -48);
          if (! (9 < $unsigned_right_shift_32($switcher, 0))) {
            $call1($Stream[12], $strm);
            $reset_buffer(0);
            $store(45);
            $store($zQ);
            return $number($strm);
          }
        }
        $reset_buffer(0);
        $store(45);
        return $ident2($strm);
      };
      $ident = function(dynamic $strm) use ($Stream,$call1,$get_string,$ident_or_keyword,$store,$unsigned_right_shift_32) {
        for (;;) {
          $match = $call1($Stream[11], $strm);
          if ($match) {
            $zO = $match[1];
            if (91 <= $zO) {
              $zP = (int) ($zO + -95);
              $switch__0 = 27 < $unsigned_right_shift_32($zP, 0)
                ? 97 <= $zP ? 0 : (1)
                : (1 === $zP ? 1 : (0));
            }
            else {
              $switch__0 = 48 <= $zO
                ? 6 < $unsigned_right_shift_32((int) ($zO + -58), 0) ? 0 : (1)
                : (39 === $zO ? 0 : (1));
            }
            if (! $switch__0) {
              $call1($Stream[12], $strm);
              $store($zO);
              continue;
            }
          }
          return Vector{0, $ident_or_keyword($get_string(0))};
        }
      };
      $next_token__0 = function(dynamic $counter, dynamic $strm) use ($Stream,$call1,$caml_trampoline_return,$caml_wrap_exception,$char__0,$cst,$cst__0,$ident,$ident2,$keyword_or_error,$maybe_comment,$neg_number,$number,$reset_buffer,$runtime,$store,$string,$unsigned_right_shift_32) {
        for (;;) {
          $match = $call1($Stream[11], $strm);
          if ($match) {
            $zK = $match[1];
            if (124 <= $zK) {
              $switch__0 = 127 <= $zK
                ? 192 <= $zK ? 1 : (0)
                : (125 === $zK ? 0 : (2));
            }
            else {
              $zL = (int) ($zK + -65);
              if (57 < $unsigned_right_shift_32($zL, 0)) {
                if (58 <= $zL) {
                  $switch__0 = 0;
                }
                else {
                  $switcher = (int) ($zL + 65);
                  switch($switcher) {
                    // FALLTHROUGH
                    case 34:
                      $call1($Stream[12], $strm);
                      $reset_buffer(0);
                      return Vector{0, Vector{4, $string($strm)}};
                    // FALLTHROUGH
                    case 39:
                      $call1($Stream[12], $strm);
                      try {$c = $char__0->contents($strm);}
                      catch(\Throwable $zN) {
                        $zN = $caml_wrap_exception($zN);
                        if ($zN === $Stream[1]) {
                          throw $runtime["caml_wrap_thrown_exception"](Vector{0, $Stream[2], $cst}) as \Throwable;
                        }
                        throw $runtime["caml_wrap_thrown_exception_reraise"]($zN) as \Throwable;
                      }
                      $match__0 = $call1($Stream[11], $strm);
                      if ($match__0) {
                        if (39 === $match__0[1]) {
                          $call1($Stream[12], $strm);
                          return Vector{0, Vector{5, $c}};
                        }
                      }
                      throw $runtime["caml_wrap_thrown_exception"](Vector{0, $Stream[2], $cst__0}) as \Throwable;
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
                      continue;
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
                      $store($zK);
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
                }
              }
              else {
                $zM = (int) ($zL + -26);
                if (5 < $unsigned_right_shift_32($zM, 0)) {$switch__0 = 1;}
                else {
                  switch($zM) {
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
                return Vector{0, $keyword_or_error($zK)};
              // FALLTHROUGH
              case 1:
                $call1($Stream[12], $strm);
                $reset_buffer(0);
                $store($zK);
                return $ident($strm);
              // FALLTHROUGH
              default:
                $call1($Stream[12], $strm);
                $reset_buffer(0);
                $store($zK);
                return $ident2($strm);
              }
          }
          return 0;
        }
      };
      $maybe_comment->contents = function(dynamic $counter, dynamic $strm) use ($Stream,$call1,$caml_trampoline_return,$comment,$keyword_or_error,$next_token__0) {
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
      $next_token = function(dynamic $strm) use ($caml_trampoline,$next_token__0) {
        return $caml_trampoline($next_token__0(0, $strm));
      };
      $string->contents = function(dynamic $strm) use ($Stream,$call1,$caml_wrap_exception,$cst__1,$escape,$get_string,$runtime,$store) {
        for (;;) {
          $match = $call1($Stream[11], $strm);
          if ($match) {
            $zI = $match[1];
            if (34 === $zI) {
              $call1($Stream[12], $strm);
              return $get_string(0);
            }
            if (92 === $zI) {
              $call1($Stream[12], $strm);
              try {$c = $escape->contents($strm);}
              catch(\Throwable $zJ) {
                $zJ = $caml_wrap_exception($zJ);
                if ($zJ === $Stream[1]) {
                  throw $runtime["caml_wrap_thrown_exception"](Vector{0, $Stream[2], $cst__1}) as \Throwable;
                }
                throw $runtime["caml_wrap_thrown_exception_reraise"]($zJ) as \Throwable;
              }
              $store($c);
              continue;
            }
            $call1($Stream[12], $strm);
            $store($zI);
            continue;
          }
          throw $runtime["caml_wrap_thrown_exception"]($Stream[1]) as \Throwable;
        }
      };
      $char__0->contents = function(dynamic $strm) use ($Stream,$call1,$caml_wrap_exception,$cst__2,$escape,$runtime) {
        $match = $call1($Stream[11], $strm);
        if ($match) {
          $zF = $match[1];
          if (92 === $zF) {
            $call1($Stream[12], $strm);
            try {$zG = $escape->contents($strm);return $zG;}
            catch(\Throwable $zH) {
              $zH = $caml_wrap_exception($zH);
              if ($zH === $Stream[1]) {
                throw $runtime["caml_wrap_thrown_exception"](Vector{0, $Stream[2], $cst__2}) as \Throwable;
              }
              throw $runtime["caml_wrap_thrown_exception_reraise"]($zH) as \Throwable;
            }
          }
          $call1($Stream[12], $strm);
          return $zF;
        }
        throw $runtime["caml_wrap_thrown_exception"]($Stream[1]) as \Throwable;
      };
      $escape->contents = function(dynamic $strm) use ($Char,$Stream,$call1,$cst__3,$cst__4,$runtime,$unsigned_right_shift_32) {
        $match = $call1($Stream[11], $strm);
        if ($match) {
          $zC = $match[1];
          if (58 <= $zC) {
            $switcher = (int) ($zC + -110);
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
            if (48 <= $zC) {
              $call1($Stream[12], $strm);
              $match__0 = $call1($Stream[11], $strm);
              if ($match__0) {
                $zD = $match__0[1];
                $switcher__0 = (int) ($zD + -48);
                if (! (9 < $unsigned_right_shift_32($switcher__0, 0))) {
                  $call1($Stream[12], $strm);
                  $match__1 = $call1($Stream[11], $strm);
                  if ($match__1) {
                    $zE = $match__1[1];
                    $switcher__1 = (int) ($zE + -48);
                    if (! (9 < $unsigned_right_shift_32($switcher__1, 0))) {
                      $call1($Stream[12], $strm);
                      return $call1(
                        $Char[1],
                        (int)
                        ((int)
                         ((int)
                          ((int) ($zC + -48) * 100) +
                            (int)
                            ((int) ($zD + -48) * 10)) + (int) ($zE + -48))
                      );
                    }
                  }
                  throw $runtime["caml_wrap_thrown_exception"](Vector{0, $Stream[2], $cst__4}) as \Throwable;
                }
              }
              throw $runtime["caml_wrap_thrown_exception"](Vector{0, $Stream[2], $cst__3}) as \Throwable;
            }
          }
          $call1($Stream[12], $strm);
          return $zC;
        }
        throw $runtime["caml_wrap_thrown_exception"]($Stream[1]) as \Throwable;
      };
      $comment__0 = function(dynamic $counter, dynamic $strm) use ($Stream,$call1,$caml_trampoline_return,$maybe_end_comment,$maybe_nested_comment,$runtime,$unsigned_right_shift_32) {
        for (;;) {
          $match = $call1($Stream[11], $strm);
          if ($match) {
            $switcher = (int) ($match[1] + -40);
            if (! (2 < $unsigned_right_shift_32($switcher, 0))) {
              switch($switcher) {
                // FALLTHROUGH
                case 0:
                  $call1($Stream[12], $strm);
                  if ($counter < 50) {
                    $counter__1 = (int) ($counter + 1);
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
                  $call1($Stream[12], $strm);
                  if ($counter < 50) {
                    $counter__0 = (int) ($counter + 1);
                    return $maybe_end_comment->contents($counter__0, $strm);
                  }
                  return $caml_trampoline_return(
                    $maybe_end_comment->contents,
                    varray[0,$strm]
                  );
                }
            }
            $call1($Stream[12], $strm);
            continue;
          }
          throw $runtime["caml_wrap_thrown_exception"]($Stream[1]) as \Throwable;
        }
      };
      $maybe_nested_comment->contents = function
      (dynamic $counter, dynamic $strm) use ($Stream,$call1,$caml_trampoline_return,$comment,$comment__0,$runtime) {
        $match = $call1($Stream[11], $strm);
        if ($match) {
          if (42 === $match[1]) {
            $call1($Stream[12], $strm);
            $comment->contents($strm);
            if ($counter < 50) {
              $counter__1 = (int) ($counter + 1);
              return $comment__0($counter__1, $strm);
            }
            return $caml_trampoline_return($comment__0, varray[0,$strm]);
          }
          $call1($Stream[12], $strm);
          if ($counter < 50) {
            $counter__0 = (int) ($counter + 1);
            return $comment__0($counter__0, $strm);
          }
          return $caml_trampoline_return($comment__0, varray[0,$strm]);
        }
        throw $runtime["caml_wrap_thrown_exception"]($Stream[1]) as \Throwable;
      };
      $maybe_end_comment->contents = function(dynamic $counter, dynamic $strm) use ($Stream,$call1,$caml_trampoline_return,$comment__0,$runtime) {
        for (;;) {
          $match = $call1($Stream[11], $strm);
          if ($match) {
            $zB = $match[1];
            if (41 === $zB) {$call1($Stream[12], $strm);return 0;}
            if (42 === $zB) {$call1($Stream[12], $strm);continue;}
            $call1($Stream[12], $strm);
            if ($counter < 50) {
              $counter__0 = (int) ($counter + 1);
              return $comment__0($counter__0, $strm);
            }
            return $caml_trampoline_return($comment__0, varray[0,$strm]);
          }
          throw $runtime["caml_wrap_thrown_exception"]($Stream[1]) as \Throwable;
        }
      };
      $comment->contents = function(dynamic $strm) use ($caml_trampoline,$comment__0) {
        return $caml_trampoline($comment__0(0, $strm));
      };
      return function(dynamic $input) use ($Stream,$call1,$next_token) {
        $zA = function(dynamic $count) use ($input,$next_token) {
          return $next_token($input);
        };
        return $call1($Stream[3], $zA);
      };
    };
    $Genlex = Vector{0, $make_lexer};
    
    $runtime["caml_register_global"](15, $Genlex, "Genlex");

  }
}