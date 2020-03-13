var runtime = joo_global_object.jsoo_runtime;

var caml_blit_string = runtime["caml_blit_string"];
var caml_ml_flush = runtime["caml_ml_flush"];
var caml_ml_open_descriptor_out = runtime["caml_ml_open_descriptor_out"];
var caml_ml_string_length = runtime["caml_ml_string_length"];
var string = runtime["caml_new_string"];
var caml_register_global = runtime["caml_register_global"];
var caml_wrap_thrown_exception = runtime["caml_wrap_thrown_exception"];
var caml_wrap_thrown_exception_reraise =
  runtime["caml_wrap_thrown_exception_reraise"];

function call1(f, a0) {
  return f.length === 1 ? f(a0) : runtime["caml_call_gen"](f, [a0]);
}

var Out_of_memory = [248, string("Out_of_memory"), -1];
var Sys_error = [248, string("Sys_error"), -2];
var Failure = [248, string("Failure"), -3];
var Invalid_argument = [248, string("Invalid_argument"), -4];
var End_of_file = [248, string("End_of_file"), -5];
var Division_by_zero = [248, string("Division_by_zero"), -6];
var Not_found = [248, string("Not_found"), -7];
var Match_failure = [248, string("Match_failure"), -8];
var Stack_overflow = [248, string("Stack_overflow"), -9];
var Sys_blocked_io = [248, string("Sys_blocked_io"), -10];
var Assert_failure = [248, string("Assert_failure"), -11];
var Undefined_recursive_module = [
  248,
  string("Undefined_recursive_module"),
  -12
];

caml_register_global(
  11,
  Undefined_recursive_module,
  "Undefined_recursive_module"
);

caml_register_global(10, Assert_failure, "Assert_failure");

caml_register_global(9, Sys_blocked_io, "Sys_blocked_io");

caml_register_global(8, Stack_overflow, "Stack_overflow");

caml_register_global(7, Match_failure, "Match_failure");

caml_register_global(6, Not_found, "Not_found");

caml_register_global(5, Division_by_zero, "Division_by_zero");

caml_register_global(4, End_of_file, "End_of_file");

caml_register_global(3, Invalid_argument, "Invalid_argument");

caml_register_global(2, Failure, "Failure");

caml_register_global(1, Sys_error, "Sys_error");

caml_register_global(0, Out_of_memory, "Out_of_memory");

var a_ = string("prefix ");
var b_ = string("f1");
var c_ = string("f2");
var d_ = string("f3");
var e_ = string("f4");
var f_ = string("f5");
var g_ = string("f6");
var h_ = string("f7");
var i_ = string("f8");
var j_ = string("f9");
var k_ = string("f10");
var m_ = string("h1");
var o_ = string("h2");
var q_ = string("h3");
var s_ = string("h4");
var u_ = string("h5");

runtime["caml_fresh_oo_id"](0);

function symbol(s1, s2) {
  var l1 = caml_ml_string_length(s1);
  var l2 = caml_ml_string_length(s2);
  var s = runtime["caml_create_bytes"]((l1 + l2) | 0);
  caml_blit_string(s1, 0, s, 0, l1);
  caml_blit_string(s2, 0, s, l1, l2);
  return s;
}

function string_of_int(n) {
  return string("" + n);
}

runtime["caml_ml_open_descriptor_in"](0);

var stdout = caml_ml_open_descriptor_out(1);

caml_ml_open_descriptor_out(2);

function flush_all(param) {
  function iter(param) {
    var param__0 = param;
    for (;;) {
      if (param__0) {
        var l = param__0[2];
        var a = param__0[1];
        try {
          caml_ml_flush(a);
        } catch (aM_) {
          aM_ = runtime["caml_wrap_exception"](aM_);
          if (aM_[1] !== Sys_error) {
            throw caml_wrap_thrown_exception_reraise(aM_);
          }
        }
        var param__0 = l;
        continue;
      }
      return 0;
    }
  }
  return iter(runtime["caml_ml_out_channels_list"](0));
}

function output_string(oc, s) {
  return runtime["caml_ml_output"](oc, s, 0, caml_ml_string_length(s));
}

function print_endline(s) {
  output_string(stdout, s);
  runtime["caml_ml_output_char"](stdout, 10);
  return caml_ml_flush(stdout);
}

function do_at_exit(param) {
  return flush_all(0);
}

function f1(g) {
  var i = 2;
  for (;;) {
    call1(g, i);
    var aL_ = (i + 1) | 0;
    if (3 !== i) {
      var i = aL_;
      continue;
    }
    return 0;
  }
}

