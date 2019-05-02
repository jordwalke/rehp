<?hh
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * Hashtbl.php
 */

namespace Rehack;

final class Hashtbl {
  <<__Memoize>>
  public static function get() {
    $global_object = \Rehack\GlobalObject::get();
    $runtime = \Rehack\Runtime::get();
    /*
     * Soon, these will replace the `global_data->ModuleName`
     * pattern in the load() function.
     */
    $Array_ = Array_::get();
    $CamlinternalLazy = CamlinternalLazy::get();
    $Pervasives = Pervasives::get();
    $Random = Random::get();
    $String_ = String_::get();
    $Sys = Sys::get();
    $Not_found = Not_found::get();
    $Assert_failure = Assert_failure::get();
    Hashtbl::load($global_object);
    $memoized = $runtime->caml_get_global_data()->Hashtbl;
    return $memoized;
  }

  /**
   * Performs module load operation. May have side effects.
   */
  private static function load($joo_global_object) {
    

    $runtime = $joo_global_object->jsoo_runtime;
    $left_shift_32 = $runtime["left_shift_32"];
    $caml_arity_test = $runtime["caml_arity_test"];
    $caml_check_bound = $runtime["caml_check_bound"];
    $caml_compare = $runtime["caml_compare"];
    $caml_hash = $runtime["caml_hash"];
    $caml_make_vect = $runtime["caml_make_vect"];
    $caml_new_string = $runtime["caml_new_string"];
    $caml_sys_getenv = $runtime["caml_sys_getenv"];
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
    $global_data = $runtime["caml_get_global_data"]();
    $cst_OCAMLRUNPARAM = $caml_new_string("OCAMLRUNPARAM");
    $cst_CAMLRUNPARAM = $caml_new_string("CAMLRUNPARAM");
    $cst = $caml_new_string("");
    $Sys = $global_data["Sys"];
    $Not_found = $global_data["Not_found"];
    $Pervasives = $global_data["Pervasives"];
    $Array = $global_data["Array_"];
    $Assert_failure = $global_data["Assert_failure"];
    $CamlinternalLazy = $global_data["CamlinternalLazy"];
    $Random = $global_data["Random"];
    $String = $global_data["String_"];
    $qh = Vector{0, 0};
    $qg = Vector{0, $caml_new_string("hashtbl.ml"), 108, 23};
    $hash = function($x) use ($caml_hash) {return $caml_hash(10, 100, 0, $x);};
    $hash_param = function($n1, $n2, $x) use ($caml_hash) {
      return $caml_hash($n1, $n2, 0, $x);
    };
    $seeded_hash = function($seed, $x) use ($caml_hash) {
      return $caml_hash(10, 100, $seed, $x);
    };
    $ongoing_traversal = function($h) {
      $rl = $h->count() - 1 < 4 ? 1 : (0);
      $rm = $rl || ($h[4] < 0 ? 1 : (0));
      return $rm;
    };
    $flip_ongoing_traversal = function($h) {$h[4] = (int) - $h[4];return 0;};
    
    try {$qj = $caml_sys_getenv($cst_OCAMLRUNPARAM);$params = $qj;}
    catch(\Throwable $rj) {
      $rj = $caml_wrap_exception($rj);
      if ($rj !== $Not_found) {
        throw $runtime["caml_wrap_thrown_exception_reraise"]($rj) as \Throwable;
      }
      try {$qi = $caml_sys_getenv($cst_CAMLRUNPARAM);$qf = $qi;}
      catch(\Throwable $rk) {
        $rk = $caml_wrap_exception($rk);
        if ($rk !== $Not_found) {
          throw $runtime["caml_wrap_thrown_exception_reraise"]($rk) as \Throwable;
        }
        $qf = $cst;
      }
      $params = $qf;
    }
    
    $randomized_default = $caml_call2($String[22], $params, 82);
    $randomized = Vector{0, $randomized_default};
    $randomize = function($param) use ($randomized) {
      $randomized[1] = 1;
      return 0;
    };
    $is_randomized = function($param) use ($randomized) {
      return $randomized[1];
    };
    $prng = Vector{
      246,
      function($ri) use ($Random,$caml_call1) {
        return $caml_call1($Random[11][2], 0);
      }
    };
    $power_2_above = function($x, $n) use ($Sys) {
      $x__0 = $x;
      for (;;) {
        if ($n <= $x__0) {return $x__0;}
        if ($Sys[14] < (int) ($x__0 * 2)) {return $x__0;}
        $x__1 = (int) ($x__0 * 2);
        $x__0 = $x__1;
        continue;
      }
    };
    $create = function($opt, $initial_size) use ($CamlinternalLazy,$Random,$caml_call1,$caml_make_vect,$power_2_above,$prng,$randomized,$runtime) {
      if ($opt) {
        $sth = $opt[1];
        $random = $sth;
      }
      else {$random = $randomized[1];}
      $s = $power_2_above(16, $initial_size);
      if ($random) {
        $rg = $runtime["caml_obj_tag"]($prng);
        $rh = 250 === $rg
          ? $prng[1]
          : (246 === $rg ? $caml_call1($CamlinternalLazy[2], $prng) : ($prng));
        $seed = $caml_call1($Random[11][4], $rh);
      }
      else {$seed = 0;}
      return Vector{0, 0, $caml_make_vect($s, 0), $seed, $s};
    };
    $clear = function($h) use ($caml_check_bound) {
      $h[1] = 0;
      $len = $h[2]->count() - 1;
      $re = (int) ($len + -1);
      $rd = 0;
      if (! ($re < 0)) {
        $i = $rd;
        for (;;) {
          $caml_check_bound($h[2], $i)[$i + 1] = 0;
          $rf = (int) ($i + 1);
          if ($re !== $i) {$i = $rf;continue;}
          break;
        }
      }
      return 0;
    };
    $reset = function($h) use ($Pervasives,$caml_call1,$caml_make_vect,$clear) {
      $len = $h[2]->count() - 1;
      if (4 <= $h->count() - 1) {
        if ($len !== $caml_call1($Pervasives[6], $h[4])) {
          $h[1] = 0;
          $h[2] = $caml_make_vect($caml_call1($Pervasives[6], $h[4]), 0);
          return 0;
        }
      }
      return $clear($h);
    };
    $copy_bucketlist = function($param) use ($Assert_failure,$qg,$runtime) {
      if ($param) {
        $key = $param[1];
        $data = $param[2];
        $next = $param[3];
        $loop = function($prec, $param) use ($Assert_failure,$qg,$runtime) {
          $prec__0 = $prec;
          $param__0 = $param;
          for (;;) {
            if ($param__0) {
              $key = $param__0[1];
              $data = $param__0[2];
              $next = $param__0[3];
              $r = Vector{0, $key, $data, $next};
              if ($prec__0) {
                $prec__0[3] = $r;
                $prec__0 = $r;
                $param__0 = $next;
                continue;
              }
              throw $runtime["caml_wrap_thrown_exception"](Vector{0, $Assert_failure, $qg}) as \Throwable;
            }
            return 0;
          }
        };
        $r = Vector{0, $key, $data, $next};
        $loop($r, $next);
        return $r;
      }
      return 0;
    };
    $copy = function($h) use ($Array,$caml_call2,$copy_bucketlist) {
      $ra = $h[4];
      $rb = $h[3];
      $rc = $caml_call2($Array[15], $copy_bucketlist, $h[2]);
      return Vector{0, $h[1], $rc, $rb, $ra};
    };
    $length = function($h) {return $h[1];};
    $resize = function($indexfun, $h) use ($Sys,$caml_call2,$caml_check_bound,$caml_make_vect,$ongoing_traversal) {
      $odata = $h[2];
      $osize = $odata->count() - 1;
      $nsize = (int) ($osize * 2);
      $q2 = $nsize < $Sys[14] ? 1 : (0);
      if ($q2) {
        $ndata = $caml_make_vect($nsize, 0);
        $ndata_tail = $caml_make_vect($nsize, 0);
        $inplace = 1 - $ongoing_traversal($h);
        $h[2] = $ndata;
        $insert_bucket = function($cell) use ($caml_call2,$caml_check_bound,$h,$indexfun,$inplace,$ndata,$ndata_tail) {
          $cell__0 = $cell;
          for (;;) {
            if ($cell__0) {
              $key = $cell__0[1];
              $data = $cell__0[2];
              $next = $cell__0[3];
              $cell__1 = $inplace ? $cell__0 : (Vector{0, $key, $data, 0});
              $nidx = $caml_call2($indexfun, $h, $key);
              $match = $caml_check_bound($ndata_tail, $nidx)[$nidx + 1];
              if ($match) {
                $match[3] = $cell__1;
              }
              else {$caml_check_bound($ndata, $nidx)[$nidx + 1] = $cell__1;}
              $caml_check_bound($ndata_tail, $nidx)[$nidx + 1] = $cell__1;
              $cell__0 = $next;
              continue;
            }
            return 0;
          }
        };
        $q4 = (int) ($osize + -1);
        $q3 = 0;
        if (! ($q4 < 0)) {
          $i__0 = $q3;
          for (;;) {
            $insert_bucket($caml_check_bound($odata, $i__0)[$i__0 + 1]);
            $q_ = (int) ($i__0 + 1);
            if ($q4 !== $i__0) {$i__0 = $q_;continue;}
            break;
          }
        }
        if ($inplace) {
          $q6 = (int) ($nsize + -1);
          $q5 = 0;
          if (! ($q6 < 0)) {
            $i = $q5;
            for (;;) {
              $match = $caml_check_bound($ndata_tail, $i)[$i + 1];
              if ($match) {$match[3] = 0;}
              $q9 = (int) ($i + 1);
              if ($q6 !== $i) {$i = $q9;continue;}
              break;
            }
          }
          $q7 = 0;
        }
        else {$q7 = $inplace;}
        $q8 = $q7;
      }
      else {$q8 = $q2;}
      return $q8;
    };
    $key_index = function($h, $key) use ($caml_hash,$runtime) {
      return 3 <= $h->count() - 1
        ? $caml_hash(10, 100, $h[3], $key) & (int) ($h[2]->count() - 1 + -1)
        : ($runtime["caml_mod"](
         $runtime["caml_hash_univ_param"](10, 100, $key),
         $h[2]->count() -
           1
       ));
    };
    $add = function($h, $key, $data) use ($caml_check_bound,$key_index,$left_shift_32,$resize) {
      $i = $key_index($h, $key);
      $bucket = Vector{0, $key, $data, $caml_check_bound($h[2], $i)[$i + 1]};
      $caml_check_bound($h[2], $i)[$i + 1] = $bucket;
      $h[1] = (int) ($h[1] + 1);
      $q1 = $left_shift_32($h[2]->count() - 1, 1) < $h[1] ? 1 : (0);
      return $q1 ? $resize($key_index, $h) : ($q1);
    };
    $remove_bucket = function($h, $i, $key, $prec, $c) use ($caml_check_bound,$caml_compare) {
      $prec__0 = $prec;
      $c__0 = $c;
      for (;;) {
        if ($c__0) {
          $k = $c__0[1];
          $next = $c__0[3];
          if (0 === $caml_compare($k, $key)) {
            $h[1] = (int) ($h[1] + -1);
            return $prec__0
              ? ($prec__0[3] = $next) || true ? 0 : (0)
              : ($caml_check_bound($h[2], $i)[$i + 1] = $next);
          }
          $prec__0 = $c__0;
          $c__0 = $next;
          continue;
        }
        return 0;
      }
    };
    $remove = function($h, $key) use ($caml_check_bound,$key_index,$remove_bucket) {
      $i = $key_index($h, $key);
      return $remove_bucket(
        $h,
        $i,
        $key,
        0,
        $caml_check_bound($h[2], $i)[$i + 1]
      );
    };
    $find_rec = function($key, $param) use ($Not_found,$caml_compare,$runtime) {
      $param__0 = $param;
      for (;;) {
        if ($param__0) {
          $k = $param__0[1];
          $data = $param__0[2];
          $next = $param__0[3];
          if (0 === $caml_compare($key, $k)) {return $data;}
          $param__0 = $next;
          continue;
        }
        throw $runtime["caml_wrap_thrown_exception"]($Not_found) as \Throwable;
      }
    };
    $find = function($h, $key) use ($Not_found,$caml_check_bound,$caml_compare,$find_rec,$key_index,$runtime) {
      $q0 = $key_index($h, $key);
      $match = $caml_check_bound($h[2], $q0)[$q0 + 1];
      if ($match) {
        $k1 = $match[1];
        $d1 = $match[2];
        $next1 = $match[3];
        if (0 === $caml_compare($key, $k1)) {return $d1;}
        if ($next1) {
          $k2 = $next1[1];
          $d2 = $next1[2];
          $next2 = $next1[3];
          if (0 === $caml_compare($key, $k2)) {return $d2;}
          if ($next2) {
            $k3 = $next2[1];
            $d3 = $next2[2];
            $next3 = $next2[3];
            return 0 === $caml_compare($key, $k3)
              ? $d3
              : ($find_rec($key, $next3));
          }
          throw $runtime["caml_wrap_thrown_exception"]($Not_found) as \Throwable;
        }
        throw $runtime["caml_wrap_thrown_exception"]($Not_found) as \Throwable;
      }
      throw $runtime["caml_wrap_thrown_exception"]($Not_found) as \Throwable;
    };
    $find_rec_opt = function($key, $param) use ($caml_compare) {
      $param__0 = $param;
      for (;;) {
        if ($param__0) {
          $k = $param__0[1];
          $data = $param__0[2];
          $next = $param__0[3];
          if (0 === $caml_compare($key, $k)) {return Vector{0, $data};}
          $param__0 = $next;
          continue;
        }
        return 0;
      }
    };
    $find_opt = function($h, $key) use ($caml_check_bound,$caml_compare,$find_rec_opt,$key_index) {
      $qZ = $key_index($h, $key);
      $match = $caml_check_bound($h[2], $qZ)[$qZ + 1];
      if ($match) {
        $k1 = $match[1];
        $d1 = $match[2];
        $next1 = $match[3];
        if (0 === $caml_compare($key, $k1)) {return Vector{0, $d1};}
        if ($next1) {
          $k2 = $next1[1];
          $d2 = $next1[2];
          $next2 = $next1[3];
          if (0 === $caml_compare($key, $k2)) {return Vector{0, $d2};}
          if ($next2) {
            $k3 = $next2[1];
            $d3 = $next2[2];
            $next3 = $next2[3];
            return 0 === $caml_compare($key, $k3)
              ? Vector{0, $d3}
              : ($find_rec_opt($key, $next3));
          }
          return 0;
        }
        return 0;
      }
      return 0;
    };
    $find_all = function($h, $key) use ($caml_check_bound,$caml_compare,$key_index) {
      $find_in_bucket = new Ref();
      $find_in_bucket->contents = function($param) use ($caml_compare,$find_in_bucket,$key) {
        $param__0 = $param;
        for (;;) {
          if ($param__0) {
            $k = $param__0[1];
            $data = $param__0[2];
            $next = $param__0[3];
            if (0 === $caml_compare($k, $key)) {
              return Vector{0, $data, $find_in_bucket->contents($next)};
            }
            $param__0 = $next;
            continue;
          }
          return 0;
        }
      };
      $qY = $key_index($h, $key);
      return $find_in_bucket->contents($caml_check_bound($h[2], $qY)[$qY + 1]);
    };
    $replace_bucket = function($key, $data, $param) use ($caml_compare) {
      $param__0 = $param;
      for (;;) {
        if ($param__0) {
          $k = $param__0[1];
          $next = $param__0[3];
          if (0 === $caml_compare($k, $key)) {
            $param__0[1] = $key;
            $param__0[2] = $data;
            return 0;
          }
          $param__0 = $next;
          continue;
        }
        return 1;
      }
    };
    $replace = function($h, $key, $data) use ($caml_check_bound,$key_index,$left_shift_32,$replace_bucket,$resize) {
      $i = $key_index($h, $key);
      $l = $caml_check_bound($h[2], $i)[$i + 1];
      $qV = $replace_bucket($key, $data, $l);
      if ($qV) {
        $caml_check_bound($h[2], $i)[$i + 1] = Vector{0, $key, $data, $l};
        $h[1] = (int) ($h[1] + 1);
        $qW = $left_shift_32($h[2]->count() - 1, 1) < $h[1] ? 1 : (0);
        if ($qW) {return $resize($key_index, $h);}
        $qX = $qW;
      }
      else {$qX = $qV;}
      return $qX;
    };
    $mem = function($h, $key) use ($caml_check_bound,$caml_compare,$key_index) {
      $mem_in_bucket = function($param) use ($caml_compare,$key) {
        $param__0 = $param;
        for (;;) {
          if ($param__0) {
            $k = $param__0[1];
            $next = $param__0[3];
            $qU = 0 === $caml_compare($k, $key) ? 1 : (0);
            if ($qU) {return $qU;}
            $param__0 = $next;
            continue;
          }
          return 0;
        }
      };
      $qT = $key_index($h, $key);
      return $mem_in_bucket($caml_check_bound($h[2], $qT)[$qT + 1]);
    };
    $iter = function($f, $h) use ($caml_call2,$caml_check_bound,$caml_wrap_exception,$flip_ongoing_traversal,$ongoing_traversal,$runtime) {
      $do_bucket = function($param) use ($caml_call2,$f) {
        $param__0 = $param;
        for (;;) {
          if ($param__0) {
            $key = $param__0[1];
            $data = $param__0[2];
            $param__1 = $param__0[3];
            $caml_call2($f, $key, $data);
            $param__0 = $param__1;
            continue;
          }
          return 0;
        }
      };
      $old_trav = $ongoing_traversal($h);
      if (1 - $old_trav) {$flip_ongoing_traversal($h);}
      try {
        $d = $h[2];
        $qP = (int) ($d->count() - 1 + -1);
        $qO = 0;
        if (! ($qP < 0)) {
          $i = $qO;
          for (;;) {
            $do_bucket($caml_check_bound($d, $i)[$i + 1]);
            $qS = (int) ($i + 1);
            if ($qP !== $i) {$i = $qS;continue;}
            break;
          }
        }
        $qQ = 1 - $old_trav;
        $qR = $qQ ? $flip_ongoing_traversal($h) : ($qQ);
        return $qR;
      }
      catch(\Throwable $exn) {
        $exn = $caml_wrap_exception($exn);
        if ($old_trav) {
          throw $runtime["caml_wrap_thrown_exception_reraise"]($exn) as \Throwable;
        }
        $flip_ongoing_traversal($h);
        throw $runtime["caml_wrap_thrown_exception_reraise"]($exn) as \Throwable;
      }
    };
    $filter_map_inplace_bucket = function($f, $h, $i, $prec, $slot) use ($caml_call2,$caml_check_bound) {
      $prec__0 = $prec;
      $slot__0 = $slot;
      for (;;) {
        if ($slot__0) {
          $key = $slot__0[1];
          $data = $slot__0[2];
          $next = $slot__0[3];
          $match = $caml_call2($f, $key, $data);
          if ($match) {
            $data__0 = $match[1];
            if ($prec__0) {
              $prec__0[3] = $slot__0;
            }
            else {$caml_check_bound($h[2], $i)[$i + 1] = $slot__0;}
            $slot__0[2] = $data__0;
            $prec__0 = $slot__0;
            $slot__0 = $next;
            continue;
          }
          $h[1] = (int) ($h[1] + -1);
          $slot__0 = $next;
          continue;
        }
        return $prec__0
          ? ($prec__0[3] = 0) || true ? 0 : (0)
          : ($caml_check_bound($h[2], $i)[$i + 1] = 0);
      }
    };
    $filter_map_inplace = function($f, $h) use ($caml_check_bound,$caml_wrap_exception,$filter_map_inplace_bucket,$flip_ongoing_traversal,$ongoing_traversal,$runtime) {
      $d = $h[2];
      $old_trav = $ongoing_traversal($h);
      if (1 - $old_trav) {$flip_ongoing_traversal($h);}
      try {
        $qL = (int) ($d->count() - 1 + -1);
        $qK = 0;
        if (! ($qL < 0)) {
          $i = $qK;
          for (;;) {
            $filter_map_inplace_bucket(
              $f,
              $h,
              $i,
              0,
              $caml_check_bound($h[2], $i)[$i + 1]
            );
            $qN = (int) ($i + 1);
            if ($qL !== $i) {$i = $qN;continue;}
            break;
          }
        }
        $qM = 0;
        return $qM;
      }
      catch(\Throwable $exn) {
        $exn = $caml_wrap_exception($exn);
        if ($old_trav) {
          throw $runtime["caml_wrap_thrown_exception_reraise"]($exn) as \Throwable;
        }
        $flip_ongoing_traversal($h);
        throw $runtime["caml_wrap_thrown_exception_reraise"]($exn) as \Throwable;
      }
    };
    $fold = function($f, $h, $init) use ($caml_call3,$caml_check_bound,$caml_wrap_exception,$flip_ongoing_traversal,$ongoing_traversal,$runtime) {
      $do_bucket = function($b, $accu) use ($caml_call3,$f) {
        $b__0 = $b;
        $accu__0 = $accu;
        for (;;) {
          if ($b__0) {
            $key = $b__0[1];
            $data = $b__0[2];
            $b__1 = $b__0[3];
            $accu__1 = $caml_call3($f, $key, $data, $accu__0);
            $b__0 = $b__1;
            $accu__0 = $accu__1;
            continue;
          }
          return $accu__0;
        }
      };
      $old_trav = $ongoing_traversal($h);
      if (1 - $old_trav) {$flip_ongoing_traversal($h);}
      try {
        $d = $h[2];
        $accu = Vector{0, $init};
        $qG = (int) ($d->count() - 1 + -1);
        $qF = 0;
        if (! ($qG < 0)) {
          $i = $qF;
          for (;;) {
            $qI = $accu[1];
            $accu[1] = $do_bucket($caml_check_bound($d, $i)[$i + 1], $qI);
            $qJ = (int) ($i + 1);
            if ($qG !== $i) {$i = $qJ;continue;}
            break;
          }
        }
        if (1 - $old_trav) {$flip_ongoing_traversal($h);}
        $qH = $accu[1];
        return $qH;
      }
      catch(\Throwable $exn) {
        $exn = $caml_wrap_exception($exn);
        if ($old_trav) {
          throw $runtime["caml_wrap_thrown_exception_reraise"]($exn) as \Throwable;
        }
        $flip_ongoing_traversal($h);
        throw $runtime["caml_wrap_thrown_exception_reraise"]($exn) as \Throwable;
      }
    };
    $bucket_length = function($accu, $param) {
      $accu__0 = $accu;
      $param__0 = $param;
      for (;;) {
        if ($param__0) {
          $param__1 = $param__0[3];
          $accu__1 = (int) ($accu__0 + 1);
          $accu__0 = $accu__1;
          $param__0 = $param__1;
          continue;
        }
        return $accu__0;
      }
    };
    $stats = function($h) use ($Array,$Pervasives,$bucket_length,$caml_call2,$caml_call3,$caml_check_bound,$caml_make_vect) {
      $qz = $h[2];
      $qA = 0;
      $qB = function($m, $b) use ($Pervasives,$bucket_length,$caml_call2) {
        $qE = $bucket_length(0, $b);
        return $caml_call2($Pervasives[5], $m, $qE);
      };
      $mbl = $caml_call3($Array[17], $qB, $qA, $qz);
      $histo = $caml_make_vect((int) ($mbl + 1), 0);
      $qC = $h[2];
      $qD = function($b) use ($bucket_length,$caml_check_bound,$histo) {
        $l = $bucket_length(0, $b);
        $histo[$l + 1] = (int) ($caml_check_bound($histo, $l)[$l + 1] + 1);
        return 0;
      };
      $caml_call2($Array[13], $qD, $qC);
      return Vector{0, $h[1], $h[2]->count() - 1, $mbl, $histo};
    };
    $MakeSeeded = function($H) use ($Not_found,$caml_call2,$caml_check_bound,$clear,$copy,$create,$filter_map_inplace,$fold,$iter,$left_shift_32,$length,$reset,$resize,$runtime,$stats) {
      $key_index = function($h, $key) use ($H,$caml_call2) {
        $qy = (int) ($h[2]->count() - 1 + -1);
        return $caml_call2($H[2], $h[3], $key) & $qy;
      };
      $add = function($h, $key, $data) use ($caml_check_bound,$key_index,$left_shift_32,$resize) {
        $i = $key_index($h, $key);
        $bucket = Vector{0, $key, $data, $caml_check_bound($h[2], $i)[$i + 1]};
        $caml_check_bound($h[2], $i)[$i + 1] = $bucket;
        $h[1] = (int) ($h[1] + 1);
        $qx = $left_shift_32($h[2]->count() - 1, 1) < $h[1] ? 1 : (0);
        return $qx ? $resize($key_index, $h) : ($qx);
      };
      $remove_bucket = function($h, $i, $key, $prec, $c) use ($H,$caml_call2,$caml_check_bound) {
        $prec__0 = $prec;
        $c__0 = $c;
        for (;;) {
          if ($c__0) {
            $k = $c__0[1];
            $next = $c__0[3];
            if ($caml_call2($H[1], $k, $key)) {
              $h[1] = (int) ($h[1] + -1);
              return $prec__0
                ? ($prec__0[3] = $next) || true ? 0 : (0)
                : ($caml_check_bound($h[2], $i)[$i + 1] = $next);
            }
            $prec__0 = $c__0;
            $c__0 = $next;
            continue;
          }
          return 0;
        }
      };
      $remove = function($h, $key) use ($caml_check_bound,$key_index,$remove_bucket) {
        $i = $key_index($h, $key);
        return $remove_bucket(
          $h,
          $i,
          $key,
          0,
          $caml_check_bound($h[2], $i)[$i + 1]
        );
      };
      $find_rec = function($key, $param) use ($H,$Not_found,$caml_call2,$runtime) {
        $param__0 = $param;
        for (;;) {
          if ($param__0) {
            $k = $param__0[1];
            $data = $param__0[2];
            $next = $param__0[3];
            if ($caml_call2($H[1], $key, $k)) {return $data;}
            $param__0 = $next;
            continue;
          }
          throw $runtime["caml_wrap_thrown_exception"]($Not_found) as \Throwable;
        }
      };
      $find = function($h, $key) use ($H,$Not_found,$caml_call2,$caml_check_bound,$find_rec,$key_index,$runtime) {
        $qw = $key_index($h, $key);
        $match = $caml_check_bound($h[2], $qw)[$qw + 1];
        if ($match) {
          $k1 = $match[1];
          $d1 = $match[2];
          $next1 = $match[3];
          if ($caml_call2($H[1], $key, $k1)) {return $d1;}
          if ($next1) {
            $k2 = $next1[1];
            $d2 = $next1[2];
            $next2 = $next1[3];
            if ($caml_call2($H[1], $key, $k2)) {return $d2;}
            if ($next2) {
              $k3 = $next2[1];
              $d3 = $next2[2];
              $next3 = $next2[3];
              return $caml_call2($H[1], $key, $k3)
                ? $d3
                : ($find_rec($key, $next3));
            }
            throw $runtime["caml_wrap_thrown_exception"]($Not_found) as \Throwable;
          }
          throw $runtime["caml_wrap_thrown_exception"]($Not_found) as \Throwable;
        }
        throw $runtime["caml_wrap_thrown_exception"]($Not_found) as \Throwable;
      };
      $find_rec_opt = function($key, $param) use ($H,$caml_call2) {
        $param__0 = $param;
        for (;;) {
          if ($param__0) {
            $k = $param__0[1];
            $data = $param__0[2];
            $next = $param__0[3];
            if ($caml_call2($H[1], $key, $k)) {return Vector{0, $data};}
            $param__0 = $next;
            continue;
          }
          return 0;
        }
      };
      $find_opt = function($h, $key) use ($H,$caml_call2,$caml_check_bound,$find_rec_opt,$key_index) {
        $qv = $key_index($h, $key);
        $match = $caml_check_bound($h[2], $qv)[$qv + 1];
        if ($match) {
          $k1 = $match[1];
          $d1 = $match[2];
          $next1 = $match[3];
          if ($caml_call2($H[1], $key, $k1)) {return Vector{0, $d1};}
          if ($next1) {
            $k2 = $next1[1];
            $d2 = $next1[2];
            $next2 = $next1[3];
            if ($caml_call2($H[1], $key, $k2)) {return Vector{0, $d2};}
            if ($next2) {
              $k3 = $next2[1];
              $d3 = $next2[2];
              $next3 = $next2[3];
              return $caml_call2($H[1], $key, $k3)
                ? Vector{0, $d3}
                : ($find_rec_opt($key, $next3));
            }
            return 0;
          }
          return 0;
        }
        return 0;
      };
      $find_all = function($h, $key) use ($H,$caml_call2,$caml_check_bound,$key_index) {
        $find_in_bucket = new Ref();
        $find_in_bucket->contents = function($param) use ($H,$caml_call2,$find_in_bucket,$key) {
          $param__0 = $param;
          for (;;) {
            if ($param__0) {
              $k = $param__0[1];
              $d = $param__0[2];
              $next = $param__0[3];
              if ($caml_call2($H[1], $k, $key)) {
                return Vector{0, $d, $find_in_bucket->contents($next)};
              }
              $param__0 = $next;
              continue;
            }
            return 0;
          }
        };
        $qu = $key_index($h, $key);
        return $find_in_bucket->contents(
          $caml_check_bound($h[2], $qu)[$qu + 1]
        );
      };
      $replace_bucket = function($key, $data, $param) use ($H,$caml_call2) {
        $param__0 = $param;
        for (;;) {
          if ($param__0) {
            $k = $param__0[1];
            $next = $param__0[3];
            if ($caml_call2($H[1], $k, $key)) {
              $param__0[1] = $key;
              $param__0[2] = $data;
              return 0;
            }
            $param__0 = $next;
            continue;
          }
          return 1;
        }
      };
      $replace = function($h, $key, $data) use ($caml_check_bound,$key_index,$left_shift_32,$replace_bucket,$resize) {
        $i = $key_index($h, $key);
        $l = $caml_check_bound($h[2], $i)[$i + 1];
        $qr = $replace_bucket($key, $data, $l);
        if ($qr) {
          $caml_check_bound($h[2], $i)[$i + 1] = Vector{0, $key, $data, $l};
          $h[1] = (int) ($h[1] + 1);
          $qs = $left_shift_32($h[2]->count() - 1, 1) < $h[1] ? 1 : (0);
          if ($qs) {return $resize($key_index, $h);}
          $qt = $qs;
        }
        else {$qt = $qr;}
        return $qt;
      };
      $mem = function($h, $key) use ($H,$caml_call2,$caml_check_bound,$key_index) {
        $mem_in_bucket = function($param) use ($H,$caml_call2,$key) {
          $param__0 = $param;
          for (;;) {
            if ($param__0) {
              $k = $param__0[1];
              $next = $param__0[3];
              $qq = $caml_call2($H[1], $k, $key);
              if ($qq) {return $qq;}
              $param__0 = $next;
              continue;
            }
            return 0;
          }
        };
        $qp = $key_index($h, $key);
        return $mem_in_bucket($caml_check_bound($h[2], $qp)[$qp + 1]);
      };
      return Vector{
        0,
        $create,
        $clear,
        $reset,
        $copy,
        $add,
        $remove,
        $find,
        $find_opt,
        $find_all,
        $replace,
        $mem,
        $iter,
        $filter_map_inplace,
        $fold,
        $length,
        $stats
      };
    };
    $Make = function($H) use ($MakeSeeded,$caml_call1,$caml_call2,$qh) {
      $equal = $H[1];
      $hash = function($seed, $x) use ($H,$caml_call1) {
        return $caml_call1($H[2], $x);
      };
      $include = $MakeSeeded(Vector{0, $equal, $hash});
      $clear = $include[2];
      $reset = $include[3];
      $copy = $include[4];
      $add = $include[5];
      $remove = $include[6];
      $find = $include[7];
      $find_opt = $include[8];
      $find_all = $include[9];
      $replace = $include[10];
      $mem = $include[11];
      $iter = $include[12];
      $filter_map_inplace = $include[13];
      $fold = $include[14];
      $length = $include[15];
      $stats = $include[16];
      $qo = $include[1];
      $create = function($sz) use ($caml_call2,$qh,$qo) {
        return $caml_call2($qo, $qh, $sz);
      };
      return Vector{
        0,
        $create,
        $clear,
        $reset,
        $copy,
        $add,
        $remove,
        $find,
        $find_opt,
        $find_all,
        $replace,
        $mem,
        $iter,
        $filter_map_inplace,
        $fold,
        $length,
        $stats
      };
    };
    $Hashtbl = Vector{
      0,
      $create,
      $clear,
      $reset,
      $copy,
      $add,
      $find,
      $find_opt,
      $find_all,
      $mem,
      $remove,
      $replace,
      $iter,
      $filter_map_inplace,
      $fold,
      $length,
      $randomize,
      $is_randomized,
      $stats,
      $Make,
      $MakeSeeded,
      $hash,
      $seeded_hash,
      $hash_param,
      function($qn, $qm, $ql, $qk) use ($caml_hash) {
        return $caml_hash($qn, $qm, $ql, $qk);
      }
    };
    
    $runtime["caml_register_global"](13, $Hashtbl, "Hashtbl");

  }
}