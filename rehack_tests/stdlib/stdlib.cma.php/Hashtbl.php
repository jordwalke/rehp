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
    $call1 = $runtime["caml_call1"];
    $call2 = $runtime["caml_call2"];
    $call3 = $runtime["caml_call3"];
    $caml_check_bound = $runtime["caml_check_bound"];
    $caml_compare = $runtime["caml_compare"];
    $caml_hash = $runtime["caml_hash"];
    $caml_make_vect = $runtime["caml_make_vect"];
    $string = $runtime["caml_new_string"];
    $caml_sys_getenv = $runtime["caml_sys_getenv"];
    $caml_wrap_exception = $runtime["caml_wrap_exception"];
    $left_shift_32 = $runtime["left_shift_32"];
    $global_data = $runtime["caml_get_global_data"]();
    $cst_OCAMLRUNPARAM = $string("OCAMLRUNPARAM");
    $cst_CAMLRUNPARAM = $string("CAMLRUNPARAM");
    $cst = $string("");
    $Sys = $global_data["Sys"];
    $Not_found = $global_data["Not_found"];
    $Pervasives = $global_data["Pervasives"];
    $Array = $global_data["Array_"];
    $Assert_failure = $global_data["Assert_failure"];
    $CamlinternalLazy = $global_data["CamlinternalLazy"];
    $Random = $global_data["Random"];
    $String = $global_data["String_"];
    $c = Vector{0, 0};
    $b = Vector{0, $string("hashtbl.ml"), 108, 23};
    $hash = function(dynamic $x) use ($caml_hash) {
      return $caml_hash(10, 100, 0, $x);
    };
    $hash_param = function(dynamic $n1, dynamic $n2, dynamic $x) use ($caml_hash) {
      return $caml_hash($n1, $n2, 0, $x);
    };
    $seeded_hash = function(dynamic $seed, dynamic $x) use ($caml_hash) {
      return $caml_hash(10, 100, $seed, $x);
    };
    $ongoing_traversal = function(dynamic $h) {
      $ar = $h->count() - 1 < 4 ? 1 : (0);
      $as = $ar ? $ar : ($h[4] < 0 ? 1 : (0));
      return $as;
    };
    $flip_ongoing_traversal = function(dynamic $h) {
      $h[4] = (int) - $h[4];
      return 0;
    };
    
    try {$e = $caml_sys_getenv($cst_OCAMLRUNPARAM);$params = $e;}
    catch(\Throwable $ap) {
      $ap = $caml_wrap_exception($ap);
      if ($ap !== $Not_found) {
        throw $runtime["caml_wrap_thrown_exception_reraise"]($ap) as \Throwable;
      }
      try {$d = $caml_sys_getenv($cst_CAMLRUNPARAM);$a = $d;}
      catch(\Throwable $aq) {
        $aq = $caml_wrap_exception($aq);
        if ($aq !== $Not_found) {
          throw $runtime["caml_wrap_thrown_exception_reraise"]($aq) as \Throwable;
        }
        $a = $cst;
      }
      $params = $a;
    }
    
    $randomized_default = $call2($String[22], $params, 82);
    $randomized = Vector{0, $randomized_default};
    $randomize = function(dynamic $param) use ($randomized) {
      $randomized[1] = 1;
      return 0;
    };
    $is_randomized = function(dynamic $param) use ($randomized) {
      return $randomized[1];
    };
    $prng = Vector{
      246,
      function(dynamic $ao) use ($Random,$call1) {
        return $call1($Random[11][2], 0);
      }
    };
    $power_2_above = function(dynamic $x, dynamic $n) use ($Sys) {
      $x__0 = $x;
      for (;;) {
        if ($n <= $x__0) {return $x__0;}
        if ($Sys[14] < (int) ($x__0 * 2)) {return $x__0;}
        $x__1 = (int) ($x__0 * 2);
        $x__0 = $x__1;
        continue;
      }
    };
    $create = function(dynamic $opt, dynamic $initial_size) use ($CamlinternalLazy,$Random,$call1,$caml_make_vect,$power_2_above,$prng,$randomized,$runtime) {
      if ($opt) {
        $sth = $opt[1];
        $random = $sth;
      }
      else {$random = $randomized[1];}
      $s = $power_2_above(16, $initial_size);
      if ($random) {
        $am = $runtime["caml_obj_tag"]($prng);
        $an = 250 === $am
          ? $prng[1]
          : (246 === $am ? $call1($CamlinternalLazy[2], $prng) : ($prng));
        $seed = $call1($Random[11][4], $an);
      }
      else {$seed = 0;}
      return Vector{0, 0, $caml_make_vect($s, 0), $seed, $s};
    };
    $clear = function(dynamic $h) use ($caml_check_bound) {
      $h[1] = 0;
      $len = $h[2]->count() - 1;
      $ak = (int) ($len + -1);
      $aj = 0;
      if (! ($ak < 0)) {
        $i = $aj;
        for (;;) {
          $caml_check_bound($h[2], $i)[$i + 1] = 0;
          $al = (int) ($i + 1);
          if ($ak !== $i) {$i = $al;continue;}
          break;
        }
      }
      return 0;
    };
    $reset = function(dynamic $h) use ($Pervasives,$call1,$caml_make_vect,$clear) {
      $len = $h[2]->count() - 1;
      if (4 <= $h->count() - 1) {
        if ($len !== $call1($Pervasives[6], $h[4])) {
          $h[1] = 0;
          $h[2] = $caml_make_vect($call1($Pervasives[6], $h[4]), 0);
          return 0;
        }
      }
      return $clear($h);
    };
    $copy_bucketlist = function(dynamic $param) use ($Assert_failure,$b,$runtime) {
      if ($param) {
        $key = $param[1];
        $data = $param[2];
        $next = $param[3];
        $loop = function(dynamic $prec, dynamic $param) use ($Assert_failure,$b,$runtime) {
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
              throw $runtime["caml_wrap_thrown_exception"](Vector{0, $Assert_failure, $b}) as \Throwable;
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
    $copy = function(dynamic $h) use ($Array,$call2,$copy_bucketlist) {
      $ag = $h[4];
      $ah = $h[3];
      $ai = $call2($Array[15], $copy_bucketlist, $h[2]);
      return Vector{0, $h[1], $ai, $ah, $ag};
    };
    $length = function(dynamic $h) {return $h[1];};
    $resize = function(dynamic $indexfun, dynamic $h) use ($Sys,$call2,$caml_check_bound,$caml_make_vect,$ongoing_traversal) {
      $odata = $h[2];
      $osize = $odata->count() - 1;
      $nsize = (int) ($osize * 2);
      $X = $nsize < $Sys[14] ? 1 : (0);
      if ($X) {
        $ndata = $caml_make_vect($nsize, 0);
        $ndata_tail = $caml_make_vect($nsize, 0);
        $inplace = 1 - $ongoing_traversal($h);
        $h[2] = $ndata;
        $insert_bucket = function(dynamic $cell) use ($call2,$caml_check_bound,$h,$indexfun,$inplace,$ndata,$ndata_tail) {
          $cell__0 = $cell;
          for (;;) {
            if ($cell__0) {
              $key = $cell__0[1];
              $data = $cell__0[2];
              $next = $cell__0[3];
              $cell__1 = $inplace ? $cell__0 : (Vector{0, $key, $data, 0});
              $nidx = $call2($indexfun, $h, $key);
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
        $Z = (int) ($osize + -1);
        $Y = 0;
        if (! ($Z < 0)) {
          $i__0 = $Y;
          for (;;) {
            $insert_bucket($caml_check_bound($odata, $i__0)[$i__0 + 1]);
            $af = (int) ($i__0 + 1);
            if ($Z !== $i__0) {$i__0 = $af;continue;}
            break;
          }
        }
        if ($inplace) {
          $ab = (int) ($nsize + -1);
          $aa = 0;
          if (! ($ab < 0)) {
            $i = $aa;
            for (;;) {
              $match = $caml_check_bound($ndata_tail, $i)[$i + 1];
              if ($match) {$match[3] = 0;}
              $ae = (int) ($i + 1);
              if ($ab !== $i) {$i = $ae;continue;}
              break;
            }
          }
          $ac = 0;
        }
        else {$ac = $inplace;}
        $ad = $ac;
      }
      else {$ad = $X;}
      return $ad;
    };
    $key_index = function(dynamic $h, dynamic $key) use ($caml_hash,$runtime) {
      return 3 <= $h->count() - 1
        ? $caml_hash(10, 100, $h[3], $key) & (int) ($h[2]->count() - 1 + -1)
        : ($runtime["caml_mod"](
         $runtime["caml_hash_univ_param"](10, 100, $key),
         $h[2]->count() -
           1
       ));
    };
    $add = function(dynamic $h, dynamic $key, dynamic $data) use ($caml_check_bound,$key_index,$left_shift_32,$resize) {
      $i = $key_index($h, $key);
      $bucket = Vector{0, $key, $data, $caml_check_bound($h[2], $i)[$i + 1]};
      $caml_check_bound($h[2], $i)[$i + 1] = $bucket;
      $h[1] = (int) ($h[1] + 1);
      $W = $left_shift_32($h[2]->count() - 1, 1) < $h[1] ? 1 : (0);
      return $W ? $resize($key_index, $h) : ($W);
    };
    $remove_bucket = function
    (dynamic $h, dynamic $i, dynamic $key, dynamic $prec, dynamic $c) use ($caml_check_bound,$caml_compare) {
      $prec__0 = $prec;
      $c__0 = $c;
      for (;;) {
        if ($c__0) {
          $k = $c__0[1];
          $next = $c__0[3];
          if (0 === $caml_compare($k, $key)) {
            $h[1] = (int) ($h[1] + -1);
            if ($prec__0) {$prec__0[3] = $next;return 0;}
            $caml_check_bound($h[2], $i)[$i + 1] = $next;
            return 0;
          }
          $prec__0 = $c__0;
          $c__0 = $next;
          continue;
        }
        return 0;
      }
    };
    $remove = function(dynamic $h, dynamic $key) use ($caml_check_bound,$key_index,$remove_bucket) {
      $i = $key_index($h, $key);
      return $remove_bucket(
        $h,
        $i,
        $key,
        0,
        $caml_check_bound($h[2], $i)[$i + 1]
      );
    };
    $find_rec = function(dynamic $key, dynamic $param) use ($Not_found,$caml_compare,$runtime) {
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
    $find = function(dynamic $h, dynamic $key) use ($Not_found,$caml_check_bound,$caml_compare,$find_rec,$key_index,$runtime) {
      $V = $key_index($h, $key);
      $match = $caml_check_bound($h[2], $V)[$V + 1];
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
    $find_rec_opt = function(dynamic $key, dynamic $param) use ($caml_compare) {
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
    $find_opt = function(dynamic $h, dynamic $key) use ($caml_check_bound,$caml_compare,$find_rec_opt,$key_index) {
      $U = $key_index($h, $key);
      $match = $caml_check_bound($h[2], $U)[$U + 1];
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
    $find_all = function(dynamic $h, dynamic $key) use ($caml_check_bound,$caml_compare,$key_index) {
      $find_in_bucket = new Ref();
      $find_in_bucket->contents = function(dynamic $param) use ($caml_compare,$find_in_bucket,$key) {
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
      $T = $key_index($h, $key);
      return $find_in_bucket->contents($caml_check_bound($h[2], $T)[$T + 1]);
    };
    $replace_bucket = function(dynamic $key, dynamic $data, dynamic $param) use ($caml_compare) {
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
    $replace = function(dynamic $h, dynamic $key, dynamic $data) use ($caml_check_bound,$key_index,$left_shift_32,$replace_bucket,$resize) {
      $i = $key_index($h, $key);
      $l = $caml_check_bound($h[2], $i)[$i + 1];
      $Q = $replace_bucket($key, $data, $l);
      if ($Q) {
        $caml_check_bound($h[2], $i)[$i + 1] = Vector{0, $key, $data, $l};
        $h[1] = (int) ($h[1] + 1);
        $R = $left_shift_32($h[2]->count() - 1, 1) < $h[1] ? 1 : (0);
        if ($R) {return $resize($key_index, $h);}
        $S = $R;
      }
      else {$S = $Q;}
      return $S;
    };
    $mem = function(dynamic $h, dynamic $key) use ($caml_check_bound,$caml_compare,$key_index) {
      $mem_in_bucket = function(dynamic $param) use ($caml_compare,$key) {
        $param__0 = $param;
        for (;;) {
          if ($param__0) {
            $k = $param__0[1];
            $next = $param__0[3];
            $P = 0 === $caml_compare($k, $key) ? 1 : (0);
            if ($P) {return $P;}
            $param__0 = $next;
            continue;
          }
          return 0;
        }
      };
      $O = $key_index($h, $key);
      return $mem_in_bucket($caml_check_bound($h[2], $O)[$O + 1]);
    };
    $iter = function(dynamic $f, dynamic $h) use ($call2,$caml_check_bound,$caml_wrap_exception,$flip_ongoing_traversal,$ongoing_traversal,$runtime) {
      $do_bucket = function(dynamic $param) use ($call2,$f) {
        $param__0 = $param;
        for (;;) {
          if ($param__0) {
            $key = $param__0[1];
            $data = $param__0[2];
            $param__1 = $param__0[3];
            $call2($f, $key, $data);
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
        $K = (int) ($d->count() - 1 + -1);
        $J = 0;
        if (! ($K < 0)) {
          $i = $J;
          for (;;) {
            $do_bucket($caml_check_bound($d, $i)[$i + 1]);
            $N = (int) ($i + 1);
            if ($K !== $i) {$i = $N;continue;}
            break;
          }
        }
        $L = 1 - $old_trav;
        $M = $L ? $flip_ongoing_traversal($h) : ($L);
        return $M;
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
    $filter_map_inplace_bucket = function
    (dynamic $f, dynamic $h, dynamic $i, dynamic $prec, dynamic $slot) use ($call2,$caml_check_bound) {
      $prec__0 = $prec;
      $slot__0 = $slot;
      for (;;) {
        if ($slot__0) {
          $key = $slot__0[1];
          $data = $slot__0[2];
          $next = $slot__0[3];
          $match = $call2($f, $key, $data);
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
        if ($prec__0) {$prec__0[3] = 0;return 0;}
        $caml_check_bound($h[2], $i)[$i + 1] = 0;
        return 0;
      }
    };
    $filter_map_inplace = function(dynamic $f, dynamic $h) use ($caml_check_bound,$caml_wrap_exception,$filter_map_inplace_bucket,$flip_ongoing_traversal,$ongoing_traversal,$runtime) {
      $d = $h[2];
      $old_trav = $ongoing_traversal($h);
      if (1 - $old_trav) {$flip_ongoing_traversal($h);}
      try {
        $G = (int) ($d->count() - 1 + -1);
        $F = 0;
        if (! ($G < 0)) {
          $i = $F;
          for (;;) {
            $filter_map_inplace_bucket(
              $f,
              $h,
              $i,
              0,
              $caml_check_bound($h[2], $i)[$i + 1]
            );
            $I = (int) ($i + 1);
            if ($G !== $i) {$i = $I;continue;}
            break;
          }
        }
        $H = 0;
        return $H;
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
    $fold = function(dynamic $f, dynamic $h, dynamic $init) use ($call3,$caml_check_bound,$caml_wrap_exception,$flip_ongoing_traversal,$ongoing_traversal,$runtime) {
      $do_bucket = function(dynamic $b, dynamic $accu) use ($call3,$f) {
        $b__0 = $b;
        $accu__0 = $accu;
        for (;;) {
          if ($b__0) {
            $key = $b__0[1];
            $data = $b__0[2];
            $b__1 = $b__0[3];
            $accu__1 = $call3($f, $key, $data, $accu__0);
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
        $B = (int) ($d->count() - 1 + -1);
        $A = 0;
        if (! ($B < 0)) {
          $i = $A;
          for (;;) {
            $D = $accu[1];
            $accu[1] = $do_bucket($caml_check_bound($d, $i)[$i + 1], $D);
            $E = (int) ($i + 1);
            if ($B !== $i) {$i = $E;continue;}
            break;
          }
        }
        if (1 - $old_trav) {$flip_ongoing_traversal($h);}
        $C = $accu[1];
        return $C;
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
    $bucket_length = function(dynamic $accu, dynamic $param) {
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
    $stats = function(dynamic $h) use ($Array,$Pervasives,$bucket_length,$call2,$call3,$caml_check_bound,$caml_make_vect) {
      $u = $h[2];
      $v = 0;
      $w = function(dynamic $m, dynamic $b) use ($Pervasives,$bucket_length,$call2) {
        $z = $bucket_length(0, $b);
        return $call2($Pervasives[5], $m, $z);
      };
      $mbl = $call3($Array[17], $w, $v, $u);
      $histo = $caml_make_vect((int) ($mbl + 1), 0);
      $x = $h[2];
      $y = function(dynamic $b) use ($bucket_length,$caml_check_bound,$histo) {
        $l = $bucket_length(0, $b);
        $histo[$l + 1] = (int) ($caml_check_bound($histo, $l)[$l + 1] + 1);
        return 0;
      };
      $call2($Array[13], $y, $x);
      return Vector{0, $h[1], $h[2]->count() - 1, $mbl, $histo};
    };
    $MakeSeeded = function(dynamic $H) use ($Not_found,$call2,$caml_check_bound,$clear,$copy,$create,$filter_map_inplace,$fold,$iter,$left_shift_32,$length,$reset,$resize,$runtime,$stats) {
      $key_index = function(dynamic $h, dynamic $key) use ($H,$call2) {
        $t = (int) ($h[2]->count() - 1 + -1);
        return $call2($H[2], $h[3], $key) & $t;
      };
      $add = function(dynamic $h, dynamic $key, dynamic $data) use ($caml_check_bound,$key_index,$left_shift_32,$resize) {
        $i = $key_index($h, $key);
        $bucket = Vector{0, $key, $data, $caml_check_bound($h[2], $i)[$i + 1]};
        $caml_check_bound($h[2], $i)[$i + 1] = $bucket;
        $h[1] = (int) ($h[1] + 1);
        $s = $left_shift_32($h[2]->count() - 1, 1) < $h[1] ? 1 : (0);
        return $s ? $resize($key_index, $h) : ($s);
      };
      $remove_bucket = function
      (dynamic $h, dynamic $i, dynamic $key, dynamic $prec, dynamic $c) use ($H,$call2,$caml_check_bound) {
        $prec__0 = $prec;
        $c__0 = $c;
        for (;;) {
          if ($c__0) {
            $k = $c__0[1];
            $next = $c__0[3];
            if ($call2($H[1], $k, $key)) {
              $h[1] = (int) ($h[1] + -1);
              if ($prec__0) {$prec__0[3] = $next;return 0;}
              $caml_check_bound($h[2], $i)[$i + 1] = $next;
              return 0;
            }
            $prec__0 = $c__0;
            $c__0 = $next;
            continue;
          }
          return 0;
        }
      };
      $remove = function(dynamic $h, dynamic $key) use ($caml_check_bound,$key_index,$remove_bucket) {
        $i = $key_index($h, $key);
        return $remove_bucket(
          $h,
          $i,
          $key,
          0,
          $caml_check_bound($h[2], $i)[$i + 1]
        );
      };
      $find_rec = function(dynamic $key, dynamic $param) use ($H,$Not_found,$call2,$runtime) {
        $param__0 = $param;
        for (;;) {
          if ($param__0) {
            $k = $param__0[1];
            $data = $param__0[2];
            $next = $param__0[3];
            if ($call2($H[1], $key, $k)) {return $data;}
            $param__0 = $next;
            continue;
          }
          throw $runtime["caml_wrap_thrown_exception"]($Not_found) as \Throwable;
        }
      };
      $find = function(dynamic $h, dynamic $key) use ($H,$Not_found,$call2,$caml_check_bound,$find_rec,$key_index,$runtime) {
        $r = $key_index($h, $key);
        $match = $caml_check_bound($h[2], $r)[$r + 1];
        if ($match) {
          $k1 = $match[1];
          $d1 = $match[2];
          $next1 = $match[3];
          if ($call2($H[1], $key, $k1)) {return $d1;}
          if ($next1) {
            $k2 = $next1[1];
            $d2 = $next1[2];
            $next2 = $next1[3];
            if ($call2($H[1], $key, $k2)) {return $d2;}
            if ($next2) {
              $k3 = $next2[1];
              $d3 = $next2[2];
              $next3 = $next2[3];
              return $call2($H[1], $key, $k3)
                ? $d3
                : ($find_rec($key, $next3));
            }
            throw $runtime["caml_wrap_thrown_exception"]($Not_found) as \Throwable;
          }
          throw $runtime["caml_wrap_thrown_exception"]($Not_found) as \Throwable;
        }
        throw $runtime["caml_wrap_thrown_exception"]($Not_found) as \Throwable;
      };
      $find_rec_opt = function(dynamic $key, dynamic $param) use ($H,$call2) {
        $param__0 = $param;
        for (;;) {
          if ($param__0) {
            $k = $param__0[1];
            $data = $param__0[2];
            $next = $param__0[3];
            if ($call2($H[1], $key, $k)) {return Vector{0, $data};}
            $param__0 = $next;
            continue;
          }
          return 0;
        }
      };
      $find_opt = function(dynamic $h, dynamic $key) use ($H,$call2,$caml_check_bound,$find_rec_opt,$key_index) {
        $q = $key_index($h, $key);
        $match = $caml_check_bound($h[2], $q)[$q + 1];
        if ($match) {
          $k1 = $match[1];
          $d1 = $match[2];
          $next1 = $match[3];
          if ($call2($H[1], $key, $k1)) {return Vector{0, $d1};}
          if ($next1) {
            $k2 = $next1[1];
            $d2 = $next1[2];
            $next2 = $next1[3];
            if ($call2($H[1], $key, $k2)) {return Vector{0, $d2};}
            if ($next2) {
              $k3 = $next2[1];
              $d3 = $next2[2];
              $next3 = $next2[3];
              return $call2($H[1], $key, $k3)
                ? Vector{0, $d3}
                : ($find_rec_opt($key, $next3));
            }
            return 0;
          }
          return 0;
        }
        return 0;
      };
      $find_all = function(dynamic $h, dynamic $key) use ($H,$call2,$caml_check_bound,$key_index) {
        $find_in_bucket = new Ref();
        $find_in_bucket->contents = function(dynamic $param) use ($H,$call2,$find_in_bucket,$key) {
          $param__0 = $param;
          for (;;) {
            if ($param__0) {
              $k = $param__0[1];
              $d = $param__0[2];
              $next = $param__0[3];
              if ($call2($H[1], $k, $key)) {
                return Vector{0, $d, $find_in_bucket->contents($next)};
              }
              $param__0 = $next;
              continue;
            }
            return 0;
          }
        };
        $p = $key_index($h, $key);
        return $find_in_bucket->contents($caml_check_bound($h[2], $p)[$p + 1]);
      };
      $replace_bucket = function(dynamic $key, dynamic $data, dynamic $param) use ($H,$call2) {
        $param__0 = $param;
        for (;;) {
          if ($param__0) {
            $k = $param__0[1];
            $next = $param__0[3];
            if ($call2($H[1], $k, $key)) {
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
      $replace = function(dynamic $h, dynamic $key, dynamic $data) use ($caml_check_bound,$key_index,$left_shift_32,$replace_bucket,$resize) {
        $i = $key_index($h, $key);
        $l = $caml_check_bound($h[2], $i)[$i + 1];
        $m = $replace_bucket($key, $data, $l);
        if ($m) {
          $caml_check_bound($h[2], $i)[$i + 1] = Vector{0, $key, $data, $l};
          $h[1] = (int) ($h[1] + 1);
          $n = $left_shift_32($h[2]->count() - 1, 1) < $h[1] ? 1 : (0);
          if ($n) {return $resize($key_index, $h);}
          $o = $n;
        }
        else {$o = $m;}
        return $o;
      };
      $mem = function(dynamic $h, dynamic $key) use ($H,$call2,$caml_check_bound,$key_index) {
        $mem_in_bucket = function(dynamic $param) use ($H,$call2,$key) {
          $param__0 = $param;
          for (;;) {
            if ($param__0) {
              $k = $param__0[1];
              $next = $param__0[3];
              $l = $call2($H[1], $k, $key);
              if ($l) {return $l;}
              $param__0 = $next;
              continue;
            }
            return 0;
          }
        };
        $k = $key_index($h, $key);
        return $mem_in_bucket($caml_check_bound($h[2], $k)[$k + 1]);
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
    $Make = function(dynamic $H) use ($MakeSeeded,$c,$call1,$call2) {
      $equal = $H[1];
      $hash = function(dynamic $seed, dynamic $x) use ($H,$call1) {
        return $call1($H[2], $x);
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
      $j = $include[1];
      $create = function(dynamic $sz) use ($c,$call2,$j) {
        return $call2($j, $c, $sz);
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
      function(dynamic $i, dynamic $h, dynamic $g, dynamic $f) use ($caml_hash) {return $caml_hash($i, $h, $g, $f);
      }
    };
    
    $runtime["caml_register_global"](13, $Hashtbl, "Hashtbl");

  }
}

/*____hashes compiler:hashing-disabled inputs:hashing-disabled bytecode:hashing-disabled*/
