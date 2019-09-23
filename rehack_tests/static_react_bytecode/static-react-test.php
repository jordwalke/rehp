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

  

  
  
$ArrayLiteral=$joo_global_object->ArrayLiteral;
  
  
  
  
$Func=$joo_global_object->Func;
  
  
  
  
    $caml_alloc_dummy_function = $Func(
      function($size, $arity) use (
        $ArrayLiteral,
        $Func,
        $joo_global_object
      ) {
        print("WARNING: caml_alloc_dummy_function is not yet tested");
        $f = new Ref();
        $f->contents = $Func(
          function() use ($ArrayLiteral, $f, $joo_global_object) {
            return $f->contents
              ->fun
              ->apply(
                $joo_global_object->context,
                $ArrayLiteral(\func_get_args())
              );
          }
        );
        $f->contents->length = $arity;
        return $f->contents;
      }
    );
  
  
  
  
$caml_arity_test = function($f) {
  $php_f = ($f instanceof Func) ? $f->fun : $f;
  if (is_object($php_f) && ($php_f instanceof \Closure)) {
    return (new \ReflectionFunction($php_f))->getNumberOfRequiredParameters();
  } else {
    throw new \ErrorException("Passed non closure to rehack_arity");
  }
};
  
  
  
  
  $caml_call_gen=function(
    (function(mixed...): mixed) $f,
    varray<mixed> $args,
  ): mixed
  use($raw_array_sub, $caml_arity_test) {
    $n = caml_arity_test($f);
    $argsLen = C\count($args);
    $d = $n - $argsLen;

    if ($d === 0) {
      return $f(...$args);
    } else if ($d < 0) {
      return $caml_call_gen(
        /* HH_IGNORE_ERROR[4110] $f must return a function here */
        $f(...$raw_array_sub($args, 0, $n)),
        $raw_array_sub($args, $n, $argsLen - $n),
      );
    } else {
      return function(mixed $x) use ($f, $args) {
        $args[] = $x;
        return $caml_call_gen($f, $args);
      };
    }
  }
  
  
  
  
  $caml_call1=function((function(mixed...): mixed) $f, dynamic $a1): dynamic
  use($caml_arity_test, $caml_call_gen) {
    return $caml_arity_test($f) === 1 ? $f($a1) : $caml_call_gen($f, varray[$a1]);
  }
  
  
  
  
  $caml_call2=function(
   (function(mixed...): mixed) $f,
   dynamic $a1,
   dynamic $a2,
 ): dynamic
  use($caml_arity_test, $caml_call_gen) {
   return $caml_arity_test($f) === 2
     ? $f($a1, $a2)
     : $caml_call_gen($f, varray[$a1, $a2]);
 }
  
  
  
  
 $caml_call3=function(
   (function(mixed...): mixed) $f,
   dynamic $a1,
   dynamic $a2,
   dynamic $a3,
 ): dynamic
  use($caml_arity_test, $caml_call_gen) {
   return $caml_arity_test($f) === 3
     ? $f($a1, $a2, $a3)
     : $caml_call_gen($f, varray[$a1, $a2, $a3]);
 }
  
  
  
  
 $caml_call4=function(
   (function(mixed...): mixed) $f,
   dynamic $a1,
   dynamic $a2,
   dynamic $a3,
   dynamic $a4,
 ): dynamic
  use($caml_arity_test, $caml_call_gen) {
   return $caml_arity_test($f) === 4
     ? $f($a1, $a2, $a3, $a4)
     : $caml_call_gen($f, varray[$a1, $a2, $a3, $a4]);
 }
  
  
  
  
$String = $joo_global_object->String;
  
  
  
  
$caml_wrap_thrown_exception = function($e) use($String, $caml_global_data) {
  if ($e instanceof RehpExceptionBox) {
    return $e;
  }
  // Check for __isArrayLike because some exceptions are manually constructed in stubs
  if ($e instanceof R || $e instanceof V || isset($e->__isArrayLike)) {
    return new RehpExceptionBox($e);
  }
  // Stack overflows cannot be caught reliably in PHP it seems. Cannot easily
  // map it to Stack_overflow.

  // Wrap Error in Js.Error exception
  if($e instanceof \Exception) { // && $caml_named_value("phpError"))
    // return [0,caml_named_value("phpError"),e];
    return new RehpExceptionBox(R(0, $String->new("phpError"), $e), $e->getCode(), $e);
  }
  //fallback: wrapped in Failure
  // Again, with proper stubs this will refer to the actual Failure - always
  // kept in sync.
  return new RehpExceptionBox(R(0, $caml_global_data->Failure, $e));
};
  
  
  
  
  $NaN=\NAN;
  
  
  
  
  $is_in = function($key, $val) {
   return isset($val[$key]);
  };
  
  
  
  
  $isFinite = function($value) {
   $value = to_number($value);
   return !($value === \INF || $value === -\INF || PHP\is_nan($value));
  };
  
  
  
  
  $isNaN = function($value) {
   return PHP\is_nan(to_number($value));
  };
  
  
  
  
  $caml_update_dummy = function($x, $y) {
    if(PHP\is_callable($y)) {
      $x->fun = $y;
      return 0;
    }
    if(isset($y->fun)) {
      $x->fun = $y->fun;
      return 0;
    }
    $i = $y->length;
    while ($i--) $x[$i] = $y[$i];
    return 0;
  };
  
  
  
  
