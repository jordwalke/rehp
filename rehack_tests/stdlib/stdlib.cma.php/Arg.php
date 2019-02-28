<?hh
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * Arg.php
 */

namespace Rehack;

final class Arg {
  <<__Memoize>>
  public static function get() {
    $global_object = \Rehack\GlobalObject::get();
    $runtime = \Rehack\Runtime::get();
    /*
     * Soon, these will replace the `global_data->ModuleName`
     * pattern in the load() function.
     */
    $Array_ = Array_::get();
    $Buffer = Buffer::get();
    $List_ = List_::get();
    $Pervasives = Pervasives::get();
    $Printf = Printf::get();
    $String_ = String_::get();
    $Sys = Sys::get();
    $Invalid_argument = Invalid_argument::get();
    $Failure = Failure::get();
    $Not_found = Not_found::get();
    $End_of_file = End_of_file::get();
    Arg::load($global_object);
    $memoized = $runtime->caml_get_global_data()->Arg;
    return $memoized;
  }

  /**
   * Performs module load operation. May have side effects.
   */
  private static function load($joo_global_object) {
    

    $runtime = $joo_global_object->jsoo_runtime;
    $caml_arity_test = $runtime->caml_arity_test;
    $ArrayLiteral = $runtime->ArrayLiteral;
    $caml_check_bound = $runtime->caml_check_bound;
    $caml_equal = $runtime->caml_equal;
    $caml_fresh_oo_id = $runtime->caml_fresh_oo_id;
    $caml_ml_string_length = $runtime->caml_ml_string_length;
    $caml_new_string = $runtime->caml_new_string;
    $caml_string_get = $runtime->caml_string_get;
    $caml_string_notequal = $runtime->caml_string_notequal;
    $caml_wrap_exception = $runtime->caml_wrap_exception;
    $caml_call1 = function($f, $a0) use ($ArrayLiteral,$caml_arity_test,$runtime) {
      return $caml_arity_test($f) == 1
        ? $f($a0)
        : ($runtime->caml_call_gen($f, $ArrayLiteral($a0)));
    };
    $caml_call2 = function($f, $a0, $a1) use ($ArrayLiteral,$caml_arity_test,$runtime) {
      return $caml_arity_test($f) == 2
        ? $f($a0, $a1)
        : ($runtime->caml_call_gen($f, $ArrayLiteral($a0, $a1)));
    };
    $caml_call3 = function($f, $a0, $a1, $a2) use ($ArrayLiteral,$caml_arity_test,$runtime) {
      return $caml_arity_test($f) == 3
        ? $f($a0, $a1, $a2)
        : ($runtime->caml_call_gen($f, $ArrayLiteral($a0, $a1, $a2)));
    };
    $caml_call4 = function($f, $a0, $a1, $a2, $a3) use ($ArrayLiteral,$caml_arity_test,$runtime) {
      return $caml_arity_test($f) == 4
        ? $f($a0, $a1, $a2, $a3)
        : ($runtime->caml_call_gen($f, $ArrayLiteral($a0, $a1, $a2, $a3)));
    };
    $caml_call5 = function($f, $a0, $a1, $a2, $a3, $a4) use ($ArrayLiteral,$caml_arity_test,$runtime) {
      return $caml_arity_test($f) == 5
        ? $f($a0, $a1, $a2, $a3, $a4)
        : ($runtime->caml_call_gen($f, $ArrayLiteral($a0, $a1, $a2, $a3, $a4)));
    };
    $caml_call6 = function($f, $a0, $a1, $a2, $a3, $a4, $a5) use ($ArrayLiteral,$caml_arity_test,$runtime) {
      return $caml_arity_test($f) == 6
        ? $f($a0, $a1, $a2, $a3, $a4, $a5)
        : ($runtime->caml_call_gen(
         $f,
         $ArrayLiteral($a0, $a1, $a2, $a3, $a4, $a5)
       ));
    };
    $global_data = $runtime->caml_get_global_data();
    $cst__6 = $caml_new_string("");
    $cst__7 = $caml_new_string("\n");
    $cst_a_boolean = $caml_new_string("a boolean");
    $cst_an_integer = $caml_new_string("an integer");
    $cst_an_integer__0 = $caml_new_string("an integer");
    $cst_a_float = $caml_new_string("a float");
    $cst_a_float__0 = $caml_new_string("a float");
    $cst__3 = $caml_new_string("");
    $cst__4 = $caml_new_string(" ");
    $cst__5 = $caml_new_string("");
    $cst_one_of = $caml_new_string("one of: ");
    $cst_Arg_Expand_is_is_only_allowed_with_Arg_parse_and_expand_argv_dynamic = $caml_new_string(
      "Arg.Expand is is only allowed with Arg.parse_and_expand_argv_dynamic"
    );
    $cst_no_argument = $caml_new_string("no argument");
    $cst__2 = $caml_new_string("(?)");
    $cst_help__3 = $caml_new_string("--help");
    $cst_help__4 = $caml_new_string("-help");
    $cst_help__2 = $caml_new_string("-help");
    $cst_Display_this_list_of_options = $caml_new_string(
      " Display this list of options"
    );
    $cst_help = $caml_new_string("-help");
    $cst_help__1 = $caml_new_string("--help");
    $cst_Display_this_list_of_options__0 = $caml_new_string(
      " Display this list of options"
    );
    $cst_help__0 = $caml_new_string("--help");
    $cst = $caml_new_string("}");
    $cst__0 = $caml_new_string("|");
    $cst__1 = $caml_new_string("{");
    $cst_none = $caml_new_string("<none>");
    $cst_Arg_Bad = $caml_new_string("Arg.Bad");
    $cst_Arg_Help = $caml_new_string("Arg.Help");
    $cst_Arg_Stop = $caml_new_string("Arg.Stop");
    $Not_found = $global_data->Not_found;
    $Printf = $global_data->Printf;
    $Pervasives = $global_data->Pervasives;
    $Array = $global_data->Array_;
    $Buffer = $global_data->Buffer;
    $End_of_file = $global_data->End_of_file;
    $List = $global_data->List_;
    $String = $global_data->String_;
    $Sys = $global_data->Sys;
    $Invalid_argument = $global_data->Invalid_argument;
    $Failure = $global_data->Failure;
    $nw = R(0, R(2, 0, R(0, 0)), $caml_new_string("%s%c"));
    $nq = R(0, R(2, 0, 0), $caml_new_string("%s"));
    $nr = R(0, R(2, 0, 0), $caml_new_string("%s"));
    $no = R(0, R(2, 0, 0), $caml_new_string("%s"));
    $np = R(0, R(2, 0, 0), $caml_new_string("%s"));
    $nm = R(0, R(2, 0, 0), $caml_new_string("%s"));
    $nn = R(0, R(2, 0, 0), $caml_new_string("%s"));
    $ng = R(
      0,
      R(
        2,
        0,
        R(
          11,
          $caml_new_string(": unknown option '"),
          R(2, 0, R(11, $caml_new_string("'.\n"), 0))
        )
      ),
      $caml_new_string("%s: unknown option '%s'.\n")
    );
    $nj = R(
      0,
      R(
        2,
        0,
        R(
          11,
          $caml_new_string(": wrong argument '"),
          R(
            2,
            0,
            R(
              11,
              $caml_new_string("'; option '"),
              R(
                2,
                0,
                R(
                  11,
                  $caml_new_string("' expects "),
                  R(2, 0, R(11, $caml_new_string(".\n"), 0))
                )
              )
            )
          )
        )
      ),
      $caml_new_string("%s: wrong argument '%s'; option '%s' expects %s.\n")
    );
    $nk = R(
      0,
      R(
        2,
        0,
        R(
          11,
          $caml_new_string(": option '"),
          R(2, 0, R(11, $caml_new_string("' needs an argument.\n"), 0))
        )
      ),
      $caml_new_string("%s: option '%s' needs an argument.\n")
    );
    $nl = R(
      0,
      R(
        2,
        0,
        R(
          11,
          $caml_new_string(": "),
          R(2, 0, R(11, $caml_new_string(".\n"), 0))
        )
      ),
      $caml_new_string("%s: %s.\n")
    );
    $nh = R(0, $caml_new_string("-help"));
    $ni = R(0, $caml_new_string("--help"));
    $nf = R(0, R(2, 0, 0), $caml_new_string("%s"));
    $ne = R(0, R(2, 0, R(12, 10, 0)), $caml_new_string("%s\n"));
    $nd = R(0, $caml_new_string("-help"));
    $nb = R(
      0,
      R(11, $caml_new_string("  "), R(2, 0, R(12, 32, R(2, 0, R(12, 10, 0))))),
      $caml_new_string("  %s %s\n")
    );
    $nc = R(
      0,
      R(
        11,
        $caml_new_string("  "),
        R(2, 0, R(12, 32, R(2, 0, R(2, 0, R(12, 10, 0)))))
      ),
      $caml_new_string("  %s %s%s\n")
    );
    $Bad = V(248, $cst_Arg_Bad, $caml_fresh_oo_id(0));
    $Help = V(248, $cst_Arg_Help, $caml_fresh_oo_id(0));
    $Stop = V(248, $cst_Arg_Stop, $caml_fresh_oo_id(0));
    $assoc3 = function($x, $l) use ($Not_found,$caml_equal,$runtime) {
      $l__0 = $l;
      for (;;) {
        if ($l__0) {
          $t = $l__0[2];
          $match = $l__0[1];
          $y2 = $match[2];
          $y1 = $match[1];
          if ($caml_equal($y1, $x)) {return $y2;}
          $l__0 = $t;
          continue;
        }
        throw $runtime->caml_wrap_thrown_exception($Not_found);
      }
    };
    $split = function($s) use ($String,$caml_call2,$caml_call3,$caml_ml_string_length) {
      $i = $caml_call2($String[14], $s, 61);
      $len = $caml_ml_string_length($s);
      $ow = $caml_call3($String[4], $s, $i + 1 | 0, $len - ($i + 1 | 0) | 0);
      return V(0, $caml_call3($String[4], $s, 0, $i), $ow);
    };
    $make_symlist = function($prefix, $sep, $suffix, $l) use ($List,$Pervasives,$caml_call2,$caml_call3,$cst_none) {
      if ($l) {
        $t = $l[2];
        $h = $l[1];
        $os = $caml_call2($Pervasives[16], $prefix, $h);
        $ot = function($x, $y) use ($Pervasives,$caml_call2,$sep) {
          $ov = $caml_call2($Pervasives[16], $sep, $y);
          return $caml_call2($Pervasives[16], $x, $ov);
        };
        $ou = $caml_call3($List[20], $ot, $os, $t);
        return $caml_call2($Pervasives[16], $ou, $suffix);
      }
      return $cst_none;
    };
    $print_spec = function($buf, $param) use ($Printf,$caml_call4,$caml_call5,$caml_ml_string_length,$cst,$cst__0,$cst__1,$make_symlist,$nb,$nc) {
      $doc = $param[3];
      $spec = $param[2];
      $key = $param[1];
      $oq = 0 < $caml_ml_string_length($doc) ? 1 : (0);
      if ($oq) {
        if (11 === $spec[0]) {
          $l = $spec[1];
          $or = $make_symlist($cst__1, $cst__0, $cst, $l);
          return $caml_call5($Printf[5], $buf, $nc, $key, $or, $doc);
        }
        return $caml_call4($Printf[5], $buf, $nb, $key, $doc);
      }
      return $oq;
    };
    $help_action = function($param) use ($Stop,$nd,$runtime) {
      throw $runtime->caml_wrap_thrown_exception(V(0, $Stop, $nd));
    };
    $add_help = function($speclist) use ($Not_found,$Pervasives,$assoc3,$caml_call2,$caml_wrap_exception,$cst_Display_this_list_of_options,$cst_Display_this_list_of_options__0,$cst_help,$cst_help__0,$cst_help__1,$cst_help__2,$help_action,$runtime) {
      try {$assoc3($cst_help__2, $speclist);$on = 0;$oj = $on;}
      catch(\Throwable $op) {
        $op = $caml_wrap_exception($op);
        if ($op !== $Not_found) {
          throw $runtime->caml_wrap_thrown_exception_reraise($op);
        }
        $oi = V(
          0,
          V(
            0,
            $cst_help,
            V(0, $help_action),
            $cst_Display_this_list_of_options
          ),
          0
        );
        $oj = $oi;
      }
      try {$assoc3($cst_help__1, $speclist);$om = 0;$add2 = $om;}
      catch(\Throwable $oo) {
        $oo = $caml_wrap_exception($oo);
        if ($oo !== $Not_found) {
          throw $runtime->caml_wrap_thrown_exception_reraise($oo);
        }
        $ok = V(
          0,
          V(
            0,
            $cst_help__0,
            V(0, $help_action),
            $cst_Display_this_list_of_options__0
          ),
          0
        );
        $add2 = $ok;
      }
      $ol = $caml_call2($Pervasives[25], $oj, $add2);
      return $caml_call2($Pervasives[25], $speclist, $ol);
    };
    $usage_b = function($buf, $speclist, $errmsg) use ($List,$Printf,$add_help,$caml_call2,$caml_call3,$ne,$print_spec) {
      $caml_call3($Printf[5], $buf, $ne, $errmsg);
      $of = $add_help($speclist);
      $og = function($oh) use ($buf,$print_spec) {
        return $print_spec($buf, $oh);
      };
      return $caml_call2($List[15], $og, $of);
    };
    $usage_string = function($speclist, $errmsg) use ($Buffer,$caml_call1,$usage_b) {
      $b = $caml_call1($Buffer[1], 200);
      $usage_b($b, $speclist, $errmsg);
      return $caml_call1($Buffer[2], $b);
    };
    $usage = function($speclist, $errmsg) use ($Printf,$caml_call2,$nf,$usage_string) {
      $oe = $usage_string($speclist, $errmsg);
      return $caml_call2($Printf[3], $nf, $oe);
    };
    $current = V(0, 0);
    $bool_of_string_opt = function($x) use ($Invalid_argument,$Pervasives,$caml_call1,$caml_wrap_exception,$runtime) {
      try {$oc = V(0, $caml_call1($Pervasives[19], $x));return $oc;}
      catch(\Throwable $od) {
        $od = $caml_wrap_exception($od);
        if ($od[1] === $Invalid_argument) {return 0;}
        throw $runtime->caml_wrap_thrown_exception_reraise($od);
      }
    };
    $int_of_string_opt = function($x) use ($Failure,$caml_wrap_exception,$runtime) {
      try {$oa = V(0, $runtime->caml_int_of_string($x));return $oa;}
      catch(\Throwable $ob) {
        $ob = $caml_wrap_exception($ob);
        if ($ob[1] === $Failure) {return 0;}
        throw $runtime->caml_wrap_thrown_exception_reraise($ob);
      }
    };
    $float_of_string_opt = function($x) use ($Failure,$caml_wrap_exception,$runtime) {
      try {$n9 = V(0, $runtime->caml_float_of_string($x));return $n9;}
      catch(\Throwable $n_) {
        $n_ = $caml_wrap_exception($n_);
        if ($n_[1] === $Failure) {return 0;}
        throw $runtime->caml_wrap_thrown_exception_reraise($n_);
      }
    };
    $parse_and_expand_argv_dynamic_aux = function
    ($allow_expand, $current, $argv, $speclist, $anonfun, $errmsg) use ($Array,$Bad,$Buffer,$Help,$Invalid_argument,$List,$Not_found,$Pervasives,$Printf,$Stop,$assoc3,$bool_of_string_opt,$caml_call1,$caml_call2,$caml_call3,$caml_call4,$caml_call6,$caml_check_bound,$caml_equal,$caml_ml_string_length,$caml_string_get,$caml_string_notequal,$caml_wrap_exception,$cst_Arg_Expand_is_is_only_allowed_with_Arg_parse_and_expand_argv_dynamic,$cst__2,$cst__3,$cst__4,$cst__5,$cst_a_boolean,$cst_a_float,$cst_a_float__0,$cst_an_integer,$cst_an_integer__0,$cst_help__3,$cst_help__4,$cst_no_argument,$cst_one_of,$float_of_string_opt,$int_of_string_opt,$make_symlist,$ng,$nh,$ni,$nj,$nk,$nl,$runtime,$split,$usage_b) {
      $initpos = $current[1];
      $convert_error = function($error) use ($Bad,$Buffer,$Help,$Printf,$argv,$caml_call1,$caml_call4,$caml_call6,$caml_check_bound,$caml_equal,$caml_string_notequal,$cst__2,$cst_help__3,$cst_help__4,$errmsg,$initpos,$ng,$nh,$ni,$nj,$nk,$nl,$speclist,$usage_b) {
        $b = $caml_call1($Buffer[1], 200);
        $progname = $initpos < $argv[1]->length - 1
          ? $caml_check_bound($argv[1], $initpos)[$initpos + 1]
          : ($cst__2);
        switch($error[0]) {
          // FALLTHROUGH
          case 0:
            $n8 = $error[1];
            if ($caml_string_notequal($n8, $cst_help__3)) {
              if ($caml_string_notequal($n8, $cst_help__4)) {
                $caml_call4($Printf[5], $b, $ng, $progname, $n8);
              }
            }
            break;
          // FALLTHROUGH
          case 1:
            $expected = $error[3];
            $arg = $error[2];
            $opt = $error[1];
            $caml_call6($Printf[5], $b, $nj, $progname, $arg, $opt, $expected);
            break;
          // FALLTHROUGH
          case 2:
            $s = $error[1];
            $caml_call4($Printf[5], $b, $nk, $progname, $s);
            break;
          // FALLTHROUGH
          default:
            $s__0 = $error[1];
            $caml_call4($Printf[5], $b, $nl, $progname, $s__0);
          }
        $usage_b($b, $speclist[1], $errmsg);
        if (! $caml_equal($error, $nh)) {
          if (! $caml_equal($error, $ni)) {
            return V(0, $Bad, $caml_call1($Buffer[2], $b));
          }
        }
        return V(0, $Help, $caml_call1($Buffer[2], $b));
      };
      $current[1] += 1;
      for (;;) {
        if ($current[1] < $argv[1]->length - 1) {
          try {
            $n0 = $current[1];
            $s = $caml_check_bound($argv[1], $n0)[$n0 + 1];
            if (1 <= $caml_ml_string_length($s)) {
              if (45 === $caml_string_get($s, 0)) {
                try {
                  $follow__1 = 0;
                  $n2 = $assoc3($s, $speclist[1]);
                  $action = $n2;
                  $follow__0 = $follow__1;
                }
                catch(\Throwable $n6) {
                  $n6 = $caml_wrap_exception($n6);
                  if ($n6 !== $Not_found) {
                    throw $runtime->caml_wrap_thrown_exception_reraise($n6);
                  }
                  try {
                    $match = $split($s);
                    $arg = $match[2];
                    $keyword = $match[1];
                    $follow = V(0, $arg);
                    $n1 = $assoc3($keyword, $speclist[1]);
                  }
                  catch(\Throwable $n7) {
                    $n7 = $caml_wrap_exception($n7);
                    if ($n7 === $Not_found) {
                      throw $runtime->caml_wrap_thrown_exception(
                              V(0, $Stop, V(0, $s))
                            );
                    }
                    throw $runtime->caml_wrap_thrown_exception_reraise($n7);
                  }
                  $action = $n1;
                  $follow__0 = $follow;
                }
                $no_arg__0 = function($s, $follow) use ($Stop,$cst_no_argument,$runtime) {
                  $no_arg = function($param) use ($Stop,$cst_no_argument,$follow,$runtime,$s) {
                    if ($follow) {
                      $arg = $follow[1];
                      throw $runtime->caml_wrap_thrown_exception(
                              V(0, $Stop, V(1, $s, $arg, $cst_no_argument))
                            );
                    }
                    return 0;
                  };
                  return $no_arg;
                };
                $no_arg = $no_arg__0($s, $follow__0);
                $get_arg__0 = function($s, $follow) use ($Stop,$argv,$caml_check_bound,$current,$runtime) {
                  $get_arg = function($param) use ($Stop,$argv,$caml_check_bound,$current,$follow,$runtime,$s) {
                    if ($follow) {$arg = $follow[1];return $arg;}
                    if (($current[1] + 1 | 0) < $argv[1]->length - 1) {
                      $n5 = $current[1] + 1 | 0;
                      return $caml_check_bound($argv[1], $n5)[$n5 + 1];
                    }
                    throw $runtime->caml_wrap_thrown_exception(
                            V(0, $Stop, V(2, $s))
                          );
                  };
                  return $get_arg;
                };
                $get_arg = $get_arg__0($s, $follow__0);
                $consume_arg__0 = function($follow) use ($current) {
                  $consume_arg = function($param) use ($current,$follow) {
                    return $follow ? 0 : (($current[1] += 1) || true ? 0 : (0));
                  };
                  return $consume_arg;
                };
                $consume_arg = $consume_arg__0($follow__0);
                $treat_action__0 = function
                ($s, $no_arg, $get_arg, $consume_arg) use ($Array,$Invalid_argument,$List,$Pervasives,$Stop,$allow_expand,$argv,$bool_of_string_opt,$caml_call1,$caml_call2,$caml_call3,$caml_check_bound,$cst_Arg_Expand_is_is_only_allowed_with_Arg_parse_and_expand_argv_dynamic,$cst__3,$cst__4,$cst__5,$cst_a_boolean,$cst_a_float,$cst_a_float__0,$cst_an_integer,$cst_an_integer__0,$cst_one_of,$current,$float_of_string_opt,$int_of_string_opt,$make_symlist,$runtime) {
                  $treat_action = new Ref();
                  $_ = $treat_action->contents =
                    function($param) use ($Array,$Invalid_argument,$List,$Pervasives,$Stop,$allow_expand,$argv,$bool_of_string_opt,$caml_call1,$caml_call2,$caml_call3,$caml_check_bound,$consume_arg,$cst_Arg_Expand_is_is_only_allowed_with_Arg_parse_and_expand_argv_dynamic,$cst__3,$cst__4,$cst__5,$cst_a_boolean,$cst_a_float,$cst_a_float__0,$cst_an_integer,$cst_an_integer__0,$cst_one_of,$current,$float_of_string_opt,$get_arg,$int_of_string_opt,$make_symlist,$no_arg,$runtime,$s,$treat_action) {
                      switch($param[0]) {
                        // FALLTHROUGH
                        case 0:
                          $f = $param[1];
                          return $caml_call1($f, 0);
                        // FALLTHROUGH
                        case 1:
                          $f__0 = $param[1];
                          $arg = $get_arg(0);
                          $match = $bool_of_string_opt($arg);
                          if ($match) {
                            $s__0 = $match[1];
                            $caml_call1($f__0, $s__0);
                            return $consume_arg(0);
                          }
                          throw $runtime->caml_wrap_thrown_exception(
                                  V(0, $Stop, V(1, $s, $arg, $cst_a_boolean))
                                );
                        // FALLTHROUGH
                        case 2:
                          $r = $param[1];
                          $no_arg(0);
                          $r[1] = 1;
                          return 0;
                        // FALLTHROUGH
                        case 3:
                          $r__0 = $param[1];
                          $no_arg(0);
                          $r__0[1] = 0;
                          return 0;
                        // FALLTHROUGH
                        case 4:
                          $f__1 = $param[1];
                          $arg__0 = $get_arg(0);
                          $caml_call1($f__1, $arg__0);
                          return $consume_arg(0);
                        // FALLTHROUGH
                        case 5:
                          $r__1 = $param[1];
                          $r__1[1] = $get_arg(0);
                          return $consume_arg(0);
                        // FALLTHROUGH
                        case 6:
                          $f__2 = $param[1];
                          $arg__1 = $get_arg(0);
                          $match__0 = $int_of_string_opt($arg__1);
                          if ($match__0) {
                            $x = $match__0[1];
                            $caml_call1($f__2, $x);
                            return $consume_arg(0);
                          }
                          throw $runtime->caml_wrap_thrown_exception(
                                  V(0, $Stop, V(1, $s, $arg__1, $cst_an_integer))
                                );
                        // FALLTHROUGH
                        case 7:
                          $r__2 = $param[1];
                          $arg__2 = $get_arg(0);
                          $match__1 = $int_of_string_opt($arg__2);
                          if ($match__1) {
                            $x__0 = $match__1[1];
                            $r__2[1] = $x__0;
                            return $consume_arg(0);
                          }
                          throw $runtime->caml_wrap_thrown_exception(
                                  V(0, $Stop, V(1, $s, $arg__2, $cst_an_integer__0))
                                );
                        // FALLTHROUGH
                        case 8:
                          $f__3 = $param[1];
                          $arg__3 = $get_arg(0);
                          $match__2 = $float_of_string_opt($arg__3);
                          if ($match__2) {
                            $x__1 = $match__2[1];
                            $caml_call1($f__3, $x__1);
                            return $consume_arg(0);
                          }
                          throw $runtime->caml_wrap_thrown_exception(
                                  V(0, $Stop, V(1, $s, $arg__3, $cst_a_float))
                                );
                        // FALLTHROUGH
                        case 9:
                          $r__3 = $param[1];
                          $arg__4 = $get_arg(0);
                          $match__3 = $float_of_string_opt($arg__4);
                          if ($match__3) {
                            $x__2 = $match__3[1];
                            $r__3[1] = $x__2;
                            return $consume_arg(0);
                          }
                          throw $runtime->caml_wrap_thrown_exception(
                                  V(0, $Stop, V(1, $s, $arg__4, $cst_a_float__0))
                                );
                        // FALLTHROUGH
                        case 10:
                          $specs = $param[1];
                          return $caml_call2(
                            $List[15],
                            $treat_action->contents,
                            $specs
                          );
                        // FALLTHROUGH
                        case 11:
                          $f__4 = $param[2];
                          $symb = $param[1];
                          $arg__5 = $get_arg(0);
                          if ($caml_call2($List[31], $arg__5, $symb)) {
                            $caml_call1($f__4, $arg__5);
                            return $consume_arg(0);
                          }
                          $n3 = $make_symlist($cst__5, $cst__4, $cst__3, $symb);
                          throw $runtime->caml_wrap_thrown_exception(
                                  V(
                                    0,
                                    $Stop,
                                    V(
                                      1,
                                      $s,
                                      $arg__5,
                                      $caml_call2($Pervasives[16], $cst_one_of, $n3)
                                    )
                                  )
                                );
                        // FALLTHROUGH
                        case 12:
                          $f__5 = $param[1];
                          for (;;) {
                            if ($current[1] < ($argv[1]->length - 1 + -1 | 0)) {
                              $n4 = $current[1] + 1 | 0;
                              $caml_call1($f__5, $caml_check_bound($argv[1], $n4)[$n4 + 1]
                              );
                              $consume_arg(0);
                              continue;
                            }
                            return 0;
                          }
                        // FALLTHROUGH
                        default:
                          $f__6 = $param[1];
                          if (1 - $allow_expand) {
                            throw $runtime->caml_wrap_thrown_exception(
                                    V(
                                      0,
                                      $Invalid_argument,
                                      $cst_Arg_Expand_is_is_only_allowed_with_Arg_parse_and_expand_argv_dynamic
                                    )
                                  );
                          }
                          $arg__6 = $get_arg(0);
                          $newarg = $caml_call1($f__6, $arg__6);
                          $consume_arg(0);
                          $before = $caml_call3(
                            $Array[7],
                            $argv[1],
                            0,
                            $current[1] + 1 |
                              0
                          );
                          $after = $caml_call3(
                            $Array[7],
                            $argv[1],
                            $current[1] + 1 |
                              0,
                            ($argv[1]->length - 1 - $current[1] | 0) + -1 |
                              0
                          );
                          $argv[1] =
                            $caml_call1(
                              $Array[6],
                              V(0, $before, V(0, $newarg, V(0, $after, 0)))
                            );
                          return 0;
                        }
                    };
                  return $treat_action->contents;
                };
                $treat_action = $treat_action__0(
                  $s,
                  $no_arg,
                  $get_arg,
                  $consume_arg
                );
                $treat_action($action);
                $switch__0 = 1;
              }
              else {$switch__0 = 0;}
            }
            else {$switch__0 = 0;}
            if (! $switch__0) {$caml_call1($anonfun, $s);}
          }
          catch(\Throwable $exn) {
            $exn = $caml_wrap_exception($exn);
            if ($exn[1] === $Bad) {
              $m = $exn[2];
              throw $runtime->caml_wrap_thrown_exception(
                      $convert_error(V(3, $m))
                    );
            }
            if ($exn[1] === $Stop) {
              $e = $exn[2];
              throw $runtime->caml_wrap_thrown_exception($convert_error($e));
            }
            throw $runtime->caml_wrap_thrown_exception_reraise($exn);
          }
          $current[1] += 1;
          continue;
        }
        return 0;
      }
    };
    $parse_and_expand_argv_dynamic = function
    ($current, $argv, $speclist, $anonfun, $errmsg) use ($parse_and_expand_argv_dynamic_aux) {
      return $parse_and_expand_argv_dynamic_aux(
        1,
        $current,
        $argv,
        $speclist,
        $anonfun,
        $errmsg
      );
    };
    $parse_argv_dynamic = function($opt, $argv, $speclist, $anonfun, $errmsg) use ($current,$parse_and_expand_argv_dynamic_aux) {
      if ($opt) {
        $sth = $opt[1];
        $current__0 = $sth;
      }
      else {$current__0 = $current;}
      return $parse_and_expand_argv_dynamic_aux(
        0,
        $current__0,
        V(0, $argv),
        $speclist,
        $anonfun,
        $errmsg
      );
    };
    $parse_argv = function($opt, $argv, $speclist, $anonfun, $errmsg) use ($current,$parse_argv_dynamic) {
      if ($opt) {
        $sth = $opt[1];
        $current__0 = $sth;
      }
      else {$current__0 = $current;}
      return $parse_argv_dynamic(
        V(0, $current__0),
        $argv,
        V(0, $speclist),
        $anonfun,
        $errmsg
      );
    };
    $parse = function($l, $f, $msg) use ($Bad,$Help,$Pervasives,$Printf,$Sys,$caml_call1,$caml_call2,$caml_wrap_exception,$nm,$nn,$parse_argv,$runtime) {
      try {$nZ = $parse_argv(0, $Sys[1], $l, $f, $msg);return $nZ;}
      catch(\Throwable $exn) {
        $exn = $caml_wrap_exception($exn);
        if ($exn[1] === $Bad) {
          $msg__0 = $exn[2];
          $caml_call2($Printf[3], $nm, $msg__0);
          return $caml_call1($Pervasives[87], 2);
        }
        if ($exn[1] === $Help) {
          $msg__1 = $exn[2];
          $caml_call2($Printf[2], $nn, $msg__1);
          return $caml_call1($Pervasives[87], 0);
        }
        throw $runtime->caml_wrap_thrown_exception_reraise($exn);
      }
    };
    $parse_dynamic = function($l, $f, $msg) use ($Bad,$Help,$Pervasives,$Printf,$Sys,$caml_call1,$caml_call2,$caml_wrap_exception,$no,$np,$parse_argv_dynamic,$runtime) {
      try {$nY = $parse_argv_dynamic(0, $Sys[1], $l, $f, $msg);return $nY;}
      catch(\Throwable $exn) {
        $exn = $caml_wrap_exception($exn);
        if ($exn[1] === $Bad) {
          $msg__0 = $exn[2];
          $caml_call2($Printf[3], $no, $msg__0);
          return $caml_call1($Pervasives[87], 2);
        }
        if ($exn[1] === $Help) {
          $msg__1 = $exn[2];
          $caml_call2($Printf[2], $np, $msg__1);
          return $caml_call1($Pervasives[87], 0);
        }
        throw $runtime->caml_wrap_thrown_exception_reraise($exn);
      }
    };
    $parse_expand = function($l, $f, $msg) use ($Bad,$Help,$Pervasives,$Printf,$Sys,$caml_call1,$caml_call2,$caml_wrap_exception,$current,$nq,$nr,$parse_and_expand_argv_dynamic,$runtime) {
      try {
        $argv = V(0, $Sys[1]);
        $spec = V(0, $l);
        $current__0 = V(0, $current[1]);
        $nX = $parse_and_expand_argv_dynamic(
          $current__0,
          $argv,
          $spec,
          $f,
          $msg
        );
        return $nX;
      }
      catch(\Throwable $exn) {
        $exn = $caml_wrap_exception($exn);
        if ($exn[1] === $Bad) {
          $msg__0 = $exn[2];
          $caml_call2($Printf[3], $nq, $msg__0);
          return $caml_call1($Pervasives[87], 2);
        }
        if ($exn[1] === $Help) {
          $msg__1 = $exn[2];
          $caml_call2($Printf[2], $nr, $msg__1);
          return $caml_call1($Pervasives[87], 0);
        }
        throw $runtime->caml_wrap_thrown_exception_reraise($exn);
      }
    };
    $second_word = function($s) use ($Not_found,$String,$caml_call2,$caml_ml_string_length,$caml_string_get,$caml_wrap_exception,$runtime) {
      $len = $caml_ml_string_length($s);
      $loop = function($n) use ($caml_string_get,$len,$s) {
        $n__0 = $n;
        for (;;) {
          if ($len <= $n__0) {return $len;}
          if (32 === $caml_string_get($s, $n__0)) {
            $n__1 = $n__0 + 1 | 0;
            $n__0 = $n__1;
            continue;
          }
          return $n__0;
        }
      };
      try {$n__0 = $caml_call2($String[14], $s, 9);}
      catch(\Throwable $nV) {
        $nV = $caml_wrap_exception($nV);
        if ($nV === $Not_found) {
          try {$n = $caml_call2($String[14], $s, 32);}
          catch(\Throwable $nW) {
            $nW = $caml_wrap_exception($nW);
            if ($nW === $Not_found) {return $len;}
            throw $runtime->caml_wrap_thrown_exception_reraise($nW);
          }
          return $loop($n + 1 | 0);
        }
        throw $runtime->caml_wrap_thrown_exception_reraise($nV);
      }
      return $loop($n__0 + 1 | 0);
    };
    $max_arg_len = function($cur, $param) use ($Pervasives,$caml_call2,$caml_ml_string_length,$second_word) {
      $doc = $param[3];
      $spec = $param[2];
      $kwd = $param[1];
      if (11 === $spec[0]) {
        return $caml_call2($Pervasives[5], $cur, $caml_ml_string_length($kwd));
      }
      $nU = $caml_ml_string_length($kwd) + $second_word($doc) | 0;
      return $caml_call2($Pervasives[5], $cur, $nU);
    };
    $replace_leading_tab = function($s) use ($String,$caml_call2) {
      $seen = V(0, 0);
      $nT = function($c) use ($seen) {
        if (9 === $c) {if (! $seen[1]) {$seen[1] = 1;return 32;}}
        return $c;
      };
      return $caml_call2($String[10], $nT, $s);
    };
    $add_padding = function($len, $ksd) use ($Pervasives,$String,$caml_call2,$caml_call3,$caml_ml_string_length,$caml_string_notequal,$cst__6,$cst__7,$replace_leading_tab,$second_word) {
      $nM = $ksd[2];
      $nN = $ksd[1];
      if ($caml_string_notequal($ksd[3], $cst__6)) {
        if (11 === $nM[0]) {
          $msg__0 = $ksd[3];
          $cutcol__0 = $second_word($msg__0);
          $nQ = $caml_call2($Pervasives[5], 0, $len - $cutcol__0 | 0) + 3 | 0;
          $spaces__0 = $caml_call2($String[1], $nQ, 32);
          $nR = $replace_leading_tab($msg__0);
          $nS = $caml_call2($Pervasives[16], $spaces__0, $nR);
          return V(0, $nN, $nM, $caml_call2($Pervasives[16], $cst__7, $nS));
        }
        $msg = $ksd[3];
        $cutcol = $second_word($msg);
        $kwd_len = $caml_ml_string_length($nN);
        $diff = ($len - $kwd_len | 0) - $cutcol | 0;
        if (0 < $diff) {
          $spaces = $caml_call2($String[1], $diff, 32);
          $nO = $replace_leading_tab($msg);
          $prefix = $caml_call3($String[4], $nO, 0, $cutcol);
          $suffix = $caml_call3(
            $String[4],
            $msg,
            $cutcol,
            $caml_ml_string_length($msg) - $cutcol | 0
          );
          $nP = $caml_call2($Pervasives[16], $spaces, $suffix);
          return V(0, $nN, $nM, $caml_call2($Pervasives[16], $prefix, $nP));
        }
        return V(0, $nN, $nM, $replace_leading_tab($msg));
      }
      return $ksd;
    };
    $align = function($opt, $speclist) use ($List,$Pervasives,$add_help,$add_padding,$caml_call2,$caml_call3,$max_arg_len) {
      if ($opt) {
        $sth = $opt[1];
        $limit = $sth;
      }
      else {$limit = $Pervasives[7];}
      $completed = $add_help($speclist);
      $len = $caml_call3($List[20], $max_arg_len, 0, $completed);
      $len__0 = $caml_call2($Pervasives[4], $len, $limit);
      $nK = function($nL) use ($add_padding,$len__0) {
        return $add_padding($len__0, $nL);
      };
      return $caml_call2($List[17], $nK, $completed);
    };
    $trim_cr = function($s) use ($String,$caml_call3,$caml_ml_string_length,$caml_string_get) {
      $len = $caml_ml_string_length($s);
      if (0 < $len) {
        if (13 === $caml_string_get($s, $len + -1 | 0)) {
          return $caml_call3($String[4], $s, 0, $len + -1 | 0);
        }
      }
      return $s;
    };
    $read_aux = function($trim, $sep, $file) use ($Array,$Buffer,$End_of_file,$List,$Pervasives,$caml_call1,$caml_call2,$caml_wrap_exception,$runtime,$trim_cr) {
      $read = new Ref();
      $ic = $caml_call1($Pervasives[68], $file);
      $buf = $caml_call1($Buffer[1], 200);
      $words = V(0, 0);
      $stash = function($param) use ($Buffer,$buf,$caml_call1,$trim,$trim_cr,$words) {
        $word = $caml_call1($Buffer[2], $buf);
        $word__0 = $trim ? $trim_cr($word) : ($word);
        $words[1] = V(0, $word__0, $words[1]);
        return $caml_call1($Buffer[8], $buf);
      };
      $_ = $read->contents =
        function($param) use ($Buffer,$End_of_file,$Pervasives,$buf,$caml_call1,$caml_call2,$caml_wrap_exception,$ic,$read,$runtime,$sep,$stash) {
          try {
            $c = $caml_call1($Pervasives[70], $ic);
            $nI = $c === $sep
              ? $stash(0) || true ? $read->contents(0) : ($read->contents(0))
              : ($caml_call2($Buffer[10], $buf, $c) || true
               ? $read->contents(0)
               : ($read->contents(0)));
            return $nI;
          }
          catch(\Throwable $nJ) {
            $nJ = $caml_wrap_exception($nJ);
            if ($nJ === $End_of_file) {
              $nH = 0 < $caml_call1($Buffer[7], $buf) ? 1 : (0);
              return $nH ? $stash(0) : ($nH);
            }
            throw $runtime->caml_wrap_thrown_exception_reraise($nJ);
          }
        };
      $read->contents(0);
      $caml_call1($Pervasives[81], $ic);
      $nG = $caml_call1($List[9], $words[1]);
      return $caml_call1($Array[12], $nG);
    };
    $ns = 10;
    $nt = 1;
    $read_arg = function($nF) use ($ns,$nt,$read_aux) {
      return $read_aux($nt, $ns, $nF);
    };
    $nu = 0;
    $nv = 0;
    $read_arg0 = function($nE) use ($nu,$nv,$read_aux) {
      return $read_aux($nv, $nu, $nE);
    };
    $write_aux = function($sep, $file, $args) use ($Array,$Pervasives,$Printf,$caml_call1,$caml_call2,$caml_call4,$nw) {
      $oc = $caml_call1($Pervasives[49], $file);
      $nD = function($s) use ($Printf,$caml_call4,$nw,$oc,$sep) {
        return $caml_call4($Printf[1], $oc, $nw, $s, $sep);
      };
      $caml_call2($Array[13], $nD, $args);
      return $caml_call1($Pervasives[64], $oc);
    };
    $nx = 10;
    $write_arg = function($nB, $nC) use ($nx,$write_aux) {
      return $write_aux($nx, $nB, $nC);
    };
    $ny = 0;
    $write_arg0 = function($nz, $nA) use ($ny,$write_aux) {
      return $write_aux($ny, $nz, $nA);
    };
    $Arg = V(
      0,
      $parse,
      $parse_dynamic,
      $parse_argv,
      $parse_argv_dynamic,
      $parse_and_expand_argv_dynamic,
      $parse_expand,
      $Help,
      $Bad,
      $usage,
      $usage_string,
      $align,
      $current,
      $read_arg,
      $read_arg0,
      $write_arg,
      $write_arg0
    );
    
    $runtime->caml_register_global(58, $Arg, "Arg");

  }
}