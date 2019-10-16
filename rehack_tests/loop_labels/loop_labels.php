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
$m = $caml_new_string("h1");
$o = $caml_new_string("h2");
$q = $caml_new_string("h3");
$s = $caml_new_string("h4");
$u = $caml_new_string("h5");

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
        } catch (\Throwable $aM) {
          $aM = $caml_wrap_exception($aM);
          if ($aM[1] !== $Sys_error) {
            throw $caml_wrap_thrown_exception_reraise($aM) as \Throwable;
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
    $aL = (int)($i + 1);
    if (3 !== $i) {
      $i = $aL;
      continue;
    }
    return 0;
  }
};
$f2 = function(dynamic $g) use ($caml_call1) {
  $i = 2;
  $continue_label = null;
  for (; ; ) {
    $j = 4;
    for (; ; ) {
      $caml_call1($g, (int)($i + $j));
      $aK = (int)($j + 1);
      if (5 !== $j) {
        $j = $aK;
        continue;
      }
      $aJ = (int)($i + 1);
      if (3 !== $i) {
        $i = $aJ;
        $continue_label = "a";
        break;
      }
      return 0;
    }
    if ($continue_label === "a") {
      continue;
    } else if ($continue_label !== null) {
      break;
    }
  }
};
$f3 = function(dynamic $g) use ($caml_call1) {
  $i = 2;
  $continue_label = null;
  for (; ; ) {
    $j = 4;
    $continue_label = null;
    for (; ; ) {
      $k = 4;
      for (; ; ) {
        $caml_call1($g, (int)((int)($i + $j) + $k));
        $aI = (int)($k + 1);
        if (5 !== $k) {
          $k = $aI;
          continue;
        }
        $aH = (int)($j + 1);
        if (5 !== $j) {
          $j = $aH;
          $continue_label = "b";
          break;
        }
        $l = 6;
        for (; ; ) {
          $caml_call1($g, (int)($i + $l));
          $aG = (int)($l + 1);
          if (7 !== $l) {
            $l = $aG;
            continue;
          }
          $aF = (int)($i + 1);
          if (3 !== $i) {
            $i = $aF;
            $continue_label = "a";
            break;
          }
          return 0;
        }
        if ($continue_label !== null) {
          break;
        }
      }
      if ($continue_label === "b") {
        continue;
      } else if ($continue_label !== null) {
        break;
      }
    }
    if ($continue_label === "a") {
      continue;
    } else if ($continue_label !== null) {
      break;
    }
  }
};
$f4 = function(dynamic $g) use ($caml_call1) {
  $i = 2;
  $continue_label = null;
  for (; ; ) {
    $k__3 = 4;
    for (; ; ) {
      $caml_call1($g, (int)($i + $k__3));
      $aE = (int)($k__3 + 1);
      if (5 !== $k__3) {
        $k__3 = $aE;
        continue;
      }
      $j = 4;
      $continue_label = null;
      for (; ; ) {
        $k__2 = 4;
        $continue_label = null;
        for (; ; ) {
          $l__0 = 4;
          for (; ; ) {
            $caml_call1($g, (int)((int)((int)($i + $j) + $k__2) + $l__0));
            $aD = (int)($l__0 + 1);
            if (5 !== $l__0) {
              $l__0 = $aD;
              continue;
            }
            $aC = (int)($k__2 + 1);
            if (5 !== $k__2) {
              $k__2 = $aC;
              $continue_label = "d";
              break;
            }
            $k__1 = 4;
            for (; ; ) {
              $caml_call1($g, (int)((int)($i + $j) + $k__1));
              $aB = (int)($k__1 + 1);
              if (5 !== $k__1) {
                $k__1 = $aB;
                continue;
              }
              $aA = (int)($j + 1);
              if (5 !== $j) {
                $j = $aA;
                $continue_label = "c";
                break;
              }
              $l = 6;
              $continue_label = null;
              for (; ; ) {
                $n__0 = 4;
                for (; ; ) {
                  $caml_call1($g, (int)((int)($i + $l) + $n__0));
                  $az = (int)($n__0 + 1);
                  if (5 !== $n__0) {
                    $n__0 = $az;
                    continue;
                  }
                  $m = 4;
                  $continue_label = null;
                  for (; ; ) {
                    $n = 4;
                    for (; ; ) {
                      $caml_call1($g, (int)((int)((int)($i + $l) + $m) + $n));
                      $ay = (int)($n + 1);
                      if (5 !== $n) {
                        $n = $ay;
                        continue;
                      }
                      $ax = (int)($m + 1);
                      if (5 !== $m) {
                        $m = $ax;
                        $continue_label = "f";
                        break;
                      }
                      $aw = (int)($l + 1);
                      if (7 !== $l) {
                        $l = $aw;
                        $continue_label = "e";
                        break;
                      }
                      $k__0 = 4;
                      for (; ; ) {
                        $caml_call1($g, (int)($i + $k__0));
                        $av = (int)($k__0 + 1);
                        if (5 !== $k__0) {
                          $k__0 = $av;
                          continue;
                        }
                        $au = (int)($i + 1);
                        if (3 !== $i) {
                          $i = $au;
                          $continue_label = "a";
                          break;
                        }
                        $k = 4;
                        for (; ; ) {
                          $caml_call1($g, $k);
                          $at = (int)($k + 1);
                          if (5 !== $k) {
                            $k = $at;
                            continue;
                          }
                          return 0;
                        }
                        if ($continue_label !== null) {
                          break;
                        }
                      }
                      if ($continue_label !== null) {
                        break;
                      }
                    }
                    if ($continue_label === "f") {
                      continue;
                    } else if ($continue_label !== null) {
                      break;
                    }
                  }
                  if ($continue_label !== null) {
                    break;
                  }
                }
                if ($continue_label === "e") {
                  continue;
                } else if ($continue_label !== null) {
                  break;
                }
              }
              if ($continue_label !== null) {
                break;
              }
            }
            if ($continue_label !== null) {
              break;
            }
          }
          if ($continue_label === "d") {
            continue;
          } else if ($continue_label !== null) {
            break;
          }
        }
        if ($continue_label === "c") {
          continue;
        } else if ($continue_label !== null) {
          break;
        }
      }
      if ($continue_label !== null) {
        break;
      }
    }
    if ($continue_label === "a") {
      continue;
    } else if ($continue_label !== null) {
      break;
    }
  }
};
$f5 = function(dynamic $g) use ($caml_call1) {
  $i__0 = 2;
  for (; ; ) {
    $caml_call1($g, $i__0);
    $as = (int)($i__0 + 1);
    if (3 !== $i__0) {
      $i__0 = $as;
      continue;
    }
    $i = 2;
    for (; ; ) {
      $caml_call1($g, $i);
      $ar = (int)($i + 1);
      if (3 !== $i) {
        $i = $ar;
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
    $aq = (int)($i__2 + 1);
    if (3 !== $i__2) {
      $i__2 = $aq;
      continue;
    }
    $i__1 = 2;
    for (; ; ) {
      $caml_call1($g, $i__1);
      $ap = (int)($i__1 + 1);
      if (3 !== $i__1) {
        $i__1 = $ap;
        continue;
      }
      $i__0 = 2;
      for (; ; ) {
        $caml_call1($g, $i__0);
        $ao = (int)($i__0 + 1);
        if (3 !== $i__0) {
          $i__0 = $ao;
          continue;
        }
        $i = 2;
        for (; ; ) {
          $caml_call1($g, $i);
          $an = (int)($i + 1);
          if (3 !== $i) {
            $i = $an;
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
    $am = (int)($i__0 + 1);
    if (3 !== $i__0) {
      $i__0 = $am;
      continue;
    }
    $i = 2;
    for (; ; ) {
      $caml_call1($g, $i);
      $al = (int)($i + 1);
      if (3 !== $i) {
        $i = $al;
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
    $ai = (int)($i__0 + 1);
    if (3 !== $i__0) {
      $i__0 = $ai;
      continue;
    }
    $f = function(dynamic $x) use ($caml_call1, $g) {
      $i = 2;
      $continue_label = null;
      for (; ; ) {
        $j = 4;
        for (; ; ) {
          $caml_call1($g, (int)((int)($x + $i) + $j));
          $ak = (int)($j + 1);
          if (5 !== $j) {
            $j = $ak;
            continue;
          }
          $aj = (int)($i + 1);
          if (3 !== $i) {
            $i = $aj;
            $continue_label = "a";
            break;
          }
          return 0;
        }
        if ($continue_label === "a") {
          continue;
        } else if ($continue_label !== null) {
          break;
        }
      }
    };
    $i = 2;
    for (; ; ) {
      $caml_call1($g, $i);
      $ah = (int)($i + 1);
      if (3 !== $i) {
        $i = $ah;
        continue;
      }
      return $f;
    }
  }
};
$f9 = function(dynamic $g) use ($caml_call1) {
  $i1 = 2;
  $continue_label = null;
  for (; ; ) {
    $i2 = 2;
    for (; ; ) {
      $f__0 = function(dynamic $i1, dynamic $i2) use ($caml_call1, $g) {
        $f = function(dynamic $x) use ($caml_call1, $g, $i1, $i2) {
          $i3 = 2;
          $continue_label = null;
          for (; ; ) {
            $i4 = 2;
            for (; ; ) {
              $caml_call1(
                $g,
                (int)((int)((int)((int)($x + $i1) + $i2) + $i3) + $i4),
              );
              $ag = (int)($i4 + 1);
              if (3 !== $i4) {
                $i4 = $ag;
                continue;
              }
              $af = (int)($i3 + 1);
              if (3 !== $i3) {
                $i3 = $af;
                $continue_label = "a";
                break;
              }
              return 0;
            }
            if ($continue_label === "a") {
              continue;
            } else if ($continue_label !== null) {
              break;
            }
          }
        };
        return $f;
      };
      $f = $f__0($i1, $i2);
      $f($i2);
      $ae = (int)($i2 + 1);
      if (3 !== $i2) {
        $i2 = $ae;
        continue;
      }
      $ad = (int)($i1 + 1);
      if (3 !== $i1) {
        $i1 = $ad;
        $continue_label = "a";
        break;
      }
      return 0;
    }
    if ($continue_label === "a") {
      continue;
    } else if ($continue_label !== null) {
      break;
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
  $continue_label = null;
  for (; ; ) {
    $i2 = 2;
    for (; ; ) {
      try {
        $i3 = 2;
        $continue_label = null;
        for (; ; ) {
          $i4 = 2;
          for (; ; ) {
            $caml_call1($g, (int)((int)((int)($i1 + $i2) + $i3) + $i4));
            $ab = (int)($i4 + 1);
            if (3 !== $i4) {
              $i4 = $ab;
              continue;
            }
            if (2 < $i3) {
              throw $caml_wrap_thrown_exception($Not_found) as \Throwable;
            }
            $aa = (int)($i3 + 1);
            if (3 !== $i3) {
              $i3 = $aa;
              $continue_label = "c";
              break;
            }
            break;
          }
          if ($continue_label === "c") {
            continue;
          } else if ($continue_label !== null) {
            break;
          }
          break;
        }
        if ($continue_label !== null) {
          break;
        }
      } catch (\Throwable $ac) {
        $ac = $caml_wrap_exception($ac);
        if ($ac !== $Not_found) {
          throw $caml_wrap_thrown_exception_reraise($ac) as \Throwable;
        }
      }
      $Z = (int)($i2 + 1);
      if (3 !== $i2) {
        $i2 = $Z;
        continue;
      }
      $Y = (int)($i1 + 1);
      if (3 !== $i1) {
        $i1 = $Y;
        $continue_label = "a";
        break;
      }
      return 0;
    }
    if ($continue_label === "a") {
      continue;
    } else if ($continue_label !== null) {
      break;
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

$f1(function(dynamic $X) use ($b, $fx) {
  return $fx($b, $X);
});

$f2(function(dynamic $W) use ($c, $fx) {
  return $fx($c, $W);
});

$f3(function(dynamic $V) use ($d, $fx) {
  return $fx($d, $V);
});

$f4(function(dynamic $U) use ($e, $fx) {
  return $fx($e, $U);
});

$f5(function(dynamic $T) use ($f, $fx) {
  return $fx($f, $T);
});

$f6(function(dynamic $S) use ($fx, $g) {
  return $fx($g, $S);
});

$f7(function(dynamic $R) use ($fx, $h) {
  return $fx($h, $R);
});

$f8(function(dynamic $Q) use ($fx, $i) {
  return $fx($i, $Q);
});

$f9(function(dynamic $P) use ($fx, $j) {
  return $fx($j, $P);
});

$f10(function(dynamic $O) use ($fx, $k) {
  return $fx($k, $O);
});

$h1 = function(dynamic $g, dynamic $t) use ($caml_call1) {
  $i = 2;
  for (; ; ) {
    switch ($t) {
        // FALLTHROUGH
      case 0:
        $caml_call1($g, 0);
        break;
        // FALLTHROUGH
      case 1:
        $k = 4;
        for (; ; ) {
          $caml_call1($g, (int)($i + $k));
          $N = (int)($k + 1);
          if (5 !== $k) {
            $k = $N;
            continue;
          }
          break;
        }
        break;
        // FALLTHROUGH
      default:
        $caml_call1($g, 1);
    }
    $M = (int)($i + 1);
    if (3 !== $i) {
      $i = $M;
      continue;
    }
    return 0;
  }
};
$h2 = function(dynamic $g, dynamic $t) use ($caml_call1) {
  $i = 2;
  $continue_label = null;
  for (; ; ) {
    $j = 2;
    for (; ; ) {
      switch ($t) {
          // FALLTHROUGH
        case 0:
          $caml_call1($g, 0);
          break;
          // FALLTHROUGH
        case 1:
          $k = 4;
          for (; ; ) {
            $caml_call1($g, (int)((int)($i + $j) + $k));
            $L = (int)($k + 1);
            if (5 !== $k) {
              $k = $L;
              continue;
            }
            break;
          }
          break;
          // FALLTHROUGH
        default:
          $caml_call1($g, 1);
      }
      $K = (int)($j + 1);
      if (3 !== $j) {
        $j = $K;
        continue;
      }
      $J = (int)($i + 1);
      if (3 !== $i) {
        $i = $J;
        $continue_label = "a";
        break;
      }
      return 0;
    }
    if ($continue_label === "a") {
      continue;
    } else if ($continue_label !== null) {
      break;
    }
  }
};
$h3 = function(dynamic $g, dynamic $t) use ($caml_call1) {
  $i = 4;
  for (; ; ) {
    $continue_label = null;
    switch ($t) {
        // FALLTHROUGH
      case 0:
        $caml_call1($g, 0);
        break;
        // FALLTHROUGH
      case 1:
        $j = 4;
        $continue_label = null;
        for (; ; ) {
          $k = 2;
          for (; ; ) {
            $caml_call1($g, (int)((int)($i + $j) + $k));
            $I = (int)($k + 1);
            if (3 !== $k) {
              $k = $I;
              continue;
            }
            $H = (int)($j + 1);
            if (5 !== $j) {
              $j = $H;
              $continue_label = "b";
              break;
            }
            break;
          }
          if ($continue_label === "b") {
            continue;
          } else if ($continue_label !== null) {
            break;
          }
          break;
        }
        if ($continue_label !== null) {
          break;
        }
        break;
        // FALLTHROUGH
      default:
        $caml_call1($g, 1);
    }
    if ($continue_label === "switch") {
      continue;
    } else if ($continue_label !== null) {
      break;
    }
    $G = (int)($i + 1);
    if (5 !== $i) {
      $i = $G;
      continue;
    }
    return 0;
  }
};
$h4 = function(dynamic $g, dynamic $t) use ($caml_call1) {
  switch ($t) {
      // FALLTHROUGH
    case 0:
      return $caml_call1($g, 0);
      // FALLTHROUGH
    case 1:
      $j = 4;
      $continue_label = null;
      for (; ; ) {
        $k = 2;
        for (; ; ) {
          $caml_call1($g, (int)($j + $k));
          $F = (int)($k + 1);
          if (3 !== $k) {
            $k = $F;
            continue;
          }
          $E = (int)($j + 1);
          if (5 !== $j) {
            $j = $E;
            $continue_label = "a";
            break;
          }
          return 0;
        }
        if ($continue_label === "a") {
          continue;
        } else if ($continue_label !== null) {
          break;
        }
      }
      if ($continue_label !== null) {
        break;
      }
      // FALLTHROUGH
    default:
      return $caml_call1($g, 1);
  }
};
$h5 = function(dynamic $g, dynamic $t) use ($caml_call1) {
  $i = 2;
  $continue_label = null;
  for (; ; ) {
    $j = 2;
    for (; ; ) {
      $continue_label = null;
      switch ($t) {
          // FALLTHROUGH
        case 0:
          $caml_call1($g, 0);
          break;
          // FALLTHROUGH
        case 1:
          $k = 4;
          $continue_label = null;
          for (; ; ) {
            $l = 2;
            for (; ; ) {
              $caml_call1($g, (int)((int)($i + $j) + $k));
              $D = (int)($l + 1);
              if (3 !== $l) {
                $l = $D;
                continue;
              }
              $C = (int)($k + 1);
              if (5 !== $k) {
                $k = $C;
                $continue_label = "c";
                break;
              }
              break;
            }
            if ($continue_label === "c") {
              continue;
            } else if ($continue_label !== null) {
              break;
            }
            break;
          }
          if ($continue_label !== null) {
            break;
          }
          break;
          // FALLTHROUGH
        default:
          $caml_call1($g, 1);
      }
      if ($continue_label === "switch") {
        continue;
      } else if ($continue_label !== null) {
        break;
      }
      $B = (int)($j + 1);
      if (3 !== $j) {
        $j = $B;
        continue;
      }
      $A = (int)($i + 1);
      if (3 !== $i) {
        $i = $A;
        $continue_label = "a";
        break;
      }
      return 0;
    }
    if ($continue_label === "a") {
      continue;
    } else if ($continue_label !== null) {
      break;
    }
  }
};
$l = 0;

$h1(
  function(dynamic $z) use ($fx, $m) {
    return $fx($m, $z);
  },
  $l,
);

$n = 0;

$h2(
  function(dynamic $y) use ($fx, $o) {
    return $fx($o, $y);
  },
  $n,
);

$p = 0;

$h3(
  function(dynamic $x) use ($fx, $q) {
    return $fx($q, $x);
  },
  $p,
);

$r = 0;

$h4(
  function(dynamic $w) use ($fx, $s) {
    return $fx($s, $w);
  },
  $r,
);

$t = 0;

$h5(
  function(dynamic $v) use ($fx, $u) {
    return $fx($u, $v);
  },
  $t,
);

$do_at_exit(0);
