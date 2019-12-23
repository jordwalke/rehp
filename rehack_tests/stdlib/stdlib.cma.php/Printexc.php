<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class Printexc {
  <<__Override, __Memoize>>
  public static function requireModule() : Vector<dynamic> {
    $joo_global_object = \Rehack\GlobalObject::get() as dynamic;
    
    $other_fields = new Ref();
    $runtime = $joo_global_object->jsoo_runtime;
    $call1 = $runtime["caml_call1"];
    $call2 = $runtime["caml_call2"];
    $call3 = $runtime["caml_call3"];
    $call6 = $runtime["caml_call6"];
    $call7 = $runtime["caml_call7"];
    $caml_check_bound = $runtime["caml_check_bound"];
    $caml_get_exception_raw_backtrace = $runtime[
       "caml_get_exception_raw_backtrace"
     ];
    $string = $runtime["caml_new_string"];
    $caml_obj_tag = $runtime["caml_obj_tag"];
    $caml_wrap_thrown_exception_reraise = $runtime[
       "caml_wrap_thrown_exception_reraise"
     ];
    $unsigned_right_shift_32 = $runtime["unsigned_right_shift_32"];
    $cst__0 = $string("");
    $cst_Program_not_linked_with_g_cannot_print_stack_backtrace = $string(
      "(Program not linked with -g, cannot print stack backtrace)\n"
    );
    $cst_Raised_at = $string("Raised at");
    $cst_Re_raised_at = $string("Re-raised at");
    $cst_Raised_by_primitive_operation_at = $string(
      "Raised by primitive operation at"
    );
    $cst_Called_from = $string("Called from");
    $cst_inlined = $string(" (inlined)");
    $cst__3 = $string("");
    $partial = Vector{4, 0, 0, 0, 0} as dynamic;
    $cst_Out_of_memory = $string("Out of memory");
    $cst_Stack_overflow = $string("Stack overflow");
    $cst_Pattern_matching_failed = $string("Pattern matching failed");
    $cst_Assertion_failed = $string("Assertion failed");
    $cst_Undefined_recursive_module = $string("Undefined recursive module");
    $cst__1 = $string("");
    $cst__2 = $string("");
    $cst = $string("_");
    $locfmt = Vector{
      0,
      Vector{
        11,
        $string("File \""),
        Vector{
          2,
          0,
          Vector{
            11,
            $string("\", line "),
            Vector{
              4,
              0,
              0,
              0,
              Vector{
                11,
                $string(", characters "),
                Vector{
                  4,
                  0,
                  0,
                  0,
                  Vector{
                    12,
                    45,
                    Vector{
                      4,
                      0,
                      0,
                      0,
                      Vector{11, $string(": "), Vector{2, 0, 0}}
                    }
                  }
                }
              }
            }
          }
        }
      },
      $string("File \"%s\", line %d, characters %d-%d: %s")
    } as dynamic;
    $Printf =  Printf::requireModule ();
    $Pervasives =  Pervasives::requireModule ();
    $Out_of_memory =  Out_of_memory::requireModule ();
    $Buffer =  Buffer::requireModule ();
    $Stack_overflow =  Stack_overflow::requireModule ();
    $Match_failure =  Match_failure::requireModule ();
    $Assert_failure =  Assert_failure::requireModule ();
    $Undefined_recursive_module =  Undefined_recursive_module::requireModule (
    );
    $Obj =  Obj::requireModule ();
    $printers = Vector{0, 0} as dynamic;
    $c_ = Vector{
      0,
      Vector{11, $string(", "), Vector{2, 0, Vector{2, 0, 0}}},
      $string(", %s%s")
    } as dynamic;
    $l_ = Vector{0, Vector{2, 0, Vector{12, 10, 0}}, $string("%s\n")} as dynamic;
    $j_ = Vector{0, Vector{2, 0, Vector{12, 10, 0}}, $string("%s\n")} as dynamic;
    $k_ = Vector{
      0,
      Vector{
        11,
        $string("(Program not linked with -g, cannot print stack backtrace)\n"
        ),
        0
      },
      $string("(Program not linked with -g, cannot print stack backtrace)\n")
    } as dynamic;
    $h_ = Vector{
      0,
      Vector{
        2,
        0,
        Vector{
          11,
          $string(" file \""),
          Vector{
            2,
            0,
            Vector{
              12,
              34,
              Vector{
                2,
                0,
                Vector{
                  11,
                  $string(", line "),
                  Vector{
                    4,
                    0,
                    0,
                    0,
                    Vector{
                      11,
                      $string(", characters "),
                      Vector{4, 0, 0, 0, Vector{12, 45, $partial}}
                    }
                  }
                }
              }
            }
          }
        }
      },
      $string("%s file \"%s\"%s, line %d, characters %d-%d")
    } as dynamic;
    $i_ = Vector{
      0,
      Vector{2, 0, Vector{11, $string(" unknown location"), 0}},
      $string("%s unknown location")
    } as dynamic;
    $g_ = Vector{
      0,
      Vector{
        11,
        $string("Uncaught exception: "),
        Vector{2, 0, Vector{12, 10, 0}}
      },
      $string("Uncaught exception: %s\n")
    } as dynamic;
    $f_ = Vector{
      0,
      Vector{
        11,
        $string("Uncaught exception: "),
        Vector{2, 0, Vector{12, 10, 0}}
      },
      $string("Uncaught exception: %s\n")
    } as dynamic;
    $d_ = Vector{
      0,
      Vector{12, 40, Vector{2, 0, Vector{2, 0, Vector{12, 41, 0}}}},
      $string("(%s%s)")
    } as dynamic;
    $e_ = Vector{
      0,
      Vector{12, 40, Vector{2, 0, Vector{12, 41, 0}}},
      $string("(%s)")
    } as dynamic;
    $b_ = Vector{0, Vector{4, 0, 0, 0, 0}, $string("%d")} as dynamic;
    $a_ = Vector{0, Vector{3, 0, 0}, $string("%S")} as dynamic;
    $field = (dynamic $x, dynamic $i) ==> {
      $f = $x[$i + 1];
      return $call1($Obj[1], $f)
        ? $caml_obj_tag($f) === $Obj[13]
         ? $call2($Printf[4], $a_, $f)
         : ($caml_obj_tag($f) === $Obj[14]
          ? $call1($Pervasives[23], $f)
          : ($cst))
        : ($call2($Printf[4], $b_, $f));
    };
    $other_fields->contents = (dynamic $x, dynamic $i) ==> {
      if ($x->count() - 1 <= $i) {return $cst__0;}
      $ad_ = $other_fields->contents($x, (int) ($i + 1));
      $ae_ = $field($x, $i);
      return $call3($Printf[4], $c_, $ae_, $ad_);
    };
    $fields = (dynamic $x) ==> {
      $aa_ = null;
      $ab_ = null;
      $ac_ = null;
      $match = $x->count() - 1;
      if (2 < $unsigned_right_shift_32($match, 0)) {
        $aa_ = $other_fields->contents($x, 2);
        $ab_ = $field($x, 1);
        return $call3($Printf[4], $d_, $ab_, $aa_);
      }
      switch($match) {
        // FALLTHROUGH
        case 0:
          return $cst__1;
        // FALLTHROUGH
        case 1:
          return $cst__2;
        // FALLTHROUGH
        default:
          $ac_ = $field($x, 1);
          return $call2($Printf[4], $e_, $ac_);
        }
    };
    $to_string = (dynamic $x) ==> {
      $conv = (dynamic $param) ==> {
        $tl = null;
        $hd = null;
        $W_ = null;
        $s = null;
        $X_ = null;
        $match = null;
        $char__0 = null;
        $line = null;
        $file = null;
        $match__0 = null;
        $char__1 = null;
        $line__0 = null;
        $file__0 = null;
        $match__1 = null;
        $char__2 = null;
        $line__1 = null;
        $file__1 = null;
        $constructor = null;
        $Y_ = null;
        $param__0 = $param;
        for (;;) {
          if ($param__0) {
            $tl = $param__0[2];
            $hd = $param__0[1];
            try {$X_ = $call1($hd, $x);$W_ = $X_;}
            catch(\Throwable $Z_) {$W_ = 0;}
            if ($W_) {$s = $W_[1];return $s;}
            $param__0 = $tl;
            continue;
          }
          if ($x === $Out_of_memory) {return $cst_Out_of_memory;}
          if ($x === $Stack_overflow) {return $cst_Stack_overflow;}
          if ($x[1] === $Match_failure) {
            $match = $x[2];
            $char__0 = $match[3];
            $line = $match[2];
            $file = $match[1];
            return $call6(
              $Printf[4],
              $locfmt,
              $file,
              $line,
              $char__0,
              (int)
              ($char__0 + 5),
              $cst_Pattern_matching_failed
            );
          }
          if ($x[1] === $Assert_failure) {
            $match__0 = $x[2];
            $char__1 = $match__0[3];
            $line__0 = $match__0[2];
            $file__0 = $match__0[1];
            return $call6(
              $Printf[4],
              $locfmt,
              $file__0,
              $line__0,
              $char__1,
              (int)
              ($char__1 + 6),
              $cst_Assertion_failed
            );
          }
          if ($x[1] === $Undefined_recursive_module) {
            $match__1 = $x[2];
            $char__2 = $match__1[3];
            $line__1 = $match__1[2];
            $file__1 = $match__1[1];
            return $call6(
              $Printf[4],
              $locfmt,
              $file__1,
              $line__1,
              $char__2,
              (int)
              ($char__2 + 6),
              $cst_Undefined_recursive_module
            );
          }
          if (0 === $caml_obj_tag($x)) {
            $constructor = $x[1][1];
            $Y_ = $fields($x);
            return $call2($Pervasives[16], $constructor, $Y_);
          }
          return $x[1];
        }
      };
      return $conv($printers[1]);
    };
    $print = (dynamic $fct, dynamic $arg) ==> {
      $V_ = null;
      $U_ = null;
      try {$V_ = $call1($fct, $arg);return $V_;}
      catch(\Throwable $x) {
        $x = $runtime["caml_wrap_exception"]($x);
        $U_ = $to_string($x);
        $call2($Printf[3], $f_, $U_);
        $call1($Pervasives[51], $Pervasives[28]);
        throw $caml_wrap_thrown_exception_reraise($x) as \Throwable;
      }
    };
    $catch__0 = (dynamic $fct, dynamic $arg) ==> {
      $T_ = null;
      $S_ = null;
      try {$T_ = $call1($fct, $arg);return $T_;}
      catch(\Throwable $x) {
        $x = $runtime["caml_wrap_exception"]($x);
        $call1($Pervasives[51], $Pervasives[27]);
        $S_ = $to_string($x);
        $call2($Printf[3], $g_, $S_);
        return $call1($Pervasives[87], 2);
      }
    };
    $convert_raw_backtrace = (dynamic $bt) ==> {
      return Vector{0, $runtime["caml_convert_raw_backtrace"]($bt)};
    };
    $format_backtrace_slot = (dynamic $pos, dynamic $slot) ==> {
      $L_ = null;
      $M_ = null;
      $N_ = null;
      $O_ = null;
      $P_ = null;
      $Q_ = null;
      $info = (dynamic $is_raise) ==> {
        return $is_raise
          ? 0 === $pos ? $cst_Raised_at : ($cst_Re_raised_at)
          : (0 === $pos
           ? $cst_Raised_by_primitive_operation_at
           : ($cst_Called_from));
      };
      if (0 === $slot[0]) {
        $L_ = $slot[5];
        $M_ = $slot[4];
        $N_ = $slot[3];
        $O_ = $slot[6] ? $cst_inlined : ($cst__3);
        $P_ = $slot[2];
        $Q_ = $info($slot[1]);
        return Vector{0, $call7($Printf[4], $h_, $Q_, $P_, $O_, $N_, $M_, $L_)
        };
      }
      if ($slot[1]) {return 0;}
      $R_ = $info(0);
      return Vector{0, $call2($Printf[4], $i_, $R_)};
    };
    $print_raw_backtrace = (dynamic $outchan, dynamic $raw_backtrace) ==> {
      $a = null;
      $I_ = null;
      $J_ = null;
      $i = null;
      $match = null;
      $str = null;
      $K_ = null;
      $backtrace = $convert_raw_backtrace($raw_backtrace);
      if ($backtrace) {
        $a = $backtrace[1];
        $J_ = (int) ($a->count() - 1 + -1);
        $I_ = 0;
        if (! ($J_ < 0)) {
          $i = $I_;
          for (;;) {
            $match =
              $format_backtrace_slot($i, $caml_check_bound($a, $i)[$i + 1]);
            if ($match) {
              $str = $match[1];
              $call3($Printf[1], $outchan, $j_, $str);
            }
            $K_ = (int) ($i + 1);
            if ($J_ !== $i) {$i = $K_;continue;}
            break;
          }
        }
        return 0;
      }
      return $call2($Printf[1], $outchan, $k_);
    };
    $print_backtrace = (dynamic $outchan) ==> {
      return $print_raw_backtrace(
        $outchan,
        $caml_get_exception_raw_backtrace(0)
      );
    };
    $raw_backtrace_to_string = (dynamic $raw_backtrace) ==> {
      $a = null;
      $b = null;
      $F_ = null;
      $G_ = null;
      $i = null;
      $match = null;
      $str = null;
      $H_ = null;
      $backtrace = $convert_raw_backtrace($raw_backtrace);
      if ($backtrace) {
        $a = $backtrace[1];
        $b = $call1($Buffer[1], 1024);
        $G_ = (int) ($a->count() - 1 + -1);
        $F_ = 0;
        if (! ($G_ < 0)) {
          $i = $F_;
          for (;;) {
            $match =
              $format_backtrace_slot($i, $caml_check_bound($a, $i)[$i + 1]);
            if ($match) {$str = $match[1];$call3($Printf[5], $b, $l_, $str);}
            $H_ = (int) ($i + 1);
            if ($G_ !== $i) {$i = $H_;continue;}
            break;
          }
        }
        return $call1($Buffer[2], $b);
      }
      return $cst_Program_not_linked_with_g_cannot_print_stack_backtrace;
    };
    $backtrace_slot_is_raise = (dynamic $param) ==> {
      return 0 === $param[0] ? $param[1] : ($param[1]);
    };
    $backtrace_slot_is_inline = (dynamic $param) ==> {
      return 0 === $param[0] ? $param[6] : (0);
    };
    $backtrace_slot_location = (dynamic $param) ==> {
      return 0 === $param[0]
        ? Vector{0, Vector{0, $param[2], $param[3], $param[4], $param[5]}}
        : (0);
    };
    $backtrace_slots = (dynamic $raw_backtrace) ==> {
      $backtrace = null;
      $i = null;
      $param = null;
      $D_ = null;
      $i__0 = null;
      $i__1 = null;
      $E_ = null;
      $match = $convert_raw_backtrace($raw_backtrace);
      if ($match) {
        $backtrace = $match[1];
        $i__1 = (int) ($backtrace->count() - 1 + -1);
        $i = $i__1;
        for (;;) {
          if (-1 === $i) {$E_ = 0;}
          else {
            $param = $caml_check_bound($backtrace, $i)[$i + 1];
            $D_ = 0 === $param[0] ? 1 : (0);
            if (! $D_) {$i__0 = (int) ($i + -1);$i = $i__0;continue;}
            $E_ = $D_;
          }
          return $E_ ? Vector{0, $backtrace} : (0);
        }
      }
      return 0;
    };
    $get_backtrace = (dynamic $param) ==> {
      return $raw_backtrace_to_string($caml_get_exception_raw_backtrace(0));
    };
    $register_printer = (dynamic $fn) ==> {
      $printers[1] = Vector{0, $fn, $printers[1]};
      return 0;
    };
    $exn_slot = (dynamic $x) ==> {
      return 0 === $caml_obj_tag($x) ? $x[1] : ($x);
    };
    $exn_slot_id = (dynamic $x) ==> {$slot = $exn_slot($x);return $slot[2];};
    $exn_slot_name = (dynamic $x) ==> {$slot = $exn_slot($x);return $slot[1];};
    $uncaught_exception_handler = Vector{0, 0} as dynamic;
    $set_uncaught_exception_handler = (dynamic $fn) ==> {
      $uncaught_exception_handler[1] = Vector{0, $fn};
      return 0;
    };
    $m_ = (dynamic $C_) ==> {
      return $runtime["caml_raw_backtrace_next_slot"]($C_);
    };
    $n_ = (dynamic $B_) ==> {
      return $runtime["caml_convert_raw_backtrace_slot"]($B_);
    };
    $o_ = (dynamic $A_, dynamic $z_) ==> {
      return $runtime["caml_raw_backtrace_slot"]($A_, $z_);
    };
    $p_ = (dynamic $y_) ==> {
      return $runtime["caml_raw_backtrace_length"]($y_);
    };
    $q_ = Vector{
      0,
      $backtrace_slot_is_raise,
      $backtrace_slot_is_inline,
      $backtrace_slot_location,
      $format_backtrace_slot
    } as dynamic;
    $r_ = (dynamic $x_) ==> {
      return $runtime["caml_get_current_callstack"]($x_);
    };
    $s_ = (dynamic $w_) ==> {return $caml_get_exception_raw_backtrace($w_);};
    $t_ = (dynamic $v_) ==> {return $runtime["caml_backtrace_status"]($v_);};
    $Printexc = Vector{
      0,
      $to_string,
      $print,
      $catch__0,
      $print_backtrace,
      $get_backtrace,
      (dynamic $u_) ==> {return $runtime["caml_record_backtrace"]($u_);},
      $t_,
      $register_printer,
      $s_,
      $print_raw_backtrace,
      $raw_backtrace_to_string,
      $r_,
      $set_uncaught_exception_handler,
      $backtrace_slots,
      $q_,
      $p_,
      $o_,
      $n_,
      $m_,
      $exn_slot_id,
      $exn_slot_name
    } as dynamic;
    
     return ($Printexc);

  }
  public static function to_string(dynamic $x): dynamic {
    return static::callRehackFunction(static::requireModule()[1], varray[$x]);
  }
  public static function print(dynamic $fct, dynamic $arg): dynamic {
    return static::callRehackFunction(static::requireModule()[2], varray[$fct, $arg]);
  }
  public static function _catch_(dynamic $fct, dynamic $arg): dynamic {
    return static::callRehackFunction(static::requireModule()[3], varray[$fct, $arg]);
  }
  public static function print_backtrace(dynamic $outchan): dynamic {
    return static::callRehackFunction(static::requireModule()[4], varray[$outchan]);
  }
  public static function get_backtrace(dynamic $param): dynamic {
    return static::callRehackFunction(static::requireModule()[5], varray[$param]);
  }
  public static function register_printer(dynamic $fn): dynamic {
    return static::callRehackFunction(static::requireModule()[8], varray[$fn]);
  }
  public static function print_raw_backtrace(dynamic $outchan, dynamic $raw_backtrace): dynamic {
    return static::callRehackFunction(static::requireModule()[10], varray[$outchan, $raw_backtrace]);
  }
  public static function raw_backtrace_to_string(dynamic $raw_backtrace): dynamic {
    return static::callRehackFunction(static::requireModule()[11], varray[$raw_backtrace]);
  }
  public static function set_uncaught_exception_handler(dynamic $fn): dynamic {
    return static::callRehackFunction(static::requireModule()[13], varray[$fn]);
  }
  public static function backtrace_slots(dynamic $raw_backtrace): dynamic {
    return static::callRehackFunction(static::requireModule()[14], varray[$raw_backtrace]);
  }
  public static function exn_slot_id(dynamic $x): dynamic {
    return static::callRehackFunction(static::requireModule()[20], varray[$x]);
  }
  public static function exn_slot_name(dynamic $x): dynamic {
    return static::callRehackFunction(static::requireModule()[21], varray[$x]);
  }

}
/* Hashing disabled */
