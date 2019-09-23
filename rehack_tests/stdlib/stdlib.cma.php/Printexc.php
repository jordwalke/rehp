<?hh
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * Printexc.php
 */

namespace Rehack;

final class Printexc {
  <<__Memoize>>
  public static function get() {
    $global_object = \Rehack\GlobalObject::get();
    $runtime = \Rehack\Runtime::get();
    /*
     * Soon, these will replace the `global_data->ModuleName`
     * pattern in the load() function.
     */
    $Buffer = Buffer::get();
    $Obj = Obj::get();
    $Pervasives = Pervasives::get();
    $Printf = Printf::get();
    $Match_failure = Match_failure::get();
    $Out_of_memory = Out_of_memory::get();
    $Failure = Failure::get();
    $Stack_overflow = Stack_overflow::get();
    $Assert_failure = Assert_failure::get();
    $Undefined_recursive_module = Undefined_recursive_module::get();
    Printexc::load($global_object);
    $memoized = $runtime->caml_get_global_data()->Printexc;
    return $memoized;
  }

  /**
   * Performs module load operation. May have side effects.
   */
  private static function load($joo_global_object) {
    

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
    $caml_wrap_exception = $runtime["caml_wrap_exception"];
    $unsigned_right_shift_32 = $runtime["unsigned_right_shift_32"];
    $global_data = $runtime["caml_get_global_data"]();
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
    $partial = Vector{4, 0, 0, 0, 0};
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
    };
    $Printf = $global_data["Printf"];
    $Pervasives = $global_data["Pervasives"];
    $Out_of_memory = $global_data["Out_of_memory"];
    $Buffer = $global_data["Buffer"];
    $Stack_overflow = $global_data["Stack_overflow"];
    $Match_failure = $global_data["Match_failure"];
    $Assert_failure = $global_data["Assert_failure"];
    $Undefined_recursive_module = $global_data["Undefined_recursive_module"];
    $Obj = $global_data["Obj"];
    $c = Vector{
      0,
      Vector{11, $string(", "), Vector{2, 0, Vector{2, 0, 0}}},
      $string(", %s%s")
    };
    $l = Vector{0, Vector{2, 0, Vector{12, 10, 0}}, $string("%s\n")};
    $j = Vector{0, Vector{2, 0, Vector{12, 10, 0}}, $string("%s\n")};
    $k = Vector{
      0,
      Vector{
        11,
        $string("(Program not linked with -g, cannot print stack backtrace)\n"
        ),
        0
      },
      $string("(Program not linked with -g, cannot print stack backtrace)\n")
    };
    $h = Vector{
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
    };
    $i = Vector{
      0,
      Vector{2, 0, Vector{11, $string(" unknown location"), 0}},
      $string("%s unknown location")
    };
    $g = Vector{
      0,
      Vector{
        11,
        $string("Uncaught exception: "),
        Vector{2, 0, Vector{12, 10, 0}}
      },
      $string("Uncaught exception: %s\n")
    };
    $f = Vector{
      0,
      Vector{
        11,
        $string("Uncaught exception: "),
        Vector{2, 0, Vector{12, 10, 0}}
      },
      $string("Uncaught exception: %s\n")
    };
    $d = Vector{
      0,
      Vector{12, 40, Vector{2, 0, Vector{2, 0, Vector{12, 41, 0}}}},
      $string("(%s%s)")
    };
    $e = Vector{
      0,
      Vector{12, 40, Vector{2, 0, Vector{12, 41, 0}}},
      $string("(%s)")
    };
    $b = Vector{0, Vector{4, 0, 0, 0, 0}, $string("%d")};
    $a = Vector{0, Vector{3, 0, 0}, $string("%S")};
    $printers = Vector{0, 0};
    $field = function(dynamic $x, dynamic $i) use ($Obj,$Pervasives,$Printf,$a,$b,$call1,$call2,$caml_obj_tag,$cst) {
      $f = $x[$i + 1];
      return $call1($Obj[1], $f)
        ? $caml_obj_tag($f) === $Obj[13]
         ? $call2($Printf[4], $a, $f)
         : ($caml_obj_tag($f) === $Obj[14]
          ? $call1($Pervasives[23], $f)
          : ($cst))
        : ($call2($Printf[4], $b, $f));
    };
    $other_fields->contents = function(dynamic $x, dynamic $i) use ($Printf,$c,$call3,$cst__0,$field,$other_fields) {
      if ($x->count() - 1 <= $i) {return $cst__0;}
      $ad = $other_fields->contents($x, (int) ($i + 1));
      $ae = $field($x, $i);
      return $call3($Printf[4], $c, $ae, $ad);
    };
    $fields = function(dynamic $x) use ($Printf,$call2,$call3,$cst__1,$cst__2,$d,$e,$field,$other_fields,$unsigned_right_shift_32) {
      $match = $x->count() - 1;
      if (2 < $unsigned_right_shift_32($match, 0)) {
        $aa = $other_fields->contents($x, 2);
        $ab = $field($x, 1);
        return $call3($Printf[4], $d, $ab, $aa);
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
          $ac = $field($x, 1);
          return $call2($Printf[4], $e, $ac);
        }
    };
    $to_string = function(dynamic $x) use ($Assert_failure,$Match_failure,$Out_of_memory,$Pervasives,$Printf,$Stack_overflow,$Undefined_recursive_module,$call1,$call2,$call6,$caml_obj_tag,$cst_Assertion_failed,$cst_Out_of_memory,$cst_Pattern_matching_failed,$cst_Stack_overflow,$cst_Undefined_recursive_module,$fields,$locfmt,$printers) {
      $conv = function(dynamic $param) use ($Assert_failure,$Match_failure,$Out_of_memory,$Pervasives,$Printf,$Stack_overflow,$Undefined_recursive_module,$call1,$call2,$call6,$caml_obj_tag,$cst_Assertion_failed,$cst_Out_of_memory,$cst_Pattern_matching_failed,$cst_Stack_overflow,$cst_Undefined_recursive_module,$fields,$locfmt,$x) {
        $param__0 = $param;
        for (;;) {
          if ($param__0) {
            $tl = $param__0[2];
            $hd = $param__0[1];
            try {$X = $call1($hd, $x);$W = $X;}catch(\Throwable $Z) {$W = 0;}
            if ($W) {$s = $W[1];return $s;}
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
            $Y = $fields($x);
            return $call2($Pervasives[16], $constructor, $Y);
          }
          return $x[1];
        }
      };
      return $conv($printers[1]);
    };
    $print = function(dynamic $fct, dynamic $arg) use ($Pervasives,$Printf,$call1,$call2,$caml_wrap_exception,$f,$runtime,$to_string) {
      try {$V = $call1($fct, $arg);return $V;}
      catch(\Throwable $x) {
        $x = $caml_wrap_exception($x);
        $U = $to_string($x);
        $call2($Printf[3], $f, $U);
        $call1($Pervasives[51], $Pervasives[28]);
        throw $runtime["caml_wrap_thrown_exception_reraise"]($x) as \Throwable;
      }
    };
    $catch__0 = function(dynamic $fct, dynamic $arg) use ($Pervasives,$Printf,$call1,$call2,$caml_wrap_exception,$g,$to_string) {
      try {$T = $call1($fct, $arg);return $T;}
      catch(\Throwable $x) {
        $x = $caml_wrap_exception($x);
        $call1($Pervasives[51], $Pervasives[27]);
        $S = $to_string($x);
        $call2($Printf[3], $g, $S);
        return $call1($Pervasives[87], 2);
      }
    };
    $convert_raw_backtrace = function(dynamic $bt) use ($runtime) {
      $R = Vector{0, $runtime["caml_convert_raw_backtrace"]($bt)};
      return $R;
    };
    $format_backtrace_slot = function(dynamic $pos, dynamic $slot) use ($Printf,$call2,$call7,$cst_Called_from,$cst_Raised_at,$cst_Raised_by_primitive_operation_at,$cst_Re_raised_at,$cst__3,$cst_inlined,$h,$i) {
      $info = function(dynamic $is_raise) use ($cst_Called_from,$cst_Raised_at,$cst_Raised_by_primitive_operation_at,$cst_Re_raised_at,$pos) {
        return $is_raise
          ? 0 === $pos ? $cst_Raised_at : ($cst_Re_raised_at)
          : (0 === $pos
           ? $cst_Raised_by_primitive_operation_at
           : ($cst_Called_from));
      };
      if (0 === $slot[0]) {
        $K = $slot[5];
        $L = $slot[4];
        $M = $slot[3];
        $N = $slot[6] ? $cst_inlined : ($cst__3);
        $O = $slot[2];
        $P = $info($slot[1]);
        return Vector{0, $call7($Printf[4], $h, $P, $O, $N, $M, $L, $K)};
      }
      if ($slot[1]) {return 0;}
      $Q = $info(0);
      return Vector{0, $call2($Printf[4], $i, $Q)};
    };
    $print_exception_backtrace = function
    (dynamic $outchan, dynamic $backtrace) use ($Printf,$call2,$call3,$caml_check_bound,$format_backtrace_slot,$j,$k) {
      if ($backtrace) {
        $a = $backtrace[1];
        $I = (int) ($a->count() - 1 + -1);
        $H = 0;
        if (! ($I < 0)) {
          $i = $H;
          for (;;) {
            $match = $format_backtrace_slot(
              $i,
              $caml_check_bound($a, $i)[$i + 1]
            );
            if ($match) {
              $str = $match[1];
              $call3($Printf[1], $outchan, $j, $str);
            }
            $J = (int) ($i + 1);
            if ($I !== $i) {$i = $J;continue;}
            break;
          }
        }
        return 0;
      }
      return $call2($Printf[1], $outchan, $k);
    };
    $print_raw_backtrace = function(dynamic $outchan, dynamic $raw_backtrace) use ($convert_raw_backtrace,$print_exception_backtrace) {
      return $print_exception_backtrace(
        $outchan,
        $convert_raw_backtrace($raw_backtrace)
      );
    };
    $print_backtrace = function(dynamic $outchan) use ($caml_get_exception_raw_backtrace,$print_raw_backtrace) {
      return $print_raw_backtrace(
        $outchan,
        $caml_get_exception_raw_backtrace(0)
      );
    };
    $backtrace_to_string = function(dynamic $backtrace) use ($Buffer,$Printf,$call1,$call3,$caml_check_bound,$cst_Program_not_linked_with_g_cannot_print_stack_backtrace,$format_backtrace_slot,$l) {
      if ($backtrace) {
        $a = $backtrace[1];
        $b = $call1($Buffer[1], 1024);
        $F = (int) ($a->count() - 1 + -1);
        $E = 0;
        if (! ($F < 0)) {
          $i = $E;
          for (;;) {
            $match = $format_backtrace_slot(
              $i,
              $caml_check_bound($a, $i)[$i + 1]
            );
            if ($match) {$str = $match[1];$call3($Printf[5], $b, $l, $str);}
            $G = (int) ($i + 1);
            if ($F !== $i) {$i = $G;continue;}
            break;
          }
        }
        return $call1($Buffer[2], $b);
      }
      return $cst_Program_not_linked_with_g_cannot_print_stack_backtrace;
    };
    $raw_backtrace_to_string = function(dynamic $raw_backtrace) use ($backtrace_to_string,$convert_raw_backtrace) {
      return $backtrace_to_string($convert_raw_backtrace($raw_backtrace));
    };
    $backtrace_slot_is_raise = function(dynamic $param) {
      return 0 === $param[0] ? $param[1] : ($param[1]);
    };
    $backtrace_slot_is_inline = function(dynamic $param) {
      return 0 === $param[0] ? $param[6] : (0);
    };
    $backtrace_slot_location = function(dynamic $param) {
      return 0 === $param[0]
        ? Vector{0, Vector{0, $param[2], $param[3], $param[4], $param[5]}}
        : (0);
    };
    $backtrace_slots = function(dynamic $raw_backtrace) use ($caml_check_bound,$convert_raw_backtrace) {
      $match = $convert_raw_backtrace($raw_backtrace);
      if ($match) {
        $backtrace = $match[1];
        $usable_slot = function(dynamic $param) {
          return 0 === $param[0] ? 1 : (0);
        };
        $exists_usable = function(dynamic $i) use ($backtrace,$caml_check_bound,$usable_slot) {
          $i__0 = $i;
          for (;;) {
            if (-1 === $i__0) {return 0;}
            $D = $usable_slot($caml_check_bound($backtrace, $i__0)[$i__0 + 1]);
            if ($D) {return $D;}
            $i__1 = (int) ($i__0 + -1);
            $i__0 = $i__1;
            continue;
          }
        };
        return $exists_usable((int) ($backtrace->count() - 1 + -1))
          ? Vector{0, $backtrace}
          : (0);
      }
      return 0;
    };
    $get_backtrace = function(dynamic $param) use ($caml_get_exception_raw_backtrace,$raw_backtrace_to_string) {
      return $raw_backtrace_to_string($caml_get_exception_raw_backtrace(0));
    };
    $register_printer = function(dynamic $fn) use ($printers) {
      $printers[1] = Vector{0, $fn, $printers[1]};
      return 0;
    };
    $exn_slot = function(dynamic $x) use ($caml_obj_tag) {
      return 0 === $caml_obj_tag($x) ? $x[1] : ($x);
    };
    $exn_slot_id = function(dynamic $x) use ($exn_slot) {
      $slot = $exn_slot($x);
      return $slot[2];
    };
    $exn_slot_name = function(dynamic $x) use ($exn_slot) {
      $slot = $exn_slot($x);
      return $slot[1];
    };
    $uncaught_exception_handler = Vector{0, 0};
    $set_uncaught_exception_handler = function(dynamic $fn) use ($uncaught_exception_handler) {
      $uncaught_exception_handler[1] = Vector{0, $fn};
      return 0;
    };
    $m = function(dynamic $C) use ($runtime) {
      return $runtime["caml_raw_backtrace_next_slot"]($C);
    };
    $n = function(dynamic $B) use ($runtime) {
      return $runtime["caml_convert_raw_backtrace_slot"]($B);
    };
    $o = function(dynamic $A, dynamic $z) use ($runtime) {
      return $runtime["caml_raw_backtrace_slot"]($A, $z);
    };
    $p = function(dynamic $y) use ($runtime) {
      return $runtime["caml_raw_backtrace_length"]($y);
    };
    $q = Vector{
      0,
      $backtrace_slot_is_raise,
      $backtrace_slot_is_inline,
      $backtrace_slot_location,
      $format_backtrace_slot
    };
    $r = function(dynamic $x) use ($runtime) {
      return $runtime["caml_get_current_callstack"]($x);
    };
    $s = function(dynamic $w) use ($caml_get_exception_raw_backtrace) {
      return $caml_get_exception_raw_backtrace($w);
    };
    $t = function(dynamic $v) use ($runtime) {
      return $runtime["caml_backtrace_status"]($v);
    };
    $Printexc = Vector{
      0,
      $to_string,
      $print,
      $catch__0,
      $print_backtrace,
      $get_backtrace,
      function(dynamic $u) use ($runtime) {
        return $runtime["caml_record_backtrace"]($u);
      },
      $t,
      $register_printer,
      $s,
      $print_raw_backtrace,
      $raw_backtrace_to_string,
      $r,
      $set_uncaught_exception_handler,
      $backtrace_slots,
      $q,
      $p,
      $o,
      $n,
      $m,
      $exn_slot_id,
      $exn_slot_name
    };
    
    $runtime["caml_register_global"](45, $Printexc, "Printexc");

  }
}