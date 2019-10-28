<?hh


$String = $joo_global_object->String;


$caml_wrap_thrown_exception = function($e) use ($String, $caml_global_data) {
  if ($e is RehpExceptionBox) {
    return $e;
  }
  // Check for __isArrayLike because some exceptions are manually constructed in stubs
  if ($e is R || $e is V || isset($e->__isArrayLike)) {
    return new RehpExceptionBox($e);
  }
  // Stack overflows cannot be caught reliably in PHP it seems. Cannot easily
  // map it to Stack_overflow.

  // Wrap Error in Js.Error exception
  if ($e is \Exception) { // && $caml_named_value("phpError"))
    // return [0,caml_named_value("phpError"),e];
    return new RehpExceptionBox(
      R(0, $String->new("phpError"), $e),
      $e->getCode(),
      $e,
    );
  }
  //fallback: wrapped in Failure
  // Again, with proper stubs this will refer to the actual Failure - always
  // kept in sync.
  return new RehpExceptionBox(R(0, $caml_global_data->Failure, $e));
};


$caml_wrap_exception = function($e) use ($String, $caml_global_data) {
  if ($e is RehpExceptionBox) {
    return $e->contents;
  }
  // Check for __isArrayLike because some exceptions are manually constructed in stubs
  if ($e is R || $e is V || isset($e->__isArrayLike)) {
    return $e;
  }
  // Stack overflows cannot be caught reliably in PHP it seems. Cannot easily
  // map it to Stack_overflow.
  // Wrap Error in Js.Error exception
  if ($e is \Throwable) { // && $caml_named_value("phpError"))
    // return [0,caml_named_value("phpError"),e];
    return R(0, $String->new("phpError"), $e);
  }
  //fallback: wrapped in Failure
  // Again, with proper stubs this will refer to the actual Failure - always
  // kept in sync.
  return R(0, $caml_global_data->Failure, $e);
};


$caml_wrap_thrown_exception_reraise = $caml_wrap_thrown_exception;


$f2 = new Ref();
$g1 = new Ref();

$Out_of_memory = Vector {248, $caml_new_string("Out_of_memory"), -1};
$Sys_error = Vector {248, $caml_new_string("Sys_error"), -2};
$Failure = Vector {248, $caml_new_string("Failure"), -3};
$Invalid_argument = Vector {248, $caml_new_string("Invalid_argument"), -4};
$End_of_file = Vector {248, $caml_new_string("End_of_file"), -5};
$Division_by_zero = Vector {248, $caml_new_string("Division_by_zero"), -6};
$Not_found = Vector {248, $caml_new_string("Not_found"), -7};
$Match_failure = Vector {248, $caml_new_string("Match_failure"), -8};
$Stack_overflow = Vector {248, $caml_new_string("Stack_overflow"), -9};
$Sys_blocked_io = Vector {248, $caml_new_string("Sys_blocked_io"), -10};
$Assert_failure = Vector {248, $caml_new_string("Assert_failure"), -11};
$Undefined_recursive_module = Vector {
  248,
  $caml_new_string("Undefined_recursive_module"),
  -12,
};