function f2(g) {
  var i = 2;
  a: for (;;) {
    var j = 4;
    for (;;) {
      call1(g, (i + j) | 0);
      var aK_ = (j + 1) | 0;
      if (5 !== j) {
        var j = aK_;
        continue;
      }
      var aJ_ = (i + 1) | 0;
      if (3 !== i) {
        var i = aJ_;
        continue a;
      }
      return 0;
    }
  }
}

function f3(g) {
  var i = 2;
  a: for (;;) {
    var j = 4;
    b: for (;;) {
      var k = 4;
      for (;;) {
        call1(g, (((i + j) | 0) + k) | 0);
        var aI_ = (k + 1) | 0;
        if (5 !== k) {
          var k = aI_;
          continue;
        }
        var aH_ = (j + 1) | 0;
        if (5 !== j) {
          var j = aH_;
          continue b;
        }
        var l = 6;
        for (;;) {
          call1(g, (i + l) | 0);
          var aG_ = (l + 1) | 0;
          if (7 !== l) {
            var l = aG_;
            continue;
          }
          var aF_ = (i + 1) | 0;
          if (3 !== i) {
            var i = aF_;
            continue a;
          }
          return 0;
        }
      }
    }
  }
}

function f4(g) {
  var i = 2;
  a: for (;;) {
    var k__3 = 4;
    for (;;) {
      call1(g, (i + k__3) | 0);
      var aE_ = (k__3 + 1) | 0;
      if (5 !== k__3) {
        var k__3 = aE_;
        continue;
      }
      var j = 4;
      c: for (;;) {
        var k__2 = 4;
        d: for (;;) {
          var l__0 = 4;
          for (;;) {
            call1(g, (((((i + j) | 0) + k__2) | 0) + l__0) | 0);
            var aD_ = (l__0 + 1) | 0;
            if (5 !== l__0) {
              var l__0 = aD_;
              continue;
            }
            var aC_ = (k__2 + 1) | 0;
            if (5 !== k__2) {
              var k__2 = aC_;
              continue d;
            }
            var k__1 = 4;
            for (;;) {
              call1(g, (((i + j) | 0) + k__1) | 0);
              var aB_ = (k__1 + 1) | 0;
              if (5 !== k__1) {
                var k__1 = aB_;
                continue;
              }
              var aA_ = (j + 1) | 0;
              if (5 !== j) {
                var j = aA_;
                continue c;
              }
              var l = 6;
              e: for (;;) {
                var n__0 = 4;
                for (;;) {
                  call1(g, (((i + l) | 0) + n__0) | 0);
                  var az_ = (n__0 + 1) | 0;
                  if (5 !== n__0) {
                    var n__0 = az_;
                    continue;
                  }
                  var m = 4;
                  f: for (;;) {
                    var n = 4;
                    for (;;) {
                      call1(g, (((((i + l) | 0) + m) | 0) + n) | 0);
                      var ay_ = (n + 1) | 0;
                      if (5 !== n) {
                        var n = ay_;
                        continue;
                      }
                      var ax_ = (m + 1) | 0;
                      if (5 !== m) {
                        var m = ax_;
                        continue f;
                      }
                      var aw_ = (l + 1) | 0;
                      if (7 !== l) {
                        var l = aw_;
                        continue e;
                      }
                      var k__0 = 4;
                      for (;;) {
                        call1(g, (i + k__0) | 0);
                        var av_ = (k__0 + 1) | 0;
                        if (5 !== k__0) {
                          var k__0 = av_;
                          continue;
                        }
                        var au_ = (i + 1) | 0;
                        if (3 !== i) {
                          var i = au_;
                          continue a;
                        }
                        var k = 4;
                        for (;;) {
                          call1(g, k);
                          var at_ = (k + 1) | 0;
                          if (5 !== k) {
                            var k = at_;
                            continue;
                          }
                          return 0;
                        }
                      }
                    }
                  }
                }
              }
            }
          }
        }
      }
    }
  }
}

function f5(g) {
  var i__0 = 2;
  for (;;) {
    call1(g, i__0);
    var as_ = (i__0 + 1) | 0;
    if (3 !== i__0) {
      var i__0 = as_;
      continue;
    }
    var i = 2;
    for (;;) {
      call1(g, i);
      var ar_ = (i + 1) | 0;
      if (3 !== i) {
        var i = ar_;
        continue;
      }
      return 0;
    }
  }
}

