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
    $call1 = $runtime["caml_call1"];
    $call2 = $runtime["caml_call2"];
    $caml_int_of_string = $runtime["caml_int_of_string"];
    $string = $runtime["caml_new_string"];
    $caml_wrap_exception = $runtime["caml_wrap_exception"];
    $global_data = $runtime["caml_get_global_data"]();
    $cst_The_variable_v_should_not_conflict_with_any_other_variables_in_scope = $string(
      "The variable v_ should not conflict with any other variables in scope"
    );
    $greeting = $string("hello world");
    $greeting__0 = $string("hello world with unicode: \xc9\x8a");
    $cst_String_length_should_be_two = $string(
      "String.length(\"\xc9\x8a\") should be two:"
    );
    $cst_1 = $string("-1");
    $cst_6 = $string("-6");
    $cst_1__0 = $string("1");
    $cst_6__0 = $string("6");
    $cst_as_df = $string("as_df");
    $cst_index_from_string_with_char = $string("index from string with char: "
    );
    $cst_asdf = $string("asdf");
    $cst_index_from_string_without_char = $string(
      "index from string without char: "
    );
    $cst_Prints_seven = $string("Prints seven:");
    $cst_Prints_six = $string("Prints six:");
    $cst_Prints_six__0 = $string("Prints six:");
    $cst_6__1 = $string("6");
    $cst_Reason_is_on = $string("Reason is on \xf0\x9f\x94\xa5");
    $cst_trimmed_string = $string(" trimmed string ");
    $cst_tmp = $string("tmp");
    $cst_WHEREAMI = $string("WHEREAMI");
    $cst_Properly_caught_invalid_string_to_int_conversion = $string(
      "Properly caught invalid string to int conversion."
    );
    $cst_Did_not_properly_catch_Failure_exception = $string(
      "Did not properly catch Failure exception"
    );
    $cst_20 = $string("20");
    $cst_Properly_caught_conversion_from_string_20_to_int = $string(
      "Properly caught conversion from string '20' to int "
    );
    $cst_Did_not_properly_catch_conversion_from_string_to_int = $string(
      "Did not properly catch conversion from string to int"
    );
    $cst_ARE_T = $string("ARE == T: ");
    $cst_ARE_F = $string("ARE === F: ");
    $cst_Nans_are_should_output_true = $string(
      "Nans are === (should output true):"
    );
    $cst_Nans_are_should_output_false = $string(
      "Nans are == (should output false):"
    );
    $Pervasives = $global_data["Pervasives"];
    $String = $global_data["String_"];
    $Not_found = $global_data["Not_found"];
    $StringHelper = $global_data["StringHelper"];
    $Failure = $global_data["Failure"];
    $r = Vector{0, 1, Vector{0, 2, Vector{0, 3, Vector{0, 4, 0}}}};
    $s = Vector{0, 1, Vector{0, 2, Vector{0, 3, Vector{0, 4, 0}}}};
    
    $call1($Pervasives[34], $greeting);
    
    $call1($Pervasives[34], $greeting__0);
    
    $a = $call1($Pervasives[21], 2);
    $b = $call2($Pervasives[16], $cst_String_length_should_be_two, $a);
    
    $call1($Pervasives[34], $b);
    
    $c = $call2($String[1], 1, 138);
    $d = $call2($String[1], 1, 201);
    $e = $call2($Pervasives[16], $d, $c);
    
    $call1($Pervasives[34], $e);
    
    $caml_int_of_string($cst_1);
    
    $negativeOne = $caml_int_of_string($cst_6);
    $one = $caml_int_of_string($cst_1__0);
    $six = $caml_int_of_string($cst_6__0);
    $index = $call2($String[14], $cst_as_df, 95);
    $f = $call1($Pervasives[21], $index);
    $g = $call2($Pervasives[16], $cst_index_from_string_with_char, $f);
    
    $call1($Pervasives[34], $g);
    
    $unicodeLength = 2;
    
    try {$D = $call2($String[14], $cst_asdf, 95);$index__0 = $D;}
    catch(\Throwable $G) {
      $G = $caml_wrap_exception($G);
      if ($G !== $Not_found) {
        throw $runtime["caml_wrap_thrown_exception_reraise"]($G) as \Throwable;
      }
      $h = -1;
      $index__0 = $h;
    }
    
    $i = $call1($Pervasives[21], $index__0);
    $j = $call2($Pervasives[16], $cst_index_from_string_without_char, $i);
    
    $call1($Pervasives[34], $j);
    
    $call1($Pervasives[32], $index__0);
    
    $call1($Pervasives[34], $cst_Prints_seven);
    
    $call1($Pervasives[32], (int) ($one + $six));
    
    $call1($Pervasives[35], 0);
    
    $call1($Pervasives[34], $cst_Prints_six);
    
    $call1($Pervasives[32], $six);
    
    $call1($Pervasives[35], 0);
    
    $call1($Pervasives[34], $cst_Prints_six__0);
    
    $call1($Pervasives[30], $cst_6__1);
    
    $call1($Pervasives[35], 0);
    
    $call1($Pervasives[34], $StringHelper[1]);
    
    $call1($Pervasives[34], $cst_Reason_is_on);
    
    $k = $call1($String[12], $cst_trimmed_string);
    
    $call1($Pervasives[34], $k);
    
    $createIntFromString = function(dynamic $ss) use ($caml_int_of_string) {
      return $caml_int_of_string($ss);
    };
    $myFunction = function
    (dynamic $cst_The_variable_v_should_not_conflict_with_any_other_variables_in_scope__0) use ($Pervasives,$call1,$cst_The_variable_v_should_not_conflict_with_any_other_variables_in_scope) {
      $call1(
        $Pervasives[30],
        $cst_The_variable_v_should_not_conflict_with_any_other_variables_in_scope
      );
      return $call1($Pervasives[35], 0);
    };
    
    $myFunction($cst_tmp);
    
    try {$C = $createIntFromString($cst_WHEREAMI);$m = $C;}
    catch(\Throwable $F) {
      $F = $caml_wrap_exception($F);
      if ($F[1] !== $Failure) {
        throw $runtime["caml_wrap_thrown_exception_reraise"]($F) as \Throwable;
      }
      $l = 102;
      $m = $l;
    }
    
    if (102 === $m) {
      $call1(
        $Pervasives[30],
        $cst_Properly_caught_invalid_string_to_int_conversion
      );
      $call1($Pervasives[35], 0);
    }
    else {
      $call1($Pervasives[2], $cst_Did_not_properly_catch_Failure_exception);
    }
    
    try {$B = $createIntFromString($cst_20);$o = $B;}
    catch(\Throwable $E) {
      $E = $caml_wrap_exception($E);
      if ($E[1] !== $Failure) {
        throw $runtime["caml_wrap_thrown_exception_reraise"]($E) as \Throwable;
      }
      $n = 102;
      $o = $n;
    }
    
    if (20 === $o) {
      $p = $call1($Pervasives[21], $o);
      $q = $call2(
        $Pervasives[16],
        $cst_Properly_caught_conversion_from_string_20_to_int,
        $p
      );
      $call1($Pervasives[30], $q);
      $call1($Pervasives[35], 0);
    }
    else {
      $call1(
        $Pervasives[2],
        $cst_Did_not_properly_catch_conversion_from_string_to_int
      );
    }
    
    $one__0 = Vector{0, $r};
    $two = Vector{0, $s};
    $t = $call1($Pervasives[18], $runtime["caml_equal"]($one__0, $two));
    $u = $call2($Pervasives[16], $cst_ARE_T, $t);
    
    $call1($Pervasives[30], $u);
    
    $call1($Pervasives[35], 0);
    
    $v = $call1($Pervasives[18], $one__0 === $two ? 1 : (0));
    $w = $call2($Pervasives[16], $cst_ARE_F, $v);
    
    $call1($Pervasives[30], $w);
    
    $call1($Pervasives[35], 0);
    
    $n__0 = $Pervasives[12];
    $anotherName = $Pervasives[12];
    $x = $call1($Pervasives[18], $n__0 === $anotherName ? 1 : (0));
    $y = $call2($Pervasives[16], $cst_Nans_are_should_output_true, $x);
    
    $call1($Pervasives[30], $y);
    
    $call1($Pervasives[35], 0);
    
    $z = $call1($Pervasives[18], $n__0 === $anotherName ? 1 : (0));
    $A = $call2($Pervasives[16], $cst_Nans_are_should_output_false, $z);
    
    $call1($Pervasives[30], $A);
    
    $call1($Pervasives[35], 0);
    
    $Strings = Vector{
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
    };
    
    $runtime["caml_register_global"](39, $Strings, "Strings");

  }
}

/*____hashes compiler:hashing-disabled inputs:hashing-disabled bytecode:hashing-disabled*/
