<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class CamlinternalOO {
  <<__Override, __Memoize>>
  public static function requireModule() : Vector<dynamic> {
    $joo_global_object = \Rehack\GlobalObject::get() as dynamic;
    
    $fit_size = new Ref();
    $runtime = $joo_global_object->jsoo_runtime;
    $call1 = $runtime["caml_call1"];
    $call2 = $runtime["caml_call2"];
    $call3 = $runtime["caml_call3"];
    $call5 = $runtime["caml_call5"];
    $caml_check_bound = $runtime["caml_check_bound"];
    $caml_div = $runtime["caml_div"];
    $caml_get_public_method = $runtime["caml_get_public_method"];
    $caml_make_vect = $runtime["caml_make_vect"];
    $string = $runtime["caml_new_string"];
    $caml_obj_block = $runtime["caml_obj_block"];
    $caml_set_oo_id = $runtime["caml_set_oo_id"];
    $caml_string_compare = $runtime["caml_string_compare"];
    $caml_wrap_thrown_exception = $runtime["caml_wrap_thrown_exception"];
    $caml_wrap_thrown_exception_reraise = $runtime[
       "caml_wrap_thrown_exception_reraise"
     ];
    $is_int = $runtime["is_int"];
    $cst = $string("");
    $Assert_failure =  Assert_failure::requireModule ();
    $Sys =  Sys::requireModule ();
    $Obj =  Obj::requireModule ();
    $Undefined_recursive_module =  Undefined_recursive_module::requireModule (
    );
    $Array =  Array_::requireModule ();
    $List =  List_::requireModule ();
    $Not_found =  Not_found::requireModule ();
    $Map =  Map::requireModule ();
    $g_ = Vector{0, $string("camlinternalOO.ml"), 438, 17} as dynamic;
    $f_ = Vector{0, $string("camlinternalOO.ml"), 420, 13} as dynamic;
    $e_ = Vector{0, $string("camlinternalOO.ml"), 417, 13} as dynamic;
    $d_ = Vector{0, $string("camlinternalOO.ml"), 414, 13} as dynamic;
    $c_ = Vector{0, $string("camlinternalOO.ml"), 411, 13} as dynamic;
    $b_ = Vector{0, $string("camlinternalOO.ml"), 408, 13} as dynamic;
    $a_ = Vector{0, $string("camlinternalOO.ml"), 281, 50} as dynamic;
    $copy = (dynamic $o) ==> {
      $o__0 = $o->toVector();
      return $caml_set_oo_id($o__0);
    };
    $params = Vector{0, 1, 1, 1, 3, 16} as dynamic;
    $initial_object_size = 2;
    $dummy_item = 0;
    $public_method_label = (dynamic $s) ==> {
      $i = null;
      $aE_ = null;
      $aF_ = null;
      $accu = Vector{0, 0} as dynamic;
      $aD_ = (int) ($runtime["caml_ml_string_length"]($s) + -1);
      $aC_ = 0;
      if (! ($aD_ < 0)) {
        $i = $aC_;
        for (;;) {
          $aE_ = $runtime["caml_string_get"]($s, $i);
          $accu[1] = (int) ((int) (223 * $accu[1]) + $aE_);
          $aF_ = (int) ($i + 1);
          if ($aD_ !== $i) {$i = $aF_;continue;}
          break;
        }
      }
      $accu[1] = $accu[1] & 2147483647;
      $tag = 1073741823 < $accu[1]
        ? (int) ($accu[1] . 2147483648)
        : ($accu[1]);
      return $tag;
    };
    $compare = (dynamic $x, dynamic $y) ==> {
      return $caml_string_compare($x, $y);
    };
    $Vars = $call1($Map[1], Vector{0, $compare});
    $compare__0 = (dynamic $x, dynamic $y) ==> {
      return $caml_string_compare($x, $y);
    };
    $Meths = $call1($Map[1], Vector{0, $compare__0});
    $compare__1 = (dynamic $x, dynamic $y) ==> {
      return $runtime["caml_int_compare"]($x, $y);
    };
    $Labs = $call1($Map[1], Vector{0, $compare__1});
    $dummy_table = Vector{
      0,
      0,
      Vector{0, $dummy_item},
      $Meths[1],
      $Labs[1],
      0,
      0,
      $Vars[1],
      0
    } as dynamic;
    $table_count = Vector{0, 0} as dynamic;
    $dummy_met = $caml_obj_block(0, 0);
    $fit_size->contents = (dynamic $n) ==> {
      return 2 < $n
        ? (int) ($fit_size->contents((int) ((int) ($n + 1) / 2)) * 2)
        : ($n);
    };
    $new_table = (dynamic $pub_labels) ==> {
      $aB_ = null;
      $aA_ = null;
      $az_ = null;
      $i = null;
      $table_count[1] += 1;
      $len = $pub_labels->count() - 1;
      $methods = $caml_make_vect((int) ((int) ($len * 2) + 2), $dummy_met);
      $caml_check_bound($methods, 0)[1] = $len;
      $av_ = $Sys[10];
      $aw_ = (int)
      ((int) ($runtime["caml_mul"]($fit_size->contents($len), $av_) / 8) + -1);
      $caml_check_bound($methods, 1)[2] = $aw_;
      $ay_ = (int) ($len + -1);
      $ax_ = 0;
      if (! ($ay_ < 0)) {
        $i = $ax_;
        for (;;) {
          $aA_ = (int) ((int) ($i * 2) + 3);
          $az_ = $caml_check_bound($pub_labels, $i)[$i + 1];
          $caml_check_bound($methods, $aA_)[$aA_ + 1] = $az_;
          $aB_ = (int) ($i + 1);
          if ($ay_ !== $i) {$i = $aB_;continue;}
          break;
        }
      }
      return Vector{
        0,
        $initial_object_size,
        $methods,
        $Meths[1],
        $Labs[1],
        0,
        0,
        $Vars[1],
        0
      };
    };
    $resize = (dynamic $array, dynamic $new_size) ==> {
      $new_buck = null;
      $au_ = null;
      $old_size = $array[2]->count() - 1;
      $at_ = $old_size < $new_size ? 1 : (0);
      if ($at_) {
        $new_buck = $caml_make_vect($new_size, $dummy_met);
        $call5($Array[10], $array[2], 0, $new_buck, 0, $old_size);
        $array[2] = $new_buck;
        $au_ = 0;
      }
      else {$au_ = $at_;}
      return $au_;
    };
    $method_count = Vector{0, 0} as dynamic;
    $inst_var_count = Vector{0, 0} as dynamic;
    $new_method = (dynamic $table) ==> {
      $index = $table[2]->count() - 1;
      $resize($table, (int) ($index + 1));
      return $index;
    };
    $get_method_label = (dynamic $table, dynamic $name) ==> {
      $ar_ = null;
      $label = null;
      try {$ar_ = $call2($Meths[27], $name, $table[3]);return $ar_;}
      catch(\Throwable $as_) {
        $as_ = $runtime["caml_wrap_exception"]($as_);
        if ($as_ === $Not_found) {
          $label = $new_method($table);
          $table[3] = $call3($Meths[4], $name, $label, $table[3]);
          $table[4] = $call3($Labs[4], $label, 1, $table[4]);
          return $label;
        }
        throw $caml_wrap_thrown_exception_reraise($as_) as \Throwable;
      }
    };
    $get_method_labels = (dynamic $table, dynamic $names) ==> {
      $ap_ = (dynamic $aq_) ==> {return $get_method_label($table, $aq_);};
      return $call2($Array[15], $ap_, $names);
    };
    $set_method = (dynamic $table, dynamic $label, dynamic $element) ==> {
      $method_count[1] += 1;
      if ($call2($Labs[27], $label, $table[4])) {
        $resize($table, (int) ($label + 1));
        $caml_check_bound($table[2], $label)[$label + 1] = $element;
        return 0;
      }
      $table[6] = Vector{0, Vector{0, $label, $element}, $table[6]};
      return 0;
    };
    $get_method = (dynamic $table, dynamic $label) ==> {
      $an_ = null;
      try {$an_ = $call2($List[38], $label, $table[6]);return $an_;}
      catch(\Throwable $ao_) {
        $ao_ = $runtime["caml_wrap_exception"]($ao_);
        if ($ao_ === $Not_found) {
          return $caml_check_bound($table[2], $label)[$label + 1];
        }
        throw $caml_wrap_thrown_exception_reraise($ao_) as \Throwable;
      }
    };
    $to_list = (dynamic $arr) ==> {
      return $arr === 0 ? 0 : ($call1($Array[11], $arr));
    };
    $narrow = 
    (dynamic $table, dynamic $vars, dynamic $virt_meths, dynamic $concr_meths) ==> {
      $vars__0 = $to_list($vars);
      $virt_meths__0 = $to_list($virt_meths);
      $concr_meths__0 = $to_list($concr_meths);
      $X_ = (dynamic $am_) ==> {return $get_method_label($table, $am_);};
      $virt_meth_labs = $call2($List[17], $X_, $virt_meths__0);
      $Y_ = (dynamic $al_) ==> {return $get_method_label($table, $al_);};
      $concr_meth_labs = $call2($List[17], $Y_, $concr_meths__0);
      $table[5] =
        Vector{
          0,
          Vector{
            0,
            $table[3],
            $table[4],
            $table[6],
            $table[7],
            $virt_meth_labs,
            $vars__0
          },
          $table[5]
        };
      $Z_ = $Vars[1];
      $aa_ = $table[7];
      $ab_ = (dynamic $lab, dynamic $info, dynamic $tvars) ==> {
        return $call2($List[31], $lab, $vars__0)
          ? $call3($Vars[4], $lab, $info, $tvars)
          : ($tvars);
      };
      $table[7] = $call3($Vars[13], $ab_, $aa_, $Z_);
      $by_name = Vector{0, $Meths[1]} as dynamic;
      $by_label = Vector{0, $Labs[1]} as dynamic;
      $ac_ = (dynamic $met, dynamic $label) ==> {
        $aj_ = null;
        $ai_ = null;
        $by_name[1] = $call3($Meths[4], $met, $label, $by_name[1]);
        $ah_ = $by_label[1];
        try {$aj_ = $call2($Labs[27], $label, $table[4]);$ai_ = $aj_;}
        catch(\Throwable $ak_) {
          $ak_ = $runtime["caml_wrap_exception"]($ak_);
          if ($ak_ !== $Not_found) {
            throw $caml_wrap_thrown_exception_reraise($ak_) as \Throwable;
          }
          $ai_ = 1;
        }
        $by_label[1] = $call3($Labs[4], $label, $ai_, $ah_);
        return 0;
      };
      $call3($List[22], $ac_, $concr_meths__0, $concr_meth_labs);
      $ad_ = (dynamic $met, dynamic $label) ==> {
        $by_name[1] = $call3($Meths[4], $met, $label, $by_name[1]);
        $by_label[1] = $call3($Labs[4], $label, 0, $by_label[1]);
        return 0;
      };
      $call3($List[22], $ad_, $virt_meths__0, $virt_meth_labs);
      $table[3] = $by_name[1];
      $table[4] = $by_label[1];
      $ae_ = 0;
      $af_ = $table[6];
      $ag_ = (dynamic $met, dynamic $hm) ==> {
        $lab = $met[1];
        return $call2($List[31], $lab, $virt_meth_labs)
          ? $hm
          : (Vector{0, $met, $hm});
      };
      $table[6] = $call3($List[21], $ag_, $af_, $ae_);
      return 0;
    };
    $widen = (dynamic $table) ==> {
      $match = $call1($List[5], $table[5]);
      $vars = $match[6];
      $virt_meths = $match[5];
      $saved_vars = $match[4];
      $saved_hidden_meths = $match[3];
      $by_label = $match[2];
      $by_name = $match[1];
      $table[5] = $call1($List[6], $table[5]);
      $T_ = (dynamic $s, dynamic $v) ==> {
        $W_ = $call2($Vars[27], $v, $table[7]);
        return $call3($Vars[4], $v, $W_, $s);
      };
      $table[7] = $call3($List[20], $T_, $saved_vars, $vars);
      $table[3] = $by_name;
      $table[4] = $by_label;
      $U_ = $table[6];
      $V_ = (dynamic $met, dynamic $hm) ==> {
        $lab = $met[1];
        return $call2($List[31], $lab, $virt_meths)
          ? $hm
          : (Vector{0, $met, $hm});
      };
      $table[6] = $call3($List[21], $V_, $U_, $saved_hidden_meths);
      return 0;
    };
    $new_slot = (dynamic $table) ==> {
      $index = $table[1];
      $table[1] = (int) ($index + 1);
      return $index;
    };
    $new_variable = (dynamic $table, dynamic $name) ==> {
      $R_ = null;
      $index = null;
      try {$R_ = $call2($Vars[27], $name, $table[7]);return $R_;}
      catch(\Throwable $S_) {
        $S_ = $runtime["caml_wrap_exception"]($S_);
        if ($S_ === $Not_found) {
          $index = $new_slot($table);
          if ($runtime["caml_string_notequal"]($name, $cst)) {
            $table[7] = $call3($Vars[4], $name, $index, $table[7]);
          }
          return $index;
        }
        throw $caml_wrap_thrown_exception_reraise($S_) as \Throwable;
      }
    };
    $to_array = (dynamic $arr) ==> {
      return $runtime["caml_equal"]($arr, 0) ? Vector{0} : ($arr);
    };
    $new_methods_variables = (dynamic $table, dynamic $meths, dynamic $vals) ==> {
      $i = null;
      $M_ = null;
      $N_ = null;
      $O_ = null;
      $i__0 = null;
      $P_ = null;
      $Q_ = null;
      $meths__0 = $to_array($meths);
      $nmeths = $meths__0->count() - 1;
      $nvals = $vals->count() - 1;
      $res = $caml_make_vect((int) ($nmeths + $nvals), 0);
      $J_ = (int) ($nmeths + -1);
      $I_ = 0;
      if (! ($J_ < 0)) {
        $i__0 = $I_;
        for (;;) {
          $P_ =
            $get_method_label(
              $table,
              $caml_check_bound($meths__0, $i__0)[$i__0 + 1]
            );
          $caml_check_bound($res, $i__0)[$i__0 + 1] = $P_;
          $Q_ = (int) ($i__0 + 1);
          if ($J_ !== $i__0) {$i__0 = $Q_;continue;}
          break;
        }
      }
      $L_ = (int) ($nvals + -1);
      $K_ = 0;
      if (! ($L_ < 0)) {
        $i = $K_;
        for (;;) {
          $N_ = (int) ($i + $nmeths);
          $M_ = $new_variable($table, $caml_check_bound($vals, $i)[$i + 1]);
          $caml_check_bound($res, $N_)[$N_ + 1] = $M_;
          $O_ = (int) ($i + 1);
          if ($L_ !== $i) {$i = $O_;continue;}
          break;
        }
      }
      return $res;
    };
    $get_variable = (dynamic $table, dynamic $name) ==> {
      $G_ = null;
      try {$G_ = $call2($Vars[27], $name, $table[7]);return $G_;}
      catch(\Throwable $H_) {
        $H_ = $runtime["caml_wrap_exception"]($H_);
        if ($H_ === $Not_found) {
          throw $caml_wrap_thrown_exception(Vector{0, $Assert_failure, $a_}) as \Throwable;
        }
        throw $caml_wrap_thrown_exception_reraise($H_) as \Throwable;
      }
    };
    $get_variables = (dynamic $table, dynamic $names) ==> {
      $E_ = (dynamic $F_) ==> {return $get_variable($table, $F_);};
      return $call2($Array[15], $E_, $names);
    };
    $add_initializer = (dynamic $table, dynamic $f) ==> {
      $table[8] = Vector{0, $f, $table[8]};
      return 0;
    };
    $create_table = (dynamic $public_methods) ==> {
      if ($public_methods === 0) {return $new_table(Vector{0});}
      $tags = $call2($Array[15], $public_method_label, $public_methods);
      $table = $new_table($tags);
      $D_ = (dynamic $i, dynamic $met) ==> {
        $lab = (int) ((int) ($i * 2) + 2);
        $table[3] = $call3($Meths[4], $met, $lab, $table[3]);
        $table[4] = $call3($Labs[4], $lab, 1, $table[4]);
        return 0;
      };
      $call2($Array[14], $D_, $public_methods);
      return $table;
    };
    $init_class = (dynamic $table) ==> {
      $inst_var_count[1] =
        (int)
        ((int) ($inst_var_count[1] + $table[1]) + -1);
      $table[8] = $call1($List[9], $table[8]);
      $C_ = $Sys[10];
      return $resize(
        $table,
        (int)
        (3 + $caml_div((int) ($caml_check_bound($table[2], 1)[2] * 16), $C_))
      );
    };
    $inherits = 
    (dynamic $cla, dynamic $vals, dynamic $virt_meths, dynamic $concr_meths, dynamic $param, dynamic $top) ==> {
      $env = $param[4];
      $super__0 = $param[2];
      $narrow($cla, $vals, $virt_meths, $concr_meths);
      $init = $top ? $call2($super__0, $cla, $env) : ($call1($super__0, $cla));
      $widen($cla);
      $u_ = 0;
      $v_ = $to_array($concr_meths);
      $w_ = (dynamic $nm) ==> {
        return $get_method($cla, $get_method_label($cla, $nm));
      };
      $x_ = Vector{0, $call2($Array[15], $w_, $v_), $u_} as dynamic;
      $y_ = $to_array($vals);
      $z_ = (dynamic $B_) ==> {return $get_variable($cla, $B_);};
      $A_ = Vector{
        0,
        Vector{0, $init},
        Vector{0, $call2($Array[15], $z_, $y_), $x_}
      } as dynamic;
      return $call1($Array[6], $A_);
    };
    $make_class = (dynamic $pub_meths, dynamic $class_init) ==> {
      $table = $create_table($pub_meths);
      $env_init = $call1($class_init, $table);
      $init_class($table);
      return Vector{0, $call1($env_init, 0), $class_init, $env_init, 0};
    };
    $make_class_store = 
    (dynamic $pub_meths, dynamic $class_init, dynamic $init_table) ==> {
      $table = $create_table($pub_meths);
      $env_init = $call1($class_init, $table);
      $init_class($table);
      $init_table[2] = $class_init;
      $init_table[1] = $env_init;
      return 0;
    };
    $dummy_class = (dynamic $loc) ==> {
      $undef = (dynamic $param) ==> {
        throw $caml_wrap_thrown_exception(
                Vector{0, $Undefined_recursive_module, $loc}
              ) as \Throwable;
      };
      return Vector{0, $undef, $undef, $undef, 0};
    };
    $create_object = (dynamic $table) ==> {
      $obj = $caml_obj_block($Obj[8], $table[1]);
      $obj[1] = $table[2];
      return $caml_set_oo_id($obj);
    };
    $create_object_opt = (dynamic $obj_0, dynamic $table) ==> {
      if ($obj_0) {return $obj_0;}
      $obj = $caml_obj_block($Obj[8], $table[1]);
      $obj[1] = $table[2];
      return $caml_set_oo_id($obj);
    };
    $iter_f = (dynamic $obj, dynamic $param) ==> {
      $param__1 = null;
      $f = null;
      $param__0 = $param;
      for (;;) {
        if ($param__0) {
          $param__1 = $param__0[2];
          $f = $param__0[1];
          $call1($f, $obj);
          $param__0 = $param__1;
          continue;
        }
        return 0;
      }
    };
    $run_initializers = (dynamic $obj, dynamic $table) ==> {
      $inits = $table[8];
      $t_ = 0 !== $inits ? 1 : (0);
      return $t_ ? $iter_f($obj, $inits) : ($t_);
    };
    $run_initializers_opt = (dynamic $obj_0, dynamic $obj, dynamic $table) ==> {
      if ($obj_0) {return $obj;}
      $inits = $table[8];
      if (0 !== $inits) {$iter_f($obj, $inits);}
      return $obj;
    };
    $create_object_and_run_initializers = (dynamic $obj_0, dynamic $table) ==> {
      if ($obj_0) {return $obj_0;}
      $obj = $create_object($table);
      $run_initializers($obj, $table);
      return $obj;
    };
    $get_data = (dynamic $param) ==> {
      if ($param) {return $param[2];}
      throw $caml_wrap_thrown_exception(Vector{0, $Assert_failure, $e_}) as \Throwable;
    };
    $build_path = (dynamic $n, dynamic $keys, dynamic $tables) ==> {
      $i = null;
      $r_ = null;
      $s_ = null;
      $res = Vector{0, 0, 0, 0} as dynamic;
      $r = Vector{0, $res} as dynamic;
      $p_ = 0;
      if (! ($n < 0)) {
        $i = $p_;
        for (;;) {
          $r_ = $r[1];
          $r[1] = Vector{0, $caml_check_bound($keys, $i)[$i + 1], $r_, 0};
          $s_ = (int) ($i + 1);
          if ($n !== $i) {$i = $s_;continue;}
          break;
        }
      }
      $q_ = $r[1];
      if ($tables) {$tables[2] = $q_;return $res;}
      throw $caml_wrap_thrown_exception(Vector{0, $Assert_failure, $b_}) as \Throwable;
    };
    $lookup_tables = (dynamic $root, dynamic $keys) ==> {
      $o_ = null;
      $tables = null;
      $i = null;
      $key = null;
      $tables__0 = null;
      $tables__1 = null;
      $i__0 = null;
      $v = null;
      $i__1 = null;
      $tables__2 = $get_data($root);
      if ($tables__2) {
        $i__1 = (int) ($keys->count() - 1 + -1);
        $i = $i__1;
        $tables = $tables__2;
        for (;;) {
          $continue_label = null;
          if (0 <= $i) {
            $key = $caml_check_bound($keys, $i)[$i + 1];
            $tables__0 = $tables;
            for (;;) {
              if ($tables__0) {
                if ($tables__0[1] === $key) {
                  $tables__1 = $get_data($tables__0);
                  if ($tables__1) {
                    $i__0 = (int) ($i + -1);
                    $i = $i__0;
                    $tables = $tables__1;
                    $continue_label = "a";break;
                  }
                  throw $caml_wrap_thrown_exception(
                          Vector{0, $Assert_failure, $g_}
                        ) as \Throwable;
                }
                if ($tables__0) {
                  $o_ = $tables__0[3];
                  if ($o_) {$tables__0 = $o_;continue;}
                  $v = Vector{0, $key, 0, 0};
                  if ($tables__0) {
                    $tables__0[3] = $v;
                    return $build_path((int) ($i + -1), $keys, $v);
                  }
                  throw $caml_wrap_thrown_exception(
                          Vector{0, $Assert_failure, $c_}
                        ) as \Throwable;
                }
                throw $caml_wrap_thrown_exception(
                        Vector{0, $Assert_failure, $f_}
                      ) as \Throwable;
              }
              throw $caml_wrap_thrown_exception(
                      Vector{0, $Assert_failure, $d_}
                    ) as \Throwable;
            }
            if ($continue_label === "a") {continue;}
          }
          return $tables;
        }
      }
      return $build_path((int) ($keys->count() - 1 + -1), $keys, $root);
    };
    $new_cache = (dynamic $table) ==> {
      $n__0 = null;
      $n_ = null;
      $switch__0 = null;
      $n = $new_method($table);
      if (0 === (int) ($n % 2)) {$switch__0 = 0;}
      else {
        $n_ = $Sys[10];
        if (
          (int)
          (2 + $caml_div((int) ($caml_check_bound($table[2], 1)[2] * 16), $n_)) < $n
        ) {$switch__0 = 0;}
        else {$n__0 = $new_method($table);$switch__0 = 1;}
      }
      if (! $switch__0) {$n__0 = $n;}
      $caml_check_bound($table[2], $n__0)[$n__0 + 1] = 0;
      return $n__0;
    };
    $set_methods = (dynamic $table, dynamic $methods) ==> {
      $next = null;
      $clo = null;
      $x = null;
      $n = null;
      $e = null;
      $n__0 = null;
      $n__1 = null;
      $n__2 = null;
      $f = null;
      $x__0 = null;
      $f__0 = null;
      $n__3 = null;
      $f__1 = null;
      $e__0 = null;
      $n__4 = null;
      $f__2 = null;
      $n__5 = null;
      $f__3 = null;
      $x__1 = null;
      $y = null;
      $f__4 = null;
      $x__2 = null;
      $n__6 = null;
      $f__5 = null;
      $x__3 = null;
      $e__1 = null;
      $n__7 = null;
      $f__6 = null;
      $x__4 = null;
      $n__8 = null;
      $f__7 = null;
      $n__9 = null;
      $x__5 = null;
      $f__8 = null;
      $e__2 = null;
      $n__10 = null;
      $x__6 = null;
      $f__9 = null;
      $n__11 = null;
      $x__7 = null;
      $n__12 = null;
      $x__8 = null;
      $n__13 = null;
      $m = null;
      $n__14 = null;
      $e__3 = null;
      $m__0 = null;
      $n__15 = null;
      $m__1 = null;
      $m__2 = null;
      $x__9 = null;
      $m__3 = null;
      $n__16 = null;
      $m__4 = null;
      $e__4 = null;
      $n__17 = null;
      $m__5 = null;
      $n__18 = null;
      $h_ = null;
      $label = null;
      $clo__0 = null;
      $len = $methods->count() - 1;
      $i = Vector{0, 0} as dynamic;
      for (;;) {
        if ($i[1] < $len) {
          $h_ = $i[1];
          $label = $caml_check_bound($methods, $h_)[$h_ + 1];
          $next =
            (dynamic $param) ==> {
              $i[1] += 1;
              $m_ = $i[1];
              return $caml_check_bound($methods, $m_)[$m_ + 1];
            };
          $clo = $next(0);
          if ($is_int($clo)) {
            switch($clo) {
              // FALLTHROUGH
              case 0:
                $x = $next(0);
                $clo__0 =
                  ((dynamic $x) ==> {return (dynamic $obj) ==> {return $x;};})($x);
                break;
              // FALLTHROUGH
              case 1:
                $n = $next(0);
                $clo__0 =
                  ((dynamic $n) ==> {
                     return (dynamic $obj) ==> {return $obj[$n + 1];};
                   })($n);
                break;
              // FALLTHROUGH
              case 2:
                $e = $next(0);
                $n__0 = $next(0);
                $clo__0 =
                  ((dynamic $e, dynamic $n) ==> {
                     return (dynamic $obj) ==> {return $obj[$e + 1][$n + 1];};
                   })($e, $n__0);
                break;
              // FALLTHROUGH
              case 3:
                $n__1 = $next(0);
                $clo__0 =
                  ((dynamic $n) ==> {
                     return (dynamic $obj) ==> {
                       return $call1($obj[1][$n + 1], $obj);
                     };
                   })($n__1);
                break;
              // FALLTHROUGH
              case 4:
                $n__2 = $next(0);
                $clo__0 =
                  ((dynamic $n) ==> {
                     return (dynamic $obj, dynamic $x) ==> {
                       $obj[$n + 1] = $x;
                       return 0;
                     };
                   })($n__2);
                break;
              // FALLTHROUGH
              case 5:
                $f = $next(0);
                $x__0 = $next(0);
                $clo__0 =
                  ((dynamic $f, dynamic $x) ==> {
                     return (dynamic $obj) ==> {return $call1($f, $x);};
                   })($f, $x__0);
                break;
              // FALLTHROUGH
              case 6:
                $f__0 = $next(0);
                $n__3 = $next(0);
                $clo__0 =
                  ((dynamic $f, dynamic $n) ==> {
                     return (dynamic $obj) ==> {return $call1($f, $obj[$n + 1]);};
                   })($f__0, $n__3);
                break;
              // FALLTHROUGH
              case 7:
                $f__1 = $next(0);
                $e__0 = $next(0);
                $n__4 = $next(0);
                $clo__0 =
                  ((dynamic $f, dynamic $e, dynamic $n) ==> {
                     return (dynamic $obj) ==> {
                       return $call1($f, $obj[$e + 1][$n + 1]);
                     };
                   })($f__1, $e__0, $n__4);
                break;
              // FALLTHROUGH
              case 8:
                $f__2 = $next(0);
                $n__5 = $next(0);
                $clo__0 =
                  ((dynamic $f, dynamic $n) ==> {
                     return (dynamic $obj) ==> {
                       return $call1($f, $call1($obj[1][$n + 1], $obj));
                     };
                   })($f__2, $n__5);
                break;
              // FALLTHROUGH
              case 9:
                $f__3 = $next(0);
                $x__1 = $next(0);
                $y = $next(0);
                $clo__0 =
                  ((dynamic $f, dynamic $x, dynamic $y) ==> {
                     return (dynamic $obj) ==> {return $call2($f, $x, $y);};
                   })($f__3, $x__1, $y);
                break;
              // FALLTHROUGH
              case 10:
                $f__4 = $next(0);
                $x__2 = $next(0);
                $n__6 = $next(0);
                $clo__0 =
                  ((dynamic $f, dynamic $x, dynamic $n) ==> {
                     return (dynamic $obj) ==> {
                       return $call2($f, $x, $obj[$n + 1]);
                     };
                   })($f__4, $x__2, $n__6);
                break;
              // FALLTHROUGH
              case 11:
                $f__5 = $next(0);
                $x__3 = $next(0);
                $e__1 = $next(0);
                $n__7 = $next(0);
                $clo__0 =
                  ((dynamic $f, dynamic $x, dynamic $e, dynamic $n) ==> {
                     return (dynamic $obj) ==> {
                       return $call2($f, $x, $obj[$e + 1][$n + 1]);
                     };
                   })($f__5, $x__3, $e__1, $n__7);
                break;
              // FALLTHROUGH
              case 12:
                $f__6 = $next(0);
                $x__4 = $next(0);
                $n__8 = $next(0);
                $clo__0 =
                  ((dynamic $f, dynamic $x, dynamic $n) ==> {
                     return (dynamic $obj) ==> {
                       return $call2($f, $x, $call1($obj[1][$n + 1], $obj));
                     };
                   })($f__6, $x__4, $n__8);
                break;
              // FALLTHROUGH
              case 13:
                $f__7 = $next(0);
                $n__9 = $next(0);
                $x__5 = $next(0);
                $clo__0 =
                  ((dynamic $f, dynamic $n, dynamic $x) ==> {
                     return (dynamic $obj) ==> {
                       return $call2($f, $obj[$n + 1], $x);
                     };
                   })($f__7, $n__9, $x__5);
                break;
              // FALLTHROUGH
              case 14:
                $f__8 = $next(0);
                $e__2 = $next(0);
                $n__10 = $next(0);
                $x__6 = $next(0);
                $clo__0 =
                  ((dynamic $f, dynamic $e, dynamic $n, dynamic $x) ==> {
                     return (dynamic $obj) ==> {
                       return $call2($f, $obj[$e + 1][$n + 1], $x);
                     };
                   })($f__8, $e__2, $n__10, $x__6);
                break;
              // FALLTHROUGH
              case 15:
                $f__9 = $next(0);
                $n__11 = $next(0);
                $x__7 = $next(0);
                $clo__0 =
                  ((dynamic $f, dynamic $n, dynamic $x) ==> {
                     return (dynamic $obj) ==> {
                       return $call2($f, $call1($obj[1][$n + 1], $obj), $x);
                     };
                   })($f__9, $n__11, $x__7);
                break;
              // FALLTHROUGH
              case 16:
                $n__12 = $next(0);
                $x__8 = $next(0);
                $clo__0 =
                  ((dynamic $n, dynamic $x) ==> {
                     return (dynamic $obj) ==> {
                       return $call2($obj[1][$n + 1], $obj, $x);
                     };
                   })($n__12, $x__8);
                break;
              // FALLTHROUGH
              case 17:
                $n__13 = $next(0);
                $m = $next(0);
                $clo__0 =
                  ((dynamic $n, dynamic $m) ==> {
                     return (dynamic $obj) ==> {
                       return $call2($obj[1][$n + 1], $obj, $obj[$m + 1]);
                     };
                   })($n__13, $m);
                break;
              // FALLTHROUGH
              case 18:
                $n__14 = $next(0);
                $e__3 = $next(0);
                $m__0 = $next(0);
                $clo__0 =
                  ((dynamic $n, dynamic $e, dynamic $m) ==> {
                     return (dynamic $obj) ==> {
                       return $call2($obj[1][$n + 1], $obj, $obj[$e + 1][$m + 1]);
                     };
                   })($n__14, $e__3, $m__0);
                break;
              // FALLTHROUGH
              case 19:
                $n__15 = $next(0);
                $m__1 = $next(0);
                $clo__0 =
                  ((dynamic $n, dynamic $m) ==> {
                     return (dynamic $obj) ==> {
                       $k_ = $call1($obj[1][$m + 1], $obj);
                       return $call2($obj[1][$n + 1], $obj, $k_);
                     };
                   })($n__15, $m__1);
                break;
              // FALLTHROUGH
              case 20:
                $m__2 = $next(0);
                $x__9 = $next(0);
                $new_cache($table);
                $clo__0 =
                  ((dynamic $m, dynamic $x) ==> {
                     return (dynamic $obj) ==> {
                       return $call1($caml_get_public_method($x, $m, 0), $x);
                     };
                   })($m__2, $x__9);
                break;
              // FALLTHROUGH
              case 21:
                $m__3 = $next(0);
                $n__16 = $next(0);
                $new_cache($table);
                $clo__0 =
                  ((dynamic $m, dynamic $n) ==> {
                     return (dynamic $obj) ==> {
                       $j_ = $obj[$n + 1];
                       return $call1($caml_get_public_method($j_, $m, 0), $j_);
                     };
                   })($m__3, $n__16);
                break;
              // FALLTHROUGH
              case 22:
                $m__4 = $next(0);
                $e__4 = $next(0);
                $n__17 = $next(0);
                $new_cache($table);
                $clo__0 =
                  ((dynamic $m, dynamic $e, dynamic $n) ==> {
                     return (dynamic $obj) ==> {
                       $i_ = $obj[$e + 1][$n + 1];
                       return $call1($caml_get_public_method($i_, $m, 0), $i_);
                     };
                   })($m__4, $e__4, $n__17);
                break;
              // FALLTHROUGH
              default:
                $m__5 = $next(0);
                $n__18 = $next(0);
                $new_cache($table);
                $clo__0 =
                  ((dynamic $m, dynamic $n) ==> {
                     return (dynamic $obj) ==> {
                       $l_ = $call1($obj[1][$n + 1], $obj);
                       return $call1($caml_get_public_method($l_, $m, 0), $l_);
                     };
                   })($m__5, $n__18);
              }
          }
          else {$clo__0 = $clo;}
          $set_method($table, $label, $clo__0);
          $i[1] += 1;
          continue;
        }
        return 0;
      }
    };
    $stats = (dynamic $param) ==> {
      return Vector{0, $table_count[1], $method_count[1], $inst_var_count[1]};
    };
    $CamlinternalOO = Vector{
      0,
      $public_method_label,
      $new_method,
      $new_variable,
      $new_methods_variables,
      $get_variable,
      $get_variables,
      $get_method_label,
      $get_method_labels,
      $get_method,
      $set_method,
      $set_methods,
      $narrow,
      $widen,
      $add_initializer,
      $dummy_table,
      $create_table,
      $init_class,
      $inherits,
      $make_class,
      $make_class_store,
      $dummy_class,
      $copy,
      $create_object,
      $create_object_opt,
      $run_initializers,
      $run_initializers_opt,
      $create_object_and_run_initializers,
      $lookup_tables,
      $params,
      $stats
    } as dynamic;
    
     return ($CamlinternalOO);

  }
  public static function public_method_label(dynamic $s): dynamic {
    return static::callRehackFunction(static::requireModule()[1], varray[$s]);
  }
  public static function new_method(dynamic $table): dynamic {
    return static::callRehackFunction(static::requireModule()[2], varray[$table]);
  }
  public static function new_variable(dynamic $table, dynamic $name): dynamic {
    return static::callRehackFunction(static::requireModule()[3], varray[$table, $name]);
  }
  public static function new_methods_variables(dynamic $table, dynamic $meths, dynamic $vals): dynamic {
    return static::callRehackFunction(static::requireModule()[4], varray[$table, $meths, $vals]);
  }
  public static function get_variable(dynamic $table, dynamic $name): dynamic {
    return static::callRehackFunction(static::requireModule()[5], varray[$table, $name]);
  }
  public static function get_variables(dynamic $table, dynamic $names): dynamic {
    return static::callRehackFunction(static::requireModule()[6], varray[$table, $names]);
  }
  public static function get_method_label(dynamic $table, dynamic $name): dynamic {
    return static::callRehackFunction(static::requireModule()[7], varray[$table, $name]);
  }
  public static function get_method_labels(dynamic $table, dynamic $names): dynamic {
    return static::callRehackFunction(static::requireModule()[8], varray[$table, $names]);
  }
  public static function get_method(dynamic $table, dynamic $label): dynamic {
    return static::callRehackFunction(static::requireModule()[9], varray[$table, $label]);
  }
  public static function set_method(dynamic $table, dynamic $label, dynamic $element): dynamic {
    return static::callRehackFunction(static::requireModule()[10], varray[$table, $label, $element]);
  }
  public static function set_methods(dynamic $table, dynamic $methods): dynamic {
    return static::callRehackFunction(static::requireModule()[11], varray[$table, $methods]);
  }
  public static function narrow(dynamic $table, dynamic $vars, dynamic $virt_meths, dynamic $concr_meths): dynamic {
    return static::callRehackFunction(static::requireModule()[12], varray[$table, $vars, $virt_meths, $concr_meths]);
  }
  public static function widen(dynamic $table): dynamic {
    return static::callRehackFunction(static::requireModule()[13], varray[$table]);
  }
  public static function add_initializer(dynamic $table, dynamic $f): dynamic {
    return static::callRehackFunction(static::requireModule()[14], varray[$table, $f]);
  }
  public static function create_table(dynamic $public_methods): dynamic {
    return static::callRehackFunction(static::requireModule()[16], varray[$public_methods]);
  }
  public static function _init_class_(dynamic $table): dynamic {
    return static::callRehackFunction(static::requireModule()[17], varray[$table]);
  }
  public static function inherits(dynamic $cla, dynamic $vals, dynamic $virt_meths, dynamic $concr_meths, dynamic $param, dynamic $top): dynamic {
    return static::callRehackFunction(static::requireModule()[18], varray[$cla, $vals, $virt_meths, $concr_meths, $param, $top]);
  }
  public static function _make_class_(dynamic $pub_meths, dynamic $class_init): dynamic {
    return static::callRehackFunction(static::requireModule()[19], varray[$pub_meths, $class_init]);
  }
  public static function make_class_store(dynamic $pub_meths, dynamic $class_init, dynamic $init_table): dynamic {
    return static::callRehackFunction(static::requireModule()[20], varray[$pub_meths, $class_init, $init_table]);
  }
  public static function _dummy_class_(dynamic $loc): dynamic {
    return static::callRehackFunction(static::requireModule()[21], varray[$loc]);
  }
  public static function copy(dynamic $o): dynamic {
    return static::callRehackFunction(static::requireModule()[22], varray[$o]);
  }
  public static function create_object(dynamic $table): dynamic {
    return static::callRehackFunction(static::requireModule()[23], varray[$table]);
  }
  public static function create_object_opt(dynamic $obj_0, dynamic $table): dynamic {
    return static::callRehackFunction(static::requireModule()[24], varray[$obj_0, $table]);
  }
  public static function run_initializers(dynamic $obj, dynamic $table): dynamic {
    return static::callRehackFunction(static::requireModule()[25], varray[$obj, $table]);
  }
  public static function run_initializers_opt(dynamic $obj_0, dynamic $obj, dynamic $table): dynamic {
    return static::callRehackFunction(static::requireModule()[26], varray[$obj_0, $obj, $table]);
  }
  public static function create_object_and_run_initializers(dynamic $obj_0, dynamic $table): dynamic {
    return static::callRehackFunction(static::requireModule()[27], varray[$obj_0, $table]);
  }
  public static function lookup_tables(dynamic $root, dynamic $keys): dynamic {
    return static::callRehackFunction(static::requireModule()[28], varray[$root, $keys]);
  }
  public static function stats(dynamic $param): dynamic {
    return static::callRehackFunction(static::requireModule()[30], varray[$param]);
  }

}
/* Hashing disabled */