function f6(g) {
  var i__2 = 2;
  for (;;) {
    call1(g, i__2);
    var aq_ = (i__2 + 1) | 0;
    if (3 !== i__2) {
      var i__2 = aq_;
      continue;
    }
    var i__1 = 2;
    for (;;) {
      call1(g, i__1);
      var ap_ = (i__1 + 1) | 0;
      if (3 !== i__1) {
        var i__1 = ap_;
        continue;
      }
      var i__0 = 2;
      for (;;) {
        call1(g, i__0);
        var ao_ = (i__0 + 1) | 0;
        if (3 !== i__0) {
          var i__0 = ao_;
          continue;
        }
        var i = 2;
        for (;;) {
          call1(g, i);
          var an_ = (i + 1) | 0;
          if (3 !== i) {
            var i = an_;
            continue;
          }
          return 0;
        }
      }
    }
  }
}

function f7(g) {
  var i__0 = 2;
  for (;;) {
    call1(g, i__0);
    var am_ = (i__0 + 1) | 0;
    if (3 !== i__0) {
      var i__0 = am_;
      continue;
    }
    var i = 2;
    for (;;) {
      call1(g, i);
      var al_ = (i + 1) | 0;
      if (3 !== i) {
        var i = al_;
        continue;
      }
      return 0;
    }
  }
}

function f8(g) {
  var i__0 = 2;
  for (;;) {
    call1(g, i__0);
    var ai_ = (i__0 + 1) | 0;
    if (3 !== i__0) {
      var i__0 = ai_;
      continue;
    }
    var f = function(x) {
      var i = 2;
      a: for (;;) {
        var j = 4;
        for (;;) {
          call1(g, (((x + i) | 0) + j) | 0);
          var ak_ = (j + 1) | 0;
          if (5 !== j) {
            var j = ak_;
            continue;
          }
          var aj_ = (i + 1) | 0;
          if (3 !== i) {
            var i = aj_;
            continue a;
          }
          return 0;
        }
      }
    };
    var i = 2;
    for (;;) {
      call1(g, i);
      var ah_ = (i + 1) | 0;
      if (3 !== i) {
        var i = ah_;
        continue;
      }
      return f;
    }
  }
}

function f9(g) {
  var i1 = 2;
  a: for (;;) {
    var i2 = 2;
    for (;;) {
      var f__0 = function(i1, i2) {
        function f(x) {
          var i3 = 2;
          a: for (;;) {
            var i4 = 2;
            for (;;) {
              call1(g, (((((((x + i1) | 0) + i2) | 0) + i3) | 0) + i4) | 0);
              var ag_ = (i4 + 1) | 0;
              if (3 !== i4) {
                var i4 = ag_;
                continue;
              }
              var af_ = (i3 + 1) | 0;
              if (3 !== i3) {
                var i3 = af_;
                continue a;
              }
              return 0;
            }
          }
        }
        return f;
      };
      var f = f__0(i1, i2);
      f(i2);
      var ae_ = (i2 + 1) | 0;
      if (3 !== i2) {
        var i2 = ae_;
        continue;
      }
      var ad_ = (i1 + 1) | 0;
      if (3 !== i1) {
        var i1 = ad_;
        continue a;
      }
      return 0;
    }
  }
}

function f10(g) {
  var i1 = 2;
  a: for (;;) {
    var i2 = 2;
    for (;;) {
      try {
        var i3 = 2;
        c: for (;;) {
          var i4 = 2;
          for (;;) {
            call1(g, (((((i1 + i2) | 0) + i3) | 0) + i4) | 0);
            var ab_ = (i4 + 1) | 0;
            if (3 !== i4) {
              var i4 = ab_;
              continue;
            }
            if (2 < i3) {
              throw caml_wrap_thrown_exception(Not_found);
            }
            var aa_ = (i3 + 1) | 0;
            if (3 !== i3) {
              var i3 = aa_;
              continue c;
            }
            break;
          }
          break;
        }
      } catch (ac_) {
        ac_ = runtime["caml_wrap_exception"](ac_);
        if (ac_ !== Not_found) {
          throw caml_wrap_thrown_exception_reraise(ac_);
        }
      }
      var Z_ = (i2 + 1) | 0;
      if (3 !== i2) {
        var i2 = Z_;
        continue;
      }
      var Y_ = (i1 + 1) | 0;
      if (3 !== i1) {
        var i1 = Y_;
        continue a;
      }
      return 0;
    }
  }
}

function fx(prefix, x) {
  return print_endline(symbol(a_, string_of_int(x)));
}

f1(function(X_) {
  return fx(b_, X_);
});

