<?hh



$caml_arity_test = function($f) {
  $php_f = ($f instanceof Func) ? $f->fun : $f;
  if (is_object($php_f) && ($php_f instanceof \Closure)) {
    return (new \ReflectionFunction($php_f))->getNumberOfRequiredParameters();
  } else {
    throw new \ErrorException("Passed non closure to rehack_arity");
  }
};




$Func=$joo_global_object->Func;




  $caml_call_gen = new Ref();
  $caml_call_gen->contents =
    function($f, $args) use ($Func,$caml_arity_test,$caml_call_gen,$raw_array_append_one,$raw_array_sub) {
      if (instance_of($f, $Func)) {
        return $caml_call_gen->contents($f->fun, $args);
      }
      $n = $caml_arity_test($f);
      $argsLen = $args->length;
      $d = $n - $argsLen;
      if ($d === 0) {
        return \call_user_func_array($f, $args->__toPhpArray());
      } else {
        if ($d < 0) {
          return $caml_call_gen->contents(
            \call_user_func_array($f, $raw_array_sub($args, 0, $n)->__toPhpArray()),
            $raw_array_sub($args, $n, $argsLen - $n)
          );
        } else {
          return function($x) use ($args,$caml_call_gen,$f,$raw_array_append_one) {
            return $caml_call_gen->contents(
              $f,
              $raw_array_append_one($args, $x)
            );
          };
        }
      }
    };
  $caml_call_gen=$caml_call_gen->contents;




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



