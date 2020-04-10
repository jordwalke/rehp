<?hh

/**
 * Main executable compiled output. Runtime included in compilation output.
 */
namespace Rehack;

function main() {
  $joo_global_object = \Rehack\GlobalObject::get();

  $Object = $joo_global_object->Object;
  $Func = $joo_global_object->Func;
  $ObjectLiteral = $joo_global_object->ObjectLiteral;
  $ArrayLiteral = $joo_global_object->ArrayLiteral;
  $Array = $joo_global_object->Array;
  $RegExp = $joo_global_object->RegExp;
  $String = $joo_global_object->String;
  $Math = $joo_global_object->Math;
  $plus = $joo_global_object->plus;
  $eqEq = $joo_global_object->eqEq;
  $eqEqEq = $joo_global_object->eqEqEq;
  $typeof = $joo_global_object->typeof;
  $Date = $joo_global_object->Date;
  $Boolean = $joo_global_object->Boolean;
  $Number = $joo_global_object->Number;
  $unsigned_right_shift_32 = $joo_global_object->unsigned_right_shift_32;
  $left_shift_32 = $joo_global_object->left_shift_32;
  $right_shift_32 = $joo_global_object->right_shift_32;
  $max_int = $joo_global_object->max_int;
  $min_int = $joo_global_object->min_int;
  $NaN = $joo_global_object->NaN;
  $Infinity = $joo_global_object->Infinity;
  $require = $joo_global_object->require;
  $module = $joo_global_object->module;

  
  $append = new Ref();
  $at_ = new Ref();
  $c_ = new Ref();
  $extractList = new Ref();
  $flatten = new Ref();
  $indentForDepth = new Ref();
  $initSubtree = new Ref();
  $map = new Ref();
  $printInstanceCollection = new Ref();
  $reconcile = new Ref();
  $reconcileSubtree = new Ref();
  $runtime = (\Rehack\GlobalObject::get() as dynamic)->jsoo_runtime;
  
  $caml_blit_string = $runtime["caml_blit_string"];
  $caml_bytes_unsafe_get = $runtime["caml_bytes_unsafe_get"];
  $caml_bytes_unsafe_set = $runtime["caml_bytes_unsafe_set"];
  $call1 = $runtime["caml_call1"];
  $call2 = $runtime["caml_call2"];
  $call3 = $runtime["caml_call3"];
  $call4 = $runtime["caml_call4"];
  $caml_check_bound = $runtime["caml_check_bound"];
  $caml_create_bytes = $runtime["caml_create_bytes"];
  $caml_fresh_oo_id = $runtime["caml_fresh_oo_id"];
  $caml_ml_bytes_length = $runtime["caml_ml_bytes_length"];
  $caml_ml_open_descriptor_out = $runtime["caml_ml_open_descriptor_out"];
  $caml_ml_string_length = $runtime["caml_ml_string_length"];
  $string = $runtime["caml_new_string"];
  $caml_obj_tag = $runtime["caml_obj_tag"];
  $caml_register_global = $runtime["caml_register_global"];
  $caml_sys_time = $runtime["caml_sys_time"];
  $caml_update_dummy = $runtime["caml_update_dummy"];
  $caml_wrap_thrown_exception = $runtime["caml_wrap_thrown_exception"];
  $caml_wrap_thrown_exception_reraise = $runtime[
     "caml_wrap_thrown_exception_reraise"
   ];
  $is_int = $runtime["is_int"];
  $unsigned_right_shift_32 = $runtime["unsigned_right_shift_32"];
  $Out_of_memory = Vector{248, $string("Out_of_memory"), -1} as dynamic;
  $Sys_error = Vector{248, $string("Sys_error"), -2} as dynamic;
  $Failure = Vector{248, $string("Failure"), -3} as dynamic;
  $Invalid_argument = Vector{248, $string("Invalid_argument"), -4} as dynamic;
  $End_of_file = Vector{248, $string("End_of_file"), -5} as dynamic;
  $Division_by_zero = Vector{248, $string("Division_by_zero"), -6} as dynamic;
  $Not_found = Vector{248, $string("Not_found"), -7} as dynamic;
  $Match_failure = Vector{248, $string("Match_failure"), -8} as dynamic;
  $Stack_overflow = Vector{248, $string("Stack_overflow"), -9} as dynamic;
  $Sys_blocked_io = Vector{248, $string("Sys_blocked_io"), -10} as dynamic;
  $Assert_failure = Vector{248, $string("Assert_failure"), -11} as dynamic;
  $Undefined_recursive_module = Vector{
    248,
    $string("Undefined_recursive_module"),
    -12
  } as dynamic;
  
  $caml_register_global(
    11,
    $Undefined_recursive_module,
    "Undefined_recursive_module"
  );
  
  $caml_register_global(10, $Assert_failure, "Assert_failure");
  
  $caml_register_global(9, $Sys_blocked_io, "Sys_blocked_io");
  
  $caml_register_global(8, $Stack_overflow, "Stack_overflow");
  
  $caml_register_global(7, $Match_failure, "Match_failure");
  
  $caml_register_global(6, $Not_found, "Not_found");
  
  $caml_register_global(5, $Division_by_zero, "Division_by_zero");
  
  $caml_register_global(4, $End_of_file, "End_of_file");
  
  $caml_register_global(3, $Invalid_argument, "Invalid_argument");
  
  $caml_register_global(2, $Failure, "Failure");
  
  $caml_register_global(1, $Sys_error, "Sys_error");
  
  $caml_register_global(0, $Out_of_memory, "Out_of_memory");
  
  $b_ = $string("%.12g");
  $a_ = $string(".");
  $f_ = $string("String.contains_from / Bytes.contains_from");
  $e_ = $string("");
  $d_ = $string("String.concat");
  $g_ = $string("Random.int");
  $h_ = Vector{
    0,
    987910699,
    495797812,
    364182224,
    414272206,
    318284740,
    990407751,
    383018966,
    270373319,
    840823159,
    24560019,
    536292337,
    512266505,
    189156120,
    730249596,
    143776328,
    51606627,
    140166561,
    366354223,
    1003410265,
    700563762,
    981890670,
    913149062,
    526082594,
    1021425055,
    784300257,
    667753350,
    630144451,
    949649812,
    48546892,
    415514493,
    258888527,
    511570777,
    89983870,
    283659902,
    308386020,
    242688715,
    482270760,
    865188196,
    1027664170,
    207196989,
    193777847,
    619708188,
    671350186,
    149669678,
    257044018,
    87658204,
    558145612,
    183450813,
    28133145,
    901332182,
    710253903,
    510646120,
    652377910,
    409934019,
    801085050
  } as dynamic;
  $j_ = Vector{0, 0, 0} as dynamic;
  $l_ = $string("  ");
  $m_ = $string("");
  $n_ = $string("  ");
  $o_ = $string("    ");
  $p_ = $string("      ");
  $q_ = $string("        ");
  $r_ = $string("          ");
  $s_ = $string("            ");
  $t_ = $string("              ");
  $u_ = $string("                ");
  $ai_ = $string("\"");
  $aj_ = $string("\"");
  $af_ = $string("@max-depth");
  $ad_ = $string("@max-length");
  $ab_ = $string("~unknown");
  $Z_ = $string("~lazy");
  $X_ = Vector{0, $string("[|"), $string("|]")} as dynamic;
  $U_ = $string(")");
  $V_ = $string("closure(");
  $S_ = Vector{0, $string("{"), $string("}")} as dynamic;
  $J_ = $string(",\n");
  $D_ = $string("");
  $E_ = $string("]");
  $F_ = $string("\n");
  $G_ = $string(",\n");
  $H_ = $string("\n");
  $I_ = $string("[");
  $O_ = $string(", ");
  $K_ = $string("");
  $L_ = $string("]");
  $M_ = $string(", ");
  $N_ = $string("[");
  $z_ = $string(",\n");
  $v_ = $string("");
  $w_ = $string("\n");
  $x_ = $string(",\n");
  $y_ = $string("\n");
  $C_ = $string(", ");
  $A_ = $string("");
  $B_ = $string(", ");
  $k_ = Vector{0, 0, 0} as dynamic;
  $ao_ = $string("\n");
  $an_ = $string("\n");
  $am_ = $string("\n");
  $al_ = $string("\n");
  $ap_ = $string("Length changing sequences aren't supported yet.");
  $aq_ = $string("Empty list cannot be split at ");
  $ar_ = $string("");
  $as_ = $string("Impossible");
  $aJ_ = $string("");
  $au_ = $string(" ");
  $av_ = $string("IEmpty");
  $aw_ = $string(")");
  $ax_ = $string(" ");
  $ay_ = $string("IOne(");
  $az_ = $string(")");
  $aA_ = $string("\n");
  $aB_ = $string("\n");
  $aC_ = $string(",");
  $aD_ = $string("\n");
  $aE_ = $string("ITwo(");
  $aF_ = $string(")");
  $aG_ = $string(" ");
  $aH_ = $string(",");
  $aI_ = $string("IOrderedMap(");
  $aU_ = $string("");
  $aK_ = $string("}");
  $aL_ = $string("\n");
  $aM_ = $string(" ");
  $aN_ = $string("  subtree: ");
  $aO_ = $string(",\n");
  $aR_ = $string("\"");
  $aS_ = $string("\"");
  $aT_ = $string("-");
  $aP_ = $string("  state: ");
  $aQ_ = $string("{\n");
  $aW_ = $string("\n");
  $aX_ = $string("\n\n");
  $aY_ = $string("\n");
  $aZ_ = $string("<NotRendered>");
  $a0_ = $string("\n\n");
  $aV_ = $string("\n\n");
  $a1_ = $string("");
  $a3_ = $string("deafult");
  $a2_ = Vector{0, $string("buttonClass")} as dynamic;
  $a5_ = $string("deafult");
  $a4_ = Vector{0, $string("childContainer")} as dynamic;
  $a6_ = $string("size changed times:");
  $a7_ = Vector{0, $string("ButtonInContainerThatCountsSizeChanges")} as dynamic;
  $a9_ = $string("deafult");
  $a8_ = Vector{0, $string("divRenderedByInput")} as dynamic;
  $ba_ = $string("divClicked!");
  $a__ = $string("MyReducer:");
  $be_ = $string("AppInstance");
  $bb_ = Vector{0, $string("initialInputText")} as dynamic;
  $bd_ = $string("haha I am controlling your input");
  $bc_ = Vector{0, $string("divRenderedByAppContainsInput")} as dynamic;
  $bh_ = $string(")");
  $bi_ = $string("->animFiredWithDeepDivState(");
  $bj_ = $string("rafDeepDiv");
  $bk_ = Vector{0, $string("rafSecond")} as dynamic;
  $bl_ = Vector{0, $string("rafFirstDiv")} as dynamic;
  $bg_ = $string("initialAnimationFrameSetup");
  $bf_ = Vector{0, $string("TODO")} as dynamic;
  $bm_ = $string("default");
  $bn_ = $string("HELLO");
  $bq_ = Vector{0, $string("stateless")} as dynamic;
  $br_ = $string(
    "\n\n-------------------\nChild Container \n-------------------"
  );
  $bY_ = Vector{0, $string("stateless")} as dynamic;
  $b0_ = Vector{0, $string("Foo")} as dynamic;
  $bs_ = $string(
    "\n\n-------------------\nGets Derived State From Props\n-------------------"
  );
  $bu_ = Vector{0, $string("Foo")} as dynamic;
  $bv_ = $string("Init:");
  $bx_ = Vector{0, $string("Foo")} as dynamic;
  $by_ = $string("Update Without Changing Props:");
  $bA_ = Vector{0, $string("Foo")} as dynamic;
  $bB_ = $string("Update With Changing Props:");
  $bC_ = $string(
    "\n\n------------------------------\nApp With Controlled Input\n------------------------------"
  );
  $bE_ = $string("Init:");
  $bH_ = $string("Update:");
  $bI_ = $string(
    "\n\n------------------------------\nApp With Request Animation Frame \n----------------------"
  );
  $bJ_ = Vector{0, 2, 3} as dynamic;
  $bK_ = Vector{0, $string("")} as dynamic;
  $bL_ = $string("Init:");
  $bM_ = $string("Update After raf tick:");
  $bN_ = $string("Update After raf tick:");
  $bO_ = $string(
    "\n\n------------------------------\nApp With Polymoprhic State \n----------------------------"
  );
  $bQ_ = $string("zero");
  $bR_ = $string("hello");
  $bS_ = $string("Init:");
  $bU_ = $string("zero");
  $bW_ = $string("Another Type Init:");
  $bo_ = $string("Total ms (Title): %d ");
  $bp_ = $string("Second Part Of Tuple:");
  $invalid_arg = (dynamic $s) : dynamic ==> {
    throw $caml_wrap_thrown_exception(Vector{0, $Invalid_argument, $s}) as \Throwable;
  };
  
  $caml_fresh_oo_id(0);
  
  $symbol = (dynamic $s1, dynamic $s2) : dynamic ==> {
    $l1 = $caml_ml_string_length($s1);
    $l2 = $caml_ml_string_length($s2);
    $s = $caml_create_bytes((int) ($l1 + $l2));
    $caml_blit_string($s1, 0, $s, 0, $l1);
    $caml_blit_string($s2, 0, $s, $l1, $l2);
    return $s;
  };
  $string_of_int = (dynamic $n) : dynamic ==> {return $string("" . $n);};
  $valid_float_lexem = (dynamic $s) : dynamic ==> {
    $l = $caml_ml_string_length($s);
    $loop = (dynamic $i) : dynamic ==> {
      $i__0 = $i;
      for (;;) {
        if ($l <= $i__0) {return $symbol($s, $a_);}
        $match = $runtime["caml_string_get"]($s, $i__0);
        $switch__0 = 48 <= $match
          ? 58 <= $match ? 0 : (1)
          : (45 === $match ? 1 : (0));
        if ($switch__0) {
          $i__1 = (int) ($i__0 + 1) as dynamic;
          $i__0 = $i__1;
          continue;
        }
        return $s;
      }
    };
    return $loop(0);
  };
  $string_of_float = (dynamic $f) : dynamic ==> {
    return $valid_float_lexem($runtime["caml_format_float"]($b_, $f));
  };
  $append->contents = (dynamic $l1, dynamic $l2) : dynamic ==> {
    if ($l1) {
      $tl = $l1[2];
      $hd = $l1[1];
      return Vector{0, $hd, $append->contents($tl, $l2)};
    }
    return $l2;
  };
  
  $runtime["caml_ml_open_descriptor_in"](0);
  
  $stdout = $caml_ml_open_descriptor_out(1);
  
  $caml_ml_open_descriptor_out(2);
  
  $flush_all = (dynamic $param) : dynamic ==> {
    $iter = (dynamic $param) : dynamic ==> {
      $param__0 = $param;
      for (;;) {
        if ($param__0) {
          $l = $param__0[2];
          $a = $param__0[1];
          try {$runtime["caml_ml_flush"]($a);}
          catch(\Throwable $et_) {
            $et_ = $runtime["caml_wrap_exception"]($et_);
            if ($et_[1] !== $Sys_error) {
              throw $caml_wrap_thrown_exception_reraise($et_) as \Throwable;
            }
          }
          $param__0 = $l;
          continue;
        }
        return 0;
      }
    };
    return $iter($runtime["caml_ml_out_channels_list"](0));
  };
  $output_string = (dynamic $oc, dynamic $s) : dynamic ==> {
    return $runtime["caml_ml_output"]($oc, $s, 0, $caml_ml_string_length($s));
  };
  $print_string = (dynamic $s) : dynamic ==> {
    return $output_string($stdout, $s);
  };
  $do_at_exit = (dynamic $param) : dynamic ==> {return $flush_all(0);};
  $rev_append = (dynamic $l1, dynamic $l2) : dynamic ==> {
    $l1__0 = $l1;
    $l2__0 = $l2;
    for (;;) {
      if ($l1__0) {
        $l1__1 = $l1__0[2];
        $a = $l1__0[1];
        $l2__1 = Vector{0, $a, $l2__0} as dynamic;
        $l1__0 = $l1__1;
        $l2__0 = $l2__1;
        continue;
      }
      return $l2__0;
    }
  };
  $rev = (dynamic $l) : dynamic ==> {return $rev_append($l, 0);};
  $flatten->contents = (dynamic $param) : dynamic ==> {
    if ($param) {
      $r = $param[2];
      $l = $param[1];
      return $append->contents($l, $flatten->contents($r));
    }
    return 0;
  };
  $map->contents = (dynamic $f, dynamic $param) : dynamic ==> {
    if ($param) {
      $l = $param[2];
      $a = $param[1];
      $r = $call1($f, $a);
      return Vector{0, $r, $map->contents($f, $l)};
    }
    return 0;
  };
  $c_->contents = (dynamic $i, dynamic $f, dynamic $param) : dynamic ==> {
    if ($param) {
      $l = $param[2];
      $a = $param[1];
      $r = $call2($f, $i, $a);
      return Vector{0, $r, $c_->contents((int) ($i + 1), $f, $l)};
    }
    return 0;
  };
  $mapi = (dynamic $f, dynamic $l) : dynamic ==> {
    return $c_->contents(0, $f, $l);
  };
  $iter = (dynamic $f, dynamic $param) : dynamic ==> {
    $param__0 = $param;
    for (;;) {
      if ($param__0) {
        $param__1 = $param__0[2];
        $a = $param__0[1];
        $call1($f, $a);
        $param__0 = $param__1;
        continue;
      }
      return 0;
    }
  };
  $fold_left = (dynamic $f, dynamic $accu, dynamic $l) : dynamic ==> {
    $accu__0 = $accu;
    $l__0 = $l;
    for (;;) {
      if ($l__0) {
        $l__1 = $l__0[2];
        $a = $l__0[1];
        $accu__1 = $call2($f, $accu__0, $a);
        $accu__0 = $accu__1;
        $l__0 = $l__1;
        continue;
      }
      return $accu__0;
    }
  };
  $copy = (dynamic $s) : dynamic ==> {
    $len = $caml_ml_bytes_length($s);
    $r = $caml_create_bytes($len);
    $runtime["caml_blit_bytes"]($s, 0, $r, 0, $len);
    return $r;
  };
  $escaped = (dynamic $s) : dynamic ==> {
    $n = Vector{0, 0} as dynamic;
    $em_ = (int) ($caml_ml_bytes_length($s) + -1) as dynamic;
    $el_ = 0 as dynamic;
    if (! ($em_ < 0)) {
      $i__0 = $el_;
      for (;;) {
        $match = $caml_bytes_unsafe_get($s, $i__0);
        if (32 <= $match) {
          $eq_ = (int) ($match + -34) as dynamic;
          if (58 < $unsigned_right_shift_32($eq_, 0)) {
            if (93 <= $eq_) {
              $switch__0 = 0 as dynamic;
              $switch__1 = 0 as dynamic;
            }
            else {$switch__1 = 1 as dynamic;}
          }
          else {
            if (56 < $unsigned_right_shift_32((int) ($eq_ + -1), 0)) {$switch__0 = 1 as dynamic;$switch__1 = 0 as dynamic;}
            else {$switch__1 = 1 as dynamic;}
          }
          if ($switch__1) {$er_ = 1 as dynamic;$switch__0 = 2 as dynamic;}
        }
        else {
          $switch__0 = 11 <= $match
            ? 13 === $match ? 1 : (0)
            : (8 <= $match ? 1 : (0));
        }
        switch($switch__0) {
          // FALLTHROUGH
          case 0:
            $er_ = 4 as dynamic;
            break;
          // FALLTHROUGH
          case 1:
            $er_ = 2 as dynamic;
            break;
          }
        $n[1] = (int) ($n[1] + $er_);
        $es_ = (int) ($i__0 + 1) as dynamic;
        if ($em_ !== $i__0) {$i__0 = $es_;continue;}
        break;
      }
    }
    if ($n[1] === $caml_ml_bytes_length($s)) {return $copy($s);}
    $s__0 = $caml_create_bytes($n[1]);
    $n[1] = 0;
    $eo_ = (int) ($caml_ml_bytes_length($s) + -1) as dynamic;
    $en_ = 0 as dynamic;
    if (! ($eo_ < 0)) {
      $i = $en_;
      for (;;) {
        $c = $caml_bytes_unsafe_get($s, $i);
        if (35 <= $c) {
          $switch__2 = 92 === $c ? 1 : (127 <= $c ? 0 : (2));
        }
        else {
          if (32 <= $c) {
            $switch__2 = 34 <= $c ? 1 : (2);
          }
          else {
            if (14 <= $c) {
              $switch__2 = 0 as dynamic;
            }
            else {
              switch($c) {
                // FALLTHROUGH
                case 8:
                  $caml_bytes_unsafe_set($s__0, $n[1], 92);
                  $n[1] += 1;
                  $caml_bytes_unsafe_set($s__0, $n[1], 98);
                  $switch__2 = 3 as dynamic;
                  break;
                // FALLTHROUGH
                case 9:
                  $caml_bytes_unsafe_set($s__0, $n[1], 92);
                  $n[1] += 1;
                  $caml_bytes_unsafe_set($s__0, $n[1], 116);
                  $switch__2 = 3 as dynamic;
                  break;
                // FALLTHROUGH
                case 10:
                  $caml_bytes_unsafe_set($s__0, $n[1], 92);
                  $n[1] += 1;
                  $caml_bytes_unsafe_set($s__0, $n[1], 110);
                  $switch__2 = 3 as dynamic;
                  break;
                // FALLTHROUGH
                case 13:
                  $caml_bytes_unsafe_set($s__0, $n[1], 92);
                  $n[1] += 1;
                  $caml_bytes_unsafe_set($s__0, $n[1], 114);
                  $switch__2 = 3 as dynamic;
                  break;
                // FALLTHROUGH
                default:
                  $switch__2 = 0 as dynamic;
                }
            }
          }
        }
        switch($switch__2) {
          // FALLTHROUGH
          case 0:
            $caml_bytes_unsafe_set($s__0, $n[1], 92);
            $n[1] += 1;
            $caml_bytes_unsafe_set($s__0, $n[1], (int) (48 + (int) ($c / 100))
            );
            $n[1] += 1;
            $caml_bytes_unsafe_set(
              $s__0,
              $n[1],
              (int)
              (48 + (int) ((int) ($c / 10) % 10))
            );
            $n[1] += 1;
            $caml_bytes_unsafe_set($s__0, $n[1], (int) (48 + (int) ($c % 10)));
            break;
          // FALLTHROUGH
          case 1:
            $caml_bytes_unsafe_set($s__0, $n[1], 92);
            $n[1] += 1;
            $caml_bytes_unsafe_set($s__0, $n[1], $c);
            break;
          // FALLTHROUGH
          case 2:
            $caml_bytes_unsafe_set($s__0, $n[1], $c);
            break;
          }
        $n[1] += 1;
        $ep_ = (int) ($i + 1) as dynamic;
        if ($eo_ !== $i) {$i = $ep_;continue;}
        break;
      }
    }
    return $s__0;
  };
  $bos = (dynamic $ek_) : dynamic ==> {return $ek_;};
  $bts = (dynamic $ej_) : dynamic ==> {return $ej_;};
  $ensure_ge = (dynamic $x, dynamic $y) : dynamic ==> {
    return $y <= $x ? $x : ($invalid_arg($d_));
  };
  $sum_lengths = (dynamic $acc, dynamic $seplen, dynamic $param) : dynamic ==> {
    $acc__0 = $acc;
    $param__0 = $param;
    for (;;) {
      if ($param__0) {
        $eh_ = $param__0[2];
        $ei_ = $param__0[1];
        if ($eh_) {
          $acc__1 = $ensure_ge(
            (int)
            ((int) ($caml_ml_string_length($ei_) + $seplen) + $acc__0),
            $acc__0
          );
          $acc__0 = $acc__1;
          $param__0 = $eh_;
          continue;
        }
        return (int) ($caml_ml_string_length($ei_) + $acc__0);
      }
      return $acc__0;
    }
  };
  $unsafe_blits = 
  (dynamic $dst, dynamic $pos, dynamic $sep, dynamic $seplen, dynamic $param) : dynamic ==> {
    $pos__0 = $pos;
    $param__0 = $param;
    for (;;) {
      if ($param__0) {
        $ef_ = $param__0[2];
        $eg_ = $param__0[1];
        if ($ef_) {
          $caml_blit_string(
            $eg_,
            0,
            $dst,
            $pos__0,
            $caml_ml_string_length($eg_)
          );
          $caml_blit_string(
            $sep,
            0,
            $dst,
            (int)
            ($pos__0 + $caml_ml_string_length($eg_)),
            $seplen
          );
          $pos__1 = (int)
          ((int) ($pos__0 + $caml_ml_string_length($eg_)) + $seplen) as dynamic;
          $pos__0 = $pos__1;
          $param__0 = $ef_;
          continue;
        }
        $caml_blit_string($eg_, 0, $dst, $pos__0, $caml_ml_string_length($eg_)
        );
        return $dst;
      }
      return $dst;
    }
  };
  $concat = (dynamic $sep, dynamic $l) : dynamic ==> {
    if ($l) {
      $seplen = $caml_ml_string_length($sep);
      return $bts(
        $unsafe_blits(
          $caml_create_bytes($sum_lengths(0, $seplen, $l)),
          0,
          $sep,
          $seplen,
          $l
        )
      );
    }
    return $e_;
  };
  $escaped__0 = (dynamic $s) : dynamic ==> {
    $needs_escape = (dynamic $i) : dynamic ==> {
      $i__0 = $i;
      for (;;) {
        if ($caml_ml_string_length($s) <= $i__0) {return 0;}
        $match = $caml_bytes_unsafe_get($s, $i__0);
        if (32 <= $match) {
          $ee_ = (int) ($match + -34) as dynamic;
          if (58 < $unsigned_right_shift_32($ee_, 0)) {
            if (93 <= $ee_) {
              $switch__0 = 0 as dynamic;
              $switch__1 = 0 as dynamic;
            }
            else {$switch__1 = 1 as dynamic;}
          }
          else {
            if (56 < $unsigned_right_shift_32((int) ($ee_ + -1), 0)) {$switch__0 = 1 as dynamic;$switch__1 = 0 as dynamic;}
            else {$switch__1 = 1 as dynamic;}
          }
          if ($switch__1) {
            $i__1 = (int) ($i__0 + 1) as dynamic;
            $i__0 = $i__1;
            continue;
          }
        }
        else {
          $switch__0 = 11 <= $match
            ? 13 === $match ? 1 : (0)
            : (8 <= $match ? 1 : (0));
        }
        return $switch__0 ? 1 : (1);
      }
    };
    return $needs_escape(0) ? $bts($escaped($bos($s))) : ($s);
  };
  $index_rec = (dynamic $s, dynamic $lim, dynamic $i, dynamic $c) : dynamic ==> {
    $i__0 = $i;
    for (;;) {
      if ($lim <= $i__0) {
        throw $caml_wrap_thrown_exception($Not_found) as \Throwable;
      }
      if ($caml_bytes_unsafe_get($s, $i__0) === $c) {return $i__0;}
      $i__1 = (int) ($i__0 + 1) as dynamic;
      $i__0 = $i__1;
      continue;
    }
  };
  $contains_from = (dynamic $s, dynamic $i, dynamic $c) : dynamic ==> {
    $l = $caml_ml_string_length($s);
    if (0 <= $i) {
      if (! ($l < $i)) {
        try {$index_rec($s, $l, $i, $c);$ec_ = 1 as dynamic;return $ec_;}
        catch(\Throwable $ed_) {
          $ed_ = $runtime["caml_wrap_exception"]($ed_);
          if ($ed_ === $Not_found) {return 0;}
          throw $caml_wrap_thrown_exception_reraise($ed_) as \Throwable;
        }
      }
    }
    return $invalid_arg($f_);
  };
  $contains = (dynamic $s, dynamic $c) : dynamic ==> {
    return $contains_from($s, 0, $c);
  };
  
  $caml_fresh_oo_id(0);
  
  $caml_fresh_oo_id(0);
  
  $bits = (dynamic $s) : dynamic ==> {
    $s[2] = (int) ((int) ($s[2] + 1) % 55);
    $d__ = $s[2];
    $curval = $caml_check_bound($s[1], $d__)[$d__ + 1];
    $ea_ = (int) ((int) ($s[2] + 24) % 55) as dynamic;
    $newval = (int)
    ($caml_check_bound($s[1], $ea_)[$ea_ + 1] +
       ($curval ^ (int) $unsigned_right_shift_32($curval, 25) & 31)) as dynamic;
    $newval30 = $newval & 1073741823;
    $eb_ = $s[2];
    $caml_check_bound($s[1], $eb_)[$eb_ + 1] = $newval30;
    return $newval30;
  };
  $intaux = (dynamic $s, dynamic $n) : dynamic ==> {
    for (;;) {
      $r = $bits($s);
      $v = $runtime["caml_mod"]($r, $n);
      if ((int) ((int) (1073741823 - $n) + 1) < (int) ($r - $v)) {continue;}
      return $v;
    }
  };
  $int__0 = (dynamic $s, dynamic $bound) : dynamic ==> {
    if (! (1073741823 < $bound)) {
      if (0 < $bound) {return $intaux($s, $bound);}
    }
    return $invalid_arg($g_);
  };
  $default__0 = Vector{0, $h_->toVector(), 0} as dynamic;
  $int__1 = (dynamic $bound) : dynamic ==> {
    return $int__0($default__0, $bound);
  };
  $i_ = 5 as dynamic;
  $detectList = (dynamic $maxLength, dynamic $o) : dynamic ==> {
    $maxLength__0 = $maxLength;
    $o__0 = $o;
    for (;;) {
      if (0 === $maxLength__0) {return 1;}
      $tag = $caml_obj_tag($o__0);
      $match = $tag === 1000 ? 1 : (0);
      if (0 === $match) {
        $size = $o__0->count() - 1;
        $d7_ = $tag === 0 ? 1 : (0);
        if ($d7_) {
          $d8_ = 2 === $size ? 1 : (0);
          if ($d8_) {
            $o__1 = $o__0[2];
            $maxLength__1 = (int) ($maxLength__0 + -1) as dynamic;
            $maxLength__0 = $maxLength__1;
            $o__0 = $o__1;
            continue;
          }
          $d9_ = $d8_;
        }
        else {$d9_ = $d7_;}
        return $d9_;
      }
      return $runtime["caml_equal"]($o__0, 0);
    }
  };
  $extractList->contents = (dynamic $maxNum, dynamic $o) : dynamic ==> {
    if (0 === $maxNum) {return Vector{0, 1 - $is_int($o), 0};}
    if ($is_int($o)) {return $j_;}
    $match = $extractList->contents((int) ($maxNum + -1), $o[2]);
    $rest = $match[2];
    $restWasTruncated = $match[1];
    return Vector{0, $restWasTruncated, Vector{0, $o[1], $rest}};
  };
  $extractFields = (dynamic $maxNum, dynamic $o) : dynamic ==> {
    $extractFields = 
    (dynamic $maxNum, dynamic $fieldsSoFar, dynamic $numFields) : dynamic ==> {
      $maxNum__0 = $maxNum;
      $fieldsSoFar__0 = $fieldsSoFar;
      $numFields__0 = $numFields;
      for (;;) {
        if (0 === $maxNum__0) {
          return Vector{0, 0 < $numFields__0 ? 1 : (0), $fieldsSoFar__0};
        }
        if (0 === $numFields__0) {return Vector{0, 0, $fieldsSoFar__0};}
        $numFields__1 = (int) ($numFields__0 + -1) as dynamic;
        $fieldsSoFar__1 = Vector{
          0,
          $o[(int) ($numFields__0 + -1) + 1],
          $fieldsSoFar__0
        } as dynamic;
        $maxNum__1 = (int) ($maxNum__0 + -1) as dynamic;
        $maxNum__0 = $maxNum__1;
        $fieldsSoFar__0 = $fieldsSoFar__1;
        $numFields__0 = $numFields__1;
        continue;
      }
    };
    return $extractFields($maxNum, 0, $o->count() - 1);
  };
  $getBreakData = (dynamic $itms) : dynamic ==> {
    $match = $fold_left(
      (dynamic $param, dynamic $itm) : dynamic ==> {
        $curDidBreak = $param[2];
        $curTotalLen = $param[1];
        $containsNewline = $contains($itm, 10);
        $curDidBreak__0 = $curDidBreak ? $curDidBreak : ($containsNewline);
        return Vector{
          0,
          (int)
          ((int) ($curTotalLen + $caml_ml_string_length($itm)) + 2),
          $curDidBreak__0
        };
      },
      $k_,
      $itms
    );
    $someChildBroke = $match[2];
    $allItemsLen = $match[1];
    return Vector{0, $allItemsLen, $someChildBroke};
  };
  $indentForDepth->contents = (dynamic $n) : dynamic ==> {
    if (8 < $unsigned_right_shift_32($n, 0)) {
      return $symbol($indentForDepth->contents((int) ($n + -1)), $l_);
    }
    switch($n) {
      // FALLTHROUGH
      case 0:
        return $m_;
      // FALLTHROUGH
      case 1:
        return $n_;
      // FALLTHROUGH
      case 2:
        return $o_;
      // FALLTHROUGH
      case 3:
        return $p_;
      // FALLTHROUGH
      case 4:
        return $q_;
      // FALLTHROUGH
      case 5:
        return $r_;
      // FALLTHROUGH
      case 6:
        return $s_;
      // FALLTHROUGH
      case 7:
        return $t_;
      // FALLTHROUGH
      default:
        return $u_;
      }
  };
  $printTreeShape = (dynamic $pair, dynamic $self, dynamic $depth, dynamic $o) : dynamic ==> {
    $right = $pair[2];
    $left = $pair[1];
    $match = $extractFields($i_, $o);
    $lst = $match[2];
    $wasTruncated = $match[1];
    $dNext = (int) (1 + $depth) as dynamic;
    $indent = $indentForDepth->contents($depth);
    $indentNext = $indentForDepth->contents($dNext);
    $itms = $map->contents(
      (dynamic $o) : dynamic ==> {
        return $call3($self[13], $self, Vector{0, $dNext}, $o);
      },
      $lst
    );
    $match__0 = $getBreakData($itms);
    $someChildBroke = $match__0[2];
    $allItemsLen = $match__0[1];
    if (
      !
      (70 <=
         (int)
         ((int) ($caml_ml_string_length($indent) + 2) + $allItemsLen))
    ) {
      if (! $someChildBroke) {
        $truncationMsg__0 = 0 === $wasTruncated
          ? $A_
          : ($symbol($C_, $call1($self[6], $self)));
        $d6_ = $symbol($truncationMsg__0, $right);
        return $symbol($left, $symbol($concat($B_, $itms), $d6_));
      }
    }
    $truncationMsg = 0 === $wasTruncated
      ? $v_
      : ($symbol($z_, $symbol($indentNext, $call1($self[6], $self))));
    $d5_ = $symbol($truncationMsg, $symbol($w_, $symbol($indent, $right)));
    return $symbol(
      $left,
      $symbol(
        $y_,
        $symbol(
          $indentNext,
          $symbol($concat($symbol($x_, $indentNext), $itms), $d5_)
        )
      )
    );
  };
  $printListShape = (dynamic $self, dynamic $depth, dynamic $o) : dynamic ==> {
    $match = $extractList->contents($i_, $o);
    $lst = $match[2];
    $wasTruncated = $match[1];
    $dNext = (int) (1 + $depth) as dynamic;
    $indent = $indentForDepth->contents($depth);
    $indentNext = $indentForDepth->contents($dNext);
    $itms = $map->contents(
      (dynamic $o) : dynamic ==> {
        return $call3($self[13], $self, Vector{0, $dNext}, $o);
      },
      $lst
    );
    $match__0 = $getBreakData($itms);
    $someChildBroke = $match__0[2];
    $allItemsLen = $match__0[1];
    if (
      !
      (70 <=
         (int)
         ((int) ($caml_ml_string_length($indent) + 2) + $allItemsLen))
    ) {
      if (! $someChildBroke) {
        $truncationMsg__0 = 0 === $wasTruncated
          ? $K_
          : ($symbol($O_, $call1($self[6], $self)));
        $d4_ = $symbol($truncationMsg__0, $L_);
        return $symbol($N_, $symbol($concat($M_, $itms), $d4_));
      }
    }
    $truncationMsg = 0 === $wasTruncated
      ? $D_
      : ($symbol($J_, $symbol($indentNext, $call1($self[6], $self))));
    $d3_ = $symbol($truncationMsg, $symbol($F_, $symbol($indent, $E_)));
    return $symbol(
      $I_,
      $symbol(
        $H_,
        $symbol(
          $indentNext,
          $symbol($concat($symbol($G_, $indentNext), $itms), $d3_)
        )
      )
    );
  };
  $P_ = (dynamic $self, dynamic $opt, dynamic $o) : dynamic ==> {
    if ($opt) {
      $sth = $opt[1];
      $depth = $sth;
    }
    else {$depth = 0 as dynamic;}
    if (70 < $depth) {return $call1($self[5], $self);}
    $tag = $caml_obj_tag($o);
    if ($tag === 252) {
      $match = 0 === $depth ? 1 : (0);
      return 0 === $match
        ? $call2($self[3], $self, $o)
        : ($call2($self[2], $self, $o));
    }
    return $tag === 1000
      ? $call2($self[1], $self, $o)
      : ($tag === 253
       ? $call2($self[4], $self, $o)
       : ($tag === 247
        ? $call2($self[10], $self, $o)
        : ($tag === 254
         ? $call3($self[9], $self, 0, $o)
         : ($tag === 246
          ? $call2($self[8], $self, $o)
          : ($detectList($i_, $o)
           ? $call3($self[12], $self, Vector{0, $depth}, $o)
           : ($tag === 0
            ? $call3($self[11], $self, Vector{0, $depth}, $o)
            : ($call2($self[7], $self, $o))))))));
  };
  $Q_ = (dynamic $self, dynamic $opt, dynamic $o) : dynamic ==> {
    if ($opt) {
      $sth = $opt[1];
      $depth = $sth;
    }
    else {$depth = 0 as dynamic;}
    return $printListShape($self, $depth, $o);
  };
  $R_ = (dynamic $self, dynamic $opt, dynamic $o) : dynamic ==> {
    if ($opt) {
      $sth = $opt[1];
      $depth = $sth;
    }
    else {$depth = 0 as dynamic;}
    return $printTreeShape($S_, $self, $depth, $o);
  };
  $T_ = (dynamic $self, dynamic $f) : dynamic ==> {
    return $symbol($V_, $symbol($string_of_int((int) $f), $U_));
  };
  $W_ = (dynamic $self, dynamic $opt, dynamic $o) : dynamic ==> {
    if ($opt) {
      $sth = $opt[1];
      $depth = $sth;
    }
    else {$depth = 0 as dynamic;}
    return $printTreeShape($X_, $self, $depth, $o);
  };
  $Y_ = (dynamic $self, dynamic $o) : dynamic ==> {return $Z_;};
  $aa_ = (dynamic $self, dynamic $o) : dynamic ==> {return $ab_;};
  $ac_ = (dynamic $self) : dynamic ==> {return $ad_;};
  $ae_ = (dynamic $self) : dynamic ==> {return $af_;};
  $ag_ = (dynamic $self, dynamic $f) : dynamic ==> {
    return $string_of_float($f);
  };
  $ah_ = (dynamic $self, dynamic $s) : dynamic ==> {
    return $symbol($aj_, $symbol($call2($self[2], $self, $s), $ai_));
  };
  $ak_ = (dynamic $self, dynamic $s) : dynamic ==> {return $s;};
  $base = Vector{
    0,
    (dynamic $self, dynamic $i) : dynamic ==> {return $string_of_int($i);},
    $ak_,
    $ah_,
    $ag_,
    $ae_,
    $ac_,
    $aa_,
    $Y_,
    $W_,
    $T_,
    $R_,
    $Q_,
    $P_
  } as dynamic;
  $makeStandardChannelsConsole = (dynamic $objectPrinter) : dynamic ==> {
    $dZ_ = (dynamic $a) : dynamic ==> {
      return $runtime["native_debug"](
        $symbol($call3($objectPrinter[13], $objectPrinter, 0, $a), $al_)
      );
    };
    $d0_ = (dynamic $a) : dynamic ==> {
      return $runtime["native_error"](
        $symbol($call3($objectPrinter[13], $objectPrinter, 0, $a), $am_)
      );
    };
    $d1_ = (dynamic $a) : dynamic ==> {
      return $runtime["native_warn"](
        $symbol($call3($objectPrinter[13], $objectPrinter, 0, $a), $an_)
      );
    };
    $d2_ = (dynamic $a) : dynamic ==> {
      return $runtime["native_log"](
        $call3($objectPrinter[13], $objectPrinter, 0, $a)
      );
    };
    return Vector{
      0,
      (dynamic $a) : dynamic ==> {
        return $runtime["native_log"](
          $symbol($call3($objectPrinter[13], $objectPrinter, 0, $a), $ao_)
        );
      },
      $d2_,
      $d1_,
      $d0_,
      $dZ_
    };
  };
  $defaultGlobalConsole = $makeStandardChannelsConsole($base);
  $log = (dynamic $a) : dynamic ==> {
    return $call1($defaultGlobalConsole[1], $a);
  };
  $mapi3 = 
  (dynamic $f, dynamic $iSoFar, dynamic $revSoFar, dynamic $listA, dynamic $listB, dynamic $listC) : dynamic ==> {
    $iSoFar__0 = $iSoFar;
    $revSoFar__0 = $revSoFar;
    $listA__0 = $listA;
    $listB__0 = $listB;
    $listC__0 = $listC;
    for (;;) {
      if ($listA__0) {
        if ($listB__0) {
          if ($listC__0) {
            $listC__1 = $listC__0[2];
            $hdc = $listC__0[1];
            $listB__1 = $listB__0[2];
            $hdb = $listB__0[1];
            $listA__1 = $listA__0[2];
            $hda = $listA__0[1];
            $revSoFar__1 = Vector{
              0,
              $call4($f, $iSoFar__0, $hda, $hdb, $hdc),
              $revSoFar__0
            } as dynamic;
            $iSoFar__1 = (int) ($iSoFar__0 + 1) as dynamic;
            $iSoFar__0 = $iSoFar__1;
            $revSoFar__0 = $revSoFar__1;
            $listA__0 = $listA__1;
            $listB__0 = $listB__1;
            $listC__0 = $listC__1;
            continue;
          }
        }
      }
      else {if (! $listB__0) {if (! $listC__0) {return $rev($revSoFar__0);}}}
      throw $caml_wrap_thrown_exception(Vector{0, $Invalid_argument, $ap_}) as \Throwable;
    }
  };
  $mapi3__0 = (dynamic $f, dynamic $listA, dynamic $listB, dynamic $listC) : dynamic ==> {
    return $mapi3($f, 0, 0, $listA, $listB, $listC);
  };
  $splitList = 
  (dynamic $revCount, dynamic $revSoFar, dynamic $splitAt, dynamic $lst) : dynamic ==> {
    $revCount__0 = $revCount;
    $revSoFar__0 = $revSoFar;
    $lst__0 = $lst;
    for (;;) {
      if ($lst__0) {
        $tl = $lst__0[2];
        $hd = $lst__0[1];
        $match = $revCount__0 === $splitAt ? 1 : (0);
        if (0 === $match) {
          $revSoFar__1 = Vector{0, $hd, $revSoFar__0} as dynamic;
          $revCount__1 = (int) ($revCount__0 + 1) as dynamic;
          $revCount__0 = $revCount__1;
          $revSoFar__0 = $revSoFar__1;
          $lst__0 = $tl;
          continue;
        }
        return Vector{0, $rev($revSoFar__0), $hd, $tl};
      }
      throw $caml_wrap_thrown_exception(
              Vector{
                0,
                $Invalid_argument,
                $symbol($aq_, $string_of_int($splitAt))
              }
            ) as \Throwable;
    }
  };
  $splitList__0 = (dynamic $splitAt, dynamic $lst) : dynamic ==> {
    return $splitList(0, 0, $splitAt, $lst);
  };
  $nonReducer = (dynamic $param, dynamic $dY_) : dynamic ==> {return $ar_;};
  $nonEventHandler = (dynamic $e) : dynamic ==> {return 0;};
  $spec = (dynamic $param) : dynamic ==> {
    if (0 === $param[0]) {
      $reducer = $param[3];
      $subelems = $param[2];
      $state = $param[1];
      return Vector{0, $state, $reducer, $nonEventHandler, $subelems};
    }
    $spec = $param[1];
    return $spec;
  };
  $withState = (dynamic $inst, dynamic $state) : dynamic ==> {
    $dX_ = $inst[5];
    return Vector{
      0,
      $inst[1],
      $inst[2],
      $inst[3],
      $inst[4],
      Vector{0, $state, $dX_[2], $dX_[3], $dX_[4]},
      $inst[6]
    };
  };
  $newSelf = (dynamic $replacer, dynamic $subreplacer) : dynamic ==> {
    $self = Vector{} as dynamic;
    $dR_ = (dynamic $extractor, dynamic $e, dynamic $inst) : dynamic ==> {
      $dV_ = $call1($extractor, $e);
      $nextState = $call2($inst[5][2], $inst, $dV_);
      $dW_ = $inst[4];
      return $reconcile->contents($withState($inst, $nextState), $dW_);
    };
    $dS_ = (dynamic $action) : dynamic ==> {
      return $call1(
        $replacer,
        (dynamic $inst) : dynamic ==> {
          $nextState = $call2($inst[5][2], $inst, $action);
          $dU_ = $inst[4];
          return $reconcile->contents($withState($inst, $nextState), $dU_);
        }
      );
    };
    $caml_update_dummy(
      $self,
      Vector{
        0,
        (dynamic $actionExtractor, dynamic $ev) : dynamic ==> {
          $action = $call1($actionExtractor, $ev);
          return $call1(
            $replacer,
            (dynamic $inst) : dynamic ==> {
              $nextState = $call2($inst[5][2], $inst, $action);
              $dT_ = $inst[4];
              return $reconcile->contents($withState($inst, $nextState), $dT_);
            }
          );
        },
        $dS_,
        $dR_
      }
    );
    return $self;
  };
  $init = (dynamic $replacer, dynamic $renderable) : dynamic ==> {
    $subreplacer = (dynamic $subtreeSwapper) : dynamic ==> {
      return $call1(
        $replacer,
        (dynamic $inst) : dynamic ==> {
          $nextSubtree = $call1($subtreeSwapper, $inst[6]);
          $match = $inst[6] !== $nextSubtree ? 1 : (0);
          return 0 === $match
            ? $inst
            : (Vector{
             0,
             $inst[1],
             $inst[2],
             $inst[3],
             $inst[4],
             $inst[5],
             $nextSubtree
           });
        }
      );
    };
    $self = $newSelf($replacer, $subreplacer);
    $nextSpec = $spec($call2($renderable, 0, $self));
    return Vector{
      0,
      $replacer,
      $subreplacer,
      $self,
      $renderable,
      $nextSpec,
      $initSubtree->contents($subreplacer, $nextSpec[4])
    };
  };
  $initSubtree->contents = (dynamic $thisReplacer, dynamic $jsx) : dynamic ==> {
    if ($is_int($jsx)) {return 0;}
    else {
      switch($jsx[0]) {
        // FALLTHROUGH
        case 0:
          $renderable = $jsx[1];
          $nextReplacer = (dynamic $instSwapper) : dynamic ==> {
            return $call1(
              $thisReplacer,
              (dynamic $subtree) : dynamic ==> {
                $inst = $subtree[1];
                $next = $call1($instSwapper, $inst);
                $match = $inst !== $next ? 1 : (0);
                return 0 === $match ? $subtree : (Vector{0, $next});
              }
            );
          };
          return Vector{0, $init($nextReplacer, $renderable)};
        // FALLTHROUGH
        case 1:
          $stateRendererB = $jsx[2];
          $stateRendererA = $jsx[1];
          $nextReplacerA = (dynamic $aSwapper) : dynamic ==> {
            return $call1(
              $thisReplacer,
              (dynamic $subtree) : dynamic ==> {
                $b = $subtree[2];
                $a = $subtree[1];
                $next = $call1($aSwapper, $a);
                $match = $next === $a ? 1 : (0);
                return 0 === $match ? Vector{1, $next, $b} : ($subtree);
              }
            );
          };
          $nextReplacerB = (dynamic $bSwapper) : dynamic ==> {
            return $call1(
              $thisReplacer,
              (dynamic $subtree) : dynamic ==> {
                $b = $subtree[2];
                $a = $subtree[1];
                $next = $call1($bSwapper, $b);
                $match = $next === $b ? 1 : (0);
                return 0 === $match ? Vector{1, $a, $next} : ($subtree);
              }
            );
          };
          $dQ_ = $initSubtree->contents($nextReplacerB, $stateRendererB);
          return Vector{
            1,
            $initSubtree->contents($nextReplacerA, $stateRendererA),
            $dQ_
          };
        // FALLTHROUGH
        default:
          $elems = $jsx[1];
          $initElem = (dynamic $i, dynamic $e) : dynamic ==> {
            $subreplacer = (dynamic $swapper) : dynamic ==> {
              return $call1(
                $thisReplacer,
                (dynamic $subtree) : dynamic ==> {
                  $iLst = $subtree[1];
                  $match = $splitList__0($i, $iLst);
                  $post = $match[3];
                  $inst = $match[2];
                  $pre = $match[1];
                  $next = $call1($swapper, $inst);
                  $match__0 = $next === $inst ? 1 : (0);
                  return 0 === $match__0
                    ? Vector{
                     2,
                     $flatten->contents(
                       Vector{
                         0,
                         $pre,
                         Vector{0, Vector{0, $next, 0}, Vector{0, $post, 0}}
                       }
                     )
                   }
                    : ($subtree);
                }
              );
            };
            return $initSubtree->contents($subreplacer, $e);
          };
          $sub = $mapi($initElem, $elems);
          return Vector{2, $sub};
        }
    }
  };
  $reconcile->contents = (dynamic $inst, dynamic $renderable) : dynamic ==> {
    $nextSpec = $spec($call2($renderable, Vector{0, $inst[5][1]}, $inst[3]));
    $dP_ = $reconcileSubtree->contents($inst[6], $inst[5][4], $nextSpec[4]);
    return Vector{
      0,
      $inst[1],
      $inst[2],
      $inst[3],
      $renderable,
      $nextSpec,
      $dP_
    };
  };
  $reconcileSubtree->contents = 
  (dynamic $subtree, dynamic $prevJsx, dynamic $match) : dynamic ==> {
    if ($is_int($subtree)) {return 0;}
    else {
      switch($subtree[0]) {
        // FALLTHROUGH
        case 0:
          $r = $match[1];
          $rPrev = $prevJsx[1];
          $i = $subtree[1];
          $match__0 = $r === $rPrev ? 1 : (0);
          return 0 === $match__0
            ? Vector{0, $reconcile->contents($i, $r)}
            : ($subtree);
        // FALLTHROUGH
        case 1:
          $rb = $match[2];
          $ra = $match[1];
          $rbPrev = $prevJsx[2];
          $raPrev = $prevJsx[1];
          $ib = $subtree[2];
          $ia = $subtree[1];
          $dO_ = $reconcileSubtree->contents($ib, $rbPrev, $rb);
          return Vector{
            1,
            $reconcileSubtree->contents($ia, $raPrev, $ra),
            $dO_
          };
        // FALLTHROUGH
        default:
          $eLst = $match[1];
          $eLstPrev = $prevJsx[1];
          $iLst = $subtree[1];
          $nextSeq = $mapi3__0(
            (dynamic $i, dynamic $itm, dynamic $r, dynamic $rPrev) : dynamic ==> {
              return $reconcileSubtree->contents($itm, $rPrev, $r);
            },
            $iLst,
            $eLst,
            $eLstPrev
          );
          return Vector{2, $nextSeq};
        }
    }
  };
  $control = (dynamic $param, dynamic $controlledState) : dynamic ==> {
    $renderable = $param[1];
    return Vector{
      0,
      (dynamic $state, dynamic $self) : dynamic ==> {
        return $call2($renderable, Vector{0, $controlledState}, $self);
      }
    };
  };
  $create = (dynamic $param) : dynamic ==> {
    $root = Vector{} as dynamic;
    $dM_ = 0 as dynamic;
    $caml_update_dummy(
      $root,
      Vector{
        0,
        (dynamic $swapper) : dynamic ==> {
          $dN_ = $root[2];
          if ($dN_) {
            $ei = $dN_[1];
            $curInst = $ei[2];
            $curElems = $ei[1];
            $nextEi = Vector{0, $curElems, $call1($swapper, $curInst)} as dynamic;
            $root[2] = Vector{0, $nextEi};
            return 0;
          }
          throw $caml_wrap_thrown_exception(Vector{0, $Invalid_argument, $as_}
                ) as \Throwable;
        },
        $dM_
      }
    );
    return $root;
  };
  $render = (dynamic $root, dynamic $elems) : dynamic ==> {
    $dL_ = $root[2];
    if ($dL_) {
      $ei = $dL_[1];
      $curSubtree = $ei[2];
      $curElems = $ei[1];
      $nextEi = Vector{
        0,
        $elems,
        $reconcileSubtree->contents($curSubtree, $curElems, $elems)
      } as dynamic;
      $root[2] = Vector{0, $nextEi};
      return 0;
    }
    $nextEi__0 = Vector{0, $elems, $initSubtree->contents($root[1], $elems)} as dynamic;
    $root[2] = Vector{0, $nextEi__0};
    return 0;
  };
  $counter = Vector{0, 0} as dynamic;
  $subscribers = Vector{0, 0} as dynamic;
  $request = (dynamic $cb) : dynamic ==> {
    $subscribers[1] = Vector{0, $cb, $subscribers[1]};
    $counter[1] = (int) ($counter[1] + 1);
    return $counter[1];
  };
  $tick = (dynamic $param) : dynamic ==> {
    $prevSubscribers = $subscribers[1];
    $subscribers[1] = 0;
    return $iter(
      (dynamic $cb) : dynamic ==> {return $call1($cb, 0);},
      $prevSubscribers
    );
  };
  $clearAll = (dynamic $param) : dynamic ==> {$subscribers[1] = 0;return 0;};
  $element = (dynamic $x) : dynamic ==> {return $x;};
  $suppress = Vector{0, 0} as dynamic;
  $printInstanceCollection->contents = (dynamic $opt, dynamic $subtree) : dynamic ==> {
    if ($opt) {
      $sth = $opt[1];
      $s = $sth;
    }
    else {$s = $aJ_;}
    $dNext = $symbol($au_, $s);
    if ($is_int($subtree)) {return $av_;}
    else {
      switch($subtree[0]) {
        // FALLTHROUGH
        case 0:
          $n = $subtree[1];
          return $symbol(
            $ay_,
            $symbol($at_->contents(Vector{0, $symbol($ax_, $s)}, $n), $aw_)
          );
        // FALLTHROUGH
        case 1:
          $n2 = $subtree[2];
          $n1 = $subtree[1];
          $dH_ = $symbol($aA_, $symbol($s, $az_));
          $dI_ = $symbol(
            $aC_,
            $symbol(
              $aB_,
              $symbol(
                $dNext,
                $symbol(
                  $printInstanceCollection->contents(Vector{0, $dNext}, $n2),
                  $dH_
                )
              )
            )
          );
          return $symbol(
            $aE_,
            $symbol(
              $aD_,
              $symbol(
                $dNext,
                $symbol(
                  $printInstanceCollection->contents(Vector{0, $dNext}, $n1),
                  $dI_
                )
              )
            )
          );
        // FALLTHROUGH
        default:
          $lst = $subtree[1];
          $dJ_ = Vector{0, $symbol($aG_, $s)} as dynamic;
          return $symbol(
            $aI_,
            $symbol(
              $concat(
                $aH_,
                $map->contents(
                  (dynamic $dK_) : dynamic ==> {
                    return $printInstanceCollection->contents($dJ_, $dK_);
                  },
                  $lst
                )
              ),
              $aF_
            )
          );
        }
    }
  };
  $at_->contents = (dynamic $opt, dynamic $n) : dynamic ==> {
    if ($opt) {
      $sth = $opt[1];
      $s = $sth;
    }
    else {$s = $aU_;}
    $match = $n[5];
    $state = $match[1];
    $dD_ = $symbol($aL_, $symbol($s, $aK_));
    $dE_ = $n[6];
    $dF_ = $symbol(
      $aO_,
      $symbol(
        $s,
        $symbol(
          $aN_,
          $symbol(
            $printInstanceCollection->contents(
              Vector{0, $symbol($aM_, $s)},
              $dE_
            ),
            $dD_
          )
        )
      )
    );
    $dG_ = $is_int($state)
      ? $string_of_int($state)
      : ($caml_obj_tag($state) === 252
       ? $symbol($aS_, $symbol($escaped__0($state), $aR_))
       : ($aT_));
    return $symbol($aQ_, $symbol($s, $symbol($aP_, $symbol($dG_, $dF_))));
  };
  $printSection = (dynamic $s) : dynamic ==> {
    return $suppress[1] ? 0 : ($log($symbol($aV_, $s)));
  };
  $printRoot = (dynamic $title, dynamic $root) : dynamic ==> {
    $dC_ = $root[2];
    if (0 === $suppress[1]) {
      if ($dC_) {
        $match = $dC_[1];
        $subtree = $match[2];
        $log($symbol($aX_, $symbol($title, $aW_)));
        return $log($printInstanceCollection->contents(0, $subtree));
      }
      $log($title);
      return $log($symbol($a0_, $symbol($aZ_, $aY_)));
    }
    return 0;
  };
  $domEventHandler = (dynamic $e) : dynamic ==> {return 0;};
  $domStateToString = (dynamic $state) : dynamic ==> {return $state;};
  $render__0 = 
  (dynamic $onClick, dynamic $opt, dynamic $children, dynamic $state, dynamic $self) : dynamic ==> {
    if ($opt) {
      $sth = $opt[1];
      $className = $sth;
    }
    else {$className = $a1_;}
    return Vector{
      1,
      Vector{
        0,
        $className,
        (dynamic $inst, dynamic $param) : dynamic ==> {
          $str = $param[1];
          return $str;
        },
        $domEventHandler,
        $children
      }
    };
  };
  $render__1 = 
  (dynamic $opt, dynamic $size, dynamic $children, dynamic $dx_, dynamic $self) : dynamic ==> {
    if ($opt) {
      $sth = $opt[1];
      $txt = $sth;
    }
    else {$txt = $a3_;}
    if ($dx_) {
      $sth__0 = $dx_[1];
      $state = $sth__0;
    }
    else {$state = $txt;}
    $dy_ = 0 as dynamic;
    $dz_ = 0 as dynamic;
    return Vector{
      0,
      $state,
      $element(
        Vector{
          0,
          (dynamic $dA_, dynamic $dB_) : dynamic ==> {
            return $render__0($dz_, $a2_, $dy_, $dA_, $dB_);
          }
        }
      ),
      $nonReducer
    };
  };
  $render__2 = (dynamic $opt, dynamic $children, dynamic $dt_, dynamic $self) : dynamic ==> {
    if ($opt) {
      $sth = $opt[1];
      $txt = $sth;
    }
    else {$txt = $a5_;}
    if ($dt_) {
      $sth__0 = $dt_[1];
      $state = $sth__0;
    }
    else {$state = $txt;}
    $du_ = 0 as dynamic;
    return Vector{
      0,
      $state,
      $element(
        Vector{
          0,
          (dynamic $dv_, dynamic $dw_) : dynamic ==> {
            return $render__0($du_, $a4_, $children, $dv_, $dw_);
          }
        }
      ),
      $nonReducer
    };
  };
  $render__3 = 
  (dynamic $opt, dynamic $size, dynamic $children, dynamic $dh_, dynamic $self) : dynamic ==> {
    ;
    if ($dh_) {
      $sth = $dh_[1];
      $state = $sth;
    }
    else {$state = Vector{0, $size, 0} as dynamic;}
    $curChangeCount = $state[2];
    $curSize = $state[1];
    $match = $curSize !== $size ? 1 : (0);
    $nextChangeCount = 0 === $match
      ? $curChangeCount
      : ((int) ($curChangeCount + 1));
    $di_ = (dynamic $param, dynamic $ds_) : dynamic ==> {return $state;};
    $dj_ = 0 as dynamic;
    $dk_ = Vector{0, $symbol($a6_, $string_of_int($nextChangeCount))} as dynamic;
    $dl_ = 0 as dynamic;
    $dm_ = $element(
      Vector{
        0,
        (dynamic $dq_, dynamic $dr_) : dynamic ==> {
          return $render__0($dl_, $dk_, $dj_, $dq_, $dr_);
        }
      }
    );
    $dn_ = 0 as dynamic;
    return Vector{
      0,
      Vector{0, $size, $nextChangeCount},
      Vector{
        1,
        $element(
          Vector{
            0,
            (dynamic $do_, dynamic $dp_) : dynamic ==> {
              return $render__1($a7_, $dn_, $children, $do_, $dp_);
            }
          }
        ),
        $dm_
      },
      $di_
    };
  };
  $render__4 = (dynamic $opt, dynamic $children, dynamic $da_, dynamic $self) : dynamic ==> {
    if ($opt) {
      $sth = $opt[1];
      $initialText = $sth;
    }
    else {$initialText = $a9_;}
    if ($da_) {
      $sth__0 = $da_[1];
      $state = $sth__0;
    }
    else {$state = $initialText;}
    $db_ = (dynamic $param, dynamic $dg_) : dynamic ==> {return $state;};
    $dc_ = 0 as dynamic;
    $dd_ = 0 as dynamic;
    return Vector{
      0,
      $state,
      $element(
        Vector{
          0,
          (dynamic $de_, dynamic $df_) : dynamic ==> {
            return $render__0($dd_, $a8_, $dc_, $de_, $df_);
          }
        }
      ),
      $db_
    };
  };
  $render__5 = (dynamic $children, dynamic $opt, dynamic $self) : dynamic ==> {
    if ($opt) {
      $sth = $opt[1];
      $state = $sth;
    }
    else {$state = 0 as dynamic;}
    $c4_ = (dynamic $param, dynamic $c__) : dynamic ==> {
      $next = $c__[1];
      return $runtime["caml_int_of_string"]($next);
    };
    $c5_ = 0 as dynamic;
    $c6_ = Vector{0, $symbol($a__, $string_of_int($state))} as dynamic;
    $c7_ = Vector{0, (dynamic $e) : dynamic ==> {return $print_string($ba_);}} as dynamic;
    return Vector{
      0,
      $state,
      Vector{
        0,
        (dynamic $c8_, dynamic $c9_) : dynamic ==> {
          return $render__0($c7_, $c6_, $c5_, $c8_, $c9_);
        }
      },
      $c4_
    };
  };
  $render__6 = 
  (dynamic $shouldControlInput, dynamic $children, dynamic $opt, dynamic $self) : dynamic ==> {
    if ($opt) {
      $sth = $opt[1];
      $state = $sth;
    }
    else {$state = $be_;}
    $cU_ = 0 as dynamic;
    $input = $element(
      Vector{
        0,
        (dynamic $c2_, dynamic $c3_) : dynamic ==> {
          return $render__4($bb_, $cU_, $c2_, $c3_);
        }
      }
    );
    $input__0 = 0 === $shouldControlInput ? $input : ($control($input, $bd_));
    $cV_ = 0 as dynamic;
    $cW_ = $element(
      Vector{
        0,
        (dynamic $c0_, dynamic $c1_) : dynamic ==> {
          return $render__5($cV_, $c0_, $c1_);
        }
      }
    );
    $cX_ = 0 as dynamic;
    return Vector{
      0,
      $state,
      Vector{
        1,
        $element(
          Vector{
            0,
            (dynamic $cY_, dynamic $cZ_) : dynamic ==> {
              return $render__0($cX_, $bc_, $input__0, $cY_, $cZ_);
            }
          }
        ),
        $cW_
      },
      $nonReducer
    };
  };
  $render__7 = 
  (dynamic $anyProp, dynamic $size, dynamic $children, dynamic $opt, dynamic $self) : dynamic ==> {
    if ($opt) {
      $sth = $opt[1];
      $state = $sth;
    }
    else {$state = Vector{0, $anyProp, $anyProp} as dynamic;}
    $cO_ = (dynamic $param, dynamic $action) : dynamic ==> {return $state;};
    $cP_ = 0 as dynamic;
    $cQ_ = Vector{0, $size} as dynamic;
    $cR_ = 0 as dynamic;
    return Vector{
      0,
      $state,
      Vector{
        0,
        (dynamic $cS_, dynamic $cT_) : dynamic ==> {
          return $render__0($cR_, $cQ_, $cP_, $cS_, $cT_);
        }
      },
      $cO_
    };
  };
  $symbol__0 = (dynamic $x, dynamic $getDefault) : dynamic ==> {
    if ($x) {$x__0 = $x[1];return $x__0;}
    return $call1($getDefault, 0);
  };
  $onRaf = (dynamic $e) : dynamic ==> {return $bf_;};
  $initialStateGetter = (dynamic $self, dynamic $param) : dynamic ==> {
    $request($call1($self[1], $onRaf));
    return $bg_;
  };
  $render__8 = (dynamic $opt, dynamic $param, dynamic $state, dynamic $self) : dynamic ==> {
    ;
    $state__0 = $symbol__0(
      $state,
      (dynamic $cN_) : dynamic ==> {return $initialStateGetter($self, $cN_);}
    );
    $cy_ = (dynamic $inst, dynamic $action) : dynamic ==> {
      $match = $inst[6][2][1][6];
      $deepestDiv = $match[1];
      $divStateStr = $domStateToString($deepestDiv[5][1]);
      $request($call1($self[1], $onRaf));
      return $symbol($state__0, $symbol($bi_, $symbol($divStateStr, $bh_)));
    };
    $cz_ = 0 as dynamic;
    $cA_ = Vector{0, $symbol($bj_, $string_of_int($int__1(10)))} as dynamic;
    $cB_ = 0 as dynamic;
    $cC_ = $element(
      Vector{
        0,
        (dynamic $cL_, dynamic $cM_) : dynamic ==> {
          return $render__0($cB_, $cA_, $cz_, $cL_, $cM_);
        }
      }
    );
    $cD_ = 0 as dynamic;
    $cE_ = $element(
      Vector{
        0,
        (dynamic $cJ_, dynamic $cK_) : dynamic ==> {
          return $render__0($cD_, $bk_, $cC_, $cJ_, $cK_);
        }
      }
    );
    $cF_ = 0 as dynamic;
    $cG_ = 0 as dynamic;
    return Vector{
      0,
      $state__0,
      Vector{
        1,
        $element(
          Vector{
            0,
            (dynamic $cH_, dynamic $cI_) : dynamic ==> {
              return $render__0($cG_, $bl_, $cF_, $cH_, $cI_);
            }
          }
        ),
        $cE_
      },
      $cy_
    };
  };
  $render__9 = (dynamic $opt, dynamic $children) : dynamic ==> {
    if ($opt) {
      $sth = $opt[1];
      $txt = $sth;
    }
    else {$txt = $bm_;}
    $ct_ = 0 as dynamic;
    $cu_ = Vector{0, $txt} as dynamic;
    $cv_ = 0 as dynamic;
    return (dynamic $cw_, dynamic $cx_) : dynamic ==> {
      return $render__0($cv_, $cu_, $ct_, $cw_, $cx_);
    };
  };
  
  $log($bn_);
  
  $startSeconds = $caml_sys_time(0);
  
  $suppress[1] = 0;
  
  $i = 0 as dynamic;
  
  for (;;) {
    $continue_label = null;
    $stateless = $element(Vector{0, $render__9($bq_, 0)});
    $printSection($br_);
    $containerRoot = $create(0);
    $j = 0 as dynamic;
    for (;;) {
      $bZ_ = $element(Vector{0, $render__9($bY_, 0)});
      $render(
        $containerRoot,
        $element(
          Vector{
            0,
            ((dynamic $cq_) : dynamic ==> {
               return (dynamic $cr_, dynamic $cs_) : dynamic ==> {
                 return $render__2($b0_, $cq_, $cr_, $cs_);
               };
             })($bZ_)
          }
        )
      );
      $b1_ = (int) ($j + 1) as dynamic;
      if (10 !== $j) {$j = $b1_;continue;}
      $printSection($bs_);
      $counterRoot = $create(0);
      $bt_ = 0 as dynamic;
      $render(
        $counterRoot,
        $element(
          Vector{
            0,
            ((dynamic $stateless, dynamic $cn_) : dynamic ==> {
               return (dynamic $co_, dynamic $cp_) : dynamic ==> {
                 return $render__3($bu_, $cn_, $stateless, $co_, $cp_);
               };
             })($stateless, $bt_)
          }
        )
      );
      $printRoot($bv_, $counterRoot);
      $bw_ = 0 as dynamic;
      $render(
        $counterRoot,
        $element(
          Vector{
            0,
            ((dynamic $stateless, dynamic $ck_) : dynamic ==> {
               return (dynamic $cl_, dynamic $cm_) : dynamic ==> {
                 return $render__3($bx_, $ck_, $stateless, $cl_, $cm_);
               };
             })($stateless, $bw_)
          }
        )
      );
      $printRoot($by_, $counterRoot);
      $bz_ = 8 as dynamic;
      $render(
        $counterRoot,
        $element(
          Vector{
            0,
            ((dynamic $stateless, dynamic $ch_) : dynamic ==> {
               return (dynamic $ci_, dynamic $cj_) : dynamic ==> {
                 return $render__3($bA_, $ch_, $stateless, $ci_, $cj_);
               };
             })($stateless, $bz_)
          }
        )
      );
      $printRoot($bB_, $counterRoot);
      $printSection($bC_);
      $appRoot = $create(0);
      $bD_ = 0 as dynamic;
      $render(
        $appRoot,
        $element(
          Vector{
            0,
            ((dynamic $stateless, dynamic $ce_) : dynamic ==> {
               return (dynamic $cf_, dynamic $cg_) : dynamic ==> {
                 return $render__6($ce_, $stateless, $cf_, $cg_);
               };
             })($stateless, $bD_)
          }
        )
      );
      $printRoot($bE_, $appRoot);
      $bF_ = 0 as dynamic;
      $bG_ = 1 as dynamic;
      $render(
        $appRoot,
        $element(
          Vector{
            0,
            ((dynamic $ca_, dynamic $cb_) : dynamic ==> {
               return (dynamic $cc_, dynamic $cd_) : dynamic ==> {
                 return $render__6($cb_, $ca_, $cc_, $cd_);
               };
             })($bF_, $bG_)
          }
        )
      );
      $printRoot($bH_, $appRoot);
      $printSection($bI_);
      $animRoot = $create(0);
      $render(
        $animRoot,
        $element(
          Vector{
            0,
            (dynamic $b9_, dynamic $b__) : dynamic ==> {
              return $render__8($bK_, $bJ_, $b9_, $b__);
            }
          }
        )
      );
      $printRoot($bL_, $animRoot);
      $tick(0);
      $printRoot($bM_, $animRoot);
      $tick(0);
      $printRoot($bN_, $animRoot);
      $clearAll(0);
      $printSection($bO_);
      $polyRoot = $create(0);
      $bP_ = 0 as dynamic;
      $render(
        $polyRoot,
        $element(
          Vector{
            0,
            ((dynamic $b6_) : dynamic ==> {
               return (dynamic $b7_, dynamic $b8_) : dynamic ==> {
                 return $render__7($bR_, $bQ_, $b6_, $b7_, $b8_);
               };
             })($bP_)
          }
        )
      );
      $printRoot($bS_, $polyRoot);
      $anotherPolyRoot = $create(0);
      $bT_ = 0 as dynamic;
      $bV_ = 0 as dynamic;
      $render(
        $anotherPolyRoot,
        $element(
          Vector{
            0,
            ((dynamic $b2_, dynamic $b3_) : dynamic ==> {
               return (dynamic $b4_, dynamic $b5_) : dynamic ==> {
                 return $render__7($b3_, $bU_, $b2_, $b4_, $b5_);
               };
             })($bT_, $bV_)
          }
        )
      );
      $printRoot($bW_, $anotherPolyRoot);
      $bX_ = (int) ($i + 1) as dynamic;
      if (0 !== $i) {$i = $bX_;$continue_label = "a";break;}
      $endSeconds = $caml_sys_time(0);
      $log(
        $symbol(
          $bo_,
          $string_of_int((int) (($endSeconds - $startSeconds) * 1000))
        )
      );
      $f = $runtime["caml_alloc_dummy_function"](1, 2);
      $z = Vector{} as dynamic;
      $caml_update_dummy(
        $f,
        (dynamic $x, dynamic $y) : dynamic ==> {return 1;}
      );
      $caml_update_dummy($z, Vector{0, Vector{0, $f, $bp_}});
      if ($z) {
        $match = $z[1];
        $str = $match[2];
        $f__0 = $match[1];
        $log($symbol($str, $string_of_int($call2($f__0, 0, 0))));
      }
      $do_at_exit(0);
    }
    if ($continue_label === "a") {continue;}
  }

}

main();
/* Hashing disabled */
