<?php



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

$a = $caml_new_string("hello world");

$caml_fresh_oo_id(0);

$caml_ml_open_descriptor_in(0);

$stdout = $caml_ml_open_descriptor_out(1);

$caml_ml_open_descriptor_out(2);

$flush_all = function($param) use ($Sys_error,$caml_ml_flush,$caml_ml_out_channels_list,$caml_wrap_exception,$caml_wrap_thrown_exception_reraise) {
  $iter = function($param) use ($Sys_error,$caml_ml_flush,$caml_wrap_exception,$caml_wrap_thrown_exception_reraise) {
    $param__0 = $param;
    for (;;) {
      if ($param__0) {
        $l = $param__0[2];
        $a = $param__0[1];
        try {$caml_ml_flush($a);}
        catch(\Throwable $b) {
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
$output_string = function($oc, $s) use ($caml_ml_output,$caml_ml_string_length) {
  return $caml_ml_output($oc, $s, 0, $caml_ml_string_length($s));
};
$print_string = function($s) use ($output_string,$stdout) {
  return $output_string($stdout, $s);
};
$do_at_exit = function($param) use ($flush_all) {return $flush_all(0);};

$print_string($a);

$do_at_exit(0);