$caml_register_global(
  11,
  $Undefined_recursive_module,
  "Undefined_recursive_module",
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

$a = Vector {
  0,
  $caml_new_string("rehack_tests/switch_continue/switch_continue.re"),
  72,
  18,
};

$caml_fresh_oo_id(0);

$string_of_int = function(dynamic $n) use ($caml_new_string) {
  return $caml_new_string("".$n);
};

$caml_ml_open_descriptor_in(0);

$stdout = $caml_ml_open_descriptor_out(1);

$caml_ml_open_descriptor_out(2);

$flush_all = function(dynamic $param) use (
  $Sys_error,
  $caml_ml_flush,
  $caml_ml_out_channels_list,
  $caml_wrap_exception,
  $caml_wrap_thrown_exception_reraise,
) {
  $iter = function(dynamic $param) use (
    $Sys_error,
    $caml_ml_flush,
    $caml_wrap_exception,
    $caml_wrap_thrown_exception_reraise,
  ) {
    $param__0 = $param;
    for (; ; ) {
      if ($param__0) {
        $l = $param__0[2];
        $a = $param__0[1];
        try {
          $caml_ml_flush($a);
        } catch (\Throwable $b) {
          $b = $caml_wrap_exception($b);
          if ($b[1] !== $Sys_error) {
            throw $caml_wrap_thrown_exception_reraise($b) as \Throwable;
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
$output_string = function(
  dynamic $oc,
  dynamic $s,
) use ($caml_ml_output, $caml_ml_string_length) {
  return $caml_ml_output($oc, $s, 0, $caml_ml_string_length($s));
};
$print_endline = function(
  dynamic $s,
) use ($caml_ml_flush, $caml_ml_output_char, $output_string, $stdout) {
  $output_string($stdout, $s);
  $caml_ml_output_char($stdout, 10);
  return $caml_ml_flush($stdout);
};
$do_at_exit = function(dynamic $param) use ($flush_all) {
  return $flush_all(0);
};
$h0 = function(dynamic $i) {
  $i__0 = $i;
  for (; ; ) {
    $match = 0 < $i__0 ? 1 : (0);
    if (0 === $match) {
      return 42;
    }
    $i__1 = (int)($i__0 + -1);
    $i__0 = $i__1;
    continue;
  }
};

$print_endline($string_of_int($h0(4)));

$g0 = function(dynamic $i) {
  $i__0 = $i;
  for (; ; ) {
    if (0 === $i__0) {
      return 10;
    }
    if (10 < $i__0) {
      $i__1 = (int)($i__0 + -5);
      $i__0 = $i__1;
      continue;
    }
    $i__2 = (int)($i__0 + -1);
    $i__0 = $i__2;
    continue;
  }
};
$g1->contents = function(dynamic $i) use ($g1) {
  $x = 0 === $i
    ? 10
    : (
        10 < $i
          ? $g1->contents((int)($i + -5))
          : ($g1->contents((int)($i + -1)))
      );
  return (int)($x + 1);
};

$print_endline($string_of_int($g0(3)));

$print_endline($string_of_int($g1->contents(2)));

$f0 = function(dynamic $t) {
  switch ($t) {
      // FALLTHROUGH
    case 0:
      return 1;
      // FALLTHROUGH
    case 1:
      return 2;
      // FALLTHROUGH
    default:
      return 3;
  }
};
$f1 = function(dynamic $t) {
  $t__0 = $t;
  for (; ; ) {
    $continue_label = null;
    switch ($t__0) {
        // FALLTHROUGH
      case 0:
        $t__0 = 1;
        $continue_label = "#";
        break;
        // FALLTHROUGH
      case 1:
        $t__0 = 2;
        $continue_label = "#";
        break;
        // FALLTHROUGH
      default:
        return 3;
    }
    if ($continue_label === "#") {
      continue;
    }
  }
};
$f2->contents = function(dynamic $t) use ($f2) {
  switch ($t) {
      // FALLTHROUGH
    case 0:
      $x = $f2->contents(1);
      break;
      // FALLTHROUGH
    case 1:
      $x = $f2->contents(2);
      break;
      // FALLTHROUGH
    default:
      $x = 3;
  }
  return (int)($x + 1);
};
$f3 = function(dynamic $t) {
  $t__0 = $t;
  for (; ; ) {
    $continue_label = null;
    switch ($t__0) {
        // FALLTHROUGH
      case 0:
        $t__0 = 1;
        $continue_label = "#";
        break;
        // FALLTHROUGH
      case 1:
        switch ($t__0) {
            // FALLTHROUGH
          case 0:
            $t__0 = 1;
            $continue_label = "#";
            break;
            // FALLTHROUGH
          case 1:
            $t__0 = 2;
            $continue_label = "#";
            break;
            // FALLTHROUGH
          default:
            return 3;
        }
        if ($continue_label !== null) {
          break;
        }
        // FALLTHROUGH
      default:
        return 3;
    }
    if ($continue_label === "#") {
      continue;
    }
  }
};

$print_endline($string_of_int($f0(0)));

$print_endline($string_of_int($f1(0)));

$print_endline($string_of_int($f2->contents(0)));

$print_endline($string_of_int($f3(0)));

$h0__0 = function(
  dynamic $c,
) use ($Match_failure, $Not_found, $a, $caml_wrap_thrown_exception) {
  for (; ; ) {
    if (40 === $c) {
      continue;
    }
    if (123 <= $c) {
      if (!(126 <= $c)) {
        $switcher = (int)($c + -123);
        $continue_label = null;
        switch ($switcher) {
            // FALLTHROUGH
          case 0:
            $continue_label = "#";
            break;
            // FALLTHROUGH
          case 1:
            break;
            // FALLTHROUGH
          default:
            throw $caml_wrap_thrown_exception($Not_found) as \Throwable;
        }
        if ($continue_label === "#") {
          continue;
        }
      }
    } else {
      if (95 === $c) {
        continue;
      }
    }
    throw $caml_wrap_thrown_exception(Vector {0, $Match_failure, $a})
      as \Throwable;
  }
};
$h1 = function(dynamic $t) {
  for (; ; ) {
    if (0 === $t) {
      $continue_label = null;
      switch ($t) {
          // FALLTHROUGH
        case 0:
          $continue_label = "#";
          break;
          // FALLTHROUGH
        case 1:
          return 2;
          // FALLTHROUGH
        default:
          return 3;
      }
      if ($continue_label === "#") {
        continue;
      }
    }
    switch ($t) {
        // FALLTHROUGH
      case 0:
        return 1;
        // FALLTHROUGH
      case 1:
        return 2;
        // FALLTHROUGH
      default:
        return 3;
    }
  }
};

$print_endline($string_of_int($h0__0(104)));

$print_endline($string_of_int($h1(0)));

$do_at_exit(0);
