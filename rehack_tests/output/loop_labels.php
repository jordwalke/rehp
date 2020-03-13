<?hh
$runtime = $joo_global_object->jsoo_runtime;

$caml_blit_string = $runtime["caml_blit_string"];
$call1 = $runtime["caml_call1"];
$caml_ml_flush = $runtime["caml_ml_flush"];
$caml_ml_open_descriptor_out = $runtime["caml_ml_open_descriptor_out"];
$caml_ml_string_length = $runtime["caml_ml_string_length"];
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

$a_ = $string("prefix ");
$b_ = $string("f1");
$c_ = $string("f2");
$d_ = $string("f3");
$e_ = $string("f4");
$f_ = $string("f5");
$g_ = $string("f6");
$h_ = $string("f7");
$i_ = $string("f8");
$j_ = $string("f9");
$k_ = $string("f10");
$m_ = $string("h1");
$o_ = $string("h2");
$q_ = $string("h3");
$s_ = $string("h4");
$u_ = $string("h5");

$runtime["caml_fresh_oo_id"](0);

$symbol = (dynamic $s1, dynamic $s2) ==> {
  $l1 = $caml_ml_string_length($s1);
  $l2 = $caml_ml_string_length($s2);
  $s = $runtime["caml_create_bytes"]((int)($l1 + $l2));
  $caml_blit_string($s1, 0, $s, 0, $l1);
  $caml_blit_string($s2, 0, $s, $l1, $l2);
  return $s;
};
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
        } catch (\Throwable $aM_) {
          $aM_ = $runtime["caml_wrap_exception"]($aM_);
          if ($aM_[1] !== $Sys_error) {
            throw $caml_wrap_thrown_exception_reraise($aM_) as \Throwable;
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
  return $runtime["caml_ml_output"]($oc, $s, 0, $caml_ml_string_length($s));
};
$print_endline = (dynamic $s) ==> {
  $output_string($stdout, $s);
  $runtime["caml_ml_output_char"]($stdout, 10);
  return $caml_ml_flush($stdout);
};
$do_at_exit = (dynamic $param) ==> {
  return $flush_all(0);
};
$f1 = (dynamic $g) ==> {
  $i = 2 as dynamic;
  for (; ; ) {
    $call1($g, $i);
    $aL_ = (int)($i + 1) as dynamic;
    if (3 !== $i) {
      $i = $aL_;
      continue;
    }
    return 0;
  }
};
$f2 = (dynamic $g) ==> {
  $i = 2 as dynamic;
  for (; ; ) {
    $continue_label = null;
    $j = 4 as dynamic;
    for (; ; ) {
      $call1($g, (int)($i + $j));
      $aK_ = (int)($j + 1) as dynamic;
      if (5 !== $j) {
        $j = $aK_;
        continue;
      }
      $aJ_ = (int)($i + 1) as dynamic;
      if (3 !== $i) {
        $i = $aJ_;
        $continue_label = "a";
        break;
      }
      return 0;
    }
    if ($continue_label === "a") {
      continue;
    }
  }
};
$f3 = (dynamic $g) ==> {
  $i = 2 as dynamic;
  for (; ; ) {
    $continue_label = null;
    $j = 4 as dynamic;
    for (; ; ) {
      $continue_label = null;
      $k = 4 as dynamic;
      for (; ; ) {
        $call1($g, (int)((int)($i + $j) + $k));
        $aI_ = (int)($k + 1) as dynamic;
        if (5 !== $k) {
          $k = $aI_;
          continue;
        }
        $aH_ = (int)($j + 1) as dynamic;
        if (5 !== $j) {
          $j = $aH_;
          $continue_label = "b";
          break;
        }
        $l = 6 as dynamic;
        for (; ; ) {
          $call1($g, (int)($i + $l));
          $aG_ = (int)($l + 1) as dynamic;
          if (7 !== $l) {
            $l = $aG_;
            continue;
          }
          $aF_ = (int)($i + 1) as dynamic;
          if (3 !== $i) {
            $i = $aF_;
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
    }
  }
};
$f4 = (dynamic $g) ==> {
  $i = 2 as dynamic;
  for (; ; ) {
    $continue_label = null;
    $k__3 = 4 as dynamic;
    for (; ; ) {
      $call1($g, (int)($i + $k__3));
      $aE_ = (int)($k__3 + 1) as dynamic;
      if (5 !== $k__3) {
        $k__3 = $aE_;
        continue;
      }
      $j = 4 as dynamic;
      for (; ; ) {
        $continue_label = null;
        $k__2 = 4 as dynamic;
        for (; ; ) {
          $continue_label = null;
          $l__0 = 4 as dynamic;
          for (; ; ) {
            $call1($g, (int)((int)((int)($i + $j) + $k__2) + $l__0));
            $aD_ = (int)($l__0 + 1) as dynamic;
            if (5 !== $l__0) {
              $l__0 = $aD_;
              continue;
            }
            $aC_ = (int)($k__2 + 1) as dynamic;
            if (5 !== $k__2) {
              $k__2 = $aC_;
              $continue_label = "d";
              break;
            }
            $k__1 = 4 as dynamic;
            for (; ; ) {
              $call1($g, (int)((int)($i + $j) + $k__1));
              $aB_ = (int)($k__1 + 1) as dynamic;
              if (5 !== $k__1) {
                $k__1 = $aB_;
                continue;
              }
              $aA_ = (int)($j + 1) as dynamic;
              if (5 !== $j) {
                $j = $aA_;
                $continue_label = "c";
                break;
              }
              $l = 6 as dynamic;
              for (; ; ) {
                $continue_label = null;
                $n__0 = 4 as dynamic;
                for (; ; ) {
                  $call1($g, (int)((int)($i + $l) + $n__0));
                  $az_ = (int)($n__0 + 1) as dynamic;
                  if (5 !== $n__0) {
                    $n__0 = $az_;
                    continue;
                  }
                  $m = 4 as dynamic;
                  for (; ; ) {
                    $continue_label = null;
                    $n = 4 as dynamic;
                    for (; ; ) {
                      $call1($g, (int)((int)((int)($i + $l) + $m) + $n));
                      $ay_ = (int)($n + 1) as dynamic;
                      if (5 !== $n) {
                        $n = $ay_;
                        continue;
                      }
                      $ax_ = (int)($m + 1) as dynamic;
                      if (5 !== $m) {
                        $m = $ax_;
                        $continue_label = "f";
                        break;
                      }
                      $aw_ = (int)($l + 1) as dynamic;
                      if (7 !== $l) {
                        $l = $aw_;
                        $continue_label = "e";
                        break;
                      }
                      $k__0 = 4 as dynamic;
                      for (; ; ) {
                        $call1($g, (int)($i + $k__0));
                        $av_ = (int)($k__0 + 1) as dynamic;
                        if (5 !== $k__0) {
                          $k__0 = $av_;
                          continue;
                        }
                        $au_ = (int)($i + 1) as dynamic;
                        if (3 !== $i) {
                          $i = $au_;
                          $continue_label = "a";
                          break;
                        }
                        $k = 4 as dynamic;
                        for (; ; ) {
                          $call1($g, $k);
                          $at_ = (int)($k + 1) as dynamic;
                          if (5 !== $k) {
                            $k = $at_;
                            continue;
                          }
                          return 0;
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
    }
  }
};
$f5 = (dynamic $g) ==> {
  $i__0 = 2 as dynamic;
  for (; ; ) {
    $call1($g, $i__0);
    $as_ = (int)($i__0 + 1) as dynamic;
    if (3 !== $i__0) {
      $i__0 = $as_;
      continue;
    }
    $i = 2 as dynamic;
    for (; ; ) {
      $call1($g, $i);
      $ar_ = (int)($i + 1) as dynamic;
      if (3 !== $i) {
        $i = $ar_;
        continue;
      }
      return 0;
    }
  }
};
$f6 = (dynamic $g) ==> {
  $i__2 = 2 as dynamic;
  for (; ; ) {
    $call1($g, $i__2);
    $aq_ = (int)($i__2 + 1) as dynamic;
    if (3 !== $i__2) {
      $i__2 = $aq_;
      continue;
    }
    $i__1 = 2 as dynamic;
    for (; ; ) {
      $call1($g, $i__1);
      $ap_ = (int)($i__1 + 1) as dynamic;
      if (3 !== $i__1) {
        $i__1 = $ap_;
        continue;
      }
      $i__0 = 2 as dynamic;
      for (; ; ) {
        $call1($g, $i__0);
        $ao_ = (int)($i__0 + 1) as dynamic;
        if (3 !== $i__0) {
          $i__0 = $ao_;
          continue;
        }
        $i = 2 as dynamic;
        for (; ; ) {
          $call1($g, $i);
          $an_ = (int)($i + 1) as dynamic;
          if (3 !== $i) {
            $i = $an_;
            continue;
          }
          return 0;
        }
      }
    }
  }
};
$f7 = (dynamic $g) ==> {
  $i__0 = 2 as dynamic;
  for (; ; ) {
    $call1($g, $i__0);
    $am_ = (int)($i__0 + 1) as dynamic;
    if (3 !== $i__0) {
      $i__0 = $am_;
      continue;
    }
    $i = 2 as dynamic;
    for (; ; ) {
      $call1($g, $i);
      $al_ = (int)($i + 1) as dynamic;
      if (3 !== $i) {
        $i = $al_;
        continue;
      }
      return 0;
    }
  }
};
$f8 = (dynamic $g) ==> {
  $i__0 = 2 as dynamic;
  for (; ; ) {
    $call1($g, $i__0);
    $ai_ = (int)($i__0 + 1) as dynamic;
    if (3 !== $i__0) {
      $i__0 = $ai_;
      continue;
    }
    $f = (dynamic $x) ==> {
      $i = 2 as dynamic;
      for (; ; ) {
        $continue_label = null;
        $j = 4 as dynamic;
        for (; ; ) {
          $call1($g, (int)((int)($x + $i) + $j));
          $ak_ = (int)($j + 1) as dynamic;
          if (5 !== $j) {
            $j = $ak_;
            continue;
          }
          $aj_ = (int)($i + 1) as dynamic;
          if (3 !== $i) {
            $i = $aj_;
            $continue_label = "a";
            break;
          }
          return 0;
        }
        if ($continue_label === "a") {
          continue;
        }
      }
    };
    $i = 2 as dynamic;
    for (; ; ) {
      $call1($g, $i);
      $ah_ = (int)($i + 1) as dynamic;
      if (3 !== $i) {
        $i = $ah_;
        continue;
      }
      return $f;
    }
  }
};
$f9 = (dynamic $g) ==> {
  $i1 = 2 as dynamic;
  for (; ; ) {
    $continue_label = null;
    $i2 = 2 as dynamic;
    for (; ; ) {
      $f__0 = (dynamic $i1, dynamic $i2) ==> {
        $f = (dynamic $x) ==> {
          $i3 = 2 as dynamic;
          for (; ; ) {
            $continue_label = null;
            $i4 = 2 as dynamic;
            for (; ; ) {
              $call1(
                $g,
                (int)((int)((int)((int)($x + $i1) + $i2) + $i3) + $i4),
              );
              $ag_ = (int)($i4 + 1) as dynamic;
              if (3 !== $i4) {
                $i4 = $ag_;
                continue;
              }
              $af_ = (int)($i3 + 1) as dynamic;
              if (3 !== $i3) {
                $i3 = $af_;
                $continue_label = "a";
                break;
              }
              return 0;
            }
            if ($continue_label === "a") {
              continue;
            }
          }
        };
        return $f;
      };
      $f = $f__0($i1, $i2);
      $f($i2);
      $ae_ = (int)($i2 + 1) as dynamic;
      if (3 !== $i2) {
        $i2 = $ae_;
        continue;
      }
      $ad_ = (int)($i1 + 1) as dynamic;
      if (3 !== $i1) {
        $i1 = $ad_;
        $continue_label = "a";
        break;
      }
      return 0;
    }
    if ($continue_label === "a") {
      continue;
    }
  }
};
$f10 = (dynamic $g) ==> {
  $i1 = 2 as dynamic;
  for (; ; ) {
    $continue_label = null;
    $i2 = 2 as dynamic;
    for (; ; ) {
      try {
        $i3 = 2 as dynamic;
        for (; ; ) {
          $continue_label = null;
          $i4 = 2 as dynamic;
          for (; ; ) {
            $call1($g, (int)((int)((int)($i1 + $i2) + $i3) + $i4));
            $ab_ = (int)($i4 + 1) as dynamic;
            if (3 !== $i4) {
              $i4 = $ab_;
              continue;
            }
            if (2 < $i3) {
              throw $caml_wrap_thrown_exception($Not_found) as \Throwable;
            }
            $aa_ = (int)($i3 + 1) as dynamic;
            if (3 !== $i3) {
              $i3 = $aa_;
              $continue_label = "c";
              break;
            }
            break;
          }
          if ($continue_label === "c") {
            continue;
          }
          break;
        }
      } catch (\Throwable $ac_) {
        $ac_ = $runtime["caml_wrap_exception"]($ac_);
        if ($ac_ !== $Not_found) {
          throw $caml_wrap_thrown_exception_reraise($ac_) as \Throwable;
        }
      }
      $Z_ = (int)($i2 + 1) as dynamic;
      if (3 !== $i2) {
        $i2 = $Z_;
        continue;
      }
      $Y_ = (int)($i1 + 1) as dynamic;
      if (3 !== $i1) {
        $i1 = $Y_;
        $continue_label = "a";
        break;
      }
      return 0;
    }
    if ($continue_label === "a") {
      continue;
    }
  }
};
$fx = (dynamic $prefix, dynamic $x) ==> {
  return $print_endline($symbol($a_, $string_of_int($x)));
};

$f1((dynamic $X_) ==> {
  return $fx($b_, $X_);
});

$f2((dynamic $W_) ==> {
  return $fx($c_, $W_);
});

$f3((dynamic $V_) ==> {
  return $fx($d_, $V_);
});

$f4((dynamic $U_) ==> {
  return $fx($e_, $U_);
});

$f5((dynamic $T_) ==> {
  return $fx($f_, $T_);
});

$f6((dynamic $S_) ==> {
  return $fx($g_, $S_);
});

$f7((dynamic $R_) ==> {
  return $fx($h_, $R_);
});

$f8((dynamic $Q_) ==> {
  return $fx($i_, $Q_);
});

$f9((dynamic $P_) ==> {
  return $fx($j_, $P_);
});

$f10((dynamic $O_) ==> {
  return $fx($k_, $O_);
});

$h1 = (dynamic $g, dynamic $t) ==> {
  $i = 2 as dynamic;
  for (; ; ) {
    switch ($t) {
        // FALLTHROUGH
      case 0:
        $call1($g, 0);
        break;
        // FALLTHROUGH
      case 1:
        $k = 4 as dynamic;
        for (; ; ) {
          $call1($g, (int)($i + $k));
          $N_ = (int)($k + 1) as dynamic;
          if (5 !== $k) {
            $k = $N_;
            continue;
          }
          break;
        }
        break;
        // FALLTHROUGH
      default:
        $call1($g, 1);
    }
    $M_ = (int)($i + 1) as dynamic;
    if (3 !== $i) {
      $i = $M_;
      continue;
    }
    return 0;
  }
};
$h2 = (dynamic $g, dynamic $t) ==> {
  $i = 2 as dynamic;
  for (; ; ) {
    $continue_label = null;
    $j = 2 as dynamic;
    for (; ; ) {
      switch ($t) {
          // FALLTHROUGH
        case 0:
          $call1($g, 0);
          break;
          // FALLTHROUGH
        case 1:
          $k = 4 as dynamic;
          for (; ; ) {
            $call1($g, (int)((int)($i + $j) + $k));
            $L_ = (int)($k + 1) as dynamic;
            if (5 !== $k) {
              $k = $L_;
              continue;
            }
            break;
          }
          break;
          // FALLTHROUGH
        default:
          $call1($g, 1);
      }
      $K_ = (int)($j + 1) as dynamic;
      if (3 !== $j) {
        $j = $K_;
        continue;
      }
      $J_ = (int)($i + 1) as dynamic;
      if (3 !== $i) {
        $i = $J_;
        $continue_label = "a";
        break;
      }
      return 0;
    }
    if ($continue_label === "a") {
      continue;
    }
  }
};
$h3 = (dynamic $g, dynamic $t) ==> {
  $i = 4 as dynamic;
  for (; ; ) {
    switch ($t) {
        // FALLTHROUGH
      case 0:
        $call1($g, 0);
        break;
        // FALLTHROUGH
      case 1:
        $j = 4 as dynamic;
        for (; ; ) {
          $continue_label = null;
          $k = 2 as dynamic;
          for (; ; ) {
            $call1($g, (int)((int)($i + $j) + $k));
            $I_ = (int)($k + 1) as dynamic;
            if (3 !== $k) {
              $k = $I_;
              continue;
            }
            $H_ = (int)($j + 1) as dynamic;
            if (5 !== $j) {
              $j = $H_;
              $continue_label = "b";
              break;
            }
            break;
          }
          if ($continue_label === "b") {
            continue;
          }
          break;
        }
        break;
        // FALLTHROUGH
      default:
        $call1($g, 1);
    }
    $G_ = (int)($i + 1) as dynamic;
    if (5 !== $i) {
      $i = $G_;
      continue;
    }
    return 0;
  }
};
$h4 = (dynamic $g, dynamic $t) ==> {
  switch ($t) {
      // FALLTHROUGH
    case 0:
      return $call1($g, 0);
      // FALLTHROUGH
    case 1:
      $j = 4 as dynamic;
      for (; ; ) {
        $continue_label = null;
        $k = 2 as dynamic;
        for (; ; ) {
          $call1($g, (int)($j + $k));
          $F_ = (int)($k + 1) as dynamic;
          if (3 !== $k) {
            $k = $F_;
            continue;
          }
          $E_ = (int)($j + 1) as dynamic;
          if (5 !== $j) {
            $j = $E_;
            $continue_label = "a";
            break;
          }
          return 0;
        }
        if ($continue_label === "a") {
          continue;
        }
      }
      // FALLTHROUGH
    default:
      return $call1($g, 1);
  }
};
$h5 = (dynamic $g, dynamic $t) ==> {
  $i = 2 as dynamic;
  for (; ; ) {
    $continue_label = null;
    $j = 2 as dynamic;
    for (; ; ) {
      switch ($t) {
          // FALLTHROUGH
        case 0:
          $call1($g, 0);
          break;
          // FALLTHROUGH
        case 1:
          $k = 4 as dynamic;
          for (; ; ) {
            $continue_label = null;
            $l = 2 as dynamic;
            for (; ; ) {
              $call1($g, (int)((int)($i + $j) + $k));
              $D_ = (int)($l + 1) as dynamic;
              if (3 !== $l) {
                $l = $D_;
                continue;
              }
              $C_ = (int)($k + 1) as dynamic;
              if (5 !== $k) {
                $k = $C_;
                $continue_label = "c";
                break;
              }
              break;
            }
            if ($continue_label === "c") {
              continue;
            }
            break;
          }
          break;
          // FALLTHROUGH
        default:
          $call1($g, 1);
      }
      $B_ = (int)($j + 1) as dynamic;
      if (3 !== $j) {
        $j = $B_;
        continue;
      }
      $A_ = (int)($i + 1) as dynamic;
      if (3 !== $i) {
        $i = $A_;
        $continue_label = "a";
        break;
      }
      return 0;
    }
    if ($continue_label === "a") {
      continue;
    }
  }
};
$l_ = 0 as dynamic;

$h1(
  (dynamic $z_) ==> {
    return $fx($m_, $z_);
  },
  $l_,
);

$n_ = 0 as dynamic;

$h2(
  (dynamic $y_) ==> {
    return $fx($o_, $y_);
  },
  $n_,
);

$p_ = 0 as dynamic;

$h3(
  (dynamic $x_) ==> {
    return $fx($q_, $x_);
  },
  $p_,
);

$r_ = 0 as dynamic;

$h4(
  (dynamic $w_) ==> {
    return $fx($s_, $w_);
  },
  $r_,
);

$t_ = 0 as dynamic;

$h5(
  (dynamic $v_) ==> {
    return $fx($u_, $v_);
  },
  $t_,
);

$do_at_exit(0);
