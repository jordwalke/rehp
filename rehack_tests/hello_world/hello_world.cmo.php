

$runtime = $joo_global_object->jsoo_runtime;
$call1 = $runtime["caml_call1"];
$call2 = $runtime["caml_call2"];
$string = $runtime["caml_new_string"];
$global_data = $runtime["caml_get_global_data"]();
$cst_prefix = $string("prefix ");
$cst_f1 = $string("f1");
$cst_f2 = $string("f2");
$cst_f3 = $string("f3");
$cst_f4 = $string("f4");
$Pervasives = $global_data["Pervasives"];
$f1 = function(dynamic $g) use ($call1) {
  $i = 2;
  for (;;) {
    $call1($g, $i);
    $y = (int) ($i + 1);
    if (3 !== $i) {$i = $y;continue;}
    return 0;
  }
};
$f2 = function(dynamic $g) use ($call1) {
  $i = 2;
  $continue_counter = null;
  for (;;) {
    $j = 4;
    for (;;) {
      $call1($g, (int) ($i + $j));
      $x = (int) ($j + 1);
      if (5 !== $j) {$j = $x;continue;}
      $w = (int) ($i + 1);
      if (3 !== $i) {$i = $w;$continue_counter = 0;break;}
      return 0;
    }
    if ($continue_counter > 0) {
      $continue_counter -= 1;
      break;
    }
    else if ($continue_counter === 0) {$continue_counter = null;continue;}
  }
};
$f3 = function(dynamic $g) use ($call1) {
  $i = 2;
  $continue_counter = null;
  for (;;) {
    $j = 4;
    for (;;) {
      $k = 4;
      for (;;) {
        $call1($g, (int) ((int) ($i + $j) + $k));
        $v = (int) ($k + 1);
        if (5 !== $k) {$k = $v;continue;}
        $u = (int) ($j + 1);
        if (5 !== $j) {$j = $u;$continue_counter = 0;break;}
        $l = 6;
        for (;;) {
          $call1($g, (int) ($i + $l));
          $t = (int) ($l + 1);
          if (7 !== $l) {$l = $t;continue;}
          $s = (int) ($i + 1);
          if (3 !== $i) {$i = $s;$continue_counter = 2;break;}
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
$f4 = function(dynamic $g) use ($call1) {
  $i = 2;
  $continue_counter = null;
  for (;;) {
    $k__3 = 4;
    for (;;) {
      $call1($g, (int) ($i + $k__3));
      $r = (int) ($k__3 + 1);
      if (5 !== $k__3) {$k__3 = $r;continue;}
      $j__0 = 4;
      for (;;) {
        $k__2 = 4;
        for (;;) {
          $l__0 = 4;
          for (;;) {
            $call1($g, (int) ((int) ((int) ($i + $j__0) + $k__2) + $l__0));
            $q = (int) ($l__0 + 1);
            if (5 !== $l__0) {$l__0 = $q;continue;}
            $p = (int) ($k__2 + 1);
            if (5 !== $k__2) {$k__2 = $p;$continue_counter = 0;break;}
            $k__1 = 4;
            for (;;) {
              $call1($g, (int) ((int) ($i + $j__0) + $k__1));
              $o = (int) ($k__1 + 1);
              if (5 !== $k__1) {$k__1 = $o;continue;}
              $n = (int) ($j__0 + 1);
              if (5 !== $j__0) {$j__0 = $n;$continue_counter = 2;break;}
              $l = 6;
              for (;;) {
                $n__0 = 4;
                for (;;) {
                  $call1($g, (int) ((int) ($i + $l) + $n__0));
                  $m = (int) ($n__0 + 1);
                  if (5 !== $n__0) {$n__0 = $m;continue;}
                  $m = 4;
                  for (;;) {
                    $n = 4;
                    for (;;) {
                      $call1($g, (int) ((int) ((int) ($i + $l) + $m) + $n));
                      $l = (int) ($n + 1);
                      if (5 !== $n) {$n = $l;continue;}
                      $k = (int) ($m + 1);
                      if (5 !== $m) {$m = $k;$continue_counter = 0;break;}
                      $j = (int) ($l + 1);
                      if (7 !== $l) {$l = $j;$continue_counter = 2;break;}
                      $k__0 = 4;
                      for (;;) {
                        $call1($g, (int) ($i + $k__0));
                        $i = (int) ($k__0 + 1);
                        if (5 !== $k__0) {$k__0 = $i;continue;}
                        $h = (int) ($i + 1);
                        if (3 !== $i) {$i = $h;$continue_counter = 9;break;}
                        $k = 4;
                        for (;;) {
                          $call1($g, $k);
                          $g = (int) ($k + 1);
                          if (5 !== $k) {$k = $g;continue;}
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
$fx = function(dynamic $prefix, dynamic $x) use ($Pervasives,$call1,$call2,$cst_prefix) {
  $e = $call1($Pervasives[21], $x);
  $f = $call2($Pervasives[16], $cst_prefix, $e);
  return $call1($Pervasives[34], $f);
};

$f1(function(dynamic $d) use ($cst_f1,$fx) {return $fx($cst_f1, $d);});

$f2(function(dynamic $c) use ($cst_f2,$fx) {return $fx($cst_f2, $c);});

$f3(function(dynamic $b) use ($cst_f3,$fx) {return $fx($cst_f3, $b);});

$f4(function(dynamic $a) use ($cst_f4,$fx) {return $fx($cst_f4, $a);});

$Hello_world = Vector{0, $f1, $f2, $f3, $f4, $fx};

$runtime["caml_register_global"](6, $Hello_world, "Hello_world");
