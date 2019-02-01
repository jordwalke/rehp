<?php

/**
 * Main executable compiled output. Runtime _not_ included in compilation
 * output.
 */
namespace Rehack;

$joo_global_object = \Rehack\GlobalObject::get();
$runtime = \Rehack\Runtime::get();
$G=$joo_global_object;



$caml_string_equal = $joo_global_object->caml_string_equal !== $G->undefined
  ? $joo_global_object->caml_string_equal
  : (function() use (&$caml_failwith) {
   $caml_failwith("caml_string_equal" . " not implemented");
 });
$caml_ml_string_length = $joo_global_object->caml_ml_string_length !==
   $G->undefined
  ? $joo_global_object->caml_ml_string_length
  : (function() use (&$caml_failwith) {
   $caml_failwith("caml_ml_string_length" . " not implemented");
 });
$caml_ml_output_char = $joo_global_object->caml_ml_output_char !==
   $G->undefined
  ? $joo_global_object->caml_ml_output_char
  : (function() use (&$caml_failwith) {
   $caml_failwith("caml_ml_output_char" . " not implemented");
 });
$caml_ml_output = $joo_global_object->caml_ml_output !== $G->undefined
  ? $joo_global_object->caml_ml_output
  : (function() use (&$caml_failwith) {
   $caml_failwith("caml_ml_output" . " not implemented");
 });
$caml_ml_out_channels_list = $joo_global_object->caml_ml_out_channels_list !==
   $G->undefined
  ? $joo_global_object->caml_ml_out_channels_list
  : (function() use (&$caml_failwith) {
   $caml_failwith("caml_ml_out_channels_list" . " not implemented");
 });
$caml_ml_open_descriptor_out = $joo_global_object->caml_ml_open_descriptor_out !==
   $G->undefined
  ? $joo_global_object->caml_ml_open_descriptor_out
  : (function() use (&$caml_failwith) {
   $caml_failwith("caml_ml_open_descriptor_out" . " not implemented");
 });
$caml_ml_open_descriptor_in = $joo_global_object->caml_ml_open_descriptor_in !==
   $G->undefined
  ? $joo_global_object->caml_ml_open_descriptor_in
  : (function() use (&$caml_failwith) {
   $caml_failwith("caml_ml_open_descriptor_in" . " not implemented");
 });
$caml_ml_flush = $joo_global_object->caml_ml_flush !== $G->undefined
  ? $joo_global_object->caml_ml_flush
  : (function() use (&$caml_failwith) {
   $caml_failwith("caml_ml_flush" . " not implemented");
 });
$caml_ml_bytes_length = $joo_global_object->caml_ml_bytes_length !==
   $G->undefined
  ? $joo_global_object->caml_ml_bytes_length
  : (function() use (&$caml_failwith) {
   $caml_failwith("caml_ml_bytes_length" . " not implemented");
 });
$caml_int_of_string = $joo_global_object->caml_int_of_string !== $G->undefined
  ? $joo_global_object->caml_int_of_string
  : (function() use (&$caml_failwith) {
   $caml_failwith("caml_int_of_string" . " not implemented");
 });
$caml_int64_float_of_bits = $joo_global_object->caml_int64_float_of_bits !==
   $G->undefined
  ? $joo_global_object->caml_int64_float_of_bits
  : (function() use (&$caml_failwith) {
   $caml_failwith("caml_int64_float_of_bits" . " not implemented");
 });
$caml_fresh_oo_id = $joo_global_object->caml_fresh_oo_id !== $G->undefined
  ? $joo_global_object->caml_fresh_oo_id
  : (function() use (&$caml_failwith) {
   $caml_failwith("caml_fresh_oo_id" . " not implemented");
 });
$caml_fill_bytes = $joo_global_object->caml_fill_bytes !== $G->undefined
  ? $joo_global_object->caml_fill_bytes
  : (function() use (&$caml_failwith) {
   $caml_failwith("caml_fill_bytes" . " not implemented");
 });
$caml_failwith = $joo_global_object->caml_failwith !== $G->undefined
  ? $joo_global_object->caml_failwith
  : (function() use (&$caml_failwith) {
   $caml_failwith("caml_failwith" . " not implemented");
 });
$caml_equal = $joo_global_object->caml_equal !== $G->undefined
  ? $joo_global_object->caml_equal
  : (function() use (&$caml_failwith) {
   $caml_failwith("caml_equal" . " not implemented");
 });
$caml_create_bytes = $joo_global_object->caml_create_bytes !== $G->undefined
  ? $joo_global_object->caml_create_bytes
  : (function() use (&$caml_failwith) {
   $caml_failwith("caml_create_bytes" . " not implemented");
 });
