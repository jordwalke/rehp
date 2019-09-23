<?hh
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * Parsing.php
 */

namespace Rehack;

final class Parsing {
  <<__Memoize>>
  public static function get() {
    $global_object = \Rehack\GlobalObject::get();
    $runtime = \Rehack\Runtime::get();
    /*
     * Soon, these will replace the `global_data->ModuleName`
     * pattern in the load() function.
     */
    $Array_ = Array_::get();
    $Lexing = Lexing::get();
    $Obj = Obj::get();
    Parsing::load($global_object);
    $memoized = $runtime->caml_get_global_data()->Parsing;
    return $memoized;
  }

  /**
   * Performs module load operation. May have side effects.
   */
  private static function load($joo_global_object) {
    

    $runtime = $joo_global_object->jsoo_runtime;
    $call1 = $runtime["caml_call1"];
    $call4 = $runtime["caml_call4"];
    $call5 = $runtime["caml_call5"];
    $caml_check_bound = $runtime["caml_check_bound"];
    $caml_fresh_oo_id = $runtime["caml_fresh_oo_id"];
    $caml_make_vect = $runtime["caml_make_vect"];
    $string = $runtime["caml_new_string"];
    $caml_wrap_exception = $runtime["caml_wrap_exception"];
    $global_data = $runtime["caml_get_global_data"]();
    $cst_syntax_error = $string("syntax error");
    $cst_Parsing_YYexit = $string("Parsing.YYexit");
    $cst_Parsing_Parse_error = $string("Parsing.Parse_error");
    $Obj = $global_data["Obj"];
    $Array = $global_data["Array_"];
    $Lexing = $global_data["Lexing"];
    $YYexit = Vector{248, $cst_Parsing_YYexit, $caml_fresh_oo_id(0)};
    $Parse_error = Vector{248, $cst_Parsing_Parse_error, $caml_fresh_oo_id(0)};
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
    };
    $grow_stacks = function(dynamic $param) use ($Array,$Lexing,$call5,$caml_make_vect,$env) {
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
    $clear_parser = function(dynamic $param) use ($Array,$call4,$env) {
      $call4($Array[9], $env[2], 0, $env[5], 0);
      $env[8] = 0;
      return 0;
    };
    $current_lookahead_fun = Vector{0, function(dynamic $param) {return 0;}};
    $yyparse = function
    (dynamic $tables, dynamic $start, dynamic $lexer, dynamic $lexbuf) use ($Obj,$Parse_error,$YYexit,$call1,$caml_check_bound,$caml_wrap_exception,$cst_syntax_error,$current_lookahead_fun,$env,$grow_stacks,$runtime) {
      $loop = function(dynamic $cmd, dynamic $arg) use ($Parse_error,$call1,$caml_check_bound,$caml_wrap_exception,$cst_syntax_error,$env,$grow_stacks,$lexbuf,$lexer,$runtime,$tables) {
        $cmd__0 = $cmd;
        $arg__0 = $arg;
        for (;;) {
          $match = $runtime["caml_parse_engine"](
            $tables,
            $env,
            $cmd__0,
            $arg__0
          );
          switch($match) {
            // FALLTHROUGH
            case 0:
              $arg__1 = $call1($lexer, $lexbuf);
              $env[9] = $lexbuf[11];
              $env[10] = $lexbuf[12];
              $cmd__0 = 1;
              $arg__0 = $arg__1;
              continue;
            // FALLTHROUGH
            case 1:
              throw $runtime["caml_wrap_thrown_exception"]($Parse_error) as \Throwable;
            // FALLTHROUGH
            case 2:
              $grow_stacks(0);
              $cmd__0 = 2;
              $arg__0 = 0;
              continue;
            // FALLTHROUGH
            case 3:
              $grow_stacks(0);
              $cmd__0 = 3;
              $arg__0 = 0;
              continue;
            // FALLTHROUGH
            case 4:
              try {
                $m = $env[13];
                $n = $call1($caml_check_bound($tables[1], $m)[$m + 1], $env);
                $o = 4;
                $cmd__1 = $o;
                $arg__2 = $n;
              }
              catch(\Throwable $p) {
                $p = $caml_wrap_exception($p);
                if ($p !== $Parse_error) {
                  throw $runtime["caml_wrap_thrown_exception_reraise"]($p) as \Throwable;
                }
                $k = 0;
                $l = 5;
                $cmd__1 = $l;
                $arg__2 = $k;
              }
              $cmd__0 = $cmd__1;
              $arg__0 = $arg__2;
              continue;
            // FALLTHROUGH
            default:
              $call1($tables[14], $cst_syntax_error);
              $cmd__0 = 5;
              $arg__0 = 0;
              continue;
            }
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
      try {$i = $loop(0, 0);return $i;}
      catch(\Throwable $exn) {
        $exn = $caml_wrap_exception($exn);
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
          function(dynamic $tok) use ($Obj,$call1,$caml_check_bound,$curr_char,$runtime,$tables) {
            if ($call1($Obj[1], $tok)) {
              $j = $runtime["caml_obj_tag"]($tok);
              return $caml_check_bound($tables[3], $j)[$j + 1] === $curr_char
                ? 1
                : (0);
            }
            return $caml_check_bound($tables[2], $tok)[$tok + 1] === $curr_char
              ? 1
              : (0);
          };
        throw $runtime["caml_wrap_thrown_exception_reraise"]($exn) as \Throwable;
      }
    };
    $peek_val = function(dynamic $env, dynamic $n) use ($caml_check_bound) {
      $h = (int) ($env[11] - $n);
      return $caml_check_bound($env[2], $h)[$h + 1];
    };
    $symbol_start_pos = function(dynamic $param) use ($caml_check_bound,$env,$runtime) {
      $loop = function(dynamic $i) use ($caml_check_bound,$env,$runtime) {
        $i__0 = $i;
        for (;;) {
          if (0 < $i__0) {
            $e = (int) ((int) ($env[11] - $i__0) + 1);
            $st = $caml_check_bound($env[3], $e)[$e + 1];
            $f = (int) ((int) ($env[11] - $i__0) + 1);
            $en = $caml_check_bound($env[4], $f)[$f + 1];
            if ($runtime["caml_notequal"]($st, $en)) {return $st;}
            $i__1 = (int) ($i__0 + -1);
            $i__0 = $i__1;
            continue;
          }
          $g = $env[11];
          return $caml_check_bound($env[4], $g)[$g + 1];
        }
      };
      return $loop($env[12]);
    };
    $symbol_end_pos = function(dynamic $param) use ($caml_check_bound,$env) {
      $d = $env[11];
      return $caml_check_bound($env[4], $d)[$d + 1];
    };
    $rhs_start_pos = function(dynamic $n) use ($caml_check_bound,$env) {
      $c = (int) ($env[11] - (int) ($env[12] - $n));
      return $caml_check_bound($env[3], $c)[$c + 1];
    };
    $rhs_end_pos = function(dynamic $n) use ($caml_check_bound,$env) {
      $b = (int) ($env[11] - (int) ($env[12] - $n));
      return $caml_check_bound($env[4], $b)[$b + 1];
    };
    $symbol_start = function(dynamic $param) use ($symbol_start_pos) {
      return $symbol_start_pos(0)[4];
    };
    $symbol_end = function(dynamic $param) use ($symbol_end_pos) {
      return $symbol_end_pos(0)[4];
    };
    $rhs_start = function(dynamic $n) use ($rhs_start_pos) {
      return $rhs_start_pos($n)[4];
    };
    $rhs_end = function(dynamic $n) use ($rhs_end_pos) {
      return $rhs_end_pos($n)[4];
    };
    $is_current_lookahead = function(dynamic $tok) use ($call1,$current_lookahead_fun) {
      return $call1($current_lookahead_fun[1], $tok);
    };
    $parse_error = function(dynamic $param) {return 0;};
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
      function(dynamic $a) use ($runtime) {
        return $runtime["caml_set_parser_trace"]($a);
      },
      $YYexit,
      $yyparse,
      $peek_val,
      $is_current_lookahead,
      $parse_error
    };
    
    $runtime["caml_register_global"](7, $Parsing, "Parsing");

  }
}

/*____hashes compiler:hashing-disabled inputs:hashing-disabled bytecode:hashing-disabled*/
