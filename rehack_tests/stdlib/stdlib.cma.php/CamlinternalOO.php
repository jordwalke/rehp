<?hh
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * CamlinternalOO.php
 */

namespace Rehack;

final class CamlinternalOO {
  <<__Memoize>>
  public static function get() {
    $global_object = \Rehack\GlobalObject::get();
    $runtime = \Rehack\Runtime::get();
    /*
     * Soon, these will replace the `global_data->ModuleName`
     * pattern in the load() function.
     */
    $Array_ = Array_::get();
    $List_ = List_::get();
    $Map = Map::get();
    $Obj = Obj::get();
    $Sys = Sys::get();
    $Not_found = Not_found::get();
    $Assert_failure = Assert_failure::get();
    $Undefined_recursive_module = Undefined_recursive_module::get();
    CamlinternalOO::load($global_object);
    $memoized = $runtime->caml_get_global_data()->CamlinternalOO;
    return $memoized;
  }

  /**
   * Performs module load operation. May have side effects.
   */
  private static function load($joo_global_object) {
    

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
    $caml_wrap_exception = $runtime["caml_wrap_exception"];
    $is_int = $runtime["is_int"];
    $global_data = $runtime["caml_get_global_data"]();
    $cst = $string("");
    $Assert_failure = $global_data["Assert_failure"];
    $Sys = $global_data["Sys"];
    $Obj = $global_data["Obj"];
    $Undefined_recursive_module = $global_data["Undefined_recursive_module"];
    $Array = $global_data["Array_"];
    $List = $global_data["List_"];
    $Not_found = $global_data["Not_found"];
    $Map = $global_data["Map"];
    $g = Vector{0, $string("camlinternalOO.ml"), 438, 17};
    $f = Vector{0, $string("camlinternalOO.ml"), 420, 13};
    $e = Vector{0, $string("camlinternalOO.ml"), 417, 13};
    $d = Vector{0, $string("camlinternalOO.ml"), 414, 13};
    $c = Vector{0, $string("camlinternalOO.ml"), 411, 13};
    $b = Vector{0, $string("camlinternalOO.ml"), 408, 13};
    $a = Vector{0, $string("camlinternalOO.ml"), 281, 50};
    $copy = function(dynamic $o) use ($caml_set_oo_id) {
      $o__0 = $o->toVector();
      return $caml_set_oo_id($o__0);
    };
    $params = Vector{0, 1, 1, 1, 3, 16};
    $initial_object_size = 2;
    $dummy_item = 0;
    $public_method_label = function(dynamic $s) use ($runtime) {
      $accu = Vector{0, 0};
      $aC = (int) ($runtime["caml_ml_string_length"]($s) + -1);
      $aB = 0;
      if (! ($aC < 0)) {
        $i = $aB;
        for (;;) {
          $aD = $runtime["caml_string_get"]($s, $i);
          $accu[1] = (int) ((int) (223 * $accu[1]) + $aD);
          $aE = (int) ($i + 1);
          if ($aC !== $i) {$i = $aE;continue;}
          break;
        }
      }
      $accu[1] = $accu[1] & 2147483647;
      $tag = 1073741823 < $accu[1]
        ? (int) ($accu[1] . 2147483648)
        : ($accu[1]);
      return $tag;
    };
    $compare = function(dynamic $x, dynamic $y) use ($caml_string_compare) {
      return $caml_string_compare($x, $y);
    };
    $Vars = $call1($Map[1], Vector{0, $compare});
    $compare__0 = function(dynamic $x, dynamic $y) use ($caml_string_compare) {
      return $caml_string_compare($x, $y);
    };
    $Meths = $call1($Map[1], Vector{0, $compare__0});
    $compare__1 = function(dynamic $x, dynamic $y) use ($runtime) {
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
    $fit_size->contents = function(dynamic $n) use ($fit_size) {
      return 2 < $n
        ? (int) ($fit_size->contents((int) ((int) ($n + 1) / 2)) * 2)
        : ($n);
    };
    $new_table = function(dynamic $pub_labels) use ($Labs,$Meths,$Sys,$Vars,$caml_check_bound,$caml_make_vect,$dummy_met,$fit_size,$initial_object_size,$runtime,$table_count) {
      $table_count[1] += 1;
      $len = $pub_labels->count() - 1;
      $methods = $caml_make_vect((int) ((int) ($len * 2) + 2), $dummy_met);
      $caml_check_bound($methods, 0)[1] = $len;
      $au = $Sys[10];
      $av = (int)
      ((int) ($runtime["caml_mul"]($fit_size->contents($len), $au) / 8) + -1);
      $caml_check_bound($methods, 1)[2] = $av;
      $ax = (int) ($len + -1);
      $aw = 0;
      if (! ($ax < 0)) {
        $i = $aw;
        for (;;) {
          $az = (int) ((int) ($i * 2) + 3);
          $ay = $caml_check_bound($pub_labels, $i)[$i + 1];
          $caml_check_bound($methods, $az)[$az + 1] = $ay;
          $aA = (int) ($i + 1);
          if ($ax !== $i) {$i = $aA;continue;}
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
    $resize = function(dynamic $array, dynamic $new_size) use ($Array,$call5,$caml_make_vect,$dummy_met) {
      $old_size = $array[2]->count() - 1;
      $as = $old_size < $new_size ? 1 : (0);
      if ($as) {
        $new_buck = $caml_make_vect($new_size, $dummy_met);
        $call5($Array[10], $array[2], 0, $new_buck, 0, $old_size);
        $array[2] = $new_buck;
        $at = 0;
      }
      else {$at = $as;}
      return $at;
    };
    $put = function(dynamic $array, dynamic $label, dynamic $element) use ($caml_check_bound,$resize) {
      $resize($array, (int) ($label + 1));
      $caml_check_bound($array[2], $label)[$label + 1] = $element;
      return 0;
    };
    $method_count = Vector{0, 0};
    $inst_var_count = Vector{0, 0};
    $new_method = function(dynamic $table) use ($resize) {
      $index = $table[2]->count() - 1;
      $resize($table, (int) ($index + 1));
      return $index;
    };
    $get_method_label = function(dynamic $table, dynamic $name) use ($Labs,$Meths,$Not_found,$call2,$call3,$caml_wrap_exception,$new_method,$runtime) {
      try {$aq = $call2($Meths[27], $name, $table[3]);return $aq;}
      catch(\Throwable $ar) {
        $ar = $caml_wrap_exception($ar);
        if ($ar === $Not_found) {
          $label = $new_method($table);
          $table[3] = $call3($Meths[4], $name, $label, $table[3]);
          $table[4] = $call3($Labs[4], $label, 1, $table[4]);
          return $label;
        }
        throw $runtime["caml_wrap_thrown_exception_reraise"]($ar) as \Throwable;
      }
    };
    $get_method_labels = function(dynamic $table, dynamic $names) use ($Array,$call2,$get_method_label) {
      $ao = function(dynamic $ap) use ($get_method_label,$table) {
        return $get_method_label($table, $ap);
      };
      return $call2($Array[15], $ao, $names);
    };
    $set_method = function(dynamic $table, dynamic $label, dynamic $element) use ($Labs,$call2,$method_count,$put) {
      $method_count[1] += 1;
      if ($call2($Labs[27], $label, $table[4])) {return $put($table, $label, $element);}
      $table[6] = Vector{0, Vector{0, $label, $element}, $table[6]};
      return 0;
    };
    $get_method = function(dynamic $table, dynamic $label) use ($List,$Not_found,$call2,$caml_check_bound,$caml_wrap_exception,$runtime) {
      try {$am = $call2($List[38], $label, $table[6]);return $am;}
      catch(\Throwable $an) {
        $an = $caml_wrap_exception($an);
        if ($an === $Not_found) {
          return $caml_check_bound($table[2], $label)[$label + 1];
        }
        throw $runtime["caml_wrap_thrown_exception_reraise"]($an) as \Throwable;
      }
    };
    $to_list = function(dynamic $arr) use ($Array,$call1) {
      return $arr === 0 ? 0 : ($call1($Array[11], $arr));
    };
    $narrow = function
    (dynamic $table, dynamic $vars, dynamic $virt_meths, dynamic $concr_meths) use ($Labs,$List,$Meths,$Not_found,$Vars,$call2,$call3,$caml_wrap_exception,$get_method_label,$runtime,$to_list) {
      $vars__0 = $to_list($vars);
      $virt_meths__0 = $to_list($virt_meths);
      $concr_meths__0 = $to_list($concr_meths);
      $V = function(dynamic $al) use ($get_method_label,$table) {
        return $get_method_label($table, $al);
      };
      $virt_meth_labs = $call2($List[17], $V, $virt_meths__0);
      $W = function(dynamic $ak) use ($get_method_label,$table) {
        return $get_method_label($table, $ak);
      };
      $concr_meth_labs = $call2($List[17], $W, $concr_meths__0);
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
      $X = $Vars[1];
      $Y = $table[7];
      $Z = function(dynamic $lab, dynamic $info, dynamic $tvars) use ($List,$Vars,$call2,$call3,$vars__0) {
        return $call2($List[31], $lab, $vars__0)
          ? $call3($Vars[4], $lab, $info, $tvars)
          : ($tvars);
      };
      $table[7] = $call3($Vars[13], $Z, $Y, $X);
      $by_name = Vector{0, $Meths[1]};
      $by_label = Vector{0, $Labs[1]};
      $aa = function(dynamic $met, dynamic $label) use ($Labs,$Meths,$Not_found,$by_label,$by_name,$call2,$call3,$caml_wrap_exception,$runtime,$table) {
        $by_name[1] = $call3($Meths[4], $met, $label, $by_name[1]);
        $af = $by_label[1];
        try {$ai = $call2($Labs[27], $label, $table[4]);$ah = $ai;}
        catch(\Throwable $aj) {
          $aj = $caml_wrap_exception($aj);
          if ($aj !== $Not_found) {
            throw $runtime["caml_wrap_thrown_exception_reraise"]($aj) as \Throwable;
          }
          $ag = 1;
          $ah = $ag;
        }
        $by_label[1] = $call3($Labs[4], $label, $ah, $af);
        return 0;
      };
      $call3($List[22], $aa, $concr_meths__0, $concr_meth_labs);
      $ab = function(dynamic $met, dynamic $label) use ($Labs,$Meths,$by_label,$by_name,$call3) {
        $by_name[1] = $call3($Meths[4], $met, $label, $by_name[1]);
        $by_label[1] = $call3($Labs[4], $label, 0, $by_label[1]);
        return 0;
      };
      $call3($List[22], $ab, $virt_meths__0, $virt_meth_labs);
      $table[3] = $by_name[1];
      $table[4] = $by_label[1];
      $ac = 0;
      $ad = $table[6];
      $ae = function(dynamic $met, dynamic $hm) use ($List,$call2,$virt_meth_labs) {
        $lab = $met[1];
        return $call2($List[31], $lab, $virt_meth_labs)
          ? $hm
          : (Vector{0, $met, $hm});
      };
      $table[6] = $call3($List[21], $ae, $ad, $ac);
      return 0;
    };
    $widen = function(dynamic $table) use ($List,$Vars,$call1,$call2,$call3) {
      $match = $call1($List[5], $table[5]);
      $vars = $match[6];
      $virt_meths = $match[5];
      $saved_vars = $match[4];
      $saved_hidden_meths = $match[3];
      $by_label = $match[2];
      $by_name = $match[1];
      $table[5] = $call1($List[6], $table[5]);
      $R = function(dynamic $s, dynamic $v) use ($Vars,$call2,$call3,$table) {
        $U = $call2($Vars[27], $v, $table[7]);
        return $call3($Vars[4], $v, $U, $s);
      };
      $table[7] = $call3($List[20], $R, $saved_vars, $vars);
      $table[3] = $by_name;
      $table[4] = $by_label;
      $S = $table[6];
      $T = function(dynamic $met, dynamic $hm) use ($List,$call2,$virt_meths) {
        $lab = $met[1];
        return $call2($List[31], $lab, $virt_meths)
          ? $hm
          : (Vector{0, $met, $hm});
      };
      $table[6] = $call3($List[21], $T, $S, $saved_hidden_meths);
      return 0;
    };
    $new_slot = function(dynamic $table) {
      $index = $table[1];
      $table[1] = (int) ($index + 1);
      return $index;
    };
    $new_variable = function(dynamic $table, dynamic $name) use ($Not_found,$Vars,$call2,$call3,$caml_wrap_exception,$cst,$new_slot,$runtime) {
      try {$P = $call2($Vars[27], $name, $table[7]);return $P;}
      catch(\Throwable $Q) {
        $Q = $caml_wrap_exception($Q);
        if ($Q === $Not_found) {
          $index = $new_slot($table);
          if ($runtime["caml_string_notequal"]($name, $cst)) {
            $table[7] = $call3($Vars[4], $name, $index, $table[7]);
          }
          return $index;
        }
        throw $runtime["caml_wrap_thrown_exception_reraise"]($Q) as \Throwable;
      }
    };
    $to_array = function(dynamic $arr) use ($runtime) {
      return $runtime["caml_equal"]($arr, 0) ? Vector{0} : ($arr);
    };
    $new_methods_variables = function
    (dynamic $table, dynamic $meths, dynamic $vals) use ($caml_check_bound,$caml_make_vect,$get_method_label,$new_variable,$to_array) {
      $meths__0 = $to_array($meths);
      $nmeths = $meths__0->count() - 1;
      $nvals = $vals->count() - 1;
      $res = $caml_make_vect((int) ($nmeths + $nvals), 0);
      $H = (int) ($nmeths + -1);
      $G = 0;
      if (! ($H < 0)) {
        $i__0 = $G;
        for (;;) {
          $N = $get_method_label(
            $table,
            $caml_check_bound($meths__0, $i__0)[$i__0 + 1]
          );
          $caml_check_bound($res, $i__0)[$i__0 + 1] = $N;
          $O = (int) ($i__0 + 1);
          if ($H !== $i__0) {$i__0 = $O;continue;}
          break;
        }
      }
      $J = (int) ($nvals + -1);
      $I = 0;
      if (! ($J < 0)) {
        $i = $I;
        for (;;) {
          $L = (int) ($i + $nmeths);
          $K = $new_variable($table, $caml_check_bound($vals, $i)[$i + 1]);
          $caml_check_bound($res, $L)[$L + 1] = $K;
          $M = (int) ($i + 1);
          if ($J !== $i) {$i = $M;continue;}
          break;
        }
      }
      return $res;
    };
    $get_variable = function(dynamic $table, dynamic $name) use ($Assert_failure,$Not_found,$Vars,$a,$call2,$caml_wrap_exception,$runtime) {
      try {$E = $call2($Vars[27], $name, $table[7]);return $E;}
      catch(\Throwable $F) {
        $F = $caml_wrap_exception($F);
        if ($F === $Not_found) {
          throw $runtime["caml_wrap_thrown_exception"](Vector{0, $Assert_failure, $a}) as \Throwable;
        }
        throw $runtime["caml_wrap_thrown_exception_reraise"]($F) as \Throwable;
      }
    };
    $get_variables = function(dynamic $table, dynamic $names) use ($Array,$call2,$get_variable) {
      $C = function(dynamic $D) use ($get_variable,$table) {
        return $get_variable($table, $D);
      };
      return $call2($Array[15], $C, $names);
    };
    $add_initializer = function(dynamic $table, dynamic $f) {
      $table[8] = Vector{0, $f, $table[8]};
      return 0;
    };
    $create_table = function(dynamic $public_methods) use ($Array,$Labs,$Meths,$call2,$call3,$new_table,$public_method_label) {
      if ($public_methods === 0) {return $new_table(Vector{0});}
      $tags = $call2($Array[15], $public_method_label, $public_methods);
      $table = $new_table($tags);
      $B = function(dynamic $i, dynamic $met) use ($Labs,$Meths,$call3,$table) {
        $lab = (int) ((int) ($i * 2) + 2);
        $table[3] = $call3($Meths[4], $met, $lab, $table[3]);
        $table[4] = $call3($Labs[4], $lab, 1, $table[4]);
        return 0;
      };
      $call2($Array[14], $B, $public_methods);
      return $table;
    };
    $init_class = function(dynamic $table) use ($List,$Sys,$call1,$caml_check_bound,$caml_div,$inst_var_count,$resize) {
      $inst_var_count[1] =
        (int)
        ((int) ($inst_var_count[1] + $table[1]) + -1);
      $table[8] = $call1($List[9], $table[8]);
      $A = $Sys[10];
      return $resize(
        $table,
        (int)
        (3 + $caml_div((int) ($caml_check_bound($table[2], 1)[2] * 16), $A))
      );
    };
    $inherits = function
    (dynamic $cla, dynamic $vals, dynamic $virt_meths, dynamic $concr_meths, dynamic $param, dynamic $top) use ($Array,$call1,$call2,$get_method,$get_method_label,$get_variable,$narrow,$to_array,$widen) {
      $env = $param[4];
      $super__0 = $param[2];
      $narrow($cla, $vals, $virt_meths, $concr_meths);
      $init = $top ? $call2($super__0, $cla, $env) : ($call1($super__0, $cla));
      $widen($cla);
      $s = 0;
      $t = $to_array($concr_meths);
      $u = function(dynamic $nm) use ($cla,$get_method,$get_method_label) {
        return $get_method($cla, $get_method_label($cla, $nm));
      };
      $v = Vector{0, $call2($Array[15], $u, $t), $s};
      $w = $to_array($vals);
      $x = function(dynamic $z) use ($cla,$get_variable) {
        return $get_variable($cla, $z);
      };
      $y = Vector{
        0,
        Vector{0, $init},
        Vector{0, $call2($Array[15], $x, $w), $v}
      };
      return $call1($Array[6], $y);
    };
    $make_class = function(dynamic $pub_meths, dynamic $class_init) use ($call1,$create_table,$init_class) {
      $table = $create_table($pub_meths);
      $env_init = $call1($class_init, $table);
      $init_class($table);
      return Vector{0, $call1($env_init, 0), $class_init, $env_init, 0};
    };
    $make_class_store = function
    (dynamic $pub_meths, dynamic $class_init, dynamic $init_table) use ($call1,$create_table,$init_class) {
      $table = $create_table($pub_meths);
      $env_init = $call1($class_init, $table);
      $init_class($table);
      $init_table[2] = $class_init;
      $init_table[1] = $env_init;
      return 0;
    };
    $dummy_class = function(dynamic $loc) use ($Undefined_recursive_module,$runtime) {
      $undef = function(dynamic $param) use ($Undefined_recursive_module,$loc,$runtime) {
        throw $runtime["caml_wrap_thrown_exception"](
                Vector{0, $Undefined_recursive_module, $loc}
              ) as \Throwable;
      };
      return Vector{0, $undef, $undef, $undef, 0};
    };
    $create_object = function(dynamic $table) use ($Obj,$caml_obj_block,$caml_set_oo_id) {
      $obj = $caml_obj_block($Obj[8], $table[1]);
      $obj[1] = $table[2];
      return $caml_set_oo_id($obj);
    };
    $create_object_opt = function(dynamic $obj_0, dynamic $table) use ($Obj,$caml_obj_block,$caml_set_oo_id) {
      if ($obj_0) {return $obj_0;}
      $obj = $caml_obj_block($Obj[8], $table[1]);
      $obj[1] = $table[2];
      return $caml_set_oo_id($obj);
    };
    $iter_f = function(dynamic $obj, dynamic $param) use ($call1) {
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
    $run_initializers = function(dynamic $obj, dynamic $table) use ($iter_f) {
      $inits = $table[8];
      $r = 0 !== $inits ? 1 : (0);
      return $r ? $iter_f($obj, $inits) : ($r);
    };
    $run_initializers_opt = function
    (dynamic $obj_0, dynamic $obj, dynamic $table) use ($iter_f) {
      if ($obj_0) {return $obj;}
      $inits = $table[8];
      if (0 !== $inits) {$iter_f($obj, $inits);}
      return $obj;
    };
    $create_object_and_run_initializers = function
    (dynamic $obj_0, dynamic $table) use ($create_object,$run_initializers) {
      if ($obj_0) {return $obj_0;}
      $obj = $create_object($table);
      $run_initializers($obj, $table);
      return $obj;
    };
    $set_data = function(dynamic $tables, dynamic $v) use ($Assert_failure,$b,$runtime) {
      if ($tables) {$tables[2] = $v;return 0;}
      throw $runtime["caml_wrap_thrown_exception"](Vector{0, $Assert_failure, $b}) as \Throwable;
    };
    $set_next = function(dynamic $tables, dynamic $v) use ($Assert_failure,$c,$runtime) {
      if ($tables) {$tables[3] = $v;return 0;}
      throw $runtime["caml_wrap_thrown_exception"](Vector{0, $Assert_failure, $c}) as \Throwable;
    };
    $get_key = function(dynamic $param) use ($Assert_failure,$d,$runtime) {
      if ($param) {return $param[1];}
      throw $runtime["caml_wrap_thrown_exception"](Vector{0, $Assert_failure, $d}) as \Throwable;
    };
    $get_data = function(dynamic $param) use ($Assert_failure,$e,$runtime) {
      if ($param) {return $param[2];}
      throw $runtime["caml_wrap_thrown_exception"](Vector{0, $Assert_failure, $e}) as \Throwable;
    };
    $get_next = function(dynamic $param) use ($Assert_failure,$f,$runtime) {
      if ($param) {return $param[3];}
      throw $runtime["caml_wrap_thrown_exception"](Vector{0, $Assert_failure, $f}) as \Throwable;
    };
    $build_path = function(dynamic $n, dynamic $keys, dynamic $tables) use ($caml_check_bound,$set_data) {
      $res = Vector{0, 0, 0, 0};
      $r = Vector{0, $res};
      $o = 0;
      if (! ($n < 0)) {
        $i = $o;
        for (;;) {
          $p = $r[1];
          $r[1] = Vector{0, $caml_check_bound($keys, $i)[$i + 1], $p, 0};
          $q = (int) ($i + 1);
          if ($n !== $i) {$i = $q;continue;}
          break;
        }
      }
      $set_data($tables, $r[1]);
      return $res;
    };
    $lookup_keys->contents = function
    (dynamic $i, dynamic $keys, dynamic $tables) use ($Assert_failure,$build_path,$caml_check_bound,$g,$get_data,$get_key,$get_next,$lookup_keys,$runtime,$set_next) {
      if (0 <= $i) {
        $key = $caml_check_bound($keys, $i)[$i + 1];
        $lookup_key = function(dynamic $tables) use ($Assert_failure,$build_path,$g,$get_data,$get_key,$get_next,$i,$key,$keys,$lookup_keys,$runtime,$set_next) {
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
              throw $runtime["caml_wrap_thrown_exception"](Vector{0, $Assert_failure, $g}) as \Throwable;
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
    $lookup_tables = function(dynamic $root, dynamic $keys) use ($build_path,$get_data,$lookup_keys) {
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
    $get_const = function(dynamic $x) {
      return function(dynamic $obj) use ($x) {return $x;};
    };
    $get_var = function(dynamic $n) {
      return function(dynamic $obj) use ($n) {return $obj[$n + 1];};
    };
    $get_env = function(dynamic $e, dynamic $n) {
      return function(dynamic $obj) use ($e,$n) {return $obj[$e + 1][$n + 1];};
    };
    $get_meth = function(dynamic $n) use ($call1) {
      return function(dynamic $obj) use ($call1,$n) {
        return $call1($obj[1][$n + 1], $obj);
      };
    };
    $set_var = function(dynamic $n) {
      return function(dynamic $obj, dynamic $x) use ($n) {
        $obj[$n + 1] = $x;
        return 0;
      };
    };
    $app_const = function(dynamic $f, dynamic $x) use ($call1) {
      return function(dynamic $obj) use ($call1,$f,$x) {
        return $call1($f, $x);
      };
    };
    $app_var = function(dynamic $f, dynamic $n) use ($call1) {
      return function(dynamic $obj) use ($call1,$f,$n) {
        return $call1($f, $obj[$n + 1]);
      };
    };
    $app_env = function(dynamic $f, dynamic $e, dynamic $n) use ($call1) {
      return function(dynamic $obj) use ($call1,$e,$f,$n) {
        return $call1($f, $obj[$e + 1][$n + 1]);
      };
    };
    $app_meth = function(dynamic $f, dynamic $n) use ($call1) {
      return function(dynamic $obj) use ($call1,$f,$n) {
        return $call1($f, $call1($obj[1][$n + 1], $obj));
      };
    };
    $app_const_const = function(dynamic $f, dynamic $x, dynamic $y) use ($call2) {
      return function(dynamic $obj) use ($call2,$f,$x,$y) {
        return $call2($f, $x, $y);
      };
    };
    $app_const_var = function(dynamic $f, dynamic $x, dynamic $n) use ($call2) {
      return function(dynamic $obj) use ($call2,$f,$n,$x) {
        return $call2($f, $x, $obj[$n + 1]);
      };
    };
    $app_const_meth = function(dynamic $f, dynamic $x, dynamic $n) use ($call1,$call2) {
      return function(dynamic $obj) use ($call1,$call2,$f,$n,$x) {
        return $call2($f, $x, $call1($obj[1][$n + 1], $obj));
      };
    };
    $app_var_const = function(dynamic $f, dynamic $n, dynamic $x) use ($call2) {
      return function(dynamic $obj) use ($call2,$f,$n,$x) {
        return $call2($f, $obj[$n + 1], $x);
      };
    };
    $app_meth_const = function(dynamic $f, dynamic $n, dynamic $x) use ($call1,$call2) {
      return function(dynamic $obj) use ($call1,$call2,$f,$n,$x) {
        return $call2($f, $call1($obj[1][$n + 1], $obj), $x);
      };
    };
    $app_const_env = function(dynamic $f, dynamic $x, dynamic $e, dynamic $n) use ($call2) {
      return function(dynamic $obj) use ($call2,$e,$f,$n,$x) {
        return $call2($f, $x, $obj[$e + 1][$n + 1]);
      };
    };
    $app_env_const = function(dynamic $f, dynamic $e, dynamic $n, dynamic $x) use ($call2) {
      return function(dynamic $obj) use ($call2,$e,$f,$n,$x) {
        return $call2($f, $obj[$e + 1][$n + 1], $x);
      };
    };
    $meth_app_const = function(dynamic $n, dynamic $x) use ($call2) {
      return function(dynamic $obj) use ($call2,$n,$x) {
        return $call2($obj[1][$n + 1], $obj, $x);
      };
    };
    $meth_app_var = function(dynamic $n, dynamic $m) use ($call2) {
      return function(dynamic $obj) use ($call2,$m,$n) {
        return $call2($obj[1][$n + 1], $obj, $obj[$m + 1]);
      };
    };
    $meth_app_env = function(dynamic $n, dynamic $e, dynamic $m) use ($call2) {
      return function(dynamic $obj) use ($call2,$e,$m,$n) {
        return $call2($obj[1][$n + 1], $obj, $obj[$e + 1][$m + 1]);
      };
    };
    $meth_app_meth = function(dynamic $n, dynamic $m) use ($call1,$call2) {
      return function(dynamic $obj) use ($call1,$call2,$m) {
        $n = $call1($obj[1][$m + 1], $obj);
        return $call2($obj[1][$n + 1], $obj, $n);
      };
    };
    $send_const = function(dynamic $m, dynamic $x, dynamic $c) use ($call1,$caml_get_public_method) {
      return function(dynamic $obj) use ($call1,$caml_get_public_method,$m,$x) {
        return $call1($caml_get_public_method($x, $m, 0), $x);
      };
    };
    $send_var = function(dynamic $m, dynamic $n, dynamic $c) use ($call1,$caml_get_public_method) {
      return function(dynamic $obj) use ($call1,$caml_get_public_method,$n) {
        $m = $obj[$n + 1];
        return $call1($caml_get_public_method($m, $m, 0), $m);
      };
    };
    $send_env = function(dynamic $m, dynamic $e, dynamic $n, dynamic $c) use ($call1,$caml_get_public_method) {
      return function(dynamic $obj) use ($call1,$caml_get_public_method,$e,$m,$n) {
        $l = $obj[$e + 1][$n + 1];
        return $call1($caml_get_public_method($l, $m, 0), $l);
      };
    };
    $send_meth = function(dynamic $m, dynamic $n, dynamic $c) use ($call1,$caml_get_public_method) {
      return function(dynamic $obj) use ($call1,$caml_get_public_method,$m,$n) {
        $k = $call1($obj[1][$n + 1], $obj);
        return $call1($caml_get_public_method($k, $m, 0), $k);
      };
    };
    $new_cache = function(dynamic $table) use ($Sys,$caml_check_bound,$caml_div,$new_method) {
      $n = $new_method($table);
      if (0 === (int) ($n % 2)) {$switch__0 = 0;}
      else {
        $j = $Sys[10];
        if (
          (int)
          (2 + $caml_div((int) ($caml_check_bound($table[2], 1)[2] * 16), $j)) < $n
        ) {$switch__0 = 0;}
        else {$n__0 = $new_method($table);$switch__0 = 1;}
      }
      if (! $switch__0) {$n__0 = $n;}
      $caml_check_bound($table[2], $n__0)[$n__0 + 1] = 0;
      return $n__0;
    };
    $method_impl = function(dynamic $table, dynamic $i, dynamic $arr) use ($app_const,$app_const_const,$app_const_env,$app_const_meth,$app_const_var,$app_env,$app_env_const,$app_meth,$app_meth_const,$app_var,$app_var_const,$caml_check_bound,$get_const,$get_env,$get_meth,$get_var,$is_int,$meth_app_const,$meth_app_env,$meth_app_meth,$meth_app_var,$new_cache,$send_const,$send_env,$send_meth,$send_var,$set_var) {
      $next = function(dynamic $param) use ($arr,$caml_check_bound,$i) {
        $i[1] += 1;
        $i->contents = $i[1];
        return $caml_check_bound($arr, $i)[$i + 1];
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
    $set_methods = function(dynamic $table, dynamic $methods) use ($caml_check_bound,$method_impl,$set_method) {
      $len = $methods->count() - 1;
      $i = Vector{0, 0};
      for (;;) {
        if ($i[1] < $len) {
          $h = $i[1];
          $label = $caml_check_bound($methods, $h)[$h + 1];
          $clo = $method_impl($table, $i, $methods);
          $set_method($table, $label, $clo);
          $i[1] += 1;
          continue;
        }
        return 0;
      }
    };
    $stats = function(dynamic $param) use ($inst_var_count,$method_count,$table_count) {
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
    
    $runtime["caml_register_global"](18, $CamlinternalOO, "CamlinternalOO");

  }
}

/*____hashes compiler:hashing-disabled inputs:hashing-disabled bytecode:hashing-disabled*/
