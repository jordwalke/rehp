<?hh
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * Format.php
 */

namespace Rehack;

final class Format {
  <<__Memoize>>
  public static function get() {
    $global_object = \Rehack\GlobalObject::get();
    $runtime = \Rehack\Runtime::get();
    /*
     * Soon, these will replace the `global_data->ModuleName`
     * pattern in the load() function.
     */
    $Buffer = Buffer::get();
    $CamlinternalFormat = CamlinternalFormat::get();
    $List_ = List_::get();
    $Pervasives = Pervasives::get();
    $String_ = String_::get();
    $Not_found = Not_found::get();
    Format::load($global_object);
    $memoized = $runtime->caml_get_global_data()->Format;
    return $memoized;
  }

  /**
   * Performs module load operation. May have side effects.
   */
  private static function load($joo_global_object) {
    

    $output_acc = new Ref();$strput_acc = new Ref();
    $runtime = $joo_global_object->jsoo_runtime;
    $call1 = $runtime["caml_call1"];
    $call2 = $runtime["caml_call2"];
    $call3 = $runtime["caml_call3"];
    $call4 = $runtime["caml_call4"];
    $caml_ml_string_length = $runtime["caml_ml_string_length"];
    $string = $runtime["caml_new_string"];
    $caml_wrap_exception = $runtime["caml_wrap_exception"];
    $is_int = $runtime["is_int"];
    $global_data = $runtime["caml_get_global_data"]();
    $cst__4 = $string(".");
    $cst__2 = $string(">");
    $cst__3 = $string("</");
    $cst__0 = $string(">");
    $cst__1 = $string("<");
    $cst = $string("\n");
    $cst_Format_Empty_queue = $string("Format.Empty_queue");
    $CamlinternalFormat = $global_data["CamlinternalFormat"];
    $Pervasives = $global_data["Pervasives"];
    $String = $global_data["String_"];
    $Buffer = $global_data["Buffer"];
    $List = $global_data["List_"];
    $Not_found = $global_data["Not_found"];
    $b = Vector{3, 0, 3};
    $a = Vector{0, $string("")};
    $make_queue = function(dynamic $param) {return Vector{0, 0, 0};};
    $clear_queue = function(dynamic $q) {$q[1] = 0;$q[2] = 0;return 0;};
    $add_queue = function(dynamic $x, dynamic $q) {
      $c = Vector{0, $x, 0};
      $cx = $q[1];
      if ($cx) {$q[1] = $c;$cx[2] = $c;return 0;}
      $q[1] = $c;
      $q[2] = $c;
      return 0;
    };
    $Empty_queue = Vector{
      248,
      $cst_Format_Empty_queue,
      $runtime["caml_fresh_oo_id"](0)
    };
    $peek_queue = function(dynamic $param) use ($Empty_queue,$runtime) {
      $cw = $param[2];
      if ($cw) {$x = $cw[1];return $x;}
      throw $runtime["caml_wrap_thrown_exception"]($Empty_queue) as \Throwable;
    };
    $take_queue = function(dynamic $q) use ($Empty_queue,$runtime) {
      $cv = $q[2];
      if ($cv) {
        $x = $cv[1];
        $tl = $cv[2];
        $q[2] = $tl;
        if (0 === $tl) {$q[1] = 0;}
        return $x;
      }
      throw $runtime["caml_wrap_thrown_exception"]($Empty_queue) as \Throwable;
    };
    $pp_enqueue = function(dynamic $state, dynamic $token) use ($add_queue) {
      $len = $token[3];
      $state[13] = (int) ($state[13] + $len);
      return $add_queue($token, $state[28]);
    };
    $pp_clear_queue = function(dynamic $state) use ($clear_queue) {
      $state[12] = 1;
      $state[13] = 1;
      return $clear_queue($state[28]);
    };
    $pp_infinity = 1000000010;
    $pp_output_string = function(dynamic $state, dynamic $s) use ($call3,$caml_ml_string_length) {
      return $call3($state[17], $s, 0, $caml_ml_string_length($s));
    };
    $pp_output_newline = function(dynamic $state) use ($call1) {
      return $call1($state[19], 0);
    };
    $pp_output_spaces = function(dynamic $state, dynamic $n) use ($call1) {
      return $call1($state[20], $n);
    };
    $pp_output_indent = function(dynamic $state, dynamic $n) use ($call1) {
      return $call1($state[21], $n);
    };
    $break_new_line = function
    (dynamic $state, dynamic $offset, dynamic $width) use ($Pervasives,$call2,$pp_output_indent,$pp_output_newline) {
      $pp_output_newline($state);
      $state[11] = 1;
      $indent = (int) ((int) ($state[6] - $width) + $offset);
      $real_indent = $call2($Pervasives[4], $state[8], $indent);
      $state[10] = $real_indent;
      $state[9] = (int) ($state[6] - $state[10]);
      return $pp_output_indent($state, $state[10]);
    };
    $break_line = function(dynamic $state, dynamic $width) use ($break_new_line) {
      return $break_new_line($state, 0, $width);
    };
    $break_same_line = function(dynamic $state, dynamic $width) use ($pp_output_spaces) {
      $state[9] = (int) ($state[9] - $width);
      return $pp_output_spaces($state, $width);
    };
    $pp_force_break_line = function(dynamic $state) use ($break_line,$pp_output_newline) {
      $cs = $state[2];
      if ($cs) {
        $match = $cs[1];
        $width = $match[2];
        $bl_ty = $match[1];
        $ct = $state[9] < $width ? 1 : (0);
        if ($ct) {
          if (0 !== $bl_ty) {
            return 5 <= $bl_ty ? 0 : ($break_line($state, $width));
          }
          $cu = 0;
        }
        else {$cu = $ct;}
        return $cu;
      }
      return $pp_output_newline($state);
    };
    $pp_skip_token = function(dynamic $state) use ($take_queue) {
      $match = $take_queue($state[28]);
      $size = $match[1];
      $len = $match[3];
      $state[12] = (int) ($state[12] - $len);
      $state[9] = (int) ($state[9] + $size);
      return 0;
    };
    $format_pp_token = function(dynamic $state, dynamic $size, dynamic $param) use ($Not_found,$add_tab,$break_line,$break_new_line,$break_same_line,$call1,$caml_wrap_exception,$is_int,$pp_force_break_line,$pp_output_newline,$pp_output_string,$pp_skip_token,$runtime) {
      if ($is_int($param)) {
        switch($param) {
          // FALLTHROUGH
          case 0:
            $ch = $state[3];
            if ($ch) {
              $match = $ch[1];
              $tabs = $match[1];
              $add_tab->contents = function(dynamic $n, dynamic $ls) use ($add_tab,$runtime) {
                if ($ls) {
                  $l = $ls[2];
                  $x = $ls[1];
                  return $runtime["caml_lessthan"]($n, $x)
                    ? Vector{0, $n, $ls}
                    : (Vector{0, $x, $add_tab->contents($n, $l)});
                }
                return Vector{0, $n, 0};
              };
              $tabs[1] =
                $add_tab->contents((int) ($state[6] - $state[9]), $tabs[1]);
              return 0;
            }
            return 0;
          // FALLTHROUGH
          case 1:
            $ci = $state[2];
            if ($ci) {$ls = $ci[2];$state[2] = $ls;return 0;}
            return 0;
          // FALLTHROUGH
          case 2:
            $cj = $state[3];
            if ($cj) {$ls__0 = $cj[2];$state[3] = $ls__0;return 0;}
            return 0;
          // FALLTHROUGH
          case 3:
            $ck = $state[2];
            if ($ck) {
              $match__0 = $ck[1];
              $width = $match__0[2];
              return $break_line($state, $width);
            }
            return $pp_output_newline($state);
          // FALLTHROUGH
          case 4:
            $cl = $state[10] !== (int) ($state[6] - $state[9]) ? 1 : (0);
            return $cl ? $pp_skip_token($state) : ($cl);
          // FALLTHROUGH
          default:
            $cm = $state[5];
            if ($cm) {
              $tags = $cm[2];
              $tag_name = $cm[1];
              $marker = $call1($state[25], $tag_name);
              $pp_output_string($state, $marker);
              $state[5] = $tags;
              return 0;
            }
            return 0;
          }
      }
      else {
        switch($param[0]) {
          // FALLTHROUGH
          case 0:
            $s = $param[1];
            $state[9] = (int) ($state[9] - $size);
            $pp_output_string($state, $s);
            $state[11] = 0;
            return 0;
          // FALLTHROUGH
          case 1:
            $off = $param[2];
            $n = $param[1];
            $cn = $state[2];
            if ($cn) {
              $match__1 = $cn[1];
              $width__0 = $match__1[2];
              $ty = $match__1[1];
              switch($ty) {
                // FALLTHROUGH
                case 0:
                  return $break_same_line($state, $n);
                // FALLTHROUGH
                case 1:
                  return $break_new_line($state, $off, $width__0);
                // FALLTHROUGH
                case 2:
                  return $break_new_line($state, $off, $width__0);
                // FALLTHROUGH
                case 3:
                  return $state[9] < $size
                    ? $break_new_line($state, $off, $width__0)
                    : ($break_same_line($state, $n));
                // FALLTHROUGH
                case 4:
                  return $state[11]
                    ? $break_same_line($state, $n)
                    : ($state[9] < $size
                     ? $break_new_line($state, $off, $width__0)
                     : ((int)
                     ((int) ($state[6] - $width__0) + $off) < $state[10]
                      ? $break_new_line($state, $off, $width__0)
                      : ($break_same_line($state, $n))));
                // FALLTHROUGH
                default:
                  return $break_same_line($state, $n);
                }
            }
            return 0;
          // FALLTHROUGH
          case 2:
            $off__0 = $param[2];
            $n__0 = $param[1];
            $insertion_point = (int) ($state[6] - $state[9]);
            $co = $state[3];
            if ($co) {
              $match__2 = $co[1];
              $tabs__0 = $match__2[1];
              $find = function(dynamic $n, dynamic $param) use ($Not_found,$runtime) {
                $param__0 = $param;
                for (;;) {
                  if ($param__0) {
                    $l = $param__0[2];
                    $x = $param__0[1];
                    if ($runtime["caml_greaterequal"]($x, $n)) {return $x;}
                    $param__0 = $l;
                    continue;
                  }
                  throw $runtime["caml_wrap_thrown_exception"]($Not_found) as \Throwable;
                }
              };
              $cp = $tabs__0[1];
              if ($cp) {
                $x = $cp[1];
                try {$cq = $find($insertion_point, $tabs__0[1]);$x__0 = $cq;}
                catch(\Throwable $cr) {
                  $cr = $caml_wrap_exception($cr);
                  if ($cr !== $Not_found) {
                    throw $runtime["caml_wrap_thrown_exception_reraise"]($cr) as \Throwable;
                  }
                  $x__0 = $x;
                }
                $tab = $x__0;
              }
              else {$tab = $insertion_point;}
              $offset = (int) ($tab - $insertion_point);
              return 0 <= $offset
                ? $break_same_line($state, (int) ($offset + $n__0))
                : ($break_new_line($state, (int) ($tab + $off__0), $state[6]));
            }
            return 0;
          // FALLTHROUGH
          case 3:
            $ty__0 = $param[2];
            $off__1 = $param[1];
            $insertion_point__0 = (int) ($state[6] - $state[9]);
            if ($state[8] < $insertion_point__0) {$pp_force_break_line($state);}
            $offset__0 = (int) ($state[9] - $off__1);
            $bl_type = 1 === $ty__0 ? 1 : ($state[9] < $size ? $ty__0 : (5));
            $state[2] = Vector{0, Vector{0, $bl_type, $offset__0}, $state[2]};
            return 0;
          // FALLTHROUGH
          case 4:
            $tbox = $param[1];
            $state[3] = Vector{0, $tbox, $state[3]};
            return 0;
          // FALLTHROUGH
          default:
            $tag_name__0 = $param[1];
            $marker__0 = $call1($state[24], $tag_name__0);
            $pp_output_string($state, $marker__0);
            $state[5] = Vector{0, $tag_name__0, $state[5]};
            return 0;
          }
      }
    };
    $advance_loop = function(dynamic $state) use ($format_pp_token,$peek_queue,$pp_infinity,$take_queue) {
      for (;;) {
        $match = $peek_queue($state[28]);
        $size = $match[1];
        $len = $match[3];
        $tok = $match[2];
        $ce = $size < 0 ? 1 : (0);
        $cf = $ce
          ? (int) ($state[13] - $state[12]) < $state[9] ? 1 : (0)
          : ($ce);
        $cg = 1 - $cf;
        if ($cg) {
          $take_queue($state[28]);
          $size__0 = 0 <= $size ? $size : ($pp_infinity);
          $format_pp_token($state, $size__0, $tok);
          $state[12] = (int) ($len + $state[12]);
          continue;
        }
        return $cg;
      }
    };
    $advance_left = function(dynamic $state) use ($Empty_queue,$advance_loop,$caml_wrap_exception,$runtime) {
      try {$cc = $advance_loop($state);return $cc;}
      catch(\Throwable $cd) {
        $cd = $caml_wrap_exception($cd);
        if ($cd === $Empty_queue) {return 0;}
        throw $runtime["caml_wrap_thrown_exception_reraise"]($cd) as \Throwable;
      }
    };
    $enqueue_advance = function(dynamic $state, dynamic $tok) use ($advance_left,$pp_enqueue) {
      $pp_enqueue($state, $tok);
      return $advance_left($state);
    };
    $make_queue_elem = function(dynamic $size, dynamic $tok, dynamic $len) {return Vector{0, $size, $tok, $len};
    };
    $enqueue_string_as = function(dynamic $state, dynamic $size, dynamic $s) use ($enqueue_advance,$make_queue_elem) {
      return $enqueue_advance(
        $state,
        $make_queue_elem($size, Vector{0, $s}, $size)
      );
    };
    $enqueue_string = function(dynamic $state, dynamic $s) use ($caml_ml_string_length,$enqueue_string_as) {
      $len = $caml_ml_string_length($s);
      return $enqueue_string_as($state, $len, $s);
    };
    $q_elem = $make_queue_elem(-1, $a, 0);
    $scan_stack_bottom = Vector{0, Vector{0, -1, $q_elem}, 0};
    $clear_scan_stack = function(dynamic $state) use ($scan_stack_bottom) {
      $state[1] = $scan_stack_bottom;
      return 0;
    };
    $set_size = function(dynamic $state, dynamic $ty) use ($clear_scan_stack,$is_int) {
      $b9 = $state[1];
      if ($b9) {
        $match = $b9[1];
        $queue_elem = $match[2];
        $left_tot = $match[1];
        $size = $queue_elem[1];
        $t = $b9[2];
        $tok = $queue_elem[2];
        if ($left_tot < $state[12]) {return $clear_scan_stack($state);}
        if (! $is_int($tok)) {
          switch($tok[0]) {
            // FALLTHROUGH
            case 3:
              $ca = 1 - $ty;
              if ($ca) {
                $queue_elem[1] = (int) ($state[13] + $size);
                $state[1] = $t;
                $cb = 0;
              }
              else {$cb = $ca;}
              return $cb;
            // FALLTHROUGH
            case 1:
            // FALLTHROUGH
            case 2:
              if ($ty) {
                $queue_elem[1] = (int) ($state[13] + $size);
                $state[1] = $t;
                $b_ = 0;
              }
              else {$b_ = $ty;}
              return $b_;
            }
        }
        return 0;
      }
      return 0;
    };
    $scan_push = function(dynamic $state, dynamic $b, dynamic $tok) use ($pp_enqueue,$set_size) {
      $pp_enqueue($state, $tok);
      if ($b) {$set_size($state, 1);}
      $state[1] = Vector{0, Vector{0, $state[13], $tok}, $state[1]};
      return 0;
    };
    $pp_open_box_gen = function
    (dynamic $state, dynamic $indent, dynamic $br_ty) use ($enqueue_string,$make_queue_elem,$scan_push) {
      $state[14] = (int) ($state[14] + 1);
      if ($state[14] < $state[15]) {
        $elem = $make_queue_elem(
          (int)
          -
          $state[13],
          Vector{3, $indent, $br_ty},
          0
        );
        return $scan_push($state, 0, $elem);
      }
      $b8 = $state[14] === $state[15] ? 1 : (0);
      return $b8 ? $enqueue_string($state, $state[16]) : ($b8);
    };
    $pp_open_sys_box = function(dynamic $state) use ($pp_open_box_gen) {
      return $pp_open_box_gen($state, 0, 3);
    };
    $pp_close_box = function(dynamic $state, dynamic $param) use ($pp_enqueue,$set_size) {
      $b6 = 1 < $state[14] ? 1 : (0);
      if ($b6) {
        if ($state[14] < $state[15]) {
          $pp_enqueue($state, Vector{0, 0, 1, 0});
          $set_size($state, 1);
          $set_size($state, 0);
        }
        $state[14] = (int) ($state[14] + -1);
        $b7 = 0;
      }
      else {$b7 = $b6;}
      return $b7;
    };
    $pp_open_tag = function(dynamic $state, dynamic $tag_name) use ($call1,$pp_enqueue) {
      if ($state[22]) {
        $state[4] = Vector{0, $tag_name, $state[4]};
        $call1($state[26], $tag_name);
      }
      $b5 = $state[23];
      return $b5
        ? $pp_enqueue($state, Vector{0, 0, Vector{5, $tag_name}, 0})
        : ($b5);
    };
    $pp_close_tag = function(dynamic $state, dynamic $param) use ($call1,$pp_enqueue) {
      if ($state[23]) {$pp_enqueue($state, Vector{0, 0, 5, 0});}
      $b2 = $state[22];
      if ($b2) {
        $b3 = $state[4];
        if ($b3) {
          $tags = $b3[2];
          $tag_name = $b3[1];
          $call1($state[27], $tag_name);
          $state[4] = $tags;
          return 0;
        }
        $b4 = 0;
      }
      else {$b4 = $b2;}
      return $b4;
    };
    $pp_set_print_tags = function(dynamic $state, dynamic $b) {$state[22] = $b;return 0;
    };
    $pp_set_mark_tags = function(dynamic $state, dynamic $b) {$state[23] = $b;return 0;
    };
    $pp_get_print_tags = function(dynamic $state, dynamic $param) {return $state[22];
    };
    $pp_get_mark_tags = function(dynamic $state, dynamic $param) {return $state[23];
    };
    $pp_set_tags = function(dynamic $state, dynamic $b) use ($pp_set_mark_tags,$pp_set_print_tags) {
      $pp_set_print_tags($state, $b);
      return $pp_set_mark_tags($state, $b);
    };
    $pp_get_formatter_tag_functions = function(dynamic $state, dynamic $param) {
      return Vector{0, $state[24], $state[25], $state[26], $state[27]};
    };
    $pp_set_formatter_tag_functions = function(dynamic $state, dynamic $param) {
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
    $pp_rinit = function(dynamic $state) use ($clear_scan_stack,$pp_clear_queue,$pp_open_sys_box) {
      $pp_clear_queue($state);
      $clear_scan_stack($state);
      $state[2] = 0;
      $state[3] = 0;
      $state[4] = 0;
      $state[5] = 0;
      $state[10] = 0;
      $state[14] = 0;
      $state[9] = $state[6];
      return $pp_open_sys_box($state);
    };
    $clear_tag_stack = function(dynamic $state) use ($List,$call2,$pp_close_tag) {
      $b0 = $state[4];
      $b1 = function(dynamic $param) use ($pp_close_tag,$state) {
        return $pp_close_tag($state, 0);
      };
      return $call2($List[15], $b1, $b0);
    };
    $pp_flush_queue = function(dynamic $state, dynamic $b) use ($advance_left,$clear_tag_stack,$pp_close_box,$pp_infinity,$pp_output_newline,$pp_rinit) {
      $clear_tag_stack($state);
      for (;;) {
        if (1 < $state[14]) {$pp_close_box($state, 0);continue;}
        $state[13] = $pp_infinity;
        $advance_left($state);
        if ($b) {$pp_output_newline($state);}
        return $pp_rinit($state);
      }
    };
    $pp_print_as_size = function(dynamic $state, dynamic $size, dynamic $s) use ($enqueue_string_as) {
      $bZ = $state[14] < $state[15] ? 1 : (0);
      return $bZ ? $enqueue_string_as($state, $size, $s) : ($bZ);
    };
    $pp_print_as = function(dynamic $state, dynamic $isize, dynamic $s) use ($pp_print_as_size) {
      return $pp_print_as_size($state, $isize, $s);
    };
    $pp_print_string = function(dynamic $state, dynamic $s) use ($caml_ml_string_length,$pp_print_as) {
      return $pp_print_as($state, $caml_ml_string_length($s), $s);
    };
    $pp_print_int = function(dynamic $state, dynamic $i) use ($Pervasives,$call1,$pp_print_string) {
      return $pp_print_string($state, $call1($Pervasives[21], $i));
    };
    $pp_print_float = function(dynamic $state, dynamic $f) use ($Pervasives,$call1,$pp_print_string) {
      return $pp_print_string($state, $call1($Pervasives[23], $f));
    };
    $pp_print_bool = function(dynamic $state, dynamic $b) use ($Pervasives,$call1,$pp_print_string) {
      return $pp_print_string($state, $call1($Pervasives[18], $b));
    };
    $pp_print_char = function(dynamic $state, dynamic $c) use ($String,$call2,$pp_print_as) {
      return $pp_print_as($state, 1, $call2($String[1], 1, $c));
    };
    $pp_open_hbox = function(dynamic $state, dynamic $param) use ($pp_open_box_gen) {
      return $pp_open_box_gen($state, 0, 0);
    };
    $pp_open_vbox = function(dynamic $state, dynamic $indent) use ($pp_open_box_gen) {
      return $pp_open_box_gen($state, $indent, 1);
    };
    $pp_open_hvbox = function(dynamic $state, dynamic $indent) use ($pp_open_box_gen) {
      return $pp_open_box_gen($state, $indent, 2);
    };
    $pp_open_hovbox = function(dynamic $state, dynamic $indent) use ($pp_open_box_gen) {
      return $pp_open_box_gen($state, $indent, 3);
    };
    $pp_open_box = function(dynamic $state, dynamic $indent) use ($pp_open_box_gen) {
      return $pp_open_box_gen($state, $indent, 4);
    };
    $pp_print_newline = function(dynamic $state, dynamic $param) use ($call1,$pp_flush_queue) {
      $pp_flush_queue($state, 1);
      return $call1($state[18], 0);
    };
    $pp_print_flush = function(dynamic $state, dynamic $param) use ($call1,$pp_flush_queue) {
      $pp_flush_queue($state, 0);
      return $call1($state[18], 0);
    };
    $pp_force_newline = function(dynamic $state, dynamic $param) use ($enqueue_advance,$make_queue_elem) {
      $bY = $state[14] < $state[15] ? 1 : (0);
      return $bY ? $enqueue_advance($state, $make_queue_elem(0, 3, 0)) : ($bY);
    };
    $pp_print_if_newline = function(dynamic $state, dynamic $param) use ($enqueue_advance,$make_queue_elem) {
      $bX = $state[14] < $state[15] ? 1 : (0);
      return $bX ? $enqueue_advance($state, $make_queue_elem(0, 4, 0)) : ($bX);
    };
    $pp_print_break = function
    (dynamic $state, dynamic $width, dynamic $offset) use ($make_queue_elem,$scan_push) {
      $bW = $state[14] < $state[15] ? 1 : (0);
      if ($bW) {
        $elem = $make_queue_elem(
          (int)
          -
          $state[13],
          Vector{1, $width, $offset},
          $width
        );
        return $scan_push($state, 1, $elem);
      }
      return $bW;
    };
    $pp_print_space = function(dynamic $state, dynamic $param) use ($pp_print_break) {
      return $pp_print_break($state, 1, 0);
    };
    $pp_print_cut = function(dynamic $state, dynamic $param) use ($pp_print_break) {
      return $pp_print_break($state, 0, 0);
    };
    $pp_open_tbox = function(dynamic $state, dynamic $param) use ($enqueue_advance,$make_queue_elem) {
      $state[14] = (int) ($state[14] + 1);
      $bV = $state[14] < $state[15] ? 1 : (0);
      if ($bV) {
        $elem = $make_queue_elem(0, Vector{4, Vector{0, Vector{0, 0}}}, 0);
        return $enqueue_advance($state, $elem);
      }
      return $bV;
    };
    $pp_close_tbox = function(dynamic $state, dynamic $param) use ($enqueue_advance,$make_queue_elem) {
      $bS = 1 < $state[14] ? 1 : (0);
      if ($bS) {
        $bT = $state[14] < $state[15] ? 1 : (0);
        if ($bT) {
          $elem = $make_queue_elem(0, 2, 0);
          $enqueue_advance($state, $elem);
          $state[14] = (int) ($state[14] + -1);
          $bU = 0;
        }
        else {$bU = $bT;}
      }
      else {$bU = $bS;}
      return $bU;
    };
    $pp_print_tbreak = function
    (dynamic $state, dynamic $width, dynamic $offset) use ($make_queue_elem,$scan_push) {
      $bR = $state[14] < $state[15] ? 1 : (0);
      if ($bR) {
        $elem = $make_queue_elem(
          (int)
          -
          $state[13],
          Vector{2, $width, $offset},
          $width
        );
        return $scan_push($state, 1, $elem);
      }
      return $bR;
    };
    $pp_print_tab = function(dynamic $state, dynamic $param) use ($pp_print_tbreak) {
      return $pp_print_tbreak($state, 0, 0);
    };
    $pp_set_tab = function(dynamic $state, dynamic $param) use ($enqueue_advance,$make_queue_elem) {
      $bQ = $state[14] < $state[15] ? 1 : (0);
      if ($bQ) {
        $elem = $make_queue_elem(0, 0, 0);
        return $enqueue_advance($state, $elem);
      }
      return $bQ;
    };
    $pp_set_max_boxes = function(dynamic $state, dynamic $n) {
      $bO = 1 < $n ? 1 : (0);
      if ($bO) {
        $state[15] = $n;
        $bP = 0;
      }
      else {$bP = $bO;}
      return $bP;
    };
    $pp_get_max_boxes = function(dynamic $state, dynamic $param) {return $state[15];
    };
    $pp_over_max_boxes = function(dynamic $state, dynamic $param) {
      return $state[14] === $state[15] ? 1 : (0);
    };
    $pp_set_ellipsis_text = function(dynamic $state, dynamic $s) {$state[16] = $s;return 0;
    };
    $pp_get_ellipsis_text = function(dynamic $state, dynamic $param) {return $state[16];
    };
    $pp_limit = function(dynamic $n) {
      return $n < 1000000010 ? $n : (1000000009);
    };
    $pp_set_min_space_left = function(dynamic $state, dynamic $n) use ($pp_limit,$pp_rinit) {
      $bN = 1 <= $n ? 1 : (0);
      if ($bN) {
        $n__0 = $pp_limit($n);
        $state[7] = $n__0;
        $state[8] = (int) ($state[6] - $state[7]);
        return $pp_rinit($state);
      }
      return $bN;
    };
    $pp_set_max_indent = function(dynamic $state, dynamic $n) use ($pp_set_min_space_left) {
      return $pp_set_min_space_left($state, (int) ($state[6] - $n));
    };
    $pp_get_max_indent = function(dynamic $state, dynamic $param) {return $state[8];
    };
    $pp_set_margin = function(dynamic $state, dynamic $n) use ($Pervasives,$call2,$pp_limit,$pp_set_max_indent) {
      $bL = 1 <= $n ? 1 : (0);
      if ($bL) {
        $n__0 = $pp_limit($n);
        $state[6] = $n__0;
        if ($state[8] <= $state[6]) {
          $new_max_indent = $state[8];
        }
        else {
          $bM = $call2(
            $Pervasives[5],
            (int)
            ($state[6] - $state[7]),
            (int)
            ($state[6] / 2)
          );
          $new_max_indent = $call2($Pervasives[5], $bM, 1);
        }
        return $pp_set_max_indent($state, $new_max_indent);
      }
      return $bL;
    };
    $pp_get_margin = function(dynamic $state, dynamic $param) {return $state[6];
    };
    $pp_set_formatter_out_functions = function(dynamic $state, dynamic $param) {
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
    $pp_get_formatter_out_functions = function(dynamic $state, dynamic $param) {
      return Vector{
        0,
        $state[17],
        $state[18],
        $state[19],
        $state[20],
        $state[21]
      };
    };
    $pp_set_formatter_output_functions = function
    (dynamic $state, dynamic $f, dynamic $g) {
      $state[17] = $f;
      $state[18] = $g;
      return 0;
    };
    $pp_get_formatter_output_functions = function
    (dynamic $state, dynamic $param) {
      return Vector{0, $state[17], $state[18]};
    };
    $display_newline = function(dynamic $state, dynamic $param) use ($call3,$cst) {
      return $call3($state[17], $cst, 0, 1);
    };
    $blank_line = $call2($String[1], 80, 32);
    $display_blanks = function(dynamic $state, dynamic $n) use ($blank_line,$call3) {
      $n__0 = $n;
      for (;;) {
        $bK = 0 < $n__0 ? 1 : (0);
        if ($bK) {
          if (80 < $n__0) {
            $call3($state[17], $blank_line, 0, 80);
            $n__1 = (int) ($n__0 + -80);
            $n__0 = $n__1;
            continue;
          }
          return $call3($state[17], $blank_line, 0, $n__0);
        }
        return $bK;
      }
    };
    $pp_set_formatter_out_channel = function(dynamic $state, dynamic $oc) use ($Pervasives,$call1,$display_blanks,$display_newline) {
      $state[17] = $call1($Pervasives[57], $oc);
      $state[18] =
        function(dynamic $param) use ($Pervasives,$call1,$oc) {
          return $call1($Pervasives[51], $oc);
        };
      $state[19] =
        function(dynamic $bJ) use ($display_newline,$state) {
          return $display_newline($state, $bJ);
        };
      $state[20] =
        function(dynamic $bI) use ($display_blanks,$state) {
          return $display_blanks($state, $bI);
        };
      $state[21] =
        function(dynamic $bH) use ($display_blanks,$state) {
          return $display_blanks($state, $bH);
        };
      return 0;
    };
    $default_pp_mark_open_tag = function(dynamic $s) use ($Pervasives,$call2,$cst__0,$cst__1) {
      $bG = $call2($Pervasives[16], $s, $cst__0);
      return $call2($Pervasives[16], $cst__1, $bG);
    };
    $default_pp_mark_close_tag = function(dynamic $s) use ($Pervasives,$call2,$cst__2,$cst__3) {
      $bF = $call2($Pervasives[16], $s, $cst__2);
      return $call2($Pervasives[16], $cst__3, $bF);
    };
    $default_pp_print_open_tag = function(dynamic $bE) {return 0;};
    $default_pp_print_close_tag = function(dynamic $bD) {return 0;};
    $pp_make_formatter = function
    (dynamic $f, dynamic $g, dynamic $h, dynamic $i, dynamic $j) use ($Pervasives,$add_queue,$b,$cst__4,$default_pp_mark_close_tag,$default_pp_mark_open_tag,$default_pp_print_close_tag,$default_pp_print_open_tag,$make_queue,$make_queue_elem,$scan_stack_bottom) {
      $pp_queue = $make_queue(0);
      $sys_tok = $make_queue_elem(-1, $b, 0);
      $add_queue($sys_tok, $pp_queue);
      $sys_scan_stack = Vector{0, Vector{0, 1, $sys_tok}, $scan_stack_bottom};
      return Vector{
        0,
        $sys_scan_stack,
        0,
        0,
        0,
        0,
        78,
        10,
        68,
        78,
        0,
        1,
        1,
        1,
        1,
        $Pervasives[7],
        $cst__4,
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
    $formatter_of_out_functions = function(dynamic $out_funs) use ($pp_make_formatter) {
      return $pp_make_formatter(
        $out_funs[1],
        $out_funs[2],
        $out_funs[3],
        $out_funs[4],
        $out_funs[5]
      );
    };
    $make_formatter = function(dynamic $output, dynamic $flush) use ($display_blanks,$display_newline,$pp_make_formatter) {
      $bv = function(dynamic $bC) {return 0;};
      $bw = function(dynamic $bB) {return 0;};
      $ppf = $pp_make_formatter(
        $output,
        $flush,
        function(dynamic $bA) {return 0;},
        $bw,
        $bv
      );
      $ppf[19] =
        function(dynamic $bz) use ($display_newline,$ppf) {
          return $display_newline($ppf, $bz);
        };
      $ppf[20] =
        function(dynamic $by) use ($display_blanks,$ppf) {
          return $display_blanks($ppf, $by);
        };
      $ppf[21] =
        function(dynamic $bx) use ($display_blanks,$ppf) {
          return $display_blanks($ppf, $bx);
        };
      return $ppf;
    };
    $formatter_of_out_channel = function(dynamic $oc) use ($Pervasives,$call1,$make_formatter) {
      $bu = function(dynamic $param) use ($Pervasives,$call1,$oc) {
        return $call1($Pervasives[51], $oc);
      };
      return $make_formatter($call1($Pervasives[57], $oc), $bu);
    };
    $formatter_of_buffer = function(dynamic $b) use ($Buffer,$call1,$make_formatter) {
      $bs = function(dynamic $bt) {return 0;};
      return $make_formatter($call1($Buffer[16], $b), $bs);
    };
    $pp_buffer_size = 512;
    $pp_make_buffer = function(dynamic $param) use ($Buffer,$call1,$pp_buffer_size) {
      return $call1($Buffer[1], $pp_buffer_size);
    };
    $stdbuf = $pp_make_buffer(0);
    $std_formatter = $formatter_of_out_channel($Pervasives[27]);
    $err_formatter = $formatter_of_out_channel($Pervasives[28]);
    $str_formatter = $formatter_of_buffer($stdbuf);
    $flush_buffer_formatter = function(dynamic $buf, dynamic $ppf) use ($Buffer,$call1,$pp_flush_queue) {
      $pp_flush_queue($ppf, 0);
      $s = $call1($Buffer[2], $buf);
      $call1($Buffer[9], $buf);
      return $s;
    };
    $flush_str_formatter = function(dynamic $param) use ($flush_buffer_formatter,$stdbuf,$str_formatter) {
      return $flush_buffer_formatter($stdbuf, $str_formatter);
    };
    $make_symbolic_output_buffer = function(dynamic $param) {return Vector{0, 0};
    };
    $clear_symbolic_output_buffer = function(dynamic $sob) {
      $sob[1] = 0;
      return 0;
    };
    $get_symbolic_output_buffer = function(dynamic $sob) use ($List,$call1) {
      return $call1($List[9], $sob[1]);
    };
    $flush_symbolic_output_buffer = function(dynamic $sob) use ($clear_symbolic_output_buffer,$get_symbolic_output_buffer) {
      $items = $get_symbolic_output_buffer($sob);
      $clear_symbolic_output_buffer($sob);
      return $items;
    };
    $add_symbolic_output_item = function(dynamic $sob, dynamic $item) {
      $sob[1] = Vector{0, $item, $sob[1]};
      return 0;
    };
    $formatter_of_symbolic_output_buffer = function(dynamic $sob) use ($String,$add_symbolic_output_item,$call3,$pp_make_formatter) {
      $symbolic_flush = function(dynamic $sob, dynamic $param) use ($add_symbolic_output_item) {
        return $add_symbolic_output_item($sob, 0);
      };
      $symbolic_newline = function(dynamic $sob, dynamic $param) use ($add_symbolic_output_item) {
        return $add_symbolic_output_item($sob, 1);
      };
      $symbolic_string = function
      (dynamic $sob, dynamic $s, dynamic $i, dynamic $n) use ($String,$add_symbolic_output_item,$call3) {
        return $add_symbolic_output_item(
          $sob,
          Vector{0, $call3($String[4], $s, $i, $n)}
        );
      };
      $symbolic_spaces = function(dynamic $sob, dynamic $n) use ($add_symbolic_output_item) {
        return $add_symbolic_output_item($sob, Vector{1, $n});
      };
      $symbolic_indent = function(dynamic $sob, dynamic $n) use ($add_symbolic_output_item) {
        return $add_symbolic_output_item($sob, Vector{2, $n});
      };
      $f = function(dynamic $bp, dynamic $bq, dynamic $br) use ($sob,$symbolic_string) {
        return $symbolic_string($sob, $bp, $bq, $br);
      };
      $g = function(dynamic $bo) use ($sob,$symbolic_flush) {
        return $symbolic_flush($sob, $bo);
      };
      $h = function(dynamic $bn) use ($sob,$symbolic_newline) {
        return $symbolic_newline($sob, $bn);
      };
      $i = function(dynamic $bm) use ($sob,$symbolic_spaces) {
        return $symbolic_spaces($sob, $bm);
      };
      $j = function(dynamic $bl) use ($sob,$symbolic_indent) {
        return $symbolic_indent($sob, $bl);
      };
      return $pp_make_formatter($f, $g, $h, $i, $j);
    };
    $open_hbox = function(dynamic $bk) use ($pp_open_hbox,$std_formatter) {
      return $pp_open_hbox($std_formatter, $bk);
    };
    $open_vbox = function(dynamic $bj) use ($pp_open_vbox,$std_formatter) {
      return $pp_open_vbox($std_formatter, $bj);
    };
    $open_hvbox = function(dynamic $bi) use ($pp_open_hvbox,$std_formatter) {
      return $pp_open_hvbox($std_formatter, $bi);
    };
    $open_hovbox = function(dynamic $bh) use ($pp_open_hovbox,$std_formatter) {
      return $pp_open_hovbox($std_formatter, $bh);
    };
    $open_box = function(dynamic $bg) use ($pp_open_box,$std_formatter) {
      return $pp_open_box($std_formatter, $bg);
    };
    $close_box = function(dynamic $bf) use ($pp_close_box,$std_formatter) {
      return $pp_close_box($std_formatter, $bf);
    };
    $open_tag = function(dynamic $be) use ($pp_open_tag,$std_formatter) {
      return $pp_open_tag($std_formatter, $be);
    };
    $close_tag = function(dynamic $bd) use ($pp_close_tag,$std_formatter) {
      return $pp_close_tag($std_formatter, $bd);
    };
    $print_as = function(dynamic $bb, dynamic $bc) use ($pp_print_as,$std_formatter) {
      return $pp_print_as($std_formatter, $bb, $bc);
    };
    $print_string = function(dynamic $ba) use ($pp_print_string,$std_formatter) {
      return $pp_print_string($std_formatter, $ba);
    };
    $print_int = function(dynamic $a_) use ($pp_print_int,$std_formatter) {
      return $pp_print_int($std_formatter, $a_);
    };
    $print_float = function(dynamic $a9) use ($pp_print_float,$std_formatter) {
      return $pp_print_float($std_formatter, $a9);
    };
    $print_char = function(dynamic $a8) use ($pp_print_char,$std_formatter) {
      return $pp_print_char($std_formatter, $a8);
    };
    $print_bool = function(dynamic $a7) use ($pp_print_bool,$std_formatter) {
      return $pp_print_bool($std_formatter, $a7);
    };
    $print_break = function(dynamic $a5, dynamic $a6) use ($pp_print_break,$std_formatter) {
      return $pp_print_break($std_formatter, $a5, $a6);
    };
    $print_cut = function(dynamic $a4) use ($pp_print_cut,$std_formatter) {
      return $pp_print_cut($std_formatter, $a4);
    };
    $print_space = function(dynamic $a3) use ($pp_print_space,$std_formatter) {
      return $pp_print_space($std_formatter, $a3);
    };
    $force_newline = function(dynamic $a2) use ($pp_force_newline,$std_formatter) {
      return $pp_force_newline($std_formatter, $a2);
    };
    $print_flush = function(dynamic $a1) use ($pp_print_flush,$std_formatter) {
      return $pp_print_flush($std_formatter, $a1);
    };
    $print_newline = function(dynamic $a0) use ($pp_print_newline,$std_formatter) {
      return $pp_print_newline($std_formatter, $a0);
    };
    $print_if_newline = function(dynamic $aZ) use ($pp_print_if_newline,$std_formatter) {
      return $pp_print_if_newline($std_formatter, $aZ);
    };
    $open_tbox = function(dynamic $aY) use ($pp_open_tbox,$std_formatter) {
      return $pp_open_tbox($std_formatter, $aY);
    };
    $close_tbox = function(dynamic $aX) use ($pp_close_tbox,$std_formatter) {
      return $pp_close_tbox($std_formatter, $aX);
    };
    $print_tbreak = function(dynamic $aV, dynamic $aW) use ($pp_print_tbreak,$std_formatter) {
      return $pp_print_tbreak($std_formatter, $aV, $aW);
    };
    $set_tab = function(dynamic $aU) use ($pp_set_tab,$std_formatter) {
      return $pp_set_tab($std_formatter, $aU);
    };
    $print_tab = function(dynamic $aT) use ($pp_print_tab,$std_formatter) {
      return $pp_print_tab($std_formatter, $aT);
    };
    $set_margin = function(dynamic $aS) use ($pp_set_margin,$std_formatter) {
      return $pp_set_margin($std_formatter, $aS);
    };
    $get_margin = function(dynamic $aR) use ($pp_get_margin,$std_formatter) {
      return $pp_get_margin($std_formatter, $aR);
    };
    $set_max_indent = function(dynamic $aQ) use ($pp_set_max_indent,$std_formatter) {
      return $pp_set_max_indent($std_formatter, $aQ);
    };
    $get_max_indent = function(dynamic $aP) use ($pp_get_max_indent,$std_formatter) {
      return $pp_get_max_indent($std_formatter, $aP);
    };
    $set_max_boxes = function(dynamic $aO) use ($pp_set_max_boxes,$std_formatter) {
      return $pp_set_max_boxes($std_formatter, $aO);
    };
    $get_max_boxes = function(dynamic $aN) use ($pp_get_max_boxes,$std_formatter) {
      return $pp_get_max_boxes($std_formatter, $aN);
    };
    $over_max_boxes = function(dynamic $aM) use ($pp_over_max_boxes,$std_formatter) {
      return $pp_over_max_boxes($std_formatter, $aM);
    };
    $set_ellipsis_text = function(dynamic $aL) use ($pp_set_ellipsis_text,$std_formatter) {
      return $pp_set_ellipsis_text($std_formatter, $aL);
    };
    $get_ellipsis_text = function(dynamic $aK) use ($pp_get_ellipsis_text,$std_formatter) {
      return $pp_get_ellipsis_text($std_formatter, $aK);
    };
    $set_formatter_out_channel = function(dynamic $aJ) use ($pp_set_formatter_out_channel,$std_formatter) {
      return $pp_set_formatter_out_channel($std_formatter, $aJ);
    };
    $set_formatter_out_functions = function(dynamic $aI) use ($pp_set_formatter_out_functions,$std_formatter) {
      return $pp_set_formatter_out_functions($std_formatter, $aI);
    };
    $get_formatter_out_functions = function(dynamic $aH) use ($pp_get_formatter_out_functions,$std_formatter) {
      return $pp_get_formatter_out_functions($std_formatter, $aH);
    };
    $set_formatter_output_functions = function(dynamic $aF, dynamic $aG) use ($pp_set_formatter_output_functions,$std_formatter) {
      return $pp_set_formatter_output_functions($std_formatter, $aF, $aG);
    };
    $get_formatter_output_functions = function(dynamic $aE) use ($pp_get_formatter_output_functions,$std_formatter) {
      return $pp_get_formatter_output_functions($std_formatter, $aE);
    };
    $set_formatter_tag_functions = function(dynamic $aD) use ($pp_set_formatter_tag_functions,$std_formatter) {
      return $pp_set_formatter_tag_functions($std_formatter, $aD);
    };
    $get_formatter_tag_functions = function(dynamic $aC) use ($pp_get_formatter_tag_functions,$std_formatter) {
      return $pp_get_formatter_tag_functions($std_formatter, $aC);
    };
    $set_print_tags = function(dynamic $aB) use ($pp_set_print_tags,$std_formatter) {
      return $pp_set_print_tags($std_formatter, $aB);
    };
    $get_print_tags = function(dynamic $aA) use ($pp_get_print_tags,$std_formatter) {
      return $pp_get_print_tags($std_formatter, $aA);
    };
    $set_mark_tags = function(dynamic $az) use ($pp_set_mark_tags,$std_formatter) {
      return $pp_set_mark_tags($std_formatter, $az);
    };
    $get_mark_tags = function(dynamic $ay) use ($pp_get_mark_tags,$std_formatter) {
      return $pp_get_mark_tags($std_formatter, $ay);
    };
    $set_tags = function(dynamic $ax) use ($pp_set_tags,$std_formatter) {
      return $pp_set_tags($std_formatter, $ax);
    };
    $pp_print_list = function
    (dynamic $opt, dynamic $pp_v, dynamic $ppf, dynamic $param) use ($call2,$pp_print_cut) {
      $opt__0 = $opt;
      $param__0 = $param;
      for (;;) {
        if ($opt__0) {
          $sth = $opt__0[1];
          $pp_sep = $sth;
        }
        else {$pp_sep = $pp_print_cut;}
        if ($param__0) {
          $av = $param__0[2];
          $aw = $param__0[1];
          if ($av) {
            $call2($pp_v, $ppf, $aw);
            $call2($pp_sep, $ppf, 0);
            $opt__1 = Vector{0, $pp_sep};
            $opt__0 = $opt__1;
            $param__0 = $av;
            continue;
          }
          return $call2($pp_v, $ppf, $aw);
        }
        return 0;
      }
    };
    $pp_print_text = function(dynamic $ppf, dynamic $s) use ($String,$call3,$caml_ml_string_length,$pp_force_newline,$pp_print_space,$pp_print_string,$runtime) {
      $len = $caml_ml_string_length($s);
      $left = Vector{0, 0};
      $right = Vector{0, 0};
      $flush = function(dynamic $param) use ($String,$call3,$left,$pp_print_string,$ppf,$right,$s) {
        $pp_print_string(
          $ppf,
          $call3($String[4], $s, $left[1], (int) ($right[1] - $left[1]))
        );
        $right[1] += 1;
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
            else {$right[1] += 1;}
          }
          continue;
        }
        $au = $left[1] !== $len ? 1 : (0);
        return $au ? $flush(0) : ($au);
      }
    };
    $compute_tag = function(dynamic $output, dynamic $tag_acc) use ($Buffer,$call1,$call2,$call3,$formatter_of_buffer,$pp_print_flush) {
      $buf = $call1($Buffer[1], 16);
      $ppf = $formatter_of_buffer($buf);
      $call2($output, $ppf, $tag_acc);
      $pp_print_flush($ppf, 0);
      $len = $call1($Buffer[7], $buf);
      return 2 <= $len
        ? $call3($Buffer[4], $buf, 1, (int) ($len + -2))
        : ($call1($Buffer[2], $buf));
    };
    $output_formatting_lit = function(dynamic $ppf, dynamic $fmting_lit) use ($is_int,$pp_close_box,$pp_close_tag,$pp_force_newline,$pp_print_break,$pp_print_char,$pp_print_flush,$pp_print_newline) {
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
    $output_acc->contents = function(dynamic $ppf, dynamic $acc) use ($CamlinternalFormat,$Pervasives,$String,$call1,$call2,$compute_tag,$is_int,$output_acc,$output_formatting_lit,$pp_open_box_gen,$pp_open_tag,$pp_print_as_size,$pp_print_char,$pp_print_flush,$pp_print_string) {
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
            $T = $acc[2];
            $U = $acc[1];
            if (0 === $T[0]) {
              $acc__0 = $T[1];
              $output_acc->contents($ppf, $U);
              return $pp_open_tag(
                $ppf,
                $compute_tag($output_acc->contents, $acc__0)
              );
            }
            $acc__1 = $T[1];
            $output_acc->contents($ppf, $U);
            $V = $compute_tag($output_acc->contents, $acc__1);
            $match = $call1($CamlinternalFormat[21], $V);
            $bty = $match[2];
            $indent = $match[1];
            return $pp_open_box_gen($ppf, $indent, $bty);
          // FALLTHROUGH
          case 2:
            $W = $acc[1];
            if ($is_int($W)) {$switch__1 = 1;}
            else {
              if (0 === $W[0]) {
                $Y = $W[2];
                if ($is_int($Y)) {$switch__2 = 1;}
                else {
                  if (1 === $Y[0]) {
                    $Z = $acc[2];
                    $aa = $Y[2];
                    $ab = $W[1];
                    $s__0 = $Z;
                    $size = $aa;
                    $p__1 = $ab;
                    $switch__0 = 0;
                    $switch__1 = 0;
                    $switch__2 = 0;
                  }
                  else {$switch__2 = 1;}
                }
                if ($switch__2) {$switch__1 = 1;}
              }
              else {$switch__1 = 1;}
            }
            if ($switch__1) {$X = $acc[2];$s = $X;$p__0 = $W;$switch__0 = 2;}
            break;
          // FALLTHROUGH
          case 3:
            $ac = $acc[1];
            if ($is_int($ac)) {$switch__3 = 1;}
            else {
              if (0 === $ac[0]) {
                $ae = $ac[2];
                if ($is_int($ae)) {$switch__4 = 1;}
                else {
                  if (1 === $ae[0]) {
                    $af = $acc[2];
                    $ag = $ae[2];
                    $ah = $ac[1];
                    $c__0 = $af;
                    $size__0 = $ag;
                    $p__3 = $ah;
                    $switch__0 = 1;
                    $switch__3 = 0;
                    $switch__4 = 0;
                  }
                  else {$switch__4 = 1;}
                }
                if ($switch__4) {$switch__3 = 1;}
              }
              else {$switch__3 = 1;}
            }
            if ($switch__3) {
              $ad = $acc[2];
              $c = $ad;
              $p__2 = $ac;
              $switch__0 = 3;
            }
            break;
          // FALLTHROUGH
          case 4:
            $ai = $acc[1];
            if ($is_int($ai)) {$switch__5 = 1;}
            else {
              if (0 === $ai[0]) {
                $ak = $ai[2];
                if ($is_int($ak)) {$switch__6 = 1;}
                else {
                  if (1 === $ak[0]) {
                    $al = $acc[2];
                    $am = $ak[2];
                    $an = $ai[1];
                    $s__0 = $al;
                    $size = $am;
                    $p__1 = $an;
                    $switch__0 = 0;
                    $switch__5 = 0;
                    $switch__6 = 0;
                  }
                  else {$switch__6 = 1;}
                }
                if ($switch__6) {$switch__5 = 1;}
              }
              else {$switch__5 = 1;}
            }
            if ($switch__5) {
              $aj = $acc[2];
              $s = $aj;
              $p__0 = $ai;
              $switch__0 = 2;
            }
            break;
          // FALLTHROUGH
          case 5:
            $ao = $acc[1];
            if ($is_int($ao)) {$switch__7 = 1;}
            else {
              if (0 === $ao[0]) {
                $aq = $ao[2];
                if ($is_int($aq)) {$switch__8 = 1;}
                else {
                  if (1 === $aq[0]) {
                    $ar = $acc[2];
                    $as = $aq[2];
                    $at = $ao[1];
                    $c__0 = $ar;
                    $size__0 = $as;
                    $p__3 = $at;
                    $switch__0 = 1;
                    $switch__7 = 0;
                    $switch__8 = 0;
                  }
                  else {$switch__8 = 1;}
                }
                if ($switch__8) {$switch__7 = 1;}
              }
              else {$switch__7 = 1;}
            }
            if ($switch__7) {
              $ap = $acc[2];
              $c = $ap;
              $p__2 = $ao;
              $switch__0 = 3;
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
            return $call1($Pervasives[1], $msg);
          }
      }
      switch($switch__0) {
        // FALLTHROUGH
        case 0:
          $output_acc->contents($ppf, $p__1);
          return $pp_print_as_size($ppf, $size, $s__0);
        // FALLTHROUGH
        case 1:
          $output_acc->contents($ppf, $p__3);
          return $pp_print_as_size(
            $ppf,
            $size__0,
            $call2($String[1], 1, $c__0)
          );
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
    $strput_acc->contents = function(dynamic $ppf, dynamic $acc) use ($CamlinternalFormat,$Pervasives,$String,$call1,$call2,$compute_tag,$is_int,$output_formatting_lit,$pp_open_box_gen,$pp_open_tag,$pp_print_as_size,$pp_print_char,$pp_print_flush,$pp_print_string,$strput_acc) {
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
            $q = $acc[2];
            $r = $acc[1];
            if (0 === $q[0]) {
              $acc__0 = $q[1];
              $strput_acc->contents($ppf, $r);
              return $pp_open_tag(
                $ppf,
                $compute_tag($strput_acc->contents, $acc__0)
              );
            }
            $acc__1 = $q[1];
            $strput_acc->contents($ppf, $r);
            $s = $compute_tag($strput_acc->contents, $acc__1);
            $match = $call1($CamlinternalFormat[21], $s);
            $bty = $match[2];
            $indent = $match[1];
            return $pp_open_box_gen($ppf, $indent, $bty);
          // FALLTHROUGH
          case 2:
            $t = $acc[1];
            if ($is_int($t)) {$switch__1 = 1;}
            else {
              if (0 === $t[0]) {
                $v = $t[2];
                if ($is_int($v)) {$switch__2 = 1;}
                else {
                  if (1 === $v[0]) {
                    $w = $acc[2];
                    $x = $v[2];
                    $y = $t[1];
                    $s__1 = $w;
                    $size = $x;
                    $p__1 = $y;
                    $switch__0 = 0;
                    $switch__1 = 0;
                    $switch__2 = 0;
                  }
                  else {$switch__2 = 1;}
                }
                if ($switch__2) {$switch__1 = 1;}
              }
              else {$switch__1 = 1;}
            }
            if ($switch__1) {
              $u = $acc[2];
              $s__0 = $u;
              $p__0 = $t;
              $switch__0 = 2;
            }
            break;
          // FALLTHROUGH
          case 3:
            $z = $acc[1];
            if ($is_int($z)) {$switch__3 = 1;}
            else {
              if (0 === $z[0]) {
                $B = $z[2];
                if ($is_int($B)) {$switch__4 = 1;}
                else {
                  if (1 === $B[0]) {
                    $C = $acc[2];
                    $D = $B[2];
                    $E = $z[1];
                    $c__0 = $C;
                    $size__0 = $D;
                    $p__3 = $E;
                    $switch__0 = 1;
                    $switch__3 = 0;
                    $switch__4 = 0;
                  }
                  else {$switch__4 = 1;}
                }
                if ($switch__4) {$switch__3 = 1;}
              }
              else {$switch__3 = 1;}
            }
            if ($switch__3) {$A = $acc[2];$c = $A;$p__2 = $z;$switch__0 = 3;}
            break;
          // FALLTHROUGH
          case 4:
            $F = $acc[1];
            if ($is_int($F)) {$switch__5 = 1;}
            else {
              if (0 === $F[0]) {
                $H = $F[2];
                if ($is_int($H)) {$switch__6 = 1;}
                else {
                  if (1 === $H[0]) {
                    $I = $acc[2];
                    $J = $H[2];
                    $K = $F[1];
                    $s__1 = $I;
                    $size = $J;
                    $p__1 = $K;
                    $switch__0 = 0;
                    $switch__5 = 0;
                    $switch__6 = 0;
                  }
                  else {$switch__6 = 1;}
                }
                if ($switch__6) {$switch__5 = 1;}
              }
              else {$switch__5 = 1;}
            }
            if ($switch__5) {
              $G = $acc[2];
              $s__0 = $G;
              $p__0 = $F;
              $switch__0 = 2;
            }
            break;
          // FALLTHROUGH
          case 5:
            $L = $acc[1];
            if ($is_int($L)) {$switch__7 = 1;}
            else {
              if (0 === $L[0]) {
                $N = $L[2];
                if ($is_int($N)) {$switch__8 = 1;}
                else {
                  if (1 === $N[0]) {
                    $O = $acc[2];
                    $P = $N[2];
                    $Q = $L[1];
                    $c__0 = $O;
                    $size__0 = $P;
                    $p__3 = $Q;
                    $switch__0 = 1;
                    $switch__7 = 0;
                    $switch__8 = 0;
                  }
                  else {$switch__8 = 1;}
                }
                if ($switch__8) {$switch__7 = 1;}
              }
              else {$switch__7 = 1;}
            }
            if ($switch__7) {$M = $acc[2];$c = $M;$p__2 = $L;$switch__0 = 3;}
            break;
          // FALLTHROUGH
          case 6:
            $R = $acc[1];
            if (! $is_int($R) && 0 === $R[0]) {
              $S = $R[2];
              if (! $is_int($S) && 1 === $S[0]) {
                $f__1 = $acc[2];
                $size__1 = $S[2];
                $p__4 = $R[1];
                $strput_acc->contents($ppf, $p__4);
                return $pp_print_as_size($ppf, $size__1, $call1($f__1, 0));
              }
            }
            $f__0 = $acc[2];
            $strput_acc->contents($ppf, $R);
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
            return $call1($Pervasives[1], $msg);
          }
      }
      switch($switch__0) {
        // FALLTHROUGH
        case 0:
          $strput_acc->contents($ppf, $p__1);
          return $pp_print_as_size($ppf, $size, $s__1);
        // FALLTHROUGH
        case 1:
          $strput_acc->contents($ppf, $p__3);
          return $pp_print_as_size(
            $ppf,
            $size__0,
            $call2($String[1], 1, $c__0)
          );
        // FALLTHROUGH
        case 2:
          $strput_acc->contents($ppf, $p__0);
          return $pp_print_string($ppf, $s__0);
        // FALLTHROUGH
        default:
          $strput_acc->contents($ppf, $p__2);
          return $pp_print_char($ppf, $c);
        }
    };
    $kfprintf = function(dynamic $k, dynamic $ppf, dynamic $param) use ($CamlinternalFormat,$call1,$call4,$output_acc) {
      $fmt = $param[1];
      $o = 0;
      $p = function(dynamic $ppf, dynamic $acc) use ($call1,$k,$output_acc) {
        $output_acc->contents($ppf, $acc);
        return $call1($k, $ppf);
      };
      return $call4($CamlinternalFormat[7], $p, $ppf, $o, $fmt);
    };
    $ikfprintf = function(dynamic $k, dynamic $ppf, dynamic $param) use ($CamlinternalFormat,$call3) {
      $fmt = $param[1];
      return $call3($CamlinternalFormat[8], $k, $ppf, $fmt);
    };
    $fprintf = function(dynamic $ppf) use ($kfprintf) {
      $l = function(dynamic $n) {return 0;};
      return function(dynamic $m) use ($kfprintf,$l,$ppf) {
        return $kfprintf($l, $ppf, $m);
      };
    };
    $ifprintf = function(dynamic $ppf) use ($ikfprintf) {
      $i = function(dynamic $k) {return 0;};
      return function(dynamic $j) use ($i,$ikfprintf,$ppf) {
        return $ikfprintf($i, $ppf, $j);
      };
    };
    $printf = function(dynamic $fmt) use ($call1,$fprintf,$std_formatter) {
      return $call1($fprintf($std_formatter), $fmt);
    };
    $eprintf = function(dynamic $fmt) use ($call1,$err_formatter,$fprintf) {
      return $call1($fprintf($err_formatter), $fmt);
    };
    $ksprintf = function(dynamic $k, dynamic $param) use ($CamlinternalFormat,$call1,$call4,$flush_buffer_formatter,$formatter_of_buffer,$pp_make_buffer,$strput_acc) {
      $fmt = $param[1];
      $b = $pp_make_buffer(0);
      $ppf = $formatter_of_buffer($b);
      $k__0 = function(dynamic $param, dynamic $acc) use ($b,$call1,$flush_buffer_formatter,$k,$ppf,$strput_acc) {
        $strput_acc->contents($ppf, $acc);
        return $call1($k, $flush_buffer_formatter($b, $ppf));
      };
      return $call4($CamlinternalFormat[7], $k__0, 0, 0, $fmt);
    };
    $sprintf = function(dynamic $fmt) use ($ksprintf) {
      return $ksprintf(function(dynamic $s) {return $s;}, $fmt);
    };
    $kasprintf = function(dynamic $k, dynamic $param) use ($CamlinternalFormat,$call1,$call4,$flush_buffer_formatter,$formatter_of_buffer,$output_acc,$pp_make_buffer) {
      $fmt = $param[1];
      $b = $pp_make_buffer(0);
      $ppf = $formatter_of_buffer($b);
      $k__0 = function(dynamic $ppf, dynamic $acc) use ($b,$call1,$flush_buffer_formatter,$k,$output_acc) {
        $output_acc->contents($ppf, $acc);
        return $call1($k, $flush_buffer_formatter($b, $ppf));
      };
      return $call4($CamlinternalFormat[7], $k__0, $ppf, 0, $fmt);
    };
    $asprintf = function(dynamic $fmt) use ($kasprintf) {
      return $kasprintf(function(dynamic $s) {return $s;}, $fmt);
    };
    
    $call1($Pervasives[88], $print_flush);
    
    $pp_set_all_formatter_output_functions = function
    (dynamic $state, dynamic $f, dynamic $g, dynamic $h, dynamic $i) use ($pp_set_formatter_output_functions) {
      $pp_set_formatter_output_functions($state, $f, $g);
      $state[19] = $h;
      $state[20] = $i;
      return 0;
    };
    $pp_get_all_formatter_output_functions = function
    (dynamic $state, dynamic $param) {
      return Vector{0, $state[17], $state[18], $state[19], $state[20]};
    };
    $set_all_formatter_output_functions = function
    (dynamic $e, dynamic $f, dynamic $g, dynamic $h) use ($pp_set_all_formatter_output_functions,$std_formatter) {
      return $pp_set_all_formatter_output_functions(
        $std_formatter,
        $e,
        $f,
        $g,
        $h
      );
    };
    $get_all_formatter_output_functions = function(dynamic $d) use ($pp_get_all_formatter_output_functions,$std_formatter) {
      return $pp_get_all_formatter_output_functions($std_formatter, $d);
    };
    $bprintf = function(dynamic $b, dynamic $param) use ($CamlinternalFormat,$call4,$formatter_of_buffer,$output_acc,$pp_flush_queue) {
      $fmt = $param[1];
      $k = function(dynamic $ppf, dynamic $acc) use ($output_acc,$pp_flush_queue) {
        $output_acc->contents($ppf, $acc);
        return $pp_flush_queue($ppf, 0);
      };
      $c = $formatter_of_buffer($b);
      return $call4($CamlinternalFormat[7], $k, $c, 0, $fmt);
    };
    $Format = Vector{
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
      $pp_open_tag,
      $open_tag,
      $pp_close_tag,
      $close_tag,
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
      $pp_set_formatter_tag_functions,
      $set_formatter_tag_functions,
      $pp_get_formatter_tag_functions,
      $get_formatter_tag_functions,
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
      $fprintf,
      $printf,
      $eprintf,
      $sprintf,
      $asprintf,
      $ifprintf,
      $kfprintf,
      $ikfprintf,
      $ksprintf,
      $kasprintf,
      $bprintf,
      $ksprintf,
      $set_all_formatter_output_functions,
      $get_all_formatter_output_functions,
      $pp_set_all_formatter_output_functions,
      $pp_get_all_formatter_output_functions
    };
    
    $runtime["caml_register_global"](15, $Format, "Format");

  }
}

/*____hashes compiler:hashing-disabled inputs:hashing-disabled bytecode:hashing-disabled*/
