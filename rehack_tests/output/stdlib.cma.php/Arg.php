<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class Arg {
  <<__Override, __Memoize>>
  public static function get() : Vector<dynamic> {
    
    $runtime = (\Rehack\GlobalObject::get() as dynamic)->jsoo_runtime;
    $call1 = $runtime["caml_call1"];
    $call2 = $runtime["caml_call2"];
    $call3 = $runtime["caml_call3"];
    $call4 = $runtime["caml_call4"];
    $call5 = $runtime["caml_call5"];
    $call6 = $runtime["caml_call6"];
    $caml_check_bound = $runtime["caml_check_bound"];
    $caml_equal = $runtime["caml_equal"];
    $caml_fresh_oo_id = $runtime["caml_fresh_oo_id"];
    $caml_ml_string_length = $runtime["caml_ml_string_length"];
    $string = $runtime["caml_new_string"];
    $caml_string_get = $runtime["caml_string_get"];
    $caml_string_notequal = $runtime["caml_string_notequal"];
    $caml_wrap_thrown_exception = $runtime["caml_wrap_thrown_exception"];
    $caml_wrap_thrown_exception_reraise = $runtime[
       "caml_wrap_thrown_exception_reraise"
     ];
    $cst__6 = $string("");
    $cst__7 = $string("\n");
    $cst_a_boolean = $string("a boolean");
    $cst_an_integer = $string("an integer");
    $cst_an_integer__0 = $string("an integer");
    $cst_a_float = $string("a float");
    $cst_a_float__0 = $string("a float");
    $cst__3 = $string("");
    $cst__4 = $string(" ");
    $cst__5 = $string("");
    $cst_one_of = $string("one of: ");
    $cst_Arg_Expand_is_is_only_allowed_with_Arg_parse_and_expand_argv_dynamic = $string(
      "Arg.Expand is is only allowed with Arg.parse_and_expand_argv_dynamic"
    );
    $cst_no_argument = $string("no argument");
    $cst__2 = $string("(?)");
    $cst_help__3 = $string("--help");
    $cst_help__4 = $string("-help");
    $cst_help__2 = $string("-help");
    $cst_Display_this_list_of_options = $string(
      " Display this list of options"
    );
    $cst_help = $string("-help");
    $cst_help__1 = $string("--help");
    $cst_Display_this_list_of_options__0 = $string(
      " Display this list of options"
    );
    $cst_help__0 = $string("--help");
    $cst = $string("}");
    $cst__0 = $string("|");
    $cst__1 = $string("{");
    $cst_none = $string("<none>");
    $cst_Arg_Bad = $string("Arg.Bad");
    $cst_Arg_Help = $string("Arg.Help");
    $cst_Arg_Stop = $string("Arg.Stop");
    $Not_found = Not_found::get();
    $Printf = Printf::get();
    $Pervasives = Pervasives::get();
    $Array = Array_::get();
    $Buffer = Buffer::get();
    $End_of_file = End_of_file::get();
    $List = List_::get();
    $String = String_::get();
    $Sys = Sys::get();
    $Invalid_argument = Invalid_argument::get();
    $Failure = Failure::get();
    $w_ = Vector{0, Vector{2, 0, Vector{0, 0}}, $string("%s%c")} as dynamic;
    $q_ = Vector{0, Vector{2, 0, 0}, $string("%s")} as dynamic;
    $r_ = Vector{0, Vector{2, 0, 0}, $string("%s")} as dynamic;
    $o_ = Vector{0, Vector{2, 0, 0}, $string("%s")} as dynamic;
    $p_ = Vector{0, Vector{2, 0, 0}, $string("%s")} as dynamic;
    $m_ = Vector{0, Vector{2, 0, 0}, $string("%s")} as dynamic;
    $n_ = Vector{0, Vector{2, 0, 0}, $string("%s")} as dynamic;
    $g_ = Vector{
      0,
      Vector{
        2,
        0,
        Vector{
          11,
          $string(": unknown option '"),
          Vector{2, 0, Vector{11, $string("'.\n"), 0}}
        }
      },
      $string("%s: unknown option '%s'.\n")
    } as dynamic;
    $j_ = Vector{
      0,
      Vector{
        2,
        0,
        Vector{
          11,
          $string(": wrong argument '"),
          Vector{
            2,
            0,
            Vector{
              11,
              $string("'; option '"),
              Vector{
                2,
                0,
                Vector{
                  11,
                  $string("' expects "),
                  Vector{2, 0, Vector{11, $string(".\n"), 0}}
                }
              }
            }
          }
        }
      },
      $string("%s: wrong argument '%s'; option '%s' expects %s.\n")
    } as dynamic;
    $k_ = Vector{
      0,
      Vector{
        2,
        0,
        Vector{
          11,
          $string(": option '"),
          Vector{2, 0, Vector{11, $string("' needs an argument.\n"), 0}}
        }
      },
      $string("%s: option '%s' needs an argument.\n")
    } as dynamic;
    $l_ = Vector{
      0,
      Vector{
        2,
        0,
        Vector{11, $string(": "), Vector{2, 0, Vector{11, $string(".\n"), 0}}}
      },
      $string("%s: %s.\n")
    } as dynamic;
    $h_ = Vector{0, $string("-help")} as dynamic;
    $i_ = Vector{0, $string("--help")} as dynamic;
    $e_ = Vector{0, Vector{2, 0, 0}, $string("%s")} as dynamic;
    $d_ = Vector{0, Vector{2, 0, Vector{12, 10, 0}}, $string("%s\n")} as dynamic;
    $c_ = Vector{0, $string("-help")} as dynamic;
    $a_ = Vector{
      0,
      Vector{
        11,
        $string("  "),
        Vector{2, 0, Vector{12, 32, Vector{2, 0, Vector{12, 10, 0}}}}
      },
      $string("  %s %s\n")
    } as dynamic;
    $b_ = Vector{
      0,
      Vector{
        11,
        $string("  "),
        Vector{
          2,
          0,
          Vector{12, 32, Vector{2, 0, Vector{2, 0, Vector{12, 10, 0}}}}
        }
      },
      $string("  %s %s%s\n")
    } as dynamic;
    $Bad = Vector{248, $cst_Arg_Bad, $caml_fresh_oo_id(0)} as dynamic;
    $Help = Vector{248, $cst_Arg_Help, $caml_fresh_oo_id(0)} as dynamic;
    $Stop = Vector{248, $cst_Arg_Stop, $caml_fresh_oo_id(0)} as dynamic;
    $assoc3 = (dynamic $x, dynamic $l) ==> {
      $t = null;
      $match = null;
      $y2 = null;
      $y1 = null;
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
        throw $caml_wrap_thrown_exception($Not_found) as \Throwable;
      }
    };
    $split = (dynamic $s) ==> {
      $i = $call2($String[14], $s, 61);
      $len = $caml_ml_string_length($s);
      $aH_ = $call3(
        $String[4],
        $s,
        (int)
        ($i + 1),
        (int)
        ($len - (int) ($i + 1))
      );
      return Vector{0, $call3($String[4], $s, 0, $i), $aH_};
    };
    $make_symlist = 
    (dynamic $prefix, dynamic $sep, dynamic $suffix, dynamic $l) ==> {
      $aF_ = null;
      $aE_ = null;
      $aD_ = null;
      $h = null;
      $t = null;
      if ($l) {
        $t = $l[2];
        $h = $l[1];
        $aD_ = $call2($Pervasives[16], $prefix, $h);
        $aE_ =
          (dynamic $x, dynamic $y) ==> {
            $aG_ = $call2($Pervasives[16], $sep, $y);
            return $call2($Pervasives[16], $x, $aG_);
          };
        $aF_ = $call3($List[20], $aE_, $aD_, $t);
        return $call2($Pervasives[16], $aF_, $suffix);
      }
      return $cst_none;
    };
    $print_spec = (dynamic $buf, dynamic $param) ==> {
      $l = null;
      $aC_ = null;
      $doc = $param[3];
      $spec = $param[2];
      $key = $param[1];
      $aB_ = 0 < $caml_ml_string_length($doc) ? 1 : (0);
      if ($aB_) {
        if (11 === $spec[0]) {
          $l = $spec[1];
          $aC_ = $make_symlist($cst__1, $cst__0, $cst, $l);
          return $call5($Printf[5], $buf, $b_, $key, $aC_, $doc);
        }
        return $call4($Printf[5], $buf, $a_, $key, $doc);
      }
      return $aB_;
    };
    $help_action = (dynamic $param) ==> {
      throw $caml_wrap_thrown_exception(Vector{0, $Stop, $c_}) as \Throwable;
    };
    $add_help = (dynamic $speclist) ==> {
      $ay_ = null;
      $ax_ = null;
      $add2 = null;
      $av_ = null;
      $au_ = null;
      $at_ = null;
      try {$assoc3($cst_help__2, $speclist);$ay_ = 0;$au_ = $ay_;}
      catch(\Throwable $aA_) {
        $aA_ = $runtime["caml_wrap_exception"]($aA_);
        if ($aA_ !== $Not_found) {
          throw $caml_wrap_thrown_exception_reraise($aA_) as \Throwable;
        }
        $at_ =
          Vector{
            0,
            Vector{
              0,
              $cst_help,
              Vector{0, $help_action},
              $cst_Display_this_list_of_options
            },
            0
          };
        $au_ = $at_;
      }
      try {$assoc3($cst_help__1, $speclist);$ax_ = 0;$add2 = $ax_;}
      catch(\Throwable $az_) {
        $az_ = $runtime["caml_wrap_exception"]($az_);
        if ($az_ !== $Not_found) {
          throw $caml_wrap_thrown_exception_reraise($az_) as \Throwable;
        }
        $av_ =
          Vector{
            0,
            Vector{
              0,
              $cst_help__0,
              Vector{0, $help_action},
              $cst_Display_this_list_of_options__0
            },
            0
          };
        $add2 = $av_;
      }
      $aw_ = $call2($Pervasives[25], $au_, $add2);
      return $call2($Pervasives[25], $speclist, $aw_);
    };
    $usage_b = (dynamic $buf, dynamic $speclist, dynamic $errmsg) ==> {
      $call3($Printf[5], $buf, $d_, $errmsg);
      $aq_ = $add_help($speclist);
      $ar_ = (dynamic $as_) ==> {return $print_spec($buf, $as_);};
      return $call2($List[15], $ar_, $aq_);
    };
    $usage_string = (dynamic $speclist, dynamic $errmsg) ==> {
      $b = $call1($Buffer[1], 200);
      $usage_b($b, $speclist, $errmsg);
      return $call1($Buffer[2], $b);
    };
    $usage = (dynamic $speclist, dynamic $errmsg) ==> {
      $ap_ = $usage_string($speclist, $errmsg);
      return $call2($Printf[3], $e_, $ap_);
    };
    $current = Vector{0, 0} as dynamic;
    $f_ = 0 as dynamic;
    $bool_of_string_opt = (dynamic $x) ==> {
      $an_ = null;
      try {$an_ = Vector{0, $call1($Pervasives[19], $x)};return $an_;}
      catch(\Throwable $ao_) {
        $ao_ = $runtime["caml_wrap_exception"]($ao_);
        if ($ao_[1] === $Invalid_argument) {return 0;}
        throw $caml_wrap_thrown_exception_reraise($ao_) as \Throwable;
      }
    };
    $int_of_string_opt = (dynamic $x) ==> {
      $al_ = null;
      try {$al_ = Vector{0, $runtime["caml_int_of_string"]($x)};return $al_;}
      catch(\Throwable $am_) {
        $am_ = $runtime["caml_wrap_exception"]($am_);
        if ($am_[1] === $Failure) {return 0;}
        throw $caml_wrap_thrown_exception_reraise($am_) as \Throwable;
      }
    };
    $float_of_string_opt = (dynamic $x) ==> {
      $aj_ = null;
      try {$aj_ = Vector{0, $runtime["caml_float_of_string"]($x)};return $aj_;
      }
      catch(\Throwable $ak_) {
        $ak_ = $runtime["caml_wrap_exception"]($ak_);
        if ($ak_[1] === $Failure) {return 0;}
        throw $caml_wrap_thrown_exception_reraise($ak_) as \Throwable;
      }
    };
    $parse_and_expand_argv_dynamic_aux = 
    (dynamic $allow_expand, dynamic $current, dynamic $argv, dynamic $speclist, dynamic $anonfun, dynamic $errmsg) ==> {
      $m = null;
      $e = null;
      $aa_ = null;
      $s = null;
      $match = null;
      $arg = null;
      $keyword = null;
      $follow = null;
      $ab_ = null;
      $follow__0 = null;
      $action = null;
      $no_arg = null;
      $get_arg = null;
      $consume_arg = null;
      $treat_action = null;
      $follow__1 = null;
      $ac_ = null;
      $treat_action__0 = null;
      $consume_arg__0 = null;
      $get_arg__0 = null;
      $no_arg__0 = null;
      $switch__0 = null;
      $initpos = $current[1];
      $convert_error = (dynamic $error) ==> {
        $ai_ = null;
        $expected = null;
        $arg = null;
        $opt = null;
        $s = null;
        $s__0 = null;
        $b = $call1($Buffer[1], 200);
        $progname = $initpos < $argv[1]->count() - 1
          ? $caml_check_bound($argv[1], $initpos)[$initpos + 1]
          : ($cst__2);
        switch($error[0]) {
          // FALLTHROUGH
          case 0:
            $ai_ = $error[1];
            if ($caml_string_notequal($ai_, $cst_help__3)) {
              if ($caml_string_notequal($ai_, $cst_help__4)) {$call4($Printf[5], $b, $g_, $progname, $ai_);}
            }
            break;
          // FALLTHROUGH
          case 1:
            $expected = $error[3];
            $arg = $error[2];
            $opt = $error[1];
            $call6($Printf[5], $b, $j_, $progname, $arg, $opt, $expected);
            break;
          // FALLTHROUGH
          case 2:
            $s = $error[1];
            $call4($Printf[5], $b, $k_, $progname, $s);
            break;
          // FALLTHROUGH
          default:
            $s__0 = $error[1];
            $call4($Printf[5], $b, $l_, $progname, $s__0);
          }
        $usage_b($b, $speclist[1], $errmsg);
        if (! $caml_equal($error, $h_)) {
          if (! $caml_equal($error, $i_)) {
            return Vector{0, $Bad, $call1($Buffer[2], $b)};
          }
        }
        return Vector{0, $Help, $call1($Buffer[2], $b)};
      };
      $current[1] += 1;
      for (;;) {
        if ($current[1] < $argv[1]->count() - 1) {
          try {
            $aa_ = $current[1];
            $s = $caml_check_bound($argv[1], $aa_)[$aa_ + 1];
            if (1 <= $caml_ml_string_length($s)) {
              if (45 === $caml_string_get($s, 0)) {
                try {
                  $follow__1 = 0;
                  $ac_ = $assoc3($s, $speclist[1]);
                  $action = $ac_;
                  $follow__0 = $follow__1;
                }
                catch(\Throwable $ag_) {
                  $ag_ = $runtime["caml_wrap_exception"]($ag_);
                  if ($ag_ !== $Not_found) {
                    throw $caml_wrap_thrown_exception_reraise($ag_) as \Throwable;
                  }
                  try {
                    $match = $split($s);
                    $arg = $match[2];
                    $keyword = $match[1];
                    $follow = Vector{0, $arg};
                    $ab_ = $assoc3($keyword, $speclist[1]);
                  }
                  catch(\Throwable $ah_) {
                    $ah_ = $runtime["caml_wrap_exception"]($ah_);
                    if ($ah_ === $Not_found) {
                      throw $caml_wrap_thrown_exception(
                              Vector{0, $Stop, Vector{0, $s}}
                            ) as \Throwable;
                    }
                    throw $caml_wrap_thrown_exception_reraise($ah_) as \Throwable;
                  }
                  $action = $ab_;
                  $follow__0 = $follow;
                }
                $no_arg__0 =
                  (dynamic $s, dynamic $follow) ==> {
                    $no_arg = (dynamic $param) ==> {
                      $arg = null;
                      if ($follow) {
                        $arg = $follow[1];
                        throw $caml_wrap_thrown_exception(
                                Vector{0, $Stop, Vector{1, $s, $arg, $cst_no_argument}}
                              ) as \Throwable;
                      }
                      return 0;
                    };
                    return $no_arg;
                  };
                $no_arg = $no_arg__0($s, $follow__0);
                $get_arg__0 =
                  (dynamic $s, dynamic $follow) ==> {
                    $get_arg = (dynamic $param) ==> {
                      $af_ = null;
                      $arg = null;
                      if ($follow) {$arg = $follow[1];return $arg;}
                      if ((int) ($current[1] + 1) < $argv[1]->count() - 1) {
                        $af_ = (int) ($current[1] + 1);
                        return $caml_check_bound($argv[1], $af_)[$af_ + 1];
                      }
                      throw $caml_wrap_thrown_exception(
                              Vector{0, $Stop, Vector{2, $s}}
                            ) as \Throwable;
                    };
                    return $get_arg;
                  };
                $get_arg = $get_arg__0($s, $follow__0);
                $consume_arg__0 =
                  (dynamic $follow) ==> {
                    $consume_arg = (dynamic $param) ==> {
                      if ($follow) {return 0;}
                      $current[1] += 1;
                      return 0;
                    };
                    return $consume_arg;
                  };
                $consume_arg = $consume_arg__0($follow__0);
                $treat_action__0 =
                  
                  (dynamic $s, dynamic $no_arg, dynamic $get_arg, dynamic $consume_arg) ==> {
                    $treat_action->contents = (dynamic $param) ==> {
                      $after = null;
                      $before = null;
                      $newarg = null;
                      $arg__6 = null;
                      $f__6 = null;
                      $ae_ = null;
                      $f__5 = null;
                      $ad_ = null;
                      $arg__5 = null;
                      $symb = null;
                      $f__4 = null;
                      $specs = null;
                      $x__2 = null;
                      $match__3 = null;
                      $arg__4 = null;
                      $r__3 = null;
                      $x__1 = null;
                      $match__2 = null;
                      $arg__3 = null;
                      $f__3 = null;
                      $x__0 = null;
                      $match__1 = null;
                      $arg__2 = null;
                      $r__2 = null;
                      $x = null;
                      $match__0 = null;
                      $arg__1 = null;
                      $f__2 = null;
                      $r__1 = null;
                      $arg__0 = null;
                      $f__1 = null;
                      $r__0 = null;
                      $r = null;
                      $s__0 = null;
                      $match = null;
                      $arg = null;
                      $f__0 = null;
                      $f = null;
                      switch($param[0]) {
                        // FALLTHROUGH
                        case 0:
                          $f = $param[1];
                          return $call1($f, 0);
                        // FALLTHROUGH
                        case 1:
                          $f__0 = $param[1];
                          $arg = $get_arg(0);
                          $match = $bool_of_string_opt($arg);
                          if ($match) {
                            $s__0 = $match[1];
                            $call1($f__0, $s__0);
                            return $consume_arg(0);
                          }
                          throw $caml_wrap_thrown_exception(
                                  Vector{0, $Stop, Vector{1, $s, $arg, $cst_a_boolean}}
                                ) as \Throwable;
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
                          $call1($f__1, $arg__0);
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
                            $call1($f__2, $x);
                            return $consume_arg(0);
                          }
                          throw $caml_wrap_thrown_exception(
                                  Vector{0, $Stop, Vector{1, $s, $arg__1, $cst_an_integer}}
                                ) as \Throwable;
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
                          throw $caml_wrap_thrown_exception(
                                  Vector{0, $Stop, Vector{1, $s, $arg__2, $cst_an_integer__0}}
                                ) as \Throwable;
                        // FALLTHROUGH
                        case 8:
                          $f__3 = $param[1];
                          $arg__3 = $get_arg(0);
                          $match__2 = $float_of_string_opt($arg__3);
                          if ($match__2) {
                            $x__1 = $match__2[1];
                            $call1($f__3, $x__1);
                            return $consume_arg(0);
                          }
                          throw $caml_wrap_thrown_exception(
                                  Vector{0, $Stop, Vector{1, $s, $arg__3, $cst_a_float}}
                                ) as \Throwable;
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
                          throw $caml_wrap_thrown_exception(
                                  Vector{0, $Stop, Vector{1, $s, $arg__4, $cst_a_float__0}}
                                ) as \Throwable;
                        // FALLTHROUGH
                        case 10:
                          $specs = $param[1];
                          return $call2($List[15], $treat_action, $specs);
                        // FALLTHROUGH
                        case 11:
                          $f__4 = $param[2];
                          $symb = $param[1];
                          $arg__5 = $get_arg(0);
                          if ($call2($List[31], $arg__5, $symb)) {
                            $call1($f__4, $arg__5);
                            return $consume_arg(0);
                          }
                          $ad_ = $make_symlist($cst__5, $cst__4, $cst__3, $symb);
                          throw $caml_wrap_thrown_exception(
                                  Vector{
                                    0,
                                    $Stop,
                                    Vector{
                                      1,
                                      $s,
                                      $arg__5,
                                      $call2($Pervasives[16], $cst_one_of, $ad_)
                                    }
                                  }
                                ) as \Throwable;
                        // FALLTHROUGH
                        case 12:
                          $f__5 = $param[1];
                          for (;;) {
                            if ($current[1] < (int) ($argv[1]->count() - 1 + -1)) {
                              $ae_ = (int) ($current[1] + 1);
                              $call1($f__5, $caml_check_bound($argv[1], $ae_)[$ae_ + 1]);
                              $consume_arg(0);
                              continue;
                            }
                            return 0;
                          }
                        // FALLTHROUGH
                        default:
                          $f__6 = $param[1];
                          if (1 - $allow_expand) {
                            throw $caml_wrap_thrown_exception(
                                    Vector{
                                      0,
                                      $Invalid_argument,
                                      $cst_Arg_Expand_is_is_only_allowed_with_Arg_parse_and_expand_argv_dynamic
                                    }
                                  ) as \Throwable;
                          }
                          $arg__6 = $get_arg(0);
                          $newarg = $call1($f__6, $arg__6);
                          $consume_arg(0);
                          $before =
                            $call3($Array[7], $argv[1], 0, (int) ($current[1] + 1));
                          $after =
                            $call3(
                              $Array[7],
                              $argv[1],
                              (int)
                              ($current[1] + 1),
                              (int)
                              ((int) ($argv[1]->count() - 1 - $current[1]) + -1)
                            );
                          $argv[1] =
                            $call1(
                              $Array[6],
                              Vector{0, $before, Vector{0, $newarg, Vector{0, $after, 0}}}
                            );
                          return 0;
                        }
                    };
                    return $treat_action;
                  };
                $treat_action =
                  $treat_action__0($s, $no_arg, $get_arg, $consume_arg);
                $treat_action($action);
                $switch__0 = 1;
              }
              else {$switch__0 = 0;}
            }
            else {$switch__0 = 0;}
            if (! $switch__0) {$call1($anonfun, $s);}
          }
          catch(\Throwable $exn) {
            $exn = $runtime["caml_wrap_exception"]($exn);
            if ($exn[1] === $Bad) {
              $m = $exn[2];
              throw $caml_wrap_thrown_exception($convert_error(Vector{3, $m})) as \Throwable;
            }
            if ($exn[1] === $Stop) {
              $e = $exn[2];
              throw $caml_wrap_thrown_exception($convert_error($e)) as \Throwable;
            }
            throw $caml_wrap_thrown_exception_reraise($exn) as \Throwable;
          }
          $current[1] += 1;
          continue;
        }
        return 0;
      }
    };
    $parse_and_expand_argv_dynamic = 
    (dynamic $current, dynamic $argv, dynamic $speclist, dynamic $anonfun, dynamic $errmsg) ==> {
      return $parse_and_expand_argv_dynamic_aux(
        1,
        $current,
        $argv,
        $speclist,
        $anonfun,
        $errmsg
      );
    };
    $parse_argv_dynamic = 
    (dynamic $opt, dynamic $argv, dynamic $speclist, dynamic $anonfun, dynamic $errmsg) ==> {
      $current__0 = null;
      $sth = null;
      if ($opt) {
        $sth = $opt[1];
        $current__0 = $sth;
      }
      else {$current__0 = $current;}
      return $parse_and_expand_argv_dynamic_aux(
        0,
        $current__0,
        Vector{0, $argv},
        $speclist,
        $anonfun,
        $errmsg
      );
    };
    $parse_argv = 
    (dynamic $opt, dynamic $argv, dynamic $speclist, dynamic $anonfun, dynamic $errmsg) ==> {
      $current__0 = null;
      $sth = null;
      if ($opt) {
        $sth = $opt[1];
        $current__0 = $sth;
      }
      else {$current__0 = $current;}
      return $parse_argv_dynamic(
        Vector{0, $current__0},
        $argv,
        Vector{0, $speclist},
        $anonfun,
        $errmsg
      );
    };
    $parse = (dynamic $l, dynamic $f, dynamic $msg) ==> {
      $Z_ = null;
      $msg__1 = null;
      $msg__0 = null;
      try {$Z_ = $parse_argv(0, $Sys[1], $l, $f, $msg);return $Z_;}
      catch(\Throwable $exn) {
        $exn = $runtime["caml_wrap_exception"]($exn);
        if ($exn[1] === $Bad) {
          $msg__0 = $exn[2];
          $call2($Printf[3], $m_, $msg__0);
          return $call1($Pervasives[87], 2);
        }
        if ($exn[1] === $Help) {
          $msg__1 = $exn[2];
          $call2($Printf[2], $n_, $msg__1);
          return $call1($Pervasives[87], 0);
        }
        throw $caml_wrap_thrown_exception_reraise($exn) as \Throwable;
      }
    };
    $parse_dynamic = (dynamic $l, dynamic $f, dynamic $msg) ==> {
      $Y_ = null;
      $msg__1 = null;
      $msg__0 = null;
      try {$Y_ = $parse_argv_dynamic(0, $Sys[1], $l, $f, $msg);return $Y_;}
      catch(\Throwable $exn) {
        $exn = $runtime["caml_wrap_exception"]($exn);
        if ($exn[1] === $Bad) {
          $msg__0 = $exn[2];
          $call2($Printf[3], $o_, $msg__0);
          return $call1($Pervasives[87], 2);
        }
        if ($exn[1] === $Help) {
          $msg__1 = $exn[2];
          $call2($Printf[2], $p_, $msg__1);
          return $call1($Pervasives[87], 0);
        }
        throw $caml_wrap_thrown_exception_reraise($exn) as \Throwable;
      }
    };
    $parse_expand = (dynamic $l, dynamic $f, dynamic $msg) ==> {
      $X_ = null;
      $current = null;
      $spec = null;
      $argv = null;
      $msg__1 = null;
      $msg__0 = null;
      try {
        $argv = Vector{0, $Sys[1]};
        $spec = Vector{0, $l};
        $current = Vector{0, $f_};
        $X_ = $parse_and_expand_argv_dynamic($current, $argv, $spec, $f, $msg);
        return $X_;
      }
      catch(\Throwable $exn) {
        $exn = $runtime["caml_wrap_exception"]($exn);
        if ($exn[1] === $Bad) {
          $msg__0 = $exn[2];
          $call2($Printf[3], $q_, $msg__0);
          return $call1($Pervasives[87], 2);
        }
        if ($exn[1] === $Help) {
          $msg__1 = $exn[2];
          $call2($Printf[2], $r_, $msg__1);
          return $call1($Pervasives[87], 0);
        }
        throw $caml_wrap_thrown_exception_reraise($exn) as \Throwable;
      }
    };
    $second_word = (dynamic $s) ==> {
      $n = null;
      $n__0 = null;
      $len = $caml_ml_string_length($s);
      $loop = (dynamic $n) ==> {
        $n__1 = null;
        $n__0 = $n;
        for (;;) {
          if ($len <= $n__0) {return $len;}
          if (32 === $caml_string_get($s, $n__0)) {
            $n__1 = (int) ($n__0 + 1);
            $n__0 = $n__1;
            continue;
          }
          return $n__0;
        }
      };
      try {$n__0 = $call2($String[14], $s, 9);}
      catch(\Throwable $V_) {
        $V_ = $runtime["caml_wrap_exception"]($V_);
        if ($V_ === $Not_found) {
          try {$n = $call2($String[14], $s, 32);}
          catch(\Throwable $W_) {
            $W_ = $runtime["caml_wrap_exception"]($W_);
            if ($W_ === $Not_found) {return $len;}
            throw $caml_wrap_thrown_exception_reraise($W_) as \Throwable;
          }
          return $loop((int) ($n + 1));
        }
        throw $caml_wrap_thrown_exception_reraise($V_) as \Throwable;
      }
      return $loop((int) ($n__0 + 1));
    };
    $max_arg_len = (dynamic $cur, dynamic $param) ==> {
      $doc = $param[3];
      $spec = $param[2];
      $kwd = $param[1];
      if (11 === $spec[0]) {
        return $call2($Pervasives[5], $cur, $caml_ml_string_length($kwd));
      }
      $U_ = (int) ($caml_ml_string_length($kwd) + $second_word($doc)) as dynamic;
      return $call2($Pervasives[5], $cur, $U_);
    };
    $replace_leading_tab = (dynamic $s) ==> {
      $seen = Vector{0, 0} as dynamic;
      $T_ = (dynamic $c) ==> {
        if (9 === $c) {if (! $seen[1]) {$seen[1] = 1;return 32;}}
        return $c;
      };
      return $call2($String[10], $T_, $s);
    };
    $add_padding = (dynamic $len, dynamic $ksd) ==> {
      $msg = null;
      $cutcol = null;
      $kwd_len = null;
      $diff = null;
      $spaces = null;
      $O_ = null;
      $prefix = null;
      $suffix = null;
      $P_ = null;
      $msg__0 = null;
      $cutcol__0 = null;
      $Q_ = null;
      $spaces__0 = null;
      $R_ = null;
      $S_ = null;
      $M_ = $ksd[2];
      $N_ = $ksd[1];
      if ($caml_string_notequal($ksd[3], $cst__6)) {
        if (11 === $M_[0]) {
          $msg__0 = $ksd[3];
          $cutcol__0 = $second_word($msg__0);
          $Q_ =
            (int)
            ($call2($Pervasives[5], 0, (int) ($len - $cutcol__0)) + 3);
          $spaces__0 = $call2($String[1], $Q_, 32);
          $R_ = $replace_leading_tab($msg__0);
          $S_ = $call2($Pervasives[16], $spaces__0, $R_);
          return Vector{0, $N_, $M_, $call2($Pervasives[16], $cst__7, $S_)};
        }
        $msg = $ksd[3];
        $cutcol = $second_word($msg);
        $kwd_len = $caml_ml_string_length($N_);
        $diff = (int) ((int) ($len - $kwd_len) - $cutcol);
        if (0 < $diff) {
          $spaces = $call2($String[1], $diff, 32);
          $O_ = $replace_leading_tab($msg);
          $prefix = $call3($String[4], $O_, 0, $cutcol);
          $suffix =
            $call3(
              $String[4],
              $msg,
              $cutcol,
              (int)
              ($caml_ml_string_length($msg) - $cutcol)
            );
          $P_ = $call2($Pervasives[16], $spaces, $suffix);
          return Vector{0, $N_, $M_, $call2($Pervasives[16], $prefix, $P_)};
        }
        return Vector{0, $N_, $M_, $replace_leading_tab($msg)};
      }
      return $ksd;
    };
    $align = (dynamic $opt, dynamic $speclist) ==> {
      $limit = null;
      $sth = null;
      if ($opt) {
        $sth = $opt[1];
        $limit = $sth;
      }
      else {$limit = $Pervasives[7];}
      $completed = $add_help($speclist);
      $len = $call3($List[20], $max_arg_len, 0, $completed);
      $len__0 = $call2($Pervasives[4], $len, $limit);
      $K_ = (dynamic $L_) ==> {return $add_padding($len__0, $L_);};
      return $call2($List[17], $K_, $completed);
    };
    $trim_cr = (dynamic $s) ==> {
      $len = $caml_ml_string_length($s);
      if (0 < $len) {
        if (13 === $caml_string_get($s, (int) ($len + -1))) {
          return $call3($String[4], $s, 0, (int) ($len + -1));
        }
      }
      return $s;
    };
    $read_aux = (dynamic $trim, dynamic $sep, dynamic $file) ==> {
      $read = new Ref();
      $ic = $call1($Pervasives[68], $file);
      $buf = $call1($Buffer[1], 200);
      $words = Vector{0, 0} as dynamic;
      $stash = (dynamic $param) ==> {
        $word = $call1($Buffer[2], $buf);
        $word__0 = $trim ? $trim_cr($word) : ($word);
        $words[1] = Vector{0, $word__0, $words[1]};
        return $call1($Buffer[8], $buf);
      };
      $read->contents = (dynamic $param) ==> {
        $I_ = null;
        $c = null;
        $H_ = null;
        try {
          $c = $call1($Pervasives[70], $ic);
          if ($c === $sep) {
            $stash(0);
            $I_ = $read->contents(0);
          }
          else {$call2($Buffer[10], $buf, $c);$I_ = $read->contents(0);}
          return $I_;
        }
        catch(\Throwable $J_) {
          $J_ = $runtime["caml_wrap_exception"]($J_);
          if ($J_ === $End_of_file) {
            $H_ = 0 < $call1($Buffer[7], $buf) ? 1 : (0);
            return $H_ ? $stash(0) : ($H_);
          }
          throw $caml_wrap_thrown_exception_reraise($J_) as \Throwable;
        }
      };
      $read->contents(0);
      $call1($Pervasives[81], $ic);
      $G_ = $call1($List[9], $words[1]);
      return $call1($Array[12], $G_);
    };
    $s_ = 10 as dynamic;
    $t_ = 1 as dynamic;
    $read_arg = (dynamic $F_) ==> {return $read_aux($t_, $s_, $F_);};
    $u_ = 0 as dynamic;
    $v_ = 0 as dynamic;
    $read_arg0 = (dynamic $E_) ==> {return $read_aux($v_, $u_, $E_);};
    $write_aux = (dynamic $sep, dynamic $file, dynamic $args) ==> {
      $oc = $call1($Pervasives[49], $file);
      $D_ = (dynamic $s) ==> {return $call4($Printf[1], $oc, $w_, $s, $sep);};
      $call2($Array[13], $D_, $args);
      return $call1($Pervasives[64], $oc);
    };
    $x_ = 10 as dynamic;
    $write_arg = (dynamic $B_, dynamic $C_) ==> {
      return $write_aux($x_, $B_, $C_);
    };
    $y_ = 0 as dynamic;
    $write_arg0 = (dynamic $z_, dynamic $A_) ==> {
      return $write_aux($y_, $z_, $A_);
    };
    $Arg = Vector{
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
    } as dynamic;
    
    return($Arg);

  }
  public static function parse(dynamic $l, dynamic $f, dynamic $msg): dynamic {
    return static::syncCall(__FUNCTION__, 1, $l, $f, $msg);
  }
  public static function parse_dynamic(dynamic $l, dynamic $f, dynamic $msg): dynamic {
    return static::syncCall(__FUNCTION__, 2, $l, $f, $msg);
  }
  public static function parse_argv(dynamic $opt, dynamic $argv, dynamic $speclist, dynamic $anonfun, dynamic $errmsg): dynamic {
    return static::syncCall(__FUNCTION__, 3, $opt, $argv, $speclist, $anonfun, $errmsg);
  }
  public static function parse_argv_dynamic(dynamic $opt, dynamic $argv, dynamic $speclist, dynamic $anonfun, dynamic $errmsg): dynamic {
    return static::syncCall(__FUNCTION__, 4, $opt, $argv, $speclist, $anonfun, $errmsg);
  }
  public static function parse_and_expand_argv_dynamic(dynamic $current, dynamic $argv, dynamic $speclist, dynamic $anonfun, dynamic $errmsg): dynamic {
    return static::syncCall(__FUNCTION__, 5, $current, $argv, $speclist, $anonfun, $errmsg);
  }
  public static function parse_expand(dynamic $l, dynamic $f, dynamic $msg): dynamic {
    return static::syncCall(__FUNCTION__, 6, $l, $f, $msg);
  }
  public static function usage(dynamic $speclist, dynamic $errmsg): dynamic {
    return static::syncCall(__FUNCTION__, 9, $speclist, $errmsg);
  }
  public static function usage_string(dynamic $speclist, dynamic $errmsg): dynamic {
    return static::syncCall(__FUNCTION__, 10, $speclist, $errmsg);
  }
  public static function align(dynamic $opt, dynamic $speclist): dynamic {
    return static::syncCall(__FUNCTION__, 11, $opt, $speclist);
  }

}
/* Hashing disabled */