f2(function(W_) {
  return fx(c_, W_);
});

f3(function(V_) {
  return fx(d_, V_);
});

f4(function(U_) {
  return fx(e_, U_);
});

f5(function(T_) {
  return fx(f_, T_);
});

f6(function(S_) {
  return fx(g_, S_);
});

f7(function(R_) {
  return fx(h_, R_);
});

f8(function(Q_) {
  return fx(i_, Q_);
});

f9(function(P_) {
  return fx(j_, P_);
});

f10(function(O_) {
  return fx(k_, O_);
});

function h1(g, t) {
  var i = 2;
  for (;;) {
    switch (t) {
      case 0:
        call1(g, 0);
        break;
      case 1:
        var k = 4;
        for (;;) {
          call1(g, (i + k) | 0);
          var N_ = (k + 1) | 0;
          if (5 !== k) {
            var k = N_;
            continue;
          }
          break;
        }
        break;
      default:
        call1(g, 1);
    }
    var M_ = (i + 1) | 0;
    if (3 !== i) {
      var i = M_;
      continue;
    }
    return 0;
  }
}

function h2(g, t) {
  var i = 2;
  a: for (;;) {
    var j = 2;
    for (;;) {
      switch (t) {
        case 0:
          call1(g, 0);
          break;
        case 1:
          var k = 4;
          for (;;) {
            call1(g, (((i + j) | 0) + k) | 0);
            var L_ = (k + 1) | 0;
            if (5 !== k) {
              var k = L_;
              continue;
            }
            break;
          }
          break;
        default:
          call1(g, 1);
      }
      var K_ = (j + 1) | 0;
      if (3 !== j) {
        var j = K_;
        continue;
      }
      var J_ = (i + 1) | 0;
      if (3 !== i) {
        var i = J_;
        continue a;
      }
      return 0;
    }
  }
}

function h3(g, t) {
  var i = 4;
  for (;;) {
    switch (t) {
      case 0:
        call1(g, 0);
        break;
      case 1:
        var j = 4;
        b: for (;;) {
          var k = 2;
          for (;;) {
            call1(g, (((i + j) | 0) + k) | 0);
            var I_ = (k + 1) | 0;
            if (3 !== k) {
              var k = I_;
              continue;
            }
            var H_ = (j + 1) | 0;
            if (5 !== j) {
              var j = H_;
              continue b;
            }
            break;
          }
          break;
        }
        break;
      default:
        call1(g, 1);
    }
    var G_ = (i + 1) | 0;
    if (5 !== i) {
      var i = G_;
      continue;
    }
    return 0;
  }
}

function h4(g, t) {
  switch (t) {
    case 0:
      return call1(g, 0);
    case 1:
      var j = 4;
      a: for (;;) {
        var k = 2;
        for (;;) {
          call1(g, (j + k) | 0);
          var F_ = (k + 1) | 0;
          if (3 !== k) {
            var k = F_;
            continue;
          }
          var E_ = (j + 1) | 0;
          if (5 !== j) {
            var j = E_;
            continue a;
          }
          return 0;
        }
      }
    default:
      return call1(g, 1);
  }
}

function h5(g, t) {
  var i = 2;
  a: for (;;) {
    var j = 2;
    for (;;) {
      switch (t) {
        case 0:
          call1(g, 0);
          break;
        case 1:
          var k = 4;
          c: for (;;) {
            var l = 2;
            for (;;) {
              call1(g, (((i + j) | 0) + k) | 0);
              var D_ = (l + 1) | 0;
              if (3 !== l) {
                var l = D_;
                continue;
              }
              var C_ = (k + 1) | 0;
              if (5 !== k) {
                var k = C_;
                continue c;
              }
              break;
            }
            break;
          }
          break;
        default:
          call1(g, 1);
      }
      var B_ = (j + 1) | 0;
      if (3 !== j) {
        var j = B_;
        continue;
      }
      var A_ = (i + 1) | 0;
      if (3 !== i) {
        var i = A_;
        continue a;
      }
      return 0;
    }
  }
}

var l_ = 0;

h1(function(z_) {
  return fx(m_, z_);
}, l_);

var n_ = 0;

h2(function(y_) {
  return fx(o_, y_);
}, n_);

var p_ = 0;

h3(function(x_) {
  return fx(q_, x_);
}, p_);

var r_ = 0;

h4(function(w_) {
  return fx(s_, w_);
}, r_);

var t_ = 0;

h5(function(v_) {
  return fx(u_, v_);
}, t_);

do_at_exit(0);