$caml_blit_string = $joo_global_object->caml_blit_string !== $G->undefined
  ? $joo_global_object->caml_blit_string
  : (function() use (&$caml_failwith) {
   $caml_failwith("caml_blit_string" . " not implemented");
 });
$caml_blit_bytes = $joo_global_object->caml_blit_bytes !== $G->undefined
  ? $joo_global_object->caml_blit_bytes
  : (function() use (&$caml_failwith) {
   $caml_failwith("caml_blit_bytes" . " not implemented");
 });
$Out_of_memory = R(248, $G->caml_new_string("Out_of_memory"), -1);
$Sys_error = R(248, $G->caml_new_string("Sys_error"), -2);
$Failure = R(248, $G->caml_new_string("Failure"), -3);
$Invalid_argument = R(248, $G->caml_new_string("Invalid_argument"), -4);
$End_of_file = R(248, $G->caml_new_string("End_of_file"), -5);
$Division_by_zero = R(248, $G->caml_new_string("Division_by_zero"), -6);
$Not_found = R(248, $G->caml_new_string("Not_found"), -7);
$Match_failure = R(248, $G->caml_new_string("Match_failure"), -8);
$Stack_overflow = R(248, $G->caml_new_string("Stack_overflow"), -9);
$Sys_blocked_io = R(248, $G->caml_new_string("Sys_blocked_io"), -10);
$Assert_failure = R(248, $G->caml_new_string("Assert_failure"), -11);
$Undefined_recursive_module = R(
  248,
  $G->caml_new_string("Undefined_recursive_module"),
  -12
);
$helperVal = $G->caml_new_string("hello");
$greeting = $G->caml_new_string("hello world");
$greeting__0 = $G->caml_new_string("hello world with unicode: \xc9\x8a");

$G->caml_register_global(
  11,
  $Undefined_recursive_module,
  "Undefined_recursive_module"
);

$G->caml_register_global(10, $Assert_failure, "Assert_failure");

$G->caml_register_global(9, $Sys_blocked_io, "Sys_blocked_io");

$G->caml_register_global(8, $Stack_overflow, "Stack_overflow");

$G->caml_register_global(7, $Match_failure, "Match_failure");

$G->caml_register_global(6, $Not_found, "Not_found");

$G->caml_register_global(5, $Division_by_zero, "Division_by_zero");

$G->caml_register_global(4, $End_of_file, "End_of_file");

$G->caml_register_global(3, $Invalid_argument, "Invalid_argument");

$G->caml_register_global(2, $Failure, "Failure");

$G->caml_register_global(1, $Sys_error, "Sys_error");

$G->caml_register_global(0, $Out_of_memory, "Out_of_memory");

$_h_ = $G->caml_new_string("true");
$_i_ = $G->caml_new_string("false");
$_a_ = R(255, 0, 0, 32752);
$_b_ = R(255, 0, 0, 65520);
$_c_ = R(255, 1, 0, 32752);
$_d_ = R(255, 16777215, 16777215, 32751);
$_e_ = R(255, 0, 0, 16);
$_f_ = R(255, 0, 0, 15536);
$_j_ = $G->caml_new_string("String.sub / Bytes.sub");
$_k_ = $G->caml_new_string("");
$_l_ = $G->caml_new_string("String.length(\"\xc9\x8a\") should be two:");
$_n_ = $G->caml_new_string("-1");
$_o_ = $G->caml_new_string("-6");
$_p_ = $G->caml_new_string("1");
$_q_ = $G->caml_new_string("6");
$_r_ = $G->caml_new_string("as_df");
$_s_ = $G->caml_new_string("index from string with char: ");
$_R_ = $G->caml_new_string("asdf");
$_u_ = $G->caml_new_string("index from string without char: ");
$_v_ = $G->caml_new_string("Prints seven:");
$_w_ = $G->caml_new_string("Prints six:");
$_x_ = $G->caml_new_string("Prints six:");
$_y_ = $G->caml_new_string("6");
$_z_ = $G->caml_new_string("Reason is on \xf0\x9f\x94\xa5");
$_A_ = $G->caml_new_string(" trimmed string ");
$_P_ = $G->caml_new_string("WHEREAMI");
$_D_ = $G->caml_new_string("Properly caught invalid string to int conversion."
);
$_O_ = $G->caml_new_string("Did not properly catch Failure exception");
$_M_ = $G->caml_new_string("20");
$_G_ = $G->caml_new_string(
  "Properly caught conversion from string '20' to int "
);
$_L_ = $G->caml_new_string(
  "Did not properly catch conversion from string to int"
);
$_H_ = R(0, 1, R(0, 2, R(0, 3, R(0, 4, 0))));
$_I_ = R(0, 1, R(0, 2, R(0, 3, R(0, 4, 0))));
$_J_ = $G->caml_new_string("ARE == T: ");
$_K_ = $G->caml_new_string("ARE === F: ");

