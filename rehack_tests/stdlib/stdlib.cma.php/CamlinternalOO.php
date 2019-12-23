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
    
    $fit_size = new Ref();$lookup_keys = new Ref();
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
    $g_ = Vector{0, $string("camlinternalOO.ml"), 438, 17};
    $f_ = Vector{0, $string("camlinternalOO.ml"), 420, 13};
    $e_ = Vector{0, $string("camlinternalOO.ml"), 417, 13};
    $d_ = Vector{0, $string("camlinternalOO.ml"), 414, 13};
    $c_ = Vector{0, $string("camlinternalOO.ml"), 411, 13};
    $b_ = Vector{0, $string("camlinternalOO.ml"), 408, 13};
    $a_ = Vector{0, $string("camlinternalOO.ml"), 281, 50};
    $copy = (dynamic $o) ==> {
      $o__0 = $o->toVector();
      return $caml_set_oo_id($o__0);
    };
    $params = Vector{0, 1, 1, 1, 3, 16};
    $initial_object_size = 2;
    $dummy_item = 0;
    $public_method_label = (dynamic $s) ==> {
      $accu = Vector{0, 0};
      $aC_ = (int) ($runtime["caml_ml_string_length"]($s) + -1);
      $aB_ = 0;
      if (! ($aC_ < 0)) {
        $i = $aB_;
        for (;;) {
          $aD_ = $runtime["caml_string_get"]($s, $i);
          $accu[1] = (int) ((int) (223 * $accu[1]) + $aD_);
          $aE_ = (int) ($i + 1);
          if ($aC_ !== $i) {$i = $aE_;continue;}
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
    };
    $table_count = Vector{0, 0};
    $dummy_met = $caml_obj_block(0, 0);
    $fit_size->contents = (dynamic $n) ==> {
      return 2 < $n
        ? (int) ($fit_size->contents((int) ((int) ($n + 1) / 2)) * 2)
        : ($n);
    };
    $new_table = (dynamic $pub_labels) ==> {
      $table_count[1] += 1;
      $len = $pub_labels->count() - 1;
      $methods = $caml_make_vect((int) ((int) ($len * 2) + 2), $dummy_met);
      $caml_check_bound($methods, 0)[1] = $len;
      $au_ = $Sys[10];
      $av_ = (int)
      ((int) ($runtime["caml_mul"]($fit_size->contents($len), $au_) / 8) + -1);
      $caml_check_bound($methods, 1)[2] = $av_;
      $ax_ = (int) ($len + -1);
      $aw_ = 0;
      if (! ($ax_ < 0)) {
        $i = $aw_;
        for (;;) {
          $az_ = (int) ((int) ($i * 2) + 3);
          $ay_ = $caml_check_bound($pub_labels, $i)[$i + 1];
          $caml_check_bound($methods, $az_)[$az_ + 1] = $ay_;
          $aA_ = (int) ($i + 1);
          if ($ax_ !== $i) {$i = $aA_;continue;}
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
      $old_size = $array[2]->count() - 1;
      $as_ = $old_size < $new_size ? 1 : (0);
      if ($as_) {
        $new_buck = $caml_make_vect($new_size, $dummy_met);
        $call5($Array[10], $array[2], 0, $new_buck, 0, $old_size);
        $array[2] = $new_buck;
        $at_ = 0;
      }
      else {$at_ = $as_;}
      return $at_;
    };
    $put = (dynamic $array, dynamic $label, dynamic $element) ==> {
      $resize($array, (int) ($label + 1));
      $caml_check_bound($array[2], $label)[$label + 1] = $element;
      return 0;
    };
    $method_count = Vector{0, 0};
    $inst_var_count = Vector{0, 0};
    $new_method = (dynamic $table) ==> {
      $index = $table[2]->count() - 1;
      $resize($table, (int) ($index + 1));
      return $index;
    };
    $get_method_label = (dynamic $table, dynamic $name) ==> {
      try {$aq_ = $call2($Meths[27], $name, $table[3]);return $aq_;}
      catch(\Throwable $ar_) {
        $ar_ = $runtime["caml_wrap_exception"]($ar_);
        if ($ar_ === $Not_found) {
          $label = $new_method($table);
          $table[3] = $call3($Meths[4], $name, $label, $table[3]);
          $table[4] = $call3($Labs[4], $label, 1, $table[4]);
          return $label;
        }
        throw $caml_wrap_thrown_exception_reraise($ar_) as \Throwable;
      }
    };
    $get_method_labels = (dynamic $table, dynamic $names) ==> {
      $ao_ = (dynamic $ap_) ==> {return $get_method_label($table, $ap_);};
      return $call2($Array[15], $ao_, $names);
    };
    $set_method = (dynamic $table, dynamic $label, dynamic $element) ==> {
      $method_count[1] += 1;
      if ($call2($Labs[27], $label, $table[4])) {return $put($table, $label, $element);}
      $table[6] = Vector{0, Vector{0, $label, $element}, $table[6]};
      return 0;
    };
    $get_method = (dynamic $table, dynamic $label) ==> {
      try {$am_ = $call2($List[38], $label, $table[6]);return $am_;}
      catch(\Throwable $an_) {
        $an_ = $runtime["caml_wrap_exception"]($an_);
        if ($an_ === $Not_found) {
          return $caml_check_bound($table[2], $label)[$label + 1];
        }
        throw $caml_wrap_thrown_exception_reraise($an_) as \Throwable;
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
      $V_ = (dynamic $al_) ==> {return $get_method_label($table, $al_);};
      $virt_meth_labs = $call2($List[17], $V_, $virt_meths__0);
      $W_ = (dynamic $ak_) ==> {return $get_method_label($table, $ak_);};
      $concr_meth_labs = $call2($List[17], $W_, $concr_meths__0);
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
      $X_ = $Vars[1];
      $Y_ = $table[7];
      $Z_ = (dynamic $lab, dynamic $info, dynamic $tvars) ==> {
        return $call2($List[31], $lab, $vars__0)
          ? $call3($Vars[4], $lab, $info, $tvars)
          : ($tvars);
      };
      $table[7] = $call3($Vars[13], $Z_, $Y_, $X_);
      $by_name = Vector{0, $Meths[1]};
      $by_label = Vector{0, $Labs[1]};
      $aa_ = (dynamic $met, dynamic $label) ==> {
        $by_name[1] = $call3($Meths[4], $met, $label, $by_name[1]);
        $af_ = $by_label[1];
        try {$ai_ = $call2($Labs[27], $label, $table[4]);$ah_ = $ai_;}
        catch(\Throwable $aj_) {
          $aj_ = $runtime["caml_wrap_exception"]($aj_);
          if ($aj_ !== $Not_found) {
            throw $caml_wrap_thrown_exception_reraise($aj_) as \Throwable;
          }
          $ag_ = 1;
          $ah_ = $ag_;
        }
        $by_label[1] = $call3($Labs[4], $label, $ah_, $af_);
        return 0;
      };
      $call3($List[22], $aa_, $concr_meths__0, $concr_meth_labs);
      $ab_ = (dynamic $met, dynamic $label) ==> {
        $by_name[1] = $call3($Meths[4], $met, $label, $by_name[1]);
        $by_label[1] = $call3($Labs[4], $label, 0, $by_label[1]);
        return 0;
      };
      $call3($List[22], $ab_, $virt_meths__0, $virt_meth_labs);
      $table[3] = $by_name[1];
      $table[4] = $by_label[1];
      $ac_ = 0;
      $ad_ = $table[6];
      $ae_ = (dynamic $met, dynamic $hm) ==> {
        $lab = $met[1];
        return $call2($List[31], $lab, $virt_meth_labs)
          ? $hm
          : (Vector{0, $met, $hm});
      };
      $table[6] = $call3($List[21], $ae_, $ad_, $ac_);
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
      $R_ = (dynamic $s, dynamic $v) ==> {
        $U_ = $call2($Vars[27], $v, $table[7]);
        return $call3($Vars[4], $v, $U_, $s);
      };
      $table[7] = $call3($List[20], $R_, $saved_vars, $vars);
      $table[3] = $by_name;
      $table[4] = $by_label;
      $S_ = $table[6];
      $T_ = (dynamic $met, dynamic $hm) ==> {
        $lab = $met[1];
        return $call2($List[31], $lab, $virt_meths)
          ? $hm
          : (Vector{0, $met, $hm});
      };
      $table[6] = $call3($List[21], $T_, $S_, $saved_hidden_meths);
      return 0;
    };
    $new_slot = (dynamic $table) ==> {
      $index = $table[1];
      $table[1] = (int) ($index + 1);
      return $index;
    };
    $new_variable = (dynamic $table, dynamic $name) ==> {
      try {$P_ = $call2($Vars[27], $name, $table[7]);return $P_;}
      catch(\Throwable $Q_) {
        $Q_ = $runtime["caml_wrap_exception"]($Q_);
        if ($Q_ === $Not_found) {
          $index = $new_slot($table);
          if ($runtime["caml_string_notequal"]($name, $cst)) {
            $table[7] = $call3($Vars[4], $name, $index, $table[7]);
          }
          return $index;
        }
        throw $caml_wrap_thrown_exception_reraise($Q_) as \Throwable;
      }
    };
    $to_array = (dynamic $arr) ==> {
      return $runtime["caml_equal"]($arr, 0) ? Vector{0} : ($arr);
    };
    $new_methods_variables = (dynamic $table, dynamic $meths, dynamic $vals) ==> {
      $meths__0 = $to_array($meths);
      $nmeths = $meths__0->count() - 1;
      $nvals = $vals->count() - 1;
      $res = $caml_make_vect((int) ($nmeths + $nvals), 0);
      $H_ = (int) ($nmeths + -1);
      $G_ = 0;
      if (! ($H_ < 0)) {
        $i__0 = $G_;
        for (;;) {
          $N_ = $get_method_label(
            $table,
            $caml_check_bound($meths__0, $i__0)[$i__0 + 1]
          );
          $caml_check_bound($res, $i__0)[$i__0 + 1] = $N_;
          $O_ = (int) ($i__0 + 1);
          if ($H_ !== $i__0) {$i__0 = $O_;continue;}
          break;
        }
      }
      $J_ = (int) ($nvals + -1);
      $I_ = 0;
      if (! ($J_ < 0)) {
        $i = $I_;
        for (;;) {
          $L_ = (int) ($i + $nmeths);
          $K_ = $new_variable($table, $caml_check_bound($vals, $i)[$i + 1]);
          $caml_check_bound($res, $L_)[$L_ + 1] = $K_;
          $M_ = (int) ($i + 1);
          if ($J_ !== $i) {$i = $M_;continue;}
          break;
        }
      }
      return $res;
    };
    $get_variable = (dynamic $table, dynamic $name) ==> {
      try {$E_ = $call2($Vars[27], $name, $table[7]);return $E_;}
      catch(\Throwable $F_) {
        $F_ = $runtime["caml_wrap_exception"]($F_);
        if ($F_ === $Not_found) {
          throw $caml_wrap_thrown_exception(Vector{0, $Assert_failure, $a_}) as \Throwable;
        }
        throw $caml_wrap_thrown_exception_reraise($F_) as \Throwable;
      }
    };
    $get_variables = (dynamic $table, dynamic $names) ==> {
      $C_ = (dynamic $D_) ==> {return $get_variable($table, $D_);};
      return $call2($Array[15], $C_, $names);
    };
    $add_initializer = (dynamic $table, dynamic $f) ==> {
      $table[8] = Vector{0, $f, $table[8]};
      return 0;
    };
    $create_table = (dynamic $public_methods) ==> {
      if ($public_methods === 0) {return $new_table(Vector{0});}
      $tags = $call2($Array[15], $public_method_label, $public_methods);
      $table = $new_table($tags);
      $B_ = (dynamic $i, dynamic $met) ==> {
        $lab = (int) ((int) ($i * 2) + 2);
        $table[3] = $call3($Meths[4], $met, $lab, $table[3]);
        $table[4] = $call3($Labs[4], $lab, 1, $table[4]);
        return 0;
      };
      $call2($Array[14], $B_, $public_methods);
      return $table;
    };
    $init_class = (dynamic $table) ==> {
      $inst_var_count[1] =
        (int)
        ((int) ($inst_var_count[1] + $table[1]) + -1);
      $table[8] = $call1($List[9], $table[8]);
      $A_ = $Sys[10];
      return $resize(
        $table,
        (int)
        (3 + $caml_div((int) ($caml_check_bound($table[2], 1)[2] * 16), $A_))
      );
    };
    $inherits = 
    (dynamic $cla, dynamic $vals, dynamic $virt_meths, dynamic $concr_meths, dynamic $param, dynamic $top) ==> {
      $env = $param[4];
      $super__0 = $param[2];
      $narrow($cla, $vals, $virt_meths, $concr_meths);
      $init = $top ? $call2($super__0, $cla, $env) : ($call1($super__0, $cla));
      $widen($cla);
      $s_ = 0;
      $t_ = $to_array($concr_meths);
      $u_ = (dynamic $nm) ==> {
        return $get_method($cla, $get_method_label($cla, $nm));
      };
      $v_ = Vector{0, $call2($Array[15], $u_, $t_), $s_};
      $w_ = $to_array($vals);
      $x_ = (dynamic $z_) ==> {return $get_variable($cla, $z_);};
      $y_ = Vector{
        0,
        Vector{0, $init},
        Vector{0, $call2($Array[15], $x_, $w_), $v_}
      };
      return $call1($Array[6], $y_);
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
      $r_ = 0 !== $inits ? 1 : (0);
      return $r_ ? $iter_f($obj, $inits) : ($r_);
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
    $set_data = (dynamic $tables, dynamic $v) ==> {
      if ($tables) {$tables[2] = $v;return 0;}
      throw $caml_wrap_thrown_exception(Vector{0, $Assert_failure, $b_}) as \Throwable;
    };
    $set_next = (dynamic $tables, dynamic $v) ==> {
      if ($tables) {$tables[3] = $v;return 0;}
      throw $caml_wrap_thrown_exception(Vector{0, $Assert_failure, $c_}) as \Throwable;
    };
    $get_key = (dynamic $param) ==> {
      if ($param) {return $param[1];}
      throw $caml_wrap_thrown_exception(Vector{0, $Assert_failure, $d_}) as \Throwable;
    };
    $get_data = (dynamic $param) ==> {
      if ($param) {return $param[2];}
      throw $caml_wrap_thrown_exception(Vector{0, $Assert_failure, $e_}) as \Throwable;
    };
    $get_next = (dynamic $param) ==> {
      if ($param) {return $param[3];}
      throw $caml_wrap_thrown_exception(Vector{0, $Assert_failure, $f_}) as \Throwable;
    };
    $build_path = (dynamic $n, dynamic $keys, dynamic $tables) ==> {
      $res = Vector{0, 0, 0, 0};
      $r = Vector{0, $res};
      $o_ = 0;
      if (! ($n < 0)) {
        $i = $o_;
        for (;;) {
          $p_ = $r[1];
          $r[1] = Vector{0, $caml_check_bound($keys, $i)[$i + 1], $p_, 0};
          $q_ = (int) ($i + 1);
          if ($n !== $i) {$i = $q_;continue;}
          break;
        }
      }
      $set_data($tables, $r[1]);
      return $res;
    };
    $lookup_keys->contents = (dynamic $i, dynamic $keys, dynamic $tables) ==> {
      if (0 <= $i) {
        $key = $caml_check_bound($keys, $i)[$i + 1];
        $lookup_key = (dynamic $tables) ==> {
          $tables__0 = $tables;
          for (;;) {
            if ($get_key($tables__0) === $key) {
              $tables_data = $get_data($tables__0);
              if ($tables_data) {
                return $lookup_keys->contents(
                  (int)
                  ($i + -1),
                  $keys,
                  $tables_data
                );
              }
              throw $caml_wrap_thrown_exception(
                      Vector{0, $Assert_failure, $g_}
                    ) as \Throwable;
            }
            $next = $get_next($tables__0);
            if ($next) {$tables__0 = $next;continue;}
            $next__0 = Vector{0, $key, 0, 0};
            $set_next($tables__0, $next__0);
            return $build_path((int) ($i + -1), $keys, $next__0);
          }
        };
        return $lookup_key($tables);
      }
      return $tables;
    };
    $lookup_tables = (dynamic $root, dynamic $keys) ==> {
      $root_data = $get_data($root);
      return $root_data
        ? $lookup_keys->contents(
         (int)
         ($keys->count() - 1 + -1),
         $keys,
         $root_data
       )
        : ($build_path((int) ($keys->count() - 1 + -1), $keys, $root));
    };
    $get_const = (dynamic $x) ==> {return (dynamic $obj) ==> {return $x;};};
    $get_var = (dynamic $n) ==> {
      return (dynamic $obj) ==> {return $obj[$n + 1];};
    };
    $get_env = (dynamic $e, dynamic $n) ==> {
      return (dynamic $obj) ==> {return $obj[$e + 1][$n + 1];};
    };
    $get_meth = (dynamic $n) ==> {
      return (dynamic $obj) ==> {return $call1($obj[1][$n + 1], $obj);};
    };
    $set_var = (dynamic $n) ==> {
      return (dynamic $obj, dynamic $x) ==> {$obj[$n + 1] = $x;return 0;};
    };
    $app_const = (dynamic $f, dynamic $x) ==> {
      return (dynamic $obj) ==> {return $call1($f, $x);};
    };
    $app_var = (dynamic $f, dynamic $n) ==> {
      return (dynamic $obj) ==> {return $call1($f, $obj[$n + 1]);};
    };
    $app_env = (dynamic $f, dynamic $e, dynamic $n) ==> {
      return (dynamic $obj) ==> {return $call1($f, $obj[$e + 1][$n + 1]);};
    };
    $app_meth = (dynamic $f, dynamic $n) ==> {
      return (dynamic $obj) ==> {
        return $call1($f, $call1($obj[1][$n + 1], $obj));
      };
    };
    $app_const_const = (dynamic $f, dynamic $x, dynamic $y) ==> {
      return (dynamic $obj) ==> {return $call2($f, $x, $y);};
    };
    $app_const_var = (dynamic $f, dynamic $x, dynamic $n) ==> {
      return (dynamic $obj) ==> {return $call2($f, $x, $obj[$n + 1]);};
    };
    $app_const_meth = (dynamic $f, dynamic $x, dynamic $n) ==> {
      return (dynamic $obj) ==> {
        return $call2($f, $x, $call1($obj[1][$n + 1], $obj));
      };
    };
    $app_var_const = (dynamic $f, dynamic $n, dynamic $x) ==> {
      return (dynamic $obj) ==> {return $call2($f, $obj[$n + 1], $x);};
    };
    $app_meth_const = (dynamic $f, dynamic $n, dynamic $x) ==> {
      return (dynamic $obj) ==> {
        return $call2($f, $call1($obj[1][$n + 1], $obj), $x);
      };
    };
    $app_const_env = (dynamic $f, dynamic $x, dynamic $e, dynamic $n) ==> {
      return (dynamic $obj) ==> {return $call2($f, $x, $obj[$e + 1][$n + 1]);};
    };
    $app_env_const = (dynamic $f, dynamic $e, dynamic $n, dynamic $x) ==> {
      return (dynamic $obj) ==> {return $call2($f, $obj[$e + 1][$n + 1], $x);};
    };
    $meth_app_const = (dynamic $n, dynamic $x) ==> {
      return (dynamic $obj) ==> {return $call2($obj[1][$n + 1], $obj, $x);};
    };
    $meth_app_var = (dynamic $n, dynamic $m) ==> {
      return (dynamic $obj) ==> {
        return $call2($obj[1][$n + 1], $obj, $obj[$m + 1]);
      };
    };
    $meth_app_env = (dynamic $n, dynamic $e, dynamic $m) ==> {
      return (dynamic $obj) ==> {
        return $call2($obj[1][$n + 1], $obj, $obj[$e + 1][$m + 1]);
      };
    };
    $meth_app_meth = (dynamic $n, dynamic $m) ==> {
      return (dynamic $obj) ==> {
        $n_ = $call1($obj[1][$m + 1], $obj);
        return $call2($obj[1][$n + 1], $obj, $n_);
      };
    };
    $send_const = (dynamic $m, dynamic $x, dynamic $c) ==> {
      return (dynamic $obj) ==> {
        return $call1($caml_get_public_method($x, $m, 0), $x);
      };
    };
    $send_var = (dynamic $m, dynamic $n, dynamic $c) ==> {
      return (dynamic $obj) ==> {
        $m_ = $obj[$n + 1];
        return $call1($caml_get_public_method($m_, $m, 0), $m_);
      };
    };
    $send_env = (dynamic $m, dynamic $e, dynamic $n, dynamic $c) ==> {
      return (dynamic $obj) ==> {
        $l_ = $obj[$e + 1][$n + 1];
        return $call1($caml_get_public_method($l_, $m, 0), $l_);
      };
    };
    $send_meth = (dynamic $m, dynamic $n, dynamic $c) ==> {
      return (dynamic $obj) ==> {
        $k_ = $call1($obj[1][$n + 1], $obj);
        return $call1($caml_get_public_method($k_, $m, 0), $k_);
      };
    };
    $new_cache = (dynamic $table) ==> {
      $n = $new_method($table);
      if (0 === (int) ($n % 2)) {$switch__0 = 0;}
      else {
        $j_ = $Sys[10];
        if (
          (int)
          (2 + $caml_div((int) ($caml_check_bound($table[2], 1)[2] * 16), $j_)) < $n
        ) {$switch__0 = 0;}
        else {$n__0 = $new_method($table);$switch__0 = 1;}
      }
      if (! $switch__0) {$n__0 = $n;}
      $caml_check_bound($table[2], $n__0)[$n__0 + 1] = 0;
      return $n__0;
    };
    $method_impl = (dynamic $table, dynamic $i, dynamic $arr) ==> {
      $next = (dynamic $param) ==> {
        $i[1] += 1;
        $i_ = $i[1];
        return $caml_check_bound($arr, $i_)[$i_ + 1];
      };
      $clo = $next(0);
      if ($is_int($clo)) {
        switch($clo) {
          // FALLTHROUGH
          case 0:
            $x = $next(0);
            return $get_const($x);
          // FALLTHROUGH
          case 1:
            $n = $next(0);
            return $get_var($n);
          // FALLTHROUGH
          case 2:
            $e = $next(0);
            $n__0 = $next(0);
            return $get_env($e, $n__0);
          // FALLTHROUGH
          case 3:
            $n__1 = $next(0);
            return $get_meth($n__1);
          // FALLTHROUGH
          case 4:
            $n__2 = $next(0);
            return $set_var($n__2);
          // FALLTHROUGH
          case 5:
            $f = $next(0);
            $x__0 = $next(0);
            return $app_const($f, $x__0);
          // FALLTHROUGH
          case 6:
            $f__0 = $next(0);
            $n__3 = $next(0);
            return $app_var($f__0, $n__3);
          // FALLTHROUGH
          case 7:
            $f__1 = $next(0);
            $e__0 = $next(0);
            $n__4 = $next(0);
            return $app_env($f__1, $e__0, $n__4);
          // FALLTHROUGH
          case 8:
            $f__2 = $next(0);
            $n__5 = $next(0);
            return $app_meth($f__2, $n__5);
          // FALLTHROUGH
          case 9:
            $f__3 = $next(0);
            $x__1 = $next(0);
            $y = $next(0);
            return $app_const_const($f__3, $x__1, $y);
          // FALLTHROUGH
          case 10:
            $f__4 = $next(0);
            $x__2 = $next(0);
            $n__6 = $next(0);
            return $app_const_var($f__4, $x__2, $n__6);
          // FALLTHROUGH
          case 11:
            $f__5 = $next(0);
            $x__3 = $next(0);
            $e__1 = $next(0);
            $n__7 = $next(0);
            return $app_const_env($f__5, $x__3, $e__1, $n__7);
          // FALLTHROUGH
          case 12:
            $f__6 = $next(0);
            $x__4 = $next(0);
            $n__8 = $next(0);
            return $app_const_meth($f__6, $x__4, $n__8);
          // FALLTHROUGH
          case 13:
            $f__7 = $next(0);
            $n__9 = $next(0);
            $x__5 = $next(0);
            return $app_var_const($f__7, $n__9, $x__5);
          // FALLTHROUGH
          case 14:
            $f__8 = $next(0);
            $e__2 = $next(0);
            $n__10 = $next(0);
            $x__6 = $next(0);
            return $app_env_const($f__8, $e__2, $n__10, $x__6);
          // FALLTHROUGH
          case 15:
            $f__9 = $next(0);
            $n__11 = $next(0);
            $x__7 = $next(0);
            return $app_meth_const($f__9, $n__11, $x__7);
          // FALLTHROUGH
          case 16:
            $n__12 = $next(0);
            $x__8 = $next(0);
            return $meth_app_const($n__12, $x__8);
          // FALLTHROUGH
          case 17:
            $n__13 = $next(0);
            $m = $next(0);
            return $meth_app_var($n__13, $m);
          // FALLTHROUGH
          case 18:
            $n__14 = $next(0);
            $e__3 = $next(0);
            $m__0 = $next(0);
            return $meth_app_env($n__14, $e__3, $m__0);
          // FALLTHROUGH
          case 19:
            $n__15 = $next(0);
            $m__1 = $next(0);
            return $meth_app_meth($n__15, $m__1);
          // FALLTHROUGH
          case 20:
            $m__2 = $next(0);
            $x__9 = $next(0);
            return $send_const($m__2, $x__9, $new_cache($table));
          // FALLTHROUGH
          case 21:
            $m__3 = $next(0);
            $n__16 = $next(0);
            return $send_var($m__3, $n__16, $new_cache($table));
          // FALLTHROUGH
          case 22:
            $m__4 = $next(0);
            $e__4 = $next(0);
            $n__17 = $next(0);
            return $send_env($m__4, $e__4, $n__17, $new_cache($table));
          // FALLTHROUGH
          default:
            $m__5 = $next(0);
            $n__18 = $next(0);
            return $send_meth($m__5, $n__18, $new_cache($table));
          }
      }
      return $clo;
    };
    $set_methods = (dynamic $table, dynamic $methods) ==> {
      $len = $methods->count() - 1;
      $i = Vector{0, 0};
      for (;;) {
        if ($i[1] < $len) {
          $h_ = $i[1];
          $label = $caml_check_bound($methods, $h_)[$h_ + 1];
          $clo = $method_impl($table, $i, $methods);
          $set_method($table, $label, $clo);
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
    };
    
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
  public static function dummy_table(): dynamic {
    return static::callRehackFunction(static::requireModule()[15], varray[]);
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
  public static function params(): dynamic {
    return static::callRehackFunction(static::requireModule()[29], varray[]);
  }
  public static function stats(dynamic $param): dynamic {
    return static::callRehackFunction(static::requireModule()[30], varray[$param]);
  }

}
/* Hashing disabled */
