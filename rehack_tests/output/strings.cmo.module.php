<?hh // strict
// Copyright 2004-present Facebook. All Rights Reserved.

/**
 * @generated
 *
 */
namespace Rehack;

final class Strings {
  <<__Override, __Memoize>>
  public static function get() : Vector<dynamic> {
    
    $runtime = (\Rehack\GlobalObject::get() as dynamic)->jsoo_runtime;
    $call1 = $runtime["caml_call1"];
    $call2 = $runtime["caml_call2"];
    $caml_int_of_string = $runtime["caml_int_of_string"];
    $string = $runtime["caml_new_string"];
    $caml_wrap_thrown_exception_reraise = $runtime[
       "caml_wrap_thrown_exception_reraise"
     ];
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
    $Stdlib = Stdlib::get();
    $Stdlib_string = Stdlib__string::get();
    $StringHelper = StringHelper::get();
    $r_ = Vector{0, 1, Vector{0, 2, Vector{0, 3, Vector{0, 4, 0}}}} as dynamic;
    $s_ = Vector{0, 1, Vector{0, 2, Vector{0, 3, Vector{0, 4, 0}}}} as dynamic;
    
    $call1($Stdlib[46], $greeting);
    
    $call1($Stdlib[46], $greeting__0);
    
    $a_ = $call1($Stdlib[33], 2);
    $b_ = $call2($Stdlib[28], $cst_String_length_should_be_two, $a_);
    
    $call1($Stdlib[46], $b_);
    
    $c_ = $call2($Stdlib_string[1], 1, 138);
    $d_ = $call2($Stdlib_string[1], 1, 201);
    $e_ = $call2($Stdlib[28], $d_, $c_);
    
    $call1($Stdlib[46], $e_);
    
    $caml_int_of_string($cst_1);
    
    $negativeOne = $caml_int_of_string($cst_6);
    $one = $caml_int_of_string($cst_1__0);
    $six = $caml_int_of_string($cst_6__0);
    $index = $call2($Stdlib_string[14], $cst_as_df, 95);
    $f_ = $call1($Stdlib[33], $index);
    $g_ = $call2($Stdlib[28], $cst_index_from_string_with_char, $f_);
    
    $call1($Stdlib[46], $g_);
    
    $unicodeLength = 2 as dynamic;
    
    try {$D_ = $call2($Stdlib_string[14], $cst_asdf, 95);$index__0 = $D_;}
    catch(\Throwable $G_) {
      $G_ = $runtime["caml_wrap_exception"]($G_);
      if ($G_ !== $Stdlib[8]) {
        throw $caml_wrap_thrown_exception_reraise($G_) as \Throwable;
      }
      $h_ = -1 as dynamic;
      $index__0 = $h_;
    }
    
    $i_ = $call1($Stdlib[33], $index__0);
    $j_ = $call2($Stdlib[28], $cst_index_from_string_without_char, $i_);
    
    $call1($Stdlib[46], $j_);
    
    $call1($Stdlib[44], $index__0);
    
    $call1($Stdlib[46], $cst_Prints_seven);
    
    $call1($Stdlib[44], (int) ($one + $six));
    
    $call1($Stdlib[47], 0);
    
    $call1($Stdlib[46], $cst_Prints_six);
    
    $call1($Stdlib[44], $six);
    
    $call1($Stdlib[47], 0);
    
    $call1($Stdlib[46], $cst_Prints_six__0);
    
    $call1($Stdlib[42], $cst_6__1);
    
    $call1($Stdlib[47], 0);
    
    $call1($Stdlib[46], $StringHelper[1]);
    
    $call1($Stdlib[46], $cst_Reason_is_on);
    
    $k_ = $call1($Stdlib_string[12], $cst_trimmed_string);
    
    $call1($Stdlib[46], $k_);
    
    $createIntFromString = (dynamic $ss) : dynamic ==> {
      return $caml_int_of_string($ss);
    };
    $myFunction = 
    (dynamic $cst_The_variable_v_should_not_conflict_with_any_other_variables_in_scope__0) : dynamic ==> {
      $call1(
        $Stdlib[42],
        $cst_The_variable_v_should_not_conflict_with_any_other_variables_in_scope
      );
      return $call1($Stdlib[47], 0);
    };
    
    $myFunction($cst_tmp);
    
    try {$C_ = $createIntFromString($cst_WHEREAMI);$m_ = $C_;}
    catch(\Throwable $F_) {
      $F_ = $runtime["caml_wrap_exception"]($F_);
      if ($F_[1] !== $Stdlib[7]) {
        throw $caml_wrap_thrown_exception_reraise($F_) as \Throwable;
      }
      $l_ = 102 as dynamic;
      $m_ = $l_;
    }
    
    if (102 === $m_) {
      $call1(
        $Stdlib[42],
        $cst_Properly_caught_invalid_string_to_int_conversion
      );
      $call1($Stdlib[47], 0);
    }
    else {$call1($Stdlib[2], $cst_Did_not_properly_catch_Failure_exception);}
    
    try {$B_ = $createIntFromString($cst_20);$o_ = $B_;}
    catch(\Throwable $E_) {
      $E_ = $runtime["caml_wrap_exception"]($E_);
      if ($E_[1] !== $Stdlib[7]) {
        throw $caml_wrap_thrown_exception_reraise($E_) as \Throwable;
      }
      $n_ = 102 as dynamic;
      $o_ = $n_;
    }
    
    if (20 === $o_) {
      $p_ = $call1($Stdlib[33], $o_);
      $q_ = $call2(
        $Stdlib[28],
        $cst_Properly_caught_conversion_from_string_20_to_int,
        $p_
      );
      $call1($Stdlib[42], $q_);
      $call1($Stdlib[47], 0);
    }
    else {
      $call1(
        $Stdlib[2],
        $cst_Did_not_properly_catch_conversion_from_string_to_int
      );
    }
    
    $myRefCell = Vector{0, 0} as dynamic;
    $myRefCellContents = $myRefCell[1];
    $one__0 = Vector{0, $r_} as dynamic;
    $two = Vector{0, $s_} as dynamic;
    $t_ = $call1($Stdlib[30], $runtime["caml_equal"]($one__0, $two));
    $u_ = $call2($Stdlib[28], $cst_ARE_T, $t_);
    
    $call1($Stdlib[42], $u_);
    
    $call1($Stdlib[47], 0);
    
    $v_ = $call1($Stdlib[30], $one__0 === $two ? 1 : (0));
    $w_ = $call2($Stdlib[28], $cst_ARE_F, $v_);
    
    $call1($Stdlib[42], $w_);
    
    $call1($Stdlib[47], 0);
    
    $n = $Stdlib[24];
    $anotherName = $Stdlib[24];
    $x_ = $call1($Stdlib[30], $n === $anotherName ? 1 : (0));
    $y_ = $call2($Stdlib[28], $cst_Nans_are_should_output_true, $x_);
    
    $call1($Stdlib[42], $y_);
    
    $call1($Stdlib[47], 0);
    
    $z_ = $call1($Stdlib[30], $n === $anotherName ? 1 : (0));
    $A_ = $call2($Stdlib[28], $cst_Nans_are_should_output_false, $z_);
    
    $call1($Stdlib[42], $A_);
    
    $call1($Stdlib[47], 0);
    
    $Strings = Vector{
      0,
      $greeting__0,
      $unicodeLength,
      $negativeOne,
      $six,
      $index__0,
      $createIntFromString,
      $myFunction,
      $o_,
      $myRefCell,
      $myRefCellContents,
      $one__0,
      $two,
      $n,
      $anotherName
    } as dynamic;
    
    return($Strings);

  }
  public static function createIntFromString(dynamic $ss): dynamic {
    return static::syncCall(__FUNCTION__, 6, $ss);
  }
  public static function myFunction(dynamic $cst_The_variable_v_should_not_conflict_with_any_other_variables_in_scope): dynamic {
    return static::syncCall(__FUNCTION__, 7, $cst_The_variable_v_should_not_conflict_with_any_other_variables_in_scope);
  }

}
/* Hashing disabled */