$failwith = function($s) use (&$Failure,&$G) {
  throw $G->caml_wrap_thrown_exception(V(0, $Failure, $s));
};

$invalid_arg = function($s) use (&$G,&$Invalid_argument) {
  throw $G->caml_wrap_thrown_exception(V(0, $Invalid_argument, $s));
};

$caml_fresh_oo_id(0);

$caml_int64_float_of_bits($_a_);

$caml_int64_float_of_bits($_b_);

$caml_int64_float_of_bits($_c_);

$caml_int64_float_of_bits($_d_);

$caml_int64_float_of_bits($_e_);

$caml_int64_float_of_bits($_f_);

$_g_ = function($s1, $s2) use (&$caml_blit_string,&$caml_create_bytes,&$caml_ml_string_length) {
  $l1 = $caml_ml_string_length($s1);
  $l2 = $caml_ml_string_length($s2);
  $s = $caml_create_bytes($l1 + $l2 | 0);
  $caml_blit_string($s1, 0, $s, 0, $l1);
  $caml_blit_string($s2, 0, $s, $l1, $l2);
  return $s;
};

$string_of_bool = function($b) use (&$_h_,&$_i_) {return $b ? $_h_ : ($_i_);};

$string_of_int = function($n) use (&$G) {return $G->caml_new_string("" . $n);};

$caml_ml_open_descriptor_in(0);

$stdout = $caml_ml_open_descriptor_out(1);

$caml_ml_open_descriptor_out(2);

