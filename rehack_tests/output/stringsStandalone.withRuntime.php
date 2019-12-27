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
  $helperVal = $caml_new_string("hello");
  $greeting = $caml_new_string("hello world");
  $greeting__0 = $caml_new_string("hello world with unicode: \xc9\x8a");
  
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
  
  $c = $caml_new_string("true");
  $d = $caml_new_string("false");
  $a = Vector{255, 1, 0, 32752};
  $e = $caml_new_string("String.sub / Bytes.sub");
  $f = $caml_new_string("");
  $w = $caml_new_string(
    "The variable v_ should not conflict with any other variables in scope"
  );
  $g = $caml_new_string("String.length(\"\xc9\x8a\") should be two:");
  $i = $caml_new_string("-1");
  $j = $caml_new_string("-6");
  $k = $caml_new_string("1");
  $l = $caml_new_string("6");
  $m = $caml_new_string("as_df");
  $n = $caml_new_string("index from string with char: ");
  $Q = $caml_new_string("asdf");
  $p = $caml_new_string("index from string without char: ");
  $q = $caml_new_string("Prints seven:");
  $r = $caml_new_string("Prints six:");
  $s = $caml_new_string("Prints six:");
  $t = $caml_new_string("6");
  $u = $caml_new_string("Reason is on \xf0\x9f\x94\xa5");
  $v = $caml_new_string(" trimmed string ");
  $x = $caml_new_string("tmp");
  $O = $caml_new_string("WHEREAMI");
  $A = $caml_new_string("Properly caught invalid string to int conversion.");
  $N = $caml_new_string("Did not properly catch Failure exception");
  $L = $caml_new_string("20");
  $D = $caml_new_string("Properly caught conversion from string '20' to int ");
  $K = $caml_new_string("Did not properly catch conversion from string to int"
  );
  $E = Vector{0, 1, Vector{0, 2, Vector{0, 3, Vector{0, 4, 0}}}};
  $F = Vector{0, 1, Vector{0, 2, Vector{0, 3, Vector{0, 4, 0}}}};
  $G = $caml_new_string("ARE == T: ");
  $H = $caml_new_string("ARE === F: ");
  $I = $caml_new_string("Nans are === (should output true):");
  $J = $caml_new_string("Nans are == (should output false):");
  $failwith = function(dynamic $s) use ($Failure,$caml_wrap_thrown_exception) {
    throw $caml_wrap_thrown_exception(Vector{0, $Failure, $s}) as \Throwable;
  };
  $invalid_arg = function(dynamic $s) use ($Invalid_argument,$caml_wrap_thrown_exception) {
    throw $caml_wrap_thrown_exception(Vector{0, $Invalid_argument, $s}) as \Throwable;
  };
  
  $caml_fresh_oo_id(0);
  
  $anotherName = $caml_int64_float_of_bits($a);
  $b = function(dynamic $s1, dynamic $s2) use ($caml_blit_string,$caml_create_bytes,$caml_ml_string_length) {
    $l1 = $caml_ml_string_length($s1);
    $l2 = $caml_ml_string_length($s2);
    $s = $caml_create_bytes((int) ($l1 + $l2));
    $caml_blit_string($s1, 0, $s, 0, $l1);
    $caml_blit_string($s2, 0, $s, $l1, $l2);
    return $s;
  };
  $string_of_bool = function(dynamic $b) use ($c,$d) {return $b ? $c : ($d);};
  $string_of_int = function(dynamic $n) use ($caml_new_string) {
    return $caml_new_string("" . $n);
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
          catch(\Throwable $Z) {
            $Z = $caml_wrap_exception($Z);
            if ($Z[1] !== $Sys_error) {
              throw $caml_wrap_thrown_exception_reraise($Z) as \Throwable;
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
  $print_int = function(dynamic $i) use ($output_string,$stdout,$string_of_int) {
    return $output_string($stdout, $string_of_int($i));
  };
  $print_endline = function(dynamic $s) use ($caml_ml_flush,$caml_ml_output_char,$output_string,$stdout) {
    $output_string($stdout, $s);
    $caml_ml_output_char($stdout, 10);
    return $caml_ml_flush($stdout);
  };
  $print_newline = function(dynamic $param) use ($caml_ml_flush,$caml_ml_output_char,$stdout) {
    $caml_ml_output_char($stdout, 10);
    return $caml_ml_flush($stdout);
  };
  $do_at_exit = function(dynamic $param) use ($flush_all) {
    return $flush_all(0);
  };
  $make = function(dynamic $n, dynamic $c) use ($caml_create_bytes,$caml_fill_bytes) {
    $s = $caml_create_bytes($n);
    $caml_fill_bytes($s, 0, $n, $c);
    return $s;
  };
  $empty = $caml_create_bytes(0);
  $sub = function(dynamic $s, dynamic $ofs, dynamic $len) use ($caml_blit_bytes,$caml_create_bytes,$caml_ml_bytes_length,$e,$invalid_arg) {
    if (0 <= $ofs) {
      if (0 <= $len) {
        if (! ((int) ($caml_ml_bytes_length($s) - $len) < $ofs)) {
          $r = $caml_create_bytes($len);
          $caml_blit_bytes($s, $ofs, $r, 0, $len);
          return $r;
        }
      }
    }
    return $invalid_arg($e);
  };
  $is_space = function(dynamic $param) use ($unsigned_right_shift_32) {
    $Y = (int) ($param + -9);
    $switch__0 = 4 < $unsigned_right_shift_32($Y, 0)
      ? 23 === $Y ? 1 : (0)
      : (2 === $Y ? 0 : (1));
    return $switch__0 ? 1 : (0);
  };
  $trim = function(dynamic $s) use ($caml_bytes_unsafe_get,$caml_ml_bytes_length,$empty,$is_space,$sub) {
    $len = $caml_ml_bytes_length($s);
    $i = Vector{0, 0};
    for (;;) {
      if ($i[1] < $len) {
        if ($is_space($caml_bytes_unsafe_get($s, $i[1]))) {$i[1] += 1;continue;}
      }
      $j = Vector{0, (int) ($len + -1)};
      for (;;) {
        if ($i[1] <= $j[1]) {
          if ($is_space($caml_bytes_unsafe_get($s, $j[1]))) {$j[1] += -1;continue;}
        }
        return $i[1] <= $j[1]
          ? $sub($s, $i[1], (int) ((int) ($j[1] - $i[1]) + 1))
          : ($empty);
      }
      if ($continue_counter > 0) {
        $continue_counter -= 1;
        break;
      }
      else if ($continue_counter === 0) {$continue_counter = null;continue;}
    }
  };
  $bos = function(dynamic $X) {return $X;};
  $bts = function(dynamic $W) {return $W;};
  $make__0 = function(dynamic $n, dynamic $c) use ($bts,$make) {
    return $bts($make($n, $c));
  };
  $is_space__0 = function(dynamic $param) use ($unsigned_right_shift_32) {
    $V = (int) ($param + -9);
    $switch__0 = 4 < $unsigned_right_shift_32($V, 0)
      ? 23 === $V ? 1 : (0)
      : (2 === $V ? 0 : (1));
    return $switch__0 ? 1 : (0);
  };
  $trim__0 = function(dynamic $s) use ($bos,$bts,$caml_bytes_unsafe_get,$caml_ml_string_length,$caml_string_equal,$f,$is_space__0,$trim) {
    if ($caml_string_equal($s, $f)) {return $s;}
    if (! $is_space__0($caml_bytes_unsafe_get($s, 0))) {
      if (
        !
        $is_space__0(
          $caml_bytes_unsafe_get($s, (int) ($caml_ml_string_length($s) + -1))
        )
      ) {return $s;}
    }
    return $bts($trim($bos($s)));
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
  $index = function(dynamic $s, dynamic $c) use ($caml_ml_string_length,$index_rec) {
    return $index_rec($s, $caml_ml_string_length($s), 0, $c);
  };
  
  $print_endline($greeting);
  
  $print_endline($greeting__0);
  
  $print_endline($b($g, $string_of_int(2)));
  
  $h = $make__0(1, 138);
  
  $print_endline($b($make__0(1, 201), $h));
  
  $caml_int_of_string($i);
  
  $caml_int_of_string($j);
  
  $one = $caml_int_of_string($k);
  $six = $caml_int_of_string($l);
  $index__0 = $index($m, 95);
  
  $print_endline($b($n, $string_of_int($index__0)));
  
  try {$R = $index($Q, 95);$index__1 = $R;}
  catch(\Throwable $U) {
    $U = $caml_wrap_exception($U);
    if ($U !== $Not_found) {
      throw $caml_wrap_thrown_exception_reraise($U) as \Throwable;
    }
    $o = -1;
    $index__1 = $o;
  }
  
  $print_endline($b($p, $string_of_int($index__1)));
  
  $print_int($index__1);
  
  $print_endline($q);
  
  $print_int((int) ($one + $six));
  
  $print_newline(0);
  
  $print_endline($r);
  
  $print_int($six);
  
  $print_newline(0);
  
  $print_endline($s);
  
  $print_string($t);
  
  $print_newline(0);
  
  $print_endline($helperVal);
  
  $print_endline($u);
  
  $print_endline($trim__0($v));
  
  $createIntFromString = function(dynamic $ss) use ($caml_int_of_string) {
    return $caml_int_of_string($ss);
  };
  $myFunction = function
  (dynamic $cst_The_variable_v_should_not_conflict_with_any_other_variables_in_scope) use ($print_newline,$print_string,$w) {
    $print_string($w);
    return $print_newline(0);
  };
  
  $myFunction($x);
  
  try {$P = $createIntFromString($O);$z = $P;}
  catch(\Throwable $T) {
    $T = $caml_wrap_exception($T);
    if ($T[1] !== $Failure) {
      throw $caml_wrap_thrown_exception_reraise($T) as \Throwable;
    }
    $y = 102;
    $z = $y;
  }
  
  if (102 === $z) {
    $print_string($A);
    $print_newline(0);
  }
  else {$failwith($N);}
  
  try {$M = $createIntFromString($L);$C = $M;}
  catch(\Throwable $S) {
    $S = $caml_wrap_exception($S);
    if ($S[1] !== $Failure) {
      throw $caml_wrap_thrown_exception_reraise($S) as \Throwable;
    }
    $B = 102;
    $C = $B;
  }
  
  if (20 === $C) {
    $print_string($b($D, $string_of_int($C)));
    $print_newline(0);
  }
  else {$failwith($K);}
  
  $one__0 = Vector{0, $E};
  $two = Vector{0, $F};
  
  $print_string($b($G, $string_of_bool($caml_equal($one__0, $two))));
  
  $print_newline(0);
  
  $print_string($b($H, $string_of_bool($one__0 === $two ? 1 : (0))));
  
  $print_newline(0);
  
  $print_string(
    $b($I, $string_of_bool($anotherName === $anotherName ? 1 : (0)))
  );
  
  $print_newline(0);
  
  $print_string(
    $b($J, $string_of_bool($anotherName === $anotherName ? 1 : (0)))
  );
  
  $print_newline(0);
  
  $do_at_exit(0);

}

main();