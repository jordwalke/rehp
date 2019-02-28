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
    $left_shift_32 = $runtime->left_shift_32;
    $caml_arity_test = $runtime->caml_arity_test;
    $ArrayLiteral = $runtime->ArrayLiteral;
    $caml_check_bound = $runtime->caml_check_bound;
    $caml_compare = $runtime->caml_compare;
    $caml_hash = $runtime->caml_hash;
    $caml_make_vect = $runtime->caml_make_vect;
    $caml_new_string = $runtime->caml_new_string;
    $caml_sys_getenv = $runtime->caml_sys_getenv;
    $caml_wrap_exception = $runtime->caml_wrap_exception;
    $caml_call1 = function($f, $a0) use ($ArrayLiteral,$caml_arity_test,$runtime) {
      return $caml_arity_test($f) == 1
        ? $f($a0)
        : ($runtime->caml_call_gen($f, $ArrayLiteral($a0)));
    };
    $caml_call2 = function($f, $a0, $a1) use ($ArrayLiteral,$caml_arity_test,$runtime) {
      return $caml_arity_test($f) == 2
        ? $f($a0, $a1)
        : ($runtime->caml_call_gen($f, $ArrayLiteral($a0, $a1)));
    };
    $caml_call3 = function($f, $a0, $a1, $a2) use ($ArrayLiteral,$caml_arity_test,$runtime) {
      return $caml_arity_test($f) == 3
        ? $f($a0, $a1, $a2)
        : ($runtime->caml_call_gen($f, $ArrayLiteral($a0, $a1, $a2)));
    };
    $global_data = $runtime->caml_get_global_data();
    $cst_OCAMLRUNPARAM = $caml_new_string("OCAMLRUNPARAM");
    $cst_CAMLRUNPARAM = $caml_new_string("CAMLRUNPARAM");
    $cst = $caml_new_string("");
    $Sys = $global_data->Sys;
    $Not_found = $global_data->Not_found;
    $Pervasives = $global_data->Pervasives;
    $Array = $global_data->Array_;
    $Assert_failure = $global_data->Assert_failure;
    $CamlinternalLazy = $global_data->CamlinternalLazy;
    $Random = $global_data->Random;
    $String = $global_data->String_;
    $qg = R(0, 0);
    $qf = R(0, $caml_new_string("hashtbl.ml"), 108, 23);
    $hash = function($x) use ($caml_hash) {return $caml_hash(10, 100, 0, $x);};
    $hash_param = function($n1, $n2, $x) use ($caml_hash) {
      return $caml_hash($n1, $n2, 0, $x);
    };
    $seeded_hash = function($seed, $x) use ($caml_hash) {
      return $caml_hash(10, 100, $seed, $x);
    };
    $ongoing_traversal = function($h) {
      $rk = $h->length - 1 < 4 ? 1 : (0);
      $rl = $rk || ($h[4] < 0 ? 1 : (0));
      return $rl;
    };
    $flip_ongoing_traversal = function($h) {$h[4] = - $h[4] | 0;return 0;};
    
    try {$qi = $caml_sys_getenv($cst_OCAMLRUNPARAM);$params = $qi;}
    catch(\Throwable $ri) {
      $ri = $caml_wrap_exception($ri);
      if ($ri !== $Not_found) {
        throw $runtime->caml_wrap_thrown_exception_reraise($ri);
      }
      try {$qh = $caml_sys_getenv($cst_CAMLRUNPARAM);$qe = $qh;}
      catch(\Throwable $rj) {
        $rj = $caml_wrap_exception($rj);
        if ($rj !== $Not_found) {
          throw $runtime->caml_wrap_thrown_exception_reraise($rj);
        }
        $qe = $cst;
      }
      $params = $qe;
    }
    
    $randomized_default = $caml_call2($String[22], $params, 82);
    $randomized = V(0, $randomized_default);
    $randomize = function($param) use ($randomized) {
      $randomized[1] = 1;
      return 0;
    };
    $is_randomized = function($param) use ($randomized) {
      return $randomized[1];
    };
    $prng = V(
      246,
      function($rh) use ($Random,$caml_call1) {
        return $caml_call1($Random[11][2], 0);
      }
    );
    $power_2_above = function($x, $n) use ($Sys) {
      $x__0 = $x;
      for (;;) {
        if ($n <= $x__0) {return $x__0;}
        if ($Sys[14] < ($x__0 * 2 | 0)) {return $x__0;}
        $x__1 = $x__0 * 2 | 0;
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
        $rf = $runtime->caml_obj_tag($prng);
        $rg = 250 === $rf
          ? $prng[1]
          : (246 === $rf ? $caml_call1($CamlinternalLazy[2], $prng) : ($prng));
        $seed = $caml_call1($Random[11][4], $rg);
      }
      else {$seed = 0;}
      return V(0, 0, $caml_make_vect($s, 0), $seed, $s);
    };
    $clear = function($h) use ($caml_check_bound) {
      $h[1] = 0;
      $len = $h[2]->length - 1;
      $rd = $len + -1 | 0;
      $rc = 0;
      if (! ($rd < 0)) {
        $i = $rc;
        for (;;) {
          $caml_check_bound($h[2], $i)[$i + 1] = 0;
          $re = $i + 1 | 0;
          if ($rd !== $i) {$i = $re;continue;}
          break;
        }
      }
      return 0;
    };
    $reset = function($h) use ($Pervasives,$caml_call1,$caml_make_vect,$clear) {
      $len = $h[2]->length - 1;
      if (4 <= $h->length - 1) {
        if ($len !== $caml_call1($Pervasives[6], $h[4])) {
          $h[1] = 0;
          $h[2] = $caml_make_vect($caml_call1($Pervasives[6], $h[4]), 0);
          return 0;
        }
      }
      return $clear($h);
    };
    $copy_bucketlist = function($param) use ($Assert_failure,$qf,$runtime) {
      if ($param) {
        $key = $param[1];
        $data = $param[2];
        $next = $param[3];
        $loop = function($prec, $param) use ($Assert_failure,$qf,$runtime) {
          $prec__0 = $prec;
          $param__0 = $param;
          for (;;) {
            if ($param__0) {
              $key = $param__0[1];
              $data = $param__0[2];
              $next = $param__0[3];
              $r = V(0, $key, $data, $next);
              if ($prec__0) {
                $prec__0[3] = $r;
                $prec__0 = $r;
                $param__0 = $next;
                continue;
              }
              throw $runtime->caml_wrap_thrown_exception(
                      V(0, $Assert_failure, $qf)
                    );
            }
            return 0;
          }
        };
        $r = V(0, $key, $data, $next);
        $loop($r, $next);
        return $r;
      }
      return 0;
    };
    $copy = function($h) use ($Array,$caml_call2,$copy_bucketlist) {
      $q_ = $h[4];
      $ra = $h[3];
      $rb = $caml_call2($Array[15], $copy_bucketlist, $h[2]);
      return V(0, $h[1], $rb, $ra, $q_);
    };
    $length = function($h) {return $h[1];};
    $resize = function($indexfun, $h) use ($Sys,$caml_call2,$caml_check_bound,$caml_make_vect,$ongoing_traversal) {
      $odata = $h[2];
      $osize = $odata->length - 1;
      $nsize = $osize * 2 | 0;
      $q1 = $nsize < $Sys[14] ? 1 : (0);
      if ($q1) {
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
              $cell__1 = $inplace ? $cell__0 : (V(0, $key, $data, 0));
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
        $q3 = $osize + -1 | 0;
        $q2 = 0;
        if (! ($q3 < 0)) {
          $i__0 = $q2;
          for (;;) {
            $insert_bucket($caml_check_bound($odata, $i__0)[$i__0 + 1]);
            $q9 = $i__0 + 1 | 0;
            if ($q3 !== $i__0) {$i__0 = $q9;continue;}
            break;
          }
        }
        if ($inplace) {
          $q5 = $nsize + -1 | 0;
          $q4 = 0;
          if (! ($q5 < 0)) {
            $i = $q4;
            for (;;) {
              $match = $caml_check_bound($ndata_tail, $i)[$i + 1];
              if ($match) {$match[3] = 0;}
              $q8 = $i + 1 | 0;
              if ($q5 !== $i) {$i = $q8;continue;}
              break;
            }
          }
          $q6 = 0;
        }
        else {$q6 = $inplace;}
        $q7 = $q6;
      }
      else {$q7 = $q1;}
      return $q7;
    };
    $key_index = function($h, $key) use ($caml_hash,$runtime) {
      return 3 <= $h->length - 1
        ? $caml_hash(10, 100, $h[3], $key) & ($h[2]->length - 1 + -1 | 0)
        : ($runtime->caml_mod(
         $runtime->caml_hash_univ_param(10, 100, $key),
         $h[2]->length -
           1
       ));
    };
    $add = function($h, $key, $data) use ($caml_check_bound,$key_index,$left_shift_32,$resize) {
      $i = $key_index($h, $key);
      $bucket = V(0, $key, $data, $caml_check_bound($h[2], $i)[$i + 1]);
      $caml_check_bound($h[2], $i)[$i + 1] = $bucket;
      $h[1] = $h[1] + 1 | 0;
      $q0 = $left_shift_32($h[2]->length - 1, 1) < $h[1] ? 1 : (0);
      return $q0 ? $resize($key_index, $h) : ($q0);
    };
    $remove_bucket = function($h, $i, $key, $prec, $c) use ($caml_check_bound,$caml_compare) {
      $prec__0 = $prec;
      $c__0 = $c;
      for (;;) {
        if ($c__0) {
          $k = $c__0[1];
          $next = $c__0[3];
          if (0 === $caml_compare($k, $key)) {
            $h[1] = $h[1] + -1 | 0;
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
        throw $runtime->caml_wrap_thrown_exception($Not_found);
      }
    };
    $find = function($h, $key) use ($Not_found,$caml_check_bound,$caml_compare,$find_rec,$key_index,$runtime) {
      $qZ = $key_index($h, $key);
      $match = $caml_check_bound($h[2], $qZ)[$qZ + 1];
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
          throw $runtime->caml_wrap_thrown_exception($Not_found);
        }
        throw $runtime->caml_wrap_thrown_exception($Not_found);
      }
      throw $runtime->caml_wrap_thrown_exception($Not_found);
    };
    $find_rec_opt = function($key, $param) use ($caml_compare) {
      $param__0 = $param;
      for (;;) {
        if ($param__0) {
          $k = $param__0[1];
          $data = $param__0[2];
          $next = $param__0[3];
          if (0 === $caml_compare($key, $k)) {return V(0, $data);}
          $param__0 = $next;
          continue;
        }
        return 0;
      }
    };
    $find_opt = function($h, $key) use ($caml_check_bound,$caml_compare,$find_rec_opt,$key_index) {
      $qY = $key_index($h, $key);
      $match = $caml_check_bound($h[2], $qY)[$qY + 1];
      if ($match) {
        $k1 = $match[1];
        $d1 = $match[2];
        $next1 = $match[3];
        if (0 === $caml_compare($key, $k1)) {return V(0, $d1);}
        if ($next1) {
          $k2 = $next1[1];
          $d2 = $next1[2];
          $next2 = $next1[3];
          if (0 === $caml_compare($key, $k2)) {return V(0, $d2);}
          if ($next2) {
            $k3 = $next2[1];
            $d3 = $next2[2];
            $next3 = $next2[3];
            return 0 === $caml_compare($key, $k3)
              ? V(0, $d3)
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
      $_ = $find_in_bucket->contents =
        function($param) use ($caml_compare,$find_in_bucket,$key) {
          $param__0 = $param;
          for (;;) {
            if ($param__0) {
              $k = $param__0[1];
              $data = $param__0[2];
              $next = $param__0[3];
              if (0 === $caml_compare($k, $key)) {
                return V(0, $data, $find_in_bucket->contents($next));
              }
              $param__0 = $next;
              continue;
            }
            return 0;
          }
        };
      $qX = $key_index($h, $key);
      return $find_in_bucket->contents($caml_check_bound($h[2], $qX)[$qX + 1]);
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
      $qU = $replace_bucket($key, $data, $l);
      if ($qU) {
        $caml_check_bound($h[2], $i)[$i + 1] = V(0, $key, $data, $l);
        $h[1] = $h[1] + 1 | 0;
        $qV = $left_shift_32($h[2]->length - 1, 1) < $h[1] ? 1 : (0);
        if ($qV) {return $resize($key_index, $h);}
        $qW = $qV;
      }
      else {$qW = $qU;}
      return $qW;
    };
    $mem = function($h, $key) use ($caml_check_bound,$caml_compare,$key_index) {
      $mem_in_bucket = function($param) use ($caml_compare,$key) {
        $param__0 = $param;
        for (;;) {
          if ($param__0) {
            $k = $param__0[1];
            $next = $param__0[3];
            $qT = 0 === $caml_compare($k, $key) ? 1 : (0);
            if ($qT) {return $qT;}
            $param__0 = $next;
            continue;
          }
          return 0;
        }
      };
      $qS = $key_index($h, $key);
      return $mem_in_bucket($caml_check_bound($h[2], $qS)[$qS + 1]);
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
        $qO = $d->length - 1 + -1 | 0;
        $qN = 0;
        if (! ($qO < 0)) {
          $i = $qN;
          for (;;) {
            $do_bucket($caml_check_bound($d, $i)[$i + 1]);
            $qR = $i + 1 | 0;
            if ($qO !== $i) {$i = $qR;continue;}
            break;
          }
        }
        $qP = 1 - $old_trav;
        $qQ = $qP ? $flip_ongoing_traversal($h) : ($qP);
        return $qQ;
      }
      catch(\Throwable $exn) {
        $exn = $caml_wrap_exception($exn);
        if ($old_trav) {
          throw $runtime->caml_wrap_thrown_exception_reraise($exn);
        }
        $flip_ongoing_traversal($h);
        throw $runtime->caml_wrap_thrown_exception_reraise($exn);
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
          $h[1] = $h[1] + -1 | 0;
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
        $qK = $d->length - 1 + -1 | 0;
        $qJ = 0;
        if (! ($qK < 0)) {
          $i = $qJ;
          for (;;) {
            $filter_map_inplace_bucket(
              $f,
              $h,
              $i,
              0,
              $caml_check_bound($h[2], $i)[$i + 1]
            );
            $qM = $i + 1 | 0;
            if ($qK !== $i) {$i = $qM;continue;}
            break;
          }
        }
        $qL = 0;
        return $qL;
      }
      catch(\Throwable $exn) {
        $exn = $caml_wrap_exception($exn);
        if ($old_trav) {
          throw $runtime->caml_wrap_thrown_exception_reraise($exn);
        }
        $flip_ongoing_traversal($h);
        throw $runtime->caml_wrap_thrown_exception_reraise($exn);
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
        $accu = V(0, $init);
        $qF = $d->length - 1 + -1 | 0;
        $qE = 0;
        if (! ($qF < 0)) {
          $i = $qE;
          for (;;) {
            $qH = $accu[1];
            $accu[1] = $do_bucket($caml_check_bound($d, $i)[$i + 1], $qH);
            $qI = $i + 1 | 0;
            if ($qF !== $i) {$i = $qI;continue;}
            break;
          }
        }
        if (1 - $old_trav) {$flip_ongoing_traversal($h);}
        $qG = $accu[1];
        return $qG;
      }
      catch(\Throwable $exn) {
        $exn = $caml_wrap_exception($exn);
        if ($old_trav) {
          throw $runtime->caml_wrap_thrown_exception_reraise($exn);
        }
        $flip_ongoing_traversal($h);
        throw $runtime->caml_wrap_thrown_exception_reraise($exn);
      }
    };
    $bucket_length = function($accu, $param) {
      $accu__0 = $accu;
      $param__0 = $param;
      for (;;) {
        if ($param__0) {
          $param__1 = $param__0[3];
          $accu__1 = $accu__0 + 1 | 0;
          $accu__0 = $accu__1;
          $param__0 = $param__1;
          continue;
        }
        return $accu__0;
      }
    };
    $stats = function($h) use ($Array,$Pervasives,$bucket_length,$caml_call2,$caml_call3,$caml_check_bound,$caml_make_vect) {
      $qy = $h[2];
      $qz = 0;
      $qA = function($m, $b) use ($Pervasives,$bucket_length,$caml_call2) {
        $qD = $bucket_length(0, $b);
        return $caml_call2($Pervasives[5], $m, $qD);
      };
      $mbl = $caml_call3($Array[17], $qA, $qz, $qy);
      $histo = $caml_make_vect($mbl + 1 | 0, 0);
      $qB = $h[2];
      $qC = function($b) use ($bucket_length,$caml_check_bound,$histo) {
        $l = $bucket_length(0, $b);
        return $histo[$l + 1] = $caml_check_bound($histo, $l)[$l + 1] + 1 | 0;
      };
      $caml_call2($Array[13], $qC, $qB);
      return V(0, $h[1], $h[2]->length - 1, $mbl, $histo);
    };
    $MakeSeeded = function($H) use ($Not_found,$caml_call2,$caml_check_bound,$clear,$copy,$create,$filter_map_inplace,$fold,$iter,$left_shift_32,$length,$reset,$resize,$runtime,$stats) {
      $key_index = function($h, $key) use ($H,$caml_call2) {
        $qx = $h[2]->length - 1 + -1 | 0;
        return $caml_call2($H[2], $h[3], $key) & $qx;
      };
      $add = function($h, $key, $data) use ($caml_check_bound,$key_index,$left_shift_32,$resize) {
        $i = $key_index($h, $key);
        $bucket = V(0, $key, $data, $caml_check_bound($h[2], $i)[$i + 1]);
        $caml_check_bound($h[2], $i)[$i + 1] = $bucket;
        $h[1] = $h[1] + 1 | 0;
        $qw = $left_shift_32($h[2]->length - 1, 1) < $h[1] ? 1 : (0);
        return $qw ? $resize($key_index, $h) : ($qw);
      };
      $remove_bucket = function($h, $i, $key, $prec, $c) use ($H,$caml_call2,$caml_check_bound) {
        $prec__0 = $prec;
        $c__0 = $c;
        for (;;) {
          if ($c__0) {
            $k = $c__0[1];
            $next = $c__0[3];
            if ($caml_call2($H[1], $k, $key)) {
              $h[1] = $h[1] + -1 | 0;
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
          throw $runtime->caml_wrap_thrown_exception($Not_found);
        }
      };
      $find = function($h, $key) use ($H,$Not_found,$caml_call2,$caml_check_bound,$find_rec,$key_index,$runtime) {
        $qv = $key_index($h, $key);
        $match = $caml_check_bound($h[2], $qv)[$qv + 1];
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
            throw $runtime->caml_wrap_thrown_exception($Not_found);
          }
          throw $runtime->caml_wrap_thrown_exception($Not_found);
        }
        throw $runtime->caml_wrap_thrown_exception($Not_found);
      };
      $find_rec_opt = function($key, $param) use ($H,$caml_call2) {
        $param__0 = $param;
        for (;;) {
          if ($param__0) {
            $k = $param__0[1];
            $data = $param__0[2];
            $next = $param__0[3];
            if ($caml_call2($H[1], $key, $k)) {return V(0, $data);}
            $param__0 = $next;
            continue;
          }
          return 0;
        }
      };
      $find_opt = function($h, $key) use ($H,$caml_call2,$caml_check_bound,$find_rec_opt,$key_index) {
        $qu = $key_index($h, $key);
        $match = $caml_check_bound($h[2], $qu)[$qu + 1];
        if ($match) {
          $k1 = $match[1];
          $d1 = $match[2];
          $next1 = $match[3];
          if ($caml_call2($H[1], $key, $k1)) {return V(0, $d1);}
          if ($next1) {
            $k2 = $next1[1];
            $d2 = $next1[2];
            $next2 = $next1[3];
            if ($caml_call2($H[1], $key, $k2)) {return V(0, $d2);}
            if ($next2) {
              $k3 = $next2[1];
              $d3 = $next2[2];
              $next3 = $next2[3];
              return $caml_call2($H[1], $key, $k3)
                ? V(0, $d3)
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
        $_ = $find_in_bucket->contents =
          function($param) use ($H,$caml_call2,$find_in_bucket,$key) {
            $param__0 = $param;
            for (;;) {
              if ($param__0) {
                $k = $param__0[1];
                $d = $param__0[2];
                $next = $param__0[3];
                if ($caml_call2($H[1], $k, $key)) {
                  return V(0, $d, $find_in_bucket->contents($next));
                }
                $param__0 = $next;
                continue;
              }
              return 0;
            }
          };
        $qt = $key_index($h, $key);
        return $find_in_bucket->contents(
          $caml_check_bound($h[2], $qt)[$qt + 1]
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
        $qq = $replace_bucket($key, $data, $l);
        if ($qq) {
          $caml_check_bound($h[2], $i)[$i + 1] = V(0, $key, $data, $l);
          $h[1] = $h[1] + 1 | 0;
          $qr = $left_shift_32($h[2]->length - 1, 1) < $h[1] ? 1 : (0);
          if ($qr) {return $resize($key_index, $h);}
          $qs = $qr;
        }
        else {$qs = $qq;}
        return $qs;
      };
      $mem = function($h, $key) use ($H,$caml_call2,$caml_check_bound,$key_index) {
        $mem_in_bucket = function($param) use ($H,$caml_call2,$key) {
          $param__0 = $param;
          for (;;) {
            if ($param__0) {
              $k = $param__0[1];
              $next = $param__0[3];
              $qp = $caml_call2($H[1], $k, $key);
              if ($qp) {return $qp;}
              $param__0 = $next;
              continue;
            }
            return 0;
          }
        };
        $qo = $key_index($h, $key);
        return $mem_in_bucket($caml_check_bound($h[2], $qo)[$qo + 1]);
      };
      return V(
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
      );
    };
    $Make = function($H) use ($MakeSeeded,$caml_call1,$caml_call2,$qg) {
      $equal = $H[1];
      $hash = function($seed, $x) use ($H,$caml_call1) {
        return $caml_call1($H[2], $x);
      };
      $include = $MakeSeeded(V(0, $equal, $hash));
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
      $qn = $include[1];
      $create = function($sz) use ($caml_call2,$qg,$qn) {
        return $caml_call2($qn, $qg, $sz);
      };
      return V(
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
      );
    };
    $Hashtbl = V(
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
      function($qm, $ql, $qk, $qj) use ($caml_hash) {
        return $caml_hash($qm, $ql, $qk, $qj);
      }
    );
    
    $runtime->caml_register_global(13, $Hashtbl, "Hashtbl");

  }
}