<?hh


$caml_arity_test = function($f) {
  $php_f = ($f instanceof Func) ? $f->fun : $f;
  if (is_object($php_f) && ($php_f instanceof \Closure)) {
    return (new \ReflectionFunction($php_f))->getNumberOfRequiredParameters();
  } else {
    throw new \ErrorException("Passed non closure to rehack_arity");
  }
};


$caml_call_gen =
  function((function(mixed...): mixed) $f, varray<mixed> $args): mixed use (
    $raw_array_sub,
    $caml_arity_test,
  ) {
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
  };


$caml_call1 = function(
  (function(mixed...): mixed) $f,
  dynamic $a1,
): dynamic use ($caml_arity_test, $caml_call_gen) {
  return $caml_arity_test($f) === 1 ? $f($a1) : $caml_call_gen($f, varray[$a1]);
};


$String = $joo_global_object->String;


$caml_wrap_thrown_exception = function($e) use ($String, $caml_global_data) {
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
  if ($e instanceof \Exception) { // && $caml_named_value("phpError"))
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
  if ($e instanceof \Throwable) { // && $caml_named_value("phpError"))
    // return [0,caml_named_value("phpError"),e];
    return R(0, $String->new("phpError"), $e);
  }
  //fallback: wrapped in Failure
  // Again, with proper stubs this will refer to the actual Failure - always
  // kept in sync.
  return R(0, $caml_global_data->Failure, $e);
};


$caml_wrap_thrown_exception_reraise = $caml_wrap_thrown_exception;


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

$a = $caml_new_string("prefix ");
$b = $caml_new_string("f1");
$c = $caml_new_string("f2");
$d = $caml_new_string("f3");
$e = $caml_new_string("f4");
$f = $caml_new_string("f5");
$g = $caml_new_string("f6");
$h = $caml_new_string("f7");
$i = $caml_new_string("f8");
$j = $caml_new_string("f9");
$k = $caml_new_string("f10");

$caml_fresh_oo_id(0);

$symbol = function(dynamic $s1, dynamic $s2) use (
  $caml_blit_string,
  $caml_create_bytes,
  $caml_ml_string_length,
) {
  $l1 = $caml_ml_string_length($s1);
  $l2 = $caml_ml_string_length($s2);
  $s = $caml_create_bytes((int)($l1 + $l2));
  $caml_blit_string($s1, 0, $s, 0, $l1);
  $caml_blit_string($s2, 0, $s, $l1, $l2);
  return $s;
};
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
        } catch (\Throwable $aj) {
          $aj = $caml_wrap_exception($aj);
          if ($aj[1] !== $Sys_error) {
            throw $caml_wrap_thrown_exception_reraise($aj) as \Throwable;
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
$output_string = function(dynamic $oc, dynamic $s) use (
  $caml_ml_output,
  $caml_ml_string_length,
) {
  return $caml_ml_output($oc, $s, 0, $caml_ml_string_length($s));
};
$print_endline = function(dynamic $s) use (
  $caml_ml_flush,
  $caml_ml_output_char,
  $output_string,
  $stdout,
) {
  $output_string($stdout, $s);
  $caml_ml_output_char($stdout, 10);
  return $caml_ml_flush($stdout);
};
$do_at_exit = function(dynamic $param) use ($flush_all) {
  return $flush_all(0);
};
$f1 = function(dynamic $g) use ($caml_call1) {
  $i = 2;
  for (; ; ) {
    $caml_call1($g, $i);
    $ai = (int)($i + 1);
    if (3 !== $i) {
      $i = $ai;
      continue;
    }
    return 0;
  }
};
$f2 = function(dynamic $g) use ($caml_call1) {
  $i = 2;
  $continue_counter = null;
  for (; ; ) {
    $j = 4;
    for (; ; ) {
      $caml_call1($g, (int)($i + $j));
      $ah = (int)($j + 1);
      if (5 !== $j) {
        $j = $ah;
        continue;
      }
      $ag = (int)($i + 1);
      if (3 !== $i) {
        $i = $ag;
        $continue_counter = 0;
        break;
      }
      return 0;
    }
    if ($continue_counter > 0) {
      $continue_counter -= 1;
      break;
    } else if ($continue_counter === 0) {
      $continue_counter = null;
      continue;
    }
  }
};
$f3 = function(dynamic $g) use ($caml_call1) {
  $i = 2;
  $continue_counter = null;
  for (; ; ) {
    $j = 4;
    for (; ; ) {
      $k = 4;
      for (; ; ) {
        $caml_call1($g, (int)((int)($i + $j) + $k));
        $af = (int)($k + 1);
        if (5 !== $k) {
          $k = $af;
          continue;
        }
        $ae = (int)($j + 1);
        if (5 !== $j) {
          $j = $ae;
          $continue_counter = 0;
          break;
        }
        $l = 6;
        for (; ; ) {
          $caml_call1($g, (int)($i + $l));
          $ad = (int)($l + 1);
          if (7 !== $l) {
            $l = $ad;
            continue;
          }
          $ac = (int)($i + 1);
          if (3 !== $i) {
            $i = $ac;
            $continue_counter = 2;
            break;
          }
          return 0;
        }
        if ($continue_counter > 0) {
          $continue_counter -= 1;
          break;
        } else if ($continue_counter === 0) {
          $continue_counter = null;
          continue;
        }
      }
      if ($continue_counter > 0) {
        $continue_counter -= 1;
        break;
      } else if ($continue_counter === 0) {
        $continue_counter = null;
        continue;
      }
    }
    if ($continue_counter > 0) {
      $continue_counter -= 1;
      break;
    } else if ($continue_counter === 0) {
      $continue_counter = null;
      continue;
    }
  }
};
$f4 = function(dynamic $g) use ($caml_call1) {
  $i = 2;
  $continue_counter = null;
  for (; ; ) {
    $k__3 = 4;
    for (; ; ) {
      $caml_call1($g, (int)($i + $k__3));
      $ab = (int)($k__3 + 1);
      if (5 !== $k__3) {
        $k__3 = $ab;
        continue;
      }
      $j = 4;
      for (; ; ) {
        $k__2 = 4;
        for (; ; ) {
          $l__0 = 4;
          for (; ; ) {
            $caml_call1($g, (int)((int)((int)($i + $j) + $k__2) + $l__0));
            $aa = (int)($l__0 + 1);
            if (5 !== $l__0) {
              $l__0 = $aa;
              continue;
            }
            $Z = (int)($k__2 + 1);
            if (5 !== $k__2) {
              $k__2 = $Z;
              $continue_counter = 0;
              break;
            }
            $k__1 = 4;
            for (; ; ) {
              $caml_call1($g, (int)((int)($i + $j) + $k__1));
              $Y = (int)($k__1 + 1);
              if (5 !== $k__1) {
                $k__1 = $Y;
                continue;
              }
              $X = (int)($j + 1);
              if (5 !== $j) {
                $j = $X;
                $continue_counter = 2;
                break;
              }
              $l = 6;
              for (; ; ) {
                $n__0 = 4;
                for (; ; ) {
                  $caml_call1($g, (int)((int)($i + $l) + $n__0));
                  $W = (int)($n__0 + 1);
                  if (5 !== $n__0) {
                    $n__0 = $W;
                    continue;
                  }
                  $m = 4;
                  for (; ; ) {
                    $n = 4;
                    for (; ; ) {
                      $caml_call1($g, (int)((int)((int)($i + $l) + $m) + $n));
                      $V = (int)($n + 1);
                      if (5 !== $n) {
                        $n = $V;
                        continue;
                      }
                      $U = (int)($m + 1);
                      if (5 !== $m) {
                        $m = $U;
                        $continue_counter = 0;
                        break;
                      }
                      $T = (int)($l + 1);
                      if (7 !== $l) {
                        $l = $T;
                        $continue_counter = 2;
                        break;
                      }
                      $k__0 = 4;
                      for (; ; ) {
                        $caml_call1($g, (int)($i + $k__0));
                        $S = (int)($k__0 + 1);
                        if (5 !== $k__0) {
                          $k__0 = $S;
                          continue;
                        }
                        $R = (int)($i + 1);
                        if (3 !== $i) {
                          $i = $R;
                          $continue_counter = 9;
                          break;
                        }
                        $k = 4;
                        for (; ; ) {
                          $caml_call1($g, $k);
                          $Q = (int)($k + 1);
                          if (5 !== $k) {
                            $k = $Q;
                            continue;
                          }
                          return 0;
                        }
                        if ($continue_counter > 0) {
                          $continue_counter -= 1;
                          break;
                        } else if ($continue_counter === 0) {
                          $continue_counter = null;
                          continue;
                        }
                      }
                      if ($continue_counter > 0) {
                        $continue_counter -= 1;
                        break;
                      } else if ($continue_counter === 0) {
                        $continue_counter = null;
                        continue;
                      }
                    }
                    if ($continue_counter > 0) {
                      $continue_counter -= 1;
                      break;
                    } else if ($continue_counter === 0) {
                      $continue_counter = null;
                      continue;
                    }
                  }
                  if ($continue_counter > 0) {
                    $continue_counter -= 1;
                    break;
                  } else if ($continue_counter === 0) {
                    $continue_counter = null;
                    continue;
                  }
                }
                if ($continue_counter > 0) {
                  $continue_counter -= 1;
                  break;
                } else if ($continue_counter === 0) {
                  $continue_counter = null;
                  continue;
                }
              }
              if ($continue_counter > 0) {
                $continue_counter -= 1;
                break;
              } else if ($continue_counter === 0) {
                $continue_counter = null;
                continue;
              }
            }
            if ($continue_counter > 0) {
              $continue_counter -= 1;
              break;
            } else if ($continue_counter === 0) {
              $continue_counter = null;
              continue;
            }
          }
          if ($continue_counter > 0) {
            $continue_counter -= 1;
            break;
          } else if ($continue_counter === 0) {
            $continue_counter = null;
            continue;
          }
        }
        if ($continue_counter > 0) {
          $continue_counter -= 1;
          break;
        } else if ($continue_counter === 0) {
          $continue_counter = null;
          continue;
        }
      }
      if ($continue_counter > 0) {
        $continue_counter -= 1;
        break;
      } else if ($continue_counter === 0) {
        $continue_counter = null;
        continue;
      }
    }
    if ($continue_counter > 0) {
      $continue_counter -= 1;
      break;
    } else if ($continue_counter === 0) {
      $continue_counter = null;
      continue;
    }
  }
};
$f5 = function(dynamic $g) use ($caml_call1) {
  $i__0 = 2;
  for (; ; ) {
    $caml_call1($g, $i__0);
    $P = (int)($i__0 + 1);
    if (3 !== $i__0) {
      $i__0 = $P;
      continue;
    }
    $i = 2;
    for (; ; ) {
      $caml_call1($g, $i);
      $O = (int)($i + 1);
      if (3 !== $i) {
        $i = $O;
        continue;
      }
      return 0;
    }
  }
};
$f6 = function(dynamic $g) use ($caml_call1) {
  $i__2 = 2;
  for (; ; ) {
    $caml_call1($g, $i__2);
    $N = (int)($i__2 + 1);
    if (3 !== $i__2) {
      $i__2 = $N;
      continue;
    }
    $i__1 = 2;
    for (; ; ) {
      $caml_call1($g, $i__1);
      $M = (int)($i__1 + 1);
      if (3 !== $i__1) {
        $i__1 = $M;
        continue;
      }
      $i__0 = 2;
      for (; ; ) {
        $caml_call1($g, $i__0);
        $L = (int)($i__0 + 1);
        if (3 !== $i__0) {
          $i__0 = $L;
          continue;
        }
        $i = 2;
        for (; ; ) {
          $caml_call1($g, $i);
          $K = (int)($i + 1);
          if (3 !== $i) {
            $i = $K;
            continue;
          }
          return 0;
        }
      }
    }
  }
};
$f7 = function(dynamic $g) use ($caml_call1) {
  $i__0 = 2;
  for (; ; ) {
    $caml_call1($g, $i__0);
    $J = (int)($i__0 + 1);
    if (3 !== $i__0) {
      $i__0 = $J;
      continue;
    }
    $i = 2;
    for (; ; ) {
      $caml_call1($g, $i);
      $I = (int)($i + 1);
      if (3 !== $i) {
        $i = $I;
        continue;
      }
      return 0;
    }
  }
};
$f8 = function(dynamic $g) use ($caml_call1) {
  $i__0 = 2;
  for (; ; ) {
    $caml_call1($g, $i__0);
    $F = (int)($i__0 + 1);
    if (3 !== $i__0) {
      $i__0 = $F;
      continue;
    }
    $f = function(dynamic $x) use ($caml_call1, $g) {
      $i = 2;
      $continue_counter = null;
      for (; ; ) {
        $j = 4;
        for (; ; ) {
          $caml_call1($g, (int)((int)($x + $i) + $j));
          $H = (int)($j + 1);
          if (5 !== $j) {
            $j = $H;
            continue;
          }
          $G = (int)($i + 1);
          if (3 !== $i) {
            $i = $G;
            $continue_counter = 0;
            break;
          }
          return 0;
        }
        if ($continue_counter > 0) {
          $continue_counter -= 1;
          break;
        } else if ($continue_counter === 0) {
          $continue_counter = null;
          continue;
        }
      }
    };
    $i = 2;
    for (; ; ) {
      $caml_call1($g, $i);
      $E = (int)($i + 1);
      if (3 !== $i) {
        $i = $E;
        continue;
      }
      return $f;
    }
  }
};
$f9 = function(dynamic $g) use ($caml_call1) {
  $i1 = 2;
  $continue_counter = null;
  for (; ; ) {
    $i2 = 2;
    for (; ; ) {
      $f__0 = function(dynamic $i1, dynamic $i2) use ($caml_call1, $g) {
        $f = function(dynamic $x) use ($caml_call1, $g, $i1, $i2) {
          $i3 = 2;
          $continue_counter = null;
          for (; ; ) {
            $i4 = 2;
            for (; ; ) {
              $caml_call1(
                $g,
                (int)((int)((int)((int)($x + $i1) + $i2) + $i3) + $i4),
              );
              $D = (int)($i4 + 1);
              if (3 !== $i4) {
                $i4 = $D;
                continue;
              }
              $C = (int)($i3 + 1);
              if (3 !== $i3) {
                $i3 = $C;
                $continue_counter = 0;
                break;
              }
              return 0;
            }
            if ($continue_counter > 0) {
              $continue_counter -= 1;
              break;
            } else if ($continue_counter === 0) {
              $continue_counter = null;
              continue;
            }
          }
        };
        return $f;
      };
      $f = $f__0($i1, $i2);
      $f($i2);
      $B = (int)($i2 + 1);
      if (3 !== $i2) {
        $i2 = $B;
        continue;
      }
      $A = (int)($i1 + 1);
      if (3 !== $i1) {
        $i1 = $A;
        $continue_counter = 0;
        break;
      }
      return 0;
    }
    if ($continue_counter > 0) {
      $continue_counter -= 1;
      break;
    } else if ($continue_counter === 0) {
      $continue_counter = null;
      continue;
    }
  }
};
$f10 = function(dynamic $g) use (
  $Not_found,
  $caml_call1,
  $caml_wrap_exception,
  $caml_wrap_thrown_exception,
  $caml_wrap_thrown_exception_reraise,
) {
  $i1 = 2;
  $continue_counter = null;
  for (; ; ) {
    $i2 = 2;
    for (; ; ) {
      try {
        $i3 = 2;
        for (; ; ) {
          $i4 = 2;
          for (; ; ) {
            $caml_call1($g, (int)((int)((int)($i1 + $i2) + $i3) + $i4));
            $y = (int)($i4 + 1);
            if (3 !== $i4) {
              $i4 = $y;
              continue;
            }
            if (2 < $i3) {
              throw $caml_wrap_thrown_exception($Not_found) as \Throwable;
            }
            $x = (int)($i3 + 1);
            if (3 !== $i3) {
              $i3 = $x;
              $continue_counter = 0;
              break;
            }
            break;
          }
          if ($continue_counter > 0) {
            $continue_counter -= 1;
            break;
          } else if ($continue_counter === 0) {
            $continue_counter = null;
            continue;
          }
          break;
        }
        if ($continue_counter > 0) {
          $continue_counter -= 1;
          break;
        } else if ($continue_counter === 0) {
          $continue_counter = null;
          continue;
        }
      } catch (\Throwable $z) {
        $z = $caml_wrap_exception($z);
        if ($z !== $Not_found) {
          throw $caml_wrap_thrown_exception_reraise($z) as \Throwable;
        }
      }
      $w = (int)($i2 + 1);
      if (3 !== $i2) {
        $i2 = $w;
        continue;
      }
      $v = (int)($i1 + 1);
      if (3 !== $i1) {
        $i1 = $v;
        $continue_counter = 0;
        break;
      }
      return 0;
    }
    if ($continue_counter > 0) {
      $continue_counter -= 1;
      break;
    } else if ($continue_counter === 0) {
      $continue_counter = null;
      continue;
    }
  }
};
$fx = function(dynamic $prefix, dynamic $x) use (
  $a,
  $print_endline,
  $string_of_int,
  $symbol,
) {
  return $print_endline($symbol($a, $string_of_int($x)));
};

$f1(function(dynamic $u) use ($b, $fx) {
  return $fx($b, $u);
});

$f2(function(dynamic $t) use ($c, $fx) {
  return $fx($c, $t);
});

$f3(function(dynamic $s) use ($d, $fx) {
  return $fx($d, $s);
});

$f4(function(dynamic $r) use ($e, $fx) {
  return $fx($e, $r);
});

$f5(function(dynamic $q) use ($f, $fx) {
  return $fx($f, $q);
});

$f6(function(dynamic $p) use ($fx, $g) {
  return $fx($g, $p);
});

$f7(function(dynamic $o) use ($fx, $h) {
  return $fx($h, $o);
});

$f8(function(dynamic $n) use ($fx, $i) {
  return $fx($i, $n);
});

$f9(function(dynamic $m) use ($fx, $j) {
  return $fx($j, $m);
});

$f10(function(dynamic $l) use ($fx, $k) {
  return $fx($k, $l);
});

$do_at_exit(0);
