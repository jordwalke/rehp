<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class Stdlib__format {
  <<__Override, __Memoize>>
  public static function get() : Vector<dynamic> {
    
    $output_acc = new Ref();$strput_acc = new Ref();
    $runtime = (\Rehack\GlobalObject::get() as dynamic)->jsoo_runtime;
    $call1 = $runtime["caml_call1"];
    $call2 = $runtime["caml_call2"];
    $call3 = $runtime["caml_call3"];
    $caml_ml_string_length = $runtime["caml_ml_string_length"];
    $string = $runtime["caml_new_string"];
    $caml_wrap_thrown_exception = $runtime["caml_wrap_thrown_exception"];
    $is_int = $runtime["is_int"];
    $unsigned_right_shift_32 = $runtime["unsigned_right_shift_32"];
    $cst__16 = $string("");
    $cst__17 = $string("");
    $cst__15 = $string(".");
    $cst__12 = $string(">");
    $cst__13 = $string("</");
    $cst__14 = $string("");
    $cst__9 = $string(">");
    $cst__10 = $string("<");
    $cst__11 = $string("");
    $cst__8 = $string("\n");
    $cst_Format_pp_set_geometry_max_indent_2 = $string(
      "Format.pp_set_geometry: max_indent < 2"
    );
    $cst_Format_pp_set_geometry_margin_max_indent = $string(
      "Format.pp_set_geometry: margin <= max_indent"
    );
    $cst__4 = $string("");
    $cst__5 = $string("");
    $cst__6 = $string("");
    $cst__7 = $string("");
    $cst__0 = $string("");
    $cst__1 = $string("");
    $cst__2 = $string("");
    $cst__3 = $string("");
    $cst = $string("");
    $cst_Stdlib_Format_String_tag = $string("Stdlib.Format.String_tag");
    $Stdlib_queue = Stdlib__queue::get();
    $CamlinternalFormat = CamlinternalFormat::get();
    $Stdlib = Stdlib::get();
    $Stdlib_string = Stdlib__string::get();
    $Stdlib_buffer = Stdlib__buffer::get();
    $Stdlib_list = Stdlib__list::get();
    $Stdlib_stack = Stdlib__stack::get();
    $Stdlib_int = Stdlib__int::get();
    $c_ = Vector{3, 0, 3} as dynamic;
    $b_ = Vector{0, $string("")} as dynamic;
    $a_ = Vector{0, $string(""), 0, $string("")} as dynamic;
    $id = (dynamic $x) : dynamic ==> {return $x;};
    $size = 0 as dynamic;
    $unknown = -1 as dynamic;
    $is_known = (dynamic $n) : dynamic ==> {return 0 <= $n ? 1 : (0);};
    $String_tag = Vector{
      248,
      $cst_Stdlib_Format_String_tag,
      $runtime["caml_fresh_oo_id"](0)
    } as dynamic;
    $pp_enqueue = (dynamic $state, dynamic $token) : dynamic ==> {
      $state[13] = (int) ($state[13] + $token[3]);
      return $call2($Stdlib_queue[3], $token, $state[28]);
    };
    $pp_clear_queue = (dynamic $state) : dynamic ==> {
      $state[12] = 1;
      $state[13] = 1;
      return $call1($Stdlib_queue[11], $state[28]);
    };
    $pp_infinity = 1000000010 as dynamic;
    $pp_output_string = (dynamic $state, dynamic $s) : dynamic ==> {
      return $call3($state[17], $s, 0, $caml_ml_string_length($s));
    };
    $pp_output_newline = (dynamic $state) : dynamic ==> {
      return $call1($state[19], 0);
    };
    $pp_output_spaces = (dynamic $state, dynamic $n) : dynamic ==> {
      return $call1($state[20], $n);
    };
    $pp_output_indent = (dynamic $state, dynamic $n) : dynamic ==> {
      return $call1($state[21], $n);
    };
    $format_pp_text = (dynamic $state, dynamic $size, dynamic $text) : dynamic ==> {
      $state[9] = (int) ($state[9] - $size);
      $pp_output_string($state, $text);
      $state[11] = 0;
      return 0;
    };
    $format_string = (dynamic $state, dynamic $s) : dynamic ==> {
      $cQ_ = $runtime["caml_string_notequal"]($s, $cst);
      return $cQ_
        ? $format_pp_text($state, $caml_ml_string_length($s), $s)
        : ($cQ_);
    };
    $break_new_line = (dynamic $state, dynamic $param, dynamic $width) : dynamic ==> {
      $after = $param[3];
      $offset = $param[2];
      $before = $param[1];
      $format_string($state, $before);
      $pp_output_newline($state);
      $state[11] = 1;
      $indent = (int) ((int) ($state[6] - $width) + $offset) as dynamic;
      $real_indent = $call2($Stdlib[16], $state[8], $indent);
      $state[10] = $real_indent;
      $state[9] = (int) ($state[6] - $state[10]);
      $pp_output_indent($state, $state[10]);
      return $format_string($state, $after);
    };
    $break_line = (dynamic $state, dynamic $width) : dynamic ==> {
      return $break_new_line($state, $a_, $width);
    };
    $break_same_line = (dynamic $state, dynamic $param) : dynamic ==> {
      $after = $param[3];
      $width = $param[2];
      $before = $param[1];
      $format_string($state, $before);
      $state[9] = (int) ($state[9] - $width);
      $pp_output_spaces($state, $width);
      return $format_string($state, $after);
    };
    $pp_force_break_line = (dynamic $state) : dynamic ==> {
      $match__0 = null as dynamic;
      $width = null as dynamic;
      $box_type = null as dynamic;
      $cP_ = null as dynamic;
      $switcher = null as dynamic;
      $match = $call1($Stdlib_stack[7], $state[2]);
      if ($match) {
        $match__0 = $match[1];
        $width = $match__0[2];
        $box_type = $match__0[1];
        $cP_ = $state[9] < $width ? 1 : (0);
        if ($cP_) {
          $switcher = (int) ($box_type + -1) as dynamic;
          return 3 < $unsigned_right_shift_32($switcher, 0)
            ? 0
            : ($break_line($state, $width));
        }
        return $cP_;
      }
      return $pp_output_newline($state);
    };
    $pp_skip_token = (dynamic $state) : dynamic ==> {
      $match__0 = null as dynamic;
      $size = null as dynamic;
      $length = null as dynamic;
      $cO_ = null as dynamic;
      $match = $call1($Stdlib_queue[6], $state[28]);
      if ($match) {
        $match__0 = $match[1];
        $size = $match__0[1];
        $length = $match__0[3];
        $state[12] = (int) ($state[12] - $length);
        $cO_ = $id($size);
        $state[9] = (int) ($state[9] + $cO_);
        return 0;
      }
      return 0;
    };
    $format_pp_token = (dynamic $state, dynamic $size, dynamic $param) : dynamic ==> {
      $marker__0 = null as dynamic;
      $tag_name__0 = null as dynamic;
      $tbox = null as dynamic;
      $box_type__0 = null as dynamic;
      $width__1 = null as dynamic;
      $insertion_point__0 = null as dynamic;
      $off__1 = null as dynamic;
      $ty = null as dynamic;
      $offset = null as dynamic;
      $tab = null as dynamic;
      $find = null as dynamic;
      $first = null as dynamic;
      $cL_ = null as dynamic;
      $tabs__0 = null as dynamic;
      $match__7 = null as dynamic;
      $match__6 = null as dynamic;
      $insertion_point = null as dynamic;
      $n = null as dynamic;
      $off__0 = null as dynamic;
      $box_type = null as dynamic;
      $width__0 = null as dynamic;
      $match__5 = null as dynamic;
      $match__4 = null as dynamic;
      $before = null as dynamic;
      $off = null as dynamic;
      $fits = null as dynamic;
      $breaks = null as dynamic;
      $s = null as dynamic;
      $marker = null as dynamic;
      $tag_name = null as dynamic;
      $match__3 = null as dynamic;
      $cK_ = null as dynamic;
      $width = null as dynamic;
      $match__2 = null as dynamic;
      $match__1 = null as dynamic;
      $cJ_ = null as dynamic;
      $cI_ = null as dynamic;
      $add_tab = null as dynamic;
      $tabs = null as dynamic;
      $match__0 = null as dynamic;
      $match = null as dynamic;
      if ($is_int($param)) {
        switch($param) {
          // FALLTHROUGH
          case 0:
            $match = $call1($Stdlib_stack[7], $state[3]);
            if ($match) {
              $match__0 = $match[1];
              $tabs = $match__0[1];
              $add_tab =
                (dynamic $n, dynamic $ls) : dynamic ==> {
                  $x = null as dynamic;
                  $l = null as dynamic;
                  if ($ls) {
                    $l = $ls[2];
                    $x = $ls[1];
                    return $runtime["caml_lessthan"]($n, $x)
                      ? Vector{0, $n, $ls}
                      : (Vector{0, $x, $add_tab($n, $l)});
                  }
                  return Vector{0, $n, 0};
                };
              $tabs[1] = $add_tab((int) ($state[6] - $state[9]), $tabs[1]);
              return 0;
            }
            return 0;
          // FALLTHROUGH
          case 1:
            $cI_ = $call1($Stdlib_stack[5], $state[2]);
            return ((dynamic $cN_) : dynamic ==> {return 0;})($cI_);
          // FALLTHROUGH
          case 2:
            $cJ_ = $call1($Stdlib_stack[5], $state[3]);
            return ((dynamic $cM_) : dynamic ==> {return 0;})($cJ_);
          // FALLTHROUGH
          case 3:
            $match__1 = $call1($Stdlib_stack[7], $state[2]);
            if ($match__1) {
              $match__2 = $match__1[1];
              $width = $match__2[2];
              return $break_line($state, $width);
            }
            return $pp_output_newline($state);
          // FALLTHROUGH
          case 4:
            $cK_ = $state[10] !== (int) ($state[6] - $state[9]) ? 1 : (0);
            return $cK_ ? $pp_skip_token($state) : ($cK_);
          // FALLTHROUGH
          default:
            $match__3 = $call1($Stdlib_stack[5], $state[5]);
            if ($match__3) {
              $tag_name = $match__3[1];
              $marker = $call1($state[25], $tag_name);
              return $pp_output_string($state, $marker);
            }
            return 0;
          }
      }
      else {
        switch($param[0]) {
          // FALLTHROUGH
          case 0:
            $s = $param[1];
            return $format_pp_text($state, $size, $s);
          // FALLTHROUGH
          case 1:
            $breaks = $param[2];
            $fits = $param[1];
            $off = $breaks[2];
            $before = $breaks[1];
            $match__4 = $call1($Stdlib_stack[7], $state[2]);
            if ($match__4) {
              $match__5 = $match__4[1];
              $width__0 = $match__5[2];
              $box_type = $match__5[1];
              switch($box_type) {
                // FALLTHROUGH
                case 0:
                  return $break_same_line($state, $fits);
                // FALLTHROUGH
                case 1:
                  return $break_new_line($state, $breaks, $width__0);
                // FALLTHROUGH
                case 2:
                  return $break_new_line($state, $breaks, $width__0);
                // FALLTHROUGH
                case 3:
                  return $state[9] <
                     (int)
                     ($size + $caml_ml_string_length($before))
                    ? $break_new_line($state, $breaks, $width__0)
                    : ($break_same_line($state, $fits));
                // FALLTHROUGH
                case 4:
                  return $state[11]
                    ? $break_same_line($state, $fits)
                    : ($state[9] <
                      (int)
                      ($size + $caml_ml_string_length($before))
                     ? $break_new_line($state, $breaks, $width__0)
                     : ((int)
                     ((int) ($state[6] - $width__0) + $off) < $state[10]
                      ? $break_new_line($state, $breaks, $width__0)
                      : ($break_same_line($state, $fits))));
                // FALLTHROUGH
                default:
                  return $break_same_line($state, $fits);
                }
            }
            return 0;
          // FALLTHROUGH
          case 2:
            $off__0 = $param[2];
            $n = $param[1];
            $insertion_point = (int) ($state[6] - $state[9]) as dynamic;
            $match__6 = $call1($Stdlib_stack[7], $state[3]);
            if ($match__6) {
              $match__7 = $match__6[1];
              $tabs__0 = $match__7[1];
              $cL_ = $tabs__0[1];
              if ($cL_) {
                $first = $cL_[1];
                $find =
                  (dynamic $param) : dynamic ==> {
                    $tail = null as dynamic;
                    $head = null as dynamic;
                    $param__0 = $param;
                    for (;;) {
                      if ($param__0) {
                        $tail = $param__0[2];
                        $head = $param__0[1];
                        if ($insertion_point <= $head) {return $head;}
                        $param__0 = $tail;
                        continue;
                      }
                      return $first;
                    }
                  };
                $tab = $find($tabs__0[1]);
              }
              else {$tab = $insertion_point;}
              $offset = (int) ($tab - $insertion_point) as dynamic;
              return 0 <= $offset
                ? $break_same_line(
                 $state,
                 Vector{0, $cst__1, (int) ($offset + $n), $cst__0}
               )
                : ($break_new_line(
                 $state,
                 Vector{0, $cst__3, (int) ($tab + $off__0), $cst__2},
                 $state[6]
               ));
            }
            return 0;
          // FALLTHROUGH
          case 3:
            $ty = $param[2];
            $off__1 = $param[1];
            $insertion_point__0 = (int) ($state[6] - $state[9]) as dynamic;
            if ($state[8] < $insertion_point__0) {$pp_force_break_line($state);}
            $width__1 = (int) ($state[9] - $off__1) as dynamic;
            $box_type__0 = 1 === $ty ? 1 : ($state[9] < $size ? $ty : (5));
            return $call2(
              $Stdlib_stack[3],
              Vector{0, $box_type__0, $width__1},
              $state[2]
            );
          // FALLTHROUGH
          case 4:
            $tbox = $param[1];
            return $call2($Stdlib_stack[3], $tbox, $state[3]);
          // FALLTHROUGH
          default:
            $tag_name__0 = $param[1];
            $marker__0 = $call1($state[24], $tag_name__0);
            $pp_output_string($state, $marker__0);
            return $call2($Stdlib_stack[3], $tag_name__0, $state[5]);
          }
      }
    };
    $advance_left = (dynamic $state) : dynamic ==> {
      $size__0 = null as dynamic;
      $cH_ = null as dynamic;
      $cG_ = null as dynamic;
      $pending_count = null as dynamic;
      $token = null as dynamic;
      $length = null as dynamic;
      $size = null as dynamic;
      $match__0 = null as dynamic;
      $match = null as dynamic;
      for (;;) {
        $match = $call1($Stdlib_queue[9], $state[28]);
        if ($match) {
          $match__0 = $match[1];
          $size = $match__0[1];
          $length = $match__0[3];
          $token = $match__0[2];
          $pending_count = (int) ($state[13] - $state[12]) as dynamic;
          $cG_ = $is_known($size);
          $cH_ = $cG_ ? $cG_ : ($state[9] <= $pending_count ? 1 : (0));
          if ($cH_) {
            $call1($Stdlib_queue[5], $state[28]);
            $size__0 = $is_known($size) ? $id($size) : ($pp_infinity);
            $format_pp_token($state, $size__0, $token);
            $state[12] = (int) ($length + $state[12]);
            continue;
          }
          return $cH_;
        }
        return 0;
      }
    };
    $enqueue_advance = (dynamic $state, dynamic $tok) : dynamic ==> {
      $pp_enqueue($state, $tok);
      return $advance_left($state);
    };
    $enqueue_string_as = (dynamic $state, dynamic $size, dynamic $s) : dynamic ==> {
      return $enqueue_advance(
        $state,
        Vector{0, $size, Vector{0, $s}, $id($size)}
      );
    };
    $enqueue_string = (dynamic $state, dynamic $s) : dynamic ==> {
      return $enqueue_string_as($state, $id($caml_ml_string_length($s)), $s);
    };
    $initialize_scan_stack = (dynamic $stack) : dynamic ==> {
      $call1($Stdlib_stack[8], $stack);
      $queue_elem = Vector{0, $unknown, $b_, 0} as dynamic;
      return $call2($Stdlib_stack[3], Vector{0, -1, $queue_elem}, $stack);
    };
    $set_size = (dynamic $state, dynamic $ty) : dynamic ==> {
      $match__0 = null as dynamic;
      $queue_elem = null as dynamic;
      $left_total = null as dynamic;
      $size = null as dynamic;
      $cA_ = null as dynamic;
      $cB_ = null as dynamic;
      $cC_ = null as dynamic;
      $cD_ = null as dynamic;
      $match = $call1($Stdlib_stack[7], $state[1]);
      if ($match) {
        $match__0 = $match[1];
        $queue_elem = $match__0[2];
        $left_total = $match__0[1];
        $size = $id($queue_elem[1]);
        if ($left_total < $state[12]) {
          return $initialize_scan_stack($state[1]);
        }
        $cA_ = $queue_elem[2];
        if (! $is_int($cA_)) {
          switch($cA_[0]) {
            // FALLTHROUGH
            case 3:
              $cC_ = 1 - $ty;
              if ($cC_) {
                $queue_elem[1] = $id((int) ($state[13] + $size));
                $cD_ = $call1($Stdlib_stack[5], $state[1]);
                return ((dynamic $cF_) : dynamic ==> {return 0;})($cD_);
              }
              return $cC_;
            // FALLTHROUGH
            case 1:
            // FALLTHROUGH
            case 2:
              if ($ty) {
                $queue_elem[1] = $id((int) ($state[13] + $size));
                $cB_ = $call1($Stdlib_stack[5], $state[1]);
                return ((dynamic $cE_) : dynamic ==> {return 0;})($cB_);
              }
              return $ty;
            }
        }
        return 0;
      }
      return 0;
    };
    $scan_push = (dynamic $state, dynamic $b, dynamic $token) : dynamic ==> {
      $pp_enqueue($state, $token);
      if ($b) {$set_size($state, 1);}
      $elem = Vector{0, $state[13], $token} as dynamic;
      return $call2($Stdlib_stack[3], $elem, $state[1]);
    };
    $pp_open_box_gen = (dynamic $state, dynamic $indent, dynamic $br_ty) : dynamic ==> {
      $elem = null as dynamic;
      $size = null as dynamic;
      $state[14] = (int) ($state[14] + 1);
      if ($state[14] < $state[15]) {
        $size = $id((int) - $state[13]);
        $elem = Vector{0, $size, Vector{3, $indent, $br_ty}, 0} as dynamic;
        return $scan_push($state, 0, $elem);
      }
      $cz_ = $state[14] === $state[15] ? 1 : (0);
      return $cz_ ? $enqueue_string($state, $state[16]) : ($cz_);
    };
    $pp_open_sys_box = (dynamic $state) : dynamic ==> {
      return $pp_open_box_gen($state, 0, 3);
    };
    $pp_close_box = (dynamic $state, dynamic $param) : dynamic ==> {
      $cy_ = null as dynamic;
      $cx_ = 1 < $state[14] ? 1 : (0);
      if ($cx_) {
        if ($state[14] < $state[15]) {
          $pp_enqueue($state, Vector{0, $size, 1, 0});
          $set_size($state, 1);
          $set_size($state, 0);
        }
        $state[14] = (int) ($state[14] + -1);
        $cy_ = 0 as dynamic;
      }
      else {$cy_ = $cx_;}
      return $cy_;
    };
    $pp_open_stag = (dynamic $state, dynamic $tag_name) : dynamic ==> {
      $token = null as dynamic;
      if ($state[22]) {
        $call2($Stdlib_stack[3], $tag_name, $state[4]);
        $call1($state[26], $tag_name);
      }
      $cw_ = $state[23];
      if ($cw_) {
        $token = Vector{5, $tag_name} as dynamic;
        return $pp_enqueue($state, Vector{0, $size, $token, 0});
      }
      return $cw_;
    };
    $pp_close_stag = (dynamic $state, dynamic $param) : dynamic ==> {
      $cv_ = null as dynamic;
      $tag_name = null as dynamic;
      $match = null as dynamic;
      if ($state[23]) {$pp_enqueue($state, Vector{0, $size, 5, 0});}
      $cu_ = $state[22];
      if ($cu_) {
        $match = $call1($Stdlib_stack[5], $state[4]);
        if ($match) {
          $tag_name = $match[1];
          return $call1($state[27], $tag_name);
        }
        $cv_ = 0 as dynamic;
      }
      else {$cv_ = $cu_;}
      return $cv_;
    };
    $pp_open_tag = (dynamic $state, dynamic $s) : dynamic ==> {
      return $pp_open_stag($state, Vector{0, $String_tag, $s});
    };
    $pp_close_tag = (dynamic $state, dynamic $param) : dynamic ==> {
      return $pp_close_stag($state, 0);
    };
    $pp_set_print_tags = (dynamic $state, dynamic $b) : dynamic ==> {
      $state[22] = $b;
      return 0;
    };
    $pp_set_mark_tags = (dynamic $state, dynamic $b) : dynamic ==> {
      $state[23] = $b;
      return 0;
    };
    $pp_get_print_tags = (dynamic $state, dynamic $param) : dynamic ==> {
      return $state[22];
    };
    $pp_get_mark_tags = (dynamic $state, dynamic $param) : dynamic ==> {
      return $state[23];
    };
    $pp_set_tags = (dynamic $state, dynamic $b) : dynamic ==> {
      $pp_set_print_tags($state, $b);
      return $pp_set_mark_tags($state, $b);
    };
    $pp_get_formatter_stag_functions = (dynamic $state, dynamic $param) : dynamic ==> {
      return Vector{0, $state[24], $state[25], $state[26], $state[27]};
    };
    $pp_set_formatter_stag_functions = (dynamic $state, dynamic $param) : dynamic ==> {
      $pct = $param[4];
      $pot = $param[3];
      $mct = $param[2];
      $mot = $param[1];
      $state[24] = $mot;
      $state[25] = $mct;
      $state[26] = $pot;
      $state[27] = $pct;
      return 0;
    };
    $pp_rinit = (dynamic $state) : dynamic ==> {
      $pp_clear_queue($state);
      $initialize_scan_stack($state[1]);
      $call1($Stdlib_stack[8], $state[2]);
      $call1($Stdlib_stack[8], $state[3]);
      $call1($Stdlib_stack[8], $state[4]);
      $call1($Stdlib_stack[8], $state[5]);
      $state[10] = 0;
      $state[14] = 0;
      $state[9] = $state[6];
      return $pp_open_sys_box($state);
    };
    $clear_tag_stack = (dynamic $state) : dynamic ==> {
      $cs_ = $state[4];
      $ct_ = (dynamic $param) : dynamic ==> {return $pp_close_tag($state, 0);};
      return $call2($Stdlib_stack[12], $ct_, $cs_);
    };
    $pp_flush_queue = (dynamic $state, dynamic $b) : dynamic ==> {
      $clear_tag_stack($state);
      for (;;) {
        if (1 < $state[14]) {$pp_close_box($state, 0);continue;}
        $state[13] = $pp_infinity;
        $advance_left($state);
        if ($b) {$pp_output_newline($state);}
        return $pp_rinit($state);
      }
    };
    $pp_print_as_size = (dynamic $state, dynamic $size, dynamic $s) : dynamic ==> {
      $cr_ = $state[14] < $state[15] ? 1 : (0);
      return $cr_ ? $enqueue_string_as($state, $size, $s) : ($cr_);
    };
    $pp_print_as = (dynamic $state, dynamic $isize, dynamic $s) : dynamic ==> {
      return $pp_print_as_size($state, $id($isize), $s);
    };
    $pp_print_string = (dynamic $state, dynamic $s) : dynamic ==> {
      return $pp_print_as($state, $caml_ml_string_length($s), $s);
    };
    $pp_print_int = (dynamic $state, dynamic $i) : dynamic ==> {
      return $pp_print_string($state, $call1($Stdlib_int[10], $i));
    };
    $pp_print_float = (dynamic $state, dynamic $f) : dynamic ==> {
      return $pp_print_string($state, $call1($Stdlib[35], $f));
    };
    $pp_print_bool = (dynamic $state, dynamic $b) : dynamic ==> {
      return $pp_print_string($state, $call1($Stdlib[30], $b));
    };
    $pp_print_char = (dynamic $state, dynamic $c) : dynamic ==> {
      return $pp_print_as($state, 1, $call2($Stdlib_string[1], 1, $c));
    };
    $pp_open_hbox = (dynamic $state, dynamic $param) : dynamic ==> {
      return $pp_open_box_gen($state, 0, 0);
    };
    $pp_open_vbox = (dynamic $state, dynamic $indent) : dynamic ==> {
      return $pp_open_box_gen($state, $indent, 1);
    };
    $pp_open_hvbox = (dynamic $state, dynamic $indent) : dynamic ==> {
      return $pp_open_box_gen($state, $indent, 2);
    };
    $pp_open_hovbox = (dynamic $state, dynamic $indent) : dynamic ==> {
      return $pp_open_box_gen($state, $indent, 3);
    };
    $pp_open_box = (dynamic $state, dynamic $indent) : dynamic ==> {
      return $pp_open_box_gen($state, $indent, 4);
    };
    $pp_print_newline = (dynamic $state, dynamic $param) : dynamic ==> {
      $pp_flush_queue($state, 1);
      return $call1($state[18], 0);
    };
    $pp_print_flush = (dynamic $state, dynamic $param) : dynamic ==> {
      $pp_flush_queue($state, 0);
      return $call1($state[18], 0);
    };
    $pp_force_newline = (dynamic $state, dynamic $param) : dynamic ==> {
      $cq_ = $state[14] < $state[15] ? 1 : (0);
      return $cq_ ? $enqueue_advance($state, Vector{0, $size, 3, 0}) : ($cq_);
    };
    $pp_print_if_newline = (dynamic $state, dynamic $param) : dynamic ==> {
      $cp_ = $state[14] < $state[15] ? 1 : (0);
      return $cp_ ? $enqueue_advance($state, Vector{0, $size, 4, 0}) : ($cp_);
    };
    $pp_print_custom_break = (dynamic $state, dynamic $fits, dynamic $breaks) : dynamic ==> {
      $size = null as dynamic;
      $token = null as dynamic;
      $length = null as dynamic;
      $elem = null as dynamic;
      $after = $fits[3];
      $width = $fits[2];
      $before = $fits[1];
      $co_ = $state[14] < $state[15] ? 1 : (0);
      if ($co_) {
        $size = $id((int) - $state[13]);
        $token = Vector{1, $fits, $breaks} as dynamic;
        $length =
          (int)
          ((int)
           ($caml_ml_string_length($before) + $width) + $caml_ml_string_length($after)) as dynamic;
        $elem = Vector{0, $size, $token, $length} as dynamic;
        return $scan_push($state, 1, $elem);
      }
      return $co_;
    };
    $pp_print_break = (dynamic $state, dynamic $width, dynamic $offset) : dynamic ==> {
      return $pp_print_custom_break(
        $state,
        Vector{0, $cst__7, $width, $cst__6},
        Vector{0, $cst__5, $offset, $cst__4}
      );
    };
    $pp_print_space = (dynamic $state, dynamic $param) : dynamic ==> {
      return $pp_print_break($state, 1, 0);
    };
    $pp_print_cut = (dynamic $state, dynamic $param) : dynamic ==> {
      return $pp_print_break($state, 0, 0);
    };
    $pp_open_tbox = (dynamic $state, dynamic $param) : dynamic ==> {
      $elem = null as dynamic;
      $state[14] = (int) ($state[14] + 1);
      $cn_ = $state[14] < $state[15] ? 1 : (0);
      if ($cn_) {
        $elem = Vector{0, $size, Vector{4, Vector{0, Vector{0, 0}}}, 0} as dynamic;
        return $enqueue_advance($state, $elem);
      }
      return $cn_;
    };
    $pp_close_tbox = (dynamic $state, dynamic $param) : dynamic ==> {
      $cl_ = null as dynamic;
      $elem = null as dynamic;
      $cm_ = null as dynamic;
      $ck_ = 1 < $state[14] ? 1 : (0);
      if ($ck_) {
        $cl_ = $state[14] < $state[15] ? 1 : (0);
        if ($cl_) {
          $elem = Vector{0, $size, 2, 0} as dynamic;
          $enqueue_advance($state, $elem);
          $state[14] = (int) ($state[14] + -1);
          $cm_ = 0 as dynamic;
        }
        else {$cm_ = $cl_;}
      }
      else {$cm_ = $ck_;}
      return $cm_;
    };
    $pp_print_tbreak = (dynamic $state, dynamic $width, dynamic $offset) : dynamic ==> {
      $size = null as dynamic;
      $elem = null as dynamic;
      $cj_ = $state[14] < $state[15] ? 1 : (0);
      if ($cj_) {
        $size = $id((int) - $state[13]);
        $elem = Vector{0, $size, Vector{2, $width, $offset}, $width} as dynamic;
        return $scan_push($state, 1, $elem);
      }
      return $cj_;
    };
    $pp_print_tab = (dynamic $state, dynamic $param) : dynamic ==> {
      return $pp_print_tbreak($state, 0, 0);
    };
    $pp_set_tab = (dynamic $state, dynamic $param) : dynamic ==> {
      $elem = null as dynamic;
      $ci_ = $state[14] < $state[15] ? 1 : (0);
      if ($ci_) {
        $elem = Vector{0, $size, 0, 0} as dynamic;
        return $enqueue_advance($state, $elem);
      }
      return $ci_;
    };
    $pp_set_max_boxes = (dynamic $state, dynamic $n) : dynamic ==> {
      $ch_ = null as dynamic;
      $cg_ = 1 < $n ? 1 : (0);
      if ($cg_) {
        $state[15] = $n;
        $ch_ = 0 as dynamic;
      }
      else {$ch_ = $cg_;}
      return $ch_;
    };
    $pp_get_max_boxes = (dynamic $state, dynamic $param) : dynamic ==> {
      return $state[15];
    };
    $pp_over_max_boxes = (dynamic $state, dynamic $param) : dynamic ==> {
      return $state[14] === $state[15] ? 1 : (0);
    };
    $pp_set_ellipsis_text = (dynamic $state, dynamic $s) : dynamic ==> {
      $state[16] = $s;
      return 0;
    };
    $pp_get_ellipsis_text = (dynamic $state, dynamic $param) : dynamic ==> {
      return $state[16];
    };
    $pp_limit = (dynamic $n) : dynamic ==> {
      return $n < 1000000010 ? $n : (1000000009);
    };
    $pp_set_min_space_left = (dynamic $state, dynamic $n) : dynamic ==> {
      $n__0 = null as dynamic;
      $cf_ = 1 <= $n ? 1 : (0);
      if ($cf_) {
        $n__0 = $pp_limit($n);
        $state[7] = $n__0;
        $state[8] = (int) ($state[6] - $state[7]);
        return $pp_rinit($state);
      }
      return $cf_;
    };
    $pp_set_max_indent = (dynamic $state, dynamic $n) : dynamic ==> {
      $ce_ = 1 < $n ? 1 : (0);
      return $ce_
        ? $pp_set_min_space_left($state, (int) ($state[6] - $n))
        : ($ce_);
    };
    $pp_get_max_indent = (dynamic $state, dynamic $param) : dynamic ==> {
      return $state[8];
    };
    $pp_set_margin = (dynamic $state, dynamic $n) : dynamic ==> {
      $n__0 = null as dynamic;
      $new_max_indent = null as dynamic;
      $cd_ = null as dynamic;
      $cc_ = 1 <= $n ? 1 : (0);
      if ($cc_) {
        $n__0 = $pp_limit($n);
        $state[6] = $n__0;
        if ($state[8] <= $state[6]) {
          $new_max_indent = $state[8];
        }
        else {
          $cd_ =
            $call2(
              $Stdlib[17],
              (int)
              ($state[6] - $state[7]),
              (int)
              ($state[6] / 2)
            );
          $new_max_indent = $call2($Stdlib[17], $cd_, 1);
        }
        return $pp_set_max_indent($state, $new_max_indent);
      }
      return $cc_;
    };
    $check_geometry = (dynamic $geometry) : dynamic ==> {
      $ca_ = 1 < $geometry[1] ? 1 : (0);
      $cb_ = $ca_ ? $geometry[1] < $geometry[2] ? 1 : (0) : ($ca_);
      return $cb_;
    };
    $pp_get_margin = (dynamic $state, dynamic $param) : dynamic ==> {
      return $state[6];
    };
    $pp_set_geometry = (dynamic $state, dynamic $max_indent, dynamic $margin) : dynamic ==> {
      if (2 <= $max_indent) {
        if ($margin <= $max_indent) {
          throw $caml_wrap_thrown_exception(
                  Vector{
                    0,
                    $Stdlib[6],
                    $cst_Format_pp_set_geometry_margin_max_indent
                  }
                ) as \Throwable;
        }
        $pp_set_margin($state, $margin);
        return $pp_set_max_indent($state, $max_indent);
      }
      throw $caml_wrap_thrown_exception(
              Vector{0, $Stdlib[6], $cst_Format_pp_set_geometry_max_indent_2}
            ) as \Throwable;
    };
    $pp_safe_set_geometry = 
    (dynamic $state, dynamic $max_indent, dynamic $margin) : dynamic ==> {
      return $check_geometry(Vector{0, $max_indent, $margin})
        ? $pp_set_geometry($state, $max_indent, $margin)
        : (0);
    };
    $pp_get_geometry = (dynamic $state, dynamic $param) : dynamic ==> {
      $b__ = $pp_get_margin($state, 0);
      return Vector{0, $pp_get_max_indent($state, 0), $b__};
    };
    $pp_set_formatter_out_functions = (dynamic $state, dynamic $param) : dynamic ==> {
      $j = $param[5];
      $i = $param[4];
      $h = $param[3];
      $g = $param[2];
      $f = $param[1];
      $state[17] = $f;
      $state[18] = $g;
      $state[19] = $h;
      $state[20] = $i;
      $state[21] = $j;
      return 0;
    };
    $pp_get_formatter_out_functions = (dynamic $state, dynamic $param) : dynamic ==> {
      return Vector{
        0,
        $state[17],
        $state[18],
        $state[19],
        $state[20],
        $state[21]
      };
    };
    $pp_set_formatter_output_functions = 
    (dynamic $state, dynamic $f, dynamic $g) : dynamic ==> {
      $state[17] = $f;
      $state[18] = $g;
      return 0;
    };
    $pp_get_formatter_output_functions = (dynamic $state, dynamic $param) : dynamic ==> {
      return Vector{0, $state[17], $state[18]};
    };
    $display_newline = (dynamic $state, dynamic $param) : dynamic ==> {
      return $call3($state[17], $cst__8, 0, 1);
    };
    $blank_line = $call2($Stdlib_string[1], 80, 32);
    $display_blanks = (dynamic $state, dynamic $n) : dynamic ==> {
      $b9_ = null as dynamic;
      $n__1 = null as dynamic;
      $n__0 = $n;
      for (;;) {
        $b9_ = 0 < $n__0 ? 1 : (0);
        if ($b9_) {
          if (80 < $n__0) {
            $call3($state[17], $blank_line, 0, 80);
            $n__1 = (int) ($n__0 + -80) as dynamic;
            $n__0 = $n__1;
            continue;
          }
          return $call3($state[17], $blank_line, 0, $n__0);
        }
        return $b9_;
      }
    };
    $pp_set_formatter_out_channel = (dynamic $state, dynamic $oc) : dynamic ==> {
      $state[17] = $call1($Stdlib[69], $oc);
      $state[18] =
        (dynamic $param) : dynamic ==> {return $call1($Stdlib[63], $oc);};
      $state[19] =
        (dynamic $b8_) : dynamic ==> {return $display_newline($state, $b8_);};
      $state[20] =
        (dynamic $b7_) : dynamic ==> {return $display_blanks($state, $b7_);};
      $state[21] =
        (dynamic $b6_) : dynamic ==> {return $display_blanks($state, $b6_);};
      return 0;
    };
    $default_pp_mark_open_tag = (dynamic $param) : dynamic ==> {
      $b5_ = null as dynamic;
      $s = null as dynamic;
      if ($param[1] === $String_tag) {
        $s = $param[2];
        $b5_ = $call2($Stdlib[28], $s, $cst__9);
        return $call2($Stdlib[28], $cst__10, $b5_);
      }
      return $cst__11;
    };
    $default_pp_mark_close_tag = (dynamic $param) : dynamic ==> {
      $b4_ = null as dynamic;
      $s = null as dynamic;
      if ($param[1] === $String_tag) {
        $s = $param[2];
        $b4_ = $call2($Stdlib[28], $s, $cst__12);
        return $call2($Stdlib[28], $cst__13, $b4_);
      }
      return $cst__14;
    };
    $default_pp_print_open_tag = (dynamic $b3_) : dynamic ==> {return 0;};
    $default_pp_print_close_tag = (dynamic $b2_) : dynamic ==> {return 0;};
    $pp_make_formatter = 
    (dynamic $f, dynamic $g, dynamic $h, dynamic $i, dynamic $j) : dynamic ==> {
      $pp_queue = $call1($Stdlib_queue[2], 0);
      $sys_tok = Vector{0, $unknown, $c_, 0} as dynamic;
      $call2($Stdlib_queue[3], $sys_tok, $pp_queue);
      $scan_stack = $call1($Stdlib_stack[2], 0);
      $initialize_scan_stack($scan_stack);
      $call2($Stdlib_stack[3], Vector{0, 1, $sys_tok}, $scan_stack);
      $bY_ = $Stdlib[19];
      $bZ_ = $call1($Stdlib_stack[2], 0);
      $b0_ = $call1($Stdlib_stack[2], 0);
      $b1_ = $call1($Stdlib_stack[2], 0);
      return Vector{
        0,
        $scan_stack,
        $call1($Stdlib_stack[2], 0),
        $b1_,
        $b0_,
        $bZ_,
        78,
        10,
        68,
        78,
        0,
        1,
        1,
        1,
        1,
        $bY_,
        $cst__15,
        $f,
        $g,
        $h,
        $i,
        $j,
        0,
        0,
        $default_pp_mark_open_tag,
        $default_pp_mark_close_tag,
        $default_pp_print_open_tag,
        $default_pp_print_close_tag,
        $pp_queue
      };
    };
    $formatter_of_out_functions = (dynamic $out_funs) : dynamic ==> {
      return $pp_make_formatter(
        $out_funs[1],
        $out_funs[2],
        $out_funs[3],
        $out_funs[4],
        $out_funs[5]
      );
    };
    $make_formatter = (dynamic $output, dynamic $flush) : dynamic ==> {
      $bQ_ = (dynamic $bX_) : dynamic ==> {return 0;};
      $bR_ = (dynamic $bW_) : dynamic ==> {return 0;};
      $ppf = $pp_make_formatter(
        $output,
        $flush,
        (dynamic $bV_) : dynamic ==> {return 0;},
        $bR_,
        $bQ_
      );
      $ppf[19] =
        (dynamic $bU_) : dynamic ==> {return $display_newline($ppf, $bU_);};
      $ppf[20] =
        (dynamic $bT_) : dynamic ==> {return $display_blanks($ppf, $bT_);};
      $ppf[21] =
        (dynamic $bS_) : dynamic ==> {return $display_blanks($ppf, $bS_);};
      return $ppf;
    };
    $formatter_of_out_channel = (dynamic $oc) : dynamic ==> {
      $bP_ = (dynamic $param) : dynamic ==> {return $call1($Stdlib[63], $oc);};
      return $make_formatter($call1($Stdlib[69], $oc), $bP_);
    };
    $formatter_of_buffer = (dynamic $b) : dynamic ==> {
      $bN_ = (dynamic $bO_) : dynamic ==> {return 0;};
      return $make_formatter($call1($Stdlib_buffer[16], $b), $bN_);
    };
    $pp_buffer_size = 512 as dynamic;
    $pp_make_buffer = (dynamic $param) : dynamic ==> {
      return $call1($Stdlib_buffer[1], $pp_buffer_size);
    };
    $stdbuf = $pp_make_buffer(0);
    $std_formatter = $formatter_of_out_channel($Stdlib[39]);
    $err_formatter = $formatter_of_out_channel($Stdlib[40]);
    $str_formatter = $formatter_of_buffer($stdbuf);
    $flush_buffer_formatter = (dynamic $buf, dynamic $ppf) : dynamic ==> {
      $pp_flush_queue($ppf, 0);
      $s = $call1($Stdlib_buffer[2], $buf);
      $call1($Stdlib_buffer[9], $buf);
      return $s;
    };
    $flush_str_formatter = (dynamic $param) : dynamic ==> {
      return $flush_buffer_formatter($stdbuf, $str_formatter);
    };
    $make_symbolic_output_buffer = (dynamic $param) : dynamic ==> {
      return Vector{0, 0};
    };
    $clear_symbolic_output_buffer = (dynamic $sob) : dynamic ==> {
      $sob[1] = 0;
      return 0;
    };
    $get_symbolic_output_buffer = (dynamic $sob) : dynamic ==> {
      return $call1($Stdlib_list[9], $sob[1]);
    };
    $flush_symbolic_output_buffer = (dynamic $sob) : dynamic ==> {
      $items = $get_symbolic_output_buffer($sob);
      $clear_symbolic_output_buffer($sob);
      return $items;
    };
    $add_symbolic_output_item = (dynamic $sob, dynamic $item) : dynamic ==> {
      $sob[1] = Vector{0, $item, $sob[1]};
      return 0;
    };
    $formatter_of_symbolic_output_buffer = (dynamic $sob) : dynamic ==> {
      $symbolic_flush = (dynamic $sob, dynamic $param) : dynamic ==> {
        return $add_symbolic_output_item($sob, 0);
      };
      $symbolic_newline = (dynamic $sob, dynamic $param) : dynamic ==> {
        return $add_symbolic_output_item($sob, 1);
      };
      $symbolic_string = (dynamic $sob, dynamic $s, dynamic $i, dynamic $n) : dynamic ==> {
        return $add_symbolic_output_item(
          $sob,
          Vector{0, $call3($Stdlib_string[4], $s, $i, $n)}
        );
      };
      $symbolic_spaces = (dynamic $sob, dynamic $n) : dynamic ==> {
        return $add_symbolic_output_item($sob, Vector{1, $n});
      };
      $symbolic_indent = (dynamic $sob, dynamic $n) : dynamic ==> {
        return $add_symbolic_output_item($sob, Vector{2, $n});
      };
      $f = (dynamic $bK_, dynamic $bL_, dynamic $bM_) : dynamic ==> {
        return $symbolic_string($sob, $bK_, $bL_, $bM_);
      };
      $g = (dynamic $bJ_) : dynamic ==> {return $symbolic_flush($sob, $bJ_);};
      $h = (dynamic $bI_) : dynamic ==> {
        return $symbolic_newline($sob, $bI_);
      };
      $i = (dynamic $bH_) : dynamic ==> {return $symbolic_spaces($sob, $bH_);};
      $j = (dynamic $bG_) : dynamic ==> {return $symbolic_indent($sob, $bG_);};
      return $pp_make_formatter($f, $g, $h, $i, $j);
    };
    $open_hbox = (dynamic $bF_) : dynamic ==> {
      return $pp_open_hbox($std_formatter, $bF_);
    };
    $open_vbox = (dynamic $bE_) : dynamic ==> {
      return $pp_open_vbox($std_formatter, $bE_);
    };
    $open_hvbox = (dynamic $bD_) : dynamic ==> {
      return $pp_open_hvbox($std_formatter, $bD_);
    };
    $open_hovbox = (dynamic $bC_) : dynamic ==> {
      return $pp_open_hovbox($std_formatter, $bC_);
    };
    $open_box = (dynamic $bB_) : dynamic ==> {
      return $pp_open_box($std_formatter, $bB_);
    };
    $close_box = (dynamic $bA_) : dynamic ==> {
      return $pp_close_box($std_formatter, $bA_);
    };
    $open_tag = (dynamic $bz_) : dynamic ==> {
      return $pp_open_tag($std_formatter, $bz_);
    };
    $close_tag = (dynamic $by_) : dynamic ==> {
      return $pp_close_tag($std_formatter, $by_);
    };
    $open_stag = (dynamic $bx_) : dynamic ==> {
      return $pp_open_stag($std_formatter, $bx_);
    };
    $close_stag = (dynamic $bw_) : dynamic ==> {
      return $pp_close_stag($std_formatter, $bw_);
    };
    $print_as = (dynamic $bu_, dynamic $bv_) : dynamic ==> {
      return $pp_print_as($std_formatter, $bu_, $bv_);
    };
    $print_string = (dynamic $bt_) : dynamic ==> {
      return $pp_print_string($std_formatter, $bt_);
    };
    $print_int = (dynamic $bs_) : dynamic ==> {
      return $pp_print_int($std_formatter, $bs_);
    };
    $print_float = (dynamic $br_) : dynamic ==> {
      return $pp_print_float($std_formatter, $br_);
    };
    $print_char = (dynamic $bq_) : dynamic ==> {
      return $pp_print_char($std_formatter, $bq_);
    };
    $print_bool = (dynamic $bp_) : dynamic ==> {
      return $pp_print_bool($std_formatter, $bp_);
    };
    $print_break = (dynamic $bn_, dynamic $bo_) : dynamic ==> {
      return $pp_print_break($std_formatter, $bn_, $bo_);
    };
    $print_cut = (dynamic $bm_) : dynamic ==> {
      return $pp_print_cut($std_formatter, $bm_);
    };
    $print_space = (dynamic $bl_) : dynamic ==> {
      return $pp_print_space($std_formatter, $bl_);
    };
    $force_newline = (dynamic $bk_) : dynamic ==> {
      return $pp_force_newline($std_formatter, $bk_);
    };
    $print_flush = (dynamic $bj_) : dynamic ==> {
      return $pp_print_flush($std_formatter, $bj_);
    };
    $print_newline = (dynamic $bi_) : dynamic ==> {
      return $pp_print_newline($std_formatter, $bi_);
    };
    $print_if_newline = (dynamic $bh_) : dynamic ==> {
      return $pp_print_if_newline($std_formatter, $bh_);
    };
    $open_tbox = (dynamic $bg_) : dynamic ==> {
      return $pp_open_tbox($std_formatter, $bg_);
    };
    $close_tbox = (dynamic $bf_) : dynamic ==> {
      return $pp_close_tbox($std_formatter, $bf_);
    };
    $print_tbreak = (dynamic $bd_, dynamic $be_) : dynamic ==> {
      return $pp_print_tbreak($std_formatter, $bd_, $be_);
    };
    $set_tab = (dynamic $bc_) : dynamic ==> {
      return $pp_set_tab($std_formatter, $bc_);
    };
    $print_tab = (dynamic $bb_) : dynamic ==> {
      return $pp_print_tab($std_formatter, $bb_);
    };
    $set_margin = (dynamic $ba_) : dynamic ==> {
      return $pp_set_margin($std_formatter, $ba_);
    };
    $get_margin = (dynamic $a__) : dynamic ==> {
      return $pp_get_margin($std_formatter, $a__);
    };
    $set_max_indent = (dynamic $a9_) : dynamic ==> {
      return $pp_set_max_indent($std_formatter, $a9_);
    };
    $get_max_indent = (dynamic $a8_) : dynamic ==> {
      return $pp_get_max_indent($std_formatter, $a8_);
    };
    $set_geometry = (dynamic $a6_, dynamic $a7_) : dynamic ==> {
      return $pp_set_geometry($std_formatter, $a6_, $a7_);
    };
    $safe_set_geometry = (dynamic $a4_, dynamic $a5_) : dynamic ==> {
      return $pp_safe_set_geometry($std_formatter, $a4_, $a5_);
    };
    $get_geometry = (dynamic $a3_) : dynamic ==> {
      return $pp_get_geometry($std_formatter, $a3_);
    };
    $set_max_boxes = (dynamic $a2_) : dynamic ==> {
      return $pp_set_max_boxes($std_formatter, $a2_);
    };
    $get_max_boxes = (dynamic $a1_) : dynamic ==> {
      return $pp_get_max_boxes($std_formatter, $a1_);
    };
    $over_max_boxes = (dynamic $a0_) : dynamic ==> {
      return $pp_over_max_boxes($std_formatter, $a0_);
    };
    $set_ellipsis_text = (dynamic $aZ_) : dynamic ==> {
      return $pp_set_ellipsis_text($std_formatter, $aZ_);
    };
    $get_ellipsis_text = (dynamic $aY_) : dynamic ==> {
      return $pp_get_ellipsis_text($std_formatter, $aY_);
    };
    $set_formatter_out_channel = (dynamic $aX_) : dynamic ==> {
      return $pp_set_formatter_out_channel($std_formatter, $aX_);
    };
    $set_formatter_out_functions = (dynamic $aW_) : dynamic ==> {
      return $pp_set_formatter_out_functions($std_formatter, $aW_);
    };
    $get_formatter_out_functions = (dynamic $aV_) : dynamic ==> {
      return $pp_get_formatter_out_functions($std_formatter, $aV_);
    };
    $set_formatter_output_functions = (dynamic $aT_, dynamic $aU_) : dynamic ==> {
      return $pp_set_formatter_output_functions($std_formatter, $aT_, $aU_);
    };
    $get_formatter_output_functions = (dynamic $aS_) : dynamic ==> {
      return $pp_get_formatter_output_functions($std_formatter, $aS_);
    };
    $set_formatter_stag_functions = (dynamic $aR_) : dynamic ==> {
      return $pp_set_formatter_stag_functions($std_formatter, $aR_);
    };
    $get_formatter_stag_functions = (dynamic $aQ_) : dynamic ==> {
      return $pp_get_formatter_stag_functions($std_formatter, $aQ_);
    };
    $set_print_tags = (dynamic $aP_) : dynamic ==> {
      return $pp_set_print_tags($std_formatter, $aP_);
    };
    $get_print_tags = (dynamic $aO_) : dynamic ==> {
      return $pp_get_print_tags($std_formatter, $aO_);
    };
    $set_mark_tags = (dynamic $aN_) : dynamic ==> {
      return $pp_set_mark_tags($std_formatter, $aN_);
    };
    $get_mark_tags = (dynamic $aM_) : dynamic ==> {
      return $pp_get_mark_tags($std_formatter, $aM_);
    };
    $set_tags = (dynamic $aL_) : dynamic ==> {
      return $pp_set_tags($std_formatter, $aL_);
    };
    $pp_print_list = 
    (dynamic $opt, dynamic $pp_v, dynamic $ppf, dynamic $param) : dynamic ==> {
      $sth = null as dynamic;
      $pp_sep = null as dynamic;
      $aJ_ = null as dynamic;
      $aK_ = null as dynamic;
      $opt__1 = null as dynamic;
      $opt__0 = $opt;
      $param__0 = $param;
      for (;;) {
        if ($opt__0) {
          $sth = $opt__0[1];
          $pp_sep = $sth;
        }
        else {$pp_sep = $pp_print_cut;}
        if ($param__0) {
          $aJ_ = $param__0[2];
          $aK_ = $param__0[1];
          if ($aJ_) {
            $call2($pp_v, $ppf, $aK_);
            $call2($pp_sep, $ppf, 0);
            $opt__1 = Vector{0, $pp_sep} as dynamic;
            $opt__0 = $opt__1;
            $param__0 = $aJ_;
            continue;
          }
          return $call2($pp_v, $ppf, $aK_);
        }
        return 0;
      }
    };
    $pp_print_text = (dynamic $ppf, dynamic $s) : dynamic ==> {
      $match = null as dynamic;
      $aI_ = null as dynamic;
      $len = $caml_ml_string_length($s);
      $left = Vector{0, 0} as dynamic;
      $right = Vector{0, 0} as dynamic;
      $flush = (dynamic $param) : dynamic ==> {
        $pp_print_string(
          $ppf,
          $call3($Stdlib_string[4], $s, $left[1], (int) ($right[1] - $left[1])
          )
        );
        $right[1] = $right[1] + 1;
        $left[1] = $right[1];
        return 0;
      };
      for (;;) {
        if ($right[1] !== $len) {
          $match = $runtime["caml_string_get"]($s, $right[1]);
          if (10 === $match) {
            $flush(0);
            $pp_force_newline($ppf, 0);
          }
          else {
            if (32 === $match) {
              $flush(0);
              $pp_print_space($ppf, 0);
            }
            else {$right[1] = $right[1] + 1;}
          }
          continue;
        }
        $aI_ = $left[1] !== $len ? 1 : (0);
        return $aI_ ? $flush(0) : ($aI_);
      }
    };
    $pp_print_option = 
    (dynamic $opt, dynamic $pp_v, dynamic $ppf, dynamic $param) : dynamic ==> {
      $v = null as dynamic;
      $none = null as dynamic;
      $sth = null as dynamic;
      if ($opt) {
        $sth = $opt[1];
        $none = $sth;
      }
      else {$none = (dynamic $param, dynamic $aH_) : dynamic ==> {return 0;};}
      if ($param) {$v = $param[1];return $call2($pp_v, $ppf, $v);}
      return $call2($none, $ppf, 0);
    };
    $pp_print_result = 
    (dynamic $ok, dynamic $error, dynamic $ppf, dynamic $param) : dynamic ==> {
      $v = null as dynamic;
      if (0 === $param[0]) {$v = $param[1];return $call2($ok, $ppf, $v);}
      $e = $param[1];
      return $call2($error, $ppf, $e);
    };
    $compute_tag = (dynamic $output, dynamic $tag_acc) : dynamic ==> {
      $buf = $call1($Stdlib_buffer[1], 16);
      $ppf = $formatter_of_buffer($buf);
      $call2($output, $ppf, $tag_acc);
      $pp_print_flush($ppf, 0);
      $len = $call1($Stdlib_buffer[7], $buf);
      return 2 <= $len
        ? $call3($Stdlib_buffer[4], $buf, 1, (int) ($len + -2))
        : ($call1($Stdlib_buffer[2], $buf));
    };
    $output_formatting_lit = (dynamic $ppf, dynamic $fmting_lit) : dynamic ==> {
      $c = null as dynamic;
      $width = null as dynamic;
      $offset = null as dynamic;
      if ($is_int($fmting_lit)) {
        switch($fmting_lit) {
          // FALLTHROUGH
          case 0:
            return $pp_close_box($ppf, 0);
          // FALLTHROUGH
          case 1:
            return $pp_close_tag($ppf, 0);
          // FALLTHROUGH
          case 2:
            return $pp_print_flush($ppf, 0);
          // FALLTHROUGH
          case 3:
            return $pp_force_newline($ppf, 0);
          // FALLTHROUGH
          case 4:
            return $pp_print_newline($ppf, 0);
          // FALLTHROUGH
          case 5:
            return $pp_print_char($ppf, 64);
          // FALLTHROUGH
          default:
            return $pp_print_char($ppf, 37);
          }
      }
      else {
        switch($fmting_lit[0]) {
          // FALLTHROUGH
          case 0:
            $offset = $fmting_lit[3];
            $width = $fmting_lit[2];
            return $pp_print_break($ppf, $width, $offset);
          // FALLTHROUGH
          case 1:
            return 0;
          // FALLTHROUGH
          default:
            $c = $fmting_lit[1];
            $pp_print_char($ppf, 64);
            return $pp_print_char($ppf, $c);
          }
      }
    };
    $output_acc->contents = (dynamic $ppf, dynamic $acc) : dynamic ==> {
      $switch__8 = null as dynamic;
      $switch__7 = null as dynamic;
      $switch__6 = null as dynamic;
      $switch__5 = null as dynamic;
      $switch__4 = null as dynamic;
      $switch__3 = null as dynamic;
      $switch__2 = null as dynamic;
      $switch__1 = null as dynamic;
      $switch__0 = null as dynamic;
      $p__6 = null as dynamic;
      $msg = null as dynamic;
      $p__5 = null as dynamic;
      $p__4 = null as dynamic;
      $f__0 = null as dynamic;
      $aG_ = null as dynamic;
      $aF_ = null as dynamic;
      $aE_ = null as dynamic;
      $aD_ = null as dynamic;
      $aC_ = null as dynamic;
      $aB_ = null as dynamic;
      $aA_ = null as dynamic;
      $az_ = null as dynamic;
      $ay_ = null as dynamic;
      $ax_ = null as dynamic;
      $aw_ = null as dynamic;
      $av_ = null as dynamic;
      $au_ = null as dynamic;
      $p__3 = null as dynamic;
      $size__0 = null as dynamic;
      $c__0 = null as dynamic;
      $at_ = null as dynamic;
      $as_ = null as dynamic;
      $ar_ = null as dynamic;
      $aq_ = null as dynamic;
      $p__2 = null as dynamic;
      $c = null as dynamic;
      $ap_ = null as dynamic;
      $ao_ = null as dynamic;
      $p__1 = null as dynamic;
      $size = null as dynamic;
      $s__0 = null as dynamic;
      $an_ = null as dynamic;
      $am_ = null as dynamic;
      $al_ = null as dynamic;
      $ak_ = null as dynamic;
      $p__0 = null as dynamic;
      $s = null as dynamic;
      $aj_ = null as dynamic;
      $ai_ = null as dynamic;
      $indent = null as dynamic;
      $bty = null as dynamic;
      $match = null as dynamic;
      $ah_ = null as dynamic;
      $acc__1 = null as dynamic;
      $acc__0 = null as dynamic;
      $ag_ = null as dynamic;
      $af_ = null as dynamic;
      $p = null as dynamic;
      $f = null as dynamic;
      if ($is_int($acc)) {return 0;}
      else {
        switch($acc[0]) {
          // FALLTHROUGH
          case 0:
            $f = $acc[2];
            $p = $acc[1];
            $output_acc->contents($ppf, $p);
            return $output_formatting_lit($ppf, $f);
          // FALLTHROUGH
          case 1:
            $af_ = $acc[2];
            $ag_ = $acc[1];
            if (0 === $af_[0]) {
              $acc__0 = $af_[1];
              $output_acc->contents($ppf, $ag_);
              return $pp_open_stag(
                $ppf,
                Vector{
                  0,
                  $String_tag,
                  $compute_tag($output_acc->contents, $acc__0)
                }
              );
            }
            $acc__1 = $af_[1];
            $output_acc->contents($ppf, $ag_);
            $ah_ = $compute_tag($output_acc->contents, $acc__1);
            $match = $call1($CamlinternalFormat[21], $ah_);
            $bty = $match[2];
            $indent = $match[1];
            return $pp_open_box_gen($ppf, $indent, $bty);
          // FALLTHROUGH
          case 2:
            $ai_ = $acc[1];
            if ($is_int($ai_)) {
              $switch__1 = 1 as dynamic;
            }
            else {
              if (0 === $ai_[0]) {
                $ak_ = $ai_[2];
                if ($is_int($ak_)) {
                  $switch__2 = 1 as dynamic;
                }
                else {
                  if (1 === $ak_[0]) {
                    $al_ = $acc[2];
                    $am_ = $ak_[2];
                    $an_ = $ai_[1];
                    $p__1 = $an_;
                    $size = $am_;
                    $s__0 = $al_;
                    $switch__0 = 0 as dynamic;
                    $switch__1 = 0 as dynamic;
                    $switch__2 = 0 as dynamic;
                  }
                  else {$switch__2 = 1 as dynamic;}
                }
                if ($switch__2) {$switch__1 = 1 as dynamic;}
              }
              else {$switch__1 = 1 as dynamic;}
            }
            if ($switch__1) {
              $aj_ = $acc[2];
              $p__0 = $ai_;
              $s = $aj_;
              $switch__0 = 2 as dynamic;
            }
            break;
          // FALLTHROUGH
          case 3:
            $ao_ = $acc[1];
            if ($is_int($ao_)) {
              $switch__3 = 1 as dynamic;
            }
            else {
              if (0 === $ao_[0]) {
                $aq_ = $ao_[2];
                if ($is_int($aq_)) {
                  $switch__4 = 1 as dynamic;
                }
                else {
                  if (1 === $aq_[0]) {
                    $ar_ = $acc[2];
                    $as_ = $aq_[2];
                    $at_ = $ao_[1];
                    $p__3 = $at_;
                    $size__0 = $as_;
                    $c__0 = $ar_;
                    $switch__0 = 1 as dynamic;
                    $switch__3 = 0 as dynamic;
                    $switch__4 = 0 as dynamic;
                  }
                  else {$switch__4 = 1 as dynamic;}
                }
                if ($switch__4) {$switch__3 = 1 as dynamic;}
              }
              else {$switch__3 = 1 as dynamic;}
            }
            if ($switch__3) {
              $ap_ = $acc[2];
              $p__2 = $ao_;
              $c = $ap_;
              $switch__0 = 3 as dynamic;
            }
            break;
          // FALLTHROUGH
          case 4:
            $av_ = $acc[1];
            if ($is_int($av_)) {
              $switch__5 = 1 as dynamic;
            }
            else {
              if (0 === $av_[0]) {
                $ax_ = $av_[2];
                if ($is_int($ax_)) {
                  $switch__6 = 1 as dynamic;
                }
                else {
                  if (1 === $ax_[0]) {
                    $ay_ = $acc[2];
                    $az_ = $ax_[2];
                    $aA_ = $av_[1];
                    $p__1 = $aA_;
                    $size = $az_;
                    $s__0 = $ay_;
                    $switch__0 = 0 as dynamic;
                    $switch__5 = 0 as dynamic;
                    $switch__6 = 0 as dynamic;
                  }
                  else {$switch__6 = 1 as dynamic;}
                }
                if ($switch__6) {$switch__5 = 1 as dynamic;}
              }
              else {$switch__5 = 1 as dynamic;}
            }
            if ($switch__5) {
              $aw_ = $acc[2];
              $p__0 = $av_;
              $s = $aw_;
              $switch__0 = 2 as dynamic;
            }
            break;
          // FALLTHROUGH
          case 5:
            $aB_ = $acc[1];
            if ($is_int($aB_)) {
              $switch__7 = 1 as dynamic;
            }
            else {
              if (0 === $aB_[0]) {
                $aD_ = $aB_[2];
                if ($is_int($aD_)) {
                  $switch__8 = 1 as dynamic;
                }
                else {
                  if (1 === $aD_[0]) {
                    $aE_ = $acc[2];
                    $aF_ = $aD_[2];
                    $aG_ = $aB_[1];
                    $p__3 = $aG_;
                    $size__0 = $aF_;
                    $c__0 = $aE_;
                    $switch__0 = 1 as dynamic;
                    $switch__7 = 0 as dynamic;
                    $switch__8 = 0 as dynamic;
                  }
                  else {$switch__8 = 1 as dynamic;}
                }
                if ($switch__8) {$switch__7 = 1 as dynamic;}
              }
              else {$switch__7 = 1 as dynamic;}
            }
            if ($switch__7) {
              $aC_ = $acc[2];
              $p__2 = $aB_;
              $c = $aC_;
              $switch__0 = 3 as dynamic;
            }
            break;
          // FALLTHROUGH
          case 6:
            $f__0 = $acc[2];
            $p__4 = $acc[1];
            $output_acc->contents($ppf, $p__4);
            return $call1($f__0, $ppf);
          // FALLTHROUGH
          case 7:
            $p__5 = $acc[1];
            $output_acc->contents($ppf, $p__5);
            return $pp_print_flush($ppf, 0);
          // FALLTHROUGH
          default:
            $msg = $acc[2];
            $p__6 = $acc[1];
            $output_acc->contents($ppf, $p__6);
            return $call1($Stdlib[1], $msg);
          }
      }
      switch($switch__0) {
        // FALLTHROUGH
        case 0:
          $output_acc->contents($ppf, $p__1);
          return $pp_print_as_size($ppf, $id($size), $s__0);
        // FALLTHROUGH
        case 1:
          $output_acc->contents($ppf, $p__3);
          $au_ = $call2($Stdlib_string[1], 1, $c__0);
          return $pp_print_as_size($ppf, $id($size__0), $au_);
        // FALLTHROUGH
        case 2:
          $output_acc->contents($ppf, $p__0);
          return $pp_print_string($ppf, $s);
        // FALLTHROUGH
        default:
          $output_acc->contents($ppf, $p__2);
          return $pp_print_char($ppf, $c);
        }
    };
    $strput_acc->contents = (dynamic $ppf, dynamic $acc) : dynamic ==> {
      $switch__8 = null as dynamic;
      $switch__7 = null as dynamic;
      $switch__6 = null as dynamic;
      $switch__5 = null as dynamic;
      $switch__4 = null as dynamic;
      $switch__3 = null as dynamic;
      $switch__2 = null as dynamic;
      $switch__1 = null as dynamic;
      $switch__0 = null as dynamic;
      $p__6 = null as dynamic;
      $msg = null as dynamic;
      $p__5 = null as dynamic;
      $ae_ = null as dynamic;
      $p__4 = null as dynamic;
      $size__1 = null as dynamic;
      $f__1 = null as dynamic;
      $ad_ = null as dynamic;
      $f__0 = null as dynamic;
      $ac_ = null as dynamic;
      $ab_ = null as dynamic;
      $aa_ = null as dynamic;
      $Z_ = null as dynamic;
      $Y_ = null as dynamic;
      $X_ = null as dynamic;
      $W_ = null as dynamic;
      $V_ = null as dynamic;
      $U_ = null as dynamic;
      $T_ = null as dynamic;
      $S_ = null as dynamic;
      $R_ = null as dynamic;
      $Q_ = null as dynamic;
      $P_ = null as dynamic;
      $p__3 = null as dynamic;
      $size__0 = null as dynamic;
      $c__0 = null as dynamic;
      $O_ = null as dynamic;
      $N_ = null as dynamic;
      $M_ = null as dynamic;
      $L_ = null as dynamic;
      $p__2 = null as dynamic;
      $c = null as dynamic;
      $K_ = null as dynamic;
      $J_ = null as dynamic;
      $p__1 = null as dynamic;
      $size = null as dynamic;
      $s__0 = null as dynamic;
      $I_ = null as dynamic;
      $H_ = null as dynamic;
      $G_ = null as dynamic;
      $F_ = null as dynamic;
      $p__0 = null as dynamic;
      $s = null as dynamic;
      $E_ = null as dynamic;
      $D_ = null as dynamic;
      $indent = null as dynamic;
      $bty = null as dynamic;
      $match = null as dynamic;
      $C_ = null as dynamic;
      $acc__1 = null as dynamic;
      $acc__0 = null as dynamic;
      $B_ = null as dynamic;
      $A_ = null as dynamic;
      $p = null as dynamic;
      $f = null as dynamic;
      if ($is_int($acc)) {return 0;}
      else {
        switch($acc[0]) {
          // FALLTHROUGH
          case 0:
            $f = $acc[2];
            $p = $acc[1];
            $strput_acc->contents($ppf, $p);
            return $output_formatting_lit($ppf, $f);
          // FALLTHROUGH
          case 1:
            $A_ = $acc[2];
            $B_ = $acc[1];
            if (0 === $A_[0]) {
              $acc__0 = $A_[1];
              $strput_acc->contents($ppf, $B_);
              return $pp_open_stag(
                $ppf,
                Vector{
                  0,
                  $String_tag,
                  $compute_tag($strput_acc->contents, $acc__0)
                }
              );
            }
            $acc__1 = $A_[1];
            $strput_acc->contents($ppf, $B_);
            $C_ = $compute_tag($strput_acc->contents, $acc__1);
            $match = $call1($CamlinternalFormat[21], $C_);
            $bty = $match[2];
            $indent = $match[1];
            return $pp_open_box_gen($ppf, $indent, $bty);
          // FALLTHROUGH
          case 2:
            $D_ = $acc[1];
            if ($is_int($D_)) {
              $switch__1 = 1 as dynamic;
            }
            else {
              if (0 === $D_[0]) {
                $F_ = $D_[2];
                if ($is_int($F_)) {
                  $switch__2 = 1 as dynamic;
                }
                else {
                  if (1 === $F_[0]) {
                    $G_ = $acc[2];
                    $H_ = $F_[2];
                    $I_ = $D_[1];
                    $p__1 = $I_;
                    $size = $H_;
                    $s__0 = $G_;
                    $switch__0 = 0 as dynamic;
                    $switch__1 = 0 as dynamic;
                    $switch__2 = 0 as dynamic;
                  }
                  else {$switch__2 = 1 as dynamic;}
                }
                if ($switch__2) {$switch__1 = 1 as dynamic;}
              }
              else {$switch__1 = 1 as dynamic;}
            }
            if ($switch__1) {
              $E_ = $acc[2];
              $p__0 = $D_;
              $s = $E_;
              $switch__0 = 2 as dynamic;
            }
            break;
          // FALLTHROUGH
          case 3:
            $J_ = $acc[1];
            if ($is_int($J_)) {
              $switch__3 = 1 as dynamic;
            }
            else {
              if (0 === $J_[0]) {
                $L_ = $J_[2];
                if ($is_int($L_)) {
                  $switch__4 = 1 as dynamic;
                }
                else {
                  if (1 === $L_[0]) {
                    $M_ = $acc[2];
                    $N_ = $L_[2];
                    $O_ = $J_[1];
                    $p__3 = $O_;
                    $size__0 = $N_;
                    $c__0 = $M_;
                    $switch__0 = 1 as dynamic;
                    $switch__3 = 0 as dynamic;
                    $switch__4 = 0 as dynamic;
                  }
                  else {$switch__4 = 1 as dynamic;}
                }
                if ($switch__4) {$switch__3 = 1 as dynamic;}
              }
              else {$switch__3 = 1 as dynamic;}
            }
            if ($switch__3) {
              $K_ = $acc[2];
              $p__2 = $J_;
              $c = $K_;
              $switch__0 = 3 as dynamic;
            }
            break;
          // FALLTHROUGH
          case 4:
            $Q_ = $acc[1];
            if ($is_int($Q_)) {
              $switch__5 = 1 as dynamic;
            }
            else {
              if (0 === $Q_[0]) {
                $S_ = $Q_[2];
                if ($is_int($S_)) {
                  $switch__6 = 1 as dynamic;
                }
                else {
                  if (1 === $S_[0]) {
                    $T_ = $acc[2];
                    $U_ = $S_[2];
                    $V_ = $Q_[1];
                    $p__1 = $V_;
                    $size = $U_;
                    $s__0 = $T_;
                    $switch__0 = 0 as dynamic;
                    $switch__5 = 0 as dynamic;
                    $switch__6 = 0 as dynamic;
                  }
                  else {$switch__6 = 1 as dynamic;}
                }
                if ($switch__6) {$switch__5 = 1 as dynamic;}
              }
              else {$switch__5 = 1 as dynamic;}
            }
            if ($switch__5) {
              $R_ = $acc[2];
              $p__0 = $Q_;
              $s = $R_;
              $switch__0 = 2 as dynamic;
            }
            break;
          // FALLTHROUGH
          case 5:
            $W_ = $acc[1];
            if ($is_int($W_)) {
              $switch__7 = 1 as dynamic;
            }
            else {
              if (0 === $W_[0]) {
                $Y_ = $W_[2];
                if ($is_int($Y_)) {
                  $switch__8 = 1 as dynamic;
                }
                else {
                  if (1 === $Y_[0]) {
                    $Z_ = $acc[2];
                    $aa_ = $Y_[2];
                    $ab_ = $W_[1];
                    $p__3 = $ab_;
                    $size__0 = $aa_;
                    $c__0 = $Z_;
                    $switch__0 = 1 as dynamic;
                    $switch__7 = 0 as dynamic;
                    $switch__8 = 0 as dynamic;
                  }
                  else {$switch__8 = 1 as dynamic;}
                }
                if ($switch__8) {$switch__7 = 1 as dynamic;}
              }
              else {$switch__7 = 1 as dynamic;}
            }
            if ($switch__7) {
              $X_ = $acc[2];
              $p__2 = $W_;
              $c = $X_;
              $switch__0 = 3 as dynamic;
            }
            break;
          // FALLTHROUGH
          case 6:
            $ac_ = $acc[1];
            if (! $is_int($ac_) && 0 === $ac_[0]) {
              $ad_ = $ac_[2];
              if (! $is_int($ad_) && 1 === $ad_[0]) {
                $f__1 = $acc[2];
                $size__1 = $ad_[2];
                $p__4 = $ac_[1];
                $strput_acc->contents($ppf, $p__4);
                $ae_ = $call1($f__1, 0);
                return $pp_print_as_size($ppf, $id($size__1), $ae_);
              }
            }
            $f__0 = $acc[2];
            $strput_acc->contents($ppf, $ac_);
            return $pp_print_string($ppf, $call1($f__0, 0));
          // FALLTHROUGH
          case 7:
            $p__5 = $acc[1];
            $strput_acc->contents($ppf, $p__5);
            return $pp_print_flush($ppf, 0);
          // FALLTHROUGH
          default:
            $msg = $acc[2];
            $p__6 = $acc[1];
            $strput_acc->contents($ppf, $p__6);
            return $call1($Stdlib[1], $msg);
          }
      }
      switch($switch__0) {
        // FALLTHROUGH
        case 0:
          $strput_acc->contents($ppf, $p__1);
          return $pp_print_as_size($ppf, $id($size), $s__0);
        // FALLTHROUGH
        case 1:
          $strput_acc->contents($ppf, $p__3);
          $P_ = $call2($Stdlib_string[1], 1, $c__0);
          return $pp_print_as_size($ppf, $id($size__0), $P_);
        // FALLTHROUGH
        case 2:
          $strput_acc->contents($ppf, $p__0);
          return $pp_print_string($ppf, $s);
        // FALLTHROUGH
        default:
          $strput_acc->contents($ppf, $p__2);
          return $pp_print_char($ppf, $c);
        }
    };
    $kfprintf = (dynamic $k, dynamic $ppf, dynamic $param) : dynamic ==> {
      $fmt = $param[1];
      $y_ = 0 as dynamic;
      $z_ = (dynamic $acc) : dynamic ==> {
        $output_acc->contents($ppf, $acc);
        return $call1($k, $ppf);
      };
      return $call3($CamlinternalFormat[7], $z_, $y_, $fmt);
    };
    $ikfprintf = (dynamic $k, dynamic $ppf, dynamic $param) : dynamic ==> {
      $fmt = $param[1];
      return $call3($CamlinternalFormat[8], $k, $ppf, $fmt);
    };
    $ifprintf = (dynamic $ppf, dynamic $param) : dynamic ==> {
      $fmt = $param[1];
      $v_ = 0 as dynamic;
      $w_ = (dynamic $x_) : dynamic ==> {return 0;};
      return $call3($CamlinternalFormat[8], $w_, $v_, $fmt);
    };
    $fprintf = (dynamic $ppf) : dynamic ==> {
      $s_ = (dynamic $u_) : dynamic ==> {return 0;};
      return (dynamic $t_) : dynamic ==> {return $kfprintf($s_, $ppf, $t_);};
    };
    $printf = (dynamic $fmt) : dynamic ==> {
      return $call1($fprintf($std_formatter), $fmt);
    };
    $eprintf = (dynamic $fmt) : dynamic ==> {
      return $call1($fprintf($err_formatter), $fmt);
    };
    $kdprintf = (dynamic $k, dynamic $param) : dynamic ==> {
      $fmt = $param[1];
      $q_ = 0 as dynamic;
      $r_ = (dynamic $acc) : dynamic ==> {
        return $call1(
          $k,
          (dynamic $ppf) : dynamic ==> {
            return $output_acc->contents($ppf, $acc);
          }
        );
      };
      return $call3($CamlinternalFormat[7], $r_, $q_, $fmt);
    };
    $dprintf = (dynamic $fmt) : dynamic ==> {
      return $kdprintf((dynamic $i) : dynamic ==> {return $i;}, $fmt);
    };
    $ksprintf = (dynamic $k, dynamic $param) : dynamic ==> {
      $fmt = $param[1];
      $b = $pp_make_buffer(0);
      $ppf = $formatter_of_buffer($b);
      $k__0 = (dynamic $acc) : dynamic ==> {
        $strput_acc->contents($ppf, $acc);
        return $call1($k, $flush_buffer_formatter($b, $ppf));
      };
      return $call3($CamlinternalFormat[7], $k__0, 0, $fmt);
    };
    $sprintf = (dynamic $fmt) : dynamic ==> {return $ksprintf($id, $fmt);};
    $kasprintf = (dynamic $k, dynamic $param) : dynamic ==> {
      $fmt = $param[1];
      $b = $pp_make_buffer(0);
      $ppf = $formatter_of_buffer($b);
      $k__0 = (dynamic $acc) : dynamic ==> {
        $output_acc->contents($ppf, $acc);
        return $call1($k, $flush_buffer_formatter($b, $ppf));
      };
      return $call3($CamlinternalFormat[7], $k__0, 0, $fmt);
    };
    $asprintf = (dynamic $fmt) : dynamic ==> {return $kasprintf($id, $fmt);};
    $flush_standard_formatters = (dynamic $param) : dynamic ==> {
      $pp_print_flush($std_formatter, 0);
      return $pp_print_flush($err_formatter, 0);
    };
    
    $call1($Stdlib[100], $flush_standard_formatters);
    
    $pp_set_all_formatter_output_functions = 
    (dynamic $state, dynamic $f, dynamic $g, dynamic $h, dynamic $i) : dynamic ==> {
      $pp_set_formatter_output_functions($state, $f, $g);
      $state[19] = $h;
      $state[20] = $i;
      return 0;
    };
    $pp_get_all_formatter_output_functions = (dynamic $state, dynamic $param) : dynamic ==> {
      return Vector{0, $state[17], $state[18], $state[19], $state[20]};
    };
    $set_all_formatter_output_functions = 
    (dynamic $m_, dynamic $n_, dynamic $o_, dynamic $p_) : dynamic ==> {
      return $pp_set_all_formatter_output_functions(
        $std_formatter,
        $m_,
        $n_,
        $o_,
        $p_
      );
    };
    $get_all_formatter_output_functions = (dynamic $l_) : dynamic ==> {
      return $pp_get_all_formatter_output_functions($std_formatter, $l_);
    };
    $bprintf = (dynamic $b, dynamic $param) : dynamic ==> {
      $fmt = $param[1];
      $ppf = $formatter_of_buffer($b);
      $k = (dynamic $acc) : dynamic ==> {
        $output_acc->contents($ppf, $acc);
        return $pp_flush_queue($ppf, 0);
      };
      return $call3($CamlinternalFormat[7], $k, 0, $fmt);
    };
    $pp_set_formatter_tag_functions = (dynamic $state, dynamic $param) : dynamic ==> {
      $pct = $param[4];
      $pot = $param[3];
      $mct = $param[2];
      $mot = $param[1];
      $stringify = (dynamic $f, dynamic $e, dynamic $param) : dynamic ==> {
        $s = null as dynamic;
        if ($param[1] === $String_tag) {$s = $param[2];return $call1($f, $s);}
        return $e;
      };
      $state[24] =
        (dynamic $k_) : dynamic ==> {return $stringify($mot, $cst__16, $k_);};
      $state[25] =
        (dynamic $j_) : dynamic ==> {return $stringify($mct, $cst__17, $j_);};
      $f_ = 0 as dynamic;
      $state[26] =
        (dynamic $i_) : dynamic ==> {return $stringify($pot, $f_, $i_);};
      $g_ = 0 as dynamic;
      $state[27] =
        (dynamic $h_) : dynamic ==> {return $stringify($pct, $g_, $h_);};
      return 0;
    };
    $pp_get_formatter_tag_functions = (dynamic $fmt, dynamic $param) : dynamic ==> {
      $funs = $pp_get_formatter_stag_functions($fmt, 0);
      $mark_open_tag = (dynamic $s) : dynamic ==> {
        return $call1($funs[1], Vector{0, $String_tag, $s});
      };
      $mark_close_tag = (dynamic $s) : dynamic ==> {
        return $call1($funs[2], Vector{0, $String_tag, $s});
      };
      $print_open_tag = (dynamic $s) : dynamic ==> {
        return $call1($funs[3], Vector{0, $String_tag, $s});
      };
      $print_close_tag = (dynamic $s) : dynamic ==> {
        return $call1($funs[4], Vector{0, $String_tag, $s});
      };
      return Vector{
        0,
        $mark_open_tag,
        $mark_close_tag,
        $print_open_tag,
        $print_close_tag
      };
    };
    $set_formatter_tag_functions = (dynamic $e_) : dynamic ==> {
      return $pp_set_formatter_tag_functions($std_formatter, $e_);
    };
    $get_formatter_tag_functions = (dynamic $d_) : dynamic ==> {
      return $pp_get_formatter_tag_functions($std_formatter, $d_);
    };
    $Stdlib_format = Vector{
      0,
      $pp_open_box,
      $open_box,
      $pp_close_box,
      $close_box,
      $pp_open_hbox,
      $open_hbox,
      $pp_open_vbox,
      $open_vbox,
      $pp_open_hvbox,
      $open_hvbox,
      $pp_open_hovbox,
      $open_hovbox,
      $pp_print_string,
      $print_string,
      $pp_print_as,
      $print_as,
      $pp_print_int,
      $print_int,
      $pp_print_float,
      $print_float,
      $pp_print_char,
      $print_char,
      $pp_print_bool,
      $print_bool,
      $pp_print_space,
      $print_space,
      $pp_print_cut,
      $print_cut,
      $pp_print_break,
      $print_break,
      $pp_print_custom_break,
      $pp_force_newline,
      $force_newline,
      $pp_print_if_newline,
      $print_if_newline,
      $pp_print_flush,
      $print_flush,
      $pp_print_newline,
      $print_newline,
      $pp_set_margin,
      $set_margin,
      $pp_get_margin,
      $get_margin,
      $pp_set_max_indent,
      $set_max_indent,
      $pp_get_max_indent,
      $get_max_indent,
      $check_geometry,
      $pp_set_geometry,
      $set_geometry,
      $pp_safe_set_geometry,
      $safe_set_geometry,
      $pp_get_geometry,
      $get_geometry,
      $pp_set_max_boxes,
      $set_max_boxes,
      $pp_get_max_boxes,
      $get_max_boxes,
      $pp_over_max_boxes,
      $over_max_boxes,
      $pp_open_tbox,
      $open_tbox,
      $pp_close_tbox,
      $close_tbox,
      $pp_set_tab,
      $set_tab,
      $pp_print_tab,
      $print_tab,
      $pp_print_tbreak,
      $print_tbreak,
      $pp_set_ellipsis_text,
      $set_ellipsis_text,
      $pp_get_ellipsis_text,
      $get_ellipsis_text,
      $String_tag,
      $pp_open_stag,
      $open_stag,
      $pp_close_stag,
      $close_stag,
      $pp_set_tags,
      $set_tags,
      $pp_set_print_tags,
      $set_print_tags,
      $pp_set_mark_tags,
      $set_mark_tags,
      $pp_get_print_tags,
      $get_print_tags,
      $pp_get_mark_tags,
      $get_mark_tags,
      $pp_set_formatter_out_channel,
      $set_formatter_out_channel,
      $pp_set_formatter_output_functions,
      $set_formatter_output_functions,
      $pp_get_formatter_output_functions,
      $get_formatter_output_functions,
      $pp_set_formatter_out_functions,
      $set_formatter_out_functions,
      $pp_get_formatter_out_functions,
      $get_formatter_out_functions,
      $pp_set_formatter_stag_functions,
      $set_formatter_stag_functions,
      $pp_get_formatter_stag_functions,
      $get_formatter_stag_functions,
      $formatter_of_out_channel,
      $std_formatter,
      $err_formatter,
      $formatter_of_buffer,
      $stdbuf,
      $str_formatter,
      $flush_str_formatter,
      $make_formatter,
      $formatter_of_out_functions,
      $make_symbolic_output_buffer,
      $clear_symbolic_output_buffer,
      $get_symbolic_output_buffer,
      $flush_symbolic_output_buffer,
      $add_symbolic_output_item,
      $formatter_of_symbolic_output_buffer,
      $pp_print_list,
      $pp_print_text,
      $pp_print_option,
      $pp_print_result,
      $fprintf,
      $printf,
      $eprintf,
      $sprintf,
      $asprintf,
      $dprintf,
      $ifprintf,
      $kfprintf,
      $kdprintf,
      $ikfprintf,
      $ksprintf,
      $kasprintf,
      $bprintf,
      $ksprintf,
      $set_all_formatter_output_functions,
      $get_all_formatter_output_functions,
      $pp_set_all_formatter_output_functions,
      $pp_get_all_formatter_output_functions,
      $pp_open_tag,
      $open_tag,
      $pp_close_tag,
      $close_tag,
      $pp_set_formatter_tag_functions,
      $set_formatter_tag_functions,
      $pp_get_formatter_tag_functions,
      $get_formatter_tag_functions
    } as dynamic;
    
    return($Stdlib_format);

  }
  public static function pp_open_box(dynamic $state, dynamic $indent): dynamic {
    return static::syncCall(__FUNCTION__, 1, $state, $indent);
  }
  public static function open_box(dynamic $indent): dynamic {
    return static::syncCall(__FUNCTION__, 2, $indent);
  }
  public static function pp_close_box(dynamic $state, dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 3, $state, $param);
  }
  public static function close_box(dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 4, $param);
  }
  public static function pp_open_hbox(dynamic $state, dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 5, $state, $param);
  }
  public static function open_hbox(dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 6, $param);
  }
  public static function pp_open_vbox(dynamic $state, dynamic $indent): dynamic {
    return static::syncCall(__FUNCTION__, 7, $state, $indent);
  }
  public static function open_vbox(dynamic $indent): dynamic {
    return static::syncCall(__FUNCTION__, 8, $indent);
  }
  public static function pp_open_hvbox(dynamic $state, dynamic $indent): dynamic {
    return static::syncCall(__FUNCTION__, 9, $state, $indent);
  }
  public static function open_hvbox(dynamic $indent): dynamic {
    return static::syncCall(__FUNCTION__, 10, $indent);
  }
  public static function pp_open_hovbox(dynamic $state, dynamic $indent): dynamic {
    return static::syncCall(__FUNCTION__, 11, $state, $indent);
  }
  public static function open_hovbox(dynamic $indent): dynamic {
    return static::syncCall(__FUNCTION__, 12, $indent);
  }
  public static function pp_print_string(dynamic $state, dynamic $s): dynamic {
    return static::syncCall(__FUNCTION__, 13, $state, $s);
  }
  public static function print_string(dynamic $s): dynamic {
    return static::syncCall(__FUNCTION__, 14, $s);
  }
  public static function pp_print_as(dynamic $state, dynamic $isize, dynamic $s): dynamic {
    return static::syncCall(__FUNCTION__, 15, $state, $isize, $s);
  }
  public static function print_as(dynamic $isize, dynamic $s): dynamic {
    return static::syncCall(__FUNCTION__, 16, $isize, $s);
  }
  public static function pp_print_int(dynamic $state, dynamic $i): dynamic {
    return static::syncCall(__FUNCTION__, 17, $state, $i);
  }
  public static function print_int(dynamic $i): dynamic {
    return static::syncCall(__FUNCTION__, 18, $i);
  }
  public static function pp_print_float(dynamic $state, dynamic $f): dynamic {
    return static::syncCall(__FUNCTION__, 19, $state, $f);
  }
  public static function print_float(dynamic $f): dynamic {
    return static::syncCall(__FUNCTION__, 20, $f);
  }
  public static function pp_print_char(dynamic $state, dynamic $c): dynamic {
    return static::syncCall(__FUNCTION__, 21, $state, $c);
  }
  public static function print_char(dynamic $c): dynamic {
    return static::syncCall(__FUNCTION__, 22, $c);
  }
  public static function pp_print_bool(dynamic $state, dynamic $b): dynamic {
    return static::syncCall(__FUNCTION__, 23, $state, $b);
  }
  public static function print_bool(dynamic $b): dynamic {
    return static::syncCall(__FUNCTION__, 24, $b);
  }
  public static function pp_print_space(dynamic $state, dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 25, $state, $param);
  }
  public static function print_space(dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 26, $param);
  }
  public static function pp_print_cut(dynamic $state, dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 27, $state, $param);
  }
  public static function print_cut(dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 28, $param);
  }
  public static function pp_print_break(dynamic $state, dynamic $width, dynamic $offset): dynamic {
    return static::syncCall(__FUNCTION__, 29, $state, $width, $offset);
  }
  public static function print_break(dynamic $width, dynamic $offset): dynamic {
    return static::syncCall(__FUNCTION__, 30, $width, $offset);
  }
  public static function pp_print_custom_break(dynamic $state, dynamic $fits, dynamic $breaks): dynamic {
    return static::syncCall(__FUNCTION__, 31, $state, $fits, $breaks);
  }
  public static function pp_force_newline(dynamic $state, dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 32, $state, $param);
  }
  public static function force_newline(dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 33, $param);
  }
  public static function pp_print_if_newline(dynamic $state, dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 34, $state, $param);
  }
  public static function print_if_newline(dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 35, $param);
  }
  public static function pp_print_flush(dynamic $state, dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 36, $state, $param);
  }
  public static function print_flush(dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 37, $param);
  }
  public static function pp_print_newline(dynamic $state, dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 38, $state, $param);
  }
  public static function print_newline(dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 39, $param);
  }
  public static function pp_set_margin(dynamic $state, dynamic $n): dynamic {
    return static::syncCall(__FUNCTION__, 40, $state, $n);
  }
  public static function set_margin(dynamic $n): dynamic {
    return static::syncCall(__FUNCTION__, 41, $n);
  }
  public static function pp_get_margin(dynamic $state, dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 42, $state, $param);
  }
  public static function get_margin(dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 43, $param);
  }
  public static function pp_set_max_indent(dynamic $state, dynamic $n): dynamic {
    return static::syncCall(__FUNCTION__, 44, $state, $n);
  }
  public static function set_max_indent(dynamic $n): dynamic {
    return static::syncCall(__FUNCTION__, 45, $n);
  }
  public static function pp_get_max_indent(dynamic $state, dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 46, $state, $param);
  }
  public static function get_max_indent(dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 47, $param);
  }
  public static function check_geometry(dynamic $geometry): dynamic {
    return static::syncCall(__FUNCTION__, 48, $geometry);
  }
  public static function pp_set_geometry(dynamic $state, dynamic $max_indent, dynamic $margin): dynamic {
    return static::syncCall(__FUNCTION__, 49, $state, $max_indent, $margin);
  }
  public static function set_geometry(dynamic $max_indent, dynamic $margin): dynamic {
    return static::syncCall(__FUNCTION__, 50, $max_indent, $margin);
  }
  public static function pp_safe_set_geometry(dynamic $state, dynamic $max_indent, dynamic $margin): dynamic {
    return static::syncCall(__FUNCTION__, 51, $state, $max_indent, $margin);
  }
  public static function safe_set_geometry(dynamic $max_indent, dynamic $margin): dynamic {
    return static::syncCall(__FUNCTION__, 52, $max_indent, $margin);
  }
  public static function pp_get_geometry(dynamic $state, dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 53, $state, $param);
  }
  public static function get_geometry(dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 54, $param);
  }
  public static function pp_set_max_boxes(dynamic $state, dynamic $n): dynamic {
    return static::syncCall(__FUNCTION__, 55, $state, $n);
  }
  public static function set_max_boxes(dynamic $n): dynamic {
    return static::syncCall(__FUNCTION__, 56, $n);
  }
  public static function pp_get_max_boxes(dynamic $state, dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 57, $state, $param);
  }
  public static function get_max_boxes(dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 58, $param);
  }
  public static function pp_over_max_boxes(dynamic $state, dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 59, $state, $param);
  }
  public static function over_max_boxes(dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 60, $param);
  }
  public static function pp_open_tbox(dynamic $state, dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 61, $state, $param);
  }
  public static function open_tbox(dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 62, $param);
  }
  public static function pp_close_tbox(dynamic $state, dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 63, $state, $param);
  }
  public static function close_tbox(dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 64, $param);
  }
  public static function pp_set_tab(dynamic $state, dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 65, $state, $param);
  }
  public static function set_tab(dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 66, $param);
  }
  public static function pp_print_tab(dynamic $state, dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 67, $state, $param);
  }
  public static function print_tab(dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 68, $param);
  }
  public static function pp_print_tbreak(dynamic $state, dynamic $width, dynamic $offset): dynamic {
    return static::syncCall(__FUNCTION__, 69, $state, $width, $offset);
  }
  public static function print_tbreak(dynamic $width, dynamic $offset): dynamic {
    return static::syncCall(__FUNCTION__, 70, $width, $offset);
  }
  public static function pp_set_ellipsis_text(dynamic $state, dynamic $s): dynamic {
    return static::syncCall(__FUNCTION__, 71, $state, $s);
  }
  public static function set_ellipsis_text(dynamic $s): dynamic {
    return static::syncCall(__FUNCTION__, 72, $s);
  }
  public static function pp_get_ellipsis_text(dynamic $state, dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 73, $state, $param);
  }
  public static function get_ellipsis_text(dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 74, $param);
  }
  public static function pp_open_stag(dynamic $state, dynamic $tag_name): dynamic {
    return static::syncCall(__FUNCTION__, 76, $state, $tag_name);
  }
  public static function open_stag(dynamic $tag_name): dynamic {
    return static::syncCall(__FUNCTION__, 77, $tag_name);
  }
  public static function pp_close_stag(dynamic $state, dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 78, $state, $param);
  }
  public static function close_stag(dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 79, $param);
  }
  public static function pp_set_tags(dynamic $state, dynamic $b): dynamic {
    return static::syncCall(__FUNCTION__, 80, $state, $b);
  }
  public static function set_tags(dynamic $b): dynamic {
    return static::syncCall(__FUNCTION__, 81, $b);
  }
  public static function pp_set_print_tags(dynamic $state, dynamic $b): dynamic {
    return static::syncCall(__FUNCTION__, 82, $state, $b);
  }
  public static function set_print_tags(dynamic $b): dynamic {
    return static::syncCall(__FUNCTION__, 83, $b);
  }
  public static function pp_set_mark_tags(dynamic $state, dynamic $b): dynamic {
    return static::syncCall(__FUNCTION__, 84, $state, $b);
  }
  public static function set_mark_tags(dynamic $b): dynamic {
    return static::syncCall(__FUNCTION__, 85, $b);
  }
  public static function pp_get_print_tags(dynamic $state, dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 86, $state, $param);
  }
  public static function get_print_tags(dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 87, $param);
  }
  public static function pp_get_mark_tags(dynamic $state, dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 88, $state, $param);
  }
  public static function get_mark_tags(dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 89, $param);
  }
  public static function pp_set_formatter_out_channel(dynamic $state, dynamic $oc): dynamic {
    return static::syncCall(__FUNCTION__, 90, $state, $oc);
  }
  public static function set_formatter_out_channel(dynamic $oc): dynamic {
    return static::syncCall(__FUNCTION__, 91, $oc);
  }
  public static function pp_set_formatter_output_functions(dynamic $state, dynamic $f, dynamic $g): dynamic {
    return static::syncCall(__FUNCTION__, 92, $state, $f, $g);
  }
  public static function set_formatter_output_functions(dynamic $f, dynamic $g): dynamic {
    return static::syncCall(__FUNCTION__, 93, $f, $g);
  }
  public static function pp_get_formatter_output_functions(dynamic $state, dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 94, $state, $param);
  }
  public static function get_formatter_output_functions(dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 95, $param);
  }
  public static function pp_set_formatter_out_functions(dynamic $state, dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 96, $state, $param);
  }
  public static function set_formatter_out_functions(dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 97, $param);
  }
  public static function pp_get_formatter_out_functions(dynamic $state, dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 98, $state, $param);
  }
  public static function get_formatter_out_functions(dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 99, $param);
  }
  public static function pp_set_formatter_stag_functions(dynamic $state, dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 100, $state, $param);
  }
  public static function set_formatter_stag_functions(dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 101, $param);
  }
  public static function pp_get_formatter_stag_functions(dynamic $state, dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 102, $state, $param);
  }
  public static function get_formatter_stag_functions(dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 103, $param);
  }
  public static function formatter_of_out_channel(dynamic $oc): dynamic {
    return static::syncCall(__FUNCTION__, 104, $oc);
  }
  public static function formatter_of_buffer(dynamic $b): dynamic {
    return static::syncCall(__FUNCTION__, 107, $b);
  }
  public static function flush_str_formatter(dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 110, $param);
  }
  public static function make_formatter(dynamic $output, dynamic $flush): dynamic {
    return static::syncCall(__FUNCTION__, 111, $output, $flush);
  }
  public static function formatter_of_out_functions(dynamic $out_funs): dynamic {
    return static::syncCall(__FUNCTION__, 112, $out_funs);
  }
  public static function make_symbolic_output_buffer(dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 113, $param);
  }
  public static function clear_symbolic_output_buffer(dynamic $sob): dynamic {
    return static::syncCall(__FUNCTION__, 114, $sob);
  }
  public static function get_symbolic_output_buffer(dynamic $sob): dynamic {
    return static::syncCall(__FUNCTION__, 115, $sob);
  }
  public static function flush_symbolic_output_buffer(dynamic $sob): dynamic {
    return static::syncCall(__FUNCTION__, 116, $sob);
  }
  public static function add_symbolic_output_item(dynamic $sob, dynamic $item): dynamic {
    return static::syncCall(__FUNCTION__, 117, $sob, $item);
  }
  public static function formatter_of_symbolic_output_buffer(dynamic $sob): dynamic {
    return static::syncCall(__FUNCTION__, 118, $sob);
  }
  public static function pp_print_list(dynamic $opt, dynamic $pp_v, dynamic $ppf, dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 119, $opt, $pp_v, $ppf, $param);
  }
  public static function pp_print_text(dynamic $ppf, dynamic $s): dynamic {
    return static::syncCall(__FUNCTION__, 120, $ppf, $s);
  }
  public static function pp_print_option(dynamic $opt, dynamic $pp_v, dynamic $ppf, dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 121, $opt, $pp_v, $ppf, $param);
  }
  public static function pp_print_result(dynamic $ok, dynamic $error, dynamic $ppf, dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 122, $ok, $error, $ppf, $param);
  }
  public static function fprintf(dynamic $ppf): dynamic {
    return static::syncCall(__FUNCTION__, 123, $ppf);
  }
  public static function printf(dynamic $fmt): dynamic {
    return static::syncCall(__FUNCTION__, 124, $fmt);
  }
  public static function eprintf(dynamic $fmt): dynamic {
    return static::syncCall(__FUNCTION__, 125, $fmt);
  }
  public static function sprintf(dynamic $fmt): dynamic {
    return static::syncCall(__FUNCTION__, 126, $fmt);
  }
  public static function asprintf(dynamic $fmt): dynamic {
    return static::syncCall(__FUNCTION__, 127, $fmt);
  }
  public static function dprintf(dynamic $fmt): dynamic {
    return static::syncCall(__FUNCTION__, 128, $fmt);
  }
  public static function ifprintf(dynamic $ppf, dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 129, $ppf, $param);
  }
  public static function kfprintf(dynamic $k, dynamic $ppf, dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 130, $k, $ppf, $param);
  }
  public static function kdprintf(dynamic $k, dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 131, $k, $param);
  }
  public static function ikfprintf(dynamic $k, dynamic $ppf, dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 132, $k, $ppf, $param);
  }
  public static function ksprintf(dynamic $k, dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 133, $k, $param);
  }
  public static function kasprintf(dynamic $k, dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 134, $k, $param);
  }
  public static function bprintf(dynamic $b, dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 135, $b, $param);
  }
  public static function set_all_formatter_output_functions(dynamic $f, dynamic $g, dynamic $h, dynamic $i): dynamic {
    return static::syncCall(__FUNCTION__, 137, $f, $g, $h, $i);
  }
  public static function get_all_formatter_output_functions(dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 138, $param);
  }
  public static function pp_set_all_formatter_output_functions(dynamic $state, dynamic $f, dynamic $g, dynamic $h, dynamic $i): dynamic {
    return static::syncCall(__FUNCTION__, 139, $state, $f, $g, $h, $i);
  }
  public static function pp_get_all_formatter_output_functions(dynamic $state, dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 140, $state, $param);
  }
  public static function pp_open_tag(dynamic $state, dynamic $s): dynamic {
    return static::syncCall(__FUNCTION__, 141, $state, $s);
  }
  public static function open_tag(dynamic $s): dynamic {
    return static::syncCall(__FUNCTION__, 142, $s);
  }
  public static function pp_close_tag(dynamic $state, dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 143, $state, $param);
  }
  public static function close_tag(dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 144, $param);
  }
  public static function pp_set_formatter_tag_functions(dynamic $state, dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 145, $state, $param);
  }
  public static function set_formatter_tag_functions(dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 146, $param);
  }
  public static function pp_get_formatter_tag_functions(dynamic $fmt, dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 147, $fmt, $param);
  }
  public static function get_formatter_tag_functions(dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 148, $param);
  }

}
/* Hashing disabled */
