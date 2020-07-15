<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class Stdlib__parsing {
  <<__Override, __Memoize>>
  public static function get() : Vector<dynamic> {
    
    $runtime = (\Rehack\GlobalObject::get() as dynamic)->jsoo_runtime;
    $call1 = $runtime["caml_call1"];
    $call4 = $runtime["caml_call4"];
    $call5 = $runtime["caml_call5"];
    $caml_check_bound = $runtime["caml_check_bound"];
    $caml_fresh_oo_id = $runtime["caml_fresh_oo_id"];
    $caml_make_vect = $runtime["caml_make_vect"];
    $string = $runtime["caml_new_string"];
    $caml_wrap_thrown_exception = $runtime["caml_wrap_thrown_exception"];
    $caml_wrap_thrown_exception_reraise = $runtime[
       "caml_wrap_thrown_exception_reraise"
     ];
    $cst_syntax_error = $string("syntax error");
    $cst_Stdlib_Parsing_YYexit = $string("Stdlib.Parsing.YYexit");
    $cst_Stdlib_Parsing_Parse_error = $string("Stdlib.Parsing.Parse_error");
    $Stdlib_obj = Stdlib__obj::get();
    $Stdlib_array = Stdlib__array::get();
    $Stdlib_lexing = Stdlib__lexing::get();
    $YYexit = Vector{248, $cst_Stdlib_Parsing_YYexit, $caml_fresh_oo_id(0)} as dynamic;
    $Parse_error = Vector{
      248,
      $cst_Stdlib_Parsing_Parse_error,
      $caml_fresh_oo_id(0)
    } as dynamic;
    $env = Vector{
      0,
      $caml_make_vect(100, 0),
      $caml_make_vect(100, 0),
      $caml_make_vect(100, $Stdlib_lexing[1]),
      $caml_make_vect(100, $Stdlib_lexing[1]),
      100,
      0,
      0,
      0,
      $Stdlib_lexing[1],
      $Stdlib_lexing[1],
      0,
      0,
      0,
      0,
      0,
      0
    } as dynamic;
    $grow_stacks = (dynamic $param) : dynamic ==> {
      $oldsize = $env[5];
      $newsize = (int) ($oldsize * 2) as dynamic;
      $new_s = $caml_make_vect($newsize, 0);
      $new_v = $caml_make_vect($newsize, 0);
      $new_start = $caml_make_vect($newsize, $Stdlib_lexing[1]);
      $new_end = $caml_make_vect($newsize, $Stdlib_lexing[1]);
      $call5($Stdlib_array[10], $env[1], 0, $new_s, 0, $oldsize);
      $env[1] = $new_s;
      $call5($Stdlib_array[10], $env[2], 0, $new_v, 0, $oldsize);
      $env[2] = $new_v;
      $call5($Stdlib_array[10], $env[3], 0, $new_start, 0, $oldsize);
      $env[3] = $new_start;
      $call5($Stdlib_array[10], $env[4], 0, $new_end, 0, $oldsize);
      $env[4] = $new_end;
      $env[5] = $newsize;
      return 0;
    };
    $clear_parser = (dynamic $param) : dynamic ==> {
      $call4($Stdlib_array[9], $env[2], 0, $env[5], 0);
      $env[8] = 0;
      return 0;
    };
    $current_lookahead_fun = Vector{
      0,
      (dynamic $param) : dynamic ==> {return 0;}
    } as dynamic;
    $yyparse = 
    (dynamic $tables, dynamic $start, dynamic $lexer, dynamic $lexbuf) : dynamic ==> {
      $curr_char = null as dynamic;
      $i_ = null as dynamic;
      $v = null as dynamic;
      $loop = (dynamic $cmd, dynamic $arg) : dynamic ==> {
        $arg__1 = null as dynamic;
        $arg__2 = null as dynamic;
        $cmd__1 = null as dynamic;
        $k_ = null as dynamic;
        $l_ = null as dynamic;
        $m_ = null as dynamic;
        $match = null as dynamic;
        $n_ = null as dynamic;
        $o_ = null as dynamic;
        $cmd__0 = $cmd;
        $arg__0 = $arg;
        for (;;) {
          $match = $runtime["caml_parse_engine"](
            $tables,
            $env,
            $cmd__0,
            $arg__0
          );
          $continue_label = null;
          switch($match) {
            // FALLTHROUGH
            case 0:
              $arg__1 = $call1($lexer, $lexbuf);
              $env[9] = $lexbuf[11];
              $env[10] = $lexbuf[12];
              $cmd__0 = 1 as dynamic;
              $arg__0 = $arg__1;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 1:
              throw $caml_wrap_thrown_exception($Parse_error) as \Throwable;
            // FALLTHROUGH
            case 2:
              $grow_stacks(0);
              $cmd__0 = 2 as dynamic;
              $arg__0 = 0 as dynamic;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 3:
              $grow_stacks(0);
              $cmd__0 = 3 as dynamic;
              $arg__0 = 0 as dynamic;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 4:
              try {
                $m_ = $env[13];
                $n_ = $call1($caml_check_bound($tables[1], $m_)[$m_ + 1], $env
                );
                $o_ = 4 as dynamic;
                $cmd__1 = $o_;
                $arg__2 = $n_;
              }
              catch(\Throwable $p_) {
                $p_ = $runtime["caml_wrap_exception"]($p_);
                if ($p_ !== $Parse_error) {
                  throw $caml_wrap_thrown_exception_reraise($p_) as \Throwable;
                }
                $k_ = 0 as dynamic;
                $l_ = 5 as dynamic;
                $cmd__1 = $l_;
                $arg__2 = $k_;
              }
              $cmd__0 = $cmd__1;
              $arg__0 = $arg__2;
              $continue_label = "#";break;
            // FALLTHROUGH
            default:
              $call1($tables[14], $cst_syntax_error);
              $cmd__0 = 5 as dynamic;
              $arg__0 = 0 as dynamic;
              $continue_label = "#";break;
            }
          if ($continue_label === "#") {continue;}
        }
      };
      $init_asp = $env[11];
      $init_sp = $env[14];
      $init_stackbase = $env[6];
      $init_state = $env[15];
      $init_curr_char = $env[7];
      $init_lval = $env[8];
      $init_errflag = $env[16];
      $env[6] = (int) ($env[14] + 1);
      $env[7] = $start;
      $env[10] = $lexbuf[12];
      try {$i_ = $loop(0, 0);return $i_;}
      catch(\Throwable $exn) {
        $exn = $runtime["caml_wrap_exception"]($exn);
        $curr_char = $env[7];
        $env[11] = $init_asp;
        $env[14] = $init_sp;
        $env[6] = $init_stackbase;
        $env[15] = $init_state;
        $env[7] = $init_curr_char;
        $env[8] = $init_lval;
        $env[16] = $init_errflag;
        if ($exn[1] === $YYexit) {$v = $exn[2];return $v;}
        $current_lookahead_fun[1] =
          (dynamic $tok) : dynamic ==> {
            $j_ = null as dynamic;
            if ($call1($Stdlib_obj[1], $tok)) {
              $j_ = $runtime["caml_obj_tag"]($tok);
              return $caml_check_bound($tables[3], $j_)[$j_ + 1] === $curr_char
                ? 1
                : (0);
            }
            return $caml_check_bound($tables[2], $tok)[$tok + 1] === $curr_char
              ? 1
              : (0);
          };
        throw $caml_wrap_thrown_exception_reraise($exn) as \Throwable;
      }
    };
    $peek_val = (dynamic $env, dynamic $n) : dynamic ==> {
      $h_ = (int) ($env[11] - $n) as dynamic;
      return $caml_check_bound($env[2], $h_)[$h_ + 1];
    };
    $symbol_start_pos = (dynamic $param) : dynamic ==> {
      $loop = (dynamic $i) : dynamic ==> {
        $e_ = null as dynamic;
        $en = null as dynamic;
        $f_ = null as dynamic;
        $g_ = null as dynamic;
        $i__1 = null as dynamic;
        $st = null as dynamic;
        $i__0 = $i;
        for (;;) {
          if (0 < $i__0) {
            $e_ = (int) ((int) ($env[11] - $i__0) + 1) as dynamic;
            $st = $caml_check_bound($env[3], $e_)[$e_ + 1];
            $f_ = (int) ((int) ($env[11] - $i__0) + 1) as dynamic;
            $en = $caml_check_bound($env[4], $f_)[$f_ + 1];
            if ($runtime["caml_notequal"]($st, $en)) {return $st;}
            $i__1 = (int) ($i__0 + -1) as dynamic;
            $i__0 = $i__1;
            continue;
          }
          $g_ = $env[11];
          return $caml_check_bound($env[4], $g_)[$g_ + 1];
        }
      };
      return $loop($env[12]);
    };
    $symbol_end_pos = (dynamic $param) : dynamic ==> {
      $d_ = $env[11];
      return $caml_check_bound($env[4], $d_)[$d_ + 1];
    };
    $rhs_start_pos = (dynamic $n) : dynamic ==> {
      $c_ = (int) ($env[11] - (int) ($env[12] - $n)) as dynamic;
      return $caml_check_bound($env[3], $c_)[$c_ + 1];
    };
    $rhs_end_pos = (dynamic $n) : dynamic ==> {
      $b_ = (int) ($env[11] - (int) ($env[12] - $n)) as dynamic;
      return $caml_check_bound($env[4], $b_)[$b_ + 1];
    };
    $symbol_start = (dynamic $param) : dynamic ==> {
      return $symbol_start_pos(0)[4];
    };
    $symbol_end = (dynamic $param) : dynamic ==> {
      return $symbol_end_pos(0)[4];
    };
    $rhs_start = (dynamic $n) : dynamic ==> {return $rhs_start_pos($n)[4];};
    $rhs_end = (dynamic $n) : dynamic ==> {return $rhs_end_pos($n)[4];};
    $is_current_lookahead = (dynamic $tok) : dynamic ==> {
      return $call1($current_lookahead_fun[1], $tok);
    };
    $parse_error = (dynamic $param) : dynamic ==> {return 0;};
    $Stdlib_parsing = Vector{
      0,
      $symbol_start,
      $symbol_end,
      $rhs_start,
      $rhs_end,
      $symbol_start_pos,
      $symbol_end_pos,
      $rhs_start_pos,
      $rhs_end_pos,
      $clear_parser,
      $Parse_error,
      (dynamic $a_) : dynamic ==> {
        return $runtime["caml_set_parser_trace"]($a_);
      },
      $YYexit,
      $yyparse,
      $peek_val,
      $is_current_lookahead,
      $parse_error
    } as dynamic;
    
    return($Stdlib_parsing);

  }
  public static function symbol_start(dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 1, $param);
  }
  public static function symbol_end(dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 2, $param);
  }
  public static function rhs_start(dynamic $n): dynamic {
    return static::syncCall(__FUNCTION__, 3, $n);
  }
  public static function rhs_end(dynamic $n): dynamic {
    return static::syncCall(__FUNCTION__, 4, $n);
  }
  public static function symbol_start_pos(dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 5, $param);
  }
  public static function symbol_end_pos(dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 6, $param);
  }
  public static function rhs_start_pos(dynamic $n): dynamic {
    return static::syncCall(__FUNCTION__, 7, $n);
  }
  public static function rhs_end_pos(dynamic $n): dynamic {
    return static::syncCall(__FUNCTION__, 8, $n);
  }
  public static function clear_parser(dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 9, $param);
  }
  public static function yyparse(dynamic $tables, dynamic $start, dynamic $lexer, dynamic $lexbuf): dynamic {
    return static::syncCall(__FUNCTION__, 13, $tables, $start, $lexer, $lexbuf);
  }
  public static function peek_val(dynamic $env, dynamic $n): dynamic {
    return static::syncCall(__FUNCTION__, 14, $env, $n);
  }
  public static function is_current_lookahead(dynamic $tok): dynamic {
    return static::syncCall(__FUNCTION__, 15, $tok);
  }

}
/* Hashing disabled */
