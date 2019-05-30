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
    $is_int = $runtime["is_int"];
    $caml_arity_test = $runtime["caml_arity_test"];
    $caml_ml_string_length = $runtime["caml_ml_string_length"];
    $caml_new_string = $runtime["caml_new_string"];
    $caml_wrap_exception = $runtime["caml_wrap_exception"];
    $caml_call1 = function($f, $a0) use ($caml_arity_test,$runtime) {
      return $caml_arity_test($f) === 1
        ? $f($a0)
        : ($runtime["caml_call_gen"]($f, varray[$a0]));
    };
    $caml_call2 = function($f, $a0, $a1) use ($caml_arity_test,$runtime) {
      return $caml_arity_test($f) === 2
        ? $f($a0, $a1)
        : ($runtime["caml_call_gen"]($f, varray[$a0,$a1]));
    };
    $caml_call3 = function($f, $a0, $a1, $a2) use ($caml_arity_test,$runtime) {
      return $caml_arity_test($f) === 3
        ? $f($a0, $a1, $a2)
        : ($runtime["caml_call_gen"]($f, varray[$a0,$a1,$a2]));
    };
    $caml_call4 = function($f, $a0, $a1, $a2, $a3) use ($caml_arity_test,$runtime) {
      return $caml_arity_test($f) === 4
        ? $f($a0, $a1, $a2, $a3)
        : ($runtime["caml_call_gen"]($f, varray[$a0,$a1,$a2,$a3]));
    };
    $global_data = $runtime["caml_get_global_data"]();
    $cst__4 = $caml_new_string(".");
    $cst__2 = $caml_new_string(">");
    $cst__3 = $caml_new_string("</");
    $cst__0 = $caml_new_string(">");
    $cst__1 = $caml_new_string("<");
    $cst = $caml_new_string("\n");
    $cst_Format_Empty_queue = $caml_new_string("Format.Empty_queue");
    $CamlinternalFormat = $global_data["CamlinternalFormat"];
    $Pervasives = $global_data["Pervasives"];
    $String = $global_data["String_"];
    $Buffer = $global_data["Buffer"];
    $List = $global_data["List_"];
    $Not_found = $global_data["Not_found"];
    $sH = Vector{3, 0, 3};
    $sG = Vector{0, $caml_new_string("")};
    $make_queue = function($param) {return Vector{0, 0, 0};};
    $clear_queue = function($q) {$q[1] = 0;$q[2] = 0;return 0;};
    $add_queue = function($x, $q) {
      $c = Vector{0, $x, 0};
      $vS = $q[1];
      if ($vS) {$q[1] = $c;$vS[2] = $c;return 0;}
      $q[1] = $c;
      $q[2] = $c;
      return 0;
    };
    $Empty_queue = Vector{
      248,
      $cst_Format_Empty_queue,
      $runtime["caml_fresh_oo_id"](0)
    };
    $peek_queue = function($param) use ($Empty_queue,$runtime) {
      $vR = $param[2];
      if ($vR) {$x = $vR[1];return $x;}
      throw $runtime["caml_wrap_thrown_exception"]($Empty_queue) as \Throwable;
    };
    $take_queue = function($q) use ($Empty_queue,$runtime) {
      $vQ = $q[2];
      if ($vQ) {
        $x = $vQ[1];
        $tl = $vQ[2];
        $q[2] = $tl;
        if (0 === $tl) {$q[1] = 0;}
        return $x;
      }
      throw $runtime["caml_wrap_thrown_exception"]($Empty_queue) as \Throwable;
    };
    $pp_enqueue = function($state, $token) use ($add_queue) {
      $len = $token[3];
      $state[13] = (int) ($state[13] + $len);
      return $add_queue($token, $state[28]);
    };
    $pp_clear_queue = function($state) use ($clear_queue) {
      $state[12] = 1;
      $state[13] = 1;
      return $clear_queue($state[28]);
    };
    $pp_infinity = 1000000010;
    $pp_output_string = function($state, $s) use ($caml_call3,$caml_ml_string_length) {
      return $caml_call3($state[17], $s, 0, $caml_ml_string_length($s));
    };
    $pp_output_newline = function($state) use ($caml_call1) {
      return $caml_call1($state[19], 0);
    };
    $pp_output_spaces = function($state, $n) use ($caml_call1) {
      return $caml_call1($state[20], $n);
    };
    $pp_output_indent = function($state, $n) use ($caml_call1) {
      return $caml_call1($state[21], $n);
    };
    $break_new_line = function($state, $offset, $width) use ($Pervasives,$caml_call2,$pp_output_indent,$pp_output_newline) {
      $pp_output_newline($state);
      $state[11] = 1;
      $indent = (int) ((int) ($state[6] - $width) + $offset);
      $real_indent = $caml_call2($Pervasives[4], $state[8], $indent);
      $state[10] = $real_indent;
      $state[9] = (int) ($state[6] - $state[10]);
      return $pp_output_indent($state, $state[10]);
    };
    $break_line = function($state, $width) use ($break_new_line) {
      return $break_new_line($state, 0, $width);
    };
    $break_same_line = function($state, $width) use ($pp_output_spaces) {
      $state[9] = (int) ($state[9] - $width);
      return $pp_output_spaces($state, $width);
    };
    $pp_force_break_line = function($state) use ($break_line,$pp_output_newline) {
      $vN = $state[2];
      if ($vN) {
        $match = $vN[1];
        $width = $match[2];
        $bl_ty = $match[1];
        $vO = $state[9] < $width ? 1 : (0);
        if ($vO) {
          if (0 !== $bl_ty) {
            return 5 <= $bl_ty ? 0 : ($break_line($state, $width));
          }
          $vP = 0;
        }
        else {$vP = $vO;}
        return $vP;
      }
      return $pp_output_newline($state);
    };
    $pp_skip_token = function($state) use ($take_queue) {
      $match = $take_queue($state[28]);
      $size = $match[1];
      $len = $match[3];
      $state[12] = (int) ($state[12] - $len);
      $state[9] = (int) ($state[9] + $size);
      return 0;
    };
    $format_pp_token = function($state, $size, $param) use ($Not_found,$add_tab,$break_line,$break_new_line,$break_same_line,$caml_call1,$caml_wrap_exception,$is_int,$pp_force_break_line,$pp_output_newline,$pp_output_string,$pp_skip_token,$runtime) {
      if ($is_int($param)) {
        switch($param) {
          // FALLTHROUGH
          case 0:
            $vC = $state[3];
            if ($vC) {
              $match = $vC[1];
              $tabs = $match[1];
              $add_tab->contents = function($n, $ls) use ($add_tab,$runtime) {
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
            $vD = $state[2];
            if ($vD) {$ls = $vD[2];$state[2] = $ls;return 0;}
            return 0;
          // FALLTHROUGH
          case 2:
            $vE = $state[3];
            if ($vE) {$ls__0 = $vE[2];$state[3] = $ls__0;return 0;}
            return 0;
          // FALLTHROUGH
          case 3:
            $vF = $state[2];
            if ($vF) {
              $match__0 = $vF[1];
              $width = $match__0[2];
              return $break_line($state, $width);
            }
            return $pp_output_newline($state);
          // FALLTHROUGH
          case 4:
            $vG = $state[10] !== (int) ($state[6] - $state[9]) ? 1 : (0);
            return $vG ? $pp_skip_token($state) : ($vG);
          // FALLTHROUGH
          default:
            $vH = $state[5];
            if ($vH) {
              $tags = $vH[2];
              $tag_name = $vH[1];
              $marker = $caml_call1($state[25], $tag_name);
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
            $vI = $state[2];
            if ($vI) {
              $match__1 = $vI[1];
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
            $vJ = $state[3];
            if ($vJ) {
              $match__2 = $vJ[1];
              $tabs__0 = $match__2[1];
              $find = function($n, $param) use ($Not_found,$runtime) {
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
              $vK = $tabs__0[1];
              if ($vK) {
                $x = $vK[1];
                try {$vL = $find($insertion_point, $tabs__0[1]);$x__0 = $vL;}
                catch(\Throwable $vM) {
                  $vM = $caml_wrap_exception($vM);
                  if ($vM !== $Not_found) {
                    throw $runtime["caml_wrap_thrown_exception_reraise"]($vM) as \Throwable;
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
            $marker__0 = $caml_call1($state[24], $tag_name__0);
            $pp_output_string($state, $marker__0);
            $state[5] = Vector{0, $tag_name__0, $state[5]};
            return 0;
          }
      }
    };
    $advance_loop = function($state) use ($format_pp_token,$peek_queue,$pp_infinity,$take_queue) {
      for (;;) {
        $match = $peek_queue($state[28]);
        $size = $match[1];
        $len = $match[3];
        $tok = $match[2];
        $vz = $size < 0 ? 1 : (0);
        $vA = $vz
          ? (int) ($state[13] - $state[12]) < $state[9] ? 1 : (0)
          : ($vz);
        $vB = 1 - $vA;
        if ($vB) {
          $take_queue($state[28]);
          $size__0 = 0 <= $size ? $size : ($pp_infinity);
          $format_pp_token($state, $size__0, $tok);
          $state[12] = (int) ($len + $state[12]);
          continue;
        }
        return $vB;
      }
    };
    $advance_left = function($state) use ($Empty_queue,$advance_loop,$caml_wrap_exception,$runtime) {
      try {$vx = $advance_loop($state);return $vx;}
      catch(\Throwable $vy) {
        $vy = $caml_wrap_exception($vy);
        if ($vy === $Empty_queue) {return 0;}
        throw $runtime["caml_wrap_thrown_exception_reraise"]($vy) as \Throwable;
      }
    };
    $enqueue_advance = function($state, $tok) use ($advance_left,$pp_enqueue) {
      $pp_enqueue($state, $tok);
      return $advance_left($state);
    };
    $make_queue_elem = function($size, $tok, $len) {
      return Vector{0, $size, $tok, $len};
    };
    $enqueue_string_as = function($state, $size, $s) use ($enqueue_advance,$make_queue_elem) {
      return $enqueue_advance(
        $state,
        $make_queue_elem($size, Vector{0, $s}, $size)
      );
    };
    $enqueue_string = function($state, $s) use ($caml_ml_string_length,$enqueue_string_as) {
      $len = $caml_ml_string_length($s);
      return $enqueue_string_as($state, $len, $s);
    };
    $q_elem = $make_queue_elem(-1, $sG, 0);
    $scan_stack_bottom = Vector{0, Vector{0, -1, $q_elem}, 0};
    $clear_scan_stack = function($state) use ($scan_stack_bottom) {
      $state[1] = $scan_stack_bottom;
      return 0;
    };
    $set_size = function($state, $ty) use ($clear_scan_stack,$is_int) {
      $vt = $state[1];
      if ($vt) {
        $match = $vt[1];
        $queue_elem = $match[2];
        $left_tot = $match[1];
        $size = $queue_elem[1];
        $t = $vt[2];
        $tok = $queue_elem[2];
        if ($left_tot < $state[12]) {return $clear_scan_stack($state);}
        if (! $is_int($tok)) {
          switch($tok[0]) {
            // FALLTHROUGH
            case 3:
              $vv = 1 - $ty;
              if ($vv) {
                $queue_elem[1] = (int) ($state[13] + $size);
                $state[1] = $t;
                $vw = 0;
              }
              else {$vw = $vv;}
              return $vw;
            // FALLTHROUGH
            case 1:
            // FALLTHROUGH
            case 2:
              if ($ty) {
                $queue_elem[1] = (int) ($state[13] + $size);
                $state[1] = $t;
                $vu = 0;
              }
              else {$vu = $ty;}
              return $vu;
            }
        }
        return 0;
      }
      return 0;
    };
    $scan_push = function($state, $b, $tok) use ($pp_enqueue,$set_size) {
      $pp_enqueue($state, $tok);
      if ($b) {$set_size($state, 1);}
      $state[1] = Vector{0, Vector{0, $state[13], $tok}, $state[1]};
      return 0;
    };
    $pp_open_box_gen = function($state, $indent, $br_ty) use ($enqueue_string,$make_queue_elem,$scan_push) {
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
      $vs = $state[14] === $state[15] ? 1 : (0);
      return $vs ? $enqueue_string($state, $state[16]) : ($vs);
    };
    $pp_open_sys_box = function($state) use ($pp_open_box_gen) {
      return $pp_open_box_gen($state, 0, 3);
    };
    $pp_close_box = function($state, $param) use ($pp_enqueue,$set_size) {
      $vq = 1 < $state[14] ? 1 : (0);
      if ($vq) {
        if ($state[14] < $state[15]) {
          $pp_enqueue($state, Vector{0, 0, 1, 0});
          $set_size($state, 1);
          $set_size($state, 0);
        }
        $state[14] = (int) ($state[14] + -1);
        $vr = 0;
      }
      else {$vr = $vq;}
      return $vr;
    };
    $pp_open_tag = function($state, $tag_name) use ($caml_call1,$pp_enqueue) {
      if ($state[22]) {
        $state[4] = Vector{0, $tag_name, $state[4]};
        $caml_call1($state[26], $tag_name);
      }
      $vp = $state[23];
      return $vp
        ? $pp_enqueue($state, Vector{0, 0, Vector{5, $tag_name}, 0})
        : ($vp);
    };
    $pp_close_tag = function($state, $param) use ($caml_call1,$pp_enqueue) {
      if ($state[23]) {$pp_enqueue($state, Vector{0, 0, 5, 0});}
      $vm = $state[22];
      if ($vm) {
        $vn = $state[4];
        if ($vn) {
          $tags = $vn[2];
          $tag_name = $vn[1];
          $caml_call1($state[27], $tag_name);
          $state[4] = $tags;
          return 0;
        }
        $vo = 0;
      }
      else {$vo = $vm;}
      return $vo;
    };
    $pp_set_print_tags = function($state, $b) {$state[22] = $b;return 0;};
    $pp_set_mark_tags = function($state, $b) {$state[23] = $b;return 0;};
    $pp_get_print_tags = function($state, $param) {return $state[22];};
    $pp_get_mark_tags = function($state, $param) {return $state[23];};
    $pp_set_tags = function($state, $b) use ($pp_set_mark_tags,$pp_set_print_tags) {
      $pp_set_print_tags($state, $b);
      return $pp_set_mark_tags($state, $b);
    };
    $pp_get_formatter_tag_functions = function($state, $param) {
      return Vector{0, $state[24], $state[25], $state[26], $state[27]};
    };
    $pp_set_formatter_tag_functions = function($state, $param) {
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
    $pp_rinit = function($state) use ($clear_scan_stack,$pp_clear_queue,$pp_open_sys_box) {
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
    $clear_tag_stack = function($state) use ($List,$caml_call2,$pp_close_tag) {
      $vk = $state[4];
      $vl = function($param) use ($pp_close_tag,$state) {
        return $pp_close_tag($state, 0);
      };
      return $caml_call2($List[15], $vl, $vk);
    };
    $pp_flush_queue = function($state, $b) use ($advance_left,$clear_tag_stack,$pp_close_box,$pp_infinity,$pp_output_newline,$pp_rinit) {
      $clear_tag_stack($state);
      for (;;) {
        if (1 < $state[14]) {$pp_close_box($state, 0);continue;}
        $state[13] = $pp_infinity;
        $advance_left($state);
        if ($b) {$pp_output_newline($state);}
        return $pp_rinit($state);
      }
    };
    $pp_print_as_size = function($state, $size, $s) use ($enqueue_string_as) {
      $vj = $state[14] < $state[15] ? 1 : (0);
      return $vj ? $enqueue_string_as($state, $size, $s) : ($vj);
    };
    $pp_print_as = function($state, $isize, $s) use ($pp_print_as_size) {
      return $pp_print_as_size($state, $isize, $s);
    };
    $pp_print_string = function($state, $s) use ($caml_ml_string_length,$pp_print_as) {
      return $pp_print_as($state, $caml_ml_string_length($s), $s);
    };
    $pp_print_int = function($state, $i) use ($Pervasives,$caml_call1,$pp_print_string) {
      return $pp_print_string($state, $caml_call1($Pervasives[21], $i));
    };
    $pp_print_float = function($state, $f) use ($Pervasives,$caml_call1,$pp_print_string) {
      return $pp_print_string($state, $caml_call1($Pervasives[23], $f));
    };
    $pp_print_bool = function($state, $b) use ($Pervasives,$caml_call1,$pp_print_string) {
      return $pp_print_string($state, $caml_call1($Pervasives[18], $b));
    };
    $pp_print_char = function($state, $c) use ($String,$caml_call2,$pp_print_as) {
      return $pp_print_as($state, 1, $caml_call2($String[1], 1, $c));
    };
    $pp_open_hbox = function($state, $param) use ($pp_open_box_gen) {
      return $pp_open_box_gen($state, 0, 0);
    };
    $pp_open_vbox = function($state, $indent) use ($pp_open_box_gen) {
      return $pp_open_box_gen($state, $indent, 1);
    };
    $pp_open_hvbox = function($state, $indent) use ($pp_open_box_gen) {
      return $pp_open_box_gen($state, $indent, 2);
    };
    $pp_open_hovbox = function($state, $indent) use ($pp_open_box_gen) {
      return $pp_open_box_gen($state, $indent, 3);
    };
    $pp_open_box = function($state, $indent) use ($pp_open_box_gen) {
      return $pp_open_box_gen($state, $indent, 4);
    };
    $pp_print_newline = function($state, $param) use ($caml_call1,$pp_flush_queue) {
      $pp_flush_queue($state, 1);
      return $caml_call1($state[18], 0);
    };
    $pp_print_flush = function($state, $param) use ($caml_call1,$pp_flush_queue) {
      $pp_flush_queue($state, 0);
      return $caml_call1($state[18], 0);
    };
    $pp_force_newline = function($state, $param) use ($enqueue_advance,$make_queue_elem) {
      $vi = $state[14] < $state[15] ? 1 : (0);
      return $vi ? $enqueue_advance($state, $make_queue_elem(0, 3, 0)) : ($vi);
    };
    $pp_print_if_newline = function($state, $param) use ($enqueue_advance,$make_queue_elem) {
      $vh = $state[14] < $state[15] ? 1 : (0);
      return $vh ? $enqueue_advance($state, $make_queue_elem(0, 4, 0)) : ($vh);
    };
    $pp_print_break = function($state, $width, $offset) use ($make_queue_elem,$scan_push) {
      $vg = $state[14] < $state[15] ? 1 : (0);
      if ($vg) {
        $elem = $make_queue_elem(
          (int)
          -
          $state[13],
          Vector{1, $width, $offset},
          $width
        );
        return $scan_push($state, 1, $elem);
      }
      return $vg;
    };
    $pp_print_space = function($state, $param) use ($pp_print_break) {
      return $pp_print_break($state, 1, 0);
    };
    $pp_print_cut = function($state, $param) use ($pp_print_break) {
      return $pp_print_break($state, 0, 0);
    };
    $pp_open_tbox = function($state, $param) use ($enqueue_advance,$make_queue_elem) {
      $state[14] = (int) ($state[14] + 1);
      $vf = $state[14] < $state[15] ? 1 : (0);
      if ($vf) {
        $elem = $make_queue_elem(0, Vector{4, Vector{0, Vector{0, 0}}}, 0);
        return $enqueue_advance($state, $elem);
      }
      return $vf;
    };
    $pp_close_tbox = function($state, $param) use ($enqueue_advance,$make_queue_elem) {
      $vc = 1 < $state[14] ? 1 : (0);
      if ($vc) {
        $vd = $state[14] < $state[15] ? 1 : (0);
        if ($vd) {
          $elem = $make_queue_elem(0, 2, 0);
          $enqueue_advance($state, $elem);
          $state[14] = (int) ($state[14] + -1);
          $ve = 0;
        }
        else {$ve = $vd;}
      }
      else {$ve = $vc;}
      return $ve;
    };
    $pp_print_tbreak = function($state, $width, $offset) use ($make_queue_elem,$scan_push) {
      $vb = $state[14] < $state[15] ? 1 : (0);
      if ($vb) {
        $elem = $make_queue_elem(
          (int)
          -
          $state[13],
          Vector{2, $width, $offset},
          $width
        );
        return $scan_push($state, 1, $elem);
      }
      return $vb;
    };
    $pp_print_tab = function($state, $param) use ($pp_print_tbreak) {
      return $pp_print_tbreak($state, 0, 0);
    };
    $pp_set_tab = function($state, $param) use ($enqueue_advance,$make_queue_elem) {
      $va = $state[14] < $state[15] ? 1 : (0);
      if ($va) {
        $elem = $make_queue_elem(0, 0, 0);
        return $enqueue_advance($state, $elem);
      }
      return $va;
    };
    $pp_set_max_boxes = function($state, $n) {
      $u9 = 1 < $n ? 1 : (0);
      if ($u9) {
        $state[15] = $n;
        $u_ = 0;
      }
      else {$u_ = $u9;}
      return $u_;
    };
    $pp_get_max_boxes = function($state, $param) {return $state[15];};
    $pp_over_max_boxes = function($state, $param) {
      return $state[14] === $state[15] ? 1 : (0);
    };
    $pp_set_ellipsis_text = function($state, $s) {$state[16] = $s;return 0;};
    $pp_get_ellipsis_text = function($state, $param) {return $state[16];};
    $pp_limit = function($n) {return $n < 1000000010 ? $n : (1000000009);};
    $pp_set_min_space_left = function($state, $n) use ($pp_limit,$pp_rinit) {
      $u8 = 1 <= $n ? 1 : (0);
      if ($u8) {
        $n__0 = $pp_limit($n);
        $state[7] = $n__0;
        $state[8] = (int) ($state[6] - $state[7]);
        return $pp_rinit($state);
      }
      return $u8;
    };
    $pp_set_max_indent = function($state, $n) use ($pp_set_min_space_left) {
      return $pp_set_min_space_left($state, (int) ($state[6] - $n));
    };
    $pp_get_max_indent = function($state, $param) {return $state[8];};
    $pp_set_margin = function($state, $n) use ($Pervasives,$caml_call2,$pp_limit,$pp_set_max_indent) {
      $u6 = 1 <= $n ? 1 : (0);
      if ($u6) {
        $n__0 = $pp_limit($n);
        $state[6] = $n__0;
        if ($state[8] <= $state[6]) {
          $new_max_indent = $state[8];
        }
        else {
          $u7 = $caml_call2(
            $Pervasives[5],
            (int)
            ($state[6] - $state[7]),
            (int)
            ($state[6] / 2)
          );
          $new_max_indent = $caml_call2($Pervasives[5], $u7, 1);
        }
        return $pp_set_max_indent($state, $new_max_indent);
      }
      return $u6;
    };
    $pp_get_margin = function($state, $param) {return $state[6];};
    $pp_set_formatter_out_functions = function($state, $param) {
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
    $pp_get_formatter_out_functions = function($state, $param) {
      return Vector{
        0,
        $state[17],
        $state[18],
        $state[19],
        $state[20],
        $state[21]
      };
    };
    $pp_set_formatter_output_functions = function($state, $f, $g) {
      $state[17] = $f;
      $state[18] = $g;
      return 0;
    };
    $pp_get_formatter_output_functions = function($state, $param) {
      return Vector{0, $state[17], $state[18]};
    };
    $display_newline = function($state, $param) use ($caml_call3,$cst) {
      return $caml_call3($state[17], $cst, 0, 1);
    };
    $blank_line = $caml_call2($String[1], 80, 32);
    $display_blanks = function($state, $n) use ($blank_line,$caml_call3) {
      $n__0 = $n;
      for (;;) {
        $u5 = 0 < $n__0 ? 1 : (0);
        if ($u5) {
          if (80 < $n__0) {
            $caml_call3($state[17], $blank_line, 0, 80);
            $n__1 = (int) ($n__0 + -80);
            $n__0 = $n__1;
            continue;
          }
          return $caml_call3($state[17], $blank_line, 0, $n__0);
        }
        return $u5;
      }
    };
    $pp_set_formatter_out_channel = function($state, $oc) use ($Pervasives,$caml_call1,$display_blanks,$display_newline) {
      $state[17] = $caml_call1($Pervasives[57], $oc);
      $state[18] =
        function($param) use ($Pervasives,$caml_call1,$oc) {
          return $caml_call1($Pervasives[51], $oc);
        };
      $state[19] =
        function($u4) use ($display_newline,$state) {
          return $display_newline($state, $u4);
        };
      $state[20] =
        function($u3) use ($display_blanks,$state) {
          return $display_blanks($state, $u3);
        };
      $state[21] =
        function($u2) use ($display_blanks,$state) {
          return $display_blanks($state, $u2);
        };
      return 0;
    };
    $default_pp_mark_open_tag = function($s) use ($Pervasives,$caml_call2,$cst__0,$cst__1) {
      $u1 = $caml_call2($Pervasives[16], $s, $cst__0);
      return $caml_call2($Pervasives[16], $cst__1, $u1);
    };
    $default_pp_mark_close_tag = function($s) use ($Pervasives,$caml_call2,$cst__2,$cst__3) {
      $u0 = $caml_call2($Pervasives[16], $s, $cst__2);
      return $caml_call2($Pervasives[16], $cst__3, $u0);
    };
    $default_pp_print_open_tag = function($uZ) {return 0;};
    $default_pp_print_close_tag = function($uY) {return 0;};
    $pp_make_formatter = function($f, $g, $h, $i, $j) use ($Pervasives,$add_queue,$cst__4,$default_pp_mark_close_tag,$default_pp_mark_open_tag,$default_pp_print_close_tag,$default_pp_print_open_tag,$make_queue,$make_queue_elem,$sH,$scan_stack_bottom) {
      $pp_queue = $make_queue(0);
      $sys_tok = $make_queue_elem(-1, $sH, 0);
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
    $formatter_of_out_functions = function($out_funs) use ($pp_make_formatter) {
      return $pp_make_formatter(
        $out_funs[1],
        $out_funs[2],
        $out_funs[3],
        $out_funs[4],
        $out_funs[5]
      );
    };
    $make_formatter = function($output, $flush) use ($display_blanks,$display_newline,$pp_make_formatter) {
      $uQ = function($uX) {return 0;};
      $uR = function($uW) {return 0;};
      $ppf = $pp_make_formatter(
        $output,
        $flush,
        function($uV) {return 0;},
        $uR,
        $uQ
      );
      $ppf[19] =
        function($uU) use ($display_newline,$ppf) {
          return $display_newline($ppf, $uU);
        };
      $ppf[20] =
        function($uT) use ($display_blanks,$ppf) {
          return $display_blanks($ppf, $uT);
        };
      $ppf[21] =
        function($uS) use ($display_blanks,$ppf) {
          return $display_blanks($ppf, $uS);
        };
      return $ppf;
    };
    $formatter_of_out_channel = function($oc) use ($Pervasives,$caml_call1,$make_formatter) {
      $uP = function($param) use ($Pervasives,$caml_call1,$oc) {
        return $caml_call1($Pervasives[51], $oc);
      };
      return $make_formatter($caml_call1($Pervasives[57], $oc), $uP);
    };
    $formatter_of_buffer = function($b) use ($Buffer,$caml_call1,$make_formatter) {
      $uN = function($uO) {return 0;};
      return $make_formatter($caml_call1($Buffer[16], $b), $uN);
    };
    $pp_buffer_size = 512;
    $pp_make_buffer = function($param) use ($Buffer,$caml_call1,$pp_buffer_size) {
      return $caml_call1($Buffer[1], $pp_buffer_size);
    };
    $stdbuf = $pp_make_buffer(0);
    $std_formatter = $formatter_of_out_channel($Pervasives[27]);
    $err_formatter = $formatter_of_out_channel($Pervasives[28]);
    $str_formatter = $formatter_of_buffer($stdbuf);
    $flush_buffer_formatter = function($buf, $ppf) use ($Buffer,$caml_call1,$pp_flush_queue) {
      $pp_flush_queue($ppf, 0);
      $s = $caml_call1($Buffer[2], $buf);
      $caml_call1($Buffer[9], $buf);
      return $s;
    };
    $flush_str_formatter = function($param) use ($flush_buffer_formatter,$stdbuf,$str_formatter) {
      return $flush_buffer_formatter($stdbuf, $str_formatter);
    };
    $make_symbolic_output_buffer = function($param) {return Vector{0, 0};};
    $clear_symbolic_output_buffer = function($sob) {$sob[1] = 0;return 0;};
    $get_symbolic_output_buffer = function($sob) use ($List,$caml_call1) {
      return $caml_call1($List[9], $sob[1]);
    };
    $flush_symbolic_output_buffer = function($sob) use ($clear_symbolic_output_buffer,$get_symbolic_output_buffer) {
      $items = $get_symbolic_output_buffer($sob);
      $clear_symbolic_output_buffer($sob);
      return $items;
    };
    $add_symbolic_output_item = function($sob, $item) {
      $sob[1] = Vector{0, $item, $sob[1]};
      return 0;
    };
    $formatter_of_symbolic_output_buffer = function($sob) use ($String,$add_symbolic_output_item,$caml_call3,$pp_make_formatter) {
      $symbolic_flush = function($sob, $param) use ($add_symbolic_output_item) {
        return $add_symbolic_output_item($sob, 0);
      };
      $symbolic_newline = function($sob, $param) use ($add_symbolic_output_item) {
        return $add_symbolic_output_item($sob, 1);
      };
      $symbolic_string = function($sob, $s, $i, $n) use ($String,$add_symbolic_output_item,$caml_call3) {
        return $add_symbolic_output_item(
          $sob,
          Vector{0, $caml_call3($String[4], $s, $i, $n)}
        );
      };
      $symbolic_spaces = function($sob, $n) use ($add_symbolic_output_item) {
        return $add_symbolic_output_item($sob, Vector{1, $n});
      };
      $symbolic_indent = function($sob, $n) use ($add_symbolic_output_item) {
        return $add_symbolic_output_item($sob, Vector{2, $n});
      };
      $f = function($uK, $uL, $uM) use ($sob,$symbolic_string) {
        return $symbolic_string($sob, $uK, $uL, $uM);
      };
      $g = function($uJ) use ($sob,$symbolic_flush) {
        return $symbolic_flush($sob, $uJ);
      };
      $h = function($uI) use ($sob,$symbolic_newline) {
        return $symbolic_newline($sob, $uI);
      };
      $i = function($uH) use ($sob,$symbolic_spaces) {
        return $symbolic_spaces($sob, $uH);
      };
      $j = function($uG) use ($sob,$symbolic_indent) {
        return $symbolic_indent($sob, $uG);
      };
      return $pp_make_formatter($f, $g, $h, $i, $j);
    };
    $open_hbox = function($uF) use ($pp_open_hbox,$std_formatter) {
      return $pp_open_hbox($std_formatter, $uF);
    };
    $open_vbox = function($uE) use ($pp_open_vbox,$std_formatter) {
      return $pp_open_vbox($std_formatter, $uE);
    };
    $open_hvbox = function($uD) use ($pp_open_hvbox,$std_formatter) {
      return $pp_open_hvbox($std_formatter, $uD);
    };
    $open_hovbox = function($uC) use ($pp_open_hovbox,$std_formatter) {
      return $pp_open_hovbox($std_formatter, $uC);
    };
    $open_box = function($uB) use ($pp_open_box,$std_formatter) {
      return $pp_open_box($std_formatter, $uB);
    };
    $close_box = function($uA) use ($pp_close_box,$std_formatter) {
      return $pp_close_box($std_formatter, $uA);
    };
    $open_tag = function($uz) use ($pp_open_tag,$std_formatter) {
      return $pp_open_tag($std_formatter, $uz);
    };
    $close_tag = function($uy) use ($pp_close_tag,$std_formatter) {
      return $pp_close_tag($std_formatter, $uy);
    };
    $print_as = function($uw, $ux) use ($pp_print_as,$std_formatter) {
      return $pp_print_as($std_formatter, $uw, $ux);
    };
    $print_string = function($uv) use ($pp_print_string,$std_formatter) {
      return $pp_print_string($std_formatter, $uv);
    };
    $print_int = function($uu) use ($pp_print_int,$std_formatter) {
      return $pp_print_int($std_formatter, $uu);
    };
    $print_float = function($ut) use ($pp_print_float,$std_formatter) {
      return $pp_print_float($std_formatter, $ut);
    };
    $print_char = function($us) use ($pp_print_char,$std_formatter) {
      return $pp_print_char($std_formatter, $us);
    };
    $print_bool = function($ur) use ($pp_print_bool,$std_formatter) {
      return $pp_print_bool($std_formatter, $ur);
    };
    $print_break = function($up, $uq) use ($pp_print_break,$std_formatter) {
      return $pp_print_break($std_formatter, $up, $uq);
    };
    $print_cut = function($uo) use ($pp_print_cut,$std_formatter) {
      return $pp_print_cut($std_formatter, $uo);
    };
    $print_space = function($un) use ($pp_print_space,$std_formatter) {
      return $pp_print_space($std_formatter, $un);
    };
    $force_newline = function($um) use ($pp_force_newline,$std_formatter) {
      return $pp_force_newline($std_formatter, $um);
    };
    $print_flush = function($ul) use ($pp_print_flush,$std_formatter) {
      return $pp_print_flush($std_formatter, $ul);
    };
    $print_newline = function($uk) use ($pp_print_newline,$std_formatter) {
      return $pp_print_newline($std_formatter, $uk);
    };
    $print_if_newline = function($uj) use ($pp_print_if_newline,$std_formatter) {
      return $pp_print_if_newline($std_formatter, $uj);
    };
    $open_tbox = function($ui) use ($pp_open_tbox,$std_formatter) {
      return $pp_open_tbox($std_formatter, $ui);
    };
    $close_tbox = function($uh) use ($pp_close_tbox,$std_formatter) {
      return $pp_close_tbox($std_formatter, $uh);
    };
    $print_tbreak = function($uf, $ug) use ($pp_print_tbreak,$std_formatter) {
      return $pp_print_tbreak($std_formatter, $uf, $ug);
    };
    $set_tab = function($ue) use ($pp_set_tab,$std_formatter) {
      return $pp_set_tab($std_formatter, $ue);
    };
    $print_tab = function($ud) use ($pp_print_tab,$std_formatter) {
      return $pp_print_tab($std_formatter, $ud);
    };
    $set_margin = function($uc) use ($pp_set_margin,$std_formatter) {
      return $pp_set_margin($std_formatter, $uc);
    };
    $get_margin = function($ub) use ($pp_get_margin,$std_formatter) {
      return $pp_get_margin($std_formatter, $ub);
    };
    $set_max_indent = function($ua) use ($pp_set_max_indent,$std_formatter) {
      return $pp_set_max_indent($std_formatter, $ua);
    };
    $get_max_indent = function($t_) use ($pp_get_max_indent,$std_formatter) {
      return $pp_get_max_indent($std_formatter, $t_);
    };
    $set_max_boxes = function($t9) use ($pp_set_max_boxes,$std_formatter) {
      return $pp_set_max_boxes($std_formatter, $t9);
    };
    $get_max_boxes = function($t8) use ($pp_get_max_boxes,$std_formatter) {
      return $pp_get_max_boxes($std_formatter, $t8);
    };
    $over_max_boxes = function($t7) use ($pp_over_max_boxes,$std_formatter) {
      return $pp_over_max_boxes($std_formatter, $t7);
    };
    $set_ellipsis_text = function($t6) use ($pp_set_ellipsis_text,$std_formatter) {
      return $pp_set_ellipsis_text($std_formatter, $t6);
    };
    $get_ellipsis_text = function($t5) use ($pp_get_ellipsis_text,$std_formatter) {
      return $pp_get_ellipsis_text($std_formatter, $t5);
    };
    $set_formatter_out_channel = function($t4) use ($pp_set_formatter_out_channel,$std_formatter) {
      return $pp_set_formatter_out_channel($std_formatter, $t4);
    };
    $set_formatter_out_functions = function($t3) use ($pp_set_formatter_out_functions,$std_formatter) {
      return $pp_set_formatter_out_functions($std_formatter, $t3);
    };
    $get_formatter_out_functions = function($t2) use ($pp_get_formatter_out_functions,$std_formatter) {
      return $pp_get_formatter_out_functions($std_formatter, $t2);
    };
    $set_formatter_output_functions = function($t0, $t1) use ($pp_set_formatter_output_functions,$std_formatter) {
      return $pp_set_formatter_output_functions($std_formatter, $t0, $t1);
    };
    $get_formatter_output_functions = function($tZ) use ($pp_get_formatter_output_functions,$std_formatter) {
      return $pp_get_formatter_output_functions($std_formatter, $tZ);
    };
    $set_formatter_tag_functions = function($tY) use ($pp_set_formatter_tag_functions,$std_formatter) {
      return $pp_set_formatter_tag_functions($std_formatter, $tY);
    };
    $get_formatter_tag_functions = function($tX) use ($pp_get_formatter_tag_functions,$std_formatter) {
      return $pp_get_formatter_tag_functions($std_formatter, $tX);
    };
    $set_print_tags = function($tW) use ($pp_set_print_tags,$std_formatter) {
      return $pp_set_print_tags($std_formatter, $tW);
    };
    $get_print_tags = function($tV) use ($pp_get_print_tags,$std_formatter) {
      return $pp_get_print_tags($std_formatter, $tV);
    };
    $set_mark_tags = function($tU) use ($pp_set_mark_tags,$std_formatter) {
      return $pp_set_mark_tags($std_formatter, $tU);
    };
    $get_mark_tags = function($tT) use ($pp_get_mark_tags,$std_formatter) {
      return $pp_get_mark_tags($std_formatter, $tT);
    };
    $set_tags = function($tS) use ($pp_set_tags,$std_formatter) {
      return $pp_set_tags($std_formatter, $tS);
    };
    $pp_print_list = function($opt, $pp_v, $ppf, $param) use ($caml_call2,$pp_print_cut) {
      $opt__0 = $opt;
      $param__0 = $param;
      for (;;) {
        if ($opt__0) {
          $sth = $opt__0[1];
          $pp_sep = $sth;
        }
        else {$pp_sep = $pp_print_cut;}
        if ($param__0) {
          $tQ = $param__0[2];
          $tR = $param__0[1];
          if ($tQ) {
            $caml_call2($pp_v, $ppf, $tR);
            $caml_call2($pp_sep, $ppf, 0);
            $opt__1 = Vector{0, $pp_sep};
            $opt__0 = $opt__1;
            $param__0 = $tQ;
            continue;
          }
          return $caml_call2($pp_v, $ppf, $tR);
        }
        return 0;
      }
    };
    $pp_print_text = function($ppf, $s) use ($String,$caml_call3,$caml_ml_string_length,$pp_force_newline,$pp_print_space,$pp_print_string,$runtime) {
      $len = $caml_ml_string_length($s);
      $left = Vector{0, 0};
      $right = Vector{0, 0};
      $flush = function($param) use ($String,$caml_call3,$left,$pp_print_string,$ppf,$right,$s) {
        $pp_print_string(
          $ppf,
          $caml_call3($String[4], $s, $left[1], (int) ($right[1] - $left[1]))
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
        $tP = $left[1] !== $len ? 1 : (0);
        return $tP ? $flush(0) : ($tP);
      }
    };
    $compute_tag = function($output, $tag_acc) use ($Buffer,$caml_call1,$caml_call2,$caml_call3,$formatter_of_buffer,$pp_print_flush) {
      $buf = $caml_call1($Buffer[1], 16);
      $ppf = $formatter_of_buffer($buf);
      $caml_call2($output, $ppf, $tag_acc);
      $pp_print_flush($ppf, 0);
      $len = $caml_call1($Buffer[7], $buf);
      return 2 <= $len
        ? $caml_call3($Buffer[4], $buf, 1, (int) ($len + -2))
        : ($caml_call1($Buffer[2], $buf));
    };
    $output_formatting_lit = function($ppf, $fmting_lit) use ($is_int,$pp_close_box,$pp_close_tag,$pp_force_newline,$pp_print_break,$pp_print_char,$pp_print_flush,$pp_print_newline) {
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
    $output_acc->contents = function($ppf, $acc) use ($CamlinternalFormat,$Pervasives,$String,$caml_call1,$caml_call2,$compute_tag,$is_int,$output_acc,$output_formatting_lit,$pp_open_box_gen,$pp_open_tag,$pp_print_as_size,$pp_print_char,$pp_print_flush,$pp_print_string) {
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
            $to = $acc[2];
            $tp = $acc[1];
            if (0 === $to[0]) {
              $acc__0 = $to[1];
              $output_acc->contents($ppf, $tp);
              return $pp_open_tag(
                $ppf,
                $compute_tag($output_acc->contents, $acc__0)
              );
            }
            $acc__1 = $to[1];
            $output_acc->contents($ppf, $tp);
            $tq = $compute_tag($output_acc->contents, $acc__1);
            $match = $caml_call1($CamlinternalFormat[21], $tq);
            $bty = $match[2];
            $indent = $match[1];
            return $pp_open_box_gen($ppf, $indent, $bty);
          // FALLTHROUGH
          case 2:
            $tr = $acc[1];
            if ($is_int($tr)) {$switch__1 = 1;}
            else {
              if (0 === $tr[0]) {
                $tt = $tr[2];
                if ($is_int($tt)) {$switch__2 = 1;}
                else {
                  if (1 === $tt[0]) {
                    $tu = $acc[2];
                    $tv = $tt[2];
                    $tw = $tr[1];
                    $s__0 = $tu;
                    $size = $tv;
                    $p__1 = $tw;
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
              $ts = $acc[2];
              $s = $ts;
              $p__0 = $tr;
              $switch__0 = 2;
            }
            break;
          // FALLTHROUGH
          case 3:
            $tx = $acc[1];
            if ($is_int($tx)) {$switch__3 = 1;}
            else {
              if (0 === $tx[0]) {
                $tz = $tx[2];
                if ($is_int($tz)) {$switch__4 = 1;}
                else {
                  if (1 === $tz[0]) {
                    $tA = $acc[2];
                    $tB = $tz[2];
                    $tC = $tx[1];
                    $c__0 = $tA;
                    $size__0 = $tB;
                    $p__3 = $tC;
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
              $ty = $acc[2];
              $c = $ty;
              $p__2 = $tx;
              $switch__0 = 3;
            }
            break;
          // FALLTHROUGH
          case 4:
            $tD = $acc[1];
            if ($is_int($tD)) {$switch__5 = 1;}
            else {
              if (0 === $tD[0]) {
                $tF = $tD[2];
                if ($is_int($tF)) {$switch__6 = 1;}
                else {
                  if (1 === $tF[0]) {
                    $tG = $acc[2];
                    $tH = $tF[2];
                    $tI = $tD[1];
                    $s__0 = $tG;
                    $size = $tH;
                    $p__1 = $tI;
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
              $tE = $acc[2];
              $s = $tE;
              $p__0 = $tD;
              $switch__0 = 2;
            }
            break;
          // FALLTHROUGH
          case 5:
            $tJ = $acc[1];
            if ($is_int($tJ)) {$switch__7 = 1;}
            else {
              if (0 === $tJ[0]) {
                $tL = $tJ[2];
                if ($is_int($tL)) {$switch__8 = 1;}
                else {
                  if (1 === $tL[0]) {
                    $tM = $acc[2];
                    $tN = $tL[2];
                    $tO = $tJ[1];
                    $c__0 = $tM;
                    $size__0 = $tN;
                    $p__3 = $tO;
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
              $tK = $acc[2];
              $c = $tK;
              $p__2 = $tJ;
              $switch__0 = 3;
            }
            break;
          // FALLTHROUGH
          case 6:
            $f__0 = $acc[2];
            $p__4 = $acc[1];
            $output_acc->contents($ppf, $p__4);
            return $caml_call1($f__0, $ppf);
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
            return $caml_call1($Pervasives[1], $msg);
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
            $caml_call2($String[1], 1, $c__0)
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
    $strput_acc->contents = function($ppf, $acc) use ($CamlinternalFormat,$Pervasives,$String,$caml_call1,$caml_call2,$compute_tag,$is_int,$output_formatting_lit,$pp_open_box_gen,$pp_open_tag,$pp_print_as_size,$pp_print_char,$pp_print_flush,$pp_print_string,$strput_acc) {
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
            $sW = $acc[2];
            $sX = $acc[1];
            if (0 === $sW[0]) {
              $acc__0 = $sW[1];
              $strput_acc->contents($ppf, $sX);
              return $pp_open_tag(
                $ppf,
                $compute_tag($strput_acc->contents, $acc__0)
              );
            }
            $acc__1 = $sW[1];
            $strput_acc->contents($ppf, $sX);
            $sY = $compute_tag($strput_acc->contents, $acc__1);
            $match = $caml_call1($CamlinternalFormat[21], $sY);
            $bty = $match[2];
            $indent = $match[1];
            return $pp_open_box_gen($ppf, $indent, $bty);
          // FALLTHROUGH
          case 2:
            $sZ = $acc[1];
            if ($is_int($sZ)) {$switch__1 = 1;}
            else {
              if (0 === $sZ[0]) {
                $s1 = $sZ[2];
                if ($is_int($s1)) {$switch__2 = 1;}
                else {
                  if (1 === $s1[0]) {
                    $s2 = $acc[2];
                    $s3 = $s1[2];
                    $s4 = $sZ[1];
                    $s__0 = $s2;
                    $size = $s3;
                    $p__1 = $s4;
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
              $s0 = $acc[2];
              $s = $s0;
              $p__0 = $sZ;
              $switch__0 = 2;
            }
            break;
          // FALLTHROUGH
          case 3:
            $s5 = $acc[1];
            if ($is_int($s5)) {$switch__3 = 1;}
            else {
              if (0 === $s5[0]) {
                $s7 = $s5[2];
                if ($is_int($s7)) {$switch__4 = 1;}
                else {
                  if (1 === $s7[0]) {
                    $s8 = $acc[2];
                    $s9 = $s7[2];
                    $s_ = $s5[1];
                    $c__0 = $s8;
                    $size__0 = $s9;
                    $p__3 = $s_;
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
              $s6 = $acc[2];
              $c = $s6;
              $p__2 = $s5;
              $switch__0 = 3;
            }
            break;
          // FALLTHROUGH
          case 4:
            $ta = $acc[1];
            if ($is_int($ta)) {$switch__5 = 1;}
            else {
              if (0 === $ta[0]) {
                $tc = $ta[2];
                if ($is_int($tc)) {$switch__6 = 1;}
                else {
                  if (1 === $tc[0]) {
                    $td = $acc[2];
                    $te = $tc[2];
                    $tf = $ta[1];
                    $s__0 = $td;
                    $size = $te;
                    $p__1 = $tf;
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
              $tb = $acc[2];
              $s = $tb;
              $p__0 = $ta;
              $switch__0 = 2;
            }
            break;
          // FALLTHROUGH
          case 5:
            $tg = $acc[1];
            if ($is_int($tg)) {$switch__7 = 1;}
            else {
              if (0 === $tg[0]) {
                $ti = $tg[2];
                if ($is_int($ti)) {$switch__8 = 1;}
                else {
                  if (1 === $ti[0]) {
                    $tj = $acc[2];
                    $tk = $ti[2];
                    $tl = $tg[1];
                    $c__0 = $tj;
                    $size__0 = $tk;
                    $p__3 = $tl;
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
              $th = $acc[2];
              $c = $th;
              $p__2 = $tg;
              $switch__0 = 3;
            }
            break;
          // FALLTHROUGH
          case 6:
            $tm = $acc[1];
            if (! $is_int($tm) && 0 === $tm[0]) {
              $tn = $tm[2];
              if (! $is_int($tn) && 1 === $tn[0]) {
                $f__1 = $acc[2];
                $size__1 = $tn[2];
                $p__4 = $tm[1];
                $strput_acc->contents($ppf, $p__4);
                return $pp_print_as_size($ppf, $size__1, $caml_call1($f__1, 0)
                );
              }
            }
            $f__0 = $acc[2];
            $strput_acc->contents($ppf, $tm);
            return $pp_print_string($ppf, $caml_call1($f__0, 0));
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
            return $caml_call1($Pervasives[1], $msg);
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
            $caml_call2($String[1], 1, $c__0)
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
    $kfprintf = function($k, $ppf, $param) use ($CamlinternalFormat,$caml_call1,$caml_call4,$output_acc) {
      $fmt = $param[1];
      $sU = 0;
      $sV = function($ppf, $acc) use ($caml_call1,$k,$output_acc) {
        $output_acc->contents($ppf, $acc);
        return $caml_call1($k, $ppf);
      };
      return $caml_call4($CamlinternalFormat[7], $sV, $ppf, $sU, $fmt);
    };
    $ikfprintf = function($k, $ppf, $param) use ($CamlinternalFormat,$caml_call3) {
      $fmt = $param[1];
      return $caml_call3($CamlinternalFormat[8], $k, $ppf, $fmt);
    };
    $fprintf = function($ppf) use ($kfprintf) {
      $sR = function($sT) {return 0;};
      return function($sS) use ($kfprintf,$ppf,$sR) {
        return $kfprintf($sR, $ppf, $sS);
      };
    };
    $ifprintf = function($ppf) use ($ikfprintf) {
      $sO = function($sQ) {return 0;};
      return function($sP) use ($ikfprintf,$ppf,$sO) {
        return $ikfprintf($sO, $ppf, $sP);
      };
    };
    $printf = function($fmt) use ($caml_call1,$fprintf,$std_formatter) {
      return $caml_call1($fprintf($std_formatter), $fmt);
    };
    $eprintf = function($fmt) use ($caml_call1,$err_formatter,$fprintf) {
      return $caml_call1($fprintf($err_formatter), $fmt);
    };
    $ksprintf = function($k, $param) use ($CamlinternalFormat,$caml_call1,$caml_call4,$flush_buffer_formatter,$formatter_of_buffer,$pp_make_buffer,$strput_acc) {
      $fmt = $param[1];
      $b = $pp_make_buffer(0);
      $ppf = $formatter_of_buffer($b);
      $k__0 = function($param, $acc) use ($b,$caml_call1,$flush_buffer_formatter,$k,$ppf,$strput_acc) {
        $strput_acc->contents($ppf, $acc);
        return $caml_call1($k, $flush_buffer_formatter($b, $ppf));
      };
      return $caml_call4($CamlinternalFormat[7], $k__0, 0, 0, $fmt);
    };
    $sprintf = function($fmt) use ($ksprintf) {
      return $ksprintf(function($s) {return $s;}, $fmt);
    };
    $kasprintf = function($k, $param) use ($CamlinternalFormat,$caml_call1,$caml_call4,$flush_buffer_formatter,$formatter_of_buffer,$output_acc,$pp_make_buffer) {
      $fmt = $param[1];
      $b = $pp_make_buffer(0);
      $ppf = $formatter_of_buffer($b);
      $k__0 = function($ppf, $acc) use ($b,$caml_call1,$flush_buffer_formatter,$k,$output_acc) {
        $output_acc->contents($ppf, $acc);
        return $caml_call1($k, $flush_buffer_formatter($b, $ppf));
      };
      return $caml_call4($CamlinternalFormat[7], $k__0, $ppf, 0, $fmt);
    };
    $asprintf = function($fmt) use ($kasprintf) {
      return $kasprintf(function($s) {return $s;}, $fmt);
    };
    
    $caml_call1($Pervasives[88], $print_flush);
    
    $pp_set_all_formatter_output_functions = function($state, $f, $g, $h, $i) use ($pp_set_formatter_output_functions) {
      $pp_set_formatter_output_functions($state, $f, $g);
      $state[19] = $h;
      $state[20] = $i;
      return 0;
    };
    $pp_get_all_formatter_output_functions = function($state, $param) {
      return Vector{0, $state[17], $state[18], $state[19], $state[20]};
    };
    $set_all_formatter_output_functions = function($sK, $sL, $sM, $sN) use ($pp_set_all_formatter_output_functions,$std_formatter) {
      return $pp_set_all_formatter_output_functions(
        $std_formatter,
        $sK,
        $sL,
        $sM,
        $sN
      );
    };
    $get_all_formatter_output_functions = function($sJ) use ($pp_get_all_formatter_output_functions,$std_formatter) {
      return $pp_get_all_formatter_output_functions($std_formatter, $sJ);
    };
    $bprintf = function($b, $param) use ($CamlinternalFormat,$caml_call4,$formatter_of_buffer,$output_acc,$pp_flush_queue) {
      $fmt = $param[1];
      $k = function($ppf, $acc) use ($output_acc,$pp_flush_queue) {
        $output_acc->contents($ppf, $acc);
        return $pp_flush_queue($ppf, 0);
      };
      $sI = $formatter_of_buffer($b);
      return $caml_call4($CamlinternalFormat[7], $k, $sI, 0, $fmt);
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