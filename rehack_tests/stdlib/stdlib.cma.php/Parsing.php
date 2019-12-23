<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class Parsing {
  <<__Override, __Memoize>>
  public static function requireModule() : Vector<dynamic> {
    $joo_global_object = \Rehack\GlobalObject::get() as dynamic;
    
    $runtime = $joo_global_object->jsoo_runtime;
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
    $cst_Parsing_YYexit = $string("Parsing.YYexit");
    $cst_Parsing_Parse_error = $string("Parsing.Parse_error");
    $Obj =  Obj::requireModule ();
    $Array =  Array_::requireModule ();
    $Lexing =  Lexing::requireModule ();
    $YYexit = Vector{248, $cst_Parsing_YYexit, $caml_fresh_oo_id(0)} as dynamic;
    $Parse_error = Vector{248, $cst_Parsing_Parse_error, $caml_fresh_oo_id(0)} as dynamic;
    $env = Vector{
      0,
      $caml_make_vect(100, 0),
      $caml_make_vect(100, 0),
      $caml_make_vect(100, $Lexing[1]),
      $caml_make_vect(100, $Lexing[1]),
      100,
      0,
      0,
      0,
      $Lexing[1],
      $Lexing[1],
      0,
      0,
      0,
      0,
      0,
      0
    } as dynamic;
    $grow_stacks = (dynamic $param) ==> {
      $oldsize = $env[5];
      $newsize = (int) ($oldsize * 2);
      $new_s = $caml_make_vect($newsize, 0);
      $new_v = $caml_make_vect($newsize, 0);
      $new_start = $caml_make_vect($newsize, $Lexing[1]);
      $new_end = $caml_make_vect($newsize, $Lexing[1]);
      $call5($Array[10], $env[1], 0, $new_s, 0, $oldsize);
      $env[1] = $new_s;
      $call5($Array[10], $env[2], 0, $new_v, 0, $oldsize);
      $env[2] = $new_v;
      $call5($Array[10], $env[3], 0, $new_start, 0, $oldsize);
      $env[3] = $new_start;
      $call5($Array[10], $env[4], 0, $new_end, 0, $oldsize);
      $env[4] = $new_end;
      $env[5] = $newsize;
      return 0;
    };
    $clear_parser = (dynamic $param) ==> {
      $call4($Array[9], $env[2], 0, $env[5], 0);
      $env[8] = 0;
      return 0;
    };
    $current_lookahead_fun = Vector{0, (dynamic $param) ==> {return 0;}} as dynamic;
    $yyparse = 
    (dynamic $tables, dynamic $start, dynamic $lexer, dynamic $lexbuf) ==> {
      $arg = null;
      $cmd = null;
      $match = null;
      $arg__0 = null;
      $arg__1 = null;
      $cmd__0 = null;
      $i_ = null;
      $j_ = null;
      $k_ = null;
      $curr_char = null;
      $v = null;
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
      try {
        $cmd = 0;
        $arg = 0;
        for (;;) {
          $match = $runtime["caml_parse_engine"]($tables, $env, $cmd, $arg);
          $continue_label = null;
          switch($match) {
            // FALLTHROUGH
            case 0:
              $arg__0 = $call1($lexer, $lexbuf);
              $env[9] = $lexbuf[11];
              $env[10] = $lexbuf[12];
              $cmd = 1;
              $arg = $arg__0;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 1:
              throw $caml_wrap_thrown_exception($Parse_error) as \Throwable;
            // FALLTHROUGH
            case 2:
              $grow_stacks(0);
              $cmd = 2;
              $arg = 0;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 3:
              $grow_stacks(0);
              $cmd = 3;
              $arg = 0;
              $continue_label = "#";break;
            // FALLTHROUGH
            case 4:
              try {
                $i_ = $env[13];
                $j_ =
                  $call1($caml_check_bound($tables[1], $i_)[$i_ + 1], $env);
                $k_ = 4;
                $cmd__0 = $k_;
                $arg__1 = $j_;
              }
              catch(\Throwable $m_) {
                $m_ = $runtime["caml_wrap_exception"]($m_);
                if ($m_ !== $Parse_error) {
                  throw $caml_wrap_thrown_exception_reraise($m_) as \Throwable;
                }
                $cmd__0 = 5;
                $arg__1 = 0;
              }
              $cmd = $cmd__0;
              $arg = $arg__1;
              $continue_label = "#";break;
            // FALLTHROUGH
            default:
              $call1($tables[14], $cst_syntax_error);
              $cmd = 5;
              $arg = 0;
              $continue_label = "#";break;
            }
          if ($continue_label === "#") {continue;}
        }
      }
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
          (dynamic $tok) ==> {
            $l_ = null;
            if ($call1($Obj[1], $tok)) {
              $l_ = $runtime["caml_obj_tag"]($tok);
              return $caml_check_bound($tables[3], $l_)[$l_ + 1] === $curr_char
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
    $peek_val = (dynamic $env, dynamic $n) ==> {
      $h_ = (int) ($env[11] - $n);
      return $caml_check_bound($env[2], $h_)[$h_ + 1];
    };
    $symbol_start_pos = (dynamic $param) ==> {
      $e_ = null;
      $st = null;
      $f_ = null;
      $en = null;
      $i__0 = null;
      $g_ = null;
      $i = $env[12];
      for (;;) {
        if (0 < $i) {
          $e_ = (int) ((int) ($env[11] - $i) + 1);
          $st = $caml_check_bound($env[3], $e_)[$e_ + 1];
          $f_ = (int) ((int) ($env[11] - $i) + 1);
          $en = $caml_check_bound($env[4], $f_)[$f_ + 1];
          if ($runtime["caml_notequal"]($st, $en)) {return $st;}
          $i__0 = (int) ($i + -1);
          $i = $i__0;
          continue;
        }
        $g_ = $env[11];
        return $caml_check_bound($env[4], $g_)[$g_ + 1];
      }
    };
    $symbol_end_pos = (dynamic $param) ==> {
      $d_ = $env[11];
      return $caml_check_bound($env[4], $d_)[$d_ + 1];
    };
    $rhs_start_pos = (dynamic $n) ==> {
      $c_ = (int) ($env[11] - (int) ($env[12] - $n));
      return $caml_check_bound($env[3], $c_)[$c_ + 1];
    };
    $rhs_end_pos = (dynamic $n) ==> {
      $b_ = (int) ($env[11] - (int) ($env[12] - $n));
      return $caml_check_bound($env[4], $b_)[$b_ + 1];
    };
    $symbol_start = (dynamic $param) ==> {return $symbol_start_pos(0)[4];};
    $symbol_end = (dynamic $param) ==> {return $symbol_end_pos(0)[4];};
    $rhs_start = (dynamic $n) ==> {return $rhs_start_pos($n)[4];};
    $rhs_end = (dynamic $n) ==> {return $rhs_end_pos($n)[4];};
    $is_current_lookahead = (dynamic $tok) ==> {
      return $call1($current_lookahead_fun[1], $tok);
    };
    $parse_error = (dynamic $param) ==> {return 0;};
    $Parsing = Vector{
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
      (dynamic $a_) ==> {return $runtime["caml_set_parser_trace"]($a_);},
      $YYexit,
      $yyparse,
      $peek_val,
      $is_current_lookahead,
      $parse_error
    } as dynamic;
    
     return ($Parsing);

  }
  public static function symbol_start(dynamic $param): dynamic {
    return static::callRehackFunction(static::requireModule()[1], varray[$param]);
  }
  public static function symbol_end(dynamic $param): dynamic {
    return static::callRehackFunction(static::requireModule()[2], varray[$param]);
  }
  public static function rhs_start(dynamic $n): dynamic {
    return static::callRehackFunction(static::requireModule()[3], varray[$n]);
  }
  public static function rhs_end(dynamic $n): dynamic {
    return static::callRehackFunction(static::requireModule()[4], varray[$n]);
  }
  public static function symbol_start_pos(dynamic $param): dynamic {
    return static::callRehackFunction(static::requireModule()[5], varray[$param]);
  }
  public static function symbol_end_pos(dynamic $param): dynamic {
    return static::callRehackFunction(static::requireModule()[6], varray[$param]);
  }
  public static function rhs_start_pos(dynamic $n): dynamic {
    return static::callRehackFunction(static::requireModule()[7], varray[$n]);
  }
  public static function rhs_end_pos(dynamic $n): dynamic {
    return static::callRehackFunction(static::requireModule()[8], varray[$n]);
  }
  public static function clear_parser(dynamic $param): dynamic {
    return static::callRehackFunction(static::requireModule()[9], varray[$param]);
  }
  public static function yyparse(dynamic $tables, dynamic $start, dynamic $lexer, dynamic $lexbuf): dynamic {
    return static::callRehackFunction(static::requireModule()[13], varray[$tables, $start, $lexer, $lexbuf]);
  }
  public static function peek_val(dynamic $env, dynamic $n): dynamic {
    return static::callRehackFunction(static::requireModule()[14], varray[$env, $n]);
  }
  public static function is_current_lookahead(dynamic $tok): dynamic {
    return static::callRehackFunction(static::requireModule()[15], varray[$tok]);
  }

}
/* Hashing disabled */
