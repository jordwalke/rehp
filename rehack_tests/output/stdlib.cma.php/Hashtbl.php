<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class Hashtbl {
  <<__Override, __Memoize>>
  public static function get() : Vector<dynamic> {
    
    $runtime = (\Rehack\GlobalObject::get() as dynamic)->jsoo_runtime;
    $a_ = null as dynamic;
    $params = null as dynamic;
    $d_ = null as dynamic;
    $e_ = null as dynamic;
    $call1 = $runtime["caml_call1"];
    $call2 = $runtime["caml_call2"];
    $call3 = $runtime["caml_call3"];
    $caml_check_bound = $runtime["caml_check_bound"];
    $caml_compare = $runtime["caml_compare"];
    $caml_hash = $runtime["caml_hash"];
    $caml_make_vect = $runtime["caml_make_vect"];
    $string = $runtime["caml_new_string"];
    $caml_sys_getenv = $runtime["caml_sys_getenv"];
    $caml_wrap_thrown_exception = $runtime["caml_wrap_thrown_exception"];
    $caml_wrap_thrown_exception_reraise = $runtime[
       "caml_wrap_thrown_exception_reraise"
     ];
    $left_shift_32 = $runtime["left_shift_32"];
    $cst_OCAMLRUNPARAM = $string("OCAMLRUNPARAM");
    $cst_CAMLRUNPARAM = $string("CAMLRUNPARAM");
    $cst = $string("");
    $Sys = Sys::get();
    $Not_found = Not_found::get();
    $Pervasives = Pervasives::get();
    $Array = Array_::get();
    $Assert_failure = Assert_failure::get();
    $CamlinternalLazy = CamlinternalLazy::get();
    $Random = Random::get();
    $String = String_::get();
    $c_ = Vector{0, 0} as dynamic;
    $b_ = Vector{0, $string("hashtbl.ml"), 108, 23} as dynamic;
    $hash = (dynamic $x) : dynamic ==> {return $caml_hash(10, 100, 0, $x);};
    $hash_param = (dynamic $n1, dynamic $n2, dynamic $x) : dynamic ==> {
      return $caml_hash($n1, $n2, 0, $x);
    };
    $seeded_hash = (dynamic $seed, dynamic $x) : dynamic ==> {
      return $caml_hash(10, 100, $seed, $x);
    };
    $ongoing_traversal = (dynamic $h) : dynamic ==> {
      $ar_ = $h->count() - 1 < 4 ? 1 : (0);
      $as_ = $ar_ ? $ar_ : ($h[4] < 0 ? 1 : (0));
      return $as_;
    };
    $flip_ongoing_traversal = (dynamic $h) : dynamic ==> {
      $h[4] = (int) - $h[4];
      return 0;
    };
    
    try {$e_ = $caml_sys_getenv($cst_OCAMLRUNPARAM);$params = $e_;}
    catch(\Throwable $ap_) {
      $ap_ = $runtime["caml_wrap_exception"]($ap_);
      if ($ap_ !== $Not_found) {
        throw $caml_wrap_thrown_exception_reraise($ap_) as \Throwable;
      }
      try {$d_ = $caml_sys_getenv($cst_CAMLRUNPARAM);$a_ = $d_;}
      catch(\Throwable $aq_) {
        $aq_ = $runtime["caml_wrap_exception"]($aq_);
        if ($aq_ !== $Not_found) {
          throw $caml_wrap_thrown_exception_reraise($aq_) as \Throwable;
        }
        $a_ = $cst;
      }
      $params = $a_;
    }
    
    $randomized_default = $call2($String[22], $params, 82);
    $randomized = Vector{0, $randomized_default} as dynamic;
    $randomize = (dynamic $param) : dynamic ==> {$randomized[1] = 1;return 0;};
    $is_randomized = (dynamic $param) : dynamic ==> {return $randomized[1];};
    $prng = Vector{
      246,
      (dynamic $ao_) : dynamic ==> {return $call1($Random[11][2], 0);}
    } as dynamic;
    $power_2_above = (dynamic $x, dynamic $n) : dynamic ==> {
      $x__1 = null as dynamic;
      $x__0 = $x;
      for (;;) {
        if ($n <= $x__0) {return $x__0;}
        if ($Sys[14] < (int) ($x__0 * 2)) {return $x__0;}
        $x__1 = (int) ($x__0 * 2) as dynamic;
        $x__0 = $x__1;
        continue;
      }
    };
    $create = (dynamic $opt, dynamic $initial_size) : dynamic ==> {
      $seed = null as dynamic;
      $an_ = null as dynamic;
      $am_ = null as dynamic;
      $random = null as dynamic;
      $sth = null as dynamic;
      if ($opt) {
        $sth = $opt[1];
        $random = $sth;
      }
      else {$random = $randomized[1];}
      $s = $power_2_above(16, $initial_size);
      if ($random) {
        $am_ = $runtime["caml_obj_tag"]($prng);
        $an_ =
          250 === $am_
            ? $prng[1]
            : (246 === $am_ ? $call1($CamlinternalLazy[2], $prng) : ($prng));
        $seed = $call1($Random[11][4], $an_);
      }
      else {$seed = 0 as dynamic;}
      return Vector{0, 0, $caml_make_vect($s, 0), $seed, $s};
    };
    $clear = (dynamic $h) : dynamic ==> {
      $al_ = null as dynamic;
      $i = null as dynamic;
      $h[1] = 0;
      $len = $h[2]->count() - 1;
      $ak_ = (int) ($len + -1) as dynamic;
      $aj_ = 0 as dynamic;
      if (! ($ak_ < 0)) {
        $i = $aj_;
        for (;;) {
          $caml_check_bound($h[2], $i)[$i + 1] = 0;
          $al_ = (int) ($i + 1) as dynamic;
          if ($ak_ !== $i) {$i = $al_;continue;}
          break;
        }
      }
      return 0;
    };
    $reset = (dynamic $h) : dynamic ==> {
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
    $copy_bucketlist = (dynamic $param) : dynamic ==> {
      $r = null as dynamic;
      $loop = null as dynamic;
      $next = null as dynamic;
      $data = null as dynamic;
      $key = null as dynamic;
      if ($param) {
        $key = $param[1];
        $data = $param[2];
        $next = $param[3];
        $loop =
          (dynamic $prec, dynamic $param) : dynamic ==> {
            $key = null as dynamic;
            $data = null as dynamic;
            $next = null as dynamic;
            $r = null as dynamic;
            $prec__0 = $prec;
            $param__0 = $param;
            for (;;) {
              if ($param__0) {
                $key = $param__0[1];
                $data = $param__0[2];
                $next = $param__0[3];
                $r = Vector{0, $key, $data, $next} as dynamic;
                if ($prec__0) {
                  $prec__0[3] = $r;
                  $prec__0 = $r;
                  $param__0 = $next;
                  continue;
                }
                throw $caml_wrap_thrown_exception(
                        Vector{0, $Assert_failure, $b_}
                      ) as \Throwable;
              }
              return 0;
            }
          };
        $r = Vector{0, $key, $data, $next} as dynamic;
        $loop($r, $next);
        return $r;
      }
      return 0;
    };
    $copy = (dynamic $h) : dynamic ==> {
      $ag_ = $h[4];
      $ah_ = $h[3];
      $ai_ = $call2($Array[15], $copy_bucketlist, $h[2]);
      return Vector{0, $h[1], $ai_, $ah_, $ag_};
    };
    $length = (dynamic $h) : dynamic ==> {return $h[1];};
    $resize = (dynamic $indexfun, dynamic $h) : dynamic ==> {
      $ndata = null as dynamic;
      $ndata_tail = null as dynamic;
      $inplace = null as dynamic;
      $insert_bucket = null as dynamic;
      $Y_ = null as dynamic;
      $Z_ = null as dynamic;
      $aa_ = null as dynamic;
      $ab_ = null as dynamic;
      $ac_ = null as dynamic;
      $ad_ = null as dynamic;
      $i = null as dynamic;
      $match = null as dynamic;
      $ae_ = null as dynamic;
      $i__0 = null as dynamic;
      $af_ = null as dynamic;
      $odata = $h[2];
      $osize = $odata->count() - 1;
      $nsize = (int) ($osize * 2) as dynamic;
      $X_ = $nsize < $Sys[14] ? 1 : (0);
      if ($X_) {
        $ndata = $caml_make_vect($nsize, 0);
        $ndata_tail = $caml_make_vect($nsize, 0);
        $inplace = 1 - $ongoing_traversal($h);
        $h[2] = $ndata;
        $insert_bucket =
          (dynamic $cell) : dynamic ==> {
            $key = null as dynamic;
            $data = null as dynamic;
            $next = null as dynamic;
            $cell__1 = null as dynamic;
            $nidx = null as dynamic;
            $match = null as dynamic;
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
        $Z_ = (int) ($osize + -1) as dynamic;
        $Y_ = 0 as dynamic;
        if (! ($Z_ < 0)) {
          $i__0 = $Y_;
          for (;;) {
            $insert_bucket($caml_check_bound($odata, $i__0)[$i__0 + 1]);
            $af_ = (int) ($i__0 + 1) as dynamic;
            if ($Z_ !== $i__0) {$i__0 = $af_;continue;}
            break;
          }
        }
        if ($inplace) {
          $ab_ = (int) ($nsize + -1) as dynamic;
          $aa_ = 0 as dynamic;
          if (! ($ab_ < 0)) {
            $i = $aa_;
            for (;;) {
              $match = $caml_check_bound($ndata_tail, $i)[$i + 1];
              if ($match) {$match[3] = 0;}
              $ae_ = (int) ($i + 1) as dynamic;
              if ($ab_ !== $i) {$i = $ae_;continue;}
              break;
            }
          }
          $ac_ = 0 as dynamic;
        }
        else {$ac_ = $inplace;}
        $ad_ = $ac_;
      }
      else {$ad_ = $X_;}
      return $ad_;
    };
    $key_index = (dynamic $h, dynamic $key) : dynamic ==> {
      return 3 <= $h->count() - 1
        ? $caml_hash(10, 100, $h[3], $key) & (int) ($h[2]->count() - 1 + -1)
        : ($runtime["caml_mod"](
         $runtime["caml_hash_univ_param"](10, 100, $key),
         $h[2]->count() -
           1
       ));
    };
    $add = (dynamic $h, dynamic $key, dynamic $data) : dynamic ==> {
      $i = $key_index($h, $key);
      $bucket = Vector{0, $key, $data, $caml_check_bound($h[2], $i)[$i + 1]} as dynamic;
      $caml_check_bound($h[2], $i)[$i + 1] = $bucket;
      $h[1] = (int) ($h[1] + 1);
      $W_ = $left_shift_32($h[2]->count() - 1, 1) < $h[1] ? 1 : (0);
      return $W_ ? $resize($key_index, $h) : ($W_);
    };
    $remove_bucket = 
    (dynamic $h, dynamic $i, dynamic $key, dynamic $prec, dynamic $c) : dynamic ==> {
      $k = null as dynamic;
      $next = null as dynamic;
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
    $remove = (dynamic $h, dynamic $key) : dynamic ==> {
      $i = $key_index($h, $key);
      return $remove_bucket(
        $h,
        $i,
        $key,
        0,
        $caml_check_bound($h[2], $i)[$i + 1]
      );
    };
    $find_rec = (dynamic $key, dynamic $param) : dynamic ==> {
      $k = null as dynamic;
      $data = null as dynamic;
      $next = null as dynamic;
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
        throw $caml_wrap_thrown_exception($Not_found) as \Throwable;
      }
    };
    $find = (dynamic $h, dynamic $key) : dynamic ==> {
      $k1 = null as dynamic;
      $d1 = null as dynamic;
      $next1 = null as dynamic;
      $k2 = null as dynamic;
      $d2 = null as dynamic;
      $next2 = null as dynamic;
      $k3 = null as dynamic;
      $d3 = null as dynamic;
      $next3 = null as dynamic;
      $V_ = $key_index($h, $key);
      $match = $caml_check_bound($h[2], $V_)[$V_ + 1];
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
          throw $caml_wrap_thrown_exception($Not_found) as \Throwable;
        }
        throw $caml_wrap_thrown_exception($Not_found) as \Throwable;
      }
      throw $caml_wrap_thrown_exception($Not_found) as \Throwable;
    };
    $find_rec_opt = (dynamic $key, dynamic $param) : dynamic ==> {
      $k = null as dynamic;
      $data = null as dynamic;
      $next = null as dynamic;
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
    $find_opt = (dynamic $h, dynamic $key) : dynamic ==> {
      $k1 = null as dynamic;
      $d1 = null as dynamic;
      $next1 = null as dynamic;
      $k2 = null as dynamic;
      $d2 = null as dynamic;
      $next2 = null as dynamic;
      $k3 = null as dynamic;
      $d3 = null as dynamic;
      $next3 = null as dynamic;
      $U_ = $key_index($h, $key);
      $match = $caml_check_bound($h[2], $U_)[$U_ + 1];
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
    $find_all = (dynamic $h, dynamic $key) : dynamic ==> {
      $find_in_bucket = new Ref();
      $find_in_bucket->contents = (dynamic $param) : dynamic ==> {
        $k = null as dynamic;
        $data = null as dynamic;
        $next = null as dynamic;
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
      $T_ = $key_index($h, $key);
      return $find_in_bucket->contents($caml_check_bound($h[2], $T_)[$T_ + 1]);
    };
    $replace_bucket = (dynamic $key, dynamic $data, dynamic $param) : dynamic ==> {
      $k = null as dynamic;
      $next = null as dynamic;
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
    $replace = (dynamic $h, dynamic $key, dynamic $data) : dynamic ==> {
      $R_ = null as dynamic;
      $S_ = null as dynamic;
      $i = $key_index($h, $key);
      $l = $caml_check_bound($h[2], $i)[$i + 1];
      $Q_ = $replace_bucket($key, $data, $l);
      if ($Q_) {
        $caml_check_bound($h[2], $i)[$i + 1] = Vector{0, $key, $data, $l};
        $h[1] = (int) ($h[1] + 1);
        $R_ = $left_shift_32($h[2]->count() - 1, 1) < $h[1] ? 1 : (0);
        if ($R_) {return $resize($key_index, $h);}
        $S_ = $R_;
      }
      else {$S_ = $Q_;}
      return $S_;
    };
    $mem = (dynamic $h, dynamic $key) : dynamic ==> {
      $mem_in_bucket = (dynamic $param) : dynamic ==> {
        $k = null as dynamic;
        $next = null as dynamic;
        $P_ = null as dynamic;
        $param__0 = $param;
        for (;;) {
          if ($param__0) {
            $k = $param__0[1];
            $next = $param__0[3];
            $P_ = 0 === $caml_compare($k, $key) ? 1 : (0);
            if ($P_) {return $P_;}
            $param__0 = $next;
            continue;
          }
          return 0;
        }
      };
      $O_ = $key_index($h, $key);
      return $mem_in_bucket($caml_check_bound($h[2], $O_)[$O_ + 1]);
    };
    $iter = (dynamic $f, dynamic $h) : dynamic ==> {
      $d = null as dynamic;
      $J_ = null as dynamic;
      $K_ = null as dynamic;
      $L_ = null as dynamic;
      $M_ = null as dynamic;
      $i = null as dynamic;
      $N_ = null as dynamic;
      $do_bucket = (dynamic $param) : dynamic ==> {
        $key = null as dynamic;
        $data = null as dynamic;
        $param__1 = null as dynamic;
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
        $K_ = (int) ($d->count() - 1 + -1) as dynamic;
        $J_ = 0 as dynamic;
        if (! ($K_ < 0)) {
          $i = $J_;
          for (;;) {
            $do_bucket($caml_check_bound($d, $i)[$i + 1]);
            $N_ = (int) ($i + 1) as dynamic;
            if ($K_ !== $i) {$i = $N_;continue;}
            break;
          }
        }
        $L_ = 1 - $old_trav;
        $M_ = $L_ ? $flip_ongoing_traversal($h) : ($L_);
        return $M_;
      }
      catch(\Throwable $exn) {
        $exn = $runtime["caml_wrap_exception"]($exn);
        if ($old_trav) {
          throw $caml_wrap_thrown_exception_reraise($exn) as \Throwable;
        }
        $flip_ongoing_traversal($h);
        throw $caml_wrap_thrown_exception_reraise($exn) as \Throwable;
      }
    };
    $filter_map_inplace_bucket = 
    (dynamic $f, dynamic $h, dynamic $i, dynamic $prec, dynamic $slot) : dynamic ==> {
      $key = null as dynamic;
      $data = null as dynamic;
      $next = null as dynamic;
      $match = null as dynamic;
      $data__0 = null as dynamic;
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
    $filter_map_inplace = (dynamic $f, dynamic $h) : dynamic ==> {
      $F_ = null as dynamic;
      $G_ = null as dynamic;
      $H_ = null as dynamic;
      $i = null as dynamic;
      $I_ = null as dynamic;
      $d = $h[2];
      $old_trav = $ongoing_traversal($h);
      if (1 - $old_trav) {$flip_ongoing_traversal($h);}
      try {
        $G_ = (int) ($d->count() - 1 + -1) as dynamic;
        $F_ = 0 as dynamic;
        if (! ($G_ < 0)) {
          $i = $F_;
          for (;;) {
            $filter_map_inplace_bucket(
              $f,
              $h,
              $i,
              0,
              $caml_check_bound($h[2], $i)[$i + 1]
            );
            $I_ = (int) ($i + 1) as dynamic;
            if ($G_ !== $i) {$i = $I_;continue;}
            break;
          }
        }
        $H_ = 0 as dynamic;
        return $H_;
      }
      catch(\Throwable $exn) {
        $exn = $runtime["caml_wrap_exception"]($exn);
        if ($old_trav) {
          throw $caml_wrap_thrown_exception_reraise($exn) as \Throwable;
        }
        $flip_ongoing_traversal($h);
        throw $caml_wrap_thrown_exception_reraise($exn) as \Throwable;
      }
    };
    $fold = (dynamic $f, dynamic $h, dynamic $init) : dynamic ==> {
      $d = null as dynamic;
      $accu = null as dynamic;
      $A_ = null as dynamic;
      $B_ = null as dynamic;
      $C_ = null as dynamic;
      $i = null as dynamic;
      $D_ = null as dynamic;
      $E_ = null as dynamic;
      $do_bucket = (dynamic $b, dynamic $accu) : dynamic ==> {
        $key = null as dynamic;
        $data = null as dynamic;
        $b__1 = null as dynamic;
        $accu__1 = null as dynamic;
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
        $accu = Vector{0, $init} as dynamic;
        $B_ = (int) ($d->count() - 1 + -1) as dynamic;
        $A_ = 0 as dynamic;
        if (! ($B_ < 0)) {
          $i = $A_;
          for (;;) {
            $D_ = $accu[1];
            $accu[1] = $do_bucket($caml_check_bound($d, $i)[$i + 1], $D_);
            $E_ = (int) ($i + 1) as dynamic;
            if ($B_ !== $i) {$i = $E_;continue;}
            break;
          }
        }
        if (1 - $old_trav) {$flip_ongoing_traversal($h);}
        $C_ = $accu[1];
        return $C_;
      }
      catch(\Throwable $exn) {
        $exn = $runtime["caml_wrap_exception"]($exn);
        if ($old_trav) {
          throw $caml_wrap_thrown_exception_reraise($exn) as \Throwable;
        }
        $flip_ongoing_traversal($h);
        throw $caml_wrap_thrown_exception_reraise($exn) as \Throwable;
      }
    };
    $bucket_length = (dynamic $accu, dynamic $param) : dynamic ==> {
      $param__1 = null as dynamic;
      $accu__1 = null as dynamic;
      $accu__0 = $accu;
      $param__0 = $param;
      for (;;) {
        if ($param__0) {
          $param__1 = $param__0[3];
          $accu__1 = (int) ($accu__0 + 1) as dynamic;
          $accu__0 = $accu__1;
          $param__0 = $param__1;
          continue;
        }
        return $accu__0;
      }
    };
    $stats = (dynamic $h) : dynamic ==> {
      $u_ = $h[2];
      $v_ = 0 as dynamic;
      $w_ = (dynamic $m, dynamic $b) : dynamic ==> {
        $z_ = $bucket_length(0, $b);
        return $call2($Pervasives[5], $m, $z_);
      };
      $mbl = $call3($Array[17], $w_, $v_, $u_);
      $histo = $caml_make_vect((int) ($mbl + 1), 0);
      $x_ = $h[2];
      $y_ = (dynamic $b) : dynamic ==> {
        $l = $bucket_length(0, $b);
        $histo[$l + 1] = (int) ($caml_check_bound($histo, $l)[$l + 1] + 1);
        return 0;
      };
      $call2($Array[13], $y_, $x_);
      return Vector{0, $h[1], $h[2]->count() - 1, $mbl, $histo};
    };
    $MakeSeeded = (dynamic $H) : dynamic ==> {
      $key_index = (dynamic $h, dynamic $key) : dynamic ==> {
        $t_ = (int) ($h[2]->count() - 1 + -1) as dynamic;
        return $call2($H[2], $h[3], $key) & $t_;
      };
      $add = (dynamic $h, dynamic $key, dynamic $data) : dynamic ==> {
        $i = $key_index($h, $key);
        $bucket = Vector{0, $key, $data, $caml_check_bound($h[2], $i)[$i + 1]} as dynamic;
        $caml_check_bound($h[2], $i)[$i + 1] = $bucket;
        $h[1] = (int) ($h[1] + 1);
        $s_ = $left_shift_32($h[2]->count() - 1, 1) < $h[1] ? 1 : (0);
        return $s_ ? $resize($key_index, $h) : ($s_);
      };
      $remove_bucket = 
      (dynamic $h, dynamic $i, dynamic $key, dynamic $prec, dynamic $c) : dynamic ==> {
        $k = null as dynamic;
        $next = null as dynamic;
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
      $remove = (dynamic $h, dynamic $key) : dynamic ==> {
        $i = $key_index($h, $key);
        return $remove_bucket(
          $h,
          $i,
          $key,
          0,
          $caml_check_bound($h[2], $i)[$i + 1]
        );
      };
      $find_rec = (dynamic $key, dynamic $param) : dynamic ==> {
        $k = null as dynamic;
        $data = null as dynamic;
        $next = null as dynamic;
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
          throw $caml_wrap_thrown_exception($Not_found) as \Throwable;
        }
      };
      $find = (dynamic $h, dynamic $key) : dynamic ==> {
        $k1 = null as dynamic;
        $d1 = null as dynamic;
        $next1 = null as dynamic;
        $k2 = null as dynamic;
        $d2 = null as dynamic;
        $next2 = null as dynamic;
        $k3 = null as dynamic;
        $d3 = null as dynamic;
        $next3 = null as dynamic;
        $r_ = $key_index($h, $key);
        $match = $caml_check_bound($h[2], $r_)[$r_ + 1];
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
            throw $caml_wrap_thrown_exception($Not_found) as \Throwable;
          }
          throw $caml_wrap_thrown_exception($Not_found) as \Throwable;
        }
        throw $caml_wrap_thrown_exception($Not_found) as \Throwable;
      };
      $find_rec_opt = (dynamic $key, dynamic $param) : dynamic ==> {
        $k = null as dynamic;
        $data = null as dynamic;
        $next = null as dynamic;
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
      $find_opt = (dynamic $h, dynamic $key) : dynamic ==> {
        $k1 = null as dynamic;
        $d1 = null as dynamic;
        $next1 = null as dynamic;
        $k2 = null as dynamic;
        $d2 = null as dynamic;
        $next2 = null as dynamic;
        $k3 = null as dynamic;
        $d3 = null as dynamic;
        $next3 = null as dynamic;
        $q_ = $key_index($h, $key);
        $match = $caml_check_bound($h[2], $q_)[$q_ + 1];
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
      $find_all = (dynamic $h, dynamic $key) : dynamic ==> {
        $find_in_bucket = new Ref();
        $find_in_bucket->contents = (dynamic $param) : dynamic ==> {
          $k = null as dynamic;
          $d = null as dynamic;
          $next = null as dynamic;
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
        $p_ = $key_index($h, $key);
        return $find_in_bucket->contents(
          $caml_check_bound($h[2], $p_)[$p_ + 1]
        );
      };
      $replace_bucket = (dynamic $key, dynamic $data, dynamic $param) : dynamic ==> {
        $k = null as dynamic;
        $next = null as dynamic;
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
      $replace = (dynamic $h, dynamic $key, dynamic $data) : dynamic ==> {
        $n_ = null as dynamic;
        $o_ = null as dynamic;
        $i = $key_index($h, $key);
        $l = $caml_check_bound($h[2], $i)[$i + 1];
        $m_ = $replace_bucket($key, $data, $l);
        if ($m_) {
          $caml_check_bound($h[2], $i)[$i + 1] = Vector{0, $key, $data, $l};
          $h[1] = (int) ($h[1] + 1);
          $n_ = $left_shift_32($h[2]->count() - 1, 1) < $h[1] ? 1 : (0);
          if ($n_) {return $resize($key_index, $h);}
          $o_ = $n_;
        }
        else {$o_ = $m_;}
        return $o_;
      };
      $mem = (dynamic $h, dynamic $key) : dynamic ==> {
        $mem_in_bucket = (dynamic $param) : dynamic ==> {
          $k = null as dynamic;
          $next = null as dynamic;
          $l_ = null as dynamic;
          $param__0 = $param;
          for (;;) {
            if ($param__0) {
              $k = $param__0[1];
              $next = $param__0[3];
              $l_ = $call2($H[1], $k, $key);
              if ($l_) {return $l_;}
              $param__0 = $next;
              continue;
            }
            return 0;
          }
        };
        $k_ = $key_index($h, $key);
        return $mem_in_bucket($caml_check_bound($h[2], $k_)[$k_ + 1]);
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
    $Make = (dynamic $H) : dynamic ==> {
      $equal = $H[1];
      $hash = (dynamic $seed, dynamic $x) : dynamic ==> {
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
      $j_ = $include[1];
      $create = (dynamic $sz) : dynamic ==> {return $call2($j_, $c_, $sz);};
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
      (dynamic $i_, dynamic $h_, dynamic $g_, dynamic $f_) : dynamic ==> {
        return $caml_hash($i_, $h_, $g_, $f_);
      }
    } as dynamic;
    
    return($Hashtbl);

  }
  public static function create(dynamic $opt, dynamic $initial_size): dynamic {
    return static::syncCall(__FUNCTION__, 1, $opt, $initial_size);
  }
  public static function clear(dynamic $h): dynamic {
    return static::syncCall(__FUNCTION__, 2, $h);
  }
  public static function reset(dynamic $h): dynamic {
    return static::syncCall(__FUNCTION__, 3, $h);
  }
  public static function copy(dynamic $h): dynamic {
    return static::syncCall(__FUNCTION__, 4, $h);
  }
  public static function add(dynamic $h, dynamic $key, dynamic $data): dynamic {
    return static::syncCall(__FUNCTION__, 5, $h, $key, $data);
  }
  public static function find(dynamic $h, dynamic $key): dynamic {
    return static::syncCall(__FUNCTION__, 6, $h, $key);
  }
  public static function find_opt(dynamic $h, dynamic $key): dynamic {
    return static::syncCall(__FUNCTION__, 7, $h, $key);
  }
  public static function find_all(dynamic $h, dynamic $key): dynamic {
    return static::syncCall(__FUNCTION__, 8, $h, $key);
  }
  public static function mem(dynamic $h, dynamic $key): dynamic {
    return static::syncCall(__FUNCTION__, 9, $h, $key);
  }
  public static function remove(dynamic $h, dynamic $key): dynamic {
    return static::syncCall(__FUNCTION__, 10, $h, $key);
  }
  public static function replace(dynamic $h, dynamic $key, dynamic $data): dynamic {
    return static::syncCall(__FUNCTION__, 11, $h, $key, $data);
  }
  public static function iter(dynamic $f, dynamic $h): dynamic {
    return static::syncCall(__FUNCTION__, 12, $f, $h);
  }
  public static function filter_map_inplace(dynamic $f, dynamic $h): dynamic {
    return static::syncCall(__FUNCTION__, 13, $f, $h);
  }
  public static function fold(dynamic $f, dynamic $h, dynamic $init): dynamic {
    return static::syncCall(__FUNCTION__, 14, $f, $h, $init);
  }
  public static function length(dynamic $h): dynamic {
    return static::syncCall(__FUNCTION__, 15, $h);
  }
  public static function randomize(dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 16, $param);
  }
  public static function is_randomized(dynamic $param): dynamic {
    return static::syncCall(__FUNCTION__, 17, $param);
  }
  public static function stats(dynamic $h): dynamic {
    return static::syncCall(__FUNCTION__, 18, $h);
  }
  public static function Make(dynamic $H): dynamic {
    return static::syncCall(__FUNCTION__, 19, $H);
  }
  public static function MakeSeeded(dynamic $H): dynamic {
    return static::syncCall(__FUNCTION__, 20, $H);
  }
  public static function hash(dynamic $x): dynamic {
    return static::syncCall(__FUNCTION__, 21, $x);
  }
  public static function seeded_hash(dynamic $seed, dynamic $x): dynamic {
    return static::syncCall(__FUNCTION__, 22, $seed, $x);
  }
  public static function hash_param(dynamic $n1, dynamic $n2, dynamic $x): dynamic {
    return static::syncCall(__FUNCTION__, 23, $n1, $n2, $x);
  }

}
/* Hashing disabled */
