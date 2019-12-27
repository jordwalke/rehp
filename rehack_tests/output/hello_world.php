<?hh
$runtime = $joo_global_object->jsoo_runtime;

$caml_ml_flush = $runtime["caml_ml_flush"];
$caml_ml_open_descriptor_out = $runtime["caml_ml_open_descriptor_out"];
$string = $runtime["caml_new_string"];
$caml_register_global = $runtime["caml_register_global"];
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

$a_ = $string("hello world");

$runtime["caml_fresh_oo_id"](0);

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

$print_endline($a_);

$do_at_exit(0);
