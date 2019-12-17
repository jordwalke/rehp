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
  $runtime = $joo_global_object->jsoo_runtime;
  
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
  $Out_of_memory = Vector{248, $string("Out_of_memory"), -1};
  $Sys_error = Vector{248, $string("Sys_error"), -2};
  $Failure = Vector{248, $string("Failure"), -3};
  $Invalid_argument = Vector{248, $string("Invalid_argument"), -4};
  $End_of_file = Vector{248, $string("End_of_file"), -5};
  $Division_by_zero = Vector{248, $string("Division_by_zero"), -6};
  $Not_found = Vector{248, $string("Not_found"), -7};
  $Match_failure = Vector{248, $string("Match_failure"), -8};
  $Stack_overflow = Vector{248, $string("Stack_overflow"), -9};
  $Sys_blocked_io = Vector{248, $string("Sys_blocked_io"), -10};
  $Assert_failure = Vector{248, $string("Assert_failure"), -11};
  $Undefined_recursive_module = Vector{
    248,
    $string("Undefined_recursive_module"),
    -12
  };
  
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
  };
  $j_ = Vector{0, 0, 0};
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
  $X_ = Vector{0, $string("[|"), $string("|]")};
  $U_ = $string(")");
  $V_ = $string("closure(");
  $S_ = Vector{0, $string("{"), $string("}")};
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
  $k_ = Vector{0, 0, 0};
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
  $a2_ = Vector{0, $string("buttonClass")};
  $a5_ = $string("deafult");
  $a4_ = Vector{0, $string("childContainer")};
  $a6_ = $string("size changed times:");
  $a7_ = Vector{0, $string("ButtonInContainerThatCountsSizeChanges")};
  $a9_ = $string("deafult");
  $a8_ = Vector{0, $string("divRenderedByInput")};
  $ba_ = $string("divClicked!");
  $a__ = $string("MyReducer:");
  $be_ = $string("AppInstance");
  $bb_ = Vector{0, $string("initialInputText")};
  $bd_ = $string("haha I am controlling your input");
  $bc_ = Vector{0, $string("divRenderedByAppContainsInput")};
  $bh_ = $string(")");
  $bi_ = $string("->animFiredWithDeepDivState(");
  $bj_ = $string("rafDeepDiv");
  $bk_ = Vector{0, $string("rafSecond")};
  $bl_ = Vector{0, $string("rafFirstDiv")};
  $bg_ = $string("initialAnimationFrameSetup");
  $bf_ = Vector{0, $string("TODO")};
  $bm_ = $string("default");
  $bn_ = $string("HELLO");
  $bq_ = Vector{0, $string("stateless")};
  $br_ = $string(
    "\n\n-------------------\nChild Container \n-------------------"
  );
  $bY_ = Vector{0, $string("stateless")};
  $b0_ = Vector{0, $string("Foo")};
  $bs_ = $string(
    "\n\n-------------------\nGets Derived State From Props\n-------------------"
  );
  $bu_ = Vector{0, $string("Foo")};
  $bv_ = $string("Init:");
  $bx_ = Vector{0, $string("Foo")};
  $by_ = $string("Update Without Changing Props:");
  $bA_ = Vector{0, $string("Foo")};
  $bB_ = $string("Update With Changing Props:");
  $bC_ = $string(
    "\n\n------------------------------\nApp With Controlled Input\n------------------------------"
  );
  $bE_ = $string("Init:");
  $bH_ = $string("Update:");
  $bI_ = $string(
    "\n\n------------------------------\nApp With Request Animation Frame \n----------------------"
  );
  $bJ_ = Vector{0, 2, 3};
  $bK_ = Vector{0, $string("")};
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
  $invalid_arg = function(dynamic $s) use ($Invalid_argument,$caml_wrap_thrown_exception) {
    throw $caml_wrap_thrown_exception(Vector{0, $Invalid_argument, $s}) as \Throwable;
  };
  
  $caml_fresh_oo_id(0);
  
  $symbol = function(dynamic $s1, dynamic $s2) use ($caml_blit_string,$caml_create_bytes,$caml_ml_string_length) {
    $l1 = $caml_ml_string_length($s1);
    $l2 = $caml_ml_string_length($s2);
    $s = $caml_create_bytes((int) ($l1 + $l2));
    $caml_blit_string($s1, 0, $s, 0, $l1);
    $caml_blit_string($s2, 0, $s, $l1, $l2);
    return $s;
  };
  $string_of_int = function(dynamic $n) use ($string) {
    return $string("" . $n);
  };
  $valid_float_lexem = function(dynamic $s) use ($a_,$caml_ml_string_length,$runtime,$symbol) {
    $l = $caml_ml_string_length($s);
    $loop = function(dynamic $i) use ($a_,$l,$runtime,$s,$symbol) {
      $i__0 = $i;
      for (;;) {
        if ($l <= $i__0) {return $symbol($s, $a_);}
        $match = $runtime["caml_string_get"]($s, $i__0);
        $switch__0 = 48 <= $match
          ? 58 <= $match ? 0 : (1)
          : (45 === $match ? 1 : (0));
        if ($switch__0) {$i__1 = (int) ($i__0 + 1);$i__0 = $i__1;continue;}
        return $s;
      }
    };
    return $loop(0);
  };
  $string_of_float = function(dynamic $f) use ($b_,$runtime,$valid_float_lexem) {
    return $valid_float_lexem($runtime["caml_format_float"]($b_, $f));
  };
  $append->contents = function(dynamic $l1, dynamic $l2) use ($append) {
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
  
  $flush_all = function(dynamic $param) use ($Sys_error,$caml_wrap_thrown_exception_reraise,$runtime) {
    $iter = function(dynamic $param) use ($Sys_error,$caml_wrap_thrown_exception_reraise,$runtime) {
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
  $output_string = function(dynamic $oc, dynamic $s) use ($caml_ml_string_length,$runtime) {
    return $runtime["caml_ml_output"]($oc, $s, 0, $caml_ml_string_length($s));
  };
  $print_string = function(dynamic $s) use ($output_string,$stdout) {
    return $output_string($stdout, $s);
  };
  $do_at_exit = function(dynamic $param) use ($flush_all) {
    return $flush_all(0);
  };
  $rev_append = function(dynamic $l1, dynamic $l2) {
    $l1__0 = $l1;
    $l2__0 = $l2;
    for (;;) {
      if ($l1__0) {
        $l1__1 = $l1__0[2];
        $a = $l1__0[1];
        $l2__1 = Vector{0, $a, $l2__0};
        $l1__0 = $l1__1;
        $l2__0 = $l2__1;
        continue;
      }
      return $l2__0;
    }
  };
  $rev = function(dynamic $l) use ($rev_append) {return $rev_append($l, 0);};
  $flatten->contents = function(dynamic $param) use ($append,$flatten) {
    if ($param) {
      $r = $param[2];
      $l = $param[1];
      return $append->contents($l, $flatten->contents($r));
    }
    return 0;
  };
  $map->contents = function(dynamic $f, dynamic $param) use ($call1,$map) {
    if ($param) {
      $l = $param[2];
      $a = $param[1];
      $r = $call1($f, $a);
      return Vector{0, $r, $map->contents($f, $l)};
    }
    return 0;
  };
  $c_->contents = function(dynamic $i, dynamic $f, dynamic $param) use ($c_,$call2) {
    if ($param) {
      $l = $param[2];
      $a = $param[1];
      $r = $call2($f, $i, $a);
      return Vector{0, $r, $c_->contents((int) ($i + 1), $f, $l)};
    }
    return 0;
  };
  $mapi = function(dynamic $f, dynamic $l) use ($c_) {
    return $c_->contents(0, $f, $l);
  };
  $iter = function(dynamic $f, dynamic $param) use ($call1) {
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
  $fold_left = function(dynamic $f, dynamic $accu, dynamic $l) use ($call2) {
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
  $copy = function(dynamic $s) use ($caml_create_bytes,$caml_ml_bytes_length,$runtime) {
    $len = $caml_ml_bytes_length($s);
    $r = $caml_create_bytes($len);
    $runtime["caml_blit_bytes"]($s, 0, $r, 0, $len);
    return $r;
  };
  $escaped = function(dynamic $s) use ($caml_bytes_unsafe_get,$caml_bytes_unsafe_set,$caml_create_bytes,$caml_ml_bytes_length,$copy,$unsigned_right_shift_32) {
    $n = Vector{0, 0};
    $em_ = (int) ($caml_ml_bytes_length($s) + -1);
    $el_ = 0;
    if (! ($em_ < 0)) {
      $i__0 = $el_;
      for (;;) {
        $match = $caml_bytes_unsafe_get($s, $i__0);
        if (32 <= $match) {
          $eq_ = (int) ($match + -34);
          if (58 < $unsigned_right_shift_32($eq_, 0)) {
            if (93 <= $eq_) {
              $switch__0 = 0;
              $switch__1 = 0;
            }
            else {$switch__1 = 1;}
          }
          else {
            if (56 < $unsigned_right_shift_32((int) ($eq_ + -1), 0)) {$switch__0 = 1;$switch__1 = 0;}
            else {$switch__1 = 1;}
          }
          if ($switch__1) {$er_ = 1;$switch__0 = 2;}
        }
        else {
          $switch__0 = 11 <= $match
            ? 13 === $match ? 1 : (0)
            : (8 <= $match ? 1 : (0));
        }
        switch($switch__0) {
          // FALLTHROUGH
          case 0:
            $er_ = 4;
            break;
          // FALLTHROUGH
          case 1:
            $er_ = 2;
            break;
          }
        $n[1] = (int) ($n[1] + $er_);
        $es_ = (int) ($i__0 + 1);
        if ($em_ !== $i__0) {$i__0 = $es_;continue;}
        break;
      }
    }
    if ($n[1] === $caml_ml_bytes_length($s)) {return $copy($s);}
    $s__0 = $caml_create_bytes($n[1]);
    $n[1] = 0;
    $eo_ = (int) ($caml_ml_bytes_length($s) + -1);
    $en_ = 0;
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
              $switch__2 = 0;
            }
            else {
              switch($c) {
                // FALLTHROUGH
                case 8:
                  $caml_bytes_unsafe_set($s__0, $n[1], 92);
                  $n[1] += 1;
                  $caml_bytes_unsafe_set($s__0, $n[1], 98);
                  $switch__2 = 3;
                  break;
                // FALLTHROUGH
                case 9:
                  $caml_bytes_unsafe_set($s__0, $n[1], 92);
                  $n[1] += 1;
                  $caml_bytes_unsafe_set($s__0, $n[1], 116);
                  $switch__2 = 3;
                  break;
                // FALLTHROUGH
                case 10:
                  $caml_bytes_unsafe_set($s__0, $n[1], 92);
                  $n[1] += 1;
                  $caml_bytes_unsafe_set($s__0, $n[1], 110);
                  $switch__2 = 3;
                  break;
                // FALLTHROUGH
                case 13:
                  $caml_bytes_unsafe_set($s__0, $n[1], 92);
                  $n[1] += 1;
                  $caml_bytes_unsafe_set($s__0, $n[1], 114);
                  $switch__2 = 3;
                  break;
                // FALLTHROUGH
                default:
                  $switch__2 = 0;
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
        $ep_ = (int) ($i + 1);
        if ($eo_ !== $i) {$i = $ep_;continue;}
        break;
      }
    }
    return $s__0;
  };
  $bos = function(dynamic $ek_) {return $ek_;};
  $bts = function(dynamic $ej_) {return $ej_;};
  $ensure_ge = function(dynamic $x, dynamic $y) use ($d_,$invalid_arg) {
    return $y <= $x ? $x : ($invalid_arg($d_));
  };
  $sum_lengths = function(dynamic $acc, dynamic $seplen, dynamic $param) use ($caml_ml_string_length,$ensure_ge) {
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
  $unsafe_blits = function
  (dynamic $dst, dynamic $pos, dynamic $sep, dynamic $seplen, dynamic $param) use ($caml_blit_string,$caml_ml_string_length) {
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
          ((int) ($pos__0 + $caml_ml_string_length($eg_)) + $seplen);
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
  $concat = function(dynamic $sep, dynamic $l) use ($bts,$caml_create_bytes,$caml_ml_string_length,$e_,$sum_lengths,$unsafe_blits) {
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
  $escaped__0 = function(dynamic $s) use ($bos,$bts,$caml_bytes_unsafe_get,$caml_ml_string_length,$escaped,$unsigned_right_shift_32) {
    $needs_escape = function(dynamic $i) use ($caml_bytes_unsafe_get,$caml_ml_string_length,$s,$unsigned_right_shift_32) {
      $i__0 = $i;
      for (;;) {
        if ($caml_ml_string_length($s) <= $i__0) {return 0;}
        $match = $caml_bytes_unsafe_get($s, $i__0);
        if (32 <= $match) {
          $ee_ = (int) ($match + -34);
          if (58 < $unsigned_right_shift_32($ee_, 0)) {
            if (93 <= $ee_) {
              $switch__0 = 0;
              $switch__1 = 0;
            }
            else {$switch__1 = 1;}
          }
          else {
            if (56 < $unsigned_right_shift_32((int) ($ee_ + -1), 0)) {$switch__0 = 1;$switch__1 = 0;}
            else {$switch__1 = 1;}
          }
          if ($switch__1) {$i__1 = (int) ($i__0 + 1);$i__0 = $i__1;continue;}
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
  $index_rec = function(dynamic $s, dynamic $lim, dynamic $i, dynamic $c) use ($Not_found,$caml_bytes_unsafe_get,$caml_wrap_thrown_exception) {
    $i__0 = $i;
    for (;;) {
      if ($lim <= $i__0) {
        throw $caml_wrap_thrown_exception($Not_found) as \Throwable;
      }
      if ($caml_bytes_unsafe_get($s, $i__0) === $c) {return $i__0;}
      $i__1 = (int) ($i__0 + 1);
      $i__0 = $i__1;
      continue;
    }
  };
  $contains_from = function(dynamic $s, dynamic $i, dynamic $c) use ($Not_found,$caml_ml_string_length,$caml_wrap_thrown_exception_reraise,$f_,$index_rec,$invalid_arg,$runtime) {
    $l = $caml_ml_string_length($s);
    if (0 <= $i) {
      if (! ($l < $i)) {
        try {$index_rec($s, $l, $i, $c);$ec_ = 1;return $ec_;}
        catch(\Throwable $ed_) {
          $ed_ = $runtime["caml_wrap_exception"]($ed_);
          if ($ed_ === $Not_found) {return 0;}
          throw $caml_wrap_thrown_exception_reraise($ed_) as \Throwable;
        }
      }
    }
    return $invalid_arg($f_);
  };
  $contains = function(dynamic $s, dynamic $c) use ($contains_from) {
    return $contains_from($s, 0, $c);
  };
  
  $caml_fresh_oo_id(0);
  
  $caml_fresh_oo_id(0);
  
  $bits = function(dynamic $s) use ($caml_check_bound,$unsigned_right_shift_32) {
    $s[2] = (int) ((int) ($s[2] + 1) % 55);
    $d__ = $s[2];
    $curval = $caml_check_bound($s[1], $d__)[$d__ + 1];
    $ea_ = (int) ((int) ($s[2] + 24) % 55);
    $newval = (int)
    ($caml_check_bound($s[1], $ea_)[$ea_ + 1] +
       ($curval ^ (int) $unsigned_right_shift_32($curval, 25) & 31));
    $newval30 = $newval & 1073741823;
    $eb_ = $s[2];
    $caml_check_bound($s[1], $eb_)[$eb_ + 1] = $newval30;
    return $newval30;
  };
  $intaux = function(dynamic $s, dynamic $n) use ($bits,$runtime) {
    for (;;) {
      $r = $bits($s);
      $v = $runtime["caml_mod"]($r, $n);
      if ((int) ((int) (1073741823 - $n) + 1) < (int) ($r - $v)) {continue;}
      return $v;
    }
  };
  $int__0 = function(dynamic $s, dynamic $bound) use ($g_,$intaux,$invalid_arg) {
    if (! (1073741823 < $bound)) {
      if (0 < $bound) {return $intaux($s, $bound);}
    }
    return $invalid_arg($g_);
  };
  $default__0 = Vector{0, $h_->toVector(), 0};
  $int__1 = function(dynamic $bound) use ($default__0,$int__0) {
    return $int__0($default__0, $bound);
  };
  $i_ = 5;
  $detectList = function(dynamic $maxLength, dynamic $o) use ($caml_obj_tag,$runtime) {
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
            $maxLength__1 = (int) ($maxLength__0 + -1);
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
  $extractList->contents = function(dynamic $maxNum, dynamic $o) use ($extractList,$is_int,$j_) {
    if (0 === $maxNum) {return Vector{0, 1 - $is_int($o), 0};}
    if ($is_int($o)) {return $j_;}
    $match = $extractList->contents((int) ($maxNum + -1), $o[2]);
    $rest = $match[2];
    $restWasTruncated = $match[1];
    return Vector{0, $restWasTruncated, Vector{0, $o[1], $rest}};
  };
  $extractFields = function(dynamic $maxNum, dynamic $o) {
    $extractFields = function
    (dynamic $maxNum, dynamic $fieldsSoFar, dynamic $numFields) use ($o) {
      $maxNum__0 = $maxNum;
      $fieldsSoFar__0 = $fieldsSoFar;
      $numFields__0 = $numFields;
      for (;;) {
        if (0 === $maxNum__0) {
          return Vector{0, 0 < $numFields__0 ? 1 : (0), $fieldsSoFar__0};
        }
        if (0 === $numFields__0) {return Vector{0, 0, $fieldsSoFar__0};}
        $numFields__1 = (int) ($numFields__0 + -1);
        $fieldsSoFar__1 = Vector{
          0,
          $o[(int) ($numFields__0 + -1) + 1],
          $fieldsSoFar__0
        };
        $maxNum__1 = (int) ($maxNum__0 + -1);
        $maxNum__0 = $maxNum__1;
        $fieldsSoFar__0 = $fieldsSoFar__1;
        $numFields__0 = $numFields__1;
        continue;
      }
    };
    return $extractFields($maxNum, 0, $o->count() - 1);
  };
  $getBreakData = function(dynamic $itms) use ($caml_ml_string_length,$contains,$fold_left,$k_) {
    $match = $fold_left(
      function(dynamic $param, dynamic $itm) use ($caml_ml_string_length,$contains) {
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
  $indentForDepth->contents = function(dynamic $n) use ($indentForDepth,$l_,$m_,$n_,$o_,$p_,$q_,$r_,$s_,$symbol,$t_,$u_,$unsigned_right_shift_32) {
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
  $printTreeShape = function
  (dynamic $pair, dynamic $self, dynamic $depth, dynamic $o) use ($A_,$B_,$C_,$call1,$call3,$caml_ml_string_length,$concat,$extractFields,$getBreakData,$i_,$indentForDepth,$map,$symbol,$v_,$w_,$x_,$y_,$z_) {
    $right = $pair[2];
    $left = $pair[1];
    $match = $extractFields($i_, $o);
    $lst = $match[2];
    $wasTruncated = $match[1];
    $dNext = (int) (1 + $depth);
    $indent = $indentForDepth->contents($depth);
    $indentNext = $indentForDepth->contents($dNext);
    $itms = $map->contents(
      function(dynamic $o) use ($call3,$dNext,$self) {
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
  $printListShape = function(dynamic $self, dynamic $depth, dynamic $o) use ($D_,$E_,$F_,$G_,$H_,$I_,$J_,$K_,$L_,$M_,$N_,$O_,$call1,$call3,$caml_ml_string_length,$concat,$extractList,$getBreakData,$i_,$indentForDepth,$map,$symbol) {
    $match = $extractList->contents($i_, $o);
    $lst = $match[2];
    $wasTruncated = $match[1];
    $dNext = (int) (1 + $depth);
    $indent = $indentForDepth->contents($depth);
    $indentNext = $indentForDepth->contents($dNext);
    $itms = $map->contents(
      function(dynamic $o) use ($call3,$dNext,$self) {
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
  $P_ = function(dynamic $self, dynamic $opt, dynamic $o) use ($call1,$call2,$call3,$caml_obj_tag,$detectList,$i_) {
    if ($opt) {
      $sth = $opt[1];
      $depth = $sth;
    }
    else {$depth = 0;}
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
  $Q_ = function(dynamic $self, dynamic $opt, dynamic $o) use ($printListShape) {
    if ($opt) {
      $sth = $opt[1];
      $depth = $sth;
    }
    else {$depth = 0;}
    return $printListShape($self, $depth, $o);
  };
  $R_ = function(dynamic $self, dynamic $opt, dynamic $o) use ($S_,$printTreeShape) {
    if ($opt) {
      $sth = $opt[1];
      $depth = $sth;
    }
    else {$depth = 0;}
    return $printTreeShape($S_, $self, $depth, $o);
  };
  $T_ = function(dynamic $self, dynamic $f) use ($U_,$V_,$string_of_int,$symbol) {
    return $symbol($V_, $symbol($string_of_int((int) $f), $U_));
  };
  $W_ = function(dynamic $self, dynamic $opt, dynamic $o) use ($X_,$printTreeShape) {
    if ($opt) {
      $sth = $opt[1];
      $depth = $sth;
    }
    else {$depth = 0;}
    return $printTreeShape($X_, $self, $depth, $o);
  };
  $Y_ = function(dynamic $self, dynamic $o) use ($Z_) {return $Z_;};
  $aa_ = function(dynamic $self, dynamic $o) use ($ab_) {return $ab_;};
  $ac_ = function(dynamic $self) use ($ad_) {return $ad_;};
  $ae_ = function(dynamic $self) use ($af_) {return $af_;};
  $ag_ = function(dynamic $self, dynamic $f) use ($string_of_float) {
    return $string_of_float($f);
  };
  $ah_ = function(dynamic $self, dynamic $s) use ($ai_,$aj_,$call2,$symbol) {
    return $symbol($aj_, $symbol($call2($self[2], $self, $s), $ai_));
  };
  $ak_ = function(dynamic $self, dynamic $s) {return $s;};
  $base = Vector{
    0,
    function(dynamic $self, dynamic $i) use ($string_of_int) {
      return $string_of_int($i);
    },
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
  };
  $makeStandardChannelsConsole = function(dynamic $objectPrinter) use ($al_,$am_,$an_,$ao_,$call3,$runtime,$symbol) {
    $dZ_ = function(dynamic $a) use ($al_,$call3,$objectPrinter,$runtime,$symbol) {
      return $runtime["native_debug"](
        $symbol($call3($objectPrinter[13], $objectPrinter, 0, $a), $al_)
      );
    };
    $d0_ = function(dynamic $a) use ($am_,$call3,$objectPrinter,$runtime,$symbol) {
      return $runtime["native_error"](
        $symbol($call3($objectPrinter[13], $objectPrinter, 0, $a), $am_)
      );
    };
    $d1_ = function(dynamic $a) use ($an_,$call3,$objectPrinter,$runtime,$symbol) {
      return $runtime["native_warn"](
        $symbol($call3($objectPrinter[13], $objectPrinter, 0, $a), $an_)
      );
    };
    $d2_ = function(dynamic $a) use ($call3,$objectPrinter,$runtime) {
      return $runtime["native_log"](
        $call3($objectPrinter[13], $objectPrinter, 0, $a)
      );
    };
    return Vector{
      0,
      function(dynamic $a) use ($ao_,$call3,$objectPrinter,$runtime,$symbol) {
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
  $log = function(dynamic $a) use ($call1,$defaultGlobalConsole) {
    return $call1($defaultGlobalConsole[1], $a);
  };
  $mapi3 = function
  (dynamic $f, dynamic $iSoFar, dynamic $revSoFar, dynamic $listA, dynamic $listB, dynamic $listC) use ($Invalid_argument,$ap_,$call4,$caml_wrap_thrown_exception,$rev) {
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
            };
            $iSoFar__1 = (int) ($iSoFar__0 + 1);
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
  $mapi3__0 = function
  (dynamic $f, dynamic $listA, dynamic $listB, dynamic $listC) use ($mapi3) {
    return $mapi3($f, 0, 0, $listA, $listB, $listC);
  };
  $splitList = function
  (dynamic $revCount, dynamic $revSoFar, dynamic $splitAt, dynamic $lst) use ($Invalid_argument,$aq_,$caml_wrap_thrown_exception,$rev,$string_of_int,$symbol) {
    $revCount__0 = $revCount;
    $revSoFar__0 = $revSoFar;
    $lst__0 = $lst;
    for (;;) {
      if ($lst__0) {
        $tl = $lst__0[2];
        $hd = $lst__0[1];
        $match = $revCount__0 === $splitAt ? 1 : (0);
        if (0 === $match) {
          $revSoFar__1 = Vector{0, $hd, $revSoFar__0};
          $revCount__1 = (int) ($revCount__0 + 1);
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
  $splitList__0 = function(dynamic $splitAt, dynamic $lst) use ($splitList) {
    return $splitList(0, 0, $splitAt, $lst);
  };
  $nonReducer = function(dynamic $param, dynamic $dY_) use ($ar_) {return $ar_;
  };
  $nonEventHandler = function(dynamic $e) {return 0;};
  $spec = function(dynamic $param) use ($nonEventHandler) {
    if (0 === $param[0]) {
      $reducer = $param[3];
      $subelems = $param[2];
      $state = $param[1];
      return Vector{0, $state, $reducer, $nonEventHandler, $subelems};
    }
    $spec = $param[1];
    return $spec;
  };
  $withState = function(dynamic $inst, dynamic $state) {
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
  $newSelf = function(dynamic $replacer, dynamic $subreplacer) use ($call1,$call2,$caml_update_dummy,$reconcile,$withState) {
    $self = varray[];
    $dR_ = function(dynamic $extractor, dynamic $e, dynamic $inst) use ($call1,$call2,$reconcile,$withState) {
      $dV_ = $call1($extractor, $e);
      $nextState = $call2($inst[5][2], $inst, $dV_);
      $dW_ = $inst[4];
      return $reconcile->contents($withState($inst, $nextState), $dW_);
    };
    $dS_ = function(dynamic $action) use ($call1,$call2,$reconcile,$replacer,$withState) {
      return $call1(
        $replacer,
        function(dynamic $inst) use ($action,$call2,$reconcile,$withState) {
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
        function(dynamic $actionExtractor, dynamic $ev) use ($call1,$call2,$reconcile,$replacer,$withState) {
          $action = $call1($actionExtractor, $ev);
          return $call1(
            $replacer,
            function(dynamic $inst) use ($action,$call2,$reconcile,$withState) {
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
  $init = function(dynamic $replacer, dynamic $renderable) use ($call1,$call2,$initSubtree,$newSelf,$spec) {
    $subreplacer = function(dynamic $subtreeSwapper) use ($call1,$replacer) {
      return $call1(
        $replacer,
        function(dynamic $inst) use ($call1,$subtreeSwapper) {
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
  $initSubtree->contents = function(dynamic $thisReplacer, dynamic $jsx) use ($call1,$flatten,$init,$initSubtree,$is_int,$mapi,$splitList__0) {
    if ($is_int($jsx)) {return 0;}
    else {
      switch($jsx[0]) {
        // FALLTHROUGH
        case 0:
          $renderable = $jsx[1];
          $nextReplacer = function(dynamic $instSwapper) use ($call1,$thisReplacer) {
            return $call1(
              $thisReplacer,
              function(dynamic $subtree) use ($call1,$instSwapper) {
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
          $nextReplacerA = function(dynamic $aSwapper) use ($call1,$thisReplacer) {
            return $call1(
              $thisReplacer,
              function(dynamic $subtree) use ($aSwapper,$call1) {
                $b = $subtree[2];
                $a = $subtree[1];
                $next = $call1($aSwapper, $a);
                $match = $next === $a ? 1 : (0);
                return 0 === $match ? Vector{1, $next, $b} : ($subtree);
              }
            );
          };
          $nextReplacerB = function(dynamic $bSwapper) use ($call1,$thisReplacer) {
            return $call1(
              $thisReplacer,
              function(dynamic $subtree) use ($bSwapper,$call1) {
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
          $initElem = function(dynamic $i, dynamic $e) use ($call1,$flatten,$initSubtree,$splitList__0,$thisReplacer) {
            $subreplacer = function(dynamic $swapper) use ($call1,$flatten,$i,$splitList__0,$thisReplacer) {
              return $call1(
                $thisReplacer,
                function(dynamic $subtree) use ($call1,$flatten,$i,$splitList__0,$swapper) {
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
  $reconcile->contents = function(dynamic $inst, dynamic $renderable) use ($call2,$reconcileSubtree,$spec) {
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
  $reconcileSubtree->contents = function
  (dynamic $subtree, dynamic $prevJsx, dynamic $match) use ($is_int,$mapi3__0,$reconcile,$reconcileSubtree) {
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
            function(dynamic $i, dynamic $itm, dynamic $r, dynamic $rPrev) use ($reconcileSubtree) {
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
  $control = function(dynamic $param, dynamic $controlledState) use ($call2) {
    $renderable = $param[1];
    return Vector{
      0,
      function(dynamic $state, dynamic $self) use ($call2,$controlledState,$renderable) {
        return $call2($renderable, Vector{0, $controlledState}, $self);
      }
    };
  };
  $create = function(dynamic $param) use ($Invalid_argument,$as_,$call1,$caml_update_dummy,$caml_wrap_thrown_exception) {
    $root = varray[];
    $dM_ = 0;
    $caml_update_dummy(
      $root,
      Vector{
        0,
        function(dynamic $swapper) use ($Invalid_argument,$as_,$call1,$caml_wrap_thrown_exception,$root) {
          $dN_ = $root[2];
          if ($dN_) {
            $ei = $dN_[1];
            $curInst = $ei[2];
            $curElems = $ei[1];
            $nextEi = Vector{0, $curElems, $call1($swapper, $curInst)};
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
  $render = function(dynamic $root, dynamic $elems) use ($initSubtree,$reconcileSubtree) {
    $dL_ = $root[2];
    if ($dL_) {
      $ei = $dL_[1];
      $curSubtree = $ei[2];
      $curElems = $ei[1];
      $nextEi = Vector{
        0,
        $elems,
        $reconcileSubtree->contents($curSubtree, $curElems, $elems)
      };
      $root[2] = Vector{0, $nextEi};
      return 0;
    }
    $nextEi__0 = Vector{0, $elems, $initSubtree->contents($root[1], $elems)};
    $root[2] = Vector{0, $nextEi__0};
    return 0;
  };
  $counter = Vector{0, 0};
  $subscribers = Vector{0, 0};
  $request = function(dynamic $cb) use ($counter,$subscribers) {
    $subscribers[1] = Vector{0, $cb, $subscribers[1]};
    $counter[1] = (int) ($counter[1] + 1);
    return $counter[1];
  };
  $tick = function(dynamic $param) use ($call1,$iter,$subscribers) {
    $prevSubscribers = $subscribers[1];
    $subscribers[1] = 0;
    return $iter(
      function(dynamic $cb) use ($call1) {return $call1($cb, 0);},
      $prevSubscribers
    );
  };
  $clearAll = function(dynamic $param) use ($subscribers) {
    $subscribers[1] = 0;
    return 0;
  };
  $element = function(dynamic $x) {return $x;};
  $suppress = Vector{0, 0};
  $printInstanceCollection->contents = function
  (dynamic $opt, dynamic $subtree) use ($aA_,$aB_,$aC_,$aD_,$aE_,$aF_,$aG_,$aH_,$aI_,$aJ_,$at_,$au_,$av_,$aw_,$ax_,$ay_,$az_,$concat,$is_int,$map,$printInstanceCollection,$symbol) {
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
          $dJ_ = Vector{0, $symbol($aG_, $s)};
          return $symbol(
            $aI_,
            $symbol(
              $concat(
                $aH_,
                $map->contents(
                  function(dynamic $dK_) use ($dJ_,$printInstanceCollection) {
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
  $at_->contents = function(dynamic $opt, dynamic $n) use ($aK_,$aL_,$aM_,$aN_,$aO_,$aP_,$aQ_,$aR_,$aS_,$aT_,$aU_,$caml_obj_tag,$escaped__0,$is_int,$printInstanceCollection,$string_of_int,$symbol) {
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
  $printSection = function(dynamic $s) use ($aV_,$log,$suppress,$symbol) {
    return $suppress[1] ? 0 : ($log($symbol($aV_, $s)));
  };
  $printRoot = function(dynamic $title, dynamic $root) use ($a0_,$aW_,$aX_,$aY_,$aZ_,$log,$printInstanceCollection,$suppress,$symbol) {
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
  $domEventHandler = function(dynamic $e) {return 0;};
  $domStateToString = function(dynamic $state) {return $state;};
  $render__0 = function
  (dynamic $onClick, dynamic $opt, dynamic $children, dynamic $state, dynamic $self) use ($a1_,$domEventHandler) {
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
        function(dynamic $inst, dynamic $param) {$str = $param[1];return $str;
        },
        $domEventHandler,
        $children
      }
    };
  };
  $render__1 = function
  (dynamic $opt, dynamic $size, dynamic $children, dynamic $dx_, dynamic $self) use ($a2_,$a3_,$element,$nonReducer,$render__0) {
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
    $dy_ = 0;
    $dz_ = 0;
    return Vector{
      0,
      $state,
      $element(
        Vector{
          0,
          function(dynamic $dA_, dynamic $dB_) use ($a2_,$dy_,$dz_,$render__0) {
            return $render__0($dz_, $a2_, $dy_, $dA_, $dB_);
          }
        }
      ),
      $nonReducer
    };
  };
  $render__2 = function
  (dynamic $opt, dynamic $children, dynamic $dt_, dynamic $self) use ($a4_,$a5_,$element,$nonReducer,$render__0) {
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
    $du_ = 0;
    return Vector{
      0,
      $state,
      $element(
        Vector{
          0,
          function(dynamic $dv_, dynamic $dw_) use ($a4_,$children,$du_,$render__0) {
            return $render__0($du_, $a4_, $children, $dv_, $dw_);
          }
        }
      ),
      $nonReducer
    };
  };
  $render__3 = function
  (dynamic $opt, dynamic $size, dynamic $children, dynamic $dh_, dynamic $self) use ($a6_,$a7_,$element,$render__0,$render__1,$string_of_int,$symbol) {
    ;
    if ($dh_) {
      $sth = $dh_[1];
      $state = $sth;
    }
    else {$state = Vector{0, $size, 0};}
    $curChangeCount = $state[2];
    $curSize = $state[1];
    $match = $curSize !== $size ? 1 : (0);
    $nextChangeCount = 0 === $match
      ? $curChangeCount
      : ((int) ($curChangeCount + 1));
    $di_ = function(dynamic $param, dynamic $ds_) use ($state) {return $state;
    };
    $dj_ = 0;
    $dk_ = Vector{0, $symbol($a6_, $string_of_int($nextChangeCount))};
    $dl_ = 0;
    $dm_ = $element(
      Vector{
        0,
        function(dynamic $dq_, dynamic $dr_) use ($dj_,$dk_,$dl_,$render__0) {
          return $render__0($dl_, $dk_, $dj_, $dq_, $dr_);
        }
      }
    );
    $dn_ = 0;
    return Vector{
      0,
      Vector{0, $size, $nextChangeCount},
      Vector{
        1,
        $element(
          Vector{
            0,
            function(dynamic $do_, dynamic $dp_) use ($a7_,$children,$dn_,$render__1) {
              return $render__1($a7_, $dn_, $children, $do_, $dp_);
            }
          }
        ),
        $dm_
      },
      $di_
    };
  };
  $render__4 = function
  (dynamic $opt, dynamic $children, dynamic $da_, dynamic $self) use ($a8_,$a9_,$element,$render__0) {
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
    $db_ = function(dynamic $param, dynamic $dg_) use ($state) {return $state;
    };
    $dc_ = 0;
    $dd_ = 0;
    return Vector{
      0,
      $state,
      $element(
        Vector{
          0,
          function(dynamic $de_, dynamic $df_) use ($a8_,$dc_,$dd_,$render__0) {
            return $render__0($dd_, $a8_, $dc_, $de_, $df_);
          }
        }
      ),
      $db_
    };
  };
  $render__5 = function(dynamic $children, dynamic $opt, dynamic $self) use ($a__,$ba_,$print_string,$render__0,$runtime,$string_of_int,$symbol) {
    if ($opt) {
      $sth = $opt[1];
      $state = $sth;
    }
    else {$state = 0;}
    $c4_ = function(dynamic $param, dynamic $c__) use ($runtime) {
      $next = $c__[1];
      return $runtime["caml_int_of_string"]($next);
    };
    $c5_ = 0;
    $c6_ = Vector{0, $symbol($a__, $string_of_int($state))};
    $c7_ = Vector{
      0,
      function(dynamic $e) use ($ba_,$print_string) {
        return $print_string($ba_);
      }
    };
    return Vector{
      0,
      $state,
      Vector{
        0,
        function(dynamic $c8_, dynamic $c9_) use ($c5_,$c6_,$c7_,$render__0) {
          return $render__0($c7_, $c6_, $c5_, $c8_, $c9_);
        }
      },
      $c4_
    };
  };
  $render__6 = function
  (dynamic $shouldControlInput, dynamic $children, dynamic $opt, dynamic $self) use ($bb_,$bc_,$bd_,$be_,$control,$element,$nonReducer,$render__0,$render__4,$render__5) {
    if ($opt) {
      $sth = $opt[1];
      $state = $sth;
    }
    else {$state = $be_;}
    $cU_ = 0;
    $input = $element(
      Vector{
        0,
        function(dynamic $c2_, dynamic $c3_) use ($bb_,$cU_,$render__4) {
          return $render__4($bb_, $cU_, $c2_, $c3_);
        }
      }
    );
    $input__0 = 0 === $shouldControlInput ? $input : ($control($input, $bd_));
    $cV_ = 0;
    $cW_ = $element(
      Vector{
        0,
        function(dynamic $c0_, dynamic $c1_) use ($cV_,$render__5) {
          return $render__5($cV_, $c0_, $c1_);
        }
      }
    );
    $cX_ = 0;
    return Vector{
      0,
      $state,
      Vector{
        1,
        $element(
          Vector{
            0,
            function(dynamic $cY_, dynamic $cZ_) use ($bc_,$cX_,$input__0,$render__0) {
              return $render__0($cX_, $bc_, $input__0, $cY_, $cZ_);
            }
          }
        ),
        $cW_
      },
      $nonReducer
    };
  };
  $render__7 = function
  (dynamic $anyProp, dynamic $size, dynamic $children, dynamic $opt, dynamic $self) use ($render__0) {
    if ($opt) {
      $sth = $opt[1];
      $state = $sth;
    }
    else {$state = Vector{0, $anyProp, $anyProp};}
    $cO_ = function(dynamic $param, dynamic $action) use ($state) {return $state;
    };
    $cP_ = 0;
    $cQ_ = Vector{0, $size};
    $cR_ = 0;
    return Vector{
      0,
      $state,
      Vector{
        0,
        function(dynamic $cS_, dynamic $cT_) use ($cP_,$cQ_,$cR_,$render__0) {
          return $render__0($cR_, $cQ_, $cP_, $cS_, $cT_);
        }
      },
      $cO_
    };
  };
  $symbol__0 = function(dynamic $x, dynamic $getDefault) use ($call1) {
    if ($x) {$x__0 = $x[1];return $x__0;}
    return $call1($getDefault, 0);
  };
  $onRaf = function(dynamic $e) use ($bf_) {return $bf_;};
  $initialStateGetter = function(dynamic $self, dynamic $param) use ($bg_,$call1,$onRaf,$request) {
    $request($call1($self[1], $onRaf));
    return $bg_;
  };
  $render__8 = function
  (dynamic $opt, dynamic $param, dynamic $state, dynamic $self) use ($bh_,$bi_,$bj_,$bk_,$bl_,$call1,$domStateToString,$element,$initialStateGetter,$int__1,$onRaf,$render__0,$request,$string_of_int,$symbol,$symbol__0) {
    ;
    $state__0 = $symbol__0(
      $state,
      function(dynamic $cN_) use ($initialStateGetter,$self) {
        return $initialStateGetter($self, $cN_);
      }
    );
    $cy_ = function(dynamic $inst, dynamic $action) use ($bh_,$bi_,$call1,$domStateToString,$onRaf,$request,$self,$state__0,$symbol) {
      $match = $inst[6][2][1][6];
      $deepestDiv = $match[1];
      $divStateStr = $domStateToString($deepestDiv[5][1]);
      $request($call1($self[1], $onRaf));
      return $symbol($state__0, $symbol($bi_, $symbol($divStateStr, $bh_)));
    };
    $cz_ = 0;
    $cA_ = Vector{0, $symbol($bj_, $string_of_int($int__1(10)))};
    $cB_ = 0;
    $cC_ = $element(
      Vector{
        0,
        function(dynamic $cL_, dynamic $cM_) use ($cA_,$cB_,$cz_,$render__0) {
          return $render__0($cB_, $cA_, $cz_, $cL_, $cM_);
        }
      }
    );
    $cD_ = 0;
    $cE_ = $element(
      Vector{
        0,
        function(dynamic $cJ_, dynamic $cK_) use ($bk_,$cC_,$cD_,$render__0) {
          return $render__0($cD_, $bk_, $cC_, $cJ_, $cK_);
        }
      }
    );
    $cF_ = 0;
    $cG_ = 0;
    return Vector{
      0,
      $state__0,
      Vector{
        1,
        $element(
          Vector{
            0,
            function(dynamic $cH_, dynamic $cI_) use ($bl_,$cF_,$cG_,$render__0) {
              return $render__0($cG_, $bl_, $cF_, $cH_, $cI_);
            }
          }
        ),
        $cE_
      },
      $cy_
    };
  };
  $render__9 = function(dynamic $opt, dynamic $children) use ($bm_,$render__0) {
    if ($opt) {
      $sth = $opt[1];
      $txt = $sth;
    }
    else {$txt = $bm_;}
    $ct_ = 0;
    $cu_ = Vector{0, $txt};
    $cv_ = 0;
    return function(dynamic $cw_, dynamic $cx_) use ($ct_,$cu_,$cv_,$render__0) {
      return $render__0($cv_, $cu_, $ct_, $cw_, $cx_);
    };
  };
  
  $log($bn_);
  
  $startSeconds = $caml_sys_time(0);
  
  $suppress[1] = 0;
  
  $i = 0;
  
  for (;;) {
    $continue_label = null;
    $stateless = $element(Vector{0, $render__9($bq_, 0)});
    $printSection($br_);
    $containerRoot = $create(0);
    $j = 0;
    for (;;) {
      $bZ_ = $element(Vector{0, $render__9($bY_, 0)});
      $render(
        $containerRoot,
        $element(
          Vector{
            0,
            (function(dynamic $cq_) use ($b0_,$render__2) {
               return function(dynamic $cr_, dynamic $cs_) use ($b0_,$cq_,$render__2) {
                 return $render__2($b0_, $cq_, $cr_, $cs_);
               };
             })($bZ_)
          }
        )
      );
      $b1_ = (int) ($j + 1);
      if (10 !== $j) {$j = $b1_;continue;}
      $printSection($bs_);
      $counterRoot = $create(0);
      $bt_ = 0;
      $render(
        $counterRoot,
        $element(
          Vector{
            0,
            (function(dynamic $stateless, dynamic $cn_) use ($bu_,$render__3) {
               return function(dynamic $co_, dynamic $cp_) use ($bu_,$cn_,$render__3,$stateless) {
                 return $render__3($bu_, $cn_, $stateless, $co_, $cp_);
               };
             })($stateless, $bt_)
          }
        )
      );
      $printRoot($bv_, $counterRoot);
      $bw_ = 0;
      $render(
        $counterRoot,
        $element(
          Vector{
            0,
            (function(dynamic $stateless, dynamic $ck_) use ($bx_,$render__3) {
               return function(dynamic $cl_, dynamic $cm_) use ($bx_,$ck_,$render__3,$stateless) {
                 return $render__3($bx_, $ck_, $stateless, $cl_, $cm_);
               };
             })($stateless, $bw_)
          }
        )
      );
      $printRoot($by_, $counterRoot);
      $bz_ = 8;
      $render(
        $counterRoot,
        $element(
          Vector{
            0,
            (function(dynamic $stateless, dynamic $ch_) use ($bA_,$render__3) {
               return function(dynamic $ci_, dynamic $cj_) use ($bA_,$ch_,$render__3,$stateless) {
                 return $render__3($bA_, $ch_, $stateless, $ci_, $cj_);
               };
             })($stateless, $bz_)
          }
        )
      );
      $printRoot($bB_, $counterRoot);
      $printSection($bC_);
      $appRoot = $create(0);
      $bD_ = 0;
      $render(
        $appRoot,
        $element(
          Vector{
            0,
            (function(dynamic $stateless, dynamic $ce_) use ($render__6) {
               return function(dynamic $cf_, dynamic $cg_) use ($ce_,$render__6,$stateless) {
                 return $render__6($ce_, $stateless, $cf_, $cg_);
               };
             })($stateless, $bD_)
          }
        )
      );
      $printRoot($bE_, $appRoot);
      $bF_ = 0;
      $bG_ = 1;
      $render(
        $appRoot,
        $element(
          Vector{
            0,
            (function(dynamic $ca_, dynamic $cb_) use ($render__6) {
               return function(dynamic $cc_, dynamic $cd_) use ($ca_,$cb_,$render__6) {
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
            function(dynamic $b9_, dynamic $b__) use ($bJ_,$bK_,$render__8) {
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
      $bP_ = 0;
      $render(
        $polyRoot,
        $element(
          Vector{
            0,
            (function(dynamic $b6_) use ($bQ_,$bR_,$render__7) {
               return function(dynamic $b7_, dynamic $b8_) use ($b6_,$bQ_,$bR_,$render__7) {
                 return $render__7($bR_, $bQ_, $b6_, $b7_, $b8_);
               };
             })($bP_)
          }
        )
      );
      $printRoot($bS_, $polyRoot);
      $anotherPolyRoot = $create(0);
      $bT_ = 0;
      $bV_ = 0;
      $render(
        $anotherPolyRoot,
        $element(
          Vector{
            0,
            (function(dynamic $b2_, dynamic $b3_) use ($bU_,$render__7) {
               return function(dynamic $b4_, dynamic $b5_) use ($b2_,$b3_,$bU_,$render__7) {
                 return $render__7($b3_, $bU_, $b2_, $b4_, $b5_);
               };
             })($bT_, $bV_)
          }
        )
      );
      $printRoot($bW_, $anotherPolyRoot);
      $bX_ = (int) ($i + 1);
      if (0 !== $i) {$i = $bX_;$continue_label = "a";break;}
      $endSeconds = $caml_sys_time(0);
      $log(
        $symbol(
          $bo_,
          $string_of_int((int) (($endSeconds - $startSeconds) * 1000))
        )
      );
      $f = $runtime["caml_alloc_dummy_function"](1, 2);
      $z = varray[];
      $caml_update_dummy($f, function(dynamic $x, dynamic $y) {return 1;});
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