$caml_call1 = function(dynamic $f, dynamic $a0) use ($caml_arity_test,$caml_call_gen) {
  return $caml_arity_test($f) === 1
    ? $f($a0)
    : ($caml_call_gen($f, varray[$a0]));
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

$b = $caml_new_string("prefix ");
$c = $caml_new_string("f1");
$d = $caml_new_string("f2");
$e = $caml_new_string("f3");
$f = $caml_new_string("f4");

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
        catch(\Throwable $D) {
          $D = $caml_wrap_exception($D);
          if ($D[1] !== $Sys_error) {
            throw $caml_wrap_thrown_exception_reraise($D) as \Throwable;
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
$print_endline = function(dynamic $s) use ($caml_ml_flush,$caml_ml_output_char,$output_string,$stdout) {
  $output_string($stdout, $s);
  $caml_ml_output_char($stdout, 10);
  return $caml_ml_flush($stdout);
};
$do_at_exit = function(dynamic $param) use ($flush_all) {
  return $flush_all(0);
};
$f1 = function(dynamic $g) use ($caml_call1) {
  $i = 2;
  for (;;) {
    $caml_call1($g, $i);
    $C = (int) ($i + 1);
    if (3 !== $i) {$i = $C;continue;}
    return 0;
  }
};
$f2 = function(dynamic $g) use ($caml_call1) {
  $i = 2;
  $continue_counter = null;
  for (;;) {
    $j = 4;
    for (;;) {
      $caml_call1($g, (int) ($i + $j));
      $B = (int) ($j + 1);
      if (5 !== $j) {$j = $B;continue;}
      $A = (int) ($i + 1);
      if (3 !== $i) {$i = $A;$continue_counter = 0;break;}
      return 0;
    }
    if ($continue_counter > 0) {
      $continue_counter -= 1;
      break;
    }
    else if ($continue_counter === 0) {$continue_counter = null;continue;}
  }
};
$f3 = function(dynamic $g) use ($caml_call1) {
  $i = 2;
  $continue_counter = null;
  for (;;) {
    $j = 4;
    for (;;) {
      $k = 4;
      for (;;) {
        $caml_call1($g, (int) ((int) ($i + $j) + $k));
        $z = (int) ($k + 1);
        if (5 !== $k) {$k = $z;continue;}
        $y = (int) ($j + 1);
        if (5 !== $j) {$j = $y;$continue_counter = 0;break;}
        $l = 6;
        for (;;) {
          $caml_call1($g, (int) ($i + $l));
          $x = (int) ($l + 1);
          if (7 !== $l) {$l = $x;continue;}
          $w = (int) ($i + 1);
          if (3 !== $i) {$i = $w;$continue_counter = 2;break;}
          return 0;
        }
        if ($continue_counter > 0) {
          $continue_counter -= 1;
          break;
        }
        else if ($continue_counter === 0) {$continue_counter = null;continue;}
      }
      if ($continue_counter > 0) {
        $continue_counter -= 1;
        break;
      }
      else if ($continue_counter === 0) {$continue_counter = null;continue;}
    }
    if ($continue_counter > 0) {
      $continue_counter -= 1;
      break;
    }
    else if ($continue_counter === 0) {$continue_counter = null;continue;}
  }
};
$f4 = function(dynamic $g) use ($caml_call1) {
  $i = 2;
  $continue_counter = null;
  for (;;) {
    $k__3 = 4;
    for (;;) {
      $caml_call1($g, (int) ($i + $k__3));
      $v = (int) ($k__3 + 1);
      if (5 !== $k__3) {$k__3 = $v;continue;}
      $j = 4;
      for (;;) {
        $k__2 = 4;
        for (;;) {
          $l__1 = 4;
          for (;;) {
            $caml_call1($g, (int) ((int) ((int) ($i + $j) + $k__2) + $l__1));
            $u = (int) ($l__1 + 1);
            if (5 !== $l__1) {$l__1 = $u;continue;}
            $t = (int) ($k__2 + 1);
            if (5 !== $k__2) {$k__2 = $t;$continue_counter = 0;break;}
            $k__1 = 4;
            for (;;) {
              $caml_call1($g, (int) ((int) ($i + $j) + $k__1));
              $s = (int) ($k__1 + 1);
              if (5 !== $k__1) {$k__1 = $s;continue;}
              $r = (int) ($j + 1);
              if (5 !== $j) {$j = $r;$continue_counter = 2;break;}
              $l__0 = 6;
              for (;;) {
                $n__1 = 4;
                for (;;) {
                  $caml_call1($g, (int) ((int) ($i + $l__0) + $n__1));
                  $q = (int) ($n__1 + 1);
                  if (5 !== $n__1) {$n__1 = $q;continue;}
                  $m__0 = 4;
                  for (;;) {
                    $n__0 = 4;
                    for (;;) {
                      $caml_call1(
                        $g,
                        (int)
                        ((int) ((int) ($i + $l__0) + $m__0) + $n__0)
                      );
                      $p = (int) ($n__0 + 1);
                      if (5 !== $n__0) {$n__0 = $p;continue;}
                      $o = (int) ($m__0 + 1);
                      if (5 !== $m__0) {$m__0 = $o;$continue_counter = 0;break;}
                      $n = (int) ($l__0 + 1);
                      if (7 !== $l__0) {$l__0 = $n;$continue_counter = 2;break;}
                      $k__0 = 4;
                      for (;;) {
                        $caml_call1($g, (int) ($i + $k__0));
                        $m = (int) ($k__0 + 1);
                        if (5 !== $k__0) {$k__0 = $m;continue;}
                        $l = (int) ($i + 1);
                        if (3 !== $i) {$i = $l;$continue_counter = 9;break;}
                        $k = 4;
                        for (;;) {
                          $caml_call1($g, $k);
                          $k = (int) ($k + 1);
                          if (5 !== $k) {$k = $k;continue;}
                          return 0;
                        }
                        if ($continue_counter > 0) {
                          $continue_counter -= 1;
                          break;
                        }
                        else if ($continue_counter === 0) {
                          $continue_counter = null;
                          continue;
                        }
                      }
                      if ($continue_counter > 0) {
                        $continue_counter -= 1;
                        break;
                      }
                      else if ($continue_counter === 0) {
                        $continue_counter = null;
                        continue;
                      }
                    }
                    if ($continue_counter > 0) {
                      $continue_counter -= 1;
                      break;
                    }
                    else if ($continue_counter === 0) {
                      $continue_counter = null;
                      continue;
                    }
                  }
                  if ($continue_counter > 0) {
                    $continue_counter -= 1;
                    break;
                  }
                  else if ($continue_counter === 0) {
                    $continue_counter = null;
                    continue;
                  }
                }
                if ($continue_counter > 0) {
                  $continue_counter -= 1;
                  break;
                }
                else if ($continue_counter === 0) {
                  $continue_counter = null;
                  continue;
                }
              }
              if ($continue_counter > 0) {
                $continue_counter -= 1;
                break;
              }
              else if ($continue_counter === 0) {
                $continue_counter = null;
                continue;
              }
            }
            if ($continue_counter > 0) {
              $continue_counter -= 1;
              break;
            }
            else if ($continue_counter === 0) {
              $continue_counter = null;
              continue;
            }
          }
          if ($continue_counter > 0) {
            $continue_counter -= 1;
            break;
          }
          else if ($continue_counter === 0) {
            $continue_counter = null;
            continue;
          }
        }
        if ($continue_counter > 0) {
          $continue_counter -= 1;
          break;
        }
        else if ($continue_counter === 0) {$continue_counter = null;continue;}
      }
      if ($continue_counter > 0) {
        $continue_counter -= 1;
        break;
      }
      else if ($continue_counter === 0) {$continue_counter = null;continue;}
    }
    if ($continue_counter > 0) {
      $continue_counter -= 1;
      break;
    }
    else if ($continue_counter === 0) {$continue_counter = null;continue;}
  }
};
$fx = function(dynamic $prefix, dynamic $x) use ($a,$b,$print_endline,$string_of_int) {
  return $print_endline($a($b, $string_of_int($x)));
};

$f1(function(dynamic $j) use ($c,$fx) {return $fx($c, $j);});

$f2(function(dynamic $i) use ($d,$fx) {return $fx($d, $i);});

$f3(function(dynamic $h) use ($e,$fx) {return $fx($e, $h);});

$f4(function(dynamic $g) use ($f,$fx) {return $fx($f, $g);});

$do_at_exit(0);