$flush_all = function($param) use (&$G,&$Sys_error,&$caml_ml_flush,&$caml_ml_out_channels_list) {
  $iter = function($param) use (&$G,&$Sys_error,&$caml_ml_flush) {
    $param__0 = $param;
    for (;;) {
      if ($param__0) {
        $l = $param__0[2];
        $a = $param__0[1];
        try {$caml_ml_flush($a);}
        catch(\Throwable $___) {
          $___ = $G->caml_wrap_exception($___);
          if ($___[1] !== $Sys_error) {
            throw $G->caml_wrap_thrown_exception_reraise($___);
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

$output_string = function($oc, $s) use (&$caml_ml_output,&$caml_ml_string_length) {
  return $caml_ml_output($oc, $s, 0, $caml_ml_string_length($s));
};

$print_string = function($s) use (&$output_string,&$stdout) {
  return $output_string($stdout, $s);
};

$print_int = function($i) use (&$output_string,&$stdout,&$string_of_int) {
  return $output_string($stdout, $string_of_int($i));
};

$print_endline = function($s) use (&$caml_ml_flush,&$caml_ml_output_char,&$output_string,&$stdout) {
  $output_string($stdout, $s);
  $caml_ml_output_char($stdout, 10);
  return $caml_ml_flush($stdout);
};

$print_newline = function($param) use (&$caml_ml_flush,&$caml_ml_output_char,&$stdout) {
  $caml_ml_output_char($stdout, 10);
  return $caml_ml_flush($stdout);
};

$do_at_exit = function($param) use (&$flush_all) {return $flush_all(0);};

$make = function($n, $c) use (&$caml_create_bytes,&$caml_fill_bytes) {
  $s = $caml_create_bytes($n);
  $caml_fill_bytes($s, 0, $n, $c);
  return $s;
};

$empty = $caml_create_bytes(0);

$sub = function($s, $ofs, $len) use (&$_j_,&$caml_blit_bytes,&$caml_create_bytes,&$caml_ml_bytes_length,&$invalid_arg) {
  if (0 <= $ofs) {
    if (0 <= $len) {
      if (! (($caml_ml_bytes_length($s) - $len | 0) < $ofs)) {
        $r = $caml_create_bytes($len);
        $caml_blit_bytes($s, $ofs, $r, 0, $len);
        return $r;
      }
    }
  }
  return $invalid_arg($_j_);
};

$is_space = function($param) use (&$G) {
  $_Z_ = $param + -9 | 0;
  $switch__0 = 4 < $G->unsigned_right_shift_32($_Z_, 0)
    ? 23 === $_Z_ ? 1 : (0)
    : (2 === $_Z_ ? 0 : (1));
  return $switch__0 ? 1 : (0);
};

$trim = function($s) use (&$G,&$caml_ml_bytes_length,&$empty,&$is_space,&$sub) {
  $len = $caml_ml_bytes_length($s);
  $i = V(0, 0);
  for (;;) {
    if ($i[1] < $len) {
      if ($is_space($G->caml_bytes_unsafe_get($s, $i[1]))) {$i[1] += 1;continue;}
    }
    $j = V(0, $len + -1 | 0);
    for (;;) {
      if ($i[1] <= $j[1]) {
        if ($is_space($G->caml_bytes_unsafe_get($s, $j[1]))) {$j[1] += -1;continue;}
      }
      return $i[1] <= $j[1]
        ? $sub($s, $i[1], ($j[1] - $i[1] | 0) + 1 | 0)
        : ($empty);
    }
  }
};

$bos = function($_Y_) {return $_Y_;};

$bts = function($_X_) {return $_X_;};

$make__0 = function($n, $c) use (&$bts,&$make) {return $bts($make($n, $c));};

$is_space__0 = function($param) use (&$G) {
  $_W_ = $param + -9 | 0;
  $switch__0 = 4 < $G->unsigned_right_shift_32($_W_, 0)
    ? 23 === $_W_ ? 1 : (0)
    : (2 === $_W_ ? 0 : (1));
  return $switch__0 ? 1 : (0);
};

$trim__0 = function($s) use (&$G,&$_k_,&$bos,&$bts,&$caml_ml_string_length,&$caml_string_equal,&$is_space__0,&$trim) {
  if ($caml_string_equal($s, $_k_)) {return $s;}
  if (! $is_space__0($G->caml_bytes_unsafe_get($s, 0))) {
    if (
      !
      $is_space__0(
        $G->caml_bytes_unsafe_get($s, $caml_ml_string_length($s) + -1 | 0)
      )
    ) {return $s;}
  }
  return $bts($trim($bos($s)));
};

$index_rec = function($s, $lim, $i, $c) use (&$G,&$Not_found) {
  $i__0 = $i;
  for (;;) {
    if ($lim <= $i__0) {throw $G->caml_wrap_thrown_exception($Not_found);}
    if ($G->caml_bytes_unsafe_get($s, $i__0) === $c) {return $i__0;}
    $i__1 = $i__0 + 1 | 0;
    $i__0 = $i__1;
    continue;
  }
};

$index = function($s, $c) use (&$caml_ml_string_length,&$index_rec) {
  return $index_rec($s, $caml_ml_string_length($s), 0, $c);
};

$print_endline($greeting);

$print_endline($greeting__0);

$print_endline($_g_($_l_, $string_of_int(2)));

$_m_ = $make__0(1, 138);

$print_endline($_g_($make__0(1, 201), $_m_));

$caml_int_of_string($_n_);

$caml_int_of_string($_o_);

$one = $caml_int_of_string($_p_);
$six = $caml_int_of_string($_q_);
$index__0 = $index($_r_, 95);

$print_endline($_g_($_s_, $string_of_int($index__0)));

try {$_S_ = $index($_R_, 95);$index__1 = $_S_;}
catch(\Throwable $_V_) {
  $_V_ = $G->caml_wrap_exception($_V_);
  if ($_V_ !== $Not_found) {
    throw $G->caml_wrap_thrown_exception_reraise($_V_);
  }
  $_t_ = -1;
  $index__1 = $_t_;
}

$print_endline($_g_($_u_, $string_of_int($index__1)));

$print_int($index__1);

$print_endline($_v_);

$print_int($one + $six | 0);

$print_newline(0);

$print_endline($_w_);

$print_int($six);

$print_newline(0);

$print_endline($_x_);

$print_string($_y_);

$print_newline(0);

$print_endline($helperVal);

$print_endline($_z_);

$print_endline($trim__0($_A_));

$createIntFromString = function($ss) use (&$caml_int_of_string) {
  return $caml_int_of_string($ss);
};

try {$_Q_ = $createIntFromString($_P_);$_C_ = $_Q_;}
catch(\Throwable $_U_) {
  $_U_ = $G->caml_wrap_exception($_U_);
  if ($_U_[1] !== $Failure) {
    throw $G->caml_wrap_thrown_exception_reraise($_U_);
  }
  $_B_ = 102;
  $_C_ = $_B_;
}

if (102 === $_C_) {
  $print_string($_D_);
  $print_newline(0);
}
else {$failwith($_O_);}

try {$_N_ = $createIntFromString($_M_);$_F_ = $_N_;}
catch(\Throwable $_T_) {
  $_T_ = $G->caml_wrap_exception($_T_);
  if ($_T_[1] !== $Failure) {
    throw $G->caml_wrap_thrown_exception_reraise($_T_);
  }
  $_E_ = 102;
  $_F_ = $_E_;
}

if (20 === $_F_) {
  $print_string($_g_($_G_, $string_of_int($_F_)));
  $print_newline(0);
}
else {$failwith($_L_);}

$one__0 = V(0, $_H_);
$two = V(0, $_I_);

$print_string($_g_($_J_, $string_of_bool($caml_equal($one__0, $two))));

$print_newline(0);

$print_string($_g_($_K_, $string_of_bool($one__0 === $two ? 1 : (0))));

$print_newline(0);

$do_at_exit(0);
