<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class Format {
  <<__Override, __Memoize>>
  public static function get() : Vector<dynamic> {
    $joo_global_object = \Rehack\GlobalObject::get() as dynamic;
    
    $output_acc = new Ref();$strput_acc = new Ref();
    $runtime = $joo_global_object->jsoo_runtime;
    $call1 = $runtime["caml_call1"];
    $call2 = $runtime["caml_call2"];
    $call3 = $runtime["caml_call3"];
    $call4 = $runtime["caml_call4"];
    $caml_ml_string_length = $runtime["caml_ml_string_length"];
    $string = $runtime["caml_new_string"];
    $caml_wrap_thrown_exception = $runtime["caml_wrap_thrown_exception"];
    $caml_wrap_thrown_exception_reraise = $runtime[
       "caml_wrap_thrown_exception_reraise"
     ];
    $is_int = $runtime["is_int"];
    $cst__4 = $string(".");
    $cst__2 = $string(">");
    $cst__3 = $string("</");
    $cst__0 = $string(">");
    $cst__1 = $string("<");
    $cst = $string("\n");
    $cst_Format_Empty_queue = $string("Format.Empty_queue");
    $CamlinternalFormat =  CamlinternalFormat::get ();
    $Pervasives =  Pervasives::get ();
    $String =  String_::get ();
    $Buffer =  Buffer::get ();
    $List =  List_::get ();
    $Not_found =  Not_found::get ();
    $b_ = Vector{3, 0, 3};
    $a_ = Vector{0, $string("")};
    $make_queue = (dynamic $param) ==> {return Vector{0, 0, 0};};
    $clear_queue = (dynamic $q) ==> {$q[1] = 0;$q[2] = 0;return 0;};
    $add_queue = (dynamic $x, dynamic $q) ==> {
      $c = Vector{0, $x, 0};
      $cx_ = $q[1];
      if ($cx_) {$q[1] = $c;$cx_[2] = $c;return 0;}
      $q[1] = $c;
      $q[2] = $c;
      return 0;
    };
    $Empty_queue = Vector{
      248,
      $cst_Format_Empty_queue,
      $runtime["caml_fresh_oo_id"](0)
    };
    $peek_queue = (dynamic $param) ==> {
      $cw_ = $param[2];
      if ($cw_) {$x = $cw_[1];return $x;}
      throw $caml_wrap_thrown_exception($Empty_queue) as \Throwable;
    };
    $take_queue = (dynamic $q) ==> {
      $cv_ = $q[2];
      if ($cv_) {
        $x = $cv_[1];
        $tl = $cv_[2];
        $q[2] = $tl;
        if (0 === $tl) {$q[1] = 0;}
        return $x;
      }
      throw $caml_wrap_thrown_exception($Empty_queue) as \Throwable;
    };
    $pp_enqueue = (dynamic $state, dynamic $token) ==> {
      $len = $token[3];
      $state[13] = (int) ($state[13] + $len);
      return $add_queue($token, $state[28]);
    };
    $pp_clear_queue = (dynamic $state) ==> {
      $state[12] = 1;
      $state[13] = 1;
      return $clear_queue($state[28]);
    };
    $pp_infinity = 1000000010;
    $pp_output_string = (dynamic $state, dynamic $s) ==> {
      return $call3($state[17], $s, 0, $caml_ml_string_length($s));
    };
    $pp_output_newline = (dynamic $state) ==> {return $call1($state[19], 0);};
    $pp_output_spaces = (dynamic $state, dynamic $n) ==> {
      return $call1($state[20], $n);
    };
    $pp_output_indent = (dynamic $state, dynamic $n) ==> {
      return $call1($state[21], $n);
    };
    $break_new_line = (dynamic $state, dynamic $offset, dynamic $width) ==> {
      $pp_output_newline($state);
      $state[11] = 1;
      $indent = (int) ((int) ($state[6] - $width) + $offset);
      $real_indent = $call2($Pervasives[4], $state[8], $indent);
      $state[10] = $real_indent;
      $state[9] = (int) ($state[6] - $state[10]);
      return $pp_output_indent($state, $state[10]);
    };
    $break_line = (dynamic $state, dynamic $width) ==> {
      return $break_new_line($state, 0, $width);
    };
    $break_same_line = (dynamic $state, dynamic $width) ==> {
      $state[9] = (int) ($state[9] - $width);
      return $pp_output_spaces($state, $width);
    };
    $pp_force_break_line = (dynamic $state) ==> {
      $cs_ = $state[2];
      if ($cs_) {
        $match = $cs_[1];
        $width = $match[2];
        $bl_ty = $match[1];
        $ct_ = $state[9] < $width ? 1 : (0);
        if ($ct_) {
          if (0 !== $bl_ty) {
            return 5 <= $bl_ty ? 0 : ($break_line($state, $width));
          }
          $cu_ = 0;
        }
        else {$cu_ = $ct_;}
        return $cu_;
      }
      return $pp_output_newline($state);
    };
    $pp_skip_token = (dynamic $state) ==> {
      $match = $take_queue($state[28]);
      $size = $match[1];
      $len = $match[3];
      $state[12] = (int) ($state[12] - $len);
      $state[9] = (int) ($state[9] + $size);
      return 0;
    };
    $format_pp_token = (dynamic $state, dynamic $size, dynamic $param) ==> {
      if ($is_int($param)) {
        switch($param) {
          // FALLTHROUGH
          case 0:
            $ch_ = $state[3];
            if ($ch_) {
              $match = $ch_[1];
              $tabs = $match[1];
              $add_tab->contents = (dynamic $n, dynamic $ls) ==> {
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
            $ci_ = $state[2];
            if ($ci_) {$ls = $ci_[2];$state[2] = $ls;return 0;}
            return 0;
          // FALLTHROUGH
          case 2:
            $cj_ = $state[3];
            if ($cj_) {$ls__0 = $cj_[2];$state[3] = $ls__0;return 0;}
            return 0;
          // FALLTHROUGH
          case 3:
            $ck_ = $state[2];
            if ($ck_) {
              $match__0 = $ck_[1];
              $width = $match__0[2];
              return $break_line($state, $width);
            }
            return $pp_output_newline($state);
          // FALLTHROUGH
          case 4:
            $cl_ = $state[10] !== (int) ($state[6] - $state[9]) ? 1 : (0);
            return $cl_ ? $pp_skip_token($state) : ($cl_);
          // FALLTHROUGH
          default:
            $cm_ = $state[5];
            if ($cm_) {
              $tags = $cm_[2];
              $tag_name = $cm_[1];
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
            $cn_ = $state[2];
            if ($cn_) {
              $match__1 = $cn_[1];
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
            $co_ = $state[3];
            if ($co_) {
              $match__2 = $co_[1];
              $tabs__0 = $match__2[1];
              $find = (dynamic $n, dynamic $param) ==> {
                $param__0 = $param;
                for (;;) {
                  if ($param__0) {
                    $l = $param__0[2];
                    $x = $param__0[1];
                    if ($runtime["caml_greaterequal"]($x, $n)) {return $x;}
                    $param__0 = $l;
                    continue;
                  }
                  throw $caml_wrap_thrown_exception($Not_found) as \Throwable;
                }
              };
              $cp_ = $tabs__0[1];
              if ($cp_) {
                $x = $cp_[1];
                try {$cq_ = $find($insertion_point, $tabs__0[1]);$x__0 = $cq_;
                }
                catch(\Throwable $cr_) {
                  $cr_ = $runtime["caml_wrap_exception"]($cr_);
                  if ($cr_ !== $Not_found) {
                    throw $caml_wrap_thrown_exception_reraise($cr_) as \Throwable;
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
    $advance_loop = (dynamic $state) ==> {
      for (;;) {
        $match = $peek_queue($state[28]);
        $size = $match[1];
        $len = $match[3];
        $tok = $match[2];
        $ce_ = $size < 0 ? 1 : (0);
        $cf_ = $ce_
          ? (int) ($state[13] - $state[12]) < $state[9] ? 1 : (0)
          : ($ce_);
        $cg_ = 1 - $cf_;
        if ($cg_) {
          $take_queue($state[28]);
          $size__0 = 0 <= $size ? $size : ($pp_infinity);
          $format_pp_token($state, $size__0, $tok);
          $state[12] = (int) ($len + $state[12]);
          continue;
        }
        return $cg_;
      }
    };
    $advance_left = (dynamic $state) ==> {
      try {$cc_ = $advance_loop($state);return $cc_;}
      catch(\Throwable $cd_) {
        $cd_ = $runtime["caml_wrap_exception"]($cd_);
        if ($cd_ === $Empty_queue) {return 0;}
        throw $caml_wrap_thrown_exception_reraise($cd_) as \Throwable;
      }
    };
    $enqueue_advance = (dynamic $state, dynamic $tok) ==> {
      $pp_enqueue($state, $tok);
      return $advance_left($state);
    };
    $make_queue_elem = (dynamic $size, dynamic $tok, dynamic $len) ==> {return Vector{0, $size, $tok, $len};
    };
    $enqueue_string_as = (dynamic $state, dynamic $size, dynamic $s) ==> {
      return $enqueue_advance(
        $state,
        $make_queue_elem($size, Vector{0, $s}, $size)
      );
    };
    $enqueue_string = (dynamic $state, dynamic $s) ==> {
      $len = $caml_ml_string_length($s);
      return $enqueue_string_as($state, $len, $s);
    };
    $q_elem = $make_queue_elem(-1, $a_, 0);
    $scan_stack_bottom = Vector{0, Vector{0, -1, $q_elem}, 0};
    $clear_scan_stack = (dynamic $state) ==> {
      $state[1] = $scan_stack_bottom;
      return 0;
    };
    $set_size = (dynamic $state, dynamic $ty) ==> {
      $b9_ = $state[1];
      if ($b9_) {
        $match = $b9_[1];
        $queue_elem = $match[2];
        $left_tot = $match[1];
        $size = $queue_elem[1];
        $t = $b9_[2];
        $tok = $queue_elem[2];
        if ($left_tot < $state[12]) {return $clear_scan_stack($state);}
        if (! $is_int($tok)) {
          switch($tok[0]) {
            // FALLTHROUGH
            case 3:
              $ca_ = 1 - $ty;
              if ($ca_) {
                $queue_elem[1] = (int) ($state[13] + $size);
                $state[1] = $t;
                $cb_ = 0;
              }
              else {$cb_ = $ca_;}
              return $cb_;
            // FALLTHROUGH
            case 1:
            // FALLTHROUGH
            case 2:
              if ($ty) {
                $queue_elem[1] = (int) ($state[13] + $size);
                $state[1] = $t;
                $b__ = 0;
              }
              else {$b__ = $ty;}
              return $b__;
            }
        }
        return 0;
      }
      return 0;
    };
    $scan_push = (dynamic $state, dynamic $b, dynamic $tok) ==> {
      $pp_enqueue($state, $tok);
      if ($b) {$set_size($state, 1);}
      $state[1] = Vector{0, Vector{0, $state[13], $tok}, $state[1]};
      return 0;
    };
    $pp_open_box_gen = (dynamic $state, dynamic $indent, dynamic $br_ty) ==> {
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
      $b8_ = $state[14] === $state[15] ? 1 : (0);
      return $b8_ ? $enqueue_string($state, $state[16]) : ($b8_);
    };
    $pp_open_sys_box = (dynamic $state) ==> {
      return $pp_open_box_gen($state, 0, 3);
    };
    $pp_close_box = (dynamic $state, dynamic $param) ==> {
      $b6_ = 1 < $state[14] ? 1 : (0);
      if ($b6_) {
        if ($state[14] < $state[15]) {
          $pp_enqueue($state, Vector{0, 0, 1, 0});
          $set_size($state, 1);
          $set_size($state, 0);
        }
        $state[14] = (int) ($state[14] + -1);
        $b7_ = 0;
      }
      else {$b7_ = $b6_;}
      return $b7_;
    };
    $pp_open_tag = (dynamic $state, dynamic $tag_name) ==> {
      if ($state[22]) {
        $state[4] = Vector{0, $tag_name, $state[4]};
        $call1($state[26], $tag_name);
      }
      $b5_ = $state[23];
      return $b5_
        ? $pp_enqueue($state, Vector{0, 0, Vector{5, $tag_name}, 0})
        : ($b5_);
    };
    $pp_close_tag = (dynamic $state, dynamic $param) ==> {
      if ($state[23]) {$pp_enqueue($state, Vector{0, 0, 5, 0});}
      $b2_ = $state[22];
      if ($b2_) {
        $b3_ = $state[4];
        if ($b3_) {
          $tags = $b3_[2];
          $tag_name = $b3_[1];
          $call1($state[27], $tag_name);
          $state[4] = $tags;
          return 0;
        }
        $b4_ = 0;
      }
      else {$b4_ = $b2_;}
      return $b4_;
    };
    $pp_set_print_tags = (dynamic $state, dynamic $b) ==> {
      $state[22] = $b;
      return 0;
    };
    $pp_set_mark_tags = (dynamic $state, dynamic $b) ==> {
      $state[23] = $b;
      return 0;
    };
    $pp_get_print_tags = (dynamic $state, dynamic $param) ==> {return $state[22];
    };
    $pp_get_mark_tags = (dynamic $state, dynamic $param) ==> {return $state[23];
    };
    $pp_set_tags = (dynamic $state, dynamic $b) ==> {
      $pp_set_print_tags($state, $b);
      return $pp_set_mark_tags($state, $b);
    };
    $pp_get_formatter_tag_functions = (dynamic $state, dynamic $param) ==> {
      return Vector{0, $state[24], $state[25], $state[26], $state[27]};
    };
    $pp_set_formatter_tag_functions = (dynamic $state, dynamic $param) ==> {
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
    $pp_rinit = (dynamic $state) ==> {
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
    $clear_tag_stack = (dynamic $state) ==> {
      $b0_ = $state[4];
      $b1_ = (dynamic $param) ==> {return $pp_close_tag($state, 0);};
      return $call2($List[15], $b1_, $b0_);
    };
    $pp_flush_queue = (dynamic $state, dynamic $b) ==> {
      $clear_tag_stack($state);
      for (;;) {
        if (1 < $state[14]) {$pp_close_box($state, 0);continue;}
        $state[13] = $pp_infinity;
        $advance_left($state);
        if ($b) {$pp_output_newline($state);}
        return $pp_rinit($state);
      }
    };
    $pp_print_as_size = (dynamic $state, dynamic $size, dynamic $s) ==> {
      $bZ_ = $state[14] < $state[15] ? 1 : (0);
      return $bZ_ ? $enqueue_string_as($state, $size, $s) : ($bZ_);
    };
    $pp_print_as = (dynamic $state, dynamic $isize, dynamic $s) ==> {
      return $pp_print_as_size($state, $isize, $s);
    };
    $pp_print_string = (dynamic $state, dynamic $s) ==> {
      return $pp_print_as($state, $caml_ml_string_length($s), $s);
    };
    $pp_print_int = (dynamic $state, dynamic $i) ==> {
      return $pp_print_string($state, $call1($Pervasives[21], $i));
    };
    $pp_print_float = (dynamic $state, dynamic $f) ==> {
      return $pp_print_string($state, $call1($Pervasives[23], $f));
    };
    $pp_print_bool = (dynamic $state, dynamic $b) ==> {
      return $pp_print_string($state, $call1($Pervasives[18], $b));
    };
    $pp_print_char = (dynamic $state, dynamic $c) ==> {
      return $pp_print_as($state, 1, $call2($String[1], 1, $c));
    };
    $pp_open_hbox = (dynamic $state, dynamic $param) ==> {
      return $pp_open_box_gen($state, 0, 0);
    };
    $pp_open_vbox = (dynamic $state, dynamic $indent) ==> {
      return $pp_open_box_gen($state, $indent, 1);
    };
    $pp_open_hvbox = (dynamic $state, dynamic $indent) ==> {
      return $pp_open_box_gen($state, $indent, 2);
    };
    $pp_open_hovbox = (dynamic $state, dynamic $indent) ==> {
      return $pp_open_box_gen($state, $indent, 3);
    };
    $pp_open_box = (dynamic $state, dynamic $indent) ==> {
      return $pp_open_box_gen($state, $indent, 4);
    };
    $pp_print_newline = (dynamic $state, dynamic $param) ==> {
      $pp_flush_queue($state, 1);
      return $call1($state[18], 0);
    };
    $pp_print_flush = (dynamic $state, dynamic $param) ==> {
      $pp_flush_queue($state, 0);
      return $call1($state[18], 0);
    };
    $pp_force_newline = (dynamic $state, dynamic $param) ==> {
      $bY_ = $state[14] < $state[15] ? 1 : (0);
      return $bY_
        ? $enqueue_advance($state, $make_queue_elem(0, 3, 0))
        : ($bY_);
    };
    $pp_print_if_newline = (dynamic $state, dynamic $param) ==> {
      $bX_ = $state[14] < $state[15] ? 1 : (0);
      return $bX_
        ? $enqueue_advance($state, $make_queue_elem(0, 4, 0))
        : ($bX_);
    };
    $pp_print_break = (dynamic $state, dynamic $width, dynamic $offset) ==> {
      $bW_ = $state[14] < $state[15] ? 1 : (0);
      if ($bW_) {
        $elem = $make_queue_elem(
          (int)
          -
          $state[13],
          Vector{1, $width, $offset},
          $width
        );
        return $scan_push($state, 1, $elem);
      }
      return $bW_;
    };
    $pp_print_space = (dynamic $state, dynamic $param) ==> {
      return $pp_print_break($state, 1, 0);
    };
    $pp_print_cut = (dynamic $state, dynamic $param) ==> {
      return $pp_print_break($state, 0, 0);
    };
    $pp_open_tbox = (dynamic $state, dynamic $param) ==> {
      $state[14] = (int) ($state[14] + 1);
      $bV_ = $state[14] < $state[15] ? 1 : (0);
      if ($bV_) {
        $elem = $make_queue_elem(0, Vector{4, Vector{0, Vector{0, 0}}}, 0);
        return $enqueue_advance($state, $elem);
      }
      return $bV_;
    };
    $pp_close_tbox = (dynamic $state, dynamic $param) ==> {
      $bS_ = 1 < $state[14] ? 1 : (0);
      if ($bS_) {
        $bT_ = $state[14] < $state[15] ? 1 : (0);
        if ($bT_) {
          $elem = $make_queue_elem(0, 2, 0);
          $enqueue_advance($state, $elem);
          $state[14] = (int) ($state[14] + -1);
          $bU_ = 0;
        }
        else {$bU_ = $bT_;}
      }
      else {$bU_ = $bS_;}
      return $bU_;
    };
    $pp_print_tbreak = (dynamic $state, dynamic $width, dynamic $offset) ==> {
      $bR_ = $state[14] < $state[15] ? 1 : (0);
      if ($bR_) {
        $elem = $make_queue_elem(
          (int)
          -
          $state[13],
          Vector{2, $width, $offset},
          $width
        );
        return $scan_push($state, 1, $elem);
      }
      return $bR_;
    };
    $pp_print_tab = (dynamic $state, dynamic $param) ==> {
      return $pp_print_tbreak($state, 0, 0);
    };
    $pp_set_tab = (dynamic $state, dynamic $param) ==> {
      $bQ_ = $state[14] < $state[15] ? 1 : (0);
      if ($bQ_) {
        $elem = $make_queue_elem(0, 0, 0);
        return $enqueue_advance($state, $elem);
      }
      return $bQ_;
    };
    $pp_set_max_boxes = (dynamic $state, dynamic $n) ==> {
      $bO_ = 1 < $n ? 1 : (0);
      if ($bO_) {
        $state[15] = $n;
        $bP_ = 0;
      }
      else {$bP_ = $bO_;}
      return $bP_;
    };
    $pp_get_max_boxes = (dynamic $state, dynamic $param) ==> {return $state[15];
    };
    $pp_over_max_boxes = (dynamic $state, dynamic $param) ==> {
      return $state[14] === $state[15] ? 1 : (0);
    };
    $pp_set_ellipsis_text = (dynamic $state, dynamic $s) ==> {
      $state[16] = $s;
      return 0;
    };
    $pp_get_ellipsis_text = (dynamic $state, dynamic $param) ==> {return $state[16];
    };
    $pp_limit = (dynamic $n) ==> {return $n < 1000000010 ? $n : (1000000009);};
    $pp_set_min_space_left = (dynamic $state, dynamic $n) ==> {
      $bN_ = 1 <= $n ? 1 : (0);
      if ($bN_) {
        $n__0 = $pp_limit($n);
        $state[7] = $n__0;
        $state[8] = (int) ($state[6] - $state[7]);
        return $pp_rinit($state);
      }
      return $bN_;
    };
    $pp_set_max_indent = (dynamic $state, dynamic $n) ==> {
      return $pp_set_min_space_left($state, (int) ($state[6] - $n));
    };
    $pp_get_max_indent = (dynamic $state, dynamic $param) ==> {return $state[8];
    };
    $pp_set_margin = (dynamic $state, dynamic $n) ==> {
      $bL_ = 1 <= $n ? 1 : (0);
      if ($bL_) {
        $n__0 = $pp_limit($n);
        $state[6] = $n__0;
        if ($state[8] <= $state[6]) {
          $new_max_indent = $state[8];
        }
        else {
          $bM_ = $call2(
            $Pervasives[5],
            (int)
            ($state[6] - $state[7]),
            (int)
            ($state[6] / 2)
          );
          $new_max_indent = $call2($Pervasives[5], $bM_, 1);
        }
        return $pp_set_max_indent($state, $new_max_indent);
      }
      return $bL_;
    };
    $pp_get_margin = (dynamic $state, dynamic $param) ==> {return $state[6];};
    $pp_set_formatter_out_functions = (dynamic $state, dynamic $param) ==> {
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
    $pp_get_formatter_out_functions = (dynamic $state, dynamic $param) ==> {
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
    (dynamic $state, dynamic $f, dynamic $g) ==> {
      $state[17] = $f;
      $state[18] = $g;
      return 0;
    };
    $pp_get_formatter_output_functions = (dynamic $state, dynamic $param) ==> {
      return Vector{0, $state[17], $state[18]};
    };
    $display_newline = (dynamic $state, dynamic $param) ==> {
      return $call3($state[17], $cst, 0, 1);
    };
    $blank_line = $call2($String[1], 80, 32);
    $display_blanks = (dynamic $state, dynamic $n) ==> {
      $n__0 = $n;
      for (;;) {
        $bK_ = 0 < $n__0 ? 1 : (0);
        if ($bK_) {
          if (80 < $n__0) {
            $call3($state[17], $blank_line, 0, 80);
            $n__1 = (int) ($n__0 + -80);
            $n__0 = $n__1;
            continue;
          }
          return $call3($state[17], $blank_line, 0, $n__0);
        }
        return $bK_;
      }
    };
    $pp_set_formatter_out_channel = (dynamic $state, dynamic $oc) ==> {
      $state[17] = $call1($Pervasives[57], $oc);
      $state[18] =
        (dynamic $param) ==> {return $call1($Pervasives[51], $oc);};
      $state[19] =
        (dynamic $bJ_) ==> {return $display_newline($state, $bJ_);};
      $state[20] = (dynamic $bI_) ==> {return $display_blanks($state, $bI_);};
      $state[21] = (dynamic $bH_) ==> {return $display_blanks($state, $bH_);};
      return 0;
    };
    $default_pp_mark_open_tag = (dynamic $s) ==> {
      $bG_ = $call2($Pervasives[16], $s, $cst__0);
      return $call2($Pervasives[16], $cst__1, $bG_);
    };
    $default_pp_mark_close_tag = (dynamic $s) ==> {
      $bF_ = $call2($Pervasives[16], $s, $cst__2);
      return $call2($Pervasives[16], $cst__3, $bF_);
    };
    $default_pp_print_open_tag = (dynamic $bE_) ==> {return 0;};
    $default_pp_print_close_tag = (dynamic $bD_) ==> {return 0;};
    $pp_make_formatter = 
    (dynamic $f, dynamic $g, dynamic $h, dynamic $i, dynamic $j) ==> {
      $pp_queue = $make_queue(0);
      $sys_tok = $make_queue_elem(-1, $b_, 0);
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
    $formatter_of_out_functions = (dynamic $out_funs) ==> {
      return $pp_make_formatter(
        $out_funs[1],
        $out_funs[2],
        $out_funs[3],
        $out_funs[4],
        $out_funs[5]
      );
    };
    $make_formatter = (dynamic $output, dynamic $flush) ==> {
      $bv_ = (dynamic $bC_) ==> {return 0;};
      $bw_ = (dynamic $bB_) ==> {return 0;};
      $ppf = $pp_make_formatter(
        $output,
        $flush,
        (dynamic $bA_) ==> {return 0;},
        $bw_,
        $bv_
      );
      $ppf[19] = (dynamic $bz_) ==> {return $display_newline($ppf, $bz_);};
      $ppf[20] = (dynamic $by_) ==> {return $display_blanks($ppf, $by_);};
      $ppf[21] = (dynamic $bx_) ==> {return $display_blanks($ppf, $bx_);};
      return $ppf;
    };
    $formatter_of_out_channel = (dynamic $oc) ==> {
      $bu_ = (dynamic $param) ==> {return $call1($Pervasives[51], $oc);};
      return $make_formatter($call1($Pervasives[57], $oc), $bu_);
    };
    $formatter_of_buffer = (dynamic $b) ==> {
      $bs_ = (dynamic $bt_) ==> {return 0;};
      return $make_formatter($call1($Buffer[16], $b), $bs_);
    };
    $pp_buffer_size = 512;
    $pp_make_buffer = (dynamic $param) ==> {
      return $call1($Buffer[1], $pp_buffer_size);
    };
    $stdbuf = $pp_make_buffer(0);
    $std_formatter = $formatter_of_out_channel($Pervasives[27]);
    $err_formatter = $formatter_of_out_channel($Pervasives[28]);
    $str_formatter = $formatter_of_buffer($stdbuf);
    $flush_buffer_formatter = (dynamic $buf, dynamic $ppf) ==> {
      $pp_flush_queue($ppf, 0);
      $s = $call1($Buffer[2], $buf);
      $call1($Buffer[9], $buf);
      return $s;
    };
    $flush_str_formatter = (dynamic $param) ==> {
      return $flush_buffer_formatter($stdbuf, $str_formatter);
    };
    $make_symbolic_output_buffer = (dynamic $param) ==> {return Vector{0, 0};};
    $clear_symbolic_output_buffer = (dynamic $sob) ==> {$sob[1] = 0;return 0;};
    $get_symbolic_output_buffer = (dynamic $sob) ==> {
      return $call1($List[9], $sob[1]);
    };
    $flush_symbolic_output_buffer = (dynamic $sob) ==> {
      $items = $get_symbolic_output_buffer($sob);
      $clear_symbolic_output_buffer($sob);
      return $items;
    };
    $add_symbolic_output_item = (dynamic $sob, dynamic $item) ==> {
      $sob[1] = Vector{0, $item, $sob[1]};
      return 0;
    };
    $formatter_of_symbolic_output_buffer = (dynamic $sob) ==> {
      $symbolic_flush = (dynamic $sob, dynamic $param) ==> {
        return $add_symbolic_output_item($sob, 0);
      };
      $symbolic_newline = (dynamic $sob, dynamic $param) ==> {
        return $add_symbolic_output_item($sob, 1);
      };
      $symbolic_string = (dynamic $sob, dynamic $s, dynamic $i, dynamic $n) ==> {
        return $add_symbolic_output_item(
          $sob,
          Vector{0, $call3($String[4], $s, $i, $n)}
        );
      };
      $symbolic_spaces = (dynamic $sob, dynamic $n) ==> {
        return $add_symbolic_output_item($sob, Vector{1, $n});
      };
      $symbolic_indent = (dynamic $sob, dynamic $n) ==> {
        return $add_symbolic_output_item($sob, Vector{2, $n});
      };
      $f = (dynamic $bp_, dynamic $bq_, dynamic $br_) ==> {
        return $symbolic_string($sob, $bp_, $bq_, $br_);
      };
      $g = (dynamic $bo_) ==> {return $symbolic_flush($sob, $bo_);};
      $h = (dynamic $bn_) ==> {return $symbolic_newline($sob, $bn_);};
      $i = (dynamic $bm_) ==> {return $symbolic_spaces($sob, $bm_);};
      $j = (dynamic $bl_) ==> {return $symbolic_indent($sob, $bl_);};
      return $pp_make_formatter($f, $g, $h, $i, $j);
    };
    $open_hbox = (dynamic $bk_) ==> {
      return $pp_open_hbox($std_formatter, $bk_);
    };
    $open_vbox = (dynamic $bj_) ==> {
      return $pp_open_vbox($std_formatter, $bj_);
    };
    $open_hvbox = (dynamic $bi_) ==> {
      return $pp_open_hvbox($std_formatter, $bi_);
    };
    $open_hovbox = (dynamic $bh_) ==> {
      return $pp_open_hovbox($std_formatter, $bh_);
    };
    $open_box = (dynamic $bg_) ==> {
      return $pp_open_box($std_formatter, $bg_);
    };
    $close_box = (dynamic $bf_) ==> {
      return $pp_close_box($std_formatter, $bf_);
    };
    $open_tag = (dynamic $be_) ==> {
      return $pp_open_tag($std_formatter, $be_);
    };
    $close_tag = (dynamic $bd_) ==> {
      return $pp_close_tag($std_formatter, $bd_);
    };
    $print_as = (dynamic $bb_, dynamic $bc_) ==> {
      return $pp_print_as($std_formatter, $bb_, $bc_);
    };
    $print_string = (dynamic $ba_) ==> {
      return $pp_print_string($std_formatter, $ba_);
    };
    $print_int = (dynamic $a__) ==> {
      return $pp_print_int($std_formatter, $a__);
    };
    $print_float = (dynamic $a9_) ==> {
      return $pp_print_float($std_formatter, $a9_);
    };
    $print_char = (dynamic $a8_) ==> {
      return $pp_print_char($std_formatter, $a8_);
    };
    $print_bool = (dynamic $a7_) ==> {
      return $pp_print_bool($std_formatter, $a7_);
    };
    $print_break = (dynamic $a5_, dynamic $a6_) ==> {
      return $pp_print_break($std_formatter, $a5_, $a6_);
    };
    $print_cut = (dynamic $a4_) ==> {
      return $pp_print_cut($std_formatter, $a4_);
    };
    $print_space = (dynamic $a3_) ==> {
      return $pp_print_space($std_formatter, $a3_);
    };
    $force_newline = (dynamic $a2_) ==> {
      return $pp_force_newline($std_formatter, $a2_);
    };
    $print_flush = (dynamic $a1_) ==> {
      return $pp_print_flush($std_formatter, $a1_);
    };
    $print_newline = (dynamic $a0_) ==> {
      return $pp_print_newline($std_formatter, $a0_);
    };
    $print_if_newline = (dynamic $aZ_) ==> {
      return $pp_print_if_newline($std_formatter, $aZ_);
    };
    $open_tbox = (dynamic $aY_) ==> {
      return $pp_open_tbox($std_formatter, $aY_);
    };
    $close_tbox = (dynamic $aX_) ==> {
      return $pp_close_tbox($std_formatter, $aX_);
    };
    $print_tbreak = (dynamic $aV_, dynamic $aW_) ==> {
      return $pp_print_tbreak($std_formatter, $aV_, $aW_);
    };
    $set_tab = (dynamic $aU_) ==> {return $pp_set_tab($std_formatter, $aU_);};
    $print_tab = (dynamic $aT_) ==> {
      return $pp_print_tab($std_formatter, $aT_);
    };
    $set_margin = (dynamic $aS_) ==> {
      return $pp_set_margin($std_formatter, $aS_);
    };
    $get_margin = (dynamic $aR_) ==> {
      return $pp_get_margin($std_formatter, $aR_);
    };
    $set_max_indent = (dynamic $aQ_) ==> {
      return $pp_set_max_indent($std_formatter, $aQ_);
    };
    $get_max_indent = (dynamic $aP_) ==> {
      return $pp_get_max_indent($std_formatter, $aP_);
    };
    $set_max_boxes = (dynamic $aO_) ==> {
      return $pp_set_max_boxes($std_formatter, $aO_);
    };
    $get_max_boxes = (dynamic $aN_) ==> {
      return $pp_get_max_boxes($std_formatter, $aN_);
    };
    $over_max_boxes = (dynamic $aM_) ==> {
      return $pp_over_max_boxes($std_formatter, $aM_);
    };
    $set_ellipsis_text = (dynamic $aL_) ==> {
      return $pp_set_ellipsis_text($std_formatter, $aL_);
    };
    $get_ellipsis_text = (dynamic $aK_) ==> {
      return $pp_get_ellipsis_text($std_formatter, $aK_);
    };
    $set_formatter_out_channel = (dynamic $aJ_) ==> {
      return $pp_set_formatter_out_channel($std_formatter, $aJ_);
    };
    $set_formatter_out_functions = (dynamic $aI_) ==> {
      return $pp_set_formatter_out_functions($std_formatter, $aI_);
    };
    $get_formatter_out_functions = (dynamic $aH_) ==> {
      return $pp_get_formatter_out_functions($std_formatter, $aH_);
    };
    $set_formatter_output_functions = (dynamic $aF_, dynamic $aG_) ==> {
      return $pp_set_formatter_output_functions($std_formatter, $aF_, $aG_);
    };
    $get_formatter_output_functions = (dynamic $aE_) ==> {
      return $pp_get_formatter_output_functions($std_formatter, $aE_);
    };
    $set_formatter_tag_functions = (dynamic $aD_) ==> {
      return $pp_set_formatter_tag_functions($std_formatter, $aD_);
    };
    $get_formatter_tag_functions = (dynamic $aC_) ==> {
      return $pp_get_formatter_tag_functions($std_formatter, $aC_);
    };
    $set_print_tags = (dynamic $aB_) ==> {
      return $pp_set_print_tags($std_formatter, $aB_);
    };
    $get_print_tags = (dynamic $aA_) ==> {
      return $pp_get_print_tags($std_formatter, $aA_);
    };
    $set_mark_tags = (dynamic $az_) ==> {
      return $pp_set_mark_tags($std_formatter, $az_);
    };
    $get_mark_tags = (dynamic $ay_) ==> {
      return $pp_get_mark_tags($std_formatter, $ay_);
    };
    $set_tags = (dynamic $ax_) ==> {
      return $pp_set_tags($std_formatter, $ax_);
    };
    $pp_print_list = 
    (dynamic $opt, dynamic $pp_v, dynamic $ppf, dynamic $param) ==> {
      $opt__0 = $opt;
      $param__0 = $param;
      for (;;) {
        if ($opt__0) {
          $sth = $opt__0[1];
          $pp_sep = $sth;
        }
        else {$pp_sep = $pp_print_cut;}
        if ($param__0) {
          $av_ = $param__0[2];
          $aw_ = $param__0[1];
          if ($av_) {
            $call2($pp_v, $ppf, $aw_);
            $call2($pp_sep, $ppf, 0);
            $opt__1 = Vector{0, $pp_sep};
            $opt__0 = $opt__1;
            $param__0 = $av_;
            continue;
          }
          return $call2($pp_v, $ppf, $aw_);
        }
        return 0;
      }
    };
    $pp_print_text = (dynamic $ppf, dynamic $s) ==> {
      $len = $caml_ml_string_length($s);
      $left = Vector{0, 0};
      $right = Vector{0, 0};
      $flush = (dynamic $param) ==> {
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
        $au_ = $left[1] !== $len ? 1 : (0);
        return $au_ ? $flush(0) : ($au_);
      }
    };
    $compute_tag = (dynamic $output, dynamic $tag_acc) ==> {
      $buf = $call1($Buffer[1], 16);
      $ppf = $formatter_of_buffer($buf);
      $call2($output, $ppf, $tag_acc);
      $pp_print_flush($ppf, 0);
      $len = $call1($Buffer[7], $buf);
      return 2 <= $len
        ? $call3($Buffer[4], $buf, 1, (int) ($len + -2))
        : ($call1($Buffer[2], $buf));
    };
    $output_formatting_lit = (dynamic $ppf, dynamic $fmting_lit) ==> {
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
    $output_acc->contents = (dynamic $ppf, dynamic $acc) ==> {
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
            $T_ = $acc[2];
            $U_ = $acc[1];
            if (0 === $T_[0]) {
              $acc__0 = $T_[1];
              $output_acc->contents($ppf, $U_);
              return $pp_open_tag(
                $ppf,
                $compute_tag($output_acc->contents, $acc__0)
              );
            }
            $acc__1 = $T_[1];
            $output_acc->contents($ppf, $U_);
            $V_ = $compute_tag($output_acc->contents, $acc__1);
            $match = $call1($CamlinternalFormat[21], $V_);
            $bty = $match[2];
            $indent = $match[1];
            return $pp_open_box_gen($ppf, $indent, $bty);
          // FALLTHROUGH
          case 2:
            $W_ = $acc[1];
            if ($is_int($W_)) {$switch__1 = 1;}
            else {
              if (0 === $W_[0]) {
                $Y_ = $W_[2];
                if ($is_int($Y_)) {$switch__2 = 1;}
                else {
                  if (1 === $Y_[0]) {
                    $Z_ = $acc[2];
                    $aa_ = $Y_[2];
                    $ab_ = $W_[1];
                    $s__0 = $Z_;
                    $size = $aa_;
                    $p__1 = $ab_;
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
              $X_ = $acc[2];
              $s = $X_;
              $p__0 = $W_;
              $switch__0 = 2;
            }
            break;
          // FALLTHROUGH
          case 3:
            $ac_ = $acc[1];
            if ($is_int($ac_)) {$switch__3 = 1;}
            else {
              if (0 === $ac_[0]) {
                $ae_ = $ac_[2];
                if ($is_int($ae_)) {$switch__4 = 1;}
                else {
                  if (1 === $ae_[0]) {
                    $af_ = $acc[2];
                    $ag_ = $ae_[2];
                    $ah_ = $ac_[1];
                    $c__0 = $af_;
                    $size__0 = $ag_;
                    $p__3 = $ah_;
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
              $ad_ = $acc[2];
              $c = $ad_;
              $p__2 = $ac_;
              $switch__0 = 3;
            }
            break;
          // FALLTHROUGH
          case 4:
            $ai_ = $acc[1];
            if ($is_int($ai_)) {$switch__5 = 1;}
            else {
              if (0 === $ai_[0]) {
                $ak_ = $ai_[2];
                if ($is_int($ak_)) {$switch__6 = 1;}
                else {
                  if (1 === $ak_[0]) {
                    $al_ = $acc[2];
                    $am_ = $ak_[2];
                    $an_ = $ai_[1];
                    $s__0 = $al_;
                    $size = $am_;
                    $p__1 = $an_;
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
              $aj_ = $acc[2];
              $s = $aj_;
              $p__0 = $ai_;
              $switch__0 = 2;
            }
            break;
          // FALLTHROUGH
          case 5:
            $ao_ = $acc[1];
            if ($is_int($ao_)) {$switch__7 = 1;}
            else {
              if (0 === $ao_[0]) {
                $aq_ = $ao_[2];
                if ($is_int($aq_)) {$switch__8 = 1;}
                else {
                  if (1 === $aq_[0]) {
                    $ar_ = $acc[2];
                    $as_ = $aq_[2];
                    $at_ = $ao_[1];
                    $c__0 = $ar_;
                    $size__0 = $as_;
                    $p__3 = $at_;
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
              $ap_ = $acc[2];
              $c = $ap_;
              $p__2 = $ao_;
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
    $strput_acc->contents = (dynamic $ppf, dynamic $acc) ==> {
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
            $q_ = $acc[2];
            $r_ = $acc[1];
            if (0 === $q_[0]) {
              $acc__0 = $q_[1];
              $strput_acc->contents($ppf, $r_);
              return $pp_open_tag(
                $ppf,
                $compute_tag($strput_acc->contents, $acc__0)
              );
            }
            $acc__1 = $q_[1];
            $strput_acc->contents($ppf, $r_);
            $s_ = $compute_tag($strput_acc->contents, $acc__1);
            $match = $call1($CamlinternalFormat[21], $s_);
            $bty = $match[2];
            $indent = $match[1];
            return $pp_open_box_gen($ppf, $indent, $bty);
          // FALLTHROUGH
          case 2:
            $t_ = $acc[1];
            if ($is_int($t_)) {$switch__1 = 1;}
            else {
              if (0 === $t_[0]) {
                $v_ = $t_[2];
                if ($is_int($v_)) {$switch__2 = 1;}
                else {
                  if (1 === $v_[0]) {
                    $w_ = $acc[2];
                    $x_ = $v_[2];
                    $y_ = $t_[1];
                    $s__0 = $w_;
                    $size = $x_;
                    $p__1 = $y_;
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
              $u_ = $acc[2];
              $s = $u_;
              $p__0 = $t_;
              $switch__0 = 2;
            }
            break;
          // FALLTHROUGH
          case 3:
            $z_ = $acc[1];
            if ($is_int($z_)) {$switch__3 = 1;}
            else {
              if (0 === $z_[0]) {
                $B_ = $z_[2];
                if ($is_int($B_)) {$switch__4 = 1;}
                else {
                  if (1 === $B_[0]) {
                    $C_ = $acc[2];
                    $D_ = $B_[2];
                    $E_ = $z_[1];
                    $c__0 = $C_;
                    $size__0 = $D_;
                    $p__3 = $E_;
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
              $A_ = $acc[2];
              $c = $A_;
              $p__2 = $z_;
              $switch__0 = 3;
            }
            break;
          // FALLTHROUGH
          case 4:
            $F_ = $acc[1];
            if ($is_int($F_)) {$switch__5 = 1;}
            else {
              if (0 === $F_[0]) {
                $H_ = $F_[2];
                if ($is_int($H_)) {$switch__6 = 1;}
                else {
                  if (1 === $H_[0]) {
                    $I_ = $acc[2];
                    $J_ = $H_[2];
                    $K_ = $F_[1];
                    $s__0 = $I_;
                    $size = $J_;
                    $p__1 = $K_;
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
              $G_ = $acc[2];
              $s = $G_;
              $p__0 = $F_;
              $switch__0 = 2;
            }
            break;
          // FALLTHROUGH
          case 5:
            $L_ = $acc[1];
            if ($is_int($L_)) {$switch__7 = 1;}
            else {
              if (0 === $L_[0]) {
                $N_ = $L_[2];
                if ($is_int($N_)) {$switch__8 = 1;}
                else {
                  if (1 === $N_[0]) {
                    $O_ = $acc[2];
                    $P_ = $N_[2];
                    $Q_ = $L_[1];
                    $c__0 = $O_;
                    $size__0 = $P_;
                    $p__3 = $Q_;
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
              $M_ = $acc[2];
              $c = $M_;
              $p__2 = $L_;
              $switch__0 = 3;
            }
            break;
          // FALLTHROUGH
          case 6:
            $R_ = $acc[1];
            if (! $is_int($R_) && 0 === $R_[0]) {
              $S_ = $R_[2];
              if (! $is_int($S_) && 1 === $S_[0]) {
                $f__1 = $acc[2];
                $size__1 = $S_[2];
                $p__4 = $R_[1];
                $strput_acc->contents($ppf, $p__4);
                return $pp_print_as_size($ppf, $size__1, $call1($f__1, 0));
              }
            }
            $f__0 = $acc[2];
            $strput_acc->contents($ppf, $R_);
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
          return $pp_print_as_size($ppf, $size, $s__0);
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
          return $pp_print_string($ppf, $s);
        // FALLTHROUGH
        default:
          $strput_acc->contents($ppf, $p__2);
          return $pp_print_char($ppf, $c);
        }
    };
    $kfprintf = (dynamic $k, dynamic $ppf, dynamic $param) ==> {
      $fmt = $param[1];
      $o_ = 0;
      $p_ = (dynamic $ppf, dynamic $acc) ==> {
        $output_acc->contents($ppf, $acc);
        return $call1($k, $ppf);
      };
      return $call4($CamlinternalFormat[7], $p_, $ppf, $o_, $fmt);
    };
    $ikfprintf = (dynamic $k, dynamic $ppf, dynamic $param) ==> {
      $fmt = $param[1];
      return $call3($CamlinternalFormat[8], $k, $ppf, $fmt);
    };
    $fprintf = (dynamic $ppf) ==> {
      $l_ = (dynamic $n_) ==> {return 0;};
      return (dynamic $m_) ==> {return $kfprintf($l_, $ppf, $m_);};
    };
    $ifprintf = (dynamic $ppf) ==> {
      $i_ = (dynamic $k_) ==> {return 0;};
      return (dynamic $j_) ==> {return $ikfprintf($i_, $ppf, $j_);};
    };
    $printf = (dynamic $fmt) ==> {
      return $call1($fprintf($std_formatter), $fmt);
    };
    $eprintf = (dynamic $fmt) ==> {
      return $call1($fprintf($err_formatter), $fmt);
    };
    $ksprintf = (dynamic $k, dynamic $param) ==> {
      $fmt = $param[1];
      $b = $pp_make_buffer(0);
      $ppf = $formatter_of_buffer($b);
      $k__0 = (dynamic $param, dynamic $acc) ==> {
        $strput_acc->contents($ppf, $acc);
        return $call1($k, $flush_buffer_formatter($b, $ppf));
      };
      return $call4($CamlinternalFormat[7], $k__0, 0, 0, $fmt);
    };
    $sprintf = (dynamic $fmt) ==> {
      return $ksprintf((dynamic $s) ==> {return $s;}, $fmt);
    };
    $kasprintf = (dynamic $k, dynamic $param) ==> {
      $fmt = $param[1];
      $b = $pp_make_buffer(0);
      $ppf = $formatter_of_buffer($b);
      $k__0 = (dynamic $ppf, dynamic $acc) ==> {
        $output_acc->contents($ppf, $acc);
        return $call1($k, $flush_buffer_formatter($b, $ppf));
      };
      return $call4($CamlinternalFormat[7], $k__0, $ppf, 0, $fmt);
    };
    $asprintf = (dynamic $fmt) ==> {
      return $kasprintf((dynamic $s) ==> {return $s;}, $fmt);
    };
    
    $call1($Pervasives[88], $print_flush);
    
    $pp_set_all_formatter_output_functions = 
    (dynamic $state, dynamic $f, dynamic $g, dynamic $h, dynamic $i) ==> {
      $pp_set_formatter_output_functions($state, $f, $g);
      $state[19] = $h;
      $state[20] = $i;
      return 0;
    };
    $pp_get_all_formatter_output_functions = (dynamic $state, dynamic $param) ==> {
      return Vector{0, $state[17], $state[18], $state[19], $state[20]};
    };
    $set_all_formatter_output_functions = 
    (dynamic $e_, dynamic $f_, dynamic $g_, dynamic $h_) ==> {
      return $pp_set_all_formatter_output_functions(
        $std_formatter,
        $e_,
        $f_,
        $g_,
        $h_
      );
    };
    $get_all_formatter_output_functions = (dynamic $d_) ==> {
      return $pp_get_all_formatter_output_functions($std_formatter, $d_);
    };
    $bprintf = (dynamic $b, dynamic $param) ==> {
      $fmt = $param[1];
      $k = (dynamic $ppf, dynamic $acc) ==> {
        $output_acc->contents($ppf, $acc);
        return $pp_flush_queue($ppf, 0);
      };
      $c_ = $formatter_of_buffer($b);
      return $call4($CamlinternalFormat[7], $k, $c_, 0, $fmt);
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
    
     return ($Format);

  }
  public static function pp_open_box(dynamic $state, dynamic $indent) {
    return static::get()[1]($state, $indent);
  }
  public static function open_box() {
    return static::get()[2]();
  }
  public static function pp_close_box(dynamic $state, dynamic $param) {
    return static::get()[3]($state, $param);
  }
  public static function close_box() {
    return static::get()[4]();
  }
  public static function pp_open_hbox(dynamic $state, dynamic $param) {
    return static::get()[5]($state, $param);
  }
  public static function open_hbox() {
    return static::get()[6]();
  }
  public static function pp_open_vbox(dynamic $state, dynamic $indent) {
    return static::get()[7]($state, $indent);
  }
  public static function open_vbox() {
    return static::get()[8]();
  }
  public static function pp_open_hvbox(dynamic $state, dynamic $indent) {
    return static::get()[9]($state, $indent);
  }
  public static function open_hvbox() {
    return static::get()[10]();
  }
  public static function pp_open_hovbox(dynamic $state, dynamic $indent) {
    return static::get()[11]($state, $indent);
  }
  public static function open_hovbox() {
    return static::get()[12]();
  }
  public static function pp_print_string(dynamic $state, dynamic $s) {
    return static::get()[13]($state, $s);
  }
  public static function print_string() {
    return static::get()[14]();
  }
  public static function pp_print_as(dynamic $state, dynamic $isize, dynamic $s) {
    return static::get()[15]($state, $isize, $s);
  }
  public static function print_as() {
    return static::get()[16]();
  }
  public static function pp_print_int(dynamic $state, dynamic $i) {
    return static::get()[17]($state, $i);
  }
  public static function print_int() {
    return static::get()[18]();
  }
  public static function pp_print_float(dynamic $state, dynamic $f) {
    return static::get()[19]($state, $f);
  }
  public static function print_float() {
    return static::get()[20]();
  }
  public static function pp_print_char(dynamic $state, dynamic $c) {
    return static::get()[21]($state, $c);
  }
  public static function print_char() {
    return static::get()[22]();
  }
  public static function pp_print_bool(dynamic $state, dynamic $b) {
    return static::get()[23]($state, $b);
  }
  public static function print_bool() {
    return static::get()[24]();
  }
  public static function pp_print_space(dynamic $state, dynamic $param) {
    return static::get()[25]($state, $param);
  }
  public static function print_space() {
    return static::get()[26]();
  }
  public static function pp_print_cut(dynamic $state, dynamic $param) {
    return static::get()[27]($state, $param);
  }
  public static function print_cut() {
    return static::get()[28]();
  }
  public static function pp_print_break(dynamic $state, dynamic $width, dynamic $offset) {
    return static::get()[29]($state, $width, $offset);
  }
  public static function print_break() {
    return static::get()[30]();
  }
  public static function pp_force_newline(dynamic $state, dynamic $param) {
    return static::get()[31]($state, $param);
  }
  public static function force_newline() {
    return static::get()[32]();
  }
  public static function pp_print_if_newline(dynamic $state, dynamic $param) {
    return static::get()[33]($state, $param);
  }
  public static function print_if_newline() {
    return static::get()[34]();
  }
  public static function pp_print_flush(dynamic $state, dynamic $param) {
    return static::get()[35]($state, $param);
  }
  public static function print_flush() {
    return static::get()[36]();
  }
  public static function pp_print_newline(dynamic $state, dynamic $param) {
    return static::get()[37]($state, $param);
  }
  public static function print_newline() {
    return static::get()[38]();
  }
  public static function pp_set_margin(dynamic $state, dynamic $n) {
    return static::get()[39]($state, $n);
  }
  public static function set_margin() {
    return static::get()[40]();
  }
  public static function pp_get_margin(dynamic $state, dynamic $param) {
    return static::get()[41]($state, $param);
  }
  public static function get_margin() {
    return static::get()[42]();
  }
  public static function pp_set_max_indent(dynamic $state, dynamic $n) {
    return static::get()[43]($state, $n);
  }
  public static function set_max_indent() {
    return static::get()[44]();
  }
  public static function pp_get_max_indent(dynamic $state, dynamic $param) {
    return static::get()[45]($state, $param);
  }
  public static function get_max_indent() {
    return static::get()[46]();
  }
  public static function pp_set_max_boxes(dynamic $state, dynamic $n) {
    return static::get()[47]($state, $n);
  }
  public static function set_max_boxes() {
    return static::get()[48]();
  }
  public static function pp_get_max_boxes(dynamic $state, dynamic $param) {
    return static::get()[49]($state, $param);
  }
  public static function get_max_boxes() {
    return static::get()[50]();
  }
  public static function pp_over_max_boxes(dynamic $state, dynamic $param) {
    return static::get()[51]($state, $param);
  }
  public static function over_max_boxes() {
    return static::get()[52]();
  }
  public static function pp_open_tbox(dynamic $state, dynamic $param) {
    return static::get()[53]($state, $param);
  }
  public static function open_tbox() {
    return static::get()[54]();
  }
  public static function pp_close_tbox(dynamic $state, dynamic $param) {
    return static::get()[55]($state, $param);
  }
  public static function close_tbox() {
    return static::get()[56]();
  }
  public static function pp_set_tab(dynamic $state, dynamic $param) {
    return static::get()[57]($state, $param);
  }
  public static function set_tab() {
    return static::get()[58]();
  }
  public static function pp_print_tab(dynamic $state, dynamic $param) {
    return static::get()[59]($state, $param);
  }
  public static function print_tab() {
    return static::get()[60]();
  }
  public static function pp_print_tbreak(dynamic $state, dynamic $width, dynamic $offset) {
    return static::get()[61]($state, $width, $offset);
  }
  public static function print_tbreak() {
    return static::get()[62]();
  }
  public static function pp_set_ellipsis_text(dynamic $state, dynamic $s) {
    return static::get()[63]($state, $s);
  }
  public static function set_ellipsis_text() {
    return static::get()[64]();
  }
  public static function pp_get_ellipsis_text(dynamic $state, dynamic $param) {
    return static::get()[65]($state, $param);
  }
  public static function get_ellipsis_text() {
    return static::get()[66]();
  }
  public static function pp_open_tag(dynamic $state, dynamic $tag_name) {
    return static::get()[67]($state, $tag_name);
  }
  public static function open_tag() {
    return static::get()[68]();
  }
  public static function pp_close_tag(dynamic $state, dynamic $param) {
    return static::get()[69]($state, $param);
  }
  public static function close_tag() {
    return static::get()[70]();
  }
  public static function pp_set_tags(dynamic $state, dynamic $b) {
    return static::get()[71]($state, $b);
  }
  public static function set_tags() {
    return static::get()[72]();
  }
  public static function pp_set_print_tags(dynamic $state, dynamic $b) {
    return static::get()[73]($state, $b);
  }
  public static function set_print_tags() {
    return static::get()[74]();
  }
  public static function pp_set_mark_tags(dynamic $state, dynamic $b) {
    return static::get()[75]($state, $b);
  }
  public static function set_mark_tags() {
    return static::get()[76]();
  }
  public static function pp_get_print_tags(dynamic $state, dynamic $param) {
    return static::get()[77]($state, $param);
  }
  public static function get_print_tags() {
    return static::get()[78]();
  }
  public static function pp_get_mark_tags(dynamic $state, dynamic $param) {
    return static::get()[79]($state, $param);
  }
  public static function get_mark_tags() {
    return static::get()[80]();
  }
  public static function pp_set_formatter_out_channel(dynamic $state, dynamic $oc) {
    return static::get()[81]($state, $oc);
  }
  public static function set_formatter_out_channel() {
    return static::get()[82]();
  }
  public static function pp_set_formatter_output_functions(dynamic $state, dynamic $f, dynamic $g) {
    return static::get()[83]($state, $f, $g);
  }
  public static function set_formatter_output_functions() {
    return static::get()[84]();
  }
  public static function pp_get_formatter_output_functions(dynamic $state, dynamic $param) {
    return static::get()[85]($state, $param);
  }
  public static function get_formatter_output_functions() {
    return static::get()[86]();
  }
  public static function pp_set_formatter_out_functions(dynamic $state, dynamic $param) {
    return static::get()[87]($state, $param);
  }
  public static function set_formatter_out_functions() {
    return static::get()[88]();
  }
  public static function pp_get_formatter_out_functions(dynamic $state, dynamic $param) {
    return static::get()[89]($state, $param);
  }
  public static function get_formatter_out_functions() {
    return static::get()[90]();
  }
  public static function pp_set_formatter_tag_functions(dynamic $state, dynamic $param) {
    return static::get()[91]($state, $param);
  }
  public static function set_formatter_tag_functions() {
    return static::get()[92]();
  }
  public static function pp_get_formatter_tag_functions(dynamic $state, dynamic $param) {
    return static::get()[93]($state, $param);
  }
  public static function get_formatter_tag_functions() {
    return static::get()[94]();
  }
  public static function formatter_of_out_channel(dynamic $oc) {
    return static::get()[95]($oc);
  }
  public static function std_formatter() {
    return static::get()[96]();
  }
  public static function err_formatter() {
    return static::get()[97]();
  }
  public static function formatter_of_buffer(dynamic $b) {
    return static::get()[98]($b);
  }
  public static function stdbuf() {
    return static::get()[99]();
  }
  public static function str_formatter() {
    return static::get()[100]();
  }
  public static function flush_str_formatter(dynamic $param) {
    return static::get()[101]($param);
  }
  public static function make_formatter(dynamic $output, dynamic $flush) {
    return static::get()[102]($output, $flush);
  }
  public static function formatter_of_out_functions(dynamic $out_funs) {
    return static::get()[103]($out_funs);
  }
  public static function make_symbolic_output_buffer(dynamic $param) {
    return static::get()[104]($param);
  }
  public static function clear_symbolic_output_buffer(dynamic $sob) {
    return static::get()[105]($sob);
  }
  public static function get_symbolic_output_buffer(dynamic $sob) {
    return static::get()[106]($sob);
  }
  public static function flush_symbolic_output_buffer(dynamic $sob) {
    return static::get()[107]($sob);
  }
  public static function add_symbolic_output_item(dynamic $sob, dynamic $item) {
    return static::get()[108]($sob, $item);
  }
  public static function formatter_of_symbolic_output_buffer(dynamic $sob) {
    return static::get()[109]($sob);
  }
  public static function pp_print_list(dynamic $opt, dynamic $pp_v, dynamic $ppf, dynamic $param) {
    return static::get()[110]($opt, $pp_v, $ppf, $param);
  }
  public static function pp_print_text(dynamic $ppf, dynamic $s) {
    return static::get()[111]($ppf, $s);
  }
  public static function fprintf(dynamic $ppf) {
    return static::get()[112]($ppf);
  }
  public static function printf(dynamic $fmt) {
    return static::get()[113]($fmt);
  }
  public static function eprintf(dynamic $fmt) {
    return static::get()[114]($fmt);
  }
  public static function sprintf(dynamic $fmt) {
    return static::get()[115]($fmt);
  }
  public static function asprintf(dynamic $fmt) {
    return static::get()[116]($fmt);
  }
  public static function ifprintf(dynamic $ppf) {
    return static::get()[117]($ppf);
  }
  public static function kfprintf(dynamic $k, dynamic $ppf, dynamic $param) {
    return static::get()[118]($k, $ppf, $param);
  }
  public static function ikfprintf(dynamic $k, dynamic $ppf, dynamic $param) {
    return static::get()[119]($k, $ppf, $param);
  }
  public static function ksprintf(dynamic $k, dynamic $param) {
    return static::get()[120]($k, $param);
  }
  public static function kasprintf(dynamic $k, dynamic $param) {
    return static::get()[121]($k, $param);
  }
  public static function bprintf(dynamic $b, dynamic $param) {
    return static::get()[122]($b, $param);
  }
  public static function ksprintf(dynamic $k, dynamic $param) {
    return static::get()[123]($k, $param);
  }
  public static function set_all_formatter_output_functions() {
    return static::get()[124]();
  }
  public static function get_all_formatter_output_functions() {
    return static::get()[125]();
  }
  public static function pp_set_all_formatter_output_functions(dynamic $state, dynamic $f, dynamic $g, dynamic $h, dynamic $i) {
    return static::get()[126]($state, $f, $g, $h, $i);
  }
  public static function pp_get_all_formatter_output_functions(dynamic $state, dynamic $param) {
    return static::get()[127]($state, $param);
  }

}
/* Hashing disabled */