$caml_wrap_exception = function($e) use($String, $caml_global_data) {
  if ($e instanceof RehpExceptionBox) {
    return $e->contents;
  }
  // Check for __isArrayLike because some exceptions are manually constructed in stubs
  if ($e instanceof R || $e instanceof V || isset($e->__isArrayLike)) {
    return $e;
  }
  // Stack overflows cannot be caught reliably in PHP it seems. Cannot easily
  // map it to Stack_overflow.
  // Wrap Error in Js.Error exception
  if($e instanceof \Throwable) { // && $caml_named_value("phpError"))
    // return [0,caml_named_value("phpError"),e];
    return R(0, $String->new("phpError"), $e);
  }
  //fallback: wrapped in Failure
  // Again, with proper stubs this will refer to the actual Failure - always
  // kept in sync.
  return R(0, $caml_global_data->Failure, $e);
};
  
  
  
  
$caml_wrap_thrown_exception_reraise = $caml_wrap_thrown_exception;
  
  
  
  
  $is_int=$joo_global_object->is_int;
  
  
  
  
    $unsigned_right_shift_32 = function(int $a, int $b): int {
      if ($b >= 32 || $b < -32) {
        $m = (int)($b / 32);
        $b = $b - ($m * 32);
      }
      if ($b < 0) {
        $b = 32 + $b;
      }
      if ($b === 0) {
        return (($a >> 1) & 0x7fffffff) * 2 + (($a >> $b) & 1);
      }
      if ($a < 0) {
        $a = ($a >> 1);
        $a &= 2147483647;
        $a |= 0x40000000;
        $a = ($a >> ($b - 1));
      } else {
        $a = ($a >> $b);
      }
      return $a;
    };
  
  
  $append = new Ref();
  $at = new Ref();
  $c = new Ref();
  $extractList = new Ref();
  $flatten = new Ref();
  $indentForDepth = new Ref();
  $initSubtree = new Ref();
  $map = new Ref();
  $printInstanceCollection = new Ref();
  $reconcile = new Ref();
  $reconcileSubtree = new Ref();
  $native_warn = $joo_global_object->native_warn !== null
    ? $joo_global_object->native_warn
    : (function() use ($caml_failwith) {
     $caml_failwith("native_warn" . " not implemented");
   });
  $native_log = $joo_global_object->native_log !== null
    ? $joo_global_object->native_log
    : (function() use ($caml_failwith) {
     $caml_failwith("native_log" . " not implemented");
   });
  $native_error = $joo_global_object->native_error !== null
    ? $joo_global_object->native_error
    : (function() use ($caml_failwith) {
     $caml_failwith("native_error" . " not implemented");
   });
  $native_debug = $joo_global_object->native_debug !== null
    ? $joo_global_object->native_debug
    : (function() use ($caml_failwith) {
     $caml_failwith("native_debug" . " not implemented");
   });
  $Out_of_memory = Vector{248, $caml_new_string("Out_of_memory"), -1};
  $Sys_error = Vector{248, $caml_new_string("Sys_error"), -2};
  $Failure = Vector{248, $caml_new_string("Failure"), -3};
  $Invalid_argument = Vector{248, $caml_new_string("Invalid_argument"), -4};
  $End_of_file = Vector{248, $caml_new_string("End_of_file"), -5};
  $Division_by_zero = Vector{248, $caml_new_string("Division_by_zero"), -6};
  $Not_found = Vector{248, $caml_new_string("Not_found"), -7};
  $Match_failure = Vector{248, $caml_new_string("Match_failure"), -8};
  $Stack_overflow = Vector{248, $caml_new_string("Stack_overflow"), -9};
  $Sys_blocked_io = Vector{248, $caml_new_string("Sys_blocked_io"), -10};
  $Assert_failure = Vector{248, $caml_new_string("Assert_failure"), -11};
  $Undefined_recursive_module = Vector{
    248,
    $caml_new_string("Undefined_recursive_module"),
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
  
  $b = $caml_new_string("%.12g");
  $a = $caml_new_string(".");
  $f = $caml_new_string("String.contains_from / Bytes.contains_from");
  $e = $caml_new_string("");
  $d = $caml_new_string("String.concat");
  $g = $caml_new_string("Random.int");
  $h = Vector{
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
  $j = Vector{0, 0, 0};
  $l = $caml_new_string("  ");
  $m = $caml_new_string("");
  $n = $caml_new_string("  ");
  $o = $caml_new_string("    ");
  $p = $caml_new_string("      ");
  $q = $caml_new_string("        ");
  $r = $caml_new_string("          ");
  $s = $caml_new_string("            ");
  $t = $caml_new_string("              ");
  $u = $caml_new_string("                ");
  $ai = $caml_new_string("\"");
  $aj = $caml_new_string("\"");
  $af = $caml_new_string("@max-depth");
  $ad = $caml_new_string("@max-length");
  $ab = $caml_new_string("~unknown");
  $Z = $caml_new_string("~lazy");
  $X = Vector{0, $caml_new_string("[|"), $caml_new_string("|]")};
  $U = $caml_new_string(")");
  $V = $caml_new_string("closure(");
  $S = Vector{0, $caml_new_string("{"), $caml_new_string("}")};
  $J = $caml_new_string(",\n");
  $D = $caml_new_string("");
  $E = $caml_new_string("]");
  $F = $caml_new_string("\n");
  $G = $caml_new_string(",\n");
  $H = $caml_new_string("\n");
  $I = $caml_new_string("[");
  $O = $caml_new_string(", ");
  $K = $caml_new_string("");
  $L = $caml_new_string("]");
  $M = $caml_new_string(", ");
  $N = $caml_new_string("[");
  $z = $caml_new_string(",\n");
  $v = $caml_new_string("");
  $w = $caml_new_string("\n");
  $x = $caml_new_string(",\n");
  $y = $caml_new_string("\n");
  $C = $caml_new_string(", ");
  $A = $caml_new_string("");
  $B = $caml_new_string(", ");
  $k = Vector{0, 0, 0};
  $ao = $caml_new_string("\n");
  $an = $caml_new_string("\n");
  $am = $caml_new_string("\n");
  $al = $caml_new_string("\n");
  $ap = $caml_new_string("Length changing sequences aren't supported yet.");
  $aq = $caml_new_string("Empty list cannot be split at ");
  $ar = $caml_new_string("");
  $as = $caml_new_string("Impossible");
  $aJ = $caml_new_string("");
  $au = $caml_new_string(" ");
  $av = $caml_new_string("IEmpty");
  $aw = $caml_new_string(")");
  $ax = $caml_new_string(" ");
  $ay = $caml_new_string("IOne(");
  $az = $caml_new_string(")");
  $aA = $caml_new_string("\n");
  $aB = $caml_new_string("\n");
  $aC = $caml_new_string(",");
  $aD = $caml_new_string("\n");
  $aE = $caml_new_string("ITwo(");
  $aF = $caml_new_string(")");
  $aG = $caml_new_string(" ");
  $aH = $caml_new_string(",");
  $aI = $caml_new_string("IOrderedMap(");
  $aU = $caml_new_string("");
  $aK = $caml_new_string("}");
  $aL = $caml_new_string("\n");
  $aM = $caml_new_string(" ");
  $aN = $caml_new_string("  subtree: ");
  $aO = $caml_new_string(",\n");
  $aR = $caml_new_string("\"");
  $aS = $caml_new_string("\"");
  $aT = $caml_new_string("-");
  $aP = $caml_new_string("  state: ");
  $aQ = $caml_new_string("{\n");
  $aW = $caml_new_string("\n");
  $aX = $caml_new_string("\n\n");
  $aY = $caml_new_string("\n");
  $aZ = $caml_new_string("<NotRendered>");
  $a0 = $caml_new_string("\n\n");
  $aV = $caml_new_string("\n\n");
  $a1 = $caml_new_string("");
  $a3 = $caml_new_string("deafult");
  $a2 = Vector{0, $caml_new_string("buttonClass")};
  $a5 = $caml_new_string("deafult");
  $a4 = Vector{0, $caml_new_string("childContainer")};
  $a6 = $caml_new_string("size changed times:");
  $a7 = Vector{0, $caml_new_string("ButtonInContainerThatCountsSizeChanges")};
  $a9 = $caml_new_string("deafult");
  $a8 = Vector{0, $caml_new_string("divRenderedByInput")};
  $ba = $caml_new_string("divClicked!");
  $a_ = $caml_new_string("MyReducer:");
  $be = $caml_new_string("AppInstance");
  $bb = Vector{0, $caml_new_string("initialInputText")};
  $bd = $caml_new_string("haha I am controlling your input");
  $bc = Vector{0, $caml_new_string("divRenderedByAppContainsInput")};
  $bh = $caml_new_string(")");
  $bi = $caml_new_string("->animFiredWithDeepDivState(");
  $bj = $caml_new_string("rafDeepDiv");
  $bk = Vector{0, $caml_new_string("rafSecond")};
  $bl = Vector{0, $caml_new_string("rafFirstDiv")};
  $bg = $caml_new_string("initialAnimationFrameSetup");
  $bf = Vector{0, $caml_new_string("TODO")};
  $bm = $caml_new_string("default");
  $bn = $caml_new_string("HELLO");
  $bq = Vector{0, $caml_new_string("stateless")};
  $br = $caml_new_string(
    "\n\n-------------------\nChild Container \n-------------------"
  );
  $bY = Vector{0, $caml_new_string("stateless")};
  $b0 = Vector{0, $caml_new_string("Foo")};
  $bs = $caml_new_string(
    "\n\n-------------------\nGets Derived State From Props\n-------------------"
  );
  $bu = Vector{0, $caml_new_string("Foo")};
  $bv = $caml_new_string("Init:");
  $bx = Vector{0, $caml_new_string("Foo")};
  $by = $caml_new_string("Update Without Changing Props:");
  $bA = Vector{0, $caml_new_string("Foo")};
  $bB = $caml_new_string("Update With Changing Props:");
  $bC = $caml_new_string(
    "\n\n------------------------------\nApp With Controlled Input\n------------------------------"
  );
  $bE = $caml_new_string("Init:");
  $bH = $caml_new_string("Update:");
  $bI = $caml_new_string(
    "\n\n------------------------------\nApp With Request Animation Frame \n----------------------"
  );
  $bJ = Vector{0, 2, 3};
  $bK = Vector{0, $caml_new_string("")};
  $bL = $caml_new_string("Init:");
  $bM = $caml_new_string("Update After raf tick:");
  $bN = $caml_new_string("Update After raf tick:");
  $bO = $caml_new_string(
    "\n\n------------------------------\nApp With Polymoprhic State \n----------------------------"
  );
  $bQ = $caml_new_string("zero");
  $bR = $caml_new_string("hello");
  $bS = $caml_new_string("Init:");
  $bU = $caml_new_string("zero");
  $bW = $caml_new_string("Another Type Init:");
  $bo = $caml_new_string("Total ms (Title): %d ");
  $bp = $caml_new_string("Second Part Of Tuple:");
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
  $string_of_int = function(dynamic $n) use ($caml_new_string) {
    return $caml_new_string("" . $n);
  };
  $valid_float_lexem = function(dynamic $s) use ($a,$caml_ml_string_length,$caml_string_get,$symbol) {
    $l = $caml_ml_string_length($s);
    $loop = function(dynamic $i) use ($a,$caml_string_get,$l,$s,$symbol) {
      $i__0 = $i;
      for (;;) {
        if ($l <= $i__0) {return $symbol($s, $a);}
        $match = $caml_string_get($s, $i__0);
        $switch__0 = 48 <= $match
          ? 58 <= $match ? 0 : (1)
          : (45 === $match ? 1 : (0));
        if ($switch__0) {$i__1 = (int) ($i__0 + 1);$i__0 = $i__1;continue;}
        return $s;
      }
    };
    return $loop(0);
  };
  $string_of_float = function(dynamic $f) use ($b,$caml_format_float,$valid_float_lexem) {
    return $valid_float_lexem($caml_format_float($b, $f));
  };
  $append->contents = function(dynamic $l1, dynamic $l2) use ($append) {
    if ($l1) {
      $tl = $l1[2];
      $hd = $l1[1];
      return Vector{0, $hd, $append->contents($tl, $l2)};
    }
    return $l2;
  };
  
  $caml_ml_open_descriptor_in(0);
  
  $stdout = $caml_ml_open_descriptor_out(1);
  
  $caml_ml_open_descriptor_out(2);
  
  $flush_all = function(dynamic $param) use ($Sys_error,$caml_ml_flush,$caml_ml_out_channels_list,$caml_wrap_exception,$caml_wrap_thrown_exception_reraise) {
    $iter = function(dynamic $param) use ($Sys_error,$caml_ml_flush,$caml_wrap_exception,$caml_wrap_thrown_exception_reraise) {
      $param__0 = $param;
      for (;;) {
        if ($param__0) {
          $l = $param__0[2];
          $a = $param__0[1];
          try {$caml_ml_flush($a);}
          catch(\Throwable $eu) {
            $eu = $caml_wrap_exception($eu);
            if ($eu[1] !== $Sys_error) {
              throw $caml_wrap_thrown_exception_reraise($eu) as \Throwable;
            }
          }
          $param__0 = $l;
          continue;
        }
        return 0;
      }
    };
    return $iter($caml_ml_out_channels_list(0));
  };
  $output_string = function(dynamic $oc, dynamic $s) use ($caml_ml_output,$caml_ml_string_length) {
    return $caml_ml_output($oc, $s, 0, $caml_ml_string_length($s));
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
  $map->contents = function(dynamic $f, dynamic $param) use ($caml_call1,$map) {
    if ($param) {
      $l = $param[2];
      $a = $param[1];
      $r = $caml_call1($f, $a);
      return Vector{0, $r, $map->contents($f, $l)};
    }
    return 0;
  };
  $c->contents = function(dynamic $i, dynamic $f, dynamic $param) use ($c,$caml_call2) {
    if ($param) {
      $l = $param[2];
      $a = $param[1];
      $r = $caml_call2($f, $i, $a);
      return Vector{0, $r, $c->contents((int) ($i + 1), $f, $l)};
    }
    return 0;
  };
  $mapi = function(dynamic $f, dynamic $l) use ($c) {
    return $c->contents(0, $f, $l);
  };
  $iter = function(dynamic $f, dynamic $param) use ($caml_call1) {
    $param__0 = $param;
    for (;;) {
      if ($param__0) {
        $param__1 = $param__0[2];
        $a = $param__0[1];
        $caml_call1($f, $a);
        $param__0 = $param__1;
        continue;
      }
      return 0;
    }
  };
  $fold_left = function(dynamic $f, dynamic $accu, dynamic $l) use ($caml_call2) {
    $accu__0 = $accu;
    $l__0 = $l;
    for (;;) {
      if ($l__0) {
        $l__1 = $l__0[2];
        $a = $l__0[1];
        $accu__1 = $caml_call2($f, $accu__0, $a);
        $accu__0 = $accu__1;
        $l__0 = $l__1;
        continue;
      }
      return $accu__0;
    }
  };
  $copy = function(dynamic $s) use ($caml_blit_bytes,$caml_create_bytes,$caml_ml_bytes_length) {
    $len = $caml_ml_bytes_length($s);
    $r = $caml_create_bytes($len);
    $caml_blit_bytes($s, 0, $r, 0, $len);
    return $r;
  };
  $escaped = function(dynamic $s) use ($caml_bytes_unsafe_get,$caml_bytes_unsafe_set,$caml_create_bytes,$caml_ml_bytes_length,$copy,$unsigned_right_shift_32) {
    $n = Vector{0, 0};
    $en = (int) ($caml_ml_bytes_length($s) + -1);
    $em = 0;
    if (! ($en < 0)) {
      $i__0 = $em;
      for (;;) {
        $match = $caml_bytes_unsafe_get($s, $i__0);
        if (32 <= $match) {
          $er = (int) ($match + -34);
          if (58 < $unsigned_right_shift_32($er, 0)) {
            if (93 <= $er) {
              $switch__0 = 0;
              $switch__1 = 0;
            }
            else {$switch__1 = 1;}
          }
          else {
            if (56 < $unsigned_right_shift_32((int) ($er + -1), 0)) {$switch__0 = 1;$switch__1 = 0;}
            else {$switch__1 = 1;}
          }
          if ($switch__1) {$es = 1;$switch__0 = 2;}
        }
        else {
          $switch__0 = 11 <= $match
            ? 13 === $match ? 1 : (0)
            : (8 <= $match ? 1 : (0));
        }
        switch($switch__0) {
          // FALLTHROUGH
          case 0:
            $es = 4;
            break;
          // FALLTHROUGH
          case 1:
            $es = 2;
            break;
          }
        $n[1] = (int) ($n[1] + $es);
        $et = (int) ($i__0 + 1);
        if ($en !== $i__0) {$i__0 = $et;continue;}
        break;
      }
    }
    if ($n[1] === $caml_ml_bytes_length($s)) {return $copy($s);}
    $s__0 = $caml_create_bytes($n[1]);
    $n[1] = 0;
    $ep = (int) ($caml_ml_bytes_length($s) + -1);
    $eo = 0;
    if (! ($ep < 0)) {
      $i = $eo;
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
        $eq = (int) ($i + 1);
        if ($ep !== $i) {$i = $eq;continue;}
        break;
      }
    }
    return $s__0;
  };
  $bos = function(dynamic $el) {return $el;};
  $bts = function(dynamic $ek) {return $ek;};
  $ensure_ge = function(dynamic $x, dynamic $y) use ($d,$invalid_arg) {
    return $y <= $x ? $x : ($invalid_arg($d));
  };
  $sum_lengths = function(dynamic $acc, dynamic $seplen, dynamic $param) use ($caml_ml_string_length,$ensure_ge) {
    $acc__0 = $acc;
    $param__0 = $param;
    for (;;) {
      if ($param__0) {
        $ei = $param__0[2];
        $ej = $param__0[1];
        if ($ei) {
          $acc__1 = $ensure_ge(
            (int)
            ((int) ($caml_ml_string_length($ej) + $seplen) + $acc__0),
            $acc__0
          );
          $acc__0 = $acc__1;
          $param__0 = $ei;
          continue;
        }
        return (int) ($caml_ml_string_length($ej) + $acc__0);
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
        $eg = $param__0[2];
        $eh = $param__0[1];
        if ($eg) {
          $caml_blit_string($eh, 0, $dst, $pos__0, $caml_ml_string_length($eh)
          );
          $caml_blit_string(
            $sep,
            0,
            $dst,
            (int)
            ($pos__0 + $caml_ml_string_length($eh)),
            $seplen
          );
          $pos__1 = (int)
          ((int) ($pos__0 + $caml_ml_string_length($eh)) + $seplen);
          $pos__0 = $pos__1;
          $param__0 = $eg;
          continue;
        }
        $caml_blit_string($eh, 0, $dst, $pos__0, $caml_ml_string_length($eh));
        return $dst;
      }
      return $dst;
    }
  };
  $concat = function(dynamic $sep, dynamic $l) use ($bts,$caml_create_bytes,$caml_ml_string_length,$e,$sum_lengths,$unsafe_blits) {
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
    return $e;
  };
  $escaped__0 = function(dynamic $s) use ($bos,$bts,$caml_bytes_unsafe_get,$caml_ml_string_length,$escaped,$unsigned_right_shift_32) {
    $needs_escape = function(dynamic $i) use ($caml_bytes_unsafe_get,$caml_ml_string_length,$s,$unsigned_right_shift_32) {
      $i__0 = $i;
      for (;;) {
        if ($caml_ml_string_length($s) <= $i__0) {return 0;}
        $match = $caml_bytes_unsafe_get($s, $i__0);
        if (32 <= $match) {
          $ef = (int) ($match + -34);
          if (58 < $unsigned_right_shift_32($ef, 0)) {
            if (93 <= $ef) {
              $switch__0 = 0;
              $switch__1 = 0;
            }
            else {$switch__1 = 1;}
          }
          else {
            if (56 < $unsigned_right_shift_32((int) ($ef + -1), 0)) {$switch__0 = 1;$switch__1 = 0;}
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
  $contains_from = function(dynamic $s, dynamic $i, dynamic $c) use ($Not_found,$caml_ml_string_length,$caml_wrap_exception,$caml_wrap_thrown_exception_reraise,$f,$index_rec,$invalid_arg) {
    $l = $caml_ml_string_length($s);
    if (0 <= $i) {
      if (! ($l < $i)) {
        try {$index_rec($s, $l, $i, $c);$ed = 1;return $ed;}
        catch(\Throwable $ee) {
          $ee = $caml_wrap_exception($ee);
          if ($ee === $Not_found) {return 0;}
          throw $caml_wrap_thrown_exception_reraise($ee) as \Throwable;
        }
      }
    }
    return $invalid_arg($f);
  };
  $contains = function(dynamic $s, dynamic $c) use ($contains_from) {
    return $contains_from($s, 0, $c);
  };
  
  $caml_fresh_oo_id(0);
  
  $caml_fresh_oo_id(0);
  
  $bits = function(dynamic $s) use ($caml_check_bound,$unsigned_right_shift_32) {
    $s[2] = (int) ((int) ($s[2] + 1) % 55);
    $ea = $s[2];
    $curval = $caml_check_bound($s[1], $ea)[$ea + 1];
    $eb = (int) ((int) ($s[2] + 24) % 55);
    $newval = (int)
    ($caml_check_bound($s[1], $eb)[$eb + 1] +
       ($curval ^ (int) $unsigned_right_shift_32($curval, 25) & 31));
    $newval30 = $newval & 1073741823;
    $ec = $s[2];
    $caml_check_bound($s[1], $ec)[$ec + 1] = $newval30;
    return $newval30;
  };
  $intaux = function(dynamic $s, dynamic $n) use ($bits,$caml_mod) {
    for (;;) {
      $r = $bits($s);
      $v = $caml_mod($r, $n);
      if ((int) ((int) (1073741823 - $n) + 1) < (int) ($r - $v)) {continue;}
      return $v;
    }
  };
  $int__0 = function(dynamic $s, dynamic $bound) use ($g,$intaux,$invalid_arg) {
    if (! (1073741823 < $bound)) {
      if (0 < $bound) {return $intaux($s, $bound);}
    }
    return $invalid_arg($g);
  };
  $default__0 = Vector{0, $h->toVector(), 0};
  $int__1 = function(dynamic $bound) use ($default__0,$int__0) {
    return $int__0($default__0, $bound);
  };
  $i = 5;
  $detectList = function(dynamic $maxLength, dynamic $o) use ($caml_equal,$caml_obj_tag) {
    $maxLength__0 = $maxLength;
    $o__0 = $o;
    for (;;) {
      if (0 === $maxLength__0) {return 1;}
      $tag = $caml_obj_tag($o__0);
      $match = $tag === 1000 ? 1 : (0);
      if (0 === $match) {
        $size = $o__0->count() - 1;
        $d8 = $tag === 0 ? 1 : (0);
        if ($d8) {
          $d9 = 2 === $size ? 1 : (0);
          if ($d9) {
            $o__1 = $o__0[2];
            $maxLength__1 = (int) ($maxLength__0 + -1);
            $maxLength__0 = $maxLength__1;
            $o__0 = $o__1;
            continue;
          }
          $d_ = $d9;
        }
        else {$d_ = $d8;}
        return $d_;
      }
      return $caml_equal($o__0, 0);
    }
  };
  $extractList->contents = function(dynamic $maxNum, dynamic $o) use ($extractList,$is_int,$j) {
    if (0 === $maxNum) {return Vector{0, 1 - $is_int($o), 0};}
    if ($is_int($o)) {return $j;}
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
  $getBreakData = function(dynamic $itms) use ($caml_ml_string_length,$contains,$fold_left,$k) {
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
      $k,
      $itms
    );
    $someChildBroke = $match[2];
    $allItemsLen = $match[1];
    return Vector{0, $allItemsLen, $someChildBroke};
  };
  $indentForDepth->contents = function(dynamic $n__0) use ($indentForDepth,$l,$m,$n,$o,$p,$q,$r,$s,$symbol,$t,$u,$unsigned_right_shift_32) {
    if (8 < $unsigned_right_shift_32($n__0, 0)) {
      return $symbol($indentForDepth->contents((int) ($n__0 + -1)), $l);
    }
    switch($n__0) {
      // FALLTHROUGH
      case 0:
        return $m;
      // FALLTHROUGH
      case 1:
        return $n;
      // FALLTHROUGH
      case 2:
        return $o;
      // FALLTHROUGH
      case 3:
        return $p;
      // FALLTHROUGH
      case 4:
        return $q;
      // FALLTHROUGH
      case 5:
        return $r;
      // FALLTHROUGH
      case 6:
        return $s;
      // FALLTHROUGH
      case 7:
        return $t;
      // FALLTHROUGH
      default:
        return $u;
      }
  };
  $printTreeShape = function
  (dynamic $pair, dynamic $self, dynamic $depth, dynamic $o) use ($A,$B,$C,$caml_call1,$caml_call3,$caml_ml_string_length,$concat,$extractFields,$getBreakData,$i,$indentForDepth,$map,$symbol,$v,$w,$x,$y,$z) {
    $right = $pair[2];
    $left = $pair[1];
    $match = $extractFields($i, $o);
    $lst = $match[2];
    $wasTruncated = $match[1];
    $dNext = (int) (1 + $depth);
    $indent = $indentForDepth->contents($depth);
    $indentNext = $indentForDepth->contents($dNext);
    $itms = $map->contents(
      function(dynamic $o) use ($caml_call3,$dNext,$self) {
        return $caml_call3($self[13], $self, Vector{0, $dNext}, $o);
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
          ? $A
          : ($symbol($C, $caml_call1($self[6], $self)));
        $d7 = $symbol($truncationMsg__0, $right);
        return $symbol($left, $symbol($concat($B, $itms), $d7));
      }
    }
    $truncationMsg = 0 === $wasTruncated
      ? $v
      : ($symbol($z, $symbol($indentNext, $caml_call1($self[6], $self))));
    $d6 = $symbol($truncationMsg, $symbol($w, $symbol($indent, $right)));
    return $symbol(
      $left,
      $symbol(
        $y,
        $symbol(
          $indentNext,
          $symbol($concat($symbol($x, $indentNext), $itms), $d6)
        )
      )
    );
  };
  $printListShape = function(dynamic $self, dynamic $depth, dynamic $o) use ($D,$E,$F,$G,$H,$I,$J,$K,$L,$M,$N,$O,$caml_call1,$caml_call3,$caml_ml_string_length,$concat,$extractList,$getBreakData,$i,$indentForDepth,$map,$symbol) {
    $match = $extractList->contents($i, $o);
    $lst = $match[2];
    $wasTruncated = $match[1];
    $dNext = (int) (1 + $depth);
    $indent = $indentForDepth->contents($depth);
    $indentNext = $indentForDepth->contents($dNext);
    $itms = $map->contents(
      function(dynamic $o) use ($caml_call3,$dNext,$self) {
        return $caml_call3($self[13], $self, Vector{0, $dNext}, $o);
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
          ? $K
          : ($symbol($O, $caml_call1($self[6], $self)));
        $d5 = $symbol($truncationMsg__0, $L);
        return $symbol($N, $symbol($concat($M, $itms), $d5));
      }
    }
    $truncationMsg = 0 === $wasTruncated
      ? $D
      : ($symbol($J, $symbol($indentNext, $caml_call1($self[6], $self))));
    $d4 = $symbol($truncationMsg, $symbol($F, $symbol($indent, $E)));
    return $symbol(
      $I,
      $symbol(
        $H,
        $symbol(
          $indentNext,
          $symbol($concat($symbol($G, $indentNext), $itms), $d4)
        )
      )
    );
  };
  $P = function(dynamic $self, dynamic $opt, dynamic $o) use ($caml_call1,$caml_call2,$caml_call3,$caml_obj_tag,$detectList,$i) {
    if ($opt) {
      $sth = $opt[1];
      $depth = $sth;
    }
    else {$depth = 0;}
    if (70 < $depth) {return $caml_call1($self[5], $self);}
    $tag = $caml_obj_tag($o);
    if ($tag === 252) {
      $match = 0 === $depth ? 1 : (0);
      return 0 === $match
        ? $caml_call2($self[3], $self, $o)
        : ($caml_call2($self[2], $self, $o));
    }
    return $tag === 1000
      ? $caml_call2($self[1], $self, $o)
      : ($tag === 253
       ? $caml_call2($self[4], $self, $o)
       : ($tag === 247
        ? $caml_call2($self[10], $self, $o)
        : ($tag === 254
         ? $caml_call3($self[9], $self, 0, $o)
         : ($tag === 246
          ? $caml_call2($self[8], $self, $o)
          : ($detectList($i, $o)
           ? $caml_call3($self[12], $self, Vector{0, $depth}, $o)
           : ($tag === 0
            ? $caml_call3($self[11], $self, Vector{0, $depth}, $o)
            : ($caml_call2($self[7], $self, $o))))))));
  };
  $Q = function(dynamic $self, dynamic $opt, dynamic $o) use ($printListShape) {
    if ($opt) {
      $sth = $opt[1];
      $depth = $sth;
    }
    else {$depth = 0;}
    return $printListShape($self, $depth, $o);
  };
  $R = function(dynamic $self, dynamic $opt, dynamic $o) use ($S,$printTreeShape) {
    if ($opt) {
      $sth = $opt[1];
      $depth = $sth;
    }
    else {$depth = 0;}
    return $printTreeShape($S, $self, $depth, $o);
  };
  $T = function(dynamic $self, dynamic $f) use ($U,$V,$string_of_int,$symbol) {
    return $symbol($V, $symbol($string_of_int((int) $f), $U));
  };
  $W = function(dynamic $self, dynamic $opt, dynamic $o) use ($X,$printTreeShape) {
    if ($opt) {
      $sth = $opt[1];
      $depth = $sth;
    }
    else {$depth = 0;}
    return $printTreeShape($X, $self, $depth, $o);
  };
  $Y = function(dynamic $self, dynamic $o) use ($Z) {return $Z;};
  $aa = function(dynamic $self, dynamic $o) use ($ab) {return $ab;};
  $ac = function(dynamic $self) use ($ad) {return $ad;};
  $ae = function(dynamic $self) use ($af) {return $af;};
  $ag = function(dynamic $self, dynamic $f) use ($string_of_float) {
    return $string_of_float($f);
  };
  $ah = function(dynamic $self, dynamic $s) use ($ai,$aj,$caml_call2,$symbol) {
    return $symbol($aj, $symbol($caml_call2($self[2], $self, $s), $ai));
  };
  $ak = function(dynamic $self, dynamic $s) {return $s;};
  $base = Vector{
    0,
    function(dynamic $self, dynamic $i) use ($string_of_int) {
      return $string_of_int($i);
    },
    $ak,
    $ah,
    $ag,
    $ae,
    $ac,
    $aa,
    $Y,
    $W,
    $T,
    $R,
    $Q,
    $P
  };
  $makeStandardChannelsConsole = function(dynamic $objectPrinter) use ($al,$am,$an,$ao,$caml_call3,$native_debug,$native_error,$native_log,$native_warn,$symbol) {
    $d0 = function(dynamic $a) use ($al,$caml_call3,$native_debug,$objectPrinter,$symbol) {
      return $native_debug(
        $symbol($caml_call3($objectPrinter[13], $objectPrinter, 0, $a), $al)
      );
    };
    $d1 = function(dynamic $a) use ($am,$caml_call3,$native_error,$objectPrinter,$symbol) {
      return $native_error(
        $symbol($caml_call3($objectPrinter[13], $objectPrinter, 0, $a), $am)
      );
    };
    $d2 = function(dynamic $a) use ($an,$caml_call3,$native_warn,$objectPrinter,$symbol) {
      return $native_warn(
        $symbol($caml_call3($objectPrinter[13], $objectPrinter, 0, $a), $an)
      );
    };
    $d3 = function(dynamic $a) use ($caml_call3,$native_log,$objectPrinter) {
      return $native_log(
        $caml_call3($objectPrinter[13], $objectPrinter, 0, $a)
      );
    };
    return Vector{
      0,
      function(dynamic $a) use ($ao,$caml_call3,$native_log,$objectPrinter,$symbol) {
        return $native_log(
          $symbol($caml_call3($objectPrinter[13], $objectPrinter, 0, $a), $ao)
        );
      },
      $d3,
      $d2,
      $d1,
      $d0
    };
  };
  $defaultGlobalConsole = $makeStandardChannelsConsole($base);
  $log = function(dynamic $a) use ($caml_call1,$defaultGlobalConsole) {
    return $caml_call1($defaultGlobalConsole[1], $a);
  };
  $mapi3 = function
  (dynamic $f, dynamic $iSoFar, dynamic $revSoFar, dynamic $listA, dynamic $listB, dynamic $listC) use ($Invalid_argument,$ap,$caml_call4,$caml_wrap_thrown_exception,$rev) {
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
              $caml_call4($f, $iSoFar__0, $hda, $hdb, $hdc),
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
      throw $caml_wrap_thrown_exception(Vector{0, $Invalid_argument, $ap}) as \Throwable;
    }
  };
  $mapi3__0 = function
  (dynamic $f, dynamic $listA, dynamic $listB, dynamic $listC) use ($mapi3) {
    return $mapi3($f, 0, 0, $listA, $listB, $listC);
  };
  $splitList = function
  (dynamic $revCount, dynamic $revSoFar, dynamic $splitAt, dynamic $lst) use ($Invalid_argument,$aq,$caml_wrap_thrown_exception,$rev,$string_of_int,$symbol) {
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
                $symbol($aq, $string_of_int($splitAt))
              }
            ) as \Throwable;
    }
  };
  $splitList__0 = function(dynamic $splitAt, dynamic $lst) use ($splitList) {
    return $splitList(0, 0, $splitAt, $lst);
  };
  $nonReducer = function(dynamic $param, dynamic $dZ) use ($ar) {return $ar;};
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
    $dY = $inst[5];
    return Vector{
      0,
      $inst[1],
      $inst[2],
      $inst[3],
      $inst[4],
      Vector{0, $state, $dY[2], $dY[3], $dY[4]},
      $inst[6]
    };
  };
  $newSelf = function(dynamic $replacer, dynamic $subreplacer) use ($caml_call1,$caml_call2,$caml_update_dummy,$reconcile,$withState) {
    $self = varray[];
    $dS = function(dynamic $extractor, dynamic $e, dynamic $inst) use ($caml_call1,$caml_call2,$reconcile,$withState) {
      $dW = $caml_call1($extractor, $e);
      $nextState = $caml_call2($inst[5][2], $inst, $dW);
      $dX = $inst[4];
      return $reconcile->contents($withState($inst, $nextState), $dX);
    };
    $dT = function(dynamic $action) use ($caml_call1,$caml_call2,$reconcile,$replacer,$withState) {
      return $caml_call1(
        $replacer,
        function(dynamic $inst) use ($action,$caml_call2,$reconcile,$withState) {
          $nextState = $caml_call2($inst[5][2], $inst, $action);
          $dV = $inst[4];
          return $reconcile->contents($withState($inst, $nextState), $dV);
        }
      );
    };
    $caml_update_dummy(
      $self,
      Vector{
        0,
        function(dynamic $actionExtractor, dynamic $ev) use ($caml_call1,$caml_call2,$reconcile,$replacer,$withState) {
          $action = $caml_call1($actionExtractor, $ev);
          return $caml_call1(
            $replacer,
            function(dynamic $inst) use ($action,$caml_call2,$reconcile,$withState) {
              $nextState = $caml_call2($inst[5][2], $inst, $action);
              $dU = $inst[4];
              return $reconcile->contents($withState($inst, $nextState), $dU);
            }
          );
        },
        $dT,
        $dS
      }
    );
    return $self;
  };
  $init = function(dynamic $replacer, dynamic $renderable) use ($caml_call1,$caml_call2,$initSubtree,$newSelf,$spec) {
    $subreplacer = function(dynamic $subtreeSwapper) use ($caml_call1,$replacer) {
      return $caml_call1(
        $replacer,
        function(dynamic $inst) use ($caml_call1,$subtreeSwapper) {
          $nextSubtree = $caml_call1($subtreeSwapper, $inst[6]);
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
    $nextSpec = $spec($caml_call2($renderable, 0, $self));
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
  $initSubtree->contents = function(dynamic $thisReplacer, dynamic $jsx) use ($caml_call1,$flatten,$init,$initSubtree,$is_int,$mapi,$splitList__0) {
    if ($is_int($jsx)) {return 0;}
    else {
      switch($jsx[0]) {
        // FALLTHROUGH
        case 0:
          $renderable = $jsx[1];
          $nextReplacer = function(dynamic $instSwapper) use ($caml_call1,$thisReplacer) {
            return $caml_call1(
              $thisReplacer,
              function(dynamic $subtree) use ($caml_call1,$instSwapper) {
                $inst = $subtree[1];
                $next = $caml_call1($instSwapper, $inst);
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
          $nextReplacerA = function(dynamic $aSwapper) use ($caml_call1,$thisReplacer) {
            return $caml_call1(
              $thisReplacer,
              function(dynamic $subtree) use ($aSwapper,$caml_call1) {
                $b = $subtree[2];
                $a = $subtree[1];
                $next = $caml_call1($aSwapper, $a);
                $match = $next === $a ? 1 : (0);
                return 0 === $match ? Vector{1, $next, $b} : ($subtree);
              }
            );
          };
          $nextReplacerB = function(dynamic $bSwapper) use ($caml_call1,$thisReplacer) {
            return $caml_call1(
              $thisReplacer,
              function(dynamic $subtree) use ($bSwapper,$caml_call1) {
                $b = $subtree[2];
                $a = $subtree[1];
                $next = $caml_call1($bSwapper, $b);
                $match = $next === $b ? 1 : (0);
                return 0 === $match ? Vector{1, $a, $next} : ($subtree);
              }
            );
          };
          $dR = $initSubtree->contents($nextReplacerB, $stateRendererB);
          return Vector{
            1,
            $initSubtree->contents($nextReplacerA, $stateRendererA),
            $dR
          };
        // FALLTHROUGH
        default:
          $elems = $jsx[1];
          $initElem = function(dynamic $i, dynamic $e) use ($caml_call1,$flatten,$initSubtree,$splitList__0,$thisReplacer) {
            $subreplacer = function(dynamic $swapper) use ($caml_call1,$flatten,$i,$splitList__0,$thisReplacer) {
              return $caml_call1(
                $thisReplacer,
                function(dynamic $subtree) use ($caml_call1,$flatten,$i,$splitList__0,$swapper) {
                  $iLst = $subtree[1];
                  $match = $splitList__0($i, $iLst);
                  $post = $match[3];
                  $inst = $match[2];
                  $pre = $match[1];
                  $next = $caml_call1($swapper, $inst);
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
  $reconcile->contents = function(dynamic $inst, dynamic $renderable) use ($caml_call2,$reconcileSubtree,$spec) {
    $nextSpec = $spec(
      $caml_call2($renderable, Vector{0, $inst[5][1]}, $inst[3])
    );
    $dQ = $reconcileSubtree->contents($inst[6], $inst[5][4], $nextSpec[4]);
    return Vector{0, $inst[1], $inst[2], $inst[3], $renderable, $nextSpec, $dQ
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
          $dP = $reconcileSubtree->contents($ib, $rbPrev, $rb);
          return Vector{1, $reconcileSubtree->contents($ia, $raPrev, $ra), $dP
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
  $control = function(dynamic $param, dynamic $controlledState) use ($caml_call2) {
    $renderable = $param[1];
    return Vector{
      0,
      function(dynamic $state, dynamic $self) use ($caml_call2,$controlledState,$renderable) {
        return $caml_call2($renderable, Vector{0, $controlledState}, $self);
      }
    };
  };
  $create = function(dynamic $param) use ($Invalid_argument,$as,$caml_call1,$caml_update_dummy,$caml_wrap_thrown_exception) {
    $root = varray[];
    $dN = 0;
    $caml_update_dummy(
      $root,
      Vector{
        0,
        function(dynamic $swapper) use ($Invalid_argument,$as,$caml_call1,$caml_wrap_thrown_exception,$root) {
          $dO = $root[2];
          if ($dO) {
            $ei = $dO[1];
            $curInst = $ei[2];
            $curElems = $ei[1];
            $nextEi = Vector{0, $curElems, $caml_call1($swapper, $curInst)};
            $root[2] = Vector{0, $nextEi};
            return 0;
          }
          throw $caml_wrap_thrown_exception(Vector{0, $Invalid_argument, $as}) as \Throwable;
        },
        $dN
      }
    );
    return $root;
  };
  $render = function(dynamic $root, dynamic $elems) use ($initSubtree,$reconcileSubtree) {
    $dM = $root[2];
    if ($dM) {
      $ei = $dM[1];
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
  $tick = function(dynamic $param) use ($caml_call1,$iter,$subscribers) {
    $prevSubscribers = $subscribers[1];
    $subscribers[1] = 0;
    return $iter(
      function(dynamic $cb) use ($caml_call1) {return $caml_call1($cb, 0);},
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
  (dynamic $opt, dynamic $subtree) use ($aA,$aB,$aC,$aD,$aE,$aF,$aG,$aH,$aI,$aJ,$at,$au,$av,$aw,$ax,$ay,$az,$concat,$is_int,$map,$printInstanceCollection,$symbol) {
    if ($opt) {
      $sth = $opt[1];
      $s = $sth;
    }
    else {$s = $aJ;}
    $dNext = $symbol($au, $s);
    if ($is_int($subtree)) {return $av;}
    else {
      switch($subtree[0]) {
        // FALLTHROUGH
        case 0:
          $n = $subtree[1];
          return $symbol(
            $ay,
            $symbol($at->contents(Vector{0, $symbol($ax, $s)}, $n), $aw)
          );
        // FALLTHROUGH
        case 1:
          $n2 = $subtree[2];
          $n1 = $subtree[1];
          $dI = $symbol($aA, $symbol($s, $az));
          $dJ = $symbol(
            $aC,
            $symbol(
              $aB,
              $symbol(
                $dNext,
                $symbol(
                  $printInstanceCollection->contents(Vector{0, $dNext}, $n2),
                  $dI
                )
              )
            )
          );
          return $symbol(
            $aE,
            $symbol(
              $aD,
              $symbol(
                $dNext,
                $symbol(
                  $printInstanceCollection->contents(Vector{0, $dNext}, $n1),
                  $dJ
                )
              )
            )
          );
        // FALLTHROUGH
        default:
          $lst = $subtree[1];
          $dK = Vector{0, $symbol($aG, $s)};
          return $symbol(
            $aI,
            $symbol(
              $concat(
                $aH,
                $map->contents(
                  function(dynamic $dL) use ($dK,$printInstanceCollection) {
                    return $printInstanceCollection->contents($dK, $dL);
                  },
                  $lst
                )
              ),
              $aF
            )
          );
        }
    }
  };
  $at->contents = function(dynamic $opt, dynamic $n) use ($aK,$aL,$aM,$aN,$aO,$aP,$aQ,$aR,$aS,$aT,$aU,$caml_obj_tag,$escaped__0,$is_int,$printInstanceCollection,$string_of_int,$symbol) {
    if ($opt) {
      $sth = $opt[1];
      $s = $sth;
    }
    else {$s = $aU;}
    $match = $n[5];
    $state = $match[1];
    $dE = $symbol($aL, $symbol($s, $aK));
    $dF = $n[6];
    $dG = $symbol(
      $aO,
      $symbol(
        $s,
        $symbol(
          $aN,
          $symbol(
            $printInstanceCollection->contents(
              Vector{0, $symbol($aM, $s)},
              $dF
            ),
            $dE
          )
        )
      )
    );
    $dH = $is_int($state)
      ? $string_of_int($state)
      : ($caml_obj_tag($state) === 252
       ? $symbol($aS, $symbol($escaped__0($state), $aR))
       : ($aT));
    return $symbol($aQ, $symbol($s, $symbol($aP, $symbol($dH, $dG))));
  };
  $printSection = function(dynamic $s) use ($aV,$log,$suppress,$symbol) {
    return $suppress[1] ? 0 : ($log($symbol($aV, $s)));
  };
  $printRoot = function(dynamic $title, dynamic $root) use ($a0,$aW,$aX,$aY,$aZ,$log,$printInstanceCollection,$suppress,$symbol) {
    $dD = $root[2];
    if (0 === $suppress[1]) {
      if ($dD) {
        $match = $dD[1];
        $subtree = $match[2];
        $log($symbol($aX, $symbol($title, $aW)));
        return $log($printInstanceCollection->contents(0, $subtree));
      }
      $log($title);
      return $log($symbol($a0, $symbol($aZ, $aY)));
    }
    return 0;
  };
  $domEventHandler = function(dynamic $e) {return 0;};
  $domStateToString = function(dynamic $state) {return $state;};
  $render__0 = function
  (dynamic $onClick, dynamic $opt, dynamic $children, dynamic $state, dynamic $self) use ($a1,$domEventHandler) {
    if ($opt) {
      $sth = $opt[1];
      $className = $sth;
    }
    else {$className = $a1;}
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
  (dynamic $opt, dynamic $size, dynamic $children, dynamic $dy, dynamic $self) use ($a2,$a3,$element,$nonReducer,$render__0) {
    if ($opt) {
      $sth = $opt[1];
      $txt = $sth;
    }
    else {$txt = $a3;}
    if ($dy) {
      $sth__0 = $dy[1];
      $state = $sth__0;
    }
    else {$state = $txt;}
    $dz = 0;
    $dA = 0;
    return Vector{
      0,
      $state,
      $element(
        Vector{
          0,
          function(dynamic $dB, dynamic $dC) use ($a2,$dA,$dz,$render__0) {
            return $render__0($dA, $a2, $dz, $dB, $dC);
          }
        }
      ),
      $nonReducer
    };
  };
  $render__2 = function
  (dynamic $opt, dynamic $children, dynamic $du, dynamic $self) use ($a4,$a5,$element,$nonReducer,$render__0) {
    if ($opt) {
      $sth = $opt[1];
      $txt = $sth;
    }
    else {$txt = $a5;}
    if ($du) {
      $sth__0 = $du[1];
      $state = $sth__0;
    }
    else {$state = $txt;}
    $dv = 0;
    return Vector{
      0,
      $state,
      $element(
        Vector{
          0,
          function(dynamic $dw, dynamic $dx) use ($a4,$children,$dv,$render__0) {
            return $render__0($dv, $a4, $children, $dw, $dx);
          }
        }
      ),
      $nonReducer
    };
  };
  $render__3 = function
  (dynamic $opt, dynamic $size, dynamic $children, dynamic $dh, dynamic $self) use ($a6,$a7,$element,$render__0,$render__1,$string_of_int,$symbol) {
    ;
    if ($dh) {
      $sth = $dh[1];
      $state = $sth;
    }
    else {$state = Vector{0, $size, 0};}
    $curChangeCount = $state[2];
    $curSize = $state[1];
    $match = $curSize !== $size ? 1 : (0);
    $nextChangeCount = 0 === $match
      ? $curChangeCount
      : ((int) ($curChangeCount + 1));
    $di = function(dynamic $param, dynamic $dt) use ($state) {return $state;};
    $dj = 0;
    $dk = Vector{0, $symbol($a6, $string_of_int($nextChangeCount))};
    $dl = 0;
    $dm = $element(
      Vector{
        0,
        function(dynamic $dr, dynamic $ds) use ($dj,$dk,$dl,$render__0) {
          return $render__0($dl, $dk, $dj, $dr, $ds);
        }
      }
    );
    $dn = 0;
    return Vector{
      0,
      Vector{0, $size, $nextChangeCount},
      Vector{
        1,
        $element(
          Vector{
            0,
            function(dynamic $dp, dynamic $dq) use ($a7,$children,$dn,$render__1) {
              return $render__1($a7, $dn, $children, $dp, $dq);
            }
          }
        ),
        $dm
      },
      $di
    };
  };
  $render__4 = function
  (dynamic $opt, dynamic $children, dynamic $da, dynamic $self) use ($a8,$a9,$element,$render__0) {
    if ($opt) {
      $sth = $opt[1];
      $initialText = $sth;
    }
    else {$initialText = $a9;}
    if ($da) {
      $sth__0 = $da[1];
      $state = $sth__0;
    }
    else {$state = $initialText;}
    $db = function(dynamic $param, dynamic $dg) use ($state) {return $state;};
    $dc = 0;
    $dd = 0;
    return Vector{
      0,
      $state,
      $element(
        Vector{
          0,
          function(dynamic $de, dynamic $df) use ($a8,$dc,$dd,$render__0) {
            return $render__0($dd, $a8, $dc, $de, $df);
          }
        }
      ),
      $db
    };
  };
  $render__5 = function(dynamic $children, dynamic $opt, dynamic $self) use ($a_,$ba,$caml_int_of_string,$print_string,$render__0,$string_of_int,$symbol) {
    if ($opt) {
      $sth = $opt[1];
      $state = $sth;
    }
    else {$state = 0;}
    $c4 = function(dynamic $param, dynamic $c_) use ($caml_int_of_string) {
      $next = $c_[1];
      return $caml_int_of_string($next);
    };
    $c5 = 0;
    $c6 = Vector{0, $symbol($a_, $string_of_int($state))};
    $c7 = Vector{
      0,
      function(dynamic $e) use ($ba,$print_string) {
        return $print_string($ba);
      }
    };
    return Vector{
      0,
      $state,
      Vector{
        0,
        function(dynamic $c8, dynamic $c9) use ($c5,$c6,$c7,$render__0) {
          return $render__0($c7, $c6, $c5, $c8, $c9);
        }
      },
      $c4
    };
  };
  $render__6 = function
  (dynamic $shouldControlInput, dynamic $children, dynamic $opt, dynamic $self) use ($bb,$bc,$bd,$be,$control,$element,$nonReducer,$render__0,$render__4,$render__5) {
    if ($opt) {
      $sth = $opt[1];
      $state = $sth;
    }
    else {$state = $be;}
    $cU = 0;
    $input = $element(
      Vector{
        0,
        function(dynamic $c2, dynamic $c3) use ($bb,$cU,$render__4) {
          return $render__4($bb, $cU, $c2, $c3);
        }
      }
    );
    $input__0 = 0 === $shouldControlInput ? $input : ($control($input, $bd));
    $cV = 0;
    $cW = $element(
      Vector{
        0,
        function(dynamic $c0, dynamic $c1) use ($cV,$render__5) {
          return $render__5($cV, $c0, $c1);
        }
      }
    );
    $cX = 0;
    return Vector{
      0,
      $state,
      Vector{
        1,
        $element(
          Vector{
            0,
            function(dynamic $cY, dynamic $cZ) use ($bc,$cX,$input__0,$render__0) {
              return $render__0($cX, $bc, $input__0, $cY, $cZ);
            }
          }
        ),
        $cW
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
    $cO = function(dynamic $param, dynamic $action) use ($state) {return $state;
    };
    $cP = 0;
    $cQ = Vector{0, $size};
    $cR = 0;
    return Vector{
      0,
      $state,
      Vector{
        0,
        function(dynamic $cS, dynamic $cT) use ($cP,$cQ,$cR,$render__0) {
          return $render__0($cR, $cQ, $cP, $cS, $cT);
        }
      },
      $cO
    };
  };
  $symbol__0 = function(dynamic $x, dynamic $getDefault) use ($caml_call1) {
    if ($x) {$x__0 = $x[1];return $x__0;}
    return $caml_call1($getDefault, 0);
  };
  $onRaf = function(dynamic $e) use ($bf) {return $bf;};
  $initialStateGetter = function(dynamic $self, dynamic $param) use ($bg,$caml_call1,$onRaf,$request) {
    $request($caml_call1($self[1], $onRaf));
    return $bg;
  };
  $render__8 = function
  (dynamic $opt, dynamic $param, dynamic $state, dynamic $self) use ($bh,$bi,$bj,$bk,$bl,$caml_call1,$domStateToString,$element,$initialStateGetter,$int__1,$onRaf,$render__0,$request,$string_of_int,$symbol,$symbol__0) {
    ;
    $state__0 = $symbol__0(
      $state,
      function(dynamic $cN) use ($initialStateGetter,$self) {
        return $initialStateGetter($self, $cN);
      }
    );
    $cy = function(dynamic $inst, dynamic $action) use ($bh,$bi,$caml_call1,$domStateToString,$onRaf,$request,$self,$state__0,$symbol) {
      $match = $inst[6][2][1][6];
      $deepestDiv = $match[1];
      $divStateStr = $domStateToString($deepestDiv[5][1]);
      $request($caml_call1($self[1], $onRaf));
      return $symbol($state__0, $symbol($bi, $symbol($divStateStr, $bh)));
    };
    $cz = 0;
    $cA = Vector{0, $symbol($bj, $string_of_int($int__1(10)))};
    $cB = 0;
    $cC = $element(
      Vector{
        0,
        function(dynamic $cL, dynamic $cM) use ($cA,$cB,$cz,$render__0) {
          return $render__0($cB, $cA, $cz, $cL, $cM);
        }
      }
    );
    $cD = 0;
    $cE = $element(
      Vector{
        0,
        function(dynamic $cJ, dynamic $cK) use ($bk,$cC,$cD,$render__0) {
          return $render__0($cD, $bk, $cC, $cJ, $cK);
        }
      }
    );
    $cF = 0;
    $cG = 0;
    return Vector{
      0,
      $state__0,
      Vector{
        1,
        $element(
          Vector{
            0,
            function(dynamic $cH, dynamic $cI) use ($bl,$cF,$cG,$render__0) {
              return $render__0($cG, $bl, $cF, $cH, $cI);
            }
          }
        ),
        $cE
      },
      $cy
    };
  };
  $render__9 = function(dynamic $opt, dynamic $children) use ($bm,$render__0) {
    if ($opt) {
      $sth = $opt[1];
      $txt = $sth;
    }
    else {$txt = $bm;}
    $ct = 0;
    $cu = Vector{0, $txt};
    $cv = 0;
    return function(dynamic $cw, dynamic $cx) use ($ct,$cu,$cv,$render__0) {
      return $render__0($cv, $cu, $ct, $cw, $cx);
    };
  };
  
  $log($bn);
  
  $startSeconds = $caml_sys_time(0);
  
  $suppress[1] = 0;
  
  $i__0 = 0;
  
  $continue_counter = null;
  for (;;) {
    $stateless = $element(Vector{0, $render__9($bq, 0)});
    $printSection($br);
    $containerRoot = $create(0);
    $j__0 = 0;
    for (;;) {
      $bZ = $element(Vector{0, $render__9($bY, 0)});
      $render(
        $containerRoot,
        $element(
          Vector{
            0,
            (function(dynamic $cq) use ($b0,$render__2) {
               return function(dynamic $cr, dynamic $cs) use ($b0,$cq,$render__2) {
                 return $render__2($b0, $cq, $cr, $cs);
               };
             })($bZ)
          }
        )
      );
      $b1 = (int) ($j__0 + 1);
      if (10 !== $j__0) {$j__0 = $b1;continue;}
      $printSection($bs);
      $counterRoot = $create(0);
      $bt = 0;
      $render(
        $counterRoot,
        $element(
          Vector{
            0,
            (function(dynamic $stateless, dynamic $cn) use ($bu,$render__3) {
               return function(dynamic $co, dynamic $cp) use ($bu,$cn,$render__3,$stateless) {
                 return $render__3($bu, $cn, $stateless, $co, $cp);
               };
             })($stateless, $bt)
          }
        )
      );
      $printRoot($bv, $counterRoot);
      $bw = 0;
      $render(
        $counterRoot,
        $element(
          Vector{
            0,
            (function(dynamic $stateless, dynamic $ck) use ($bx,$render__3) {
               return function(dynamic $cl, dynamic $cm) use ($bx,$ck,$render__3,$stateless) {
                 return $render__3($bx, $ck, $stateless, $cl, $cm);
               };
             })($stateless, $bw)
          }
        )
      );
      $printRoot($by, $counterRoot);
      $bz = 8;
      $render(
        $counterRoot,
        $element(
          Vector{
            0,
            (function(dynamic $stateless, dynamic $ch) use ($bA,$render__3) {
               return function(dynamic $ci, dynamic $cj) use ($bA,$ch,$render__3,$stateless) {
                 return $render__3($bA, $ch, $stateless, $ci, $cj);
               };
             })($stateless, $bz)
          }
        )
      );
      $printRoot($bB, $counterRoot);
      $printSection($bC);
      $appRoot = $create(0);
      $bD = 0;
      $render(
        $appRoot,
        $element(
          Vector{
            0,
            (function(dynamic $stateless, dynamic $ce) use ($render__6) {
               return function(dynamic $cf, dynamic $cg) use ($ce,$render__6,$stateless) {
                 return $render__6($ce, $stateless, $cf, $cg);
               };
             })($stateless, $bD)
          }
        )
      );
      $printRoot($bE, $appRoot);
      $bF = 0;
      $bG = 1;
      $render(
        $appRoot,
        $element(
          Vector{
            0,
            (function(dynamic $ca, dynamic $cb) use ($render__6) {
               return function(dynamic $cc, dynamic $cd) use ($ca,$cb,$render__6) {
                 return $render__6($cb, $ca, $cc, $cd);
               };
             })($bF, $bG)
          }
        )
      );
      $printRoot($bH, $appRoot);
      $printSection($bI);
      $animRoot = $create(0);
      $render(
        $animRoot,
        $element(
          Vector{
            0,
            function(dynamic $b9, dynamic $b_) use ($bJ,$bK,$render__8) {
              return $render__8($bK, $bJ, $b9, $b_);
            }
          }
        )
      );
      $printRoot($bL, $animRoot);
      $tick(0);
      $printRoot($bM, $animRoot);
      $tick(0);
      $printRoot($bN, $animRoot);
      $clearAll(0);
      $printSection($bO);
      $polyRoot = $create(0);
      $bP = 0;
      $render(
        $polyRoot,
        $element(
          Vector{
            0,
            (function(dynamic $b6) use ($bQ,$bR,$render__7) {
               return function(dynamic $b7, dynamic $b8) use ($b6,$bQ,$bR,$render__7) {
                 return $render__7($bR, $bQ, $b6, $b7, $b8);
               };
             })($bP)
          }
        )
      );
      $printRoot($bS, $polyRoot);
      $anotherPolyRoot = $create(0);
      $bT = 0;
      $bV = 0;
      $render(
        $anotherPolyRoot,
        $element(
          Vector{
            0,
            (function(dynamic $b2, dynamic $b3) use ($bU,$render__7) {
               return function(dynamic $b4, dynamic $b5) use ($b2,$b3,$bU,$render__7) {
                 return $render__7($b3, $bU, $b2, $b4, $b5);
               };
             })($bT, $bV)
          }
        )
      );
      $printRoot($bW, $anotherPolyRoot);
      $bX = (int) ($i__0 + 1);
      if (0 !== $i__0) {$i__0 = $bX;$continue_counter = 0;break;}
      $endSeconds = $caml_sys_time(0);
      $log(
        $symbol(
          $bo,
          $string_of_int((int) (($endSeconds - $startSeconds) * 1000))
        )
      );
      $f__0 = $caml_alloc_dummy_function(1, 2);
      $z__0 = varray[];
      $caml_update_dummy($f__0, function(dynamic $x, dynamic $y) {return 1;});
      $caml_update_dummy($z__0, Vector{0, Vector{0, $f__0, $bp}});
      if ($z__0) {
        $match = $z__0[1];
        $str = $match[2];
        $f__1 = $match[1];
        $log($symbol($str, $string_of_int($caml_call2($f__1, 0, 0))));
      }
      $do_at_exit(0);
    }
    if ($continue_counter > 0) {
      $continue_counter -= 1;
      break;
    }
    else if ($continue_counter === 0) {$continue_counter = null;continue;}
  }

}

main();