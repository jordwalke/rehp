<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class Format {
  <<__Override, __Memoize>>
  public static function requireModule() : Vector<dynamic> {
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
    $CamlinternalFormat =  CamlinternalFormat::requireModule ();
    $Pervasives =  Pervasives::requireModule ();
    $String =  String_::requireModule ();
    $Buffer =  Buffer::requireModule ();
    $List =  List_::requireModule ();
    $Not_found =  Not_found::requireModule ();
    $b_ = Vector{3, 0, 3} as dynamic;
    $a_ = Vector{0, $string("")} as dynamic;
    $add_queue = (dynamic $x, dynamic $q) ==> {
      $c = Vector{0, $x, 0} as dynamic;
      $bZ_ = $q[1];
      if ($bZ_) {$q[1] = $c;$bZ_[2] = $c;return 0;}
      $q[1] = $c;
      $q[2] = $c;
      return 0;
    };
    $Empty_queue = Vector{
      248,
      $cst_Format_Empty_queue,
      $runtime["caml_fresh_oo_id"](0)
    } as dynamic;
    $take_queue = (dynamic $q) ==> {
      $x = null;
      $tl = null;
      $bY_ = $q[2];
      if ($bY_) {
        $x = $bY_[1];
        $tl = $bY_[2];
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
    $pp_infinity = 1000000010;
    $pp_output_string = (dynamic $state, dynamic $s) ==> {
      return $call3($state[17], $s, 0, $caml_ml_string_length($s));
    };
    $pp_output_newline = (dynamic $state) ==> {return $call1($state[19], 0);};
    $break_new_line = (dynamic $state, dynamic $offset, dynamic $width) ==> {
      $pp_output_newline($state);
      $state[11] = 1;
      $indent = (int) ((int) ($state[6] - $width) + $offset);
      $real_indent = $call2($Pervasives[4], $state[8], $indent);
      $state[10] = $real_indent;
      $state[9] = (int) ($state[6] - $state[10]);
      return $call1($state[21], $state[10]);
    };
    $break_line = (dynamic $state, dynamic $width) ==> {
      return $break_new_line($state, 0, $width);
    };
    $break_same_line = (dynamic $state, dynamic $width) ==> {
      $state[9] = (int) ($state[9] - $width);
      return $call1($state[20], $width);
    };
    $pp_force_break_line = (dynamic $state) ==> {
      $match = null;
      $width = null;
      $bl_ty = null;
      $bW_ = null;
      $bX_ = null;
      $bV_ = $state[2];
      if ($bV_) {
        $match = $bV_[1];
        $width = $match[2];
        $bl_ty = $match[1];
        $bW_ = $state[9] < $width ? 1 : (0);
        if ($bW_) {
          if (0 !== $bl_ty) {
            return 5 <= $bl_ty ? 0 : ($break_line($state, $width));
          }
          $bX_ = 0;
        }
        else {$bX_ = $bW_;}
        return $bX_;
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
      $marker__0 = null;
      $tag_name__0 = null;
      $tbox = null;
      $bl_type = null;
      $offset__0 = null;
      $insertion_point__0 = null;
      $off__1 = null;
      $ty__0 = null;
      $bT_ = null;
      $offset = null;
      $tab = null;
      $x__0 = null;
      $x = null;
      $bS_ = null;
      $find = null;
      $tabs__0 = null;
      $match__2 = null;
      $bR_ = null;
      $insertion_point = null;
      $n__0 = null;
      $off__0 = null;
      $ty = null;
      $width__0 = null;
      $match__1 = null;
      $bQ_ = null;
      $n = null;
      $off = null;
      $s = null;
      $marker = null;
      $tag_name = null;
      $tags = null;
      $bP_ = null;
      $bO_ = null;
      $width = null;
      $match__0 = null;
      $bN_ = null;
      $ls__0 = null;
      $bM_ = null;
      $ls = null;
      $bL_ = null;
      $add_tab = null;
      $tabs = null;
      $match = null;
      $bK_ = null;
      if ($is_int($param)) {
        switch($param) {
          // FALLTHROUGH
          case 0:
            $bK_ = $state[3];
            if ($bK_) {
              $match = $bK_[1];
              $tabs = $match[1];
              $add_tab =
                (dynamic $n, dynamic $ls) ==> {
                  $x = null;
                  $l = null;
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
            $bL_ = $state[2];
            if ($bL_) {$ls = $bL_[2];$state[2] = $ls;return 0;}
            return 0;
          // FALLTHROUGH
          case 2:
            $bM_ = $state[3];
            if ($bM_) {$ls__0 = $bM_[2];$state[3] = $ls__0;return 0;}
            return 0;
          // FALLTHROUGH
          case 3:
            $bN_ = $state[2];
            if ($bN_) {
              $match__0 = $bN_[1];
              $width = $match__0[2];
              return $break_line($state, $width);
            }
            return $pp_output_newline($state);
          // FALLTHROUGH
          case 4:
            $bO_ = $state[10] !== (int) ($state[6] - $state[9]) ? 1 : (0);
            return $bO_ ? $pp_skip_token($state) : ($bO_);
          // FALLTHROUGH
          default:
            $bP_ = $state[5];
            if ($bP_) {
              $tags = $bP_[2];
              $tag_name = $bP_[1];
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
            $bQ_ = $state[2];
            if ($bQ_) {
              $match__1 = $bQ_[1];
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
            $bR_ = $state[3];
            if ($bR_) {
              $match__2 = $bR_[1];
              $tabs__0 = $match__2[1];
              $find =
                (dynamic $n, dynamic $param) ==> {
                  $l = null;
                  $x = null;
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
              $bS_ = $tabs__0[1];
              if ($bS_) {
                $x = $bS_[1];
                try {$bT_ = $find($insertion_point, $tabs__0[1]);$x__0 = $bT_;
                }
                catch(\Throwable $bU_) {
                  $bU_ = $runtime["caml_wrap_exception"]($bU_);
                  if ($bU_ !== $Not_found) {
                    throw $caml_wrap_thrown_exception_reraise($bU_) as \Throwable;
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
      $size__0 = null;
      $bJ_ = null;
      $bI_ = null;
      $bH_ = null;
      $tok = null;
      $len = null;
      $size = null;
      $x = null;
      $bG_ = null;
      for (;;) {
        $bG_ = $state[28][2];
        if ($bG_) {
          $x = $bG_[1];
          $size = $x[1];
          $len = $x[3];
          $tok = $x[2];
          $bH_ = $size < 0 ? 1 : (0);
          $bI_ =
            $bH_
              ? (int) ($state[13] - $state[12]) < $state[9] ? 1 : (0)
              : ($bH_);
          $bJ_ = 1 - $bI_;
          if ($bJ_) {
            $take_queue($state[28]);
            $size__0 = 0 <= $size ? $size : ($pp_infinity);
            $format_pp_token($state, $size__0, $tok);
            $state[12] = (int) ($len + $state[12]);
            continue;
          }
          return $bJ_;
        }
        throw $caml_wrap_thrown_exception($Empty_queue) as \Throwable;
      }
    };
    $advance_left = (dynamic $state) ==> {
      $bE_ = null;
      try {$bE_ = $advance_loop($state);return $bE_;}
      catch(\Throwable $bF_) {
        $bF_ = $runtime["caml_wrap_exception"]($bF_);
        if ($bF_ === $Empty_queue) {return 0;}
        throw $caml_wrap_thrown_exception_reraise($bF_) as \Throwable;
      }
    };
    $enqueue_advance = (dynamic $state, dynamic $tok) ==> {
      $pp_enqueue($state, $tok);
      return $advance_left($state);
    };
    $enqueue_string_as = (dynamic $state, dynamic $size, dynamic $s) ==> {
      return $enqueue_advance($state, Vector{0, $size, Vector{0, $s}, $size});
    };
    $q_elem = Vector{0, -1, $a_, 0} as dynamic;
    $scan_stack_bottom = Vector{0, Vector{0, -1, $q_elem}, 0} as dynamic;
    $clear_scan_stack = (dynamic $state) ==> {
      $state[1] = $scan_stack_bottom;
      return 0;
    };
    $set_size = (dynamic $state, dynamic $ty) ==> {
      $match = null;
      $queue_elem = null;
      $left_tot = null;
      $size = null;
      $t = null;
      $tok = null;
      $bB_ = null;
      $bC_ = null;
      $bD_ = null;
      $bA_ = $state[1];
      if ($bA_) {
        $match = $bA_[1];
        $queue_elem = $match[2];
        $left_tot = $match[1];
        $size = $queue_elem[1];
        $t = $bA_[2];
        $tok = $queue_elem[2];
        if ($left_tot < $state[12]) {return $clear_scan_stack($state);}
        if (! $is_int($tok)) {
          switch($tok[0]) {
            // FALLTHROUGH
            case 3:
              $bC_ = 1 - $ty;
              if ($bC_) {
                $queue_elem[1] = (int) ($state[13] + $size);
                $state[1] = $t;
                $bD_ = 0;
              }
              else {$bD_ = $bC_;}
              return $bD_;
            // FALLTHROUGH
            case 1:
            // FALLTHROUGH
            case 2:
              if ($ty) {
                $queue_elem[1] = (int) ($state[13] + $size);
                $state[1] = $t;
                $bB_ = 0;
              }
              else {$bB_ = $ty;}
              return $bB_;
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
      $bz_ = null;
      $elem = null;
      $len = null;
      $state[14] = (int) ($state[14] + 1);
      if ($state[14] < $state[15]) {
        $elem = Vector{0, (int) - $state[13], Vector{3, $indent, $br_ty}, 0};
        return $scan_push($state, 0, $elem);
      }
      $by_ = $state[14] === $state[15] ? 1 : (0);
      if ($by_) {
        $bz_ = $state[16];
        $len = $caml_ml_string_length($bz_);
        return $enqueue_string_as($state, $len, $bz_);
      }
      return $by_;
    };
    $pp_close_box = (dynamic $state, dynamic $param) ==> {
      $bx_ = null;
      $bw_ = 1 < $state[14] ? 1 : (0);
      if ($bw_) {
        if ($state[14] < $state[15]) {
          $pp_enqueue($state, Vector{0, 0, 1, 0});
          $set_size($state, 1);
          $set_size($state, 0);
        }
        $state[14] = (int) ($state[14] + -1);
        $bx_ = 0;
      }
      else {$bx_ = $bw_;}
      return $bx_;
    };
    $pp_open_tag = (dynamic $state, dynamic $tag_name) ==> {
      if ($state[22]) {
        $state[4] = Vector{0, $tag_name, $state[4]};
        $call1($state[26], $tag_name);
      }
      $bv_ = $state[23];
      return $bv_
        ? $pp_enqueue($state, Vector{0, 0, Vector{5, $tag_name}, 0})
        : ($bv_);
    };
    $pp_close_tag = (dynamic $state, dynamic $param) ==> {
      $bu_ = null;
      $tag_name = null;
      $tags = null;
      $bt_ = null;
      if ($state[23]) {$pp_enqueue($state, Vector{0, 0, 5, 0});}
      $bs_ = $state[22];
      if ($bs_) {
        $bt_ = $state[4];
        if ($bt_) {
          $tags = $bt_[2];
          $tag_name = $bt_[1];
          $call1($state[27], $tag_name);
          $state[4] = $tags;
          return 0;
        }
        $bu_ = 0;
      }
      else {$bu_ = $bs_;}
      return $bu_;
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
      $state[12] = 1;
      $state[13] = 1;
      $br_ = $state[28];
      $br_[1] = 0;
      $br_[2] = 0;
      $clear_scan_stack($state);
      $state[2] = 0;
      $state[3] = 0;
      $state[4] = 0;
      $state[5] = 0;
      $state[10] = 0;
      $state[14] = 0;
      $state[9] = $state[6];
      return $pp_open_box_gen($state, 0, 3);
    };
    $pp_flush_queue = (dynamic $state, dynamic $b) ==> {
      $bp_ = $state[4];
      $bq_ = (dynamic $param) ==> {return $pp_close_tag($state, 0);};
      $call2($List[15], $bq_, $bp_);
      for (;;) {
        if (1 < $state[14]) {$pp_close_box($state, 0);continue;}
        $state[13] = $pp_infinity;
        $advance_left($state);
        if ($b) {$pp_output_newline($state);}
        return $pp_rinit($state);
      }
    };
    $pp_print_as_size = (dynamic $state, dynamic $size, dynamic $s) ==> {
      $bo_ = $state[14] < $state[15] ? 1 : (0);
      return $bo_ ? $enqueue_string_as($state, $size, $s) : ($bo_);
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
      $bn_ = $state[14] < $state[15] ? 1 : (0);
      return $bn_ ? $enqueue_advance($state, Vector{0, 0, 3, 0}) : ($bn_);
    };
    $pp_print_if_newline = (dynamic $state, dynamic $param) ==> {
      $bm_ = $state[14] < $state[15] ? 1 : (0);
      return $bm_ ? $enqueue_advance($state, Vector{0, 0, 4, 0}) : ($bm_);
    };
    $pp_print_break = (dynamic $state, dynamic $width, dynamic $offset) ==> {
      $elem = null;
      $bl_ = $state[14] < $state[15] ? 1 : (0);
      if ($bl_) {
        $elem =
          Vector{0, (int) - $state[13], Vector{1, $width, $offset}, $width};
        return $scan_push($state, 1, $elem);
      }
      return $bl_;
    };
    $pp_print_space = (dynamic $state, dynamic $param) ==> {
      return $pp_print_break($state, 1, 0);
    };
    $pp_print_cut = (dynamic $state, dynamic $param) ==> {
      return $pp_print_break($state, 0, 0);
    };
    $pp_open_tbox = (dynamic $state, dynamic $param) ==> {
      $elem = null;
      $state[14] = (int) ($state[14] + 1);
      $bk_ = $state[14] < $state[15] ? 1 : (0);
      if ($bk_) {
        $elem = Vector{0, 0, Vector{4, Vector{0, Vector{0, 0}}}, 0};
        return $enqueue_advance($state, $elem);
      }
      return $bk_;
    };
    $pp_close_tbox = (dynamic $state, dynamic $param) ==> {
      $bi_ = null;
      $elem = null;
      $bj_ = null;
      $bh_ = 1 < $state[14] ? 1 : (0);
      if ($bh_) {
        $bi_ = $state[14] < $state[15] ? 1 : (0);
        if ($bi_) {
          $elem = Vector{0, 0, 2, 0};
          $enqueue_advance($state, $elem);
          $state[14] = (int) ($state[14] + -1);
          $bj_ = 0;
        }
        else {$bj_ = $bi_;}
      }
      else {$bj_ = $bh_;}
      return $bj_;
    };
    $pp_print_tbreak = (dynamic $state, dynamic $width, dynamic $offset) ==> {
      $elem = null;
      $bg_ = $state[14] < $state[15] ? 1 : (0);
      if ($bg_) {
        $elem =
          Vector{0, (int) - $state[13], Vector{2, $width, $offset}, $width};
        return $scan_push($state, 1, $elem);
      }
      return $bg_;
    };
    $pp_print_tab = (dynamic $state, dynamic $param) ==> {
      return $pp_print_tbreak($state, 0, 0);
    };
    $pp_set_tab = (dynamic $state, dynamic $param) ==> {
      $elem = null;
      $bf_ = $state[14] < $state[15] ? 1 : (0);
      if ($bf_) {
        $elem = Vector{0, 0, 0, 0};
        return $enqueue_advance($state, $elem);
      }
      return $bf_;
    };
    $pp_set_max_boxes = (dynamic $state, dynamic $n) ==> {
      $be_ = null;
      $bd_ = 1 < $n ? 1 : (0);
      if ($bd_) {
        $state[15] = $n;
        $be_ = 0;
      }
      else {$be_ = $bd_;}
      return $be_;
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
    $pp_set_max_indent = (dynamic $state, dynamic $n__0) ==> {
      $n = null;
      $n__1 = (int) ($state[6] - $n__0);
      $bc_ = 1 <= $n__1 ? 1 : (0);
      if ($bc_) {
        $n = $pp_limit($n__1);
        $state[7] = $n;
        $state[8] = (int) ($state[6] - $state[7]);
        return $pp_rinit($state);
      }
      return $bc_;
    };
    $pp_get_max_indent = (dynamic $state, dynamic $param) ==> {return $state[8];
    };
    $pp_set_margin = (dynamic $state, dynamic $n) ==> {
      $n__0 = null;
      $new_max_indent = null;
      $bb_ = null;
      $ba_ = 1 <= $n ? 1 : (0);
      if ($ba_) {
        $n__0 = $pp_limit($n);
        $state[6] = $n__0;
        if ($state[8] <= $state[6]) {
          $new_max_indent = $state[8];
        }
        else {
          $bb_ =
            $call2(
              $Pervasives[5],
              (int)
              ($state[6] - $state[7]),
              (int)
              ($state[6] / 2)
            );
          $new_max_indent = $call2($Pervasives[5], $bb_, 1);
        }
        return $pp_set_max_indent($state, $new_max_indent);
      }
      return $ba_;
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
      $a__ = null;
      $n__1 = null;
      $n__0 = $n;
      for (;;) {
        $a__ = 0 < $n__0 ? 1 : (0);
        if ($a__) {
          if (80 < $n__0) {
            $call3($state[17], $blank_line, 0, 80);
            $n__1 = (int) ($n__0 + -80);
            $n__0 = $n__1;
            continue;
          }
          return $call3($state[17], $blank_line, 0, $n__0);
        }
        return $a__;
      }
    };
    $pp_set_formatter_out_channel = (dynamic $state, dynamic $oc) ==> {
      $state[17] = $call1($Pervasives[57], $oc);
      $state[18] =
        (dynamic $param) ==> {return $call1($Pervasives[51], $oc);};
      $state[19] =
        (dynamic $a9_) ==> {return $display_newline($state, $a9_);};
      $state[20] = (dynamic $a8_) ==> {return $display_blanks($state, $a8_);};
      $state[21] = (dynamic $a7_) ==> {return $display_blanks($state, $a7_);};
      return 0;
    };
    $default_pp_mark_open_tag = (dynamic $s) ==> {
      $a6_ = $call2($Pervasives[16], $s, $cst__0);
      return $call2($Pervasives[16], $cst__1, $a6_);
    };
    $default_pp_mark_close_tag = (dynamic $s) ==> {
      $a5_ = $call2($Pervasives[16], $s, $cst__2);
      return $call2($Pervasives[16], $cst__3, $a5_);
    };
    $default_pp_print_open_tag = (dynamic $a4_) ==> {return 0;};
    $default_pp_print_close_tag = (dynamic $a3_) ==> {return 0;};
    $pp_make_formatter = 
    (dynamic $f, dynamic $g, dynamic $h, dynamic $i, dynamic $j) ==> {
      $pp_queue = Vector{0, 0, 0} as dynamic;
      $sys_tok = Vector{0, -1, $b_, 0} as dynamic;
      $add_queue($sys_tok, $pp_queue);
      $sys_scan_stack = Vector{0, Vector{0, 1, $sys_tok}, $scan_stack_bottom} as dynamic;
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
      $aV_ = (dynamic $a2_) ==> {return 0;};
      $aW_ = (dynamic $a1_) ==> {return 0;};
      $ppf = $pp_make_formatter(
        $output,
        $flush,
        (dynamic $a0_) ==> {return 0;},
        $aW_,
        $aV_
      );
      $ppf[19] = (dynamic $aZ_) ==> {return $display_newline($ppf, $aZ_);};
      $ppf[20] = (dynamic $aY_) ==> {return $display_blanks($ppf, $aY_);};
      $ppf[21] = (dynamic $aX_) ==> {return $display_blanks($ppf, $aX_);};
      return $ppf;
    };
    $formatter_of_out_channel = (dynamic $oc) ==> {
      $aU_ = (dynamic $param) ==> {return $call1($Pervasives[51], $oc);};
      return $make_formatter($call1($Pervasives[57], $oc), $aU_);
    };
    $formatter_of_buffer = (dynamic $b) ==> {
      $aS_ = (dynamic $aT_) ==> {return 0;};
      return $make_formatter($call1($Buffer[16], $b), $aS_);
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
      $f = (dynamic $s, dynamic $i, dynamic $n) ==> {
        return $add_symbolic_output_item(
          $sob,
          Vector{0, $call3($String[4], $s, $i, $n)}
        );
      };
      $g = (dynamic $aR_) ==> {return $add_symbolic_output_item($sob, 0);};
      $h = (dynamic $aQ_) ==> {return $add_symbolic_output_item($sob, 1);};
      $i = (dynamic $n) ==> {
        return $add_symbolic_output_item($sob, Vector{1, $n});
      };
      $j = (dynamic $n) ==> {
        return $add_symbolic_output_item($sob, Vector{2, $n});
      };
      return $pp_make_formatter($f, $g, $h, $i, $j);
    };
    $open_hbox = (dynamic $aP_) ==> {
      return $pp_open_hbox($std_formatter, $aP_);
    };
    $open_vbox = (dynamic $aO_) ==> {
      return $pp_open_vbox($std_formatter, $aO_);
    };
    $open_hvbox = (dynamic $aN_) ==> {
      return $pp_open_hvbox($std_formatter, $aN_);
    };
    $open_hovbox = (dynamic $aM_) ==> {
      return $pp_open_hovbox($std_formatter, $aM_);
    };
    $open_box = (dynamic $aL_) ==> {
      return $pp_open_box($std_formatter, $aL_);
    };
    $close_box = (dynamic $aK_) ==> {
      return $pp_close_box($std_formatter, $aK_);
    };
    $open_tag = (dynamic $aJ_) ==> {
      return $pp_open_tag($std_formatter, $aJ_);
    };
    $close_tag = (dynamic $aI_) ==> {
      return $pp_close_tag($std_formatter, $aI_);
    };
    $print_as = (dynamic $aG_, dynamic $aH_) ==> {
      return $pp_print_as($std_formatter, $aG_, $aH_);
    };
    $print_string = (dynamic $aF_) ==> {
      return $pp_print_string($std_formatter, $aF_);
    };
    $print_int = (dynamic $aE_) ==> {
      return $pp_print_int($std_formatter, $aE_);
    };
    $print_float = (dynamic $aD_) ==> {
      return $pp_print_float($std_formatter, $aD_);
    };
    $print_char = (dynamic $aC_) ==> {
      return $pp_print_char($std_formatter, $aC_);
    };
    $print_bool = (dynamic $aB_) ==> {
      return $pp_print_bool($std_formatter, $aB_);
    };
    $print_break = (dynamic $az_, dynamic $aA_) ==> {
      return $pp_print_break($std_formatter, $az_, $aA_);
    };
    $print_cut = (dynamic $ay_) ==> {
      return $pp_print_cut($std_formatter, $ay_);
    };
    $print_space = (dynamic $ax_) ==> {
      return $pp_print_space($std_formatter, $ax_);
    };
    $force_newline = (dynamic $aw_) ==> {
      return $pp_force_newline($std_formatter, $aw_);
    };
    $print_flush = (dynamic $av_) ==> {
      return $pp_print_flush($std_formatter, $av_);
    };
    $print_newline = (dynamic $au_) ==> {
      return $pp_print_newline($std_formatter, $au_);
    };
    $print_if_newline = (dynamic $at_) ==> {
      return $pp_print_if_newline($std_formatter, $at_);
    };
    $open_tbox = (dynamic $as_) ==> {
      return $pp_open_tbox($std_formatter, $as_);
    };
    $close_tbox = (dynamic $ar_) ==> {
      return $pp_close_tbox($std_formatter, $ar_);
    };
    $print_tbreak = (dynamic $ap_, dynamic $aq_) ==> {
      return $pp_print_tbreak($std_formatter, $ap_, $aq_);
    };
    $set_tab = (dynamic $ao_) ==> {return $pp_set_tab($std_formatter, $ao_);};
    $print_tab = (dynamic $an_) ==> {
      return $pp_print_tab($std_formatter, $an_);
    };
    $set_margin = (dynamic $am_) ==> {
      return $pp_set_margin($std_formatter, $am_);
    };
    $get_margin = (dynamic $al_) ==> {return $std_formatter[6];};
    $set_max_indent = (dynamic $ak_) ==> {
      return $pp_set_max_indent($std_formatter, $ak_);
    };
    $get_max_indent = (dynamic $aj_) ==> {return $std_formatter[8];};
    $set_max_boxes = (dynamic $ai_) ==> {
      return $pp_set_max_boxes($std_formatter, $ai_);
    };
    $get_max_boxes = (dynamic $ah_) ==> {return $std_formatter[15];};
    $over_max_boxes = (dynamic $ag_) ==> {
      return $pp_over_max_boxes($std_formatter, $ag_);
    };
    $set_ellipsis_text = (dynamic $af_) ==> {
      return $pp_set_ellipsis_text($std_formatter, $af_);
    };
    $get_ellipsis_text = (dynamic $ae_) ==> {return $std_formatter[16];};
    $set_formatter_out_channel = (dynamic $ad_) ==> {
      return $pp_set_formatter_out_channel($std_formatter, $ad_);
    };
    $set_formatter_out_functions = (dynamic $ac_) ==> {
      return $pp_set_formatter_out_functions($std_formatter, $ac_);
    };
    $get_formatter_out_functions = (dynamic $ab_) ==> {
      return $pp_get_formatter_out_functions($std_formatter, $ab_);
    };
    $set_formatter_output_functions = (dynamic $Z_, dynamic $aa_) ==> {
      return $pp_set_formatter_output_functions($std_formatter, $Z_, $aa_);
    };
    $get_formatter_output_functions = (dynamic $Y_) ==> {
      return $pp_get_formatter_output_functions($std_formatter, $Y_);
    };
    $set_formatter_tag_functions = (dynamic $X_) ==> {
      return $pp_set_formatter_tag_functions($std_formatter, $X_);
    };
    $get_formatter_tag_functions = (dynamic $W_) ==> {
      return $pp_get_formatter_tag_functions($std_formatter, $W_);
    };
    $set_print_tags = (dynamic $V_) ==> {
      return $pp_set_print_tags($std_formatter, $V_);
    };
    $get_print_tags = (dynamic $U_) ==> {return $std_formatter[22];};
    $set_mark_tags = (dynamic $T_) ==> {
      return $pp_set_mark_tags($std_formatter, $T_);
    };
    $get_mark_tags = (dynamic $S_) ==> {return $std_formatter[23];};
    $set_tags = (dynamic $R_) ==> {return $pp_set_tags($std_formatter, $R_);};
    $pp_print_list = 
    (dynamic $opt, dynamic $pp_v, dynamic $ppf, dynamic $param) ==> {
      $sth = null;
      $pp_sep = null;
      $P_ = null;
      $Q_ = null;
      $opt__1 = null;
      $opt__0 = $opt;
      $param__0 = $param;
      for (;;) {
        if ($opt__0) {
          $sth = $opt__0[1];
          $pp_sep = $sth;
        }
        else {$pp_sep = $pp_print_cut;}
        if ($param__0) {
          $P_ = $param__0[2];
          $Q_ = $param__0[1];
          if ($P_) {
            $call2($pp_v, $ppf, $Q_);
            $call2($pp_sep, $ppf, 0);
            $opt__1 = Vector{0, $pp_sep};
            $opt__0 = $opt__1;
            $param__0 = $P_;
            continue;
          }
          return $call2($pp_v, $ppf, $Q_);
        }
        return 0;
      }
    };
    $pp_print_text = (dynamic $ppf, dynamic $s) ==> {
      $match = null;
      $O_ = null;
      $len = $caml_ml_string_length($s);
      $left = Vector{0, 0} as dynamic;
      $right = Vector{0, 0} as dynamic;
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
        $O_ = $left[1] !== $len ? 1 : (0);
        return $O_ ? $flush(0) : ($O_);
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
      $c = null;
      $width = null;
      $offset = null;
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
      $switch__8 = null;
      $switch__7 = null;
      $switch__6 = null;
      $switch__5 = null;
      $switch__4 = null;
      $switch__3 = null;
      $switch__2 = null;
      $switch__1 = null;
      $switch__0 = null;
      $p__6 = null;
      $msg = null;
      $p__5 = null;
      $p__4 = null;
      $f__0 = null;
      $N_ = null;
      $M_ = null;
      $L_ = null;
      $K_ = null;
      $c__0 = null;
      $size__0 = null;
      $p__3 = null;
      $J_ = null;
      $c = null;
      $p__2 = null;
      $I_ = null;
      $s__0 = null;
      $size = null;
      $p__1 = null;
      $H_ = null;
      $s = null;
      $p__0 = null;
      $G_ = null;
      $indent = null;
      $bty = null;
      $match = null;
      $F_ = null;
      $acc__1 = null;
      $acc__0 = null;
      $E_ = null;
      $D_ = null;
      $p = null;
      $f = null;
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
            $D_ = $acc[2];
            $E_ = $acc[1];
            if (0 === $D_[0]) {
              $acc__0 = $D_[1];
              $output_acc->contents($ppf, $E_);
              return $pp_open_tag(
                $ppf,
                $compute_tag($output_acc->contents, $acc__0)
              );
            }
            $acc__1 = $D_[1];
            $output_acc->contents($ppf, $E_);
            $F_ = $compute_tag($output_acc->contents, $acc__1);
            $match = $call1($CamlinternalFormat[21], $F_);
            $bty = $match[2];
            $indent = $match[1];
            return $pp_open_box_gen($ppf, $indent, $bty);
          // FALLTHROUGH
          case 2:
            $G_ = $acc[1];
            if ($is_int($G_)) {$switch__1 = 1;}
            else {
              if (0 === $G_[0]) {
                $H_ = $G_[2];
                if ($is_int($H_)) {$switch__2 = 1;}
                else {
                  if (1 === $H_[0]) {
                    $s__0 = $acc[2];
                    $size = $H_[2];
                    $p__1 = $G_[1];
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
            if ($switch__1) {$s = $acc[2];$p__0 = $G_;$switch__0 = 2;}
            break;
          // FALLTHROUGH
          case 3:
            $I_ = $acc[1];
            if ($is_int($I_)) {$switch__3 = 1;}
            else {
              if (0 === $I_[0]) {
                $J_ = $I_[2];
                if ($is_int($J_)) {$switch__4 = 1;}
                else {
                  if (1 === $J_[0]) {
                    $c__0 = $acc[2];
                    $size__0 = $J_[2];
                    $p__3 = $I_[1];
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
            if ($switch__3) {$c = $acc[2];$p__2 = $I_;$switch__0 = 3;}
            break;
          // FALLTHROUGH
          case 4:
            $K_ = $acc[1];
            if ($is_int($K_)) {$switch__5 = 1;}
            else {
              if (0 === $K_[0]) {
                $L_ = $K_[2];
                if ($is_int($L_)) {$switch__6 = 1;}
                else {
                  if (1 === $L_[0]) {
                    $s__0 = $acc[2];
                    $size = $L_[2];
                    $p__1 = $K_[1];
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
            if ($switch__5) {$s = $acc[2];$p__0 = $K_;$switch__0 = 2;}
            break;
          // FALLTHROUGH
          case 5:
            $M_ = $acc[1];
            if ($is_int($M_)) {$switch__7 = 1;}
            else {
              if (0 === $M_[0]) {
                $N_ = $M_[2];
                if ($is_int($N_)) {$switch__8 = 1;}
                else {
                  if (1 === $N_[0]) {
                    $c__0 = $acc[2];
                    $size__0 = $N_[2];
                    $p__3 = $M_[1];
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
            if ($switch__7) {$c = $acc[2];$p__2 = $M_;$switch__0 = 3;}
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
      $switch__8 = null;
      $switch__7 = null;
      $switch__6 = null;
      $switch__5 = null;
      $switch__4 = null;
      $switch__3 = null;
      $switch__2 = null;
      $switch__1 = null;
      $switch__0 = null;
      $p__6 = null;
      $msg = null;
      $p__5 = null;
      $p__4 = null;
      $size__1 = null;
      $f__1 = null;
      $C_ = null;
      $f__0 = null;
      $B_ = null;
      $A_ = null;
      $z_ = null;
      $y_ = null;
      $x_ = null;
      $c__0 = null;
      $size__0 = null;
      $p__3 = null;
      $w_ = null;
      $c = null;
      $p__2 = null;
      $v_ = null;
      $s__0 = null;
      $size = null;
      $p__1 = null;
      $u_ = null;
      $s = null;
      $p__0 = null;
      $t_ = null;
      $indent = null;
      $bty = null;
      $match = null;
      $s_ = null;
      $acc__1 = null;
      $acc__0 = null;
      $r_ = null;
      $q_ = null;
      $p = null;
      $f = null;
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
                $u_ = $t_[2];
                if ($is_int($u_)) {$switch__2 = 1;}
                else {
                  if (1 === $u_[0]) {
                    $s__0 = $acc[2];
                    $size = $u_[2];
                    $p__1 = $t_[1];
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
            if ($switch__1) {$s = $acc[2];$p__0 = $t_;$switch__0 = 2;}
            break;
          // FALLTHROUGH
          case 3:
            $v_ = $acc[1];
            if ($is_int($v_)) {$switch__3 = 1;}
            else {
              if (0 === $v_[0]) {
                $w_ = $v_[2];
                if ($is_int($w_)) {$switch__4 = 1;}
                else {
                  if (1 === $w_[0]) {
                    $c__0 = $acc[2];
                    $size__0 = $w_[2];
                    $p__3 = $v_[1];
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
            if ($switch__3) {$c = $acc[2];$p__2 = $v_;$switch__0 = 3;}
            break;
          // FALLTHROUGH
          case 4:
            $x_ = $acc[1];
            if ($is_int($x_)) {$switch__5 = 1;}
            else {
              if (0 === $x_[0]) {
                $y_ = $x_[2];
                if ($is_int($y_)) {$switch__6 = 1;}
                else {
                  if (1 === $y_[0]) {
                    $s__0 = $acc[2];
                    $size = $y_[2];
                    $p__1 = $x_[1];
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
            if ($switch__5) {$s = $acc[2];$p__0 = $x_;$switch__0 = 2;}
            break;
          // FALLTHROUGH
          case 5:
            $z_ = $acc[1];
            if ($is_int($z_)) {$switch__7 = 1;}
            else {
              if (0 === $z_[0]) {
                $A_ = $z_[2];
                if ($is_int($A_)) {$switch__8 = 1;}
                else {
                  if (1 === $A_[0]) {
                    $c__0 = $acc[2];
                    $size__0 = $A_[2];
                    $p__3 = $z_[1];
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
            if ($switch__7) {$c = $acc[2];$p__2 = $z_;$switch__0 = 3;}
            break;
          // FALLTHROUGH
          case 6:
            $B_ = $acc[1];
            if (! $is_int($B_) && 0 === $B_[0]) {
              $C_ = $B_[2];
              if (! $is_int($C_) && 1 === $C_[0]) {
                $f__1 = $acc[2];
                $size__1 = $C_[2];
                $p__4 = $B_[1];
                $strput_acc->contents($ppf, $p__4);
                return $pp_print_as_size($ppf, $size__1, $call1($f__1, 0));
              }
            }
            $f__0 = $acc[2];
            $strput_acc->contents($ppf, $B_);
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
    } as dynamic;
    
     return ($Format);

  }
  public static function pp_open_box(dynamic $state, dynamic $indent): dynamic {
    return static::callRehackFunction(static::requireModule()[1], varray[$state, $indent]);
  }
  public static function pp_close_box(dynamic $state, dynamic $param): dynamic {
    return static::callRehackFunction(static::requireModule()[3], varray[$state, $param]);
  }
  public static function pp_open_hbox(dynamic $state, dynamic $param): dynamic {
    return static::callRehackFunction(static::requireModule()[5], varray[$state, $param]);
  }
  public static function pp_open_vbox(dynamic $state, dynamic $indent): dynamic {
    return static::callRehackFunction(static::requireModule()[7], varray[$state, $indent]);
  }
  public static function pp_open_hvbox(dynamic $state, dynamic $indent): dynamic {
    return static::callRehackFunction(static::requireModule()[9], varray[$state, $indent]);
  }
  public static function pp_open_hovbox(dynamic $state, dynamic $indent): dynamic {
    return static::callRehackFunction(static::requireModule()[11], varray[$state, $indent]);
  }
  public static function pp_print_string(dynamic $state, dynamic $s): dynamic {
    return static::callRehackFunction(static::requireModule()[13], varray[$state, $s]);
  }
  public static function pp_print_as(dynamic $state, dynamic $isize, dynamic $s): dynamic {
    return static::callRehackFunction(static::requireModule()[15], varray[$state, $isize, $s]);
  }
  public static function pp_print_int(dynamic $state, dynamic $i): dynamic {
    return static::callRehackFunction(static::requireModule()[17], varray[$state, $i]);
  }
  public static function pp_print_float(dynamic $state, dynamic $f): dynamic {
    return static::callRehackFunction(static::requireModule()[19], varray[$state, $f]);
  }
  public static function pp_print_char(dynamic $state, dynamic $c): dynamic {
    return static::callRehackFunction(static::requireModule()[21], varray[$state, $c]);
  }
  public static function pp_print_bool(dynamic $state, dynamic $b): dynamic {
    return static::callRehackFunction(static::requireModule()[23], varray[$state, $b]);
  }
  public static function pp_print_space(dynamic $state, dynamic $param): dynamic {
    return static::callRehackFunction(static::requireModule()[25], varray[$state, $param]);
  }
  public static function pp_print_cut(dynamic $state, dynamic $param): dynamic {
    return static::callRehackFunction(static::requireModule()[27], varray[$state, $param]);
  }
  public static function pp_print_break(dynamic $state, dynamic $width, dynamic $offset): dynamic {
    return static::callRehackFunction(static::requireModule()[29], varray[$state, $width, $offset]);
  }
  public static function pp_force_newline(dynamic $state, dynamic $param): dynamic {
    return static::callRehackFunction(static::requireModule()[31], varray[$state, $param]);
  }
  public static function pp_print_if_newline(dynamic $state, dynamic $param): dynamic {
    return static::callRehackFunction(static::requireModule()[33], varray[$state, $param]);
  }
  public static function pp_print_flush(dynamic $state, dynamic $param): dynamic {
    return static::callRehackFunction(static::requireModule()[35], varray[$state, $param]);
  }
  public static function pp_print_newline(dynamic $state, dynamic $param): dynamic {
    return static::callRehackFunction(static::requireModule()[37], varray[$state, $param]);
  }
  public static function pp_set_margin(dynamic $state, dynamic $n): dynamic {
    return static::callRehackFunction(static::requireModule()[39], varray[$state, $n]);
  }
  public static function pp_get_margin(dynamic $state, dynamic $param): dynamic {
    return static::callRehackFunction(static::requireModule()[41], varray[$state, $param]);
  }
  public static function pp_set_max_indent(dynamic $state, dynamic $n): dynamic {
    return static::callRehackFunction(static::requireModule()[43], varray[$state, $n]);
  }
  public static function pp_get_max_indent(dynamic $state, dynamic $param): dynamic {
    return static::callRehackFunction(static::requireModule()[45], varray[$state, $param]);
  }
  public static function pp_set_max_boxes(dynamic $state, dynamic $n): dynamic {
    return static::callRehackFunction(static::requireModule()[47], varray[$state, $n]);
  }
  public static function pp_get_max_boxes(dynamic $state, dynamic $param): dynamic {
    return static::callRehackFunction(static::requireModule()[49], varray[$state, $param]);
  }
  public static function pp_over_max_boxes(dynamic $state, dynamic $param): dynamic {
    return static::callRehackFunction(static::requireModule()[51], varray[$state, $param]);
  }
  public static function pp_open_tbox(dynamic $state, dynamic $param): dynamic {
    return static::callRehackFunction(static::requireModule()[53], varray[$state, $param]);
  }
  public static function pp_close_tbox(dynamic $state, dynamic $param): dynamic {
    return static::callRehackFunction(static::requireModule()[55], varray[$state, $param]);
  }
  public static function pp_set_tab(dynamic $state, dynamic $param): dynamic {
    return static::callRehackFunction(static::requireModule()[57], varray[$state, $param]);
  }
  public static function pp_print_tab(dynamic $state, dynamic $param): dynamic {
    return static::callRehackFunction(static::requireModule()[59], varray[$state, $param]);
  }
  public static function pp_print_tbreak(dynamic $state, dynamic $width, dynamic $offset): dynamic {
    return static::callRehackFunction(static::requireModule()[61], varray[$state, $width, $offset]);
  }
  public static function pp_set_ellipsis_text(dynamic $state, dynamic $s): dynamic {
    return static::callRehackFunction(static::requireModule()[63], varray[$state, $s]);
  }
  public static function pp_get_ellipsis_text(dynamic $state, dynamic $param): dynamic {
    return static::callRehackFunction(static::requireModule()[65], varray[$state, $param]);
  }
  public static function pp_open_tag(dynamic $state, dynamic $tag_name): dynamic {
    return static::callRehackFunction(static::requireModule()[67], varray[$state, $tag_name]);
  }
  public static function pp_close_tag(dynamic $state, dynamic $param): dynamic {
    return static::callRehackFunction(static::requireModule()[69], varray[$state, $param]);
  }
  public static function pp_set_tags(dynamic $state, dynamic $b): dynamic {
    return static::callRehackFunction(static::requireModule()[71], varray[$state, $b]);
  }
  public static function pp_set_print_tags(dynamic $state, dynamic $b): dynamic {
    return static::callRehackFunction(static::requireModule()[73], varray[$state, $b]);
  }
  public static function pp_set_mark_tags(dynamic $state, dynamic $b): dynamic {
    return static::callRehackFunction(static::requireModule()[75], varray[$state, $b]);
  }
  public static function pp_get_print_tags(dynamic $state, dynamic $param): dynamic {
    return static::callRehackFunction(static::requireModule()[77], varray[$state, $param]);
  }
  public static function pp_get_mark_tags(dynamic $state, dynamic $param): dynamic {
    return static::callRehackFunction(static::requireModule()[79], varray[$state, $param]);
  }
  public static function pp_set_formatter_out_channel(dynamic $state, dynamic $oc): dynamic {
    return static::callRehackFunction(static::requireModule()[81], varray[$state, $oc]);
  }
  public static function pp_set_formatter_output_functions(dynamic $state, dynamic $f, dynamic $g): dynamic {
    return static::callRehackFunction(static::requireModule()[83], varray[$state, $f, $g]);
  }
  public static function pp_get_formatter_output_functions(dynamic $state, dynamic $param): dynamic {
    return static::callRehackFunction(static::requireModule()[85], varray[$state, $param]);
  }
  public static function pp_set_formatter_out_functions(dynamic $state, dynamic $param): dynamic {
    return static::callRehackFunction(static::requireModule()[87], varray[$state, $param]);
  }
  public static function pp_get_formatter_out_functions(dynamic $state, dynamic $param): dynamic {
    return static::callRehackFunction(static::requireModule()[89], varray[$state, $param]);
  }
  public static function pp_set_formatter_tag_functions(dynamic $state, dynamic $param): dynamic {
    return static::callRehackFunction(static::requireModule()[91], varray[$state, $param]);
  }
  public static function pp_get_formatter_tag_functions(dynamic $state, dynamic $param): dynamic {
    return static::callRehackFunction(static::requireModule()[93], varray[$state, $param]);
  }
  public static function formatter_of_out_channel(dynamic $oc): dynamic {
    return static::callRehackFunction(static::requireModule()[95], varray[$oc]);
  }
  public static function formatter_of_buffer(dynamic $b): dynamic {
    return static::callRehackFunction(static::requireModule()[98], varray[$b]);
  }
  public static function flush_str_formatter(dynamic $param): dynamic {
    return static::callRehackFunction(static::requireModule()[101], varray[$param]);
  }
  public static function make_formatter(dynamic $output, dynamic $flush): dynamic {
    return static::callRehackFunction(static::requireModule()[102], varray[$output, $flush]);
  }
  public static function formatter_of_out_functions(dynamic $out_funs): dynamic {
    return static::callRehackFunction(static::requireModule()[103], varray[$out_funs]);
  }
  public static function make_symbolic_output_buffer(dynamic $param): dynamic {
    return static::callRehackFunction(static::requireModule()[104], varray[$param]);
  }
  public static function clear_symbolic_output_buffer(dynamic $sob): dynamic {
    return static::callRehackFunction(static::requireModule()[105], varray[$sob]);
  }
  public static function get_symbolic_output_buffer(dynamic $sob): dynamic {
    return static::callRehackFunction(static::requireModule()[106], varray[$sob]);
  }
  public static function flush_symbolic_output_buffer(dynamic $sob): dynamic {
    return static::callRehackFunction(static::requireModule()[107], varray[$sob]);
  }
  public static function add_symbolic_output_item(dynamic $sob, dynamic $item): dynamic {
    return static::callRehackFunction(static::requireModule()[108], varray[$sob, $item]);
  }
  public static function formatter_of_symbolic_output_buffer(dynamic $sob): dynamic {
    return static::callRehackFunction(static::requireModule()[109], varray[$sob]);
  }
  public static function pp_print_list(dynamic $opt, dynamic $pp_v, dynamic $ppf, dynamic $param): dynamic {
    return static::callRehackFunction(static::requireModule()[110], varray[$opt, $pp_v, $ppf, $param]);
  }
  public static function pp_print_text(dynamic $ppf, dynamic $s): dynamic {
    return static::callRehackFunction(static::requireModule()[111], varray[$ppf, $s]);
  }
  public static function fprintf(dynamic $ppf): dynamic {
    return static::callRehackFunction(static::requireModule()[112], varray[$ppf]);
  }
  public static function printf(dynamic $fmt): dynamic {
    return static::callRehackFunction(static::requireModule()[113], varray[$fmt]);
  }
  public static function eprintf(dynamic $fmt): dynamic {
    return static::callRehackFunction(static::requireModule()[114], varray[$fmt]);
  }
  public static function sprintf(dynamic $fmt): dynamic {
    return static::callRehackFunction(static::requireModule()[115], varray[$fmt]);
  }
  public static function asprintf(dynamic $fmt): dynamic {
    return static::callRehackFunction(static::requireModule()[116], varray[$fmt]);
  }
  public static function ifprintf(dynamic $ppf): dynamic {
    return static::callRehackFunction(static::requireModule()[117], varray[$ppf]);
  }
  public static function kfprintf(dynamic $k, dynamic $ppf, dynamic $param): dynamic {
    return static::callRehackFunction(static::requireModule()[118], varray[$k, $ppf, $param]);
  }
  public static function ikfprintf(dynamic $k, dynamic $ppf, dynamic $param): dynamic {
    return static::callRehackFunction(static::requireModule()[119], varray[$k, $ppf, $param]);
  }
  public static function ksprintf(dynamic $k, dynamic $param): dynamic {
    return static::callRehackFunction(static::requireModule()[120], varray[$k, $param]);
  }
  public static function kasprintf(dynamic $k, dynamic $param): dynamic {
    return static::callRehackFunction(static::requireModule()[121], varray[$k, $param]);
  }
  public static function bprintf(dynamic $b, dynamic $param): dynamic {
    return static::callRehackFunction(static::requireModule()[122], varray[$b, $param]);
  }
  public static function pp_set_all_formatter_output_functions(dynamic $state, dynamic $f, dynamic $g, dynamic $h, dynamic $i): dynamic {
    return static::callRehackFunction(static::requireModule()[126], varray[$state, $f, $g, $h, $i]);
  }
  public static function pp_get_all_formatter_output_functions(dynamic $state, dynamic $param): dynamic {
    return static::callRehackFunction(static::requireModule()[127], varray[$state, $param]);
  }

}
/* Hashing disabled */
