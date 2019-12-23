<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class Hashtbl {
  <<__Override, __Memoize>>
  public static function requireModule() : Vector<dynamic> {
    $joo_global_object = \Rehack\GlobalObject::get() as dynamic;
    
    $runtime = $joo_global_object->jsoo_runtime;
    $a_ = null;
    $params = null;
    $e_ = null;
    $f_ = null;
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
    $Sys =  Sys::requireModule ();
    $Not_found =  Not_found::requireModule ();
    $Pervasives =  Pervasives::requireModule ();
    $Array =  Array_::requireModule ();
    $Assert_failure =  Assert_failure::requireModule ();
    $CamlinternalLazy =  CamlinternalLazy::requireModule ();
    $Random =  Random::requireModule ();
    $String =  String_::requireModule ();
    $d_ = Vector{0, 0} as dynamic;
    $c_ = Vector{0, $string("hashtbl.ml"), 108, 23} as dynamic;
    $hash = (dynamic $x) ==> {return $caml_hash(10, 100, 0, $x);};
    $hash_param = (dynamic $n1, dynamic $n2, dynamic $x) ==> {
      return $caml_hash($n1, $n2, 0, $x);
    };
    $seeded_hash = (dynamic $seed, dynamic $x) ==> {
      return $caml_hash(10, 100, $seed, $x);
    };
    $ongoing_traversal = (dynamic $h) ==> {
      $as_ = $h->count() - 1 < 4 ? 1 : (0);
      $at_ = $as_ ? $as_ : ($h[4] < 0 ? 1 : (0));
      return $at_;
    };
    $flip_ongoing_traversal = (dynamic $h) ==> {
      $h[4] = (int) - $h[4];
      return 0;
    };
    
    try {$f_ = $caml_sys_getenv($cst_OCAMLRUNPARAM);$params = $f_;}
    catch(\Throwable $aq_) {
      $aq_ = $runtime["caml_wrap_exception"]($aq_);
      if ($aq_ !== $Not_found) {
        throw $caml_wrap_thrown_exception_reraise($aq_) as \Throwable;
      }
      try {$e_ = $caml_sys_getenv($cst_CAMLRUNPARAM);$a_ = $e_;}
      catch(\Throwable $ar_) {
        $ar_ = $runtime["caml_wrap_exception"]($ar_);
        if ($ar_ !== $Not_found) {
          throw $caml_wrap_thrown_exception_reraise($ar_) as \Throwable;
        }
        $a_ = $cst;
      }
      $params = $a_;
    }
    
    $randomized_default = $call2($String[22], $params, 82);
    $randomized = Vector{0, $randomized_default} as dynamic;
    $randomize = (dynamic $param) ==> {$randomized[1] = 1;return 0;};
    $is_randomized = (dynamic $param) ==> {return $randomized[1];};
    $b_ = (dynamic $ap_) ==> {return $call1($Random[11][2], 0);};
    $prng = Vector{246, $b_} as dynamic;
    $create = (dynamic $opt, dynamic $initial_size) ==> {
      $seed = null;
      $ao_ = null;
      $an_ = null;
      $random = null;
      $sth = null;
      $x__0 = null;
      if ($opt) {
        $sth = $opt[1];
        $random = $sth;
      }
      else {$random = $randomized[1];}
      $x = 16;
      for (;;) {
        if (! ($initial_size <= $x)) {
          if (! ($Sys[14] < (int) ($x * 2))) {
            $x__0 = (int) ($x * 2);
            $x = $x__0;
            continue;
          }
        }
        if ($random) {
          $an_ = $runtime["caml_obj_tag"]($prng);
          $ao_ =
            250 === $an_
              ? $b_
              : (246 === $an_ ? $call1($CamlinternalLazy[2], $prng) : ($prng));
          $seed = $call1($Random[11][4], $ao_);
        }
        else {$seed = 0;}
        return Vector{0, 0, $caml_make_vect($x, 0), $seed, $x};
      }
    };
    $clear = (dynamic $h) ==> {
      $am_ = null;
      $i = null;
      $h[1] = 0;
      $len = $h[2]->count() - 1;
      $al_ = (int) ($len + -1);
      $ak_ = 0;
      if (! ($al_ < 0)) {
        $i = $ak_;
        for (;;) {
          $caml_check_bound($h[2], $i)[$i + 1] = 0;
          $am_ = (int) ($i + 1);
          if ($al_ !== $i) {$i = $am_;continue;}
          break;
        }
      }
      return 0;
    };
    $reset = (dynamic $h) ==> {
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
    $copy_bucketlist = (dynamic $param) ==> {
      $prec__0 = null;
      $r = null;
      $next__0 = null;
      $data__0 = null;
      $key__0 = null;
      $prec = null;
      $param__0 = null;
      $next = null;
      $data = null;
      $key = null;
      if ($param) {
        $key = $param[1];
        $data = $param[2];
        $next = $param[3];
        $prec__0 = Vector{0, $key, $data, $next};
        $prec = $prec__0;
        $param__0 = $next;
        for (;;) {
          if ($param__0) {
            $key__0 = $param__0[1];
            $data__0 = $param__0[2];
            $next__0 = $param__0[3];
            $r = Vector{0, $key__0, $data__0, $next__0};
            if ($prec) {
              $prec[3] = $r;
              $prec = $r;
              $param__0 = $next__0;
              continue;
            }
            throw $caml_wrap_thrown_exception(Vector{0, $Assert_failure, $c_}) as \Throwable;
          }
          return $prec__0;
        }
      }
      return 0;
    };
    $copy = (dynamic $h) ==> {
      $ah_ = $h[4];
      $ai_ = $h[3];
      $aj_ = $call2($Array[15], $copy_bucketlist, $h[2]);
      return Vector{0, $h[1], $aj_, $ai_, $ah_};
    };
    $length = (dynamic $h) ==> {return $h[1];};
    $resize = (dynamic $indexfun, dynamic $h) ==> {
      $ndata = null;
      $ndata_tail = null;
      $inplace = null;
      $cell = null;
      $key = null;
      $data = null;
      $next = null;
      $cell__0 = null;
      $nidx = null;
      $match = null;
      $Z_ = null;
      $aa_ = null;
      $ab_ = null;
      $ac_ = null;
      $ad_ = null;
      $ae_ = null;
      $i = null;
      $match__0 = null;
      $af_ = null;
      $i__0 = null;
      $cell__1 = null;
      $ag_ = null;
      $odata = $h[2];
      $osize = $odata->count() - 1;
      $nsize = (int) ($osize * 2);
      $Y_ = $nsize < $Sys[14] ? 1 : (0);
      if ($Y_) {
        $ndata = $caml_make_vect($nsize, 0);
        $ndata_tail = $caml_make_vect($nsize, 0);
        $inplace = 1 - $ongoing_traversal($h);
        $h[2] = $ndata;
        $aa_ = (int) ($osize + -1);
        $Z_ = 0;
        if (! ($aa_ < 0)) {
          $i__0 = $Z_;
          for (;;) {
            $continue_label = null;
            $cell__1 = $caml_check_bound($odata, $i__0)[$i__0 + 1];
            $cell = $cell__1;
            for (;;) {
              if ($cell) {
                $key = $cell[1];
                $data = $cell[2];
                $next = $cell[3];
                $cell__0 = $inplace ? $cell : (Vector{0, $key, $data, 0});
                $nidx = $call2($indexfun, $h, $key);
                $match = $caml_check_bound($ndata_tail, $nidx)[$nidx + 1];
                if ($match) {
                  $match[3] = $cell__0;
                }
                else {$caml_check_bound($ndata, $nidx)[$nidx + 1] = $cell__0;}
                $caml_check_bound($ndata_tail, $nidx)[$nidx + 1] = $cell__0;
                $cell = $next;
                continue;
              }
              $ag_ = (int) ($i__0 + 1);
              if ($aa_ !== $i__0) {$i__0 = $ag_;$continue_label = "a";break;}
              break;
            }
            if ($continue_label === "a") {continue;}
            break;
          }
        }
        if ($inplace) {
          $ac_ = (int) ($nsize + -1);
          $ab_ = 0;
          if (! ($ac_ < 0)) {
            $i = $ab_;
            for (;;) {
              $match__0 = $caml_check_bound($ndata_tail, $i)[$i + 1];
              if ($match__0) {$match__0[3] = 0;}
              $af_ = (int) ($i + 1);
              if ($ac_ !== $i) {$i = $af_;continue;}
              break;
            }
          }
          $ad_ = 0;
        }
        else {$ad_ = $inplace;}
        $ae_ = $ad_;
      }
      else {$ae_ = $Y_;}
      return $ae_;
    };
    $key_index = (dynamic $h, dynamic $key) ==> {
      return 3 <= $h->count() - 1
        ? $caml_hash(10, 100, $h[3], $key) & (int) ($h[2]->count() - 1 + -1)
        : ($runtime["caml_mod"](
         $runtime["caml_hash_univ_param"](10, 100, $key),
         $h[2]->count() -
           1
       ));
    };
    $add = (dynamic $h, dynamic $key, dynamic $data) ==> {
      $i = $key_index($h, $key);
      $bucket = Vector{0, $key, $data, $caml_check_bound($h[2], $i)[$i + 1]} as dynamic;
      $caml_check_bound($h[2], $i)[$i + 1] = $bucket;
      $h[1] = (int) ($h[1] + 1);
      $X_ = $left_shift_32($h[2]->count() - 1, 1) < $h[1] ? 1 : (0);
      return $X_ ? $resize($key_index, $h) : ($X_);
    };
    $remove = (dynamic $h, dynamic $key) ==> {
      $k = null;
      $next = null;
      $i = $key_index($h, $key);
      $c__0 = $caml_check_bound($h[2], $i)[$i + 1];
      $prec = 0;
      $c = $c__0;
      for (;;) {
        if ($c) {
          $k = $c[1];
          $next = $c[3];
          if (0 === $caml_compare($k, $key)) {
            $h[1] = (int) ($h[1] + -1);
            if ($prec) {$prec[3] = $next;return 0;}
            $caml_check_bound($h[2], $i)[$i + 1] = $next;
            return 0;
          }
          $prec = $c;
          $c = $next;
          continue;
        }
        return 0;
      }
    };
    $find = (dynamic $h, dynamic $key) ==> {
      $param = null;
      $k = null;
      $data = null;
      $next = null;
      $k1 = null;
      $d1 = null;
      $next1 = null;
      $k2 = null;
      $d2 = null;
      $next2 = null;
      $k3 = null;
      $d3 = null;
      $next3 = null;
      $W_ = $key_index($h, $key);
      $match = $caml_check_bound($h[2], $W_)[$W_ + 1];
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
            if (0 === $caml_compare($key, $k3)) {return $d3;}
            $param = $next3;
            for (;;) {
              if ($param) {
                $k = $param[1];
                $data = $param[2];
                $next = $param[3];
                if (0 === $caml_compare($key, $k)) {return $data;}
                $param = $next;
                continue;
              }
              throw $caml_wrap_thrown_exception($Not_found) as \Throwable;
            }
          }
          throw $caml_wrap_thrown_exception($Not_found) as \Throwable;
        }
        throw $caml_wrap_thrown_exception($Not_found) as \Throwable;
      }
      throw $caml_wrap_thrown_exception($Not_found) as \Throwable;
    };
    $find_opt = (dynamic $h, dynamic $key) ==> {
      $param = null;
      $k = null;
      $data = null;
      $next = null;
      $k1 = null;
      $d1 = null;
      $next1 = null;
      $k2 = null;
      $d2 = null;
      $next2 = null;
      $k3 = null;
      $d3 = null;
      $next3 = null;
      $V_ = $key_index($h, $key);
      $match = $caml_check_bound($h[2], $V_)[$V_ + 1];
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
            if (0 === $caml_compare($key, $k3)) {return Vector{0, $d3};}
            $param = $next3;
            for (;;) {
              if ($param) {
                $k = $param[1];
                $data = $param[2];
                $next = $param[3];
                if (0 === $caml_compare($key, $k)) {return Vector{0, $data};}
                $param = $next;
                continue;
              }
              return 0;
            }
          }
          return 0;
        }
        return 0;
      }
      return 0;
    };
    $find_all = (dynamic $h, dynamic $key) ==> {
      $find_in_bucket = new Ref();
      $find_in_bucket->contents = (dynamic $param) ==> {
        $k = null;
        $data = null;
        $next = null;
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
      $U_ = $key_index($h, $key);
      return $find_in_bucket->contents($caml_check_bound($h[2], $U_)[$U_ + 1]);
    };
    $replace = (dynamic $h, dynamic $key, dynamic $data) ==> {
      $k = null;
      $next = null;
      $R_ = null;
      $S_ = null;
      $T_ = null;
      $i = $key_index($h, $key);
      $param__0 = $caml_check_bound($h[2], $i)[$i + 1];
      $param = $param__0;
      for (;;) {
        if ($param) {
          $k = $param[1];
          $next = $param[3];
          if (0 !== $caml_compare($k, $key)) {$param = $next;continue;}
          $param[1] = $key;
          $param[2] = $data;
          $R_ = 0;
        }
        else {$R_ = 1;}
        if ($R_) {
          $caml_check_bound($h[2], $i)[$i + 1] = Vector{0, $key, $data, $param__0};
          $h[1] = (int) ($h[1] + 1);
          $S_ = $left_shift_32($h[2]->count() - 1, 1) < $h[1] ? 1 : (0);
          if ($S_) {return $resize($key_index, $h);}
          $T_ = $S_;
        }
        else {$T_ = $R_;}
        return $T_;
      }
    };
    $mem = (dynamic $h, dynamic $key) ==> {
      $k = null;
      $next = null;
      $P_ = null;
      $Q_ = $key_index($h, $key);
      $param__0 = $caml_check_bound($h[2], $Q_)[$Q_ + 1];
      $param = $param__0;
      for (;;) {
        if ($param) {
          $k = $param[1];
          $next = $param[3];
          $P_ = 0 === $caml_compare($k, $key) ? 1 : (0);
          if ($P_) {return $P_;}
          $param = $next;
          continue;
        }
        return 0;
      }
    };
    $iter = (dynamic $f, dynamic $h) ==> {
      $d = null;
      $K_ = null;
      $L_ = null;
      $M_ = null;
      $N_ = null;
      $i = null;
      $O_ = null;
      $do_bucket = (dynamic $param) ==> {
        $key = null;
        $data = null;
        $param__1 = null;
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
        $L_ = (int) ($d->count() - 1 + -1);
        $K_ = 0;
        if (! ($L_ < 0)) {
          $i = $K_;
          for (;;) {
            $do_bucket($caml_check_bound($d, $i)[$i + 1]);
            $O_ = (int) ($i + 1);
            if ($L_ !== $i) {$i = $O_;continue;}
            break;
          }
        }
        $M_ = 1 - $old_trav;
        $N_ = $M_ ? $flip_ongoing_traversal($h) : ($M_);
        return $N_;
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
    (dynamic $f, dynamic $h, dynamic $i, dynamic $prec, dynamic $slot) ==> {
      $key = null;
      $data = null;
      $next = null;
      $match = null;
      $data__0 = null;
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
    $filter_map_inplace = (dynamic $f, dynamic $h) ==> {
      $G_ = null;
      $H_ = null;
      $I_ = null;
      $i = null;
      $J_ = null;
      $d = $h[2];
      $old_trav = $ongoing_traversal($h);
      if (1 - $old_trav) {$flip_ongoing_traversal($h);}
      try {
        $H_ = (int) ($d->count() - 1 + -1);
        $G_ = 0;
        if (! ($H_ < 0)) {
          $i = $G_;
          for (;;) {
            $filter_map_inplace_bucket(
              $f,
              $h,
              $i,
              0,
              $caml_check_bound($h[2], $i)[$i + 1]
            );
            $J_ = (int) ($i + 1);
            if ($H_ !== $i) {$i = $J_;continue;}
            break;
          }
        }
        $I_ = 0;
        return $I_;
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
    $fold = (dynamic $f, dynamic $h, dynamic $init) ==> {
      $d = null;
      $accu = null;
      $B_ = null;
      $C_ = null;
      $D_ = null;
      $i = null;
      $E_ = null;
      $F_ = null;
      $do_bucket = (dynamic $b, dynamic $accu) ==> {
        $key = null;
        $data = null;
        $b__1 = null;
        $accu__1 = null;
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
        $C_ = (int) ($d->count() - 1 + -1);
        $B_ = 0;
        if (! ($C_ < 0)) {
          $i = $B_;
          for (;;) {
            $E_ = $accu[1];
            $accu[1] = $do_bucket($caml_check_bound($d, $i)[$i + 1], $E_);
            $F_ = (int) ($i + 1);
            if ($C_ !== $i) {$i = $F_;continue;}
            break;
          }
        }
        if (1 - $old_trav) {$flip_ongoing_traversal($h);}
        $D_ = $accu[1];
        return $D_;
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
    $bucket_length = (dynamic $accu, dynamic $param) ==> {
      $param__1 = null;
      $accu__1 = null;
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
    $stats = (dynamic $h) ==> {
      $v_ = $h[2];
      $w_ = 0;
      $x_ = (dynamic $m, dynamic $b) ==> {
        $A_ = $bucket_length(0, $b);
        return $call2($Pervasives[5], $m, $A_);
      };
      $mbl = $call3($Array[17], $x_, $w_, $v_);
      $histo = $caml_make_vect((int) ($mbl + 1), 0);
      $y_ = $h[2];
      $z_ = (dynamic $b) ==> {
        $l = $bucket_length(0, $b);
        $histo[$l + 1] = (int) ($caml_check_bound($histo, $l)[$l + 1] + 1);
        return 0;
      };
      $call2($Array[13], $z_, $y_);
      return Vector{0, $h[1], $h[2]->count() - 1, $mbl, $histo};
    };
    $MakeSeeded = (dynamic $H) ==> {
      $key_index = (dynamic $h, dynamic $key) ==> {
        $u_ = (int) ($h[2]->count() - 1 + -1);
        return $call2($H[2], $h[3], $key) & $u_;
      };
      $add = (dynamic $h, dynamic $key, dynamic $data) ==> {
        $i = $key_index($h, $key);
        $bucket = Vector{0, $key, $data, $caml_check_bound($h[2], $i)[$i + 1]} as dynamic;
        $caml_check_bound($h[2], $i)[$i + 1] = $bucket;
        $h[1] = (int) ($h[1] + 1);
        $t_ = $left_shift_32($h[2]->count() - 1, 1) < $h[1] ? 1 : (0);
        return $t_ ? $resize($key_index, $h) : ($t_);
      };
      $remove = (dynamic $h, dynamic $key) ==> {
        $k = null;
        $next = null;
        $i = $key_index($h, $key);
        $c__0 = $caml_check_bound($h[2], $i)[$i + 1];
        $prec = 0;
        $c = $c__0;
        for (;;) {
          if ($c) {
            $k = $c[1];
            $next = $c[3];
            if ($call2($H[1], $k, $key)) {
              $h[1] = (int) ($h[1] + -1);
              if ($prec) {$prec[3] = $next;return 0;}
              $caml_check_bound($h[2], $i)[$i + 1] = $next;
              return 0;
            }
            $prec = $c;
            $c = $next;
            continue;
          }
          return 0;
        }
      };
      $find = (dynamic $h, dynamic $key) ==> {
        $param = null;
        $k = null;
        $data = null;
        $next = null;
        $k1 = null;
        $d1 = null;
        $next1 = null;
        $k2 = null;
        $d2 = null;
        $next2 = null;
        $k3 = null;
        $d3 = null;
        $next3 = null;
        $s_ = $key_index($h, $key);
        $match = $caml_check_bound($h[2], $s_)[$s_ + 1];
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
              if ($call2($H[1], $key, $k3)) {return $d3;}
              $param = $next3;
              for (;;) {
                if ($param) {
                  $k = $param[1];
                  $data = $param[2];
                  $next = $param[3];
                  if ($call2($H[1], $key, $k)) {return $data;}
                  $param = $next;
                  continue;
                }
                throw $caml_wrap_thrown_exception($Not_found) as \Throwable;
              }
            }
            throw $caml_wrap_thrown_exception($Not_found) as \Throwable;
          }
          throw $caml_wrap_thrown_exception($Not_found) as \Throwable;
        }
        throw $caml_wrap_thrown_exception($Not_found) as \Throwable;
      };
      $find_opt = (dynamic $h, dynamic $key) ==> {
        $param = null;
        $k = null;
        $data = null;
        $next = null;
        $k1 = null;
        $d1 = null;
        $next1 = null;
        $k2 = null;
        $d2 = null;
        $next2 = null;
        $k3 = null;
        $d3 = null;
        $next3 = null;
        $r_ = $key_index($h, $key);
        $match = $caml_check_bound($h[2], $r_)[$r_ + 1];
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
              if ($call2($H[1], $key, $k3)) {return Vector{0, $d3};}
              $param = $next3;
              for (;;) {
                if ($param) {
                  $k = $param[1];
                  $data = $param[2];
                  $next = $param[3];
                  if ($call2($H[1], $key, $k)) {return Vector{0, $data};}
                  $param = $next;
                  continue;
                }
                return 0;
              }
            }
            return 0;
          }
          return 0;
        }
        return 0;
      };
      $find_all = (dynamic $h, dynamic $key) ==> {
        $find_in_bucket = new Ref();
        $find_in_bucket->contents = (dynamic $param) ==> {
          $k = null;
          $d = null;
          $next = null;
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
        $q_ = $key_index($h, $key);
        return $find_in_bucket->contents(
          $caml_check_bound($h[2], $q_)[$q_ + 1]
        );
      };
      $replace = (dynamic $h, dynamic $key, dynamic $data) ==> {
        $k = null;
        $next = null;
        $n_ = null;
        $o_ = null;
        $p_ = null;
        $i = $key_index($h, $key);
        $param__0 = $caml_check_bound($h[2], $i)[$i + 1];
        $param = $param__0;
        for (;;) {
          if ($param) {
            $k = $param[1];
            $next = $param[3];
            if (! $call2($H[1], $k, $key)) {$param = $next;continue;}
            $param[1] = $key;
            $param[2] = $data;
            $n_ = 0;
          }
          else {$n_ = 1;}
          if ($n_) {
            $caml_check_bound($h[2], $i)[$i + 1] = Vector{0, $key, $data, $param__0};
            $h[1] = (int) ($h[1] + 1);
            $o_ = $left_shift_32($h[2]->count() - 1, 1) < $h[1] ? 1 : (0);
            if ($o_) {return $resize($key_index, $h);}
            $p_ = $o_;
          }
          else {$p_ = $n_;}
          return $p_;
        }
      };
      $mem = (dynamic $h, dynamic $key) ==> {
        $k = null;
        $next = null;
        $l_ = null;
        $m_ = $key_index($h, $key);
        $param__0 = $caml_check_bound($h[2], $m_)[$m_ + 1];
        $param = $param__0;
        for (;;) {
          if ($param) {
            $k = $param[1];
            $next = $param[3];
            $l_ = $call2($H[1], $k, $key);
            if ($l_) {return $l_;}
            $param = $next;
            continue;
          }
          return 0;
        }
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
    $Make = (dynamic $H) ==> {
      $equal = $H[1];
      $hash = (dynamic $seed, dynamic $x) ==> {return $call1($H[2], $x);};
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
      $k_ = $include[1];
      $create = (dynamic $sz) ==> {return $call2($k_, $d_, $sz);};
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
      (dynamic $j_, dynamic $i_, dynamic $h_, dynamic $g_) ==> {return $caml_hash($j_, $i_, $h_, $g_);
      }
    } as dynamic;
    
     return ($Hashtbl);

  }
  public static function create(dynamic $opt, dynamic $initial_size): dynamic {
    return static::callRehackFunction(static::requireModule()[1], varray[$opt, $initial_size]);
  }
  public static function clear(dynamic $h): dynamic {
    return static::callRehackFunction(static::requireModule()[2], varray[$h]);
  }
  public static function reset(dynamic $h): dynamic {
    return static::callRehackFunction(static::requireModule()[3], varray[$h]);
  }
  public static function copy(dynamic $h): dynamic {
    return static::callRehackFunction(static::requireModule()[4], varray[$h]);
  }
  public static function add(dynamic $h, dynamic $key, dynamic $data): dynamic {
    return static::callRehackFunction(static::requireModule()[5], varray[$h, $key, $data]);
  }
  public static function find(dynamic $h, dynamic $key): dynamic {
    return static::callRehackFunction(static::requireModule()[6], varray[$h, $key]);
  }
  public static function find_opt(dynamic $h, dynamic $key): dynamic {
    return static::callRehackFunction(static::requireModule()[7], varray[$h, $key]);
  }
  public static function find_all(dynamic $h, dynamic $key): dynamic {
    return static::callRehackFunction(static::requireModule()[8], varray[$h, $key]);
  }
  public static function mem(dynamic $h, dynamic $key): dynamic {
    return static::callRehackFunction(static::requireModule()[9], varray[$h, $key]);
  }
  public static function remove(dynamic $h, dynamic $key): dynamic {
    return static::callRehackFunction(static::requireModule()[10], varray[$h, $key]);
  }
  public static function replace(dynamic $h, dynamic $key, dynamic $data): dynamic {
    return static::callRehackFunction(static::requireModule()[11], varray[$h, $key, $data]);
  }
  public static function iter(dynamic $f, dynamic $h): dynamic {
    return static::callRehackFunction(static::requireModule()[12], varray[$f, $h]);
  }
  public static function filter_map_inplace(dynamic $f, dynamic $h): dynamic {
    return static::callRehackFunction(static::requireModule()[13], varray[$f, $h]);
  }
  public static function fold(dynamic $f, dynamic $h, dynamic $init): dynamic {
    return static::callRehackFunction(static::requireModule()[14], varray[$f, $h, $init]);
  }
  public static function length(dynamic $h): dynamic {
    return static::callRehackFunction(static::requireModule()[15], varray[$h]);
  }
  public static function randomize(dynamic $param): dynamic {
    return static::callRehackFunction(static::requireModule()[16], varray[$param]);
  }
  public static function is_randomized(dynamic $param): dynamic {
    return static::callRehackFunction(static::requireModule()[17], varray[$param]);
  }
  public static function stats(dynamic $h): dynamic {
    return static::callRehackFunction(static::requireModule()[18], varray[$h]);
  }
  public static function Make(dynamic $H): dynamic {
    return static::callRehackFunction(static::requireModule()[19], varray[$H]);
  }
  public static function MakeSeeded(dynamic $H): dynamic {
    return static::callRehackFunction(static::requireModule()[20], varray[$H]);
  }
  public static function hash(dynamic $x): dynamic {
    return static::callRehackFunction(static::requireModule()[21], varray[$x]);
  }
  public static function seeded_hash(dynamic $seed, dynamic $x): dynamic {
    return static::callRehackFunction(static::requireModule()[22], varray[$seed, $x]);
  }
  public static function hash_param(dynamic $n1, dynamic $n2, dynamic $x): dynamic {
    return static::callRehackFunction(static::requireModule()[23], varray[$n1, $n2, $x]);
  }

}
/* Hashing disabled */
