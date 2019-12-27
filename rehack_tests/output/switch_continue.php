<?hh
$f2 = new Ref();
$g1 = new Ref();
$runtime = $joo_global_object->jsoo_runtime;

$caml_ml_flush = $runtime["caml_ml_flush"];
$caml_ml_open_descriptor_out = $runtime["caml_ml_open_descriptor_out"];
$string = $runtime["caml_new_string"];
$caml_register_global = $runtime["caml_register_global"];
$caml_wrap_thrown_exception = $runtime["caml_wrap_thrown_exception"];
$caml_wrap_thrown_exception_reraise =
  $runtime["caml_wrap_thrown_exception_reraise"];
$Out_of_memory = Vector {248, $string("Out_of_memory"), -1} as dynamic;
$Sys_error = Vector {248, $string("Sys_error"), -2} as dynamic;
$Failure = Vector {248, $string("Failure"), -3} as dynamic;
$Invalid_argument = Vector {248, $string("Invalid_argument"), -4} as dynamic;
$End_of_file = Vector {248, $string("End_of_file"), -5} as dynamic;
$Division_by_zero = Vector {248, $string("Division_by_zero"), -6} as dynamic;
$Not_found = Vector {248, $string("Not_found"), -7} as dynamic;
$Match_failure = Vector {248, $string("Match_failure"), -8} as dynamic;
$Stack_overflow = Vector {248, $string("Stack_overflow"), -9} as dynamic;
$Sys_blocked_io = Vector {248, $string("Sys_blocked_io"), -10} as dynamic;
$Assert_failure = Vector {248, $string("Assert_failure"), -11} as dynamic;
$Undefined_recursive_module = Vector {
  248,
  $string("Undefined_recursive_module"),
  -12,
} as dynamic;

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

$a_ = Vector {
  0,
  $string("rehack_tests/switch_continue/switch_continue.re"),
  72,
  18,
} as dynamic;

$runtime["caml_fresh_oo_id"](0);

$string_of_int = (dynamic $n) ==> {
  return $string("".$n);
};

$runtime["caml_ml_open_descriptor_in"](0);

$stdout = $caml_ml_open_descriptor_out(1);

$caml_ml_open_descriptor_out(2);

$flush_all = (dynamic $param) ==> {
  $iter = (dynamic $param) ==> {
    $param__0 = $param;
    for (; ; ) {
      if ($param__0) {
        $l = $param__0[2];
        $a = $param__0[1];
        try {
          $caml_ml_flush($a);
        } catch (\Throwable $b_) {
          $b_ = $runtime["caml_wrap_exception"]($b_);
          if ($b_[1] !== $Sys_error) {
            throw $caml_wrap_thrown_exception_reraise($b_) as \Throwable;
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
$output_string = (dynamic $oc, dynamic $s) ==> {
  return $runtime["caml_ml_output"](
    $oc,
    $s,
    0,
    $runtime["caml_ml_string_length"]($s),
  );
};
$print_endline = (dynamic $s) ==> {
  $output_string($stdout, $s);
  $runtime["caml_ml_output_char"]($stdout, 10);
  return $caml_ml_flush($stdout);
};
$do_at_exit = (dynamic $param) ==> {
  return $flush_all(0);
};
$h0 = (dynamic $i) ==> {
  $i__0 = $i;
  for (; ; ) {
    $match = 0 < $i__0 ? 1 : (0);
    if (0 === $match) {
      return 42;
    }
    $i__1 = (int)($i__0 + -1) as dynamic;
    $i__0 = $i__1;
    continue;
  }
};

$print_endline($string_of_int($h0(4)));

$g0 = (dynamic $i) ==> {
  $i__0 = $i;
  for (; ; ) {
    if (0 === $i__0) {
      return 10;
    }
    if (10 < $i__0) {
      $i__1 = (int)($i__0 + -5) as dynamic;
      $i__0 = $i__1;
      continue;
    }
    $i__2 = (int)($i__0 + -1) as dynamic;
    $i__0 = $i__2;
    continue;
  }
};
$g1->contents = (dynamic $i) ==> {
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

$f0 = (dynamic $t) ==> {
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
$f1 = (dynamic $t) ==> {
  $t__0 = $t;
  for (; ; ) {
    $continue_label = null;
    switch ($t__0) {
        // FALLTHROUGH
      case 0:
        $t__0 = 1 as dynamic;
        $continue_label = "#";
        break;
        // FALLTHROUGH
      case 1:
        $t__0 = 2 as dynamic;
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
$f2->contents = (dynamic $t) ==> {
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
      $x = 3 as dynamic;
  }
  return (int)($x + 1);
};
$f3 = (dynamic $t) ==> {
  $t__0 = $t;
  for (; ; ) {
    $continue_label = null;
    switch ($t__0) {
        // FALLTHROUGH
      case 0:
        $t__0 = 1 as dynamic;
        $continue_label = "#";
        break;
        // FALLTHROUGH
      case 1:
        switch ($t__0) {
            // FALLTHROUGH
          case 0:
            $t__0 = 1 as dynamic;
            $continue_label = "#";
            break;
            // FALLTHROUGH
          case 1:
            $t__0 = 2 as dynamic;
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

$h0__0 = (dynamic $c) ==> {
  for (; ; ) {
    if (40 === $c) {
      continue;
    }
    if (123 <= $c) {
      if (!(126 <= $c)) {
        $switcher = (int)($c + -123) as dynamic;
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
    throw $caml_wrap_thrown_exception(Vector {0, $Match_failure, $a_}) as
      \Throwable;
  }
};
$h1 = (dynamic $t) ==> {
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
