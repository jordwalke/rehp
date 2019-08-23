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
  $au = new Ref();
  $d = new Ref();
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
  
  $c = $caml_new_string("%.12g");
  $b = $caml_new_string(".");
  $g = $caml_new_string("String.contains_from / Bytes.contains_from");
  $f = $caml_new_string("");
  $e = $caml_new_string("String.concat");
  $h = $caml_new_string("Random.int");
  $i = Vector{
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
  $k = Vector{0, 0, 0};
  $m = $caml_new_string("  ");
  $n = $caml_new_string("");
  $o = $caml_new_string("  ");
  $p = $caml_new_string("    ");
  $q = $caml_new_string("      ");
  $r = $caml_new_string("        ");
  $s = $caml_new_string("          ");
  $t = $caml_new_string("            ");
  $u = $caml_new_string("              ");
  $v = $caml_new_string("                ");
  $aj = $caml_new_string("\"");
  $ak = $caml_new_string("\"");
  $ag = $caml_new_string("@max-depth");
  $ae = $caml_new_string("@max-length");
  $ac = $caml_new_string("~unknown");
  $aa = $caml_new_string("~lazy");
  $Y = Vector{0, $caml_new_string("[|"), $caml_new_string("|]")};
  $V = $caml_new_string(")");
  $W = $caml_new_string("closure(");
  $T = Vector{0, $caml_new_string("{"), $caml_new_string("}")};
  $K = $caml_new_string(",\n");
  $E = $caml_new_string("");
  $F = $caml_new_string("]");
  $G = $caml_new_string("\n");
  $H = $caml_new_string(",\n");
  $I = $caml_new_string("\n");
  $J = $caml_new_string("[");
  $P = $caml_new_string(", ");
  $L = $caml_new_string("");
  $M = $caml_new_string("]");
  $N = $caml_new_string(", ");
  $O = $caml_new_string("[");
  $A = $caml_new_string(",\n");
  $w = $caml_new_string("");
  $x = $caml_new_string("\n");
  $y = $caml_new_string(",\n");
  $z = $caml_new_string("\n");
  $D = $caml_new_string(", ");
  $B = $caml_new_string("");
  $C = $caml_new_string(", ");
  $l = Vector{0, 0, 0};
  $ap = $caml_new_string("\n");
  $ao = $caml_new_string("\n");
  $an = $caml_new_string("\n");
  $am = $caml_new_string("\n");
  $aq = $caml_new_string("Length changing sequences aren't supported yet.");
  $ar = $caml_new_string("Empty list cannot be split at ");
  $as = $caml_new_string("");
  $at = $caml_new_string("Impossible");
  $aK = $caml_new_string("");
  $av = $caml_new_string(" ");
  $aw = $caml_new_string("IEmpty");
  $ax = $caml_new_string(")");
  $ay = $caml_new_string(" ");
  $az = $caml_new_string("IOne(");
  $aA = $caml_new_string(")");
  $aB = $caml_new_string("\n");
  $aC = $caml_new_string("\n");
  $aD = $caml_new_string(",");
  $aE = $caml_new_string("\n");
  $aF = $caml_new_string("ITwo(");
  $aG = $caml_new_string(")");
  $aH = $caml_new_string(" ");
  $aI = $caml_new_string(",");
  $aJ = $caml_new_string("IOrderedMap(");
  $aV = $caml_new_string("");
  $aL = $caml_new_string("}");
  $aM = $caml_new_string("\n");
  $aN = $caml_new_string(" ");
  $aO = $caml_new_string("  subtree: ");
  $aP = $caml_new_string(",\n");
  $aS = $caml_new_string("\"");
  $aT = $caml_new_string("\"");
  $aU = $caml_new_string("-");
  $aQ = $caml_new_string("  state: ");
  $aR = $caml_new_string("{\n");
  $aX = $caml_new_string("\n");
  $aY = $caml_new_string("\n\n");
  $aZ = $caml_new_string("\n");
  $a0 = $caml_new_string("<NotRendered>");
  $a1 = $caml_new_string("\n\n");
  $aW = $caml_new_string("\n\n");
  $a2 = $caml_new_string("");
  $a4 = $caml_new_string("deafult");
  $a3 = Vector{0, $caml_new_string("buttonClass")};
  $a6 = $caml_new_string("deafult");
  $a5 = Vector{0, $caml_new_string("childContainer")};
  $a7 = $caml_new_string("size changed times:");
  $a8 = Vector{0, $caml_new_string("ButtonInContainerThatCountsSizeChanges")};
  $a_ = $caml_new_string("deafult");
  $a9 = Vector{0, $caml_new_string("divRenderedByInput")};
  $bb = $caml_new_string("divClicked!");
  $ba = $caml_new_string("MyReducer:");
  $bf = $caml_new_string("AppInstance");
  $bc = Vector{0, $caml_new_string("initialInputText")};
  $be = $caml_new_string("haha I am controlling your input");
  $bd = Vector{0, $caml_new_string("divRenderedByAppContainsInput")};
  $bj = $caml_new_string(")");
  $bk = $caml_new_string("->animFiredWithDeepDivState(");
  $bl = $caml_new_string("rafDeepDiv");
  $bm = Vector{0, $caml_new_string("rafSecond")};
  $bn = Vector{0, $caml_new_string("rafFirstDiv")};
  $bi = $caml_new_string("initialAnimationFrameSetup");
  $bh = Vector{0, $caml_new_string("TODO")};
  $bo = $caml_new_string("default");
  $bp = $caml_new_string("HELLO");
  $bs = Vector{0, $caml_new_string("stateless")};
  $bt = $caml_new_string(
    "\n\n-------------------\nChild Container \n-------------------"
  );
  $b0 = Vector{0, $caml_new_string("stateless")};
  $b2 = Vector{0, $caml_new_string("Foo")};
  $bu = $caml_new_string(
    "\n\n-------------------\nGets Derived State From Props\n-------------------"
  );
  $bw = Vector{0, $caml_new_string("Foo")};
  $bx = $caml_new_string("Init:");
  $bz = Vector{0, $caml_new_string("Foo")};
  $bA = $caml_new_string("Update Without Changing Props:");
  $bC = Vector{0, $caml_new_string("Foo")};
  $bD = $caml_new_string("Update With Changing Props:");
  $bE = $caml_new_string(
    "\n\n------------------------------\nApp With Controlled Input\n------------------------------"
  );
  $bG = $caml_new_string("Init:");
  $bJ = $caml_new_string("Update:");
  $bK = $caml_new_string(
    "\n\n------------------------------\nApp With Request Animation Frame \n----------------------"
  );
  $bL = Vector{0, 2, 3};
  $bM = Vector{0, $caml_new_string("")};
  $bN = $caml_new_string("Init:");
  $bO = $caml_new_string("Update After raf tick:");
  $bP = $caml_new_string("Update After raf tick:");
  $bQ = $caml_new_string(
    "\n\n------------------------------\nApp With Polymoprhic State \n----------------------------"
  );
  $bS = $caml_new_string("zero");
  $bT = $caml_new_string("hello");
  $bU = $caml_new_string("Init:");
  $bW = $caml_new_string("zero");
  $bY = $caml_new_string("Another Type Init:");
  $bq = $caml_new_string("Total ms (Title): %d ");
  $br = $caml_new_string("Second Part Of Tuple:");
  $invalid_arg = function(dynamic $s) use ($Invalid_argument,$caml_wrap_thrown_exception) {
    throw $caml_wrap_thrown_exception(Vector{0, $Invalid_argument, $s}) as \Throwable;
  };
  
  $caml_fresh_oo_id(0);
  
  $a = function(dynamic $s1, dynamic $s2) use ($caml_blit_string,$caml_create_bytes,$caml_ml_string_length) {
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
  $valid_float_lexem = function(dynamic $s) use ($a,$b,$caml_ml_string_length,$caml_string_get) {
    $l = $caml_ml_string_length($s);
    $loop = function(dynamic $i) use ($a,$b,$caml_string_get,$l,$s) {
      $i__0 = $i;
      for (;;) {
        if ($l <= $i__0) {return $a($s, $b);}
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
  $string_of_float = function(dynamic $f) use ($c,$caml_format_float,$valid_float_lexem) {
    return $valid_float_lexem($caml_format_float($c, $f));
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
          catch(\Throwable $ew) {
            $ew = $caml_wrap_exception($ew);
            if ($ew[1] !== $Sys_error) {
              throw $caml_wrap_thrown_exception_reraise($ew) as \Throwable;
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
  $d->contents = function(dynamic $i, dynamic $f, dynamic $param) use ($caml_call2,$d) {
    if ($param) {
      $l = $param[2];
      $a = $param[1];
      $r = $caml_call2($f, $i, $a);
      return Vector{0, $r, $d->contents((int) ($i + 1), $f, $l)};
    }
    return 0;
  };
  $mapi = function(dynamic $f, dynamic $l) use ($d) {
    return $d->contents(0, $f, $l);
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
    $ep = (int) ($caml_ml_bytes_length($s) + -1);
    $eo = 0;
    if (! ($ep < 0)) {
      $i__0 = $eo;
      for (;;) {
        $match = $caml_bytes_unsafe_get($s, $i__0);
        if (32 <= $match) {
          $et = (int) ($match + -34);
          if (58 < $unsigned_right_shift_32($et, 0)) {
            if (93 <= $et) {
              $switch__0 = 0;
              $switch__1 = 0;
            }
            else {$switch__1 = 1;}
          }
          else {
            if (56 < $unsigned_right_shift_32((int) ($et + -1), 0)) {$switch__0 = 1;$switch__1 = 0;}
            else {$switch__1 = 1;}
          }
          if ($switch__1) {$eu = 1;$switch__0 = 2;}
        }
        else {
          $switch__0 = 11 <= $match
            ? 13 === $match ? 1 : (0)
            : (8 <= $match ? 1 : (0));
        }
        switch($switch__0) {
          // FALLTHROUGH
          case 0:
            $eu = 4;
            break;
          // FALLTHROUGH
          case 1:
            $eu = 2;
            break;
          }
        $n[1] = (int) ($n[1] + $eu);
        $ev = (int) ($i__0 + 1);
        if ($ep !== $i__0) {$i__0 = $ev;continue;}
        break;
      }
    }
    if ($n[1] === $caml_ml_bytes_length($s)) {return $copy($s);}
    $s__0 = $caml_create_bytes($n[1]);
    $n[1] = 0;
    $er = (int) ($caml_ml_bytes_length($s) + -1);
    $eq = 0;
    if (! ($er < 0)) {
      $i = $eq;
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
        $es = (int) ($i + 1);
        if ($er !== $i) {$i = $es;continue;}
        break;
      }
    }
    return $s__0;
  };
  $bos = function(dynamic $en) {return $en;};
  $bts = function(dynamic $em) {return $em;};
  $ensure_ge = function(dynamic $x, dynamic $y) use ($e,$invalid_arg) {
    return $y <= $x ? $x : ($invalid_arg($e));
  };
  $sum_lengths = function(dynamic $acc, dynamic $seplen, dynamic $param) use ($caml_ml_string_length,$ensure_ge) {
    $acc__0 = $acc;
    $param__0 = $param;
    for (;;) {
      if ($param__0) {
        $ek = $param__0[2];
        $el = $param__0[1];
        if ($ek) {
          $acc__1 = $ensure_ge(
            (int)
            ((int) ($caml_ml_string_length($el) + $seplen) + $acc__0),
            $acc__0
          );
          $acc__0 = $acc__1;
          $param__0 = $ek;
          continue;
        }
        return (int) ($caml_ml_string_length($el) + $acc__0);
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
        $ei = $param__0[2];
        $ej = $param__0[1];
        if ($ei) {
          $caml_blit_string($ej, 0, $dst, $pos__0, $caml_ml_string_length($ej)
          );
          $caml_blit_string(
            $sep,
            0,
            $dst,
            (int)
            ($pos__0 + $caml_ml_string_length($ej)),
            $seplen
          );
          $pos__1 = (int)
          ((int) ($pos__0 + $caml_ml_string_length($ej)) + $seplen);
          $pos__0 = $pos__1;
          $param__0 = $ei;
          continue;
        }
        $caml_blit_string($ej, 0, $dst, $pos__0, $caml_ml_string_length($ej));
        return $dst;
      }
      return $dst;
    }
  };
  $concat = function(dynamic $sep, dynamic $l) use ($bts,$caml_create_bytes,$caml_ml_string_length,$f,$sum_lengths,$unsafe_blits) {
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
    return $f;
  };
  $escaped__0 = function(dynamic $s) use ($bos,$bts,$caml_bytes_unsafe_get,$caml_ml_string_length,$escaped,$unsigned_right_shift_32) {
    $needs_escape = function(dynamic $i) use ($caml_bytes_unsafe_get,$caml_ml_string_length,$s,$unsigned_right_shift_32) {
      $i__0 = $i;
      for (;;) {
        if ($caml_ml_string_length($s) <= $i__0) {return 0;}
        $match = $caml_bytes_unsafe_get($s, $i__0);
        if (32 <= $match) {
          $eh = (int) ($match + -34);
          if (58 < $unsigned_right_shift_32($eh, 0)) {
            if (93 <= $eh) {
              $switch__0 = 0;
              $switch__1 = 0;
            }
            else {$switch__1 = 1;}
          }
          else {
            if (56 < $unsigned_right_shift_32((int) ($eh + -1), 0)) {$switch__0 = 1;$switch__1 = 0;}
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
  $contains_from = function(dynamic $s, dynamic $i, dynamic $c) use ($Not_found,$caml_ml_string_length,$caml_wrap_exception,$caml_wrap_thrown_exception_reraise,$g,$index_rec,$invalid_arg) {
    $l = $caml_ml_string_length($s);
    if (0 <= $i) {
      if (! ($l < $i)) {
        try {$index_rec($s, $l, $i, $c);$ef = 1;return $ef;}
        catch(\Throwable $eg) {
          $eg = $caml_wrap_exception($eg);
          if ($eg === $Not_found) {return 0;}
          throw $caml_wrap_thrown_exception_reraise($eg) as \Throwable;
        }
      }
    }
    return $invalid_arg($g);
  };
  $contains = function(dynamic $s, dynamic $c) use ($contains_from) {
    return $contains_from($s, 0, $c);
  };
  
  $caml_fresh_oo_id(0);
  
  $caml_fresh_oo_id(0);
  
  $bits = function(dynamic $s) use ($caml_check_bound,$unsigned_right_shift_32) {
    $s[2] = (int) ((int) ($s[2] + 1) % 55);
    $ec = $s[2];
    $curval = $caml_check_bound($s[1], $ec)[$ec + 1];
    $ed = (int) ((int) ($s[2] + 24) % 55);
    $newval = (int)
    ($caml_check_bound($s[1], $ed)[$ed + 1] +
       ($curval ^ (int) $unsigned_right_shift_32($curval, 25) & 31));
    $newval30 = $newval & 1073741823;
    $ee = $s[2];
    $caml_check_bound($s[1], $ee)[$ee + 1] = $newval30;
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
  $int__0 = function(dynamic $s, dynamic $bound) use ($h,$intaux,$invalid_arg) {
    if (! (1073741823 < $bound)) {
      if (0 < $bound) {return $intaux($s, $bound);}
    }
    return $invalid_arg($h);
  };
  $default__0 = Vector{0, $i->toVector(), 0};
  $int__1 = function(dynamic $bound) use ($default__0,$int__0) {
    return $int__0($default__0, $bound);
  };
  $j = 5;
  $detectList = function(dynamic $maxLength, dynamic $o) use ($caml_equal,$caml_obj_tag) {
    $maxLength__0 = $maxLength;
    $o__0 = $o;
    for (;;) {
      if (0 === $maxLength__0) {return 1;}
      $tag = $caml_obj_tag($o__0);
      $match = $tag === 1000 ? 1 : (0);
      if (0 === $match) {
        $size = $o__0->count() - 1;
        $d_ = $tag === 0 ? 1 : (0);
        if ($d_) {
          $ea = 2 === $size ? 1 : (0);
          if ($ea) {
            $o__1 = $o__0[2];
            $maxLength__1 = (int) ($maxLength__0 + -1);
            $maxLength__0 = $maxLength__1;
            $o__0 = $o__1;
            continue;
          }
          $eb = $ea;
        }
        else {$eb = $d_;}
        return $eb;
      }
      return $caml_equal($o__0, 0);
    }
  };
  $extractList->contents = function(dynamic $maxNum, dynamic $o) use ($extractList,$is_int,$k) {
    if (0 === $maxNum) {return Vector{0, 1 - $is_int($o), 0};}
    if ($is_int($o)) {return $k;}
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
  $getBreakData = function(dynamic $itms) use ($caml_ml_string_length,$contains,$fold_left,$l) {
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
      $l,
      $itms
    );
    $someChildBroke = $match[2];
    $allItemsLen = $match[1];
    return Vector{0, $allItemsLen, $someChildBroke};
  };
  $indentForDepth->contents = function(dynamic $n__0) use ($a,$indentForDepth,$m,$n,$o,$p,$q,$r,$s,$t,$u,$unsigned_right_shift_32,$v) {
    if (8 < $unsigned_right_shift_32($n__0, 0)) {
      return $a($indentForDepth->contents((int) ($n__0 + -1)), $m);
    }
    switch($n__0) {
      // FALLTHROUGH
      case 0:
        return $n;
      // FALLTHROUGH
      case 1:
        return $o;
      // FALLTHROUGH
      case 2:
        return $p;
      // FALLTHROUGH
      case 3:
        return $q;
      // FALLTHROUGH
      case 4:
        return $r;
      // FALLTHROUGH
      case 5:
        return $s;
      // FALLTHROUGH
      case 6:
        return $t;
      // FALLTHROUGH
      case 7:
        return $u;
      // FALLTHROUGH
      default:
        return $v;
      }
  };
  $printTreeShape = function
  (dynamic $pair, dynamic $self, dynamic $depth, dynamic $o) use ($A,$B,$C,$D,$a,$caml_call1,$caml_call3,$caml_ml_string_length,$concat,$extractFields,$getBreakData,$indentForDepth,$j,$map,$w,$x,$y,$z) {
    $right = $pair[2];
    $left = $pair[1];
    $match = $extractFields($j, $o);
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
          ? $B
          : ($a($D, $caml_call1($self[6], $self)));
        $d9 = $a($truncationMsg__0, $right);
        return $a($left, $a($concat($C, $itms), $d9));
      }
    }
    $truncationMsg = 0 === $wasTruncated
      ? $w
      : ($a($A, $a($indentNext, $caml_call1($self[6], $self))));
    $d8 = $a($truncationMsg, $a($x, $a($indent, $right)));
    return $a(
      $left,
      $a($z, $a($indentNext, $a($concat($a($y, $indentNext), $itms), $d8)))
    );
  };
  $printListShape = function(dynamic $self, dynamic $depth, dynamic $o) use ($E,$F,$G,$H,$I,$J,$K,$L,$M,$N,$O,$P,$a,$caml_call1,$caml_call3,$caml_ml_string_length,$concat,$extractList,$getBreakData,$indentForDepth,$j,$map) {
    $match = $extractList->contents($j, $o);
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
          ? $L
          : ($a($P, $caml_call1($self[6], $self)));
        $d7 = $a($truncationMsg__0, $M);
        return $a($O, $a($concat($N, $itms), $d7));
      }
    }
    $truncationMsg = 0 === $wasTruncated
      ? $E
      : ($a($K, $a($indentNext, $caml_call1($self[6], $self))));
    $d6 = $a($truncationMsg, $a($G, $a($indent, $F)));
    return $a(
      $J,
      $a($I, $a($indentNext, $a($concat($a($H, $indentNext), $itms), $d6)))
    );
  };
  $Q = function(dynamic $self, dynamic $opt, dynamic $o) use ($caml_call1,$caml_call2,$caml_call3,$caml_obj_tag,$detectList,$j) {
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
          : ($detectList($j, $o)
           ? $caml_call3($self[12], $self, Vector{0, $depth}, $o)
           : ($tag === 0
            ? $caml_call3($self[11], $self, Vector{0, $depth}, $o)
            : ($caml_call2($self[7], $self, $o))))))));
  };
  $R = function(dynamic $self, dynamic $opt, dynamic $o) use ($printListShape) {
    if ($opt) {
      $sth = $opt[1];
      $depth = $sth;
    }
    else {$depth = 0;}
    return $printListShape($self, $depth, $o);
  };
  $S = function(dynamic $self, dynamic $opt, dynamic $o) use ($T,$printTreeShape) {
    if ($opt) {
      $sth = $opt[1];
      $depth = $sth;
    }
    else {$depth = 0;}
    return $printTreeShape($T, $self, $depth, $o);
  };
  $U = function(dynamic $self, dynamic $f) use ($V,$W,$a,$string_of_int) {
    return $a($W, $a($string_of_int((int) $f), $V));
  };
  $X = function(dynamic $self, dynamic $opt, dynamic $o) use ($Y,$printTreeShape) {
    if ($opt) {
      $sth = $opt[1];
      $depth = $sth;
    }
    else {$depth = 0;}
    return $printTreeShape($Y, $self, $depth, $o);
  };
  $Z = function(dynamic $self, dynamic $o) use ($aa) {return $aa;};
  $ab = function(dynamic $self, dynamic $o) use ($ac) {return $ac;};
  $ad = function(dynamic $self) use ($ae) {return $ae;};
  $af = function(dynamic $self) use ($ag) {return $ag;};
  $ah = function(dynamic $self, dynamic $f) use ($string_of_float) {
    return $string_of_float($f);
  };
  $ai = function(dynamic $self, dynamic $s) use ($a,$aj,$ak,$caml_call2) {
    return $a($ak, $a($caml_call2($self[2], $self, $s), $aj));
  };
  $al = function(dynamic $self, dynamic $s) {return $s;};
  $base = Vector{
    0,
    function(dynamic $self, dynamic $i) use ($string_of_int) {
      return $string_of_int($i);
    },
    $al,
    $ai,
    $ah,
    $af,
    $ad,
    $ab,
    $Z,
    $X,
    $U,
    $S,
    $R,
    $Q
  };
  $makeStandardChannelsConsole = function(dynamic $objectPrinter) use ($a,$am,$an,$ao,$ap,$caml_call3,$native_debug,$native_error,$native_log,$native_warn) {
    $d2 = function(dynamic $a__0) use ($a,$am,$caml_call3,$native_debug,$objectPrinter) {
      return $native_debug(
        $a($caml_call3($objectPrinter[13], $objectPrinter, 0, $a__0), $am)
      );
    };
    $d3 = function(dynamic $a__0) use ($a,$an,$caml_call3,$native_error,$objectPrinter) {
      return $native_error(
        $a($caml_call3($objectPrinter[13], $objectPrinter, 0, $a__0), $an)
      );
    };
    $d4 = function(dynamic $a__0) use ($a,$ao,$caml_call3,$native_warn,$objectPrinter) {
      return $native_warn(
        $a($caml_call3($objectPrinter[13], $objectPrinter, 0, $a__0), $ao)
      );
    };
    $d5 = function(dynamic $a) use ($caml_call3,$native_log,$objectPrinter) {
      return $native_log(
        $caml_call3($objectPrinter[13], $objectPrinter, 0, $a)
      );
    };
    return Vector{
      0,
      function(dynamic $a__0) use ($a,$ap,$caml_call3,$native_log,$objectPrinter) {
        return $native_log(
          $a($caml_call3($objectPrinter[13], $objectPrinter, 0, $a__0), $ap)
        );
      },
      $d5,
      $d4,
      $d3,
      $d2
    };
  };
  $defaultGlobalConsole = $makeStandardChannelsConsole($base);
  $log = function(dynamic $a) use ($caml_call1,$defaultGlobalConsole) {
    return $caml_call1($defaultGlobalConsole[1], $a);
  };
  $mapi3 = function
  (dynamic $f, dynamic $iSoFar, dynamic $revSoFar, dynamic $listA, dynamic $listB, dynamic $listC) use ($Invalid_argument,$aq,$caml_call4,$caml_wrap_thrown_exception,$rev) {
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
      throw $caml_wrap_thrown_exception(Vector{0, $Invalid_argument, $aq}) as \Throwable;
    }
  };
  $mapi3__0 = function
  (dynamic $f, dynamic $listA, dynamic $listB, dynamic $listC) use ($mapi3) {
    return $mapi3($f, 0, 0, $listA, $listB, $listC);
  };
  $splitList = function
  (dynamic $revCount, dynamic $revSoFar, dynamic $splitAt, dynamic $lst) use ($Invalid_argument,$a,$ar,$caml_wrap_thrown_exception,$rev,$string_of_int) {
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
              Vector{0, $Invalid_argument, $a($ar, $string_of_int($splitAt))}
            ) as \Throwable;
    }
  };
  $splitList__0 = function(dynamic $splitAt, dynamic $lst) use ($splitList) {
    return $splitList(0, 0, $splitAt, $lst);
  };
  $nonReducer = function(dynamic $param, dynamic $d1) use ($as) {return $as;};
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
    $d0 = $inst[5];
    return Vector{
      0,
      $inst[1],
      $inst[2],
      $inst[3],
      $inst[4],
      Vector{0, $state, $d0[2], $d0[3], $d0[4]},
      $inst[6]
    };
  };
  $newSelf = function(dynamic $replacer, dynamic $subreplacer) use ($caml_call1,$caml_call2,$caml_update_dummy,$reconcile,$withState) {
    $self = varray[];
    $dU = function(dynamic $extractor, dynamic $e, dynamic $inst) use ($caml_call1,$caml_call2,$reconcile,$withState) {
      $dY = $caml_call1($extractor, $e);
      $nextState = $caml_call2($inst[5][2], $inst, $dY);
      $dZ = $inst[4];
      return $reconcile->contents($withState($inst, $nextState), $dZ);
    };
    $dV = function(dynamic $action) use ($caml_call1,$caml_call2,$reconcile,$replacer,$withState) {
      return $caml_call1(
        $replacer,
        function(dynamic $inst) use ($action,$caml_call2,$reconcile,$withState) {
          $nextState = $caml_call2($inst[5][2], $inst, $action);
          $dX = $inst[4];
          return $reconcile->contents($withState($inst, $nextState), $dX);
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
              $dW = $inst[4];
              return $reconcile->contents($withState($inst, $nextState), $dW);
            }
          );
        },
        $dV,
        $dU
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
          $dT = $initSubtree->contents($nextReplacerB, $stateRendererB);
          return Vector{
            1,
            $initSubtree->contents($nextReplacerA, $stateRendererA),
            $dT
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
    $dS = $reconcileSubtree->contents($inst[6], $inst[5][4], $nextSpec[4]);
    return Vector{0, $inst[1], $inst[2], $inst[3], $renderable, $nextSpec, $dS
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
          $dR = $reconcileSubtree->contents($ib, $rbPrev, $rb);
          return Vector{1, $reconcileSubtree->contents($ia, $raPrev, $ra), $dR
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
  $create = function(dynamic $param) use ($Invalid_argument,$at,$caml_call1,$caml_update_dummy,$caml_wrap_thrown_exception) {
    $root = varray[];
    $dP = 0;
    $caml_update_dummy(
      $root,
      Vector{
        0,
        function(dynamic $swapper) use ($Invalid_argument,$at,$caml_call1,$caml_wrap_thrown_exception,$root) {
          $dQ = $root[2];
          if ($dQ) {
            $ei = $dQ[1];
            $curInst = $ei[2];
            $curElems = $ei[1];
            $nextEi = Vector{0, $curElems, $caml_call1($swapper, $curInst)};
            $root[2] = Vector{0, $nextEi};
            return 0;
          }
          throw $caml_wrap_thrown_exception(Vector{0, $Invalid_argument, $at}) as \Throwable;
        },
        $dP
      }
    );
    return $root;
  };
  $render = function(dynamic $root, dynamic $elems) use ($initSubtree,$reconcileSubtree) {
    $dO = $root[2];
    if ($dO) {
      $ei = $dO[1];
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
  (dynamic $opt, dynamic $subtree) use ($a,$aA,$aB,$aC,$aD,$aE,$aF,$aG,$aH,$aI,$aJ,$aK,$au,$av,$aw,$ax,$ay,$az,$concat,$is_int,$map,$printInstanceCollection) {
    if ($opt) {
      $sth = $opt[1];
      $s = $sth;
    }
    else {$s = $aK;}
    $dNext = $a($av, $s);
    if ($is_int($subtree)) {return $aw;}
    else {
      switch($subtree[0]) {
        // FALLTHROUGH
        case 0:
          $n = $subtree[1];
          return $a($az, $a($au->contents(Vector{0, $a($ay, $s)}, $n), $ax));
        // FALLTHROUGH
        case 1:
          $n2 = $subtree[2];
          $n1 = $subtree[1];
          $dK = $a($aB, $a($s, $aA));
          $dL = $a(
            $aD,
            $a(
              $aC,
              $a(
                $dNext,
                $a(
                  $printInstanceCollection->contents(Vector{0, $dNext}, $n2),
                  $dK
                )
              )
            )
          );
          return $a(
            $aF,
            $a(
              $aE,
              $a(
                $dNext,
                $a(
                  $printInstanceCollection->contents(Vector{0, $dNext}, $n1),
                  $dL
                )
              )
            )
          );
        // FALLTHROUGH
        default:
          $lst = $subtree[1];
          $dM = Vector{0, $a($aH, $s)};
          return $a(
            $aJ,
            $a(
              $concat(
                $aI,
                $map->contents(
                  function(dynamic $dN) use ($dM,$printInstanceCollection) {
                    return $printInstanceCollection->contents($dM, $dN);
                  },
                  $lst
                )
              ),
              $aG
            )
          );
        }
    }
  };
  $au->contents = function(dynamic $opt, dynamic $n) use ($a,$aL,$aM,$aN,$aO,$aP,$aQ,$aR,$aS,$aT,$aU,$aV,$caml_obj_tag,$escaped__0,$is_int,$printInstanceCollection,$string_of_int) {
    if ($opt) {
      $sth = $opt[1];
      $s = $sth;
    }
    else {$s = $aV;}
    $match = $n[5];
    $state = $match[1];
    $dG = $a($aM, $a($s, $aL));
    $dH = $n[6];
    $dI = $a(
      $aP,
      $a(
        $s,
        $a(
          $aO,
          $a(
            $printInstanceCollection->contents(Vector{0, $a($aN, $s)}, $dH),
            $dG
          )
        )
      )
    );
    $dJ = $is_int($state)
      ? $string_of_int($state)
      : ($caml_obj_tag($state) === 252
       ? $a($aT, $a($escaped__0($state), $aS))
       : ($aU));
    return $a($aR, $a($s, $a($aQ, $a($dJ, $dI))));
  };
  $printSection = function(dynamic $s) use ($a,$aW,$log,$suppress) {
    return $suppress[1] ? 0 : ($log($a($aW, $s)));
  };
  $printRoot = function(dynamic $title, dynamic $root) use ($a,$a0,$a1,$aX,$aY,$aZ,$log,$printInstanceCollection,$suppress) {
    $dF = $root[2];
    if (0 === $suppress[1]) {
      if ($dF) {
        $match = $dF[1];
        $subtree = $match[2];
        $log($a($aY, $a($title, $aX)));
        return $log($printInstanceCollection->contents(0, $subtree));
      }
      $log($title);
      return $log($a($a1, $a($a0, $aZ)));
    }
    return 0;
  };
  $domEventHandler = function(dynamic $e) {return 0;};
  $domStateToString = function(dynamic $state) {return $state;};
  $render__0 = function
  (dynamic $onClick, dynamic $opt, dynamic $children, dynamic $state, dynamic $self) use ($a2,$domEventHandler) {
    if ($opt) {
      $sth = $opt[1];
      $className = $sth;
    }
    else {$className = $a2;}
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
  (dynamic $opt, dynamic $size, dynamic $children, dynamic $dA, dynamic $self) use ($a3,$a4,$element,$nonReducer,$render__0) {
    if ($opt) {
      $sth = $opt[1];
      $txt = $sth;
    }
    else {$txt = $a4;}
    if ($dA) {
      $sth__0 = $dA[1];
      $state = $sth__0;
    }
    else {$state = $txt;}
    $dB = 0;
    $dC = 0;
    return Vector{
      0,
      $state,
      $element(
        Vector{
          0,
          function(dynamic $dD, dynamic $dE) use ($a3,$dB,$dC,$render__0) {
            return $render__0($dC, $a3, $dB, $dD, $dE);
          }
        }
      ),
      $nonReducer
    };
  };
  $render__2 = function
  (dynamic $opt, dynamic $children, dynamic $dw, dynamic $self) use ($a5,$a6,$element,$nonReducer,$render__0) {
    if ($opt) {
      $sth = $opt[1];
      $txt = $sth;
    }
    else {$txt = $a6;}
    if ($dw) {
      $sth__0 = $dw[1];
      $state = $sth__0;
    }
    else {$state = $txt;}
    $dx = 0;
    return Vector{
      0,
      $state,
      $element(
        Vector{
          0,
          function(dynamic $dy, dynamic $dz) use ($a5,$children,$dx,$render__0) {
            return $render__0($dx, $a5, $children, $dy, $dz);
          }
        }
      ),
      $nonReducer
    };
  };
  $render__3 = function
  (dynamic $opt, dynamic $size, dynamic $children, dynamic $dj, dynamic $self) use ($a,$a7,$a8,$element,$render__0,$render__1,$string_of_int) {
    ;
    if ($dj) {
      $sth = $dj[1];
      $state = $sth;
    }
    else {$state = Vector{0, $size, 0};}
    $curChangeCount = $state[2];
    $curSize = $state[1];
    $match = $curSize !== $size ? 1 : (0);
    $nextChangeCount = 0 === $match
      ? $curChangeCount
      : ((int) ($curChangeCount + 1));
    $dk = function(dynamic $param, dynamic $dv) use ($state) {return $state;};
    $dl = 0;
    $dm = Vector{0, $a($a7, $string_of_int($nextChangeCount))};
    $dn = 0;
    $dp = $element(
      Vector{
        0,
        function(dynamic $dt, dynamic $du) use ($dl,$dm,$dn,$render__0) {
          return $render__0($dn, $dm, $dl, $dt, $du);
        }
      }
    );
    $dq = 0;
    return Vector{
      0,
      Vector{0, $size, $nextChangeCount},
      Vector{
        1,
        $element(
          Vector{
            0,
            function(dynamic $dr, dynamic $ds) use ($a8,$children,$dq,$render__1) {
              return $render__1($a8, $dq, $children, $dr, $ds);
            }
          }
        ),
        $dp
      },
      $dk
    };
  };
  $render__4 = function
  (dynamic $opt, dynamic $children, dynamic $dc, dynamic $self) use ($a9,$a_,$element,$render__0) {
    if ($opt) {
      $sth = $opt[1];
      $initialText = $sth;
    }
    else {$initialText = $a_;}
    if ($dc) {
      $sth__0 = $dc[1];
      $state = $sth__0;
    }
    else {$state = $initialText;}
    $dd = function(dynamic $param, dynamic $di) use ($state) {return $state;};
    $de = 0;
    $df = 0;
    return Vector{
      0,
      $state,
      $element(
        Vector{
          0,
          function(dynamic $dg, dynamic $dh) use ($a9,$de,$df,$render__0) {
            return $render__0($df, $a9, $de, $dg, $dh);
          }
        }
      ),
      $dd
    };
  };
  $render__5 = function(dynamic $children, dynamic $opt, dynamic $self) use ($a,$ba,$bb,$caml_int_of_string,$print_string,$render__0,$string_of_int) {
    if ($opt) {
      $sth = $opt[1];
      $state = $sth;
    }
    else {$state = 0;}
    $c6 = function(dynamic $param, dynamic $db) use ($caml_int_of_string) {
      $next = $db[1];
      return $caml_int_of_string($next);
    };
    $c7 = 0;
    $c8 = Vector{0, $a($ba, $string_of_int($state))};
    $c9 = Vector{
      0,
      function(dynamic $e) use ($bb,$print_string) {
        return $print_string($bb);
      }
    };
    return Vector{
      0,
      $state,
      Vector{
        0,
        function(dynamic $c_, dynamic $da) use ($c7,$c8,$c9,$render__0) {
          return $render__0($c9, $c8, $c7, $c_, $da);
        }
      },
      $c6
    };
  };
  $render__6 = function
  (dynamic $shouldControlInput, dynamic $children, dynamic $opt, dynamic $self) use ($bc,$bd,$be,$bf,$control,$element,$nonReducer,$render__0,$render__4,$render__5) {
    if ($opt) {
      $sth = $opt[1];
      $state = $sth;
    }
    else {$state = $bf;}
    $cW = 0;
    $input = $element(
      Vector{
        0,
        function(dynamic $c4, dynamic $c5) use ($bc,$cW,$render__4) {
          return $render__4($bc, $cW, $c4, $c5);
        }
      }
    );
    $input__0 = 0 === $shouldControlInput ? $input : ($control($input, $be));
    $cX = 0;
    $cY = $element(
      Vector{
        0,
        function(dynamic $c2, dynamic $c3) use ($cX,$render__5) {
          return $render__5($cX, $c2, $c3);
        }
      }
    );
    $cZ = 0;
    return Vector{
      0,
      $state,
      Vector{
        1,
        $element(
          Vector{
            0,
            function(dynamic $c0, dynamic $c1) use ($bd,$cZ,$input__0,$render__0) {
              return $render__0($cZ, $bd, $input__0, $c0, $c1);
            }
          }
        ),
        $cY
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
    $cQ = function(dynamic $param, dynamic $action) use ($state) {return $state;
    };
    $cR = 0;
    $cS = Vector{0, $size};
    $cT = 0;
    return Vector{
      0,
      $state,
      Vector{
        0,
        function(dynamic $cU, dynamic $cV) use ($cR,$cS,$cT,$render__0) {
          return $render__0($cT, $cS, $cR, $cU, $cV);
        }
      },
      $cQ
    };
  };
  $bg = function(dynamic $x, dynamic $getDefault) use ($caml_call1) {
    if ($x) {$x__0 = $x[1];return $x__0;}
    return $caml_call1($getDefault, 0);
  };
  $onRaf = function(dynamic $e) use ($bh) {return $bh;};
  $initialStateGetter = function(dynamic $self, dynamic $param) use ($bi,$caml_call1,$onRaf,$request) {
    $request($caml_call1($self[1], $onRaf));
    return $bi;
  };
  $render__8 = function
  (dynamic $opt, dynamic $param, dynamic $state, dynamic $self) use ($a,$bg,$bj,$bk,$bl,$bm,$bn,$caml_call1,$domStateToString,$element,$initialStateGetter,$int__1,$onRaf,$render__0,$request,$string_of_int) {
    ;
    $state__0 = $bg(
      $state,
      function(dynamic $cP) use ($initialStateGetter,$self) {
        return $initialStateGetter($self, $cP);
      }
    );
    $cA = function(dynamic $inst, dynamic $action) use ($a,$bj,$bk,$caml_call1,$domStateToString,$onRaf,$request,$self,$state__0) {
      $match = $inst[6][2][1][6];
      $deepestDiv = $match[1];
      $divStateStr = $domStateToString($deepestDiv[5][1]);
      $request($caml_call1($self[1], $onRaf));
      return $a($state__0, $a($bk, $a($divStateStr, $bj)));
    };
    $cB = 0;
    $cC = Vector{0, $a($bl, $string_of_int($int__1(10)))};
    $cD = 0;
    $cE = $element(
      Vector{
        0,
        function(dynamic $cN, dynamic $cO) use ($cB,$cC,$cD,$render__0) {
          return $render__0($cD, $cC, $cB, $cN, $cO);
        }
      }
    );
    $cF = 0;
    $cG = $element(
      Vector{
        0,
        function(dynamic $cL, dynamic $cM) use ($bm,$cE,$cF,$render__0) {
          return $render__0($cF, $bm, $cE, $cL, $cM);
        }
      }
    );
    $cH = 0;
    $cI = 0;
    return Vector{
      0,
      $state__0,
      Vector{
        1,
        $element(
          Vector{
            0,
            function(dynamic $cJ, dynamic $cK) use ($bn,$cH,$cI,$render__0) {
              return $render__0($cI, $bn, $cH, $cJ, $cK);
            }
          }
        ),
        $cG
      },
      $cA
    };
  };
  $render__9 = function(dynamic $opt, dynamic $children) use ($bo,$render__0) {
    if ($opt) {
      $sth = $opt[1];
      $txt = $sth;
    }
    else {$txt = $bo;}
    $cv = 0;
    $cw = Vector{0, $txt};
    $cx = 0;
    return function(dynamic $cy, dynamic $cz) use ($cv,$cw,$cx,$render__0) {
      return $render__0($cx, $cw, $cv, $cy, $cz);
    };
  };
  
  $log($bp);
  
  $startSeconds = $caml_sys_time(0);
  
  $suppress[1] = 0;
  
  $i__0 = 0;
  
  $continue_counter = null;
  for (;;) {
    $stateless = $element(Vector{0, $render__9($bs, 0)});
    $printSection($bt);
    $containerRoot = $create(0);
    $j__0 = 0;
    for (;;) {
      $b1 = $element(Vector{0, $render__9($b0, 0)});
      $render(
        $containerRoot,
        $element(
          Vector{
            0,
            (function(dynamic $cs) use ($b2,$render__2) {
               return function(dynamic $ct, dynamic $cu) use ($b2,$cs,$render__2) {
                 return $render__2($b2, $cs, $ct, $cu);
               };
             })($b1)
          }
        )
      );
      $b3 = (int) ($j__0 + 1);
      if (10 !== $j__0) {$j__0 = $b3;continue;}
      $printSection($bu);
      $counterRoot = $create(0);
      $bv = 0;
      $render(
        $counterRoot,
        $element(
          Vector{
            0,
            (function(dynamic $stateless, dynamic $cp) use ($bw,$render__3) {
               return function(dynamic $cq, dynamic $cr) use ($bw,$cp,$render__3,$stateless) {
                 return $render__3($bw, $cp, $stateless, $cq, $cr);
               };
             })($stateless, $bv)
          }
        )
      );
      $printRoot($bx, $counterRoot);
      $by = 0;
      $render(
        $counterRoot,
        $element(
          Vector{
            0,
            (function(dynamic $stateless, dynamic $cm) use ($bz,$render__3) {
               return function(dynamic $cn, dynamic $co) use ($bz,$cm,$render__3,$stateless) {
                 return $render__3($bz, $cm, $stateless, $cn, $co);
               };
             })($stateless, $by)
          }
        )
      );
      $printRoot($bA, $counterRoot);
      $bB = 8;
      $render(
        $counterRoot,
        $element(
          Vector{
            0,
            (function(dynamic $stateless, dynamic $cj) use ($bC,$render__3) {
               return function(dynamic $ck, dynamic $cl) use ($bC,$cj,$render__3,$stateless) {
                 return $render__3($bC, $cj, $stateless, $ck, $cl);
               };
             })($stateless, $bB)
          }
        )
      );
      $printRoot($bD, $counterRoot);
      $printSection($bE);
      $appRoot = $create(0);
      $bF = 0;
      $render(
        $appRoot,
        $element(
          Vector{
            0,
            (function(dynamic $stateless, dynamic $cg) use ($render__6) {
               return function(dynamic $ch, dynamic $ci) use ($cg,$render__6,$stateless) {
                 return $render__6($cg, $stateless, $ch, $ci);
               };
             })($stateless, $bF)
          }
        )
      );
      $printRoot($bG, $appRoot);
      $bH = 0;
      $bI = 1;
      $render(
        $appRoot,
        $element(
          Vector{
            0,
            (function(dynamic $cc, dynamic $cd) use ($render__6) {
               return function(dynamic $ce, dynamic $cf) use ($cc,$cd,$render__6) {
                 return $render__6($cd, $cc, $ce, $cf);
               };
             })($bH, $bI)
          }
        )
      );
      $printRoot($bJ, $appRoot);
      $printSection($bK);
      $animRoot = $create(0);
      $render(
        $animRoot,
        $element(
          Vector{
            0,
            function(dynamic $ca, dynamic $cb) use ($bL,$bM,$render__8) {
              return $render__8($bM, $bL, $ca, $cb);
            }
          }
        )
      );
      $printRoot($bN, $animRoot);
      $tick(0);
      $printRoot($bO, $animRoot);
      $tick(0);
      $printRoot($bP, $animRoot);
      $clearAll(0);
      $printSection($bQ);
      $polyRoot = $create(0);
      $bR = 0;
      $render(
        $polyRoot,
        $element(
          Vector{
            0,
            (function(dynamic $b8) use ($bS,$bT,$render__7) {
               return function(dynamic $b9, dynamic $b_) use ($b8,$bS,$bT,$render__7) {
                 return $render__7($bT, $bS, $b8, $b9, $b_);
               };
             })($bR)
          }
        )
      );
      $printRoot($bU, $polyRoot);
      $anotherPolyRoot = $create(0);
      $bV = 0;
      $bX = 0;
      $render(
        $anotherPolyRoot,
        $element(
          Vector{
            0,
            (function(dynamic $b4, dynamic $b5) use ($bW,$render__7) {
               return function(dynamic $b6, dynamic $b7) use ($b4,$b5,$bW,$render__7) {
                 return $render__7($b5, $bW, $b4, $b6, $b7);
               };
             })($bV, $bX)
          }
        )
      );
      $printRoot($bY, $anotherPolyRoot);
      $bZ = (int) ($i__0 + 1);
      if (0 !== $i__0) {$i__0 = $bZ;$continue_counter = 0;break;}
      $endSeconds = $caml_sys_time(0);
      $log(
        $a($bq, $string_of_int((int) (($endSeconds - $startSeconds) * 1000)))
      );
      $f__0 = $caml_alloc_dummy_function(1, 2);
      $z__0 = varray[];
      $caml_update_dummy($f__0, function(dynamic $x, dynamic $y) {return 1;});
      $caml_update_dummy($z__0, Vector{0, Vector{0, $f__0, $br}});
      if ($z__0) {
        $match = $z__0[1];
        $str = $match[2];
        $f__1 = $match[1];
        $log($a($str, $string_of_int($caml_call2($f__1, 0, 0))));
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