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
    $joo_global_object = \Rehack\GlobalObject::get() as dynamic;
    
    $runtime = $joo_global_object->jsoo_runtime;
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
    $Pervasives =  Pervasives::get ();
    $String =  String_::get ();
    $Not_found =  Not_found::get ();
    $StringHelper =  StringHelper::get ();
    $Failure =  Failure::get ();
    $r_ = Vector{0, 1, Vector{0, 2, Vector{0, 3, Vector{0, 4, 0}}}};
    $s_ = Vector{0, 1, Vector{0, 2, Vector{0, 3, Vector{0, 4, 0}}}};
    
    $call1($Pervasives[34], $greeting);
    
    $call1($Pervasives[34], $greeting__0);
    
    $a_ = $call1($Pervasives[21], 2);
    $b_ = $call2($Pervasives[16], $cst_String_length_should_be_two, $a_);
    
    $call1($Pervasives[34], $b_);
    
    $c_ = $call2($String[1], 1, 138);
    $d_ = $call2($String[1], 1, 201);
    $e_ = $call2($Pervasives[16], $d_, $c_);
    
    $call1($Pervasives[34], $e_);
    
    $caml_int_of_string($cst_1);
    
    $negativeOne = $caml_int_of_string($cst_6);
    $one = $caml_int_of_string($cst_1__0);
    $six = $caml_int_of_string($cst_6__0);
    $index = $call2($String[14], $cst_as_df, 95);
    $f_ = $call1($Pervasives[21], $index);
    $g_ = $call2($Pervasives[16], $cst_index_from_string_with_char, $f_);
    
    $call1($Pervasives[34], $g_);
    
    $unicodeLength = 2;
    
    try {$D_ = $call2($String[14], $cst_asdf, 95);$index__0 = $D_;}
    catch(\Throwable $G_) {
      $G_ = $runtime["caml_wrap_exception"]($G_);
      if ($G_ !== $Not_found) {
        throw $caml_wrap_thrown_exception_reraise($G_) as \Throwable;
      }
      $h_ = -1;
      $index__0 = $h_;
    }
    
    $i_ = $call1($Pervasives[21], $index__0);
    $j_ = $call2($Pervasives[16], $cst_index_from_string_without_char, $i_);
    
    $call1($Pervasives[34], $j_);
    
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
    
    $k_ = $call1($String[12], $cst_trimmed_string);
    
    $call1($Pervasives[34], $k_);
    
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
    
    try {$C_ = $createIntFromString($cst_WHEREAMI);$m_ = $C_;}
    catch(\Throwable $F_) {
      $F_ = $runtime["caml_wrap_exception"]($F_);
      if ($F_[1] !== $Failure) {
        throw $caml_wrap_thrown_exception_reraise($F_) as \Throwable;
      }
      $l_ = 102;
      $m_ = $l_;
    }
    
    if (102 === $m_) {
      $call1(
        $Pervasives[30],
        $cst_Properly_caught_invalid_string_to_int_conversion
      );
      $call1($Pervasives[35], 0);
    }
    else {
      $call1($Pervasives[2], $cst_Did_not_properly_catch_Failure_exception);
    }
    
    try {$B_ = $createIntFromString($cst_20);$o_ = $B_;}
    catch(\Throwable $E_) {
      $E_ = $runtime["caml_wrap_exception"]($E_);
      if ($E_[1] !== $Failure) {
        throw $caml_wrap_thrown_exception_reraise($E_) as \Throwable;
      }
      $n_ = 102;
      $o_ = $n_;
    }
    
    if (20 === $o_) {
      $p_ = $call1($Pervasives[21], $o_);
      $q_ = $call2(
        $Pervasives[16],
        $cst_Properly_caught_conversion_from_string_20_to_int,
        $p_
      );
      $call1($Pervasives[30], $q_);
      $call1($Pervasives[35], 0);
    }
    else {
      $call1(
        $Pervasives[2],
        $cst_Did_not_properly_catch_conversion_from_string_to_int
      );
    }
    
    $myRefCell = Vector{0, 0};
    $one__0 = Vector{0, $r_};
    $two = Vector{0, $s_};
    $t_ = $call1($Pervasives[18], $runtime["caml_equal"]($one__0, $two));
    $u_ = $call2($Pervasives[16], $cst_ARE_T, $t_);
    
    $call1($Pervasives[30], $u_);
    
    $call1($Pervasives[35], 0);
    
    $v_ = $call1($Pervasives[18], $one__0 === $two ? 1 : (0));
    $w_ = $call2($Pervasives[16], $cst_ARE_F, $v_);
    
    $call1($Pervasives[30], $w_);
    
    $call1($Pervasives[35], 0);
    
    $n = $Pervasives[12];
    $anotherName = $Pervasives[12];
    $x_ = $call1($Pervasives[18], $n === $anotherName ? 1 : (0));
    $y_ = $call2($Pervasives[16], $cst_Nans_are_should_output_true, $x_);
    
    $call1($Pervasives[30], $y_);
    
    $call1($Pervasives[35], 0);
    
    $z_ = $call1($Pervasives[18], $n === $anotherName ? 1 : (0));
    $A_ = $call2($Pervasives[16], $cst_Nans_are_should_output_false, $z_);
    
    $call1($Pervasives[30], $A_);
    
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
      $o_,
      $myRefCell,
      0,
      $one__0,
      $two,
      $n,
      $anotherName
    };
    
     return ($Strings);

  }
  public static function anotherName() {
    return static::get()[14]();
  }
  public static function n() {
    return static::get()[13]();
  }
  public static function two() {
    return static::get()[12]();
  }
  public static function one() {
    return static::get()[11]();
  }
  public static function myRefCellContents() {
    return static::get()[10]();
  }
  public static function myRefCell() {
    return static::get()[9]();
  }
  public static function i() {
    return static::get()[8]();
  }
  public static function myFunction(dynamic $cst_The_variable_v_should_not_conflict_with_any_other_variables_in_scope) {
    return static::get()[7]($cst_The_variable_v_should_not_conflict_with_any_other_variables_in_scope);
  }
  public static function createIntFromString(dynamic $ss) {
    return static::get()[6]($ss);
  }
  public static function index() {
    return static::get()[5]();
  }
  public static function six() {
    return static::get()[4]();
  }
  public static function negativeOne() {
    return static::get()[3]();
  }
  public static function unicodeLength() {
    return static::get()[2]();
  }
  public static function greeting() {
    return static::get()[1]();
  }

}
/* Hashing disabled */
