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
      return $caml_arity_test($f) == 1
        ? $f($a0)
        : ($runtime["caml_call_gen"]($f, varray[$a0]));
    };
    $caml_call2 = function($f, $a0, $a1) use ($caml_arity_test,$runtime) {
      return $caml_arity_test($f) == 2
        ? $f($a0, $a1)
        : ($runtime["caml_call_gen"]($f, varray[$a0,$a1]));
    };
    $caml_call3 = function($f, $a0, $a1, $a2) use ($caml_arity_test,$runtime) {
      return $caml_arity_test($f) == 3
        ? $f($a0, $a1, $a2)
        : ($runtime["caml_call_gen"]($f, varray[$a0,$a1,$a2]));
    };
    $caml_call4 = function($f, $a0, $a1, $a2, $a3) use ($caml_arity_test,$runtime) {
      return $caml_arity_test($f) == 4
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
    $sG = R(3, 0, 3);
    $sF = R(0, $caml_new_string(""));
    $make_queue = function($param) {return V(0, 0, 0);};
    $clear_queue = function($q) {$q[1] = 0;$q[2] = 0;return 0;};
    $add_queue = function($x, $q) {
      $c = V(0, $x, 0);
      $vR = $q[1];
      return $vR
        ? ($q[1] = $c) || true
         ? ($vR[2] = $c) || true ? 0 : (0)
         : (($vR[2] = $c) || true ? 0 : (0))
        : (($q[1] = $c) || true
         ? ($q[2] = $c) || true ? 0 : (0)
         : (($q[2] = $c) || true ? 0 : (0)));
    };
    $Empty_queue = V(
      248,
      $cst_Format_Empty_queue,
      $runtime["caml_fresh_oo_id"](0)
    );
    $peek_queue = function($param) use ($Empty_queue,$runtime) {
      $vQ = $param[2];
      if ($vQ) {$x = $vQ[1];return $x;}
      throw $runtime["caml_wrap_thrown_exception"]($Empty_queue);
    };
    $take_queue = function($q) use ($Empty_queue,$runtime) {
      $vP = $q[2];
      if ($vP) {
        $x = $vP[1];
        $tl = $vP[2];
        $q[2] = $tl;
        if (0 === $tl) {$q[1] = 0;}
        return $x;
      }
      throw $runtime["caml_wrap_thrown_exception"]($Empty_queue);
    };
    $pp_enqueue = function($state, $token) use ($add_queue) {
      $len = $token[3];
      $state[13] = $state[13] + $len | 0;
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
      $indent = ($state[6] - $width | 0) + $offset | 0;
      $real_indent = $caml_call2($Pervasives[4], $state[8], $indent);
      $state[10] = $real_indent;
      $state[9] = $state[6] - $state[10] | 0;
      return $pp_output_indent($state, $state[10]);
    };
    $break_line = function($state, $width) use ($break_new_line) {
      return $break_new_line($state, 0, $width);
    };
    $break_same_line = function($state, $width) use ($pp_output_spaces) {
      $state[9] = $state[9] - $width | 0;
      return $pp_output_spaces($state, $width);
    };
    $pp_force_break_line = function($state) use ($break_line,$pp_output_newline) {
      $vM = $state[2];
      if ($vM) {
        $match = $vM[1];
        $width = $match[2];
        $bl_ty = $match[1];
        $vN = $state[9] < $width ? 1 : (0);
        if ($vN) {
          if (0 !== $bl_ty) {
            return 5 <= $bl_ty ? 0 : ($break_line($state, $width));
          }
          $vO = 0;
        }
        else {$vO = $vN;}
        return $vO;
      }
      return $pp_output_newline($state);
    };
    $pp_skip_token = function($state) use ($take_queue) {
      $match = $take_queue($state[28]);
      $size = $match[1];
      $len = $match[3];
      $state[12] = $state[12] - $len | 0;
      $state[9] = $state[9] + $size | 0;
      return 0;
    };
    $format_pp_token = function($state, $size, $param) use ($Not_found,$add_tab,$break_line,$break_new_line,$break_same_line,$caml_call1,$caml_wrap_exception,$is_int,$pp_force_break_line,$pp_output_newline,$pp_output_string,$pp_skip_token,$runtime) {
      if ($is_int($param)) {
        switch($param) {
          // FALLTHROUGH
          case 0:
            $vB = $state[3];
            if ($vB) {
              $match = $vB[1];
              $tabs = $match[1];
              $_ = $add_tab->contents =
                function($n, $ls) use ($add_tab,$runtime) {
                  if ($ls) {
                    $l = $ls[2];
                    $x = $ls[1];
                    return $runtime["caml_lessthan"]($n, $x)
                      ? V(0, $n, $ls)
                      : (V(0, $x, $add_tab->contents($n, $l)));
                  }
                  return V(0, $n, 0);
                };
              $tabs[1] =
                $add_tab->contents($state[6] - $state[9] | 0, $tabs[1]);
              return 0;
            }
            return 0;
          // FALLTHROUGH
          case 1:
            $vC = $state[2];
            if ($vC) {$ls = $vC[2];$state[2] = $ls;return 0;}
            return 0;
          // FALLTHROUGH
          case 2:
            $vD = $state[3];
            if ($vD) {$ls__0 = $vD[2];$state[3] = $ls__0;return 0;}
            return 0;
          // FALLTHROUGH
          case 3:
            $vE = $state[2];
            if ($vE) {
              $match__0 = $vE[1];
              $width = $match__0[2];
              return $break_line($state, $width);
            }
            return $pp_output_newline($state);
          // FALLTHROUGH
          case 4:
            $vF = $state[10] !== ($state[6] - $state[9] | 0) ? 1 : (0);
            return $vF ? $pp_skip_token($state) : ($vF);
          // FALLTHROUGH
          default:
            $vG = $state[5];
            if ($vG) {
              $tags = $vG[2];
              $tag_name = $vG[1];
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
            $state[9] = $state[9] - $size | 0;
            $pp_output_string($state, $s);
            $state[11] = 0;
            return 0;
          // FALLTHROUGH
          case 1:
            $off = $param[2];
            $n = $param[1];
            $vH = $state[2];
            if ($vH) {
              $match__1 = $vH[1];
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
                     : ((($state[6] - $width__0 | 0) + $off | 0) < $state[10]
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
            $insertion_point = $state[6] - $state[9] | 0;
            $vI = $state[3];
            if ($vI) {
              $match__2 = $vI[1];
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
                  throw $runtime["caml_wrap_thrown_exception"]($Not_found);
                }
              };
              $vJ = $tabs__0[1];
              if ($vJ) {
                $x = $vJ[1];
                try {$vK = $find($insertion_point, $tabs__0[1]);$x__0 = $vK;}
                catch(\Throwable $vL) {
                  $vL = $caml_wrap_exception($vL);
                  if ($vL !== $Not_found) {
                    throw $runtime["caml_wrap_thrown_exception_reraise"]($vL);
                  }
                  $x__0 = $x;
                }
                $tab = $x__0;
              }
              else {$tab = $insertion_point;}
              $offset = $tab - $insertion_point | 0;
              return 0 <= $offset
                ? $break_same_line($state, $offset + $n__0 | 0)
                : ($break_new_line($state, $tab + $off__0 | 0, $state[6]));
            }
            return 0;
          // FALLTHROUGH
          case 3:
            $ty__0 = $param[2];
            $off__1 = $param[1];
            $insertion_point__0 = $state[6] - $state[9] | 0;
            if ($state[8] < $insertion_point__0) {$pp_force_break_line($state);}
            $offset__0 = $state[9] - $off__1 | 0;
            $bl_type = 1 === $ty__0 ? 1 : ($state[9] < $size ? $ty__0 : (5));
            $state[2] = V(0, V(0, $bl_type, $offset__0), $state[2]);
            return 0;
          // FALLTHROUGH
          case 4:
            $tbox = $param[1];
            $state[3] = V(0, $tbox, $state[3]);
            return 0;
          // FALLTHROUGH
          default:
            $tag_name__0 = $param[1];
            $marker__0 = $caml_call1($state[24], $tag_name__0);
            $pp_output_string($state, $marker__0);
            $state[5] = V(0, $tag_name__0, $state[5]);
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
        $vy = $size < 0 ? 1 : (0);
        $vz = $vy
          ? ($state[13] - $state[12] | 0) < $state[9] ? 1 : (0)
          : ($vy);
        $vA = 1 - $vz;
        if ($vA) {
          $take_queue($state[28]);
          $size__0 = 0 <= $size ? $size : ($pp_infinity);
          $format_pp_token($state, $size__0, $tok);
          $state[12] = $len + $state[12] | 0;
          continue;
        }
        return $vA;
      }
    };
    $advance_left = function($state) use ($Empty_queue,$advance_loop,$caml_wrap_exception,$runtime) {
      try {$vw = $advance_loop($state);return $vw;}
      catch(\Throwable $vx) {
        $vx = $caml_wrap_exception($vx);
        if ($vx === $Empty_queue) {return 0;}
        throw $runtime["caml_wrap_thrown_exception_reraise"]($vx);
      }
    };
    $enqueue_advance = function($state, $tok) use ($advance_left,$pp_enqueue) {
      $pp_enqueue($state, $tok);
      return $advance_left($state);
    };
    $make_queue_elem = function($size, $tok, $len) {
      return V(0, $size, $tok, $len);
    };
    $enqueue_string_as = function($state, $size, $s) use ($enqueue_advance,$make_queue_elem) {
      return $enqueue_advance($state, $make_queue_elem($size, V(0, $s), $size)
      );
    };
    $enqueue_string = function($state, $s) use ($caml_ml_string_length,$enqueue_string_as) {
      $len = $caml_ml_string_length($s);
      return $enqueue_string_as($state, $len, $s);
    };
    $q_elem = $make_queue_elem(-1, $sF, 0);
    $scan_stack_bottom = V(0, V(0, -1, $q_elem), 0);
    $clear_scan_stack = function($state) use ($scan_stack_bottom) {
      $state[1] = $scan_stack_bottom;
      return 0;
    };
    $set_size = function($state, $ty) use ($clear_scan_stack,$is_int) {
      $vs = $state[1];
      if ($vs) {
        $match = $vs[1];
        $queue_elem = $match[2];
        $left_tot = $match[1];
        $size = $queue_elem[1];
        $t = $vs[2];
        $tok = $queue_elem[2];
        if ($left_tot < $state[12]) {return $clear_scan_stack($state);}
        if (! $is_int($tok)) {
          switch($tok[0]) {
            // FALLTHROUGH
            case 3:
              $vu = 1 - $ty;
              $vv = $vu
                ? ($queue_elem[1] = $state[13] + $size | 0) || true
                 ? ($state[1] = $t) || true ? 0 : (0)
                 : (($state[1] = $t) || true ? 0 : (0))
                : ($vu);
              return $vv;
            // FALLTHROUGH
            case 1:
            // FALLTHROUGH
            case 2:
              $vt = $ty
                ? ($queue_elem[1] = $state[13] + $size | 0) || true
                 ? ($state[1] = $t) || true ? 0 : (0)
                 : (($state[1] = $t) || true ? 0 : (0))
                : ($ty);
              return $vt;
            }
        }
        return 0;
      }
      return 0;
    };
    $scan_push = function($state, $b, $tok) use ($pp_enqueue,$set_size) {
      $pp_enqueue($state, $tok);
      if ($b) {$set_size($state, 1);}
      $state[1] = V(0, V(0, $state[13], $tok), $state[1]);
      return 0;
    };
    $pp_open_box_gen = function($state, $indent, $br_ty) use ($enqueue_string,$make_queue_elem,$scan_push) {
      $state[14] = $state[14] + 1 | 0;
      if ($state[14] < $state[15]) {
        $elem = $make_queue_elem(- $state[13] | 0, V(3, $indent, $br_ty), 0);
        return $scan_push($state, 0, $elem);
      }
      $vr = $state[14] === $state[15] ? 1 : (0);
      return $vr ? $enqueue_string($state, $state[16]) : ($vr);
    };
    $pp_open_sys_box = function($state) use ($pp_open_box_gen) {
      return $pp_open_box_gen($state, 0, 3);
    };
    $pp_close_box = function($state, $param) use ($pp_enqueue,$set_size) {
      $vp = 1 < $state[14] ? 1 : (0);
      if ($vp) {
        if ($state[14] < $state[15]) {
          $pp_enqueue($state, V(0, 0, 1, 0));
          $set_size($state, 1);
          $set_size($state, 0);
        }
        $state[14] = $state[14] + -1 | 0;
        $vq = 0;
      }
      else {$vq = $vp;}
      return $vq;
    };
    $pp_open_tag = function($state, $tag_name) use ($caml_call1,$pp_enqueue) {
      if ($state[22]) {
        $state[4] = V(0, $tag_name, $state[4]);
        $caml_call1($state[26], $tag_name);
      }
      $vo = $state[23];
      return $vo ? $pp_enqueue($state, V(0, 0, V(5, $tag_name), 0)) : ($vo);
    };
    $pp_close_tag = function($state, $param) use ($caml_call1,$pp_enqueue) {
      if ($state[23]) {$pp_enqueue($state, V(0, 0, 5, 0));}
      $vl = $state[22];
      if ($vl) {
        $vm = $state[4];
        if ($vm) {
          $tags = $vm[2];
          $tag_name = $vm[1];
          $caml_call1($state[27], $tag_name);
          $state[4] = $tags;
          return 0;
        }
        $vn = 0;
      }
      else {$vn = $vl;}
      return $vn;
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
      return V(0, $state[24], $state[25], $state[26], $state[27]);
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
      $vj = $state[4];
      $vk = function($param) use ($pp_close_tag,$state) {
        return $pp_close_tag($state, 0);
      };
      return $caml_call2($List[15], $vk, $vj);
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
      $vi = $state[14] < $state[15] ? 1 : (0);
      return $vi ? $enqueue_string_as($state, $size, $s) : ($vi);
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
      $vh = $state[14] < $state[15] ? 1 : (0);
      return $vh ? $enqueue_advance($state, $make_queue_elem(0, 3, 0)) : ($vh);
    };
    $pp_print_if_newline = function($state, $param) use ($enqueue_advance,$make_queue_elem) {
      $vg = $state[14] < $state[15] ? 1 : (0);
      return $vg ? $enqueue_advance($state, $make_queue_elem(0, 4, 0)) : ($vg);
    };
    $pp_print_break = function($state, $width, $offset) use ($make_queue_elem,$scan_push) {
      $vf = $state[14] < $state[15] ? 1 : (0);
      if ($vf) {
        $elem = $make_queue_elem(
          -
          $state[13] | 0,
          V(1, $width, $offset),
          $width
        );
        return $scan_push($state, 1, $elem);
      }
      return $vf;
    };
    $pp_print_space = function($state, $param) use ($pp_print_break) {
      return $pp_print_break($state, 1, 0);
    };
    $pp_print_cut = function($state, $param) use ($pp_print_break) {
      return $pp_print_break($state, 0, 0);
    };
    $pp_open_tbox = function($state, $param) use ($enqueue_advance,$make_queue_elem) {
      $state[14] = $state[14] + 1 | 0;
      $ve = $state[14] < $state[15] ? 1 : (0);
      if ($ve) {
        $elem = $make_queue_elem(0, V(4, V(0, V(0, 0))), 0);
        return $enqueue_advance($state, $elem);
      }
      return $ve;
    };
    $pp_close_tbox = function($state, $param) use ($enqueue_advance,$make_queue_elem) {
      $vb = 1 < $state[14] ? 1 : (0);
      if ($vb) {
        $vc = $state[14] < $state[15] ? 1 : (0);
        if ($vc) {
          $elem = $make_queue_elem(0, 2, 0);
          $enqueue_advance($state, $elem);
          $state[14] = $state[14] + -1 | 0;
          $vd = 0;
        }
        else {$vd = $vc;}
      }
      else {$vd = $vb;}
      return $vd;
    };
    $pp_print_tbreak = function($state, $width, $offset) use ($make_queue_elem,$scan_push) {
      $va = $state[14] < $state[15] ? 1 : (0);
      if ($va) {
        $elem = $make_queue_elem(
          -
          $state[13] | 0,
          V(2, $width, $offset),
          $width
        );
        return $scan_push($state, 1, $elem);
      }
      return $va;
    };
    $pp_print_tab = function($state, $param) use ($pp_print_tbreak) {
      return $pp_print_tbreak($state, 0, 0);
    };
    $pp_set_tab = function($state, $param) use ($enqueue_advance,$make_queue_elem) {
      $u_ = $state[14] < $state[15] ? 1 : (0);
      if ($u_) {
        $elem = $make_queue_elem(0, 0, 0);
        return $enqueue_advance($state, $elem);
      }
      return $u_;
    };
    $pp_set_max_boxes = function($state, $n) {
      $u8 = 1 < $n ? 1 : (0);
      $u9 = $u8 ? ($state[15] = $n) || true ? 0 : (0) : ($u8);
      return $u9;
    };
    $pp_get_max_boxes = function($state, $param) {return $state[15];};
    $pp_over_max_boxes = function($state, $param) {
      return $state[14] === $state[15] ? 1 : (0);
    };
    $pp_set_ellipsis_text = function($state, $s) {$state[16] = $s;return 0;};
    $pp_get_ellipsis_text = function($state, $param) {return $state[16];};
    $pp_limit = function($n) {return $n < 1000000010 ? $n : (1000000009);};
    $pp_set_min_space_left = function($state, $n) use ($pp_limit,$pp_rinit) {
      $u7 = 1 <= $n ? 1 : (0);
      if ($u7) {
        $n__0 = $pp_limit($n);
        $state[7] = $n__0;
        $state[8] = $state[6] - $state[7] | 0;
        return $pp_rinit($state);
      }
      return $u7;
    };
    $pp_set_max_indent = function($state, $n) use ($pp_set_min_space_left) {
      return $pp_set_min_space_left($state, $state[6] - $n | 0);
    };
    $pp_get_max_indent = function($state, $param) {return $state[8];};
    $pp_set_margin = function($state, $n) use ($Pervasives,$caml_call2,$pp_limit,$pp_set_max_indent) {
      $u5 = 1 <= $n ? 1 : (0);
      if ($u5) {
        $n__0 = $pp_limit($n);
        $state[6] = $n__0;
        if ($state[8] <= $state[6]) {
          $new_max_indent = $state[8];
        }
        else {
          $u6 = $caml_call2(
            $Pervasives[5],
            $state[6] -
              $state[7] | 0,
            $state[6] / 2 |
              0
          );
          $new_max_indent = $caml_call2($Pervasives[5], $u6, 1);
        }
        return $pp_set_max_indent($state, $new_max_indent);
      }
      return $u5;
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
      return V(0, $state[17], $state[18], $state[19], $state[20], $state[21]);
    };
    $pp_set_formatter_output_functions = function($state, $f, $g) {
      $state[17] = $f;
      $state[18] = $g;
      return 0;
    };
    $pp_get_formatter_output_functions = function($state, $param) {
      return V(0, $state[17], $state[18]);
    };
    $display_newline = function($state, $param) use ($caml_call3,$cst) {
      return $caml_call3($state[17], $cst, 0, 1);
    };
    $blank_line = $caml_call2($String[1], 80, 32);
    $display_blanks = function($state, $n) use ($blank_line,$caml_call3) {
      $n__0 = $n;
      for (;;) {
        $u4 = 0 < $n__0 ? 1 : (0);
        if ($u4) {
          if (80 < $n__0) {
            $caml_call3($state[17], $blank_line, 0, 80);
            $n__1 = $n__0 + -80 | 0;
            $n__0 = $n__1;
            continue;
          }
          return $caml_call3($state[17], $blank_line, 0, $n__0);
        }
        return $u4;
      }
    };
    $pp_set_formatter_out_channel = function($state, $oc) use ($Pervasives,$caml_call1,$display_blanks,$display_newline) {
      $state[17] = $caml_call1($Pervasives[57], $oc);
      $state[18] =
        function($param) use ($Pervasives,$caml_call1,$oc) {
          return $caml_call1($Pervasives[51], $oc);
        };
      $state[19] =
        function($u3) use ($display_newline,$state) {
          return $display_newline($state, $u3);
        };
      $state[20] =
        function($u2) use ($display_blanks,$state) {
          return $display_blanks($state, $u2);
        };
      $state[21] =
        function($u1) use ($display_blanks,$state) {
          return $display_blanks($state, $u1);
        };
      return 0;
    };
    $default_pp_mark_open_tag = function($s) use ($Pervasives,$caml_call2,$cst__0,$cst__1) {
      $u0 = $caml_call2($Pervasives[16], $s, $cst__0);
      return $caml_call2($Pervasives[16], $cst__1, $u0);
    };
    $default_pp_mark_close_tag = function($s) use ($Pervasives,$caml_call2,$cst__2,$cst__3) {
      $uZ = $caml_call2($Pervasives[16], $s, $cst__2);
      return $caml_call2($Pervasives[16], $cst__3, $uZ);
    };
    $default_pp_print_open_tag = function($uY) {return 0;};
    $default_pp_print_close_tag = function($uX) {return 0;};
    $pp_make_formatter = function($f, $g, $h, $i, $j) use ($Pervasives,$add_queue,$cst__4,$default_pp_mark_close_tag,$default_pp_mark_open_tag,$default_pp_print_close_tag,$default_pp_print_open_tag,$make_queue,$make_queue_elem,$sG,$scan_stack_bottom) {
      $pp_queue = $make_queue(0);
      $sys_tok = $make_queue_elem(-1, $sG, 0);
      $add_queue($sys_tok, $pp_queue);
      $sys_scan_stack = V(0, V(0, 1, $sys_tok), $scan_stack_bottom);
      return V(
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
      );
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
      $uP = function($uW) {return 0;};
      $uQ = function($uV) {return 0;};
      $ppf = $pp_make_formatter(
        $output,
        $flush,
        function($uU) {return 0;},
        $uQ,
        $uP
      );
      $ppf[19] =
        function($uT) use ($display_newline,$ppf) {
          return $display_newline($ppf, $uT);
        };
      $ppf[20] =
        function($uS) use ($display_blanks,$ppf) {
          return $display_blanks($ppf, $uS);
        };
      $ppf[21] =
        function($uR) use ($display_blanks,$ppf) {
          return $display_blanks($ppf, $uR);
        };
      return $ppf;
    };
    $formatter_of_out_channel = function($oc) use ($Pervasives,$caml_call1,$make_formatter) {
      $uO = function($param) use ($Pervasives,$caml_call1,$oc) {
        return $caml_call1($Pervasives[51], $oc);
      };
      return $make_formatter($caml_call1($Pervasives[57], $oc), $uO);
    };
    $formatter_of_buffer = function($b) use ($Buffer,$caml_call1,$make_formatter) {
      $uM = function($uN) {return 0;};
      return $make_formatter($caml_call1($Buffer[16], $b), $uM);
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
    $make_symbolic_output_buffer = function($param) {return V(0, 0);};
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
      $sob[1] = V(0, $item, $sob[1]);
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
          V(0, $caml_call3($String[4], $s, $i, $n))
        );
      };
      $symbolic_spaces = function($sob, $n) use ($add_symbolic_output_item) {
        return $add_symbolic_output_item($sob, V(1, $n));
      };
      $symbolic_indent = function($sob, $n) use ($add_symbolic_output_item) {
        return $add_symbolic_output_item($sob, V(2, $n));
      };
      $f = function($uJ, $uK, $uL) use ($sob,$symbolic_string) {
        return $symbolic_string($sob, $uJ, $uK, $uL);
      };
      $g = function($uI) use ($sob,$symbolic_flush) {
        return $symbolic_flush($sob, $uI);
      };
      $h = function($uH) use ($sob,$symbolic_newline) {
        return $symbolic_newline($sob, $uH);
      };
      $i = function($uG) use ($sob,$symbolic_spaces) {
        return $symbolic_spaces($sob, $uG);
      };
      $j = function($uF) use ($sob,$symbolic_indent) {
        return $symbolic_indent($sob, $uF);
      };
      return $pp_make_formatter($f, $g, $h, $i, $j);
    };
    $open_hbox = function($uE) use ($pp_open_hbox,$std_formatter) {
      return $pp_open_hbox($std_formatter, $uE);
    };
    $open_vbox = function($uD) use ($pp_open_vbox,$std_formatter) {
      return $pp_open_vbox($std_formatter, $uD);
    };
    $open_hvbox = function($uC) use ($pp_open_hvbox,$std_formatter) {
      return $pp_open_hvbox($std_formatter, $uC);
    };
    $open_hovbox = function($uB) use ($pp_open_hovbox,$std_formatter) {
      return $pp_open_hovbox($std_formatter, $uB);
    };
    $open_box = function($uA) use ($pp_open_box,$std_formatter) {
      return $pp_open_box($std_formatter, $uA);
    };
    $close_box = function($uz) use ($pp_close_box,$std_formatter) {
      return $pp_close_box($std_formatter, $uz);
    };
    $open_tag = function($uy) use ($pp_open_tag,$std_formatter) {
      return $pp_open_tag($std_formatter, $uy);
    };
    $close_tag = function($ux) use ($pp_close_tag,$std_formatter) {
      return $pp_close_tag($std_formatter, $ux);
    };
    $print_as = function($uv, $uw) use ($pp_print_as,$std_formatter) {
      return $pp_print_as($std_formatter, $uv, $uw);
    };
    $print_string = function($uu) use ($pp_print_string,$std_formatter) {
      return $pp_print_string($std_formatter, $uu);
    };
    $print_int = function($ut) use ($pp_print_int,$std_formatter) {
      return $pp_print_int($std_formatter, $ut);
    };
    $print_float = function($us) use ($pp_print_float,$std_formatter) {
      return $pp_print_float($std_formatter, $us);
    };
    $print_char = function($ur) use ($pp_print_char,$std_formatter) {
      return $pp_print_char($std_formatter, $ur);
    };
    $print_bool = function($uq) use ($pp_print_bool,$std_formatter) {
      return $pp_print_bool($std_formatter, $uq);
    };
    $print_break = function($uo, $up) use ($pp_print_break,$std_formatter) {
      return $pp_print_break($std_formatter, $uo, $up);
    };
    $print_cut = function($un) use ($pp_print_cut,$std_formatter) {
      return $pp_print_cut($std_formatter, $un);
    };
    $print_space = function($um) use ($pp_print_space,$std_formatter) {
      return $pp_print_space($std_formatter, $um);
    };
    $force_newline = function($ul) use ($pp_force_newline,$std_formatter) {
      return $pp_force_newline($std_formatter, $ul);
    };
    $print_flush = function($uk) use ($pp_print_flush,$std_formatter) {
      return $pp_print_flush($std_formatter, $uk);
    };
    $print_newline = function($uj) use ($pp_print_newline,$std_formatter) {
      return $pp_print_newline($std_formatter, $uj);
    };
    $print_if_newline = function($ui) use ($pp_print_if_newline,$std_formatter) {
      return $pp_print_if_newline($std_formatter, $ui);
    };
    $open_tbox = function($uh) use ($pp_open_tbox,$std_formatter) {
      return $pp_open_tbox($std_formatter, $uh);
    };
    $close_tbox = function($ug) use ($pp_close_tbox,$std_formatter) {
      return $pp_close_tbox($std_formatter, $ug);
    };
    $print_tbreak = function($ue, $uf) use ($pp_print_tbreak,$std_formatter) {
      return $pp_print_tbreak($std_formatter, $ue, $uf);
    };
    $set_tab = function($ud) use ($pp_set_tab,$std_formatter) {
      return $pp_set_tab($std_formatter, $ud);
    };
    $print_tab = function($uc) use ($pp_print_tab,$std_formatter) {
      return $pp_print_tab($std_formatter, $uc);
    };
    $set_margin = function($ub) use ($pp_set_margin,$std_formatter) {
      return $pp_set_margin($std_formatter, $ub);
    };
    $get_margin = function($ua) use ($pp_get_margin,$std_formatter) {
      return $pp_get_margin($std_formatter, $ua);
    };
    $set_max_indent = function($t_) use ($pp_set_max_indent,$std_formatter) {
      return $pp_set_max_indent($std_formatter, $t_);
    };
    $get_max_indent = function($t9) use ($pp_get_max_indent,$std_formatter) {
      return $pp_get_max_indent($std_formatter, $t9);
    };
    $set_max_boxes = function($t8) use ($pp_set_max_boxes,$std_formatter) {
      return $pp_set_max_boxes($std_formatter, $t8);
    };
    $get_max_boxes = function($t7) use ($pp_get_max_boxes,$std_formatter) {
      return $pp_get_max_boxes($std_formatter, $t7);
    };
    $over_max_boxes = function($t6) use ($pp_over_max_boxes,$std_formatter) {
      return $pp_over_max_boxes($std_formatter, $t6);
    };
    $set_ellipsis_text = function($t5) use ($pp_set_ellipsis_text,$std_formatter) {
      return $pp_set_ellipsis_text($std_formatter, $t5);
    };
    $get_ellipsis_text = function($t4) use ($pp_get_ellipsis_text,$std_formatter) {
      return $pp_get_ellipsis_text($std_formatter, $t4);
    };
    $set_formatter_out_channel = function($t3) use ($pp_set_formatter_out_channel,$std_formatter) {
      return $pp_set_formatter_out_channel($std_formatter, $t3);
    };
    $set_formatter_out_functions = function($t2) use ($pp_set_formatter_out_functions,$std_formatter) {
      return $pp_set_formatter_out_functions($std_formatter, $t2);
    };
    $get_formatter_out_functions = function($t1) use ($pp_get_formatter_out_functions,$std_formatter) {
      return $pp_get_formatter_out_functions($std_formatter, $t1);
    };
    $set_formatter_output_functions = function($tZ, $t0) use ($pp_set_formatter_output_functions,$std_formatter) {
      return $pp_set_formatter_output_functions($std_formatter, $tZ, $t0);
    };
    $get_formatter_output_functions = function($tY) use ($pp_get_formatter_output_functions,$std_formatter) {
      return $pp_get_formatter_output_functions($std_formatter, $tY);
    };
    $set_formatter_tag_functions = function($tX) use ($pp_set_formatter_tag_functions,$std_formatter) {
      return $pp_set_formatter_tag_functions($std_formatter, $tX);
    };
    $get_formatter_tag_functions = function($tW) use ($pp_get_formatter_tag_functions,$std_formatter) {
      return $pp_get_formatter_tag_functions($std_formatter, $tW);
    };
    $set_print_tags = function($tV) use ($pp_set_print_tags,$std_formatter) {
      return $pp_set_print_tags($std_formatter, $tV);
    };
    $get_print_tags = function($tU) use ($pp_get_print_tags,$std_formatter) {
      return $pp_get_print_tags($std_formatter, $tU);
    };
    $set_mark_tags = function($tT) use ($pp_set_mark_tags,$std_formatter) {
      return $pp_set_mark_tags($std_formatter, $tT);
    };
    $get_mark_tags = function($tS) use ($pp_get_mark_tags,$std_formatter) {
      return $pp_get_mark_tags($std_formatter, $tS);
    };
    $set_tags = function($tR) use ($pp_set_tags,$std_formatter) {
      return $pp_set_tags($std_formatter, $tR);
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
          $tP = $param__0[2];
          $tQ = $param__0[1];
          if ($tP) {
            $caml_call2($pp_v, $ppf, $tQ);
            $caml_call2($pp_sep, $ppf, 0);
            $opt__1 = V(0, $pp_sep);
            $opt__0 = $opt__1;
            $param__0 = $tP;
            continue;
          }
          return $caml_call2($pp_v, $ppf, $tQ);
        }
        return 0;
      }
    };
    $pp_print_text = function($ppf, $s) use ($String,$caml_call3,$caml_ml_string_length,$pp_force_newline,$pp_print_space,$pp_print_string,$runtime) {
      $len = $caml_ml_string_length($s);
      $left = V(0, 0);
      $right = V(0, 0);
      $flush = function($param) use ($String,$caml_call3,$left,$pp_print_string,$ppf,$right,$s) {
        $pp_print_string(
          $ppf,
          $caml_call3($String[4], $s, $left[1], $right[1] - $left[1] | 0)
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
        $tO = $left[1] !== $len ? 1 : (0);
        return $tO ? $flush(0) : ($tO);
      }
    };
    $compute_tag = function($output, $tag_acc) use ($Buffer,$caml_call1,$caml_call2,$caml_call3,$formatter_of_buffer,$pp_print_flush) {
      $buf = $caml_call1($Buffer[1], 16);
      $ppf = $formatter_of_buffer($buf);
      $caml_call2($output, $ppf, $tag_acc);
      $pp_print_flush($ppf, 0);
      $len = $caml_call1($Buffer[7], $buf);
      return 2 <= $len
        ? $caml_call3($Buffer[4], $buf, 1, $len + -2 | 0)
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
    $_ = $output_acc->contents =
      function($ppf, $acc) use ($CamlinternalFormat,$Pervasives,$String,$caml_call1,$caml_call2,$compute_tag,$is_int,$output_acc,$output_formatting_lit,$pp_open_box_gen,$pp_open_tag,$pp_print_as_size,$pp_print_char,$pp_print_flush,$pp_print_string) {
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
              $tn = $acc[2];
              $to = $acc[1];
              if (0 === $tn[0]) {
                $acc__0 = $tn[1];
                $output_acc->contents($ppf, $to);
                return $pp_open_tag(
                  $ppf,
                  $compute_tag($output_acc->contents, $acc__0)
                );
              }
              $acc__1 = $tn[1];
              $output_acc->contents($ppf, $to);
              $tp = $compute_tag($output_acc->contents, $acc__1);
              $match = $caml_call1($CamlinternalFormat[21], $tp);
              $bty = $match[2];
              $indent = $match[1];
              return $pp_open_box_gen($ppf, $indent, $bty);
            // FALLTHROUGH
            case 2:
              $tq = $acc[1];
              if ($is_int($tq)) {$switch__1 = 1;}
              else {
                if (0 === $tq[0]) {
                  $ts = $tq[2];
                  if ($is_int($ts)) {$switch__2 = 1;}
                  else {
                    if (1 === $ts[0]) {
                      $tt = $acc[2];
                      $tu = $ts[2];
                      $tv = $tq[1];
                      $s__0 = $tt;
                      $size = $tu;
                      $p__1 = $tv;
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
                $tr = $acc[2];
                $s = $tr;
                $p__0 = $tq;
                $switch__0 = 2;
              }
              break;
            // FALLTHROUGH
            case 3:
              $tw = $acc[1];
              if ($is_int($tw)) {$switch__3 = 1;}
              else {
                if (0 === $tw[0]) {
                  $ty = $tw[2];
                  if ($is_int($ty)) {$switch__4 = 1;}
                  else {
                    if (1 === $ty[0]) {
                      $tz = $acc[2];
                      $tA = $ty[2];
                      $tB = $tw[1];
                      $c__0 = $tz;
                      $size__0 = $tA;
                      $p__3 = $tB;
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
                $tx = $acc[2];
                $c = $tx;
                $p__2 = $tw;
                $switch__0 = 3;
              }
              break;
            // FALLTHROUGH
            case 4:
              $tC = $acc[1];
              if ($is_int($tC)) {$switch__5 = 1;}
              else {
                if (0 === $tC[0]) {
                  $tE = $tC[2];
                  if ($is_int($tE)) {$switch__6 = 1;}
                  else {
                    if (1 === $tE[0]) {
                      $tF = $acc[2];
                      $tG = $tE[2];
                      $tH = $tC[1];
                      $s__0 = $tF;
                      $size = $tG;
                      $p__1 = $tH;
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
                $tD = $acc[2];
                $s = $tD;
                $p__0 = $tC;
                $switch__0 = 2;
              }
              break;
            // FALLTHROUGH
            case 5:
              $tI = $acc[1];
              if ($is_int($tI)) {$switch__7 = 1;}
              else {
                if (0 === $tI[0]) {
                  $tK = $tI[2];
                  if ($is_int($tK)) {$switch__8 = 1;}
                  else {
                    if (1 === $tK[0]) {
                      $tL = $acc[2];
                      $tM = $tK[2];
                      $tN = $tI[1];
                      $c__0 = $tL;
                      $size__0 = $tM;
                      $p__3 = $tN;
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
                $tJ = $acc[2];
                $c = $tJ;
                $p__2 = $tI;
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
    $_ = $strput_acc->contents =
      function($ppf, $acc) use ($CamlinternalFormat,$Pervasives,$String,$caml_call1,$caml_call2,$compute_tag,$is_int,$output_formatting_lit,$pp_open_box_gen,$pp_open_tag,$pp_print_as_size,$pp_print_char,$pp_print_flush,$pp_print_string,$strput_acc) {
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
              $sV = $acc[2];
              $sW = $acc[1];
              if (0 === $sV[0]) {
                $acc__0 = $sV[1];
                $strput_acc->contents($ppf, $sW);
                return $pp_open_tag(
                  $ppf,
                  $compute_tag($strput_acc->contents, $acc__0)
                );
              }
              $acc__1 = $sV[1];
              $strput_acc->contents($ppf, $sW);
              $sX = $compute_tag($strput_acc->contents, $acc__1);
              $match = $caml_call1($CamlinternalFormat[21], $sX);
              $bty = $match[2];
              $indent = $match[1];
              return $pp_open_box_gen($ppf, $indent, $bty);
            // FALLTHROUGH
            case 2:
              $sY = $acc[1];
              if ($is_int($sY)) {$switch__1 = 1;}
              else {
                if (0 === $sY[0]) {
                  $s0 = $sY[2];
                  if ($is_int($s0)) {$switch__2 = 1;}
                  else {
                    if (1 === $s0[0]) {
                      $s1 = $acc[2];
                      $s2 = $s0[2];
                      $s3 = $sY[1];
                      $s__0 = $s1;
                      $size = $s2;
                      $p__1 = $s3;
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
                $sZ = $acc[2];
                $s = $sZ;
                $p__0 = $sY;
                $switch__0 = 2;
              }
              break;
            // FALLTHROUGH
            case 3:
              $s4 = $acc[1];
              if ($is_int($s4)) {$switch__3 = 1;}
              else {
                if (0 === $s4[0]) {
                  $s6 = $s4[2];
                  if ($is_int($s6)) {$switch__4 = 1;}
                  else {
                    if (1 === $s6[0]) {
                      $s7 = $acc[2];
                      $s8 = $s6[2];
                      $s9 = $s4[1];
                      $c__0 = $s7;
                      $size__0 = $s8;
                      $p__3 = $s9;
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
                $s5 = $acc[2];
                $c = $s5;
                $p__2 = $s4;
                $switch__0 = 3;
              }
              break;
            // FALLTHROUGH
            case 4:
              $s_ = $acc[1];
              if ($is_int($s_)) {$switch__5 = 1;}
              else {
                if (0 === $s_[0]) {
                  $tb = $s_[2];
                  if ($is_int($tb)) {$switch__6 = 1;}
                  else {
                    if (1 === $tb[0]) {
                      $tc = $acc[2];
                      $td = $tb[2];
                      $te = $s_[1];
                      $s__0 = $tc;
                      $size = $td;
                      $p__1 = $te;
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
                $ta = $acc[2];
                $s = $ta;
                $p__0 = $s_;
                $switch__0 = 2;
              }
              break;
            // FALLTHROUGH
            case 5:
              $tf = $acc[1];
              if ($is_int($tf)) {$switch__7 = 1;}
              else {
                if (0 === $tf[0]) {
                  $th = $tf[2];
                  if ($is_int($th)) {$switch__8 = 1;}
                  else {
                    if (1 === $th[0]) {
                      $ti = $acc[2];
                      $tj = $th[2];
                      $tk = $tf[1];
                      $c__0 = $ti;
                      $size__0 = $tj;
                      $p__3 = $tk;
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
                $tg = $acc[2];
                $c = $tg;
                $p__2 = $tf;
                $switch__0 = 3;
              }
              break;
            // FALLTHROUGH
            case 6:
              $tl = $acc[1];
              if (! $is_int($tl) && 0 === $tl[0]) {
                $tm = $tl[2];
                if (! $is_int($tm) && 1 === $tm[0]) {
                  $f__1 = $acc[2];
                  $size__1 = $tm[2];
                  $p__4 = $tl[1];
                  $strput_acc->contents($ppf, $p__4);
                  return $pp_print_as_size(
                    $ppf,
                    $size__1,
                    $caml_call1($f__1, 0)
                  );
                }
              }
              $f__0 = $acc[2];
              $strput_acc->contents($ppf, $tl);
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
      $sT = 0;
      $sU = function($ppf, $acc) use ($caml_call1,$k,$output_acc) {
        $output_acc->contents($ppf, $acc);
        return $caml_call1($k, $ppf);
      };
      return $caml_call4($CamlinternalFormat[7], $sU, $ppf, $sT, $fmt);
    };
    $ikfprintf = function($k, $ppf, $param) use ($CamlinternalFormat,$caml_call3) {
      $fmt = $param[1];
      return $caml_call3($CamlinternalFormat[8], $k, $ppf, $fmt);
    };
    $fprintf = function($ppf) use ($kfprintf) {
      $sQ = function($sS) {return 0;};
      return function($sR) use ($kfprintf,$ppf,$sQ) {
        return $kfprintf($sQ, $ppf, $sR);
      };
    };
    $ifprintf = function($ppf) use ($ikfprintf) {
      $sN = function($sP) {return 0;};
      return function($sO) use ($ikfprintf,$ppf,$sN) {
        return $ikfprintf($sN, $ppf, $sO);
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
      return V(0, $state[17], $state[18], $state[19], $state[20]);
    };
    $set_all_formatter_output_functions = function($sJ, $sK, $sL, $sM) use ($pp_set_all_formatter_output_functions,$std_formatter) {
      return $pp_set_all_formatter_output_functions(
        $std_formatter,
        $sJ,
        $sK,
        $sL,
        $sM
      );
    };
    $get_all_formatter_output_functions = function($sI) use ($pp_get_all_formatter_output_functions,$std_formatter) {
      return $pp_get_all_formatter_output_functions($std_formatter, $sI);
    };
    $bprintf = function($b, $param) use ($CamlinternalFormat,$caml_call4,$formatter_of_buffer,$output_acc,$pp_flush_queue) {
      $fmt = $param[1];
      $k = function($ppf, $acc) use ($output_acc,$pp_flush_queue) {
        $output_acc->contents($ppf, $acc);
        return $pp_flush_queue($ppf, 0);
      };
      $sH = $formatter_of_buffer($b);
      return $caml_call4($CamlinternalFormat[7], $k, $sH, 0, $fmt);
    };
    $Format = V(
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
    );
    
    $runtime["caml_register_global"](15, $Format, "Format");

  }
}