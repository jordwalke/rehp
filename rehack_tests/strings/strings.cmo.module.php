<?hh
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * Strings.php
 */

namespace Rehack;

final class Strings {
  <<__Memoize>>
  public static function get() {
    $global_object = \Rehack\GlobalObject::get();
    $runtime = \Rehack\Runtime::get();
    /*
     * Soon, these will replace the `global_data->ModuleName`
     * pattern in the load() function.
     */
    $Pervasives = Pervasives::get();
    $String_ = String_::get();
    $StringHelper = StringHelper::get();
    $Failure = Failure::get();
    $Not_found = Not_found::get();
    Strings::load($global_object);
    $memoized = $runtime->caml_get_global_data()->Strings;
    return $memoized;
  }

  /**
   * Performs module load operation. May have side effects.
   */
  private static function load($joo_global_object) {
    

    $runtime = $joo_global_object->jsoo_runtime;
    $caml_arity_test = $runtime->caml_arity_test;
    $ArrayLiteral = $runtime->ArrayLiteral;
    $caml_int_of_string = $runtime->caml_int_of_string;
    $caml_new_string = $runtime->caml_new_string;
    $caml_wrap_exception = $runtime->caml_wrap_exception;
    $caml_call1 = function($f, $a0) use ($ArrayLiteral,$caml_arity_test,$runtime) {
      return $caml_arity_test($f) == 1
        ? $f($a0)
        : ($runtime->caml_call_gen($f, $ArrayLiteral($a0)));
    };
    $caml_call2 = function($f, $a0, $a1) use ($ArrayLiteral,$caml_arity_test,$runtime) {
      return $caml_arity_test($f) == 2
        ? $f($a0, $a1)
        : ($runtime->caml_call_gen($f, $ArrayLiteral($a0, $a1)));
    };
    $global_data = $runtime->caml_get_global_data();
    $cst_The_variable_v_should_not_conflict_with_any_other_variables_in_scope = $caml_new_string(
      "The variable v_ should not conflict with any other variables in scope"
    );
    $greeting = $caml_new_string("hello world");
    $greeting__0 = $caml_new_string("hello world with unicode: \xc9\x8a");
    $cst_String_length_should_be_two = $caml_new_string(
      "String.length(\"\xc9\x8a\") should be two:"
    );
    $cst_1 = $caml_new_string("-1");
    $cst_6 = $caml_new_string("-6");
    $cst_1__0 = $caml_new_string("1");
    $cst_6__0 = $caml_new_string("6");
    $cst_as_df = $caml_new_string("as_df");
    $cst_index_from_string_with_char = $caml_new_string(
      "index from string with char: "
    );
    $cst_asdf = $caml_new_string("asdf");
    $cst_index_from_string_without_char = $caml_new_string(
      "index from string without char: "
    );
    $cst_Prints_seven = $caml_new_string("Prints seven:");
    $cst_Prints_six = $caml_new_string("Prints six:");
    $cst_Prints_six__0 = $caml_new_string("Prints six:");
    $cst_6__1 = $caml_new_string("6");
    $cst_Reason_is_on = $caml_new_string("Reason is on \xf0\x9f\x94\xa5");
    $cst_trimmed_string = $caml_new_string(" trimmed string ");
    $cst_tmp = $caml_new_string("tmp");
    $cst_WHEREAMI = $caml_new_string("WHEREAMI");
    $cst_Properly_caught_invalid_string_to_int_conversion = $caml_new_string(
      "Properly caught invalid string to int conversion."
    );
    $cst_Did_not_properly_catch_Failure_exception = $caml_new_string(
      "Did not properly catch Failure exception"
    );
    $cst_20 = $caml_new_string("20");
    $cst_Properly_caught_conversion_from_string_20_to_int = $caml_new_string(
      "Properly caught conversion from string '20' to int "
    );
    $cst_Did_not_properly_catch_conversion_from_string_to_int = $caml_new_string(
      "Did not properly catch conversion from string to int"
    );
    $cst_ARE_T = $caml_new_string("ARE == T: ");
    $cst_ARE_F = $caml_new_string("ARE === F: ");
    $cst_Nans_are_should_output_true = $caml_new_string(
      "Nans are === (should output true):"
    );
    $cst_Nans_are_should_output_false = $caml_new_string(
      "Nans are == (should output false):"
    );
    $Pervasives = $global_data->Pervasives;
    $String = $global_data->String;
    $Not_found = $global_data->Not_found;
    $StringHelper = $global_data->StringHelper;
    $Failure = $global_data->Failure;
    $r = R(0, 1, R(0, 2, R(0, 3, R(0, 4, 0))));
    $s = R(0, 1, R(0, 2, R(0, 3, R(0, 4, 0))));
    
    $caml_call1($Pervasives[34], $greeting);
    
    $caml_call1($Pervasives[34], $greeting__0);
    
    $a = $caml_call1($Pervasives[21], 2);
    $b = $caml_call2($Pervasives[16], $cst_String_length_should_be_two, $a);
    
    $caml_call1($Pervasives[34], $b);
    
    $c = $caml_call2($String[1], 1, 138);
    $d = $caml_call2($String[1], 1, 201);
    $e = $caml_call2($Pervasives[16], $d, $c);
    
    $caml_call1($Pervasives[34], $e);
    
    $caml_int_of_string($cst_1);
    
    $negativeOne = $caml_int_of_string($cst_6);
    $one = $caml_int_of_string($cst_1__0);
    $six = $caml_int_of_string($cst_6__0);
    $index = $caml_call2($String[14], $cst_as_df, 95);
    $f = $caml_call1($Pervasives[21], $index);
    $g = $caml_call2($Pervasives[16], $cst_index_from_string_with_char, $f);
    
    $caml_call1($Pervasives[34], $g);
    
    $unicodeLength = 2;
    
    try {$D = $caml_call2($String[14], $cst_asdf, 95);$index__0 = $D;}
    catch(\Throwable $G) {
      $G = $caml_wrap_exception($G);
      if ($G !== $Not_found) {
        throw $runtime->caml_wrap_thrown_exception_reraise($G);
      }
      $h = -1;
      $index__0 = $h;
    }
    
    $i = $caml_call1($Pervasives[21], $index__0);
    $j = $caml_call2($Pervasives[16], $cst_index_from_string_without_char, $i);
    
    $caml_call1($Pervasives[34], $j);
    
    $caml_call1($Pervasives[32], $index__0);
    
    $caml_call1($Pervasives[34], $cst_Prints_seven);
    
    $caml_call1($Pervasives[32], $one + $six | 0);
    
    $caml_call1($Pervasives[35], 0);
    
    $caml_call1($Pervasives[34], $cst_Prints_six);
    
    $caml_call1($Pervasives[32], $six);
    
    $caml_call1($Pervasives[35], 0);
    
    $caml_call1($Pervasives[34], $cst_Prints_six__0);
    
    $caml_call1($Pervasives[30], $cst_6__1);
    
    $caml_call1($Pervasives[35], 0);
    
    $caml_call1($Pervasives[34], $StringHelper[1]);
    
    $caml_call1($Pervasives[34], $cst_Reason_is_on);
    
    $k = $caml_call1($String[12], $cst_trimmed_string);
    
    $caml_call1($Pervasives[34], $k);
    
    $createIntFromString = function($ss) use ($caml_int_of_string) {
      return $caml_int_of_string($ss);
    };
    $myFunction = function
    ($cst_The_variable_v_should_not_conflict_with_any_other_variables_in_scope__0) use ($Pervasives,$caml_call1,$cst_The_variable_v_should_not_conflict_with_any_other_variables_in_scope) {
      $caml_call1(
        $Pervasives[30],
        $cst_The_variable_v_should_not_conflict_with_any_other_variables_in_scope
      );
      return $caml_call1($Pervasives[35], 0);
    };
    
    $myFunction($cst_tmp);
    
    try {$C = $createIntFromString($cst_WHEREAMI);$m = $C;}
    catch(\Throwable $F) {
      $F = $caml_wrap_exception($F);
      if ($F[1] !== $Failure) {
        throw $runtime->caml_wrap_thrown_exception_reraise($F);
      }
      $l = 102;
      $m = $l;
    }
    
    if (102 === $m) {
      $caml_call1(
        $Pervasives[30],
        $cst_Properly_caught_invalid_string_to_int_conversion
      );
      $caml_call1($Pervasives[35], 0);
    }
    else {
      $caml_call1(
        $Pervasives[2],
        $cst_Did_not_properly_catch_Failure_exception
      );
    }
    
    try {$B = $createIntFromString($cst_20);$o = $B;}
    catch(\Throwable $E) {
      $E = $caml_wrap_exception($E);
      if ($E[1] !== $Failure) {
        throw $runtime->caml_wrap_thrown_exception_reraise($E);
      }
      $n = 102;
      $o = $n;
    }
    
    if (20 === $o) {
      $p = $caml_call1($Pervasives[21], $o);
      $q = $caml_call2(
        $Pervasives[16],
        $cst_Properly_caught_conversion_from_string_20_to_int,
        $p
      );
      $caml_call1($Pervasives[30], $q);
      $caml_call1($Pervasives[35], 0);
    }
    else {
      $caml_call1(
        $Pervasives[2],
        $cst_Did_not_properly_catch_conversion_from_string_to_int
      );
    }
    
    $one__0 = V(0, $r);
    $two = V(0, $s);
    $t = $caml_call1($Pervasives[18], $runtime->caml_equal($one__0, $two));
    $u = $caml_call2($Pervasives[16], $cst_ARE_T, $t);
    
    $caml_call1($Pervasives[30], $u);
    
    $caml_call1($Pervasives[35], 0);
    
    $v = $caml_call1($Pervasives[18], $one__0 === $two ? 1 : (0));
    $w = $caml_call2($Pervasives[16], $cst_ARE_F, $v);
    
    $caml_call1($Pervasives[30], $w);
    
    $caml_call1($Pervasives[35], 0);
    
    $n__0 = $Pervasives[12];
    $anotherName = $Pervasives[12];
    $x = $caml_call1($Pervasives[18], $n__0 === $anotherName ? 1 : (0));
    $y = $caml_call2($Pervasives[16], $cst_Nans_are_should_output_true, $x);
    
    $caml_call1($Pervasives[30], $y);
    
    $caml_call1($Pervasives[35], 0);
    
    $z = $caml_call1($Pervasives[18], $n__0 === $anotherName ? 1 : (0));
    $A = $caml_call2($Pervasives[16], $cst_Nans_are_should_output_false, $z);
    
    $caml_call1($Pervasives[30], $A);
    
    $caml_call1($Pervasives[35], 0);
    
    $Strings = V(
      0,
      $greeting__0,
      $unicodeLength,
      $negativeOne,
      $six,
      $index__0,
      $createIntFromString,
      $myFunction,
      $o,
      $one__0,
      $two,
      $n__0,
      $anotherName
    );
    
    $runtime->caml_register_global(39, $Strings, "Strings");

  }
}