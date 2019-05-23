#!/usr/local/bin/hhvm -vEval.Jit=false
<?hh

$caml_call1 = function($f, $x) {
  $f($x);
};
$caml_new_string = function($s) {
  return $s;
};
$fx = function($prefix, $x) {
  var_dump("$prefix $x");
};

$c = $caml_new_string("f1");
$d = $caml_new_string("f2");
$e = $caml_new_string("f3");
$f = $caml_new_string("f4");

$f1 = function($g) use ($caml_call1) {
  $i = 2;
  for (; ; ) {
    $caml_call1($g, $i);
    $C = (int)($i + 1);
    if (3 !== $i) {
      $i = $C;
      continue;
    }
    return 0;
  }
};
$f2 = function($g) use ($caml_call1) {
  $i = 2;
  for (; ; ) {
    $j = 4;
    for (; ; ) {
      $caml_call1($g, (int)($i + $j));
      $B = (int)($j + 1);
      if (5 !== $j) {
        $j = $B;
        continue;
      }
      $A = (int)($i + 1);
      if (3 !== $i) {
        $i = $A;
        goto a_continue;
      }
      return 0;
    }
    a_continue:
    ;

  }
  a_break:
};
$f3 = function($g) use ($caml_call1) {
  $i = 2;
  for (; ; ) {
    $j = 4;
    for (; ; ) {
      $k = 4;
      for (; ; ) {
        $caml_call1($g, (int)((int)($i + $j) + $k));
        $z = (int)($k + 1);
        if (5 !== $k) {
          $k = $z;
          continue;
        }
        $y = (int)($j + 1);
        if (5 !== $j) {
          $j = $y;
          goto b_continue;
        }
        $l = 6;
        for (; ; ) {
          $caml_call1($g, (int)($i + $l));
          $x = (int)($l + 1);
          if (7 !== $l) {
            $l = $x;
            continue;
          }
          $w = (int)($i + 1);
          if (3 !== $i) {
            $i = $w;
            goto a_continue;
          }
          return 0;
        }
      }
      b_continue:
      ;

    }
    b_break:
    a_continue:
    ;

  }
  a_break:
};
$f4 = function($g) use ($caml_call1) {
  $i = 2;
  for (; ; ) {
    $k__3 = 4;
    for (; ; ) {
      $caml_call1($g, (int)($i + $k__3));
      $v = (int)($k__3 + 1);
      if (5 !== $k__3) {
        $k__3 = $v;
        continue;
      }
      $j = 4;
      for (; ; ) {
        $k__2 = 4;
        for (; ; ) {
          $l__1 = 4;
          for (; ; ) {
            $caml_call1($g, (int)((int)((int)($i + $j) + $k__2) + $l__1));
            $u = (int)($l__1 + 1);
            if (5 !== $l__1) {
              $l__1 = $u;
              continue;
            }
            $t = (int)($k__2 + 1);
            if (5 !== $k__2) {
              $k__2 = $t;
              goto d_continue;
            }
            $k__1 = 4;
            for (; ; ) {
              $caml_call1($g, (int)((int)($i + $j) + $k__1));
              $s = (int)($k__1 + 1);
              if (5 !== $k__1) {
                $k__1 = $s;
                continue;
              }
              $r = (int)($j + 1);
              if (5 !== $j) {
                $j = $r;
                goto c_continue;
              }
              $l__0 = 6;
              for (; ; ) {
                $n__1 = 4;
                for (; ; ) {
                  $caml_call1($g, (int)((int)($i + $l__0) + $n__1));
                  $q = (int)($n__1 + 1);
                  if (5 !== $n__1) {
                    $n__1 = $q;
                    continue;
                  }
                  $m__0 = 4;
                  for (; ; ) {
                    $n__0 = 4;
                    for (; ; ) {
                      $caml_call1(
                        $g,
                        (int)((int)((int)($i + $l__0) + $m__0) + $n__0),
                      );
                      $p = (int)($n__0 + 1);
                      if (5 !== $n__0) {
                        $n__0 = $p;
                        continue;
                      }
                      $o = (int)($m__0 + 1);
                      if (5 !== $m__0) {
                        $m__0 = $o;
                        goto f_continue;
                      }
                      $n = (int)($l__0 + 1);
                      if (7 !== $l__0) {
                        $l__0 = $n;
                        goto e_continue;
                      }
                      $k__0 = 4;
                      for (; ; ) {
                        $caml_call1($g, (int)($i + $k__0));
                        $m = (int)($k__0 + 1);
                        if (5 !== $k__0) {
                          $k__0 = $m;
                          continue;
                        }
                        $l = (int)($i + 1);
                        if (3 !== $i) {
                          $i = $l;
                          goto a_continue;
                        }
                        $k = 4;
                        for (; ; ) {
                          $caml_call1($g, $k);
                          $k = (int)($k + 1);
                          if (5 !== $k) {
                            $k = $k;
                            continue;
                          }
                          return 0;
                        }
                      }
                    }
                    f_continue:
                    ;

                  }
                  f_break:
                }
                e_continue:
                ;

              }
              e_break:
            }
          }
          d_continue:
          ;

        }
        d_break:
        c_continue:
        ;

      }
      c_break:
    }
    a_continue:
    ;

  }
  a_break:
};

$f1(function($j) use ($c, $fx) {
  return $fx($c, $j);
});

$f2(function($i) use ($d, $fx) {
  return $fx($d, $i);
});

$f3(function($h) use ($e, $fx) {
  return $fx($e, $h);
});

$f4(function($g) use ($f, $fx) {
  return $fx($f, $g);
});
