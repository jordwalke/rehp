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
    $is_int = $runtime["is_int"];
    $caml_arity_test = $runtime["caml_arity_test"];
    $caml_check_bound = $runtime["caml_check_bound"];
    $caml_div = $runtime["caml_div"];
    $caml_get_public_method = $runtime["caml_get_public_method"];
    $caml_make_vect = $runtime["caml_make_vect"];
    $caml_new_string = $runtime["caml_new_string"];
    $caml_obj_block = $runtime["caml_obj_block"];
    $caml_set_oo_id = $runtime["caml_set_oo_id"];
    $caml_string_compare = $runtime["caml_string_compare"];
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
    $caml_call5 = function($f, $a0, $a1, $a2, $a3, $a4) use ($caml_arity_test,$runtime) {
      return $caml_arity_test($f) == 5
        ? $f($a0, $a1, $a2, $a3, $a4)
        : ($runtime["caml_call_gen"]($f, varray[$a0,$a1,$a2,$a3,$a4]));
    };
    $global_data = $runtime["caml_get_global_data"]();
    $cst = $caml_new_string("");
    $Assert_failure = $global_data["Assert_failure"];
    $Sys = $global_data["Sys"];
    $Obj = $global_data["Obj"];
    $Undefined_recursive_module = $global_data["Undefined_recursive_module"];
    $Array = $global_data["Array_"];
    $List = $global_data["List_"];
    $Not_found = $global_data["Not_found"];
    $Map = $global_data["Map"];
    $yl = Vector{0, $caml_new_string("camlinternalOO.ml"), 438, 17};
    $yk = Vector{0, $caml_new_string("camlinternalOO.ml"), 420, 13};
    $yj = Vector{0, $caml_new_string("camlinternalOO.ml"), 417, 13};
    $yi = Vector{0, $caml_new_string("camlinternalOO.ml"), 414, 13};
    $yh = Vector{0, $caml_new_string("camlinternalOO.ml"), 411, 13};
    $yg = Vector{0, $caml_new_string("camlinternalOO.ml"), 408, 13};
    $yf = Vector{0, $caml_new_string("camlinternalOO.ml"), 281, 50};
    $copy = function($o) use ($caml_set_oo_id) {
      $o__0 = $o->toVector();
      return $caml_set_oo_id($o__0);
    };
    $params = Vector{0, 1, 1, 1, 3, 16};
    $initial_object_size = 2;
    $dummy_item = 0;
    $public_method_label = function($s) use ($runtime) {
      $accu = Vector{0, 0};
      $zw = $runtime["caml_ml_string_length"]($s) + -1 | 0;
      $zv = 0;
      if (! ($zw < 0)) {
        $i = $zv;
        for (;;) {
          $zx = $runtime["caml_string_get"]($s, $i);
          $accu[1] = (223 * $accu[1] | 0) + $zx | 0;
          $zy = $i + 1 | 0;
          if ($zw !== $i) {$i = $zy;continue;}
          break;
        }
      }
      $accu[1] = $accu[1] & 2147483647;
      $tag = 1073741823 < $accu[1] ? $accu[1] . 2147483648 | 0 : ($accu[1]);
      return $tag;
    };
    $compare = function($x, $y) use ($caml_string_compare) {
      return $caml_string_compare($x, $y);
    };
    $Vars = $caml_call1($Map[1], Vector{0, $compare});
    $compare__0 = function($x, $y) use ($caml_string_compare) {
      return $caml_string_compare($x, $y);
    };
    $Meths = $caml_call1($Map[1], Vector{0, $compare__0});
    $compare__1 = function($x, $y) use ($runtime) {
      return $runtime["caml_int_compare"]($x, $y);
    };
    $Labs = $caml_call1($Map[1], Vector{0, $compare__1});
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
    $_ = $fit_size->contents =
      function($n) use ($fit_size) {
        return 2 < $n
          ? $fit_size->contents(($n + 1 | 0) / 2 | 0) * 2 | 0
          : ($n);
      };
    $new_table = function($pub_labels) use ($Labs,$Meths,$Sys,$Vars,$caml_check_bound,$caml_make_vect,$dummy_met,$fit_size,$initial_object_size,$runtime,$table_count) {
      $table_count[1] += 1;
      $len = $pub_labels->count() - 1;
      $methods = $caml_make_vect(($len * 2 | 0) + 2 | 0, $dummy_met);
      $caml_check_bound($methods, 0)[1] = $len;
      $zo = $Sys[10];
      $zp = ($runtime["caml_mul"]($fit_size->contents($len), $zo) / 8 | 0) + -1 |
        0;
      $caml_check_bound($methods, 1)[2] = $zp;
      $zr = $len + -1 | 0;
      $zq = 0;
      if (! ($zr < 0)) {
        $i = $zq;
        for (;;) {
          $zt = ($i * 2 | 0) + 3 | 0;
          $zs = $caml_check_bound($pub_labels, $i)[$i + 1];
          $caml_check_bound($methods, $zt)[$zt + 1] = $zs;
          $zu = $i + 1 | 0;
          if ($zr !== $i) {$i = $zu;continue;}
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
    $resize = function($array, $new_size) use ($Array,$caml_call5,$caml_make_vect,$dummy_met) {
      $old_size = $array[2]->count() - 1;
      $zm = $old_size < $new_size ? 1 : (0);
      if ($zm) {
        $new_buck = $caml_make_vect($new_size, $dummy_met);
        $caml_call5($Array[10], $array[2], 0, $new_buck, 0, $old_size);
        $array[2] = $new_buck;
        $zn = 0;
      }
      else {$zn = $zm;}
      return $zn;
    };
    $put = function($array, $label, $element) use ($caml_check_bound,$resize) {
      $resize($array, $label + 1 | 0);
      return $caml_check_bound($array[2], $label)[$label + 1] = $element;
    };
    $method_count = Vector{0, 0};
    $inst_var_count = Vector{0, 0};
    $new_method = function($table) use ($resize) {
      $index = $table[2]->count() - 1;
      $resize($table, $index + 1 | 0);
      return $index;
    };
    $get_method_label = function($table, $name) use ($Labs,$Meths,$Not_found,$caml_call2,$caml_call3,$caml_wrap_exception,$new_method,$runtime) {
      try {$zk = $caml_call2($Meths[27], $name, $table[3]);return $zk;}
      catch(\Throwable $zl) {
        $zl = $caml_wrap_exception($zl);
        if ($zl === $Not_found) {
          $label = $new_method($table);
          $table[3] = $caml_call3($Meths[4], $name, $label, $table[3]);
          $table[4] = $caml_call3($Labs[4], $label, 1, $table[4]);
          return $label;
        }
        throw $runtime["caml_wrap_thrown_exception_reraise"]($zl);
      }
    };
    $get_method_labels = function($table, $names) use ($Array,$caml_call2,$get_method_label) {
      $zi = function($zj) use ($get_method_label,$table) {
        return $get_method_label($table, $zj);
      };
      return $caml_call2($Array[15], $zi, $names);
    };
    $set_method = function($table, $label, $element) use ($Labs,$caml_call2,$method_count,$put) {
      $method_count[1] += 1;
      return $caml_call2($Labs[27], $label, $table[4])
        ? $put($table, $label, $element)
        : (($table[6] = Vector{0, Vector{0, $label, $element}, $table[6]}) || true
         ? 0
         : (0));
    };
    $get_method = function($table, $label) use ($List,$Not_found,$caml_call2,$caml_check_bound,$caml_wrap_exception,$runtime) {
      try {$zg = $caml_call2($List[38], $label, $table[6]);return $zg;}
      catch(\Throwable $zh) {
        $zh = $caml_wrap_exception($zh);
        if ($zh === $Not_found) {
          return $caml_check_bound($table[2], $label)[$label + 1];
        }
        throw $runtime["caml_wrap_thrown_exception_reraise"]($zh);
      }
    };
    $to_list = function($arr) use ($Array,$caml_call1) {
      return $arr === 0 ? 0 : ($caml_call1($Array[11], $arr));
    };
    $narrow = function($table, $vars, $virt_meths, $concr_meths) use ($Labs,$List,$Meths,$Not_found,$Vars,$caml_call2,$caml_call3,$caml_wrap_exception,$get_method_label,$runtime,$to_list) {
      $vars__0 = $to_list($vars);
      $virt_meths__0 = $to_list($virt_meths);
      $concr_meths__0 = $to_list($concr_meths);
      $y0 = function($zf) use ($get_method_label,$table) {
        return $get_method_label($table, $zf);
      };
      $virt_meth_labs = $caml_call2($List[17], $y0, $virt_meths__0);
      $y1 = function($ze) use ($get_method_label,$table) {
        return $get_method_label($table, $ze);
      };
      $concr_meth_labs = $caml_call2($List[17], $y1, $concr_meths__0);
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
      $y2 = $Vars[1];
      $y3 = $table[7];
      $y4 = function($lab, $info, $tvars) use ($List,$Vars,$caml_call2,$caml_call3,$vars__0) {
        return $caml_call2($List[31], $lab, $vars__0)
          ? $caml_call3($Vars[4], $lab, $info, $tvars)
          : ($tvars);
      };
      $table[7] = $caml_call3($Vars[13], $y4, $y3, $y2);
      $by_name = Vector{0, $Meths[1]};
      $by_label = Vector{0, $Labs[1]};
      $y5 = function($met, $label) use ($Labs,$Meths,$Not_found,$by_label,$by_name,$caml_call2,$caml_call3,$caml_wrap_exception,$runtime,$table) {
        $by_name[1] = $caml_call3($Meths[4], $met, $label, $by_name[1]);
        $y_ = $by_label[1];
        try {$zc = $caml_call2($Labs[27], $label, $table[4]);$zb = $zc;}
        catch(\Throwable $zd) {
          $zd = $caml_wrap_exception($zd);
          if ($zd !== $Not_found) {
            throw $runtime["caml_wrap_thrown_exception_reraise"]($zd);
          }
          $za = 1;
          $zb = $za;
        }
        $by_label[1] = $caml_call3($Labs[4], $label, $zb, $y_);
        return 0;
      };
      $caml_call3($List[22], $y5, $concr_meths__0, $concr_meth_labs);
      $y6 = function($met, $label) use ($Labs,$Meths,$by_label,$by_name,$caml_call3) {
        $by_name[1] = $caml_call3($Meths[4], $met, $label, $by_name[1]);
        $by_label[1] = $caml_call3($Labs[4], $label, 0, $by_label[1]);
        return 0;
      };
      $caml_call3($List[22], $y6, $virt_meths__0, $virt_meth_labs);
      $table[3] = $by_name[1];
      $table[4] = $by_label[1];
      $y7 = 0;
      $y8 = $table[6];
      $y9 = function($met, $hm) use ($List,$caml_call2,$virt_meth_labs) {
        $lab = $met[1];
        return $caml_call2($List[31], $lab, $virt_meth_labs)
          ? $hm
          : (Vector{0, $met, $hm});
      };
      $table[6] = $caml_call3($List[21], $y9, $y8, $y7);
      return 0;
    };
    $widen = function($table) use ($List,$Vars,$caml_call1,$caml_call2,$caml_call3) {
      $match = $caml_call1($List[5], $table[5]);
      $vars = $match[6];
      $virt_meths = $match[5];
      $saved_vars = $match[4];
      $saved_hidden_meths = $match[3];
      $by_label = $match[2];
      $by_name = $match[1];
      $table[5] = $caml_call1($List[6], $table[5]);
      $yW = function($s, $v) use ($Vars,$caml_call2,$caml_call3,$table) {
        $yZ = $caml_call2($Vars[27], $v, $table[7]);
        return $caml_call3($Vars[4], $v, $yZ, $s);
      };
      $table[7] = $caml_call3($List[20], $yW, $saved_vars, $vars);
      $table[3] = $by_name;
      $table[4] = $by_label;
      $yX = $table[6];
      $yY = function($met, $hm) use ($List,$caml_call2,$virt_meths) {
        $lab = $met[1];
        return $caml_call2($List[31], $lab, $virt_meths)
          ? $hm
          : (Vector{0, $met, $hm});
      };
      $table[6] = $caml_call3($List[21], $yY, $yX, $saved_hidden_meths);
      return 0;
    };
    $new_slot = function($table) {
      $index = $table[1];
      $table[1] = $index + 1 | 0;
      return $index;
    };
    $new_variable = function($table, $name) use ($Not_found,$Vars,$caml_call2,$caml_call3,$caml_wrap_exception,$cst,$new_slot,$runtime) {
      try {$yU = $caml_call2($Vars[27], $name, $table[7]);return $yU;}
      catch(\Throwable $yV) {
        $yV = $caml_wrap_exception($yV);
        if ($yV === $Not_found) {
          $index = $new_slot($table);
          if ($runtime["caml_string_notequal"]($name, $cst)) {
            $table[7] = $caml_call3($Vars[4], $name, $index, $table[7]);
          }
          return $index;
        }
        throw $runtime["caml_wrap_thrown_exception_reraise"]($yV);
      }
    };
    $to_array = function($arr) use ($runtime) {
      return $runtime["caml_equal"]($arr, 0) ? Vector{0} : ($arr);
    };
    $new_methods_variables = function($table, $meths, $vals) use ($caml_check_bound,$caml_make_vect,$get_method_label,$new_variable,$to_array) {
      $meths__0 = $to_array($meths);
      $nmeths = $meths__0->count() - 1;
      $nvals = $vals->count() - 1;
      $res = $caml_make_vect($nmeths + $nvals | 0, 0);
      $yM = $nmeths + -1 | 0;
      $yL = 0;
      if (! ($yM < 0)) {
        $i__0 = $yL;
        for (;;) {
          $yS = $get_method_label(
            $table,
            $caml_check_bound($meths__0, $i__0)[$i__0 + 1]
          );
          $caml_check_bound($res, $i__0)[$i__0 + 1] = $yS;
          $yT = $i__0 + 1 | 0;
          if ($yM !== $i__0) {$i__0 = $yT;continue;}
          break;
        }
      }
      $yO = $nvals + -1 | 0;
      $yN = 0;
      if (! ($yO < 0)) {
        $i = $yN;
        for (;;) {
          $yQ = $i + $nmeths | 0;
          $yP = $new_variable($table, $caml_check_bound($vals, $i)[$i + 1]);
          $caml_check_bound($res, $yQ)[$yQ + 1] = $yP;
          $yR = $i + 1 | 0;
          if ($yO !== $i) {$i = $yR;continue;}
          break;
        }
      }
      return $res;
    };
    $get_variable = function($table, $name) use ($Assert_failure,$Not_found,$Vars,$caml_call2,$caml_wrap_exception,$runtime,$yf) {
      try {$yJ = $caml_call2($Vars[27], $name, $table[7]);return $yJ;}
      catch(\Throwable $yK) {
        $yK = $caml_wrap_exception($yK);
        if ($yK === $Not_found) {
          throw $runtime["caml_wrap_thrown_exception"](Vector{0, $Assert_failure, $yf});
        }
        throw $runtime["caml_wrap_thrown_exception_reraise"]($yK);
      }
    };
    $get_variables = function($table, $names) use ($Array,$caml_call2,$get_variable) {
      $yH = function($yI) use ($get_variable,$table) {
        return $get_variable($table, $yI);
      };
      return $caml_call2($Array[15], $yH, $names);
    };
    $add_initializer = function($table, $f) {
      $table[8] = Vector{0, $f, $table[8]};
      return 0;
    };
    $create_table = function($public_methods) use ($Array,$Labs,$Meths,$caml_call2,$caml_call3,$new_table,$public_method_label) {
      if ($public_methods === 0) {return $new_table(Vector{0});}
      $tags = $caml_call2($Array[15], $public_method_label, $public_methods);
      $table = $new_table($tags);
      $yG = function($i, $met) use ($Labs,$Meths,$caml_call3,$table) {
        $lab = ($i * 2 | 0) + 2 | 0;
        $table[3] = $caml_call3($Meths[4], $met, $lab, $table[3]);
        $table[4] = $caml_call3($Labs[4], $lab, 1, $table[4]);
        return 0;
      };
      $caml_call2($Array[14], $yG, $public_methods);
      return $table;
    };
    $init_class = function($table) use ($List,$Sys,$caml_call1,$caml_check_bound,$caml_div,$inst_var_count,$resize) {
      $inst_var_count[1] = ($inst_var_count[1] + $table[1] | 0) + -1 | 0;
      $table[8] = $caml_call1($List[9], $table[8]);
      $yF = $Sys[10];
      return $resize(
        $table,
        3 + $caml_div($caml_check_bound($table[2], 1)[2] * 16 | 0, $yF) | 0
      );
    };
    $inherits = function($cla, $vals, $virt_meths, $concr_meths, $param, $top) use ($Array,$caml_call1,$caml_call2,$get_method,$get_method_label,$get_variable,$narrow,$to_array,$widen) {
      $env = $param[4];
      $super__0 = $param[2];
      $narrow($cla, $vals, $virt_meths, $concr_meths);
      $init = $top
        ? $caml_call2($super__0, $cla, $env)
        : ($caml_call1($super__0, $cla));
      $widen($cla);
      $yx = 0;
      $yy = $to_array($concr_meths);
      $yz = function($nm) use ($cla,$get_method,$get_method_label) {
        return $get_method($cla, $get_method_label($cla, $nm));
      };
      $yA = Vector{0, $caml_call2($Array[15], $yz, $yy), $yx};
      $yB = $to_array($vals);
      $yC = function($yE) use ($cla,$get_variable) {
        return $get_variable($cla, $yE);
      };
      $yD = Vector{
        0,
        Vector{0, $init},
        Vector{0, $caml_call2($Array[15], $yC, $yB), $yA}
      };
      return $caml_call1($Array[6], $yD);
    };
    $make_class = function($pub_meths, $class_init) use ($caml_call1,$create_table,$init_class) {
      $table = $create_table($pub_meths);
      $env_init = $caml_call1($class_init, $table);
      $init_class($table);
      return Vector{0, $caml_call1($env_init, 0), $class_init, $env_init, 0};
    };
    $make_class_store = function($pub_meths, $class_init, $init_table) use ($caml_call1,$create_table,$init_class) {
      $table = $create_table($pub_meths);
      $env_init = $caml_call1($class_init, $table);
      $init_class($table);
      $init_table[2] = $class_init;
      $init_table[1] = $env_init;
      return 0;
    };
    $dummy_class = function($loc) use ($Undefined_recursive_module,$runtime) {
      $undef = function($param) use ($Undefined_recursive_module,$loc,$runtime) {
        throw $runtime["caml_wrap_thrown_exception"](
                Vector{0, $Undefined_recursive_module, $loc}
              );
      };
      return Vector{0, $undef, $undef, $undef, 0};
    };
    $create_object = function($table) use ($Obj,$caml_obj_block,$caml_set_oo_id) {
      $obj = $caml_obj_block($Obj[8], $table[1]);
      $obj[1] = $table[2];
      return $caml_set_oo_id($obj);
    };
    $create_object_opt = function($obj_0, $table) use ($Obj,$caml_obj_block,$caml_set_oo_id) {
      if ($obj_0) {return $obj_0;}
      $obj = $caml_obj_block($Obj[8], $table[1]);
      $obj[1] = $table[2];
      return $caml_set_oo_id($obj);
    };
    $iter_f = function($obj, $param) use ($caml_call1) {
      $param__0 = $param;
      for (;;) {
        if ($param__0) {
          $param__1 = $param__0[2];
          $f = $param__0[1];
          $caml_call1($f, $obj);
          $param__0 = $param__1;
          continue;
        }
        return 0;
      }
    };
    $run_initializers = function($obj, $table) use ($iter_f) {
      $inits = $table[8];
      $yw = 0 !== $inits ? 1 : (0);
      return $yw ? $iter_f($obj, $inits) : ($yw);
    };
    $run_initializers_opt = function($obj_0, $obj, $table) use ($iter_f) {
      if ($obj_0) {return $obj;}
      $inits = $table[8];
      if (0 !== $inits) {$iter_f($obj, $inits);}
      return $obj;
    };
    $create_object_and_run_initializers = function($obj_0, $table) use ($create_object,$run_initializers) {
      if ($obj_0) {return $obj_0;}
      $obj = $create_object($table);
      $run_initializers($obj, $table);
      return $obj;
    };
    $set_data = function($tables, $v) use ($Assert_failure,$runtime,$yg) {
      if ($tables) {$tables[2] = $v;return 0;}
      throw $runtime["caml_wrap_thrown_exception"](Vector{0, $Assert_failure, $yg});
    };
    $set_next = function($tables, $v) use ($Assert_failure,$runtime,$yh) {
      if ($tables) {$tables[3] = $v;return 0;}
      throw $runtime["caml_wrap_thrown_exception"](Vector{0, $Assert_failure, $yh});
    };
    $get_key = function($param) use ($Assert_failure,$runtime,$yi) {
      if ($param) {return $param[1];}
      throw $runtime["caml_wrap_thrown_exception"](Vector{0, $Assert_failure, $yi});
    };
    $get_data = function($param) use ($Assert_failure,$runtime,$yj) {
      if ($param) {return $param[2];}
      throw $runtime["caml_wrap_thrown_exception"](Vector{0, $Assert_failure, $yj});
    };
    $get_next = function($param) use ($Assert_failure,$runtime,$yk) {
      if ($param) {return $param[3];}
      throw $runtime["caml_wrap_thrown_exception"](Vector{0, $Assert_failure, $yk});
    };
    $build_path = function($n, $keys, $tables) use ($caml_check_bound,$set_data) {
      $res = Vector{0, 0, 0, 0};
      $r = Vector{0, $res};
      $yt = 0;
      if (! ($n < 0)) {
        $i = $yt;
        for (;;) {
          $yu = $r[1];
          $r[1] = Vector{0, $caml_check_bound($keys, $i)[$i + 1], $yu, 0};
          $yv = $i + 1 | 0;
          if ($n !== $i) {$i = $yv;continue;}
          break;
        }
      }
      $set_data($tables, $r[1]);
      return $res;
    };
    $_ = $lookup_keys->contents =
      function($i, $keys, $tables) use ($Assert_failure,$build_path,$caml_check_bound,$get_data,$get_key,$get_next,$lookup_keys,$runtime,$set_next,$yl) {
        if (0 <= $i) {
          $key = $caml_check_bound($keys, $i)[$i + 1];
          $lookup_key = function($tables) use ($Assert_failure,$build_path,$get_data,$get_key,$get_next,$i,$key,$keys,$lookup_keys,$runtime,$set_next,$yl) {
            $tables__0 = $tables;
            for (;;) {
              if ($get_key($tables__0) === $key) {
                $tables_data = $get_data($tables__0);
                if ($tables_data) {
                  return $lookup_keys->contents(
                    $i + -1 |
                      0,
                    $keys,
                    $tables_data
                  );
                }
                throw $runtime["caml_wrap_thrown_exception"](Vector{0, $Assert_failure, $yl});
              }
              $next = $get_next($tables__0);
              if ($next) {$tables__0 = $next;continue;}
              $next__0 = Vector{0, $key, 0, 0};
              $set_next($tables__0, $next__0);
              return $build_path($i + -1 | 0, $keys, $next__0);
            }
          };
          return $lookup_key($tables);
        }
        return $tables;
      };
    $lookup_tables = function($root, $keys) use ($build_path,$get_data,$lookup_keys) {
      $root_data = $get_data($root);
      return $root_data
        ? $lookup_keys->contents(
         $keys->count() - 1 +
           -1 | 0,
         $keys,
         $root_data
       )
        : ($build_path($keys->count() - 1 + -1 | 0, $keys, $root));
    };
    $get_const = function($x) {return function($obj) use ($x) {return $x;};};
    $get_var = function($n) {
      return function($obj) use ($n) {return $obj[$n + 1];};
    };
    $get_env = function($e, $n) {
      return function($obj) use ($e,$n) {return $obj[$e + 1][$n + 1];};
    };
    $get_meth = function($n) use ($caml_call1) {
      return function($obj) use ($caml_call1,$n) {
        return $caml_call1($obj[1][$n + 1], $obj);
      };
    };
    $set_var = function($n) {
      return function($obj, $x) use ($n) {$obj[$n + 1] = $x;return 0;};
    };
    $app_const = function($f, $x) use ($caml_call1) {
      return function($obj) use ($caml_call1,$f,$x) {
        return $caml_call1($f, $x);
      };
    };
    $app_var = function($f, $n) use ($caml_call1) {
      return function($obj) use ($caml_call1,$f,$n) {
        return $caml_call1($f, $obj[$n + 1]);
      };
    };
    $app_env = function($f, $e, $n) use ($caml_call1) {
      return function($obj) use ($caml_call1,$e,$f,$n) {
        return $caml_call1($f, $obj[$e + 1][$n + 1]);
      };
    };
    $app_meth = function($f, $n) use ($caml_call1) {
      return function($obj) use ($caml_call1,$f,$n) {
        return $caml_call1($f, $caml_call1($obj[1][$n + 1], $obj));
      };
    };
    $app_const_const = function($f, $x, $y) use ($caml_call2) {
      return function($obj) use ($caml_call2,$f,$x,$y) {
        return $caml_call2($f, $x, $y);
      };
    };
    $app_const_var = function($f, $x, $n) use ($caml_call2) {
      return function($obj) use ($caml_call2,$f,$n,$x) {
        return $caml_call2($f, $x, $obj[$n + 1]);
      };
    };
    $app_const_meth = function($f, $x, $n) use ($caml_call1,$caml_call2) {
      return function($obj) use ($caml_call1,$caml_call2,$f,$n,$x) {
        return $caml_call2($f, $x, $caml_call1($obj[1][$n + 1], $obj));
      };
    };
    $app_var_const = function($f, $n, $x) use ($caml_call2) {
      return function($obj) use ($caml_call2,$f,$n,$x) {
        return $caml_call2($f, $obj[$n + 1], $x);
      };
    };
    $app_meth_const = function($f, $n, $x) use ($caml_call1,$caml_call2) {
      return function($obj) use ($caml_call1,$caml_call2,$f,$n,$x) {
        return $caml_call2($f, $caml_call1($obj[1][$n + 1], $obj), $x);
      };
    };
    $app_const_env = function($f, $x, $e, $n) use ($caml_call2) {
      return function($obj) use ($caml_call2,$e,$f,$n,$x) {
        return $caml_call2($f, $x, $obj[$e + 1][$n + 1]);
      };
    };
    $app_env_const = function($f, $e, $n, $x) use ($caml_call2) {
      return function($obj) use ($caml_call2,$e,$f,$n,$x) {
        return $caml_call2($f, $obj[$e + 1][$n + 1], $x);
      };
    };
    $meth_app_const = function($n, $x) use ($caml_call2) {
      return function($obj) use ($caml_call2,$n,$x) {
        return $caml_call2($obj[1][$n + 1], $obj, $x);
      };
    };
    $meth_app_var = function($n, $m) use ($caml_call2) {
      return function($obj) use ($caml_call2,$m,$n) {
        return $caml_call2($obj[1][$n + 1], $obj, $obj[$m + 1]);
      };
    };
    $meth_app_env = function($n, $e, $m) use ($caml_call2) {
      return function($obj) use ($caml_call2,$e,$m,$n) {
        return $caml_call2($obj[1][$n + 1], $obj, $obj[$e + 1][$m + 1]);
      };
    };
    $meth_app_meth = function($n, $m) use ($caml_call1,$caml_call2) {
      return function($obj) use ($caml_call1,$caml_call2,$m,$n) {
        $ys = $caml_call1($obj[1][$m + 1], $obj);
        return $caml_call2($obj[1][$n + 1], $obj, $ys);
      };
    };
    $send_const = function($m, $x, $c) use ($caml_call1,$caml_get_public_method) {
      return function($obj) use ($caml_call1,$caml_get_public_method,$m,$x) {
        return $caml_call1($caml_get_public_method($x, $m, 0), $x);
      };
    };
    $send_var = function($m, $n, $c) use ($caml_call1,$caml_get_public_method) {
      return function($obj) use ($caml_call1,$caml_get_public_method,$m,$n) {
        $yr = $obj[$n + 1];
        return $caml_call1($caml_get_public_method($yr, $m, 0), $yr);
      };
    };
    $send_env = function($m, $e, $n, $c) use ($caml_call1,$caml_get_public_method) {
      return function($obj) use ($caml_call1,$caml_get_public_method,$e,$m,$n) {
        $yq = $obj[$e + 1][$n + 1];
        return $caml_call1($caml_get_public_method($yq, $m, 0), $yq);
      };
    };
    $send_meth = function($m, $n, $c) use ($caml_call1,$caml_get_public_method) {
      return function($obj) use ($caml_call1,$caml_get_public_method,$m,$n) {
        $yp = $caml_call1($obj[1][$n + 1], $obj);
        return $caml_call1($caml_get_public_method($yp, $m, 0), $yp);
      };
    };
    $new_cache = function($table) use ($Sys,$caml_check_bound,$caml_div,$new_method) {
      $n = $new_method($table);
      if (0 === ($n % 2 | 0)) {$switch__0 = 0;}
      else {
        $yo = $Sys[10];
        if (
          (2 + $caml_div($caml_check_bound($table[2], 1)[2] * 16 | 0, $yo) | 0) <
            $n
        ) {$switch__0 = 0;}
        else {$n__0 = $new_method($table);$switch__0 = 1;}
      }
      if (! $switch__0) {$n__0 = $n;}
      $caml_check_bound($table[2], $n__0)[$n__0 + 1] = 0;
      return $n__0;
    };
    $method_impl = function($table, $i, $arr) use ($app_const,$app_const_const,$app_const_env,$app_const_meth,$app_const_var,$app_env,$app_env_const,$app_meth,$app_meth_const,$app_var,$app_var_const,$caml_check_bound,$get_const,$get_env,$get_meth,$get_var,$is_int,$meth_app_const,$meth_app_env,$meth_app_meth,$meth_app_var,$new_cache,$send_const,$send_env,$send_meth,$send_var,$set_var) {
      $next = function($param) use ($arr,$caml_check_bound,$i) {
        $i[1] += 1;
        $yn = $i[1];
        return $caml_check_bound($arr, $yn)[$yn + 1];
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
    $set_methods = function($table, $methods) use ($caml_check_bound,$method_impl,$set_method) {
      $len = $methods->count() - 1;
      $i = Vector{0, 0};
      for (;;) {
        if ($i[1] < $len) {
          $ym = $i[1];
          $label = $caml_check_bound($methods, $ym)[$ym + 1];
          $clo = $method_impl($table, $i, $methods);
          $set_method($table, $label, $clo);
          $i[1] += 1;
          continue;
        }
        return 0;
      }
    };
    $stats = function($param) use ($inst_var_count,$method_count,$table_count) {
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